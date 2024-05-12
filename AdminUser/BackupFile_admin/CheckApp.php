<?php
require_once('config/config.php');
if(isset($_POST['v2']) && $_POST['v2']!="") { $dpid=$_POST['dpid']; $ComId=$_POST['CId']; $v2=$_POST['v2']; ?>
<select name="SelectRev" id="SelectRev" style="width:490px; height:100px;font-size:13px;" size="50" onChange="GetApp(this.value,<?php echo $dpid; ?>)">
<?php $sqlE=mysql_query("SELECT hrm_employee.*,DesigId FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID WHERE (CompanyId=".$ComId." AND EmpCode LIKE '".$v2."%') OR (CompanyId=".$ComId." AND Fname LIKE '".$v2."%') LIMIT 15", $con) or die(mysql_error());  
while($resE=mysql_fetch_array($sqlE)) { $Ename=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'];  
if($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}
	  $sqlDe=mysql_query("select DesigName from hrm_designation where DesigId=".$resE['DesigId'], $con) or die(mysql_error()); $resDe=mysql_fetch_assoc($sqlDe); ?>	
<option value="<?php echo $resE['EmployeeID']; ?>"><?php echo $resE['EmpCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$M.' '.$Ename.'&nbsp;&nbsp;-&nbsp;&nbsp;('.$resDe['DesigName'].')'; ?></option>
<?php } ?>
</select>
<?php } ?>


