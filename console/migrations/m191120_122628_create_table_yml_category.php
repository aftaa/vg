<?php

use common\models\VgProductCategory;
use yii\db\Migration;

/**
 * Class m191120_122628_create_table_yml_category
 */
class m191120_122628_create_table_yml_category extends Migration
{
    const TABLE_NAME = 'yml_category';
    const PARENT_ID_COLUMN = 'parent_id';
    const PRODUCT_CATEGORY_ID = 'product_category_id';
    const YML_FILE_ID = 'yml_file_id';


    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id'                      => $this->primaryKey()->comment('№'),
            self::PARENT_ID_COLUMN    => $this->integer()->null()->comment('Родительская YML-категория'),
            'name'                    => $this->string()->notNull()->comment('Категория YML-файла'),
            'sort'                    => $this->integer()->null()->comment('Сортировка'),
            self::PRODUCT_CATEGORY_ID => $this->integer()->null()->comment('Наша категория'),
            self::YML_FILE_ID         => $this->integer()->notNull()->comment('YML-файл'),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191120_122628_create_table_yml_category cannot be reverted.\n";

        return false;
    }
    */
}
