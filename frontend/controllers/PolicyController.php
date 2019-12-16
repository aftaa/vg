<?php

namespace frontend\controllers;

use common\models\Company;
use common\models\CompanyWrongThumb;
use common\models\Product;
use common\models\ProductWrongThumb;
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
        $thumb = $product->thumb;
        $this->setNoThumb($product);

        $productWrongThumb = new ProductWrongThumb;
        $productWrongThumb->product_id = $productId;
        $productWrongThumb->thumb = $thumb;
        $productWrongThumb->save();
    }

    /**
     * @param int $companyId
     */
    public function actionNoCompanyThumb(int $companyId)
    {
        $company = Company::findOne($companyId);
        $thumb = $company->thumb;
        $this->setNoThumb($company);

        $companyWrongThumb = new CompanyWrongThumb;
        $companyWrongThumb->company_id = $companyId;
        $companyWrongThumb->thumb = $thumb;
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
        $db->createCommand("CREATE TABLE company_wrong_thumb(company_id INT NOT NULL, thumb VARCHAR(500) NOT NULL DEFAULT '')")->execute();
        $db->createCommand("CREATE TABLE product_wrong_thumb(product_id INT NOT NULL, thumb VARCHAR(500) NOT NULL DEFAULT '')")->execute();
    }
}
