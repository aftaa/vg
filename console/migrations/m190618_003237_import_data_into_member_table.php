<?php

use common\models\Member;
use common\models\User;
use yii\db\Migration;
use yii\db\Query;

/**
 * Class m190618_003237_import_data_into_member_table
 */
class m190618_003237_import_data_into_member_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $db = Yii::$app->dbVsetigTest;

        $members = (new Query)
            ->select('*')
            ->from('aw_member');

        foreach ($members->each(10) as $aw_member) {
            $member = new Member;

            $user = User::findOne(['email' => $aw_member['email']]);

            if ($user) {
                echo "Email $aw_member[email] не уникальный\n";
                continue;
            }

            $user = User::findOne(['username' => $aw_member['username']]);
            if ($user) {
                echo "Пользователь $aw_member[username] не уникальный\n";
                continue;
            }

            $user = new User;
            $user->id = $aw_member['userid'];
            $user->username = $aw_member['username'];
//            $user->password_hash = $aw_member['password'];
            $user->email = $aw_member['email'];
            $user->status = User::STATUS_ACTIVE;
            $user->created_at = $aw_member['registertime'];
            if (!$user->save()) {
                print_r($user->errors);
                return false;
            } else {
                echo "User: $user->username added\n";
            }

            $member->id = $aw_member['userid'];
            $member->user_id = $aw_member['userid'];
            $member->old_password = $aw_member['password'];
            $member->first_name = $aw_member['ferstname'];
            $member->last_name = $aw_member['family'];
            $member->middle_name = $aw_member['lastname'];
            $member->position = $aw_member['unp'];
            $member->phone = $aw_member['phone'];
            $member->balance = $aw_member['money'];
            $member->user_pic = $aw_member['avatar'];
            if (!$member->save()) {
                print_r($member->errors);
                return false;
            } else {
                echo "Member: $user->username added\n";
            }
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        Yii::$app->db->createCommand('TRUNCATE TABLE member')->execute();
        Yii::$app->db->createCommand('DELETE FROM user WHERE id > 1')->execute();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190618_003237_import_data_into_member_table cannot be reverted.\n";

        return false;
    }
    */
}
