<?php require_once('../AdminUser/config/config.php');  ?>
<?php
if(isset($_POST['Save']))
{ 

$BY=date("Y")-1;
if($_POST['Y']>=date("Y")){ $PayTable='hrm_employee_monthlypayslip'; }
elseif($_POST['Y']==$BY AND date("m")=='01' AND $_POST['M']==12)
{ $PayTable='hrm_employee_monthlypayslip'; }
elseif($_POST['Y']==$BY AND $_POST['M']<12)
{ $PayTable='hrm_employee_monthlypayslip_'.$_POST['Y']; }
else
{ $PayTable='hrm_employee_monthlypayslip_'.$_POST['Y']; }

 $sqlMP=mysql_query("select * from ".$PayTable." where EmployeeID=".$_POST['E']." AND Month=".$_POST['M']." AND Year=".$_POST['Y']."", $con); 
 $rowMP=mysql_num_rows($sqlMP);
 if($rowMP>0){ 
 $UpSal=mysql_query("update ".$PayTable." set DeductAdjmt='".$_POST['YDeductAdjmt']."' where EmployeeID=".$_POST['E']." AND Month=".$_POST['M']." AND Year=".$_POST['Y']."", $con);}
 else{$UpSal=mysql_query("insert into ".$PayTable."(EmployeeID, Month, Year, DeductAdjmt) values(".$_POST['E'].", ".$_POST['M'].", ".$_POST['Y'].", '".$_POST['YDeductAdjmt']."')", $con);}
 if($UpSal){$msg='Successfully updated...';}
} 
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php include_once('../Title.php'); ?>&nbsp;Deduction Adjusment</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.Des{font-family:Times New Roman;font-size:14px;width:150px;}.Amt{font-family:Times New Roman;font-size:12px;width:90px;}
.TaxF{font-family:Times New Roman;font-size:12px;width:80px;}
</style>
<script language="javascript" type="text/javascript">
function EditAOI()
{document.getElementById("Save").style.display='block'; document.getElementById("Change").style.display='none'; 
 document.getElementById("YDeductAdjmt").readOnly=false; document.getElementById("YDeductAdjmt").style.background='#FFFFFF'; 
 document.getElementById("TRAmt").style.background='#FFFFFF';
}
</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#D9D1E7">	
<?php 
$sqlE = mysql_query("SELECT EmpCode,Fname,Sname,Lname,DR,Gender,Married,DesigId,DepartmentId FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$_REQUEST['E'], $con);  $ResE = mysql_fetch_assoc($sqlE); 
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
<table style="vertical-align:top;" width="380" align="center" border="0">
<?php $sql = mysql_query("SELECT * FROM ".$PayTable." WHERE EmployeeID=".$_REQUEST['E']." AND Month=".$_REQUEST['M']." AND Year=".$_REQUEST['Y'], $con); 
      $res = mysql_fetch_array($sql); ?>
<tr>
<td style="width:380px;">
<form method="post" name="FormDA">
<table border="1">
 <tr>
 <tr>
<td colspan="6" style="font-family:Times New Roman;font-size:14px;width:380px;font-weight:bold;background-color:#BCB198;color:#000;">
&nbsp;<font color="#800000">EC:</font>&nbsp;<?php echo $EC; ?>
</td>
</tr>
<tr>
<td colspan="6" style="font-family:Times New Roman;font-size:14px;width:380px;font-weight:bold;background-color:#BCB198;color:#000;">
&nbsp;<font color="#800000">Name:</font>&nbsp;<?php echo '&nbsp;'.$Ename; ?>
</td>
</tr>
<tr>
 <td bgcolor="#D9D1E7">
 <table border="1">
 <tr>
   <td align="center" class="Des" style="font-family:Times New Roman;font-size:14px;width:200px;background-color:#7a6189;color:#FFFFFF;"><b>Month/Year</b></td>
   <td align="center" class="Des" style="font-family:Times New Roman;font-size:14px;width:150px;background-color:#7a6189;color:#FFFFFF;"><b>Deduct<sup>n</sup> Adjustment</b></td>
 </tr>
<?php if($_REQUEST['M']==1){$SelM='January';} elseif($_REQUEST['M']==2){$SelM='February';} elseif($_REQUEST['M']==3){$SelM='March';} 
      elseif($_REQUEST['M']==4){$SelM='April';} elseif($_REQUEST['M']==5){$SelM='May';} elseif($_REQUEST['M']==6){$SelM='June';} 
	  elseif($_REQUEST['M']==7){$SelM='July';} elseif($_REQUEST['M']==8){$SelM='August';} elseif($_REQUEST['M']==9){$SelM='September';} 
	  elseif($_REQUEST['M']==10){$SelM='October';} elseif($_REQUEST['M']==11){$SelM='November';} elseif($_REQUEST['M']==12){$SelM='December';} ?> 
 <tr id="TRAmt" style="background-color:#DDDDDD;">
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;<b><?php echo $SelM.'/'.$_REQUEST['Y']; ?></b></td>
   <td align="center" class="Amt"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:150px;border-style:hidden;background-color:#DDDDDD;" id="YDeductAdjmt" name="YDeductAdjmt" value="<?php echo intval($res['DeductAdjmt']); ?>" readonly maxlength="8"/></td>
   <input type="hidden" name="E" value="<?php echo $_REQUEST['E']; ?>" /><input type="hidden" name="C" value="<?php echo $_REQUEST['C']; ?>" />
   <input type="hidden" name="YI" value="<?php echo $_REQUEST['YI']; ?>" /><input type="hidden" name="U" value="<?php echo $_REQUEST['U']; ?>" />
   <input type="hidden" name="M" value="<?php echo $_REQUEST['M']; ?>" /><input type="hidden" name="Y" value="<?php echo $_REQUEST['Y']; ?>" />
 <tr>
 <tr bgcolor="#7a6189">
   <td align="right" colspan="6">
    <table>
	 <tr>
	 <td style="font-family:Times New Roman;font-size:12px; font-weight:bold; color:#FFFFFF;"><?php echo $msg; ?>&nbsp;</td>
	 <td align="right"><input type="button" name="Change" id="Change" style="width:80px;" value="edit" onClick="EditAOI()">
					   <input type="submit" name="Save" id="Save" value="save" style="display:none;width:80px;"></td>
	 <td align="right" style="width:90px;"><input type="button" name="Refresh" id="Refresh" style="width:90px;" value="refresh" onClick="javascript:window.location='EditDeductAdjmt.php?E=<?php echo $_REQUEST['E']; ?>&C=<?php echo $_REQUEST['C']; ?>&YI=<?php echo $_REQUEST['YI']; ?>&U=<?php echo $_REQUEST['U']; ?>&M=<?php echo $_REQUEST['M']; ?>&Y=<?php echo $_REQUEST['Y']; ?>'"/> </td>				   
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