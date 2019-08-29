<?php


namespace common\vg\forms;


use common\models\User;
use yii\base\Model;

class VgPasswordForm extends Model
{
    /** @var string */
    public $oldPassword = '';
    /** @var string */
    public $newPassword1 = '';
    /** @var string */
    public $newPassword2 = '';
    /** @var User */
    private $user;

    /**
     * VgPasswordForm constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            [['oldPassword', 'newPassword1', 'newPassword2'], 'required'],
            ['oldPassword', 'checkPassword'],
            [['newPassword1', 'newPassword2'], 'checkPasswords'],
        ];
    }

    /**
     * @return bool
     */
    public function checkPassword()
    {
        if (!$this->user->validatePassword($this->oldPassword)) {
            $this->addError('oldPassword', 'Пароль не верен');
            $this->oldPassword = '';
            return false;
        }
        return true;
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
            'oldPassword'  => 'Старый пароль',
            'newPassword1' => 'Новый пароль',
            'newPassword2' => 'Повторите пароль',
        ];
    }
}
