<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'owner_id')->textInput() ?>

    <?= $form->field($model, 'company_category_id')->textInput() ?>

    <?= $form->field($model, 'area_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'introduce')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'thumb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'checked')->textInput() ?>

    <?= $form->field($model, 'meta_keywords')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'meta_description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
