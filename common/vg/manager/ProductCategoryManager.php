<?php


namespace common\vg\manager;


use common\vg\models\VgProductCategory;
use yii\db\Exception;

class ProductCategoryManager
{
    /**
     * @param int|null $productCategoryParentId
     * @return array|VgProductCategory[]
     * @throws Exception
     */
    public static function getCategoriesByParentId($productCategoryParentId = null): array
    {
        $categories = VgProductCategory::find()->categoriesByParentId($productCategoryParentId);
        return $categories;
    }
}
