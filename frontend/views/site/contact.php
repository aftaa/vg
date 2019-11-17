<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model ContactForm */

use frontend\models\ContactForm;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'На связи с администрацией';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">

    <p>
    </p>

    <div class="row">
        <div class="col-sm-6">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'subject') ?>

            <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
            ]) ?>

            <div class="form-group">
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>


        <div class="col-sm-6 text-right">
            <div class="h4">А также можно написать нам электронное письмо!</div>

            <br>Вопросы по&nbsp;работе разделов, форм импорта, показа в&nbsp;топе и&nbsp;других возможных логических
            несуразностей,
            а&nbsp;также помощи и&nbsp;консультации в&nbsp;случае, если чего не&nbsp;получается &mdash;
            <div class="h4"><a
                        href="mailto:support@<?= $_SERVER['SERVER_NAME'] ?>">support@<?= $_SERVER['SERVER_NAME'] ?></a>
            </div>

            <hr>
            <br>Технические проблемы, ошибки с&nbsp;нашей стороны, тормоза в работе или вовсе недоступность сайта &mdash;
            <div class="h4"><a href="mailto:root@<?= $_SERVER['SERVER_NAME'] ?>">root@<?= $_SERVER['SERVER_NAME'] ?></a>
            </div>

            <hr>
            <br>Вопросы по&nbsp;оплате, зачислению средств, вопросы сотрудничества, ну&nbsp;и&nbsp;общие вопросы &mdash;
            <div class="h4"><a
                        href="mailto:admin@<?= $_SERVER['SERVER_NAME'] ?>">admin@<?= $_SERVER['SERVER_NAME'] ?></a>
            </div>

        </div>
    </div>

</div>
