<?php

namespace common\vg\controllers;

use common\models\Member;
use common\models\User;
use Throwable;
use Yii;
use yii\db\ActiveQuery;

class FrontendController extends Controller
{
    /**
     * @return User
     * @throws Throwable
     */
    public function getUserIdentity()
    {
        $user = Yii::$app->getUser();
        return $user->isGuest ? null : $user->getIdentity();
    }

    /**
     * @return int|null
     * @throws Throwable
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

    /**
     * @return Member|null
     * @throws Throwable
     */
    public function getMember()
    {
        $userId = $this->getUserId();
        if (null !== $userId) {
            $user = User::findOne($userId);
            return $user->member;
        }
        return null;
    }
}
