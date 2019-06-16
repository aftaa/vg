<?php

/* @var $this yii\web\View */

$this->title = 'Управление сайтом';

use yii\helpers\Url; ?>

<div class="container">
    <div class="row">
        <div class="col col-sm-3">
            <h3><a href="<?= Url::to(['user/index']) ?>">Пользователи</a></h3>
            <ul>
                <li>
                    <a href="<?= Url::to(['user/manager']) ?>">Администраторы</a>
                </li>
                <li>
                    <a href="<?= Url::to(['user/client']) ?>">Клиенты</a>
                </li>
                <li>
                    <a href="<?= Url::to(['user/customer']) ?>">Другие</a>
                </li>
            </ul>
        </div>

        <div class="col col-sm-3">
            <h3><a href="<?= Url::to(['user/index']) ?>">Товары</a></h3>
            <ul>
                <li>
                    <a href="<?= Url::to(['user/manager']) ?>">Категории</a>
                </li>
                <li>
                    <a href="<?= Url::to(['user/client']) ?>">Свойства товаров</a>
                </li>
                <li>
                    <a href="<?= Url::to(['user/customer']) ?>">Свойства категорий</a>
                </li>
            </ul>
        </div>

        <div class="col col-sm-3">
            <h3><a href="<?= Url::to(['user/index']) ?>">Компании</a></h3>
            <ul>
                <li>
                    <a href="<?= Url::to(['user/client']) ?>">Свойства</a>
                </li>
                <li>
                    <a href="<?= Url::to(['user/client']) ?>">Отзывы</a>
                </li>
            </ul>
        </div>

        <div class="col col-sm-3">
            <h3><a href="<?= Url::to(['user/index']) ?>">Тарифы</a></h3>
            <ul>
                <li>
                    <a href="<?= Url::to(['user/manager']) ?>">Поступления средств</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col col-sm-3">
            <h3><a href="<?= Url::to(['user/index']) ?>">Импорт</a></h3>
            <ul>
                <li>
                    <a href="<?= Url::to(['user/manager']) ?>">CSV</a>
                </li>
                <li>
                    <a href="<?= Url::to(['user/manager']) ?>">XML</a>
                </li>
                <li>
                    <a href="<?= Url::to(['user/manager']) ?>">Excel</a>
                </li>
            </ul>
        </div>
    </div>
</div>

    <!--<div class="site-index">-->
    <!---->
    <!--    <div class="jumbotron">-->
    <!--        <h1>Congratulations!</h1>-->
    <!---->
    <!--        <p class="lead">You have successfully created your Yii-powered application.</p>-->
    <!---->
    <!--        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>-->
    <!--    </div>-->
    <!---->
    <!--    <div class="body-content">-->
    <!---->
    <!--        <div class="row">-->
    <!--            <div class="col-lg-4">-->
    <!--                <h2>Heading</h2>-->
    <!---->
    <!--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et-->
    <!--                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip-->
    <!--                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu-->
    <!--                    fugiat nulla pariatur.</p>-->
    <!---->
    <!--                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>-->
    <!--            </div>-->
    <!--            <div class="col-lg-4">-->
    <!--                <h2>Heading</h2>-->
    <!---->
    <!--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et-->
    <!--                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip-->
    <!--                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu-->
    <!--                    fugiat nulla pariatur.</p>-->
    <!---->
    <!--                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>-->
    <!--            </div>-->
    <!--            <div class="col-lg-4">-->
    <!--                <h2>Heading</h2>-->
    <!---->
    <!--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et-->
    <!--                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip-->
    <!--                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu-->
    <!--                    fugiat nulla pariatur.</p>-->
    <!---->
    <!--                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!---->
    <!--    </div>-->
    <!--</div>-->
