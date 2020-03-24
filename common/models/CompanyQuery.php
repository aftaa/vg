<?php

namespace common\models;

use yii\db\Expression;

/**
 * This is the ActiveQuery class for [[Company]].
 *
 * @see Company
 */
class CompanyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @return CompanyQuery
     */
    public function sitemap()
    {
        return $this
            ->where(['checked' => true])
            ->orderBy(
                new Expression('thumb IS NULL DESC')
            );
    }

    /**
     * {@inheritdoc}
     * @return Company[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Company|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
