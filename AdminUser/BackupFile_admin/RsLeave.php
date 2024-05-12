<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.fonttd{color:#FFFFFF;font-family:Times New Roman;font-size:13px;text-align:center;} .fonttd2{color:#000;font-family:Times New Roman;font-size:13px;}
.cell {color:#FFFFFF;font-family:Times New Roman;font-size:14px;font-weight:bold;} 
.cell2 {color:#000;font-family:Times New Roman;font-size:14px;} .cell3 {color:#030303;font-family:Times New Roman;font-size:14px; font-weight:bold;} 
.cellOpe {color:#FFFFFF;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe2 {color:#000;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe3 {color:#000;font-family:Times New Roman; width:30px;height:20px; font-size:14px; font-weight:bold;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/MasterAjaxCall.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script type="text/javascript" src=""></script>
<script type="text/javascript" language="javascript">
/*function SelectMonth(value) 
{ var D = document.getElementById("Department").value; var Y = document.getElementById("Year").value; var x = 'RsLeave.php?m='+value+'&D='+D+'&Y='+Y; window.location=x;}

function SelectYear(value,m) 
{ var D = document.getElementById("Department").value;  var x = 'RsLeave.php?m='+m+'&D='+D+'&Y='+value; window.location=x;}
								  
function SelectMonthDept(value)
{ var M = document.getElementById("Month").value; var Y = document.getElementById("Year").value;  var x = 'RsLeave.php?m='+M+'&D='+value+'&Y='+Y; window.location=x; }*/

function FunClick()  
{
 if(document.getElementById("Month").value==''){alert("select month!"); return false;}
 else if(document.getElementById("Year").value==''){alert("select year!"); return false;}
 else if(document.getElementById("Department").value==''){alert("select department!"); return false;}
 else{ window.location='RsLeave.php?ls=10&wer=123grtd&se=reew&w=ee102&m='+document.getElementById("Month").value+'&D='+document.getElementById("Department").value+'&Y='+document.getElementById("Year").value+'&dd=truevalu&fals=truefalse'; }
}

function ReadLVReg(EI,Y)
{window.open("EmpCheckRsLeaveReg.php?EI="+EI+"&Y="+Y,"HForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=920,height=600");}
</script>   
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
	  <td valign="top" align="left"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //*******************************************************************************************?>
<?php //****************START*****START*****START******START******START*********************************?>
<?php //*************************************************************************************?>
<?php if($_REQUEST['m']==1){$SelM='January';} if($_REQUEST['m']==2){$SelM='February';} if($_REQUEST['m']==3){$SelM='March';}if($_REQUEST['m']==4){$SelM='April';} 
if($_REQUEST['m']==5){$SelM='May';} if($_REQUEST['m']==6){$SelM='June';} if($_REQUEST['m']==7){$SelM='July';} if($_REQUEST['m']==8){$SelM='August';} 
if($_REQUEST['m']==9){$SelM='September';} if($_REQUEST['m']==10){$SelM='October';} if($_REQUEST['m']==11){$SelM='November';} if($_REQUEST['m']==12){$SelM='December';} ?> 	  
<table border="0" style="margin-top:0px; width:100%; height:350px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td style="width:370px;" align="right">&nbsp;<font color="#2D002D" style='font-family:Times New Roman;' size="4">
	  <b>Leave Reports : Year :</b></font></td>
	  <td style="width:80px;"><select style="font-size:12px; width:60px; height:20px; background-color:#DDFFBB;" name="Year" id="Year" onChange="SelectYear(this.value,<?php echo $_REQUEST['m']; ?>)"><option value="<?php echo $_REQUEST['Y']; ?>"><?php echo $_REQUEST['Y']; ?></option><?php for($i=date("Y"); $i>2013; $i--){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td> <td width="150" align="right"><font color="#2D002D" style='font-family:Times New Roman;' size="4"><b>Department :&nbsp;</b></font></td>
	  <td width="70%">
	    <table border="0">
		            <tr>
                       <td class="td1" style="font-size:11px; width:170px;">	
					   <input type="hidden" name="Month" id="Month" value="<?php echo date("m"); ?>" />		   
                       <select style="font-size:11px; width:120px; height:19px; background-color:#DDFFBB; display:block;" name="Department" id="Department" onChange="SelectMonthDept(this.value)">
<?php if($_REQUEST['D']!='All') { $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['D'], $con); $resD=mysql_fetch_assoc($sqlD); ?> 
                      <option value="<?php echo $_REQUEST['D']; ?>" style="margin-left:0px; background-color:#84D9D5;">&nbsp;<?php echo $resD['DepartmentCode']; ?></option>  
<?php  } else { ?>	  <option value="All" style="margin-left:0px; background-color:#84D9D5;">&nbsp;All</option><?php } ?>						   
					   <?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?><option value="All">&nbsp;All</option></select>
					   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
					   <input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
                      </td>
					  <td><input type="button" value="click" style="width:60px;" onClick="FunClick()" /></td>
					  <td>&nbsp;</td>
					  <td width="900" align="left" class="cell3">&nbsp;&nbsp;&nbsp;
					  <font color="#0080FF">CH</font>– Half day CL, <font color="#0080FF">SH</font>– Half day SL, <font color="#0080FF">OD</font>- Outdoor Duties,  
					  </td>
		           </tr>
         </table>
	  </td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
<?php //*********************************************** Open ****************************************************** ?> 
<td align="left" id="type" valign="top" width="100%">            
<form method="post" name="FormAtt" onSubmit="return validate(this)">
   <table border="0" cellpadding="0" cellspacing="0">
     <tr><td width="50">
	   <table border="1" cellpadding="0" cellspacing="0" width="750" style="margin-top:opx;">
	     <tr style="background-color:#7a6189;">
<td style="width:30px;" class="fonttd"><b>SNo</b></td>		 
<td style="width:50px;" class="fonttd"><b>EC</b></td>
<td style="width:250px;" class="fonttd"><b>Name</b></td>
<td style="width:100px;" class="fonttd">Department</td>
<td style="width:150px;" class="fonttd">HQ</td>
<td style="width:50px;" class="fonttd">Status</td>
<td style="width:50px;" class="fonttd">Details</td>
	     </tr>
		 <?php if($_REQUEST['D']!='All'){ $SqlEmp=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentId,HqId,EmpStatus from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus!='De' AND hrm_employee_general.DepartmentId=".$_REQUEST['D']." AND hrm_employee.CompanyId=".$CompanyId." order by EmpCode ASC", $con); }
      if($_REQUEST['D']=='All'){ $SqlEmp=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentId,HqId,EmpStatus from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus!='De' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId!=17 AND hrm_employee_general.DepartmentId!=18 AND hrm_employee_general.DepartmentId!=23 AND hrm_employee_general.DepartmentId!=0 order by EmpCode ASC", $con); }
$Sno=1; $SqlRows=mysql_num_rows($SqlEmp); while($ResEmp=mysql_fetch_array($SqlEmp)) { 
$Ename=$ResEmp['Fname'].' '.$ResEmp['Sname'].' '.$ResEmp['Lname']; $month=$_REQUEST['m'];
$sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResEmp['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
$sqlHq=mysql_query("select HqName from hrm_headquater where HqId=".$ResEmp['HqId'], $con); $resHq=mysql_fetch_assoc($sqlHq);
?>
<tr style="background-color:#FFFFFF;">
<td align="center" valign="top" class="fonttd2">&nbsp;<?php echo $Sno; ?></td>
<td align="center" valign="top" class="fonttd2">&nbsp;<?php echo $ResEmp['EmpCode']; ?></td>
<td valign="top" class="fonttd2">&nbsp;<?php echo strtoupper($Ename); ?>
<td valign="top" class="fonttd2">&nbsp;<?php echo strtoupper($resD['DepartmentCode']); ?></td>
<td valign="top" class="fonttd2">&nbsp;<?php echo strtoupper($resHq['HqName']); ?></td>
<td align="center" valign="top" class="fonttd2" bgcolor="<?php if($ResEmp['EmpStatus']=='D'){echo '#FFB895'; } ?>">&nbsp;<?php echo $ResEmp['EmpStatus']; ?></td>
<td align="center" class="fonttd2">
<a href="#"><img src="images/select.png" border="0" alt="Edit" onClick="ReadLVReg(<?php echo $ResEmp['EmployeeID'].', '.$_REQUEST['Y']; ?>)"></a></td>
<input type="hidden" name="EmpId" id="EmpId" value="<?php echo $ResEmp['EmployeeID']; ?>" />
</td>
<?php $Sno++; } ?>
	   </table>
	    </td></tr>
   <tr>
      <td align="left" class="fontButton" style="width:100%; "><table border="0">
		<tr>
		 <td align="left"><input type="button" name="back" id="back" style="width:90px;display:block;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"></td>
		 <td align="left" style="width:70px;"><input type="button" name="RefreshVtype" id="RefreshVtype" style="width:90px;" value="refresh" onClick="javascript:window.location='RsLeave.php?m=<?php echo $_REQUEST['m']; ?>&D=<?php echo $_REQUEST['D']; ?>&Y=<?php echo $_REQUEST['Y']; ?>'"/></td>
		 <td width="100">&nbsp;</td>
		</tr></table>
      </td>
   </tr>
  </table>
 </form>     
</td>
<?php //***************** Close ********************************?>    
  

 </tr>
<?php } ?> 
</table>
		
<?php //******************************************************************************************?>
<?php //******************END*****END*****END******END******END***************************?>
<?php //**********************************************************************************?>
		
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