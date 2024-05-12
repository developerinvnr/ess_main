<?php
require_once('config/config.php');
if(isset($_POST['id']) && $_POST['id']!=""){ $id=$_POST['id']; $dept=$_POST['dept']; $YId=$_POST['YId']; $UId=$_POST['UId']; $CId=$_POST['CId'];

$sqlCheck=mysql_query("select * from hrm_pms_reviewer where DepartmentId=".$dept." AND EmployeeID_UserId=".$id, $con);  $row=mysql_num_rows($sqlCheck);
 if($row==0)
  { $sql=mysql_query("insert into hrm_pms_reviewer(YearId,DepartmentId,EmployeeID_UserId,CompanyId,CreatedBy,CreatedDate) values(".$YId.",".$dept.",".$id.",".$CId.",".$UId.",'".date("Y-m-d")."')", $con);  }
?>

<table id="TableRev">
 <tr bgcolor="#7a6189">
    <td class="font" style="width:50px;" align="center"><b>Sno</b></td>
	<td class="font" style="width:300px;" align="center"><b>Name</b></td>
	<td class="font" style="width:200px;" align="center"><b>Designation</b></td>
	<td class="font" style="width:50px;" align="center"><b>Action</b></td> 
 </tr>
<?php $sqlRev=mysql_query("select * from hrm_pms_reviewer where DepartmentId=".$dept." Order By ReviewerId ASC", $con); $no=1; while($resRev=mysql_fetch_array($sqlRev)) { ?>
 <tr bgcolor="#FFFFFF">
  <td class="font1" style="width:50px;" align="center"><?php echo $no; ?></td>
<?php $sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DesigId2,Gender,Married from hrm_pms_reviewer INNER JOIN hrm_employee ON hrm_pms_reviewer.EmployeeID_UserId=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_pms_reviewer.EmployeeID_UserId=".$resRev['EmployeeID_UserId'], $con); 
      $resE=mysql_fetch_assoc($sqlE);
	  if($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';} 
	  $Name=$resE['EmpCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
	  $sqlDe=mysql_query("select DesigCode from hrm_designation where DesigId=".$resE['DesigId']." OR DesigId=".$resE['DesigId2'], $con); $resDe=mysql_fetch_assoc($sqlDe);
	  $Position=$resDe['DesigCode'];  ?> 
  <td class="font1" style="width:300px;" align=""><?php echo $Name; ?></td>  
  <td class="font1" style="width:200px;" align=""><?php echo $Position; ?></td>
  <td class="font1" style="width:50px;" align="center">
   <a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="DelRev(<?php echo $resRev['ReviewerId'].','.$dept; ?>)"></a>
  </td>  
 </tr>
<?php $no++; } ?>
</table>
     
<?php } ?>
