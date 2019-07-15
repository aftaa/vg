<?php

use common\models\Product;
use yii\data\Pagination;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\LinkPager;

/** @var $this View */
/** @var $allProducts Product[][] */
/** @var $pages Pagination */

?>

<div class="container products" style="background: #fff;">
    <?php foreach ($allProducts as $products): ?>
        <div class="row">
            <?php foreach ($products as $product): ?>

                <div class="col col-md-3">
                    <h2>
                        <a href="<?= Url::to(['product/index', 'productId' => $product->id ]) ?>"><?= $product->name ?></a>
                    </h2>
                    <div class="center-block" style="text-align: center; min-height: 200px;">
                        <img alt="" src="<?= $product->thumb ?>" style="max-width: 200px; max-height: 200px;">
                    </div>

                    <big>
                        <?php if ($product->price) echo $product->price, ' ₽' ?>
                    </big>

                    <div style="background: #eee;">
                        <a href="<?= Url::to(['company/index', 'companyId' => $product->company_id ]) ?>"><?= $product->company->name ?></a>
                    </div>
                    <small><?= $product->company->area->name ?></small>

                </div>

            <?php endforeach ?>
        </div>
    <?php endforeach ?>
</div>

<?= LinkPager::widget([
    'pagination'     => $pages,
    'maxButtonCount' => 20,
]) ?>

<br>
<br>