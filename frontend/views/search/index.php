<?php

use common\vg\models\VgCompany;
use common\vg\models\VgProduct;
use common\vg\models\VgProductCategory;
use yii\data\Pagination;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\LinkPager;

/** @var string $s */
$s = Yii::$app->request->get('s');

$this->title = 'Поиск';
$this->params['breadcrumbs'][] = [
    'label' => $this->title,
    'url'   => Url::to(['/search'])
];
$this->params['breadcrumbs'][] = [
    'label' => Html::encode($s),
    'url'   => empty($_GET['page']) ? '' : "/search?s=$s",
];

/** @var $this View */
/** @var $productCategories VgProductCategory[] */
/** @var $products VgProduct[] */
/** @var $companies VgCompany[] */
/** @var $pages Pagination */
/** @var $showFull boolean */
/** @var $s string */

//$this->title = Html::encode($s);

?>

<?php if (!empty($s)): ?>

    <div class="container">
        <?php if ($showFull): ?>
            <?php if ($companies || $productCategories): ?>
                <?= $this->render('search_result_companies', ['companies' => $companies]) ?>
                <?= $this->render('search_result_product_categories', ['productCategories' => $productCategories]) ?>
            <?php endif ?>
        <?php endif ?>

        <?php if (!Yii::$app->request->get('pages')): ?>
            <?php if ($showFull): ?>
                <h2 style="clear: both;" class="container">мы поискали в товарах и услугах...</h2>
            <?php endif ?>

            <?php if ($products): ?>
                <?= $this->render('search_result_products', ['products' => $products]) ?>
            <?php else: ?>
            ...ничего.
            <?php endif ?>
        <?php endif ?>


    <div style="overflow: both;"></div>
    <hr size="1">
    <?= LinkPager::widget([
    'pagination'           => $pages,
    'maxButtonCount'       => 20,
    //    'perPage'        => 'per-page',
    'disabledPageCssClass' => true,
]) ?>
<?php else: ?>
    <div class="h3">Мы ничего не искали, а вы что-то хотели?</div>
<?php endif ?>