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
            'id' => '№',
            'parent_id' => 'Родительская категория',
            'name' => 'Категория',
            'description' => 'Описание',
            'sort' => 'Порядок',
            'icon' => 'Иконка',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
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
     * {@inheritdoc}
     * @return ProductCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductCategoryQuery(get_called_class());
    }
}
