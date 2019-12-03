<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_param_value".
 *
 * @property int $id №
 * @property int $product_id Продукт
 * @property int $product_param_id Параметр
 * @property string $value Значение
 *
 * @property Product $product
 * @property ProductParam $productParam
 */
class ProductParamValue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_param_value';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'product_param_id'], 'required'],
            [['product_id', 'product_param_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['product_param_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductParam::className(), 'targetAttribute' => ['product_param_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '№'),
            'product_id' => Yii::t('app', 'Продукт'),
            'product_param_id' => Yii::t('app', 'Параметр'),
            'value' => Yii::t('app', 'Значение'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductParam()
    {
        return $this->hasOne(ProductParam::className(), ['id' => 'product_param_id']);
    }

    /**
     * {@inheritdoc}
     * @return ProductParamValueQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductParamValueQuery(get_called_class());
    }
}
