<?php

namespace frontend\controllers;

use common\models\Invoice;
use common\models\Member;
use common\vg\controllers\FrontendController;
use common\vg\models\VgInvoice;
use Yii;
use yii\log\Logger;

class PaymentController extends FrontendController
{
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    /**
     * @param string $result
     * @param string $description
     * @param Logger $logger
     */
    private function answer(string $result, string $description, Logger $logger): void
    {
        $result = strtoupper($result);
        $answer = "WMI_RESULT=$result&WMI_DESCRIPTION=$description";

        $logger->log($answer, Logger::LEVEL_ERROR, 'payment');

        $this->renderPartial('answer', [
            'answer' => $answer,
        ]);
    }

    public function actionIndex()
    {
        if (empty($_POST)) die;

        $this->enableCsrfValidation = false;

        $logger = Yii::getLogger();

        // Секретный ключ интернет-магазина (настраивается в кабинете)
        $secretKey = VgInvoice::SECRET_KEY;

        // Проверка наличия необходимых параметров в POST-запросе
        if (!isset($_POST["WMI_SIGNATURE"])) {
            $this->answer("Retry", "Отсутствует параметр WMI_SIGNATURE", $logger);
        }
        if (!isset($_POST["WMI_PAYMENT_NO"])) {
            $this->answer("Retry", "Отсутствует параметр WMI_PAYMENT_NO", $logger);
        }
        if (!isset($_POST["WMI_ORDER_STATE"])) {
            $this->answer("Retry", "Отсутствует параметр WMI_ORDER_STATE", $logger);
        }

        // Извлечение всех параметров POST-запроса, кроме WMI_SIGNATURE
        foreach ($_POST as $name => $value) {
            if ($name !== "WMI_SIGNATURE") {
                $params[$name] = $value;
            }
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

                $db = Yii::$app->db;
                $transaction = $db->beginTransaction();
                try {
                    $invoice = Invoice::findOne($invoiceId);
                    $invoice->payment = $payment;
                    $invoice->commission = $commission;
                    $invoice->order_id = $orderId;
                    $invoice->updated_at = date('Y-m-d H:i:s');
                    if (!$invoice->save()) {
                        $message = print_r($invoice->errors, true);
                        $logger->log($message);
                        throw new \Exception($message);
                    }

                    $member = Member::findOne($invoice->member_id);
                    $member->balance = $member->balance + $payment;
                    if (!$member->save()) {
                        $message = print_r($member->errors, true);
                        $logger->log($message);
                        throw new \Exception($message);
                    }

                    $this->answer("Ok", "Заказ #" . $_POST["WMI_PAYMENT_NO"] . " оплачен!", $logger);
                    $transaction->commit();

                } catch (\Exception|\Throwable $e) {
                    $transaction->rollBack();
                    $this->answer("Retry", "Сервер временно недоступен " . $_POST["WMI_ORDER_STATE"], $logger);
                }
            } else {
                // Случилось что-то странное, пришло неизвестное состояние заказа
                $this->answer("Retry", "Неверное состояние " . $_POST["WMI_ORDER_STATE"], $logger);
            }
        } else {
            // Подпись не совпадает, возможно вы поменяли настройки интернет-магазина
            $this->answer("Retry", "Неверная подпись " . $_POST["WMI_SIGNATURE"], $logger);
        }

        return '';
    }

    public function actionInvoice()
    {
        $amount = Yii::$app->getRequest()->post('amount');
        $member = $this->getMember();

        $invoice = new VgInvoice($amount);

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
        $invoice->setSignature();
        $invoiceFields = $invoice->fields;

        return $this->renderPartial('invoice', [
            'fields' => $invoiceFields,
        ]);
    }

    public function actionFail()
    {
        Yii::$app->getSession()->setFlash('balance', 'Ошибка при обновлении баланса');
        $this->redirect('/profile');
    }

    public function actionOk()
    {
        Yii::$app->getSession()->setFlash('balance', 'Баланс обновлен');
        $this->redirect('/profile');
    }
}
