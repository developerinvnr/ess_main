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
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.th{font-family:Times New Roman;font-size:12px;font-weight:bold;text-align:center;color:#FFFFFF; background-color:#376A9D;height:24px;} 
.tdl{font-family:Times New Roman;font-size:14px;color:#000000;}
.tdr{font-family:Times New Roman;font-size:12px;text-align:right;color:#000000;}
.tdc{font-family:Times New Roman;font-size:12px;text-align:center;color:#000000;}
.selecti{font-family:Times New Roman;font-size:12px;background-color:#DDFFBB;}
.inner_table{height:550px;overflow-y:auto;width:auto;}
</style>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<script type="text/javascript" language="javascript">

function FunClick()  
{
 if(document.getElementById("Month").value==''){alert("select month!"); return false;}
 else if(document.getElementById("Year").value==''){alert("select year!"); return false;}
 else if(document.getElementById("Department").value==''){alert("select department!"); return false;}
 else{ window.location='PaySlipReports.php?yy=true&g=true&vv=false&valucchk=coorect&pointval=010&ckk=234&find=001100&m='+document.getElementById("Month").value+'&D='+document.getElementById("Department").value+'&Y='+document.getElementById("Year").value+'&con='+document.getElementById("V1").value+'&car='+document.getElementById("V2").value+'&inc='+document.getElementById("V3").value+'&arr='+document.getElementById("V4").value+'&va='+document.getElementById("V5").value+'&pp='+document.getElementById("V6").value+'&cca='+document.getElementById("V7").value+'&ra='+document.getElementById("V8").value+'&vr='+document.getElementById("V9").value+'&arrbas='+document.getElementById("V10").value+'&arrhr='+document.getElementById("V11").value+'&arrcar='+document.getElementById("V12").value+'&arrsp='+document.getElementById("V13").value+'&arrcon='+document.getElementById("V14").value+'&arrpf='+document.getElementById("V15").value+'&arresic='+document.getElementById("V16").value+'&bonus='+document.getElementById("V17").value+'&lenc='+document.getElementById("V18").value+'&taxcea='+document.getElementById("V19").value+'&taxmr='+document.getElementById("V20").value+'&taxlta='+document.getElementById("V21").value+'&dedvc='+document.getElementById("V22").value+'&dedadj='+document.getElementById("V23").value+'&dedca='+document.getElementById("V24").value+'&ta='+document.getElementById("V25").value+'&arrencash='+document.getElementById("V26").value; }
}

//1-con 2-car  3-inc  4-arr  5-va  6-pp  7-cca  8-ra  9-vr  10-arrbas  11-arrhr  12-arrcar  13-arrsp 
//14-arrcon  15-arrpf  16-arresic  17-bonus  18-lenc  19-taxcea  20-taxmr  21-taxlta  22-dedvc  23-dedadj  
//24-dedca

function PrintExportsPage()
{ var M = document.getElementById("Month").value; var Y = document.getElementById("Year").value; 
  var D = document.getElementById("Department").value; var C = document.getElementById("ComId").value;
  window.open('PaySlipReportExp.php?m='+M+'&D='+D+'&Y='+Y+'&C='+C+'&con='+document.getElementById("V1").value+'&car='+document.getElementById("V2").value+'&inc='+document.getElementById("V3").value+'&arr='+document.getElementById("V4").value+'&va='+document.getElementById("V5").value+'&pp='+document.getElementById("V6").value+'&cca='+document.getElementById("V7").value+'&ra='+document.getElementById("V8").value+'&vr='+document.getElementById("V9").value+'&arrbas='+document.getElementById("V10").value+'&arrhr='+document.getElementById("V11").value+'&arrcar='+document.getElementById("V12").value+'&arrsp='+document.getElementById("V13").value+'&arrcon='+document.getElementById("V14").value+'&arrpf='+document.getElementById("V15").value+'&arresic='+document.getElementById("V16").value+'&bonus='+document.getElementById("V17").value+'&lenc='+document.getElementById("V18").value+'&taxcea='+document.getElementById("V19").value+'&taxmr='+document.getElementById("V20").value+'&taxlta='+document.getElementById("V21").value+'&dedvc='+document.getElementById("V22").value+'&dedadj='+document.getElementById("V23").value+'&dedca='+document.getElementById("V24").value+'&ta='+document.getElementById("V25").value+'&arrencash='+document.getElementById("V26").value,'PFRegister','scrollbars=yes,resizable=no,menubar=no,width=500,height=300'); }
  
function OpenPaySlip(E,M,Y,YI,C)
{window.open("EmpPaySlip.php?yy=true&g=true&vv=false&valucchk=coorect&pointval=010&ckk=234&find=001100&E="+E+"&M="+M+"&Y="+Y+"&YI="+YI+"&C="+C,"PayForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=850,height=670");}

//function OpenTDS(E,M,YI,C)
//{window.open("EmpTDSDetails.php?E="+E+"&M="+M+"&YI="+YI+"&C="+C,"TDSForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=850,height=600");}

function PrintPay(EI,M,Y,YI)
{ //alert(EI+"-"+M+"-"+Y+"-"+YI); 
  var CI=document.getElementById("ComId").value;
  window.open("PrintPaySlip.php?yy=true&g=true&vv=false&valucchk=coorect&pointval=010&ckk=234&find=001100&action=Print&EI="+EI+"&m="+M+"&Y="+Y+"&YI="+YI+"&CI="+CI,"PrintForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=850,height=650");
}

function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#FF80FF'; } else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; }
}

function F(v)
{
 if(document.getElementById("I"+v).checked==true){ document.getElementById("V"+v).value=1; }
 else{document.getElementById("V"+v).value=0; } 
}

$(document).ready(function () { $("#table1").freezeHeader({ 'height': '450px' }); })
 
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
<?php //******************************************************************************** ?>
<?php //**************START*****START*****START******START******START*************************** ?>
<?php //************************************************************************************************ ?>	  
<table border="0" style="margin-top:0px; width:100%; height:350px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
  <table border="0">
   <tr>
	<td style="width:150px;font-family:Times New Roman;color:#2D002D;font-size:18px;">&nbsp;<b>PaySlip Reports</b></td>
	<td style="width:80px;font-family:Times New Roman;color:#2D002D;font-size:18px;text-align:right;"><b>Year :&nbsp;</b></td>
	  <td style="width:80px;"><select class="selecti" style="width:75px;" name="Year" id="Year" onChange="SelectYear(this.value,<?php echo $_REQUEST['m']; ?>)"><option value="<?php echo $_REQUEST['Y']; ?>"><?php echo $_REQUEST['Y']; ?></option><?php for($i=date("Y")+1; $i>=2013; $i--){ ?>
<?php if($_REQUEST['Y']!=$i){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?>
<?php } ?></select></td> 
	  <td style="width:80px;font-family:Times New Roman;color:#2D002D;font-size:18px;text-align:right;"><b>Month :&nbsp;</b></td>
	  <td style="font-size:11px; width:120px;" align="left">
      <select class="selecti" style="width:100px;" name="Month" id="Month" onChange="SelectMonth(this.value)">
	  <option value="<?php echo $_REQUEST['m']; ?>" selected><?php echo date("F",strtotime(date("Y-".$_REQUEST['m']."-d"))); ?></option><?php for($i=1; $i<=12; $i++){?><option value="<?php echo $i;?>"><?php if($i==1){echo 'January';}elseif($i==2){echo 'February';}elseif($i==3){echo 'March';}elseif($i==4){echo 'April';}elseif($i==5){echo 'May';}elseif($i==6){echo 'June';}elseif($i==7){echo 'July';}elseif($i==8){echo 'August';}elseif($i==9){echo 'September';}elseif($i==10){echo 'October';}elseif($i==11){echo 'November';}elseif($i==12){echo 'December';} ?></option><?php } ?></select>
	  </td>
	  <td class="td1" style="font-size:11px; width:125px;">			   
	   <select class="selecti" style="width:120px;" name="Department" id="Department" onChange="SelectMonthDept(this.value)"><?php if($_REQUEST['D']!='All') { $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['D'], $con); $resD=mysql_fetch_assoc($sqlD); ?> 
	  <option value="<?php echo $_REQUEST['D']; ?>" style="margin-left:0px; background-color:#84D9D5;">&nbsp;<?php echo $resD['DepartmentCode']; ?></option><?php  } else { ?>	  <option value="All" style="margin-left:0px; background-color:#84D9D5;">&nbsp;All</option><?php } ?><?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?><option value="All">&nbsp;All</option></select>
	   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
	   <input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
	  </td>	 	 
	  <td><input type="button" value="click" style="width:60px;" onClick="FunClick()" /></td>
	  <td>&nbsp;</td>
	  <td style="color:#400000;font-family:Times New Roman;font-size:14px;"><b>&nbsp;<a href="#" onClick="PrintExportsPage()" style="text-decoration:none;"><b><u>Exports</u></b></a></td>
	</tr>
   </table>
  </td>
 </tr>
 <tr>
  <td class="tdl" style="width:100%;color:#A80054;">
<input type="checkbox" id="I1" onClick="F(1)" <?php if($_REQUEST['con']){echo 'checked';}?> /><input type="hidden" id="V1" value="<?php if($_REQUEST['con']>0){echo 1;}else{echo 0;}?>"/>Conv &nbsp; 
<input type="checkbox" id="I2" onClick="F(2)" <?php if($_REQUEST['car']){echo 'checked';}?> /><input type="hidden" id="V2" value="<?php if($_REQUEST['car']>0){echo 1;}else{echo 0;}?>"/>Car-Allow &nbsp;
<input type="checkbox" id="I3" onClick="F(3)" <?php if($_REQUEST['inc']){echo 'checked';}?> /><input type="hidden" id="V3" value="<?php if($_REQUEST['inc']>0){echo 1;}else{echo 0;}?>"/>Incentive &nbsp;
<input type="checkbox" id="I4" onClick="F(4)" <?php if($_REQUEST['arr']){echo 'checked';}?> /><input type="hidden" id="V4" value="<?php if($_REQUEST['arr']>0){echo 1;}else{echo 0;}?>"/>Arrear &nbsp;
<input type="checkbox" id="I5" onClick="F(5)" <?php if($_REQUEST['va']){echo 'checked';}?> /><input type="hidden" id="V5" value="<?php if($_REQUEST['va']>0){echo 1;}else{echo 0;}?>"/>Variable-Adj. &nbsp; 
<input type="checkbox" id="I6" onClick="F(6)" <?php if($_REQUEST['pp']){echo 'checked';}?> /><input type="hidden" id="V6" value="<?php if($_REQUEST['pp']>0){echo 1;}else{echo 0;}?>"/>Performance-pay &nbsp; 
<input type="checkbox" id="I7" onClick="F(7)" <?php if($_REQUEST['cca']){echo 'checked';}?> /><input type="hidden" id="V7" value="<?php if($_REQUEST['cca']>0){echo 1;}else{echo 0;}?>"/>CCA &nbsp; 
<input type="checkbox" id="I8" onClick="F(8)" <?php if($_REQUEST['ra']){echo 'checked';}?> /><input type="hidden" id="V8" value="<?php if($_REQUEST['ra']>0){echo 1;}else{echo 0;}?>"/>RA &nbsp;
<input type="checkbox" id="I9" onClick="F(9)" <?php if($_REQUEST['vr']){echo 'checked';}?> /><input type="hidden" id="V9" value="<?php if($_REQUEST['vr']>0){echo 1;}else{echo 0;}?>"/>Variable-Reim. &nbsp; 
<input type="checkbox" id="I10" onClick="F(10)" <?php if($_REQUEST['arrbas']){echo 'checked';}?> /><input type="hidden" id="V10" value="<?php if($_REQUEST['arrbas']>0){echo 1;}else{echo 0;}?>"/>Arr-Basic &nbsp; 
<input type="checkbox" id="I11" onClick="F(11)" <?php if($_REQUEST['arrhr']){echo 'checked';}?> /><input type="hidden" id="V11" value="<?php if($_REQUEST['arrhr']>0){echo 1;}else{echo 0;}?>"/>Arr HRA  &nbsp;  
<input type="checkbox" id="I12" onClick="F(12)" <?php if($_REQUEST['arrcar']){echo 'checked';}?> /><input type="hidden" id="V12" value="<?php if($_REQUEST['arrcar']>0){echo 1;}else{echo 0;}?>"/>Arr Car-Allow. &nbsp; 
<input type="checkbox" id="I13" onClick="F(13)" <?php if($_REQUEST['arrsp']){echo 'checked';}?> /><input type="hidden" id="V13" value="<?php if($_REQUEST['arrsp']>0){echo 1;}else{echo 0;}?>"/>Arr SP &nbsp; 
<input type="checkbox" id="I14" onClick="F(14)" <?php if($_REQUEST['arrcon']){echo 'checked';}?> /><input type="hidden" id="V14" value="<?php if($_REQUEST['arrcon']>0){echo 1;}else{echo 0;}?>"/>Arr Conv &nbsp;<br>

<input type="checkbox" id="I26" onClick="F(26)" <?php if($_REQUEST['arrencash']){echo 'checked';}?> /><input type="hidden" id="V26" value="<?php if($_REQUEST['arrencash']>0){echo 1;}else{echo 0;}?>"/>Arr LV-Encash
 
<input type="checkbox" id="I15" onClick="F(15)" <?php if($_REQUEST['arrpf']){echo 'checked';}?> /><input type="hidden" id="V15" value="<?php if($_REQUEST['arrpf']>0){echo 1;}else{echo 0;}?>"/>Arr PF &nbsp; 
<input type="checkbox" id="I16" onClick="F(16)" <?php if($_REQUEST['arresic']){echo 'checked';}?> /><input type="hidden" id="V16" value="<?php if($_REQUEST['arresic']>0){echo 1;}else{echo 0;}?>"/>Arr ESIC &nbsp; 
<input type="checkbox" id="I17" onClick="F(17)" <?php if($_REQUEST['bonus']){echo 'checked';}?> /><input type="hidden" id="V17" value="<?php if($_REQUEST['bonus']>0){echo 1;}else{echo 0;}?>"/>Bonus &nbsp; 
<input type="checkbox" id="I18" onClick="F(18)" <?php if($_REQUEST['lenc']){echo 'checked';}?> /><input type="hidden" id="V18" value="<?php if($_REQUEST['lenc']>0){echo 1;}else{echo 0;}?>"/>Leave Encash &nbsp; 
<input type="checkbox" id="I19" onClick="F(19)" <?php if($_REQUEST['taxcea']){echo 'checked';}?> /><input type="hidden" id="V19" value="<?php if($_REQUEST['taxcea']>0){echo 1;}else{echo 0;}?>"/>Tax CEA &nbsp; 
<input type="checkbox" id="I20" onClick="F(20)" <?php if($_REQUEST['taxmr']){echo 'checked';}?> /><input type="hidden" id="V20" value="<?php if($_REQUEST['taxmr']>0){echo 1;}else{echo 0;}?>"/>Tax MR &nbsp; 
<input type="checkbox" id="I21" onClick="F(21)" <?php if($_REQUEST['taxlta']){echo 'checked';}?> /><input type="hidden" id="V21" value="<?php if($_REQUEST['taxlta']>0){echo 1;}else{echo 0;}?>"/>Tax LTA &nbsp; 
<input type="checkbox" id="I22" onClick="F(22)" <?php if($_REQUEST['dedvc']){echo 'checked';}?> /><input type="hidden" id="V22" value="<?php if($_REQUEST['dedvc']>0){echo 1;}else{echo 0;}?>"/>Deduct-VC &nbsp; 
<input type="checkbox" id="I23" onClick="F(23)" <?php if($_REQUEST['dedadj']){echo 'checked';}?> /><input type="hidden" id="V23" value="<?php if($_REQUEST['dedadj']>0){echo 1;}else{echo 0;}?>"/>Deduct-Adjmnt &nbsp; 
<input type="checkbox" id="I24" onClick="F(24)" <?php if($_REQUEST['dedca']){echo 'checked';}?> /><input type="hidden" id="V24" value="<?php if($_REQUEST['dedca']>0){echo 1;}else{echo 0;}?>"/>Deduct-Convey<sup>n</sup>Allow. &nbsp;
<input type="checkbox" id="I25" onClick="F(25)" <?php if($_REQUEST['ta']){echo 'checked';}?> /><input type="hidden" id="V25" value="<?php if($_REQUEST['ta']>0){echo 1;}else{echo 0;}?>"/>Transport Allow. &nbsp;  
<?php //1-con 2-car  3-inc  4-arr  5-va  6-pp  7-cca  8-ra  9-vr  10-arrbas  11-arrhr  12-arrcar  13-arrsp 
	  //14-arrcon  15-arrpf  16-arresic  17-bonus  18-lenc  19-taxcea  20-taxmr  21-taxlta  22-dedvc  23-dedadj  
	  //24-dedca  25-Transport Allow 26-Arr LV-Encash ?> 
  
  </td>
 </tr>
    
 
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { 
$BY=date("Y")-1;
if($_REQUEST['Y']>=date("Y")){ $PayTable='hrm_employee_monthlypayslip'; }
elseif($_REQUEST['Y']==$BY AND date("m")=='01' AND $_REQUEST['m']==12)
{ $PayTable='hrm_employee_monthlypayslip'; }
elseif($_REQUEST['Y']==$BY AND $_REQUEST['m']<12)
{ $PayTable='hrm_employee_monthlypayslip_'.$_REQUEST['Y']; }
else
{ $PayTable='hrm_employee_monthlypayslip_'.$_REQUEST['Y'];  }
?>	
 <tr>
  <td valign="top">
  <table border="1" id="table1" style="width:100%;" cellspacing="1">
   <div class="thead">
   <thead>
   <tr bgcolor="#7a6189">
    <td class="th" style="width:30px;">Check</td>
    <td class="th" style="width:30px;">Sn</td>
    <td class="th" style="width:50px;">EC</td>
    <td class="th" style="width:250px;">Name</td>
    <td class="th" style="width:40px;">Paid<br>Day</td>
    <td class="th" style="width:60px;">Basic</td>	
    <td class="th" style="width:60px;">Hra</td>	
    <?php if($_REQUEST['con']>0){echo '<td class="th" style="width:60px;">Convey</td>';} ?>
    <?php if($_REQUEST['ta']>0){echo '<td class="th" style="width:60px;">TA</td>';} ?>
    <?php if($_REQUEST['car']>0){echo '<td class="th" style="width:60px;">Car<br>Allow</td>';} ?>
    <td class="th" style="width:60px;">Special</td>
    <td class="th" style="width:50px;">DA</td>
    <?php if($_REQUEST['inc']>0){echo '<td class="th" style="width:60px;">Incentive</td>';} ?>	
    <?php if($_REQUEST['arr']>0){echo '<td class="th" style="width:60px;">Arrear</td>';} ?>
    <?php if($_REQUEST['va']>0){echo '<td class="th" style="width:60px;">Variable<br>Adjust</td>';} ?>	
    <?php if($_REQUEST['pp']>0){echo '<td class="th" style="width:60px;">Perform Pay</td>';} ?>
    <?php if($_REQUEST['cca']>0){echo '<td class="th" style="width:60px;">CCA</td>';} ?>	
    <?php if($_REQUEST['ra']>0){echo '<td class="th" style="width:60px;">RA</td>';} ?>
    <?php if($_REQUEST['vr']>0){echo '<td class="th" style="width:60px;">Variable<br>Reim.</td>';} ?>
	
	<?php if($_REQUEST['arrbas']>0){echo '<td class="th" style="width:60px;">Arr<br>Basic</td>';} ?>
    <?php if($_REQUEST['arrhr']>0){echo '<td class="th" style="width:60px;">Arr<br>HRA</td>';} ?>
    <?php if($_REQUEST['arrcar']>0){echo '<td class="th" style="width:60px;">Arr<br>CarAllow</td>';} ?>
    <?php if($_REQUEST['arrsp']>0){echo '<td class="th" style="width:60px;">Arr<br>Spl</td>';} ?>
    <?php if($_REQUEST['arrcon']>0){echo '<td class="th" style="width:60px;">Arr<br>Conv</td>';} ?>
	<?php if($_REQUEST['arrencash']>0){echo '<td class="th" style="width:60px;">Arr LV<br>Encash</td>';} ?>
    <?php if($_REQUEST['arrpf']>0){echo '<td class="th" style="width:60px;">Arr<br>PF</td>';} ?>
    <?php if($_REQUEST['arresic']>0){echo '<td class="th" style="width:60px;">Arr<br>ESIC</td>';} ?>
    
	<?php if($_REQUEST['bonus']>0){echo '<td class="th" style="width:60px;">Bonus</td>';} ?>
    <?php if($_REQUEST['lenc']>0){echo '<td class="th" style="width:60px;">Leave<br>EnCash</td>';} ?>
		
    <?php if($_REQUEST['taxcea']>0){echo '<td class="th" style="width:60px;">TaxSv<br>CEA</td>';} ?>
    <?php if($_REQUEST['taxmr']>0){echo '<td class="th" style="width:60px;">TaxSv<br>MR</td>';} ?>
    <?php if($_REQUEST['taxlta']>0){echo '<td class="th" style="width:60px;">TaxSv<br>LTA</td>';} ?>
 
    <td class="th" style="width:60px;"><b>Total<br>Earning</b></td>
	
	<td class="th" style="width:50px;">PF</td>
    <td class="th" style="width:50px;">ESIC</td>
    <td class="th" style="width:50px;">TDS</td>
    <?php if($_REQUEST['dedvc']>0){echo '<td class="th" style="width:60px;">VC</td>';} ?>	
    <?php if($_REQUEST['dedadj']>0){echo '<td class="th" style="width:60px;">Deduct<br>Adjmnt</td>';} ?>
    <?php if($_REQUEST['dedca']>0){echo '<td class="th" style="width:60px;">Convey<sup>n</sup><br>Allow</td>';}?>
	
    <td class="th" style="width:60px;">Total<br>Deduct</td>
    <td class="th" style="width:60px;">Net<br>Amount</td>
    <td class="th" style="width:40px;">Pay<br>Slip</td>
   </tr>
   </thead>
   </div>   
<?php $month=$_REQUEST['m']; $EmpMgmtId="e.EmployeeID!=223 AND e.EmployeeID!=224 AND e.EmployeeID!=233 AND e.EmployeeID!=234 AND e.EmployeeID!=235 AND e.EmployeeID!=259 AND e.EmployeeID!=259";
if($_REQUEST['D']!='All'){ $SqlEmp=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.EmpStatus!='De' AND g.DepartmentId=".$_REQUEST['D']." AND e.CompanyId=".$CompanyId." AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by e.EmpCode ASC", $con); }
if($_REQUEST['D']=='All'){ $SqlEmp=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.EmpStatus!='De' AND e.CompanyId=".$CompanyId." AND ".$EmpMgmtId." AND g.DepartmentId!=0 AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by e.EmpCode ASC", $con); }

$sn=1; while($ResEmp=mysql_fetch_array($SqlEmp)){ 
$sqlSlip=mysql_query("select * from ".$PayTable." where EmployeeID=".$ResEmp['EmployeeID']." AND Month=".$_REQUEST['m']." AND YEar=".$_REQUEST['Y']."", $con); $resSlip=mysql_fetch_assoc($sqlSlip); ?> 	
   <div class="tbody">
   <tbody> 
   <tr style="background-color:#FFFFFF;" id="TR<?php echo $sn; ?>">
    <td class="tdc"><input type="checkbox" id="Chk<?php echo $sn; ?>" onClick="FucChk(<?php echo $sn; ?>)"/></td>
	<td class="tdc"><?php echo $sn; ?></td>
    <td class="tdc"><?php echo $ResEmp['EmpCode']; ?></td>
    <td class="tdl">&nbsp;<?php echo ucwords(strtolower($ResEmp['Fname'].' '.$ResEmp['Sname'].' '.$ResEmp['Lname'])); ?></td>
    <td class="tdc"><?php if($resSlip['PaidDay']!=''){echo floatval($resSlip['PaidDay']);} ?></td>
    <td class="tdr"><?php if($resSlip['Basic']!=''){echo floatval($resSlip['Basic']);} ?>&nbsp;</td>	
    <td class="tdr"><?php if($resSlip['Hra']!=''){echo floatval($resSlip['Hra']);} ?>&nbsp;</td>	
    <?php if($_REQUEST['con']>0){?><td class="tdr"><?php if($resSlip['Convance']!=''){echo floatval($resSlip['Convance']).'&nbsp';}?></td><?php } ?>
    <?php if($_REQUEST['ta']>0){?><td class="tdr"><?php if($resSlip['TA']!=''){echo floatval($resSlip['TA']).'&nbsp';}?></td><?php } ?>
    <?php if($_REQUEST['car']>0){?><td class="tdr"><?php if($resSlip['Car_Allowance']!=''){echo floatval($resSlip['Car_Allowance']).'&nbsp';}?></td><?php } ?>
    <td class="tdr"><?php if($resSlip['Special']!=''){echo floatval($resSlip['Special']);} ?>&nbsp;</td>
    <td class="tdr"><?php if($resSlip['DA']!=''){echo floatval($resSlip['DA']);} ?>&nbsp;</td>
	
	
    <?php if($_REQUEST['inc']>0){?><td class="tdr"><?php if($resSlip['Incentive']!=''){echo floatval($resSlip['Incentive']).'&nbsp';}?></td><?php } ?>	
    <?php if($_REQUEST['arr']>0){?><td class="tdr"><?php if($resSlip['Arreares']!=''){echo floatval($resSlip['Arreares']).'&nbsp';}?></td><?php } ?>
    <?php if($_REQUEST['va']>0){?><td class="tdr"><?php if($resSlip['VariableAdjustment']!=''){echo floatval($resSlip['VariableAdjustment']).'&nbsp';}?></td><?php } ?>	
    <?php if($_REQUEST['pp']>0){?><td class="tdr"><?php if($resSlip['PerformancePay']!=''){echo floatval($resSlip['PerformancePay']).'&nbsp';}?></td><?php } ?>
    <?php if($_REQUEST['cca']>0){?><td class="tdr"><?php if($resSlip['CCA']!=''){echo floatval($resSlip['CCA']).'&nbsp';}?></td><?php } ?>	
    <?php if($_REQUEST['ra']>0){?><td class="tdr"><?php if($resSlip['RA']!=''){echo floatval($resSlip['RA']).'&nbsp';}?></td><?php } ?>
    <?php if($_REQUEST['vr']>0){?><td class="tdr"><?php if($resSlip['VarRemburmnt']!=''){echo floatval($resSlip['VarRemburmnt']).'&nbsp';}?></td><?php } ?>
	
	
	<?php if($_REQUEST['arrbas']>0){?><td class="tdr" style="background-color:#BFEBFF;"><?php if($resSlip['Arr_Basic']!=''){echo floatval($resSlip['Arr_Basic']).'&nbsp';}?></td><?php } ?>
    <?php if($_REQUEST['arrhr']>0){?><td class="tdr" style="background-color:#BFEBFF;"><?php if($resSlip['Arr_Hra']!=''){echo floatval($resSlip['Arr_Hra']).'&nbsp';}?></td><?php } ?>
    <?php if($_REQUEST['arrcar']>0){?><td class="tdr" style="background-color:#BFEBFF;"><?php if($resSlip['Car_Allowance_Arr']!=''){echo floatval($resSlip['Car_Allowance_Arr']).'&nbsp';}?></td><?php } ?>
    <?php if($_REQUEST['arrsp']>0){?><td class="tdr" style="background-color:#BFEBFF;"><?php if($resSlip['Arr_Spl']!=''){echo floatval($resSlip['Arr_Spl']).'&nbsp';}?></td><?php } ?>
    <?php if($_REQUEST['arrcon']>0){?><td class="tdr" style="background-color:#BFEBFF;"><?php if($resSlip['Arr_Conv']!=''){echo floatval($resSlip['Arr_Conv']).'&nbsp';}?></td><?php } ?>
	
	<?php if($_REQUEST['arrencash']>0){?><td class="tdr" style="background-color:#BFEBFF;"><?php if($resSlip['Arr_LvEnCash']!=''){echo floatval($resSlip['Arr_LvEnCash']).'&nbsp';}?></td><?php } ?>
	
    <?php if($_REQUEST['arrpf']>0){?><td class="tdr" style="background-color:#BFEBFF;"><?php if($resSlip['Arr_Pf']!=''){echo floatval($resSlip['Arr_Pf']).'&nbsp';}?></td><?php } ?>
    <?php if($_REQUEST['arresic']>0){?><td class="tdr" style="background-color:#BFEBFF;"><?php if($resSlip['Arr_Esic']!=''){echo floatval($resSlip['Arr_Esic']).'&nbsp';}?></td><?php } ?>
    
	<?php if($_REQUEST['bonus']>0){?><td class="tdr"><?php if($resSlip['Bonus']!=''){echo floatval($resSlip['Bonus']).'&nbsp';}?></td><?php } ?>
    <?php if($_REQUEST['lenc']>0){?><td class="tdr"><?php if($resSlip['LeaveEncash']!=''){echo floatval($resSlip['LeaveEncash']).'&nbsp';}?></td><?php } ?>
		
    <?php if($_REQUEST['taxcea']>0){?><td class="tdr"><?php if($resSlip['YCea']!=''){echo floatval($resSlip['YCea']).'&nbsp';}?></td><?php } ?>
    <?php if($_REQUEST['taxmr']>0){?><td class="tdr"><?php if($resSlip['YMr']!=''){echo floatval($resSlip['YMr']).'&nbsp';}?></td><?php } ?>
    <?php if($_REQUEST['taxlta']>0){?><td class="tdr"><?php if($resSlip['YLta']!=''){echo floatval($resSlip['YLta']).'&nbsp';}?></td><?php } ?>
 
<?php $TotGross=$resSlip['Tot_Gross']+$resSlip['Bonus']+$resSlip['DA']+$resSlip['Arreares']+$resSlip['LeaveEncash']+$resSlip['Incentive']+$resSlip['VariableAdjustment']+$resSlip['PerformancePay']+$resSlip['CCA']+$resSlip['RA']+$resSlip['Arr_Basic']+$resSlip['Arr_Hra']+$resSlip['Arr_Spl']+$resSlip['Arr_Conv']+$resSlip['YCea']+$resSlip['YMr']+$resSlip['YLta']+$resSlip['Car_Allowance']+$resSlip['Car_Allowance_Arr']+$resSlip['VarRemburmnt']+$resSlip['TA']+$resSlip['Arr_LvEnCash']; 
$TotDeduct=$resSlip['TDS']+$resSlip['Tot_Deduct']+$resSlip['Arr_Pf']+$resSlip['VolContrib']+$resSlip['Arr_Esic']+$resSlip['DeductAdjmt']+$resSlip['RecConAllow']; $TotNetAmount=$TotGross-$TotDeduct; ?>
    <td class="tdr" style="background-color:#B6FF6C;"><b><?php if($TotGross!=''){echo floatval($TotGross);}?></b>&nbsp;</td>
	
	<td class="tdr"><?php if($resSlip['EPF_Employee']!=''){echo floatval($resSlip['EPF_Employee']);}?>&nbsp;</td>
    <td class="tdr"><?php if($resSlip['ESCI_Employee']!=''){echo floatval($resSlip['ESCI_Employee']);}?>&nbsp;</td>
    <td class="tdr"><a href="javascript:OpenTDS(<?php echo $ResEmp['EmployeeID'].', '.$_REQUEST['m'].', '.$resSlip['PaySlipYearId'].', '.$CompanyId; ?>)"><?php if($resSlip['TDS']!=''){echo floatval($resSlip['TDS']);}?></a>&nbsp;</td>
    <?php if($_REQUEST['dedvc']>0){?><td class="tdr"><?php if($resSlip['VolContrib']!=''){echo floatval($resSlip['VolContrib']).'&nbsp';}?></td><?php } ?>	
    <?php if($_REQUEST['dedadj']>0){?><td class="tdr"><?php if($resSlip['DeductAdjmt']!=''){echo floatval($resSlip['DeductAdjmt']).'&nbsp';}?></td><?php } ?>
    <?php if($_REQUEST['dedca']>0){?><td class="tdr"><?php if($resSlip['RecConAllow']!=''){echo floatval($resSlip['RecConAllow']).'&nbsp';}?></td><?php } ?>
	
    <td class="tdr" style="background-color:#FFFF9D;"><b><?php if($TotDeduct!=''){echo floatval($TotDeduct);}?></b>&nbsp;</td>
    <td class="tdr" style="background-color:#59FF59;"><b><?php if($TotNetAmount!=''){echo floatval($TotNetAmount);}?></b>&nbsp;</td>
    <td class="tdc"><a href="javascript:OpenPaySlip(<?php echo $ResEmp['EmployeeID'].', '.$_REQUEST['m'].', '.$_REQUEST['Y'].', '.$YearId.', '.$CompanyId; ?>)">Click</a></td>
   </tr>
   </tbody>
   </div>
<?php $sn++; } ?>
   
<?php } ?> 
</table>
		
<?php //*******************************************************************************************?>
<?php //***************END*****END*****END******END******END****************************?>
<?php //**********************************************************************************?>
		
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>