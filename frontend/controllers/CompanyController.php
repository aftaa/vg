<?php


namespace frontend\controllers;


use common\models\CompanyCategory;
use common\vg\FrontendController;

class CompanyController extends FrontendController
{
    public function actionCategory(int $categoryId)
    {
        $category = CompanyCategory::findOne(['id' => $categoryId]);
        $categories = $category->companyCategories;

        return $this->render('index', [
            'categories' => $categories,
            'currentCategory' => $category,
        ]);
    }

}