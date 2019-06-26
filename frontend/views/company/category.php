<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $categories common\models\CompanyCategory[] */
/* @var $currentCategory common\models\CompanyCategory */

$this->title = $currentCategory->name;

$category = $currentCategory;
do {
    $this->params['breadcrumbs'][] = [
        'label' => $category->name,
        'url'   => Url::to([
            'category/index',
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

<?= $this->render('/company/_categories', [
    'companyCategories' => $categories,
]) ?>

<?php if ($currentCategory->companies): ?>
    <div class="row">
        <?php foreach ($currentCategory->companies as $company): ?>
            <div class="col col-lg-12">

                <h2>
                    <a href="<?= Url::to(['company/index', 'companyId' => $company->id]) ?>">
                        <?= $company->name ?>
                    </a>
                </h2>
                <span class="bg-warning">
                    <?= $company->area->name ?>
                </span>
                <?php if ($company->introduce): ?>
                    <p>
                        <?php if (mb_strlen(strip_tags($company->introduce)) > 300): ?>
                            <?= mb_substr(strip_tags($company->introduce), 0, 300) ?>
                            ...
                        <?php endif ?>
                    </p>
                <?php endif ?>
            </div>
        <?php endforeach ?>
    </div>
<?php endif ?>