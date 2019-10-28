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

$this->title = Html::encode($s);

?>

<?php if (!empty($s)): ?>
    <div class="container">
    <?php if (!Yii::$app->request->get('pages')): ?>

        <?php if ($showFull): ?>
            <div class="row">
            <?php if ($companies): ?>
                <h2>мы нашли в компаниях:</h2>
                <?php foreach ($companies as $company): ?>
                    <div class="col col-lg-6">
                        <div style="margin-bottom: 3px; min-height: 55px;">

                            <?php if ($company->thumb): ?>
                                <img src="<?= $company->thumb ?>" style="max-width: 50px; max-height: 50px;">
                            <?php else: ?>
                                <img src="<?= VgCompany::NO_LOGO ?>" style="max-width: 50px; max-height: 50px;">
                            <?php endif ?>

                            <a href="<?= Url::to(['company/index', 'companyId' => $company->id]) ?>"
                               target="_blank" class="warning">
                                <?= strip_tags($company->name) ?>
                            </a>
                            <small class="default">
                                (<?= $company->area->name ?>)
                            </small>

                        </div>
                    </div>
                <?php endforeach ?>

                <div class="col lead">
                    <?php if ($productCategories): ?>
                        <hr size="1">
                        <h2>в категориях мы нашли:</h2>
                        <?php foreach ($productCategories as $category): ?>
                            <div style="margin-bottom: 3px;">
                                <a href="<?= Url::to(['product/category', 'categoryId' => $category->id]) ?>"
                                   target="_blank">
                                    <?= $category->name ?>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif ?>
                </div>
            <?php endif ?>
        <?php endif ?>


        <div class="row">

        <?php if ($showFull): ?>
            <h2 style="clear: both;" class="container">мы поискали в товарах и услугах...</h2>
        <?php endif ?>

        <?php if ($products): ?>
        <?php foreach ($products as $product): ?>
            <div class="col col-lg-6" style="margin-top: 15px;">
                <?php if ($product->thumb): ?>
                    <div class="enter-block" style="float: left;">
                        <img alt="" src="<?= $product->thumb ?>" style="max-width: 50px; max-height: 50px;">
                    </div>
                    <a href="<?= Url::to(['product/index', 'productId' => $product->id]) ?>" target="_blank">
                        <?= $product->name ?>
                    </a>
                    <div style="clear: left;"></div>
                <?php else: ?>
                    <div class="center-block" style="float: left;">
                        <img alt="" src="<?= VgProduct::NO_PRODUCT ?>"
                             style="max-width: 50px; max-height: 50px; border-radius: 1em; margin-right: 5px;">
                    </div>
                    <a href="<?= Url::to(['product/index', 'productId' => $product->id]) ?>" target="_blank">
                        <?= $product->name ?>
                    </a>
                    <span class="">
                            <a href="<?= Url::to(['company/index', 'companyId' => $product->company->id]) ?>"
                               target="_blank" style="font-weight: bold; font-size: 11px;">
                                <?= $product->company->name ?>
                            </a>
                        </span>
                    <span class="bg-info" style="float: right"><?= $product->getPrice() ?>₽</span>
                    <div style="clear: left;"></div>
                <?php endif ?>
            </div>
        <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="container">и ничего не нашли</div>
    <?php endif ?>
        </div>
    <?php endif ?>

    <?= LinkPager::widget([
    'pagination'           => $pages,
    'maxButtonCount'       => 20,
    //    'perPage'        => 'per-page',
    'disabledPageCssClass' => true,
]) ?>
<?php else: ?>
    <div class="h3">Мы ничего не искали, а вы что-то хотели?</div>
<?php endif ?>