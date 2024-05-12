<?php 

require_once('../AdminUser/config/config.php');

if(isset($_POST['HQidInc']) && $_POST['HQidInc']!=""){ 

$HQid = $_POST['HQidInc']; $EmpId = $_POST['EmpIdInc']; $YId = $_POST['YIdInc'];?>	 

<table border="">

		  <tr bgcolor="#7a6189" style="height:20px;" valign="middle">

	        <td colspan="5" align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:430px;"><b>&nbsp;</b></td> 

			<td colspan="3" align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:390px;"><b>Proposed Designation</b></td>

			<td colspan="3" align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:150px;"><b>Proposed Grade</b></td>

			<td colspan="3" align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:470px;"><b>Justifiction</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>&nbsp;</b></td>

		 </tr>

		 <tr bgcolor="#7a6189" style="height:20px;" valign="middle">

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:30px;"><b>SN</b></td>

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>EC</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:180px;"><b>Employee</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:120px;"><b>Designation</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:40px;"><b>Grade</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:120px;"><b>App</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:120px;"><b>Rev</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:150px;"><b>HOD</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>App</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>Rev</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>HOD</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>App</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>Rev</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:370px;"><b>HOD</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>Edit</b></td>

		 </tr>



<?php if($HQid=='All') { $sql=mysql_query("select hrm_employee.*, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Appraiser_EmpDesignation, Appraiser_EmpGrade, Reviewer_EmpDesignation, Reviewer_EmpGrade, Hod_EmpDesignation, Hod_EmpGrade, Appraiser_Justification, Reviewer_Justification, Hod_Justification, DepartmentId, DesigId, DesigId2, HqId, GradeId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YId." AND hrm_employee_pms.HOD_EmployeeID=".$EmpId, $con); }

    if($HQid!='All') { $sql=mysql_query("select hrm_employee.*, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Appraiser_EmpDesignation, Appraiser_EmpGrade, Reviewer_EmpDesignation, Reviewer_EmpGrade, Hod_EmpDesignation, Hod_EmpGrade, Appraiser_Justification, Reviewer_Justification, Hod_Justification, DepartmentId, DesigId, DesigId2, HqId, GradeId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YId." AND hrm_employee_general.HqId=".$HQid." AND hrm_employee_pms.HOD_EmployeeID=".$EmpId, $con); }



 $sno=1; while($res=mysql_fetch_array($sql)){ ?>     		

		<tr bgcolor="#FFFFFF" style="height:20px;">

	        <td align="center" style="font:Georgia; font-size:11px; width:30px;"><?php echo $sno; ?></td>

	        <td align="center" style="font:Georgia; font-size:11px; width:50px;" valign="top"><?php echo $res['EmpCode']; ?></td>

			<td align="" style="font:Georgia; font-size:11px; width:180px;"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>

<?php $sql2=mysql_query("select DesigCode from hrm_designation where DesigId=".$res['DesigId'], $con); $res2=mysql_fetch_assoc($sql2);?>

	        <td align="" style="font:Georgia; font-size:11px; width:120px;">

	        <input type="hidden" id="EmpDesig_<?php echo $sno; ?>" value="<?php echo $res['DesigId']; ?>" />

	  <?php echo $res2['DesigCode'];?></td>

<?php $sql3=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $res3=mysql_fetch_assoc($sql3);?>		  

	        <td align="center" style="font:Georgia; font-size:11px; width:40px;">

			<input type="hidden" id="EmpGrade_<?php echo $sno; ?>" value="<?php echo $res['GradeId']; ?>" />

			<?php echo $res3['GradeValue']; ?></td>

<?php $sql5=mysql_query("select DesigCode from hrm_designation where DesigId=".$res['Appraiser_EmpDesignation'], $con); $res5=mysql_fetch_assoc($sql5);?>			

			<td align="" style="font:Georgia; font-size:11px; width:120px;">

			<a href="#" onClick="AppName(<?php echo $res['Appraiser_EmployeeID']; ?>)"><?php echo $res5['DesigCode'];?></a></td>

<?php $sql6=mysql_query("select DesigCode from hrm_designation where DesigId=".$res['Reviewer_EmpDesignation'], $con); $res6=mysql_fetch_assoc($sql6);?>			

			<td align="" style="font:Georgia; font-size:11px; width:120px;">

			<a href="#" onClick="RevName(<?php echo $res['Reviewer_EmployeeID']; ?>)"><?php echo $res6['DesigCode'];?></a></td>			

			<td align="center" style="font:Georgia; font-size:11px; width:150px;" valign="top">		

<?php $sqlG2 = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$res['GradeId'], $con); $resG2 = mysql_fetch_assoc($sqlG2);

$NextGrade=$resG2['GradeValue']+1; $NextGrade2=$resG2['GradeValue']+2; ?>					



			<select style="width:145px; height:20px; background-color:#CEFFCE;font-size:12px;" id="DesigId_<?php echo $sno; ?>" disabled>

<?php if($res['Hod_EmpDesignation']!=0) { $sqlD = mysql_query("SELECT DesigCode FROM hrm_designation WHERE DesigId=".$res['Hod_EmpDesignation'], $con); $resD = mysql_fetch_assoc($sqlD); ?><option style="background-color:#FFFFFF;" value="<?php echo $res['Hod_EmpDesignation']; ?>"><?php echo $resD['DesigCode']; ?></option>

<?php } if($res['Hod_EmpDesignation']==0) { ?><option style="background-color:#FFFFFF;" value="<?php echo $res['DesigId']; ?>"><?php echo $res2['DesigCode']; ?></option><?php } ?>

<?php $sqlDept = mysql_query("SELECT DesigId FROM hrm_deptgradedesig WHERE DepartmentId=".$res['DepartmentId']." AND (GradeId=".$NextGrade." OR GradeId=".$NextGrade2.")", $con); while($resDept = mysql_fetch_assoc($sqlDept)) { 

      $sqlDesig = mysql_query("SELECT DesigCode FROM hrm_designation WHERE DesigId=".$resDept['DesigId'], $con); $resDesig = mysql_fetch_assoc($sqlDesig); ?>    

<option style="background-color:#FFFFFF;" value="<?php echo $resDept['DesigId']; ?>"><?php echo $resDesig['DesigCode']; ?></option><?php } ?></select></td>



<?php $sql7=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Appraiser_EmpGrade'], $con); $res7=mysql_fetch_assoc($sql7);?>			

		    <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $res7['GradeValue'];?></td>

<?php $sql8=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Reviewer_EmpGrade'], $con); $res8=mysql_fetch_assoc($sql8);?>			

		    <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $res8['GradeValue'];?></td>					

		    <td align="center" style="font:Georgia; font-size:11px; width:50px;" valign="top">

	      <select style="width:48px; height:20px; background-color:#CEFFCE;font-size:12px;" id="GradeId_<?php echo $sno; ?>" disabled>

<?php if($res['Hod_EmpGrade']!=0) { $sqlG = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$res['Hod_EmpGrade'], $con); $resG = mysql_fetch_assoc($sqlG);?><option style="background-color:#FFFFFF;" value="<?php echo $res['Hod_EmpGrade']; ?>"><?php echo $resG['GradeValue']; ?></option>

<?php } ?>

<option style="background-color:#FFFFFF;" value="<?php echo $res['GradeId']; ?>"><?php echo $resG2['GradeValue']; ?></option>  

<option style="background-color:#FFFFFF;" value="<?php echo $NextGrade; ?>"><?php echo $NextGrade; ?></option></select></td>			

									

	<td align="center" style="font:Georgia; font-size:11px; width:50px;"><a href="#" onClick="JustiApp(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>)">Click</a></td>

	<td align="center" style="font:Georgia; font-size:11px; width:50px;"><a href="#" onClick="JustiRev(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>)">Click</a></td>

				

			<td align="center" style="font:Georgia; font-size:11px; width:370px;" valign="top">

			<input name="Justification_<?php echo $sno; ?>" id="Justification_<?php echo $sno; ?>" style="border-style:hidden; border:0; background-color:#CEFFCE; width:368px; height:20px;;" height="20" value="<?php echo $res['Hod_Justification'];?>" disabled maxlength="250"/></td>

			

			<td align="center" style="font:Georgia; font-size:11px; width:50px;">

			<SPAN id="SpanEdit_<?php echo $sno; ?>"><img src="images/edit.png" border="0" onClick="ClickEdit(<?php echo $sno; ?>)"/></SPAN>

			<SPAN id="SpanEditSave_<?php echo $sno; ?>" style="display:none;">

			<img src="images/Floppy-Small-icon.png" border="0" onClick="return ClickSaveEdit(<?php echo $sno.','.$res['EmpPmsId'].','.$res['EmployeeID']; ?>)"></SPAN>  

			</td>

		 </tr>

<?php $sno++;} ?>		

</table>	 

	

<?php } ?>

