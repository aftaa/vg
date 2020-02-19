<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yml_offer".
 *
 * @property int $yml_file_id
 * @property int $offer_id
 * @property int|null $yml_category_id
 * @property int|null $available
 * @property string|null $url
 * @property float|null $price
 * @property string|null $picture
 * @property string|null $name
 * @property string|null $description
 */
class YmlOffer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'yml_offer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['yml_file_id', 'offer_id'], 'required'],
            [['yml_file_id', 'offer_id', 'yml_category_id', 'available'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['url', 'picture'], 'string', 'max' => 500],
            [['name'], 'string', 'max' => 250],
            [['yml_file_id', 'offer_id'], 'unique', 'targetAttribute' => ['yml_file_id', 'offer_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'yml_file_id' => Yii::t('app', 'Yml File ID'),
            'offer_id' => Yii::t('app', 'Offer ID'),
            'yml_category_id' => Yii::t('app', 'Yml Category ID'),
            'available' => Yii::t('app', 'Available'),
            'url' => Yii::t('app', 'Url'),
            'price' => Yii::t('app', 'Price'),
            'picture' => Yii::t('app', 'Picture'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return YmlOfferQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new YmlOfferQuery(get_called_class());
    }
}
