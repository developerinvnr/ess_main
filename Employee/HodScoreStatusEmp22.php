<?php require_once('../AdminUser/config/config.php'); ?>
<style>
.td1{ text-align:center;font-family:Times New Roman;color:#FFFFFF;font-size:14px; }
.td2{ text-align:center;font-family:Times New Roman;font-size:12px; }
.td3{ font-family:Times New Roman;font-size:12px; }
</style>
<table border="1" cellspacing="1">
 <tr bgcolor="#7a6189" style="height:20px;" valign="middle">
  <td rowspan="2" class="td1" style="width:30px;"><b>SN</b></td>
  <td rowspan="2" class="td1" style="width:50px;"><b>EC</b></td>
<?php /*<td rowspan="2" class="td1" style="width:140px;"><b>Designation</b></td> */ ?>
  <td colspan="3" class="td1"><b>Name</b></td>
  <td colspan="4" class="td1"><b>Score</b></td>
  <td colspan="2" class="td1"><b>Rating</b></td>
  <td rowspan="2" class="td1" style="width:200px;"><b>Text</b></td>
  <td rowspan="2" class="td1" style="width:80px;"><b>Action</b></td>
 </tr>
 <tr bgcolor="#7a6189">
  <td class="td1" style="width:180px;"><b>Employee</b></td>
  <td class="td1" style="width:180px;"><b>Appraiser</b></td>
  <td class="td1" style="width:180px;"><b>Reviewer</b></td>
  <td class="td1" style="width:50px;"><b>Emp.</b></td>
  <td class="td1" style="width:50px;"><b>App.</b></td>
  <td class="td1" style="width:50px;"><b>Rev.</b></td>
  <td class="td1" style="width:50px;"><b>HOD</b></td>
  <td class="td1" style="width:50px;"><b>Rev.</b></td>
  <td class="td1" style="width:50px;"><b>HOD</b></td>
 </tr>



<?php
if(isset($_POST['HQidInc']) && $_POST['HQidInc']!=""){ 
$HQid = $_POST['HQidInc']; $EmpId = $_POST['EmpIdInc']; $YId = $_POST['YIdInc'];?>	 

<?php if($HQid=='All') { $sql=mysql_query("select hrm_employee.*, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Emp_TotalFinalScore, Appraiser_TotalFinalScore, Appraiser_EmpDesignation, Appraiser_EmpGrade, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Reviewer_EmpDesignation, Reviewer_EmpGrade, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade, DepartmentId, DesigId, DesigId2, HqId, GradeId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YId." AND hrm_employee_pms.HOD_EmployeeID=".$EmpId, $con); }

    if($HQid!='All') { $sql=mysql_query("select hrm_employee.*, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Emp_TotalFinalScore, Appraiser_TotalFinalScore, Appraiser_EmpDesignation, Appraiser_EmpGrade, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Reviewer_EmpDesignation, Reviewer_EmpGrade, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade, DepartmentId, DesigId, DesigId2, HqId, GradeId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YId." AND hrm_employee_general.HqId=".$HQid." AND hrm_employee_pms.HOD_EmployeeID=".$EmpId, $con); }
 $sno=1; while($res=mysql_fetch_array($sql)){ ?>     		
	<tr bgcolor="#FFFFFF" style="height:20px;" valign="middle">
	    <td class="td2"><?php echo $sno; ?></td>
	      <td class="td2"><?php echo $res['EmpCode']; ?></td>
<?php /* $sql2=mysql_query("select DesigCode from hrm_designation where DesigId=".$res['DesigId'], $con); 
      $res2=mysql_fetch_assoc($sql2);?><td class="td3">
	  <input type="hidden" id="UpDesigId_<?php echo $sno; ?>" value="<?php echo $res['DesigId']; ?>" /><?php echo $res2['DesigCode'];?></td>	<?php */?>  
	        <td class="td3"><input type="text" value="<?php echo strtoupper($res['Fname'].' '.$res['Sname'].' '.$res['Lname']); ?>" style="width:200px;border:hidden;" class="td3" readonly/></td>
<?php $sql3=mysql_query("select * from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'], $con); $res3=mysql_fetch_assoc($sql3);?>
	        <td class="td3"><input type="text" value="<?php echo strtoupper($res3['Fname'].' '.$res3['Sname'].' '.$res3['Lname']); ?>" style="width:200px;border:hidden;" class="td3" readonly/></td>
<?php $sql4=mysql_query("select * from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'], $con); $res4=mysql_fetch_assoc($sql4);?>
	        <td class="td3"><input type="text" value="<?php echo strtoupper($res4['Fname'].' '.$res4['Sname'].' '.$res4['Lname']); ?>" style="width:200px;border:hidden;" class="td3" readonly/></td>
			<td class="td2"><?php echo $res['Emp_TotalFinalScore'];?></td>
			<td class="td2"><?php echo $res['Appraiser_TotalFinalScore'];?></td>
			<td class="td2"><?php echo $res['Reviewer_TotalFinalScore'];?><input type="hidden" id="RevScore_<?php echo $sno; ?>" value="<?php echo $res['Reviewer_TotalFinalScore'];?>" /></td>
			<td class="td2"><input name="HodScore_<?php echo $sno; ?>" id="HodScore_<?php echo $sno; ?>" style="border-style:hidden; border:0; background-color:#CEFFCE;font-weight:bold;width:50px;height:22px;" class="td2" value="<?php if($res['Hod_TotalFinalScore']>0){echo $res['Hod_TotalFinalScore'];}else {echo $res['Reviewer_TotalFinalScore'];}?>" onKeyUp="EditSHod(<?php echo $sno; ?>)" onChange="EditSHod(<?php echo $sno; ?>)" readonly maxlength="6"/></td>
			<td class="td2"><?php echo $res['Reviewer_TotalFinalRating'];?></td>
			<td class="td2"><input id="HodRating_<?php echo $sno; ?>" style="border-style:hidden; border:0; background-color:#CEFFCE; width:50px; height:22px;font-weight:bold;" class="td2" value="<?php if($res['Hod_TotalFinalRating']==0){ echo $res['Reviewer_TotalFinalRating']; } if($res['Hod_TotalFinalRating']!=0){ echo $res['Hod_TotalFinalRating']; }?>" readonly/></td>

			<td class="td2">
			<input name="Reason_<?php echo $sno; ?>" id="Reason_<?php echo $sno; ?>" style="border-style:hidden; border:0; background-color:#CEFFCE; width:199px; height:20px;;" height="19" value="Type Reason" disabled maxlength="200"/></td>
			<td class="td2">
            <SPAN id="SpanEdit_<?php echo $sno; ?>">
			<img src="images/edit.png" border="0" onClick="ClickEdit(<?php echo $sno; ?>)"/>
			&nbsp;&nbsp;&nbsp;
			<img src="images/go-back-icon.png" border="0" onClick="ClickResend(<?php echo $sno; ?>)"/></SPAN>
			<SPAN id="SpanEditSave_<?php echo $sno; ?>" style="display:none;" />
			<img src="images/Floppy-Small-icon.png" border="0" onClick="return ClickSaveEdit(<?php echo $sno.','.$res['EmpPmsId'].','.$res['EmployeeID']; ?>)"></SPAN>
			<SPAN id="SpanResendSave_<?php echo $sno; ?>" style="display:none;" />
			<img src="images/Floppy-Small-icon.png" border="0" onClick="return ClickSaveResend(<?php echo $sno.','.$res['EmpPmsId'].','.$res['EmployeeID']; ?>)"></SPAN>
			</td>
<?php $sno++;} } ?>		

<?php if(isset($_POST['StHQidInc']) && $_POST['StHQidInc']!=""){ 
$StHQid = $_POST['StHQidInc']; $EmpId = $_POST['EmpIdInc']; $YId = $_POST['YIdInc'];?>	 
<?php if($StHQid=='All') { $sql=mysql_query("select hrm_employee.*, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Emp_TotalFinalScore, Appraiser_TotalFinalScore, Appraiser_EmpDesignation, Appraiser_EmpGrade, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Reviewer_EmpDesignation, Reviewer_EmpGrade, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade, DepartmentId, DesigId, DesigId2, HqId, GradeId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YId." AND hrm_employee_pms.HOD_EmployeeID=".$EmpId, $con); }

    if($StHQid!='All') { $sql=mysql_query("select hrm_employee.*, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Emp_TotalFinalScore, Appraiser_TotalFinalScore, Appraiser_EmpDesignation, Appraiser_EmpGrade, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Reviewer_EmpDesignation, Reviewer_EmpGrade, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade, hrm_employee_general.DepartmentId, hrm_employee_general.GradeId, hrm_employee_general.DesigId, hrm_employee_general.DesigId2, hrm_employee_general.HqId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_headquater ON hrm_employee_general.HqId=hrm_headquater.HqId where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YId." AND hrm_headquater.StateId=".$StHQid." AND hrm_employee_pms.HOD_EmployeeID=".$EmpId, $con); }

 $sno=1; while($res=mysql_fetch_array($sql)){ ?>     		
		<tr bgcolor="#FFFFFF" style="height:20px;" valign="middle">
	    <td class="td2"><?php echo $sno; ?></td>
	      <td class="td2"><?php echo $res['EmpCode']; ?></td>
<?php /* $sql2=mysql_query("select DesigCode from hrm_designation where DesigId=".$res['DesigId'], $con); 
      $res2=mysql_fetch_assoc($sql2);?><td class="td3">
	  <input type="hidden" id="UpDesigId_<?php echo $sno; ?>" value="<?php echo $res['DesigId']; ?>" /><?php echo $res2['DesigCode'];?></td>	<?php */?>  
	        <td class="td3"><input type="text" value="<?php echo strtoupper($res['Fname'].' '.$res['Sname'].' '.$res['Lname']); ?>" style="width:200px;border:hidden;" class="td3" readonly/></td>
<?php $sql3=mysql_query("select * from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'], $con); $res3=mysql_fetch_assoc($sql3);?>
	        <td class="td3"><input type="text" value="<?php echo strtoupper($res3['Fname'].' '.$res3['Sname'].' '.$res3['Lname']); ?>" style="width:200px;border:hidden;" class="td3" readonly/></td>
<?php $sql4=mysql_query("select * from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'], $con); $res4=mysql_fetch_assoc($sql4);?>
	        <td class="td3"><input type="text" value="<?php echo strtoupper($res4['Fname'].' '.$res4['Sname'].' '.$res4['Lname']); ?>" style="width:200px;border:hidden;" class="td3" readonly/></td>
			<td class="td2"><?php echo $res['Emp_TotalFinalScore'];?></td>
			<td class="td2"><?php echo $res['Appraiser_TotalFinalScore'];?></td>
			<td class="td2"><?php echo $res['Reviewer_TotalFinalScore'];?><input type="hidden" id="RevScore_<?php echo $sno; ?>" value="<?php echo $res['Reviewer_TotalFinalScore'];?>" /></td>
			<td class="td2"><input name="HodScore_<?php echo $sno; ?>" id="HodScore_<?php echo $sno; ?>" style="border-style:hidden; border:0; background-color:#CEFFCE;font-weight:bold;width:50px;height:22px;" class="td2" value="<?php if($res['Hod_TotalFinalScore']>0){echo $res['Hod_TotalFinalScore'];}else {echo $res['Reviewer_TotalFinalScore'];}?>" onKeyUp="EditSHod(<?php echo $sno; ?>)" onChange="EditSHod(<?php echo $sno; ?>)" readonly maxlength="6"/></td>
			<td class="td2"><?php echo $res['Reviewer_TotalFinalRating'];?></td>
			<td class="td2"><input id="HodRating_<?php echo $sno; ?>" style="border-style:hidden; border:0; background-color:#CEFFCE; width:50px; height:22px;font-weight:bold;" class="td2" value="<?php if($res['Hod_TotalFinalRating']==0){ echo $res['Reviewer_TotalFinalRating']; } if($res['Hod_TotalFinalRating']!=0){ echo $res['Hod_TotalFinalRating']; }?>" readonly/></td>

			<td class="td2">
			<input name="Reason_<?php echo $sno; ?>" id="Reason_<?php echo $sno; ?>" style="border-style:hidden; border:0; background-color:#CEFFCE; width:199px; height:20px;;" height="19" value="Type Reason" disabled maxlength="200"/></td>
			<td class="td2">
            <SPAN id="SpanEdit_<?php echo $sno; ?>">
			<img src="images/edit.png" border="0" onClick="ClickEdit(<?php echo $sno; ?>)"/>
			&nbsp;&nbsp;&nbsp;
			<img src="images/go-back-icon.png" border="0" onClick="ClickResend(<?php echo $sno; ?>)"/></SPAN>
			<SPAN id="SpanEditSave_<?php echo $sno; ?>" style="display:none;" />
			<img src="images/Floppy-Small-icon.png" border="0" onClick="return ClickSaveEdit(<?php echo $sno.','.$res['EmpPmsId'].','.$res['EmployeeID']; ?>)"></SPAN>
			<SPAN id="SpanResendSave_<?php echo $sno; ?>" style="display:none;" />
			<img src="images/Floppy-Small-icon.png" border="0" onClick="return ClickSaveResend(<?php echo $sno.','.$res['EmpPmsId'].','.$res['EmployeeID']; ?>)"></SPAN>
			</td>
<?php $sno++;} } ?>


<?php if(isset($_POST['StDeptidInc']) && $_POST['StDeptidInc']!=""){ 
$StDeptid = $_POST['StDeptidInc']; $EmpId = $_POST['EmpIdInc']; $YId = $_POST['YIdInc'];?>	 
<?php $sql=mysql_query("select hrm_employee.*, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Emp_TotalFinalScore, Appraiser_TotalFinalScore, Appraiser_EmpDesignation, Appraiser_EmpGrade, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Reviewer_EmpDesignation, Reviewer_EmpGrade, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade, hrm_employee_general.DepartmentId, hrm_employee_general.GradeId, hrm_employee_general.DesigId, hrm_employee_general.DesigId2, hrm_employee_general.HqId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_headquater ON hrm_employee_general.HqId=hrm_headquater.HqId where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YId." AND hrm_employee_general.DepartmentId=".$StDeptid." AND hrm_employee_pms.HOD_EmployeeID=".$EmpId." order by EmpCode ASC", $con); 
 $sno=1; while($res=mysql_fetch_array($sql)){ ?>     		
	<tr bgcolor="#FFFFFF" style="height:20px;" valign="middle">
	    <td class="td2"><?php echo $sno; ?></td>
	      <td class="td2"><?php echo $res['EmpCode']; ?></td>
<?php /* $sql2=mysql_query("select DesigCode from hrm_designation where DesigId=".$res['DesigId'], $con); 
      $res2=mysql_fetch_assoc($sql2);?><td class="td3">
	  <input type="hidden" id="UpDesigId_<?php echo $sno; ?>" value="<?php echo $res['DesigId']; ?>" /><?php echo $res2['DesigCode'];?></td>	<?php */?>  
	        <td class="td3"><input type="text" value="<?php echo strtoupper($res['Fname'].' '.$res['Sname'].' '.$res['Lname']); ?>" style="width:200px;border:hidden;" class="td3" readonly/></td>
<?php $sql3=mysql_query("select * from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'], $con); $res3=mysql_fetch_assoc($sql3);?>
	        <td class="td3"><input type="text" value="<?php echo strtoupper($res3['Fname'].' '.$res3['Sname'].' '.$res3['Lname']); ?>" style="width:200px;border:hidden;" class="td3" readonly/></td>
<?php $sql4=mysql_query("select * from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'], $con); $res4=mysql_fetch_assoc($sql4);?>
	        <td class="td3"><input type="text" value="<?php echo strtoupper($res4['Fname'].' '.$res4['Sname'].' '.$res4['Lname']); ?>" style="width:200px;border:hidden;" class="td3" readonly/></td>
			<td class="td2"><?php echo $res['Emp_TotalFinalScore'];?></td>
			<td class="td2"><?php echo $res['Appraiser_TotalFinalScore'];?></td>
			<td class="td2"><?php echo $res['Reviewer_TotalFinalScore'];?><input type="hidden" id="RevScore_<?php echo $sno; ?>" value="<?php echo $res['Reviewer_TotalFinalScore'];?>" /></td>
			<td class="td2"><input name="HodScore_<?php echo $sno; ?>" id="HodScore_<?php echo $sno; ?>" style="border-style:hidden; border:0; background-color:#CEFFCE;font-weight:bold;width:50px;height:22px;" class="td2" value="<?php if($res['Hod_TotalFinalScore']>0){echo $res['Hod_TotalFinalScore'];}else {echo $res['Reviewer_TotalFinalScore'];}?>" onKeyUp="EditSHod(<?php echo $sno; ?>)" onChange="EditSHod(<?php echo $sno; ?>)" readonly maxlength="6"/></td>
			<td class="td2"><?php echo $res['Reviewer_TotalFinalRating'];?></td>
			<td class="td2"><input id="HodRating_<?php echo $sno; ?>" style="border-style:hidden; border:0; background-color:#CEFFCE;width:50px;height:22px;font-weight:bold;" class="td2" value="<?php if($res['Hod_TotalFinalRating']==0){ echo $res['Reviewer_TotalFinalRating']; } if($res['Hod_TotalFinalRating']!=0){ echo $res['Hod_TotalFinalRating']; }?>" readonly/></td>

			<td class="td2">
			<input name="Reason_<?php echo $sno; ?>" id="Reason_<?php echo $sno; ?>" style="border-style:hidden; border:0; background-color:#CEFFCE; width:199px; height:20px;;" height="19" value="Type Reason" disabled maxlength="200"/></td>
			<td class="td2">
            <SPAN id="SpanEdit_<?php echo $sno; ?>">
			<img src="images/edit.png" border="0" onClick="ClickEdit(<?php echo $sno; ?>)"/>
			&nbsp;&nbsp;&nbsp;
			<img src="images/go-back-icon.png" border="0" onClick="ClickResend(<?php echo $sno; ?>)"/></SPAN>
			<SPAN id="SpanEditSave_<?php echo $sno; ?>" style="display:none;" />
			<img src="images/Floppy-Small-icon.png" border="0" onClick="return ClickSaveEdit(<?php echo $sno.','.$res['EmpPmsId'].','.$res['EmployeeID']; ?>)"></SPAN>
			<SPAN id="SpanResendSave_<?php echo $sno; ?>" style="display:none;" />
			<img src="images/Floppy-Small-icon.png" border="0" onClick="return ClickSaveResend(<?php echo $sno.','.$res['EmpPmsId'].','.$res['EmployeeID']; ?>)"></SPAN>
			</td>
<?php $sno++;} } ?>

		
</table>	 




