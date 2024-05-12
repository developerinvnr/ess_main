<?php
require_once('config/config.php');
if(isset($_POST['Did']) && $_POST['Did']!=""){
	  $Did = $_POST['Did']; $_SESSION['DeptId'] = $_POST['Did']; 
	  $sqlDGD = mysql_query("select hrm_deptgradedesig.DeptGradeDesigId,hrm_designation.* from hrm_deptgradedesig INNER JOIN hrm_designation ON hrm_deptgradedesig.DesigId=hrm_designation.DesigId WHERE DGDStatus='A' AND hrm_deptgradedesig.DepartmentId=".$Did." GROUP BY DesigId", $con) or die(mysql_error());  ?>
	  <select style="width:250px; background-color:#F1EDF8;" size="8" name="DGD_Desig" id="DGD_Desig" onChange="ClickDesig(this.value)">
	  <?php while($resDGD = mysql_fetch_array($sqlDGD))  { ?>
	  <option value="<?php echo $resDGD['DeptGradeDesigId']; ?>"><?php echo $resDGD['DesigCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$resDGD['DesigName']; ?></option><?php } ?>
      </select> <input type="hidden" name="DeptID" id="DeptID" value="<?php echo $Did; ?>" /> 
<?php } ?>
