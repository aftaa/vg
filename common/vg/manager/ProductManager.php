<?php

namespace common\vg\manager;

use common\models\Product;
use yii\data\Pagination;

class ProductManager
{
    /**
     * @param int $productCategoryId
     * @return array[Products[], Pagination]
     */
    public static function getProductsByCategoryIdWithPagination($productCategoryId): array
    {
        $query = Product::find()->where([
            'checked'     => true,
            'category_id' => $productCategoryId,
        ]);
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
        ]);
        $pages->setPageSize(256);

        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy('thumb, price DESC')
            ->all();

        $products = array_chunk($products, 4);

        return [
            $products,
            $pages,
        ];
    }
}
