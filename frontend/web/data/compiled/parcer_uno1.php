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
          <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/head2.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/colors/red.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/base_v_4.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/layout_v_3.css" type="text/css">
         <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/bootstrap.css" type="text/css">
         <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/bootstrap-responsive.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/pages/my-profile.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/login.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/osx.css" type="text/css">
        <!-- Fav and touch icons -->
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="images/ico/apple-touch-icon-precomposed.png">
         <script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/osx.js'></script>
         <script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery-latest.js"></script>
        <!-- HTML5 Shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="templates/<?php echo $CFG['tplname'];?>/js/html5shim.js"></script>
        <![endif]-->
  <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/style_sel.css">
  <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/prism.css">
  <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/chosen.css">

<style type="text/css"><!--
#pets1_show {visibility:hidden;}
#pets1_show1 {visibility:hidden;}
#pets2_show {}
.hid_f {display:none;}
--></style>

<script type="text/javascript"><!--
//
function mChange1(obj){


var el, s, n, v,t,p;

 p = document.getElementsByName('pets1_show').item(1);
 p.style.display="none";
el=obj.options;
n=el.selectedIndex;
v=el[n].value;
s=obj.id+v;
t= document.getElementById(s);
alert(p);
if(v==v){
if(document.getElementById(s)){
document.getElementById(s).style.display="block";}};
 };//
//

function mChange2(obj){
var el, s, n, v;
el=obj.options;
n=el.selectedIndex;
v=el[n].value;
s=obj.id+'1';
if(v=="????"){
if(document.getElementById(s)){
document.getElementById(s).style.visibility="visible";}};
 };//
//

--></script>


    </head>
    <body class="body-background2 content-font dark-color">



<?php include template(top); ?>


      <section class="page-content">
            <!--  Page block  -->
           

            <!-- Page block content  -->
            <div class="page-block page-block-bottom cream-bg grid-container">
                
                    
               <!-- Content  --> 
               <div class="content-with-sidebar grid-75" style="    margin: 0 auto;
    float: none;
    margin-top: 0px;
    width: 100%;" >

               <div class="line_razriv" style="    margin-top: -10px;"> </div>

      


<?php if($lv == select) { ?>


<?php include template(left_tip); ?>

 <!-- Content  --> 
               <div class="block_oli" style="float: right;    margin-left: 2px;">
               <div class="content-with-sidebar grid-75 content-page" style="margin-left: 2.5%;
    float: left;
    width: 95%;">
                   			   
<div class=" cream-bg" style="width:99%;    margin-top: 30px;">
     <form id="goadded" class="content-form" name="post" action="parcer.php" method="post" enctype="multipart/form-data">

    <input type="file" class="custom_input1 dark-color light-bg" style="width:300px;margin-bottom:5px;padding:6px 0px 0px 10px" name="xml" id="xml"  multiple="false">
     <div class="form-input" style="      margin-bottom: 30px;  float: left;width: 100%;">
         
                                    <label style="    float: left;
    width: 100%;
    text-align: left;
    margin: 10px 0px 6px 0px;" for="address" class="middle-color label_dat_s">URL XML/YML</label>
    
                                    <input type="text" class="custom_input1 dark-color light-bg" style="width:400px;" name="xml_url" id="xml_url" value="" placeholder="http://vseti-goroda/market.yml"/>
 
                                    <input style="display:none" type="text"  name="lv" id="lv" value="load" placeholder=""/>
                                      <input  type="text"  name="cou" id="cou" value="<?php echo $counts;?>" placeholder="" style="display:none"/>
                                </div>
    <button type="submit" style="float: left;" class="button-normal active-gradient light-color dark-gradient-hover" ><?php echo $L['add'];?></button>
    </form>
  </div>
                 </div> 
                 <a href="parce.php?del=1"> Удаление всех данных из таблицы</a>
                 </div>                 
   <!-- END Content  -->



<?php } else { ?>
 <form id="sovpad" class="content-form" name="post" action="parcer.php?pered=1" method="post" enctype="multipart/form-data" >






<div class="tarif_inf_block" ><div class="tarif_inf_zagil">Ваши категории</div> <h3 class="tarif_inf_nik" style="width:170px;margin-right:30%">Категория портала </h3>
<?php if(is_array($cat_magaz)) foreach($cat_magaz AS $value) { ?>
<div class="tarif_inf_strop" style="margin-top: 10px;"> <?php echo $value['catname_m'];?><h3 class="tarif_inf_zag" style="margin-right:30%;width:196px"> <select name='<?php echo $value['ID'];?>' data-placeholder="Выберите категорию" class="chosen-select" style="width:100%;" tabindex="2">
            <option value=""></option>
          <?php if(is_array($my_catname)) foreach($my_catname AS $ww) { ?>
<option value="<?php echo $ww['catid'];?>"><?php echo $ww['catname'];?></option>

<?php } ?>

          </select>
</h3>



   </div>
<?php } ?>

<input id="urlll"  name="urlll" type="text" value="<?php echo $url;?>" /> </div>
 <button type="submit" class="button-normal active-gradient light-color dark-gradient-hover" style="float:right;margin-right:50px;margin-top:15px"><?php echo $L['add'];?></button>
</form>

<?php } ?>
             </div>

   </div>
</div>

     
 

 


   </section>
    <script src="js/chosen.jquery.js" type="text/javascript"></script>
  <script src="js/prism.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
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