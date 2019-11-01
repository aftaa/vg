<?php

use common\vg\models\VgProductCategory;
use yii\data\Pagination;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $productCategory VgProductCategory */
/* @var $productCategories VgProductCategory[] */

/** @var $allProducts VgProduct[][] */
/** @var $pages Pagination */


$this->title = $productCategory->name;

$category = $productCategory;
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

unset($this->params['breadcrumbs'][0]['url']);

$this->params['breadcrumbs'] = array_reverse($this->params['breadcrumbs']);
array_unshift($this->params['breadcrumbs'], [
    'label' => 'Товары',
]);

?>

<?= $this->render('/product/_categories', [
    'productCategories' => $productCategories,
]) ?>

<?php if ($allProducts): ?>
<hr size="1">
<br>
<?php endif ?>

<?= $this->render('/product/_products', [
    'allProducts' => $allProducts,
    'pages'    => $pages,
]) ?>
