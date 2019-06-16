<?php

use common\models\User;
use yii\db\Migration;

/**
 * Class m190615_140930_add_root_user_into_users
 */
class m190615_140930_add_root_user_into_users extends Migration
{
    const USERNAME = 'root';
    const PASSWORD = 'darkside';
    const EMAIL = 'root@vseti-goroda.ru';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user = new User;
        $user->username = self::USERNAME;
        $user->setPassword(self::PASSWORD);
        $user->email = self::EMAIL;
        $user->status = User::STATUS_ACTIVE;
        $user->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m190615_140930_add_root_user_into_users cannot be reverted.\n";
        $user = User::findByUsername(self::USERNAME);
        $user->delete();

        //return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190615_140930_add_root_user_into_users cannot be reverted.\n";

        return false;
    }
    */
}
