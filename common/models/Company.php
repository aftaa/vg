<?php

namespace common\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "company".
 *
 * @property int $id №
 * @property int $owner_id Владелец
 * @property int $company_category_id Категория
 * @property int $area_id Регион
 * @property string $name Компания
 * @property string $introduce Описание
 * @property string $thumb Картинка
 * @property int $checked Проверена
 * @property string $meta_keywords Meta Keywords
 * @property string $meta_description Meta Description
 *
 * @property Area $area
 * @property CompanyCategory $companyCategory
 * @property Member $owner
 * @property CompanyParamValue[] $companyParamValues
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
            [['owner_id', 'company_category_id', 'area_id', 'name'], 'required'],
            [['owner_id', 'company_category_id', 'area_id', 'checked'], 'integer'],
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
            'id' => '№',
            'owner_id' => 'Владелец',
            'company_category_id' => 'Категория',
            'area_id' => 'Регион',
            'name' => 'Компания',
            'introduce' => 'Описание',
            'thumb' => 'Картинка',
            'checked' => 'Проверена',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['id' => 'area_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getCompanyCategory()
    {
        return $this->hasOne(CompanyCategory::className(), ['id' => 'company_category_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(Member::className(), ['id' => 'owner_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getCompanyParamValues()
    {
        return $this->hasMany(CompanyParamValue::class, ['company_id' => 'id'])
            ->with('param')
            ->indexBy('param.code');
    }

    /**
     * @return ActiveQuery
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
