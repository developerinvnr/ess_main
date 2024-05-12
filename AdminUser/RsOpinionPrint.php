<?php session_start(); require_once('config/config.php'); ?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</script>
<Script type="text/javascript" language="javascript">
window.print();
</Script>  
</head>
<body class="body">
<center>
<table border="0" style="width:95%;">
<tr><td style="height:50px;"></td></tr>
<?php if($_REQUEST['action']=='Opinion') { ?>
    <tr>	
	 <td valign="top" style=" width:700px;font-size:14px; color:#005BB7; font-family:Georgia; font-weight:bold;">&nbsp;&nbsp;Subject - <?php echo strtoupper($_REQUEST['v']); ?>&nbsp;&nbsp;&nbsp;&nbsp;
	 </td>
	</tr>
<?php } ?>


<?php if($_REQUEST['action']=='Opinion') { ?>
<tr>
 <td>
  <table border="1" cellspacing="1" width="100%" style="font-family:Times New Roman; font-size:15px;">
  
<?php $sy=mysql_query("select * from hrm_opinion o inner join hrm_employee e on o.EmployeeID=e.EmployeeID where o.OpenionName='".$_REQUEST['v']."' AND o.Openion='y' AND e.CompanyId=".$_REQUEST['c'],$con); 
$sn=mysql_query("select * from hrm_opinion o inner join hrm_employee e on o.EmployeeID=e.EmployeeID where o.OpenionName='".$_REQUEST['v']."' AND o.Openion='n' AND e.CompanyId=".$_REQUEST['c'],$con);
$ry=mysql_num_rows($sy); $rn=mysql_num_rows($sn);

$sql=mysql_query("select o.*,EmpStatus,EmpCode,Fname,Sname,Lname,DepartmentName from hrm_opinion o inner join hrm_employee e on o.EmployeeID=e.EmployeeID inner join hrm_employee_general g on o.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where o.OpenionName='".$_REQUEST['v']."' AND e.CompanyId=".$_REQUEST['c']." order by e.EmpCode ASC",$con); $row=mysql_num_rows($sql); ?>
   <tr bgcolor="#7a6189" style="height:25px;">
    <td colspan="9" style="color:#FFFFFF;">&nbsp;&nbsp;
	<b><font color="#E2EF87">Total Vote:</font>&nbsp;<?php echo $row; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<b><font color="#E2EF87">Yes:</font>&nbsp;<?php echo $ry; ?></b>&nbsp;&nbsp;&nbsp;
	<b><font color="#E2EF87">No:</font>&nbsp;<?php echo $rn; ?></b>&nbsp;&nbsp;&nbsp;
	</td>
   </tr>  
   <tr bgcolor="#7a6189" style="height:25px;">
    <td align="center" style="color:#FFFFFF;width:50px;"><b>SNo.</b></td>
	<td align="center" style="color:#FFFFFF;width:60px;"><b>Code</b></td>
	<td align="center" style="color:#FFFFFF;width:300px;"><b>Name</b></td>
	<td align="center" style="color:#FFFFFF;width:250px;"><b>Department</b></td>
	<td align="center" style="color:#FFFFFF;width:80px;"><b>Emp-Status</b></td>
	<!--<td align="center" style="color:#FFFFFF;width:50px;"><b>Vote</b></td>-->
	<td align="center" style="color:#FFFFFF;width:100px;"><b>Voting Date</b></td>
	
	<td align="center" style="color:#FFFFFF;width:100px;"><b>Cast</b></td>
	<td align="center" style="color:#FFFFFF;width:200px;"><b>Scheme</b></td>
   </tr>
<?php $Sno=1; while($res=mysql_fetch_assoc($sql)){ ?> 
   <tr bgcolor="#FFFFFF">
    <td align="center"><?php echo $Sno; ?></td>
    <td align="center"><?php echo $res['EmpCode']; ?></td>
    <td><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
    <td><?php echo $res['DepartmentName']; ?></td>
	<td><?php if($res['EmpStatus']=='A'){echo 'Active';}else{echo 'Deactive';} ?></td>
    <?php /*?><td align="center"><?php echo strtoupper($res['Openion']); ?></td><?php */?>
	<td align="center"><?php echo date("d-m-Y",strtotime($res['OpenionDate'])); ?></td>
	
	<td><?php if($res['Cast']!='Any Other'){echo $res['Cast'];}else{echo $res['CastOther'];} ?></td>
	<td><?php echo $res['Scheme1'].', '.$res['Scheme2'].', '.$res['Scheme3'].', '.$res['Scheme4']; ?></td>
   </tr>
<?php $Sno++; } ?>
  </table>
 </td>
</tr> 
<?php } ?>
   
</table>
</center>
</body>
</html>