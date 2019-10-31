<?php

namespace common\vg\models;

use common\models\Company;
use common\models\CompanyParamValue;
use common\vg\interfaces\VgGetMaxId;
use Yii;
use yii\db\ActiveQuery;
use yii\db\Exception;

class VgCompany extends Company implements VgGetMaxId
{
    const NO_LOGO = '/img/no_logo.jpg';

    /**
     * @return ActiveQuery
     */
    public function getCompanyParamValues()
    {
        return $this->hasMany(CompanyParamValue::class, ['company_id' => 'id'])
            ->with('param')
            ->indexBy('param.code');
    }

    /**
     * @return int
     * @throws Exception
     */
    public static function getMaxId(): int
    {
        return (int)Yii::$app->getDb()->createCommand('SELECT MAX(id) FROM company')->queryScalar();
    }
}
