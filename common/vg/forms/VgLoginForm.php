<?php

namespace common\vg\forms;

use common\models\LoginForm;
use common\vg\models\VgMember;

class VgLoginForm extends LoginForm
{
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if ($user->password_hash) {
                if (!$user || !$user->validatePassword($this->password)) {
                    $this->addError($attribute, 'Ошибочный логин или пароль 1');
                }
            } else {
                $member = VgMember::find($user->getId())->limit(1)->one();
                if (!$member || !$member->validatePassword($this->password)) {
                    $this->addError($attribute, 'Ошибочный логин или пароль 2');
                }
            }
        }
    }
}
