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
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:18px;} .All_80{font-size:11px; height:18px; width:80px;}
.All_50{font-size:11px; height:18px; width:50px;} .All_40{font-size:11px; height:18px; width:40px;} .All_100{font-size:11px; height:18px; width:100px;} 
.All_120{font-size:11px; height:18px; width:120px;} .All_150{font-size:11px; height:18px; width:150px;}.All_200{font-size:11px; height:18px; width:200px;} 
.All_350{font-size:11px; height:18px; width:350px;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/EmpMasterAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);
function editSep(value)
{ var DI=document.getElementById("DId").value; window.location="FillEmpResignation.php?ee=4e&w=234&y=10234&a=f&ee=4e2&e=4e&w=234&y=110022344&retd=ee&wwrew=t%T@sed818&d=101&e="+value+"&DI="+DI; }	

function editTer(value)
{ var DI=document.getElementById("DId").value; window.location="FillEmpTermtion.php?ee=4e&w=234&y=10234&a=f&ee=4e2&e=4e&w=234&y=110022344&retd=ee&wwrew=t%T@sed818&d=101&e="+value+"&DI="+DI; }			

function editAbsc(value)	
{ var DI=document.getElementById("DId").value; window.location="FillEmpAbsconding.php?ee=4e&w=234&y=10234&a=f&ee=4e2&e=4e&w=234&y=110022344&retd=ee&wwrew=t%T@sed818&d=101&e="+value+"&DI="+DI; }

function edit2Reti(value)
{ var DI=document.getElementById("DId").value; window.location="FillRetiEmpResignation.php?ee=4e&w=234&y=10234&a=f&ee=4e2&e=4e&w=234&y=110022344&retd=ee&wwrew=t%T@sed818&d=101&e="+value+"&DI="+DI; }				

	
function  SelectDeptEmp(v)
{var x = "AdminReesignation.php?DpId="+v;  window.location=x;}				

</Script>     
</head>
<body class="body">
<table class="table">
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
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<table border="0" style="margin-top:0px; width:100%; height:400px;">
	<tr>
	    <td align="right" width="1%">&nbsp;</td>
		<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
		
		<td align="center" width="50%" valign="top">
		   <table border="0" width="100%">
		     <tr><td align="left" class="heading">Post Resignation<font class="font4"><b>&nbsp;<span id="msg"></span></b></font></td></tr>
			 <tr><td>
				    <table border="0">
		            <tr>
					   <td style="width:180px;"></td>
	                   <td style="font-size:11px; width:150px;">Select Department :-</td>
                       <td class="td1" style="font-size:11px; width:150px;">
                       <select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="DepartmentE" id="DepartmentE" onChange="SelectDeptEmp(this.value)"><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>Select Department</option><?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?></select>
					   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
					   <input type="hidden" name="DId" id="DId" value="<?php echo $_REQUEST['DpId']; ?>" />
                      </td>
					  <td style="width:100px;"></td>
	                  <td class="All_200" align="right" style="font-family:Times New Roman;font-size:16px;color:#007700;"><b><?php echo $msg; ?></b></td>
		           </tr>
                   </table>
				</td>
			 </tr>
			 <tr>
			   <td valign="top" style="width:1000px;"> 
<table border="1" style="width:1000px;" cellspacing="1">
<tr bgcolor="#7a6189">
	<td colspan="6" align="center" style="color:#FFFFFF;" class="All_40"><b>General Details</b></td>
	<td colspan="4" align="center" style="color:#FFFFFF;" class="All_50"><b>Post</b></td>
 </tr>
 <tr bgcolor="#7a6189">
	<td align="center" style="color:#FFFFFF;" class="All_40"><b>SNo.</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>EC</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_250"><b>Name</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_120"><b>HeadQuater</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>Department</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_300"><b>Designation</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Sep<sup>n</sup></b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Termi<sup>n</sup></b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Absconding</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Retired</b></td>
 </tr>
<?php if($_REQUEST['DpId'] AND $_REQUEST['DpId']!='') { 
      $sqlDP = mysql_query("SELECT hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,HqId,DepartmentId,DesigId,Gender,Married FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$_REQUEST['DpId'], $con) or die(mysql_error()); 
	  
      $Sno=1;  while($resDP = mysql_fetch_assoc($sqlDP)) { 
if($resDP['Gender']=='M'){$M='Mr.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='Y'){$M='Mrs.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='N'){$M='Miss.';} 
	  $Name=$M.' '.$resDP['Fname'].' '.$resDP['Sname'].' '.$resDP['Lname']; $LEC=strlen($resDP['EmpCode']); 
      if($LEC==1){$EC='000'.$resDP['EmpCode'];} if($LEC==2){$EC='00'.$resDP['EmpCode'];} if($LEC==3){$EC='0'.$resDP['EmpCode'];} if($LEC>=4){$EC=$resDP['EmpCode'];}	  
?>
 <tr bgcolor="#FFFFFF"> 
		<td align="center" style="" class="All_40"><?php echo $Sno; ?></td>
		<td align="center" style="" class="All_50">&nbsp;<?php echo $EC; ?></td>
		<td style="" class="All_250">&nbsp;<?php echo $Name; ?></td>
		<td style="" class="All_120">&nbsp;
		<?php $sqlHQ = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$resDP['HqId'], $con) or die(mysql_error()); 
		      $resHQ = mysql_fetch_assoc($sqlHQ); echo $resHQ['HqName'];?>
		</td>
		<td style="" class="All_100">&nbsp;
		<?php $sqlDept = mysql_query("SELECT DepartmentCode FROM hrm_department WHERE DepartmentId=".$resDP['DepartmentId'], $con) or die(mysql_error()); 
		      $resDept = mysql_fetch_assoc($sqlDept); echo $resDept['DepartmentCode'];?>
		</td>
		<td style="" class="All_300">&nbsp;
		<?php $sqlDesig = mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$resDP['DesigId'], $con) or die(mysql_error()); 
		      $resDesig = mysql_fetch_assoc($sqlDesig); echo $resDesig['DesigName'];?>
		</td>
		<td align="center" valign="middle" class="All_50">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
<a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="editSep(<?php echo $resDP['EmployeeID']; ?>)"></a>
<?php } ?>
		</td>
		
		<td align="center" valign="middle" class="All_50">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
<a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="editTer(<?php echo $resDP['EmployeeID']; ?>)"></a>
<?php } ?>
		</td>
		
		<td align="center" valign="middle" class="All_50">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
<a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="editAbsc(<?php echo $resDP['EmployeeID']; ?>)"></a>
<?php } ?>
		</td>
		
<?php $sqlPr=mysql_query("select DOB from hrm_employee_general where EmployeeID=".$resDP['EmployeeID'], $con); $resPr=mysql_fetch_assoc($sqlPr); 
$date = date_create($resPr['DOB']); date_add($date, date_interval_create_from_date_string('58 years')); $After58yDOB=date_format($date, 'Y-m-d'); 
$date2 = date_create($After58yDOB); date_sub($date2, date_interval_create_from_date_string('30 days')); $Before30y58 = date_format($date2, 'Y-m-d'); 
$date3 = date_create($After58yDOB); date_add($date3, date_interval_create_from_date_string('10 days')); $After10y58=date_format($date3, 'Y-m-d');
?>		
		
		<td align="center" valign="middle" class="All_150">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
		<?php if(date('Y-m-d')>=$Before30y58){ echo date("d-m-Y",strtotime($After58yDOB));?>&nbsp;&nbsp;
		<a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit2Reti(<?php echo $resDP['EmployeeID']; ?>)"></a>
		<?php } ?>
<?php } ?>
		</td>
</tr>
<?php $Sno++; } }?>
</table>
                 </td>	
				 </tr>
				 <?php //---------------------------------------Display Record----------------------------------------------------------------- ?>
				 <tr><td><span id="DeptEmpName"></span></td></tr> 
				 <tr><td bgcolor="#B6E9E2" colspan="6"></td></tr>
		   </table>  		
		</td>
		
        <?php } ?>
		<?php //-------------------------------------------------------------------------------------------------------- ?>
		
		<td align="left" width="20%">&nbsp;</td>
	</tr>
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