<?php
require_once('config/config.php');
if(isset($_POST['checkv']) AND $_POST['v2']!="") { $v2=$_POST['v2']; $ComId=$_POST['CId']; ?>
<select name="SelEName" id="SelEName" style="width:250px;font-size:13px;" size="15" onChange="GetEmp(this.value)">
<?php $sqlE=mysql_query("SELECT EmployeeID,EmpCode,Fname,Sname,Lname FROM hrm_employee WHERE EmpStatus='A' AND (CompanyId=".$ComId." AND EmpCode LIKE '".$v2."%') OR (CompanyId=".$ComId." AND Fname LIKE '".$v2."%') LIMIT 15", $con);  
while($resE=mysql_fetch_array($sqlE)){ $Ename=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?>	
<option value="<?php echo $resE['EmployeeID']; ?>"><?php echo $resE['EmpCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$M.' '.$Ename; ?></option>
<?php } ?></select>
<?php } ?>

<?php if(isset($_POST['checkemp']) AND $_POST['EId']!="") { $EId=$_POST['EId']; $ComId=$_POST['CId']; 
$SqlEmp = mysql_query("SELECT EmpCode,Fname,Sname,Lname,DepartmentId,MobileNo_Vnr,MobileNo from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$EId, $con); $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
$sDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResEmp['DepartmentId'], $con); $rDept=mysql_fetch_assoc($sDept); ?>

<input type="hidden" id="AEI" value="<?php echo $EId; ?>" /><input type="hidden" id="AEC" value="<?php echo $EC; ?>" />
<input type="hidden" id="AEN" value="<?php echo $Ename; ?>" /><input type="hidden" id="AEDI" value="<?php echo $ResEmp['DepartmentId']; ?>" />
<input type="hidden" id="AEDC" value="<?php echo $rDept['DepartmentCode']; ?>" />
<input type="hidden" id="AEMN" value="<?php if($ResEmp['MobileNo_Vnr']>0){echo $ResEmp['MobileNo_Vnr'];}else{echo $ResEmp['MobileNo'];} ?>" />
<?php } ?>