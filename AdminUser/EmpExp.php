<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************
$_SESSION['EmpID']=$_REQUEST['ID'];
$EMPID=$_SESSION['EmpID'];
//**********************************
if(isset($_POST['AddExpE']))
{  
    $sql=mysql_query("select * from hrm_employee_experience where EmployeeID=".$EMPID, $con); $res=mysql_num_rows($sql);
    if($res>0)	{ $sqlDelete=mysql_query("DELETE FROM hrm_employee_experience WHERE EmployeeID=".$EMPID, $con); }
       
for($i=1; $i<21; $i++)
{	 
  if($_POST['CompanyName'.$i]!='')
  {
  $timestamp_start = strtotime(date("Y-m-d",strtotime($_POST['ExpFrom'.$i])));  $timestamp_end=strtotime(date("Y-m-d",strtotime($_POST['ExpTo'.$i]))); 
  $difference = abs($timestamp_end - $timestamp_start); 
  $Edays = floor($difference/(60*60*24)); $Emonths = floor($difference/(60*60*24*30)); $Eyears = $difference/(60*60*24*365); //$ExpMain=number_format($Eyears, 1);
  
$dos=date("d-m-Y",strtotime($_POST['ExpFrom'.$i]));
$today=date("d-m-Y",strtotime($_POST['ExpTo'.$i]));
$localtime = getdate();
//$today = $localtime['mday']."-".$localtime['mon']."-".$localtime['year'];
$dob_a = explode("-", $dos);
$today_a = explode("-", $today);
$dob_d = $dob_a[0];$dob_m = $dob_a[1];$dob_y = $dob_a[2];
$today_d = $today_a[0];$today_m = $today_a[1];$today_y = $today_a[2];
$years = $today_y - $dob_y;
$months = $today_m - $dob_m;
if ($today_m.$today_d < $dob_m.$dob_d){ $years--; $months = 12 + $today_m - $dob_m; }
if ($today_d < $dob_d){ $months--; }
$firstMonths=array(1,3,5,7,8,10,12);
$secondMonths=array(4,6,9,11);
$thirdMonths=array(2);
if($today_m - $dob_m == 1) 
{
if(in_array($dob_m, $firstMonths)){ array_push($firstMonths, 0); }
elseif(in_array($dob_m, $secondMonths)){ array_push($secondMonths, 0); }
elseif(in_array($dob_m, $thirdMonths)){ array_push($thirdMonths, 0); }
}

$len=strlen($months); if($len==1){$mnt='0'.$months;}else{$mnt=$months;}
$ExpMain=$years.'.'.$mnt;
//echo $years.'-'.$mnt.'<br>';  
  
  
  
 $SqlInsExp = mysql_query("INSERT INTO hrm_employee_experience(EmployeeID, ExpComName, ExpDesignation, ExpFromDate, ExpToDate, ExpTotalYear, ExpGrossSalary, ExpRemark, ExpCreatedBy, ExpCreatedDate, ExpYearId) VALUES (".$EMPID.", '".$_POST['CompanyName'.$i]."', '".$_POST['Desig'.$i]."', '".date("Y-m-d",strtotime($_POST['ExpFrom'.$i]))."', '".date("Y-m-d",strtotime($_POST['ExpTo'.$i]))."', '".$ExpMain."', '".$_POST['Salary'.$i]."', '".$_POST['Remark'.$i]."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")", $con); 
  } } 
  $sqlSumExp=mysql_query("select SUM(ExpTotalYear) as TotY from hrm_employee_experience where EmployeeID=".$EMPID, $con); $resSumExp=mysql_fetch_array($sqlSumExp);  $str = explode('.',$resSumExp['TotY']);
  //$str_arr[0].'<br>';  // Before the Decimal point
  //$str_arr[1].'<br>';  // After the Decimal point
  
if($str[1]<12){ $mnt='0.'.$str[1]; }  
elseif($str[1]>=12 AND $str[1]<24){ $m1=$str[1]-12; $l=strlen($m1);if($l==1){$mnt='1.0'.$m1;}else{$mnt='1.'.$m1;} }
elseif($str[1]>=24 AND $str[1]<36){$m1=$str[1]-24; $l=strlen($m1);if($l==1){$mnt='2.0'.$m1;}else{$mnt='2.'.$m1;} }
elseif($str[1]>=36 AND $str[1]<48){$m1=$str[1]-36; $l=strlen($m1);if($l==1){$mnt='3.0'.$m1;}else{$mnt='3.'.$m1;} }
elseif($str[1]>=48 AND $str[1]<60){$m1=$str[1]-48; $l=strlen($m1);if($l==1){$mnt='4.0'.$m1;}else{$mnt='4.'.$m1;} }
elseif($str[1]>=60 AND $str[1]<72){$m1=$str[1]-60; $l=strlen($m1);if($l==1){$mnt='5.0'.$m1;}else{$mnt='5.'.$m1;} }
elseif($str[1]>=72 AND $str[1]<84){$m1=$str[1]-72; $l=strlen($m1);if($l==1){$mnt='6.0'.$m1;}else{$mnt='6.'.$m1;} }
elseif($str[1]>=84 AND $str[1]<96){$m1=$str[1]-84; $l=strlen($m1);if($l==1){$mnt='7.0'.$m1;}else{$mnt='7.'.$m1;} }
elseif($str[1]>=96 AND $str[1]<108){$m1=$str[1]-96; $l=strlen($m1);if($l==1){$mnt='8.0'.$m1;}else{$mnt='8.'.$m1;} }
$str_a = explode('.',$mnt);
$totExp=($str[0]+$str_a[0]).'.'.$str_a[1];
//$totExp=$str[0]+$mnt; 
  
  $sqlU=mysql_query("update hrm_employee_general set VNRExpYear='".$_POST['VNRExpYear']."', PreviousExpYear='".$totExp."' where EmployeeID=".$EMPID, $con);
  
  if($SqlInsExp) {$msg = "Experience data has been Inserted successfully..."; }
}

if(isset($_POST['EditExpE']))
{  
   $sql=mysql_query("select * from hrm_employee_experience where EmployeeID=".$EMPID, $con); $res=mysql_num_rows($sql);
   if($res>0) { if($_POST['CompanyName1']!=''){$sqlDelete=mysql_query("DELETE FROM hrm_employee_experience WHERE EmployeeID=".$EMPID, $con);} }
   		   
for($i=1; $i<21; $i++)
  {	 
  if($_POST['CompanyName'.$i]!='')
  {
  $timestamp_start = strtotime(date("Y-m-d",strtotime($_POST['ExpFrom'.$i])));  $timestamp_end=strtotime(date("Y-m-d",strtotime($_POST['ExpTo'.$i]))); 
  $difference = abs($timestamp_end - $timestamp_start); 
  $Edays = floor($difference/(60*60*24)); $Emonths = floor($difference/(60*60*24*30)); $Eyears = $difference/(60*60*24*365); //$ExpMain=number_format($Eyears, 1);
  //echo 'aa='.$Edays; if($Edays>=365){$y=$Edays/365;}echo ' bb='.$y; if($Edays<365) {$m=$Edays/30;} echo ' cc='.$m;
  
$dos=date("d-m-Y",strtotime($_POST['ExpFrom'.$i]));
$today=date("d-m-Y",strtotime($_POST['ExpTo'.$i]));
$localtime = getdate();
//$today = $localtime['mday']."-".$localtime['mon']."-".$localtime['year'];
$dob_a = explode("-", $dos);
$today_a = explode("-", $today);
$dob_d = $dob_a[0];$dob_m = $dob_a[1];$dob_y = $dob_a[2];
$today_d = $today_a[0];$today_m = $today_a[1];$today_y = $today_a[2];
$years = $today_y - $dob_y;
$months = $today_m - $dob_m;
if ($today_m.$today_d < $dob_m.$dob_d){ $years--; $months = 12 + $today_m - $dob_m; }
if ($today_d < $dob_d){ $months--; }
$firstMonths=array(1,3,5,7,8,10,12);
$secondMonths=array(4,6,9,11);
$thirdMonths=array(2);
if($today_m - $dob_m == 1) 
{
if(in_array($dob_m, $firstMonths)){ array_push($firstMonths, 0); }
elseif(in_array($dob_m, $secondMonths)){ array_push($secondMonths, 0); }
elseif(in_array($dob_m, $thirdMonths)){ array_push($thirdMonths, 0); }
}
//$ExpMain=$years.'.'.$months;

$len=strlen($months); if($len==1){$mnt='0'.$months;}else{$mnt=$months;}
$ExpMain=$years.'.'.$mnt;
  
  
 $SqlInsExp = mysql_query("INSERT INTO hrm_employee_experience(EmployeeID, ExpComName, ExpDesignation, ExpFromDate, ExpToDate, ExpTotalYear, ExpGrossSalary, ExpRemark, ExpCreatedBy, ExpCreatedDate, ExpYearId) VALUES (".$EMPID.", '".$_POST['CompanyName'.$i]."', '".$_POST['Desig'.$i]."', '".date("Y-m-d",strtotime($_POST['ExpFrom'.$i]))."', '".date("Y-m-d",strtotime($_POST['ExpTo'.$i]))."', '".$ExpMain."', '".$_POST['Salary'.$i]."', '".$_POST['Remark'.$i]."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")", $con); 
  } } 
  $sqlSumExp=mysql_query("select SUM(ExpTotalYear) as TotY from hrm_employee_experience where EmployeeID=".$EMPID, $con); $resSumExp=mysql_fetch_array($sqlSumExp);
  $str = explode('.',$resSumExp['TotY']);
  //$str[0].'<br>';  // Before the Decimal point
  //$str[1].'<br>';  // After the Decimal point

if($str[1]<10){ $mnt='0.0'.intval($str[1]); } 
elseif($str[1]>=10 && $str[1]<12){ $mnt='0.'.intval($str[1]); }   
//if($str[1]<12){ $mnt='0.'.$str[1]; }  
elseif($str[1]>=12 AND $str[1]<24){ $m1=$str[1]-12; $l=strlen($m1);if($l==1){$mnt='1.0'.$m1;}else{$mnt='1.'.$m1;} }
elseif($str[1]>=24 AND $str[1]<36){$m1=$str[1]-24; $l=strlen($m1);if($l==1){$mnt='2.0'.$m1;}else{$mnt='2.'.$m1;} }
elseif($str[1]>=36 AND $str[1]<48){$m1=$str[1]-36; $l=strlen($m1);if($l==1){$mnt='3.0'.$m1;}else{$mnt='3.'.$m1;} }
elseif($str[1]>=48 AND $str[1]<60){$m1=$str[1]-48; $l=strlen($m1);if($l==1){$mnt='4.0'.$m1;}else{$mnt='4.'.$m1;} }
elseif($str[1]>=60 AND $str[1]<72){$m1=$str[1]-60; $l=strlen($m1);if($l==1){$mnt='5.0'.$m1;}else{$mnt='5.'.$m1;} }
elseif($str[1]>=72 AND $str[1]<84){$m1=$str[1]-72; $l=strlen($m1);if($l==1){$mnt='6.0'.$m1;}else{$mnt='6.'.$m1;} }
elseif($str[1]>=84 AND $str[1]<96){$m1=$str[1]-84; $l=strlen($m1);if($l==1){$mnt='7.0'.$m1;}else{$mnt='7.'.$m1;} }
elseif($str[1]>=96 AND $str[1]<108){$m1=$str[1]-96; $l=strlen($m1);if($l==1){$mnt='8.0'.$m1;}else{$mnt='8.'.$m1;} } //echo 'cc='.$mnt;
$str_a = explode('.',$mnt); //echo 'ee='.$str[0].'+'.$str_a[0];
$toty=$str[0]+$str_a[0];
$totExp=$toty.'.'.$str_a[1]; //echo 'ff='.$totExp;
//$totExp=$str[0]+$mnt;
//echo 'y='.$str[0]; 
  
  $sqlU=mysql_query("update hrm_employee_general set VNRExpYear='".$_POST['VNRExpYear']."', PreviousExpYear='".$totExp."' where EmployeeID=".$EMPID, $con);
  
  if($SqlInsExp) {$msg = "Experience data has been Updeted successfully..."; }
  
  if($_POST['ExpFrom1']=='' AND $_POST['ExpTo1']=='' AND $_POST['CompanyName1']=='')
  { $sqlUBlank=mysql_query("update hrm_employee_general set PreviousExpYear=0 where EmployeeID=".$EMPID, $con); 
    $SqlInsExp = mysql_query("update hrm_employee_experience set ExpComName='', ExpDesignation='', ExpFromDate='', ExpToDate='', ExpTotalYear='', ExpGrossSalary='', ExpRemark='', ExpCreatedBy='', ExpCreatedDate='', ExpYearId='' where EmployeeID=".$EMPID, $con); 
  }
}

if($_REQUEST['Action']=='Delete' AND $_REQUEST['Action']!='')
{ $Delete=mysql_query("DELETE FROM hrm_employee_experience WHERE ExperienceId=".$_REQUEST['Value'], $con);
  $sqlSumExp=mysql_query("select SUM(ExpTotalYear) as TotY from hrm_employee_experience where EmployeeID=".$EMPID, $con); $resSumExp=mysql_fetch_array($sqlSumExp);
  $sqlU=mysql_query("update hrm_employee_general set PreviousExpYear='".$resSumExp['TotY']."' where EmployeeID=".$EMPID, $con);
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
function EditExp()
{document.getElementById("EditExpE").style.display = 'block'; document.getElementById("ChangeExp").style.display = 'none';
 //document.getElementById("PreviousExpYear").readOnly = false;  document.getElementById("PreviousExpMonth").disabled = false;  

  var ExNum = document.getElementById("ExRowCount").value;
  if(ExNum!=0)
  { for (i=1; i<=ExNum; i++) 
    {document.getElementById("CompanyName_"+i).readOnly = false; document.getElementById("Desig_"+i).readOnly = false; 
	 document.getElementById("ExpFromBtn_"+i).disabled = false; document.getElementById("ExpToBtn_"+i).disabled = false; 
	 document.getElementById("ExpFrom_"+i).readOnly = false; document.getElementById("ExpTo_"+i).readOnly = false;
	 document.getElementById("Salary_"+i).readOnly = false; document.getElementById("Remark_"+i).readOnly = false; } 
	} 

 for(var j=i; j<21; j++){ document.getElementById("CompanyName_"+j).readOnly = false; document.getElementById("Desig_"+j).readOnly = false; 
                          document.getElementById("ExpFrom_"+j).readOnly = false; document.getElementById("ExpTo_"+j).readOnly = false;
                          document.getElementById("ExpFrom"+j+"Btn").disabled = false; document.getElementById("ExpTo"+j+"Btn").disabled = false; 
						  document.getElementById("Salary_"+j).readOnly = false; document.getElementById("Remark_"+j).readOnly = false;
 }  
  
}

function RefExp()
{ for( var i=1; i<21; i++)  {	document.getElementById("CompanyName"+i).value=''; document.getElementById("Desig"+i).value=''; document.getElementById("ExpFrom"+i).value=''; document.getElementById("ExpTo"+i).value=''; document.getElementById("ExpTo"+i+"Btn").value=''; document.getElementById("Salary"+i).value=''; document.getElementById("Remark"+i).value='';  }
  for( var i=20; i<21; i--) { document.getElementById("Row_"+i).style.display='none'; document.getElementById("minusImg_"+i).style.display='none'; document.getElementById("addImg_"+i).style.display='none';  if(i==3){document.getElementById("Row_"+i).style.display='none'; document.getElementById("minusImg_"+i).style.display='none'; document.getElementById("addImg_"+i).style.display='block';}}
}

for(var i=3; i<21; i++) 
{
function ShowRowExp(i)
 { 
 var t = i+1;  var t1 = i-1; 
  if(i<=19)
  { if(document.getElementById("CompanyName"+t1).value=='' || document.getElementById("Desig"+t1).value=='' || document.getElementById("ExpFrom"+t1).value=='' || document.getElementById("ExpTo"+t1).value=='') { alert("please first enter previous row!"); }
  else{ document.getElementById('minusImg_'+i).style.display = 'block'; document.getElementById('addImg_'+i).style.display = 'none';
   document.getElementById('Row_'+i).style.display = 'block'; document.getElementById('addImg_'+t).style.display = 'block';
   document.getElementById('minusImg_'+t1).style.display = 'none'; }
   }
  else 
  { document.getElementById('minusImg_'+i).style.display = 'block'; document.getElementById('addImg_'+i).style.display = 'none';
    document.getElementById('Row_'+i).style.display = 'block';  document.getElementById('minusImg_'+t1).style.display = 'none';  }
  }
function HideRowExp(i)
 { 
 var t = i+1;  var t1 = i-1; 
  if(i<=19)
  {document.getElementById('minusImg_'+i).style.display = 'none'; document.getElementById('addImg_'+i).style.display = 'block';
   document.getElementById('Row_'+i).style.display = 'none'; document.getElementById('addImg_'+t).style.display = 'none';
   document.getElementById('minusImg_'+t1).style.display = 'block';
   document.getElementById('CompanyName'+i).value = ""; document.getElementById('Desig'+i).value = ""; document.getElementById('ExpFrom'+i).value = "";
   document.getElementById('ExpTo'+i).value = ""; document.getElementById('Salary'+i).value = ""; document.getElementById('Remark'+i).value = ""; }
  else 
  { document.getElementById('minusImg_'+i).style.display = 'none'; document.getElementById('addImg_'+i).style.display = 'block';
    document.getElementById('Row_'+i).style.display = 'none';  document.getElementById('minusImg_'+t1).style.display = 'block';  
	document.getElementById('CompanyName'+i).value = ""; document.getElementById('Desig'+i).value = ""; document.getElementById('ExpFrom'+i).value = "";
    document.getElementById('ExpTo'+i).value = ""; document.getElementById('Salary'+i).value = ""; document.getElementById('Remark'+i).value = "";}
  } 
}

for(var i=2; i<21; i++) 
{
function ShowRowExp2(i)
 { 
 var t = i+1;  var t1 = i-1; 
  if(i<=19)
  {if(document.getElementById("CompanyName_"+t1).value=='' || document.getElementById("Desig_"+t1).value=='' || document.getElementById("ExpFrom_"+t1).value=='' || document.getElementById("ExpTo_"+t1).value=='') { alert("please first enter previous row!"); }
  else {document.getElementById('minusImg_'+i).style.display = 'block'; document.getElementById('addImg_'+i).style.display = 'none';
   document.getElementById('Row_'+i).style.display = 'block'; document.getElementById('addImg_'+t).style.display = 'block';
   document.getElementById('minusImg_'+t1).style.display = 'none'; }
   }
  else 
  { document.getElementById('minusImg_'+i).style.display = 'block'; document.getElementById('addImg_'+i).style.display = 'none';
    document.getElementById('Row_'+i).style.display = 'block';  document.getElementById('minusImg_'+t1).style.display = 'none';  }
  }
function HideRowExp2(i)
 { 
 var t = i+1;  var t1 = i-1; 
  if(i<=19)
  {document.getElementById('minusImg_'+i).style.display = 'none'; document.getElementById('addImg_'+i).style.display = 'block';
   document.getElementById('Row_'+i).style.display = 'none'; document.getElementById('addImg_'+t).style.display = 'none';
   document.getElementById('minusImg_'+t1).style.display = 'block';
   document.getElementById('CompanyName'+i).value = ""; document.getElementById('Desig'+i).value = ""; document.getElementById('ExpFrom'+i).value = "";
   document.getElementById('ExpTo'+i).value = ""; document.getElementById('Salary'+i).value = ""; document.getElementById('Remark'+i).value = ""; }
  else 
  { document.getElementById('minusImg_'+i).style.display = 'none'; document.getElementById('addImg_'+i).style.display = 'block';
    document.getElementById('Row_'+i).style.display = 'none';  document.getElementById('minusImg_'+t1).style.display = 'block';  
	document.getElementById('CompanyName'+i).value = ""; document.getElementById('Desig'+i).value = ""; document.getElementById('ExpFrom'+i).value = "";
    document.getElementById('ExpTo'+i).value = ""; document.getElementById('Salary'+i).value = ""; document.getElementById('Remark'+i).value = "";}
  } 
}


function DelExpAdd(value,Id)
{ var agree=confirm("Are you sure you want to delete this record?"); 
  if (agree) {  var x = "EmpExp.php?ID="+Id+"&Value="+value+"&Action=Delete&Event=Add";  window.location=x; }
}

function DelExp(value,Id)
{ var agree=confirm("Are you sure you want to delete this record?"); 
  if (agree) {  var x = "EmpExp.php?ID="+Id+"&Value="+value+"&Action=Delete&Event=Edit";  window.location=x; }
}

function toUpper(txt)
{ 
    //document.getElementById(txt).value=document.getElementById(txt).value.toUpperCase(); return true;
}
</script>
<script type="text/javascript" src="js/exp.js"></script>
</head>
<body class="body">
<?php 
$SqlEmp = mysql_query("SELECT *,hrm_employee_general.*,hrm_employee_personal.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$EMPID, $con) or die(mysql_error());  $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
      if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
?>
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){require_once("AMenu.php"); } ?></td></tr></table></td></tr>
<tr><td valign="top">
      <table width="100%" style="margin-top:0px;" border="0">
	    <tr><td valign="top"><?php if($_SESSION['login'] = true){require_once("AWelcome.php"); } ?></td></tr>
	    <tr>
	        <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
  <table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="4">
   <table border="0">
    <tr>
	  <td align="right" width="320" class="heading">Experience</td>
	  <td>&nbsp;&nbsp;&nbsp;</td>
	  <td style="font-family:Times New Roman; font-size:16px; color:#287126; font-weight:bold;"><font color="#FF0000" size="4">*</font>  - Require Field</td>
	   <td><table><tr><td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><span id="msgspan">
	   <?php echo $msg; ?></span></b></td></tr></table></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:100px;" align="center" valign="top"><?php if($_REQUEST['Event']=='Edit') { include("EmpMasterMenu.php"); } ?></td>
 
<td style="width:50px;" align="center" valign="top">
<?php for($i=1; $i<=15; $i++) { ?><input type="hidden" id="FromToDate_<?php echo $i; ?>" value="0" /><?php } ?>
</td>
<?php //*********************************************************************************************************************************************************?>
<?php //$sqlJ=mysql_query("select DateJoining from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $row=mysql_fetch_assoc($sqlJ);	
      $timestamp_start = strtotime($ResEmp['DateJoining']);  $timestamp_end = strtotime(date("Y-m-d")); $difference = abs($timestamp_end - $timestamp_start); 
	  $days = floor($difference/(60*60*24)); $months = floor($difference/(60*60*24*30)); $years = floor($difference/(60*60*24*365));
	  $Y2=$years*12;  $M2=$months-$Y2;
?>
<?php if($_REQUEST['Event']=='Add') {?>
<td align="left" id="Eexp" valign="top">           
 <form enctype="multipart/form-data" name="formEexp" method="post" onSubmit="return validate(this)">
<table border="0">
<tr>
 <td colspan="2">
  <table><tr>
 <td class="All_80">EmpCode :</td><td class="All_60"><input name="EmpCode" style="background-color:#E6EBC5;" id="EmpCode" class="All_50" value="<?php echo $EC; ?>" readonly></td>
 <td class="All_50">Name :</td><td class="All_220"><input name="EmpName" id="EmpName" style="width:210px; height:18px;background-color:#E6EBC5; font-size:11px;text-transform:uppercase;" value="<?php echo $Ename; ?>" readonly></td>
  </tr></table>
 </td>
</tr>
<tr>
 <td colspan="2" width="850">
  <table border="0"><tr>
<?php $sqlReti=mysql_query("select RetiStatus,RetiDate from hrm_employee where EmployeeID=".$EMPID, $con); $resReti=mysql_fetch_assoc($sqlReti);
$sqlExp=mysql_query("select DateJoining,VNRExpYear,VNRExpMonth,PreviousExpYear,PreviousExpMonth from hrm_employee_general where EmployeeID=".$EMPID, $con); 
 $resExp=mysql_fetch_assoc($sqlExp);
if($resReti['RetiStatus']=='N'){$StratDate=$resExp['DateJoining'];}elseif($resReti['RetiStatus']=='Y'){$StratDate=$resReti['RetiDate'];}

$date1 = $StratDate;
$date2 = date("Y-m-d");
$diff = abs(strtotime($date2) - strtotime($date1));
$years = floor($diff/(365*60*60*24));
$months = floor(($diff-$years*365*60*60*24)/(30*60*60*24));
$days = floor(($diff-$years*365*60*60*24-$months*30*60*60*24)/(60*60*24)); 
//$ExpVNRMain=$years.'.'.$months;	

$dos=date("d-m-Y",strtotime($StratDate));
$localtime = getdate();
$today = $localtime['mday']."-".$localtime['mon']."-".$localtime['year'];
$dob_a = explode("-", $dos);
$today_a = explode("-", $today);
$dob_d = $dob_a[0];$dob_m = $dob_a[1];$dob_y = $dob_a[2];
$today_d = $today_a[0];$today_m = $today_a[1];$today_y = $today_a[2];
$years = $today_y - $dob_y;
$months = $today_m - $dob_m;
if ($today_m.$today_d < $dob_m.$dob_d){ $years--; $months = 12 + $today_m - $dob_m; }
if ($today_d < $dob_d){ $months--; }
$firstMonths=array(1,3,5,7,8,10,12);
$secondMonths=array(4,6,9,11);
$thirdMonths=array(2);
if($today_m - $dob_m == 1) 
{
if(in_array($dob_m, $firstMonths)){ array_push($firstMonths, 0); }
elseif(in_array($dob_m, $secondMonths)){ array_push($secondMonths, 0); }
elseif(in_array($dob_m, $thirdMonths)){ array_push($thirdMonths, 0); }
}
//$ExpVNRMain=$years.'.'.$months;

$len2=strlen($months); if($len2==1){$mnt='0'.$months;}else{$mnt=$months;}
$ExpVNRMain=$years.'.'.$mnt;

/*
$timestamp_start = strtotime($resExp['DateJoining']);  $timestamp_end = strtotime(date("Y-m-d")); $difference = abs($timestamp_end - $timestamp_start); 
$days = floor($difference/(60*60*24)); $months = floor($difference/(60*60*24*30)); $years2 = $difference/(60*60*24*365); 
//$Y2=$years2*12; $M22=$months-$Y2; 
$ExpVNRMain=number_format($years2, 1); */
	  
?> 
 <td class="All_80">VNR Exp. <?php if($resReti['RetiStatus']=='Y'){echo '(Consulted)';} ?>:</td><td class="All_60"><input name="VNRExpYear" id="VNRExpYear" value="<?php echo $ExpVNRMain; ?>" class="All_50" readonly></td>  
 <td class="All_100">Previous Exp. :</td><td class="All_220"><input name="PreviousExpYear" id="PreviousExpYear" value="<?php echo floatval($resExp['PreviousExpYear']); ?>" class="All_50" readonly></td>
  </tr></table>
 </td>
</tr>
<tr>
<td style="width:30px;background-color:#E0DBE3;" align="center"></td>
<td><table bgcolor="#BCA9D3" width="850"><tr>
  <td class="All_50" align="center">SNo.</td>
  <td class="All_100" align="center">From</td>
  <td class="All_100" align="center">To</td>
  <td class="All_120" align="center">CompanyName</td>
  <td class="All_200" align="center">Designation</td>
  <td class="All_80" align="center">Duration</td>
  <td class="All_120" align="center">Remark</td>
  <td class="All_50">&nbsp;</td>
</tr></table></td>
</tr>



<?php $sqlEx=mysql_query("select * from hrm_employee_experience where EmployeeID=".$EMPID." order by ExpFromDate ASC", $con); $rowEx=mysql_num_rows($sqlEx); 
      if($rowEx>0) { $i=1; $No=1; while($resEx=mysql_fetch_array($sqlEx)){?>
<tr>
<td style="width:30px;background-color:#E0DBE3;" align="center"></td>
<td><table bgcolor="#FFFFFF" border="0" width="850"><tr>
  <td class="All_50" align="center">&nbsp;<?php echo $No; ?><input type="hidden" name="ExId<?php echo $i; ?>" id="ExId<?php echo $i; ?>" value="<?php echo $resEx['ExperienceId']; ?>" /></td>
  <td class="All_100" align="center"><input name="ExpFrom<?php echo $i; ?>" id="ExpFrom<?php echo $i; ?>" class="All_80" value="<?php if($resEx['ExpFromDate']=='0000-00-00') {echo '';}else {echo date("d-m-Y",strtotime($resEx['ExpFromDate'])); } ?>" readonly/><button id="ExpFrom<?php echo $i; ?>Btn" class="CalenderButton"></button></td>
  <td class="All_100" align="center"><input name="ExpTo<?php echo $i; ?>" id="ExpTo<?php echo $i; ?>" class="All_80" value="<?php if($resEx['ExpToDate']=='0000-00-00') {echo '';}else { echo date("d-m-Y",strtotime($resEx['ExpToDate'])); }?>" readonly /><button id="ExpTo<?php echo $i; ?>Btn" class="CalenderButton"></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("ExpFrom<?php echo $i; ?>Btn", "ExpFrom<?php echo $i; ?>", "%d-%m-%Y");  cal.manageFields("ExpTo<?php echo $i; ?>Btn", "ExpTo<?php echo $i; ?>", "%d-%m-%Y");</script></td>
  <td class="All_120" align="center"><input name="CompanyName<?php echo $i; ?>" id="CompanyName<?php echo $i; ?>" maxlength="50" class="All_120" value="<?php echo $resEx['ExpComName']; ?>"/></td>
  <td class="All_200" align="center"><input name="Desig<?php echo $i; ?>" id="Desig<?php echo $i; ?>" maxlength="50" class="All_200" value="<?php echo $resEx['ExpDesignation']; ?>"/></td>
  <td class="All_80" align="center"><input name="Duration<?php echo $i; ?>" id="Duration<?php echo $i; ?>" class="All_80" value="<?php echo floatval($resEx['ExpTotalYear']).'&nbsp; Year'; ?>" disabled />
  <input type="hidden" name="Salary<?php echo $i; ?>" id="Salary<?php echo $i; ?>" maxlength="7" class="All_80" value="<?php echo $resEx['ExpGrossSalary']; ?>" /></td>
  <td class="All_120" align="center"><input name="Remark<?php echo $i; ?>" id="Remark<?php echo $i; ?>" maxlength="200" class="All_120" value="<?php echo $resEx['ExpRemark']; ?>"/></td>
  <td class="All_50" align="center"><?php if($i!=1) { ?><a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="DelExpAdd(<?php echo $resEx['ExperienceId'].','.$EMPID; ?>)"></a><?php } ?></td>
</tr></table></td>
</tr>
<?php $i++; $No++;} }?><input type="hidden" name="ExRowCount" id="ExRowCount" value="<?php echo $rowEx; ?>" />

<?php for($j=$i; $j<21; $j++){ ?>
<tr>
<td style="width:30px;background-color:#E0DBE3;" id="Img_<?php echo $j; ?>" align="center">
<img src="images/Addnew.png" <?php if($j>$i) { echo 'style="display:none;"';} ?> border="0" id="addImg_<?php echo $j; ?>" onClick="ShowRowExp(<?php echo $j; ?>)"/>
<img src="images/Minusnew.png" id="minusImg_<?php echo $j; ?>" <?php if($j>=$i){ echo 'style="display:none;"'; } ?> border="0" onClick="HideRowExp(<?php echo $j; ?>)"/></td>
<td><table style="display:none;" id="Row_<?php echo $j; ?>" bgcolor="#FFFFFF" border="0"><tr>
<td class="All_50" align="center">&nbsp;<?php echo $j; ?></td>
<td class="All_100" align="center"><input name="ExpFrom<?php echo $j; ?>" id="ExpFrom<?php echo $j; ?>" class="All_80" readonly/><button id="ExpFrom<?php echo $j; ?>Btn" class="CalenderButton"></button></td>
<td class="All_100" align="center"><input name="ExpTo<?php echo $j; ?>" id="ExpTo<?php echo $j; ?>" class="All_80" readonly/><button id="ExpTo<?php echo $j; ?>Btn" class="CalenderButton"></button>
        <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("ExpFrom<?php echo $j; ?>Btn", "ExpFrom<?php echo $j; ?>", "%d-%m-%Y");  cal.manageFields("ExpTo<?php echo $j; ?>Btn", "ExpTo<?php echo $j; ?>", "%d-%m-%Y");</script></td>
<td class="All_120" align="center"><input name="CompanyName<?php echo $j; ?>" id="CompanyName<?php echo $j; ?>" class="All_120" maxlength="50"/></td>
<td class="All_200" align="center"><input name="Desig<?php echo $j; ?>" id="Desig<?php echo $j; ?>" class="All_200" maxlength="50"/></td>
<td class="All_80" align="center"><input name="Duration<?php echo $j; ?>" id="Duration<?php echo $j; ?>" class="All_80" value="" disabled/>
<input type="hidden" name="Salary<?php echo $j; ?>" id="Salary<?php echo $j; ?>" class="All_80" maxlength="7"/></td>
<td class="All_120" align="center"><input name="Remark<?php echo $j; ?>" id="Remark<?php echo $j; ?>" class="All_120" maxlength="150"/></td>
</tr></table></td>
</tr>
<?php } ?>
<tr>
  <td align="Right" class="fontButton" colspan="6" width="800"><table border="0" align="right" class="fontButton">
	<tr>	 
	  <td align="right" style="width:90px;">
		<input type="submit" name="AddExpE" id="AddExpE" style="width:90px;" value="save"></td>
	  <td align="right" style="width:90px;"><input type="button" name="RefreshExpE" id="RefreshExpE" style="width:90px;" value="refresh" onClick="RefExp()"/></td>
	</tr></table>
  </td>
</tr>
</table>
</form> 
</td>
<?php } if($_REQUEST['Event']=='Edit') {?>
 <td align="left" id="Eexp" valign="top">             
 <form enctype="multipart/form-data" name="formEexp" method="post" onSubmit="return validate(this)">
<table border="0">
<tr>
 <td>
  <table><tr>
 <td class="All_80">EmpCode :</td><td class="All_60"><input name="EmpCode" id="EmpCode" class="All_50" style="background-color:#E6EBC5;" value="<?php echo $EC; ?>" Readonly></td>
 <td class="All_50">Name :</td><td class="All_220"><input name="EmpName" id="EmpName" style="width:210px; height:18px; font-size:11px;background-color:#E6EBC5;text-transform:uppercase;" value="<?php echo $Ename; ?>" Readonly></td>
  </tr></table>
 </td>
</tr>
<tr>
 <td colspan="2" width="800">
  <table border="0"><tr>
<?php $sqlReti=mysql_query("select RetiStatus,RetiDate from hrm_employee where EmployeeID=".$EMPID, $con); $resReti=mysql_fetch_assoc($sqlReti);
$sqlExp=mysql_query("select DateJoining,VNRExpYear,VNRExpMonth,PreviousExpYear,PreviousExpMonth from hrm_employee_general where EmployeeID=".$EMPID, $con); 
 $resExp=mysql_fetch_assoc($sqlExp);
if($resReti['RetiStatus']=='N'){$StratDate=$resExp['DateJoining'];}elseif($resReti['RetiStatus']=='Y'){$StratDate=$resReti['RetiDate'];}
$date1 = $StratDate;
$date2 = date("Y-m-d");
$diff = abs(strtotime($date2) - strtotime($date1));
$years = floor($diff/(365*60*60*24));
$months = floor(($diff-$years*365*60*60*24)/(30*60*60*24));
$days = floor(($diff-$years*365*60*60*24-$months*30*60*60*24)/(60*60*24)); 
//$ExpVNRMain=$years.'.'.$months;

$dos=date("d-m-Y",strtotime($StratDate));
$localtime = getdate();
$today = $localtime['mday']."-".$localtime['mon']."-".$localtime['year'];
$dob_a = explode("-", $dos);
$today_a = explode("-", $today);
$dob_d = $dob_a[0];$dob_m = $dob_a[1];$dob_y = $dob_a[2];
$today_d = $today_a[0];$today_m = $today_a[1];$today_y = $today_a[2];
$years = $today_y - $dob_y;
$months = $today_m - $dob_m;
if ($today_m.$today_d < $dob_m.$dob_d){ $years--; $months = 12 + $today_m - $dob_m; }
if ($today_d < $dob_d){ $months--; }
$firstMonths=array(1,3,5,7,8,10,12);
$secondMonths=array(4,6,9,11);
$thirdMonths=array(2);
if($today_m - $dob_m == 1) 
{
if(in_array($dob_m, $firstMonths)){ array_push($firstMonths, 0); }
elseif(in_array($dob_m, $secondMonths)){ array_push($secondMonths, 0); }
elseif(in_array($dob_m, $thirdMonths)){ array_push($thirdMonths, 0); }
}
//$ExpVNRMain=$years.'.'.$months; 

$len2=strlen($months); //if($len2==1){$months='0'.$months;}else{$months=$months;}
//$ExpVNRMain=$years.'.'.$mnt;

if($months<10){ $mnt='0.0'.$months; } 
elseif($months>=10 && $months<12){ $mnt='0.'.$months; } 
//if($months<12){ $mnt='0.'.$str[1]; }  
elseif($months>=12 AND $months<24){ $m1=$months-12; $l=strlen($m1);if($l==1){$mnt='1.0'.$m1;}else{$mnt='1.'.$m1;} }
elseif($months>=24 AND $months<36){$m1=$months-24; $l=strlen($m1);if($l==1){$mnt='2.0'.$m1;}else{$mnt='2.'.$m1;} }
elseif($months>=36 AND $months<48){$m1=$months-36; $l=strlen($m1);if($l==1){$mnt='3.0'.$m1;}else{$mnt='3.'.$m1;} }
elseif($months>=48 AND $months<60){$m1=$months-48; $l=strlen($m1);if($l==1){$mnt='4.0'.$m1;}else{$mnt='4.'.$m1;} }
elseif($months>=60 AND $months<72){$m1=$months-60; $l=strlen($m1);if($l==1){$mnt='5.0'.$m1;}else{$mnt='5.'.$m1;} }
elseif($months>=72 AND $months<84){$m1=$months-72; $l=strlen($m1);if($l==1){$mnt='6.0'.$m1;}else{$mnt='6.'.$m1;} }
elseif($months>=84 AND $months<96){$m1=$months-84; $l=strlen($m1);if($l==1){$mnt='7.0'.$m1;}else{$mnt='7.'.$m1;} }
elseif($months>=96 AND $months<108){$m1=$months-96; $l=strlen($m1);if($l==1){$mnt='8.0'.$m1;}else{$mnt='8.'.$m1;} }
$str_a = explode('.',$mnt);
$ExpVNRMain=($years+$str_a[0]).'.'.$str_a[1]; 
//echo 'aa='.$years.'<br>'; echo 'bb='.$mnt.'<br>';
	

/* $timestamp_start = strtotime($resExp['DateJoining']);  $timestamp_end = strtotime(date("Y-m-d")); $difference = abs($timestamp_end - $timestamp_start); 
      $days = floor($difference/(60*60*24)); $months = floor($difference/(60*60*24*30)); $years2 = $difference/(60*60*24*365); 
	  //$Y2=$years2*12; $M22=$months-$Y2;
	  $ExpVNRMain=number_format($years2, 1); */
	  
?> 
 <td class="All_80">VNR Exp. <?php if($resReti['RetiStatus']=='Y'){echo '(Consulted)';} ?>:</td><td class="All_60"><input name="VNRExpYear" id="VNRExpYear" value="<?php echo $ExpVNRMain; ?>" class="All_50" readonly></td>
 <td class="All_100">Previous Exp. :</td><td class="All_220"><input name="PreviousExpYear" id="PreviousExpYear" value="<?php echo floatval($resExp['PreviousExpYear']); ?>" class="All_50" readonly></td>
  </tr></table>
 </td>
</tr>

<tr> 
<td align="left" valign="top">
<table border="0" id="TEmp" style="display:block;" cellpadding="0" cellspacing="0">
<tr>
<td style="width:30px;background-color:#E0DBE3;" align="center"></td>
<td><table bgcolor="#BCA9D3"><tr>
  <td class="All_50" align="center">SNo.</td>
  <td class="All_100" align="center">From</td>
  <td class="All_100" align="center">To</td>
  <td class="All_120" align="center">CompanyName</td>
  <td class="All_200" align="center">Designation</td>
  <td class="All_80" align="center">Duration</td>
  <td class="All_120" align="center">Remark</td>
  <td class="All_50">&nbsp;</td>
</tr></table></td>
</tr>
<?php $sqlEx=mysql_query("select * from hrm_employee_experience where EmployeeID=".$EMPID." order by ExpFromDate ASC", $con); $rowEx=mysql_num_rows($sqlEx); 
      if($rowEx>0) { $i=1; $No=1; while($resEx=mysql_fetch_array($sqlEx)){?>
<tr>
<td style="width:30px;background-color:#E0DBE3;" align="center"></td>
<td><table bgcolor="#FFFFFF"><tr>
  <td class="All_50" align="center">&nbsp;<?php echo $No; ?><input type="hidden" name="ExId<?php echo $i; ?>" id="ExId<?php echo $i; ?>" value="<?php echo $resEx['ExperienceId']; ?>" /></td>
  <td class="All_100" align="center"><input name="ExpFrom<?php echo $i; ?>" id="ExpFrom_<?php echo $i; ?>" class="All_80" value="<?php if($resEx['ExpComName']==''){echo '';} else { echo date("d-m-Y",strtotime($resEx['ExpFromDate'])); } ?>" readonly/><button id="ExpFromBtn_<?php echo $i; ?>" class="CalenderButton" disabled></button></td>
  <td class="All_100" align="center"><input name="ExpTo<?php echo $i; ?>" id="ExpTo_<?php echo $i; ?>" class="All_80" value="<?php if($resEx['ExpComName']==''){echo '';} else { echo date("d-m-Y",strtotime($resEx['ExpToDate'])); }?>" readonly/><button id="ExpToBtn_<?php echo $i; ?>" class="CalenderButton" disabled></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("ExpFromBtn_<?php echo $i; ?>", "ExpFrom_<?php echo $i; ?>", "%d-%m-%Y");  cal.manageFields("ExpToBtn_<?php echo $i; ?>", "ExpTo_<?php echo $i; ?>", "%d-%m-%Y");</script></td>
  <td class="All_120" align="center"><input name="CompanyName<?php echo $i; ?>" id="CompanyName_<?php echo $i; ?>" maxlength="50" class="All_120" value="<?php echo $resEx['ExpComName']; ?>" readonly/></td>
  <td class="All_200" align="center"><input name="Desig<?php echo $i; ?>" id="Desig_<?php echo $i; ?>" maxlength="50" class="All_200" value="<?php echo $resEx['ExpDesignation']; ?>" readonly/></td>
  <td class="All_80" align="center"><input name="Duration<?php echo $i; ?>" id="Duration<?php echo $i; ?>" class="All_80" value="<?php echo $resEx['ExpTotalYear'].'&nbsp; Year'; ?>" disabled/>
  <input type="hidden" name="Salary<?php echo $i; ?>" id="Salary_<?php echo $i; ?>" maxlength="7" class="All_80" value="<?php echo $resEx['ExpGrossSalary']; ?>" readonly/></td>
  <td class="All_120" align="center"><input name="Remark<?php echo $i; ?>" id="Remark_<?php echo $i; ?>" maxlength="150" class="All_120" value="<?php echo $resEx['ExpRemark']; ?>" readonly/></td>
  <td class="All_50" align="center"><?php if($i!=1) { ?><a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="DelExp(<?php echo $resEx['ExperienceId'].','.$EMPID; ?>)"></a><?php } ?></td>
</tr></table></td>
</tr>
<?php $i++; $No++;} }?><input type="hidden" name="ExRowCount" id="ExRowCount" value="<?php echo $rowEx; ?>" />
<?php for($j=$i; $j<21; $j++){ ?>
<tr>
<td style="width:30px;background-color:#E0DBE3;" id="Img_<?php echo $j; ?>" align="center">
<img src="images/Addnew.png" <?php if($j>$i) { echo 'style="display:none;"';} ?> border="0" id="addImg_<?php echo $j; ?>" onClick="ShowRowExp2(<?php echo $j; ?>)"/>
<img src="images/Minusnew.png" id="minusImg_<?php echo $j; ?>" <?php if($j>=$i){ echo 'style="display:none;"'; } ?> border="0" onClick="HideRowExp2(<?php echo $j; ?>)"/></td>
<td><table style="display:none;" id="Row_<?php echo $j; ?>" bgcolor="#FFFFFF" border="0"><tr>
<td class="All_50" align="center">&nbsp;<?php echo $j; ?></td>
<td class="All_100" align="center"><input name="ExpFrom<?php echo $j; ?>" id="ExpFrom_<?php echo $j; ?>" class="All_80" readonly/><button id="ExpFrom<?php echo $j; ?>Btn" class="CalenderButton" disabled></button></td>
<td class="All_100" align="center"><input name="ExpTo<?php echo $j; ?>" id="ExpTo_<?php echo $j; ?>" class="All_80" readonly/><button id="ExpTo<?php echo $j; ?>Btn" class="CalenderButton" disabled></button>
        <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("ExpFrom<?php echo $j; ?>Btn", "ExpFrom_<?php echo $j; ?>", "%d-%m-%Y");  cal.manageFields("ExpTo<?php echo $j; ?>Btn", "ExpTo_<?php echo $j; ?>", "%d-%m-%Y");</script></td>
<td class="All_120" align="center"><input name="CompanyName<?php echo $j; ?>" id="CompanyName_<?php echo $j; ?>" maxlength="50" class="All_120" readonly/></td>
<td class="All_200" align="center"><input name="Desig<?php echo $j; ?>" id="Desig_<?php echo $j; ?>" maxlength="50" class="All_200" readonly/></td>
<td class="All_80" align="center"><input name="Duration<?php echo $j; ?>" id="Duration<?php echo $j; ?>" class="All_80" value="" disabled/>
<input type="hidden" name="Salary<?php echo $j; ?>" id="Salary_<?php echo $j; ?>" maxlength="7" class="All_80" readonly/></td>
<td class="All_120" align="center"><input name="Remark<?php echo $j; ?>" id="Remark_<?php echo $j; ?>" maxlength="150" class="All_120" readonly/></td>
</tr></table></td>
</tr>
<?php } ?>
<tr>
  <td align="Right" class="fontButton" colspan="6"><table border="0" align="right" class="fontButton">
	<tr>	 
<?php if($_SESSION['User_Permission']=='Edit'){?>
	  <td align="right" style="width:90px;"><input type="button" name="ChangeExp" id="ChangeExp" style="width:90px; display:block;" value="Edit" onClick="EditExp()">
		<input type="submit" name="EditExpE" id="EditExpE" style="width:90px;display:none;" value="save"></td>
<?php } ?>
	  <td align="right" style="width:90px;"><input type="button" name="RefreshExpE" id="RefreshExpE" style="width:90px;" value="refresh" onClick="javascript:window.location='EmpExp.php?ID=<?php echo $EMPID; ?>&Event=Edit'"/></td>
	</tr></table>
  </td>
</tr>
</table>
</td>
<?php include("EmpImg.php"); ?>
</tr>
</table>
</form>  
</td>

 <?php } ?>
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

