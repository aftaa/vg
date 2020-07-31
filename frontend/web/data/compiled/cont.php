<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><form class="content-form margin-bottom" action="cont.php?act=cont" name="cont" method="POST" autocomplete="off" onsubmit="return check_submit();">
<div class="tui_input">
<label for="title" class="middle-color label_dat"><?php echo $L['theme'];?> </label>
<input type="text" class="custom_input1 dark-color light-bg" name="title" id="title" />
</div>
<div class="tui_input">
<label for="content" class="middle-color label_dat"><?php echo $L['f_message'];?> </label>
<textarea class="custom_input1 dark-color light-bg" name="content" id="content" placeholder="<?php echo $L['f_message_content'];?>" style="height:100px"></textarea>
</div> 
<div class="tui_input">
<label for="surname" class="middle-color label_dat"><?php echo $L['your_name'];?> </label>
<input type="text" class="custom_input1 dark-color light-bg" name="surname" id="surname" placeholder="<?php echo $L['your_name'];?>" value="<?php echo $membersurname;?>"/>
</div>
<div class="tui_input">
<label for="membermail" class="middle-color label_dat">E-mail </label>
<input type="text" class="custom_input1 dark-color light-bg" name="membermail" id="membermail" value="<?php echo $membermail;?>"/>
</div>
<div class="summi">
<input type="submit" class="button_nulik" name="submit" value="<?php echo $L['send'];?>" />
</div></form>
<div class="all" id="sidebar-mobile">
<nav class="submenu">
<ul class="expandable-menu">
<?php if(!empty($CFG['mailspam'])) { ?>
<li><a class="dark-color active-hover"><span title="E-mail"><?php echo $CFG['mailspam'];?></span></a>
</li><?php } ?>
<?php if(!empty($CFG['phone'])) { ?>
<li>
<a class="dark-color active-hover">Тел.&nbsp;&nbsp;<span title="<?php echo $L['phone'];?>"><?php echo $CFG['phone'];?></span></a>
</li><?php } ?>
<?php if(!empty($CFG['icq'])) { ?>
<li>
<a class="dark-color active-hover">ICQ&nbsp;&nbsp;<span title="ICQ"><?php echo $CFG['icq'];?></span></a>
</li><?php } ?></ul></nav></div>
<script type="text/javascript">
function check_submit()
{if(document.cont.title.value==""){alert('<?php echo $L['enter_theme'];?>');document.cont.title.focus();
return false;}
if(document.cont.content.value==""){alert('<?php echo $L['enter_content_message'];?>');document.cont.content.focus();
return false;}
if(document.cont.surname.value==""){alert('<?php echo $L['enter_your_name'];?>');document.cont.surname.focus();
return false;}
if(document.cont.membermail.value==""){alert('<?php echo $L['email_empty'];?>');document.cont.membermail.focus();
return false;}}
</script>