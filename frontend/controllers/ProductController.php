<?php


namespace frontend\controllers;


use common\models\Product;
use common\models\ProductCategory;
use common\vg\controllers\FrontendController;
use common\vg\manager\ProductCategoryManager;
use common\vg\manager\ProductManager;
use common\vg\models\VgProduct;
use Yii;
use yii\web\Response;

class ProductController extends FrontendController
{
    public function actionIndex(int $productId)
    {
        $product = VgProduct::findOne($productId);
        return $this->render('index', [
            'product' => $product,
        ]);
    }

    /**
     * @param int $categoryId
     * @return string
     * @throws \Throwable
     */
    public function actionCategory(int $categoryId): string
    {
        $companyCategories = ProductCategoryManager::getCategoriesByParentId($categoryId);
        $currentCategory = ProductCategory::findOne($categoryId);
        [$products, $pages] = ProductManager::getProductsByCategoryIdWithPagination($categoryId);

        if ($this->app->request->isAjax) {
            return $this->renderPartial('_child_categories', [
                'productCategories' => $companyCategories,
            ]);
        }

        return $this->render('category', [
            'productCategories' => $companyCategories,
            'productCategory'   => $currentCategory,

            'allProducts' => $products,
            'pages'       => $pages,
        ]);
    }

    /**
     * @param int $productId
     * @return \yii\console\Response|Response
     */
    public function actionThumb(int $productId)
    {
        $product = Product::findOne($productId);

        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $response->data = [
            'id'            => $product->id,
            'thumb'         => $product->thumb,
            'thumb_checked' => $product->thumb_checked,
        ];

        return $response;
    }
}