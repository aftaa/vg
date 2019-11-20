<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yml_file".
 *
 * @property int $id №
 * @property int $company_id Компания
 * @property string $url URL
 * @property string $local_filename Локальное имя файла
 * @property int $size Размер в байтах
 * @property int $checked Проверен
 * @property string $created_at Создан
 * @property string $updated_at Обновлен
 *
 * @property Product[] $products
 * @property YmlCategory[] $ymlCategories
 * @property Company $company
 */
class YmlFile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'yml_file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'url', 'local_filename', 'size', 'created_at', 'updated_at'], 'required'],
            [['company_id', 'size', 'checked'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['url', 'local_filename'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
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
            'url' => Yii::t('app', 'URL'),
            'local_filename' => Yii::t('app', 'Локальное имя файла'),
            'size' => Yii::t('app', 'Размер в байтах'),
            'checked' => Yii::t('app', 'Проверен'),
            'created_at' => Yii::t('app', 'Создан'),
            'updated_at' => Yii::t('app', 'Обновлен'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['yml_file_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getYmlCategories()
    {
        return $this->hasMany(YmlCategory::className(), ['yml_file_id' => 'id']);
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
     * @return YmlFileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new YmlFileQuery(get_called_class());
    }
}
