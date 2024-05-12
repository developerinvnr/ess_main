<?php session_start(); 
require_once('config/config.php');
//**********************************
if(isset($_POST['SaveEdit']))
{
    
 if($_POST['ConfDate']=='00-00-0000'){ $ConfDate=date('Y-m-d', strtotime("+".$_POST['ConfirmMonth']." months", strtotime($_POST['DateJoining'])));}
 else{ $ConfDate=$_POST['ConfDate']; }
 
 $sql=mysql_query("update hrm_employee_general set DateConfirmationYN='".$_POST['ConfirmRep']."', ConfirmHR='".$_POST['ConfirmHr']."', DateConfirmation='".date("Y-m-d",strtotime($ConfDate))."', ConfirmMonth=".$_POST['ConfirmMonth']." where EmployeeID=".$_POST['EmpId'], $con);
 if($sql){$msg='Data Successfully Updated..';}
}
   

if($_REQUEST['action']=='conf' AND $_REQUEST['action']!='') 
{ $sql = mysql_query("SELECT hrm_employee.*,DateJoining,DepartmentId,GradeId,DesigId,DateConfirmationYN,ConfirmHR,DateConfirmation,ConfirmMonth FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee.EmployeeID=".$_REQUEST['EI'], $con) or die(mysql_error());  $res=mysql_fetch_assoc($sql); 
$Ename = $res['Fname'].' '.$res['Sname'].' '.$res['Lname'];
$sqlDept = mysql_query("select DepartmentCode,DepartmentName from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlDe=mysql_query("select DesigName,DesigId from hrm_designation where DesigId=".$res['DesigId'], $con); $resDe=mysql_fetch_assoc($sqlDe);
$sqlGr=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGr=mysql_fetch_assoc($sqlGr);
}

?> 
<html>
<head>
<title><?php include_once('../Title.php'); ?>-Update Department</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:120px;} .font1 { font-family:"Times New Roman", Times, serif; font-size:11px; width:120px; } 
.font2 { font-size:11px;width:260px;height:18px;} .font4 {color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#CCFFCC; border-color:#FFFFFF; border-bottom:inherit;}
.TextInput { font-family:"Times New Roman", Times, serif; font-size:11px; width:100px; height:18px;}
</style>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/EmpMasterAddNewAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script type="text/javascript" language="javascript">
function edit(value) 
{ var agree=confirm("Are you sure you want to edit this record?");
  if(agree) 
  { document.getElementById("btnEdit").style.display='none';  document.getElementById("btnSave").style.display='block'; document.getElementById("ConfirmRep").disabled=false;
    document.getElementById("ConfirmHr").disabled=false; document.getElementById("ConfDate").disabled=false; document.getElementById("btn").disabled=false;
	document.getElementById("ConfirmMonth").disabled=false;
  }
}
</script>

</head>
<body class="body">
<center> 
<form name="formE" method="post" onSubmit="return validate(this)">
<table class="table" align="center">
<tr>
<td valign="top">
<input type="hidden" id="EmpId" name="EmpId" value="<?php echo $_REQUEST['EI']; ?>" />
  <table width="650" style="margin-top:0px;" border="0" align="center">
	    <tr>
		 <td>
		  <table>
		  <tr><td style="font-family:Times New Roman;font-size:18px;font-weight:bold; width:100%;"><br/><u>EMPLOYEE CONFIRMATION STATUS:</u><br/><br/></td></tr>
		  <tr>	
 <td valign="top">
   <table border="0" style="width:700px;">
     <tr>
	   <td style="font-family:Times New Roman; font-size:14px; font-weight:bold; width:100%;" align="">
	   <font color="#6A3500">EmpCode :</font><?php echo $res['EmpCode']; ?>,&nbsp;&nbsp;&nbsp;&nbsp;
	   <font color="#6A3500">Name : </font><?php echo $Ename; ?>,&nbsp;&nbsp;&nbsp;&nbsp;
	   <font color="#6A3500">Department : </font><?php echo $resDept['DepartmentName']; ?>,&nbsp;&nbsp;&nbsp;&nbsp;
	   <font color="#6A3500">Grade : </font><?php echo $resGr['GradeValue']; ?>
	   </td>
	 </tr>
   </table>
 </td>
   </tr>
   <tr><td style="font-family:Times New Roman;font-size:18px;font-weight:bold; width:100%;color:#008000;"><?php echo $msg; ?></td></tr>
  </table>	
 </td>
</tr>
<tr>
<td>
 <table border="1" style="width:660px;">
 <tr bgcolor="#7a6189" style="height:22px;">
 <td style="width:100px; color:#FFFFFF; font-family:Times New Roman; font-size:12px;" align="center"><b>Status</b></td>
 <td style="width:60px; color:#FFFFFF; font-family:Times New Roman; font-size:12px;" align="center"><b>Join Date</b></td>
 <td style="width:60px; color:#FFFFFF; font-family:Times New Roman; font-size:12px;" align="center"><b>Conf Rep</b></td>
 <td style="width:60px; color:#FFFFFF; font-family:Times New Roman; font-size:12px;" align="center"><b>Conf HR</b></td>
 <td style="width:100px; color:#FFFFFF; font-family:Times New Roman; font-size:12px;" align="center"><b>Conf Date</b></td>
 <td style="width:50px; color:#FFFFFF; font-family:Times New Roman; font-size:12px;" align="center"><b>Month</b></td>
 <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF" style="height:24px;">
 <td style="width:100px; color:#000000; font-family:Times New Roman; font-size:12px;" align="center"><?php if($res['DateConfirmationYN']=='Y' AND $res['ConfirmHR']=='Y'){echo '<b style="color:#008000;">Y</b>';}elseif(($res['DateConfirmationYN']=='Y' AND $res['ConfirmHR']=='N') OR ($res['DateConfirmationYN']=='N' AND $res['ConfirmHR']=='Y') OR ($res['DateConfirmationYN']=='N' AND $res['ConfirmHR']=='YY')){echo '<b style="color:#F27900;">P</b>';}elseif($res['DateConfirmationYN']=='N' AND $res['ConfirmHR']=='N'){echo '<b style="color:#C0C0C0;">N</b>';} ?></b></td>
 <td style="width:60px; background-color:#FFDDEE;font-family:Times New Roman; font-size:14px;" align="center"><?php echo date("d-m-Y",strtotime($res['DateJoining'])); ?>
 <input type="hidden" name="DateJoining" value="<?php echo $res['DateJoining']; ?>" />
 
 </td>
 <td style="width:50px; color:#000000; font-family:Times New Roman; font-size:12px;" align="center"><select id="ConfirmRep" name="ConfirmRep" style="width:45px;" disabled>
 <option value="<?php echo $res['DateConfirmationYN']; ?>">&nbsp;<?php echo $res['DateConfirmationYN']; ?></option>
 <option value="<?php if($res['DateConfirmationYN']=='Y'){echo 'N';}else{echo 'Y';} ?>">&nbsp;<?php if($res['DateConfirmationYN']=='Y'){echo 'N';}else{echo 'Y';} ?></option>
 </select></td>
 <td style="width:50px; color:#000000; font-family:Times New Roman; font-size:12px;" align="center"><select id="ConfirmHr" name="ConfirmHr" style="width:45px;" disabled>
 <option value="<?php echo $res['ConfirmHR']; ?>">&nbsp;<?php echo $res['ConfirmHR']; ?></option>
 <option value="<?php if($res['ConfirmHR']=='Y'){echo 'N';}else{echo 'Y';} ?>">&nbsp;<?php if($res['ConfirmHR']=='Y'){echo 'N';}else{echo 'Y';} ?></option></select></td>
 <td style="width:100px; color:#000000; font-family:Times New Roman; font-size:12px;" align="center"><input name="ConfDate" id="ConfDate" value="<?php if($res['DateConfirmation']!='0000-00-00' AND $res['DateConfirmation']!='1970-01-01'){echo date("d-m-Y",strtotime($res['DateConfirmation'])); } else {echo '00-00-0000';} ?>" style="width:75px;" disabled/>&nbsp;<button id="btn" class="CalenderButton" disabled></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("btn", "ConfDate", "%d-%m-%Y");  cal.manageFields("Sep_btn", "Sep", "%d-%m-%Y");</script></td>
 
 <td style="width:50px; color:#000000; font-family:Times New Roman; font-size:12px;" align="center"><select id="ConfirmMonth" name="ConfirmMonth" style="width:45px;" disabled>
 <option value="<?php echo $res['ConfirmMonth']; ?>">&nbsp;<?php echo $res['ConfirmMonth']; ?></option>
 <option value="6">6</option>
 <option value="9">9</option>
 <option value="12">12</option>
 <option value="15">15</option>
 <?php /*
 <option value="<?php if($res['ConfirmMonth']==6){echo 12;}else{echo 6;} ?>">&nbsp;<?php if($res['ConfirmMonth']==6){echo 12;}else{echo 6;} ?></option>
 */?>
 </select></td>
 <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:50px;">
 <a href="#"><img src="images/edit.png" border="0" alt="Edit" id="btnEdit" onClick="edit()" style="display:block; "></a>
 <input type="submit" name="SaveEdit" id="btnSave"  value="" class="SaveButton" style="display:none;"></td>
 </tr>
 </table>
</td>
</tr>
   </td>
</tr>  

	</table> 
</td>
<tr>		
<td valign="top" align="center" width="100%" id="MainWindow">

  </table>
 </td>
</tr>
</table>
</form>
</center>
</body>
</html>