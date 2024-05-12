<?php session_start();
require_once('../AdminUser/config/config.php');
if(isset($_POST['HQid2']) && $_POST['HQid2']!=""){ 
$HQid = $_POST['HQid2']; $EmpId = $_POST['EmpId2']; $YId = $_POST['YId2'];?>

<?php $sqlSetH=mysql_query("select * from hrm_pms_setting where CompanyId=".$_POST['CI']." AND Process='PMS' ", $con);  
      $resSetH=mysql_fetch_array($sqlSetH); ?>

<table border="1" id="table11" cellpadding="0" cellspacing="0" style="width:100%;">
   <div id="thead">
   <thead>
    <tr bgcolor="#7a6189" style="height:25px;">
	 <td class="th" style="width:4%;"><b>Sn</b></td>
	 <td class="th" style="width:4%;"><b>EC</b></td>
	 <td class="th" style="width:25%;"><b>Name</b></td>
	 <td class="th" style="width:10%;"><b>Department</b></td>
	 <?php if($resSetH['Show_GradeDesig']=='Y'){ ?>
	 <td class="th" style="width:25%;"><b>Designation</b></td>
	 <?php } ?>
	 <?php /*<td class="th" style="width:10%;">HQ</td>
	 <td class="th" style="width:10%;">State</td>*/ ?>
	 <td class="th" style="width:4%;"><b>Form</b></td>
	 <td class="th" style="width:4%;"><b>Files</b></td>
	 <!--<td class="th" style="width:4%;"><b>KRA xls</b></td>-->
	 <td class="th" style="width:5%;"><b>Employee</b></td>
	 <td class="th" style="width:5%;"><b>Appraiser</b></td>
	 <td class="th" style="width:10%;"><b>Action</b></td>
    </tr>
   </thead>
   </div>
<?php if($HQid=='All'){ $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateName, EmpPmsId, Kra_filename, Kra_ext, Emp_PmsStatus, Appraiser_PmsStatus from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Appraiser_EmployeeID=".$EmpId, $con); }else{ $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateName, EmpPmsId, Kra_filename, Kra_ext, Emp_PmsStatus, Appraiser_PmsStatus from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND g.HqId=".$HQid." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Appraiser_EmployeeID=".$EmpId, $con); }

$sno=1; while($res=mysql_fetch_array($sql)){ 
if($res['Emp_PmsStatus']==0){$st='Draft';}elseif($res['Emp_PmsStatus']==1){$st='Pending';}elseif($res['Emp_PmsStatus']==2){$st='Submitted';} 
if($res['Appraiser_PmsStatus']==0){$stM='Draft';}elseif($res['Appraiser_PmsStatus']==1){$stM='Pending';}elseif($res['Appraiser_PmsStatus']==2){$stM='Approved';}elseif($res['Appraiser_PmsStatus']==3){$stM='Resent';}
$sqlR=mysql_query("select * from hrm_employee_pms_uploadfile where EmpPmsId=".$res['EmpPmsId']." AND EmployeeID=".$res['EmployeeID']." AND YearId=".$_SESSION['PmsYId'], $con); $no=1; $resR=mysql_num_rows($sqlR);
?>   <div id="tbody">
     <tbody>
     <tr style="height:22px;background-color:#FFFFFF;">
	  <td class="tdc"><?php echo $sno; ?></td>
	  <td class="tdc"><?php echo $res['EmpCode']; ?></td>
	  <td class="tdl">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
      <td class="tdl">&nbsp;<?php echo $res['DepartmentCode'];?></td>
      <?php if($resSetH['Show_GradeDesig']=='Y'){ ?>
	  <td class="tdl">&nbsp;<?php echo $res['DesigName'];?></td>
	  <?php } ?>
	  <?php /*<td class="tdl">&nbsp;<?php echo $res['HqName'];?></td>				
	  <td class="tdl">&nbsp;<?php echo $res['StateName'];?></td>*/ ?>
	  
	  <td class="tdc"><?php if($res['Emp_PmsStatus']==2){ ?><a href="javascript:OpenWindow(<?php echo $res['EmpPmsId'].','.$CompanyId; ?>)">Click</a><?php }else{ echo 'Wait'; }?></td>
	  <td class="tdc"><?php if($resR>0){ ?><a href="#" onClick="UploadEmpfile(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>)">Yes</a><?php }if($resR==0){echo 'No'; }?></td>
	  <?php /*?><td class="tdc"><?php if($res['Kra_filename']!='' AND $res['Kra_ext']!=''){ ?><a href="#" onClick="UploadEmpKrafile(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>,'<?php echo $res['Kra_filename']; ?>','<?php echo $res['Kra_ext']; ?>')">Yes</a><?php }?></td><?php */?>
      <td class="tdc" style="color:<?php if($st=='Draft'){echo '#A40000'; }if($st=='Pending') {echo '#36006C'; }if($st=='submitted') {echo '#005300'; }?>;" ><?php echo $st;?></td>
	  <td class="tdc" style="color:<?php if($stM=='Draft'){echo '#A40000'; }if($stM=='Pending'){echo '#36006C'; }if($stM=='Approved'){echo '#005300'; }if($stM=='Resent'){echo '#006AD5'; }?>;"><?php echo $stM;?></td>
	  <td class="tdc"><?php if($res['Emp_PmsStatus']==2 AND $res['Appraiser_PmsStatus']!=2) {?><select class="tdsel" onChange="edit(this.value,<?php echo $res['EmployeeID'].','.$_SESSION['PmsYId']; ?>)"><option value="0">Select</option><option value="1">Edit</option><option value="2">Resend Form</option></select><?php } ?></td>
	 </tr>
	 </tbody>
	 </div>
<?php $sno++;} ?>		
 </table>

<?php } ?>
