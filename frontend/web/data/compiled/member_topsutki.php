<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><script type="text/javascript">
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
document.getElementById('tet').style.display="block";
} );
</script>

    <h2 class="zagalovok"><div data-content="member.php?act=com" id="back" class="goback" style="width: 40px;"><i class="icon-reply"></i></div>Добавление топовых суток</h2>
   <div class="top_strok"><span>Введите требуемое колличество топовых суток</span><input onkeyup="www();" id="topsutki"> </input></div>
     <div class="top_strok"><span>Итоговая сумма ( руб. )</span>  <input id="itog"> </input></div>
     <button onclick="topsut();" class="button_nulik" style="margin-left: 10px;">Оплатить</button>
     <div id="tet" style="display:none;">Топовые сутки добавлены. Остаток на счете = <?php echo $new_money;?> ТОП = <?php echo $new_gold;?></div>
<script type="text/javascript">
var comid =  "<?php echo 	$comid;?>";
var money =   "<?php echo   $money;?>";
var nmoney =   "<?php echo   $new_money;?>";
function topsut(){
   var tsts = document.getElementById('itog');
   var tst = document.getElementById('topsutki');
$.ajax({
url:"member.php?act=topsutki&tt=1&sum="+tsts.value+"&sutki="+tst.value,
cache: false,
type:'POST',
beforeSend: function(html) { // действие перед отправлением
$('#result').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"/>');
},
success: function(html) {
 $("#result").html(html);
  $("#nom").html(nmoney);
}});


}

function www(){
var tt = document.getElementById('topsutki');
   tt.value = tt.value.replace(/[^\d]/g, '');    
   if(tt.value==''){document.getElementById('itog').value = '';}
   var tts = document.getElementById('itog');
   if(tts.value=='NaN'){document.getElementById('itog').value = ''; document.getElementById('topsutki').value = '';}
}

$(document).ready(function(){
var tt = document.getElementById('topsutki');
   tt.value = tt.value.replace(/[^\d]/g, '');
tt.oninput = function() {
   var out = tt.value*1;
      if(money<out){alert("Не хватает денег!");  document.getElementById('itog').value = ''; document.getElementById('topsutki').value = ''; return false;}
   document.getElementById('itog').value = out.toFixed(2);

}
});
</script>   