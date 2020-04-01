<?php

namespace frontend\controllers;

use common\models\Company;
use common\models\ProductCategory;
use common\models\YmlCategory;
use common\models\YmlFile;
use common\vg\controllers\FrontendController;
use common\vg\helpers\ImportHelper;
use common\vg\manager\ImportManager;
use common\vg\models\import\VgYmlCategoryChoice;
use Yii;
use yii\db\Exception;
use yii\db\Query;
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
        return $this->render('profile', [
            'company' => $company,
        ]);
    }

    /**
     * @return \yii\web\Response
     * @throws Exception
     * @throws \Throwable
     */
    public function actionCopy()
    {
        $url = $this->app->getRequest()->post('url');
        $companyId = $this->app->getRequest()->post('companyId');

        $manager = new ImportManager($companyId, $url);
        $manager->import();

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
            'files'     => $files,
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

    /**
     * @param int $fileId
     * @return string
     * @throws Exception
     */
    public function actionCategories(int $fileId)
    {
        $siteCategories = ProductCategory::find()->indexBy('id')->all();
        $ymlCategories = YmlCategory::find()->where(['yml_file_id' => $fileId])->all();
        $choices = [];

        foreach ($ymlCategories as $ymlCategory) {
            $choice = new VgYmlCategoryChoice($ymlCategory);

            $sql = "SELECT * FROM product_category WHERE MATCH (name) AGAINST ('$ymlCategory->name') LIMIT 5";
            $res = Yii::$app->db->createCommand($sql)->query();

            /** @var array $productCategories */
            $productCategories = (new Query)
                ->select('*')
                ->from(ProductCategory::tableName())
                ->where("MATCH (name) AGAINST ('$ymlCategory->name')")
                ->limit(3)
                ->all();

            if ($productCategories) {
                foreach ($productCategories as $productCategory) {
                    $productCategoryObject = new ProductCategory;
                    $productCategoryObject->setAttributes($productCategory);
                    $choice->addChoice($productCategoryObject);
                }
            }

            $choices[$ymlCategory->id] = $choice;
        }

        return $this->render('categories', [
            'siteCategories' => $siteCategories,
            'ymlCategories'  => $ymlCategories,
            'choices'        => $choices,
        ]);
    }
}
