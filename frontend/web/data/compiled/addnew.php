<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><script type="text/javascript">   

$(document).ready(function(){
    
function ajax_select_lv(e){
e.preventDefault();
//////  
//var msg   = $('#form_post').serialize();

var $input = $("#thumb");
var newsname = $("#newsname");
var content = $("#content");
    var fd = new FormData;

    fd.append('thumb', $input.prop('files')[0]);
  fd.append('newsname', newsname.val());
    fd.append('content', content.val());
    $.ajax({
        url: 'add_new.php?act=postnew',
        data: fd,
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
        /////
    /*    
alert(data);
 $.ajax({
     formid:'form_post',
url: "add_new.php?act=postnew",
cache: false,
type:'POST',
data:msg,
beforeSend: function() {
$('#res_block').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>');},
success: function(html) {
$("#res_block").html(html);
}});
    */
}
$(function(){
$('#form_post').on('submit', ajax_select_lv);
});
});
</script>  
<div class="page-block page-block-bottom cream-bg grid-container">
<div id="res_block" > 

 <form id="form_post" class="content-form" name="post" action="add_new.php?act=postnew" method="post" enctype="multipart/form-data" onsubmit="">
<h2 class="zagalovok">Добавление новости</h2>
<div class="tov_input">
<label for="newsname" class="label_dat_s">Название новости</label>
<input type="text" class="custom_input1 "  name="newsname" id="newsname"/>
<span class="tips" id="tip_span_comname"></span>
</div>
<div class="tov_input">
<label for="thumb" class="middle-color label_dat_s">Фото новости</label>
<input type="file" class="custom_input1" style="padding: 5px;" name="thumb" id="thumb" />
</div>
<div class="tov_input">
<label for="content" style="padding-bottom: 10px;"><span>*</span> <?php echo $L['content'];?></label>
<textarea name="content" id="content" class='custom_input1 ckeditor span12' style="height:130px;width: 100%;"><?php echo $description;?></textarea>
<span class="tips" id="tip_span_content"></span>
</div>
<div class="align-center">
 <input type="submit" class="button_nulik" name="submit" value="Добавить" id="submit" />
</div>  
<div class="topmargin10"></div>
</form>
</div>
 </div>