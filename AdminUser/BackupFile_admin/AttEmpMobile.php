<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//require_once('PhpFile/AttendanceP.php');
if(isset($_POST['SaveEdit']))
{ $sqlUp = mysql_query("UPDATE hrm_employee_general SET AttMobileNo1='".$_POST['Mo1']."', AttMobileNo2='".$_POST['Mo2']."' WHERE EmployeeID=".$_POST['EmployeeID'], $con); }
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Times New Roman; font-size:15px; width:200px;} .font1 { font-family:Times New Roman; font-size:12px; height:14px; width:200px; } 
.All_350{font-size:11px; height:18px; width:350px;}
.font2 { font-size:12px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} 
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:19px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.inner_table{height:450px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<script type="text/javascript" language="javascript"> 
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '450px' }); }) 
function SelectMonthDept(value)
{ var da = document.getElementById("da").value; var M = document.getElementById("Month").value; var Y = document.getElementById("Year").value;  
  var x = 'AttEmpMobile.php?m='+M+'&D='+value+'&Y='+Y+'&da='+da+"&yy=4%rer&uu=true&rr=false"; window.location=x; }
  
function edit(value) 
{ var D = document.getElementById("Department").value; var M = document.getElementById("Month").value; 
  var da = document.getElementById("da").value;  var Y = document.getElementById("Year").value;  
  var agree=confirm("Are you sure you want to edit this record?");
  if (agree) { var x = "AttEmpMobile.php?action=edit&eid="+value+"&m="+M+"&D="+D+"&Y="+Y+"&da="+da+"&yy=4%rer&uu=true&rr=false";  window.location=x;}
} 

function ExpMobNo(D,Y,m,C)
{
 var win = window.open("AttEmpMobileExp.php?D="+D+"&Y="+Y+"&m="+m+"&C="+C,"Form","menubar=no,scrollbars=yes,resizable=no,directories=no,width=50,height=50");
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
<?php //********************************************************************************************/?>
<?php /****************START*****START*****START******START******START********************/?>
<?php //**************************************************************************************/?>	  
<table border="0" style="margin-top:0px; width:100%; height:350px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td style="width:400px;" align=""><font color="#2D002D" style='font-family:Times New Roman;' size="4">
	  <b>Employee Mobile Nunber For Attendace Reports :</b></font></td>
	   <td class="td1" style="font-size:11px; width:130px;">		   
	   <select style="font-size:11px; width:120px; height:19px; background-color:#DDFFBB; display:block;" name="Department" id="Department" onChange="SelectMonthDept(this.value)">
<?php if($_REQUEST['D']!='All') { $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['D'], $con); $resD=mysql_fetch_assoc($sqlD); ?> 
	  <option value="<?php echo $_REQUEST['D']; ?>" style="margin-left:0px; background-color:#84D9D5;">&nbsp;<?php echo $resD['DepartmentCode']; ?></option>  
<?php  } else { ?>	  <option value="All" style="margin-left:0px; background-color:#84D9D5;">&nbsp;All</option><?php } ?>						   
	   <?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?><option value="All">&nbsp;All</option></select>
	   <input type="hidden" name="Month" id="Month" value="<?php echo $_REQUEST['m']; ?>" /> 
	   <input type="hidden" name="Year" id="Year" value="<?php echo $_REQUEST['Y']; ?>" />
	   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
	   <input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
	   <input type="hidden" name="da" id="da" value="<?php echo $_REQUEST['da']; ?>" />
	  </td>	 
	  <td style="color:#400000;font-family:Times New Roman; width:720px; font-size:14px;" align="">
	  <?php if($_REQUEST['D']!='All') { $sqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['D'], $con); 
	  $resD=mysql_fetch_assoc($sqlD); }?><font style="font:Times New Roman; color:#005500; font-size:18px;font-weight:bold;">
	  <?php if($_REQUEST['D']!='All'){echo $resD['DepartmentName']; } else { echo  'All'; } ?></font>
	  &nbsp;&nbsp;
	  <?php if($_REQUEST['D']!=''){ ?>
	  <span style="cursor:pointer;font-size:14px;" onClick="ExpMobNo('<?php echo $_REQUEST['D']; ?>',<?php echo $_REQUEST['Y'].','.$_REQUEST['m'].','.$CompanyId; ?>)"><u>Export</u></span>
	  <?php } ?>
	  </td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
  <td valign="top">
   <table border="1" id="table1" valign="top" style="width:100%;" cellspacing="1">
   <div class="thead">
   <thead>
<tr bgcolor="#7a6189" style="height:24px;">
 <td align="center" style="color:#FFFFFF;" class="All_30"><b>SN</b></td>
 <td align="center" style="color:#FFFFFF;" class="All_50"><b>EC</b></td>
 <td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>
 <td align="center" style="color:#FFFFFF;" class="All_250"><b>Designation</b></td>	
 <td align="center" style="color:#FFFFFF;" class="All_100"><b>Location</b></td>	
 <td align="center" style="color:#FFFFFF;" class="All_100"><b>Mobile No-1</b></td>
 <td align="center" style="color:#FFFFFF;" class="All_100"><b>Mobile No-2</b></td>
 <td align="center" style="color:#FFFFFF;" class="All_50"><b>Edit</b></td>
</tr>
   </thead>
   </div>
<?php if($_REQUEST['D']!='All'){ $sql=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentId,DesigId,TimeApply,InTime,OutTime,HqName,AttMobileNo1,AttMobileNo2,MobileNo_Vnr,p.MobileNo from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId where e.EmpStatus='A' AND g.DepartmentId=".$_REQUEST['D']." AND e.CompanyId=".$CompanyId." AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by EmpCode ASC", $con); }
      if($_REQUEST['D']=='All'){ $sql=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentId,DesigId,TimeApply,InTime,OutTime,HqName,AttMobileNo1,AttMobileNo2,MobileNo_Vnr,p.MobileNo from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DepartmentId!=17 AND g.DepartmentId!=18 AND g.DepartmentId!=23 AND g.DepartmentId!=0 AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by EmpCode ASC", $con); }

$Sno=1; $rows=mysql_num_rows($sql); $sn=1; while($res=mysql_fetch_array($sql)) { 
$Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; $month=$_REQUEST['m'];
$sqlDept=mysql_query("select DepartmentCode,DepartmentName from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlDesig=mysql_query("select DesigCode,DesigName from hrm_designation where DesigId=".$res['DesigId'],$con); $resDesig=mysql_fetch_assoc($sqlDesig);
//$sqlHQ=mysql_query("select HqName from hrm_headquater where HqId=".$res['HqId'], $con); 
//$resHQ=mysql_fetch_assoc($sqlHQ);

if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$res['EmployeeID']){ ?>
<form name="formEdit" method="post" onSubmit="return OvalidateEdit(this)">	
<div class="tbody">
<tbody>  
<tr bgcolor="<?php if($sn%2==0){echo '#D9D1E7';}else{echo '#FFFFFF';} ?>">
 <td align="center" class="All_30" valign="top"><?php echo $sn; ?>
 <input type="hidden" name="RDate" id="RDate" value="<?php echo $_REQUEST['Y']."-".$_REQUEST['m']."-".$_REQUEST['da']; ?>" />
 <input type="hidden" name="Y2" id="Y2" value="<?php echo $_REQUEST['Y']; ?>" />
 <input type="hidden" name="M2" id="M2" value="<?php echo $_REQUEST['m']; ?>" />
 <input type="hidden" name="YearId2" id="YearId2" value="<?php echo $YearId; ?>" />
 </td>
 <td bgcolor="#75BAFF" align="center" class="All_50" valign="top"><b><?php echo $res['EmpCode']; ?></b></td>
 <td class="All_200" valign="top"><?php echo $Ename; ?></td>
 <td class="All_250" valign="top"><?php echo $resDesig['DesigName']; ?></td>
 <td class="All_100" valign="top"><?php echo $res['HqName']; ?></td>
 <td class="All_100" valign="top"><input name="Mo1" style="width:100px;" class="EditInput" value="<?php if($res['AttMobileNo1']>0 AND $res['AttMobileNo1']!=''){echo $res['AttMobileNo1'];}elseif($res['MobileNo_Vnr']>0 AND $res['MobileNo_Vnr']!=''){echo $res['MobileNo_Vnr'];}else{echo '';} ?>" maxlength="12" /></td>	
 <td class="All_100" valign="top"><input name="Mo2" style="width:100px;" class="EditInput" value="<?php if($res['AttMobileNo2']>0 AND $res['AttMobileNo2']!=''){echo $res['AttMobileNo2'];}elseif($res['MobileNo']>0 AND $res['MobileNo']!=''){echo $res['MobileNo'];}else{echo '';} ?>" maxlength="12" /></td>	
 <td bgcolor="#FFFFFF" align="center" class="All_50" valign="top"><input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;<input type="hidden" name="EmployeeID" id="EmployeeID" value="<?php echo $res['EmployeeID']; ?>"/></td>	
</tr>
</form>
<?php } else { ?>
<tr bgcolor="<?php if($sn%2==0){echo '#D9D1E7';}else{echo '#FFFFFF';} ?>">
 <td align="center" class="All_30" valign="top"><?php echo $sn; ?></td>
 <td bgcolor="#75BAFF" align="center" class="All_50" valign="top"><b><?php echo $res['EmpCode']; ?></b></td>
 <td class="All_200" valign="top"><?php echo $Ename; ?></td>
 <td class="All_250" valign="top"><?php echo $resDesig['DesigName']; ?></td>
 <td class="All_100" valign="top"><?php echo $res['HqName']; ?></td>
 	
 <td class="All_100" valign="top"><font class="EditInput"><?php if($res['AttMobileNo1']>0 AND $res['AttMobileNo1']!=''){echo $res['AttMobileNo1'];}elseif($res['MobileNo_Vnr']>0 AND $res['MobileNo_Vnr']!=''){echo $res['MobileNo_Vnr'];}else{echo '';} ?></font></td>	
 <td class="All_100" valign="top"><font class="EditInput"><?php if($res['AttMobileNo2']>0 AND $res['AttMobileNo2']!=''){echo $res['AttMobileNo2'];}elseif($res['MobileNo']>0 AND $res['MobileNo']!=''){echo $res['MobileNo'];}else{echo '';} ?></font></td>	
 <td align="center" class="All_50" valign="top">
<?php if($_SESSION['User_Permission']=='Edit'){?>
<a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $res['EmployeeID']; ?>)"></a>
<?php } ?>
</td>
</tr>
</tbody>
</div>
<?php } $sn++; } ?>
<tr>
  <td align="left" class="fontButton" style="width:100%;" colspan="12">
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