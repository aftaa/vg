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
     * @param int $limit
     * @return array
     */
    public function withThumb(int $limit = 12): array
    {
        $companies = parent::where('thumb <> ""')
            ->orderBy('RAND()')
            ->limit($limit)
            ->all();
//        $companies = array_chunk($companies, 4);
        return $companies;
    }
}
