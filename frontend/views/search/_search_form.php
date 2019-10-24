<?php

use yii\helpers\Html;

?>
<form method="get" action="/search">
    <div class="container">
        <div class="row">
            <div class="col-xs-11">
                <input type="search" name="s" value="<?= Html::encode($s) ?>" placeholder="Искать..." id="search"
                       class="form-control">
            </div>
            <div class="col-xs-1">
                <input type="submit" value="Искать" class="btn btn-success">
            </div>
        </div>
    </div>
</form>


