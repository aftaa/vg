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
$this->params['hide_search'] =
    true;
?>

<table class="table table-hover table-striped">
    <thead>
    <tr class="alert-danger">
        <th>Логин</th>
        <th>E-mail</th>
        <th>Баланс</th>
        <th>Компания</th>
        <th class="text-center">Тариф</th>
        <th>Статус</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?= $identity->username ?></td>
        <td><?= $identity->email ?></td>
        <td>
            <?= $this->render('_balance', ['balance' => $member->balance]) ?>
        </td>
        <td>
            <?php if (!$member->getCompanies()->count()): ?>
                <div class="h5">У вас нет компаний!</div>
                <a href="<?= Url::to(['create-company']) ?>" class="btn btn-success">Создать компанию</a>
            <?php else: ?>
                <a href="#<?//= Url::to(['profile/edit-company',
                        'companyId' => $member->companies[0]->id
                ]) ?>"><?= $member->companies[0]->name ?></a>
            <?php endif ?>
        </td>

        <td class="text-center">&mdash;</td>

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

            <?= $form->field($member, 'first_name') ?>
            <?= $form->field($member, 'last_name') ?>
            <?= $form->field($member, 'middle_name') ?>
            <?= $form->field($member, 'phone') ?>
            <?= $form->field($member, 'position') ?>
            <?= $form->field($member, 'user_pic') ?>


            <div class="form-group">
                <?= Html::submitButton('Обновить', ['class' => 'btn btn-primary', 'name' => 'member-button']) ?>
                &nbsp; &nbsp; &nbsp;
                <a class="btn btn-danger" href="<?= Url::to('profile/password') ?>">Сменить пароль</a>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<div class="col-lg-2"></div>
<div class="col-lg-6">

    <?php
    $invoices = Invoice::find()
        ->where(['member_id' => $member->id])
        ->orderBy(['updated_at' => 'DESC'])
        ->limit(3)
        ->all();
    ?>

    <?php if ($invoices): ?>

        <?= $this->render('_invoices_history', ['invoices' => $invoices]) ?>

    <?php endif ?>
</div>
