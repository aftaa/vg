<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><!DOCTYPE html>
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="<?php echo $charset;?>">
        <title>BigBel</title>
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
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/pages/homepage.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/categories.css" type="text/css">
        
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/menu_v_2.css" type="text/css">
         <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/login.css" type="text/css">
        <link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/osx.css" type="text/css">
       <script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/osx.js'></script>
        <!-- Fav and touch icons -->
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="images/ico/apple-touch-icon-precomposed.png">
        <script type="text/javascript" src="templates/<?php echo $CFG['tplname'];?>/js/jquery-latest.js"></script>
    
        
        <!-- HTML5 Shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="templates/<?php echo $CFG['tplname'];?>/js/html5shim.js"></script>
        <![endif]-->
    </head>
    
    <body class="body-background2 content-font dark-color">
      <section>
    
<?php include template(top); ?>

    <div class="header-middle-box last-box hide-on-mobile hide-on-tablet">
                            <div class="header-cart" id="header-cart">
                                <a href="<?php echo $CFG['postfile'];?>" class="text-input input-round dark-color light-bg">
                                   <strong class="active-color"><?php echo $L['f_add_listing'];?></strong>
                                </a>

                            </div>
                        </div>
<div class="header-middle-box last-box hide-on-mobile hide-on-tablet">
                            <div class="header-cart" id="header-cart">
                                <a href="postcom.php" class="text-input input-round dark-color light-bg">
                                   <strong class="dark-color"><?php echo $L['add_company'];?></strong>
                                </a>

                            </div>
                        </div>
   



<div id="menu_pop">
<?php if(is_array($cats_list)) foreach($cats_list AS $cat) { ?><ul id="accordion">
    <li><div class="first"> <?php echo $cat['catname'];?><br>
        <span class="button_podtext"></span></div>
        <ul>
            
<?php if(is_array($cat[children])) foreach($cat[children] AS $i => $child) { ?><li><a href="<?php echo $child['url'];?>">
                                            <?php echo $child['name'];?><span></span>
<?php } ?>
</a></li>
            
        </ul>
</ul>
<?php } ?>


</td>
</div>

    
  

 

              <div id="catalog" class="cream-bgfg">
                    
              </div>
             

             <div id="catalog_nav">
        <div id="catalog_2">
             <?php if(is_array($info)) foreach($info AS $val) { ?>
                   <!--  INFO  -->
                   <div class="grid-100">
                       <div class="product-wide light-bg clearfix">
                           <?php if($val[is_pro]) { ?>
                           <div class="ribbon-small ribbon-red">
                               <div class="ribbon-inner">
                                   <span class="ribbon-text"><?php echo $L['recom'];?></span>
                                   <span class="ribbon-aligner"></span>               
                               </div>
                           </div>
                           <?php } ?> 
                           
                           <div class="grid-15 tablet-grid-20 mobile-grid-35 product-img-holder">
                                <a class="product-img" href="<?php echo $val['url'];?>">
                                    <?php if($val[thumb]) { ?>
                                    <img src="<?php echo $val['thumb'];?>" alt="<?php echo $val['title'];?>" />
                                    <?php } else { ?>
                                    <img src="images/ico/no_img.gif" alt="<?php echo $val['title'];?>" />
                                    <?php } ?>
                                </a>
                           </div>
                           
                           <div class="grid-50 tablet-grid-45 mobile-grid-65 product-description">
                                <h3 class="product-title subheader-font">
                                   <a href="<?php echo $val['url'];?>" class="dark-color active-hover">
                                       <strong><?php echo $val['title'];?></strong>
                                   </a>
                               </h3>
                               <span class="product-category middle-color dark-hover"><?php echo $val['postdate'];?></span>&nbsp;&nbsp;
                               <span class="product-category middle-color dark-hover"><?php echo $val['areaname'];?></span>
                               <p class="dark-color hide-on-mobile"><?php echo $val['intro'];?></p>
                           </div>
                           
                           <div class="grid-35 tablet-grid-35 hide-on-mobile product-actions">
                                <?php if($val[is_top]) { ?><div class="product-stars voting-stars stars-big">
                                    <i title="В ТОП-е" class="icon-circle-arrow-up active-color"></i>
                                </div>
                                <?php } ?>
                                <?php if($val[price]) { ?>
                                <div class="product-price active-color">
                                    <strong><?php echo number_format($val[price], 2, '.', ' ');?> <?php echo $val['unit'];?></strong>
                                </div>
                                <?php } ?>
                                <div class="clear"></div>
                                
                           </div> 
                       </div>
                   </div><!--  END INFO   -->
                   
<?php } ?>


        </div>

        <div id="sort"></div>

</div>
 
</section>

 <script>
    //Указываем по нажатию на какой элемент должны открыватся подменю
    $("#accordion > li > div").click(function(){

        if(false == $(this).next().is(':visible')) {
            $('#accordion ul').slideUp(280);
        }
        $(this).next().slideToggle(280); 
    });

    $('#accordion ul:eq(6)').show();
 </script>