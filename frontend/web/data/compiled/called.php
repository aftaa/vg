<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?> <script type="text/javascript">
$(document).ready(function(){
    var len = $('.blok_boot').children('a').length;
    var h_b = 26;
    var h_bl = len * h_b;
   
    $('.blok_boot').parent().find('.block_navig').css({'height':h_bl+'px'});
});
</script>
        <div class="blok_boot" id="MyText" >
<?php if(is_array($cattpar)) foreach($cattpar AS $ww) { ?>

   <a class="link_s" href="category.php?id=<?php echo $ww['catid'];?>"><?php echo $ww['catname'];?></a><br>


<?php } ?>

    </div>
