<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?> <!-- <script src="templates/<?php echo $CFG['tplname'];?>/js/uploadimg.js" type="text/javascript" charset="utf-8"></script>  -->
<script type="text/javascript">
var ac="<?php echo($CFG['postfile']);?>";
function ajax_select_lvll(e){
e.preventDefault();
 var msg1 = new FormData;
$('#goadded').find (' textarea, input, select').each(function() {
  // добавим новое свойство к объекту $data
  // имя свойства – значение атрибута name элемента
  // значение свойства – значение свойство value элемента
  var clickId = this.id;
    msg1.append(clickId, $(this).val());
});
//var $input = $("#thumb");
for(var a=1;a<=6;a++){
var file = $("#file"+a);
 msg1.append('file'+a, file.prop('files')[0]);
}
     $.ajax({
        url: 'post.php?act=postok',
        data: msg1,
        processData: false,
        contentType: false,
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
$.ajax({
url: "post.php",
cache: false,
type:'POST',
data:"step=3&catsel="+id_elem,
beforeSend: function() {
$('#res_sel').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>');},
success: function(html) {
$("#res_sel").html(html);
}});
}
$("#backss").click(function() {var id_elem = $(this).attr("value");$("#backss").each(ajax_select_lv_backss(id_elem))});
});
</script>

<div id="res_block" class="content-holder grid-100"> 
<form id="goadded" class="content-form" name="post" action="<?php echo $CFG['postfile'];?>" method="post" enctype="multipart/form-data">
<div id="backss" value="<?php echo $parent;?>" class="goback"  style="width: 40px;"><i class="icon-reply"></i></div><i class="icon-mail-forward cat_i"></i> <strong class="katigorio"><?php echo $catinfo['catname'];?></strong>
<div class="form-input" style="display: none;">
<label for="areaid" class="middle-color label_dat_s"><span>*</span> <?php echo $L['area'];?></label>
<div class="grid-70">
<div class="custom-selectbox">
<select name="areaid" id="areaid">
<option value="<?php echo $areaid_select;?>">--<?php echo $areaname_select;?>--</option>
<?php echo $area_post;?> </select>
</div>
</div>
<span class="tips" id="tip_span_areaid"></span>
</div>                              
<div class="tov_input" style="margin-top: 24px;">
<label for="title"><span>*</span> <?php echo $L['name'];?></label>
<input type="text" class="custom_input1" placeholder="<?php echo $L['f_max_80_characters'];?>" name="title" id="title" style="width:47%;"/>
<span class="tips" id="tip_span_title"></span>
</div>
<div class="tov_input">
<label for="price" class="middle-color label_dat_s"><?php echo $L['price'];?></label>
<input type="text" class="custom_input1" name="price" id="price" value="" style="width:100px;" onKeyUp="value=value.replace(/\D+/g,'')"/>
<div class="valyt"><span>RUR</span>
</div>
<p class="middle-color" style="text-align:center;display:none"><strong></strong></p>   
</div>
<?php if(is_array($custom)) foreach($custom AS $item) { ?>
<div class="tov_input">
<label for="custom" class="middle-color label_dat_s"><?php echo $item['cusname'];?></label>
<?php echo $item['html'];?>
</div>

<?php } ?>

<div class="tov_input">
<label for="content" class="middle-color label_dat_s" style=""><span></span>Производитель</label>
<input class="custom_input1" name="proizvoditel" id="proizvoditel" placeholder="Производитель" >
<span class="tips" id="tip_span_content"></span>
</div>
<div class="tov_input">
<label for="content" class="middle-color label_dat_s" style=""><span></span>Доставка</label>
<input class="custom_input1" name="dostavka" id="dostavka" placeholder="Доставка" >
<span class="tips" id="tip_span_content"></span>
</div>
<div class="tov_input">
<label for="content" style="padding-bottom: 10px;"><span>*</span> <?php echo $L['content'];?></label>
<textarea name="content" id="content" class='custom_input1 ckeditor span12' style="height:130px;width: 100%;"><?php echo $description;?></textarea>
<span class="tips" id="tip_span_content"></span>
</div>
<div class="img_input">
<div class="im_gblok" >
<label for="content" style="padding-bottom: 10px; width: 100%;"><?php echo $L['image'];?></label> 
<p><?php echo $L['max_size'];?>: <?php echo $maxupload;?> Kb. <?php echo $L['formats'];?>: JPG, JPEG, GIF, PNG</p>
<input type="file" name="file1" id="file1" onchange="tstFile(this)" multiple="true">
<label class="plus_img" for="file1">
<i class="icon-plus"></i></label>
<input type="file" name="file2" id="file2" onchange="tstFile(this)" multiple="true">
<label class="plus_img" for="file2">
<i class="icon-plus"></i></label>
<input type="file" name="file3" id="file3" onchange="tstFile(this)" multiple="true">
<label class="plus_img" for="file3">
<i class="icon-plus"></i></label>
<input type="file" name="file4" id="file4" onchange="tstFile(this)" multiple="true">
<label class="plus_img" for="file4">
<i class="icon-plus"></i></label>
<input type="file" name="file5" id="file5" onchange="tstFile(this)" multiple="true">
<label class="plus_img" for="file5">
<i class="icon-plus"></i></label>
<input type="file" name="file6" id="file6" onchange="tstFile(this)" multiple="true">
<label class="plus_img" for="file6">
<i class="icon-plus"></i></label>

</div>	</div>
<div class="tov_input">
<label for="email" class="middle-color label_dat_s"><span>*</span> E-mail</label>
<input type="text" class="custom_input1" name="email" id="email" value="<?php echo $tariff['email'];?>" placeholder="E-mail"/>
</div>
<div class="tov_input">
<label for="phone" class="middle-color label_dat_s"><span>*</span> <?php echo $L['phone'];?></label>
<input type="text" class="custom_input1" name="phone" id="phone" value="<?php echo $tariff['phone'];?>" placeholder="<?php echo $L['phone'];?>"/>
</div>
<div class="tov_input">
<label for="icq" class="middle-color label_dat_s"><span>*</span> Доп.Тел.</label>
<input type="text" class="custom_input1" name="icq" id="icq" value="<?php echo $tariff['icq'];?>" placeholder="Доп.Тел."/>
</div>
<div class="topmargin10"></div> 
<div class="align-center">
<button id="gsub" type="submit" class="button_nulik" ><?php echo $L['add'];?></button>
<input type="hidden" name="catid" id="catid" value="<?php echo $catid;?>" />
<input type="hidden" name="act" id="act" value="postok" />
</div> 
<?php if($CFG[post_check]==1) { ?>
<div class="topmargin5"></div>
<div class="align-center">
<div class="alert alert-info">
<?php echo $L['tested_before_adding'];?>
</div>
</div>
<?php } ?>
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
'.chosen-select-width'     : {width:"95%"}
}
for (var selector in config) {
$(selector).chosen(config[selector]);
}
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
$.validator("content")
.setTipSpanId("tip_span_content")
.setFocusMsg("<?php echo $L['f_min_5_characters'];?>")
.setRequired("<?php echo $L['content_empty'];?>")
.setServerCharset("UTF-8")
.setStrlenType("symbol")
.setMinLength(5, "<?php echo $L['f_min_5_characters'];?>")
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
if($('#phone').val()=='' && $('#email').val()=='' && $('#icq').val()=='') {
return false;} else {
return true;}}
</script>