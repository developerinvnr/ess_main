<?php session_start();
require_once('../AdminUser/config/config.php');
$sql=mysql_query("select Appraiser_EmployeeID,Reviewer_EmployeeID,Appraiser_Justification,Reviewer_Justification,HR_Curr_DepartmentId from hrm_employee_pms where AssessmentYear=".$_REQUEST['Y']." AND EmployeeID=".$_REQUEST['E']." AND EmpPmsId=".$_REQUEST['P'], $con); $res=mysql_fetch_assoc($sql);
$sqlE=mysql_query("select * from hrm_employee where EmployeeID=".$_REQUEST['E'], $con); 
$sqlA=mysql_query("select * from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'], $con); 
$sqlR=mysql_query("select * from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'], $con);  
$resE=mysql_fetch_assoc($sqlE); $resA=mysql_fetch_assoc($sqlA); $resR=mysql_fetch_assoc($sqlR); 
$sqlD=mysql_query("select * from hrm_department where DepartmentId=".$res['HR_Curr_DepartmentId'], $con);
$resD=mysql_fetch_assoc($sqlD);
?>

<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<style>
.head{font-family:Times New Roman;font-size:14px;font-weight:bold;color:#000;text-align:center;}
.data{font-family:Times New Roman;font-size:14px;}
</style>
</head>
<body class="body" style="background-image:url(images/pmsback.png);">  
<center> 
<table class="table" border="0" width="100%">
<tr>
 <td style="width:100%;">
  <table style="width:100%;">
   <tr>
    <td colspan="3" style="font-family:Times New Roman;font-weight:bold;font-size:16px;color:#FFFFFF;">
    <font color="#000000"><i><u>EmpCode</u> :</i>&nbsp;</font><?php echo $resE['EmpCode']; ?>&nbsp;&nbsp;&nbsp;<font color="#000000"><i><u>Employee Name</u> :</i>&nbsp;</font><?php echo strtoupper($resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']); ?>&nbsp;&nbsp;&nbsp;<font color="#000000"><i><u>Department</u> :</i>&nbsp;</font><?php echo strtoupper($resD['DepartmentName']); ?></td>
   </tr>
  </table>
 </td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
 <td style="width:100%;">
  <table style="width:100%;">
   <tr>
    <td colspan="3" style="font-family:Times New Roman;font-size:16px;color:#0060BF;">
    <font color="#000000"><b>Appraiser</b> :&nbsp;</font><?php echo strtoupper($resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname']); ?></td>
   </tr>
   <?php if($res['Appraiser_Justification']!=''){ ?>
   <tr>
    <td colspan="3" style="font-family:Times New Roman;font-size:16px;color:#0060BF;">
    <font color="#000000">Appraiser Justification :&nbsp;</font><?php echo $res['Appraiser_Justification']; ?></td>
   </tr>
   <?php } ?>
  </table>
 </td>
</tr>

<tr>
 <td style="width:100%;">
  <table style="width:100%;">
   <tr>
    <td colspan="3" style="font-family:Times New Roman;font-size:16px;color:#0060BF;">
    <font color="#000000"><b>Reviewer</b> :&nbsp;</font><?php echo strtoupper($resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname']); ?></td>
   </tr>
   <?php if($res['Reviewer_Justification']!=''){ ?>
   <tr>
    <td colspan="3" style="font-family:Times New Roman;font-size:16px;color:#0060BF;">
    <font color="#000000">Reviewer Justification :&nbsp;</font><?php echo $res['Reviewer_Justification']; ?></td>
   </tr>
   <?php } ?>
  </table>
 </td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
 <td style="width:100%;">
  <table style="width:100%;">
   <tr>
    <td colspan="3" style="font-family:Times New Roman;font-size:16px;color:#0060BF;">
    <font color="#000000"><b>Promotion History in VNR</b>:&nbsp;</font></td>
   </tr>
  </table>
 </td>
</tr>
  <tr>
    <td style="vertical-align:top;width:100%;" valign="top">
	  <table border="1" style="width:100%;" cellspacing="0">
	   <tr bgcolor="#DDDD00" style="height:25px;">
		<td class="head" style="width:50px;">SNo</td>
		<td class="head" style="width:100px;">Date</td>
		<td class="head" style="width:400px;">Designation</td>
		<td class="head" style="width:70px;">Grade</td>
		<?php /*?><td class="head" style="width:100px;">Monthly_Gross</td>
		<td class="head" style="width:100px;">% Increment</td>	<?php */?>
	   </tr>
<?php //$sqlHi2=mysql_query("select SalaryChange_Date, Proposed_Designation, Proposed_Grade, TotalProp_GSPM, TotalProp_PerInc_GSPM from hrm_pms_appraisal_history where EmpCode=".$resE['EmpCode']." AND CompanyId=".$resE['CompanyId']." AND SalaryChange_Date>='".date('2012-01-01')."' order by SalaryChange_Date DESC", $con);
$sqlHi2=mysql_query("select SalaryChange_Date, Current_Designation, Current_Grade, Proposed_Designation, Proposed_Grade, TotalProp_GSPM, TotalProp_PerInc_GSPM from hrm_pms_appraisal_history where EmpCode=".$resE['EmpCode']." AND CompanyId=".$resE['CompanyId']." AND SalaryChange_Date>='".date('2012-01-01')."' AND Proposed_Grade!='' group by Proposed_Grade order by SalaryChange_Date DESC", $con); 
      $Sno2=1; while($resHi2=mysql_fetch_array($sqlHi2)){ ?>	
       <tr bgcolor="#FFFFFF" style="height:24px;">
		<td align="center" class="data"><?php echo $Sno2; ?></td>
		<td align="center" class="data"><?php echo date("d-m-Y",strtotime($resHi2['SalaryChange_Date'])); ?></td><font color=""></font>
		<td align="" class="data"><?php echo ucwords(strtolower($resHi2['Proposed_Designation'])); ?></td>
		<td align="center" class="data"><?php echo $resHi2['Proposed_Grade']; ?></td>
		<?php /*?><td align="right" class="data" style="width:100px;"><?php echo $resHi2['TotalProp_GSPM']; ?>&nbsp;</td>
		<td align="center" class="data" style="width:100px;"><?php echo $resHi2['TotalProp_PerInc_GSPM']; ?></td><?php */?>	
	   </tr>   	
<?php $Sno2++; } $Sno=$Sno2; ?>	     	   
<?php //$sqlHi=mysql_query("select SalaryChange_Date, Current_Designation, Current_Grade, Previous_GrossSalaryPM, Prop_PeInc_GSPM from hrm_pms_appraisal_history where EmpCode=".$resE['EmpCode']." AND CompanyId=".$resE['CompanyId']." AND SalaryChange_Date<'".date('2012-01-01')."' order by SalaryChange_Date DESC", $con);
$sqlHi=mysql_query("select SalaryChange_Date, Current_Designation, Current_Grade, Previous_GrossSalaryPM, Prop_PeInc_GSPM from hrm_pms_appraisal_history where EmpCode=".$resE['EmpCode']." AND CompanyId=".$resE['CompanyId']." AND SalaryChange_Date<'".date('2012-01-01')."' AND Current_Grade!='' group by Current_Grade order by SalaryChange_Date DESC", $con); 
       while($resHi=mysql_fetch_array($sqlHi)){ ?>	
       <tr bgcolor="#FFFFFF" style="height:24px;">
		<td align="center" class="data"><?php echo $Sno; ?></td>
		<td align="center" class="data"><?php echo date("d-m-Y",strtotime($resHi['SalaryChange_Date'])); ?></td>
		<td align="" class="data"><?php echo ucwords(strtolower($resHi['Current_Designation'])); ?></td>
		<td align="center" class="data"><?php echo $resHi['Current_Grade']; ?></td>
		<?php /*?><td align="right" class="data" style="width:100px;"><?php echo $resHi['Previous_GrossSalaryPM']; ?>&nbsp;</td>
		<td align="center" class="data" style="width:100px;"><?php echo $resHi['Prop_PeInc_GSPM']; ?></td><?php */?>	
	   </tr>   	
<?php $Sno++; } ?>	 
	  </table>
	</td>
  </tr>

</table>
</center>  
</body>
</html>
