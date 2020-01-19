<?php

namespace frontend\controllers;

use common\models\Company;
use common\models\ProductCategory;
use common\vg\controllers\FrontendController;
use common\vg\models\VgCompany;
use common\vg\models\VgProduct;
use common\vg\models\VgProductCategory;
use phpDocumentor\Reflection\DocBlock\Tags\Formatter\AlignFormatter;
use Yii;
use yii\data\Pagination;
use yii\sphinx\Query;


class SearchController extends FrontendController
{
//    public function actionIndex(string $searchString, ?int $page, ?int $perPage)
    public function actionIndex()
    {

        $s = Yii::$app->request->get('s', ' ');
        $s = Yii::$app->sphinx->escapeMatchValue($s);

        $productCategories = $this->getProductCategories($s);
        $companies = $this->getCompanies($s);
        /** @var $pages Pagination */
        [$pages, $products] = $this->getProducts($s);

        /** @var int $page */
        $page = $pages->getPage();
        $pages->setPageSize(50);


        return $this->render('index', [
            'productCategories' => $productCategories,
            'products'          => $products,
            'companies'         => $companies,
            'pages'             => $pages,
            'showFull'          => !$page,
            's'                 => $s
        ]);
    }

    /**
     * @param string $s
     * @return array
     */
    protected function getProducts(string $s)
    {
        $total = (new Query())->from('product')->match($s)->count();

        $pages = new Pagination([
            'totalCount' => $total,
        ]);
        $pages->setPageSize(32);

        $productIds = (new Query)
            ->from('product')
            ->match($s)
            ->limit(32)
            ->offset($pages->offset)
            ->column();

        $products = VgProduct::find()
            ->where(['id' => $productIds])
            ->with('company')
            ->orderBy('RAND()')
            ->all();
        return [$pages, $products];
    }

    /**
     * @param string $s
     * @return array|Company[]|VgCompany[]
     */
    protected function getCompanies(string $s)
    {
        $companyIds = (new Query())
            ->from('company')
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
            ->from('product_category')
            ->match($s)
            ->limit(1000)
            ->column();

        $productCategories = VgProductCategory::find()->where(['id' => $productCategoryIds])->all();
        return $productCategories;
    }
}
