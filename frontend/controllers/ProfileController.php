<?php


namespace frontend\controllers;

use common\models\Company;
use common\models\Member;
use common\models\User;
use common\vg\controllers\FrontendController;
use common\vg\forms\VgCompanyParamValueForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Response;

class ProfileController extends FrontendController
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

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

        $this->view->params['hideLogo'] = true;

        return parent::beforeAction($action);
    }


    /**
     * @return string
     * @throws \Throwable
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

    /**
     * @return string
     * @throws \Throwable
     */
    public function actionCompanies()
    {
        /** @var User $user */
        $user = Yii::$app->getUser()->getIdentity();
        $member = $user->member;
        $companies = $member->companies;

        return $this->render('companies', [
            'companies' => $companies,
            'flash'     => $this->app->session->getFlash('companyCreated'),
        ]);
    }

    public function actionCompany($companyId)
    {
        $company = Company::findOne($companyId);

        $paramsForm = new VgCompanyParamValueForm($companyId);
        //$paramValues = $company->getCompanyParamValues()->all();


        if ($company->load($this->app->request->post()) && $company->validate()) {
            $company->save();

//            $companyParamValue = new CompanyParamValue;
//            $companyParamValue->load($this->app->request->post());
            // TODO saving

            $this->app->session->setFlash('companyUpdated', 'Данные компании обновлены');
            return $this->redirect(Url::to([
                '/profile/company',
                'companyId' => $companyId
            ]));
        }

        return $this->render('company', [
            'company' => $company,
            'params'  => $paramsForm,
            'flash'   => $this->app->session->getFlash('companyUpdated'),
        ]);
    }

    /**
     * @return string|Response
     * @throws \Throwable
     */
    public function actionCreateCompany()
    {
        if ($this->app->request->post('Company')) {
            $company = new Company($this->app->request->post('Company'));
            $company->owner_id = $this->getUserIdentity()->member->id;
            $company->checked = 0;
            if ($company->validate()) {
                if ($company->save()) {
                    $this->app->session->setFlash('companyCreated', 'Компания создана');
                    return $this->redirect(Url::to('/profile/companies'));
                }
            } else {
                echo '<pre>'; print_r($company->getErrorSummary(true)); echo '</pre>'; die;
            }
        } else {
            $company = new Company();
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
     * @throws \Throwable
     */
    public function actionBalance()
    {
        $member = Member::findOne(parent::getUserId());
        $balance = $member->balance;

        return $this->render('balance', [
            'balance' => $balance,
        ]);
    }

    public function actionProducts(int $companyId): string
    {
        /** @var Company $company */
        $company = $this->getUserIdentity()->member->getCompanies()->where("id=$companyId")->one();

        $activeQuery = $company->getProducts()->orderBy('')->with('category');

        $provider = new ActiveDataProvider([
            'query'      => $activeQuery,
            'pagination' => [
                'pageSize' => 100,
            ],
            'sort'       => [
                'defaultOrder' => [
                    'updated_at' => SORT_DESC,
                ]
            ],
        ]);

        return $this->render('products', [
            'company'  => $company,
            'provider' => $provider,
        ]);
    }

    public function actionImport()
    {
        return $this->render('site/blank');
    }
}
