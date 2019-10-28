<?php

namespace common\vg\manager;

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
        $pages->setPageSize(128);

        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy(new Expression('thumb IS NULL'))
            ->with('company')
            ->all();

        return [
            $products,
            $pages,
        ];
    }

    /**
     * @param int $companyId
     * @return array[array|VgProducts[], Pagination]
     */
    public static function getProductsByCompanyIdWithPagination(int $companyId): array
    {
        $query = VgProduct::find()
            ->andWhere("company_id=$companyId")
            ->andWhere('checked = TRUE');
//            ->andWhere('thumb_checked = TRUE');

        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
        ]);
        $pages->setPageSize(16);

        $products = $query
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy(new Expression(
                'thumb = "" DESC'
            ))
            ->with('company')
            ->all();

        return [
            $products,
            $pages,
        ];
    }
}
