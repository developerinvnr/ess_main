<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}

$search =  '!"#$%&/\'-:_'; $search = str_split($search);
//$AccECP=str_replace($search, "", $String);  

if(isset($_POST['FormSave'])) 
{
  

 if($_POST['countRow']>0)
 {//echo "update hrm_employee_confletter set ConfDate='".date("Y-m-d", strtotime($_POST['DOCValue']))."', Communi='".$_POST['CO']."',  JobKnowl='".$_POST['JK']."', OutPut='".$_POST['OP']."', Initiative='".$_POST['INI']."', InterSkill='".$_POST['IS']."', ProblemSolve='".$_POST['PS']."', Attitude='".$_POST['AT']."', Attendance='".$_POST['ATT']."', EmpStrenght='".$_POST['ES']."', AreaImprovement='".$_POST['AI']."', Rating='".$_POST['RAT']."', Recommendation='".$_POST['REC']."', Reason='".$_POST['REA']."', HrRemark='".$_POST['HRRemark']."', Current_GradeId=".$_POST['OldGrade'].", Current_DesigId=".$_POST['OldDesig'].", GradeId=".$_POST['NewGrade'].", DesigId=".$_POST['NewDesig'].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."', YearId=".$YearId." where Status='A' AND EmployeeID=".$_POST['EI'];die;
   $sqlUp=mysql_query("update hrm_employee_confletter set ConfDate='".date("Y-m-d", strtotime($_POST['DOCValue']))."', Communi='".$_POST['CO']."',  JobKnowl='".$_POST['JK']."', OutPut='".$_POST['OP']."', Initiative='".$_POST['INI']."', InterSkill='".$_POST['IS']."', ProblemSolve='".$_POST['PS']."', Attitude='".$_POST['AT']."', Attendance='".$_POST['ATT']."', EmpStrenght='".str_replace($search, "", $_POST['ES'])."', AreaImprovement='".str_replace($search, "", $_POST['AI'])."', Rating='".$_POST['RAT']."', Recommendation='".$_POST['REC']."', Reason='".$_POST['REA']."', HrRemark='".str_replace($search, "", $_POST['HRRemark'])."', Current_GradeId='".$_POST['OldGrade']."', Current_DesigId='".$_POST['OldDesig']."', GradeId='".$_POST['NewGrade']."', DesigId='".$_POST['NewDesig']."', CreatedBy='".$UserId."', CreatedDate='".date("Y-m-d")."', YearId='".$YearId."' where Status='A' AND EmployeeID='".$_POST['EI']."'", $con);
 }
 else
 {
   $sqlUp=mysql_query("insert into hrm_employee_confletter(EmployeeID, ConfDate, Communi, JobKnowl, OutPut, Initiative, InterSkill, ProblemSolve, Attitude, Attendance, EmpStrenght, AreaImprovement, Rating, Recommendation, Reason, HrRemark, Current_GradeId, Current_DesigId, GradeId, DesigId, CreatedBy, CreatedDate, YearId) values(".$_POST['EI'].", '".date("Y-m-d", strtotime($_POST['DOCValue']))."', '".$_POST['CO']."', '".$_POST['JK']."', '".$_POST['OP']."', '".$_POST['INI']."', '".$_POST['IS']."', '".$_POST['PS']."', '".$_POST['AT']."', '".$_POST['ATT']."', '".str_replace($search, "", $_POST['ES'])."', '".str_replace($search, "", $_POST['AI'])."', '".$_POST['RAT']."', '".$_POST['REC']."', '".$_POST['REA']."', '".str_replace($search, "", $_POST['HRRemark'])."', '".$_POST['OldGrade']."', '".$_POST['OldDesig']."', '".$_POST['NewGrade']."', '".$_POST['NewDesig']."', '".$UserId."', '".date("Y-m-d")."', '".$YearId."')", $con);
 }
 
 if($sqlUp){ echo '<script>alert("Data save successfully, please click submite button for done employee confirmation form!");</script>'; }  
 
}


if(isset($_POST['FormSubmit'])) 
{ 
  $sqlL=mysql_query("select * from hrm_employee_confletter where Status='D' AND EmployeeID=".$_POST['EI']." order by ConfLetterId DESC", $con); $rowL=mysql_num_rows($sqlL);
  if($rowL>0 && $_POST['REC']==2){ $qry="Status='D'"; }
  elseif($rowL==0 && $_POST['REC']==2){ $qry="Status='A'"; }
  elseif($_POST['REC']==1){ $qry="Status='A'"; }
  $sqlUp=mysql_query("update hrm_employee_confletter set ConfDate='".date("Y-m-d", strtotime($_POST['DOCValue']))."', Communi='".$_POST['CO']."',  JobKnowl='".$_POST['JK']."', OutPut='".$_POST['OP']."', Initiative='".$_POST['INI']."', InterSkill='".$_POST['IS']."', ProblemSolve='".$_POST['PS']."', Attitude='".$_POST['AT']."', Attendance='".$_POST['ATT']."', EmpStrenght='".str_replace($search, "", $_POST['ES'])."', AreaImprovement='".str_replace($search, "", $_POST['AI'])."', Rating='".$_POST['RAT']."', Recommendation='".$_POST['REC']."', Reason='".$_POST['REA']."', HrRemark='".str_replace($search, "", $_POST['HRRemark'])."', Current_GradeId=".$_POST['OldGrade'].", Current_DesigId=".$_POST['OldDesig'].", GradeId=".$_POST['NewGrade'].", DesigId='".$_POST['NewDesig']."', SubmitStatus='Y', CreatedBy='".$UserId."',HR_Fill_Date ='".date("Y-m-d")."', CreatedDate='".date("Y-m-d")."', YearId='".$YearId."' where ".$qry." AND EmployeeID='".$_POST['EI']."'", $con);  
  
 if($sqlUp)
 {
    
  if($_POST['REC']==1)
  {
   $Up=mysql_query("update hrm_employee_general set DateConfirmationYN='Y', DateConfirmation='".date("Y-m-d", strtotime($_POST['DOCValue']))."', ConfirmHR='Y' where EmployeeID=".$_POST['EI'], $con);
   $ConFM=date("m", strtotime($_POST['DOCValue'])); $ConFY=date("Y", strtotime($_POST['DOCValue']));
   
   /*********************************** PL/FL Leave insert ****************************************/  
   $sqLe=mysql_query("select PL,FL from hrm_leavedistributed where LeaveDisMonth=".$ConFM." AND CompanyId=".$CompanyId,$con);   $reLe=mysql_fetch_assoc($sqLe);
   $sqlchk=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$_POST['EI']." AND Month=".$ConFM." AND Year=".$ConFY, $con); $rowchk=mysql_num_rows($sqlchk);
   if($rowchk>0)
   { 
       $sqlUpLe=mysql_query("update hrm_employee_monthlyleave_balance set OpeningPL='".$reLe['PL']."', OpeningOL='".$reLe['FL']."', CreditedPL='0', CreditedOL='0', TotPL='".$reLe['PL']."', TotOL='".$reLe['FL']."', BalancePL='".$reLe['PL']."', BalanceOL='".$reLe['FL']."' where EmployeeID='".$_POST['EI']."' AND Month='".$ConFM."' AND Year='".$ConFY."'", $con); 
       
       //$sqlUpLe=mysql_query("update hrm_employee_monthlyleave_balance set OpeningPL=0, OpeningOL=0, CreditedPL=".$reLe['PL'].", CreditedOL=".$reLe['FL'].", TotPL=".$reLe['PL'].", TotOL=".$reLe['FL'].", BalancePL=".$reLe['PL'].", BalanceOL=".$reLe['FL']." where EmployeeID=".$_POST['EI']." AND Month=".$ConFM." AND Year=".$ConFY, $con);
    
	   
   }
   else
   { 
       $sqlUpLe=mysql_query("insert into hrm_employee_monthlyleave_balance(EmployeeID, Month, Year, OpeningPL, OpeningOL, CreditedPL, CreditedOL, TotPL, TotOL, BalancePL, BalanceOL) values('".$_POST['EI']."', '".$ConFM."', '".$ConFY."', '".$reLe['PL']."', '".$reLe['FL']."', 0, 0, '".$reLe['PL']."', '".$reLe['FL']."', '".$reLe['PL']."', '".$reLe['FL']."')", $con); 
       
       //$sqlUpLe=mysql_query("insert into hrm_employee_monthlyleave_balance(EmployeeID, Month, Year, OpeningPL, OpeningOL, CreditedPL, CreditedOL, TotPL, TotOL, BalancePL, BalanceOL) values(".$_POST['EI'].", ".$ConFM.", ".$ConFY.", 0, 0, ".$reLe['PL'].", ".$reLe['FL'].", ".$reLe['PL'].", ".$reLe['FL'].", ".$reLe['PL'].", ".$reLe['FL'].")", $con); 
       
   }
   /*********************************** PL/FL Leave insert ****************************************/
   
   
   //Grade DesigUpdate
   $selGD=mysql_query("select GradeId,DesigId from hrm_employee_general where EmployeeID=".$_POST['EI'], $con);  $resGD=mysql_fetch_assoc($selGD);
   if($resGD['GradeId']!=$_POST['NewGrade'] OR $resGD['DesigId']!=$_POST['NewDesig'])
   {
     /********** PMS *************************/
     /********** PMS *************************/
     $Qyearp=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'", $con);
     $Yearp=mysql_fetch_assoc($Qyearp); $yPms=$Yearp['CurrY'];
  
     if(date("Y-m-d")<=date('Y-03-15'))
     {
      $upPms=mysql_query("update hrm_employee_pms set HR_CurrGradeId='".$_POST['NewGrade']."', HR_CurrDesigId='".$_POST['NewDesig']."' where EmployeeID=".$_POST['EI']." AND AssessmentYear=".$yPms." AND CompanyId=".$CompanyId,$con);
     }
     /********** General *************************/ 
     /********** General *************************/
     $sqlG = mysql_query("select * from hrm_employee_general where EmployeeID=".$_POST['EI'], $con); $res=mysql_fetch_assoc($sqlG);
     $sqlIns1=mysql_query("Insert into hrm_employee_general_event(GeneralId,EmployeeID,FileNo,DateJoining,DateConfirmationYN,DateConfirmation,DOB,DOB_dm,GradeId,CostCenter,HqId,DepartmentId,DesigId,DesigId2,MobileNo_Vnr,EmailId_Vnr,BankName,AccountNo,BranchName,BranchAdd,BankName2,AccountNo2,BranchName2,BranchAdd2,InsuCardNo,PfAccountNo,PF_UAN,EsicAllow,EsicNo,ReportingName,ReportingDesigId,ReportingEmailId,ReportingContactNo,CreatedBy,CreatedDate,YearId)values(".$res['GeneralId'].",".$res['EmployeeID'].",".$res['FileNo'].",'".$res['DateJoining']."','".$res['DateConfirmationYN']."','".$res['DateConfirmation']."','".$res['DOB']."','".$res['DOB_dm']."',".$res['GradeId'].",'".$res['CostCenter']."',".$res['HqId'].",".$res['DepartmentId'].",".$res['DesigId'].",".$res['DesigId2'].",".$res['MobileNo_Vnr'].",'".$res['EmailId_Vnr']."','".$res['BankName']."',".$res['AccountNo'].",'".$res['BranchName']."','".$res['BranchAdd']."','".$res['BankName2']."',".$res['AccountNo2'].",'".$res['BranchName2']."','".$res['BranchAdd2']."','".$res['InsuCardNo']."','".$res['PfAccountNo']."','".$res['PF_UAN']."','".$res['EsicAllow']."','".$res['EsicNo']."','".$res['ReportingName']."',".$res['ReportingDesigId'].",'".$res['ReportingEmailId']."',".$res['ReportingContactNo'].",".$res['CreatedBy'].",'".$res['CreatedDate']."','".$res['YearId']."')", $con);
     $SqlUpE = mysql_query("UPDATE hrm_employee_general SET GradeId=".$_POST['NewGrade'].", DesigId=".$_POST['NewDesig'].", CreatedBy='".$UserId."', CreatedDate='".date("Y-m-d")."', SysDate='".date("Y-m-d")."', YearId=".$YearId.", Remark='From Confirmation' WHERE EmployeeID=".$_POST['EI'], $con); 
     
     
     /***************************************** History Open **************/ 
		  
     $SqlE = mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentId,DesigId,GradeId from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$_POST['EI'], $con); $ResE=mysql_fetch_assoc($SqlE); 
	 if($ResE['Sname']==''){ $EnameE=trim($ResE['Fname']).' '.trim($ResE['Lname']); }else{ $EnameE=trim($ResE['Fname']).' '.trim($ResE['Sname']).' '.trim($ResE['Lname']); }
		  
     $sqlEDept = mysql_query("select department_name as DepartmentName from core_departments where id=".$ResE['DepartmentId'],$con);
	 $sqlEDe=mysql_query("select designation_name as DesigName from core_designation where id=".$ResE['DesigId'], $con);
	 $sqlEGr=mysql_query("select grade_name as GradeValue from core_grades where id=".$ResE['GradeId'], $con);
	 $resEDept=mysql_fetch_assoc($sqlEDept); $resEDe=mysql_fetch_assoc($sqlEDe); $resEGr=mysql_fetch_assoc($sqlEGr);
    
     $sqlHC = mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChD FROM hrm_pms_appraisal_history where EmpCode=".$ResE['EmpCode']." AND CompanyId=".$CompanyId, $con); $resHC = mysql_fetch_assoc($sqlHC); 
	 if($resHC)
	 {
		$sqlMax = mysql_query("SELECT * FROM hrm_pms_appraisal_history where SalaryChange_Date='".$resHC['SalaryChD']."' AND EmpCode=".$ResE['EmpCode']." AND CompanyId=".$CompanyId, $con); 
		$resMax = mysql_fetch_assoc($sqlMax);
		$sqlHis = mysql_query("select * from hrm_pms_appraisal_history where EmpCode=".$ResE['EmpCode']." AND SalaryChange_Date='".date('Y-m-d')."' AND CompanyId=".$CompanyId, $con); 
		$rowHis=mysql_num_rows($sqlHis); 
        if($rowHis>0)
        { 
            $sqlUhis=mysql_query("update hrm_pms_appraisal_history set Proposed_Grade='".$resEGr['GradeValue']."', Department='".$resEDept['DepartmentName']."', Proposed_Designation='".$resEDe['DesigName']."' where EmpCode=".$ResE['EmpCode']." AND SalaryChange_Date='".date('Y-m-d')."' AND CompanyId=".$CompanyId, $con); 
        }
        if($rowHis==0)
        { 
          $sqlUhis=mysql_query("insert into hrm_pms_appraisal_history(EmpPmsId, EmpCode, EmpName, Current_Grade, Proposed_Grade, Department, Current_Designation, Proposed_Designation, SalaryChange_Date, SystemDate, Salary_Basic, Salary_HRA, Salary_CA, Salary_SA, Previous_GrossSalaryPM, Current_GrossSalaryPM, Proposed_GrossSalaryPM, BonusAnnual_September, Prop_PeInc_GSPM, PropSalary_Correction, TotalProp_GSPM, TotalProp_PerInc_GSPM, Score, Rating, CompanyId, YearId) values(0, '".$ResE['EmpCode']."', '".$EnameE."', '".$resMax['Current_Grade']."', '".$resEGr['GradeValue']."', '".$resEDept['DepartmentName']."', '".$resMax['Current_Designation']."', '".$resEDe['DesigName']."', '".date("Y-m-d",strtotime($_POST['DateCTC']))."', '".date("Y-m-d")."', '".$resMax['Salary_Basic']."', '".$resMax['Salary_HRA']."', '".$resMax['Salary_CA']."', '".$resMax['Salary_SA']."', '".$resMax['Previous_GrossSalaryPM']."', '".$resMax['Current_GrossSalaryPM']."', '".$resMax['Proposed_GrossSalaryPM']."', '".$resMax['BonusAnnual_September']."', '".$resMax['Prop_PeInc_GSPM']."', '".$resMax['PropSalary_Correction']."', '".$resMax['TotalProp_GSPM']."', 0, 0, 0, ".$CompanyId.", ".$YearId.")", $con);
        }
	 } //if($resHC)
		  
          /***************************************** History Close **************/
     
     
       
   }
   //Grade DesigUpdate
   
  
  }
  elseif($_POST['REC']==2)
  {
   $sqlCm=mysql_query("SELECT ConfirmMonth,DateConfirmation FROM hrm_employee_general WHERE EmployeeID=".$_POST['EI'],$con); 
   $resCm=mysql_fetch_assoc($sqlCm);
   $ConfDate=date('Y-m-d', strtotime("+3 months", strtotime($_POST['DOCValue'])));
 
   //$ConfDate=date('Y-m-d', strtotime("+3 months", strtotime($resCm['DateConfirmation'])));
   $ConfMonth=$resCm['ConfirmMonth']+3;
   $Up=mysql_query("update hrm_employee_general set DateConfirmation='".$ConfDate."', ConfirmMonth=".$ConfMonth.", ConfirmHR='YY' where EmployeeID=".$_POST['EI'], $con);
   if($Up)
   {
	if($rowL==0)
	{ 
     $sq=mysql_query("update hrm_employee_confletter set Status='D' where Status='A' AND EmployeeID=".$_POST['EI']);
	 if($sq)
	 {
	  $sqlUp=mysql_query("insert into hrm_employee_confletter(EmployeeID, ConfDate, Communi, JobKnowl, OutPut, Initiative, InterSkill, ProblemSolve, Attitude, Attendance, EmpStrenght, AreaImprovement, Rating, Recommendation, Reason, SubmitStatus, HrRemark, Current_GradeId, Current_DesigId, GradeId, DesigId, Status, CreatedBy, CreatedDate, YearId) values(".$_POST['EI'].", '".date("Y-m-d", strtotime($_POST['DOCValue']))."', '".$_POST['CO']."', '".$_POST['JK']."', '".$_POST['OP']."', '".$_POST['INI']."', '".$_POST['IS']."', '".$_POST['PS']."', '".$_POST['AT']."', '".$_POST['ATT']."', '".$_POST['ES']."', '".$_POST['AI']."', '".$_POST['RAT']."', '".$_POST['REC']."', '".$_POST['REA']."', 'N', '".$_POST['HRRemark']."', '".$_POST['OldGrade']."', '".$_POST['OldDesig']."', '".$_POST['NewGrade']."', '".$_POST['NewDesig']."', 'A', '".$UserId."', '".date("Y-'m-d")."', '".$YearId."')", $con);
	 }//if($sq)
	}//if($rowL>0)
   }//if($Up)
   
  }
  
  echo '<script>alert("Data Submited Successfully");</script>';
 } //if($sqlUp)
   
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font {font-family:Times New Roman;font-size:15px; font-weight:bold;}.font1 {font-family:Times New Roman;font-size:15px;} .fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; display:none; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:11px;height:18px;}
.EditInput { font-family:Georgia; font-size:12px; width:100px; height:20px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function edit(v)
{document.getElementById("btnEdit").style.display='none';
 document.getElementById("btnSave").style.display='block'; 
 document.getElementById("f_btn1").disabled=false;
 for(var i=1; i<=8; i++){document.getElementById("A"+i).disabled=false;document.getElementById("B"+i).disabled=false;
                         document.getElementById("C"+i).disabled=false;document.getElementById("D"+i).disabled=false; 
						 document.getElementById("R"+i).disabled=false; }
 for(var j=1; j<=2; j++){document.getElementById("Rec"+j).disabled=false;}
 document.getElementById("VEmpStrenght").readOnly=false; document.getElementById("VAreaImprove").readOnly=false; document.getElementById("btnSubmit").disabled=false;
 document.getElementById("HRRemark").disabled=false; document.getElementById("NewDesig").disabled=false; document.getElementById("NewGrade").disabled=false;  
}

function ToREC(v) 
{ if(v==1){document.getElementById("ReasonExt").readOnly=true; document.getElementById("ReasonExt").value='';} 
  else if(v==2){document.getElementById("ReasonExt").readOnly=false;}
}

function validate(letterForm) 
{ if(document.getElementById("VEmpStrenght").value==''){alert('Please Type Employee Strength!'); return false; }
  if(document.getElementById("VAreaImprove").value==''){alert('Please Type Employee Areas of Improvement!'); return false; }
  if(document.getElementById("R1").checked==false && document.getElementById("R2").checked==false && document.getElementById("R3").checked==false && document.getElementById("R4").checked==false && document.getElementById("R5").checked==false && document.getElementById("R6").checked==false && document.getElementById("R7").checked==false && document.getElementById("R8").checked==false){alert('Please Select Rating Value!'); return false; }
  if(document.getElementById("Rec1").checked==false && document.getElementById("Rec2").checked==false){alert('Please Select Recommendation Value!'); return false; }
  if(document.getElementById("Rec1").checked==false && document.getElementById("Rec2").checked==true && document.getElementById("ReasonExt").value==''){alert('Please Type Reason For Extend Probation!'); return false; }
  if(document.getElementById("R1").checked==true && document.getElementById("Rec1").checked==true){alert('Error!..With Rating 1 the employee is recommended for extension of confirmation and Pending Improvement Plan(PIP).'); return false; }else {return true;}
}	

function LetterClick()
{ var E=document.getElementById("EI").value; var C=document.getElementById("ComId").value; 
  window.open("VeiwConfLetter.php?action=Letter&E="+E+"&C="+C,"AppLetter","scrollbars=yes,resizable=no,width=820,height=750,menubar=no,location=no,directories=no");
}

function ConfFormClick(v)
{ var E=document.getElementById("EI").value; var C=document.getElementById("ComId").value; 
  window.open("VeiwConfForm.php?action=Form&E="+E+"&C="+C+"&v="+v,"AppLetter","scrollbars=yes,resizable=no,width=950,height=750,menubar=no,location=no,directories=no");
}

function TrainyLetterClick()
{ var E=document.getElementById("EI").value; var C=document.getElementById("ComId").value; 
  window.open("VeiwTrainyConfLetter.php?action=Letter&E="+E+"&C="+C,"AppLetter","scrollbars=yes,resizable=no,width=820,height=750,menubar=no,location=no,directories=no");
} 

function ExtLetterClick()
{ 
  var E=document.getElementById("EI").value; var C=document.getElementById("ComId").value; 
  window.open("VeiwExtConfLetter.php?action=Letter&E="+E+"&C="+C,"AppLetter","scrollbars=yes,resizable=no,width=820,height=750,menubar=yes,location=no,directories=no");
} 


</script>
</head>
<body class="body">
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" /><input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //*************************************************************************************************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>		 
				  <td align="left" width="850" valign="top">
<form name="letterForm" method="post" onSubmit="return validate(this)">	
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" /> <input type="hidden" id="UserId" value="<?php echo $UserId; ?>" /> 
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
			 <td colspan="10"><table border="0"><tr>
			 <?php if($rowApp>0) { ?>
             <td align="center"><a href="EmpPendingConfLetter.php"><img id="Img_RepMgr1" style="display:none;" src="images/RepMgr1.png" border="0"/></a>
		     <img id="Img_RepMgr" style="display:block;" src="images/RepMgr.png" border="0"/></td><?php } ?>
			 <?php if($rowHod>0) { ?>
             <td align="center"><a href="EmpHodPendingConfLetter.php"><img id="Img_Hod1" style="display:block;" src="images/RevHod1.png" border="0"/></a>
		     <img id="Img_Hod" style="display:none;" src="images/RevHod.png" border="0"/></td><?php } ?>
			 <td>&nbsp;</td>
			 <td style="width:250px;font-family:Times New Roman; font-size:15px;" valign="top">&nbsp;<b><i><u>Pending Confirmation</u></i></b></td>
			 <td style="width:250px;">&nbsp;</td>
			 <td style="width:400px;font-family:Times New Roman;"align="right">
			 <a href="#" onClick="ConfFormClick('<?php echo $_REQUEST['v']; ?>')" style="text-decoration:underline;"><font color="">Print Form</a>&nbsp;&nbsp;&nbsp;&nbsp;
			 <b><a href="EmpConfLetter.php?DpId=<?php echo $_REQUEST['d']; ?>">Back</a></b></td>
			 </tr></table></td>
			</tr>
 <tr> 
 <td align="left" id="type" valign="top" style="display:block; width:100%">     
<?php
$id=$_REQUEST['e']; //$YId=$_POST['YId']; $UId=$_POST['UId']; 
$sql=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,DateJoining,DateConfirmationYN,DateConfirmation,GradeId,HqId,TerrId,Gender,DR,Married,ReportingName,ConfirmHR from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$id, $con);  $res=mysql_fetch_assoc($sql);
$Ename = $res['Fname'].'&nbsp;'.$res['Sname'].'&nbsp;'.$res['Lname']; $LEC=strlen($res['EmpCode']); 
if($res['DR']=='Y'){$M='Dr.';} elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$Ename; 
if($LEC==1){$EC='000'.$res['EmpCode'];} if($LEC==2){$EC='00'.$res['EmpCode'];} if($LEC==3){$EC='0'.$res['EmpCode'];} if($LEC>=4){$EC=$res['EmpCode'];}

$sqlD=mysql_query("select department_name as DepartmentName from core_departments where id=".$res['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
$sqlDe=mysql_query("select designation_name as DesigName from core_designation where id=".$res['DesigId'], $con); $resDe=mysql_fetch_assoc($sqlDe);

$sqlH=mysql_query("select city_village_name from core_city_village_by_state where id=".$res['HqId'], $con); $resH=mysql_fetch_assoc($sqlH);

$sqlTr=mysql_query("select territory_name from core_territory where id=".$res['TerrId'], $con); $resTr=mysql_fetch_assoc($sqlTr);

if($res['TerrId']>0){$Hq=$resTr['territory_name'];}else{$Hq=$resH['city_village_name']; }

$sqlG=mysql_query("select grade_name as GradeValue from core_grades where id=".$res['GradeId'], $con); $resG=mysql_fetch_assoc($sqlG); 
$d=date("d", strtotime($res['DateJoining'])); $m=date("m", strtotime($res['DateJoining'])); $y=date("Y",strtotime($res['DateJoining']));

if($m=='01'){$cm='07'; $cy=$y; $cm2='10'; $cy2=$y;} elseif($m=='02'){$cm='08'; $cy=$y; $cm2='11'; $cy2=$y;} elseif($m=='03'){$cm='09'; $cy=$y; $cm2='12'; $cy2=$y;} elseif($m=='04'){$cm='10'; $cy=$y; $cm2='01'; $cy2=$y+1;} elseif($m=='05'){$cm='11'; $cy=$y; $cm2='02'; $cy2=$y+1;} elseif($m=='06'){$cm='12'; $cy=$y; $cm2='03'; $cy2=$y+1;} elseif($m=='07'){$cm='01'; $cy=$y+1; $cm2='04'; $cy2=$y+1;} elseif($m=='08'){$cm='02'; $cy=$y+1; $cm2='05'; $cy2=$y+1;} elseif($m=='09'){$cm='03'; $cy=$y+1; $cm2='06'; $cy2=$y+1;} elseif($m=='10'){$cm='04'; $cy=$y+1; $cm2='07'; $cy2=$y+1;} elseif($m=='11'){$cm='05'; $cy=$y+1; $cm2='08'; $cy2=$y+1;} elseif($m=='12'){$cm='06'; $cy=$y+1; $cm2='09'; $cy2=$y+1;} 
 if(($_REQUEST['d']==6 OR $_REQUEST['d']==19 OR $_REQUEST['d']==4 OR $_REQUEST['d']==21 OR $_REQUEST['d']==2) AND ($res['DesigId']==71 OR $res['DesigId']==174 OR $res['DesigId']==169 OR $res['DesigId']==139)){$sy=$y+1; $dmy=$d.'-'.$m.'-'.$sy;}else{$dmy=$d.'-'.$cm.'-'.$cy;}
 if($_REQUEST['c']==1){ $ConfDate=$dmy;}elseif($_REQUEST['c']==2){$Extdmy=$d.'-'.$cm2.'-'.$cy2; $ConfDate=$Extdmy;} 
 
$sqlL=mysql_query("select * from hrm_employee_confletter where Status='".$_REQUEST['v']."' AND EmployeeID=".$id." order by ConfLetterId DESC", $con);  $rowL=mysql_num_rows($sqlL); if($rowL>0){$resL=mysql_fetch_assoc($sqlL);} 
?>
<input type="hidden" name="countRow" id="countRow" value="<?=$rowL?>" />

  <table border="0">
    <tr>
	 <td style="width:1000px;">
<table border="1" bgcolor="#FFFFFF">
 <tr><td align="center" style="font-family:Times New Roman;font-size:18px;width:1000px;"><b>Confirmation Appraisal Form</b></td></tr>
 <tr><td align="center" style="font-family:Times New Roman;font-size:15px;width:1000px;">
      <table border="1">
	   <tr>
	    <td class="font" style="width:100px;">&nbsp;Name:</td>
		<td style="width:350px;background-color:#F0EBE3;" align="">
		<input type="hidden" id="EI" name="EI" value="<?php echo $id; ?>" readonly />
		<input class="font1" style="width:345px;background-color:#F0EBE3;" id="EmpName" name="EmpName" value="<?php echo $NameE; ?>" readonly /></td>
		<td class="font" style="width:200px;">&nbsp;Employee Code:</td>
		<td style="width:350px;background-color:#F0EBE3;" align="">
		<input class="font1" style="width:345px;background-color:#F0EBE3; color:#000000;" id="EmpCode" name="EmpCode" value="<?php echo $EC; ?>" readonly /></td>
	   </tr>
	   <tr>
	    <td class="font" style="width:100px;">&nbsp;Location:</td>
		<td style="width:350px;background-color:#F0EBE3;" align="">
		<input class="font1" style="width:345px;background-color:#F0EBE3;" id="Location" name="Location" value="<?php echo $Hq; ?>" readonly /></td>
		<td class="font" style="width:200px;">&nbsp;Department:</td>
		<td style="width:350px;background-color:#F0EBE3;" align="">
		<input class="font1" style="width:345px;background-color:#F0EBE3;" id="DeptName" name="DeptName" value="<?php echo $resD['DepartmentName']; ?>" readonly /></td>
	   </tr>
	   <tr>
	    <td class="font" style="width:100px;">&nbsp;Grade:</td>
		<td style="width:350px;background-color:#F0EBE3;" align="">
		<input class="font1" style="width:345px;background-color:#F0EBE3;" id="GradeName" name="GradeName" value="<?php echo $resG['GradeValue']; ?>" readonly />
		<input type="hidden" name="GradeId" value="<?php echo $res['GradeId']; ?>" readonly /></td>
		<td class="font" style="width:200px;">&nbsp;Designation:</td>
		<td style="width:350px;background-color:#F0EBE3;" align="">
		<input class="font1" style="width:345px;background-color:#F0EBE3;" id="DesigName" name="DesigName" value="<?php echo $resDe['DesigName']; ?>" readonly />
		<input type="hidden" name="DesigId" value="<?php echo $res['DesigId']; ?>" readonly /></td>
	   </tr>
	   <tr>
	    <td class="font" style="width:100px;">&nbsp;DOJ:</td>
		<td style="width:350px;background-color:#F0EBE3;" align="">
		<input class="font1" style="width:100px;background-color:#F0EBE3;" id="DOJValue" name="DOJValue" value="<?php echo date("d-m-Y", strtotime($res['DateJoining'])); ?>" readonly /></td>
		<td class="font" style="width:200px;">&nbsp;Date Of Confirmation:</td>
		<td style="width:350px;background-color:#F0EBE3;" align="">
		<input class="font1" style="width:100px;background-color:#F0EBE3;" id="DOCValue" name="DOCValue" value="<?php if($rowL>0){echo date("d-m-Y", strtotime($resL['ConfDate'])); }else{echo date("d-m-Y");} //$ConfDate; ?>" readonly /><button id="f_btn1" class="CalenderButton" disabled></button>
   <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
   cal.manageFields("f_btn1", "DOCValue", "%d-%m-%Y");</script></td>
	   </tr>
	  </table>
     </td>
  </tr>
  <tr>
   <td>
    <table border="0">
	 <tr><td style="width:5px;">&nbsp;</td><td class="font" style="width:995px;">GUIDLINES</td></tr>
	 <tr><td style="width:5px;">&nbsp;</td><td class="font1" style="width:995px;">1. The objective of this appraisal is to evaluate the suitablility of an employee for confirmation in employment.</td></tr>
	 <tr><td style="width:5px;">&nbsp;</td><td class="font1" style="width:995px;">2. This appraisal form is to be filled in by the employee's immediate superior and the same shall be reviewed by the Departmental Head.</td></tr>
	 <tr><td colspan="2">&nbsp;</td></tr>
	 <tr><td colspan="2" class="font1" style="width:995px;">Following are the Organizational, Job and Personality factors applicable to employee. Each factor is clearly defined and rated on a scale of A, B, C and D as detailed below:
	 
	 <!--The defination and the rating scale for A, B, C, D for each factor is clearly detailed below:--></td></tr>
	</table>
   </td>
  </tr> 
  <tr><td align="center" style="font-family:Times New Roman;font-size:15px;width:1000px;">
      <table border="1">
	   <tr><td colspan="4" class="font" style="width:100px;color:#004A95;" bgcolor="">&nbsp;<font color="#000000">1. COMMUNICATION:</font> Clarity of thought and expression; skills and desire of sharing relevant information with all concerned (upward, lateral, downward).</td></tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">A</td>
		<td class="font1" id="TdA1" style="width:470px;color:<?php if($resL['Communi']=='A'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="CO" id="A1" value="A" <?php if($resL['Communi']=='A'){echo 'checked';} ?> onClick="CO(this.value)" disabled/>&nbsp;Excellent clarity of thought and expression; Uses all channels and shares relevant information.</td>
		<td class="font" style="width:30px;" align="center" valign="top">B</td>
		<td class="font1" id="TdB1" style="width:470px;color:<?php if($resL['Communi']=='B'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="CO" id="B1" value="B" <?php if($resL['Communi']=='B'){echo 'checked';} ?> onClick="CO(this.value)" disabled/>&nbsp;Good in expression, shares information with all concerned.</td>
	   </tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">C</td>
		<td class="font1" id="TdC1" style="width:470px;color:<?php if($resL['Communi']=='C'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="CO" id="C1" value="C" <?php if($resL['Communi']=='C'){echo 'checked';} ?> onClick="CO(this.value)" disabled/>&nbsp;Has the desire to share information but lacks the skills to do so.</td>
		<td class="font" style="width:30px;" align="center" valign="top">D</td>
		<td class="font1" id="TdD1" style="width:470px;color:<?php if($resL['Communi']=='D'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="CO" id="D1" value="D" <?php if($resL['Communi']=='D'){echo 'checked';} ?> onClick="CO(this.value)" disabled/>&nbsp;Keep things to himself. Lacks the desire and skills to share information.</td>
	   </tr>
	   <tr><td colspan="4" class="font" style="width:100px;color:#004A95;" bgcolor="">&nbsp;<font color="#000000">2. JOB KNOWLEDGE:</font> Knowledge needed to perform the job (s); ability to grasp concepts and issues; assimilation of varied information.</td></tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">A</td>
		<td class="font1" id="TdA2" style="width:470px;color:<?php if($resL['JobKnowl']=='A'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="JK" id="A2" value="A" <?php if($resL['JobKnowl']=='A'){echo 'checked';} ?> onClick="JK(this.value)" disabled/>&nbsp;Has thorough knowledge of primary and related jobs; quick in assimilation of varied information, concepts and issues.</td>
		<td class="font" style="width:30px;" align="center" valign="top">B</td>
		<td class="font1" id="TdB2" style="width:470px;color:<?php if($resL['JobKnowl']=='B'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="JK" id="B2" value="B" <?php if($resL['JobKnowl']=='B'){echo 'checked';} ?> onClick="JK(this.value)" disabled/>&nbsp;Has knowledge of various aspects of the jobs, good in assimilation of concepts, issues.</td>
	   </tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">C</td>
		<td class="font1" id="TdC2" style="width:470px;color:<?php if($resL['JobKnowl']=='C'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="JK" id="C2" value="C" <?php if($resL['JobKnowl']=='C'){echo 'checked';} ?> onClick="JK(this.value)" disabled/>&nbsp;Fair knowledge of the job but requires more training and experience, fair assimilation of information.</td>
		<td class="font" style="width:30px;" align="center" valign="top">D</td>
		<td class="font1" id="TdD2" style="width:470px;color:<?php if($resL['JobKnowl']=='D'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="JK" id="D2" value="D" <?php if($resL['JobKnowl']=='D'){echo 'checked';} ?> onClick="JK(this.value)" disabled/>&nbsp;Needs frequent instructions; poor ability to grasp concepts and issues.</td>
	   </tr>
	   <tr><td colspan="4" class="font" style="width:100px;color:#004A95;" bgcolor="">&nbsp;<font color="#000000">3. OUTPUT:</font> Quantity of work based on recognized standards, consistency & regularity of work; Result orientation.</td></tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">A</td>
		<td class="font1" id="TdA3" style="width:470px;color:<?php if($resL['OutPut']=='A'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="OP" id="A3" value="A" <?php if($resL['OutPut']=='A'){echo 'checked';} ?> onClick="OP(this.value)" disabled/>&nbsp;Exceptionally high output, consistent, regular and highly result oriented.</td>
		<td class="font" style="width:30px;" align="center" valign="top">B</td>
		<td class="font1" id="TdB3" style="width:470px;color:<?php if($resL['OutPut']=='B'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="OP" id="B3" value="B" <?php if($resL['OutPut']=='B'){echo 'checked';} ?> onClick="OP(this.value)" disabled/>&nbsp;Always gives good high output. Consistently result oriented.</td>
	   </tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">C</td>
		<td class="font1" id="TdC3" style="width:470px;color:<?php if($resL['OutPut']=='C'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="OP" id="C3" value="C" <?php if($resL['OutPut']=='C'){echo 'checked';} ?> onClick="OP(this.value)" disabled/>&nbsp;Regularly meets recognized standards of output. Mostly consistent producer.</td>
		<td class="font" style="width:30px;" align="center" valign="top">D</td>
		<td class="font1" id="TdD3" style="width:470px;color:<?php if($resL['OutPut']=='D'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="OP" id="D3" value="D" <?php if($resL['OutPut']=='D'){echo 'checked';} ?> onClick="OP(this.value)" disabled/>&nbsp;Generally low output. Below recognized standards. Inconsistent. Not regular.</td>
	   </tr>
	   <tr><td colspan="4" class="font" style="width:100px;color:#004A95;" bgcolor="">&nbsp;<font color="#000000">4. INITIATIVE:</font> Takes the first step. Proactive. Creates and is alert to opportunities.</td></tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">A</td>
		<td class="font1" id="TdA4" style="width:470px;color:<?php if($resL['Initiative']=='A'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="INI" id="A4" value="A" <?php if($resL['Initiative']=='A'){echo 'checked';} ?> onClick="INI(this.value)" disabled/>&nbsp;Always takes the first step. Is proactive and creates opportunities.</td>
		<td class="font" style="width:30px;" align="center" valign="top">B</td>
		<td class="font1" id="TdB4" style="width:470px;color:<?php if($resL['Initiative']=='B'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="INI" id="B4" value="B" <?php if($resL['Initiative']=='B'){echo 'checked';} ?> onClick="INI(this.value)" disabled/>&nbsp;Alert to opportunities. Takes the first step most of the times.</td>
	   </tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">C</td>
		<td class="font1" id="TdC4" style="width:470px;color:<?php if($resL['Initiative']=='C'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="INI" id="C4" value="C" <?php if($resL['Initiative']=='C'){echo 'checked';} ?> onClick="INI(this.value)" disabled/>&nbsp;Works on his own. Takes the first step when confident.</td>
		<td class="font" style="width:30px;" align="center" valign="top">D</td>
		<td class="font1" id="TdD4" style="width:470px;color:<?php if($resL['Initiative']=='D'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="INI" id="D4" value="D" <?php if($resL['Initiative']=='D'){echo 'checked';} ?> onClick="INI(this.value)" disabled/>&nbsp;Does not look for opportunities. Routine worker. Needs goading/persuasion.</td>
	   </tr>
	   <tr><td colspan="4" class="font" style="width:100px;color:#004A95;" bgcolor="">&nbsp;<font color="#000000">5. INTERPERSONAL SKILLS:</font> Degree of co-operation with team members; Ability to interact effectively with superiors, peers and subordinates.</td></tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">A</td>
		<td class="font1" id="TdA5" style="width:470px;color:<?php if($resL['InterSkill']=='A'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="IS" id="A5" value="A" <?php if($resL['InterSkill']=='A'){echo 'checked';} ?> onClick="IS(this.value)" disabled/>&nbsp;Very effective team member, Co-operative; Respected and liked by superiors, peers and subordinates. High interactive ability at all levels.</td>
		<td class="font" style="width:30px;" align="center" valign="top">B</td>
		<td class="font1" id="TdB5" style="width:470px;color:<?php if($resL['InterSkill']=='B'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="IS" id="B5" value="B" <?php if($resL['InterSkill']=='B'){echo 'checked';} ?> onClick="IS(this.value)" disabled/>&nbsp;Co-operative ; Respected. Has good relations with subordinate, peers and superiors.</td>
	   </tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">C</td>
		<td class="font1" id="TdC5" style="width:470px;color:<?php if($resL['InterSkill']=='C'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="IS" id="C5" value="C" <?php if($resL['InterSkill']=='C'){echo 'checked';} ?> onClick="IS(this.value)" disabled/>&nbsp;Generally accepted as a team member. Occasionally abrasive in dealing with superior, peer and subordinate. </td>
		<td class="font" style="width:30px;" align="center" valign="top">D</td>
		<td class="font1" id="TdD5" style="width:470px;color:<?php if($resL['InterSkill']=='D'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="IS" id="D5" value="D" <?php if($resL['InterSkill']=='D'){echo 'checked';} ?> onClick="IS(this.value)" disabled/>&nbsp;A loner, has difficulty in a group/team.</td>
	   </tr>
	   <tr><td colspan="4" class="font" style="width:100px;color:#004A95;" bgcolor="">&nbsp;<font color="#000000">6. PROBLEM SOLVING:</font> Ability to go to the core of the problem. Makes a correct diagnosis with relevant., information</td></tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">A</td>
		<td class="font1" id="TdA6" style="width:470px;color:<?php if($resL['ProblemSolve']=='A'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="PS" id="A6" value="A" <?php if($resL['ProblemSolve']=='A'){echo 'checked';} ?> onClick="PS(this.value)" disabled/>&nbsp;Quickly goes to the core of the problem and makes a correct diagnosis, with relevant available data in all situations.</td>
		<td class="font" style="width:30px;" align="center" valign="top">B</td>
		<td class="font1" id="TdB6" style="width:470px;color:<?php if($resL['ProblemSolve']=='B'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="PS" id="B6" value="B" <?php if($resL['ProblemSolve']=='B'){echo 'checked';} ?> onClick="PS(this.value)" disabled/>&nbsp;In most situations, goes to the core of the problem and makes a correct diagnosis available with limited data. </td>
	   </tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">C</td>
		<td class="font1" id="TdC6" style="width:470px;color:<?php if($resL['ProblemSolve']=='C'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="PS" id="C6" value="C" <?php if($resL['ProblemSolve']=='C'){echo 'checked';} ?> onClick="PS(this.value)" disabled/>&nbsp;Has the ability to solve problems of a routine nature. Requires assistance in solving problem. </td>
		<td class="font" style="width:30px;" align="center" valign="top">D</td>
		<td class="font1" id="TdD6" style="width:470px;color:<?php if($resL['ProblemSolve']=='D'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="PS" id="D6" value="D" <?php if($resL['ProblemSolve']=='D'){echo 'checked';} ?> onClick="PS(this.value)" disabled/>&nbsp;Requires help to diagnose even problems of a routine nature.</td>
	   </tr>
	   <tr><td colspan="4" class="font" style="width:100px;color:#004A95;" bgcolor="">&nbsp;<font color="#000000">7. ATTITUDE TOWARDS ORGANIZATION/WORK/AUTHORITY:</font> Attitudinal pre-disposition. Approach to work; sensitivity and temperament. </td></tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">A</td>
		<td class="font1" id="TdA7" style="width:470px;color:<?php if($resL['Attitude']=='A'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="AT" id="A7" value="A" <?php if($resL['Attitude']=='A'){echo 'checked';} ?> onClick="AT(this.value)" disabled/>&nbsp;Always positive in outlook towards organization/work/authority. Respects authority.</td>
		<td class="font" style="width:30px;" align="center" valign="top">B</td>
		<td class="font1" id="TdB7" style="width:470px;color:<?php if($resL['Attitude']=='B'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="AT" id="B7" value="B" <?php if($resL['Attitude']=='B'){echo 'checked';} ?> onClick="AT(this.value)" disabled/>&nbsp;Mostly positive in outlook towards organization/work/authority.  </td>
	   </tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">C</td>
		<td class="font1" id="TdC7" style="width:470px;color:<?php if($resL['Attitude']=='C'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="AT" id="C7" value="C" <?php if($resL['Attitude']=='C'){echo 'checked';} ?> onClick="AT(this.value)" disabled/>&nbsp;Generally positive in outlook towards work/subordinates. </td>
		<td class="font" style="width:30px;" align="center" valign="top">D</td>
		<td class="font1" id="TdD7" style="width:470px;color:<?php if($resL['Attitude']=='D'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="AT" id="D7" value="D" <?php if($resL['Attitude']=='D'){echo 'checked';} ?> onClick="AT(this.value)" disabled/>&nbsp;Does not have a positive outlook/ approach  to organization/work. Indifferent to authority.</td>
	   </tr>
	    <tr><td colspan="4" class="font" style="width:100px;color:#004A95;" bgcolor="">&nbsp;<font color="#000000">8. ATTENDANCE & PUNCTUALITY REGULARITY OF ATTENDANCE:</font> Punctuality related to work place and work/ assigned tasks.  </td></tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">A</td>
		<td class="font1" id="TdA8" style="width:470px;color:<?php if($resL['Attendance']=='A'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="ATT" id="A8" value="A" <?php if($resL['Attendance']=='A'){echo 'checked';} ?> onClick="ATT(this.value)" disabled/>&nbsp;Highly regular in attendance and punctuality. Highly work/ assignment oriented. </td>
		<td class="font" style="width:30px;" align="center" valign="top">B</td>
		<td class="font1" id="TdB8" style="width:470px;color:<?php if($resL['Attendance']=='B'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="ATT" id="B8" value="B" <?php if($resL['Attendance']=='B'){echo 'checked';} ?> onClick="ATT(this.value)" disabled/>&nbsp;Mostly regular in attendance. Reports on time and conscientious of assignments.  </td>
	   </tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">C</td>
		<td class="font1" id="TdC8" style="width:470px;color:<?php if($resL['Attendance']=='C'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="ATT" id="C8" value="C" <?php if($resL['Attendance']=='C'){echo 'checked';} ?> onClick="ATT(this.value)" disabled/>&nbsp;Generally regular in attendance and quite punctual in meeting work norms. </td>
		<td class="font" style="width:30px;" align="center" valign="top">D</td>
		<td class="font1" id="TdD8" style="width:470px;color:<?php if($resL['Attendance']=='D'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="ATT" id="D8" value="D" <?php if($resL['Attendance']=='D'){echo 'checked';} ?> onClick="ATT(this.value)" disabled/>&nbsp;Poor attendance and punctuality. Casual attitude to work.</td>
	   </tr>
	  </table>
     </td>
  </tr>
   <tr>
   <td>
    <table border="0">
	 <tr><td colspan="2" style="height:10px;"></td></tr>
	 <tr><td class="font" style="width:200px;">&nbsp;Employee's Strength:</td>
	     <td style="width:800px;background-color:#F0EBE3;" align="center">
		 <input class="font1" style="width:795px;background-color:#F0EBE3;" maxlength="250" id="VEmpStrenght" name="ES" value="<?php echo $resL['EmpStrenght']; ?>" readonly/></td>
	 </tr>
	 <tr><td class="font" style="width:200px;">&nbsp;Areas of Improvement:</td>
	     <td style="width:800px;background-color:#F0EBE3;" align="center">
		 <input class="font1" style="width:795px;background-color:#F0EBE3;" maxlength="250" id="VAreaImprove" name="AI" value="<?php echo $resL['AreaImprovement']; ?>" readonly/></td>
	 </tr>
	 <tr><td colspan="2" style="height:10px;"></td></tr>
	</table>
   </td>
  </tr>
  <tr>
   <td>
    <table border="0">
	 <tr><td colspan="2" style="height:10px;"></td></tr>
	 <tr><td class="font" style="width:995px;">&nbsp;OVERALL RATING</td></tr>
	 <tr>
	  <td>
	   <table border="0">
	     <tr>
		 <td style="width:30px;"></td>
	     <td class="font1" style="width:110px;color:<?php if($resL['Rating']==1){echo '#FF3300';} ?>;"><b>1</b>&nbsp;Unsatisfactory</td>
		 <td align="center" style="width:45px;" id="TdR1"><input type="radio" name="RAT" id="R1" value="1" <?php if($resL['Rating']==1){echo 'checked';} ?> onClick="RAT(this.value)" disabled/></td>
		 <td style="width:40px;" rowspan="2"></td>
		 <td class="font1" style="width:140px;color:<?php if($resL['Rating']==2){echo '#FF3300';} ?>;"><b>2</b>&nbsp;Needs Improvement</td>
		 <td align="center" style="width:45px;" id="TdR2"><input type="radio" name="RAT" id="R2" value="2" <?php if($resL['Rating']==2){echo 'checked';} ?> onClick="RAT(this.value)" disabled/></td>
		 <td style="width:40px;" rowspan="2"></td>
		 <td class="font1" style="width:80px;color:<?php if($resL['Rating']==2.5){echo '#FF3300';} ?>;"><b>2.5</b>&nbsp;Satisfactory</td>
		 <td align="center" style="width:45px;" id="TdR3"><input type="radio" name="RAT" id="R3" value="2.5" <?php if($resL['Rating']==2.5){echo 'checked';} ?> onClick="RAT(this.value)" disabled/></td>
		 <td style="width:40px;" rowspan="2"></td>
		 <td class="font1" style="width:70px;color:<?php if($resL['Rating']==3){echo '#FF3300';} ?>;"><b>3</b>&nbsp;Competent</td>
		 <td align="center" style="width:45px;" id="TdR4"><input type="radio" name="RAT" id="R4" value="3" <?php if($resL['Rating']==3){echo 'checked';} ?> onClick="RAT(this.value)" disabled/></td>
		 <td style="width:240px;"></td>
	 </tr>
	 <tr>
	     <td style="width:30px;"></td>
	     <td class="font1" style="width:110px;color:<?php if($resL['Rating']==3.5){echo '#FF3300';} ?>;"><b>3.5</b>&nbsp;Commendable</td>
		 <td align="center" style="width:45px;" id="TdR5"><input type="radio" name="RAT" id="R5" value="3.5" <?php if($resL['Rating']==3.5){echo 'checked';} ?> onClick="RAT(this.value)" disabled/></td>
		 <td class="font1" style="width:140px;color:<?php if($resL['Rating']==4){echo '#FF3300';} ?>;"><b>4</b>&nbsp;Extraordinary</td>
		 <td align="center" style="width:45px;" id="TdR6"><input type="radio" name="RAT" id="R6" value="4" <?php if($resL['Rating']==4){echo 'checked';} ?> onClick="RAT(this.value)" disabled/></td>
		 <td class="font1" style="width:80px;color:<?php if($resL['Rating']==4.5){echo '#FF3300';} ?>;"><b>4.5</b>&nbsp;Outstanding</td>
		 <td align="center" style="width:45px;" id="TdR7"><input type="radio" name="RAT" id="R7" value="4.5" <?php if($resL['Rating']==4.5){echo 'checked';} ?> onClick="RAT(this.value)" disabled/></td>
		 <td class="font1" style="width:70px;color:<?php if($resL['Rating']==5){echo '#FF3300';} ?>;"><b>5</b>&nbsp;Exemplary</td>
		 <td align="center" style="width:45px;" id="TdR8"><input type="radio" name="RAT" id="R8" value="5" <?php if($resL['Rating']==5){echo 'checked';} ?> onClick="RAT(this.value)" disabled/></td>
		 <td style="width:240px;"></td>
	 </tr>
	   </table>
	  </td>
	 </tr> 
	 <tr><td colspan="2" style="height:10px;"></td></tr>
	</table>
   </td>
  </tr>
  <tr>
   <td>
    <table border="0">
	<tr><td colspan="2" style="height:10px;"></td></tr>
	 <tr>
		 <td class="font" style="width:200px;">&nbsp;RECOMMENDATIONS:</td>
	     <td class="font1" style="width:150px;color:<?php if($resL['Recommendation']==1){echo '#FF3300';} ?>;">&nbsp;Confirmed on due date  </td>
		 <td align="center" style="width:45px;" id="TdRec1">
		 <input type="radio" name="REC" id="Rec1" value="1" <?php if($resL['Recommendation']==1){echo 'checked';} elseif(($_REQUEST['d']==6 OR $_REQUEST['d']==19 OR $_REQUEST['d']==4 OR $_REQUEST['d']==21 OR $_REQUEST['d']==2) AND ($res['DesigId']==71 OR $res['DesigId']==174 OR $res['DesigId']==169 OR $res['DesigId']==139)){echo 'checked';} ?> onClick="ToREC(this.value)"/></td>
		 <td style="width:40px;" rowspan="2"></td>
		 <td class="font1" style="width:120px;color:<?php if($resL['Recommendation']==2){echo '#FF3300';} ?>;">&nbsp;Extend Probation</td>
		 <td align="center" style="width:45px;" id="TdRec2">
		 <input type="radio" name="REC" id="Rec2" value="2" <?php if($resL['Recommendation']==2){echo 'checked';} ?> onClick="ToREC(this.value)" <?php if(($_REQUEST['d']==6 OR $_REQUEST['d']==19 OR $_REQUEST['d']==4 OR $_REQUEST['d']==21 OR $_REQUEST['d']==2) AND ($res['DesigId']==71 OR $res['DesigId']==174 OR $res['DesigId']==169 OR $res['DesigId']==139)) echo 'disabled'; ?> /></td>
		 <td style="width:400px;"></td>
	 </tr>
	 <tr><td colspan="2" style="height:10px;"></td></tr> 
	</table>
   </td>
  </tr>
   <tr>
   <td>
    <table border="0">
	 <tr><td colspan="2" style="height:10px;"></td></tr>
	 <tr><td class="font" style="width:950px;">&nbsp;If probation to be extended, mention reason:</td></tr>
	 <tr><td style="width:995px;" align="">
		 <input class="font1" style="width:995px;background-color:#F0EBE3;" maxlength="450" id="ReasonExt" name="REA" value="<?php echo $resL['Reason']; ?>" readonly /></td>
	 </tr>
	 <tr><td colspan="2" style="height:10px;"></td></tr>
	 <tr><td colspan="6" class="font" style="width:950px;">&nbsp;HR Remark:</td></tr>
	 <tr><td colspan="6" style="width:995px;" align="">
		 <input class="font1" style="width:995px;" maxlength="450" id="HRRemark" name="HRRemark" value="<?php echo $resL['HrRemark']; ?>" disabled required/></td>
	 </tr>
	 <tr>
   <td>
    <table border="0">
	<tr>
	<input type="hidden" name="OldGrade" value="<?=$res['GradeId']?>" />
	<input type="hidden" name="OldDesig" value="<?=$res['DesigId']?>" />
	
	<?php
	/*if($resL['Current_GradeId']>0){$gr2=mysql_query("select grade_name as GradeValue from core_grades where id=".$resL['Current_GradeId'],$con); $rgr2=mysql_fetch_assoc($gr2); $GradeName=$rgr2['GradeValue']; }
	else{ $GradeName=$resG['GradeValue']; }*/
	$GradeName=$resG['GradeValue'];
	
	/*if($resL['Current_DesigId']>0){$De2=mysql_query("select designation_name as DesigName from core_designation where id=".$resL['Current_DesigId'],$con); $rDe2=mysql_fetch_assoc($De2); $DesigName=$rDe2['DesigName']; }
	else{ $DesigName=$resDe['DesigName']; }*/
	$DesigName=$resDe['DesigName'];
	?>
	
	     <td class="font" style="width:120px;">&nbsp;Grade:</td>
	     <td class="font" style="width:80px;" align="Right">&nbsp;Current:-</td>
		 <td class="font" style="width:200px;"><input style="width:50px;background-color:#F0EBE3;" id="GraId" value="<?php echo $GradeName; ?>" readonly/></td>
		 <td class="font" style="width:80px;" align="Right">&nbsp;Proposed:-</td>
		 <td class="font" style="width:200px;" align="">
<?php $sqlG = mysql_query("SELECT grade_name as GradeValue FROM core_grades WHERE id=".$res['GradeId'], $con); 
      $resG = mysql_fetch_assoc($sqlG); 
      
	  if($resG['GradeValue']!='MG'){ $NextGradeId=$res['GradeId']+1; 
	  $sqlG2 = mysql_query("SELECT grade_name as GradeValue FROM core_grades WHERE id=".$NextGradeId, $con); 
	  $resG2 = mysql_fetch_assoc($sqlG2); 
	  $NextGrade=$resG2['GradeValue']; }
	  elseif($resG['GradeValue']=='MG'){$NextGrade=$resG['GradeValue'];}
?> 		 
<select style="width:50px;" id="NewGrade" name="NewGrade" disabled>
<?php if($rowL>0){
 $sqlGG = mysql_query("SELECT grade_name as GradeValue FROM core_grades WHERE id=".$resL['GradeId'], $con); 
 $resGG = mysql_fetch_assoc($sqlGG); ?>
<option style="background-color:#FFFFFF;" value="<?php echo $resL['GradeId']; ?>"><?php echo $resGG['GradeValue']; ?></option>
<?php } ?>
<option style="background-color:#FFFFFF;" value="<?php echo $res['GradeId']; ?>"><?php echo $resG['GradeValue']; ?></option> 
<option style="background-color:#FFFFFF;" value="<?php echo $NextGradeId; ?>"><?php echo $NextGrade; ?></option>
</select>		 
</td>
		 <td class="font" style="width:150px;" align="center"></td>
	 </tr>
	 <tr>
	     <td class="font" style="width:120px;">&nbsp;Designation:</td>
	     <td class="font" style="width:80px;" align="Right">&nbsp;Current:-</td>
		 <td class="font" style="width:200px;" align=""><input style="width:200px;background-color:#F0EBE3;" id="DesId" value="<?php echo $DesigName; ?>" readonly />
		 </td>
		 <td class="font" style="width:80px;" align="Right">&nbsp;Proposed:-</td>
		 <td class="font" style="width:200px;" align="">	 
		 <span id="SpanDesig"><select style="width:200px;" id="NewDesig" name="NewDesig" disabled>
<?php if($rowL>0){
$sqlDD = mysql_query("select designation_name as DesigName from core_designation where id=".$resL['DesigId'], $con); $resDD = mysql_fetch_assoc($sqlDD); ?>
<option style="background-color:#FFFFFF;" value="<?php echo $resL['DesigId']; ?>"><?php echo strtoupper($resDD['DesigName']); ?></option>
<?php } if($rowL==0) { ?>
<option style="background-color:#FFFFFF;" value="<?php echo $res['DesigId']; ?>"><?php echo strtoupper($resDe['DesigName']); ?></option>
<?php } ?>
<?php $sqlEx=mysql_query("select hrm_deptgradedesig.DesigId,designation_name as DesigName from hrm_deptgradedesig left JOIN core_designation ON hrm_deptgradedesig.DesigId=core_designation.id where DepartmentId=".$res['DepartmentId']." AND (GradeId=".$NextGradeId." OR GradeId_2=".$NextGradeId." OR GradeId_3=".$NextGradeId." OR GradeId_4=".$NextGradeId." OR GradeId_5=".$NextGradeId." OR GradeId=".$res['GradeId']." OR GradeId_2=".$res['GradeId']." OR GradeId_3=".$res['GradeId']." OR GradeId_4=".$res['GradeId']." OR GradeId_5=".$res['GradeId'].") order by designation_name ASC", $con); while($resEx=mysql_fetch_assoc($sqlEx)){ ?>
<option style="background-color:#FFFFFF;" value="<?php echo $resEx['DesigId']; ?>"><?php echo strtoupper($resEx['DesigName']); ?></option>
<?php } ?>
</select>		 
</td>
		 <td class="font" style="width:150px;" align="center"></td>
	 </tr>
	 <tr><td colspan="2" style="height:10px;"></td></tr> 
	</table>
   </td>
  </tr>
  <tr>
   <td>
    <table border="0">
	 <tr><td colspan="3" class="font" style="width:950px;">&nbsp;Signature:</td></tr>
	 <tr><td colspan="3" style="height:50px;"></td></tr>
	 <tr><td class="font1" style="width:330px;" align="center" valign="bottom">-------------------------</td>
	     <td class="font1" style="width:330px;" align="center" valign="bottom">-------------------------</td>
		 <td class="font1" style="width:330px;" align="center" valign="bottom">-------------------------</td>
	 </tr>
	 <tr><td class="font1" style="width:330px;" align="center" valign="bottom">
	     <input class="font1" id="RSpan" style="width:345px;background-color:#FFFFFF;font-weight:bold;border-style:hidden;text-align:center;" readonly /></td>
	     <td class="font1" style="width:330px;" align="center" valign="bottom">
		 <input class="font1" id="HODSpan" style="width:345px; background-color:#FFFFFF;font-weight:bold;border-style:hidden;text-align:center;" readonly /></td>
		 <td class="font1" style="width:330px;" align="center" valign="bottom">
		 <input class="font1" id="HRSpan" style="width:345px; background-color:#FFFFFF;font-weight:bold;border-style:hidden;text-align:center;" readonly /></td>
	 </tr>
	 <tr><td class="font1" style="width:330px;" align="center" valign="top">(Appraiser)</td>
	     <td class="font1" style="width:330px;" align="center" valign="top">(HOD)</td>
		 <td class="font1" style="width:330px;" align="center" valign="top">(HR)</td>
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
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="1000">
		<tr><td class="font" id="Tdlet" style="width:500px; display:none;" align="center">&nbsp;</td>
		    <td class="font" id="Tdletter" style="width:500px; display:block;" align="center">
		     <a href="#" onClick="LetterClick()" style="text-decoration:underline;"><font color="#FFFFFF">Confirmation Letter</font></a>&nbsp;&nbsp;&nbsp;&nbsp;
			 <a href="#" onClick="TrainyLetterClick()" style="text-decoration:underline;"><font color="#FFFFFF">Trainee Letter</font></a>&nbsp;&nbsp;&nbsp;&nbsp;
			 <a href="#" onClick="ExtLetterClick()" style="text-decoration:none;"><font color="#FFFFFF"><u>Extent Letter</u></font></a>
			</td>
		    <td align="center" class="font" style="width:260px;color:#FFFFFF; font-size:15px;"><i><span id="SpanCofLeSpan"></span></i></td>
			<?php //if($rowL==0 OR $resL['SubmitStatus']=='N' OR $res['ConfirmHR']=='YY') { ?>
			<td align="center" style="width:80px;"><input type="submit" name="FormSubmit" value="submit" id="btnSubmit" onClick="Tosubmit()" style="width:80px;display:<?php if($rowL>0){echo 'block'; } else {echo 'none'; } ?>;" disabled/></td>
			<td align="center" style="width:80px;"><input type="button" name="Edit" value="edit" id="btnEdit" onClick="edit(<?php echo $id; ?>)" style="width:80px;"/>
			
			<input type="submit" name="FormSave" value="save" id="btnSave" onClick="Tosave()" style="width:80px;display:none;" <?php if($resL['HrRemark']!=''){echo 'disabled'; } else {echo ''; } ?>/>
			</td>
			<?php //} ?>
			<td align="center" style="width:80px;"><input type="button" name="Refresh" value="refresh" onClick="javascript:window.location='EmpConfFormok.php?e=<?php echo $id; ?>&c=<?php echo $_REQUEST['c']; ?>&cd=<?php echo $_REQUEST['cd']; ?>&d=<?php echo $_REQUEST['d']; ?>&v=<?php echo $_REQUEST['v']; ?>'" style="width:80px;display:block;"/></td>
		</tr></table>
      </td>
    </tr>
  
</table>
	 </td>
	</tr>
  </table>
 </td>
  </tr>
   </form>
  </table>  
	  </td>
	 </tr>	
</form>
</table>

			
<?php //*************************************************************************************************************************************************** ?>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;">
		    <tr><td align="center" valign="top" width="100">&nbsp;</td></tr>
	        </table>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;"><tr><td align="center" valign="top">&nbsp;&nbsp;</td></tr></table>
		   </td>
		  </tr>
		</table>
	  </td>
	</tr>
	
	<tr><td valign="top" align="center">&nbsp;</td></tr>
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

