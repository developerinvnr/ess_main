<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************************************************************************************************
if(isset($_POST['SubAppDate']))
{   
    $sql=mysql_query("select * from hrm_pms_appdate where AssessmentYear=".$_POST['YearId']." AND CompanyId=".$CompanyId, $con); $row=mysql_num_rows($sql);
	if($row>0)
	 { 
	 $SqlUp = mysql_query("UPDATE hrm_pms_appdate SET AssessmentYear=".$_POST['YearId'].", EmpFromDate='".date("Y-m-d",strtotime($_POST['EmpAppDateFrom']))."', EmpToDate='".date("Y-m-d",strtotime($_POST['EmpAppDateTo']))."', EmpDateStatus='".$_POST['EmpDateStatus']."', AppFromDate='".date("Y-m-d",strtotime($_POST['AppAppDateFrom']))."', AppToDate='".date("Y-m-d",strtotime($_POST['AppAppDateTo']))."', AppDateStatus='".$_POST['AppDateStatus']."', RevFromDate='".date("Y-m-d",strtotime($_POST['RevAppDateFrom']))."', RevToDate='".date("Y-m-d",strtotime($_POST['RevAppDateTo']))."', RevDateStatus='".$_POST['RevDateStatus']."', HodFromDate='".date("Y-m-d",strtotime($_POST['HodAppDateFrom']))."', HodToDate='".date("Y-m-d",strtotime($_POST['HodAppDateTo']))."', HodDateStatus='".$_POST['HodDateStatus']."', CompanyId=".$CompanyId.", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."', YearId=".$_POST['YearId']." WHERE AppDateId =".$_POST['AppDateId'], $con) or die(mysql_error());
     if($SqlUp){ $msg1 = "Appraisal date has been updeted successfully...";}
	 }
	if($row==0)
	 { 
	 $SqlIns = mysql_query("insert into hrm_pms_appdate(AssessmentYear,EmpFromDate,EmpToDate,EmpDateStatus,AppFromDate,AppToDate,AppDateStatus,RevFromDate,RevToDate,RevDateStatus,HodFromDate,HodToDate,HodDateStatus,CompanyId,CreatedBy,CreatedDate,YearId) values(".$_POST['YearId'].", '".date("Y-m-d",strtotime($_POST['EmpAppDateFrom']))."', '".date("Y-m-d",strtotime($_POST['EmpAppDateTo']))."', '".$_POST['EmpDateStatus']."', '".date("Y-m-d",strtotime($_POST['AppAppDateFrom']))."', '".date("Y-m-d",strtotime($_POST['AppAppDateTo']))."', '".$_POST['AppDateStatus']."', '".date("Y-m-d",strtotime($_POST['RevAppDateFrom']))."', '".date("Y-m-d",strtotime($_POST['RevAppDateTo']))."', '".$_POST['RevDateStatus']."', '".date("Y-m-d",strtotime($_POST['HodAppDateFrom']))."', '".date("Y-m-d",strtotime($_POST['HodAppDateTo']))."', '".$_POST['HodDateStatus']."', ".$CompanyId.", ".$UserId.", '".date("Y-m-d")."', ".$_POST['YearId'].")", $con) or die(mysql_error());
     if($SqlIns){ $msg1 = "Appraisal date has been updeted successfully...";}
	 }    
}



if(isset($_POST['Sub2AppDate']))
{   
    $sql=mysql_query("select * from hrm_pms_kradate where AssessmentYear=".$_POST['YearId']." AND CompanyId=".$CompanyId, $con); $row=mysql_num_rows($sql);
	if($row>0)
	 { 
	 $SqlUp = mysql_query("UPDATE hrm_pms_kradate SET AssessmentYear=".$_POST['YearId'].", EmpFromDate='".date("Y-m-d",strtotime($_POST['Emp2AppDateFrom']))."', EmpToDate='".date("Y-m-d",strtotime($_POST['Emp2AppDateTo']))."', EmpDateStatus='".$_POST['Emp2DateStatus']."', AppFromDate='".date("Y-m-d",strtotime($_POST['App2AppDateFrom']))."', AppToDate='".date("Y-m-d",strtotime($_POST['App2AppDateTo']))."', AppDateStatus='".$_POST['App2DateStatus']."', RevFromDate='".date("Y-m-d",strtotime($_POST['Rev2AppDateFrom']))."', RevToDate='".date("Y-m-d",strtotime($_POST['Rev2AppDateTo']))."', RevDateStatus='".$_POST['Rev2DateStatus']."', HodFromDate='".date("Y-m-d",strtotime($_POST['Hod2AppDateFrom']))."', HodToDate='".date("Y-m-d",strtotime($_POST['Hod2AppDateTo']))."', HodDateStatus='".$_POST['Hod2DateStatus']."', CompanyId=".$CompanyId.", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."', YearId=".$_POST['YearId']." WHERE AppDateId =".$_POST['AppDateId'], $con) or die(mysql_error());
     if($SqlUp){ $msg3 = "KRA date has been updeted successfully...";}
	 }
	if($row==0)
	 { 
	 $SqlIns = mysql_query("insert into hrm_pms_kradate(AssessmentYear,EmpFromDate,EmpToDate,EmpDateStatus,AppFromDate,AppToDate,AppDateStatus,RevFromDate,RevToDate,RevDateStatus,HodFromDate,HodToDate,HodDateStatus,CompanyId,CreatedBy,CreatedDate,YearId) values(".$_POST['YearId'].", '".date("Y-m-d",strtotime($_POST['Emp2AppDateFrom']))."', '".date("Y-m-d",strtotime($_POST['Emp2AppDateTo']))."', '".$_POST['Emp2DateStatus']."', '".date("Y-m-d",strtotime($_POST['App2AppDateFrom']))."', '".date("Y-m-d",strtotime($_POST['App2AppDateTo']))."', '".$_POST['App2DateStatus']."', '".date("Y-m-d",strtotime($_POST['Rev2AppDateFrom']))."', '".date("Y-m-d",strtotime($_POST['Rev2AppDateTo']))."', '".$_POST['Rev2DateStatus']."', '".date("Y-m-d",strtotime($_POST['Hod2AppDateFrom']))."', '".date("Y-m-d",strtotime($_POST['Hod2AppDateTo']))."', '".$_POST['Hod2DateStatus']."', ".$CompanyId.", ".$UserId.", '".date("Y-m-d")."', ".$_POST['YearId'].")", $con) or die(mysql_error());
     if($SqlIns){ $msg3 = "KRA date has been updeted successfully...";}
	 }    
}



if(isset($_POST['SaveNew']))
{  $SqlInseart = mysql_query("INSERT INTO hrm_pms_schedule(Sche_DateFrom,Sche_DateTo,Activity,ProcessOwner,CompanyId,CreatedBy,CreatedDate,YearId) VALUES('".date("Y-m-d",strtotime($_POST['DateFrom']))."', '".date("Y-m-d",strtotime($_POST['DateTo']))."', '".$_POST['Activity']."', '".$_POST['ProcessOwner']."', ".$CompanyId.", ".$UserId.", '".date('Y-m-d')."', ".$_POST['YearId'].")", $con); 
   if($SqlInseart){ $msg2 = "Data has been inserted successfully..."; }
}
if(isset($_POST['SaveEdit']))
{
    $SqlUpdate = mysql_query("UPDATE hrm_pms_schedule SET Sche_DateFrom='".date("Y-m-d",strtotime($_POST['DateFrom']))."', Sche_DateTo='".date("Y-m-d",strtotime($_POST['DateTo']))."', Activity='".$_POST['Activity']."', ProcessOwner='".$_POST['ProcessOwner']."' WHERE ScheduleId=".$_POST['ScheduleId'], $con) or die(mysql_error());
     if($SqlUpdate){ $msg2 = "Data has been Updeted successfully...";}   
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
  $SqlDelete=mysql_query("UPDATE hrm_pms_schedule SET SheduleStatus='De' WHERE ScheduleId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg2 = "Data has been deleted successfully..."; }
}


if(isset($_POST['KraSaveNew']))
{  $SqlInseart = mysql_query("INSERT INTO hrm_pms_kra_schedule(KRASche_DateFrom,KRASche_DateTo,KRAActivity,KRAProcessOwner,CompanyId,CreatedBy,CreatedDate,YearId) VALUES('".date("Y-m-d",strtotime($_POST['KraDateFrom']))."', '".date("Y-m-d",strtotime($_POST['KraDateTo']))."', '".$_POST['KraActivity']."', '".$_POST['KraProcessOwner']."', ".$CompanyId.", ".$UserId.", '".date('Y-m-d')."', ".$_POST['YearId'].")", $con); 
   if($SqlInseart){ $msg4 = "Data has been inserted successfully..."; }
}
if(isset($_POST['KraSaveEdit']))
{   
    $SqlUpdate = mysql_query("UPDATE hrm_pms_kra_schedule SET KRASche_DateFrom='".date("Y-m-d",strtotime($_POST['KraDateFrom']))."', KRASche_DateTo='".date("Y-m-d",strtotime($_POST['KraDateTo']))."', KRAActivity='".$_POST['KraActivity']."', KRAProcessOwner='".$_POST['KraProcessOwner']."' WHERE KRAScheduleId=".$_POST['KraScheduleId'], $con) or die(mysql_error());
     if($SqlUpdate){ $msg4 = "Data has been Updeted successfully...";}   
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="KRAdelete")
{
  $SqlDelete=mysql_query("UPDATE hrm_pms_kra_schedule SET KRASheduleStatus='De' WHERE KRAScheduleId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg4 = "Data has been deleted successfully..."; }
}
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
<style> 
.th{ font-family:Times New Roman;font-size:12px;height:25px;text-align:center;color:#FFFFFF;font-weight:bold; }
.tdl{ font-family:Times New Roman;font-size:12px;text-align:left; }
.tdc{ font-family:Times New Roman;font-size:12px;text-align:center; }
.inputcal{ font-family:Times New Roman;font-size:13px;text-align:center;width:100%;background-color:#ACE6B4;height:20px; }
.tdinput{ font-family:Times New Roman;font-size:12px;text-align:center;width:100%;border:hidden; }
.tdinputl{ font-family:Times New Roman;font-size:12px;text-align:left;width:100%; border:hidden; }
.tdsel{ font-family:Times New Roman;font-size:14px;text-align:left;}
.inner_table{height:500px;overflow-y:auto;width:auto;}
.font { color:#ffffff; font-family:Georgia; font-size:13px; width:100px;} .font1 { font-family:Times New Roman; font-size:13px; height:14px; width:100px; } 
.font2 { font-size:11px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Times New Roman; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Times New Roman; font-size:11px; width:120px; height:18px;}
.EditInput { font-family:Times New Roman; font-size:11px; width:100px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.th{font-family:Times New Roman;size:12px;color:#FFFFFF;font-weight:bold;width:120px;height:18px; text-align:center; background-color:#7a6189;}.tit{font-family:Times New Roman;size:12px;color:#005984;font-weight:bold;}.sels{width:100px;font-family:Times New Roman;size:12px;background-color:#ACE6B4; height:20px;}
.th1{font-family:Times New Roman;font-size:12px;color:#FFFFFF;text-align:center;background-color:#7a6189;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<Script>
function SelectYear(v){window.location='Schedule.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&ey='+v+'&sample=active&right=echotrue&vtr=7&rtr=7&cc=34';}
function EditRefresh(y){window.location='Schedule.php?vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&ey='+y+'&sample=active&right=echotrue&vtr=7&rtr=7&cc=34';}
function edit(value,ey) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "Schedule.php?vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=edit&eid="+value+"&ey="+ey+"&sample=active&right=echotrue&vtr=7&rtr=7&cc=34";  window.location=x;}}
function del(value,ey) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "Schedule.php?vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=delete&did="+value+"&ey="+ey+"&sample=active&right=echotrue&vtr=7&rtr=7&cc=34";  window.location=x;}}
function newsave(ey) { var x = "Schedule.php?vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=newsave&ey="+ey+"&sample=active&right=echotrue&vtr=7&rtr=7&cc=34";  window.location=x;}


function validateEdit(formEdit){
  //var HolidayName = formEdit.HolidayName.value;  var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(HolidayName);
  //if (HolidayName.length === 0) { alert("You must enter a HolidayName Name.");  return false; }
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Holiday Name Field');  return false; }	
  var DateFrom = formEdit.DateFrom.value; 
  if (DateFrom.length === 0) { alert("please select appraisal Date from a field.");  return false; }

  var DateTo = formEdit.DateTo.value; 
  if (DateTo.length === 0) { alert("please select appraisal Date to a field.");  return false; }

  var Activity = formEdit.Activity.value; 
  if (Activity.length === 0) { alert("please enter appraisal activity field.");  return false; }

}

function EditApp()
{ var agree=confirm("Are you sure you want to edit appraisal schedule date?");
  if (agree)
   {
    document.getElementById("EmpAppDateFrom").disabled=false; document.getElementById("EmpAppDateTo").disabled=false;
	document.getElementById("EmpDateStatus").disabled=false; document.getElementById("AppAppDateFrom").disabled=false; document.getElementById("AppAppDateTo").disabled=false; document.getElementById("AppDateStatus").disabled=false;
	document.getElementById("RevAppDateFrom").disabled=false; document.getElementById("RevAppDateTo").disabled=false;
	document.getElementById("RevDateStatus").disabled=false; document.getElementById("HodAppDateFrom").disabled=false; document.getElementById("HodAppDateTo").disabled=false;	document.getElementById("HodDateStatus").disabled=false;
    document.getElementById("EditAppDate").style.display='none'; document.getElementById("SubAppDate").style.display='block';
   }
}

function Edit2App()
{ var agree=confirm("Are you sure you want to edit KRA schedule date?");
  if (agree)
   {
    document.getElementById("Emp2AppDateFrom").disabled=false; document.getElementById("Emp2AppDateTo").disabled=false;
	document.getElementById("Emp2DateStatus").disabled=false; document.getElementById("App2AppDateFrom").disabled=false; document.getElementById("App2AppDateTo").disabled=false; document.getElementById("App2DateStatus").disabled=false;
	document.getElementById("Rev2AppDateFrom").disabled=false; document.getElementById("Rev2AppDateTo").disabled=false;
	document.getElementById("Rev2DateStatus").disabled=false; document.getElementById("Hod2AppDateFrom").disabled=false; document.getElementById("Hod2AppDateTo").disabled=false; document.getElementById("Hod2DateStatus").disabled=false;
    document.getElementById("Edit2AppDate").style.display='none'; 
	document.getElementById("Sub2AppDate").style.display='block';
   }
}


function editKra(value,ey) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "Schedule.php?vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=Kraedit&eidKra="+value+"&ey="+ey+"&sample=active&right=echotrue&vtr=7&rtr=7&cc=34"; window.location=x;}}
function Kradel(value,ey) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "Schedule.php?vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=Kradelete&did="+value+"&ey="+ey+"&sample=active&right=echotrue&vtr=7&rtr=7&cc=34";  window.location=x;}}
function Kranewsave(ey) { var x = "Schedule.php?vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=Kranewsave&ey="+ey+"&sample=active&right=echotrue&vtr=7&rtr=7&cc=34";  window.location=x;}


function validateEdit(KraformEdit){
  //var HolidayName = formEdit.HolidayName.value;  var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(HolidayName);
  //if (HolidayName.length === 0) { alert("You must enter a HolidayName Name.");  return false; }
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Holiday Name Field');  return false; }	
  var KraDateFrom = KraformEdit.KraDateFrom.value; 
  if (KraDateFrom.length === 0) { alert("please select KRA Date from a field.");  return false; }

  var KraDateTo = KraformEdit.KraDateTo.value; 
  if (KraDateTo.length === 0) { alert("please select KRA Date to a field.");  return false; }

  var KraActivity = KraformEdit.KraActivity.value; 
  if (KraActivity.length === 0) { alert("please enter KRA activity field.");  return false; }

}
                       
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
	  <td valign="top" align="center" id="MainWindow"><br>
<?php //***************************************************************************************?>
<?php //**********START*****START*****START******START******START********************************?>
<?php //*******************************************************************************?>
<table border="0" style="margin-top:0px;width:100%;">
<tr>
 <td align="left" height="20" valign="top" colspan="3" style="width:100%;">
 <table border="0" style="width:100%;">
  <tr>
   <td>
    <?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['ey']."", $con); $rY=mysql_fetch_assoc($sY); 
          $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>
   <font class="td1">&nbsp;&nbsp;<b>Year:</b>&nbsp;&nbsp;</font><select style="font-size:12px; width:115px; background-color:#DDFFBB;" name="YearID" id="YearID" onChange="SelectYear(this.value)"><option value="<?php echo $_REQUEST['ey']; ?>" style="margin-left:0px;" selected><?php echo $PRD; if($_REQUEST['ey']>5){ echo ' - Y'; } ?></option>
<?php for($i=$YearId+1; $i>=1; $i--){	
	  $s2Y=mysql_query("select * from hrm_year where YearId=".$i,$con); $r2Y=mysql_fetch_assoc($s2Y);
	  $FD2=date("Y",strtotime($r2Y['FromDate'])); $TD2=date("Y",strtotime($r2Y['ToDate'])); ?>
<?php if($_REQUEST['ey']!=$i){ ?><option value="<?php echo $i; ?>"><?php echo $FD2.'-'.$TD2; if($i>5){ echo ' - Y'; } ?></option><?php } ?>
<?php } ?></select>
   <input type="button" style="width:90px; background-color:#FFB0D8;" value="refresh" onClick="EditRefresh(<?php echo $_REQUEST['ey']; ?>)"/>
   <font class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></font>
   </td>
  </tr>
  
  <tr>
   <td style="width:100%;">
    <table border="0" style="width:100%;">
	 <tr>
	  
	  <td style="width:50%;vertical-align:top;text-align:center;"><?php /*KRA KRA KRA KRA KRA KRA*/ ?>
	   <table border="0" cellspacing="0" style="width:100%;">
	    <tr><td class="tit" colspan="7" align="center">KRA Schedule</td></tr>
		<tr>
		 <td align="center">
		  <table border="1" cellspacing="1"><!-- Table Open -->
		   <?php $sql2Sch=mysql_query("select * from hrm_pms_kradate where AssessmentYear=".$_REQUEST['ey']." AND CompanyId=".$CompanyId, $con); $row22=mysql_num_rows($sql2Sch); if($row22>0) { $res2Sch=mysql_fetch_assoc($sql2Sch); }?>		
		<form name="App2Date" method="post" onSubmit="return validateEdit(this)">	
        <input type="hidden" id="YearId" name="YearId" value="<?php echo $_REQUEST['ey']; ?>" />		
        <tr><td class="th">Level</td><td class="th">From</td><td class="th">To</td><td class="th">Status</td></tr>
        <tr>
         <td class="tdl" style="width:100px;background-color:#ACE6B4;">&nbsp;<b>Employee :</b></td>
         <td style="width:120px;text-align:center;"><input name="Emp2AppDateFrom" id="Emp2AppDateFrom" class="inputcal" value="<?php echo date("d-m-Y",strtotime($res2Sch['EmpFromDate'])); ?>" disabled/><script type="text/javascript">var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("Emp2AppDateFrom", "Emp2AppDateFrom", "%d-%m-%Y"); </script><input type="hidden" name="AppDateId" value="<?php echo $res2Sch['AppDateId'];?>"/></td>
         <td style="width:120px;text-align:center;"><input name="Emp2AppDateTo" id="Emp2AppDateTo" class="inputcal" value="<?php echo date("d-m-Y",strtotime($res2Sch['EmpToDate'])); ?>" disabled/><script type="text/javascript">cal.manageFields("Emp2AppDateTo", "Emp2AppDateTo", "%d-%m-%Y"); </script></td>
         <td style="width:60px;text-align:center;"><select class="sels" name="Emp2DateStatus" id="Emp2DateStatus" style="width:100%;" disabled><option value="<?php echo $res2Sch['EmpDateStatus']; ?>"><?php if($res2Sch['EmpDateStatus']=='A'){ echo 'Active';} else { echo 'Deactive';}?></option><option value="<?php if($res2Sch['EmpDateStatus']=='A'){ echo 'D';} else { echo 'A';}?>"><?php if($res2Sch['EmpDateStatus']=='A'){ echo 'Deactive';} else { echo 'Active';}?></option></select></td> 
        </tr>
		<tr>							   
         <td class="tdl" style="background-color:#ACE6B4;">&nbsp;<b>Appraiser :</b></td>
         <td style="text-align:center;"><input name="App2AppDateFrom" id="App2AppDateFrom" class="inputcal" value="<?php echo date("d-m-Y",strtotime($res2Sch['AppFromDate'])); ?>" disabled/><script type="text/javascript">cal.manageFields("App2AppDateFrom", "App2AppDateFrom", "%d-%m-%Y"); </script></td>
         <td style="text-align:center;"><input name="App2AppDateTo" id="App2AppDateTo" class="inputcal" value="<?php echo date("d-m-Y",strtotime($res2Sch['AppToDate'])); ?>" disabled/><script type="text/javascript">cal.manageFields("App2AppDateTo", "App2AppDateTo", "%d-%m-%Y"); </script></td>
         <td style="text-align:center;"><select class="sels" name="App2DateStatus" id="App2DateStatus" style="width:100%;" disabled><option value="<?php echo $res2Sch['AppDateStatus']; ?>"><?php if($res2Sch['AppDateStatus']=='A'){ echo 'Active';} else { echo 'Deactive';}?></option><option value="<?php if($res2Sch['AppDateStatus']=='A'){ echo 'D';} else { echo 'A';}?>"><?php if($res2Sch['AppDateStatus']=='A'){ echo 'Deactive';} else { echo 'Active';}?></option></select></td> 
        </tr>
		<tr>
         <td class="tdl" style="background-color:#ACE6B4;">&nbsp;<b>Reviewer /HOD:</b></td>
         <td style="text-align:center;"><input name="Rev2AppDateFrom" id="Rev2AppDateFrom" class="inputcal" value="<?php echo date("d-m-Y",strtotime($res2Sch['RevFromDate'])); ?>" disabled/><script type="text/javascript">cal.manageFields("Rev2AppDateFrom", "Rev2AppDateFrom", "%d-%m-%Y"); </script></td>
         <td style="text-align:center;"><input name="Rev2AppDateTo" id="Rev2AppDateTo" class="inputcal" value="<?php echo date("d-m-Y",strtotime($res2Sch['RevToDate'])); ?>" disabled/><script type="text/javascript">cal.manageFields("Rev2AppDateTo", "Rev2AppDateTo", "%d-%m-%Y"); </script></td>
         <td style="text-align:center;"><select class="sels" name="Rev2DateStatus" id="Rev2DateStatus" style="width:100%;" disabled><option value="<?php echo $res2Sch['RevDateStatus']; ?>"><?php if($res2Sch['RevDateStatus']=='A'){ echo 'Active';} else { echo 'Deactive';}?></option><option value="<?php if($res2Sch['RevDateStatus']=='A'){ echo 'D';} else { echo 'A';}?>"><?php if($res2Sch['RevDateStatus']=='A'){ echo 'Deactive';} else { echo 'Active';}?></option></select></td> 						  
        </tr>
		<tr>
         <td class="tdl" style="background-color:#ACE6B4;">&nbsp;<b>Management :</b></td>
         <td style="text-align:center;"><input name="Hod2AppDateFrom" id="Hod2AppDateFrom" class="inputcal" value="<?php echo date("d-m-Y",strtotime($res2Sch['HodFromDate'])); ?>" disabled/><script type="text/javascript">cal.manageFields("Hod2AppDateFrom", "Hod2AppDateFrom", "%d-%m-%Y"); </script></td>
         <td style="text-align:center;"><input name="Hod2AppDateTo" id="Hod2AppDateTo" class="inputcal" value="<?php echo date("d-m-Y",strtotime($res2Sch['HodToDate'])); ?>" disabled/><script type="text/javascript">cal.manageFields("Hod2AppDateTo", "Hod2AppDateTo", "%d-%m-%Y"); </script></td>
         <td style="text-align:center;"><select class="sels" name="Hod2DateStatus" id="Hod2DateStatus" style="width:100%;" disabled><option value="<?php echo $res2Sch['HodDateStatus']; ?>"><?php if($res2Sch['HodDateStatus']=='A'){ echo 'Active';} else { echo 'Deactive';}?></option><option value="<?php if($res2Sch['HodDateStatus']=='A'){ echo 'D';} else { echo 'A';}?>"><?php if($res2Sch['HodDateStatus']=='A'){ echo 'Deactive';} else { echo 'Active';}?></option></select><input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" /></td> 
        </tr>
		<tr>
		 <td colspan="4" align="right" style="background-color:#CAF57A;"><font class="font4" style="left"><b><?php echo $msg3; ?></b></font><input type="button" style="width:90px; background-color:#FFB0D8;" id="Edit2AppDate" value="edit" onClick="Edit2App(<?php echo $_REQUEST['ey']; ?>)"/><input type="submit" style="width:90px; background-color:#AACF94;display:none;" id="Sub2AppDate" name="Sub2AppDate" value="save"/></td>
		</tr>
        </form>	 
		  </table><!-- Table Close -->
		 </td>
		</tr>
		
		
        <tr><td>&nbsp;</td></tr>
		
<?php /* schedule KRA details open schedule KRA details open open open open open open */ ?>
<?php /* schedule KRA details open schedule KRA details open open open open open open */ ?>

<tr>
<td style="width:100%;text-align:center;">
 <table border="1" style="width:100%;" bgcolor="#FFFFFF" cellspacing="1">
  <tr bgcolor="#7a6189">
   <td class="th" style="width:5%;">Sn</td>
   <td class="th" style="width:12%;">Date From</td>
   <td class="th" style="width:12%;">Date To</td>
   <td class="th" style="width:42%;">Activity</td>
   <td class="th" style="width:20%;">Process Owner</td>
   <td class="th" style="width:14%;">Action</td>
  </tr>
 <?php $sqlPer2=mysql_query("select * from hrm_pms_kra_schedule where KRASheduleStatus='A' AND CompanyId=".$CompanyId." AND YearId=".$_REQUEST['ey'], $con); $SNo=1; while($resPer2=mysql_fetch_array($sqlPer2)) { 
if(isset($_REQUEST['action']) && $_REQUEST['action']=="Kraedit" && $_REQUEST['eidKra']==$resPer2['KRAScheduleId']){ ?>
  <form name="KraformEdit" method="post" onSubmit="return validateEdit(this)">
  <input type="hidden" id="YearId" name="YearId" value="<?php echo $_REQUEST['ey']; ?>" />	
  <tr>
   <td class="tdc"><?php echo $SNo; ?></td>
   <td class="tdc"><input name="KraDateFrom" id="KraDateFrom" class="tdinput" value="<?php echo date("d-m-Y",strtotime($resPer2['KRASche_DateFrom'])); ?>" /></td>
   <td class="tdc"><input name="KraDateTo" id="KraDateTo" class="tdinput" value="<?php echo date("d-m-Y",strtotime($resPer2['KRASche_DateTo'])); ?>" /><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("KraDateFrom", "KraDateFrom", "%d-%m-%Y"); cal.manageFields("KraDateTo", "KraDateTo", "%d-%m-%Y");</script></td>
   <td class="tdc"><input name="KraActivity" id="KraActivity" class="tdinputl" value="<?php echo $resPer2['KRAActivity']; ?>"></td>
   <td class="tdc"><input name="KraProcessOwner" id="KraProcessOwner" class="tdinputl" value="<?php echo $resPer2['KRAProcessOwner'];?>"></td>
   <td class="tdc"><?php if($_SESSION['User_Permission']=='Edit'){ ?><input type="submit" name="KraSaveEdit"  value="" class="SaveButton">&nbsp;&nbsp;<input type="hidden" name="KraScheduleId" id="KraScheduleId" value="<?php echo $_REQUEST['eidKra']; ?>"/><?php } ?></td>
  </tr>
  </form>
 <?php } else { ?>	 
  <tr>
   <td class="tdc"><?php echo $SNo; ?></td>
   <td class="tdc"><?php echo date("d-m-Y",strtotime($resPer2['KRASche_DateFrom'])); ?></td>
   <td class="tdc"><?php echo date("d-m-Y",strtotime($resPer2['KRASche_DateTo'])); ?></td>
   <td class="tdl"><?php echo $resPer2['KRAActivity']; ?></td>
   <td class="tdl">&nbsp;<?php echo $resPer2['KRAProcessOwner']; ?></td>
   <td class="tdc"><?php if($_SESSION['User_Permission']=='Edit'){ ?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="editKra(<?php echo $resPer2['KRAScheduleId'].', '.$_REQUEST['ey']; ?>)"></a>&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="Kradel(<?php echo $resPer2['KRAScheduleId'].', '.$_REQUEST['ey']; ?>)"></a><?php } ?></td>
  </tr>
 <?php } $SNo++;} ?>
 <?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="Kranewsave"){ ?>
 <form name="KraformEdit" method="post" onSubmit="return validateEdit(this)">
 <input type="hidden" id="YearId" name="YearId" value="<?php echo $_REQUEST['ey']; ?>" />
  <tr>
   <td class="tdc"><?php echo $SNo; ?></td>
   <td class="tdc"><input name="KraDateFrom" id="KraDateFrom" class="tdinput" value="" /></td>
   <td class="tdc"><input name="KraDateTo" id="KraDateTo" class="tdinput" value="" /><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("KraDateFrom", "KraDateFrom", "%d-%m-%Y"); cal.manageFields("KraDateTo", "KraDateTo", "%d-%m-%Y");</script></td>
   <td class="tdc"><input name="KraActivity" id="KraActivity" class="tdinputl" value=""></td>
   <td class="tdc"><input name="KraProcessOwner" id="KraProcessOwner" class="tdinputl" value=""></td>
   <td class="tdc"><?php if($_SESSION['User_Permission']=='Edit'){ ?><input type="submit" name="KraSaveNew"  value="" class="SaveButton"><?php } ?><input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" /></td>
  </tr>
  </form>
 <?php } ?>
  <tr>
   <td colspan="6" align="right" style="background-color:#CAF57A;"><font class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg4; ?></b></font><?php if($_SESSION['User_Permission']=='Edit'){ ?>
  <input type="button" style="width:90px;" name="NewSave" id="NewSave" value="New" onClick="Kranewsave(<?php echo $_REQUEST['ey']; ?>)" <?php if($_REQUEST['action']=="Kranewsave" OR $_REQUEST['action']=="Kraedit"){ echo "style=display:none;"; }?>/><?php } ?></td>
  </tr>
 
 </table>
</td>
</tr>
		
<?php /* schedule KRA details close schedule KRA details close close close close close close */ ?>
<?php /* schedule KRA details close schedule KRA details close close close close close close */ ?>		
		
	   </table>
	  </td>
 
	  <td style="width:1px;background-color:#000000;"></td>
	  
	   <td style="width:50%;vertical-align:top;text-align:center;"><?php /*PMS PMS PMS PMS PMS PMS*/ ?>
	   <table border="0" cellspacing="0" style="width:100%;">
	    <tr><td class="tit" align="center">Appraisal Schedule</td></tr>
		<tr>
		 <td align="center">
		  <table border="1" cellspacing="1"><!-- Table Open -->
		   <?php $sqlSch=mysql_query("select * from hrm_pms_appdate where AssessmentYear=".$_REQUEST['ey']." AND CompanyId=".$CompanyId, $con); $row2=mysql_num_rows($sqlSch); if($row2>0) { $resSch=mysql_fetch_assoc($sqlSch); }?>		
		<form name="AppDate" method="post" onSubmit="return validateEdit(this)">	
        <input type="hidden" id="YearId" name="YearId" value="<?php echo $_REQUEST['ey']; ?>" />		
        <tr><td class="th">Level</td><td class="th">From</td><td class="th">To</td><td class="th">Status</td></tr>
        <tr>
         <td class="tdl" style="width:100px;background-color:#ACE6B4;">&nbsp;<b>Employee :</b></td>
         <td style="width:120px;text-align:center;"><input name="EmpAppDateFrom" id="EmpAppDateFrom" class="inputcal" value="<?php echo date("d-m-Y",strtotime($resSch['EmpFromDate'])); ?>" disabled/><script type="text/javascript">var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("EmpAppDateFrom", "EmpAppDateFrom", "%d-%m-%Y"); </script><input type="hidden" name="AppDateId" value="<?php echo $resSch['AppDateId'];?>"/></td>
         <td style="width:120px;text-align:center;"><input name="EmpAppDateTo" id="EmpAppDateTo" class="inputcal" value="<?php echo date("d-m-Y",strtotime($resSch['EmpToDate'])); ?>" disabled/><script type="text/javascript">cal.manageFields("EmpAppDateTo", "EmpAppDateTo", "%d-%m-%Y"); </script></td>
         <td style="width:60px;text-align:center;"><select class="sels" name="EmpDateStatus" id="EmpDateStatus" style="width:100%;" disabled><option value="<?php echo $resSch['EmpDateStatus']; ?>"><?php if($resSch['EmpDateStatus']=='A'){ echo 'Active';} else { echo 'Deactive';}?></option><option value="<?php if($resSch['EmpDateStatus']=='A'){ echo 'D';} else { echo 'A';}?>"><?php if($resSch['EmpDateStatus']=='A'){ echo 'Deactive';} else { echo 'Active';}?></option></select></td> 
        </tr>
		<tr>							   
         <td class="tdl" style="background-color:#ACE6B4;">&nbsp;<b>Appraiser :</b></td>
         <td style="text-align:center;"><input name="AppAppDateFrom" id="AppAppDateFrom" class="inputcal" value="<?php echo date("d-m-Y",strtotime($resSch['AppFromDate'])); ?>" disabled/><script type="text/javascript">cal.manageFields("AppAppDateFrom", "AppAppDateFrom", "%d-%m-%Y"); </script></td>
         <td style="text-align:center;"><input name="AppAppDateTo" id="AppAppDateTo" class="inputcal" value="<?php echo date("d-m-Y",strtotime($resSch['AppToDate'])); ?>" disabled/><script type="text/javascript">cal.manageFields("AppAppDateTo", "AppAppDateTo", "%d-%m-%Y"); </script></td>
         <td style="text-align:center;"><select class="sels" name="AppDateStatus" id="AppDateStatus" style="width:100%;" disabled><option value="<?php echo $resSch['AppDateStatus']; ?>"><?php if($resSch['AppDateStatus']=='A'){ echo 'Active';} else { echo 'Deactive';}?></option><option value="<?php if($resSch['AppDateStatus']=='A'){ echo 'D';} else { echo 'A';}?>"><?php if($resSch['AppDateStatus']=='A'){ echo 'Deactive';} else { echo 'Active';}?></option></select></td> 
        </tr>
		<tr>
         <td class="tdl" style="background-color:#ACE6B4;">&nbsp;<b>Reviewer /HOD:</b></td>
         <td style="text-align:center;"><input name="RevAppDateFrom" id="RevAppDateFrom" class="inputcal" value="<?php echo date("d-m-Y",strtotime($resSch['RevFromDate'])); ?>" disabled/><script type="text/javascript">cal.manageFields("RevAppDateFrom", "RevAppDateFrom", "%d-%m-%Y"); </script></td>
         <td style="text-align:center;"><input name="RevAppDateTo" id="RevAppDateTo" class="inputcal" value="<?php echo date("d-m-Y",strtotime($resSch['RevToDate'])); ?>" disabled/><script type="text/javascript">cal.manageFields("RevAppDateTo", "RevAppDateTo", "%d-%m-%Y"); </script></td>
         <td style="text-align:center;"><select class="sels" name="RevDateStatus" id="RevDateStatus" style="width:100%;" disabled><option value="<?php echo $resSch['RevDateStatus']; ?>"><?php if($resSch['RevDateStatus']=='A'){ echo 'Active';} else { echo 'Deactive';}?></option><option value="<?php if($resSch['RevDateStatus']=='A'){ echo 'D';} else { echo 'A';}?>"><?php if($resSch['RevDateStatus']=='A'){ echo 'Deactive';} else { echo 'Active';}?></option></select></td> 						  
        </tr>
		<tr>
         <td class="tdl" style="background-color:#ACE6B4;">&nbsp;<b>Management :</b></td>
         <td style="text-align:center;"><input name="HodAppDateFrom" id="HodAppDateFrom" class="inputcal" value="<?php echo date("d-m-Y",strtotime($resSch['HodFromDate'])); ?>" disabled/><script type="text/javascript">cal.manageFields("HodAppDateFrom", "HodAppDateFrom", "%d-%m-%Y"); </script></td>
         <td style="text-align:center;"><input name="HodAppDateTo" id="HodAppDateTo" class="inputcal" value="<?php echo date("d-m-Y",strtotime($resSch['HodToDate'])); ?>" disabled/><script type="text/javascript">cal.manageFields("HodAppDateTo", "HodAppDateTo", "%d-%m-%Y"); </script></td>
         <td style="text-align:center;"><select class="sels" name="HodDateStatus" id="HodDateStatus" style="width:100%;" disabled><option value="<?php echo $resSch['HodDateStatus']; ?>"><?php if($resSch['HodDateStatus']=='A'){ echo 'Active';} else { echo 'Deactive';}?></option><option value="<?php if($resSch['HodDateStatus']=='A'){ echo 'D';} else { echo 'A';}?>"><?php if($resSch['HodDateStatus']=='A'){ echo 'Deactive';} else { echo 'Active';}?></option></select><input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" /></td> 
        </tr>
		<tr>
		 <td colspan="4" align="right" style="background-color:#CAF57A;"><font class="font4" style="left"><b><?php echo $msg1; ?></b></font><input type="button" style="width:90px; background-color:#FFB0D8;" id="EditAppDate" value="edit" onClick="EditApp(<?php echo $_REQUEST['ey']; ?>)"/><input type="submit" style="width:90px; background-color:#AACF94;display:none;" id="SubAppDate" name="SubAppDate" value="save"/></td>
		</tr>
        </form>	 
		  </table><!-- Table Close -->
		 </td>
		</tr>
		
		<tr><td>&nbsp;</td></tr>
		
<?php /* schedule details open schedule details open open open open open open */ ?>
<?php /* schedule details open schedule details open open open open open open */ ?>

<tr>
<td style="width:100%;text-align:center;">
 <table border="1" style="width:100%;" bgcolor="#FFFFFF" cellspacing="1">
  <tr bgcolor="#7a6189">
   <td class="th" style="width:5%;">Sn</td>
   <td class="th" style="width:12%;">Date From</td>
   <td class="th" style="width:12%;">Date To</td>
   <td class="th" style="width:42%;">Activity</td>
   <td class="th" style="width:20%;">Process Owner</td>
   <td class="th" style="width:14%;">Action</td>
  </tr>
 <?php $sqlPer=mysql_query("select * from hrm_pms_schedule where SheduleStatus='A' AND CompanyId=".$CompanyId." AND YearId=".$_REQUEST['ey'], $con); $SNo=1; while($resPer=mysql_fetch_array($sqlPer)) {
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$resPer['ScheduleId']){ ?>
  <form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
  <input type="hidden" id="YearId" name="YearId" value="<?php echo $_REQUEST['ey']; ?>" />
  <tr>
   <td class="tdc"><?php echo $SNo; ?></td>
   <td class="tdc"><input name="DateFrom" id="DateFrom" class="tdinput" value="<?php echo date("d-m-Y",strtotime($resPer['Sche_DateFrom'])); ?>" /></td>
   <td class="tdc"><input name="DateTo" id="DateTo" class="tdinput" value="<?php echo date("d-m-Y",strtotime($resPer['Sche_DateTo'])); ?>" /><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("DateFrom", "DateFrom", "%d-%m-%Y"); cal.manageFields("DateTo", "DateTo", "%d-%m-%Y");</script></td>
   <td class="tdc"><input name="Activity" id="Activity" class="tdinputl" value="<?php echo $resPer['Activity']; ?>"></td>
   <td class="tdc"><input name="ProcessOwner" id="ProcessOwner" class="tdinputl" value="<?php echo $resPer['ProcessOwner']; ?>"></td>
   <td class="tdc"><?php if($_SESSION['User_Permission']=='Edit'){ ?><input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;<input type="hidden" name="ScheduleId" id="ScheduleId" value="<?php echo $_REQUEST['eid']; ?>"/><input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" /><?php } ?></td>
  </tr>
 </form>
 <?php } else { ?>	 
  <tr>
   <td class="tdc"><?php echo $SNo; ?></td>
   <td class="tdc"><?php echo date("d-m-Y",strtotime($resPer['Sche_DateFrom'])); ?></td>
   <td class="tdc"><?php echo date("d-m-Y",strtotime($resPer['Sche_DateTo'])); ?></td>
   <td class="tdl"><?php echo $resPer['Activity']; ?></td>
   <td class="tdl"><?php echo $resPer['ProcessOwner']; ?></td>
   <td class="tdc"><?php if($_SESSION['User_Permission']=='Edit'){ ?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resPer['ScheduleId'].', '.$_REQUEST['ey']; ?>)"></a>&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $resPer['ScheduleId'].', '.$_REQUEST['ey']; ?>)"></a>
<?php } ?></td>
  </tr>

 <?php } $SNo++;} ?>
 <?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
  <form name="formEdit" method="post" onSubmit="return validateEdit(this)">
  <input type="hidden" id="YearId" name="YearId" value="<?php echo $_REQUEST['ey']; ?>" />
  <tr>
   <td class="tdc"><?php echo $SNo; ?></td>
   <td class="tdc"><input name="DateFrom" id="DateFrom" class="tdinput" value=""/></td>
   <td class="tdc"><input name="DateTo" id="DateTo" class="tdinput" value=""/>
   <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
   cal.manageFields("DateFrom", "DateFrom", "%d-%m-%Y"); cal.manageFields("DateTo", "DateTo", "%d-%m-%Y");</script></td>
   <td class="tdc"><input name="Activity" id="Activity" class="tdinputl" value=""></td>
   <td class="tdc"><input name="ProcessOwner" id="ProcessOwner" class="tdinputl" value=""></td>
   <td class="tdc"><?php if($_SESSION['User_Permission']=='Edit'){ ?><input type="submit" name="SaveNew"  value="" class="SaveButton"><?php } ?><input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" /></td>
  </tr>
 </form>
 <?php } ?>
  <tr>
   <td colspan="6" align="right" style="background-color:#CAF57A;"><font class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg2; ?></b></font><?php if($_SESSION['User_Permission']=='Edit'){ ?><input type="button" style="width:90px;" name="NewSave" id="NewSave" value="New" onClick="newsave(<?php echo $_REQUEST['ey']; ?>)" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/><?php } ?></td>
   </tr>
 
 </table>
</td>
</tr>
		
<?php /* schedule details close schedule details close close close close close close */ ?>
<?php /* schedule details close schedule details close close close close close close */ ?>
		
		
	   </table>
	  </td>
	  
	 </tr>
	</table>
   </td>
  </tr>
<?php //***************************************************************************************************?>
<?php //*******************END*****END*****END******END******END***************************************?>
<?php //******************************************************************************************?>
	  </td>
	</tr>
	<!--<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
		 <tr><td align="center"><img src="images/home1.png"></td></tr>
	    </table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php //require_once("../footer.php"); ?>
	  </td>
	</tr>-->

  </table>
 </td>
</tr>
</table>
</body>
</html>

