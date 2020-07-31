<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><script type="text/javascript">
    $(document).ready(function () {
        function ajax_fil(url_v) {
            $.ajax({
                url: url_v,
                cache: false,
                type: 'POST',
                beforeSend: function (html) { // действие перед отправлением
                    $('#result').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"/>');
                },
                success: function (html) {
                    $("#result").html(html);
                }
            });
        }

        $(".comm_data_post>a").click(function () {
            var url_v = $(this).attr('data-content');
            $(".comm_data_post").each(ajax_fil(url_v));

        });

    });
</script>


<div class="page-block page-block-bottom cream-bg grid-container ">
    <?php if($_userid==15) { ?>
    <div style="height:20px;"><a href="member.php?act=mass_post"><span>Написать всем компаниям</span></a></div>
    <?php } ?>
    <?php if(is_array($all_users)) foreach($all_users AS $n) { ?>
    <div id="showcomment" class="showcomment">
        <div class="comm_data_post">
            <a style="color: #435C71;cursor:pointer"
               data-content="mymessages_in.php?act=<?php echo $n['otheruserid'];?>&ida=<?php echo $n['myuserid'];?>"
               class="dark-color active-hover">
                <!--<div class="meas_huo_one"><?php echo cut_str($n['uname'], 50, '...');?></div>-->
                <div class="meas_p"> <?php echo $n['day'];?> - <?php echo $n['time'];?></div>
                <div class="meas_huo_pk">
                    <div class="meas_huo">
                        <img style="float: left;margin: -1px 10px 0px -8px;" src="../images/sobes.png"><?php if($n['name']==$_username) { ?><?php echo cut_str($n['who'], 50, '...');?><?php } else { ?><?php echo cut_str($n['name'], 50,
                        '...');?><?php } ?>
                    </div>
                    <!--<div class="meas_huo_tu"><?php echo cut_str($n['name'], 50, '...');?></div>-->
                </div>
                <div class="meas_try"> message: <?php echo cut_str($n['content'], 180, '...');?></div>
            </a>
            <?php if(is_array($noread)) foreach($noread AS $n1) { ?> <?php if($n[otheruserid]==$n1[myuserid]) { ?>
            <div class="nyw_maes">(+<?php echo $n1['xxx'];?>)</div>
            <?php } ?> 
<?php } ?>

        </div>
    </div>
    
<?php } ?>

    <?php if($all_users==false) { ?>
    У вас нет переписок.
    <?php } ?>
</div>
