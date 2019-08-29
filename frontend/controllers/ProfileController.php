<?php


namespace frontend\controllers;

use common\models\Company;
use common\models\Member;
use common\models\User;
use common\vg\controllers\FrontendController;
use Yii;
use yii\helpers\Url;

class ProfileController extends FrontendController
{
    /**
     * @inheritDoc
     */
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::class,
//                'rules' => [
//                    [
//                        'actions' => ['index'],
//                        'allow' => false,
//                    ],
//                ],
//            ],
//        ];
//    }
    /**
     * @inheritDoc
     */
    public function beforeAction($action)
    {
        $userId = $this->getUserId();
        $member = Member::findOne(['user_id' => $userId]);
        if (!$member) {
            $member = new Member();
            $member->user_id = $userId;
            $member->save();
        }

        return parent::beforeAction($action);
    }


    /**
     * @return string
     */
    public function actionIndex()
    {
//        $model = new VgMemberForm();
        $model = Member::findOne(['user_id' => $this->getUserId()]);
        if ($model->load($this->app->request->post()) && $model->validate()) {
            $model->save();
            $success = true;
        } else {
            $success = false;
        }

        return $this->render('index', [
            'model'   => $model,
            'success' => $success
        ]);
    }

    public function actionCompanies()
    {
        /** @var User $user */
        $user = User::find($this->getUserId())->one();
        $member = $user->getMember()->one();
        $companies = $member->getCompanies()->all();

        return $this->render('companies', [
            'companies' => $companies,
            'flash' => $this->app->session->getFlash('companyCreated'),
        ]);
    }

    public function actionCompany($companyId)
    {
        $company = Company::findOne($companyId);
        if ($company->load($this->app->request->post()) && $company->validate()) {
            $company->save();
            $this->app->session->setFlash('companyUpdated', 'Данные компании обновлены');
            return $this->redirect(Url::to([
                '/profile/company',
                'companyId' => $companyId
            ]));
        }

        return $this->render('company', [
            'company' => $company,
            'flash' => $this->app->session->getFlash('companyUpdated'),
        ]);
    }

    /**
     * @return string
     */
    public function actionCreateCompany()
    {
        $company = new Company();
        $company->owner_id = $this->getUserId();

        if ($this->app->request->post()) {
            if ($company->load($this->app->request->post()) && $company->validate()) {
                $company->save();
                $this->app->session->setFlash('companyCreated', 'Компания создана');
                return $this->redirect(Url::to(['/profile/companies']));

            }
        }

        return $this->render('create-company', [
            'company' => $company,
        ]);
    }

    /**
     * @return string
     */
    public function actionTariff()
    {
        // TODO нужен ли этот метод?
        return $this->render('/site/blank');
    }

    /**
     * @return string
     */
    public function actionBalance()
    {
        $member = Member::findOne(parent::getUserId());
        $balance = $member->balance;

        return $this->render('balance', [
            'balance' => $balance,
        ]);
    }

    public function actionProducts()
    {
        return $this->render('/site/blank');
    }

    public function actionImport()
    {
        return $this->render('/site/blank');
    }
}
