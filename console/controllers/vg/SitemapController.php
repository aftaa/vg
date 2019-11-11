<?php

namespace console\controllers\vg;

use common\models\CompanyQuery;
use common\models\ProductQuery;
use common\vg\models\VgCompany;
use common\vg\models\VgProduct;
use frontend\models\SiteMap;
use yii\console\Controller;
use yii\db\Expression;
use Exception;

class SitemapController extends Controller
{
    /**
     * @return int
     * @throws Exception
     */
    public function actionIndex()
    {
        set_time_limit(0);

        $folder = getcwd() . '/frontend/web';

        $siteMap = new SiteMap(
            $folder,
            (new CompanyQuery)->sitemap(),
            (new ProductQuery)->sitemap()
        );

        return 0;
    }

    /**
     * @param VgProduct $product
     * @return string
     */
    private function getProductLink(VgProduct $product)
    {
        return "$this->serverName/product/$product->id";
    }

    /**
     * @param VgCompany $company
     * @return string
     */
    private function getCompanyLink(VgCompany $company)
    {
        return "$this->serverName/company/$company->id";
    }
}
