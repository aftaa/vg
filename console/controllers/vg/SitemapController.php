<?php


namespace console
\controllers\vg;

use common\models\Company;
use common\models\CompanyQuery;
use common\models\ProductQuery;
use common\vg\models\VgCompany;
use common\vg\models\VgProduct;
use SplFileObject;
use yii\console\Controller;
use yii\db\Expression;

class SitemapController extends Controller
{
    const SITEMAP_FILENAME = 'sitemap.txt';
    const LINE_SEPARATOR = "\n";

    /**
     * @return int
     */
    public function indexAction()
    {
        set_time_limit(0);

        $file = new SplFileObject(self::SITEMAP_FILENAME);
        $file->flock(LOCK_EX);

        $products = $this->getProducts();
        $companies = $this->getCompaniesQuery();

        foreach ($products->batch() as $product) {
            $file->fwrite($this->getProductLink($product));
            $file->fwrite(self::LINE_SEPARATOR);
        }

        foreach ($companies->batch() as $company) {
            $file->fwrite($this->getCompanyLink($company));
            $file->fwrite(self::LINE_SEPARATOR);
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
    protected function getProducts()
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