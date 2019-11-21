<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_category".
 *
 * @property int $id №
 * @property int $parent_id Родительская категория
 * @property string $name Категория
 * @property string $description Описание
 * @property int $sort Порядок
 * @property string $icon Иконка
 * @property string $meta_keywords Meta Keywords
 * @property string $meta_description Meta Description
 *
 * @property Product[] $products
 * @property ProductCategory $parent
 * @property ProductCategory[] $productCategories
 * @property ProductCategoryParam[] $productCategoryParams
 * @property ProductParam[] $productParams
 * @property ProductParam[] $productParams0
 * @property YmlCategory[] $ymlCategories
 */
class ProductCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'sort'], 'integer'],
            [['name'], 'required'],
            [['description', 'meta_keywords', 'meta_description'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['icon'], 'string', 'max' => 30],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '№'),
            'parent_id' => Yii::t('app', 'Родительская категория'),
            'name' => Yii::t('app', 'Категория'),
            'description' => Yii::t('app', 'Описание'),
            'sort' => Yii::t('app', 'Порядок'),
            'icon' => Yii::t('app', 'Иконка'),
            'meta_keywords' => Yii::t('app', 'Meta Keywords'),
            'meta_description' => Yii::t('app', 'Meta Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(ProductCategory::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategories()
    {
        return $this->hasMany(ProductCategory::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategoryParams()
    {
        return $this->hasMany(ProductCategoryParam::className(), ['product_category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductParams()
    {
        return $this->hasMany(ProductParam::className(), ['id' => 'product_param_id'])->viaTable('product_category_param', ['product_category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductParams0()
    {
        return $this->hasMany(ProductParam::className(), ['product_category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getYmlCategories()
    {
        return $this->hasMany(YmlCategory::className(), ['product_category_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ProductCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductCategoryQuery(get_called_class());
    }
}
