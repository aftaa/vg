<?php

namespace common\models;

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

    /**
     * @return array
     */
    public function withThumb(): array
    {
        $companies = parent::where('thumb <> ""')
            ->orderBy('RAND()')
            ->limit(12)
            ->all();
//        $companies = array_chunk($companies, 4);
        return $companies;
    }
}
