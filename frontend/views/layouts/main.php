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
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/vg.css">
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandImage'    => '/png/logo.png',
        'brandLabel'    => 'vseti-goroda.ru',//Yii::$app->name,
        'headerContent' => $this->render('_search.php'), //$this->title,
        'brandUrl'      => Yii::$app->homeUrl,
        'options'       => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    if (Yii::$app->user->isGuest) {
        $menuItems = [
            ['label' => 'Каталог', 'url' => ['/']],
            ['label' => 'О проекте', 'url' => ['/site/about']],
            ['label' => 'Тарифы', 'url' => ['/tariffs']],
            ['label' => 'Контакты', 'url' => ['/site/contact']],
        ];
    }

    if (VgUser::isSuperUser()) {
        $menuItems[] = ['label' => 'В пользователя', 'url' => ['/switch-identity'], 'class' => 'super-user'];
    }

    if (VgUser::isUnderOtherUser()) {
        $menuItems[] = [
            'label' => 'Выйти из пользователя',
            'url'   => ['/switch-identity/return'],
            'class' => 'super-user'
        ];
    }

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Регистрация', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Войти', 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => 'Профиль', 'url' => ['/profile'], 'items' => [
                ['label' => 'Анкета', 'url' => ['/profile']],
                ['label' => 'Каталог', 'url' => ['/profile/companies']],
//                ['label' => 'Продукция', 'url' => ['/profile/products/all']],
                ['label' => 'Баланс', 'url' => ['/profile/balance']],
                ['label' => 'Импорт', 'url' => ['/profile/import']],
                ['label' => 'Пароль', 'url' => ['/profile/password']],
            ],
        ];
//        $menuItems[] = ['label' => 'Компании', 'url' => ['/profile/companies']];
//        $menuItems[] = ['label' => 'Продукция', 'url' => ['/profile/products']];
//        $menuItems[] = ['label' => 'Баланс', 'url' => ['/profile/balance']];
//        $menuItems[] = ['label' => 'Импорт', 'url' => ['/profile/import']];
//        $menuItems[] = ['label' => 'Пароль', 'url' => ['/profile/password']];

        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Выход',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
        $menuItems[] = ['label' => "$_SERVER[SERVER_NAME]"];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items'   => $menuItems,
    ]);
    NavBar::end();
    ?>


    <div class="container">
        <header>
            <div class="alert-warning align-right"><?php if (!Yii::$app->user->isGuest): ?>
                    Привет, наш <?= Yii::$app->user->identity->id ?>-й
                    пользователь <a href="/profile/"><?= Yii::$app->user->identity->username ?></a>!
                <?php endif ?>
            </div>
        </header>


        <?php if ($this->title): ?>
            <h1><?= $this->title ?></h1>
        <?php endif ?>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
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
</body>
</html>
<?php $this->endPage() ?>
