<?php

use common\models\Member;
use common\models\Product;
use common\vg\Helper;
use common\vg\MemberNotFoundException;
use yii\base\InvalidConfigException;
use yii\db\Connection;
use yii\db\Exception as DbException;
use yii\db\Migration;
use yii\db\Query;

/**
 * Class m190626_024105_import_into_product_table
 */
class m190626_024105_import_into_product_table extends Migration
{
    /**
     * @return bool|void
     * @throws DbException
     * @throws InvalidConfigException
     */
    public function safeUp()
    {
        /** @var Connection $oldDb */
        $oldDb = Yii::$app->get('dbVsetigInfoCom');

        $oldDb->createCommand('SET SESSION wait_timeout = 28800;')->execute();

        $tables = $oldDb->createCommand('SHOW TABLES')->queryColumn();

        /** @var int $totalImported */
        $totalImported = 0;
        $totalNotImported = 0;

        foreach ($tables as $tableName) {
            try {
                $member = Helper::getMemberByInfoComTableName($tableName);

                $aw_products = $this->getAwProductsQuery($tableName);


                echo "tableName=$tableName";

                try {
                    $importResult = $this->importTable($aw_products, $oldDb, $member);
                } catch (DbException $e) {
                    throw $e;
                }

                $totalImported += $importResult[0];
                $totalNotImported += $importResult[1];
                echo " - imported: $importResult[0]";
                if ($importResult[1]) {
                    echo ", NOT imported: $importResult[1]";
                }
                echo "\n";
            } catch (MemberNotFoundException $e) {
                echo "User from $tableName isn't exists\n";
            }

        }

        echo "Total imported rows: $totalImported\n";
        echo "Total NOT imported rows: $totalNotImported\n";
    }

    /**
     * @return bool|void
     * @throws yii\db\Exception
     */
    public function safeDown()
    {
        Yii::$app->db->createCommand('SET foreign_key_checks = 0')->execute();
        Yii::$app->db->createCommand('TRUNCATE TABLE product')->execute();
        Yii::$app->db->createCommand('SET foreign_key_checks = 1')->execute();
    }

    /**
     * @param Query $aw_products_query
     * @param Connection $oldDb
     * @param Member $member
     * @return array|int[]
     */
    protected function importTable(Query $aw_products_query, Connection $oldDb, Member $member): array
    {
        // TODO подсчет неимпортированных строк, логгировать имя таблицы и ИД

        $importedRows = 0;
        $notImportedRows = 0;

        foreach ($aw_products_query->batch(10, $oldDb) as $aw_products) {
            foreach ($aw_products as $aw_product) {
                $product = new Product;
                $this->productSetFieldValues($member, $product, $aw_product);
                $this->setCreatedAt($aw_product, $product);
                if (!$product->save()) {
                    echo "\nno imported rows, userid: $aw_product[userid], id: $aw_product[id]\n";
                    $notImportedRows++;
                } else {
                    $importedRows++;
                }
            }
        }

        return [$importedRows, $notImportedRows];
    }

    /**
     * @param array $aw_product
     * @param Product $product
     */
    protected function setCreatedAt(array $aw_product, Product $product): void
    {
        $lastupdatetime = $aw_product['lastupdatetime'];
        if (!$lastupdatetime) {
            $lastupdatetime = time();
        }
        $lastupdatetime = date('Y-m-d H:i:s', $lastupdatetime);
        $product->created_at = $lastupdatetime;
    }

    /**
     * @param string $table
     * @return Query
     */
    protected function getAwProductsQuery(string $table): Query
    {
        $aw_products = (new Query)
            ->select('*')
            ->from($table);
        return $aw_products;
    }

    /**
     * @param Member $member
     * @param Product $product
     * @param $aw_product
     */
    protected function productSetFieldValues(Member $member, Product $product, $aw_product): void
    {
        $product->company_id = $member->companies[0]->id;
        $product->category_id = $aw_product['catid'] ?? null;
        $product->name = $aw_product['title'];
        $product->description = $aw_product['content'];
        $product->thumb = $aw_product['thumb'];
        $product->checked = $aw_product['is_check'];
        $product->meta_description = $aw_product['description'];
        $product->meta_keywords = $aw_product['keywords'];
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
