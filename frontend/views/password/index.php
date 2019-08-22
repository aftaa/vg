<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$identity = Yii::$app->user->getIdentity();
$this->title = 'Профиль ' . $identity->username;
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = 'Пароль';

?>
<div class="site-password">

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'password-form']); ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
