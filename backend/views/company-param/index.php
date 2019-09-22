<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CompanyParamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Company Params';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-param-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Company Param', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'code',
            'name',
            'sort',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
