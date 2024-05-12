<?php
require_once('config/config.php');
if(isset($_POST['id']) && $_POST['id']!=""){ $Did = $_POST['id']; $DeptId = $_POST['DeptId'];
	    
	  $sqlDGD = mysql_query("select hrm_designation.* from hrm_deptgradedesig INNER JOIN hrm_designation ON hrm_deptgradedesig.DesigId=hrm_designation.DesigId WHERE DGDStatus='A' AND hrm_deptgradedesig.DepartmentId=".$Did, $con) or die(mysql_error());  ?>
	  <select style="font-size:11px; width:150px; height:18px;background-color:#D8FFB0;" onChange="GetDesig(this.value,<?php echo $DeptId; ?>)" name="DesigName" id="DesigName">
	  <option style="" value="">&nbsp;Select</option>
	  <?php while($resDGD = mysql_fetch_array($sqlDGD))  { ?>
	  <option style="background-color:#FFFFFF;" value="<?php echo $resDGD['DesigId']; ?>"><?php echo $resDGD['DesigName']; ?></option><?php } ?>
      </select> 
<?php } ?>
