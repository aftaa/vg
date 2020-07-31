<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><!DOCTYPE html>
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
    <head>
<meta charset="<?php echo $charset;?>">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
<script type='text/javascript' src='js/jquery.js'></script>
<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery-latest.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('.back').click(function(){
$.ajax({url: "area_spis.php?act=start_page",
cache: false,
beforeSend: function() {
$('#div_cont').html('');},
success: function(html){
document.title = "<?php echo $L['about'];?> - <?php echo $CFG['webname'];?>";
$("#div_cont").html(html);
$("#div_cont").css({
'height':'auto',});}});
return false;});
});</script>
<script type="text/javascript">
$(document).ready(function(){
function ajax_fil(link){
$.ajax({
url: "area_spis.php?act=region&id=<?php echo $_REQUEST['id'];?>&ki=<?php echo $_GET['ki'];?>&areaid="+link,
cache: false,
beforeSend: function() {
$('#div_cont').html('');},
success: function(html){
document.title = "<?php echo $L['about'];?> - <?php echo $CFG['webname'];?>";
$("#div_cont").html(html);
$("#div_cont").css({
'height':'auto',});}});}
$(".reg_link").click(function () {
var link=$(this).attr('id');
$(".reg_link").each(ajax_fil(link));});
$(".search_city").keyup(function () {
var link= "";
 $(".search_city").each(ajax_fil(link));});
});</script>
</head>
<body>
<?php if($act==start_page) { ?>
<div id="div_cont">
<?php if(is_array($area)) foreach($area AS $val) { ?><div  class='region' >
<a href="#" id="<?php echo $val['areaid'];?>" class='reg_link'><?php echo $val['areaname'];?></a>
<div class='clear'></div></div>
<?php } ?>

</div>  <?php } ?>
<?php if($act==region) { ?>
<div id="div_cont">
<a href="area_spis.php?act=start_page&id=<?php echo $_GET['id'];?>"  class='back' ><i class="icon-reply"></i>Назад</a>
<?php if($id>0) { ?>
<?php if(is_array($areach)) foreach($areach AS $val) { ?><div  class='region'>
<a href="<?php if($tip==free) { ?>info_free.php?id=<?php echo $_GET['id'];?>&area=<?php echo $val['areaid'];?><?php } else { ?>com.php?id=<?php echo $_GET['id'];?>&area=<?php echo $val['areaid'];?><?php } ?>" class='reg_link1'><?php echo $val['areaname'];?></a> 
</div>
<?php } ?>

<?php } ?>
<?php if($ki>0) { ?>
<?php if(is_array($areach)) foreach($areach AS $val) { ?><div  class='region'>
<a href="category.php?ki=<?php echo $_GET['ki'];?>&area=<?php echo $val['areaid'];?>" class='reg_link1'><?php echo $val['areaname'];?></a> 
</div>
<?php } ?>
<?php } ?>

<?php if($base==1) { ?>
<?php if(is_array($areach)) foreach($areach AS $val) { ?><div  class='region'>
<a href="<?php if($tip==free) { ?>info_f.php?id=<?php echo $_GET['id'];?>&area=<?php echo $val['areaid'];?><?php } else { ?>com.php?id=<?php echo $_GET['id'];?>&area=<?php echo $val['areaid'];?><?php } ?>" class='reg_link1'><?php echo $val['areaname'];?></a> 
</div>
<?php } ?>
<?php } ?></div>
<?php } ?>
</body>
</html>