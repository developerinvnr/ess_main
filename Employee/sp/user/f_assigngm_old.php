<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}

if($_REQUEST['action']=='EditGmEmp')
{
 $up=mysql_query("update fa_approvalgm set Gm1=".$_REQUEST['e1'].", Gm2=".$_REQUEST['e2']." where Id=1",$con);
 if($up){echo '<script>alert("Data updated successfully..");</script>';}
}
if($_REQUEST['action']=='Edit2GmEmp')
{
 $up=mysql_query("update fa_approvalgm set Gm1=".$_REQUEST['e1b'].", Gm2=".$_REQUEST['e2b']." where Id=2",$con);
 if($up){echo '<script>alert("Data updated successfully..");</script>';}
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script language="javascript">
function FunEdit()
{ document.getElementById("edt").style.display='none'; document.getElementById("sve").style.display='block'; 
document.getElementById("E1").disabled=false; document.getElementById("E1").style.background='#FFFFFF'; 
document.getElementById("E2").disabled=false; document.getElementById("E2").style.background='#FFFFFF'; }

function FunSave()
{ var e1=document.getElementById("E1").value; var e2=document.getElementById("E2").value;
  if(e1==0 && e2==0){alert("Please select gm employee name !"); return false;}
  else{ window.location='f_assigngm.php?action=EditGmEmp&e1='+e1+'&e2='+e2; }
}
function FunEdit2()
{ document.getElementById("edt2").style.display='none'; document.getElementById("sve2").style.display='block'; 
document.getElementById("E1b").disabled=false; document.getElementById("E1b").style.background='#FFFFFF'; 
document.getElementById("E2b").disabled=false; document.getElementById("E2b").style.background='#FFFFFF'; }

function FunSave2()
{ var e1b=document.getElementById("E1b").value; var e2b=document.getElementById("E2b").value;
  if(e1b==0 && e2b==0){alert("Please select mkt employee name !"); return false;}
  else{ window.location='f_assigngm.php?action=Edit2GmEmp&e1b='+e1b+'&e2b='+e2b; }
}

</Script>
<style>.hd{color:#FFFFFF;font-size:14px;font-family:Times New Roman; text-align:center;}</style>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />	
<input type="hidden" id="YId" value="<?php echo $YearId; ?>" />		  
<table border="0" style="margin-top:0px;width:100%;">
 <tr>
  <td align="left" height="10" valign="top" colspan="3">
   <table border="0">
    <tr><td style="margin-top:0px;" class="heading">&nbsp;Approval GM&nbsp;&nbsp;&nbsp;</td></tr>
   </table>
  </td>
 </tr>	
 <tr>
  <td valign="top">
<table border="1">
 <tr bgcolor="#7a6189">
  <td class="hd" style="width:50px;"><b>Sn</b></td>
  <td class="hd" style="width:250px;"><b>Task</b></td>
  <td class="hd" style="width:300px;"><b>Assign 1</b></td>
  <td class="hd" style="width:300px;"><b>Assign 2</b></td>
  <td class="hd" style="width:50px;"><b>Action</b></td>
 </tr>    
 <tr bgcolor="#FFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;">1</td>
  <td style="font-size:14px;font-family:Times New Roman;">FA Request Approval GM (2nd Level)</td>
<?php $sqlTemp=mysql_query("select * from fa_approvalgm where Id=1",$con); $resTemp=mysql_fetch_assoc($sqlTemp); 
if($resTemp['Gm1']>0){ $sE1=mysql_query("select Fname,Sname,Lname,DesigCode from hrm_employee_general eg INNER JOIN hrm_employee e ON eg.EmployeeID=e.EmployeeID INNER JOIN hrm_designation d ON eg.DesigId=d.DesigId where e.EmployeeID=".$resTemp['Gm1'],$con); $rE1=mysql_fetch_assoc($sE1); $E1=strtoupper($rE1['Fname'].' '.$rE1['Sname'].' '.$rE1['Lname']).' - '.$rE1['DesigCode']; } ?>    
  <td style="font-size:14px;font-family:Times New Roman;">
  <select style="width:300px;font-family:Times New Roman;size:15px;background-color:#CECE9D;" id="E1" name="E1" disabled>
<?php if($resTemp['Gm1']>0){ ?><option value="<?php echo $resTemp['Gm1']; ?>" style="color:#006C00;" selected>&nbsp;<?php echo $E1;?></option><?php } else { echo '<option value="0">&nbsp;Select</option>'; } ?>
<?php $sHE1=mysql_query("select eg.EmployeeID,EmpCode,Fname,Sname,Lname,DesigCode from hrm_employee_general eg INNER JOIN hrm_employee e ON eg.EmployeeID=e.EmployeeID INNER JOIN hrm_designation d ON eg.DesigId=d.DesigId where e.EmpStatus='A' AND eg.DepartmentId=6 AND (GradeId=72 OR GradeId=73 OR GradeId=74 OR GradeId=75) order by Fname ASC", $con); while($rHE1=mysql_fetch_assoc($sHE1)){ $E1n=strtoupper($rHE1['Fname'].' '.$rHE1['Sname'].' '.$rHE1['Lname']).' - '.$rHE1['DesigCode']; ?>
<option value="<?php echo $rHE1['EmployeeID']; ?>" style="color:#6300C6;">&nbsp;<?php echo $E1n; ?></option><?php } ?>
<option value="0">&nbsp;None</option></select></td>
<?php if($resTemp['Gm2']>0){ $sE2=mysql_query("select Fname,Sname,Lname,DesigCode from hrm_employee_general eg INNER JOIN hrm_employee e ON eg.EmployeeID=e.EmployeeID INNER JOIN hrm_designation d ON eg.DesigId=d.DesigId where e.EmployeeID=".$resTemp['Gm2'],$con); $rE2=mysql_fetch_assoc($sE2); $E2=strtoupper($rE2['Fname'].' '.$rE2['Sname'].' '.$rE2['Lname']).' - '.$rE2['DesigCode']; } ?>    
  <td style="font-size:14px;font-family:Times New Roman;"> 
  <select style="width:300px;font-family:Times New Roman;size:15px;background-color:#CECE9D;" id="E2" name="E2" disabled>
<?php if($resTemp['Gm2']>0){ ?><option value="<?php echo $resTemp['Gm2']; ?>" style="color:#006C00;" selected>&nbsp;<?php echo $E2;?></option><?php } else { echo '<option value="0">&nbsp;Select</option>'; } ?>
<?php $sHE2=mysql_query("select eg.EmployeeID,EmpCode,Fname,Sname,Lname,DesigCode from hrm_employee_general eg INNER JOIN hrm_employee e ON eg.EmployeeID=e.EmployeeID INNER JOIN hrm_designation d ON eg.DesigId=d.DesigId where e.EmpStatus='A' AND eg.DepartmentId=6 AND (GradeId=72 OR GradeId=73 OR GradeId=74 OR GradeId=75) order by Fname ASC", $con); while($rHE2=mysql_fetch_assoc($sHE2)){ $E2n=strtoupper($rHE2['Fname'].' '.$rHE2['Sname'].' '.$rHE2['Lname']).' - '.$rHE2['DesigCode']; ?>
<option value="<?php echo $rHE2['EmployeeID']; ?>" style="color:#6300C6;">&nbsp;<?php echo $E2n; ?></option><?php } ?>
<option value="0">&nbsp;None</option></select></td>

  <td align="center" id="TD">
   <img id="edt" src="images/edit.png" style="display:none;" onClick="FunEdit()" />
   <img id="sve" src="images/Floppy-Small-icon.png" style="display:none;" onClick="FunSave()"/>
  </td>
 </tr>
<tr bgcolor="#FFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;">2</td>
  <td style="font-size:14px;font-family:Times New Roman;">FA Request Approval Mkt (3rd Level)</td>
<?php $sqlTemp2=mysql_query("select * from fa_approvalgm where Id=2",$con); $resTemp2=mysql_fetch_assoc($sqlTemp2); if($resTemp2['Gm1']>0){ $sE1b=mysql_query("select Fname,Sname,Lname,DesigCode from hrm_employee_general eg INNER JOIN hrm_employee e ON eg.EmployeeID=e.EmployeeID INNER JOIN hrm_designation d ON eg.DesigId=d.DesigId where e.EmployeeID=".$resTemp2['Gm1'],$con); $rE1b=mysql_fetch_assoc($sE1b); $E1b=strtoupper($rE1b['Fname'].' '.$rE1b['Sname'].' '.$rE1b['Lname']).' - '.$rE1b['DesigCode']; } ?>    
  <td style="font-size:14px;font-family:Times New Roman;">
  <select style="width:300px;font-family:Times New Roman;size:15px;background-color:#CECE9D;" id="E1b" name="E1b" disabled>
<?php if($resTemp2['Gm1']>0){ ?><option value="<?php echo $resTemp2['Gm1']; ?>" style="color:#006C00;" selected>&nbsp;<?php echo $E1b;?></option><?php } else { echo '<option value="0">&nbsp;Select</option>'; } ?>
<?php $sHE1b=mysql_query("select eg.EmployeeID,EmpCode,Fname,Sname,Lname,DesigCode from hrm_employee_general eg INNER JOIN hrm_employee e ON eg.EmployeeID=e.EmployeeID INNER JOIN hrm_designation d ON eg.DesigId=d.DesigId where e.EmpStatus='A' AND eg.DepartmentId=6 AND GradeId>=72 order by Fname ASC", $con); while($rHE1b=mysql_fetch_assoc($sHE1b)){ $E1nb=strtoupper($rHE1b['Fname'].' '.$rHE1b['Sname'].' '.$rHE1b['Lname']).' - '.$rHE1b['DesigCode']; ?>
<option value="<?php echo $rHE1b['EmployeeID']; ?>" style="color:#6300C6;">&nbsp;<?php echo $E1nb; ?></option><?php } ?>
<option value="0">&nbsp;None</option></select></td>
<?php if($resTemp2['Gm2']>0){ $sE2b=mysql_query("select Fname,Sname,Lname,DesigCode from hrm_employee_general eg INNER JOIN hrm_employee e ON eg.EmployeeID=e.EmployeeID INNER JOIN hrm_designation d ON eg.DesigId=d.DesigId where e.EmployeeID=".$resTemp2['Gm2'],$con); $rE2b=mysql_fetch_assoc($sE2b); $E2b=strtoupper($rE2b['Fname'].' '.$rE2b['Sname'].' '.$rE2b['Lname']).' - '.$rE2b['DesigCode']; } ?>    
  <td style="font-size:14px;font-family:Times New Roman;"> 
  <select style="width:300px;font-family:Times New Roman;size:15px;background-color:#CECE9D;" id="E2b" name="E2b" disabled>
<?php if($resTemp2['Gm2']>0){ ?><option value="<?php echo $resTemp2['Gm2']; ?>" style="color:#006C00;" selected>&nbsp;<?php echo $E2b;?></option><?php } else { echo '<option value="0">&nbsp;Select</option>'; } ?>
<?php $sHE2=mysql_query("select eg.EmployeeID,EmpCode,Fname,Sname,Lname,DesigCode from hrm_employee_general eg INNER JOIN hrm_employee e ON eg.EmployeeID=e.EmployeeID INNER JOIN hrm_designation d ON eg.DesigId=d.DesigId where e.EmpStatus='A' AND eg.DepartmentId=6 AND GradeId>=72 order by Fname ASC", $con); while($rHE2b=mysql_fetch_assoc($sHE2b)){ $E2nb=strtoupper($rHE2b['Fname'].' '.$rHE2b['Sname'].' '.$rHE2b['Lname']).' - '.$rHE2b['DesigCode']; ?>
<option value="<?php echo $rHE2b['EmployeeID']; ?>" style="color:#6300C6;">&nbsp;<?php echo $E2nb; ?></option><?php } ?>
<option value="0">&nbsp;None</option></select></td>

  <td align="center" id="TD">
   <img id="edt2" src="images/edit.png" style="display:block;" onClick="FunEdit2()" />
   <img id="sve2" src="images/Floppy-Small-icon.png" style="display:none;" onClick="FunSave2()"/>
  </td>
 </tr>

</table>
  </td>
 </tr> 
</table>
<td><span id="RecordsSpan"></span></td>		
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
		
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

</html>
