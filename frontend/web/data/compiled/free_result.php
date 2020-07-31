<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?>
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
<h3 ><a href="<?php echo $val['url'];?>" class="dark-color active-hover">
<strong><?php echo cut_str($val[title], 80, '...');?></strong>
</h3>
<div class="product_card_baraoll_descript">
<strong><?php echo cut_str($val[description], 120, '...');?></strong>
</div></div>
<div class="product_card_baraoll_price" ><?php if($val[price]) { ?>
<strong><?php echo number_format($val[price], 0, '.', ' ');?> <?php echo $val['unit'];?><span>RUR</span>    </strong><?php } ?>
<span class="bar_footer_area">
<?php echo $val['areaname'];?></span></div></a>

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