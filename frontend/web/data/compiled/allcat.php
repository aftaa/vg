<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><!DOCTYPE html>
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="ru"> <!--<![endif]-->
    <head>
<meta charset="<?php echo $charset;?>">
<title><?php echo $seo['title'];?></title>
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
<meta name="description" content="<?php echo $seo['description'];?>">
<meta name="keywords" content="<?php echo $seo['keywords'];?>">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/unsemantic_v_2.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/responsive.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/font-awesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/head3.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/colors/red.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/base_v_4.css" type="text/css">
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/webhostinghub/css/whhg.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/osx1.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/category_v_2.css" type="text/css">
</head>
<body class="body-background2 content-font dark-color">

<?php include template(top); ?>

<section class="page-content">
<div class="juti_allcat">
<div class="all_c">
<ul><?php if(is_array($cats_list)) foreach($cats_list AS $cat) { ?><li class="all_c_b">
<div class="all_c_v"><i class="<?php echo $cat['catimg'];?>"></i>
<h3 ><?php echo $cat['catname'];?></h3>

<?php if(is_array($cat[children])) foreach($cat[children] AS $i => $child) { ?><div > <ul>
<li class="c_p"><a href="<?php echo $child['url'];?>" ><span ><?php echo $child['name'];?></span></a>
</li></ul></div>
<?php } ?>
</div>
</li>
<?php } ?>
</ul><div class="clear"></div>
</div>
<div class="sogl">
<span>Размещаться в каталоге vseti-goroda это удобно и выгодно</span>
<div class="so_but">Добавить компанию</div>
</div>
</div>
</section>
 
<?php include template(footer); ?>
