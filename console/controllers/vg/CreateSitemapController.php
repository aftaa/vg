<?php

namespace console\controllers\vg;

use common\vg\models\sitemap\SiteMap;
use common\vg\models\sitemap\SiteMapMain;
use common\vg\models\sitemap\VgCompanySiteMapLink;
use common\vg\models\sitemap\VgProductSiteMapLink;
use common\vg\models\VgCompany;
use common\vg\models\VgProduct;
use DateTime;
use yii\console\Controller;
use Exception;

class CreateSitemapController extends Controller
{
    /** @var string */
    public $serverName = 'http://vseti-goroda.ru';

    /**
     * @return int
     * @throws Exception
     */
    public function actionIndex()
    {
        set_time_limit(0);
	ini_set('memory_limit', -1);
        $folder = getcwd() . '/frontend/web';

        $mapMain = new SiteMapMain;

        echo str_repeat("\n", 3);

        try {
            $siteMap = new SiteMap($folder);
            $productLink = new VgProductSiteMapLink($this->serverName);
            $companyLink = new VgCompanySiteMapLink($this->serverName);
            $filenames = $siteMap->build(VgProduct::find()->sitemap(), $productLink);

            foreach ($filenames as $filename) {
                $mapMain->addSitemap("$this->serverName/$filename", new DateTime('NOW'));
            }

            $filenames = $siteMap->build(VgCompany::find()->sitemap(), $companyLink);
            $mapMain->addSitemap("$this->serverName/$filenames[0]", new DateTime('NOW'));

            $mapMain->save("$folder/sitemap.xml");

            return 0;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
