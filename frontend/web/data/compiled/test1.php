<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?>
<?php if(is_array($fad)) foreach($fad AS $jav) { ?>
<script type="text/javascript">
$(document).ready(function(){
$('#javs<?php echo $jav;?>').click(function(){
$.ajax({
url: "/test1.php?id=<?php echo $comid;?>&page=<?php echo $jav;?>&fr=<?php echo $_REQUEST['fr'];?>#product",
cache: false,
beforeSend: function() {
$('#divContent').html('<img class="loading"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>');},
success: function(html){
$("#divContent").html(html);}});
return false;});});</script>

<?php } ?>
     

<?php if(is_array($info)) foreach($info AS $i => $val) { ?>
<script>
$(document).ready(function() { 
$('.fancybox<?php echo $val['id'];?>').fancybox();}); 
</script>

<?php } ?>

<body class="body-background2 content-font dark-color lock" ".$body_onload." >
<div id="tovar_1">
<div class='tovar_4_com' >
<div><?php echo $catid;?></div>
<?php if($char) { ?>   
<?php if(is_array($info)) foreach($info AS $i => $val) { ?> 
<div class="product_card hover_t" >
<div class="product_card_1" >
<div class="product_card_img">
<a class="fancybox<?php echo $val['id'];?> fancybox.ajax"  href="view_modal.php?id=<?php echo $val['id'];?>&us=<?php echo $_GET['id'];?>" onclick="shows('id')"  alt="<?php echo $val['title'];?>"  >
<?php if($val[thumb]) { ?> 
<img src="<?php echo $val['thumb'];?>" alt="<?php echo $val['title'];?>" />
<?php } else { ?>
<img src="images/ico/no_images.png" alt="<?php echo $val['title'];?>" />
<?php } ?></a></div>
<div  class="product_card_title">      
<h3 class="product_title" >
<a class="fancybox<?php echo $val['id'];?> fancybox.ajax"  href="view_modal.php?id=<?php echo $val['id'];?>&us=<?php echo $_GET['id'];?>" onclick="shows('id')"  ><?php echo $val['title'];?></a>
</h3>
</div>
<script type="text/javascript">
chng=function shows(id){
  window.last=$(this).attr('href');
  $('#overlay').load(last); return false; 
}
 var div = document.getElementById("tovar_1");
links=div.getElementsByTagName("a")
for(i in links) {if(!/\d+/.test(i)) break; links[i].onclick=chng}
</script>
<div class="product_price" style='background-color:transparent'>
<?php if($val[price]) { ?>
<strong><?php echo number_format($val[price], 0, '.', ' ');?> <?php echo $val['unit'];?><?php if(!$val[unit]) { ?><span>RUR</span><?php } ?></strong>
<?php } ?></div>
<div class="prod_ctr fui-hover"><a  style="cursor: pointer;font-family: Segoe UI,Segoe WP,Arial,Sans-Serif;" class="dark-color fui-hover"><?php echo $val['catname'];?></a></div>
<div class="ob_footer"><span class="product-category middle-color dark-hover"style="padding:7px;"><?php echo $val['areaname'];?></span></div> 
</div>
</div>
<?php } ?>
<div style="clear:both;"></div>
<div class="com_page"><?php if(is_array($fad)) foreach($fad AS $jav) { ?>
<?php if($jav>=$start && $jav<$end) { ?>
<?php if($page<>$jav-1) { ?>
<a href="#product" id="javs<?php echo $jav;?>"><strong ><?php echo $jav;?></strong></a> &nbsp;
<?php } ?>
<?php if($page==$jav-1) { ?>
<a href="#product" style="    box-shadow: 0px 0px 0px 3px rgba(137, 73, 73, 0.3);" id="jav<?php echo $jav;?>"><strong ><?php echo $jav;?></strong></a> &nbsp;
<?php } ?><?php } ?>
<?php } ?>
</div>
</div><?php } ?></div>
</body></html>