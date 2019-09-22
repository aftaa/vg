<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
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
    <link rel="stylesheet" type="text/css" href="/css/inside.css">
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl'   => Yii::$app->homeUrl,
        'options'    => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    if (!Yii::$app->user->isGuest) {
        $menuItems = [
            [
                'label' => 'Пользователи', 'items' =>
                [
                    ['label' => 'Доступы', 'url' => ['/user/index']],
                    ['label' => 'Клиенты', 'url' => ['/member/index']],
                ]
            ],
            ['label' => 'Товары', 'url' => ['/product/index']],
            ['label' => 'Компании', 'url' => ['/company/index']],
            [
                'label' => 'Категории', 'items' =>
                [
                    ['label' => 'Компаний', 'url' => ['/company-category/index']],
                    ['label' => 'Товаров', 'url' => ['/product-category/index']],
                ]
            ],
            [
                'label' => 'Свойства', 'items' =>
                [
                    ['label' => 'Компаний', 'url' => ['/company-param/index']],
                ]
            ],
            [
                'label' => 'Справочники', 'items' =>
                [
                    ['label' => 'Регионы', 'url' => ['/area/index']],
                ]
            ],
        ];
    }

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Войти', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Выйти (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items'   => $menuItems,
    ]);
    NavBar::end();

    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links'    => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'homeLink' => [
                'label' => 'Настройки',
                'url'   => '/',
            ],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
