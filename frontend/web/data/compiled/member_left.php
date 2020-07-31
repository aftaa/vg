<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><!-- Sidebar  --><?php if($tip==0) { ?>


<nav class="submenu" style='    float: left;
    width: 220px;
    margin-top: 45px;'>
    <ul class="expandable-menu">
        <li class="align-right back">
            <a href="#sidebar-mobile" class="dark-color active-hover click-slide"></a>
        </li>
        <?php if(!$_userid) { ?>
        <li>
            <a href="member.php?act=register" class="dark-color active-hover"><?php echo $L['f_registration'];?></a>
        </li>

        <li>
            <a href="member.php?act=login&refer=<?php echo $PHP_URL;?>" class="dark-color active-hover"><?php echo $L['f_login_to'];?></a>
        </li>

        <li>
            <a href="member.php?act=get_password" class="dark-color active-hover"><?php echo $L['f_forgot_password'];?></a>
        </li>
        <?php } ?>
        <?php if($_userid) { ?><?php if($cheked==0) { ?>
        <li>
            <a href="member.php"
               class="dark-color active-hover <?php if($act=='index') { ?>selected<?php } ?>"><?php echo $L['f_control_panel'];?></a>
        </li>

        <li>
            <a href="member.php?act=modify" class="dark-color active-hover <?php if($act=='modify') { ?>selected<?php } ?>"><?php echo $L['change_data'];?></a>
        </li>

        <li>
            <a href="member.php?act=edit_password"
               class="dark-color active-hover <?php if($act=='edit_password') { ?>selected<?php } ?>"><?php echo $L['change_password'];?></a>
        </li>


        <li>
            <a href="member.php?act=tarif" class="dark-color active-hover">Тарифы и оплата</a>
        </li>


        <?php } ?>

        <?php if($_userid) { ?>

        <?php if($comid) { ?>
        <li>
            <a href="member.php?act=info" class="dark-color active-hover <?php if($act=='info') { ?>selected<?php } ?>"><?php echo $L['f_my_listing'];?></a>
        </li>
        <?php } else { ?>
        <li>
            <a href="member.php?act=info" style="pointer-events: none;color: #e2e2e2;"
               class="dark-color active-hover <?php if($act=='info') { ?>selected<?php } ?>"><?php echo $L['f_my_listing'];?></a>
        </li>
        <?php } ?>

        <li>
            <a href="member.php?act=com" class="dark-color active-hover <?php if($act=='com') { ?>selected<?php } ?>">Моя компания</a>
        </li>

        <li>
            <a href="postcom.php" class="dark-color active-hover"><?php echo $L['add_company'];?></a>
        </li>
        <?php if($comid) { ?>
        <li>
            <a href="post.php" class="dark-color active-hover">Добавить объявление</a>
        </li>

        <li>
            <a href="parcer.php?lv=load" class="dark-color active-hover">Добавить YML/XML файл</a>
        </li>

        <li>
            <a href="member.php?act=new_list" class="dark-color active-hover">Новости компании</a>
        </li>


        <li>
            <a href="member.php?act=vacancy_list" class="dark-color active-hover">Вакансии</a>
        </li>

        <?php } else { ?>
        <li>
            <a href="post.php" class="dark-color active-hover" style="pointer-events: none;color: #e2e2e2;">Добавить
                объявление</a>
        </li>


        <li>
            <a href="member.php?act=new_list" class="dark-color active-hover"
               style="pointer-events: none;color: #e2e2e2;">Новости компании</a>
        </li>


        <li>
            <a href="member.php?act=vacancy_list" class="dark-color active-hover"
               style="pointer-events: none;color: #e2e2e2;">Вакансии</a>
        </li>
        <?php } ?>
        <li>
            <a href="cont.php" class="dark-color active-hover <?php if($act=='info_comment') { ?>selected<?php } ?>">Cвязаться с
                нами</a>
        </li>

        <li>
            <a href="member.php?act=logout" class="dark-color active-hover"><?php echo $L['f_logout'];?></a>
        </li>

        <?php } ?><?php } ?>
    </ul>
</nav>
<!-- END Sidebar  --><?php } ?>


<!-- Sidebar  -->  <?php if($tip==1) { ?>

<div class="sidebar grid-25 cream-gradient transition-all" id="sidebar-mobile" style="width:20%">
    <!-- Sidebar submenu box -->
    <div class="sidebar-box sidebar-top cream-gradient">
        <nav class="submenu">
            <ul class="expandable-menu">
                <li>
                    <a href="member.php" class="dark-color active-hover <?php if($act=='index') { ?>selected<?php } ?>"><?php echo $L['f_control_panel'];?></a>
                </li>

                <li>
                    <a href="member.php?act=modify&cheked=2"
                       class="dark-color active-hover <?php if($act=='modify') { ?>selected<?php } ?>"><?php echo $L['change_data'];?></a>
                </li>

                <li>
                    <a href="member.php?act=edit_password&cheked=2"
                       class="dark-color active-hover <?php if($act=='edit_password') { ?>selected<?php } ?>"><?php echo $L['change_password'];?></a>
                </li>

                <li>
                    <a href="post.php?tip=1&cheked=2" class="dark-color active-hover">Добавить объявление</a>
                </li>

                <li>
                    <a href="member.php?act=info&tip=1&cheked=2"
                       class="dark-color active-hover <?php if($act=='info') { ?>selected<?php } ?>"><?php echo $L['f_my_listing'];?></a>
                </li>
                <li>
                    <a href="cont.php" class="dark-color active-hover <?php if($act=='info_comment') { ?>selected<?php } ?>">Cвязаться
                        с нами</a>
                </li>

                <li>
                    <a href="member.php?act=logout" class="dark-color active-hover"><?php echo $L['f_logout'];?></a>
                </li>
            </ul>
        </nav>
    </div><!-- END Sidebar submenu box -->
</div><!-- END Sidebar  -->
<?php } ?>




