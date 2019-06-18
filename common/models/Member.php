<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property int $id №
 * @property int $user_id № клиента
 * @property string $first_name Имя
 * @property string $last_name Фамилия
 * @property string $middle_name Отчество
 * @property string $address Адрес
 * @property string $phone Телефон
 * @property string $balance Баланс
 * @property string $user_pic Аватар
 *
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
            [['user_id', 'first_name', 'last_name'], 'required'],
            [['user_id'], 'integer'],
            [['address'], 'string'],
            [['balance'], 'number'],
            [['first_name', 'last_name', 'middle_name'], 'string', 'max' => 50],
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
            'id' => '№',
            'user_id' => '№ клиента',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'middle_name' => 'Отчество',
            'address' => 'Адрес',
            'phone' => 'Телефон',
            'balance' => 'Баланс',
            'user_pic' => 'Аватар',
        ];
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
