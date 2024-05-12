<?php
require_once('config/config.php');
if(isset($_POST['v']) && $_POST['v']!="") { $ComId=$_POST['CId']; $v=$_POST['v']; ?>
<select name="SelectEmp" id="SelectEmp" style="width:548px; height:60px;font-size:13px;" size="50" onChange="GetEmp(this.value);GetD(this.value);GetG(this.value)">
<?php $sqlE=mysql_query("SELECT hrm_employee.*,DesigId,Married,DR,Gender FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE (hrm_employee.CompanyId=".$ComId." AND hrm_employee.EmpCode LIKE '".$v."%') OR (hrm_employee.CompanyId=".$ComId." AND hrm_employee.Fname LIKE '".$v."%') LIMIT 15", $con) or die(mysql_error()); 
while($resE=mysql_fetch_array($sqlE)) { $Ename=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'];  
if($resE['DR']=='Y'){$M='Dr.';}elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}
	  $sqlDe=mysql_query("select DesigName from hrm_designation where DesigId=".$resE['DesigId'], $con) or die(mysql_error()); $resDe=mysql_fetch_assoc($sqlDe); ?>	
<option value="<?php echo $resE['EmployeeID']; ?>"><?php echo $resE['EmpCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$M.' '.$Ename.'&nbsp;&nbsp;-&nbsp;&nbsp;('.$resDe['DesigName'].')'; ?></option>
<?php } ?>
</select>
<?php } ?>

