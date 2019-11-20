<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property int $id №
 * @property int $user_id № пользователя
 * @property string $first_name Имя
 * @property string $last_name Фамилия
 * @property string $middle_name Отчество
 * @property string $position Должность
 * @property string $old_password Старый пароль
 * @property string $phone Телефон
 * @property string $balance Баланс
 * @property string $user_pic Аватар
 *
 * @property Company[] $companies
 * @property Invoice[] $invoices
 * @property User $user
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['balance'], 'number'],
            [['first_name', 'last_name', 'middle_name', 'position'], 'string', 'max' => 50],
            [['old_password'], 'string', 'max' => 32],
            [['phone'], 'string', 'max' => 20],
            [['user_pic'], 'string', 'max' => 100],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '№'),
            'user_id' => Yii::t('app', '№ пользователя'),
            'first_name' => Yii::t('app', 'Имя'),
            'last_name' => Yii::t('app', 'Фамилия'),
            'middle_name' => Yii::t('app', 'Отчество'),
            'position' => Yii::t('app', 'Должность'),
            'old_password' => Yii::t('app', 'Старый пароль'),
            'phone' => Yii::t('app', 'Телефон'),
            'balance' => Yii::t('app', 'Баланс'),
            'user_pic' => Yii::t('app', 'Аватар'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::className(), ['owner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices()
    {
        return $this->hasMany(Invoice::className(), ['member_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return MemberQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MemberQuery(get_called_class());
    }
}
