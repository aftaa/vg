<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_category}}`.
 */
class m190616_134735_create_product_category_table extends Migration
{
    const TABLE_NAME = 'product_category';
    const FK_CATEGORY_ID = 'fk-category-id';
    const IDX_CATEGORY_PARENT_ID = 'idx-category-parent-id';
    const PARENT_ID_COLUMN = 'parent_id';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id'                   => $this->primaryKey()->comment('№'),
            self::PARENT_ID_COLUMN => $this->integer()->null()->comment('Родительская категория'),
            'name'                 => $this->string(100)->notNull()->comment('Категория'),
            'description'          => $this->text()->null()->comment('Описание'),
            'sort'                 => $this->integer()->unsigned()->notNull()->defaultValue(0)->comment('Порядок'),
            'icon'                 => $this->string(30)->null()->comment('Иконка'),
            'meta_keywords'        => $this->text()->null()->comment('Meta Keywords'),
            'meta_description'     => $this->text()->null()->comment('Meta Description'),
        ]);

        $this->createIndex(
            self::IDX_CATEGORY_PARENT_ID,
            self::TABLE_NAME,
            self::PARENT_ID_COLUMN
        );

        $this->addForeignKey(
            self::FK_CATEGORY_ID,
            self::TABLE_NAME,
            self::PARENT_ID_COLUMN,
            self::TABLE_NAME,
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(self::FK_CATEGORY_ID, self::TABLE_NAME);
        $this->dropIndex(self::IDX_CATEGORY_PARENT_ID, self::TABLE_NAME);
        $this->dropTable(self::TABLE_NAME);
    }
}
