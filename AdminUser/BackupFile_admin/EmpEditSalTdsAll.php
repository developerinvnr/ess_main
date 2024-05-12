<?php require_once('../AdminUser/config/config.php');  
$M=$_REQUEST['M']; if($M==1){$Month='January';}elseif($M==2){$Month='February';}elseif($M==3){$Month='March';}elseif($M==4){$Month='April';}elseif($M==5){$Month='May';}elseif($M==6){$Month='June';}elseif($M==7){$Month='July';}elseif($M==8){$Month='August';}elseif($M==9){$Month='September';}elseif($M==10){$Month='October';}elseif($M==11){$Month='November';}elseif($M==12){$Month='December';} 

$BY=date("Y")-1;
if($_POST['Y']>=date("Y")){ $PayTable='hrm_employee_monthlypayslip'; }
elseif($_POST['Y']==$BY AND date("m")=='01' AND $_POST['M']==12)
{ $PayTable='hrm_employee_monthlypayslip'; }
elseif($_POST['Y']==$BY AND $_POST['M']<12)
{ $PayTable='hrm_employee_monthlypayslip_'.$_POST['Y']; }
else
{ $PayTable='hrm_employee_monthlypayslip_'.$_POST['Y']; }


?>
<?php       
if(isset($_POST['Save']))
{ 
$sqlMP=mysql_query("select * from ".$PayTable." where EmployeeID=".$_POST['E']." AND Month=".$_POST['M']." AND Year=".$_POST['Y']."", $con); 
$rowMP=mysql_num_rows($sqlMP);
if($rowMP>0){ $UpSal=mysql_query("update ".$PayTable." set Hra=".$_POST['Hra'].", Special=".$_POST['Special'].", Bonus=".$_POST['Bonus'].", DA=".$_POST['Da'].", Arreares=".$_POST['Arrear'].", LeaveEncash=".$_POST['LeaveEnCash'].", Incentive=".$_POST['Incentive'].", VariableAdjustment=".$_POST['VarAdjust'].", PerformancePay=".$_POST['PerformPay'].", Bonus_Adjustment=".$_POST['Bonus_Adjustment'].", CCA=".$_POST['CCA'].", RA=".$_POST['RA'].", RA_Recover=".$_POST['RA_Recover'].", Car_Allowance=".$_POST['Car_Allowance'].", VarRemburmnt=".$_POST['VarRemburmnt'].", TA=".$_POST['TA']." where EmployeeID=".$_POST['E']." AND Month=".$_POST['M']." AND Year=".$_POST['Y']."", $con);}
else{ $UpSal=mysql_query("insert into ".$PayTable."(EmployeeID, Month, Year, Hra, Special, Bonus, DA, Arreares, LeaveEncash, Incentive, VariableAdjustment, PerformancePay, Bonus_Adjustment, CCA, RA, RA_Recover, Car_Allowance, VarRemburmnt, TA) values(".$_POST['E'].", ".$_POST['M'].", ".$_POST['Y'].", ".$_POST['Hra'].", ".$_POST['Special'].", ".$_POST['Bonus'].", ".$_POST['Da'].", ".$_POST['Arrear'].", ".$_POST['LeaveEnCash'].", ".$_POST['Incentive'].", ".$_POST['VarAdjust'].", ".$_POST['PerformPay'].", ".$_POST['Bonus_Adjustment'].", ".$_POST['CCA'].", ".$_POST['RA'].", ".$_POST['RA_Recover'].", ".$_POST['Car_Allowance'].", ".$_POST['VarRemburmnt'].", ".$_POST['TA'].")", $con);}
 if($UpSal){$msg='Successfully updated...';}
} 
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php include_once('../Title.php'); ?>&nbsp;SalTDS <?php echo $Month; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.Des{font-family:Times New Roman;font-size:12px;width:300px;}.Amt{font-family:Times New Roman;font-size:12px;width:100px;}
.TaxF{font-family:Times New Roman;font-size:12px;width:80px;}
</style>
<script language="javascript" type="text/javascript">
function EditSalTDSAll()
{ document.getElementById("Save").style.display='block'; document.getElementById("Change").style.display='none'; 

//document.getElementById("Hra").readOnly=false;
//document.getElementById("Special").readOnly=false;
  document.getElementById("Da").readOnly=false; document.getElementById("LeaveEnCash").readOnly=false; document.getElementById("Arrear").readOnly=false; document.getElementById("Incentive").readOnly=false; document.getElementById("Bonus").readOnly=false; document.getElementById("VarAdjust").readOnly=false;  document.getElementById("PerformPay").readOnly=false; document.getElementById("CCA").readOnly=false; document.getElementById("RA").readOnly=false; document.getElementById("Car_Allowance").readOnly=false; 
  
  //document.getElementById("Hra").style.background='#EAEAEA';
  //document.getElementById("Special").style.background='#EAEAEA';
  
  document.getElementById("Da").style.background='#EAEAEA'; document.getElementById("LeaveEnCash").style.background='#EAEAEA'; document.getElementById("Arrear").style.background='#EAEAEA'; document.getElementById("Incentive").style.background='#EAEAEA'; document.getElementById("Bonus").style.background='#EAEAEA'; document.getElementById("VarAdjust").style.background='#EAEAEA';  document.getElementById("PerformPay").style.background='#EAEAEA'; document.getElementById("CCA").style.background='#EAEAEA'; document.getElementById("RA").style.background='#EAEAEA'; document.getElementById("Car_Allowance").style.background='#EAEAEA';
  document.getElementById("VarRemburmnt").readOnly=false; document.getElementById("VarRemburmnt").style.background='#EAEAEA';
  document.getElementById("TA").readOnly=false; document.getElementById("TA").style.background='#EAEAEA';
  document.getElementById("RA_Recover").readOnly=false; document.getElementById("RA_Recover").style.background='#EAEAEA'; 
  document.getElementById("Bonus_Adjustment").readOnly=false;
  document.getElementById("Bonus_Adjustment").style.background='#EAEAEA';

}

</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#D9D1E7">	
<?php $sqlE = mysql_query("SELECT EmpCode,Fname,Sname,Lname,DR,Gender,Married,DesigId,DepartmentId FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$_REQUEST['E'], $con);  $ResE = mysql_fetch_assoc($sqlE); 
$sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$ResE['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResE['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
if($ResE['DR']=='Y'){$M='Dr.';} elseif($ResE['Gender']=='M'){$M='Mr.';} elseif($ResE['Gender']=='F' AND $ResE['Married']=='Y'){$M='Mrs.';} elseif($ResE['Gender']=='F' AND $ResE['Married']=='N'){$M='Miss.';}  
$Ename=$M.' '.$ResE['Fname'].' '.$ResE['Sname'].' '.$ResE['Lname']; $LEC=strlen($ResE['EmpCode']); 
if($LEC==1){$EC='000'.$ResE['EmpCode'];} if($LEC==2){$EC='00'.$ResE['EmpCode'];} if($LEC==3){$EC='0'.$ResE['EmpCode'];} if($LEC>=4){$EC=$ResE['EmpCode'];}

$BY=date("Y")-1;
if($_REQUEST['Y']>=date("Y")){ $PayTable='hrm_employee_monthlypayslip'; }
elseif($_REQUEST['Y']==$BY AND date("m")=='01' AND $_REQUEST['M']==12)
{ $PayTable='hrm_employee_monthlypayslip'; }
elseif($_REQUEST['Y']==$BY AND $_REQUEST['M']<12)
{ $PayTable='hrm_employee_monthlypayslip_'.$_REQUEST['Y']; }
else
{ $PayTable='hrm_employee_monthlypayslip_'.$_REQUEST['Y']; }
?>
<table style="vertical-align:top;" width="400" align="center" border="1">
<?php $sql = mysql_query("select * from ".$PayTable." where EmployeeID=".$_REQUEST['E']." AND Month=".$_REQUEST['M']." AND Year=".$_REQUEST['Y']."", $con); 
      $res = mysql_fetch_array($sql); ?>
<tr>
<td style="width:400px;">
<form method="post" name="FormDA">
<table border="0">
 <tr>
 <tr>
<td colspan="3" style="font-family:Times New Roman;font-size:14px;width:400px; font-weight:bold;background-color:#BCB198; color:#000;">
&nbsp;<font color="#800000">EC:</font>&nbsp;<?php echo $EC.'&nbsp;&nbsp;&nbsp;<font color="#800000">Name:</font>&nbsp;'.$Ename; ?>
</td>
</tr>
 <td bgcolor="#D9D1E7">
 <table border="1">
 <tr>
  <td colspan="2" align="center" style="font-family:Times New Roman;font-size:14px;width:400px;background-color:#7a6189;color:#FFFFFF;">
  <b><?php echo $Month.'/'.$_REQUEST['Y'].' - SalTDS All Field'; ?></b></td>
 </tr> 
 <tr>
   <td align="center" class="Des" style="background-color:#BCB198;">Field</td>
   <td align="center" class="Amt" style="background-color:#BCB198;">Amount</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;HRA</td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:98px;border-style:hidden;" id="Hra" name="Hra" value="<?php echo intval($res['Hra']); ?>" maxlength="10" readonly /></td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;SPECIAL</td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:98px;border-style:hidden;" id="Special" name="Special" value="<?php echo intval($res['Special']); ?>" maxlength="10" readonly /></td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;DA</td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:98px;border-style:hidden;" id="Da" name="Da" value="<?php echo intval($res['DA']); ?>" maxlength="10" readonly /></td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;LEAVE ENCASHENT</td>
   <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:98px;border-style:hidden;" id="LeaveEnCash" name="LeaveEnCash" value="<?php echo intval($res['LeaveEncash']); ?>" maxlength="10" readonly /></td>
 </tr>
 <tr>
  <td class="Des" style="background-color:#FFFFFF;">&nbsp;ARREAR</td>
  <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:98px;border-style:hidden;" id="Arrear" name="Arrear" value="<?php echo intval($res['Arreares']); ?>" maxlength="10" readonly /></td>
 </tr>
 <tr>   
  <td class="Des" style="background-color:#FFFFFF;">&nbsp;INCENTIVE</td>
  <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:98px;border-style:hidden;" id="Incentive" name="Incentive" value="<?php echo intval($res['Incentive']); ?>" maxlength="10" readonly /></td>
 </tr>
  <tr>
  <td class="Des" style="background-color:#FFFFFF;">&nbsp;BONUS</td>
  <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:98px;border-style:hidden;" id="Bonus" name="Bonus" value="<?php echo intval($res['Bonus']); ?>" maxlength="10" readonly /></td>
 </tr>
  <tr>
  <td class="Des" style="background-color:#FFFFFF;">&nbsp;VARIABLE ADJUSTMENT</td>
  <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:98px;border-style:hidden;" id="VarAdjust" name="VarAdjust" value="<?php echo intval($res['VariableAdjustment']); ?>" maxlength="10" readonly /></td>
 </tr>
  <tr>
  <td class="Des" style="background-color:#FFFFFF;">&nbsp;PERFORMANCE PAY</td>
  <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:98px;border-style:hidden;" id="PerformPay" name="PerformPay" value="<?php echo intval($res['PerformancePay']); ?>" maxlength="10" readonly /></td>
 </tr>
  <tr>
  <td class="Des" style="background-color:#FFFFFF;">&nbsp;CCA</td>
  <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:98px;border-style:hidden;" id="CCA" name="CCA" value="<?php echo intval($res['CCA']); ?>" maxlength="10" readonly /></td>
 </tr>  
  <tr>
  <td class="Des" style="background-color:#FFFFFF;">&nbsp;RA</td>
  <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:98px;border-style:hidden;" id="RA" name="RA" value="<?php echo intval($res['RA']); ?>" maxlength="10" readonly /></td>
 </tr>
 <tr>
  <td class="Des" style="background-color:#FFFFFF;">&nbsp;CAR ALLOWANCE</td>
  <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:98px;border-style:hidden;" id="Car_Allowance" name="Car_Allowance" value="<?php echo intval($res['Car_Allowance']); ?>" maxlength="10" readonly /></td>
 </tr>
 <tr>
  <td class="Des" style="background-color:#FFFFFF;">&nbsp;VARIABLE REIMBURSEMENT</td>
  <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:98px;border-style:hidden;" id="VarRemburmnt" name="VarRemburmnt" value="<?php echo intval($res['VarRemburmnt']); ?>" maxlength="10" readonly /></td>
 </tr>
 <tr>
  <td class="Des" style="background-color:#FFFFFF;">&nbsp;TA</td>
  <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:98px;border-style:hidden;" id="TA" name="TA" value="<?php echo intval($res['TA']); ?>" maxlength="10" readonly /></td>
 </tr>
 <tr>
  <td class="Des" style="background-color:#FFFFFF;">&nbsp;RA RECOVERY</td>
  <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:98px;border-style:hidden;" id="RA_Recover" name="RA_Recover" value="<?php echo intval($res['RA_Recover']); ?>" maxlength="10" readonly /></td>
 </tr>
 <tr>
  <td class="Des" style="background-color:#FFFFFF;">&nbsp;BONUS ADJUSTMENT</td>
  <td align="center" class="Amt" style="background-color:#FFFFFF;"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:98px;border-style:hidden;" id="Bonus_Adjustment" name="Bonus_Adjustment" value="<?php echo intval($res['Bonus_Adjustment']); ?>" maxlength="10" readonly /></td>
 </tr>
 <tr bgcolor="#7a6189">
   <td align="right" colspan="4">
    <table>
	 <tr>
	 <td style="font-family:Times New Roman;font-size:12px; font-weight:bold; color:#FFFFFF;"><?php echo $msg; ?>&nbsp;
	 <input type="hidden" name="E" value="<?php echo $_REQUEST['E']; ?>" /><input type="hidden" name="C" value="<?php echo $_REQUEST['C']; ?>" />
     <input type="hidden" name="YI" value="<?php echo $_REQUEST['YI']; ?>" /><input type="hidden" name="U" value="<?php echo $_REQUEST['U']; ?>" />
     <input type="hidden" name="M" value="<?php echo $_REQUEST['M']; ?>" /><input type="hidden" name="Y" value="<?php echo $_REQUEST['Y']; ?>" />
	 </td>
	 <td align="right"><input type="button" name="Change" id="Change" style="width:80px;" value="edit" onClick="EditSalTDSAll()">
					   <input type="submit" name="Save" id="Save" value="save" style="display:none;width:80px;"></td>
	 <td align="right" style="width:90px;"><input type="button" name="Refresh" id="Refresh" style="width:90px;" value="refresh" onClick="javascript:window.location='EmpEditSalTdsAll.php?E=<?php echo $_REQUEST['E']; ?>&C=<?php echo $_REQUEST['C']; ?>&YI=<?php echo $_REQUEST['YI']; ?>&U=<?php echo $_REQUEST['U']; ?>&M=<?php echo $_REQUEST['M']; ?>&Y=<?php echo $_REQUEST['Y']; ?>'"/> </td>				   
	</tr>
	</table>
	</td>
	</tr>
 </table>
 </form>
 </td>
 </tr>
</table>
</td>
</tr>
</table>
</body>
</html>