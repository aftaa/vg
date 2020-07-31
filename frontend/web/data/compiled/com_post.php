<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?>
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/chosen_user.css">

<script type="text/javascript">
function ajax_select_lvll(e){
var	valid = true;
 if ( document.getElementById('areaid').value == "" )   {
                alert ( "Пожалуйста заполните поле 'Выберите регион'" );
                valid = false;
                return false;
      
          }if ( document.getElementById('comname').value == "" )
        {
                alert ( "Пожалуйста заполните поле ' Название компании'" );
      
                   return false;
        }
        if ( document.getElementById('content').value == "" )
        {
                alert ( "Пожалуйста заполните поле 'O компании'" );
                valid = false;
                   return false;
        }
       
if ( document.getElementById('linkman').value == "" )
        {
                alert ( "Пожалуйста заполните поле 'Контактное лицо'" );
                valid = false;
                   return false;
        }
var gg = confirm("добавить компанию??");
  if(gg==true){
    
  
    
e.preventDefault();
 var msg1 = new FormData;
$('#form_post').find (' textarea, input, select').each(function() {
  // добавим новое свойство к объекту $data
  // имя свойства – значение атрибута name элемента
  // значение свойства – значение свойство value элемента
  var clickId = this.name;
    msg1.append(clickId, $(this).val());
});
var $input = $("#thumb");
for(var a=1;a<=6;a++){
var file = $("#file"+a);
 msg1.append('file'+a, file.prop('files')[0]);
}
   msg1.append('thumb', $input.prop('files')[0]);
  
  //fd.append('newsname', newsname.val());
     $.ajax({
        url: 'postcom.php?act=postok',
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
}}

$(function(){
$('#form_post').on('submit', ajax_select_lvll);
});

</script>


<div id=res_block >
<form id="form_post" class="content-form" name="form_post" method="post" enctype="multipart/form-data">
Выбранная категория: <strong class="katigorio"><?php echo $com_catinfo['catname'];?></strong>
<div class="top_bloc" style="padding: 20px 0px 0px 0px;height: 61px;"><div data-content="member.php?act=com" id="back" class="goback"><i class="icon-reply"></i></div> 
<label for="areaid" class="middle-color label_dat_s" style="float:left"><span></span> </label>
<div class="areaid_blok">
<select name="areaid" id="areaid" data-placeholder="Выберите регион" class="chosen-select" style="width:50%;" tabindex="2">
<option  value="">Выберите регион</option>
<?php echo $area_postcom;?>
</select>
</div>
<span class="tips" id="tip_span_areaid"></span>
</div>
<div class="tov_input">
<label for="comname"><span>*</span> <?php echo $L['company_name'];?></label>
<input type="text" class="custom_input1" placeholder="Максимум 60 символов" name="comname" id="comname"/>
<span class="tips" id="tip_span_comname"></span>
</div>
<div class="tov_input">
<label for="keywords">Введите ваш ИНН</label>
<input type="text" class="custom_input1" placeholder="ИНН" name="unp" id="unp" />
</div>
<div class="tov_input">
<label for="thumb"><?php echo $L['company_logo'];?></label>
<input type="file" class="custom_input1" style="padding:6px" name="thumb" id="thumb" />
</div> 
<div class="tov_input">
<label for="keywords">Ключевые слова</label>
<input type="text" class="custom_input1" style="width:500px;" placeholder="Ключевые слова" name="keywords" id="keywords"/>
</div>
<div class="minimum">Разделяйте ключевые слова запятой.</div>
<div class="img_input">
<div class="im_gblok"> 
<label for="content" class="middle-color label_dat_s" style="width: 100%;">Фото для фотогалереи</label>
<p class="middle-color "><?php echo $L['max_size'];?>: <?php echo $maxupload;?> Kb. <?php echo $L['formats'];?>: JPG, JPEG, GIF, PNG</p>
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
</div>
</div>
<div class="tov_input">
<label for="hours" style="text-align: left;"><?php echo $L['operation_time'];?></label>
</div> 
<div class="hor_bloks">
<div class="hor_plus">
<select name="hours1" >
<?php if(is_array($chas)) foreach($chas AS $g) { ?>
<option><?php echo $g;?></option>

<?php } ?>
</select>
<select name="hours11" >
<?php if(is_array($min)) foreach($min AS $f) { ?>
<option><?php echo $f;?></option>

<?php } ?>
</select>
<select name="hours111" >
<?php if(is_array($chas)) foreach($chas AS $g) { ?>
<option><?php echo $g;?></option>

<?php } ?>
</select>
<select name="hours1111" >
<?php if(is_array($min)) foreach($min AS $f) { ?>
<option><?php echo $f;?></option>

<?php } ?>

</select>- понедельник
</div><div class="hor_plus">
<select name="hours2" >
<?php if(is_array($chas)) foreach($chas AS $g) { ?>
<option><?php echo $g;?></option>

<?php } ?>

</select>
<select name="hours22" >
<?php if(is_array($min)) foreach($min AS $f) { ?>
<option><?php echo $f;?></option>

<?php } ?>

</select>
<select name="hours222" >
<?php if(is_array($chas)) foreach($chas AS $g) { ?>
<option><?php echo $g;?></option>

<?php } ?>

</select>
<select name="hours2222" >
<?php if(is_array($min)) foreach($min AS $f) { ?>
<option><?php echo $f;?></option>

<?php } ?>

</select>- вторник
</div><div class="hor_plus">
<select name="hours3" >
<?php if(is_array($chas)) foreach($chas AS $g) { ?>
<option><?php echo $g;?></option>

<?php } ?>

</select>
<select name="hours33" >
<?php if(is_array($min)) foreach($min AS $f) { ?>
<option><?php echo $f;?></option>

<?php } ?>

</select>
<select name="hours333" >
<?php if(is_array($chas)) foreach($chas AS $g) { ?>
<option><?php echo $g;?></option>

<?php } ?>

</select>
<select name="hours3333" >
<?php if(is_array($min)) foreach($min AS $f) { ?>
<option><?php echo $f;?></option>

<?php } ?>

</select>
</select>- среда</div>
<div class="hor_plus">
<select name="hours4" >
<?php if(is_array($chas)) foreach($chas AS $g) { ?>
<option><?php echo $g;?></option>

<?php } ?>

</select>
<select name="hours44" >
<?php if(is_array($min)) foreach($min AS $f) { ?>
<option><?php echo $f;?></option>

<?php } ?>

</select>
<select name="hours444" >
<?php if(is_array($chas)) foreach($chas AS $g) { ?>
<option><?php echo $g;?></option>

<?php } ?>

</select>
<select name="hours4444" >
<?php if(is_array($min)) foreach($min AS $f) { ?>
<option><?php echo $f;?></option>

<?php } ?>

</select>- четверг</div>
<div class="hor_plus">
<select name="hours5" >
<?php if(is_array($chas)) foreach($chas AS $g) { ?>
<option><?php echo $g;?></option>

<?php } ?>

</select>
<select name="hours55" >
<?php if(is_array($min)) foreach($min AS $f) { ?>
<option><?php echo $f;?></option>

<?php } ?>

</select>
<select name="hours555" >
<?php if(is_array($chas)) foreach($chas AS $g) { ?>
<option><?php echo $g;?></option>

<?php } ?>

</select>
<select name="hours5555" >
<?php if(is_array($min)) foreach($min AS $f) { ?>
<option><?php echo $f;?></option>

<?php } ?>

</select>- пятница</div>
<div class="hor_plus">
<select name="hours6" >
<?php if(is_array($chas)) foreach($chas AS $g) { ?>
<option><?php echo $g;?></option>

<?php } ?>

</select>
<select name="hours66" >
<?php if(is_array($min)) foreach($min AS $f) { ?>
<option><?php echo $f;?></option>

<?php } ?>

</select>
<select name="hours666" >
<?php if(is_array($chas)) foreach($chas AS $g) { ?>
<option><?php echo $g;?></option>

<?php } ?>

</select>
<select name="hours6666" >
<?php if(is_array($min)) foreach($min AS $f) { ?>
<option><?php echo $f;?></option>

<?php } ?>

</select>- суббота</div>
<div class="hor_plus">
<select name="hours7" >
<?php if(is_array($chas)) foreach($chas AS $g) { ?>
<option><?php echo $g;?></option>

<?php } ?>

</select>
<select name="hours77" >
<?php if(is_array($min)) foreach($min AS $f) { ?>
<option><?php echo $f;?></option>

<?php } ?>

</select>
<select name="hours777" >
<?php if(is_array($chas)) foreach($chas AS $g) { ?>
<option><?php echo $g;?></option>

<?php } ?>

</select>
<select name="hours7777" >
<?php if(is_array($min)) foreach($min AS $f) { ?>
<option><?php echo $f;?></option>

<?php } ?>

</select>- воскресенье</div>
 <div class="minimum" style="padding-left: 0;">Не выбранное Вами время работы будет отображаться как выходной</div>
</div> 
<div class="tov_input">
<label for="content" style="float: left;padding-right: 4px;"><span>*</span> <?php echo $L['about_company'];?></label>
<div class="row-fluid">
<div class="span12">
<div class="box">
<div class="box-head">
</div>
<div class="box-body box-body-nopadding">
<textarea name="content" id="content" class='ckeditor span12 text_com' rows="5" style="width: 100%;margin: 10px 0px 10px 0px;height: 160px;"><?php echo $introduce; ?></textarea>
</div></div></div></div>
<span class="tips" id="tip_span_content"></span>
</div>
<div class="tov_input">
<label for="linkman"><span>*</span>Контактное лицо</label>
<input type="text" class="custom_input1" name="linkman" id="linkman" value="<?php echo $tariff['surname'];?>" />
</div>
<div class="tov_input">
<label for="email"><span>*</span> E-mail</label>
<input type="text" class="custom_input1" name="email" id="email" value="<?php echo $tariff['email'];?>" placeholder="E-mail"/>
</div>
<div class="tov_input">
<label for="email"><span >*</span> Страница в социальных сетях</label>
<input type="text" class="custom_input1" name="socset" id="socset"  placeholder="вставте ссылку на страницу в соц.сети"/>
</div>
 <div class="tov_input">
<label for="email"><span>*</span> Ваш сайт</label>
<input type="text" class="custom_input1" name="sait" id="sait"  placeholder="вставте ссылку на ваш сайт"/>
</div>
<div class="tov_input">
<label for="phone"><span >*</span> <?php echo $L['phone'];?></label>
<input type="text" class="custom_input1" name="phone" id="phone" value="<?php echo $tariff['phone'];?>" placeholder="<?php echo $L['phone'];?>"/>
</div>
<div class="tov_input">
<label for="icq"><span>*</span>Доп.телефон</label>
<input type="text" class="custom_input1" name="icq" id="icq" value="<?php echo $tariff['icq'];?>" placeholder="Доп.телефон"/>
</div>
<div class="minimum"><?php echo $L['given_one_three_contacts'];?></div>	
<div class="tov_input">
<label for="address" ><?php echo $L['address'];?></label>
<input type="text" class="custom_input1" style="width:400px;" name="address" id="address" placeholder=""/>
</div>
<?php if($CFG[map_check]==1) { ?>							
<div class="tov_input">
<label for="mappoint" class="middle-color label_dat_s"><?php echo $L['coordinates'];?></label>
<script type="text/javascript" src="js/msgbox/msgbox.js"></script>
<link href="js/msgbox/msgbox.css" type="text/css" rel="stylesheet" />
<input type="text" class="custom_input1 dark-color light-bg" style="width:400px;" name="mappoint" id="mappoint" placeholder="<?php echo $L['coordinates'];?>" value="<?php echo $tariff['mappoint'];?>" readonly="readonly" autocomplete="off"/>
<input name="markmap" type="button" style="width: auto;" value="<?php echo $L['map'];?>" class="button_nulik" onclick="Yubox.win('do.php?act=small_map&mark=1&width=700&height=450&p=<?php echo $CFG['map'];?>',700,540,'<?php echo $L['map'];?>',null,null,null,true);" style="margin-top: 4px;">
<div class="minimum">Вызовите карту и определите ваш адрес.</div>
</div><?php } ?>
<div class="align-center">
<input type="submit" class="button_nulik" />
<input id="keyword" type="hidden" name="keyword" />
<input type="hidden" name="catid" value="<?php echo $catid;?>" />
<input type="hidden" name="act" value="postok" />
</div> 
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
for (var selector in config) { $(selector).chosen(config[selector]);}
</script> 
<script type="text/javascript">jQuery.noConflict();</script>
<script type="text/javascript" src="js/valid/validator.full.js"></script>
<link href="js/valid/validator.css" type="text/css" rel="stylesheet" />
