<?php


namespace frontend\controllers;


use common\models\ProductCategory;
use common\vg\controllers\FrontendController;
use common\vg\manager\ProductCategoryManager;

class ProductController extends FrontendController
{
    /**
     * @param int $categoryId
     * @return string
     * @throws \Throwable
     */
    public function actionCategory(int $categoryId): string
    {
        $companyCategories = ProductCategoryManager::getCategoriesByParentId($categoryId);
        $currentCategory = ProductCategory::findOne($categoryId);

        return $this->render('category', [
            'productCategories' => $companyCategories,
            'productCategory'   => $currentCategory,
        ]);
    }

}