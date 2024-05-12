<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_REQUEST['YI']==1){$Y=2012; $Y2=2013;}elseif($_REQUEST['YI']==2){$Y=2013; $Y2=2014;}elseif($_REQUEST['YI']==3){$Y=2014; $Y2=2015;}elseif($_REQUEST['YI']==4){$Y=2015; $Y2=2016;}elseif($_REQUEST['YI']==5){$Y=2016; $Y2=2017;}elseif($_REQUEST['YI']==6){$Y=2017; $Y2=2018;}elseif($_REQUEST['YI']==7){$Y=2018; $Y2=2019;}elseif($_REQUEST['YI']==8){$Y=2019; $Y2=2020;}elseif($_REQUEST['YI']==9){$Y=2020; $Y2=2021;}elseif($_REQUEST['YI']==10){$Y=2021; $Y2=2022;}elseif($_REQUEST['YI']==11){$Y=2022; $Y2=2023;}
if($CompanyId==1 OR $CompanyId==2){$YYear=$Y;}elseif($CompanyId==3){$YYear=$Y2;}
//****************************************************************************************************************
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.th{ font-family:Times New Roman;font-size:12px;height:25px;text-align:center;background-color:#7a6189;color:#FFFFFF;font-weight:bold; }
.tdl{ font-family:Times New Roman;font-size:12px;text-align:left; }
.tdc{ font-family:Times New Roman;font-size:12px;text-align:center; }
.tdr{ font-family:Times New Roman;font-size:12px;text-align:right; }
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
function SelectYear(v){window.location='AppsalPmseCmptPrs.php?YI='+v;}
function SelectECmptPrs(v,yi,e)
{ if(e=='d'){var ee='Dept';}else if(e=='a'){var ee='App';}else if(e=='r'){var ee='Rev';}else if(e=='h'){var ee='Hod';} 
  window.location='AppsalPmseCmptPrs.php?action=EmpCmptPrs&ee='+ee+'&value='+v+'&YI='+yi;}

function ExportCmptPrs(v,yi,ee)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;   
  window.open("ExportPmsCmptPrs.php?action=CmptPrsIncExport&value="+v+"&c="+ComId+"&YI="+yi+"&ee="+ee,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}
 
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
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
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
<?php //***************************************************************************?>
<?php //***********START*****START*****START******START******START********************************?>
<?php //*********************************************************************************?>
<table border="0" style="margin-top:0px; width:100%;">
	<tr>
		<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true AND ($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1)) { ?>
		<td align="" width="100%" valign="top">
		   <table border="0">
       		 <tr><td colspan="2">
			       <table border="0">
                     <tr>
					  <td colspan="12" align="left" class="heading">Complete PMS Process Details&nbsp;<span id="ReturnValue">&nbsp;</span></td>
					  <td>
				    <table border="0">
                    <tr>
<?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>	     
<td class="td1" style="font-size:14px;width:180px;font-family:Times New Roman;" >&nbsp;&nbsp;<b>Year:</b>&nbsp;
<select class="tdsel" style="background-color:#DDFFBB;width:115px;" name="YearID" id="YearID" onChange="SelectYear(this.value)"><?php if($_REQUEST['YI']!=''){ $SqlY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI'], $con); $ResY=mysql_fetch_array($SqlY); ?><option value="<?php echo $ResY['YearId']; ?>"><?php echo date("Y",strtotime($ResY['FromDate'])).'-'.date("Y",strtotime($ResY['ToDate'])); if($ResY['YearId']>5){ echo ' - Y'; }?></option><?php }else{ ?><option value="" selected>Year</option><?php } $SqlYear=mysql_query("select y.YearId,FromDate,ToDate from hrm_employee_pms p inner join hrm_year y on p.AssessmentYear=y.YearId where CompanyId=".$CompanyId." group by AssessmentYear order by AssessmentYear DESC", $con); while($ResYear=mysql_fetch_array($SqlYear)) { ?><option value="<?php echo $ResYear['YearId']; ?>"><?php echo date("Y",strtotime($ResYear['FromDate'])).'-'.date("Y",strtotime($ResYear['ToDate'])); if($ResYear['YearId']>5){ echo ' - Y'; } ?></option><?php } ?></select></td>	

<td class="td1" style="font-size:11px; width:150px;" align="center"><select style="font-size:12px; width:148px; height:20px; background-color:#DDFFBB;" name="DeptInc" id="DeptInc" onChange="SelectECmptPrs(this.value,<?php echo $_REQUEST['YI']; ?>,'d')"><option value="" style="margin-left:0px;" selected>SELECT DEPARTMENT</option><?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?><option value="0">&nbsp;All</option></select></td>

<td class="td1" style="font-size:11px; width:150px;" align="center"><select style="font-size:12px; width:148px; height:20px; background-color:#DDFFBB;" name="AppInc" id="AppInc" onChange="SelectECmptPrs(this.value,<?php echo $_REQUEST['YI']; ?>,'a')"><option value="" style="margin-left:0px;" selected>SELECT APPRAISER</option><?php $SqlHod=mysql_query("SELECT Appraiser_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.Appraiser_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." GROUP BY Appraiser_EmployeeID ORDER BY Fname ASC", $con); while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['Appraiser_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select></td>

<td class="td1" style="font-size:11px; width:150px;" align="center"><select style="font-size:12px; width:148px; height:20px; background-color:#DDFFBB;" name="RevInc" id="RevInc" onChange="SelectECmptPrs(this.value,<?php echo $_REQUEST['YI']; ?>,'r')"><option value="" style="margin-left:0px;" selected>SELECT REVIEWER</option><?php $SqlHod=mysql_query("SELECT Reviewer_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.Reviewer_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." GROUP BY Reviewer_EmployeeID ORDER BY Fname ASC", $con); while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['Reviewer_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select></td>

<td class="td1" style="font-size:11px; width:150px;" align="center"><select style="font-size:12px; width:148px; height:20px; background-color:#DDFFBB;" name="HodInc" id="HodInc" onChange="SelectECmptPrs(this.value,<?php echo $_REQUEST['YI']; ?>,'h')"><option value="" style="margin-left:0px;" selected>SELECT HOD</option><?php $SqlHod=mysql_query("SELECT HOD_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.HOD_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND `Emp_KRASave`='Y' GROUP BY HOD_EmployeeID ORDER BY Fname ASC", $con); while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['HOD_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select></td>

                     </tr>
				   </table>					
				   </td>                           
<?php } ?>					 
		           </tr>
                  </table>
				</td>
			 </tr>
<?php //---------------------------------------Display Record-------------------------------------- ?>
<?php if($_REQUEST['action']=='EmpCmptPrs') { ?>
<?php 
if($_REQUEST['ee']=='Dept')
{ $name='Department Wise'; 
  if($_REQUEST['value']!=0)
  { $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['DepartmentName']; }
  else{$name2='All Department';}
}
elseif($_REQUEST['ee']=='App')
{ $name='Apraiser Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); 
  $name2=$resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname'];
}
elseif($_REQUEST['ee']=='Rev')
{ $name='Reviewer Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); 
  $name2=$resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname'];
}
elseif($_REQUEST['ee']=='Hod')
{ $name='HOD Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); 
  $name2=$resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname'];
}
?>

<tr>
 <td>
   <table border="1" id="table1" cellspacing="0" style="width:8000px;">
   <div class="thead">
   <thead>
     <tr>
  <td colspan="14" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;Complete PMS Process Details <?php echo $name; ?> : &nbsp;&nbsp;(&nbsp;<?php echo $name2.'-'.$PRD; ?>&nbsp;)&nbsp;&nbsp;&nbsp;<a href="#" onClick="ExportCmptPrs(<?php echo $_REQUEST['value']; ?>,<?php echo $_REQUEST['YI']; ?>,'<?php echo $_REQUEST['ee']; ?>')" style="color:#F9F900; font-size:12px;">Export Excel</a>
	  </td>
	  <td rowspan="2" class="th" style="width:50px;">PREVIOUS GROSS</td>
	  <td colspan="8" class="th">APPRAISER</td>
	  <td colspan="8" class="th">REVIEWER</td>
	  <td colspan="12" class="th">HOD</td>
	  <td colspan="12" class="th">HR</td>
	  <td colspan="17" class="th">SALARY</td>
	  <td colspan="13" class="th">ELIGIBILITY</td>
	 </tr>
	 <tr bgcolor="#7a6189">
	    <td class="th" style="width:40px;">&nbsp;</td>
		<td class="th" style="width:40px;">SN</td>
		<td class="th" style="width:40px;">EC</td>
		<td class="th" style="width:200px;">NAME</td>
		<td class="th" style="width:100px;">DEPARTMENT</td>
		<td class="th" style="width:40px;">GRADE</td>
		<td class="th" style="width:150px;">DESIGNATION</td>
		<td class="th" style="width:150px;">APPRAISER</td>
		<td class="th" style="width:150px;">REVIEWER</td>
		<td class="th" style="width:150px;">HOD</td>
		<td class="th" style="width:40px;">SCORE</td>
		<td class="th" style="width:40px;">RATING</td>	
		<td class="th" style="width:40px;">FORM</td>
		<td class="th" style="width:40px;">ATTACH</td>
		<?php /* A */ ?>
		<td class="th" style="width:40px;">SCORE</td>
		<td class="th" style="width:40px;">RATING</td>
		<td class="th" style="width:40px;">GRADE</td>
		<td class="th" style="width:150px;">DESIGNATION</td>
		<td class="th" style="width:150px;">SOFT SKILL</td>	
		<td class="th" style="width:150px;">TECH Skill</td>
		<td class="th" style="width:150px;">JUSTIFICATION</td>
		<td class="th" style="width:150px;">REMARK</td>
		<?php /* R */ ?>
		<td class="th" style="width:40px;">SCORE</td>
		<td class="th" style="width:40px;">RATING</td>
		<td class="th" style="width:40px;">GRADE</td>
		<td class="th" style="width:150px;">DESIGNATION</td>
		<td class="th" style="width:150px;">SOFT SKILL</td>	
		<td class="th" style="width:150px;">TECH Skill</td>
		<td class="th" style="width:150px;">JUSTIFICATION</td>
		<td class="th" style="width:150px;">REMARK</td>
		<?php /* HOD */ ?>
		<td class="th" style="width:40px;">SCORE</td>
		<td class="th" style="width:40px;">RATING</td>
		<td class="th" style="width:40px;">GRADE</td>
		<td class="th" style="width:150px;">DESIGNATION</td>
		
		<td class="th" style="width:60px;"><?php if($_REQUEST['YI']<=7){echo 'PIS';}else{echo 'Prop. CTC';}?></td>
		<td class="th" style="width:40px;"><?php if($_REQUEST['YI']<=7){echo '% PIS';}else{echo '% Prop. CTC';}?></td>	
		<td class="th" style="width:60px;"><?php if($_REQUEST['YI']<=7){echo 'PSC';}else{echo 'CTC Corr.';}?></td>	
		<td class="th" style="width:40px;"><?php if($_REQUEST['YI']<=7){echo '% PSC';}else{echo '% CTC Corr.';}?></td>
		<td class="th" style="width:60px;"><?php if($_REQUEST['YI']<=7){echo 'TISPM';}else{echo 'Total Inc.';}?></td>
		<td class="th" style="width:40px;"><?php if($_REQUEST['YI']<=7){echo '% TISPM';}else{echo '% Total Inc.';}?></td>
		<td class="th" style="width:60px;"><?php if($_REQUEST['YI']<=7){echo 'TPGSPM';}else{echo 'Total Prop. CTC';}?></td>
		
		<td class="th" style="width:150px;">REMARK</td>
		<?php /* HR */ ?>
   		<td class="th" style="width:40px;">SCORE</td>
		<td class="th" style="width:40px;">RATING</td>
		<td class="th" style="width:40px;">GRADE</td>
		<td class="th" style="width:150px;">DESIGNATION</td>
		<td class="th" style="width:150px;">DEPARTMENT</td>
		
		<td class="th" style="width:60px;"><?php if($_REQUEST['YI']<=7){echo 'PIS';}else{echo 'Prop. CTC';}?></td>
		<td class="th" style="width:40px;"><?php if($_REQUEST['YI']<=7){echo '% PIS';}else{echo '% Prop. CTC';}?></td>	
		<td class="th" style="width:60px;"><?php if($_REQUEST['YI']<=7){echo 'PSC';}else{echo 'CTC Corr.';}?></td>	
		<td class="th" style="width:40px;"><?php if($_REQUEST['YI']<=7){echo '% PSC';}else{echo '% CTC Corr.';}?></td>
		<td class="th" style="width:60px;"><?php if($_REQUEST['YI']<=7){echo 'TISPM';}else{echo 'Total Inc.';}?></td>
		<td class="th" style="width:40px;"><?php if($_REQUEST['YI']<=7){echo '% TISPM';}else{echo '% Total Inc.';}?></td>
		<td class="th" style="width:60px;"><?php if($_REQUEST['YI']<=7){echo 'TPGSPM';}else{echo 'Total Prop. CTC';}?></td>
		
		<?php /* SALARY */ ?>
   		<td class="th" style="width:60px;">BASIC</td>
		<td class="th" style="width:60px;">HRA</td>
		<td class="th" style="width:60px;">CA</td>
		<td class="th" style="width:60px;">SA</td>
		<td class="th" style="width:60px;">GROSS</td>
		<td class="th" style="width:60px;">GROSS(PAC)</td>
		<td class="th" style="width:60px;">PF</td>
		<td class="th" style="width:60px;">NET</td>
		<td class="th" style="width:60px;">LTA</td>
		<td class="th" style="width:60px;">MR</td>		 
		<td class="th" style="width:60px;">CEA</td>
		<td class="th" style="width:60px;">ANNUAL GROSS</td>
		<td class="th" style="width:60px;">PF CONTRI<sup>n</sup></td>
		<td class="th" style="width:60px;">BONUS</td>
		<td class="th" style="width:60px;">GRATUITY</td>		 
		<td class="th" style="width:60px;">MEDICLAIM</td>
		<td class="th" style="width:60px;">CTC</td>
		<?php /* ELIGIBILITY */ ?>
   		<td class="th" style="width:60px;">TWO WEEL</td>
		<td class="th" style="width:60px;">FOUR WEEL</td>
		<td class="th" style="width:60px;">DA IN_HQ</td>
		<td class="th" style="width:60px;">DA OUT_HQ</td>
		<td class="th" style="width:60px;">A GRADE</td>
		<td class="th" style="width:60px;">B GRADE</td>
		<td class="th" style="width:60px;">C GRADE</td>
		<td class="th" style="width:50px;">TRAVEL MODE</td>
		<td class="th" style="width:50px;">TRAVEL CLASS</b></td>
		<td class="th" style="width:60px;">MOBILE PM</td>		 
		<td class="th" style="width:60px;">HANDSET ELIG</td>
		<td class="th" style="width:60px;">MEDICLAIM INSU</td>
	</tr>
	</thead>
	</div>
	
<?php 
if($_REQUEST['ee']=='Dept')
{  
  if($_REQUEST['value']==0)
  { $sql=mysql_query("select EmpCode,Fname,Sname,Lname,hrm_employee_pms.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con); }
  else{ $sql=mysql_query("select EmpCode,Fname,Sname,Lname,hrm_employee_pms.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con); }
}
elseif($_REQUEST['ee']=='App')
{ $sql=mysql_query("select EmpCode,Fname,Sname,Lname,hrm_employee_pms.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con);
}
elseif($_REQUEST['ee']=='Rev')
{ $sql=mysql_query("select EmpCode,Fname,Sname,Lname,hrm_employee_pms.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Reviewer_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con);
}
elseif($_REQUEST['ee']=='Hod')
{ $sql=mysql_query("select EmpCode,Fname,Sname,Lname,hrm_employee_pms.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con);
}
 $Sno=1; while($res=mysql_fetch_array($sql)){ 
 $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['HR_Curr_DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
 $sqlDesig=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['HR_CurrDesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
 $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_CurrGradeId'], $con);  $resG=mysql_fetch_assoc($sqlG);
 $sqlHRDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['HR_DepartmentId'], $con); $resHRDept=mysql_fetch_assoc($sqlHRDept);
 $sqlE1=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'], $con); $resE1=mysql_fetch_assoc($sqlE1);
 $sqlE2=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'], $con); $resE2=mysql_fetch_assoc($sqlE2); 
 $sqlE3=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeID=".$res['HOD_EmployeeID'], $con); $resE3=mysql_fetch_assoc($sqlE3); 
 if($_REQUEST['YI']<=5){ $sqlC = mysql_query("SELECT hrm_employee_ctc.*,hrm_employee_eligibility.* from hrm_employee_ctc INNER JOIN hrm_employee_eligibility ON hrm_employee_ctc.EmployeeID=hrm_employee_eligibility.EmployeeID WHERE hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND hrm_employee_ctc.CtcYearId=".$_REQUEST['YI']." AND hrm_employee_ctc.CtcCreatedDate>='".date($FD."-10-01")."' AND hrm_employee_ctc.CtcCreatedDate<='".date($FD."-12-31")."' AND hrm_employee_eligibility.EligYearId=".$_REQUEST['YI']." AND hrm_employee_eligibility.EligCreatedDate>='".date($FD."-10-01")."' AND hrm_employee_eligibility.EligCreatedDate<='".date($FD."-12-31")."'", $con); }else{ $sqlC = mysql_query("SELECT hrm_employee_ctc.*,hrm_employee_eligibility.* from hrm_employee_ctc INNER JOIN hrm_employee_eligibility ON hrm_employee_ctc.EmployeeID=hrm_employee_eligibility.EmployeeID WHERE hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND hrm_employee_ctc.CtcYearId=".$_REQUEST['YI']." AND hrm_employee_ctc.CtcCreatedDate>='".date($TD."-01-01")."' AND hrm_employee_eligibility.EligYearId=".$_REQUEST['YI']." AND hrm_employee_eligibility.EligCreatedDate>='".date($TD."-01-01")."'", $con); }
$RowC=mysql_num_rows($sqlC); $ResC=mysql_fetch_assoc($sqlC);

 ?>	 <div class="tbody">
     <tbody> 
	 <tr bgcolor="#FFFFFF" id="TR<?php echo $Sno; ?>">
	    <td class="tdc"><input type="checkbox" id="Chk<?php echo $Sno; ?>" onClick="FucChk(<?php echo $Sno; ?>)" /></td>
		<td class="tdc"><?php echo $Sno; ?></td>
		<td class="tdc"><?php echo $res['EmpCode']; ?></td>
		<td class="tdl"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>	
		<td class="tdl"><?php echo $resDept['DepartmentCode']; ?></td>
		<td class="tdc"><?php echo $resG['GradeValue']; ?></td>
		<td class="tdl"><?php echo $resDesig['DesigCode']; ?></td>
		<td class="tdl"><?php echo $resE1['Fname'].' '.$resE1['Sname'].' '.$resE1['Lname']; ?></td>	
		<td class="tdl"><?php echo $resE2['Fname'].' '.$resE2['Sname'].' '.$resE2['Lname']; ?></td>
		<td class="tdl"><?php echo $resE3['Fname'].' '.$resE3['Sname'].' '.$resE3['Lname']; ?></td>	
		<td class="tdc"><?php echo $res['Emp_TotalFinalScore']; ?></td>
		<td class="tdc"><?php echo $res['Emp_TotalFinalRating']; ?></td>
		<td class="tdc"><a href="javascript:OpenWindow(<?php echo $res['EmployeeID'].','.$res['EmpPmsId'];?>)">Click</a></td>
		<td class="tdc"><?php $sqlR=mysql_query("select * from hrm_employee_pms_uploadfile where EmpPmsId=".$res['EmpPmsId']." AND EmployeeID=".$res['EmployeeID']." AND YearId=".$_REQUEST['YI'], $con); $no=1; $resR=mysql_num_rows($sqlR); if($resR>0){ ?><a href="#" onClick="UploadEmpfile(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>)">Yes</a><?php } if($resR==0){echo 'No'; }?></td>	
        <td class="tdr"><?php echo $res['EmpCurrGrossPM']; ?></td>
		<?php /* A */ ?>
		<td id="App1<?php echo $Sno; ?>" class="tdc" style="background-color:#79BCFF;"><?php echo $res['Appraiser_TotalFinalScore']; ?></td>
        <td id="App2<?php echo $Sno; ?>" class="tdc" style="background-color:#79BCFF;"><?php echo $res['Appraiser_TotalFinalRating']; ?></td>
<?php if($res['Appraiser_EmpDesignation']!=$res['HR_CurrDesigId']){ $sqlDesigA=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['Appraiser_EmpDesignation']." AND CompanyId=".$CompanyId, $con); $resDesigA=mysql_fetch_assoc($sqlDesigA); $DesigA=$resDesigA['DesigCode']; }else{$DesigA='';}
if($res['Appraiser_EmpGrade']!=$res['HR_CurrGradeId']){ $sqlGA=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Appraiser_EmpGrade']." AND CompanyId=".$CompanyId, $con); $resGA=mysql_fetch_assoc($sqlGA); $GradeA=$resGA['GradeValue']; }else{$GradeA='';} ?>	
        <td id="App3<?php echo $Sno; ?>" class="tdc" style="background-color:#79BCFF;"><?php echo $GradeA; ?></td>
        <td id="App4<?php echo $Sno; ?>" class="tdl" style="background-color:#79BCFF;"><?php echo $DesigA; ?></td> 
        <td class="tdl"><?php echo $res['Appraiser_SoftSkill_1'].', '.$res['Appraiser_SoftSkill_2']; ?></td>	
		<td class="tdl"><?php echo $res['Appraiser_TechSkill_1'].', '.$res['Appraiser_TechSkill_2']; ?></td>
        <td class="tdl"><?php echo $res['Appraiser_Justification']; ?></td>	
		<td class="tdl"><?php echo $res['Appraiser_Remark']; ?></td>
		<?php /* R */ ?>
		<td id="Rev1<?php echo $Sno; ?>" class="tdc" style="background-color:#FFFFBB;"><?php echo $res['Reviewer_TotalFinalScore']; ?></td>
		<td id="Rev2<?php echo $Sno; ?>" class="tdc" style="background-color:#FFFFBB;"><?php echo $res['Reviewer_TotalFinalRating']; ?></td>
<?php if($res['Reviewer_EmpDesignation']!=$res['HR_CurrDesigId']){ $sqlDesigR=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['Reviewer_EmpDesignation']." AND CompanyId=".$CompanyId, $con); $resDesigR=mysql_fetch_assoc($sqlDesigR); $DesigR=$resDesigR['DesigCode']; }else{$DesigR='';}
if($res['Reviewer_EmpGrade']!=$res['HR_CurrGradeId']){ $sqlGR=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Reviewer_EmpGrade']." AND CompanyId=".$CompanyId, $con); $resGR=mysql_fetch_assoc($sqlGR); $GradeR=$resGR['GradeValue']; }else{$GradeR='';} ?>	
		<td id="Rev3<?php echo $Sno; ?>" class="tdc"style="background-color:#FFFFBB;"><?php echo $GradeR; ?></td>
        <td id="Rev4<?php echo $Sno; ?>" class="tdl" style="background-color:#FFFFBB;"><?php echo $DesigR; ?></td> 	
        <td class="tdl"><?php echo $res['Reviewer_SoftSkill_1'].', '.$res['Reviewer_SoftSkill_2']; ?></td>		
		<td class="tdl"><?php echo $res['Reviewer_TechSkill_1'].', '.$res['Reviewer_TechSkill_2']; ?></td>
        <td class="tdl"><?php echo $res['Reviewer_Justification']; ?></td>	
		<td class="tdl"><?php echo $res['Reviewer_Remark']; ?></td>
		<?php /* H */ ?>
<td id="Hod1<?php echo $Sno;?>" class="tdc" style="background-color:#FFD5FF;"><?php echo $res['Hod_TotalFinalScore'];?></td>		<td id="Hod2<?php echo $Sno;?>" class="tdc" style="background-color:#FFD5FF;"><?php echo $res['Hod_TotalFinalRating'];?></td> 
<?php if($res['Hod_EmpDesignation']!=$res['HR_CurrDesigId']){ $sqlDesigH=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['Hod_EmpDesignation']." AND CompanyId=".$CompanyId, $con); $resDesigH=mysql_fetch_assoc($sqlDesigH); $DesigH=$resDesigH['DesigCode']; }else{$DesigH='';}
if($res['Hod_EmpGrade']!=$res['HR_CurrGradeId']){ $sqlGH=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Hod_EmpGrade']." AND CompanyId=".$CompanyId, $con); $resGH=mysql_fetch_assoc($sqlGH); $GradeH=$resGH['GradeValue']; }else{$GradeH='';} ?>	
		<td id="Hod3<?php echo $Sno; ?>" class="tdc" style="background-color:#FFD5FF;"><?php echo $GradeH; ?></td>
        <td id="Hod4<?php echo $Sno; ?>" class="tdl" style="background-color:#FFD5FF;"><?php echo $DesigH; ?></td> 
		
		
		<td class="tdr"><?php if($_REQUEST['YI']<=7){echo $res['Hod_ProIncSalary'];}else{echo $res['Hod_ProIncCTC'];}?></td>
		<td class="tdc"><?php if($_REQUEST['YI']<=7){echo $res['Hod_Percent_ProIncSalary'];}else{echo $res['Hod_Percent_ProIncCTC'];}?></td>
		<td class="tdr"><?php if($_REQUEST['YI']<=7){echo $res['Hod_ProCorrSalary'];}else{echo $res['Hod_ProCorrCTC'];}?></td>
        <td class="tdc"><?php if($_REQUEST['YI']<=7){echo $res['Hod_Percent_ProCorrSalary'];}else{echo $res['Hod_Percent_ProCorrCTC'];}?></td> 		
        <td class="tdr"><?php if($_REQUEST['YI']<=7){echo $res['Hod_IncNetMonthalySalary'];}else{echo $res['Hod_IncNetCTC'];}?></td>
        <td class="tdc"><?php if($_REQUEST['YI']<=7){echo $res['Hod_Percent_IncNetMonthalySalary'];}else{echo $res['Hod_Percent_IncNetCTC'];}?></td>
		<td class="tdc"><?php if($_REQUEST['YI']<=7){echo $res['Hod_GrossMonthlySalary'];}else{echo $res['Hod_Proposed_ActualCTC'];}?></td>  
		
		<td class="tdl"><?php echo $res['HodRemark']; ?></td>		
		<?php /* HR */ ?>		
		<td class="tdc"><?php echo $res['HR_Score']; ?></td> 
		<td class="tdc"><?php echo $res['HR_Rating']; ?></td> 
<?php if($res['HR_DesigId']!=$res['HR_CurrDesigId']){ $sqlDesigH=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['HR_DesigId']." AND CompanyId=".$CompanyId, $con); $resDesigH=mysql_fetch_assoc($sqlDesigH); $DesigH=$resDesigH['DesigCode']; }else{$DesigH='';}
if($res['HR_GradeId']!=$res['HR_CurrGradeId']){ $sqlGH=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_GradeId']." AND CompanyId=".$CompanyId, $con); $resGH=mysql_fetch_assoc($sqlGH); $GradeH=$resGH['GradeValue']; }else{$GradeH='';} ?>	
		<td class="tdc"><?php echo $GradeH; ?></td>
        <td class="tdl"><?php echo $DesigH; ?></td> 	
		<td class="tdl"><?php echo $resDept['DepartmentCode']; ?></td>	
		
		<td class="tdr"><?php if($_REQUEST['YI']<=7){echo $res['HR_ProIncSalary'];}else{echo $res['HR_ProIncCTC'];}?></td>
		<td class="tdc"><?php if($_REQUEST['YI']<=7){echo $res['HR_Percent_ProIncSalary'];}else{echo $res['HR_Percent_ProIncCTC'];}?></td>
		<td class="tdr"><?php if($_REQUEST['YI']<=7){echo $res['HR_ProCorrSalary'];}else{echo $res['HR_ProCorrCTC'];}?></td>
        <td class="tdc"><?php if($_REQUEST['YI']<=7){echo $res['HR_Percent_ProCorrSalary'];}else{echo $res['HR_Percent_ProCorrCTC'];}?></td> 		
        <td class="tdr"><?php if($_REQUEST['YI']<=7){echo $res['HR_IncNetMonthalySalary'];}else{echo $res['HR_IncNetCTC'];}?></td>
        <td class="tdc"><?php if($_REQUEST['YI']<=7){echo $res['HR_Percent_IncNetMonthalySalary'];}else{echo $res['HR_Percent_IncNetCTC'];}?></td>
		<td class="tdc"><?php if($_REQUEST['YI']<=7){echo $res['HR_GrossMonthlySalary'];}else{echo $res['HR_Proposed_ActualCTC'];}?></td> 
		
			
		<?php /* SALARY */ ?>
		<td class="tdr"><?php echo $ResC['BAS_Value']; ?>&nbsp;</td>
	    <td class="tdr"><?php echo $ResC['HRA_Value']; ?>&nbsp;</td>
	    <td class="tdr"><?php echo $ResC['CONV_Value']; ?>&nbsp;</td>
	    <td class="tdr"><?php echo $ResC['SPECIAL_ALL_Value']; ?>&nbsp;</td>
	    <td class="tdr"><?php echo $ResC['Tot_GrossMonth']; ?>&nbsp;</td>
	    <td class="tdr"><?php echo $ResC['GrossSalary_PostAnualComponent_Value']; ?>&nbsp;</td>
	    <td class="tdr"><?php echo $ResC['PF_Employee_Contri_Value']; ?>&nbsp;</td>
	    <td class="tdr"><?php echo $ResC['NetMonthSalary_Value']; ?>&nbsp;</td>
	    <td class="tdr"><?php echo $ResC['LTA_Value']; ?>&nbsp;</td>
	    <td class="tdr"><?php echo $ResC['MED_REM_Value']; ?>&nbsp;</td>
	    <td class="tdr"><?php echo $ResC['CHILD_EDU_ALL_Value']; ?>&nbsp;</td>
	    <td class="tdr"><?php echo $ResC['Tot_Gross_Annual']; ?>&nbsp;</td>
	    <td class="tdr"><?php echo $ResC['PF_Employer_Contri_Annul']; ?>&nbsp;</td>
	    <td class="tdr"><?php echo $ResC['BONUS_Value']; ?>&nbsp;</td>
	    <td class="tdr"><?php echo $ResC['GRATUITY_Value']; ?>&nbsp;</td>
	    <td class="tdr"><?php echo $ResC['Mediclaim_Policy']; ?>&nbsp;</td>
	    <td class="tdr"><?php echo $ResC['Tot_CTC']; ?>&nbsp;</td>
		<?php /* Eligibility */ ?>
		<td class="tdr"><?php if($ResC['Travel_TwoWeeKM']>0){echo $ResC['Travel_TwoWeeKM'];}else{echo 'NA';}?>&nbsp;</td>	
	    <td class="tdr"><?php if($ResC['Travel_FourWeeKM']>0){ echo $ResC['Travel_FourWeeKM'];}else{echo 'NA';}?>&nbsp;</td>
	    <td class="tdr"><?php if($ResC['DA_Outside_HqSal']>0){echo $ResC['DA_Outside_HqSal'];}else{echo 'NA';} ?>&nbsp;</td>
	    <td class="tdr"><?php if($ResC['DA_Outside_Hq']>0){echo $ResC['DA_Outside_Hq'];} else {echo 'NA';} ?>&nbsp;</td>
	    <td class="tdr"><?php echo $ResC['Lodging_CategoryA']; ?>&nbsp;</td>
	    <td class="tdr"><?php echo $ResC['Lodging_CategoryB']; ?>&nbsp;</td>
	    <td class="tdr"><?php echo $ResC['Lodging_CategoryC']; ?>&nbsp;</td>
	    <td class="tdc"><?php if($ResC['Mode_Travel_Outside_Hq']!=''){echo $ResC['Mode_Travel_Outside_Hq'];}else{echo 'NA';} ?>&nbsp;</td>
	    <td class="tdc"><?php if($ResC['TravelClass_Outside_Hq']!=''){echo $ResC['TravelClass_Outside_Hq'];}else{echo 'NA';} ?>&nbsp;</td>
	    <td class="tdr"><?php if($ResC['Mobile_Exp_Rem_Rs']>0){echo $ResC['Mobile_Exp_Rem_Rs'];}else{echo 'NA';}?>&nbsp;</td>
	    <td class="tdr"><?php if($ResC['Mobile_Hand_Elig_Rs']>0){echo $ResC['Mobile_Hand_Elig_Rs'];} else {echo 'NA';} ?>&nbsp;</td>
	    <td class="tdr"><?php echo $ResC['Health_Insurance']; ?>&nbsp;</td>
			
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
<?php //*******************************************************************************?>
<?php //***********END*****END*****END******END******END***********************************?>
<?php //*****************************************************************************?>
	  </td>
	</tr>
	  </table>
 </td>
</tr>
</table>
</body>
</html>