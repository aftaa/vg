<?php

use common\models\Area;
use common\models\Company;
use common\models\CompanyCategory;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Создать компанию';
$this->params['breadcrumbs'][] = array(
    'label' => 'Профиль',
    'url'   => Url::to('/profile'),
);
$this->params['breadcrumbs'][] = array(
    'label' => 'Компании',
    'url'   => Url::to('/profile/companies'),
);
$this->params['breadcrumbs'][] = $this->title;

$areas = Area::find()
    ->select(['name', 'id', 'parent_id'])
    ->where('parent_id IS NULL')
    ->orderBy('name')
    ->indexBy('id')->column();

$companyCategories = CompanyCategory::find()
    ->select(['name', 'id', 'parent_id'])
    ->where('parent_id IS NULL')
    ->orderBy('name')
    ->indexBy('id')->column();

/** @var $company Company */

?>

<?php if ($company->errors): ?>
    <?php print($company->errors) ?>
<?php endif ?>
<?php $form = ActiveForm::begin(['id' => 'profile-company']); ?>
<div class="profile-company">
    <div class="row">
        <div class="col-lg-5">


            <?= $form->field($company, 'name')->label('Название компании') ?>
            <?= $form->field($company, 'thumb')->label('Ссылка на логотип') ?>
            <?= $form->field($company, 'company_category_id')->dropDownList($companyCategories, ['prompt' => '']) ?>
            <?= $form->field($company, 'area_id')->dropDownList($areas, ['prompt' => '']) ?>
            <?= $form->field($company, 'introduce')->textarea() ?>
            <?= $form->field($company, 'meta_keywords')->textarea() ?>
            <?= $form->field($company, 'meta_description')->textarea() ?>

            <div class="form-group">
                <?= Html::submitButton('Создать', ['class' => 'btn btn-primary', 'name' => 'company-button']) ?>
            </div>


        </div>
        <div class="col-lg-2"></div>

        <div class="col-lg-5">
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
