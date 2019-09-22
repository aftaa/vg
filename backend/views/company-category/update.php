<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CompanyCategory */

$this->title = 'Update Company Category: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Company Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="company-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
