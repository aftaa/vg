<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

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
 *
 * @property CompanyParamValue[] $companyParamValues
 */
class CompanyParamValue extends ActiveRecord
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
            [['param_id'], 'exist', 'skipOnError' => true, 'targetClass' => CompanyParam::class, 'targetAttribute' => ['param_id' => 'id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['company_id' => 'id']],
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
     * @return ActiveQuery
     */
    public function getParam()
    {
        return $this->hasOne(CompanyParam::class, ['id' => 'param_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'company_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getCompanyParamValues()
    {
        return $this->hasMany(CompanyParamValue::class, ['param_id' => 'id'])->indexBy('code');
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
