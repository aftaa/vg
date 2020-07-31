<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><!DOCTYPE html>
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="ru"> <!--<![endif]-->
    <head>
        <meta charset="<?php echo $charset;?>">
        <title><?php echo $seo['title'];?></title>
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
        <meta name="description" content="<?php echo $seo['description'];?>">
        <meta name="keywords" content="<?php echo $seo['keywords'];?>">
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/unsemantic_v_2.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/responsive.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/font-awesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/users.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/base_v_4.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/head3.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/pages/my_profile.css" type="text/css">
         <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/uploadimg.css">
         <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/chosen_user.css">       
         <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/login.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/osx1.css" type="text/css">
        <link rel="stylesheet" href="templates/default/style/webhostinghub/css/whhg.css" type="text/css">
       <script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
         <script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery-latest.js"></script>
<style type="text/css">
 #blockinfo { height:0px;}
</style>
        <?php if(!$status) { ?>
<script type="text/javascript">
        $(document).ready(function() { // вся мaгия пoсле зaгрузки стрaницы
    window.onload=( function(event){ // лoвим клик пo ссылки с id="go"
        event.preventDefault(); // выключaем стaндaртную рoль элементa
        $('#overlay').fadeIn(400, // снaчaлa плaвнo пoкaзывaем темную пoдлoжку
            function(){ // пoсле выпoлнения предъидущей aнимaции
                $('#modal_form') 
                    .css('display', 'block') // убирaем у мoдaльнoгo oкнa display: none;
                    .animate({opacity: 1, top: '50%'}, 200); // плaвнo прибaвляем прoзрaчнoсть oднoвременнo сo съезжaнием вниз
        });
    });
    /* Зaкрытие мoдaльнoгo oкнa, тут делaем тo же сaмoе нo в oбрaтнoм пoрядке */
    $('#modal_close, #overlay').click( function(){ // лoвим клик пo крестику или пoдлoжке
        $('#modal_form')
            .animate({opacity: 0, top: '45%'}, 200,  // плaвнo меняем прoзрaчнoсть нa 0 и oднoвременнo двигaем oкнo вверх
                function(){ // пoсле aнимaции
                    $(this).css('display', 'none'); // делaем ему display: none;
                    $('#overlay').fadeOut(400); // скрывaем пoдлoжку
                }
            );
    });
});
</script><?php } ?>
<script type="text/javascript">
$(document).ready(function() {
var ava= $('.ava_block').attr('src');
function ajax_ava(){
var formData = new FormData($('#avatar')[0]);
$.ajax({
processData: false,
contentType: false,
url: "member.php?act=add_avatar",
cache: false,
type:'POST',
formid:"avatar",
data:  formData ,
beforeSend: function() {
$('.uz_top_ava ').html('<img class="loading1" style="margin:30px auto;width:auto;height:auto"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"/>');
},
success: function(html) {
   
$(".uz_top_ava ").html(html);

$('head').append($('<link rel="stylesheet" href="templates/default/style/pages/my-profile.css?'+<?php echo $now;?>+'" type="text/css" media="screen" />'));
}
});
return true;}
form = $("#avatar"), upload = $("#add_avatar");
upload.change(function(){
form.each(ajax_ava);
return false;
        });
  //$(".avatar").change(function () {
       
      //    $(".avatar").each(ajax_fil);
         
    //    })
});
</script>

</head>

<body class="body-background2 content-font dark-color" >

<?php include template(top); ?>

<?php if(!$status) { ?><div id="modal_form">
<a href="member.php?act=send_check_email" class="middle-color dark-hover"><span class="f_b f_red" style="color:#000">Завершение регистрации<br></span></a>
<span id="modal_close">X</span> 
<br><br>Вы успешно прошли регистрацию.<br> для добавления компании Вам необходимо подтвердить свой e-mail
<br><br><a href="member.php?act=send_check_email" class="middle-color dark-hover" style="display: block;
float: right;
margin-right: 10px;"><span class="f_b f_red">Подтвердить<br></span></a>
</div><?php } ?>
<div id="overlay"></div>
<section class="page-content ">
<div class="block_olllo"> 

<?php include template(left_tip); ?>

<div class="block_oli">
<div class="uz_top">
<label for="add_avatar"><div class="uz_top_ava " >
<form id="avatar"  name="avatar" action="" method="post" enctype="multipart/form-data" onsubmit="ajax_fil();return false;">
<input class="test" id="test" name="test" type="text" value="jojo" style="display:none">
<input class="avatar" id="add_avatar" name="add_avatar" type="file" style="display:none" accept="image/*">
</form>                         <?php if($ava) { ?>
<div class="crossfade ">
<div class="avat_p"><div class="avat_pop ">		  <img class="regular with-shadow ava_add avatar " src="<?php echo $ava;?>"></div></div>
<div class="rollover"><div class="with-shadow ava_add avatar smen" src="data/com/thumb/tumbik.png" alt="<?php echo $_username;?>" /><div class="smen_vi">добавить изображение</div>
</div></div>
</div><?php } else { ?>  <div class="crossfade ">
<div class="avat_p"><div class="avat_pop ">		  <img class="regular with-shadow ava_add avatar " src="data/com/thumb/tumbik.png"></div></div>
<div class="rollover"><div class="with-shadow ava_add avatar smen" src="data/com/thumb/tumbik.png" alt="<?php echo $_username;?>" /><div class="smen_vi">добавить изображение</div>
</div></div>
</div><?php } ?>
</div></label>
<div class="uz_top_right">
<h1><?php echo $_username;?></h1>
<div class="info_name_li_ur"> <span><?php if($name) { ?><?php echo $name;?></span><?php } else { ?><strong>Имя:</strong><span><?php echo $L['unknown'];?></span><?php } ?></div>
<div class="info_name_li_ur"><span><?php if($family) { ?><?php echo $family;?></span><?php } else { ?><strong>Фамилия:</strong> <span><?php echo $L['unknown'];?></span><?php } ?></div>
<div class="info_left">
<div class="info_bot_li">
<span ><?php echo $L['date_registration'];?>: <?php echo date('Y-m-d-H-i',$userinfo['registertime']);?></span>
</div>
<div class="info_bot_li">
<span >E-mail: <?php echo $userinfo['email'];?></span>
<?php if(!$status) { ?><a href="member.php?act=send_check_email"><span><?php echo $L['not_confirmed'];?></span></a><?php } ?>
</div>
</div></div>
<div class="meny_left_aks"> <a href="member.php?tip=2"><i class="icon-group"></i>Управление компанией</a>
</div>
<div class="pal"></div>
</div></div>
<div class="block_oli_bott">
<div class="kolpo">

     


<div class="kolpo_tu">
<div data-content="member.php?act=info&cheked=2"  class="nav_tabs dark-color active-hover <?php if($act=='info') { ?>selected<?php } ?>">Мои объявления</div>
</div>    
<div  class="kolpo_tu">
<div data-content="post.php?tip=1&cheked=2"  class="nav_tabs dark-color active-hover">Добавить объявления</div>
</div>
<div class="kolpo_tu" style="display: none;">
<a>Отмеченные товары</a>
</div>
<div class="kolpo_boot"><div id="result">
</div></div>
</div></div>

</section>


<script type="text/javascript">
$(document).ready(function(){
    $(".nav_tabs").click(function () {
        $(".nav_tabs").removeClass('selected_tabs_nav');
        $(this).toggleClass('selected_tabs_nav');
         var url_v= $(this).attr('data-content');
        $(this).each(ajax_load(url_v));
    });
  
function funonload() {
    var url_v= "member.php?act=info&cheked=2";
    $(".nav_tabs").each(ajax_load(url_v));
} 
window.onload = funonload;
 function ajax_load(url_v){
      
       var type = url_v;
     
            // формируем поисковый запрос
            var data            = url_v;
            // если введенная информация не пуста
            if(<?php echo $infcount;?>==10 && url_v == "post.php?tip=1&cheked=2"){
                 swal({
            title: "", // Заголовок окна
            text: "У Вас максимально количество объявлений", // Текст в окне
            type: "warning", // Тип окна
            confirmButtonText: "OK",
            closeOnConfirm: false // Не закрывать диалог после нажатия кнопки подтверждения
        }
        
        );return false;
            }
                // вызов ajax
                $.ajax({
                    type: "POST",
                    url:data,
                    data: data,
                    beforeSend: function(html) { // действие перед отправлением
                        
                        $('.kolpo_boot').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"/>');
                        
                   },
                   success: function(html){ // действие после получения ответа
                     
                        $(".kolpo_boot").html(html);
                  }
                });
            
      }
            return false;

    });
</script>
<script type="text/javascript">                  
$(document).ready(function(){
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
$(".tip_menu_nav>div>a").click(function(){ 
var url_v=$(this).attr('data-content');
$("#mol").each(ajax_fil(url_v));
} );
});
</script>  

<?php include template(footer); ?>
