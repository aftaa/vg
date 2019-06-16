<?php

namespace frontend\controllers;

use common\models\ProductCategory;
use common\models\ProductCategoryQuery;
use common\vg\FrontendController;
use Yii;

class CategoryController extends FrontendController
{
    public function actionIndex()
    {
        $categoryId = Yii::$app->request->get('id');

        $categories = (new ProductCategoryQuery)
            ->orderBy('sort')
            ->parentId($categoryId)
            ->all();

        $category = ProductCategory::findOne(['id' => $categoryId]);

        return $this->render('index', [
            'categories' => $categories,
            'category' => $category,
        ]);
    }
}
