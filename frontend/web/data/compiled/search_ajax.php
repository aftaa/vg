<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?>    <script type="text/javascript">var lastinfo="<?php echo($last); ?>"; var falinfo="<?php echo($info); ?>"; </script>
<?php if($type==product) { ?>

<?php if(is_array($info)) foreach($info AS $r) { ?>
<div class="product_search_card">
<?php if($r[is_pro]) { ?>
<div class="ribbon-small ribbon-red">
<div class="ribbon-inner">
<span class="ribbon-text"><?php echo $L['recom'];?></span>
<span class="ribbon-aligner"></span>               
</div>
 </div>
<?php } ?> 
<div class="product_search_img">
<a class="product_search_imgblok" href="view.php?id=<?php echo $r['infoid'];?>&us=<?php echo $r['userid'];?>">
<?php if($r[thumb]) { ?>
<img src="<?php echo $r['thumb'];?>" alt="<?php echo $r['title'];?>" style="margin-top:0px;" />
<?php } else { ?>
<img src="images/ico/no_images.png" alt="<?php echo $r['title'];?>" />
<?php } ?>
</a>
</div>
<div class="product_search_des">
<a href="view.php?id=<?php echo $r['infoid'];?>&us=<?php echo $r['userid'];?>">
<strong><?php echo cut_str($r[title], 100, '..');?></strong>
</a></div>
<div class="product_search_prise"><?php if(!$r[price] || $r[price]==0) { ?>Цену уточняйте.<?php } ?> <?php if($r[price]) { ?>
<strong><?php echo number_format($r[price], 0, '.', ' ');?> <?php echo $r['unit'];?><?php if(!$r[unit]) { ?><span>RUR</span><?php } ?>    </strong><?php } ?>
</div>
<div class="ob_footer" >
<?php if(is_array($reit)) foreach($reit AS $re) { ?> <?php if($re[id]==$r[id]) { ?> <?php if($re[srednee]==0 ) { ?> <div id="raiting_star" class="rait_star_pos">
<div id="raiting">
<div id="raiting_blank"></div>
<div id="raiting_hover"></div>
<div id="raiting_votes" style="width:<?php echo $re['srednee']*17?>px"></div>
</div>
<div id="raiting_info">  <img src="load.gif" /> <h5></h5></div>
</div> <?php } ?>     <?php if($re[srednee]<>0 ) { ?> <?php echo $r['total_votes'];?>
 <div id="raiting_star" class="rait_star_pos">
<div id="raiting">
<div id="raiting_blank"></div>
<div id="raiting_hover"></div>
<div id="raiting_votes" style="width:<?php echo $re['srednee']*17?>px"></div>
</div>
<div id="raiting_info">  <img src="load.gif" /> <h5></h5></div>
</div><?php } ?> <?php } ?>
<?php } ?>

 </div>
<?php if(is_array($wcom)) foreach($wcom AS $q) { ?> <?php if($q['userid']==$r['userid']) { ?><div class="com_but"><a href="com_str.php?id=<?php echo $q['comid'];?>"> Страница компании   </a> </div><?php } ?> 
<?php } ?>

<span class="ob_footer_area" style="color:#ABABAB"><?php if(is_array($area_s)) foreach($area_s AS $qs) { ?><?php if($r['id']==$qs['id']) { ?>  <?php echo $qs['name'];?><?php } ?>
<?php } ?>
</span>
</div>

<?php } ?>

<?php } ?>
<?php if($type==comt) { ?>
<?php if(is_array($comt)) foreach($comt AS $r) { ?>
<div class="product_search_card">
<?php if($r[is_pro]) { ?>
<div class="ribbon-small ribbon-red">
<div class="ribbon-inner">
<span class="ribbon-text"><?php echo $L['recom'];?></span>
<span class="ribbon-aligner"></span>               
</div>
</div>
<?php } ?> 
<div class="product_search_img">
<a class="product_card_imgser" href="com_str.php?id=<?php echo $r['comid'];?>">
<?php if($r[thumb]) { ?>
<img src="<?php echo $r['thumb'];?>" alt="<?php echo $r['title'];?>" style="margin-top:0px;" />
<?php } else { ?>
<img src="images/ico/no_images.png" alt="<?php echo $r['title'];?>" />
<?php } ?>
</a>
</div>
<div class="product_search_des">
<a href="com_str.php?id=<?php echo $r['comid'];?>&us=<?php echo $r['userid'];?>" class="dark-color active-hover">
<strong style="text-align:left"><?php echo cut_str($r[comname], 45, '..');?></strong>
</a>
</div> 
<div class="product_search_ops" >
<?php echo cut_str($r[description], 135, '..');?>
</div>
</div>

<?php } ?>

<?php } ?>
<?php if($type==freet) { ?>
<?php if(is_array($freet)) foreach($freet AS $r) { ?>
<div class="product_search_card">
<?php if($r[is_pro]) { ?>
<div class="ribbon-small ribbon-red">
<div class="ribbon-inner">
<span class="ribbon-text"><?php echo $L['recom'];?></span>
<span class="ribbon-aligner"></span>               
</div>
</div>
<?php } ?> 
<div class="product_search_img">
<a class="product_card_imgser" href="view_f.php?id=<?php echo $r['id'];?>">
<?php if($r[thumb]) { ?>
<img src="<?php echo $r['thumb'];?>" alt="<?php echo $r['title'];?>" style="margin-top:0px;" />
<?php } else { ?>
<img src="images/ico/no_images.png" alt="<?php echo $r['title'];?>" />
<?php } ?>
</a>
</div>
<div class="product_search_des">
<a href="view_f.php?id=<?php echo $r['id'];?>" class="dark-color active-hover">
<strong style="text-align:left"><?php echo cut_str($r[title], 45, '..');?></strong>
</a>
<div class="product_card_price1"><?php if($r[price]) { ?>
<strong><?php echo number_format($r[price], 0, '.', ' ');?> <?php echo $r['unit'];?><?php if(!$r[unit]) { ?>RUR<?php } ?>    </strong><?php } ?>
</div>
</div>
</div>

<?php } ?>

<?php } ?>