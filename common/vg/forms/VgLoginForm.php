<?php

namespace common\vg\forms;

use common\models\LoginForm;
use common\models\User;
use common\vg\models\VgMember;

class VgLoginForm extends LoginForm
{
    const ERROR_MESSAGE = 'Ошибочный логин или пароль';

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
                $this->stdYii2Autorization($attribute, $user);
            } else {
                $this->oldAuthorization($attribute, $user);
            }
        }
    }

    /**
     * @param string $attribute
     * @param User|null $user
     */
    protected function oldAuthorization(string $attribute, ?User $user): void
    {
        $member = VgMember::find($user->getId())->limit(1)->one();
        if (!$member || !$member->validatePassword($this->password)) {
            $this->addError($attribute, self::ERROR_MESSAGE);
        }
    }

    /**
     * @param string $attribute
     * @param User|null $user
     */
    protected function stdYii2Autorization(string $attribute, ?User $user): void
    {
        if (!$user || !$user->validatePassword($this->password)) {
            $this->addError($attribute, self::ERROR_MESSAGE);
        }
    }
}
