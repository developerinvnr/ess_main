<?php session_start();
require_once('../AdminUser/config/config.php');
 
if($_POST['StDeptid'] OR $_POST['StHQid']) //$_POST['HQid'] OR 
{ 
 $d=$_POST['d']; $h=$_POST['h']; $s=$_POST['s']; $EmpId = $_POST['EmpId']; $YId = $_POST['YI'];  $CI=1;
 //echo $d.'-'.$h.'-'.$s.'-'.$EmpId.'-'.$YId; ?>
 
<?php $sL=mysql_query("select * from hrm_pms_setting where CompanyId=".$CI." AND Process='PMS'",$con); 
      $rL=mysql_fetch_assoc($sL);  ?>

 
<table border="1" id="table1" cellpadding="0" cellspacing="0" style="width:100%;">
   <div id="thead">
   <thead>
    <tr bgcolor="#7a6189" style="height:25px;">
	 <td class="th" style="width:3%;"><b>Sn</b></td>
	 <td class="th" style="width:4%;"><b>EC</b></td>
	 <td class="th" style="width:23%;"><b>Name</b></td>
	 <td class="th" style="width:10%;"><b>Department</b></td>
	 <td class="th" style="width:5%;"><b>Grade</b></td>
	 <?php if($rL['Show_GradeDesig']=='Y'){ ?>
	 <td class="th" style="width:22%;"><b>Designation</b></td>
	 <?php } ?>
	 <td class="th" style="width:8%;">HQ</td>
	 <td class="th" style="width:5%;">State</td>
<?php if($_SESSION['hEHform']=='Y'){ ?><td class="th" style="width:5%;"><b>His<br>tory</b></td><?php } ?>
<?php if($_SESSION['hEPform']=='Y'){ ?><td class="th" style="width:6%;"><b>Form</b></td><?php } ?>
    <?php if($_SESSION['eAppform']=='Y'){ ?>
	 <td class="th" style="width:4%;"><b>Files</b></td>
	 <!--<td class="th" style="width:4%;"><b>KRA xls</b></td>-->
	 <td class="th" style="width:5%;"><b>Resent</b></td>
	 <?php if($rL['ViewLeteer_hod']=='Y'){ ?>
	  <td class="th" style="width:5%;"><b>Appraisal<br>Letter</b></td>
	 <?php } ?>
	 <td class="th" style="width:5%;"><b>Employee</b></td>
	 <td class="th" style="width:5%;"><b>Appraiser</b></td>
	 <td class="th" style="width:5%;"><b>Reviewer</b></td>
	 <td class="th" style="width:5%;"><b>HOD</b></td>
	 <td class="th" style="width:5%;"><b>Manag<sup>t</sup></b></td>
	<?php } ?>
    </tr>
   </thead>
   </div>
<?php 
if($d>0 AND $s=='All')
{
 $sql=mysql_query("select e.EmployeeID, e.CompanyId, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateCode, EmpPmsId, Kra_filename, Kra_ext, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, HodSubmit_IncStatus, Appraiser_NoOfResend, Reviewer_NoOfResend, Hod_NoOfResend from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND p.AssessmentYear=".$YId." AND g.DepartmentId=".$d." AND p.HOD_EmployeeID=".$EmpId." order by EmpCode ASC", $con);
}
elseif($d>0 AND $s>0)
{
 $sql=mysql_query("select e.EmployeeID, e.CompanyId, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateCode, EmpPmsId, Kra_filename, Kra_ext, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, HodSubmit_IncStatus, Appraiser_NoOfResend, Reviewer_NoOfResend, Hod_NoOfResend from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND p.AssessmentYear=".$YId." AND g.DepartmentId=".$d." AND hq.StateId=".$s." AND p.HOD_EmployeeID=".$EmpId." order by EmpCode ASC", $con);
}
elseif($d=='All' AND $s>0)
{
 $sql=mysql_query("select e.EmployeeID, e.CompanyId, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateCode, EmpPmsId, Kra_filename, Kra_ext, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, HodSubmit_IncStatus, Appraiser_NoOfResend, Reviewer_NoOfResend, Hod_NoOfResend from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND p.AssessmentYear=".$YId." AND hq.StateId=".$s." AND p.HOD_EmployeeID=".$EmpId." order by EmpCode ASC", $con);
}
elseif($d=='All' AND $s=='All')
{
 $sql=mysql_query("select e.EmployeeID, e.CompanyId, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateCode, EmpPmsId, Kra_filename, Kra_ext, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, HodSubmit_IncStatus, Appraiser_NoOfResend, Reviewer_NoOfResend, Hod_NoOfResend from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND p.AssessmentYear=".$YId." AND p.HOD_EmployeeID=".$EmpId." order by EmpCode ASC", $con);
}
 
 $sno=1; while($res=mysql_fetch_array($sql))
 { 
$sqlR=mysql_query("select * from hrm_employee_pms_uploadfile where EmpPmsId=".$res['EmpPmsId']." AND EmployeeID=".$res['EmployeeID']." AND YearId=".$_POST['YI'], $con); $no=1; $resR=mysql_num_rows($sqlR);
if($res['Emp_PmsStatus']==0){$stE='Pending';}elseif($res['Emp_PmsStatus']==1){$stE='Pending';}elseif($res['Emp_PmsStatus']==2){$stE='Submitted';}
if($res['Appraiser_PmsStatus']==0){$stA='Draft';}elseif($res['Appraiser_PmsStatus']==1){$stA='Pending';}elseif($res['Appraiser_PmsStatus']==2){$stA='Approved';}elseif($res['Appraiser_PmsStatus']==3){$stA='Resent';}
if($res['Reviewer_PmsStatus']==0){$stR='Draft';}elseif($res['Reviewer_PmsStatus']==1){$stR='Pending';}elseif($res['Reviewer_PmsStatus']==2){$stR='Approved';}elseif($res['Reviewer_PmsStatus']==3){$stR='Resent';}
if($res['Rev2_PmsStatus']==0){$stH2='Draft';}elseif($res['Rev2_PmsStatus']==1){$stH2='Pending';}elseif($res['Rev2_PmsStatus']==2){$stH2='Approved';}elseif($res['Rev2_PmsStatus']==3){$stH2='Resent';}
if($res['HodSubmit_IncStatus']==0){$stH='Draft';}elseif($res['HodSubmit_IncStatus']==1){$stH='Pending';}elseif($res['HodSubmit_IncStatus']==2){$stH='Approved';}
?>   
   <div id="tbody">
     <tbody>
     <tr style="height:24px;background-color:#FFFFFF;">
	  <td class="tdc"><?php echo $sno; ?></td>
	  <td class="tdc"><?php echo $res['EmpCode']; ?></td>
	  <td class="tdl"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
      <td class="tdl"><?php echo $res['DepartmentCode'];?></td>
	  <td class="tdc"><?php echo $res['GradeValue'];?></td>	 
	  <?php if($rL['Show_GradeDesig']=='Y'){ ?>
	  <td class="tdl">&nbsp;<?php echo $res['DesigName'];?></td>
	  <?php } ?>
	  <td class="tdl"><?php echo $res['HqName'];?></td>				
	  <td class="tdc"><?php echo $res['StateCode'];?></td>
	  
	  <?php if($_SESSION['hEHform']=='Y'){ ?><td class="tdc"><a href="javascript:ReadHistory(<?php echo $res['EmployeeID']; ?>)">Click</a></td><?php } ?>
      <?php if($_SESSION['hEPform']=='Y'){ ?><td class="tdc"><?php if($res['Emp_PmsStatus']==2){ ?><a href="javascript:OpenWindow(<?php echo $res['EmployeeID'].','.$res['EmpPmsId'].','.$_POST['CI']; ?>)">Click</a> <?php }else{ echo 'Pending'; }?></td><?php } ?>
	  
	  <?php if($_SESSION['eAppform']=='Y'){ ?>
	  
	    <td class="tdc"><?php  if($resR>0){ ?><a href="#" onClick="UploadEmpfile(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>)">Yes</a><?php } if($resR==0){echo 'No'; }?></td>	
        <?php /*?><td class="tdc"><?php if($res['Kra_filename']!='' AND $res['Kra_ext']!=''){ ?><a href="#" onClick="UploadEmpKrafile(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>,'<?php echo $res['Kra_filename']; ?>','<?php echo $res['Kra_ext']; ?>')">Yes</a><?php } ?></td><?php */?>
		<td class="tdc"><?php $sum=$res['Appraiser_NoOfResend']+$res['Reviewer_NoOfResend']+$res['Hod_NoOfResend']; ?><?php if($sum>0){ ?><a href="#" onClick="ResentReason(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>)">Yes</a><?php } else { echo 'No'; }?></td>
		
		
<?php if($rL['ViewLeteer_hod']=='Y'){ ?>
<!-------------------------------------->
<!-------------------------------------->
<script type="text/javascript" language="javascript">
function LetterAllPdf(P,E,Y,C,R,G,D)
{window.open("pmsletter/VeiwAppAllPdf.php?action=All&test=true&rightform=false&cc=102&prp=55&rtr=%true%&ff=ok&P="+P+"&E="+E+"&Y="+Y+"&C="+C+"&R="+R+"&G="+G+"&D="+D+"&nn=1","AppLetter","scrollbars=yes,resizable=no,menubar=yes,width=820,height=750,location=no,directories=no");}
</script>
<?php $SqlP=mysql_query("select Hod_TotalFinalRating,Hod_EmpDesignation,Hod_EmpGrade,HR_CurrDesigId,HR_CurrGradeId,HR_DesigId,HR_GradeId from hrm_employee_pms where AssessmentYear=".$_SESSION['PmsYId']." AND EmployeeID=".$res['EmployeeID']." AND EmpPmsId=".$res['EmpPmsId'], $con); $ResP=mysql_fetch_assoc($SqlP);

if($ResP['HR_DesigId']>0){$qryD="DesigId=".$ResP['HR_DesigId'];}else{$qryD="DesigId=".$ResP['Hod_EmpDesignation'];}
if($ResP['HR_GradeId']>0){$qryG="GradeId=".$ResP['HR_GradeId'];}else{$qryG="GradeId=".$ResP['Hod_EmpGrade'];}

$sqlD=mysql_query("select DesigName,DesigId from hrm_designation where ".$qryD,$con); 
$sqlG=mysql_query("select GradeValue from hrm_grade where CompanyId=".$res['CompanyId']." AND ".$qryG,$con);

//$sqlD=mysql_query("select DesigName,DesigId from hrm_designation where DesigId=".$ResP['Hod_EmpDesignation'],$con); 
//$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResP['Hod_EmpGrade']." AND CompanyId=".$res['CompanyId'],$con);


$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResP['Hod_EmpGrade']." AND CompanyId=".$res['CompanyId'],$con); $sqlDe=mysql_query("select DesigName,DesigId from hrm_designation where DesigId=".$ResP['HR_CurrDesigId'], $con);
$sqlGr=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResP['HR_CurrGradeId']." AND CompanyId=".$res['CompanyId'],$con); $resD=mysql_fetch_assoc($sqlD); $resG=mysql_fetch_assoc($sqlG); $resGrade=mysql_fetch_assoc($sqlGrade);
$resDe=mysql_fetch_assoc($sqlDe); $resGr=mysql_fetch_assoc($sqlGr);

if($ResP['Hod_TotalFinalRating']>0){$EmpRating=$ResP['Hod_TotalFinalRating']; } else{$EmpRating=$ResP['Reviewer_TotalFinalRating']; }if($resG['GradeValue']==''){$EmpGrade=$resGr['GradeValue'];} else{$EmpGrade=$resG['GradeValue'];} if($resD['DesigId']==''){$Desig=$resDe['DesigId'];}else {$Desig=$resD['DesigId']; } ?>
<td class="tdc" style="text-align:center;"><a href="#" onClick="LetterAllPdf(<?php echo $res['EmpPmsId'].','.$res['EmployeeID'].','.$_SESSION['PmsYId'].','.$res['CompanyId'].','.$EmpRating; ?>,'<?php echo $EmpGrade; ?>',<?php echo $Desig; ?>)"><img src="images/AppLet.png" style="width:80px;height:20px;" border="0"/></a></td>
<!-------------------------------------->
<!-------------------------------------->	   
<?php } ?>		
		
		
		<td class="tdc" style="color:<?php if($stE=='Draft') {echo '#A40000'; }if($stE=='Pending') {echo '#36006C'; }if($stE=='Submitted') {echo '#005300'; }?>;"><?php echo $stE;?></td>  
        <td class="tdc" style="color:<?php if($stA=='Draft') {echo '#A40000'; }if($stA=='Pending') {echo '#36006C'; }if($stA=='Approved') {echo '#005300'; }if($stA=='Resent') {echo '#006AD5'; }?>;"><?php echo $stA;?></td>
        <td class="tdc" style="color:<?php if($stR=='Draft') {echo '#A40000'; }if($stR=='Pending') {echo '#36006C'; }if($stR=='Approved') {echo '#005300'; }if($stR=='Resent') {echo '#006AD5'; } ?>;"><?php echo $stR;?></td>
		<td class="tdc" style="color:<?php if($stH2=='Draft') {echo '#A40000'; }if($stH2=='Pending') {echo '#36006C'; }if($stH2=='Approved') {echo '#005300'; }?>;"><?php echo $stH2;?></td>     	
        <td class="tdc" style="color:<?php if($stH=='Draft') {echo '#A40000'; }if($stH=='Pending') {echo '#36006C'; }if($stH=='Approved') {echo '#005300'; }?>;"><?php echo $stH;?></td>
		
	  <?php } ?>
	 </tr>
	 </tbody>
	 </div>
<?php $sno++;} ?>		
</table>	 	
<?php } ?>



