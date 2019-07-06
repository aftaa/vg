<?php

use common\vg\models\VgCompanyCategory;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $companyCategories VgCompanyCategory[] */

?>

<div class="row">
    <?php foreach ($companyCategories as $companyCategory): ?>
        <?php if ($companyCategory->companyCount): ?>
            <div class="col col-md-3 col-sm-6">
                <h4>
                    <a href="<?= Url::to(['company/category', 'categoryId' => $companyCategory->id]) ?>"><?= $companyCategory->name ?></a>
                    <small><sup><?= $companyCategory->companyCount ?></sup></small>
                </h4>
            </div>
        <?php endif ?>
    <?php endforeach ?>
</div>
