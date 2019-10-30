<?php

namespace console\controllers\vg;

use common\models\CompanyQuery;
use common\models\ProductQuery;
use common\vg\models\VgCompany;
use common\vg\models\VgProduct;
use Exception;
use RuntimeException;
use SplFileObject;
use yii\console\Controller;
use yii\db\Expression;

class SitemapController extends Controller
{
    const SITEMAP_FILENAME = 'sitemap.txt';
    const LINE_SEPARATOR = "\n";

    /**
     * @var string
     */
    private $siteMapFileName;

    /**
     * @return int
     */
    public function actionIndex()
    {
        set_time_limit(0);

        $frontendFolder = realpath(__DIR__ . '../../../../frontend/web');
        if (file_exists($frontendFolder) && is_dir($frontendFolder) && is_writable($frontendFolder)) {
            echo "Folder: $frontendFolder exists and writable.\n";
        }

        $filename = "$frontendFolder/sitemap.txt";
        $f = fopen($filename, 'w');
        flock($f, LOCK_EX);

        $added = 0;
        $productsQuery = $this->getProductsQuery();
        foreach ($productsQuery->batch() as $products) {
            foreach ($products as $product) {
                $productLink = $this->getProductLink($product);
                fwrite($f, $productLink);
                fwrite($f, self::LINE_SEPARATOR);
                $added++;
            }
        }
        echo "Added products: $added\n";


        $added = 0;
        $companiesQuery = $this->getCompaniesQuery();
        foreach ($companiesQuery->batch() as $companies) {
            foreach ($companies as $company) {
                $companyLink = $this->getCompanyLink($company);
                echo $companyLink, self::LINE_SEPARATOR;
                fwrite($f, $companyLink);
                fwrite($f, self::LINE_SEPARATOR);
                $added++;
            }
        }
        echo "Added companies: $added\n";

        flock($f, LOCK_UN);
        fclose($f);
        return 0;

    }

    /**
     * @param VgProduct $product
     * @return string
     */
    private function getProductLink(VgProduct $product)
    {
        return "/product/$product->id";
    }

    /**
     * @param VgCompany $company
     * @return string
     */
    private function getCompanyLink(VgCompany $company)
    {
        return "/company/$company->id";
    }

    /**
     * @return ProductQuery
     */
    protected function getProductsQuery()
    {
        $products = VgProduct::find()
            ->where(['checked' => true])
            ->orderBy(
                new Expression('thumb IS NULL DESC')
            );
        return $products;
    }

    /**
     * @return CompanyQuery
     */
    protected function getCompaniesQuery()
    {
        $companies = VgCompany::find()
            ->where(['checked' => true])
            ->orderBy(
                new Expression('thumb IS NULL DESC')
            );
        return $companies;
    }
}