<?php

namespace frontend\controllers;

use common\models\Company;
use common\vg\controllers\FrontendController;
use common\vg\helpers\ImportHelper;
use common\vg\manager\ImportManager;
use common\vg\models\import\FolderCreateException;
use yii\filters\AccessControl;

class ImportController extends FrontendController
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

    public function actionIndex(int $companyId)
    {
        $company = Company::findOne($companyId);
        return $this->render('index', [
            'company' => $company,
        ]);
    }

    public function actionCopy()
    {
        $url = $this->app->getRequest()->post('url');
        $companyId = $this->app->getRequest()->post('companyId');
        $manager = new ImportManager;
        $filename = $manager->createLocalFile($companyId, $url);

        $xml = simplexml_load_file($filename);
        echo $xml->yml_catalog;
    }

    /**
     * @return string
     */
    public function actionRemoteFileSize()
    {
        $url = $this->app->getRequest()->get('url');
        $fileSize = ImportHelper::getFileSize($url);
        $return = [$fileSize];
        $return = json_encode($return);
        return $return;
    }
}
