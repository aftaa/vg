<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><!DOCTYPE html>
<!--[if IE 8 ]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->
<head>
    <meta charset="<?php echo $charset;?>">
    <title>vseti-goroda-Контакты</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
    <meta name="description" content="<?php echo $seo['description'];?>">
    <meta name="keywords" content="<?php echo $seo['keywords'];?>">
    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/unsemantic_v_2.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/base_v_4.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/head3.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/login.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/osx1.css" type="text/css">
    <link rel="stylesheet" href="templates/default/style/users.css" type="text/css">
    <script type='text/javascript' src='js/jquery.js'></script>
    <script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery-latest.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="body-background2 content-font dark-color">

<?php include template(top); ?>

<section class="page-content">
    <div class="page-block page-block-bottom cream-bg grid-container">
        <div class="line_razriv"></div>
        <div class="juti_compani">
            <div class=" grid-25 cream-gradient transition-all" id="sidebar-mobile"
                 style='padding-top: 15px;margin-left: 15px;width: 24%;background-color: #F9F9F9;margin-top: 70px;'>
                <div style="width:100%;height:auto">
                </div>
                <div class="sidebar-box sidebar-top cream-gradient">
                    <nav class="submenu">
                        <ul class="expandable-menu">
                            <?php if(!empty($CFG['mailspam'])) { ?>
                            <li>
                                <a class="dark-color active-hover" style='    font-size: 15px;
    font-weight: 500;
    text-transform: uppercase;'><span title="E-mail"><?php echo $CFG['mailspam'];?></span></a>
                            </li>
                            <?php } ?>
                            <li class="sidebar-divider"></li>
                            <?php if(!empty($CFG['icq'])) { ?>
                            <li>
                                <a class="dark-color active-hover">ICQ&nbsp;&nbsp;<span title="ICQ"><?php echo $CFG['icq'];?></span></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="content-with-sidebar grid-75" style="margin-top: 32px;width: 72%;
    margin-left: 6px;
    float: left;">
                <form class="content-form margin-bottom" action="cont.php?act=cont" name="cont" method="POST"
                      autocomplete="off" onsubmit="return check_submit();">
                    <div class="content-page grid-100">
                        <h2 class="bigger-header with-border subheader-font" style="       width: 60%;
    border-bottom: none;
    font-size: 19px;
    color: #51403e;
    font-weight: 500;">Связь с администрацией</h2>
                        <div class="tui_input" style="    height: 42px; margin-bottom: 0px;">
                            <label for="title"><?php echo $L['theme'];?> <span class="active-color">*</span></label>
                            <input type="text" class="custom_input1" name="title" id="title"/>
                        </div>
                        <div class="tui_input">
                            <label for="content" class="middle-color"><?php echo $L['f_message'];?> <span
                                    class="active-color">*</span></label>
                            <textarea class="textarea-input custom_input1" name="content" id="content"
                                      placeholder="<?php echo $L['f_message_content'];?>" style="    min-height: 100px;"></textarea>
                        </div>
                        <div class="tui_input">
                            <label for="surname" class="middle-color"><?php echo $L['your_name'];?> <span
                                    class="active-color">*</span></label>
                            <input type="text" class="custom_input1" name="surname" id="surname"
                                   placeholder="<?php echo $L['your_name'];?>" value="<?php echo $membersurname;?>"/>
                        </div>
                        <div class="tui_input">
                            <label for="membermail">E-mail <span class="active-color">*</span></label>
                            <input type="text" class="custom_input1" name="membermail" id="membermail"
                                   value="<?php echo $membermail;?>"/>
                        </div>
                    </div>

                    <div style="margin: 1em 0 0 278px;">
                        <!--<div class="g-recaptcha" data-sitekey="6LeD4lwUAAAAAAb203vlmgE-dCdQyxrYQLUZgGOO"></div>-->
                        <?= $recaptcha->display() ?>
                    </div>


                    <div class="summi">
                        <input type="submit" class="button_nulik" name="submit" value="<?php echo $L['send'];?>"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function check_submit() {
        if (document.cont.title.value == "") {
            alert('{$L['
            enter_theme
            ']}'
        )
            ;
            document.cont.title.focus();
            return false;
        }
        if (document.cont.content.value == "") {
            alert('{$L['
            enter_content_message
            ']}'
        )
            ;
            document.cont.content.focus();
            return false;
        }
        if (document.cont.surname.value == "") {
            alert('{$L['
            enter_your_name
            ']}'
        )
            ;
            document.cont.surname.focus();
            return false;
        }
        if (document.cont.membermail.value == "") {
            alert('{$L['
            email_empty
            ']}'
        )
            ;
            document.cont.membermail.focus();
            return false;
        }
    }
</script>

<?php include template(footer); ?>
