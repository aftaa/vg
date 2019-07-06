<?php

namespace frontend\controllers;

use common\models\CompanyCategory;
use common\vg\controllers\FrontendController;
use common\vg\manager\CompanyCategoryManager;
use common\vg\models\VgCompany;
use yii\base\InvalidConfigException;

/**
 * Class CompanyController
 * @package frontend\controllers
 */
class CompanyController extends FrontendController
{
    /**
     * @param int $companyId
     * @return string
     * @throws InvalidConfigException
     */
    public function actionIndex(int $companyId): string
    {
        $company = VgCompany::findOne($companyId);
        $params = $company->getParams($companyId    );

        return $this->render('index', [
            'company' => $company,
            'params'  => $params,
        ]);
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