<?php


namespace common\vg\models;


use common\models\ProductCategory;
use yii\db\ActiveQuery;

class VgProductCategory extends ProductCategory
{
    /** @var int */
    public $productCount = 0;

    /**
     * @return ActiveQuery
     */
    public function getProductCategories()
    {
        return $this->hasMany(VgProductCategory::class, ['parent_id' => 'id']);
    }

    /**
     * @return string
     */
    public function getProductCount(): string
    {
        $productCount = $this->productCount;
        $productCount = number_format($productCount,0, '', ' ');
        return $productCount;
    }
}
