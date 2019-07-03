<?php

use common\vg\models\VgCompanyCategory;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $companyCategory VgCompanyCategory */

?>

<div class="row">
    <?php foreach ($companyCategory->companyCategories as $category): ?>
        <?php if (true): ?>
            <div class="col col-md-3">
                <h4>
                    <a href="<?= Url::to(['company/category', 'categoryId' => $category->id]) ?>"><?= $category->name ?></a>
                    <small><sup>(<?= $category->companyCount ?>)</sup></small>
                </h4>
            </div>
        <?php endif ?>
    <?php endforeach ?>
</div>
