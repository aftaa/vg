<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?> 
 
<script type="text/javascript">
function disp(wwq)
{

var ff=0;
 //   $(document).ready(function(){var sch,h3;sch=$('#all_links>li').length;h3=((sch*27)/2)+20;$('.toglecat').click(function(){if($(".all_cat").css('opacity')=='0'){$(".all_cat").animate({opacity:1,},50);$(".all_cat").css({'display':'block'})}else{$(".all_cat").animate({opacity:0,},1);$(".all_cat").css({'display':'none'})}});$('.close_link').click(function(){$(".all_cat").animate({opacity:0,},1);$(".all_cat").css({'display':'none'})});$(document).click(function(e){if($(".all_cat").css('opacity')=='1'){var div=$("#fj");if(!div.is(e.target)&&div.has(e.target).length===0){$("#fj").animate({opacity:0,},1);$("#fj").css({'display':'none'});return true}}})});
$.ajax({
url:"sec_lvl.php?lvl=1&id="+wwq,
data:"wert="+ff,
type : "POST",
success: function (data) {
$("#fj").html(data);
},
error: function(){
alert ("No PHP script: ");

}

})
}


</script>
 
 <?php if($_GET['lvl']==2) { ?> <?php if($_GET['lvl']<>1) { ?>
<div id='fj1'>
<div class="disp_cat">
<a onclick="disp(<?php echo $comid;?>)" style="font-weight: 400;    padding: 5px 26px 5px 14px;border-radius: 2px;"><img src="images/two_baeak.png" style="    width: 9px;margin-right: 6px;">Назад</a></div>  
<?php if(is_array($caty12)) foreach($caty12 AS $aq) { ?>

<a  id="<?php echo $aq['catid'];?>"  style="color: #000;width:50%;float:left;" onclick="ajax_fil(<?php echo $aq['catid'];?>,<?php echo $comid;?>)"><?php echo $aq['catname'];?></a>


<?php } ?>

</div>
<?php } ?><?php } ?>
 <?php if($_GET['lvl']==1) { ?>
 
<div id='fjs'>
<ul id="all_links">
<?php if(is_array($catys)) foreach($catys AS $aw) { ?>  

<li class="close_link"><a rel="nofollow"  id="<?php echo $aw['catid'];?>"  style="color: #000;" onclick="wwe(<?php echo $aw['catid'];?>,<?php echo $comid;?>)"><?php echo $aw['catname'];?></a> </li>

<?php } ?>

</ul></div>
<?php } ?>
