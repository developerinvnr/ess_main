<?php
require_once('config/config.php');
if(isset($_POST['Deptid']) && $_POST['Deptid']!=""){ $Deptid=$_POST['Deptid'];?>

      <select class="All_250" name="DesigName" id="DesigName" onChange="SelectDisig()">
	  <option style="background-color:#DBD3E2; " value="0">Select</option>
<?php $sql = mysql_query("select * from hrm_deptgradedesig WHERE DGDStatus='A' AND DepartmentId=".$Deptid." GROUP BY DesigId", $con) or die(mysql_error()); 
      while($res = mysql_fetch_array($sql))
	   { $sql1 = mysql_query("select * from hrm_designation WHERE DesigId=".$res['DesigId'], $con) or die(mysql_error()); 
	     $res1 = mysql_fetch_array($sql1);?>
	  <option value="<?php echo $res1['DesigId']; ?>"><?php echo $res1['DesigCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$res1['DesigName'];; ?></option><?php } ?>
      </select> <input type="hidden" name="DeptId" id="DeptId" value="<?php echo $Did; ?>" />
	  
<?php } 

if(isset($_POST['Act']) && $_POST['Act']=='Seldept'){ ?>
      <input type="hidden" name="DeptId" id="DeptId" value="<?php echo $_POST['did']; ?>" /> <input type="hidden" name="SnId" id="SnId" value="<?php echo $_POST['Sn']; ?>" /> 
      <select name="NewDesig_<?php echo $_POST['Sn']; ?>" id="NewDesig_<?php echo $_POST['Sn']; ?>" onChange="SelDesig(this.value,<?php echo $_POST['Sn']; ?>)" style="width:248px;font-family:Times New Roman;">
<?php $sql = mysql_query("select DesigId from hrm_deptgradedesig WHERE DGDStatus='A' AND DepartmentId=".$_POST['did']." GROUP BY DesigId", $con) or die(mysql_error()); 
      while($res = mysql_fetch_array($sql))
	   { $sql1 = mysql_query("select DesigName from hrm_designation WHERE DesigId=".$res['DesigId'], $con) or die(mysql_error()); 
	     $res1 = mysql_fetch_array($sql1);?>
	  <option value="<?php echo $res['DesigId']; ?>"><?php echo strtoupper($res1['DesigName']); ?></option><?php } ?>
      </select> 
<?php } ?>