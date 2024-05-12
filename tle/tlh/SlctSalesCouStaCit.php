<?php require_once('../../Employee/sp/user/config/config.php');
if(isset($_POST['CouId']) && $_POST['CouId']!=""){ ?>
<select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="ClickState(this.value)">
<option value="" selected>SELECT</option>	
<?php $sql = mysql_query("SELECT * FROM hrm_state where CountryId=".$_POST['CouId']." order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
<option value="<?php echo $res['StateId']; ?>"><?php echo strtoupper($res['StateName']); ?></option><?php } ?></select>
<?php } ?>


<?php if(isset($_POST['StaId']) && $_POST['StaId']!=""){ ?>
<select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="Hq" id="Hq" onChange="ClickHq(this.value)"><option value="" selected>SELECT</option>
<?php $sql = mysql_query("SELECT * FROM hrm_headquater where StateId=".$_POST['StaId']." AND CompanyId=".$_POST['CId']." AND HQStatus='A' order by HqName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
<option value="<?php echo $res['HqId']; ?>"><?php echo strtoupper($res['HqName']); ?></option><?php } ?></select>
<?php } ?>


<?php if(isset($_POST['AchiveStaId']) && $_POST['AchiveStaId']!=""){ ?>
<select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="Hq" id="Hq" onChange="ClickHq(this.value)">
<option value="" selected>SELECT</option>
<?php $sql = mysql_query("SELECT * FROM hrm_headquater where StateId=".$_POST['AchiveStaId']." AND CompanyId=".$_POST['CId']." AND HQStatus='A' order by HqName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
<option value="<?php echo $res['HqId']; ?>"><?php echo strtoupper($res['HqName']); ?></option><?php } ?></select>
<?php } ?>


<?php if(isset($_POST['AchiveHqId']) && $_POST['AchiveHqId']!=""){ ?>
<select style="font-size:12px;width:250px;height:20px;background-color:#DDFFBB;" name="DealerD" id="DealerD" onchange="ClickDealer(this.value)">
<option value="" selected>SELECT</option>
<?php $sql = mysql_query("SELECT * FROM hrm_sales_dealer where HqId=".$_POST['AchiveHqId']." order by DealerName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
<option value="<?php echo $res['DealerId']; ?>"><?php echo $res['DealerName'].'--'.strtoupper($res['DealerCity']); ?></option><?php } ?></select>
<?php } ?>




