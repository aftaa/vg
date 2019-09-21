<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id №
 * @property int $company_id Компания
 * @property int $category_id Категория
 * @property string $name Товар
 * @property string $description Описание
 * @property string $thumb Изображение
 * @property int $thumb_checked Изображение проверено
 * @property int $checked Проверен
 * @property string $price Стоимость
 * @property string $meta_keywords Meta Keywords
 * @property string $meta_description Meta Description
 * @property string $created_at Создан
 * @property string $updated_at Изменен
 * @property string $deleted_at Удалён
 *
 * @property ProductCategory $category
 * @property Company $company
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'category_id', 'name', 'created_at'], 'required'],
            [['company_id', 'category_id', 'thumb_checked', 'checked'], 'integer'],
            [['description', 'meta_keywords', 'meta_description'], 'string'],
            [['price'], 'number'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['name'], 'string', 'max' => 500],
            [['thumb'], 'string', 'max' => 250],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'company_id' => 'Компания',
            'category_id' => 'Категория',
            'name' => 'Товар',
            'description' => 'Описание',
            'thumb' => 'Изображение',
            'thumb_checked' => 'Изображение проверено',
            'checked' => 'Проверен',
            'price' => 'Стоимость',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'created_at' => 'Создан',
            'updated_at' => 'Изменен',
            'deleted_at' => 'Удалён',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ProductCategory::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    /**
     * {@inheritdoc}
     * @return ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductQuery(get_called_class());
    }
}
