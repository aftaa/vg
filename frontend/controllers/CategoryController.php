<?php

namespace frontend\controllers;

use common\models\ProductCategory;
use common\vg\FrontendController;

class CategoryController extends FrontendController
{
    public function actionIndex(int $categoryId)
    {
        $category = ProductCategory::findOne(['id' => $categoryId]);
        $categories = $category->productCategories;

        return $this->render('index', [
            'categories' => $categories,
            'category' => $category,
        ]);
    }
}
