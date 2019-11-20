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
 * @property int $yml_file_id YML файл
 * @property string $yml_url Ссылка
 * @property int $yml_id ID в YML-файле
 *
 * @property ProductCategory $category
 * @property Company $company
 * @property YmlFile $ymlFile
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
            [['company_id', 'category_id', 'thumb_checked', 'checked', 'yml_file_id', 'yml_id'], 'integer'],
            [['description', 'meta_keywords', 'meta_description'], 'string'],
            [['price'], 'number'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['name'], 'string', 'max' => 500],
            [['thumb'], 'string', 'max' => 250],
            [['yml_url'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['yml_file_id'], 'exist', 'skipOnError' => true, 'targetClass' => YmlFile::className(), 'targetAttribute' => ['yml_file_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '№'),
            'company_id' => Yii::t('app', 'Компания'),
            'category_id' => Yii::t('app', 'Категория'),
            'name' => Yii::t('app', 'Товар'),
            'description' => Yii::t('app', 'Описание'),
            'thumb' => Yii::t('app', 'Изображение'),
            'thumb_checked' => Yii::t('app', 'Изображение проверено'),
            'checked' => Yii::t('app', 'Проверен'),
            'price' => Yii::t('app', 'Стоимость'),
            'meta_keywords' => Yii::t('app', 'Meta Keywords'),
            'meta_description' => Yii::t('app', 'Meta Description'),
            'created_at' => Yii::t('app', 'Создан'),
            'updated_at' => Yii::t('app', 'Изменен'),
            'deleted_at' => Yii::t('app', 'Удалён'),
            'yml_file_id' => Yii::t('app', 'YML файл'),
            'yml_url' => Yii::t('app', 'Ссылка'),
            'yml_id' => Yii::t('app', 'ID в YML-файле'),
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
     * @return \yii\db\ActiveQuery
     */
    public function getYmlFile()
    {
        return $this->hasOne(YmlFile::className(), ['id' => 'yml_file_id']);
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
