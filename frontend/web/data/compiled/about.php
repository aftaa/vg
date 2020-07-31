<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><!DOCTYPE html>
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
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
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/colors/red.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/base_v_4.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/layout_v_3.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/pages/products-listing.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/osx.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/article_v_2.css" type="text/css">
<script type='text/javascript' src='js/jquery.js'></script>
  <script type='text/javascript' src='js/jquery.simplemodal.js'></script>
        <script type='text/javascript' src='js/osx.js'></script>
        <!-- Fav and touch icons -->
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="images/ico/apple-touch-icon-precomposed.png">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/bootstrap.css" type="text/css">
         <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/bootstrap-responsive.css" type="text/css">
        <!-- HTML5 Shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="templates/<?php echo $CFG['tplname'];?>/js/html5shim.js"></script>
        <![endif]-->
<style type="text/css">
  .selected {
    background-color: #eee;
  }
</style>
        <script type="text/javascript">
function default1(){
 $('#about').addClass('selected')
$.ajax({
url: "about.php?act=about_info",

cache: false,
beforeSend: function() {
$('#div_cont').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>');
},
success: function(html){
  document.title = "<?php echo $L['about'];?> - <?php echo $CFG['webname'];?>";
  
$("#div_cont").html(html);
$("#div_cont").css({
  'height':'auto',
});
}
});
return false;}
window.onload = default1;
</script>

<script type="text/javascript">
$(document).ready(function(){

$('#otkaz').click(function(){
 $('#about').removeClass('selected')
$.ajax({
url: "about.php?act=otkaz",

cache: false,
beforeSend: function() {
$('#div_cont').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"></>');
},
success: function(html){
  document.title = "<?php echo $L['otkaz'];?> - <?php echo $CFG['webname'];?>";
  
$("#div_cont").html(html);
$("#div_cont").css({
  'height':'auto',
});
$('#otkaz').addClass('selected')
}
});
return false;
});
});</script>

<script type="text/javascript">
$(document).ready(function(){

$('#about').click(function(){
  $('#otkaz').removeClass('selected')
$.ajax({
url: "about.php?act=about_info",

cache: false,
beforeSend: function() {
$('#div_cont').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF" ></>');
},
success: function(html){
  document.title = "<?php echo $L['about'];?> - <?php echo $CFG['webname'];?>";
$("#div_cont").html(html);
$("#div_cont").css({
  'height':'auto',
});
$('#about').addClass('selected')
}
});
return false;
});
});</script>
    </head>
    <body class="body-background2 content-font dark-color">
    
<?php include template(top); ?>
 
 
       <section class="page-content" style='       margin-top: 50px;
    min-height: 680px;
    height: auto;
    margin-bottom: 20px;' >
    <div class="line_razriv" style="     height: 50px;
   margin-top: -50px;
"> </div>
           <!--  Page block  -->
             <div class="juti_compani"> 
           <!-- Page block content  -->
           <div class="page-block page-block-bottom cream-bg grid-container" style="
    width: 95%;
    margin-left: 3%;">
             
             <div class="sidebar grid-25 cream-gradient transition-all"  style="    width: 25%;
    margin-top: 100px;">
                    <!-- Sidebar submenu box -->
                    <div class="sidebar-box sidebar-top cream-gradient">
                        <nav class="submenu">
                            <ul class="expandable-menu" style="margin-top: -15px;">
                             
                
                                <li>
                                    <a id="about" href="about.php?act=about" class="dark-color active-hover sel">О нас</a>
                                </li>
                                
                                <li>
                                    <a id="otkaz" href="about.php?act=otkaz" class="dark-color active-hover sel">Отказ от ответственности</a>
                                </li>
                               
                
               
                            </ul>
                        </nav>
                    </div><!-- END Sidebar submenu box -->
                </div><!-- END Sidebar  -->

                <div id="div_cont" class="content-with-sidebar grid-75 with-shadow" style="    min-height: 200px;
    width: 61%;
    margin-top: 10px;
    height: auto;
    padding: 34px;">

             </div>




 </div>
</div>
</section>

<?php include template(footer); ?>


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