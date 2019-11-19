<?php

namespace frontend\controllers;

use common\models\Company;
use common\models\Product;
use common\vg\controllers\FrontendController;
use yii\db\ActiveRecord;

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
    }

    /**
     * @param int $companyId
     */
    public function actionNoCompanyThumb(int $companyId)
    {
        $company = Company::findOne($companyId);
        $this->setNoThumb($company);
    }

    /**
     * @param ActiveRecord $ar
     */
    protected function setNoThumb(ActiveRecord $ar): void
    {
        $ar->thumb = null;
        $ar->thumb_checked = true;
        $ar->save(false);
    }
}
