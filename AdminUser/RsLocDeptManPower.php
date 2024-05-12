<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff;font-family:Times New Roman;height:22px;font-size:12px;font-weight:bold;} 
.font1 { font-family:Times New Roman;font-size:12px; color:#000000;} 
.font2 { font-size:11px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:11px; width:120px; height:18px;}
.InputText {font-family:Times New Roman;font-size:12px;height:20px;color:#000066;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script>
function SelectYear(v){window.location='RsLocDeptManPower.php?y='+v;}

function PrintLocDeptManPower(y,c)
{ window.open("RsLocDeptManPowerPrint.php?action=PrintHCount&y="+y+"&c="+c,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=50,height=50");}

function ExportLocDeptManPower(y,c)
{ window.open("RsLocDeptManPowerExport.php?action=RsLocDeptManPowerExport&y="+y+"&c="+c,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}

function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#9BEF47'; }
  else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; }
}

</SCRIPT> 
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td class="heading" valign="top" style="width:200px;">Manpower (Loc & Dept)&nbsp;</td>
<?php if($_REQUEST['y']!=0){ $BeforeYId=$_REQUEST['y']-1; 
      $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $rY=mysql_fetch_assoc($sY); } 
      $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; 
	   ?>	     
	<td class="td1" style="font-size:14px;font-family:Times New Roman;" valign="top">&nbsp;&nbsp;
<a href="#" onClick="PrintLocDeptManPower(<?php echo $_REQUEST['y'].', '.$CompanyId; ?>)" style="font-size:12px;">Print</a>&nbsp;&nbsp;<a href="#" onClick="ExportLocDeptManPower(<?php echo $_REQUEST['y'].', '.$CompanyId; ?>)" style="font-size:12px;">Export Excel</a></td>
   </tr>
   </table>
  </td>
 </tr>
<?php if($_SESSION['login']=true){ ?>	
 <tr>
<?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
<input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['y']; ?>" />  
<table border="0" style="width:1200px;">

<tr>
 <td align="left">
  <table border="1" border="1" bgcolor="#FFFFFF">
  <tr bgcolor="#7a6189">
   <td colspan="2" align="center" class="font" style="width:100px;">SN</td>
   <td align="center" class="font" style="width:80px;">STATE</td>
   <td align="center" class="font" style="width:150px;">HQ</td>
<?php $sqlDept=mysql_query("select DepartmentId,DepartmentCode from hrm_department where DepartmentName!='MANAGEMENT' AND DeptStatus='A' AND CompanyId=".$CompanyId." order by DepartmentName ASC",$con); while($resDept=mysql_fetch_assoc($sqlDept)){ ?>   
   <td align="center" class="font" style="width:80px;"><?php echo substr_replace($resDept['DepartmentCode'], '', 3); ?></td>
<?php } ?>
   <td align="center" class="font" style="width:80px;">Total</td>
  </tr>
<?php $sql=mysql_query("select hrm_headquater.HqId,HqName,hrm_headquater.StateId,StateName,StateCode from hrm_headquater INNER JOIN hrm_state ON hrm_headquater.StateId=hrm_state.StateId INNER JOIN hrm_employee_general ON hrm_headquater.HqId=hrm_employee_general.HqId group by HqName order by StateName ASC, HqName ASC",$con); $SNo=1; while($res=mysql_fetch_assoc($sql)){  ?>
<tr id="TR<?php echo $SNo; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo $SNo; ?>" onClick="FucChk(<?php echo $SNo; ?>)" /></td>
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo $SNo; ?>&nbsp;</td>
   <td align="" class="font1">&nbsp;<?php echo $res['StateCode']; ?></td>
   <td align="" class="font1">&nbsp;<?php echo strtoupper($res['HqName']); ?></td>
<?php $sqlDept=mysql_query("select DepartmentId,DepartmentCode from hrm_department where DepartmentName!='MANAGEMENT' AND DeptStatus='A' AND CompanyId=".$CompanyId." order by DepartmentName ASC",$con); while($resDept=mysql_fetch_assoc($sqlDept)){ 
$sqlEmp=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND HqId=".$res['HqId']." AND DepartmentId=".$resDept['DepartmentId'],$con); $rowEmp=mysql_num_rows($sqlEmp); ?>   
   <td align="center" class="font1"><?php if($rowEmp>0){echo $rowEmp;} ?></td>
<?php } ?>
<?php $sqlEmpHq=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND HqId=".$res['HqId'],$con); $rowEmpHq=mysql_num_rows($sqlEmpHq); ?>   
   <td align="center" class="font1" bgcolor="#59ACFF"><?php if($rowEmpHq>0){echo $rowEmpHq;} ?></td>
  </tr>
 <?php $SNo++;} ?>
 <tr bgcolor="#59ACFF">
   <td align="right" colspan="4" style="width:50px;" class="font1">TOTAL:&nbsp;</td>
<?php $sqlDept=mysql_query("select DepartmentId,DepartmentCode from hrm_department where DepartmentName!='MANAGEMENT' AND DeptStatus='A' AND CompanyId=".$CompanyId." order by DepartmentName ASC",$con); while($resDept=mysql_fetch_assoc($sqlDept)){ 
$sqlEmpt=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND DepartmentId=".$resDept['DepartmentId'],$con); $rowEmpt=mysql_num_rows($sqlEmpt); ?>   
   <td align="center" class="font1"><?php if($rowEmpt>0){echo $rowEmpt;} ?></td>
<?php } ?>
<?php $sqlEmpHqt=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId,$con); $rowEmpHqt=mysql_num_rows($sqlEmpHqt); ?>   
   <td align="center" class="font1" bgcolor="#B0FB4D"><?php if($rowEmpHqt>0){echo $rowEmpHqt;} ?></td>
  </tr>

	 </table>
	  </td>
    </tr>
  </table>  
</td>
<?php //*********************************************** Close Department******************************************************?>    
 </tr>
<?php } ?> 
</table>
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