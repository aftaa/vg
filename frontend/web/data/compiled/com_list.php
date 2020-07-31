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
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/responsive.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/font-awesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/colors/red.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/base_v_4.css" type="text/css">
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/menu_v_2.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/osx1.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/com_list_v_3.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/bootstrap1_v_2.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/head3.css" type="text/css">
<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery-latest.js"></script>
<script type="text/javascript">
$(document).ready(function(){$('#region').click(function(){$('body').css('overflow','auto');$('#overlay2').css('display','block').animate({opacity:0.65,},300);$('#modal_form2').css('display','block');$('#modal_form2').animate({opacity:1,},750)});$('#modal_close2, #overlay2').click(function(){$('body').css('overflow','auto');$('#modal_form2').css('display','none');$('#modal_form2').animate({opacity:0,},300);$('#overlay2').animate({opacity:0,},300).css('display','none')})});
</script>  
</head>
<body class="body-background2 content-font">

<?php include template(top); ?>

<div id="modal_form2"> <div id="cont_a"><?php echo $area_spis;?><div class="poi_rerion"></div>
<span id="modal_close2">X</span>
</div></div>
<div id="overlay2"></div>
<section class="page-content" style='  min-height: 420px;'>
<div class="page-block page-block-top cream-bg grid-container" style='    margin-top:0px;padding-top: 0px;position: initial;'>
<div class="block_ful">
 <div class="com_nav_viv"><?php echo $catq;?></div>
<ul id="list-links" style='margin-top:-6px;width: 200px;'><div class="navbar" style=''>
<div class="navbar-inner1">
<div class="container">
<div class="nav-collapse collapse">
<ul class="nav1">
<li class="active">
<a rel="nofollow"  class="dropdown-toggle1" data-toggle="dropdown1" href="#" >Изменить категорию<i class="icon-reorder"></i></a>
<ul class="dropdown-menu1" role="menu1">
<?php if(is_array($all_cat)) foreach($all_cat AS $cat) { ?><li data-submenu-id="<?php echo $cat['catid'];?>">
<a rel="nofollow" href="#"><?php echo $cat['catname'];?></a>
<div id="<?php echo $cat['catid'];?>t" class="popover1">
<h3 class="popover-title1"><?php echo $cat['catname'];?></h3>
<?php if(is_array($all_podcat)) foreach($all_podcat AS $id_cat) { ?> <?php if($id_cat[parentid]==$cat[catid]) { ?> <div class="popover-content1">  <ul class="drop_ul">
<li style="margin-top:0px"><a rel="nofollow" href="com.php?id=<?php echo $id_cat['catid'];?>" class="parent"><span class='ddmp1'><?php echo $id_cat['catname'];?></span></a>
</li></ul></div><?php } ?>
<?php } ?>
</div></li>
<?php } ?>

</ul></li></ul></div></div></div></ul>    
<a rel="nofollow" class="all_city " href="#" id="region">все города<i class="icon-th-large"></i></a>
<div class="obl_block">
<?php if(is_array($areapop)) foreach($areapop AS $val) { ?>
<div class='reg_obl'><div class="company_imput "></div><a rel="nofollow" href="com.php?id=<?php echo $_GET['id'];?>&area=<?php echo $val['areaid'];?>"><?php echo $val['areaname'];?></a></div>

<?php } ?>
</div>
<div class="company_kolik "><?php echo $pager['count'];?> компаний </div>
</div>
<div class="com_list">
<div class="com_nav">
</div>
<?php if($area>0 && $comval1==false) { ?><div class="nout">В данном регионе нет компании</div><?php } ?>
<?php if($all_podcat==true && $comval1==false) { ?><div class="nout">В данной категории нет компаний</div><?php } ?>
<?php if(is_array($comval1)) foreach($comval1 AS $val) { ?>
<div class=" com_list_items hover_ti ">
 <div class="list_items">
<?php if($val[thumb]) { ?>
<div class="list_items_imko">
<img class="lazy regular" src="images/smen_pol.gif" data-original="<?php echo $val['thumb'];?>"  alt="<?php echo $val['comname'];?>" />  </div>
<?php } else { ?><div class="list_items_imko">
<img class="lazy regular" src="images/smen_pol.gif" data-original="images/ico/no_images.png"  alt="<?php echo $val['comname'];?>" /></div>
<?php } ?></div>   
<h3 class="list_items_name">
<a href="com_str.php?catnki=<?php echo $catn;?>&id=<?php echo $val['comid'];?>">
<strong><?php echo cut_str($val[comname], 60, '..');?></strong>
</a></h3>
<div class="reit_num"><i class="icon-star"></i><?php if($val[reit]>0) { ?><?php echo $val['reit'];?><?php } else { ?>-<?php } ?></div>
<div class="com_list_info" ><?php echo cut_str($val[description], 135, '..');?>
</div>
<?php if($val[address]) { ?>
<div class="com_list_adress1">
<i class="icon-map-marker"></i>
<?php echo cut_str($val[address], 60, '..');?>
</div><?php } ?></div>
<?php } ?>
 
<div class="grid-100">
<div class="pagelink"><?php for ($j = 1; $j<$pages; $j++) {
if ($j>=$start && $j<=$end) {
if ($j==($page+1)) echo '<a id="' . $j . '" class="plink" href="com.php?act=list&id='.$_GET[id].'&page='.$j.'"><strong style="color: #72849c;font-weight: 600;font-size: 19px;">' . $j . '</strong></a> &nbsp; ';
else echo '<a id="' . $j . '" class="plink" href="com.php?act=list&id='.$_GET[id].'&page='.$j.'">' . $j . '</a> &nbsp; ';}} ?>
</div>
</div></div>
<script type="text/javascript" src="js/jquery.lazyload.min.js"></script> 
<script type="text/javascript">
$("img.lazy").lazyload({threshold: 10, effect: "fadeIn"});
</script>
<div class="block_f">
<div class="com_sort1"><a href="com_str.php?id=<?php echo $mecca['comid'];?>">
<div class="baner_img"><div class="baner_bl_img">  
<img src="<?php echo $mecca['thumb'];?>"></div></div>
<div class="baner_title "><?php echo $mecca['comname'];?></div>
<div class="baner_des"><?php echo $mecca['description'];?></div></a>
</div>
<div class="new_company" style="    margin-top: 10px;"><div class="new_company_kop ">Топ 5</div>
<?php if(is_array($company1)) foreach($company1 AS $val) { ?>
<div class="com_card_name_popular">
<div class="com_card_name_img"><?php if($val[thumb]) { ?><div class="com_card_name_img_molki"><img src="<?php echo $val['thumb'];?>"></div><?php } else { ?><img src="images/ico/no_images.png"><?php } ?></div>
<div class="com_card_name_p" >
<a href="com_str.php?id=<?php echo $val['comid'];?>">
<strong ><?php echo $val['comname'];?></strong>
</a></div>
<div class="com_card_name_pok"><?php echo cut_str($val[description], 100, '..');?></div>
<div class="com_card_info">
<i title="<?php echo $L['d_added'];?>" class="icon-time"></i><?echo date( ' d.m.y', $val['postdate'] );?>&nbsp;  &nbsp;
<i title="<?php echo $L['viewed'];?>" class="icon-eye-open"></i> <?php echo $val['click'];?>
</div></div>
<?php } ?>
</div></div></div>
<div id= "toTop" > ^ Наверх </div></section>
<script type='text/javascript' src='js/jquery.js'></script>    
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type="text/javascript">
$(document).ready(function(){$('#region').click(function(){$.ajax({url:"area_spis.php?act=start_page&id=<?php echo $_GET['id'];?>&base=1",cache:false,beforeSend:function(){$('#cont_a').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF" ></>')},success:function(html){document.title="<?php echo $L['about'];?> - <?php echo $CFG['webname'];?>";$("#cont_a").html(html);$("#cont_a")}});return false})});
</script>

<?php include template(footer); ?>

         <script type="text/javascript">
$(function() {
$(window).scroll(function() {
if($(this).scrollTop() != 0) {
$('#toTop').fadeIn();
}else{
$('#toTop').fadeOut();
}});
$('#toTop').click(function() {
$('body,html').animate({scrollTop:0},800);
});});
</script>
<script type="text/javascript">
var ip = '<?=$ip;?>';
</script>
<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery.menu-aim.js"></script>
<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/bootstrap1.js"></script>
<?php if($_GET[id]) { ?>
<script type="text/javascript">var $menu1=$(".dropdown-menu1");$('.nav1').click(function(){$('#overlay2').css('display','block');$('#overlay2').animate({opacity:0.45,},300)});$menu1.menuAim({activate:activateSubmenu,deactivate:deactivateSubmenu});function activateSubmenu(row){var $row=$(row),submenuId=$row.data("submenuId"),$submenu=$("#"+submenuId+'t'),height=$menu1.outerHeight(),width=$menu1.outerWidth();$submenu.css({display:"block",top:0,left:width,height:'auto'-4,'width':700,'min-height':180,});$row.find("a").addClass("maintainHover")}function deactivateSubmenu(row){var $row=$(row),submenuId=$row.data("submenuId"),$submenu=$("#"+submenuId+'t');$submenu.css("display","none");$row.find("a").removeClass("maintainHover")}$(".dropdown-menu1 li").click(function(e){e.stopPropagation()});$('#overlay2').click(function(){$(".popover1").css("display","none");$("a.maintainHover").removeClass("maintainHover");$('#overlay2').css('display','none');$('#overlay2').animate({opacity:0.65,},300)});
</script><?php } ?>