<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%company}}`.
 */
class m190622_134101_create_company_table extends Migration
{
    const TABLE_NAME = 'company';
    const IDX_OWNER_ID = 'idx-owner-id';
    const IDX_CATEGORY_ID = 'idx-category-id';
    const FK_AREA_ID = 'fk-area-id';
    const FK_CATEGORY_ID = 'fk-category-id';
    const FK_OWNER_ID = 'fk-owner-id';
    const OWNER_ID_COLUMN = 'owner_id';
    const CATEGORY_ID_COLUMN = 'category_id';
    const AREA_ID_COLUMN = 'area_id';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%company}}', [
            'id'                     => $this->primaryKey()->comment('№'),
            self::OWNER_ID_COLUMN    => $this->integer()->notNull()->comment('Владелец'),
            self::CATEGORY_ID_COLUMN => $this->integer()->notNull()->comment('Категория'),
            self::AREA_ID_COLUMN            => $this->integer()->notNull()->comment('Регион'),

            'name'      => $this->string(100)->notNull()->comment('Компания'),
            'introduce' => $this->text()->null()->comment('Описание'),
            'thumb'     => $this->string(100)->null()->comment('Картинка'),
            'checked'   => $this->boolean()->notNull()->defaultValue(false)->comment('Проверена'),

            'meta_keywords'    => $this->text()->null()->comment('Meta Keywords'),
            'meta_description' => $this->text()->null()->comment('Meta Description'),
        ]);

        $this->createIndex(self::IDX_OWNER_ID, self::TABLE_NAME, self::OWNER_ID_COLUMN);
        $this->createIndex(self::IDX_CATEGORY_ID, self::TABLE_NAME, self::CATEGORY_ID_COLUMN);
        $this->createIndex('idx-area-id', self::TABLE_NAME, self::AREA_ID_COLUMN);

        $this->addForeignKey(self::FK_OWNER_ID, self::TABLE_NAME, self::OWNER_ID_COLUMN, 'user', 'id');
        $this->addForeignKey(self::FK_CATEGORY_ID, self::TABLE_NAME, self::CATEGORY_ID_COLUMN, 'company_category', 'id');
        $this->addForeignKey(self::FK_AREA_ID, self::TABLE_NAME, self::AREA_ID_COLUMN, 'area', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(self::FK_AREA_ID, self::TABLE_NAME);
        $this->dropForeignKey(self::FK_CATEGORY_ID, self::TABLE_NAME);
        $this->dropForeignKey(self::FK_OWNER_ID, self::TABLE_NAME);
        $this->dropTable('{{%company}}');
    }
}
