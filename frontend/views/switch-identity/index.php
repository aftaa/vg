<?php

use yii\helpers\Url;
use yii\web\View;

/** @var $view View */
/** @var $letters array */

$this->title = 'В пользователя';
$this->params['breadcrumbs'][] = [
    'label' => $this->title,
];
?>

<p class="lead col-md-9">
    Зайти под другим пользователем позволяет увидеть сайт его глазами, пощупать его руками и сделать выводы его мозгами.
    Выберите букву (или цифру):
</p>

<br clear="both">

<?php foreach ($letters as $letter): ?>
    <div class="h1 col-xs-1"><a href="<?= Url::to(['by-first-letter', 'letter' => $letter]) ?>"><?= $letter['letter'] ?></a></div>
<?php endforeach ?>
<?= $count ?>
