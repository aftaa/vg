<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><!DOCTYPE html>
<!--[if IE 8 ]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="ru"> <!--<![endif]-->
<head>

    <script type="text/javascript">
        function card(comid) {
            var top = $(document).scrollTop() + ($(window).height() * 0.10),
                blmap = $(window).width() / 4,
                left = $(window).width() / 2 - blmap;
            $.ajax({
                url: "card_client.php?comid=" + comid,
//data:"id="+s1,
                type: "POST",
                success: function (data) {
                    $("#cardclient").html(data);
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

        function map_call() {
        }
    </script>
    <meta charset="<?php echo $charset;?>">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
    <script type="text/javascript" language="javascript"
            src="templates/<?php echo $CFG['tplname'];?>/js/slides.min.jquery.js"></script>
    <script src="templates/<?php echo $CFG['tplname'];?>/js/easyzoom.js"></script>
    <?php if($images) { ?>
    <?php if(is_array($images)) foreach($images AS $val) { ?>
    <script type="text/javascript">
        jQuery(function ($) {
            $('a.zoom<?php echo $val['imgid'];?>').easyZoom();
        });
    </script>
    
<?php } ?>

    <?php } else { ?>
    <script type="text/javascript">
        jQuery(function ($) {
            $('a.zoom').easyZoom();
        });
    </script>
    <?php } ?>
    <script type="text/javascript"> $(function () {
        $("#products").slides({
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
<body>
<div class="content_site">
    <div id="view_left">
        <div id="view_left_top" style='height:350px;box-shadow:none'>
            <div id="products_example">
                <div id="products">
                    <div class="slides_container" style="width:436px;margin-left: -26px;">
                        <?php if($images) { ?><?php if(is_array($images)) foreach($images AS $val) { ?>
                        <div class='zoomx slid_zm ' style="width: 436px;height: 334px;background-color: #FFF;">
                            <a itemprop="image" href="<?php echo $val['path'];?>" class="zoom<?php echo $val['imgid'];?> "
                               style="display: table-cell;vertical-align:middle;"><img style="max-width: 434px;"
                                                                                       src="<?php echo $val['path'];?>"
                                                                                       alt="Нажмите для увеличения"
                                                                                       data-thumb="<?php echo $val['path'];?>"/></a>
                        </div>
                        <?php } ?>
<?php } ?>

                        <?php if($path_img&&!$images) { ?>
                        <div class='zoomx'
                             style="width: 434px;height: 334px;background-color: #FFF;    display: table;vertical-align: middle;">
                            <a href="<?php echo $path_img;?>" class="zoom<?php echo $val['imgid'];?> "
                               style="display: table-cell;vertical-align:middle;"><img style="    max-width: 434px;"
                                                                                       src="<?php echo $path_img;?>"
                                                                                       alt="Нажмите для увеличения"
                                                                                       data-thumb="<?php echo $val['path'];?>"/></a>
                        </div>
                        <?php } ?>
                        <?php if(!$path_img) { ?> <?php if(!$images) { ?>
                        <div class='zoomx'
                             style="width: 442px;height: 334px;background-color: #FFF;    display: table;vertical-align: middle;">
                            <a href="<?php echo $val['thumb'];?>" class="zoom<?php echo $val['imgid'];?> "
                               style="display: table-cell;vertical-align:middle;"><img style="    max-width: 434px;"
                                                                                       src="images/ico/no_images.png"
                                                                                       alt="Нажмите для увеличения"
                                                                                       data-thumb="<?php echo $val['path'];?>"/></a>
                        </div>
                        <?php } ?><?php } ?>
                    </div>
                    <ul class="pagination" style='width:444px;margin-top: 8px;margin-left:-28px;padding:0px'>
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
    </div>
    <div id="view_right">
        <div id="view_left_top_1"><?php echo $title;?></div>
        <div class="prooz"><span>Производитель:</span> <?php echo $info['proizvoditel'];?></div>
        <div id="view_left_top_3">
            <strong><?php if(!$price OR $price==0) { ?>Цену уточняйте.<?php } ?><?php if($price) { ?><?php echo number_format($price, 0, '.', ' ');?><?php if($unit) { ?> <?php echo $unit;?><?php } else { ?> <span>RUR</span><?php } ?><?php } ?></strong>
            <a href="#" onclick="card('<?php echo $us;?>,<?php echo $price;?>,<?php echo $title;?>,<?php echo $email_c;?>,<?php echo $comname;?>');">
                <div class="zayv">Отправить заявку<i class="icon-paper-plane"></i></div>
            </a>
        </div>
        <div class="konti">
            <?php if($CFG['visitor_view']==1 && !$_userid || $_userid) { ?>
            <div class="w_phone">
                <i class="icon-volume-control-phone"></i>
            </div>
            <div class="toil_blokks" style="    width: auto;">
                <div class="toil_tel"><?php if($phone) { ?><?php echo $phone;?><?php } elseif ($comphone) { ?><?php echo $comphone;?><?php } else { ?><?php echo $L['unknown'];?><?php } ?></div>
                <div class="toil_tel"><?php if($icq) { ?><?php echo $icq;?><?php } elseif ($comicq) { ?><?php echo $comicq;?><?php } else { ?><?php echo $L['unknown'];?><?php } ?></div>
            </div>
            <?php } ?>
        </div>
        <div class="adr">
            <div class="adres_d"><?php echo $L['area'];?>:<strong><?php echo $areaname;?></strong>
                <div class="adress_t" style="    display: none;"><a href="#tab_maps" id="map_call" class="adert"
                                                                    rel="nofollow" onclick="map_call();">на карте</a>
                </div>
            </div>
            <div class="adres_d"><?php echo $L['address'];?>: <strong><?php if($address) { ?><?php echo $address;?><?php } elseif ($comaddress) { ?><?php echo $comaddress;?><?php } else { ?><?php echo $L['unknown'];?><?php } ?></strong>
            </div>
        </div>
        <div class="dost"><img src="images/van.png" tooltip="Доставка"
                               title="Доставка"><strong><?php echo $harakteristic;?></strong></div>
    </div>
    <div id="maps_info" class="page-tab grid-100 tab_maps" style="width: 400px;float: right;    display: none;">
        <div class="grid-100 product-review">
            <?php if($CFG['map_check'] && $mappoint) { ?>
            <div id="map" style="    width: 400px;height: 210px;">
                <iframe id="map"
                        src="do.php?act=big_map&mark=1&mappoint=<?php echo $mappoint;?>&address=<?php echo $address;?>&height:210&width:400"
                        frameborder="0" scrolling="no" height="210"
                        style="margin-bottom:7px;float:left;height: 210px;width: 400px;"></iframe>
            </div>
            <?php } else { ?>
            <div id="map"
                 style="height:314px;float:left;text-align:center;padding-top: 112px;font-size: 18px;box-sizing: border-box;">
                Нет данных о карте
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="poln">Полное описание товара<span><?php echo $content;?></span></div>
    <div style="clear:both;"></div>
</div>
<script src="templates/<?php echo $CFG['tplname'];?>/js/easyzoom.js"></script>
<?php if(is_array($images)) foreach($images AS $val) { ?>
<script type="text/javascript">
    jQuery(function ($) {
            $('a.zoom<?php echo $val['imgid'];?>').easyZoom();
        }
    );
</script>

<?php } ?>

<div id="cardclient" style="display: none;"></div>
</body>
</html>