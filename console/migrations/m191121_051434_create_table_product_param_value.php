<?php

use yii\db\Migration;

/**
 * Class m191121_051434_create_table_product_param_value
 */
class m191121_051434_create_table_product_param_value extends Migration
{
    const TABLE_NAME = 'product_param_value';
    const IDX_PRODUCT_PARAM_VALUE_PRODUCT_ID = 'idx-product-param-value-product-id';
    const IDX_PRODUCT_PARAM_VALUE_PRODUCT_PARAM_ID = 'idx-product-param-value-product-param-id';
    const FK_PRODUCT_PARAM_VALUE_PRODUCT_ID = 'fk-product-param-value-product-id';
    const PRODUCT_ID_COLUMN = 'product_id';
    const FK_PRODUCT_PARAM_VALUE_PRODUCT_PARAM_ID = 'fk-product-param-value-product-param-id';
    const PRODUCT_PARAM_ID_COLUMN = 'product_param_id';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable(self::TABLE_NAME);
        $this->createTable(self::TABLE_NAME, [
            'id'                          => $this->primaryKey()->comment('№'),
            self::PRODUCT_ID_COLUMN       => $this->integer()->notNull()->comment('Продукт'),
            self::PRODUCT_PARAM_ID_COLUMN => $this->integer()->notNull()->comment('Параметр'),
            'value'                       => $this->string()->notNull()->defaultValue('')->comment('Значение'),
        ]);

        $this->createIndex(self::IDX_PRODUCT_PARAM_VALUE_PRODUCT_ID, self::TABLE_NAME, self::PRODUCT_ID_COLUMN);
        $this->createIndex(self::IDX_PRODUCT_PARAM_VALUE_PRODUCT_PARAM_ID, self::TABLE_NAME, self::PRODUCT_PARAM_ID_COLUMN);
        $this->addForeignKey(self::FK_PRODUCT_PARAM_VALUE_PRODUCT_ID, self::TABLE_NAME,
            self::PRODUCT_ID_COLUMN, 'product', 'id');
        $this->addForeignKey(self::FK_PRODUCT_PARAM_VALUE_PRODUCT_PARAM_ID, self::TABLE_NAME,
            self::PRODUCT_PARAM_ID_COLUMN, 'product_param', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(self::FK_PRODUCT_PARAM_VALUE_PRODUCT_PARAM_ID, self::TABLE_NAME);
        $this->dropForeignKey(self::FK_PRODUCT_PARAM_VALUE_PRODUCT_ID, self::TABLE_NAME);
        $this->dropIndex(self::IDX_PRODUCT_PARAM_VALUE_PRODUCT_PARAM_ID, self::TABLE_NAME);
        $this->decimal(self::IDX_PRODUCT_PARAM_VALUE_PRODUCT_ID, self::TABLE_NAME);
        $this->dropTable(self::TABLE_NAME);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191121_051434_create_table_product_param_value cannot be reverted.\n";

        return false;
    }
    */
}
