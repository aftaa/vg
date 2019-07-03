<?php

namespace common\models;

use common\vg\models\VgCompanyCategory;
use Yii;
use yii\db\Exception;

/**
 * This is the ActiveQuery class for [[CompanyCategory]].
 *
 * @see CompanyCategoryManager
 */
class CompanyCategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/
    const COMPANY_CATEGORY_MAX_ID = 'companyCategoryMaxId';
    const COMPANY_CATEGORY_ = 'companyCategoryCount';

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

    /**
     * @param VgCompanyCategory[] $companyCategories
     * @return int
     */
    private function byParentIdRecursive(array $companyCategories): int
    {
        $companyCount = 0;
        if ($companyCategories) {
            foreach ($companyCategories as $companyCategory) {
                $companyCategory->companyCount = count($companyCategory->companies);
                $companyCount = $this->byParentIdRecursive($companyCategory->companyCategories);
                $companyCategory->companyCount += $companyCount;
            }
        }
        return $companyCount;
    }

    /**
     * @param int|null $companyCategoryParentId
     * @return VgCompanyCategory[]
     */
    public function byParentId(?int $companyCategoryParentId): array
    {
        $companyCategories = VgCompanyCategory::find(['parent_id' => $companyCategoryParentId])->all();
        $this->byParentIdRecursive($companyCategories);
        return $companyCategories;
    }
}
