<?php

use common\models\Company;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

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
    'layout'       => "{pager}\n{summary}\n{items}\n{summary}\n{pager}",
    'columns'      => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'category.name',

        [
            'attribute'      => 'name',
            'contentOptions' => ['style' => 'white-space: normal;'],
            'content'        => function ($data) {
                return $data->name;
            }
        ],
        [
            'attribute'      => 'price',
            'contentOptions' => ['style' => 'text-align: right;'],
            'content'        => function ($data) {
                return number_format($data->price, 0, '', ' ') . ' ₽';
            }
        ],
        [
            'attribute'      => 'checked',
            'contentOptions' => ['style' => 'text-align: center'],
            'content'        => function ($data) {
                if ($data['checked']) {
                    return 'да';
                } else {
                    return '—';
                }
            }
        ],
        [
            'attribute'      => 'thumb',
            'contentOptions' => ['style' => 'text-align: center'],
            'content'        => function ($data) {
                if ($data['thumb']) {
                    return Html::a('указано', $data->thumb, ['target' => '_blank']);
                } else {
                    return '—';
                }
            }
        ],
        [
            'attribute' => 'created_at',
            'content' => function ($data){
                $html =  'создан: ' . datetime($data->created_at) . '<br>';
                $html .=  'изменён: ' . datetime($data->updated_at) . '<br>';
                return $html;
            }
        ]
        //['class' => 'yii\grid\ActionColumn'],
    ],
    'tableOptions' => [
        'class' => 'table table-hover'
    ],
]) ?>


