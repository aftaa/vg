<?php


namespace frontend\controllers;

use Yii;
use common\vg\manager\PasswordManager;
use common\vg\controllers\FrontendController;

class PasswordController extends FrontendController
{
    /**
     * @return string
     * @throws \Throwable
     */
    public function actionIndex()
    {
        $user = Yii::$app->getUser();

        if ($user->isGuest) {
            return $this->goHome();
        }

        $passwordManager = new PasswordManager($user->getIdentity());
        $changeResult = $passwordManager->changePassword(Yii::$app->request->post());

        return $this->render('index', [
            'model'   => $passwordManager->getModel(),
            'success' => $changeResult,
        ]);
    }
}
