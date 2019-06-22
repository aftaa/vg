<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%company_param}}`.
 */
class m190622_134136_create_company_param_table extends Migration
{
    const IDX_SORT = 'idx-sort';
    const TABLE_NAME = 'company_param';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%company_param}}', [
            'id' => $this->primaryKey()->comment('№'),
            'name' => $this->string('50')->notNull()->comment('Параметр'),
            'sort' => $this->integer()->notNull()->comment('Порядок'),
        ]);

        $this->createIndex(self::IDX_SORT, self::TABLE_NAME, 'sort');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(self::IDX_SORT, self::TABLE_NAME);
        $this->dropTable('{{%company_param}}');
    }
}
