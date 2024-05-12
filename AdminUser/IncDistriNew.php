<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************************************************************************************************
if(isset($_POST['SaveEdit']))
{ 
 $SqlUpdate = mysql_query("UPDATE hrm_pms_increment_dis SET IncDistriFrom=".$_POST['IncF'].", IncDistriTo=".$_POST['IncT'].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' WHERE IncDisId=".$_POST['IncDisId'], $con) or die(mysql_error());  
 if($SqlUpdate){$msg="Data has been Updeted successfully...";}
}

if(isset($_POST['SaveMEdit']))
{ 
 $sqlw=mysql_query("select * from hrm_pms_increment_dislevel where CompanyId=".$CompanyId." AND YearId=".$_POST['yerm']." AND Rating=".$_POST['Ratm']." AND MgmtId=".$_POST['mgmtm'],$con); $roww=mysql_num_rows($sqlw);
 if($roww>0){ $SqlUw = mysql_query("UPDATE hrm_pms_increment_dislevel SET IncDistriFrom=".$_POST['IncFm'].", IncDistriTo=".$_POST['IncTm'].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where CompanyId=".$CompanyId." AND YearId=".$_POST['yerm']." AND Rating=".$_POST['Ratm']." AND MgmtId=".$_POST['mgmtm'], $con); }
 else { $SqlUw = mysql_query("insert into hrm_pms_increment_dislevel(YearId, Rating, IncDistriFrom, IncDistriTo, MgmtId, IncDisStatus, CompanyId, CreatedBy, CreatedDate) values(".$_POST['yerm'].", ".$_POST['Ratm'].", ".$_POST['IncFm'].", ".$_POST['IncTm'].", ".$_POST['mgmtm'].", 'A', ".$CompanyId.", ".$UserId.", '".date("Y-m-d")."')",$con); }  
 if($SqlUw)
 {
  $sDe=mysql_query("select d.DepartmentId from hrm_department d INNER JOIN hrm_employee_general g ON d.DepartmentId=g.DepartmentId INNER JOIN hrm_employee_pms p ON p.EmployeeID=g.EmployeeID where p.HOD_EmployeeID=".$_POST['mgmtm']." AND p.AssessmentYear=".$_POST['yerm']." group by d.DepartmentName ASC", $con); 
  while($RDe=mysql_fetch_array($sDe))
  {  
  
   $sql2w=mysql_query("select * from hrm_pms_increment_dislevel where CompanyId=".$CompanyId." AND YearId=".$_POST['yerm']." AND Rating=".$_POST['Ratm']." AND MgmtId=".$_POST['mgmtm']." AND DeptId=".$RDe['DepartmentId'],$con); $row2w=mysql_num_rows($sql2w);
 if($row2w>0){ $SqlU22w = mysql_query("UPDATE hrm_pms_increment_dislevel SET IncDistriFrom=".$_POST['IncFm'].", IncDistriTo=".$_POST['IncTm'].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where CompanyId=".$CompanyId." AND YearId=".$_POST['yerm']." AND Rating=".$_POST['Ratm']." AND MgmtId=".$_POST['mgmtm']." AND DeptId=".$RDe['DepartmentId'], $con); }
 else { $SqlU22w = mysql_query("insert into hrm_pms_increment_dislevel(YearId, Rating, IncDistriFrom, IncDistriTo, MgmtId, DeptId, IncDisStatus, CompanyId, CreatedBy, CreatedDate) values(".$_POST['yerm'].", ".$_POST['Ratm'].", ".$_POST['IncFm'].", ".$_POST['IncTm'].", ".$_POST['mgmtm'].", ".$RDe['DepartmentId'].", 'A', ".$CompanyId.", ".$UserId.", '".date("Y-m-d")."')",$con); }
  
  }
  if($SqlU22w){ $msg="Data has been Updeted successfully..."; }
 
 }
}


if(isset($_POST['SaveDEdit']))
{ 
 $sql2w=mysql_query("select * from hrm_pms_increment_dislevel where CompanyId=".$CompanyId." AND YearId=".$_POST['yerd']." AND Rating=".$_POST['Ratd']." AND MgmtId=".$_POST['mgmtd']." AND DeptId=".$_POST['deptd'],$con); $row2w=mysql_num_rows($sql2w);
 if($row2w>0){ $SqlU2w = mysql_query("UPDATE hrm_pms_increment_dislevel SET IncDistriFrom=".$_POST['IncFd'].", IncDistriTo=".$_POST['IncTd'].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where CompanyId=".$CompanyId." AND YearId=".$_POST['yerd']." AND Rating=".$_POST['Ratd']." AND MgmtId=".$_POST['mgmtd']." AND DeptId=".$_POST['deptd'], $con); }
 else { $SqlU2w = mysql_query("insert into hrm_pms_increment_dislevel(YearId, Rating, IncDistriFrom, IncDistriTo, MgmtId, DeptId, IncDisStatus, CompanyId, CreatedBy, CreatedDate) values(".$_POST['yerd'].", ".$_POST['Ratd'].", ".$_POST['IncFd'].", ".$_POST['IncTd'].", ".$_POST['mgmtd'].", ".$_POST['deptd'].", 'A', ".$CompanyId.", ".$UserId.", '".date("Y-m-d")."')",$con); }  if($SqlU2w){$msg="Data has been Updeted successfully...";}
}


if(isset($_POST['SaveHEdit']))
{ 
 $sql4w=mysql_query("select * from hrm_pms_increment_dislevel where CompanyId=".$CompanyId." AND YearId=".$_POST['yerh']." AND Rating=".$_POST['Rath']." AND MgmtId=".$_POST['mgmth']." AND DeptId=".$_POST['depth']." AND HodId=".$_POST['hodh'],$con); $row4w=mysql_num_rows($sql4w);
 if($row4w>0){ $SqlU4w = mysql_query("UPDATE hrm_pms_increment_dislevel SET IncDistriFrom=".$_POST['IncFh'].", IncDistriTo=".$_POST['IncTh'].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where CompanyId=".$CompanyId." AND YearId=".$_POST['yerh']." AND Rating=".$_POST['Rath']." AND MgmtId=".$_POST['mgmth']." AND DeptId=".$_POST['depth']." AND HodId=".$_POST['hodh'], $con); }
 else { $SqlU4w = mysql_query("insert into hrm_pms_increment_dislevel(YearId, Rating, IncDistriFrom, IncDistriTo, MgmtId, DeptId, HodId, IncDisStatus, CompanyId, CreatedBy, CreatedDate) values(".$_POST['yerh'].", ".$_POST['Rath'].", ".$_POST['IncFh'].", ".$_POST['IncTh'].", ".$_POST['mgmth'].", ".$_POST['depth'].", ".$_POST['hodh'].", 'A', ".$CompanyId.", ".$UserId.", '".date("Y-m-d")."')",$con); }  if($SqlU4w){$msg="Data has been Updeted successfully...";}
}


if(isset($_POST['SaveVEdit']))
{ 
 $sql5w=mysql_query("select * from hrm_pms_increment_dislevel where CompanyId=".$CompanyId." AND YearId=".$_POST['yerv']." AND Rating=".$_POST['Ratv']." AND MgmtId=".$_POST['mgmtv']." AND DeptId=".$_POST['deptv']." AND HodId=".$_POST['hodv']." AND VertId=".$_POST['vertv'],$con); $row5w=mysql_num_rows($sql5w);
 if($row5w>0){ $SqlU5w = mysql_query("UPDATE hrm_pms_increment_dislevel SET IncDistriFrom=".$_POST['IncFv'].", IncDistriTo=".$_POST['IncTv'].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where CompanyId=".$CompanyId." AND YearId=".$_POST['yerv']." AND Rating=".$_POST['Ratv']." AND MgmtId=".$_POST['mgmtv']." AND DeptId=".$_POST['deptv']." AND HodId=".$_POST['hodv']." AND VertId=".$_POST['vertv'], $con); }
 else { $SqlU5w = mysql_query("insert into hrm_pms_increment_dislevel(YearId, Rating, IncDistriFrom, IncDistriTo, MgmtId, DeptId, HodId, VertId, IncDisStatus, CompanyId, CreatedBy, CreatedDate) values(".$_POST['yerv'].", ".$_POST['Ratv'].", ".$_POST['IncFv'].", ".$_POST['IncTv'].", ".$_POST['mgmtv'].", ".$_POST['deptv'].", ".$_POST['hodv'].", ".$_POST['vertv'].", 'A', ".$CompanyId.", ".$UserId.", '".date("Y-m-d")."')",$con); }  if($SqlU5w){$msg="Data has been Updeted successfully...";}
}


if(isset($_POST['SaveREdit']))
{  
 $sql6w=mysql_query("select * from hrm_pms_increment_dislevel where CompanyId=".$CompanyId." AND YearId=".$_POST['yerr']." AND Rating=".$_POST['Ratr']." AND MgmtId=".$_POST['mgmtr']." AND DeptId=".$_POST['deptr']." AND HodId=".$_POST['hodr']." AND VertId=".$_POST['vertr']." AND RevId=".$_POST['revr'],$con); $row6w=mysql_num_rows($sql6w);
 if($row6w>0){ $SqlU6w = mysql_query("UPDATE hrm_pms_increment_dislevel SET IncDistriFrom=".$_POST['IncFr'].", IncDistriTo=".$_POST['IncTr'].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where CompanyId=".$CompanyId." AND YearId=".$_POST['yerr']." AND Rating=".$_POST['Ratr']." AND MgmtId=".$_POST['mgmtr']." AND DeptId=".$_POST['deptr']." AND HodId=".$_POST['hodr']." AND VertId=".$_POST['vertr']." AND RevId=".$_POST['revr'], $con); 
  }
 else { $SqlU6w = mysql_query("insert into hrm_pms_increment_dislevel(YearId, Rating, IncDistriFrom, IncDistriTo, MgmtId, DeptId, HodId, VertId, RevId, IncDisStatus, CompanyId, CreatedBy, CreatedDate) values(".$_POST['yerr'].", ".$_POST['Ratr'].", ".$_POST['IncFr'].", ".$_POST['IncTr'].", ".$_POST['mgmtr'].", ".$_POST['deptr'].", ".$_POST['hodr'].", ".$_POST['vertr'].", ".$_POST['revr'].", 'A', ".$CompanyId.", ".$UserId.", '".date("Y-m-d")."')",$con); }  if($SqlU6w){$msg="Data has been Updeted successfully...";}
}


if(isset($_POST['SaveAEdit']))
{  
 $sql6w=mysql_query("select * from hrm_pms_increment_dislevel where CompanyId=".$CompanyId." AND YearId=".$_POST['yera']." AND Rating=".$_POST['Rata']." AND MgmtId=".$_POST['mgmta']." AND DeptId=".$_POST['depta']." AND HodId=".$_POST['hoda']." AND VertId=".$_POST['verta']." AND RevId=".$_POST['reva']." AND AppId=".$_POST['appa'],$con); $row6w=mysql_num_rows($sql6w);
 if($row6w>0){ $SqlU6w = mysql_query("UPDATE hrm_pms_increment_dislevel SET IncDistriFrom=".$_POST['IncFa'].", IncDistriTo=".$_POST['IncTa'].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where CompanyId=".$CompanyId." AND YearId=".$_POST['yera']." AND Rating=".$_POST['Rata']." AND MgmtId=".$_POST['mgmta']." AND DeptId=".$_POST['depta']." AND HodId=".$_POST['hoda']." AND VertId=".$_POST['verta']." AND RevId=".$_POST['reva']." AND AppId=".$_POST['appa'], $con); 
  }
 else { $SqlU6w = mysql_query("insert into hrm_pms_increment_dislevel(YearId, Rating, IncDistriFrom, IncDistriTo, MgmtId, DeptId, HodId, VertId, RevId, AppId, IncDisStatus, CompanyId, CreatedBy, CreatedDate) values(".$_POST['yera'].", ".$_POST['Rata'].", ".$_POST['IncFa'].", ".$_POST['IncTa'].", ".$_POST['mgmta'].", ".$_POST['depta'].", ".$_POST['hoda'].", ".$_POST['verta'].", ".$_POST['reva'].", ".$_POST['appa'].", 'A', ".$CompanyId.", ".$UserId.", '".date("Y-m-d")."')",$con); }  if($SqlU6w){$msg="Data has been Updeted successfully...";}
}

?>

<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:11px; width:120px; height:18px;}
.bte { font-family:Times New Roman;font-size:12px;height:20px;text-align:center;width:100%;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.ht{font-family:Times New Roman;color:#FFFFFF;font-size:12px;text-align:center; }
.bt{font-family:Times New Roman;color:#000000;font-size:12px;text-align:center;background-color:#FFFFFF; }
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script>
function SelectYear(ey){ var m=document.getElementById("Mgmt").value; var d=document.getElementById("Dept").value; 
var h=document.getElementById("Hod").value; var v=document.getElementById("Vert").value; var r=document.getElementById("Rev").value; var a=document.getElementById("App").value; window.location='IncDistriNew.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&ey='+ey+"&m="+m+"&d="+d+"&h="+h+"&v="+v+"&r="+r+"&a="+a; }

function SelectFun(v,n)
{
 var ey=document.getElementById("YearID").value;
 if(n=='m'){ var m=v; var d=0; var h=0; var v=0; var r=0; var a=0; }
 else if(n=='d'){ var d=v; var m=document.getElementById("Mgmt").value; var h=0; var v=0; var r=0; var a=0; }
 else if(n=='h'){ var h=v; var m=document.getElementById("Mgmt").value; var d=document.getElementById("Dept").value; var v=0; var r=0; var a=0; }
 else if(n=='v'){ var v=v; var m=document.getElementById("Mgmt").value; var d=document.getElementById("Dept").value; var h=document.getElementById("Hod").value; var r=0; var a=0; }
 else if(n=='r'){ var r=v; var m=document.getElementById("Mgmt").value; var d=document.getElementById("Dept").value; var h=document.getElementById("Hod").value; var v=document.getElementById("Vert").value; var a=0; }
 else if(n=='a'){ var a=v; var m=document.getElementById("Mgmt").value; var d=document.getElementById("Dept").value; var h=document.getElementById("Hod").value; var v=document.getElementById("Vert").value; var r=document.getElementById("Rev").value; }
 
 window.location='IncDistriNew.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&ey='+ey+"&m="+m+"&d="+d+"&h="+h+"&v="+v+"&r="+r+"&a="+a;
  
}


function edit(e,value,ey) 
{ 
 var m=document.getElementById("Mgmt").value; var d=document.getElementById("Dept").value; 
 var h=document.getElementById("Hod").value; var v=document.getElementById("Vert").value; 
 var r=document.getElementById("Rev").value; var a=document.getElementById("App").value;
 var agree=confirm("Are you sure you want to edit this record?");
 if (agree){ var x = "IncDistriNew.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=edit"+e+"&eid"+e+"="+value+"&ey="+ey+"&m="+m+"&d="+d+"&h="+h+"&v="+v+"&r="+r+"&a="+a; window.location=x;} 
}

function validateEdit(formEdit){
  var IncDistriFrom = formEdit.IncDistriFrom.value; var Numfilter=/^[0-9. ]+$/;  var test_num = Numfilter.test(IncDistriFrom)
  if (IncDistriFrom.length === 0) { alert("please select IncDistri From field.");  return false; }
  if(test_num==false) { alert('Please Enter Only Number in the IncDistri From field');  return false; } 
  
  var IncDistriTo = formEdit.IncDistriTo.value; var Numfilter=/^[0-9. ]+$/;  var test_num1 = Numfilter.test(IncDistriTo)
  if (IncDistriTo.length === 0) { alert("please select IncDistri To field.");  return false; }
  if(test_num1==false) { alert('Please Enter Only Number in the IncDistri To field');  return false; } 
}

function FunmF(v,n){document.getElementById("IncTm"+n).value=document.getElementById("IncFm"+n).value;}
function FundF(v,n){document.getElementById("IncTd"+n).value=document.getElementById("IncFd"+n).value;}
function FunhF(v,n){document.getElementById("IncTh"+n).value=document.getElementById("IncFh"+n).value;}
function FunvF(v,n){document.getElementById("IncTv"+n).value=document.getElementById("IncFv"+n).value;}
function FunrF(v,n){document.getElementById("IncTr"+n).value=document.getElementById("IncFr"+n).value;}
function FunaF(v,n){document.getElementById("IncTa"+n).value=document.getElementById("IncFa"+n).value;}
                               
</SCRIPT> 
</head>
<body class="body">

<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //*********************************************************************************?>
<?php //******************START*****START*****START******START******START***************************?>
<?php //**************************************************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td align="right" class="heading">PMS - Increment Distribution (New)&nbsp;&nbsp;</td>
	  <?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['ey']."", $con); $rY=mysql_fetch_assoc($sY); $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>
	  <td style="font-size:14px;font-family:Times New Roman;border:hidden;text-align:center;">
	   <b>Year:</b>
	   <select style="font-size:12px; width:150px; background-color:#DDFFBB;" name="YearID" id="YearID" onChange="SelectYear(this.value)"><option value="<?php echo $_REQUEST['ey']; ?>" style="margin-left:0px;" selected><?php echo $PRD; if($_REQUEST['ey']>5){ echo ' - Y'; } ?></option><?php for($i=$YearId; $i>=1; $i--){	
	  $s2Y=mysql_query("select * from hrm_year where YearId=".$i,$con); $r2Y=mysql_fetch_assoc($s2Y);
	  $FD2=date("Y",strtotime($r2Y['FromDate'])); $TD2=date("Y",strtotime($r2Y['ToDate'])); ?>
<?php if($_REQUEST['ey']!=$i){?><option value="<?php echo $i; ?>"><?php echo $FD2.'-'.$TD2; if($i>5){ echo ' - Y'; } ?></option><?php }?>
<?php } ?></select>
	  </td>
	  
	  <td><input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/><input type="button" value="refresh" style="width:90px;" onClick="javascript:window.location='IncDistriNew.php?ey=<?php echo $_REQUEST['ey']; ?>&m=<?php echo $_REQUEST['m']; ?>&d=<?php echo $_REQUEST['d']; ?>&h=<?php echo $_REQUEST['h']; ?>&v=<?php echo $_REQUEST['v']; ?>&r=<?php echo $_REQUEST['r']; ?>&a=<?php echo $_REQUEST['a']; ?>'"/></td>
	  
	  
	  <td align="left">
	    <b><span id="Vtype" class="span">: -&nbsp;</span></b>
	  </td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(( $_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>
 

<td align="left" id="type" valign="top" style="display:block; width:100%">            
   <table border="0">   
<tr>

<?php //*************** Open Management Management Management Management ************************?>
 <td align="left" width="190" valign="top">
 <table border="1" width="190" cellpadding="2" cellspacing="1" style="background-color:#FFFFAA;">
  <tr>	     
    <td class="td1" colspan="6" style="font-size:14px;font-family:Times New Roman;border:hidden;text-align:center;" ><b>Mang<sup>n</sup>:</b>&nbsp;<select style="font-size:12px; width:190px;background-color:#DDFFBB;" name="Mgmt" id="Mgmt" onChange="SelectFun(this.value,'m')">
	<option value="0" <?php if($_REQUEST['m']==0){ echo 'selected';}?>>Select</option>
	<?php $SqlMgmt=mysql_query("SELECT HOD_EmployeeID from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID WHERE p.CompanyId=".$CompanyId." AND e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['ey']." AND HOD_EmployeeID>0 GROUP BY HOD_EmployeeID ORDER BY Fname ASC", $con); while($ResMgmt=mysql_fetch_array($SqlMgmt)) { 
	$sNh=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$ResMgmt['HOD_EmployeeID'],$con);
	$rNh=mysql_fetch_assoc($sNh); $EnameH=$rNh['Fname'].' '.$rNh['Sname'].' '.$rNh['Lname']; ?>
	 <option value="<?php echo $ResMgmt['HOD_EmployeeID'];?>" <?php if($_REQUEST['m']==$ResMgmt['HOD_EmployeeID']){ echo 'selected';}?>><?php echo strtoupper($EnameH); ?></option><?php } ?></select>
   </td>
  </tr>
  <tr bgcolor="#7a6189">
   <!--<td class="ht" style="width:30px;"><b>SNo</b></td>-->
   <td class="ht" style="width:50px;"><b>Rating</b></td>
   <td class="ht" style="width:50px;"><b>From<br>(%)</b></td>
   <td class="ht" style="width:50px;"><b>To<br>(%)</b></td>
  <!-- <td class="ht" style="width:80px;"><b>Updated<br>Date</b></td>-->
   <td class="ht" style="width:40px;"><b>Action</b></td>
  </tr>
<?php $sqlRat=mysql_query("select * from hrm_pms_increment_dis where IncDisStatus='A' AND YearId=".$_REQUEST['ey']." AND CompanyId=".$CompanyId." order by Rating DESC", $con); $SNo=1; while($rs=mysql_fetch_array($sqlRat)) { $sm=mysql_query("select IncDistriFrom,IncDistriTo,CreatedDate from hrm_pms_increment_dislevel where Rating=".$rs['Rating']." AND YearId=".$_REQUEST['ey']." AND DeptId=0 AND MgmtId=".$_REQUEST['m'], $con); 
$rowm=mysql_num_rows($sm); $rm=mysql_fetch_assoc($sm);

if(isset($_REQUEST['action']) && $_REQUEST['action']=="editm" && $_REQUEST['eidm']==$rs['IncDisId']){ 
?>

<form name="formmEdit" method="post" onSubmit="return validatemEdit(this)">	
  <tr bgcolor="#FFFFFF">
   <?php /*<td class="bt"><?php echo $SNo; ?></td>*/ ?>
   <td class="bt"><?php echo $rs['Rating']; ?></td>
   <td class="bt"><input name="IncFm" id="IncFm<?php echo $SNo; ?>" class="bte" maxlength="5" value="<?php echo $rm['IncDistriFrom'];?>" onChange="FunmF(this.value,<?php echo $SNo; ?>)" onKeyUp="FunmF(this.value,<?php echo $SNo;?>)"/></td>
   <td class="bt"><input name="IncTm" id="IncTm<?php echo $SNo; ?>" class="bte" maxlength="5" value="<?php echo $rm['IncDistriTo'];?>"/></td>
   <?php /*?><td class="bt"><?php if($row2>0){echo date("d-M-y",strtotime($r2['CreatedDate'])); } ?></td><?php */?>
   <td class="bt"><input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" />
<?php if($_SESSION['User_Permission']=='Edit'){ ?>&nbsp;<input type="submit" name="SaveMEdit"  value="" class="SaveButton">&nbsp;<input type="hidden" name="IncDisIdm" id="IncDisIdm" value="<?php echo $_REQUEST['eidm']; ?>"/><?php } ?>
    <input type="hidden" name="Ratm" value="<?php echo $rs['Rating']; ?>"/>
	<input type="hidden" name="yerm" value="<?php echo $_REQUEST['ey']; ?>"/>
    <input type="hidden" name="mgmtm" value="<?php echo $_REQUEST['m']; ?>"/>
	<input type="hidden" name="deptm" value="<?php echo $_REQUEST['d']; ?>"/>
	<input type="hidden" name="hodm" value="<?php echo $_REQUEST['h']; ?>"/>
	<input type="hidden" name="vertm" value="<?php echo $_REQUEST['v']; ?>"/>
	<input type="hidden" name="revm" value="<?php echo $_REQUEST['r']; ?>"/>
	<input type="hidden" name="appm" value="<?php echo $_REQUEST['a']; ?>"/>
	</td>
 </tr>
 </form>
 
<?php } else { ?>	 
  <tr>
   <?php /*<td class="bt"><?php echo $SNo; ?></td>*/ ?>
   <td class="bt"><?php echo $rs['Rating']; ?></td>
   <td class="bt"><?php if($rowm>0){ echo $rm['IncDistriFrom']; } ?></td>
   <td class="bt"><?php if($rowm>0){ echo $rm['IncDistriTo']; } ?></td>
   <?php /*?><td class="bt"><?php if($rowm>0){ echo date("d-M-y",strtotime($rm['CreatedDate'])); } ?></b></td><?php */?>
   <td class="bt"><?php if($_SESSION['User_Permission']=='Edit' AND $_REQUEST['m']>0){ ?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit('m',<?php echo $rs['IncDisId'].', '.$_REQUEST['ey']; ?>)"></a>
<?php } ?></td>
 </tr>
<?php } $SNo++;} ?>
 </table>
</td>
<?php //**************************** Close Management ****************************?>

<td>&nbsp;</td>

<?php //*************** Open Department Department Department Department Department ************************?>
 <td align="left" width="190" valign="top">
 <table border="1" width="190" cellpadding="2" cellspacing="1" style="background-color:#FFFFAA;">
  <tr>	     
    <td class="td1" colspan="6" style="font-size:14px;font-family:Times New Roman;border:hidden;text-align:center;" ><b>Department:</b>&nbsp;<select style="font-size:12px; width:190px;background-color:#DDFFBB;" name="Dept" id="Dept" onChange="SelectFun(this.value,'d')" <?php if($_REQUEST['m']==0){echo 'disabled';} ?>>
	<option value="0" <?php if($_REQUEST['d']==0){ echo 'selected';}?>>Select</option>
	<?php $SqlDe=mysql_query("select d.DepartmentId,DepartmentName from hrm_department d INNER JOIN hrm_employee_general g ON d.DepartmentId=g.DepartmentId INNER JOIN hrm_employee_pms p ON p.EmployeeID=g.EmployeeID where p.HOD_EmployeeID=".$_REQUEST['m']." AND p.AssessmentYear=".$_REQUEST['ey']." group by d.DepartmentName ASC", $con); while($ResDe=mysql_fetch_array($SqlDe)) { ?><option value="<?php echo $ResDe['DepartmentId']; ?>" <?php if($_REQUEST['d']==$ResDe['DepartmentId']){ echo 'selected';}?>><?php echo strtoupper($ResDe['DepartmentName']);?></option><?php } ?></select>
   </td>
  </tr>
  <tr bgcolor="#7a6189">
   <!--<td class="ht" style="width:30px;"><b>SNo</b></td>-->
   <td class="ht" style="width:50px;"><b>Rating</b></td>
   <td class="ht" style="width:50px;"><b>From<br>(%)</b></td>
   <td class="ht" style="width:50px;"><b>To<br>(%)</b></td>
   <!--<td class="ht" style="width:80px;"><b>Updated<br>Date</b></td>-->
   <td class="ht" style="width:40px;"><b>Action</b></td>
  </tr>
<?php $sqlRat=mysql_query("select * from hrm_pms_increment_dis where IncDisStatus='A' AND YearId=".$_REQUEST['ey']." AND CompanyId=".$CompanyId." order by Rating DESC", $con); $SNo=1; while($rs=mysql_fetch_array($sqlRat)) { 
if($_REQUEST['d']>0){$sd=mysql_query("select IncDistriFrom,IncDistriTo,CreatedDate from hrm_pms_increment_dislevel where Rating=".$rs['Rating']." AND YearId=".$_REQUEST['ey']." AND MgmtId=".$_REQUEST['m']." AND HodId=0 AND VertId=0 AND RevId=0 AND AppId=0 AND DeptId=".$_REQUEST['d'], $con); 
$rowd=mysql_num_rows($sd); $rd=mysql_fetch_assoc($sd); }
if(isset($_REQUEST['action']) && $_REQUEST['action']=="editd" && $_REQUEST['eidd']==$rs['IncDisId']){ 
?>

<form name="formdEdit" method="post" onSubmit="return validatedEdit(this)">	
  <tr bgcolor="#FFFFFF">
   <?php /*<td class="bt"><?php echo $SNo; ?></td>*/ ?>
   <td class="bt"><?php echo $rs['Rating']; ?></td>
   <td class="bt"><input name="IncFd" id="IncFd<?php echo $SNo; ?>" class="bte" maxlength="5" value="<?php echo $rd['IncDistriFrom'];?>" onChange="FundF(this.value,<?php echo $SNo; ?>)" onKeyUp="FundF(this.value,<?php echo $SNo; ?>)"/></td>
   <td class="bt"><input name="IncTd" id="IncTd<?php echo $SNo; ?>" class="bte" maxlength="5" value="<?php echo $rd['IncDistriTo'];?>"/></td>
   <?php /*?><td class="bt"><?php if($rowd>0){ echo date("d-M-y",strtotime($rd['CreatedDate'])); } ?></td><?php */?>
   <td class="bt"><input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" />
<?php if($_SESSION['User_Permission']=='Edit'){ ?><input type="submit" name="SaveDEdit"  value="" class="SaveButton"><input type="hidden" name="IncDisIdd" id="IncDisIdd" value="<?php echo $_REQUEST['eidd']; ?>"/><?php } ?>
    <input type="hidden" name="Ratd" value="<?php echo $rs['Rating']; ?>"/>
	<input type="hidden" name="yerd" value="<?php echo $_REQUEST['ey']; ?>"/>
    <input type="hidden" name="mgmtd" value="<?php echo $_REQUEST['m']; ?>"/>
	<input type="hidden" name="deptd" value="<?php echo $_REQUEST['d']; ?>"/>
	<input type="hidden" name="hodd" value="<?php echo $_REQUEST['h']; ?>"/>
	<input type="hidden" name="vertd" value="<?php echo $_REQUEST['v']; ?>"/>
	<input type="hidden" name="revd" value="<?php echo $_REQUEST['r']; ?>"/>
	<input type="hidden" name="appd" value="<?php echo $_REQUEST['a']; ?>"/>
	</td>
 </tr>
 </form>
 
<?php } else { ?>	 
  <tr>
   <?php /*<td class="bt"><?php echo $SNo; ?></td> */?>
   <td class="bt"><?php echo $rs['Rating']; ?></td>
   <td class="bt"><?php if($rowd>0){ echo $rd['IncDistriFrom']; } ?></td>
   <td class="bt"><?php if($rowd>0){ echo $rd['IncDistriTo']; } ?></td>
   <?php /*?><td class="bt"><?php if($rowd>0){ echo date("d-M-y",strtotime($rd['CreatedDate'])); } ?></b></td><?php */?>
   <td class="bt"><?php if($_SESSION['User_Permission']=='Edit' AND $_REQUEST['d']>0){ ?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit('d',<?php echo $rs['IncDisId'].', '.$_REQUEST['ey']; ?>)"></a>
<?php } ?></td>
 </tr>
<?php } $SNo++;} ?>
 </table>
</td>
<?php //**************************** Close Department ****************************?>

<td>&nbsp;</td>

<?php //*************** Open HOD HOD HOD HOD HOD HOD HOD HOD HOD HOD ************************?>
 <td align="left" width="190" valign="top">
 <table border="1" width="190" cellpadding="2" cellspacing="1" style="background-color:#FFFFAA;">
  <tr>	     
    <td class="td1" colspan="6" style="font-size:14px;font-family:Times New Roman;border:hidden;text-align:center;" ><b>HOD:</b>&nbsp;<select style="font-size:12px; width:190px;background-color:#DDFFBB;" name="Hod" id="Hod" onChange="SelectFun(this.value,'h')" <?php if($_REQUEST['m']==0 OR $_REQUEST['d']==0){echo 'disabled';} ?>>
	<option value="0" <?php if($_REQUEST['h']==0){ echo 'selected';}?>>Select</option>
	<?php $SqlH2=mysql_query("select Rev2_EmployeeID from hrm_employee e INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['ey']." AND Rev2_EmployeeID>0 group by p.Rev2_EmployeeID order by Fname ASC", $con); while($ResH2=mysql_fetch_array($SqlH2)) { $sNh2=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$ResH2['Rev2_EmployeeID'],$con); $rNh2=mysql_fetch_assoc($sNh2); $EnameH2=$rNh2['Fname'].' '.$rNh2['Sname'].' '.$rNh2['Lname']; ?><option value="<?php echo $ResH2['Rev2_EmployeeID'];?>" <?php if($_REQUEST['h']==$ResH2['Rev2_EmployeeID']){ echo 'selected';}?>><?php echo strtoupper($EnameH2);?></option><?php } ?></select>
   </td>
  </tr>
  <tr bgcolor="#7a6189">
   <!--<td class="ht" style="width:30px;"><b>SNo</b></td>-->
   <td class="ht" style="width:50px;"><b>Rating</b></td>
   <td class="ht" style="width:50px;"><b>From<br>(%)</b></td>
   <td class="ht" style="width:50px;"><b>To<br>(%)</b></td>
   <!--<td class="ht" style="width:80px;"><b>Updated<br>Date</b></td>-->
   <td class="ht" style="width:40px;"><b>Action</b></td>
  </tr>
<?php $sqlRat=mysql_query("select * from hrm_pms_increment_dis where IncDisStatus='A' AND YearId=".$_REQUEST['ey']." AND CompanyId=".$CompanyId." order by Rating DESC", $con); $SNo=1; while($rs=mysql_fetch_array($sqlRat)) { 
if($_REQUEST['h']>0){ $sh=mysql_query("select IncDistriFrom,IncDistriTo,CreatedDate from hrm_pms_increment_dislevel where Rating=".$rs['Rating']." AND YearId=".$_REQUEST['ey']." AND MgmtId=".$_REQUEST['m']." AND DeptId=".$_REQUEST['d']." AND VertId=0 AND RevId=0 AND AppId=0 AND HodId=".$_REQUEST['h'], $con); $rowh=mysql_num_rows($sh); $rh=mysql_fetch_assoc($sh); }
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edith" && $_REQUEST['eidh']==$rs['IncDisId']){ 
?>

<form name="formhEdit" method="post" onSubmit="return validatehEdit(this)">	
  <tr bgcolor="#FFFFFF">
   <?php /*<td class="bt"><?php echo $SNo; ?></td>*/ ?>
   <td class="bt"><?php echo $rs['Rating']; ?></td>
   <td class="bt"><input name="IncFh" id="IncFh<?php echo $SNo; ?>" class="bte" maxlength="5" value="<?php echo $rh['IncDistriFrom'];?>" onChange="FunhF(this.value,<?php echo $SNo; ?>)" onKeyUp="FunhF(this.value,<?php echo $SNo; ?>)"/></td>
   <td class="bt"><input name="IncTh" id="IncTh<?php echo $SNo; ?>" class="bte" maxlength="5" value="<?php echo $rh['IncDistriTo'];?>"/></td>
   <?php /*?><td class="bt"><?php if($rowh>0){ echo date("d-M-y",strtotime($rh['CreatedDate'])); } ?></td><?php */?>
   <td class="bt"><input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" />
<?php if($_SESSION['User_Permission']=='Edit'){ ?><input type="submit" name="SaveHEdit"  value="" class="SaveButton"><input type="hidden" name="IncDisIdh" id="IncDisIdh" value="<?php echo $_REQUEST['eidh']; ?>"/><?php } ?>
     <input type="hidden" name="Rath" value="<?php echo $rs['Rating']; ?>"/>
	 <input type="hidden" name="yerh" value="<?php echo $_REQUEST['ey']; ?>"/>
     <input type="hidden" name="mgmth" value="<?php echo $_REQUEST['m']; ?>"/>
	 <input type="hidden" name="depth" value="<?php echo $_REQUEST['d']; ?>"/>
	 <input type="hidden" name="hodh" value="<?php echo $_REQUEST['h']; ?>"/>
	 <input type="hidden" name="verth" value="<?php echo $_REQUEST['v']; ?>"/>
	 <input type="hidden" name="revh" value="<?php echo $_REQUEST['r']; ?>"/>
	 <input type="hidden" name="apph" value="<?php echo $_REQUEST['a']; ?>"/>
	 </td>
 </tr>
 </form>
 
<?php } else { ?>	 
  <tr>
   <?php /*<td class="bt"><?php echo $SNo; ?></td> */?>
   <td class="bt"><?php echo $rs['Rating']; ?></td>
   <td class="bt"><?php if($rowh>0){ echo $rh['IncDistriFrom']; } ?></td>
   <td class="bt"><?php if($rowh>0){ echo $rh['IncDistriTo']; } ?></td>
   <?php /*?><td class="bt"><?php if($rowh>0){ echo date("d-M-y",strtotime($rh['CreatedDate'])); } ?></b></td><?php */?>
   <td class="bt"><?php if($_SESSION['User_Permission']=='Edit' AND $_REQUEST['h']>0){ ?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit('h',<?php echo $rs['IncDisId'].', '.$_REQUEST['ey']; ?>)"></a>
<?php } ?></td>
 </tr>
<?php } $SNo++;} ?>
 </table>
</td>
<?php //**************************** Close HOD HOD HOD ****************************?>

<td>&nbsp;</td>


<?php //*************** Open Verticals Verticals Verticals Verticals ************************?>
 <td align="left" width="190" valign="top">
 <table border="1" width="190" cellpadding="2" cellspacing="1" style="background-color:#FFFFAA;">
  <tr>	     
    <td class="td1" colspan="6" style="font-size:14px;font-family:Times New Roman;border:hidden;text-align:center;" ><b>Verticals:</b>&nbsp;<select style="font-size:12px; width:190px;background-color:#DDFFBB;" name="Vert" id="Vert" onChange="SelectFun(this.value,'v')" <?php if($_REQUEST['m']==0 OR $_REQUEST['d']==0){echo 'disabled';} ?>>
	<option value="0" <?php if($_REQUEST['v']==0){ echo 'selected';}?>>Select</option>
	<?php $Sver=mysql_query("select VerticalId,VerticalName from hrm_department_vertical where DeptId=".$_REQUEST['d']." AND ComId=".$CompanyId." order by VerticalName ASC",$con); while($Rver=mysql_fetch_assoc($Sver)){?><option value="<?=$Rver['VerticalId'];?>" <?php if($_REQUEST['v']==$Rver['VerticalId']){ echo 'selected';}?>><?=strtoupper($Rver['VerticalName']);?></option>
	<?php } ?></select>
   </td>
  </tr>
  <tr bgcolor="#7a6189">
   <!--<td class="ht" style="width:30px;"><b>SNo</b></td>-->
   <td class="ht" style="width:50px;"><b>Rating</b></td>
   <td class="ht" style="width:50px;"><b>From<br>(%)</b></td>
   <td class="ht" style="width:50px;"><b>To<br>(%)</b></td>
   <!--<td class="ht" style="width:80px;"><b>Updated<br>Date</b></td>-->
   <td class="ht" style="width:40px;"><b>Action</b></td>
  </tr>
<?php if($_REQUEST['h']>0){ $qryh="HodId=".$_REQUEST['h']; }else{ $qryh="HodId=0";  }
$sqlRat=mysql_query("select * from hrm_pms_increment_dis where IncDisStatus='A' AND YearId=".$_REQUEST['ey']." AND CompanyId=".$CompanyId." order by Rating DESC",$con); $SNo=1; while($rs=mysql_fetch_array($sqlRat)) { 
if($_REQUEST['v']>0){ $sv=mysql_query("select IncDistriFrom,IncDistriTo,CreatedDate from hrm_pms_increment_dislevel where Rating=".$rs['Rating']." AND YearId=".$_REQUEST['ey']." AND MgmtId=".$_REQUEST['m']." AND DeptId=".$_REQUEST['d']." AND ".$qryh." AND RevId=0 AND AppId=0 AND VertId=".$_REQUEST['v'], $con); $rowv=mysql_num_rows($sv); $rv=mysql_fetch_assoc($sv); }
if(isset($_REQUEST['action']) && $_REQUEST['action']=="editv" && $_REQUEST['eidv']==$rs['IncDisId']){ 
?>

<form name="formvEdit" method="post" onSubmit="return validatevEdit(this)">	
  <tr bgcolor="#FFFFFF">
   <?php /*<td class="bt"><?php echo $SNo; ?></td>*/ ?>
   <td class="bt"><?php echo $rs['Rating']; ?></td>
   <td class="bt"><input name="IncFv" id="IncFv<?php echo $SNo;?>" class="bte" maxlength="5" value="<?php echo $rv['IncDistriFrom'];?>" onChange="FunvF(this.value,<?php echo $SNo;?>)" onKeyUp="FunvF(this.value,<?php echo $SNo;?>)"/></td>
   <td class="bt"><input name="IncTv" id="IncTv<?php echo $SNo;?>" class="bte" maxlength="5" value="<?php echo $rv['IncDistriTo'];?>"/></td>
   <?php /*?><td class="bt"><?php if($rowv>0){ echo date("d-M-y",strtotime($rv['CreatedDate'])); } ?></td><?php */?>
   <td class="bt"><input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" />
<?php if($_SESSION['User_Permission']=='Edit'){ ?><input type="submit" name="SaveVEdit"  value="" class="SaveButton"><input type="hidden" name="IncDisIdv" id="IncDisIdv" value="<?php echo $_REQUEST['eidv']; ?>"/><?php } ?>
     <input type="hidden" name="Ratv" value="<?php echo $rs['Rating']; ?>"/>
	 <input type="hidden" name="yerv" value="<?php echo $_REQUEST['ey']; ?>"/>
     <input type="hidden" name="mgmtv" value="<?php echo $_REQUEST['m']; ?>"/>
	 <input type="hidden" name="deptv" value="<?php echo $_REQUEST['d']; ?>"/>
	 <input type="hidden" name="hodv" value="<?php echo $_REQUEST['h']; ?>"/>
	 <input type="hidden" name="vertv" value="<?php echo $_REQUEST['v']; ?>"/>
	 <input type="hidden" name="revv" value="<?php echo $_REQUEST['r']; ?>"/>
	 <input type="hidden" name="appv" value="<?php echo $_REQUEST['a']; ?>"/>
	 </td>
 </tr>
 </form>
 
<?php } else { ?>	 
  <tr>
   <?php /*<td class="bt"><?php echo $SNo; ?></td> */?>
   <td class="bt"><?php echo $rs['Rating']; ?></td>
   <td class="bt"><?php if($rowv>0){ echo $rv['IncDistriFrom']; } ?></td>
   <td class="bt"><?php if($rowv>0){ echo $rv['IncDistriTo']; } ?></td>
   <?php /*?><td class="bt"><?php if($rowv>0){ echo date("d-M-y",strtotime($rv['CreatedDate'])); } ?></b></td><?php */?>
   <td class="bt"><?php if($_SESSION['User_Permission']=='Edit' AND $_REQUEST['v']>0){ ?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit('v',<?php echo $rs['IncDisId'].', '.$_REQUEST['ey']; ?>)"></a>
<?php } ?></td>
 </tr>
<?php } $SNo++;} ?>
 </table>
</td>
<?php //**************************** Close Verticals Verticals Verticals Verticals ****************************?>




<?php //*************** Open Reviewer Reviewer Reviewer Reviewer Reviewer ************************?>
 <td align="left" width="190" valign="top">
 <table border="1" width="190" cellpadding="2" cellspacing="1" style="background-color:#FFFFAA;">
  <tr>	     
    <td class="td1" colspan="6" style="font-size:14px;font-family:Times New Roman;border:hidden;text-align:center;" ><b>Reviewer:</b>&nbsp;<select style="font-size:12px; width:200px;background-color:#DDFFBB;" name="Rev" id="Rev" onChange="SelectFun(this.value,'r')" <?php if($_REQUEST['m']==0 OR $_REQUEST['d']==0){echo 'disabled';} ?>>
	<option value="0" <?php if($_REQUEST['r']==0){ echo 'selected';}?>>Select</option>
	<?php if($_REQUEST['h']>0){$qryt="p.Rev2_EmployeeID=".$_REQUEST['h'];}else{$qryt="1=1";}
	$SqlRe=mysql_query("select Reviewer_EmployeeID from hrm_employee e INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND ".$qryt." AND e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['ey']." AND Reviewer_EmployeeID>0 group by p.Reviewer_EmployeeID order by Fname ASC", $con); while($ResRe=mysql_fetch_array($SqlRe)){ $sNh3=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$ResRe['Reviewer_EmployeeID'],$con); $rNh3=mysql_fetch_assoc($sNh3); $EnameRe=$rNh3['Fname'].' '.$rNh3['Sname'].' '.$rNh3['Lname'];  ?><option value="<?php echo $ResRe['Reviewer_EmployeeID']; ?>" <?php if($_REQUEST['r']==$ResRe['Reviewer_EmployeeID']){ echo 'selected';}?>><?php echo strtoupper($EnameRe);?></option><?php } ?></select>
   </td>
   
  </tr>
  <tr bgcolor="#7a6189">
   <!--<td class="ht" style="width:30px;"><b>SNo</b></td>-->
   <td class="ht" style="width:50px;"><b>Rating</b></td>
   <td class="ht" style="width:50px;"><b>From<br>(%)</b></td>
   <td class="ht" style="width:50px;"><b>To<br>(%)</b></td>
   <!--<td class="ht" style="width:80px;"><b>Updated<br>Date</b></td>-->
   <td class="ht" style="width:40px;"><b>Action</b></td>
  </tr>
<?php if($_REQUEST['h']>0){ $qryh="HodId=".$_REQUEST['h']; }else{ $qryh="HodId=0";  }
      if($_REQUEST['v']>0){ $qryv="VertId=".$_REQUEST['v']; }else{ $qryv="VertId=0";  }
$sqlRat=mysql_query("select * from hrm_pms_increment_dis where IncDisStatus='A' AND YearId=".$_REQUEST['ey']." AND CompanyId=".$CompanyId." order by Rating DESC", $con); $SNo=1; while($rs=mysql_fetch_array($sqlRat)) { 
if($_REQUEST['r']>0){ $sr=mysql_query("select IncDistriFrom,IncDistriTo,CreatedDate from hrm_pms_increment_dislevel where Rating=".$rs['Rating']." AND YearId=".$_REQUEST['ey']." AND MgmtId=".$_REQUEST['m']." AND DeptId=".$_REQUEST['d']." AND ".$qryh." AND AppId=0 AND ".$qryv." AND RevId=".$_REQUEST['r'], $con); $rowr=mysql_num_rows($sr); $rr=mysql_fetch_assoc($sr); }
if(isset($_REQUEST['action']) && $_REQUEST['action']=="editr" && $_REQUEST['eidr']==$rs['IncDisId']){ 
?>

<form name="formrEdit" method="post" onSubmit="return validaterEdit(this)">	
  <tr bgcolor="#FFFFFF">
   <?php /*<td class="bt"><?php echo $SNo; ?></td>*/ ?>
   <td class="bt"><?php echo $rs['Rating']; ?></td>
   <td class="bt"><input name="IncFr" id="IncFr<?php echo $SNo; ?>" class="bte" maxlength="5" value="<?php echo $rr['IncDistriFrom'];?>" onChange="FunrF(this.value,<?php echo $SNo; ?>)" onKeyUp="FunrF(this.value,<?php echo $SNo; ?>)"/></td>
   <td class="bt"><input name="IncTr" id="IncTr<?php echo $SNo; ?>" class="bte" maxlength="5" value="<?php echo $rr['IncDistriTo'];?>"/></td>
   <?php /*?><td class="bt"><?php if($rowr>0){ echo date("d-M-y",strtotime($rr['CreatedDate'])); } ?></td><?php */?>
   <td class="bt"><input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" />
<?php if($_SESSION['User_Permission']=='Edit'){ ?><input type="submit" name="SaveREdit"  value="" class="SaveButton"><input type="hidden" name="IncDisIdr" id="IncDisIdr" value="<?php echo $_REQUEST['eidr']; ?>"/><?php } ?>
     <input type="hidden" name="Ratr" value="<?php echo $rs['Rating']; ?>"/>
	 <input type="hidden" name="yerr" value="<?php echo $_REQUEST['ey']; ?>"/>
     <input type="hidden" name="mgmtr" value="<?php echo $_REQUEST['m']; ?>"/>
	 <input type="hidden" name="deptr" value="<?php echo $_REQUEST['d']; ?>"/>
	 <input type="hidden" name="hodr" value="<?php echo $_REQUEST['h']; ?>"/>
	 <input type="hidden" name="vertr" value="<?php echo $_REQUEST['v']; ?>"/>
	 <input type="hidden" name="revr" value="<?php echo $_REQUEST['r']; ?>"/>
	 <input type="hidden" name="appr" value="<?php echo $_REQUEST['a']; ?>"/>
	 </td>
 </tr>
 </form>
 
<?php } else { ?>	 
  <tr>
   <?php /*<td class="bt"><?php echo $SNo; ?></td> */?>
   <td class="bt"><?php echo $rs['Rating']; ?></td>
   <td class="bt"><?php if($rowr>0){ echo $rr['IncDistriFrom']; } ?></td>
   <td class="bt"><?php if($rowr>0){ echo $rr['IncDistriTo']; } ?></td>
   <?php /*?><td class="bt"><?php if($rowr>0){ echo date("d-M-y",strtotime($rr['CreatedDate'])); } ?></b></td><?php */?>
   <td class="bt"><?php if($_SESSION['User_Permission']=='Edit' AND $_REQUEST['r']>0){ ?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit('r',<?php echo $rs['IncDisId'].', '.$_REQUEST['ey']; ?>)"></a>
<?php } ?></td>
 </tr>
<?php } $SNo++;} ?>
 </table>
</td>
<?php //**************************** Close Reviewer ****************************?>

<td>&nbsp;</td>


<?php //*************** Open Appraiser Appraiser Appraiser Appraiser ************************?>
 <td align="left" width="190" valign="top">
 <table border="1" width="190" cellpadding="2" cellspacing="1" style="background-color:#FFFFAA;">
  <tr>	     
    <td class="td1" colspan="6" style="font-size:14px;font-family:Times New Roman;border:hidden;text-align:center;" ><b>Appraiser:</b>&nbsp;<select style="font-size:12px; width:200px;background-color:#DDFFBB;" name="App" id="App" onChange="SelectFun(this.value,'a')" <?php if($_REQUEST['m']==0 OR $_REQUEST['d']==0){echo 'disabled';} ?>>
	<option value="0" <?php if($_REQUEST['a']==0){ echo 'selected';}?>>Select</option>
	<?php if($_REQUEST['r']>0){$qryt="p.Reviewer_EmployeeID=".$_REQUEST['r'];}else{$qryt="1=1";}
	$SqlAe=mysql_query("select Appraiser_EmployeeID from hrm_employee e INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND ".$qryt." AND e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['ey']." AND Appraiser_EmployeeID>0 group by p.Appraiser_EmployeeID order by Fname ASC", $con); while($ResAe=mysql_fetch_array($SqlAe)){ $sNh4=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$ResAe['Appraiser_EmployeeID'],$con); $rNh4=mysql_fetch_assoc($sNh4); $EnameAe=$rNh4['Fname'].' '.$rNh4['Sname'].' '.$rNh4['Lname']; ?><option value="<?php echo $ResAe['Appraiser_EmployeeID'];?>" <?php if($_REQUEST['a']==$ResAe['Appraiser_EmployeeID']){ echo 'selected';}?>><?php echo strtoupper($EnameAe);?></option><?php } ?></select>
   </td>
   
  </tr>
  <tr bgcolor="#7a6189">
   <!--<td class="ht" style="width:30px;"><b>SNo</b></td>-->
   <td class="ht" style="width:50px;"><b>Rating</b></td>
   <td class="ht" style="width:50px;"><b>From<br>(%)</b></td>
   <td class="ht" style="width:50px;"><b>To<br>(%)</b></td>
   <!--<td class="ht" style="width:80px;"><b>Updated<br>Date</b></td>-->
   <td class="ht" style="width:40px;"><b>Action</b></td>
  </tr>
<?php if($_REQUEST['h']>0){ $qryh="HodId=".$_REQUEST['h']; }else{ $qryh="HodId=0";  }
      if($_REQUEST['v']>0){ $qryv="VertId=".$_REQUEST['v']; }else{ $qryv="VertId=0";  }
	  if($_REQUEST['r']>0){ $qryr="RevId=".$_REQUEST['r']; }else{ $qryr="RevId=0";  }

$sqlRat=mysql_query("select * from hrm_pms_increment_dis where IncDisStatus='A' AND YearId=".$_REQUEST['ey']." AND CompanyId=".$CompanyId." order by Rating DESC", $con); $SNo=1; while($rs=mysql_fetch_array($sqlRat)) { 
if($_REQUEST['a']>0){ $sa=mysql_query("select IncDistriFrom,IncDistriTo,CreatedDate from hrm_pms_increment_dislevel where Rating=".$rs['Rating']." AND YearId=".$_REQUEST['ey']." AND MgmtId=".$_REQUEST['m']." AND DeptId=".$_REQUEST['d']." AND ".$qryh." AND ".$qryv." AND ".$qryr." AND AppId=".$_REQUEST['a'], $con); 
$rowa=mysql_num_rows($sa); $ra=mysql_fetch_assoc($sa); }
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edita" && $_REQUEST['eida']==$rs['IncDisId']){ 
?>

<form name="formaEdit" method="post" onSubmit="return validateaEdit(this)">	
  <tr bgcolor="#FFFFFF">
   <?php /*<td class="bt"><?php echo $SNo; ?></td>*/ ?>
   <td class="bt"><?php echo $rs['Rating']; ?></td>
   <td class="bt"><input name="IncFa" id="IncFa<?php echo $SNo; ?>" class="bte" maxlength="5" value="<?php echo $ra['IncDistriFrom'];?>" onChange="FunaF(this.value,<?php echo $SNo; ?>)" onKeyUp="FunaF(this.value,<?php echo $SNo; ?>)"/></td>
   <td class="bt"><input name="IncTa" id="IncTa<?php echo $SNo; ?>" class="bte" maxlength="5" value="<?php echo $ra['IncDistriTo'];?>"/></td>
   <?php /*?><td class="bt"><?php if($rowa>0){ echo date("d-M-y",strtotime($ra['CreatedDate'])); } ?></td><?php */?>
   <td class="bt"><input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" />
<?php if($_SESSION['User_Permission']=='Edit'){ ?><input type="submit" name="SaveAEdit"  value="" class="SaveButton"><input type="hidden" name="IncDisIda" id="IncDisIda" value="<?php echo $_REQUEST['eida']; ?>"/><?php } ?>
     <input type="hidden" name="Rata" value="<?php echo $rs['Rating']; ?>"/>
	 <input type="hidden" name="yera" value="<?php echo $_REQUEST['ey']; ?>"/>
     <input type="hidden" name="mgmta" value="<?php echo $_REQUEST['m']; ?>"/>
	 <input type="hidden" name="depta" value="<?php echo $_REQUEST['d']; ?>"/>
	 <input type="hidden" name="hoda" value="<?php echo $_REQUEST['h']; ?>"/>
	 <input type="hidden" name="verta" value="<?php echo $_REQUEST['v']; ?>"/>
	 <input type="hidden" name="reva" value="<?php echo $_REQUEST['r']; ?>"/>
	 <input type="hidden" name="appa" value="<?php echo $_REQUEST['a']; ?>"/>
	 </td>
 </tr>
 </form>
 
<?php } else { ?>	 
  <tr>
   <?php /*<td class="bt"><?php echo $SNo; ?></td> */?>
   <td class="bt"><?php echo $rs['Rating']; ?></td>
   <td class="bt"><?php if($rowa>0){ echo $ra['IncDistriFrom']; } ?></td>
   <td class="bt"><?php if($rowa>0){ echo $ra['IncDistriTo']; } ?></td>
   <?php /*?><td class="bt"><?php if($rowa>0){ echo date("d-M-y",strtotime($ra['CreatedDate'])); } ?></b></td><?php */?>
   <td class="bt"><?php if($_SESSION['User_Permission']=='Edit' AND $_REQUEST['a']>0){ ?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit('a',<?php echo $rs['IncDisId'].', '.$_REQUEST['ey']; ?>)"></a>
<?php } ?></td>
 </tr>
<?php } $SNo++;} ?>
 </table>
</td>
<?php //**************************** Close Appraiser Appraiser Appraiser Appraiser ****************************?>


</tr>
	  
  </table>  
</td>
    

 </tr>
<?php } ?> 
</table>
		
<?php //*********************************************************************************************?>
<?php //************************END*****END*****END******END******END***********************?>
<?php //*************************************************************************************?>
		
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
