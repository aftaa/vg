<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company_category".
 *
 * @property int $id №
 * @property int $parent_id Родительская категория
 * @property string $name Категория компании
 * @property int $sort Порядок
 * @property string $icon Иконка
 * @property string $meta_keywords Meta Keywords
 * @property string $meta_description Meta Description
 *
 * @property Company[] $companies
 * @property CompanyCategory $parent
 * @property CompanyCategory[] $companyCategories
 */
class CompanyCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'sort'], 'integer'],
            [['name'], 'required'],
            [['meta_keywords', 'meta_description'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['icon'], 'string', 'max' => 30],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => CompanyCategory::className(), 'targetAttribute' => ['parent_id' => 'id']],
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
            'name' => 'Категория компании',
            'sort' => 'Порядок',
            'icon' => 'Иконка',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::className(), ['company_category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(CompanyCategory::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyCategories()
    {
        return $this->hasMany(CompanyCategory::className(), ['parent_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CompanyCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CompanyCategoryQuery(get_called_class());
    }
}
