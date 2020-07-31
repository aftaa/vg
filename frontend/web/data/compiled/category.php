<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><!DOCTYPE html>
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="ru"> <!--<![endif]-->
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title><?php echo $seo['title'];?></title>
<meta name="fragment" content="!">
<meta name="viewport" content="width=device-width,initial-scale=0.45,minimum-scale=0.45,maximum-scale=0.7">
<meta name="description" content="<?php echo $seo['description'];?>">
<meta name="keywords" content="<?php echo $seo['keywords'];?>">
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/head3.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/unsemantic_v_2.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/responsive.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/font-awesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/base_v_4.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/osx1.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/category_v_2.css?" type="text/css">
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='templates/<?php echo $CFG['tplname'];?>/js/easypaginate.js'></script>    
<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery-latest.js"></script>  
<script type="text/javascript">
$(document).ready(function() { $('#region').click(function(){$('body').css('overflow','');
var s = document.body.clientHeight
var h = s/5;
$('#overlay2').css({'display': 'block'})
.animate({opacity:1,},300); 
$.ajax({
url: "area_spis.php?act=start_page&ki=<?php echo $_GET['ki'];?>",
cache: false,
beforeSend: function() {
$('#modal_form2').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF" ></>');
},success: function(html){document.title = "<?php echo $L['about'];?> - <?php echo $CFG['webname'];?>";
$("#modal_form2").html(html);
$("#modal_form2").css({'height':'',});}});
$('#modal_form2').css({'display': 'block','position':''});
$('#modal_form2').animate({opacity:1,},500);});
$('#modal_close2, #overlay2').click( function(){
$('body').css('overflow','auto'); 
$('#modal_form2').css('display', 'none');
$('#modal_form2').animate({opacity:0,},300);
$('#overlay2')
.animate({opacity:0,},300).css('display', 'none'); });});
</script> 
<style type="text/css">
#raiting {position:relative; height:16px; cursor:pointer; width:100px; float:left} /* Блок рейтинга*/
#raiting_blank, #raiting_votes, #raiting_hover {height:20px; position:absolute}
#raiting_blank { background:url(../images/reiting_n9.png); width:100px; } /* "Чистые" звездочки */
#raiting_votes {background:url(../images/reiting_n9.png) 0 -24px} /*  Закрашенные звездочки */ 
#raiting_hover {background:url(../images/reiting_n9.png) 0 -32px; display:none}  /*  звездочки при голосовании */ 
#raiting_info {margin-left:100px}
#raiting_info img{vertical-align:middle; margin:0 5px; display:none}
</style>
<script type="text/javascript"> 
function diplay_hide (blockId)
{if ($(blockId).css('height') == '210px') 
{$(blockId).animate({height: 1128,}, 750);} 
else{ $(blockId).animate({height: 210,}, 750); }} 
</script>
<script type="text/javascript">
$(document).ready(function(){var sch,h3;sch=$('#all_links>li').length;h3=((sch*33)/2)+20;$('.toglecat').click(function(){if($(".modal_all_cat").css('opacity')=='0'){$(".modal_all_cat").animate({opacity:1,},750);$(".modal_all_cat").css({'display':'block'})}else{$(".modal_all_cat").animate({opacity:0,},1);$(".modal_all_cat").css({'display':'none'})}});$(document).click(function(e){if($(".modal_all_cat").css('opacity')=='1'){var div=$("#fj");if(!div.is(e.target)&&div.has(e.target).length===0){$("#fj").animate({opacity:0,},1);$("#fj").css({'display':'none'});return true}}})});
</script>
<script type="text/javascript">                  
$(document).ready(function(){function ajax_fil(){$.ajax({url:"category.php?act=res&ki=<?php echo $_GET['ki'];?>",cache:false,type:'POST',data:$("#filter").serializeArray(),beforeSend:function(){$('#result').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"/>')},success:function(html){$("#result").html(html)}})}$("select").change(function(){$("select option:selected").each(ajax_fil)}).change();$(".kup_imput").click(function(){$(".kup_imput").each(ajax_fil)});$(".price_f").keyup(function(){$(".price_f").each(ajax_fil)});$("#filter i").on("click",function(){$(":radio").eq($("#filter i").index(this)).attr("checked","checked").click(function(){$("#filter").each(ajax_fil)})})});
</script>
</head>
<body class="body-background2 content-font dark-color">
<div id="modal_form2" style="right: 7.2%;float: right;left: initial;margin-top: 122px;">
<span id="modal_close2">X</span>
</div>
<div id="overlay2"></div>

<?php include template(top); ?>

<section class="page-content" style="    min-height: 350px;">
<div class="cream-bg grid-container">
    <div class="line_razriv" style="          margin-top: 0px;height:auto;float: left;border-right: none;border-left: none;background:#efefef"></div>
<div class="sel_cat_but"><?php if(is_array($parent_cat)) foreach($parent_cat AS $qw) { ?><?php if($qw['catid']==$_GET['ki'] ) { ?><a class="toglecat" href="#sel_cat"><?php echo $qw['catname'];?>
<i class="icon-th"></i>
</a><?php } ?>
<?php } ?>
</div>
<div class="blok_top">
<div id='fj' class="modal_all_cat">
<ul id="all_links">
<?php if(is_array($cat_parent)) foreach($cat_parent AS $qw) { ?><li class="hover all_podcat"><a rel="nofollow" href="category.php?ki=<?php echo $qw['catid'];?>"><?php echo $qw['catname'];?></a></li>
<?php } ?>

</ul></div>
<?php if($info_top!==false) { ?> <?php if(is_array($info_top)) foreach($info_top AS $val) { ?> 
<div class="product_card_top">
<a href="view.php?id=<?php echo $val['info_id'];?>&us=<?php echo $val['userid'];?>">
<strong><?php echo cut_str($val[title], 65, '...');?>
</strong></a>                 
<div class="product_top_img">
<a href="view.php?id=<?php echo $val['info_id'];?>&us=<?php echo $val['userid'];?>">
<?php if($val[thumb]) { ?>
<img src="<?php echo $val['thumb'];?>" alt="<?php echo $val['title'];?>"  />
<?php } else { ?>
<img src="images/ico/no_images.png" alt="<?php echo $val['title'];?>" />
<?php } ?>
</a></div> 
<?php if($val[price]!=0) { ?>
<span><?php echo number_format($val[price], 0, '.', ' ');?> <?php echo $val['unit'];?> <?php if(!$val[unit]) { ?><p>RUR</p><?php } ?> <?php } else { ?><div class="no_cens fix">Цену уточняйте</div></span><?php } ?>
</div>

<?php } ?>

<?php } else { ?>
<?php if(is_array($ll)) foreach($ll AS $w) { ?>
<div class="product_card_top"> 
<div class="product_top_img">
<img class="pad_tov" src="images/ico/no_images.png" alt="vseti-goroda.ru" />
</div><div class="tut_top">Тут может быть Ваш товар</div>                             
</div>

<?php } ?>

                            
</div><?php } ?>
<div class="clear"></div></div>
<div class="pr_block">
<?php if($_GET[id]==0) { ?> 
<?php if($info==true || $info==false) { ?> 
<div class='sort' >
<div class="price_fil">  <form  id="filter" name="form" action="" method="post" >
<div>
<div class="file_pol">
<input id="sortf1" class="sort_input" type="radio" name="orderby" value="ORDER BY postdate DESC" style="display:none" ><label for="sortf1"><i class="icon-long-arrow-up"></i></label>
<input id="sortf2" class="sort_input"  type="radio" name="orderby" value="ORDER BY postdate ASC" style="display:none" ><label for="sortf2"><i class="icon-long-arrow-down"></i></label>
<div style="float: right;padding: 0px 10px;">по дате :</div>
<input id="sortf3" class="sort_input" type="radio" name="orderby" value="ORDER BY price ASC " style="display:none" ><label for="sortf3"><i class="icon-long-arrow-up"></i></label>
<input id="sortf4" class="sort_input" type="radio" name="orderby" value="ORDER BY price DESC" style="display:none" ><label for="sortf4"><i class="icon-long-arrow-down"></i></label>
</div>
<div class="price_fil">
<div>
<span>Цена от:</span>
<input type="text" class="price_f" name="price_start" /> 
</div>
<div>
<span>Цена до:</span>
<input value="" type="text" class="price_f" name="price_end" />
</div></div>
<div>
<div colspan="2">
<div style="display:none;">
<input class="kup_imput" type="text"  name="ki" value="<?php echo $_GET['ki'];?>" />
</div>
<div style="display:none;">
<input class="kup_imput" type="text"  name="area" value="<?php echo $_GET['area'];?>" />
</div>
<div style="display:none;">
<input class="kup_imput" type="text"  name="keywords" value="<?php echo $_GET['keywords'];?>" />
</div></div></div></div>
</form> </div>
<noindex><a class="all_city" href="#overlay2" id="region" rel="nofollow">
<i class="icon-th-large"></i>  
    все города</a></noindex>
<div class="obl_block">
<?php if(is_array($areapop)) foreach($areapop AS $val) { ?>
 <div class='reg_obl'><div class="company_imput "></div><noindex><a  href="category.php?ki=<?php echo $_GET['ki'];?>&area=<?php echo $val['areaid'];?>"rel="nofollow"><?php echo $val['areaname'];?></a></noindex></div>

<?php } ?>

</div>
<?php } ?><?php } ?>
</div>
<div id="catalog_2">         
<?php if($_GET[id]==0) { ?>
<div class="sort_head"><div class="sortirovka">cортировать : по цене</div>
</div> 
<?php } ?>
<?php if(!$word) { ?>
<div id="result">
    <?php if($esc_frag==0) { ?>
    
<script type="text/javascript">
$(document).ready(function(){$(".plink").click(function(){elementClick=$(".plink").attr("href");destination=$('.line_razriv').offset().top;var id_elem=$(this).attr("id");$.ajax({url:"category.php?act=res&ki=<?php echo $_REQUEST['ki'];?>&page="+id_elem,cache:false,type:'POST',data:$("#filter").serializeArray(),beforeSend:function(){$('#result').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>')},success:function(html){$("#result").html(html);window.history.pushState(null,null,'http://vseti-goroda.ru/category.php?act=res&ki=<?php echo $_REQUEST['ki'];?>&page='+id_elem);$('body').animate({scrollTop:destination},750)}})})});
</script>
<?php if($f_info==false) { ?> <?php if($_POST[area]==false) { ?><div class="nou_tov"><span> В данной подкатегории нет товаров </span>
<div class="home_msg_but2"><?php if(!$_userid) { ?><a rel="nofollow" href="member.php?act=register"><?php } else { ?><a rel="nofollow" href="post.php"><?php } ?>Добавить товар</a></div>
</div><?php } ?> <?php } ?><?php if($_POST[area]<>0) { ?> <?php if($f_info==0) { ?><div class="nou_tov"><span> В данном регионе нет товаров  </span>
<div class="home_msg_but2"><?php if(!$_userid) { ?><a rel="nofollow" href="member.php?act=register"><?php } else { ?><a rel="nofollow" href="post.php"><?php } ?>Добавить товар</a></div>
</div><?php } ?> <?php } ?>
<?php if(is_array($f_info)) foreach($f_info AS $val) { ?>
<div class="product_card  hover_t">
<?php if($val[is_pro]) { ?>
<div class="ribbon-small ribbon-red">
<div class="ribbon-inner">
<span class="ribbon-text"><?php echo $L['recom'];?></span>
<span class="ribbon-aligner"></span>               
</div></div><?php } ?> 
<div class="product_card_img">
<a class="product_card_img1" href="view.php?id=<?php echo $val['infoid'];?>&us=<?php echo $val['userid'];?>">
<?php if($val[thumb]) { ?>
<img class="lazy regular" src="images/smen_pol.gif" data-original="<?php echo $val['thumb'];?>" alt="<?php echo $val['title'];?>" style="margin-top:0px;" />
<?php } else { ?>
<img  class="lazy regular" src="images/smen_pol.gif" data-original="images/ico/no_images.png"  alt="<?php echo $val['title'];?>" />
<?php } ?></a></div>
<div class="product_card_desc">
<h3 >
<a href="view.php?id=<?php echo $val['infoid'];?>&us=<?php echo $val['userid'];?>" class="dark_color_prod active-hover">
<strong style="text-align:left"><?php echo cut_str($val[title], 50, '..');?></strong>
</a></h3></div>
<div class="product_card_price1"><?php if($val[price]!=0) { ?>
<strong> <?php echo number_format($val[price], 0, '.', ' ');?> <span><?php echo $val['unit'];?><?php if(!$val[unit]) { ?>RUR</span><?php } ?><?php } else { ?><div class="no_cens">Цену уточняйте</div>
</strong><?php } ?></div>
<div class="ob_footer" ><?php if(is_array($wcom)) foreach($wcom AS $q) { ?> <?php if($q['userid']==$val['userid']) { ?><div class="com_but"><a rel="nofollow" href="com_str.php?id=<?php echo $q['comid'];?>"> Страница компании   </a> </div><?php } ?> 
<?php } ?>

<?php if(is_array($reit)) foreach($reit AS $re) { ?> <?php if($re[id]==$val[id]) { ?> <?php if($re[userid]==$val[userid]) { ?> <?php if($re[srednee]==0 ) { ?> <div id="raiting_star" class="rait_star_pos">
<div id="raiting">
<div id="raiting_blank"></div>
<div id="raiting_hover"></div>
<div id="raiting_votes" style="width:<?php echo $re['srednee']*20?>px"></div>
</div>
<div id="raiting_info">  <img src="../templates/default/img/load.gif" /> <h5></h5></div>
</div> <?php } ?>     <?php if($re[srednee]!=0 ) { ?>
<div id="raiting_star" class="rait_star_pos">
<div id="raiting">
<div id="raiting_blank"></div>
<div id="raiting_hover"></div>
<div id="raiting_votes" style="width:<?php echo $re['srednee']*20?>px"></div>
</div>
<div id="raiting_info">  <img src="../templates/default/img/load.gif" /> <h5></h5></div>
</div><?php } ?><?php } ?> <?php } ?>
<?php } ?>

</div>
<?php if(is_array($coommentarii)) foreach($coommentarii AS $rec) { ?><?php if($rec[userid]==$val[userid]) { ?> <?php if($rec[id]==$val[id]) { ?> <?php if($rec[colvo]==0 ) { ?> <span style="color:#676767">Отзывы 0</span> <?php } ?>     <?php if($rec[colvo]<>0 ) { ?> <span style="color:#676767;">Отзывы <?php echo $rec['colvo'];?></span> <?php } ?><?php } ?> <?php } ?>
<?php } ?>


<noindex> <span class="ob_footer_area">
<?php echo $val['areaname'];?></span></noindex>
</div>

<?php } ?>

<?php if($f_info!=false) { ?>         
<div class="pagelink"><?php for ($j = 1; $j<$pages; $j++) {if ($j>=$start && $j<=$end) {
if ($j==($page+1)) echo '<a id="' . $j . '" class="plink" href="#"><strong style="    color:#72849c;font-weight: 600;font-size: 19px;">' . $j . 
        '</strong></a> &nbsp; ';
else echo '<a id="' . $j . '" class="plink" href="#">' . $j . '</a> &nbsp; ';}} ?>
</div><?php } ?>
<script type="text/javascript" src="js/jquery.lazyload.min.js"></script> 
<script type="text/javascript">
$("img.lazy").lazyload({threshold: 10, effect: "fadeIn"});
</script> <?php } ?>
</div><?php } ?></div><div id= "toTop" > ^ Наверх </div></section>

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