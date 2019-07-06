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
        <div class="col-md-3">

        </div>

        <div class="col-md-9">

            <p>
                Описание:
                <?= $product->description ?>
            </p>

            <h4>Характеристики:</h4>
            <ul>
            <?php foreach ($params as $param): ?>
                <li><?= $param->name ?>
            <?php endforeach ?>
            </ul>

            <?php if ($product->price): ?>
                <big>Стоимость: <?= $product->getPrice() ?> ₽</big>
            <?php endif ?>

            <br><br>
        </div>

        <div>

        </div>
    </div>
</div>


