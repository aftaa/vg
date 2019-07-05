<?php

use common\vg\models\VgProductCategory;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $productCategories VgProductCategory[] */

?>

<div class="row">
    <?php foreach ($productCategories as $productCategory): ?>
        <?php if ($productCategory->productCount): ?>
            <div class="col col-md-3">
                <h4>
                    <a href="<?= Url::to(['product/category', 'categoryId' => $productCategory->id]) ?>"><?= $productCategory->name ?></a>
                    <small><sup>(<?= $productCategory->productCount ?>)</sup></small>
                </h4>
            </div>
        <?php endif ?>
    <?php endforeach ?>
</div>
