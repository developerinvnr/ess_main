<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}

if(isset($_POST['SaveNew']))
{ $CHpass=encrypt($_POST['TLPwd']); $sql = mysql_query("insert into hrm_sales_tlemp(TLUname, TLPwd, TLName, TLRepId, TLHq, TLJoinDate, TLStatus, TLCrBy, TLCrDate) values('".$_POST['TLUname']."', '".$CHpass."', '".$_POST['TLName']."', ".$_POST['TLRepId'].", ".$_POST['hq'].", '".date("Y-m-d",strtotime($_POST['TLJoinDate']))."', '".$_POST['TLStatus']."', '".$_POST['ui']."', '".date("Y-m-d")."')", $con); 
  if($sql AND $_POST['TLStatus']=='A')
  {
   $sU=mysql_query("update hrm_sales_hq_temp set HqTEmpStatus='D' where HqId=".$_POST['hq'],$con);
  }
}

if(isset($_POST['SaveEdit']))
{ $CHpass=encrypt($_POST['TLPwd']); $sql = mysql_query("update hrm_sales_tlemp set TLUname='".$_POST['TLUname']."', TLPwd='".$CHpass."', TLName='".$_POST['TLName']."', TLRepId=".$_POST['TLRepId'].", TLHq=".$_POST['hq'].", TLJoinDate='".date("Y-m-d",strtotime($_POST['TLJoinDate']))."', TLStatus='".$_POST['TLStatus']."', TLCrBy=".$_POST['ui']." where TLEId=".$_POST['TLEId'], $con); 
  if($sql AND $_POST['TLStatus']=='A')
  {
   $sU=mysql_query("update hrm_sales_hq_temp set HqTEmpStatus='D' where HqId=".$_POST['hq'],$con);
  }
  if($sql AND $_POST['TLStatus']=='D')
  {
   $sU=mysql_query("update hrm_sales_hq_temp set HqTEmpStatus='A' where HqId=".$_POST['hq'],$con);
  }
  
}

//if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete"){ $SqlDelete=mysql_query("delete from hrm_sales_tlemp where TLEId=".$_REQUEST['did'], $con); }
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.fnt{color:#FFFFFF;font-size:14px;font-family:Times New Roman;font-weight:bold; text-align:center;}
.EditInput { font-family:Georgia;font-size:12px;height:20px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
</style>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/><?php /* Calander Open */?>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script><?php /* Calander Close */?>	
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script language="javascript">
function ClickCoutry(c)
{ var c=document.getElementById('Coutry').value; var s=document.getElementById('State').value; var hq=document.getElementById('Hq').value; 
  window.location="TLEmp.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&c="+c+"&s=0&hq=0"; 
}

function ClickState(s)
{ var c=document.getElementById('Coutry').value; var s=document.getElementById('State').value; var hq=document.getElementById('Hq').value; 
  window.location="TLEmp.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&c="+c+"&s="+s+"&hq=0"; 
}

function ClickHq(hq)
{ var c=document.getElementById('Coutry').value; var s=document.getElementById('State').value; var hq=document.getElementById('Hq').value; 
  window.location="TLEmp.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&c="+c+"&s="+s+"&hq="+hq; 
}

function edit(value){ var agree=confirm("Are you sure you want to edit this record?"); 
if(agree){ var c=document.getElementById('Coutry').value; var s=document.getElementById('State').value; var hq=document.getElementById('Hq').value;  
var x = "TLEmp.php?action=edit&eid="+value+"&c="+c+"&s="+s+"&hq="+hq;  window.location=x;} }
 
//function del(value){ var agree=confirm("Are you sure you want to delete this record?");
//if (agree){ var c=document.getElementById('Coutry').value; var s=document.getElementById('State').value; var hq=document.getElementById('Hq').value; 
//var x = "TLEmp.php?action=delete&did="+value+"&c="+c+"&s="+s+"&hq="+hq;  window.location=x;} }

function newsave(){ var c=document.getElementById('Coutry').value; var s=document.getElementById('State').value; var hq=document.getElementById('Hq').value; 
var x = "TLEmp.php?action=newsave&c="+c+"&s="+s+"&hq="+hq;  window.location=x;}

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
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br><br>
<?php //***********************************************************************************?>
<?php //***********************START*****START*****START******START******START***************************?>
<?php //*****************************************************************************************************?>
<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />		  
<table border="0" style="margin-top:0px; width:100%; height:100px;">
 <tr>
  <td align="left" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td style="margin-top:0px;" class="heading" align="center"><u>Team-Lease Employee </u>:</td>
	  <td style="font-size:11px;height:18px;color:#FFFFFF;font-weight:bold;width:75px;" align="right">Country:&nbsp;</td>
	  <td style="width:125px;"><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="Coutry" id="Coutry" onChange="ClickCoutry(this.value)"> <?php $SqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['c'], $con); $RowC=mysql_num_rows($SqlC); if($RowC>0){$ResC=mysql_fetch_array($SqlC); echo '<option value='.$_REQUEST['c'].'>'.$ResC['CountryName'].'</option>'; } else { echo '<option value="">SELECT</option>'; } $SqlCountry=mysql_query("SELECT * FROM hrm_country  order by CountryName ASC", $con); while($ResCountry=mysql_fetch_array($SqlCountry)) { ?><option value="<?php echo $ResCountry['CountryId']; ?>"><?php echo $ResCountry['CountryName']; ?></option><?php } ?></select>
       </td>
	   <td style="font-size:11px;height:18px;width:55px;color:#FFFFFF;font-weight:bold;" align="right">State:&nbsp;</td>
	   <td style="width:145px;"><select style="font-size:12px;width:150px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="ClickState(this.value)"><?php if($_REQUEST['s']=='All'){echo '<option value="All">All State</option>';} elseif($_REQUEST['s']>0){ $sqlS = mysql_query("SELECT * FROM hrm_state where StateId=".$_REQUEST['s'], $con); $resS=mysql_fetch_array($sqlS); echo '<option value='.$_REQUEST['s'].'>'.$resS['StateName'].'</option>'; } if($_REQUEST['c']>0){$sqlS = mysql_query("SELECT * FROM hrm_state where CountryId=".$_REQUEST['c']." order by StateName ASC", $con); while($resS=mysql_fetch_array($sqlS)) { echo '<option value='.$resS['StateId'].'>'.$resS['StateName'].'</option>'; } } else{ echo '<option value="">SELECT</option>'; } 
	   echo '<option value="All">All STATE</option></select>'; ?>
	   </td>
	   <td style="font-size:11px;height:18px;color:#FFFFFF;font-weight:bold;width:115px;" align="right">Head Quarter:&nbsp;</td>
	   <td style="width:120px;">
	   <select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="Hq" id="Hq" onChange="ClickHq(this.value)">
<?php if($_REQUEST['hq']=='All'){echo '<option value="All">All HQ</option>';} elseif($_REQUEST['hq']>0){ $sqlHq = mysql_query("SELECT * FROM hrm_headquater where HqId=".$_REQUEST['hq'], $con); $resHq=mysql_fetch_array($sqlHq); echo '<option value='.$_REQUEST['hq'].'>'.$resHq['HqName'].'</option>'; } 
	  if($_REQUEST['s']>0){ $sqlHq2 = mysql_query("SELECT * FROM hrm_headquater where StateId=".$_REQUEST['s']." AND CompanyId=".$CompanyId." order by HqName ASC", $con); while($resHq2=mysql_fetch_array($sqlHq2)) { echo '<option value='.$resHq2['HqId'].'>'.$resHq2['HqName'].'</option>'; } } elseif($_REQUEST['hq']==0){ echo '<option value="">SELECT HQ</option>'; $sql = mysql_query("SELECT * FROM hrm_headquater where CompanyId=".$CompanyId." AND HQStatus='A' order by HqName ASC", $con); while($res = mysql_fetch_array($sql)){ echo '<option value='.$res['HqId'].'>'.$res['HqName'].'</option>'; } } echo '<option value="All">All HQ</option></select>'; ?>
	   </td>
	   <td style="width:10px;">&nbsp;</td>
	   <td><input type="button" name="NewSave" id="NewSave" value="new" onClick="newsave()" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/><input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='TLEmp.php?ac=4441&ee=4421&der=t3&ccc=false&d=dreefoultVlue&u=UsuuerIo&trht=FTF%%FT&tt=valuased&desgn=Trern&c=<?php echo $_REQUEST['c'] ?>&s=<?php echo $_REQUEST['s'] ?>&hq=<?php echo $_REQUEST['hq'] ?>'"/>&nbsp;
     </td>
	  </tr>
   </table>
  </td>
 </tr>	
<tr>
 <td valign="top">
  <table border="1">
<?php if($_REQUEST['hq']>0 OR $_REQUEST['s']>0 OR $_REQUEST['hq']=='All' OR $_REQUEST['s']=='All'){ ?>
<tr bgcolor="#7a6189">
  <td class="fnt" style="width:30px;">&nbsp;Sn&nbsp;</td>
  <td class="fnt" style="width:50px;">&nbsp;</td>
  <td class="fnt" style="width:250px;">Full Name</td>
  <td class="fnt" style="width:100px;">UserName</td>
  <td class="fnt" style="width:100px;">Pwd</td>
  <td class="fnt" style="width:120px;">Hq</td>
  <td class="fnt" style="width:150px;">Reporting Name</td>
  <td class="fnt" style="width:100px;">DOJ</td>
  <td class="fnt" style="width:50px;">Status</td>
</tr> 
<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">
<input type="hidden" name="ci" id="ci" value="<?php echo $CompanyId; ?>" /><input type="hidden" id="ui" name="ui" value="<?php echo $EmployeeId; ?>" /><input type="hidden" id="hq" name="hq" value="<?php echo $_REQUEST['hq']; ?>" />
<tr bgcolor="#FFFFFF">
 <td align="center" style="font:Georgia;font-size:12px;width:30px;" valign="top"><?php echo $sn; ?></td>
 <td align="center" valign="middle" style="width:50px;">
 <input type="submit" name="SaveNew"  value="" class="SaveButton"></td>
 <td bgcolor="#B0FB4D"><input name="TLName" class="EditInput" style="width:250px;background-color:#B0FB4D;"/></td>
 <td bgcolor="#B0FB4D"><input name="TLUname" class="EditInput" style="width:100px;background-color:#B0FB4D;"/></td>
 <td bgcolor="#B0FB4D"><input type="password" name="TLPwd" class="EditInput" style="width:100px;background-color:#B0FB4D;"/></td>
 <td bgcolor="#B0FB4D"><select class="EditInput" style="width:120px;background-color:#B0FB4D;" name="TLHq" id="TLHq"><?php if($_REQUEST['hq']>0){ $sqlHq = mysql_query("SELECT * FROM hrm_headquater where HqId=".$_REQUEST['hq'], $con); $resHq=mysql_fetch_array($sqlHq); echo '<option value='.$_REQUEST['hq'].'>'.$resHq['HqName'].'</option>'; } 
	  if($_REQUEST['s']>0){ $sqlHq2 = mysql_query("SELECT * FROM hrm_headquater where StateId=".$_REQUEST['s']." AND CompanyId=".$CompanyId." order by HqName ASC", $con); while($resHq2=mysql_fetch_array($sqlHq2)) { echo '<option value='.$resHq2['HqId'].'>'.$resHq2['HqName'].'</option>'; } } elseif($_REQUEST['hq']==0){ echo '<option value="">SELECT HQ</option>'; } echo '</select>'; ?></td>

 <td bgcolor="#B0FB4D"><select name="TLRepId" class="EditInput" style="width:150px;background-color:#B0FB4D;">
<?php echo '<option value="0">&nbsp;Select</option>'; $sE=mysql_query("select g.EmployeeID,EmpCode,Fname,Sname,Lname,DesigCode from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_designation d ON g.DesigId=d.DesigId where e.EmpStatus='A' AND g.DepartmentId=6 order by Fname ASC", $con); while($rE=mysql_fetch_assoc($sE)){ ?><option value="<?php echo $rE['EmployeeID']; ?>" style="color:#002953;"><?php echo ucwords(strtolower($rE['Fname'].' '.$rE['Sname'].' '.$rE['Lname'])); //$rE['DesigCode'] ?></option><?php } ?></select></td>
 <td bgcolor="#B0FB4D"><input name="TLJoinDate" id="TLJoinDate" class="EditInput" style="width:80px;background-color:#B0FB4D;"/><button id="f_btn1" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect: function(cal) { cal.hide()}, showTime: true }); cal.manageFields("f_btn1", "TLJoinDate", "%d-%m-%Y");</script></td>
 <td bgcolor="#B0FB4D"><select name="TLStatus" class="EditInput" style="width:50px;background-color:#B0FB4D;"><option value="A">A</option><option value="D">D</option></select></td>
</tr>
</form>
<?php } ?>
<?php if($_REQUEST['hq']=='All')
{ if($_REQUEST['s']>0){ $sql = mysql_query("SELECT tle.* FROM hrm_sales_tlemp tle inner join hrm_headquater hq on tle.TLHq=hq.HqId where hq.StateId=".$_REQUEST['s']." order by TLJoinDate ASC, TLName ASC", $con); }
  else{$sql = mysql_query("SELECT * FROM hrm_sales_tlemp tle order by TLJoinDate ASC, TLName ASC", $con);}
}
elseif($_REQUEST['hq']>0){ $sql = mysql_query("SELECT * FROM hrm_sales_tlemp where TLHq=".$_REQUEST['hq']." order by TLJoinDate ASC, TLName ASC", $con);}
elseif($_REQUEST['s']=='All'){$sql = mysql_query("SELECT * FROM hrm_sales_tlemp order by TLJoinDate ASC, TLName ASC", $con);}
elseif($_REQUEST['s']>0){$sql = mysql_query("SELECT tle.* FROM hrm_sales_tlemp tle inner join hrm_headquater hq on tle.TLHq=hq.HqId where hq.StateId=".$_REQUEST['s']." order by TLJoinDate ASC, TLName ASC", $con);
}
 $sn=1; while($res = mysql_fetch_array($sql)){ 
 $sHq=mysql_query("select HqName from hrm_headquater where HqId=".$res['TLHq'],$con); $rHq=mysql_fetch_assoc($sHq);
 
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$res['TLEId']){ ?>
<form name="OformEdit" method="post" onSubmit="return OvalidateEdit(this)">	
<input type="hidden" name="ci" id="ci" value="<?php echo $CompanyId; ?>" /><input type="hidden" id="ui" name="ui" value="<?php echo $EmployeeId; ?>" /><input type="hidden" id="hq" name="hq" value="<?php echo $_REQUEST['hq']; ?>" />
<tr bgcolor="#FFFFFF">
 <td align="center" style="font:Georgia;font-size:12px;" valign="top"><?php echo $sn; ?></td>
 <td align="center"><input type="submit" name="SaveEdit" class="SaveButton"><input type="hidden" name="TLEId" id="TLEId" value="<?php echo $_REQUEST['eid']; ?>"/></td>
 <td bgcolor="#B0FB4D"><input name="TLName" class="EditInput" style="width:250px;background-color:#B0FB4D;" value="<?php echo $res['TLName']; ?>"/></td>
 <td bgcolor="#B0FB4D"><input name="TLUname" class="EditInput" style="width:100px;background-color:#B0FB4D;" value="<?php echo $res['TLUname']; ?>"/></td>
 <td bgcolor="#B0FB4D"><input name="TLPwd" class="EditInput" style="width:100px;background-color:#B0FB4D;" value="<?php echo decrypt($res['TLPwd']); ?>"/></td>
 <td bgcolor="#B0FB4D"><input name="TLHq" class="EditInput" style="width:120px;background-color:#B0FB4D;" value="<?php echo $rHq['HqName']; ?>" readonly/></td>
 <td bgcolor="#B0FB4D"><select name="TLRepId" class="EditInput" style="width:150px;background-color:#B0FB4D;">
<?php $sE=mysql_query("select g.EmployeeID,EmpCode,Fname,Sname,Lname,DesigCode from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_designation d ON g.DesigId=d.DesigId where e.EmployeeID=".$res['TLRepId'], $con); $rE=mysql_fetch_assoc($sE); ?><option value="<?php echo $res['TLRepId']; ?>" selected><?php echo ucwords(strtolower($rE['Fname'].' '.$rE['Sname'].' '.$rE['Lname'])).' - '.$rE['DesigCode']; ?></option><?php $sE=mysql_query("select g.EmployeeID,EmpCode,Fname,Sname,Lname,DesigCode from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_designation d ON g.DesigId=d.DesigId where e.EmpStatus='A' AND g.DepartmentId=6 order by Fname ASC", $con); while($rE=mysql_fetch_assoc($sE)){ ?><option value="<?php echo $rE['EmployeeID']; ?>" style="color:#002953;"><?php echo ucwords(strtolower($rE['Fname'].' '.$rE['Sname'].' '.$rE['Lname'])).' - '.$rE['DesigCode']; ?></option><?php } ?></select></td>
 <td bgcolor="#B0FB4D"><input name="TLJoinDate" id="TLJoinDate" class="EditInput" style="width:80px;background-color:#B0FB4D;" value="<?php echo date("d-m-Y",strtotime($res['TLJoinDate'])); ?>" /><button id="f_btn1" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect: function(cal) { cal.hide()}, showTime: true }); cal.manageFields("f_btn1", "TLJoinDate", "%d-%m-%Y");</script></td>
 <td bgcolor="#B0FB4D"><select name="TLStatus" class="EditInput" style="width:50px;background-color:#B0FB4D;"><option value="<?php echo $res['TLStatus']; ?>" selected><?php echo $res['TLStatus']; ?></option><option value="<?php if($res['TLStatus']=='A'){echo 'D';}else{echo 'A';} ?>"><?php if($res['TLStatus']=='A'){echo 'D';}else{echo 'A';} ?></option></select></td> 
</tr>
</form>
<?php } else { ?>	
<tr bgcolor="#FFFFFF">
 <td align="center" style="font:Georgia;font-size:12px;" valign="top"><?php echo $sn; ?></td>
 <td align="center" valign="middle" style="font:Georgia; font-size:12px;"><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $res['TLEId']; ?>)"></a><?php /*&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $res['DealerId']; ?>)"></a> */ ?></td>
 <td><input name="TLName" class="EditInput" style="width:250px;" value="<?php echo $res['TLName']; ?>"/></td>
 <td><input name="TLUname" class="EditInput" style="width:100px;" value="<?php echo $res['TLUname']; ?>"/></td>
 <td><input type="password" name="TLPwd" class="EditInput" style="width:100px;" value="**********"/></td>
 <td><input name="TLHq" class="EditInput" style="width:120px;" value="<?php echo $rHq['HqName']; ?>" readonly/></td>
 <td><?php $sE=mysql_query("select g.EmployeeID,EmpCode,Fname,Sname,Lname,DesigCode from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_designation d ON g.DesigId=d.DesigId where e.EmployeeID=".$res['TLRepId'], $con); $rE=mysql_fetch_assoc($sE); ?><input name="TLRepId" class="EditInput" style="width:150px;" value="<?php echo ucwords(strtolower($rE['Fname'].' '.$rE['Sname'].' '.$rE['Lname'])).' - '.$rE['DesigCode']; ?>" /></td>
 <td><input name="TLJoinDate" id="TLJoinDate" class="EditInput" style="width:100px;text-align:center;" value="<?php echo date("d-m-Y",strtotime($res['TLJoinDate'])); ?>"/></td>
 <td bgcolor="#B0FB4D"><input name="TLStatus" class="EditInput" style="width:50px;text-align:center;" value="<?php echo $res['TLStatus']; ?>" /></td> 
</tr>
<?php } $sn++; } ?>
<?php } ?>
   </table>
    </td>
   </tr>
  </table>
 </td>
</tr>
</table>
		
<?php //************************************************************************?>
<?php //***************************END*****END*****END******END******END*****************************?>
<?php //**********************************************************************************?>
		
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

</html>
