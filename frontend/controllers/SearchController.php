<?php

namespace frontend\controllers;

use common\vg\controllers\FrontendController;

class SearchController extends FrontendController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}