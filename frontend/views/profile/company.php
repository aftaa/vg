<?php

use common\models\Area;
use common\models\Company;
use common\models\CompanyCategory;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/** @var $company Company */
/** @var $params CompanyParamValue[] */
/** @var $this View */
/** @var $flash string */

$this->title = $company->name;
$this->params['breadcrumbs'][] = array(
    'label' => 'Профиль',
    'url'   => Url::to('/profile'),
);
$this->params['breadcrumbs'][] = array(
    'label' => 'Компании',
    'url'   => Url::to('/profile/companies'),
);

$this->params['breadcrumbs'][] = $this->title;

$areas = Area::find()->select(['name', 'id'])->indexBy('id')->column();
$companyCategories = CompanyCategory::find()->select(['name', 'id'])->indexBy('id')->column();

?>

<?= $this->render('/site/_flash', ['flash' => $flash]) ?>

<div class="profile-company">
    <?php $form = ActiveForm::begin(['id' => 'profile-company']); ?>
    <div class="row">
        <div class="col-lg-6">

            <?= $form->field($company, 'name')->label('Название компании') ?>
            <?= $form->field($company, 'company_category_id')->dropDownList($companyCategories, ['prompt' => '']) ?>
            <?= $form->field($company, 'area_id')->dropDownList($areas, ['prompt' => '']) ?>
            <?= $form->field($company, 'introduce')->textarea() ?>
            <?= $form->field($company, 'meta_keywords')->textarea() ?>
            <?= $form->field($company, 'meta_description')->textarea() ?>

            <div class="form-group">
                <?= Html::submitButton('Обновить', ['class' => 'btn btn-primary', 'name' => 'company-button']) ?>
            </div>


        </div>
        <div class="col-lg-6">
            <?= $form->field($params, 'linkman') ?>
            <?= $form->field($params, 'phone') ?>
            <?= $form->field($params, 'icq') ?>
            <?= $form->field($params, 'msn') ?>
            <?= $form->field($params, 'email') ?>
            <?= $form->field($params, 'fax') ?>


        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>

