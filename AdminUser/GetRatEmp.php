<?php require_once('config/config.php');
if(isset($_POST['ID']) && $_POST['ID']!=""){ 
$sql=mysql_query("update hrm_employee_pms set Dummy_EmpRating=".$_POST['E'].", Dummy_AppRating=".$_POST['A'].", Dummy_RevRating=".$_POST['R'].", Dummy_HodRating=".$_POST['H']." where EmpPmsId=".$_POST['ID'], $con); ?>
<input type="hidden" id="rno" value="<?php echo $_POST['N']; ?>"/>
<?php } ?>

