<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><script type="text/javascript">
function ajax_fil1(url_v1){
    var tt ="postcom.php";
    if(!comid && url_v1!=tt){alert("Сначала нужно добавить компанию"); return false;}
$.ajax({
url:url_v1,
cache: false,
type:'POST',
beforeSend: function(html) { // действие перед отправлением
$('#result').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"/>');
},
success: function(html) {
 $("#result").html(html);
}});}
$("#back").click(function(){ 
var url_v1=$(this).attr('data-content');
$("#result").each(ajax_fil1(url_v1));
} );
</script>
<h2 class="zagalovok"><div data-content="member.php?act=com" id="back" class="goback" style="width: 40px;"><i class="icon-reply"></i></div>Вакансии компании </h2>             
<div class=" cream-bg">
<div class="well-table ">
<div class="well-box grid-5" style="width: 10%;"><strong class="strong_ad">ID</strong></div>
<div class="well-box grid-35"><strong class="strong_ad"><?php echo $L['name'];?></strong></div>
<div class="well-box grid-15"><strong class="strong_ad"><?php echo $L['date'];?></strong></div>
<div class="well-box grid-15 last active-color t_c"><strong style="    margin-left: -17px;" class="strong_ad"><?php echo $L['management'];?></strong></div>
</div>
<?php if(is_array($vacancy)) foreach($vacancy AS $val) { ?>
<div class="well_tovar">
<div class="well_id"><?php echo $val['vacid'];?></div>
<div class="well_tovar_title">
<a href="com_str.php?id=<?php echo $val['comid'];?>" target="_blank"><?php echo $val['name'];?></a>
</div>
<div class="well_tovar_data"><?php echo $val['postdata'];?></div>
<div class="well_tovar_upr">
<div class="vac_nav" data-content="member.php?act=editvac&id=<?php echo $val['vacid'];?>" ><i class="icon-pencil"></i></div>
<div class="vac_nav" data-content="member.php?act=del_vac&id=<?php echo $val['vacid'];?>" value="del" ><i class="icon-remove"></i></div>
</div></div>
<?php } ?>

<div class="topmargin10"></div><div class="topmargin10"></div>
<div class="add_new "><div class="vac_nav" data-content="add_vac.php?act=addvac">Добавить вакансию</div></div>
<div class="pois">
<span><i class="icon-pencil"></i>- Редактировать вакансию</span>
<span><i class="icon-remove"></i>- Удалить вакансию</span>
</div>
 </div>  
<script type="text/javascript">                  
$(document).ready(function(){
    
function ajax_fil2(url_v2){
    
$.ajax({
url:url_v2,
cache: false,
type:'POST',
beforeSend: function(html) { // действие перед отправлением
$('#result').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"/>');
},
success: function(html) {
 $("#result").html(html);
}});}

$(".vac_nav").click(function(){ 
    var url_v2=$(this).attr('data-content');
     var uv=$(this).attr('value');
    if(uv=="del"){
    if(!confirm('Операция необратима. Хотите продолжить?')){return false;}}

$(".vac_nav").each(ajax_fil2(url_v2));

} );
});
</script> 