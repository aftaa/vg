<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><head>

</head>

<body class="body-background2 content-font dark-color lock">
<script type="text/javascript">
var nas;
var ff;
function wwe(ff,fff)
{
   $.ajax({
url:"sec_lvl.php?lvl=2&id="+fff,
data:"wert="+ff,
type : "POST",
success: function (data) {
    /*
var nas =[];
var as = data.split('QQ');
var asid = as[0].split(' ');
var asname = as[1].split('WW');
for( var i=0; i<asid.length; i++){
    //обрабатывать здеся!!!!
   nas[i]='<a href="category.php?id='+asid[i]+'">'+asname[i]+'</a><br>'; 
}
nas[i+1]='<a href=# style=" float: right;" onclick="Show('+s1+')"> close</a>';
//document.getElementById('MyText').innerHTML = data;
*/
//alert ("sucess PHP script: "+data);
$("#fj").html(data);
},
error: function(){
alert ("No PHP script: ");

}

}) 
    
}
</script>
<?php if($char) { ?><li data-content="product" style='padding:0px;color:#51403e'>
<div class="menu" >
<div id='fj' class="all_cat">
<ul id="all_links">
<?php if(is_array($catys)) foreach($catys AS $aw) { ?>  

<li class="close_link"><a rel="nofollow"  id="<?php echo $aw['catid'];?>"  style="color: #000;" onclick="wwe(<?php echo $aw['catid'];?>,<?php echo $comid;?>)"><?php echo $aw['catname'];?></a> </li>

<?php } ?>

</ul></div>


<ul class='toglcat1'>
<li> <a rel="nofollow" href="#"   class="toglecat"><strong ><i class="icon-th-large"></i>Категории продавца </strong></a> </li>
<li > <a rel="nofollow"   id="javvse" class='toglcat1'><strong >Все товары</strong></a> </li></ul>
<div class="corti">
<div class="sortirovka"><span style="float:left">Сортировать : по цене</span>
<form id="filter"   name="sort_in" action="" method="post" style="    margin-top: -2px;width: 310px;float: left;">
<input id="search" class="search" type="text" name="search" value="" placeholder="Поиск">
<input id="comid" class="comid" type="text" name="comid" value="<?php echo $_GET['id'];?>" style="display:none">
<input id="catid" class="catid" type="text" name="catid" value="" style="display:none">
<input id="sortf3" class="sort_input" type="radio" name="orderby" value="ORDER BY price DESC" style="display:none" ><label for="sortf3"><i class="icon-long-arrow-up sort"></i></label>
<input id="sortf4" class="sort_input" type="radio" name="orderby" value="ORDER BY price ASC" style="display:none" ><label for="sortf4"><i class="icon-long-arrow-down sort"></i></label>
<div style="display:none;">
<input class="kup_imput" type="text"  name="id" value="<?php echo $_GET['id'];?>" />
</div></form></div></div></div>
<div id="divContent" style="height: auto;float: left;width:100%"></div> 
<div style="clear:both;"></div></li><?php } ?>


<?php if($news || $comimg) { ?>
<li data-content="news" id='news1'   style='color:#51403e'>
<div class="news_block">
<div class="com_widi" style="margin-top: -2px;"> 
<div class="com_widi_ol" ><div class="com_widi_vidi">Фотогалерея</div>
<div class="galery">
<div id="content"><div id="modal-background"></div><div class="modal-content">
<div class="imageDisplay"><div class="btnModal-left"></div>
<div class="btnModal-right"></div></div>
<div class="modal-close"></div><div class="imageDisplay-wrapper">
<img class="img_mod" src="<?php echo $img['path'];?>"></div></div>
<ul class="gallery">
<?php if($comimg) { ?><?php if(is_array($comimg)) foreach($comimg AS $img) { ?>
<li><div class="gal_1"><img class="mokn" src="<?php echo $img['path'];?>" alt=""></div></li>
<?php } ?>

<?php } else { ?>
<div class="gal_1" style="display:none">Упс.. нет изображений :( </div>
<?php } ?></ul></div></div></div>
<div class="com_widi"> <div class="menu_news"><div id="com_left" style="width: 100px;height: 88px;float: left;margin-top: 0px;mgin-left: 0px;border: none;"> 
<script type="text/javascript">
var TN = '<?php echo $comid;?>';
function video_add(d){
    alert(d);
    if(d){var urll1="pogoda.php?del=1&ssy="+d+"&comid="+TN;}
   if(!d){ var years = prompt('Вставте ссылку на видео из поисковой строки браузера(youtube):');}
   if(!d){var urll1='pogoda.php?message='+years+'&comid='+TN;}
    if(years || d){
        alert(urll1);
    var message = encodeURIComponent('Hello, server!');
     $.ajax({
        url: urll1,
        data: TN,
        processData: false,
        contentType: false,
        type: 'POST',
beforeSend: function() {
$('#res_block').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>');},
success: function(html) {
$("#youtub").html(html);
}
    });}
}
</script>
</div></div>
<div id="youtub"  class="com_widi_ol" style="    padding-bottom: 2px;" >
<div class="com_widi_vidi">Видео  <?php if($_userid==$com_info['userid']) { ?> <button onclick="video_add();" class="but_vidi" >Добавить</button><?php } ?></div>
<?php if($yout) { ?>
<?php if(is_array($yout)) foreach($yout AS $i => $er) { ?><?php if($i==0) { ?>
<div  class="news_img" style="width: 362px;height: 160px;margin-bottom: 4px; "><?php if($er<>false) { ?><iframe width="100%" height="100%" src=<?php echo $er;?> frameborder="0" allowfullscreen></iframe><?php } ?><?php if($er==false) { ?><?php } ?></div><br><?php if($er<>false) { ?><?php if($_userid==$com_info['userid']) { ?><div class="vuid"><a class="del_vidi"  onclick="video_add('<?php echo $er;?>');"  >Удалить <?php echo $i;?></a></div><?php } ?><?php } ?>
<?php } ?>
<?php if($i==1) { ?>
<div class="news_img" style="width: 180px;height: 100px;
float: left;  "><?php if($er<>false) { ?><iframe width="180" height="100" src=<?php echo $er;?> frameborder="0" allowfullscreen></iframe><?php if($_userid==$com_info['userid']) { ?><a class="del_vidi" href="#"  onclick="video_add();">Удалить<?php echo $i;?></a><?php } ?><?php } ?><?php if($er==false) { ?>Нет видиофайлов<?php } ?></div>
<?php } ?>
<?php if($i==2) { ?>
<div class="news_img" style="width: 180px;height: 100px;
float: right;  "><?php if($er<>false) { ?><iframe width="180" height="100" src=<?php echo $er;?> frameborder="0" allowfullscreen></iframe><?php if($_userid==$com_info['userid']) { ?><a class="del_vidi"  href="#" onclick="video_add();">Удалить<?php echo $i;?></a><?php } ?><?php } ?><?php if($er==false) { ?>Нет видиофайлов<?php } ?></div>
<?php } ?>
<?php } ?>

<?php } ?></div></div></div>
<?php if($news) { ?>
<?php if(is_array($news)) foreach($news AS $val) { ?>
<div class="news_card " id="<?php echo $val['idnews'];?>"><a rel="nofollow" href="#">
<div class="news_card_com" style="padding: 0px 0 4px;">
<div id="com_img"> 
<div id="info_com"><div id="info_com_1" style="width: 60px;height: 44px;">
<?php if($thumb) { ?>             
<img style="max-width: 60px; max-height: 44px;" src="<?php echo $thumb;?>" alt="<?php echo $comname;?>" itemprop="logo"/></div>
<?php } else { ?>
<img style="max-width: 60px; max-height: 44px;" src="images/ico/no_img.gif" alt="<?php echo $comname;?>" itemprop="logo"/></div>
<?php } ?></div></div>
<div class="tit_im"><?php echo $comname;?></div><p style="font-size: 11px;"><?php echo $val['postdate'];?></div>
<div class="news_img"><div class="news_img_rtu">
<img alt="<?php echo $val['newsname'];?>"   src="<?php echo $val['thumb'];?>"></div></div>
<h3 class="news_title active-hover"><?php echo cut_str($val[newsname], 90, '...');?></h3>
<div class="news_des"><p style="    margin-bottom: 0px;"><?php echo $val['intro'];?></p></div>
</a></div>
<?php } ?>

<?php } else { ?>
<div class="news_card " id="add_news"><?php if($_userid==$com_info['userid']) { ?><a rel="nofollow" href="add_new.php?act=addnew" class="dark-color dark-hover" style="    font-size: 13px;background: #eee;padding: 2px 15px 3px 15px;">Добавить новость</a>
<?php } else { ?>Нет новостей<?php } ?></div>
<?php } ?></li><?php } ?>


<?php if($vac) { ?>
<li data-content="vacancy" id='vacancy'>
<div class="vacansii_card">
<?php if(is_array($vac)) foreach($vac AS $val) { ?>
<div class="vac_card " id="<?php echo $val['vacid'];?>">
<div class="vac_img"><div class="vac_im_blo"><img src="data/com/thumb/tumbik.png"></div></div>
<div id="info<?php echo $val['vacid'];?>" class="vac_title"><?php echo $val['name'];?></div>
<div class="vac_exp">Опыт работы: <?php echo $val['experience'];?></div>
<div class="vac_payment">з/п<?php if($val[paymentby] && $val[paymentto]) { ?> от <?php echo $val['paymentby'];?> до <?php echo $val['paymentto'];?> руб <?php } else { ?> <?php echo $val['paymentby'];?><?php echo $val['paymentto'];?> руб<?php } ?></div>
<div id="vac_des<?php echo $val['vacid'];?>" class="vac_des "><p style="margin-bottom:0px"><?php echo $val['content'];?></p> </div>
<div id="vac_alldes<?php echo $val['vacid'];?>" class=" vac_alldes"><div class="vac_h2">Обязаности</div><p class="duty"><?php echo $val['duty'];?> <?php if(!$val[duty]) { ?>Не указано<?php } ?></p>
<div class="vac_h2">Требования</div><p class="spec"><?php echo $val['spec'];?><?php if(!$val[spec]) { ?>Не указано<?php } ?></p>
<div class="vac_h2">Условия</div><p class="conditions"><?php echo $val['conditions'];?><?php if(!$val[conditions]) { ?>Не указано<?php } ?></p>
<div class="vac_h2 con_m">Контактная информация</div><p class="conditions con_m" style="margin-bottom :15px">e-mail: <?php echo $val['email'];?><?php if(!$val[email]) { ?>Не указано<?php } ?></p>
<div style="clear:both;"></div></div>
<div class="cont">
<div class="vac_linkman"><?php echo $val['linkman'];?><?php if(!$val[linkman]) { ?>Не указано<?php } ?></div>
<div class="vac_phone"><?php echo $val['phone'];?><?php if(!$val[phone]) { ?>Не указано<?php } ?></div>
<div class="vac_area"><?php echo $areaname;?></div>
</div></div>
<?php } ?>
</div>
<div style="clear:both;"></div>
</li><?php } ?>

</body>