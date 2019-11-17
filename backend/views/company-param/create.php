<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CompanyParam */

$this->title = Yii::t('app', 'Create Company Param');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Company Params'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-param-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
