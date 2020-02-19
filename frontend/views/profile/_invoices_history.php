<?php

use common\models\Invoice;

/** @var $invoices Invoice */

?>

<h3>История</h3>

<?php foreach ($invoices as $invoice): ?>
    <div>
        <small><?= (new \DateTime($invoice->updated_at))->format('d.m.y H:i') ?></small>
        <div class="h4 text-right">
            <?php if ($invoice->amount > 0): ?>
                +<?= $invoice->amount ?> ₽
            <?php else: ?>
                <?= $invoice->amount ?> ₽
            <?php endif ?>
        </div>
    </div>
    <hr size="1">
<?php endforeach ?>

