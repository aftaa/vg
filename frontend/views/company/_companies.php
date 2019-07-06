<?php

use common\models\Company;
use yii\helpers\Url;
use yii\web\View;

/** @var $this View */
/** @var $companies Company[] */

?>

<div class="container">
    <?php if ($companies): ?>

        <?php foreach ($companies as $i => $company): ?>

            <?php //if (!count($company->products)) continue ?>

            <div class="row <?php //if (!($i % 2)) echo 'bg-warning' ?> company">
                <div class="col col-lg-2">
                    <br>
                    <?php if ($company->thumb): ?>
                        <img alt="<?= $company->name ?>" src="<?= $company->thumb ?>" class="col-lg-8">
                    <?php endif ?>
                </div>
                <div class="col col-lg-4">
                    <h2>
                        <a href="<?= Url::to(['company/index', 'companyId' => $company->id]) ?>">
                            <?= $company->name ?>
                        </a>
                    </h2>

                    <div>
                        <span class="font-weight-bold">Регион: </span>
                        <a href="<?= Url::to(['area/index', 'areaId' => $company->area->id ]) ?>">
                            <?= $company->area->name ?>
                        </a>
                    </div>

                    <?php if (count($company->products)): ?>
                        <div>
                            <span class="font-weight-bold">Представлено товаров: </span>
                            <?= count($company->products) ?>
                        </div>
                    <?php endif ?>


                    <br>
                    <br>
                </div>
            </div>

        <?php endforeach ?>

    <?php endif ?>
</div>

<br><br>