<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************************************************************************************************
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>

<style>.thh{font-family:Times New Roman;font-size:18px;font-weight:bold;}
.th{color:#FFF;font-family:Times New Roman;font-size:12px;font-weight:bold;text-align:center;}
.td{color:#000;font-family:Times New Roman;font-size:12px;text-align:left;}
.tdc{color:#000;font-family:Times New Roman;font-size:12px;text-align:center;}
.tdr{color:#000;font-family:Times New Roman;font-size:12px;text-align:right;}
.input{color:#000;font-family:Times New Roman;font-size:12px;text-align:left;width:100%;}
.inner_table{height:400px;overflow-y:auto;width:auto;}
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<script type="text/javascript" language="javascript">
function SelectDept(v){ window.location='EmpTrvRunKM.php?action=DeptElig&value='+v;}

function FunElig(id)
{ window.open("EmpEligElig.php?id="+id,"EForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=800,height=600"); }

$(document).ready(function () { $("#table1").freezeHeader({ 'height': '450px' }); })
</script>
</head>
<body class="body">
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td></tr>
 
  <tr>
	<td valign="top" align="center"  width="100%" id="MainWindow"><br>	  
    <table border="0" style="margin-top:0px; width:100%; height:300px;">
    <tr>
    <td align="left" id="type" valign="top" style="display:block; width:100%">             
	     
<?php //*********************************************** Open Type******************************************************?> 	     

	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr><td class="thh">Running Km: &nbsp;<select style=" font-family:Times New Roman;font-size:12px;width:150px;height:22px;background-color:#DDFFBB;" name="Dept" id="Dept" onChange="SelectDept(this.value)"><option value="" style="margin-left:0px;" selected>Select Department</option><?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentCode!='MANAGEMENT' order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)){?>
<option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?><option value="All">&nbsp;All</option></select>

&nbsp;&nbsp;
<a href="https://www.vnress.in/Employee/EmpTrvTrvRunKM.php?ID=<?=$EmployeeId?>" target="_blank" style="font-size:12px;">Other Team Group</a>

&nbsp;
<?php if($_REQUEST['value']>0 OR $_REQUEST['value']=='All'){ ?>
<a href="#" onclick="ExportA('<?=$_REQUEST['value']?>',<?=$CompanyId;?>)" style="font-size:12px;">Export</a>    
<?php } ?>

<script>
 function ExportA(v,c)
 {   
     window.open("EmpTrvRunKMExp.php?v="+v+"&c="+c,"XlsForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=50,height=50"); 
 }
</script>

</td>

 

</tr>
		  <tr>
		   <td valign="top" width="110%"> 
	   
<?php //***************************************************************************** ?>	   
<table border="1" id="table1" width="100%" cellspacing="1">
 <div class="thead">
 <thead>
 <tr bgcolor="#7a6189">
  <td rowspan="4" class="th" style="width:2%;"><b>Sn</b></td>
  <td rowspan="2" class="th" style="width:3%;"><b>EC</b></td>
  <td rowspan="2" class="th" style="width:15%;"><b>Name</b></td>
  <td rowspan="2" class="th" style="width:5%;"><b>Dept</b></td>
  <td rowspan="2" class="th" style="width:3%;"><b>Grade</b></td>
  <td rowspan="2" class="th" style="width:5%;"><b>Policy Entry Date</b></td>
  <td rowspan="2" class="th" style="width:5%;"><b>Policy Type</b></td>
  <td colspan="2" class="th" style="width:10%;"><b>Running KM</b></td>
 </tr>
 <tr bgcolor="#7a6189">
  <td class="th" style="width:3%;background-color:#499300;"><b>Before 1 Apr22</b></td>
  <td class="th" style="width:3%;background-color:#499300;"><b>FY: 2022-2023</b></td>
 </tr>
 </thead>
 </div>
 
<?php
  if($CompanyId==1){ $DbName='expense'; }
  elseif($CompanyId==3){ $DbName='expense_nr'; }
  elseif($CompanyId==4){ $DbName='expense_tl'; }
  define('HOST2','localhost');
  define('USER2','expense_user'); 
  define('PASS2','expense@192'); 
  define('dbexpro',$DbName);
  $con2=mysql_connect(HOST2,USER2,PASS2,true) or die(mysql_error());
  $exprodb=mysql_select_db(dbexpro,$con2) or die(mysql_error());
?>
 
<?php if($_REQUEST['value']=='All') {$sql=mysql_query("select g.EmployeeID, EmpCode, Fname, Sname, Lname, g.DepartmentId, DepartmentCode, GradeValue, VehiclePolicy_EntryDate, VehiclePolicy_Type, Running_TotalKM from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_grade gr ON g.GradeId=gr.GradeId where e.CompanyId=".$CompanyId." AND e.EmpStatus='A' order by e.EmpCode ASC", $con); }
else {$sql=mysql_query("select g.EmployeeID, EmpCode, Fname, Sname, Lname, g.DepartmentId, DepartmentCode, GradeValue, VehiclePolicy_EntryDate, VehiclePolicy_Type, Running_TotalKM from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_grade gr ON g.GradeId=gr.GradeId where g.DepartmentId=".$_REQUEST['value']." AND e.CompanyId=".$CompanyId." AND e.EmpStatus='A' order by e.EmpCode ASC", $con); } 
$Sno=1; while($res=mysql_fetch_array($sql)){ ?> 
<div class="tbody">
<tbody>
<tr bgcolor="#FFFFFF">
 <td class="tdc"><?php echo $Sno; ?></td>
 <td class="tdc"><?php echo $res['EmpCode']; ?></td>
 <td class="td"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname'];?></td>
 <td class="tdc"><?php echo $res['DepartmentCode']; ?></td>
 <td class="tdc"><?php echo $res['GradeValue']; ?></td>
 <td class="tdc"><?php echo $res['VehiclePolicy_EntryDate']; ?></td>
 <td class="tdc"><?php echo $res['VehiclePolicy_Type']; ?></td>
 <td class="tdc"><?php if($res['Running_TotalKM']>0){ echo floatval($res['Running_TotalKM']); } ?></td>
 
 <?php $sDl2=mysql_query("SELECT SUM(y1.`Totalkm`) as TotKM FROM `y4_24_wheeler_entry` y1 inner join y4_expenseclaims y2 on y1.ExpId=y2.ExpId where y2.CrBY=".$res['EmployeeID']." AND y2.ClaimStatus!='Deactivate' AND y2.ClaimAtStep>=5",$con2); 
  $rDl2=mysql_fetch_assoc($sDl2); ?>
  <td class="tdc"><?php if($rDl2['TotKM']>0){ echo $rDl2['TotKM']; } ?></td>
 
</tr>
</tbody>
</div>
 <?php $Sno++; } ?> 
</table>
			
<?php //************************************************************************************************ ?>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;">
		    <tr><td align="center" valign="top" width="100">&nbsp;</td></tr>
	        </table>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;"><tr><td align="center" valign="top">&nbsp;&nbsp;</td></tr></table>
		   </td>
		  </tr>
		</table>
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