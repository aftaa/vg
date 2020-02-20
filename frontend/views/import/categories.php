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

                    <?php if ($siteCategories[$ymlCategory->product_category_id]->parent_id): ?>
                        <?php if (isset($siteCategories[$ymlCategory->product_category_id]->parent->parent_id)): ?>
                            <i><?= $siteCategories[$ymlCategory->product_category_id]->parent->parent->name ?> &rarr;</i>
                        <?php endif ?>

                        <?= $siteCategories[$ymlCategory->product_category_id]->parent->name ?> &rarr;


                    <?php endif ?>

                    <b><?= $siteCategories[$ymlCategory->product_category_id]->name ?></b>
                <?php endif ?>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>