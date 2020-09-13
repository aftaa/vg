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
        $this->model = new VgPasswordForm;
    }

    /**
     * @param array $form
     * @return bool
     * @throws \Throwable
     */
    public function changePassword(array $form)
    {
        if ($this->loadForm($form) && $this->modelValidate()) {
            return $this->updatePassword();
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
     * @return bool
     */
    public function updatePassword(): bool
    {
//        $user = User::findOne(Yii::$app->getUser()->getId());
        $user = User::findOne($this->user->id);
        $user->setPassword($this->model->newPassword1);
        return $user->save();
    }

    /**
     * @param array $form
     * @return bool
     */
    public function loadForm(array $form): bool
    {
        return $this->model->load($form);
    }

    /**
     * @return bool
     */
    public function modelValidate(): bool
    {
        return $this->model->validate();
    }
}
