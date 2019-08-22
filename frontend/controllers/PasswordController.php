<?php


namespace frontend\controllers;


use common\vg\controllers\FrontendController;

class PasswordController extends FrontendController
{
    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionChange()
    {

    }
}