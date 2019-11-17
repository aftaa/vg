<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
$labels = (new User)->attributeLabels();
$statuses = [
    ''                     => '',
    User::STATUS_ACTIVE   => $labels[User::STATUS_ACTIVE],
    User::STATUS_DELETED  => $labels[User::STATUS_DELETED],
    User::STATUS_INACTIVE => $labels[User::STATUS_INACTIVE],
];
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action'  => ['index'],
        'method'  => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <? //= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <? //= $form->field($model, 'auth_key') ?>

    <? //= $form->field($model, 'password_hash') ?>

    <? //= $form->field($model, 'password_reset_token') ?>

    <?php echo $form->field($model, 'email') ?>

    <?php echo $form->field($model, 'status')->dropDownList($statuses) ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'verification_token') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
