<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?>
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/chosen_user.css">
<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery-latest.js"></script>
<script src="include/ckeditor_user/ckeditor.js"></script>
<script type="text/javascript">
function ajax_select_lv(e){
e.preventDefault();
 var msg1 = new FormData;
//var msg1   = $('#form_post');
$('#forms').find (' textarea, input, select').each(function() {
  // добавим новое свойство к объекту $data
  // имя свойства – значение атрибута name элемента
  // значение свойства – значение свойство value элемента
  var clickId = this.id;
 // msg1[clickId] = $(this).val();
    msg1.append(clickId, $(this).val());
  //  alert(clickId+"--->"+$(this).val());
});
var $input = $("#thumb");
for(var a=1;a<=ii;a++){
var file = $("#file"+a);
 msg1.append('file'+a, file.prop('files')[0]);
}
   msg1.append('thumb', $input.prop('files')[0]);
    
  //fd.append('newsname', newsname.val());
     $.ajax({
        url: 'member.php?act=updatecom',
        data: msg1,
        processData: false,
        contentType: false,
        type: 'POST',
      //  data:msg,
beforeSend: function() {
$('#result').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>');},
success: function(html) {
$("#result").html(html);
}
    });
}

$(function(){
$('#forms').on('submit', ajax_select_lv);
});
</script>


  <?php if(is_array($com_images)) foreach($com_images AS $img) { ?>
<script type="text/javascript">
$(document).ready(function(){
$('#javvse<?php echo $img['imgid'];?>').click(function(){
$.ajax({
url: "/delimage.php?id=<?php echo $img['imgid'];?>#product",
cache: false,
beforeSend: function() {
$('#delimg').html('<img class="loading"  src="templates/<?php echo $CFG['tplname'];?>/images/load.gif"></>');
},
success: function(html){
$("#delimg").html(html);
$(".cd-tabs-content1").css({
  'height':'auto',
});
}
});
return false;
});
});

</script>

<?php } ?>

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
<div class="lop_bloc">
<form id="forms" class="content-form" name="forms" method="post" action="member.php?act=updatecom" enctype="multipart/form-data">
    <div class="top_bloc" style="padding: 20px 0px 0px 0px;height: 61px;"><div data-content="member.php?act=com" id="back" class="goback"><i class="icon-reply"></i></div>   

<label for="areaid" class="middle-color label_dat_s" style="float:left"><span></span> </label>
<div class="areaid_blok">
<select name="areaid" id="areaid" data-placeholder="Выберите регион" class="chosen-select" style="width:50%;" tabindex="2">
<option value=""></option>
<?php echo $com_area;?>
</select>
</div>
<span class="tips" id="tip_span_areaid"></span>
</div>	
<div class="tov_input">
<label for="catname"><span>*</span> <?php echo $L['category'];?></label>
<span><?php echo $catname;?></span>
</div> 
<div class="tov_input">
<label for="comname"><span>*</span> <?php echo $L['company_name'];?></label>
<input type="text" class="custom_input1" value="<?php echo $comname;?>" name="comname" id="comname"/>
<span class="tips" id="tip_span_comname"></span>
</div> 
<div class="tov_input">
<label for="thumb"><?php echo $L['company_logo'];?></label>
<img src="<?php echo $thumb;?>" style=" max-width: 100px;max-height: 80px;">
<input type="file" class="custom_input1" style="padding: 5px;margin-left:34%" name="thumb" id="thumb" />
</div> 
<div class="minimum"><?php echo $L['width_height'];?>: <?php echo $CFG['com_thumbwidth'];?>&#215;<?php echo $CFG['com_thumbheight'];?></div>
<div class="tov_input">
<label for="keywords" >Виды деятельности</label>
<input type="text" class="custom_input1" style="width:500px;" placeholder="Ключевые слова" value="<?php echo $keywords;?>" name="keywords" id="keywords"/>
</div>
<div class="minimum">Разделяйте виды деятельности запятой, max - 200 символов</div>
<div class="tov_input">
<label for="keywords">Введите ваш ИНН</label>
<input type="text" class="custom_input1" placeholder="ИНН" value="<?php echo $unp;?>" name="unp" id="unp"/><?php echo $L['unp'];?>
</div>
<div class="tov_input">
<label for="keywords">Введите сайт комапнии</label>
<input type="text" class="custom_input1 " placeholder="http://vseti-goroda.ru" value="<?php echo $sait;?>" name="sait" id="sait"/><?php echo $L['unp'];?>
</div>
<div class="tov_input">
<label for="keywords">Ссылка на соц.сеть</label>
<input type="text" class="custom_input1" placeholder="https://vk.com/vseti_goroda" value="<?php echo $socset;?>" name="seti" id="seti" /><?php echo $L['unp'];?>
</div>
<div id="delimg" class="gal_block">
<?php if($massiv) { ?><label for="content">Фото для фотогалереи</label><?php } ?>           
<ul class="all_gal">
<?php if(is_array($com_images)) foreach($com_images AS $img) { ?>
<li><div class="phot_img"><img  src="<?php echo $img['path'];?>" ><a href="#"  id="javvse<?php echo $img['imgid'];?>" class='toglcat1'><strong> Удалить </strong></a></div></li>
<?php if($img[number]==5) { ?>
<label>Чтобы добавить фото, удалите одно из уже добаленных </label>
<?php } ?>

<?php } ?>

<div class="clear"></div>
</ul>
<div class="grid-70 well well-box cream-bg" style='width:100%;margin: 4px 0px 0px 0px;padding: 0px;'>
<?php if(is_array($massiv)) foreach($massiv AS $i) { ?>
<input type="file" class="batton-normal custom_input1 dark-color light-bg" style="width:300px;margin-bottom:5px;padding:6px 0px 0px 10px" name="file<?php echo $i;?>" id="file<?php echo $i;?>" onchange="tstFile(this)" multiple="true">&nbsp;

<?php } ?>

<script type="text/javascript">var ii ="<?php echo $i; ?>"</script>
</div></div>
<div class="hor_bloks">
<div class="hor_plus">
<select id="hours1" >
<?php if($Mon1[0]!=0 || $Mon1[0]!=false) { ?><option ><?php echo $Mon1['0'];?></option><?php } ?>
<?php echo $chasiki;?></select>
<select id="hours11" >
<?php if($Mon1[1]!=0 || $Mon1[1]!=false) { ?><option><?php echo $Mon1['1'];?></option><?php } ?>
<?php echo $minut;?></select>
<select id="hours111" >
<?php if($Mon2[0]!=0 || $Mon2[0]!=false) { ?><option ><?php echo $Mon2['0'];?></option><?php } ?>
<?php echo $chasiki;?></select>
<select id="hours1111">
<?php if($Mon2[1]!=0 || $Mon2[1]!=false) { ?><option ><?php echo $Mon2['1'];?></option><?php } ?>
<?php echo $minut;?></select>- понедельник </div>
<div class="hor_plus" >
<select id="hours2" >
<?php if($Tue1[0]!=0 || $Tue1[0]!=false) { ?><option><?php echo $Tue1['0'];?></option><?php } ?>
<?php echo $chasiki;?></select>
<select id="hours22" >
<?php if($Tue1[1]!=0 || $Tue1[1]!=false) { ?><option><?php echo $Tue1['1'];?></option><?php } ?>
<?php echo $minut;?> </select>
<select id="hours222" >
<?php if($Tue2[0]!=0 || $Tue2[0]!=false) { ?><option><?php echo $Tue2['0'];?></option><?php } ?>
<?php echo $chasiki;?></select>
<select id="hours2222" >
<?php if($Tue2[1]!=0 || $Tue2[1]!=false) { ?><option><?php echo $Tue2['1'];?></option><?php } ?>
<?php echo $minut;?></select> - вторник</div>
<div class="hor_plus">
<select id="hours3">
<?php if($Wed1[0]!=0 || $Wed1[0]!=false) { ?><option><?php echo $Wed1['0'];?></option><?php } ?>
<?php echo $chasiki;?></select>
<select id="hours33" >
<?php if($Wed1[1]!=0 || $Wed1[1]!=false) { ?><option><?php echo $Wed1['1'];?></option><?php } ?>
<?php echo $minut;?> </select>
<select id="hours333" >
<?php if($Wed2[0]!=0 || $Wed2[0]!=false) { ?><option><?php echo $Wed2['0'];?></option><?php } ?>
<?php echo $chasiki;?></select>
<select id="hours3333" >
<?php if($Wed2[1]!=0 || $Wed2[1]!=false) { ?><option><?php echo $Wed2['1'];?></option><?php } ?>
<?php echo $minut;?></select> - среда</div>
<div class="hor_plus">
<select id="hours4" >
<?php if($Thu1[0]!=0 || $Thu1[0]!=false) { ?><option><?php echo $Thu1['0'];?></option><?php } ?>
<?php echo $chasiki;?></select>
<select id="hours44" >
<?php if($Thu1[1]!=0 || $Thu1[1]!=false) { ?><option><?php echo $Thu1['1'];?></option><?php } ?>
<?php echo $minut;?> </select>
<select id="hours444" >
<?php if($Thu2[0]!=0 || $Thu2[0]!=false) { ?><option><?php echo $Thu2['0'];?></option><?php } ?>
<?php echo $chasiki;?></select>
<select id="hours4444" >
<?php if($Thu2[1]!=0 || $Thu2[1]!=false) { ?><option><?php echo $Thu2['1'];?></option><?php } ?>
<?php echo $minut;?></select> - четверг</div>
<div class="hor_plus">
<select id="hours5" >
<?php if($Fri1[0]!=0 || $Fri1[0]!=false) { ?><option><?php echo $Fri1['0'];?></option><?php } ?>
<?php echo $chasiki;?></select>
<select id="hours55" >
<?php if($Fri1[1]!=0 || $Fri1[1]!=false) { ?><option><?php echo $Fri1['1'];?></option><?php } ?>
<?php echo $minut;?> </select>
<select id="hours555" >
<?php if($Fri2[0]!=0 || $Fri2[0]!=false) { ?><option><?php echo $Fri2['0'];?></option><?php } ?>
<?php echo $chasiki;?></select>
<select id="hours5555" >
<?php if($Fri2[1]!=0 || $Fri2[1]!=false) { ?><option><?php echo $Fri2['1'];?></option><?php } ?>
<?php echo $minut;?></select> - пятница</div>
<div class="hor_plus">
<select id="hours6" >
<?php if($Sat1[0]!=0 || $Sat1[0]!=false) { ?><option><?php echo $Sat1['0'];?></option><?php } ?>
<?php echo $chasiki;?></select>
<select id="hours66" >
<?php if($Sat1[1]!=0 || $Sat1[1]!=false) { ?><option><?php echo $Sat1['1'];?></option><?php } ?>
<?php echo $minut;?> </select>
<select id="hours666" >
<?php if($Sat2[0]!=0 || $Sat2[0]!=false) { ?><option><?php echo $Sat2['0'];?></option><?php } ?>
<?php echo $chasiki;?></select>
<select id="hours6666" >
<?php if($Sat2[1]!=0 || $Sat2[1]!=false) { ?><option><?php echo $Sat2['1'];?></option><?php } ?>
<?php echo $minut;?> </select> - суббота</div>
<div class="hor_plus">
<select id="hours7" >
<?php if($Sun1[0]!=0 || $Sun1[0]!=false) { ?><option><?php echo $Sun1['0'];?></option><?php } ?>
<?php echo $chasiki;?></select>
<select id="hours77" >
<?php if($Sun1[1]!=0 || $Sun1[1]!=false) { ?><option><?php echo $Sun1['1'];?></option><?php } ?>
<?php echo $minut;?> </select>
<select id="hours777" >
<?php if($Sun2[0]!=0 || $Sun2[0]!=false) { ?><option><?php echo $Sun2['0'];?></option><?php } ?>
<?php echo $chasiki;?></select>
<select id="hours7777" >
<?php if($Sun2[1]!=0 || $Sun2[1]!=false) { ?><option><?php echo $Sun2['1'];?></option><?php } ?>
<?php echo $minut;?></select>- воскресенье</div>
</div> 
<div class="tov_input">
<label for="content" style="float: left;padding-bottom: 10px;"><span>*</span> <?php echo $L['about_company'];?></label>
<div class="row-fluid">
<div class="span12">
<div class="box">
<div class="box-head">
</div>
<div class="box-body box-body-nopadding">
<textarea name="content" id="content" class=' span12 text_com' rows="5" style="width: 100%;"><?php echo $introduce; ?></textarea>
</div></div></div></div>
<span class="tips" id="tip_span_content"></span>
</div>

<div class="tov_input">
<label for="linkman"><span>*</span> Контактное лицо</label>
<input type="text" class="custom_input1 " name="linkman" id="linkman" value="<?php echo $linkman;?>" />
</div>
<div class="tov_input">
<label for="email" ><span>*</span> E-mail</label>
<input type="text" class="custom_input1" name="email" id="email" value="<?php echo $email;?>" placeholder="<?php echo $email;?>"/>
</div>
<div class="tov_input">
<label for="phone"><span>*</span> <?php echo $L['phone'];?></label>
<input type="text" class="custom_input1" name="phone" id="phone" value="<?php echo $phone;?>" placeholder="<?php echo $L['phone'];?>"/>
</div>
<div class="tov_input">
<label for="icq"><span>*</span> Доп. телефон</label>
<input type="text" class="custom_input1" name="icq" id="icq" value="<?php echo $icq;?>" placeholder="Доп. телефон"/>
</div>
<div class="minimum"><?php echo $L['given_one_three_contacts'];?></div>	
<div class="tov_input">
<label for="address" ><?php echo $L['address'];?></label>
<input type="text" class="custom_input1" style="width:400px;" name="address" id="address" value="<?php echo $address;?>"/>
</div>
<?php if($CFG[map_check]==1) { ?>	
<div class="tov_input">
<label for="mappoint"><?php echo $L['coordinates'];?></label>
<script type="text/javascript" src="js/msgbox/msgbox.js"></script>
<link href="js/msgbox/msgbox.css" type="text/css" rel="stylesheet" />
<input type="text" class="custom_input1" style="width:40%;" name="mappoint" id="mappoint" placeholder="<?php echo $L['coordinates'];?>" value="<?php echo $mappoint;?>" readonly="readonly" autocomplete="off"/>
<input name="markmap" type="button" value="<?php echo $L['map'];?>" class="button_nulik" style="width: auto;margin-left: 10px;" onclick="Yubox.win('do.php?act=small_map&mark=1&width=700&height=450&p=<?php echo $CFG['map'];?>',700,540,'<?php echo $L['map'];?>',null,null,null,true);">
<div class="minimum">Вызовите карту и определите ваш адрес.<br> На карте будет выведен более точный адрес</div>
</div>
<?php } ?>
<div class="align-center">
<input type="submit"  name="submit" class="button_nulik" value="<?php echo $L['change'];?>"  />
<input type="hidden" id="id" name="id" value="<?php echo $comid;?>"/>
<input type="hidden" name="act" value="updatecom" />
</div> 
</form>
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
<script type="text/javascript">jQuery.noConflict();</script>
<script type="text/javascript" src="js/valid/validator.full.js"></script>
<link href="js/valid/validator.css" type="text/css" rel="stylesheet" />
<script type="text/javascript">
$.validator("comname")
.setTipSpanId("tip_span_comname")
.setFocusMsg("<?php echo $L['company_name_empty'];?>")
.setRequired("<?php echo $L['f_are_mandatory'];?>")
.setServerCharset("UTF-8")
.setStrlenType("symbol")
.setMinLength(5, "<?php echo $L['f_min_5_characters'];?>")
.setMaxLength(80, "<?php echo $L['f_max_80_characters'];?>");
$.validator("areaid")
.setTipSpanId("tip_span_areaid")
.setFocusMsg("<?php echo $L['areaid_empty'];?>")
.setRequired("<?php echo $L['areaid_empty'];?>")
.setServerCharset("UTF-8")
.setStrlenType("symbol");
$.validator("phone")
.setTipSpanId("tip_span_phone")
$.validator("icq")
.setTipSpanId("tip_span_icq");
$.validator("email")
.setRegexp(/^\w+((-|\.)\w+)*@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/, "<?php echo $L['f_invalid_email'];?>", false)
.setServerCharset("UTF-8")
.setStrlenType("symbol");
$('form').submit(function(){
if($('#phone').val()=='' && $('#icq').val()=='' && $('#email').val()=='') {
$('#phone').focus();
return false;
}
});
</script>
</div>