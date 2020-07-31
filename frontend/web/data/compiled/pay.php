<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><form class="content-form margin-bottom" action="member.php?act=confirm" name="payform" method="POST" onSubmit="return chkpayform()" style='margin-bottom: 0px!important;'>
    <h2 class="zagalovok">
        <?php echo $L['fill_up_balance_go'];?>
    </h2>
    <div class="tui_input">
        <label for="amount" class=" label_dat_s"><?php echo $L['amount'];?> <span>*</span></label>
        <input type="text" class="custom_input1 dark-color light-bg" name="amount" id="amount" value="<?php echo $amount;?>" style="width:100px;"/> <span class="valyt"><?php echo $CFG['currency'];?></span>
    </div>
    <?php if(false) { ?>
    <div class="tui_input" >
        <label for="areaid" class=" label_dat_s"><?php echo $L['payment_system'];?> <span>*</span></label>
        <div class="custom-selectbox dark-color light-gradient ">
            <select name="paycenter" id="paycenter">
                
<?php if(is_array($payonline_setting)) foreach($payonline_setting AS $paycenter => $pay) { ?>
                <option value="<?php echo $pay['paycenter'];?>" <?php echo $selected[$paycenter];?>><?php echo $pay['name'];?></option>
                
<?php } ?>

            </select>
        </div>
    </div>
    <?php } else { ?>
    <input type="hidden" name="paycenter" value="w1">
    <?php } ?>
    <div class="summi" style=" padding-left: 43.5%;">
        <button type="submit" id="submit" class="button_nulik"><?php echo $L['further'];?></button>
    </div>
</form>
<script type="text/javascript">
    function chkpayform() {
        if (!parseFloat(document.payform.amount.value)) {
            alert('<?php echo $L['amount_empty'];?>');
            document.payform.amount.focus();
            return false;
        }
//        if (document.payform.amount.value == "0") {
//            alert('<?php echo $L['payment_system_empty'];?>');
//            document.payform.paycenter.focus();
//            return false;
//        }
    }
</script>