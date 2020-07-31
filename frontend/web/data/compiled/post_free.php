<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/chosen_user.css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/uploadimg.css">
<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery-latest.js"></script>
<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/uploadimg.js"></script>
<script src="include/ckeditor_user/ckeditor.js"></script>


<style type="text/css">
#tab_1:checked  ~ #tab_l1,
#tab_2:checked  ~ #tab_l2,
#tab_3:checked  ~ #tab_l3</style>

<script type="text/javascript">
var ac="<?php echo($CFG['postfile']);?>";
function ajax_select_lvll(e){
e.preventDefault();
 var msg1 = new FormData;
$('#goadded').find('textarea, input:text,input:hidden,input:radio, select, input:checkbox:checked').each(function() {
  // добавим новое свойство к объекту $data
  // имя свойства – значение атрибута name элемента
  // значение свойства – значение свойство value элемента
  
  var clickId = this.id;

    msg1.append(clickId, $(this).val());
  
});



//var $input = $("#thumb");
for(var a=1;a<=3;a++){
var file = $("#file"+a);
 msg1.append('file'+a, file.prop('files')[0]);
}
 //  msg1.append('thumb', $input.prop('files')[0]);
  
  //fd.append('newsname', newsname.val());
     $.ajax({
        url: 'post.php?act=postok',
        data: msg1,
        processData: false,
        contentType: false,
        cache:false,
        type: 'POST',
beforeSend: function() {
$('#res_block').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>');},
success: function(html) {
$("#res_block").html(html);
}
    });
}

$(function(){
$('#goadded').on('submit', ajax_select_lvll);
});



</script>
  

   <script type="text/javascript">                  
$(document).ready(function(){
 
    
function ajax_select_lv_backss(id_elem){
/*  для аякс добавления товара
   var ttt=$("#areaid").val();
   alert(ttt);
    if(!ttt){alert("Не выбран регион."); return false;}
*/
$.ajax({
url: "post.php",
cache: false,
type:'POST',
data:"step=2&catsel="+id_elem,
beforeSend: function() {
$('#res_sel').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>');},
success: function(html) {
$("#res_sel").html(html);
}});
}
$("#backss").click(function() {var id_elem = $(this).attr("value");$("#backss").each(ajax_select_lv_backss(id_elem))});
});
</script>

<div id="res_block">
<form id="goadded" class="content-form" name="post" action="<?php echo $CFG['postfile'];?>" method="post" enctype="multipart/form-data" ><!--onsubmit="return validate()"-->
<div id="backss" value="<?php echo $parent;?>" class="goback"  style="width: 40px;"><i class="icon-reply"></i></div><i class="icon-mail-forward cat_i"></i> <strong class="katigorio"><?php echo $catinfo['catname'];?></strong>
&nbsp;&nbsp;
<div class="top_bloc" >
<div class="tip_bl" >
    
<div class="tabs_ol">
<input id="tab_1" type="radio" value="1" name="bs" checked="checked" />
<input id="tab_2" type="radio" value="2" name="bs" />
<label for="tab_1" id="tab_l1">Продажа</label>
<label for="tab_2" id="tab_l2">Покупка</label></div>
</div>
<label for="areaid" class="middle-color label_dat_s" style="float:left"><span></span> </label>
<div class="areaid_blok">
<select name="areaid" id="areaid" data-placeholder="Выберите регион" class="chosen-select" style="width:50%;" tabindex="2">
<option value=""></option>
<?php echo $area_post;?>
</select>
</div>
<span class="tips" id="tip_span_areaid"></span>
</div>  							
<div class="tov_input">
<label for="title" ><span>*</span> <?php echo $L['name'];?></label>
<input type="text" class="custom_input1" placeholder="<?php echo $L['f_max_80_characters'];?>" name="title" id="title"/>
<span class="tips" id="tip_span_title"></span>
</div>
<div class="tov_input">
<label for="price" ><?php echo $L['price'];?></label>
<input type="text" class="custom_input1 " name="price" id="price" value="" style="width:100px;" onKeyUp="value=value.replace(/\D+/g,'')"/>
<div class="valyt"><span>RUR</span>
</div>
</div>
<div class="tov_input">
<label for="enddate" >Срок размещения</label>
<input type="radio" class="custom_input1 " name="enddate" id="enddate" value="30" style="width:30px;" checked/><span>30 дней</span>
<input type="radio" class="custom_input1 " name="enddate" id="enddate" value="60" style="width:30px;"/><span>60 дней</span>
<input type="radio" class="custom_input1 " name="enddate" id="enddate" value="90" style="width:30px;"/><span>90 дней</span>
</div>
<?php if(is_array($custom)) foreach($custom AS $item) { ?>
<div class="tov_input">
<label for="custom" class="middle-color label_dat_s"><?php echo $item['cusname'];?></label>
<?php echo $item['html'];?>
</div>

<?php } ?>

<div class="tov_input">
<label for="content" style="padding-bottom: 10px;"><span>*</span>Описание</label>
<textarea class="custom_input1 dark-color light-bg" name="description" id="description" style="height:130px;width:100%;"><?php echo $description;?></textarea>
<span class="tips" id="tip_span_content"></span>
</div>
<div class="img_input">
<div class="im_gblok">
<label for="content" class="middle-color label_dat_s" style="text-align: left;padding-bottom: 10px; width: 100%;"><?php echo $L['image'];?></label>    
<p class="middle-color "> <?php echo $L['formats'];?>: JPG, JPEG, GIF, PNG</p> 
<input type="file"  name="file1" id="file1"  multiple="true">
<label class="plus_img" for="file1">
<i class="icon-plus"></i>  
</label>
<input type="file"  name="file2" id="file2"  multiple="true">
<label class="plus_img" for="file2">
<i class="icon-plus"></i>  
</label>
<input type="file"  name="file3" id="file3"  multiple="true">
<label class="plus_img" for="file3">
<i class="icon-plus"></i>  
</label>
</div>
</div>
<div class="tov_input">
<label for="linkman" ><span>*</span> Контактное лицо </label>
<input type="text" class="custom_input1" name="linkman" id="linkman" value="<?php echo $tariff['surname'];?>" />
</div>
<div class="tov_input">
<label for="email" ><span>*</span> E-mail</label>
<input type="text" class="custom_input1" name="email" id="email" value="<?php echo $tariff['email'];?>" placeholder="E-mail"/>
</div>
<div class="tov_input">
<label for="phone"><span>*</span> <?php echo $L['phone'];?></label>
<input type="text" class="custom_input1" name="phone" id="phone" value="<?php echo $tariff['phone'];?>" placeholder="<?php echo $L['phone'];?>"/>
</div>
<div class="topmargin5 "></div>
<div class="tov_input">
<label for="address"><?php echo $L['address'];?></label>
<input type="text" class="custom_input1" style="width:400px;" name="address" id="address" placeholder=""/>
</div>
<button type="submit" class="button_nulik" style="float: right;" ><?php echo $L['add'];?></button>
<input type="hidden" name="catid" id="catid" value="<?php echo $catid;?>" />
<input type="hidden" name="act" id="act" value="postok" />
<?php if($CFG[post_check]==1) { ?>
<div class="topmargin5"></div>
<div class="align-center">
<div class="alert alert-info">
<?php echo $L['tested_before_adding'];?>
</div></div><?php } ?>
</form>
</div>
<script src="js/chosen.jquery.js" type="text/javascript"></script>
<script src="js/prism.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
var config = {
'.chosen-select'           : {},
'.chosen-select-deselect'  : {allow_single_deselect:true},
'.chosen-select-no-single' : {disable_search_threshold:10},
'.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
'.chosen-select-width'     : {width:"95%"}}
for (var selector in config) {$(selector).chosen(config[selector]);}
</script> 
 <script type="text/javascript">                  
$(document).ready(function(){
 initializeSelectboxes(".custom-selectbox");
 
 function initializeSelectboxes(selector) {
            var $selectboxes = $(selector);
            if ($selectboxes.length < 1) return false;
            $selectboxes.find("select").on("change", function() {
                var $self = $(this);
                $self.next("span").text($("option:selected", $self).text());
            }).after($("<i />").addClass("icon-caret-down")).after("<span />").trigger("change");
        };
});     
</script>
<script type="text/javascript" src="js/valid/validator.full.js"></script>
<link href="js/valid/validator.css" type="text/css" rel="stylesheet" />
<script type="text/javascript">
function tstFile(val){
var v = val.value;
var v = v.search(/^.*\.(?:jpg|jpeg|png|gif)\s*$/ig)
if(v!=0){
alert("<?php echo $L['image_not_be_added'];?>");
$('#Reset').click();}}
$.validator("areaid")
.setTipSpanId("tip_span_areaid")
.setFocusMsg("<?php echo $L['areaid_empty'];?>")
.setRequired("<?php echo $L['areaid_empty'];?>")
.setServerCharset("UTF-8")
.setStrlenType("symbol");
$.validator("title")
.setTipSpanId("tip_span_title")
.setFocusMsg("<?php echo $L['f_limit_5_80_characters'];?>")
.setRequired("<?php echo $L['title_empty'];?>")
.setServerCharset("UTF-8")
.setStrlenType("symbol")
.setMinLength(5, "<?php echo $L['f_min_5_characters'];?>")
.setMaxLength(80, "<?php echo $L['f_max_80_characters'];?>");
$.validator("phone")
.setTipSpanId("tip_span_phone")
.setCallback(chklink, "<?php echo $L['given_one_three_contacts'];?>", '1');
$.validator("icq")
.setTipSpanId("tip_span_icq")
.setCallback(chklink, "<?php echo $L['given_one_three_contacts'];?>", '1');
$.validator("email")
.setRegexp(/^\w+((-|\.)\w+)*@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/, "<?php echo $L['f_invalid_email'];?>", false)
.setServerCharset("UTF-8")
.setStrlenType("symbol")
.setMaxLength(50, "<?php echo $L['f_max_50_characters'];?>")
.setCallback(chklink, "<?php echo $L['given_one_three_contacts'];?>", '1');
$.validator("password")
.setTipSpanId("tip_span_password")
.setFocusMsg("<?php echo $L['f_limit_6_12_characters'];?>")
.setRequired("<?php echo $L['f_password_enter'];?>")
.setServerCharset("UTF-8")
.setStrlenType("symbol")
.setMinLength(6, "<?php echo $L['f_min_6_characters'];?>")
.setMaxLength(12, "<?php echo $L['f_max_12_characters'];?>")
function chklink() {
if($('#phone').val()=='' && $('#email').val()=='' && $('#icq').val()=='') {return false;} else {return true;}}
</script>
<script type="text/javascript">
Global.documentReady(); Homepage.documentReady();Product.documentReady(); 
</script>
