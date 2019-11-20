<?php

namespace frontend\controllers;

use common\models\Company;
use common\vg\controllers\FrontendController;
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
        $url = $this->app->getRequest()->get('url');
    }

    /**
     * @return string
     */
    public function actionRemoteFileSize()
    {
        $url = $this->app->getRequest()->get('url');
        $fileSize = $this->getFileSize($url);
        $return = [$fileSize];
        $return = json_encode($return);
        return $return;
    }

    /**
     * @param string $url
     * @return int|null
     */
    public function getFileSize(string $url): ?int
    {
        $fp = fopen($url, "r");
        $inf = stream_get_meta_data($fp);
        fclose($fp);
        foreach ($inf["wrapper_data"] as $v) {
            if (stristr($v, "content-length")) {
                $v = explode(":", $v);
                return trim($v[1]);
            }
        }
        return null;
    }
}