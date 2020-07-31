<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><script type="text/javascript">      

//запуск функции при прокрутке
function clickss1(qwwq) {
  $.ajax({
url:"more_article.php",
data:"id1s="+wer,
type : "POST",
success: function (data) {
$("#My"+qwwq).html(data);
},
error: function(){
alert ("No PHP script: ");
}
})
document.getElementById('My'+qwwq).style.display = 'block';
document.getElementById('wwwww'+qwwq).style.display = 'none';
// return false;
wer=wer+1;
}
</script>
 
 <?php if(is_array($articles)) foreach($articles AS $da2) { ?>                     
        <div class="newsa_2 hover_t">
        <div class=zas>
        <a href="com_str.php?id=<?php echo $da2['comid'];?>"><div class="zas_img">
        <div class="zas_img_blok " ><img alt="<?php echo $da2['comname'];?>"   src="<?php echo $da2['thumb1'];?>" width="44" height="44"></div></div>
        <div class="newsa_2_com"><?php echo $da2['comname'];?>
        </a>
        </div>
        <div class="newsa_2_date"><?php echo $da2['addtime'];?></div>
        </div> 
        <a href="article.php?act=view&id=<?php echo $da2['idnews'];?>">
        <div class="newsa_2_imge">
        <div class="newsa_2_imge_bl">
        <img src="<?php echo $da2['thumb'];?>">
        </div> </div>
        <div class="newsa_2_title"><?php echo cut_str($da2[title], 70, '');?></div>
        <div class="newsa_2_desa"><?php echo cut_str($da2[intro], 138, '');?></div></a>
        <div class="prosmotr"><i class="icon-eye-open" tooltip="Просмотров"></i><span> <?php echo $da2['click'];?></span>
<i class="icon-comment"></i><span><?php echo $da2['count'];?></span><i class="icon-thumbs-up"></i><span> <?php echo $da2['like'];?></span>
</div>
        </div> 
<?php } ?>
  
        <?php if(!$ends) { ?>
         <div class="top_bol" id="wwwww<?php echo $da2['idnews'];?>"><a  href="#!moreart<?php echo $da2['idnews'];?>" onclick="clickss1(<?php echo $da2['idnews'];?>)"><span>ещё новости</span></a></div>
<?php } ?>
     <?php if($ends) { ?>
         <div class="top_bol" ><span>Конец записией</span></div>
<?php } ?>
        <div id="My<?php echo $da2['idnews'];?>" style="display:none"></div> 
        
        
        