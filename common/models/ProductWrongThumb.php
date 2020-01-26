<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_wrong_thumb".
 *
 * @property int $product_id
 * @property string $thumb
 */
class ProductWrongThumb extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_wrong_thumb';
    }

    /**
     * @inheritDoc
     */
    public static function getDb()
    {
        return Yii::$app->getDb('dbDev');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'thumb'], 'required'],
            [['product_id'], 'integer'],
            [['thumb'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('app', 'Product ID'),
            'thumb' => Yii::t('app', 'Thumb'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ProductWrongThumbQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductWrongThumbQuery(get_called_class());
    }
}
