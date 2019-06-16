<?php

use common\models\ProductCategory;
use yii\db\Migration;
use yii\db\Query;

/**
 * Class m190616_141515_import_data_into_product_category_table
 */
class m190616_141515_import_data_into_product_category_table extends Migration
{
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

        foreach ($categories as $category) {
            $productCategory = new ProductCategory;
            $productCategory->id = $category['catid'];
            $productCategory->name = $category['catname'];
            $productCategory->meta_keywords = $category['keywords'];
            $productCategory->meta_description = $category['description'];
            $productCategory->parent_id = $category['parentid'];
            $productCategory->sort = $category['catorder'];
            $productCategory->icon = $category['catimg'];
            $productCategory->save();
        }

        $categories3 = (new Query)
            ->select('*')
            ->from('aw_category3')
            ->all($db);

        foreach ($categories3 as $category) {
            $productCategory = new ProductCategory;
            $productCategory->id = $category['id'];
            $productCategory->name = $category['catname'];
            $productCategory->meta_keywords = $category['keywords'];
            $productCategory->meta_description = $category['description'];
            $productCategory->parent_id = (int)$category['parentid'];
            $productCategory->sort = $category['catorder'];
            $productCategory->save();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // TODO Truncate table

        return false;
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
