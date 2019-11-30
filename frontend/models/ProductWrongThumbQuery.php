<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ProductWrongThumb]].
 *
 * @see ProductWrongThumb
 */
class ProductWrongThumbQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ProductWrongThumb[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ProductWrongThumb|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
