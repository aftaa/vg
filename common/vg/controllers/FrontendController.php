<?php

namespace common\vg\controllers;

use Yii;
use yii\web\Application;

class FrontendController extends Controller
{
    /**
     * @return int|string|null
     */
    public function getUserId()
    {
        $user = Yii::$app->getUser();

        if ($user->isGuest) {
            return null; // TODO exception (m.b. optional)
        }

        $userId = $user->getId();
        return $userId;
    }
}
