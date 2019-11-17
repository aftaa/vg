<?php

use yii\db\Migration;

/**
 * Class m190924_175032_add_thumb_index_to_product_table
 */
class m190924_175032_add_thumb_index_to_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('idx-thumb', 'product', 'thumb');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-thumb', 'product');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190924_175032_add_thumb_index_to_product_table cannot be reverted.\n";

        return false;
    }
    */
}
