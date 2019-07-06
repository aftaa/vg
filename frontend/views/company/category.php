<?php

use common\models\CompanyCategory;
use common\vg\models\VgCompanyCategory;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $currentCategory CompanyCategory */
/* @var $companyCategories VgCompanyCategory[] */

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


$this->registerMetaTag([
    'name'    => 'description',
    'content' => $currentCategory->meta_description,
]);

$this->registerMetaTag([
    'name'    => 'keywords',
    'content' => $currentCategory->meta_keywords,
]);



?>

<?= $this->render('/company/_categories', [
    'companyCategories' => $companyCategories,
]) ?>

<?= $this->render('/company/_companies', [
    'companies' => $currentCategory->companies
]) ?>

