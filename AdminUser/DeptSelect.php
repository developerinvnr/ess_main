<?php
require_once('config/config.php');
if(isset($_POST['Deptid']) && $_POST['Deptid']!=""){ $Deptid=$_POST['Deptid'];?>

      <select class="All_120" name="DesigName" id="DesigName">
	  <option style="background-color:#DBD3E2; " value="0">Select</option>
<?php $sql = mysql_query("select ddg.DesigId,de.DesigCode,de.DesigName from hrm_deptgradedesig ddg inner join hrm_designation de on ddg.DesigId=de.DesigId WHERE ddg.DGDStatus='A' AND ddg.DepartmentId=".$Deptid." AND ddg.DesigId!=69 GROUP BY ddg.DesigId", $con) or die(mysql_error()); 
      while($res = mysql_fetch_array($sql))
	   { //$sql1 = mysql_query("select * from hrm_designation WHERE DesigId=".$res['DesigId'], $con) or die(mysql_error()); 
	     //$res1 = mysql_fetch_array($sql1);
	     ?>
	  <option value="<?php echo $res['DesigId']; ?>"><?php echo $res['DesigCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$res['DesigName'];; ?></option><?php } ?>
      </select> <input type="hidden" name="DeptId" id="DeptId" value="<?php echo $Did; ?>" />
	  
<?php } ?>