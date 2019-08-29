<?php

/** @var $this yii\web\View */
/** @var $success bool */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;


$identity = Yii::$app->user->getIdentity();
$this->title = 'Профиль';
$this->params['breadcrumbs'][] = $this->title;
?>

<table class="table">
    <thead>
    <tr>
        <td>№</td>
        <td>Логин</td>
        <td>E-mail</td>
        <td>Статус</td>
        <td>Регистрация</td>
<!--        <td>Обновление</td>-->
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?= $identity->getId() ?></td>
        <td><?= $identity->username ?></td>
        <td><?= $identity->email ?></td>
        <td><?= $identity->attributeLabels()[$identity->status] ?></td>
        <td><?= date('d.m.Y H:i', $identity->created_at) ?></td>
<!--        <td>--><?//= date('d.m.Y H:i', $identity->updated_at) ?><!--</td>-->
    </tr>
    </tbody>
    <tfoot>
    <tr>
        <td colspan="99"></td>
    </tr>
    </tfoot>
</table>

<?php if ($success): ?>
    <div class="alert alert-success" role="alert">
        Данных сохранены.
    </div>
<?php endif ?>

<div class="profile-member">
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'member-form']); ?>

            <?= $form->field($model, 'first_name')->input(['autofocus' => true]) ?>
            <?= $form->field($model, 'last_name') ?>
            <?= $form->field($model, 'middle_name') ?>
            <?= $form->field($model, 'position') ?>
            <?= $form->field($model, 'phone') ?>

            <div class="form-group">
                <?= Html::submitButton('Обновить', ['class' => 'btn btn-primary', 'name' => 'member-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
