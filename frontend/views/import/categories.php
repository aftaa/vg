<?php

use common\models\ProductCategory;
use common\models\YmlCategory;

/** @var $siteCategories ProductCategory[] */
/** @var $ymlCategories YmlCategory[] */

$this->title = 'Сопоставление категорий';

?>

<table class="table table-bordered table-hover">
    <thead>
    <th width="50%">Yml</th>
    <th>Site</th>
    </thead>
    <tbody>
    <?php foreach ($ymlCategories as $ymlCategory): ?>
        <tr>
            <td><?= $ymlCategory->name ?></td>
            <td>
                <?php if ($ymlCategory->product_category_id): ?>
                    <?= $ymlCategory->product_category_id ?>:
                    <?= $siteCategories[$ymlCategory->name]->name ?>
                <?php endif ?>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>