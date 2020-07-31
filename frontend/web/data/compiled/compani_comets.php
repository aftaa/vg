<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><div class=" grid-100"><div class="comment_winil"><div class="comment_win_1">
<?php if($CFG['visitor_comment']==1 && !$_userid || $_userid) { ?>
<?php if($CFG['comment_check']==1) { ?>
<div class="well well-box cream-bg">
<span class="f_b f_red"><?php echo $L['comments_checked_before_adding'];?></span>
</div><?php } ?>
<div class="cometi_obblo">
<h2 class="subheader-fonty">Оставить отзыв</h2>
<form class="content-form margin-bottom" name="comment" method="POST" onsubmit="ajax_coment(this); return false;" style="margin-bottom: 0px !important;width: 100%;">
<input type="hidden" name="id" value="<?php echo $id;?>">
<input type="hidden" name="type" value="article">
<?php if($_userid) { ?>
<div class="form-input" style='display: none;'>
<textarea class="textarea-input dark-color light-bg" name="content1" id="content1" cols="10" rows="5"><?php echo $name_user;?></textarea>
</div>
<?php } ?>
<label for="content" class="middle-color" style="display: none;"> <?php echo $L['content'];?></label>
<div class="heig"><div class="comen_img"> 
<div class="comenem_img">
<?php if($avatar) { ?><img src="<?php echo $avatar;?>" itemprop="logo">   <?php } else { ?>               
<img src="data/com/thumb/tumbik.png" itemprop="logo"><?php } ?></div>
</div></div>
<textarea class="textarea_coment" name="content" id="content" cols="10" rows="5"></textarea>
<div class="form-input dop_but">
<button type="submit" class="button_ostoz"><?php echo $L['comment_add'];?></button></div>
</form>
<?php } else { ?>
<div class="alert alert-error"><img src="../images/otzivi.png" style="
    float: left;
    margin: -4px 10px 0px 0px;
">Оставить отзыв могут только авторизированные пользователи</div>
<div class="topmargin5"></div>
<p>
<a class="buttot_obchi"  href="member.php?act=register"><?php echo $L['f_registration'];?></a>&nbsp;&nbsp;&nbsp;&nbsp;
<a class="buttot_obchi"  href="member.php?act=login&refer=<?php echo $PHP_URL;?>"><?php echo $L['f_log_in_control_panel'];?></a>
<div class="topmargin5"></div>
<?php } ?>
<div style="clear:both;"></div> </div>    
    
<?php if(is_array($name_comts)) foreach($name_comts AS $n) { ?>
<div id="showcomment" class="showcomment" >
<div class="comm_user_name"><div class="comen_img" > 
<div class="comenem_img" ><?php if($n[avatar]) { ?>
<img src="<?php echo $n['avatar'];?>" itemprop="logo"><?php } else { ?>            
<img src="data/com/thumb/tumbik.png" itemprop="logo"><?php } ?></div>
</div>
<?php echo $n['name'];?>  <div class="comm_data_post"><?php echo $n['postdate'];?></div></div> <div class="comm_desc"><?php echo $n['content'];?></div><?php if($mycom) { ?><div id="com_answer" onclick="ajax_coment_ans(this,<?php echo $n['id'];?>,event);"><i class="icon-comment"></i>ответить</div><?php } ?>
</div>
<?php if(is_array($comment_answ)) foreach($comment_answ AS $n1) { ?>
<?php if($n1['answerid']==$n['id']) { ?>
<div id="showcomment2" class="showcomment2" ><i class="icon-group"></i>
<div class="comm_user_name1"><div class="comen_img" > 
<div class="comenem_img" ><?php if($n1[avatar]) { ?>
<img src="<?php echo $n1['avatar'];?>" itemprop="logo"><?php } else { ?>            
<img src="data/com/thumb/tumbik.png" itemprop="logo"><?php } ?></div>
</div>
<?php echo $n1['name'];?>  <div class="comm_data_post1"><?php echo $n1['postdate'];?></div></div> <div class="comm_desc1"><?php echo $n1['content'];?></div>
</div>
<?php } ?>

<?php } ?>




<?php } ?>

</div></div></div>
 <script type="text/javascript">
 /////////////////////////////ajax_comentary
 $('#overlay1').click(function(){$('#modal_message').css('display','none');$('#modal_message').animate({opacity:0,},300);$('#overlay1').animate({opacity:0,},300).css('display','none')});

 function ajax_coment_ans(sa,forid,event){
      var issd =   '<?php echo $id;?>';
 var  moxc= document.getElementById("modal_message");
   // alert(form_datass);
    $.ajax({
url:"member.php?act=comment_com&for="+forid+"&id="+issd,
//data: form_datass,
type : "POST",
success: function (data) {
$("#modal_message").html(data);
$('#modal_message').css('display','block').animate({opacity:1,},750);
 moxc.style.top = event.pageY+"px";
$('#overlay1').css('display','block').animate({opacity:0.65,},300);
   document.getElementById("content").focus();
},
error: function(){
alert ("No PHP script: ");
}
})
}
function ajax_coment(sa){
var ans = document.getElementById("content");
    var form_data = $(sa).serialize();
    $.ajax({
url:"member.php?act=comment_com",
data:form_data,
type : "POST",
success: function (data) {
 setTimeout(xxz, 10 );
 document.getElementById("content").reset();
   document.getElementById("content").focus();
},
error: function(){
alert ("No PHP script: ");
}
})

}
//
function xxz(){
        var comid_in = '<?php echo $id;?>';
        var usernam_in = "<?php echo $_GET['content1'];?>";
$.ajax({
url: "com_str.php?id="+comid_in+"&type=article&content1="+usernam_in+"&content=966&omly=comment",
type : "POST",
success: function (dataa) {
$("#rescoment").html(dataa);
  document.getElementById("content").focus();
},
error: function(){
alert ("No PHP script: ");
}
})
  document.getElementById("content").focus();
}
function checkcomment(){if(document.comment.content.value==""){alert('<?php echo $L['enter_content_comment'];?>');document.comment.content.focus();return false}}
</script>
<iframe id="icomment" name="icomment" src="comment_com.php?infoid=<?php echo $comid;?>" frameborder="0" scrolling="no" width="0" height="0"></iframe>