<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\web\View;

$identity = Yii::$app->user->getIdentity();
$this->title = 'Профиль ' . $identity->username;
$this->params['breadcrumbs'][] = $this->title;
?>

<br><br>

<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#main">Основные данные</a></li>
    <li><a data-toggle="tab" href="#tab1">Тариф и баланс</a></li>
    <li><a data-toggle="tab" href="#tab2">Мои компании</a></li>
    <li><a data-toggle="tab" href="#tab3">Мои товары</a></li>
    <li><a data-toggle="tab" href="#tab4">Загрузка товаров</a></li>

</ul>

<div class="tab-content">
    <div class="container tab-pane fade in active" id="main">
        <br>
        <div class="row">
            <div class="col-sx">
                Логин: <?= $identity->username ?>
            </div>
            <div class="col-sx">
                E-mail: <?= $identity->email ?>
            </div>
            <div class="col-sx">
                Регистрация: <?= date('d.m.Y H:i', $identity->created_at) ?>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="tab1"></div>
    <div class="tab-pane fade" id="tab2"></div>
    <div class="tab-pane fade" id="tab3"></div>
    <div class="tab-pane fade" id="tab4"></div>
</div>