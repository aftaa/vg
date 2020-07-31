<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?>
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
</script> 