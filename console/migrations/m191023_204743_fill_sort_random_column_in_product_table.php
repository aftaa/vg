<?php

use yii\db\Migration;

/**
 * Class m191023_204743_fill_sort_random_column_in_product_table
 */
class m191023_204743_fill_sort_random_column_in_product_table extends Migration
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
        echo "m191023_204743_fill_sort_random_column_in_product_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191023_204743_fill_sort_random_column_in_product_table cannot be reverted.\n";

        return false;
    }
    */
}
