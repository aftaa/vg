<?php

namespace frontend\controllers;

use common\models\Company;
use common\models\ProductCategory;
use common\models\YmlCategory;
use common\models\YmlFile;
use common\models\YmlOffer;
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
            $ymlCategory->name = trim((string)$category);
            $ymlCategory->sort = $sort++;
            $ymlCategory->yml_file_id = $ymlFile->id;
            $ymlCategory->product_category_id = null;
            $ymlCategory->parent_id = $category['parent_id'];
            $ymlCategory->yml_id = $category['id'];
            if (!$ymlCategory->save(false)) {
                echo '<pre>';
                print_r($ymlCategory->errors);
                echo '</pre>';
                die;
            }
        }

        foreach ($xml->shop->offers->children() as $fileOffer) {
            $offer = new YmlOffer;
            $offer->yml_file_id = $ymlFile->id;
            $offer->offer_id = $fileOffer['id'];
            $offer->available = 'true' == $fileOffer ? true : false;
            $offer->yml_category_id = (int)$fileOffer->categoryId;
            $offer->url = (string)$fileOffer->url;
            $offer->price = (double)$fileOffer->price;
            $offer->picture = (double)$fileOffer->picture;
            $offer->name = (string)$fileOffer->name;
            $offer->description = (string)$fileOffer->description;
            $offer->save(false);
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
     */
    public function actionCategories(int $fileId)
    {
        $siteCategories = ProductCategory::find()->indexBy('id')->all();
        $ymlCategories = YmlCategory::find()->where(['yml_file_id' => $fileId])->all();

        foreach ($ymlCategories as $ymlCategory) {
//            if (isset($siteCategories[$ymlCategory->name])) {
//                $ymlCategory->product_category_id = $siteCategories[$ymlCategory->name]->id;
//            }
            $sql = "SELECT * FROM product_category WHERE MATCH (name) AGAINST ('$ymlCategory->name LIMIT 1')";
            $r = \Yii::$app->db->createCommand($sql)->queryOne(\PDO::FETCH_ASSOC);

            if ($r) {
                $ymlCategory->product_category_id = $r['id'];
            }

        }

        return $this->render('categories', [
            'siteCategories' => $siteCategories,
            'ymlCategories'  => $ymlCategories,
        ]);
    }
}
