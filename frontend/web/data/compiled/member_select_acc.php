<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><!DOCTYPE html>
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="ru"> <!--<![endif]-->
    <head>
        <meta charset="<?php echo $charset;?>">
        <title><?php echo $seo['title'];?></title>
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
        <meta name="description" content="<?php echo $seo['description'];?>">
        <meta name="keywords" content="<?php echo $seo['keywords'];?>">
        <!-- Styles -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:400,700" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/unsemantic_v_2.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/responsive.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/font-awesome/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/js/juicy/css/juicy.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/js/juicy/css/themes/shoppie/style.css" type="text/css">
        <!--[if IE 7]>
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/font-awesome/css/font-awesome-ie7.min.css">
        <![endif]-->
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/head3.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/colors/red.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/base_v_4.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/layout_v_3.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/pages/my-profile.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/menu_v_2.css" type="text/css">
         <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/categories.css" type="text/css">
          <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/style_v_2.css" type="text/css">
        
         <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/login.css" type="text/css">
         <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/perexod.css" type="text/css">
          <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/bootstrap.css" type="text/css">
         <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/bootstrap-responsive.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/osx1.css" type="text/css">
       <script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/osx.js'></script>
         <script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery-latest.js"></script>
        <!-- Fav and touch icons -->
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="images/ico/apple-touch-icon-precomposed.png">
        <!-- HTML5 Shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="templates/<?php echo $CFG['tplname'];?>/js/html5shim.js"></script>
        <![endif]-->
    </head>
    <body class="body-background2 content-font dark-color">
    
<?php include template(top); ?>

        <section class="page-content ">
            <!--  Page block  -->
           

            <!-- Page block content  -->
            <div class="page-block page-block-bottom cream-bg grid-container">
              <div class="line_razriv"> 
                <div class="vibor" >Выберите тип аккаунта для дальнейшей работы</div>
                </div>
                
                 <div class="juti_compani"> 			
  
                <div class="tip"> 
                      <form id="sort_f" name="sort_in" action="select_acc.php?act=update_type" method="post" style="float:left">
    <input type="checkbox" name="type" value="1" style="display:none" checked="checked" >
      <button name="sort_f" type="submit" value="dataup" class="button_no active-gradient light-color dark-gradient-hover">Частное лицо</button>
    </form>
     <div class="opi">- Доступно для размещения 10 объявлений</div>
      <div class="opi">- На неограниченный период</div>
       <div class="opi">- Возможность отправки личных сообщений</div>
    </div>

 

<div class="tip" style="    float: right;"> 
                <form id="sort_f" name="sort_in" action="select_acc.php?act=update_type" method="post" style="float:left">
    <input type="checkbox" name="type" value="0" style="display:none" checked="checked">
      <button name="sort_f" type="submit" value="dataup" class="button_no active-gradient light-color dark-gradient-hover">Компания</button>
    </form>
    <div class="opi">- Неограниченное количество товаров при выборе тарифного плана МАКСИ</div>
      <div class="opi">- Новости, вакансии, подключение видео на страницу и многое другое.</div>
       <div class="opi">- Ваши товары в каталоге и на странице компании</div>
       <div class="opi">- Принятие и отправка сообщений пользователям и компаниям</div>
       <div class="opi">- Тарифы от 150 рулей</div>
    </div>
    
 <div class="izmen">изменить тип аккаунта Вы сможете в Личном кабинете</div>
               </div>
                  
           </div> <!-- END Page block  -->
                    
       </section>


<?php include template(footer); ?>


<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery-1.9.1.min.js"></script>

<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery.menu-aim.js"></script>
<script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/bootstrap.js"></script>
 <script type="text/javascript">

        var $menu = $(".dropdown-menu");
        


        // jQuery-menu-aim: <meaningful part of the example>
        // Hook up events to be fired on menu row activation.
        $menu.menuAim({
            activate: activateSubmenu,
            deactivate: deactivateSubmenu
        });
   
        // jQuery-menu-aim: </meaningful part of the example>

        // jQuery-menu-aim: the following JS is used to show and hide the submenu
        // contents. Again, this can be done in any number of ways. jQuery-menu-aim
        // doesn't care how you do this, it just fires the activate and deactivate
        // events at the right times so you know when to show and hide your submenus.
        function activateSubmenu(row) {
            var $row = $(row),
                submenuId = $row.data("submenuId"),
                $submenu = $("#" + submenuId),
                height = $menu.outerHeight(),
                width = $menu.outerWidth();
             
            // Show the submenu
            $submenu.css({
                display: "block",
                top: -1,
                left: width - 3,  // main should overlay submenu
                height: height - 4  // padding for main dropdown's arrow
            });

            // Keep the currently activated row's highlighted look
            $row.find("a").addClass("maintainHover");
        }

         

         function deactivateSubmenu(row) {
            var $row = $(row),
                submenuId = $row.data("submenuId"),
                $submenu = $("#" + submenuId);

            // Hide the submenu and remove the row's highlighted look
            $submenu.css("display", "none");
            $row.find("a").removeClass("maintainHover");
        }

        // Bootstrap's dropdown menus immediately close on document click.
        // Don't let this event close the menu if a submenu is being clicked.
        // This event propagation control doesn't belong in the menu-aim plugin
        // itself because the plugin is agnostic to bootstrap.
        $(".dropdown-menu li").click(function(e) {
            e.stopPropagation();
        });

        

        $(document).click(function() {
            // Simply hide the submenu on any click. Again, this is just a hacked
            // together menu/submenu structure to show the use of jQuery-menu-aim.
            $(".popover").css("display", "none");
            $("a.maintainHover").removeClass("maintainHover");
        });

     

    </script>