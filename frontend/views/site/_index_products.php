<?php

use common\models\Product;
use yii\helpers\Url;

/** @var $products array|Product[] */
/** @var $divId string */

?>

<div class="row" id="<?= $divId ?>">
    <?php foreach ($products as $product): ?>
        <div class="col col-xs-6 col-sm-4 col-lg-3" class="index-product-row">
            <div class="index-product-name">
                <a href="<?= Url::to(['product/index', 'productId' => $product->id]) ?>">
                    <?= $product->name ?>
                </a>
            </div>
            <div class="index-product-thumb">
                <a href="<?= Url::to(['product/index', 'productId' => $product->id]) ?>">
                    <img alt="" src="<?= $product->thumb ?>">
                </a>
            </div>
            <div class="index-product-price alert-info">
                <?php echo $product->price, '₽' ?>
            </div>
        </div>
    <?php endforeach ?>
</div>
