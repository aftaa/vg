<?php

use common\models\CompanyCategory;
use yii\db\Migration;
use yii\db\Query;

/**
 * Class m190622_120859_import_data_into_company_category_table
 */
class m190622_120859_import_data_into_company_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $db = Yii::$app->dbVsetigTest;

        $aw_com_cat = (new Query)
            ->select('*')
            ->from('aw_com_cat')
            ->all($db);

        foreach ($aw_com_cat as $aw_cat) {
            $companyCategoty = new CompanyCategory;
            $companyCategoty->id = $aw_cat['catid'];
            $companyCategoty->name = $aw_cat['catname'];
            $companyCategoty->sort = $aw_cat['catorder'];
            $companyCategoty->icon = $aw_cat['catimg'];
            $companyCategoty->meta_description = $aw_cat['description'];
            $companyCategoty->meta_keywords = $aw_cat['keywords'];

            if (!$companyCategoty->save()) {
                print_r($companyCategoty->errors);
            }
        }

        foreach ($aw_com_cat as $aw_cat) {
            $companyCategoty = CompanyCategory::findOne($aw_cat['catid']);
            $companyCategoty->parent_id = $aw_cat['parentid'] ? $aw_cat['parentid'] : null;
            if (!$companyCategoty->save()) {
                echo "$companyCategoty->name\n";
                print_r($companyCategoty->errors);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        Yii::$app->db->createCommand('TRUNCATE TABLE company_category')->execute();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190622_120859_import_data_into_company_category_table cannot be reverted.\n";

        return false;
    }
    */
}
