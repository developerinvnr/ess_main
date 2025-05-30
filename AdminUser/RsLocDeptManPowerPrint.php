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
<Script> window.print(); //window.close(); </SCRIPT> 
</head>
<body class="body">
<table class="table">
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
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
<?php $sqlDept=mysql_query("select * from core_departments where is_active=1 order by department_name",$con); while($resDept=mysql_fetch_assoc($sqlDept)){ ?>   
   <td align="center" class="font" style="width:80px;"><?php echo substr_replace($resDept['department_code'], '', 3); ?></td>
<?php } ?>
   <td align="center" class="font" style="width:80px;">Total</td>
  </tr>
<?php $sql=mysql_query("select HqId,HqqName,CostCenter as StateId, state_name as StateName,state_name as StateCode from hrm_employee_general g left JOIN core_states st ON g.CostCenter=st.id group by state_name order by state_name ASC, HqqName ASC",$con); $SNo=1; while($res=mysql_fetch_assoc($sql)){  ?>
<tr id="TR<?php echo $SNo; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo $SNo; ?>" onClick="FucChk(<?php echo $SNo; ?>)" /></td>
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo $SNo; ?>&nbsp;</td>
   <td align="" class="font1">&nbsp;<?php echo $res['StateCode']; ?></td>
   <td align="" class="font1">&nbsp;<?php echo strtoupper($res['HqName']); ?></td>
<?php $sqlDept=mysql_query("select * from core_departments where is_active=1 order by department_name",$con); while($resDept=mysql_fetch_assoc($sqlDept)){ 
$sqlEmp=mysql_query("select GeneralId from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND HqId=".$res['HqId']." AND DepartmentId=".$resDept['id'],$con); $rowEmp=mysql_num_rows($sqlEmp); ?>   
   <td align="center" class="font1"><?php if($rowEmp>0){echo $rowEmp;} ?></td>
<?php } ?>
<?php $sqlEmpHq=mysql_query("select GeneralId from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND HqId=".$res['HqId'],$con); $rowEmpHq=mysql_num_rows($sqlEmpHq); ?>   
   <td align="center" class="font1" bgcolor="#59ACFF"><?php if($rowEmpHq>0){echo $rowEmpHq;} ?></td>
  </tr>
 <?php $SNo++;} ?>
 <tr bgcolor="#59ACFF">
   <td align="right" colspan="4" style="width:50px;" class="font1">TOTAL:&nbsp;</td>
<?php $sqlDept=mysql_query("select * from core_departments where is_active=1 order by department_nameC",$con); while($resDept=mysql_fetch_assoc($sqlDept)){ 
$sqlEmpt=mysql_query("select GeneralId from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND DepartmentId=".$resDept['id'],$con); $rowEmpt=mysql_num_rows($sqlEmpt); ?>   
   <td align="center" class="font1"><?php if($rowEmpt>0){echo $rowEmpt;} ?></td>
<?php } ?>
<?php $sqlEmpHqt=mysql_query("select GeneralId from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId,$con); $rowEmpHqt=mysql_num_rows($sqlEmpHqt); ?>   
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