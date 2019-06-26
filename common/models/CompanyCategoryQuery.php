<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[CompanyCategory]].
 *
 * @see CompanyCategory
 */
class CompanyCategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CompanyCategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CompanyCategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function getCompanyCount(CompanyCategory $category)
    {
        $companyCount = count($category->companies);

        if ($category->companyCategories) {
            foreach ($category->companyCategories as $companyCategory) {
                $companyCount += $this->getCompanyCount($companyCategory);
            }
        }

        return $companyCount;
    }
}
