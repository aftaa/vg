<?php

namespace common\vg\manager;

use common\models\ProductCategory;
use common\models\ProductCategoryQuery;
use common\vg\helpers\VgRandomSelectFromBigTable;
use common\vg\helpers\VgRandomizer;
use common\vg\models\VgProduct;
use yii\data\Pagination;
use yii\db\Expression;

class ProductManager
{
    /**
     * @param ProductCategory $productCategory
     * @param array $categoriesId
     * @return array
     */
    public function allChildCategoriesAsArray(ProductCategory $productCategory, &$categoriesId = []): array
    {
        $categoriesId[] = $productCategory->id;
        if ($productCategory->productCategories) {
            foreach ($productCategory->getProductCategories()->all() as $subCategory) {
                $this->allChildCategoriesAsArray($subCategory, $categoriesId);
            }
        }
        return $categoriesId;
    }

    /**
     * @param int $productCategoryId
     * @return array[array|VgProducts[], Pagination]
     */
    public static function getProductsByCategoryIdWithPagination($productCategoryId): array
    {
        $productCategory = ProductCategory::findOne($productCategoryId);


        $query = VgProduct::find()->where([
            'checked'     => true,
            'category_id' => $productCategoryId,
        ]);

        if ($productCategory->productCategories) {
            $r = (new self)->allChildCategoriesAsArray($productCategory);

            $query = VgProduct::find()->where([
                'checked'     => true,
                'category_id' => $productCategoryId,
            ])->orWhere(['IN', 'category_id', $r]);
        }

        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
        ]);
        $pages->setPageSize(64);

        $products = $query
            ->offset($pages->offset)
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

    /**
     * @param int $productsCount
     * @return array
     * @throws \Exception
     */
    public function getTopProducts(int $productsCount = 16)
    {
        return (new VgRandomSelectFromBigTable(
            VgProduct::find()
                ->select('id, thumb, name, price')
                ->where('thumb_checked=TRUE')
                ->andWhere('thumb IS NOT NULL'),

            new VgRandomizer(1, VgProduct::getMaxId())

        ))->getRandom($productsCount);
    }

    /**
     * @param int $limit
     * @return array
     * @throws \Exception
     */
    public function getNewProducts(int $limit = 16)
    {
        return (new VgRandomSelectFromBigTable(
            VgProduct::find()
                ->select('id, thumb, name, price')
                ->where('thumb_checked=TRUE')
                ->andWhere('thumb IS NOT NULL'),

            new VgRandomizer(1, VgProduct::getMaxId())

        ))->getRandom($limit);
    }

}
