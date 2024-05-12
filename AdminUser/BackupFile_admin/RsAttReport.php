<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
require_once('PhpFile/AttendanceP.php');
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.ht{background-color:#7a6189;color:#FFFFFF;font-family:Times New Roman;font-size:13px;text-align:center;} 
.td{color:#000;font-family:Times New Roman;font-size:12px;text-align:center;}
.tdl{color:#000;font-family:Times New Roman;font-size:12px;}
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.cell {color:#FFFFFF;font-family:Times New Roman;font-size:14px;font-weight:bold;} 
.cell2 {color:#000;font-family:Times New Roman;font-size:14px;text-align:center;} .cell3 {color:#030303;font-family:Times New Roman;font-size:14px; font-weight:bold;} 
.cellOpe{color:#FFFFFF;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe2{color:#000;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;text-align:center;}
.cellOpe3{color:#000;font-family:Times New Roman; width:30px;height:20px; font-size:14px; font-weight:bold;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/MasterAjaxCall.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script type="text/javascript" src=""></script>
<script type="text/javascript" language="javascript">
/*function SelectMonth(value) 
{ var D = document.getElementById("Department").value; var Y = document.getElementById("Year").value; var rpi = document.getElementById("rpi").value;
  var x = 'RsAttReport.php?m='+value+'&D='+D+'&Y='+Y+'&rpi='+rpi; window.location=x;}

function SelectYear(value,m) 
{ var D = document.getElementById("Department").value; var rpi = document.getElementById("rpi").value;  
  var x = 'RsAttReport.php?m='+m+'&D='+D+'&Y='+value+'&rpi='+rpi; window.location=x;}
								  
function SelectMonthDept(value)
{ var M = document.getElementById("Month").value; var Y = document.getElementById("Year").value; var rpi = document.getElementById("rpi").value;  
  var x = 'RsAttReport.php?m='+M+'&D='+value+'&Y='+Y+'&rpi='+rpi; window.location=x; }

function Selectrpi(value,M,D,Y)
{ var x = 'RsAttReport.php?m='+M+'&D='+D+'&Y='+Y+'&rpi='+value; window.location=x; }*/

function FunClick()  
{
 if(document.getElementById("Month").value==''){alert("select month!"); return false;}
 else if(document.getElementById("Year").value==''){alert("select year!"); return false;}
 else if(document.getElementById("Department").value==''){alert("select department!"); return false;}
 else{ window.location='RsAttReport.php?ls=10&wer=123grtd&se=reew&w=ee102&m='+document.getElementById("Month").value+'&D='+document.getElementById("Department").value+'&Y='+document.getElementById("Year").value+'&rpi='+document.getElementById("rpi").value+'&dd=truevalu&fals=truefalse&acttc=opentbl&OldNew='+document.getElementById("OldNew").value; }
}


function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#9BEF47'; }
  else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; }
}

function Export(c,m,d,y,rpi,oldnew)
{ window.open("RsAttReportsExport.php?action=RsAttExport&ty=0&c="+c+"&m="+m+"&D="+d+"&Y="+y+"&rpi="+rpi+"&OldNew="+oldnew,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}

function ExportA1(c,m,d,y,rpi,oldnew)
{ window.open("RsAttReportsExport.php?action=RsAttExport&ty=1&c="+c+"&m="+m+"&D="+d+"&Y="+y+"&rpi="+rpi+"&OldNew="+oldnew,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}

function ExportA2(c,m,d,y,rpi,oldnew)
{ window.open("RsAttReportsExport.php?action=RsAttExport&ty=2&c="+c+"&m="+m+"&D="+d+"&Y="+y+"&rpi="+rpi+"&OldNew="+oldnew,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}

function ExportA3(c,m,d,y,rpi,oldnew)
{ window.open("RsAttReportsExport.php?action=RsAttExport&ty=3&c="+c+"&m="+m+"&D="+d+"&Y="+y+"&rpi="+rpi+"&OldNew="+oldnew,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}

function ExportA4(c,m,d,y,rpi,oldnew)
{ window.open("RsAttReportsExport.php?action=RsAttExport&ty=4&c="+c+"&m="+m+"&D="+d+"&Y="+y+"&rpi="+rpi+"&OldNew="+oldnew,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}

function ExportA5(c,m,d,y,rpi,oldnew)
{ window.open("RsAttReportsExport.php?action=RsAttExport&ty=5&c="+c+"&m="+m+"&D="+d+"&Y="+y+"&rpi="+rpi+"&OldNew="+oldnew,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}


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
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //****************************************************************************************?>
<?php //**********START*****START*****START******START******START***************************?>
<?php //*********************************************************************************?>
<?php if($_REQUEST['m']==1){$SelM='January';} if($_REQUEST['m']==2){$SelM='February';} if($_REQUEST['m']==3){$SelM='March';}if($_REQUEST['m']==4){$SelM='April';} 
if($_REQUEST['m']==5){$SelM='May';} if($_REQUEST['m']==6){$SelM='June';} if($_REQUEST['m']==7){$SelM='July';} if($_REQUEST['m']==8){$SelM='August';} 
if($_REQUEST['m']==9){$SelM='September';} if($_REQUEST['m']==10){$SelM='October';} if($_REQUEST['m']==11){$SelM='November';} if($_REQUEST['m']==12){$SelM='December';} ?> 	  
<table border="0" style="margin-top:0px; width:120%; height:350px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td style="width:250px;">&nbsp;<font color="#2D002D" style='font-family:Times New Roman;' size="4"><b>Attendance Reports :</b></font></td>
	  <td style="width:65px;"><font color="#2D002D" style='font-family:Times New Roman;' size="4"><b></b></font><select style="font-size:12px; width:60px; height:20px; background-color:#DDFFBB;" name="Year" id="Year" onChange="SelectYear(this.value,<?php echo $_REQUEST['m']; ?>)"><option value="<?php echo $_REQUEST['Y']; ?>"><?php echo $_REQUEST['Y']; ?></option><?php for($i=date("Y"); $i>2013; $i--){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td> 
	 <td class="td1" style="font-size:11px; width:105px;" align="left">
<select style="font-size:12px; width:100px; height:20px; background-color:#DDFFBB; display:block;" name="Month" id="Month" onChange="SelectMonth(this.value)"><option value="<?php echo $_REQUEST['m']; ?>"><?php echo $SelM; ?></option><?php for($i=1; $i<=12; $i++){ ?><option value="<?php echo $i; ?>"><?php echo date("F",strtotime($_REQUEST['Y']."-".$i."-01")); ?></option><?php } ?></select>
                      </td>
                       <td class="td1" style="font-size:11px; width:125px;">			   
                       <select style="font-size:11px; width:120px; height:19px; background-color:#DDFFBB; display:block;" name="Department" id="Department" onChange="SelectMonthDept(this.value)">
<?php if($_REQUEST['D']!='All') { $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['D'], $con); $resD=mysql_fetch_assoc($sqlD); ?> 
                      <option value="<?php echo $_REQUEST['D']; ?>" style="margin-left:0px; background-color:#84D9D5;">&nbsp;<?php echo $resD['DepartmentCode']; ?></option>  
<?php  } else { ?>	  <option value="All" style="margin-left:0px; background-color:#84D9D5;">&nbsp;All</option><?php } ?>						   
					   <?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?><option value="All">&nbsp;All</option></select>
					   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
					   <input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
                      </td>
					  <td style="width:185px;"><font color="#2D002D" style='font-family:Times New Roman;' size="4"><b></b></font><select style="font-size:12px; width:180px; height:20px; background-color:#DDFFBB;" name="rpi" id="rpi" onChange="Selectrpi(this.value,<?php echo $_REQUEST['m'].','.$_REQUEST['D'].','.$_REQUEST['Y']; ?>)">
<?php if($_REQUEST['rpi']>0){ $sqlE=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['rpi'],$con); $resE=mysql_fetch_assoc($sqlE); ?>					<option value="<?php echo $_REQUEST['rpi']; ?>"><?php echo strtoupper($resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']); ?></option><?php } else { ?><option value="0">REPORTING</option><?php } ?>
<?php $sqlE2=mysql_query("select Fname,Sname,Lname,RepEmployeeID from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.RepEmployeeID=hrm_employee.EmployeeID where DepartmentId=".$_REQUEST['D']." AND EmpStatus='A' group by RepEmployeeID order by Fname ASC", $con); while($resE2=mysql_fetch_assoc($sqlE2)){ ?>
	      <option value="<?php echo $resE2['RepEmployeeID']; ?>"><?php echo strtoupper($resE2['Fname'].' '.$resE2['Sname'].' '.$resE2['Lname']); ?></option> <?php } ?>
	      </select></td>
		  <td style="width:70px;"><select style="font-size:12px; width:60px; height:20px; background-color:#DDFFBB;" name="OldNew" id="OldNew" onChange="SelectYear(this.value,<?php echo $_REQUEST['OldNew']; ?>)"><option value="<?php echo $_REQUEST['OldNew']; ?>"><?php echo $_REQUEST['OldNew']; ?></option><option value="<?php if($_REQUEST['OldNew']=='Old'){echo 'New';}else{echo 'Old';} ?>"><?php if($_REQUEST['OldNew']=='Old'){echo 'New';}else{echo 'Old';} ?></option></select></td>
		   <td><input type="button" value="click" style="width:60px;" onClick="FunClick()" /></td>
		  <td>&nbsp;</td>
		  
		  <?php if($_REQUEST['acttc']=='opentbl' && $_REQUEST['D']!='All'){ ?>
		  <td style="width:150px;"><a href="#" onClick="Export(<?php echo $CompanyId.','.$_REQUEST['m'];?>,'<?php echo $_REQUEST['D']; ?>',<?php echo $_REQUEST['Y'].','.$_REQUEST['rpi']; ?>,'<?php echo $_REQUEST['OldNew']; ?>')" style="font-size:14px; font-family:Times New Roman;">Export Excel</a></td>
		  <?php } ?>

					  
					  <td width="1200" align="left" class="cell3">&nbsp;&nbsp;&nbsp;
					  <font color="#0080FF">P</font>– Present, <font color="#0080FF">A</font>- Absent,
					  <font color="#0080FF">CH</font>– Half day CL, <font color="#0080FF">SH</font>– Half day SL, <font color="#0080FF">H</font>- Holiday,  
					  <font color="#0080FF">OD</font>- Outdoor Duties </td>
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
{ $AttTable='hrm_employee_attendance'; $AttReport='hrm_employee_attreport'; 
  $LeaveTable='hrm_employee_monthlyleave_balance'; $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y'];  }
elseif($_REQUEST['Y']==$BY AND date("m")=='01' AND $_REQUEST['m']==12)
{ $AttTable='hrm_employee_attendance'; $AttReport='hrm_employee_attreport'; 
  $LeaveTable='hrm_employee_monthlyleave_balance'; $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y']; }
elseif($_REQUEST['Y']==$BY AND $_REQUEST['m']<12)
{ $AttTable='hrm_employee_attendance'; $AttReport='hrm_employee_attreport_'.$_REQUEST['Y']; 
  $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['Y']; $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y']; }
else
{ $AttTable='hrm_employee_attendance'; $AttReport='hrm_employee_attreport_'.$_REQUEST['Y']; 
  $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['Y']; $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y']; }
?>	
 <tr>
<?php //*************** Open ****************************************************** ?>
<?php $id=$_REQUEST['m']; $Y=$_REQUEST['Y']; 
if($id==1 OR $id==3 OR $id==5 OR $id==7 OR $id==8 OR $id==10 OR $id==12){$day=31;} 
elseif($id==4 OR $id==6 OR $id==9 OR $id==11){$day=30;}
elseif($id==2){if($Y==2012 OR $Y==2016 OR $Y==2020 OR $Y==2024 OR $Y==2028 OR $Y==2032 OR $Y==2036 OR $Y==2040) { $day=29; } else { $day=28;} } ?> 
<td align="left" id="type" valign="top" width="100%">             
<form method="post" name="FormAtt" onSubmit="return validate(this)">
   <table border="0" cellpadding="0" cellspacing="0">
     <tr><td style="width:120%;">
	   <table border="1" cellpadding="0" cellspacing="0" style="width:100%;" style="margin-top:opx;">
	     <tr>
<td class="ht" style="width:10px;" rowspan="2"></td>
<td class="ht" style="width:10px;" rowspan="2"><b>Sn</b></td>		 
<td class="ht" style="width:50px;" rowspan="2"><b>EC</b></td>
<td class="ht" style="width:200px;" rowspan="2"><b>Name</b></td>
<td class="ht" style="width:80px;" rowspan="2"><b>Department</b></td>
<td class="ht" style="width:150px;" rowspan="2"><b>Designation</b></td>
<td class="ht" style="width:80px;" rowspan="2"><b>HQ</b></td>
<td class="ht" style="width:200px;" rowspan="2"><b>Reporting</b></td>
<td class="ht" colspan="<?php echo $day; ?>"><b>&nbsp;Month :</b>&nbsp;<font style="font:Times New Roman;color:#EAEF18;font-size:14px; background-color:#7a6189; font-weight:bold;"><?php echo $SelM; ?></font>&nbsp;&nbsp;&nbsp;<b>Department :</b>&nbsp;<font style="font:Times New Roman; color:#EAEF18; font-size:14px; background-color:#7a6189;font-weight:bold;"><?php if($_REQUEST['D']!='All') {echo $ResDepartment['DepartmentName']; } else { echo  'All'; } ?></font></td>
<td class="ht" colspan="5"><b>Total</b></td>
	     </tr>
		 <tr>
<?php for($i=1; $i<=$day; $i++){ ?><td align="center" class="cell" style="background-color:<?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0) {echo '#6B983A';} else {echo '#7a6189';} ?>;" width="20"><?php echo $i; ?></td><?php } ?>
 <td class="cellOpe" align="center" width="35">Le</td>
 <td class="cellOpe" align="center" width="35">Ho</td>
 <td class="cellOpe" align="center" width="35">Od</td>
 <td class="cellOpe" align="center" width="35">Pr</td>
 <td class="cellOpe" align="center" width="35">Ab</td>
        </tr>
<?php if($_REQUEST['acttc']=='opentbl' AND $_REQUEST['D']!='All'){

if($_REQUEST['D']!='All' AND $_REQUEST['rpi']==0){ $SqlEmp=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentCode,DesigCode,HqName,RepEmployeeID from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_designation de on g.DesigId=de.DesigId inner join hrm_headquater hq on g.hqId=hq.HqId where e.EmpStatus='A' AND g.DepartmentId=".$_REQUEST['D']." AND e.CompanyId=".$CompanyId." AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by e.EmpCode ASC", $con); }

//elseif($_REQUEST['D']=='All'  AND $_REQUEST['rpi']==0){ $SqlEmp=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentCode,DesigCode,HqName,RepEmployeeID from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_designation de on g.DesigId=de.DesigId inner join hrm_headquater hq on g.hqId=hq.HqId where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DepartmentId!=17 AND g.DepartmentId!=18 AND g.DepartmentId!=23 AND g.DepartmentId!=0 AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by e.EmpCode ASC", $con); }

elseif($_REQUEST['D']!='All' AND $_REQUEST['rpi']>0){ $SqlEmp=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentCode,DesigCode,HqName,RepEmployeeID from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_designation de on g.DesigId=de.DesigId inner join hrm_headquater hq on g.hqId=hq.HqId where e.EmpStatus='A' AND g.DepartmentId=".$_REQUEST['D']." AND g.RepEmployeeID=".$_REQUEST['rpi']." AND e.CompanyId=".$CompanyId." AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by e.EmpCode ASC", $con); }

//elseif($_REQUEST['D']=='All'  AND $_REQUEST['rpi']>0){ $SqlEmp=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentCode,DesigCode,HqName,RepEmployeeID from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_designation de on g.DesigId=de.DesigId inner join hrm_headquater hq on g.hqId=hq.HqId where e.EmpStatus='A' AND g.RepEmployeeID=".$_REQUEST['rpi']." AND e.CompanyId=".$CompanyId." AND g.DepartmentId!=17 AND g.DepartmentId!=18 AND g.DepartmentId!=23 AND g.DepartmentId!=0 AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by e.EmpCode ASC", $con); }
  
$Sno=1; $SqlRows=mysql_num_rows($SqlEmp); while($ResEmp=mysql_fetch_array($SqlEmp))
{ 
$month=$_REQUEST['m']; $sqlRep=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$ResEmp['RepEmployeeID'], $con); $resRep=mysql_fetch_assoc($sqlRep);
?>
<tr id="TR<?php echo $Sno; ?>" style="background-color:#FFFFFF;">
 <td class="td" style="width:10px;"><input type="checkbox" id="Chk<?php echo $Sno; ?>" onClick="FucChk(<?php echo $Sno; ?>)"/></td>
 <td class="td" style="width:10px;"><?php echo $Sno; ?></td>
 <td class="td" style="width:50px;"><?php echo $ResEmp['EmpCode']; ?></td>
 <td class="tdl" style="width:200px;">&nbsp;<?php echo strtoupper($ResEmp['Fname'].' '.$ResEmp['Sname'].' '.$ResEmp['Lname']);?><input type="hidden" name="EmpId" id="EmpId" value="<?php echo $ResEmp['EmployeeID']; ?>"/></td>
 <td class="tdl" style="width:80px;">&nbsp;<?php echo strtoupper($ResEmp['DepartmentCode']); ?></td>
 <td class="tdl" style="width:150px;">&nbsp;<?php echo strtoupper($ResEmp['DesigCode']); ?></td>
 <td class="tdl" style="width:80px;">&nbsp;<?php echo strtoupper($ResEmp['HqName']); ?></td>
 <td class="tdl" style="width:200px;">&nbsp;<?php echo strtoupper($resRep['Fname'].' '.$resRep['Sname'].' '.$resRep['Lname']); ?></td>
 
 <?php //if($_REQUEST['OldNew']=='Old'){ $SqlEmp2=mysql_query("SELECT * FROM ".$AttReport." WHERE EmployeeID =".$ResEmp['EmployeeID']." AND Year=".$Y." AND Month=".$month, $con); $ResEmp2=mysql_fetch_array($SqlEmp2); } 
 for($i=1; $i<=$day; $i++) 
 { 
 
  $tt=strtotime(date($Y."-".$month."-".$i)); 
  if($tt<$pp){$tab=$AttTable2; }else{$tab=$AttTable; }
 
 if($_REQUEST['OldNew']=='New'){ $SqlEmp2=mysql_query("SELECT AttValue FROM ".$tab." WHERE EmployeeID =".$ResEmp['EmployeeID']." AND AttDate='".date($Y."-".$month."-".$i)."'", $con); }
 else{ $SqlEmp2=mysql_query("SELECT * FROM ".$AttReport." WHERE EmployeeID =".$ResEmp['EmployeeID']." AND Year=".$Y." AND Month=".$month, $con); } $ResEmp2=mysql_fetch_array($SqlEmp2); ?>
 
 <?php if($_REQUEST['OldNew']=='Old'){  ?>
 <td class="cell2" <?php if(date("w",strtotime(date($Y.'-'.$month.'-'.$i)))==0) {echo 'bgcolor="#6B983A"';} ?> width="20" <?php if($ResEmp2['A'.$i]=='HO'){echo 'bgcolor="#A9D3F5"';} elseif($ResEmp2['A'.$i]=='CL' OR $ResEmp2['A'.$i]=='SL' OR $ResEmp2['A'.$i]=='PL' OR $ResEmp2['A'.$i]=='EL' OR $ResEmp2['A'.$i]=='CH' OR $ResEmp2['A'.$i]=='SH' OR $ResEmp2['A'.$i]=='PH' OR $ResEmp2['A'.$i]=='FL' OR $ResEmp2['A'.$i]=='TL' OR $ResEmp2['A'.$i]=='ACH' OR $ResEmp2['A'.$i]=='ASH' OR $ResEmp2['A'.$i]=='APH'){echo 'bgcolor="#F8FBBB"';} elseif($ResEmp2['A'.$i]=='A'){echo 'bgcolor="#FAD6CF"';} elseif($ResEmp2['A'.$i]=='P' OR $ResEmp2['A'.$i]=='WFH'){echo 'bgcolor="#FFFFFF"';} elseif($ResEmp2['A'.$i]=='OD'){echo 'bgcolor="#FFA4D1"';} ?> ><?php if($ResEmp2['A'.$i]==''){echo '&nbsp;';} else {echo $ResEmp2['A'.$i];} ?></td>
 <?php }else{ ?>
 <td align="center" class="cell2" <?php if(date("w",strtotime(date($Y.'-'.$month.'-'.$i)))==0) {echo 'bgcolor="#6B983A"';} ?> width="20" <?php if($ResEmp2['AttValue']=='HO'){echo 'bgcolor="#A9D3F5"';} elseif($ResEmp2['AttValue']=='CL' OR $ResEmp2['AttValue']=='SL' OR $ResEmp2['AttValue']=='PL' OR $ResEmp2['AttValue']=='EL' OR $ResEmp2['AttValue']=='CH' OR $ResEmp2['AttValue']=='SH' OR $ResEmp2['AttValue']=='PH' OR $ResEmp2['AttValue']=='FL' OR $ResEmp2['AttValue']=='TL' OR $ResEmp2['AttValue']=='ACH'){echo 'bgcolor="#F8FBBB"';} elseif($ResEmp2['AttValue']=='A'){echo 'bgcolor="#FAD6CF"';} elseif($ResEmp2['AttValue']=='P' OR $ResEmp2['AttValue']=='WFH'){echo 'bgcolor="#FFFFFF"';} elseif($ResEmp2['AttValue']=='OD'){echo 'bgcolor="#FFA4D1"';} ?> ><?php if($ResEmp2['AttValue']==''){echo '&nbsp;';} else {echo $ResEmp2['AttValue'];} ?></td>
 <?php } ?>
 
 <?php } //for($i=1; $i<=$day; $i++) ?>

 <?php $sqlTotAtt=mysql_query("select * from ".$LeaveTable." where Year=".$Y." AND EmployeeID=".$ResEmp['EmployeeID']." AND Month=".$month."", $con); $resTotAtt=mysql_fetch_assoc($sqlTotAtt);?>
 <td class="cellOpe2" style="background-color:#F8FBBB;"><?php if($resTotAtt['MonthAtt_TotLeave']!=''){ echo $resTotAtt['MonthAtt_TotLeave']; } else {echo '&nbsp;';} ?></td>
 <td class="cellOpe2" style="background-color:#A9D3F5;"><?php if($resTotAtt['MonthAtt_TotHO']!=''){ echo $resTotAtt['MonthAtt_TotHO']; } else {echo '&nbsp;';} ?></td>
 <td class="cellOpe2" style="background-color:#FFA4D1;"><?php if($resTotAtt['MonthAtt_TotOD']!=''){ echo $resTotAtt['MonthAtt_TotOD']; } else {echo '&nbsp;';} ?></td>
 <td class="cellOpe2" style="background-color:#FFFFFF;"><?php if($resTotAtt['MonthAtt_TotPR']!=''){ echo $resTotAtt['MonthAtt_TotPR']; } else {echo '&nbsp;';} ?></td>
 <td class="cellOpe2" style="background-color:#FAD6CF;"><?php if($resTotAtt['MonthAtt_TotAP']!=''){ echo $resTotAtt['MonthAtt_TotAP']; } else {echo '&nbsp;';} ?></td>
</tr>
<?php $Sno++; } 

}else{ ?>
<tr id="TR<?php echo $Sno; ?>" style="background-color:#FFFFFF; higth:60px; vertical-align:middle;">
 <td class="td" colspan="8"><br><br>
     <?php if($_REQUEST['D']=='All'){ ?>
     
     <b>Export File:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     
     <a href="#" onClick="ExportA1(<?php echo $CompanyId.','.$_REQUEST['m'];?>,'<?php echo $_REQUEST['D']; ?>',<?php echo $_REQUEST['Y'].','.$_REQUEST['rpi']; ?>,'<?php echo $_REQUEST['OldNew']; ?>')" style="font-size:14px; font-family:Times New Roman;">File-1</a>
     &nbsp;&nbsp;&nbsp;
     <a href="#" onClick="ExportA2(<?php echo $CompanyId.','.$_REQUEST['m'];?>,'<?php echo $_REQUEST['D']; ?>',<?php echo $_REQUEST['Y'].','.$_REQUEST['rpi']; ?>,'<?php echo $_REQUEST['OldNew']; ?>')" style="font-size:14px; font-family:Times New Roman;">File-2</a>
     &nbsp;&nbsp;&nbsp;
     <a href="#" onClick="ExportA3(<?php echo $CompanyId.','.$_REQUEST['m'];?>,'<?php echo $_REQUEST['D']; ?>',<?php echo $_REQUEST['Y'].','.$_REQUEST['rpi']; ?>,'<?php echo $_REQUEST['OldNew']; ?>')" style="font-size:14px; font-family:Times New Roman;">File-3</a>
     &nbsp;&nbsp;&nbsp;
     <a href="#" onClick="ExportA4(<?php echo $CompanyId.','.$_REQUEST['m'];?>,'<?php echo $_REQUEST['D']; ?>',<?php echo $_REQUEST['Y'].','.$_REQUEST['rpi']; ?>,'<?php echo $_REQUEST['OldNew']; ?>')" style="font-size:14px; font-family:Times New Roman;">File-4</a>
     &nbsp;&nbsp;&nbsp;
     <a href="#" onClick="ExportA5(<?php echo $CompanyId.','.$_REQUEST['m'];?>,'<?php echo $_REQUEST['D']; ?>',<?php echo $_REQUEST['Y'].','.$_REQUEST['rpi']; ?>,'<?php echo $_REQUEST['OldNew']; ?>')" style="font-size:14px; font-family:Times New Roman;">File-5</a>
     
     <?php } ?>
     <br><br>
 </td>
</tr> 
<?php } ?>
</table>
<?php  ///////////////////////_TABLE_1_Close /////////////////////////////////// ?> 		
		
		
        </td></tr>
	   </table>
	    </td>
		</tr>

   <tr>
      <td align="left" class="fontButton" style="width:100%; "><table border="0">
		<tr>
		 <td align="left"><input type="button" name="back" id="back" style="width:90px;display:block;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"></td>
		 <td align="left" style="width:70px;"><input type="button" name="RefreshVtype" id="RefreshVtype" style="width:90px;" value="refresh" onClick="javascript:window.location='RsAttReport.php?m=<?php echo $_REQUEST['m']; ?>&D=<?php echo $_REQUEST['D']; ?>&Y=<?php echo $_REQUEST['Y']; ?>&rpi=<?php echo $_REQUEST['rpi']; ?>'"/></td>
		 <td width="100">&nbsp;</td>
		 <td><table><tr>
		    <td bgcolor="#6B983A" width="10">&nbsp;</td><td>:</td><td class="cell">Sunday</td><td width="50">&nbsp;</td>
			<td bgcolor="#A9D3F5" width="10">&nbsp;</td><td>:</td><td class="cell">Holiday</td><td width="50">&nbsp;</td>
			<td bgcolor="#F8FBBB" width="10">&nbsp;</td><td>:</td><td class="cell">Leave</td><td width="50">&nbsp;</td>
			<td bgcolor="#FAD6CF" width="10">&nbsp;</td><td>:</td><td class="cell">Absent</td><td width="50">&nbsp;</td>
			<td bgcolor="#FFFFFF" width="10">&nbsp;</td><td>:</td><td class="cell">Present</td><td width="50">&nbsp;</td>
			<td bgcolor="#FFA4D1" width="10">&nbsp;</td><td>:</td><td class="cell">Outdoor Duties </td>
		  
		 </tr></table></td>
		</tr></table>
      </td>
   </tr>
  </table>
 </form>     
</td>
<?php //************************* Close ************************************?>    
  

 </tr>
<?php } ?> 
</table>
		
<?php //********************************************************************************************?>
<?php //*****************END*****END*****END******END******END*************************************?>
<?php //***************************************************************************?>
		
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