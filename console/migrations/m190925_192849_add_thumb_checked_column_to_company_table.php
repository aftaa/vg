<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%company}}`.
 */
class m190925_192849_add_thumb_checked_column_to_company_table extends Migration
{
    const TABLE_NAME = 'company';
    const COLUMN_NAME = 'thumb_checked';
    const INDEX_NAME = 'idx-thumb-checked';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(self::TABLE_NAME, self::COLUMN_NAME, $this->boolean()->after('thumb')
            ->comment('Изображение проверено')->notNull()->defaultValue(false));
        $this->createIndex(self::INDEX_NAME, self::TABLE_NAME, self::COLUMN_NAME);

        $tableName = self::TABLE_NAME;
        Yii::$app->db->createCommand("UPDATE $tableName SET thumb_checked=TRUE WHERE thumb IS NULL")->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
