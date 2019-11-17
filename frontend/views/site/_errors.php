<?php

use yii\web\View;

/** @var $this View */
/** @var $errors array */

?>

<?php if ($errors): ?>
    <div class="alert alert-danger" role="alert">
        <?php foreach ($errors as $error): ?>
            <?= $error ?>
            <br>
        <?php endforeach ?>
    </div>
<?php endif ?>

