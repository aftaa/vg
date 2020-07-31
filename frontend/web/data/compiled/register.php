<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><!DOCTYPE html>
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="ru"> <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title><?php echo $seo['title'];?></title>
<meta name="viewport" content="width=device-width,initial-scale=0.45,minimum-scale=0.45,maximum-scale=0.7">
<meta name="description" content="<?php echo $seo['description'];?>">
<meta name="keywords" content="<?php echo $seo['keywords'];?>">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/unsemantic_v_2.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/responsive.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/font-awesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/colors/red.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/base_v_4.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/head3.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/pages/post.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/registration_v_1.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/osx1.css" type="text/css">
<script type='text/javascript' src='js/jquery.js'></script>
<link rel="shortcut icon" href="favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="images/ico/apple-touch-icon-precomposed.png">
<script src="js/jquery.js"></script> 
</head>
<body class="body-background2 content-font dark-color">

<?php include template(top); ?>

<section class="page-content">
<div class="juti_compani"> 
<div class="grid-100" style="float:left"> 
<form class="content-form form_reg" name="post" action="member.php" method="post" autocomplete="off"  enctype="multipart/form-data" onsubmit="return checkcomment();">
<input type="hidden" name="act" value="act_register">
<input type="hidden" name="submit" value="1">
<div class="f_input">
<div class="forms"> <?php echo $L['f_login'];?></div>
<input type="text" class="forms_inp" placeholder="LOGIN" name="username_r" id="username_r"/>
<span class="tips" id="tip_span_username"></span></div>
<div class="f_input">
<div class="forms"> <?php echo $L['f_password'];?></div>
<input type="password" class="forms_inp" placeholder="PASSWORD" name="password_r" id="password_r"/>
<span class="tips" id="tip_span_password"></span></div>
<div class="f_input">
<div class="forms"> <?php echo $L['f_repassword'];?></div>
<input type="password" class="forms_inp" placeholder="CONFIRM PASSWORD" name="repassword" id="repassword"/>
<span class="tips" id="tip_span_repassword"></span></div>
<div class="f_input">
<div class="forms"> E-mail</div>
<input type="text" class="forms_inp" name="email" id="email" placeholder="E-mail"/>
<span class="tips" id="tip_span_email"></span></div>
<div class="f_input">
<div class="forms"> <?php echo $L['code'];?></div>
<input name="checkcode"  type="text" id="checkcode" class="forms_inp" style="width:100px" maxlength="5"  onfocus='get_code();this.onfocus=null;' />
<span id="imgid"></span></div>             
<div class="topmargin5"></div>
<div class="lic ">
Нажав кнопку Регистрация я подтверждаю, что :<br>
Я прочитал(а) принял(а) <a href="license.php?act=publik" style="text-decoration: underline;color: #4D749C;">Публичный договор</a>,<a href="license.php?act=confed" style="text-decoration: underline;color: #4D749C;">Уведомления о защите конфеденциальности</a> и <a href="license.php?act=user_confirm" style="text-decoration: underline;color: #4D749C;">условия Пользовательского соглашения</a><br> 
Я могу получать информацию от VSETI-GORODA и изменять настройки уведомлений от VSETI-GORODA<br>
Мне исполнилось 18 лет.
<button type="submit" class="button_regisrat" >Регистрация</button>
</div>
</form> <div class="notice_block">
После регистрации вы сможете <br>
редактировать учётную запись и изменить тип аккаунта.<br><br>
Регистрация бесплатная.<br>
Оплата производится по выбранному Вами тарифу из представленных на сайте пакетов услуг.<br><br>
Размещение товаров в доске объявлений (Барахолке), бесплатно.</div></div></div>
</section>

<?php include template(footer); ?>

<script type="text/javascript">jQuery.noConflict();</script>
<script type="text/javascript">
function checkcomment()
{if(document.post.checkcode.value==""){
alert('Вы не ввели проверочный код');
document.post.checkcode.focus();
return false;}}
</script> 
<script type="text/javascript" src="js/valid/validator.full.js"></script>
<link href="js/valid/validator.css" type="text/css" rel="stylesheet" />
<script type="text/javascript">
$.validator("username_r")
.setTipSpanId("tip_span_username")
.setFocusMsg("<?php echo $L['f_limit_3_16_characters'];?>")
.setRequired("<?php echo $L['f_are_mandatory'];?>")
.setServerCharset("UTF-8")
.setStrlenType("byte")
.setMinLength(3, "<?php echo $L['f_min_3_characters'];?>")
.setMaxLength(16, "<?php echo $L['f_max_16_characters'];?>")
.setAjax("member.php?act=ajax&type=username", "<?php echo $L['f_username_already_taken'];?>")
.setCallback(function(str){ return /^[\w|\u4E00-\u9FA5]*$/.test(str); }, "<?php echo $L['f_only_latin_letters_numbers'];?>")
.setCallback(function(str){ return ! /^\d{11}$/.test(str); }, "<?php echo $L['f_not_consist_only_11_digits'];?>");
$.validator("password_r")
.setTipSpanId("tip_span_password")
.setFocusMsg("<?php echo $L['f_limit_6_12_characters'];?>")
.setRequired("<?php echo $L['f_are_mandatory'];?>")
.setRegexp(/^\w+$/, "<?php echo $L['f_only_latin_letters_numbers'];?>", false)
.setServerCharset("UTF-8")
.setStrlenType("symbol")
.setMinLength(6, "<?php echo $L['f_min_6_characters'];?>")
.setMaxLength(12, "<?php echo $L['f_max_12_characters'];?>")
.setCallback(is_complex_password, "<?php echo $L['f_simple_password'];?>")
$.validator("repassword")
.setTipSpanId("tip_span_repassword")
.setFocusMsg("<?php echo $L['f_repassword_go'];?>")
.setRequired("<?php echo $L['f_are_mandatory'];?>")
.setRegexp(/^\w+$/, "<?php echo $L['f_only_latin_letters_numbers'];?>", false)
.setServerCharset("UTF-8")
.setStrlenType("symbol")
.setMinLength(6, "<?php echo $L['f_min_6_characters'];?>")
.setMaxLength(12, "<?php echo $L['f_max_12_characters'];?>")
$.validator("email")
.setTipSpanId("tip_span_email")
.setFocusMsg("<?php echo $L['f_enter_real_email'];?>")
.setRequired("<?php echo $L['f_are_mandatory'];?>")
.setServerCharset("UTF-8")
.setStrlenType("symbol")
.setMaxLength(50, "<?php echo $L['f_max_50_characters'];?>")
.setRegexp(/^\w+((-|\.)\w+)*@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/, "<?php echo $L['f_invalid_email'];?>", false)
.setAjax("member.php?act=ajax&type=email", "<?php echo $L['f_email_already_use'];?>");
</script>