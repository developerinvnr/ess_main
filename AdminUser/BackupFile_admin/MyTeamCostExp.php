<?php
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');

if($_REQUEST['YI']==1){$Y=2012;}elseif($_REQUEST['YI']==2){$Y=2013;}elseif($_REQUEST['YI']==3){$Y=2014;}elseif($_REQUEST['YI']==4){$Y=2015;}elseif($_REQUEST['YI']==5){$Y=2016;}elseif($_REQUEST['YI']==6){$Y=2017;}elseif($_REQUEST['YI']==7){$Y=2018;}elseif($_REQUEST['YI']==8){$Y=2019;}elseif($_REQUEST['YI']==9){$Y=2020;}elseif($_REQUEST['YI']==10){$Y=2021;}elseif($_REQUEST['YI']==11){$Y=2022;}
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$FD.'-'.$TD;


if($_REQUEST['action']=='Over') {  }
          elseif($_REQUEST['action']=='Dept'){  }
          elseif($_REQUEST['action']=='Hod'){  }


 if($_REQUEST['action']=='Over')
 { 
  $Action='ORGANIZATION'; $query=''; $query_num=''; $ExtQuery='1=1'; $HodId=0; $DeptId=0;
 }
 elseif($_REQUEST['action']=='Hod' OR $_REQUEST['action']=='Rev2' OR $_REQUEST['action']=='Rev' OR $_REQUEST['action']=='App')
 { 
  $sqlB=mysql_query("select Fname,Sname,Lname,Gender,Married,DR FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID WHERE e.EmployeeId=".$_REQUEST['value'], $con); $resB=mysql_fetch_assoc($sqlB); if($resB['DR']=='Y'){$MS='Dr.';} elseif($resB['Gender']=='M'){$MS='Mr.';} elseif($resB['Gender']=='F' AND $resB['Married']=='Y'){$MS='Mrs.';} elseif($resB['Gender']=='F' AND $resB['Married']=='N'){$MS='Miss.';}    
  if($_REQUEST['action']=='Hod')
  {
   $query='AND p.HOD_EmployeeID='.$_REQUEST['value']; $titl='MANAGEMENT';
   $ExtQuery='HodId='.$_REQUEST['value']; $HodId=$_REQUEST['value']; $DeptId=0; $Rev2Id=0; $RevId=0; $AppId=0;
  }
  elseif($_REQUEST['action']=='Rev2')
  {
   $query='AND p.Rev2_EmployeeID='.$_REQUEST['value']; $titl='HOD'; 
   $ExtQuery='Rev2Id='.$_REQUEST['value']; $HodId=0; $DeptId=0; $Rev2Id=$_REQUEST['value']; $RevId=0; $AppId=0;
  }
  elseif($_REQUEST['action']=='Rev')
  {
   $query='AND p.Reviewer_EmployeeID='.$_REQUEST['value']; $titl='REVIEWER'; 
   $ExtQuery='RevId='.$_REQUEST['value']; $HodId=0; $DeptId=0; $Rev2Id=0; $RevId=$_REQUEST['value']; $AppId=0;
  }
  elseif($_REQUEST['action']=='App')
  {
   $query='AND p.Appraiser_EmployeeID='.$_REQUEST['value']; $titl='APPRAISER'; 
   $ExtQuery='AppId='.$_REQUEST['value']; $HodId=0; $DeptId=0; $Rev2Id=0; $RevId=0; $AppId=$_REQUEST['value'];
  }
   $Action=$titl.':'.$MS.'_'.$resB['Fname'].'_'.$resB['Sname'].'_'.$resB['Lname'];
 }
 elseif($_REQUEST['action']=='Dept')
 { 
  $sqlDe=mysql_query("select DepartmentName,DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resDe=mysql_fetch_assoc($sqlDe); $Action='DEPARTMENT:&nbsp;'.$resDe['DepartmentCode'];
  $query='AND g.DepartmentId='.$_REQUEST['value']; 
  $ExtQuery='DeptId='.$_REQUEST['value']; $HodId=0; $DeptId=$_REQUEST['value']; $Rev2Id=0; $RevId=0; $AppId=0;
 } 
 
if($_REQUEST['YI']<6){ $Yydate=$Y.'-03-31'; }else{ $Yydate=$Y.'-06-30'; }
if($_REQUEST['YI']==1){ $query_y=''; }elseif($_REQUEST['YI']>=2){ $query_y="AND g.DateJoining<='".$Yydate."'"; }

$xls_filename = 'COT_'.$PRD.'-'.$Action.'.xls';
 

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 

echo "Sn\tRating\tEmp NOE\tEmp Tot_CTC\tAPP NOE\tAPP Tot_CTC\tREV NOE\tREV Tot_CTC\tHOD NOE\tHOD Tot_CTC\tProposed CTC\tProposed (%) INC\tProposed Increment_Amt";
print("\n");

$sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$_REQUEST['c']." AND RatingStatus='A' order by Rating ASC", $con);  
 $sn=1; 
 while($resR=mysql_fetch_array($sqlR))
 {
 
  $schema_insert = "";
  $schema_insert .= $sn.$sep;
  $schema_insert .= $resR['Rating'].$sep;
  
//Employee //Employee //Employee //Employee //Employee //Employee //Employee //Employee
$sqlE=mysql_query("select SUM(EmpCurrGrossPM)as EmpGross, SUM(EmpCurrIncentivePM) as EmpInct, SUM(EmpCurrCtc) as EmpCtc from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$_REQUEST['c']." AND p.Appraiser_EmployeeID!=0 ".$query." ".$query_y." AND p.Dummy_EmpRating=".$resR['Rating'], $con); $resE=mysql_fetch_array($sqlE); 
$NOE=mysql_query("SELECT count(*) as NOE from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$_REQUEST['c']." AND p.Appraiser_EmployeeID!=0 ".$query." ".$query_y." AND p.Dummy_EmpRating=".$resR['Rating'], $con); $resNOE=mysql_fetch_assoc($NOE);
if($resE['EmpGross']>0){$resEGross=$resE['EmpGross']+$resE['EmpInct'];}else{$resEGross=0;}  
if($_REQUEST['YI']>=8){$e_gross=$resE['EmpCtc'];}else{$e_gross=$resEGross;}  
  $schema_insert .= $resNOE['NOE'].$sep;
  $schema_insert .= $e_gross.$sep;

//Appraiser //Appraiser //Appraiser //Appraiser //Appraiser //Appraiser //Appraiser
$sqlA=mysql_query("select SUM(EmpCurrGrossPM)as AppGross, SUM(EmpCurrIncentivePM) as AppInct, SUM(EmpCurrCtc) as AppCtc from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$_REQUEST['c']." AND p.Appraiser_EmployeeID!=0 ".$query." ".$query_y." AND p.Dummy_AppRating=".$resR['Rating'], $con); $resA=mysql_fetch_array($sqlA);
$NOA=mysql_query("SELECT count(*) as NOA from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$_REQUEST['c']." AND p.Appraiser_EmployeeID!=0 ".$query." ".$query_y." AND p.Dummy_AppRating=".$resR['Rating'], $con); $resNOA=mysql_fetch_assoc($NOA);
if($resA['AppGross']>0){$resAGross=$resA['AppGross']+$resA['AppInct'];}else{$resAGross=0;}  
if($_REQUEST['YI']>=8){$a_gross=$resA['AppCtc'];}else{$a_gross=$resAGross;}  
  $schema_insert .= $resNOA['NOA'].$sep;
  $schema_insert .= $a_gross.$sep;
  
//Reviewer //Reviewer //Reviewer //Reviewer //Reviewer //Reviewer //Reviewer //Reviewer
$sqlRe=mysql_query("select SUM(EmpCurrGrossPM)as RevGross, SUM(EmpCurrIncentivePM) as RevInct, SUM(EmpCurrCtc) as RevCtc from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$_REQUEST['c']." AND p.Appraiser_EmployeeID!=0 ".$query." ".$query_y." AND p.Dummy_RevRating=".$resR['Rating'], $con); $resRe=mysql_fetch_array($sqlRe);
$NOR=mysql_query("SELECT count(*) as NOR from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$_REQUEST['c']." AND p.Appraiser_EmployeeID!=0 ".$query." ".$query_y." AND p.Dummy_RevRating=".$resR['Rating'], $con); $resNOR=mysql_fetch_assoc($NOR);
if($resRe['RevGross']>0){$resRGross=$resRe['RevGross']+$resRe['RevInct'];}else{$resRGross=0;}  
if($_REQUEST['YI']>=8){$r_gross=$resRe['RevCtc'];}else{$r_gross=$resRGross;}  
  $schema_insert .= $resNOR['NOR'].$sep;
  $schema_insert .= $r_gross.$sep;
  
//HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD
$sqlH=mysql_query("select SUM(EmpCurrGrossPM)as HodGross, SUM(EmpCurrIncentivePM) as HodInct, SUM(EmpCurrCtc) as HodCtc from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$_REQUEST['c']." AND p.Appraiser_EmployeeID!=0 ".$query." ".$query_y." AND p.Dummy_HodRating=".$resR['Rating'], $con); 
$resH=mysql_fetch_array($sqlH);
$NOH=mysql_query("SELECT count(*) as NOH from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$_REQUEST['c']." AND p.Appraiser_EmployeeID!=0 ".$query." ".$query_y." AND p.Dummy_HodRating=".$resR['Rating'], $con); $resNOH=mysql_fetch_assoc($NOH);
if($resH['HodGross']>0){$resHGross=$resH['HodGross']+$resH['HodInct'];}else{$resHGross=0;}  
if($resH['HodCtc']>0){$resHCtc=round($resH['HodCtc']);}else{$resHCtc=0;}  
  $schema_insert .= $resNOH['NOH'].$sep;
  $schema_insert .= $resHCtc.$sep;
  
/**************************************** Dummy Start *********************************/ 
/**************************************** Dummy Start *********************************/ 	  
$sql2I=mysql_query("select PerInc from hrm_pms_dummy_increment where YearId=".$_REQUEST['YI']." AND CompanyId=".$_REQUEST['c']." AND ".$ExtQuery." AND Rating=".$resR['Rating'], $con);  $res2I=mysql_fetch_array($sql2I); 
	  $sqlCH=mysql_query("select Dummy_HodRating from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$_REQUEST['c']." AND p.Appraiser_EmployeeID!=0 ".$query." ".$query_y." AND p.Dummy_HodRating=".$resR['Rating'], $con); $rowCH=mysql_num_rows($sqlCH);
	 
if($rowCH==0){ $Pre_GrossValue=0; $Pre_HodCtc=0; } 
else { $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross, SUM(EmpCurrIncentivePM) as DeptInct, SUM(EmpCurrCtc) as DeptCtc from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$_REQUEST['c']." AND p.Appraiser_EmployeeID!=0 ".$query." ".$query_y." AND p.Dummy_HodRating=".$resR['Rating'], $con); $resD=mysql_fetch_assoc($sqlD); 
$Pre_GrossValue=$resD['DeptTotGross']+$resD['DeptInct']; 
$Pre_HodCtc=$resD['DeptCtc']; }
	   
 //echo 'aa='.$Pre_GrossValue.' $res2I='.$res2I['PerInc'];	
// $IncD=($Pre_GrossValue*$res2I['PerInc'])/100;   
 
 if($_REQUEST['YI']>=8){ $Camt1=$Pre_HodCtc; }else{ $Camt1=$Pre_GrossValue; }
 
 $IncD=($Camt1*$res2I['PerInc'])/100;
 $GrossD=$Camt1+$IncD;
 $OnePerD=($Camt1*1)/100;
 
 if($OnePerD>0){$PerD=$IncD/$OnePerD;}else{$PerD=0;}
 if($GrossD>0){$H2I=round($GrossD,2);}else{$H2I=0;} 
 if($PerD>0){$H3I=round($PerD,2);}else{$H3I=0;}
 if($IncD>0){$H4I=round($IncD,2);}else{$H4I=0;} 
 
 $IncDCtc=($Pre_HodCtc*$res2I['PerInc'])/100;
 $GrossDCtc=round($Pre_HodCtc+$IncDCtc);
 if($GrossDCtc>0){$H5I=$GrossDCtc;}else{$H5I=0;}	  
  
  $schema_insert .= $H2I.$sep;
  $schema_insert .= $H3I.$sep;
  $schema_insert .= $H4I.$sep;
  			  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $sn++;
 }
 
  $schema_insert = "";
  $schema_insert .= 'Assign Total'.$sep;
  $schema_insert .= ''.$sep;
  
//Employee //Employee //Employee //Employee //Employee //Employee //Employee //Employee
$sqlET=mysql_query("select SUM(EmpCurrGrossPM)as EmpGross, SUM(EmpCurrIncentivePM) as EmpInct, SUM(EmpCurrCtc) as EmpTCtc from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$_REQUEST['c']." ".$query." ".$query_y." AND p.Dummy_EmpRating!=0 AND p.Appraiser_EmployeeID!=0", $con); $resET=mysql_fetch_array($sqlET);
$NOET=mysql_query("select count(*) as NOET from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$_REQUEST['c']." ".$query." ".$query_y." AND p.Dummy_EmpRating!=0 AND p.Appraiser_EmployeeID!=0", $con); $resNOET=mysql_fetch_array($NOET); $ET=$resET['EmpGross']+$resET['EmpInct'];  
if($_REQUEST['YI']>=8){$et_gross=$resET['EmpTCtc'];}else{$et_gross=$ET;}  
  $schema_insert .= $resNOET['NOET'].$sep;
  $schema_insert .= $et_gross.$sep;

//Appraiser //Appraiser //Appraiser //Appraiser //Appraiser //Appraiser //Appraiser 
$sqlAT=mysql_query("select SUM(EmpCurrGrossPM)as AppGross, SUM(EmpCurrIncentivePM) as AppInct, SUM(EmpCurrCtc) as AppTCtc from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$_REQUEST['c']." ".$query." ".$query_y." AND p.Dummy_AppRating!=0 AND p.Appraiser_EmployeeID!=0", $con); $resAT=mysql_fetch_array($sqlAT);
$NOAT=mysql_query("select count(*) as NOAT from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$_REQUEST['c']." ".$query." ".$query_y." AND p.Dummy_AppRating!=0 AND p.Appraiser_EmployeeID!=0", $con); $resNOAT=mysql_fetch_array($NOAT); $AT=$resAT['AppGross']+$resAT['AppInct']; 
if($_REQUEST['YI']>=8){$at_gross=$resAT['AppTCtc'];}else{$at_gross=$AT;} 
  $schema_insert .= $resNOAT['NOAT'].$sep;
  $schema_insert .= $at_gross.$sep;
  
//Reviewer //Reviewer //Reviewer //Reviewer //Reviewer //Reviewer //Reviewer //Reviewer 
$sqlRT=mysql_query("select SUM(EmpCurrGrossPM)as RevGross, SUM(EmpCurrIncentivePM) as RevInct, SUM(EmpCurrCtc) as RevTCtc from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$_REQUEST['c']." ".$query." ".$query_y." AND p.Dummy_RevRating!=0 AND p.Appraiser_EmployeeID!=0", $con); $resRT=mysql_fetch_array($sqlRT);
$NORT=mysql_query("select count(*) as NORT from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$_REQUEST['c']." ".$query." ".$query_y." AND p.Dummy_RevRating!=0 AND p.Appraiser_EmployeeID!=0", $con); $resNORT=mysql_fetch_array($NORT); $RT=$resRT['RevGross']+$resRT['RevInct'];
if($_REQUEST['YI']>=8){$rt_gross=$resRT['RevTCtc'];}else{$rt_gross=$RT;}  
  $schema_insert .= $resNORT['NORT'].$sep;
  $schema_insert .= $rt_gross.$sep;

//HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD 
$sqlHT=mysql_query("select SUM(EmpCurrGrossPM)as HodGross, SUM(EmpCurrIncentivePM) as HodInct, SUM(EmpCurrCtc) as HodTCtc from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$_REQUEST['c']." ".$query." ".$query_y." AND p.Dummy_HodRating!=0 AND p.Appraiser_EmployeeID!=0", $con); $resHT=mysql_fetch_array($sqlHT);
$NOHT=mysql_query("select count(*) as NOHT from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$_REQUEST['c']." ".$query." ".$query_y." AND p.Dummy_HodRating!=0 AND p.Appraiser_EmployeeID!=0", $con); $resNOHT=mysql_fetch_array($NOHT); $HT=$resHT['HodGross']+$resHT['HodInct'];  
  $schema_insert .= $resNOHT['NOHT'].$sep;
  $schema_insert .= $resHT['HodTCtc'].$sep;
  
/**************************************** Dummy Start *********************************/ 	
/**************************************** Dummy Start *********************************/ 			   
$sql4I=mysql_query("select TIncGross,TPerInc,TInc from hrm_pms_dummy_increment_untot where YearId=".$_REQUEST['YI']." AND ".$ExtQuery." AND CompanyId=".$_REQUEST['c'], $con); $res4I=mysql_fetch_array($sql4I);
	 
	  $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross, SUM(EmpCurrIncentivePM) as DeptInct, SUM(EmpCurrCtc) as HotDeptCtc from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$_REQUEST['c']." ".$query." ".$query_y." AND (p.Dummy_EmpRating!=0 AND p.Dummy_AppRating!=0 AND p.Dummy_RevRating!=0 AND p.Dummy_HodRating!=0) AND p.Appraiser_EmployeeID!=0", $con); $resD=mysql_fetch_assoc($sqlD);
	  
	   $Pre_GrossValue=$resD['DeptTotGross']+$resD['DeptInct']; 
	   $Pre_Ctc=$resD['HotDeptCtc'];
	   
	   if($_REQUEST['YI']>=8){ $Camt3=$Pre_Ctc; }else{ $Camt3=$Pre_GrossValue; }
	   
	   if($_REQUEST['action']=='Over')
       {	 
	    if($res4I['TIncGross']>0){$H222I=$res4I['TIncGross'];}else{$H22I=0;} 
	    if($res4I['TPerInc']>0){$H333I=$res4I['TPerInc'];}else{$H33I=0;}
	    if($res4I['TInc']>0){$H444I=$res4I['TInc'];}else{$H44I=0;}
	   }
	   else
	   {
	   
		$IncD=($Camt3*$res4I['TPerInc'])/100;
		$GrossD=$Camt3+$IncD;
		$OnePerD=($Camt3*1)/100;
		if($OnePerD>0){$PerD=$IncD/$OnePerD;}else{$PerD=0;}
		if($GrossD>0){$H222I=round($GrossD,2);}else{$H222I=0;} 
	    if($PerD>0){$H333I=round($PerD,2);}else{$H333I=0;}
	    if($IncD>0){$H444I=round($IncD,2);}else{$H444I=0;}
	   }
	   
	    $IncTDCtc=($Pre_Ctc*$H333I)/100;
        $GrossTDCtc=round($Pre_Ctc+$IncTDCtc);
        if($GrossTDCtc>0){$H555I=$GrossTDCtc;}else{$H555I=0;} 
	  
  $schema_insert .= $H222I.$sep;
  $schema_insert .= $H333I.$sep;
  $schema_insert .= $H444I.$sep;
  
  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";

?>

