<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><script type="text/javascript">
    document.getElementById("content").focus();

    function ajax_messaa(sa, er) {
        var uss = document.getElementById("id");
        var us = '<?php echo($_usercom); ?>';
        if (us == uss.value) {
            alert("Нельзя писать самому себе");
            return false;
        }
        var msg1 = new FormData;
        $('#nessa').find(' textarea, input, select').each(function () {
            var clickId = this.id;
            msg1.append(clickId, $(this).val());
        });
        $.ajax({
            url: "member.php?act=messages",
            data: msg1,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {
                $('#modal_message').html(data);
                setTimeout('$("#overlay1").click()', 1000);
            },
            error: function () {
                alert("No PHP script: ");
            }
        })
    }
</script>


<div id="com_img" style="margin-top: 55px;margin-left: 12px;width: 60px;margin-right: 12px;">
    <div id="info_com">
        <div id="info_com_1" style="    width: 60px;height: 44px;">
            <?php if(!$_avatar) { ?><img style="max-width: 60px; max-height: 44px;    border-radius:0px;"
                               src="data/com/thumb/tumbik.png" itemprop="logo"><?php } else { ?><img
                style="max-width: 60px; max-height: 44px;border-radius:0px;" src="<?php echo $_avatar;?>" itemprop="logo"><?php } ?>
        </div>
    </div>
</div>
<form class="content-form margin-bottom" name="nessa" id="nessa" method="POST" onsubmit="ajax_messaa(); return false;"
      style="    width: 80%;float: left;margin-left: 0px;margin-bottom: 0px!important;">
    <?php if($us) { ?>
    <input type="hidden" name="id" id="id" value="<?php echo $_GET['id'];?>">
    <?php } else { ?>
    <input type="hidden" name="id" id="id" value="<?php echo $_GET['infoid'];?>">
    <input id="usisi" type="hidden" id="uid" name="uid" value="<?php echo $_GET['us'];?>">
    <input type="hidden" name="infoid" id="infoid" value="<?php echo $_GET['infoid'];?>">
    <?php } ?>
    <input type="hidden" name="type" id="type" value="article">
    <input type="hidden" name="day" id="day" value="<?php echo $day;?>">
    <input type="hidden" name="time" id="time" value="<?php echo $time;?>">
    <div class="form-input" style='display: none;'>
        <label for="content1" class="middle-color"> ваше имя</label> -- <?php echo $myname;?>
    </div>
    <div class="form-input" style="width: 100%;margin: 10px 0px 0px 0px;">
        <label for="content" class="middle-color"
               style="float: left;width: 100%;color: #4d5154;font-weight: 500;font-size: 13px;"> Введите текст
            сообщения</label>
        <textarea class="textarea-input dark-color light-bg" name="content" id="content" cols="10" rows="5"
                  style='width: 100%;height: 70px;border-radius: 3px;box-shadow: rgb(206, 206, 206) 0px 0px 0px;border: 1px solid rgb(166, 171, 175);margin-top: 7px;padding: 8px 10px;font-size: 14px;float: left;'></textarea>
    </div>

    <button type="submit" class="button_immel">Отправить</button>
</form>


 
