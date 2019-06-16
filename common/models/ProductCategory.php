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
            [['icon'], 'string', 'max' => 20],
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
     * {@inheritdoc}
     * @return ProductCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductCategoryQuery(get_called_class());
    }

    public function getCategories()
    {
        return $this->hasMany(self::class, ['parent_id' => 'id']);
    }

    public function getCategory()
    {
        return $this->hasOne(self::class, ['id' => 'parent_id']);
    }
}
