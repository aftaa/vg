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

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190626_024105_import_into_product_table cannot be reverted.\n";

        return false;
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
