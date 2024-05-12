<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.cell {color:#FFFFFF;font-family:Times New Roman;font-size:14px;font-weight:bold; text-align:center;} 
.cell2 {color:#000;font-family:Times New Roman;font-size:12px;} .cell3 {color:#030303;font-family:Times New Roman;font-size:14px; font-weight:bold;} 
.cellOpe {color:#FFFFFF;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe2 {color:#000;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold; text-align:center;}
.cellOpe3 {color:#000;font-family:Times New Roman; width:30px;height:20px; font-size:14px; font-weight:bold;}
/*.inner_table{height:450px;overflow-y:auto;width:auto;}*/
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/MasterAjaxCall.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<!--<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>-->
<script type="text/javascript" language="javascript">
//$(document).ready(function () { $("#table1").freezeHeader({ 'height': '500px' }); })
/*function SelectMonth(v,y,d)
{ var x='AttendanceBlank.php?ls=10&wer=123grtd&se=reew&w=ee102&m='+v+'&Y='+y+'&ee=s1s&d='+d+'&dd=truevalu&fals=truefalse'; window.location=x; }
function SelectYear(v,m,d)
{ var x='AttendanceBlank.php?ls=10&wer=123grtd&se=reew&w=ee102&m='+m+'&Y='+v+'&ee=s1s&d='+d+'&dd=truevalu&fals=truefalse'; window.location=x; }
function SelectDept(v,m,y)
{ var x='AttendanceBlank.php?ls=10&wer=123grtd&se=reew&w=ee102&m='+m+'&Y='+y+'&ee=s1s&d='+v+'&dd=truevalu&fals=truefalse'; window.location=x; } */


function FunClick()  
{
 if(document.getElementById("Month").value==''){alert("select month!"); return false;}
 else if(document.getElementById("Year").value==''){alert("select year!"); return false;}
 else if(document.getElementById("Department").value==''){alert("select department!"); return false;}
 else{ window.location='AttendanceBlank.php?ls=10&wer=123grtd&se=reew&w=ee102&m='+document.getElementById("Month").value+'&Y='+document.getElementById("Year").value+'&ee=s1s&d='+document.getElementById("Department").value+'&dd=truevalu&fals=truefalse'; }
}


function ClickEdit(ei,m,y)
{ var Ci=document.getElementById("ColNo").value; document.getElementById(ei+"_BtnEdit").style.display='none'; document.getElementById(ei+"_BtnSave").style.display='block'; 
 for(var i=1; i<=Ci; i++){document.getElementById(ei+"_"+i).disabled=false; document.getElementById("btnTd_"+ei).style.background='#59B300'; }
}


function ClickSave(ei,m,y,yi)
{  var E1=document.getElementById(ei+"_1").value; var E2=document.getElementById(ei+"_2").value; var E3=document.getElementById(ei+"_3").value; 
   var E4=document.getElementById(ei+"_4").value; var E5=document.getElementById(ei+"_5").value; var E6=document.getElementById(ei+"_6").value;
   var E7=document.getElementById(ei+"_7").value; var E8=document.getElementById(ei+"_8").value; var E9=document.getElementById(ei+"_9").value;
   var E10=document.getElementById(ei+"_10").value; var E11=document.getElementById(ei+"_11").value; var E12=document.getElementById(ei+"_12").value;
   var E13=document.getElementById(ei+"_13").value; var E14=document.getElementById(ei+"_14").value; var E15=document.getElementById(ei+"_15").value;
   var E16=document.getElementById(ei+"_16").value; var E17=document.getElementById(ei+"_17").value; var E18=document.getElementById(ei+"_18").value;
   var E19=document.getElementById(ei+"_19").value; var E20=document.getElementById(ei+"_20").value; var E21=document.getElementById(ei+"_21").value;
   var E22=document.getElementById(ei+"_22").value; var E23=document.getElementById(ei+"_23").value; var E24=document.getElementById(ei+"_24").value;
   var E25=document.getElementById(ei+"_25").value; var E26=document.getElementById(ei+"_26").value; var E27=document.getElementById(ei+"_27").value;
   var E28=document.getElementById(ei+"_28").value;
   var Ci=document.getElementById("ColNo").value;
   if(Ci==28){var url = 'AddAtt.php';	var pars = 'action=add&m='+m+'&y='+y+'&ei='+ei+'&e_1='+E1+'&e_2='+E2+'&e_3='+E3+'&e_4='+E4+'&e_5='+E5+'&e_6='+E6+'&e_7='+E7+'&e_8='+E8+'&e_9='+E9+'&e_10='+E10+'&e_11='+E11+'&e_12='+E12+'&e_13='+E13+'&e_14='+E14+'&e_15='+E15+'&e_16='+E16+'&e_17='+E17+'&e_18='+E18+'&e_19='+E19+'&e_20='+E20+'&e_21='+E21+'&e_22='+E22+'&e_23='+E23+'&e_24='+E24+'&e_25='+E25+'&e_26='+E26+'&e_27='+E27+'&e_28='+E28+'&Ci='+Ci+'&yi='+yi; var myAjax = new Ajax.Request(
   url, { 	method: 'post',  parameters: pars, 	onComplete: show_EditAttendance });
   }
   if(Ci==29){var E29=document.getElementById(ei+"_29").value;
   var url = 'AddAtt.php';	var pars = 'action=add&m='+m+'&y='+y+'&ei='+ei+'&e_1='+E1+'&e_2='+E2+'&e_3='+E3+'&e_4='+E4+'&e_5='+E5+'&e_6='+E6+'&e_7='+E7+'&e_8='+E8+'&e_9='+E9+'&e_10='+E10+'&e_11='+E11+'&e_12='+E12+'&e_13='+E13+'&e_14='+E14+'&e_15='+E15+'&e_16='+E16+'&e_17='+E17+'&e_18='+E18+'&e_19='+E19+'&e_20='+E20+'&e_21='+E21+'&e_22='+E22+'&e_23='+E23+'&e_24='+E24+'&e_25='+E25+'&e_26='+E26+'&e_27='+E27+'&e_28='+E28+'&e_29='+E29+'&Ci='+Ci+'&yi='+yi; var myAjax = new Ajax.Request(
   url, { 	method: 'post',  parameters: pars, 	onComplete: show_EditAttendance });
   }
   else if(Ci==30){var E29=document.getElementById(ei+"_29").value; var E30=document.getElementById(ei+"_30").value;
   var url = 'AddAtt.php';	var pars = 'action=add&m='+m+'&y='+y+'&ei='+ei+'&e_1='+E1+'&e_2='+E2+'&e_3='+E3+'&e_4='+E4+'&e_5='+E5+'&e_6='+E6+'&e_7='+E7+'&e_8='+E8+'&e_9='+E9+'&e_10='+E10+'&e_11='+E11+'&e_12='+E12+'&e_13='+E13+'&e_14='+E14+'&e_15='+E15+'&e_16='+E16+'&e_17='+E17+'&e_18='+E18+'&e_19='+E19+'&e_20='+E20+'&e_21='+E21+'&e_22='+E22+'&e_23='+E23+'&e_24='+E24+'&e_25='+E25+'&e_26='+E26+'&e_27='+E27+'&e_28='+E28+'&e_29='+E29+'&e_30='+E30+'&Ci='+Ci+'&yi='+yi; var myAjax = new Ajax.Request(
   url, { 	method: 'post',  parameters: pars, 	onComplete: show_EditAttendance });
   }
   else if(Ci==31){var E29=document.getElementById(ei+"_29").value; var E30=document.getElementById(ei+"_30").value; var E31=document.getElementById(ei+"_31").value; 
   var url = 'AddAtt.php';	var pars = 'action=add&m='+m+'&y='+y+'&ei='+ei+'&e1='+ei+'&e_1='+E1+'&e_2='+E2+'&e_3='+E3+'&e_4='+E4+'&e_5='+E5+'&e_6='+E6+'&e_7='+E7+'&e_8='+E8+'&e_9='+E9+'&e_10='+E10+'&e_11='+E11+'&e_12='+E12+'&e_13='+E13+'&e_14='+E14+'&e_15='+E15+'&e_16='+E16+'&e_17='+E17+'&e_18='+E18+'&e_19='+E19+'&e_20='+E20+'&e_21='+E21+'&e_22='+E22+'&e_23='+E23+'&e_24='+E24+'&e_25='+E25+'&e_26='+E26+'&e_27='+E27+'&e_28='+E28+'&e_29='+E29+'&e_30='+E30+'&e_31='+E31+'&Ci='+Ci+'&yi='+yi; var myAjax = new Ajax.Request(
   url, { 	method: 'post',  parameters: pars, 	onComplete: show_EditAttendance });
   }
}

function show_EditAttendance(originalRequest)
{ document.getElementById('AttMsgSpan').innerHTML = originalRequest.responseText; var ei=document.getElementById("ei").value; 
  document.getElementById(ei+"_BtnEdit").style.display='block'; document.getElementById(ei+"_BtnSave").style.display='none';
  document.getElementById("btnTd_"+ei).style.background='#FFFFFF';
}

function FunClrCheck(v)
{ 
 if(document.getElementById("ClrCheck_"+v).checked==true)
 { document.getElementById("tr_"+v).style.background='#0080FF'; document.getElementById("tdcheck_"+v).style.background='#0080FF'; } 
 else if(document.getElementById("ClrCheck_"+v).checked==false)
 { 
  if(v%2!=0)
  { document.getElementById("tr_"+v).style.background='#D9D1E7'; document.getElementById("tdcheck_"+v).style.background='#D9D1E7'; }
  else if(v%2==0)
  { document.getElementById("tr_"+v).style.background='#FFFFFF'; document.getElementById("tdcheck_"+v).style.background='#FFFFFF'; }
 }
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
	  <td valign="top" align="left"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //*********************************************************************************************?>
<?php //***************START*****START*****START******START******START*********************?>
<?php //***********************************************************************************?>	  
<table border="0" style="margin-top:0px; width:100%; height:350px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
<input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
<span id="AttMsgSpan"></span>
   <table border="0">
    <tr>
	  <td align="left" width="150">&nbsp;<font color="#2D002D" style='font-family:Times New Roman;' size="4"><b>Attendance :</b></font></td>
	  <td width="90%">
	    <table border="0">
		 <tr>
		   <td class="td1" style="font-size:11px;" align="center">	  
		   <select style="font-size:11px; width:100px; height:19px; background-color:#DDFFBB; display:block;" name="Month" id="Month" onChange="SelectMonth(this.value, <?php echo $_REQUEST['Y'].', '.$_REQUEST['d']; ?>)"><option value="<?php echo $_REQUEST['m']; ?>"><?php echo date("F",strtotime(date("Y-".$_REQUEST['m']."-d"))); ?></option>
		   <option value="1">JANUARY</option><option value="2">FEBRUARY</option><option value="3">MARCH</option><option value="4">APRIL</option><option value="5">MAY</option><option value="6">JUNE</option><option value="7">JULY</option><option value="8">AUGUST</option><option value="9">SEPTEMBER</option><option value="10">OCTOBER</option><option value="11">NOVEMBER</option><option value="12">DECEMBER</option></select></td>
		   
		   <td style="width:60px;"><select style="font-size:12px; width:60px; height:20px;background-color:#DDFFBB" name="Year" id="Year" onChange="SelectYear(this.value, <?php echo $_REQUEST['m'].', '.$_REQUEST['d']; ?>)">
	       <option value="<?php echo $_REQUEST['Y']; ?>"><?php echo $_REQUEST['Y']; ?></option>
               <?php for($i=date("Y"); $i>=2013; $i--){ ?>
<?php if($_REQUEST['Y']!=$i){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?>
<?php } ?></select></td> 
		   <td class="td1" style="font-size:11px;"> 
		   <select style="font-size:11px; width:100px; height:19px; background-color:#DDFFBB; display:block;" name="Department" id="Department" onChange="SelectDept(this.value, <?php echo $_REQUEST['m'].', '.$_REQUEST['Y']; ?>)">
<?php $SqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['d'], $con); $ResD=mysql_fetch_array($SqlD);?>	
	       <option value="<?php echo $_REQUEST['d']; ?>"><?php echo $ResD['DepartmentCode']; ?></option>
<?php $SqlD2=mysql_query("select DepartmentId,DepartmentCode from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' order by DepartmentCode ASC", $con); 
      while($ResD2=mysql_fetch_array($SqlD2)) { ?><option value="<?php echo $ResD2['DepartmentId']; ?>"><?php echo $ResD2['DepartmentCode'];?></option><?php } ?></select></td>
	      <td><input type="button" value="click" style="width:60px;" onClick="FunClick()" /></td>
	      <td align="left"><input type="button" name="back" id="back" style="width:90px;display:block;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"></td>
   <td align="left" style="width:70px;"><input type="button" name="Refresh" id="Refresh" style="width:90px;" value="Refresh" onClick="javascript:window.location='AttendanceBlank.php?ls=10&wer=123grtd&se=reew&w=ee102&m=<?php echo $_REQUEST['m']; ?>&Y=<?php echo $_REQUEST['Y']; ?>&ee=s1s&d=<?php echo $_REQUEST['d']; ?>&dd=truevalu&fals=truefalse'"/></td> 
		  
		  <td align="left" class="cell3" style="background-color:#FFFF6C;text-align:center;width:200px;">Submission of Resignation</td>
		  
		  <td width="700" align="left" class="cell3">&nbsp;&nbsp;&nbsp;
		  <?php /*<font color="#0080FF">P</font> - Present, <font color="#0080FF">A</font>- Absent,
		  <font color="#0080FF">CH</font>– Half day CL, <font color="#0080FF">SH</font>- Half day SL, <font color="#0080FF">H</font>- Holiday,  
		  
		  <font color="#0080FF">OD</font>- Outdoor Duties */ ?><?php $m=$_REQUEST['m']; $Y=$_REQUEST['Y']; ?></td>
	   </tr>
         </table>
	  </td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { 

$ExpMonthDate=date('Y-m-d', strtotime("-2 months", strtotime(date("Y-m-d")))); $pp=strtotime($ExpMonthDate);
$ExpMonth=date('m', strtotime("-2 months", strtotime(date("Y-m-d"))));
$ExpYear=date('Y', strtotime("-2 months", strtotime(date("Y-m-d"))));

$BY=date("Y")-1;
if($_REQUEST['Y']>=date("Y"))
{ $AttTable='hrm_employee_attendance'; $LeaveTable='hrm_employee_monthlyleave_balance';
  $AppLeaveTable='hrm_employee_applyleave'; $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y']; }
elseif($_REQUEST['Y']==$BY AND date("m")=='01' AND $_REQUEST['m']==12)
{ $AttTable='hrm_employee_attendance'; $LeaveTable='hrm_employee_monthlyleave_balance';
  $AppLeaveTable='hrm_employee_applyleave'; $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y']; }
elseif($_REQUEST['Y']==$BY AND $_REQUEST['m']<12)
{ $AttTable='hrm_employee_attendance'; $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['Y']; 
  $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y']; $AppLeaveTable='hrm_employee_applyleave_'.$_REQUEST['Y']; }
else
{$AttTable='hrm_employee_attendance'; $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['Y']; 
 $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y']; $AppLeaveTable='hrm_employee_applyleave_'.$_REQUEST['Y']; }

?>	
 <tr>
<?php //************************** Open ************************* ?> 
<td align="left" id="type" valign="top" width="100%">             
<form method="post" name="FormAtt" onSubmit="return validate(this)">
<table border="0" cellpadding="0" cellspacing="0">
 <tr>
  <td>
  <table border="1" id="table1" cellpadding="0" cellspacing="0" style="margin-top:opx;width:1450px;">
  <div class="thead">
  <thead>
   <tr bgcolor="#7a6189">	 	
    <td rowspan="2" class="cell" style="width:30px;"><b>Sn</b></td> 
    <td rowspan="2" class="cell" style="width:30px;"><b>EC</b></td>
    <td rowspan="2" class="cell" style="width:180px;"><b>Name</b></td>
    <td class="cell" colspan="31" style="text-align:left;">&nbsp;&nbsp;<b>Month :&nbsp;<font color="#EAEF18"><?php echo date("F",strtotime(date("Y-".$_REQUEST['m']."-d"))); ?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Department :&nbsp;<font color="#EAEF18"><?php echo $ResD['DepartmentCode']; ?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year :&nbsp;<font color="#EAEF18"><?php echo $_REQUEST['Y']; ?></font></b></td>
   </tr>
   <tr bgcolor="#7a6189">	 
    <?php for($i=1; $i<=date("t",strtotime(date("Y-".$_REQUEST['m']."-d"))); $i++) { ?>
 <td style="width:35px;" class="cell" <?php if(date("w",strtotime(date($Y.'-'.$m.'-'.$i)))==0){echo 'bgcolor="#6B983A"';}?>><?php echo $i;?></td>
	<?php } $Ci=$i-1; echo '<input type="hidden" id="ColNo" value="'.$Ci.'" />'; ?>
   </tr>
  </thead>
  </div>
<?php if($_REQUEST['d']==''){$_REQUEST['d']=0;}

$sql_statement=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentId from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.EmpStatus='A' AND g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$CompanyId." order by e.EmpCode ASC", $con); 

$total_records = mysql_num_rows($sql_statement);
if(isset($_GET['page'])) $page = $_GET['page']; else $page = 1;
$offset = 20;
if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0; }

$SqlEmp=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentId from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.EmpStatus='A' AND g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$CompanyId." order by e.EmpCode ASC LIMIT ".$from.",".$offset, $con);

if($_GET['page']=='' OR $_GET['page']==0 OR $_GET['page']==1){ $Sno = 1; }
else{ $Sno = 20*($_GET['page']-1)+1; } 

$SqlRows=mysql_num_rows($SqlEmp); echo '<input type="hidden" name="EmpRows" id="EmpRows" value='.$SqlRows.' />';  while($ResEmp=mysql_fetch_array($SqlEmp)){ $ename=$ResEmp['Fname'].' '.$ResEmp['Sname'].' '.$ResEmp['Lname']; 

$sqlch=mysql_query("select * from hrm_employee_separation where EmployeeID=".$ResEmp['EmployeeID']." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con); $rowch=mysql_num_rows($sqlch);

?>		
  <div class="tbody">
  <tbody>
   <tr id="tr_<?php echo $Sno; ?>" style="background-color:<?php if($rowch>0){echo '#FFFF6C';}else{echo '#FFFFFF';} ?>;">
    <td class="cell2" align="center" id="tdSn_<?php echo $Sno;?>"><?php echo $Sno; ?></td>
	<td class="cell2" align="center" id="tdcheck_<?php echo $Sno;?>"><?php echo $ResEmp['EmpCode']; ?></td>
    <td class="cell2" style="text-transform:capitalize;"><?php echo strtolower($ename); ?>
	 <input type="checkbox" id="ClrCheck_<?php echo $Sno; ?>" onClick="FunClrCheck(<?php echo $Sno; ?>)"/>
	 <input type="hidden" name="EmpId" id="EmpId" value="<?php echo $ResEmp['EmployeeID']; ?>" /></td>	
   
    <?php $PreMonth=$ExpMDate=date('m', strtotime("-1 months", strtotime(date("Y-".date("m")."-d")))); ?>

    <?php for($i=1; $i<=date("t",strtotime(date("Y-".$_REQUEST['m']."-d"))); $i++) { 
	
	$tt=strtotime(date($Y."-".$m."-".$i)); 
	if($tt<$pp){$tab=$AttTable2; }else{$tab=$AttTable; }
	
	$SqlEmp2=mysql_query("SELECT * FROM ".$tab." WHERE EmployeeID=".$ResEmp['EmployeeID']." AND AttDate='".date($Y."-".$m."-".$i)."'", $con); $RowEmp2=mysql_num_rows($SqlEmp2); $SqlAppL=mysql_query("SELECT Leave_Type,LeaveStatus FROM ".$AppLeaveTable." WHERE EmployeeID=".$ResEmp['EmployeeID']." AND '".date($Y."-".$m."-".$i)."'>=Apply_FromDate AND '".date($Y."-".$m."-".$i)."'<=Apply_ToDate AND LeaveStatus!=3 AND LeaveCancelStatus!='Y'", $con); $RowAppL=mysql_num_rows($SqlAppL); ?>
    <td style="width:35px;background-color:<?php if(date("w",strtotime(date($Y.'-'.$m.'-'.$i)))==0) { echo '#6B983A'; } elseif($RowEmp2==0 AND $RowAppL==0){echo '#FF0000';}else{echo '#FFFFFF';} ?>" id="TDId_<?php echo $i.'_'.$Sno; ?>">&nbsp;</td>
	 <?php } ?>
    </tr>
   </tbody>
   </div>
<?php $Sno++; } $sn=$Sno-1; ?><input type="hidden" id="TRSr" value="<?php echo $sn; ?>" />

   </table>
  </td>
 </tr>
 <tr>
 <td align="center" colspan="10" style="font-family:Times New Roman;font-size:15px;font-weight:bold;">
  <?PHP doPages($offset, 'AttendanceBlank.php', '', $total_records); ?></td>
 </tr>
 
 </table>
 </form>     
</td>
<?php //********************** Close ************************************?>    
  
 </tr>
<?php } ?> 
</table>
		
<?php //*****************************************************************************************?>
<?php //**********END*****END*****END******END******END************************?>
<?php //***************************************************************************************?>
		
	  </td>
	</tr>
	
	<?php /*?><tr>
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
	</tr><?php */?>
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
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&wer=123grtd&se=reew&w=ee102&m='.$_REQUEST['m'].'&Y='.$_REQUEST['Y'].'&ee=s1s&d='.$_REQUEST['d'].'&trt=1f&tt=345&dd=truevalu&fals=truefalse" class="prn" rel="nofollow" title="go to page '.$i.'">&lt; Previous</a>&nbsp;';
echo '<span class="prn">...</span>&nbsp;';
}
if($start > 1) {
$i = 1;
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&wer=123grtd&se=reew&w=ee102&m='.$_REQUEST['m'].'&Y='.$_REQUEST['Y'].'&ee=s1s&d='.$_REQUEST['d'].'&trt=1f&tt=345&dd=truevalu&fals=truefalse" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
for ($i = $start; $i <= $end && $i <= $total_pages; $i++){
if($i==$current) {
echo '<span>'.$i.'</span>&nbsp;';
} else {
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&wer=123grtd&se=reew&w=ee102&m='.$_REQUEST['m'].'&Y='.$_REQUEST['Y'].'&ee=s1s&d='.$_REQUEST['d'].'&trt=1f&tt=345&dd=truevalu&fals=truefalse" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
}
if($total_pages > $end){
$i = $total_pages;
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&wer=123grtd&se=reew&w=ee102&m='.$_REQUEST['m'].'&Y='.$_REQUEST['Y'].'&ee=s1s&d='.$_REQUEST['d'].'&trt=1f&tt=345&dd=truevalu&fals=truefalse" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
if($current < $total_pages) {
$i = $current+1;
echo '<span class="prn">...</span>&nbsp;';
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&wer=123grtd&se=reew&w=ee102&m='.$_REQUEST['m'].'&Y='.$_REQUEST['Y'].'&ee=s1s&d='.$_REQUEST['d'].'&trt=1f&tt=345&dd=truevalu&fals=truefalse" class="prn" rel="nofollow" title="go to page '.$i.'">Next &gt;</a>&nbsp;';
} else {
echo '<span class="prn">Next &gt;</span>&nbsp;';
}
if ($total != 0){
//prints the total result count just below the paging
echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ee4545"<h4>(Total '.$total.' Records)</h></div>';
}
}
?> 