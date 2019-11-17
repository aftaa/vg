<?php

namespace common\vg\models;

use common\models\Member;

class VgMember extends Member
{
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        $password = md5($password);
        $result = $this->old_password == $password;
        return $result;
    }
}
