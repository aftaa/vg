<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company_param".
 *
 * @property int $id №
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
            [['name', 'sort'], 'required'],
            [['sort'], 'integer'],
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
            'name' => 'Параметр',
            'sort' => 'Порядок',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
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
