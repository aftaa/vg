<?php

use yii\helpers\Html;

?>
<footer class="footer">
    <div class="container">

        <p class="col col-md-4">&copy; 2016&ndash;<?= date('Y') ?> <?= Html::encode(Yii::$app->name) ?></p>

        <p class="col col-md-4" id="social-footer">
            <a rel="nofollow" target="_blank" href="http://ok.ru/group/53075399540914">
                <img alt="Группа в одноклассниках" src="/img/social/ok.png"></a>
            <a rel="nofollow" target="_blank" href="https://vk.com/vseti_goroda">
                <img alt="Группа в контакте" src="/img/social/vk.png"></a>
            <a rel="nofollow" target="_blank" href="https://www.facebook.com/groups/1749530445295409/">
                <img alt="Группа в фейсбуке" src="/img/social/fb.png"></a>
            <a rel="nofollow" target="_blank" href="https://twitter.com/vsetigoroda">
                <img alt="Группа в твиттере" src="/img/social/tw.png"></a>
            <a rel="nofollow" target="_blank" href="https://my.mail.ru/community/vseti-goroda.ru/?ref=">
                <img alt="Группа в mail.ru" src="/img/social/mail.png"></a>
            <a rel="nofollow" target="_blank" href="https://www.instagram.com/vsetigoroda/">
                <img alt="Группа в инстаграмме" src="/img/social/inst.png"></a>
        </p>
        <p class="col col-md-4">
            Создано <a href="http://kuba.moscow/" style="padding: 5px; color: #333; background: yellow">kuba.moscow</a>
            на <a href="http://www.yiiframework.com/" rel="external">Yii Framework</a>
        </p>
    </div>
</footer>
