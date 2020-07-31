<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><!DOCTYPE html>
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="<?php echo $charset;?>">
<title><?php echo $seo['title'];?></title>
<meta name="viewport" content="width=device-width,initial-scale=0.45,minimum-scale=0.45,maximum-scale=0.7">
<meta name="description" content="<?php echo $seo['description'];?>">
<meta name="keywords" content="<?php echo $seo['keywords'];?>">
<link rel="shortcut icon" href="favicon.ico">
<meta property="og:image" content="<?php echo $thumb;?>" />
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/unsemantic_v_2.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/responsive.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/font-awesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/head3.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/colors/red.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/base_v_4.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/osx1.css" type="text/css">
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/article_v_4.css" type="text/css">
</head>



<body class="body-background2 content-font dark-color">
    <?php if($_GET[marker]!=1) { ?>

<?php include template(top); ?>

<section class="page-content">
    				<div class="rikol">
<div class="m_rio">
<div class="poslednie"> последнее</div>
<?php if(is_array($last)) foreach($last AS $val) { ?>
<div class="mr_title">
<a href="article.php?act=view&id=<?php echo $val['idnews'];?>" class="dark-color active-hover">
<strong><?php echo $val['newsname'];?></strong></a></div>
<div class="mr_desc"><span><?php echo cut_str($val[intro], 90, '...');?></span></div>

<?php } ?>
</div>
<?php if($pro_articles) { ?>
<div class="m_rio">
<div class="poslednie">Другие новости </div> 
<?php if(is_array($randart)) foreach($randart AS $article) { ?>
<div class="drugie_nys_img"><div class="drugie_nys_img_blok">
<img src="<?php echo $article['thumb'];?>"  alt="<?php echo cut_str($article[newsname], 40, '...');?>">
</div></div>
<div class="mr_title">
<a href="article.php?act=view&id=<?php echo $article['idnews'];?>">
<strong><?php echo $article['newsname'];?></strong></a></div>
<div class="mr_desc"><span><?php echo cut_str($article[intro], 90, '...');?></span></div>

<?php } ?>
 
<?php } else { ?>
<div class="well well-box cream-bg">
<?php echo $L['articles_yet'];?></div><?php } ?></div></div>

<div class="jutia_compani" style="margin-top: 10px;">
<div class="content_art">
<?php if($uniq==0) { ?>
<h1 class="block-header header-font dark-color" style="font-size: 24px;line-height: 1.3em;margin-left: 0px;font-weight: 400;">
<?php echo $newsname;?></h1>
<div class="komp">
<a href="com_str.php?id=<?php echo $comid;?>" class="dark-color active-hover"> <div class="komp_img"><div class="komp_img_blok"><img src="<?php echo $thumb_com;?>"></div></div><div class="komp_com"><?php echo $comname;?></div></a>
<div class="diete">
<span class="middle-color uppercase" href="blog-detail.html"><?php echo $postdata;?></span> |
<span class="middle-color"><?php echo $row['typename'];?></span> |
<a class="middle-color active-hover" href="javascript:window.print();"><i class="icon-print"></i></a>
</div>
<?php if($clc) { ?><div id="like" name="noclick" data-content="member.php?act=like_news&id=<?php echo $_GET['id'];?>"><i class="icon-thumbs-up"></i> <span><?php echo $like;?></span></div><?php } else { ?><div id="like" name="click" data-content="member.php?act=like_news&id=<?php echo $_GET['id'];?>"><i class="icon-thumbs-up"></i> <span><?php echo $like;?></span></div><?php } ?>
</div>
<?php } else { ?>
<h1 class="block-header header-font dark-color" style="font-size: 24px;line-height: 1.3em;margin-left: 0px;font-weight: 400;">
<?php echo $newsname;?></h1><?php } ?>

<?php if($thumb) { ?><div class="art_img"><img src="<?php echo $thumb;?>"></div><?php } ?>  
<?php if($uniq==0) { ?>
<p ><?php echo $content;?></p>
<?php } else { ?><p >
<?php echo $content;?></p>
<?php } ?></div>
<div class="mop_desk"><div class="knop_sob"><i class="icon-share-alt"></i></div><div class="social">
<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,gplus,twitter"></div>
</div></div>
<div class="new_popular"><div class="new_popular_1">Популярное</div>
<?php if(is_array($popularnye)) foreach($popularnye AS $val) { ?>
<a href="article.php?act=view&id=<?php echo $val['idnews'];?>" class="dark-color active-hover">
<div class="new_pop_card">
<div class="npc_title"><span><?php echo $val['newsname'];?></span></div> 
</div></a>
<?php } ?>
</div>
                <!-- comments -->   
<?php if($CFG['visitor_comment']==1 && !$_userid || $_userid) { ?>
<h2 class="subheader-fonty">ОСТАВИТЬ КОМЕНТАРИЙ</h2>
<div class="cometi_obblo"><form class="content-form margin-bottom" name="comment"  method="POST" onsubmit="aj_comme(this); return false;" >
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
<input type="hidden" name="userid" value="<?php echo $_userid;?>"/>
<input type="hidden" name="username" value="<?php echo $_username;?>"/>
<input type="hidden" name="type" value="article"/>
<div class="form-input" style='display: none;'>
<label for="content1" class="middle-color"> введит ваше имя</label>
<textarea class="textarea-input dark-color light-bg" name="content1" id="content1" cols="20" rows="1"><?php echo $_username;?></textarea>
</div>
<div class="comen_img"> 
<div class="comenem_img">
<?php if($_avatar) { ?><img  src="<?php echo $_avatar;?>" itemprop="logo"> <?php } else { ?>          
<img src="data/com/thumb/tumbik.png" itemprop="logo"><?php } ?></div></div>  
<textarea class="textarea_coment" name="content" id="content" cols="10" rows="5"></textarea>
<div class="form-input dop_but">
<label for="checkcode" class="middle-color" style="display: none;"> <?php echo $L['code'];?></label>
<button type="submit" class="button_ostoz">Добавить</button></div></form></div><?php } ?>
                
                
                <div class="comments_block">
                <!-- Blog comments -->
                <a name="comments"></a>
                <?php if($CFG['visitor_comment']==1 && !$_userid || $_userid) { ?>
                <?php if($CFG['comment_check']==1) { ?>
                <div class="well well-box cream-bg">
                <span class="f_b f_red"><?php echo $L['comments_checked_before_adding'];?></span>
                </div>
                <?php } ?>
                <?php } else { ?>
                <div class="alert alert-error">
                    <img src="../images/otzivi.png" style="float: left;margin: -4px 10px 0px 0px;">
                    <?php echo $L['comment_add_reg'];?></div>
                <div class="topmargin5"></div>
                <p>
                <a class="buttot_obchi" href="member.php?act=register"><?php echo $L['f_registration'];?></a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a class="buttot_obchi" href="member.php?act=login&refer=<?php echo $PHP_URL;?>"><?php echo $L['f_log_in_control_panel'];?></a>
                </p>
                <?php } ?>
                <div id="coll_aja1">
                <?php if(is_array($comments)) foreach($comments AS $n) { ?>
                <div id="showcomment" class="showcomment_card"><div class="showcomment_name"><?php echo $n['name'];?>
                <div id="com_img"> 
                <div id="info_com">
                <?php if($n[ava]) { ?><img  src="<?php echo $n['ava'];?>" itemprop="logo"><?php } else { ?>               
                <img  src="data/com/thumb/tumbik.png" itemprop="logo"><?php } ?>
                </div>  
                </div>
                <div class="showcomment_data"><?php echo $n['date'];?>--<?php echo $n['postdate'];?></div></div>  <br> <div class="showcomment_cont"><?php echo $n['content'];?></div> </div>
                
<?php } ?>
</div></div>
<!-- END comments --> 
 <?php } ?>	 <?php if($_GET[marker]==1) { ?>
<div id="coll_aja">
                <?php if(is_array($comments)) foreach($comments AS $n) { ?>
                <div id="showcomment" class="showcomment_card"><div class="showcomment_name"><?php echo $n['name'];?>
                <div id="com_img"> 
                <div id="info_com">
                <?php if($n[ava]) { ?><img src="<?php echo $n['ava'];?>" itemprop="logo"><?php } else { ?>               
                <img src="data/com/thumb/tumbik.png" itemprop="logo"><?php } ?>
                </div>  
                </div>
                <div class="showcomment_data"><?php echo $n['date'];?>--<?php echo $n['postdate'];?></div></div>  <br> <div class="showcomment_cont"><?php echo $n['content'];?></div> </div>
                
<?php } ?>
</div>
<?php } ?> 		<?php if($_GET[marker]!=1) { ?>	 
 </section> 			 



<?php include template(footer); ?>

<?php } ?>
<script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
<script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>

<script type="text/javascript">
var user = "<?php echo($_userid); ?>"
var clc = "<?php echo($clc); ?>"

var idds = "<?php echo($_GET[id]); ?>"
function ajax_fil1(url_v1,vall){
    var wer= document.getElementById('like');
    if(clc==undefined){var url_v1="member.php?act=unlike_news&id="+idds;}
    if(wer.name=="noclick"){var url_v1="member.php?act=unlike_news&id="+idds;}
      //  if(vall==1){var url_v1="member.php?act=unlike_news&id="+idds;}
    if(!user || user==0){swal({
  title: "Внимание!",
  text: "Доступно только для зарегистрированых пользователей",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Войти",
  cancelButtonText: "Зарегистрироваться",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    $(location).attr('href','member.php?act=register');
  } else {
    $(location).attr('href','member.php?act=login');
  }
}); return false;};
   $.ajax({
url:url_v1,
cache: false,
type:'POST',
success: function(html) {
 $("#like").html(html);
 if(url_v1=="member.php?act=unlike_news&id="+idds){ wer.name='uiy'; vall=0;}else{
 wer.name='noclick';}
}});}
$("#like").click(function(){ 
var url_v1=$(this).attr('data-content');
var vall=$(this).attr('value');
$("#like").each(ajax_fil1(url_v1,vall));
} );
</script>
<script type="text/javascript">
function checkcomment(){if(document.comment.content.value==""){alert('<?php echo $L["enter_content_comment"];?>');document.comment.content.focus();return false}if(document.comment.checkcode.value==""){alert('<?php echo $L["enter_verification_code"];?>');document.comment.checkcode.focus();return false}}
</script>
<iframe id="icomment" name="icomment" src="comment_article.php?infoid=<?php echo $id;?>" frameborder="0" scrolling="no" width="0" height=0></iframe>
 <script type="text/javascript">
function aj_comme(sa){
    var form_data = $(sa).serialize();
    $.ajax({
url:"member.php?act=comment",
data:form_data,
type : "POST",
success: function (data) {
document.getElementById('content').value ="";
setTimeout(xxzz, 4);
return false;
},
error: function(){
alert ("No PHP script: ");
}
})

function xxzz(){
        var cin = "<?php echo $_GET['id'];?>";
   //     var usernam_in = "<?php echo $_GET['content1'];?>";
 
  $.ajax({
url: "article.php?act=view&marker=1&id="+cin,
type : "POST",
success: function (dataa) {
$("#coll_aja1").html(dataa);
 // document.getElementById("content").focus();
},
error: function(){
alert ("No PHP script: ");
}
})
}
}
</script>