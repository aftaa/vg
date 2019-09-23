<?php

use common\models\Area;
use common\vg\models\VgCompanyCategory;
use common\vg\models\VgProductCategory;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $productCategories VgProductCategory[] */
/* @var $companyCategories VgCompanyCategory[] */
/* @var $areas Area[] */

$this->title = 'Каталог компаний, услуг и товаров России';
$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('/product/_categories', [
    'productCategories' => $productCategories,
]) ?>

<br>
<div class="uc h2" id="index-top-products">топовые товары / новые товары</div>

<div class="text-right">посмотрите <a href="#">новые товары</a></div>


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
