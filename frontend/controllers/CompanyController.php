<?php

namespace frontend\controllers;

use common\models\CompanyCategory;
use common\vg\controllers\FrontendController;
use common\vg\manager\CompanyCategoryManager;
use common\vg\manager\ProductManager;
use common\vg\models\VgCompany;
use Exception;

/**
 * Class CompanyController
 * @package frontend\controllers
 */
class CompanyController extends FrontendController
{
    /**
     * @param int $companyId
     * @return string
     */
    public function actionIndex(int $companyId): string
    {
        $company = VgCompany::findOne($companyId);
        $params = $company->companyParamValues;

        [$products, $pages] = ProductManager::getProductsByCompanyIdWithPagination($companyId);

        return $this->render('index', [
            'company'     => $company,
            'params'      => $params,
            'allProducts' => $products,
            'pages'       => $pages,
        ]);
    }

    /**
     * @param int $categoryId
     * @return string
     * @throws Exception
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
