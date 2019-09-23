<?php

use yii\helpers\Html;

/** @var string $s */
$s = Yii::$app->request->get('s');

?>

<form method="get" action="/search" class="nav-search">
    <input type="search" name="s" value="<?= Html::encode($s) ?>" placeholder="Искать..." id="search">
</form>

