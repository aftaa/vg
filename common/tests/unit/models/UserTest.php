<?php namespace common\tests\models;

use common\fixtures\UserFixture;
use common\models\User;
use common\vg\models\VgUser;

class UserTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $this->tester->haveFixtures([
            'users' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ]);
    }

    protected function _after()
    {
    }

    // tests
    public function testNotSuperUser()
    {
        expect_that(!VgUser::isSuperUser());
    }

    public function testGetAdminUserFromDb()
    {
        $user = VgUser::findByUsername('admin');
        expect_that((bool)$user);
    }
}