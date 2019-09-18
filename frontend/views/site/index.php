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
<div class="text-right">ознакомьтесь с <a href="#">новыми компаниями</a></div>

<?php //if (false): ?>
<h2>Регионы присутствия</h2>

<div class="row h4 pl-5">
    <?php foreach ($areas as $area): ?>
        <div style="float: left; margin-right: 50px; line-height: 30px;"><a href="<?= Url::to(['#', 'areaId' => $area->id]) ?>"><?= $area->name ?></a>
            <small><sup><?= count($area->areas) ?></sup></small>
        </div>
    <?php endforeach ?>
</div>
<?php //endif ?>
