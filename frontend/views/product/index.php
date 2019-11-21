<?php

use common\vg\models\VgProduct;
use yii\helpers\Url;
use yii\web\View;

/** @var $this View */
/** @var $product VgProduct */

$this->title = $product->name;

$category = $product->category;
do {
    $this->params['breadcrumbs'][] = [
        'label' => $category->name,
        'url'   => Url::to([
            'category',
            'categoryId' => $category->id,
        ])
    ];
    $category = $category->parent;
} while ($category);

$this->params['breadcrumbs'] = array_reverse($this->params['breadcrumbs']);
array_unshift($this->params['breadcrumbs'], [
    'label' => 'Товары',
]);

?>

<div class="container company">
    <div class="row">
        <div class="col-md-4">
            <?php if ($product->thumb_checked && $product->thumb): ?>
                <img alt="<?= $product->name ?>" src="<?= $product->thumb ?>" style="max-width: 100%;">
            <?php else: ?>
                <img alt="" src="<?= VgProduct::NO_PRODUCT ?>" style="max-width: 100%;">
            <?php endif ?>

            <?php if ($product->price): ?>
                <hr size="1">
                <div class="btn btn-info" style="float: right;">Стоимость: <?= $product->getPrice() ?> ₽</div>
                <br><br><br>
            <?php endif ?>
        </div>

        <div class="col-md-2">
        </div>
        <div class="col-md-6">

            <p>
                <?php if ($product->description): ?>
                    <?= $product->description ?>
                <?php else: ?>
                    <?= $product->company->introduce ?? '' ?>
                <?php endif ?>
            </p>


            <br><br>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Компания</th>
                    <th>Регион</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <a href="<?= Url::to(['company/index', 'companyId' => $product->company_id]) ?>"><?= $product->company->name ?></a>
                    </td>
                    <td>
                        <?= $product->company->area->name ?>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div>

        </div>
    </div>
</div>


