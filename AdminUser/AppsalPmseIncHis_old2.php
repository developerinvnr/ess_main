<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_REQUEST['YI']==1){$Y=2012; $yy=12;}elseif($_REQUEST['YI']==2){$Y=2013; $yy=13;}elseif($_REQUEST['YI']==3){$Y=2014; $yy=14;}elseif($_REQUEST['YI']==4){$Y=2015; $yy=15;}elseif($_REQUEST['YI']==5){$Y=2016; $yy=16;}elseif($_REQUEST['YI']==6){$Y=2017; $yy=17;}elseif($_REQUEST['YI']==7){$Y=2018; $yy=18;}elseif($_REQUEST['YI']==8){$Y=2019; $yy=19;}elseif($_REQUEST['YI']==9){$Y=2020; $yy=20;}elseif($_REQUEST['YI']==10){$Y=2021; $yy=21;}elseif($_REQUEST['YI']==11){$Y=2022; $yy=22;}
if($_REQUEST['YI']==1){$Y=2012; $Y2=2013;}elseif($_REQUEST['YI']==2){$Y=2013; $Y2=2014;}elseif($_REQUEST['YI']==3){$Y=2014; $Y2=2015;}elseif($_REQUEST['YI']==4){$Y=2015; $Y2=2016;}elseif($_REQUEST['YI']==5){$Y=2016; $Y2=2017;}elseif($_REQUEST['YI']==6){$Y=2017; $Y2=2018;}elseif($_REQUEST['YI']==7){$Y=2018; $Y2=2019;}elseif($_REQUEST['YI']==8){$Y=2019; $Y2=2020;}elseif($_REQUEST['YI']==9){$Y=2020; $Y2=2021;}elseif($_REQUEST['YI']==10){$Y=2021; $Y2=2022;}elseif($_REQUEST['YI']==11){$Y=2022; $Y2=2023;}
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
.th{ font-family:Times New Roman;font-size:12px;height:25px;text-align:center;color:#FFFFFF;background-color:#7a6189;font-weight:bold; }
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
function SelectYear(v){window.location='AppsalPmseIncHis.php?YI='+v;}
function SelectEIncHis(v,yi,e)
{ if(e=='d'){var ee='Dept';}else if(e=='a'){var ee='App';}else if(e=='r'){var ee='Rev';}else if(e=='r2'){var ee='Rev2';}else if(e=='h'){var ee='Hod';} 
  window.location='AppsalPmseIncHis.php?action=EmpIncHis&ee='+ee+'&value='+v+'&YI='+yi;}

function ExportIncHis(v,yi,ee)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;   
  window.open("ExportPmsIncHis.php?action=IncHisExport&value="+v+"&c="+ComId+"&YI="+yi+"&ee="+ee,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}

 
function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#9BEF47';  }

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
					  <td colspan="12" align="left" class="heading">Employee Increment History &nbsp;<span id="ReturnValue">&nbsp;</span></td>
					  <td>
				    <table border="0">
                    <tr>
<?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>	     
<td class="td1" style="font-size:14px;width:180px;font-family:Times New Roman;" >&nbsp;&nbsp;<b>Year:</b>&nbsp;
<select class="tdsel" style="background-color:#DDFFBB;width:115px;" name="YearID" id="YearID" onChange="SelectYear(this.value)"><?php if($_REQUEST['YI']!=''){ $SqlY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI'], $con); $ResY=mysql_fetch_array($SqlY); ?><option value="<?php echo $ResY['YearId']; ?>"><?php echo date("Y",strtotime($ResY['FromDate'])).'-'.date("Y",strtotime($ResY['ToDate'])); if($ResY['YearId']>5){ echo ' - Y'; }?></option><?php }else{ ?><option value="" selected>Year</option><?php } $SqlYear=mysql_query("select y.YearId,FromDate,ToDate from hrm_employee_pms p inner join hrm_year y on p.AssessmentYear=y.YearId where CompanyId=".$CompanyId." group by AssessmentYear order by AssessmentYear DESC", $con); while($ResYear=mysql_fetch_array($SqlYear)) { ?><option value="<?php echo $ResYear['YearId']; ?>"><?php echo date("Y",strtotime($ResYear['FromDate'])).'-'.date("Y",strtotime($ResYear['ToDate'])); if($ResYear['YearId']>5){ echo ' - Y'; } ?></option><?php } ?></select></td>	

<td class="td1" style="font-size:11px; width:160px;" align="center"><select style="font-size:12px; width:158px; height:20px; background-color:#DDFFBB;" name="DeptScore" id="DeptScore" onChange="SelectEIncHis(this.value,<?php echo $_REQUEST['YI']; ?>,'d')"><option value="" style="margin-left:0px;" selected>SELECT DEPARTMENT</option><?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?><option value="0">&nbsp;All</option></select></td>
					   
<td class="td1" style="font-size:11px; width:150px;" align="center"><select style="font-size:12px; width:148px; height:20px; background-color:#DDFFBB;" name="AppScore" id="AppScore" onChange="SelectEIncHis(this.value,<?php echo $_REQUEST['YI']; ?>,'a')"><option value="" style="margin-left:0px;" selected>SELECT APPRAISER</option><?php $SqlHod=mysql_query("SELECT Appraiser_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.Appraiser_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." GROUP BY Appraiser_EmployeeID ORDER BY Fname ASC", $con); while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['Appraiser_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select></td>

<td class="td1" style="font-size:11px; width:150px;" align="center"><select style="font-size:12px; width:148px; height:20px; background-color:#DDFFBB;" name="RevScore" id="RevScore" onChange="SelectEIncHis(this.value,<?php echo $_REQUEST['YI']; ?>,'r')"><option value="" style="margin-left:0px;" selected>SELECT REVIEWER</option><?php $SqlHod=mysql_query("SELECT Reviewer_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.Reviewer_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." GROUP BY Reviewer_EmployeeID ORDER BY Fname ASC", $con); while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['Reviewer_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select></td>
		
<td class="td1" style="font-size:11px; width:150px;" align="center"><select style="font-size:12px; width:148px; height:20px; background-color:#DDFFBB;" name="Rev2Score" id="Rev2Score" onChange="SelectEIncHis(this.value,<?php echo $_REQUEST['YI']; ?>,'r2')"><option value="" style="margin-left:0px;" selected>SELECT HOD</option><?php $Sql2Hod=mysql_query("SELECT Rev2_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.Rev2_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND `Emp_KRASave`='Y' GROUP BY Rev2_EmployeeID ORDER BY Fname ASC", $con); while($Res2Hod=mysql_fetch_array($Sql2Hod)) { $Ename2H=$Res2Hod['Fname'].' '.$Res2Hod['Sname'].' '.$Res2Hod['Lname']; ?><option value="<?php echo $Res2Hod['Rev2_EmployeeID']; ?>"><?php echo '&nbsp;'.$Ename2H; ?></option><?php } ?></select></td>
					 
<td class="td1" style="font-size:11px; width:150px;" align="center"><select style="font-size:12px; width:148px; height:20px; background-color:#DDFFBB;" name="HodScore" id="HodScore" onChange="SelectEIncHis(this.value,<?php echo $_REQUEST['YI']; ?>,'h')"><option value="" style="margin-left:0px;" selected>SELECT MANAGEMENT</option><?php $SqlHod=mysql_query("SELECT HOD_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.HOD_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND `Emp_KRASave`='Y' GROUP BY HOD_EmployeeID ORDER BY Fname ASC", $con); while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['HOD_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select></td>

                     </tr>
				   </table>					
				   </td>                           
<?php } ?>					 
		           </tr>
                  </table>
				</td>
			 </tr>
<?php //---------------------------------------Display Record----------------------------- ?>
<?php if($_REQUEST['action']=='EmpIncHis') { ?>
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
elseif($_REQUEST['ee']=='Rev2')
{ $name='HOD Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); 
  $name2=$resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname'];
}
elseif($_REQUEST['ee']=='Hod')
{ $name='Management Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); 
  $name2=$resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname'];
}
?>

<tr>
 <td>
   <table border="1" id="table1" cellspacing="0" style="width:2300px;">
   <div class="thead">
   <thead>
     <tr>
  <td colspan="30" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;Employee Increment History <?php echo $name; ?> : &nbsp;&nbsp;(&nbsp;<?php echo $name2; ?>&nbsp;)&nbsp;&nbsp;&nbsp;<a href="#" onClick="ExportIncHis(<?php echo $_REQUEST['value']; ?>,<?php echo $_REQUEST['YI']; ?>,'<?php echo $_REQUEST['ee']; ?>')" style="color:#F9F900; font-size:12px;">Export Excel</a>
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189">
	    <td class="th" style="width:30px;">&nbsp;</td>
		<td class="th" style="width:40px;">SNo</td>
		<td class="th" style="width:50px;">EC</td>
		<td class="th" style="width:300px;">Name</td>
		<td class="th" style="width:50px;">Curr. Grade</td>
		<td class="th" style="width:50px;">Pro. Grade</td>
		<td class="th" style="width:120px;">Department</td>
		<td class="th" style="width:300px;">Curr. Designation</td>	
		<td class="th" style="width:300px;">Pro. Designation</td>
		<td class="th" style="width:80px;">Change Date</td>	
		<td class="th" style="width:60px;">Basic</td>
		<td class="th" style="width:60px;">Stipend</td>
		<td class="th" style="width:60px;">HRA</td>
		<td class="th" style="width:60px;">CA</td> 
		<td class="th" style="width:60px;">VA</td>
		<td class="th" style="width:60px;">SA</td>
		<td class="th" style="width:60px;">PI</td> 
		<td class="th" style="width:60px;">IBM</td>
		<td class="th" style="width:60px;">Pre. GrossPM</td>
		<td class="th" style="width:60px;">Curr. GrossPM</td>
		<td class="th" style="width:60px;">PIS</td>		
		<td class="th" style="width:40px;">(%) PIS</td>
		<td class="th" style="width:60px;">PSC</td>		
        <td class="th" style="width:60px;">TGSPM</td>
		<td class="th" style="width:40px;">(%) TGSPM</td>
		<td class="th" style="width:60px;">Incentive</td>
		<td class="th" style="width:60px;">Bonus</td>
		<td class="th" style="width:60px;">CTC</td>
		<td class="th" style="width:40px;">Score</td>		
		<td class="th" style="width:40px;">Rating</td>	
	</tr>
	</thead>
	</div>	
<?php 
if($_REQUEST['ee']=='Dept')
{  
  if($_REQUEST['value']==0)
  { $sql=mysql_query("select * from hrm_pms_appraisal_history h INNER JOIN hrm_employee e ON h.EmpCode=e.EmpCode where h.CompanyId=".$CompanyId." AND e.CompanyId=".$CompanyId." order by h.EmpCode ASC, h.SalaryChange_Date ASC", $con); }
    else{ $sql=mysql_query("select * from hrm_pms_appraisal_history INNER JOIN hrm_employee ON hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_pms_appraisal_history.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." order by hrm_pms_appraisal_history.EmpCode ASC, hrm_pms_appraisal_history.SalaryChange_Date ASC", $con); }
}
elseif($_REQUEST['ee']=='App')
{ $sql=mysql_query("select * from hrm_pms_appraisal_history INNER JOIN hrm_employee ON hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_pms_appraisal_history.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." order by hrm_pms_appraisal_history.EmpCode ASC, hrm_pms_appraisal_history.SalaryChange_Date ASC", $con); }
elseif($_REQUEST['ee']=='Rev')
{ $sql=mysql_query("select * from hrm_pms_appraisal_history INNER JOIN hrm_employee ON hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_pms_appraisal_history.CompanyId=".$CompanyId." AND hrm_employee_pms.Reviewer_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." order by hrm_pms_appraisal_history.EmpCode ASC, hrm_pms_appraisal_history.SalaryChange_Date ASC", $con); 
}
elseif($_REQUEST['ee']=='Rev2')
{ $sql=mysql_query("select * from hrm_pms_appraisal_history INNER JOIN hrm_employee ON hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_pms_appraisal_history.CompanyId=".$CompanyId." AND hrm_employee_pms.Rev2_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." order by hrm_pms_appraisal_history.EmpCode ASC, hrm_pms_appraisal_history.SalaryChange_Date ASC", $con); 
}
elseif($_REQUEST['ee']=='Hod')
{ $sql=mysql_query("select * from hrm_pms_appraisal_history INNER JOIN hrm_employee ON hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_pms_appraisal_history.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." order by hrm_pms_appraisal_history.EmpCode ASC, hrm_pms_appraisal_history.SalaryChange_Date ASC", $con); 
}  
 $Sno=1; $no=1; while($res=mysql_fetch_array($sql)){ 
 $sqlCheck=mysql_query("select EmpStatus,EmployeeID from hrm_employee where EmpCode=".$res['EmpCode']." AND CompanyId=".$CompanyId, $con); $resCheck=mysql_fetch_assoc($sqlCheck);
 if($resCheck['EmpStatus']=='A'){

 $sqlMax=mysql_query("select MAX(AppHistoryId) as MaxId from hrm_pms_appraisal_history where EmpCode=".$res['EmpCode']." AND CompanyId=".$CompanyId, $con); 
 $resMax=mysql_fetch_assoc($sqlMax);
 ?>	   
     <?php if($res['SalaryChange_Date']<$YYear.'-10-01') { 
	 
	 $sctc=mysql_query("select Tot_CTC from hrm_employee_ctc where EmployeeID=".$resCheck['EmployeeID']." AND (CtcCreatedDate='".$res['SalaryChange_Date']."' OR SalChangeDate='".$res['SalaryChange_Date']."')",$con); $rctc=mysql_fetch_assoc($sctc);
	 
	 if(($res['SalaryChange_Date']>'2012-01-01' AND $rctc['Tot_CTC']!='' AND $rctc['Tot_CTC']>0) OR $res['SalaryChange_Date']<='2012-01-01' OR ($CompanyId==3 AND $res['SalaryChange_Date']>'2012-01-01')) {
	 
	 ?>
	 <div class="tbody">
     <tbody>
	 <tr bgcolor="#FFFFFF" id="TR<?php echo $Sno; ?>">
	    <td class="tdc"><input type="checkbox" id="Chk<?php echo $Sno; ?>" onClick="FucChk(<?php echo $Sno; ?>)" /></td>
		<td class="tdc"><?php echo $no; ?></td>
		<td class="tdc"><?php echo $res['EmpCode']; ?></td>
<?php $sqlE=mysql_query("select Fname, Sname, Lname from hrm_employee where EmpCode=".$res['EmpCode']." AND CompanyId=".$CompanyId, $con); $resE=mysql_fetch_assoc($sqlE); ?>			
		<td class="tdl"><?php echo strtoupper($resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']); ?></td>
		<td class="tdc"><?php echo $res['Current_Grade']; ?></td>
		<td class="tdc"><?php echo $res['Proposed_Grade']; ?></td>
		<td class="tdl"><?php echo strtoupper($res['Department']); ?></td>
		<td class="tdl"><?php echo strtoupper($res['Current_Designation']); ?></td>	
		<td class="tdl"><?php echo strtoupper($res['Proposed_Designation']); ?></td>
		<td class="tdc"><?php echo date("d-M-y",strtotime($res['SalaryChange_Date'])); ?></td>	
		<td class="tdr"><?php echo floatval($res['Salary_Basic']); ?></td>
		<td class="tdr"><?php echo floatval($res['Salary_Stipend']); ?></td>
		<td class="tdr"><?php echo floatval($res['Salary_HRA']); ?></td>
		<td class="tdr"><?php echo floatval($res['Salary_CA']); ?></td> 
		<td class="tdr"><?php echo floatval($res['Salary_VA']); ?></td>
		<td class="tdr"><?php echo floatval($res['Salary_SA']); ?></td>
		<td class="tdr"><?php echo floatval($res['Salary_PI']); ?></td> 
		<td class="tdr"><?php echo floatval($res['Industry_Bench_Markinge']); ?></td>
		<td class="tdr"><?php echo floatval($res['Previous_GrossSalaryPM']); ?></td>
		<td class="tdr"><?php echo floatval($res['Current_GrossSalaryPM']); ?></td>
		<td class="tdr"><?php echo floatval($res['Proposed_GrossSalaryPM']); ?></td>		
		<td class="tdr"><?php echo floatval($res['Prop_PeInc_GSPM']); ?></td>
		<td class="tdr"><?php echo floatval($res['PropSalary_Correction']); ?></td>		
        <td class="tdr"><?php echo floatval($res['TotalProp_GSPM']); ?></td>
		<td class="tdc">
<?php if($res['TotalProp_PerInc_GSPM']==0)
      { 
	    if($res['TotalProp_GSPM']==0 OR $res['Previous_GrossSalaryPM']==$res['TotalProp_GSPM']){echo 0;}
		elseif($res['Previous_GrossSalaryPM']!=$res['TotalProp_GSPM'] AND $res['Previous_GrossSalaryPM']>0 AND $res['TotalProp_GSPM']>0)
		{
		 $oneP=($res['Previous_GrossSalaryPM']*1)/100; 
		 $IncV=$res['TotalProp_GSPM']-$res['Previous_GrossSalaryPM'];
		 $totPInc=$IncV/$oneP;
		 echo number_format($totPInc,2);
		}
	  } 
      else { echo $res['TotalProp_PerInc_GSPM']; } ?>

<?php //echo $res['TotalProp_PerInc_GSPM']; ?>
</td>
		<td class="tdr"><?php echo floatval($res['Incentive']); ?></td>
		<td class="tdr"><?php echo floatval($res['BonusAnnual_September']); ?></td>
		
		<td class="tdr"><?php echo floatval($rctc['Tot_CTC']); ?></td>
		
		<td class="tdc"><?php echo $res['Score']; ?></td>		
		<td class="tdc"><?php echo $res['Rating']; ?></td>	
	</tr>
	</tbody>
	</div>
	<?php } //if(($res['SalaryChange_Date']>'2012-01-01' AND $rctc['Tot_CTC']!='' AND $rctc['Tot_CTC']>0) OR $res['SalaryChange_Date']<='2012-01-01') ?>
		
	<?php } 

if($res['AppHistoryId']==$resMax['MaxId']){

//if($res['SalaryChange_Date']>=$YYear.'-10-01') { ?>
<?php $sqlPms=mysql_query("select EmployeeID, Hod_EmpGrade, Hod_EmpDesignation, EmpCurrGrossPM, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_GrossMonthlySalary, Hod_Percent_IncNetMonthalySalary, HR_CurrDesigId, HR_CurrGradeId, HR_Curr_DepartmentId from hrm_employee_pms where EmployeeID=".$resCheck['EmployeeID']." AND AssessmentYear=".$_REQUEST['YI'], $con); $resPms=mysql_fetch_assoc($sqlPms);
	  $sqlGD=mysql_query("select GradeId,DesigId from hrm_employee_general where EmployeeID=".$resCheck['EmployeeID'], $con); $resGD=mysql_fetch_assoc($sqlGD);  ?>	 
	  <div class="tbody">
      <tbody>
	  <tr bgcolor="#CEFFCE" id="TR<?php echo $Sno; ?>">
	    <td class="tdc"><input type="checkbox" id="Chk<?php echo $Sno; ?>" onClick="FucChk(<?php echo $Sno; ?>)" /></td>
		<td class="tdc"><?php //echo $Sno; ?></td>
		<td class="tdc"><?php echo $res['EmpCode']; ?></td>
<?php $sqlE2=mysql_query("select Fname, Sname, Lname from hrm_employee where EmpCode=".$res['EmpCode']." AND CompanyId=".$CompanyId, $con); $resE2=mysql_fetch_assoc($sqlE2); ?>	
		<td class="tdl"><?php echo strtoupper($resE2['Fname'].' '.$resE2['Sname'].' '.$resE2['Lname']); ?></td>
<?php if($resPms['HR_CurrGradeId']>0){ $sqlGr=mysql_query("select GradeValue from hrm_grade where GradeId=".$resPms['HR_CurrGradeId'], $con); $resGr=mysql_fetch_assoc($sqlGr); }?>				
		<td class="tdc"><?php echo $resGr['GradeValue']; ?></td>
<?php if($resGD['GradeId']!=$resPms['Hod_EmpGrade'] AND $resPms['Hod_EmpGrade']>0){ $HodGrade=$res['Hod_EmpGrade']; } else {$HodGrade=$resGD['GradeId']; } 
 $sqlGr2=mysql_query("select GradeValue from hrm_grade where GradeId=".$HodGrade, $con); $resGr2=mysql_fetch_assoc($sqlGr2);?>		
		<td class="tdc"><?php if($resGr['GradeValue']!=$resGr2['GradeValue']){echo $resGr2['GradeValue']; } ?></td>
<?php if($resPms['HR_Curr_DepartmentId']>0){ $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resPms['HR_Curr_DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); } ?>			
		<td class="tdl"><?php echo strtoupper($resDept['DepartmentCode']); ?></td>
<?php if($resPms['HR_CurrDesigId']>0){ $sqlD1=mysql_query("select DesigName from hrm_designation where DesigId=".$resPms['HR_CurrDesigId'], $con); $resD1=mysql_fetch_assoc($sqlD1);} ?>		
		<td class="tdl"><?php echo strtoupper($resD1['DesigName']);?></td>	
<?php if($resPms['Hod_EmpDesignation']){ $sqlD2=mysql_query("select DesigName from hrm_designation where DesigId=".$resPms['Hod_EmpDesignation'], $con); $resD2=mysql_fetch_assoc($sqlD2); } ?>		
		<td class="tdl"><?php if($resPms['DesigId']!=$resPms['Hod_EmpDesignation']){ echo strtoupper($resD2['DesigName']); } ?></td>
		<td class="tdc"><?php if($CompanyId==1 OR $CompanyId==2){echo '01-Jan-'.date("y");}elseif($CompanyId==3){echo '01-Apr-'.date("y");} ?></td>	
		<td class="tdl">&nbsp;</td>
		<td class="tdl">&nbsp;</td>
		<td class="tdl">&nbsp;</td>
		<td class="tdl">&nbsp;</td> 
		<td class="tdl">&nbsp;</td>
		<td class="tdl">&nbsp;</td>
		<td class="tdl">&nbsp;</td> 
		<td class="tdl">&nbsp;</td>
		<td class="tdr"><?php echo $resPms['EmpCurrGrossPM']; ?></td>
		<td class="tdr"><?php echo $resPms['EmpCurrGrossPM']; ?></td>
		<td class="tdr"><?php echo $resPms['Hod_ProIncSalary']; ?></td>		
		<td class="tdr"><?php echo $resPms['Hod_Percent_ProIncSalary']; ?></td>
		<td class="tdr"><?php echo $resPms['Hod_ProCorrSalary']; ?></td>		
        <td class="tdr"><?php echo $resPms['Hod_GrossMonthlySalary']; ?></td>
		<td class="tdr"><?php echo $resPms['Hod_Percent_IncNetMonthalySalary']; ?></td>
		<td class="tdr"><?php echo $resPms['Incentive']; ?></td>
		<td class="tdr"><?php echo ''; ?></td>
		<td class="tdr"><?php echo ''; ?></td>
		<td class="tdr"><?php echo $resPms['Hod_TotalFinalScore']; ?></td>		
		<td class="tdr"><?php echo $resPms['Hod_TotalFinalRating']; ?></td>	
	</tr>
	<tr> 
	 <td colspan="20">&nbsp;</td>
	</tr>
	 <?php } ?> 
	 <?php if($resMax['MaxId']==$res['AppHistoryId']){?>
	 <tr><td colspan="30" style=" background-color:#CAC046;">&nbsp;</td></tr>
	<?php } ?>   	
	 <?php } if($resMax['MaxId']==$res['AppHistoryId']){ $no++; } $Sno++;  }  ?>
     </tbody>
	 </div>
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