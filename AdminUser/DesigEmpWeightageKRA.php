<?php 
require_once('config/config.php');
if(isset($_POST['DPid']) && $_POST['DPid']!=""){
	$DPid = $_POST['DPid']; $ComId = $_POST['ComId']; ?>
	 <select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="DesignationE" id="DesignationE" onChange="SelectDesigEmp(this.value);SelectDesig(<?php echo $DPid; ?>)">   <option value="" style="margin-left:0px; background-color:#84D9D5;" selected>Select Designation</option><?php $SqlDesig=mysql_query("select hrm_designation.* from hrm_deptgradedesig INNER JOIN hrm_designation ON hrm_deptgradedesig.DesigId=hrm_designation.DesigId WHERE DGDStatus='A' AND hrm_deptgradedesig.DepartmentId=".$DPid." AND hrm_deptgradedesig.CompanyId=".$ComId." order by DesigName ASC", $con); while($ResDesig=mysql_fetch_array($SqlDesig)) { ?><option value="<?php echo $ResDesig['DesigId']; ?>"><?php echo $ResDesig['DesigName'];?></option><?php } ?></select>			
<?php } ?>	
