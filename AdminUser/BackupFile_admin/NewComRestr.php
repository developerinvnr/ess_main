<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}

if(isset($_POST['DataSave']) AND ($CompanyId==3 OR $CompanyId==2))
{
 for($i=1; $i<=$_POST['RowNo']; $i++)
 { 
  $sqlU=mysql_query("update hrm_restructuring set New_DepartmentId=".$_POST['NewDept_'.$i].", New_GradeId=".$_POST['NewGrade_'.$i].", New_DesigId=".$_POST['NewDesig_'.$i].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where Year=".$_POST['Year']." AND EmployeeID=".$_POST['EmpId_'.$i], $con);
  
  $sql=mysql_query("select hrm_restructuring.*,EmpCode from hrm_restructuring INNER JOIN hrm_employee ON hrm_restructuring.EmployeeID=hrm_employee.EmployeeID where hrm_restructuring.Year=".$_POST['Year']." AND hrm_restructuring.EmployeeID=".$_POST['EmpId_'.$i], $con); $res=mysql_fetch_assoc($sql);
  
  $sqlDeptC = mysql_query("select DepartmentName from hrm_department where DepartmentId=".$res['Current_DepartmentId'], $con); $resDeptC=mysql_fetch_assoc($sqlDeptC);
  $sqlDeC=mysql_query("select DesigName from hrm_designation where DesigId=".$res['Current_DesigId'], $con); $resDeC=mysql_fetch_assoc($sqlDeC);
  $sqlGrC=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Current_GradeId']." AND CompanyId=".$CompanyId, $con); $resGrC=mysql_fetch_assoc($sqlGrC);
  $sqlDeptN = mysql_query("select DepartmentName from hrm_department where DepartmentId=".$res['New_DepartmentId'], $con); $resDeptN=mysql_fetch_assoc($sqlDeptN);
  $sqlDeN=mysql_query("select DesigName from hrm_designation where DesigId=".$res['New_DesigId'], $con); $resDeN=mysql_fetch_assoc($sqlDeN);
  $sqlGrN=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['New_GradeId']." AND CompanyId=".$CompanyId, $con); $resGrN=mysql_fetch_assoc($sqlGrN);

  $sqlHC = mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChD FROM hrm_pms_appraisal_history where EmpCode=".$res['EmpCode']." AND CompanyId=".$CompanyId, $con); 
  $resHC = mysql_fetch_assoc($sqlHC); 
  $sqlMax = mysql_query("SELECT * FROM hrm_pms_appraisal_history where SalaryChange_Date='".$resHC['SalaryChD']."' AND EmpCode=".$res['EmpCode']." AND CompanyId=".$CompanyId, $con);
  $resMax = mysql_fetch_assoc($sqlMax);
  
  $sqlHis=mysql_query("select * from hrm_pms_appraisal_history where EmpCode=".$res['EmpCode']." AND SalaryChange_Date='2014-10-01' AND CompanyId=".$CompanyId, $con); 
  $rowHis=mysql_num_rows($sqlHis); 
  if($rowHis>0)
    { 
    $sqlUpIns=mysql_query("update hrm_pms_appraisal_history set Current_Grade='".$resGrC['GradeValue']."', Proposed_Grade='".$resGrN['GradeValue']."', Department='".$resDeptN['DepartmentName']."', Current_Designation='".$resDeC['DesigName']."', Proposed_Designation='".$resDeN['DesigName']."' where EmpCode=".$res['EmpCode']." AND SalaryChange_Date='2014-10-01' AND CompanyId=".$CompanyId, $con); 
    }
   if($rowHis==0)
    { 
    $sqlUpIns=mysql_query("insert into hrm_pms_appraisal_history(EmpPmsId, EmpCode, EmpName, Current_Grade, Proposed_Grade, Department, Current_Designation, Proposed_Designation, SalaryChange_Date, Salary_Basic, Salary_HRA, Salary_CA, Salary_SA, Previous_GrossSalaryPM, Current_GrossSalaryPM, Proposed_GrossSalaryPM, BonusAnnual_September, Prop_PeInc_GSPM, PropSalary_Correction, TotalProp_GSPM, TotalProp_PerInc_GSPM, Score, Rating, CompanyId, YearId) values(0, ".$res['EmpCode'].", '".$resMax['EmpName']."', '".$resGrC['GradeValue']."', '".$resGrN['GradeValue']."', '".$resDeptN['DepartmentName']."', '".$resDeC['DesigName']."', '".$resDeN['DesigName']."', '2014-10-01', '".$resMax['Salary_Basic']."', '".$resMax['Salary_HRA']."', '".$resMax['Salary_CA']."', '".$resMax['Salary_SA']."', '".$resMax['Previous_GrossSalaryPM']."', '".$resMax['Current_GrossSalaryPM']."', 0, '".$resMax['BonusAnnual_September']."', 0, 0, '".$resMax['TotalProp_GSPM']."', 0, 0, 0, ".$CompanyId.", ".$YearId.")", $con);
    }
     if($sqlUpIns)
	 {
	 //$SqlUpGen = mysql_query("UPDATE hrm_employee_general2 SET DepartmentId=".$res['New_DepartmentId'].", DesigId=".$res['New_DesigId'].", GradeId=".$res['New_GradeId'].", CreatedBy=".$UserId.", CreatedDate='2014-10-01', YearId=".$YearId." WHERE EmployeeID=".$res['EmployeeID'], $con);
	 $SqlUpGen = mysql_query("UPDATE hrm_employee_general SET DepartmentId=".$res['New_DepartmentId'].", DesigId=".$res['New_DesigId'].", GradeId=".$res['New_GradeId'].", CreatedBy=".$UserId.", CreatedDate='2014-10-01', YearId=".$YearId." WHERE EmployeeID=".$res['EmployeeID'], $con);
	 }
  
 }
 if($sqlU){echo '<script>alert("Data Save Successfully..");</script>';}
}



if(isset($_POST['DataSave']) AND $CompanyId==1)
{
 for($i=1; $i<=$_POST['RowNo']; $i++)
 { 
  $sqlU=mysql_query("update hrm_restructuring set New_DepartmentId=".$_POST['NewDept_'.$i].", New_GradeId=".$_POST['NewGrade_'.$i].", New_DesigId=".$_POST['NewDesig_'.$i].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where Year=".$_POST['Year']." AND EmployeeID=".$_POST['EmpId_'.$i], $con);
  
  $sql=mysql_query("select hrm_restructuring.*,EmpCode from hrm_restructuring INNER JOIN hrm_employee ON hrm_restructuring.EmployeeID=hrm_employee.EmployeeID where hrm_restructuring.Year=".$_POST['Year']." AND hrm_restructuring.EmployeeID=".$_POST['EmpId_'.$i], $con); $res=mysql_fetch_assoc($sql);
  
  $sqlDeptC = mysql_query("select DepartmentName from hrm_department where DepartmentId=".$res['Current_DepartmentId'], $con); $resDeptC=mysql_fetch_assoc($sqlDeptC);
  $sqlDeC=mysql_query("select DesigName from hrm_designation where DesigId=".$res['Current_DesigId'], $con); $resDeC=mysql_fetch_assoc($sqlDeC);
  $sqlGrC=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Current_GradeId']." AND CompanyId=".$CompanyId, $con); $resGrC=mysql_fetch_assoc($sqlGrC);
  $sqlDeptN = mysql_query("select DepartmentName from hrm_department where DepartmentId=".$res['New_DepartmentId'], $con); $resDeptN=mysql_fetch_assoc($sqlDeptN);
  $sqlDeN=mysql_query("select DesigName from hrm_designation where DesigId=".$res['New_DesigId'], $con); $resDeN=mysql_fetch_assoc($sqlDeN);
  $sqlGrN=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['New_GradeId']." AND CompanyId=".$CompanyId, $con); $resGrN=mysql_fetch_assoc($sqlGrN);

  $sqlHC = mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChD FROM hrm_pms_appraisal_history where EmpCode=".$res['EmpCode']." AND CompanyId=".$CompanyId, $con); 
  $resHC = mysql_fetch_assoc($sqlHC); 
  $sqlMax = mysql_query("SELECT * FROM hrm_pms_appraisal_history where SalaryChange_Date='".$resHC['SalaryChD']."' AND EmpCode=".$res['EmpCode']." AND CompanyId=".$CompanyId, $con);
  $resMax = mysql_fetch_assoc($sqlMax);
  
  $sqlHis=mysql_query("select * from hrm_pms_appraisal_history where EmpCode=".$res['EmpCode']." AND SalaryChange_Date='2014-01-31' AND CompanyId=".$CompanyId, $con); 
  $rowHis=mysql_num_rows($sqlHis); 
  if($rowHis>0)
    { 
    $sqlUpIns=mysql_query("update hrm_pms_appraisal_history set Current_Grade='".$resGrC['GradeValue']."', Proposed_Grade='".$resGrN['GradeValue']."', Department='".$resDeptN['DepartmentName']."', Current_Designation='".$resDeC['DesigName']."', Proposed_Designation='".$resDeN['DesigName']."' where EmpCode=".$res['EmpCode']." AND SalaryChange_Date='2014-01-31' AND CompanyId=".$CompanyId, $con); 
    }
   if($rowHis==0)
    { 
    $sqlUpIns=mysql_query("insert into hrm_pms_appraisal_history(EmpPmsId, EmpCode, EmpName, Current_Grade, Proposed_Grade, Department, Current_Designation, Proposed_Designation, SalaryChange_Date, Salary_Basic, Salary_HRA, Salary_CA, Salary_SA, Previous_GrossSalaryPM, Current_GrossSalaryPM, Proposed_GrossSalaryPM, BonusAnnual_September, Prop_PeInc_GSPM, PropSalary_Correction, TotalProp_GSPM, TotalProp_PerInc_GSPM, Score, Rating, CompanyId, YearId) values(0, ".$res['EmpCode'].", '".$resMax['EmpName']."', '".$resGrC['GradeValue']."', '".$resGrN['GradeValue']."', '".$resDeptN['DepartmentName']."', '".$resDeC['DesigName']."', '".$resDeN['DesigName']."', '2014-01-31', '".$resMax['Salary_Basic']."', '".$resMax['Salary_HRA']."', '".$resMax['Salary_CA']."', '".$resMax['Salary_SA']."', '".$resMax['Previous_GrossSalaryPM']."', '".$resMax['Current_GrossSalaryPM']."', 0, '".$resMax['BonusAnnual_September']."', 0, 0, '".$resMax['TotalProp_GSPM']."', 0, 0, 0, ".$CompanyId.", ".$YearId.")", $con);
    }
     if($sqlUpIns)
	 {
	 $SqlUpGen = mysql_query("UPDATE hrm_employee_general2 SET DepartmentId=".$res['New_DepartmentId'].", DesigId=".$res['New_DesigId'].", GradeId=".$res['New_GradeId'].", CreatedBy=".$UserId.", CreatedDate='2014-01-31', YearId=".$YearId." WHERE EmployeeID=".$res['EmployeeID'], $con);
	 $SqlUpGen = mysql_query("UPDATE hrm_employee_general SET DepartmentId=".$res['New_DepartmentId'].", DesigId=".$res['New_DesigId'].", GradeId=".$res['New_GradeId'].", CreatedBy=".$UserId.", CreatedDate='2014-01-31', YearId=".$YearId." WHERE EmployeeID=".$res['EmployeeID'], $con);
	 }
  
 }
 if($sqlU){echo '<script>alert("Data Save Successfully..");</script>';}
}


?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.cell {color:#FFFFFF;font-family:Times New Roman;font-size:14px;font-weight:bold;} 
.cell2 {color:#000;font-family:Times New Roman;font-size:14px;} .cell3 {color:#030303;font-family:Times New Roman;font-size:14px; font-weight:bold;} 
.cellOpe {color:#FFFFFF;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe2 {color:#000;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe3 {color:#000;font-family:Times New Roman; width:30px;height:20px; font-size:14px; font-weight:bold;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/MasterAjaxCall.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script type="text/javascript" src=""></script>
<script type="text/javascript" language="javascript">
function SelectYear(value,m) 
{ var d = document.getElementById("Department").value;  var x = 'NewComRestr.php?d='+d+'&y='+value; window.location=x;}													
								  
function SelectMonthDept(value)
{ var y = document.getElementById("Year").value;  var x = 'NewComRestr.php?d='+value+'&y='+y; window.location=x; }
    
function SelDept(value,sn) { 
   document.getElementById('Sn').value=sn;
   var url = 'DeptDesigSelect.php';	var pars = 'Act=Seldept&did='+value+'&Sn='+sn;
   var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars,
		onComplete: show_NewDeptSelect
		 
	});
} 
function show_NewDeptSelect(originalRequest)
{ var Sn=document.getElementById('Sn').value; document.getElementById('DesigSpan_'+Sn).innerHTML = originalRequest.responseText; }

function ExportReStucture(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YearId").value; var DeptValue=document.getElementById("DeptValue").value;  
  window.open("ReportCSVReSturcture.php?action=EligExport&value="+v+"&C="+ComId+"&Y="+YId+"&value="+DeptValue,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}  
  
</script>   
</head>
<body class="body">
<table class="table" border="0">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top" align="left"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<form name="formname" method="post" />
<?php if($_REQUEST['m']==1){$SelM='January';} if($_REQUEST['m']==2){$SelM='February';} if($_REQUEST['m']==3){$SelM='March';}if($_REQUEST['m']==4){$SelM='April';} 
if($_REQUEST['m']==5){$SelM='May';} if($_REQUEST['m']==6){$SelM='June';} if($_REQUEST['m']==7){$SelM='July';} if($_REQUEST['m']==8){$SelM='August';} 
if($_REQUEST['m']==9){$SelM='September';} if($_REQUEST['m']==10){$SelM='October';} if($_REQUEST['m']==11){$SelM='November';} if($_REQUEST['m']==12){$SelM='December';} ?> 	  
<table border="0" style="margin-top:0px; width:100%; height:350px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td style="width:250px;" align="right">&nbsp;<font color="#2D002D" style='font-family:Times New Roman;' size="4">
	  <b>Company Restucturing : Year :</b></font></td>
	  <td style="width:70px;"><select style="font-size:12px; width:60px; height:20px; background-color:#DDFFBB;" name="Year" id="Year" onChange="SelectYear(this.value)">
	  <option value="<?php echo $_REQUEST['y']; ?>"><?php echo $_REQUEST['y']; ?></option>
	  <option value="2014">2014</option><option value="2013">2013</option></select></td> 
	   <td class="td1" style="font-size:11px; width:150px;">			   
	   <select style="font-size:11px; width:120px; height:19px; background-color:#DDFFBB; display:block;" name="Department" id="Department" onChange="SelectMonthDept(this.value)">
<?php if($_REQUEST['d']!='All') { $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['d'], $con); $resD=mysql_fetch_assoc($sqlD); ?> 
	  <option value="<?php echo $_REQUEST['d']; ?>" style="margin-left:0px; background-color:#84D9D5;">&nbsp;<?php echo $resD['DepartmentCode']; ?></option>  
<?php  } else { ?>	  <option value="All" style="margin-left:0px; background-color:#84D9D5;">&nbsp;All</option><?php } ?>						   
	   <?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?><option value="All">&nbsp;All</option></select>
	   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
	   <input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
	   <input type="hidden" name="Sn" id="Sn" value="" />
	   <input type="hidden" name="DeptValue" id="DeptValue" value="<?php echo $_REQUEST['d']; ?>" />
	  </td>	 
	  <td><a href="#" onClick="ExportReStucture('<?php echo $_REQUEST['d']; ?>')" style="font-size:12px;"><b>Export Excel</b></a></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
  <td valign="top">
   <table border="1" valign="top" style="width:1300px;">
   <tr bgcolor="#7a6189">
	<td colspan="3" align="center" style="color:#FFFFFF;font-family:Times New Roman;font-size:14px;"><b>&nbsp;</b></td>
	<td colspan="3" align="center" style="color:#FFFFFF;font-family:Times New Roman;font-size:14px;"><b>CURRENT</b></td>
	<td colspan="3" align="center" style="color:#FFFFFF;font-family:Times New Roman;font-size:14px;"><b>NEW</b></td>
	<td colspan="2" align="center" style="color:#FFFFFF;font-family:Times New Roman;font-size:14px;"><b>STR. LETTER</b></td>
	<td colspan="2" align="center" style="color:#FFFFFF;font-family:Times New Roman;font-size:14px;"><b>ANNEXURE A</b></td>
 </tr>
 <tr bgcolor="#7a6189">
	<td align="center" style="color:#FFFFFF;" class="All_30"><b>SN</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>EC</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>Department</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_250"><b>Designation</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Grade</b></td>
	<td align="center" style="color:#FFFFFF;background-color:#0080FF;" class="All_100"><b>Department</b></td>
	<td align="center" style="color:#FFFFFF;background-color:#0080FF;" class="All_250"><b>Designation</b></td>
	<td align="center" style="color:#FFFFFF;background-color:#0080FF;" class="All_50"><b>Grade</b></td>
	<td colspan="2" align="center" style="color:#FFFFFF;background-color:#0080FF;" class="All_100"><b>&nbsp;</b></td>
	<td colspan="2" align="center" style="color:#FFFFFF;background-color:#0080FF;" class="All_100"><b>&nbsp;</b></td>
 </tr>
<?php if($_REQUEST['d']!='All'){ $sqlDP = mysql_query("SELECT hrm_restructuring.*,EmpCode,Fname,Sname,Lname,Gender,Married,DR FROM hrm_restructuring INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_restructuring.EmployeeID INNER JOIN hrm_employee_personal ON hrm_restructuring.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_restructuring.Current_DepartmentId=".$_REQUEST['d']." order by hrm_restructuring.EmployeeID ASC", $con); }
      if($_REQUEST['d']=='All'){ $sqlDP=mysql_query("select hrm_restructuring.*,EmpCode,Fname,Sname,Lname,Gender,Married,DR from hrm_restructuring INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_restructuring.EmployeeID INNER JOIN hrm_employee_personal ON hrm_restructuring.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by hrm_restructuring.EmployeeID ASC", $con); }
$Sno=1;  while($resDP = mysql_fetch_assoc($sqlDP)){ 

	  if($resDP['DR']=='Y'){$MS='Dr.';} elseif($resDP['Gender']=='M'){$MS='Mr.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='Y'){$MS='Mrs.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='N'){$MS='Miss.';}  $Name=$MS.' '.$resDP['Fname'].' '.$resDP['Sname'].' '.$resDP['Lname'];
	  $LEC=strlen($resDP['EmpCode']); 
      if($LEC==1){$EC='000'.$resDP['EmpCode'];} if($LEC==2){$EC='00'.$resDP['EmpCode'];} if($LEC==3){$EC='0'.$resDP['EmpCode'];} if($LEC>=4){$EC=$resDP['EmpCode'];}
	  $E=$resDP['EmployeeID']; $C=$CompanyId; $YI=$YearId; $U=$UserId; $M=$_REQUEST['m']; $Y=$_REQUEST['y'];
	  
?> 	 
 <tr bgcolor="<?php if($Sno%2){ echo '#FFFFFF'; } else {echo '#FFFFFF';} //#D9D1E7 ?>"> 
		<td align="center" style="" class="All_30"><?php echo $Sno; ?><input type="hidden" name="EmpId_<?php echo $Sno; ?>" value="<?php echo $resDP['EmployeeID']; ?>" /> </td>
		<td align="center" style="" class="All_50"><?php echo $EC; ?></td>
		<td style="" class="All_250">&nbsp;<?php echo $Name; ?></td>
<?php $sqlDept = mysql_query("SELECT DepartmentCode FROM hrm_department WHERE DepartmentId=".$resDP['Current_DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); ?>		
		<td style="width:100px;font-family:Times New Roman;font-size:13px;">&nbsp;<?php echo strtoupper($resDept['DepartmentCode']);?></td>
<?php $sqlDesig = mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$resDP['Current_DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig); ?>		
		<td style="width:100px;font-family:Times New Roman;font-size:13px;">&nbsp;<?php echo strtoupper($resDesig['DesigName']);?></td>
<?php $sqlGrade = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$resDP['Current_GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade); ?>		
		<td align="center" class="All_50">&nbsp;<?php echo $resGrade['GradeValue'];?></td>
<?php $sqlDept2 = mysql_query("SELECT DepartmentCode FROM hrm_department WHERE DepartmentId=".$resDP['New_DepartmentId'], $con); $resDept2=mysql_fetch_assoc($sqlDept2); ?>		
		<td class="All_100" align="center">
		<select name="NewDept_<?php echo $Sno; ?>" id="NewDept_<?php echo $Sno; ?>" onChange="SelDept(this.value,<?php echo $Sno; ?>)" style="width:100px;font-family:Times New Roman;background-color:#FFE6FF;">
		<option value="<?php if($resDP['New_DepartmentId']!='' AND $resDP['New_DepartmentId']!=0){echo $resDP['New_DepartmentId'];}else{echo 0;}?>"><?php if($resDP['New_DepartmentId']!='' AND $resDP['New_DepartmentId']!=0){echo strtoupper($resDept2['DepartmentCode']);}else{echo 'select';}?></option>
<?php $SqlDept=mysql_query("select DepartmentId,DepartmentCode from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); 
      while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo strtoupper($ResDept['DepartmentCode']); ?></option><?php } ?>
		</select> 
		</td>
<?php $sqlDesig2 = mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$resDP['New_DesigId'], $con); $resDesig2=mysql_fetch_assoc($sqlDesig2); ?>		
		<td class="All_250"><span id="DesigSpan_<?php echo $Sno; ?>">
		<select name="NewDesig_<?php echo $Sno; ?>" id="NewDesig_<?php echo $Sno; ?>" onChange="SelDesig(this.value,<?php echo $Sno; ?>)" style="width:248px;font-family:Times New Roman;background-color:#FFE6FF;">
		<option value="<?php if($resDP['New_DesigId']!='' AND $resDP['New_DesigId']!=0){echo $resDP['New_DesigId'];}else{echo 0;}?>"><?php if($resDP['New_DesigId']!='' AND $resDP['New_DesigId']!=0){echo strtoupper($resDesig2['DesigName']);}else{echo 'select';}?></option>
<?php $sql = mysql_query("select DesigId from hrm_deptgradedesig WHERE DGDStatus='A' AND DepartmentId=".$resDP['New_DepartmentId']." GROUP BY DesigId", $con); 
      while($res = mysql_fetch_array($sql))
	   { $sql1 = mysql_query("select DesigName from hrm_designation WHERE DesigId=".$res['DesigId'], $con) or die(mysql_error()); 
	     $res1 = mysql_fetch_array($sql1);?>
	  <option value="<?php echo $res['DesigId']; ?>"><?php echo strtoupper($res1['DesigName']); ?></option><?php } ?>
		</select></span> 
		</td>
<?php $sqlGrade2 = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$resDP['New_GradeId'], $con); $resGrade2=mysql_fetch_assoc($sqlGrade2); ?>		
		<td class="All_50"><span id="GradeSpan_<?php echo $Sno; ?>">
		<select name="NewGrade_<?php echo $Sno; ?>" id="NewGrade_<?php echo $Sno; ?>" style="width:48px;font-family:Times New Roman;background-color:#FFE6FF;">
		<option value="<?php if($resDP['New_GradeId']!='' AND $resDP['New_GradeId']!=0){echo $resDP['New_GradeId'];}else{echo 0;}?>"><?php if($resDP['New_GradeId']!='' AND $resDP['New_GradeId']!=0){echo strtoupper($resGrade2['GradeValue']);}else{echo '';}?></option>
<?php if($CompanyId==1){$sqlGrade3 = mysql_query("SELECT GradeId,GradeValue FROM hrm_grade WHERE CompanyId=".$CompanyId." AND CreatedDate>='2014-02-01' order by GradeId ASC", $con);}elseif($CompanyId==3 OR $CompanyId==2){$sqlGrade3 = mysql_query("SELECT GradeId,GradeValue FROM hrm_grade WHERE CompanyId=".$CompanyId." order by GradeId ASC", $con);} 
	  while($resGrade3=mysql_fetch_assoc($sqlGrade3)){ ?>	
	    <option value="<?php echo $resGrade3['GradeId'];?>"><?php echo $resGrade3['GradeValue'];?></option>		
	  <?php } ?>		
	    </select></span> 
		</td>
<script>
function LetterClickView(EI,CI)
{window.open("VeiwReStrLetter.php?action=ReStrLetter&e="+EI+"&c="+CI,"REStr","scrollbars=yes,resizable=no,width=820,height=750,menubar=no,location=no,directories=no");}
function AnnxAClickView(EI,CI)
{window.open("VeiwReStrAnnxA.php?action=ReStrAnnxA&e="+EI+"&c="+CI,"REStr","scrollbars=yes,resizable=no,width=820,height=750,menubar=no,location=no,directories=no");}

//function LetterClickPrint(EI,CI)
//{window.open("VeiwReStrLetterPrint.php?action=ReStrLetter&e="+EI+"&c="+CI,"REStr","scrollbars=yes,resizable=no,width=820,height=750,menubar=no,location=no,directories=no");}
//function AnnxAClickPrint(EI,CI)
//{window.open("VeiwReStrAnnxAPrint.php?action=ReStrAnnxA&e="+EI+"&c="+CI,"REStr","scrollbars=yes,resizable=no,width=820,height=750,menubar=no,location=no,directories=no");}
</script>		
        <td colspan="2" style="width:50px;font-weight:bold;font-family:Times New Roman; font-size:15px;" align="center">
		<a href="#" onClick="LetterClickView(<?php echo $resDP['EmployeeID'].', '.$CompanyId; ?>)"><font color="#005100">View/Print</font></a></td> 
		<td colspan="2" style="width:50px;font-weight:bold;font-family:Times New Roman; font-size:15px;" align="center">
		<a href="#" onClick="AnnxAClickView(<?php echo $resDP['EmployeeID'].', '.$CompanyId; ?>)"><font color="#005100">View/Print</font></a></td>
</tr>
<?php $Sno++; } $sn=$Sno-1; echo '<input type="hidden" name="RowNo" id="RowNo" value="'.$sn.'" />'; ?>
<?php ?>
<tr>
  <td align="left" class="fontButton" style="width:100%;" colspan="<?php if($_REQUEST['m']==1 OR $_REQUEST['m']==10){echo '19';} else{echo '18';}?>">
    <table border="0">
     <tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>
	  <td align="left"><input type="button" name="back" id="back" style="width:90px;display:block;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"></td>
	  <td align="left"><input type="submit" name="DataSave" style="width:90px;display:block;" value="save"></td>
<?php } ?>
   </tr>
   </table>
  </td>
 </tr>
<?php } ?> 
</table>
</form>		
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
		
	  </td>
	</tr>
	
	<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>