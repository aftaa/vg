<?php

namespace frontend\controllers;

use app\models\CompanyWrongThumb;
use app\models\ProductWrongThumb;
use common\models\Company;
use common\models\Product;
use common\vg\controllers\FrontendController;
use yii\db\ActiveRecord;
use yii\db\Connection;

/**
 * Class PolicyController
 * @package frontend\controllers
 */
class PolicyController extends FrontendController
{
    /**
     * @param int $productId
     */
    public function actionNoProductThumb(int $productId)
    {
        $product = Product::findOne($productId);
        $this->setNoThumb($product);

        $productWrongThumb = new ProductWrongThumb;
        $productWrongThumb->product_id = $productId;
        $productWrongThumb->save();
    }

    /**
     * @param int $companyId
     */
    public function actionNoCompanyThumb(int $companyId)
    {
        $company = Company::findOne($companyId);
        $this->setNoThumb($company);

        $companyWrongThumb = new CompanyWrongThumb;
        $companyWrongThumb->company_id = $companyId;
        $companyWrongThumb->save();
    }

    /**
     * @param ActiveRecord $ar
     */
    protected function setNoThumb(ActiveRecord $ar): void
    {
        $ar->thumb = null;
        $ar->save(false);
    }

    public function createTable()
    {
        /** @var Connection $db */
        $db = Yii::get('dbDev');
        $db->createCommand("CREATE TABLE company_wrong_thumb(company_id INT NOT NULL)")->execute();
        $db->createCommand("CREATE TABLE product_wrong_thumb(product_id INT NOT NULL)")->execute();
    }
}
