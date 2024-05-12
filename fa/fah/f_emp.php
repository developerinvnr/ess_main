<?php session_start();
if($_SESSION['login'] = true){require_once('../../Employee/sp/user/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
$EmployeeId=$_SESSION['ID'];

if(isset($_POST['SaveNew']))
{ 
  $CHpass=encrypt($_POST['TLPwd']); 
  $sql = mysql_query("insert into hrm_sales_tlemp(TLUname, TLPwd, TLName, Type, State1, State2, State3, TLStatus, TLCrBy, TLCrDate) values('".$_POST['TLUname']."', '".$CHpass."', '".$_POST['TLName']."', 'FA', ".$_POST['State1'].", ".$_POST['State2'].", ".$_POST['State3'].", '".$_POST['TLStatus']."', '".$_POST['ui']."', '".date("Y-m-d")."')", $con); 
  if($sql)
  {
   echo '<script>alert("Data inserted successfully");</script>';
  }
}

if(isset($_POST['SaveEdit']))
{ 
 $CHpass=encrypt($_POST['TLPwd']); 
 $sql = mysql_query("update hrm_sales_tlemp set TLUname='".$_POST['TLUname']."', TLPwd='".$CHpass."', TLName='".$_POST['TLName']."', State1=".$_POST['State1'].", State2=".$_POST['State2'].", State3=".$_POST['State3'].", TLStatus='".$_POST['TLStatus']."', TLCrBy=".$_POST['ui']." where TLEId=".$_POST['TLEId'], $con); 
  if($sql)
  {
   echo '<script>alert("Data inserted successfully");</script>';
  }
  
}

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

function edit(value){ var agree=confirm("Are you sure you want to edit this record?"); 
if(agree){ var c=1; var s=0; var hq=0;  
var x = "f_emp.php?action=edit&eid="+value+"&c="+c+"&s="+s+"&hq="+hq;  window.location=x;} }
 

function newsave(){ var c=1; var s=0; var hq=0; 
var x = "f_emp.php?action=newsave&c="+c+"&s="+s+"&hq="+hq;  window.location=x;}

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
	  <td style="margin-top:0px;" class="heading" align="center"><u>FA Employee </u>:</td>
	   
	   <td style="width:10px;">&nbsp;</td>
	   <td><input type="button" name="NewSave" id="NewSave" value="new" onClick="newsave()" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/><input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='f_emp.php?ac=4441&ee=4421&der=t3&ccc=false&d=dreefoultVlue&u=UsuuerIo&trht=FTF%%FT&tt=valuased&desgn=Trern&c=<?php echo $_REQUEST['c'] ?>&s=<?php echo $_REQUEST['s'] ?>&hq=<?php echo $_REQUEST['hq'] ?>'"/>&nbsp;
     </td>
	  </tr>
   </table>
  </td>
 </tr>	
<tr>
 <td valign="top">
  <table border="1" cellspacing="0">

<tr style="height:25px; background-color:#7a6189">
  <td class="fnt" style="width:30px;">&nbsp;Sn&nbsp;</td>
  <td class="fnt" style="width:50px;">&nbsp;</td>
  <td class="fnt" style="width:250px;">Full Name</td>
  <td class="fnt" style="width:100px;">UserName</td>
  <td class="fnt" style="width:100px;">Pwd</td>
  <td class="fnt" style="width:120px;">State1</td>
  <td class="fnt" style="width:120px;">State2</td>
  <td class="fnt" style="width:120px;">State3</td>
  <td class="fnt" style="width:50px;">Status</td>
</tr> 
<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">
<input type="hidden" name="ci" id="ci" value="<?php echo $CompanyId; ?>" /><input type="hidden" id="ui" name="ui" value="<?php echo $EmployeeId; ?>" /><input type="hidden" id="hq" name="hq" value="<?php echo $_REQUEST['hq']; ?>" />
<tr bgcolor="#FFFFFF">
 <td align="center" style="font:Georgia;font-size:12px;width:30px;" valign="top"><?php echo $sn; ?></td>
 <td align="center" valign="middle" style="width:50px;">
 <input type="submit" name="SaveNew"  value="" class="SaveButton"></td>
 <td><input name="TLName" class="EditInput" style="width:250px;"/></td>
 <td><input name="TLUname" class="EditInput" style="width:100px;"/></td>
 <td><input type="password" name="TLPwd" class="EditInput" style="width:100px;"/></td>
 <td><select class="EditInput" style="width:120px;" name="State1" id="State1">
 <option value="0">Select</option>
 <?php $sqlS = mysql_query("SELECT * FROM hrm_state where CountryId=".$_REQUEST['c']." order by StateName ASC", $con); 
	   $resS=mysql_fetch_array($sqlS); while($resS=mysql_fetch_array($sqlS)) {?><option value=<?=$resS['StateId']?>><?=strtoupper($resS['StateName'])?></option><?php } ?></select></td>
	   
 <td bgcolor="#B0FB4D"><select class="EditInput" style="width:120px;" name="State2" id="State2">
 <option value="0">Select</option>
 <?php $sqlS = mysql_query("SELECT * FROM hrm_state where CountryId=".$_REQUEST['c']." order by StateName ASC", $con); 
	   $resS=mysql_fetch_array($sqlS); while($resS=mysql_fetch_array($sqlS)) {?><option value=<?=$resS['StateId']?>><?=strtoupper($resS['StateName'])?></option><?php } ?></select></td>
	   
 <td bgcolor="#B0FB4D"><select class="EditInput" style="width:120px;" name="State3" id="State3">
 <option value="0">Select</option>
 <?php $sqlS = mysql_query("SELECT * FROM hrm_state where CountryId=".$_REQUEST['c']." order by StateName ASC", $con); 
	   $resS=mysql_fetch_array($sqlS); while($resS=mysql_fetch_array($sqlS)) {?><option value=<?=$resS['StateId']?>><?=strtoupper($resS['StateName'])?></option><?php } ?></select></td>	   
 
 
 <td bgcolor="#B0FB4D"><select name="TLStatus" class="EditInput" style="width:50px;background-color:#B0FB4D;">
 <option value="A">A</option><option value="D">D</option></select></td>
</tr>
</form>
<?php } ?>
<?php 

 $sql = mysql_query("SELECT * FROM hrm_sales_tlemp where Type='FA' order by TLName ASC", $con); 
 $sn=1; while($res = mysql_fetch_array($sql)){ 
 
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$res['TLEId']){ ?>
<form name="OformEdit" method="post" onSubmit="return OvalidateEdit(this)">	
<input type="hidden" name="ci" id="ci" value="<?php echo $CompanyId; ?>" /><input type="hidden" id="ui" name="ui" value="<?php echo $EmployeeId; ?>" /><input type="hidden" id="hq" name="hq" value="0" />
<tr bgcolor="#FFFFFF">
 <td align="center" style="font:Georgia;font-size:12px;" valign="top"><?php echo $sn; ?></td>
 <td align="center"><input type="submit" name="SaveEdit" class="SaveButton"><input type="hidden" name="TLEId" id="TLEId" value="<?php echo $_REQUEST['eid']; ?>"/></td>
 <td><input name="TLName" class="EditInput" style="width:250px;" value="<?php echo $res['TLName']; ?>"/></td>
 <td><input name="TLUname" class="EditInput" style="width:100px;" value="<?php echo $res['TLUname']; ?>"/></td>
 <td><input name="TLPwd" class="EditInput" style="width:100px;" value="<?php echo decrypt($res['TLPwd']); ?>"/></td>
 
 <td><select class="EditInput" style="width:120px;" name="State1" id="State1"><?php $sqlS = mysql_query("SELECT * FROM hrm_state where CountryId=".$_REQUEST['c']." order by StateName ASC", $con); 
	   $resS=mysql_fetch_array($sqlS); while($resS=mysql_fetch_array($sqlS)){ ?><option value="<?=$resS['StateId']?>" <?php if($res['State1']==$resS['StateId']){echo 'selected';}?>><?=strtoupper($resS['StateName'])?></option><?php } ?>
	   <option value="0" <?php if($res['State1']==0 OR $res['State1']==''){echo 'selected';} ?>>Select</option>
	   </select>
	   </td>
	   
 <td><select class="EditInput" style="width:120px;" name="State2" id="State2"><?php $sqlS = mysql_query("SELECT * FROM hrm_state where CountryId=".$_REQUEST['c']." order by StateName ASC", $con); 
	   $resS=mysql_fetch_array($sqlS); while($resS=mysql_fetch_array($sqlS)) {?><option value="<?=$resS['StateId']?>" <?php if($res['State2']==$resS['StateId']){echo 'selected';} ?>><?=strtoupper($resS['StateName'])?></option><?php } ?>
	   <option value="0" <?php if($res['State2']==0 OR $res['State2']==''){echo 'selected';} ?>>Select</option>
	   </select>
	   </td>
	   
 <td><select class="EditInput" style="width:120px;" name="State3" id="State3"><?php $sqlS = mysql_query("SELECT * FROM hrm_state where CountryId=".$_REQUEST['c']." order by StateName ASC", $con); 
	   $resS=mysql_fetch_array($sqlS); while($resS=mysql_fetch_array($sqlS)) {?><option value="<?=$resS['StateId']?>" <?php if($res['State3']==$resS['StateId']){echo 'selected';} ?>><?=strtoupper($resS['StateName'])?></option><?php } ?>
	   <option value="0" <?php if($res['State3']==0 OR $res['State3']==''){echo 'selected';} ?>>Select</option>
	   </select>
	   </td>
	   
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
 
 <td><select class="EditInput" style="width:120px;" name="State1" id="State1"><?php $sqlS = mysql_query("SELECT * FROM hrm_state where CountryId=".$_REQUEST['c']." order by StateName ASC", $con); 
	   $resS=mysql_fetch_array($sqlS); while($resS=mysql_fetch_array($sqlS)){ ?><option value="<?=$resS['StateId']?>" <?php if($res['State1']==$resS['StateId']){echo 'selected';}?>><?=strtoupper($resS['StateName'])?></option><?php } ?>
	   <option value="0" <?php if($res['State1']==0 OR $res['State1']==''){echo 'selected';} ?>>Select</option>
	   </select>
	   </td>
	   
 <td><select class="EditInput" style="width:120px;" name="State2" id="State2"><?php $sqlS = mysql_query("SELECT * FROM hrm_state where CountryId=".$_REQUEST['c']." order by StateName ASC", $con); 
	   $resS=mysql_fetch_array($sqlS); while($resS=mysql_fetch_array($sqlS)) {?><option value="<?=$resS['StateId']?>" <?php if($res['State2']==$resS['StateId']){echo 'selected';} ?>><?=strtoupper($resS['StateName'])?></option><?php } ?>
	   <option value="0" <?php if($res['State2']==0 OR $res['State2']==''){echo 'selected';} ?>>Select</option>
	   </select>
	   </td>
	   
 <td><select class="EditInput" style="width:120px;" name="State3" id="State3"><?php $sqlS = mysql_query("SELECT * FROM hrm_state where CountryId=".$_REQUEST['c']." order by StateName ASC", $con); 
	   $resS=mysql_fetch_array($sqlS); while($resS=mysql_fetch_array($sqlS)) {?><option value="<?=$resS['StateId']?>" <?php if($res['State3']==$resS['StateId']){echo 'selected';} ?>><?=strtoupper($resS['StateName'])?></option><?php } ?>
	   <option value="0" <?php if($res['State3']==0 OR $res['State3']==''){echo 'selected';} ?>>Select</option>
	   </select>
	   </td>
 
 
 <td bgcolor="#B0FB4D"><input name="TLStatus" class="EditInput" style="width:50px;text-align:center;" value="<?php echo $res['TLStatus']; ?>" /></td> 
</tr>
<?php } $sn++; } ?>

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
