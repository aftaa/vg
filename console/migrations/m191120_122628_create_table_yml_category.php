<?php

use common\models\ProductCategory;
use yii\db\Migration;

/**
 * Class m191120_122628_create_table_yml_category
 */
class m191120_122628_create_table_yml_category extends Migration
{
    const TABLE_NAME = 'yml_category';
    const IDX_PARENT_ID = 'idx-yml-parent-id';
    const FK_PARENT_ID = 'fk-yml-parent-id';
    const PARENT_ID_COLUMN = 'parent_id';
    const IDX_PRODUCT_CATEGORY_ID = 'idx-product-category-id';
    const IDX_YML_FILE_ID = 'idx-yml-file-id';
    const FK_YML_FILE_ID = 'fk-yml-file-id';
    const FK_PRODUCT_CATEGORY_ID = 'fk-yml-product-category-id';
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
