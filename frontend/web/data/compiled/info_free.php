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
        <!-- Styles -->
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/head3.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/unsemantic_v_2.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/base_v_4.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/font-awesome/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/barah_prod_v1.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/osx1.css" type="text/css">
<link rel="stylesheet" href="templates/default/style/webhostinghub/css/whhg.css" type="text/css">
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='templates/<?php echo $CFG['tplname'];?>/js/easypaginate.js'></script>
<script type="text/javascript">
$(document).ready(function(){
$('#region').click(function(){
$.ajax({
url: "area_spis.php?act=start_page&id=<?php echo $_GET['id'];?>&tip=free",
cache: false,
beforeSend: function() {
$('#modal_form2').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF" ></>');
},
success: function(html){
  document.title = "<?php echo $L['about'];?> - <?php echo $CFG['webname'];?>";
$("#modal_form2").html(html);
$("#modal_form2").css({
});
}
});
return false;
});
});</script>
<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery-latest.js"></script>  
<script type="text/javascript">                  
     $(document).ready(function(){
      function ajax_fil(){
        $.ajax({
                url: "info_f_result.php?id=<?php echo $_GET['id'];?>#!cat=<?php echo $_GET['id'];?>",
                cache: false,
                type:'POST',
                data:$("#filter").serializeArray(),
                beforeSend: function() {
                    $('#result').html('');
                },
                success: function(html) {
                    $("#result").html(html);
                }
            });
      }
  $("select").change(function () {
          $("select option:selected").each(ajax_fil);
        });
        ajax_fil();
$(".kup_imput").click(function () {
          $(".kup_imput").each(ajax_fil);
        });
$(".price_f").keyup(function () {
          $(".price_f").each(ajax_fil);
              });
$(".filter_pad input:checkbox").click(ajax_fil);
  $(".sort").click(function () {
  $(":radio").eq($(".sort").index(this)).attr("checked", "checked").click(function(){$("#filter").each(ajax_fil);});
});
        });
</script>
<script type="text/javascript">
    $(function() {
        $(".search_button").click(function() {
            var searchString    = $("#search_box").val();
            var data            = 'search='+ searchString;
            if(searchString) {
                $.ajax({
                    type: "POST",
                    url: "do_search.php",
                    data: data,
                    beforeSend: function(html) { 
                        $("#results").html('');
                        $("#searchresults").show();
                        $(".word").html(searchString);
                   },
                   success: function(html){ 
                        $("#results").show();
                        $("#results").append(html);
                  }
                });
            }
            return false;
        });
    });
</script>
<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/modernizr.custom.79639.js"></script>
<script type="text/javascript">
function DropDown(el) {
    this.dd = el;
    this.placeholder = this.dd.children('span');
    this.opts = this.dd.find('ul.dropdown > li');
    this.val = '';
    this.index = -1;
    this.initEvents();
}
DropDown.prototype = {
    initEvents : function() {
        var obj = this;

        obj.dd.on('click', function(event){
            $(this).toggleClass('active');
            return false;
        });
        obj.opts.on('click',function(){
            var opt = $(this);
            obj.val = opt.text();
            obj.index = opt.index();
            obj.placeholder.text(obj.val);
        });
    },
    getValue : function() {
        return this.val;
    },
    getIndex : function() {
        return this.index;
    }
}</script>
<script type="text/javascript">
  $(document).ready(function(){
    var h4;
    h4 = $("#list-links").outerHeight(true);
    
    if (h4< 376) {
      $(".pop_cat_b").css({'display':'block'});
    };
  })
</script>
<script type="text/javascript">
        $(document).ready(function() { 
    $('#region').click(function(){
    $('body').css('overflow','');
    
    var s = $(window).height();
    var h = s/3;
     $('#overlay2').css({'display': 'block'})
     .animate({opacity:0.65,},300);  
                $('#modal_form2').css({'display': 'block','top':h});
                $('#modal_form2').animate({
                  opacity:1,

                },750);
    });
    $('#modal_close2, #overlay2').click( function(){
    $('body').css('overflow','auto'); 
        $('#modal_form2').css('display', 'none');
        $('#modal_form2').animate({opacity:0,},300); 
         $('#overlay2')
     .animate({opacity:0,},300).css('display', 'none'); 
    });
});
</script> 
<script type="text/javascript">
 $(document).ready(function()
 {
  var i = 1;
$('.cat_lev_barah').each(function() {
 var card = $(this).attr('id', 'id_' + i);
  i++;
});  
var s = 1;
$('.cat_lev_tu').each(function() {
  var inf= $(this).attr('id', 'id_' + s);
  s++;

}); 
 });
 </script>
<script type="text/javascript">
 $(document).ready(function(){ 
$('.cat_lev_barah').on('click', function() {
 $('.cat_lev_tu').css({ 'display': 'none'});           
       var id=$(this).attr("id");
       var id_inf= $('.cat_lev_tu'+'#'+id);
       var l=$('.cat_lev_barah').outerWidth();
var htmlStr = $(".cat_lev_tu"+"#"+id).html();
$('.filter_navi').animate();
$(id_inf).css({'left':l-1+'px','z-index':'20'});
       $(id_inf).animate({'opacity':'1'},750);
       $(id_inf).css({ 'display': 'block'});
});
 $(document).click(function(e){ 
        var div =$(".cat_lev_barah"); 
        if (!div.is(e.target) 
            && div.has(e.target).length === 0) {
  $('.cat_lev_tu').css({ 'display': 'none'});
  return true;
        }
    });
 });
</script>
</head>
<body class="body-background2 content-font dark-color">
<div id="modal_form2" style="right: 7.5%;float: right;left: initial;margin-top: -108px;"><?php echo $area_spis;?>
<span id="modal_close2">X</span>
</div>
<div id="overlay2"></div>

<?php include template(top); ?>

<section class="page-content">
<div class="page-block page-block-top cream-bg grid-container" style='margin-top:0px;padding-top: 0px;padding-bottom:0px'>
<div class="line_r">
<?php if(!$_GET[id]) { ?>
<a class="dovl_cati "><img src="images/users-group.png"><h1>Барахолка : </h1>купи / продай</a>
<?php } else { ?>
<a class="dovl_cati "><i class="icon-mail-forward cat_i"></i><?php echo $catsel;?></a>
<?php } ?>
<a rel="nofollow"  class="all_city" href="#overlay2" id="region">все города
<i class="icon-th-large"></i>
</a>
<div class="sortirovka"><span>Сортировать : по цене</span>
<form id="filter"   name="sort_in" action="" method="post" style="float: right;">
<input id="sortf1" class="sort_input" type="radio" name="orderby" value="ORDER BY postdate ASC" style="display:none" ><label for="sortf1"><i class="icon-long-arrow-up sort"></i></label>
<input id="sortf2" class="sort_input"  type="radio" name="orderby" value="ORDER BY postdate DESC" style="display:none" ><label for="sortf2"><i class="icon-long-arrow-down sort"></i></label>
<span>по дате :</span>
<input id="sortf3" class="sort_input" type="radio" name="orderby" value="ORDER BY price ASC" style="display:none" ><label for="sortf3"><i class="icon-long-arrow-up sort"></i></label>
<input id="sortf4" class="sort_input" type="radio" name="orderby" value="ORDER BY price DESC" style="display:none" ><label for="sortf4"><i class="icon-long-arrow-down sort"></i></label>
<div style="display:none;">
<input class="kup_imput" type="text"  name="id" value="<?php echo $_GET['id'];?>" />
</div></form>
</div></div>
<div class="juti_compani" style="margin-top: -13px;border-bottom: none;border-right: none;border-left: none;border-bottom: none;background-color:#efefef;"> 
<div class="filter" style="height:auto">
<form  id="filter" name="form" action="" method="post" >
<div>
<div class="price_fil">
<div class="price_zen">
<span>Цена от:</span><span>рублей</span>
<input type="text" class="price_f" name="price_start" /> 
</div><div class="price_zen">
<span>Цена до:</span> <span>рублей</span>
<input type="text" class="price_f" name="price_end" />
</div></div>
<div class="kup_block">
<span>Продажа</span>
<div>
<input class="kup_imput" type="radio" name="buysel" value="1" />
</div></div>               
<div class="kup_block">
<span >Покупка</span>
<div>
<input class="kup_imput" type="radio" name="buysel" value="2" />
</div></div>
<input id="peger" type="text" name="pager" value="<?php echo $_GET['page'];?>" style="display:none" >
<div><?php if(is_array($custom)) foreach($custom AS $item) { ?>
<div class="filter_pad" >
<?php echo $item['cusname'];?><?php echo $item['html'];?>
</div>
<?php } ?>

</div>
<div>
<div colspan="2">
<div style="display:none;">
<input class="kup_imput" type="radio"  name="id" value="<?php echo $_GET['id'];?>" checked/>
</div>
<div style="display:none;">
<input class="kup_imput" type="radio"  name="area" value="<?php echo $_GET['area'];?>" checked/>
</div>
<div style="display:none;">
<input class="kup_imput" type="radio"  name="keywords" value="<?php echo $_GET['keywords'];?>" checked/>
</div></div></div></div></form>
<div class="obl_block" style="    display: none;">
<?php if(is_array($area2)) foreach($area2 AS $val) { ?>
<div class='reg_obl'><a href="category.php?ki=<?php echo $_GET['ki'];?>&area=<?php echo $val['areaid'];?>" style="color:#51403e"><?php echo $val['areaname'];?> обл.</a></div>

<?php } ?>
</div> </div>  
<div id="result" class="prop_block" style="min-height: 90px;    float: right;">
    <?php if($esc_frag==0) { ?>
<script type="text/javascript">
$(document).ready(function(){
$(".plink").click(function(){
elementClick = $(".plink").attr("href");
destination = $('#line_r').offset();
var id_elem = $(this).attr("id");
 $.ajax({
url: "info_f_result.php?id=<?php echo $_REQUEST['id'];?>&page="+id_elem,
cache: false,
type:'POST',
data:$("#filter").serializeArray(),
beforeSend: function() {
$('#result').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>');},
success: function(html) {
$("#result").html(html);
window.history.pushState(null, null, 'http://base.vseti-goroda.ru/info_f.php?id=<?php echo $_REQUEST['id'];?>&page='+id_elem);
 $('body').animate( { scrollTop: destination }, 750 );
}});});});
</script>
<?php if(!$_GET[ki]) { ?><?php if($f_info==false) { ?> <?php if($_GET[area]==false) { ?><h4>  В данной подкатегории нет объявлений 
<div class="home_msg_but2"><?php if(!$_userid) { ?><a href="member.php?act=register" class="dark-color active-hover"><?php } else { ?><a href="post.php" class="dark-color active-hover"><?php } ?>Добавить объявление</a></div></h4>
<?php } ?> <?php } ?><?php if($_GET[area]<>0) { ?> <?php if($f_info==false) { ?><h4>  В данном регионе нет объявлений 
<div class="home_msg_but2"><?php if(!$_userid) { ?><a href="member.php?act=register" class="dark-color active-hover"><?php } else { ?><a href="post.php" class="dark-color active-hover"><?php } ?>Добавить объявление</a></div></h4>
<?php } ?> <?php } ?><?php } ?>
<?php if(is_array($f_info)) foreach($f_info AS $val) { ?>  
<div class="product_card_barax hover_t">
<div class="product_card_bolt clearfix">
<?php if($val[is_pro]) { ?>
<div class="ribbon-small ribbon-red">
<div class="ribbon-inner">
<span class="ribbon-text"><?php echo $L['recom'];?></span>
<span class="ribbon-aligner"></span>               
</div></div><?php } ?> 
<div class="product_baraoll_img" >
<a class="product_bar_img" href="<?php echo $val['url'];?>" >
<?php if($val[thumb]) { ?>
<img src="<?php echo $val['thumb'];?>" alt="<?php echo $val['title'];?>" style="margin-top:0px;" />
<?php } else { ?>
<img src="images/ico/no_images.png" alt="<?php echo $val['title'];?>" />
<?php } ?></a></div>
<div class="product_card_baraoll">
<h3 ><a href="<?php echo $val['url'];?>">
<strong><?php echo cut_str($val[title], 80, '...');?></strong>
</h3>
<div class="product_card_baraoll_descript">
<strong><?php echo cut_str($val[description], 120, '...');?></strong>
</div></div>
<div class="product_card_baraoll_price" ><?php if($val[price]) { ?>
<strong><?php echo number_format($val[price], 0, '.', ' ');?> <?php echo $val['unit'];?><span>RUR</span>    </strong><?php } ?>
<span class="bar_footer_area">
<?php echo $val['areaname'];?></span>
</div></a>
<span class="barti_footer_area">
<?php echo $val['postdate'];?></span>
<div class="prod_kup">
<strong><?php if($val[bs]==2) { ?>куплю<?php } else { ?>продам<?php } ?></strong></div></div></div>

<?php } ?>

<div class="pagelink"><?php for ($j = 1; $j<$pages; $j++) {
if ($j>=$start && $j<=$end) {
if ($j==($page+1)) echo '<a id="' . $j . '" class="plink" href="#"><strong style="color: #72849c;font-weight: 600;font-size: 20px;">' . $j . 
        '</strong></a> &nbsp; ';
else echo '<a id="' . $j . '" class="plink" href="#">' . $j . '</a> &nbsp; ';}
} ?>
</div>
<?php } else { ?>
<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"/><?php } ?>
</div>
<div class="filter_navi"><ul >
<?php if(is_array($catss)) foreach($catss AS $cat) { ?>
<li class="cat_lev_barah"><strong><i class="<?php echo $cat['catimg'];?>"></i><?php echo $cat['catname'];?></strong><div class="cat_lev_tu">
<?php if(is_array($cat[children])) foreach($cat[children] AS $child) { ?>
<ul>
<li><a href="<?php echo $child['url'];?><?php if(!empty($areaid)) { ?>&area=<?php echo $areaid;?><?php } ?>"><?php echo $child['name'];?></a></li>
</ul>
<?php } ?>
</div>
</li>
<?php } ?>
</ul>
<a href="member.php" class="dovl_city ">Разместить объвление </a>
</div></div></div><div id= "toTop" > ^ Наверх </div>

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