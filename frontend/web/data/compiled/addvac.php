<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><script type="text/javascript">                  
$(document).ready(function(){
function ajax_select_lv(e){
e.preventDefault();
var msg   = $('#form_post').serialize();
 $.ajax({
url: "add_vac.php?act=postvac",
cache: false,
type:'POST',
data:msg,
beforeSend: function() {
$('#res_block').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>');},
success: function(html) {
$("#res_block").html(html);
}});}
$(function(){
$('#form_post').on('submit', ajax_select_lv);
});
});
</script>   
<div id="res_block" > 
<form id="form_post" class="content-form" name="post" action="add_vac.php?act=postvac" method="post" enctype="multipart/form-data" onsubmit="">
<h2 class="zagalovok" >Добавление вакансии</h2>
<div class="tov_input">
<label for="ne" ><span>*</span> Название должности</label>
<input type="text" class="custom_input1"  name="name" id="name"/>
<span class="tips" id="tip_span_comname"></span>
</div>
<div class="tov_input">
<label for="content"><span>*</span>Описание должности</label>
<textarea class="custom_input1" name="content" id="content" style="height:70px"><?php echo $content;?></textarea>
<span class="tips" id="tip_span_content"></span>
</div> 
<div class="tov_input" >
<label for="experience" style="float:left">Опыт работы</label>
<div style="float:left;margin-left:3px">
<div class=" custom-selectbox dark-color light-gradient active-hover">
<select name="experience" id="experience">
<option  value="Не требуется">Не требуется</option><option value="1-3 года">1-3 года</option>
<option value="3-5 лет">3-5 лет</option><option value="более 5 лет">более 5 лет</option>
</select>
</div></div></div>  
<div class="tov_input">
<label for="conditions">Условия</label>
<textarea class="custom_input1" name="conditions" id="conditions" style="height:70px"><?php echo $conditions;?></textarea>
<span class="tips" id="tip_span_content"></span>
</div> 
<div class="tov_input">
<label for="duty">Обязаности</label>
<textarea class="custom_input1" name="duty" id="duty" style="height:70px"><?php echo $duty;?></textarea>
<span class="tips" id="tip_span_content"></span>
</div> 
<div class="tov_input">
<label for="spec">Требования</label>
<textarea class="custom_input1" name="spec" id="spec" style="height:70px"><?php echo $spec;?></textarea>
<span class="tips" id="tip_span_content"></span>
</div> 
<div class="tov_input" >
<label for="schedule"  style="float:left">рафик работы</label>
<div class="" style="float:left;margin-left:3px">
<div class=" custom-selectbox ">
<select  name="schedule" id="schedule">
<option value="Полный рабочий день">Полный рабочий день</option><option value="Неполная занятость">Неполная занятость</option>
<option value="Сменный график">Сменный график</option><option value="Сезонная работа">Сезонная работа</option>
</select>
</div></div>
</div> 
<div class="tov_input">
<label for="paymentby">Заработная плата</label>
<input class="custom_input1" name="paymentby" id="paymentby" placeholder="От" style="width:20%"><?php echo $paymentby;?>
<span class="tips" id="tip_span_content"></span>
<div class="minimum" style="padding: 6px 0px 0px 34%;">Или укажите одно значение для фиксированной зарплаты</div>
</div> 
<div class="tov_input">
<label for="paymentto">Заработная плата</label>
<input class="custom_input1" name="paymentto" id="paymentto" placeholder="До" style="width:20%"><?php echo $paymentto;?>
<span class="tips" id="tip_span_content"></span>
</div>
<div class="tov_input">
<label for="phone" >Телефон</label>
<input type="text" class="custom_input1"  name="phone" value="<?php echo $phone;?>" id="phone"/>
<span class="tips" id="tip_span_comname"></span>
</div>
<div class="tov_input">
<label for="email"> e-mail</label>
<input type="text" class="custom_input1"  name="email" value="<?php echo $email;?>" id="email"/>
<span class="tips" id="tip_span_comname"></span>
</div>
<div class="tov_input">
<label for="linkman">Контактное лицо</label>
<input type="text" class="custom_input1"  name="linkman" value="<?php echo $linkman;?>" id="linkman"/>
<span class="tips" id="tip_span_comname"></span>
</div>
<div class="align-center">
<input type="submit" class="button_nulik" name="submit" value="Добавить" id="submit" />
</div>      
</form></div>