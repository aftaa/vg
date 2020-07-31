<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><?php

use vsetigoroda\MemberMysqliRepository;
use vsetigoroda\Banner;
ini_set('display_errors', 'On');
error_reporting(E_ALL);

?>

<div class="sodeis">Уважаемые пользователи и рекламодатели.
Если Вам нравится наш проект, вы можете помочь его развитию.
Вы можете сделать это используя социальные виджеты установленные на страницах сайта, так же присоединяйтесь к нашим группам.
</div>
<div class="o_o">
<span>Мы в социальных сетях</span> 
<div class="block_cocseti_img"><a rel="nofollow" target="_blank" href="http://ok.ru/group/53075399540914"><img  src="../images/ico/yoot.png"></a></div>
<div class="block_cocseti_img"><a rel="nofollow" target="_blank" href="http://ok.ru/group/53075399540914"><img  src="../images/ico/gog.png"></a></div>
<div class="block_cocseti_img"><a rel="nofollow" target="_blank" href="http://ok.ru/group/53075399540914"><img  src="../images/ico/sodn.png"></a></div>
<div class="block_cocseti_img"><a rel="nofollow" target="_blank" href="https://vk.com/vseti_goroda"><img src="../images/ico/svk.png"></a></div>
<div class="block_cocseti_img"><a rel="nofollow" target="_blank" href="https://www.facebook.com/groups/1749530445295409/"><img src="../images/ico/sfs.png"></a></div>
<div class="block_cocseti_img"><a rel="nofollow" target="_blank" href="https://twitter.com/vsetigoroda"><img  src="../images/ico/stv.png"></a></div>
<div class="block_cocseti_img"><a rel="nofollow" target="_blank" href="https://my.mail.ru/community/vseti-goroda.ru/?ref="><img  src="../images/ico/sml.png"></a></div>
<div class="block_cocseti_img"><a rel="nofollow" target="_blank" href="https://www.instagram.com/vsetigoroda/"><img  src="../images/ico/sinst.png"></a></div>
</div>
<div class="sodeis">Компании и интернет магазины могут установить на своём сайте обратную ссылку на свою страницу.
</div>
<div class="sodeis_blok">
    <textarea readonly="1" onclick="this.select();" onfocus="this.select();" style="width: 560px;height: 34px;"><?=
        $banner = new Banner(
            (new MemberMysqliRepository)
                ->getMemberById($_SESSION['userid'])
                    ->getCompany()
        )
        ?></textarea> &nbsp;&nbsp;&nbsp
    <?= $banner ?>
</div>