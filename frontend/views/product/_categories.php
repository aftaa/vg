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
                           lass="glyphicon-plus look-product-category" style="text-decoration: none; background: orange;color:#fff;width:20px; display:inline-block;border-radius: 10px;text-align:center">&darr;</a>
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
