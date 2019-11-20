<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yml_category".
 *
 * @property int $id №
 * @property int $parent_id Родительская категория
 * @property string $name Категория YML-файла
 * @property int $sort Сортировка
 * @property int $product_category_id Наша категория
 * @property int $yml_file_id YML-файл
 *
 * @property YmlFile $ymlFile
 * @property YmlCategory $parent
 * @property YmlCategory[] $ymlCategories
 * @property ProductCategory $productCategory
 */
class YmlCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'yml_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'name', 'sort', 'product_category_id', 'yml_file_id'], 'required'],
            [['parent_id', 'sort', 'product_category_id', 'yml_file_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['yml_file_id'], 'exist', 'skipOnError' => true, 'targetClass' => YmlFile::className(), 'targetAttribute' => ['yml_file_id' => 'id']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => YmlCategory::className(), 'targetAttribute' => ['parent_id' => 'id']],
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
            'parent_id' => Yii::t('app', 'Родительская категория'),
            'name' => Yii::t('app', 'Категория YML-файла'),
            'sort' => Yii::t('app', 'Сортировка'),
            'product_category_id' => Yii::t('app', 'Наша категория'),
            'yml_file_id' => Yii::t('app', 'YML-файл'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getYmlFile()
    {
        return $this->hasOne(YmlFile::className(), ['id' => 'yml_file_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(YmlCategory::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getYmlCategories()
    {
        return $this->hasMany(YmlCategory::className(), ['parent_id' => 'id']);
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
     * @return YmlCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new YmlCategoryQuery(get_called_class());
    }
}
