<?php require_once('../AdminUser/config/config.php');
if(isset($_POST['Action']) && $_POST['Action']=='CheckDate'){
$sql = mysql_query("select HoOpDate from hrm_holiday_optional where HoOpId=".$_POST['v'], $con); $res = mysql_fetch_assoc($sql); ?>
<input type="hidden" name="OpHoDate" id="OpHoDate" value="<?php echo date("d-m-Y",strtotime($res['HoOpDate'])); ?>" />
<?php } ?>
