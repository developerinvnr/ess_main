<?php require_once('config/config.php'); 
$Set=mysql_query("select * from hrm_pms_setting where Process='PMS' AND CompanyId=".$_REQUEST['C'],$con); 
$rSet=mysql_fetch_array($Set); 
$SetpD=$rSet['PrintDate']; $SeteD=$rSet['EffectedDate']; $SetMsg=$rSet['WishingMsg']; 
$SetPeD=$rSet['Prod_EffectedDate']; $Ass2Year=$rSet['LettPeriod']; ?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script language="javascript" type="text/javascript">
function Printpage() { window.print(); } //window.close();
</script>
<style> printLink{display : none;}</style>
</head>
<body onLoad="Printpage()">
<table>
<tr><td style="font-family:Times New Roman;color:#000000;font-size:13px;width:785;" align="right">&nbsp;</td></tr>

<?php if($_REQUEST['action']=='Letter') { $SqlE=mysql_query("SELECT e.EmployeeID, EmpCode, Fname, Sname, Lname, Gender, DR, Married, DepartmentId, HqId, DateJoining, RepEmployeeID, EmpVertical FROM hrm_employee e INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID WHERE e.EmployeeID=".$_REQUEST['E']." AND e.CompanyId=".$_REQUEST['C'], $con); $ResE=mysql_fetch_assoc($SqlE);

if($ResE['DR']=='Y'){$M='Dr.';} elseif($ResE['Gender']=='M'){$M='Mr.';} elseif($ResE['Gender']=='F'){$M='Ms.';}  
$NameE=$M.' '.$ResE['Fname'].'&nbsp;'.$ResE['Sname'].'&nbsp;'.$ResE['Lname'];
$SqlY=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['Y'], $con); $ResY=mysql_fetch_assoc($SqlY);
$From=date("Y",strtotime($ResY['FromDate'])); $To=date("Y",strtotime($ResY['ToDate'])); $ToTo=$From-1; $AssYear=$ToTo.'-'.date("y",strtotime($ResY['FromDate']));
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
$sqlDept=mysql_query("select DepartmentName,FunName from hrm_department where DepartmentId=".$ResE['DepartmentId'], $con); 
$sqlD=mysql_query("select DesigName from hrm_designation where DesigId=".$_REQUEST['D'], $con); 
$sqlG=mysql_query("select GradeValue from hrm_grade where GradeValue='".$_REQUEST['G']."' AND CompanyId=".$_REQUEST['C'], $con); $resDept=mysql_fetch_assoc($sqlDept); $resD=mysql_fetch_assoc($sqlD); $resG=mysql_fetch_assoc($sqlG);

$sqlM = mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChDate FROM hrm_pms_appraisal_history where EmpCode=".$ResE['EmpCode']." AND SalaryChange_Date!='2019-01-02' AND CompanyId=".$_REQUEST['C'], $con); $resM = mysql_fetch_assoc($sqlM); $sqlS = mysql_query("SELECT Current_Grade, Current_Designation, Previous_GrossSalaryPM FROM hrm_pms_appraisal_history where SalaryChange_Date='".$resM['SalaryChDate']."' AND EmpCode=".$ResE['EmpCode']." AND CompanyId=".$_REQUEST['C'], $con); 
$resS = mysql_fetch_assoc($sqlS); 
$sqlPer=mysql_query("select IncDistriFrom from hrm_pms_increment_dis where Rating=".$_REQUEST['R']." AND YearId=".$_REQUEST['Y']." AND CompanyId=".$_REQUEST['C'], $con); $resPer=mysql_fetch_assoc($sqlPer); 

/**************** aaa bbbb cccc ********************/ 
/**************** aaa bbbb cccc ********************/ 
/*------------------------------------------------------------*/
/*------------------------------------------------------------*/
if($ResPMS['Hod_TotalFinalRating']>0){ $RatingHod=$ResPMS['Hod_TotalFinalRating']; } 
else{ $RatingHod=$ResPMS['Reviewer_TotalFinalRating']; } 

$suqry="Rating=".$_REQUEST['R']." AND MgmtId=".$ResPMS['HOD_EmployeeID']." AND YearId=".$_REQUEST['Y']." AND IncDistriFrom>0 AND CompanyId=".$_REQUEST['C'];

$app4 = $suqry." AND DeptId=".$ResPMS['HR_Curr_DepartmentId']." AND HodId=".$ResPMS['Rev2_EmployeeID']." AND VertId=".$ResE['EmpVertical']." AND RevId=".$ResPMS['Reviewer_EmployeeID']." AND AppId=".$ResPMS['Appraiser_EmployeeID'];
$app3 = $suqry." AND DeptId=".$ResPMS['HR_Curr_DepartmentId']." AND HodId=0 AND VertId=".$ResE['EmpVertical']." AND RevId=".$ResPMS['Reviewer_EmployeeID']." AND AppId=".$ResPMS['Appraiser_EmployeeID'];
$app2 = $suqry." AND DeptId=".$ResPMS['HR_Curr_DepartmentId']." AND HodId=".$ResPMS['Rev2_EmployeeID']." AND VertId=0 AND RevId=".$ResPMS['Reviewer_EmployeeID']." AND AppId=".$ResPMS['Appraiser_EmployeeID'];
$app1 = $suqry." AND DeptId=".$ResPMS['HR_Curr_DepartmentId']." AND HodId=0 AND VertId=0 AND RevId=".$ResPMS['Reviewer_EmployeeID']." AND AppId=".$ResPMS['Appraiser_EmployeeID'];
$app0 = $suqry." AND DeptId=".$ResPMS['HR_Curr_DepartmentId']." AND HodId=0 AND VertId=0 AND RevId=0 AND AppId=".$ResPMS['Appraiser_EmployeeID'];

/*Apraiser*/
$s_a4= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE ".$app4,$con); 
$r_a4=mysql_num_rows($s_a4);
if($r_a4>0){ $resMaxMin = mysql_fetch_assoc($s_a4); }
else
{ 
 $s_a3= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE ".$app3,$con); 
 $r_a3=mysql_num_rows($s_a3);
 if($r_a3>0){ $resMaxMin = mysql_fetch_assoc($s_a3); }
 else
 { 
  $s_a2= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE ".$app2,$con); 
  $r_a2=mysql_num_rows($s_a2);
  if($r_a2>0){ $resMaxMin = mysql_fetch_assoc($s_a2); }
  else
  { 
   $s_a1= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE ".$app1,$con); 
   $r_a1=mysql_num_rows($s_a1);
   if($r_a1>0){ $resMaxMin = mysql_fetch_assoc($s_a1); }
   else
   { 
    $s_a0= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE ".$app0,$con); 
    $r_a0=mysql_num_rows($s_a0);
    if($r_a0>0){ $resMaxMin = mysql_fetch_assoc($s_a0); }
    else
    { 
      /*Reviewer*/ 
	  $rev3=$suqry." AND DeptId=".$ResPMS['HR_Curr_DepartmentId']." AND HodId=".$ResPMS['Rev2_EmployeeID']." AND VertId=".$ResE['EmpVertical']." AND RevId=".$ResPMS['Reviewer_EmployeeID'];
      $rev2=$suqry." AND DeptId=".$ResPMS['HR_Curr_DepartmentId']." AND HodId=0 AND VertId=".$ResE['EmpVertical']." AND RevId=".$ResPMS['Reviewer_EmployeeID'];
      $rev1=$suqry." AND DeptId=".$ResPMS['HR_Curr_DepartmentId']." AND HodId=".$ResPMS['Rev2_EmployeeID']." AND VertId=0 AND RevId=".$ResPMS['Reviewer_EmployeeID'];
      $rev0=$suqry." AND DeptId=".$ResPMS['HR_Curr_DepartmentId']." AND HodId=0 AND VertId=0 AND RevId=".$ResPMS['Reviewer_EmployeeID'];
	  $s_r3= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE AppId=0 AND ".$rev3,$con); 
      $r_r3=mysql_num_rows($s_r3);
      if($r_r3>0){ $resMaxMin = mysql_fetch_assoc($s_r3); }
      else
      { 
       $s_r2= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE AppId=0 AND ".$rev2,$con); 
       $r_r2=mysql_num_rows($s_r2);
       if($r_r2>0){ $resMaxMin = mysql_fetch_assoc($s_r2); }
       else
       { 
        $s_r1= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE AppId=0 AND ".$rev1,$con); 
        $r_r1=mysql_num_rows($s_r1);
        if($r_r1>0){ $resMaxMin = mysql_fetch_assoc($s_r1); }
        else
        { 
         $s_r0= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE AppId=0 AND ".$rev0,$con); 
         $r_r0=mysql_num_rows($s_r0);
         if($r_r0>0){ $resMaxMin = mysql_fetch_assoc($s_r0); }
         else
         { 
           /*Vertical*/
		   $ver1=$suqry." AND DeptId=".$ResPMS['HR_Curr_DepartmentId']." AND HodId=".$ResPMS['Rev2_EmployeeID']." AND VertId=".$ResE['EmpVertical'];
           $ver0=$suqry." AND DeptId=".$ResPMS['HR_Curr_DepartmentId']." AND HodId=0 AND VertId=".$ResE['EmpVertical'];
		   $s_v1= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE RevId=0 AND ".$ver1,$con); 
           $r_v1=mysql_num_rows($s_v1);
           if($r_v1>0){ $resMaxMin = mysql_fetch_assoc($s_v1); }
           else
           {
		    $s_v0= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE RevId=0 AND ".$ver0,$con); 
            $r_v0=mysql_num_rows($s_v0);
            if($r_v0>0){ $resMaxMin = mysql_fetch_assoc($s_v0); }
            else
            {
			 /*Hod*/
			 $hod0=$suqry." AND DeptId=".$ResPMS['HR_Curr_DepartmentId']." AND HodId=".$ResPMS['Rev2_EmployeeID'];
			 $s_h0= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE VertId=0 AND ".$hod0,$con); 
             $r_h0=mysql_num_rows($s_h0);
             if($r_h0>0){ $resMaxMin = mysql_fetch_assoc($s_h0); }
             else
             {
			  /*Department*/
			  $dep0=$suqry." AND DeptId=".$ResPMS['HR_Curr_DepartmentId'];
			  $s_d0= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE HodId=0 AND ".$dep0,$con); 
              $r_d0=mysql_num_rows($s_d0);
              if($r_d0>0){ $resMaxMin = mysql_fetch_assoc($s_d0); }
              else
              {
			   /*Management*/
			   $mgm0=$suqry;
			   $s_m0= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE DeptId=0 AND ".$mgm0,$con); 
               $resMaxMin = mysql_fetch_assoc($s_m0);
			   /*Management*/
			  }
			  /*Department*/ 
			 }
			 /*Hod*/
		    }
		   }
		   /*Vertical*/
         }
        }  
       }
      }   
	  /*Reviewer*/
    }
   }
  } 
 } 
}
/*Apraiser*/

/*------------------------------------------------------------*/
/*------------------------------------------------------------*/

/**************** aaa bbbb cccc ********************/ 
/**************** aaa bbbb cccc ********************/

?> 			
<tr>
 <td align="center">
   <table border="0" width="790">
   <tr><td>&nbsp;</td></tr> 
     <tr><td align="center" valign="top" style="font-size:20px; color:#000000; font-family:Times New Roman; font-weight:bold;">&nbsp;</td></tr>
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
		  <tr><td style="width:50px;">&nbsp;</td><td style="width:685px;font-size:16px;color:#660000;font-weight:bold;">Function:&nbsp;<?php echo $resDept['FunName']; ?></td>
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
		  <td style="width:685px;font-size:16px;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($_REQUEST['C']==1 AND ($_REQUEST['G']!='L3' AND $_REQUEST['G']!='L4' AND $_REQUEST['G']!='L5' AND $_REQUEST['G']!='MG' AND $_REQUEST['E']!=263)){echo '<img src="images/lsign.jpg" border="0" />';}?></td>
		  <td style="width:50px;">&nbsp;</td></tr>
		  <tr><td style="width:50px;">&nbsp;</td>
		  <td>
		   <table><tr>
		   <td style="width:343px;font-size:16px;font-weight:bold;">
		   <?php if($_REQUEST['C']==1 AND ($_REQUEST['G']!='L3' AND $_REQUEST['G']!='L4' AND $_REQUEST['G']!='L5' AND $_REQUEST['G']!='MG' AND $_REQUEST['E']!=263)){echo '&nbsp;Human Resource';}
		         elseif($_REQUEST['C']==1 AND ($_REQUEST['G']=='L3' OR $_REQUEST['G']=='L4' OR $_REQUEST['G']=='L5' OR $_REQUEST['G']=='MG' OR $_REQUEST['E']==263)){echo 'Director\Managing Director';}
		            elseif($_REQUEST['C']==3 AND $_REQUEST['E']!=254) {echo 'National Head'; }
		            elseif($_REQUEST['C']==3 AND $_REQUEST['E']==254) {echo 'Managing Director'; } ?>
		   </td>
		   <td style="width:342px;font-size:16px;font-weight:bold;" align="right">
		   <?php //if($_REQUEST['D']==98 OR $_REQUEST['D']==115 OR $_REQUEST['D']==116 OR $_REQUEST['D']==117) { 'Director'; }?>
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



