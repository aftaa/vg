<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company_wrong_thumb".
 *
 * @property int $company_id
 * @property string $thumb
 */
class CompanyWrongThumb extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_wrong_thumb';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'thumb'], 'required'],
            [['company_id'], 'integer'],
            [['thumb'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'company_id' => Yii::t('app', 'Company ID'),
            'thumb' => Yii::t('app', 'Thumb'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return CompanyWrongThumbQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CompanyWrongThumbQuery(get_called_class());
    }

    /**
     * @inheritDoc
     */
    public static function getDb()
    {
        return Yii::$app->getDb('dbDev');
    }
}
