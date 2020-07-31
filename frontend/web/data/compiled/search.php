<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><!DOCTYPE html>
<!--[if IE 8 ]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="ru"> <!--<![endif]-->
<head>
    <title>Результаты поиска</title>
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/unsemantic.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/responsive.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/font-awesome/css/font-awesome.min.css" type="text/css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/font-awesome/css/font-awesome-ie7.min.css">
    <![endif]-->
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/colors/red.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/base_v_4.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/head3.css" type="text/css">
    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="images/ico/apple-touch-icon-precomposed.png">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/menu_v_2.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/osx1.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/category_v_2.css" type="text/css">
    <script type='text/javascript' src='js/jquery.js'></script>
    <script type='text/javascript' src='js/jquery.simplemodal.js'></script>
    <script type='text/javascript' src='js/osx.js'></script>
    <script type="text/javascript">
        function diplay_hide(blockId) {
            if ($(blockId).css('height') == '210px') {
                $(blockId).animate({
                    height: 1128,

                }, 750);
            }
            else {
                $(blockId).animate({
                    height: 210,
                }, 750);
            }
        }
    </script>
    <script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery-latest.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            $('#region').click(function () {


                $.ajax({

                    url: "area_spis.php?act=start_page&base=<?php echo $_GET['base'];?>&keywords=<?php echo $word;?>",

                    cache: false,
                    beforeSend: function () {
                        $('#modal_form2').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF" ></>');
                    },
                    success: function (html) {
                        document.title = "<?php echo $L['about'];?> - <?php echo $CFG['webname'];?>";
                        $("#modal_form2").html(html);
                        $("#modal_form2").css({
                            'height': 'auto',
                        });

                    }
                });
                return false;
            });
        });
    </script>


    <style type="text/css">

        #raiting {
            position: relative;
            height: 16px;
            cursor: pointer;
            width: 83px;
            float: left
        }

        /* Блок рейтинга*/
        #raiting_blank, #raiting_votes, #raiting_hover {
            height: 16px;
            position: absolute
        }

        #raiting_blank {
            background: url(images/reiting_tov.gif);
            width: 83px;
        }

        /* "Чистые" звездочки */
        #raiting_votes {
            background: url(images/reiting_tov.gif) 0 -16px
        }

        /*  Закрашенные звездочки */
        #raiting_hover {
            background: url(images/reiting_tov.gif) 0 -32px;
            display: none
        }

        /*  звездочки при голосовании */
        #raiting_info {
            margin-left: 100px
        }

        #raiting_info img {
            vertical-align: middle;
            margin: 0 5px;
            display: none
        }
    </style>

    <script type="text/javascript">
        $(document).ready(function () {
            function ajax_load(url) {
                $.ajax({

                    url: url,

                    cache: false,
                    beforeSend: function () {
                        $('.search_block').append('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF" ></>');
                    },
                    success: function (html) {
                        document.title = "<?php echo $L['about'];?> - <?php echo $CFG['webname'];?>";
                        $(".search_block").append(html);
                        $(".search_block").css({
                            'height': 'auto',
                        });

                    }
                });
            }

            var screenHeight = $(window).height();

            $(window).scroll(function () {
                var scroll = $(this).scrollTop();
                var divHeight = $(".search_block").height();
                var totalHeight = screenHeight / 2 + scroll;
                var left = divHeight - totalHeight;
                if (left < 10) {

                    var url = $('.key_w').val();
                    ajax_load(url);

                }
            });


            // вся мaгия пoсле зaгрузки стрaницы
            $('#region').click(function () {
                $('body').css('overflow', 'auto'); // лoвим клик пo ссылки с id="go"
                // пoсле выпoлнения предъидущей aнимaции
                $('#overlay2').css('display', 'block')
                    .animate({opacity: 0.65,}, 300);
                $('#modal_form2').css('display', 'block');
                $('#modal_form2').animate({
                    opacity: 1,

                }, 750);
                // убирaем у мoдaльнoгo oкнa display: none;


            });
            /* Зaкрытие мoдaльнoгo oкнa, тут делaем тo же сaмoе нo в oбрaтнoм пoрядке */
            $('#modal_close2, #overlay2').click(function () {
                $('body').css('overflow', 'auto'); // лoвим клик пo крестику или пoдлoжке
                $('#modal_form2').css('display', 'none');
                $('#modal_form2').animate({opacity: 0,}, 300); // делaем ему display: none;
                $('#overlay2')

                    .animate({opacity: 0,}, 300).css('display', 'none');
            });
        });
    </script>
</head>
<body class="body-background2 content-font dark-color">
<div id="modal_form2"><?php echo $area_spis;?>
    <span id="modal_close2">X</span>
</div>
<div id="overlay2"></div>

<?php include template("top"); ?>

<section class="page-content" style="    min-height: 316px;">

    <div class="page-block page-block-top cream-bg grid-container" style='margin-top:8px'>
        <div class="all_c">
            <div style="margin: 25px">
                <h3>Вы искали: <?= htmlspecialchars($s) ?></h3>

                <form style="height:20px">
                    <div style="float: left;">
                        <input type="hidden" name="keywords" value="<?=htmlspecialchars($s)?>">
                        <label>
                            <input type="radio" name="where" value="title"<?php if ('title' == $where) echo ' checked'?>
                            >
                            в названии
                        </label>
                        <label>
                            <input type="radio" name="where"
                                   value="content"<?php if ('content' == $where) echo ' checked'?>
                            >
                            в описании
                        </label>
                        <label>
                            <input type="radio" name="where" value="all"<?php if ('all' == $where) echo ' checked'?>>
                            везде
                        </label>
                    </div>
                    <div style="margin-left:50px;float: left;">
                        <label>
                            <input type="radio" name="where"
                                   value="firmName"<?php if ('firmName' == $where) echo ' checked'?>>
                            в названии фирмы
                        </label>

                    </div>
                </form>
                <script>
                    $(function () {
                        $('input[type=radio]').click(function () {
                            this.form.submit();
                        });
                    });
                </script>

                <?php if (!empty($count)): ?>
                <p>
                    <!--Найдено позиций: <?= $count ?>.-->
                </p>
                <ul>
                    <?php foreach ($results as $result): ?>
                    <?php if ('firmName' != $where): ?>
                    <li>
                        <h4><a target="_blank"
                               href="/view.php?id=<?=$result['infoid']?>&us=<?=$result['userid']?>"><?= $result['title'] ?></a>
                        </h4>
                        <div style="overflow: hidden">
                            <?php if ($result['thumb']): ?>
                            <img alt="" src="<?= $result['thumb'] ?>" width="50" align="left" style="margin-right:10px">
                            <?php endif ?>
                            <small><?= mb_substr(strip_tags($result['content']), 0, 250) ?></small>
                            <?php if (strlen($result['content']) > 250) echo '...' ?>
                        </div>
                        <?php if ($result['price']): ?>
                        <h5 align="right"><?= number_format($result['price'], 0, '', ' ') ?> &#x20BD;</h5>
                        <?php endif ?>

                        <br><br>
                    </li>
                    <?php else: ?>
                    <li>
                        <h4><a target="_blank"
                               href="/com_str.php?id=<?=$result['comid']?>"><?= $result['comname'] ?></a>
                        </h4>
                        <div style="overflow: hidden">
                            <?php if ($result['thumb']): ?>
                            <img alt="" src="<?= $result['thumb'] ?>" width="50" align="left" style="margin-right:10px">
                            <?php endif ?>
                            <small><?=$result['description']?></small>
                            <!--<small><?= mb_substr(strip_tags($result['description']), 0, 1250) ?></small>-->
                            <!--<?php if (strlen($result['description']) > 1250) echo '...' ?>-->
                        </div>
                        <br><br>
                    </li>
                    <?php endif ?>

                    <?php endforeach ?>
                </ul>
                <?php else: ?>
                <br><br>Ничего не найдено
                <?php endif ?>
                <p>
                    <?php for ($start = 1, $dotsBefore = $dotsAfter = false; $start <= $pages = ceil($count / $limit); $start++): ?>

                    <?php

                    if ($pages < 2) {
                        break;
                    }

                    if ($pages > 10) {
                    if (@$_REQUEST['page'] + 1 != $start
                    && @$_REQUEST['page'] + 1 != $start - 1
                    && @$_REQUEST['page'] + 1 != $start - 2
                    && @$_REQUEST['page'] + 1 != $start + 2
                    && @$_REQUEST['page'] + 1 != $start + 1) {
                    if ($start > 5 && $start < $pages - 2) {

                    if (!$dotsBefore && $start < @$_REQUEST['page']) {
                    echo '...';
                    $dotsBefore = true;
                    }
                    if (!$dotsAfter && $start > @$_REQUEST['page']) {
                    echo '...';
                    $dotsAfter = true;
                    }

                    continue;
                    }
                    }
                    } ?>
                    <?php if (@$_REQUEST['page'] + 1 == $start): ?>
                    <b><?=$start?>&nbsp;</b>
                    <?php else: ?>
                    <a href="/do_search.php?keywords=<?= urlencode($s) ?>&page=<?= $start - 1 ?>"><?= $start ?></a>&nbsp;
                    <?php endif ?>
                    <?php endfor ?>
                </p>
            </div>
        </div>
    </div>

</section>

<?php include template("footer"); ?>

<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery.menu-aim.js"></script>
<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/bootstrap.js"></script>
<script type="text/javascript">
    var $menu = $(".dropdown-menu");
    $menu.menuAim({activate: activateSubmenu, deactivate: deactivateSubmenu});

    function activateSubmenu(row) {
        var $row = $(row), submenuId = $row.data("submenuId"), $submenu = $("#" + submenuId),
            height = $menu.outerHeight(), width = $menu.outerWidth();
        $submenu.css({display: "block", top: -1, left: width - 3, height: height - 4});
        $row.find("a").addClass("maintainHover")
    }

    function deactivateSubmenu(row) {
        var $row = $(row), submenuId = $row.data("submenuId"), $submenu = $("#" + submenuId);
        $submenu.css("display", "none");
        $row.find("a").removeClass("maintainHover")
    }

    $(".dropdown-menu li").click(function (e) {
        e.stopPropagation()
    });
    $(document).click(function () {
        $(".popover").css("display", "none");
        $("a.maintainHover").removeClass("maintainHover")
    });
</script>