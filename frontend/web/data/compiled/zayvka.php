<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><script type="text/javascript"> 
var znew =   0;
$(document).ready(function(){
      $("#zav").html(znew);
function ajax_fil(url_v){
$.ajax({
url:url_v,
cache: false,
type:'POST',
beforeSend: function(html) { // действие перед отправлением
$('#result').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"/>');
},
success: function(html) {
 $("#result").html(html);
}});}
$(".dartweyder").click(function(){ 
var del=$(this).attr('value'); 
if(del=="del"){if(!confirm('Операция необратима. Хотите продолжить?')){return false;}}
var url_v=$(this).attr('data-content');
$(".comm_data_post").each(ajax_fil(url_v));

} );

});
</script>   
   <div class="dartweyder" data-content="zayvka.php?id=<?php echo $tip;?>" id="pris">  Присланные  </div>   <div class="dartweyder" data-content="zayvka.php?id=<?php echo $tip;?>&otpr=1" id="otpr"> Отправленные </div>
<div class="page-block page-block-bottom cream-bg grid-container ">
<?php if(is_array($zayvka)) foreach($zayvka AS $n) { ?>
<div id="showcomment" class="zayvks">  
<div class="zayvks_blo"> 
<a href="view.php?id=<?php echo $n['infoid'];?>&us=<?php echo $n['userid_com'];?>"><div class="zayvks_str">Название товара: <span> <?php echo cut_str($n['zakname'], 50, '...');?></span></div> </a>
<div class="zayvks_str">Цена товара: <span><?php echo cut_str($n['price'], 50, '...');?></span></div> 
<div class="zayvks_str">Контактные данные заявителя: Фамилия - <span><?php echo cut_str($n['zfamily'], 50, '...');?></span> Имя - <span><?php echo cut_str($n['zname'], 50, '...');?></span>  Отчество - <span><?php echo cut_str($n['zparentname'], 50, '...');?></span></div> 
<div class="zayvks_str">Адрес - <span><?php echo cut_str($n['addres'], 50, '...');?></span></div>  
<div class="dartweyder dobs" value="del" data-content="zayvka.php?id=<?php echo $tip;?>&otpr=<?php echo $_GET['otpr'];?>&del=1&zid=<?php echo $n['id'];?>"><i class="icon-remove"></i> удалить</div>
<div class="zayvks_str"> Телефон - <span><?php echo cut_str($n['phone'], 50, '...');?></span></div> 
<?php if($_GET['otpr']==1) { ?><?php if($n['new']==1) { ?>Еще не прочитанно<?php } ?><?php } ?>
</div></div>

<?php } ?>

<?php if($zayvka==false) { ?>
<span class="za_yu">У вас нет заявок.</span>
<?php } ?>
</div>