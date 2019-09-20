<?php

use common\vg\models\VgProductCategory;
use yii\helpers\Url;
use yii\web\View;

/** @var $this View */
/** @var $productCategories VgProductCategory[] */

?>


    <?php foreach ($productCategories as $productCategory): ?>
        <?php if ($productCategory->productCount): ?>
            <ul>
                <?php if ($productCategory->productCategories): ?>
                    <a href="<?= Url::to(['product/category', 'categoryId' => $productCategory->id]) ?>"
                       data-categoyr-id="<?= $productCategory->id ?>"
                       class="glyphicon-plus look-product-category"></a>
                <?php endif ?>

                <a class="product-categories"
                   href="<?= Url::to(['product/category', 'categoryId' => $productCategory->id]) ?>">
                    <?= $productCategory->name ?>
                </a>
                <small>
                    <sup>
                        <?= $productCategory->getProductCount() ?>
                    </sup>
                </small>
                <div id="product-category-<?= $productCategory->id ?>" class="product-child-category"></div>
            </ul>
        <?php endif ?>
    <?php endforeach ?>


<script type="text/javascript">
    productChildCategories();
</script>
