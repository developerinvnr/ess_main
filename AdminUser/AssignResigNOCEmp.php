<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//****************************************************************************************************************
if($_REQUEST['di']!='')
{ 
$sql=mysql_query("select NocDeptId from hrm_employee_separation_nocdept_emp where DepartmentId=".$_REQUEST['di'], $con); $row=mysql_num_rows($sql);
  if($row>0){$sqlU=mysql_query("update hrm_employee_separation_nocdept_emp set EmployeeID=".$_REQUEST['ei'].", EmployeeID2=".$_REQUEST['ei2'].", Status='".$_REQUEST['st']."' where DepartmentId=".$_REQUEST['di'], $con); }
  else{$sqlU=mysql_query("insert into hrm_employee_separation_nocdept_emp(DepartmentId, EmployeeID, EmployeeID2, Status, NocDeptBy, NocDeptDate) values(".$_REQUEST['di'].", ".$_REQUEST['ei'].", ".$_REQUEST['ei2'].", '".$_REQUEST['st']."', ".$UserId.", '".date("Y-m-d")."')", $con);} 
  if($sqlU){$msg='Data save successfully!';}
}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<Script type="text/javascript" language="javascript">
function EEdit(v)
{ document.getElementById("ChangeE_"+v).style.display='none'; document.getElementById("SaveE_"+v).style.display='block'; 
  document.getElementById("SelEmpID_"+v).disabled=false; document.getElementById("SelEmpID2_"+v).disabled=false; document.getElementById("SelStatus_"+v).disabled=false;
}	
function Esave(sn,di)
{ if(document.getElementById("SelEmpID_"+sn).value==''){alert("please select emplyee from employee list!"); return false;} 
  var agree=confirm("Are you sure, you want to save data?");
  if(agree){ var ei=document.getElementById("SelEmpID_"+sn).value; var ei2=document.getElementById("SelEmpID2_"+sn).value; var st=document.getElementById("SelStatus_"+sn).value; 
  var x="AssignResigNOCEmp.php?ei="+ei+"&di="+di+"&st="+st+"&ei2="+ei2; window.location=x; }
}	
                                

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
	  <td valign="top" width="100%" id="MainWindow">
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<form name="AppRevForm" method="post">	  
<table border="0" style="margin-top:0px; width:1100px;height:400px;">
	<tr>
	    <td align="right" width="2%" valign="top">&nbsp;</td>
		<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
		<td align="center" style="width:1100px;" valign="top">
		   <table border="0" width="100%">
		     <tr><td align="left" class="heading">Assign Department Owner For NOC Clearance
			     <font class="font4"><b>&nbsp;&nbsp;&nbsp;&nbsp;<span id="msg"><?php echo $msg; ?></span></b></font>
				 <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
                 <input type="hidden" name="YId" id="YId" value="<?php  echo $YearId;  ?>" /></td>
			 </tr>
				 <?php //---------------------------------------Display Record----------------------------------------------------------------- ?>
				 <tr>
				   <td colspan="6">
				     <table>
<tr bgcolor="#7a6189" style="height:22px;">
 <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>SNo</b></td>
 <td style="color:#ffffff;font-family:Georgia;font-size:12px;width:200px;" align="center"><b>Department</b></td>
 <td style="color:#ffffff;font-family:Georgia;font-size:12px;width:300px;" align="center"><b>Assign Owner(Level-1)</b></td>
 <td style="color:#ffffff;font-family:Georgia;font-size:12px;width:300px;" align="center"><b>Assign Owner(Level-2)</b></td>
 <td style="color:#ffffff;font-family:Georgia;font-size:12px;width:80px;" align="center"><b>Status</b></td>
 <td style="color:#ffffff;font-family:Georgia;font-size:12px;width:50px;" align="center"><b>Save</b></td>
</tr>
<?php 
$sqlDept=mysql_query("select DepartmentId,DepartmentName,DepartmentCode from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' order by DepartmentId ASC",$con); //(DepartmentId=1 OR DepartmentId=7 OR DepartmentId=8 OR DepartmentId=9 OR DepartmentId=19 OR DepartmentId=20 OR DepartmentId=21 OR DepartmentId=22 OR DepartmentId=26) 
$sn=1; while($resDept=mysql_fetch_array($sqlDept)){ 
$sql=mysql_query("select * from hrm_employee_separation_nocdept_emp where DepartmentId=".$resDept['DepartmentId'], $con); $res=mysql_fetch_array($sql);
?>
<tr bgcolor="#FFFFFF" style="height:20px;">
<form name="form" method="post">
 <td align="center" style="font:Georgia; font-size:12px; width:50px;"><?php echo $sn; ?>
 <input type="hidden" id="SelDept_<?php echo $sn; ?>" name="SelDept_<?php echo $sn; ?>" value="<?php echo $resDept['DepartmentId']; ?>" />
 </td>
 <td style="font-family:Georgia;font-size:12px;width:200px;" valign="top">&nbsp;<?php echo $resDept['DepartmentName']; ?></td>
 <td style="font-family:Georgia;font-size:12px;width:300px;" valign="top">
 <select style="width:318px;font-size:12px; font-family:Georgia;height:20px;" id="SelEmpID_<?php echo $sn; ?>" name="SelEmpID_<?php echo $sn; ?>" disabled>
 <?php if($res['EmployeeID']=='') { ?><option value="" style="background-color:#84C1FF;padding:1px;">&nbsp;Select Employee</option>
 <?php } else { $sqlEE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId from hrm_employee_separation_nocdept_emp INNER JOIN hrm_employee ON hrm_employee_separation_nocdept_emp.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_separation_nocdept_emp.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_separation_nocdept_emp.EmployeeID=".$res['EmployeeID'], $con); $resEE=mysql_fetch_assoc($sqlEE); $sqlDeE=mysql_query("select DesigName from hrm_designation where DesigId=".$resEE['DesigId'], $con); $resDeE=mysql_fetch_assoc($sqlDeE);
$ECEDesig=$resEE['EmpCode'].' - '.$resEE['Fname'].' '.$resEE['Sname'].' '.$resEE['Lname'].'/ '.$resDeE['DesigName']; ?>
  <option value="<?php echo $res['EmployeeID']; ?>"><?php echo $ECEDesig; ?></option><?php } ?>
 <?php $sqlE22=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,DesigId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$resDept['DepartmentId']." order by Fname ASC", $con); while($resE22=mysql_fetch_assoc($sqlE22)) { $sqlDe22=mysql_query("select DesigName from hrm_designation where DesigId=".$resE22['DesigId'], $con); $resDe22=mysql_fetch_assoc($sqlDe22);
  $Ename2=$resE22['EmpCode'].' - '.$resE22['Fname'].' '.$resE22['Sname'].' '.$resE22['Lname'].'/ '.$resDe22['DesigName']; ?>
 <option value="<?php echo $resE22['EmployeeID']; ?>" style="padding:1px;"><?php echo $Ename2; ?></option><?php } ?>
 <option value="0" style="padding:1px;"><?php echo 'Blank'; ?></option>
 </select>
 </td>
 <td style="font-family:Georgia;font-size:12px;width:300px;" valign="top">
 <select style="width:318px;font-size:12px; font-family:Georgia;height:20px;" id="SelEmpID2_<?php echo $sn; ?>" name="SelEmpID2_<?php echo $sn; ?>" disabled>
 <?php if($res['EmployeeID2']=='') { ?><option value="" style="background-color:#84C1FF;padding:1px;">&nbsp;Select Employee</option>
 <?php } else { $sqlEE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId from hrm_employee_separation_nocdept_emp INNER JOIN hrm_employee ON hrm_employee_separation_nocdept_emp.EmployeeID2=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_separation_nocdept_emp.EmployeeID2=hrm_employee_general.EmployeeID where hrm_employee_separation_nocdept_emp.EmployeeID2=".$res['EmployeeID2'], $con); $resEE=mysql_fetch_assoc($sqlEE); $sqlDeE=mysql_query("select DesigName from hrm_designation where DesigId=".$resEE['DesigId'], $con); $resDeE=mysql_fetch_assoc($sqlDeE);
$ECEDesig=$resEE['EmpCode'].' - '.$resEE['Fname'].' '.$resEE['Sname'].' '.$resEE['Lname'].'/ '.$resDeE['DesigName']; ?>
  <option value="<?php echo $res['EmployeeID2']; ?>"><?php echo $ECEDesig; ?></option><?php } ?>
 <?php $sqlE22=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,DesigId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$resDept['DepartmentId']." order by Fname ASC", $con); while($resE22=mysql_fetch_assoc($sqlE22)) { $sqlDe22=mysql_query("select DesigName from hrm_designation where DesigId=".$resE22['DesigId'], $con); $resDe22=mysql_fetch_assoc($sqlDe22);
  $Ename22=$resE22['EmpCode'].' - '.$resE22['Fname'].' '.$resE22['Sname'].' '.$resE22['Lname'].'/ '.$resDe22['DesigName']; ?>
 <option value="<?php echo $resE22['EmployeeID']; ?>" style="padding:1px;"><?php echo $Ename22; ?></option><?php } ?>
 <option value="0" style="padding:1px;"><?php echo 'Blank'; ?></option>
 </select>
 </td>
 
 
 <td style="font-family:Georgia;font-size:12px;width:80px;" valign="top">
 <select style="width:78px;font-size:14px;font-family:Times New Roman;" id="SelStatus_<?php echo $sn; ?>" name="SelStatus_<?php echo $sn; ?>" disabled>
 <option value="<?php if($res['Status']=='' OR $res['Status']=='A'){echo 'A';}elseif($res['Status']=='D'){echo 'D';} ?>"><?php if($res['Status']=='' OR $res['Status']=='A'){echo 'Active';}elseif($res['Status']=='D'){echo 'Deactive';} ?></option>
 <option value="<?php if($res['Status']=='' OR $res['Status']=='A'){echo 'D';}elseif($res['Status']=='D'){echo 'A';} ?>"><?php if($res['Status']=='' OR $res['Status']=='A'){echo 'Deactive';}elseif($res['Status']=='D'){echo 'Active';} ?></option>
 
 <?php if($res['Status']=='A'){echo 'Active';}if($res['Status']=='A'){echo 'Deactive';} ?></td>
 <td>
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
 <input type="button" name="ChangeE" id="ChangeE_<?php echo $sn; ?>" style="width:50px; display:block;" value="edit" onClick="EEdit(<?php echo $sn; ?>)">
 <input type="button" name="ESave" id="SaveE_<?php echo $sn; ?>" style="width:50px;display:none;" value="save" onClick="return Esave(<?php echo $sn.', '.$resDept['DepartmentId']; ?>)">
<?php } ?>
 </td>
 
 
 </form>
</tr>
<?php $sn++; } $tt=$sn-1; echo '<input type="hidden" name="TotNo" id="TotNo" value="'.$tt.'" />';  ?>

					 </table>
				   </td>
				 </tr>
				 <tr>
      <td align="Right" class="fontButton"><table border="0" style="width:180px;">
		<tr>
		<td align="right" style="width:90px;">
		<input type="button" name="refreshh" value="refresh" style="width:88px;" onClick="javascript:window.location='AssignResigNOCEmp.php'"/>
		</td>
		</tr></table>
      </td>
   </tr>
			     <tr>
			    </table>
			   </td>
		   </table>
		</td>
        <?php } ?>
		<?php //-------------------------------------------------------------------------------------------------------- ?>
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
 </form>  		
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