<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[YmlOffer]].
 *
 * @see YmlOffer
 */
class YmlOfferQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return YmlOffer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return YmlOffer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
