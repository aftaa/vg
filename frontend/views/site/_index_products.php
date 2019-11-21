<?php

use common\vg\models\VgUserProduct;
use yii\helpers\Url;

/** @var $products array|VgUserProduct[] */
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
            <div class="index-product-thumb circle-732">
                <a href="<?= Url::to(['product/index', 'productId' => $product->id]) ?>">
                    <img alt="" src="<?= $product->thumb ?>" data-id="<?= $product->id ?>">
                </a>
            </div>
            <div class="index-product-price alert-info">
                <?php echo $product->getPrice(), ' ₽' ?>
            </div>
        </div>
    <?php endforeach ?>
</div>
