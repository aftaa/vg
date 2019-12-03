<?php

use common\models\YmlFile;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */
/* @var $files YmlFile[] */
/* @var $companyId int */

?>

<?php if ($files): ?>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>URL</th>
            <th>Загружен</th>
            <th>Категорий</th>
            <th>Товаров</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($files as $file): ?>
            <tr>
                <td><?= $file->url ?></td>
                <td><?= $file->created_at ?></td>
                <td><?= count($file->ymlCategories) ?></td>
                <td></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
<?php else: ?>
    <hr>
    <h3>Загруженных файлов нет</h3>
    <h2>
        <a href="<?= Url::to(['import/index', 'companyId' => $companyId]) ?>" class="btn btn-info">Загрузить</a>
    </h2>
<?php endif ?>
