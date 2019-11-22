<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m190626_024050_create_product_table extends Migration
{
    const TABLE_NAME = 'product';
    const IDX_PRODUCT_COMPANY_ID = 'idx-product-company-id';
    const IDX_PRODUCT_CATEGORY_ID = 'idx-product-category-id';
    const COMPANY_ID_COLUMN = 'company_id';
    const CATEGORY_ID_COLUMN = 'category_id';
    const FK_PRODUCT_COMPANY_ID = 'fk-product-company-id';
    const FK_PRODUCT_CATEGORY_ID = 'fk-product-category-id';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id'                     => $this->primaryKey()->comment('№'),
            self::COMPANY_ID_COLUMN  => $this->integer()->notNull()->comment('Компания'),
            self::CATEGORY_ID_COLUMN => $this->integer()->notNull()->comment('Категория'),

            'name'        => $this->string(500)->notNull()->comment('Товар'),
            'description' => $this->text()->null()->comment('Описание'),
            'thumb'       => $this->string(250)->null()->comment('Изображение'),

            'checked' => $this->boolean()->notNull()->defaultValue(false)->comment('Проверен'),
            'price'   => $this->decimal(10, 2)->comment('Стоимость'),

            'meta_keywords'    => $this->text()->null()->comment('Meta Keywords'),
            'meta_description' => $this->text()->null()->comment('Meta Description'),

            'created_at' => $this->dateTime()->notNull()->comment('Создан'),
            'updated_at' => $this->dateTime()->comment('Изменен'),
            'deleted_at' => $this->dateTime()->comment('Удалён'),

        ]);

        $this->createIndex(self::IDX_PRODUCT_COMPANY_ID, self::TABLE_NAME, self::COMPANY_ID_COLUMN);
        $this->createIndex(self::IDX_PRODUCT_CATEGORY_ID, self::TABLE_NAME, self::CATEGORY_ID_COLUMN);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        Yii::$app->db->createCommand('SET foreign_key_checks = 0')->execute();

        $this->dropIndex(self::IDX_PRODUCT_CATEGORY_ID, self::TABLE_NAME);
        $this->dropIndex(self::IDX_PRODUCT_COMPANY_ID, self::TABLE_NAME);

        Yii::$app->db->createCommand('SET foreign_key_checks = 1')->execute();

        $this->dropTable('{{%product}}');
    }
}
