<?php

use yii\db\Migration;

/**
 * Class m190626_024105_import_into_product_table
 */
class m190626_024105_import_into_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $db = Yii::$app->dbVsetigInfoCom;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190626_024105_import_into_product_table cannot be reverted.\n";

        return false;
    }
    */
}
