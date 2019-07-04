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

?>

<?= $this->render('/company/_categories', [
    'companyCategories' => $companyCategories,
]) ?>

<?php if ($currentCategory->companies): ?>
    <div class="row">
        <?php foreach ($currentCategory->companies as $company): ?>
            <div class="col col-lg-12">

                <h2>
                    <?= $company->name ?>
                </h2>
                <span class="bg-warning p-5">
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