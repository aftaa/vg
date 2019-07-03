<?php

namespace common\vg\manager;

use common\vg\models\VgCompanyCategory;

class CompanyCategoryManager
{
    /**
     * @param int|null $companyCategoryParentId
     * @return VgCompanyCategory[]
     */
    public static function getByParentId(int $companyCategoryParentId = null): array
    {
        $category = VgCompanyCategory::find()->byParentId($companyCategoryParentId);
        return $category;
    }
}
