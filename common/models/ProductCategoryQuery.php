<?php

namespace common\models;

use common\vg\models\VgProductCategory;
use Yii;
use yii\db\Exception;

/**
 * This is the ActiveQuery class for [[ProductCategory]].
 *
 * @see ProductCategory
 */
class ProductCategoryQuery extends \yii\db\ActiveQuery
{
    const CACHE_KEY_PRODUCT_CATEGORY_MAX_ID_ = 'productCategoryMaxId';
    const CACHE_KEY_PRODUCT_CATEGORIES_ = 'productCategories';
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ProductCategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ProductCategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @param VgProductCategory[] $productCategories
     * @return int
     * @throws Exception
     */
    private function categoriesByParentIdRecursive(array $productCategories): int
    {
        $productCount = 0;
        foreach ($productCategories as& $productCategory) {
            $sql = "SELECT COUNT(*) FROM product WHERE category_id=$productCategory->id";
            $productCategory->productCount = VgProductCategory::getDb()->createCommand($sql)->queryScalar();
            $subProductCount = $this->categoriesByParentIdRecursive($productCategory->productCategories); //sub products

            $productCount += $subProductCount; //total products count
            $productCount += $productCategory->productCount;
            $productCategory->productCount += $subProductCount;
        }
        return $productCount;
    }

    /**
     * @param int|null $productCategoryParentId
     * @return VgProductCategory[]
     * @throws Exception
     */
    public function categoriesByParentId(?int $productCategoryParentId): array
    {
        $checkKey = self::CACHE_KEY_PRODUCT_CATEGORY_MAX_ID_ . $productCategoryParentId;
        $valueKey = self::CACHE_KEY_PRODUCT_CATEGORIES_ . $productCategoryParentId;

        $sql = 'SELECT MAX(id) FROM product';
        $maxId = VgProductCategory::getDb()->createCommand($sql)->queryScalar();
        $cache = Yii::$app->cache;

        if ($cache->get($checkKey) != $maxId) {
            $productCategories = VgProductCategory::find()
                ->select('id, parent_id, name')
                ->where(['parent_id' => $productCategoryParentId])
                ->all();
            $this->categoriesByParentIdRecursive($productCategories);

            //store in cache
            $cache->set($checkKey, $maxId);
            $cache->set($valueKey, $productCategories);
        } else {
            $productCategories = $cache->get($valueKey);
        }
        return $productCategories;
    }
}
