<?php

namespace common\vg\models;

use common\models\ProductCategory;

class VgProductCategoryChoice
{
    /** @var ProductCategory[] */
    public array $productCategories = [];

    /**
     * @param ProductCategory $category
     */
    public function addChoice(ProductCategory $category): void
    {
        $this->productCategories[] = $category;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->productCategories);
    }
}
