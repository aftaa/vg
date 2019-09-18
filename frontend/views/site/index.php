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

<?php if (false): ?>
    <h2>Регионы присутствия</h2>

    <div class="row">
        <?php foreach ($areas as $area): ?>
            <div class="col col-md-3 col-sm-6">
                <h4>
                    <a href="<?= Url::to(['#', 'categoryId' => $area->id]) ?>"><?= $area->name ?></a>
                    <small><sup></sup></small>
                </h4>
            </div>
        <?php endforeach ?>
    </div>
<?php endif ?>
