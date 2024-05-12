<?php 
require_once('../AdminUser/config/config.php');
if(isset($_POST['DeptQS']) && $_POST['DeptQS']!=""){ ?>
<select style="width:120px;font-family:Times New Roman;font-size:12px;" id="QuerySubj" name="QuerySubj" onChange="SelSubject(this.value)">
<option value="">&nbsp;SELECT</option>
<?php $sqlQS = mysql_query("SELECT * FROM hrm_deptquerysub where DepartmentId=".$_POST['DeptQS']." AND AssignEmpId!=0 AND AssignEmpId!='' AND Status='A' order by DeptQSubject ASC", $con) or die(mysql_error()); 
      while($resQS = mysql_fetch_array($sqlQS)){ ?><option value="<?php echo $resQS['DeptQSubId']; ?>">&nbsp;<?php echo strtoupper($resQS['DeptQSubject']); ?></option><?php } ?>
<option value="0">&nbsp;OTHER</option></select>
<?php } ?>
