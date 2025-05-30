<?php
require_once('config/config.php');
if(isset($_POST['Deptid']) && $_POST['Deptid']!=""){ $Deptid=$_POST['Deptid'];?>

      <select class="All_120" name="DesigName" id="DesigName">
	  <option style="background-color:#DBD3E2; " value="0">Select</option>
<?php $sql = mysql_query("select de.id,designation_name as value from core_designation de left join core_designation_department_mapping dde on de.id=dde.designation_id where dde.department_id=".$Deptid." group by de.designation_name order by de.designation_name", $con) or die(mysql_error()); 
      while($res = mysql_fetch_array($sql))
	   { //$sql1 = mysql_query("select * from hrm_designation WHERE DesigId=".$res['DesigId'], $con) or die(mysql_error()); 
	     //$res1 = mysql_fetch_array($sql1);
	     ?>
	  <option value="<?php echo $res['id']; ?>"><?php echo $res['value']; ?></option><?php } ?>
      </select> <input type="hidden" name="DeptId" id="DeptId" value="<?php echo $Did; ?>" />
	  
<?php } ?>