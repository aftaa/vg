<?php

use common\models\Member;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%invoice}}`.
 */
class m191117_030750_create_invoice_table extends Migration
{
    const TABLE_NAME = '{{%invoice}}';
    const IDX_MEMBER_ID = 'idx-member-id';
    const COLUMN_NAME = 'member_id';
    const FK_MEMBER_ID = 'fk-member-id';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id'              => $this->primaryKey()->comment('№'),
            self::COLUMN_NAME => $this->integer()->notNull()->comment('Клиент'),
            'amount'          => $this->decimal(10, 2)->notNull()->comment('₽'),
            'created_at'      => $this->dateTime()->notNull()->comment('Счет выставлен'),
            'updated_at'      => $this->dateTime()->null()->comment('Счет оплачен'),
            'payment'         => $this->decimal(10, 2)->null()->comment('₽'),
            'commission'      => $this->decimal(10, 2)->null()->comment('Комиссия'),
            'order_id'        => $this->string()->null()->comment('№ в Единой кассе'),
        ]);

        $this->createIndex(self::IDX_MEMBER_ID, self::TABLE_NAME, self::COLUMN_NAME);
        $this->addForeignKey(self::FK_MEMBER_ID, self::TABLE_NAME, self::COLUMN_NAME,
            Member::tableName(), 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(self::FK_MEMBER_ID, self::TABLE_NAME);
        $this->dropIndex(self::IDX_MEMBER_ID, self::TABLE_NAME);
        $this->dropTable(self::TABLE_NAME);
    }
}
