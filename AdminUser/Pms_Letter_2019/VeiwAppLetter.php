<?php require_once('config/config.php'); 
$Set=mysql_query("select * from hrm_pms_setting where Process='PMS' AND CompanyId=".$_REQUEST['C'],$con); 
$rSet=mysql_fetch_array($Set); 
$SetpD=$rSet['PrintDate']; $SeteD=$rSet['EffectedDate']; $SetMsg=$rSet['WishingMsg']; 
$SetPeD=$rSet['Prod_EffectedDate']; $Ass2Year=$rSet['LettPeriod']; ?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title><?php include_once('../Title.php'); ?></title>
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script language="javascript" type="text/javascript">
function PrintLetter(P,E,Y,C,R,G,D) 
{ document.getElementById("PrtId").style.display='none'; window.print(); }
//window.open("VeiwAppLetterPrint.php?action=Letter&P="+P+"&E="+E+"&Y="+Y+"&C="+C+"&R="+R+"&G="+G+"&D="+D,"AppLetter","location=no,scrollbars=no,resizable=no,menubar=no,width=820,height=750");
</script>
</head>
<body>
<table>
<tr><td style="font-family:Times New Roman;color:#000000;font-size:13px;width:785;" align="right"><span id="PrtId"><a href="#" onClick="PrintLetter(<?php echo $_REQUEST['P'].','.$_REQUEST['E'].','.$_REQUEST['Y'].','.$_REQUEST['C'].','.$_REQUEST['R']; ?>,'<?php echo $_REQUEST['G']; ?>',<?php echo $_REQUEST['D']; ?>)" style="text-decoration:none;"><font id="FonPC" style="color:#000099;">Print</font></a>&nbsp;&nbsp;</span></td></tr>
<?php if($_REQUEST['action']=='Letter') { $SqlE=mysql_query("SELECT hrm_employee.*, Gender, DR, Married, DepartmentId, DateJoining FROM hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee.EmployeeID=".$_REQUEST['E']." AND CompanyId=".$_REQUEST['C'], $con); $ResE=mysql_fetch_assoc($SqlE); 
if($ResE['DR']=='Y'){$M='Dr.';} elseif($ResE['Gender']=='M'){$M='Mr.';} elseif($ResE['Gender']=='F'){$M='Ms.';} 
$NameE=$M.' '.$ResE['Fname'].'&nbsp;'.$ResE['Sname'].'&nbsp;'.$ResE['Lname'];
$SqlY=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['Y'], $con); $ResY=mysql_fetch_assoc($SqlY);
$From=date("Y",strtotime($ResY['FromDate'])); $To=date("Y",strtotime($ResY['ToDate'])); $ToTo=$From-1; $AssYear=$ToTo.'-'.date("y",strtotime($ResY['FromDate']));
$FD1=$From-1; $FD2=$From; 

$SqlPMS=mysql_query("select HOD_EmployeeID, Appraiser_EmployeeID, Reviewer_EmployeeID, HR_Curr_DepartmentId, HR_CurrDesigId, HR_CurrGradeId, HR_DesigId, HR_GradeId, HR_ProIncSalary, Extra3Month, HR_Percent_ProIncSalary, HR_ProCorrSalary, HR_Percent_ProCorrSalary, HR_IncNetMonthalySalary, HR_Percent_IncNetMonthalySalary, HR_Proposed_ActualPercent, HR_GrossMonthlySalary, HR_GrossAnnualSalary, HR_CTC from hrm_employee_pms where EmpPmsId=".$_REQUEST['P']." AND EmployeeID=".$_REQUEST['E'], $con); $ResPMS=mysql_fetch_assoc($SqlPMS);

$sqlGr2=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResPMS['HR_CurrGradeId']." AND CompanyId=".$_REQUEST['C'], $con); $resGr2=mysql_fetch_assoc($sqlGr2);
//echo 'aa='.$resGr2['GradeValue'];
 
$sqlDept=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$ResE['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlD=mysql_query("select DesigName from hrm_designation where DesigId=".$_REQUEST['D'], $con); $resD=mysql_fetch_assoc($sqlD);
$sqlG=mysql_query("select GradeValue from hrm_grade where GradeValue='".$_REQUEST['G']."' AND CompanyId=".$_REQUEST['C'], $con); $resG=mysql_fetch_assoc($sqlG);

//$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$_REQUEST['G'], $con); $resG=mysql_fetch_assoc($sqlG);  

$sqlM = mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChDate FROM hrm_pms_appraisal_history where EmpCode=".$ResE['EmpCode']." AND SalaryChange_Date!='2019-01-02' AND CompanyId=".$_REQUEST['C'], $con); $resM = mysql_fetch_assoc($sqlM); $sqlS = mysql_query("SELECT Current_Grade, Current_Designation, Previous_GrossSalaryPM FROM hrm_pms_appraisal_history where SalaryChange_Date='".$resM['SalaryChDate']."' AND EmpCode=".$ResE['EmpCode']." AND CompanyId=".$_REQUEST['C'], $con); $resS = mysql_fetch_assoc($sqlS); 
$sqlPer=mysql_query("select IncDistriFrom from hrm_pms_increment_dis where Rating=".$_REQUEST['R']." AND YearId=".$_REQUEST['Y']." AND CompanyId=".$_REQUEST['C'], $con);
$resPer=mysql_fetch_assoc($sqlPer); 

/*$sqlMaxMin= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dis WHERE Rating=".$_REQUEST['R']." AND YearId=".$_REQUEST['Y']." AND CompanyId=".$_REQUEST['C'], $con);$resMaxMin = mysql_fetch_assoc($sqlMaxMin); */

$ss= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_disrev WHERE Rating=".$_REQUEST['R']." AND HodId=".$ResPMS['HOD_EmployeeID']." AND (RevId=".$ResPMS['Appraiser_EmployeeID']." OR RevId=".$ResPMS['Reviewer_EmployeeID'].")  AND YearId=".$_REQUEST['Y']." AND IncDistriFrom>0 AND CompanyId=".$_REQUEST['C'], $con); 
$rr=mysql_num_rows($ss);
if($rr>0){ $resMaxMin = mysql_fetch_assoc($ss); }
else
{
 $ss1= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_disdept WHERE Rating=".$_REQUEST['R']." AND HodId=".$ResPMS['HOD_EmployeeID']." AND DeptId=".$ResPMS['HR_Curr_DepartmentId']." AND YearId=".$_REQUEST['Y']." AND IncDistriFrom>0 AND CompanyId=".$_REQUEST['C'], $con); $rr1=mysql_num_rows($ss1);
 if($rr1>0){ $resMaxMin = mysql_fetch_assoc($ss1); }
 else
 {
  $ss2= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dishod WHERE Rating=".$_REQUEST['R']." AND HodId=".$ResPMS['HOD_EmployeeID']." AND YearId=".$_REQUEST['Y']." AND IncDistriFrom>0 AND CompanyId=".$_REQUEST['C'], $con); 
  $rr2=mysql_num_rows($ss2);
  if($rr2>0){ $resMaxMin = mysql_fetch_assoc($ss2); }
  else
  {
   $sqlMaxMin= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dis WHERE Rating=".$_REQUEST['R']." AND YearId=".$_REQUEST['Y']." AND CompanyId=".$_REQUEST['C'], $con); $resMaxMin = mysql_fetch_assoc($sqlMaxMin); 
  }
 }
}

?> 			
<tr>
 <td align="center">
   <table border="0" width="790">
	 <tr><td>&nbsp;</td></tr>
     <tr><td align="center" valign="top" style="font-size:20px; color:#000000; font-family:Times New Roman; font-weight:bold;">&nbsp;</td></tr>
	 <tr><td>&nbsp;</td></tr>
	 
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr>
		    <td style="width:100px;">&nbsp;</td>
		    <td style="width:385px;font-size:16px;font-weight:bold;">Ref: HR/App Lt/<?php echo date("Y"); ?>/EC No:&nbsp;<?php echo $ResE['EmpCode'];  ?></td>
			<td style="width:80px;">&nbsp;</td>
			<td style="width:220px;font-size:16px;font-weight:bold;" align="right">Date:&nbsp;<?php echo $SetpD; ?></td>
			<td style="width:50px;">&nbsp;</td>
		  </tr>
		</table>
	  </td>
	 </tr>
	 <tr><td>&nbsp;</td></tr>
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr><td style="width:100px;">&nbsp;</td><td style="width:685px;font-size:16px;font-weight:bold;">To,</td><td style="width:50px;">&nbsp;</td></tr>
		  <tr><td style="width:50px;">&nbsp;</td><td style="width:685px;font-size:16px;color:#660000;font-weight:bold;"><?php echo $NameE; ?></td>
		      <td style="width:50px;">&nbsp;</td></tr>
		  <tr><td style="width:50px;">&nbsp;</td><td style="width:685px;font-size:16px;color:#660000;font-weight:bold;">EC No:&nbsp;<?php echo $ResE['EmpCode']; ?></td>
		      <td style="width:50px;">&nbsp;</td></tr>
		  <tr><td style="width:50px;">&nbsp;</td><td style="width:685px;font-size:16px;color:#660000;font-weight:bold;">Dept:&nbsp;<?php echo $resDept['DepartmentName']; ?></td>
		      <td style="width:50px;">&nbsp;</td></tr>
		</table>
	  </td>
	 </tr>
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr><td style="width:100px;">&nbsp;</td><td style="width:685px;font-size:16px;font-weight:bold;">Subject:&nbsp;Appraisal Letter</td>
		      <td style="width:50px;">&nbsp;</td></tr>
		</table>
	  </td>
	 </tr>
	 <tr><td>&nbsp;</td></tr>
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr><td style="width:100px;">&nbsp;</td><td style="width:685px;font-size:16px;color:#660000;font-weight:bold;">Dear&nbsp;<?php echo $NameE; ?></td>
		      <td style="width:50px;">&nbsp;</td></tr>
		</table>
	  </td>
	 </tr> 
<?php $SqlR=mysql_query("select RatingName from hrm_pms_rating where Rating=".$_REQUEST['R'],$con); 
      $ResR=mysql_fetch_assoc($SqlR); ?>
	  	 
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr><td style="width:100px;">&nbsp;</td>
		  <td style="width:685px;font-size:16px;text-align:justify;">
		   <?php if($_REQUEST['R']==1.0){ include_once('ViewLRat1.php'); }elseif($_REQUEST['R']==2.0){ include_once('ViewLRat2.php'); }elseif($_REQUEST['R']==2.5){ include_once('ViewLRat25.php'); }elseif($_REQUEST['R']==2.7){ include_once('ViewLRat27.php'); }elseif($_REQUEST['R']==2.9){ include_once('ViewLRat29.php'); }elseif($_REQUEST['R']==3.0){ include_once('ViewLRat3.php'); }elseif($_REQUEST['R']==3.2){ include_once('ViewLRat32.php'); }elseif($_REQUEST['R']==3.4){ include_once('ViewLRat34.php'); }elseif($_REQUEST['R']==3.5){ include_once('ViewLRat35.php'); }elseif($_REQUEST['R']==3.7){ include_once('ViewLRat37.php'); }elseif($_REQUEST['R']==3.9){ include_once('ViewLRat39.php'); }elseif($_REQUEST['R']==4.0){ include_once('ViewLRat4.php'); }elseif($_REQUEST['R']==4.2){ include_once('ViewLRat42.php'); }elseif($_REQUEST['R']==4.4){ include_once('ViewLRat44.php'); }elseif($_REQUEST['R']==4.5){ include_once('ViewLRat45.php'); }elseif($_REQUEST['R']==4.7){ include_once('ViewLRat47.php'); }elseif($_REQUEST['R']==4.9){ include_once('ViewLRat49.php'); }elseif($_REQUEST['R']==5.0){ include_once('ViewLRat5.php'); } ?>
		   <b><i><?php echo $SetMsg; ?>!</i></b>  
		  </td><td style="width:50px;">&nbsp;</td></tr>
		</table>
	  </td>
	</tr>							
	
 	 
   <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0" cellpadding="0" cellspacing="0">
		  <tr><td style="width:100px;">&nbsp;</td><td style="width:685px;font-size:16px;font-weight:bold;">&nbsp;</td><td style="width:50px;">&nbsp;</td></tr>
		  <tr><td style="width:50px;">&nbsp;</td>
		  <td style="width:685px;font-size:16px;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($_REQUEST['C']==1 AND ($_REQUEST['G']!='L3' AND $_REQUEST['G']!='L4' AND $_REQUEST['G']!='L5' AND $_REQUEST['G']!='MG' AND $_REQUEST['E']!=263)){echo '<img src="images/lsign.jpg" border="0" />';}?></td>
		  <td style="width:50px;">&nbsp;</td></tr>
		  <tr><td style="width:50px;">&nbsp;</td>
		  <td>
		   <table><tr>
		   <td style="width:343px;font-size:16px;font-weight:bold;">
		   <?php if($_REQUEST['C']==1 AND ($_REQUEST['G']!='L3' AND $_REQUEST['G']!='L4' AND $_REQUEST['G']!='L5' AND $_REQUEST['G']!='MG' AND $_REQUEST['E']!=263)){echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Human Resource';}
		         elseif($_REQUEST['C']==1 AND ($_REQUEST['G']=='L3' OR $_REQUEST['G']=='L4' OR $_REQUEST['G']=='L5' OR $_REQUEST['G']=='MG' OR $_REQUEST['E']==263)){echo 'Director\Managing Director';}
		            elseif($_REQUEST['C']==3 AND $_REQUEST['E']!=254) {echo 'National Head'; }
		            elseif($_REQUEST['C']==3 AND $_REQUEST['E']==254) {echo 'Managing Director'; } ?>
		   </td>
		   <td style="width:342px;font-size:16px;font-weight:bold;" align="right">
		   <?php //if($_REQUEST['D']==98 OR $_REQUEST['D']==115 OR $_REQUEST['D']==116 OR $_REQUEST['D']==117) { echo 'Director'; } ?>
		   </td>
		   </tr></table>		   
		   </td>
		  <td style="width:50px;">&nbsp;</td></tr>
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

