<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model common\vg\forms\VgPasswordForm */

/* @var $success bool */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Пароль';
$this->params['breadcrumbs'][] = array(
    'label' => 'Профиль ',
    'url'   => Url::to('/profile'),
);
$this->params['breadcrumbs'][] = $this->title;

?>

<br>
<br>

<?php if ($success): ?>
    <div class="alert alert-success" role="alert">
        Пароль изменен
    </div>
<?php endif ?>

<div class="site-login">
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'password-form']); ?>

            <?= $form->field($model, 'newPassword1')->passwordInput() ?>

            <?= $form->field($model, 'newPassword2')->passwordInput() ?>


            <div class="form-group">
                <?= Html::submitButton('Сменить', ['class' => 'btn btn-primary', 'name' => 'password-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
