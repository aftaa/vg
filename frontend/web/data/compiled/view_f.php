<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><!DOCTYPE html>
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="ru"> <!--<![endif]-->
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title><?php echo $seo['title'];?></title>
<meta name="viewport" content="width=device-width,initial-scale=0.3,minimum-scale=0.3,maximum-scale=0.9">
<meta name="description" content="<?php echo $seo['description'];?>">
<meta name="keywords" content="<?php echo $seo['keywords'];?>">
<meta property="og:title" content="<?php echo $seo['title'];?>">
<meta property="og:description" content="<?php echo $seo['description'];?>">
<meta property="og:image" content="<?php echo $thumb;?>">
<meta property="og:url" content="http://vseti-goroda.ru/view_f.php?id=<?php echo $id;?>">
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/unsemantic.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/font-awesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/head3.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/base_v_4.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/global.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/osx1.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/barah_prod_v1.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/easyzoom.css" type="text/css">

</head>
<body class="body-background2 content-font dark-color" >

<?php include template(top); ?>

<section class="page-content " >
<div id="modal_message" style="display:none;    width: 560px;min-height: 170px;height: auto;"></div>
<div class="line_baxr">
    <div class="mop_desk"><div class="knop_sob"><i class="icon-share-alt"></i> </div><div class="social">
<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,gplus,twitter"></div>
</div></div>
    <a href="#" onclick="return swalAlert(this);"> <div class="emil_but"> Написать автору<i class="icon-pencil"></i></div></a>
<?php if($drugie) { ?><div class="vse_oby">Bсе объявления <?php echo $usern_f;?><i class="icon-th-large"></i></div><?php } ?>
</div>
<div class="block_another otherx" style="height:0px;display:none"><?php if(is_array($drugie)) foreach($drugie AS $jq) { ?>
<div class='product_another hover_t'>                           
<div class="product_another_img">                                 
<a class="" href="view_f.php?id=<?php echo $jq['id'];?>"><?php if($jq[thumb]) { ?>
<img src="<?php echo $jq['thumb'];?>" alt="<?php echo $jq['title'];?>"  />
<?php } else { ?><img src="images/ico/no_images.png" alt="<?php echo $jq['title'];?>" /><?php } ?>
</a></div>
<div class="product_another_desc">
<h3 >
<a href="view_f.php?id=<?php echo $jq['id'];?>">
<strong><?php echo cut_str($jq[title], 48, '...');?></strong>
</a></h3></div>
<div class="product_another_price">
<div class="product_another_price1"><?php if($jq[price]) { ?>
<strong><?php echo number_format($jq[price], 0, '.', ' ');?> <?php echo $jq['unit'];?><span>RUR</span>    </strong><?php } ?>
</div> </div></div>
<?php } ?>

<div class="hide" style="cursor: pointer;width: 99%;    color: #8C4F4F;text-align: right;float: left;font-weight: 600;font-size: 15px;margin-top: 10px;"> <div class="hide_push">Свернуть</div></div></div>
<div class="content_site" > 
<div id="view_left">
<div id="view_left_top"> 
<div id="products_example">
<div id="products" >
<div  class="slides_container">
<?php if($images) { ?><?php if(is_array($images)) foreach($images AS $val) { ?><div class='zoomx slid_zm '  >
<a itemprop="image" href="<?php echo $val['path'];?>" class="zoom<?php echo $val['imgid'];?> " style="display: table-cell;vertical-align:middle;    height: 334px;width: 442px;"><img  src="<?php echo $val['path'];?>"     alt="Нажмите для увеличения" data-thumb="<?php echo $val['path'];?>" /></a></div>
<?php } ?>
<?php } ?>

<?php if(!$images) { ?>
<div class='zoomx' style="width: 442px;height: 334px;background-color: #FFF;    display: table;vertical-align: middle;"  >
<a href="<?php echo $val['path'];?>" class="zoom<?php echo $val['imgid'];?> " style="display: table-cell;vertical-align:middle;"><img  src="images/ico/no_images.png"     alt="Нажмите для увеличения" data-thumb="<?php echo $val['path'];?>" /></a></div><?php } ?>
</div>
<ul class="pagination" style='width:450px;margin-top: 0px;margin-left: -26px;padding:0px'>
<?php if($images) { ?><?php if(is_array($images)) foreach($images AS $val) { ?>
<div class='pag_img'><li><a  href="#"><img src="<?php echo $val['path'];?>" alt="<?php echo $title;?>" data-type="thumbs"></a></li></div><?php } ?>
<?php } ?>

</ul></div></div>
</div><div style="clear: both;"></div></div>
<div id="view_right">
<div id="view_left_top_1"> 
<h1 itemprop="name"><?php echo $title;?></h1></div>
<div id="view_left_top_3">
<div class="cost_prod_inc "><?php echo $buysel;?></div> 
<strong><?php echo number_format($price, 0, '.', ' ');?></strong><span><?php echo $unit;?>RUR</span>
</div>
<div id="view_left_top_2"><span itemprop="description"><?php echo $description;?></span></div>
<div id="view_right_4" >
<?php if($CFG['visitor_view']==1 && !$_userid || $_userid) { ?>
<div class="dans" >
<div class="dans_ch"><i class="icon-map-marker"></i></div><h2 style="padding: 0px;text-transform: none;margin-bottom: 0px;"><?php echo $areaname;?></h2>
<span>Адрес : <?php if($address) { ?><?php echo $address;?><?php } else { ?><?php echo $L['unknown'];?><?php } ?></span>
</div>
<div class="dans" ><div class="dans_ch"><i class="icon-phone"></i></div><?php if($phone) { ?><strong><?php echo $phone;?></strong><?php } else { ?><strong ><?php echo $L['unknown'];?></strong><?php } ?>
</div> 
<div class="dans"><div class="dans_ch"><i class="icon-user"></i></div><?php if($linkman) { ?><strong ><?php echo $linkman;?></strong><?php } else { ?><strong ><?php echo $L['unknown_2'];?></strong><?php } ?>
</div> 
<div class="dans"><div class="dans_ch"><i class="icon-envelope-alt"></i></div><?php if($email) { ?><strong ><?php echo $email;?></strong><?php } else { ?><strong ><?php echo $L['unknown'];?></strong><?php } ?>
</div><?php } ?></div></div>
<div style="clear: both;"></div>
</div>
<div class="comments">

<?php include template(view_f_comets); ?>

</div>
</div>
<?php if($cusval) { ?>
<div class="blok_rashirinnoe">
<div class="block_rashirinnoe_title">Дополнительные характеристики</div>
<?php if(is_array($cusval)) foreach($cusval AS $val) { ?><div class="params"><span>
<?php echo $val['cusname'];?></span> <strong><?php echo $val['cusvalue'];?></strong>
</div>
<?php } ?>
</div><?php } ?>
<div style="clear: both;"></div>
</section>
<script src="templates/<?php echo $CFG['tplname'];?>/js/jquery-2.1.1.js"></script>
<script src="templates/<?php echo $CFG['tplname'];?>/js/main.js"></script> 
<script type='text/javascript' src='js/jquery.js'></script>
<script src="templates/<?php echo $CFG['tplname'];?>/js/modernizr1.js"></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type="text/javascript" language="javascript" src="js/behavior.js"></script>
<script type="text/javascript" language="javascript" src="js/common.js"></script>
<script src="templates/<?php echo $CFG['tplname'];?>/js/easyzoom.js"></script>
<script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
<script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
<script type="text/javascript">
$(document).ready(function(){$('.mop_desk').click(function(){$(".social").animate({opacity:1},1000)});$('body').click(function(e){var div=$(".mop_desk");if(!div.is(e.target)&&div.has(e.target).length===0){$(".social").animate({opacity:0},800)}})});
</script>
<?php if(is_array($images)) foreach($images AS $val) { ?>
<script type="text/javascript"> 
jQuery(function($){ $('a.zoom<?php echo $val['imgid'];?>').easyZoom();});
</script>

<?php } ?>

<script type="text/javascript">
$(document).ready(function(){var h3h=302,h4h,win_w,k,t;win_w=$(window).width();if(win_w<1024){k=5;t=9}else{k=6;t=10};var h2h=(($('.otherx>div').length));if(h2h<=k){h4h=h3h}else if(h2h<=t){h4h=h3h*2}else h4h=h3h*3;$('.vse_oby').click(function(){if($('.otherx').css('height')=='0px'){$('.vse_oby').toggleClass("active_userinfo");$('.otherx').toggleClass("block_userinfo");$('.otherx').animate({'height':h4h+40},750);$('.otherx').css({'display':'block'})}else{$('.vse_oby').removeClass("active_userinfo");$('.otherx').removeClass("block_userinfo");$('.otherx').animate({'height':'0px'},750);setTimeout(function(){$('.otherx').css({'display':'none'})},700)}});$('.hide').click(function(){$('.vse_oby').removeClass("active_userinfo");$('.otherx').removeClass("block_userinfo");$('.otherx').animate({'height':'0px'},750);setTimeout(function(){$('.otherx').css({'display':'none'})},700)})});
</script>
<script type="text/javascript">

var userid="<?php echo "$_userid"; ?>";$(document).ready(function(){$('.emil_but').click(function(){if(userid!=0){$.ajax({url:"/messages.php?id=free&infoid=<?php echo $_GET['id'];?>",cache:false,beforeSend:function(){$('#modal_message').html('<img class="loading"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>')},success:function(html){$("#modal_message").html(html)}})}else{
   
        swal({
            title: "Вы не авторизованы", // Заголовок окна
            text: "Для отправки сообщения авторизуйтесь или зарегистрируйтесь", // Текст в окне
            type: "warning", // Тип окна
            confirmButtonText: "Авторизация",
            cancelButtonText: "Отмена",
            showCancelButton: true, // Показывать кнопку отмены
            closeOnConfirm: false // Не закрывать диалог после нажатия кнопки подтверждения
        },
        function() { // Выполнить действие при нажатии на кнопку подтверждения
            window.location.href = "member.php?act=login";
        }
        );
        
    return false}$('#overlay1').css('display','block').animate({opacity:0.65,},300);$('#modal_message').css('display','block');$('#modal_message').animate({opacity:1,},750)});$('#overlay1').click(function(){$('#modal_message').css('display','none');$('#modal_message').animate({opacity:0,},300);$('#overlay1').animate({opacity:0,},300).css('display','none')})});
</script>
<style type="text/css">
#modal_message{
z-index:150;position: absolute; margin-left: 20%;background: #fff;}
</style>
<style>
.active_userinfo {
background-color: #FBFBFB;color: #949494;transition: color 0ms ease-in-out 0s, background-color 300ms ease-in-out 0s;}
#easy_zoom{
width:70%;height:auto;z-index: 1200;background:#fff;color:#333;position:fixed;top:75px;left:100px;display: table-cell;vertical-align: middle;overflow:hidden;-moz-box-shadow:0 0 10px #777;-webkit-box-shadow:0 0 10px #777;box-shadow:0 0 10px #777;line-height:400px;text-align:center;}
</style>

<?php include template(footer); ?>

<script src="templates/<?php echo $CFG['tplname'];?>/js/jquery-1.4.4.min.js"></script>
<script src="templates/<?php echo $CFG['tplname'];?>/js/slides.min.jquery.js"></script>
<script>
$(function(){$('#products').slides({preload:true,preloadImage:'img/loading.gif',effect:'slide, fade',crossfade:true,slideSpeed:200,fadeSpeed:500,generateNextPrev:true,generatePagination:false})});
</script>




