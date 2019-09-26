<?php

use common\models\Product;
use yii\data\Pagination;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\LinkPager;

/** @var $this View */
/** @var $allProducts Product[] */
/** @var $pages Pagination */

?>

<div class="container products" style="background: #fff;">
    <div class="row">
        <?php foreach ($allProducts as $product): ?>

            <div class="col col-md-4 col-lg-3 col-sm-6">

                <div style="height: 3em; overflow: hidden;"><a
                            href="<?= Url::to(['product/index', 'productId' => $product['id']]) ?>">
                        <strong>
                            <?= $product->name ?>
                        </strong>
                    </a></div>

                <div class="center-block" style="text-align: center; min-height: 200px;">
                    <img alt="" src="<?= $product->thumb ?>" style="max-width: 200px; max-height: 200px;">
                </div>

                <?php if ((int)$product->price): ?>
                    <div class="alert-danger index-product-price">
                        <?= $product->price . '₽' ?>
                    </div>
                <?php endif ?>
            </div>
        <?php endforeach ?>
    </div>

    <?php if(!empty($allProducts) && ceil(count($allProducts) / 30) > $pages->getPageCount()) LinkPager::widget([
        'pagination'     => $pages,
        'maxButtonCount' => 30,
    ]) ?>

    <br>
    <br>