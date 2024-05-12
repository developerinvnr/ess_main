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
<style>.th{font-family:Times New Roman;font-size:12px;font-weight:bold;text-align:center;color:#FFFFFF; background-color:#376A9D;height:24px;} 
.tdl{font-family:Times New Roman;font-size:13px;color:#000000;background-color:#FFFFFF;}
.tdr{font-family:Times New Roman;font-size:12px;text-align:right;color:#000000;background-color:#FFFFFF;}
.tdc{font-family:Times New Roman;font-size:12px;text-align:center;color:#000000;background-color:#FFFFFF;}
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
 else{ window.location='EmpTDSMaster.php?m='+document.getElementById("Month").value+'&D='+document.getElementById("Department").value+'&Y='+document.getElementById("Year").value+'&act=441&ee=421&dd=true2&c=false&dd=dreefoultValue&ud=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False'; }
}

function EditSalTdsAll(E,C,YI,U,M,Y)
{
 window.open("EmpEditSalTdsAll.php?E="+E+"&C="+C+"&YI="+YI+"&U="+U+"&M="+M+"&Y="+Y,"Form","menubar=no,scrollbars=yes,resizable=no,directories=no,width=500,height=400");
}



function EditSalaryArrear(E,C,YI,U,M,Y)
{window.open("EditSalaryArrear.php?E="+E+"&C="+C+"&YI="+YI+"&U="+U+"&M="+M+"&Y="+Y,"RefPayForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=800,height=170");} 

function EditSalaryTaxSaving(E,C,YI,U,M,Y)
{window.open("EditSalaryTaxSaving.php?E="+E+"&C="+C+"&YI="+YI+"&U="+U+"&M="+M+"&Y="+Y,"RefPayForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=800,height=170");}

function EditTDS(E,C,YI,U,M,Y)
{window.open("EditTDS.php?E="+E+"&C="+C+"&YI="+YI+"&U="+U+"&M="+M+"&Y="+Y,"RefPayForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=400,height=170");} 


function EditVolContri(E,C,YI,U,M,Y)
{window.open("EditVolContri.php?E="+E+"&C="+C+"&YI="+YI+"&U="+U+"&M="+M+"&Y="+Y,"RefPayForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=400,height=170");}

function EditDeductAdjmt(E,C,YI,U,M,Y)
{window.open("EditDeductAdjmt.php?E="+E+"&C="+C+"&YI="+YI+"&U="+U+"&M="+M+"&Y="+Y,"RefPayForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=400,height=170");}

function EditRecConAllow(E,C,YI,U,M,Y)
{window.open("EditRecConAllow.php?E="+E+"&C="+C+"&YI="+YI+"&U="+U+"&M="+M+"&Y="+Y,"RefPayForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=400,height=170");}


function EditPfEsic(E,C,YI,U,M,Y)
{window.open("EditPfEsic.php?E="+E+"&C="+C+"&YI="+YI+"&U="+U+"&M="+M+"&Y="+Y,"RefPayForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=500,height=170");}

function FunClrCheck(v)
{ 
 if(document.getElementById("ClrCheck_"+v).checked==true)
 { document.getElementById("tr_"+v).style.background='#0080FF'; document.getElementById("tdcheck_"+v).style.background='#0080FF'; document.getElementById("td1_"+v).style.background='#0080FF'; document.getElementById("td2_"+v).style.background='#0080FF'; document.getElementById("td3_"+v).style.background='#0080FF'; document.getElementById("td4_"+v).style.background='#0080FF'; document.getElementById("td5_"+v).style.background='#0080FF'; document.getElementById("td6_"+v).style.background='#0080FF'; document.getElementById("td7_"+v).style.background='#0080FF'; document.getElementById("td8_"+v).style.background='#0080FF'; document.getElementById("td9_"+v).style.background='#0080FF'; document.getElementById("td10_"+v).style.background='#0080FF'; document.getElementById("td11_"+v).style.background='#0080FF'; document.getElementById("td12_"+v).style.background='#0080FF'; document.getElementById("td13_"+v).style.background='#0080FF';
 } 
 else if(document.getElementById("ClrCheck_"+v).checked==false)
 {
  if(v%2!=0)
  { document.getElementById("tr_"+v).style.background='#D9D1E7'; document.getElementById("tdcheck_"+v).style.background='#D9D1E7'; document.getElementById("td1_"+v).style.background='#D9D1E7'; document.getElementById("td2_"+v).style.background='#D9D1E7'; document.getElementById("td3_"+v).style.background='#D9D1E7'; document.getElementById("td4_"+v).style.background='#D9D1E7'; document.getElementById("td5_"+v).style.background='#D9D1E7'; document.getElementById("td6_"+v).style.background='#D9D1E7'; document.getElementById("td7_"+v).style.background='#D9D1E7'; document.getElementById("td8_"+v).style.background='#D9D1E7'; document.getElementById("td9_"+v).style.background='#D9D1E7'; document.getElementById("td10_"+v).style.background='#D9D1E7'; document.getElementById("td11_"+v).style.background='#D9D1E7'; document.getElementById("td12_"+v).style.background='#D9D1E7'; document.getElementById("td13_"+v).style.background='#D9D1E7'; }
  else if(v%2==0)
  { document.getElementById("tr_"+v).style.background='#FFFFFF'; document.getElementById("tdcheck_"+v).style.background='#FFFFFF'; document.getElementById("td1_"+v).style.background='#FFFFFF'; document.getElementById("td2_"+v).style.background='#FFFFFF'; document.getElementById("td3_"+v).style.background='#FFFFFF'; document.getElementById("td4_"+v).style.background='#FFFFFF'; document.getElementById("td5_"+v).style.background='#FFFFFF'; document.getElementById("td6_"+v).style.background='#FFFFFF'; document.getElementById("td7_"+v).style.background='#FFFFFF'; document.getElementById("td8_"+v).style.background='#FFFFFF'; document.getElementById("td9_"+v).style.background='#FFFFFF'; document.getElementById("td10_"+v).style.background='#FFFFFF'; document.getElementById("td11_"+v).style.background='#FFFFFF'; document.getElementById("td12_"+v).style.background='#FFFFFF'; document.getElementById("td13_"+v).style.background='#FFFFFF'; }
 }
}

$(document).ready(function () { $("#table1").freezeHeader({ 'height': '500px' }); })

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
	  <td valign="top" width="100%" id="MainWindow">
<?php //*******************************************************************************************?>
<?php //******************START*****START*****START******START******START***************************?>
<?php //*****************************************************************************************?>
<table border="0" style="margin-top:0px;height:350px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	 <td style="width:150px;font-family:Times New Roman;color:#2D002D;font-size:18px;">&nbsp;<b>TDS Master</b></td>
	<td style="width:80px;font-family:Times New Roman;color:#2D002D;font-size:18px;text-align:right;"><b>Year :&nbsp;</b></td>
	  <td style="width:80px;"><select class="selecti" style="width:75px;" name="Year" id="Year" onChange="SelectYear(this.value,<?php echo $_REQUEST['m']; ?>)"><option value="<?php echo $_REQUEST['Y']; ?>"><?php echo $_REQUEST['Y']; ?></option><?php for($i=date("Y"); $i>=2013; $i--){ ?>
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
	</tr>
   </table>
  </td>
 </tr>

<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
  <td valign="top">
   <table border="1" id="table1" valign="top"  cellspacing="1">
    <div class="thead">
    <thead>
    <tr bgcolor="#7a6189">
	<td colspan="6" class="th"><b>General Details</b></td>
<?php if($_SESSION['User_Permission']=='Edit'){?>
	<td rowspan="2" class="th" style="width:50px;"><b>Compo<br>nents</b></td>
	<td colspan="2" class="th"><b>Salary</b></td> 
    <td rowspan="2" class="th" style="width:50px;">&nbsp;<b>TDS</b>&nbsp;</td>
	<td rowspan="2" class="th" style="width:50px;">&nbsp;<b>Vol Contrib<sup>n</sup></b>&nbsp;</td>
    <td rowspan="2" class="th" style="width:50px;"><b>Deduct Adjmnt</b></td>
    <td rowspan="2" class="th" style="width:50px;"><b>Recovery Convey<sup>n</sup></b></td>
	<td rowspan="2" class="th" style="width:50px;"><b>PF<br>ESIC</b></td>
<?php } ?>
   </tr>
   <tr bgcolor="#7a6189">
    <td class="th" style="width:30px;"><b>Click</b></td>
    <td class="th" style="width:30px;"><b>SN</b></td>
	<td class="th" style="width:50px;"><b>EC</b></td>
	<td class="th" style="width:200px;"><b>Name</b></td>
	<td class="th" style="width:100px;"><b>Department</b></td>
	<td class="th" style="width:200px;"><b>Designation</b></td>
<?php if($_SESSION['User_Permission']=='Edit'){?>
	<td class="th" style="width:50px;"><b>Arrear</b></td>
    <td class="th" style="width:50px;"><b>Tax Saving</b></td>
<?php } ?>
   </tr>
   </thead>
   </div>
<?php $EmpMgmtId="e.EmployeeID!=223 AND e.EmployeeID!=224 AND e.EmployeeID!=233 AND e.EmployeeID!=234 AND e.EmployeeID!=235 AND e.EmployeeID!=259 AND e.EmployeeID!=259";

if($_REQUEST['D']!='All'){ $sqlDP = mysql_query("SELECT e.EmployeeID,EmpCode,Fname,Sname,Lname,EmpStatus,HqName,DepartmentCode,DesigName,Gender,Married,DR FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON g.DesigId=de.DesigId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId WHERE e.EmpStatus!='De' AND ".$EmpMgmtId." AND e.CompanyId=".$CompanyId." AND g.DepartmentId=".$_REQUEST['D']." AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by EmpCode ASC", $con); }
if($_REQUEST['D']=='All'){ $sqlDP=mysql_query("select e.*,g.*,HqName,DepartmentCode,DesigName from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON g.DesigId=de.DesigId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND ".$EmpMgmtId." AND g.DepartmentId!=17 AND g.DepartmentId!=18 AND g.DepartmentId!=23 AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by EmpCode ASC", $con); }
$Sno=1;  while($resDP = mysql_fetch_assoc($sqlDP)) { 
	  if($resDP['DR']=='Y'){$MS='Dr.';} elseif($resDP['Gender']=='M'){$MS='Mr.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='Y'){$MS='Mrs.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='N'){$MS='Miss.';}  $Name=$MS.' '.$resDP['Fname'].' '.$resDP['Sname'].' '.$resDP['Lname'];
	  $LEC=strlen($resDP['EmpCode']); 
      if($LEC==1){$EC='000'.$resDP['EmpCode'];} if($LEC==2){$EC='00'.$resDP['EmpCode'];} if($LEC==3){$EC='0'.$resDP['EmpCode'];} if($LEC>=4){$EC=$resDP['EmpCode'];}
	  $E=$resDP['EmployeeID']; $C=$CompanyId; $YI=$YearId; $U=$UserId; $M=$_REQUEST['m']; $Y=$_REQUEST['Y'];
?> 	 
  <div class="tbody">
  <tbody>
  <tr id="tr_<?php echo $Sno; ?>" bgcolor="<?php if($Sno%2==0){ echo '#FFFFFF'; } else {echo '#D9D1E7';}?>"> 
   <td class="tdc" id="tdcheck_<?php echo $Sno; ?>"><input type="checkbox" id="ClrCheck_<?php echo $Sno; ?>" onClick="FunClrCheck(<?php echo $Sno; ?>)"/></td>
   <td id="td1_<?php echo $Sno; ?>" class="tdc"><?php echo $Sno; ?></td>
   <td id="td2_<?php echo $Sno; ?>" class="tdc"><?php echo $EC; ?></td>
   <td id="td3_<?php echo $Sno; ?>" class="tdl">&nbsp;<?php echo ucwords(strtolower($Name)); ?></td>
   <td id="td4_<?php echo $Sno; ?>" class="tdl">&nbsp;<?php echo ucwords(strtolower($resDP['DepartmentCode']));?></td>
   <td id="td5_<?php echo $Sno; ?>" class="tdl">&nbsp;<?php echo ucwords(strtolower($resDP['DesigName']));?></td>
<?php if($_SESSION['User_Permission']=='Edit'){?>
	<td id="td6_<?php echo $Sno; ?>" class="tdc"><a href="#"><img src="images/select.png" onClick="EditSalTdsAll(<?php echo $E.', '.$C.', '.$YI.', '.$U.', '.$M.', '.$Y; ?>)"></a></td>
	
	<td id="td7_<?php echo $Sno; ?>" class="tdc" style="background-color:#FFFFD2;"><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="EditSalaryArrear(<?php echo $E.', '.$C.', '.$YI.', '.$U.', '.$M.', '.$Y; ?>)"></a></td>
	
	<td id="td8_<?php echo $Sno; ?>" class="tdc" style="background-color:#FFFFD2;"><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="EditSalaryTaxSaving(<?php echo $E.', '.$C.', '.$YI.', '.$U.', '.$M.', '.$Y; ?>)"></a></td>

	<td id="td9_<?php echo $Sno; ?>" class="tdc" style="background-color:#FFC1FF;"><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="EditTDS(<?php echo $E.', '.$C.', '.$YI.', '.$U.', '.$M.', '.$Y; ?>)"></a></td>	

	<td id="td10_<?php echo $Sno; ?>" class="tdc" style="background-color:#FFC1FF;"><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="EditVolContri(<?php echo $E.', '.$C.', '.$YI.', '.$U.', '.$M.', '.$Y; ?>)"></a></td>	

	<td id="td11_<?php echo $Sno; ?>" class="tdc" style="background-color:#FFC1FF;"><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="EditDeductAdjmt(<?php echo $E.', '.$C.', '.$YI.', '.$U.', '.$M.', '.$Y; ?>)"></a></td>

    <td id="td12_<?php echo $Sno; ?>" class="tdc" style="background-color:#FFC1FF;"><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="EditRecConAllow(<?php echo $E.', '.$C.', '.$YI.', '.$U.', '.$M.', '.$Y; ?>)"></a></td>
	
	<td id="td13_<?php echo $Sno; ?>" class="tdc" style="background-color:#FFC1FF;"><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="EditPfEsic(<?php echo $E.', '.$C.', '.$YI.', '.$U.', '.$M.', '.$Y; ?>)"></a></td>
	
<?php } ?>
   </tr>
   </tbody>
   </div>
<?php $Sno++; }?>
<?php } ?> 
</table>
<?php //***************************************************************************?>
<?php //******************END*****END*****END******END******END**************************?>
<?php //*************************************************************************?>

	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>