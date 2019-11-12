<?php

namespace console\controllers\vg;

use common\models\CompanyQuery;
use common\models\ProductQuery;
use common\vg\models\sitemap\SiteMap;
use common\vg\models\sitemap\VgCompanySiteMapLink;
use common\vg\models\sitemap\VgProductSiteMapLink;
use common\vg\models\VgCompany;
use common\vg\models\VgProduct;
use yii\console\Controller;
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

        $filenames = [];

        try {
            $siteMap = new SiteMap($folder);
            $productQuery = new ProductQuery(VgProduct::class);
            $companyQuery = new CompanyQuery(VgCompany::class);

            $filenames[] = $siteMap->build(($productQuery->sitemap()), VgProductSiteMapLink::class);
            $filenames[] = $siteMap->build(($companyQuery->sitemap()), VgCompanySiteMapLink::class);

            return 0;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
