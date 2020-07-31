<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><!DOCTYPE html>
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="ru"> <!--<![endif]-->
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title><?php echo $seo['title'];?></title>
<meta name="viewport" content="width=device-width,initial-scale=0.7,minimum-scale=0.2,maximum-scale=0.9">
<meta name="description" content="<?php echo $seo['description'];?>">
<meta name="keywords" content="<?php echo $seo['keywords'];?>">
<meta property = "og:image" content = "<?php echo $thumb;?>" />
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/unsemantic_v_2.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/responsive.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/font-awesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/base_v_4.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/head3.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/style_company.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/reset.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/osx1.css" type="text/css">

<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/com_view_mop_v5.css" type="text/css">
<link rel="stylesheet" type="text/css" href="templates/<?php echo $CFG['tplname'];?>/style/jquery.webui-popover.css" />
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/js/fancybox/jquery.fancybox-1.3.4.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/slide_panel_v_2.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/fixedMenu_style1_v_3.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/pages/product-detail.css" type="text/css">
</head>
<body class="body-background2 content-font dark-color lock" ".$body_onload." >
<div class="scrolbar">
<?php if(is_array($news)) foreach($news AS $val) { ?>
<div id="modal_form_<?php echo $val['idnews'];?>" class="modal_form_c">
<div class="news_des_m"><div class="news_img_m"><div class="news_img_milk"><img src="<?php echo $val['thumb'];?>"></div></div><div class="news_title_m"><?php echo cut_str($val[newsname], 90, '...');?></div><span><?php echo $val['newsdescript'];?></span></div>
</div>

<?php } ?>
</div>
<div id="overlay_c"></div><div id='fon_otz'></div><div class="panel_scroll">
<div class="panel"><div style="clear:both;"></div>
</div><div style="clear:both;"></div></div> 

<?php include template(top); ?>

<section class="page-content" style="line-height: 1em;">
<div class="modal_map">
<?php if($mappoint) { ?>
<iframe id="map" src="do.php?act=big_map_com&mark=1&mappoint=<?php echo $mappoint;?>&address=<?php echo $address;?>&height:314" frameborder="0" scrolling="no" height="314"></iframe><?php } else { ?><div id="map" style="height:314px;float:left;text-align:center;padding-top: 112px;font-size: 18px;">Нет данных о карте</div><?php } ?></div>
<div id="modal_message" style="display:none;width: 560px;min-height: 170px;height: auto;"></div>
<div id='as' class="lock page-block page-block-top cream-bg grid-container lock">
<div class="line_razriv_com"></div>
<div class="com_tovar" ><div class="mop">
<div class="mop_im"><div id="com_left"><div id="info_com_1">
<?php if($thumb) { ?><img src="<?php echo $thumb;?>" alt="<?php echo $comname;?>" itemprop="logo"/></div>
<?php } else { ?><img src="images/ico/no_images.png" alt="<?php echo $comname;?>" itemprop="logo"/></div><?php } ?></div>
<div class="com_cent"><h1 class="name_com_1_title" itemprop="name"><?php echo $comname;?></h1>
<div class="sfera"><div class="sfera_vid"> <?php echo $imy;?></div></div>
<div class="lok_reit">
<div class="reit_num_col">/ оценили <?php echo $tvotes;?></div>    
<div class="reit_num" ><?php if($reit>0) { ?><?php echo $reit;?><?php } else { ?><?php } ?></div>  
<div class="riet_bo"><?php if(!$_userid){echo rating_bar($id,'5','static');}else{ echo rating_bar($id,'5'); }?></div>
</div> 
</div>
<div class="emil_but"><a href="#">Написать сообщение <i class="icon-pencil"></i></a></div>
</div>
<div class="mop_desk"><div class="knop_sob"><i class="icon-share-alt"></i></div><div class="social">
<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,gplus,twitter"></div>
</div></div>
<div class="mop_lin"></div></div></div>
<div class="product_tabs" ><div id="com_content">
<div class="cd-tabs1">
<nav id="product">
<ul class="cd-tabs-navigation1">
<li><a data-content="descript" class="selected" href="#"><span class="hide-on-mobile dark-color">Главная</span></a></li>
<?php if($char) { ?> <li><a data-content="product" id="ajax_p" href="#"><span class="hide-on-mobile dark-color">Продукция</span></a></li><?php } ?>
<?php if($news || $comimg) { ?><li><a data-content="news" id='news1'  href="#"><span class="hide-on-mobile dark-color">События</span></a></li><?php } ?>
<?php if($vac) { ?><li><a data-content="vacancy" id='vacansy'  href="#"><span class="hide-on-mobile dark-color">Вакансии</span></a></li><?php } ?>
</ul></nav>
<ul class="cd-tabs-content1">
<li data-content="descript" class="selected">
<div class="reset_st">
<div class="news_card_com">
<div class="tit_po_im">
<div class="sfera_tip"> ИНН: <strong> <?php if($unp) { ?><?php echo $unp;?><?php } else { ?><?php echo $L['unknown'];?><?php } ?></strong></div>
<?php if($ccr!=0) { ?> <div class="sfera_tip" >Товаров: <strong> <?php echo $ccr;?></strong>
</div><?php } ?>
<div class="sfera_tip"><strong>Дата регистрации <?php echo $postdate;?></strong></div>
</div>
</div>
<?php if($keywords) { ?><div class="key_jo"><span>Основные виды деятельности</span><strong><?php echo $keywords;?></strong></div><?php } ?>
<div id="com_descript">
<div class="intro_block"> <span><?php echo $introduce;?></span></div></div>
<div class="reset_stil" ><span>О компании</span></div></div> 
<div class=gall><div class="galery_blokc" >
<div class="ui_blokks " style="padding: 10px 16px 3px 2px;"><i class="icon-map-marker"></i>Адрес</div>
<div class="toil_blokk_mo "itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
<strong itemprop="streetAddress"><?php if($address) { ?><?php echo $address;?><?php } else { ?><?php echo $L['unknown'];?><?php } ?></strong></div> 
<div class="toil_blokk_mo">
<strong  style="font-size: 17px;"><?php echo $areaname;?></strong></div>
<div class="gooma"><div id="map_call">Показать на карте</div><img src="images/vedka.png"></div></div>
<div class="galery_blokc" >
<div class="ui_blokks">телефоны</div>
<div class="toil_blokks">  
<div class="toil_blokks_tel"><?php if($phone) { ?><?php echo $phone;?><?php } else { ?><?php echo $L['unknown'];?><?php } ?></div> 
<div class="toil_blokks_tel"><?php if($icq) { ?><?php echo $icq;?><?php } else { ?><?php echo $L['unknown'];?><?php } ?></div> </div> 
<?php if($comsait) { ?>
<div class="sfera_wek" >
<div class="sfera_veb">
<noindex><a rel="nofollow" href=" <?php echo $comsait;?> " target="_blank" ><?php echo $comsait;?> </a></noindex>
</div></div><?php } ?>
<?php if($comsoc) { ?>
<div class="sfera_veb">
<a href="<?php echo $comsoc;?> " target="_blank">В соц. сетях</a>
</div><?php } ?>
<div class="ui_blokks">e-mail</div>
<div class="toil_kont ">
<?php if($email) { ?><?php echo $email;?><?php } else { ?><?php echo $L['unknown'];?><?php } ?></div>
<div class="ui_blokks "><div class="graf_r">график работы <strong id="jack" ><i class="icon-time"></i>Все дни</strong></div>
<div class="sto_ve">
<strong id="jack_tu"> <?php echo $now_work['week'];?> </strong><strong id="jack_tu"><?php if($now_work[time]<>0) { ?><?php echo $now_work['time'];?><?php } else { ?>-выходной-<?php } ?><?php if($ifopen[0]<=$vremy && $ifopen[1]>=$vremy) { ?>-открыто-<?php } else { ?>-закрыто-<?php } ?></strong></div>
</div></div></div>
<div class="come_cont">
    <div id="rescoment">

<?php include template(compani_comets); ?>
 </div>
</li>

<?php include template(compani_tabs); ?>

<div style="clear:both;"></div>
</ul><div style="clear:both;"></div>
</div><div style="clear:both;"></div></div></div>
<script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
<script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
<script src="templates/<?php echo $CFG['tplname'];?>/js/modernizr1.js"></script>
<script src="js/jquery.tools.min.js"></script> 
<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/modalfade.js"></script>
<script type='text/javascript' src="templates/<?php echo $CFG['tplname'];?>/js/jquery-2.1.1.js"></script>
<script type='text/javascript' src="templates/<?php echo $CFG['tplname'];?>/js/modernizr.js"></script>
<script type='text/javascript' src="templates/<?php echo $CFG['tplname'];?>/js/main.js"></script>
<script type='text/javascript' src="templates/<?php echo $CFG['tplname'];?>/js/velocity.min.js"></script>
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type="text/javascript">
function wwwq(e) {
   if(userid==0){
               e.preventDefault();
       alert("Только зарегестрированный пользователь может выстовлять рейтинг.");  
       return false;
   }
}
    
function ajax_fil(idcat,comid) {
   if(idcat==0 ){}else{
disp(comid);
$("#fj").animate({opacity:0,},1);$("#fj").css({'display':'none'});}
$.ajax({
    url: "com_view_r.php?comid="+comid+"&catid=" + idcat,
type: 'POST',
data: $("#filter").serializeArray(),
beforeSend: function() {
$('#divContent').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"/>')
},
success: function(html) {
$("#divContent").html(html);
if (idcat) {
$("#catid").val(idcat)
}}})}
$(document).ready(function() {
$(".clo_lin").click(function() {
var idcat = $(this).attr('id');
$(".clo_lin").each(ajax_fil(idcat))
});
$("select").change(function() {
$("select option:selected").each(ajax_fil)
}).change();
$(".kup_imput").click(function() {
$(".kup_imput").each(ajax_fil)
});
$("#javvse").click(function() {
var idcat = 0;
$("#catid").val({
idcat
});
$(":radio").removeAttr("checked");
$("#search").val("");
$("#javvse").each(ajax_fil(idcat))
});
$(".search").keyup(function() {
$(".search").each(ajax_fil)
});
$(".filter_pad input:checkbox").click(ajax_fil);
$(".sort").on("click", function() {
$(":radio").eq($(".sort").index(this)).attr("checked", "checked").click(function() {
$("#filter").each(ajax_fil)
})
})
});

</script>
<script type="text/javascript">
$(document).ready(function(){$('#map_call').click(function(){var top=$(document).scrollTop()+($(window).height()*0.25);$('#overlay1').css('display','block').animate({opacity:0.65,},300);$('.modal_map').css({'display':'block','top':top});$('.modal_map').animate({opacity:1,},750)});$('#overlay1').click(function(){$('.modal_map').css('display','none');$('.modal_map').animate({opacity:0},300);$('#overlay1').animate({opacity:0,},300).css('display','none')})});
</script>
<script type="text/javascript">
$(document).ready(function(){var docHeight=$(document).height(),client_h=document.documentElement.clientHeight,topMargin=(client_h-500+'px');$(".trigger").click(function(){$(".panel").toggle("fast");$(this).toggleClass("active");$(".panel").css({'top':94,'display':'block',});$('body').toggleClass("over");$("#fon_otz").css({'height':0,});$("body").css({'overflow':'hidden',});$("#fon_otz").toggleClass("fon");$(".fon").css({'height':(docHeight+200+'px'),'cursor':'pointer','display':'block',});$(".panel_scroll").css({'height':768+'px','cursor':'pointer','display':'block','overflow':'auto','position':'fixed','margin-top':0,});return false});$(".trigger1").click(function(){$("#fon_otz").removeClass("fon");$("#fon_otz").css({'height':0,});$(".panel").css({'top':-1110,'display':'none',});$('body').removeClass("over");$(this).removeClass("active");$(".trigger").removeClass("active");$("body").css({'overflow':'auto',});$(".panel_scroll").css({'height':0,'cursor':'auto','display':'none','overflow':'auto',});return false});$('.panel_scroll').click(function(e){var div=$(".panel");if(!div.is(e.target)&&div.has(e.target).length===0){$("#fon_otz").removeClass("fon");$("#fon_otz").css({'height':0,});$(".panel").css({'top':0,'display':'none',});$('body').removeClass("over");$(this).removeClass("active");$(".trigger").removeClass("active");$("body").css({'overflow':'auto',});$(".panel_scroll").css({'height':-1110,'cursor':'auto','display':'none','overflow':'auto',});return true}})});
</script>
<script type="text/javascript">
$(document).ready(function(){$('.mop_desk').click(function(){$(".social").animate({opacity:1},1000);});$('body').click(function(e){var div=$(".mop_desk");if(!div.is(e.target)&&div.has(e.target).length===0){$(".social").animate({opacity:0},800)}})});</script>
<script type="text/javascript">
var userid="<?php echo "$_userid"; ?>";$(document).ready(function(){$('.emil_but').click(function(){if(userid!=0){$.ajax({url:"/messages.php?id=free&infoid=<?php echo $_GET['id'];?>",cache:false,beforeSend:function(){$('#modal_message').html('<img class="loading"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>')},success:function(html){$("#modal_message").html(html)}})}else{swal({
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
        );return false;}$('#overlay1').css('display','block').animate({opacity:0.65,},300);$('#modal_message').css('display','block');$('#modal_message').animate({opacity:1,},750)});$('#overlay1').click(function(){$('#modal_message').css('display','none');$('#modal_message').animate({opacity:0,},300);$('#overlay1').animate({opacity:0,},300).css('display','none')})});
</script>
<script type='text/javascript' src="templates/<?php echo $CFG['tplname'];?>/js/jquery-latest.js"></script>
<script type="text/javascript">
$(document).ready(function(){var sch,h3;sch=$('#all_links>li').length;h3=((sch*27)/2)+20;$('.toglecat').click(function(){if($(".all_cat").css('opacity')=='0'){$(".all_cat").animate({opacity:1,},50);$(".all_cat").css({'display':'block'})}else{$(".all_cat").animate({opacity:0,},1);$(".all_cat").css({'display':'none'})}});$('.close_link').click(function(){$(".all_cat").animate({opacity:0,},1);$(".all_cat").css({'display':'none'})});$(document).click(function(e){if($(".all_cat").css('opacity')=='1'){var div=$("#fj");if(!div.is(e.target)&&div.has(e.target).length===0){$("#fj").animate({opacity:0,},1);$("#fj").css({'display':'none'});return true}}})});
</script>
<?php if($news) { ?>
<?php if(is_array($news)) foreach($news AS $val) { ?>
<script type="text/javascript">
$(document).ready(function(){var docHeight=$(document).height(),client_h=document.documentElement.clientHeight,client_w=document.documentElement.clientWidth,bo_width=document.body.offsetWidth,bl_h=('.news_des_m');leftmargin=(bo_width-800)/2+'px',topMargin=(client_h-600+'px');$('#<?php echo $val['idnews'];?>').click(function(event){event.preventDefault();$('#overlay_c').fadeIn(200,function(){$('#modal_form_<?php echo $val['idnews'];?>').css({'display':'block','top':topMargin,'margin-left':leftmargin}).animate({opacity:1},200);$('body').css({'overflow':'hidden'});$('.scrolbar').css({'height':client_h})})});$(document).click(function(e){if($("#modal_form_<?php echo $val['idnews'];?>").css('display')=='block'){var div=$(".modal_form_c");if(!div.is(e.target)&&div.has(e.target).length===0){$('#modal_form_<?php echo $val['idnews'];?>').animate({opacity:0,top:'45%'},200,function(){$('#modal_form_<?php echo $val['idnews'];?>').css('display','none');$('#overlay_c').fadeOut(200);$('body').css({'overflow':'auto'});$('.scrolbar').css({'height':0})});return true}}})});
</script>
<?php } ?>
<?php } ?>
<?php if(is_array($vac)) foreach($vac AS $val) { ?>
<script type="text/javascript">
$(document).ready(function(){$('#vacansy').click(function(){$('.info<?php echo $val['vacid'];?>').css({'display':'none'});var h3h;var h2h;$('#info<?php echo $val['vacid'];?>').text('<?php echo $val['name'];?> ');var heights=[];var total=0;$('#vac_alldes<?php echo $val['vacid'];?>>p').each(function(indx,element){heights.push($(element).height());total+=parseFloat($(this).outerHeight(true))});$('#info<?php echo $val['vacid'];?>').click(function(){if($('#vac_alldes<?php echo $val['vacid'];?>').css('height')=='0px'){$('.cd-tabs-content1').css({'height':'auto'});$('#vac_alldes<?php echo $val['vacid'];?>').animate({'overflow':'visible','height':total+116,},300);$('#vac_des<?php echo $val['vacid'];?>').css({'overflow':'visible','height':'auto'});$(document).click(function(e){if($("#vac_alldes<?php echo $val['vacid'];?>").css('height')>'0px'){var div=$("#vac_alldes<?php echo $val['vacid'];?>");if(!div.is(e.target)&&div.has(e.target).length===0){$('#vac_alldes<?php echo $val['vacid'];?>').animate({'overflow':'hidden','height':0,},150);$('#vac_des<?php echo $val['vacid'];?>').css({'overflow':'hidden','height':'77px'});return false}}})}else{$('#vac_alldes<?php echo $val['vacid'];?>').animate({'overflow':'hidden','height':0,},150);$('#vac_des<?php echo $val['vacid'];?>').css({'overflow':'hidden','height':'77px'})}})})});
</script>

<?php } ?>

<script>
$(document).ready(function(){var height=$('.intro_block').outerHeight(),com_descriptH=$("#com_descript").css('height');height=height+20;$('.reset_stil').click(function(){if($('#com_descript').css('height')=='0px'){$('#com_descript').animate({'height':height},750)}else{$('#com_descript').animate({'height':'0px'},750)}})});
</script>
</section>
 
<?php include template(footer); ?>

<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery.fixedMenu.js"></script>
<script>
$('document').ready(function(){$('.menu').fixedMenu()});
</script>
<script type="text/javascript" language="javascript" src="js/behavior.js"></script>
<script type="text/javascript" language="javascript" src="js/rating_com.js"></script>
<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery.webui-popover.js"></script>
<script type="text/javascript">
 $("#jack").webuiPopover({placement: "left",title: "График работы",content:'<div class="product-review-author middle-color"style="display:none"><?php echo $dni['week'];?></div>'<?php if(is_array($timework)) foreach($timework AS $dni) { ?>+'<div class="product-review-author middle-color"><?php echo $dni['week'];?>&nbsp;&nbsp;'+'<strong class="dark-color"><?php if($dni[time]<>0) { ?><?php echo $dni['time'];?><?php } else { ?>-Выходной-<?php } ?></strong></div>' 
<?php } ?>
,trigger: "hover",delay: {show: 1,hide: 300}});
 </script>