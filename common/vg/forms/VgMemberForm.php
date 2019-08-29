<?php


namespace common\vg\forms;


use common\models\Member;

class VgMemberForm extends Member
{
    public $first_name = '';
    public $last_name = '';
    public $middle_name = '';
    public $position = '';
    public $phone = '';

    private $user;



    public function rules()
    {
        return [
            [['firstName', 'lastName'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
}