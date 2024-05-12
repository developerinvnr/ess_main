<?php
require_once('config/config.php');
if(isset($_POST['id']) && $_POST['id']!=""){ $id = $_POST['id'];  $CompanyId = $_POST['Cid']; $DeptId = $_POST['DeptId'];?>
<table>
   <tr><td style="font-size:11px; height:18px;">Department :</td>
       <td><select style="font-size:11px; width:220px; height:18px; background-color:#DDFFBB;" name="DeptName1" id="DeptName1" onChange="DGD_Dept(this.value)" disabled>
<?php $SqlDept=mysql_query("select DepartmentCode,DepartmentName from hrm_department where CompanyId=".$CompanyId." AND DepartmentId=".$DeptId, $con); 
      $ResDept=mysql_fetch_array($SqlDept); ?>	   					 
	       <option style="background-color:#DBD3E2;" value="<?php echo $DeptId; ?>">&nbsp;<?php echo $ResDept['DepartmentCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;'.$ResDept['DepartmentName']; ?></option>
<?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentId ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
	       <option value="<?php echo $ResDept['DepartmentId']; ?>">&nbsp;<?php echo $ResDept['DepartmentCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;'.$ResDept['DepartmentName']; ?></option><?php } ?></select></td></tr>
  
   <tr><td style="font-size:11px; height:18px;">Designation :</td>
       <td>   
	   <select style="font-size:11px; width:220px; height:18px; background-color:#DDFFBB;" name="DesigName1" id="DesigName1" onChange="">
<?php $S=mysql_query("select DesigName,DesigCode,hrm_deptgradedesig.* from hrm_deptgradedesig INNER JOIN hrm_designation ON hrm_deptgradedesig.DesigId=hrm_designation.DesigId where hrm_deptgradedesig.DeptGradeDesigId=".$id, $con); $R=mysql_fetch_assoc($S); ?>	   
	   
	       <option style="background-color:#DBD3E2;" value="<?php echo $R['DesigId']; ?>">&nbsp;<?php echo $R['DesigCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;'.$R['DesigName']; ?></option>		 <?php $SqlDesig=mysql_query("select * from hrm_designation where CompanyId=".$CompanyId." order by DesigId ASC", $con); while($ResDesig=mysql_fetch_array($SqlDesig)) { ?>
	       <option value="<?php echo $ResDesig['DesigId']; ?>">&nbsp;<?php echo $ResDesig['DesigCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;'.$ResDesig['DesigName']; ?></option><?php } ?>
	       </select><input type="hidden" name="DeptGradeDesigId" id="DeptGradeDesigId" value="<?php echo $R['DeptGradeDesigId']; ?>"</td></tr>		 
</table>
<?php } ?>			

