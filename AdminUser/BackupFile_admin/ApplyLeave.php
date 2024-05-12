<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
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
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}
.span {display:block; font-family:Times New Roman; color:#620000;font-size:15px; }.span1 {display:block; font-family:Times New Roman; color:#620000;font-size:15px;  }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:14px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:150px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.hd{font-family:Times New Roman;font-size:14px;color:#FFFFFF;text-align:center;}
.hd2{font-family:Times New Roman;font-size:13px;overflow:hidden;}
</style>
<Script type="text/javascript">window.history.forward(1);</script>
<script language="javascript">
function OpenWindow(LId,tbl)
{window.open("LeaveDetails.php?id="+LId+"&tbl="+tbl+"&dd=345&rf=33&sts=rue","leaveForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=550,height=350");}

/*function LeaveStatus(value)
{ var yly=document.getElementById("YearSel").value; var mlm=document.getElementById("MonthSel").value;
  if(value==''){alert("please select leave status"); return false;}
  else{var x="ApplyLeave.php?ls="+value+"&wer=123grtd&se=reew&w=ee102&yly="+yly+"&mlm="+mlm+"&ee=s1s&rer=ert&ttt=trutright&rr=34%44%ee&actt=false"; window.location=x;}
}

function SelYear(v)
{ var ls=document.getElementById("LeaveS").value; var mlm=document.getElementById("MonthSel").value;
  if(v==0){alert("please select year"); return false;}
  else{ var x="ApplyLeave.php?ls="+ls+"&wer=123grtd&se=reew&w=ee102&yly="+v+"&mlm="+mlm+"&ee=s1s&rer=ert&ttt=trutright&rr=34%44%ee&actt=false"; window.location=x;}
}

function SelMonth(v)
{ var ls=document.getElementById("LeaveS").value; var yly=document.getElementById("YearSel").value;
  if(v==0){alert("please select month"); return false;}
  else{ var x="ApplyLeave.php?ls="+ls+"&wer=123grtd&se=reew&w=ee102&yly="+yly+"&mlm="+v+"&ee=s1s&rer=ert&ttt=trutright&rr=34%44%ee&actt=false"; window.location=x;}
}*/

function FunClick()    
{
 if(document.getElementById("MonthSel").value==''){alert("select month!"); return false;}
 else if(document.getElementById("YearSel").value==''){alert("select year!"); return false;}
 else if(document.getElementById("LeaveS").value==''){alert("select status!"); return false;}
 else{ window.location="ApplyLeave.php?ls="+document.getElementById("LeaveS").value+"&wer=123grtd&se=reew&w=ee102&yly="+document.getElementById("YearSel").value+"&mlm="+document.getElementById("MonthSel").value+"&ee=s1s&rer=ert&ttt=trutright&rr=34%44%ee&actt=false"; }
}


function ChangeLStatus(v,LId,LT,FD,TD,TotD,EI,PG,App,Hod,UI)
{ var ls=document.getElementById("LeaveS").value; var yly=document.getElementById("YearSel").value; 
  var YI=document.getElementById("YearId").value; var mlm=document.getElementById("MonthSel").value;
  if(v==1){var agree=confirm("Are you sure you want to pending status this apply leave?"); 
           if (agree) { var x = "ApplyLeave.php?AppLeave=yes&lid="+LId+"&v="+v+"&LeT="+LT+"&page="+PG+"&App="+App+"&Hod="+Hod+"&UI="+UI+"&ls="+ls+"&yly="+yly+"&YI="+YI+"&mlm="+mlm;  window.location=x; }}
  if(v==2){var agree=confirm("Are you sure you want to approved this apply leave?"); 
           if (agree) { var win=window.open("LeaveApproved.php?action=App&AppLeave=yes&lid="+LId+"&v="+v+"&LeT="+LT+"&FD="+FD+"&TD="+TD+"&TotD="+TotD+"&EI="+EI+"&page="+PG+"&App="+App+"&Hod="+Hod+"&UI="+UI+"&ls="+ls+"&yly="+yly+"&YI="+YI+"&mlm="+mlm,"LVAppForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=550,height=200");
		   var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="ApplyLeave.php?ls="+ls+"&yly="+yly+"&page="+PG+"&mlm="+mlm+"&wew=q12q&e=ere"; } }, 1000);
		   }}
		      
  if(v==22){ var agree=confirm("Are you sure you want to approved partially this apply leave?"); 
           if (agree) { var win=window.open("PartiallyLVApproved.php?ParAppLeave=yes&lid="+LId+"&v="+v+"&LeT="+LT+"&FD="+FD+"&TD="+TD+"&TotD="+TotD+"&EI="+EI+"&page="+PG+"&App="+App+"&Hod="+Hod+"&YI="+YI+"&UI="+UI+"&ls="+ls+"&yly="+yly+"&YI="+YI+"&mlm="+mlm,"leaveForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=550,height=260");
		   var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="ApplyLeave.php?ls="+ls+"&yly="+yly+"&page="+PG+"&mlm="+mlm+"&wew=q12q&e=ere"; } }, 1000); }}	   	   
		   
  if(v==3){var agree=confirm("Are you sure you want to disapproved status this apply leave?"); 
           if (agree) { var win=window.open("LeaveApproved.php?action=Dis&AppLeave=yes&lid="+LId+"&v="+v+"&LeT="+LT+"&FD="+FD+"&TD="+TD+"&TotD="+TotD+"&EI="+EI+"&page="+PG+"&App="+App+"&Hod="+Hod+"&UI="+UI+"&ls="+ls+"&yly="+yly+"&wew=q12q&e=ere&YI="+YI+"&mlm="+mlm,"LVAppForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=550,height=200");
		   var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="ApplyLeave.php?ls="+ls+"&yly="+yly+"&page="+PG+"&mlm="+mlm+"&wew=q12q&e=ere"; } }, 1000);
		   }}
}

</script>
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
<?php //*****************************************************************************************/ ?>
<?php //****************START*****START*****START******START******START*******************************/ ?>
<?php //*******************************************************************************/ ?>	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
<input type="hidden" id="StatusId" value=""/><input type="hidden" id="UserId" value="<?php echo $UserId; ?>"/>
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>"/>
 <tr>
  <td style="width:50px;" valign="top" align="center">&nbsp;</td>
  <td align="left" height="20" valign="top" colspan="2" width="100%">
   <table border="0">
    <tr>
	  <td style="width:300px;" class="heading" align="right">
	  Apply Leave <font color="#640000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <u>Month</u> :&nbsp;</font></td>	
	  <td style="width:80px;"><select style="font-family:Times New Roman;height:20px;width:100px;color:#000000;font-size:14px;" id="MonthSel" onChange="SelMonth(this.value)" >
	  <option value="<?php echo $_REQUEST['mlm']; ?>" selected><?php if($_REQUEST['mlm']=='All'){echo 'All';}elseif($_REQUEST['mlm']==01){echo 'January';}elseif($_REQUEST['mlm']==02){echo 'February';}elseif($_REQUEST['mlm']==03){echo 'March';}elseif($_REQUEST['mlm']==04){echo 'April';}elseif($_REQUEST['mlm']==05){echo 'May';}elseif($_REQUEST['mlm']==06){echo 'June';}elseif($_REQUEST['mlm']==07){echo 'July';}elseif($_REQUEST['mlm']==08 OR $_REQUEST['mlm']==8){echo 'August';}elseif($_REQUEST['mlm']==09 OR $_REQUEST['mlm']==9){echo 'September';}elseif($_REQUEST['mlm']==10){echo 'October';}elseif($_REQUEST['mlm']==11){echo 'November';}elseif($_REQUEST['mlm']==12){echo 'December';} ?></option><?php for($i=12; $i>=1; $i--){ ?><?php if($_REQUEST['mlm']!=$i){ ?><option value="<?php echo $i; ?>"><?php if($i==1){echo 'January';}elseif($i==02){echo 'February';}elseif($i==03){echo 'March';}elseif($i==04){echo 'April';}elseif($i==05){echo 'May';}elseif($i==06){echo 'June';}elseif($i==07){echo 'July';}elseif($i==08 OR $i==8){echo 'August';}elseif($i==09 OR $i==9){echo 'September';}elseif($i==10){echo 'October';}elseif($i==11){echo 'November';}elseif($i==12){echo 'December';} ?></option><?php } } if($_REQUEST['mlm']!='All'){?><option value="All">All</option><?php } ?></select></td>
	  <td style="width:80px;" class="heading" align="right"><u><font color="#640000">Year</font></u> :&nbsp;</font></td>	
	  <td style="width:80px;"><select style="font-family:Times New Roman;height:20px;width:78px;color:#000000;font-size:14px;" id="YearSel" onChange="SelYear(this.value)" >
	  <option value="<?php echo $_REQUEST['yly']; ?>" selected><?php echo $_REQUEST['yly']; ?></option>
	  <?php for($i=date("Y"); $i>=2013; $i--){ ?>
<?php if($_REQUEST['yly']!=$i){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?>
<?php } ?>
	  </select></td>	
	  <td style="width:100px;" class="heading" align="right">
	  <font color="#640000"><u>Status</u> :&nbsp;</font></td>	
	  <td style="font-family:Times New Roman; font-size:15px; width:125px;" align="">
	   <select name="LeaveS" id="LeaveS" style="font-family:Times New Roman; height:20px;width:120px;color:#000000; font-size:14px;" onChange="return LeaveStatus(this.value)">
	   <option style="" value="<?php echo $_REQUEST['ls']; ?>"><?php if($_REQUEST['ls']==0){echo 'Drapt';} if($_REQUEST['ls']==1){echo 'Pending';} if($_REQUEST['ls']==2){echo 'Approved';}if($_REQUEST['ls']==3){echo 'DisApproved';}if($_REQUEST['ls']==4){echo 'Canceled';}if($_REQUEST['ls']==10){echo 'Draft/ Pending';}?></option>
	   <option value="10" style="background-color:#FFFFFF;">Draft/ Pending</option>
	   <option value="0" style="background-color:#FFFFFF;">Draft</option><option value="1" style="background-color:#FFFFFF;">Pending</option><option value="2" style="background-color:#FFFFFF;">Approved</option><option value="3" style="background-color:#FFFFFF;">DisApproved</option><option value="4" style="background-color:#FFFFFF;">Apply For Cancelation</option></select>
	  </td>
	  <td><input type="button" value="click" style="width:60px;" onClick="FunClick()" /></td>
	  <td>&nbsp;</td>
	  <td align="left" width="500" class="heading">&nbsp;&nbsp;
	  <input type="text" id="LeaveStatus" style="background-color:#E0DBE3; border-color:#E0DBE3; border-style:hidden; font-family:Times New Roman; font-size:16px; font-weight:bold;" value="<?php if($_REQUEST['ls']==0){echo 'Draft';} if($_REQUEST['ls']==1){echo 'Pending';} if($_REQUEST['ls']==2){echo 'Approved';}if($_REQUEST['ls']==3){echo 'DisApproved';}if($_REQUEST['ls']==4){echo 'Apply For Cancelation';} if($_REQUEST['ls']==10){echo 'Draft/ Pending';}?>" /> 
	  </td>
	  <td class="font4" style="left">
	  <input id="msg" style="font-family:Times New Roman;color:#1FAD34; font-size:13px; height:20px;background-color:#E0DBE3; border-style:none; font-weight:bold; width:200px;"/></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { 

$BY=date("Y")-1;
if($_REQUEST['yly']>=date("Y"))
{ $AttTable='hrm_employee_attendance'; $AppLeaveTable='hrm_employee_applyleave'; }
elseif($_REQUEST['yly']==$BY AND date("m")=='01' AND $_REQUEST['mlm']==12)
{ $AttTable='hrm_employee_attendance'; $AppLeaveTable='hrm_employee_applyleave'; }
elseif($_REQUEST['yly']==$BY AND $_REQUEST['mlm']<12)
{ $AttTable='hrm_employee_attendance_'.$_REQUEST['yly']; $AppLeaveTable='hrm_employee_applyleave_'.$_REQUEST['yly']; }
else
{$AttTable='hrm_employee_attendance_'.$_REQUEST['yly']; $AppLeaveTable='hrm_employee_applyleave_'.$_REQUEST['yly']; }
?>	 
 <tr>
<td style="width:50px;" valign="top" align="center">&nbsp;</td>
  <td align="left" id="ReplyToQuery" valign="top" style="display:block;">             
   <form name="formRTQ" method="post" onSubmit="return validate(this)">
   <table border="0">
	<tr>
	
<?php //************************ Open Apply Leave *************************************?>  	
	  <td align="left" style="width:95%; ">
	   <form name="form" id="form2" method="post">
			 <table border="0" id="Activity">
			  <tr>
				 <td valign="top">
				    <table border="1" cellspacing="1">
<tr bgcolor="#7a6189">
<td style="width:50px;" class="hd"><b>EC</b></td>
<td style="width:250px;" class="hd"><b>Name</b></td>
<td style="width:150px;" class="hd"><b>Department</b></td>
<td style="width:50px;" class="hd"><b>Leave</b></td>
<td style="width:90px;" class="hd"><b>Status</b></td>
<td style="width:80px;" class="hd"><b>Apply Date</b></td>
<td style="width:80px;" class="hd"><b>From</b></td>
<td style="width:80px;" class="hd"><b>To</b></td>
<td style="width:50px;" class="hd"><b>Day</b></td>
<td style="width:90px;" class="hd"><b>REP-MGR</b></td>
<td style="width:90px;" class="hd"><b>HOD</b></td>
<td style="width:50px;" class="hd"><b>Details</b></td>
<?php if($_SESSION['User_Permission']=='Edit'){?>
<?php if($_REQUEST['ls']==0 OR $_REQUEST['ls']==1 OR $_REQUEST['ls']==10){ ?>
<td style="width:100px;" class="hd"><b>HR Action</b></td>
<?php } else { ?>
<td style="width:200px;" class="hd"><b>HR Comment</b></td>
<?php } ?>
<?php } ?>
</tr>
<?php 
if($_REQUEST['ls']==10)
{ 
 if($_REQUEST['mlm']=='All'){ $sql_statement = mysql_query("SELECT al.*,EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,Gender,DR,Married FROM ".$AppLeaveTable." al INNER JOIN hrm_employee e ON al.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON al.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON al.EmployeeID=p.EmployeeID where (al.LeaveStatus=0 OR al.LeaveStatus=1) AND al.Apply_FromDate>='".date($_REQUEST['yly']."-01-01")."' AND al.Apply_FromDate<='".date($_REQUEST['yly']."-12-31")."' AND e.CompanyId=".$CompanyId." ORDER BY al.Apply_Date DESC", $con); }else{ $sql_statement = mysql_query("SELECT al.*,EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,Gender,DR,Married FROM ".$AppLeaveTable." al INNER JOIN hrm_employee e ON al.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON al.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON al.EmployeeID=p.EmployeeID where (al.LeaveStatus=0 OR al.LeaveStatus=1) AND al.Apply_FromDate>='".date($_REQUEST['yly']."-".$_REQUEST['mlm']."-01")."' AND al.Apply_FromDate<='".date($_REQUEST['yly']."-".$_REQUEST['mlm']."-31")."' AND e.CompanyId=".$CompanyId." ORDER BY al.Apply_Date DESC", $con); } 
}
elseif($_REQUEST['ls']==4)
{ 
 if($_REQUEST['mlm']=='All'){ $sql_statement = mysql_query("SELECT al.*,EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,Gender,DR,Married FROM ".$AppLeaveTable." al INNER JOIN hrm_employee e ON al.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON al.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON al.EmployeeID=p.EmployeeID where al.LeaveEmpCancelStatus='Y' AND al.Apply_FromDate>='".date($_REQUEST['yly']."-01-01")."' AND al.Apply_FromDate<='".date($_REQUEST['yly']."-12-31")."' AND e.CompanyId=".$CompanyId." ORDER BY al.Apply_FromDate DESC", $con); }else{ $sql_statement = mysql_query("SELECT al.*,EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,Gender,DR,Married FROM ".$AppLeaveTable." al INNER JOIN hrm_employee e ON al.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON al.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON al.EmployeeID=p.EmployeeID where al.LeaveEmpCancelStatus='Y' AND al.Apply_FromDate>='".date($_REQUEST['yly']."-".$_REQUEST['mlm']."-01")."' AND al.Apply_FromDate<='".date($_REQUEST['yly']."-".$_REQUEST['mlm']."-31")."' AND e.CompanyId=".$CompanyId." ORDER BY al.Apply_FromDate DESC", $con); } 
}
else 
{ 
 if($_REQUEST['mlm']=='All'){ $sql_statement = mysql_query("SELECT al.*,EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,Gender,DR,Married FROM ".$AppLeaveTable." al INNER JOIN hrm_employee e ON al.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON al.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON al.EmployeeID=p.EmployeeID where al.LeaveStatus=".$_REQUEST['ls']." AND al.Apply_FromDate>='".date($_REQUEST['yly']."-01-01")."' AND al.Apply_FromDate<='".date($_REQUEST['yly']."-12-31")."' AND e.CompanyId=".$CompanyId." ORDER BY al.Apply_FromDate DESC", $con); }else{ $sql_statement = mysql_query("SELECT al.*,EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,Gender,DR,Married FROM ".$AppLeaveTable." al INNER JOIN hrm_employee e ON al.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON al.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON al.EmployeeID=p.EmployeeID where al.LeaveStatus=".$_REQUEST['ls']." AND al.Apply_FromDate>='".date($_REQUEST['yly']."-".$_REQUEST['mlm']."-01")."' AND al.Apply_FromDate<='".date($_REQUEST['yly']."-".$_REQUEST['mlm']."-31")."' AND e.CompanyId=".$CompanyId." ORDER BY al.Apply_FromDate DESC", $con); } 
}
//$num_Array = mysql_query($sql_statement);

$total_records = mysql_num_rows($sql_statement);
if(isset($_GET['page']))
$page = $_GET['page'];
else
$page = 1;
$offset = 15;
if ($page){
$from = ($page * $offset) - $offset;
}else{
$from = 0;
}

if($_REQUEST['ls']==10)
{ 
 if($_REQUEST['mlm']=='All'){ $sql_statement = mysql_query("SELECT al.*,EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,Gender,DR,Married FROM ".$AppLeaveTable." al INNER JOIN hrm_employee e ON al.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON al.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON al.EmployeeID=p.EmployeeID where (al.LeaveStatus=0 OR al.LeaveStatus=1) AND al.Apply_FromDate>='".date($_REQUEST['yly']."-01-01")."' AND al.Apply_FromDate<='".date($_REQUEST['yly']."-12-31")."' AND e.CompanyId=".$CompanyId." ORDER BY al.Apply_Date DESC LIMIT ".$from.",".$offset, $con); }else{ $sql_statement = mysql_query("SELECT al.*,EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,Gender,DR,Married FROM ".$AppLeaveTable." al INNER JOIN hrm_employee e ON al.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON al.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON al.EmployeeID=p.EmployeeID where (al.LeaveStatus=0 OR al.LeaveStatus=1) AND al.Apply_FromDate>='".date($_REQUEST['yly']."-".$_REQUEST['mlm']."-01")."' AND al.Apply_FromDate<='".date($_REQUEST['yly']."-".$_REQUEST['mlm']."-31")."' AND e.CompanyId=".$CompanyId." ORDER BY al.Apply_Date DESC LIMIT ".$from.",".$offset, $con); } 
}
elseif($_REQUEST['ls']==4)
{ 
 if($_REQUEST['mlm']=='All'){ $sql_statement = mysql_query("SELECT al.*,EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,Gender,DR,Married FROM ".$AppLeaveTable." al INNER JOIN hrm_employee e ON al.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON al.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON al.EmployeeID=p.EmployeeID where al.LeaveEmpCancelStatus='Y' AND al.Apply_FromDate>='".date($_REQUEST['yly']."-01-01")."' AND al.Apply_FromDate<='".date($_REQUEST['yly']."-12-31")."' AND e.CompanyId=".$CompanyId." ORDER BY al.Apply_FromDate DESC", $con); }else{ $sql_statement = mysql_query("SELECT al.*,EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,Gender,DR,Married FROM ".$AppLeaveTable." al INNER JOIN hrm_employee e ON al.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON al.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON al.EmployeeID=p.EmployeeID where al.LeaveEmpCancelStatus='Y' AND al.Apply_FromDate>='".date($_REQUEST['yly']."-".$_REQUEST['mlm']."-01")."' AND al.Apply_FromDate<='".date($_REQUEST['yly']."-".$_REQUEST['mlm']."-31")."' AND e.CompanyId=".$CompanyId." ORDER BY al.Apply_FromDate DESC", $con); } 
}
else 
{ 
 if($_REQUEST['mlm']=='All'){ $sql_statement = mysql_query("SELECT al.*,EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,Gender,DR,Married FROM ".$AppLeaveTable." al INNER JOIN hrm_employee e ON al.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON al.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON al.EmployeeID=p.EmployeeID where al.LeaveStatus=".$_REQUEST['ls']." AND al.Apply_FromDate>='".date($_REQUEST['yly']."-01-01")."' AND al.Apply_FromDate<='".date($_REQUEST['yly']."-12-31")."' AND e.CompanyId=".$CompanyId." ORDER BY al.Apply_FromDate DESC LIMIT ".$from.",".$offset, $con); }else{ $sql_statement = mysql_query("SELECT al.*,EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,Gender,DR,Married FROM ".$AppLeaveTable." al INNER JOIN hrm_employee e ON al.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON al.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON al.EmployeeID=p.EmployeeID where al.LeaveStatus=".$_REQUEST['ls']." AND al.Apply_FromDate>='".date($_REQUEST['yly']."-".$_REQUEST['mlm']."-01")."' AND al.Apply_FromDate<='".date($_REQUEST['yly']."-".$_REQUEST['mlm']."-31")."' AND e.CompanyId=".$CompanyId." ORDER BY al.Apply_FromDate DESC LIMIT ".$from.",".$offset, $con); } 
}


$sno=1; while($resL=mysql_fetch_array($sql_statement)) 
{ $EmpName=$resL['Fname'].' '.$resL['Sname'].' '.$resL['Lname']; 
$sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resL['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD); ?>	
<tr bgcolor="#FFFFFF">
<td class="hd2" align="center"><?php echo $resL['EmpCode']; ?></td>
<td class="hd2" align="left">&nbsp;<?php echo $EmpName; ?></td>			   
<td class="hd2" align="left">&nbsp;<?php echo $resD['DepartmentCode']; ?></td>
<td class="hd2" align="center" bgcolor="#FFE1C4"><?php echo $resL['Leave_Type']; ?></td>
<td class="hd2" align="center" bgcolor="#BFFF80"><?php if($_REQUEST['ls']==4 AND $resL['LeaveEmpCancelStatus']=='Y'){ if($resL['LeaveCancelStatus']=='N' AND $resL['LeaveStatus']!='4'){echo 'Applied For Cancelation';}elseif($resL['LeaveCancelStatus']=='Y' AND $resL['LeaveStatus']=='4'){echo 'Canceled';} }else{ if($resL['LeaveStatus']=='0'){echo 'Draft';} elseif($resL['LeaveStatus']=='1'){echo 'Pending';} elseif($resL['LeaveStatus']=='2'){echo 'Approved';} elseif($resL['LeaveStatus']=='3'){echo 'DisApproved';}elseif($resL['LeaveStatus']=='4'){echo 'Canceled';} } ?></td>

<?php /*<td class="hd2" align="center" bgcolor="#BFFF80"><?php if($resL['LeaveStatus']=='0'){echo 'Draft';} elseif($resL['LeaveStatus']=='1'){echo 'Pending';} elseif($resL['LeaveStatus']=='2'){echo 'Approved';} elseif($resL['LeaveStatus']=='3'){echo 'DisApproved';}elseif($resL['LeaveStatus']=='4'){echo 'Canceled';} ?></td> */ ?>

<td class="hd2" align="center"><?php echo date("d-M-y",strtotime($resL['Apply_Date'])); ?></td>
<td class="hd2" align="center" bgcolor="#B3D9FF"><?php echo date("d-M-y",strtotime($resL['Apply_FromDate'])); ?></td>
<td class="hd2" align="center" bgcolor="#B3D9FF"><?php echo date("d-M-y",strtotime($resL['Apply_ToDate'])); ?></td>
<td class="hd2" align="center" bgcolor="#FFE1C4"><?php echo $resL['Apply_TotalDay']; ?></td>
<td class="hd2" align="center"><?php if($resL['LeaveEmpCancelStatus']!='Y'){ if($resL['LeaveAppStatus']=='0'){echo 'Draft';} elseif($resL['LeaveAppStatus']=='1'){echo 'Pending';} elseif($resL['LeaveAppStatus']=='2'){echo 'Approved';} elseif($resL['LeaveAppStatus']=='3'){echo 'DisApproved';} } ?></td>
<td class="hd2" align="center"><?php if($resL['LeaveEmpCancelStatus']!='Y'){ if($resL['Leave_Type']=='PL'){ if($resL['LeaveHodStatus']=='0'){echo 'Draft';} elseif($resL['LeaveHodStatus']=='1'){echo 'Pending';} elseif($resL['LeaveHodStatus']=='2'){echo 'Approved';} elseif($resL['LeaveHodStatus']=='3'){echo 'DisApproved';} } else {echo '&nbsp;';} } ?></td>
<td class="hd2" align="center"><a href="javascript:OpenWindow(<?php echo $resL['ApplyLeaveId']; ?>,'<?php echo $AppLeaveTable; ?>')">Details</a></td>

<?php if($_SESSION['User_Permission']=='Edit'){?>
<?php if($_REQUEST['ls']==0 OR $_REQUEST['ls']==1 OR $_REQUEST['ls']==10){ ?>
<td width="100" class="TableHead1" align="center"> 
<select name="ActionReplyQ" id="ActionReplyQ" style="font-family:Times New Roman; height:20px; width:95px; color:#000000; font-size:13px;" onChange="ChangeLStatus(this.value,<?php echo $resL['ApplyLeaveId']; ?>,'<?php echo $resL['Leave_Type']; ?>','<?php echo $resL['Apply_FromDate']; ?>','<?php echo $resL['Apply_ToDate']; ?>',<?php echo $resL['Apply_TotalDay'].', '.$resL['EmployeeID'].', '.$page.', '.$resL['Apply_SentToApp'].', '.$resL['Apply_SentToHOD'].', '.$UserId; ?>)">
<option value="0">Select</option> 
<?php /* if($resL['LeaveAppStatus']!=1){ ?><option value="1" style="background-color:#FFFFFF;">Pending</option><?php } */ ?>
<option value="2" style="background-color:#FFFFFF;">Approved</option> 
<option value="22" style="background-color:#FFFFFF;">Partially Approved</option> 
<option value="3" style="background-color:#FFFFFF;">Dis-approved</option> 
</select></td>
<?php } else { ?>
<td style="width:200px;" class="hd2" align="center" valign="top">
<?php if($resL['UserId']>0) {?><input style="width:198px;height:20px;background-color:#E2FFC6;" value="<?php echo $resL['AdminComment']; ?>" readonly/><?php } ?></td>
<?php } ?>
<?php } ?>
</tr>					   
<?php $sno++; } ?>          
					 </table>
				  </td>
			   </tr>
<tr>
<td align="center" colspan="13" style="font-family:Times New Roman;font-size:15px;font-weight:bold;">
<?PHP doPages($offset, 'ApplyLeave.php', '', $total_records); ?></td>
</tr>  			   
			   
			  <tr>
			     <td align="left" class="fontButton" colspan="2">
				   <table border="0" width="100%">
		             <tr>
		              <td align="right" id="SaveC" style="display:none;">&nbsp;</td>
		            </tr>
		          </table>
                </td>
				   </tr>
	        </table>
			</form>
      </td>
<?php //*********************** All Leave Close*********************************?> 	  
	  
   </tr>
  </table>        
   </td>
     

 </tr>
<?php } ?> 
</table>
		
<?php //*******************************************************************/ ?>
<?php /***********END*****END*****END******END******END*******************************/ ?>
<?php //*************************************************************************************/ ?>
		
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
<?php
function check_integer($which) {
if(isset($_REQUEST[$which])){
if (intval($_REQUEST[$which])>0) {
return intval($_REQUEST[$which]);
} else {
return false;
}
}
return false;
}
function get_current_page() {
if(($var=check_integer('page'))) {
return $var;
} else {
//return 1, if it wasnt set before, page=1
return 1;
}
}
function doPages($page_size, $thepage, $query_string, $total=0) {
$index_limit = 10;
$query='';
if(strlen($query_string)>0){
$query = "&amp;".$query_string;
}
$current = get_current_page();
$total_pages=ceil($total/$page_size);
$start=max($current-intval($index_limit/2), 1);
$end=$start+$index_limit-1;
echo '<div class="paging">';
if($current==1) {
echo '<span class="prn">&lt; Previous</span>&nbsp;';
} else {
$i = $current-1;
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&yly='.$_REQUEST['yly'].'&mlm='.$_REQUEST['mlm'].'&ee=we23&er=1013&rr=wew101" class="prn" rel="nofollow" title="go to page '.$i.'">&lt; Previous</a>&nbsp;';
echo '<span class="prn">...</span>&nbsp;';
}
if($start > 1) {
$i = 1;
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&yly='.$_REQUEST['yly'].'&mlm='.$_REQUEST['mlm'].'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
for ($i = $start; $i <= $end && $i <= $total_pages; $i++){
if($i==$current) {
echo '<span>'.$i.'</span>&nbsp;';
} else {
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&yly='.$_REQUEST['yly'].'&mlm='.$_REQUEST['mlm'].'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
}
if($total_pages > $end){
$i = $total_pages;
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&yly='.$_REQUEST['yly'].'&mlm='.$_REQUEST['mlm'].'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
if($current < $total_pages) {
$i = $current+1;
echo '<span class="prn">...</span>&nbsp;';
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&yly='.$_REQUEST['yly'].'&mlm='.$_REQUEST['mlm'].'&ee=we23&er=1013&rr=wew101" class="prn" rel="nofollow" title="go to page '.$i.'">Next &gt;</a>&nbsp;';
} else {
echo '<span class="prn">Next &gt;</span>&nbsp;';
}
if ($total != 0){
//prints the total result count just below the paging
echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ee4545"<h4>(Total '.$total.' Records)</h></div>';
}
}
?>       