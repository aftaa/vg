<?php

namespace frontend\controllers;

use common\models\Company;
use common\models\ProductCategory;
use common\vg\controllers\FrontendController;
use common\vg\models\VgCompany;
use common\vg\models\VgProduct;
use common\vg\models\VgProductCategory;
use Yii;
use yii\data\Pagination;
use yii\sphinx\Query;


class SearchController extends FrontendController
{
    public function actionIndex()
    {
        $s = Yii::$app->request->get('s');

        $productCategories = $this->getProductCategories($s);
        $companies = $this->getCompanies($s);
        [$pages, $products] = $this->getProducts($s);

        return $this->render('index', [
            'productCategories' => $productCategories,
            'products'          => $products,
            'companies'         => $companies,
            'pages'             => $pages,
        ]);
    }

    /**
     * @param string $s
     * @return array
     */
    protected function getProducts(string $s)
    {
        $total = (new Query())->from('vg_product_index')->match($s)->count();

        $pages = new Pagination([
            'totalCount' => $total,
        ]);
        $pages->setPageSize(32);

        $productIds = (new Query)
            ->from('vg_product_index')
            ->match($s)
            ->limit(32)
            ->offset($pages->offset)
            ->column();


        $products = VgProduct::find()->where(['id' => $productIds])->with('company')->all();
        return [$pages, $products];
    }

    /**
     * @param string $s
     * @return array|Company[]|VgCompany[]
     */
    protected function getCompanies(string $s)
    {
        $companyIds = (new Query())
            ->from('vg_company_index')
            ->match($s)
            ->limit(1000)
            ->column();

        $companies = VgCompany::find()->where(['id' => $companyIds])->all();
        return $companies;
    }

    /**
     * @param string $s
     * @return array|ProductCategory[]|VgProductCategory[]
     */
    protected function getProductCategories(string $s)
    {
        $productCategoryIds = (new Query())
            ->from('vg_product_category_index')
            ->match($s)
            ->limit(1000)
            ->column();

        $productCategories = VgProductCategory::find()->where(['id' => $productCategoryIds])->all();
        return $productCategories;
    }
}
