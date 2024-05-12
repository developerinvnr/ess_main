<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
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
function ClickCoutry(value)
{ var s=0;
  window.location="AssignStateTeam.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+value+"&s="+s; }


function ClickState(value)
{ var c=document.getElementById('Coutry').value;
  window.location="AssignStateTeam.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+c+"&s="+value; }

function FunEdit(sn)
{ document.getElementById("edt"+sn).style.display='none'; document.getElementById("sve"+sn).style.display='block'; document.getElementById("Tname_"+sn).disabled=false;
  document.getElementById("Tname_"+sn).style.background='#FFFFFF'; document.getElementById("TD"+sn).style.background='#B8FB5E'; }

function FunSave(sn)
{ var ei=document.getElementById("Tname_"+sn).value; var sti=document.getElementById("State_"+sn).value; var ci=document.getElementById("ComId").value; 
  if(ei==''){alert("Please select employee name !"); return false;}
  else 
  {
  var url = 'AssignStateTeamAct.php'; var pars = 'action=AddUpStateEmp&sn='+sn+'&ci='+ci+'&ei='+ei+'&sti='+sti;	
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_FreshR });
  }
}
function show_FreshR(originalRequest)
{ document.getElementById('RecordsSpan').innerHTML = originalRequest.responseText; var sn=document.getElementById("sn").value;
  document.getElementById("edt"+sn).style.display='block'; document.getElementById("sve"+sn).style.display='none'; document.getElementById("Tname_"+sn).disabled=true;
  document.getElementById("Tname_"+sn).style.background='#CECE9D'; document.getElementById("TD"+sn).style.background='#FFFFFF';
}


</Script>
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
    <tr>
	  <td style="margin-top:0px;" class="heading">&nbsp;State Employee&nbsp;&nbsp;&nbsp;</td>
	  <td style="font-size:11px; height:18px;color:#FFFFFF;font-weight:bold;">Country :&nbsp;&nbsp;</td>
	  <td style="width:200px;"><select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="Coutry" id="Coutry" onChange="ClickCoutry(this.value)"> 
<?php if($_REQUEST['c']==0){ ?> <option value="0">SELECT</option><?php } else { $SqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['c'], $con); $ResC=mysql_fetch_assoc($SqlC);?><option value="<?php echo $_REQUEST['c']; ?>"><?php echo ucwords(strtolower($ResC['CountryName'])); ?></option><?php } ?>
<?php $SqlCty=mysql_query("SELECT * FROM hrm_country order by CountryName ASC", $con); while($ResCty=mysql_fetch_array($SqlCty)) { ?><option value="<?php echo $ResCty['CountryId']; ?>"><?php echo ucwords(strtolower($ResCty['CountryName'])); ?></option><?php } ?></select>
       </td>
	   <td></td>
	   <td style="font-size:11px;height:18px;color:#FFFFFF;font-weight:bold;">State :&nbsp;&nbsp;</td>
	   <td><select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="ClickState(this.value)">
<?php if($_REQUEST['s']==0){ ?> <option value="0">SELECT</option><?php } else { $SqlS=mysql_query("SELECT StateName FROM hrm_state where StateId=".$_REQUEST['s'], $con); $ResS=mysql_fetch_assoc($SqlS);?><option value="<?php echo $_REQUEST['s']; ?>"><?php echo ucwords(strtolower($ResS['StateName'])); ?></option><?php } ?>

<?php if($_REQUEST['c']==0){ $sqlStd = mysql_query("SELECT * FROM hrm_state order by StateName ASC", $con); while($resStd = mysql_fetch_array($sqlStd)){ ?><option value="<?php echo $resStd['StateId']; ?>"><?php echo ucwords(strtolower($resStd['StateName'])); ?></option><?php } } elseif($_REQUEST['c']>0){ $sqlStd = mysql_query("SELECT * FROM hrm_state where CountryId=".$_REQUEST['c']." order by StateName ASC", $con); while($resStd = mysql_fetch_array($sqlStd)){ ?><option value="<?php echo $resStd['StateId']; ?>"><?php echo ucwords(strtolower($resStd['StateName'])); ?></option><?php } } ?></select>
		</td>
	</tr>
   </table>
  </td>
 </tr>
 <tr><td>&nbsp;</td></tr>	
<?php if($_REQUEST['c']>0 OR $_REQUEST['s']>0) { ?> 
 <tr>
  <td valign="top">
<table border="1">
 <tr bgcolor="#7a6189">
  <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Sn</b></td>
  <td align="center" style="color:#FFFFFF;font-size:14px;width:150px;font-family:Times New Roman;"><b>State</b></td>
  <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Assign Employee</b></td>
  <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Action</b></td>
 </tr> 
<?php if($_REQUEST['s']>0){ $sql = mysql_query("SELECT DISTINCT StateId,StateName FROM hrm_state where StateId=".$_REQUEST['s'], $con); }
elseif($_REQUEST['c']>0 AND $_REQUEST['s']==0){$sql = mysql_query("SELECT DISTINCT StateId,StateName FROM hrm_state where CountryId=".$_REQUEST['c']." order by StateName ASC", $con);}
 $sn=1; while($res = mysql_fetch_array($sql)){ ?>    
 <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['StateId']; ?>">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $sn; ?></td>
  <td style="font-size:14px;font-family:Times New Roman;"><?php echo ucwords(strtolower($res['StateName'])); ?>
  <input type="hidden" id="State_<?php echo $sn; ?>" value="<?php echo $res['StateId']; ?>" />
<?php $sqlTemp=mysql_query("select hrm_sales_state_temp.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_sales_state_temp INNER JOIN hrm_employee ON hrm_sales_state_temp.EmployeeID=hrm_employee.EmployeeID where hrm_sales_state_temp.StateId=".$res['StateId']." AND hrm_sales_state_temp.StateTEmpStatus='A'", $con); 
$resTemp=mysql_fetch_assoc($sqlTemp); if($resTemp['EmployeeID']>0){$sDe=mysql_query("select DesigCode from hrm_employee_general INNER JOIN hrm_designation ON hrm_employee_general.DesigId=hrm_designation.DesigId where EmployeeID=".$resTemp['EmployeeID'], $con); $rDe=mysql_fetch_assoc($sDe); }
$Ename=ucwords(strtolower($resTemp['Fname'].' '.$resTemp['Sname'].' '.$resTemp['Lname'])); //$rDe['DesigCode'] ?>  
  <td style="font-size:14px;font-family:Times New Roman;">
  <select style="width:395px;font-family:Times New Roman;size:15px;background-color:#CECE9D;" id="Tname_<?php echo $sn; ?>" name="Tname_<?php echo $sn; ?>" disabled>
<?php if($resTemp['EmployeeID']!=0){ ?><option value="<?php echo $resTemp['EmployeeID']; ?>" style="color:#006C00;" selected>&nbsp;<?php echo $Ename;?></option>
<?php } else { echo '<option value="0">&nbsp;Select</option>'; } ?>
<?php $sHE2=mysql_query("select hrm_employee_general.EmployeeID,EmpCode,Fname,Sname,Lname,DesigCode from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_designation ON hrm_employee_general.DesigId=hrm_designation.DesigId where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=6 order by Fname ASC", $con); while($rHE2=mysql_fetch_assoc($sHE2)){ $E3name=ucwords(strtolower($rHE2['Fname'].' '.$rHE2['Sname'].' '.$rHE2['Lname'])); //$rHE2['DesigCode'] ?>
<option value="<?php echo $rHE2['EmployeeID']; ?>" style="color:#6300C6;">&nbsp;<?php echo $E3name; ?></option><?php } ?>
<option value="0">&nbsp;None</option>
 </select>
  </td>
  <td align="center" id="TD<?php echo $sn; ?>"><img id="edt<?php echo $sn; ?>" src="images/edit.png" style="display:block;" onClick="FunEdit(<?php echo $sn; ?>)" />
      <img id="sve<?php echo $sn; ?>" src="images/Floppy-Small-icon.png" style="display:none;" onClick="FunSave(<?php echo $sn; ?>)"/>
  </td>
 </tr>
<?php $sn++; } ?>    
</table>
  </td>
 </tr>
<?php } ?> 
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
