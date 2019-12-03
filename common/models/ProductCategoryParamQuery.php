<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ProductCategoryParam]].
 *
 * @see ProductCategoryParam
 */
class ProductCategoryParamQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ProductCategoryParam[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ProductCategoryParam|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
