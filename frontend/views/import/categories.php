<?php

use common\models\YmlCategory;
use common\vg\models\import\VgYmlCategoryChoice;
use yii\web\View;

/** @var $ymlCategories YmlCategory[] */
/** @var $choices VgYmlCategoryChoice[] */
/** @var $this View */

$this->title = 'Сопоставление категорий';

?>

<table class="table table-bordered table-hover">
    <thead>
    <th width="2%">#</th>
    <th width="45%">Yml</th>
    <th width="6%">Choice</th>
    <th>Site</th>
    </thead>
    <tbody>
        <?php foreach ($choices as $choice): ?>
            <tr<?php if ($choice->productCategoriesChoice->count()) echo ' class="alert-info"';
            else echo ' class="alert-danger"' ?>>
                <td><?= $choice->ymlCategory->id ?></td>
                <td><?= $choice->ymlCategory->name ?></td>
                <td><?= $choice->productCategoriesChoice->count() ?></td>
                <td>
                    <?php foreach ($choice->productCategoriesChoice->productCategories as $productCategory): ?>

                        <?php if ($productCategory->parent): ?>

                            <?php if ($productCategory->parent->parent): ?>
                                <?= $productCategory->parent->parent->name ?> /
                            <?php endif ?>

                            <?= $productCategory->parent->name ?> /
                        <?php endif ?>

                        <?= $productCategory->name ?>
                        <br><br>
                    <?php endforeach ?>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>