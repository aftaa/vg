<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><?php if(is_array($images)) foreach($images AS $img) { ?>
<script type="text/javascript">var filename ="<?php echo $lll; ?>"</script> 
<script type="text/javascript">
$(document).ready(function(){
$('#javvses<?php echo $img['imgid'];?>').click(function(){
 if(filename=='member.php'){
        var urls = "member.php?act=delimg&imgid=<?php echo $img['imgid'];?>";
    }else{
var urls ="/delimage.php?id=<?php echo $img['imgid'];?>#product";}
$.ajax({
   url: urls,
cache: false,
beforeSend: function() {
$('#delimg').html('<img class="loading"  src="templates/<?php echo $CFG['tplname'];?>/images/load.gif"></>');
},
success: function(html){
$("#delimg").html(html);
$(".cd-tabs-content1").css({
  'height':'auto',
});
}
});
return false;
});
});</script>

<?php } ?>

<div id="delimg">       
<label >Ваши фото из фотогалереи   </label>
<ul><?php if(is_array($images)) foreach($images AS $img) { ?>
<li><div class="phot_img"><img  src="<?php echo $img['path'];?>"><a href="#"  id="javvses<?php echo $img['imgid'];?>" class='toglcat1'><strong > Удалить </strong></a></div></li>

<?php } ?>
 
<div class="clear"></div>
</ul>
 <label for="content" class="middle-color"></label>
<div class="img_input" >
<div class="im_gblok">
<?php if(is_array($massiv)) foreach($massiv AS $i) { ?>
<input type="file" class="batton-normal custom_input1" name="file<?php echo $i;?>" id="file<?php echo $i;?>" onchange="tstFile(this)" multiple="true">&nbsp;

<?php } ?>
 <script type="text/javascript">var ii ="<?php echo $i; ?>"</script>  <div class="clear"></div>
</div>
</div></div>