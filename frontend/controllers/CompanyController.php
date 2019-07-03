<?php

namespace frontend\controllers;

use common\vg\controllers\FrontendController;
use common\vg\services\CompanyCategoryManager;

/**
 * Class CompanyController
 * @package frontend\controllers
 */
class CompanyController extends FrontendController
{
    /**
     * @param int $categoryId
     * @return string
     * @throws \Throwable
     */
    public function actionIndex(int $categoryId): string
    {
        $category = CompanyCategoryManager::getById($categoryId);

        return $this->render('index', [
            'categories'      => $category->companyCategories,
            'currentCategory' => $category,
        ]);
    }

    /**
     * @param int $categoryId
     * @return string
     * @throws \Throwable
     */
    public function actionCategory(int $categoryId): string
    {
        $category = CompanyCategoryManager::getById($categoryId);

        return $this->render('category', [
            'categories'      => $category->companyCategories,
            'companyCategory' => $category,
        ]);
    }

}