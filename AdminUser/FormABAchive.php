<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry.......";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry.......";}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.th{color:#ffffff;font-family:Times New Roman;font-size:12px;text-align:center; height:25px;font-weight:bold;}.td{color:#000;font-family:Times New Roman;font-size:12px;}
.tdc{color:#000;font-family:Times New Roman;font-size:12px;text-align:center;}
.inputt{ border:hidden;width:100%;color:#000;font-family:Times New Roman;font-size:12px;}
 .font { color:#ffffff; font-family:Georgia; font-size:12px; width:100px;} .font1 { font-family:Georgia; font-size:12px; height:14px; width:100px; } 
.font2 { font-size:11px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:11px; width:120px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; width:100px; height:20px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}.inner_table{height:400px;overflow-y:auto;width:auto;}
</style>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script type="text/javascript" language="javascript">
/*function SelectYear(v){window.location='FormABAchive.php?YI='+v;}
function SelectDeptEmp(value)
{  var YId=document.getElementById("YId").value; var x = 'FormABAchive.php?DPid='+value+'&YI='+YId; 
   window.location=x; document.getElementById("PrintSpan").style.display='block'; }*/

function FunClick()  
{
 if(document.getElementById("YearID").value==''){alert("select year!"); return false;}
 else if(document.getElementById("DepartmentE").value==''){alert("select department!"); return false;}
 else{ window.location='FormABAchive.php?act=finddata&sel=valuetrue&recur=setvalue&y='+document.getElementById("YearID").value+'&a='+document.getElementById("AB").value+'&b=0&c=22&d='+document.getElementById("DepartmentE").value+'&rr=true&dd=false'; }
}   

function FunExport() 
{
 window.open('FormABAchiveExport.php?act=finddata&sel=valuetrue&recur=setvalue&y='+document.getElementById("YearID").value+'&a='+document.getElementById("AB").value+'&b=0&c=22&d='+document.getElementById("DepartmentE").value+'&rr=true&dd=false','QForm','menubar=no,scrollbars=yes,resizable=no,directories=no,width=50,height=50');
}  

$(document).ready(function () { $("#table1").freezeHeader({ 'height': '500px' }); })
 
</SCRIPT> 
</head> 
<body class="body">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $_REQUEST['YI']; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td valign="top">
 <table width="100%" style="margin-top:0px;" border="0">
  <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td></tr>
  <tr><td valign="top" align="center"  width="100%" id="MainWindow">

<?php //************************************************************************* ?>
<?php //**********START*****START*****START******START******START****************** ?>
<?php //****************************************************************************** ?>

<table border="0" style="margin-top:0px; width:100%; height:300px;">
<tr>
 <td align="left" height="20" valign="top" colspan="3">
 <table border="0">
  <tr>
   <td style="width:10px; ">&nbsp;</td>
<?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $rY=mysql_fetch_assoc($sY); $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>					
   <td style="width:120px;"><select style="font-size:12px;width:118px;background-color:#DDFFBB;" name="YearID" id="YearID" onChange="SelectYear(this.value)"><option value="<?php echo $_REQUEST['y']; ?>" style="margin-left:0px;" selected><?php echo $PRD; ?></option><?php for($i=$YearId; $i>=1; $i--){	$s2Y=mysql_query("select * from hrm_year where YearId=".$i,$con); $r2Y=mysql_fetch_assoc($s2Y); $FD2=date("Y",strtotime($r2Y['FromDate'])); $TD2=date("Y",strtotime($r2Y['ToDate'])); ?><?php if($_REQUEST['YI']!=$i){?><option value="<?php echo $i; ?>"><?php echo $FD2.'-'.$TD2; ?></option><?php } } ?></select></td>
   <td style=" width:155px;"><?php $Sql=mysql_query("select * from hrm_department where DepartmentId=".$_REQUEST['d'], $con); $Res=mysql_fetch_assoc($Sql); ?><select style="font-size:12px;width:150px;background-color:#DDFFBB;display:block;" name="DepartmentE" id="DepartmentE" onChange="SelectDeptEmp(this.value)"><option value="<?php echo $_REQUEST['d']; ?>" selected><?php echo $Res['DepartmentName']; ?></option><?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?><option value="999">All</option></select><input type="hidden" name="DeptId" id="DeptId" value="<?php echo $_REQUEST['DPid']; ?>" /></td>
   <td style=" width:150px;"><select style="font-size:12px;width:150px;background-color:#DDFFBB;display:block;" name="AB" id="AB"><option value="<?php echo $_REQUEST['a']; ?>" selected><?php echo $_REQUEST['a']; ?></option><option value="form-A">form-A</option><option value="form-A (SubKRA)">form-A (SubKRA)</option><option value="form-B">form-B</option></select></td>
    <td style="width:80px;"><input type="button" value="click" style="width:80px;" onClick="FunClick()" /></td>
	<td style="width:80px;"><input type="button" name="back" id="back" style="width:80px;" value="Back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/></td>
	<td>&nbsp;</td>
	<?php if($_REQUEST['y']>0 AND $_REQUEST['d']>0 AND $_REQUEST['a']!=''){ ?>
	<td class="td"><a href="#" onClick="FunExport()" style="cursor:pointer;">Export</a></td>
	<?php } ?>
	<td><input style="font:Times New Roman; width:200px; color:#4A0000; font-size:14px; background-color:#E0DBE3; border-style:none; font-weight:bold;" value="<?php echo $Res['DepartmentName']; ?>" /></td>
	
   </tr>
  </table>
  </td>
 </tr>
<?php if(( $_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>
  <td style="width:10px;" valign="top" align="center">&nbsp;</td>
  <?php //******************** Open Department ****************************?> 
  
  <?php if($_REQUEST['a']=='form-A'){$head='KRA'; }elseif($_REQUEST['a']=='form-A (SubKRA)'){$head='Sub-KRA'; }else{$head='Skill';} ?>
  
  <td align="left" id="type" valign="top" style="display:block;width:100%">             
  <table border="0" width="100%">
   <tr>
    <td align="left" width="100%">
    <table border="1" width="100%" id="table1" border="1" bgcolor="#FFFFFF" cellspacing="1">
	 <div class="thead">
     <thead>
     <tr bgcolor="#7a6189">
      <td rowspan="2" class="th" style="width:2%;"><b>SNo</b></td>
	  <td rowspan="2" class="th" style="width:3%;"><b>EC</b></td>
	  <td rowspan="2" class="th" style="width:13%;"><b>Name</b></td>
      <td rowspan="2" class="th" style="width:15%;"><b><?php echo $head; ?></b></td>
      <td rowspan="2" class="th" style="width:5%;"><b>Schedule</b></td>
	  <td rowspan="2" rowspan="2" class="th" style="width:5%;"><b>Wgt</b></td>
	  <td rowspan="2" class="th" style="width:4%;"><b>Tgt</b></td>
	  <td colspan="2" class="th"><b>Employee</b></td>
	  <td colspan="2" class="th"><b>Appraiser</b></td>
     </tr>
	 <tr bgcolor="#7a6189">
	  <td class="th" style="width:4%;"><b>Ach</b></td>
	  <td class="th" style="width:35%;"><b>Remark</b></td>
      <td class="th" style="width:4%;"><b>Ach</b></td>
      <td class="th" style="width:10%;"><b>Remark</b></td>
     </tr>
	 </thead> 
     </div>
<?php if($_REQUEST['y']>0 AND $_REQUEST['d']>0 AND $_REQUEST['a']!=''){ 

if($_REQUEST['d']==999)
{

if($_REQUEST['a']=='form-A')
{ $sql=mysql_query("select Tital,Wgt,Tgt,Ach,Remark,Cmnt,AppAch,AppCmnt,EmpCode,Fname,Sname,Lname,DepartmentCode from hrm_pms_kra_tgtdefin k inner join hrm_pms_kra kr on k.KRAId=kr.KRAId inner join hrm_employee e on kr.EmployeeID=e.EmployeeID inner join hrm_employee_general g on kr.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where kr.YearId=".$_REQUEST['y']." AND e.EmpStatus='A' order by e.EmpCode ASC, k.KRAId ASC, Ldate ASC",$con); }
elseif($_REQUEST['a']=='form-A (SubKRA)')
{ $sql=mysql_query("select Tital,Wgt,Tgt,Ach,Remark,Cmnt,AppAch,AppCmnt,EmpCode,Fname,Sname,Lname,DepartmentCode from hrm_pms_kra_tgtdefin k inner join hrm_pms_krasub krs on k.KRASubId=krs.KRASubId inner join hrm_pms_kra kr on krs.KRAId=kr.KRAId inner join hrm_employee e on kr.EmployeeID=e.EmployeeID inner join hrm_employee_general g on kr.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where kr.YearId=".$_REQUEST['y']." AND e.EmpStatus='A' order by e.EmpCode ASC, k.KRASubId ASC, Ldate ASC",$con); }
elseif($_REQUEST['a']=='form-B')
{ $sql=mysql_query("select Tital,Wgt,Tgt,Ach,Remark,Cmnt,AppAch,AppCmnt,EmpCode,Fname,Sname,Lname,DepartmentCode from hrm_pms_formb_tgtdefin k inner join hrm_employee e on k.EmployeeID=e.EmployeeID inner join hrm_employee_general g on k.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where k.YearId=".$_REQUEST['y']." AND e.EmpStatus='A' order by e.EmpCode ASC, k.FormBId ASC, Ldate ASC",$con); }		  

}
else
{

if($_REQUEST['a']=='form-A')
{ $sql=mysql_query("select Tital,Wgt,Tgt,Ach,Remark,Cmnt,AppAch,AppCmnt,EmpCode,Fname,Sname,Lname,DepartmentCode from hrm_pms_kra_tgtdefin k inner join hrm_pms_kra kr on k.KRAId=kr.KRAId inner join hrm_employee e on kr.EmployeeID=e.EmployeeID inner join hrm_employee_general g on kr.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where kr.YearId=".$_REQUEST['y']." AND g.DepartmentId=".$_REQUEST['d']." AND e.EmpStatus='A' order by e.EmpCode ASC, k.KRAId ASC, Ldate ASC",$con); }
elseif($_REQUEST['a']=='form-A (SubKRA)')
{ $sql=mysql_query("select Tital,Wgt,Tgt,Ach,Remark,Cmnt,AppAch,AppCmnt,EmpCode,Fname,Sname,Lname,DepartmentCode from hrm_pms_kra_tgtdefin k inner join hrm_pms_krasub krs on k.KRASubId=krs.KRASubId inner join hrm_pms_kra kr on krs.KRAId=kr.KRAId inner join hrm_employee e on kr.EmployeeID=e.EmployeeID inner join hrm_employee_general g on kr.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where kr.YearId=".$_REQUEST['y']." AND g.DepartmentId=".$_REQUEST['d']." AND e.EmpStatus='A' order by e.EmpCode ASC, k.KRASubId ASC, Ldate ASC",$con); }
elseif($_REQUEST['a']=='form-B')
{ $sql=mysql_query("select Tital,Wgt,Tgt,Ach,Remark,Cmnt,AppAch,AppCmnt,EmpCode,Fname,Sname,Lname,DepartmentCode from hrm_pms_formb_tgtdefin k inner join hrm_employee e on k.EmployeeID=e.EmployeeID inner join hrm_employee_general g on k.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where k.YearId=".$_REQUEST['y']." AND g.DepartmentId=".$_REQUEST['d']." AND e.EmpStatus='A' order by e.EmpCode ASC, k.FormBId ASC, Ldate ASC",$con); }

}

$sn=1; while($res = mysql_fetch_assoc($sql)) { ?>
     <div class="tbody">
     <tbody>
     <tr bgcolor="<?php if($res['Tital']=='Quarter 1' || $res['Tital']=='Quarter 2' || $res['Tital']=='Quarter 3' || $res['Tital']=='Quarter 4'){echo '#DCFFB9';}elseif($res['Tital']=='Half Year 1' || $res['Tital']=='Half Year 2'){echo '#FFFFB9';}else{echo '#FFF';} ?>">
      <td class="tdc"><?php echo $sn; ?></td>
	  <td class="tdc"><?php echo $res['EmpCode']; ?></td>
	  <td class="td"><input class="inputt" style="background-color:<?php if($res['Tital']=='Quarter 1' || $res['Tital']=='Quarter 2' || $res['Tital']=='Quarter 3' || $res['Tital']=='Quarter 4'){echo '#DCFFB9';}elseif($res['Tital']=='Half Year 1' || $res['Tital']=='Half Year 2'){echo '#FFFFB9';}else{echo '#FFF';} ?>" value="<?php echo ucwords(strtolower($res['Fname'].' '.$res['Sname'].' '.$res['Lname'])); ?>" /></td>
      <td class="td"><input class="inputt" style="background-color:<?php if($res['Tital']=='Quarter 1' || $res['Tital']=='Quarter 2' || $res['Tital']=='Quarter 3' || $res['Tital']=='Quarter 4'){echo '#DCFFB9';}elseif($res['Tital']=='Half Year 1' || $res['Tital']=='Half Year 2'){echo '#FFFFB9';}else{echo '#FFF';} ?>" value="<?php echo $res['Remark']; ?>" /></td>
      <td class="tdc"><?php echo $res['Tital']; ?></td>
      <td class="tdc"><?php echo $res['Wgt']; ?></td>
      <td class="tdc"><?php echo $res['Tgt']; ?></td>
	  <td class="tdc"><?php if($res['Ach']>0){echo $res['Ach'];}else{echo '';} ?></td>
      <td class="td"><input class="inputt" style="background-color:<?php if($res['Tital']=='Quarter 1' || $res['Tital']=='Quarter 2' || $res['Tital']=='Quarter 3' || $res['Tital']=='Quarter 4'){echo '#DCFFB9';}elseif($res['Tital']=='Half Year 1' || $res['Tital']=='Half Year 2'){echo '#FFFFB9';}else{echo '#FFF';} ?>" value="<?php echo $res['Cmnt']; ?>" /></td>
      <td class="tdc"><?php echo $res['AppAch']; ?></td>
      <td class="td"><input class="inputt" style="background-color:<?php if($res['Tital']=='Quarter 1' || $res['Tital']=='Quarter 2' || $res['Tital']=='Quarter 3' || $res['Tital']=='Quarter 4'){echo '#DCFFB9';}elseif($res['Tital']=='Half Year 1' || $res['Tital']=='Half Year 2'){echo '#FFFFB9';}else{echo '#FFF';} ?>" value="<?php echo $res['AppCmnt']; ?>" /></td>
     </tr>
	 </tbody>
	 </div>
<?php $sn++; } } ?>
	
    </table> 
    </td>
   </tr> 
   </table>  
  </td>
<?php //*********** Close Department ******************************?>    
 </tr>
<?php } ?> 
</table>
<?php //****************************************************************************************?>
<?php //******************END*****END*****END******END******END********************?>
<?php //**************************************************************************?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

