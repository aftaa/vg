<?php

use common\models\Company;
use common\vg\models\VgCompany;
use yii\helpers\Url;
use yii\web\View;

/** @var $this View */
/** @var $companies Company[] */

?>

<div class="container">
    <?php if ($companies): ?>

        <?php foreach ($companies as $i => $company): ?>

            <div class="col col-lg-3 col-md-3 col-sx-6"
                 style="min-height: 150px; line-height: 100px; text-align: center;">
                <a href="<?= Url::to(['company/index', 'companyId' => $company->id]) ?>">
                    <?php if ($company->thumb): ?>
                        <img alt="<?= $company->name ?>" src="<?= $company->thumb ?>"
                             style="max-width: 100px; max-height: 100px;">
                    <?php else: ?>
                    <img alt="" src="<?= VgCompany::NO_LOGO ?>" style="max-width: 150px; max-height: 150px;">
                </a>
                <?php endif ?>
            </div>

            <div class="col col-lg-3 col-md-3 col-sx-6" style="min-height: 200px; text-align: center;">
                <h3>
                    <a href="<?= Url::to(['company/index', 'companyId' => $company->id]) ?>">
                        <?= $company->name ?>
                    </a>
                </h3>

                <div>
                    <small>
                        <a href="<?= Url::to(['area/index', 'areaId' => $company->area->id]) ?>">
                            <?= $company->area->name ?>
                        </a>
                    </small>
                </div>

                <?php if (count($company->products)): ?>
                    <div>
                        <span class="font-weight-bold">предоставлено товаров: </span>
                        <?= count($company->products) ?>
                    </div>
                <?php endif ?>
            </div>
        <?php endforeach ?>
    <?php endif ?>
</div>

<br><br>