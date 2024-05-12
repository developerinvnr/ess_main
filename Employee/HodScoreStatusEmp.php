<?php session_start();
require_once('../AdminUser/config/config.php'); 
if($_POST['StHQidInc'] OR $_POST['StDeptidInc']) //$_POST['HQidInc'] OR 
{ 
 $d=$_POST['d']; $h=$_POST['h']; $s=$_POST['s']; $EmpId = $_POST['EmpIdInc']; $YId = $_POST['YIdInc'];
 //echo $d.'-'.$h.'-'.$s.'-'.$EmpId.'-'.$YId; ?>
<table border="1" id="table1" cellpadding="0" cellspacing="0" style="width:100%;">
    <div id="thead">
    <thead>  
    <tr bgcolor="#7a6189" style="height:25px;">
     <td rowspan="2" class="th" style="width:3%;">Sn</td>
     <td colspan="3" class="th">Employee</td>
	 <td colspan="2" class="th">Appraiser</td>
	 <td colspan="3" class="th">Reviewer / HOD</td>
	 <?php /*?><td rowspan="2" class="th" style="width:4%;">Tgt/<br>Ach</td><?php */?>
	 <td colspan="5" class="th">Management</td>
    </tr>
    <tr bgcolor="#7a6189">
     <td class="th" style="width:3%;border-right:hidden;">EC</td>
     <td class="th" style="width:15%;border-left:hidden;border-right:hidden;">Name</td>
     <td class="th" style="width:4%;border-left:hidden;">Score</td>
	 <td class="th" style="width:15%;border-right:hidden;">Name</td>
     <td class="th" style="width:4%;border-left:hidden;">Score</td>
	 <td class="th" style="width:15%;border-right:hidden;">Name</td>
     <td class="th" style="width:4%;border-left:hidden;border-right:hidden;">Score</td>
	 <td class="th" style="width:4%;border-left:hidden;">Rating</td>
	 
	 <td class="th" style="width:4%;border-right:hidden;">Score</td>
	 <td class="th" style="width:4%;border-left:hidden;border-right:hidden;">Rating</td>
	 <td class="th" style="width:15%;border-left:hidden;border-right:hidden;">Text</td>
	 <td class="th" style="width:5%;border-left:hidden;">Action</td>
    </tr>
	</thead>
	</div>
<?php 
if($d>0 AND $s=='All')
{
 $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Rev2_EmployeeID, Emp_TotalFinalScore, Appraiser_TotalFinalScore, Appraiser_EmpDesignation, Appraiser_EmpGrade, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Reviewer_EmpDesignation, Reviewer_EmpGrade, HodSubmit_IncStatus, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, HR_CurrDesigId, HR_Curr_DepartmentId, Hod_EmpGrade from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$YId." AND g.DepartmentId=".$d." AND p.HOD_EmployeeID=".$EmpId." order by e.EmpCode ASC", $con);
}
elseif($d>0 AND $s>0)
{
 $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Rev2_EmployeeID, Emp_TotalFinalScore, Appraiser_TotalFinalScore, Appraiser_EmpDesignation, Appraiser_EmpGrade, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Reviewer_EmpDesignation, Reviewer_EmpGrade, HodSubmit_IncStatus, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, HR_CurrDesigId, HR_Curr_DepartmentId, Hod_EmpGrade from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId where e.EmpStatus='A' AND p.AssessmentYear=".$YId." AND g.DepartmentId=".$d." AND hq.StateId=".$s." AND p.HOD_EmployeeID=".$EmpId." order by e.EmpCode ASC", $con);
}
elseif($d=='All' AND $s>0)
{
 $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Rev2_EmployeeID, Emp_TotalFinalScore, Appraiser_TotalFinalScore, Appraiser_EmpDesignation, Appraiser_EmpGrade, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Reviewer_EmpDesignation, Reviewer_EmpGrade, HodSubmit_IncStatus, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, HR_CurrDesigId, HR_Curr_DepartmentId, Hod_EmpGrade from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId where e.EmpStatus='A' AND p.AssessmentYear=".$YId." AND hq.StateId=".$s." AND p.HOD_EmployeeID=".$EmpId." order by e.EmpCode ASC", $con);
}
elseif($d=='All' AND $s=='All')
{
 $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Rev2_EmployeeID, Emp_TotalFinalScore, Appraiser_TotalFinalScore, Appraiser_EmpDesignation, Appraiser_EmpGrade, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Reviewer_EmpDesignation, Reviewer_EmpGrade, HodSubmit_IncStatus, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, HR_CurrDesigId, HR_Curr_DepartmentId, Hod_EmpGrade from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId where e.EmpStatus='A' AND p.AssessmentYear=".$YId." AND p.HOD_EmployeeID=".$EmpId." order by e.EmpCode ASC", $con);
}

$sno=1; while($res=mysql_fetch_array($sql)){ 
$sql3=mysql_query("select * from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'], $con); 
$sql4=mysql_query("select * from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'], $con); 
$sql5=mysql_query("select * from hrm_employee where EmployeeID=".$res['Rev2_EmployeeID'], $con); 
$res3=mysql_fetch_assoc($sql3); $res4=mysql_fetch_assoc($sql4); $res5=mysql_fetch_assoc($sql5);
$sqlReas=mysql_query("select Hod_Reason from hrm_employee_pms_resend where EmpPmsId=".$res['EmpPmsId']." order by ResendId DESC",$con); $rowReas=mysql_num_rows($sqlReas); $resReas=mysql_fetch_assoc($sqlReas);
?>
    <input type="hidden" id="UpDesigId_<?php echo $sno; ?>" value="<?php echo $res['HR_CurrDesigId']; ?>" />
	<input type="hidden" id="RevScore_<?php echo $sno; ?>" value="<?php echo $res['Reviewer_TotalFinalScore'];?>" />     		
	<div id="tbody">
    <tbody>
    <tr style="height:24px;background-color:#FFFFFF;">
	 <td class="tdc"><?php echo $sno; ?></td>
	 <td class="tdc"><?php echo $res['EmpCode']; ?></td>
	 <td class="tdc"><input class="tdinpl" value="<?php echo strtoupper($res['Fname'].' '.$res['Sname'].' '.$res['Lname']); ?>" style="width:100%;" readonly/></td>
     <td class="tdc" style="background-color:#D2FFA6;"><?php echo $res['Emp_TotalFinalScore'];?></td>
	 <td class="tdc"><input class="tdinpl" value="<?php echo strtoupper($res3['Fname'].' '.$res3['Sname'].' '.$res3['Lname']); ?>" style="width:100%;" readonly/></td>
	 <td class="tdc" style="background-color:#D2FFA6;"><?php echo $res['Appraiser_TotalFinalScore'];?></td>
	 <td class="tdc"><input class="tdinpl" value="<?php echo strtoupper($res4['Fname'].' '.$res4['Sname'].' '.$res4['Lname']); ?><?php if($res['Rev2_EmployeeID']>0){echo '&nbsp;/&nbsp;'.strtoupper($res5['Fname'].' '.$res5['Sname'].' '.$res5['Lname']); } ?>" style="width:100%;" readonly /></td>
	 <td class="tdc" style="background-color:#D2FFA6;"><?php echo $res['Reviewer_TotalFinalScore'];?></td>
	 <td class="tdc" style="background-color:#D2FFA6;"><?php echo $res['Reviewer_TotalFinalRating'];?></td>				
	 
	 <?php /*?><td class="tdc"><script>function FunTgtAch(e,y){window.open("HodPmsTgtAch.php?e="+e+"&y="+y+"&grp=3","TcForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=800,height=600");}</script><?php if($res['HR_Curr_DepartmentId']==6){ echo '<span style="cursor:pointer;" onClick="FunTgtAch('.$res['EmployeeID'].','.$_SESSION['PmsYId'].')"><font color="#004A95"><u>click</u></span>'; }else{echo '';}?></td><?php */?>
	 
	 <td class="tdc"><input class="tdinp" id="HodScore_<?php echo $sno; ?>" style="background-color:#FFFFB7;height:100%;width:100%;font-weight:bold;" value="<?php if($res['Hod_TotalFinalScore']>0){echo $res['Hod_TotalFinalScore'];}else {echo $res['Reviewer_TotalFinalScore'];}?>" onKeyUp="EditSHod(<?php echo $sno; ?>)" onChange="EditSHod(<?php echo $sno; ?>)" maxlength="6" readonly/></td>
     <td class="tdc"><input class="tdinp" id="HodRating_<?php echo $sno; ?>" style="background-color:#FFFFB7;height:100%;width:100%;font-weight:bold;" value="<?php if($res['Hod_TotalFinalRating']==0){ echo $res['Reviewer_TotalFinalRating']; } if($res['Hod_TotalFinalRating']!=0){ echo $res['Hod_TotalFinalRating']; }?>" readonly/></td> 
	  <td class="tdc" valign="top"><input class="tdinpl" name="Reason_<?php echo $sno; ?>" id="Reason_<?php echo $sno; ?>" style="background-color:#FFFFB7;width:100%;height:100%;" value="<?php echo $resReas['Hod_Reason']; ?>" disabled maxlength="200"/></td>
	  
	  <td class="tdc">
      <SPAN id="SpanEdit_<?php echo $sno; ?>" style="cursor:pointer;">
      <?php if($res['HodSubmit_IncStatus']!=2){ ?><img src="images/edit.png" border="0" onClick="ClickEdit(<?php echo $sno; ?>)"/>&nbsp;&nbsp;<img src="images/go-back-icon.png" border="0" onClick="ClickResend(<?php echo $sno; ?>)"/><?php } ?></SPAN>
			
	   <SPAN id="SpanEditSave_<?php echo $sno; ?>" style="display:none;cursor:pointer;"><img src="images/Floppy-Small-icon.png" border="0" onClick="return ClickSaveEdit(<?php echo $sno.','.$res['EmpPmsId'].','.$res['EmployeeID']; ?>); EditSHod(<?php echo $sno; ?>);"></SPAN>
	   <SPAN id="SpanResendSave_<?php echo $sno; ?>" style="display:none;cursor:pointer;"><img src="images/Floppy-Small-icon.png" border="0" onClick="return ClickSaveResend(<?php echo $sno.','.$res['EmpPmsId'].','.$res['EmployeeID']; ?>)"></SPAN>
	   </td>
	  </tr>
	  </tbody>
	  </div>
<?php $sno++;} $no=$sno-1; echo '<input type="hidden" id="RowNo" value="'.$no.'" />';?> 
</table>
<?php } ?>

 




