<?php session_start(); 
require_once('config/config.php');
//**********************************
if($_REQUEST['action']=='approve' AND $_REQUEST['action']!='') 
{ $PmsId=$_REQUEST['P']; $EmpId=$_REQUEST['E']; $YearId=$_REQUEST['Y']; $ComId=$_REQUEST['C']; $UId=$_REQUEST['U']; }

$sqlSet=mysql_query("select EffectedDate2,AllowEmpDoj,Arrear_NOM from hrm_pms_setting where CompanyId=".$ComId." AND Process='PMS'", $con); $resSet=mysql_fetch_array($sqlSet); 
$EffDate=$resSet['EffectedDate2'];

/////////////////////////////////////////////////////////////
if(isset($_POST['SaveEdit'])) 
{
 $sqlD2 = mysql_query("select DepartmentCode,DepartmentName from hrm_department where DepartmentId=".$_POST['DeptName'], $con); $resD2=mysql_fetch_assoc($sqlD2);
 $sql=mysql_query("select * from hrm_pms_appraisal_history where EmpCode=".$_POST['EmpCode']." AND SalaryChange_Date='".date("Y-m-d",strtotime($_POST['CHDate']))."' AND CompanyId=".$_POST['ComId'], $con); $row=mysql_num_rows($sql); 
  if($row>0) { $sqlU=mysql_query("update hrm_pms_appraisal_history set Department='".$resD2['DepartmentName']."' where EmpCode=".$_POST['EmpCode']." AND SalaryChange_Date='".date("Y-m-d",strtotime($_POST['CHDate']))."' AND CompanyId=".$_POST['ComId'], $con); }
 
 $sqlP=mysql_query("select * from hrm_employee_pms where EmpPmsId=".$_POST['PmsId']." AND EmployeeID=".$_POST['EmpId'], $con); $rowP=mysql_num_rows($sqlP); 
 if($rowP>0) { $sqlUp=mysql_query("update hrm_employee_pms set HR_Curr_DepartmentId=".$_POST['EmpCurrDept'].", HR_DepartmentId=".$_POST['DeptName']." where EmpPmsId=".$_POST['PmsId']." AND EmployeeID=".$_POST['EmpId'], $con); }
 
 $sqlG = mysql_query("select * from hrm_employee_general where EmployeeID=".$_POST['EmpId'], $con); $resG=mysql_fetch_assoc($sqlG);
 $sqlIns=mysql_query("Insert into hrm_employee_general_event(GeneralId, EmployeeID, FileNo, DateJoining, DateConfirmationYN, DateConfirmation, DOB, DOB_dm, GradeId, CostCenter, HqId, DepartmentId, DesigId, DesigId2, MobileNo_Vnr, EmailId_Vnr, BankName, AccountNo, BranchName, BranchAdd, BankName2, AccountNo2, BranchName2, BranchAdd2, InsuCardNo, PfAccountNo, EsicAllow, EsicNo, ReportingName, ReportingDesigId, ReportingEmailId, ReportingContactNo, CreatedBy, CreatedDate, YearId)values(".$resG['GeneralId'].", ".$resG['EmployeeID'].", ".$resG['FileNo'].", '".$resG['DateJoining']."', '".$resG['DateConfirmationYN']."', '".$resG['DateConfirmation']."', '".$resG['DOB']."', '".$resG['DOB_dm']."', ".$resG['GradeId'].", '".$resG['CostCenter']."', ".$resG['HqId'].", ".$resG['DepartmentId'].", ".$resG['DesigId'].", ".$resG['DesigId2'].", ".$resG['MobileNo_Vnr'].", '".$resG['EmailId_Vnr']."', '".$resG['BankName']."', ".$resG['AccountNo'].", '".$resG['BranchName']."', '".$resG['BranchAdd']."', '".$resG['BankName2']."', ".$resG['AccountNo2'].", '".$resG['BranchName2']."', '".$resG['BranchAdd2']."', '".$resG['InsuCardNo']."', '".$resG['PfAccountNo']."', '".$resG['EsicAllow']."', ".$resG['EsicNo'].", '".$resG['ReportingName']."', ".$resG['ReportingDesigId'].", '".$resG['ReportingEmailId']."', ".$resG['ReportingContactNo'].", ".$resG['CreatedBy'].", '".$resG['CreatedDate']."', ".$resG['YearId'].")", $con);
 if($sqlIns)
 {
   $SqlUpGen1 = mysql_query("UPDATE hrm_employee_general SET GradeId=".$_POST['GradeName'].", DepartmentId=".$_POST['DeptName'].", DesigId=".$_POST['DesigName'].", CreatedBy=".$_POST['UId'].", CreatedDate='".date("Y-m-d",strtotime($_POST['CHDate']))."', YearId=".$_POST['YId']." WHERE EmployeeID=".$_POST['EmpId'], $con);
 }
 
 if($SqlUpGen1){$msg="data updated successfully..";}
  
   
 
}
?> 
<html>
<head>
<title><?php include_once('../Title.php'); ?>-Update Department</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:120px;} .font1 { font-family:"Times New Roman", Times, serif; font-size:11px; width:120px; } 
.font2 { font-size:11px;width:260px;height:18px;} .font4 {color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#CCFFCC; border-color:#FFFFFF; border-bottom:inherit;}
.TextInput { font-family:"Times New Roman", Times, serif; font-size:11px; width:100px; height:18px;}
</style>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/EmpMasterAddNewAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script type="text/javascript" language="javascript">
function edit(value) 
{ var agree=confirm("Are you sure you want to edit this record?");
  if(agree) 
  { document.getElementById("btnEdit").style.display='none';  
    document.getElementById("DeptName").disabled=false;
  }
}

function DeptSelect(value) {  
   var url = 'DeptDesigSelect.php';	var pars = 'Deptid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewDeptSelect
	});
} 
function show_NewDeptSelect(originalRequest)
{ document.getElementById('DesigSpan').innerHTML = originalRequest.responseText; }

function SelectDisig()
{document.getElementById("GradeName").disabled=false; document.getElementById("btnSave").style.display='block';}
</script>

</head>
<body class="body">
<center>
<?php $SqlP=mysql_query("select Appraiser_EmployeeID, Reviewer_EmployeeID, Hod_EmployeeID from hrm_employee_pms where AssessmentYear=".$YearId." AND EmployeeID=".$EmpId." AND EmpPmsId=".$PmsId, $con); $ResP=mysql_fetch_assoc($SqlP); 
$sql = mysql_query("SELECT hrm_employee.*, DepartmentId, GradeId, DesigId FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee.CompanyId=".$ComId." AND hrm_employee.EmployeeID=".$EmpId, $con) or die(mysql_error());  $res=mysql_fetch_assoc($sql); 
$Ename = $res['Fname'].' '.$res['Sname'].' '.$res['Lname'];
$sqlDept = mysql_query("select DepartmentCode,DepartmentName from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlDe=mysql_query("select DesigName,DesigId from hrm_designation where DesigId=".$res['DesigId'], $con); $resDe=mysql_fetch_assoc($sqlDe);
$sqlGr=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId']." AND CompanyId=".$ComId, $con); $resGr=mysql_fetch_assoc($sqlGr);
?>   
<form name="formE" method="post" onSubmit="return validate(this)">
<table class="table">
<tr>
<td valign="top">
<input type="hidden" id="EmpId" name="EmpId" value="<?php echo $EmpId; ?>" /> <input type="hidden" id="PmsId" name="PmsId" value="<?php echo $PmsId; ?>" />
<input type="hidden" id="YId" name="YId" value="<?php echo $YearId; ?>" /> <input type="hidden" id="UId" name="UId" value="<?php echo $UId; ?>" />
<input type="hidden" name="ComId" id="ComId" value="<?php echo $ComId; ?>" /><input type="hidden" id="EmpCurrDesigId" name="EmpCurrDesigId" value="<?php echo $res['DesigId']; ?>" />
<input type="hidden" id="EmpCurrGradeId" value="<?php echo $res['GradeId']; ?>" /><input type="hidden" id="EmpCurrDept" name="EmpCurrDept" value="<?php echo $res['DepartmentId']; ?>" />
<input type="hidden" id="EmpCode" name="EmpCode" value="<?php echo $res['EmpCode']; ?>" />
  <table width="650" style="margin-top:0px;" border="0">
	    <tr>
		 <td>
		  <table>
		    <tr>	
 <td valign="top">
   <table border="0">
     <tr>
	   <td style="font-family:Times New Roman; font-size:14px; font-weight:bold; width:100%;" align=""><font color="#6A3500">EmpCode :</font> 
       <?php echo $res['EmpCode']; ?>,&nbsp;&nbsp;&nbsp;&nbsp;<font color="#6A3500">Name : </font>
       <?php echo $Ename; ?>,&nbsp;&nbsp;&nbsp;&nbsp;<font color="#6A3500">Department : </font>
	   <?php echo $resDept['DepartmentName']; ?>
	   </td>
	 </tr>
   </table>
 </td>
   </tr>
  </table>	
 </td>
</tr>
<tr>
<td>
 <table border="1">
  <tr bgcolor="#7a6189">
 <td style="width:100px; color:#FFFFFF; font-family:Times New Roman; font-size:12px;" align="center">&nbsp;</td>
 <td style="width:150px; color:#FFFFFF; font-family:Times New Roman; font-size:12px;" align="center"><b>Department</b></td>
 <td style="width:250px; color:#FFFFFF; font-family:Times New Roman; font-size:12px;" align="center"><b>Designation</b></td>
 <td style="width:50px; color:#FFFFFF; font-family:Times New Roman; font-size:12px;" align="center"><b>Grade</b></td>
 <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
 <td style="width:100px; color:#000000; font-family:Times New Roman; font-size:12px;" align="left">&nbsp;<b>Current:</b></td>
 <td style="width:150px; color:#000000; font-family:Times New Roman; font-size:12px;" align="left"><?php echo $resDept['DepartmentCode']; ?></td>
 <td style="width:250px; color:#000000; font-family:Times New Roman; font-size:12px;" align="left"><?php echo $resDe['DesigName']; ?></td>
 <td style="width:50px; color:#000000; font-family:Times New Roman; font-size:12px;" align="center"><?php echo $resGr['GradeValue']; ?></td>
 <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#CCFFCC">
 <td style="width:100px; color:#000000; font-family:Times New Roman; font-size:12px;" align="left">&nbsp;<b>Proposed:</b></td>
 <td style="width:150px; color:#000000; font-family:Times New Roman; font-size:12px;" align="left">
  <select class="All_150" name="DeptName" id="DeptName" onChange="DeptSelect(this.value)" style="text-transform:uppercase;" disabled>
  <?php $SqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $ResD=mysql_fetch_assoc($SqlD);?>
  <option value="<?php echo $ResEmp['DepartmentId']; ?>"><?php echo $ResD['DepartmentName']; ?></option>
  <?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$ComId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
  <option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo $ResDept['DepartmentCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;'.$ResDept['DepartmentName']; ?></option><?php } ?></select>
 </td>
 <td style="width:250px; color:#000000; font-family:Times New Roman; font-size:12px;" align="left">
 <span id="DesigSpan"><select class="All_250" name="DesigName" id="DesigName" style="text-transform:uppercase;" disabled>
  <?php $SqlDe=mysql_query("select DesigName from hrm_designation where DesigId=".$res['DesigId'], $con); $ResDe=mysql_fetch_assoc($SqlDe);?>
  <option value="<?php echo $ResEmp['DesigId']; ?>"><?php echo $ResDe['DesigName']; ?></option></select></span>
 </td>
 <td style="width:50px; color:#000000; font-family:Times New Roman; font-size:12px;" align="center">
 <select class="All_50" name="GradeName" id="GradeName" disabled> 
  <option value="<?php echo $res['GradeId']; ?>"><?php echo $resGr['GradeValue']; ?></option>
<?php $sql = mysql_query("select * from hrm_grade where CompanyId=".$ComId." AND GradeStatus='A' AND GradeId!=15 AND GradeId!=30 AND GradeId!=45 AND CreatedDate>='2014-02-01' order by GradeId ASC", $con) or die(mysql_error()); while($res = mysql_fetch_array($sql)){ ?>
  <option value="<?php echo $res['GradeId']; ?>"><?php echo $res['GradeValue']; ?></option><?php } ?>
 </select>
 </td>
   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:50px;">
	<a href="#"><img src="images/edit.png" border="0" alt="Edit" id="btnEdit" onClick="edit()" style="display:block; "></a>
	<input type="submit" name="SaveEdit" id="btnSave"  value="" class="SaveButton" style="display:none;">
  </td>
  </tr>
  <tr><td colspan="5" style=" background-color:#0D6FBF; color:#FFFFFF;font-family:Times New Roman;"> 
	  &nbsp;<b> Date :&nbsp;&nbsp;</b><input style=" text-align:center; width:90px; font-size:12px; font-weight:bold;height:20px;background-color:#CCFFCC;" id="CHDate" name="CHDate" value="<?php echo date("d-m-Y",strtotime($EffDate)); ?>" readonly/>&nbsp;&nbsp;<font style="font-family:Times New Roman;size:16x;color:#80FF00;"><b><?php echo $msg; ?></b></font>
   </td>
</tr>  
 </table>
</td>
</tr>
   </td>
</tr>  

	</table> 
</td>
<tr>		
<td valign="top" align="center" width="100%" id="MainWindow">

  </table>
 </td>
</tr>
</table>
</form>
</center>
</body>
</html>