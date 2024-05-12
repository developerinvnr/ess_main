<?php require_once('config/config.php'); ?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font {font-family:Times New Roman;font-size:15px; font-weight:bold;}.font1 {font-family:Times New Roman;font-size:15px;} 
.EditSelect { font-family:Georgia; font-size:11px;height:18px;}
.EditInput { font-family:Georgia; font-size:12px; width:100px; height:20px;}
</style>
<script language="javascript" type="text/javascript">
function PrintForm(E,C,v) 
{window.open("VeiwConfFormPrint.php?action=Form&E="+E+"&C="+C+"&v="+v,"AppLetter","location=no,scrollbars=no,resizable=no,menubar=no,width=50,height=50");}
</script>
</head>
<body>
<center>
<table border="0">
<tr><td style="font-family:Times New Roman;color:#000000;font-size:13px;width:999px;;" align="right">
<a href="#" onClick="PrintForm(<?php echo $_REQUEST['E'].','.$_REQUEST['C']; ?>,'<?php echo $_REQUEST['v']; ?>')" style="text-decoration:none;"><font id="FonPC" style="color:#000099;">Print</font></a>&nbsp;&nbsp;</td></tr>
<?php  if($_REQUEST['action']=='Form') {$sql=mysql_query("select hrm_employee.CompanyId,EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,DateJoining,DateConfirmationYN,DateConfirmation,GradeId,HqId,Gender,DR,Married,ReportingName from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$_REQUEST['E'], $con);  $res=mysql_fetch_assoc($sql);
$Ename = $res['Fname'].'&nbsp;'.$res['Sname'].'&nbsp;'.$res['Lname']; $LEC=strlen($res['EmpCode']); 
if($res['DR']=='Y'){$M='Dr.';} elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$Ename; 
if($LEC==1){$EC='000'.$res['EmpCode'];} if($LEC==2){$EC='00'.$res['EmpCode'];} if($LEC==3){$EC='0'.$res['EmpCode'];} if($LEC>=4){$EC=$res['EmpCode'];}

$sqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
$sqlDe=mysql_query("select DesigName from hrm_designation where DesigId=".$res['DesigId'], $con); $resDe=mysql_fetch_assoc($sqlDe);
$sqlH=mysql_query("select HqName from hrm_headquater where HqId=".$res['HqId'], $con); $resH=mysql_fetch_assoc($sqlH);
$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resG=mysql_fetch_assoc($sqlG); 

$sqlHOD=mysql_query("select Fname,Sname,Lname,Gender,DR,Married from hrm_employee_reporting INNER JOIN hrm_employee ON hrm_employee_reporting.HodId=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_reporting.HodId=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_reporting.HodId=hrm_employee_personal.EmployeeID where hrm_employee_reporting.EmployeeID=".$_REQUEST['E'], $con); $rowHOD=mysql_num_rows($sqlHOD); 
if($rowHOD>0) 
{ $resHOD=mysql_fetch_assoc($sqlHOD); if($resHOD['DR']=='Y'){$M2='Dr.';} elseif($resHOD['Gender']=='M'){$M2='Mr.';} elseif($resHOD['Gender']=='F' AND $resHOD['Married']=='Y'){$M2='Mrs.';} elseif($resHOD['Gender']=='F' AND $resHOD['Married']=='N'){$M2='Miss.';}
  $NameHOD=$M2.' '.$resHOD['Fname'].'&nbsp;'.$resHOD['Sname'].'&nbsp;'.$resHOD['Lname'];
}

$sqlLL=mysql_query("select * from hrm_employee_confletter where Status='".$_REQUEST['v']."' AND EmployeeID=".$_REQUEST['E'], $con); $rowLL=mysql_num_rows($sqlLL); 
if($rowLL>0) { $resLL=mysql_fetch_assoc($sqlLL); }

?> 			
 <tr> 
 <td align="left" id="type" valign="top" style="width:100%;">             
  <table border="0">
    <tr>
	 <td style="width:1000px;">
<table border="0" bgcolor="#FFFFFF">
 <tr><td align="center" style="font-family:Times New Roman;font-size:18px;width:1000px;"><b>Confirmation Appraisal Form</b></td></tr>
 <tr><td align="center" style="font-family:Times New Roman;font-size:15px;width:1000px;">
      <table border="1">
	   <tr>
	    <td class="font" style="width:100px;">&nbsp;Name:</td>
		<td style="width:350px;" align="">&nbsp;<?php echo $NameE; ?></td>
		<td class="font" style="width:200px;">&nbsp;Employee Code:</td>
		<td style="width:350px;" align="">&nbsp;<?php echo $EC; ?></td>
	   </tr>
	   <tr>
	    <td class="font" style="width:100px;">&nbsp;Location:</td>
		<td style="width:350px;" align="">&nbsp;<?php echo $resH['HqName']; ?></td>
		<td class="font" style="width:200px;">&nbsp;Department:</td>
		<td style="width:350px;" align="">&nbsp;<?php echo $resD['DepartmentName']; ?></td>
	   </tr>
	   <tr>
	    <td class="font" style="width:100px;">&nbsp;Grade:</td>
		<td style="width:350px;" align="">&nbsp;<?php echo $resG['GradeValue']; ?></td>
		<td class="font" style="width:200px;">&nbsp;Designation:</td>
		<td style="width:350px;" align="">&nbsp;<?php echo $resDe['DesigName']; ?></td>
	   </tr>
	   <tr>
	    <td class="font" style="width:100px;">&nbsp;DOJ:</td>
		<td style="width:350px;" align="">&nbsp;<?php echo date("d-m-Y", strtotime($res['DateJoining'])); ?></td>
		<td class="font" style="width:200px;">&nbsp;Date Of Confirmation:</td>
		<td style="width:350px;" align="">&nbsp;<?php echo date("d-m-Y", strtotime($resLL['ConfDate'])); //$ConfDate; ?></td>
	   </tr>
	  </table>
     </td>
  </tr>
  <tr>
   <td>
    <table border="0">
	 <tr><td class="font" style="width:999px;"><b>GUIDLINES</b></td></tr>
	 <tr><td class="font1" style="width:999px;">1. The objective of this appraisal is to evaluate the suitablility of an employee for confirmation in employment.</td></tr>
	 <tr><td class="font1" style="width:999px;">2. This appraisal form is to be filled in by the employee's immediate superior and the same shall be reviewed by the Departmental Head.</td></tr>
	 <tr><td colspan="2" class="font1" style="width:999px;"><b>Following are the Organizational, job and Personality factors applicable to employee. The defination and the rating scale for A, B, C, D for each factor is clearly detailed below:</b></td></tr>
	</table>
   </td>
  </tr>
  <tr><td align="center" style="font-family:Times New Roman;font-size:15px;width:1000px;">
      <table border="0">
	   <tr><td colspan="4" class="font" style="width:100px;color:#004A95;" bgcolor="">&nbsp;<font color="#000000"><b>1. COMMUNICATION:</font> Clarity of thought and expression; skills and desire of sharing relevant information with all concerned (upward, lateral, downward).</b></td></tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">A</td>
		<td class="font1" id="TdA1" style="width:445px;" valign="top"><?php if($resLL['Communi']=='A'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Excellent  clarity of thought and expression; Uses all channels and shares relevant information.</td>
		<td class="font" style="width:30px;" align="center" valign="top">B</td>
		<td class="font1" id="TdB1" style="width:445px;" valign="top"><?php if($resLL['Communi']=='B'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Good in expression shares information with all concerned.</td>
	   </tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">C</td>
		<td class="font1" id="TdC1" style="width:445px;" valign="top"><?php if($resLL['Communi']=='C'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Has desire to share information, but lacks skills to do so.</td>
		<td class="font" style="width:30px;" align="center" valign="top">D</td>
		<td class="font1" id="TdD1" style="width:445px;" valign="top"><?php if($resLL['Communi']=='D'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Keep things to him. Lacks desire and skills to share information.</td>
	   </tr>
	   <tr><td></td></tr>
	   <tr><td colspan="4" class="font" style="width:100px;color:#004A95;" bgcolor=""><b>&nbsp;<font color="#000000">2. JOB KNOWLEDGE:</font> Knowledge needed to perform the job (s); ability to grasp concepts and issues; assimilation of varied information.</b></td></tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">A</td>
		<td class="font1" id="TdA2" style="width:445px;" valign="top"><?php if($resLL['JobKnowl']=='A'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Has thorough know ledge of primary and related jobs; quick in assimilation of varied information, concepts and issues.</td>
		<td class="font" style="width:30px;" align="center" valign="top">B</td>
		<td class="font1" id="TdB2" style="width:445px;" valign="top"><?php if($resLL['JobKnowl']=='B'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Has know ledge of various aspects of the jobs good in assimilation of concepts, issues.</td>
	   </tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">C</td>
		<td class="font1" id="TdC2" style="width:445px;" valign="top"><?php if($resLL['JobKnowl']=='C'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Fair knowledge of the job, but requires more training and experience, fair assimilation of information.</td>
		<td class="font" style="width:30px;" align="center" valign="top">D</td>
		<td class="font1" id="TdD2" style="width:445px;" valign="top"><?php if($resLL['JobKnowl']=='D'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Needs frequents instructions; poor ability to grasp concepts and Issues.</td>
	   </tr>
	   <tr><td></td></tr>
	   <tr><td colspan="4" class="font" style="width:100px;color:#004A95;" bgcolor=""><b>&nbsp;<font color="#000000">3. OUTPUT:</font> Quantity of work based on recognized standards consistency & regularity of work; Result orientation.</b></td></tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">A</td>
		<td class="font1" id="TdA3" style="width:445px;" valign="top"><?php if($resLL['OutPut']=='A'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Exceptionally high output Consistent, regular and highly result oriented.</td>
		<td class="font" style="width:30px;" align="center" valign="top">B</td>
		<td class="font1" id="TdB3" style="width:445px;" valign="top"><?php if($resLL['OutPut']=='B'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Always gives good I high output. Consistently result oriented.</td>
	   </tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">C</td>
		<td class="font1" id="TdC3" style="width:445px;" valign="top"><?php if($resLL['OutPut']=='C'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Regularly meets recognized standards of output Mostly consistent producer.</td>
		<td class="font" style="width:30px;" align="center" valign="top">D</td>
		<td class="font1" id="TdD3" style="width:445px;" valign="top"><?php if($resLL['OutPut']=='D'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Generally low output. Below recognized standards Inconsistent. Not regular.</td>
	   </tr>
	   <tr><td></td></tr>
	   <tr><td colspan="4" class="font" style="width:100px;color:#004A95;" bgcolor=""><b>&nbsp;<font color="#000000">4. INITIATIVE:</font> Takes the first step. Proactive. Creates and is alert to opportunities.</b></td></tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">A</td>
		<td class="font1" id="TdA4" style="width:445px;" valign="top"><?php if($resLL['Initiative']=='A'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Always takes the first step. Is proactive and creates opportunities.</td>
		<td class="font" style="width:30px;" align="center" valign="top">B</td>
		<td class="font1" id="TdB4" style="width:445px;" valign="top"><?php if($resLL['Initiative']=='B'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Alert to opportunities. Takes the first step most of the times.</td>
	   </tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">C</td>
		<td class="font1" id="TdC4" style="width:445px;" valign="top"><?php if($resLL['Initiative']=='C'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Works on his own. Takes the first step when confident.</td>
		<td class="font" style="width:30px;" align="center" valign="top">D</td>
		<td class="font1" id="TdD4" style="width:445px;" valign="top"><?php if($resLL['Initiative']=='D'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Does not look for opportunities. Routine worker. Needs goading/persuasion.</td>
	   </tr>
	   <tr><td></td></tr>
	   <tr><td colspan="4" class="font" style="width:100px;color:#004A95;" bgcolor=""><b>&nbsp;<font color="#000000">5. INTERPERSONAL SKILLS:</font> Degree of co-operation with team members; Ability to interact effectively with superiors, peers and subordinates.</b></td></tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">A</td>
		<td class="font1" id="TdA5" style="width:445px;" valign="top"><?php if($resLL['InterSkill']=='A'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Very effective team member, co-operative; Respected and liked by superiors, peers and subordinates. High interactive ability at all levels.</td>
		<td class="font" style="width:30px;" align="center" valign="top">B</td>
		<td class="font1" id="TdB5" style="width:445px;" valign="top"><?php if($resLL['InterSkill']=='B'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Co-operative ; Respected. Has good relations with subordinate, peers and superiors.</td>
	   </tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">C</td>
		<td class="font1" id="TdC5" style="width:445px;" valign="top"><?php if($resLL['InterSkill']=='C'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Generally accepted as a team member. Occasionally abrasive in dealing with superior, peer and subordinate. </td>
		<td class="font" style="width:30px;" align="center" valign="top">D</td>
		<td class="font1" id="TdD5" style="width:445px;" valign="top"><?php if($resLL['InterSkill']=='D'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;A loner, Has difficulty in a group/team.</td>
	   </tr>
	   <tr><td></td></tr>
	   <tr><td colspan="4" class="font" style="width:100px;color:#004A95;" bgcolor=""><b>&nbsp;<font color="#000000">6. PROBLEM SOLVING:</font> Ability to go to the core of the problem. Makes a correct diagnosis with relevant.</b></td></tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">A</td>
		<td class="font1" id="TdA6" style="width:445px;" valign="top"><?php if($resLL['ProblemSolve']=='A'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Quickly goes to the core of the problem and makes a correct diagnosis, with relevant available data in all situations.</td>
		<td class="font" style="width:30px;" align="center" valign="top">B</td>
		<td class="font1" id="TdB6" style="width:445px;" valign="top"><?php if($resLL['ProblemSolve']=='B'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;In most situations, goes to the core of the problem and makes a correct diagnosis available with limited data. </td>
	   </tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">C</td>
		<td class="font1" id="TdC6" style="width:445px;" valign="top"><?php if($resLL['ProblemSolve']=='C'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Has ability to solve problem of routine nature Requires assistance in solving problem. </td>
		<td class="font" style="width:30px;" align="center" valign="top">D</td>
		<td class="font1" id="TdD6" style="width:445px;" valign="top"><?php if($resLL['ProblemSolve']=='D'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Requires help to diagnose even problems of routine nature.</td>
	   </tr>
	   <tr><td></td></tr>
	   <tr><td colspan="4" class="font" style="width:100px;color:#004A95;" bgcolor=""><b>&nbsp;<font color="#000000">7. ATTITUDE TOWARDS ORGANIZATION/WORK/AUTHORITY:</font> Attitudinal pre-disposition. Approach to work; sensitivity and temperament.</b> </td></tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">A</td>
		<td class="font1" id="TdA7" style="width:445px;" valign="top"><?php if($resLL['Attitude']=='A'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Always positive in outlook towards organization/work/authority. Respects authority.</td>
		<td class="font" style="width:30px;" align="center" valign="top">B</td>
		<td class="font1" id="TdB7" style="width:445px;" valign="top"><?php if($resLL['Attitude']=='B'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Mostly positive in outlook towards organization/work/authority.  </td>
	   </tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">C</td>
		<td class="font1" id="TdC7" style="width:445px;" valign="top"><?php if($resLL['Attitude']=='C'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Generally positive in outlook towards work/subordinates. </td>
		<td class="font" style="width:30px;" align="center" valign="top">D</td>
		<td class="font1" id="TdD7" style="width:445px;" valign="top"><?php if($resLL['Attitude']=='D'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Does not have a positive outlook/ approach  to organization/work. Indifferent to authority.</td>
	   </tr>
	   <tr><td></td></tr>
	    <tr><td colspan="4" class="font" style="width:100px;color:#004A95;" bgcolor=""><b>&nbsp;<font color="#000000">8. ATTENDANCE & PUNCTUALITY REGULARITY OF ATTENDANCE:</font> Punctuality related to work place and work/ assigned tasks. </b> </td></tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">A</td>
		<td class="font1" id="TdA8" style="width:445px;" valign="top"><?php if($resLL['Attendance']=='A'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Highly regular in attendance and punctuality. Highly work/ assignment oriented. </td>
		<td class="font" style="width:30px;" align="center" valign="top">B</td>
		<td class="font1" id="TdB8" style="width:445px;" valign="top"><?php if($resLL['Attendance']=='B'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Mostly regular in attendance. Reports on time Conscientious to assignments.  </td>
	   </tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">C</td>
		<td class="font1" id="TdC8" style="width:445px;" valign="top"><?php if($resLL['Attendance']=='C'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Generally regular in attendance and quite punctual in meeting work norms. </td>
		<td class="font" style="width:30px;" align="center" valign="top">D</td>
		<td class="font1" id="TdD8" style="width:445px;" valign="top"><?php if($resLL['Attendance']=='D'){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;Poor attendance and punctuality. Casual attitude to work.</td>
	   </tr>
	  </table>
     </td>
  </tr>
   <tr>
   <td>
    <table border="0">
	 <tr><td>&nbsp;</td></tr>
	 <tr><td class="font" style="width:200px;" valign="top">Employee's Strength:</td><td style="width:799px;"><?php echo $resLL['EmpStrenght']; ?></td></tr>
	 <tr><td class="font" style="width:200px;" valign="top">Areas of Improvement:</td><td style="width:799px;"><?php echo $resLL['AreaImprovement']; ?></td></tr>
	</table>
   </td>
  </tr>
  <tr>
   <td>
    <table border="0">
	 <tr><td>&nbsp;</td></tr>
	 <tr><td class="font" style="width:1000px;"><b>&nbsp;OVERALL RATING</b></td></tr>
	 <tr>
	  <td>
	   <table border="0">
	     <tr>
		 <td style="width:30px;"></td>
	     <td class="font1" style="width:120px;"><b>1</b>&nbsp;Unsatisfactory</td>
		 <td align="center" style="width:45px;"><?php if($resLL['Rating']==1){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?></td>
		 <td style="width:40px;" rowspan="2"></td>
		 <td class="font1" style="width:170px;"><b>2</b>&nbsp;Needs Improvement</td>
		 <td align="center" style="width:45px;"><?php if($resLL['Rating']==2){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?></td>
		 <td style="width:40px;" rowspan="2"></td>
		 <td class="font1" style="width:100px;"><b>2.5</b>&nbsp;Satisfactory</td>
		 <td align="center" style="width:45px;"><?php if($resLL['Rating']==2.5){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?></td>
		 <td style="width:40px;" rowspan="2"></td>
		 <td class="font1" style="width:90px;"><b>3</b>&nbsp;Competent</td>
		 <td align="center" style="width:45px;"><?php if($resLL['Rating']==3){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?></td>
		 <td style="width:200px;"></td>
	 </tr>
	 <tr>
	     <td style="width:30px;"></td>
	     <td class="font1" style="width:120px;"><b>3.5</b>&nbsp;Commendable</td>
		 <td align="center" style="width:45px;"><?php if($resLL['Rating']==3.5){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?></td>
		 <td class="font1" style="width:150px;"><b>4</b>&nbsp;Extraordinary</td>
		 <td align="center" style="width:45px;"><?php if($resLL['Rating']==4){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?></td>
		 <td class="font1" style="width:100px;"><b>4.5</b>&nbsp;Outstanding</td>
		 <td align="center" style="width:45px;"><?php if($resLL['Rating']==4.5){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?></td>
		 <td class="font1" style="width:90px;"><b>5</b>&nbsp;Exemplary</td>
		 <td align="center" style="width:45px;"><?php if($resLL['Rating']==5){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?></td>
		 <td style="width:200px;"></td>
	 </tr>
	   </table>
	  </td>
	 </tr> 
	</table>
   </td>
  </tr>
  <tr>
   <td>
    <table border="0">
	 <tr><td>&nbsp;</td></tr>
	 <tr>
		 <td class="font" style="width:200px;"><b>&nbsp;RECOMMENDATIONS:</b></td>
	     <td class="font1" style="width:799px;" valign="middle">&nbsp;Confirmed on due date&nbsp;&nbsp;<?php if($resLL['Recommendation']==1){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Extend Probation&nbsp;&nbsp;
		 <?php if($resLL['Recommendation']==2){ echo '<img src="images/checkbox_UnCheck.png"/>'; }else{echo '<img src="images/checkbox.png"/>';}?></td>
	 </tr>
	</table>
   </td>
  </tr>
   <tr>
   <td>
    <table border="0">
	 <tr><td colspan="6">&nbsp;</td></tr>
	 <tr><td colspan="6" class="font" style="width:1000px;">&nbsp;If probation to be extended, mention reason:</td></tr>
	 <tr><td colspan="6" style="width:1000px;" align="">&nbsp;<?php echo $resLL['Reason']; ?></td></tr>
	 <tr><td colspan="6" class="font" style="width:1000px;">&nbsp;HR Remark:</td></tr>
	 <tr><td colspan="6" style="width:1000px;" align="">&nbsp;<?php echo $resLL['HrRemark']; ?></td></tr>
	 <tr>
	     <td class="font" style="width:120px;">&nbsp;Grade:</td>
	     <td class="font" style="width:80px;" align="Right">&nbsp;Current:-</td>
		 <td class="font" style="width:200px;">&nbsp;<?php echo $resG['GradeValue']; ?></td>
		 <td class="font" style="width:80px;" align="Right">&nbsp;Proposed:-</td>
<?php $sqlG2=mysql_query("select GradeValue from hrm_grade where GradeId=".$resLL['GradeId'], $con); $resG2=mysql_fetch_assoc($sqlG2); ?>		 
		 <td class="font" style="width:200px;" align="">&nbsp;<?php echo $resG2['GradeValue']; ?></td>
	 </tr>
	 <tr>
	     <td class="font" style="width:120px;">&nbsp;Designation:</td>
	     <td class="font" style="width:80px;" align="Right">&nbsp;Current:-</td>
		 <td class="font" style="width:350px;" align="">&nbsp;<?php echo $resDe['DesigName']; ?></td>
		 <td class="font" style="width:80px;" align="Right">&nbsp;Proposed:-</td>
<?php $sqlDe2=mysql_query("select DesigName from hrm_designation where DesigId=".$resLL['DesigId'], $con); $resDe2=mysql_fetch_assoc($sqlDe2); ?>			 
		 <td class="font" style="width:350px;" align="">&nbsp;<?php echo $resDe2['DesigName']; ?></td>
	 </tr>
	 <tr><td colspan="2" style="height:10px;"></td></tr>
	</table>
   </td>
  </tr>
   <tr>
   <td>
    <table border="0">
	 <tr><td colspan="3" class="font" style="width:1000px;">&nbsp;Signature:</td></tr>
	 <tr><td colspan="3" style="height:80px;"></td></tr>
	 <tr><td class="font1" style="width:330px;" align="center" valign="bottom">-------------------------</td>
	     <td class="font1" style="width:330px;" align="center" valign="bottom">-------------------------</td>
		 <td class="font1" style="width:330px;" align="center" valign="bottom">-------------------------</td>
	 </tr>
	 <tr><td class="font1" style="width:330px;" align="center" valign="bottom"><b><?php echo $res['ReportingName']; ?></b></td>
	     <td class="font1" style="width:330px;" align="center" valign="bottom"><b><?php echo $NameHOD; ?></b></td>
		 <td class="font1" style="width:330px;" align="center" valign="bottom"><b><?php if($res['CompanyId']==1){echo 'Mrs. PARUL PARMAR';}else{echo '';}?></b></td>
	 </tr>
	 <tr><td class="font1" style="width:330px;" align="center" valign="top">(Appraiser)</td>
	     <td class="font1" style="width:330px;" align="center" valign="top">(HOD)</td>
		 <td class="font1" style="width:330px;" align="center" valign="top"><?php if($res['CompanyId']==1){echo '(HR)';}else{echo '';}?></td>
	 </tr>
	 <tr><td colspan="2" style="height:10px;"></td></tr>
	</table>
   </td>
  </tr>
</table>
	 </td>
	</tr>
  </table>
 </td>
  </tr>
<?php } ?>

</table>  
 </center>
</body>
</html>

