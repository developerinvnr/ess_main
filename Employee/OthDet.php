<?php
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.thh{font-family:Times New Roman;font-size:18px;font-weight:bold;}
.th{color:#FFF;font-family:Times New Roman;font-size:12px;font-weight:bold;text-align:center;}
.td{color:#000;font-family:Times New Roman;font-size:12px;text-align:left;}
.tdc{color:#000;font-family:Times New Roman;font-size:12px;text-align:center;}
.tdr{color:#000;font-family:Times New Roman;font-size:12px;text-align:right;}
.input{color:#000;font-family:Times New Roman;font-size:12px;text-align:left;width:100%;}
.inner_table{height:400px;overflow-y:auto;width:auto;}
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script src="../AdminUser/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="../AdminUser/js/jquery.freezeheader.js"></script>
<script type="text/javascript" language="javascript">
function SelectDept(v){ window.location='EmpElig.php?action=DeptElig&value='+v;}

function FunElig(id)
{ window.open("EmpEligElig.php?id="+id,"EForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=800,height=600"); }

$(document).ready(function () { $("#table1").freezeHeader({ 'height': '450px' }); })
</script>
</head>
<body class="body">
<table class="table">

<tr>
 <td>
  <table width="100%" style="margin-top:0px; ">
	<tr><td>&nbsp;</td></tr>
	 
		   <td valign="top" width="110%"> 
<?php if(isset($_REQUEST['value'])){?>	   
<?php //***************************************************************************** ?>	   
<table border="1" width="100%" cellspacing="0">
 <!--<div class="thead">id="table1" 
 <thead>-->
 <tr bgcolor="#7a6189" style="height:28px;">
 <td class="th" style="width:3%;"><b>Sn</b></td>
  <td class="th" style="width:3%;"><b>EC</b></td>
  <td class="th" style="width:3%;"><b>Status</b></td>
  <td class="th" style="width:15%;"><b>Name</b></td>
  <td class="th" style="width:8%;"><b>Dept</b></td>
  <td class="th" style="width:3%;"><b>Grade</b></td>
  <td class="th" style="width:15%;"><b>Email</b></td>
  <td class="th" style="width:3%;"><b>Mobile</b></td>
  <td class="th" style="width:3%;"><b>PAN</b></td>
  <td class="th" style="width:10%;"><b>Reporting Name</b></td>
  <td class="th" style="width:3%;"><b>Contact</b></td>
  <td class="th" style="width:15%;"><b>Email</b></td>
 </tr>
 
 <!-- </thead>
</div>-->
<?php if($_REQUEST['value']=='All'){ $sql=mysql_query("select g.EmployeeID, EmpCode, CONCAT(Fname,' ' ,Sname, ' ',Lname) as fullname, DepartmentCode, GradeValue, EmailId_Vnr, MobileNo_Vnr, ReportingName, ReportingContactNo, ReportingEmailId, EmpStatus, p.PanNo from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_grade gr ON g.GradeId=gr.GradeId INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID where e.CompanyId=".$_REQUEST['c']." AND e.EmpStatus!='De' order by e.EmpStatus,e.ECode ASC", $con); }
else { $sql=mysql_query("select g.EmployeeID, EmpCode, CONCAT(Fname,' ' ,Sname, ' ',Lname) as fullname, DepartmentCode, GradeValue, EmailId_Vnr, MobileNo_Vnr, ReportingName, ReportingContactNo, ReportingEmailId, EmpStatus, p.PanNo from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_grade gr ON g.GradeId=gr.GradeId INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID where g.DepartmentId=".$_REQUEST['value']." AND e.CompanyId=".$_REQUEST['c']." AND e.EmpStatus!='De' order by e.EmpStatus,e.ECode ASC", $con); } 
$Sno=1; while($res=mysql_fetch_array($sql)){ ?> 
<!--<div class="tbody">
<tbody>-->
<tr bgcolor="<?php if($res['EmpStatus']=='D'){echo '#FEF1DE';}else{echo '#FFFFFF';}?>" style="height:24px;">
 <td class="tdc"><?php echo $Sno; ?></td>
 <td class="tdc"><?php echo $res['EmpCode']; ?></td>
 <td class="tdc"><?php echo $res['EmpStatus']; ?></td>
 <td class="td"><?php echo $res['fullname'];?></td>
 <td class="tdc"><?php echo strtolower($res['DepartmentCode']); ?></td>
 <td class="tdc"><?php echo $res['GradeValue']; ?></td>
 <td class="td"><?php echo $res['EmailId_Vnr']; ?></td>
 <td class="tdc"><?php echo $res['MobileNo_Vnr']; ?></td>
 <td class="tdc"><?php echo $res['PanNo']; ?></td>	
 <td class="td"><?php echo $res['ReportingName']; ?></td>	
 <td class="tdc"><?php echo $res['ReportingContactNo']; ?></td>
 <td class="td"><?php echo $res['ReportingEmailId']; ?></td>
</tr>
<!--</tbody>
</div>-->
 <?php $Sno++; } ?> 
</table>
			
<?php //***************************************************************************** ?>
<?php } ?>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;">
		    <tr><td align="center" valign="top" width="100">&nbsp;</td></tr>
	        </table>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;"><tr><td align="center" valign="top">&nbsp;&nbsp;</td></tr></table>
		   </td>
		  </tr>
		</table>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>