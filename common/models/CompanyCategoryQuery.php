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
    const CACHE_KEY_COMPANY_CATEGORY_MAX_ID_ = 'companyCategoryMaxId';
    const CACHE_KEY_COMPANY_CATEGORIES_ = 'companyCategories';

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
    private function categoriesByParentIdRecursive(array & $companyCategories): int
    {
        $companyCount = 0;
        foreach ($companyCategories as &$companyCategory) {
            $companyCategory->companyCount = count($companyCategory->companies); //own companies
            $subCompanyCount = $this->categoriesByParentIdRecursive($companyCategory->companyCategories); //sub companies

            $companyCount += $subCompanyCount; //total companies count
            $companyCount += $companyCategory->companyCount;
            $companyCategory->companyCount += $subCompanyCount;
        }
        return $companyCount;
    }

    /**
     * @param int|null $companyCategoryParentId
     * @return VgCompanyCategory[]
     * @throws Exception
     */
    public function categoriesByParentId(?int $companyCategoryParentId): array
    {
        $checkKey = self::CACHE_KEY_COMPANY_CATEGORY_MAX_ID_ . $companyCategoryParentId;
        $valueKey = self::CACHE_KEY_COMPANY_CATEGORIES_ . $companyCategoryParentId;

        $maxId = VgCompanyCategory::getDb()->createCommand('SELECT MAX(id) FROM company_category')->queryScalar();
        $cache = Yii::$app->cache;

        if ($cache->get($checkKey) != $maxId) {
            $companyCategories = VgCompanyCategory::find()->where(['parent_id' => $companyCategoryParentId])->all();
            $this->categoriesByParentIdRecursive($companyCategories);

            //store in cache
            $cache->set($checkKey, $maxId);
            $cache->set($valueKey, $companyCategories);
        } else {
            //get from cache
            $companyCategories = $cache->get($valueKey);
        }
        return $companyCategories;
    }
}
