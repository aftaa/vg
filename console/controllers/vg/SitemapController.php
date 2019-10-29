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

        $frontendFolder = realpath(__DIR__ . '../../../../frontend');
        if (file_exists($frontendFolder) && is_dir($frontendFolder) && is_writable($frontendFolder)) {
            "Folder: $frontendFolder exists and writable.\n";
        }

        $filename = "$frontendFolder/sitemap.txt";

        try {
//            file_put_contents($filename, "\n");
            $file = new SplFileObject($filename);
        } catch (RuntimeException $e) {
            echo $e->getMessage();
            return 1;
        }

        if (!$file->flock(LOCK_EX)) {
            echo "Cannot get exclusive access to $filename.\n";
            echo "Program was terminated.\n";
            return 1;
        } else {
            echo "File $filename was created\n\n";
        }

        try {
            $added = 0;
            $productsQuery = $this->getProductsQuery();
            foreach ($productsQuery->batch() as $products) {
                foreach ($products as $product) {
                    $file->fwrite($this->getProductLink($product));
                    $file->fwrite(self::LINE_SEPARATOR);
                    $added++;
                }
            }
            echo "Added products: $added\n";



            $added = 0;
            $companiesQuery = $this->getCompaniesQuery();
            foreach ($companiesQuery->batch() as $companies) {
                foreach ($companies as $company) {
                    $file->fwrite($this->getCompanyLink($company));
                    $file->fwrite(self::LINE_SEPARATOR);
                    $added++;
                }
            }
            echo "Added companies: $added\n";
        } catch (Exception $e) {
            $message = $e->getMessage();
            $message = iconv('windows-1251', 'utf-8', $message);
            echo $message;
            echo "File: ", $e->getFile(), self::LINE_SEPARATOR;
            echo "Line: ", $e->getLine(), self::LINE_SEPARATOR;
            return 1;
        }

        $file->flock(LOCK_UN);
        return 0;
    }

    /**
     * @param VgProduct $product
     * @return string
     */
    private function getProductLink(VgProduct $product)
    {
        return Url::to(['product/index', 'productId' => $product->id]);
    }

    /**
     * @param VgCompany $company
     * @return string
     */
    private function getCompanyLink(VgCompany $company)
    {
        return Url::to(['company/index', 'companyId' => $company->id]);
    }

    /**
     * @return ProductQuery
     */
    protected function getProductsQuery()
    {
        $products = VgProduct::find()
            ->where(['checked' => TRUE])
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
            ->where(['checked' => TRUE])
            ->orderBy(
                new Expression('thumb IS NULL DESC')
            );
        return $companies;
    }
}