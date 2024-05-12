<?php require_once('config/config.php'); ?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:12px; width:100px;} .font1 { font-family:Georgia; font-size:12px; height:14px; width:100px; } 
.font2 { font-size:11px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
</style>
<script>function printage() {window.print(); window.close();}</script>
</head>
<body class="body">
<?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $rY=mysql_fetch_assoc($sY); 
      $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>
   <table border="0">
    <tr><td align="right" width="120" class="heading">PMS - KRA</td><td width="50">&nbsp;</td>
	    <td align="right" width="100" class="heading">Year:&nbsp;</td>
		<td width="50"><font style="font-family:Times New Roman;font-size:15px;"><b><?php echo $PRD; ?></b></font></td>
		<td width="50">&nbsp;</td>
		<td width="120" class="heading">Department:&nbsp;</td>
		<td>
<?php $Sql=mysql_query("select * from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $Res=mysql_fetch_assoc($Sql);  ?>		
<input style="font:Times New Roman;width:200px;font-size:15px;background-color:#E0DBE3;border-style:none;font-weight:bold;" value="<?php echo $Res['DepartmentName'] ?>" />
		</td>
	    <td style="font:Times New Roman; width:200px; color:#4A0000; font-size:12px; ">
		<a href="#" onClick="printage()"><font style="font-family:Times New Roman; font-size:12px;">Print</font></a>	
		</td>
	</tr>
   </table>
  </td>
 </tr>	
 <tr>
 <td style="width:10px;" valign="top" align="center">&nbsp;</td>
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="1" width="1600">
	<tr>
	  <td align="left" width="1600">
	     <table border="1" width="1600" border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#7a6189">
		   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:40px;"><b>SNo</b></td>
	       <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>EC</b></td>
	       <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:210px;"><b>Name</b></td>
	       <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:250px;"><b>Designation</b></td>
	       <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:450px;" valign="top" align="center"><b>KRA</b></td>
	       <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:500px;" valign="top" align="center"><b>Description</b></td>
	       <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>Measure</b></td>
	       <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>Unit</b></td>
	       <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>Weightage</b></td>
	       <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>Target</b></td>
		 </tr> 		  
 <?php $sqlDP = mysql_query("SELECT EmpCode,Fname,Sname,Lname,DesigName,KRA,KRA_Description,Measure,Unit,Weightage,Target FROM hrm_pms_kra INNER JOIN hrm_employee ON hrm_pms_kra.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_pms_kra.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_general.DesigId=hrm_designation.DesigId WHERE hrm_pms_kra.DepartmentId=".$_REQUEST['value']." AND hrm_pms_kra.YearId=".$_REQUEST['y']." AND hrm_pms_kra.CompanyId=".$_REQUEST['c']." AND hrm_pms_kra.KRAStatus='A' order by hrm_employee.EmpCode ASC, hrm_pms_kra.KRAId ASC", $con); $Sno=1;  while($resDP = mysql_fetch_assoc($sqlDP)) {  ?>	 
		<tr>
		   <td align="center" style="font-family:Times New Roman;font-size:11px; width:40px;" valign="top"><?php echo $Sno; ?></td>
		   <td align="center" style="font-family:Times New Roman;font-size:12px; width:50px;" valign="top"><?php echo $resDP['EmpCode']; ?></td>
		   <td style="font-family:Times New Roman;font-size:12px; width:210px;" valign="top"><?php echo $resDP['Fname'].' '.$resDP['Sname'].' '.$resDP['Lname']; ?></td>
		   <td style="font-family:Times New Roman;font-size:12px; width:250px;" valign="top"><?php echo $resDP['DesigName']; ?></td>
		   <td style="font-family:Times New Roman;font-size:12px; width:300px;" valign="top"><?php echo $resDP['KRA']; ?></td>
		   <td style="font-family:Times New Roman; font-size:12px; width:700px;" valign="top"><?php echo $resDP['KRA_Description']; ?></td>
		   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top"><?php echo $resDP['Measure']; ?></td>
		   <td align="center" style="font-family:Times New Roman;font-size:12px; width:50px;" valign="top"><?php echo $resDP['Unit']; ?></td>
		   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top"><?php echo $resDP['Weightage']; ?></td>
		   <td align="center" style="font-family:Times New Roman;font-size:12px; width:50px;" valign="top"><?php echo $resDP['Target']; ?></td>
		</tr>
<?php $Sno++; } ?>		
	    </table>	 
      </td>
	</tr> 
  </table>  
</body>
</html>

