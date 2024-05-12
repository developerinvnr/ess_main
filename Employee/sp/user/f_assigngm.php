<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}

if($_REQUEST['action']=='EditGmEmp')
{
 $up=mysql_query("update fa_approvalgm set GM_Sales=".$_REQUEST['e1'].", GM2_Sales=".$_REQUEST['e2'].", GM_Marketing=".$_REQUEST['e3']." where Id=".$_REQUEST['id'],$con);
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
function FunEdit(id)
{ 
 document.getElementById("edt"+id).style.display='none'; document.getElementById("sve"+id).style.display='block'; 
 document.getElementById("e1"+id).disabled=false; document.getElementById("e1"+id).style.background='#FFFFFF'; 
 document.getElementById("e2"+id).disabled=false; document.getElementById("e2"+id).style.background='#FFFFFF';
 document.getElementById("e3"+id).disabled=false; document.getElementById("e3"+id).style.background='#FFFFFF'; 
}

function FunSave(id)
{ 
  var e1=document.getElementById("e1"+id).value; var e2=document.getElementById("e2"+id).value;
  var e3=document.getElementById("e3"+id).value;
  if(e1==0 && e2==0){alert("Please select any one gm sales name !"); return false;}
  if(e3==0){alert("Please select gm marketing name !"); return false;}
  else{ window.location='f_assigngm.php?action=EditGmEmp&e1='+e1+'&e2='+e2+'&e3='+e3+'&id='+id; }
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
<?php //******************************************************************?>
<?php //*************START*****START*****START******START******START******************?>
<?php //******************************************************************?>
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
  <td class="hd" style="width:100px;"><b>Crop</b></td>
  <td class="hd" style="width:250px;"><b>GM Sales</b></td>
  <td class="hd" style="width:250px;"><b>GM2 Sales</b></td>
  <td class="hd" style="width:250px;"><b>GM Marketing</b></td>
  <td class="hd" style="width:50px;"><b>Action</b></td>
 </tr> 
 
 <?php $sql=mysql_query("select * from fa_approvalgm order by Id ASC",$con); while($res=mysql_fetch_assoc($sql)){ ?>
    
 <tr bgcolor="#FFFFF">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><?=$res['Id']?></td>
  <td style="font-size:14px;font-family:Times New Roman;"><?=$res['Crop']?></td>
  <td style="text-align:center;"><select style="width:99%;font-family:Times New Roman;size:15px;background-color:#CECE9D;" id="e1<?=$res['Id']?>" name="e1<?=$res['Id']?>" disabled><?php if($res['GM_Sales']>0){ $sE1=mysql_query("select Fname,Sname,Lname,DesigCode from hrm_employee_general eg INNER JOIN hrm_employee e ON eg.EmployeeID=e.EmployeeID INNER JOIN hrm_designation d ON eg.DesigId=d.DesigId where e.EmployeeID=".$res['GM_Sales'],$con); $rE1=mysql_fetch_assoc($sE1); $E1=strtoupper($rE1['Fname'].' '.$rE1['Sname'].' '.$rE1['Lname']).' - '.$rE1['DesigCode']; ?><option value="<?php echo $res['GM_Sales']; ?>" style="color:#006C00;" selected>&nbsp;<?php echo $E1;?></option><?php } else { echo '<option value="0">&nbsp;Select</option>'; } $sHE1=mysql_query("select eg.EmployeeID,EmpCode,Fname,Sname,Lname,DesigCode from hrm_employee_general eg INNER JOIN hrm_employee e ON eg.EmployeeID=e.EmployeeID INNER JOIN hrm_designation d ON eg.DesigId=d.DesigId where e.EmpStatus='A' AND eg.DepartmentId=6 AND (GradeId=72 OR GradeId=73 OR GradeId=74 OR GradeId=75) order by Fname ASC", $con); while($rHE1=mysql_fetch_assoc($sHE1)){ $E1n=strtoupper($rHE1['Fname'].' '.$rHE1['Sname'].' '.$rHE1['Lname']).' - '.$rHE1['DesigCode']; ?><option value="<?php echo $rHE1['EmployeeID']; ?>" style="color:#6300C6;">&nbsp;<?php echo $E1n; ?></option><?php } ?><option value="0">&nbsp;None</option></select></td>
  
  <td style="text-align:center;"><select style="width:99%;font-family:Times New Roman;size:15px;background-color:#CECE9D;" id="e2<?=$res['Id']?>" name="e2<?=$res['Id']?>" disabled><?php if($res['GM2_Sales']>0){ $sE2=mysql_query("select Fname,Sname,Lname,DesigCode from hrm_employee_general eg INNER JOIN hrm_employee e ON eg.EmployeeID=e.EmployeeID INNER JOIN hrm_designation d ON eg.DesigId=d.DesigId where e.EmployeeID=".$res['GM2_Sales'],$con); $rE2=mysql_fetch_assoc($sE2); $E2=strtoupper($rE2['Fname'].' '.$rE2['Sname'].' '.$rE2['Lname']).' - '.$rE2['DesigCode']; ?><option value="<?php echo $res['GM2_Sales']; ?>" style="color:#006C00;" selected>&nbsp;<?php echo $E2;?></option><?php } else { echo '<option value="0">&nbsp;Select</option>'; } $sHE2=mysql_query("select eg.EmployeeID,EmpCode,Fname,Sname,Lname,DesigCode from hrm_employee_general eg INNER JOIN hrm_employee e ON eg.EmployeeID=e.EmployeeID INNER JOIN hrm_designation d ON eg.DesigId=d.DesigId where e.EmpStatus='A' AND eg.DepartmentId=6 AND (GradeId=72 OR GradeId=73 OR GradeId=74 OR GradeId=75) order by Fname ASC", $con); while($rHE2=mysql_fetch_assoc($sHE2)){ $E2n=strtoupper($rHE2['Fname'].' '.$rHE2['Sname'].' '.$rHE2['Lname']).' - '.$rHE2['DesigCode']; ?><option value="<?php echo $rHE2['EmployeeID']; ?>" style="color:#6300C6;">&nbsp;<?php echo $E2n; ?></option><?php } ?><option value="0">&nbsp;None</option></select></td>
  
  
  <td style="text-align:center;"><select style="width:99%;font-family:Times New Roman;size:15px;background-color:#CECE9D;" id="e3<?=$res['Id']?>" name="e3<?=$res['Id']?>" disabled><?php if($res['GM_Marketing']>0){ $sE3=mysql_query("select Fname,Sname,Lname,DesigCode from hrm_employee_general eg INNER JOIN hrm_employee e ON eg.EmployeeID=e.EmployeeID INNER JOIN hrm_designation d ON eg.DesigId=d.DesigId where e.EmployeeID=".$res['GM_Marketing'],$con); $rE3=mysql_fetch_assoc($sE3); $E3=strtoupper($rE3['Fname'].' '.$rE3['Sname'].' '.$rE3['Lname']).' - '.$rE3['DesigCode']; ?><option value="<?php echo $res['GM_Marketing']; ?>" style="color:#006C00;" selected>&nbsp;<?php echo $E3;?></option><?php } else { echo '<option value="0">&nbsp;Select</option>'; } $sHE3=mysql_query("select eg.EmployeeID,EmpCode,Fname,Sname,Lname,DesigCode from hrm_employee_general eg INNER JOIN hrm_employee e ON eg.EmployeeID=e.EmployeeID INNER JOIN hrm_designation d ON eg.DesigId=d.DesigId where e.EmpStatus='A' AND eg.DepartmentId=12 AND (GradeId=72 OR GradeId=73 OR GradeId=74 OR GradeId=75) order by Fname ASC", $con); while($rHE3=mysql_fetch_assoc($sHE3)){ $E3n=strtoupper($rHE3['Fname'].' '.$rHE3['Sname'].' '.$rHE3['Lname']).' - '.$rHE3['DesigCode']; ?><option value="<?php echo $rHE3['EmployeeID']; ?>" style="color:#6300C6;">&nbsp;<?php echo $E3n; ?></option><?php } ?><option value="0">&nbsp;None</option></select></td>

  <td align="center" id="TD"><img id="edt<?=$res['Id']?>" src="images/edit.png" style="cursor:pointer;display:block;" onClick="FunEdit(<?=$res['Id']?>)" /><img id="sve<?=$res['Id']?>" src="images/Floppy-Small-icon.png" style="cursor:pointer;display:none;" onClick="FunSave(<?=$res['Id']?>)"/>
  </td>
 </tr>
 <?php } //while ?>
 
</table>
  </td>
 </tr> 
</table>
<td><span id="RecordsSpan"></span></td>		
<?php //******************************************************************?>
<?php //*************************END*****END*****END******END******END***************?>
<?php //******************************************************************?>
		
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

</html>
