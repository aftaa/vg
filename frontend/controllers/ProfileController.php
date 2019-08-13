<?php


namespace frontend\controllers;

use common\vg\controllers\FrontendController;

class ProfileController extends FrontendController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [

        ]);
    }

}