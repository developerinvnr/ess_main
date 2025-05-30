<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
/**********************************/
$_SESSION['EmpID']=$_REQUEST['ID'];   //loyee
$EMPID=$_SESSION['EmpID'];
//********************************** 


if(isset($_POST['EditGeneralE'])) 
{
    $sql = mysql_query("select hrm_employee.*,hrm_employee_general.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmployeeID=".$EMPID, $con); $res=mysql_fetch_assoc($sql);
   if($sql)
   {  $sqlIns=mysql_query("Insert into hrm_employee_event(EmployeeID,EmpCode,EmpPass,EmpType,EmpStatus,Fname,Sname,Lname,CompanyId,CreatedBy,CreatedDate,YearId)values(".$res['EmployeeID'].", '".$res['EmpCode']."','".$res['EmpPass']."','".$res['EmpType']."','".$res['EmpStatus']."','".$res['Fname']."','".$res['Sname']."','".$res['Lname']."',".$res['CompanyId'].",".$res['CreatedBy'].",'".$res['CreatedDate']."',".$res['YearId'].")", $con);

     $sqlIns1=mysql_query("Insert into hrm_employee_general_event(GeneralId,EmployeeID,FileNo,DateJoining,DateConfirmationYN,DateConfirmation,DOB,DOB_dm, GradeId, CostCenter, HqId, DepartmentId, DesigId, SubLocation, SubDepartmentId, TerrId, BUId, ZoneId, RegionId, Section, EmpFunction, EmpVertical, EmpSection, MobileNo_Vnr,EmailId_Vnr,BankName,AccountNo,BranchName,BranchAdd,BankName2,AccountNo2,BranchName2,BranchAdd2,InsuCardNo,PfAccountNo,PF_UAN,EsicAllow,EsicNo,ReportingName,ReportingDesigId,ReportingEmailId,ReportingContactNo,CreatedBy,CreatedDate,SysDate,YearId, GradeId_Old, CostCenter_Old, HqId_Old, DepartmentId_Old, DesigId_Old, SubLocation_old, EmpVertical_old, Section_old)values(".$res['GeneralId'].",".$res['EmployeeID'].",".$res['FileNo'].",'".$res['DateJoining']."','".$res['DateConfirmationYN']."','".$res['DateConfirmation']."','".$res['DOB']."','".$res['DOB_dm']."', '".$res['GradeId']."', '".$res['CostCenter']."', '".$res['HqId']."', '".$res['DepartmentId']."', '".$res['DesigId']."', '".$res['SubLocation']."', '".$res['SubDepartmentId']."', '".$res['TerrId']."', '".$res['BUId']."', '".$res['ZoneId']."', '".$res['RegionId']."', '".$res['Section']."', '".$res['EmpFunction']."', '".$res['EmpVertical']."', '".$res['EmpSection']."', ".$res['MobileNo_Vnr'].",'".$res['EmailId_Vnr']."','".$res['BankName']."',".$res['AccountNo'].",'".$res['BranchName']."','".$res['BranchAdd']."','".$res['BankName2']."',".$res['AccountNo2'].",'".$res['BranchName2']."','".$res['BranchAdd2']."','".$res['InsuCardNo']."','".$res['PfAccountNo']."','".$res['PF_UAN']."','".$res['EsicAllow']."','".$res['EsicNo']."','".$res['ReportingName']."',".$res['ReportingDesigId'].",'".$res['ReportingEmailId']."',".$res['ReportingContactNo'].",".$res['CreatedBy'].",'".$res['CreatedDate']."','".$res['SysDate']."',".$res['YearId'].", '".$res['GradeId_Old']."', '".$res['CostCenter_Old']."', '".$res['HqId_Old']."', '".$res['DepartmentId_Old']."', '".$res['DesigId_Old']."', '".$res['SubLocation_old']."', '".$res['EmpVertical_old']."', '".$res['Section_old']."')", $con);
  
     if($sqlIns)
     { $Fname=ucfirst($_POST['Fname']);  $Sname=ucfirst($_POST['Sname']);  $Lname=ucfirst($_POST['Lname']); //$pass=encrypt($_POST['EmpPass']);

 if($_POST['RetiStatus']=='Y'){ $RiteDate=date("Y-m-d",strtotime($_POST['RetiDate'])); $RetiNCode=$_POST['RetiNewCode']; $RetiOldCode=$_POST['RetiOldCode'];}
 else{ $RiteDate='0000-00-00'; $RetiNCode=0; $RetiOldCode=0; }
 
 
 if($_POST['Sep']=='' || $_POST['Sep']=='0000-00-00' || $_POST['Sep']=='00-00-0000' || $_POST['Sep']=='1970-01-01'){
    $Sep = '0000-00-00';
}else{
    $Sep =date("Y-m-d",strtotime($_POST['Sep']));
}

if($_POST['Resig']=='' || $_POST['Resig']=='0000-00-00' || $_POST['Resig']=='00-00-0000' || $_POST['Resig']=='1970-01-01'){
    $Reg = '0000-00-00';
}else{
    $Reg =date("Y-m-d",strtotime($_POST['Resig']));
}
 

	   $SqlUpGen = mysql_query("UPDATE hrm_employee SET EmpStatus='".$_POST['EmpStatus']."',RetiStatus='".$_POST['RetiStatus']."',RetiDate='".$RiteDate."', EsslCode='".$_POST['EsslCode']."', RetiNewCode=".$RetiNCode.",RetiOldCode=".$RetiOldCode.",Fname='".ucfirst($Fname)."',Sname='".ucfirst($Sname)."',Lname='".ucfirst($Lname)."', DateOfResignation='".$Reg."', DateOfSepration='".$Sep."', CreatedBy=".$UserId.",CreatedDate='".date('Y-m-d')."',YearId=".$YearId." WHERE EmployeeID=".$EMPID, $con);
           if($_POST['RetiStatus']=='Y'){$SqlUpCode = mysql_query("UPDATE hrm_employee SET EmpCode='".$_POST['RetiNewCode']."' WHERE EmployeeID=".$EMPID, $con); } 

       if($_POST['RepName']!=0) { 
       $sqlE=mysql_query("select * from hrm_employee where EmployeeID=".$_POST['RepName'], $con); $resE=mysql_fetch_assoc($sqlE); 
       if($resE['Sname']==''){ $ename=trim($resE['Fname']).' '.trim($resE['Lname']); }
else{ $ename=trim($resE['Fname']).' '.trim($resE['Sname']).' '.trim($resE['Lname']); }
       
	   //$ename=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'];
	   $SqlUpE = mysql_query("UPDATE hrm_employee_general SET RepEmployeeID=".$_POST['RepName'].",ReportingName='".$ename."',ReportingDesigId=".$_POST['RepDesigF'].",ReportingEmailId='".$_POST['RepEmailIdF']."',ReportingContactNo='".$_POST['RepContactNoF']."' WHERE EmployeeID=".$EMPID, $con); 
	   
	   $sH=mysql_query("select RepEmployeeID from hrm_employee_general where EmployeeID=".$_POST['RepName'],$con); $rH=mysql_fetch_assoc($sH);
	   
	   $SqlUpRe = mysql_query("UPDATE hrm_employee_reporting SET AppraiserId=".$_POST['RepName'].", HodId=".$rH['RepEmployeeID']." WHERE EmployeeID=".$EMPID, $con);}
	    
		if($_POST['DOC']!='' AND $_POST['DOC']!='00-00-0000' AND $_POST['DOC']!='1970-01-01'){$YN='Y'; $YH='Y';} else {$YN='N'; $YH='N';} 
		if($_POST['DOC']==''){$_POST['DOC']='00-00-0000';} 
		if($_POST['OffiMobileNo']==''){$_POST['OffiMobileNo']=0;}

       //if($_POST['DOC']!='00-00-0000' AND $_POST['DOC']!='01-01-1970'){$DCyn='Y';}else{$DCyn='N';}	
       
       if($_POST['ESICNo']!='' && $_POST['ESICNo']!=0){ $EsicAllow='Y';  }
       else{ $EsicAllow='N'; }

       // GradeId, CostCenter, HqId, DepartmentId, DesigId, SubLocation, SubDepartmentId, TerrId, BUId, ZoneId, RegionId, Section, EmpFunction, EmpVertical, EmpSection
       //".$res['EmpGrade'].",'".$res['EmpState']."',".$res['EmpCity'].",".$res['EmpDept'].",".$res['EmpDesig'].",'".$res['SubLocation']."', '".$res['EmpSubDept']."', '".$res['EmpTerr']."', '".$res['EmpBU']."', '".$res['EmpZone']."', '".$res['EmpRegion']."', '".$res['EmpSec']."', '".$res['EmpFun']."', '".$res['EmpVer']."', '".$res['EmpSec']."',

       $SqlUpGen1 = mysql_query("UPDATE hrm_employee_general SET Hiring_Mode = '".$_POST['hiring_mode']."', FileNo='".$_POST['FileNo']."', DateJoining='".date("Y-m-d",strtotime($_POST['DOJ']))."', DOB='".date("Y-m-d",strtotime($_POST['DOB']))."', DOB_dm='".date("0000-m-d",strtotime($_POST['DOB']))."', GradeId='".$_POST['EmpGrade']."',DesigSuffix='".$_POST['DesigSuffix']."', CostCenter='".$_POST['EmpState']."', HqId='".$_POST['EmpCity']."', DepartmentId='".$_POST['EmpDept']."', DesigId='".$_POST['EmpDesig']."', SubLocation='".$_POST['SubLocation']."', SubDepartmentId='".$_POST['EmpSubDept']."', TerrId='".$_POST['EmpTerr']."', BUId='".$_POST['EmpBU']."', ZoneId='".$_POST['EmpZone']."', RegionId='".$_POST['EmpRegion']."', Section='".$_POST['EmpSec']."', EmpFunction='".$_POST['EmpFun']."', EmpVertical='".$_POST['EmpVer']."', EmpSection='".$_POST['EmpSec']."', PositionCode='".$_POST['PositionCode']."', MobileNo_Vnr='".$_POST['OffiMobileNo']."', MobileNo2_Vnr='".$_POST['MobileNo2_Vnr']."', EmailId_Vnr='".$_POST['OffiEmialId']."', BankName='".$_POST['BankName1']."', AccountNo='".$_POST['AccountNo1']."', BranchName='".$_POST['Branch1']."', BranchAdd='".$_POST['Address1']."', BankName2='".$_POST['BankName2']."', AccountNo2='".$_POST['AccountNo2']."', BranchName2='".$_POST['Branch2']."', BranchAdd2='".$_POST['Address2']."', BankIfscCode='".$_POST['ifsc1']."', BankIfscCode2='".$_POST['ifsc2']."', InsuCardNo='".$_POST['InsCardNo']."', PfAccountNo='".$_POST['PfAccountNo']."', PF_UAN='".$_POST['PF_UAN']."', EsicAllow='".$EsicAllow."', EsicNo='".$_POST['ESICNo']."', AttMobileNo1='".$_POST['OffiMobileNo']."', BWageId='".$_POST['BWageCategory']."', CreatedBy='".$UserId."', CreatedDate='".date("Y-m-d",strtotime($_POST['DateCTC']))."', apply_Bond='".$_POST['TrfBond']."', Transfer_Dept_Date='".date("Y-m-d",strtotime($_POST['TrfDate']))."', Transfer_Dept_Name='".$_POST['TrfDept']."', Transfer2_Dept_Date='".date("Y-m-d",strtotime($_POST['Trf2Date']))."', Transfer2_Dept_Name='".$_POST['Trf2Dept']."', Bond_Year='".$_POST['BondYear']."', NoticeDay_Prob='".$_POST['NoticeDay_Prob']."', NoticeDay_Conf='".$_POST['NoticeDay_Conf']."', Transfer_location='".$_POST['TrfLoc']."', Transfer2_location='".$_POST['Trf2Loc']."', SysDate='".date('Y-m-d')."', YearId='".$YearId."' WHERE EmployeeID=".$EMPID, $con);
	   
       
       /*
      $sqlRatt=mysql_query("select * from hrm_sales_verhq rh where HqId=".$_POST['HQName']." AND Vertical=".$_POST['EmpVertical']." AND DeptId=".$_POST['DeptName']." AND CompanyId=".$CompanyId, $con); 
	  $resRatt=mysql_num_rows($sqlRatt);
	   if($resRatt>0)
       {
        $SqlUpdate = mysql_query("UPDATE hrm_sales_verhq SET RegionId=".$_POST['RegionId'].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where HqId=".$_POST['HQName']." AND Vertical=".$_POST['EmpVertical']." AND DeptId=".$_POST['DeptName']." AND CompanyId=".$CompanyId, $con) or die(mysql_error());
       }
       else
       {
        $SqlUpdate = mysql_query("insert into hrm_sales_verhq (Vertical, HqId, RegionId, CompanyId, DeptId, Status, CreatedBy, CreatedDate) values(".$_POST['EmpVertical'].", ".$_POST['HQName'].", ".$_POST['RegionId'].", ".$CompanyId.", ".$_POST['DeptName'].", 'A', ".$UserId.", '".date("Y-m-d")."')", $con);
       }
       */
       

/****************************** History History History History History History *************************/
	   //if($SqlUpGen1)
	   //{ 
	       
	     $Qyearp=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'", $con);
		  $Yearp=mysql_fetch_assoc($Qyearp); $yPms=$Yearp['CurrY']; 
		  
		  $sPms=mysql_query("select HR_CurrGradeId, HR_CurrDesigId, HR_Curr_DepartmentId from hrm_employee_pms where EmployeeID=".$EMPID." AND AssessmentYear=".$yPms." AND CompanyId=".$CompanyId,$con); $rPms=mysql_fetch_assoc($sPms);
	       
	     if($res['DepartmentId']!=0 AND $res['DesigId']!=0 AND $res['GradeId']!=0 AND ($rPms['HR_Curr_DepartmentId']!=$_POST['EmpDept'] OR $rPms['HR_CurrDesigI']!=$_POST['EmpDesig'] OR $rPms['HR_CurrGradeId']!=$_POST['EmpGrade'])) 
		 { 
		     
		     
		  /************************** PMS *************************/
		  
		  if(date("Y-m-d")<=date('Y-03-15'))
		  {
		  $upPms=mysql_query("update hrm_employee_pms set HR_CurrGradeId='".$_POST['EmpGrade']."', HR_CurrDesigId='".$_POST['EmpDesig']."', HR_Curr_DepartmentId='".$_POST['EmpDept']."' where EmployeeID=".$EMPID." AND AssessmentYear=".$yPms." AND CompanyId=".$CompanyId,$con);
		  }
		  /************************** PMS *************************/
		     
		  /***************************************** History Open **************/ 
		  
        $SqlE = mysql_query("select EmpCode,Fname,Sname,Lname from hrm_employee where EmployeeID=".$EMPID, $con); 
		  $ResE=mysql_fetch_assoc($SqlE); 
		  
		  if($ResE['Sname']==''){ $EnameE=trim($ResE['Fname']).' '.trim($ResE['Lname']); }
else{ $EnameE=trim($ResE['Fname']).' '.trim($ResE['Sname']).' '.trim($ResE['Lname']); }
		  
		  //$EnameE = $ResE['Fname'].' '.$ResE['Sname'].' '.$ResE['Lname']; 
          $sqlEDept = mysql_query("select department_name from core_departments where id=".$_POST['EmpDept'],$con);
		  $sqlEDe=mysql_query("select designation_name from core_designation where id=".$_POST['EmpDesig'], $con);
		  $sqlEGr=mysql_query("select grade_name from core_grades where id=".$_POST['EmpGrade']." AND company_id=".$CompanyId, $con);
		  $resEDept=mysql_fetch_assoc($sqlEDept); $resEDe=mysql_fetch_assoc($sqlEDe); $resEGr=mysql_fetch_assoc($sqlEGr);
    
          $sqlHC = mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChD FROM hrm_pms_appraisal_history where EmpCode=".$ResE['EmpCode']." AND CompanyId=".$CompanyId, $con); $resHC = mysql_fetch_assoc($sqlHC); 
		  if($resHC)
		  {
		   $sqlMax = mysql_query("SELECT * FROM hrm_pms_appraisal_history where SalaryChange_Date='".$resHC['SalaryChD']."' AND EmpCode=".$ResE['EmpCode']." AND CompanyId=".$CompanyId, $con); $resMax = mysql_fetch_assoc($sqlMax);
		   $sqlHis = mysql_query("select * from hrm_pms_appraisal_history where EmpCode=".$ResE['EmpCode']." AND SalaryChange_Date='".date('Y-m-d')."' AND CompanyId=".$CompanyId, $con); $rowHis=mysql_num_rows($sqlHis); 
           if($rowHis>0)
           { 
            $sqlUhis=mysql_query("update hrm_pms_appraisal_history set Proposed_Grade='".$resEGr['grade_name']."', Department='".$resEDept['department_name']."', Proposed_Designation='".$resEDe['designation_name']."' where EmpCode=".$ResE['EmpCode']." AND SalaryChange_Date='".date('Y-m-d')."' AND CompanyId=".$CompanyId, $con); 
           }
           if($rowHis==0)
           { 
            $sqlUhis=mysql_query("insert into hrm_pms_appraisal_history(EmpPmsId, EmpCode, EmpName, Current_Grade, Proposed_Grade, Department, Current_Designation, Proposed_Designation, SalaryChange_Date, SystemDate, Salary_Basic, Salary_HRA, Salary_CA, Salary_SA, Previous_GrossSalaryPM, Current_GrossSalaryPM, Proposed_GrossSalaryPM, BonusAnnual_September, Prop_PeInc_GSPM, PropSalary_Correction, TotalProp_GSPM, TotalProp_PerInc_GSPM, Score, Rating, CompanyId, YearId) values(0, '".$ResE['EmpCode']."', '".$EnameE."', '".$resMax['Current_Grade']."', '".$resEGr['grade_name']."', '".$resEDept['department_name']."', '".$resMax['Current_Designation']."', '".$resEDe['designation_name']."', '".date("Y-m-d",strtotime($_POST['DateCTC']))."', '".date("Y-m-d")."', '".$resMax['Salary_Basic']."', '".$resMax['Salary_HRA']."', '".$resMax['Salary_CA']."', '".$resMax['Salary_SA']."', '".$resMax['Previous_GrossSalaryPM']."', '".$resMax['Current_GrossSalaryPM']."', '".$resMax['Proposed_GrossSalaryPM']."', '".$resMax['BonusAnnual_September']."', '".$resMax['Prop_PeInc_GSPM']."', '".$resMax['PropSalary_Correction']."', '".$resMax['TotalProp_GSPM']."', 0, 0, 0, ".$CompanyId.", ".$YearId.")", $con);
           }
		  }
		  
          /***************************************** History Close **************/
		 } 
		 
	   //}
/****************************** History History History History History History *************************/




/** Update Reporting Open **/	   
	   $sqlRep=mysql_query("select * from hrm_sales_reporting where EmployeeID=".$EMPID, $con); $rowRep=mysql_num_rows($sqlRep);
	   if($rowRep>0)
	   { $sqlRep2=mysql_query("select ReportingId from hrm_sales_reporting where RStatus='A' AND EmployeeID=".$EMPID, $con); $resRep2=mysql_fetch_assoc($sqlRep2);
		 if($resRep2['ReportingId']!=$_POST['RepName'])
		 { $sqlUpRep=mysql_query("update hrm_sales_reporting set RToDate='".date("Y-m-d")."', RStatus='D', CreatedBy=".$UserId.", CreatedDate='".date('Y-m-d')."' where RStatus='A' AND EmployeeID=".$EMPID, $con);
		   if($sqlUpRep)
		   { $sqlRep2=mysql_query("insert into hrm_sales_reporting(EmployeeID, ReportingId, RStatus, RFromDate, CreatedBy, CreatedDate) values(".$EMPID.", ".$_POST['RepName'].", 'A', '".date("Y-m-d")."', ".$UserId.", '".date('Y-m-d')."')", $con);
		   }
		 }
	   }
	   elseif($rowRep==0)
	   { $sqlUpRep2=mysql_query("insert into hrm_sales_reporting(EmployeeID, ReportingId, RStatus, RFromDate, CreatedBy, CreatedDate) values(".$EMPID.", ".$_POST['RepName'].", 'A', '".date("Y-m-d")."', ".$UserId.", '".date('Y-m-d')."')", $con); 
	   }
/** Update Reporting Close **/

/** Update Sales Reporting Level Open **/
if($_POST['DeptName']!='' AND $_POST['DeptName']!=0)  //AND $_POST['DeptName']==6
{ 	

 $E=$EMPID; 
 if($_POST['RepName']>0)
 { $R1=$_POST['RepName'];
   $sqlR2=mysql_query("select RepEmployeeID from hrm_employee_general where EmployeeID=".$_POST['RepName'], $con); $resR2=mysql_fetch_assoc($sqlR2);
   if($resR2['RepEmployeeID']>0)
   { $R2=$resR2['RepEmployeeID'];
     $sqlR3=mysql_query("select RepEmployeeID from hrm_employee_general where EmployeeID=".$resR2['RepEmployeeID'], $con); $resR3=mysql_fetch_assoc($sqlR3); 
	 if($resR3['RepEmployeeID']>0)
     { $R3=$resR3['RepEmployeeID'];
	   $sqlR4=mysql_query("select RepEmployeeID from hrm_employee_general where EmployeeID=".$resR3['RepEmployeeID'], $con); $resR4=mysql_fetch_assoc($sqlR4); 
	   if($resR4['RepEmployeeID']>0)
       { $R4=$resR4['RepEmployeeID'];
	     $sqlR5=mysql_query("select RepEmployeeID from hrm_employee_general where EmployeeID=".$resR4['RepEmployeeID'], $con); $resR5=mysql_fetch_assoc($sqlR5); 
         if($resR5['RepEmployeeID']>0){ $R5=$resR5['RepEmployeeID']; } else{$R5=0;}
       } else{$R4=0; $R5=0;}
     } else{$R3=0; $R4=0; $R5=0;}
   } else{$R2=0; $R3=0; $R4=0; $R5=0;}
  } else{$R1=0; $R2=0; $R3=0; $R4=0; $R5=0;}
 
  $sqlSE=mysql_query("select * from hrm_sales_reporting_level where EmployeeID=".$E, $con); $rowSE=mysql_num_rows($sqlSE);
  if($rowSE==0)
  { $sqlU=mysql_query("insert into hrm_sales_reporting_level(EmployeeID,R1,R2,R3,R4,R5) values(".$E.",".$R1.",".$R2.",".$R3.",".$R4.",".$R5.")", $con); }
  elseif($rowSE>0)
  { $sqlU=mysql_query("update hrm_sales_reporting_level set R1=".$R1.",R2=".$R2.",R3=".$R3.",R4=".$R4.",R5=".$R5." where EmployeeID=".$E, $con); }
  
}
/** Update Sales Reporting Level Close **/
	   

         //DateConfirmationYN='".$YN."', ConfirmHR='".$YH."', 
	 if($SqlUpGen1) { $msg = "General data has been Updated successfully...";} 
	 
 if($_POST['EmpStatus']=='D')
 {
     
     $check_move = mysql_query("SELECT MoveRep from hrm_employee WHERE EmployeeID=$EMPID",$con);
     $chk = mysql_fetch_assoc($check_move);
     if($chk =='Y'){
          $cnn=mysql_connect('184.168.127.72','vnressus_hrims_user','hrims@192');
 $db=mysql_select_db('vnressus_hrims', $cnn);  

 $SqlUp1 = mysql_query("UPDATE hrm_employee SET EmpStatus='D',  DateOfResignation='".$Reg."', DateOfSepration='".$Sep."', CreatedBy=".$UserId.",CreatedDate='".date('Y-m-d')."',YearId=".$YearId." WHERE  VCode='' and EmployeeID=".$EMPID, $cnn);
//  $SqlUp2 = mysql_query("UPDATE hrm_employee_general SET RepEmployeeID=0, ReportingName='', ReportingDesigId=0,  ReportingContactNo='', ReportingEmailId='' WHERE  RepEmployeeID=".$EMPID, $cnn);
//  $SqlUp3 = mysql_query("UPDATE hrm_employee_reporting SET AppraiserId=0 WHERE AppraiserId=".$EMPID, $cnn);
//  $SqlUp4 = mysql_query("UPDATE hrm_employee_reporting SET ReviewerId=0 WHERE ReviewerId=".$EMPID, $cnn);
//  $SqlUp5 = mysql_query("UPDATE hrm_employee_reporting SET HodId=0 WHERE HodId=".$EMPID, $cnn);
     }
     

 }
	 
	 }
   } 
} 

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/EmpMasterAddNewAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script language="javascript">
function EditGeneral()
{
document.getElementById("EmpStatus").disabled = false; document.getElementById("FileNo").readOnly = false; 
document.getElementById("DOJ").readOnly = false; document.getElementById("f_btn1").disabled = false; 
document.getElementById("DOC").readOnly = false; document.getElementById("f_btn2").disabled = false;
document.getElementById("DOB").readOnly = false; document.getElementById("f_btn3").disabled = false;
document.getElementById("BWageCategory").disabled = false; document.getElementById("OffiEmialId").readOnly = false;
document.getElementById("OffiMobileNo").readOnly = false; document.getElementById("MobileNo2_Vnr").readOnly = false;
document.getElementById("PositionCode").readOnly = false; document.getElementById("hiring_mode").disabled = false;
document.getElementById("EsslCode").readOnly = false;
document.getElementById("Fun").disabled = false; document.getElementById("Ver").disabled = false;
document.getElementById("Dept").disabled = false; document.getElementById("SubDept").disabled = false;
document.getElementById("Sec").disabled = false; document.getElementById("Desig").disabled = false;
document.getElementById("Grade").disabled = false; document.getElementById("DesigSuffix").disabled = false; 
document.getElementById("State").disabled = false;
document.getElementById("City").disabled = false; document.getElementById("SubLocation").readOnly = false;
document.getElementById("BU").disabled = false; document.getElementById("Zone").disabled = false;
document.getElementById("Region").disabled = false; document.getElementById("Terr").disabled = false;
document.getElementById("BankName1").readOnly = false; document.getElementById("AccountNo1").readOnly = false; 
document.getElementById("ifsc1").readOnly = false; document.getElementById("Branch1").readOnly = false; 
document.getElementById("Address1").readOnly = false; 
document.getElementById("BankName2").readOnly = false; document.getElementById("AccountNo2").readOnly = false; 
document.getElementById("ifsc2").readOnly = false; document.getElementById("Branch2").readOnly = false; 
document.getElementById("Address2").readOnly = false; 
document.getElementById("InsCardNo").readOnly = false; document.getElementById("PfAccountNo").readOnly = false;
document.getElementById("PF_UAN").readOnly = false; document.getElementById("ESICNo").readOnly = false;
document.getElementById("RepName").disabled = false;
document.getElementById("NoticeDay_Prob").disabled = false; document.getElementById("NoticeDay_Conf").disabled = false;
document.getElementById("f_btnn6").disabled = false;
document.getElementById("TrfDept").disabled = false; document.getElementById("TrfLoc").disabled = false;
document.getElementById("f_btnn7").disabled = false;
document.getElementById("Trf2Dept").disabled = false; document.getElementById("Trf2Loc").disabled = false;
document.getElementById("RetiStatus").disabled = false;  document.getElementById("f_btnReti").disabled = false; 
document.getElementById("RetiNewCode").readOnly = false;  document.getElementById("RetiOldCode").readOnly = false;
document.getElementById("f_btn11").disabled = false; 
document.getElementById("EditGeneralE").style.display = 'block'; document.getElementById("ChangeGeneral").style.display = 'none'; 
}

/**********************************************************************************/
/**********************************************************************************/
function ApplyFilter(v,Field,EmpField,TargetName,TargetSpan,FieldNxt,EmpFieldNxt,TargetNameNxt,TargetSpanNxt)
 { 
   
   document.getElementById(EmpField).value = v; document.getElementById("TargetDiv").value = TargetSpan; 
   var dept=0; var fun=0; var comid = document.getElementById("comid").value;
   if(TargetName=='Grade'){ var dept = document.getElementById("EmpDept").value; } 
   if(TargetName=='Dept'){ var fun = document.getElementById("EmpFun").value;  } 
   if(TargetName!='0' && TargetName!=' ')
   { 
     var url = 'FilterMasterAjax.php';  var pars = 'Act=FilerDataShow&v='+v+'&Field='+Field+'&EmpField='+EmpField+'&TargetName='+TargetName+'&TargetSpan='+TargetSpan+'&dept='+dept+'&fun='+fun+'&FieldNxt='+FieldNxt+'&EmpFieldNxt='+EmpFieldNxt+'&TargetNameNxt='+TargetNameNxt+'&TargetSpanNxt='+TargetSpanNxt+'&comid='+comid;  
     var myAjax = new Ajax.Request(
     url, 
     {
      method: 'post', 
      parameters: pars,
      onComplete: show_ApplyFilter
     });
   }
 } 
 
function show_ApplyFilter(originalRequest)
{ 
  var TargetSpan=document.getElementById("TargetDiv").value; 
  document.getElementById(TargetSpan).innerHTML = originalRequest.responseText; 
  var v = document.getElementById("EmpDept").value;
  if(TargetSpan=='SubDeptSpan')
  {   
    var v = document.getElementById("EmpDept").value; 
    ApplyFilter(v,'Dept','EmpDept','Desig','DesigSpan','Desig','EmpDesig','Grade','GradeSpan');
  }
  else if(TargetSpan=='DesigSpan')
  {   
    var v = document.getElementById("EmpDept").value; 
    ApplyFilter(v,'Dept','EmpDept','Sec','SecSpan','Sec','EmpSec','0','0');
  }
  
  //else if(nmID=='Sec'){ ApplyCore(vID,noID,'Desig');  }
}
/**********************************************************************************/
/**********************************************************************************/
function Deact(v){ if(v=='D'){ document.getElementById("Resig").readOnly = false; document.getElementById("Sep").readOnly = false; document.getElementById("Resig_btn").disabled = false; document.getElementById("Sep_btn").disabled = false;}
 if(v=='A'){ document.getElementById("Resig").readOnly = true; document.getElementById("Sep").readOnly = true; document.getElementById("Resig_btn").disabled = true; document.getElementById("Sep_btn").disabled = true;}
}


function PassCheck()
{ if(document.getElementById("EmpPCheck").checked==true)
  { var agree=confirm("Are you sure you want to Change this Employee Password?"); if (agree) { document.getElementById("EmpPass").readOnly = false; }
    else { document.getElementById("EmpPass").readOnly = true; document.getElementById("EmpPCheck").checked=false;}
  } else { document.getElementById("EmpPass").readOnly = true; }  
}

</script>
<?php  if($_REQUEST['Event']=='Edit') {?>
<script language="javascript">
function validate(formEgeneral) 
{    
  var DOJ = formEgeneral.DOJ.value;  
  if (DOJ.length === 0) { alert("You must enter a date of joining.");  return false; }
  
  var DOB = formEgeneral.DOB.value;  
  if (DOB.length === 0) { alert("You must enter a date of birth.");  return false; }
  
  var DMY=DOJ.split('-');     //splits the date string by '-' and stores in a array.
  var DMY2=DOB.split('-');
  var day=DMY[0];  var month=DMY[1];  var year=DMY[2];
  var day1=DMY2[0];  var month1=DMY2[1];  var year1=DMY2[2];
  var dateTemp1=month+'/'+day+'/'+year;  
  var dateTemp2=month1+'/'+day1+'/'+year1;
  var date1 = new Date(dateTemp1);//mm/dd/yy 
  var date2 = new Date(dateTemp2); //mm/dd/yy
  var Timed1=date1.getTime(); var Timed2=date2.getTime();
  if(Timed2>Timed1){alert('Error : Please check date of birth!'); return false;}	
  
  var Fun = formEgeneral.Fun.value;  
  if (Fun==0) { alert("Please select function name.");  return false; }

  var Ver = formEgeneral.Ver.value;  
  if (Ver==0) { alert("Please select vertical name.");  return false; }

  var Dept = formEgeneral.Dept.value;  
  if (Dept==0) { alert("Please select department name.");  return false; }

  var Desig = formEgeneral.Desig.value;  
  if (Desig==0) { alert("Please select designation name.");  return false; }

  var Grade = formEgeneral.Grade.value;  
  if (Grade==0) { alert("Please select grade name.");  return false; }

  var State = formEgeneral.State.value;  
  if (State==0) { alert("Please select state name.");  return false; }

  var City = formEgeneral.City.value;  
  if (City==0) { alert("Please select city name.");  return false; }
  
  var OffiMobileNo = formEgeneral.OffiMobileNo.value; 
  if (OffiMobileNo!='')  { var Numfilter=/^[0-9 ]+$/;  var test_num2 = Numfilter.test(OffiMobileNo)
  if(test_num2==false) { alert('Please Enter Only Number in the Office mobile number Field'); return false; }	
  if (OffiMobileNo.length<10 || OffiMobileNo.length>10)  { alert("Please enter a right formate of office mobile number");  return false; } }	
  
  var OffiEmialId = formEgeneral.OffiEmialId.value;
  if (OffiEmialId!='')  {  var EmailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  var EmailCheck = EmailPattern.test(OffiEmialId);
 // if (OffiEmialId.length === 0)   { alert("You must enter a office email Id..");   return false; }	
  if(!(EmailCheck)) { alert("You haven't entered in an valid office email address!");   return false; }  }
  
  var BankName1 = formEgeneral.BankName1.value;  
  if(BankName1!=''){  var filter=/^[a-zA-Z. /]+$/; var test_bool3 = filter.test(BankName1);
  if(test_bool3==false) { alert('Please Enter Only Alphabets in the Bank Name_1 Field');  return false; } }
  
  var AccountNo1 = formEgeneral.AccountNo1.value; 
  if(BankName1!='' && AccountNo1.length == 0){ alert('Please Enter Bank_1 Account number ');  return false; }
  if(AccountNo1!=''){  var Numfilter=/^[0-9 ]+$/;  var test_num3 = Numfilter.test(AccountNo1)
  if(test_num3==false) { alert('Please Enter Only Number in the Account No_1 Field');  return false; } }
  
  var Branch1 = formEgeneral.Branch1.value;  
  //if(BankName1!='' && Branch1.length == 0){ alert('Please Enter Bank 1 branch name');  return false; } 
  
  var Address1 = formEgeneral.Address1.value;  
  //if(BankName1!='' && Address1.length == 0){ alert('Please Enter Bank 1 Address');  return false; } 
  
  var agree = confirm('Are you sure you want to save the data?');
  if(agree){ return true; }else{ return false; } 
 
}

/*function toUpper(txt)
{ document.getElementById(txt).value=document.getElementById(txt).value.toUpperCase(); return true; }*/
</script>
<?php } ?>
</head>
<body class="body">
<input type="hidden" id="TargetDiv" value="0" />
<input type="hidden" id="comid" value="<?=$CompanyId?>" />

<?php 
//$SqlEmp = mysql_query("SELECT hrm_employee.*,hrm_employee_general.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee.EmployeeID=".$EMPID, $con) or die(mysql_error());  $ResEmp=mysql_fetch_assoc($SqlEmp);
      
$SqlEmp = mysql_query("SELECT e.*, g.*, function_name, vertical_name, department_name, sub_department_name, section_name, designation_name, city_village_name, zone_name, region_name, territory_name from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID  left join core_functions fun on g.EmpFunction=fun.id
  left join core_verticals ver on g.EmpVertical=ver.id
  left join core_departments dept on g.DepartmentId=dept.id
  left join core_sub_department_master subdept on g.SubDepartmentId=subdept.id
  left join core_section sec on g.EmpSection=sec.id
  left join core_designation desig on g.DesigId=desig.id
  left join core_city_village_by_state vlg on g.HqId=vlg.id 
  left join core_business_unit bu on g.BUId=bu.id
  left join core_zones z on g.ZoneId=z.id
  left join core_regions rg on g.RegionId=rg.id
  left join core_territory tr on g.TerrId=tr.id
  WHERE e.EmployeeID=".$EMPID,$con);

//grade_name, state_name,
//left join core_grades gr on g.GradeId=gr.id
//left join core_states st on g.CostCenter=st.id
  /*left join core_business_unit bu on g.BUId=bu.id
  left join core_zones z on g.ZoneId=z.id
  left join core_regions rg on g.RegionId=rg.id
  left join core_territory tr on g.TerrId=tr.id*/

$ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; 
if($ResEmp['VCode']=='V'){ $EC = $ResEmp['EmpCode']; }
else
{ 
  $LEC=strlen($ResEmp['EmpCode']); if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
}  
?>
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){require_once("AMenu.php"); } ?></td></tr></table></td></tr>
<tr><td valign="top">
      <table width="100%" style="margin-top:0px;" border="0">
	    <tr><td valign="top"><?php if($_SESSION['login'] = true){require_once("AWelcome.php"); } ?></td></tr>
	    <tr>
	        <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php $sqlEm=mysql_query("select mas_gene from hrm_user_menu_master where AXAUESRUser_Id=".$UserId, $con); $resEm=mysql_fetch_array($sqlEm);  ?>
  <table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="4">
   <table border="0">
    <tr>
    <?php if($resEm['mas_gene']==1) { ?> 
	  <td align="right" width="240" class="heading">General</td>
	  <td>&nbsp;&nbsp;&nbsp;</td>
	  <td style="font-family:Times New Roman; font-size:16px; color:#287126; font-weight:bold;"><font color="#FF0000" size="4">*</font>  - Require Field</td>
	   <td><table><tr><td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><span id="msgspan">
	   <?php echo $msg; ?></span></b></td></tr></table></td>
	</tr>
   </table>
  </td>
  <?php } ?> 
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:100px;" align="center" valign="top"><?php if($_REQUEST['Event']=='Edit') { include("EmpMasterMenu.php"); } ?></td>
 
<td style="width:50px;" align="center" valign="top"></td>
<?php //*********************************************************************************************************************************************************?>
<?php  if($_REQUEST['Event']=='Edit' AND $resEm['mas_gene']==1) {?>
<td align="left" id="Egeneral" valign="top"> 
<?php if($resEm['mas_gene']==1) { ?>             
<form enctype="multipart/form-data" name="formEgeneral" method="post" onSubmit="return validate(this)">
<table border="0">
<tr>
 <td colspan="2">
  <table><tr>
 <td class="All_100">EmpCode :</td><td class="All_60"><input name="EmpCode" id="EmpCode" class="All_50" style="background-color:#E6EBC5;" value="<?php echo $EC; ?>" Readonly></td>
 <td class="All_50">Name :</td><td class="All_250"><input name="EmpName" id="EmpName" style="width:210px; height:18px; font-size:11px;background-color:#E6EBC5;text-transform:uppercase;" value="<?php echo $Ename; ?>" Readonly></td>
 <td class="All_100">&nbsp;Password :</td><td class="All_150">&nbsp;<input type="password" name="EmpPass" id="EmpPass" class="All_120" value="<?php echo $ResEmp['EmpPass']; ?>" readonly>
<?php  //<input type="checkbox" name="EmpPCheck" id="EmpPCheck" disabled onChange="PassCheck()"/> ?>
  </td>
  </tr></table>
 </td>
</tr>
<tr> 
<td align="left"  valign="top">
<span id="EditTEmp"></span>
<table border="0" width="750" id="TEmp" style="display:block;">
<tr>
<td colspan="6" style="font-size:11px;">
 <fieldset align="center"><legend><b>Basic Details</b></legend> 
 <table style="width:100%;">
 <tr>
  <td class="All_100">Status :</td><td class="All_125"><select name="EmpStatus" id="EmpStatus" class="All_120" disabled style="text-transform:uppercase;" onChange="Deact(this.value)">
  <option value="<?php echo $ResEmp['EmpStatus']; ?>"><?php if($ResEmp['EmpStatus']=='A'){echo 'Active';} else { echo 'Deactive';} ?></option>
  <option value="<?php if($ResEmp['EmpStatus']=='A'){echo 'D';} else { echo 'A';} ?>"><?php if($ResEmp['EmpStatus']=='A'){echo 'Deactive';} else { echo 'Active';} ?></option></select>
  <input type="hidden" name="EmpCode" id="EmpCode" class="All_80" value="<?php echo $EC; ?>" readonly></td>
  <td class="All_100">Resignation<font color="#FF0000">*</font> :</td><td class="All_125"><input name="Resig" id="Resig" class="All_100" value="<?php if($ResEmp['DateOfResignation']=='0000-00-00'){ echo '00-00-0000';} elseif($ResEmp['DateOfResignation']=='1970-01-01'){ echo '00-00-0000';} else { echo date("d-m-Y",strtotime($ResEmp['DateOfResignation'])); } ?>" readonly><button id="Resig_btn" class="CalenderButton" disabled></button></td>
  
  <td class="All_100">Sepration : &nbsp;<font color="#FF0000">*</font></td><td class="All_125"><input name="Sep" id="Sep" class="All_90" value="<?php if($ResEmp['DateOfSepration']=='0000-00-00'){ echo '00-00-0000';} elseif($ResEmp['DateOfSepration']=='1970-01-01'){ echo '00-00-0000';} else { echo date("d-m-Y",strtotime($ResEmp['DateOfSepration'])); }?>" readonly><button id="Sep_btn" class="CalenderButton" disabled></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("Resig_btn", "Resig", "%d-%m-%Y");  cal.manageFields("Sep_btn", "Sep", "%d-%m-%Y");</script></td>
  </td>
</tr>
<tr><!--style="text-transform:uppercase;"-->
  <td class="All_100">First Name :</td><td class="All_125">
  <input name="Fname" id="Fname" value="<?php echo ucfirst($ResEmp['Fname']); ?>" class="All_120" readonly></td>
  <td class="All_100">Second Name :</td><td class="All_140">
  <input name="Sname" id="Sname" value="<?php echo ucfirst($ResEmp['Sname']); ?>" class="All_120" readonly></td>
  <td class="All_100">Last Name :</td><td class="All_125">
  <input name="Lname" id="Lname" value="<?php echo ucfirst($ResEmp['Lname']); ?>" class="All_120" readonly></td>
</tr>
<tr>
  <td class="All_100">FileNo :</td><td class="All_125"><input name="FileNo" id="FileNo" class="All_120" value="<?php echo $ResEmp['FileNo']; ?>" readonly></td>
  <td class="All_100">Joining<font color="#FF0000">*</font> :</td><td class="All_125"><input name="DOJ" id="DOJ" class="All_100" value="<?php if($ResEmp['DateJoining']=='0000-00-00'){ echo '00-00-0000';} else { echo date("d-m-Y",strtotime($ResEmp['DateJoining'])); } ?>" readonly><button id="f_btn1" class="CalenderButton" disabled></button></td>
  <td class="All_100">Confirmation : &nbsp;<font color="#FF0000">*</font></td><td class="All_125"><input name="DOC" id="DOC" class="All_90" value="<?php if($ResEmp['DateConfirmation']=='0000-00-00'){ echo '00-00-0000';} elseif($ResEmp['DateConfirmation']=='1970-01-01'){ echo '00-00-0000';} else { echo date("d-m-Y",strtotime($ResEmp['DateConfirmation'])); }?>" readonly><button id="f_btn2" class="CalenderButton" disabled></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("f_btn2", "DOC", "%d-%m-%Y");  cal.manageFields("f_btn1", "DOJ", "%d-%m-%Y");</script></td>
</tr>

<?php //$timestamp_start = strtotime($ResEmp['DOB']);  $timestamp_end = strtotime(date("Y-m-d")); 
      //$difference = abs($timestamp_end - $timestamp_start); 
      //$days = floor($difference/(60*60*24)); $months = floor($difference/(60*60*24*30)); $years2 = $difference/(60*60*24*365); 
      //$Y2=$years2*12; $M22=$months-$Y2;
      //$AgeMain=number_format($years2, 1);

$date1 = $ResEmp['DOB'];
$date2 = date("Y-m-d");
$diff = abs(strtotime($date2) - strtotime($date1));
$years = floor($diff/(365*60*60*24));
$months = floor(($diff-$years*365*60*60*24)/(30*60*60*24));
$days = floor(($diff-$years*365*60*60*24-$months*30*60*60*24)/(60*60*24)); 
$AgeMain=$years.'.'.$months;		

?>
<tr>
  <td class="All_100" valign="top">Date Of Birth :</td><td class="All_125"><input name="DOB" id="DOB" class="All_90" value="<?php echo date("d-m-Y",strtotime($ResEmp['DOB'])); ?>" readonly><button id="f_btn3" class="CalenderButton" disabled></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("f_btn3", "DOB", "%d-%m-%Y");</script></td>
  <td class="All_100">Age :</td><td class="All_125"><input class="All_120" value="<?php echo $AgeMain.'   Year'; ?>" readonly></td>
  <td class="All_100" valign="top">Skill :&nbsp;</td><td class="All_125"><select name="BWageCategory" id="BWageCategory" class="All_120" disabled><?php if($ResEmp['BWageId']==0){ ?><option value="0">Select</option><?php } $sBat=mysql_query("select * from hrm_bonus_wages where BWageStatus!='De' AND CompanyId=".$CompanyId." group by BWageId ASC order by BWageId ASC"); while($rBat=mysql_fetch_assoc($sBat)){ ?>
   <option value="<?php echo $rBat['BWageId'];?>" <?=($ResEmp['BWageId']==$rBat['BWageId'])?'selected':'';?>><?php echo $rBat['Category'];?></option>
  <?php }  ?>
  </select></td>
</tr>


<tr>
  <td class="All_100" valign="top">Offi. EmailId :&nbsp;<font color="#FF0000"></font></td><td class="All_125"><input maxlength="50" name="OffiEmialId" id="OffiEmialId" class="All_120" value="<?php echo $ResEmp['EmailId_Vnr']; ?>" readonly></td>
  <td class="All_100" valign="top">Official Mob-1 :</td><td class="All_125"><input class="All_120" maxlength="10" name="OffiMobileNo" id="OffiMobileNo" value="<?php if($ResEmp['MobileNo_Vnr']==0) echo ''; else {echo $ResEmp['MobileNo_Vnr'];} ?>" readonly></td>
  <td class="All_100" valign="top">Official Mob-2 :</td><td class="All_125"><input class="All_120" maxlength="10" name="MobileNo2_Vnr" id="MobileNo2_Vnr" value="<?php if($ResEmp['MobileNo2_Vnr']==0) echo ''; else {echo $ResEmp['MobileNo2_Vnr'];} ?>" readonly></td> 
</tr>



<tr>
  <td class="All_100" valign="top">Position Code :&nbsp;<font color="#FF0000"></font></td><td class="All_125"><input maxlength="50" name="PositionCode" id="PositionCode" class="All_120" value="<?php echo $ResEmp['PositionCode']; ?>" readonly></td>
  
  <td class="All_100" valign="top">Hiring Mode : &nbsp;</td>
    <td class="All_125">
        <select name="hiring_mode" id="hiring_mode" class="All_120" disabled>
            <option value="">Select</option>
            <option value="Campus" <?php if($ResEmp['Hiring_Mode']=='Campus'){echo 'selected';} ?> >Campus</option>
            <option value="Non Campus" <?php if($ResEmp['Hiring_Mode']=='Non Campus'){echo 'selected';}?>>Non Campus</option>
        </select>
    </td>
	
  <td class="All_100" valign="top">ESSL Code : &nbsp;</td>
    <td class="All_125">
        <input class="All_120" type="text" id="EsslCode" name="EsslCode" value="<?php echo $ResEmp['EsslCode'];  ?>" readonly/>
    </td>	
</tr>

 </table>
 </fieldset>
</td>
</tr> 


<?php /*********************************-----------------***************************************/?>
<?php /*********************************-----------------***************************************/?>
<tr>
<td colspan="6" style="font-size:11px;">
 <fieldset align="center"><legend><b>Core Details</b></legend> 
 <table style="width:100%;">
 <tr>
<td class="All_100" valign="top">Function :&nbsp;</td>
<td class="All_125">
 <span id="FunSpan"> 
 <select name="Fun" id="Fun" onChange="ApplyFilter(this.value,'Fun','EmpFun','Ver','VerSpan','Ver','EmpVer','Dept','DeptSpan')" class="All_120" disabled>
<?php if($ResEmp['EmpFunction']==0 || $ResEmp['EmpFunction']=='') { ?><option value="0">Select</option><?php } ?>    
<?php $sFun=mysql_query("select * from core_functions where is_active=1 order by function_name ASC",$con); while($rFun=mysql_fetch_assoc($sFun)){ ?><option value="<?=$rFun['id']?>" <?php if($ResEmp['EmpFunction']==$rFun['id']){echo 'selected';}?>><?=$rFun['function_name']?></option><?php } ?></select>
 </span> 
 <input type="hidden" id="EmpFun" name="EmpFun" value="<?php if($ResEmp['EmpFunction']==''){echo 0;}else{echo $ResEmp['EmpFunction']; }?>" />
</td>

<td class="All_100" valign="top">Vertical :&nbsp;</td>
<td class="All_125">
 <span id="VerSpan"> 
 <select name="Ver" id="Ver" onChange="ApplyFilter(this.value,'Ver','EmpVer','Dept','DeptSpan','Dept','EmpDept','SubDept','SubDeptSpan')" class="All_120" disabled> 
<?php if($ResEmp['EmpVertical']==0 || $ResEmp['EmpVertical']=='') { ?><option value="0">Select</option><?php }else{ ?> 
      <option value="<?=$ResEmp['EmpVertical']?>"><?=$ResEmp['vertical_name']?></option><?php } ?></select>
 </span>      
<input type="hidden" id="EmpVer" name="EmpVer" value="<?php if($ResEmp['EmpVertical']==''){echo 0;}else{echo $ResEmp['EmpVertical']; }?>" />
</td>

<td class="All_100" valign="top">Department :&nbsp;<font color="#FF0000">*</font></td>
<td class="All_125">
 <span id="DeptSpan">
 <select class="All_120" name="Dept" id="Dept" onChange="ApplyFilter(this.value,'Dept','EmpDept','SubDept','SubDeptSpan','SubDept','EmpSubDept','Section','SectionSpan')" style="text-transform:uppercase;" disabled>
 <?php if($ResEmp['DepartmentId']==0 || $ResEmp['DepartmentId']=='') { ?><option value="0">Select</option><?php }else{ ?> 
  <option value="<?=$ResEmp['DepartmentId']?>"><?=$ResEmp['department_name']?></option><?php } ?></select>
 </span>  
<input type="hidden" id="EmpDept" name="EmpDept" value="<?php if($ResEmp['DepartmentId']==''){echo 0;}else{echo $ResEmp['DepartmentId']; }?>" />
</td>
</tr>
<tr>
 <td class="All_100">Sub-Dept. :&nbsp;<font color="#FF0000">*</font></td>
 <td class="All_125">
  <span id="SubDeptSpan">
  <?php/*onChange="ApplyFilter(this.value,'SubDept','EmpSubDept','Sec','SecSpan','Sec','EmpSec','0','0')"*/?>
  <select class="All_120" name="SubDept" id="SubDept" onChange="ApplyFilter(this.value,'SubDept','EmpSubDept','0','0','0','0','0','0')" style="text-transform:uppercase;" disabled>
  <?php if($ResEmp['SubDepartmentId']==0 || $ResEmp['SubDepartmentId']=='') { ?><option value="0">Select</option><?php }else{ ?> 
    <option value="<?=$ResEmp['SubDepartmentId']?>"><?=$ResEmp['sub_department_name']?></option><?php } ?></select>
  </span>
  <input type="hidden" id="EmpSubDept" name="EmpSubDept" value="<?php if($ResEmp['SubDepartmentId']==''){echo 0;}else{echo $ResEmp['SubDepartmentId']; }?>" />
</td>

  <td class="All_100" valign="top">Section :&nbsp;</td>
  <td class="All_125">
  <span id="SecSpan">
  <select name="Sec" id="Sec" onChange="ApplyFilter(this.value,'Sec','EmpSec','0','0','0','0','0','0')" class="All_120" disabled> 
  <?php if($ResEmp['EmpSection']==0 || $ResEmp['EmpSection']=='') { ?><option value="0">Select</option><?php }else{ ?> 
    <option value="<?=$ResEmp['EmpSection']?>"><?=$ResEmp['section_name']?></option><?php } ?>
  </select>
  </span>  <!-- End Span -->
  <input type="hidden" id="EmpSec" name="EmpSec" value="<?php if($ResEmp['EmpSection']==''){echo 0;}else{echo $ResEmp['EmpSection']; }?>" />
 </td> 

  <td class="All_100">Designation :&nbsp;<font color="#FF0000">*</font></td>
  <td class="All_125">
  <span id="DesigSpan">
  <select class="All_120" name="Desig" id="Desig" onChange="ApplyFilter(this.value,'Desig','EmpDesig','Grade','GradeSpan','Grade','EmpGrade','0','0')" style="text-transform:uppercase;" disabled>
  <?php if($ResEmp['DesigId']==0 || $ResEmp['DesigId']=='') { ?><option value="0">Select</option><?php }else{ ?> 
    <option value="<?=$ResEmp['DesigId']?>"><?=$ResEmp['designation_name']?></option><?php } ?></select>
  </span>
  <input type="hidden" id="EmpDesig" name="EmpDesig" value="<?php if($ResEmp['DesigId']==''){echo 0;}else{echo $ResEmp['DesigId']; }?>" />
</td>
</tr>
<tr>
  <td class="All_100" valign="top">Grade :</td>
  <td class="All_125">
  <span id="GradeSpan">
  <select class="All_120" name="Grade" id="Grade" onChange="ApplyFilter(this.value,'Grade','EmpGrade','0','0','0','0','0','0')" style="text-transform:uppercase;" disabled>
  <?php if($ResEmp['GradeId']==0 || $ResEmp['GradeId']=='') { ?><option value="0">Select</option><?php } ?>
  <?php $sGrade = mysql_query("select * from core_grades WHERE is_active=1 and company_id=".$CompanyId." order by id", $con); 
        while($rGrade=mysql_fetch_assoc($sGrade)){ ?><option value="<?=$rGrade['id']?>" <?php if($rGrade['id']==$ResEmp['GradeId']){echo 'selected';}?>><?=$rGrade['grade_name']?></option><?php } ?></select>
  </span>

  <input type="hidden" id="EmpGrade" name="EmpGrade" value="<?php if($ResEmp['GradeId']==''){echo 0;}else{echo $ResEmp['GradeId']; }?>" />
  </td>
  
    <td class="All_100" valign="top">Desig. Suffix :</td>
  <td class="All_125">
  <span id="DesigSuffixSpan">
  <select class="All_120" name="DesigSuffix" id="DesigSuffix"  disabled>
  <option value="">Select</option>
  <option value="Department" <?= $ResEmp['DesigSuffix'] =='Department'?'selected':''?> >Department</option>
  <option value="SubDepartment" <?= $ResEmp['DesigSuffix'] =='SubDepartment'?'selected':''?> >Sub Department</option>
  <option value="Section" <?= $ResEmp['DesigSuffix'] =='Section'?'selected':''?> >Section</option>
  </select>
  </span>

  <input type="hidden" id="EmpDesigSuffix" name="EmpDesigSuffix" value="<?php if($ResEmp['DesigSuffix']==''){echo '';}else{echo $ResEmp['DesigSuffix']; }?>" />
  </td>
  
  </tr>  
 </table>
 </fieldset>
</td>
</tr>

<tr>
<td colspan="6" style="font-size:11px;">
 <fieldset align="center"><legend><b>Job Location</b></legend> 
 <table style="width:100%;">
 <tr>
  <td class="All_100" valign="top">State :&nbsp;<font color="#FF0000"></font></td>
  <td class="All_125">
  <span id="StateSpan">  
  <select class="All_120" name="State" id="State" onChange="ApplyFilter(this.value,'State','EmpState','City','CitySpan','City','EmpCity','0','0')" disabled>
  <?php if($ResEmp['CostCenter']==0 || $ResEmp['CostCenter']=='') { ?><option value="0">Select</option><?php } ?>
  <?php $sCostC = mysql_query("select * from core_states WHERE is_active=1 order by state_name",$con);
while($rCostC = mysql_fetch_array($sCostC)){ ?><option value="<?=$rCostC['id']?>" <?php if($rCostC['id']==$ResEmp['CostCenter']){echo 'selected';}?>><?=$rCostC['state_name']?></option><?php }  ?></select>
 </span>
 <input type="hidden" id="EmpState" name="EmpState" value="<?php if($ResEmp['CostCenter']==''){echo 0;}else{echo $ResEmp['CostCenter']; }?>" />
</td>

<td class="All_100" valign="top">City :&nbsp;<font color="#FF0000">*</font></td>
<td class="All_125" valign="top"> 
 <span id="CitySpan">  
 <select class="All_120" name="City" id="City" onChange="ApplyFilter(this.value,'City','EmpCity','0','0','0','0','0','0')" disabled>
  <?php if($ResEmp['HqId']==0 || $ResEmp['HqId']=='') { ?><option value="0">Select</option><?php }else{ ?> 
    <option value="<?=$ResEmp['HqId']?>"><?=$ResEmp['city_village_name']?></option><?php } ?></select>
 </span>   
<input type="hidden" id="EmpCity" name="EmpCity" value="<?php if($ResEmp['HqId']==''){echo 0;}else{echo $ResEmp['HqId']; }?>" />
</td>
<td class="All_100" valign="top">Sub Location :</td>
 <td class="All_125"> 
  <input class="All_120" name="SubLocation" id="SubLocation" value="<?=$ResEmp['SubLocation']?>" readonly>
 </td>
</tr> 
 </table>
 </fieldset>
</td>
</tr>

<tr>
<td colspan="6" style="font-size:11px;">
 <fieldset align="center"><legend><b>Business Location</b></legend> 
 <table style="width:100%;">
 <tr>
  <td class="All_100" valign="top">BU :&nbsp;</td>
  <td class="All_125">
  <span id="BUSpan">
  <select class="All_120" name="BU" id="BU" onChange="ApplyFilter(this.value,'BU','EmpBU','Zone','ZoneSpan','Zone','EmpZone','Region','RegionSpan')" class="All_120" disabled>
  <?php if($ResEmp['BUId']==0 || $ResEmp['BUId']=='') { ?><option value="0">Select</option><?php } ?>
  <?php $sBu = mysql_query("select * from core_business_unit WHERE is_active=1 order by vertical_id desc, business_unit_name",$con); 
    while($rBu = mysql_fetch_array($sBu)){ ?><option value="<?=$rBu['id']?>" <?php if($rBu['id']==$ResEmp['BUId']){echo 'selected';}?>><?=$rBu['business_unit_name']?></option><?php } ?></select>
  </span> 
  
  <input type="hidden" id="EmpBU" name="EmpBU" value="<?php if($ResEmp['BUId']==''){echo 0;}else{echo $ResEmp['BUId']; }?>" />
  </td>

  <td class="All_100" valign="top">Zone :&nbsp;</td>
  <td class="All_125">
  <span id="ZoneSpan">  
  <select class="All_120" name="Zone" id="Zone" class="tdinput" onChange="ApplyFilter(this.value,'Zone','EmpZone','Region','RegionSpan','Region','EmpRegion','Terr','TerrSpan')" disabled><?php if($ResEmp['ZoneId']==0 || $ResEmp['ZoneId']=='') { ?><option value="0">Select</option><?php }else{ ?><option value="<?=$ResEmp['ZoneId']?>"><?=$ResEmp['zone_name']?></option><?php } ?></select>
  </span>
  <input type="hidden" id="EmpZone" name="EmpZone" value="<?php if($ResEmp['ZoneId']==''){echo 0;}else{echo $ResEmp['ZoneId']; }?>" />
  </td>

  <td class="All_100" valign="top">Region :&nbsp;</td>
  <td class="All_125" valign="top">
  <span id="RegionSpan">  
  <select class="All_120" name="Region" id="Region" onChange="ApplyFilter(this.value,'Region','EmpRegion','Terr','TerrSpan','Terr','EmpTerr','0','0')" class="tdinput" style="width:99%;" disabled><?php if($ResEmp['RegionId']==0 || $ResEmp['RegionId']=='') { ?><option value="0">Select</option><?php }else{ ?><option value="<?=$ResEmp['RegionId']?>"><?=$ResEmp['region_name']?></option><?php } ?></select>
  </span>
  <input type="hidden" id="EmpRegion" name="EmpRegion" value="<?php if($ResEmp['RegionId']==''){echo 0;}else{echo $ResEmp['RegionId']; }?>" /> 
  </td>
  </tr> 
  <tr>
   <td class="All_100" valign="top">Territory :&nbsp;</td>
   <td class="All_125" valign="top">
    <span id="TerrSpan">
    <select class="All_120" name="Terr" id="Terr" onChange="ApplyFilter(this.value,'Terr','EmpTerr','0','0','0','0','0','0')" class="tdinput" disabled><?php if($ResEmp['TerrId']==0 || $ResEmp['TerrId']=='') { ?><option value="0">Select</option><?php }else{ ?><option value="<?=$ResEmp['TerrId']?>"><?=$ResEmp['territory_name']?></option><?php } ?></select> 
    </span>
  <input type="hidden" id="EmpTerr" name="EmpTerr" value="<?php if($ResEmp['TerrId']==''){echo 0;}else{echo $ResEmp['TerrId']; }?>" />
  </td>
  </tr>
 </table>
 </fieldset>
</td>
 
</tr>

<?php /*********************************-----------------***************************************/?>
<?php /*********************************-----------------***************************************/?>


<tr>
  <td style="font-size:11px;" colspan="2" valign="top">
<fieldset><legend><b>Bank_1</b></legend>
<table border="0">
<tr><td class="All_100">Name :</td><td class="All_125">
<input class="All_120" name="BankName1" id="BankName1" value="<?php echo $ResEmp['BankName']; ?>" onKeyUp="return toUpper(this.id)" readonly></td></tr>					
<tr><td class="All_100">AccountNo. :</td><td class="All_125">
<input class="All_120" name="AccountNo1" id="AccountNo1" value="<?php if($ResEmp['AccountNo']>0){echo $ResEmp['AccountNo']; } else {echo '';}?>" readonly></td></tr>	
<tr><td class="All_100">IFSC Code :</td><td class="All_125">
<input class="All_120" name="ifsc1" id="ifsc1" value="<?php echo $ResEmp['BankIfscCode']; ?>" onKeyUp="return toUpper(this.id)" readonly></td></tr>
<tr><td class="All_100">Branch :</td><td class="All_125">
<input class="All_120" name="Branch1" id="Branch1" value="<?php echo $ResEmp['BranchName']; ?>" onKeyUp="return toUpper(this.id)" readonly></td></tr>					
<tr><td class="All_100">Address. :</td><td class="All_125">
<input class="All_120" name="Address1" id="Address1" value="<?php echo $ResEmp['BranchAdd']; ?>" onKeyUp="return toUpper(this.id)" readonly></td></tr>		
</table>
</fieldset>
  </td>
<td style="font-size:11px;" colspan="2" valign="top">
  <fieldset align="center"><legend><b>Bank_2</b></legend>
<table border="0">
<tr><td class="All_100">Name :</td><td class="All_125">
<input class="All_120" name="BankName2" id="BankName2" value="<?php echo $ResEmp['BankName2']; ?>" onKeyUp="return toUpper(this.id)" readonly></td></tr>					
<tr><td class="All_100">AccountNo. :</td><td class="All_125">
<input class="All_120" name="AccountNo2" id="AccountNo2" value="<?php if($ResEmp['AccountNo2']>0){echo $ResEmp['AccountNo2']; } else {echo '';}?>" readonly></td></tr>

<tr><td class="All_100">IFSC Code :</td><td class="All_125">
<input class="All_120" name="ifsc2" id="ifsc2" value="<?php echo $ResEmp['BankIfscCode2']; ?>" onKeyUp="return toUpper(this.id)" readonly></td></tr>

<tr><td class="All_100">Branch :</td><td class="All_125">
<input class="All_120" name="Branch2" id="Branch2" value="<?php echo $ResEmp['BranchName2']; ?>" onKeyUp="return toUpper(this.id)" readonly></td></tr>					 
<tr><td class="All_100">Address. :</td><td class="All_125">
<input class="All_120" name="Address2" id="Address2" value="<?php echo $ResEmp['BranchAdd2']; ?>" onKeyUp="return toUpper(this.id)" readonly></td></tr>		
</table>
</fieldset>
  </td>
  </td>
   <td style="font-size:11px;" colspan="2" valign="top">
<fieldset align="center"><legend><b>Legal</b></legend>
<table border="0">
<tr><td class="All_100" valign="top">Ins. No. :</td><td class="All_125">
<input class="All_120" name="InsCardNo" id="InsCardNo" value="<?php echo $ResEmp['InsuCardNo']; ?>" onKeyUp="return toUpper(this.id)" readonly></td></tr>
<tr><td class="All_100" valign="top">PF No. :</td><td class="All_125"><input class="All_120" name="PfAccountNo" id="PfAccountNo" value="<?php if($ResEmp['PfAccountNo']==''){echo 'CG0018650';}else{echo $ResEmp['PfAccountNo']; } ?>" onKeyUp="return toUpper(this.id)" readonly></td></tr>
<tr><td class="All_100" valign="top">PF UAN :</td><td class="All_125"><input class="All_120" name="PF_UAN" id="PF_UAN" value="<?php if($ResEmp['PF_UAN']!='' AND $ResEmp['PF_UAN']>0){echo $ResEmp['PF_UAN'];}else{echo 0; } ?>" onKeyUp="return toUpper(this.id)" readonly></td></tr>

<?php /*
<tr><td class="All_100" valign="top">Esic :</td><td class="All_125">
<select class="All_60" name="ESIC_Allow" id="ESIC_Allow" onChange="EsicAllow(this.value)" disabled>
<option value="<?php echo $ResEmp['EsicAllow']; ?>" selected><?php if($ResEmp['EsicAllow']=='N'){echo 'NO';} else { echo 'YES';} ?></option>
<option value="<?php if($ResEmp['EsicAllow']=='N'){echo 'Y';} else { echo 'N';} ?>"><?php if($ResEmp['EsicAllow']=='N'){echo 'YES';} else { echo 'NO';} ?></option></select></td></tr>
*/ ?>

<input type="hidden" name="ESIC_Allow" id="ESIC_Allow">
<tr><td class="All_100" valign="top">Esic No. :</td><td class="All_125"><input class="All_120" name="ESICNo" id="ESICNo" value="<?php if($ResEmp['EsicNo']>0){echo $ResEmp['EsicNo'];} else { echo ''; } ?>" readonly>

<?php /* <?php $sqlEsic=mysql_query("select Esic_EmployerCode from hrm_company_statutory_esic", $con); $resEsic=mysql_fetch_assoc($sqlEsic);?> 
 <input class="All_120" style="display:none;" name="ESICNo" id="ESICNo2" value="<?php echo $resEsic['Esic_EmployerCode']; ?>" readonly>*/ ?></td></tr>
 

</table>
</fieldset>
  </td>
</tr>
<tr>
  <td style="font-size:11px;" colspan="6">
<fieldset align="center"><legend><b>Reporting</b></legend>
<table border="0">
<tr><td class="All_100" valign="top">Name :</td><td class="All_200">
    <select class="All_180" name="RepName" id="RepName" onChange="RepSelect(this.value)" disabled>
   <option value="<?php echo $ResEmp['RepEmployeeID']; ?>"><?php if($ResEmp['RepEmployeeID']==0) {echo 'select';} else {echo $ResEmp['ReportingName'];} ?></option>
   <?php if($ResEmp['GradeId']!=15) {  $sqlRep=mysql_query("select * from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.GradeId>=".$ResEmp['GradeId']." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' order by Fname ASC" , $con); }
         elseif($ResEmp['GradeId']==15) {  $sqlRep=mysql_query("select * from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.GradeId>=1 AND hrm_employee_general.GradeId<15 AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' order by Fname ASC" , $con); } ?>  
   <?php  while($resRep=mysql_fetch_array($sqlRep)) {?>
    <option value="<?php echo $resRep['EmployeeID']; ?>"><?php echo $resRep['Fname'].' '.$resRep['Sname'].' '.$resRep['Lname']; ?></option><?php } ?>
	<?php $sqlMRep=mysql_query("select * from hrm_employee where EmpType='M' AND CompanyId=".$CompanyId." order by Fname ASC" , $con); while($resMRep=mysql_fetch_array($sqlMRep)) {?>
    <option value="<?php echo $resMRep['EmployeeID']; ?>"><?php echo $resMRep['Fname'].' '.$resMRep['Sname'].' '.$resMRep['Lname']; ?></option><?php } ?>
   </select></td>
 <?php $sqlRn=mysql_query("select DesigId from hrm_employee_general where EmployeeID=".$ResEmp['RepEmployeeID'], $con); $resRn=mysql_fetch_assoc($sqlRn);
      $SqlDeD=mysql_query("select designation_name as DesigName from core_designation where id=".$resRn['DesigId'], $con); $ResDeD=mysql_fetch_assoc($SqlDeD);?>  				
<td class="All_100" valign="top">Designation :</td><td class="All_185"><input type="hidden" name="RepDesigF" id="RepDesigF" value="<?php echo $ResEmp['ReportingDesigId']; ?>" readonly><input class="All_180" id="RepDesigNameF" name="RefDesigNameF" value="<?php echo $ResDeD['DesigName']; ?>" readonly>
<span id="ReportingSpan"></span>
</td></tr>	
<tr><td class="All_100" valign="top">EmailId :</td><td class="All_200"><input class="All_180" name="RepEmailIdF" id="RepEmailIdF" value="<?php echo $ResEmp['ReportingEmailId']; ?>" readonly></td>				
<td class="All_100" valign="top">ContactNo :</td><td class="All_185"><input class="All_180" name="RepContactNoF" id="RepContactNoF" value="<?php echo $ResEmp['ReportingContactNo']; ?>" readonly></td></tr>		
</table>
</fieldset>
</tr>

<?php /***************************** Service bond/ Notice Period *****************/ ?>
<?php /***************************** Service bond/ Notice Period *****************/ ?>
<tr>
 <td style="font-size:11px;" colspan="8">
<fieldset align="center"><legend><b>Service Bond/ Notice Period</b></legend>
<table border="0">
 <tr>
  <td class="All_100" colspan="4">Apply_Bond:&nbsp;<input type="checkbox" id="applyBond" <?php if($ResEmp['Apply_Bond']=='Y'){echo 'checked';} ?> onClick="FUnBond()"/><input type="hidden" id="TrfBond" name="TrfBond" value="<?=$ResEmp['Apply_Bond']?>" />
  <script>
  function FUnBond()
  { if(document.getElementById("applyBond").checked==true){var v='Y'; document.getElementById("BondYear").disabled=false;}
   else{v='N'; document.getElementById("BondYear").disabled=true;} 
   document.getElementById("TrfBond").value=v; }
  </script>
  </td>	
  <td class="All_50" style="text-align:right;">Year:</td>
  <td class="All_100"><select class="All_80" name="BondYear" id="BondYear" <?php if($ResEmp['Apply_Bond']=='Y'){echo '';}else{echo 'disabled'; }?>>
   <option value="" <?php if($ResEmp['Bond_Year']==''){echo 'selected';}?>>Select</option>
  <option value="1" <?php if($ResEmp['Bond_Year']==1){echo 'selected';}?>>1 Year</option>
  <option value="2" <?php if($ResEmp['Bond_Year']==2){echo 'selected';}?>>2 Year</option>
  <option value="3" <?php if($ResEmp['Bond_Year']==3){echo 'selected';}?>>3 Year</option>
  <option value="4" <?php if($ResEmp['Bond_Year']==4){echo 'selected';}?>>4 Year</option>
  <option value="5" <?php if($ResEmp['Bond_Year']==5){echo 'selected';}?>>5 Year</option>
  </select></td>
   <td class="All_150" style="text-align:right;">Notice Day (Probation):</td>
   <td class="All_50"><select class="All_50" name="NoticeDay_Prob" id="NoticeDay_Prob" disabled>
  <option value="0" <?php if($ResEmp['NoticeDay_Prob']==0){echo 'selected';}?>>Sel</option>
  <option value="15" <?php if($ResEmp['NoticeDay_Prob']==15){echo 'selected';}?>>15</option>
  <option value="30" <?php if($ResEmp['NoticeDay_Prob']==30){echo 'selected';}?>>30</option>
  <option value="45" <?php if($ResEmp['NoticeDay_Prob']==45){echo 'selected';}?>>45</option>
  <option value="60" <?php if($ResEmp['NoticeDay_Prob']==60){echo 'selected';}?>>60</option>
  <option value="75" <?php if($ResEmp['NoticeDay_Prob']==75){echo 'selected';}?>>75</option>
  <option value="90" <?php if($ResEmp['NoticeDay_Prob']==90){echo 'selected';}?>>90</option>
  <option value="105" <?php if($ResEmp['NoticeDay_Prob']==105){echo 'selected';}?>>105</option>
  <option value="120" <?php if($ResEmp['NoticeDay_Prob']==120){echo 'selected';}?>>120</option>
  </select></td>
   <td class="All_180" style="text-align:right;">Notice Day (Confirmation):</td>
   <td class="All_50"><select class="All_50" name="NoticeDay_Conf" id="NoticeDay_Conf" disabled>
  <option value="0" <?php if($ResEmp['NoticeDay_Conf']==0){echo 'selected';}?>>Sel</option>
  <option value="15" <?php if($ResEmp['NoticeDay_Conf']==15){echo 'selected';}?>>15</option>
  <option value="30" <?php if($ResEmp['NoticeDay_Conf']==30){echo 'selected';}?>>30</option>
  <option value="45" <?php if($ResEmp['NoticeDay_Conf']==45){echo 'selected';}?>>45</option>
  <option value="60" <?php if($ResEmp['NoticeDay_Conf']==60){echo 'selected';}?>>60</option>
  <option value="75" <?php if($ResEmp['NoticeDay_Conf']==75){echo 'selected';}?>>75</option>
  <option value="90" <?php if($ResEmp['NoticeDay_Conf']==90){echo 'selected';}?>>90</option>
  <option value="105" <?php if($ResEmp['NoticeDay_Conf']==105){echo 'selected';}?>>105</option>
  <option value="120" <?php if($ResEmp['NoticeDay_Conf']==120){echo 'selected';}?>>120</option>
  </select></td>
 </tr>		
</table>
</fieldset>
  </td>
</tr>
<?php /***************************** Service bond/ Notice Period *****************/ ?>
<?php /***************************** Service bond/ Notice Period *****************/ ?>


<?php /***************************** Transfer *****************/ ?>
<?php /***************************** Transfer *****************/ ?>
<tr>
 <td style="font-size:11px;" colspan="6">
<fieldset align="center"><legend><b>Transfer</b></legend>
<table border="0">
 <tr>
  <td class="All_120">(1) Transfer Date:</td>
  <td class="All_120"><input class="All_100" type="text" id="TrfDate" name="TrfDate" value="<?php if($ResEmp['Transfer_Dept_Date']!='' && $ResEmp['Transfer_Dept_Date']!='0000-00-00' && $ResEmp['Transfer_Dept_Date']!='1970-01-01'){ echo date("d-m-Y",strtotime($ResEmp['Transfer_Dept_Date'])); } ?>" readonly/><button id="f_btnn6" class="CalenderButton" disabled></button></td>
  <td>&nbsp;</td>
  <td class="All_50">Dept:</td>
  <td class="120"><select class="All_120" name="TrfDept" id="TrfDept" style="text-transform:uppercase;" disabled>
  <?php $SqlDept=mysql_query("select id as DepartmentId,department_name as DepartmentName from core_departments where is_active=1 order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)){ ?>
  <option value="<?=$ResDept['DepartmentName']?>" <?php if($ResEmp['Transfer_Dept_Name']==$ResDept['DepartmentName']){echo 'selected';}?>><?=$ResDept['DepartmentName']?></option><?php } ?>
  <option value="" <?php if($ResEmp['Transfer_Dept_Name']==''){echo 'selected';}?>>Select</option>
  </select></td>
  <td>&nbsp;</td>
  <td class="All_100">Location:</td>
  <td class="120"><select class="All_120" name="TrfLoc" id="TrfLoc" style="text-transform:uppercase;" disabled>
  <?php $SqlHq=mysql_query("select * from hrm_headquater where HQStatus='A' AND CompanyId=".$CompanyId." group by HqName order by HqName ASC", $con); while($ResHq=mysql_fetch_array($SqlHq)){ ?>
  <option value="<?=$ResHq['HqId']?>" <?php if($ResEmp['Transfer_location']==$ResHq['HqId']){echo 'selected';}?>><?=$ResHq['HqName']?></option><?php } ?>
  <option value="" <?php if($ResEmp['Transfer_location']==''){echo 'selected';}?>>Select</option>
  </select></td>
 </tr>
 <tr>
  <td class="All_120">(2) Transfer Date:</td>
  <td class="All_120"><input class="All_100" type="text" id="Trf2Date" name="Trf2Date" value="<?php if($ResEmp['Transfer2_Dept_Date']!='' && $ResEmp['Transfer2_Dept_Date']!='0000-00-00' && $ResEmp['Transfer2_Dept_Date']!='1970-01-01'){ echo date("d-m-Y",strtotime($ResEmp['Transfer2_Dept_Date'])); }?>" readonly/><button id="f_btnn7" class="CalenderButton" disabled></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("f_btnn6", "TrfDate", "%d-%m-%Y");  cal.manageFields("f_btnn7", "Trf2Date", "%d-%m-%Y");</script></td>
  <td>&nbsp;</td>
  <td class="All_50">Dept:</td>
  <td class="120"><select class="All_120" name="Trf2Dept" id="Trf2Dept" style="text-transform:uppercase;" disabled>
  <?php $SqlDept=mysql_query("select id as DepartmentId,department_name as DepartmentName from core_departments order by department_name ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)){ ?>
  <option value="<?=$ResDept['DepartmentName']?>" <?php if($ResEmp['Transfer2_Dept_Name']==$ResDept['DepartmentName']){echo 'selected';}?>><?=$ResDept['DepartmentName']?></option><?php } ?>
  <option value="" <?php if($ResEmp['Transfer2_Dept_Name']==''){echo 'selected';}?>>Select</option>
  </select></td>
  <td>&nbsp;</td>
  <td class="All_100">Location:</td>
  <td class="120"><select class="All_120" name="Trf2Loc" id="Trf2Loc" style="text-transform:uppercase;" disabled>
  <?php $SqlHq=mysql_query("select * from hrm_headquater where HQStatus='A' AND CompanyId=".$CompanyId." group by HqName order by HqName ASC", $con); while($ResHq=mysql_fetch_array($SqlHq)){ ?>
  <option value="<?=$ResHq['HqId']?>" <?php if($ResEmp['Transfer2_location']==$ResHq['HqId']){echo 'selected';}?>><?=$ResHq['HqName']?></option><?php } ?>
  <option value="" <?php if($ResEmp['Transfer2_location']==''){echo 'selected';}?>>Select</option>
  </select></td>
 </tr>
 <?php /*$SqlHq=mysql_query("select * from core_city_village_by_state where is_active=1 group by city_village_name order by city_village_name ASC"*/?>
</table>
</fieldset>
  </td>
</tr>
<?php /***************************** Transfer *****************/ ?>
<?php /***************************** Transfer *****************/ ?>

<tr>
  <td style="font-size:11px;" colspan="6" valign="top">
<fieldset><legend><b>Retirement</b></legend>
<table border="0">
<tr>
<td class="All_60">Retired :</td><td class="All_80"><select name="RetiStatus" id="RetiStatus" class="All_60" style="text-transform:uppercase;" disabled>
 <option value="<?php echo $ResEmp['RetiStatus']; ?>"><?php if($ResEmp['RetiStatus']=='Y'){echo 'YES';} else { echo 'NO';} ?></option>
 <option value="<?php if($ResEmp['RetiStatus']=='Y'){echo 'N';} else { echo 'Y';} ?>"><?php if($ResEmp['RetiStatus']=='Y'){echo 'NO';} else { echo 'YES';} ?></option>
</select></td>
<td class="All_100">Retired Date:</td><td class="All_150">
<input name="RetiDate" id="RetiDate" class="All_90" value="<?php if($ResEmp['RetiDate']=='0000-00-00'){ echo '00-00-0000';} elseif($ResEmp['RetiDate']=='1970-01-01'){ echo '00-00-0000';} else { echo date("d-m-Y",strtotime($ResEmp['RetiDate'])); }?>" readonly><button id="f_btnReti" class="CalenderButton" disabled></button>
<script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
cal.manageFields("f_btnReti", "RetiDate", "%d-%m-%Y");</script></td>
<?php if($ResEmp['RetiNewCode']!=0){$NewRetiCode=$ResEmp['RetiNewCode'];}
      elseif($ResEmp['RetiNewCode']==0)
	  { if($ResEmp['RetiStatus']=='Y')
	    { $sqlNCode=mysql_query("select MAX(RetiNewCode) as NRetiCode from hrm_employee where RetiStatus='Y' Order By RetiNewCode ASC", $con);
		  $resNCode=mysql_fetch_assoc($sqlNCode); 
		  if($resNCode['NRetiCode']==0){$NewRetiCode=11001;} 
		  else{$NewRetiCode=$resNCode['NRetiCode']+1;}
		}
		else
		{
		  $sqlN=mysql_query("select RetiNewCode from hrm_employee where RetiStatus='Y' Order By RetiNewCode ASC", $con); $rowNCode=mysql_num_rows($sqlN);
		  if($rowNCode>0)
		  {
		   $sqlNCode=mysql_query("select MAX(RetiNewCode) as NRetiCode from hrm_employee where RetiStatus='Y' Order By RetiNewCode ASC", $con);
		   $resNCode=mysql_fetch_assoc($sqlNCode); $NewRetiCode=$resNCode['NRetiCode']+1;
		   
		  }
		  else
		  {
		   $NewRetiCode=11001;
		  }
		}
		
	  }
 ?>
<td class="All_60">NewCode:</td><td class="All_80"><input name="RetiNewCode" id="RetiNewCode" class="All_60" value="<?php echo $NewRetiCode; ?>" readonly></td>
<td class="All_60">OldCode:</td><td class="All_80"><input name="RetiOldCode" id="RetiOldCode" class="All_60" value="<?php if($ResEmp['RetiOldCode']>0){echo $ResEmp['RetiOldCode'];}else{echo $EC;} ?>" readonly></td>
</tr>					
</table>
</fieldset>
  </td>
</tr>

<tr>
  <td align="Right" class="fontButton" colspan="6"><table border="0" align="right" class="fontButton">
	<tr>	
<?php if($_SESSION['User_Permission']=='Edit'){?> 
      <input type="hidden" name="DateHide" id="DateHide" class="All_80" value="<?php echo date("d-m-Y"); ?>" readonly> 
      <td style="width:260px;font-family:Times New Roman;font-size:15px;color:#FFFFFF;"><b>Effective Date:</b>&nbsp;<input name="DateCTC" id="DateCTC" class="All_80" value="<?php echo date("d-m-Y",strtotime($ResEmp['CreatedDate'])); ?>" readonly><button id="f_btn11" class="CalenderButton" disabled></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("f_btn11", "DateCTC", "%d-%m-%Y"); </script></td>
	  <td align="right" style="width:90px;"><input type="button" name="ChangeGeneral" id="ChangeGeneral" style="width:90px; display:block;" value="Edit" onClick="EditGeneral()">
		<input type="submit" name="EditGeneralE" id="EditGeneralE" style="width:90px;display:none;" value="save" onClick="ShowOnbtn()" ></td>
<?php } ?>
	  <td align="right" style="width:90px;"><input type="button" name="RefreshGenE" id="RefreshGenE" style="width:90px;" value="refresh" onClick="javascript:window.location='EmpGeneral.php?ID=<?php echo $EMPID; ?>&Event=Edit'"/> </td>
	</tr></table>
  </td>
</tr>
</table>
</td>
<?php include("EmpImg.php"); ?>
</tr>
</table>
</form> 
<?php } ?>    
</td>
<?php } ?>
<?php //*********************************************************************************************************************************************************?>
</tr>
<?php } ?> 
</table>
				
	  </td>
	</tr>
	
	<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>	
	<tr>
	  <td valign="top">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

