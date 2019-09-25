<?php

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

<div class="container company">
    <div class="row">
        <div class="col col-sm col-lg-2">
            <br><br>
            <img alt="" src="<?= $company->thumb ?>" style="max-width: 100%">
        </div>
        <div class="col col-sm col-lg-4">
            <h3><?= $company->name ?></h3>

            <?php if ($params['sait']): ?>
                <h4><a href="<?= $params['sait']->value ?>" target="_blank"
                      rel="nofollow"><?= $params['sait']->value ?></a>
                </h4>
            <?php endif ?>

            <p><?= $company->introduce ?></p>
        </div>
        <div class="col col-sm col-lg-1"></div>
        <div class="col col-sm col-lg-4">
            <h3><?= $params['phone']->value ?></h3>
            <h4><a href="mailto:<?= $params['email']->value ?>"><?= $params['email']->value ?></a></h4>
            <p><?= nl2br($params['address']->value) ?></p>
        </div>
        <div class="col col-sm col-lg-1"></div>
    </div>
    <div class="row"><br></div>
</div>

<?= $this->render('/product/_products', [
    'allProducts' => $allProducts,
    'pages'       => $pages,
]) ?>
