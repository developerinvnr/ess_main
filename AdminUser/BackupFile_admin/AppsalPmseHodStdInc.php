<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_REQUEST['YI']==1){$Y=2012; $Y2=2013;}elseif($_REQUEST['YI']==2){$Y=2013; $Y2=2014;}elseif($_REQUEST['YI']==3){$Y=2014; $Y2=2015;}elseif($_REQUEST['YI']==4){$Y=2015; $Y2=2016;}elseif($_REQUEST['YI']==5){$Y=2016; $Y2=2017;}elseif($_REQUEST['YI']==6){$Y=2017; $Y2=2018;}elseif($_REQUEST['YI']==7){$Y=2018; $Y2=2019;}elseif($_REQUEST['YI']==8){$Y=2019; $Y2=2020;}elseif($_REQUEST['YI']==9){$Y=2020; $Y2=2021;}
if($CompanyId==1 OR $CompanyId==2 OR $CompanyId==4){$YYear=$Y;}elseif($CompanyId==3){$YYear=$Y2;}
//****************************************************************************************************************
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.th{ font-family:Times New Roman;font-size:12px;height:25px;text-align:center; background-color:#7a6189;color:#FFFFFF;font-weight:bold; }
.tdl{ font-family:Times New Roman;font-size:12px;text-align:left; }
.tdr{ font-family:Times New Roman;font-size:12px;text-align:right; }
.tdc{ font-family:Times New Roman;font-size:12px;text-align:center; }
.tdinput{ font-family:Times New Roman;font-size:14px;text-align:center;width:100%; border:hidden; }
.tdinputl{ font-family:Times New Roman;font-size:14px;text-align:left;width:100%; border:hidden; }
.tdsel{ font-family:Times New Roman;font-size:14px;text-align:left;}
.inner_table{height:500px;overflow-y:auto;width:auto;}
.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
.All_40{font-size:11px; height:20px; width:40px;} .All_50{font-size:11px; height:20px; width:50px;} .All_70{font-size:11px; height:20px; width:70px;} .All_80{font-size:11px; height:20px; width:80px;}.All_100{font-size:11px; height:20px; width:100px;} .All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} .All_60{font-size:11px; height:20px; width:60px;}
.All_150{font-size:11px; height:20px; width:150px;}.All_170{font-size:11px; height:20px; width:170px;}.All_180{font-size:11px; height:20px; width:180px;}.All_190{font-size:11px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} .All_450{font-size:11px; height:20px; width:450px;}.All_360{font-size:11px; height:20px; width:350px;}.All_540{font-size:11px; height:20px; width:540px;}.All_400{font-size:11px; height:20px; width:400px;} .All_600{font-size:11px; height:20px; width:600px;}.recCls{font-family:Georgia; font-size:12px;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<script>$(document).ready(function () { $("#table1").freezeHeader({ 'height': '500px' }); })</script>
<Script type="text/javascript" language="javascript">
function SelectYear(v){var act=document.getElementById("act").value; window.location='AppsalPmseHodStdInc.php?YI='+v+'&act='+act;}
function SelectEHodStdInc(v,yi,e)
{ if(e=='d'){var ee='Dept';}else if(e=='a'){var ee='App';}else if(e=='r'){var ee='Rev';}else if(e=='h'){var ee='Hod';} var act=document.getElementById("act").value;
  window.location='AppsalPmseHodStdInc.php?action=EmpHodStdInc&ee='+ee+'&value='+v+'&YI='+yi+'&prex=Y&act='+act;}
    
function StdIncGrade(v)
{ var YId=document.getElementById("YId").value; var StdValue=document.getElementById("StdValue").value; var ee=document.getElementById("ee").value; 
window.location='AppsalPmseHodStdInc.php?action=EmpHodStdInc&value='+StdValue+'&YI='+YId+'&act=g&gg='+v+'&ee='+ee; }
function StdIncDesig(v)
{ var YId=document.getElementById("YId").value; var StdValue=document.getElementById("StdValue").value; var ee=document.getElementById("ee").value; 
  window.location='AppsalPmseHodStdInc.php?action=EmpHodStdInc&value='+StdValue+'&YI='+YId+'&act=de&gg='+v+'&ee='+ee; }
function StdIncDept(v)
{ var YId=document.getElementById("YId").value; var StdValue=document.getElementById("StdValue").value; var ee=document.getElementById("ee").value; 
  window.location='AppsalPmseHodStdInc.php?action=EmpHodStdInc&value='+StdValue+'&YI='+YId+'&act=dept&gg='+v+'&ee='+ee; }	
	
function PrintHodStdInc(v,yi,ee)
{var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;
 window.open("PrintPMSHodStdInc.php?action=StdInc&value="+v+"&c="+ComId+"&YI="+yi+"&ee="+ee,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=50,height=50");}

function ExportHodStdInc(v,yi,ee)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;   
  window.open("ExportPmsHodStdInc.php?action=HodStdIncExport&value="+v+"&c="+ComId+"&YI="+yi+"&ee="+ee,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}
  
function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#9BEF47'; }

  else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; }
}

//    
</Script>
</head>
<body class="body" bgcolor="">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $_REQUEST['YI']; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" name="StdValue" id="StdValue" value="<?php echo $_REQUEST['value']; ?>" />
<input type="hidden" name="ee" id="ee" value="<?php echo $_REQUEST['ee']; ?>" />
<input type="hidden" name="act" id="act" value="<?php echo $_REQUEST['act']; ?>" />
<table class="table" border="0">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center" width="100%" id="MainWindow">
<?php //*****************************************************************?>
<?php //************START*****START*****START******START******START*******?>
<?php //*******************************************************************************?>
<table border="0" style="margin-top:0px;width:100%;">
	<tr>
		<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true AND ($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1)) { ?>
		<td align="" width="100%" valign="top">
		   <table border="0">
       		 <tr><td colspan="2">
			       <table border="0">
                     <tr>
					  <td colspan="12" align="left" class="heading">HOD Standard Increment &nbsp;<span id="ReturnValue">&nbsp;</span></td>
					  <td>
				    <table border="0">
                    <tr>
<?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>	     
<td class="td1" style="font-size:14px;width:120px;font-family:Times New Roman;" ><select class="tdsel" style="background-color:#DDFFBB;width:120px;" name="YearID" id="YearID" onChange="SelectYear(this.value)"><?php if($_REQUEST['YI']!=''){ $SqlY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI'], $con); $ResY=mysql_fetch_array($SqlY); ?><option value="<?php echo $ResY['YearId']; ?>"><?php echo date("Y",strtotime($ResY['FromDate'])).'-'.date("Y",strtotime($ResY['ToDate'])); if($ResY['YearId']>5){ echo ' - Y'; }?></option><?php }else{ ?><option value="" selected>Year</option><?php } $SqlYear=mysql_query("select y.YearId,FromDate,ToDate from hrm_employee_pms p inner join hrm_year y on p.AssessmentYear=y.YearId where CompanyId=".$CompanyId." group by AssessmentYear order by AssessmentYear DESC", $con); while($ResYear=mysql_fetch_array($SqlYear)) { ?><option value="<?php echo $ResYear['YearId']; ?>"><?php echo date("Y",strtotime($ResYear['FromDate'])).'-'.date("Y",strtotime($ResYear['ToDate'])); if($ResYear['YearId']>5){ echo ' - Y'; } ?></option><?php } ?></select></td>

<td class="td1" style="font-size:11px; width:160px;" align="center"><select style="font-size:12px; width:158px; height:20px; background-color:#DDFFBB;" name="DeptInc" id="DeptInc" onChange="SelectEHodStdInc(this.value,<?php echo $_REQUEST['YI']; ?>,'d')"><option value="" style="margin-left:0px;" selected>SELECT DEPARTMENT</option><?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?><option value="0">&nbsp;All</option></select></td>
					   
<td class="td1" style="font-size:11px; width:150px;" align="center"><select style="font-size:12px; width:148px; height:20px; background-color:#DDFFBB;" name="AppInc" id="AppInc" onChange="SelectEHodStdInc(this.value,<?php echo $_REQUEST['YI']; ?>,'a')"><option value="" style="margin-left:0px;" selected>SELECT APPRAISER</option><?php $SqlHod=mysql_query("SELECT Appraiser_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.Appraiser_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." GROUP BY Appraiser_EmployeeID ORDER BY Fname ASC", $con); while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['Appraiser_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select></td>

<td class="td1" style="font-size:11px; width:150px;" align="center"><select style="font-size:12px; width:148px; height:20px; background-color:#DDFFBB;" name="RevInc" id="RevInc" onChange="SelectEHodStdInc(this.value,<?php echo $_REQUEST['YI']; ?>,'r')"><option value="" style="margin-left:0px;" selected>SELECT REVIEWER</option><?php $SqlHod=mysql_query("SELECT Reviewer_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.Reviewer_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." GROUP BY Reviewer_EmployeeID ORDER BY Fname ASC", $con); while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['Reviewer_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select></td>

<td class="td1" style="font-size:11px; width:150px;" align="center"><select style="font-size:12px; width:148px; height:20px; background-color:#DDFFBB;" name="HodInc" id="HodInc" onChange="SelectEHodStdInc(this.value,<?php echo $_REQUEST['YI']; ?>,'h')"><option value="" style="margin-left:0px;" selected>SELECT HOD</option><?php $SqlHod=mysql_query("SELECT HOD_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.HOD_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND `Emp_KRASave`='Y' GROUP BY HOD_EmployeeID ORDER BY Fname ASC", $con); while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['HOD_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select></td>

                     </tr>
				   </table>					
				   </td>                           
<?php } ?>					 
		           </tr>
                  </table>
				</td>
			 </tr>
<?php //------------------Display Record---------------------------------- ?>
<?php if($_REQUEST['action']=='EmpHodStdInc') { ?>
<?php 
if($_REQUEST['ee']=='Dept')
{ $name='Department Wise'; 
  if($_REQUEST['value']!=0)
  { $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['DepartmentName']; }else{$name2='All Department';}
}
elseif($_REQUEST['ee']=='App')
{ $name='Apraiser Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname'];
}
elseif($_REQUEST['ee']=='Rev')
{ $name='Reviewer Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname'];
}
elseif($_REQUEST['ee']=='Hod')
{ $name='HOD Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname'];
}
?>

<tr>
 <td>
   <table border="1" id="table1" cellspacing="0" style="width:1200px;">
   <div class="thead">
	 <thead>
     <tr>
  <td colspan="14" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;HOD Standard Increment <?php echo $name; ?> : &nbsp;&nbsp;(&nbsp;<?php echo $name2.'-'.$PRD; ?>&nbsp;)&nbsp;&nbsp;&nbsp;<a href="#" onClick="ExportHodStdInc(<?php echo $_REQUEST['value']; ?>,<?php echo $_REQUEST['YI']; ?>,'<?php echo $_REQUEST['ee']; ?>')" style="color:#F9F900; font-size:12px;">Export Excel</a></td>
  
  <?php /*?><a href="#" onClick="PrintHodStdInc(<?php echo $_REQUEST['value']; ?>,<?php echo $_REQUEST['YI']; ?>,'<?php echo $_REQUEST['ee']; ?>')" style="color:#F9F900; font-size:12px;">Print</a><?php */?>
	 </tr>
	 <tr bgcolor="#7a6189">
	  <td rowspan="2" style="width:30px;">&nbsp;</td>
	  <td rowspan="2" class="th" style="width:50px;"><b>SNo.</b></td>
	  <td colspan="5" class="th" style="width:50px;"><b>EMPLOYEE DETAILS</b></td>
	  <td colspan="2" class="th" style="width:50px;"><b><?php echo $PRD1; ?></b></td>
	  <td rowspan="2" class="th" style="width:50px;"><b>STATUS</b></td>
	  <td colspan="2" class="th" style="width:50px;"><b><?php echo $PRD2; ?></b></td>
	  <td rowspan="2" class="th" style="width:50px;"><b>SALARY CHANGE(%)</b></td>
	  <td rowspan="2" class="th" style="width:50px;"><b>CTC CHANGE(%)</b></td>
	 </tr>
	 <tr bgcolor="#7a6189">
		<td class="th" style="width:50px;"><b>EC</b></td>
		<td class="th" style="width:250px;"><b>NAME</b></td>
		<td class="th" style="width:120px;"><b><?php if($_REQUEST['act']=='d' OR $_REQUEST['act']=='g' OR $_REQUEST['act']=='de'){ ?><a href="#" onClick="StdIncDept(1)" style="color:#FFFF9D;">DEPARTMENT</a><?php }elseif($_REQUEST['act']=='dept' AND $_REQUEST['gg']==1){?><a href="#" onClick="StdIncDept(2)" style="color:#FFFF9D;">DEPARTMENT</a><?php } elseif($_REQUEST['act']=='dept' AND $_REQUEST['gg']==2){?><a href="#" onClick="StdIncDept(1)" style="color:#FFFF9D;">DEPARTMENT</a><?php } elseif($_REQUEST['act']=='dept'){?><a href="#" onClick="StdIncDept(1)" style="color:#FFFF9D;">DEPARTMENT</a><?php } ?></b></td>
		
		<td class="th" style="width:200px;"><b><?php if($_REQUEST['act']=='d' OR $_REQUEST['act']=='g' OR $_REQUEST['act']=='dept'){ ?><a href="#" onClick="StdIncDesig(1)" style="color:#FFFF9D;">DESIGNATION</a><?php }elseif($_REQUEST['act']=='de' AND $_REQUEST['gg']==1){?><a href="#" onClick="StdIncDesig(2)" style="color:#FFFF9D;">DESIGNATION</a><?php } elseif($_REQUEST['act']=='de' AND $_REQUEST['gg']==2){?><a href="#" onClick="StdIncDesig(1)" style="color:#FFFF9D;">DESIGNATION</a><?php } elseif($_REQUEST['act']=='de'){?><a href="#" onClick="StdIncDesig(1)" style="color:#FFFF9D;">DESIGNATION</a><?php } ?></b></td>
		
		<td class="th" style="width:50px;"><b><?php if($_REQUEST['act']=='d' OR $_REQUEST['act']=='de' OR $_REQUEST['act']=='dept'){ ?><a href="#" onClick="StdIncGrade(1)" style="color:#FFFF9D;">GRADE</a><?php }elseif($_REQUEST['act']=='g' AND $_REQUEST['gg']==1){?><a href="#" onClick="StdIncGrade(2)" style="color:#FFFF9D;">GRADE</a><?php } elseif($_REQUEST['act']=='g' AND $_REQUEST['gg']==2){?><a href="#" onClick="StdIncGrade(1)" style="color:#FFFF9D;">GRADE</a><?php } elseif($_REQUEST['act']=='g'){?><a href="#" onClick="StdIncGrade(1)" style="color:#FFFF9D;">GRADE</a><?php } ?></b></td>
		<td class="th" style="width:80px;"><b>SALARY</b></td>	
		<td class="th" style="width:80px;"><b>CTC</b></td>
		<td class="th" style="width:80px;"><b>SALARY</b></td>
		<td class="th" style="width:80px;"><b>CTC</b></td>
	</tr>
	</thead>
	</div>
<?php 
if($_REQUEST['ee']=='Dept')
{  
  if($_REQUEST['value']==0)
  { 
    if($_REQUEST['act']=='g' AND $_REQUEST['gg']==1){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by HR_CurrGradeId ASC, EmpCode ASC", $con);}
	elseif($_REQUEST['act']=='g' AND $_REQUEST['gg']==2){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by HR_CurrGradeId DESC, EmpCode ASC", $con);}
	elseif($_REQUEST['act']=='de' AND $_REQUEST['gg']==1){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,DesigName from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_designation ON hrm_employee_pms.HR_CurrDesigId=hrm_designation.DesigId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by DesigName ASC, HR_CurrGradeId ASC, EmpCode ASC", $con);}
	elseif($_REQUEST['act']=='de' AND $_REQUEST['gg']==2){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,DesigName from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_designation ON hrm_employee_pms.HR_CurrDesigId=hrm_designation.DesigId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by DesigName DESC, HR_CurrGradeId ASC, EmpCode ASC", $con);}
	elseif($_REQUEST['act']=='dept' AND $_REQUEST['gg']==1){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,DepartmentCode from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_department ON hrm_employee_pms.HR_Curr_DepartmentId=hrm_department.DepartmentId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by DepartmentCode ASC, HR_CurrGradeId ASC, EmpCode ASC", $con);}
	elseif($_REQUEST['act']=='dept' AND $_REQUEST['gg']==2){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,DepartmentCode from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_department ON hrm_employee_pms.HR_Curr_DepartmentId=hrm_department.DepartmentId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by DepartmentCode DESC, HR_CurrGradeId ASC, EmpCode ASC", $con);}
	else{$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con);}
  }
  else
  { 
    if($_REQUEST['act']=='g' AND $_REQUEST['gg']==1){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by HR_CurrGradeId ASC, EmpCode ASC", $con);}
	elseif($_REQUEST['act']=='g' AND $_REQUEST['gg']==2){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by HR_CurrGradeId DESC, EmpCode ASC", $con);}
	elseif($_REQUEST['act']=='de' AND $_REQUEST['gg']==1){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,DesigName from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_designation ON hrm_employee_pms.HR_CurrDesigId=hrm_designation.DesigId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by DesigName ASC, HR_CurrGradeId ASC, EmpCode ASC", $con);}
	elseif($_REQUEST['act']=='de' AND $_REQUEST['gg']==2){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,DesigName from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_designation ON hrm_employee_pms.HR_CurrDesigId=hrm_designation.DesigId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by DesigName DESC, HR_CurrGradeId ASC, EmpCode ASC", $con);}
	elseif($_REQUEST['act']=='dept' AND $_REQUEST['gg']==1){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,DepartmentCode from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_department ON hrm_employee_pms.HR_Curr_DepartmentId=hrm_department.DepartmentId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by DepartmentCode ASC, HR_CurrGradeId ASC, EmpCode ASC", $con);}
	elseif($_REQUEST['act']=='dept' AND $_REQUEST['gg']==2){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,DepartmentCode from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_department ON hrm_employee_pms.HR_Curr_DepartmentId=hrm_department.DepartmentId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by DepartmentCode DESC, HR_CurrGradeId ASC, EmpCode ASC", $con);}
	else{$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con);}
  }
}
elseif($_REQUEST['ee']=='App')
{ 
   if($_REQUEST['act']=='g' AND $_REQUEST['gg']==1){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by HR_CurrGradeId ASC, EmpCode ASC", $con);}
	elseif($_REQUEST['act']=='g' AND $_REQUEST['gg']==2){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by HR_CurrGradeId DESC, EmpCode ASC", $con);}
	elseif($_REQUEST['act']=='de' AND $_REQUEST['gg']==1){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,DesigName from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_designation ON hrm_employee_pms.HR_CurrDesigId=hrm_designation.DesigId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by DesigName ASC, HR_CurrGradeId ASC, EmpCode ASC", $con);}
	elseif($_REQUEST['act']=='de' AND $_REQUEST['gg']==2){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,DesigName from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_designation ON hrm_employee_pms.HR_CurrDesigId=hrm_designation.DesigId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by DesigName DESC, HR_CurrGradeId ASC, EmpCode ASC", $con);}
	elseif($_REQUEST['act']=='dept' AND $_REQUEST['gg']==1){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,DepartmentCode from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_department ON hrm_employee_pms.HR_Curr_DepartmentId=hrm_department.DepartmentId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by DepartmentCode ASC, HR_CurrGradeId ASC, EmpCode ASC", $con);}
	elseif($_REQUEST['act']=='dept' AND $_REQUEST['gg']==2){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,DepartmentCode from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_department ON hrm_employee_pms.HR_Curr_DepartmentId=hrm_department.DepartmentId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by DepartmentCode DESC, HR_CurrGradeId ASC, EmpCode ASC", $con);}
	else{$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con);}

}
elseif($_REQUEST['ee']=='Rev')
{ 
   if($_REQUEST['act']=='g' AND $_REQUEST['gg']==1){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Reviewer_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by HR_CurrGradeId ASC, EmpCode ASC", $con);}
	elseif($_REQUEST['act']=='g' AND $_REQUEST['gg']==2){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Reviewer_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by HR_CurrGradeId DESC, EmpCode ASC", $con);}
	elseif($_REQUEST['act']=='de' AND $_REQUEST['gg']==1){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,DesigName from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_designation ON hrm_employee_pms.HR_CurrDesigId=hrm_designation.DesigId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Reviewer_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by DesigName ASC, HR_CurrGradeId ASC, EmpCode ASC", $con);}
	elseif($_REQUEST['act']=='de' AND $_REQUEST['gg']==2){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,DesigName from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_designation ON hrm_employee_pms.HR_CurrDesigId=hrm_designation.DesigId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Reviewer_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by DesigName DESC, HR_CurrGradeId ASC, EmpCode ASC", $con);}
	elseif($_REQUEST['act']=='dept' AND $_REQUEST['gg']==1){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,DepartmentCode from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_department ON hrm_employee_pms.HR_Curr_DepartmentId=hrm_department.DepartmentId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Reviewer_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by DepartmentCode ASC, HR_CurrGradeId ASC, EmpCode ASC", $con);}
	elseif($_REQUEST['act']=='dept' AND $_REQUEST['gg']==2){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,DepartmentCode from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_department ON hrm_employee_pms.HR_Curr_DepartmentId=hrm_department.DepartmentId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Reviewer_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by DepartmentCode DESC, HR_CurrGradeId ASC, EmpCode ASC", $con);}
	else{$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Reviewer_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con);}

}
elseif($_REQUEST['ee']=='Hod')
{ 
   if($_REQUEST['act']=='g' AND $_REQUEST['gg']==1){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by HR_CurrGradeId ASC, EmpCode ASC", $con);}
	elseif($_REQUEST['act']=='g' AND $_REQUEST['gg']==2){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by HR_CurrGradeId DESC, EmpCode ASC", $con);}
	elseif($_REQUEST['act']=='de' AND $_REQUEST['gg']==1){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,DesigName from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_designation ON hrm_employee_pms.HR_CurrDesigId=hrm_designation.DesigId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by DesigName ASC, HR_CurrGradeId ASC, EmpCode ASC", $con);}
	elseif($_REQUEST['act']=='de' AND $_REQUEST['gg']==2){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,DesigName from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_designation ON hrm_employee_pms.HR_CurrDesigId=hrm_designation.DesigId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by DesigName DESC, HR_CurrGradeId ASC, EmpCode ASC", $con);}
	elseif($_REQUEST['act']=='dept' AND $_REQUEST['gg']==1){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,DepartmentCode from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_department ON hrm_employee_pms.HR_Curr_DepartmentId=hrm_department.DepartmentId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by DepartmentCode ASC, HR_CurrGradeId ASC, EmpCode ASC", $con);}
	elseif($_REQUEST['act']=='dept' AND $_REQUEST['gg']==2){$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,DepartmentCode from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_department ON hrm_employee_pms.HR_Curr_DepartmentId=hrm_department.DepartmentId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by DepartmentCode DESC, HR_CurrGradeId ASC, EmpCode ASC", $con);}
	else{$sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con);}
}
 $Sno=1; while($res=mysql_fetch_array($sql)){ 
 $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['HR_Curr_DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
 $sqlDesig=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['HR_CurrDesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
 $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_CurrGradeId'], $con);  $resG=mysql_fetch_assoc($sqlG);
 
 if($FD=='2012'){ $sqlMax = mysql_query("SELECT MAX(CtcId) as MaxCtcId FROM hrm_employee_ctc where EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD."-10-01")."'", $con); }else{$sqlMax = mysql_query("SELECT MAX(CtcId) as MaxCtcId FROM hrm_employee_ctc where EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<'".date($FD."-10-01")."'", $con);} $resMax = mysql_fetch_assoc($sqlMax); 
 $sqlCtc = mysql_query("select Tot_CTC FROM hrm_employee_ctc where CtcId=".$resMax['MaxCtcId'], $con); $Ctc = mysql_fetch_assoc($sqlCtc); 
 $sqlTotC=mysql_query("select Tot_CTC from hrm_employee_ctc where EmployeeID=".$res['EmployeeID']." AND (CtcCreatedDate>='".date($FD."-10-01")."' AND CtcCreatedDate<='".date($FD."-12-31")."')", $con); $resTotC=mysql_fetch_assoc($sqlTotC); 	
 if($res['HodSubmit_IncStatus']==2){ $Gross=$res['Hod_GrossMonthlySalary'];} else { $sqlRat=mysql_query("select Reviewer_TotalFinalRating,Hod_TotalFinalRating from hrm_employee_pms where EmployeeID=".$res['EmployeeID']." AND AssessmentYear=".$_REQUEST['YI'], $con); $resRat=mysql_fetch_array($sqlRat); 
  if($resRat['Hod_TotalFinalRating']>0){$RatingHod=$resRat['Hod_TotalFinalRating']; } else {$RatingHod=$resRat['Reviewer_TotalFinalRating'];} 
$sqlMaxMin= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dis WHERE Rating=".$RatingHod." AND YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId, $con); $resMaxMin = mysql_fetch_assoc($sqlMaxMin); 
	  
/*************************** Calculation **************************************************************/	
 
 if($FD1<2017)
 {
  
  if($res['DateJoining']<=$FD1.'-09-30' AND $RatingHod>0)
  { 
	$TotIncAmt=($res['EmpCurrGrossPM']*$resMaxMin['IncDistriFrom'])/100;
	$NewGrossAmt=10*(ceil(($res['EmpCurrGrossPM']+$TotIncAmt)/10));
	$NewGrossAmt2=$res['EmpCurrGrossPM']+$TotIncAmt;  
  }
  elseif($res['DateJoining']>=$FD1.'-10-01' AND $res['DateJoining']<=$FD.'-03-31' AND $RatingHod>0)
  {  
   $date1 = new DateTime($res['DateJoining']);  $date2 = new DateTime($FD."-09-30");
   $interval = date_diff($date2, $date1);
   $Y=$interval->format('%y');  $M=$interval->format('%m');  $D=$interval->format('%d')+1;
   $PerM=$resMaxMin['IncDistriFrom']/12;  $PerD=$PerM/30;
   $Month_Per=round($PerM*$M, 2); $Day_Per=round($PerD*$D, 2);
   $MSal=($res['EmpCurrGrossPM']*$Month_Per)/100; 
   $DSal=($res['EmpCurrGrossPM']*$Day_Per)/100; 
   $TotInc=round($MSal+$DSal);
   $NewGrossAmt=10*(ceil(($res['EmpCurrGrossPM']+$TotInc)/10)); 
   $NewGrossAmt2=$res['EmpCurrGrossPM']+$TotInc; 
  }                                                    
  else
  {
	 $NewGrossAmt=10*(ceil($res['EmpCurrGrossPM']/10));  
	 $NewGrossAmt2=$res['EmpCurrGrossPM'];
  } 
/***************************If Prorata  wise Extra Not allow previous time PMS process **************************************************************/	 
  if($res['DateJoining']>=$FD1.'-04-01' AND $res['DateJoining']<=$FD1.'-09-30' AND $RatingHod>0)
  {  
   $date11 = new DateTime($res['DateJoining']);  $date22 = new DateTime($FD1."-09-30");
   $interval = date_diff($date22, $date11);
   $YY=$interval->format('%y');  $MM=$interval->format('%m');  $DD=$interval->format('%d')+1;
   $PerM2=$resMaxMin['IncDistriFrom']/12;  $PerD2=$PerM2/30;
   $Month_Per2=round($PerM2*$MM, 2); $Day_Per2=round($PerD2*$DD, 2);
   $MSal2=($res['EmpCurrGrossPM']*$Month_Per2)/100; 
   $DSal2=($res['EmpCurrGrossPM']*$Day_Per2)/100; 
   $TotInc2=round($MSal2+$DSal2);    
  }     
  else{ $TotInc2=0; }                              
  if($TotInc2>0){$ActualNewGS=10*(ceil(($NewGrossAmt2+$TotInc2)/10));}
  else{$ActualNewGS=10*(ceil(($NewGrossAmt+$TotInc2)/10));}
  $Gross=$ActualNewGS+$res['Hod_ProCorrSalary'];
  
  }
  else
  {
  
   if($res['DateJoining']<=$FD1.'-12-31' AND $RatingHod>0)
  { 
	$TotIncAmt=($res['EmpCurrGrossPM']*$resMaxMin['IncDistriFrom'])/100;
	$NewGrossAmt=10*(ceil(($res['EmpCurrGrossPM']+$TotIncAmt)/10));
	$NewGrossAmt2=$res['EmpCurrGrossPM']+$TotIncAmt;  
  }
  elseif($res['DateJoining']>=$FD.'-01-01' AND $res['DateJoining']<=$FD.'-06-30' AND $RatingHod>0)
  {  
   $date1 = new DateTime($res['DateJoining']);  $date2 = new DateTime($FD."-12-31");
   $interval = date_diff($date2, $date1);
   $Y=$interval->format('%y');  $M=$interval->format('%m');  $D=$interval->format('%d')+1;
   $PerM=$resMaxMin['IncDistriFrom']/12;  $PerD=$PerM/30;
   $Month_Per=round($PerM*$M, 2); $Day_Per=round($PerD*$D, 2);
   $MSal=($res['EmpCurrGrossPM']*$Month_Per)/100; 
   $DSal=($res['EmpCurrGrossPM']*$Day_Per)/100; 
   $TotInc=round($MSal+$DSal);
   $NewGrossAmt=10*(ceil(($res['EmpCurrGrossPM']+$TotInc)/10)); 
   $NewGrossAmt2=$res['EmpCurrGrossPM']+$TotInc; 
  }                                                    
  else
  {
	 $NewGrossAmt=10*(ceil($res['EmpCurrGrossPM']/10));  
	 $NewGrossAmt2=$res['EmpCurrGrossPM'];
  } 
/***************************If Prorata  wise Extra Not allow previous time PMS process ******************************/	 
  if($res['DateJoining']>=$FD1.'-07-01' AND $res['DateJoining']<=$FD1.'-12-31' AND $RatingHod>0)
  {  
   $date11 = new DateTime($res['DateJoining']);  $date22 = new DateTime($FD1."-12-31");
   $interval = date_diff($date22, $date11);
   $YY=$interval->format('%y');  $MM=$interval->format('%m');  $DD=$interval->format('%d')+1;
   $PerM2=$resMaxMin['IncDistriFrom']/12;  $PerD2=$PerM2/30;
   $Month_Per2=round($PerM2*$MM, 2); $Day_Per2=round($PerD2*$DD, 2);
   $MSal2=($res['EmpCurrGrossPM']*$Month_Per2)/100; 
   $DSal2=($res['EmpCurrGrossPM']*$Day_Per2)/100; 
   $TotInc2=round($MSal2+$DSal2);    
  }     
  else{ $TotInc2=0; }                              
  if($TotInc2>0){$ActualNewGS=10*(ceil(($NewGrossAmt2+$TotInc2)/10));}
  else{$ActualNewGS=10*(ceil(($NewGrossAmt+$TotInc2)/10));}
  $Gross=$ActualNewGS+$res['Hod_ProCorrSalary'];
  
  }
  
 } 
?>		
    <div class="tbody">
	 <tbody>
	<tr bgcolor="#FFFFFF" id="TR<?php echo $Sno; ?>">
	  <td class="tdc"><input type="checkbox" id="Chk<?php echo $Sno; ?>" onClick="FucChk(<?php echo $Sno; ?>)" /></td>
      <td class="tdc"><?php echo $Sno; ?></td>
	  <td class="tdc"><?php echo $res['EmpCode']; ?></td>
	  <td class="tdl"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>	
	  <td class="tdl"><?php echo $resDept['DepartmentCode']; ?></td>
	  <td class="tdl"><?php echo $resDesig['DesigCode']; ?></td>
	  <td class="tdc"><?php echo $resG['GradeValue']; ?></td>
	  <td class="tdr"><?php echo intval($res['EmpCurrGrossPM']); ?>&nbsp;</td>
	  <td class="tdr"><?php echo intval($Ctc['Tot_CTC']); ?>&nbsp;</td>
	  <td class="tdc"><b><?php if($res['HodSubmit_IncStatus']==2){echo '<font color="#006600">F</font>';}else{echo '<font color="#FF8000">T</font>';} ?></b></td>
	  <td class="tdr"><?php echo intval($Gross); ?>&nbsp;</td>		
	  <td class="tdr"><?php if($resTotC['Tot_CTC']>0){echo intval($resTotC['Tot_CTC']);}else{echo '';} ?>&nbsp;</td>
<?php $OnePer=($res['EmpCurrGrossPM']*1)/100; $IncGross=$Gross-$res['EmpCurrGrossPM']; $ActPerInc=$IncGross/$OnePer;?>		
	  <td class="tdc"><?php echo round($ActPerInc, 2); ?>&nbsp;</td>
<?php $COnePer=($Ctc['Tot_CTC']*1)/100; $CIncGross=$resTotC['Tot_CTC']-$Ctc['Tot_CTC']; $CActPerInc=$CIncGross/$COnePer;?>		
	  <td class="tdc"><?php if($CActPerInc>0){echo round($CActPerInc, 2);} else{ ''; } ?></td>		
	 </tr>
	 </tbody>
	 </div>
	 <?php $Sno++; } ?>
   </table>
 </td>
</tr> 
<?php } ?>		
<?php //-------------------------------------------------------------------------------------------------------- ?>
	</tr>
</table>
<?php //***************************************************************************?>
<?php //************END*****END*****END******END******END**********************?>
<?php //*****************************************************************************?>
	  </td>
	</tr>
	  </table>
 </td>
</tr>
</table>
</body>
</html>