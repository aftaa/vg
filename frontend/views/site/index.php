<?php

use common\models\Company;
use common\models\ProductCategory;
use common\vg\models\VgCompanyCategory;

/* @var $this yii\web\View */
/* @var $productCategories ProductCategory[] */
/* @var $companyCategories VgCompanyCategory[] */
/* @var $companyWithThumbs Company[] */

$this->title = 'Каталог компаний услуг и товаров России';
$this->params['breadcrumbs'][] = $this->title;

?>

<hr size="1">

<h2>Компании</h2>

<? //= $this->render('/category/_categories', [
//    'productCategories' => $productCategories,
//]) ?>

<hr size="1">

<?= $this->render('/company/_categories', [
    'companyCategories' => $companyCategories,
]) ?>

<hr size="1">

<!--<div class="row">-->
<!--    --><?php //foreach ($companyWithThumbs as $company): ?>
<!--        <div class="col col-md-3 p-5 m-5" style="text-align: center;">-->
<!--            <img alr="--><? //= htmlspecialchars( $company->name ) ?><!--" src="--><? //= $company->thumb ?><!--" class="col-md-4">-->
<!--        </div>-->
<!--    --><?php //endforeach ?>
<!--</div>-->
