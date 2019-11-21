<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_param".
 *
 * @property int $id №
 * @property string $name Параметр
 * @property string $code Код
 * @property int $sort Сортировка
 * @property int $product_category_id Категория
 *
 * @property ProductCategoryParam[] $productCategoryParams
 * @property ProductCategory[] $productCategories
 * @property ProductCategory $productCategory
 * @property ProductParamValue[] $productParamValues
 */
class ProductParam extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_param';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code', 'sort', 'product_category_id'], 'required'],
            [['sort', 'product_category_id'], 'integer'],
            [['name', 'code'], 'string', 'max' => 255],
            [['product_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::className(), 'targetAttribute' => ['product_category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '№'),
            'name' => Yii::t('app', 'Параметр'),
            'code' => Yii::t('app', 'Код'),
            'sort' => Yii::t('app', 'Сортировка'),
            'product_category_id' => Yii::t('app', 'Категория'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategoryParams()
    {
        return $this->hasMany(ProductCategoryParam::className(), ['product_param_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategories()
    {
        return $this->hasMany(ProductCategory::className(), ['id' => 'product_category_id'])->viaTable('product_category_param', ['product_param_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategory()
    {
        return $this->hasOne(ProductCategory::className(), ['id' => 'product_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductParamValues()
    {
        return $this->hasMany(ProductParamValue::className(), ['product_param_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ProductParamQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductParamQuery(get_called_class());
    }
}
