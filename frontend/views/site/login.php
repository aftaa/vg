<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $formModel common\vg\forms\VgLoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Логин';
$this->params['breadcrumbs'][] = $this->title;
?>

<br>
<br>

<div class="site-login">

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($formModel, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($formModel, 'password')->passwordInput() ?>

                <?= $form->field($formModel, 'rememberMe')->checkbox() ?>

                <div style="margin:1em 0">
                    <?= Html::a('Забыли пароль', ['site/request-password-reset']) ?>?
                    <br>
                    Не пришло письмо с активацией? <?= Html::a('Выслать ещё', ['site/resend-verification-email']) ?>!
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>