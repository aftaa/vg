<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yml_category".
 *
 * @property int $id №
 * @property int $yml_id YML id
 * @property int|null $parent_id Родительская YML-категория
 * @property string $name Категория YML-файла
 * @property int|null $sort Сортировка
 * @property int|null $product_category_id Наша категория
 * @property int $yml_file_id YML-файл
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
            [['yml_id', 'name', 'yml_file_id'], 'required'],
            [['yml_id', 'parent_id', 'sort', 'product_category_id', 'yml_file_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '№'),
            'yml_id' => Yii::t('app', 'YML id'),
            'parent_id' => Yii::t('app', 'Родительская YML-категория'),
            'name' => Yii::t('app', 'Категория YML-файла'),
            'sort' => Yii::t('app', 'Сортировка'),
            'product_category_id' => Yii::t('app', 'Наша категория'),
            'yml_file_id' => Yii::t('app', 'YML-файл'),
        ];
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
