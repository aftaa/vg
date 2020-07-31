<?php if (!defined('IN_AWEBCOM')) die('Access Denied'); ?>
<meta name="w1-verification" content="162634143288"/>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname']; ?>/style/search_vseti.css" type="text/css">
<a id="top" class='lock'></a>
<div id="modal_form1">
    <div class="voi">
        <div class="names">Вход в кабинет</div>
        <form class="content-form" name="form1" method="post" action="member.php?act=act_login" autocomplete="off">
            <input type="hidden" name="refer" value="<?php echo $refer; ?>"/>
            <div class="fo_input">
                <input type="text" placeholder="LOGIN" name="username" id="username"/></div>
            <div class="fo_input">
                <input type="password" placeholder="PASSWORD" name="password" id="password"/></div>
            <input type="submit" name="submit" class="button_vx" value="<?php echo $L['f_log_in']; ?>"/></form>
        <div class="reg_osx">
            <a rel="nofollow" href="member.php?act=register"><?php echo $L['f_registration']; ?></a>
            <a style="float: right;" rel="nofollow"
               href="member.php?act=get_password"><?php echo $L['f_forgot_password']; ?></a>
        </div>
    </div>
    <span id="modal_close1">X</span></div>
<div id="overlay1"></div>
<div class="header_olin">
    <div class="polosa">
        <div class='header_block'>
            <div id='nav_1'>
                <nav>
                    <ul style='margin:0px'>
                        <li class="after_bo"><a href="../index.php"><i class="icon-home"></i>Главная
                                <div class="after">
                                </div>
                            </a></li>
                        <li class="after_bo"><a href="allcat.php"><i class="icon-tags"></i> Каталог</a></li>
                        <li class="after_bo"><a href="../com.php?act=view-all"><i class="icon-group"></i>Компании
                                <div class="after"></div>
                            </a></li>
                        <li class="after_bo"><a href="../article.php"><i class="icon-rss"></i>Новости
                                <div class="after"></div>
                            </a></li>
                        <li class="after_bo"><a href="../info_f.php"><i class="icon-asterisk"></i>Барахолка
                                <div class="after"></div>
                            </a></li>
                    </ul>
                </nav>
            </div>
            <?php if ($_userid) { ?><a style="display:none;" rel="nofollow" href="mymessages.php">
                <div class="maser"><img alt="Сообщения"
                                        src="../images/mli.png"><?php if ($col > 0) { ?>(+<?php echo $col; ?>)<?php } ?><?php if ($col == 0) { ?>(<?php echo $col; ?>)<?php } ?>
                </div></a><?php } ?>
        </div>
    </div>
    <div class='header_middle'>
        <div class='header_block'>
            <div id="search_b">
                <div class="search_nav">
                    <div id="product" class="search_tabs selected_tabs">Товары</div>
                    <div id="comt" class="search_tabs">Компании</div>
                    <div id="freet" class="search_tabs">Барахолка</div>
                </div>
                <div id="search_block"></div>
            </div>
            <form name="search" class="head_search" action="do_search.php" method="get">
                <div class="custom-selectbox dark-color light-gradient active-hover"
                     style="    display: none;position: absolute;float: right;right: 55px;margin-top: 1px;border-radius: 1px;">
                    <select size="1" name="base">
                        <option selected value="2">Искать в товарах</option>
                        <option value="1">Искать в компаниях</option>
                        <option value="3">Искать в барахолке</option>
                    </select>
                </div>
                <i style='    color: #fdfdfd;font-size: 15px;position: absolute;padding: 8px 0px 0px 16px;'
                   class="icon-search"></i>
                <input name="keywords" id="keywords" type="text" class="text-input1  dark-color light-bg"
                       placeholder="Введите запрос для поиска">
            </form>
            <div class="loti">
                <a href="index.php">
                    <div class="home_button"></div>
                    <span>Vseti - Goroda.ru</span>
                </a></div>
            <?php if ($_userid) { ?>
                <div class="top-menu-left">
                    <ul><a rel="nofollow" href="member.php" class="dark-color">
                            <li class="but_left"><img
                                        style="    width: 16px;float: left;    margin: 1px 10px 0px 0px;display: none;"
                                        src="../images/brg.png"> <?php echo cut_str($_username, 12, '...'); ?></li>
                        </a>
                        <a rel="nofollow" href="member.php?act=logout&mid=<?php echo $_userid; ?>" class="dark-color">
                            <li class="but_right"><i class="icon-signout"></i>
                                <?php echo $L['f_logout']; ?></li>
                        </a></ul>
                </div>
            <?php } else { ?>
            <?php } ?>
            <?php if (!$_userid) { ?>
                <div class="top-menu-left">
                <ul><a rel="nofollow" href="#" id="log" class="dark-color">
                        <li class="but_right"><i class="icon-signin icon_h"></i>
                            <?php echo $L['f_login_to']; ?></li>
                    </a> <a rel="nofollow" href="member.php?act=register" class="dark-color">
                        <li class="but_left"><?php echo $L['f_registration']; ?></li>
                    </a>
                </ul></div><?php } ?>
        </div>
    </div>
</div>
<script Language='JavaScript'>
    var width = screen.width;
    var height = screen.height;
    document.cookie = "width=" + width;
</script>
