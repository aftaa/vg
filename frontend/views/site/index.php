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
//$this->params['breadcrumbs'][] = $this->title;

?>

<h1 class="display-1">Ведутся технические работы</h1>

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

<?php //if (false): ?>
<h3>Регионы присутствия</h3>

<div class="row h5 pl-5">
    <?php foreach ($areas as $area): ?>
        <div style="float: left; margin: 0 20px 30px 0; line-height: 30px;"><a href="<?= Url::to(['#', 'areaId' => $area->id]) ?>"><?= $area->name ?></a>
            <small><sup><?= $area->childCount ?></sup></small>
        </div>
    <?php endforeach ?>
</div>
<?php //endif ?>
