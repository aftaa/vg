<?php

namespace common\vg\models;

use common\models\User;
use Yii;

class VgUser extends User
{
    const SUPER_USERS_IDS = [1, 2];

    /**
     * @return bool
     */
    public static function isSuperUser()
    {
        $currentUserId = Yii::$app->getUser()->getId();
        $result = in_array($currentUserId, self::SUPER_USERS_IDS);
        return $result;
    }

    /**
     * @return bool
     */
    public static function isUnderOtherUser(): bool
    {
        $result = Yii::$app->session->has(self::class);
        return $result;
    }

    /**
     * @throws \Throwable
     */
    public static function setOtherUser()
    {
        $suIdentity = Yii::$app->getUser()->getIdentity();
        Yii::$app->session->set(self::class, $suIdentity);
    }

    /**
     *
     */
    public static function returnToSuperUser()
    {
        $suIdentity = Yii::$app->session->get(self::class);
        Yii::$app->session->remove(self::class);
        Yii::$app->getUser()->switchIdentity($suIdentity);
    }
}
