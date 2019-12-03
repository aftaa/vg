<?php

namespace frontend\controllers;

use common\models\Company;
use common\models\YmlCategory;
use common\models\YmlFile;
use common\vg\controllers\FrontendController;
use common\vg\helpers\ImportHelper;
use common\vg\manager\ImportManager;
use yii\filters\AccessControl;
use yii\helpers\Url;

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
        $ymlFile = $manager->createLocalFile($companyId, $url);

        $xml = simplexml_load_file($ymlFile->local_filename);
        $sort = 1;
        foreach ($xml->shop->categories->children() as $category) {
            $ymlCategory = new YmlCategory;
            $ymlCategory->name = (string)$category;
            $ymlCategory->sort = $sort++;
            $ymlCategory->yml_file_id = $ymlFile->id;
            $ymlCategory->product_category_id = null;
            $ymlCategory->parent_id = null;
            if (!$ymlCategory->save()) {
                echo '<pre>'; print_r($ymlCategory->errors); echo '</pre>'; die;
            }
        }

        foreach ($xml->shop->offers->children() as $offer) {
            
        }

        return $this->redirect(Url::to(['import/files', 'companyId' => $companyId]));
    }

    /**
     * @param int $companyId
     * @return string
     */
    public function actionFiles(int $companyId)
    {
        $files = YmlFile::find()->orderBy(['created_at' => SORT_DESC, 'updated_at' => SORT_ASC])->all();

        return $this->render('files', [
            'files' => $files,
            'companyId' => $companyId,
        ]);
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
