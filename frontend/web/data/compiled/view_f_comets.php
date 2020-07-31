<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?>
<div id="dert" class="comments1">
<?php if($CFG['visitor_comment']==1 && !$_userid || $_userid) { ?>
<h2>ОСТВИТЬ СООБЩЕНИЕ</h2>
<form class="content-form margin-bottom" name="comment" action="member.php?act=comment_view_f" method="POST" onsubmit="ajax_coment(this); return false;"
style="width: 94%;float: left;margin-left: 5%;margin-bottom: 0px!important;">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
<input type="hidden" name="type" value="article"/>
<div class="form-input" style='display: none;'>
<label for="content1" class="middle-color" > введит ваше имя</label>
<textarea class="textarea-input " name="content1" id="content1" cols="20" rows="1"><?php echo $_username;?></textarea>
</div>
<div class="form-input" style="    padding: 3px 0px 4px;margin-bottom: 0px;margin-top: 2px;height: auto;width: 90%;">
<div id="com_img" style="height: 90px;"> 
<div id="info_com"><div id="info_com_1">
<?php if($_avatar) { ?><img  src="<?php echo $_avatar;?>" itemprop="logo"></div> <?php } else { ?>          
<img  src="data/com/thumb/tumbik.png" itemprop="logo"></div><?php } ?>
</div>  
</div> 
<textarea class="textarea-input dark-color light-bg dop_text" name="content" id="content" cols="10" rows="5" style="height: 70px;width: 85%;"></textarea>
<div class="form-input dop_but">
<label for="checkcode" style="display: none;"> <?php echo $L['code'];?></label>
<button type="submit" class="button_ostoz  middle-gradient dark-gradient-hover">Добавить
</button>
</div>
</form><?php } ?></div>
<div class="comments_block">
<a name="comments"></a>
<?php if($CFG['visitor_comment']==1 && !$_userid || $_userid) { ?>
<?php if($CFG['comment_check']==1) { ?>
<div class="well well-box cream-bg">
<span><?php echo $L['comments_checked_before_adding'];?></span>
</div><?php } ?>
<?php } else { ?>
<div class="alert alert-error">
<img src="../images/otzivi.png" style="float: left;margin: -4px 10px 0px 0px;">    
Сообщение можно добавить только после регистрации.</div>
<div class="topmargin5"></div>
<p>
<a class="buttot_obchi" href="member.php?act=register"><?php echo $L['f_registration'];?></a>&nbsp;&nbsp;&nbsp;&nbsp;
<a class="buttot_obchi" href="member.php?act=login&refer=<?php echo $PHP_URL;?>"><?php echo $L['f_log_in_control_panel'];?></a>
</p>
<?php } ?>
<?php if(is_array($name_comts)) foreach($name_comts AS $n) { ?>
<div id="showcomment"><div class="showcomment_name"><?php echo $n['name'];?>
<div id="com_img"> 
<div id="info_com_1">
<?php if($n[avatar]) { ?><img  src="<?php echo $n['avatar'];?>" itemprop="logo"><?php } else { ?>               
<img src="data/com/thumb/tumbik.png" itemprop="logo"><?php } ?></div>
</div>
<div class="showcomment_data"><?php echo $n['postdate'];?></div></div> <div class="showcomment_cont"><?php echo $n['content'];?></div> </div>

<?php } ?>

<div style="clear: both;"></div>
</div>
<script type="text/javascript">

 /////////////////////////////ajax_comentary
function ajax_coment(sa){
    function xxz(){
 //       var comid_in = '<?php echo $id;?>';
       
$.ajax({
url: "view_f.php?aja=1&id="+isr,
type : "POST",
success: function (dataa) {
$("#dert").html(dataa);
//  document.getElementById("content").focus();
},
error: function(){
alert ("No PHP script: ");
}
})
}
     var isr = "<?php echo $_GET['id'];?>";
    var form_data = $(sa).serialize();
    $.ajax({
url:"member.php?act=comment_view_f",
data:form_data,
type : "POST",
success: function (data) {
     document.getElementById("content").value="";
 setTimeout(xxz, 10 );
},
error: function(){
alert ("No PHP script: ");
}
})


}









function checkcont(){if(document.sendcont.surname.value==""){alert('<?php echo $L['enter_your_name'];?>');document.sendcont.surname.focus();return false}if(document.sendcont.content.value==""){alert('<?php echo $L['enter_content_message'];?>');document.sendcont.content.focus();return false}}function checkcomment(){if(document.comment.content.value==""){alert('<?php echo $L['enter_content_comment'];?>');document.comment.content.focus();return false}}function chkreport(){var radios=document.getElementsByName("types");var resualt=false;for(i=0;i<radios.length;i++){if(radios[i].checked){resualt=true}}if(!resualt){alert("<?php echo $L['select_type_offense'];?>");return false}}function chktype(){if(document.form3.act.value=="delinfo"){return confirm('<?php echo $L['confirm_delete'];?>​​')}}
</script>
<iframe id="icomment" name="icomment" src="comment.php?infoid=<?php echo $id;?>" frameborder="0" scrolling="no" width="0" height=0></iframe>