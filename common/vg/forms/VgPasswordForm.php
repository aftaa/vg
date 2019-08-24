<?php


namespace common\vg\forms;


use common\models\User;
use Yii;
use yii\base\Model;

class VgPasswordForm extends Model
{
    /** @var string */
    public $oldPassword = '';
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
//            [['oldPassword', 'newPassword1', 'newPassword2'], 'required'],
        ];
    }

    public function change()
    {
        /** @var User $user */
        $user = Yii::$app->getUser()->getIdentity();

        if (!$user->validatePassword($this->oldPassword)) {
            die;
            $this->addError('oldPassword', 'Пароль не верен');
        }

        return !$this->hasErrors();
    }


    /**
     * @inheritDoc
     */
    public function attributeLabels()
    {
        return [
            'oldPassword'  => 'Старый пароль',
            'newPassword1' => 'Новый пароль',
            'newPassword2' => 'Ещё раз',
        ];
    }


}
