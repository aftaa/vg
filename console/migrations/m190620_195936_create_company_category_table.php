<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%company_category}}`.
 */
class m190620_195936_create_company_category_table extends Migration
{
    const TABLE_NAME = 'company_category';
    const IDX_PARENT_ID = 'idx-parent-id';
    const PARENT_ID_COLUMN = 'parent_id';
    const FK_PARENT_ID = 'fk-parent-id';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%company_category}}', [
            'id'                   => $this->primaryKey()->comment('№'),
            self::PARENT_ID_COLUMN => $this->integer()->null()->comment('Родительская категория'),
            'name'                 => $this->string(50)->notNull()->comment('Категория компании'),
            'sort'                 => $this->integer()->unsigned()->notNull()->defaultValue(0)->comment('Порядок'),
            'icon'                 => $this->string(30)->null()->comment('Иконка'),
            'meta_keywords'        => $this->text()->null()->comment('Meta Keywords'),
            'meta_description'     => $this->text()->null()->comment('Meta Description'),
        ]);

        $this->createIndex(self::IDX_PARENT_ID, self::TABLE_NAME, self::PARENT_ID_COLUMN);
        $this->addForeignKey(self::FK_PARENT_ID, self::TABLE_NAME, self::PARENT_ID_COLUMN,
            self::TABLE_NAME, 'id', 'SET NULL', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(self::FK_PARENT_ID, self::TABLE_NAME);
        $this->dropIndex(self::IDX_PARENT_ID, self::TABLE_NAME);
        $this->dropTable('{{%company_category}}');
    }
}
