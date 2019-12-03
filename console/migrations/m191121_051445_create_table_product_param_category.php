<?php

use common\models\ProductCategory;
use yii\db\Migration;

/**
 * Class m191121_051445_create_table_product_param_category
 */
class m191121_051445_create_table_product_param_category extends Migration
{
    const PRODUCT_CATEGORY_TABLE = 'product_category_table';
    const TABLE_NAME = 'product_category_param';
    const PRODUCT_CATEGORY_ID_COLUMN = 'product_category_id';
    const FK_PRODUCT_CATEGORY_TABLE_PRODUCT_CATEGORY_ID = 'fk-product-category-table-product-category-id';
    const FK_PRODUCT_CATAGORY_TABLE_PRODUCT_PARAM_ID = 'fk-product-catagory-table-product-param-id';
    const PRODUCT_PARAM_ID_COLUMN = 'product_param_id';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            self::PRODUCT_CATEGORY_ID_COLUMN => $this->integer()->notNull()->comment('Категория'),
            self::PRODUCT_PARAM_ID_COLUMN           => $this->integer()->notNull()->comment('Параметр'),
        ]);

        $this->addPrimaryKey('PK', self::TABLE_NAME, [
            self::PRODUCT_CATEGORY_ID_COLUMN,
            self::PRODUCT_PARAM_ID_COLUMN,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        Yii::$app->db->createCommand('SET foreign_key_checks = 0')->execute();
        $this->dropTable(self::TABLE_NAME);
        Yii::$app->db->createCommand('SET foreign_key_checks = 1')->execute();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191121_051445_create_table_product_param_category cannot be reverted.\n";

        return false;
    }
    */
}
