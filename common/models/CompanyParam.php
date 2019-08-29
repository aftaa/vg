<?php

namespace common\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "company_param".
 *
 * @property int $id №
 * @property string $code Код
 * @property string $name Параметр
 * @property int $sort Порядок
 *
 * @property CompanyParamValue[] $companyParamValues
 */
class CompanyParam extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_param';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name', 'sort'], 'required'],
            [['sort'], 'integer'],
            [['code'], 'string', 'max' => 30],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'code' => 'Код',
            'name' => 'Параметр',
            'sort' => 'Порядок',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getCompanyParamValues()
    {
        return $this->hasMany(CompanyParamValue::className(), ['param_id' => 'id'])->indexBy('code');
    }

    /**
     * {@inheritdoc}
     * @return CompanyParamQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CompanyParamQuery(get_called_class());
    }
}
