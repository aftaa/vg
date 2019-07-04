<?php

namespace common\vg\manager;

use common\vg\models\VgCompanyCategory;
use yii\db\Exception;

class CompanyCategoryManager
{
    /**
     * @param int|null $companyCategoryParentId
     * @return VgCompanyCategory[]
     * @throws Exception
     */
    public static function getCategoriesByParentId(int $companyCategoryParentId = null): array
    {
        $categories = VgCompanyCategory::find()->categoriesByParentId($companyCategoryParentId);
        return $categories;
    }
}
