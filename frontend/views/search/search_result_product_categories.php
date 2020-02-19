<?php

/** @var $productCategories VgProductCategory[] */

use yii\helpers\Url;

?>

<?php if (!empty($productCategories)): ?>
    <div class="col lead">
    <div style="clear:both;"></div>
    <hr size="1">
    <h2>в категориях мы нашли:</h2>
    <?php foreach ($productCategories as $category): ?>
        <div style="margin-bottom: 3px;">
            <a href="<?= Url::to(['product/category', 'categoryId' => $category->id]) ?>"
               target="_blank">
                <?= $category->name ?>
            </a>
        </div>
    <?php endforeach; ?>
<?php endif ?>
