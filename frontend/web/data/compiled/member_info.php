<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><script type="text/javascript">       
var redirect =  "<?php echo($redirect); ?>";
 $(document).ready(function(){
function ajax_fil(){
$.ajax({
url: "member.php?act=info_l",
cache: false,
type:'POST',
data:$("#filter").serializeArray(),
beforeSend: function() {
$('#result').html('<img class="loading1"  src="templates/<?php echo $CFG['tplname'];?>/images/load.GIF"/>');
},
success: function(html) {
 $("#result").html(html);
}});}

 $("select").change(function () {
$("select option:selected").each(ajax_fil);
})
$(".kup_imput").click(function () {
 $(".kup_imput").each(ajax_fil); });
$("#search").keyup(function () {
$("#search").each(ajax_fil); });
$(".filter_pad input:checkbox").click(ajax_fil);
  $("#filter img").on("click", function () {
  $(":radio").eq($("#filter img").index(this)).attr("checked", "checked").click(function(){$("#filter").each(ajax_fil);});
});
     window.onload = ajax_fil();
   });
</script>      


<div class=" cream-bg">
<div id="result" >
</div></div>

