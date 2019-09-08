<?php

namespace common\vg\forms {

    use common\models\CompanyParam;
    use yii\base\Model;
    use yii\db\Query;

    class VgCompanyParamValueForm extends Model
    {
        /** @var array  */
        private $labels = [];
        /** @var int  */
        public $companyId = 0;

        /**
         * VgCompanyParamValueForm constructor.
         * @param int $companyId
         */
        public function __construct(int $companyId)
        {
            $codes = (new Query)
                ->select('code')
                ->from(CompanyParam::tableName())
                ->orderBy('sort')
                ->indexBy('code')
                ->column();

            foreach ($codes as $code => $name) {
                $this->$code = '';
            }

            $this->labels = (new Query)
                ->select('name')
                ->indexBy('code')
                ->from(CompanyParam::tableName())
                ->column();
        }

        /**
         * @param string $name
         * @param mixed $value
         */
        public function __set($name, $value)
        {
            $this->$name = $value;
        }

        /**
         * @inheritDoc
         */
        public function attributeLabels()
        {
            return $this->labels;
        }
    }

}
