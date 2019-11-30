<?php

namespace common\vg\manager;

use common\vg\helpers\VgRandomSelectFromBigTable;
use common\vg\helpers\VgRandomizer;
use common\vg\models\VgCompany;
use yii\db\Exception;

/**
 * Class CompanyManager
 * @package common\vg\manager
 */
class CompanyManager
{

    /**
     * @param int $companiesCount
     * @return array
     * @throws Exception
     */
    public function getTopCompanies(int $companiesCount = 16)
    {
        return (new VgRandomSelectFromBigTable(
            VgCompany::find()
                ->andWhere('thumb IS NOT NULL'),

            new VgRandomizer(1, VgCompany::getMaxId())

        ))->getRandom($companiesCount);
    }

    /**
     * @param int $limit
     * @return array
     * @throws Exception
     */
    public function getNewCompanies(int $limit = 16)
    {
        return (new VgRandomSelectFromBigTable(
            VgCompany::find()
                ->andWhere('thumb IS NOT NULL'),

            new VgRandomizer(1, VgCompany::getMaxId())

        ))->getRandom($limit);
    }
}
