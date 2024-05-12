<?php require_once('config/config.php'); 
if(isset($_POST['id']) && $_POST['id']!=""){ 
$sqlCS = mysql_query("SELECT * FROM hrm_deptquerysub where DepartmentId=".$_POST['id']." order by DeptQSubject ASC", $con) or die(mysql_error());  ?>
<select style="width:200px; background-color:#F1EDF8;" name="QSubSelect" id="QSubSelect" size="8" onChange="SelectQSub(this.value)">
<?php while($resCS = mysql_fetch_array($sqlCS)){ ?><option value="<?php echo $resCS['DeptQSubId']; ?>">&nbsp;<?php echo $resCS['DeptQSubject']; ?></option><?php } ?></select>
<?php } ?>


<?php
if(isset($_POST['SQtid']) && $_POST['SQtid']!=""){ ?>
<?php $sqlSt = mysql_query("SELECT * FROM hrm_deptquerysub where DeptQSubId=".$_POST['SQtid'], $con) or die(mysql_error()); $resSt = mysql_fetch_array($sqlSt); 
$sqlD=mysql_query("SELECT DepartmentCode FROM hrm_department where DepartmentId=".$resSt['DepartmentId'], $con); $resD=mysql_fetch_array($sqlD); ?>
<input type="hidden" name="DI" id="DI" value="<?php echo $resSt['DepartmentId']; ?>"/><input type="hidden" name="DC" id="DC" value="<?php echo $resD['DepartmentCode']; ?>"/>
<input type="hidden" name="QSN" id="QSN" value="<?php echo $resSt['DeptQSubject']; ?>"/>
<input type="hidden" name="DeptQSubId" id="DeptQSubId" value="<?php echo $resSt['DeptQSubId']; ?>" />
<?php } ?>


<?php
if(isset($_POST['QSub']) && $_POST['QSub']!=""){ 
$sqlSt = mysql_query("insert into hrm_deptquerysub(DepartmentId,DeptQSubject) values(".$_POST['QDept'].",'".$_POST['QSub']."')", $con); 
$sqlCS = mysql_query("SELECT * FROM hrm_deptquerysub where DepartmentId=".$_POST['QDept']." order by DeptQSubject ASC", $con) or die(mysql_error()); ?>
 <select style="width:200px; background-color:#F1EDF8;" name="QSubSelect" id="QSubSelect" size="8" onChange="SelectQSub(this.value)">
<?php while($resCS = mysql_fetch_array($sqlCS)){ ?><option value="<?php echo $resCS['DeptQSubId']; ?>">&nbsp;<?php echo $resCS['DeptQSubject']; ?></option><?php } ?></select>      
<?php } ?>


<?php
if(isset($_POST['QSId']) && $_POST['QSId']!=""){  
$sqlSt = mysql_query("update hrm_deptquerysub set DeptQSubject='".$_POST['QQSub']."' where DeptQSubId=".$_POST['QSId'], $con); 
$sqlCS = mysql_query("SELECT * FROM hrm_deptquerysub where DepartmentId=".$_POST['QQDept']." order by DeptQSubject ASC", $con) or die(mysql_error()); ?>
 <select style="width:200px; background-color:#F1EDF8;" name="QSubSelect" id="QSubSelect" size="8" onChange="SelectQSub(this.value)">
<?php while($resCS = mysql_fetch_array($sqlCS)){ ?><option value="<?php echo $resCS['DeptQSubId']; ?>">&nbsp;<?php echo $resCS['DeptQSubject']; ?></option><?php } ?></select>      
<?php } ?>


<?php
if(isset($_POST['QDSNId']) && $_POST['QDSNId']!=""){  
$sqlSt = mysql_query("delete from hrm_deptquerysub where DeptQSubId=".$_POST['QDSNId'], $con); 
$sqlCS = mysql_query("SELECT * FROM hrm_deptquerysub where DepartmentId=".$_POST['QQQDept']." order by DeptQSubject ASC", $con) or die(mysql_error()); ?>
 <select style="width:200px; background-color:#F1EDF8;" name="QSubSelect" id="QSubSelect" size="8" onChange="SelectQSub(this.value)">
<?php while($resCS = mysql_fetch_array($sqlCS)){ ?><option value="<?php echo $resCS['DeptQSubId']; ?>">&nbsp;<?php echo $resCS['DeptQSubject']; ?></option><?php } ?></select>      
<?php } ?>