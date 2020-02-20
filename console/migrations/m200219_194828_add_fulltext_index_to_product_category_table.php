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
        $sql = "ALTER TABLE product_category ADD FULLTEXT INDEX `idx-fulltext-product-category` (name ASC)";
        Yii::$app->db->createCommand($sql)->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-fulltext-product-category', 'product_category');
        return true;
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
