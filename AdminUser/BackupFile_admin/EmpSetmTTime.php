<?php session_start();
require_once('config/config.php');
date_default_timezone_set('asia/calcutta');

$BY=date("Y")-1;
if($_REQUEST['y']>=date("Y")){ $AttTable='hrm_employee_attendance'; }
elseif($_REQUEST['y']==$BY AND date("m")=='01' AND $_REQUEST['m']==12){ $AttTable='hrm_employee_attendance'; }
elseif($_REQUEST['y']==$BY AND $_REQUEST['m']<12){ $AttTable='hrm_employee_attendance_'.$_REQUEST['y']; }
else{$AttTable='hrm_employee_attendance_'.$_REQUEST['y']; }
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> /*background-color:#AEAE00;*/
.htf{ font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:12px;}
.htf2{font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:15px;}
.tdf{ font-family:Times New Roman;font-size:12px;color:#000000; height:25px;}
.tdft{ background-color:#FFFF9D;font-family:Times New Roman;font-size:14px;color:#000000;}
.tdf2{background-color:#FFFFC4;font-family:Times New Roman;;font-size:14px;text-align:center;}
</style>

</head>
<body>
<?php $sql=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,TimeApply,InTime,OutTime,HqName from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_headquater h ON g.HqId=h.hqId where e.EmployeeID=".$_REQUEST['ei'], $con); 
      $rows=mysql_num_rows($sql); $res=mysql_fetch_array($sql);  	  
?>
<table border="0" style="margin-top:0px;width:100%;">
<form method="post" name="form">
 <tr>
  <td align="center" height="20" valign="top">
   <table border="0">
    <tr>
	  <td align="center"><font color="#2D002D" style='font-family:Times New Roman;' size="4">
	  <b>Set In/Out Time (Month wise)</b><br>
	  Name:&nbsp;<b><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></b>,&nbsp;&nbsp;
	  Location:&nbsp;<b><?php echo $res['HqName']; ?></b></font><br>
	  Standard Time:&nbsp;<b>In-<?php echo date("H:i",strtotime($res['InTime'])).',&nbsp;&nbsp;Out-'.date("H:i",strtotime($res['OutTime'])); ?></b>&nbsp;&nbsp;
	  Month:&nbsp;<b><?php echo date("F",strtotime($_REQUEST['y']."-".$_REQUEST['m']."-01")); ?></b></font></td>
    </tr>
   </table>
  </td>
 </tr>
 <tr>
  <td valign="top">
   <table border="0">
    <tr>
<input type="hidden" id="EI" name="EI" value="<?php echo $res['EmployeeID']; ?>" />	
<?php for($i=1; $i<=31; $i++){ $day=sprintf('%02d' ,$i); $date=$_REQUEST['y']."-".$_REQUEST['m']."-".$i;
$sqlchk=mysql_query("select II,OO from ".$AttTable." where EmployeeID=".$res['EmployeeID']." AND AttDate='".$_REQUEST['y']."-".$_REQUEST['m']."-".$i."'",$con); $chk=mysql_fetch_assoc($sqlchk);
 ?>	
	  <td align="center">
	   <table border="0">
	    <tr><td colspan="3" class="htf2" bgcolor="<?php if(date("w",strtotime($date))==0){echo '#58B000';}else{echo '#AEAE00';} ?>"><?php echo $i; ?></td></tr>
		<tr>
		 <td class="htf" style="width:50px;background-color:<?php if(date("w",strtotime($date))==0){echo '#58B000';}else{echo '#AEAE00';} ?>;">In</td>
		 <td class="htf" style="width:50px;background-color:<?php if(date("w",strtotime($date))==0){echo '#58B000';}else{echo '#AEAE00';} ?>;">Out</td>
		</tr>
		<tr>
		 <td class="tdf" align="center"><input style="width:50px;text-align:center;" value="<?php if($chk['II']!='00:00:00' AND $chk['II']!=''){ echo date("H:i",strtotime($chk['II']));} ?>" /></td>
		 <td class="tdf" align="center"><input style="width:50px;text-align:center;" value="<?php if($chk['OO']!='00:00:00' AND $chk['OO']!=''){ echo date("H:i",strtotime($chk['OO'])); } ?>" /></td>
		</tr>
	   </table>
	  </td>
<?php if($i%7==0){ ?></tr><tr> <?php } } ?>
   </table>
  </td>
 </tr>
</form>

</table>
</body>
</html>