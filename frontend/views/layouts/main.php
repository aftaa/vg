<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
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
    <link rel="stylesheet" type="text/css" href="/css/vg.css">
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandImage' => '/png/logo.png',
        'brandLabel' => Yii::$app->name,
        //        'headerContent' => $this->title,
        'brandUrl'   => Yii::$app->homeUrl,
        'options'    => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
//        ['label' => 'Home', 'url' => ['/site/index']],
//        ['label' => 'About', 'url' => ['/site/about']],
//        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Регистрация', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Войти', 'url' => ['/site/login']];
    } else {
        //$menuItems[] = ['label' => 'Управление сайтом', 'url' => 'http://back.vg/'];
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
        <?php if ($this->title): ?>
            <h1><?= $this->title ?></h1>
        <?php endif ?>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">

        <p class="col col-md-4">&copy; 2016&ndash;<?= date('Y') ?> <?= Html::encode(Yii::$app->name) ?></p>

        <p class="col col-md-4" class="social">
            <a rel="nofollow" target="_blank" href="http://ok.ru/group/53075399540914">
                <img alt="Группа в одноклассниках" src="/png/social/ok.png">
            </a>
            <a rel="nofollow" target="_blank" href="https://vk.com/vseti_goroda">
                <img alt="Группа в контакте" src="/png/social/vk.png">
            </a>
            <a rel="nofollow" target="_blank" href="https://www.facebook.com/groups/1749530445295409/">
                <img alt="Группа в фейсбуке" src="/png/social/fb.png">
            </a>
            <a rel="nofollow" target="_blank" href="https://twitter.com/vsetigoroda">
                <img alt="Группа в твиттере" src="/png/social/tw.png">
            </a>
            <a rel="nofollow" target="_blank" href="https://my.mail.ru/community/vseti-goroda.ru/?ref=">
                <img alt="Группа в mail.ru" src="/png/social/mail.png">
            </a>
            <a rel="nofollow" target="_blank" href="https://www.instagram.com/vsetigoroda/">
                <img alt="Группа в инстаграмме" src="/png/social/inst.png">
            </a>
        </p>
        <p class="col col-md-4"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
