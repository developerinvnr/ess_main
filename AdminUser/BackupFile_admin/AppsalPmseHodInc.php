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
function SelectYear(v){window.location='AppsalPmseHodInc.php?YI='+v;}
function SelectEHodInc(v,yi,e)
{ if(e=='d'){var ee='Dept';}else if(e=='a'){var ee='App';}else if(e=='r'){var ee='Rev';}else if(e=='r2'){var ee='Rev2';}else if(e=='h'){var ee='Hod';} 
  window.location='AppsalPmseHodInc.php?action=EmpHodInc&ee='+ee+'&value='+v+'&YI='+yi;}
    
function PrintHodInc(v,yi,ee)
{var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;
 window.open("PrintPMSHodInc.php?action=Score&value="+v+"&c="+ComId+"&YI="+yi+"&ee="+ee,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=50,height=50");}

function ExportHodInc(v,yi,ee)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;   
  window.open("ExportPmsHodInc.php?action=HodIncExport&value="+v+"&c="+ComId+"&YI="+yi+"&ee="+ee,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}
 
function OpenWindow(v,v1)
{window.open("HRScoreHistory.php?a="+v+"&b="+v1,"AppraisalForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=1100,height=650");}

function UploadEmpfile(p,e)
{y=document.getElementById("YId").value; 
 window.open("CheckUploadAppFile.php?action=up&P="+p+"&E="+e+"&Y="+y,"UploadFile","menubar=no,scrollbars=yes,resizable='no',width=600,height=400");} 
  
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
<input type="hidden" name="DeptValue" id="DeptValue" value="<?php echo $_REQUEST['value']; ?>" />
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
<?php //*****************************************************************************************?>
<?php //***********START*****START*****START******START******START*****************************?>
<?php //********************************************************************************?>
<table border="0" style="margin-top:0px; width:100%;">
	<tr>
		<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true AND ($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1)) { ?>
		<td align="" width="100%" valign="top">
		   <table border="0">
       		 <tr><td colspan="2">
			       <table border="0">
                     <tr>
					  <td colspan="12" align="left" class="heading">HOD Increment &nbsp;<span id="ReturnValue">&nbsp;</span></td>
					  <td>
				    <table border="0">
                    <tr>
<?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>	     
<td class="td1" style="font-size:14px;width:120px;font-family:Times New Roman;" ><select class="tdsel" style="background-color:#DDFFBB;width:120px;" name="YearID" id="YearID" onChange="SelectYear(this.value)"><?php if($_REQUEST['YI']!=''){ $SqlY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI'], $con); $ResY=mysql_fetch_array($SqlY); ?><option value="<?php echo $ResY['YearId']; ?>"><?php echo date("Y",strtotime($ResY['FromDate'])).'-'.date("Y",strtotime($ResY['ToDate'])); if($ResY['YearId']>5){ echo ' - Y'; }?></option><?php }else{ ?><option value="" selected>Year</option><?php } $SqlYear=mysql_query("select y.YearId,FromDate,ToDate from hrm_employee_pms p inner join hrm_year y on p.AssessmentYear=y.YearId where CompanyId=".$CompanyId." group by AssessmentYear order by AssessmentYear DESC", $con); while($ResYear=mysql_fetch_array($SqlYear)) { ?><option value="<?php echo $ResYear['YearId']; ?>"><?php echo date("Y",strtotime($ResYear['FromDate'])).'-'.date("Y",strtotime($ResYear['ToDate'])); if($ResYear['YearId']>5){ echo ' - Y'; } ?></option><?php } ?></select></td>

<td class="td1" style="font-size:11px; width:150px;" align="center"><select style="font-size:12px; width:148px; height:20px; background-color:#DDFFBB;" name="DeptInc" id="DeptInc" onChange="SelectEHodInc(this.value,<?php echo $_REQUEST['YI']; ?>,'d')"><option value="" style="margin-left:0px;" selected>SELECT DEPARTMENT</option><?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?><option value="0">&nbsp;All</option></select></td>
					   
<td class="td1" style="font-size:11px; width:150px;" align="center"><select style="font-size:12px; width:148px; height:20px; background-color:#DDFFBB;" name="AppInc" id="AppInc" onChange="SelectEHodInc(this.value,<?php echo $_REQUEST['YI']; ?>,'a')">
					 <option value="" style="margin-left:0px;" selected>SELECT APPRAISER</option><?php $SqlHod=mysql_query("SELECT Appraiser_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.Appraiser_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." GROUP BY Appraiser_EmployeeID ORDER BY Fname ASC", $con); while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['Appraiser_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select></td>
					 
<td class="td1" style="font-size:11px; width:150px;" align="center"><select style="font-size:12px; width:148px; height:20px; background-color:#DDFFBB;" name="RevInc" id="RevInc" onChange="SelectEHodInc(this.value,<?php echo $_REQUEST['YI']; ?>,'r')">					 <option value="" style="margin-left:0px;" selected>SELECT REVIEWER</option><?php $SqlHod=mysql_query("SELECT Reviewer_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.Reviewer_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." GROUP BY Reviewer_EmployeeID ORDER BY Fname ASC", $con); while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['Reviewer_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select></td>

<td class="td1" style="font-size:11px; width:150px;" align="center"><select style="font-size:12px; width:148px; height:20px; background-color:#DDFFBB;" name="RevInc" id="RevInc" onChange="SelectEHodInc(this.value,<?php echo $_REQUEST['YI']; ?>,'r2')">					 <option value="" style="margin-left:0px;" selected>SELECT HOD</option><?php $SqlHod=mysql_query("SELECT Rev2_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.Rev2_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." GROUP BY Rev2_EmployeeID ORDER BY Fname ASC", $con); while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['Rev2_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select></td>
					  
<td class="td1" style="font-size:11px; width:150px;" align="center"><select style="font-size:12px; width:148px; height:20px; background-color:#DDFFBB;" name="HodInc" id="HodInc" onChange="SelectEHodInc(this.value,<?php echo $_REQUEST['YI']; ?>,'h')"><option value="" style="margin-left:0px;" selected>SELECT MANAGEMENT</option><?php $SqlHod=mysql_query("SELECT HOD_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.HOD_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND `Emp_KRASave`='Y' GROUP BY HOD_EmployeeID ORDER BY Fname ASC", $con); while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['HOD_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select></td>

                     </tr>
				   </table>					
				   </td>                           
<?php } ?>					 
		           </tr>
                  </table>
				</td>
			 </tr>
<?php //---------------------------------------Display Record--------------------------------------- ?>
<?php if($_REQUEST['action']=='EmpHodInc') { ?>
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
elseif($_REQUEST['ee']=='Rev2')
{ $name='HOD Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname'];
}
elseif($_REQUEST['ee']=='Hod')
{ $name='Managment Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname'];
}
?>

<tr>
 <td>
   <table border="1" id="table1" cellspacing="0" style="width:1800px;">
   <div class="thead">
	 <thead>
     <tr>
  <td colspan="11" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;HOD Increment <?php echo $name; ?> : &nbsp;&nbsp;(&nbsp;<?php echo $name2.'-'.$PRD; ?>&nbsp;)&nbsp;&nbsp;&nbsp;<a href="#" onClick="ExportHodInc(<?php echo $_REQUEST['value']; ?>,<?php echo $_REQUEST['YI']; ?>,'<?php echo $_REQUEST['ee']; ?>')" style="color:#F9F900; font-size:12px;">Export Excel</a>
	  </td>
	  
	  <?php /*?><a href="#" onClick="PrintHodInc(<?php echo $_REQUEST['value']; ?>,<?php echo $_REQUEST['YI']; ?>,'<?php echo $_REQUEST['ee']; ?>')" style="color:#F9F900; font-size:12px;">Print</a><?php */?>
	  
	  <td rowspan="2" bgcolor="#7a6189" align="center" style="color:#FFFFFF;" class="All_50"><b>PREVIOUS <?php if($_REQUEST['YI']<=7){echo 'GROSS';}else{echo 'CTC';}?></b></td>
	  <td colspan="11" bgcolor="#7a6189" align="center" style="color:#FFFFFF;" class="All_50"><b>PROPOSED <?php if($_REQUEST['YI']<=7){echo 'GROSS';}else{echo 'CTC';}?></b></td>
	 </tr>
	 <tr bgcolor="#7a6189">
	    <td style="width:30px;">&nbsp;</td>
		<td class="th" style="width:50px;">SNo</td>
		<td class="th" style="width:50px;">EC</td>
		<td class="th" style="width:250px;">Name</td>
		<td class="th" style="width:120px;">Department</td>
		<td class="th" style="width:50px;">Grade</td>
		<td class="th" style="width:150px;">Designation</td>	
		<td class="th" style="width:50px;">Form</td>
		<td class="th" style="width:50px;">Attach</td>
		<td class="th" style="width:50px;">Score</td>
		<td class="th" style="width:50px;">Rating</td>
		
   		<td class="th" style="width:50px;">Score</td>
		<td class="th" style="width:50px;">Rating</td>
		<td class="th" style="width:50px;">Grade</td>
		<td class="th" style="width:150px;">Designation</td>
		
		<td class="th" style="width:80px;"><?php if($_REQUEST['YI']<=7){echo 'PGSPM';}else{echo 'Proposed CTC';}?></td>
		<td class="th" style="width:50px;"><?php if($_REQUEST['YI']<=7){echo '% PIS';}else{echo '% PRO. CTC';}?></td>
		<td class="th" style="width:80px;"><?php if($_REQUEST['YI']<=7){echo 'PSC';}else{echo 'CTC Corr.';}?></td>
		<td class="th" style="width:50px;"><?php if($_REQUEST['YI']<=7){echo '% PSC';}else{echo '% Corr.';}?></td>
		<td class="th" style="width:80px;"><?php if($_REQUEST['YI']<=7){echo 'TISPM';}else{echo 'Total Increment';}?></td>		 
		<td class="th" style="width:50px;"><?php if($_REQUEST['YI']<=7){echo '% TISPM';}else{echo '% Total';}?></td>
		<td class="th" style="width:80px;"><?php if($_REQUEST['YI']<=7){echo 'TPGSPM';}else{echo 'Total Proposed CTC';}?></td>
		
		<!--<td class="th" style="width:80px;">TOTAL CTC</td>-->

	</tr>
	</thead>
	</div>
<?php 
if($_REQUEST['ee']=='Dept')
{  
  if($_REQUEST['value']==0)
  { $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DateJoining, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Rev2_EmployeeID, Hod_TotalFinalScore, Hod_TotalFinalRating, HodSubmit_IncStatus, Hod_EmpDesignation, Hod_EmpGrade, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_Percent_ProCorrSalary, Hod_IncNetMonthalySalary, Hod_Percent_IncNetMonthalySalary, Hod_GrossMonthlySalary, Hod_GrossAnnualSalary, Hod_Incentive, HodPer_PIS_From_PreMyTGrossPM, HodPer_SC_From_PreMyTGrossPM, HodPer_TISPM_From_PreMyTGrossPM, HR_CurrDesigId, HR_CurrGradeId, HR_Curr_DepartmentId, EmpCurrCtc, Hod_ProIncCTC, Hod_Percent_ProIncCTC, Hod_ProCorrCTC, Emp_TotalFinalScore, Emp_TotalFinalRating, Hod_Percent_ProCorrCTC, Hod_Proposed_ActualCTC, Hod_IncNetCTC, Hod_Percent_IncNetCTC, Hod_CTC, HR_PmsStatus from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID where e.CompanyId=".$CompanyId." AND e.EmpStatus='A' AND g.DateJoining<='".$YYear."-06-30' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.Appraiser_EmployeeID!=0 order by e.EmpCode ASC", $con); 
  }
  else{ $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DateJoining, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Rev2_EmployeeID, Hod_TotalFinalScore, Hod_TotalFinalRating, HodSubmit_IncStatus, Hod_EmpDesignation, Hod_EmpGrade, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_Percent_ProCorrSalary, Hod_IncNetMonthalySalary, Hod_Percent_IncNetMonthalySalary, Hod_GrossMonthlySalary, Hod_GrossAnnualSalary, Hod_Incentive, HodPer_PIS_From_PreMyTGrossPM, HodPer_SC_From_PreMyTGrossPM, HodPer_TISPM_From_PreMyTGrossPM, HR_CurrDesigId, HR_CurrGradeId, HR_Curr_DepartmentId, EmpCurrCtc, Hod_ProIncCTC, Hod_Percent_ProIncCTC, Hod_ProCorrCTC, Emp_TotalFinalScore, Emp_TotalFinalRating, Hod_Percent_ProCorrCTC, Hod_Proposed_ActualCTC, Hod_IncNetCTC, Hod_Percent_IncNetCTC, Hod_CTC, HR_PmsStatus from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID where e.CompanyId=".$CompanyId." AND e.EmpStatus='A' AND g.DateJoining<='".$YYear."-06-30' AND p.AssessmentYear=".$_REQUEST['YI']." AND g.DepartmentId=".$_REQUEST['value']." AND p.Appraiser_EmployeeID!=0 order by e.EmpCode ASC", $con); 
  
  }
}
elseif($_REQUEST['ee']=='App')
{ $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DateJoining, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Rev2_EmployeeID, Hod_TotalFinalScore, Hod_TotalFinalRating, HodSubmit_IncStatus, Hod_EmpDesignation, Hod_EmpGrade, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_Percent_ProCorrSalary, Hod_IncNetMonthalySalary, Hod_Percent_IncNetMonthalySalary, Hod_GrossMonthlySalary, Hod_GrossAnnualSalary, Hod_Incentive, HodPer_PIS_From_PreMyTGrossPM, HodPer_SC_From_PreMyTGrossPM, HodPer_TISPM_From_PreMyTGrossPM, HR_CurrDesigId, HR_CurrGradeId, HR_Curr_DepartmentId, EmpCurrCtc, Hod_ProIncCTC, Hod_Percent_ProIncCTC, Hod_ProCorrCTC, Emp_TotalFinalScore, Emp_TotalFinalRating, Hod_Percent_ProCorrCTC, Hod_Proposed_ActualCTC, Hod_IncNetCTC, Hod_Percent_IncNetCTC, Hod_CTC, HR_PmsStatus from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID where e.CompanyId=".$CompanyId." AND e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.Appraiser_EmployeeID=".$_REQUEST['value']." AND p.Appraiser_EmployeeID!=0 order by e.EmpCode ASC", $con);
}
elseif($_REQUEST['ee']=='Rev')
{ $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DateJoining, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Rev2_EmployeeID, Hod_TotalFinalScore, Hod_TotalFinalRating, HodSubmit_IncStatus, Hod_EmpDesignation, Hod_EmpGrade, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_Percent_ProCorrSalary, Hod_IncNetMonthalySalary, Hod_Percent_IncNetMonthalySalary, Hod_GrossMonthlySalary, Hod_GrossAnnualSalary, Hod_Incentive, HodPer_PIS_From_PreMyTGrossPM, HodPer_SC_From_PreMyTGrossPM, HodPer_TISPM_From_PreMyTGrossPM, HR_CurrDesigId, HR_CurrGradeId, HR_Curr_DepartmentId, EmpCurrCtc, Hod_ProIncCTC, Hod_Percent_ProIncCTC, Hod_ProCorrCTC, Emp_TotalFinalScore, Emp_TotalFinalRating, Hod_Percent_ProCorrCTC, Hod_Proposed_ActualCTC, Hod_IncNetCTC, Hod_Percent_IncNetCTC, Hod_CTC, HR_PmsStatus from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID where e.CompanyId=".$CompanyId." AND e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.Reviewer_EmployeeID=".$_REQUEST['value']." AND p.Appraiser_EmployeeID!=0 order by e.EmpCode ASC", $con);
}
elseif($_REQUEST['ee']=='Rev2')
{ $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DateJoining, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Rev2_EmployeeID, Hod_TotalFinalScore, Hod_TotalFinalRating, HodSubmit_IncStatus, Hod_EmpDesignation, Hod_EmpGrade, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_Percent_ProCorrSalary, Hod_IncNetMonthalySalary, Hod_Percent_IncNetMonthalySalary, Hod_GrossMonthlySalary, Hod_GrossAnnualSalary, Hod_Incentive, HodPer_PIS_From_PreMyTGrossPM, HodPer_SC_From_PreMyTGrossPM, HodPer_TISPM_From_PreMyTGrossPM, HR_CurrDesigId, HR_CurrGradeId, HR_Curr_DepartmentId, EmpCurrCtc, Hod_ProIncCTC, Hod_Percent_ProIncCTC, Hod_ProCorrCTC, Emp_TotalFinalScore, Emp_TotalFinalRating, Hod_Percent_ProCorrCTC, Hod_Proposed_ActualCTC, Hod_IncNetCTC, Hod_Percent_IncNetCTC, Hod_CTC, HR_PmsStatus from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID where e.CompanyId=".$CompanyId." AND e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.Rev2_EmployeeID=".$_REQUEST['value']." AND p.Appraiser_EmployeeID!=0 order by e.EmpCode ASC", $con);
}
elseif($_REQUEST['ee']=='Hod')
{ $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DateJoining, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Rev2_EmployeeID, Hod_TotalFinalScore, Hod_TotalFinalRating, HodSubmit_IncStatus, Hod_EmpDesignation, Hod_EmpGrade, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_Percent_ProCorrSalary, Hod_IncNetMonthalySalary, Hod_Percent_IncNetMonthalySalary, Hod_GrossMonthlySalary, Hod_GrossAnnualSalary, Hod_Incentive, HodPer_PIS_From_PreMyTGrossPM, HodPer_SC_From_PreMyTGrossPM, HodPer_TISPM_From_PreMyTGrossPM, HR_CurrDesigId, HR_CurrGradeId, HR_Curr_DepartmentId, EmpCurrCtc, Hod_ProIncCTC, Hod_Percent_ProIncCTC, Hod_ProCorrCTC, Emp_TotalFinalScore, Emp_TotalFinalRating, Hod_Percent_ProCorrCTC, Hod_Proposed_ActualCTC, Hod_IncNetCTC, Hod_Percent_IncNetCTC, Hod_CTC, HR_PmsStatus from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID where e.CompanyId=".$CompanyId." AND e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.HOD_EmployeeID=".$_REQUEST['value']." AND p.Appraiser_EmployeeID!=0 order by e.EmpCode ASC", $con);
}
 $Sno=1; while($res=mysql_fetch_array($sql)){ 
 $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['HR_Curr_DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
 $sqlDesig=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['HR_CurrDesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
 $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_CurrGradeId'], $con);  $resG=mysql_fetch_assoc($sqlG);
 ?>	   
     <div class="tbody">
	 <tbody>
	 <tr bgcolor="#FFFFFF" id="TR<?php echo $Sno; ?>">
	    <td class="tdc"><input type="checkbox" id="Chk<?php echo $Sno; ?>" onClick="FucChk(<?php echo $Sno; ?>)" /></td>
		<td class="tdc"><?php echo $Sno; ?></td>
		<td class="tdc"><?php echo $res['EmpCode']; ?></td>
		<td class="tdl"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>	
		<td class="tdl"><?php echo $resDept['DepartmentCode']; ?></td>
		<td class="tdc"><?php echo $resG['GradeValue']; ?></td>
		<td class="tdl"><?php echo $resDesig['DesigCode']; ?></td>
		<td class="tdc"><a href="javascript:OpenWindow(<?php echo $res['EmployeeID'].','.$res['EmpPmsId']; ?>)">Click</a></td>
		<td class="tdc"><?php $sqlR=mysql_query("select * from hrm_employee_pms_uploadfile where EmpPmsId=".$res['EmpPmsId']." AND EmployeeID=".$res['EmployeeID']." AND YearId=".$_REQUEST['YI'], $con); $no=1; $resR=mysql_num_rows($sqlR); if($resR>0){ ?><a href="#" onClick="UploadEmpfile(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>)">Yes</a><?php } if($resR==0){echo 'No'; }?></td>	
		<td class="tdc"><?php echo $res['Emp_TotalFinalScore']; ?></td>
		<td class="tdc"><?php echo $res['Emp_TotalFinalRating']; ?></td>		
        <td class="tdr"><?php if($_REQUEST['YI']<=7){echo $res['EmpCurrGrossPM'];}else{echo $res['EmpCurrCtc'];}?></td>
				
		<td class="tdc"><?php echo $res['Hod_TotalFinalScore']; ?></td> 
		<td class="tdc"><?php echo $res['Hod_TotalFinalRating']; ?></td> 
<?php if($res['Hod_EmpDesignation']!=$res['HR_CurrDesigId']){ $sqlDesigH=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['Hod_EmpDesignation']." AND CompanyId=".$CompanyId, $con); $resDesigH=mysql_fetch_assoc($sqlDesigH); $DesigH=$resDesigH['DesigCode']; }else{$DesigH='';}
if($res['Hod_EmpGrade']!=$res['HR_CurrGradeId']){ $sqlGH=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Hod_EmpGrade']." AND CompanyId=".$CompanyId, $con); $resGH=mysql_fetch_assoc($sqlGH); $GradeH=$resGH['GradeValue']; }else{$GradeH='';} ?>	
		<td class="tdc"><?php echo $GradeH; ?></td>
        <td class="tdl"><?php echo $DesigH; ?></td> 
				
		<td class="tdr"><?php if($_REQUEST['YI']<=7){echo $res['Hod_ProIncSalary'];}else{echo $res['Hod_ProIncCTC'];}?></td>
		<td class="tdc"><?php if($_REQUEST['YI']<=7){echo $res['Hod_Percent_ProIncSalary'];}else{echo $res['Hod_Percent_ProIncCTC'];}?></td>
		<td class="tdr"><?php if($_REQUEST['YI']<=7){echo $res['Hod_ProCorrSalary'];}else{echo $res['Hod_ProCorrCTC'];}?></td>
        <td class="tdc"><?php if($_REQUEST['YI']<=7){echo $res['Hod_Percent_ProCorrSalary'];}else{echo $res['Hod_Percent_ProCorrCTC'];}?></td> 		
        <td class="tdr"><?php if($_REQUEST['YI']<=7){echo $res['Hod_IncNetMonthalySalary'];}else{echo $res['Hod_IncNetCTC'];}?></td>
        <td class="tdc"><?php if($_REQUEST['YI']<=7){echo $res['Hod_Percent_IncNetMonthalySalary'];}else{echo $res['Hod_Percent_IncNetCTC'];}?></td>
		<td class="tdc"><?php if($_REQUEST['YI']<=7){echo $res['Hod_GrossMonthlySalary'];}else{echo $res['Hod_Proposed_ActualCTC'];}?></td> 
		
<?php /* $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD;

if($_REQUEST['YI']<=5){ $sqlC = mysql_query("SELECT Tot_CTC from hrm_employee_ctc WHERE EmployeeID=".$res['EmployeeID']." AND CtcYearId=".$_REQUEST['YI']." AND CtcCreatedDate>='".date($FD."-10-01")."' AND CtcCreatedDate<='".date($FD."-12-31")."'", $con); }else{ $sqlC = mysql_query("SELECT Tot_CTC from hrm_employee_ctc WHERE EmployeeID=".$res['EmployeeID']." AND CtcYearId=".$_REQUEST['YI']." AND CtcCreatedDate>='".date($TD."-01-01")."'", $con); }
$RowC=mysql_num_rows($sqlC); $ResC=mysql_fetch_assoc($sqlC);
		
		 $gross_annual=$res['Hod_GrossMonthlySalary']*12;
  
 $basicc=($res['Hod_GrossMonthlySalary']*40)/100;
  if($basicc<10500){$basic=10500;}else{$basic=$basicc;}
  
  
  $pf=($basic*12)/100; $pf_annual=$pf*12; 
  
  if($basic<21000){ $bonus=16800; }else{ $bonus=0;  }
  if($res['Hod_GrossMonthlySalary']<21000){ $esic=(($res['Hod_GrossMonthlySalary']*4.75)/100)*12; $mediclaim=0; }
  else{ $esic=0; $mediclaim=10000; }
  
  $OnedayBasic=$basic/26; $gratuity=$OnedayBasic*15;
  
  
  $PrposedCtc=$gross_annual+$pf_annual+$bonus+$esic+$gratuity+$mediclaim;
  
  if($res['Hod_GrossMonthlySalary']>0){ $ctc=intval($PrposedCtc); }
  else{ $ctc=''; }
		
		?>
		<td class="tdc"><?php if($res['HR_PmsStatus']==2){echo $ResC['Tot_CTC'];}else{echo $ctc;} ?></td>
		*/ ?>
		
	 </tr>
	 </tbody>
	 </div>
	 <?php $Sno++; } 
	 
	 
/*

if($_REQUEST['ee']=='Dept')
{  
  if($_REQUEST['value']==0)
  { $sql2=mysql_query("select SUM(EmpCurrGrossPM) as PGross, SUM(Hod_ProIncSalary) as ISGross, SUM(Hod_ProCorrSalary) as CoGross, SUM(Hod_IncNetMonthalySalary) as IncGross, SUM(Hod_GrossMonthlySalary) as TGross from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by hrm_employee.EmpCode ASC", $con); }
  else{ $sql2=mysql_query("select SUM(EmpCurrGrossPM) as PGross, SUM(Hod_ProIncSalary) as ISGross, SUM(Hod_ProCorrSalary) as CoGross, SUM(Hod_IncNetMonthalySalary) as IncGross, SUM(Hod_GrossMonthlySalary) as TGross from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by hrm_employee.EmpCode ASC", $con); }
}
elseif($_REQUEST['ee']=='App')
{ $sql2=mysql_query("select SUM(EmpCurrGrossPM) as PGross, SUM(Hod_ProIncSalary) as ISGross, SUM(Hod_ProCorrSalary) as CoGross, SUM(Hod_IncNetMonthalySalary) as IncGross, SUM(Hod_GrossMonthlySalary) as TGross from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by hrm_employee.EmpCode ASC", $con);
}
elseif($_REQUEST['ee']=='Rev')
{ $sql2=mysql_query("select SUM(EmpCurrGrossPM) as PGross, SUM(Hod_ProIncSalary) as ISGross, SUM(Hod_ProCorrSalary) as CoGross, SUM(Hod_IncNetMonthalySalary) as IncGross, SUM(Hod_GrossMonthlySalary) as TGross from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Reviewer_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by hrm_employee.EmpCode ASC", $con);
}
elseif($_REQUEST['ee']=='Hod')
{ $sql2=mysql_query("select SUM(EmpCurrGrossPM) as PGross, SUM(Hod_ProIncSalary) as ISGross, SUM(Hod_ProCorrSalary) as CoGross, SUM(Hod_IncNetMonthalySalary) as IncGross, SUM(Hod_GrossMonthlySalary) as TGross from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by hrm_employee.EmpCode ASC", $con);
}
 $res2=mysql_fetch_array($sql2);
  
 //SUM(EmpCurrGrossPM) as PGross, 
 //SUM(Hod_ProIncSalary) as ISGross, 
 //SUM(Hod_ProCorrSalary) as CoGross, 
 //SUM(Hod_IncNetMonthalySalary) as IncGross, 
 //SUM(Hod_GrossMonthlySalary) as TGross 
 
 
$TotEGross=$res2['PGross']; 
$One=($TotEGross*1)/100; $OnePerPre=number_format($One, 2, '.', '');

$Diff=$res2['ISGross']-$res2['PGross'];
$IncPer=$Diff/$OnePerPre; $PerInc=number_format($IncPer, 2, '.', '');
$TotalPerPSC=$res2['CoGross']/$OnePerPre; $TotalTPerPSC=number_format($TotalPerPSC, 2, '.', ''); 
$TotalPerPIS=($Diff+$res2['CoGross'])/$OnePerPre; $TotalTPerPIS=number_format($TotalPerPIS, 2, '.', '');

?>
	 <tr style="background-color:#B6FF6C;font-weight:bold;">
      <td colspan="11" style="text-align:right;">==>&nbsp;</td>
	  <td class="tdr"><?php echo floatval($res2['PGross']); ?></td>
	  <td class="tdc" colspan="4"></td> 
	  <td class="tdr"><?php echo number_format($res2['ISGross'], 2, '.', '');; ?></td>
	  <td class="tdc"><?php echo $PerInc; ?></td>
	  <td class="tdr"><?php echo number_format($res2['CoGross'], 2, '.', ''); ?></td>
	  <td class="tdc"><?php echo $TotalTPerPSC; ?></td> 		
	  <td class="tdr"><?php echo number_format($res2['IncGross'], 2, '.', ''); ?></td>
	  <td class="tdc"><?php echo $TotalTPerPIS; ?></td>
	  <td class="tdc"><?php echo number_format($res2['TGross'], 2, '.', ''); ?></td>
	 </tr>
<?php */ ?>	 
	 
   </table>
 </td>
</tr> 
<?php } ?>		
<?php //-------------------------------------------------------------------------------------------------------- ?>
	</tr>
</table>
<?php //**************************************************************************************?>
<?php //*****************END*****END*****END******END******END**********************?>
<?php //*************************************************************************?>
	  </td>
	</tr>
	  </table>
 </td>
</tr>
</table>
</body>
</html>