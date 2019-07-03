<?php

namespace common\vg\models;

use common\models\CompanyCategory;
use yii\db\ActiveQuery;

class VgCompanyCategory extends CompanyCategory
{
    /** @var int */
    public $companyCount = 0;

    /**
     * @return ActiveQuery
     */
    public function getCompanyCategories()
    {
        return $this->hasMany(VgCompanyCategory::class, ['parent_id' => 'id']);
    }

}
