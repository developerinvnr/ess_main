<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
require_once('PhpFile/AttendanceP.php');
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.cell {color:#FFFFFF;font-family:Times New Roman;font-size:14px;font-weight:bold; text-align:center;} 
.cell2 {color:#000;font-family:Times New Roman;font-size:14px;} .cell3 {color:#030303;font-family:Times New Roman;font-size:14px; font-weight:bold;} 
.cellOpe {color:#FFFFFF;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe2 {color:#000;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe3 {color:#000;font-family:Times New Roman; width:30px;height:20px; font-size:14px; font-weight:bold;}
.inner_table{height:450px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '450px' }); })
/*function SelectMonth(value) 
{ var D = document.getElementById("Department").value; var Y = document.getElementById("Year").value; var x = 'AttReport.php?m='+value+'&D='+D+'&Y='+Y; window.location=x;}

function SelectYear(value,m) 
{ var D = document.getElementById("Department").value;  var x = 'AttReport.php?m='+m+'&D='+D+'&Y='+value; window.location=x;}
								  
function SelectMonthDept(value)
{ var M = document.getElementById("Month").value; var Y = document.getElementById("Year").value;  var x = 'AttReport.php?m='+M+'&D='+value+'&Y='+Y; window.location=x; }*/

function FunClick()  
{
 if(document.getElementById("Month").value==''){alert("select month!"); return false;}
 else if(document.getElementById("Year").value==''){alert("select year!"); return false;}
 else if(document.getElementById("Department").value==''){alert("select department!"); return false;}
 else{ window.location='AttReport.php?m='+document.getElementById("Month").value+'&D='+document.getElementById("Department").value+'&Y='+document.getElementById("Year").value; }
}

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
	  <td valign="top" align="center" style="width:100%;" id="MainWindow"><br>
<?php //**************************************************************************?>
<?php //*********START*****START*****START******START******START*****************************?>
<?php //*********************************************************************?>	  
<table border="0" style="margin-top:0px; width:100%; height:350px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td style="width:370px;" align="right">&nbsp;<font color="#2D002D" style='font-family:Times New Roman;' size="4">
	  <b>Attendance Reports : Year :</b></font></td>
	  <td style="width:80px;"><select style="font-size:12px; width:60px; height:20px; background-color:#DDFFBB;" name="Year" id="Year" onChange="SelectYear(this.value,<?php echo $_REQUEST['m']; ?>)">
	      <option value="<?php echo $_REQUEST['Y']; ?>"><?php echo $_REQUEST['Y']; ?></option>
              <?php for($i=date("Y"); $i>=2013; $i--){ ?>
<?php if($_REQUEST['Y']!=$i){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?>
<?php } ?>
	      </select></td> <td width="100" align="right"><font color="#2D002D" style='font-family:Times New Roman;' size="4"><b>Month :&nbsp;</b></font></td>
	  <td width="70%">
	    <table border="0">
		            <tr>
					   <td class="td1" style="font-size:11px; width:120px;" align="left">
                         <select style="font-size:12px; width:100px; height:20px; background-color:#DDFFBB; display:block;" name="Month" id="Month" onChange="SelectMonth(this.value)">
<option value="<?php echo $_REQUEST['m']; ?>"><?php echo date("F",strtotime(date("Y-".$_REQUEST['m']."-d"))); ?></option>
<option value="1">JANUARY</option><option value="2">FEBRUARY</option><option value="3">MARCH</option><option value="4">APRIL</option><option value="5">MAY</option><option value="6">JUNE</option><option value="7">JULY</option><option value="8">AUGUST</option><option value="9">SEPTEMBER</option><option value="10">OCTOBER</option><option value="11">NOVEMBER</option><option value="12">DECEMBER</option></select></td>
                       <td class="td1" style="font-size:11px; width:170px;">			   
                       <select style="font-size:11px; width:120px; height:19px; background-color:#DDFFBB; display:block;" name="Department" id="Department" onChange="SelectMonthDept(this.value)">
<?php if($_REQUEST['D']!='All') { $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['D'], $con); $resD=mysql_fetch_assoc($sqlD); ?> 
                      <option value="<?php echo $_REQUEST['D']; ?>" style="margin-left:0px; background-color:#84D9D5;">&nbsp;<?php echo $resD['DepartmentCode']; ?></option>  
<?php  } else { ?>	  <option value="All" style="margin-left:0px; background-color:#84D9D5;">&nbsp;All</option><?php } ?>						   
					   <?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?><option value="All">&nbsp;All</option></select>
					   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
					   <input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
                      </td>
					  <td><input type="button" value="click" style="width:60px;" onClick="FunClick()" /></td>
					  <td align="left"><input type="button" name="back" id="back" style="width:90px;display:block;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"></td>
		 <td align="left" style="width:70px;"><input type="button" name="RefreshVtype" id="RefreshVtype" style="width:90px;" value="refresh" onClick="javascript:window.location='AttReport.php'"/></td>
					  <td width="900" align="left" class="cell3">&nbsp;&nbsp;&nbsp;
					  <font color="#0080FF">P</font>- Present, <font color="#0080FF">A</font>- Absent,
					  <font color="#0080FF">CH</font>- Half day CL, <font color="#0080FF">SH</font>- Half day SL, <font color="#0080FF">H</font>- Holiday,  
					  <font color="#0080FF">OD</font>- Outdoor Duties  </td>
		           </tr>
         </table>
	  </td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { 

$BY=date("Y")-1;
if($_REQUEST['Y']>=date("Y"))
{ $AttTable='hrm_employee_attendance'; $AttReport='hrm_employee_attreport'; 
  $LeaveTable='hrm_employee_monthlyleave_balance';  }
elseif($_REQUEST['Y']==$BY AND date("m")=='01' AND $_REQUEST['m']==12)
{ $AttTable='hrm_employee_attendance'; $AttReport='hrm_employee_attreport';
  $LeaveTable='hrm_employee_monthlyleave_balance';  }
elseif($_REQUEST['Y']==$BY AND $_REQUEST['m']<12)
{ $AttTable='hrm_employee_attendance_'.$_REQUEST['Y']; $AttReport='hrm_employee_attreport_'.$_REQUEST['Y']; 
  $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['Y'];  }
else
{$AttTable='hrm_employee_attendance_'.$_REQUEST['Y']; $AttReport='hrm_employee_attreport_'.$_REQUEST['Y']; 
 $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['Y'];  }

?>	
 <tr>
<?php //**************** Open ********************************************** ?> 
<td align="left" id="type" valign="top" style="width:100%;">             
<form method="post" name="FormAtt" onSubmit="return validate(this)">
   <table border="0" cellpadding="0" cellspacing="0">
     <tr><td style="width:100%;">
	   <table border="1" id="table1" cellpadding="0" cellspacing="0" style="width:100%;">
	   
<div class="thead">
<thead>	   
 <tr style="background-color:#7a6189;">
  <td rowspan="2" class="cell" style="width:30px;"><b>SNo</b></td>		 
  <td rowspan="2" class="cell" style="width:30px;"><b>EC</b></td>
  <td rowspan="2" class="cell" style="width:250px;"><b>Name</b></td>
  <td class="cell" colspan="<?php echo date("t",strtotime(date("Y-".$_REQUEST['m']."-d"))); ?>" style="text-align:left;"><b>Month :</b><font style="font:Times New Roman; color:#EAEF18; font-size:14px; background-color:#7a6189; font-weight:bold;"><?php echo date("F",strtotime(date("Y-".$_REQUEST['m']."-d"))); ?></font>&nbsp;&nbsp;&nbsp;<?php if($_REQUEST['D']!='All') { $sqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['D'], $con); $resD=mysql_fetch_assoc($sqlD); }?><b>Department :</b>&nbsp;<font style="font:Times New Roman; color:#EAEF18; font-size:14px; background-color:#7a6189;font-weight:bold;"><?php if($_REQUEST['D']!='All') {echo $resD['DepartmentName']; } else { echo  'All'; } ?></font></td>
  <td class="cell" colspan="5"><b>Total</b></td>
  <td rowspan="2" class="cell" style="width:35px;"><b>Paid</b></td>
 </tr>
 <tr style="background-color:#7a6189;">
<?php $month=$_REQUEST['m']; $id=$_REQUEST['m']; $Y=$_REQUEST['Y']; ?>
<?php for($i=1; $i<=date("t",strtotime(date("Y-".$_REQUEST['m']."-d"))); $i++) { ?> 
  <td align="center" class="cell" style="background-color:<?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0) {echo '#6B983A';} else {echo '#7a6189';} ?>;" width="30"><?php echo $i; ?></td><?php } ?>		 
  <td class="cellOpe" align="center" width="35">Le</td>
  <td class="cellOpe" align="center" width="35">Ho</td>
  <td class="cellOpe" align="center" width="35">Od</td>
  <td class="cellOpe" align="center" width="35">Pr</td>
  <td class="cellOpe" align="center" width="35">Ab</td>
 </tr>
</thead>
</div> 		 
<?php if($_REQUEST['D']!='All'){ $SqlEmp=mysql_query("select e.*,g.* from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.EmpStatus!='De' AND g.DepartmentId=".$_REQUEST['D']." AND e.CompanyId=".$CompanyId." AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by e.EmpCode ASC", $con); }
      if($_REQUEST['D']=='All'){ $SqlEmp=mysql_query("select e.*,g.* from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.EmpStatus!='De' AND e.CompanyId=".$CompanyId." AND g.DepartmentId!=17 AND g.DepartmentId!=18 AND g.DepartmentId!=23 AND g.DepartmentId!=0 AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by e.EmpCode ASC", $con); }
$Sno=1; $SqlRows=mysql_num_rows($SqlEmp); while($ResEmp=mysql_fetch_array($SqlEmp)) { 
$Ename=$ResEmp['Fname'].' '.$ResEmp['Sname'].' '.$ResEmp['Lname']; $month=$_REQUEST['m']; ?>
<div class="tbody">
<tbody>
 <tr style="background-color:#FFF;">
  <td class="cell2" align="center"><?php echo $Sno; ?></td>
  <td class="cell2" align="center"><?php echo $ResEmp['EmpCode']; ?></td>
  <td class="cell2" style="text-transform:capitalize;">&nbsp;<?php echo strtolower($Ename); ?>
  <input type="hidden" name="EmpId" id="EmpId" value="<?php echo $ResEmp['EmployeeID']; ?>" /></td>  
<?php $SqlEmp2=mysql_query("SELECT * FROM ".$AttReport." WHERE EmployeeID =".$ResEmp['EmployeeID']." AND Year=".$Y." AND Month=".$month, $con); $ResEmp2=mysql_fetch_array($SqlEmp2); for($i=1; $i<=date("t",strtotime(date("Y-".$_REQUEST['m']."-d"))); $i++) { ?>
  <td align="center" class="cell2" <?php if(date("w",strtotime(date($Y.'-'.$month.'-'.$i)))==0) {echo 'bgcolor="#6B983A"';} ?> width="20" <?php if($ResEmp2['A'.$i]=='HO'){echo 'bgcolor="#A9D3F5"';} elseif($ResEmp2['A'.$i]=='CL' OR $ResEmp2['A'.$i]=='SL' OR $ResEmp2['A'.$i]=='PL' OR $ResEmp2['A'.$i]=='EL' OR $ResEmp2['A'.$i]=='CH' OR $ResEmp2['A'.$i]=='SH' OR $ResEmp2['A'.$i]=='PH' OR $ResEmp2['A'.$i]=='FL' OR $ResEmp2['A'.$i]=='TL' OR $ResEmp2['A'.$i]=='ACH' OR $ResEmp2['A'.$i]=='ASH' OR $ResEmp2['A'.$i]=='APH'){echo 'bgcolor="#F8FBBB"';} elseif($ResEmp2['A'.$i]=='A'){echo 'bgcolor="#FAD6CF"';} elseif($ResEmp2['A'.$i]=='P' OR $ResEmp2['A'.$i]=='WFH'){echo 'bgcolor="#FFFFFF"';} elseif($ResEmp2['A'.$i]=='OD'){echo 'bgcolor="#FFA4D1"';} ?> ><?php if($ResEmp2['A'.$i]==''){echo '&nbsp;';} else {echo $ResEmp2['A'.$i];} ?></td><?php } ?> 

<?php $sqlTotAtt=mysql_query("select MonthAtt_TotLeave, MonthAtt_TotHO, MonthAtt_TotOD, MonthAtt_TotPR, MonthAtt_TotAP, MonthAtt_TotPaidDay from ".$LeaveTable." where Year=".$Y." AND EmployeeID=".$ResEmp['EmployeeID']." AND Month=".$month."", $con); $resTotAtt=mysql_fetch_assoc($sqlTotAtt); ?>
  <td class="cellOpe2" align="center" style="background-color:#F8FBBB;" width="35" valign="top"><?php if($resTotAtt['MonthAtt_TotLeave']!=''){ echo floatval($resTotAtt['MonthAtt_TotLeave']); } else {echo '&nbsp;';} ?></td>
  <td class="cellOpe2" align="center" style="background-color:#A9D3F5;" width="35" valign="top"><?php if($resTotAtt['MonthAtt_TotHO']!=''){ echo floatval($resTotAtt['MonthAtt_TotHO']); } else {echo '&nbsp;';} ?></td>
  <td class="cellOpe2" align="center" style="background-color:#FFA4D1;" width="35" valign="top"><?php if($resTotAtt['MonthAtt_TotOD']!=''){ echo floatval($resTotAtt['MonthAtt_TotOD']); } else {echo '&nbsp;';} ?></td>
  <td class="cellOpe2" align="center" style="background-color:#FFFFFF;" width="35" valign="top"><?php if($resTotAtt['MonthAtt_TotPR']!=''){ echo floatval($resTotAtt['MonthAtt_TotPR']); } else {echo '&nbsp;';} ?></td>
  <td class="cellOpe2" align="center" style="background-color:#FAD6CF;" width="35" valign="top"><?php if($resTotAtt['MonthAtt_TotAP']!=''){ echo floatval($resTotAtt['MonthAtt_TotAP']); } else {echo '&nbsp;';} ?></td>   
   
  <td style="color:#000;font-family:Times New Roman; width:35px; font-size:14px;height:20px; background-color:#B6F1BD; font-weight:bold;" align="center"><?php if($resTotAtt['MonthAtt_TotPaidDay']>26){$PaidDay=26;}else{$PaidDay=$resTotAtt['MonthAtt_TotPaidDay'];} if($PaidDay!=''){ echo floatval($PaidDay); } else {echo '&nbsp;';} ?></td>
</tr>
</tbody>
</div>
<?php $Sno++; } ?>
 
	   </table>
	    </td>
		</tr>
		
		
	   </table>
	    </td>
		</tr>

  </table>
 </form>     
</td>
<?php //****************************** Close ************************?>    
  

 </tr>
<?php } ?> 
</table>
		
<?php //***************************************************************************?>
<?php  //*****************END*****END*****END******END******END**********************?>
<?php //**************************************************************************************************?>
		
	  </td>
	</tr>
	
	<?php /*?><tr>
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
	</tr><?php */?>
  </table>
 </td>
</tr>
</table>
</body>
</html>