<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><!DOCTYPE html>
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="ru"> <!--<![endif]-->
<head>

<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/global_v_2.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/view_v_2.css" type="text/css">
<script type="text/javascript">
$(document).ready(function(){
$(".plink").click(function(){
var elementClick = $(".plink").attr("href");
var destination = $('.menu').offset().top;
var id_elem = $(this).attr("id");
 $.ajax({
url: "com_view_r.php?catid=<?php echo $_GET['catid'];?>&page="+id_elem,
type:'POST',
data:$("#filter").serializeArray(),
beforeSend: function() {
$('#tovar_1').html('<img class="loading"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>');},
success: function(html) {
$("#tovar_1").html(html);
window.history.pushState(null, null, '/com_view_r.php?id=<?php echo $_REQUEST['catid'];?>&page='+id_elem);
$('body').animate( { scrollTop: destination }, 750 );
}});});});
</script>

<?php if(is_array($c_info)) foreach($c_info AS $i => $val) { ?>
<script>
$(document).ready(function() { 
$('.fancybox<?php echo $val['id'];?>').fancybox(); }); 
</script>

<?php } ?>


</head>
<body class="body-background2 content-font dark-color lock">
    
    
<div id="tovar_1">
<div class='tovar_4_com' >
<?php if(is_array($c_info)) foreach($c_info AS $val) { ?> 
<div class="product_card hover_t" >
<div class="product_card_1" >
<div class="product_card_img">
<a class="fancybox<?php echo $val['id'];?> fancybox.ajax"    href="view_modal.php?id=<?php echo $val['id'];?>&us=<?php echo $comid;?>" onclick="shows('id')" alt="<?php echo $val['title'];?>" >
<?php if($val[thumb]) { ?> 
<img src="<?php echo $val['thumb'];?>" alt="<?php echo $val['title'];?>" />
<?php } else { ?>
<img src="images/ico/no_images.png" alt="<?php echo $val['title'];?>" />
<?php } ?></a></div>
<div  class="product_card_title">      
<h3 class="product_title" >
<a class="fancybox<?php echo $val['id'];?> fancybox.ajax"   href="view_modal.php?id=<?php echo $val['id'];?>&us=<?php echo $comid;?>" onclick="shows('id')"  ><?php echo $val['title'];?></a>
</h3>
</div>
<script type="text/javascript">
chng=function shows(id){
window.last=$(this).attr('href');
$('#overlay').load(last); return false; }
var div = document.getElementById("tovar_1");
links=div.getElementsByTagName("a")
for(i in links) {if(!/\d+/.test(i)) break; links[i].onclick=chng}
</script>
<div class="product_price" style='background-color:transparent'>
<?php if(!$val[price] || $val[price]==0) { ?><div class="no_cens">Цену уточняйте</div><?php } else { ?>
<div>
<strong><?php echo number_format($val[price], 0, '.', ' ');?> <?php echo $val['unit'];?><?php if(!$val[unit]) { ?><span>RUR</span><?php } ?></strong>
</div><?php } ?></div></div>
</div>
<?php } ?>
<div style="clear:both;"></div>
<div class="com_page"><div class="pagelink"><?php for ($j = 1; $j<$pages; $j++) {
if ($j>=$start && $j<=$end) {
if ($j==($page+1)) echo '<a id="' . $j . '" class="plink" href="#"><strong style=" color: #72849c;font-weight: 600;font-size: 20px;    line-height: 1.2em;">' . $j . '</strong></a> &nbsp; ';
else echo '<a id="' . $j . '" class="plink" href="#">' . $j . '</a> &nbsp; '; }} ?></div></div>    
</div></div></body></html>