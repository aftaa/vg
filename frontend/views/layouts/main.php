<?php

/* @var $this View */

/* @var $content string */

use common\vg\models\VgUser;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\web\View;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <?= $this->render('/site/_metrika') ?>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/vg.css">
    <?php
    $theme = $_COOKIE['theme'] ?? 'light';
    ?>

    <?php if ('dark' == $theme): ?>
        <link rel="stylesheet" type="text/css" href="/css/dark.css">
    <?php endif ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
          integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap<?php if (VgUser::isUnderOtherUser()) echo ' other-user' ?>">
    <?php
    NavBar::begin([
        'brandImage' => '/img/logo.png',
        'brandLabel' => 'vseti-goroda.ru',//Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $menuItems[] = ['label' => 'Главная', 'url' => ['/']];
    $menuItems[] = ['label' => 'Проект', 'url' => ['/site/about']];
    $menuItems[] = ['label' => 'Тарифы', 'url' => ['/tariffs']];
    $menuItems[] = ['label' => 'Контакты', 'url' => ['/site/contact']];

    if (VgUser::isSuperUser()) {
        $menuItems[] = ['label' => '→ В пользователя', 'url' => ['/switch-identity'], 'class' => 'super-user'];
    }

    if (VgUser::isUnderOtherUser()) {
        $menuItems[] = [
            'label' => 'Из пользователя →',
            'url' => ['/switch-identity/return'],
            'class' => 'super-user'
        ];
    }

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Регистрация', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => '» Войти', 'url' => ['/site/login']];
    } else {
        $menuItems[] = ['label' => 'Профиль', 'url' => ['/profile']];

        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Выйти »',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }

    if (false) {
        $menuItems[] = [
            'label' => $theme == 'dark' ? 'Зажечь' : 'Погасить',
            'url' => $theme == 'dark' ? '/light' : '/dark',
        ];
    }


    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>


    <div class="container">

        <?php if (empty($this->params['hide_search'])) echo $this->render('/search/_search_form') ?>

        <?php if (empty($this->params['hideLogo'])): ?>
            <div class="text-center" id="logo-cropped">
                <?php if ('/' != $_SERVER['REQUEST_URI']): ?><a href="/"><?php endif ?>
                    <img alt="В сети города" src="/img/logo_cropped.png" width="355" height="50">
                    <?php if ('/' != $_SERVER['REQUEST_URI']): ?></a><?php endif ?>
            </div>
        <?php endif ?>

        <?php if (!Yii::$app->user->isGuest): ?>
            <header>
                <div class="alert-warning align-right"><?php if (!Yii::$app->user->isGuest): ?>
                        Привет,
<!--                        наш <?= Yii::$app->user->identity->id ?>-й-->
<!--                        пользователь-->
                        <a href="/profile"><?= Yii::$app->user->identity->username ?></a>!
                    <?php endif ?>
                </div>
            </header>
        <?php endif ?>


        <?php if ($this->title): ?>
            <h1><?= $this->title ?></h1>
        <?php endif ?>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'homeLink' => [
                'label' => 'В сети города',
                'url' => '/',
            ],
        ]) ?>
        <?= Alert::widget() ?>

        <main>
            <?= $content ?>
        </main>

    </div>
</div>

<?= $this->render('_footer') ?>

<?php $this->endBody() ?>
<script type="text/javascript" src="/js/vg.js"></script>
<?php //if (empty($_COOKIE['I-agree'])) echo $this->render('_cookie') ?>

<div id="unload">
    <img alt="ждём-с" src="/img/284.svg" width="132" height="132">
</div>

</body>
</html>
<?php $this->endPage() ?>
