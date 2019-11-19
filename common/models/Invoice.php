<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "invoice".
 *
 * @property int $id №
 * @property int $member_id Клиент
 * @property string $amount ₽
 * @property string $created_at Счет выставлен
 * @property string $updated_at Счет оплачен
 * @property string $payment ₽
 * @property string $commission Комиссия
 * @property string $order_id № в Единой кассе
 *
 * @property Member $member
 */
class Invoice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id', 'amount', 'created_at'], 'required'],
            [['member_id'], 'integer'],
            [['amount', 'payment', 'commission'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['order_id'], 'string', 'max' => 255],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['member_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '№'),
            'member_id' => Yii::t('app', 'Клиент'),
            'amount' => Yii::t('app', '₽'),
            'created_at' => Yii::t('app', 'Счет выставлен'),
            'updated_at' => Yii::t('app', 'Счет оплачен'),
            'payment' => Yii::t('app', '₽'),
            'commission' => Yii::t('app', 'Комиссия'),
            'order_id' => Yii::t('app', '№ в Единой кассе'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(Member::className(), ['id' => 'member_id']);
    }

    /**
     * {@inheritdoc}
     * @return InvoiceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InvoiceQuery(get_called_class());
    }
}
