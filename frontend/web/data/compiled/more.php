<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><script type="text/javascript"> 
  var wwer=3;
function more1(ssas){
  wwer=wwer+1;
$.ajax({
url:"more.php?id="+ssas,
data:"id1s="+wwer,
type : "POST",
success: function (data) {
$("#MyText"+ssas).html(data);
},
error: function(){
alert ("No PHP script: ");
}
})

document.getElementById('MyText'+ssas).style.display = 'block';
document.getElementById('but'+ssas).style.display = 'none';

}

</script>
<?php if(is_array($top_info1)) foreach($top_info1 AS $val1) { ?>
<div class="top_op hovermo-hover">
<a rel="nofollow" href="view.php?id=<?php echo $val1['id'];?>&us=<?php echo $val1['userid'];?>" class=" dark-color active-hover">
<div class="product_card_img"><div class="block_right_podim_totrig"><?php if($val1[thumb]) { ?><img class="lazy" src="images/smen_pol.gif" data-original="<?php echo $val1['thumb'];?>"    alt="<?php echo $val1['title'];?>"><?php } else { ?><img class="lazy" src="images/smen_pol.gif" data-original="images/ico/no_images.png"   alt="<?php echo $val1['title'];?>"><?php } ?></div></div>
<div class="product_name"><strong cols='10'><?php echo cut_str($val1['title'], 60, '');?></strong></div>
<div class="top_op_price"><?php echo $val1['price'];?> <?php echo $val1['unit'];?> <?php if(!$val1[unit]) { ?><span>RUR</span><?php } ?></div>
</a>
<div class="top_coms"><a href="com_str.php?id=<?php echo $val1['comid'];?>"><?php echo $val1['comname'];?></a></div>
</div>
<?php } ?>

<?php if(!$more) { ?>
<div class="top_bol" id="but<?php echo $val1['id'];?>"><a  onclick="more1(<?php echo $val1['id'];?>)"><span>Показать ещё</span></a></div><?php } ?>
 <?php if($more) { ?>
<div class="top_bol" id="but<?php echo $val1['id'];?>">В ТОПе больше нет!(</div>
<?php } ?>
</div>
<script type='text/javascript' src='js/jquery.js'></script> 
<script type="text/javascript" src="js/jquery.lazyload.min.js"></script> 
<script type="text/javascript">$("img.lazy").lazyload({threshold: 10, effect: "fadeIn"});</script>
<div id="MyText<?php echo $val1['id'];?>" style="display:none;">
   