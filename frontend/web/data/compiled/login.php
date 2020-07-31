<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><!DOCTYPE html>
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="<?php echo $charset;?>">
<title><?php echo $seo['title'];?></title>
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
<meta name="description" content="<?php echo $seo['description'];?>">
<meta name="keywords" content="<?php echo $seo['keywords'];?>">
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/unsemantic_v_2.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/responsive.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/font-awesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/colors/red.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/base_v_4.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/head3.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/osx1.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/users.css" type="text/css">
</head>
<body class="body-background2 content-font dark-color">

<?php include template(top); ?>

<section class="page-content">
<div class="block_olllo"> 

<?php include template(member_left); ?>

<div class="block_oli">
<form class="content-form margin-bottom" name="form1" method="post" action="member.php?act=act_login" autocomplete="off">
<h2 class="zagalovok">Вход</h2>
<div class="tui_input">
<label for="username" ><span>*</span> <?php echo $L['f_login'];?></label>
<input type="text" class="custom_input1" placeholder="<?php echo $L['f_login'];?>" name="username" id="username" />
</div>
<div class="tui_input">
<label for="password" ><span>*</span> <?php echo $L['f_password'];?></label>
<input type="password" class="custom_input1" placeholder="<?php echo $L['f_password'];?>" name="password" id="password" />
</div>
<div class="summi">
<input type="submit" id="submit" name="submit" class="button_nulik"  value="<?php echo $L['f_log_in'];?>" />
</div> </form></div></div>
</section>

<?php include template(footer); ?>
