<?php

namespace common\vg\forms;

use yii\base\Model;

class VgPasswordForm extends Model
{

    /** @var string */
    public $newPassword1 = '';
    /** @var string */
    public $newPassword2 = '';

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            [['newPassword1', 'newPassword2'], 'required'],
            [['newPassword1', 'newPassword2'], 'checkPasswords'],
        ];
    }

    /**
     * @return bool
     */
    public function checkPasswords()
    {
        if ($this->newPassword1 != $this->newPassword2) {
            $this->addError('newPassword1', 'Пароли не совпадают');
            $this->newPassword1 = $this->newPassword2 = '';
            return false;
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function attributeLabels()
    {
        return [
            'newPassword1' => 'Новый пароль',
            'newPassword2' => 'Повторите разок',
        ];
    }
}
