<?php 



require_once('../AdminUser/config/config.php');



if(isset($_POST['StDeptidInc']) && $_POST['StDeptidInc']!=""){ 



$StDeptid = $_POST['StDeptidInc']; $EmpId = $_POST['EmpIdInc']; $YId = $_POST['YIdInc'];?>	 



<table border="">



		 <tr bgcolor="#7a6189" style="height:20px;" valign="middle">



	        <td colspan="3" align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:240px;"><b>&nbsp;</b></td>



	        <td colspan="3" align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:540px;"><b>Name</b></td>



	        <td colspan="4" align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:200px;"><b>Score</b></td>



			<td colspan="2" align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>Rating</b></td>



			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:150px;"><b>&nbsp;</b></td>



			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>&nbsp;</b></td>



		 </tr>



		 <tr bgcolor="#7a6189" style="height:20px;" valign="middle">



	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:30px;"><b>SN</b></td>



	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>EC</b></td>



			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:140px;"><b>Designation</b></td>



			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:180px;"><b>Employee</b></td>



			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:180px;"><b>Appraiser</b></td>



			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:180px;"><b>Reviewer</b></td>



			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>Emp.</b></td>



			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>App.</b></td>



			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>Rev.</b></td>



			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>HOD</b></td>



			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>Rev.</b></td>



			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>HOD</b></td>



			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:200px;"><b>Text</b></td>



			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>Action</b></td>



		 </tr>



<?php $sql=mysql_query("select hrm_employee.*, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Emp_TotalFinalScore, Appraiser_TotalFinalScore, Appraiser_EmpDesignation, Appraiser_EmpGrade, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Reviewer_EmpDesignation, Reviewer_EmpGrade, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade, hrm_employee_general.DepartmentId, hrm_employee_general.GradeId, hrm_employee_general.DesigId, hrm_employee_general.DesigId2, hrm_employee_general.HqId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_headquater ON hrm_employee_general.HqId=hrm_headquater.HqId where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YId." AND hrm_employee_general.DepartmentId=".$StDeptid." AND hrm_employee_pms.HOD_EmployeeID=".$EmpId." order by EmpCode ASC", $con); 







 $sno=1; while($res=mysql_fetch_array($sql)){ ?>     		



		<tr bgcolor="#FFFFFF" style="height:20px;" valign="middle">



	        <td align="center" style="font:Georgia; font-size:11px; width:30px;"><?php echo $sno; ?></td>



	        <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $res['EmpCode']; ?></td>



<?php $sql2=mysql_query("select DesigCode from hrm_designation where DesigId=".$res['DesigId'], $con); 



      $res2=mysql_fetch_assoc($sql2);?><td align="" style="font:Georgia; font-size:11px; width:140px;">



	  <input type="hidden" id="UpDesigId_<?php echo $sno; ?>" value="<?php echo $res['DesigId']; ?>" /><?php echo $res2['DesigCode'];?></td>	  



	        <td align="" style="font:Georgia; font-size:11px; width:180px;"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>



<?php $sql3=mysql_query("select * from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'], $con); $res3=mysql_fetch_assoc($sql3);?>



	        <td align="" style="font:Georgia; font-size:11px; width:180px;"><?php echo $res3['Fname'].' '.$res3['Sname'].' '.$res3['Lname']; ?></td>



<?php $sql4=mysql_query("select * from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'], $con); $res4=mysql_fetch_assoc($sql4);?>



	        <td align="" style="font:Georgia; font-size:11px; width:180px;"><?php echo $res4['Fname'].' '.$res4['Sname'].' '.$res4['Lname']; ?></td>



			<td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $res['Emp_TotalFinalScore'];?></td>



			<td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $res['Appraiser_TotalFinalScore'];?></td>



			<td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $res['Reviewer_TotalFinalScore'];?>



			<input type="hidden" id="RevScore_<?php echo $sno; ?>" value="<?php echo $res['Reviewer_TotalFinalScore'];?>" /></td>



			<td align="center" style="font:Georgia; font-size:11px; width:50px;" valign="top"><input name="HodScore_<?php echo $sno; ?>" id="HodScore_<?php echo $sno; ?>" style="border-style:hidden; border:0; background-color:#CEFFCE; width:50px; height:20px; text-align:center;" value="<?php if($res['Hod_TotalFinalScore']>0){echo $res['Hod_TotalFinalScore'];}else {echo $res['Reviewer_TotalFinalScore'];}?>" onKeyDown="EditSHod(<?php echo $sno; ?>)" onChange="EditSHod(<?php echo $sno; ?>)" readonly maxlength="6"/></td>



			<td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $res['Reviewer_TotalFinalRating'];?></td>



			<td align="center" style="font:Georgia; font-size:11px; width:50px;" valign="top"><input id="HodRating_<?php echo $sno; ?>" style="border-style:hidden; border:0; background-color:#CEFFCE; width:50px; height:20px; text-align:center;" value="<?php if($res['Hod_TotalFinalRating']==0){ echo $res['Reviewer_TotalFinalRating']; } if($res['Hod_TotalFinalRating']!=0){ echo $res['Hod_TotalFinalRating']; }?>" readonly/></td>			



						



			<td align="center" style="font:Georgia; font-size:11px; width:200px;" valign="top">



			<input name="Reason_<?php echo $sno; ?>" id="Reason_<?php echo $sno; ?>" style="border-style:hidden; border:0; background-color:#CEFFCE; width:199px; height:20px;;" height="19" value="Type Reason" disabled maxlength="200"/></td>



			<td align="center" style="font:Georgia; font-size:11px; width:80px;">



            <SPAN id="SpanEdit_<?php echo $sno; ?>">



			<img src="images/edit.png" border="0" onClick="ClickEdit(<?php echo $sno; ?>)"/>



			&nbsp;&nbsp;<img src="images/go-back-icon.png" border="0" onClick="ClickResend(<?php echo $sno; ?>)"/></SPAN>



			<SPAN id="SpanEditSave_<?php echo $sno; ?>" style="display:none;" />



			<img src="images/Floppy-Small-icon.png" border="0" onClick="return ClickSaveEdit(<?php echo $sno.','.$res['EmpPmsId'].','.$res['EmployeeID']; ?>)"> </SPAN>



			<SPAN id="SpanResendSave_<?php echo $sno; ?>" style="display:none;" />



			<img src="images/Floppy-Small-icon.png" border="0" onClick="return ClickSaveResend(<?php echo $sno.','.$res['EmpPmsId'].','.$res['EmployeeID']; ?>)"></SPAN>



			</td>



<?php $sno++;} ?>		



</table>	 



	



<?php } ?>



