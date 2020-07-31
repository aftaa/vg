<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><?php
use vsetigoroda\billing\Account;
?>

<div class='non'>
    <div class="com_zag">Компания</div>
    <div class="com_tex">
        <div class="com_dob"><?php if($comname) { ?><a href="com_str.php?id=<?php echo $comid;?>" target="_blank"><?php echo $comname;?></a><?php } else { ?> <a
                class="nav_com" data-content="postcom.php"><?php echo $L['add_company'];?></a><?php } ?>
        </div>
        <div class="rut">
            <div class="rut_sl">
                <div class="nav_com" data-content="member.php?act=editcom&id=<?php echo $comid;?>"><i class="icon-edit"></i><span>Редактировать</span>
                </div>

            </div>
            <div class="rut_sl">
                <div class="nav_com" data-content="member.php?act=new_list"><i class="icon-rss"></i><span>Новости</span>
                </div>
            </div>
            <div class="rut_sl">
                <div class="nav_com" data-content="member.php?act=vacancy_list"><i
                        class="icon-legal"></i><span>Вакансии</span></div>
            </div>
            <div class="rut_sl">
                <div class="nav_com" data-content="member.php?act=com_top"><i class="icon-circle-arrow-up"></i><span>В топ</span>
                </div>
            </div>
            <?php if($comid) { ?><a href="member.php?act=delcom&id=<?php echo $comid;?>" onClick="if (!confirm('<?php echo $L['confirm_delete'];?>')) {
            var motdel = 1;
            return false;
        }" style="">
            <div class="rut_sl">
                <div class="nav_com"><i class="icon-remove"></i></div>
            </div>
        </a><?php } ?>
        </div>
    </div>
    <div class="schar"></div>
    <div class="bujo">
        <div class="info_left">
            <div class="prosmotr"><span>Просмотров компании: <strong><?php echo $click;?></strong></span></div>
            <!--<div class="info_left_li">-->
            <!--<strong>Топовые сутки : <span><?php echo $userinfo['gold'];?> Сут.</span>-->
            <!--<div class="pop_su" onclick="topsut();">-->
            <!--<div class="dobs_tops"><i class="icon-plus" title="Добавить топовых суток"></i>Добавить</div>-->
            <!--</div>-->
            <!--</strong>-->
            <!--</div>-->
            <?php if($in_top>$now) { ?>
            <div class="info_left_li">
                <strong>Компании в ТОПе осталось : <span><?php if($year) { ?><?php echo $year;?> лeт<?php } ?> <?php echo $day;?> дней <?php echo $hour;?> часов <?php echo $min;?> минут</span></strong>
            </div>
            <?php } ?>
            <?php if(false) { ?>
            <div class="info_left_li">
                <strong>Количество товаров : <span><?php if($inf_s) { ?><?php echo $inf_s;?><?php } else { ?>0<?php } ?>/<?php echo $obv;?> ед.</span></strong>
            </div>
            <?php } ?>
            <?php if(false && $up_limit>0) { ?>
            <div class="info_left_li">
                <strong>Количество объявлений сверх тарифа: <span><?php echo $up_limit;?>(1 товар 0,04 руб)</span></strong>
            </div>
            <?php } ?>
        </div>

        <div class="plat_blok">
            <?php if(true) { ?>
            <?php if($tariff->getMonthPrice()) { ?>
            <div class="plat_strok">
                <div class="plat_zag"><span>Тарифный план</span></div>
                <div class="plat_zag"><span>Товаров в показ</span></div>
                <div class="plat_zag"><span>Стоимость</span></div>
                <div class="plat_zag"><span>Оплачено до</span></div>
                <div class="plat_zag"><span>Осталось дней</span></div>
                <div class="plat_zag"><span>Топовые сутки</span></div>
            </div>
            <div class="plat_strok_nu">
                <div class="plat_tex" style="font-size: 28px;">
                    <?= $tariff->getTitle() ?>
                </div>
                <div class="plat_tex">
                    <?php if (null !== $tariff->getNumVisibleProductsTo()): ?>
                    до <big><b><?= $tariff->getNumVisibleProductsTo() ?></b></big>
                    <?php else: ?>
                    &infin;
                    <?php endif ?>
                </div>
                <div class="plat_tex">
                    <b><?= $tariff->getMonthPrice() ?></b> в месяц<br>
                    <b><?= $tariff->getDayPrice() ?></b> в день
                </div>
                <div class="plat_tex">
                    <?php $date = $member->getAccount()->getNextPaymentDate() ?>
                    <?php if ($date == Account::NO_PAYMENT_DATE): ?>
                        -
                    <?php else: ?>
                        <?= $date ?>
                    <?php endif ?>
                </div>
                <div class="plat_tex" style="font-size: 28px">
                    <?php ($daysLeft = $member->getAccount()->getDaysLeft()) ?>
                    <?php if ($daysLeft == Account::NO_DAYS_LEFT): ?>
                        &infin;
                    <?php else: ?>
                        <?= $daysLeft ?>
                    <?php endif ?>
                </div>
                <div class="plat_tex">
                    <?=number_format($userinfo['gold'], 0, '', ' ')?>
                    <span a href="#" onclick="topsut(); return false;" style="font-size: 11px;">
                        <!--<i class="icon-plus"></i>&nbsp;-->
                        <br>
                        <span style="border-bottom: 1px dotted #466175;display: inline-block;cursor:pointer">добавить</span>
                    </span>
                </div>
            </div>
            <?php } elseif ('freeone') { ?>
            <div>
                <div class="plat_strok plat_zag" style="width: 100%;">
                    <h3>Тарифный план еще не подключен!</h3>
                </div>
            </div>
            <?php } else { ?>
            <div>
                <div class="plat_strok plat_zag" style="width: 100%;">
                    <h3>Тарифный план еще не подключен.</h3>
                </div>
            </div>
            <?php } ?>
            <?php } ?>

            <?php if(false && $time_to1>0) { ?>
            <?php if($tarif!='freeone' && $time_to < $now_sec) { ?>
            <div class="plat_blok">
                <div class="plat_strok">
                    <div class="plat_zag"><span>Тариф</span></div>
                    <div class="plat_zag"><span>Оплачено с</span></div>
                    <div class="plat_zag"><span>Хватит на</span></div>
                    <div class="plat_zag"><span>Стоимость/мес.</span></div>
                </div>
                <div class="plat_strok_nu">
                    <div class="plat_tex"><?php if($paytarif) { ?><?php echo $paytarif;?> <?php if($tarif=='freeone') { ?>
                        <i class="icon-question"
                           title="Размещение компании в каталоге бесплатное, для отображения Ваших товаров необходимо подключить платный тариф"></i><?php } ?><?php } else { ?>-<?php } ?>
                    </div>
                    <div class="plat_tex"><?php if($paydate) { ?><?php echo $paydate;?><?php } else { ?>-<?php } ?></div>
                    <div class="plat_tex"><span><?php if($tarif=='freeone') { ?>- <i class="icon-question"
                                                                           title="Срок не ограничен"></i><?php } else { ?><?php echo $time_to1;?> дней<?php } ?></span>
                    </div>
                    <div class="plat_tex"><?php if($pacet) { ?><?php echo $pacet;?> руб.<?php } else { ?>- <?php if($up_limit) { ?> +<?php echo $limit_pay;?> руб.<?php } ?><?php } ?>
                    </div>


                </div>
            </div>
            <?php } elseif (false) { ?>
            <div class="pred_inf">
                <div class="pred_lif">
                    Добро пожаловать в каталог vseti-goroda Вы можете совершенно бесплатно добавить компанию, новости,
                    вакансиий. Для размещения товаров в каталоге предусмотрены платные пакеты.
                </div>
            </div>
            <?php } ?><?php } elseif (false) { ?>
            <div class="plat_blok">
                <div class="plat_strok" style="text-align: center;line-height: 2;">Внимание, на Вашем счету не
                    достаточно
                    средств, Ваши объявления не отображаются в каталоге! Необходимо пополнить баланс!
                </div>
            </div>
            <?php } ?>

            <?php if(false) { ?>
            <strobg style="    width: 100%;
                float: left;
                text-align: center;
                padding: 10px;
                box-sizing: border-box;
                color: #4B6E86;">В данный момент оплата по тарифным планам не доступна в связи с адаптацией платёжной
                системы.
                <br>На время проведения работ плата за размещение товаров в каталоге не взымается.
            </strobg>
            <?php } ?>
        </div>
    </div>
    <script type="text/javascript">
        var comid = "<?php echo 	$comid;?>";
        var redirect = "<?php echo($redirect); ?>";
        if (redirect == 1) {
            alert("компания добавлена в ТОП");
        }

        function topsut() {
            // swal({
            //         title: "Внимание!", // Заголовок окна
            //         text: "Данная функция временно не доступна", // Текст в окне
            //         type: "warning", // Тип окна
            //         confirmButtonText: "ОК",
            //     }
            // );
            // return false;
            $.ajax({
                url: "member.php?act=topsutki",
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

        $(document).ready(function () {
            var notdel;

            function ajax_fil1(url_v1) {
                var tts = "postcom.php";
                if (notdel == 1) {
                    return false;
                }
                if (!comid && tts != url_v1) {
                    swal({
                            title: "Внимание!", // Заголовок окна
                            text: "Сначала необходимо добавить компанию!", // Текст в окне
                            type: "warning", // Тип окна
                            confirmButtonText: "ОК",
                        }
                    );
                    return false;
                }
                $.ajax({
                    url: url_v1,
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

            $(".nav_com").click(function () {
                var url_v1 = $(this).attr('data-content');
                $("#result").each(ajax_fil1(url_v1));

            });
        });


    </script>