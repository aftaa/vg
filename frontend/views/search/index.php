<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var string $s */
$s = Yii::$app->request->get('s');

$this->title = 'Поиск';
$this->params['breadcrumbs'][] = [
    'label' => $this->title,
    'url' => Url::to(['/search'])
];
$this->params['breadcrumbs'][] = [
    'label' => Html::encode($s)
];
?>

<div class="container">
    <form method="get">
        <input type="search" name="s" value="<?= Html::encode($s) ?>" placeholder="Искать..." id="search"
               class="form-control">
        <br>
        <input type="submit" value="Искать" class="btn btn-success">
    </form>

    <hr size="1">

    <div class="w-100"></div>

    <div class="row">
        <div class="col-lg-12">
            <p class="h4">
                По запросу «<?= $s ?>» найдено:
            </p>
        </div>

        <div class="col col-lg-4">
            <h2>в товарах</h2>
            ничего
        </div>
        <div class="col col-lg-4">
            <h2>в компаниях</h2>
            ничего
        </div>
        <div class="col col-lg-4">
            <h2>в другом</h2>
            ничего
        </div>
    </div>


</div>