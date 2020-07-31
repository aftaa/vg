<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><script type="text/javascript">
    function call11() {
        //устанавливаем событие отправки для формы с id=form
        /*if (document.getElementById('username').value=="") {
                alert('Введите фамилию');
                return false;
            };
            if (document.getElementById('ferstname').value=="") {
                alert('Введите имя');
                return false;
            };
                if (document.getElementById('adress').value=="") {
                alert('Введите адрес');
                return false;
            };
                    if (document.getElementById('phone').value=="") {
                alert('Введите контактный номер телефона');
                return false;
            };*/
        var msg = $('#form').serialize();
        $.ajax({
            type: 'POST',
            url: 'card_client.php',
            data: msg,
            success: function (data) {
                $('#cardclient').html(data);
            },
            error: function (xhr, str) {
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
    }

    $('#close_card').click(function () {
        $("#cardclient").css({
            'display': 'none',
        });
    });
</script>
<?php if(!$_POST[act]) { ?>
<div class="zak_tovar">
    <div id="close_card" style="position: absolute;
    top: 0px;
    right: 0px;
    width: 30px;
    height: 30px;
    background: transparent url(templates/<?php echo $CFG['tplname'];?>/js/fancybox/cloze.png) 0px 0;
    cursor: pointer;
    z-index: 1103;"></div>
    <form id="form" action="javascript:void(null);" onsubmit="call11()">
        <div class="zak_tovar_inf">
            <input type="hidden" name="act" value="send">
            <input type="hidden" name="us" readonly value="<?php echo $comid;?>">
            <input type="hidden" name="realComId" readonly value="<?php echo $realComId;?>">
            <input type="hidden" id="infoid" name="infoid" readonly value="<?php echo $infoid;?>">
            <input name="title" readonly value="<?php echo $title;?>">
            <div class="polosi">товар</div>
            <input name="price" readonly value="<?php echo $price;?>">
            <div class="polosi">цена</div>
            <input name="email" readonly value="<?php echo $email_c;?>" type="hidden">
            <!--<div class="polosi">email</div>-->
            <input name="comname" readonly value="<?php echo $comname;?>">
            <div class="polosi">конпания</div>
        </div>
        <div class="zak_tovar_put">
            <label for="username" class="middle-color label_reg">Введите Фамилию</label>
            <input type="text" class="text-input dark-color light-bg" placeholder="Введите Фамилию" name="username"
                   id="username"/>
            <span class="tips" id="tip_span_username"></span>
            <label for="username" class="middle-color label_reg"> Введите имя</label>
            <input type="text" class="text-input dark-color light-bg" placeholder="Введите имя" name="ferstname"
                   id="ferstname"/>
            <span class="tips" id="tip_span_username"></span>
            <label for="username" class="middle-color label_reg"> Введите отчество</label>
            <input type="text" class="text-input dark-color light-bg" placeholder="Введите отчество" name="lastname"
                   id="lastname">
            <label for="username" class="middle-color label_reg"> Введите адрес отправки</label>
            <input type="text" class="text-input dark-color light-bg" placeholder="Введите адрес отправки" name="adress"
                   id="adress">
            <label for="username" class="middle-color label_reg"> Введите контактный телефон</label>
            <input type="text" class="text-input dark-color light-bg" placeholder="Введите контактный телефон"
                   name="phone" id="phone">
            <input href="#" type="submit" class="sumb_zay" value="Отправить">
        </div>
    </form>
</div>
<?php } ?>
<?php if($_POST[act]) { ?>
<div class="message_mod">Сообщение успешно отправлено.</div>
<?php echo $email;?>
<?php } ?>