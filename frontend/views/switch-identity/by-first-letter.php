<?php

use yii\helpers\Url;
use yii\web\View;

/** @var $view View */
/** @var $letter string */
/** @var $users array */

$this->title = 'В пользователя';
$this->params['breadcrumbs'][] = [
    'label' => $this->title,
    'url' => Url::to('/switch-identity'),
];
$this->params['breadcrumbs'][] = [
    'label' => $letter,
];

?>



<?php foreach ($users as $userId => $username): ?>
    <a href="<?= Url::to(['switch-identity/switch-to', 'userId' => $userId]) ?>"><?= $username ?><br>
<?php endforeach ?>
