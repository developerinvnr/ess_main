<?php 
require_once('config/config.php');
if(isset($_POST['desig']) && $_POST['desig']!=""){ 
$sql=mysql_query("select hrm_designation.DesigId,DesigName,DepartmentId,hrm_employee_confletter.GradeId from hrm_employee_confletter INNER JOIN hrm_designation ON hrm_employee_confletter.DesigId=hrm_designation.DesigId INNER JOIN hrm_employee_general ON hrm_employee_confletter.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_confletter.EmployeeID=".$_POST['v']." AND hrm_employee_confletter.Status='A'", $con); 
$res=mysql_fetch_assoc($sql); 
$sqlG = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$res['GradeId'], $con); $resG = mysql_fetch_assoc($sqlG);
$NextGrade=$resG['GradeValue']+1; $NextGrade2=$resG['GradeValue']+2; $NextGrade3=$resG['GradeValue']+3; $NextGrade4=$resG['GradeValue']+4;?>
<select style="width:200px;" id="NewDesig" disabled>
<option value="<?php echo $res['DesigId']; ?>"><?php echo $res['DesigName']; ?></option>
<?php $sqlDept = mysql_query("SELECT DesigId FROM hrm_deptgradedesig WHERE DepartmentId=".$res['DepartmentId']." AND (GradeId=".$NextGrade." OR GradeId=".$NextGrade2." OR GradeId=".$NextGrade3." OR GradeId=".$NextGrade4.") order by GradeId ASC", $con); 
      while($resDept = mysql_fetch_assoc($sqlDept)) { $sqlDesig2 = mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$resDept['DesigId'], $con); $resDesig2 = mysql_fetch_assoc($sqlDesig2); ?>
<option value="<?php echo $resDept['DesigId']; ?>"><?php echo $resDesig2['DesigName']; ?></option><?php } ?>	  
</select>
<?php } ?>