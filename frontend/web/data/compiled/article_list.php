<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><!DOCTYPE html>
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="<?php echo $charset;?>">
        <title>Новости компаний</title>
        <meta name="viewport" content="width=device-width,initial-scale=0.7,minimum-scale=0.2,maximum-scale=0.9">
        <meta name="description" content="Новости, события компаний каталога">
        <meta name="keywords" content="Компрессор, инструмент, интернет магазин, гарантия, производство, качество ">
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/unsemantic_v_2.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/font-awesome/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/head3.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/base_v_4.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/osx1.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/article_v_4.css" type="text/css">
        </head>
        <body class="body-background2 content-font">
        
<?php include template(top); ?>
  
 <script type="text/javascript">  
 var wert=1;
 var wer=2;
//запуск функции при прокрутке
function clickss() {
  $.ajax({
url:"more_article.php",
data:"id1s="+wert,
type : "POST",
success: function (data) {
$("#My11").html(data);
},
error: function(){
alert ("No PHP script: ");
}
})
document.getElementById('My11').style.display = 'block';
document.getElementById('wwww').style.display = 'none';
}
</script>
<section class="page-content">
<div class="juti_compani" style="background-color: #efefef;">
<div class="vacancii_comk"><h2>События компаний</h2> </div>
<div class="news">
        <div class="block"> 
        <div class="news_1"><?php if(is_array($art)) foreach($art AS $d) { ?><a href="article.php?act=view&id=<?php echo $d['idnews'];?>">
        <div class="news_1_imge">
            <div class='news_1_title'><?php echo cut_str($d[title], 65, '');?>
        <div class='news_1_des'><?php echo cut_str($d[intro], 150, '');?></div>
        </div>
        <div class="news_1_imge_bl"><div class="news_1_imge_blolo">
        <img src="<?php echo $d['thumb'];?>"></div>
        </div></div>
        <div class='news_1_date'><?php echo $d['addtime'];?></div>
        </a> 
<?php } ?>
</div>
        <div class="nuju">  <?php if(is_array($art1)) foreach($art1 AS $d1) { ?>                     
        <div class="news_2"><a href="article.php?act=view&id=<?php echo $d1['idnews'];?>">
        <div class="news_2_imge">
        <div class='news_2_title'><?php echo cut_str($d1[title], 55, '');?>
        <div class='news_2_des'><?php echo cut_str($d1[intro], 93, '');?></div></div>    
        <div class="news_2_imge_bl">
        <img src="<?php echo $d1['thumb'];?>" ></div>
        </div>
        </a>
        <div class="com_ne"> <a href="com_str.php?id=<?php echo $d1['comid'];?>" ><?php echo $d1['comname'];?></a></div>
        <div class='news_2_date'><?php echo $d1['addtime'];?>
        </div>
        </div> 
<?php } ?>
 </div> 
        </div>   
        <div class="news_left">
        <div class="tops">
             <?php if(is_array($topnews)) foreach($topnews AS $d) { ?>
        <div class="tops_blok hover_t" ><a href="article.php?act=view&id=<?php echo $d['idnews'];?>">
        <div class="tops_img">
        <div class="tops_img_cl"><img src="<?php echo $d['thumb'];?>"></div></div>
        <div class="topsik_news"><?php echo $d['newsname'];?></div></a>
        <a href="com_str.php?id=<?php echo $d['comid'];?>"><div class="topsik_com"><?php echo $d['newscomname'];?></div></a>
        </div>    
 
<?php } ?>
  
        </div>                            
        <?php if(is_array($arta1)) foreach($arta1 AS $da2) { ?>                     
        <div class="newsa_2 hover_t">
        <div class=zas>
        <a href="com_str.php?id=<?php echo $da2['comid'];?>"><div class="zas_img">
        <div class="zas_img_blok " ><img alt="<?php echo $da2['comname'];?>"   src="<?php echo $da2['thumb1'];?>" width="44" height="44"></div></div>
        <div class="newsa_2_com"><?php echo $da2['comname'];?>
        </a>
        </div>
        <div class="newsa_2_date"><?php echo $da2['addtime'];?></div>
        </div> 
        <a href="article.php?act=view&id=<?php echo $da2['idnews'];?>">
        <div class="newsa_2_imge">
        <div class="newsa_2_imge_bl">
        <img src="<?php echo $da2['thumb'];?>">
        </div> </div>
        <div class="newsa_2_title"><?php echo cut_str($da2[title], 70, '');?></div>
        <div class="newsa_2_desa"><?php echo cut_str($da2[intro], 138, '');?></div>
        <div class="prosmotr"><i class="icon-eye-open" tooltip="Просмотров"></i><span> <?php echo $da2['click'];?></span>
<i class="icon-comment"></i><span><?php echo $da2['count'];?></span><i class="icon-thumbs-up"></i><span> <?php echo $da2['like'];?></span>
</div>
        </a>
        </div> 
<?php } ?>
  
        </div><div class="top_bol" id="wwww"><a href=#!/morearticles onclick="clickss()">ещё новости</a></div> 
        <div id="My11" style="display:none"></div> 
        <div id= "toTop" > ^ Наверх </div>
        </section>
        
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