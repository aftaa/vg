<?php namespace common\tests\manager;

use common\fixtures\UserFixture;
use common\models\User;
use common\vg\forms\VgLoginForm;
use common\vg\manager\PasswordManager;
use Yii;

class PasswordTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;

    protected function _before()
    {
        $this->tester->haveFixtures([
            'users' => [
                'class'    => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ]);
    }

    protected function _after()
    {
    }

    // tests
    public function testChangeAdminPassword()
    {
        $user = User::findByUsername('admin');
        expect_that($user !== null);

        $manager = new PasswordManager($user);
        $newPassword = 'vsetigoroda';

        try {
            expect_that((object)$manager->changePassword([
                'newPassword1' => $newPassword,
                'newPassword2' => $newPassword,
            ]));
        } catch (\Throwable $e) {
            expect_that(false);
        }

        expect_that($formModel = new VgLoginForm);
        expect_that($formModel->load([
            'username' => 'admin',
            'password' => $newPassword,
        ]));
        expect_that($formModel->login());
    }
}
