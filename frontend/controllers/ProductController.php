<?php


namespace frontend\controllers;


use common\models\ProductCategory;
use common\vg\controllers\FrontendController;
use common\vg\manager\ProductCategoryManager;
use common\vg\manager\ProductManager;
use common\vg\models\VgProduct;

class ProductController extends FrontendController
{
    public function actionIndex(int $productId)
    {
        $product = VgProduct::findOne($productId);
        return $this->render('index', [
            'product' => $product,
        ]);
    }

    /**
     * @param int $categoryId
     * @return string
     * @throws \Throwable
     */
    public function actionCategory(int $categoryId): string
    {
        $companyCategories = ProductCategoryManager::getCategoriesByParentId($categoryId);
        $currentCategory = ProductCategory::findOne($categoryId);
        [$products, $pages] = ProductManager::getProductsByCategoryIdWithPagination($categoryId);

        return $this->render('category', [
            'productCategories' => $companyCategories,
            'productCategory'   => $currentCategory,

            'products' => $products,
            'pages'    => $pages,
        ]);
    }

}