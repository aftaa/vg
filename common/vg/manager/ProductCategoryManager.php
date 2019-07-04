<?php


namespace common\vg\manager;


use common\vg\models\VgProductCategory;

class ProductCategoryManager
{
    /**
     * @param int|null $productCategoryParentId
     * @return VgProductCategory[]
     */
    public static function getCategoriesByParentId(int $productCategoryParentId = null): array
    {
        $categories = VgProductCategory::find()->categoriesByParentId($productCategoryParentId);
        return $categories;
    }
}