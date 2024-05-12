<?php
require_once('config/config.php');
if(isset($_POST['Gradeid']) && $_POST['Gradeid']!=""){
	$Gradeid = $_POST['Gradeid'];
	$sqlGrade = mysql_query("SELECT * FROM hrm_grade WHERE GradeId=".$Gradeid, $con) or die(mysql_error()); $resGrade = mysql_fetch_assoc($sqlGrade); ?>
	 <input name="GradeName" id="GradeName" style="font-size:11px; width:150px; height:18px;" value="<?php echo $resGrade['GradeValue']; ?>"/>
	 <input type="hidden" name="GradeId" id="GradeId" value="<?php echo $Gradeid; ?>"/>
 <?php } ?>
