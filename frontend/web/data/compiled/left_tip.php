<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><div class="meny_left_left">
    <div class="typ_acount">
        <?php if($ava) { ?>
        <div class="avat_lefft">
            <div class="avat_lefft_y "><img src="<?php echo $ava;?>" height="44" width="44"></div>
        </div>
        <?php } else { ?>
        <div class="avat_lefft">
            <div class="avat_lefft_y "><img src="data/com/thumb/tumbik.png"></div>
        </div>
        <?php } ?>
        <div class="n_aem"><a href="member.php?tip=1" class="<?php if($act=='index') { ?>selected<?php } ?>"><i
                class="icon-user-o"></i><?php echo $_username;?></a></div>
        <div class="maser"><?php if($_userid) { ?>
            <img alt="Баланс" src="images/ico/mot.png">
            <div id="nom"><?php echo $moneys;?></div>
            <i class="icon-renminbi"></i>
            <?php } ?>
        </div>
    </div>
    <div class="tip_menu_nav">
        <div class="">
            <a href="member.php?act=pay#pay" class="popolnit hash">пополнить</a>
        </div>
        <div class="tip_meny">
            <a href="mymessages.php?id=<?php echo $tip;?>#my_messages" class="hash"><i class="icon-comments"></i> Мои сообщения
                <div id="mesasga" class="mesa_my"><?php if($col<>0) { ?> +<?php echo $col;?><?php } ?><?php if($col==0) { ?> <?php echo $col;?><?php } ?></div>
            </a>
        </div>

        <div class="tip_meny">
            <a href="/zayvka.php?id=<?php echo $tip;?>#my_booking" class="hash"><i class="icon-paper-plane-o"></i> Мои заявки
                <div id="zav" class="mesa_my"><?php echo $z_new;?></div>
            </a>
        </div>

        <div class="tip_meny">
            <a href="member.php?act=modify&cheked=2#modify_profile" class="hash <?php if($act=='modify') { ?>selected<?php } ?>"><i
                    class="icon-gears"></i><?php echo $L['change_data'];?></a>
        </div>
        <div class="tip_meny">
            <a href="member.php?act=edit_password&cheked=2#change_password"
               class="hash <?php if($act=='edit_password') { ?>selected<?php } ?>"><i class="icon-cog"></i><?php echo $L['change_password'];?></a>
        </div>
        <div class="tip_meny">
            <a href="cont.php#contacts" class="hash <?php if($act=='info_comment') { ?>selected<?php } ?>"><i
                    class="icon-whatsapp"></i>Cвязаться с нами</a>
        </div>
        <div class="tip_meny">
            <a href="sodeistvie.php#my_banner" class="hash"><i class="icon-leaf"></i>Содействие проекту</a>
        </div>
        <!--<div class="tip_meny">-->
            <!--<a href=""><i class="icon-line-chart"></i>Реклама на сайте</a>-->
        <!--</div>-->
        <div class="tip_meny">
            <a href="member.php?act=logout"><i class="icon-signout"></i><?php echo $L['f_logout'];?></a>
        </div>
    </div>
</div>