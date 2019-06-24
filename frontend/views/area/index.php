<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

/* @var $areas common\models\Area[] */

$this->title = 'Регионы и населенные пункты';
$this->params['breadcrumbs'][] = [
    'label' => $this->title,
];
?>

<div class="container">
    <div class="row">
        <div class="col">
            <?php foreach ($areas as $area): ?>
                <h2><?= $area->name ?></h2>
                <?php foreach ($area->areas as $area1): ?>
                    <a href="<?= Url::to(['area/index', 'areaId' => $area1->id ]) ?>" class="bg-info"><?= $area1->name ?></a>&nbsp;&nbsp;&nbsp;
                    <?php foreach ($area1->areas as $area2): ?>
                        <span class="bg-alert"><?= $area2->name ?></span>&nbsp;&nbsp;&nbsp;
                    <?php endforeach ?>
                <?php endforeach ?>
            <?php endforeach ?>
        </div>

    </div>
</div>
