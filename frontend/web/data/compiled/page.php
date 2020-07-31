<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?>




                <?php if($_GET[id]==0) { ?> <?php if($_GET[up]==0) { ?> <?php if($_GET[down]==0) { ?>
                 <?php if($_GET['area']==0) { ?>  <?php if($_GET['height']==0) { ?>  <?php if($_GET['low']==0) { ?>
                      <div class="grid-100 pag_nav" style='  height: 89px;'>
  
    <div class='page_nav'>
                        <?php if(is_array($fad)) foreach($fad AS $jav) { ?>
       <?php if($jav>=$start && $jav<=$end && $jav<>$_GET[page] && $jav<>1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?ki=<?php echo $ker;?>&page=<?php echo $jav;?>#c_h" ><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
 <?php } ?> 
 <?php if($jav>=$start && $jav<=$end && $jav<>$_GET[page] && $_GET[page]<>0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?ki=<?php echo $ker;?>&page=<?php echo $jav;?>#c_h" ><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
 <?php } ?> 
<?php if($jav>=$start && $jav<=$end && $jav==$_GET[page]  && $_GET[page]<>0) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?ki=<?php echo $ker;?>&page=<?php echo $jav;?>#c_h" ><strong class="page_act" ><?php echo $jav;?></strong></a>

          <?php } ?> 

<?php if($jav>=$start && $jav<=$end   && $_GET[page]==0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?ki=<?php echo $ker;?>&page=<?php echo $jav;?>#c_h" ><strong class="page_act" ><?php echo $jav;?></strong></a>

          <?php } ?>

  
<?php } ?>
</div>
                          <div class=" well-box cream-bg px13 f_gray page_info">
<?php echo $L['mp_total_records'];?>: <?php echo $pager['count'];?>&nbsp;&nbsp;<?php echo $L['mp_displaying_pages'];?>: <font color="red"><?php echo $pager['page'];?></font> <?php echo $L['mp_of'];?> <?php echo $pager['page_count'];?>&nbsp;&nbsp;<?php echo $L['mp_data_page'];?>: <?php echo $pager['size'];?>&nbsp;&nbsp;
</div>          
                      </div>

  <?php } ?>  <?php } ?> <?php } ?> 
  <?php } ?>  <?php } ?>  <?php } ?> 



               <?php if($_GET[id]==0) { ?> <?php if($_GET[up]<>0) { ?>
                 <?php if($_GET['area']==0) { ?>  <?php if($_GET['height']==0) { ?>  <?php if($_GET['low']==0) { ?>
                      <div class="grid-100 pag_nav" style='  height: 89px;
  
  '>
  
    <div class='page_nav'>
                        <?php if(is_array($fad)) foreach($fad AS $jav) { ?>
       <?php if($jav>=$start && $jav<=$end && $jav<>$_GET[page] && $jav<>1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?ki=<?php echo $ker;?>&page=<?php echo $jav;?>&up=<?php echo $_GET['up'];?>#c_h" ><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
 <?php } ?> 
 <?php if($jav>=$start && $jav<=$end && $jav<>$_GET[page] && $_GET[page]<>0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?ki=<?php echo $ker;?>&page=<?php echo $jav;?>&up=<?php echo $_GET['up'];?>#c_h" ><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
 <?php } ?> 
<?php if($jav>=$start && $jav<=$end && $jav==$_GET[page]  && $_GET[page]<>0) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?ki=<?php echo $ker;?>&page=<?php echo $jav;?>&up=<?php echo $_GET['up'];?>#c_h" <strong class="page_act" ><?php echo $jav;?></strong></a>

          <?php } ?> 

<?php if($jav>=$start && $jav<=$end   && $_GET[page]==0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?ki=<?php echo $ker;?>&page=<?php echo $jav;?>&up=<?php echo $_GET['up'];?>#c_h" ><strong class="page_act" ><?php echo $jav;?></strong></a>

          <?php } ?>

  
<?php } ?>
</div>
                           <div class=" well-box cream-bg px13 f_gray page_info">
<?php echo $L['mp_total_records'];?>: <?php echo $pager['count'];?>&nbsp;&nbsp;<?php echo $L['mp_displaying_pages'];?>: <font color="red"><?php echo $pager['page'];?></font> <?php echo $L['mp_of'];?> <?php echo $pager['page_count'];?>&nbsp;&nbsp;<?php echo $L['mp_data_page'];?>: <?php echo $pager['size'];?>&nbsp;&nbsp;
</div>          
                      </div>

  <?php } ?>  <?php } ?> <?php } ?> 
  <?php } ?>  <?php } ?>


<?php if($_GET[id]==0) { ?> <?php if($_GET[down]<>0) { ?>
                 <?php if($_GET['area']==0) { ?>  <?php if($_GET['height']==0) { ?>  <?php if($_GET['low']==0) { ?>
                      <div class="grid-100 pag_nav" style='  height: 89px;
  
  '>
  
    <div class='page_nav'>
                        <?php if(is_array($fad)) foreach($fad AS $jav) { ?>
       <?php if($jav>=$start && $jav<=$end && $jav<>$_GET[page] && $jav<>1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?ki=<?php echo $ker;?>&page=<?php echo $jav;?>&down=<?php echo $_GET['down'];?>#c_h" ><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
 <?php } ?> 
 <?php if($jav>=$start && $jav<=$end && $jav<>$_GET[page] && $_GET[page]<>0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?ki=<?php echo $ker;?>&page=<?php echo $jav;?>&down=<?php echo $_GET['down'];?>#c_h" ><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
 <?php } ?> 
<?php if($jav>=$start && $jav<=$end && $jav==$_GET[page]  && $_GET[page]<>0) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?ki=<?php echo $ker;?>&page=<?php echo $jav;?>&down=<?php echo $_GET['down'];?>#c_h" ><strong class="page_act" ><?php echo $jav;?></strong></a>

          <?php } ?> 

<?php if($jav>=$start && $jav<=$end   && $_GET[page]==0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?ki=<?php echo $ker;?>&page=<?php echo $jav;?>&down=<?php echo $_GET['down'];?>#c_h" ><strong class="page_act" ><?php echo $jav;?></strong></a>

          <?php } ?>

  
<?php } ?>
</div>
                          <div class=" well-box cream-bg px13 f_gray page_info">
<?php echo $L['mp_total_records'];?>: <?php echo $pager['count'];?>&nbsp;&nbsp;<?php echo $L['mp_displaying_pages'];?>: <font color="red"><?php echo $pager['page'];?></font> <?php echo $L['mp_of'];?> <?php echo $pager['page_count'];?>&nbsp;&nbsp;<?php echo $L['mp_data_page'];?>: <?php echo $pager['size'];?>&nbsp;&nbsp;
</div>          
                      </div>

  <?php } ?>  <?php } ?> <?php } ?> 
  <?php } ?>  <?php } ?>



  <?php if($_GET['area']) { ?> <?php if($_GET['height']==0) { ?> <?php if($_GET['low']==0) { ?> <?php if($_GET[up]==0) { ?>
  <?php if($_GET[down]==0) { ?>
  <div class="grid-100 pag_nav" style='  height: 89px;
 
  '>
  
    <div class='page_nav'>
                        <?php if(is_array($fad)) foreach($fad AS $jav) { ?>
       <?php if($jav>=$start && $jav<$end  && $jav<>$_GET[page] && $jav<>1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&ki=<?php echo $asda;?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

<?php if($jav>=$start && $jav<$end  && $jav==$_GET[page]  && $_GET[page]<>0) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&ki=<?php echo $asda;?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

 <?php if($jav>=$start && $jav<$end  && $_GET[page]==0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&ki=<?php echo $asda;?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 
          <?php if($jav>=$start && $jav<$end  && $jav<>$_GET[page]  && $_GET[page]<>0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&ki=<?php echo $asda;?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

  
<?php } ?>
</div>
                          <div class=" well-box cream-bg px13 f_gray page_info">
<?php echo $L['mp_total_records'];?>: <?php echo $pager['count'];?>&nbsp;&nbsp;<?php echo $L['mp_displaying_pages'];?>: <font color="red"><?php echo $pager['page'];?></font> <?php echo $L['mp_of'];?> <?php echo $pager['page_count'];?>&nbsp;&nbsp;<?php echo $L['mp_data_page'];?>: <?php echo $pager['size'];?>&nbsp;&nbsp;
</div>          
                      </div>
  <?php } ?>  <?php } ?>  <?php } ?> <?php } ?>  <?php } ?> 




<?php if($_GET['area']) { ?> <?php if($_GET['height']==0) { ?> <?php if($_GET['low']==0) { ?> <?php if($_GET[up]<>0) { ?>
   <div class="grid-100 pag_nav" style='  height: 89px;
  
  '>
  
    <div class='page_nav'>
                        <?php if(is_array($fad)) foreach($fad AS $jav) { ?>
       <?php if($jav>=$start && $jav<$end  && $jav<>$_GET[page] && $jav<>1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&ki=<?php echo $asda;?>&up=<?php echo $_GET['up'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

<?php if($jav>=$start && $jav<$end  && $jav==$_GET[page]  && $_GET[page]<>0) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&ki=<?php echo $asda;?>&up=<?php echo $_GET['up'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

 <?php if($jav>=$start && $jav<$end  && $_GET[page]==0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&ki=<?php echo $asda;?>&up=<?php echo $_GET['up'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 
          <?php if($jav>=$start && $jav<$end  && $jav<>$_GET[page]  && $_GET[page]<>0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&ki=<?php echo $asda;?>&up=<?php echo $_GET['up'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

  
<?php } ?>
</div>
                           <div class=" well-box cream-bg px13 f_gray page_info">
<?php echo $L['mp_total_records'];?>: <?php echo $pager['count'];?>&nbsp;&nbsp;<?php echo $L['mp_displaying_pages'];?>: <font color="red"><?php echo $pager['page'];?></font> <?php echo $L['mp_of'];?> <?php echo $pager['page_count'];?>&nbsp;&nbsp;<?php echo $L['mp_data_page'];?>: <?php echo $pager['size'];?>&nbsp;&nbsp;
</div>          
                      </div>
  <?php } ?>  <?php } ?>  <?php } ?>  <?php } ?> 



<?php if($_GET['area']) { ?> <?php if($_GET['height']==0) { ?> <?php if($_GET['low']==0) { ?> <?php if($_GET[down]<>0) { ?>
   <div class="grid-100 pag_nav" style='  height: 89px;
 
  '>
  
    <div class='page_nav'>
                        <?php if(is_array($fad)) foreach($fad AS $jav) { ?>
       <?php if($jav>=$start && $jav<$end  && $jav<>$_GET[page] && $jav<>1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&ki=<?php echo $asda;?>&down=<?php echo $_GET['down'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

<?php if($jav>=$start && $jav<$end  && $jav==$_GET[page]  && $_GET[page]<>0) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&ki=<?php echo $asda;?>&down=<?php echo $_GET['down'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

 <?php if($jav>=$start && $jav<$end  && $_GET[page]==0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&ki=<?php echo $asda;?>&down=<?php echo $_GET['down'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 
          <?php if($jav>=$start && $jav<$end  && $jav<>$_GET[page]  && $_GET[page]<>0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&ki=<?php echo $asda;?>&down=<?php echo $_GET['down'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

  
<?php } ?>
</div>
                           <div class=" well-box cream-bg px13 f_gray page_info">
<?php echo $L['mp_total_records'];?>: <?php echo $pager['count'];?>&nbsp;&nbsp;<?php echo $L['mp_displaying_pages'];?>: <font color="red"><?php echo $pager['page'];?></font> <?php echo $L['mp_of'];?> <?php echo $pager['page_count'];?>&nbsp;&nbsp;<?php echo $L['mp_data_page'];?>: <?php echo $pager['size'];?>&nbsp;&nbsp;
</div>          
                      </div>
  <?php } ?>  <?php } ?>  <?php } ?>  <?php } ?> 







  <?php if($_GET['area']) { ?>   
  <?php if($_GET['low']<>0) { ?>  <?php if($_GET['height']==0) { ?> <?php if($_GET[up]==0) { ?>
  <?php if($_GET[down]==0) { ?>
  <div class="grid-100 pag_nav" style='  height: 89px;
  
  '>
  
    <div class='page_nav'>
                        <?php if(is_array($fad)) foreach($fad AS $jav) { ?>
       <?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $jav<>1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&low=<?php echo $loww;?>&ki=<?php echo $asda;?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

 <?php if($jav>=$start && $jav<$end    && $jav==$_GET[page]  && $_GET[page]<>0) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&low=<?php echo $loww;?>&ki=<?php echo $asda;?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

 <?php if($jav>=$start && $jav<$end && $_GET[page]==0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&low=<?php echo $loww;?>&ki=<?php echo $asda;?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

   <?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $_GET[page]<>0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&low=<?php echo $loww;?>&ki=<?php echo $asda;?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?>         

  
<?php } ?>
</div>
                          <div class=" well-box cream-bg px13 f_gray page_info">
<?php echo $L['mp_total_records'];?>: <?php echo $pager['count'];?>&nbsp;&nbsp;<?php echo $L['mp_displaying_pages'];?>: <font color="red"><?php echo $pager['page'];?></font> <?php echo $L['mp_of'];?> <?php echo $pager['page_count'];?>&nbsp;&nbsp;<?php echo $L['mp_data_page'];?>: <?php echo $pager['size'];?>&nbsp;&nbsp;
</div>          
                      </div>
  <?php } ?>   <?php } ?>   <?php } ?> <?php } ?>   <?php } ?> 

<?php if($_GET['area']) { ?>   
  <?php if($_GET['low']<>0) { ?>  <?php if($_GET['height']==0) { ?> <?php if($_GET[up]<>0) { ?>
  
   <div class="grid-100 pag_nav" style='  height: 89px;

  '>
  
    <div class='page_nav'>
                        <?php if(is_array($fad)) foreach($fad AS $jav) { ?>
       <?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $jav<>1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&low=<?php echo $loww;?>&ki=<?php echo $asda;?>&up=<?php echo $_GET['up'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

 <?php if($jav>=$start && $jav<$end    && $jav==$_GET[page]  && $_GET[page]<>0) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&low=<?php echo $loww;?>&ki=<?php echo $asda;?>&up=<?php echo $_GET['up'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

 <?php if($jav>=$start && $jav<$end && $_GET[page]==0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&low=<?php echo $loww;?>&ki=<?php echo $asda;?>&up=<?php echo $_GET['up'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

   <?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $_GET[page]<>0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&low=<?php echo $loww;?>&ki=<?php echo $asda;?>&up=<?php echo $_GET['up'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?>         

  
<?php } ?>
</div>
                           <div class=" well-box cream-bg px13 f_gray page_info">
<?php echo $L['mp_total_records'];?>: <?php echo $pager['count'];?>&nbsp;&nbsp;<?php echo $L['mp_displaying_pages'];?>: <font color="red"><?php echo $pager['page'];?></font> <?php echo $L['mp_of'];?> <?php echo $pager['page_count'];?>&nbsp;&nbsp;<?php echo $L['mp_data_page'];?>: <?php echo $pager['size'];?>&nbsp;&nbsp;
</div>          
                      </div>



 <?php } ?>   <?php } ?>   <?php } ?> <?php } ?>   




<?php if($_GET['area']) { ?>   
  <?php if($_GET['low']<>0) { ?>  <?php if($_GET['height']==0) { ?> <?php if($_GET[down]<>0) { ?>
  
   <div class="grid-100 pag_nav" style='  height: 89px;
 
  '>
  
    <div class='page_nav'>
                        <?php if(is_array($fad)) foreach($fad AS $jav) { ?>
       <?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $jav<>1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&low=<?php echo $loww;?>&ki=<?php echo $asda;?>&down=<?php echo $_GET['down'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

 <?php if($jav>=$start && $jav<$end    && $jav==$_GET[page]  && $_GET[page]<>0) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&low=<?php echo $loww;?>&ki=<?php echo $asda;?>&down=<?php echo $_GET['down'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

 <?php if($jav>=$start && $jav<$end && $_GET[page]==0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&low=<?php echo $loww;?>&ki=<?php echo $asda;?>&down=<?php echo $_GET['down'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

   <?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $_GET[page]<>0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&low=<?php echo $loww;?>&ki=<?php echo $asda;?>&down=<?php echo $_GET['down'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?>         

  
<?php } ?>
</div>
                            <div class=" well-box cream-bg px13 f_gray page_info">
<?php echo $L['mp_total_records'];?>: <?php echo $pager['count'];?>&nbsp;&nbsp;<?php echo $L['mp_displaying_pages'];?>: <font color="red"><?php echo $pager['page'];?></font> <?php echo $L['mp_of'];?> <?php echo $pager['page_count'];?>&nbsp;&nbsp;<?php echo $L['mp_data_page'];?>: <?php echo $pager['size'];?>&nbsp;&nbsp;
</div>        
                      </div>
  <?php } ?>   <?php } ?>   <?php } ?> <?php } ?> 



  <?php if($_GET['area']) { ?>   
  <?php if($_GET['low']==0) { ?>  <?php if($_GET['height']<>0) { ?>  <?php if($_GET[up]==0) { ?>
  <?php if($_GET[down]==0) { ?>
   <div class="grid-100 pag_nav" style='  height: 89px;
  
  '>
  
    <div class='page_nav'>
                        <?php if(is_array($fad)) foreach($fad AS $jav) { ?>
       <?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $jav<>1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&height=<?php echo $heightt;?>&ki=<?php echo $asda;?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

<?php if($jav>=$start && $jav<$end    && $jav==$_GET[page]  && $_GET[page]<>0) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&height=<?php echo $heightt;?>&ki=<?php echo $asda;?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

 <?php if($jav>=$start && $jav<$end && $_GET[page]==0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&height=<?php echo $heightt;?>&ki=<?php echo $asda;?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

<?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $_GET[page]<>0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&height=<?php echo $heightt;?>&ki=<?php echo $asda;?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

  
<?php } ?>
</div>
                           <div class=" well-box cream-bg px13 f_gray page_info">
<?php echo $L['mp_total_records'];?>: <?php echo $pager['count'];?>&nbsp;&nbsp;<?php echo $L['mp_displaying_pages'];?>: <font color="red"><?php echo $pager['page'];?></font> <?php echo $L['mp_of'];?> <?php echo $pager['page_count'];?>&nbsp;&nbsp;<?php echo $L['mp_data_page'];?>: <?php echo $pager['size'];?>&nbsp;&nbsp;
</div>        
                      </div>
 <?php } ?>   <?php } ?>   <?php } ?>  <?php } ?>   <?php } ?> 


<?php if($_GET['area']) { ?>   
  <?php if($_GET['low']==0) { ?>  <?php if($_GET['height']<>0) { ?>  <?php if($_GET[up]<>0) { ?>
  <div class="grid-100 pag_nav" style='  height: 89px;
  
  '>
  
    <div class='page_nav'>
                        <?php if(is_array($fad)) foreach($fad AS $jav) { ?>
       <?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $jav<>1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&height=<?php echo $heightt;?>&ki=<?php echo $asda;?>&up=<?php echo $_GET['up'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

<?php if($jav>=$start && $jav<$end    && $jav==$_GET[page]  && $_GET[page]<>0) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&height=<?php echo $heightt;?>&ki=<?php echo $asda;?>&up=<?php echo $_GET['up'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

 <?php if($jav>=$start && $jav<$end && $_GET[page]==0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&height=<?php echo $heightt;?>&ki=<?php echo $asda;?>&up=<?php echo $_GET['up'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

<?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $_GET[page]<>0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&height=<?php echo $heightt;?>&ki=<?php echo $asda;?>&up=<?php echo $_GET['up'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

  
<?php } ?>
</div>
                           <div class=" well-box cream-bg px13 f_gray page_info">
<?php echo $L['mp_total_records'];?>: <?php echo $pager['count'];?>&nbsp;&nbsp;<?php echo $L['mp_displaying_pages'];?>: <font color="red"><?php echo $pager['page'];?></font> <?php echo $L['mp_of'];?> <?php echo $pager['page_count'];?>&nbsp;&nbsp;<?php echo $L['mp_data_page'];?>: <?php echo $pager['size'];?>&nbsp;&nbsp;
</div>        
                      </div>
 <?php } ?>   <?php } ?>   <?php } ?>  <?php } ?>  

<?php if($_GET['area']) { ?>   
  <?php if($_GET['low']==0) { ?>  <?php if($_GET['height']<>0) { ?>  <?php if($_GET[down]<>0) { ?>
   <div class="grid-100 pag_nav" style='  height: 89px;
  
  '>
  
    <div class='page_nav'>
                        <?php if(is_array($fad)) foreach($fad AS $jav) { ?>
       <?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $jav<>1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&height=<?php echo $heightt;?>&ki=<?php echo $asda;?>&down=<?php echo $_GET['down'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

<?php if($jav>=$start && $jav<$end    && $jav==$_GET[page]  && $_GET[page]<>0) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&height=<?php echo $heightt;?>&ki=<?php echo $asda;?>&down=<?php echo $_GET['down'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

 <?php if($jav>=$start && $jav<$end && $_GET[page]==0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&height=<?php echo $heightt;?>&ki=<?php echo $asda;?>&down=<?php echo $_GET['down'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

<?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $_GET[page]<>0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&page=<?php echo $jav;?>&height=<?php echo $heightt;?>&ki=<?php echo $asda;?>&down=<?php echo $_GET['down'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

  
<?php } ?>
</div>
                            <div class=" well-box cream-bg px13 f_gray page_info">
<?php echo $L['mp_total_records'];?>: <?php echo $pager['count'];?>&nbsp;&nbsp;<?php echo $L['mp_displaying_pages'];?>: <font color="red"><?php echo $pager['page'];?></font> <?php echo $L['mp_of'];?> <?php echo $pager['page_count'];?>&nbsp;&nbsp;<?php echo $L['mp_data_page'];?>: <?php echo $pager['size'];?>&nbsp;&nbsp;
</div>        
                      </div>
 <?php } ?>   <?php } ?>   <?php } ?>  <?php } ?> 



  <?php if($_GET['height']<>0) { ?>   <?php if($_GET['low']<>0) { ?> <?php if($_GET['area']) { ?> <?php if($_GET[up]==0) { ?>
  <?php if($_GET[down]==0) { ?>
   <div class="grid-100 pag_nav" style='  height: 89px;
  
  '>
  
    <div class='page_nav'>
                        <?php if(is_array($fad)) foreach($fad AS $jav) { ?>
       <?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $jav<>1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&low=<?php echo $loww;?>&height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

<?php if($jav>=$start && $jav<$end   && $jav==$_GET[page]  && $_GET[page]<>0) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&low=<?php echo $loww;?>&height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>#c_h"></a><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

  <?php if($jav>=$start && $jav<$end && $_GET[page]==0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&low=<?php echo $loww;?>&height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

<?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $_GET[page]<>0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&low=<?php echo $loww;?>&height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

  
<?php } ?>

                            <div class=" well-box cream-bg px13 f_gray page_info">
<?php echo $L['mp_total_records'];?>: <?php echo $pager['count'];?>&nbsp;&nbsp;<?php echo $L['mp_displaying_pages'];?>: <font color="red"><?php echo $pager['page'];?></font> <?php echo $L['mp_of'];?> <?php echo $pager['page_count'];?>&nbsp;&nbsp;<?php echo $L['mp_data_page'];?>: <?php echo $pager['size'];?>&nbsp;&nbsp;
</div>        
                      </div>
  <?php } ?>  <?php } ?> <?php } ?>   <?php } ?>   <?php } ?> 

  <?php if($_GET['height']<>0) { ?>   <?php if($_GET['low']<>0) { ?> <?php if($_GET['area']) { ?> <?php if($_GET[up]<>0) { ?>

   <div class="grid-100 pag_nav" style='  height: 89px;
  
  '>
  
    <div class='page_nav'>
                        <?php if(is_array($fad)) foreach($fad AS $jav) { ?>
       <?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $jav<>1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&low=<?php echo $loww;?>&height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&up=<?php echo $_GET['up'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

<?php if($jav>=$start && $jav<$end   && $jav==$_GET[page]  && $_GET[page]<>0) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&low=<?php echo $loww;?>&height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&up=<?php echo $_GET['up'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

  <?php if($jav>=$start && $jav<$end && $_GET[page]==0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&low=<?php echo $loww;?>&height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&up=<?php echo $_GET['up'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

<?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $_GET[page]<>0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&low=<?php echo $loww;?>&height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&up=<?php echo $_GET['up'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

  
<?php } ?>
</div>
                            <div class=" well-box cream-bg px13 f_gray page_info">
<?php echo $L['mp_total_records'];?>: <?php echo $pager['count'];?>&nbsp;&nbsp;<?php echo $L['mp_displaying_pages'];?>: <font color="red"><?php echo $pager['page'];?></font> <?php echo $L['mp_of'];?> <?php echo $pager['page_count'];?>&nbsp;&nbsp;<?php echo $L['mp_data_page'];?>: <?php echo $pager['size'];?>&nbsp;&nbsp;
</div>        
                      </div>
  <?php } ?>  <?php } ?> <?php } ?>   <?php } ?>   

  <?php if($_GET['height']<>0) { ?>   <?php if($_GET['low']<>0) { ?> <?php if($_GET['area']) { ?> <?php if($_GET[down]<>0) { ?>

  <div class="grid-100 pag_nav" style='  height: 89px;
  
  '>
  
    <div class='page_nav'>
                        <?php if(is_array($fad)) foreach($fad AS $jav) { ?>
       <?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $jav<>1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&low=<?php echo $loww;?>&height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&down=<?php echo $_GET['down'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

<?php if($jav>=$start && $jav<$end   && $jav==$_GET[page]  && $_GET[page]<>0) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&low=<?php echo $loww;?>&height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&down=<?php echo $_GET['down'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

  <?php if($jav>=$start && $jav<$end && $_GET[page]==0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&low=<?php echo $loww;?>&height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&down=<?php echo $_GET['down'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

<?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $_GET[page]<>0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?area=<?php echo $areaaa;?>&low=<?php echo $loww;?>&height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&down=<?php echo $_GET['down'];?>#c_h"><strong style="font-size: 13px;color: #909090;">-><?php echo $jav;?><-</strong></a>
          <?php } ?> 

  
<?php } ?>
</div>
                           <div class=" well-box cream-bg px13 f_gray page_info">
<?php echo $L['mp_total_records'];?>: <?php echo $pager['count'];?>&nbsp;&nbsp;<?php echo $L['mp_displaying_pages'];?>: <font color="red"><?php echo $pager['page'];?></font> <?php echo $L['mp_of'];?> <?php echo $pager['page_count'];?>&nbsp;&nbsp;<?php echo $L['mp_data_page'];?>: <?php echo $pager['size'];?>&nbsp;&nbsp;
</div>        
                      </div>
  <?php } ?>  <?php } ?> <?php } ?>   <?php } ?>  




  <?php if($_GET['low']<>0) { ?>  <?php if($_GET['height']==0) { ?>  <?php if($_GET['area']==0) { ?>  <?php if($_GET[up]==0) { ?>
  <?php if($_GET[down]==0) { ?>
   <div class="grid-100 pag_nav" style='  height: 89px;
  
  '>
  
    <div class='page_nav'>
                        <?php if(is_array($fad)) foreach($fad AS $jav) { ?>
       <?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $jav<>1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?low=<?php echo $loww;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

<?php if($jav>=$start && $jav<$end   && $jav==$_GET[page] && $_GET[page]<>0) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?low=<?php echo $loww;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

<?php if($jav>=$start && $jav<$end && $_GET[page]==0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?low=<?php echo $loww;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

  <?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $_GET[page]<>0 && $jav==1) { ?>           
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?low=<?php echo $loww;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

 
<?php } ?>
</div>
                            <div class=" well-box cream-bg px13 f_gray page_info">
<?php echo $L['mp_total_records'];?>: <?php echo $pager['count'];?>&nbsp;&nbsp;<?php echo $L['mp_displaying_pages'];?>: <font color="red"><?php echo $pager['page'];?></font> <?php echo $L['mp_of'];?> <?php echo $pager['page_count'];?>&nbsp;&nbsp;<?php echo $L['mp_data_page'];?>: <?php echo $pager['size'];?>&nbsp;&nbsp;
</div>        
                      </div>
 <?php } ?>  <?php } ?>  <?php } ?>  <?php } ?>  <?php } ?>

 <?php if($_GET['low']<>0) { ?>  <?php if($_GET['height']==0) { ?>  <?php if($_GET['area']==0) { ?>  <?php if($_GET[up]<>0) { ?>
  <div class="grid-100 pag_nav" style='  height: 89px;
  
  '>
  
    <div class='page_nav'>
                        <?php if(is_array($fad)) foreach($fad AS $jav) { ?>
       <?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $jav<>1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?low=<?php echo $loww;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&up=<?php echo $_GET['up'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

<?php if($jav>=$start && $jav<$end   && $jav==$_GET[page] && $_GET[page]<>0) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?low=<?php echo $loww;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&up=<?php echo $_GET['up'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

<?php if($jav>=$start && $jav<$end && $_GET[page]==0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?low=<?php echo $loww;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&up=<?php echo $_GET['up'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

  <?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $_GET[page]<>0 && $jav==1) { ?>           
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?low=<?php echo $loww;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&up=<?php echo $_GET['up'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

 
<?php } ?>
</div>
                           <div class=" well-box cream-bg px13 f_gray page_info">
<?php echo $L['mp_total_records'];?>: <?php echo $pager['count'];?>&nbsp;&nbsp;<?php echo $L['mp_displaying_pages'];?>: <font color="red"><?php echo $pager['page'];?></font> <?php echo $L['mp_of'];?> <?php echo $pager['page_count'];?>&nbsp;&nbsp;<?php echo $L['mp_data_page'];?>: <?php echo $pager['size'];?>&nbsp;&nbsp;
</div>        
                      </div>
 <?php } ?>  <?php } ?>  <?php } ?>  <?php } ?>  
<?php if($_GET['low']<>0) { ?>  <?php if($_GET['height']==0) { ?>  <?php if($_GET['area']==0) { ?>  <?php if($_GET[down]<>0) { ?>
  <div class="grid-100 pag_nav" style='  height: 89px;
  
  '>
  
    <div class='page_nav'>
                        <?php if(is_array($fad)) foreach($fad AS $jav) { ?>
       <?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $jav<>1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?low=<?php echo $loww;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&down=<?php echo $_GET['down'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

<?php if($jav>=$start && $jav<$end   && $jav==$_GET[page] && $_GET[page]<>0) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?low=<?php echo $loww;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&down=<?php echo $_GET['down'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

<?php if($jav>=$start && $jav<$end && $_GET[page]==0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?low=<?php echo $loww;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&down=<?php echo $_GET['down'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

  <?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $_GET[page]<>0 && $jav==1) { ?>           
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?low=<?php echo $loww;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&down=<?php echo $_GET['down'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

 
<?php } ?>
</div>
                           <div class=" well-box cream-bg px13 f_gray page_info">
<?php echo $L['mp_total_records'];?>: <?php echo $pager['count'];?>&nbsp;&nbsp;<?php echo $L['mp_displaying_pages'];?>: <font color="red"><?php echo $pager['page'];?></font> <?php echo $L['mp_of'];?> <?php echo $pager['page_count'];?>&nbsp;&nbsp;<?php echo $L['mp_data_page'];?>: <?php echo $pager['size'];?>&nbsp;&nbsp;
</div>        
                      </div>
 <?php } ?>  <?php } ?>  <?php } ?>  <?php } ?>  




  <?php if($_GET['height']<>0) { ?>  <?php if($_GET['low']==0) { ?> <?php if($_GET['area']==0) { ?> <?php if($_GET[up]==0) { ?>
  <?php if($_GET[down]==0) { ?>
   <div class="grid-100 pag_nav" style='  height: 89px;
  
  '>
  
    <div class='page_nav'>
                        <?php if(is_array($fad)) foreach($fad AS $jav) { ?>
       <?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $jav<>1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

<?php if($jav>=$start && $jav<$end  && $jav==$_GET[page] && $_GET[page]<>0) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a
          <?php } ?> 

  <?php if($jav>=$start && $jav<$end && $_GET[page]==0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

 <?php if($jav>=$start && $jav<$end  && $jav<>$_GET[page] && $_GET[page]<>0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>#c_h">><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

  
<?php } ?>
</div>
                           <div class=" well-box cream-bg px13 f_gray page_info">
<?php echo $L['mp_total_records'];?>: <?php echo $pager['count'];?>&nbsp;&nbsp;<?php echo $L['mp_displaying_pages'];?>: <font color="red"><?php echo $pager['page'];?></font> <?php echo $L['mp_of'];?> <?php echo $pager['page_count'];?>&nbsp;&nbsp;<?php echo $L['mp_data_page'];?>: <?php echo $pager['size'];?>&nbsp;&nbsp;
</div>        
                      </div>
  <?php } ?>  <?php } ?>  <?php } ?>  <?php } ?>  <?php } ?>

<?php if($_GET['height']<>0) { ?>  <?php if($_GET['low']==0) { ?> <?php if($_GET['area']==0) { ?> <?php if($_GET[up]<>0) { ?>
  <div class="grid-100 pag_nav" style='  height: 89px;
  
  '>
  
    <div class='page_nav'>
                        <?php if(is_array($fad)) foreach($fad AS $jav) { ?>
       <?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $jav<>1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&up=<?php echo $_GET['up'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

<?php if($jav>=$start && $jav<$end  && $jav==$_GET[page] && $_GET[page]<>0) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&up=<?php echo $_GET['up'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

  <?php if($jav>=$start && $jav<$end && $_GET[page]==0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&up=<?php echo $_GET['up'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

 <?php if($jav>=$start && $jav<$end  && $jav<>$_GET[page] && $_GET[page]<>0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&up=<?php echo $_GET['up'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

  
<?php } ?>
</div>
                           <div class=" well-box cream-bg px13 f_gray page_info">
<?php echo $L['mp_total_records'];?>: <?php echo $pager['count'];?>&nbsp;&nbsp;<?php echo $L['mp_displaying_pages'];?>: <font color="red"><?php echo $pager['page'];?></font> <?php echo $L['mp_of'];?> <?php echo $pager['page_count'];?>&nbsp;&nbsp;<?php echo $L['mp_data_page'];?>: <?php echo $pager['size'];?>&nbsp;&nbsp;
</div>        
                      </div>
  <?php } ?>  <?php } ?>  <?php } ?>  <?php } ?> 
<?php if($_GET['height']<>0) { ?>  <?php if($_GET['low']==0) { ?> <?php if($_GET['area']==0) { ?> <?php if($_GET[down]<>0) { ?>
   <div class="grid-100 pag_nav" style='  height: 89px;
  
  '>
  
    <div class='page_nav'>
                        <?php if(is_array($fad)) foreach($fad AS $jav) { ?>
       <?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $jav<>1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&down=<?php echo $_GET['down'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

<?php if($jav>=$start && $jav<$end  && $jav==$_GET[page] && $_GET[page]<>0) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&down=<?php echo $_GET['down'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

  <?php if($jav>=$start && $jav<$end && $_GET[page]==0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&down=<?php echo $_GET['down'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 

 <?php if($jav>=$start && $jav<$end  && $jav<>$_GET[page] && $_GET[page]<>0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&down=<?php echo $_GET['down'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 

  
<?php } ?>
</div>
                            <div class=" well-box cream-bg px13 f_gray page_info">
<?php echo $L['mp_total_records'];?>: <?php echo $pager['count'];?>&nbsp;&nbsp;<?php echo $L['mp_displaying_pages'];?>: <font color="red"><?php echo $pager['page'];?></font> <?php echo $L['mp_of'];?> <?php echo $pager['page_count'];?>&nbsp;&nbsp;<?php echo $L['mp_data_page'];?>: <?php echo $pager['size'];?>&nbsp;&nbsp;
</div>        
                      </div>
  <?php } ?>  <?php } ?>  <?php } ?>  <?php } ?> 



  <?php if($_GET['height']<>0) { ?>   <?php if($_GET['low']<>0) { ?> <?php if($_GET['area']==0) { ?> 
   <?php if($_GET[up]==0) { ?>
  <?php if($_GET[down]==0) { ?>
  <div class="grid-100 pag_nav" style='  height: 89px;
  
  '>
  
    <div class='page_nav'>
                        <?php if(is_array($fad)) foreach($fad AS $jav) { ?>
       <?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $jav<>1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?low=<?php echo $loww;?>&height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 


<?php if($jav>=$start && $jav<$end   && $jav==$_GET[page] && $_GET[page]<>0) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?low=<?php echo $loww;?>&height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 
 <?php if($jav>=$start && $jav<$end && $_GET[page]==0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?low=<?php echo $loww;?>&height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?>
<?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $_GET[page]<>0 && $jav) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?low=<?php echo $loww;?>&height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>#c_h"><strong style="font-size: 13px;color: #909090;">-><?php echo $jav;?><-</strong></a>
          <?php } ?>
  
<?php } ?>
</div>
                            <div class=" well-box cream-bg px13 f_gray page_info">
<?php echo $L['mp_total_records'];?>: <?php echo $pager['count'];?>&nbsp;&nbsp;<?php echo $L['mp_displaying_pages'];?>: <font color="red"><?php echo $pager['page'];?></font> <?php echo $L['mp_of'];?> <?php echo $pager['page_count'];?>&nbsp;&nbsp;<?php echo $L['mp_data_page'];?>: <?php echo $pager['size'];?>&nbsp;&nbsp;
</div>        
                      </div>
  <?php } ?>  <?php } ?> <?php } ?>
<?php } ?> <?php } ?>
<?php if($_GET['height']<>0) { ?>   <?php if($_GET['low']<>0) { ?> <?php if($_GET['area']==0) { ?> 
   <?php if($_GET[up]<>0) { ?>
   <div class="grid-100 pag_nav" style='  height: 89px;
  
  '>
  
    <div class='page_nav'>
                        <?php if(is_array($fad)) foreach($fad AS $jav) { ?>
       <?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $jav<>1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?low=<?php echo $loww;?>&height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&up=<?php echo $_GET['up'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 


<?php if($jav>=$start && $jav<$end   && $jav==$_GET[page] && $_GET[page]<>0) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?low=<?php echo $loww;?>&height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&up=<?php echo $_GET['up'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 
 <?php if($jav>=$start && $jav<$end && $_GET[page]==0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?low=<?php echo $loww;?>&height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&up=<?php echo $_GET['up'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?>
<?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $_GET[page]<>0 && $jav) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?low=<?php echo $loww;?>&height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&up=<?php echo $_GET['up'];?>#c_h"><strong style="font-size: 13px;color: #909090;">-><?php echo $jav;?><-</strong></a>
          <?php } ?>
  
<?php } ?>
</div>
                            <div class=" well-box cream-bg px13 f_gray page_info">
<?php echo $L['mp_total_records'];?>: <?php echo $pager['count'];?>&nbsp;&nbsp;<?php echo $L['mp_displaying_pages'];?>: <font color="red"><?php echo $pager['page'];?></font> <?php echo $L['mp_of'];?> <?php echo $pager['page_count'];?>&nbsp;&nbsp;<?php echo $L['mp_data_page'];?>: <?php echo $pager['size'];?>&nbsp;&nbsp;
</div>        
                      </div>
  <?php } ?>  <?php } ?> <?php } ?>
<?php } ?> 
<?php if($_GET['height']<>0) { ?>   <?php if($_GET['low']<>0) { ?> <?php if($_GET['area']==0) { ?> 
   <?php if($_GET[down]<>0) { ?>
   <div class="grid-100 pag_nav" style='  height: 89px;
  
  '>
  
    <div class='page_nav'>
                        <?php if(is_array($fad)) foreach($fad AS $jav) { ?>
       <?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $jav<>1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?low=<?php echo $loww;?>&height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&down=<?php echo $_GET['down'];?>#c_h"><strong style="font-size: 13px;color: #909090;"><?php echo $jav;?></strong></a>
          <?php } ?> 


<?php if($jav>=$start && $jav<$end   && $jav==$_GET[page] && $_GET[page]<>0) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?low=<?php echo $loww;?>&height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&down=<?php echo $_GET['down'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?> 
 <?php if($jav>=$start && $jav<$end && $_GET[page]==0 && $jav==1) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?low=<?php echo $loww;?>&height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&down=<?php echo $_GET['down'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?>
<?php if($jav>=$start && $jav<$end && $jav<>$_GET[page] && $_GET[page]<>0 && $jav) { ?>            
       <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?low=<?php echo $loww;?>&height=<?php echo $heightt;?>&page=<?php echo $jav;?>&ki=<?php echo $_GET['ki'];?>&down=<?php echo $_GET['down'];?>#c_h"><strong class="page_act" ><?php echo $jav;?></strong></a>
          <?php } ?>
  
<?php } ?>
</div>
                           <div class=" well-box cream-bg px13 f_gray page_info">
<?php echo $L['mp_total_records'];?>: <?php echo $pager['count'];?>&nbsp;&nbsp;<?php echo $L['mp_displaying_pages'];?>: <font color="red"><?php echo $pager['page'];?></font> <?php echo $L['mp_of'];?> <?php echo $pager['page_count'];?>&nbsp;&nbsp;<?php echo $L['mp_data_page'];?>: <?php echo $pager['size'];?>&nbsp;&nbsp;
</div>        
                      </div>
  <?php } ?>  <?php } ?> <?php } ?>
<?php } ?> 



