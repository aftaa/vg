<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id №
 * @property int|null $owner_id Владелец
 * @property int|null $company_category_id Категория
 * @property int|null $area_id Регион
 * @property string $name Компания
 * @property string|null $introduce Описание
 * @property string|null $thumb Картинка
 * @property int $checked Проверена
 * @property string|null $meta_keywords Meta Keywords
 * @property string|null $meta_description Meta Description
 *
 * @property Area $area
 * @property CompanyCategory $companyCategory
 * @property Member $owner
 * @property Product[] $products
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['owner_id', 'company_category_id', 'area_id', 'checked'], 'integer'],
            [['name'], 'required'],
            [['introduce', 'meta_keywords', 'meta_description'], 'string'],
            [['name', 'thumb'], 'string', 'max' => 100],
            [['area_id'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['area_id' => 'id']],
            [['company_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => CompanyCategory::className(), 'targetAttribute' => ['company_category_id' => 'id']],
            [['owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['owner_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '№'),
            'owner_id' => Yii::t('app', 'Владелец'),
            'company_category_id' => Yii::t('app', 'Категория'),
            'area_id' => Yii::t('app', 'Регион'),
            'name' => Yii::t('app', 'Компания'),
            'introduce' => Yii::t('app', 'Описание'),
            'thumb' => Yii::t('app', 'Картинка'),
            'checked' => Yii::t('app', 'Проверена'),
            'meta_keywords' => Yii::t('app', 'Meta Keywords'),
            'meta_description' => Yii::t('app', 'Meta Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['id' => 'area_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyCategory()
    {
        return $this->hasOne(CompanyCategory::className(), ['id' => 'company_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(Member::className(), ['id' => 'owner_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['company_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CompanyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CompanyQuery(get_called_class());
    }
}
