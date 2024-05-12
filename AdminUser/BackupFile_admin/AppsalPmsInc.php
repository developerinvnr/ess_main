<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//****************************************************************************************************************

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.th{ font-family:Times New Roman;font-size:12px;height:25px;text-align:center;color:#FFFFFF;font-weight:bold; }
.tdl{ font-family:Times New Roman;font-size:12px;text-align:left; }
.tdc{ font-family:Times New Roman;font-size:12px;text-align:center; }
.tdinput{ font-family:Times New Roman;font-size:14px;text-align:center;width:100%; border:hidden; }
.tdinputl{ font-family:Times New Roman;font-size:14px;text-align:left;width:100%; border:hidden; }
.tdsel{ font-family:Times New Roman;font-size:14px;text-align:left; width:100%;}
.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
.All_40{font-size:11px; height:20px; width:40px;} .All_50{font-size:11px; height:20px; width:50px;} .All_70{font-size:11px; height:20px; width:70px;} .All_80{font-size:11px; height:20px; width:80px;}.All_100{font-size:11px; height:20px; width:100px;} .All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} .All_60{font-size:11px; height:20px; width:60px;}
.All_150{font-size:11px; height:20px; width:150px;}.All_170{font-size:11px; height:20px; width:170px;}.All_180{font-size:11px; height:20px; width:180px;}.All_190{font-size:11px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} .All_450{font-size:11px; height:20px; width:450px;}.All_360{font-size:11px; height:20px; width:350px;}.All_540{font-size:11px; height:20px; width:540px;}.All_400{font-size:11px; height:20px; width:400px;} .All_600{font-size:11px; height:20px; width:600px;} .CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;} .inner_table{height:500px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script type="text/javascript" language="javascript">
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '500px' }); })

function SelectIncAllowPMS(v){window.location='AppsalPmsInc.php?action=AllowIncPms&value='+v;}
  
function FunIncClick(E,C,Y,N)
{ var U = document.getElementById("UserId").value; 
  if(document.getElementById('CheckAllowIncPMS_'+N).checked==true)
   { var url = 'AllAppRevPMSTime.php';	var pars = 'IncCheck=IncCheck&E='+E+'&Y='+Y+'&U='+U+'&C='+C+'&N='+N; var myAjax = new Ajax.Request(
   url, { method: 'post', parameters: pars,  onComplete: show_CheckIncAllowPMS}); 
   }
  else if(document.getElementById('CheckAllowIncPMS_'+N).checked==false)
  { var url = 'AllAppRevPMSTime.php';	var pars = 'IncCheck=IncUnCheck&E='+E+'&Y='+Y+'&U='+U+'&C='+C+'&N='+N;	var myAjax = new Ajax.Request(
  url, { 	method: 'post', parameters: pars,  onComplete: show_UnCheckIncAllowPMS});
  }
}
function show_CheckIncAllowPMS(originalRequest)
{ document.getElementById('ReturnValue').innerHTML = originalRequest.responseText; var No = document.getElementById("SNo").value;
  document.getElementById("IncTR_"+No).style.backgroundColor='#2C9326'; 
}
function show_UnCheckIncAllowPMS(originalRequest)
{ document.getElementById('ReturnValue').innerHTML = originalRequest.responseText; var No = document.getElementById("SNo").value;
  document.getElementById("IncTR_"+No).style.backgroundColor='#FFFFFF'; 
} 

</Script>
</head>
<body class="body">
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
<?php //************************************************************************************************?>
<?php //****************************START*****START*****START******START******START*******************?>
<?php //*******************************************************************************************?>
<table border="0" style="margin-top:0px; width:100%;">
<tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>
<td width="100%" valign="top">
 <table border="0" style="width:100%;">
 <tr>
  <td colspan="2">
  <table border="0">
  <tr>
   <td align="left" class="heading">Allow PMS Increment &nbsp;<span id="ReturnValue">&nbsp;</span></td>
   <td class="td1" style="width:200px;"><select class="tdsel" name="IncAllowPMS" id="IncAllowPMS" onChange="SelectIncAllowPMS(this.value)"><option value="" style="margin-left:0px;" selected>SELECT DEPARTMENT</option><?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?><option value="All">&nbsp;All</option></select></td>                           
<?php } ?>					 
  </tr>
  </table>
  </td>
 </tr>
<?php //-------------- Display Record ------------------------------------- ?>
<?php if($_REQUEST['action']=='AllowIncPms') {  ?>	
 <tr>
  <td>
   <table border="1" id="table1" cellspacing="0" style="width:100%;">
    <div class="thead">
    <thead>
    <tr><td colspan="13" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;Allow Increment PMS Without Score Rating : </td>
	</tr>
    <tr bgcolor="#7a6189">
     <td class="th" style=" width:5%;">SNo</td>
     <td class="th" style=" width:10%;">EmpCode</td>
	 <td class="th" style=" width:25%;">Department</td>
     <td class="th" style=" width:50%;">Name</td>
	 <td class="th" style=" width:10%;">Check</td>
    </tr>
	</thead>
	</div>
<?php if($YearId==1){$Y=2012; $Y2=2013;}elseif($YearId==2){$Y=2013; $Y2=2014;}elseif($YearId==3){$Y=2014; $Y2=2015;}elseif($YearId==4){$Y=2015; $Y2=2016;}elseif($YearId==5){$Y=2016; $Y2=2017;}elseif($YearId==6){$Y=2017; $Y2=2018;}elseif($YearId==7){$Y=2018; $Y2=2019;}elseif($YearId==8){$Y=2019; $Y2=2020;}elseif($YearId==9){$Y=2020; $Y2=2021;}elseif($YearId==10){$Y=2021; $Y2=2022;}elseif($YearId==11){$Y=2022; $Y2=2023;}elseif($YearId==12){$Y=2023; $Y2=2024;}
if($CompanyId==1 OR $CompanyId==2){$YYear=$Y;}elseif($CompanyId==3){$YYear=$Y2;}

if($_REQUEST['value']>0){$Sql=mysql_query("SELECT e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId WHERE e.CompanyId=".$CompanyId." AND e.EmpStatus='A' AND g.DateJoining<='".$YYear."-06-30' AND g.DepartmentId=".$_REQUEST['value']." ORDER BY e.EmpCode ASC", $con); }
elseif($_REQUEST['value']=='All'){$Sql=mysql_query("SELECT e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId WHERE e.CompanyId=".$CompanyId." AND e.EmpStatus='A' AND g.DateJoining<='".$YYear."-06-30' ORDER BY e.EmpCode ASC", $con); 
}
 $no=1; while($Res=mysql_fetch_array($Sql)) { $Ename=$Res['Fname'].' '.$Res['Sname'].' '.$Res['Lname'];  
 $sqlCh=mysql_query("select * from hrm_pms_allow_inc where EmployeeID=".$Res['EmployeeID']." AND CompanyId=".$CompanyId." AND AssesmentYear=".$YearId, $con); $RowCh=mysql_num_rows($sqlCh);?>
  <div class="tbody">
  <tbody>
  <tr id="IncTR_<?php echo $no; ?>" <?php if($RowCh>0){?> bgcolor="#2C9326" <?php }else{ ?> bgcolor="#FFFFFF" <?php } ?>>
    <td class="tdc"><?php echo $no; ?></td>
    <td class="tdc"><?php echo $Res['EmpCode']; ?></td>
	<td class="tdl"><?php echo $Res['DepartmentCode']; ?></td>
    <td class="tdl"><?php echo $Ename ?></td>
	<td class="tdc" style="background-color:#9FCFFF;"><?php if($_SESSION['User_Permission']=='Edit'){?><input type="checkbox" style="height:10px;" name="CheckAllowIncPMS_<?php echo $no; ?>" id="CheckAllowIncPMS_<?php echo $no; ?>" <?php if($RowCh>0){echo 'checked';}?> onClick="FunIncClick(<?php echo $Res['EmployeeID'].','.$CompanyId.','.$YearId.','.$no; ?>)" /><?php } ?></td>
  </tr>
  </tbody>
  </div>
<?php $no++;} ?> 
   </table>
 </td>
</tr> 
<?php } ?>
<?php //-------------------------------------------------------------------------------------------------------- ?>

	</tr>
</table>
<?php //**********************************************************************************?>
<?php //**************END*****END*****END******END******END*******************************?>
<?php //*****************************************************************************?>
	  </td>
	</tr>
	  </table>
 </td>
</tr>
</table>
</body>
</html>