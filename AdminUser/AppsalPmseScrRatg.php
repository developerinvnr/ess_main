<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_REQUEST['YI']==1){$Y=2012; $Y2=2013;}elseif($_REQUEST['YI']==2){$Y=2013; $Y2=2014;}elseif($_REQUEST['YI']==3){$Y=2014; $Y2=2015;}elseif($_REQUEST['YI']==4){$Y=2015; $Y2=2016;}elseif($_REQUEST['YI']==5){$Y=2016; $Y2=2017;}elseif($_REQUEST['YI']==6){$Y=2017; $Y2=2018;}elseif($_REQUEST['YI']==7){$Y=2018; $Y2=2019;}elseif($_REQUEST['YI']==8){$Y=2019; $Y2=2020;}elseif($_REQUEST['YI']==9){$Y=2020; $Y2=2021;}elseif($_REQUEST['YI']==10){$Y=2021; $Y2=2022;}elseif($_REQUEST['YI']==11){$Y=2022; $Y2=2023;}elseif($_REQUEST['YI']==12){$Y=2023; $Y2=2024;}elseif($_REQUEST['YI']==13){$Y=2024; $Y2=2025;}elseif($_REQUEST['YI']==14){$Y=2025; $Y2=2026;}elseif($_REQUEST['YI']==15){$Y=2026; $Y2=2027;}
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
function SelectYear(v){window.location='AppsalPmseScrRatg.php?YI='+v;}
function SelectEScore(v,yi,e)
{ if(e=='d'){var ee='Dept';}else if(e=='a'){var ee='App';}else if(e=='r'){var ee='Rev';}else if(e=='m'){var ee='Hod';}else if(e=='h'){var ee='Rev2';} 
  window.location='AppsalPmseScrRatg.php?action=EmpScore&ee='+ee+'&value='+v+'&YI='+yi;}

function OpenWindow(v,v1)
{window.open("HRScoreHistory.php?a="+v+"&b="+v1,"AppraisalForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=1100,height=650");}
    
function PrintScore(v,yi,ee)
{var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;
 window.open("PrintPMSScore.php?action=Score&value="+v+"&c="+ComId+"&YI="+yi+"&ee="+ee,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=50,height=50");}

function ExportScore(v,yi,ee)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;   
  window.open("ExportPmsScore.php?action=ScoreExport&value="+v+"&c="+ComId+"&YI="+yi+"&ee="+ee,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}

function UploadEmpfile(p,e)
{y=document.getElementById("YId").value; 
 window.open("CheckUploadAppFile.php?action=up&P="+p+"&E="+e+"&Y="+y,"UploadFile","menubar=no,scrollbars=yes,resizable='no',width=600,height=400");} 
 
function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#9BEF47'; document.getElementById("Emp1"+sn).style.background='#9BEF47';
  document.getElementById("App1"+sn).style.background='#9BEF47'; document.getElementById("Rev1"+sn).style.background='#9BEF47'; document.getElementById("Hod1"+sn).style.background='#9BEF47'; document.getElementById("HR1"+sn).style.background='#9BEF47'; document.getElementById("Emp2"+sn).style.background='#9BEF47'; document.getElementById("App2"+sn).style.background='#9BEF47'; document.getElementById("Rev2"+sn).style.background='#9BEF47'; document.getElementById("Hod2"+sn).style.background='#9BEF47'; document.getElementById("HR2"+sn).style.background='#9BEF47'; document.getElementById("Emp3"+sn).style.background='#9BEF47'; document.getElementById("App3"+sn).style.background='#9BEF47'; document.getElementById("Rev3"+sn).style.background='#9BEF47'; document.getElementById("Hod3"+sn).style.background='#9BEF47'; document.getElementById("HR3"+sn).style.background='#9BEF47'; document.getElementById("Emp4"+sn).style.background='#9BEF47'; document.getElementById("App4"+sn).style.background='#9BEF47'; document.getElementById("Rev4"+sn).style.background='#9BEF47'; document.getElementById("Hod4"+sn).style.background='#9BEF47'; document.getElementById("HR4"+sn).style.background='#9BEF47'; }

  else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; document.getElementById("Emp1"+sn).style.background='#ECD9FF'; document.getElementById("App1"+sn).style.background='#79BCFF'; document.getElementById("Rev1"+sn).style.background='#FFFFBB'; document.getElementById("Hod1"+sn).style.background='#FFD5FF'; document.getElementById("HR1"+sn).style.background='#D5FFD5'; document.getElementById("Emp2"+sn).style.background='#ECD9FF'; document.getElementById("App2"+sn).style.background='#79BCFF'; document.getElementById("Rev2"+sn).style.background='#FFFFBB'; document.getElementById("Hod2"+sn).style.background='#FFD5FF'; document.getElementById("HR2"+sn).style.background='#D5FFD5'; document.getElementById("Emp3"+sn).style.background='#ECD9FF'; document.getElementById("App3"+sn).style.background='#79BCFF'; document.getElementById("Rev3"+sn).style.background='#FFFFBB'; document.getElementById("Hod3"+sn).style.background='#FFD5FF'; document.getElementById("HR3"+sn).style.background='#D5FFD5';  document.getElementById("Emp4"+sn).style.background='#ECD9FF'; document.getElementById("App4"+sn).style.background='#79BCFF'; document.getElementById("Rev4"+sn).style.background='#FFFFBB'; document.getElementById("Hod4"+sn).style.background='#FFD5FF'; document.getElementById("HR4"+sn).style.background='#D5FFD5'; }
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
<?php //****************************************************************************************?>
<?php //*******************START*****START*****START******START******START********************?>
<?php //*******************************************************************************?>
<table border="0" style="margin-top:0px;width:100%;">
	<tr>
		<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true AND ($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1)) { ?>
		<td align="" style="width:100%;" valign="top">
		   <table border="0" style="width:100%;">
       		 <tr><td colspan="2">
			       <table border="0">
                     <tr>
					  <td colspan="12" align="left" class="heading">Employee Score/ Rating &nbsp;<span id="ReturnValue">&nbsp;</span></td>
					  <td>
				    <table border="0">
                    <tr>
<?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>	     
<td class="td1" style="font-size:14px;width:120px;font-family:Times New Roman;" ><select class="tdsel" style="background-color:#DDFFBB;width:120px;" name="YearID" id="YearID" onChange="SelectYear(this.value)"><?php if($_REQUEST['YI']!=''){ $SqlY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI'], $con); $ResY=mysql_fetch_array($SqlY); ?><option value="<?php echo $ResY['YearId']; ?>"><?php echo date("Y",strtotime($ResY['FromDate'])).'-'.date("Y",strtotime($ResY['ToDate'])); if($ResY['YearId']>5){ echo ' - Y'; }?></option><?php }else{ ?><option value="" selected>Year</option><?php } $SqlYear=mysql_query("select y.YearId,FromDate,ToDate from hrm_employee_pms p inner join hrm_year y on p.AssessmentYear=y.YearId where CompanyId=".$CompanyId." group by AssessmentYear order by AssessmentYear DESC", $con); while($ResYear=mysql_fetch_array($SqlYear)) { ?><option value="<?php echo $ResYear['YearId']; ?>"><?php echo date("Y",strtotime($ResYear['FromDate'])).'-'.date("Y",strtotime($ResYear['ToDate'])); if($ResYear['YearId']>5){ echo ' - Y'; } ?></option><?php } ?></select></td>

<td class="td1" style="font-size:11px; width:150px;" align="center">
<select style="font-size:12px; width:148px; height:20px; background-color:#DDFFBB;" name="DeptScore" id="DeptScore" onChange="SelectEScore(this.value,<?php echo $_REQUEST['YI']; ?>,'d')"><option value="" style="margin-left:0px;" selected>SELECT DEPARTMENT</option>
<?php 
if($_REQUEST['YI']<=12){ $SqlDept=mysql_query("select DepartmentId as id, DepartmentName as department_name from hrm_department where DeptStatus='A' and CompanyId=".$CompanyId." order by DepartmentName", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['id']; ?>" <?php if($ResDept['id']==$_REQUEST['value']){echo 'selected';} ?>><?php echo '&nbsp;'.$ResDept['department_name'];?></option><?php } ?>
<?php }else{ $SqlDept=mysql_query("select * from core_departments where is_active=1 order by department_name", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['id']; ?>" <?php if($ResDept['id']==$_REQUEST['value']){echo 'selected';} ?>><?php echo '&nbsp;'.$ResDept['department_name'];?></option><?php } ?>
<?php } ?>
<option value="0">&nbsp;All</option>
</select>


</td>

<td class="td1" style="font-size:11px; width:150px;" align="center"><select style="font-size:12px; width:148px; height:20px; background-color:#DDFFBB;" name="AppScore" id="AppScore" onChange="SelectEScore(this.value,<?php echo $_REQUEST['YI']; ?>,'a')"><option value="" style="margin-left:0px;" selected>SELECT APPRAISER</option><?php $SqlHod=mysql_query("SELECT Appraiser_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.Appraiser_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee.EmpStatus='A' GROUP BY Appraiser_EmployeeID ORDER BY Fname ASC", $con); while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['Appraiser_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select></td>

<td class="td1" style="font-size:11px; width:150px;" align="center"><select style="font-size:12px; width:148px; height:20px; background-color:#DDFFBB;" name="RevScore" id="RevScore" onChange="SelectEScore(this.value,<?php echo $_REQUEST['YI']; ?>,'r')"><option value="" style="margin-left:0px;" selected>SELECT REVIEWER</option><?php $SqlHod=mysql_query("SELECT Reviewer_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.Reviewer_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee.EmpStatus='A' GROUP BY Reviewer_EmployeeID ORDER BY Fname ASC", $con); while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['Reviewer_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select></td>

<td class="td1" style="font-size:11px; width:150px;" align="center"><select style="font-size:12px; width:148px; height:20px; background-color:#DDFFBB;" name="HodScore" id="HodScore" onChange="SelectEScore(this.value,<?php echo $_REQUEST['YI']; ?>,'h')"><option value="" style="margin-left:0px;" selected>SELECT HOD</option><?php $SqlHod=mysql_query("SELECT Rev2_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.Rev2_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee.EmpStatus='A' AND `Emp_KRASave`='Y' GROUP BY Rev2_EmployeeID ORDER BY Fname ASC", $con); while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['Rev2_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select></td>

<td class="td1" style="font-size:11px; width:150px;" align="center"><select style="font-size:12px; width:148px; height:20px; background-color:#DDFFBB;" name="MScore" id="MScore" onChange="SelectEScore(this.value,<?php echo $_REQUEST['YI']; ?>,'m')"><option value="" style="margin-left:0px;" selected>SELECT Management</option><?php $Sql2Hod=mysql_query("SELECT HOD_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.HOD_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND `Emp_KRASave`='Y' GROUP BY HOD_EmployeeID ORDER BY Fname ASC", $con); while($Res2Hod=mysql_fetch_array($Sql2Hod)) { $E2nameH=$Res2Hod['Fname'].' '.$Res2Hod['Sname'].' '.$Res2Hod['Lname']; ?><option value="<?php echo $Res2Hod['HOD_EmployeeID']; ?>"><?php echo '&nbsp;'.$E2nameH; ?></option><?php } ?></select></td>

                     </tr>
				   </table>					
				   </td>                           
<?php } ?>					 
		           </tr>
                  </table>
				</td>
			 </tr>
<?php //--------------------------------------- Display Record -------------------- ?>
<?php if($_REQUEST['action']=='EmpScore') { 
 
/*if($_REQUEST['ee']=='Dept')
{ $name='Department Wise'; if($_REQUEST['value']!=0){ $sqlA=mysql_query("select department_name as DepartmentName from core_departments where id=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['DepartmentName']; }else{$name2='All Department';}
}*/
if($_REQUEST['ee']=='App')
{ $name='Apraiser Wise'; $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname'];
}
elseif($_REQUEST['ee']=='Rev')
{ $name='Reviewer Wise'; $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname'];
}
elseif($_REQUEST['ee']=='Hod')
{ $name='HOD Wise'; $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname'];
}
elseif($_REQUEST['ee']=='Rev2')
{ $name='HOD Wise'; $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname'];
}
?>

<tr>
 <td>
   <table border="1" id="table1" cellspacing="0" style="width:2000px;">
     <tr style="background-color:#7a6189;">
	 <div class="thead">
	 <thead>
  <td colspan="12" valign="top" style="background-color:#0069D2;font-size:14px;color:#FFFFFF;font-family:Times New Roman; font-weight:bold;">&nbsp;Score/ Rating <?php echo $name; ?> : &nbsp;&nbsp;(&nbsp;<?php echo $name2; ?>&nbsp;)&nbsp;&nbsp;&nbsp;<a href="#" onClick="ExportScore(<?php echo $_REQUEST['value']; ?>,<?php echo $_REQUEST['YI']; ?>,'<?php echo $_REQUEST['ee']; ?>')" style="color:#F9F900; font-size:12px;">Export Excel</a>
	  </td>
	  <?php /*?><a href="#" onClick="PrintScore(<?php echo $_REQUEST['value']; ?>,<?php echo $_REQUEST['YI']; ?>,'<?php echo $_REQUEST['ee']; ?>')" style="color:#F9F900; font-size:12px;">Print</a><?php */?>
	  
	  <td colspan="4" class="th">APPRAISER</td>
	  <td colspan="4" class="th">REVIEWER</td>
	  <td colspan="4" class="th">HOD</td>
	  <td colspan="4" class="th">HR</td>
	 </tr>
	 <tr bgcolor="#7a6189">
		<td class="th" style="width:30px;">&nbsp;</td>
		<td class="th" style="width:30px;">Sn</td>
		<td class="th" style="width:50px;">EC</td>
		<td class="th" style="width:200px;">Name</td>
		<td class="th" style="width:100px;">Department</td>
		<!--<td class="th" style="width:5%;"><b>State</b></td>	
		<td class="th" style="width:5%;">HQ</b></td>-->
		<td class="th" style="width:150px;">Designation</td>	
		<td class="th" style="width:40px;">Grade</td>
		<td class="th" style="width:40px;">Score</td>
		<td class="th" style="width:40px;">Rating</td>
		<td class="th" style="width:40px;">Form</td>
		<td class="th" style="width:40px;">Attach</td>
        <td class="th" style="width:40px;">KRA xls</td>
		
   		<td class="th" style="width:40px;">Score</td>
		<td class="th" style="width:40px;">Rating</td>
		<td class="th" style="width:40px;">Grade</td>
		<td class="th" style="width:150px;">Desig</td>
   		<td class="th" style="width:40px;">Score</td>
		<td class="th" style="width:40px;">Rating</td>
		<td class="th" style="width:40px;">Grade</td>
		<td class="th" style="width:150px;">Desig</td>
		<td class="th" style="width:40px;">Score</td>
		<td class="th" style="width:40px;">Rating</td>
		<td class="th" style="width:40px;">Grade</td>
		<td class="th" style="width:150px;">Desig</td>
		<td class="th" style="width:40px;">Score</td>		 
		<td class="th" style="width:40px;">Rating</td>
		<td class="th" style="width:40px;">Grade</td>
		<td class="th" style="width:150px;">Desig</td>

	</tr>
	</thead>
	</thead>
<?php 
if($_REQUEST['YI']<=12)
{
$qry="e.EmployeeID, EmpCode, Fname, Sname, Lname, g.HqId, g.TerrId, DepartmentName as department_name, DesigName as designation_name, GradeValue as grade_name, StateName as state_name, HqName as city_village_name, territory_name, EmpPmsId, Kra_filename, Kra_ext, Emp_TotalFinalScore, Emp_TotalFinalRating, Appraiser_TotalFinalScore, Appraiser_TotalFinalRating, Appraiser_EmpDesignation, Appraiser_EmpGrade, Reviewer_EmpDesignation, Reviewer_EmpGrade, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade, HR_DesigId, HR_GradeId, HR_CurrDesigId, HR_CurrGradeId, HR_Curr_DepartmentId_old, HR_Curr_DepartmentId, HR_Score, HR_Rating from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID
  left join hrm_department dept on p.HR_Curr_DepartmentId_old=dept.DepartmentId
  left join hrm_designation desig on p.HR_CurrDesigId=desig.DesigId
  left join hrm_grade gr on p.HR_CurrGradeId=gr.GradeId
  left join hrm_headquater vlg on g.HqId=vlg.HqId
  left join core_territory Tr on g.TerrId=Tr.id
  left join hrm_state st on g.CostCenter=st.StateId";
  
  $cond="e.CompanyId=".$CompanyId." AND e.EmpStatus='A' AND g.DateJoining<='".$YYear."-06-30' AND p.AssessmentYear=".$_REQUEST['YI']."";
  
}
else
{
 $qry="e.EmployeeID, EmpCode, Fname, Sname, Lname, g.HqId, g.TerrId, department_name, designation_name, grade_name, state_name, city_village_name, territory_name, EmpPmsId, Kra_filename, Kra_ext, Emp_TotalFinalScore, Emp_TotalFinalRating, Appraiser_TotalFinalScore, Appraiser_TotalFinalRating, Appraiser_EmpDesignation, Appraiser_EmpGrade, Reviewer_EmpDesignation, Reviewer_EmpGrade, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade, HR_DesigId, HR_GradeId, HR_CurrDesigId, HR_CurrGradeId, HR_Curr_DepartmentId, HR_Score, HR_Rating from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID
  left join core_departments dept on p.HR_Curr_DepartmentId=dept.id
  left join core_designation desig on p.HR_CurrDesigId=desig.id
  left join core_grades gr on p.HR_CurrGradeId=gr.id
  left join core_city_village_by_state vlg on g.HqId=vlg.id
  left join core_territory Tr on g.TerrId=Tr.id
  left join core_states st on g.CostCenter=st.id";   
  
  $cond="e.CompanyId=".$CompanyId." AND e.EmpStatus='A' AND g.DateJoining<='".$YYear."-09-30' AND p.AssessmentYear=".$_REQUEST['YI']."";
}
if($_REQUEST['ee']=='Dept')
{  
  if($_REQUEST['YI']<=12){  $cdept="p.HR_Curr_DepartmentId_old=".$_REQUEST['value'].""; }
  else{ $cdept="p.HR_Curr_DepartmentId=".$_REQUEST['value'].""; }
  
  if($_REQUEST['value']==0)
  { $sql=mysql_query("select ".$qry." where ".$cond." AND p.Appraiser_EmployeeID!=0 order by e.ECode ASC", $con); }
  else{$sql=mysql_query("select ".$qry." where ".$cond." AND p.Appraiser_EmployeeID!=0 AND ".$cdept." order by e.ECode ASC", $con); }
}
elseif($_REQUEST['ee']=='App')
{ $sql=mysql_query("select ".$qry." where ".$cond." AND p.Appraiser_EmployeeID=".$_REQUEST['value']." AND p.Appraiser_EmployeeID!=0 order by e.ECode ASC", $con); 
}
elseif($_REQUEST['ee']=='Rev')
{ $sql=mysql_query("select ".$qry." where ".$cond." AND p.Reviewer_EmployeeID=".$_REQUEST['value']." AND p.Appraiser_EmployeeID!=0 order by e.ECode ASC", $con); 
}
elseif($_REQUEST['ee']=='Hod')
{ $sql=mysql_query("select ".$qry." where ".$cond." AND p.HOD_EmployeeID=".$_REQUEST['value']." AND p.Appraiser_EmployeeID!=0 order by e.ECode ASC", $con); 
}
elseif($_REQUEST['ee']=='Rev2')
{ $sql=mysql_query("select ".$qry." where ".$cond." AND p.Rev2_EmployeeID=".$_REQUEST['value']." AND p.Appraiser_EmployeeID!=0 order by e.ECode ASC", $con); 
}
 $Sno=1; while($res=mysql_fetch_array($sql)){  
 
 ?>	   
     <div class="tbody">
	 <tbody>
	 <tr bgcolor="#FFFFFF" id="TR<?php echo $Sno;?>">
		<td class="tdc"><input type="checkbox" id="Chk<?php echo $Sno; ?>" onClick="FucChk(<?php echo $Sno; ?>)" /></td>
		<td class="tdc"><?php echo $Sno; ?></td>
		<td class="tdc"><?php echo $res['EmpCode']; ?></td>
		<td class="tdl"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname'];?></td>	
		<td class="tdl"><?php echo $res['department_name']; ?></td>
		<?php /*?><td class="tdl"><?php echo $res['state_name']; ?></td>
		<?php if($res['TerrId']>0){$Hq=$res['territory_name'];}else{$Hq=$res['city_village_name']; } ?>
		<td class="tdl"><?php echo $Hq; ?></td><?php */?>
		<td class="tdl"><?php echo $res['designation_name']; ?></td>
	    <td class="tdc"><?php echo $res['grade_name']; ?></td>
		<td id="Emp1<?php echo $Sno; ?>" class="tdc" bgcolor="#ECD9FF"><?php echo $res['Emp_TotalFinalScore']; ?></td>
		<td id="Emp2<?php echo $Sno; ?>" class="tdc" bgcolor="#ECD9FF"><?php echo $res['Emp_TotalFinalRating']; ?></td>
		<td id="Emp3<?php echo $Sno; ?>" class="tdc" bgcolor="#ECD9FF"><a href="javascript:OpenWindow(<?php echo $res['EmployeeID'].','.$res['EmpPmsId']; ?>)">Click</a></td>
		<td id="Emp4<?php echo $Sno; ?>" class="tdc" bgcolor="#ECD9FF"><?php $sqlR=mysql_query("select * from hrm_employee_pms_uploadfile where EmpPmsId=".$res['EmpPmsId']." AND EmployeeID=".$res['EmployeeID']." AND YearId=".$_REQUEST['YI'], $con); $no=1; $resR=mysql_num_rows($sqlR); if($resR>0){ ?><a href="#" onClick="UploadEmpfile(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>)">Yes</a><?php } if($resR==0){echo 'No'; }?></td>	

<script>
function UploadEmpKrafile(p,e,file,ext)
{var y=document.getElementById("YId").value; 
 window.open("CheckUploadKraXlsFile.php?action=upkraxls&P="+p+"&E="+e+"&Y="+y+"&file="+file+"&ext="+ext,"UploadFile","menubar=no,scrollbars=yes,resizable='no',width=600,height=400");}
</script>
<td id="Emp5<?php echo $Sno; ?>" class="tdc" bgcolor="#ECD9FF"><?php if($res['Kra_filename']!='' AND $res['Kra_ext']!=''){ ?><a href="#" onClick="UploadEmpKrafile(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>,'<?php echo $res['Kra_filename']; ?>','<?php echo $res['Kra_ext']; ?>')">Yes</a><?php }?></td>


        <td id="App1<?php echo $Sno; ?>" class="tdc" bgcolor="#79BCFF"><?php echo $res['Appraiser_TotalFinalScore']; ?></td>
        <td id="App2<?php echo $Sno; ?>" class="tdc" bgcolor="#79BCFF"><?php echo $res['Appraiser_TotalFinalRating']; ?></td>
        
<?php if($_REQUEST['YI']<=12)
{ $condDesig="DesigName,DesigCode from hrm_designation where DesigId"; 
  $condGrade="GradeValue from hrm_grade where GradeId";    
}
else
{ 
$condDesig="designation_name as DesigName,designation_code as DesigCode from core_designation where id";
$condGrade="grade_name as GradeValue from core_grades where id"; 
}  ?>        
<?php if($res['Appraiser_EmpDesignation']!=$res['HR_CurrDesigId']){ $sqlDesigA=mysql_query("select ".$condDesig."=".$res['Appraiser_EmpDesignation'], $con); $resDesigA=mysql_fetch_assoc($sqlDesigA); if($resDesigA['DesigName']!=$res['designation_name']){$DesigA=$resDesigA['DesigName'];}else{$DesigA='';}  }else{$DesigA='';}
if($res['Appraiser_EmpGrade']!=$res['HR_CurrGradeId']){ $sqlGA=mysql_query("select ".$condGrade."=".$res['Appraiser_EmpGrade'], $con); $resGA=mysql_fetch_assoc($sqlGA); $GradeA=$resGA['GradeValue']; }else{$GradeA='';} ?>	
        <td id="App3<?php echo $Sno; ?>" class="tdc" bgcolor="#79BCFF"><?php echo $GradeA; ?></td>
        <td id="App4<?php echo $Sno; ?>" class="tdl" bgcolor="#79BCFF"><?php echo $DesigA; ?></td> 
		
		<td id="Rev1<?php echo $Sno; ?>" class="tdc" bgcolor="#FFFFBB"><?php echo $res['Reviewer_TotalFinalScore']; ?></td>
		<td id="Rev2<?php echo $Sno; ?>" class="tdc" bgcolor="#FFFFBB"><?php echo $res['Reviewer_TotalFinalRating']; ?></td>
<?php if($res['Reviewer_EmpDesignation']!=$res['HR_CurrDesigId']){ $sqlDesigR=mysql_query("select ".$condDesig."=".$res['Reviewer_EmpDesignation'], $con); $resDesigR=mysql_fetch_assoc($sqlDesigR); if($resDesigR['DesigName']!=$res['designation_name']){$DesigR=$resDesigR['DesigName'];}else{$DesigR='';} }else{$DesigR='';}
if($res['Reviewer_EmpGrade']!=$res['HR_CurrGradeId']){ $sqlGR=mysql_query("select ".$condGrade."=".$res['Reviewer_EmpGrade'], $con); $resGR=mysql_fetch_assoc($sqlGR); $GradeR=$resGR['GradeValue']; }else{$GradeR='';} ?>	
		<td id="Rev3<?php echo $Sno; ?>" class="tdc" bgcolor="#FFFFBB"><?php echo $GradeR; ?></td>
        <td id="Rev4<?php echo $Sno; ?>" class="tdl" bgcolor="#FFFFBB"><?php echo $DesigR; ?></td> 		
		
		<td id="Hod1<?php echo $Sno; ?>" class="tdc" bgcolor="#FFD5FF"><?php echo $res['Hod_TotalFinalScore']; ?></td> 
		<td id="Hod2<?php echo $Sno; ?>" class="tdc" bgcolor="#FFD5FF"><?php echo $res['Hod_TotalFinalRating']; ?></td> 
<?php if($res['Hod_EmpDesignation']!=$res['HR_CurrDesigId']){ $sqlDesigH=mysql_query("select ".$condDesig."=".$res['Hod_EmpDesignation'], $con); $resDesigH=mysql_fetch_assoc($sqlDesigH); if($resDesigH['DesigName']!=$res['designation_name']){$DesigH=$resDesigH['DesigName'];}else{$DesigH='';} }else{$DesigH='';}
if($res['Hod_EmpGrade']!=$res['HR_CurrGradeId']){ $sqlGH=mysql_query("select ".$condGrade."=".$res['Hod_EmpGrade'], $con); $resGH=mysql_fetch_assoc($sqlGH); $GradeH=$resGH['GradeValue']; }else{$GradeH='';} ?>	
		<td id="Hod3<?php echo $Sno; ?>" class="tdc" bgcolor="#FFD5FF"><?php echo $GradeH; ?></td>
        <td id="Hod4<?php echo $Sno; ?>" class="tdl" bgcolor="#FFD5FF"><?php echo $DesigH; ?></td> 		
		
		<td id="HR1<?php echo $Sno; ?>" class="tdc" bgcolor="#D5FFD5"><?php echo $res['HR_Score']; ?></td>
		<td id="HR2<?php echo $Sno; ?>" class="tdc" bgcolor="#D5FFD5"><?php echo $res['HR_Rating']; ?></td>
<?php if($res['HR_DesigId']!=$res['HR_CurrDesigId']){ $sqlDesigHR=mysql_query("select ".$condDesig."=".$res['HR_DesigId'], $con); $resDesigHR=mysql_fetch_assoc($sqlDesigHR); if($resDesigHR['DesigName']!=$res['designation_name']){$DesigHR=$resDesigHR['DesigName'];}else{$DesigHR='';} }else{$DesigHR='';}
if($res['HR_GradeId']!=$res['HR_CurrGradeId']){ $sqlGHR=mysql_query("select ".$condGrade."=".$res['HR_GradeId'], $con); $resGHR=mysql_fetch_assoc($sqlGHR); $GradeHR=$resGHR['GradeValue']; }else{$GradeHR='';} ?>	
		<td id="HR3<?php echo $Sno; ?>" class="tdc" bgcolor="#D5FFD5"><?php echo $GradeHR; ?></td>
        <td id="HR4<?php echo $Sno; ?>" class="tdl" bgcolor="#D5FFD5"><?php echo $DesigHR; ?></td> 		
		
	 </tr>
	 <?php $Sno++; } ?>
   </table>
 </td>
</tr> 
<?php } ?>		
<?php //-------------------------------------------------------------------------------------------------------- ?>
		
	</tr>
</table>
<?php //******************************************************************************?>
<?php //****************END*****END*****END******END******END************************************?>
<?php //*************************************************************************************?>
	  </td>
	</tr>
	  </table>
 </td>
</tr>
</table>
</body>
</html>