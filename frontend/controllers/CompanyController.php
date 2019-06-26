<?php


namespace frontend\controllers;


use common\models\CompanyCategory;
use common\vg\FrontendController;

/**
 * Class CompanyController
 * @package frontend\controllers
 */
class CompanyController extends FrontendController
{
    /**
     * @param int $categoryId
     * @return string
     */
    public function actionIndex(int $categoryId): string
    {
        $category = CompanyCategory::findOne(['id' => $categoryId]);
        $categories = $category->companyCategories;

        return $this->render('index', [
            'categories'      => $categories,
            'currentCategory' => $category,
        ]);
    }

    /**
     * @param int $categoryId
     * @return string
     */
    public function actionCategory(int $categoryId): string
    {
        $category = CompanyCategory::findOne(['id' => $categoryId]);
        $categories = $category->companyCategories;

        return $this->render('category', [
            'categories'      => $categories,
            'currentCategory' => $category,
        ]);
    }

}