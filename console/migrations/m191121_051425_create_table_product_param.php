<?php

use common\models\VgProductCategory;
use yii\db\Migration;

/**
 * Class m191121_051425_create_table_product_param
 */
class m191121_051425_create_table_product_param extends Migration
{
    const IDX_PRODUCT_PARAM_PRODUCT_CATEGORY_ID = 'idx-product-param-product-category-id';
    const TABLE_NAME = 'product_param';
    const FK_PRODUCT_PARAM_PRODUCT_CATEGORY_ID = 'fk-product-param-product-category-id';
    const PRODUCT_CATEGORY_ID_COLUMN = 'product_category_id';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id'                             => $this->primaryKey()->comment('№'),
            'name'                           => $this->string()->notNull()->comment('Параметр'),
            'code'                           => $this->string()->notNull()->comment('Код'),
            'sort'                           => $this->integer()->notNull()->comment('Сортировка'),
            self::PRODUCT_CATEGORY_ID_COLUMN => $this->integer()->notNull()->comment('Категория'),
        ]);

        $this->createIndex(self::IDX_PRODUCT_PARAM_PRODUCT_CATEGORY_ID, self::TABLE_NAME,
            self::PRODUCT_CATEGORY_ID_COLUMN);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        Yii::$app->db->createCommand('SET foreign_key_checks = 0')->execute();

        $this->dropIndex(self::IDX_PRODUCT_PARAM_PRODUCT_CATEGORY_ID, self::TABLE_NAME);
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
        echo "m191121_051425_create_table_product_param cannot be reverted.\n";

        return false;
    }
    */
}
