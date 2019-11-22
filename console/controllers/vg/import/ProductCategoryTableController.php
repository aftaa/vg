<?php

namespace console\controllers\vg\import;

use common\models\ProductCategory;
use Yii;
use yii\console\Controller;
use yii\db\Query;

class ProductCategoryTableController extends Controller
{
    const METALL = 269;

    /**
     * {@inheritdoc}
     */
    public function actionIndex()
    {
        $db = Yii::$app->dbVsetigTest;

        $categories = (new Query)
            ->select('*')
            ->from('aw_category')
            ->all($db);

        try {
            foreach ($categories as $category) {
                $productCategory = new ProductCategory;
                $productCategory->id = $category['catid'];
                $productCategory->name = $category['catname'];
                $productCategory->meta_keywords = $category['keywords'];
                $productCategory->meta_description = $category['description'];
                $productCategory->sort = $category['catorder'];
                $productCategory->icon = $category['catimg'];
                if (!$productCategory->save()) {
                    print_r($productCategory->errors);
                } else {
                    echo $productCategory->name, " added\n";
                }
            }

            foreach ($categories as $category) {
                $productCategory = ProductCategory::findOne($category['catid']);
                $productCategory->parent_id = $category['parentid'] ? $category['parentid'] : null;

                if (!ProductCategory::findOne($category['parentid'])) {
                    $productCategory->parent_id = null;
                }

                if (!$productCategory->save()) {
                    echo "$productCategory->name\n";
                    print_r($productCategory->errors);
                } else {
                    echo $productCategory->name, " added\n";
                }
            }

            $categories3 = (new Query)
                ->select('*')
                ->from('aw_category3')
                ->all($db);
            foreach ($categories3 as $category) {
                $productCategory = new ProductCategory;
                $productCategory->id = $category['catid'];
                $productCategory->name = $category['catname'];
                $productCategory->meta_keywords = $category['keywords'];
                $productCategory->meta_description = $category['description'];
                $productCategory->sort = $category['catorder'];
                $productCategory->save();
                if (!$productCategory->save()) {
                    echo "$productCategory->name\n";
                    print_r($productCategory->errors);
                } else {
                    echo $productCategory->name, " added\n";
                }
            }

            foreach ($categories3 as $category) {
                $productCategory = ProductCategory::findOne($category['catid']);
                $productCategory->parent_id = $category['parentid'] ? $category['parentid'] : null;

                if (!ProductCategory::findOne($category['parentid'])) {
                    $productCategory->parent_id = null;
                }

                if (!$productCategory->save()) {
                    print_r($productCategory->errors);
                } else {
                    echo $productCategory->name, " added\n";
                }
            }

        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
    }
}
