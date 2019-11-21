<?php

use common\models\Company;
use yii\helpers\Url;

/** @var $companies array|Company[] */
/** @var $divId string */

?>

<div class="row" id="<?= $divId ?>">
    <?php foreach ($companies as $company): ?>
        <div class="col col-xs-6 col-sm-4 col-lg-3" class="index-product-row">
            <br><br>
            <div class="index-product-name">
                <a href="<?= Url::to(['company/index', 'companyId' => $company->id]) ?>">
                    <?= $company->name ?>
                </a>
            </div>
            <div class="index-company-thumb">
                <a href="<?= Url::to(['company/index', 'companyId' => $company->id]) ?>">
                    <img alt="" src="<?= $company->thumb ?>" data-id="<?= $company->id ?>">
                </a>
            </div>
        </div>
    <?php endforeach ?>
</div>
