<?php

namespace frontend\controllers;

use common\models\CompanyCategory;
use common\vg\controllers\FrontendController;
use common\vg\manager\CompanyCategoryManager;

/**
 * Class CompanyController
 * @package frontend\controllers
 */
class CompanyController extends FrontendController
{
    /**
     * @return string
     */
    public function actionIndex(): string
    {
        return '';
    }

    /**
     * @param int $categoryId
     * @return string
     * @throws \Throwable
     */
    public function actionCategory(int $categoryId): string
    {
        $companyCategories = CompanyCategoryManager::getCategoriesByParentId($categoryId);
        $currentCategory = CompanyCategory::findOne($categoryId);

        return $this->render('category', [
            'companyCategories' => $companyCategories,
            'currentCategory'   => $currentCategory,
        ]);
    }

}