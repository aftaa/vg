<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[YmlCategory]].
 *
 * @see YmlCategory
 */
class YmlCategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return YmlCategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return YmlCategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
