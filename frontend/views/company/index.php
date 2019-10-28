<?php

use common\models\CompanyParam;
use common\models\CompanyParamValue;
use common\models\Product;
use common\vg\models\VgCompany;
use yii\data\Pagination;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $company VgCompany */
/* @var $params CompanyParamValue[] */
/** @var $allProducts Product[][] */
/** @var $pages Pagination */

$this->title = $company->name;

$category = $company->companyCategory;
do {
    $this->params['breadcrumbs'][] = [
        'label' => $category->name,
        'url'   => Url::to([
            'company/category',
            'categoryId' => $category->id,
        ])
    ];
} while ($category = $category->parent);

$this->params['breadcrumbs'] = array_reverse($this->params['breadcrumbs']);
array_unshift($this->params['breadcrumbs'], [
    'label' => 'Компании',
]);

?>

<div class="container company-products">
    <div class="row">
        <div class="col col-sm col-md-3">
            <img alt="" src="<?= $company->thumb ?>" style="max-width: 100%">
        </div>
        <div class="col col-sm col-md-3">
            <h3><?= $company->name ?></h3>

            <?php if (!empty($params['sait'])): ?>
                <h4><a href="<?= $params['sait']->value ?>" target="_blank"
                       rel="nofollow"><?= $params['sait']->value ?></a>
                </h4>
            <?php endif ?>

            <?php if ($pages->totalCount): ?>
                <p class="company-products-count">товаров: <?= $pages->totalCount ?></p>
            <?php endif ?>

        </div>

        <div class="col col-sm col-md-3">
            <h3><?= $params['phone']->value ?></h3>
            <h4><a href="mailto:<?= $params['email']->value ?>"><?= $params['email']->value ?></a></h4>
            <p><?= nl2br($params['address']->value) ?></p>
        </div>

        <div class="col col-sm col-md-3">
            <?php foreach ($params as $param): ?>
                <?php if (!$param->param->display) continue ?>

                <?php if ('fax' == $param->param->code && $param->value == 1): ?>
                    <p>
                    <div class="company-param-name"><?= $param->param->name ?></div><br>
                    <?= $params['phone']->value ?>
                    </p>
                    <?php continue ?>
                <?php endif ?>
                <p>
                <div class="company-param-name"><?= $param->param->name ?></div>
                <div class="company-param-value"><?= $param->value ?></div>
                </p>
            <?php endforeach ?>
        </div>
    </div>

    <?php if ($company->introduce): ?>
        <hr size="1">
        <div class="row company-introduce">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <?= $company->introduce ?>
            </div>
            <div class="col"></div>
        </div>
    <?php endif ?>

    <div class="row"><br></div>
</div>

<?= $this->render('/product/_products', [
        'allProducts' => $allProducts,
        'pages'       => $pages,
    ]) ?>
