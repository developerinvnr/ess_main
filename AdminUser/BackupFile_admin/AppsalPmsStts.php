<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}

$Y=date("Y"); $PY=date("Y")-1;
if($CompanyId==1 OR $CompanyId==3 OR $CompanyId==4){$YYear=$PY;}
elseif($CompanyId==2){$YYear=$Y;}

//if($CompanyId==1){$YYear=$PY;}elseif($CompanyId==2){$YYear=$Y;}elseif($CompanyId==3){$YYear=$PY;}
//if($CompanyId==1 OR $CompanyId==2 OR $CompanyId==3){$YYear=$Y;}elseif($CompanyId==3){$YYear=$PY;}

//****************************************************************************************************************
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.th{ font-family:Times New Roman;font-size:12px;height:25px;text-align:center;color:#FFFFFF;font-weight:bold;background-color:#7a6189; }
.tdl{ font-family:Times New Roman;font-size:12px;text-align:left; }
.tdc{ font-family:Times New Roman;font-size:12px;text-align:center; }
.tdinput{ font-family:Times New Roman;font-size:14px;text-align:center;width:100%;border:hidden;background-color:#DDFB9F; }
.tdinputl{ font-family:Times New Roman;font-size:14px;text-align:left;width:100%;border:hidden;background-color:#DDFB9F; }.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
.All_40{font-size:11px; height:20px; width:40px;} .All_50{font-size:11px; height:20px; width:50px;} .All_70{font-size:11px; height:20px; width:70px;} .All_80{font-size:11px; height:20px; width:80px;}.All_100{font-size:11px; height:20px; width:100px;} .All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} .All_60{font-size:11px; height:20px; width:60px;}
.All_150{font-size:11px; height:20px; width:150px;}.All_170{font-size:11px; height:20px; width:170px;}.All_180{font-size:11px; height:20px; width:180px;}.All_190{font-size:11px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} .All_450{font-size:11px; height:20px; width:450px;}.All_360{font-size:11px; height:20px; width:350px;}.All_540{font-size:11px; height:20px; width:540px;}.All_400{font-size:11px; height:20px; width:400px;} .All_600{font-size:11px; height:20px; width:600px;}.inner_table{height:500px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style>.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script type="text/javascript" language="javascript">
function SelectYear(v,y){ window.location='AppsalPmsStts.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&YI='+v; }
function SelectAppRev(v,y){ window.location='AppsalPmsStts.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=DW&value='+v+'&YI='+y;}
function SelectAppScore(v,y){ window.location='AppsalPmsStts.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=APPW&value='+v+'&YI='+y;}
function SelectRevScore(v,y){ window.location='AppsalPmsStts.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=REVW&value='+v+'&YI='+y;}
function SelectHodScore(v,y){ window.location='AppsalPmsStts.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=HODW&value='+v+'&YI='+y;}
function ExportDW(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value; var DeptValue=document.getElementById("DeptValue").value;  
  window.open("StatusPmsDW.php?action=DW&value="+v+"&C="+ComId+"&Y="+YId+"&value="+DeptValue,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}

$(document).ready(function () { $("#table1").freezeHeader({ 'height': '500px' }); })
</Script>
</head>
<body class="body">
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
<?php //***************************************************************************************?>
<?php //******************START*****START*****START******START******START**********************?>
<?php //*****************************************************************************************?>
<table border="0" style="margin-top:0px; width:100%;">
<tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
 <td align="" width="100%" valign="top">
 <table border="0">
  <tr>
   <td colspan="2">
   <table border="0">
    <tr>
	 <td align="left" class="heading">PMS - Status &nbsp;<span id="ReturnValue">&nbsp;</span></td>
	 <td>
	  <table border="0">						
      <tr>
<?php if($_REQUEST['YI']!=''){ $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; }?>	     
    <td class="td1" style="width:120px;"><select class="tdsel" style="background-color:#DDFFBB;width:120px;" name="YearID" id="YearID" onChange="SelectYear(this.value,<?php echo $_REQUEST['YI'];?>)"><?php if($_REQUEST['YI']!=''){ $SqlY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI'], $con); $ResY=mysql_fetch_array($SqlY); ?><option value="<?php echo $ResY['YearId']; ?>"><?php echo date("Y",strtotime($ResY['FromDate'])).'-'.date("Y",strtotime($ResY['ToDate'])); if($ResY['YearId']>5){ echo ' - Y'; }?></option><?php }else{ ?><option value="" selected>Select Year</option><?php } $SqlYear=mysql_query("select y.YearId,FromDate,ToDate from hrm_employee_pms p inner join hrm_year y on p.AssessmentYear=y.YearId where CompanyId=".$CompanyId." group by AssessmentYear order by AssessmentYear DESC", $con); while($ResYear=mysql_fetch_array($SqlYear)) { ?><option value="<?php echo $ResYear['YearId']; ?>"><?php echo date("Y",strtotime($ResYear['FromDate'])).'-'.date("Y",strtotime($ResYear['ToDate'])); if($ResYear['YearId']>5){ echo ' - Y'; } ?></option><?php } ?></select></td>	
	
	<td class="td1" style="width:150px;"><select class="tdsel" style="background-color:#DDFFBB;width:150px;" name="DeptAppRev" id="DeptAppRev" onChange="SelectAppRev(this.value,<?php echo $_REQUEST['YI'];?>)" <?php if($_REQUEST['YI']==''){echo 'disabled';}?>><option value="" style="margin-left:0px;" selected>SELECT DEPARTMENT</option><?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo $ResDept['DepartmentCode'];?></option><?php } ?><option value="All">&nbsp;All</option></select></td>

	<td class="td1" style="width:150px;"><select class="tdsel" style="background-color:#DDFFBB;width:150px;" name="AppScore" id="AppScore" onChange="SelectAppScore(this.value,<?php echo $_REQUEST['YI'];?>)" <?php if($_REQUEST['YI']==''){echo 'disabled';}?>><option value="" style="margin-left:0px;" selected>SELECT APPRAISER</option><?php $SqlHod=mysql_query("SELECT Appraiser_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.Appraiser_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$YearId." GROUP BY Appraiser_EmployeeID ORDER BY Fname ASC", $con); while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['Appraiser_EmployeeID']; ?>"><?php echo $EnameH; ?></option><?php } ?></select></td>
	
	<td class="td1" style="width:150px;"><select class="tdsel" style="background-color:#DDFFBB;width:150px;" name="RevScore" id="RevScore" onChange="SelectRevScore(this.value,<?php echo $_REQUEST['YI'];?>)" <?php if($_REQUEST['YI']==''){echo 'disabled';}?>><option value="" style="margin-left:0px;" selected>SELECT REVIEWER</option><?php $SqlHod=mysql_query("SELECT Reviewer_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.Reviewer_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$YearId." GROUP BY Reviewer_EmployeeID ORDER BY Fname ASC", $con); while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['Reviewer_EmployeeID']; ?>"><?php echo $EnameH; ?></option><?php } ?></select></td>
	
	<td class="td1" style="width:150px;"><select class="tdsel" style="background-color:#DDFFBB;width:150px;" name="HodScore" id="HodScore" onChange="SelectHodScore(this.value,<?php echo $_REQUEST['YI'];?>)" <?php if($_REQUEST['YI']==''){echo 'disabled';}?>><option value="" style="margin-left:0px;" selected>SELECT HOD</option><?php $SqlHod=mysql_query("SELECT HOD_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.HOD_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$YearId." GROUP BY HOD_EmployeeID ORDER BY Fname ASC", $con); while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['HOD_EmployeeID']; ?>"><?php echo $EnameH; ?></option><?php } ?></select></td>
	  
	  </tr>
	  </table>					
	  </td>           						 
     </tr>
	</table>					
	</td>      
<?php } ?>					 
	   </tr>
	  </table>
	</td>
 </tr>
<?php //---------------------------------------Display Record----------------------------------- ?>
<tr>
<td valign="top" style="width:100%;">
<table border="1" id="table1" cellspacing="0" style="width:100%;">
<div class="thead">
<thead>
<tr>
<?php if($_REQUEST['action']=='DW') { ?>
<?php if($_REQUEST['value']!='All'){ $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con);  $resA=mysql_fetch_assoc($sqlA); } ?><td colspan="14" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;PMS Status Department Wise : &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All') { echo $resA['DepartmentName'];  } else echo 'All';?>&nbsp;)&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<?php if($_REQUEST['YI']!='' AND $_REQUEST['YI']>0){?><a href="#" onClick="ExportDW('<?php echo $_REQUEST['value']; ?>')" style="color:#F9F900; font-size:12px;">Export Excel</a><?php } ?></td>

<?php } if($_REQUEST['action']=='APPW'){ $sqlA=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); ?>
<td colspan="12" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;PMS Status Appraiser Wise :&nbsp;&nbsp;(&nbsp;Appraiser - <?php echo $resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname']; ?>&nbsp;)&nbsp;&nbsp;&nbsp;</td>

<?php } if($_REQUEST['action']=='REVW'){ $sqlA=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); ?>
<td colspan="12" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;PMS Status Reviewer Wise :&nbsp;&nbsp;(&nbsp;Reviewer - <?php echo $resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname']; ?>&nbsp;)&nbsp;&nbsp;&nbsp;</td>

<?php } if($_REQUEST['action']=='HODW'){ $sqlA=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); ?>
<td colspan="12" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;PMS Status HOD Wise :&nbsp;&nbsp;(&nbsp;HOD - <?php echo $resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname']; ?>&nbsp;)&nbsp;&nbsp;&nbsp;</td>
<?php } ?>
</tr>
<tr bgcolor="#7a6189">
 <td class="th" style="width:3%;"><b>SNo</b></td>
 <td class="th" style="width:3%;"><b>EC</b></td>
 <td class="th" style="width:10%;"><b>Department</b></td>
 <td class="th" style="width:15%;"><b>Employee</b></td>
 <td class="th" style="width:15%;"><b>Appraiser</b></td>
 <td class="th" style="width:15%;"><b>Reviewer</b></td>
 <td class="th" style="width:10%;"><b>HOD</b></td>
 <td class="th" style="width:14%;"><b>Management</b></td>
 <td class="th" style="width:5%;"><b>Sts<br>Employee</b></td>
 <td class="th" style="width:5%;"><b>Sts<br>Appraiser</b></td>
 <td class="th" style="width:5%;"><b>Sts<br>Reviewer</b></td>
 <td class="th" style="width:5%;"><b>Sts<br>&nbsp;HOD&nbsp;</b></td>
 <td class="th" style="width:5%;"><b>Sts<br>&nbsp;Manag&nbsp;</b></td>
 <td class="th" style="width:5%;"><b>Sts<br>&nbsp;&nbsp;HR&nbsp;&nbsp;</b></td>
</tr>
</thead>
</div>
<?php if($_REQUEST['action']=='DW') { if($_REQUEST['value']=='All'){ $sql = mysql_query("SELECT e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, Appraiser_EmployeeID, Reviewer_EmployeeID, Rev2_EmployeeID, Rev2_PmsStatus, HOD_EmployeeID, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, HodSubmit_IncStatus, HR_PmsStatus, ExtraAllowPMS FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId WHERE e.EmpStatus='A' AND g.DateJoining<='".$YYear."-06-30' AND p.AssessmentYear=".$_REQUEST['YI']." AND e.CompanyId=".$CompanyId." AND p.Appraiser_EmployeeID!=0 order by e.EmpCode ASC", $con); }
else { $sql = mysql_query("SELECT e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, Rev2_EmployeeID, Rev2_PmsStatus, HodSubmit_IncStatus, HR_PmsStatus, ExtraAllowPMS FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId WHERE e.EmpStatus='A' AND g.DateJoining<='".$YYear."-06-30' AND p.AssessmentYear=".$_REQUEST['YI']." AND e.CompanyId=".$CompanyId." AND g.DepartmentId=".$_REQUEST['value']." AND p.Appraiser_EmployeeID!=0 order by e.EmpCode ASC", $con); }

} if($_REQUEST['action']=='APPW'){ $sql = mysql_query("SELECT e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, Rev2_EmployeeID, Rev2_PmsStatus, HodSubmit_IncStatus, HR_PmsStatus, ExtraAllowPMS FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId WHERE e.EmpStatus='A' AND g.DateJoining<='".$YYear."-06-30' AND p.AssessmentYear=".$_REQUEST['YI']." AND e.CompanyId=".$CompanyId." AND p.Appraiser_EmployeeID=".$_REQUEST['value'], $con);

} if($_REQUEST['action']=='REVW'){ $sql = mysql_query("SELECT e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, Rev2_EmployeeID, Rev2_PmsStatus, HodSubmit_IncStatus, HR_PmsStatus, ExtraAllowPMS FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId WHERE e.EmpStatus='A' AND g.DateJoining<='".$YYear."-06-30' AND p.AssessmentYear=".$_REQUEST['YI']." AND e.CompanyId=".$CompanyId." AND p.Reviewer_EmployeeID=".$_REQUEST['value'], $con);

} if($_REQUEST['action']=='HODW'){ $sql = mysql_query("SELECT e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, Rev2_EmployeeID, Rev2_PmsStatus, HodSubmit_IncStatus, HR_PmsStatus, ExtraAllowPMS FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId WHERE e.EmpStatus='A' AND g.DateJoining<='".$YYear."-06-30' AND p.AssessmentYear=".$_REQUEST['YI']." AND e.CompanyId=".$CompanyId." AND p.HOD_EmployeeID=".$_REQUEST['value'], $con); }

$no=1; while($res = mysql_fetch_array($sql)) {  
$sqlA = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'], $con); 
$sqlR = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'], $con); 
$sqlH = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['HOD_EmployeeID'], $con); 
$resA=mysql_fetch_assoc($sqlA); $resR=mysql_fetch_assoc($sqlR); $resH=mysql_fetch_assoc($sqlH);
$sqlR2 = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['Rev2_EmployeeID'], $con); 
$resR2=mysql_fetch_assoc($sqlR2);
?>
<div class="tbody">
<tbody>
<tr id="TR_<?php echo $no;?>" style="background-color:<?php if($res['ExtraAllowPMS']==1){echo '#2C9326';}else{echo '#FFFFFF';}?>;">
    <td class="tdc"><?php echo $no; ?></td>
    <td class="tdc"><?php echo $res['EmpCode']; ?></td> 
	<td class="tdl"><?php echo $res['DepartmentCode']; ?></td>
    <td class="tdl"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>    
    <td class="tdl"><?php echo $resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname']; ?></td> 
    <td class="tdl"><?php echo $resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname']; ?></td>  
    <td class="tdl"><?php echo $resR2['Fname'].' '.$resR2['Sname'].' '.$resR2['Lname']; ?></td>
	<td class="tdl"><?php echo $resH['Fname'].' '.$resH['Sname'].' '.$resH['Lname']; ?></td>
    <td class="tdc" style="color:<?php if($res['Emp_PmsStatus']==0){echo '#A40000';}if($res['Emp_PmsStatus']==1){echo '#36006C';} if($res['Emp_PmsStatus']==2){echo '#005300';} ?>;"><?php if($res['Emp_PmsStatus']==0){echo 'Draft';}if($res['Emp_PmsStatus']==1){echo 'Pending';} if($res['Emp_PmsStatus']==2){echo 'Submited';}?></td>
    <td class="tdc" style="color:<?php if($res['Appraiser_PmsStatus']==0){echo '#A40000';}if($res['Appraiser_PmsStatus']==1){echo '#36006C';} if($res['Appraiser_PmsStatus']==2){echo '#005300';}if($res['Appraiser_PmsStatus']==3){echo '#006AD5';} ?>;" class="All_100"><?php if($res['Appraiser_PmsStatus']==0){echo 'Draft';}if($res['Appraiser_PmsStatus']==1){echo 'Pending';} if($res['Appraiser_PmsStatus']==2){echo 'Approved';}if($res['Appraiser_PmsStatus']==3){echo 'Resend Employee';}?></td>
    <td class="tdc" style="color:<?php if($res['Reviewer_PmsStatus']==0){echo '#A40000';}if($res['Reviewer_PmsStatus']==1){echo '#36006C';}if($res['Reviewer_PmsStatus']==2){echo '#005300';}if($res['Reviewer_PmsStatus']==3){echo '#006AD5';} ?>;" class="All_100"><?php if($res['Reviewer_PmsStatus']==0){echo 'Draft';}if($res['Reviewer_PmsStatus']==1){echo 'Pending';} if($res['Reviewer_PmsStatus']==2){echo 'Approved';}if($res['Reviewer_PmsStatus']==3){echo 'Resend Appraiser';}?></td>
	
	<td class="tdc" style="color:<?php if($res['Rev2_PmsStatus']==0){echo '#A40000';}if($res['Rev2_PmsStatus']==1){echo '#36006C';}if($res['Rev2_PmsStatus']==2){echo '#005300';}if($res['Rev2_PmsStatus']==3){echo '#006AD5';} ?>;" class="All_100"><?php if($res['Rev2_EmployeeID']>0){ if($res['Rev2_PmsStatus']==0){echo 'Draft';}if($res['Rev2_PmsStatus']==1){echo 'Pending';} if($res['Rev2_PmsStatus']==2){echo 'Approved';}if($res['Rev2_PmsStatus']==3){echo 'Resend Reviewer';} } ?></td>
	       
    <td class="tdc" style="color:<?php if($res['HodSubmit_IncStatus']==0){echo '#A40000';}if($res['HodSubmit_IncStatus']==1){echo '#36006C';}if($res['HodSubmit_IncStatus']==2){echo '#005300';}?>;" class="All_100"><?php if($res['HodSubmit_IncStatus']==0){echo 'Draft';}if($res['HodSubmit_IncStatus']==1){echo 'Pending';}if($res['HodSubmit_IncStatus']==2){echo 'Approved';}?></td>
    <td class="tdc" style="color:<?php if($res['HR_PmsStatus']==0){echo '#A40000';}if($res['HR_PmsStatus']==1){echo '#36006C';} if($res['HR_PmsStatus']==2){echo '#005300';} ?>;" class="All_100"><?php if($res['HR_PmsStatus']==0){echo 'Draft';}if($res['HR_PmsStatus']==1){echo 'Pending';} if($res['HR_PmsStatus']==2){echo 'Approved';}?></td>
 </tr>
 </tbody>
 </div>
<?php $no++;} ?> 
   </table>
 </td>
</tr> 
<?php //------------------------------- Close Records ------------------------------------------------------------- ?>
</table>
</td>
</tr>
</table>

<?php //*******************************************************************************?>
<?php //******************END*****END*****END******END******END***************************************?>
<?php //********************************************************************************************?>
	  </td>
	</tr>
	  </table>
 </td>
</tr>
</table>
</body>
</html>