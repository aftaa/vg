<?php

namespace common\vg\manager;

use common\models\User;
use common\vg\forms\VgPasswordForm;
use Yii;

class PasswordManager
{
    /** @var VgPasswordForm */
    public $model;
    /** @var User */
    private $user;

    /**
     * PasswordManager constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->model = new VgPasswordForm($user);
    }

    /**
     * @param array $form
     * @return bool
     * @throws \Throwable
     */
    public function changePassword(array $form)
    {
        if ($this->model->load($form) && $this->model->validate()) {
            $this->updatePassword();
            return true;
        } else {
            return false;
        }

    }

    /**
     * @return VgPasswordForm
     */
    public function getModel(): VgPasswordForm
    {
        return $this->model;
    }

    /**
     *
     */
    private function updatePassword(): void
    {
        $user = User::findOne(Yii::$app->getUser()->getId());
        $user->setPassword($this->model->newPassword1);
        $user->save();
    }
}
