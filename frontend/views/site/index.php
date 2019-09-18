<?php

use common\models\Area;
use common\vg\models\VgCompanyCategory;
use common\vg\models\VgProductCategory;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $productCategories VgProductCategory[] */
/* @var $companyCategories VgCompanyCategory[] */
/* @var $areas Area[] */

$this->title = 'Каталог компаний услуг и товаров России';
//$this->params['breadcrumbs'][] = $this->title;

?>


<?= $this->render('/product/_categories', [
    'productCategories' => $productCategories,
]) ?>


<div style="border: 1px solid #555; height: 100px; cursor: pointer;" id="products">

</div>


<h2>Компании</h2>

<?= $this->render('/company/_categories', [
    'companyCategories' => $companyCategories,
]) ?>

<h2>Регионы присутствия</h2>

<div class="row">
    <?php foreach ($areas as $area): ?>
        <div class="col col-md-3 col-sm-6">
            <h4>
                <a href="<?= Url::to(['#', 'categoryId' => $area->id]) ?>"><?= $area->name ?></a>
                <small><sup><?= //count($area->areas) ?></sup></small>
            </h4>
        </div>
    <?php endforeach ?>
</div>


<script>
    $(function(){
        $('#products').on('hover',
            function(){
                $(this).animate('height', '+100px', 'slow')
            },
            function(){
                $(this).animate('height', '-100px', 'slow')
            }
        );
    })
</script>
