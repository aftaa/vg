<?php

namespace frontend\controllers;

use common\vg\controllers\FrontendController;
use yii\web\Response;

class ThemeController extends FrontendController
{
    /**
     * @return Response
     */
    public function actionDark()
    {
        setcookie('theme', 'dark', time() + 3600 * 24 * 365);
        return $this->redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * @return Response
     */
    public function actionLight()
    {
        setcookie('theme', 'light', time() + 3600 * 24 * 365);
        return $this->redirect($_SERVER['HTTP_REFERER']);
    }
}