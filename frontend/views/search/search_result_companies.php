<?php

use common\vg\models\VgCompany;
use yii\helpers\Url;

/** @var $companies VgCompany[] */

?>

<?php if ($companies): ?>
    <h2>мы нашли в компаниях:</h2>
    <div class="container">
        <div class="row">
            <?php foreach ($companies as $company): ?>
                <div class="col col-md-4 col-sm-4 col-sx-6 text-center">

                    <div style="min-height: 110px"><img alt="" src="<?= $company->thumb ?>" class="search-company-thumb"></div>


                    <a href="<?= Url::to(['company/index', 'companyId' => $company->id]) ?>">
                        <?= $company->name ?>
                    </a>
                    <br><hr size="1">
                </div>
            <?php endforeach ?>
        </div>
    </div>
<?php endif ?>
