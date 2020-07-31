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
<h2 class="zagalovok"><div data-content="member.php?act=com" id="back" class="goback" style="width: 40px;"><i class="icon-reply"></i></div>Новости компании</h2>             
<div class="well-table ">
<div class="well-box grid-5"  style="width: 10%;"><strong class="strong_ad">Фото</strong></div>
<div class="well-box grid-35"><strong><?php echo $L['name'];?></strong></div>
<div class="well-box grid-15"><strong ><?php echo $L['date'];?></strong></div>
<div class="well-box grid-15 last active-color t_c"><strong style="    margin-left: -17px;" class="strong_ad"><?php echo $L['management'];?></strong></div>
</div>
<?php if(is_array($news)) foreach($news AS $val) { ?>
<div class="well_tovar">
<div class="well_tovar_avblok"><div class="well_tovar_av"><?php if(!$val[thumb]) { ?><img src="images/ico/no_images.png"><?php } else { ?><img src="<?php echo $val['thumb'];?>"><?php } ?></div></div>
<div class="well_tovar_title">
<a href="article.php?act=view&id=<?php echo $val['idnews'];?>" target="_blank"><?php echo $val['newsname'];?></a>
</div>
<div class="well_tovar_data"> <?php echo $val['postdata'];?> </div>
<div class="well_tovar_upr">
<div class="news_nav"  data-content="member.php?act=editnews&id=<?php echo $val['idnews'];?>"><i class="icon-pencil"></i></div>
<div class="news_nav"  data-content="member.php?act=del_news&id=<?php echo $val['idnews'];?>" value="del" ><i class="icon-remove"></i></div>
<a class="news_nav" data-content="member.php?act=news_top&id=<?php echo $val['idnews'];?>"><i class="icon-circle-arrow-up"></i></a>
</div>
<span style="float: right;margin-top: 10px;margin-right: 35px;">Просмотры: 3</span>
<span style="float: right;margin-top: 10px;margin-right: 35px;"><?php if($val[toptime]>$now) { ?><i class="icon-circle-arrow-up"></i> до <?php echo $val['toptime_data'];?> <?php } ?></span>
</div>
<?php } ?>

 <div class="topmargin10"></div><div class="topmargin10"></div>
<div class="add_new"><div class="news_nav"  data-content="add_new.php?act=addnew" >Добавить новость</div></div>
<div class="pois">
<span><i class="icon-pencil"></i>- Редактировать новость</span>
<span><i class="icon-remove"></i>- Удалить новость</span>
<span><i class="icon-arrow-up"></i>- В ТОП</span>
</div>
<script type="text/javascript">                  
$(document).ready(function(){
function ajax_fil1(url_v1){
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

$(".news_nav").click(function(){ 
var uv=$(this).attr('value');
    if(uv=="del"){
    if(!confirm('Операция необратима. Хотите продолжить?')){return false;}}

var url_v1=$(this).attr('data-content');
$("#result").each(ajax_fil1(url_v1));

} );
});
</script> 