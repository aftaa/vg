<?php

namespace common\vg\models;

use common\models\ProductCategory;
use yii\db\ActiveQuery;

class VgProductCategory extends ProductCategory
{
    /** @var int */
    public int $productCount = 0;

    /**
     * @return ActiveQuery
     */
    public function getProductCategories(): ActiveQuery
    {
        return $this->hasMany(VgProductCategory::class, ['parent_id' => 'id']);
    }

    /**
     * @return int
     */
    public function getProductCount(): int
    {
        $productCount = $this->productCount;
        $productCount = number_format($productCount,0, '', ' ');
        return $productCount;
    }
}
