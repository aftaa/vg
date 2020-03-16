<?php

use yii\helpers\Html;
use yii\web\View;

/** @var $this View */
/** @var $s string  */

$s = Yii::$app->request->get('s');

?>

<form method="get" action="/search" class="nav-search">
    <input type="search" name="s" value="<?= Html::encode($s) ?>" placeholder="Искать..." id="search">
</form>

