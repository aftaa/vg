<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><script type="text/javascript">                  
$(document).ready(function(){
function ajax_select_lv(e){
e.preventDefault();
var msg   = $('#goadded').serialize();
 $.ajax({
url: "member.php?act=top",
cache: false,
type:'POST',
data:msg,
beforeSend: function() {
$('#res_block').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>');},
success: function(html) {
$("#res_block").html(html);
alert("Товар добавлен в ТОП");
}});}
$(function(){
$('#goadded').on('submit', ajax_select_lv);
});
});
</script> 
<script type="text/javascript">
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
$("#back").click(function(){ 
var url_v1=$(this).attr('data-content');
$("#result").each(ajax_fil1(url_v1));
} );
</script>
<div id="result">
<div id="res_block">
    

<form id="goadded" class="content-form margin-bottom" name="form" action="member.php?act=top" method="post" autocomplete="off" style="    float: left;    margin-bottom: 10px!important;">
<h2 class="zagalovok"><div data-content="member.php?act=info" id="back" class="goback"  style="width: 40px;    margin: -2px 0px 0px 0px;"><i class="icon-reply"></i></div>
ПОДНЯТИЕ В ТОП ТОВАРА <a href="view.php?id=<?php echo $info['id'];?>" target="_blank"><?php echo $info['title'];?></a>
<?php if($CFG[info_top_gold]) { ?>
<span class="dar">Доступно топовых суток: <span class="st"><?php echo $user_info['gold'];?></span></span>
</h2>
<span class="marg5">Товар будет отображаться в случайном порядке в размещаемой категории в верхнем блоке топовых товаров, так же на главной странице в блоке 'Популярные товары'.</span>
<span class="marg5">По истечении срока оплаченной услуги, Ваш товар будет отображаться как обычное, согласно правилам сортировки</span>
<div class="tui_input tui_dop">
<label for="number" class="por" style="width:140px">Поднять в ТОП на: </label>
<input type="text" class="custom_input1 in_to" name="number" id="number" style="width:80px;float: left;" value="7"><label class="por" style="text-align: left;    padding: 6px 30px 0 10px !important;"><?php echo $L['days_min'];?></label>
 </div>
<?php } else { ?>
<p><span class="f_b f_gray px16"><?php echo $L['service_disabled'];?></span></p>
<?php } ?>
<?php if($CFG[info_top_gold]) { ?>
<input type="hidden" name="id" value="<?php echo $id;?>" />
<input type="hidden" name="top_type" value="1" />
<input type="hidden" name="pay" value="1" />
<?php if($user_info['gold']>0) { ?>
<input type="submit" id="submit" name="submit" class="button_nulik" value="<?php echo $L['payment_go'];?>" style="margin: 20px 0px 0px 0px;" />
<?php } else { ?>
<span class="button_nulik"><?php echo $L['balance_not_afford'];?></span>
<?php } ?>
<?php } ?>
</form>
</div>