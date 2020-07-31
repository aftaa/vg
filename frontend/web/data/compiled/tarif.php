<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><?php $member = (new \vsetigoroda\MemberMysqliRepository())->getMemberById($_SESSION['userid']) ?>

<?php foreach ($tariffs as $tariff): ?>
<?php if ($tariff->getName() == 'freeone' || $tariff->getName() == 'free') continue ?>

<div class="blokc_tari">
    <div class="tari_tit"><?= $tariff->getTitle() ?></div>
    <div class="tari_nap">
        <div class="tari_price">
            <?php if (null !== $tariff->getNumVisibleProductsTo()): ?>
            до <span><?= $tariff->getNumVisibleProductsTo() ?></span> товаров
            <?php else: ?>
                &infin;
            <?php endif ?>
        </div>
        <div class="tari_yml">
            <?php if (!$tariff->isAllowedYml()): ?>
            <i class="icon-minus">
                <?php else: ?>
                <i class="icon-ok"><?php endif ?></i>
                <span>yml/xml</span>
        </div>
        <span><?= $tariff->getNumTopDays() ?> <strong>топ. суток</strong></span></div>
    <div class="tari_rub">
        <span><?= sprintf('%d', $tariff->getMonthPrice()->getCost()) ?>
            <strong> <?= $tariff->getMonthPrice()->getCurrency() ?>/мес.</strong>
        </span>
    </div>
    <!--<form id="tarif_l" class="content-form margin-top" name="post" method="post" action=""-->
          <!--enctype="multipart/form-data">-->
        <input id="tarif" value="<?= $tariff->getId() ?>>" name="tarif" type="text" style="display:none"/>
        <?php if ($member->getTariff()->getName() == $tariff->getName()): ?>
            <div class="podkl"><a href="#" class="" onclick="return false;" style="background: #fbed50;color:#4B6E86;font-weight: bold">&nbsp;Ваш тариф &nbsp;</a></div>
        <?php elseif ($member->canChangeTariffTo($tariff)): ?>
            <div class="podkl"><a href="/ajax/change_tariff.php?to=<?= $tariff->getName() ?>&returnTo=<?= urlencode($_SERVER['REQUEST_URI']) ?>&hash=my_tariff" class="ajax">
                &nbsp;&nbsp;&nbsp;&nbsp;Перейти&nbsp;&nbsp;&nbsp;&nbsp;
            </a></div>
        <?php else: ?>
            <div class="podkl"><a href="#" class="disabled" style="background:#aaa">Не доступен</a></div>
        <?php endif ?>
    <!--</form>-->

</div>

<?php endforeach ?>


<script>
    $(function(){
        $('a.ajax').on('click', function () {
            if (confirm('Перейти на выбранный тариф?')) {
                location.href = this.href;
            }
            return false;
        });

        $('a.disabled').click(function () {
            alert('Недостаточно средств');
            return false;
        });
    });
</script>

<style type="text/css">
    .selected {
        background-color: #eee;
    }
</style>


<?php return ?>
<script type="text/javascript">
    function default1() {
        return false;
        $('#tarif_inf').addClass('selected')
        $.ajax({
            url: "license.php?act=tarif_inf",

            cache: false,
            beforeSend: function () {
                $('#div_cont').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>');
            },
            success: function (html) {
                document.title = "<?php echo $L['about'];?> - <?php echo $CFG['webname'];?>";

                $("#div_cont").html(html);
                $("#div_cont").css({
                    'height': 'auto',
                });
            }
        });
        return false;
    }

    window.onload = default1;
</script>

<script type="text/javascript">
    $(document).ready(function () {

        $('#wp_inf').click(function () {
            $('#tarif_inf').removeClass('selected');
            $('#ep_inf').removeClass('selected')
            $.ajax({
                url: "license.php?act=wp_inf",

                cache: false,
                beforeSend: function () {
                    $('#div_cont').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>');
                },
                success: function (html) {
                    document.title = "<?php echo $L['otkaz'];?> - <?php echo $CFG['webname'];?>";

                    $("#div_cont").html(html);
                    $("#div_cont").css({
                        'height': 'auto',
                    });
                    $('#wp_inf').addClass('selected')
                }
            });
            return false;
        });
    });</script>

<script type="text/javascript">
    $(document).ready(function () {

        $('#ep_inf').click(function () {
            $('#wp_inf').removeClass('selected');
            $('#tarif_inf').removeClass('selected')
            $.ajax({
                url: "license.php?act=ep_inf",

                cache: false,
                beforeSend: function () {
                    $('#div_cont').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF" ></>');
                },
                success: function (html) {
                    document.title = "<?php echo $L['about'];?> - <?php echo $CFG['webname'];?>";
                    $("#div_cont").html(html);
                    $("#div_cont").css({
                        'height': 'auto',
                    });
                    $('#ep_inf').addClass('selected')
                }
            });
            return false;
        });
    });</script>

<script type="text/javascript">
    $(document).ready(function () {

        $('#tarif_inf').click(function () {
            $('#wp_inf').removeClass('selected');
            $('#ep_inf').removeClass('selected')
            $.ajax({
                url: "license.php?act=tarif_inf",

                cache: false,
                beforeSend: function () {
                    $('#div_cont').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF" ></>');
                },
                success: function (html) {
                    document.title = "<?php echo $L['about'];?> - <?php echo $CFG['webname'];?>";
                    $("#div_cont").html(html);
                    $("#div_cont").css({
                        'height': 'auto',
                    });
                    $('#tarif_inf').addClass('selected')
                }
            });
            return false;
        });
    });</script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('.quont-minus').click(function () {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            $('.form-submit').css({'display': 'none'});
            $('.info').css({'display': 'block'});
            return false;
        });
        $('.quont-plus').click(function () {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) + 1;
            count = count > 12 ? 12 : count;
            $input.val(count);
            $input.change();
            $('.form-submit').css({'display': 'none'});
            $('.info').css({'display': 'block'});
            return false;
        });
        $('.quont-minus5').click(function () {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 5;
            count = count < 15 ? 15 : count;
            $input.val(count);
            $input.change();
            $('.form-submit').css({'display': 'none'});
            $('.info').css({'display': 'block'});
            return false;
        });
        $('.quont-plus5').click(function () {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) + 5;
            count = count > 500 ? 500 : count;
            $input.val(count);
            $input.change();
            $('.form-submit').css({'display': 'none'});
            $('.info').css({'display': 'block'});
            return false;
        });
        $('.quont-minus10').click(function () {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 5;
            count = count < 35 ? 35 : count;
            $input.val(count);
            $input.change();
            $('.form-submit').css({'display': 'none'});
            $('.info').css({'display': 'block'});
            return false;
        });
        $('.quont-plus10').click(function () {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) + 5;
            count = count > 100 ? 100 : count;
            $input.val(count);
            $input.change();
            $('.form-submit').css({'display': 'none'});
            $('.info').css({'display': 'block'});
            return false;
        });

        $('.quont-minus15').click(function () {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 5;
            count = count < 55 ? 55 : count;
            $input.val(count);
            $input.change();
            $('.form-submit').css({'display': 'none'});
            $('.info').css({'display': 'block'});
            return false;
        });
        $('.quont-plus15').click(function () {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) + 5;
            count = count > 200 ? 200 : count;
            $input.val(count);
            $input.change();
            $('.form-submit').css({'display': 'none'});
            $('.info').css({'display': 'block'});
            return false;
        });


    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        function ajax_fil(url_v, form_id) {
            var msg = $("#" + form_id).serialize();

            alert(msg);
            $.ajax({
                url: url_v,
                cache: false,
                data: msg,
                type: 'POST',
                beforeSend: function (html) { // действие перед отправлением
                    $('#result').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"/>');
                },
                success: function (html) {
                    $("#result").html(html);
                }
            });
        }

        $(".podkl>a").click(function () {
            var url_v = $(this).attr('data-content');
            var form_id = $(".podkl").parent('form').attr('id');

            $(".podkl").each(ajax_fil(url_v, form_id));

        });

    });
</script>
<style type="text/css">
    #blockinfo {
        height: 0px;

    }
</style>

<?php die ?>

<div class="tarifi_zag">
    <span>Тарифы каталога</span>
    <strong><p>При подборе тарифного плана вы&nbsp;можете увеличить период размещения товаров в&nbsp;каталоге и&nbsp;количество топовых<br />
        суток.<br />
        После подбора нужных вам параметров нажмите конпку рассчитать, и&nbsp;вы&nbsp;получите необходимую сумму к&nbsp;оплате, после<br />
        чего, нажав кнопку &laquo;Оплатить&raquo; с&nbsp;вашего баланса на&nbsp;сайте будет снята сумма, указанная при расчете.</p>
    </strong></div>
<?php if(is_array($tarif)) foreach($tarif AS $wer) { ?>
<div class="blokc_tari">
    <div class="tari_tit"><?php echo $wer['rus_name'];?>
    </div>
    <div class="tari_nap">
        <div class="tari_price">товаров <span><?php echo $wer['obv'];?></span></div>
        <div class="tari_yml"><?php if($wer[xml]==0) { ?><i class="icon-minus"><?php } else { ?><i
                class="icon-ok"><?php } ?></i><span>yml/xml</span></div>
        <span><?php echo $wer['topsut'];?> <strong>топ. суток</strong></span></div>
    <div class="tari_rub"><span><?php echo $wer['coast'];?> <strong> руб.месяц</strong></span></div>
    <form id="tarif_l" class="content-form margin-top" name="post" method="post" action=""
          enctype="multipart/form-data">
        <input id="tarif" value="<?php echo $wer['id'];?>" name="tarif" type="text" style="display:none"/>
        <div class="podkl"><a data-content="payment.php?act=confirm_tar&pak=lite">Подключить</a></div>
    </form>

</div>

<?php } ?>


<div class="tarif_block">
    <h3>Старт</h3>
    <script type="text/javascript">
        function chkpayform() {
            if (document.payform.amount.value == "") {
                alert('{$L['
                amount_empty
                ']}'
            )
                ;
                document.payform.amount.focus();
                return false;
            }

            if (document.payform.paycenter.value == 0) {
                alert('{$L['
                payment_system_empty
                ']}'
            )
                ;
                document.payform.paycenter.focus();
                return false;
            }

        }
    </script>
    <style type="text/css">
        #tar_utblock {
            height: 0px;

        }
    </style>