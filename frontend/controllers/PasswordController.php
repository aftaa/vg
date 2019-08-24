<?php


namespace frontend\controllers;


use common\vg\controllers\FrontendController;
use common\vg\forms\VgPasswordForm;
use phpDocumentor\Reflection\Types\Self_;
use Yii;

class PasswordController extends FrontendController
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $formModel = new VgPasswordForm();

        if ($formModel->load(Yii::$app->request->post()) && $formModel->change()) {
            return $this->goBack();
        } else {
            $formModel->oldPassword = '';
            $formModel->newPassword1 = '';
            $formModel->newPassword2 = '';

            return $this->render('index', [
                'formModel' => $formModel,
            ]);
        }
    }
}