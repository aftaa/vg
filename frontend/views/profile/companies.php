<?php

use common\models\Company;
use yii\helpers\Url;

/** @var $companies Company[] */
/** @var $flash string */

$this->title = 'Компании';
$this->params['breadcrumbs'][] = array(
    'label' => 'Профиль ',
    'url'   => Url::to('/profile'),
);

$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('/site/_flash', ['flash' => $flash]) ?>

<table class="table table-hover table-striped">
    <thead>
    <tr>
        <th>Компания</th>
        <th>Категория</th>
        <th>Тариф</th>
        <th>Товаров</th>
        <th>Регион</th>
        <th>Описание</td>
    </tr>
    </thead>

    <tbody>
    <?php if ($companies): ?>
        <?php foreach ($companies as $company): ?>
            <tr>
                <td>
                    <?= $company->name ?>

                    <div class="text-muted">

                        <?php if ($company->getProducts()->count()): ?>
                            <a href="<?= Url::to(['profile/products', 'companyId' => $company->id]) ?>">
                                каталог товаров
                            </a>
                        <?php endif ?>

                    </div>
                </td>
                <td><?= $company->getCompanyCategory()->one()->name ?></td>
                <td>
                    <?= $company->old_tarif ?? '' ?>
                </td>

                <td>
                    <?= $company->getProducts()->count() ?>
                    <div>
                        <a href="<?= Url::to(['import/index', 'companyId' => $company->id]) ?>">
                            импорт!
                        </a>
                    </div>
                </td>

                <td><?= $company->getArea()->one()->name ?></td>
                <td><?= $company->introduce ?></td>
            </tr>
        <?php endforeach ?>
    <?php else: ?>
        <tr>
            <td colspan="99">У вас пока нет компаний</td>
        </tr>
    <?php endif ?>
    </tbody>
</table>

<a href="<?= Url::to(['create-company']) ?>" class="btn btn-success">Создать компанию</a>
