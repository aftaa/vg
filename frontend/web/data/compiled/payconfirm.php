<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><!DOCTYPE html>
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="<?php echo $charset;?>">
        <title><?php echo $seo['title'];?></title>
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
        <meta name="description" content="<?php echo $seo['description'];?>">
        <meta name="keywords" content="<?php echo $seo['keywords'];?>">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/users.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/unsemantic_v_2.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/responsive.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/font-awesome/css/font-awesome.min.css" type="text/css">
           <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/head3.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/colors/red.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/base_v_4.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/osx.css" type="text/css">
        <link rel="shortcut icon" href="favicon.ico">
         <script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery-latest.js"></script>
<style type="text/css">
.meny_left_left { box-sizing: border-box;}
.block_oli {box-sizing: border-box;}
</style>
</head>
<body class="body-background2 content-font dark-color">

<?php include template(top); ?>

<section class="page-content">
<div class="block_olllo">

<?php include template(left_tip); ?>

<div class="block_oli">
<h2 class="bigger-header with-border subheader-font" style="    padding-left: 10px;">
<?php echo $L['confirmation_payment'];?></h2>
<div class="with-shadow grid-100 light-bg margin-bottom">
<div class="content-page grid-100">
<form action="member.php?act=send" method="post" name="payform" onSubmit="return chkpayform()">
<input name="paycenter" type="hidden" value="<?php echo $paycenter;?>">
<table class="explanation-table margin-bottom">
<tr class="middle-color">
<th><?php echo $L['payment_system'];?></th>
<td><span class="f_b f_gray"><?php echo $payonline_setting[$paycenter]["name"];?></span></td>
</tr>
<tr class="middle-color">
<th><?php echo $L['amount'];?></th>
<td><span class="f_b px16 f_red"><?php echo $amount;?> <?php echo $CFG['currency'];?></span></td>
<input type="text" class="text-input dark-color light-bg" name="amount" id="amount" value="<?php echo $amount;?>" style="width:100px;display:none"/>
</tr>
<?php if($paycenter=='qiwi') { ?>
<tr class="middle-color">
<th><?php echo $L['mobile'];?> <span class="active-color">*</span></th>
<td>
<input type="text" class="text-input dark-color light-bg" name="to" id="to" style="width:200px" value="" maxlength="11" onKeyUp="value=value.replace(/\D+/g,'')">
<br/><font color="#666666" size="-2"><?php echo $L['mobile_qiwi_tip'];?></font>
</td>
</tr>
<?php } ?>	
</table>
<div class="form-submit t_c">
<input type="submit" name="submit" class="button-normal uppercase light-color active-gradient dark-gradient-hover" value="<?php echo $L['payment_go'];?>" id="submit" />
<input type="button" value="<?php echo $L['f_history_back'];?>" class="button-normal uppercase light-color middle-gradient dark-gradient-hover" onclick="history.back(-1);"/>
</div> 
<input type="text" class="text-input dark-color light-bg" name="memberinfo" id="memberinfo" value="<?php echo $memberinfo;?>" style="width:100px;display:none"/>
</form>
<div class="grid-100 well well-box cream-bg">
<?php echo $L['payconfirm_tip'];?>  
</div>
<div class="topmargin5"></div> 
</div>
</div>　
</div>
</div>
</section>	
<?php if($paycenter=='qiwi') { ?>
<script type="text/javascript">
function chkpayform(){
if(document.payform.to.value==""){
alert('<?php echo $L['mobile_empty'];?>');
document.payform.to.focus();
return false;
}

if(document.payform.to.value.length>11 || document.payform.to.value.length<10){
alert('<?php echo $L['mobile_length_10'];?>');
document.payform.to.focus();
return false;
}
}
</script>
<?php } ?>	

<?php include template(footer); ?>
