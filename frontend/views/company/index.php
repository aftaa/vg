<?php

use common\models\CompanyParam;
use common\vg\models\VgCompany;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $company VgCompany */
/* @var $params CompanyParam[] */

$this->title = $company->name;

$category = $company->companyCategory;
do {
    $this->params['breadcrumbs'][] = [
        'label' => $category->name,
        'url'   => Url::to([
            'company/category',
            'categoryId' => $category->id,
        ])
    ];
} while ($category = $category->parent);

$this->params['breadcrumbs'] = array_reverse($this->params['breadcrumbs']);
array_unshift($this->params['breadcrumbs'], [
    'label' => 'Компании',
]);

?>


<div class="container company">
    <div class="row">
        <div class="col col-sm col-lg-3"></div>
        <div class="col col-sm col-lg-9">
            <ul>
                <?php foreach ($params as $param): ?>
                    <li>
                        <?= $param->name ?>:
                        <b>
                            <?= $param->companyParamValues[0]->value ?>
                        </b>
                    </li>
                <?php endforeach ?>
            </ul>

        </div>
    </div>
</div>

