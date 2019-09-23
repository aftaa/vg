<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */

$labels = (new User)->attributeLabels();
$statuses = [
        User::STATUS_ACTIVE => $labels[User::STATUS_ACTIVE],
        User::STATUS_DELETED => $labels[User::STATUS_DELETED],
        User::STATUS_INACTIVE => $labels[User::STATUS_INACTIVE],
];

?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput([
            'type' => 'email'
    ]) ?>
    <?= $form->field($model, 'status')->dropDownList($statuses) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
