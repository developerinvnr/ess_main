<?php 

require_once('../AdminUser/config/config.php');

if(isset($_POST['StHQid']) && $_POST['StHQid']!=""){ $StHQid = $_POST['StHQid']; $EmpId = $_POST['EmpId']; $YI = $_POST['YI'];?>	 

<table border="">

		 <tr bgcolor="#7a6189" style="height:20px;" valign="middle">

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:30px;"><b>SN</b></td>

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>EC</b></td>

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:220px;"><b>Name</b></td>

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>Department</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:200px;"><b>Designation</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>HQ</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:120px;"><b>State</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:60px;"><b>Form</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:60px;"><b>Files</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:60px;"><b>Resent</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>Employee</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>Appraiser</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>Reviewer</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>HOD</b></td>

		 </tr>

<?php if($StHQid=='All') { $sql=mysql_query("select hrm_employee.*, EmpPmsId, DepartmentId,DesigId,DesigId2,HqId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YI." AND hrm_employee_pms.HOD_EmployeeID=".$EmpId, $con); }

    if($StHQid!='All') { $sql=mysql_query("select hrm_employee.*, EmpPmsId, hrm_employee_general.DepartmentId,hrm_employee_general.DesigId,hrm_employee_general.DesigId2,hrm_employee_general.HqId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_headquater ON hrm_employee_general.HqId=hrm_headquater.HqId where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YI." AND hrm_headquater.StateId=".$StHQid." AND hrm_employee_pms.HOD_EmployeeID=".$EmpId, $con); }



 $sno=1; while($res=mysql_fetch_array($sql)){ ?>     		

		<tr bgcolor="#FFFFFF" style="height:20px;" valign="middle">

	        <td align="center" style="font:Georgia; font-size:11px; width:30px;"><?php echo $sno; ?></td>

	        <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $res['EmpCode']; ?></td>

	        <td align="" style="font:Georgia; font-size:11px; width:250px;">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>

<?php $sql2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); 

      $res2=mysql_fetch_assoc($sql2);?><td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;<?php echo $res2['DepartmentCode'];?></td>

<?php $sql3=mysql_query("select DesigName from hrm_designation where DesigId=".$res['DesigId']." OR DesigId=".$res['DesigId2'], $con); 

      $res3=mysql_fetch_assoc($sql3);?>			

			<td align="" style="font:Georgia; font-size:11px; width:200px;">&nbsp;&nbsp;<?php echo $res3['DesigName'];?></td>

<?php $sql4=mysql_query("select HqName from hrm_headquater where HqId=".$res['HqId'], $con); 

      $res4=mysql_fetch_assoc($sql4);?>				

			<td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;&nbsp;<?php echo $res4['HqName'];?></td>

<?php $sql5=mysql_query("select StateName from hrm_state INNER JOIN hrm_headquater ON hrm_state.StateId=hrm_headquater.StateId where hrm_headquater.HqId=".$res['HqId'], $con); 

      $res5=mysql_fetch_assoc($sql5);?>					

			<td align="" style="font:Georgia; font-size:11px; width:150px;">&nbsp;<?php echo $res5['StateName'];?></td>

<?php $sqlSt=mysql_query("select Emp_PmsStatus,Appraiser_PmsStatus,Reviewer_PmsStatus,HodSubmit_IncStatus, Appraiser_NoOfResend, Reviewer_NoOfResend, Hod_NoOfResend from hrm_employee_pms where AssessmentYear=".$YI." AND EmployeeID=".$res['EmployeeID'], $con); $resSt=mysql_fetch_assoc($sqlSt);  if($resSt['Emp_PmsStatus']==0){$stE='Draft';} if($resSt['Emp_PmsStatus']==1){$stE='Pending';}if($resSt['Emp_PmsStatus']==2){$stE='Submitted';} if($resSt['Appraiser_PmsStatus']==0){$stA='Draft';}if($resSt['Appraiser_PmsStatus']==1){$stA='Pending';}if($resSt['Appraiser_PmsStatus']==2){$stA='Approved';}if($resSt['Appraiser_PmsStatus']==3){$stA='Resent';} if($resSt['Reviewer_PmsStatus']==0){$stR='Draft';}if($resSt['Reviewer_PmsStatus']==1){$stR='Pending';}if($resSt['Reviewer_PmsStatus']==2){$stR='Approved';}if($resSt['Reviewer_PmsStatus']==3){$stR='Resent';}if($resSt['HodSubmit_IncStatus']==0){$stH='Draft';}if($resSt['HodSubmit_IncStatus']==1){$stH='Pending';}if($resSt['HodSubmit_IncStatus']==2){$stH='Approved';} ?>	

			<td align="center" style="font:Georgia; font-size:11px; width:60px;">

<?php if($resSt['Emp_PmsStatus']==2) { ?><a href="javascript:OpenWindow(<?php echo $res['EmployeeID'].','.$res['EmpPmsId']; ?>)">Click</a> <?php } else { echo 'Wait'; }?>

			</td>

			<td align="center" style="font:Georgia; font-size:11px; width:60px;">

			<?php $sqlR=mysql_query("select * from hrm_employee_pms_uploadfile where EmpPmsId=".$res['EmpPmsId']." AND EmployeeID=".$res['EmployeeID']." AND YearId=".$YI, $con); $no=1; $resR=mysql_num_rows($sqlR); if($resR>0){ ?><a href="#" onClick="UploadEmpfile(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>)">Yes</a>

			<?php } if($resR==0){echo 'No'; }?>

			</td> 

			<td align="center" style="font:Georgia; font-size:11px; width:60px;"><?php $sum=$resSt['Appraiser_NoOfResend']+$resSt['Reviewer_NoOfResend']+$resSt['Hod_NoOfResend']; ?>			

			<?php if($sum>0) { ?><a href="#" onClick="ResentReason(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>)">Yes</a><?php } else { echo 'No'; }?>

			</td>	

			

  			<td align="center" style="font:Georgia; font-size:11px; width:100px;color:<?php if($stE=='Draft') {echo '#A40000'; }if($stE=='Pending') {echo '#36006C'; }if($stE=='Submitted') {echo '#005300'; }?>;"><?php echo $stE;?></td>  

			<td align="center" style="font:Georgia; font-size:11px; width:100px;color:<?php if($stA=='Draft') {echo '#A40000'; }if($stA=='Pending') {echo '#36006C'; }if($stA=='Approved') {echo '#005300'; }if($stA=='Resend') {echo '#006AD5'; }?>;"><?php echo $stA;?></td>

			<td align="center" style="font:Georgia; font-size:11px; width:100px;color:<?php if($stR=='Draft') {echo '#A40000'; }if($stR=='Pending') {echo '#36006C'; }if($stR=='Approved') {echo '#005300'; }if($stR=='Resend') {echo '#006AD5'; } ?>;"><?php echo $stR;?></td>

			 <td align="center" style="font:Georgia; font-size:11px; width:100px;color:<?php if($stH=='Draft') {echo '#A40000'; }if($stH=='Pending') {echo '#36006C'; }if($stH=='Approved') {echo '#005300'; }?>;"><?php echo $stH;?></td>

		 </tr>

<?php $sno++;} ?>		

</table>	 	

<?php } ?>

