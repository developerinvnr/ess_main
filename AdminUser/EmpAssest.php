<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************
$_SESSION['EmployeeID']=$_REQUEST['ID']; $EMPID=$_SESSION['EmployeeID'];
$SqEC=mysql_query("select EmpCode from hrm_employee where EmployeeID=".$EMPID, $con); $ReEC=mysql_fetch_assoc($SqEC);
//**********************************
if(isset($_POST['EditAsstE']))
{  
   $sql=mysql_query("select * from hrm_employee_assest where EmployeeID=".$EMPID, $con); $row=mysql_num_rows($sql);
   if($row>0) { if($_POST['TypeOfAsst1']!=''){$sqlDelete=mysql_query("DELETE FROM hrm_employee_assest WHERE EmployeeID=".$EMPID, $con);} }
   		   
   for($i=1; $i<16; $i++)
   { if($_POST['TypeOfAsst'.$i]!='')
     { $SqlInsAsst = mysql_query("INSERT INTO hrm_employee_assest(EmployeeID, EC, AssestName, AssestId, AssestCompanyName, ModelNo, SrNo, PurchaseDate, AllocatedDate, DeAllocatedDate, IdentyDetails, CreatedBy, CreatedDate, YearId) VALUES (".$EMPID.", ".$ReEC['EmpCode'].", '".$_POST['TypeOfAsst'.$i]."', '".$_POST['AsstID'.$i]."', '".$_POST['ComName'.$i]."', '".$_POST['Model'.$i]."', '".$_POST['SrNo'.$i]."', '".date("Y-m-d",strtotime($_POST['PurDate'.$i]))."', '".date("Y-m-d",strtotime($_POST['AllcatDate'.$i]))."', '".date("Y-m-d",strtotime($_POST['DeAllcatDate'.$i]))."', '".$_POST['Identy'.$i]."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")", $con); 
     }
   } 
  
   if($_POST['TypeOfAsst1']=='')
   { $SqlInsAsst = mysql_query("update hrm_employee_assest set AssestName='', AssestId='', AssestCompanyName='', ModelNo='', SrNo='', PurchaseDate='', AllocatedDate='', DeAllocatedDate='', IdentyDetails='', CreatedBy='', CreatedDate='', YearId='' where EmployeeID=".$EMPID, $con); 
   }
   if($SqlInsAsst){ $msg = "data has been submitted successfully..."; }
}

if($_REQUEST['Action']=='Delete' AND $_REQUEST['Action']!='')
{ $Delete=mysql_query("DELETE FROM hrm_employee_assest WHERE EmpAssestId=".$_REQUEST['Value'], $con);
  if($Delete){ $msg = "data has been deleted successfully..."; }
}
?> 
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/EmpMasterAddNewAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script language="javascript">
function EditAsst()
{ 
 document.getElementById("EditAsstE").style.display = 'block'; document.getElementById("ChangeAsst").style.display = 'none';
 var AsstNum = document.getElementById("AsstRowCount").value; 
 if(AsstNum!=0)
 { for (i=1; i<=AsstNum; i++) 
    {document.getElementById("TypeOfAsst"+i).disabled = false; document.getElementById("AsstID"+i).readOnly = false; 
	 document.getElementById("ComName"+i).readOnly = false; document.getElementById("Model"+i).readOnly = false;
	 document.getElementById("SrNo"+i).readOnly = false; document.getElementById("PurDate"+i).readOnly = true; 
	 document.getElementById("AllcatDate"+i).readOnly = true; document.getElementById("DeAllcatDate"+i).readOnly = true;
	 document.getElementById("PurDate"+i+"Btn").disabled = false; document.getElementById("AllcatDate"+i+"Btn").disabled = false; 
	 document.getElementById("DeAllcatDate"+i+"Btn").disabled = false; document.getElementById("Identy"+i).readOnly = false; } 
    for(var j=i; j<16; j++)
	{document.getElementById("TypeOfAsst"+j).disabled = false; document.getElementById("AsstID"+j).readOnly = false; 
	 document.getElementById("ComName"+j).readOnly = false; document.getElementById("Model"+j).readOnly = false;
	 document.getElementById("SrNo"+j).readOnly = false; document.getElementById("PurDate"+j).readOnly = true; 
	 document.getElementById("AllcatDate"+j).readOnly = true; document.getElementById("DeAllcatDate"+j).readOnly = true;
	 document.getElementById("PurDate"+j+"Btn").disabled = false; document.getElementById("AllcatDate"+j+"Btn").disabled = false; 
	 document.getElementById("DeAllcatDate"+j+"Btn").disabled = false; document.getElementById("Identy"+j).readOnly = false; }  
  }
}

for(var i=2; i<16; i++) 
{
function ShowRowAsst(i)
 { 
 var t = i+1;  var t1 = i-1; 
  if(i<=14)
  {
    if(document.getElementById("TypeOfAsst"+t1).value=='' || document.getElementById("AsstID"+t1).value=='' || document.getElementById("ComName"+t1).value=='' || document.getElementById("Model"+t1).value=='' || document.getElementById("PurDate"+t1).value=='' || document.getElementById("AllcatDate"+t1).value=='') { alert("please first enter previous row!"); }
    else {document.getElementById('minusImg_'+i).style.display = 'block'; document.getElementById('addImg_'+i).style.display = 'none';
          document.getElementById('Row_'+i).style.display = 'block'; document.getElementById('addImg_'+t).style.display = 'block';
          document.getElementById('minusImg_'+t1).style.display = 'none'; }
  }
  else 
  { document.getElementById('minusImg_'+i).style.display = 'block'; document.getElementById('addImg_'+i).style.display = 'none';
    document.getElementById('Row_'+i).style.display = 'block';  document.getElementById('minusImg_'+t1).style.display = 'none';  }
  }
 
function HideRowAsst(i)
 { 
 var t = i+1;  var t1 = i-1; 
  if(i<=14)
  {document.getElementById('minusImg_'+i).style.display = 'none'; document.getElementById('addImg_'+i).style.display = 'block';
   document.getElementById('Row_'+i).style.display = 'none'; document.getElementById('addImg_'+t).style.display = 'none';
   document.getElementById('minusImg_'+t1).style.display = 'block';
   document.getElementById('TypeOfAsst'+i).value = ""; document.getElementById('AsstID'+i).value = ""; document.getElementById('ComName'+i).value = "";
   document.getElementById('Model'+i).value = ""; document.getElementById('SrNo'+i).value = ""; document.getElementById('PurDate'+i).value = ""; 
   document.getElementById('AllcatDate'+i).value = ""; document.getElementById('DeAllcatDate'+i).value = ""; document.getElementById('Identy'+i).value = ""; }
  else 
  { document.getElementById('minusImg_'+i).style.display = 'none'; document.getElementById('addImg_'+i).style.display = 'block';
    document.getElementById('Row_'+i).style.display = 'none';  document.getElementById('minusImg_'+t1).style.display = 'block';  
	document.getElementById('TypeOfAsst'+i).value = ""; document.getElementById('AsstID'+i).value = ""; document.getElementById('ComName'+i).value = "";
    document.getElementById('Model'+i).value = ""; document.getElementById('SrNo'+i).value = ""; document.getElementById('PurDate'+i).value = ""; 
	document.getElementById('AllcatDate'+i).value = ""; document.getElementById('DeAllcatDate'+i).value = ""; document.getElementById('Identy'+i).value = "";}
  } 
}

function validate(formEAsst)
{  
  var TypeOfAsst1 = formEAsst.TypeOfAsst1.value; var AsstID1 = formEAsst.AsstID1.value; var ComName1 = formEAsst.ComName1.value;
  var Model1 = formEAsst.Model1.value; var SrNo1 = formEAsst.SrNo1.value; var PurDate1 = formEAsst.PurDate1.value;
  var AllcatDate1 = formEAsst.AllcatDate1.value; var DeAllcatDate1 = formEAsst.DeAllcatDate1.value; var Identy1 = formEAsst.Identy1.value;
}

function DelAsst(value,Id)
{ var agree=confirm("Are you sure you want to delete this record?"); 
  if (agree) {  var x = "EmpAssest.php?ID="+Id+"&Value="+value+"&Action=Delete";  window.location=x; }
}
</script>
<?php /************ Check It**********/ ?>
</head>
<body class="body">
<?php 
$SqlEmp = mysql_query("SELECT hrm_employee.*, hrm_employee_general.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee.EmployeeID=".$EMPID, $con) or die(mysql_error());  $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
 if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
?>
<table class="table" border="0">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){require_once("AMenu.php"); } ?></td></tr></table></td></tr>
<tr><td valign="top">
      <table width="100%" style="margin-top:0px;" border="0">
	    <tr><td valign="top"><?php if($_SESSION['login'] = true){require_once("AWelcome.php"); } ?></td></tr>
	    <tr>
	        <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
  <table border="0" style="margin-top:0px; width:100%; height:300px;">
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
<?php //*********************************************************************************************************************************************************?>
<td align="left" id="Eexp" valign="top">             
 <form enctype="multipart/form-data" name="formEAsst" method="post" onSubmit="return validate(this)">
<table border="0">
<tr>
 <td>
  <table>
    <tr>
    <td align="center" valign="top" width="80"><?php echo "<img width=80px height=100px src=\"show_images.php?id=".$EMPID."\">\n";?></td>
	<td align="" width="150" class="heading" valign="bottom">Employee Assest</td><td>&nbsp;</td>
    <td class="All_80" valign="bottom">EmpCode :</td>
	<td class="All_60" valign="bottom"><input name="EmpCode" id="EmpCode" class="All_50" style="background-color:#E6EBC5;" value="<?php echo $EC; ?>" Readonly></td>
    <td class="All_50" valign="bottom">Name :</td><td class="All_220" valign="bottom"><input name="EmpName" id="EmpName" style="width:210px; height:18px; font-size:11px;background-color:#E6EBC5;text-transform:uppercase;" value="<?php echo $Ename; ?>" Readonly></td>
    <td class="font4" style="left" valign="bottom">&nbsp;&nbsp;&nbsp;<b><span id="msgspan"><?php echo $msg; ?></span></b></td>
    </tr>
  </table>
 </td>
</tr>
<tr> 
<td align="left" valign="top">
<table border="0" id="TEmp" style="display:block;" cellpadding="0" cellspacing="0">
<tr>
<td style="width:30px;background-color:#E0DBE3;" align="center"></td>
<td><table bgcolor="#BCA9D3" width="1100"><tr>
  <td class="All_50" align="center">SNo.</td>
  <td class="All_100" align="center">Type Of Assest</td>
  <td class="All_100" align="center">Assest ID</td>
  <td class="All_100" align="center">Company</td>
  <td class="All_100" align="center">Model</td>
  <td class="All_100" align="center">Serial No</td>
  <td class="All_100" align="center">Purchase</td>
  <td class="All_100" align="center">Allocated</td>
  <td class="All_100" align="center">Deallocated</td>
  <td class="All_150" align="center">Remark</td>
  <td class="All_50">&nbsp;</td>
</tr></table></td>
</tr>
<?php $sqlAsst=mysql_query("select * from hrm_employee_assest where EmployeeID=".$EMPID." order by EmpAssestId ASC", $con); $rowAsst=mysql_num_rows($sqlAsst); 
      if($rowAsst>0) { $i=1; $No=1; while($resAsst=mysql_fetch_array($sqlAsst)){?>
<tr>
<td style="width:30px;background-color:#E0DBE3;" align="center"></td>
<td><table bgcolor="#FFFFFF" border="0" width="1100"><tr>
<td class="All_50" align="center"><?php echo $No; ?>
<input type="hidden" name="AsstNoId<?php echo $i; ?>" id="AsstNoId<?php echo $i; ?>" value="<?php echo $resAsst['EmpAssestId']; ?>" /></td>
<td class="All_100" align="center"><select name="TypeOfAsst<?php echo $i; ?>" id="TypeOfAsst<?php echo $i; ?>" class="All_100" disabled>
<option value="<?php if($resAsst['AssestName']!=''){echo $resAsst['AssestName'];} else {echo '';} ?>"><?php if($resAsst['AssestName']!=''){echo $resAsst['AssestName'];} else {echo 'select';} ?></option>
<?php $sqlNA=mysql_query("select * from hrm_assest_name where CompanyId=".$CompanyId." AND AssestStatus='A' order by AssestName ASC", $con); while($resNA=mysql_fetch_assoc($sqlNA)) {?>
<option value="<?php echo $resNA['AssestName']; ?>"><?php echo $resNA['AssestName']; ?></option><?php } ?></select></td>
<td class="All_100" align="center"><input name="AsstID<?php echo $i; ?>" id="AsstID<?php echo $i; ?>" class="All_100" value="<?php echo $resAsst['AssestId']; ?>" maxlength="50" readonly/></td>
<td class="All_100" align="center"><input name="ComName<?php echo $i; ?>" id="ComName<?php echo $i; ?>" class="All_100" value="<?php echo $resAsst['AssestCompanyName']; ?>" maxlength="50" readonly/></td>
<td class="All_100" align="center"><input name="Model<?php echo $i; ?>" id="Model<?php echo $i; ?>" class="All_100" value="<?php echo $resAsst['ModelNo']; ?>" maxlength="50" readonly/></td>
<td class="All_100" align="center"><input name="SrNo<?php echo $i; ?>" id="SrNo<?php echo $i; ?>" class="All_100" value="<?php echo $resAsst['SrNo']; ?>" maxlength="50" readonly/></td>
<td class="All_100" align="center"><input name="PurDate<?php echo $i; ?>" id="PurDate<?php echo $i; ?>" class="All_70" value="<?php if($resAsst['PurchaseDate']=='0000-00-00' OR $resAsst['PurchaseDate']=='1970-01-01'){echo '';} else {echo date("d-m-Y",strtotime($resAsst['PurchaseDate']));} ?>" readonly/>
                                   <button id="PurDate<?php echo $i; ?>Btn" class="CalenderButton" disabled></button></td>
<td class="All_100" align="center"><input name="AllcatDate<?php echo $i; ?>" id="AllcatDate<?php echo $i; ?>" class="All_70" value="<?php if($resAsst['AllocatedDate']=='0000-00-00' OR $resAsst['AllocatedDate']=='1970-01-01'){echo '';} else {echo date("d-m-Y",strtotime($resAsst['AllocatedDate']));} ?>" readonly/>
                                   <button id="AllcatDate<?php echo $i; ?>Btn" class="CalenderButton" disabled></button></td>
<td class="All_100" align="center"><input name="DeAllcatDate<?php echo $i; ?>" id="DeAllcatDate<?php echo $i; ?>" class="All_70" value="<?php if($resAsst['DeAllocatedDate']=='0000-00-00' OR $resAsst['DeAllocatedDate']=='1970-01-01'){echo '';} else {echo date("d-m-Y",strtotime($resAsst['DeAllocatedDate']));} ?>" readonly/>
                                   <button id="DeAllcatDate<?php echo $i; ?>Btn" class="CalenderButton" disabled></button>
<script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("PurDate<?php echo $i; ?>Btn", "PurDate<?php echo $i; ?>", "%d-%m-%Y");  cal.manageFields("AllcatDate<?php echo $i; ?>Btn", "AllcatDate<?php echo $i; ?>", "%d-%m-%Y"); cal.manageFields("DeAllcatDate<?php echo $i; ?>Btn", "DeAllcatDate<?php echo $i; ?>", "%d-%m-%Y");</script></td>
<td class="All_150" align="center"><input name="Identy<?php echo $i; ?>" id="Identy<?php echo $i; ?>" class="All_150" value="<?php echo $resAsst['IdentyDetails']; ?>" maxlength="150" readonly/></td>
<td class="All_50" align="center"><?php if($i!=1) { ?><a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="DelAsst(<?php echo $resAsst['EmpAssestId'].','.$EMPID; ?>)"></a><?php } ?></td>
</tr></table></td>
</tr>
<?php $i++; $No++;} }?><input type="hidden" name="AsstRowCount" id="AsstRowCount" value="<?php echo $rowAsst; ?>" />
<?php for($j=$i; $j<16; $j++){ ?>
<tr>
<td style="width:30px;background-color:#E0DBE3;" id="Img_<?php echo $j; ?>" align="center">
<img src="images/Addnew.png" <?php if($j>$i) { echo 'style="display:none;"';} ?> border="0" id="addImg_<?php echo $j; ?>" onClick="ShowRowAsst(<?php echo $j; ?>)"/>
<img src="images/Minusnew.png" id="minusImg_<?php echo $j; ?>" <?php if($j>=$i){ echo 'style="display:none;"'; } ?> border="0" onClick="HideRowAsst(<?php echo $j; ?>)"/></td>
<td><table style="display:none;" id="Row_<?php echo $j; ?>" bgcolor="#FFFFFF" border="0" width="1100"><tr>
<td class="All_50" align="center"><?php echo $j; ?></td>
<td class="All_100" align="center"><select name="TypeOfAsst<?php echo $j; ?>" id="TypeOfAsst<?php echo $j; ?>" class="All_100" disabled>
<option value="">select</option>
<?php $sqlNA=mysql_query("select * from hrm_assest_name where CompanyId=".$CompanyId." AND AssestStatus='A' order by AssestName ASC", $con); while($resNA=mysql_fetch_assoc($sqlNA)) {?>
<option value="<?php echo $resNA['AssestName']; ?>"><?php echo $resNA['AssestName']; ?></option><?php } ?></select></td>
<td class="All_100" align="center"><input name="AsstID<?php echo $j; ?>" id="AsstID<?php echo $j; ?>" class="All_100" maxlength="50" readonly/></td>
<td class="All_100" align="center"><input name="ComName<?php echo $j; ?>" id="ComName<?php echo $j; ?>" class="All_100" maxlength="50" readonly/></td>
<td class="All_100" align="center"><input name="Model<?php echo $j; ?>" id="Model<?php echo $j; ?>" class="All_100" maxlength="50" readonly/></td>
<td class="All_100" align="center"><input name="SrNo<?php echo $j; ?>" id="SrNo<?php echo $j; ?>" class="All_100" maxlength="50" readonly/></td>
<td class="All_100" align="center"><input name="PurDate<?php echo $j; ?>" id="PurDate<?php echo $j; ?>" class="All_70" readonly/>
                                   <button id="PurDate<?php echo $j; ?>Btn" class="CalenderButton"></button></td>
<td class="All_100" align="center"><input name="AllcatDate<?php echo $j; ?>" id="AllcatDate<?php echo $j; ?>" class="All_70" readonly/>
                                   <button id="AllcatDate<?php echo $j; ?>Btn" class="CalenderButton"></button></td>
<td class="All_100" align="center"><input name="DeAllcatDate<?php echo $j; ?>" id="DeAllcatDate<?php echo $j; ?>" class="All_70" readonly/>
                                   <button id="DeAllcatDate<?php echo $j; ?>Btn" class="CalenderButton"></button>
<script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("PurDate<?php echo $j; ?>Btn", "PurDate<?php echo $j; ?>", "%d-%m-%Y");  cal.manageFields("AllcatDate<?php echo $j; ?>Btn", "AllcatDate<?php echo $j; ?>", "%d-%m-%Y"); cal.manageFields("DeAllcatDate<?php echo $j; ?>Btn", "DeAllcatDate<?php echo $j; ?>", "%d-%m-%Y");</script></td>
<td class="All_150" align="center"><input name="Identy<?php echo $j; ?>" id="Identy<?php echo $j; ?>" class="All_150" maxlength="150" readonly/></td>
<td class="All_50">&nbsp;</td>
</tr></table></td>
</tr>
<?php } ?>
<tr>
  <td align="Right" class="fontButton" colspan="6"><table border="0" align="right" class="fontButton">
	<tr>	 
	  <td align="right" style="width:90px;"><input type="button" name="ChangeAsst" id="ChangeAsst" style="width:90px; display:block;" value="Edit" onClick="EditAsst()">
		<input type="submit" name="EditAsstE" id="EditAsstE" style="width:90px;display:none;" value="save"></td>
	  <td align="right" style="width:90px;"><input type="button" name="RefreshAsstE" id="RefreshAsstE" style="width:90px;" value="refresh" onClick="javascript:window.location='EmpAssest.php?ID=<?php echo $EMPID; ?>&Event=Edit'"/></td>
	</tr></table>
  </td>
</tr>
</table>
</td>
</tr>
</table>
</form>  
</td>
<?php //*********************************************************************************************************************************************************?>
</tr>
<?php } ?> 
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
<?php //**********************************************END*****END*****END*****END*****END***************************************************************?>	
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

