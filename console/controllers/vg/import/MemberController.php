<?php

namespace console\controllers\vg\import;

use common\models\Member;
use common\models\User;
use Yii;
use yii\console\Controller;
use yii\db\Query;

class MemberController extends Controller
{
    const USERNAME = 'root';
    const PASSWORD = 'darkside';
    const EMAIL = 'root@vseti-goroda.ru';
    /**
     * {@inheritdoc}
     */
    public function actionIndex()
    {
        $db = Yii::$app->dbVsetigTest;

        $members = (new Query)
            ->select('*')
            ->from('aw_member');

        foreach ($members->each(5, $db) as $aw_member) {
            $member = new Member;

            $user = User::findOne(['email' => $aw_member['email']]);

            if ($user) {
                echo "Email $aw_member[email] не уникальный\n";
                continue;
            }

            $user = User::findOne(['username' => $aw_member['username']]);
            if ($user) {
                //TODO записывать в файл
                echo "Пользователь $aw_member[username] не уникальный\n";
                continue;
            }

            $user = new User;
            $user->id = $aw_member['userid'];
            $user->username = $aw_member['username'];
//            $user->password_hash = $aw_member['password'];
            $user->email = $aw_member['email'];
            $user->status = User::STATUS_ACTIVE;
            $user->auth_key = '';
            $user->password_hash = '';
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

        $this->createRootAndAdmin();
    }

    /**
     *
     */
    private function createRootAndAdmin()
    {
        $user = new User;
        $user->id = 0;
        $user->username = self::USERNAME;
        $user->setPassword(self::PASSWORD);
        $user->email = self::EMAIL;
        $user->status = User::STATUS_ACTIVE;
        $user->auth_key = $user->generateAuthKey();
        $user->save();



        $admin = User::findByUsername('admin');
        $admin->username = 'user';
        $admin->email = 'user@vseti-goroda.ru';
        $admin->save();

        $admin = new User;
        $admin->auth_key = $user->generateAuthKey();
        $admin->id = 1;
        $admin->username = 'admin';
        $admin->setPassword('vsetigoroda');
        $admin->email = 'admin@vseti-goroda.ru';
        $admin->status = User::STATUS_ACTIVE;
        $admin->save();
    }
}
