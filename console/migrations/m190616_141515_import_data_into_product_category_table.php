<?php

use yii\db\Migration;

/**
 * Class m190616_141515_import_data_into_product_category_table
 */
class m190616_141515_import_data_into_product_category_table extends Migration
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
        echo "m190616_141515_import_data_into_product_category_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190616_141515_import_data_into_product_category_table cannot be reverted.\n";

        return false;
    }
    */
}
