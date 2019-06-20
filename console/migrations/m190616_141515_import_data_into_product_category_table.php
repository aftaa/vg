<?php

use common\models\ProductCategory;
use yii\db\Migration;
use yii\db\Query;

/**
 * Class m190616_141515_import_data_into_product_category_table
 */
class m190616_141515_import_data_into_product_category_table extends Migration
{
    const METALL = 269;

    /**
     * {@inheritdoc}
     */
    public function safeUp()
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
                }
            }

        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        Yii::$app->db->createCommand('TRUNCATE TABLE product_category')->execute();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190616_141515_import_data_into_product_category_table cannot be reverted.\n";

        return false;
    }
    */
}
