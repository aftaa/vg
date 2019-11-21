<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ProductParam]].
 *
 * @see ProductParam
 */
class ProductParamQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ProductParam[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ProductParam|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
