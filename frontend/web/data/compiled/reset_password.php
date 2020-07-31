<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset;?>" />
<!DOCTYPE html>
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
         <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/head2.css" type="text/css">
        <!--[if IE 7]>
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/font-awesome/css/font-awesome-ie7.min.css">
        <![endif]-->
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/colors/red.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/base_v_4.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/layout_v_3.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/pages/my-profile.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/bootstrap.css" type="text/css">
         <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/bootstrap-responsive.css" type="text/css">
         <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/osx.css" type="text/css">
        <!-- Fav and touch icons -->
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="images/ico/apple-touch-icon-precomposed.png">
        <!-- HTML5 Shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="templates/<?php echo $CFG['tplname'];?>/js/html5shim.js"></script>
        <![endif]-->
        <script type='text/javascript' src='js/jquery.js'></script>
       <script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/osx.js'></script>
<head>
    <body class="body-background2 content-font dark-color">
    
<?php include template(top); ?>

        <section class="page-content">
            <!--  Page block  -->
            <div class="page-block page-block-top light-bg grid-container">
                <div class="breadcrumbs grid-100 middle-color">
                    <a href="index.php" class="dark-color active-hover"><?php echo $L['f_home'];?></a>
                    <strong class="active-color"><?php echo $L['changing_password'];?></strong>
                </div>
            </div> <!-- END Page block  -->

            <!-- Page block content  -->
            <div class="page-block page-block-bottom cream-bg grid-container">
                

<?php include template(member_left); ?>

               <!-- Content  --> 
               <div class="content-with-sidebar grid-75">
                    <form class="content-form margin-bottom" action="member.php" name="respass" method="POST" autocomplete="off" onsubmit="return check_submit();">
                       <div class="with-shadow grid-100 light-bg margin-bottom clearfix">
                            <div class="content-page grid-100">
                                <h2 class="bigger-header with-border subheader-font">
                                    <?php echo $L['changing_password'];?>
                                </h2>
                                <div class="form-input">
                                    <label for="new_password" class="middle-color"><?php echo $L['new_password'];?> <span class="active-color">*</span></label>
                                    <input type="password" class="text-input dark-color light-bg" name="new_password" id="new_password" />
                                </div>
                                <div class="form-input">
                                    <label for="confirm_password" class="middle-color"><?php echo $L['new_password_again'];?> <span class="active-color">*</span></label>
                                    <input type="password" class="text-input dark-color light-bg" name="confirm_password" id="confirm_password" />
                                </div>

                            </div>
                        </div>

                        <div class="form-submit">
  <input type="submit" class="button-normal active-gradient light-color dark-gradient-hover" name="submit" value="<?php echo $L['change'];?>" />
<input type="hidden" name="act" value="email_edit_password" />
<input type="hidden" name="userid" value="<?php echo $userid;?>" />
<input type="hidden" name="code" value="<?php echo $code;?>" />
                        </div>    
                    </form>
               </div><!-- END Content  --> 
               
           </div> <!-- END Page block  -->
                    
       </section>
<script type="text/javascript">
function check_submit()
{
if(document.respass.new_password.value==""){
alert('<?php echo $L['new_password_empty'];?>');
document.respass.new_password.focus();
return false;
}
if(document.respass.confirm_password.value==""){
alert('<?php echo $L['new_password_again_empty'];?>');
document.respass.confirm_password.focus();
return false;
}

}
</script>

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

