<?php

namespace common\vg\models;

class VgInvoice
{
    const SECRET_KEY = '7b6d33634b4e6d396e4a32554348523173507c5e6256684c35484f';
    const WMI_MERCHANT_ID = '162634143288';
    const WMI_CURRENCY_ID = 643;
    const WMI_SUCCESS_URL = 'http://vg-dev.aftaa.ru/payment/ok';
    const WMI_FAIL_URL = 'http://vg-dev.aftaa.ru/payment/fail';
    const PAYMENT_DESCRIPTION = 'Пополнение баланса сайта vseti-goroda.ru';

    public $fields = [
        'WMI_MERCHANT_ID'    => self::WMI_MERCHANT_ID,
        'WMI_PAYMENT_AMOUNT' => null,
        'WMI_CURRENCY_ID'    => self::WMI_CURRENCY_ID,
        'WMI_PAYMENT_NO'     => null,
        'WMI_DESCRIPTION'    => null,
        'WMI_EXPIRED_DATE'   => null,
        'WMI_SUCCESS_URL'    => self::WMI_SUCCESS_URL,
        'WMI_FAIL_URL'       => self::WMI_FAIL_URL,
        'WMI_SIGNATURE'      => null,
    ];

    /**
     * Payment constructor.
     * @param float $amount
     */
    public function __construct(float $amount)
    {
        $this->setPaymentAmount($amount);
        $this->setDescription();
        $this->setExpiredDate();
        $this->setSignature();
    }

    /**
     *
     */
    protected function setDescription()
    {
        $description = self::PAYMENT_DESCRIPTION;
        $description = 'BASE64:' . base64_encode($description);
        $this->fields['WMI_DESCRIPTION'] = $description;
    }

    /**
     *
     */
    protected function setExpiredDate(): void
    {
        $this->fields['WMI_EXPIRED_DATE'] = date('c', time() + 3600 * 24);
    }

    /**
     * @param float $amount
     */
    protected function setPaymentAmount(float $amount): void
    {
        $amount = number_format($amount, 2, '.', '');
        $this->fields['WMI_PAYMENT_AMOUNT'] = $amount;
    }

    /**
     * @see https://www.walletone.com/ru/merchant/documentation/#step1
     */
    protected function setSignature(): void
    {
        uksort($this->fields, 'strcasecmp');
        $values = [];
        foreach ($this->fields as $field) {
            $values[] = iconv('utf-8', 'windows-1251', $field);
        }
        $values = implode('', $values);
        $signature = base64_encode(pack('H*', md5($values . self::SECRET_KEY)));
        $this->fields['WMI_SIGNATURE'] = $signature;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->fields['WMI_PAYMENT_AMOUNT'];
    }

    /**
     * @param int $paymentNo
     */
    public function setPaymentNo(int $paymentNo)
    {
        $this->fields['WMI_PAYMENT_NO'] = $paymentNo;
    }
}