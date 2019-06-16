<?php
namespace common\vg;

use Yii;

class Controller extends \yii\web\Controller
{
    public function init()
    {
        Yii::$app->language = 'ru-RU';
    }
}
