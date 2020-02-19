<?php

use common\models\YmlFile;
use common\models\YmlOffer;
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
            <th>Активен?</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($files as $file): ?>
            <tr>
                <td><?= $file->url ?></td>
                <td><?= $file->created_at ?></td>
                <td>
                    <a href="<?= Url::to(['import/categories', 'fileId' => $file->id]) ?>" target="_blank">
                        <?= count($file->ymlCategories) ?>
                    </a>
                </td>
                <td><?= count(YmlOffer::findAll(['yml_file_id' => $file->id])) ?></td>
                <td><?= $file->checked ? 'Да' : 'Нет' ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
<?php else: ?>
    <hr>
    <h3>Загруженных файлов нет</h3>
<?php endif ?>
<h2>
    <a href="<?= Url::to(['import/index', 'companyId' => $companyId]) ?>" class="btn btn-info">Загрузить</a>
</h2>

