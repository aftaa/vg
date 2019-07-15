<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company_param_value".
 *
 * @property int $id №
 * @property int $company_id Компания
 * @property int $param_id Параметр
 * @property string $value Значение
 *
 * @property CompanyParam $param
 * @property Company $company
 */
class CompanyParamValue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_param_value';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'param_id', 'value'], 'required'],
            [['company_id', 'param_id'], 'integer'],
            [['value'], 'string'],
            [['param_id'], 'exist', 'skipOnError' => true, 'targetClass' => CompanyParam::className(), 'targetAttribute' => ['param_id' => 'id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'company_id' => 'Компания',
            'param_id' => 'Параметр',
            'value' => 'Значение',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParam()
    {
        return $this->hasOne(CompanyParam::className(), ['id' => 'param_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    /**
     * {@inheritdoc}
     * @return CompanyParamValueQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CompanyParamValueQuery(get_called_class());
    }
}
