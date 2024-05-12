<?php require_once('../AdminUser/config/config.php');  $EmployeeId=$_REQUEST['EI'];?>
<?php
if($_REQUEST['ID'] AND $_REQUEST['ID']!='')
{
$sqlU=mysql_query("update hrm_pms_appraisal_history set Incentive='".$_REQUEST['IncDV']."' where AppHistoryId=".$_REQUEST['ID'], $con);
if($sqlU){$msg="Successfully updated..";}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="../AdminUser/css/body.css" rel="stylesheet"/>
<link type="text/css" href="../AdminUser/css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:120px;} .font1 { font-family:"Times New Roman", Times, serif; font-size:11px; width:120px; } 
.font2 { font-size:11px;width:260px;height:18px;} .font4 {color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.TextInput { font-family:"Times New Roman", Times, serif; font-size:11px; width:100px; height:18px;}
</style>
<style>.head{font-family:Times New Roman;font-size:14px;font-weight:bold;}.data{font-family:Times New Roman;font-size:13px;}</style>
<script language="javascript" type="text/javascript">
function PrinP() { document.getElementById("PrintTD").style.display='none'; window.print(); window.close();}

function Editbtn(HI,Sn,EI){ 
var IncDV=document.getElementById("IncentiveEdit_"+Sn).value; 
var agree=confirm("Are you sure you want to edit?");  
if (agree) { window.location="EmpincHistory.php?ID="+HI+"&Sn="+Sn+"&EI="+EI+"&IncDV="+IncDV; }
}
</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#E0DBE3">	
<?php $sqlE=mysql_query("select EmpCode, Fname, Sname, Lname, CompanyId, DepartmentId, DesigId, GradeId, HqId, Gender, DR, Married, DateJoining, DOB, EmailId_Vnr, VNRExpYear, PreviousExpYear, INCENTIVE from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_ctc ON hrm_employee.EmployeeID=hrm_employee_ctc.EmployeeID where hrm_employee.EmployeeID=".$EmployeeId, $con); $resE=mysql_fetch_assoc($sqlE); 
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $Name=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
$sqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
$sqlDe=mysql_query("select DesigName from hrm_designation where DesigId=".$resE['DesigId'], $con); $resDe=mysql_fetch_assoc($sqlDe);
$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$resE['GradeId'], $con); $resG=mysql_fetch_assoc($sqlG);
$sqlHq=mysql_query("select HqName from hrm_headquater where HqId=".$resE['HqId'], $con); $resHq=mysql_fetch_assoc($sqlHq);  
?>
<table style="vertical-align:top;width:900px;" align="center" border="0">
<tr>
<td>
 <table border="0">
  <tr><td style="vertical-align:top;width:900px;font-size:20px;font-family:Times New Roman;color:#006A00;" valign="top" align="center"><b><u>Employee History</u></b></td></tr>
  <tr>
    <td style="vertical-align:top;width:900px;" valign="top">
	  <table border="0">
	   <tr>
	     <td align="center" style="width:150px;" valign="top"><?php echo "<img width=90px height=100px border=1 src=\"show_images.php?id=".$EmployeeId."\">\n";?></td>
		 <td valign="top" align="right">
		   <table border="1" bgcolor="#FFFFFF">
		    <tr>
			  <td class="head" style="width:100px;" valign="top">&nbsp;Name</td>
			  <td class="data" style="width:250px;text-transform:uppercase;" valign="top">&nbsp;<?php echo $Name; ?></td>
			  <td class="head" style="width:100px;" valign="top">&nbsp;Employee Code</td>
			  <td class="data" style="width:225px;" valign="top">&nbsp;<?php echo $resE['EmpCode']; ?></td>
			</tr>
			<tr>
			  <td class="head" style="width:100px;" valign="top">&nbsp;Designation</td>
			  <td class="data" style="width:250px;text-transform:uppercase;" valign="top">&nbsp;<?php echo $resDe['DesigName']; ?></td>
			  <td class="head" style="width:100px;" valign="top">&nbsp;Department</td>
			  <td class="data" style="width:225px;text-transform:uppercase;" valign="top">&nbsp;<?php echo $resD['DepartmentName']; ?></td>
			</tr>
			<tr>
			  <td class="head" style="width:100px;" valign="top">&nbsp;Location</td>
			  <td class="data" style="width:250px;text-transform:uppercase;" valign="top">&nbsp;<?php echo $resHq['HqName']; ?></td>
			  <td class="head" style="width:100px;" valign="top">&nbsp;DOJ</td>
			  <td class="data" style="width:225px;" valign="top">&nbsp;<?php echo date("d-m-Y",strtotime($resE['DateJoining'])); ?></td>
			</tr>
<?php $sqlQ=mysql_query("select QualificationId from hrm_employee_qualification where EmployeeID=".$EmployeeId." AND (Qualification='10th' OR Qualification='12th' OR Qualification='Graduation' OR Qualification='Post_Graduation') AND Institute!='' AND PassOut!='' AND PassOut!=0", $con); $rowQ=mysql_num_rows($sqlQ); ?>			
		   </table>
		 </td> 
	   </tr>
	  </table>
	</td>
  </tr>
  <tr><td>&nbsp;</td></tr>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">	  
  <tr><td align="" valign="top" style="width:900px;font-size:16px;font-family:Times New Roman;">
  &nbsp;<b>Career Progression in VNR</b>&nbsp;&nbsp;&nbsp;<font color="#008000"><b><?php echo $msg; ?></b></font></td></tr>
  <tr>
    <td style="vertical-align:top;width:900px;" valign="top">
	  <table border="1">
	   <tr bgcolor="#7a6189" style="height:22px;">
		<td align="center" class="head" style="color:#FFFFFF;width:50px;">SNo</td>
		<td align="center" class="head" style="color:#FFFFFF;width:100px;">Change Date</td>
		<td align="center" class="head" style="color:#FFFFFF;width:400px;">Designation</td>
		<td align="center" class="head" style="color:#FFFFFF;width:70px;">Grade</td>
		<td align="center" class="head" style="color:#FFFFFF;width:100px;">Incentive</td>
		<td align="center" class="head" style="color:#FFFFFF;width:50px;">Edit</td>	
	   </tr>
<?php $sqlHi2=mysql_query("select AppHistoryId,SalaryChange_Date,Proposed_Designation,Proposed_Grade,TotalProp_GSPM, TotalProp_PerInc_GSPM, Incentive from hrm_pms_appraisal_history where EmpCode=".$resE['EmpCode']." AND CompanyId=".$resE['CompanyId']." AND SalaryChange_Date>='".date('2012-01-01')."' order by SalaryChange_Date DESC", $con); 
      $Sno2=1; while($resHi2=mysql_fetch_array($sqlHi2)){ ?>	
       <tr bgcolor="#FFFFFF" style="height:22px;">
		<td align="center" class="data" style="width:50px;" valign="top"><?php echo $Sno2; ?></td>
		<td align="center" class="data" style="width:100px;" valign="top"><?php echo date("d-m-Y",strtotime($resHi2['SalaryChange_Date'])); ?></td>
		<td align="" class="data" style="width:400px;text-transform:uppercase;" valign="top">&nbsp;<?php echo $resHi2['Proposed_Designation']; ?></td>
		<td align="center" class="data" style="width:70px;" valign="top"><?php echo $resHi2['Proposed_Grade']; ?></td>
		<td align="right" class="data" style="width:100px;" valign="top"><?php if($resE['INCENTIVE']=='Y') { ?><input name="IncentiveEdit_<?php echo $Sno2; ?>" id="IncentiveEdit_<?php echo $Sno2; ?>" style="font-family:Times New Roman, Times, serif; font-size:11px; width:98px;" value="<?php echo $resHi2['Incentive']; ?>" /><?php } else { echo $resHi2['Incentive']; }?></td>
		<td align="center" class="data" style="width:50px;" valign="top"><input type="button" name="SaveEdit"  value="" onClick="Editbtn(<?php echo $resHi2['AppHistoryId'].', '.$Sno2.', '.$EmployeeId; ?>)" class="SaveButton"></td>	
	   </tr>   	
<?php $Sno2++; } $Sno=$Sno2; ?>	     	   
<?php $sqlHi=mysql_query("select AppHistoryId,SalaryChange_Date, Current_Designation, Current_Grade, Previous_GrossSalaryPM, Prop_PeInc_GSPM, Incentive from hrm_pms_appraisal_history where EmpCode=".$resE['EmpCode']." AND CompanyId=".$resE['CompanyId']." AND SalaryChange_Date<'".date('2012-01-01')."' order by SalaryChange_Date DESC", $con); 
       while($resHi=mysql_fetch_array($sqlHi)){ ?>	
       <tr bgcolor="#FFFFFF" style="height:22px;">
		<td align="center" class="data" style="width:50px;"><?php echo $Sno; ?></td>
		<td align="center" class="data" style="width:100px;"><?php echo date("d-m-Y",strtotime($resHi['SalaryChange_Date'])); ?></td>
		<td align="" class="data" style="width:400px;text-transform:uppercase;" valign="top">&nbsp;<?php echo $resHi['Current_Designation']; ?></td>
		<td align="center" class="data" style="width:70px;"><?php echo $resHi['Current_Grade']; ?></td>
		<td align="right" class="data" style="width:100px;"><?php if($resE['INCENTIVE']=='Y') { ?><input name="IncentiveEdit_<?php echo $Sno; ?>" id="IncentiveEdit_<?php echo $Sno; ?>" style="font-family:Times New Roman, Times, serif; font-size:11px; width:98px;" value="<?php echo $resHi['Incentive']; ?>" /><?php } else { echo $resHi['Incentive']; }?></td>
		<td align="center" class="data" style="width:50px;"><input type="button" name="SaveEdit"  value="" onClick="Editbtn(<?php echo $resHi['AppHistoryId'].', '.$Sno.', '.$EmployeeId; ?>)" class="SaveButton"></td>	
	   </tr>   	
<?php $Sno++; } ?>	 
	  </table>
	</td>
  </tr>
</form>
  <tr><td>&nbsp;</td></tr>
 </table>
</td>
</tr>
</table>
</body>  
</html>
