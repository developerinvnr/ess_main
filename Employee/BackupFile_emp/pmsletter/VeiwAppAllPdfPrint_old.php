<?php require_once('../../AdminUser/config/config.php'); 
$Set=mysql_query("select * from hrm_pms_setting where Process='PMS' AND CompanyId=".$_REQUEST['C'],$con); 
$rSet=mysql_fetch_array($Set); $SetpD=$rSet['PrintDate']; $SeteD=$rSet['EffectedDate']; $SetMsg=$rSet['WishingMsg']; 
$SetPeD=$rSet['Prod_EffectedDate']; $Ass2Year=$rSet['LettPeriod']; ?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script language="javascript" type="text/javascript">
function Printpage() { window.print(); } //window.close();
</script>
<style> printLink{display : none;} .pagebreak { page-break-before: always; } </style>
</head>
<body onLoad="Printpage()">
<table style="margin-top:0px;">
<tr><td style="font-family:Times New Roman;color:#000000;font-size:13px;width:785;" align="right">&nbsp;</td></tr>
<?php if($_REQUEST['action']=='All') { $SqlE=mysql_query("SELECT e.EmployeeID, EmpCode, Fname, Sname, Lname, Gender, DR, Married, DepartmentId, HqId, DateJoining, RepEmployeeID, EmpVertical FROM hrm_employee e INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID WHERE e.EmployeeID=".$_REQUEST['E']." AND e.CompanyId=".$_REQUEST['C'], $con); $ResE=mysql_fetch_assoc($SqlE);
 
if($ResE['DR']=='Y'){$M='Dr.';} elseif($ResE['Gender']=='M'){$M='Mr.';} elseif($ResE['Gender']=='F'){$M='Ms.';}  
$NameE=$M.' '.$ResE['Fname'].'&nbsp;'.$ResE['Sname'].'&nbsp;'.$ResE['Lname'];
$SqlY=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['Y'], $con); $ResY=mysql_fetch_assoc($SqlY);
$From=date("Y",strtotime($ResY['FromDate'])); $To=date("Y",strtotime($ResY['ToDate'])); $ToTo=$From-1; 
$AssYear=$ToTo.' - '.date("y",strtotime($ResY['FromDate']));
$FD1=$From-1; $FD2=$From;
 
$SqlPMS=mysql_query("select EmpCurrCtc, HOD_EmployeeID, Appraiser_EmployeeID, Reviewer_EmployeeID, Rev2_EmployeeID, HR_Curr_DepartmentId, HR_CurrDesigId, HR_CurrGradeId, HR_DesigId, HR_GradeId, EmpCurrCtc, Reviewer_TotalFinalRating, Hod_TotalFinalRating, HR_ProIncCTC, HR_Percent_ProIncCTC, HR_ProCorrCTC, HR_Percent_ProCorrCTC, HR_Proposed_ActualCTC, HR_IncNetCTC, HR_Percent_IncNetCTC, Extra3Month from hrm_employee_pms where EmpPmsId=".$_REQUEST['P']." AND EmployeeID=".$_REQUEST['E'], $con); $ResPMS=mysql_fetch_assoc($SqlPMS);

$sqlGr2=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResPMS['HR_CurrGradeId']." AND CompanyId=".$_REQUEST['C'], $con); $resGr2=mysql_fetch_assoc($sqlGr2);

$SqlR=mysql_query("SELECT EmpCode, Fname, Sname, Lname, Gender, DR, Married, DesigName FROM hrm_employee e INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_designation de on g.DesigId=de.DesigId WHERE e.EmployeeID=".$ResE['RepEmployeeID']." AND e.CompanyId=".$_REQUEST['C'], $con); $ResR=mysql_fetch_assoc($SqlR); 
if($ResR['DR']=='Y'){$Mr='Dr.';} elseif($ResR['Gender']=='M'){$Mr='Mr.';} elseif($ResR['Gender']=='F'){$Mr='Ms.';}  
$NameR=$Mr.' '.$ResR['Fname'].'&nbsp;'.$ResR['Sname'].'&nbsp;'.$ResR['Lname'].'('.ucwords(strtolower($ResR['DesigName'])).')';
$DesigR=ucwords(strtolower($ResR['DesigName']));

$sHq=mysql_query("select HqName from hrm_headquater where HqId=".$ResE['HqId'],$con); $rHq=mysql_fetch_assoc($sHq);
if($ResE['EmpVertical']>0){ $sVert=mysql_query("select VerticalName from hrm_department_vertical where VerticalId=".$ResE['EmpVertical'],$con); $rVrt=mysql_fetch_assoc($sVert); $VerticalName=$rVrt['VerticalName']; }
else{ $VerticalName='';}

$sqlDept=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$ResE['DepartmentId'], $con); 
$sqlD=mysql_query("select DesigName from hrm_designation where DesigId=".$_REQUEST['D'], $con); 
$sqlG=mysql_query("select GradeValue from hrm_grade where GradeValue='".$_REQUEST['G']."' AND CompanyId=".$_REQUEST['C'], $con); $resDept=mysql_fetch_assoc($sqlDept); $resD=mysql_fetch_assoc($sqlD); $resG=mysql_fetch_assoc($sqlG);

$sqlM = mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChDate FROM hrm_pms_appraisal_history where EmpCode=".$ResE['EmpCode']." AND SalaryChange_Date!='2019-01-02' AND CompanyId=".$_REQUEST['C'], $con); $resM = mysql_fetch_assoc($sqlM); $sqlS = mysql_query("SELECT Current_Grade, Current_Designation, Previous_GrossSalaryPM FROM hrm_pms_appraisal_history where SalaryChange_Date='".$resM['SalaryChDate']."' AND EmpCode=".$ResE['EmpCode']." AND CompanyId=".$_REQUEST['C'], $con); 
$resS = mysql_fetch_assoc($sqlS); 
$sqlPer=mysql_query("select IncDistriFrom from hrm_pms_increment_dis where Rating=".$_REQUEST['R']." AND YearId=".$_REQUEST['Y']." AND CompanyId=".$_REQUEST['C'], $con); $resPer=mysql_fetch_assoc($sqlPer); 

$sqlGap=mysql_query("select Gap1,Gap2 from hrm_pms_setting where Process='PMS' AND CompanyId=".$_REQUEST['C'], $con); $resGap=mysql_fetch_assoc($sqlGap); 

/*$sqlMaxMin= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dis WHERE Rating=".$_REQUEST['R']." AND YearId=".$_REQUEST['Y']." AND CompanyId=".$_REQUEST['C'], $con);$resMaxMin = mysql_fetch_assoc($sqlMaxMin); */

/**************** aaa bbbb cccc ********************/ 
/**************** aaa bbbb cccc ********************/ 
if($ResPMS['Hod_TotalFinalRating']>0){ $RatingHod=$ResPMS['Hod_TotalFinalRating']; } 
else{ $RatingHod=$ResPMS['Reviewer_TotalFinalRating']; } 

$ss02= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_disbuc WHERE Rating=".$_REQUEST['R']." AND HodId=".$ResPMS['HOD_EmployeeID']." AND DeptId=".$ResPMS['HR_Curr_DepartmentId']." AND BUCId=".$ResE['EmpVertical']." AND Hod2Id=0 AND RevId=".$ResPMS['Reviewer_EmployeeID']." AND YearId=".$_REQUEST['Y']." AND IncDistriFrom>0 AND CompanyId=".$_REQUEST['C'], $con); $rr02=mysql_num_rows($ss02);
if($rr02>0){ $resMaxMin = mysql_fetch_assoc($ss02); }
else
{ 
/* ppppppppppppppp */
$ss01= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_disbuc WHERE Rating=".$_REQUEST['R']." AND HodId=".$ResPMS['HOD_EmployeeID']." AND DeptId=".$ResPMS['HR_Curr_DepartmentId']." AND BUCId=".$ResE['EmpVertical']." AND Hod2Id=".$ResPMS['Rev2_EmployeeID']." AND RevId=0 AND YearId=".$_REQUEST['Y']." AND IncDistriFrom>0 AND CompanyId=".$_REQUEST['C'], $con); $rr01=mysql_num_rows($ss01);
if($rr01>0){ $resMaxMin = mysql_fetch_assoc($ss01); }
else
{ 
/* oooooooooooooooo */
$ss0= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_disbuc WHERE Rating=".$_REQUEST['R']." AND HodId=".$ResPMS['HOD_EmployeeID']." AND DeptId=".$ResPMS['HR_Curr_DepartmentId']." AND BUCId=".$ResE['EmpVertical']." AND Hod2Id=0 AND RevId=0 AND YearId=".$_REQUEST['Y']." AND IncDistriFrom>0 AND CompanyId=".$_REQUEST['C'], $con); $rr0=mysql_num_rows($ss0);
if($rr0>0){ $resMaxMin = mysql_fetch_assoc($ss0); }
else
{ 
 $ss= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_disrev WHERE Rating=".$_REQUEST['R']." AND HodId=".$ResPMS['HOD_EmployeeID']." AND DeptId=".$ResPMS['HR_Curr_DepartmentId']." AND (RevId=".$ResPMS['Appraiser_EmployeeID']." OR RevId=".$ResPMS['Reviewer_EmployeeID'].") AND YearId=".$_REQUEST['Y']." AND IncDistriFrom>0 AND CompanyId=".$_REQUEST['C'], $con); $rr=mysql_num_rows($ss);
 if($rr>0){ $resMaxMin = mysql_fetch_assoc($ss); }
 else
 {
  $ss1= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dishod2 WHERE Rating=".$_REQUEST['R']." AND HodId=".$ResPMS['HOD_EmployeeID']." AND DeptId=".$ResPMS['HR_Curr_DepartmentId']." AND Hod2Id=".$ResPMS['Rev2_EmployeeID']." AND YearId=".$_REQUEST['Y']." AND IncDistriFrom>0 AND CompanyId=".$_REQUEST['C'], $con); $rr1=mysql_num_rows($ss1);
  if($rr1>0){ $resMaxMin = mysql_fetch_assoc($ss1); }
  else
  {
   $ss2= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_disdept WHERE Rating=".$_REQUEST['R']." AND HodId=".$ResPMS['HOD_EmployeeID']." AND DeptId=".$ResPMS['HR_Curr_DepartmentId']." AND YearId=".$_REQUEST['Y']." AND IncDistriFrom>0 AND CompanyId=".$_REQUEST['C'], $con); 
   $rr2=mysql_num_rows($ss2);
   if($rr2>0){ $resMaxMin = mysql_fetch_assoc($ss2); }
   else
   {
    $ss3= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dishod WHERE Rating=".$_REQUEST['R']." AND HodId=".$ResPMS['HOD_EmployeeID']." AND YearId=".$_REQUEST['Y']." AND IncDistriFrom>0 AND CompanyId=".$_REQUEST['C'], $con);
	$rr3=mysql_num_rows($ss3);
    if($rr3>0){ $resMaxMin = mysql_fetch_assoc($ss3); }
	else
    {
     $sqlMaxMin= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dis WHERE Rating=".$_REQUEST['R']." AND YearId=".$_REQUEST['Y']." AND CompanyId=".$_REQUEST['C'], $con); $resMaxMin = mysql_fetch_assoc($sqlMaxMin); 
    } //$ss3	
   } //$ss2
  } //$ss1
 } //$ss
} //$ss0  
/* oooooooooooooooo */
}
/* ppppppppppppppp */
}

/**************** aaa bbbb cccc ********************/ 
/**************** aaa bbbb cccc ********************/

?> 			
<tr>
 <td align="center" style="margin-top:0px;">
   <table border="0" width="790">
    <tr>
	  <td>
	  <table>
	   <tr>
	   <td style="width:73px;">&nbsp;</td>
	   <td><img src="../../AdminUser/images/ltop.png" border="0" style="height:60px;"/></td>
	   </tr>
	  </table>
	  </td>
	 </tr>
     
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr>
		    <td style="width:100px;">&nbsp;</td>
		    <td style="width:385px;font-size:16px;font-weight:bold;">Ref: HR/App Lt/<?php echo date("Y"); ?>/EC No:&nbsp;<?php echo $ResE['EmpCode'];  ?></td>

			<td style="width:70px;">&nbsp;</td>
			<td style="width:230px;font-size:16px;font-weight:bold;" align="right">Date:&nbsp;<?php echo $SetpD; ?></td>
			<td style="width:50px;">&nbsp;</td>
		  </tr>
		</table>
	  </td>
	 </tr>
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
          <tr><td style="width:50px;">&nbsp;</td>
		  <td style="width:685px;font-size:18px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($_REQUEST['C']==1 AND ($_REQUEST['G']!='L3' AND $_REQUEST['G']!='L4' AND $_REQUEST['G']!='L5' AND $_REQUEST['G']!='MG' AND $_REQUEST['E']!=263)){echo '<img src="../../AdminUser/images/lsign.jpg" border="0" />';}else{echo '<u>This is an e-generated letter, signed copy shall be provided later</u>';}?></td>
		  <td style="width:50px;">&nbsp;</td></tr>
		  <tr>
		   <td style="width:50px;">&nbsp;</td>
		  <td>
		   <table><tr>
		   <td style="width:343px;font-size:16px;font-weight:bold;">
		   <?php if($_REQUEST['C']==1 AND ($_REQUEST['G']!='L3' AND $_REQUEST['G']!='L4' AND $_REQUEST['G']!='L5' AND $_REQUEST['G']!='MG' AND $_REQUEST['E']!=263)){echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Human Resource';}
		         elseif($_REQUEST['C']==1 AND ($_REQUEST['G']=='L3' OR $_REQUEST['G']=='L4' OR $_REQUEST['G']=='L5' OR $_REQUEST['G']=='MG' OR $_REQUEST['E']==263)){echo '';}
		   elseif($_REQUEST['C']==3 AND $_REQUEST['E']!=254) {echo 'National Head'; }
		   elseif($_REQUEST['C']==3 AND $_REQUEST['E']==254) {echo 'Managing Director'; } ?>
		   </td>
		   <td style="width:342px;font-size:16px;font-weight:bold;" align="right">
		   <?php //if(($_REQUEST['C']==1 OR $_REQUEST['C']==2) AND ($_REQUEST['D']==98 OR $_REQUEST['D']==115 OR $_REQUEST['D']==116 OR $_REQUEST['D']==117)) { echo 'Director'; }?>
		   </td>
		   </tr></table>		   
		   </td>
		  <td style="width:50px;">&nbsp;</td>
		  </tr>
		  <tr><td colspan="3" align="center"><hr color="#000000"></hr></td></tr>
		  <tr><td colspan="3" align="center"><img src="../../AdminUser/images/lfooter.png" border="0"/></td></tr>
		</table>
	  </td>
	 </tr>		 
   </table>
 </td>
</tr> 
</table>
<?php } ?>

<div class="pagebreak"> </div>

<!--<tr class="pagebreak"><td></td></tr>-->
<?php /************************* CTC CTC CTC ********************************/ ?>
<?php /************************* CTC CTC CTC ********************************/ ?>
<table style="width:100%;">
<tr><td style="font-family:Times New Roman;color:#000000;font-size:13px;width:785;" align="right">&nbsp;</td></tr>
<?php 

if($_REQUEST['C']==1){ $qry="hrm_employee_ctc.CtcCreatedDate='".date("Y-01-01")."'"; }
elseif($_REQUEST['C']==3){ $qry="hrm_employee_ctc.CtcCreatedDate='".date("Y-04-01")."'"; }

if($_REQUEST['action']=='All') { $SqlCtc=mysql_query("SELECT hrm_employee.*, hrm_employee_ctc.*, Gender, DR, Married FROM hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_ctc ON hrm_employee.EmployeeID=hrm_employee_ctc.EmployeeID WHERE hrm_employee.EmployeeID=".$_REQUEST['E']." AND ".$qry." AND hrm_employee.CompanyId=".$_REQUEST['C'], $con); $ResCtc=mysql_fetch_assoc($SqlCtc); 
if($ResCtc['DR']=='Y'){$M='Dr.';} elseif($ResCtc['Gender']=='M'){$M='Mr.';} elseif($ResCtc['Gender']=='F'){$M='Ms.';}
$NameE=$M.' '.$ResCtc['Fname'].'&nbsp;'.$ResCtc['Sname'].'&nbsp;'.$ResCtc['Lname'];
$SqlY=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['Y'], $con); $ResY=mysql_fetch_assoc($SqlY);
$From=date("Y",strtotime($ResY['FromDate'])); $To=date("Y",strtotime($ResY['ToDate'])); $ToTo=$From-1; $AssYear=$ToTo.'-'.date("y",strtotime($ResY['FromDate']));

$SqlStat=mysql_query("select hrm_company_statutory_lumpsum.*,hrm_company_statutory_taxsaving.*,hrm_company_statutory_pf.* from hrm_company_statutory_lumpsum INNER JOIN hrm_company_statutory_taxsaving ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_taxsaving.CompanyId INNER JOIN hrm_company_statutory_pf ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_pf.CompanyId where hrm_company_statutory_lumpsum.CompanyId=".$_REQUEST['C'], $con); $ResStat=mysql_fetch_assoc($SqlStat);
?> 			

<tr>
 <td align="center">
   <table border="0" width="790">
     <tr><td align="center" valign="top" style="font-size:20px; color:#000000; font-family:Times New Roman; font-weight:bold;"><u>CTC(Annexure-A)</u></td></tr>
	 <tr><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td></tr>
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr>
		    <td style="width:50px;">&nbsp;</td>
		    <td style="width:385px;font-size:18px;font-weight:bold;"><?php echo $NameE; ?> / EC No:&nbsp;<?php echo $ResCtc['EmpCode'];  ?></td>
			<td style="width:100px;">&nbsp;</td>
			<td style="width:200px;font-size:18px;font-weight:bold;" align="right" valign="top">Date:&nbsp;<?php echo $SetpD; ?></td>
			<td style="width:50px;">&nbsp;</td>
		  </tr>
		</table>
	  </td>
	 </tr>
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000;width:785;" align="center">
	  <?php include_once('ViewCtc.php'); ?>
	  </td>
	 </tr>
	  <tr>
     <td>
	   <table><tr><td style="width:50px;">&nbsp;</td><td style="width:685px;font-size:14px;"><b><u>Note</u>  :</b><?php if($ResCtc['BONUS_Value']>0){ ?><b>Bonus shall be paid as per the applicability of the Bonus Act</b>. <?php } ?>This is a confidential document not to be discussed openly with others. You shall be personally responsible for any leakage of information regarding your compensation .
	   <?php /************/  if($rowchk>0 && $row2chk>0){ ?><br>
  <b><font size="4">*</font> Your salary structure (X) has changed as you have opted for PF deduction on Actual basic as shown in (Y).</b>
       <?php /************/  } ?>
	   
	   </td></tr></table>
	 </td>
   </tr>			
   <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0" cellpadding="0" cellspacing="0">
		  <tr><td style="width:50px;">&nbsp;</td><td style="width:685px;font-size:18px;font-weight:bold;">&nbsp;</td><td style="width:50px;">&nbsp;</td></tr>
          <tr><td style="width:50px;">&nbsp;</td>
		  <td style="width:685px;font-size:18px;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($_REQUEST['C']==1 AND ($_REQUEST['G']!='L3' AND $_REQUEST['G']!='L4' AND $_REQUEST['G']!='L5' AND $_REQUEST['G']!='MG' AND $_REQUEST['E']!=263)){echo '<img src="../../AdminUser/images/lsign.jpg" border="0" />';}?></td>
		  <td style="width:50px;">&nbsp;</td></tr>
		  
		  <tr><td style="width:50px;">&nbsp;</td>
		  <td>
		   <table><tr>
		   <td style="width:343px;font-size:18px;font-weight:bold;">
		    <?php if($_REQUEST['C']==1 AND ($_REQUEST['G']!='L3' AND $_REQUEST['G']!='L4' AND $_REQUEST['G']!='L5' AND $_REQUEST['G']!='MG' AND $_REQUEST['E']!=263)){echo 'Human Resource';}
		          elseif($_REQUEST['C']==1 AND ($_REQUEST['G']=='L3' OR $_REQUEST['G']=='L4' OR $_REQUEST['G']=='L5' OR $_REQUEST['G']=='MG' OR $_REQUEST['E']==263)){echo '';}
		          elseif($_REQUEST['C']==3 AND $_REQUEST['E']!=254) {echo 'National Head'; }
		          elseif($_REQUEST['C']==3 AND $_REQUEST['E']==254) {echo 'Managing Director'; } ?></td>
		   <td style="width:342px;font-size:18px;font-weight:bold;" align="right">
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
 </table>
<?php } ?> 

<div class="pagebreak"> </div>

<!--<tr class="pagebreak"><td></td></tr>-->
<?php /************************* Eligibility Eligibility Eligibility ********/ ?>
<?php /************************* Eligibility Eligibility Eligibility ********/ ?>
<table style="width:100%;">
<tr><td style="font-family:Times New Roman;color:#000000;font-size:15px;width:785;" align="right">&nbsp;</td></tr>
<tr><td style="font-family:Times New Roman;color:#000000;font-size:15px;width:785;" align="right">&nbsp;</td></tr>
<?php if($_REQUEST['action']=='All') { $SqlE=mysql_query("SELECT hrm_employee.*, DepartmentId, Gender, DR, Married, EmpAddBenifit_MediInsu_value FROM hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_ctc ON hrm_employee.EmployeeID=hrm_employee_ctc.EmployeeID WHERE hrm_employee.EmployeeID=".$_REQUEST['E']." AND CompanyId=".$_REQUEST['C'], $con); $ResE=mysql_fetch_assoc($SqlE); 
if($ResE['DR']=='Y'){$M='Dr.';} elseif($ResE['Gender']=='M'){$M='Mr.';} elseif($ResE['Gender']=='F'){$M='Ms.';}  
$NameE=$M.' '.$ResE['Fname'].'&nbsp;'.$ResE['Sname'].'&nbsp;'.$ResE['Lname'];
$SqlY=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['Y'], $con); $ResY=mysql_fetch_assoc($SqlY);
$From=date("Y",strtotime($ResY['FromDate'])); $To=date("Y",strtotime($ResY['ToDate'])); $ToTo=$From-1; $AssYear=$ToTo.'-'.date("y",strtotime($ResY['FromDate']));
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeValue='".$_REQUEST['G']."' AND CompanyId=".$_REQUEST['C'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);

//$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$_REQUEST['G'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);

      if($resGrade['GradeValue']!='')
	  {
      $sqlLod=mysql_query("select * from hrm_lodentitle where GradeValue='".$resGrade['GradeValue']."'", $con); $resLod=mysql_fetch_assoc($sqlLod); 
	  $sqlDaily=mysql_query("select * from hrm_dailyallow where GradeValue='".$resGrade['GradeValue']."'", $con); $resDaily=mysql_fetch_assoc($sqlDaily);
	  $sqlEnt=mysql_query("select * from hrm_travelentitle where GradeValue='".$resGrade['GradeValue']."'", $con); $resEnt=mysql_fetch_assoc($sqlEnt);
	  $sqlElig=mysql_query("select * from hrm_traveleligibility where GradeValue='".$resGrade['GradeValue']."'", $con); $resElig=mysql_fetch_assoc($sqlElig); 

	  } 	  

$SqlEligEmp = mysql_query("SELECT * FROM hrm_employee_eligibility WHERE EmployeeID=".$_REQUEST['E']." AND Status='A'", $con) or die(mysql_error());  $ResEligEmp=mysql_fetch_assoc($SqlEligEmp); 
$SqlCtc = mysql_query("SELECT ESCI FROM hrm_employee_ctc WHERE EmployeeID=".$_REQUEST['E']." AND Status='A'", $con); $ResCtc=mysql_fetch_assoc($SqlCtc);

$sqlD2=mysql_query("select DepartmentId from hrm_department where DepartmentName='Sales' AND DepartmentCode='SALES'", $con); $resD2=mysql_fetch_assoc($sqlD2);
$sqlP2=mysql_query("select DepartmentId from hrm_department where DepartmentName='Production' AND DepartmentCode='PRODUCTION'", $con); $resP2=mysql_fetch_assoc($sqlP2);

?>
   <input type="hidden" id="D2" class="All_100" value="<?php echo $resD2['DepartmentId']; ?>"/>  
  <input type="hidden" id="P2" class="All_100" value="<?php echo $resP2['DepartmentId']; ?>"/>
  <input type="hidden" id="DeId" class="All_100" value="<?php echo $ResE['DepartmentId']; ?>"/> 			
<tr>
 <td align="center">
   <table border="0" width="790">
     <tr><td align="center" valign="top" style="font-size:20px; color:#000000; font-family:Times New Roman; font-weight:bold;"><u>Entitlements(Annexure-B)</u></td></tr>
	 <tr><td>&nbsp;</td></tr>
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr>
		    <td style="width:50px;">&nbsp;</td>
		    <td style="width:385px;font-size:16px;font-weight:bold;"><?php echo $NameE; ?> / EC No:&nbsp;<?php echo $ResE['EmpCode'];  ?></td>
			<td style="width:100px;">&nbsp;</td>
			<td style="width:200px;font-size:16px;font-weight:bold;" align="right" valign="top">Date:&nbsp;<?php echo $SetpD; ?></td>
			<td style="width:50px;">&nbsp;</td>
		  </tr>
		</table>
	  </td>
	 </tr>
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr>
		    <td style="width:50px;">&nbsp;</td>
		    <td style="width:385px;font-size:16px;font-weight:bold;">Grade : <?php echo $_REQUEST['G']; ?></td>
			<td style="width:100px;">&nbsp;</td>
			<td style="width:200px;font-size:16px;font-weight:bold;" align="right"></td>
			<td style="width:50px;">&nbsp;</td>
		  </tr>
		</table>
	  </td>
	 </tr>
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr><td style="width:50px;">&nbsp;</td>
		  <td style="width:685px;font-size:18px;text-align:justify;">
<?php include_once('ViewElig.php'); ?>
	       </td>
		   <td style="width:50px;">&nbsp;</td>
		  </tr>
		</table>
	  </td>
	 </tr>
     <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0" cellpadding="0" cellspacing="0">
		  <tr><td style="width:50px;">&nbsp;</td><td style="width:685px;font-size:18px;font-weight:bold;">&nbsp;</td><td style="width:50px;">&nbsp;</td></tr>
          <tr><td style="width:50px;">&nbsp;</td>
		  <td style="width:685px;font-size:18px;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($_REQUEST['C']==1 AND ($_REQUEST['G']!='L3' AND $_REQUEST['G']!='L4' AND $_REQUEST['G']!='L5' AND $_REQUEST['G']!='MG' AND $_REQUEST['E']!=263)){echo '<img src="../../AdminUser/images/lsign.jpg" border="0" />';}?></td>
		  <td style="width:50px;">&nbsp;</td></tr>
		  <tr><td style="width:50px;">&nbsp;</td>
		  <td>
		   <table><tr>
		   <td style="width:343px;font-size:18px;font-weight:bold;">
		   <?php if($_REQUEST['C']==1 AND ($_REQUEST['G']!='L3' AND $_REQUEST['G']!='L4' AND $_REQUEST['G']!='L5' AND $_REQUEST['G']!='MG' AND $_REQUEST['E']!=263)){echo 'Human Resource';}
		         elseif($_REQUEST['C']==1 AND ($_REQUEST['G']=='L3' OR $_REQUEST['G']=='L4' OR $_REQUEST['G']=='L5' OR $_REQUEST['G']=='MG' OR $_REQUEST['E']==263)){echo '';}
		         elseif($_REQUEST['C']==3 AND $_REQUEST['E']!=254) {echo 'National Head'; }
		         elseif($_REQUEST['C']==3 AND $_REQUEST['E']==254) {echo 'Managing Director'; } ?>
		   </td>
		   <td style="width:342px;font-size:18px;font-weight:bold;" align="right">
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







