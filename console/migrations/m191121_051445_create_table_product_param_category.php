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

        $this->addForeignKey(self::FK_PRODUCT_CATEGORY_TABLE_PRODUCT_CATEGORY_ID, self::TABLE_NAME,
            self::PRODUCT_CATEGORY_ID_COLUMN, ProductCategory::tableName(), 'id');
        $this->addForeignKey(self::FK_PRODUCT_CATAGORY_TABLE_PRODUCT_PARAM_ID, self::TABLE_NAME,
            self::PRODUCT_PARAM_ID_COLUMN, 'product_param', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(self::PRODUCT_PARAM_ID_COLUMN, self::TABLE_NAME);
        $this->dropForeignKey(self::PRODUCT_CATEGORY_ID_COLUMN, self::TABLE_NAME);
        $this->dropPrimaryKey('PK', self::TABLE_NAME);
        $this->dropTable(self::TABLE_NAME);
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
