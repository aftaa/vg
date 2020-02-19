<?php

use yii\db\Migration;

/**
 * Class m200219_194828_add_fulltext_index_to_product_category_table
 */
class m200219_194828_add_fulltext_index_to_product_category_table extends Migration
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
        echo "m200219_194828_add_fulltext_index_to_product_category_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200219_194828_add_fulltext_index_to_product_category_table cannot be reverted.\n";

        return false;
    }
    */
}
