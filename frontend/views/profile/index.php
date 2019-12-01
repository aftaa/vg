<?php

use common\models\Invoice;
use common\models\Member;

/** @var $this yii\web\View */
/** @var $success bool */

/** @var $member Member */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$identity = Yii::$app->user->getIdentity();
$this->title = 'Профиль';
$this->params['breadcrumbs'][] = $this->title;
?>

<table class="table">
    <thead>
    <tr>
        <th>Логин</th>
        <th>Пароль</th>
        <th>E-mail</th>
        <th>Баланс</th>
        <th>Компаний</th>
        <th>Статус</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?= $identity->username ?></td>
        <td><a href="<?= Url::to(['profile/password']) ?>">сменить<br>пароль</a></td>
        <td><?= $identity->email ?></td>
        <td>
            <?= $this->render('_balance', ['balance' => $member->balance]) ?>
        </td>
        <td>
            <?= $member->getCompanies()->count() ?><br>
            <a href="<?= Url::to(['profile/companies']) ?>">глянуть</a>
        </td>
        <td><?= $identity->attributeLabels()[$identity->status] ?></td>

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
        Информация обновлена
    </div>
<?php endif ?>

<?php if (Yii::$app->getSession()->hasFlash('balance')): ?>
    <div class="alert alert-warning" role="alert">
        <?= Yii::$app->getSession()->getFlash('balance') ?>
    </div>
<?php endif ?>

<div class="col-lg-4">
    <div class="profile-member">
        <div class="row">
            <?php $form = ActiveForm::begin(['id' => 'member-form']); ?>

            <?= $form->field($member, 'first_name')->input(['autofocus' => true]) ?>
            <?= $form->field($member, 'last_name') ?>
            <?= $form->field($member, 'middle_name') ?>
            <?= $form->field($member, 'position') ?>
            <?= $form->field($member, 'phone') ?>

            <div class="form-group">
                <?= Html::submitButton('Обновить', ['class' => 'btn btn-primary', 'name' => 'member-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<div class="col-lg-2"></div>
<div class="col-lg-6">
    <?php if (!$member->getCompanies()->count()): ?>
        <div class="h3">У вас нет компаний!</div>
        <br>
        <a href="<?= Url::to(['create-company']) ?>" class="btn btn-success">Создать компанию</a>
    <?php endif ?>

    <?php
    $invoices = Invoice::find()
        ->where(['member_id' => $member->id])
        ->orderBy(['updated_at' => 'DESC'])
        ->limit(3)
        ->all();
    ?>

    <?php if ($invoices): ?>

        <h3>История</h3>

        <?php foreach ($invoices as $invoice): ?>
            <div>
                <small><?= (new \DateTime($invoice->updated_at))->format('d.m.y H:i') ?></small>
                <div class="h4 text-right">
                    +<?= $invoice->amount ?> ₽
                </div>
            </div>
            <hr size="1">
        <?php endforeach ?>
    <?php endif ?>
</div>
