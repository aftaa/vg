<?php

use yii\db\Migration;

/**
 * Class m190616_213144_add_parent_id_index_into_product_category_table
 */
class m190616_213144_add_parent_id_index_into_product_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'idx-category-parent-id',
            'product_category',
            'parent_id',
            false
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'idx-category-parent-id',
            'product_category',
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190616_213144_add_parent_id_index_into_product_category_table cannot be reverted.\n";

        return false;
    }
    */
}
