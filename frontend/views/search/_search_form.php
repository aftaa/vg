<?php

use yii\helpers\Html;

?>
<form method="get" action="/search">
    <div class="container">
        <div class="row">
            <div class="col-xs-9">
                <input type="search" name="s" value="<?= empty($_REQUEST['s']) ? '' : Html::encode($_REQUEST['s']) ?>" placeholder="Искать..." id="search"
                       class="form-control" onclick="this.select()">
            </div>
            <div class="col-xs-1">
                <input type="submit" value="Искать" class="btn btn-success">
            </div>
        </div>
    </div>
</form>


