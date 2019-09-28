<?php

namespace common\vg\manager;

use common\models\Product;
use common\vg\models\VgProduct;
use yii\data\Pagination;
use yii\db\Expression;

class ProductManager
{
    /**
     * @param int $productCategoryId
     * @return array[array|VgProducts[], Pagination]
     */
    public static function getProductsByCategoryIdWithPagination($productCategoryId): array
    {
        $query = VgProduct::find()->where([
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
            ->orderBy(new Expression('thumb IS NULL'))
            ->all();

        return [
            $products,
            $pages,
        ];
    }

    /**
     * @param int $companyId
     * @return array[Products[], Pagination]
     */
    public static function getProductsByCompanyIdWithPagination(int $companyId): array
    {
        $query = Product::find();
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
        ]);
        $pages->setPageSize(16);

        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->where('checked = TRUE')
            ->andWhere("company_id=$companyId")
            ->andWhere('thumb_checked = TRUE')
            ->orderBy([new Expression(
                'thumb IS NULL'
            )])
            ->all();

//        $products = array_chunk($products, 4);

        return [
            $products,
            $pages,
        ];
    }
}
