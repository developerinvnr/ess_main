<?php require_once('../AdminUser/config/config.php'); ?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
.All_40{font-size:11px; height:20px; width:40px;} .All_50{font-size:11px; height:20px; width:50px;} .All_70{font-size:11px; height:20px; width:70px;} .All_80{font-size:11px; height:20px; width:80px;}.All_100{font-size:11px; height:20px; width:100px;} .All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} .All_60{font-size:11px; height:20px; width:60px;}
.All_150{font-size:11px; height:20px; width:150px;}.All_170{font-size:11px; height:20px; width:170px;}.All_180{font-size:11px; height:20px; width:180px;}.All_190{font-size:11px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} .All_450{font-size:11px; height:20px; width:450px;}.All_360{font-size:11px; height:20px; width:350px;}.All_540{font-size:11px; height:20px; width:540px;}.All_400{font-size:11px; height:20px; width:400px;} .All_600{font-size:11px; height:20px; width:600px;}
</style>
<script language="javascript" type="text/javascript">
function Printpage()
 { window.print(); window.close(); }
</script>
</head>
<body class="body">
<table>
<tr><td>&nbsp;</td></tr>
<?php if($_REQUEST['action']=='AppRev') { $CompanyId=$_REQUEST['c']; $YearId=$_REQUEST['y']; ?>
<tr>
 <td>
   <table border="1" width="1000">
     <tr>
<?php $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); ?>	 
	  <td colspan="8" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;Employee Detaiils :
	  &nbsp;&nbsp;(&nbsp;Department - <?php echo $resA['DepartmentName']; ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="Printpage()" style="color:#F9F900; font-size:12px;">Print</a>
	  </td>
	 </tr>
	  <tr bgcolor="#7a6189">
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>SNo.</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>EmpCode</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>EmpPass</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_120"><b>Department</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_200"><b>Designation</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Grade</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_120"><b>DOJ</b></td>
	</tr>
<?php $sqlD=mysql_query("select hrm_employee.*, hrm_employee_general.DepartmentId, hrm_employee_general.DesigId, hrm_employee_general.HqId, hrm_employee_general.GradeId, hrm_employee_general.DesigId, hrm_employee_general.DateJoining, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YearId, $con); $Sno=1; while($resD=mysql_fetch_array($sqlD)){ ?>    
	 <tr bgcolor="#FFFFFF">
		<td align="center" <?php if($Sno%2==0){?> background="images/blueBack.jpg" <?php } ?> style="" class="All_50"><?php echo $Sno; ?></td>
		<td align="center" <?php if($Sno%2==0){?> background="images/blueBack.jpg" <?php } ?> style="" class="All_80"><?php echo $resD['EmpCode']; ?></td>
		<td align="center" <?php if($Sno%2==0){?> background="images/blueBack.jpg" <?php } ?> style="" class="All_80"><?php echo $resD['EmpPass']; ?></td>
		<td align="" style="" <?php if($Sno%2==0){?> background="images/blueBack.jpg" <?php } ?> class="All_200"><?php echo $resD['Fname'].' '.$resD['Sname'].' '.$resD['Lname']; ?></td>
<?php $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resD['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); ?>		
		<td align="" style="" <?php if($Sno%2==0){?> background="images/blueBack.jpg" <?php } ?> class="All_120"><?php echo $resDept['DepartmentCode']; ?></td>
<?php $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$resD['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig); ?>		
		<td align="" style="" <?php if($Sno%2==0){?> background="images/blueBack.jpg" <?php } ?> class="All_200"><?php echo $resDesig['DesigName']; ?></td>
<?php $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$resD['GradeId'], $con); $resG=mysql_fetch_assoc($sqlG); ?>		
		<td  <?php if($Sno%2==0){?> background="images/blueBack.jpg" <?php } ?> align="center" style="" class="All_50"><?php echo $resG['GradeValue']; ?></td>
		<td  <?php if($Sno%2==0){?> background="images/blueBack.jpg" <?php } ?> align="" style="" class="All_120">&nbsp;<?php echo date("d-M-y", strtotime($resD['DateJoining'])); ?></td>			
	 </tr>
	 <?php $Sno++; } ?> 
   </table>
 </td>
</tr> 
<?php } ?>

</table>  
 
</body>
</html>

