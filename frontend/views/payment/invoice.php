<?php

use yii\web\View;

/* @var $this View */
/* @var $fields array */

?>

<form method="post" action="https://wl.walletone.com/checkout/checkout/Index" accept-charset="UTF-8">
    <?php foreach ($fields as $name => $value): ?>
        <?= $name ?>: <input name="<?= $name ?>" value="<?= $value ?>" type="text"><br>
    <?php endforeach ?>
    <input type="submit">
</form>

<script type="text/javascript">
    //document.forms[0].submit();
</script>