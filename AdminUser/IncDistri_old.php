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

if(isset($_POST['Save2Edit']))
{ 
 $sqlw=mysql_query("select * from hrm_pms_increment_dishod where CompanyId=".$CompanyId." AND YearId=".$_POST['yer2']." AND Rating=".$_POST['Rat2']." AND HodId=".$_POST['hod2'],$con); $roww=mysql_num_rows($sqlw);
 if($roww>0){ $SqlUw = mysql_query("UPDATE hrm_pms_increment_dishod SET IncDistriFrom=".$_POST['IncF2'].", IncDistriTo=".$_POST['IncT2'].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where CompanyId=".$CompanyId." AND YearId=".$_POST['yer2']." AND Rating=".$_POST['Rat2']." AND HodId=".$_POST['hod2'], $con); }
 else { $SqlUw = mysql_query("insert into hrm_pms_increment_dishod(YearId, Rating, IncDistriFrom, IncDistriTo, HodId, IncDisStatus, CompanyId, CreatedBy, CreatedDate) values(".$_POST['yer2'].", ".$_POST['Rat2'].", ".$_POST['IncF2'].", ".$_POST['IncT2'].", ".$_POST['hod2'].", 'A', ".$CompanyId.", ".$UserId.", '".date("Y-m-d")."')",$con); }  
 if($SqlUw)
 {
  $sDe=mysql_query("select d.DepartmentId from hrm_department d INNER JOIN hrm_employee_general g ON d.DepartmentId=g.DepartmentId INNER JOIN hrm_employee_pms p ON p.EmployeeID=g.EmployeeID where p.HOD_EmployeeID=".$_POST['hod2']." AND p.AssessmentYear=".$_POST['yer2']." group by d.DepartmentName ASC", $con); 
  while($RDe=mysql_fetch_array($sDe))
  {  
  
   $sql2w=mysql_query("select * from hrm_pms_increment_disdept where CompanyId=".$CompanyId." AND YearId=".$_POST['yer2']." AND Rating=".$_POST['Rat2']." AND HodId=".$_POST['hod2']." AND DeptId=".$RDe['DepartmentId'],$con); $row2w=mysql_num_rows($sql2w);
 if($row2w>0){ $SqlU22w = mysql_query("UPDATE hrm_pms_increment_disdept SET IncDistriFrom=".$_POST['IncF2'].", IncDistriTo=".$_POST['IncT2'].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where CompanyId=".$CompanyId." AND YearId=".$_POST['yer2']." AND Rating=".$_POST['Rat2']." AND HodId=".$_POST['hod2']." AND DeptId=".$RDe['DepartmentId'], $con); }
 else { $SqlU22w = mysql_query("insert into hrm_pms_increment_disdept(YearId, Rating, IncDistriFrom, IncDistriTo, HodId, DeptId, IncDisStatus, CompanyId, CreatedBy, CreatedDate) values(".$_POST['yer2'].", ".$_POST['Rat2'].", ".$_POST['IncF2'].", ".$_POST['IncT2'].", ".$_POST['hod2'].", ".$RDe['DepartmentId'].", 'A', ".$CompanyId.", ".$UserId.", '".date("Y-m-d")."')",$con); }
  
  }
  if($SqlU22w){ $msg="Data has been Updeted successfully..."; }
 
 }
}

if(isset($_POST['Save3Edit']))
{ 
 $sql2w=mysql_query("select * from hrm_pms_increment_disdept where CompanyId=".$CompanyId." AND YearId=".$_POST['yer3']." AND Rating=".$_POST['Rat3']." AND HodId=".$_POST['hod3']." AND DeptId=".$_POST['dept3'],$con); $row2w=mysql_num_rows($sql2w);
 if($row2w>0){ $SqlU2w = mysql_query("UPDATE hrm_pms_increment_disdept SET IncDistriFrom=".$_POST['IncF3'].", IncDistriTo=".$_POST['IncT3'].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where CompanyId=".$CompanyId." AND YearId=".$_POST['yer3']." AND Rating=".$_POST['Rat3']." AND HodId=".$_POST['hod3']." AND DeptId=".$_POST['dept3'], $con); }
 else { $SqlU2w = mysql_query("insert into hrm_pms_increment_disdept(YearId, Rating, IncDistriFrom, IncDistriTo, HodId, DeptId, IncDisStatus, CompanyId, CreatedBy, CreatedDate) values(".$_POST['yer3'].", ".$_POST['Rat3'].", ".$_POST['IncF3'].", ".$_POST['IncT3'].", ".$_POST['hod3'].", ".$_POST['dept3'].", 'A', ".$CompanyId.", ".$UserId.", '".date("Y-m-d")."')",$con); }  if($SqlU2w){$msg="Data has been Updeted successfully...";}
}

if(isset($_POST['Save4Edit']))
{ 
 $sql4w=mysql_query("select * from hrm_pms_increment_disrev where CompanyId=".$CompanyId." AND YearId=".$_POST['yer4']." AND Rating=".$_POST['Rat4']." AND HodId=".$_POST['hod4']." AND RevId=".$_POST['rev4'],$con); $row4w=mysql_num_rows($sql4w);
 if($row4w>0){ $SqlU4w = mysql_query("UPDATE hrm_pms_increment_disrev SET IncDistriFrom=".$_POST['IncF4'].", IncDistriTo=".$_POST['IncT4'].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where CompanyId=".$CompanyId." AND YearId=".$_POST['yer4']." AND Rating=".$_POST['Rat4']." AND HodId=".$_POST['hod4']." AND RevId=".$_POST['rev4'], $con); }
 else { $SqlU4w = mysql_query("insert into hrm_pms_increment_disrev(YearId, Rating, IncDistriFrom, IncDistriTo, HodId, RevId, IncDisStatus, CompanyId, CreatedBy, CreatedDate) values(".$_POST['yer4'].", ".$_POST['Rat4'].", ".$_POST['IncF4'].", ".$_POST['IncT4'].", ".$_POST['hod4'].", ".$_POST['rev4'].", 'A', ".$CompanyId.", ".$UserId.", '".date("Y-m-d")."')",$con); }  if($SqlU4w){$msg="Data has been Updeted successfully...";}
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
function SelectYear(ey){ var h=document.getElementById("Hod").value; var d=document.getElementById("Dept").value; var r=document.getElementById("Rev").value; window.location='IncDistri.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&ey='+ey+"&h="+h+"&d="+d+"&r="+r;}

function SelectHod(h){ var ey=document.getElementById("YearID").value; var d=document.getElementById("Dept").value; var r=document.getElementById("Rev").value; window.location='IncDistri.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&ey='+ey+"&h="+h+"&d=0&r=0";}

function SelectDept(d){ var ey=document.getElementById("YearID").value; var h=document.getElementById("Hod").value; var r=document.getElementById("Rev").value; window.location='IncDistri.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&ey='+ey+"&h="+h+"&d="+d+"&r="+r;}

function SelectRev(r){ var ey=document.getElementById("YearID").value; var h=document.getElementById("Hod").value; var d=document.getElementById("Dept").value; window.location='IncDistri.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&ey='+ey+"&h="+h+"&d="+d+"&r="+r;}

function edit(value,ey) 
{ 
 var h=document.getElementById("Hod").value; var d=document.getElementById("Dept").value;
 var r=document.getElementById("Rev").value;
 var agree=confirm("Are you sure you want to edit this record?");
 if (agree){ var x = "IncDistri.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=edit&eid="+value+"&ey="+ey+"&h="+h+"&d="+d+"&r="+r; window.location=x;} 
}

function edit2(value,ey) 
{ 
 var h=document.getElementById("Hod").value; var d=document.getElementById("Dept").value;
 var r=document.getElementById("Rev").value;
 var agree=confirm("Are you sure you want to edit this record?");
 if (agree){ var x = "IncDistri.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=edit2&eid2="+value+"&ey="+ey+"&h="+h+"&d="+d+"&r="+r; window.location=x;} 
}

function edit3(value,ey) 
{ 
 var h=document.getElementById("Hod").value; var d=document.getElementById("Dept").value;
 var r=document.getElementById("Rev").value;
 var agree=confirm("Are you sure you want to edit this record?");
 if (agree){ var x = "IncDistri.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=edit3&eid3="+value+"&ey="+ey+"&h="+h+"&d="+d+"&r="+r; window.location=x;} 
}

function edit4(value,ey) 
{ 
 var h=document.getElementById("Hod").value; var d=document.getElementById("Dept").value;
 var r=document.getElementById("Rev").value;
 var agree=confirm("Are you sure you want to edit this record?");
 if (agree){ var x = "IncDistri.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=edit4&eid4="+value+"&ey="+ey+"&h="+h+"&d="+d+"&r="+r; window.location=x;} 
}

function validateEdit(formEdit){
  var IncDistriFrom = formEdit.IncDistriFrom.value; var Numfilter=/^[0-9. ]+$/;  var test_num = Numfilter.test(IncDistriFrom)
  if (IncDistriFrom.length === 0) { alert("please select IncDistri From field.");  return false; }
  if(test_num==false) { alert('Please Enter Only Number in the IncDistri From field');  return false; } 
  
  var IncDistriTo = formEdit.IncDistriTo.value; var Numfilter=/^[0-9. ]+$/;  var test_num1 = Numfilter.test(IncDistriTo)
  if (IncDistriTo.length === 0) { alert("please select IncDistri To field.");  return false; }
  if(test_num1==false) { alert('Please Enter Only Number in the IncDistri To field');  return false; } 
}

function Fun1F(v,n){document.getElementById("IncT"+n).value=document.getElementById("IncF"+n).value;}
function Fun2F(v,n){document.getElementById("IncT2"+n).value=document.getElementById("IncF2"+n).value;}
function Fun3F(v,n){document.getElementById("IncT3"+n).value=document.getElementById("IncF3"+n).value;}
function Fun4F(v,n){document.getElementById("IncT4"+n).value=document.getElementById("IncF4"+n).value;}
                               
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
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //*********************************************************************************?>
<?php //******************START*****START*****START******START******START***************************?>
<?php //**************************************************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td align="right" class="heading">PMS - Increment Distribution
	  &nbsp;&nbsp;&nbsp;
	<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/><input type="button" value="refresh" style="width:90px;" onClick="javascript:window.location='IncDistri.php?ey=<?php echo $_REQUEST['ey']; ?>&h=<?php echo $_REQUEST['h']; ?>&d=<?php echo $_REQUEST['d']; ?>'"/>
	  
	  </td>
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
 <td style="width:50px;" valign="top" align="center">&nbsp;</td>

 
<td align="left" id="type" valign="top" style="display:block; width:100%">            
   <table border="0" width="380">
   
<tr>
<?php //*************** Open All All All All All ************************?>
 <td align="left" width="310" valign="top">
 <table border="1" width="310" cellpadding="2" cellspacing="1">
  <tr>
<?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['ey']."", $con); $rY=mysql_fetch_assoc($sY); $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>	     
    <td class="td1" colspan="6" style="font-size:14px;font-family:Times New Roman;border:hidden;text-align:center;" >&nbsp;&nbsp;<b>Year:</b>&nbsp;<select style="font-size:12px; width:115px; background-color:#DDFFBB;" name="YearID" id="YearID" onChange="SelectYear(this.value)"><option value="<?php echo $_REQUEST['ey']; ?>" style="margin-left:0px;" selected><?php echo $PRD; if($_REQUEST['ey']>5){ echo ' - Y'; } ?></option><?php for($i=$YearId; $i>=1; $i--){	
	  $s2Y=mysql_query("select * from hrm_year where YearId=".$i,$con); $r2Y=mysql_fetch_assoc($s2Y);
	  $FD2=date("Y",strtotime($r2Y['FromDate'])); $TD2=date("Y",strtotime($r2Y['ToDate'])); ?>
<?php if($_REQUEST['ey']!=$i){?><option value="<?php echo $i; ?>"><?php echo $FD2.'-'.$TD2; if($i>5){ echo ' - Y'; } ?></option><?php }?>
<?php } ?></select>
   </td>
  </tr>
  <tr bgcolor="#7a6189">
   <td class="ht" style="width:30px;"><b>SNo</b></td>
   <td class="ht" style="width:50px;"><b>Rating</b></td>
   <td class="ht" style="width:50px;"><b>From<br>(%)</b></td>
   <td class="ht" style="width:50px;"><b>To<br>(%)</b></td>
   <td class="ht" style="width:80px;"><b>Updated<br>Date</b></td>
   <td class="ht" style="width:50px;"><b>Action</b></td>
  </tr>
<?php $sqlRat=mysql_query("select * from hrm_pms_increment_dis where IncDisStatus='A' AND YearId=".$_REQUEST['ey']." AND CompanyId=".$CompanyId." order by Rating DESC", $con); $SNo=1; while($rs=mysql_fetch_array($sqlRat)) { if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$rs['IncDisId']){ ?>

<form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
  <tr bgcolor="#FFFFFF">
   <td class="bt"><?php echo $SNo; ?></td>
   <td class="bt"><?php echo $rs['Rating']; ?></td>
   <td class="bt"><input name="IncF" id="IncF<?php echo $SNo; ?>" class="bte" maxlength="5" value="<?php echo $rs['IncDistriFrom'];?>" onChange="Fun1F(this.value,<?php echo $SNo; ?>)"/></td>
   <td class="bt"><input name="IncT" id="IncT<?php echo $SNo; ?>" class="bte" maxlength="5" value="<?php echo $rs['IncDistriTo'];?>"/></td>
   <td class="bt"><?php echo date("d-M-y",strtotime($rs['CreatedDate'])); ?></td>
   <td class="bt"><input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" />
<?php if($_SESSION['User_Permission']=='Edit'){ ?>&nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;<input type="hidden" name="IncDisId" id="IncDisId" value="<?php echo $_REQUEST['eid']; ?>"/>
<?php } ?></td>
 </tr>
 </form>
 
<?php } else { ?>	 
  <tr>
   <td class="bt"><?php echo $SNo; ?></td>
   <td class="bt"><?php echo $rs['Rating']; ?></td>
   <td class="bt"><?php echo $rs['IncDistriFrom']; ?></td>
   <td class="bt"><?php echo $rs['IncDistriTo']; ?></td>
   <td class="bt"><?php echo date("d-M-y",strtotime($rs['CreatedDate'])); ?></b></td>
   <td class="bt"><?php if($_SESSION['User_Permission']=='Edit'){ ?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $rs['IncDisId'].', '.$_REQUEST['ey']; ?>)"></a>
<?php } ?></td>
 </tr>
<?php } $SNo++;} ?>
 </table>
</td>
<?php //**************************** Close All****************************?>

<td>&nbsp;</td>

<?php //*************** Open HOD HOD HOD HOD HOD ************************?>
 <td align="left" width="300" valign="top">
 <table border="1" width="300" cellpadding="2" cellspacing="1">
  <tr>	     
    <td class="td1" colspan="6" style="font-size:14px;font-family:Times New Roman;border:hidden;text-align:center;" ><b>HOD:</b>&nbsp;<select style="font-size:12px; width:200px;background-color:#DDFFBB;" name="Hod" id="Hod" onChange="SelectHod(this.value)"><?php if($_REQUEST['h']>0){ $sH=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['h']."",$con); $rH=mysql_fetch_assoc($sH); $Name=$rH['Fname'].' '.$rH['Sname'].' '.$rH['Lname']; ?><option value="<?php echo $_REQUEST['h']; ?>" selected><?php echo $Name; ?></option><?php }else{ ?><option value="0" selected>Select</option><?php } ?>
	<?php $SqlHod=mysql_query("SELECT HOD_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.HOD_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['ey']." GROUP BY HOD_EmployeeID ORDER BY Fname ASC", $con); while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['HOD_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select>
   </td>
  </tr>
  <tr bgcolor="#7a6189">
   <!--<td class="ht" style="width:30px;"><b>SNo</b></td>-->
   <td class="ht" style="width:50px;"><b>Rating</b></td>
   <td class="ht" style="width:50px;"><b>From<br>(%)</b></td>
   <td class="ht" style="width:50px;"><b>To<br>(%)</b></td>
   <td class="ht" style="width:80px;"><b>Updated<br>Date</b></td>
   <td class="ht" style="width:50px;"><b>Action</b></td>
  </tr>
<?php $sqlRat2=mysql_query("select * from hrm_pms_increment_dis where IncDisStatus='A' AND YearId=".$_REQUEST['ey']." AND CompanyId=".$CompanyId." order by Rating DESC", $con); $SNo=1; while($rs2=mysql_fetch_array($sqlRat2)) { $s2=mysql_query("select IncDistriFrom,IncDistriTo,CreatedDate from hrm_pms_increment_dishod where Rating=".$rs2['Rating']." AND YearId=".$_REQUEST['ey']." AND HodId=".$_REQUEST['h'], $con); 
$row2=mysql_num_rows($s2); $r2=mysql_fetch_assoc($s2);

if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit2" && $_REQUEST['eid2']==$rs2['IncDisId']){ 
?>

<form name="form2Edit" method="post" onSubmit="return validate2Edit(this)">	
  <tr bgcolor="#FFFFFF">
   <?php /*<td class="bt"><?php echo $SNo; ?></td>*/ ?>
   <td class="bt"><?php echo $rs2['Rating']; ?></td>
   <td class="bt"><input name="IncF2" id="IncF2<?php echo $SNo; ?>" class="bte" maxlength="5" value="<?php echo $r2['IncDistriFrom'];?>" onChange="Fun2F(this.value,<?php echo $SNo; ?>)"/></td>
   <td class="bt"><input name="IncT2" id="IncT2<?php echo $SNo; ?>" class="bte" maxlength="5" value="<?php echo $r2['IncDistriTo'];?>"/></td>
   <td class="bt"><?php if($row2>0){echo date("d-M-y",strtotime($r2['CreatedDate'])); } ?></td>
   <td class="bt"><input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" />
<?php if($_SESSION['User_Permission']=='Edit'){ ?>&nbsp;<input type="submit" name="Save2Edit"  value="" class="SaveButton">&nbsp;<input type="hidden" name="IncDisId2" id="IncDisId2" value="<?php echo $_REQUEST['eid2']; ?>"/><?php } ?>
    <input type="hidden" name="yer2" value="<?php echo $_REQUEST['ey']; ?>"/>
    <input type="hidden" name="Rat2" value="<?php echo $rs2['Rating']; ?>"/>
    <input type="hidden" name="hod2" value="<?php echo $_REQUEST['h']; ?>"/>
	<input type="hidden" name="dept2" value="<?php echo $_REQUEST['d']; ?>"/>
	<input type="hidden" name="rev2" value="<?php echo $_REQUEST['r']; ?>"/></td>
 </tr>
 </form>
 
<?php } else { ?>	 
  <tr>
   <?php /*<td class="bt"><?php echo $SNo; ?></td>*/ ?>
   <td class="bt"><?php echo $rs2['Rating']; ?></td>
   <td class="bt"><?php if($row2>0){ echo $r2['IncDistriFrom']; } ?></td>
   <td class="bt"><?php if($row2>0){ echo $r2['IncDistriTo']; } ?></td>
   <td class="bt"><?php if($row2>0){ echo date("d-M-y",strtotime($r2['CreatedDate'])); } ?></b></td>
   <td class="bt"><?php if($_SESSION['User_Permission']=='Edit' AND $_REQUEST['h']>0){ ?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit2(<?php echo $rs2['IncDisId'].', '.$_REQUEST['ey']; ?>)"></a>
<?php } ?></td>
 </tr>
<?php } $SNo++;} ?>
 </table>
</td>
<?php //**************************** Close HOD ****************************?>



<td>&nbsp;</td>

<?php //*************** Open Department Department Department Department Department ************************?>
 <td align="left" width="300" valign="top">
 <table border="1" width="300" cellpadding="2" cellspacing="1">
  <tr>	     
    <td class="td1" colspan="6" style="font-size:14px;font-family:Times New Roman;border:hidden;text-align:center;" ><b>Department:</b>&nbsp;<select style="font-size:12px; width:200px;background-color:#DDFFBB;" name="Dept" id="Dept" onChange="SelectDept(this.value)" <?php if($_REQUEST['h']==0){echo 'disabled';} ?>><?php if($_REQUEST['d']>0){ $sD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['d']."",$con); $rD=mysql_fetch_assoc($sD); ?><option value="<?php echo $_REQUEST['d']; ?>" selected><?php echo $rD['DepartmentName']; ?></option><?php }else{ ?><option value="0" selected>Select</option><?php } ?>
	<?php $SqlDe=mysql_query("select d.DepartmentId,DepartmentName from hrm_department d INNER JOIN hrm_employee_general g ON d.DepartmentId=g.DepartmentId INNER JOIN hrm_employee_pms p ON p.EmployeeID=g.EmployeeID where p.HOD_EmployeeID=".$_REQUEST['h']." AND p.AssessmentYear=".$_REQUEST['ey']." group by d.DepartmentName ASC", $con); while($ResDe=mysql_fetch_array($SqlDe)) { ?><option value="<?php echo $ResDe['DepartmentId']; ?>"><?php echo $ResDe['DepartmentName'];?></option><?php } ?></select>
   </td>
  </tr>
  <tr bgcolor="#7a6189">
   <!--<td class="ht" style="width:30px;"><b>SNo</b></td>-->
   <td class="ht" style="width:50px;"><b>Rating</b></td>
   <td class="ht" style="width:50px;"><b>From<br>(%)</b></td>
   <td class="ht" style="width:50px;"><b>To<br>(%)</b></td>
   <td class="ht" style="width:80px;"><b>Updated<br>Date</b></td>
   <td class="ht" style="width:50px;"><b>Action</b></td>
  </tr>
<?php $sqlRat3=mysql_query("select * from hrm_pms_increment_dis where IncDisStatus='A' AND YearId=".$_REQUEST['ey']." AND CompanyId=".$CompanyId." order by Rating DESC", $con); $SNo=1; while($rs3=mysql_fetch_array($sqlRat3)) { $s3=mysql_query("select IncDistriFrom,IncDistriTo,CreatedDate from hrm_pms_increment_disdept where Rating=".$rs3['Rating']." AND YearId=".$_REQUEST['ey']." AND HodId=".$_REQUEST['h']." AND DeptId=".$_REQUEST['d'], $con); $row3=mysql_num_rows($s3); $r3=mysql_fetch_assoc($s3);
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit3" && $_REQUEST['eid3']==$rs3['IncDisId']){ 
?>

<form name="form3Edit" method="post" onSubmit="return validate3Edit(this)">	
  <tr bgcolor="#FFFFFF">
   <?php /*<td class="bt"><?php echo $SNo; ?></td>*/ ?>
   <td class="bt"><?php echo $rs3['Rating']; ?></td>
   <td class="bt"><input name="IncF3" id="IncF3<?php echo $SNo; ?>" class="bte" maxlength="5" value="<?php echo $r3['IncDistriFrom'];?>" onChange="Fun3F(this.value,<?php echo $SNo; ?>)"/></td>
   <td class="bt"><input name="IncT3" id="IncT3<?php echo $SNo; ?>" class="bte" maxlength="5" value="<?php echo $r3['IncDistriTo'];?>"/></td>
   <td class="bt"><?php if($row3>0){ echo date("d-M-y",strtotime($r3['CreatedDate'])); } ?></td>
   <td class="bt"><input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" />
<?php if($_SESSION['User_Permission']=='Edit'){ ?><input type="submit" name="Save3Edit"  value="" class="SaveButton"><input type="hidden" name="IncDisId3" id="IncDisId3" value="<?php echo $_REQUEST['eid3']; ?>"/><?php } ?>
     <input type="hidden" name="yer3" value="<?php echo $_REQUEST['ey']; ?>"/>
     <input type="hidden" name="Rat3" value="<?php echo $rs3['Rating']; ?>"/>
     <input type="hidden" name="hod3" value="<?php echo $_REQUEST['h']; ?>"/>
	 <input type="hidden" name="dept3" value="<?php echo $_REQUEST['d']; ?>"/>
	 <input type="hidden" name="rev3" value="<?php echo $_REQUEST['r']; ?>"/></td>
 </tr>
 </form>
 
<?php } else { ?>	 
  <tr>
   <?php /*<td class="bt"><?php echo $SNo; ?></td> */?>
   <td class="bt"><?php echo $rs3['Rating']; ?></td>
   <td class="bt"><?php if($row3>0){ echo $r3['IncDistriFrom']; } ?></td>
   <td class="bt"><?php if($row3>0){ echo $r3['IncDistriTo']; } ?></td>
   <td class="bt"><?php if($row3>0){ echo date("d-M-y",strtotime($r3['CreatedDate'])); } ?></b></td>
   <td class="bt"><?php if($_SESSION['User_Permission']=='Edit' AND $_REQUEST['d']>0){ ?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit3(<?php echo $rs3['IncDisId'].', '.$_REQUEST['ey']; ?>)"></a>
<?php } ?></td>
 </tr>
<?php } $SNo++;} ?>
 </table>
</td>
<?php //**************************** Close Department ****************************?>


<td>&nbsp;</td>

<?php //*************** Open Reviewer Reviewer Reviewer Reviewer Reviewer ************************?>
 <td align="left" width="300" valign="top">
 <table border="1" width="300" cellpadding="2" cellspacing="1">
  <tr>	     
    <td class="td1" colspan="6" style="font-size:14px;font-family:Times New Roman;border:hidden;text-align:center;" ><b>Reviewer:</b>&nbsp;<select style="font-size:12px; width:200px;background-color:#DDFFBB;" name="Rev" id="Rev" onChange="SelectRev(this.value)" <?php if($_REQUEST['h']==0){echo 'disabled';} ?>><?php if($_REQUEST['r']>0){ $sR=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['r']."",$con); $rR=mysql_fetch_assoc($sR); $RName=$rR['Fname'].' '.$rR['Sname'].' '.$rR['Lname']; ?><option value="<?php echo $_REQUEST['r']; ?>" selected><?php echo $RName; ?></option><?php }else{ ?><option value="0" selected>Select</option><?php } ?>
	<?php $SqlRe=mysql_query("select e.EmployeeID,Fname,Sname,Lname from hrm_employee e INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.Reviewer_EmployeeID where p.HOD_EmployeeID=".$_REQUEST['h']." AND p.AssessmentYear=".$_REQUEST['ey']." group by p.Reviewer_EmployeeID order by Fname ASC", $con); while($ResRe=mysql_fetch_array($SqlRe)) { ?><option value="<?php echo $ResRe['EmployeeID']; ?>"><?php echo $ResRe['Fname'].' '.$ResRe['Sname'].' '.$ResRe['Lname'];?></option><?php } ?></select>
   </td>
  </tr>
  <tr bgcolor="#7a6189">
   <!--<td class="ht" style="width:30px;"><b>SNo</b></td>-->
   <td class="ht" style="width:50px;"><b>Rating</b></td>
   <td class="ht" style="width:50px;"><b>From<br>(%)</b></td>
   <td class="ht" style="width:50px;"><b>To<br>(%)</b></td>
   <td class="ht" style="width:80px;"><b>Updated<br>Date</b></td>
   <td class="ht" style="width:50px;"><b>Action</b></td>
  </tr>
<?php $sqlRat4=mysql_query("select * from hrm_pms_increment_dis where IncDisStatus='A' AND YearId=".$_REQUEST['ey']." AND CompanyId=".$CompanyId." order by Rating DESC", $con); $SNo=1; while($rs4=mysql_fetch_array($sqlRat4)) { $s4=mysql_query("select IncDistriFrom,IncDistriTo,CreatedDate from hrm_pms_increment_disrev where Rating=".$rs4['Rating']." AND YearId=".$_REQUEST['ey']." AND HodId=".$_REQUEST['h']." AND RevId=".$_REQUEST['r'], $con); $row4=mysql_num_rows($s4); $r4=mysql_fetch_assoc($s4);
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit4" && $_REQUEST['eid4']==$rs4['IncDisId']){ 
?>

<form name="form4Edit" method="post" onSubmit="return validate3Edit(this)">	
  <tr bgcolor="#FFFFFF">
   <?php /*<td class="bt"><?php echo $SNo; ?></td>*/ ?>
   <td class="bt"><?php echo $rs4['Rating']; ?></td>
   <td class="bt"><input name="IncF4" id="IncF4<?php echo $SNo; ?>" class="bte" maxlength="5" value="<?php echo $r4['IncDistriFrom'];?>" onChange="Fun4F(this.value,<?php echo $SNo; ?>)"/></td>
   <td class="bt"><input name="IncT4" id="IncT4<?php echo $SNo; ?>" class="bte" maxlength="5" value="<?php echo $r4['IncDistriTo'];?>"/></td>
   <td class="bt"><?php if($row4>0){ echo date("d-M-y",strtotime($r4['CreatedDate'])); } ?></td>
   <td class="bt"><input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" />
<?php if($_SESSION['User_Permission']=='Edit'){ ?><input type="submit" name="Save4Edit"  value="" class="SaveButton"><input type="hidden" name="IncDisId4" id="IncDisId4" value="<?php echo $_REQUEST['eid4']; ?>"/><?php } ?>
     <input type="hidden" name="yer4" value="<?php echo $_REQUEST['ey']; ?>"/>
     <input type="hidden" name="Rat4" value="<?php echo $rs4['Rating']; ?>"/>
     <input type="hidden" name="hod4" value="<?php echo $_REQUEST['h']; ?>"/>
	 <input type="hidden" name="dept4" value="<?php echo $_REQUEST['d']; ?>"/>
	 <input type="hidden" name="rev4" value="<?php echo $_REQUEST['r']; ?>"/></td>
 </tr>
 </form>
 
<?php } else { ?>	 
  <tr>
   <?php /*<td class="bt"><?php echo $SNo; ?></td> */?>
   <td class="bt"><?php echo $rs4['Rating']; ?></td>
   <td class="bt"><?php if($row4>0){ echo $r4['IncDistriFrom']; } ?></td>
   <td class="bt"><?php if($row4>0){ echo $r4['IncDistriTo']; } ?></td>
   <td class="bt"><?php if($row4>0){ echo date("d-M-y",strtotime($r4['CreatedDate'])); } ?></b></td>
   <td class="bt"><?php if($_SESSION['User_Permission']=='Edit' AND $_REQUEST['r']>0){ ?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit4(<?php echo $rs4['IncDisId'].', '.$_REQUEST['ey']; ?>)"></a>
<?php } ?></td>
 </tr>
<?php } $SNo++;} ?>
 </table>
</td>
<?php //**************************** Close Reviewer ****************************?>




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
