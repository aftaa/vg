<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><!DOCTYPE html>
<!--[if IE 8 ]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="ru"> <!--<![endif]-->
<head>
    <meta charset="<?php echo $charset;?>">
    <title><?php echo $seo['title'];?></title>
    <meta name="viewport" content="width=device-width,initial-scale=0.5,minimum-scale=0.4,maximum-scale=0.9">
    <meta name="description" content="<?php echo $seo['description'];?>">
    <meta name="keywords" content="<?php echo $seo['keywords'];?>">
    <meta property="fb:pages" content="1714962875480077"/>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/osx1.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/unsemantic_v_2.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/head_index.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/base_v_4.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/index_v_15.css?" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/webhostinghub/css/whhg.css" type="text/css">
</head>
<body class="body-background2 content-font dark-color" onload="default1()" lang="ru">

<?php include template(top); ?>

<script type="text/javascript">
    var wwer = 2;

    function more(ssas) {
        $.ajax({
            url: "more.php?id=" + ssas,
            data: "id1s=" + wwer,
            type: "POST",
            success: function (data) {
                $("#MyText11").html(data);
            },
            error: function () {
                alert("No PHP script: ");
            }
        })
        document.getElementById('MyText11').style.display = 'block';
        document.getElementById('buton').style.display = 'none';
        wwer = wwer + 1;
    }

    function new_com(ssas) {
        if (document.getElementById('new_com').style.display != 'none') {
            var urls = "ind_new_com.php?act=newcomindex";
        } else {
            var urls = "ind_new_com.php?act=popcomindex";
        }
        $.ajax({
            url: urls,
            data: urls,
            type: "POST",
            success: function (data) {
                $("#comss").html(data);
                if (document.getElementById('new_com').style.display != 'none') {
                    document.getElementById('new_com').style.display = 'none';
                    document.getElementById('pop_com').style.display = 'block';
                } else {
                    document.getElementById('new_com').style.display = 'block';
                    document.getElementById('pop_com').style.display = 'none';
                }
            },
            error: function () {
                alert("No PHP script: ");
            }
        })
    }
</script>
<div class="fon" onmouseover=" document.getElementById('MyTextzz12').style.display = 'none';"><img src="images/fon.jpg">
</div>
<section class="page-content">
    <div class="akc">

        Экономте время и деньги, размещайтесь в каталоге vseti-goroda.ru совершенно бесплатно
        <span><a href="/license.php?act=tarif_info" style="color: #55646f;color: #ffffff;">/ подробнее...</a></span>

        <div class="pol_lir"></div>
    </div>
    <div class="line_razrivi">
        <div class="raz_navi" style="display:none">
            <span>Товаров<?php echo $summa;?> 350 652</span>
        </div>
        <?php if(is_array($cats_list)) foreach($cats_list AS $cat) { ?>
        <!--onmouseover="Show(<?php echo $v['catid'];?>,event); return false;"-->
        <div class="blok_navi">

            <div class="img_navi">
                <i class="<?php echo $cat['catimg'];?>"></i>
            </div>
            <span><?php echo $cat['catname'];?></span>
            <div class="load_cat" id="<?php echo $v['catid'];?>" style="display:none;width:100%;min-height:100px"><i
                    class="icon-remove close" style="float: right;margin-right: 2px;display: none;z-index:100;"></i>
                <div class="img_navi">
                    <i class="<?php echo $cat['catimg'];?>"></i>
                </div>
                <span><?php echo $cat['catname'];?></span> <?php if(is_array($cat[children])) foreach($cat[children] AS $child) { ?><a class="link_s"
                                                                            href="category.php?id=<?php echo $child['id'];?>"
                                                                            style="display:block;min-width: 251px;"><?php echo $child['name'];?></a><br>
                
<?php } ?>

            </div>
            <div class="clear"></div>

        </div>
        
<?php } ?>

        <div class="uihhihihi" id="MyTextzz12" style="display:none;">
        </div>
        <div class="li_bo"><a href="/allcat.php">все категории...</a></div>
    </div>
    <div class="ref_iwe">
        <div class="rihgg"><a href="category.php?ki=2180">
            <div class="ispi"><img src="../images/dress.png">
            </div>
            <div class="pluss block_nomy_po "><span>Рубашки</span><strong>Выделяйтесь стильно</strong>
            </div>
        </a></div>
        <div class="right_nomy">
            <div class="block_nomy_img">
                <img src="../images/nout.png" tooltip="Ноутбуки"></div>
            <a href="category.php?ki=1463">
                <div class="block_nomy_po"><span>Ноутбуки</span><strong>Сделайте вашу жизнь быстрее</strong>
                </div>
            </a></div>
        <div class="right_nomy "><a rel="nofollow" href="/category.php?ki=1423">
            <div class="block_nomy_img">
                <img src="../images/nauch.png" style="/* margin: 0px 0px 0px auto; */" tooltip="Наушники и гарнитуры">
            </div>
            <div class="block_nomy_po"><span>Наушники</span><strong>Для настоящих меломанов</strong></div>
        </a></div>
        <div class="right_nomy"><a href="/category.php?ki=1409">
            <div class="block_nomy_img">
                <img src="../images/planh.png" tooltip="планшеты"></div>
            <div class="block_nomy_po"><span>Планшеты</span><strong>Сделайте вашу жизнь практичнее</strong></div>
        </a></div>
        <div class="right_nomy">
            <a href="/category.php?up=1&amp;ki=1424">
                <div class="block_nomy_img">
                    <img src="../images/audio_spea.png" tooltip="MP3-плееры"></div>
                <div class="block_nomy_po"><span>Акустика</span><strong>Ваш дом, ваши правила</strong></div>
            </a></div>
    </div>
    <?php if(false) { ?>
    <div class="pot_com"><a href="com_str.php?id=<?php echo $topcomban['comid'];?>" rel="nofollow">
        <div class="pot_img">
            <div class="pot_img_in"><?php if($topcomban[thumb]) { ?><img src="<?php echo $topcomban['thumb'];?>"><?php } else { ?><img
                    src="images/ico/no_images.png"><?php } ?>
            </div>
        </div>
        <div class="pot_zar"><?php echo $topcomban['comname'];?></div>
        <div class="pot_title"><?php echo $topcomban['description'];?></div>
        <div class="pot_adres"><i class="icon-map-marker"></i><?php echo $topcomban['address'];?></div>
    </a></div>
    1
    <?php } else { ?>
    <div class="pot_com" style="height:1px;background: transparent;border:none;">
    </div>
    <?php } ?>


    <div class="vacancii_comk content_none">
        <h2>Популярные товары</h2>
        <div class="popu_cat">
            <span>Все</span><span>Ноутбуки</span><span>Инструмент</span><span>Для ванны и душа</span><span>Телевизоры</span><span>Диваны и кресла</span>
        </div>
    </div>
    <div class="popular_cat" style="margin-top: -10px;">
        <?php if(is_array($top_info)) foreach($top_info AS $val) { ?>
        <div class="top_op hovermo-hover">
            <a rel="nofollow" href="view.php?id=<?php echo $val['info_id'];?>&us=<?php echo $val['userid'];?>">
                <div class="product_card_img">
                    <div class="block_right_podim_totrig"><?php if($val[thumb]) { ?><img id="laz" class="lazy"
                                                                               src="images/smen_pol.gif"
                                                                               data-original="<?php echo $val['thumb'];?>"
                                                                               alt="<?php echo $val['title'];?>"><?php } else { ?><img
                            class="lazy" src="images/smen_pol.gif" data-original="images/ico/no_images.png"
                            alt="<?php echo $val['title'];?>"><?php } ?>
                    </div>
                </div>
                <div class="product_name"><strong cols='10'><?php echo cut_str($val['title'], 60, '');?></strong></div>
                <div class="top_op_price"><?php echo $val['price'];?> <?php echo $val['unit'];?> <?php if(!$val[unit]) { ?><span>RUB</span><?php } ?></div>
            </a>
            <div class="top_coms"><a href="com_str.php?id=<?php echo $val['comid'];?>"><?php echo cut_str($val[comname], 30, '...');?></a></div>
        </div>
        
<?php } ?>

        <div id="toTop"> ^ Наверх</div>
        <div class="top_bol" id="buton"><a onclick="more(<?php echo $val['id'];?>)"><span>Показать ещё</span></a></div>
        <div id="MyText11" style="display:none;">
        </div>
        <script type='text/javascript' src='js/jquery.js'></script>
        <script type="text/javascript" src="js/jquery.lazyload.min.js"></script>
        <script type="text/javascript">$("img.lazy").lazyload({threshold: 10, effect: "fadeIn"});</script>
    </div>




    <div class="vacancii_comk">
        <h2>Наши компании</h2>
        <h2 id="new_com" onclick="new_com();" class="nev">показать популярные</h2>
        <h2 id="pop_com" style="display:none;" onclick="new_com();" class="nev">показать новые</h2>
    </div>
    <div id="comss" class="comopi">
        <div class="poliklo_lirop"></div>
        <div class="poliklo_lir"></div>
        <?php if(is_array($topreg)) foreach($topreg AS $val) { ?>
        <div class="bloct"><a href="com_str.php?id=<?php echo $val['comid'];?>" rel="nofollow">
            <div class="comopi_aft"><span><?php echo cut_str($val[comname], 40, '...');?></span>
                <div class="bloct_bl">
                    <?php if($val[thumb]) { ?><img src='<?php echo $val['thumb'];?>' tooltip="<?php echo $val['comname'];?>" alt="<?php echo $val['comname'];?>"><?php } else { ?><img
                        src="images/ico/no_images.png" tooltip="<?php echo $val['comname'];?>" alt="<?php echo $val['comname'];?>"><?php } ?>
                </div>
            </div>
        </a></div>
        
<?php } ?>

    </div>

    <?php if(count($comnew)) { ?>
    <div class="ind_com">
        <div class="ind_news">
            <div class="vacancii_comk">
                <h2>Новости компаний</h2>
            </div>

            <?php if(is_array($comnew)) foreach($comnew AS $val) { ?>
            <div class="ind_news_blo"><a rel="nofollow" href="article.php?act=view&id=<?php echo $val['idnews'];?>">
                <div class="ind_news_title"><?php echo cut_str($val[newsname], 55, '...');?></div>
                <div class="ind_news_des"><?php echo cut_str($val[intro], 90, '...');?></div>
                <div class="prosmotr"><i class="icon-eye-open" tooltip="Просмотров"></i><span> <?php echo $val['click'];?></span>
                    <i class="icon-comment"></i><span><?php echo $val['comment'];?></span><i class="icon-thumbs-up"></i><span> <?php echo $val['like'];?></span>
                </div>
            </a>
            </div>
            
<?php } ?>


            <div class="sto"><a href="/article.php">... все события</a></div>
        </div>
    </div>
    <?php } ?>

</section>


<script type="text/javascript">
    $(function () {
        $(window).scroll(function () {

            if ($(this).scrollTop() > 150) {
                $('#toTop').fadeIn();
            } else {
                $('#toTop').fadeOut();
            }
        });
        $('#toTop').click(function () {
            $('body,html').animate({scrollTop: 0}, 800);
        });
    });
</script>

<script type="text/javascript">
    var s;
    var s1;
    var sas = 0;
    s = 2;

    function Show(s1, event) {
        var disp = document.getElementById('MyTextzz12').style.display;
        if (disp == 'none' || sas != s1) {
            sas = s1;
            $.ajax({
                url: "called.php",
                data: "id=" + s1,
                type: "POST",
                success: function (data) {
                    $("#" + s1).html(data);

                },
                error: function () {
                    alert("No PHP script: ");
                }
            });
        }
    }
</script>

<script type="text/javascript">
    $(document).ready(function () {
        var div = $(".blok_navi");
        var et = $('.blok_navi');

        function close_nav(et) {
            $(et).children('.load_cat').animate({'height': 'hide',}, 400);
            $('.blok_navi').find(".close").css({'display': 'none'});
            $('.blok_navi').find('.load_cat').css({'display': 'none', 'width': '100%', 'left': '0px'});
            return false;
        }

        function open_n(es) {
            var of = "";
            var left = "";
            var len = $(es).find('.link_s').length;
            $(es).find(".close").css({'display': 'block'});
            of = $(es).children().offset().left;
            if (of < 400) {
                var left = '-2px';
            } else if (of > 400 && of < 800) {
                var left = '-35px';
            } else {
                var left = '-83px';
            }
            ;$(es).children('.load_cat').animate({
                'width': '250px',
                'height': 'show',
                'top': '-2px',
                'left': left
            }, 400).css({
                'display': 'block',
                'position': 'absolute',
                'z-index': '10',
                'border': '1px solid rgba(0, 0, 0, 0.55)',
                'color': '#3E6473',
                'background': '#fff'
            });
            return false;
        }

        $('.blok_navi').click(function (e) {
            if (event.target.className !== 'icon-remove close') {
                var es = $(this);
                close_nav(es);
                open_n(es);
            } else {
                close_nav(et);
            }
            return true;
        });
        $(document).mouseup(function () {
            close_nav(et);
        });
        $('.link_s').click(function () {
            close_nav(et);
        });
    });

    new_com();
</script>

<?php include template(footer); ?>
