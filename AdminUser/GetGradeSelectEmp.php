<?php 
require_once('config/config.php');
if(isset($_POST['grade']) && $_POST['grade']!=""){ 
$sql=mysql_query("select hrm_grade.GradeId,GradeValue,DepartmentId from hrm_employee_confletter INNER JOIN hrm_grade ON hrm_employee_confletter.GradeId=hrm_grade.GradeId INNER JOIN hrm_employee_general ON hrm_employee_confletter.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_confletter.EmployeeID=".$_POST['v']." AND hrm_employee_confletter.Status='A'", $con); $res=mysql_fetch_assoc($sql); $NextG=$res['GradeValue']+1; $NextG2=$res['GradeValue']+2; $NextG3=$res['GradeValue']+3;
$sqlC=mysql_query("select GradeId from hrm_grade where GradeValue=".$NextG." AND CompanyId=".$_POST['c'], $con); $resC=mysql_fetch_assoc($sqlC);
$sqlC2=mysql_query("select GradeId from hrm_grade where GradeValue=".$NextG2." AND CompanyId=".$_POST['c'], $con); $resC2=mysql_fetch_assoc($sqlC2);
$sqlC3=mysql_query("select GradeId from hrm_grade where GradeValue=".$NextG3." AND CompanyId=".$_POST['c'], $con); $resC3=mysql_fetch_assoc($sqlC3);
?>
<select style="width:50px;" id="NewGrade" disabled>
<option value="<?php echo $res['GradeId']; ?>"><?php echo $res['GradeValue']; ?></option>
<option value="<?php echo $resC['GradeId']; ?>"><?php echo $NextG; ?></option>
<?php if($NextG2<=14){?><option value="<?php echo $resC2['GradeId']; ?>"><?php echo $NextG2; ?></option><?php } ?>
<?php if($NextG3<=14){?><option value="<?php echo $resC3['GradeId']; ?>"><?php echo $NextG3; ?></option><?php } ?>
</select>
<?php } ?>