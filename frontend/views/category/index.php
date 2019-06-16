<?php

/* @var $this yii\web\View */
/* @var $categories common\models\ProductCategory[] */
/* @var $category common\models\ProductCategory */

$this->title = 'Каталог компаний услуг и товаров России';

do {
    $this->params['breadcrumbs'][] = [
        'label' => $category->name,
        'url' => "/category/?id={$category->id}",
    ];
    $category = $category->category;
} while ($category);

unset($this->params['breadcrumbs'][0]['url']);
$this->params['breadcrumbs'] = array_reverse($this->params['breadcrumbs']);

?>

<div class="container">
    <div class="row">
        <?php foreach ($categories as $category): ?>
            <div class="col col-sm-4">
                <h3>
                    <a href="/category/?id=<?= $category->id ?>"><?= $category->name ?></a>
                    <span class="small">(<?= rand(10, 1000) ?>)</span>
                </h3>
            </div>
        <?php endforeach ?>
    </div>
</div>