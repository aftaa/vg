<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><!DOCTYPE html>
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="ru"> <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title><?php echo $seo['title'];?></title>
<meta name="viewport" content="width=device-width,initial-scale=0.4,minimum-scale=0.3,maximum-scale=0.8">
<meta name="description" content="<?php echo $seo['description'];?>">
<meta name="keywords" content="<?php echo $seo['keywords'];?>">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/unsemantic_v_2.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/font-awesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/colors/red.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/base_v_4.css" type="text/css">
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/osx1.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/com_list_v_3.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/head3.css" type="text/css">
<link rel="stylesheet" href="templates/default/style/webhostinghub/css/whhg.css" type="text/css">

<style type="text/css">#id_1 {opacity: 1;display: block;}.com_cat_card {opacity: 0;display: none;}.com_cat {min-height: 368px;position: relative;}</style>    
</head>
<body class="body-background2 content-font dark-color">

<?php include template(top); ?>

<section class="page-content">
<div class="page-block page-block-top cream-bg grid-container" style='    margin-top:0px;padding-top: 0px;position: initial;'>
<?php if($_GET[id]==false) { ?> 
<?php if($_GET[ki]==false) { ?>
<div class="com_cat_nav">
<div class="com_cat_left">
<?php if(is_array($all_cat)) foreach($all_cat AS $cat) { ?> 
<div class='cat_card_title_tuo '><div id="" class='cat_card_title '><i class="<?php echo $cat['catimg'];?>"></i><?php echo $cat['catname'];?></div></div>
<?php } ?>
</div>
<div class="cat_sel1"></div>
<div class="com_cat"><?php if(is_array($all_cat)) foreach($all_cat AS $cat) { ?> 
<div class='com_cat_card' >
<div id="id<?php echo $cat['catid'];?>"  class="mik" style="overflow:hidden"> 
<?php if(is_array($all_podcat)) foreach($all_podcat AS $id_cat) { ?> <?php if($id_cat[parentid]==$cat[catid]) { ?> 
<div class="podcat_punkt"> 
<a href="com.php?act=list&id=<?php echo $id_cat['catid'];?>" ><?php echo $id_cat['catname'];?>
<div class="soli"><?php echo $id_cat['count_c'];?></div></a></div><?php } ?>
<?php } ?>

</div>
<div class="cat_card_new">новые компании раздела</div>
<div class="vse">
<?php if(is_array($all_podcat)) foreach($all_podcat AS $id_cat) { ?> <?php if($id_cat[parentid]==$cat[catid]) { ?> <?php if(is_array($wwq)) foreach($wwq AS $ssa) { ?> <?php if($id_cat[catid]==$ssa[catid]) { ?> 
<div class="cat_card_new_blok hover_t"> <a rel="nofollow" href="com_str.php?id=<?php echo $ssa['comid'];?>">
<div class="cat_card_bdop"><div class="cat_card_new_img" ><?php if($ssa[thumb]) { ?><img class="lazy regular" src="images/smen_pol.gif" data-original="<?php echo $ssa['thumb'];?>"  alt="<?php echo $ssa['comname'];?>" ><?php } else { ?><img class="lazy regular" src="images/smen_pol.gif" data-original="images/ico/no_images.png"  alt="<?php echo $ssa['comname'];?>" ><?php } ?></div></div>
<div class="cat_card_new_title active-hover"><?php echo cut_str($ssa['comname'], 50, '..');?></div>
<div class="cat_card_new_tekst"><?php echo cut_str($ssa['description'], 65, '..');?></div>
</a></div><?php } ?>
<?php } ?>
<?php } ?>
<?php } ?>
</div>
</div> <div style="clear:both;"></div>
<?php } ?>
<div style="clear:both;"></div>
</div><?php } ?><?php } ?></div></section>

<?php include template(footer); ?>

<script type='text/javascript' src='js/jquery.js'></script>    
<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery-latest.js"></script>
<script type="text/javascript"> 
function diplay_hide(blockId){if($(blockId).css('height')=='210px'){$(blockId).animate({height:1128,},750)}else{$(blockId).animate({height:210,},750)}};
</script> 
<script type="text/javascript">
$(document).ready(function(){var i=1;$('.cat_card_title').each(function(){var card=$(this).attr('id','id_'+i);i++});var s=1;$('.com_cat_card').each(function(){var inf=$(this).attr('id','id_'+s);s++})});
</script>
<script type="text/javascript">
$(document).ready(function(){var h=$('.com_cat_card').outerHeight()+17;var htmlStr=$(".cat_card_title#"+'id_1').html();$("div.cat_sel1").html(htmlStr);$('.com_cat').animate({'height':h});$('.cat_card_title').on('click',function(){$('.com_cat_card').animate({'opacity':'0'},150);$('.com_cat_card').css({'display':'none'});var id=$(this).attr("id");var id_inf=$('.com_cat_card#'+id);var h=$(id_inf).outerHeight();var htmlStr=$(".cat_card_title#"+id).html();$("div.cat_sel1").html(htmlStr);$('.com_cat').animate({'height':h});$(id_inf).animate({'opacity':'1'},750);$(id_inf).css({'display':'block'})});return false});
</script>
<script type="text/javascript" src="js/jquery.lazyload.min.js"></script> 
<script type="text/javascript">
$("img.lazy").lazyload({threshold: 10, effect: "fadeIn"});
</script>
<script type="text/javascript">
var ip = '<?=$ip;?>';
</script>