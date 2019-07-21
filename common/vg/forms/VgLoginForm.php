<?php


namespace common\vg\forms;


use common\models\LoginForm;
use common\models\Member;

class VgLoginForm extends LoginForm
{
    /**
     * @param string $attribute
     * @param array $params
     * @return bool|void
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user->password_hash) { // used old password
                $userId = $user->getId();
                /** @var Member $member */
                $member = Member::find($userId);

                if (md5($this->password) == $member->old_password) {
                    return true; // TODO
                }
            } else {
                parent::validatePassword($attribute, $params);
            }
        }
    }
}