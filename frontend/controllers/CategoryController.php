<?php

namespace frontend\controllers;

use common\models\ProductCategory;
use common\models\ProductCategoryQuery;
use common\vg\FrontendController;
use Yii;

class CategoryController extends FrontendController
{
    public function actionIndex(int $categoryId)
    {
        $category = ProductCategory::findOne(['id' => $categoryId]);
        $categories = $category->categories;

        return $this->render('index', [
            'categories' => $categories,
            'category' => $category,
        ]);
    }
}
