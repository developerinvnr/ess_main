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
<style>.th{color:#FFFFFF;font-size:14px;font-family:Times New Roman;text-align:center;}</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script language="javascript">
function ClickCoutry(value)
{ var s=document.getElementById('State').value;
  window.location="AssignHqTeam.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+value+"&s="+s; }


function ClickState(value)
{ var c=document.getElementById('Coutry').value;
  window.location="AssignHqTeam.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+c+"&s="+value; }

function FunEdit(sn)
{ document.getElementById("edt"+sn).style.display='none'; document.getElementById("sve"+sn).style.display='block'; document.getElementById("Tname_"+sn).disabled=false;
  document.getElementById("Tname_"+sn).style.background='#FFFFFF'; document.getElementById("TD"+sn).style.background='#B8FB5E'; }

function FunSave(sn)
{ 
  var ei=document.getElementById("Tname_"+sn).value; var hqi=document.getElementById("Hq_"+sn).value; var ci=document.getElementById("ComId").value; 
  //if(ei=='' || ei==0){alert("Please select employee name !"); return false;}
  //if(ei>0)
 //{
  var url = 'AssignHqTeamAct.php'; var pars = 'action=AddUpHqEmp&sn='+sn+'&ci='+ci+'&ei='+ei+'&hqi='+hqi;	
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_FreshR });
  //}
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
<?php //********************************************************************************************?>
<?php //******************START*****START*****START******START******START**********************?>
<?php //******************************************************************************************?>
<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />	
<input type="hidden" id="YId" value="<?php echo $YearId; ?>" />		  
<table border="0" style="margin-top:0px;width:100%;">
 <tr>
  <td align="left" height="10" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td style="margin-top:0px;" class="heading">&nbsp;Head Quarter Details&nbsp;&nbsp;&nbsp;</td>
	  <td style="font-size:11px; height:18px;color:#FFFFFF;font-weight:bold;">Country :&nbsp;&nbsp;</td>
	  <td style="width:200px;"><select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="Coutry" id="Coutry" onChange="ClickCoutry(this.value)"> 
<?php if($_REQUEST['c']==0){ ?> <option value="0">SELECT</option><?php } else { $SqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['c'], $con); $ResC=mysql_fetch_assoc($SqlC);?><option value="<?php echo $_REQUEST['c']; ?>"><?php echo $ResC['CountryName']; ?></option><?php } ?>
<?php $SqlCty=mysql_query("SELECT * FROM hrm_country order by CountryName ASC", $con); while($ResCty=mysql_fetch_array($SqlCty)) { ?><option value="<?php echo $ResCty['CountryId']; ?>"><?php echo $ResCty['CountryName']; ?></option><?php } ?></select>
       </td>
	   <td></td>
	   <td style="font-size:11px;height:18px;color:#FFFFFF;font-weight:bold;">State :&nbsp;&nbsp;</td>
	   <td><select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="ClickState(this.value)">
<?php if($_REQUEST['s']==0){ ?> <option value="0">SELECT</option><?php } else { $SqlS=mysql_query("SELECT StateName FROM hrm_state where StateId=".$_REQUEST['s'], $con); $ResS=mysql_fetch_assoc($SqlS);?><option value="<?php echo $_REQUEST['s']; ?>"><?php echo $ResS['StateName']; ?></option><?php } ?>

<?php if($_REQUEST['c']==0){ $sqlStd = mysql_query("SELECT * FROM hrm_state order by StateName ASC", $con); while($resStd = mysql_fetch_array($sqlStd)){ ?><option value="<?php echo $resStd['StateId']; ?>"><?php echo $resStd['StateName']; ?></option><?php } } elseif($_REQUEST['c']>0){ $sqlStd = mysql_query("SELECT * FROM hrm_state where CountryId=".$_REQUEST['c']." order by StateName ASC", $con); while($resStd = mysql_fetch_array($sqlStd)){ ?><option value="<?php echo $resStd['StateId']; ?>"><?php echo $resStd['StateName']; ?></option><?php } } ?></select>
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
<?php if($_REQUEST['c']>0 AND $_REQUEST['s']==0){ ?><td align="center" style="color:#FFFFFF;font-size:14px;width:150px;font-family:Times New Roman;"><b>State</b></td><?php } ?>
  <td class="th" style="width:150px;"><b>Head Quarter Name</b></td>
  <td class="th" style="width:390px;"><b>Assign Territory</b></td>
  <td class="th" style="width:250px;"><b>Teamleas Territory</b></td>
  <td class="th" style="width:50px;"><b>Action</b></td>
 </tr> 
<?php if($_REQUEST['s']>0){ $sql = mysql_query("SELECT DISTINCT hrm_sales_dealer.HqId,HqName FROM hrm_sales_dealer INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId where hrm_headquater.StateId=".$_REQUEST['s']." AND hrm_headquater.CompanyId=".$CompanyId." AND hrm_headquater.HQStatus='A' order by hrm_headquater.HqName ASC", $con); }
elseif($_REQUEST['c']>0 AND $_REQUEST['s']==0){$sql = mysql_query("SELECT DISTINCT hrm_sales_dealer.HqId,HqName,StateName FROM hrm_sales_dealer INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId INNER JOIN hrm_state ON hrm_headquater.StateId=hrm_state.StateId where hrm_state.CountryId=".$_REQUEST['c']." AND hrm_headquater.CompanyId=".$CompanyId." AND hrm_headquater.HQStatus='A' order by hrm_state.StateName ASC,hrm_headquater.HqName ASC", $con);}
 $sn=1; while($res = mysql_fetch_array($sql)){ ?>    
 <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['HqId']; ?>">
  <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $sn; ?></td>
  <?php if($_REQUEST['c']>0 AND $_REQUEST['s']==0){ ?><td style="font-size:14px;font-family:Times New Roman;"><?php echo $res['StateName']; ?><?php } ?>
  <td style="font-size:14px;font-family:Times New Roman;"><?php echo $res['HqName']; ?>
  <input type="hidden" id="Hq_<?php echo $sn; ?>" value="<?php echo $res['HqId']; ?>" /></td>
<?php $sqlTemp=mysql_query("select hrm_sales_hq_temp.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_sales_hq_temp INNER JOIN hrm_employee ON hrm_sales_hq_temp.EmployeeID=hrm_employee.EmployeeID where hrm_sales_hq_temp.HqId=".$res['HqId']." AND hrm_sales_hq_temp.HqTEmpStatus='A'", $con); $rowTemp=mysql_num_rows($sqlTemp);
$resTemp=mysql_fetch_assoc($sqlTemp); if($resTemp['EmployeeID']>0){$sDe=mysql_query("select DesigCode from hrm_employee_general INNER JOIN hrm_designation ON hrm_employee_general.DesigId=hrm_designation.DesigId where EmployeeID=".$resTemp['EmployeeID'], $con); $rDe=mysql_fetch_assoc($sDe); }
$Ename=ucwords(strtolower($resTemp['Fname'].' '.$resTemp['Sname'].' '.$resTemp['Lname'])); //$rDe['DesigCode'] ?>  

<?php $sqltl = mysql_query("SELECT * FROM hrm_sales_tlemp where TLHq=".$res['HqId']." AND TLStatus='A'", $con); 
      $rowtl = mysql_num_rows($sqltl); $restl=mysql_fetch_assoc($sqltl); ?>
	  
  <td style="font-size:14px;font-family:Times New Roman;">
  <select style="width:395px;font-family:Times New Roman;size:15px;background-color:#CECE9D;" id="Tname_<?php echo $sn; ?>" name="Tname_<?php echo $sn; ?>" disabled>
<?php if($resTemp['EmployeeID']!=0){ ?><option value="<?php echo $resTemp['EmployeeID']; ?>" style="color:#006C00;" selected>&nbsp;<?php echo $Ename;?></option>
<?php } else { echo '<option value="0">&nbsp;Select</option>'; $sHE=mysql_query("select hrm_employee_general.EmployeeID,EmpCode,Fname,Sname,Lname,DesigCode from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_designation ON hrm_employee_general.DesigId=hrm_designation.DesigId where hrm_employee.EmpStatus='A' AND hrm_employee_general.HqId=".$res['HqId']." AND hrm_employee_general.DepartmentId=6 order by Fname ASC", $con); $rowHE=mysql_num_rows($sHE); 
if($rowHE>0){ while($rHE=mysql_fetch_assoc($sHE)){ $E2name=ucwords(strtolower($rHE['Fname'].' '.$rHE['Sname'].' '.$rHE['Lname'])); //$rHE['DesigCode'] ?>
<option value="<?php echo $rHE['EmployeeID']; ?>" style="color:#002953;">&nbsp;<?php echo $rHE['EmployeeID'].' - '.$E2name; ?></option><?php } } } ?>
<?php if($rowHE==0){ echo '<option value="0">&nbsp;Select</option>'; $sHE2=mysql_query("select hrm_employee_general.EmployeeID,EmpCode,Fname,Sname,Lname,DesigCode from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_designation ON hrm_employee_general.DesigId=hrm_designation.DesigId where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=6 order by Fname ASC", $con); while($rHE2=mysql_fetch_assoc($sHE2)){ $E3name=ucwords(strtolower($rHE2['Fname'].' '.$rHE2['Sname'].' '.$rHE2['Lname'])); //$rHE2['DesigCode'] ?>
<option value="<?php echo $rHE2['EmployeeID']; ?>" style="color:#6300C6;">&nbsp;<?php echo ucwords(strtolower($E3name)); ?></option><?php } } ?>
 </select>
  </td>
  <td style="font-size:14px;font-family:Times New Roman;"><?php echo $restl['TLName']; ?>
  
  <td align="center" id="TD<?php echo $sn; ?>">
  <?php if($rowtl==0){?>
  <img id="edt<?php echo $sn; ?>" src="images/edit.png" style="display:block;" onClick="FunEdit(<?php echo $sn; ?>)" />
  <img id="sve<?php echo $sn; ?>" src="images/Floppy-Small-icon.png" style="display:none;" onClick="FunSave(<?php echo $sn; ?>)"/>
  <?php } ?>
  </td>
 </tr>
<?php $sn++; } ?>    
</table>
  </td>
 </tr>
<?php } ?> 
</table>
<td><span id="RecordsSpan"></span></td>		
<?php //*********************************************************************************************************?>
<?php //*************END*****END*****END******END******END*******************************************?>
<?php //***********************************************************************************************************?>
		
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

</html>
