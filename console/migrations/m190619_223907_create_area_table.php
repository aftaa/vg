<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%area}}`.
 */
class m190619_223907_create_area_table extends Migration
{
    const TABLE_NAME = 'area';
    const FK_AREA_PARENT_ID = 'fk-area-parent-id';
    const IDX_AREA_PARENT_ID = 'idx-area-parent-id';
    const PARENT_ID_COLUMN = 'parent_id';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%area}}', [
            'id'                   => $this->primaryKey()->comment('№'),
            self::PARENT_ID_COLUMN => $this->integer()->null()->comment('Родительский регион'),
            'name'                 => $this->string(100)->notNull()->comment('Область/населенный пункт'),
            'sort'                 => $this->integer()->unsigned()->notNull()->comment('Порядок'),
        ]);

        $this->createIndex(
            self::IDX_AREA_PARENT_ID,
            self::TABLE_NAME,
            self::PARENT_ID_COLUMN
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(self::IDX_AREA_PARENT_ID, self::TABLE_NAME);
        $this->dropTable('{{%area}}');
    }
}
