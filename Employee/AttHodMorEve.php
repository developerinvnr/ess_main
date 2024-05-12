<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="../AdminUser/css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.th{color:#ffffff;font-family:Times New Roman;font-size:12px;font-weight:bold;text-align:center;height:24px;} 
.tdl{color:#000000;font-family:Times New Roman;font-size:12px;height:20px;} 
.tdc{color:#000000;font-family:Times New Roman;font-size:12px;text-align:center;height:20px;}
.tdr{color:#000000;font-family:Times New Roman;font-size:12px;text-align:right;height:20px;} 
.inpl{color:#000000;font-family:Times New Roman;font-size:11px;width:99%;height:20px;} 
.inpc{color:#000000;font-family:Times New Roman;font-size:11px;text-align:center;width:99%;height:20px;}
.inpr{color:#000000;font-family:Times New Roman;font-size:11px;text-align:right;width:99%;height:20px;} 
.TableHead { font-family:Times New Roman;color:#000000;font-size:20px;font-weight:bold; }
.CBtn {background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px;background-color:#E0DBE3;border-color:#FFFFFF;}
</style>
<script type="text/javascript" language="javascript">
function SelectMonth(value) 
{ var da = document.getElementById("da").value;  var Y = document.getElementById("Year").value; 
  var x = 'AttHodMorEve.php?m='+value+'&Y='+Y+'&da='+da+"&yy=4%rer&uu=true&rr=false&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101"; window.location=x;}
  
function SelectDate(value)
{ var M = document.getElementById("Month").value; var Y = document.getElementById("Year").value;  
  var x = 'AttHodMorEve.php?m='+M+'&Y='+Y+'&da='+value+"&yy=4%rer&uu=true&rr=false&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101"; window.location=x; }  
  
function SelectYear(value)
{ var M = document.getElementById("Month").value; var da = document.getElementById("da").value;  
  var x = 'AttHodMorEve.php?m='+M+'&Y='+value+'&da='+da+"&yy=4%rer&uu=true&rr=false&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101"; window.location=x; }    

function AttEmpTeam(E)
{ var M = document.getElementById("Month").value; var da = document.getElementById("da").value; var Y = document.getElementById("Year").value;  
  var C = document.getElementById("ComId").value;
  window.open("AttAppTeamMorEve.php?E="+E+"&m="+M+"&da="+da+"&Y="+Y+"&C="+C,"TeamFile","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1280,height=500");

}

</script> 
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
   <tr>
	<td valign="top">
	<table border="0" style="width:100%;float:none;" cellpadding="0">
     <tr>
	  <td valign="top">    
<?php //********************************************************************************** ?>  
<table border="0" style="margin-top:0px; width:100%; height:350px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <?php if($rowApp>0) { ?>
	   <td align="center"><a href="AttAppMorEve.php?m=<?php echo $_REQUEST['m']; ?>&da=<?php echo $_REQUEST['da']; ?>&Y=<?php echo date("Y"); ?>&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101"><img id="Img_RepMgr1" style="display:block;" src="images/RepMgr1.png" border="0"/></a>
	   <img id="Img_RepMgr" style="display:none;" src="images/RepMgr.png" border="0"/></td><?php } ?>
	   <?php if($rowHod>0) { ?>
	   <td align="center"><a href="AttHodMorEve.php?m=<?php echo $_REQUEST['m']; ?>&da=<?php echo $_REQUEST['da']; ?>&Y=<?php echo date("Y"); ?>&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101"><img id="Img_Hod1" style="display:none;" src="images/RevHod1.png" border="0"/></a>
	   <img id="Img_Hod" style="display:block;" src="images/RevHod.png" border="0"/></td><?php } ?>
	   <td style="width:20px;">&nbsp;</td>
	  <td style="width:270px;" align=""><font color="#2D002D" style='font-family:Times New Roman;' size="4">
	  <b>Morning-Evening Reports :</b></font></td>
	  <td class="td1" style="font-size:11px; width:50px;" align="left">
      <select style="font-size:12px; width:50px; height:20px; background-color:#DDFFBB; display:block;" name="da1" id="da1" onChange="SelectDate(this.value)">
	  <option value="" selected>DAY</option>
	  </option><option value="1">01</option><option value="2">02</option><option value="3">03</option><option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select>
      </td>
<?php if($_REQUEST['m']==1){$Month='JANUARY';}elseif($_REQUEST['m']==2){$Month='FEBRUARY';}elseif($_REQUEST['m']==3){$Month='MARCH';}elseif($_REQUEST['m']==4){$Month='APRIL';}elseif($_REQUEST['m']==5){$Month='MAY';}elseif($_REQUEST['m']==6){$Month='JUNE';}elseif($_REQUEST['m']==7){$Month='JULY';}elseif($_REQUEST['m']==8){$Month='AUGUST';}elseif($_REQUEST['m']==9){$Month='SEPTEMBER';}elseif($_REQUEST['m']==10){$Month='OCTOBER';}elseif($_REQUEST['m']==11){$Month='NOVEMBER';}elseif($_REQUEST['m']==12){$Month='DECEMBER';} ?>	  
	  <td class="td1" style="font-size:11px; width:100px;" align="left">
	  <select style="font-size:12px; width:100px; height:20px; background-color:#DDFFBB; display:block;" name="Month1" id="Month1" onChange="SelectMonth(this.value)">
<option value="" selected>MONTH</option>	  
<?php if(date("m")==1) { ?><option value="1">January</option><?php } ?>
<?php if(date("m")==2) { ?><option value="2">February</option><option value="1">January</option><?php } ?>			
<?php if(date("m")==3) { ?><option value="3">March</option><option value="2">February</option><?php } ?>	
<?php if(date("m")==4) { ?><option value="4">April</option><option value="3">March</option><?php } ?>					
<?php if(date("m")==5) { ?><option value="5">May</option><option value="4">April</option><?php } ?>	
<?php if(date("m")==6) { ?><option value="6">June</option><option value="5">May</option><?php } ?>	
<?php if(date("m")==7) { ?><option value="7">July</option><option value="6">June</option><?php } ?>	
<?php if(date("m")==8) { ?><option value="8">August</option><option value="7">July</option><?php } ?>	
<?php if(date("m")==9) { ?><option value="9">September</option><option value="8">August</option><?php } ?>	
<?php if(date("m")==10) { ?><option value="10">October</option><option value="9">September</option><?php } ?>	
<?php if(date("m")==11) { ?><option value="11">November</option><option value="10">October</option><?php } ?>	
<?php if(date("m")==12) { ?><option value="12">December</option><option value="11">November</option><?php } ?>	
</select>
      </td>
	  <td>&nbsp;</td>
	  <td style="font-size:14px;width:70px;font-family:Times New Roman;color:#2CB13D;">&nbsp;<b><?php echo 'Date : <font style="color:#005900;">'.$_REQUEST['da']; ?></font></b></td>
	  <td style="font-size:14px;width:150px;font-family:Times New Roman;color:#2CB13D;">&nbsp;<b><?php echo 'Month : <font style="color:#005900;">'.$Month; ?></font></b></td>
	  <td style="font-size:14px;width:100px;font-family:Times New Roman;color:#2CB13D;">&nbsp;<b><?php echo 'Year : <font style="color:#005900;">'.date("Y"); ?></font></b></td> 
	   <td class="td1" style="font-size:11px; width:170px;">			   
	   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
	   <input type="hidden" name="Year" id="Year" value="<?php echo $_REQUEST['Y']; ?>" /> 
	   <input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
	   <input type="hidden" name="da" id="da" value="<?php echo $_REQUEST['da']; ?>" />
	   <input type="hidden" name="Month" id="Month" value="<?php echo $_REQUEST['m']; ?>" />
	  </td>	 
	</tr>
   </table>
  </td>
 </tr>
 <tr>
  <td valign="top">
   <table border="1" valign="top" style="width:100%;" cellspacing="1"> 
<tr bgcolor="#7a6189">
 <td class="th" style="width:30px;">Sn</td>
 <td class="th" style="width:50px;">EC</td>
 <td class="th" style="width:200px;">Name</td>
 <td class="th" style="width:150px;">Designation</td>	
 <td class="th" style="width:100px;">Location</td>	
 <td class="th" style="width:500px;">Morning Reports</td>
 <td class="th" style="width:250px;">Evening Reports</td>
 <td class="th" style="width:50px;">Team</b></td>
</tr>
<?php $SqlEmp=mysql_query("SELECT hrm_employee.EmployeeID,DepartmentId,DesigId,HqId,EmpCode,Fname,Sname,Lname,Married,Gender,DR FROM hrm_employee_reporting INNER JOIN hrm_employee ON hrm_employee_reporting.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_reporting.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_reporting.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee_reporting.HodId=".$EmployeeId." AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by EmpCode ASC", $con); $Sno=1; while($ResEmp=mysql_fetch_array($SqlEmp)) { 
if($ResEmp['DR']=='Y'){$MS='Dr.';} elseif($ResEmp['Gender']=='M'){$MS='Mr.';} elseif($ResEmp['Gender']=='F' AND $ResEmp['Married']=='Y'){$MS='Mrs.';} elseif($ResEmp['Gender']=='F' AND $ResEmp['Married']=='N'){$MS='Miss.';}  $Ename=$ResEmp['Fname'].' '.$ResEmp['Sname'].' '.$ResEmp['Lname'];  $month=$_REQUEST['m'];
$SqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResEmp['DepartmentId'], $con); $ResDept=mysql_fetch_assoc($SqlDept);	
$SqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$ResEmp['DesigId'], $con); $ResDesig=mysql_fetch_assoc($SqlDesig);
$sqlHQ=mysql_query("select HqName from hrm_headquater where HqId=".$ResEmp['HqId'], $con); $resHQ=mysql_fetch_assoc($sqlHQ);

$sqlRpt=mysql_query("select * from hrm_employee_moreve_report where EmployeeID=".$ResEmp['EmployeeID']." AND MorEveDate='".$_REQUEST['Y']."-".$_REQUEST['m']."-".$_REQUEST['da']."'", $con); $resRpt=mysql_fetch_assoc($sqlRpt);

$sqlch=mysql_query("select * from hrm_employee_separation where EmployeeID=".$ResEmp['EmployeeID']." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con); $rowch=mysql_num_rows($sqlch);
?>

<tr style="background-color:<?php if($rowch>0){echo '#FFFF6C';}else{echo '#FFFFFF';} ?>;">
 <td class="tdc"><?php echo $Sno; ?></td>
 <td bgcolor="#75BAFF" class="tdc"><b><?php echo $ResEmp['EmpCode']; ?></b></td>
 <td class="tdl"><?php echo strtoupper($Ename); ?></td>
 <td class="tdl"><?php echo $ResDesig['DesigName']; ?></td>
 <td class="tdc"><?php echo $resHQ['HqName']; ?></td>	
 <td bgcolor="#FFFFD2" class="tdc"<?php echo '<b>'.$resRpt['MorDateTime'].'</b>  '.$resRpt['MorReports']; ?></td>	
 <td bgcolor="#D2FFD2" class="tdc"><?php echo '<b>'.$resRpt['EveDateTime'].'</b>  '.$resRpt['EveReports']; ?></td>
 <?php $sqlE=mysql_query("select * from hrm_employee_reporting where AppraiserId=".$ResEmp['EmployeeID'], $con); $rowE=mysql_num_rows($sqlE);?>	
 <td class="tdc"><?php if($rowE>0){ ?>
 <a href="#" onClick="AttEmpTeam(<?php echo $ResEmp['EmployeeID']; ?>)"><font color="#000099">Team</font></a><?php } else '&nbsp;'; ?></td>	
</tr>
<?php $Sno++; } ?>

</table>
<?php //***************************************************************************************** ?>
		   </td>
		  </tr>
		</table>
	  </td>
	</tr>	
	<tr><td valign="top" align="center">&nbsp;</td></tr>
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

