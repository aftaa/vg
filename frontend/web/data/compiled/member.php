<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><?php
$test_mode = 'after' == $_SESSION['ussername'];
?><!DOCTYPE html>
<!--[if IE 8 ]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="ru"> <!--<![endif]-->
<head>
    <meta charset="<?php echo $charset;?>">
    <title><?php echo $seo['title'];?></title>

    <!--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->


    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
    <meta name="description" content="<?php echo $seo['description'];?>">
    <meta name="keywords" content="<?php echo $seo['keywords'];?>">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/users.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/unsemantic_v_2.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/responsive.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/head3.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/base_v_4.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/pages/my_profile.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/menu_v_2.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/osx1.css" type="text/css">
    <!-- <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/uploadimg.css" type="text/css"> -->
    <link rel="stylesheet" href="templates/default/style/webhostinghub/css/whhg.css" type="text/css">
    <script type='text/javascript' src='js/jquery.js'></script>
    <script type='text/javascript' src='js/jquery.simplemodal.js'></script>
    <script type='text/javascript' src='js/osx.js'></script>
    <script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery-latest.js"></script>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="images/ico/apple-touch-icon-precomposed.png">
    <script type="text/javascript">
        $(document).ready(function () {
            $('.plat_prodl').click(function (event) {
                event.preventDefault();
                $('#overlay').fadeIn(400,
                    function () {
                        $('#modal_form')
                            .css('display', 'block')
                            .animate({opacity: 1, top: '50%'}, 200);
                    });
            });
            $('#modal_close, #overlay').click(function () {
                $('#modal_form')
                    .animate({opacity: 0, top: '45%'}, 200,
                        function () {
                            $(this).css('display', 'none');
                            $('#overlay').fadeOut(400);
                        }
                    );
            });
            var limit = parseInt('<?php echo $up_limit;?>');
            var month = $("#period1").val();
            $("#calc").text(month * parseInt('<?php echo $pacet;?>'));
            if (<?php echo $up_limit;?> > 0) {
                $("#calc2").text(month * parseInt('<?php echo $limit_pay;?>'));
                var tarif = $("#calc").text();
                var up_limit = $("#calc2").text();
            }
            $("#sum").text(parseInt(tarif, 10) + parseInt(up_limit, 10));
            $("#period1").change(function () {
                var month = $(this).val();
                $("#calc").text(month * parseInt('<?php echo $pacet;?>'));
                if (<?php echo $up_limit;?> > 0) {
                    $("#calc2").text(month * parseInt('<?php echo $limit_pay;?>'));
                    var tarif = $("#calc").text();
                    var up_limit = $("#calc2").text();
                    $("#sum").text(parseInt(tarif, 10) + parseInt(up_limit, 10));
                    ;
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            var ava = $('.ava_block').attr('src');

            function ajax_ava() {
                var formData = new FormData($('#avatar')[0]);
                $.ajax({
                    processData: false,
                    contentType: false,
                    url: "member.php?act=add_avatar",
                    cache: false,
                    type: 'POST',
                    formid: "avatar",
                    data: formData,
                    beforeSend: function () {
                        $('.uz_top_ava ').html('<img class="loading1" style="margin:30px auto;width:auto;height:auto"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"/>');
                    },
                    success: function (html) {

                        $(".uz_top_ava ").html(html);
                        $('head').append($('<link rel="stylesheet" href="templates/default/style/pages/my-profile.css?' + <?php echo $now;?> + '" type="text/css" media="screen" />'
                        ));
                    }
                });
                return true;
            }

            form = $("#avatar"), upload = $("#add_avatar");
            upload.change(function () {
                form.each(ajax_ava);
                return false;
            });
            //$(".avatar").change(function () {

            //    $(".avatar").each(ajax_fil);

            //    })
        });
    </script>
</head>
<body class="body-background2 content-font dark-color">
<div id="modal_form">
    <span class="f_pro">Выберите период продления<br></span>
    <span id="modal_close">X</span>
    <br><br>
    <form id="period" name="month_period" method="post" action="payment.php?pay_u=update">
        <div style="float:left;width:100%;">
            <select id="period1" size="1" name="month" onChange='StatusSelect();'>
                <!--<option disabled>Выберите способ оплаты </option>-->
                <div style="width:100px;height:auto;background-color:#ececec;font-size:14px;border:1px solid #e2e2e2">
                    <option selected value="1">1 месяц</option>
                    <option value="2">2 месяца</option>
                    <option value="3">3 месяца</option>
                    <option value="4">4 месяца</option>
                    <option value="5">5 месяцев</option>
                    <option value="6">6 месяцев</option>
                    <option value="7">7 месяцев</option>
                    <option value="8">8 месяцев</option>
                    <option value="9">9 месяцев</option>
                    <option value="10">10 месяцев</option>
                    <option value="11">11 месяцев</option>
                    <option value="12">12 месяцев</option>
                </div>
            </select>
            <div id="calc" style="    width: 170px;"></div>
            <?php if($up_limit>0) { ?>
            <div id="calc2" style="    padding: 5px 0px 0px 107px;"></div>
            <div id="sum" style="    padding: 2px 0px 0px 105px;"></div>
            <?php } ?>
        </div>
        <button type="submit" class="input-round-submit_prodl middle-color dark-hover">Подтвердить</button>
    </form>
</div>
<div id="overlay"></div>
<body class="body-background2 content-font dark-color">

<?php include template(top); ?>

<section class="page-content ">
    <div class="block_olllo">
        
<?php include template(left_tip); ?>

        <div class="block_oli">
            <div class="uz_top">
                <label for="add_avatar">
                    <div class="uz_top_ava ">
                        <form id="avatar" name="avatar" action="" method="post" enctype="multipart/form-data"
                              onsubmit="ajax_fil(); return false;">
                            <input class="test" id="test" name="test" type="text" value="jojo" style="display:none">
                            <input class="avatar" id="add_avatar" name="add_avatar" type="file" style="display:none"
                                   accept="image/*">
                        </form>
                        <?php if($ava) { ?>
                        <div class="crossfade ">
                            <div class="avat_p">
                                <div class="avat_pop "><img class="regular with-shadow ava_add avatar " src="<?php echo $ava;?>">
                                </div>
                            </div>
                            <div class="rollover">
                                <div class="with-shadow ava_add avatar smen" src="data/com/thumb/tumbik.png"
                                     alt="<?php echo $_username;?>"/>
                                <div class="smen_vi">добавить изображение</div>
                            </div>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="crossfade ">
                        <div class="avat_p">
                            <div class="avat_pop "><img class="regular with-shadow ava_add avatar "
                                                        src="data/com/thumb/tumbik.png"></div>
                        </div>
                        <div class="rollover">
                            <div class="with-shadow ava_add avatar smen" src="data/com/thumb/tumbik.png"
                                 alt="<?php echo $_username;?>"/>
                            <div class="smen_vi">добавить изображение</div>
                        </div>
                    </div>
            </div>
            <?php } ?>
        </div>
        </label>
        <div class="uz_top_right">
            <h1><?php echo $_username;?></h1>
            <div class="info_name_li_ur">
                <span><?php if($name) { ?><?php echo $name;?></span><?php } else { ?><strong>Имя:</strong><span><?php echo $L['unknown'];?></span><?php } ?>
            </div>
            <div class="info_name_li_ur"><span><?php if($family) { ?><?php echo $family;?></span><?php } else { ?><strong>Фамилия:</strong> <span><?php echo $L['unknown'];?></span><?php } ?>
            </div>
            <div class="info_left">
                <div class="info_bot_li">
                    <span><?php echo $L['date_registration'];?>: <?php echo date('d.m.y',$userinfo['registertime']);?></span>
                </div>
                <div class="info_bot_li">
                    <span>E-mail: <?php echo $userinfo['email'];?></span>
                    <?php if(!$status) { ?><a href="member.php?act=send_check_email"><span><?php echo $L['not_confirmed'];?></span></a><?php } ?>
                </div>
                <?php if(1>$stat_opl) { ?>
                <div class="info_bot_li">
                            <span style="color: #d11;
                                  font-size: 15px;">Внимание! Ваш тариф не оплачен, Ваши объявления не отображаются в каталоге!</span>

                </div>
                <?php } ?>
                <!--<div class="info_bot_li">-->
                <!--<span style="color: #d11;-->
                <!--font-size: 15px;">Внимание! Ведутся работы в кабинете пользователя, возможны временные неполадки!</span>-->
                <!--</div>-->
            </div>
        </div>
        <!--<div class="meny_left_aks" style="display:block">-->
            <!--<a href="member.php?tip=1">Персональный аккаунт<i class="icon-user" aria-hidden="true"></i></a>-->
        <!--</div>-->
        <!--<div class="pal"></div>-->
    </div>
    </div>
    <div class="block_oli_bott">
        <div class="kolpo">
            <div id="com" class="kolpo_tu">
                <div><a href="/member.php?act=com#my_company" class="hash">Моя компания</a></div>
            </div>
            <div class="kolpo_tu">
                <div><a href="/member.php?act=info#my_products" class="hash">Мои товары (<?=$numProducts?>)</a></div>
            </div>

            <?php if (@$companyExists): ?>
            <div class="kolpo_tu">
                <div><a href="/post.php#add_product" class="hash">Добавить товар</a></div>
            </div>
            <div class="kolpo_tu">
                <div data-content="parser.php?lv=load" class="nav_tabs1"><a href="parser.php">YML/XML</a></div>
            </div>
            <?php endif ?>

            <div class="kolpo_tu">
                <div><a href="member.php?act=tarif#my_tariff" onclick="//swal({title:'Тарифы и оплата',text:'Данная функция временно не доступна'});return false"
                        class="hash">Тарифы и оплата</a></div>
            </div>
            <div class="kolpo_boot">
                <div id="result">

                </div>
            </div>
        </div>
        <div class="upru">
        </div>
</section>

<?php include template(footer); ?>

<script type="text/javascript">
    var comidx = "<?php echo 	$comid;?>";
    $(document).ready(function () {
        //var url_v = "member.php?act=com";
        //ajax_load(url_v);
        $(".nav_tabs").click(function () {
            return false;

            var url_v = $(this).attr('data-content');
            var tts = "parce.php?lv=load";
            var tts3 = "member.php?act=info";
            var tts2 = "member.php?act=tarif";
            var postUrl = "post.php";
            var usid = "<?php echo $_userid;?>";
            if (false && url_v == tts) {
                swal({
                        title: "", // Заголовок окна
                        text: "Добавление YML/XML файла временно недоступно", // Текст в окне
                        type: "warning", // Тип окна
                        confirmButtonText: "ОК",
                    }
                );
                return false;
            }

            <?php if (!DEV): ?>
        if (url_v == tts2 && usid != 366) {
            swal({
                    title: "", // Заголовок окна
                    text: "Вкладка тарифы временно недоступно", // Текст в окне
                    type: "warning", // Тип окна
                    confirmButtonText: "ОК",
                }
            );
            return false;
        }
            <?php endif ?>

        // alert(comidx);

        if (!comidx && (url_v == tts || url_v == postUrl || url_v == tts2 || url_v == tts3)) {
            swal({
                    title: "Внимание!", // Заголовок окна
                    text: "Сначала необходимо добавить компанию!", // Текст в окне
                    type: "warning", // Тип окна
                    confirmButtonText: "ОК",
                }
            );
            return false;
        }
        $(".nav_tabs").removeClass('selected_tabs_nav');
            $(this).toggleClass('selected_tabs_nav');
            $(this).each(ajax_load(url_v));
        });

        function ajax_load(url_v) {
            var type = url_v;
            // формируем поисковый запрос
            var data = url_v;
            // если введенная информация не пуста
            // вызов ajax
            $.ajax({
                type: "POST",
                url: data,
                data: data,
                cache: false,
                beforeSend: function (html) { // действие перед отправлением
                    $('#result').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"/>');
                },
                success: function (html) { // действие после получения ответа
                    $("#result").html(html);
                }
            });
        }

        return false;
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        function ajax_fil(url_v) {
            var notal = "member.php?act=pay";
            if (notal == url_v) {
//        swal({
//        title: "Внимание!", // Заголовок окна
//                text: "Пополнение баланса временно недоступно!", // Текст в окне
//                type: "warning", // Тип окна
//                confirmButtonText: "ОК",
//        }
//        );
//                return false;
            }
            $.ajax({
                url: url_v,
                type: 'POST',
                beforeSend: function (html) { // действие перед отправлением
                    $('#result').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"/>');
                },
                success: function (html) {
                    $("#result").html(html);
                }
            });
        }

        $(".tip_menu_nav>div>a").click(function () {
            // var url_v = $(this).attr('data-content');
            // $("#mol").each(ajax_fil(url_v));
        });
        $(".nav_com").click(function () {
            // var url_v = $(this).attr('data-content');
            // var tts = "postcom.php";
            // if (!comidx && url_v != tts) {
            //     swal({
            //             title: "Внимание!", // Заголовок окна
            //             text: "Сначала необходимо добавить компанию!", // Текст в окне
            //             type: "warning", // Тип окна
            //             confirmButtonText: "ОК",
            //         }
            //     );
            //     return false;
            // }
            // $("#mol").each(ajax_fil(url_v));
        });
    });
</script>


<script>
    $(function () {
        $('a.hash').on('click', function () {
            //location.href = this.hash;
            $('#result').load(this.href);
            history.pushState(null, this.innerHTML, 'member.php' + this.hash);
            document.title = this.innerHTML;
            return false;
        });

        function loadUrlFromLocationHash() {
            var a = $('a.hash[href$=' + location.hash + ']').get(0);
            $('#result').load(a.href);
            document.title = a.innerHTML;
            // console.log('func', history.state);
        }

        if (!location.hash) {
            location.hash = '#my_company';
        }
        loadUrlFromLocationHash();

        window.onpopstate = function () {
            loadUrlFromLocationHash();
        };
    });
</script>