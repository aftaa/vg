<?php

/* @var $this View */

/* @var $company Company */

use common\models\Company;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

$this->title = 'Импорт товаров';

$this->params['breadcrumbs'][] = array(
    'label' => 'Профиль ',
    'url'   => Url::to('/profile'),
);
$this->params['breadcrumbs'][] = [
    'label' => 'Компании',
    'url'   => Url::to(['profile/companies']),
];
$this->params['breadcrumbs'][] = [
    'label' => $company->name,
    //    'url'   => Url::to(['profile/companies']),
];
$this->params['breadcrumbs'][] = $this->title;
?>

<form action="<?= Url::to(['profile/import/load', 'companyId' => $company->id]) ?>" method="post"
      enctype="multipart/form-data">
    <?= Html::hiddenInput(Yii::$app->getRequest()->csrfParam, Yii::$app->getRequest()->getCsrfToken()) ?>
    <h1>URL<sup>*</sup>:</h1>
    <input type="text" class="form-control" required value="http://tt/556.xml" style="font-size: 20px;">
    <br>
    <input type="submit" class="btn btn-danger" value="Импорт" id="import">
    <br><br>
    <label>
        <div style="font-weight: normal;">
            <input type="checkbox" name="url_periodical_check" checked>
            сопоставить URL компании <?= $company->name ?> и периодически обновлять информацию из файла
        </div>
    </label>
    <hr size="1">
    <sup>*</sup> &mdash; максимальный размер файла <?= ini_get('upload_max_filesize') ?>б
</form>

