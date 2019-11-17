<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "area".
 *
 * @property int $id №
 * @property int $parent_id Родительский регион
 * @property string $name Область/населенный пункт
 * @property int $sort Порядок
 *
 * @property Area $parent
 * @property Area[] $areas
 * @property Company[] $companies
 */
class Area extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'area';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'sort'], 'integer'],
            [['name', 'sort'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '№'),
            'parent_id' => Yii::t('app', 'Родительский регион'),
            'name' => Yii::t('app', 'Область/населенный пункт'),
            'sort' => Yii::t('app', 'Порядок'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Area::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreas()
    {
        return $this->hasMany(Area::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::className(), ['area_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return AreaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AreaQuery(get_called_class());
    }
}
