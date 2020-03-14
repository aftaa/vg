<?php

use yii\db\Migration;

/**
 * Class m200218_112632_modify_yml_offer_table
 */
class m200218_112632_modify_yml_offer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql[] = 'alter table yml_offer drop foreign key `fk-yml-offer-yml-category`';
        $sql[] = 'alter table yml_offer drop foreign key `fk-yml-offer-yml-file`';

        foreach ($sql as $q) {
            Yii::$app->db->createCommand($q)->execute();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200218_112632_modify_yml_offer_table cannot be reverted.\n";
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200218_112632_modify_yml_offer_table cannot be reverted.\n";

        return false;
    }
    */
}
