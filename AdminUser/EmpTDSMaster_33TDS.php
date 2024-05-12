<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//require_once('PhpFile/AttendanceP.php');
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
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/MasterAjaxCall.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script type="text/javascript" src=""></script>
<script type="text/javascript" language="javascript">
function SelectMonth(value) 
{ var D = document.getElementById("Department").value; var Y = document.getElementById("Year").value; var x = 'EmpTDSMaster.php?m='+value+'&D='+D+'&Y='+Y+'&act=441&ee=421&dd=true2&c=false&dd=dreefoultValue&ud=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False'; window.location=x;}
				
function SelectYear(value,m) 
{ var D = document.getElementById("Department").value;  var x = 'EmpTDSMaster.php?m='+m+'&D='+D+'&Y='+value+'&act=441&ee=421&dd=true2&c=false&dd=dreefoultValue&ud=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False'; window.location=x;}													
								  
function SelectMonthDept(value)
{ var M = document.getElementById("Month").value; var Y = document.getElementById("Year").value;  var x = 'EmpTDSMaster.php?m='+M+'&D='+value+'&Y='+Y+'&act=441&ee=421&dd=true2&c=false&dd=dreefoultValue&ud=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False'; window.location=x; }
  
/*
function EditAOI(E,C,Y,U)
{window.open("EmpEditAnyOtherIncome.php?E="+E+"&C="+C+"&Y="+Y+"&U="+U,"AOI","menubar=no,scrollbars=yes,resizable=no,directories=no,width=420,height=310");}

function EditInvDecl(E,C,Y,U)
{window.open("EmpEditInvesDecl.php?E="+E+"&C="+C+"&Y="+Y+"&U="+U,"InvestDecl","menubar=no,scrollbars=yes,resizable=no,directories=no,width=900,height=650");}
*/

function EditDA(E,C,YI,U,M,Y)
{window.open("EmpEditDA.php?E="+E+"&C="+C+"&YI="+YI+"&U="+U+"&M="+M+"&Y="+Y,"DAForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=420,height=450");}

function EditLeEnCash(E,C,YI,U,M,Y)
{window.open("EmpEditLeEnCash.php?E="+E+"&C="+C+"&YI="+YI+"&U="+U+"&M="+M+"&Y="+Y,"DAForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=420,height=450");}

function EditArrear(E,C,YI,U,M,Y)
{window.open("EmpEditArrear.php?E="+E+"&C="+C+"&YI="+YI+"&U="+U+"&M="+M+"&Y="+Y,"DAForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=420,height=450");}

function EditIncent(E,C,YI,U,M,Y)
{window.open("EmpEditIncentive.php?E="+E+"&C="+C+"&YI="+YI+"&U="+U+"&M="+M+"&Y="+Y,"DAForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=420,height=450");}

function EditBonus(E,C,YI,U,M,Y)
{window.open("EmpEditBonus.php?E="+E+"&C="+C+"&YI="+YI+"&U="+U+"&M="+M+"&Y="+Y,"DAForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=420,height=450");}

function EditVarAduj(E,C,YI,U,M,Y)
{window.open("EmpEditVarAduj.php?E="+E+"&C="+C+"&YI="+YI+"&U="+U+"&M="+M+"&Y="+Y,"VarAdujForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=420,height=450");}

function EditPerforPay(E,C,YI,U,M,Y)
{window.open("EmpEditPerforPay.php?E="+E+"&C="+C+"&YI="+YI+"&U="+U+"&M="+M+"&Y="+Y,"RefPayForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=420,height=450");}

function EditCCA(E,C,YI,U,M,Y)
{window.open("EmpEditCCA.php?E="+E+"&C="+C+"&YI="+YI+"&U="+U+"&M="+M+"&Y="+Y,"RefPayForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=420,height=450");}

function EditRA(E,C,YI,U,M,Y)
{window.open("EmpEditRA.php?E="+E+"&C="+C+"&YI="+YI+"&U="+U+"&M="+M+"&Y="+Y,"RefPayForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=420,height=450");}
 
function EditSalaryArrear(E,C,YI,U,M,Y)
{window.open("EditSalaryArrear.php?E="+E+"&C="+C+"&YI="+YI+"&U="+U+"&M="+M+"&Y="+Y,"RefPayForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=620,height=170");} 

function EditSalaryTaxSaving(E,C,YI,U,M,Y)
{window.open("EditSalaryTaxSaving.php?E="+E+"&C="+C+"&YI="+YI+"&U="+U+"&M="+M+"&Y="+Y,"RefPayForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=620,height=170");}

function EditTDS(E,C,YI,U,M,Y)
{window.open("EditTDS.php?E="+E+"&C="+C+"&YI="+YI+"&U="+U+"&M="+M+"&Y="+Y,"RefPayForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=400,height=170");} 


function FunClrCheck(v)
{ 
 if(document.getElementById("ClrCheck_"+v).checked==true)
 { document.getElementById("tr_"+v).style.background='#0080FF'; document.getElementById("tdcheck_"+v).style.background='#0080FF'; document.getElementById("td1_"+v).style.background='#0080FF'; document.getElementById("td2_"+v).style.background='#0080FF'; document.getElementById("td3_"+v).style.background='#0080FF'; document.getElementById("td4_"+v).style.background='#0080FF'; document.getElementById("td5_"+v).style.background='#0080FF'; document.getElementById("td6_"+v).style.background='#0080FF'; document.getElementById("td7_"+v).style.background='#0080FF'; document.getElementById("td8_"+v).style.background='#0080FF'; document.getElementById("td9_"+v).style.background='#0080FF'; document.getElementById("td10_"+v).style.background='#0080FF'; document.getElementById("td11_"+v).style.background='#0080FF'; document.getElementById("td12_"+v).style.background='#0080FF'; document.getElementById("td13_"+v).style.background='#0080FF'; document.getElementById("td14_"+v).style.background='#0080FF'; document.getElementById("td15_"+v).style.background='#0080FF'; document.getElementById("td16_"+v).style.background='#0080FF'; document.getElementById("td17_"+v).style.background='#0080FF'; document.getElementById("td18_"+v).style.background='#0080FF'; document.getElementById("td19_"+v).style.background='#0080FF';
 } 
 else if(document.getElementById("ClrCheck_"+v).checked==false)
 {
  if(v%2!=0)
  { document.getElementById("tr_"+v).style.background='#D9D1E7'; document.getElementById("tdcheck_"+v).style.background='#D9D1E7'; document.getElementById("td1_"+v).style.background='#D9D1E7'; document.getElementById("td2_"+v).style.background='#D9D1E7'; document.getElementById("td3_"+v).style.background='#D9D1E7'; document.getElementById("td4_"+v).style.background='#D9D1E7'; document.getElementById("td5_"+v).style.background='#D9D1E7'; document.getElementById("td6_"+v).style.background='#D9D1E7'; document.getElementById("td7_"+v).style.background='#D9D1E7'; document.getElementById("td8_"+v).style.background='#D9D1E7'; document.getElementById("td9_"+v).style.background='#D9D1E7'; document.getElementById("td10_"+v).style.background='#D9D1E7'; document.getElementById("td11_"+v).style.background='#D9D1E7'; document.getElementById("td12_"+v).style.background='#D9D1E7'; document.getElementById("td13_"+v).style.background='#D9D1E7'; document.getElementById("td14_"+v).style.background='#D9D1E7'; document.getElementById("td15_"+v).style.background='#D9D1E7'; document.getElementById("td16_"+v).style.background='#D9D1E7'; document.getElementById("td17_"+v).style.background='#D9D1E7'; document.getElementById("td18_"+v).style.background='#D9D1E7'; document.getElementById("td19_"+v).style.background='#FFC1FF';}
  else if(v%2==0)
  { document.getElementById("tr_"+v).style.background='#FFFFFF'; document.getElementById("tdcheck_"+v).style.background='#FFFFFF'; document.getElementById("td1_"+v).style.background='#FFFFFF'; document.getElementById("td2_"+v).style.background='#FFFFFF'; document.getElementById("td3_"+v).style.background='#FFFFFF'; document.getElementById("td4_"+v).style.background='#FFFFFF'; document.getElementById("td5_"+v).style.background='#FFFFFF'; document.getElementById("td6_"+v).style.background='#FFFFFF'; document.getElementById("td7_"+v).style.background='#FFFFFF'; document.getElementById("td8_"+v).style.background='#FFFFFF'; document.getElementById("td9_"+v).style.background='#FFFFFF'; document.getElementById("td10_"+v).style.background='#FFFFFF'; document.getElementById("td11_"+v).style.background='#FFFFFF'; document.getElementById("td12_"+v).style.background='#FFFFFF'; document.getElementById("td13_"+v).style.background='#FFFFFF'; document.getElementById("td14_"+v).style.background='#FFFFFF'; document.getElementById("td15_"+v).style.background='#FFFFFF'; document.getElementById("td16_"+v).style.background='#FFFFFF'; document.getElementById("td17_"+v).style.background='#FFFFFF'; document.getElementById("td18_"+v).style.background='#FFFFFF'; document.getElementById("td19_"+v).style.background='#FFC1FF'; }
 }
}
 
</script>   
</head>
<body class="body">
<table class="table" border="0">
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
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<?php if($_REQUEST['m']==1){$SelM='January';} if($_REQUEST['m']==2){$SelM='February';} if($_REQUEST['m']==3){$SelM='March';}if($_REQUEST['m']==4){$SelM='April';} 
if($_REQUEST['m']==5){$SelM='May';} if($_REQUEST['m']==6){$SelM='June';} if($_REQUEST['m']==7){$SelM='July';} if($_REQUEST['m']==8){$SelM='August';} 
if($_REQUEST['m']==9){$SelM='September';} if($_REQUEST['m']==10){$SelM='October';} if($_REQUEST['m']==11){$SelM='November';} if($_REQUEST['m']==12){$SelM='December';} ?> 	  
<table border="0" style="margin-top:0px; width:100%; height:350px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td style="width:250px;" align="right">&nbsp;<font color="#2D002D" style='font-family:Times New Roman;' size="4">
	  <b>TDS Master : Year :</b></font></td>
	  <td style="width:80px;"><select style="font-size:12px; width:60px; height:20px; background-color:#DDFFBB;" name="Year" id="Year" onChange="SelectYear(this.value,<?php echo $_REQUEST['m']; ?>)">
	  <option value="<?php echo $_REQUEST['Y']; ?>"><?php echo $_REQUEST['Y']; ?></option>
	  <option value="2014">2014</option><option value="2013">2013</option></select></td> 
	  <td width="100" align="right"><font color="#2D002D" style='font-family:Times New Roman;' size="4"><b>Month :&nbsp;</b></font></td>
	  <td class="td1" style="font-size:11px; width:120px;" align="left">
      <select style="font-size:12px; width:100px; height:20px; background-color:#DDFFBB; display:block;" name="Month" id="Month" onChange="SelectMonth(this.value)">
<?php if(date("m")==4) { ?><option value="<?php echo $_REQUEST['m']; ?>"><?php echo $SelM; ?><option value="4">April</option><option value="3">March</option><?php } ?>				  
<?php if(date("m")==5) { ?><option value="<?php echo $_REQUEST['m']; ?>"><?php echo $SelM; ?><option value="5">May</option><option value="4">April</option><?php } ?>	  
<?php if(date("m")==6) { ?><option value="<?php echo $_REQUEST['m']; ?>"><?php echo $SelM; ?><option value="6">June</option><option value="5">May</option><option value="4">April</option><option value="3">March</option><?php } ?>
<?php if(date("m")==7) { ?><option value="<?php echo $_REQUEST['m']; ?>"><?php echo $SelM; ?><option value="7">July</option><option value="6">June</option><option value="5">May</option><option value="4">April</option><?php } ?>	  
<?php if(date("m")==8) { ?><option value="<?php echo $_REQUEST['m']; ?>"><?php echo $SelM; ?><option value="8">August</option><option value="7">July</option><option value="6">June</option><option value="5">May</option><option value="4">April</option><?php } ?>	  
<?php if(date("m")==9) { ?><option value="<?php echo $_REQUEST['m']; ?>"><?php echo $SelM; ?><option value="9">September</option><option value="8">August</option><option value="7">July</option><option value="6">June</option><option value="5">May</option><option value="4">April</option><?php } ?>	
<?php if(date("m")==10) { ?><option value="<?php echo $_REQUEST['m']; ?>"><?php echo $SelM; ?><option value="10">October</option><option value="9">September</option><option value="8">August</option><option value="7">July</option><option value="6">June</option><option value="5">May</option><option value="4">April</option><?php } ?>	
<?php if(date("m")==11) { ?><option value="<?php echo $_REQUEST['m']; ?>"><?php echo $SelM; ?><option value="11">November</option><option value="10">October</option><option value="9">September</option><option value="8">August</option><option value="7">July</option><option value="6">June</option><option value="5">May</option><option value="4">April</option><?php } ?>	
<?php if(date("m")==12) { ?><option value="<?php echo $_REQUEST['m']; ?>"><?php echo $SelM; ?><option value="12">December</option><option value="11">November</option><option value="10">October</option><option value="9">September</option><option value="8">August</option><option value="7">July</option><option value="6">June</option><option value="5">May</option><option value="4">April</option><?php } ?>
<?php if(date("m")==1) { ?><option value="<?php echo $_REQUEST['m']; ?>"><?php echo $SelM; ?></option><option value="1">January</option><option value="12">December</option><option value="11">November</option><option value="10">October</option><option value="9">September</option><option value="8">August</option><option value="7">July</option><option value="6">June</option><option value="5">May</option><option value="4">April</option><?php } ?>
<?php if(date("m")==2) { ?><option value="<?php echo $_REQUEST['m']; ?>"><?php echo $SelM; ?></option><option value="2">February</option><option value="1">January</option><option value="12">December</option><option value="11">November</option><option value="10">October</option><option value="9">September</option><option value="8">August</option><option value="7">July</option><option value="6">June</option><option value="5">May</option><option value="4">April</option><?php } ?>
<?php if(date("m")==3) { ?><option value="<?php echo $_REQUEST['m']; ?>"><?php echo $SelM; ?></option><option value="3">March</option><option value="2">February</option><option value="1">January</option><option value="12">December</option><option value="11">November</option><option value="10">October</option><option value="9">September</option><option value="8">August</option><option value="7">July</option><option value="6">June</option><option value="5">May</option><option value="4">April</option><?php } ?>
      </select>
      </td>
	   <td class="td1" style="font-size:11px; width:170px;">			   
	   <select style="font-size:11px; width:120px; height:19px; background-color:#DDFFBB; display:block;" name="Department" id="Department" onChange="SelectMonthDept(this.value)">
<?php if($_REQUEST['D']!='All') { $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['D'], $con); $resD=mysql_fetch_assoc($sqlD); ?> 
	  <option value="<?php echo $_REQUEST['D']; ?>" style="margin-left:0px; background-color:#84D9D5;">&nbsp;<?php echo $resD['DepartmentCode']; ?></option>  
<?php  } else { ?>	  <option value="All" style="margin-left:0px; background-color:#84D9D5;">&nbsp;All</option><?php } ?>						   
	   <?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?><option value="All">&nbsp;All</option></select>
	   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
	   <input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
	  </td>	 
	  <td style="color:#400000;font-family:Times New Roman; width:1000px; font-size:14px;" align=""><b>&nbsp;IFOS :</b>&nbsp;
	  <font style="font:Times New Roman; color:#005500; font-size:18px;font-weight:bold;">Income From Other Source</font>
	  &nbsp;&nbsp;&nbsp;<b>InvDecl :</b>&nbsp; <font style="font:Times New Roman; color:#005500; font-size:18px;font-weight:bold;">Investment Declaration</font></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
  <td valign="top">
   <table border="1" valign="top" style="width:1250px;">
<tr bgcolor="#7a6189">
	<td colspan="6" align="center" style="color:#FFFFFF;" class="All_100"><b>General Details</b></td>
	<td colspan="2" align="center" style="color:#FFFFFF;" class="All_100"><b>Edit(One Time)</b></td>
	<td colspan="9" align="center" style="color:#FFFFFF;" class="All_50"><b>SalTDS</b></td>
	<td colspan="2" align="center" style="color:#FFFFFF;" class="All_50"><b>Salary</b></td> 
        <td rowspan="2" align="center" style="color:#FFFFFF;" class="All_50">&nbsp;<b>TDS</b>&nbsp;</td>
<?php /*	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Reports</b></td> */ ?>
 </tr>
 <tr bgcolor="#7a6189">
        <td align="center" style="color:#FFFFFF;" class="All_30"><b>Click</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_30"><b>SN</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>EC</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>
<?php /* <td align="center" style="color:#FFFFFF;" class="All_100"><b>HeadQuater</b></td> */ ?>
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>Department</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_180"><b>Designation</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>IFOS</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>InvDecl</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>DA</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Leave Encash</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Arrear</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Incen tive</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Bonus</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Var. Adjust</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Perfor. Pay</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>CCA</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>RA</b></td>
	<td align="center" style="color:#FFFFFF;background-color:#5BADFF;" class="All_50"><b>Arrear</b></td>
        <td align="center" style="color:#FFFFFF;background-color:#5BADFF;" class="All_50"><b>Tax Saving</b></td>
<?php /*	<td align="center" style="color:#FFFFFF;" class="All_50"><b>&nbsp;</b></td> */ ?>
 </tr>
<?php if($_REQUEST['D']!='All'){ $sqlDP = mysql_query("SELECT hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpStatus,HqId,DepartmentId,DesigId,Gender,Married,DR FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmpStatus!='De' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$_REQUEST['D']." order by EmpCode ASC", $con); }
      if($_REQUEST['D']=='All'){ $sqlDP=mysql_query("select hrm_employee.*,hrm_employee_general.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId!=17 AND hrm_employee_general.DepartmentId!=18 AND hrm_employee_general.DepartmentId!=23 order by EmpCode ASC", $con); }
$Sno=1;  while($resDP = mysql_fetch_assoc($sqlDP)) { 
	  if($resDP['DR']=='Y'){$MS='Dr.';} elseif($resDP['Gender']=='M'){$MS='Mr.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='Y'){$MS='Mrs.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='N'){$MS='Miss.';}  $Name=$MS.' '.$resDP['Fname'].' '.$resDP['Sname'].' '.$resDP['Lname'];
	  $LEC=strlen($resDP['EmpCode']); 
      if($LEC==1){$EC='000'.$resDP['EmpCode'];} if($LEC==2){$EC='00'.$resDP['EmpCode'];} if($LEC==3){$EC='0'.$resDP['EmpCode'];} if($LEC>=4){$EC=$resDP['EmpCode'];}
	  $E=$resDP['EmployeeID']; $C=$CompanyId; $YI=$YearId; $U=$UserId; $M=$_REQUEST['m']; $Y=$_REQUEST['Y'];
	  //$sqlCtc=mysql_query("select Tot_CTC from hrm_employee_ctc where EmployeeID=".$resDP['EmployeeID']." AND Status='A'", $con); $resCtc=mysql_fetch_assoc($sqlCtc);
?> 	 
 <tr id="tr_<?php echo $Sno; ?>" bgcolor="<?php if($Sno%2==0){ echo '#FFFFFF'; } else {echo '#D9D1E7';}?>"> 
                <td align="center" id="tdcheck_<?php echo $Sno; ?>"><input type="checkbox" id="ClrCheck_<?php echo $Sno; ?>" onClick="FunClrCheck(<?php echo $Sno; ?>)"/></td>
		<td id="td1_<?php echo $Sno; ?>" align="center" style="" class="All_30"><?php echo $Sno; ?></td>
		<td id="td2_<?php echo $Sno; ?>" align="center" style="" class="All_50"><?php echo $EC; ?></td>
		<td id="td3_<?php echo $Sno; ?>" style="" class="All_200">&nbsp;<?php echo $Name; ?></td>
<?php /* <td style="" class="All_100">&nbsp;
		<?php $sqlHQ = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$resDP['HqId'], $con) or die(mysql_error()); 
		      $resHQ = mysql_fetch_assoc($sqlHQ); echo $resHQ['HqName'];?> </td> */ ?>
		<td id="td4_<?php echo $Sno; ?>" style="" class="All_100">&nbsp;
		<?php $sqlDept = mysql_query("SELECT DepartmentCode FROM hrm_department WHERE DepartmentId=".$resDP['DepartmentId'], $con) or die(mysql_error()); 
		      $resDept = mysql_fetch_assoc($sqlDept); echo $resDept['DepartmentCode'];?>
		</td>
		<td id="td5_<?php echo $Sno; ?>" style="" class="All_180">&nbsp;
		<?php $sqlDesig = mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$resDP['DesigId'], $con) or die(mysql_error()); 
		      $resDesig = mysql_fetch_assoc($sqlDesig); echo $resDesig['DesigName'];?>
		</td>
		<td id="td6_<?php echo $Sno; ?>" align="center" valign="middle" class="All_50">
<a href="#"><img src="images/select.png" border="0" alt="Edit" onClick="EditAOI(<?php echo $E.', '.$C.', '.$YI.', '.$U; ?>)"></a></td>
		<td id="td7_<?php echo $Sno; ?>" align="center" valign="middle" class="All_50">
<a href="#"><img src="images/select.png" border="0" alt="Edit" onClick="EditInvDecl(<?php echo $E.', '.$C.', '.$YI.', '.$U; ?>)"></a></td>
		<td id="td8_<?php echo $Sno; ?>" align="center" valign="middle" class="All_50">
<a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="EditDA(<?php echo $E.', '.$C.', '.$YI.', '.$U.', '.$M.', '.$Y; ?>)"></a></td>
		<td id="td9_<?php echo $Sno; ?>" align="center" valign="middle" class="All_50">
<a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="EditLeEnCash(<?php echo $E.', '.$C.', '.$YI.', '.$U.', '.$M.', '.$Y; ?>)"></a></td>
		<td id="td10_<?php echo $Sno; ?>" align="center" valign="middle" class="All_50">
<a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="EditArrear(<?php echo $E.', '.$C.', '.$YI.', '.$U.', '.$M.', '.$Y; ?>)"></a></td>
		<td id="td11_<?php echo $Sno; ?>" align="center" valign="middle" class="All_50">
<a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="EditIncent(<?php echo $E.', '.$C.', '.$YI.', '.$U.', '.$M.', '.$Y; ?>)"></a></td>
		<td id="td12_<?php echo $Sno; ?>" align="center" valign="middle" class="All_50">
<a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="EditBonus(<?php echo $E.', '.$C.', '.$YI.', '.$U.', '.$M.', '.$Y; ?>)"></a></td>
        <td id="td13_<?php echo $Sno; ?>" align="center" valign="middle" class="All_50">
<a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="EditVarAduj(<?php echo $E.', '.$C.', '.$YI.', '.$U.', '.$M.', '.$Y; ?>)"></a></td>
		<td id="td14_<?php echo $Sno; ?>" align="center" valign="middle" class="All_50">
<a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="EditPerforPay(<?php echo $E.', '.$C.', '.$YI.', '.$U.', '.$M.', '.$Y; ?>)"></a></td>
        <td id="td15_<?php echo $Sno; ?>" align="center" valign="middle" class="All_50">
<a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="EditCCA(<?php echo $E.', '.$C.', '.$YI.', '.$U.', '.$M.', '.$Y; ?>)"></a></td>
		<td id="td16_<?php echo $Sno; ?>" align="center" valign="middle" class="All_50">
<a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="EditRA(<?php echo $E.', '.$C.', '.$YI.', '.$U.', '.$M.', '.$Y; ?>)"></a></td>
         
        <td id="td17_<?php echo $Sno; ?>" align="center" valign="middle" class="All_50" style="background-color:#FFFFD2;">
<a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="EditSalaryArrear(<?php echo $E.', '.$C.', '.$YI.', '.$U.', '.$M.', '.$Y; ?>)"></a></td>

         <td id="td18_<?php echo $Sno; ?>" align="center" valign="middle" class="All_50" style="background-color:#FFFFD2;">
<a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="EditSalaryTaxSaving(<?php echo $E.', '.$C.', '.$YI.', '.$U.', '.$M.', '.$Y; ?>)"></a></td>

         <td id="td19_<?php echo $Sno; ?>" align="center" valign="middle" class="All_50" style="background-color:#FFC1FF;">
<a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="EditTDS(<?php echo $E.', '.$C.', '.$YI.', '.$U.', '.$M.', '.$Y; ?>)"></a></td>

<?php /*		
		<td align="center" valign="middle" class="All_50">
<?php  if($resCtc['Tot_CTC']>=200000) { ?><a href="#"><img src="images/select.png" border="0" alt="Edit" onClick="EditReports(<?php echo $E.', '.$C.', '.$Y.', '.$U; ?>)"></a><?php } ?>
		</td>
*/ ?>		
</tr>
<?php $Sno++; }?>
<?php /* <a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="EditAnnTDS(<?php echo $E.', '.$C.', '.$Y.', '.$U; ?>)"></a> */ ?>
<tr>
  <td align="left" class="fontButton" style="width:100%;" colspan="<?php if($_REQUEST['m']==1 OR $_REQUEST['m']==10){echo '21';} else{echo '20';}?>">
    <table border="0">
     <tr>
	  <td align="left"><input type="button" name="back" id="back" style="width:90px;display:block;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"></td>
   </tr>
   </table>
  </td>
 </tr>
<?php } ?> 
</table>
		
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
		
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