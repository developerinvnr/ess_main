<?php require_once('../AdminUser/config/config.php');
if(isset($_POST['FromD']) && $_POST['FromD']!=""){
$sql = mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$_POST['EmpId']." AND AttValue='HO' AND AttDate>='".date("Y-m-d",strtotime($_POST['FromD']))."' AND AttDate<='".date("Y-m-d",strtotime($_POST['ToD']))."'", $con) or die(mysql_error()); $row = mysql_num_rows($sql); ?>
<input type="hidden" name="TotCheckHoliD" id="TotCheckHoliD" style="font-size:11px; width:220px; height:18px;" value="<?php echo $row; ?>"/>  
<?php } ?>
