<?php

use common\models\Area;
use yii\helpers\Url;
use yii\web\View;

/** @var $this View */
/** @var $area Area */

$this->title = "$area->name: продукция и услуги";

$this->params['breadcrumbs'][] = [
    'label' => $this->title,
];

?>

<div class="container">
    <?php if ($areas = $area->getAreas()->orderBy('name')->all()): ?>

        <div class="row">
            <?php foreach ($areas as $area): ?>
                <?php if (!$area->companies) continue ?>
                <div class="col-lg-2 col-md-3 col-sx-6">
                    <a href="<?= Url::to(['area/index', 'areaId' => $area->id]) ?>"><?= $area->name ?></a>
                    <small>
                        <sup>
                            <?= count($area->companies) ?>
                        </sup>
                    </small>
                </div>
            <?php endforeach ?>
        </div>
    <?php endif ?>
</div>

<?php if ($area->companies): ?>
    <hr size="1">
    <?= $this->render('/company/_companies', ['companies' => $area->getCompanies()->all()]) ?>
<?php endif ?>