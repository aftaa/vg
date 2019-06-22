<?php


namespace frontend\controllers;


use common\vg\FrontendController;

class CompanyController extends FrontendController
{
    public function actionCategory(int $categoryId)
    {
        return $categoryId;
    }

}