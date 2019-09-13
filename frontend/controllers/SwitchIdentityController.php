<?php

namespace frontend\controllers;

use common\models\User;
use common\vg\models\VgUser;
use Yii;
use yii\db\Query;
use yii\web\Controller;
use yii\web\Response;

class SwitchIdentityController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex(): string
    {
        $letters = (new Query)
            ->select('SUBSTRING(username FROM 1 FOR 1) AS letter, COUNT(username) AS count')
            ->from(User::tableName())
            ->groupBy('letter')
            ->orderBy('letter')
            ->all();

        return $this->render('index', [
            'letters' => $letters,
        ]);
    }

    /**
     * @param string $letter
     * @return string
     */
    public function actionByFirstLetter(string $letter): string
    {
        $users = User::find()
            ->select('username, id')
            ->indexBy('id')
            ->where("username LIKE '$letter%'")
            ->orderBy('username')
            ->column();

        return $this->render('by-first-letter', [
            'letter' => $letter,
            'users' => $users,
        ]);
    }

    /**
     * @param int $userId
     * @return Response
     */
    public function actionSwitchTo(int $userId)
    {
        VgUser::setOtherUser();

        $user = User::findOne($userId);
        Yii::$app->getUser()->switchIdentity($user);
        return $this->redirect('/profile');
    }

    public function actionReturn()
    {
        VgUser::returnToSuperUser();
        return $this->redirect('/switch-identity');
    }
}
