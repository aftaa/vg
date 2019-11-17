<?php

namespace common\vg\controllers;

use Yii;

class Controller extends \yii\web\Controller
{
    /** @var yii\web\Application */
    protected $app;

    public function init()
    {
        Yii::$app->language = 'ru-RU';
        $this->app = Yii::$app;
    }
}
