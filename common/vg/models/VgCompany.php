<?php


namespace common\vg\models;


use common\models\Company;
use common\models\CompanyParamValue;
use yii\db\ActiveQuery;

class VgCompany extends Company
{
    /**
     * @return ActiveQuery
     */
    public function getCompanyParamValues()
    {
        return $this->hasMany(CompanyParamValue::class, ['company_id' => 'id'])
            ->with('param')
            ->indexBy('param.code');
    }

}
