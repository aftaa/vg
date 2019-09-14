<?php

namespace common\vg\controllers;

use common\models\User;
use Yii;

class FrontendController extends Controller
{
    /**
     * @return User
     * @throws \Throwable
     */
    public function getUserIdentity()
    {
        $user = Yii::$app->getUser();
        return $user->isGuest ? null : $user->getIdentity();
    }

    /**
     * @return int|null
     * @throws \Throwable
     */
    public function getUserId()
    {
        $user = Yii::$app->getUser();

        if ($user->isGuest) {
            return null; // TODO exception (m.b. optional)
        }

        $userId = $user->getIdentity()->getId();
        return $userId;
    }
}
