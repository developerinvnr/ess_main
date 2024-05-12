<?php 
require_once('config/config.php');
if(isset($_POST['PmsId']) && $_POST['PmsId']!=""){ $PmsId = $_POST['PmsId']; $EmpId = $_POST['EmpId']; $YId = $_POST['YId'];
$sql = mysql_query("select hrm_employee.*,hrm_employee_general.* from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_pms.EmpPmsId=".$PmsId." AND hrm_employee_pms.EmployeeID=".$EmpId, $con);
$row=mysql_fetch_assoc($sql); $Name=$row['Fname'].' '.$row['Sname'].' '.$row['Lname'];

$sqlS=mysql_query("select AppraiserFormAScore,RevFormAKra_Score,AppraiserFormBScore,RevFormBBehavi_Score from hrm_employee_pms where EmpPmsId=".$PmsId, $con); 
$resS=mysql_fetch_assoc($sqlS); ?>	 
<table border="0">
<tr><td>&nbsp;</td></tr>
<tr><td style="width:250px; font-size:13px;font-weight:bold; color:#F5530E"><i>General Details</i></td></tr>
<tr>
 <td id="General">
   <table>
  <tr bgcolor="#FFFFFF">
	<td bgcolor="#EEF0AA" style="color:#00376F;font-family:Times New Roman; width:100px; font-size:14px;font-weight:bold;">&nbsp;Name :</td>
	<td style="font-family:Times New Roman; width:200px; font-size:14px;font-weight:bold;"><?php echo $Name; ?></td><td width="10">&nbsp;</td>
	<td bgcolor="#EEF0AA" style="color:#00376F;font-family:Times New Roman; width:100px; font-size:14px;font-weight:bold; ">EmpCode :</td>
	<td style="font-family:Times New Roman; width:80px; font-size:14px;font-weight:bold;"><?php echo $row['EmpCode']; ?></td><td width="10">&nbsp;</td>
	<td bgcolor="#EEF0AA" style="color:#00376F;font-family:Times New Roman; width:100px; font-size:14px;font-weight:bold; ">Department :</td>
<?php $sqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$row['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD); ?>	
	<td style="font-family:Times New Roman; width:150px; font-size:14px;font-weight:bold;"><?php echo $resD['DepartmentName']; ?></td>
 </tr>
 <tr bgcolor="#FFFFFF">
	<td bgcolor="#EEF0AA" style="color:#00376F;font-family:Times New Roman; width:100px; font-size:14px;font-weight:bold; ">&nbsp;Designation :</td>
<?php $sqlDe=mysql_query("select DesigName from hrm_designation where DesigId=".$row['DesigId'], $con); $resDe=mysql_fetch_assoc($sqlDe); ?>		
	<td style="font-family:Times New Roman; width:200px; font-size:14px;font-weight:bold;"><?php echo $resDe['DesigName']; ?></td><td width="10">&nbsp;</td>
    <td bgcolor="#EEF0AA" style="color:#00376F;font-family:Times New Roman; width:100px; font-size:14px;font-weight:bold; ">Grade :</td>
<?php $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$row['GradeId'], $con); $resG=mysql_fetch_assoc($sqlG); ?>		
	<td style="font-family:Times New Roman; width:80px; font-size:14px;font-weight:bold;"><?php echo $resG['GradeValue']; ?></td><td width="10">&nbsp;</td>
	<td bgcolor="#EEF0AA" style="color:#00376F;font-family:Times New Roman; width:100px; font-size:14px;font-weight:bold; ">Head Quater :</td>
<?php $sqlH=mysql_query("select HqName from hrm_headquater where HqId=".$row['HqId'], $con); $resH=mysql_fetch_assoc($sqlH); ?>		
	<td style="font-family:Times New Roman; width:80px; font-size:14px;font-weight:bold;"><?php echo $resH['HqName']; ?></td>
 </tr>
 <tr bgcolor="#FFFFFF">
    <td bgcolor="#EEF0AA" style="color:#00376F;font-family:Times New Roman; width:100px; font-size:14px;font-weight:bold;">&nbsp;DOJ :</td>
	<td style="font-family:Times New Roman; width:80px; font-size:14px;font-weight:bold;"><?php echo date("d-m-Y",strtotime($row['DateJoining'])); ?></td>
    <td width="10">&nbsp;</td>
	<td bgcolor="#EEF0AA" style="color:#00376F;font-family:Times New Roman; width:100px; font-size:14px;font-weight:bold; ">DOC :</td>
	<td style="font-family:Times New Roman; width:100px; font-size:14px;font-weight:bold;"><?php echo date("d-m-Y",strtotime($row['DateConfirmation'])); ?></td>
    <td width="10">&nbsp;</td>
    <td bgcolor="#EEF0AA" style="color:#00376F;font-family:Times New Roman; width:120px; font-size:14px;font-weight:bold; ">Total VNR Exp. :</td>
<?php $timestamp_start = strtotime($row['DateJoining']);  $timestamp_end = strtotime(date("Y-m-d")); $difference = abs($timestamp_end - $timestamp_start); 
	  $days = floor($difference/(60*60*24)); $months = floor($difference/(60*60*24*30)); $years = floor($difference/(60*60*24*365));
      $sql=mysql_query("select AfterPms_DesigDate from hrm_employee_pms where EmployeeID=".$EmpId." AND AfterPms_DesigId=".$row['DesigId'], $con); $row2=mysql_num_rows($sql);
	  $res=mysql_fetch_array($sql);
	  if($row2==0){$CurrPerExp=$years; }
	  if($row2>0){ $timestamp_start2 = strtotime($res['AfterPms_DesigDate']);  $timestamp_end2 = strtotime(date("Y-m-d")); $difference2 = abs($timestamp_end2 - $timestamp_start2); 
	  $days2 = floor($difference2/(60*60*24)); $months2 = floor($difference2/(60*60*24*30)); $years2 = floor($difference2/(60*60*24*365)); $CurrPerExp=$years2;  }
?>     
	<td style="font-family:Times New Roman; width:100px; font-size:14px;font-weight:bold;"><?php echo $years.' year'; ?></td>
 </tr>

 <tr><td colspan="7">&nbsp;</td></tr>
   </table>
 </td>   
</tr>
<?php //************************************************************************************************// ?>
<tr><td style="width:250px; font-size:13px;font-weight:bold; color:#F5530E"><i>Increment History</i></td></tr>
<tr>
 <td id="KRA" style="width:1000px;">
   <table>
      <tr bgcolor="#EEF0AA">	   
	  <td align="center" style="width:40px; font-size:11px;font-weight:bold;">SNo.</td>
	  <td align="center" style="width:100px;font-size:11px;font-weight:bold;">Year</td>
	  <td align="center" style="width:120px;font-size:11px;font-weight:bold;">Department</td>  
	  <td align="center" style="width:100px;font-size:11px;font-weight:bold;">Designation</td>
	  <td align="center" style="width:50px;font-size:11px;font-weight:bold;">Grade</td>
	  <td align="center" style="width:50px;font-size:11px;font-weight:bold;">Score</td>
	  <td align="center" style="width:50px;font-size:11px;font-weight:bold;">Rating</td>
	  <td align="center" style="width:100px;font-size:11px;font-weight:bold;">Monthaly Gross</td>
      <td align="center" style="width:100px;font-size:11px;font-weight:bold;">Increment(%)</td>
	  <td align="center" style="width:100px;font-size:11px;font-weight:bold;">Annual Gross</td>
      <td align="center" style="width:100px;font-size:11px;font-weight:bold;">Annual CTC</td>
 </tr>
<?php $sql=mysql_query("select * from hrm_employee_pms where EmployeeID=".$EmpId." AND HR_PmsStatus=2 order by AssessmentYear ASC", $con); 
      $Sno=1; while($res=mysql_fetch_array($sql)){ ?>		      
<tr bgcolor="#FFFFFF"> 	   
	  <td align="center" class="font" style="width:40px;font-size:11px;" valign="top"><?php echo $Sno; ?></td>
<?php $sqlY=mysql_query("select FromDate from hrm_year where YearId=".$res['AssessmentYear'], $con); $resY=mysql_fetch_array($sqlY);?>      
	  <td align="" style="width:100px;font-size:11px;" valign="top"><?php echo date("Y",strtotime($resY['FromDate']));?></td>
<?php $sqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$res['AfterPms_DepartmentId'], $con); 
      $resD=mysql_fetch_array($sqlD);?>              
	  <td align="" style="width:120px;font-size:11px;" valign="top"><?php echo $resD['DepartmentName'];?></td> 
<?php $sqlDe=mysql_query("select DesigName from hrm_designation where DesigId=".$res['AfterPms_DesigId'], $con); 
      $resDe=mysql_fetch_array($sqlDe);?>          
	  <td align="center" style="width:100px;font-size:11px;" valign="top"><?php echo $resDe['DesigName'];?></td>
<?php $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['AfterPms_GradeId'], $con); 
      $resG=mysql_fetch_array($sqlG);?>
      <td align="center" style="width:50px;font-size:11px;" valign="top"><?php echo $resG['GradeValue'];?></td>     
	  <td align="center" style="width:50px;font-size:11px;" valign="top"><?php echo $res['HR_OverAllFinalScore'];?></td>
	  <td align="center" style="width:50px;font-size:11px;" valign="top"><?php echo $res['HR_OverAllFinalRating'];?></td>
	  <td align="center" style="width:100px;font-size:11px;" valign="top"><?php echo $res['AfterPms_GrossMonthlySalary'];?></td>
	  <td align="center" style="width:100px;font-size:11px;" valign="top"><?php echo $res['NetMonPercent_IncrementSalary'];?></td>
	  <td align="" style="width:150px;font-size:11px;" valign="top"><?php echo $res['AfterPms_GrossAnnualSalary'];?></td>
      <td align="center" style="width:100px;font-size:11px;" valign="top"><?php echo $res['AfterPms_CTC'];?></td>
 </tr>
 <?php $Sno++;} ?>
 <tr><td colspan="7">&nbsp;</td></tr>
   </table>
 </td>   
</tr>
<?php //************************************************************************************************// ?>
<tr><td style="width:250px; font-size:13px;font-weight:bold; color:#F5530E"><i>KRA</i></td></tr>
<tr>
 <td id="KRA">
   <table>
      <tr bgcolor="#EEF0AA">	   
	  <td align="center" style="width:30px; font-size:11px;font-weight:bold;">SNo.</td>
	  <td align="center" style="width:150px;font-size:11px;font-weight:bold;">KRA/Goals</td>
	  <td align="center" style="width:250px;font-size:11px;font-weight:bold;">Description</td>  
	  <td align="center" style="width:60px;font-size:11px;font-weight:bold;">Measure</td>
	  <td align="center" style="width:60px;font-size:11px;font-weight:bold;">Unit</td>
	  <td align="center" style="width:60px;font-size:11px;font-weight:bold;">Weightage</td>
	  <td align="center" style="width:50px;font-size:11px;font-weight:bold;">Target Rating</td>
	  <td align="center" style="width:60px;font-size:11px;font-weight:bold;">Self Rating</td>
	  <td align="center" style="width:150px;font-size:11px;font-weight:bold;">Remarks</td>
	  <td align="center" style="width:60px;font-size:11px;font-weight:bold;">App. Rating</td>
	  <td align="center" style="width:60px;font-size:11px;font-weight:bold;">App. Score</td>
 </tr>
<?php 
$sqlK=mysql_query("select * from hrm_employee_pms_kraforma where KRAFormAStatus='A' AND EmpPmsId=".$PmsId." order by KRAFormAId ASC", $con); 
      $Sno=1; while($resK=mysql_fetch_array($sqlK)){ 
	  $sqlK2=mysql_query("select * from hrm_pms_kra where KRAId=".$resK['KRAId'], $con); $resK2=mysql_fetch_array($sqlK2)?>	
<tr bgcolor="#FFFFFF"> 	   
	  <td align="center" class="font" style="width:30px;font-size:11px;" valign="top"><?php echo $Sno; ?></td>
	  <td align="" style="width:150px;font-size:11px;" valign="top"><?php echo $resK2['KRA'];?></td>
	  <td align="" style="width:250px;font-size:11px;" valign="top"><?php echo $resK2['KRA_Description'];?></td>  
	  <td align="center" style="width:60px;font-size:11px;" valign="top"><?php echo $resK2['Measure'];?></td>
	  <td align="center" style="width:60px;font-size:11px;" valign="top"><?php echo $resK2['Unit'];?></td>
	  <td align="center" style="width:60px;font-size:11px;" valign="top"><?php echo $resK['Weightage'];?></td>
	  <td align="center" style="width:50px;font-size:11px;" valign="top"><?php echo $resK['Target'];?></td>
	  <td align="center" style="width:60px;font-size:11px;" valign="top"><?php echo $resK['SelfRating'];?>" <?php  if($resYNK['Emp_KRASave']=='Y' AND ($resYNK['Appraiser_PmsStatus']==0 OR $resYNK['Appraiser_PmsStatus']==1 OR $resYNK['Appraiser_PmsStatus']==2)) { echo 'readonly'; } ?></td>
	  <td align="" style="width:150px;font-size:11px;" valign="top"><?php echo $resK['AchivementRemark'];?></td>
	  <td align="center" style="width:60px;font-size:11px;" valign="top"><?php echo $resK['AppraiserRating'];?></td>
	  <td align="center" style="width:60px;font-size:11px;" valign="top"><?php echo $resK['AppraiserScore'];?></td>
 </tr>
 <?php } ?>
 <tr bgcolor="#FFFFFF"><td colspan="10" align="right" width="100%" style="width:800px;font-size:11px;font-weight:bold;">Appraiser Final KRA Score :</td>
 <td align="center" style="width:60px;font-size:11px;font-weight:bold;"><?php echo $resS['AppraiserFormAScore'];?></td></tr>
 <tr bgcolor="#FFFFFF"><td colspan="10" align="right" width="100%" style="width:800px;font-size:11px;font-weight:bold;">Reviewer KRA Score :</td>
 <td align="center" style="width:60px;font-size:11px;font-weight:bold;"><?php echo $resS['RevFormAKra_Score'];?></td></tr>
 <tr><td colspan="11">&nbsp;</td></tr>
   </table>
 </td>   
</tr>
<tr><td style="width:250px; font-size:13px;font-weight:bold; color:#F5530E"><i>Skill/ Behavioral</i></td></tr>
<tr>
 <td id="FormB">
   <table>
      <tr bgcolor="#EEF0AA">	   
	  <td align="center" style="width:30px; font-size:11px;font-weight:bold;">SNo.</td>
	  <td align="center" style="width:150px;font-size:11px;font-weight:bold;">Behavioral/Skills</td>
	  <td align="center" style="width:500px;font-size:11px;font-weight:bold;">Description</td>  
	  <td align="center" style="width:60px;font-size:11px;font-weight:bold;">Weightage</td>
	  <td align="center" style="width:60px;font-size:11px;font-weight:bold;">Target Rating</td>
	  <td align="center" style="width:60px;font-size:11px;font-weight:bold;">Self Rating</td>
	  <td align="center" style="width:150px;font-size:11px;font-weight:bold;">Comments</td>
	  <td align="center" style="width:60px;font-size:11px;font-weight:bold;">App. Rating</td>
	  <td align="center" style="width:60px;font-size:11px;font-weight:bold;">App. Score</td>
 </tr>
<?php $sqlBY=mysql_query("select * from hrm_employee_pms_behavioralformb where EmpPmsId=".$PmsId." order by BehavioralFormBId ASC", $con);  $SnoB=1; while($resBY=mysql_fetch_array($sqlBY)){?>
<tr bgcolor="#FFFFFF"> 	   
	  <td align="center" class="font" style="width:30px;font-size:11px;" valign="top"><?php echo $SnoB; ?></td>
	  <td align="" style="width:150px;font-size:11px;" valign="top"><?php echo $resBY['Skill'] ?></td>
	  <td align="" style="width:500px;font-size:11px;" valign="top"><?php echo $resBY['Skill_Remark']; ?></td>  
	  <td align="center" style="width:60px;font-size:11px;" valign="top"><?php echo $resBY['Weightage'] ?></td>
	  <td align="center" style="width:60px;font-size:11px;" valign="top"><?php echo $resBY['Target']; ?></td>
	  <td align="center" style="width:60px;font-size:11px;" valign="top"><?php echo $resBY['SelfRating']; ?></td>
	  <td align="" style="width:150px;font-size:11px;" valign="top"><?php echo $resBY['Comments_Example']; ?></td>
	  <td align="center" style="width:60px;font-size:11px;" valign="top"><?php echo $resBY['AppraiserRating'] ?></td>
	  <td align="center" style="width:60px;font-size:11px;" valign="top"><?php echo $resBY['AppraiserScore'] ?></td>
 </tr>
<?php } ?>
 <tr bgcolor="#FFFFFF"><td colspan="8" align="right" style="width:800px;font-size:11px;font-weight:bold;">Appraiser Final FormB(behavioral) Score :</td>
 <td align="center" style="width:60px;font-size:11px;font-weight:bold;"><?php echo $resS['AppraiserFormBScore'];?></td></tr>
 <tr bgcolor="#FFFFFF"><td colspan="8" align="right" style="width:800px;font-size:11px;font-weight:bold;">Reviewer FormB(behavioral) Score :</td>
 <td align="center" style="width:60px;font-size:11px;font-weight:bold;"><?php echo $resS['RevFormBBehavi_Score'];?></td></tr>
 <tr><td colspan="7">&nbsp;</td></tr>
   </table>
 </td>   
</tr>
<tr><td style="width:250px; font-size:13px;font-weight:bold; color:#F5530E"><i>Achivement</i></td></tr>
<tr>
 <td id="Achivement">
   <table>
<?php $sqlAc=mysql_query("select * from hrm_employee_pms_achivement where EmpPmsId=".$PmsId." order by AchivementId ASC", $con);  
      $SnoB=1; while($resAc=mysql_fetch_array($sqlAc)){?>   
    <tr bgcolor="#FFFFFF">	   
     <td bgcolor="#EEF0AA" align="center" style="width:30px; font-size:11px;height:20px;" valign="top"><?php echo $Sno; ?></td>	  
	  <td align="" style="width:1000px;font-size:11px;height:20px;">&nbsp;<?php echo $resAc['Achivement']; ?></td>  
    </tr>
<?php $Sno++;} ?>
   </table>
   </td>
<tr><td colspan="7">&nbsp;</td></tr>
<tr><td style="width:250px; font-size:13px;font-weight:bold; color:#F5530E"><i>Feedback</i></td></tr>
<tr>
 <td id="Achivement">
   <table>
<?php $sqlW=mysql_query("select * from hrm_employee_pms_workenvironment where EmpPmsId=".$PmsId." order by EmpWorkEnvId  ASC", $con);  
      $SnoB=1; while($resW=mysql_fetch_array($sqlW)){?>   
    <tr>
	 <td style="width:1000px;">
	  <table>
	  <tr>   
      <td bgcolor="#EEF0AA" align="center" style="width:30px; font-size:11px;" valign="top"><?php echo $Sno; ?></td>	  
	  <td bgcolor="#D7ECB7" align="" style="width:1000px;font-size:11px; height:20px;" valign="top">&nbsp;<?php echo $resW['WorkEnvironment']; ?></td> 
	  </tr>
	   <tr>   
      <td bgcolor="#EEF0AA" align="center" style="width:30px; font-size:11px;" valign="top">Ans.</td>	  
	  <td bgcolor="#FFFFFF" align="" style="width:1000px;font-size:11px;height:20px;" valign="top">&nbsp;<?php echo $resW['Answer']; ?></td> 
	  </tr>
	  </table></td>	 
    </tr>
<?php $Sno++;} ?>
<tr><td colspan="7">&nbsp;</td></tr>	
</table>    	 
<?php } ?>
