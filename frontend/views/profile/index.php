<?php

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
        <td>Логин</td>
        <td>Пароль</td>
        <td>E-mail</td>
        <td>Баланс</td>
        <td>Компаний</td>
        <td>Статус</td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?= $identity->username ?></td>
        <td><a href="<?= Url::to(['profile/password']) ?>">сменить<br>пароль</a></td>
        <td><?= $identity->email ?></td>
        <td><?= $this->render('_balance', ['balance' => $member->balance]) ?></td>
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

<div class="profile-member">
    <div class="row">
        <div class="col-lg-5">
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
