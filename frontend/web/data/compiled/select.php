<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/webhostinghub/css/whhg.css" type="text/css">
<?php if($step==1) { ?>
<script type="text/javascript">
    $(document).ready(function () {
        function ajax_select_lv(id_elem) {
            $.ajax({
                url: "post.php",
                cache: false,
                type: 'POST',
                data: "step=2&catsel=" + id_elem,
                beforeSend: function () {
                    $('#res_sel').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>');
                },
                success: function (html) {
                    $("#res_sel").html(html);
                }
            });
        }

        $(".catpro_name").click(function () {
            var id_elem = $(this).attr("id");
            $(".catpro_name").each(ajax_select_lv(id_elem))
        });
    });
</script>
<?php } ?>
<?php if($step==2) { ?>
<script type="text/javascript">
    $(document).ready(function () {
        function ajax_select_lv(id_elem) {
            $.ajax({
                url: "post.php",
                cache: false,
                type: 'POST',
                data: "step=3&catsel=" + id_elem,
                beforeSend: function () {
                    $('#res_sel').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>');
                },
                success: function (html) {
                    $("#res_sel").html(html);
                }
            });
        }

        $(".catpro_name").click(function () {
            var id_elem = $(this).attr("id");
            $(".catpro_name").each(ajax_select_lv(id_elem))
        });
    });
</script>
<?php } ?>
<?php if($step==3) { ?>
<script type="text/javascript">
    $(document).ready(function () {
        function ajax_select_lv(id_elem, value_elem) {
            $.ajax({
                url: "post.php",
                cache: false,
                type: 'POST',
                data: "act=post&id=" + id_elem + "&val=" + value_elem,
                beforeSend: function () {
                    $('#res_sel').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>');
                },
                success: function (html) {
                    $("#res_sel").html(html);
                }
            });
        }

        $(".catpro_name").click(function () {
            var id_elem = $(this).attr("id");
            var value_elem = $(this).attr("value");
            $(".catpro_name").each(ajax_select_lv(id_elem, value_elem))
        });
    });
</script>
<?php } ?>
<script type="text/javascript">
    $(document).ready(function () {
        function back() {
            $.ajax({
                url: "post.php",
                cache: false,
                type: 'POST',
                data: "",
                beforeSend: function () {
                    $('#res_sel').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>');
                },
                success: function (html) {
                    $("#res_sel").html(html);
                }
            });
        }

        $(".catpro_name").click(function () {
            var id_elem = $(this).attr("id");
            var value_elem = $(this).attr("value");
            $(".catpro_name").each(ajax_select_lv(id_elem, value_elem))
        });
        $(".goback").click(function () {
            $(".back").each(back())
        });
    });
</script>
<?php if($step==2 || $step==3) { ?>
<span class="goback" style="width: 100%;"><i class="icon-reply"></i></span>
<?php } ?>
<div id="res_sel"><?php if(is_array($catse)) foreach($catse AS $t2) { ?>
    <div id="<?php echo $t2['catid'];?>" value="<?php echo $t2['parentid'];?>" class="catpro_name"><i class="<?php echo $t2['catimg'];?>"></i><?php echo $t2['catname'];?>
    </div>
    
<?php } ?>

</div>     