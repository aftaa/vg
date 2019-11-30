<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[CompanyWrongThumb]].
 *
 * @see CompanyWrongThumb
 */
class CompanyWrongThumbQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CompanyWrongThumb[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CompanyWrongThumb|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
