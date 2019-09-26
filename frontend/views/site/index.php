<?php

use common\models\Area;
use common\models\Company;
use common\models\Product;
use common\vg\models\VgCompanyCategory;
use common\vg\models\VgProductCategory;
use yii\helpers\Url;

/** @var $this yii\web\View */
/** @var $productCategories VgProductCategory[] */
/** @var $topProducts Product[] */
/** @var $newProducts Product[] */
/** @var $companyCategories VgCompanyCategory[] */
/** @var $topCompanies Company[] */
/** @var $newCompanies Company[] */
/** @var $areas Area[] */

$this->title = 'Каталог компаний, услуг и товаров России';
$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('/product/_categories', [
    'productCategories' => $productCategories,
]) ?>

<hr size="1">
<div class="uc container">

    <?= $this->render('_index_products', [
        'products' => $topProducts,
        'divId'    => 'index-top-products',
    ]) ?>

    <?= $this->render('_index_products', [
        'products' => $newProducts,
        'divId'    => 'index-new-products',
    ]) ?>

</div>

<div id="index-products-switcher" class="alert-warning">
    <div class="text-right" id="look-new-products">посмотрите <a href="#">новые товары</a></div>
    <div class="text-right" id="look-top-products" style="display: none;">посмотрите <a href="#">популярные товары</a>
    </div>
</div>


<h2>Компании</h2>

<?= $this->render('/company/_categories', [
    'companyCategories' => $companyCategories,
]) ?>

<hr size="1">
<div class="uc container" style="height: 520px">

    <?= $this->render('_index_companies', [
        'companies' => $topCompanies,
        'divId'     => 'index-top-companies',
    ]) ?>

    <?= $this->render('_index_companies', [
        'companies' => $newCompanies,
        'divId'     => 'index-new-companies',
    ]) ?>

</div>

<div id="index-companies-switcher" class="alert-danger">
    <div class="text-right" id="look-top-companies">ознакомьтесь с <a href="#">новыми компаниями</a></div>
    <div class="text-right" id="look-new-companies" style="display: none;">посмотрите <a href="#">популярные
            компании</a></div>
</div>

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
