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
            $companyCategory = new CompanyCategory;
            $companyCategory->id = $aw_cat['catid'];
            $companyCategory->name = $aw_cat['catname'];
            $companyCategory->sort = $aw_cat['catorder'];
            $companyCategory->icon = $aw_cat['catimg'];
            $companyCategory->meta_description = $aw_cat['description'];
            $companyCategory->meta_keywords = $aw_cat['keywords'];

            if (!$companyCategory->save()) {
                print_r($companyCategory->errors);
            }
        }

        foreach ($aw_com_cat as $aw_cat) {
            $companyCategory = CompanyCategory::findOne($aw_cat['catid']);
            $companyCategory->parent_id = $aw_cat['parentid'] ? $aw_cat['parentid'] : null;
            if (!$companyCategory->save()) {
                echo "$companyCategory->name\n";
                print_r($companyCategory->errors);
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
