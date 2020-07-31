<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><script type="text/javascript">

    document.onwheel = function (e) {
//alert(e.target.className);
        if (e.target.id != 'asd') return;
        var area = e.target;
        var delta = e.deltaY || e.detail || e.wheelDelta;
        if (delta < 0 && area.scrollTop == 0) {
            e.preventDefault();
        }
        if (delta > 0 && area.scrollHeight - area.clientHeight - area.scrollTop <= 1) {
            e.preventDefault();
        }
    };

    function ctrlEnter(event, formElem) {
        if (event.keyCode == 10) {
            ajax_otrp(formElem);

        }
    }

    var count = '<?php echo($cont12); ?>';
    $("#mesasga").html(count);
    ///    $("#nom").html(nmoney);
    var userid_in = '<?php echo $_userid;?>';

    var ouruser = document.getElementById("user");


    function ajax_otrp(sa) {
        var form_data = $(sa).serialize();
        $.ajax({
            url: "member.php?act=messages",
            data: form_data,
            type: "POST",
            success: function (data) {
                setTimeout(wert, 50);
            },
            error: function () {
                alert("No PHP script: ");
            }
        })
        document.getElementById(sa.id).reset();

        function wert() {
            $.ajax({
                url: "mymessages_in.php?act=" + ouruser.value + "&ida=" + userid_in,
                type: "POST",
                success: function (dataa) {
                    //  alert("конец");
                    $("#result").html(dataa);
                    document.getElementById("content").focus();
                },
                error: function () {
                    alert("No PHP script: ");
                }
            })
            document.getElementById("content").focus();
        }

        document.getElementById("content").focus();

    }

    function wert123() {

        $.ajax({
            url: "mymessages_in.php?act=" + ouruser.value + "&ida=" + userid_in + "&asds=ajax",
            type: "POST",
            success: function (dataa) {
                //  alert("конец");
                $("#asd").html(dataa);
                document.getElementById("content").focus();
            },
            error: function () {
                alert("No PHP script: ");
            }
        })
        document.getElementById("content").focus();
        var scrollHeightdiv = Math.max(document.getElementById('asd').scrollHeight);
        document.getElementById('asd').scrollTop = scrollHeightdiv;
        var scrollHeightdiv = Math.max(document.getElementById('asds').scrollHeight);
        document.getElementById('asds').scrollTop = scrollHeightdiv;
    }


    var scrollHeightdiv = Math.max(document.getElementById('asd').scrollHeight);
    document.getElementById('asd').scrollTop = scrollHeightdiv;
    var scrollHeight = Math.max(
        document.body.scrollHeight, document.documentElement.scrollHeight,
        document.body.offsetHeight, document.documentElement.offsetHeight,
        document.body.clientHeight, document.documentElement.clientHeight
    );
    window.scrollTo(0, scrollHeight);


    window.onload = function () {
        setTimeout(getMessage, 800);
        setInterval(getMessage, 10000);
        $('#message_block, .link_mess').mouseenter(function () {
            $('#message_block, .link_mess').css({
                'display': 'block',
                'opacity': '1'
            });
            $('#message_block, .link_mess').stop(true);
            return false
        });
        $('#message_block, .link_mess').mouseout(function () {
            $('#message_block, .link_mess').animate({
                'display': 'block',
                'opacity': '0'
            }, 2000);
            return false
        });

    }
</script>

<div class="meaed">
    <div class="button_bec" style="    display: none;">
        <a href="mymessages.php" class="button_nulik"> Вернуться к сообщениям</a>
    </div>
    <label for="content1" class="uzirr"> <?php echo $myname;?></label>
</div>
<div id="chatss" classs="me_seg_go">
    <div class="ower_oli_mesag " id="asd">
        <?php if(is_array($all_users)) foreach($all_users AS $n) { ?>
        <div class="mes_showcomment">
            <div id="com_img">
                <div id="info_com">
                    <div id="info_com_1">
                        <?php if($n[avatar]) { ?><img src="<?php echo $n['avatar'];?>" itemprop="logo"> <?php } else { ?>
                        <img src="data/com/thumb/tumbik.png" itemprop="logo"> <?php } ?>
                    </div>
                </div>
            </div>
            <div class="mes_user_name">
                <?php echo $n['Myname'];?>
            </div>
            <div class="mes_data_post"><?php echo $n['day'];?> - <?php echo $n['time'];?></div>
            <div class="mes_comm_desc"><?php echo $n['content'];?></div>
        </div>
        
<?php } ?>

    </div>
    <form class="me_seg" id="wertss" name="comment" action="" method="POST" onkeypress="ctrlEnter(event, this);"
          onsubmit="ajax_otrp(this); return false">
        <input type="hidden" name="from" value="<?php echo $were;?>">
        <input type="hidden" name="musername" value="<?php echo $myname;?>">
        <input type="hidden" name="username" value="<?php echo $otherusername;?>">
        <input type="hidden" id="user" name="userid" value="<?php echo $oueruser;?>">
        <input type="hidden" name="day" value="<?php echo $day;?>">
        <input type="hidden" name="time" value="<?php echo $time;?>">
        <div class="me_seg_nu">
            <div id="com_img">
                <div id="info_com">
                    <div id="info_com_1">
                        <?php if($avatar) { ?><img src="<?php echo $avatar;?>" itemprop="logo"></div>
                    <?php } else { ?>
                    <img src="data/com/thumb/tumbik.png" itemprop="logo"></div>
                <?php } ?>
            </div>
        </div>
        <textarea class="me_seg_tu" name="content" id="content" cols="10" rows="5"></textarea>
        <div class="button_nulik_mes">
            <input type="submit" class="button_nulik">
        </div>
    </form>
</div>