<?php

use yii\db\Migration;

/**
 * Class m191201_103856_add_FK_to_product_table
 */
class m191201_103856_add_FK_to_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk-product-company', 'product');

        Yii::$app->db->createCommand('SET foreign_key_checks = 0')->execute();
        $this->addForeignKey('fk-product-company', 'product', 'company_id',
            'company', 'id', 'SET NULL');

        Yii::$app->db->createCommand('SET foreign_key_checks = 0')->execute();
        $this->addForeignKey('fk-product-product-category', 'product', 'category_id',
            'product_category', 'id');
        Yii::$app->db->createCommand('SET foreign_key_checks = 1')->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-product-company', 'product');
        $this->dropForeignKey('fk-product-product-category', 'product');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191201_103856_add_FK_to_product_table cannot be reverted.\n";

        return false;
    }
    */
}
