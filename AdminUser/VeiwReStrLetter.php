<?php require_once('config/config.php'); ?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script language="javascript" type="text/javascript">
function LetterClickPrint(EI,CI)
{window.open("VeiwReStrLetterPrint.php?action=ReStrLetter&e="+EI+"&c="+CI,"REStr","scrollbars=yes,resizable=no,width=820,height=750,menubar=no,location=no,directories=no");}
</script>
</head>
<body>
<table>
<tr><td style="font-family:Times New Roman;color:#000000;font-size:13px;width:785;" align="right">
<a href="#" onClick="LetterClickPrint(<?php echo $_REQUEST['e'].','.$_REQUEST['c']; ?>)" style="text-decoration:none;"><font id="FonPC" style="color:#000099;">Print</font></a>&nbsp;&nbsp;</td></tr>
<?php if($_REQUEST['action']=='ReStrLetter') { $SqlE=mysql_query("SELECT hrm_employee.*,Gender,DR,Married FROM hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$_REQUEST['e'], $con); $ResE=mysql_fetch_assoc($SqlE); 
if($ResE['DR']=='Y'){$M='Dr.';} elseif($ResE['Gender']=='M'){$M='Mr.';} elseif($ResE['Gender']=='F'){$M='Ms.';} 
$NameE=$M.' '.$ResE['Fname'].'&nbsp;'.$ResE['Sname'].'&nbsp;'.$ResE['Lname'];
?> 			
<tr>
 <td align="center">
   <table border="0" width="790">
	 <tr><td>&nbsp;</td></tr>
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr><td style="width:100px;">&nbsp;</td><td style="width:650px;font-size:18px;font-weight:bold;">To,</td>
		      <td style="width:135px;"><b>Date:&nbsp;31<sup>st</sup> Jan 2014</b></td></tr>
		  <tr><td style="width:50px;">&nbsp;</td><td style="width:650px;font-size:18px;color:#660000;font-weight:bold;"><?php echo $NameE; ?></td>
		      <td style="width:135px;">&nbsp;</td></tr>
		  <tr><td style="width:50px;">&nbsp;</td><td style="width:650px;font-size:18px;color:#660000;font-weight:bold;">EC No:&nbsp;<?php echo $ResE['EmpCode']; ?></td>
		      <td style="width:135px;">&nbsp;</td></tr>
		  <tr><td>&nbsp;</td></tr>
		  <tr><td>&nbsp;</td></tr>
		  <tr><td style="width:50px;">&nbsp;</td>
		  <td colspan="2" style="width:735px;font-size:18px;text-align:justify;">We would like to inform you that the organisation structure has been revised effective 31<sup>st</sup> Jan 2014 keeping in mind the business requirements and to make it more competitive.<p></td></tr>
		  <tr><td>&nbsp;</td></tr>
		  <tr><td style="width:50px;">&nbsp;</td>
		  <td style="width:735px;font-size:18px;text-align:justify;">The following are the details:</td><td style="width:50px;">&nbsp;</td></tr>
<?php 
$sqlDP = mysql_query("SELECT * from hrm_restructuring where Year=2014 AND EmployeeID=".$_REQUEST['e'], $con); $resDP = mysql_fetch_assoc($sqlDP); 
$sqlDept = mysql_query("SELECT DepartmentCode,DepartmentName FROM hrm_department WHERE DepartmentId=".$resDP['Current_DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlDesig = mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$resDP['Current_DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlGrade = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$resDP['Current_GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlDept2 = mysql_query("SELECT DepartmentCode,DepartmentName FROM hrm_department WHERE DepartmentId=".$resDP['New_DepartmentId'], $con); $resDept2=mysql_fetch_assoc($sqlDept2);
$sqlDesig2 = mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$resDP['New_DesigId'], $con); $resDesig2=mysql_fetch_assoc($sqlDesig2);
$sqlGrade2 = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$resDP['New_GradeId'], $con); $resGrade2=mysql_fetch_assoc($sqlGrade2); 
?>		  
		  <tr>
		   <td style="width:50px;">&nbsp;</td>
		   <td colspan="2">
		    <table border="1">
			 <tr bgcolor="#E2E2E2">
			  <td colspan="2" style="width:220px;font-size:18px;text-align:center;"><b>Department</b></td>
			  <td colspan="2" style="width:120px;font-size:18px;text-align:center;"><b>Grade</b></td>
			  <td colspan="2" style="width:415px;font-size:18px;text-align:center;"><b>Designation</b></td>
			 </tr>
			 <tr bgcolor="#E2E2E2">
			  <td style="width:110px;font-size:15px;text-align:center;font-weight:bold;">Old</td>
			  <td style="width:110px;font-size:15px;text-align:center;font-weight:bold;">Revised</td>
			  <td style="width:60px;font-size:15px;text-align:center;font-weight:bold;">Old</td>
			  <td style="width:60px;font-size:15px;text-align:center;font-weight:bold;">Revised</td>
			  <td style="width:207px;font-size:15px;text-align:center;font-weight:bold;">Old</td>
			  <td style="width:207px;font-size:15px;text-align:center;font-weight:bold;">Revised</td>
			 </tr>
			 <tr bgcolor="#FFFFFF">
			  <td style="width:110px;font-size:12px;font-weight:bold;font-family:Helvetica;"><?php echo strtoupper($resDept['DepartmentName']); ?></td>
			  <td style="width:110px;font-size:12px;font-weight:bold;font-family:Helvetica;"><?php echo strtoupper($resDept2['DepartmentName']); ?></td>
			  <td style="width:60px;font-size:12px;font-weight:bold;text-align:center;font-family:Helvetica;"><?php echo strtoupper($resGrade['GradeValue']);?></td>
			  <td style="width:60px;font-size:12px;font-weight:bold;text-align:center;font-family:Helvetica;"><?php echo strtoupper($resGrade2['GradeValue']); ?></td>
			  <td style="width:222px;font-size:12px;font-weight:bold;font-family:Helvetica;"><?php echo strtoupper($resDesig['DesigName']);?></td>
			  <td style="width:222px;font-size:12px;font-weight:bold;font-family:Helvetica;"><?php echo strtoupper($resDesig2['DesigName']); ?></td>
			 </tr>
			</table>
		   </td> 
		  </tr>
		  <tr><td>&nbsp;</td></tr>
		  <tr><td style="width:50px;">&nbsp;</td>
		  <td style="width:735px;font-size:18px;text-align:justify;">The eligibilities as per the revised structure are provided in Annexure A.</td>
		  <td style="width:50px;">&nbsp;</td>
		  </tr>
		  <tr><td>&nbsp;</td></tr>
		  <tr><td>&nbsp;</td></tr>
		  <tr><td style="width:50px;">&nbsp;</td>
		  <td style="width:735px;font-size:16px;text-align:center;">&nbsp;<b>Career Progression chart for Department:&nbsp;<?php echo $resDept2['DepartmentName']; ?></b></td>
		  <td style="width:50px;">&nbsp;</td>
		  </tr>
		  <tr>
		   <td style="width:50px;">&nbsp;</td>
		   <td>
		    <table border="1">
			 <tr bgcolor="#E2E2E2">
			  <td style="width:60px;font-size:18px;text-align:center;"><b>Grades</b></td>
			  <td style="width:724px;font-size:18px;text-align:center;"><b>Designations</b></td>
			 </tr>	
<?PHP if($resDP['New_DepartmentId']==1){ //HR ?>			 	 
 <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>MG</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Director</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Functional Lead/ National Lead</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Functional Lead/ National Lead</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager </td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager / Assistant General Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant General Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant/ DEO</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Support/ Assistant/ Trainees</td>
 </tr>
<?php } elseif($resDP['New_DepartmentId']==2){ //R&D ?>
<?php if($_REQUEST['e']!=2 AND $_REQUEST['e']!=10 AND $_REQUEST['e']!=65 AND $_REQUEST['e']!=120 AND $_REQUEST['e']!=165 AND $_REQUEST['e']!=166 AND $_REQUEST['e']!=210 AND $_REQUEST['e']!=300 AND $_REQUEST['e']!=301) { ?>
<tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>MG</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Head Research & Development</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Lead R&D (Crop) </td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Lead R&D (Crop)</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Research Coordinator</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Research Coordinator</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Principle Breeder(Crop)</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Principle /Senior Breeder(Crop)</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Breeder</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Breeder</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Breeder/ Assistant Breeder</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant Breeder/ Research Associate</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Research Associate</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Research Assistant</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Field supervisors </td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Field supervisors </td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Field Assistant</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Field Assistant/ Trainee</td>
 </tr>
<?php } else { ?>
<tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>MG</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Head Research & Development</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Lead Breeding Support  </td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Lead Breeding Support </td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Breeding Support Coordinator</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Breeding Support Coordinator</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Principle Scientist(Biotechnology/ Pathology/ Entomologist..)</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Principle / Senior Scientist(Biotechnology/ Pathology/ Entomologist..)</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Scientist(Biotechnology/ Pathology/ Entomologist..)</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Scientist(Biotechnology/ Pathology/ Entomologist..) </td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Scientist /Asst Scientist(Biotechnology/ Pathology/ Entomologist...)</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant Scientist/Research. Associate (Biotechnology/ Pathology/ Entomologist...).</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Research Associate</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Research Associate/ Research Assistant</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Lab Supervisor</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Lab Supervisor</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Lab Assistant</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Lab Assistant /Trainee</td>
 </tr>
<?php } ?>
<?php } elseif($resDP['New_DepartmentId']==3){ //PD ?>
<tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>MG</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Business Head</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;National Product Development lead</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager PD</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager PD</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Zonal Technical Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Zonal Technical Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Regional Technical Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Regional Technical Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Area Technical Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Area Technical Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Territory Technical Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Territory Technical Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior. Executive Technical</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Executive Technical</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Trial Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Trial Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;</td>
 </tr>
<?php } elseif($resDP['New_DepartmentId']==4){ //Production ?>
 <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>MG</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Head Supply Chain</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Lead Production</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager Production(Vegetables/Row crops)</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager Production(Vegetables/Row crops)</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant General Manager Production/ General Manager Production</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant General Manager Production</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Manager Production</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Manager Production</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Manager Production/ Assistant Manager Production</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Territory Manager Production</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant Territory Manager Production</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Executive Production</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Executive Production</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Executive Production</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Supervisor Production</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Field Assistant Production/ Supervisor Production</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Field Assistant Production</td>
 </tr>
<?php } elseif($resDP['New_DepartmentId']==5){ //Processing ?>
 <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>MG</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Head Supply Chain</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Lead Processing</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Lead Processing</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager Plant</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager Plant/ Assistant General Manager Plant</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant General Manager Plant</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Manager Plant</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Manager Plant</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Deputy Manager Operations(Vertical)</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant Manager/ Technical Lead</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant. Manager/ Technical Lead/ Plant Executive / Plant Engineer./ Senior. Supervisor Maintenance</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Plant Executive/ Plant Engineer./ Senior. Supervisor Maintenance</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Supervisor/ Senior Plant Operator/ Supervisor Maintenance/ Senior. Electrician</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Supervisor/ Senior Plant Operator/ Supervisor Maintenance/ Senior. Electrician</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Supervisor/ Electrician/ Technician/ Plant operator</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant/ Assistant Electrician/ Supervisor/ Electrician/ Asst Operator/ Technician</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant/ Assistant Electrician/ Assistant Operator</td>
 </tr>
<?php } elseif($resDP['New_DepartmentId']==6){ //Sales ?>
 <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>MG</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Business Head</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;National Sales Lead</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager Sales</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager Sales</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Zonal Business Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Zonal Sales Coordinator</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Regional Business Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Regional Business Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Area Business Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Area Business Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Coordinator Sales</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Territory Business Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Territory Sales Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Territory Sales Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Sales Executive/ Sales Executive Trainee</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Sales Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Sales Trainee</td>
 </tr>
<?php } elseif($resDP['New_DepartmentId']==7){ //Logistic ?>
 <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>MG</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Director</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Functional Lead/ National Lead</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Functional Lead/ National Lead</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager </td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager / Assistant General Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant General Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant/ DEO</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Support/ Assistant/ Trainees</td>
 </tr>
<?php } elseif($resDP['New_DepartmentId']==8){ //Finance ?>
<tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>MG</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Director</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Functional Lead/ National Lead</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Functional Lead/ National Lead</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager </td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager / Assistant General Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant General Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Executive/ Assistant Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant/ DEO</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Support/ Assistant/ Trainees</td>
 </tr>
<?php } elseif($resDP['New_DepartmentId']==9){ //IT ?>
<tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>MG</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Director</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Functional Lead/ National Lead</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Functional Lead/ National Lead</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager </td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager / Assistant General Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant General Manager IT</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Manager IT</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Manager IT/ Application Development(AD)/ Project Lead</td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Manager IT/ AD/Project Lead</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant Manager IT/ AD</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant Manager IT/ AD</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Executive IT/ AD</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Executive IT/ AD</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Executive IT/ AD</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Executive IT/ AD</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant IT/ DEO</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Support IT/ Assistant IT/ Trainee</td>
 </tr>
<?php } elseif($resDP['New_DepartmentId']==10){ //Legal ?>
 <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>MG</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Director</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Functional Lead/ National Lead</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Functional Lead/ National Lead</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager </td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager / Assistant General Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant General Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant/ DEO</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Support/ Assistant/ Trainees</td>
 </tr>
<?php } elseif($resDP['New_DepartmentId']==11){ //Admin ?>
 <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>MG</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Director</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Functional Lead/ National Lead</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Functional Lead/ National Lead</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager </td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager / Assistant General Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant General Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant/ DEO</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Support/ Assistant/ Trainees</td>
 </tr>
<?php } elseif($resDP['New_DepartmentId']==12){ //Marketing ?>
<tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>MG</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Business Head</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Marketing lead</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager Marketing</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager Marketing</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant General Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Product Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Product Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Product Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Manager Marketing Communication</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Manager Marketing Communication</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Manager Marketing Services</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Manager Marketing Services</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Marketing. Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Marketing Executive</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Marketing Trainee</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;</td>
 </tr>
<?php } elseif($resDP['New_DepartmentId']==17){ //Mngmt ?>
 <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>MG</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;</td>
 </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;</td>
 </tr>
<?php } elseif($resDP['New_DepartmentId']==24){ //QA ?>
 <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>MG</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Head Supply Chain </td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Lead Quality Assurance</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Lead Quality Assurance</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager QA</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager QA/ Assistant General Manager QA</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant General Manager QA</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Manager QA</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Manager QA</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Manager QA</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Asst Mgr QA</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Executive QA</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Executive QA</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Executive QA</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Executive QA</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Supervisor</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant/ Supervisor</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant</td>
 </tr>
<?php } elseif($resDP['New_DepartmentId']==25){ //FS ?>
 <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>MG</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Head Supply Chain </td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Lead Production</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager (Vegetables/Row crops)</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;General Manager(Vegetables/Row crops)</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant General Manager/ General Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>L1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant General Manager</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M5</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Manager FS</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Manager FS</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Manager FS</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant Manager FS</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>M1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Assistant Manager FS/ Senior Executive FS</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J4</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Senior Executive FS</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J3</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Executive FS(Warehouse/ Processing)</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Executive FS(Warehouse/ Processing)</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>J1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Supervisor</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S2</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Field Assistant/ Supervisor</td>
 </tr>
  <tr bgcolor="#FFFFFF"><td style="width:60px;font-size:14px;font-weight:bold;text-align:center;vertical-align:top;"><b>S1</b></td>
  <td style="width:500px;font-size:14px;font-weight:bold;vertical-align:top;text-align:center;">&nbsp;Field Assistant</td>
 </tr>
<?php } ?>
		 
			</table>
		   </td>
		   <td style="width:270px;">&nbsp;</td> 
		  </tr> 
         <tr><td>&nbsp;</td></tr>
	     <tr><td style="width:50px;">&nbsp;</td>
	     <td colspan="2"><b><i>Wishing you all the best for your progression in the revised organisation structure!</i></b></td></tr>
		 <tr><td>&nbsp;</td></tr>
		 <tr><td style="width:50px;">&nbsp;</td>
	     <td colspan="2" style="font-size:18px;">Warm Regards,</td></tr>
		 <tr><td>&nbsp;</td></tr>
		 <tr><td>&nbsp;</td></tr>
		 <tr><td>&nbsp;</td></tr>
		 <tr><td style="width:50px;">&nbsp;</td>
	     <td colspan="2" style="font-size:18px;font-weight:bold;"><b><?php if($resGrade2['GradeValue']=='L3' OR $resGrade2['GradeValue']=='L4' OR $resGrade2['GradeValue']=='L5' OR $resGrade2['GradeValue']=='MG') { echo 'Director'; }else{echo 'Human Resource'; } ?></b></td></tr>
		</table>
	  </td>
	 </tr>	 
   </table>
 </td>
</tr> 
<?php } ?>

</table>  
 
</body>
</html>

