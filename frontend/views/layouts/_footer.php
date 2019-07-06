<?php

use yii\helpers\Html;

?>
<footer class="footer">
    <div class="container">

        <p class="col col-md-4">&copy; 2016&ndash;<?= date('Y') ?> <?= Html::encode(Yii::$app->name) ?></p>

        <p class="col col-md-4" class="social">
            <a rel="nofollow" target="_blank" href="http://ok.ru/group/53075399540914">
                <img alt="Группа в одноклассниках" src="/png/social/ok.png">
            </a>
            <a rel="nofollow" target="_blank" href="https://vk.com/vseti_goroda">
                <img alt="Группа в контакте" src="/png/social/vk.png">
            </a>
            <a rel="nofollow" target="_blank" href="https://www.facebook.com/groups/1749530445295409/">
                <img alt="Группа в фейсбуке" src="/png/social/fb.png">
            </a>
            <a rel="nofollow" target="_blank" href="https://twitter.com/vsetigoroda">
                <img alt="Группа в твиттере" src="/png/social/tw.png">
            </a>
            <a rel="nofollow" target="_blank" href="https://my.mail.ru/community/vseti-goroda.ru/?ref=">
                <img alt="Группа в mail.ru" src="/png/social/mail.png">
            </a>
            <a rel="nofollow" target="_blank" href="https://www.instagram.com/vsetigoroda/">
                <img alt="Группа в инстаграмме" src="/png/social/inst.png">
            </a>
        </p>
        <p class="col col-md-4"><?= Yii::powered() ?></p>
    </div>
</footer>
