<?php

use yii\helpers\Url;

/* @var $balance int */

$this->title = 'Баланс';
$this->params['breadcrumbs'][] = array(
    'label' => 'Профиль',
    'url'   => Url::to('/profile'),
);

$this->params['breadcrumbs'][] = $this->title;

?>

<?php if ($balance): ?>
    <h2><?= $balance ?>₽</h2>
<?php endif ?>
