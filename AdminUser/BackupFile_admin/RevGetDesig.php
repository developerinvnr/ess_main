<?php
require_once('config/config.php');
if(isset($_POST['id']) && $_POST['id']!=""){ $id = $_POST['id']; $DeptId = $_POST['DeptId']; ?>

	  <select style="font-size:12px; font-family:Georgia; height:20px; width:300px;background-color:#D8FFB0; color:#004F9D;" id="SelectRev" onChange="GetRev(this.value,<?php echo $DeptId; ?>,'E')">
	  <option style="" value="">Code--Name</option>
	  <option style="text-align:center;background-color:#FFFFFF;" value="0"></option>
<?php $sqlE=mysql_query("select hrm_employee.*,hrm_employee_personal.* from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where (hrm_employee_general.DesigId=".$id." OR hrm_employee_general.DesigId2=".$id.") AND hrm_employee.EmpStatus='A'", $con);
      while($resE=mysql_fetch_array($sqlE)) { $Ename=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
	  if($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';} ?>	 
	 <option style="background-color:#FFFFFF;" value="<?php echo $resE['EmployeeID']; ?>"><?php echo $resE['EmpCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$M.' '.$Ename; ?></option><?php } ?>
	 </select>
<?php } ?>
