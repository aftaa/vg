<?php

namespace frontend\controllers;

use common\models\Member;
use common\vg\controllers\FrontendController;
use common\vg\forms\VgLoginForm;
use common\vg\manager\AreaManager;
use common\vg\manager\CompanyCategoryManager;
use common\vg\manager\CompanyManager;
use common\vg\manager\ProductCategoryManager;
use common\vg\manager\ProductManager;
use common\vg\models\ContactForm;
use common\vg\models\VgUser;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends FrontendController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'  => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow'   => true,
                        'roles'   => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],

            //cache
            [
                'class' => 'yii\filters\PageCache',
                'only' => ['index'],
                'duration' => 30,
            ],
            //longest cache
            [
                'class' => 'yii\filters\PageCache',
                'only' => ['about', 'tariffs'],
                'duration' => 24 * 3600,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],

            'captcha' => [
                'class'           => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     * @throws \Throwable
     */
    public function actionIndex()
    {
        set_time_limit(0);

        $productCategories = ProductCategoryManager::getCategoriesByParentId();
        $companyCategories = CompanyCategoryManager::getCategoriesByParentId();

        $productManager = new ProductManager;
        $topProducts = $productManager->getTopProducts(32);
        $newProducts = $productManager->getNewProducts(32);

        $companyManager = new CompanyManager;
        $topCompanies = $companyManager->getTopCompanies();
        $newCompanies = $companyManager->getNewCompanies();

        $areas = (new AreaManager)->getAreas();

        return $this->render('index', [
            'productCategories' => $productCategories,
            'topProducts'       => $topProducts,
            'newProducts'       => $newProducts,
            'companyCategories' => $companyCategories,
            'topCompanies'      => $topCompanies,
            'newCompanies'      => $newCompanies,
            'areas'             => $areas,
        ]);
    }

    public function actionIAgree()
    {
        setcookie('I-agree', true, time() + time() + 3600 * 24 * 365, '/');
    }

    /**
     * @return string|Response
     * @throws \Throwable
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $formModel = new VgLoginForm;
        if ($formModel->load(Yii::$app->request->post()) && $formModel->login()) {

            if (VgUser::isSuperUser() && !Member::find(['user_id' => $this->getUserId()])) {
                $member = new Member();
                $member->user_id = $this->getUserId();
                $member->save(false);
            }

            $this->redirect('/profile');
        } else {
            $formModel->password = '';

            return $this->render('login', [
                'formModel' => $formModel,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Спасибо за&nbsp;ваше сообщение и&nbsp;ыы&nbsp;постараемся связаться с&nbsp;вами как можно быстрее!');
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка при отправке сообщения.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Спасибо за регистрацию, проверьте электронную почту для ее подтверждения.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @return Response
     * @throws BadRequestHttpException
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Электронная почта успешно подтверждена!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    /**
     * @return string
     */
    public function actionTariffs(): string
    {
        return $this->render('tariffs');
    }

    /**
     * @return string
     */
    public function actionOffline(): string
    {
        return $this->render('offline');
    }
}
