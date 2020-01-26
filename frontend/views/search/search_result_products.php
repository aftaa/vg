<?php

use common\vg\models\VgProduct;
use yii\data\Pagination;
use yii\helpers\Url;

/** @var $products VgProduct[] */
/** @var $pages Pagination */
/** @var $showFull boolean */
?>

<?php foreach ($products as $product): ?>
    <div class="col col-lg-6" style="margin-top: 15px;">
        <?php if ($product->thumb): ?>
            <div class="enter-block" style="float: left;">
                <img alt="" src="<?= $product->thumb ?>" style="max-width: 50px; max-height: 50px;">
            </div>
            <a href="<?= Url::to(['product/index', 'productId' => $product->id]) ?>" target="_blank">
                <?= $product->name ?>
            </a>
            <div style="clear: left;"></div>
        <?php else: ?>
            <div class="center-block" style="float: left;">
                <img alt="" src="<?= VgProduct::NO_PRODUCT ?>"
                     style="max-width: 50px; max-height: 50px; border-radius: 1em; margin-right: 5px;">
            </div>
            <a href="<?= Url::to(['product/index', 'productId' => $product->id]) ?>" target="_blank">
                <?= $product->name ?>
            </a>
            <span class="">
                            <a href="<?= Url::to(['company/index', 'companyId' => $product->company->id]) ?>"
                               target="_blank" style="font-weight: bold; font-size: 11px;">
                                <?= $product->company->name ?>
                            </a>
                        </span>
            <span class="bg-info" style="float: right"><?= $product->getPrice() ?>₽</span>
            <div style="clear: left;"></div>
        <?php endif ?>
    </div>
<?php endforeach; ?>
