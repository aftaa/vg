<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model common\vg\forms\VgLoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//$this->title = 'Войти';
//$this->params['breadcrumbs'][] = $this->title;
?>

<br>
<br>

<div class="site-login">

    <p>Для входа на сайт введите следующие данные:</p>
    <br>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

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
