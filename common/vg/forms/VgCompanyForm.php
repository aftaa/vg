<?php


namespace common\vg\forms;


use common\models\Company;

class VgCompanyForm extends Company
{
    /** @var int  */
    public $companyCategoryId = 0;
    /** @var int  */
    public $areaId = 0;
    /** @var string  */
    public $name = '';
    /** @var string  */
    public $introduce = '';
    /** @var bool  */
    public $checked = false;
    /** @var string  */
    public $meta_keywords = '';
    /** @var string  */
    public $meta_description = '';
}
