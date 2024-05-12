<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
//**********************************
$EmMPID=$_REQUEST['ID']; $SqEC=mysql_query("select EmpCode from hrm_employee where EmployeeID=".$EmMPID, $con); $ReEC=mysql_fetch_assoc($SqEC);
//**********************************

if(isset($_POST['SaveNew']))
{ $SqlInseart=mysql_query("INSERT INTO hrm_asset_employee(EmployeeID, AssetNId, AssetId, AComName, ASrn, AModelName, APurDate, AAllocate, ADeAllocate, AExpiryDate, CreatedBy, CreatedDate, YearId) VALUES (".$EmMPID.", '".$_POST['AssetNId']."', '".$_POST['AssetId']."', '".$_POST['AComName']."', '".$_POST['ASrn']."', '".$_POST['AModelName']."', '".date("Y-m-d",strtotime($_POST['APurDate']))."', '".date("Y-m-d",strtotime($_POST['AAllocate']))."', '".date("Y-m-d",strtotime($_POST['ADeAllocate']))."', '".date("Y-m-d",strtotime($_POST['AExpiryDate']))."', ".$EmployeeId.",'".date('Y-m-d')."',".$YearId.")", $con);
}
if(isset($_POST['SaveEdit']))
{ $SqlUpdate = mysql_query("UPDATE hrm_asset_employee SET AssetNId='".$_POST['AssetNId']."', AssetId='".$_POST['AssetId']."', AComName='".$_POST['AComName']."', ASrn='".$_POST['ASrn']."', AModelName='".$_POST['AModelName']."', APurDate='".date("Y-m-d",strtotime($_POST['APurDate']))."', AAllocate='".date("Y-m-d",strtotime($_POST['AAllocate']))."', ADeAllocate='".date("Y-m-d",strtotime($_POST['ADeAllocate']))."', AExpiryDate='".date("Y-m-d",strtotime($_POST['AExpiryDate']))."', CreatedBy=".$EmployeeId.", CreatedDate='".date('Y-m-d')."', YearId=".$YearId." WHERE AssetEmpId=".$_POST['AssetEmpId'], $con); }

if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{ $SqlDelete=mysql_query("delete from hrm_asset_employee WHERE AssetEmpId=".$_REQUEST['did']." AND EmployeeID=".$EmMPID, $con) or die(mysql_error()); }

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style>.font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; } 
.font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function edit(value) { var ID=document.getElementById("ID").value; var agree=confirm("Are you sure you want to edit this record?");
if (agree){ var x = "MyAssetedititEmp.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&action=edit&eid="+value+"&ID="+ID;  window.location=x;}}
function del(value) { var ID=document.getElementById("ID").value; var agree=confirm("Are you sure you want to delete this record?");
if (agree){ var ID=document.getElementById("ID").value; var x = "MyAssetedititEmp.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&action=delete&did="+value+"&ID="+ID;  window.location=x;}}
function newsave(){ var ID=document.getElementById("ID").value; var x = "MyAssetedititEmp.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&action=newsave&ID="+ID;  window.location=x;}

function FunClickAsset(Aei)
{ var ID=document.getElementById("ID").value; window.open("MyAssetitEmpField.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&CheckAct=ExtraField&ID="+ID+"&Aei="+Aei,"AForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=600,height=450"); 
}
	
</script>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table style="margin-top:0px;">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top">
	     <table border="0" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //*************************************************************************************************************************************************** ?>	  
		     <table border="0" id="Activity">
			  <tr>
				  <td align="left" valign="top">
	     <table border="0">
		    <tr>
			 <td colspan="10"><table border="0" style="width:1500px;">
<?php $SqlEmp = mysql_query("SELECT hrm_employee.*, hrm_employee_general.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee.EmployeeID=".$EmMPID, $con);  $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
 if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
?>		
 <tr>
  <td><input type="hidden" id="ID" value="<?php echo $_REQUEST['ID']; ?>" />		 
   <table border="0">
<tr>
 <td>
  <table>
    <tr>
 <?php /*   <td align="center" valign="top" width="80"><?php echo "<img width=80px height=100px src=\"show_images.php?id=".$EmMPID."\">\n";?></td> */ ?>
	<td class="heading" valign="bottom"><font color="#106809" style='font-family:Times New Roman;' size="4"><i><b>Employee Asset Allotment: </b></i></font></td>
	<td>&nbsp;</td>
    <td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;" valign="bottom">EmpCode :</td>
	<td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;width:50px;color:#693434;" valign="bottom"><?php echo $EC; ?></td>
    <td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;" valign="bottom">Name :</td>
	<td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;color:#693434;" valign="bottom"><?php echo $Ename; ?></td>
    <td class="font4" style="left" valign="bottom">&nbsp;&nbsp;&nbsp;<b><span id="msgspan"><?php echo $msg; ?></span></b></td>
    </tr>
  </table>
 </td>
</tr>
<tr> 
<td align="left" valign="top">
<table border="1" id="TEmp" style="display:block;" cellpadding="0" cellspacing="0">
<tr bgcolor="#7a6189" style="color:#FFFFFF;font-weight:bold;height:22px;font-family:Times New Roman;font-size:12px;">
  <td style="width:40px;" align="center">SNo.</td>
  <td style="width:180px;" align="center">Name Of Asset/ Details</td>
  <td style="width:100px;" align="center">Assest ID</td>
  <td style="width:150px;" align="center">Company</td>
  <td style="width:100px;" align="center">Model Name</td>
  <td style="width:150px;" align="center">Serial No</td>
  <td style="width:100px;" align="center">Purchase</td>
  <td style="width:100px;" align="center">Expiry</td>
  <td style="width:100px;" align="center">Allocated</td>
  <td style="width:100px;" align="center">Returned</td>
  <td style="width:80px;" align="center">Action</td>
</tr>
<?php $sql=mysql_query("select * from hrm_asset_employee where EmployeeID=".$EmMPID." order by AAllocate DESC", $con); $SNo=1; while($res=mysql_fetch_array($sql)) {
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$res['AssetEmpId']){ ?>
<form name="OformEdit" method="post" onSubmit="return OvalidateEdit(this)">	
<tr bgcolor="#FFFFFF">
<td align="center" style="font-size:11px; font-family:Times New Roman;"><?php echo $SNo; ?>
<input type="hidden" name="AssetEmpId" id="AssetEmpId" value="<?php echo $res['AssetEmpId']; ?>" /></td>
<td align="center"><select name="AssetNId" id="AssetNId" style="width:150px;font-family:Times New Roman;font-size:12px;height:20px;">
<?php $sqlAn=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$res['AssetNId']); $resAn=mysql_fetch_array($sqlAn); ?>
<option value="<?php echo $res['AssetNId']; ?>"><?php if($res['AssetNId']!=''){echo $resAn['AssetName'];} else {echo 'SELECT';} ?></option>
<?php $sqlNA=mysql_query("select * from hrm_asset_name where Status='A' order by AssetName ASC", $con); while($resNA=mysql_fetch_assoc($sqlNA)) {?>
<option value="<?php echo $resNA['AssetNId']; ?>"><?php echo $resNA['AssetName']; ?></option><?php } ?></select></td>
<td align="center"><input name="AssetId" id="AssetId" style="width:100px;font-family:Times New Roman;font-size:12px;height:20px;" value="<?php echo $res['AssetId']; ?>" maxlength="50"/></td>
<td align="center"><input name="AComName" id="AComName" style="width:150px;font-family:Times New Roman;font-size:12px;height:20px;" value="<?php echo $res['AComName']; ?>" maxlength="50"/></td>
<td align="center"><input name="AModelName" id="AModelName" style="width:100px;font-family:Times New Roman;font-size:12px;height:20px;" value="<?php echo $res['AModelName']; ?>" maxlength="50"/></td>
<td align="center"><input name="ASrn" id="ASrn" style="width:150px;font-family:Times New Roman;font-size:12px;height:20px;" value="<?php echo $res['ASrn']; ?>" maxlength="50"/></td>
<td align="center"><input name="APurDate" id="APurDate" style="width:70px;font-family:Times New Roman;font-size:12px;height:20px;" value="<?php if($res['APurDate']=='0000-00-00' OR $res['APurDate']=='1970-01-01'){echo '';} else {echo date("d-m-Y",strtotime($res['APurDate']));} ?>" readonly/><button id="APurDateBtn" class="CalenderButton"></button></td>

<td align="center"><input name="AExpiryDate" id="AExpiryDate" style="width:70px;font-family:Times New Roman;font-size:12px;height:20px;" value="<?php if($res['AExpiryDate']=='0000-00-00' OR $res['AExpiryDate']=='1970-01-01'){echo '0000-00-00';} else {echo date("d-m-Y",strtotime($res['AExpiryDate']));} ?>" readonly/><button id="AExpiryDateBtn" class="CalenderButton"></button></td>	
							
<td align="center"><input name="AAllocate" id="AAllocate" style="width:70px;font-family:Times New Roman;font-size:12px;height:20px;" value="<?php if($res['AAllocate']=='0000-00-00' OR $res['AAllocate']=='1970-01-01'){echo '';} else {echo date("d-m-Y",strtotime($res['AAllocate']));} ?>" readonly/><button id="AAllocateBtn" class="CalenderButton"></button></td>
<td align="center"><input name="ADeAllocate" id="ADeAllocate" style="width:70px;font-family:Times New Roman;font-size:12px;height:20px;" value="<?php if($res['ADeAllocate']=='0000-00-00' OR $res['ADeAllocate']=='1970-01-01'){echo '0000-00-00';} else {echo date("d-m-Y",strtotime($res['ADeAllocate']));} ?>" readonly/>
                                   <button id="ADeAllocateBtn" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("APurDateBtn", "APurDate", "%d-%m-%Y"); cal.manageFields("AExpiryDateBtn", "AExpiryDate", "%d-%m-%Y");  cal.manageFields("AAllocateBtn", "AAllocate", "%d-%m-%Y"); cal.manageFields("ADeAllocateBtn", "ADeAllocate", "%d-%m-%Y"); </script></td>
<td align="center"><input type="submit" name="SaveEdit"  value="" class="SaveButton"><input type="hidden" name="AssetEmpId" id="AssetEmpId" value="<?php echo $_REQUEST['eid']; ?>"/></td>
</tr>
</form> 
<?php } else { ?>	
<tr bgcolor="#FFFFFF">
<td align="center" style="font-size:12px; font-family:Times New Roman;"><?php echo $SNo; ?></td>
<td style="font-size:12px; font-family:Times New Roman;">&nbsp;<a href="#" onClick="FunClickAsset(<?php echo $res['AssetEmpId']; ?>)"><?php if($res['AssetNId']!=''){ $sqlAn=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$res['AssetNId']); $resAn=mysql_fetch_array($sqlAn); echo $resAn['AssetName']; } else {echo '';} ?></a></td>
<td style="font-size:12px;font-family:Times New Roman;"><?php echo $res['AssetId']; ?></td>
<td style="font-size:12px;font-family:Times New Roman;"><?php echo $res['AComName']; ?></td>
<td style="font-size:12px;font-family:Times New Roman;"><?php echo $res['AModelName']; ?></td>
<td style="font-size:12px;font-family:Times New Roman;"><?php echo $res['ASrn']; ?></td>
<td align="center" style="font-size:12px; font-family:Times New Roman;"><?php if($res['APurDate']=='0000-00-00' OR $res['APurDate']=='1970-01-01'){echo '';} else {echo date("d-m-Y",strtotime($res['APurDate']));} ?></td>
<td align="center" style="font-size:12px;font-family:Times New Roman;"><?php if($res['AExpiryDate']=='0000-00-00' OR $res['AExpiryDate']=='1970-01-01'){echo '';} else {echo date("d-m-Y",strtotime($res['AExpiryDate']));} ?></td>
<td align="center" style="font-size:12px; font-family:Times New Roman;"><?php if($res['AAllocate']=='0000-00-00' OR $res['AAllocate']=='1970-01-01'){echo '';} else {echo date("d-m-Y",strtotime($res['AAllocate']));} ?></td>
<td align="center" style="font-size:12px; font-family:Times New Roman;"><?php if($res['ADeAllocate']=='0000-00-00' OR $res['ADeAllocate']=='1970-01-01'){echo '';} else {echo date("d-m-Y",strtotime($res['ADeAllocate']));} ?></td>
<td align="center"><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $res['AssetEmpId']; ?>)"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $res['AssetEmpId']; ?>)"></a></td>
</tr>
<?php } $SNo++;} ?>
<tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>
<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">
<tr bgcolor="#FFFFFF">
<td class="All_50" align="center"><?php echo $SNo; ?></td>
<td align="center"><select name="AssetNId" id="AssetNId" style="width:150px;font-family:Times New Roman;font-size:12px;height:20px;"><option value="0">SELECT</option>
<?php $sqlNA=mysql_query("select * from hrm_asset_name where Status='A' order by AssetName ASC", $con); while($resNA=mysql_fetch_assoc($sqlNA)) {?>
<option value="<?php echo $resNA['AssetNId']; ?>"><?php echo $resNA['AssetName']; ?></option><?php } ?></select></td>
<td class="All_100" align="center"><input name="AssetId" id="AssetId" style="width:100px;font-family:Times New Roman;font-size:12px;height:20px;" maxlength="50" /></td>
<td class="All_100" align="center"><input name="AComName" id="AComName" style="width:150px;font-family:Times New Roman;font-size:12px;height:20px;" maxlength="50" /></td>
<td class="All_100" align="center"><input name="AModelName" id="AModelName" style="width:100px;font-family:Times New Roman;font-size:12px;height:20px;" maxlength="50" /></td>
<td class="All_100" align="center"><input name="ASrn" id="ASrn" style="width:150px;font-family:Times New Roman;font-size:12px;" maxlength="50" /></td>
<td class="All_100" align="center"><input name="APurDate" id="APurDate" style="width:70px;font-family:Times New Roman;font-size:12px;height:20px;" readonly/>
                                   <button id="APurDateBtn" class="CalenderButton"></button></td>
<td class="All_100" align="center"><input name="AExpiryDate" id="AExpiryDate" style="width:70px;font-family:Times New Roman;font-size:12px;height:20px;" value="0000-00-00" readonly/>
                                   <button id="AExpiryDateBtn" class="CalenderButton"></button></td>								   
<td class="All_100" align="center"><input name="AAllocate" id="AAllocate" style="width:70px;font-family:Times New Roman;font-size:12px;height:20px;" readonly/>
                                   <button id="AAllocateBtn" class="CalenderButton"></button></td>
<td class="All_100" align="center"><input name="ADeAllocate" id="ADeAllocate" style="width:70px;font-family:Times New Roman;font-size:12px;height:20px;" value="0000-00-00" readonly/>
                                   <button id="ADeAllocateBtn" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("APurDateBtn", "APurDate", "%d-%m-%Y"); cal.manageFields("AExpiryDateBtn", "AExpiryDate", "%d-%m-%Y");  cal.manageFields("AAllocateBtn", "AAllocate", "%d-%m-%Y"); cal.manageFields("ADeAllocateBtn", "ADeAllocate", "%d-%m-%Y");</script></td>
<td align="center"><input type="submit" name="SaveNew"  value="" class="SaveButton"></td>
</tr>
</form>
<?php } ?>
	  </table>
	 </td>
    </tr>
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="410"><tr><td align="right">
<input type="button" name="NewSave" id="NewSave" value="new" onClick="newsave()" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/>
<input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='MyAssetedititEmp.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&ID=<?php echo $_REQUEST['ID']; ?>'"/>&nbsp;
     </td></tr></table></td>
   </tr>
  </table>  
</td>
</tr>	
              </table>
			 </td>
			</tr>		
		 </table>
	           </td>
    </tr>
</table>
	
<?php //*************************************************************************************************************************************************** ?>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;">
		    <tr><td align="center" valign="top" width="100">&nbsp;</td></tr>
	        </table>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;"><tr><td align="center" valign="top">&nbsp;&nbsp;</td></tr></table>
		   </td>
		  </tr>
		</table>
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
