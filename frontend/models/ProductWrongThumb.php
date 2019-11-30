<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_wrong_thumb".
 *
 * @property int $product_id
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
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('app', 'Product ID'),
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

    /**
     * @inheritDoc
     */
    public static function getDb()
    {
        return Yii::$app->get('dbDev');
    }
}
