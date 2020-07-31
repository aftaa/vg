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
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/font-awesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/base_v_4.css" type="text/css">
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/osx1.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/category_v_2.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/head3.css" type="text/css">
</head>
<body class="body-background2 content-font dark-color">

<?php include template(top); ?>

<section class="page-content" style="    min-height: 420px;">
<div class="page-block page-block-top cream-bg grid-container" style='padding-bottom:0px'>
<div class="sel_cat2"><h1><?php echo $cat_p;?></h1></div>
<?php if($_GET[id]) { ?><div class="div_cat"><div class="div_cat_sl">
<?php if(is_array($g)) foreach($g AS $k) { ?><span><a href="category.php?ki=<?php echo $k['catid'];?>" title="<?php echo $k['catname'];?>"><?php echo $k['catname'];?><div class="soli"><?php echo $k['count'];?></div></a></span>
<?php } ?>

<?php } ?></div>
<?php if($info_click!==false) { ?> 
<div class="polka"><div class="pop_raz">Популярные товары раздела</div> </div>                       
<div class="top_blik"> 
<?php if(is_array($info_click)) foreach($info_click AS $val) { ?>
<div class="top_blik_blok hover_t ">                 
<div class="product_top_img1">
<?php if($val[id]) { ?><a href="view.php?id=<?php echo $val['id'];?>&us=<?php echo $val['userid'];?>">
<?php } else { ?>
<?php } ?>
<?php if($val[thumb]) { ?>
<img src="<?php echo $val['thumb'];?>" alt="<?php echo $val['title'];?>"  />
<?php } else { ?>
<img src="images/ico/no_images.png" alt="<?php echo $val['title'];?>" />
<?php } ?>
</a></div>                          
<div class="product_populi_desc">
<a href="view.php?id=<?php echo $val['infoid'];?>&us=<?php echo $val['userid'];?>">
<strong style="text-align:left;margin-left:0px"><?php echo cut_str($val[title], 65, '...');?></strong>
</a></div>                             
<div class="product_top_p_price ">
<?php if($val[price]) { ?>
<strong><?php echo number_format($val[price], 0, '.', ' ');?> <?php echo $val['unit'];?><?php if(!$val[unit]) { ?><span>RUR</span><?php } ?>   </strong><?php } ?>
</div>   
<div class="clear"></div>
</div>
<?php } ?>
 <div class="clear"></div>
</div><?php } ?></div></div></section>
 
<?php include template(footer); ?>
