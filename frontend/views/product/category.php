<?php

use common\vg\models\VgProductCategory;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $currentCategory VgProductCategory */
/* @var $productCategories VgProductCategory[] */

$this->title = $currentCategory->name;

$category = $currentCategory;
do {
    $this->params['breadcrumbs'][] = [
        'label' => $category->name,
        'url'   => Url::to([
            'company/category',
            'categoryId' => $category->id,
        ])
    ];
    $category = $category->parent;
} while ($category);

unset($this->params['breadcrumbs'][0]['url']);

$this->params['breadcrumbs'] = array_reverse($this->params['breadcrumbs']);
array_unshift($this->params['breadcrumbs'], [
    'label' => 'Компании',
]);

?>

<?= $this->render('/product/_categories', [
    'productCategories' => $productCategories,
]) ?>

