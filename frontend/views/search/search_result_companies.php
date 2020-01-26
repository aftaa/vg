<?php

use common\vg\models\VgCompany;
use http\Url;

/** @var $companies VgCompany[] */

?>

<?php if ($companies): ?>
    <h2>мы нашли в компаниях:</h2>
    <?php foreach ($companies as $company): ?>
        <div class="col col-lg-6">
            <div style="margin-bottom: 3px; min-height: 55px;">

                <?php if ($company->thumb): ?>
                    <img src="<?= $company->thumb ?>" style="max-width: 50px; max-height: 50px;">
                <?php else: ?>
                    <img src="<?= VgCompany::NO_LOGO ?>" style="max-width: 50px; max-height: 50px;">
                <?php endif ?>

                <a href="<?= Url::to(['company/index', 'companyId' => $company->id]) ?>"
                   target="_blank" class="warning">
                    <?= strip_tags($company->name) ?>
                </a>
                <small class="default">
                    (<?= $company->area->name ?>)
                </small>

            </div>
        </div>
    <?php endforeach ?>
<?php endif ?>
