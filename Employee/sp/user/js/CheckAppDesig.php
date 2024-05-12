<?php
require_once('config/config.php');
if(isset($_POST['dpid']) && $_POST['dpid']!="")
{ $dpid=$_POST['dpid']; $deid=$_POST['deid']; 
  $sql=mysql_db_query(DATABASE1,"delete from hrm_pms_appdesig where DepartmentId=".$dpid." AND DesigId=".$deid); ?>

     <select style="font-size:12px; font-family:Georgia; height:20px; width:300px;background-color:#D8FFB0; color:#004F9D;" id="SelectRev" onChange="GetApp(this.value,<?php echo $dpid; ?>)">
	 <option style="" value="">Code----------------Name----------------(Designation)</option>
	 <option style="text-align:center;background-color:#FFFFFF;" value="0"></option>
<?php $sqlE=mysql_db_query(DATABASE1,"select hrm_employee_general.*,hrm_employee_personal.*,hrm_employee.* from hrm_pms_appdesig INNER JOIN hrm_employee_general ON (hrm_pms_appdesig.DesigId=hrm_employee_general.DesigId OR hrm_pms_appdesig.DesigId=hrm_employee_general.DesigId2) INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_pms_appdesig.DepartmentId=".$dpid);
      while($resE=mysql_fetch_array($sqlE)) { $Ename=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
	  if($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}
	  $sqlD=mysql_db_query(DATABASE1,"select DesigName from hrm_designation where DesigId=".$resE['DesigId']." OR DesigId=".$resE['DesigId2']); $resD=mysql_fetch_assoc($sqlD); ?>	 
	 <option style="background-color:#FFFFFF;" value="<?php echo $resE['EmployeeID']; ?>"><?php echo $resE['EmpCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$M.' '.$Ename.'&nbsp;&nbsp;-&nbsp;&nbsp;('.$resD['DesigName'].')'; ?></option><?php } ?>
	 </select>	

<?php } 
elseif(isset($_POST['dpid2']) && $_POST['dpid2']!="")
{ 
  $dpid2=$_POST['dpid2']; $deid2=$_POST['deid2']; $YId=$_POST['YId']; $UId=$_POST['UId']; $CId=$_POST['CId'];
  $sqlCheck=mysql_db_query(DATABASE1,"select * from hrm_pms_appdesig where DepartmentId=".$dpid2." AND DesigId=".$deid2);  $row=mysql_num_rows($sqlCheck);
  if($row==0)
  { $sqlMax = mysql_db_query(DATABASE1,"SELECT MAX(AppDesigId) as AppDesigId FROM hrm_pms_appdesig"); $resMax = mysql_fetch_assoc($sqlMax);
	$AppDesigId = $resMax['AppDesigId']+1;
    $sql2=mysql_db_query(DATABASE1,"insert into hrm_pms_appdesig(AppDesigId,YearId,DepartmentId,DesigId,CompanyId,CreatedBy,CreatedDate) values(".$AppDesigId.",".$YId.",".$dpid2.",".$deid2.",".$CId.",".$UId.",'".date("Y-m-d")."')"); } ?>

     <select style="font-size:12px; font-family:Georgia; height:20px; width:300px;background-color:#D8FFB0; color:#004F9D;" id="SelectRev" onChange="GetApp(this.value,<?php echo $dpid2; ?>)">
	 <option style="" value="">Code----------------Name----------------(Designation)</option>
	 <option style="text-align:center;background-color:#FFFFFF;" value="0"></option>
<?php $sqlE=mysql_db_query(DATABASE1,"select hrm_employee_general.*,hrm_employee_personal.*,hrm_employee.* from hrm_pms_appdesig INNER JOIN hrm_employee_general ON (hrm_pms_appdesig.DesigId=hrm_employee_general.DesigId OR hrm_pms_appdesig.DesigId=hrm_employee_general.DesigId2) INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_pms_appdesig.DepartmentId=".$dpid2);
      while($resE=mysql_fetch_array($sqlE)) { $Ename=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
	  if($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}
	  $sqlD=mysql_db_query(DATABASE1,"select DesigName from hrm_designation where DesigId=".$resE['DesigId']." OR DesigId=".$resE['DesigId2']); $resD=mysql_fetch_assoc($sqlD); ?>	 
	 <option style="background-color:#FFFFFF;" value="<?php echo $resE['EmployeeID']; ?>"><?php echo $resE['EmpCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$M.' '.$Ename.'&nbsp;&nbsp;-&nbsp;&nbsp;('.$resD['DesigName'].')'; ?></option><?php } ?>
	 </select>	

<?php } ?>
