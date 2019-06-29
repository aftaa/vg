<?php

use common\models\Product;
use common\vg\Helper;
use common\vg\MemberNotFoundException;
use yii\db\Migration;
use yii\db\Query;

/**
 * Class m190626_024105_import_into_product_table
 */
class m190626_024105_import_into_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /** @var yii\db\Connection $db */
        $db = Yii::$app->dbVsetigInfoCom;

        $info_com_tables = $db->createCommand('SHOW TABLES')->queryAll();
//        echo '<pre>'; print_r($info_com_tables); echo '</pre>'; exit(0);

        $allImportedProducts = 0;

        foreach ($info_com_tables as $aw_table_name) {

            $aw_table_name = array_shift($aw_table_name);
            echo "table name: $aw_table_name\n\n";

            try {
                $member = Helper::getMemberIdByInfoComTableName($aw_table_name);
                echo "member id=$member->id\n\n";
            } catch (MemberNotFoundException $e) {
                echo "{$e->getMessage()}\n\n";
                continue;
            }

            $aw_products = (new Query)
                ->select('*')
                ->from($aw_table_name)
                ->all($db);

            echo "Import products of company {$member->companies[0]->name}\n";
            $importedProducts = 0;

            foreach ($aw_products as $aw_product) {
                $product = new Product;
                $product->company_id = $member->companies[0]->id;
                $product->category_id = $aw_product['catid'] ?? 220;
                $product->name = $aw_product['title'];// ?? 'хуй';
                $product->description = $aw_product['content'];
                $product->thumb = trim($aw_product['thumb']);

                if (strlen($product->thumb) && !preg_match('{^http(s)?://}', $product->thumb)) {
                    $product->thumb = 'http://vseti-goroda.ru/' . $product->thumb;
                }

                $product->checked = (int)$aw_product['is_check'];
                $product->meta_keywords = $aw_product['keywords'];
                $product->meta_description = $aw_product['description'];

                $product->created_at = date('Y-m-d- H:i:s', $aw_product['postdate']);
                if (!$product->save()) {
                    print_r($product->errors);
                    continue;
                }

                $importedProducts++;
            }

            echo "Imported: $importedProducts\n\n";
            $allImportedProducts += $importedProducts;
        }

        echo "\nTotal products was imported: $allImportedProducts\n\n";
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        Yii::$app->db->createCommand('SET foreign_key_checks = 0')->execute();
        Yii::$app->db->createCommand('TRUNCATE TABLE product')->execute();
        Yii::$app->db->createCommand('SET foreign_key_checks = 1')->execute();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190626_024105_import_into_product_table cannot be reverted.\n";

        return false;
    }
    */
}
