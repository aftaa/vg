<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><div class="block_oli_centr" style="padding: 16px 0px 0px 0px;">
<form  action="member.php?act=act_edit_password" name="form" method="POST" autocomplete="off" onsubmit="return check_submit();">
<div class="tui_input">
<label for="oldpassword" class="middle-color label_dat"><?php echo $L['existing_password'];?> </label>
<input type="password" class="custom_input1 dark-color light-bg" name="oldpassword" id="oldpassword" />
</div>
<div class="tui_input">
<label for="password" class="middle-color label_dat"><?php echo $L['new_password'];?> </label>
<input type="password" class="custom_input1 dark-color light-bg" name="password" id="password" />
</div>
<div class="tui_input">
<label for="repassword" class="middle-color label_dat"><?php echo $L['new_password_again'];?> </label>
<input type="password" class="custom_input1 dark-color light-bg" name="repassword" id="repassword" />
</div>
<div class="summi">
<button type="submit" id="submit" name="submit" class="button_nulik"><?php echo $L['change'];?></button>
</div></form></div>
<script type="text/javascript">
function check_submit(){var oldpassword=$("#oldpassword").val();var password=$("#password").val();var repassword=$("#repassword").val();if($("#oldpassword").val()==""&&$("#password").val()!=''){$("#oldpassword").focus();alert("<?php echo $L['enter_existing_password'];?>");return false}if($("#password").val()!=''&&$("#password").val().length<6||$("#password").val().length>12){$("#password").focus();alert("<?php echo $L['f_limit_6_12_characters'];?>")return false}if(password.value!=''&&repassword.value!=''&&repassword.value!=password.value){renewpassword.focus();alert("<?php echo $L['f_passwords_do_not_match'];?>");return false}}
</script>