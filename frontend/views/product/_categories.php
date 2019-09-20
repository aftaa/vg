<?php

use common\vg\models\VgProductCategory;
use yii\helpers\Url;

/** @var $this yii\web\View */
/** @var $productCategories VgProductCategory[] */

?>

<div class="row">
    <?php foreach ($productCategories as $productCategory): ?>
        <?php if ($productCategory->productCount): ?>
            <div class="col col-md-4 col-sm-6">
                <h4>
                    <?php if ($productCategory->productCategories): ?>
                        <a href="<?= Url::to(['product/category', 'categoryId' => $productCategory->id]) ?>"
                           data-categoyr-id="<?= $productCategory->id ?>"
                           class="glyphicon-plus look-product-category"></a>
                    <?php endif ?>

                    <a class="product-categories" href="<?= Url::to(['product/category', 'categoryId' => $productCategory->id]) ?>">
                        <?= $productCategory->name ?>
                    </a>
                    <small>
                        <sup>
                            <?= $productCategory->getProductCount() ?>
                        </sup>
                    </small>
                </h4>
                <div id="product-category-<?= $productCategory->id ?>" class="product-child-category"></div>
            </div>
        <?php endif ?>
    <?php endforeach ?>
</div>
