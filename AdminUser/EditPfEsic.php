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

  $TotDeduct=$_POST['Pf']+$_POST['Esic']+$_POST['NPS'];
  
 $sqlMP=mysql_query("select * from ".$PayTable." where EmployeeID=".$_POST['E']." AND Month=".$_POST['M']." AND Year=".$_POST['Y']."", $con); 
 $rowMP=mysql_num_rows($sqlMP);
 if($rowMP>0){ $UpSal=mysql_query("update ".$PayTable." set EPF_Employee='".$_POST['Pf']."', ESCI_Employee='".$_POST['Esic']."', Tot_Deduct='".$TotDeduct."' where EmployeeID=".$_POST['E']." AND Month=".$_POST['M']." AND Year=".$_POST['Y']."", $con);}
 else{$UpSal=mysql_query("insert into ".$PayTable."(EmployeeID, Month, Year, EPF_Employee, ESCI_Employee, Tot_Deduct) values(".$_POST['E'].", ".$_POST['M'].", ".$_POST['Y'].", '".$_POST['Pf']."', '".$_POST['Esic']."', '".$TotDeduct."')", $con);
 }
 if($UpSal){$msg='Successfully updated...';}
} 
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php include_once('../Title.php'); ?>&nbsp;Update PF & ESIC</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.Des{font-family:Times New Roman;font-size:14px;width:150px;}
.Amt{font-family:Times New Roman;font-size:12px;width:90px;}
.TaxF{font-family:Times New Roman;font-size:12px;width:80px;}
</style>
<script language="javascript" type="text/javascript">
function EditAOI()
{ 
 document.getElementById("Save").style.display='block'; document.getElementById("Change").style.display='none'; 
 document.getElementById("Pf").readOnly=false; document.getElementById("Pf").style.background='#FFFFFF'; 
 document.getElementById("Esic").readOnly=false; document.getElementById("Esic").style.background='#FFFFFF';
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
<table style="vertical-align:top;" width="500" align="center" border="0">
<?php $sql = mysql_query("SELECT * FROM ".$PayTable." WHERE EmployeeID=".$_REQUEST['E']." AND Month=".$_REQUEST['M']." AND Year=".$_REQUEST['Y'], $con); 
      $res = mysql_fetch_array($sql); ?>
<tr>
<td style="width:500px;">
<form method="post" name="FormDA">
<table border="1">
 <tr>
 <tr>
<td colspan="6" style="font-family:Times New Roman;font-size:14px;width:500px; font-weight:bold;background-color:#BCB198; color:#000;">
&nbsp;<font color="#800000">EC:</font>&nbsp;<?php echo $EC.'&nbsp;&nbsp;&nbsp;<font color="#800000">Name:</font>&nbsp;'.$Ename; ?>
</td>
</tr>
 <td bgcolor="#D9D1E7">
 <table border="1">
 <tr><td colspan="8" align="center" style="font-family:Times New Roman;font-size:14px;width:500px;background-color:#7a6189;color:#FFFFFF;"><b>PF & ESIC</b></td></tr> 
<?php if($_REQUEST['M']==1){$SelM='JAN';} elseif($_REQUEST['M']==2){$SelM='FEB';} elseif($_REQUEST['M']==3){$SelM='MAR';} elseif($_REQUEST['M']==4){$SelM='APR';} elseif($_REQUEST['M']==5){$SelM='MAY';} elseif($_REQUEST['M']==6){$SelM='JUN';} elseif($_REQUEST['M']==7){$SelM='JUL';} elseif($_REQUEST['M']==8){$SelM='AUG';} elseif($_REQUEST['M']==9){$SelM='SEP';} elseif($_REQUEST['M']==10){$SelM='OCT';} elseif($_REQUEST['M']==11){$SelM='NOV';} elseif($_REQUEST['M']==12){$SelM='DEC';} ?>  
 <tr>
   <td align="center" class="Des" style="background-color:#BCB198;">&nbsp;Month/Year&nbsp;</td>
   <td align="center" class="Des" style="background-color:#BCB198;">Pf</td>
   <td align="center" class="Des" style="background-color:#BCB198;">Esic</td>
 </tr>
 <tr id="TRAmt" style="background-color:#DDDDDD;">
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;<b><?php echo $SelM.'-'.$_REQUEST['Y']; ?></b></td>
   <td align="center" class="Amt"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:100%;border-style:hidden;background-color:#DDDDDD;" id="Pf" name="Pf" value="<?php echo intval($res['EPF_Employee']); ?>" readonly /></td>
   <td align="center" class="Amt"><input style="text-align:right;font-family:Times New Roman;font-size:12px;width:100%;border-style:hidden;background-color:#DDDDDD;" id="Esic" name="Esic" value="<?php echo intval($res['ESCI_Employee']); ?>" readonly /></td>
   <input type="hidden" id="NPS" name="NPS" value="<?php echo intval($res['NPS_Value']); ?>" readonly />
   
   
   
   <input type="hidden" name="E" value="<?php echo $_REQUEST['E']; ?>" /><input type="hidden" name="C" value="<?php echo $_REQUEST['C']; ?>" />
   <input type="hidden" name="YI" value="<?php echo $_REQUEST['YI']; ?>" /><input type="hidden" name="U" value="<?php echo $_REQUEST['U']; ?>" />
   <input type="hidden" name="M" value="<?php echo $_REQUEST['M']; ?>" /><input type="hidden" name="Y" value="<?php echo $_REQUEST['Y']; ?>" />
 <tr>
 <tr bgcolor="#7a6189">
   <td align="right" colspan="8">
    <table>
	 <tr>
	 <td style="font-family:Times New Roman;font-size:12px; font-weight:bold; color:#FFFFFF;"><?php echo $msg; ?>&nbsp;</td>
	 <td align="right"><input type="button" name="Change" id="Change" style="width:80px;" value="edit" onClick="EditAOI()"><input type="submit" name="Save" id="Save" value="save" style="display:none;width:80px;"></td>
	 <td align="right" style="width:90px;"><input type="button" name="Refresh" id="Refresh" style="width:90px;" value="refresh" onClick="javascript:window.location='EditPfEsic.php?E=<?php echo $_REQUEST['E']; ?>&C=<?php echo $_REQUEST['C']; ?>&YI=<?php echo $_REQUEST['YI']; ?>&U=<?php echo $_REQUEST['U']; ?>&M=<?php echo $_REQUEST['M']; ?>&Y=<?php echo $_REQUEST['Y']; ?>'"/> </td>				   
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