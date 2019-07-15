<?php

use common\vg\models\VgCompanyCategory;
use common\vg\models\VgProductCategory;

/* @var $this yii\web\View */
/* @var $productCategories VgProductCategory[] */
/* @var $companyCategories VgCompanyCategory[] */

$this->title = 'Каталог компаний услуг и товаров России';
$this->params['breadcrumbs'][] = $this->title;

?>


<?= $this->render('/product/_categories', [
    'productCategories' => $productCategories,
]) ?>


<h2>Компании</h2>

<?= $this->render('/company/_categories', [
    'companyCategories' => $companyCategories,
]) ?>

<!--<h2>Регионы</h2>-->