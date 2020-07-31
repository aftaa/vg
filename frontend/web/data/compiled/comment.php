<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><script type="text/javascript">
function comment(){
parent.document.getElementById("showcomment").innerHTML=document.getElementById("comment").innerHTML;
}
</script>
<body onload="comment()">
<div id="comment">
<?php if($comment) { ?>
<?php if(is_array($comment)) foreach($comment AS $comment) { ?>
<div class="blog-comment middle-color">
<strong class="dark-color"><?php echo $comment['username'];?></strong>
 <?php echo $comment['postdate'];?>
<p><?php echo nl2br($comment[content]);?></p>
</div>


 
<?php } ?>
