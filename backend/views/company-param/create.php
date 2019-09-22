<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CompanyParam */

$this->title = 'Create Company Param';
$this->params['breadcrumbs'][] = ['label' => 'Company Params', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-param-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
