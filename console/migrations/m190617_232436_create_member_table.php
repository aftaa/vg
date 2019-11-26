<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%member}}`.
 */
class m190617_232436_create_member_table extends Migration
{
    const FK_USER_ID = 'fk-member-user-id';
    const IDX_USER_ID = 'idx-user-id';
    const TABLE = 'member';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%member}}', [
            'id'           => $this->primaryKey()->comment('№'),
            'user_id'      => $this->integer()->notNull()->comment('№ пользователя'),
            'first_name'   => $this->string(50)->null()->comment('Имя'),
            'last_name'    => $this->string(50)->null()->comment('Фамилия'),
            'middle_name'  => $this->string(50)->null()->comment('Отчество'),
            'position'     => $this->string(50)->null()->comment('Должность'),
            'old_password' => $this->string(32)->null()->comment('Старый пароль'),

            //            'country_code' => $this->char(2)->notNull()->comment('Код страны'),
            //            'country_name' => $this->string(50)->notNull()->comment('Страна'),
            //            'postal_code' => $this->string(10)->null()->comment('Почтовый индекс'),
            //            'city' => $this->string(10)->notNull()->comment('Город'),
            //            'address' => $this->text()->null()->comment('Адрес'),
            'phone'        => $this->string(20)->null()->comment('Телефон'),

            'balance'  => $this->decimal(10, 2)->notNull()->defaultValue(.0)->comment('Баланс'),
            'user_pic' => $this->string(100)->null()->comment('Аватар'),
        ]);

        $this->createIndex(self::IDX_USER_ID, self::TABLE, 'user_id');

        $this->addForeignKey(self::FK_USER_ID, self::TABLE, 'user_id',
            'user', 'id', 'SET NULL', 'SET NULL');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(self::IDX_USER_ID, self::TABLE);
        $this->dropTable('{{%member}}');
    }
}
