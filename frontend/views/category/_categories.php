<?php

use common\models\ProductCategory;
use yii\helpers\Url;

/** @var $this yii\web\View */
/** @var $productCategories ProductCategory[] */
?>

<div class="row">
    <?php foreach ($productCategories as $category): ?>
        <div class="col col-md-4">
            <h3>
                <a href="<?= Url::to(['category/index', 'categoryId' => $category->id]) ?>"><?= $category->name ?></a>
                <small><sup>(<?= rand(10, 1000) ?>)</sup></small>
            </h3>
        </div>
    <?php endforeach ?>
</div>


