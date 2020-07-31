<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><div class="block_oli_centr" style="padding: 16px 0px 0px 0px;">
<form action="member.php?act=act_modify" name="form" method="POST">
<div class="tui_input">
<label for="email" class="middle-color label_dat">E-mail </label>
<input type="text" class="custom_input1 dark-color light-bg" name="email" id="email" value="<?php echo $userinfo['email'];?>" />
</div>
<div class="tui_input">
<label for="family" class="middle-color label_dat">Фамилия</label>
<input type="text" class="custom_input1 dark-color light-bg" name="family" id="family" value="<?php echo $family;?>" placeholder="<?php echo $family;?>" />
</div>
<div class="tui_input">
<label for="ferstname" class="middle-color label_dat">Имя</label>
<input type="text" class="custom_input1 dark-color light-bg" name="ferstname" id="ferstname" value="<?php echo $ferstname;?>" placeholder="<?php echo $ferstname;?>" />
</div>
<div class="tui_input" style="display:none">
<label for="unp" class="middle-color label_dat">Должность</label>
<input type="text" class="custom_input1 dark-color light-bg" name="unp" id="unp" value="<?php echo $unp;?>" placeholder="<?php echo $unp;?>" />
</div>
<div class="summi">
<button type="submit" class="button_nulik">Изменить</button>
</div>    
</form></div>