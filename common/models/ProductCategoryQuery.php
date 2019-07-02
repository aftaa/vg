<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ProductCategory]].
 *
 * @see ProductCategory
 */
class ProductCategoryQuery extends \yii\db\ActiveQuery
{
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
     * @param ProductCategory $category
     * @return int
     */
    public function getProductCount(ProductCategory $category): int
    {
        set_time_limit(0);
        $productCount = count($category->products);

        if ($category->productCategories) {
            foreach ($category->productCategories as $productCategory) {
                $productCount += $this->getProductCount($productCategory);
            }
        }

        return $productCount;
    }
}
