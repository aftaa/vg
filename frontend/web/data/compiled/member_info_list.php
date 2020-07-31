<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery-latest.js"></script>
<script type="text/javascript">
    var psge = "<?php echo($pages); ?>"
    if (redirect == 1 && psge == 1) {
        swal({
                title: "", // Заголовок окна
                text: "Товар успешно удален.", // Текст в окне
                type: "warning", // Тип окна
                confirmButtonText: "ОК",
                showCancelButton: false, // Показывать кнопку отмены
                closeOnConfirm: false // Не закрывать диалог после нажатия кнопки подтверждения
            }
        );
    }
    $(document).ready(function () {
        $(".plink").click(function () {
            elementClick = $(".plink").attr("id");
            destination = $('.zagalovok').offset().top;
            var id_elem = $(this).attr("id");
            let url = "member.php?act=info_l&page=" + id_elem;
            console.log(url);
            $.ajax({
                url: url,
                cache: false,
                type: 'POST',
                data: {key1: $("#filter").serializeArray(), search: $("#search").serializeArray()},
                beforeSend: function () {
                    $('#result').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>');
                },
                success: function (html) {
                    $("#result").html(html);
                    window.history.pushState(null, null, 'http://vseti-goroda.ru/member.php?act=info&page=' + id_elem);
                    $('body').animate({scrollTop: destination}, 750);
                }
            });
            return false;
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".editinfo").click(function () {

            elementClick = $(".plink").attr("id");
            destination = $('.zagalovok').offset().top;
            var urls = $(this).attr("data-cont");
            var uv = $(this).attr('value');
            if (uv == "del") {
                if (!confirm('Операция необратима. Хотите продолжить?')) {
                    return false;
                }
            }
            if (uv == "del_m") {
                if (!confirm('Операция необратима. Хотите продолжить?')) {
                    return false;
                }
                var msg1 = new FormData;
                $('#all_i').find('input:checkbox:checked').each(function () {
                    var clickId = this.id;
                    msg1.append(clickId, $(this).val());
                });
            }
            if (uv == "del_m") {
                var dat = msg1;
            } else {
                var dat = $("#filter").serializeArray()
            }

            $.ajax({
                url: urls,
                cache: false,
                type: 'POST',
                data: dat,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $('.kolpo_boot').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>');
                },
                success: function (html) {
                    $(".kolpo_boot").html(html);
                    window.history.pushState(null, null, 'http://vseti-goroda.ru/member.php?act=info&page=' + id_elem);
                    $('body').animate({scrollTop: destination}, 750);
                }
            });
        });
    });
    $(document).ready(function () {
        $("#butcat").click(function () {
            var elems = document.getElementById('catfil');
            elems.style.display = "block";
            $.ajax({
                url: "member.php?act=info_cat",
                cache: false,
                type: 'POST',
                data: $("#filter").serializeArray(),
                beforeSend: function () {
                    $('#catfil').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>');
                },
                success: function (html) {
                    $("#catfil").html(html);
                }
            });
        });
    });


    $(document).ready(function () {
        function ajax_filsd() {
            $.ajax({
                url: "member.php?act=info_l&search=yes",
                cache: false,
                type: 'POST',
                data: $("#search").serializeArray(),
                beforeSend: function () {
//$('#result').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"/>');
                },
                success: function (html) {
                    $("#result").html(html);
                }
            });
        }

        $("#search").keyup(function () {
            var e = e || window.event;
            if (e.keyCode === 13) {
                $("#search").each(ajax_filsd);
            }
        });
    });
</script>
</head>
<h2 class="zagalovok"><?php if($tip==1) { ?>
    <div class="info_left_li" style="    padding: 0px 0 0 10px;">
        Доступное количество объявлений:<span> <?php echo $cinff;?>/10</span>
    </div>
    <?php } ?><?php if($tip!=1) { ?>
    <div id="butcat" onclick="categ();"><i class="icon-th-list"></i></div>
    <div class="plinker" id="<?php echo $page;?>">Все категории</div>
    <?php if($catnamefil) { ?><span class="vibr_cat"><i class="icon-mail-forward cat_i"></i><?php echo $catnamefil;?></span> <?php } ?>
    <div style="display:none;" id="catfil"></div>
    <div class="sortirovka" style="     width: 310px;   float: right;    margin: 4px 10px 10px 0px;">
        <input type="text" class="text-input1 search" id="search" value="<?php echo $_POST['search'];?>" name="search"
               placeholder="Поисковая фраза + Enter" style="padding: 7px 12px;border-radius: 2px;margin: 0px;">
        <div onclick="clearx();">Сброс</div>
    </div>
    <?php } ?>
</h2>
<?php if($tip==1) { ?><?php if($infos==false) { ?>
<h2 class="zagalovok">
    <div class="info_left_li" style="width: 60%;">
        <div class="kolpo_tu" style="margin-right:15px;    padding-bottom: 6px;">Размещай объвления в барахолке
            совершенно бесплатно
        </div>
        <div class="kolpo_tu">
        </div>
    </div>
</h2><?php } ?><?php } ?>
<div id="all_i">
    <?php if(is_array($infos)) foreach($infos AS $val) { ?>
    <?php if($val[is_top]) { ?>
    <div class="well_tovar">
        <?php } else { ?>
        <div class="well_tovar"><?php } ?>
            <input class="hylik" type="checkbox" id="aa<?php echo $val['id'];?>" name="<?php echo $val['userid'];?>" value="<?php echo $val['id'];?>"
                   onclick="dunc(<?php echo $val['id'];?>);"></input>
            <div class="well_tovar_avblok">
                <div class="well_tovar_av"><?php if($val[thumb]) { ?><img src="<?php echo $val['thumb'];?>"><?php } else { ?><img
                        src="images/ico/no_images.png"><?php } ?>
                </div>
            </div>
            <div class="well_tovar_title">
                <?php if($val[is_pro]) { ?><i title="<?php echo $L['published_recomend'];?>" class="icon-thumbs-up active-color"></i><?php } ?>
                <?php if(!$val[is_check]) { ?><i title="<?php echo $L['on_moderation'];?>" class="icon-ban-circle"></i><?php } ?>
                <?php if($tip==0) { ?>
                <a class="dark-color active-hover" href="view.php?id=<?php echo $val['id'];?>&us=<?php echo $val['userid'];?>" target="_blank"><?php echo $val['title'];?></a>
                <?php } else { ?><a class="dark-color active-hover" href="view_f.php?id=<?php echo $val['id'];?>"
                         target="_blank"><?php echo $val['title'];?></a><?php } ?>
            </div>
            <div> <?php echo $val['catname'];?></div>
            <div class="well_tovar_data"><?php echo $val['postdate'];?></div>
            <div class="cri">
                <div id="che<?php echo $val['id'];?>" class="well_tovar_upr">
                    <a class="editinfo" data-cont="member.php?act=editinfo&id=<?php echo $val['id'];?>"><i
                            class="icon-pencil"></i></a>
                    <a class="editinfo" data-cont="member.php?act=delinfo&id=<?php echo $val['id'];?>" value="del"><i
                            class="icon-remove"></i></a>
                    <?php if($tip==0) { ?>
                    <a class="editinfo" data-cont="member.php?act=top&id=<?php echo $val['id'];?>"><i
                            class="icon-circle-arrow-up"></i></a><?php } ?>
                </div>
            </div>
            <span style="float: right;margin-top: 9px;margin-right: 35px;">Просмотры: <?php echo $val['click'];?></span>
            <?php if($val[is_top]>$now) { ?><span style="float: right;margin-top: 6px;margin-right: 35px;"><i
                    class="icon-circle-arrow-up"></i>  до <?php echo date('d.m.Y H:i', $val[is_top]);?></span><?php } ?>
        </div>
        
<?php } ?>

    </div>
    <div id="dels" style="display:none;">
        <a class="editinfo" data-cont="member.php?act=delinfo&id=mass" value="del_m"><i class="icon-remove"></i></a>
    </div>
</div>
<div class="pagelink"><?php for ($j = 1; $j<$pages; $j++) {
if ($j>=$start && $j<=$end) {
    if ($j==($page+1)) echo '<a id="' . $j . '" class="plink" href="#"><strong
            style="color: #72849c;font-weight: 600;font-size: 17px;">' . $j .
        '</strong></a> &nbsp; ';
    else echo '<a id="' . $j . '" class="plink" href="#">' . $j . '</a> &nbsp; ';}} ?>
</div>
<div class="pois">
    <span><i class="icon-pencil"></i>— редактировать товар</span>
    <span><i class="icon-remove"></i>— удалить товар</span>
    <?php if($tip==0) { ?>
    <span><i class="icon-circle-arrow-up"></i>— поднять в топ</span>
    <?php } ?>
</div>
<script type="text/javascript">
    function dunc(a) {
        var sidd;
        //   document.getElementById('dels').style.display='block';
        if ($("#aa" + a).attr("checked") == 'checked') {
            document.getElementById('che' + a).style.display = 'none';
        } else {
            document.getElementById('che' + a).style.display = 'block';
        }
        $('#all_i').find('input:checkbox:checked').each(function () {
            sidd = "dddd";
        });
        if (sidd == undefined) {
            document.getElementById('dels').style.display = 'none';
        } else {
            document.getElementById('dels').style.display = 'block';
        }
    }

    function clearx(a) {
        document.getElementById("search").value = '';
        $.ajax({
            url: "member.php?act=info_l",
            cache: false,
            type: 'POST',
            data: $("#search").serializeArray(),
            beforeSend: function () {
//$('#result').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"/>');
            },
            success: function (html) {
                $("#result").html(html);
            }
        });
    }
</script>