<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $formModel common\vg\forms\VgPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Пароль';
$this->params['breadcrumbs'][] = array(
    'label' => 'Профиль ',
    'url' => Url::to('/profile/index'),
);
$this->params['breadcrumbs'][] = $this->title;

?>

<br>
<br>

<div class="site-login">

    <p>Для сменый пароля введите следующие данные:</p>
    <br>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'password-form']); ?>

            <?= $form->field($formModel, 'oldPassword')->passwordInput(['autofocus' => true]) ?>

            <hr size="1">

            <?= $form->field($formModel, 'newPassword1')->passwordInput() ?>

            <?= $form->field($formModel, 'newPassword2')->passwordInput() ?>


            <div class="form-group">
                <?= Html::submitButton('Сменить', ['class' => 'btn btn-danger', 'name' => 'password-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
