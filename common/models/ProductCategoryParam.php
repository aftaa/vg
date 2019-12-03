<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_category_param".
 *
 * @property int $product_category_id Категория
 * @property int $product_param_id Параметр
 *
 * @property ProductParam $productParam
 * @property ProductCategory $productCategory
 */
class ProductCategoryParam extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_category_param';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_category_id', 'product_param_id'], 'required'],
            [['product_category_id', 'product_param_id'], 'integer'],
            [['product_category_id', 'product_param_id'], 'unique', 'targetAttribute' => ['product_category_id', 'product_param_id']],
            [['product_param_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductParam::className(), 'targetAttribute' => ['product_param_id' => 'id']],
            [['product_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::className(), 'targetAttribute' => ['product_category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_category_id' => Yii::t('app', 'Категория'),
            'product_param_id' => Yii::t('app', 'Параметр'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductParam()
    {
        return $this->hasOne(ProductParam::className(), ['id' => 'product_param_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategory()
    {
        return $this->hasOne(ProductCategory::className(), ['id' => 'product_category_id']);
    }

    /**
     * {@inheritdoc}
     * @return ProductCategoryParamQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductCategoryParamQuery(get_called_class());
    }
}
