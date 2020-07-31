<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><script type="text/javascript">                  
function ajax_select_lv(e){
e.preventDefault();
var msg   = $('#form_post').serialize();
 var msg1 = new FormData;
//var msg1   = $('#form_post');
$('#form_post').find (' textarea, input, select').each(function() {
  // добавим новое свойство к объекту $data
  // имя свойства – значение атрибута name элемента
  // значение свойства – значение свойство value элемента
  var clickId = this.id;
 // msg1[clickId] = $(this).val();
    msg1.append(clickId, $(this).val());
});
 
var $input = $("#thumb");
   msg1.append('thumb', $input.prop('files')[0]);
  //fd.append('newsname', newsname.val());
     $.ajax({
        url: 'member.php?act=updatenews',
        data: msg1,
        processData: false,
        contentType: false,
        type: 'POST',
      //  data:msg,
beforeSend: function() {
$('#res_block').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>');},
success: function(html) {
$("#res_block").html(html);
}
    });
}
$(function(){
$('#form_post').on('submit', ajax_select_lv);
});
</script> 
<script type="text/javascript">
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
    <div id="res_block" > 
<form id="form_post" class="content-form" name="post" action="member.php?act=updatenews" method="post" enctype="multipart/form-data" onsubmit="">
<h2 class="zagalovok"><div data-content="member.php?act=new_list" id="back" class="goback" style="width: 40px;"><i class="icon-reply"></i></div>Редактирование новости</h2>
<div class="tov_input">
    <input type="text" style="display:none;" class="custom_input1 " value="<?php echo $idnews;?>"  name="idnews" id="idnews"/>
<label for="newsname" class="label_dat_s">Название новости</label>
<input type="text" class="custom_input1 " value="<?php echo $newsname;?>"  name="newsname" id="newsname"/>
<span class="tips" id="tip_span_comname"></span>
</div>
<div class="tov_input">
<label for="thumb" class="middle-color label_dat_s" style=" margin-top: 10px;float: left;">Фото новости</label>
<input type="file" class="custom_input1" style="padding: 5px;"   name="thumb" id="thumb" />
<img src="<?php echo $thumb;?>" style="width:50px;height:50px">
</div> 
<div class="tov_input">
<label for="content" style="padding-bottom: 10px;"><span>*</span> <?php echo $L['content'];?></label>
<textarea name="content" id="content" class='custom_input1 ckeditor span12' style="height:130px;width: 100%;"><?php echo $introduce;?></textarea>
<span class="tips" id="tip_span_content"></span>
</div>
<div class="align-center">
 <input type="submit" class="button_nulik" name="submit" value="Добавить" id="submit" />
</div>  
<div class="topmargin10"></div>
</form>
</div>