<?php

use common\models\Area;
use common\models\Product;
use common\vg\models\VgCompanyCategory;
use common\vg\models\VgProductCategory;
use yii\helpers\Url;

/** @var $this yii\web\View */
/** @var $productCategories VgProductCategory[] */
/** @var $topProducts Product[] */
/** @var $newProducts Product[] */
/** @var $companyCategories VgCompanyCategory[] */
/** @var $areas Area[] */

$this->title = 'Каталог компаний, услуг и товаров России';
$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('/product/_categories', [
    'productCategories' => $productCategories,
]) ?>

<hr size="1">
<div class="uc container">
    <div class="row" id="index-top-products">
    <?php foreach ($topProducts as $product): ?>
        <div class="col col-xs-6 col-sm-4 col-lg-3" style="min-height: 150px;">
            <div style="line-height: 1em; overflow: hidden; height: 1em;">
                <a href="<?= Url::to(['product/index', 'productId' => $product->id]) ?>">
                    <?= $product->name ?>
                </a>
            </div>
            <div style="display: inline-block; vertical-align: middle; text-align: center; height: 100px; line-height: 100px; margin-top" .5em;>
                <a href="<?= Url::to(['product/index', 'productId' => $product->id]) ?>">
                    <img alt="" src="<?= $product->thumb ?>" style="max-width: 100px; max-height: 100px;">
                </a>
            </div>
            <div>
                <?php if ($product->price) echo $product->price, '₽' ?>
            </div>
        </div>
    <?php endforeach ?>
    </div>

    <div class="row" id="index-new-products" style="display: none;">
        <?php foreach ($newProducts as $product): ?>
            <div class="col col-xs-6 col-sm-4 col-lg-3" style="min-height: 150px;">
                <div style="line-height: 1em; overflow: hidden; height: 1em;">
                    <a href="<?= Url::to(['product/index', 'productId' => $product->id]) ?>">
                        <?= $product->name ?>
                    </a>
                </div>
                <div style="display: inline-block; vertical-align: middle; text-align: center; height: 100px; line-height: 100px; margin-top" .5em;>
                    <a href="<?= Url::to(['product/index', 'productId' => $product->id]) ?>">
                        <img alt="" src="<?= $product->thumb ?>" style="max-width: 100px; max-height: 100px;">
                    </a>
                </div>
                <div>
                    <?php if ($product->price) echo $product->price, '₽' ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<div id="index-products-switcher" class="alert-warning">
    <div class="text-right" id="look-new-products">посмотрите <a href="#">новые товары</a></div>
    <div class="text-right" id="look-top-products" style="display: none;">посмотрите <a href="#">популярные товары</a></div>
</div>


<h2>Компании</h2>

<?= $this->render('/company/_categories', [
    'companyCategories' => $companyCategories,
]) ?>

<div class="uc h2" id="index-companies">топовые фирмы / новые фирмы</div>
<div class="text-right">познакомьтесь с <a href="#">новыми компаниями</a></div>


<div style="margin: 3em auto;">
    <h2>Регионы присутствия</h2>
    <?php foreach ($areas as $areaId => $area): ?>
        <div class="a-index-area <?= $area['class'] ?>">
            <a href="#">
                <?= $area['name'] ?>
            </a>
            <small>
                <sup>
                    <?= $area['cnt'] ?>
                </sup>
            </small>
        </div>
    <?php endforeach ?>
</div>
