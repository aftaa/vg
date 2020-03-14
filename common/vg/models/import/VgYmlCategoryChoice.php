<?php

namespace common\vg\models\import;

use common\models\ProductCategory;
use common\models\YmlCategory;
use common\vg\models\VgProductCategoryChoice;

class VgYmlCategoryChoice
{
    /** @var YmlCategory */
    public YmlCategory $ymlCategory;

    /** @var VgProductCategoryChoice */
    public VgProductCategoryChoice $productCategoriesChoice;

    /**
     * VgYmlCategoryChoice constructor.
     * @param YmlCategory $ymlCategory
     */
    public function __construct(YmlCategory $ymlCategory)
    {
        $this->ymlCategory = $ymlCategory;
        $this->productCategoriesChoice = new VgProductCategoryChoice;
    }

    /**
     * @param ProductCategory $productCategory
     */
    public function addChoice(ProductCategory $productCategory)
    {
        $this->productCategoriesChoice->addChoice($productCategory);
    }
}