<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%product}}`.
 */
class m191023_032920_add_sort_random_column_to_product_table extends Migration
{
    const TABLE_NAME = 'product';
    const COLUMN_NAME = 'sort_random';
    const INDEX_NAME = 'idx-sort-random';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(self::TABLE_NAME, self::COLUMN_NAME, $this->integer());
        $this->createIndex(self::INDEX_NAME, self::TABLE_NAME, self::COLUMN_NAME);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(w
    {
        $this->dropIndex(self::INDEX_NAME, self::TABLE_NAME);
        $this->dropColumn(self::TABLE_NAME, self::COLUMN_NAME);
    }
}
