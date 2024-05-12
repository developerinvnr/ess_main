<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//****************************************************************************************************************
if(isset($_POST['SaveRepHod']))
{ 
  for($i=1; $i<=$_POST['Sn']; $i++)
  { $Sql=mysql_query("update hrm_employee_reporting set ReviewerId=".$_POST['SelRev_'.$i].", HodId=".$_POST['SelHod_'.$i]." where EmployeeID=".$_POST['EI_'.$i], $con); 
  }
  if($Sql){$msg="Data updated successfully";}
}

//AppraiserId=".$_POST['SelRep_'.$i]." 

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
 .All_50{font-size:11px; height:20px; width:50px;} .All_100{font-size:11px; height:20px; width:100px;} 
.All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} 
.All_150{font-size:11px; height:20px; width:150px;}.All_190{font-size:12px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} 
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<Script type="text/javascript" language="javascript">
function SelectDeptEmp(value)
{ var url = 'ReportingLeaveQuery.php?v='+value; window.location=url; }
                            
function EditAppRev()
{ document.getElementById('ChangeE').style.display='none'; document.getElementById('EditE').style.display='block';
  var no=document.getElementById("Sn").value; 
  for(var i=1; i<=no; i++)
  { document.getElementById('SelRep_'+i).disabled=true; document.getElementById('SelRev_'+i).disabled=false; document.getElementById('SelHod_'+i).disabled=false;}
}

</Script>     
</head>
<body class="body">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /><input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" /> 
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td>
 <table width="100%" style="margin-top:0px;" border="0">
  <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td></tr>
  <tr>
<td valign="top">
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
<form name="AppRevForm" method="post">	
<?php if($_REQUEST['v']!=''){ $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['v']." AND CompanyId=".$CompanyId, $con); 
$resD=mysql_fetch_assoc($sqlD); } ?>  
<table border="0" style="margin-top:0px;">
<tr> 
 <td align="center" width="100%" valign="top">
  <table border="0" width="100%">
<tr>
 <td>
  <table>
    <tr>
     <td align="left" class="heading">Assign Reporting/Rev/HOD For Leave-Query Process</td>
	 <td style="font-size:14px;width:100px; font-family:Times New Roman;" align="right"><b>Department :</b></td>
     <td style="font-size:11px; width:150px;">
	 <select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="DepartmentE" id="DepartmentE" onChange="SelectDeptEmp(this.value)">
<?php if($_REQUEST['v']!=''){ ?><option value="<?php echo $_REQUEST['v']; ?>" style="margin-left:0px; background-color:#84D9D5;" selected><?php echo $resD['DepartmentCode']; ?></option>
<?php } else { ?><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>Select Department</option><?php } ?>
	 <?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?></select></td>
     <td><font class="font4"><b>&nbsp;&nbsp;&nbsp;&nbsp;<span id="msg"><?php echo $msg; ?></span></b></font></td>
    </tr>  
  </table>
 </td>
</tr> 
<tr>
 <td>
  <table border="1">
   <tr bgcolor="#7a6189">
    <td align="center" style="color:#FFFFFF;" class="All_50"><b>SNo.</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_80"><b>EmpCode</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_150"><b>Designation</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_200"><b>Reporting</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_200"><b>Reporting_2</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_200"><b>HOD</b></td>
   </tr>
<?php if($_REQUEST['v']!=''){ $sql = mysql_query("SELECT hrm_employee_reporting.*, EmpCode,Fname,Sname,Lname,DesigId,DR,Gender,Married FROM hrm_employee_reporting INNER JOIN hrm_employee_general ON hrm_employee_reporting.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_reporting.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_reporting.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmpStatus='A' AND hrm_employee.EmpType='E' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$_REQUEST['v']." order by EmpCode ASC", $con); $Sno=1;  while($res = mysql_fetch_assoc($sql)) { 
if($res['DR']=='Y'){$MM='Dr.';} elseif($res['Gender']=='M'){$MM='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$MM='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$MM='Miss.';}  $Name=$MM.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; 
$sqlDe = mysql_query("SELECT DesigCode FROM hrm_designation WHERE DesigId=".$res['DesigId'], $con); $resDe = mysql_fetch_assoc($sqlDe);?>
   <tr bgcolor="#FFFFFF"> 
    <td align="center" style="" class="All_50"><?php echo $Sno; ?><input type="hidden" name="EI_<?php echo $Sno; ?>" value="<?php echo $res['EmployeeID']; ?>"/></td>
    <td align="center" style="" class="All_80">&nbsp;<?php echo $res['EmpCode']; ?></td>
    <td style="" class="All_200">&nbsp;<?php echo $Name; ?></td>
    <td style="" class="All_150">&nbsp;<?php echo $resDe['DesigCode']; ?></td>	

    <td align="center" style="color:#FFFFFF;" class="All_200"><select <?php if($res['AppraiserId']==0 OR $res['AppraiserId']==''){echo 'style="background-color:#FFFFFF;"'; } if($res['AppraiserId']!=0 AND $res['AppraiserId']!='') {echo 'style="background-color:#FFE8DD;"'; } ?> name="SelRep_<?php echo $Sno; ?>" id="SelRep_<?php echo $Sno; ?>" class="All_190" disabled><?php if($res['AppraiserId']==0 OR $res['AppraiserId']==''){?><option value="0">Select Reporting Mgr</option><?php } else { $sqlR = mysql_query("SELECT EmpCode,Fname,Sname,Lname,DR,Gender,Married FROM hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$res['AppraiserId'], $con); $resR = mysql_fetch_assoc($sqlR);  if($resR['DR']=='Y'){$MR='Dr.';} elseif($resR['Gender']=='M'){$MR='Mr.';} elseif($resR['Gender']=='F' AND $resR['Married']=='Y'){$MR='Mrs.';} elseif($resR['Gender']=='F' AND $resR['Married']=='N'){$MR='Miss.';}  $NameR=$resR['EmpCode'].'-'.$MR.' '.$resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname']; ?><option value="<?php echo $res['AppraiserId']; ?>"><?php echo $NameR; ?></option><?php } ?>
<?php $sqlE=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,DR,Gender,Married from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by Fname ASC", $con); 
while($resE=mysql_fetch_array($sqlE)){ //if($resE['DR']=='Y'){$ME='Dr.';} elseif($resE['Gender']=='M'){$ME='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$ME='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$ME='Miss.';}  
$NameE=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'].'-'.$resE['EmpCode']; ?> 
 <option style="background-color:#FFFFFF;" value="<?php echo $resE['EmployeeID']; ?>"><?php echo $NameE; ?></option><?php } ?>
 </select></td>


<td align="center" style="color:#FFFFFF;" class="All_200"><select <?php if($res['ReviewerId']==0 OR $res['ReviewerId']==''){echo 'style="background-color:#FFFFFF;"'; } if($res['ReviewerId']!=0 AND $res['ReviewerId']!='') {echo 'style="background-color:#FFE8DD;"'; } ?> name="SelRev_<?php echo $Sno; ?>" id="SelRev_<?php echo $Sno; ?>" class="All_190" disabled><?php if($res['ReviewerId']==0 OR $res['ReviewerId']==''){?><option value="0">Select Reporting 2</option><?php } else { $sqlRev = mysql_query("SELECT EmpCode,Fname,Sname,Lname,DR,Gender,Married FROM hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$res['ReviewerId'], $con); $resRev = mysql_fetch_assoc($sqlRev);  if($resRev['DR']=='Y'){$MRev='Dr.';} elseif($resRev['Gender']=='M'){$MRev='Mr.';} elseif($resRev['Gender']=='F' AND $resRev['Married']=='Y'){$MRev='Mrs.';} elseif($resRev['Gender']=='F' AND $resRev['Married']=='N'){$MRev='Miss.';}  $NameRev=$resRev['EmpCode'].'-'.$MRev.' '.$resRev['Fname'].' '.$resRev['Sname'].' '.$resRev['Lname']; ?><option value="<?php echo $res['ReviewerId']; ?>"><?php echo $NameRev; ?></option><?php } ?>
<?php $sqlEev=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,DR,Gender,Married from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by Fname ASC", $con); 
while($resEev=mysql_fetch_array($sqlEev)){ //if($resE['DR']=='Y'){$ME='Dr.';} elseif($resE['Gender']=='M'){$ME='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$ME='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$ME='Miss.';}  
$NameEev=$resEev['Fname'].' '.$resEev['Sname'].' '.$resEev['Lname'].'-'.$resEev['EmpCode']; ?> 
 <option style="background-color:#FFFFFF;" value="<?php echo $resEev['EmployeeID']; ?>"><?php echo $NameEev; ?></option><?php } ?>
 </select></td>


    <td align="center" style="color:#FFFFFF;" class="All_200"><select <?php if($res['HodId']==0 OR $res['HodId']==''){echo 'style="background-color:#FFFFFF;"'; } if($res['HodId']!=0 AND $res['HodId']!='') {echo 'style="background-color:#FFE8DD;"'; } ?> name="SelHod_<?php echo $Sno; ?>" id="SelHod_<?php echo $Sno; ?>" class="All_190" disabled>
 <?php if($res['HodId']==0 OR $res['HodId']==''){?><option value="0">Select HOD</option><?php } else { $sqlH = mysql_query("SELECT EmpCode,Fname,Sname,Lname,DR,Gender,Married FROM hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$res['HodId'], $con); 
 $resH = mysql_fetch_assoc($sqlH);  if($resH['DR']=='Y'){$MH='Dr.';} elseif($resH['Gender']=='M'){$MH='Mr.';} elseif($resH['Gender']=='F' AND $resH['Married']=='Y'){$MH='Mrs.';} elseif($resH['Gender']=='F' AND $resH['Married']=='N'){$MH='Miss.';}  $NameH=$resH['EmpCode'].'-'.$MH.' '.$resH['Fname'].' '.$resH['Sname'].' '.$resH['Lname']; ?>
 <option value="<?php echo $res['HodId']; ?>"><?php echo $NameH; ?></option><?php } ?>
<?php $sqlE2=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,DR,Gender,Married from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by Fname ASC", $con); 
while($resE2=mysql_fetch_array($sqlE2)){ //if($resE2['DR']=='Y'){$ME2='Dr.';} elseif($resE2['Gender']=='M'){$ME2='Mr.';} elseif($resE2['Gender']=='F' AND $resE2['Married']=='Y'){$ME2='Mrs.';} elseif($resE2['Gender']=='F' AND $resE2['Married']=='N'){$ME2='Miss.';}  
$NameE2=$resE2['Fname'].' '.$resE2['Sname'].' '.$resE2['Lname'].'-'.$resE2['EmpCode']; ?> 
 <option style="background-color:#FFFFFF;" value="<?php echo $resE2['EmployeeID']; ?>"><?php echo $NameE2; ?></option><?php } ?>
 </select></td>
   </tr>
<?php $Sno++; } $NO=$Sno-1;?><input type="hidden" name="Sn"  id="Sn" value="<?php echo $NO; ?>" /><?php } ?>
   <tr bgcolor="#7a6189">
    <td align="Right" colspan="7">
<?php if($_SESSION['User_Permission']=='Edit'){?>
	<table border="0"><tr>
    <td align="right" style="width:90px;" ><input type="button" name="ChangeE" id="ChangeE" style="width:90px;display:block;" value="edit" onClick="EditAppRev()">
	<input type="submit" name="SaveRepHod" id="EditE" style="width:90px;display:none;" value="save"></td>
    <td align="right" style="width:90px;"><input type="button" value="refresh" style="width:90px;" onClick="javascript:window.location='ReportingLeaveQuery.php?v=<?php echo $_REQUEST['v']; ?>'"/></td></tr>
    </table>
<?php } ?>
    </td>
   </tr>
  </table>
 </td>
</tr> 


  </table>
 </td>
</tr> 
</table>
</form> 
<?php } ?> 		
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