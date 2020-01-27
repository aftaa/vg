<?php

use common\vg\models\VgProduct;
use yii\data\Pagination;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\LinkPager;

/** @var $this View */
/** @var $allProducts VgProduct[] */
/** @var $pages Pagination */

?>

<div class="container products" style="background: #fff;">
    <div class="row">
        <?php foreach ($allProducts as $product): ?>

            <div class="col col-md-4 col-lg-3 col-sm-6 text-center">

                <div style="height: 3em; overflow: hidden;" class="text-center">
                    <a href="<?= Url::to(['product/index', 'productId' => $product['id']]) ?>">
                        <strong>
                            <?= $product->name ?>
                        </strong>
                    </a>
                </div>

                <?php if ($product->thumb): ?>
                    <div class="center-block category-product" style="text-align: center; min-height: 200px;">
                        <img alt="" src="<?= $product->thumb ?>" style="max-width: 200px; max-height: 200px;" data-id="<?= $product->id ?>">
                    </div>
                <?php else: ?>
                    <div class="center-block" style="text-align: center; min-height: 200px;">
                        <img alt="" src="<?= VgProduct::NO_PRODUCT ?>" style="max-width: 200px; max-height: 200px; border-radius: 1em;">
                    </div>
                <?php endif ?>

                <?php if (!empty($product->company->name)): ?>
                    <small>
                        <a href="<?= Url::to(['company/index', 'companyId' => $product->company_id]) ?>"><?= $product->company->name ?></a>
                    </small>
                <?php endif ?>

                <?php if ((int)$product->price): ?>
                    <div class="alert-info index-product-price">
                        <?= $product->getPrice() . '₽' ?>
                    </div>
                <?php endif ?>
            </div>
        <?php endforeach ?>
    </div>

    <?= LinkPager::widget([
        'pagination'     => $pages,
        'maxButtonCount' => 20,
    ]) ?>

    <br>
    <br>
</div>