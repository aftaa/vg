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
<!-- Fav and touch icons -->
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/head3.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/unsemantic_v_2.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/font-awesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/colors/red.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/base_v_4.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/osx1.css" type="text/css">
</head>
<body class="body-background2 content-font dark-color">

<?php include template(top); ?>

<section class="page-content" style="min-height:410px">
<div class="page-block page-block-top light-bg grid-container">
</div>
<div class="page-block page-block-bottom cream-bg grid-container">
<div class="well-shadow well-box cream-bg" style="margin-top: 60px;    background: #fff;    padding: 46px 20px;">
 404 - <?php echo $L['page_not_found'];?><br/>
<span class="f_b f_red px18"><?php echo $L['page_not_found'];?>.</span>
<br/>
<span class="f_gray px16"><?php echo $L['page_not_found_tip'];?> <a href="<?php echo $CFG['weburl'];?>" class="dark-color active-hover" style="text-decoration:underline"><?php echo $L['main_page'];?></a></span>
</div></div></section>

<?php include template(footer); ?>
