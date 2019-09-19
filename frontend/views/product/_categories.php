<?php

use common\vg\models\VgProductCategory;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $productCategories VgProductCategory[] */

?>

<div class="row">
    <?php foreach ($productCategories as $productCategory): ?>
        <?php if ($productCategory->productCount): ?>
            <div class="col col-md-3 col-sm-6">
                <h4>
                    <a class="product-categories" href="<?= Url::to(['product/category', 'categoryId' => $productCategory->id]) ?>">
                        <?= $productCategory->name ?>
                    </a>
                    <small>
                        <sup>
                            <?= $productCategory->getProductCount() ?>
                        </sup>
                    </small>
                </h4>
            </div>
        <?php endif ?>
    <?php endforeach ?>
</div>

