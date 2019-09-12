<?php


namespace frontend\controllers;

use Yii;
use common\vg\manager\PasswordManager;
use common\vg\controllers\FrontendController;
use yii\filters\AccessControl;

class PasswordController extends FrontendController
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @return string
     * @throws \Throwable
     */
    public function actionIndex()
    {
            $user = Yii::$app->getUser();

        $passwordManager = new PasswordManager($user->getIdentity());
        $changeResult = $passwordManager->changePassword(Yii::$app->request->post());

        return $this->render('index', [
            'model'   => $passwordManager->getModel(),
            'success' => $changeResult,
        ]);
    }
}
