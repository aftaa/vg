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
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
    <meta name="description" content="<?php echo $seo['description'];?>">
    <meta name="keywords" content="<?php echo $seo['keywords'];?>">
    <link rel="stylesheet" href="templates/default/style/users.css" type="text/css">
    <link rel="stylesheet" href="templates/default/style/unsemantic_v_2.css" type="text/css">
    <link rel="stylesheet" href="templates/default/style/responsive.css" type="text/css">
    <link rel="stylesheet" href="templates/default/style/font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="templates/default/style/head3.css" type="text/css">
    <link rel="stylesheet" href="templates/default/style/base_v_4.css" type="text/css">
    <link rel="stylesheet" href="templates/default/style/pages/my_profile.css" type="text/css">
    <link rel="stylesheet" href="templates/default/style/menu_v_2.css" type="text/css">
    <link rel="stylesheet" href="templates/default/style/osx1.css" type="text/css">
    <link rel="stylesheet" href="templates/default/style/parsing.css" type="text/css">
    <link rel="stylesheet" href="templates/default/style/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="templates/default/style/bootstrap-treeview.css" type="text/css">
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="images/ico/apple-touch-icon-precomposed.png">
    <script type='text/javascript' src='js/jquery.js'></script>
    <script type='text/javascript' src='js/jquery.simplemodal.js'></script>
    <script type='text/javascript' src='js/osx.js'></script>
    <script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery-latest.js"></script>
</head>

<body class="body-background2 content-font">

<?php include template(top); ?>

<section class="page-content">
    <div class="table left_width">
        <?php if(false && $syncing ) { ?>
        <a href="#" class="toggle_parse_top" data-on='Показать форму' data-off='Скрыть форму'>Показать форму</a>
        <?php } ?>

        <?php if(!$is_ok ) { ?>
        <div class="alert alert-danger" role="alert"><?php echo $error;?></div>
        <?php } ?>
        <div class="table_top left_width" style="<?php if(false && $syncing ) { ?> display: none; <?php } ?>">
            <div id="add_cat_m">
                <form id="goadded" class="content-form" name="goadded" action="parser.php" method="post"
                      enctype="multipart/form-data">
                    <!--<div class="count">-->
                    <!--<input type="file" class="custom_input1" name="xml" id="xml"  multiple="false">-->
                    <!--</div>-->
                    Адрес импортируемого XML/YML-документа:
                    <br>
                    <input type="text" class="custom_input1" name="xml_url" id="xml_url" value="<?php echo $memberYmlUrl;?>"
                           placeholder=""/>

                    <input style="display:none" type="text" name="lv" id="lv" value="load" placeholder=""/>
                    <input type="text" name="cou" id="cou" value="<?php echo $counts;?>" placeholder="" style="display:none"/>
                    <button type="submit" id="adad" style="margin-top: 4px;">Загрузить файл</button>
                </form>
            </div>
        </div>
        <?php if(empty($emptyDataOnUrl)) { ?>
        <?php if($syncing ) { ?>

        <div id="table_count left_width">
            <div class="count">
                Найдено: категорий &mdash; <span id="str"><?php echo $info['cat_count'];?></span>,
                товаров &mdash; <span id="str_info"><?php echo $info['offer_count'];?></span>.
            </div>
        </div>

        <ul type="circle">
            <li>&ndash; Сопоставьте разделы вашего сайта к категориям нашего сервиса:</li>
            <li>&ndash; Если раздел состоит из подразделов, при сопоставлении подразделы получат категорию содержащего их раздела;</li>
            <li>&ndash; Сопоставление запоминается сервисом &mdash; автоматическое обновление вашего прайс-листа происходит ежедневно.</li>
            <li>&ndash; Если вы не укажете категорию сервиса разделу, товары не будут добавлены. Вы сможете сделать это позже.</li>
        </ul>
        <form id="start_parse" class="content-form" action="parser.php" method="post">
            <input type="text" name="conditions" value="<?php echo $counts;?>" id="import_json" style="display:none"/>
            <button type="submit" id="adad">Импортировать категории и товары</button>
        </form>
        <br>
        <?php if($foundOldConditions) { ?>
        <div>
            <br>
            Найдены сопоставления категорий!
            <br>
        </div>
        <?php } ?>
        <div id="tree" style="display: inline-block; width: 100%"></div>

        <?php } ?>
        <?php if($start_parsing_proses ) { ?>
        <div>
            <span class="proses_info"></span>
            <span class="total"></span>
            <span class="loaded"></span>
        </div>
        <?php } ?>
        <?php } else { ?>
        По URL <a href="<?php echo $url;?>" target="_blank"><?php echo $url;?></a> не найденно данных.
        <?php } ?>
    </div>
</section>

<div id="cat_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <span class="select_cat"></span>
                    ->
                    <span class="system_cat"></span>
                    <button type="button" class="btn btn-success pull-right select_btn" data-dismiss="modal"
                            style="width: auto; height: auto; margin-right: 10px;">Выбрать
                    </button>
                </h4>
            </div>
            <div class="modal-body">


                <div class="row cat_selector">
                    <?php if(is_array($all_cats)) foreach($all_cats AS $cat_set) { ?>
                    <div class="col-md-4">
                        <div class="list-group">
                            <?php if(is_array($cat_set)) foreach($cat_set AS $value) { ?>
                            <a class="list-group-item <?php echo ($value['parent_id'] !=0 ) ? 'hidden' : ''?>"
                               data-id="<?php echo $value['id'];?>" data-parent-id="<?php echo $value['parent_id'];?>"><?php echo $value['title'];?></a>
                            
<?php } ?>

                        </div>
                    </div>
                    
<?php } ?>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right select_btn" data-dismiss="modal"
                        style="width: auto; height: auto;">Выбрать
                </button>
            </div>
        </div>
    </div>
</div>

<?php include template(footer); ?>

<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery.menu-aim.js"></script>
<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery.menu-aim.js"></script>
<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/bootstrap_new.js"></script>
<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/bootstrap-treeview.js"></script>
<script type="text/javascript">
    function setChildren($children, link_cat_text) {
        $children.each(function () {
            var $activeNode = $(this);
            var $link = $activeNode.find('span.badge');
            if (2 == $link.length) {
                $link.eq(1).text(link_cat_text);
            } else {
                $activeNode.append('<span class="linked_cat badge">' + link_cat_text + '</span>');
            }

            var nodeId = $activeNode.data('id');
            cat_pair[nodeId] = current_sys_cat_sel_id;

            var node = $('#tree').treeview('getNode', $activeNode.data('nodeid'));
            node.tags.splice(1, 1);
            node.tags.push(link_cat_text);

            var $myChildren = $('li[data-parentid=' + nodeId + ']');
            if ($myChildren.length) {
                setChildren($myChildren, link_cat_text);
            }
        });
    }

    $(document).ready(function () {
        var resp = true;
        setInterval(ajaxCall, 3000); //5 sek

        function ajaxCall() {
            if (resp) {
                $.ajax({
                    url: "getParserInfo.php", success: function (result) {
                        console.log(result);
                        if (result == '') {
                            resp = false;
                        } else {
                            var data = jQuery.parseJSON(result);
                            $(".proses_info").html(data.status_info);
                            if (data.sel != null) {
                                $(".total").html(data.sel);
                                $(".loaded").html(data.saved);
                            }
                        }
                        //$("#div1").html(result);
                    }
                });

            }
            //do your AJAX stuff here
        }
    })

    var tree;

    function getTree() {
        // Some logic to retrieve, or generate tree structure
        //tree = JSON.parse( JSON.stringify(<?php echo $cats_json;?>) );
        tree = <?php echo $cats_json;?>;
        return tree;
    }

    $('#tree').treeview({
        data: getTree(),
        showTags: true,
        color: "#428bcs",
        toggle: function(){
            console.log('test');
        },
    });


    var current_sys_cat_sel_id = 0;
    var current_net_cat_sel_id = 0;

    /* открывает модальное окно */
    $('#tree').on('nodeSelected', function (event, data) {
        $('#cat_modal').find(".select_cat").text(data.text.replace(/-&gt; .*/, ''));
        $('#cat_modal').find(".system_cat").text('');
        $('#cat_modal').find(".active").removeClass('active');
        $('#cat_modal').find("div.col-md-4").slice(1).find('a').addClass('hidden');
        $('#cat_modal').modal('show');
        current_sys_cat_sel_id = 0;
        current_net_cat_sel_id = data.dataAttr['id'];
    });

    /* выбор подкатегории в модальном окне */
    $(".cat_selector a").on('click', function () {
        var id = $(this).data('id');
        var parent = $(this).closest('div.col-md-4');
        var next_div = parent.next();
        $('#cat_modal').find(".system_cat").text($(this).text());
        parent.find('.active').removeClass('active');
        $(this).addClass('active');

        current_sys_cat_sel_id = id;

        if (next_div) {
            next_div.find('a').addClass('hidden').removeClass('active');
            next_div.find('a[data-parent-id="' + id + '"]').removeClass('hidden');
            if (next_div = next_div.next()) {
                next_div.find('a').addClass('hidden').removeClass('active');
            }
        }
    })

    /* нажатие на "выбрать" в модальном окне */
    var cat_pair = {};
    $(".select_btn").on('click', function () {
        // console.log(cat_pair);
        // console.log(current_net_cat_sel_id);
        if (current_sys_cat_sel_id) {
            cat_pair[current_net_cat_sel_id] = current_sys_cat_sel_id;
            var active_node = $('li[data-id="' + current_net_cat_sel_id + '"]');
            var link = active_node.find('span.badge');
            var link_cat_text = $('#cat_modal').find("a[data-id='" + current_sys_cat_sel_id + "']").text();
            if (link.length == 2) {
                link.eq(1).text(link_cat_text);
            } else {
                active_node.append('<span class="linked_cat badge">' + link_cat_text + '</span>');
            }

            /* update child elements if any thereof */
            var $children = $('li[data-parentid=' + current_net_cat_sel_id + ']');
            if ($children.length) {
                setChildren($children, link_cat_text);
            }
        }
        var node = $('#tree').treeview('getNode', active_node.data('nodeid'));
        node.tags.splice(1, 1);
        node.tags.push(link_cat_text);
        var importCat = JSON.stringify(cat_pair);
        $("#import_json").val(importCat);
    });

    $(".toggle_parse_top").on('click', function () {
        var button = $(this);
        var parse_form = $(".table_top:first");
        if (parse_form.css('display') == 'block') {
            parse_form.css('display', 'none');
            button.text(button.data('on'));
        }
        else {
            parse_form.css('display', 'block');
            button.text(button.data('off'));
        }
    })

    /* expand all nodes */
    $('#tree').treeview('expandAll');

</script>

<style>
    .cat_selector a {
        cursor: pointer;
    }
</style>