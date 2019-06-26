<?php

use common\models\Company;
use common\models\CompanyParam;
use common\models\CompanyParamValue;
use common\models\Member;
use yii\db\Migration;
use yii\db\Query;

/**
 * Class m190622_190911_import_company_data
 */
class m190622_190911_import_company_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $params = [
            'phone'       => 'Телефон',
            'linkman'     => 'Контактное лицо',
            'icq'         => 'ICQ',
            'msn'         => 'MSN',
            'email'       => 'E-mail',
            'fax'         => 'Факс',
            'address'     => 'Адрес',
            'mappoint'    => 'map_point',
            'click'       => 'clicks',
            'postdate'    => 'Дата публикации',
            'total_votes' => 'total_votes',
            'total_value' => 'total_value',
            'sait'        => 'Веб-сайт',
            'socset'      => 'Ссылка на социальную сеть',
            'youtube'     => 'YouTube',
            'Mon'         => 'Пн',
            'Tue'         => 'Вт',
            'Wed'         => 'Ср',
            'Thu'         => 'Чт',
            'Fri'         => 'Пт',
            'Sat'         => 'Сб',
            'Sun'         => 'Вс',
        ];

        $paramId = [];
        $i = 1;
        foreach ($params as $oldParam => $param) {
            $companyParam = new CompanyParam;
            $companyParam->sort = $i++;
            $companyParam->name = $param;
            $companyParam->save();
            $paramId[$oldParam] = $companyParam->id;
        }

        //print_r($paramId);

        $db = Yii::$app->dbVsetigTest;

        $aw_com = (new Query)
            ->select('*')
            ->from('aw_com')
            ->all($db);

        foreach ($aw_com as $com) {
            $company = new Company;
            $company->id = $com['comid'];

            $member = Member::findOne($com['userid']);
            if (!$member) {
                $company->owner_id = null;
            } else {
                $company->owner_id = $com['userid'];
            }


            $company->company_category_id = $com['catid'];
            $company->area_id = $com['areaid'];
            $company->name = $com['comname'];
            $company->introduce = $com['introduce'];
            $company->thumb = $this->modifyThumb($com['thumb']);
            $company->checked = $com['is_check'];
            $company->meta_keywords = $com['keywords'];
            $company->meta_description = $com['description'];
            $company->save();

            foreach ($params as $code => $param) {
                $value = $paramId[$code];
                $value = (string)$value;
                $value = trim($value);
                if (!strlen($value)) {
                    continue;
                }

                $paramValue = new CompanyParamValue;
                $paramValue->company_id = $company->id;
                $paramValue->param_id = $value;
                $paramValue->value = $com[$code];
                $paramValue->save();
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        Yii::$app->db->createCommand('SET foreign_key_checks = 0')->execute();
        Yii::$app->db->createCommand('TRUNCATE TABLE company_param_value')->execute();
        Yii::$app->db->createCommand('TRUNCATE TABLE company_param')->execute();
        Yii::$app->db->createCommand('TRUNCATE TABLE company')->execute();
        Yii::$app->db->createCommand('SET foreign_key_checks = 1')->execute();
    }

    /**
     * @param string $thumb
     * @return string
     */
    private function modifyThumb(string $thumb): string
    {
        if (preg_match('/^data/', $thumb)) {
            $thumb = 'http://vseti-goroda.ru/' . $thumb;
        }
        return $thumb;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190622_190911_import_company_data cannot be reverted.\n";

        return false;
    }
    */
}
