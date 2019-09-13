<?php

use common\models\User;
use yii\db\Migration;

/**
 * Class m190910_172941_add_admin_user_into_users
 */
class m190910_172941_add_admin_user_into_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $admin = User::findByUsername('admin');
        $admin->username = 'user';
        $admin->email = 'user@vseti-goroda.ru';
        $admin->save();

        $admin = new User;
        $admin->id = 2;
        $admin->username = 'admin';
        $admin->setPassword('vsetigoroda');
        $admin->email = 'admin@vseti-goroda.ru';
        $admin->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        User::deleteAll(['id' => 2]);
        $admin = User::findByUsername('user');
        $admin->username = 'admin';
        $admin->email = 'admin@vseti-goroda.ru';
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190910_172941_add_admin_user_into_users cannot be reverted.\n";

        return false;
    }
    */
}
