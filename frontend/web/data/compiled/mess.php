<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><!DOCTYPE html>
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
    <head>
<meta charset="<?php echo $charset;?>"> 
<meta http-equiv="cache-control" content="no-cache">  
<title><?php echo $L['f_message'];?></title>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/head3.css" type="text/css">
</head>
<body class="body_background2">
<div class="align_center"><div class="alert_soobche">
<?php echo $msg;?><div class="align_center">
<?php if($url=='goback' || $url=='') { ?>
<a class="button_soobche" href="javascript:history.back();"><?php echo $L['f_history_back'];?></a>
<?php } else { ?>
<a class="button_soobche" href="<?php echo $url;?>"><?php echo $L['f_click_here'];?></a>
<script language="javascript">setTimeout("window.location.replace('<?php echo $url;?>')",'1000');</script>
<?php } ?></div></div></div>
</body></html>