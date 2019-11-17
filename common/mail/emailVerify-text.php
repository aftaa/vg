<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
Приветствуем, <?= $user->username ?>!

Пройдите по ссылке ниже для подтверждения регистрации:

<?= $verifyLink ?>
