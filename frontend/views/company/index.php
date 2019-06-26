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
            'company/category',
            'categoryId' => $category->id,
        ])
    ];
} while ($category = $category->parent);

unset($this->params['breadcrumbs'][0]['url']);

$this->params['breadcrumbs'] = array_reverse($this->params['breadcrumbs']);
array_unshift($this->params['breadcrumbs'], [
    'label' => 'Компании',
]);

?>

<div class="row">
    <?php foreach ($categories as $category): ?>
        <div class="col col-md-4">
            <h3>
                <a href="<?= Url::to(['company/category', 'categoryId' => $category->id]) ?>"><?= $category->name ?></a>
                <?php if ($category->companies): ?>
                    <small><sup>(<?= count($category->companies) ?>)</sup></small>
                <? endif ?>
            </h3>
        </div>
    <?php endforeach ?>
</div>

<?php if ($currentCategory->companies): ?>
    <div class="row">
        <?php foreach ($currentCategory->companies as $company): ?>
            <div class="col col-lg-12">

                <h2>
                    <?= $company->name ?>
                </h2>
                <div class="bg-danger">
                    <a href="<?= Url::to(['area/all']) ?>" class="bg-warning"><?= $company->area->name ?></a>
                </div>
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

