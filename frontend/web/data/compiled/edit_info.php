<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?>
<script type="text/javascript">
function ajax_select_lvll(e){
e.preventDefault();
 var msg1 = new FormData;
//var msg1   = $('#form_post');
$('#form_post').find (' textarea, input, select').each(function() {
  // добавим новое свойство к объекту $data
  // имя свойства – значение атрибута name элемента
  // значение свойства – значение свойство value элемента
  var clickId = this.name;
 // msg1[clickId] = $(this).val();
    msg1.append(clickId, $(this).val());
});
//var $input = $("#thumb");
for(var a=1;a<=ii;a++){
var file = $("#file"+a);
 msg1.append('file'+a, file.prop('files')[0]);
}
//   msg1.append('thumb', $input.prop('files')[0]);
  
  //fd.append('newsname', newsname.val());
     $.ajax({
        url: 'member.php?act=updateinfo',
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

$("#subb").click(function(){
if($("#title").val()==false){alert("Введите заголовок!"); return false;}    
 if($("#content").val()==false){alert("Введите заголовок!"); return false;}    
$('#form_post').on('submit', ajax_select_lvll);
});
</script>


<?php if(is_array($images)) foreach($images AS $img) { ?>
<script type="text/javascript">
$(document).ready(function(){
$('#javvse<?php echo $img['imgid'];?>').click(function(){
$.ajax({
url: "member.php?act=delimg&imgid=<?php echo $img['imgid'];?>",
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
$("#backs").click(function(){ 

var url_v1=$(this).attr('data-content');
$("#resulta").each(ajax_fil1(url_v1));
} );
</script>
<div id="result"><div id="res_block">


<form id="form_post" class="content-form  cream-bg" name="edit" method="post" onSubmit="return chkedit()" action="member.php?act=updateinfo" enctype="multipart/form-data">
<?php if($tip==1) { ?>
<div class="top_bloc" style="display: block;"><div data-content="member.php?act=info&cheked=2" id="backs" class="goback" style="width: 0px;margin: 8px 0px 0px 0px;"><i class="icon-reply"></i></div>
<label for="areaid" class="middle-color label_dat_s"></label>
<div class="areaid_blok">
<select name="areaid" id="areaid">
<option value="<?php echo $areaid_select;?>">--<?php echo $areaname_select;?>--</option>
<?php echo $area_post;?>
</select>
</div>
<span class="tips" id="tip_span_areaid"></span>
</div>  
<?php } ?>
<?php if($tip==0) { ?><div data-content="member.php?act=info" id="backs" class="goback" style="width: 40px;margin: 4px 0px 0px 0px;"><i class="icon-reply"></i></div><?php } ?>
<div class="tov_input">
<label for="title" ><span >*</span> <?php echo $L['name'];?></label>
<input type="text" style="width: 440px;" class="custom_input1" value="<?php echo $title;?>" name="title" id="title"/>
</div>
<div class="tov_input">
<label for="price" ><?php echo $L['price'];?></label>
<input type="text" class="custom_input1 " name="price" id="price" value="<?php echo $price;?>" style="width:100px;"/>
<div class="valyt"><span>RUR</span>
</div>
</div>
<?php if(is_array($custom)) foreach($custom AS $item) { ?>
<div class="tov_input ">
<label for="custom" class=" label_dat_s"><?php echo $item['cusname'];?></label>
<?php echo $item['html'];?></div>

<?php } ?>

<?php if($tip==0) { ?>
<div class="tov_input" >
<label for="priz">Производитель</label>
<input type="text" class="custom_input1" style="width:400px;" value="<?php echo $proizvoditel;?>" name="priz" id="priz" placeholder=""/>
</div>
<div class="tov_input">
<label for="content" class="middle-color label_dat_s" style=""><span></span>Доставка</label>
<input class="custom_input1" name="dostavka" id="dostavka" value="<?php echo $harakteristic;?>" placeholder="" >
<span class="tips" id="tip_span_content"></span>
</div>
<div class="tov_input" style="display:none" >
<label for="address"><?php echo $L['address'];?></label>
<input type="text" class="custom_input1" style="width:400px;" name="address" id="address" placeholder=""/>
</div>
<?php } ?>
<?php if($tip==1) { ?>
<div class="tov_input">
<label for="content" style="padding-bottom: 10px;"><span>*</span> <?php echo $L['content'];?></label>
<textarea name="description" id="description" class='custom_input1 ckeditor span12' style="height:130px;width: 100%;"><?php echo $description;?></textarea>
<span class="tips" id="tip_span_content"></span>
</div><?php } else { ?>
<div class="tov_input">
<label for="content" style="padding-bottom: 10px;"><span>*</span> <?php echo $L['content'];?></label>
<textarea name="content" id="content" class='custom_input1 ckeditor span12' style="height:130px;width: 100%;"><?php echo $content;?></textarea>
<span class="tips" id="tip_span_content"></span>
</div><?php } ?>
<div class="tov_input" >
<label for="image" class=" label_dat_"><?php echo $L['image'];?></label>
<div class="controls" >
<div id="delimg">

<?php include template(delimg); ?>

<script type="text/javascript">var ii ="<?php echo $img_count; ?>"</script>
</div>
<?php if($tip==1) { ?>
<div class="tov_input">
<label for="linkman">Контактное лицо </label>
<input type="text" class="custom_input1 " name="linkman" id="linkman" value="<?php echo $linkman;?>" />
</div>
<?php } ?>
<div class="tov_input">
<label for="email" > E-mail</label>
<input type="text" class="custom_input1" name="email" id="email" value="<?php echo $email;?>" placeholder="E-mail"/>
</div>
<div class="tov_input">
<label for="phone"> <?php echo $L['phone'];?></label>
<input type="text" class="custom_input1" name="phone" id="phone" value="<?php echo $phone;?>" placeholder="<?php echo $L['phone'];?>"/>
</div>
<?php if($tip==0) { ?>
<div class="tov_input">
<label for="icq"> Доп.тел</label>
<input type="text" class="custom_input1" name="icq" id="icq" value="<?php echo $icq;?>" placeholder="Доп.тел"/>
</div>
<?php } ?>

<input type="hidden" name="id" value="<?php echo $id;?>" />
<input type="hidden" name="catid" value="<?php echo $catid;?>" />
<input type="hidden" name="act" value="updateinfo" />
<input type="hidden" name="thumb" value="<?php echo $thumb;?>" />
<input type="submit" id="subb" name="submit" class="button_nulik" style="float: right;    width: auto;" value="<?php echo $L['change'];?>" id="submit" />					
</form>
<script type="text/javascript">
function chkedit(){
if(document.edit.title.value==""){
  swal({
            title: "Вы не авторизованы", // Заголовок окна
            text: "Для отправки сообщения авторизуйтесь или зарегистрируйтесь", // Текст в окне
            type: "warning", // Тип окна
            confirmButtonText: "Авторизация",
            cancelButtonText: "Отмена",
            showCancelButton: true, // Показывать кнопку отмены
            closeOnConfirm: false // Не закрывать диалог после нажатия кнопки подтверждения
        },
        function() { // Выполнить действие при нажатии на кнопку подтверждения
            window.location.href = "member.php?act=login";
        }
        );
alert('<?php echo $L['title_empty'];?>');
document.edit.title.focus();
return false;
}
if(document.edit.title.value.length>80 || document.edit.title.value.length<5){
alert('<?php echo $L['f_limit_5_80_characters'];?>');
document.edit.title.focus();
return false;
}
if(document.edit.areaid.value==0){
alert('<?php echo $L['areaid_empty'];?>');
document.edit.areaid.focus();
return false;
}

if(document.edit.content.value==""){
alert('<?php echo $L['content_empty'];?>');
document.edit.content.focus();
return false;
}
if(document.edit.phone.value=="" && document.edit.icq.value=="" && document.edit.email.value==""){
alert('<?php echo $L['given_one_three_contacts'];?>');
document.edit.phone.focus();
return false;
}
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
</div></div>