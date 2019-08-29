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

<table class="table">
    <thead>
    <tr>
        <td>№</td>
        <td>Компания</td>
        <td>Категория</td>
        <td>Регион</td>
        <td>Описание</td>
        <td>meta keywords</td>
        <td>meta description</td>
    </tr>
    </thead>

    <tbody>
    <?php if ($companies): ?>
        <?php foreach ($companies as $company): ?>
            <tr>
                <td><?= $company->id ?></td>
                <td><a href="<?= Url::to(['profile/company', 'companyId' => $company->id] ) ?>"><?= $company->name ?></a></td>
                <td><?= $company->getCompanyCategory()->one()->name ?></td>
                <td><?= $company->getArea()->one()->name ?></td>
                <td><?= $company->introduce ?></td>
                <td><?= $company->meta_keywords ?></td>
                <td><?= $company->meta_description ?></td>
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