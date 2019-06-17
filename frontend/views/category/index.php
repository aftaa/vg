<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $categories common\models\ProductCategory[] */
/* @var $category common\models\ProductCategory */

$this->title = $category->name;

do {
    $this->params['breadcrumbs'][] = [
        'label' => $category->name,
        'url'   => Url::to([
            'category/index',
            'categoryId' => $category->id,
        ])
    ];
    $category = $category->category;
} while ($category);

unset($this->params['breadcrumbs'][0]['url']);

$this->params['breadcrumbs'] = array_reverse($this->params['breadcrumbs']);

?>

<h1><?= $this->title ?></h1>

<div class="row">
    <?php foreach ($categories as $category): ?>
        <div class="col col-md-4">
            <h3>
                <a href="<?= Url::to(['category/index', 'categoryId' => $category->id]) ?>"><?= $category->name ?></a>
                <span class="small">(<?= rand(10, 1000) ?>)</span>
            </h3>
        </div>
    <?php endforeach ?>
</div>
