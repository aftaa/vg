<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%invoice}}`.
 */
class m200127_063509_added_by_root_column_to_invoice_table extends Migration
{
    const ADDED_BY_ROOT = 'added_by_root';
    const TABLE_NAME = 'invoice';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(self::TABLE_NAME, self::ADDED_BY_ROOT, $this
            ->boolean()
            ->defaultValue(false)
            ->comment('Администратором?'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(self::TABLE_NAME, self::ADDED_BY_ROOT);
    }
}
