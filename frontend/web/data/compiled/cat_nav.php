<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><script type="text/javascript">
function levls(levl,catid,catname){
    if(catname=="back"){levl=levl-2;}
if(levl==3){
$.ajax({
url: "member.php?act=info_l&cat="+catid+"&lvl="+levl+"&catname="+catname,
cache: false,
type:'POST',
data:$("#filter").serializeArray(),
beforeSend: function() {
$('#result').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>');},
success: function(html) {
$("#result").html(html);
}});    
}else{

$.ajax({
url: "member.php?act=info_cat&lvl="+levl+"&cat="+catid+"&back="+catname,
cache: false,
type:'POST',
data:$("#filter").serializeArray(),
beforeSend: function() {
},
success: function(html) {
$("#catfil").html(html);
}});
}}

function inviz(){
     var elem = document.getElementById('catfil');
    elem.style.display = "none";
}

</script>
<div id="cat">
    <?php if(is_array($ferst_lvl)) foreach($ferst_lvl AS $e) { ?>
    <a id="ccx" onclick="levls(<?php echo $e['lvl'];?>,<?php echo $e['catid'];?>,'<?php echo $e['catname'];?>');" value="<?php echo $e['lvl'];?>"><?php echo $e['catname'];?></a>
    
<?php } ?>

     <div id="backlvl" onclick="levls(<?php echo $e['lvl'];?>,<?php echo $e['parentid'];?>,'back');" ><i class="icon-angle-left"></i></div>
     <div id="inviz" onclick="inviz();" ><i class="icon-remove"></i></div>
    </div>