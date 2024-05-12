<?php session_start();
require_once('../AdminUser/config/config.php');
if(isset($_POST['HQid']) && $_POST['HQid']!="" && $_POST['Action']=='HqFilter')
{ 
$HQid = $_POST['HQid']; $EmpId = $_POST['EmpId']; $YI = $_POST['YI']; $CI = $_POST['CI']; ?>

<?php 
 $sL=mysql_query("select * from hrm_pms_setting where CompanyId=".$CI." AND Process='PMS'",$con); 
 $rL=mysql_fetch_assoc($sL);      
 $sLemp=mysql_query("select * from hrm_pms_allow_letter where EmployeeID=".$EmpId,$con); 
 $rowLemp=mysql_num_rows($sLemp); $rLemp=mysql_fetch_assoc($sLemp); 
?>

<table border="1" id="table1" cellpadding="0" cellspacing="0" style="width:100%;">
	<div class="thead">
	<thead>
	 <tr bgcolor="#7a6189" style="height:25px;">
	  <td class="th" style="width:3%;"><b>Sn</b></td>
	  <td class="th" style="width:4%;"><b>EC</b></td>
	  <td class="th" style="width:18%;"><b>Name</b></td>
	  <td class="th" style="width:8%;"><b>Department</b></td>
	 <?php if($rL['Show_GradeDesig']=='Y'){ ?>
	  <td class="th" style="width:18%;"><b>Designation</b></td>
	  <td class="th" style="width:4%;"><b>Grade</b></td>
	 <?php } ?>
	  <td class="th" style="width:10%;"><b>Head Quater</b></td>
	  <!--<td class="th" style="width:10%;"><b>State</b></td>-->
	  <td class="th" style="width:10%;"><b>Appraiser</b></td>
	  <td class="th" style="width:10%;"><b>Reviewer</b></td>
	  <?php if($rL['ViewLeteer_rev2']=='Y' && $rowLemp>0 && $rLemp['HOD']=='1'){  ?>
	  <td class="th" style="width:5%;"><b>Appraisal<br>Letter</b></td>
	  <?php } ?>
<?php if($_SESSION['rEKform']=='Y'){ ?><td class="th" style="width:4%;"><b>KRA</b></td>
<?php }if($_SESSION['rEHform']=='Y'){ ?><td class="th" style="width:4%;"><b>History</b></td>
<?php }if($_SESSION['rEPform']=='Y'){ ?><td class="th" style="width:4%;"><b>Form</b></td><?php } ?>
     </tr>
	</thead>
	</div>
<?php if($HQid=='All'){ $sql=mysql_query("select e.EmployeeID, e.CompanyId, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateName, EmpPmsId, Emp_PmsStatus, Appraiser_EmployeeID, Appraiser_PmsStatus, Reviewer_EmployeeID, Reviewer_PmsStatus from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND p.AssessmentYear=".$YI." AND p.Rev2_EmployeeID=".$EmpId, $con); }
else{ $sql=mysql_query("select e.EmployeeID, e.CompanyId, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateName, EmpPmsId, Emp_PmsStatus, Appraiser_EmployeeID, Appraiser_PmsStatus, Reviewer_EmployeeID, Reviewer_PmsStatus from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND g.HqId=".$HQid." AND p.AssessmentYear=".$YI." AND p.Rev2_EmployeeID=".$EmpId, $con); }

$sno=1; while($res=mysql_fetch_array($sql)){ ?>
   
     <div class="tbody">
	 <tbody> 		
	  <tr style="height:22px;background-color:#FFFFFF;">
	   <td class="tdc"><?php echo $sno; ?></td>
	   <td class="tdc"><?php echo $res['EmpCode']; ?></td>
	   <td class="tdl">&nbsp;<?php echo strtoupper($res['Fname'].' '.$res['Sname'].' '.$res['Lname']); ?></td>
       <td class="tdl">&nbsp;<?php echo strtoupper($res['DepartmentCode']);?></td>
      
      <?php if($rL['Show_GradeDesig']=='Y'){ ?>
	   <td class="tdl">&nbsp;<?php echo strtoupper($res['DesigName']);?></td>					
	   <td class="tdc"><?php echo $res['GradeValue'];?></td>
	  <?php } ?>
	   
	   
	   <td class="tdl">&nbsp;<?php echo strtoupper($res['HqName']);?></td>				
	   <?php /*?><td class="tdl">&nbsp;<?php echo strtoupper($res['StateName']);?></td><?php */?>
<?php $sql6=mysql_query("select * from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'],$con); 
      $sql7=mysql_query("select * from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'],$con); 
      $res6=mysql_fetch_assoc($sql6); $res7=mysql_fetch_assoc($sql7); ?>					
	   <td class="tdl">&nbsp;<?php echo $res6['Fname'].' '.$res6['Sname'].' '.$res6['Lname']; ?></td>
	   <td class="tdl">&nbsp;<?php echo $res7['Fname'].' '.$res7['Sname'].' '.$res7['Lname']; ?></td>	

<?php if($rL['ViewLeteer_rev2']=='Y' && $rowLemp>0 && $rLemp['HOD']=='1'){  ?>
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
	   	
<?php if($_SESSION['rEKform']=='Y'){ ?><td class="tdc"><a href="#" onClick="EmpKRA(<?php echo $CI.', '.$_SESSION['PmsYId'].','.$res['EmployeeID']; ?>)">Click</a></td>
<?php } if($_SESSION['rEHform']=='Y'){ ?><td class="tdc"><a href="javascript:ReadHistory(<?php echo $res['EmployeeID']; ?>)">Click</a></td>
<?php } if($_SESSION['rEPform']=='Y'){ ?><td class="tdc"><?php if($res['Reviewer_PmsStatus']==2){?><a href="javascript:OpenWindow(<?php echo $res['EmpPmsId'].','.$CI; ?>)">Click</a> <?php } ?></td>
<?php } ?>			
	   </tr>
	  </tbody>
	  </div>
<?php $sno++;} ?>		
</table>
	 	
<?php } elseif(isset($_POST['StHQid']) && $_POST['StHQid']!="" && $_POST['Action']=='StateFilter')
{ 
$StHQid = $_POST['StHQid']; $EmpId = $_POST['EmpId']; $YI = $_POST['YI']; $CI = $_POST['CI']; ?>

<?php 
 $sL=mysql_query("select * from hrm_pms_setting where CompanyId=".$CI." AND Process='PMS'",$con); 
 $rL=mysql_fetch_assoc($sL);      
 $sLemp=mysql_query("select * from hrm_pms_allow_letter where EmployeeID=".$EmpId,$con); 
 $rowLemp=mysql_num_rows($sLemp); $rLemp=mysql_fetch_assoc($sLemp); 
?>

<table border="1" id="table1" cellpadding="0" cellspacing="0" style="width:100%;">
	<div class="thead">
	<thead>
	 <tr bgcolor="#7a6189" style="height:25px;">
	  <td class="th" style="width:3%;"><b>Sn</b></td>
	  <td class="th" style="width:4%;"><b>EC</b></td>
	  <td class="th" style="width:18%;"><b>Name</b></td>
	  <td class="th" style="width:8%;"><b>Department</b></td>
	  <?php if($rL['Show_GradeDesig']=='Y'){ ?>
	  <td class="th" style="width:18%;"><b>Designation</b></td>
	  <td class="th" style="width:4%;"><b>Grade</b></td>
	 <?php } ?>
	  <td class="th" style="width:10%;"><b>Head Quater</b></td>
	  <!--<td class="th" style="width:10%;"><b>State</b></td>-->
	  <td class="th" style="width:10%;"><b>Appraiser</b></td>
	  <td class="th" style="width:10%;"><b>Reviewer</b></td>
	  <?php if($rL['ViewLeteer_rev2']=='Y' && $rowLemp>0 && $rLemp['HOD']=='1'){  ?>
	  <td class="th" style="width:5%;"><b>Appraisal<br>Letter</b></td>
	  <?php } ?>
<?php if($_SESSION['rEKform']=='Y'){ ?><td class="th" style="width:4%;"><b>KRA</b></td>
<?php }if($_SESSION['rEHform']=='Y'){ ?><td class="th" style="width:4%;"><b>History</b></td>
<?php }if($_SESSION['rEPform']=='Y'){ ?><td class="th" style="width:4%;"><b>Form</b></td><?php } ?>
     </tr>
	</thead>
	</div>
<?php if($StHQid=='All'){ $sql=mysql_query("select e.EmployeeID, e.CompanyId, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateName, EmpPmsId, Emp_PmsStatus, Appraiser_EmployeeID, Appraiser_PmsStatus, Reviewer_EmployeeID, Reviewer_PmsStatus from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND p.AssessmentYear=".$YI." AND p.Rev2_EmployeeID=".$EmpId, $con); }
else{ $sql=mysql_query("select e.EmployeeID, e.CompanyId, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateName, EmpPmsId, Emp_PmsStatus, Appraiser_EmployeeID, Appraiser_PmsStatus, Reviewer_EmployeeID, Reviewer_PmsStatus from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND hq.StateId=".$StHQid." AND p.AssessmentYear=".$YI." AND p.Rev2_EmployeeID=".$EmpId, $con); }
$sno=1; while($res=mysql_fetch_array($sql)){ ?>
   
     <div class="tbody">
	 <tbody> 		
	  <tr style="height:22px;background-color:#FFFFFF;">
	   <td class="tdc"><?php echo $sno; ?></td>
	   <td class="tdc"><?php echo $res['EmpCode']; ?></td>
	   <td class="tdl">&nbsp;<?php echo strtoupper($res['Fname'].' '.$res['Sname'].' '.$res['Lname']); ?></td>
       <td class="tdl">&nbsp;<?php echo strtoupper($res['DepartmentCode']);?></td>
       
       <?php if($rL['Show_GradeDesig']=='Y'){ ?>
	   <td class="tdl">&nbsp;<?php echo strtoupper($res['DesigName']);?></td>					
	   <td class="tdc"><?php echo $res['GradeValue'];?></td>
	   <?php } ?>
	  
	   <td class="tdl">&nbsp;<?php echo strtoupper($res['HqName']);?></td>				
	   <?php /*?><td class="tdl">&nbsp;<?php echo strtoupper($res['StateName']);?></td><?php */?>
<?php $sql6=mysql_query("select * from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'],$con); 
      $sql7=mysql_query("select * from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'],$con); 
      $res6=mysql_fetch_assoc($sql6); $res7=mysql_fetch_assoc($sql7); ?>					
	   <td class="tdl">&nbsp;<?php echo $res6['Fname'].' '.$res6['Sname'].' '.$res6['Lname']; ?></td>
	   <td class="tdl">&nbsp;<?php echo $res7['Fname'].' '.$res7['Sname'].' '.$res7['Lname']; ?></td>	

<?php if($rL['ViewLeteer_rev2']=='Y' && $rowLemp>0 && $rLemp['HOD']=='1'){  ?>
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
	   	
<?php if($_SESSION['rEKform']=='Y'){ ?><td class="tdc"><a href="#" onClick="EmpKRA(<?php echo $CI.', '.$_SESSION['PmsYId'].','.$res['EmployeeID']; ?>)">Click</a></td>
<?php } if($_SESSION['rEHform']=='Y'){ ?><td class="tdc"><a href="javascript:ReadHistory(<?php echo $res['EmployeeID']; ?>)">Click</a></td>
<?php } if($_SESSION['rEPform']=='Y'){ ?><td class="tdc"><?php if($res['Reviewer_PmsStatus']==2){?><a href="javascript:OpenWindow(<?php echo $res['EmpPmsId'].','.$CI; ?>)">Click</a> <?php } ?></td>
<?php } ?>			
	   </tr>
	  </tbody>
	  </div>
<?php $sno++;} ?>		
</table>


<?php }elseif(isset($_POST['Deptid']) && $_POST['Deptid']!="" && $_POST['Action']=='DeptFilter')
{ 
$Deptid = $_POST['Deptid']; $EmpId = $_POST['EmpId']; $YI = $_POST['YI']; $CI = $_POST['CI']; ?>

<?php 
 $sL=mysql_query("select * from hrm_pms_setting where CompanyId=".$CI." AND Process='PMS'",$con); 
 $rL=mysql_fetch_assoc($sL);      
 $sLemp=mysql_query("select * from hrm_pms_allow_letter where EmployeeID=".$EmpId,$con); 
 $rowLemp=mysql_num_rows($sLemp); $rLemp=mysql_fetch_assoc($sLemp); 
?>

<table border="1" id="table1" cellpadding="0" cellspacing="0" style="width:100%;">
	<div class="thead">
	<thead>
	 <tr bgcolor="#7a6189" style="height:25px;">
	  <td class="th" style="width:3%;"><b>Sn</b></td>
	  <td class="th" style="width:4%;"><b>EC</b></td>
	  <td class="th" style="width:18%;"><b>Name</b></td>
	  <td class="th" style="width:8%;"><b>Department</b></td>
	 <?php if($rL['Show_GradeDesig']=='Y'){ ?>
	  <td class="th" style="width:18%;"><b>Designation</b></td>
	  <td class="th" style="width:4%;"><b>Grade</b></td>
	 <?php } ?>
	  <td class="th" style="width:10%;"><b>Head Quater</b></td>
	  <!--<td class="th" style="width:10%;"><b>State</b></td>-->
	  <td class="th" style="width:10%;"><b>Appraiser</b></td>
	  <td class="th" style="width:10%;"><b>Reviewer</b></td>
	 <?php if($rL['ViewLeteer_rev2']=='Y' && $rowLemp>0 && $rLemp['HOD']=='1'){  ?>
	  <td class="th" style="width:5%;"><b>Appraisal<br>Letter</b></td>
	  <?php } ?>
<?php if($_SESSION['rEKform']=='Y'){ ?><td class="th" style="width:4%;"><b>KRA</b></td>
<?php }if($_SESSION['rEHform']=='Y'){ ?><td class="th" style="width:4%;"><b>History</b></td>
<?php }if($_SESSION['rEPform']=='Y'){ ?><td class="th" style="width:4%;"><b>Form</b></td><?php } ?>
     </tr>
	</thead>
	</div>
<?php if($Deptid=='All'){ $sql=mysql_query("select e.EmployeeID, e.CompanyId, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateName, EmpPmsId, Emp_PmsStatus, Appraiser_EmployeeID, Appraiser_PmsStatus, Reviewer_EmployeeID, Reviewer_PmsStatus from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND p.AssessmentYear=".$YI." AND p.Rev2_EmployeeID=".$EmpId, $con); }
else{ $sql=mysql_query("select e.EmployeeID, e.CompanyId, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateName, EmpPmsId, Emp_PmsStatus, Appraiser_EmployeeID, Appraiser_PmsStatus, Reviewer_EmployeeID, Reviewer_PmsStatus from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND g.DepartmentId=".$Deptid." AND p.AssessmentYear=".$YI." AND p.Rev2_EmployeeID=".$EmpId, $con); }

$sno=1; while($res=mysql_fetch_array($sql)){ ?>
   
     <div class="tbody">
	 <tbody> 		
	  <tr style="height:22px;background-color:#FFFFFF;">
	   <td class="tdc"><?php echo $sno; ?></td>
	   <td class="tdc"><?php echo $res['EmpCode']; ?></td>
	   <td class="tdl">&nbsp;<?php echo strtoupper($res['Fname'].' '.$res['Sname'].' '.$res['Lname']); ?></td>
       <td class="tdl">&nbsp;<?php echo strtoupper($res['DepartmentCode']);?></td>
       
       <?php if($rL['Show_GradeDesig']=='Y'){ ?>
	   <td class="tdl">&nbsp;<?php echo strtoupper($res['DesigName']);?></td>					
	   <td class="tdc"><?php echo $res['GradeValue'];?></td>
	   <?php } ?>
	   
	   <td class="tdl">&nbsp;<?php echo strtoupper($res['HqName']);?></td>				
	   <?php /*?><td class="tdl">&nbsp;<?php echo strtoupper($res['StateName']);?></td><?php */?>
<?php $sql6=mysql_query("select * from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'],$con); 
      $sql7=mysql_query("select * from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'],$con); 
      $res6=mysql_fetch_assoc($sql6); $res7=mysql_fetch_assoc($sql7); ?>					
	   <td class="tdl">&nbsp;<?php echo $res6['Fname'].' '.$res6['Sname'].' '.$res6['Lname']; ?></td>
	   <td class="tdl">&nbsp;<?php echo $res7['Fname'].' '.$res7['Sname'].' '.$res7['Lname']; ?></td>	

<?php if($rL['ViewLeteer_rev2']=='Y' && $rowLemp>0 && $rLemp['HOD']=='1'){  ?>
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
	   	
<?php if($_SESSION['rEKform']=='Y'){ ?><td class="tdc"><a href="#" onClick="EmpKRA(<?php echo $CI.', '.$_SESSION['PmsYId'].','.$res['EmployeeID']; ?>)">Click</a></td>
<?php } if($_SESSION['rEHform']=='Y'){ ?><td class="tdc"><a href="javascript:ReadHistory(<?php echo $res['EmployeeID']; ?>)">Click</a></td>
<?php } if($_SESSION['rEPform']=='Y'){ ?><td class="tdc"><?php if($res['Reviewer_PmsStatus']==2){?><a href="javascript:OpenWindow(<?php echo $res['EmpPmsId'].','.$CI; ?>)">Click</a> <?php } ?></td>
<?php } ?>			
	   </tr>
	  </tbody>
	  </div>
<?php $sno++;} ?>		
</table>

	 	
<?php }elseif(isset($_POST['Deptid2']) && $_POST['Deptid2']!="" && $_POST['Action']=='DeptStsFilter')
{ $Dept = $_POST['Deptid2']; $EmpId = $_POST['EmpId2']; $YI = $_POST['YId2']; $CI = $_POST['CI']; ?>

<?php $sqlSetH=mysql_query("select * from hrm_pms_setting where CompanyId=".$_POST['CI']." AND Process='PMS' ", $con);  
      $resSetH=mysql_fetch_array($sqlSetH); ?>

<table border="1" id="table11" cellpadding="0" cellspacing="0" style="width:100%;">
   <div id="thead">
   <thead>
    <tr bgcolor="#7a6189" style="height:25px;">
	 <td rowspan="2" class="th" style="width:3%;"><b>Sn</b></td>
	 <td rowspan="2" class="th" style="width:4%;"><b>EC</b></td>
	 <td rowspan="2" class="th" style="width:20%;"><b>Name</b></td>
	 <td rowspan="2" class="th" style="width:8%;"><b>Department</b></td>
	 <?php if($resSetH['Show_GradeDesig']=='Y'){ /*?>
	 <td rowspan="2" class="th" style="width:22%;"><b>Designation</b></td>
	 <?php */ }  ?>
	 <td rowspan="2" class="th" style="width:8%;">HQ</td>
	 <?php /*<td rowspan="2" class="th" style="width:10%;">State</td>*/ ?>
	 <td rowspan="2" class="th" style="width:4%;"><b>Form</b></td>
	 <td rowspan="2" class="th" style="width:4%;"><b>Files</b></td>
	 <!--<td rowspan="2" class="th" style="width:4%;"><b>KRA xls</b></td>-->
	 <td colspan="2" class="th" style="width:5%;"><b>Employee</b></td>
	 <td colspan="2" class="th" style="width:5%;"><b>Appraiser</b></td>
	 <td colspan="2" class="th" style="width:5%;"><b>Reviewer</b></td>
	<?php if($_SESSION['eAppform']=='Y'){ ?>
	 <td rowspan="2" class="th" style="width:5%;"><b>HOD</b></td>
	<?php } ?>
	 <td rowspan="2" class="th" style="width:8%;"><b>Action</b></td>
    </tr>
    <tr bgcolor="#7a6189" style="height:25px;">
	 <td class="th" style="width:5%;"><b>Sts</b></td>
	 <td class="th" style="width:5%;"><b>Rating</b></td>
	 <td class="th" style="width:5%;"><b>Sts</b></td>
	 <td class="th" style="width:5%;"><b>Rating</b></td>
	 <td class="th" style="width:5%;"><b>Sts</b></td>
	 <td class="th" style="width:5%;"><b>Rating</b></td>
    </tr>
   </thead>
   </div>
<?php if($Dept=='All'){ $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateName, EmpPmsId, Kra_filename, Kra_ext, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, Rev2_PmsStatus, Emp_TotalFinalRating, Appraiser_TotalFinalRating, Reviewer_TotalFinalRating from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND p.AssessmentYear=".$YI." AND p.Rev2_EmployeeID=".$EmpId, $con); }else{ $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateName, EmpPmsId, Kra_filename, Kra_ext, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, Rev2_PmsStatus, Emp_TotalFinalRating, Appraiser_TotalFinalRating, Reviewer_TotalFinalRating from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND p.HR_Curr_DepartmentId=".$Dept." AND p.AssessmentYear=".$YI." AND p.Rev2_EmployeeID=".$EmpId, $con); }
$sno=1; while($res=mysql_fetch_array($sql)){
$sqlR=mysql_query("select * from hrm_employee_pms_uploadfile where EmpPmsId=".$res['EmpPmsId']." AND EmployeeID=".$res['EmployeeID']." AND YearId=".$_SESSION['PmsYId'], $con); $no=1; $resR=mysql_num_rows($sqlR);

if($res['Emp_PmsStatus']==0){$st='Draft';}elseif($res['Emp_PmsStatus']==1){$st='Pending';}elseif($res['Emp_PmsStatus']==2){$st='Submitted';}
if($res['Appraiser_PmsStatus']==0){$stM='Draft';}elseif($res['Appraiser_PmsStatus']==1){$stM='Pending';}elseif($res['Appraiser_PmsStatus']==2){$stM='Approved';}elseif($res['Appraiser_PmsStatus']==3){$stM='Resent';}
if($res['Reviewer_PmsStatus']==0){$stH='Draft';}elseif($res['Reviewer_PmsStatus']==1){$stH='Pending';}elseif($res['Reviewer_PmsStatus']==2){$stH='Approved';}elseif($res['Reviewer_PmsStatus']==3){$stH='Resent';}
if($res['Rev2_PmsStatus']==0){$stH2='Draft';}elseif($res['Rev2_PmsStatus']==1){$stH2='Pending';}elseif($res['Rev2_PmsStatus']==2){$stH2='Approved';}elseif($res['Rev2_PmsStatus']==3){$stH2='Resent';}
?>   <div id="tbody">
     <tbody>
     <tr style="height:22px;background-color:#FFFFFF;">
	  <td class="tdc"><?php echo $sno; ?></td>
	  <td class="tdc"><?php echo $res['EmpCode']; ?></td>
	  <td class="tdl">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
      <td class="tdl">&nbsp;<?php echo $res['DepartmentCode'];?></td>
      <?php if($resSetH['Show_GradeDesig']=='Y'){ /* ?>
	  <td class="tdl">&nbsp;<?php echo $res['DesigName'];?></td>
	  <?php */ } ?>
	  <td class="tdl">&nbsp;<?php echo $res['HqName'];?></td>				
	  <?php /*<td class="tdl">&nbsp;<?php echo $res['StateName'];?></td>*/ ?>
	  
	  <td class="tdc"><?php if($res['Emp_PmsStatus']==2){ ?><a href="javascript:OpenWindow(<?php echo $res['EmpPmsId'].','.$CI; ?>)">Click</a><?php }else{ echo 'Wait'; }?></td>
	  <td class="tdc"><?php if($resR>0){ ?><a href="#" onClick="UploadEmpfile(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>)">Yes</a><?php }if($resR==0){echo 'No'; }?></td>
	  <?php /*?><td class="tdc"><?php if($res['Kra_filename']!='' AND $res['Kra_ext']!=''){ ?><a href="#" onClick="UploadEmpKrafile(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>,'<?php echo $res['Kra_filename']; ?>','<?php echo $res['Kra_ext']; ?>')">Yes</a><?php }?></td><?php */?>
	  
      <td class="tdc" style="color:<?php if($st=='Draft'){echo '#A40000'; }if($st=='Pending') {echo '#36006C'; }if($st=='Submitted') {echo '#005300'; }?>;background-color:#FFFFB9;" ><?php echo $st;?></td>
	  <td class="tdc" style="background-color:#FFFFB9;"><?php echo $res['Emp_TotalFinalRating'];?></td>
	  
	  <td class="tdc" style="color:<?php if($stM=='Draft'){echo '#A40000'; }if($stM=='Pending'){echo '#36006C'; }if($stM=='Approved'){echo '#005300'; }if($stM=='Resent'){echo '#006AD5'; }?>;background-color:#C4E1FF;"><?php echo $stM;?></td>
	  <td class="tdc" style="background-color:#C4E1FF;"><?php echo $res['Appraiser_TotalFinalRating'];?></td>
	  
      <td class="tdc" style="color:<?php if($stH=='Draft') {echo '#A40000'; }if($stH=='Pending') {echo '#36006C'; }if($stH=='Approved') {echo '#005300'; }if($stH=='Resent') {echo '#006AD5'; }?>;background-color:#CDFF9B;"><?php echo $stH;?></td>
	  <td class="tdc" style="background-color:#CDFF9B;"><?php echo $res['Reviewer_TotalFinalRating'];?></td>
	  
	  
<?php if($_SESSION['eAppform']=='Y'){ ?><td class="tdc" style="color:<?php if($stH2=='Draft') {echo '#A40000'; }if($stH2=='Pending') {echo '#36006C'; }if($stH2=='Approved') {echo '#005300'; }if($stH2=='Resent') {echo '#006AD5'; }?>;"><?php echo $stH2;?></td><?php } ?>
	  <td class="tdc"><?php if($res['Emp_PmsStatus']==2 AND $res['Appraiser_PmsStatus']==2 AND $res['Reviewer_PmsStatus']==2 AND $res['Rev2_PmsStatus']!=2) { ?><select class="tdsel" onChange="edit(this.value,<?php echo $res['EmployeeID'].','.$_SESSION['PmsYId']; ?>)"><option value="0">Select</option><option value="1">Approved</option><option value="2">Resend Form</option></select><?php } ?></td>
	  
	 </tr>
	 </tbody>
	 </div>
<?php $sno++;} ?>		
</table>	

<?php }elseif(isset($_POST['HQid2']) && $_POST['HQid2']!="" && $_POST['Action']=='HqStsFilter')
{ $HQid = $_POST['HQid2']; $EmpId = $_POST['EmpId2']; $YId = $_POST['YId2']; $CI = $_POST['CI']; ?>	 

<?php $sqlSetH=mysql_query("select * from hrm_pms_setting where CompanyId=".$_POST['CI']." AND Process='PMS' ", $con);  
      $resSetH=mysql_fetch_array($sqlSetH); ?>

<table border="1" id="table11" cellpadding="0" cellspacing="0" style="width:100%;">
   <div id="thead">
   <thead>
    <tr bgcolor="#7a6189" style="height:25px;">
	 <td rowspan="2" class="th" style="width:3%;"><b>Sn</b></td>
	 <td rowspan="2" class="th" style="width:4%;"><b>EC</b></td>
	 <td rowspan="2" class="th" style="width:20%;"><b>Name</b></td>
	 <td rowspan="2" class="th" style="width:8%;"><b>Department</b></td>
	 <?php if($resSetH['Show_GradeDesig']=='Y'){ /* ?>
	 <td rowspan="2" class="th" style="width:22%;"><b>Designation</b></td>
	 <?php */ } ?>
	 <td rowspan="2" class="th" style="width:8%;">HQ</td>
	 <?php /*<td rowspan="2" class="th" style="width:10%;">State</td>*/ ?>
	 <td rowspan="2" class="th" style="width:4%;"><b>Form</b></td>
	 <td rowspan="2" class="th" style="width:4%;"><b>Files</b></td>
	 <!--<td rowspan="2" class="th" style="width:4%;"><b>KRA xls</b></td>-->
	 <td colspan="2" class="th" style="width:5%;"><b>Employee</b></td>
	 <td colspan="2" class="th" style="width:5%;"><b>Appraiser</b></td>
	 <td colspan="2" class="th" style="width:5%;"><b>Reviewer</b></td>
	<?php if($_SESSION['eAppform']=='Y'){ ?>
	 <td rowspan="2" class="th" style="width:5%;"><b>HOD</b></td>
	<?php } ?>
	 <td rowspan="2" class="th" style="width:8%;"><b>Action</b></td>
    </tr>
    <tr bgcolor="#7a6189" style="height:25px;">
	 <td class="th" style="width:5%;"><b>Sts</b></td>
	 <td class="th" style="width:5%;"><b>Rating</b></td>
	 <td class="th" style="width:5%;"><b>Sts</b></td>
	 <td class="th" style="width:5%;"><b>Rating</b></td>
	 <td class="th" style="width:5%;"><b>Sts</b></td>
	 <td class="th" style="width:5%;"><b>Rating</b></td>
    </tr>
   </thead>
   </div>
<?php if($HQid=='All'){ $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateName, EmpPmsId, Kra_filename, Kra_ext, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, Rev2_PmsStatus, Emp_TotalFinalRating, Appraiser_TotalFinalRating, Reviewer_TotalFinalRating from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND p.AssessmentYear=".$YId." AND p.Rev2_EmployeeID=".$EmpId, $con); }else{ $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateName, EmpPmsId, Kra_filename, Kra_ext, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, Rev2_PmsStatus, Emp_TotalFinalRating, Appraiser_TotalFinalRating, Reviewer_TotalFinalRating from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND g.HqId=".$HQid." AND p.AssessmentYear=".$YId." AND p.Rev2_EmployeeID=".$EmpId, $con); }
$sno=1; while($res=mysql_fetch_array($sql)){
$sqlR=mysql_query("select * from hrm_employee_pms_uploadfile where EmpPmsId=".$res['EmpPmsId']." AND EmployeeID=".$res['EmployeeID']." AND YearId=".$_SESSION['PmsYId'], $con); $no=1; $resR=mysql_num_rows($sqlR);

if($res['Emp_PmsStatus']==0){$st='Draft';}elseif($res['Emp_PmsStatus']==1){$st='Pending';}elseif($res['Emp_PmsStatus']==2){$st='Submitted';}
if($res['Appraiser_PmsStatus']==0){$stM='Draft';}elseif($res['Appraiser_PmsStatus']==1){$stM='Pending';}elseif($res['Appraiser_PmsStatus']==2){$stM='Approved';}elseif($res['Appraiser_PmsStatus']==3){$stM='Resent';}
if($res['Reviewer_PmsStatus']==0){$stH='Draft';}elseif($res['Reviewer_PmsStatus']==1){$stH='Pending';}elseif($res['Reviewer_PmsStatus']==2){$stH='Approved';}elseif($res['Reviewer_PmsStatus']==3){$stH='Resent';}
if($res['Rev2_PmsStatus']==0){$stH2='Draft';}elseif($res['Rev2_PmsStatus']==1){$stH2='Pending';}elseif($res['Rev2_PmsStatus']==2){$stH2='Approved';}elseif($res['Rev2_PmsStatus']==3){$stH2='Resent';}
?>   <div id="tbody">
     <tbody>
     <tr style="height:22px;background-color:#FFFFFF;">
	  <td class="tdc"><?php echo $sno; ?></td>
	  <td class="tdc"><?php echo $res['EmpCode']; ?></td>
	  <td class="tdl">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
      <td class="tdl">&nbsp;<?php echo $res['DepartmentCode'];?></td>
      <?php if($resSetH['Show_GradeDesig']=='Y'){ /* ?>
	  <td class="tdl">&nbsp;<?php echo $res['DesigName'];?></td>
	  <?php */ } ?>
	  <td class="tdl">&nbsp;<?php echo $res['HqName'];?></td>				
	  <?php /*<td class="tdl">&nbsp;<?php echo $res['StateName'];?></td>*/ ?>
	  
	  <td class="tdc"><?php if($res['Emp_PmsStatus']==2){ ?><a href="javascript:OpenWindow(<?php echo $res['EmpPmsId'].','.$CI; ?>)">Click</a><?php }else{ echo 'Wait'; }?></td>
	  <td class="tdc"><?php if($resR>0){ ?><a href="#" onClick="UploadEmpfile(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>)">Yes</a><?php }if($resR==0){echo 'No'; }?></td>
	  <?php /*?><td class="tdc"><?php if($res['Kra_filename']!='' AND $res['Kra_ext']!=''){ ?><a href="#" onClick="UploadEmpKrafile(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>,'<?php echo $res['Kra_filename']; ?>','<?php echo $res['Kra_ext']; ?>')">Yes</a><?php }?></td><?php */?>
	  
      <td class="tdc" style="color:<?php if($st=='Draft'){echo '#A40000'; }if($st=='Pending') {echo '#36006C'; }if($st=='Submitted') {echo '#005300'; }?>;background-color:#FFFFB9;" ><?php echo $st;?></td>
	  <td class="tdc" style="background-color:#FFFFB9;"><?php echo $res['Emp_TotalFinalRating'];?></td>
	  
	  <td class="tdc" style="color:<?php if($stM=='Draft'){echo '#A40000'; }if($stM=='Pending'){echo '#36006C'; }if($stM=='Approved'){echo '#005300'; }if($stM=='Resent'){echo '#006AD5'; }?>;background-color:#C4E1FF;"><?php echo $stM;?></td>
	  <td class="tdc" style="background-color:#C4E1FF;"><?php echo $res['Appraiser_TotalFinalRating'];?></td>
	  
      <td class="tdc" style="color:<?php if($stH=='Draft') {echo '#A40000'; }if($stH=='Pending') {echo '#36006C'; }if($stH=='Approved') {echo '#005300'; }if($stH=='Resent') {echo '#006AD5'; }?>;background-color:#CDFF9B;"><?php echo $stH;?></td>
	  <td class="tdc" style="background-color:#CDFF9B;"><?php echo $res['Reviewer_TotalFinalRating'];?></td>
	  
<?php if($_SESSION['eAppform']=='Y'){ ?><td class="tdc" style="color:<?php if($stH2=='Draft') {echo '#A40000'; }if($stH2=='Pending') {echo '#36006C'; }if($stH2=='Approved') {echo '#005300'; }if($stH2=='Resent') {echo '#006AD5'; }?>;"><?php echo $stH2;?></td><?php } ?>
	  <td class="tdc"><?php if($res['Emp_PmsStatus']==2 AND $res['Appraiser_PmsStatus']==2 AND $res['Reviewer_PmsStatus']==2 AND $res['Rev2_PmsStatus']!=2) { ?><select class="tdsel" onChange="edit(this.value,<?php echo $res['EmployeeID'].','.$_SESSION['PmsYId']; ?>)"><option value="0">Select</option><option value="1">Approved</option><option value="2">Resend Form</option></select><?php } ?></td>
	  
	 </tr>
	 </tbody>
	 </div>
<?php $sno++;} ?>		
</table>

<?php }elseif(isset($_POST['StHQid2']) && $_POST['StHQid2']!="" && $_POST['Action']=='StateStsFilter')
{ $StHQid = $_POST['StHQid2']; $EmpId = $_POST['EmpId2']; $YId = $_POST['YId2']; $CI = $_POST['CI']; ?>	 

<?php $sqlSetH=mysql_query("select * from hrm_pms_setting where CompanyId=".$_POST['CI']." AND Process='PMS' ", $con);  
      $resSetH=mysql_fetch_array($sqlSetH); ?>
      
<table border="1" id="table11" cellpadding="0" cellspacing="0" style="width:100%;">
   <div id="thead">
   <thead>
    <tr bgcolor="#7a6189" style="height:25px;">
	 <td rowspan="2" class="th" style="width:3%;"><b>Sn</b></td>
	 <td rowspan="2" class="th" style="width:4%;"><b>EC</b></td>
	 <td rowspan="2" class="th" style="width:20%;"><b>Name</b></td>
	 <td rowspan="2" class="th" style="width:8%;"><b>Department</b></td>
	 <?php if($resSetH['Show_GradeDesig']=='Y'){ /* ?>
	 <td rowspan="2" class="th" style="width:22%;"><b>Designation</b></td>
	 <?php */ } ?>
	 <td rowspan="2" class="th" style="width:8%;">HQ</td>
	 <?php /*<td rowspan="2" class="th" style="width:10%;">State</td>*/ ?>
	 <td rowspan="2" class="th" style="width:4%;"><b>Form</b></td>
	 <td rowspan="2" class="th" style="width:4%;"><b>Files</b></td>
	 <!--<td rowspan="2" class="th" style="width:4%;"><b>KRA xls</b></td>-->
	 <td colspan="2" class="th" style="width:5%;"><b>Employee</b></td>
	 <td colspan="2" class="th" style="width:5%;"><b>Appraiser</b></td>
	 <td colspan="2" class="th" style="width:5%;"><b>Reviewer</b></td>
	<?php if($_SESSION['eAppform']=='Y'){ ?>
	 <td rowspan="2" class="th" style="width:5%;"><b>HOD</b></td>
	<?php } ?>
	 <td rowspan="2" class="th" style="width:8%;"><b>Action</b></td>
    </tr>
    <tr bgcolor="#7a6189" style="height:25px;">
	 <td class="th" style="width:5%;"><b>Sts</b></td>
	 <td class="th" style="width:5%;"><b>Rating</b></td>
	 <td class="th" style="width:5%;"><b>Sts</b></td>
	 <td class="th" style="width:5%;"><b>Rating</b></td>
	 <td class="th" style="width:5%;"><b>Sts</b></td>
	 <td class="th" style="width:5%;"><b>Rating</b></td>
    </tr>
   </thead>
   </div>
<?php if($StHQid=='All'){ $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateName, EmpPmsId, Kra_filename, Kra_ext, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, Rev2_PmsStatus, Emp_TotalFinalRating, Appraiser_TotalFinalRating, Reviewer_TotalFinalRating from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND p.AssessmentYear=".$YId." AND p.Rev2_EmployeeID=".$EmpId, $con); }else{ $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateName, EmpPmsId, Kra_filename, Kra_ext, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, Rev2_PmsStatus, Emp_TotalFinalRating, Appraiser_TotalFinalRating, Reviewer_TotalFinalRating from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND hq.StateId=".$StHQid." AND p.AssessmentYear=".$YId." AND p.Rev2_EmployeeID=".$EmpId, $con); }

$sno=1; while($res=mysql_fetch_array($sql)){
$sqlR=mysql_query("select * from hrm_employee_pms_uploadfile where EmpPmsId=".$res['EmpPmsId']." AND EmployeeID=".$res['EmployeeID']." AND YearId=".$_SESSION['PmsYId'], $con); $no=1; $resR=mysql_num_rows($sqlR);

if($res['Emp_PmsStatus']==0){$st='Draft';}elseif($res['Emp_PmsStatus']==1){$st='Pending';}elseif($res['Emp_PmsStatus']==2){$st='Submitted';}
if($res['Appraiser_PmsStatus']==0){$stM='Draft';}elseif($res['Appraiser_PmsStatus']==1){$stM='Pending';}elseif($res['Appraiser_PmsStatus']==2){$stM='Approved';}elseif($res['Appraiser_PmsStatus']==3){$stM='Resent';}
if($res['Reviewer_PmsStatus']==0){$stH='Draft';}elseif($res['Reviewer_PmsStatus']==1){$stH='Pending';}elseif($res['Reviewer_PmsStatus']==2){$stH='Approved';}elseif($res['Reviewer_PmsStatus']==3){$stH='Resent';}
if($res['Rev2_PmsStatus']==0){$stH2='Draft';}elseif($res['Rev2_PmsStatus']==1){$stH2='Pending';}elseif($res['Rev2_PmsStatus']==2){$stH2='Approved';}elseif($res['Rev2_PmsStatus']==3){$stH2='Resent';}
?>   <div id="tbody">
     <tbody>
     <tr style="height:22px;background-color:#FFFFFF;">
	  <td class="tdc"><?php echo $sno; ?></td>
	  <td class="tdc"><?php echo $res['EmpCode']; ?></td>
	  <td class="tdl">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
      <td class="tdl">&nbsp;<?php echo $res['DepartmentCode'];?></td>
      <?php if($resSetH['Show_GradeDesig']=='Y'){ /* ?>
	  <td class="tdl">&nbsp;<?php echo $res['DesigName'];?></td>
	  <?php */ } ?>
	  <td class="tdl">&nbsp;<?php echo $res['HqName'];?></td>				
	  <?php /*<td class="tdl">&nbsp;<?php echo $res['StateName'];?></td>*/ ?>
	  
	  <td class="tdc"><?php if($res['Emp_PmsStatus']==2){ ?><a href="javascript:OpenWindow(<?php echo $res['EmpPmsId'].','.$CI; ?>)">Click</a><?php }else{ echo 'Wait'; }?></td>
	  <td class="tdc"><?php if($resR>0){ ?><a href="#" onClick="UploadEmpfile(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>)">Yes</a><?php }if($resR==0){echo 'No'; }?></td>
	  <?php /*?><td class="tdc"><?php if($res['Kra_filename']!='' AND $res['Kra_ext']!=''){ ?><a href="#" onClick="UploadEmpKrafile(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>,'<?php echo $res['Kra_filename']; ?>','<?php echo $res['Kra_ext']; ?>')">Yes</a><?php }?></td><?php */?>
	  
      <td class="tdc" style="color:<?php if($st=='Draft'){echo '#A40000'; }if($st=='Pending') {echo '#36006C'; }if($st=='Submitted') {echo '#005300'; }?>;background-color:#FFFFB9;" ><?php echo $st;?></td>
	  <td class="tdc" style="background-color:#FFFFB9;"><?php echo $res['Emp_TotalFinalRating'];?></td>
	  
	  <td class="tdc" style="color:<?php if($stM=='Draft'){echo '#A40000'; }if($stM=='Pending'){echo '#36006C'; }if($stM=='Approved'){echo '#005300'; }if($stM=='Resent'){echo '#006AD5'; }?>;background-color:#C4E1FF;"><?php echo $stM;?></td>
	  <td class="tdc" style="background-color:#C4E1FF;"><?php echo $res['Appraiser_TotalFinalRating'];?></td>
	  
      <td class="tdc" style="color:<?php if($stH=='Draft') {echo '#A40000'; }if($stH=='Pending') {echo '#36006C'; }if($stH=='Approved') {echo '#005300'; }if($stH=='Resent') {echo '#006AD5'; }?>;background-color:#CDFF9B;"><?php echo $stH;?></td>
	  <td class="tdc" style="background-color:#CDFF9B;"><?php echo $res['Reviewer_TotalFinalRating'];?></td>
	  
<?php if($_SESSION['eAppform']=='Y'){ ?><td class="tdc" style="color:<?php if($stH2=='Draft') {echo '#A40000'; }if($stH2=='Pending') {echo '#36006C'; }if($stH2=='Approved') {echo '#005300'; }if($stH2=='Resent') {echo '#006AD5'; }?>;"><?php echo $stH2;?></td><?php } ?>
	  <td class="tdc"><?php if($res['Emp_PmsStatus']==2 AND $res['Appraiser_PmsStatus']==2 AND $res['Reviewer_PmsStatus']==2 AND $res['Rev2_PmsStatus']!=2) { ?><select class="tdsel" onChange="edit(this.value,<?php echo $res['EmployeeID'].','.$_SESSION['PmsYId']; ?>)"><option value="0">Select</option><option value="1">Approved</option><option value="2">Resend Form</option></select><?php } ?></td>
	  
	 </tr>
	 </tbody>
	 </div>
<?php $sno++;} ?>		
</table>

<?php } ?>
