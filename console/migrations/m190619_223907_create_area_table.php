<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%area}}`.
 */
class m190619_223907_create_area_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%area}}', [
            'id'        => $this->primaryKey(),
            'parent_id' => $this->integer()->notNull()->defaultValue(0)->comment('Родительский регион'),
            'name'      => $this->string(100)->notNull()->comment('Область/населенный пункт'),
            'sort'      => $this->integer()->unsigned()->notNull()->comment('Порядок'),
        ]);

        $this->createIndex('idx-area-name', 'area', 'parent_id');
        $this->addForeignKey('fk-area-parent-id', 'area', 'parent_id', 'area', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%area}}');
    }
}
