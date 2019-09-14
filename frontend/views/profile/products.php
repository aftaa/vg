<?php

use common\models\Company;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Url;

/** @var $company Company */
/** @var $provider ActiveDataProvider */

$this->title = 'Каталог';

// TODO make up take off
$this->params['breadcrumbs'][] = array(
    'label' => 'Профиль ',
    'url'   => Url::to('/profile'),
);
$this->params['breadcrumbs'][] = array(
    'label' => 'Компании',
    'url'   => Url::to('/profile/companies'),
);
$this->params['breadcrumbs'][] = array(
    'label' => $company->name,
);
$this->params['breadcrumbs'][] = array(
    'label' => 'Каталог',
);

?>


<?= GridView::widget([
    'dataProvider' => $provider,
    'columns' => [
        'id',
        'category.name',
        'name',
        'description',
        'thumb'
    ],
]) ?>





