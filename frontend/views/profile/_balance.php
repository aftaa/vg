<?php

use common\vg\models\VgUser;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/** @var $balance float */
/** @var $this View */

?>

<?php if ($balance < 0): ?>
    <div class="alert-danger balance"><?= $balance ?>₽</div><br>
    <a href="#" onclick="return false;" data-toggle="modal" data-target="#myModal">восполнить</a>
<?php elseif ($balance > 0): ?>
    <div class="alert-success balance"><?= $balance ?>₽</div><br>
    <a href="#" onclick="return false;" data-toggle="modal" data-target="#myModal">дополнить</a>
<?php else: ?>
    <div class="alert-info balance"><?= $balance ?>₽</div><br>
    <a href="#" onclick="return false;" data-toggle="modal" data-target="#myModal">наполнить</a>
<?php endif ?>

<!-- Modal -->
<form method="post" action="<?= Url::to(['payment/invoice']) ?>" id="invoice">
    <?= Html::hiddenInput(Yii::$app->getRequest()->csrfParam, Yii::$app->getRequest()->getCsrfToken()) ?>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Пополнение баланса</h4>
                </div>
                <div class="modal-body">

                    <h2>Сумма пополнения:</h2>
                    <h3><input type="number" id="amount" name="amount" required> ₽</h3>

                    <?php if (VgUser::isUnderOtherUser()): ?>
                    <p class="alert-warning">
                        <label>
                            <input type="checkbox" value="1" name="now">
                            Вы находитесь под другим пользователем и можете пополнить его счёт немедленно.
                        </label>
                    </p>
                    <?php endif ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
                    <input type="submit" class="btn btn-primary" value="Пополнить"></input>
                </div>

            </div>
        </div>
    </div>
</form>
