<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%company_param}}`.
 */
class m191026_225954_add_display_column_to_company_param_table extends Migration
{
    const TABLE_NAME = 'company_param';
    const INDEX_NAME = 'idx-company-param';
    const COLUMN_NAME = 'display';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(self::TABLE_NAME, self::COLUMN_NAME,
            $this->boolean()->notNull()->defaultValue(false)->comment('Показать')
        );
        $this->createIndex(self::INDEX_NAME, self::TABLE_NAME, self::COLUMN_NAME);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(self::INDEX_NAME, self::TABLE_NAME);
        $this->dropColumn(self::TABLE_NAME, self::COLUMN_NAME);
    }
}
