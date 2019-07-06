<?php


namespace common\vg\models;


use common\models\Company;
use common\models\CompanyParam;
use common\models\CompanyParamValue;
use yii\base\InvalidConfigException;
use yii\db\ActiveRecord;

class VgCompany extends Company
{
    /**
     * @param int $companyId
     * @return array|ActiveRecord[]
     * @throws InvalidConfigException
     */
    public function getParams()
    {
        $params = $this->hasMany(CompanyParamValue::class, ['id' => 'company_id'])
            ->viaTable('company_param', ['param_id' => 'id'])
            ->all();
        return $params;
    }
}