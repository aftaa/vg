<?php

use yii\helpers\Url;
use yii\web\View;

/** @var $view View */
/** @var $letter string */
/** @var $users array */

$this->title = 'В пользователя';
$this->params['breadcrumbs'][] = [
    'label' => $this->title,
    'url'   => Url::to('/switch-identity'),
];
$this->params['breadcrumbs'][] = [
    'label' => $letter,
];

?>


<div class="container">
    <?php foreach ($users as $userId => $username): ?>
        <div class="col col-lg-3 col-md-4 col-sm-6">
            <a href="<?= Url::to(['switch-identity/switch-to', 'userId' => $userId]) ?>"><?= $username ?><br>
        </div>
    <?php endforeach ?>
</div>
