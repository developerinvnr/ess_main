<?php require_once('../AdminUser/config/config.php'); ?>
<style>
.td1{ text-align:center;font-family:Times New Roman;color:#FFFFFF;font-size:14px; }
.td2{ text-align:center;font-family:Times New Roman;font-size:12px; }
.td3{ font-family:Times New Roman;font-size:12px; }
</style>
<table border="1" cellspacing="1">
 <tr bgcolor="#7a6189">
  <td class="td1" style="width:40px;"><b>SNo.</b></td>
  <td class="td1" style="width:50px;"><b>EC</b></td>
  <td class="td1" style="width:250px;"><b>Name</b></td>
  <td class="td1" style="width:100px;"><b>Department</b></td>
  <td class="td1" style="width:250px;"><b>Designation</b></td>
  <td class="td1" style="width:100px;"><b>HQ</b></td>
  <td class="td1" style="width:120px;"><b>State</b></td>
  <td class="td1" style="width:100px;"><b>Employee</b></td>
  <td class="td1" style="width:100px;"><b>Appraiser</b></td>
  <td class="td1" style="width:100px;"><b>Reviewer</b></td>
  <td class="td1" style="width:60px;"><b>KRA</b></td>
  <td class="td1" style="width:50px;"><b>Action</b></td>
 </tr>

<?php
if($_POST['StHQid'] AND $_POST['StHQid']!='')
{ 
 $sql=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,DepartmentCode,DesigName,HqName,StateName from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON g.DesigId=de.DesigId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where hq.StateId=".$_POST['StHQid']." AND e.EmpStatus='A' AND p.AssessmentYear=".$_POST['YI']." AND p.HOD_EmployeeID=".$_POST['EmpId'], $con); 
}
elseif($_POST['HQid'] AND $_POST['HQid']!='')
{ 
 $sql=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,DepartmentCode,DesigName,HqName,StateName from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON g.DesigId=de.DesigId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where g.HqId=".$_POST['HQid']." AND e.EmpStatus='A' AND p.AssessmentYear=".$_POST['YI']." AND p.HOD_EmployeeID=".$_POST['EmpId'], $con);
}
	 
$sno=1; while($res=mysql_fetch_array($sql)){ ?>     		
		
		<tr bgcolor="#FFFFFF" style="height:20px;" valign="middle">
	      <td class="td2"><?php echo $sno; ?></td>
	      <td class="td2"><?php echo $res['EmpCode']; ?></td>
	      <td class="td3">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
          <td class="td3">&nbsp;<?php echo $res['DepartmentCode'];?></td>
	      <td class="td3">&nbsp;<?php echo $res['DesigName'];?></td>		
	      <td class="td3">&nbsp;<?php echo $res['HqName'];?></td>
		  <td class="td3">&nbsp;<?php echo $res['StateName'];?></td>
		  
<?php $sql3E=mysql_query("select EmpStatus,AppStatus,RevStatus,UseKRA from hrm_pms_kra where YearId=".$_POST['YI']." AND EmployeeID=".$res['EmployeeID'], $con); $row3E=mysql_num_rows($sql3E); 
      if($row3E==0){ $stE='Draft';$stA='Draft';$stR='Draft'; $clr='#A40000';$Aclr='#A40000';$Rclr='#A40000';} 
	  if($row3E>0)
	  { $res3E=mysql_fetch_assoc($sql3E);
	    if($res3E['EmpStatus']=='D'){$stE='Draft'; $clr='#A40000';} if($res3E['EmpStatus']=='P'){$stE='Pending'; $clr='#36006C';} if($res3E['EmpStatus']=='A'){$stE='Submitted'; $clr='#005300';}
		if($res3E['AppStatus']=='D'){$stA='Draft'; $Aclr='#A40000';} if($res3E['AppStatus']=='P'){$stA='Pending'; $Aclr='#36006C';} if($res3E['AppStatus']=='A'){$stA='Submitted'; $Aclr='#005300';}
		if($res3E['RevStatus']=='D'){$stR='Draft'; $Rclr='#A40000';} if($res3E['RevStatus']=='P'){$stR='Pending'; $Rclr='#36006C';} if($res3E['RevStatus']=='A'){$stR='Submitted'; $Rclr='#005300';}
		
	  }
?>		
		  <td class="td2" style="color:<?php echo $clr;?>;"><?php echo $stE;?></td>
		  <td class="td2" style="color:<?php echo $Aclr;?>;"><?php echo $stA;?></td>
		  <td class="td2" style="color:<?php echo $Rclr;?>;"><?php echo $stR;?></td>
		  <td class="td2"><?php if($row3E>0){?><a href="#" onClick="javascript:window.location='HodCheckNewKRA.php?e=<?php echo $res['EmployeeID'];?>&yi=<?php echo $resSY['CurrY'];?>&ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=0&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1'">Click</a><?php }else{echo '';} ?></td>
		  <td class="td2"><?php if($res3E['UseKRA']=='H'){?><a href="#"><img src="images/go-back-icon.png" border="0" onClick="return ResentKRA(<?php echo $res['EmployeeID'].', '.$resSY['CurrY'];?>)"/></a><?php } ?></td>
		 </tr>
<?php $sno++; } ?>	
	
</table>	 	




