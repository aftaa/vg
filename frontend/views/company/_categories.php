<?php

use common\models\CompanyCategory;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $companyCategories common\models\CompanyCategory */

?>

<div class="row">
    <?php foreach ($companyCategories as $category): ?>
        <?php if ($companyCount = CompanyCategory::find()->getCompanyCount($category)): ?>
            <div class="col col-md-3">
                <h4>
                    <a href="<?= Url::to(['company/category', 'categoryId' => $category->id]) ?>"><?= $category->name ?></a>
                    <small><sup>(<?= $companyCount ?>)</sup></small>
                </h4>
            </div>
        <? endif ?>
    <?php endforeach ?>
</div>
