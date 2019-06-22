<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%company_value}}`.
 */
class m190622_134136_create_company_value_table extends Migration
{
    const TABLE_NAME = 'company_param_value';
    const COMPANY_ID_COLUMN = 'company_id';
    const PARAM_ID_COLUMN = 'param_id';
    const VALUE_COLUMN = 'value';
    const IDX_COMPANY_ID = 'idx-company-id';
    const IDX_PARAM_ID = 'idx-param-id';
    const FK_COMPANY_ID = 'fk-company-id';
    const FK_PARAM_ID = 'fk-param-id';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id'                    => $this->primaryKey()->comment('№'),
            self::COMPANY_ID_COLUMN => $this->integer()->notNull()->comment('Компания'),
            self::PARAM_ID_COLUMN   => $this->integer()->notNull()->comment('Параметр'),
            self::VALUE_COLUMN      => $this->text()->notNull(),
        ]);

        $this->createIndex(self::IDX_COMPANY_ID, self::TABLE_NAME, self::COMPANY_ID_COLUMN);
        $this->createIndex(self::IDX_PARAM_ID, self::TABLE_NAME, self::PARAM_ID_COLUMN);

        $this->addForeignKey(self::FK_COMPANY_ID, self::TABLE_NAME, self::COMPANY_ID_COLUMN, 'company', 'id');
        $this->addForeignKey(self::FK_PARAM_ID, self::TABLE_NAME, self::PARAM_ID_COLUMN, 'company_param', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(self::FK_PARAM_ID, self::TABLE_NAME);
        $this->dropForeignKey(self::FK_COMPANY_ID, self::TABLE_NAME);

        $this->dropIndex(self::IDX_PARAM_ID, self::TABLE_NAME);
        $this->dropIndex(self::FK_COMPANY_ID, self::TABLE_NAME);

        $this->dropTable(self::TABLE_NAME);
    }
}
