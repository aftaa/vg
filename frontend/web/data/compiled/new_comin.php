<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><div class="poliklo_lirop"></div>
<div  class="poliklo_lir"></div>
<?php if(is_array($new_com)) foreach($new_com AS $val) { ?>
<div class="bloct"><a href="com_str.php?id=<?php echo $val['comid'];?>" rel="nofollow"><div class="comopi_aft"><span><?php echo cut_str($val[comname], 40, '...');?></span> <div class="bloct_bl">
<?php if($val[thumb]) { ?><img  src='<?php echo $val['thumb'];?>' tooltip="<?php echo $val['comname'];?>"   alt="<?php echo $val['comname'];?>"><?php } else { ?><img  src="images/ico/no_images.png" tooltip="<?php echo $val['comname'];?>"    alt="<?php echo $val['comname'];?>"><?php } ?>
</div></div></a> </div> 

<?php } ?>
