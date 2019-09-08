<?php

use common\models\Member;
use yii\db\Migration;
use yii\db\Query;

/**
 * Class m190829_111311_import_tariff_into_company_table
 */
class m190829_111311_import_tariff_into_company_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $dbvt = Yii::$app->get('dbVsetigTest');

        $awTariff = (new Query())->select('userid,tarif')->from('aw_member');

        foreach ($awTariff->batch() as $items) {
            foreach ($items as $row) {
                $id = $row['userid'];
                $tariffName = trim($row['tarif']);

                if (!$tariffName) {
                    continue;
                }

                $member = Member::findOne($id);
                $member->old
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190829_111311_import_tariff_into_company_table cannot be reverted.\n";

        return false;
    }

}
