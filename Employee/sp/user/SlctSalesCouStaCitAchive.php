<?php require_once('config/config.php');
if(isset($_POST['CouId']) && $_POST['CouId']!=""){ ?>
<select style="font-size:12px;width:150px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="ClickState(this.value,<?php echo $_REQUEST['ei']; ?>)">
<option value="" selected>SELECT</option>	
<?php if($_REQUEST['di']==7){$sql=mysql_query("select hrm_sales_ebillstate.StateId,StateName from hrm_sales_ebillstate INNER JOIN hrm_state ON hrm_sales_ebillstate.StateId=hrm_state.StateId where (EmployeeID=".$_REQUEST['ei']." OR EmployeeID2=".$_REQUEST['ei']." OR EmployeeID3=".$_REQUEST['ei']." OR EmployeeID4=".$_REQUEST['ei'].") order by StateName ASC", $con); }

//select hrm_employee_state.StateId,StateName from hrm_employee_state INNER JOIN hrm_state ON hrm_employee_state.StateId=hrm_state.StateId INNER JOIN  hrm_country ON hrm_state.CountryId=hrm_country.CountryId where hrm_country.CountryId=".$_POST['CouId']." AND LOGISTICS_EId!='' AND LOGISTICS_EId!=0 AND LOGISTICS_EId=".$_REQUEST['ei']." order by StateName ASC

elseif($_REQUEST['ei']==169 OR $_REQUEST['ei']==223){ $sql = mysql_query("SELECT * FROM hrm_state where CountryId=".$_POST['CouId']." order by StateName ASC", $con); }
while($res = mysql_fetch_array($sql)){ ?>
<option value="<?php echo $res['StateId']; ?>"><?php echo strtoupper($res['StateName']); ?></option><?php } ?>
<?php if($_REQUEST['ei']==116){?><option value="16">MAHARASHTRA</option><?php } ?></select>
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
