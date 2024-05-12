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
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.cell {color:#FFFFFF;font-family:Times New Roman;font-size:14px;font-weight:bold;} 
.cell2 {color:#000;font-family:Times New Roman;font-size:14px;} .cell3 {color:#030303;font-family:Times New Roman;font-size:14px; font-weight:bold;} 
.cellOpe {color:#FFFFFF;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe2 {color:#000;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe3 {color:#000;font-family:Times New Roman; width:30px;height:20px; font-size:14px; font-weight:bold;}
.head{background-color:#7a6189;color:#FFFFFF;font-family:Times New Roman;height:22px;font-size:13px;}
.head1{background-color:#7a6189;color:#FFFFFF;font-family:Times New Roman;height:22px;font-size:15px;}
.bodyy{font-family:Times New Roman;font-size:12px;height:20px;}
.inner_table{height:500px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '500px' }); })


function FunClick()  
{
  var D = document.getElementById("Department").value; var Y = document.getElementById("Year").value; 
  var cl = parseFloat(document.getElementById("clv").value); 
  var pl = parseFloat(document.getElementById("plv").value);
  var fl = parseFloat(document.getElementById("flv").value); 
  var sl = parseFloat(document.getElementById("slv").value);
  var el = parseFloat(document.getElementById("elv").value);
  var tot = Math.round((cl+pl+fl+sl+el)*100)/100;
  if(document.getElementById("Stch").checked==true){document.getElementById("st").value='A'; var x = 'LeaveTotAvailed.php?D='+D+'&Y='+Y+'&st=A&cl='+cl+'&pl='+pl+'&fl='+fl+'&sl='+sl+'&el='+el+'&tot='+tot+'&acttc=open'; window.location=x;}
  else if(document.getElementById("Stch").checked==false){document.getElementById("st").value='De'; var x = 'LeaveTotAvailed.php?D='+D+'&Y='+Y+'&st=De&cl='+cl+'&pl='+pl+'&fl='+fl+'&sl='+sl+'&el='+el+'&tot='+tot+'&acttc=open'; window.location=x;} 
}


function ExportLeaveTot(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value; 
  var DeptValue=document.getElementById("Department").value; var Y = document.getElementById("Year").value; 
  var st = document.getElementById("st").value; 
  var cl = parseFloat(document.getElementById("clv").value); 
  var pl = parseFloat(document.getElementById("plv").value);
  var fl = parseFloat(document.getElementById("flv").value); 
  var sl = parseFloat(document.getElementById("slv").value);
  var el = parseFloat(document.getElementById("elv").value);
  var tot = Math.round((cl+pl+fl+sl+el)*100)/100;  
  window.open("ReportCSVLeaveTot.php?action=LeaveTotExport&value="+v+"&C="+ComId+"&Y="+YId+"&D="+DeptValue+'&Y='+Y+'&st='+st+'&cl='+cl+'&pl='+pl+'&fl='+fl+'&sl='+sl+'&el='+el+'&tot='+tot,"ExpForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}

function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#9BEF47'; }
  else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; }
}

function ClickCL(){ if(document.getElementById("StCL").checked==true){document.getElementById("clv").value=1;}else{document.getElementById("clv").value=0;} }
function ClickPL(){ if(document.getElementById("StPL").checked==true){document.getElementById("plv").value=1;}else{document.getElementById("plv").value=0;} }
function ClickFL(){ if(document.getElementById("StFL").checked==true){document.getElementById("flv").value=1;}else{document.getElementById("flv").value=0;} }
function ClickSL(){ if(document.getElementById("StSL").checked==true){document.getElementById("slv").value=1;}else{document.getElementById("slv").value=0;} }
function ClickEL(){ if(document.getElementById("StEL").checked==true){document.getElementById("elv").value=1;}else{document.getElementById("elv").value=0;} }

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
  <table style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top" align="left"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  id="MainWindow"><br>
<?php //****************************************************?>
<?php /******START*****START*****START******START******START************************/ ?>
<?php //*********************************************************************/ ?>
<?php if($_REQUEST['m']==1){$SelM='January';} if($_REQUEST['m']==2){$SelM='February';} if($_REQUEST['m']==3){$SelM='March';}if($_REQUEST['m']==4){$SelM='April';} 
if($_REQUEST['m']==5){$SelM='May';} if($_REQUEST['m']==6){$SelM='June';} if($_REQUEST['m']==7){$SelM='July';} if($_REQUEST['m']==8){$SelM='August';} 
if($_REQUEST['m']==9){$SelM='September';} if($_REQUEST['m']==10){$SelM='October';} if($_REQUEST['m']==11){$SelM='November';} if($_REQUEST['m']==12){$SelM='December';} ?> 	  
<table border="0" style="margin-top:0px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td style="width:200px;">&nbsp;<font color="#2D002D" style='font-family:Times New Roman;' size="4">
	  <b>Leave Availed Reports :</b></font></td>
	  <td style="width:90px; font-family:Times New Roman;color:#4F3C6F;font-size:14px;" align="right";><b>Year</b>&nbsp;</td>
	  <td style="width:62px;"><select style="font-size:12px; width:60px; height:20px; background-color:#DDFFBB;" name="Year" id="Year" onChange="SelectYear(this.value)">
	      <option value="<?php echo $_REQUEST['Y']; ?>"><?php echo $_REQUEST['Y']; ?></option>
              <?php for($i=date("Y"); $i>=2013; $i--){?>
              <?php if($i!=$_REQUEST['Y']){?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?>
              <?php } ?> 
	      </select></td> 
	  <td style="width:90px; font-family:Times New Roman;color:#4F3C6F;font-size:14px;" align="right";><b>Department</b>&nbsp;</td>	  
	  <td style="width:122px;"><select style="font-size:11px; width:120px; height:19px; background-color:#DDFFBB; display:block;" name="Department" id="Department" onChange="SelectMonthDept(this.value)">
<?php if($_REQUEST['D']!='All') { $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['D'], $con); $resD=mysql_fetch_assoc($sqlD); ?> 
                      <option value="<?php echo $_REQUEST['D']; ?>" style="margin-left:0px; background-color:#84D9D5;">&nbsp;<?php echo $resD['DepartmentCode']; ?></option>  
<?php  } else { ?>	  <option value="All" style="margin-left:0px; background-color:#84D9D5;">&nbsp;All</option><?php } ?>						   
					   <?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?><option value="All">&nbsp;All</option></select>
					   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
					   <input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
	 </td> 
	 <td><input type="button" value="click" style="width:60px;" onClick="FunClick()" /></td>
	 <td>&nbsp;</td>
	 <td style="width:140px;font-family:Times New Roman;color:#4F3C6F;font-size:14px;" align="right">
	  <b>Active Employee</b>&nbsp;<input type="checkbox" id="Stch" onClick="ClickSt()" <?php if($_REQUEST['st']=='A'){echo 'checked';} ?> />
	 </td>
	 
	 
	 <td style="width:300px;font-family:Times New Roman;color:#4F3C6F;font-size:14px;" align="center">
CL<input type="checkbox" id="StCL" onClick="ClickCL()" <?php if($_REQUEST['cl']==1){echo 'checked';}?>/>
<input type="hidden" id="clv" value="<?php echo $_REQUEST['cl']; ?>" />&nbsp;
PL<input type="checkbox" id="StPL" onClick="ClickPL()" <?php if($_REQUEST['pl']==1){echo 'checked';}?>/>
<input type="hidden" id="plv" value="<?php echo $_REQUEST['pl']; ?>" />&nbsp;
FL<input type="checkbox" id="StFL" onClick="ClickFL()" <?php if($_REQUEST['fl']==1){echo 'checked';}?>/>
<input type="hidden" id="flv" value="<?php echo $_REQUEST['fl']; ?>" />&nbsp;
SL<input type="checkbox" id="StSL" onClick="ClickSL()" <?php if($_REQUEST['sl']==1){echo 'checked';}?>/>
<input type="hidden" id="slv" value="<?php echo $_REQUEST['sl']; ?>" />&nbsp;
EL<input type="checkbox" id="StEL" onClick="ClickEL()" <?php if($_REQUEST['el']==1){echo 'checked';}?>/>
<input type="hidden" id="elv" value="<?php echo $_REQUEST['el']; ?>" />
	 </td>
	 
	 
	 
	 <td style="width:140px; font-family:Times New Roman;color:#4F3C6F;font-size:14px;">	
	 <a href="#" onClick="ExportLeaveTot('<?php echo $_REQUEST['D']; ?>')">Export <?php if($_REQUEST['D']=='All'){echo 'All'; } ?> Reports</a>	  	  
	 </td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { 

$Y=$_REQUEST['Y'];

$ExpMonthDate=date('Y-m-d', strtotime("-2 months", strtotime(date("Y-m-d")))); $pp=strtotime($ExpMonthDate);
$ExpMonth=date('m', strtotime("-2 months", strtotime(date("Y-m-d"))));
$ExpYear=date('Y', strtotime("-2 months", strtotime(date("Y-m-d"))));

$BY=date("Y")-1;
if($_REQUEST['Y']>=date("Y"))
{ $AttTable='hrm_employee_attendance'; $AttReport='hrm_employee_attreport'; 
  $LeaveTable='hrm_employee_monthlyleave_balance'; $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y']; }
elseif($_REQUEST['Y']==$BY AND date("m")=='01')
{ $AttTable='hrm_employee_attendance'; $AttReport='hrm_employee_attreport'; 
  $LeaveTable='hrm_employee_monthlyleave_balance'; $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y']; }
elseif($_REQUEST['Y']==$BY AND date("m")>1)
{ $AttTable='hrm_employee_attendance_'.$_REQUEST['Y']; $AttReport='hrm_employee_attreport_'.$_REQUEST['Y']; 
  $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['Y']; }
else
{$AttTable='hrm_employee_attendance_'.$_REQUEST['Y']; $AttReport='hrm_employee_attreport_'.$_REQUEST['Y']; 
  $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['Y']; }

?>	
 <tr>
<?php //************ Open ****************************************************** ?> 
<td align="left" id="type" valign="top">             
<form method="post" name="FormAtt" onSubmit="return validate(this)">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="Year" id="Year" value="<?php echo $_REQUEST['Y']; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" name="DeptValue" id="DeptValue" value="<?php echo $_REQUEST['D']; ?>" />
<input type="hidden" name="st" id="st" value="<?php echo $_REQUEST['st']; ?>" />
   <table border="0" cellpadding="0" cellspacing="0">
     <tr><td>
	   <table border="1" cellpadding="0" cellspacing="0" style="margin-top:opx;width:114%;">
<div class="thead">
 <thead>	   
<tr style="background-color:#7a6189;">
 <td colspan="5" rowspan="2" class="head1" align="center"><b>Employee</b></td>
 
 <td colspan="20" class="head1" align="center"><b>January <?php echo $_REQUEST['Y']; ?></b></td>
 
 <?php for($i=1; $i<=11; $i++){ ?>
 <td colspan="<?php if($_REQUEST['tot']==1){echo 3;}elseif($_REQUEST['tot']==2){echo 6;}elseif($_REQUEST['tot']==3){echo 9;}elseif($_REQUEST['tot']==4){echo 12;}if($_REQUEST['tot']==5){echo 15;}?>" class="head1" align="center"><b><?php if($i==1){echo 'February';}elseif($i==2){echo 'March';}elseif($i==3){echo 'April';}elseif($i==4){echo 'May';}elseif($i==5){echo 'June';}elseif($i==6){echo 'July';}elseif($i==7){echo 'August';}elseif($i==8){echo 'September';}elseif($i==9){echo 'October';}elseif($i==10){echo 'November';}elseif($i==11){echo 'December';} ?></b></td>
 <?php } ?>
 
 <td colspan="12" rowspan="2" class="head1" align="center"><b>Availed Leave</b></td>
 <td colspan="5" rowspan="2" class="head1" align="center"><b>Total Availed Leave</b></td>
 <td colspan="3" class="head1" align="center"><b>Total</b></td>
 
</tr>	   
<tr>
 <td colspan="3" class="head1" align="center" style="background-color:#91FF91;color:#000000;"><b>CL</b></td>
 <td colspan="3" class="head1" align="center" style="background-color:#6CB6FF;color:#000000;"><b>PL</b></td>
 <td colspan="3" class="head1" align="center" style="background-color:#E7CEFF;color:#000000;"><b>FL</b></td>
 <td colspan="5" class="head1" align="center" style="background-color:#FFFFA4;color:#000000;"><b>SL</b></td>
 <td colspan="6" class="head1" align="center" style="background-color:#FFAE5E;color:#000000;"><b>EL</b></td>
 
 <?php for($i=1; $i<=11; $i++){ ?>
 
 <?php if($_REQUEST['cl']==1){?>
 <td colspan="3" class="head1" align="center" style="background-color:#91FF91;color:#000000;"><b>CL</b></td>
 <?php } if($_REQUEST['pl']==1){ ?>
 <td colspan="3" class="head1" align="center" style="background-color:#6CB6FF;color:#000000;"><b>PL</b></td>
 <?php } if($_REQUEST['fl']==1){ ?>
 <td colspan="3" class="head1" align="center" style="background-color:#E7CEFF;color:#000000;"><b>FL</b></td>
 <?php } if($_REQUEST['sl']==1){ ?>
 <td colspan="3" class="head1" align="center" style="background-color:#FFFFA4;color:#000000;"><b>SL</b></td>
 <?php } if($_REQUEST['el']==1){ ?>
 <td colspan="3" class="head1" align="center" style="background-color:#FFAE5E;color:#000000;"><b>EL</b></td>
 <?php } ?>
 
 <?php } ?>
 
 <td rowspan="2" class="head1" style="width:50px;" align="center"><b>Leave</b></td>
 <td rowspan="2" class="head1" style="width:50px;" align="center"><b>HO</b></td>
 <td rowspan="2" class="head1" style="width:60px;" align="center"><b>WD</b></td>
<?php /* <td rowspan="2" class="head1" style="width:60px;" align="center"><b>HO + WD</b></td> */ ?>	
 
 
</tr>
<tr style="background-color:#7a6189;">
 <td class="head1" style="width:30px;" align="center">&nbsp;</td>
 <td class="head1" style="width:30px;" align="center"><b>Sn</b></td>		 
 <td class="head1" style="width:30px;" align="center"><b>EC</b></td>
 <td class="head1" style="width:300px;" align="center"><b>Name</b></td>
 <td class="head1" style="width:100px;" align="center"><b>Department</b></td>
 
<?php /**********Leave jan***************/  ?>
 <td class="head1" style="width:50px;background-color:#91FF91;color:#000000;" align="center"><b>Crd</b></td>
 <td class="head1" style="width:50px;background-color:#91FF91;color:#000000;" align="center"><b>Avl</b></td>
 <td class="head1" style="width:50px;background-color:#91FF91;color:#000000;" align="center"><b>Bal</b></td>
 <td class="head1" style="width:50px;background-color:#6CB6FF;color:#000000;" align="center"><b>Crd</b></td>
 <td class="head1" style="width:50px;background-color:#6CB6FF;color:#000000;" align="center"><b>Avl</b></td>
 <td class="head1" style="width:50px;background-color:#6CB6FF;color:#000000;" align="center"><b>Bal</b></td>
 <td class="head1" style="width:50px;background-color:#E7CEFF;color:#000000;" align="center"><b>Crd</b></td>
 <td class="head1" style="width:50px;background-color:#E7CEFF;color:#000000;" align="center"><b>Avl</b></td>
 <td class="head1" style="width:50px;background-color:#E7CEFF;color:#000000;" align="center"><b>Bal</b></td>
 
 <td class="head1" style="width:50px;background-color:#FFFFA4;color:#000000;" align="center"><b>Ope</b></td>
 <td class="head1" style="width:50px;background-color:#FFFFA4;color:#000000;" align="center"><b>Crd</b></td>
 <td class="head1" style="width:50px;background-color:#FFFFA4;color:#000000;" align="center"><b>Tot</b></td>
 <td class="head1" style="width:50px;background-color:#FFFFA4;color:#000000;" align="center"><b>Avl</b></td>
 <td class="head1" style="width:50px;background-color:#FFFFA4;color:#000000;" align="center"><b>Bal</b></td>
 
 <td class="head1" style="width:50px;background-color:#FFAE5E;color:#000000;" align="center"><b>Ope</b></td>
 <td class="head1" style="width:50px;background-color:#FFAE5E;color:#000000;" align="center"><b>Crd</b></td>
 <td class="head1" style="width:50px;background-color:#FFAE5E;color:#000000;" align="center"><b>Tot</b></td>
 <td class="head1" style="width:50px;background-color:#FFAE5E;color:#000000;" align="center"><b>Enc</b></td>
 <td class="head1" style="width:50px;background-color:#FFAE5E;color:#000000;" align="center"><b>Avl</b></td>
 <td class="head1" style="width:50px;background-color:#FFAE5E;color:#000000;" align="center"><b>Bal</b></td>
<?php /**********Leave jan */ ?>  
 
 <?php for($i=1; $i<=11; $i++){ ?>
 
 <?php if($_REQUEST['cl']==1){?>
 <td class="head1" style="width:50px;background-color:#91FF91;color:#000000;" align="center"><b>Ope</b></td>
 <td class="head1" style="width:50px;background-color:#91FF91;color:#000000;" align="center"><b>Avl</b></td>
 <td class="head1" style="width:50px;background-color:#91FF91;color:#000000;" align="center"><b>Bal</b></td>
 <?php } if($_REQUEST['pl']==1){ ?>
 <td class="head1" style="width:50px;background-color:#6CB6FF;color:#000000;" align="center"><b>Ope</b></td>
 <td class="head1" style="width:50px;background-color:#6CB6FF;color:#000000;" align="center"><b>Avl</b></td>
 <td class="head1" style="width:50px;background-color:#6CB6FF;color:#000000;" align="center"><b>Bal</b></td>
 <?php } if($_REQUEST['fl']==1){ ?>
 <td class="head1" style="width:50px;background-color:#E7CEFF;color:#000000;" align="center"><b>Ope</b></td>
 <td class="head1" style="width:50px;background-color:#E7CEFF;color:#000000;" align="center"><b>Avl</b></td>
 <td class="head1" style="width:50px;background-color:#E7CEFF;color:#000000;" align="center"><b>Bal</b></td>
 <?php } if($_REQUEST['sl']==1){ ?>
 <td class="head1" style="width:50px;background-color:#FFFFA4;color:#000000;" align="center"><b>Ope</b></td>
 <td class="head1" style="width:50px;background-color:#FFFFA4;color:#000000;" align="center"><b>Avl</b></td>
 <td class="head1" style="width:50px;background-color:#FFFFA4;color:#000000;" align="center"><b>Bal</b></td>
 <?php } if($_REQUEST['el']==1){ ?>
 <td class="head1" style="width:50px;background-color:#FFAE5E;color:#000000;" align="center"><b>Ope</b></td>
 <td class="head1" style="width:50px;background-color:#FFAE5E;color:#000000;" align="center"><b>Avl</b></td>
 <td class="head1" style="width:50px;background-color:#FFAE5E;color:#000000;" align="center"><b>Bal</b></td>
 <?php } ?>
 
 <?php } ?>
 
 <td class="head1" style="width:50px;" align="center"><b>Jan</b></td>
 <td class="head1" style="width:50px;" align="center"><b>Feb</b></td>
 <td class="head1" style="width:50px;" align="center"><b>Mar</b></td>
 <td class="head1" style="width:50px;" align="center"><b>Apr</b></td>
 <td class="head1" style="width:50px;" align="center"><b>May</b></td>
 <td class="head1" style="width:50px;" align="center"><b>Jun</b></td>
 <td class="head1" style="width:50px;" align="center"><b>Jul</b></td>
 <td class="head1" style="width:50px;" align="center"><b>Aug</b></td>
 <td class="head1" style="width:50px;" align="center"><b>Sep</b></td>
 <td class="head1" style="width:50px;" align="center"><b>Oct</b></td>
 <td class="head1" style="width:50px;" align="center"><b>Nov</b></td>
 <td class="head1" style="width:50px;" align="center"><b>Dec</b></td>
 <td class="head1" style="width:60px;background-color:#91FF91;color:#000000;" align="center"><b>CL</b></td>
 <td class="head1" style="width:60px;background-color:#6CB6FF;color:#000000;" align="center"><b>PL</b></td>
 <td class="head1" style="width:60px;background-color:#E7CEFF;color:#000000;" align="center"><b>FL</b></td>
 <td class="head1" style="width:60px;background-color:#FFFFA4;color:#000000;" align="center"><b>SL</b></td>
 <td class="head1" style="width:60px;background-color:#FFAE5E;color:#000000;" align="center"><b>EL</b></td>
</tr>
</thead>
</div>
<?php 
if($_REQUEST['acttc']=='open')
{

if($_REQUEST['D']!='All' AND $_REQUEST['st']!='A'){ $SqlEmp=mysql_query("select e.*,DepartmentId,DateJoining from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['D']." AND e.CompanyId=".$CompanyId." AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-01-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-12-31")."' order by e.EmpCode ASC", $con); }
      if($_REQUEST['D']=='All' AND $_REQUEST['st']!='A'){ $SqlEmp=mysql_query("select e.*,DepartmentId,DateJoining from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.CompanyId=".$CompanyId." AND g.DepartmentId!=17 AND g.DepartmentId!=18 AND g.DepartmentId!=23 AND g.DepartmentId!=0 AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-01-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-12-31")."' order by e.EmpCode ASC", $con); }
	  if($_REQUEST['D']!='All' AND $_REQUEST['st']=='A'){ $SqlEmp=mysql_query("select e.*,DepartmentId,DateJoining from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.EmpStatus='".$_REQUEST['st']."' AND g.DepartmentId=".$_REQUEST['D']." AND e.CompanyId=".$CompanyId." AND g.DateJoining<='".date($_REQUEST['Y']."-12-31")."' order by e.EmpCode ASC", $con); }
      if($_REQUEST['D']=='All' AND $_REQUEST['st']=='A'){ $SqlEmp=mysql_query("select e.*,DepartmentId,DateJoining from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.EmpStatus='".$_REQUEST['st']."' AND e.CompanyId=".$CompanyId." AND g.DepartmentId!=17 AND g.DepartmentId!=18 AND g.DepartmentId!=23 AND g.DepartmentId!=0 AND g.DateJoining<='".date($_REQUEST['Y']."-12-31")."' order by e.EmpCode ASC", $con); }
	  
$Sno=1; $SqlRows=mysql_num_rows($SqlEmp); while($ResEmp=mysql_fetch_array($SqlEmp)) { 
$Ename=$ResEmp['Fname'].' '.$ResEmp['Sname'].' '.$ResEmp['Lname']; 
$sqlDept=mysql_query("select DepartmentCode,DepartmentName from hrm_department where DepartmentId=".$ResEmp['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
?>
<?php if($_REQUEST['D']!='All'){ ?>
<div class="tbody">
<tbody>
<tr bgcolor="#FFFFFF<?php //if($Sno%2==0){echo '#FFFFFF';} else{echo '#B9FFB9';} ?>" id="TR<?php echo $Sno; ?>">
 <td align="center">
 <input type="checkbox" id="Chk<?php echo $Sno; ?>" onClick="FucChk(<?php echo $Sno; ?>)" />
 <input type="hidden" name="EmpId" id="EmpId" value="<?php echo $ResEmp['EmployeeID']; ?>" /></td>
 <td class="bodyy" align="center" valign="top">&nbsp;<?php echo $Sno; ?></td>
 <td class="bodyy" align="center" valign="top">&nbsp;<?php echo $ResEmp['EmpCode']; ?></td>
 <td class="bodyy" valign="top">&nbsp;<?php echo strtoupper($Ename); ?></td>
 <td class="bodyy" valign="top">&nbsp;<?php echo $resDept['DepartmentCode']; ?></td>
 
 
<?php /**********Leave jan***********/  ?>
<?php $Lv=mysql_query("select * from ".$LeaveTable." where EmployeeID=".$ResEmp['EmployeeID']." AND Month=01 AND Year='".$_REQUEST['Y']."'", $con); $rLv=mysql_fetch_array($Lv);?>
 <td class="bodyy" align="center"><?php echo floatval($rLv['CreditedCL']); ?></td>
 <td class="bodyy" align="center"><?php if($rLv['AvailedCL']>0){echo floatval($rLv['AvailedCL']);} ?></td>
 <td class="bodyy" align="center"><?php echo floatval($rLv['BalanceCL']); ?></td>
 
 <td class="bodyy" align="center"><?php echo floatval($rLv['CreditedPL']); ?></td>
 <td class="bodyy" align="center"><?php if($rLv['AvailedPL']>0){echo floatval($rLv['AvailedPL']);} ?></td>
 <td class="bodyy" align="center"><?php echo floatval($rLv['BalancePL']); ?></td>
 
 <td class="bodyy" align="center"><?php echo floatval($rLv['CreditedOL']); ?></td>
 <td class="bodyy" align="center"><?php if($rLv['AvailedOL']>0){echo floatval($rLv['AvailedOL']);} ?></td>
 <td class="bodyy" align="center"><?php echo floatval($rLv['BalanceOL']); ?></td>
 
 <td class="bodyy" align="center"><?php echo floatval($rLv['OpeningSL']); ?></td>
 <td class="bodyy" align="center"><?php echo floatval($rLv['CreditedSL']); ?></td>
 <td class="bodyy" align="center"><?php if($rLv['TotSL']>0){echo floatval($rLv['TotSL']);} ?></td>
 <td class="bodyy" align="center"><?php if($rLv['AvailedSL']>0){echo floatval($rLv['AvailedSL']);} ?></td>
 <td class="bodyy" align="center"><?php echo floatval($rLv['BalanceSL']); ?></td>
 
 <td class="bodyy" align="center"><?php echo floatval($rLv['OpeningEL']); ?></td>
 <td class="bodyy" align="center"><?php echo floatval($rLv['CreditedEL']); ?></td>
 <td class="bodyy" align="center"><?php if($rLv['TotEL']>0){echo floatval($rLv['TotEL']);} ?></td>
 <td class="bodyy" align="center"><?php if($rLv['EnCashEL']>0){echo floatval($rLv['EnCashEL']);} ?></td>
 <td class="bodyy" align="center"><?php if($rLv['AvailedEL']>0){echo floatval($rLv['AvailedEL']);} ?></td>
 <td class="bodyy" align="center"><?php echo floatval($rLv['BalanceEL']); ?></td>
<?php /**********Leave jan */ ?> 

 <?php for($i=2; $i<=12; $i++){ 
 $Lvv=mysql_query("select * from ".$LeaveTable." where EmployeeID=".$ResEmp['EmployeeID']." AND Month=".$i." AND Year='".$_REQUEST['Y']."'", $con); $rLvv=mysql_fetch_array($Lvv);
 ?>
 
 <?php if($_REQUEST['cl']==1){?>
 <?php //CL #91FF91 ?>
 <td class="bodyy" align="center"><?php echo floatval($rLvv['OpeningCL']); ?></td>
 <td class="bodyy" align="center"><?php if($rLvv['AvailedCL']>0){echo floatval($rLvv['AvailedCL']);} ?></td>
 <td class="bodyy" align="center"><?php echo floatval($rLvv['BalanceCL']); ?></td>
 <?php } if($_REQUEST['pl']==1){?>
 <?php //PL #6CB6FF ?>
 <td class="bodyy" align="center"><?php echo floatval($rLvv['OpeningPL']); ?></td>
 <td class="bodyy" align="center"><?php if($rLvv['AvailedPL']>0){echo floatval($rLvv['AvailedPL']);} ?></td>
 <td class="bodyy" align="center"><?php echo floatval($rLvv['BalancePL']); ?></td>
 <?php } if($_REQUEST['fl']==1){?>
 <?php //FL  #E7CEFF?>
 <td class="bodyy" align="center"><?php echo floatval($rLvv['OpeningOL']); ?></td>
 <td class="bodyy" align="center"><?php if($rLvv['AvailedOL']>0){echo floatval($rLvv['AvailedOL']);} ?></td>
 <td class="bodyy" align="center"><?php echo floatval($rLvv['BalanceOL']); ?></td>
 <?php } if($_REQUEST['sl']==1){?>
 <?php //SL #FFFFA4 ?>
 <td class="bodyy" align="center"><?php echo floatval($rLvv['OpeningSL']); ?></td>
 <td class="bodyy" align="center"><?php if($rLvv['AvailedSL']>0){echo floatval($rLvv['AvailedSL']);} ?></td>
 <td class="bodyy" align="center"><?php echo floatval($rLvv['BalanceSL']); ?></td>
 <?php } if($_REQUEST['el']==1){?>
 <?php //EL #FFAE5E ?>
 <td class="bodyy" align="center"><?php echo floatval($rLvv['OpeningEL']); ?></td>
 <td class="bodyy" align="center"><?php if($rLvv['AvailedEL']>0){echo floatval($rLvv['AvailedEL']);} ?></td>
 <td class="bodyy" align="center"><?php echo floatval($rLvv['BalanceEL']); ?></td>
 <?php } ?>

 
 <?php } ?>




 
<?php for($i=1; $i<=12; $i++) { $yfT=$Y."-01-01"; $ytT=$Y."-12-31"; 
$TotL=mysql_query("select MonthAtt_TotLeave from ".$LeaveTable." where EmployeeID=".$ResEmp['EmployeeID']." AND Month=".$i." AND Year=".$Y, $con);
$resTotL=mysql_fetch_array($TotL); ?>	 
 <td class="bodyy" align="center">
  <?php if($resTotL['MonthAtt_TotLeave']!='' AND $resTotL['MonthAtt_TotLeave']!=0){echo $resTotL['MonthAtt_TotLeave'];}else{echo '&nbsp;';} ?>
 </td>
<?php } ?> 

<?php $TotL=mysql_query("select SUM(AvailedCL)as TotCL, SUM(AvailedSL)as TotSL, SUM(AvailedPL)as TotPL, SUM(AvailedEL)as TotEL, SUM(AvailedOL)as TotOL, SUM(MonthAtt_TotLeave)as TotLeave, SUM(MonthAtt_TotPR) as PR, SUM(MonthAtt_TotOD) as OD, SUM(MonthAtt_TotHO) as HO from ".$LeaveTable." where EmployeeID=".$ResEmp['EmployeeID']." AND Year=".$Y, $con); 
      /*$TotSL=mysql_query("select SUM(AvailedSL)as TotSL from ".$LeaveTable." where EmployeeID=".$ResEmp['EmployeeID']." AND Year=".$Y, $con);
      $TotPL=mysql_query("select SUM(AvailedPL)as TotPL from ".$LeaveTable." where EmployeeID=".$ResEmp['EmployeeID']." AND Year=".$Y, $con);
      $TotEL=mysql_query("select SUM(AvailedEL)as TotEL from ".$LeaveTable." where EmployeeID=".$ResEmp['EmployeeID']." AND Year=".$Y, $con);
	  $TotFL=mysql_query("select SUM(AvailedOL)as TotOL from ".$LeaveTable." where EmployeeID=".$ResEmp['EmployeeID']." AND Year=".$Y, $con);*/
      $resTotL=mysql_fetch_array($TotL); /*$resTotSL=mysql_fetch_array($TotSL); $resTotPL=mysql_fetch_array($TotPL); $resTotEL=mysql_fetch_array($TotEL); 
	  $resTotFL=mysql_fetch_array($TotFL); */
?>  
 
 <td class="bodyy" style="background-color:#91FF91;" align="center"><b><?php echo $resTotL['TotCL']; ?></b></td>
 <td class="bodyy" style="background-color:#6CB6FF;" align="center"><b><?php echo $resTotL['TotPL']; ?></b></td>
 <td class="bodyy" style="background-color:#E7CEFF;" align="center"><b><?php echo $resTotL['TotOL']; ?></b></td>
 <td class="bodyy" style="background-color:#FFFFA4;" align="center"><b><?php echo $resTotL['TotSL']; ?></b></td>
 <td class="bodyy" style="background-color:#FFAE5E;" align="center"><b><?php echo $resTotL['TotEL']; ?></b></td>
 
<?php $yfT=$Y."-01-01"; $ytT=$Y."-12-31";  
//$TW=mysql_query("select * from ".$AttTable." where EmployeeID=".$ResEmp['EmployeeID']." AND AttValue='P' AND AttDate>='".$yfT."' AND AttDate<='".$ytT."' group by AttDate", $con); $TOD=mysql_query("select * from ".$AttTable." where EmployeeID=".$ResEmp['EmployeeID']." AND AttValue='OD' AND AttDate>='".$yfT."' AND AttDate<='".$ytT."' group by AttDate", $con); $THO=mysql_query("select * from ".$AttTable." where EmployeeID=".$ResEmp['EmployeeID']." AND AttValue='HO' AND AttDate>='".$yfT."' AND AttDate<='".$ytT."' AND CheckSunday!='Y' group by AttDate", $con); 


$tt=strtotime(date($Y."-01-01")); $tt2=strtotime(date($Y."-12-31")); 
if($tt>=$pp)
{ 
 $TCH=mysql_query("select * from ".$AttTable." where EmployeeID=".$ResEmp['EmployeeID']." AND (AttValue='CH' OR AttValue='ACH') AND AttDate>='".$yfT."' AND AttDate<='".$ytT."' group by AttDate", $con); $TSH=mysql_query("select * from ".$AttTable." where EmployeeID=".$ResEmp['EmployeeID']." AND (AttValue='SH' AttValue='ASH') AND AttDate>='".$yfT."' AND AttDate<='".$ytT."' group by AttDate", $con); $TPH=mysql_query("select * from ".$AttTable." where EmployeeID=".$ResEmp['EmployeeID']." AND (AttValue='PH' AttValue='APH') AND AttDate>='".$yfT."' AND AttDate<='".$ytT."' group by AttDate", $con); $THF=mysql_query("select * from ".$AttTable." where EmployeeID=".$ResEmp['EmployeeID']." AND AttValue='HF' AND AttDate>='".$yfT."' AND AttDate<='".$ytT."' group by AttDate", $con); 
 $TC_CH=mysql_num_rows($TCH); $TC_SH=mysql_num_rows($TSH); $TC_PH=mysql_num_rows($TPH); $TC_HF=mysql_num_rows($THF); 
 $TCountCH=$TC_CH/2; $TCountSH=$TC_SH/2; $TCountPH=$TC_PH/2; $TCountHF=$TC_HF/2; 
 $TTotW=$resTotL['PR']+$resTotL['OD']+$TCountCH+$TCountSH+$TCountPH+$TCountHF; 
 $TotWDWithHo=$TTotW+$resTotL['HO'];
}
elseif($tt<$pp AND $tt2>=$pp)
{ 
 $TCH=mysql_query("select * from ".$AttTable2." where EmployeeID=".$ResEmp['EmployeeID']." AND (AttValue='CH' OR AttValue='ACH') AND AttDate>='".$yfT."' AND AttDate<'".$ExpMonthDate."' group by AttDate", $con); $TSH=mysql_query("select * from ".$AttTable2." where EmployeeID=".$ResEmp['EmployeeID']." AND (AttValue='SH' OR AttValue='ASH') AND AttDate>='".$yfT."' AND AttDate<'".$ExpMonthDate."' group by AttDate", $con); $TPH=mysql_query("select * from ".$AttTable2." where EmployeeID=".$ResEmp['EmployeeID']." AND (AttValue='PH' OR AttValue='APH') AND AttDate>='".$yfT."' AND AttDate<'".$ExpMonthDate."' group by AttDate", $con); $THF=mysql_query("select * from ".$AttTable2." where EmployeeID=".$ResEmp['EmployeeID']." AND AttValue='HF' AND AttDate>='".$yfT."' AND AttDate<'".$ExpMonthDate."' group by AttDate", $con); 
 $TC_CH=mysql_num_rows($TCH); $TC_SH=mysql_num_rows($TSH); $TC_PH=mysql_num_rows($TPH); $TC_HF=mysql_num_rows($THF); 
 
 $TCH2=mysql_query("select * from ".$AttTable." where EmployeeID=".$ResEmp['EmployeeID']." AND (AttValue='CH' OR AttValue='ACH') AND AttDate>='".$ExpMonthDate."' AND AttDate<='".$ytT."' group by AttDate", $con); $TSH2=mysql_query("select * from ".$AttTable." where EmployeeID=".$ResEmp['EmployeeID']." AND (AttValue='SH' OR AttValue='ASH') AND AttDate>='".$ExpMonthDate."' AND AttDate<='".$ytT."' group by AttDate", $con); $TPH2=mysql_query("select * from ".$AttTable." where EmployeeID=".$ResEmp['EmployeeID']." AND (AttValue='PH' OR AttValue='APH') AND AttDate>='".$ExpMonthDate."' AND AttDate<='".$ytT."' group by AttDate", $con); $THF2=mysql_query("select * from ".$AttTable." where EmployeeID=".$ResEmp['EmployeeID']." AND AttValue='HF' AND AttDate>='".$ExpMonthDate."' AND AttDate<='".$ytT."' group by AttDate", $con); 
 $TC2_CH=mysql_num_rows($TCH2); $TC2_SH=mysql_num_rows($TSH2); 
 $TC2_PH=mysql_num_rows($TPH2); $TC2_HF=mysql_num_rows($THF2);
 $TCountCH=($TC_CH+$TC2_CH)/2; $TCountSH=($TC_SH+$TC2_SH)/2; $TCountPH=($TC_PH+$TC2_PH)/2; $TCountHF=($TC_HF+$TC_HF)/2; 
 $TTotW=$resTotL['PR']+$resTotL['OD']+$TCountCH+$TCountSH+$TCountPH+$TCountHF; 
 $TotWDWithHo=$TTotW+$resTotL['HO']; 
}

$tt=strtotime(date($_REQUEST['Y']."-".$_REQUEST['m']."-".$i)); 
if($tt<$pp){$tab=$AttTable2; }else{$tab=$AttTable; }

$TCH=mysql_query("select * from ".$AttTable." where EmployeeID=".$ResEmp['EmployeeID']." AND (AttValue='CH' OR AttValue='ACH') AND AttDate>='".$yfT."' AND AttDate<='".$ytT."' group by AttDate", $con); $TSH=mysql_query("select * from ".$AttTable." where EmployeeID=".$ResEmp['EmployeeID']." AND (AttValue='SH' OR AttValue='ASH') AND AttDate>='".$yfT."' AND AttDate<='".$ytT."' group by AttDate", $con); $TPH=mysql_query("select * from ".$AttTable." where EmployeeID=".$ResEmp['EmployeeID']." AND (AttValue='PH' OR AttValue='APH') AND AttDate>='".$yfT."' AND AttDate<='".$ytT."' group by AttDate", $con); $THF=mysql_query("select * from ".$AttTable." where EmployeeID=".$ResEmp['EmployeeID']." AND AttValue='HF' AND AttDate>='".$yfT."' AND AttDate<='".$ytT."' group by AttDate", $con); 

//$TC_W=mysql_num_rows($TW); $TC_OD=mysql_num_rows($TOD); $TC_HO=mysql_num_rows($THO); 
//$TCountW=$TC_W; $TCountOD=$TC_OD; $TCountHO=$TC_HO;

$TC_CH=mysql_num_rows($TCH); $TC_SH=mysql_num_rows($TSH); $TC_PH=mysql_num_rows($TPH); 
$TC_HF=mysql_num_rows($THF); 
$TCountCH=$TC_CH/2; $TCountSH=$TC_SH/2; $TCountPH=$TC_PH/2; $TCountHF=$TC_HF/2; 

//$TTotW=$TCountW+$TCountOD+$TCountCH+$TCountSH+$TCountPH+$TCountHF; 
//$TotWDWithHo=$TTotW+$TCountHO;

$TTotW=$resTotL['PR']+$resTotL['OD']+$TCountCH+$TCountSH+$TCountPH+$TCountHF; 
$TotWDWithHo=$TTotW+$resTotL['HO'];

/*$TotLL=mysql_query("select SUM(MonthAtt_TotLeave)as TotLeave from hrm_employee_monthatt where EmployeeID=".$ResEmp['EmployeeID']." AND Year=".$Y, $con); 
$resTotLL=mysql_fetch_array($TotLL);*/
?> 
<td class="bodyy" align="center"><b><?php echo $resTotL['TotLeave']; ?></b></td> 
<td class="bodyy" align="center"><b><?php echo $resTotL['HO']; ?></b></td>	
<td class="bodyy" align="center"><b><?php echo $TTotW; ?>&nbsp;</b></td>    
<?php /*<td class="bodyy" align="center"><b><?php echo $TotWDWithHo; ?>&nbsp;</b></td> */ ?>
</tr>
<?php } ?>
</tbody>
</div>
<?php $Sno++; } ?> 
<?php } ?>
	   </table>
	    </td>
	  </tr>
   <tr>
      <td align="left"><table border="0">
		<tr>
		 <td align="left"><input type="button" name="back" id="back" style="width:90px;display:block; background-color:#008080;color:#FFFFFF;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"></td>
		 <td width="100">&nbsp;</td>
		</tr></table>
      </td>
   </tr>
  </table>
 </form>     
</td>
<?php //*********************************************** Close ********************************/ ?>    
  

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
