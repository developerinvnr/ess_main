<?php 
require_once('config/config.php');
//************************************************************Department Wise*********************************************************************
if(isset($_POST['DPid']) && $_POST['DPid']!=""){ $DPId = $_POST['DPid']; $CompanyId = $_POST['ComId']; $YId = $_POST['YId'];?>

<table border="1" cellpadding="1" cellspacing="1" style="margin-top:0px;" id="TableDept">
 <tr bgcolor="#7a6189">
    <td align="center" style="color:#FFFFFF;" class="All_40"></td><td align="center" style="color:#FFFFFF;" class="All_80"></td><td colspan="4" align="center" style="color:#FFFFFF;" class="All_400"><b>Name</b></td><td colspan="5" align="center" style="color:#FFFFFF;" class="All_400"><b>Status</b></td><td align="center" style="color:#FFFFFF;" class="All_50"></td></td><td align="center" style="color:#FFFFFF;" class="All_50"></td><td align="center" style="color:#FFFFFF;" class="All_50"></td>
 </tr>
<tr bgcolor="#7a6189">
    <td align="center" style="color:#FFFFFF;" class="All_40"><b>SNo.</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_60"><b>EmpCode</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_180"><b>Emp</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_180"><b>Appraiser</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_180"><b>Reviewer</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_180"><b>HOD</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_100"><b>Emp</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_100"><b>Appraiser</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_100"><b>Reviewer</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_100"><b>HOD</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_100"><b>HR</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_50"><b>Score</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_50"><b>Rating</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_50"><b>Edit</b></td>	
 </tr>
<?php if($DPId=='All') { $sql = mysql_query("SELECT hrm_employee.*, hrm_employee_general.*, hrm_employee_personal.*, hrm_employee_pms.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YId." AND hrm_employee.CompanyId=".$CompanyId, $con); }
      else { $sql = mysql_query("SELECT hrm_employee.*, hrm_employee_general.*, hrm_employee_personal.*, hrm_employee_pms.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YId." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$DPId, $con); }
$no=1; while($res = mysql_fetch_array($sql)) { ?>

<tr bgcolor="#FFFFFF">
    <td align="center" style="" class="All_40"><?php echo $no; ?></td>
    <td align="center" style="" class="All_60">
	<a href="javascript:OpenWindow(<?php echo $res['EmployeeID'].','.$res['EmpPmsId']; ?>)"><?php echo $res['EmpCode']; ?></a></td>
    <td align="" style="" class="All_180"><a href="javascript:OpenWindow(<?php echo $res['EmployeeID'].','.$res['EmpPmsId']; ?>)">
    &nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></a></td>
<?php $sqlA = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'], $con); $resA=mysql_fetch_assoc($sqlA);?>    
    <td align="" style="" class="All_180">&nbsp;<?php echo $resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname']; ?></td>
<?php $sqlR = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'], $con); $resR=mysql_fetch_assoc($sqlR);?>  
    <td align="" style="" class="All_180">&nbsp;<?php echo $resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname']; ?></td>
	<?php $sqlH = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['HOD_EmployeeID'], $con); $resH=mysql_fetch_assoc($sqlH);?>  
    <td align="" style="" class="All_180">&nbsp;<?php echo $resH['Fname'].' '.$resH['Sname'].' '.$resH['Lname']; ?></td>
    <td align="center" style="color:<?php if($res['Emp_PmsStatus']==0){echo '#A40000';}if($res['Emp_PmsStatus']==1){echo '#36006C';} if($res['Emp_PmsStatus']==2){echo '#005300';} ?>;" class="All_100"><?php if($res['Emp_PmsStatus']==0){echo 'Draft';}if($res['Emp_PmsStatus']==1){echo 'Pending';} if($res['Emp_PmsStatus']==2){echo 'Submited';}?></td>
    <td align="center" style="color:<?php if($res['Appraiser_PmsStatus']==0){echo '#A40000';}if($res['Appraiser_PmsStatus']==1){echo '#36006C';} if($res['Appraiser_PmsStatus']==2){echo '#005300';}if($res['Appraiser_PmsStatus']==3){echo '#006AD5';} ?>;" class="All_100"><?php if($res['Appraiser_PmsStatus']==0){echo 'Draft';}if($res['Appraiser_PmsStatus']==1){echo 'Pending';} if($res['Appraiser_PmsStatus']==2){echo 'Approved';}if($res['Appraiser_PmsStatus']==3){echo 'Resend Employee';}?></td>
       <td align="center" style="color:<?php if($res['Reviewer_PmsStatus']==0){echo '#A40000';}if($res['Reviewer_PmsStatus']==1){echo '#36006C';}if($res['Reviewer_PmsStatus']==2){echo '#005300';}if($res['Reviewer_PmsStatus']==3){echo '#006AD5';} ?>;" class="All_100"><?php if($res['Reviewer_PmsStatus']==0){echo 'Draft';}if($res['Reviewer_PmsStatus']==1){echo 'Pending';} if($res['Reviewer_PmsStatus']==2){echo 'Approved';}if($res['Reviewer_PmsStatus']==3){echo 'Resend Appraiser';}?></td>       
        <td align="center" style="color:<?php if($res['HodSubmit_IncStatus']==0){echo '#A40000';}if($res['HodSubmit_IncStatus']==1){echo '#36006C';}if($res['HodSubmit_IncStatus']==2){echo '#005300';}?>;" class="All_100"><?php if($res['HodSubmit_IncStatus']==0){echo 'Draft';}if($res['HodSubmit_IncStatus']==1){echo 'Pending';}if($res['HodSubmit_IncStatus']==2){echo 'Approved';}?></td>
    
     <td align="center" style="color:<?php if($res['HR_PmsStatus']==0){echo '#A40000';}if($res['HR_PmsStatus']==1){echo '#36006C';} if($res['HR_PmsStatus']==2){echo '#005300';} ?>;" class="All_100"><?php if($res['HR_PmsStatus']==0){echo 'Draft';}if($res['HR_PmsStatus']==1){echo 'Pending';} if($res['HR_PmsStatus']==2){echo 'Approved';}?></td>
    <td align="center" style="" class="All_50"><?php echo $res['Hod_TotalFinalScore']; ?></td>
	<td align="center" style="" class="All_50"><?php echo $res['Hod_TotalFinalRating']; ?></td>
    <td align="center" style="" class="All_50">
    <?php if($res['HodSubmit_IncStatus']==2) { ?><img src="images/edit.png" border="0" onClick="Edit(<?php echo $res['EmpPmsId'].','.$res['EmployeeID'].','.$YId.','.$CompanyId; ?>)" /><?php } ?>
    </td>	
 </tr>
<?php $no++;} ?> 
</table> 	 
<?php } 
//************************************************************Head Quater Wise*********************************************************************
if(isset($_POST['HQid']) && $_POST['HQid']!=""){ $HQid = $_POST['HQid']; $CompanyId = $_POST['CompanyId']; $DPId = $_POST['DeptId']; $YId = $_POST['YearId']; ?>

<table border="1" cellpadding="1" cellspacing="1" style="margin-top:0px;" id="TableHQ">
 <tr bgcolor="#7a6189">
    <td align="center" style="color:#FFFFFF;" class="All_40"></td><td align="center" style="color:#FFFFFF;" class="All_80"></td><td colspan="4" align="center" style="color:#FFFFFF;" class="All_400"><b>Name</b></td><td colspan="5" align="center" style="color:#FFFFFF;" class="All_400"><b>Status</b></td><td align="center" style="color:#FFFFFF;" class="All_50"></td></td><td align="center" style="color:#FFFFFF;" class="All_50"></td><td align="center" style="color:#FFFFFF;" class="All_50"></td>
 </tr>
<tr bgcolor="#7a6189">
    <td align="center" style="color:#FFFFFF;" class="All_40"><b>SNo.</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_60"><b>EmpCode</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_180"><b>Emp</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_180"><b>Appraiser</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_180"><b>Reviewer</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_180"><b>HOD</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_100"><b>Emp</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_100"><b>Appraiser</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_100"><b>Reviewer</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_100"><b>HOD</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_100"><b>HR</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_50"><b>Score</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_50"><b>Rating</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_50"><b>Edit</b></td>	
 </tr>
<?php if($DPId=='All'){$sql = mysql_query("SELECT hrm_employee.*, hrm_employee_general.*, hrm_employee_personal.*, hrm_employee_pms.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YId." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.HqId=".$HQid, $con); }
      else { $sql = mysql_query("SELECT hrm_employee.*, hrm_employee_general.*, hrm_employee_personal.*, hrm_employee_pms.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YId." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$DPId." AND hrm_employee_general.HqId=".$HQid, $con);  }
$no=1; while($res = mysql_fetch_assoc($sql)) { ?>

<tr bgcolor="#FFFFFF">
    <td align="center" style="" class="All_40"><?php echo $no; ?></td>
    <td align="center" style="" class="All_60">
	<a href="javascript:OpenWindow(<?php echo $res['EmployeeID'].','.$res['EmpPmsId']; ?>)"><?php echo $res['EmpCode']; ?></a></td>
    <td align="" style="" class="All_180"><a href="javascript:OpenWindow(<?php echo $res['EmployeeID'].','.$res['EmpPmsId']; ?>)">
    &nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></a></td>
<?php $sqlA = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'], $con); $resA=mysql_fetch_assoc($sqlA);?>    
    <td align="" style="" class="All_180">&nbsp;<?php echo $resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname']; ?></td>
<?php $sqlR = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'], $con); $resR=mysql_fetch_assoc($sqlR);?>   
    <td align="" style="" class="All_180">&nbsp;<?php echo $resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname']; ?></td>
	<?php $sqlH = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['HOD_EmployeeID'], $con); $resH=mysql_fetch_assoc($sqlH);?>  
    <td align="" style="" class="All_180">&nbsp;<?php echo $resH['Fname'].' '.$resH['Sname'].' '.$resH['Lname']; ?></td>
    <td align="center" style="color:<?php if($res['Emp_PmsStatus']==0){echo '#A40000';}if($res['Emp_PmsStatus']==1){echo '#36006C';} if($res['Emp_PmsStatus']==2){echo '#005300';} ?>;" class="All_100"><?php if($res['Emp_PmsStatus']==0){echo 'Draft';}if($res['Emp_PmsStatus']==1){echo 'Pending';} if($res['Emp_PmsStatus']==2){echo 'Submited';}?></td>
    <td align="center" style="color:<?php if($res['Appraiser_PmsStatus']==0){echo '#A40000';}if($res['Appraiser_PmsStatus']==1){echo '#36006C';} if($res['Appraiser_PmsStatus']==2){echo '#005300';}if($res['Appraiser_PmsStatus']==3){echo '#006AD5';} ?>;" class="All_100"><?php if($res['Appraiser_PmsStatus']==0){echo 'Draft';}if($res['Appraiser_PmsStatus']==1){echo 'Pending';} if($res['Appraiser_PmsStatus']==2){echo 'Approved';}if($res['Appraiser_PmsStatus']==3){echo 'Resend Employee';}?></td>
   <td align="center" style="color:<?php if($res['Reviewer_PmsStatus']==0){echo '#A40000';}if($res['Reviewer_PmsStatus']==1){echo '#36006C';} if($res['Reviewer_PmsStatus']==2){echo '#005300';}if($res['Reviewer_PmsStatus']==3){echo '#006AD5';} ?>;" class="All_100"><?php if($res['Reviewer_PmsStatus']==0){echo 'Draft';}if($res['Reviewer_PmsStatus']==1){echo 'Pending';}if($res['Reviewer_PmsStatus']==2){echo 'Approved';}if($res['Reviewer_PmsStatus']==3){echo 'Resend Appraiser';}?></td>
   
   <td align="center" style="color:<?php if($res['HodSubmit_IncStatus']==0){echo '#A40000';}if($res['HodSubmit_IncStatus']==1){echo '#36006C';}if($res['HodSubmit_IncStatus']==2){echo '#005300';}?>;" class="All_100"><?php if($res['HodSubmit_IncStatus']==0){echo 'Draft';}if($res['HodSubmit_IncStatus']==1){echo 'Pending';}if($res['HodSubmit_IncStatus']==2){echo 'Approved';}?></td>
    
     <td align="center" style="color:<?php if($res['HR_PmsStatus']==0){echo '#A40000';}if($res['HR_PmsStatus']==1){echo '#36006C';} if($res['HR_PmsStatus']==2){echo '#005300';} ?>;" class="All_100"><?php if($res['HR_PmsStatus']==0){echo 'Draft';}if($res['HR_PmsStatus']==1){echo 'Pending';} if($res['HR_PmsStatus']==2){echo 'Approved';}?></td>
    <td align="center" style="" class="All_50"><?php echo $res['Hod_TotalFinalScore']; ?></td>
	<td align="center" style="" class="All_50"><?php echo $res['Hod_TotalFinalRating']; ?></td>
    <td align="center" style="" class="All_50">
    <?php if($res['HodSubmit_IncStatus']==2) { ?><img src="images/edit.png" border="0" onClick="Edit(<?php echo $res['EmpPmsId'].','.$res['EmployeeID'].','.$YId.','.$CompanyId; ?>)" />
    <?php } ?>
    </td>	
 </tr>
<?php $no++;} ?> 
</table> 	 
<?php } ?>