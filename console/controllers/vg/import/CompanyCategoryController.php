<?php


namespace console\controllers\vg\import;


use common\models\CompanyCategory;
use Yii;
use yii\console\Controller;
use yii\db\Query;

class CompanyCategoryController extends Controller
{
    public function actionIndex()
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
            } else {
                echo "Company category: $companyCategory->name added\n";
            }
        }

        foreach ($aw_com_cat as $aw_cat) {
            $companyCategory = CompanyCategory::findOne($aw_cat['catid']);
            $companyCategory->parent_id = $aw_cat['parentid'] ? $aw_cat['parentid'] : null;
            if (!$companyCategory->save()) {
                echo "$companyCategory->name\n";
                print_r($companyCategory->errors);
            } else {
                echo "Company category: $companyCategory->name added\n";
            }
        }
    }

}