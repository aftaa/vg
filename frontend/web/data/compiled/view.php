<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><!DOCTYPE html>
<!--[if IE 8 ]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="ru"> <!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title><?php echo $seo['title'];?></title>
    <meta name="viewport" content="width=device-width,initial-scale=0.4,minimum-scale=0.3,maximum-scale=0.8">
    <meta name="description" content="<?php echo $seo['description'];?>">
    <meta name="keywords" content="<?php echo $seo['keywords'];?>">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/unsemantic_v_2.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/base_v_4.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/head3.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/login.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/global_v_2.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/osx1.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/view_prod_v_4.css" type="text/css">
    <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/easyzoom.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="templates/<?php echo $CFG['tplname'];?>/style/rating_v_2.css"/>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="images/ico/apple-touch-icon-precomposed.png">
</head>
<body class="body-background2 content-font dark-color" style="margin:0px auto; padding:0px 0px">

<?php include template(top); ?>

<div id="cardclient" style="display: none;"></div>
<div id="modal_message"
     style="display:none;opacity: 0;    border-radius: 2px;    width: 560px;min-height: 170px;height: auto;"></div>
<section class="page-content">
    <div class="content_site">
        <div class='view_l' itemscope itemtype="http://schema.org/Product">
            <div id="view_left">
                <div id="view_left_top">
                    <div id="products_example">
                        <div id="products">
                            <div class="slides_container">
                                <?php if($images) { ?><?php if(is_array($images)) foreach($images AS $val) { ?>
                                <div class='zoomx slid_zm ' style="width: 500px;height: 342px;background-color: #FFF;">
                                    <a itemprop="image" href="<?php echo $val['path'];?>" class="zoom<?php echo $val['imgid'];?> "
                                       style="display: table-cell;vertical-align:middle;"><img src="<?php echo $val['path'];?>"
                                                                                               alt="Нажмите для увеличения"
                                                                                               data-thumb="<?php echo $val['path'];?>"/></a>
                                </div>
                                <?php } ?>
<?php } ?>

                                <?php if($path_img) { ?>
                                <div class='zoomx'
                                     style="width: 500px;height: 342px;background-color: #FFF;    display: table;vertical-align: middle;">
                                    <a itemprop="image" href="<?php echo $path_img;?>" class="zoom"
                                       style="display: table-cell;vertical-align:middle;"><img src="<?php echo $path_img;?>"
                                                                                               alt="Нажмите для увеличения"
                                                                                               data-thumb="<?php echo $val['path'];?>"/></a>
                                </div>
                                <?php } ?>
                                <?php if(!$path_img) { ?> <?php if(!$images) { ?>
                                <div class='zoomx'
                                     style="width: 500px;height: 342px;background-color: #FFF;    display: table;vertical-align: middle;">
                                    <a href="<?php echo $val['thumb'];?>" class="zoom<?php echo $val['imgid'];?> "
                                       style="display: table-cell;vertical-align:middle;"><img
                                            src="images/ico/no_images.png" alt="Нажмите для увеличения"
                                            data-thumb="<?php echo $val['path'];?>"/></a></div>
                                <?php } ?><?php } ?>
                            </div>
                            <ul class="pagination">
                                <?php if($images) { ?><?php if(is_array($images)) foreach($images AS $val) { ?>
                                <div class='pag_img'>
                                    <li style="margin:1px 1px"><a href="#"><img src="<?php echo $val['path'];?>" alt="<?php echo $title;?>"
                                                                                data-type="thumbs"></a></li>
                                </div>
                                
<?php } ?>
<?php } ?>
                                <?php if($path_img&&!$images) { ?>
                                <div class='pag_img'>
                                    <li style="margin:1px 1px"><a href="#"><img src="<?php echo $path_img;?>" alt="<?php echo $title;?>"
                                                                                data-type="thumbs"></a></li>
                                </div>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div style="clear: both;"></div>
            </div>
            <div id="view_right">
                <div id="view_left_top_1">
                    <div class="name_product">
                        <h1 class="name_product_1 header-font dark-color" itemprop="name"><?php echo $title;?> </h1>
                        <div class='proiz'> Производитель : <?php echo $info['proizvoditel'];?></div>
                        <div id="container" style='    float: right;height: 20px;margin-top:4px;'>
                            <?php  if(!$_userid){echo rating_bar($id,'5','static',$us);}else{ echo rating_bar($id,5,'',$us); }  ?> </div>
                    </div>
                </div>
                <div id="view_right_1">
                    <div class="uoiko" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <strong class="cost_prod" itemprop="price" style="margin-right:0px">
                            <div class="prise_pol">цена :</div>
                            <?php if($price==0) { ?>
                            <div class="nou_cen">Цену уточняйте.</div>
                            <?php } else { ?> <?php echo number_format($price, 0, '.', ' ');?> <span>RUR</span> <?php } ?>
                        </strong><a href="#"
                                    onclick="cardNew('<?php echo $comid;?>', '<?php echo $us;?>,<?php echo $price;?>,<?php echo $title;?>,<?php echo $email;?>,<?php echo $comname;?>');">
                        <div class="zayv">Отправить заявку<i class="icon-paper-plane"></i></div>
                    </a>
                        <div class="emil_but"><a rel="nofollow" href="#">Написать сообщение <i class="icon-pencil"></i></a>
                        </div>
                    </div>
                    <div id="view_left_top_2"><p class="product_perex_tou" itemprop="description"><?php echo $description;?></p>
                    </div>
                    <div id="view_left_top_3"></div>
                </div>
                <div class="page-tab grid-100 tab_cont">
                    <div class="grid-100 product-review"><i class="icon-volume-control-phone"></i>
                        <div class="mop_desk">
                            <div class="knop_sob"><i class="icon-share-alt"></i></div>
                            <div class="social">
                                <div class="ya-share2"
                                     data-services="vkontakte,facebook,odnoklassniki,gplus,twitter"></div>
                            </div>
                        </div>
                        <?php if($CFG['visitor_view']==1 && !$_userid || $_userid) { ?>
                        <div class="product-review-author middle-color" style="width:51%;float:left">
                            <div class="voive_phone"></div>
                            <strong class="dark-color contact"><?php if($phone) { ?><?php echo $phone;?><?php } elseif ($comphone) { ?><?php echo $comphone;?><?php } else { ?><?php echo $L['unknown'];?><?php } ?></strong>
                        </div>
                        <div class="product-review-author middle-color" style="width:51%;float:left">
                            <strong class="dark-color t_c contact"><?php if($icq) { ?><?php echo $icq;?><?php } elseif ($comicq) { ?><?php echo $comicq;?><?php } else { ?><?php echo $L['unknown'];?><?php } ?></strong>
                        </div>
                        <div class="product-review-author middle-color" style="    display: none;width:50%;float:left">
                            <strong class="dark-color contact"
                                    style="color: #425769;font-size: 14px;  font-weight: 600;"><?php if($email) { ?><?php echo $email;?><?php } elseif ($comemail) { ?><?php echo $comemail;?><?php } else { ?><?php echo $L['unknown'];?><?php } ?></strong>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="area_dbl">
                    <div class="product-review-author " style="    padding: 4px 0px 0px 0px;width:92%;float:left">
                        <?php echo $L['area'];?>: <strong style="font-size: 15px;color: #444;" class="dark-color contact"><?php echo $areaname;?></strong>
                    </div>
                    <div class="product-review-author " style="padding: 4px 0px 4px 0px;width:auto;float:left">
                        <?php echo $L['address'];?>: <strong style="font-size: 15px;color: #444;" class="dark-color contact"><?php if($address) { ?><?php echo $address;?><?php } elseif ($comaddress) { ?><?php echo $comaddress;?><?php } else { ?><?php echo $L['unknown'];?><?php } ?></strong>
                    </div>
                    <div class="company" style='display:none'>
                        <div class="voive_phone" style="padding-right: 10px;    margin-left: -4px;"><img
                                src="images/dost.png" style="    margin-top: -8px;"></div>
                        <strong style="font-size: 13px;color: #444;"> По всей России</strong>
                    </div>
                    <div class="adress_t"><a id="map_call" rel="nofollow">на карте</a></div>
                    <div class="dost"><strong><i class="icon-truck"></i><?php echo $harakteristic;?></strong></div>
                    <div class='company'><i class="icon-group"></i><a id="<?php echo $comid;?>" class="comids"
                                                                      href="com_str.php?id=<?php echo $comid;?>"> <?php echo $comname;?></a>
                    </div>
                </div>
            </div>
        </div>
        <?php if($content) { ?>
        <div class="desv">
            <div class='block_op_title'>Полное описание товара</div>
            <div class="desc_prod_v">
                <span><?php echo $content;?></span>
            </div>
        </div>
        <?php } ?>
        <div class="page-tab grid-100 tab_maps">
            <div class="grid-100 product-review">
                <?php if($CFG['map_check'] && $commappoint) { ?>
                <div id="map">
                    <iframe id="map"
                            src="do.php?act=big_map&mark=1&mappoint=<?php echo $commappoint;?>&address=<?php echo $comaddress;?>&height:314"
                            frameborder="0" scrolling="no" height="314" style="margin-bottom:7px;float:left"></iframe>
                </div>
                <?php } else { ?>
                <div id="map"
                     style="height:314px;float:left;text-align:center;padding-top: 112px;font-size: 18px;box-sizing: border-box;">
                    Нет данных о карте
                </div>
                <?php } ?>
            </div>
        </div>
        <div style="clear: both;"></div>
        <div class="block_another">
            <div class='block_another_title'>Похожие товары продавца</div>
            <?php if(is_array($pohozhie)) foreach($pohozhie AS $jq) { ?> <?php if($jq[id]<>$_GET[id]) { ?>
            <div class='product_another hover_t'>
                <div class="product_another_img">
                    <div class="product_another_opus">
                        <a class="" href="view.php?id=<?php echo $jq['id'];?>&us=<?php echo $us;?>">
                            <?php if($jq[thumb]) { ?>
                            <img src="<?php echo $jq['thumb'];?>" alt="<?php echo $jq['title'];?>"/>
                            <?php } else { ?><img src="images/ico/no_images.png" alt="<?php echo $jq['title'];?>"/>
                            <?php } ?></a></div>
                </div>
                <div class="product_another_desc">
                    <h3><a href="view.php?id=<?php echo $jq['id'];?>&us=<?php echo $us;?>">
                        <strong style="text-align:left"><?php echo $jq['title'];?></strong>
                    </a></h3></div>
                <div class="product_another_price">
                    <div class="product_another_price1"><?php if($jq[price]) { ?>
                        <strong><?php echo number_format($jq[price], 0, '.', ' ');?> <?php echo $jq['unit'];?><?php if(!$jq[unit]) { ?><span>RUR</span><?php } ?></strong><?php } ?>
                    </div>
                </div>
            </div>
            <?php } ?> 
<?php } ?>

            <div style="clear: both;"></div>
        </div>
    </div>
    <div style="clear: both;"></div>

</section>

<?php include template(footer); ?>

<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script src="templates/<?php echo $CFG['tplname'];?>/js/easyzoom.js"></script>
<?php if($images) { ?>
<?php if(is_array($images)) foreach($images AS $val) { ?>
<script type="text/javascript">
    jQuery(function ($) {
        $('a.zoom<?php echo $val['imgid'];?>').easyZoom()
    });</script>

<?php } ?>
<?php } else { ?>
<script type="text/javascript">jQuery(function ($) {
    $('a.zoom').easyZoom()
});
</script>
<?php } ?>
<script type="text/javascript">
    var userid_in = '<?php echo $us;?>';
    var infoid = '<?php echo $idw;?>';

    function cardNew(newComId, oldComId) {
        card(oldComId, newComId);
    }

    function card(comid, newComId) {
        var top = $(document).scrollTop() + ($(window).height() * 0.25),
            blmap = $(window).width() / 4,

            left = $(window).width() / 2 - blmap;

        $.ajax({
            url: "card_client.php?comid=" + comid + "&us=" + userid_in + '&realComId=' + newComId + "&infoid=" + infoid,
//data:"id="+s1,
            type: "POST",
            success: function (data) {
                $("#cardclient").html(data);


                $('#overlay1').css('display', 'block').animate({
                    opacity: 0.65,
                }, 300);
                $('#cardclient').css({
                    'top': top,
                    'left': left,
                    'display': 'block'
                });
                $('#cardclient').animate({
                    opacity: 1,
                }, 750);
            },
            error: function () {
                alert("No PHP script: ");
            }
        })


    }

    $(document).ready(function () {


        $('#map_call').click(function () {
            var top = $(document).scrollTop() + ($(window).height() * 0.25),
                blmap = $(window).width() / 4,

                left = $(window).width() / 2 - blmap;

            $('#overlay1').css('display', 'block').animate({
                opacity: 0.65,
            }, 300);
            $('.tab_maps').css({
                'display': 'block',
                'top': top,
                'left': left
            });
            $('.tab_maps').animate({
                opacity: 1,
            }, 750)
        });
        $('#overlay1').click(function () {
            $('#cardclient').css('display', 'none');
            $('#cardclient').animate({
                opacity: 0
            }, 300);
            $('.tab_maps').css('display', 'none');
            $('.tab_maps').animate({
                opacity: 0
            }, 300);
            $('#overlay1').animate({
                opacity: 0,
            }, 300).css('display', 'none')
        })
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        var starsAll = 5;
        var voteAll = 5;
        var idArticle = 5;
        var starWidth = 32;
        var rating = (starsAll / voteAll);
        rating = Math.round(rating * 100) / 100;
        if (isNaN(rating)) {
            rating = 0;
        }
        var ratingResCss = rating * starWidth;
        $("#ratDone").css("width", ratingResCss);
        $("#ratStat").html("Рейтинг: <strong>" + rating + "</strong> Голосов: <strong>" + voteAll + "</strong>");
    <
            ? php
            $used_ip = $sql["used_ip"];
        $ipsArray = explode("|", $used_ips);
        $ip = $_SERVER['REMOTE_ADDR'];
        if (!in_array($ip, $ipsArray)) {
                ?
        >
            var coords;
            var stars;
            $("#rating").mousemove(function (e) {
                var offset = $("#rating").offset();
                coords = e.clientX - offset.left;
                stars = Math.ceil(coords / starWidth);
                starsCss = stars * starWidth;
                $("#ratHover").css("width", starsCss).attr("title", stars + " из 10");
            });
            $("#rating").mouseout(function () {
                $("#ratHover").css("width", 0);
            });
            $("#rating").click(function () {
                starsNew = stars + starsAll;
                voteAll += 1;
                var ratingNew = starsNew / voteAll;
                ratingNew = Math.round(ratingNew * 100) / 100;
                var razn = Math.round((rating - ratingNew) * 200);
                razn = Math.abs(razn);
                var total = Math.round(ratingNew * starWidth);
                $.ajax({
                    type: "GET",
                    url: "action_rait.php",
                    data: {"id": idArticle, "rating": stars},
                    cache: false,
                    success: function (response) {
                        if (response == 1) {
                            $("#ratHover").css("display", "none");
                            $("#ratDone").animate({width: total}, razn);
                            $("#ratBlocks").show();
                            $("#ratStat").html("Рейтинг: <strong>" + ratingNew + "</strong> Голосов: <strong>" + voteAll + "</strong>");
                        } else {
                            $("#ratStat").text(response);
                        }
                    }
                });
                return false;
            });
        <
                ? php
        }
            ?
    >
    });
</script>
<script type="text/javascript">
    var userid = "<?php echo $_userid; ?>";
    var cuserid = "<?php echo $_GET['us']; ?>";
    $(document).ready(function () {
        $('.emil_but').click(function () {
            if (userid == cuserid) {
                alert("нельзя писать самому себе");
                return false;
            }
            if (userid != 0) {
                $.ajax({
                    url: "/messages.php?id=<?php echo $comid;?>&infoid=free&us=" + cuserid,
                    cache: false,
                    beforeSend: function () {
                        $('#modal_message').html('<img class="loading"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>')
                    },
                    success: function (html) {
                        $("#modal_message").html(html)
                    }
                })
            } else {
                swal({
                        title: "Вы не авторизованы", // Заголовок окна
                        text: "Для отправки сообщения авторизуйтесь или зарегистрируйтесь", // Текст в окне
                        type: "warning", // Тип окна
                        confirmButtonText: "Авторизация",
                        cancelButtonText: "Отмена",
                        showCancelButton: true, // Показывать кнопку отмены
                        closeOnConfirm: false // Не закрывать диалог после нажатия кнопки подтверждения
                    },
                    function () { // Выполнить действие при нажатии на кнопку подтверждения
                        window.location.href = "member.php?act=login";
                    }
                );
                return false
            }
            $('#overlay1').css('display', 'block').animate({opacity: 0.65,}, 300);
            $('#modal_message').css('display', 'block');
            $('#modal_message').animate({opacity: 1,}, 750)
        });
        $('#overlay1').click(function () {
            $('#modal_message').css('display', 'none');
            $('#modal_message').animate({opacity: 0,}, 300);
            $('#overlay1').animate({opacity: 0,}, 300).css('display', 'none')
        })
    });
</script>
<script type="text/javascript" language="javascript" src="js/rating.js"></script>
<script src="templates/<?php echo $CFG['tplname'];?>/js/jquery-2.1.1.js"></script>
<script type='text/javascript' src='js/jquery.js'></script>
<script src="templates/<?php echo $CFG['tplname'];?>/js/jquery-1.4.4.min.js"></script>
<script src="templates/<?php echo $CFG['tplname'];?>/js/slides.min.jquery.js"></script>
<script>
    $(function () {
        $('#products').slides({
            preload: true,
            preloadImage: 'img/loading.gif',
            effect: 'slide, fade',
            crossfade: true,
            slideSpeed: 200,
            fadeSpeed: 500,
            generateNextPrev: true,
            generatePagination: false
        });
    });
</script>

<script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
<script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.mop_desk').click(function () {
            $(".social").animate({opacity: 1}, 1000);
        });
        $('body').click(function (e) {
            var div = $(".mop_desk");
            if (!div.is(e.target) && div.has(e.target).length === 0) {
                $(".social").animate({opacity: 0}, 800)
            }
        })
    });
</script>