<?php

namespace frontend\controllers;

use common\models\Invoice;
use common\models\Member;
use common\vg\controllers\FrontendController;
use common\vg\models\VgInvoice;
use Yii;

class PaymentController extends FrontendController
{
    public function actionIndex()
    {
        // Секретный ключ интернет-магазина (настраивается в кабинете)

        $secretKey = VgInvoice::SECRET_KEY;

        // Функция, которая возвращает результат в Единую кассу
        function print_answer($result, $description)
        {
            print "WMI_RESULT=" . strtoupper($result) . "&";
            print "WMI_DESCRIPTION=" . $description;
            exit();
        }

        // Проверка наличия необходимых параметров в POST-запросе
        if (!isset($_POST["WMI_SIGNATURE"]))
            print_answer("Retry", "Отсутствует параметр WMI_SIGNATURE");
        if (!isset($_POST["WMI_PAYMENT_NO"]))
            print_answer("Retry", "Отсутствует параметр WMI_PAYMENT_NO");
        if (!isset($_POST["WMI_ORDER_STATE"]))
            print_answer("Retry", "Отсутствует параметр WMI_ORDER_STATE");

        // Извлечение всех параметров POST-запроса, кроме WMI_SIGNATURE
        foreach ($_POST as $name => $value) {
            if ($name !== "WMI_SIGNATURE") $params[$name] = $value;
        }

        // Сортировка массива по именам ключей в порядке возрастания
        // и формирование сообщения, путем объединения значений формы
        uksort($params, "strcasecmp");

        $values = [];
        foreach ($params as $name => $value) {
            $values[] = $value;
        }
        $values = implode('', $values);

        // Формирование подписи для сравнения ее с параметром WMI_SIGNATURE
        $signature = base64_encode(pack("H*", md5($values . $secretKey)));

        //Сравнение полученной подписи с подписью W1

        if ($signature == $_POST["WMI_SIGNATURE"]) {
            if (strtoupper($_POST["WMI_ORDER_STATE"]) == "ACCEPTED") {

                $invoiceId = $_POST['WMI_PAYMENT_NO'];
                $payment = $_POST['WMI_PAYMENT_AMOUNT'];
                $commission = $_POST['WMI_COMMISSION_AMOUNT'];
                $orderId = $_POST['WMI_ORDER_ID'];

                try {
                    $db = Yii::$app->db;
                    $transaction = $db->beginTransaction();

                    $invoice = Invoice::findOne($invoiceId);
                    $invoice->payment = $payment;
                    $invoice->commission = $commission;
                    $invoice->order_id = $orderId;
                    $invoice->updated_at = date('Y-m-d H:i:s');
                    if (!$invoice->save()) {
                        throw new \Exception;
                    }

                    $member = Member::findOne($invoice->member_id);
                    $member->balance = $member->balance + $payment;
                    if (!$member->save()) {
                        throw new \Exception;
                    }

                    print_answer("Ok", "Заказ #" . $_POST["WMI_PAYMENT_NO"] . " оплачен!");
                    $transaction->commit();

                } catch (\Exception|\Throwable $e) {
                    $transaction->rollBack();
                    print_answer("Retry", "Сервер временно недоступен " . $_POST["WMI_ORDER_STATE"]);
                }
            } else {
                // Случилось что-то странное, пришло неизвестное состояние заказа
                print_answer("Retry", "Неверное состояние " . $_POST["WMI_ORDER_STATE"]);
            }
        } else {
            // Подпись не совпадает, возможно вы поменяли настройки интернет-магазина
            print_answer("Retry", "Неверная подпись " . $_POST["WMI_SIGNATURE"]);
        }

        return '';
    }

    public function actionInvoice()
    {
        $amount = Yii::$app->getRequest()->post('amount');
        $member = $this->getMember();

        $invoice = new VgInvoice($amount);
        $invoiceFields = $invoice->fields;

        $sentInvoice = new Invoice;
        $sentInvoice->member_id = $member->id;
        $sentInvoice->amount = $invoice->getAmount();
        $sentInvoice->created_at = date('Y-m-d H:i:s');
        if (!$sentInvoice->save()) {
            echo '<pre>';
            print_r($sentInvoice->errors);
            echo '</pre>';
            die;
        }
        $invoice->setPaymentNo($sentInvoice->id);

        return $this->renderPartial('invoice', [
            'fields' => $invoiceFields,
        ]);
    }

    public function actionFail()
    {
        throw new \Error("Неизвестная ошибка при выполнении платежа");
    }

    public function actionOk()
    {
        Yii::$app->getSession()->setFlash('balance', 'Баланс обновлен');
        $this->redirect('/profile');
    }
}
