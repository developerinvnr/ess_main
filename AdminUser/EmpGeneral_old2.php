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
{ $sql = mysql_query("select hrm_employee.*,hrm_employee_general.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmployeeID=".$EMPID, $con); $res=mysql_fetch_assoc($sql);
   if($sql)
   {  $sqlIns=mysql_query("Insert into hrm_employee_event(EmployeeID,EmpCode,EmpPass,EmpType,EmpStatus,Fname,Sname,Lname,CompanyId,CreatedBy,CreatedDate,YearId)values(".$res['EmployeeID'].", ".$res['EmpCode'].",'".$res['EmpPass']."','".$res['EmpType']."','".$res['EmpStatus']."','".$res['Fname']."','".$res['Sname']."','".$res['Lname']."',".$res['CompanyId'].",".$res['CreatedBy'].",'".$res['CreatedDate']."',".$res['YearId'].")", $con);

    
     $sqlIns1=mysql_query("Insert into hrm_employee_general_event(GeneralId,EmployeeID,FileNo,DateJoining,DateConfirmationYN,DateConfirmation,DOB,DOB_dm,GradeId,CostCenter,HqId,DepartmentId,DesigId,DesigId2,MobileNo_Vnr,EmailId_Vnr,BankName,AccountNo,BranchName,BranchAdd,BankName2,AccountNo2,BranchName2,BranchAdd2,InsuCardNo,PfAccountNo,PF_UAN,EsicAllow,EsicNo,ReportingName,ReportingDesigId,ReportingEmailId,ReportingContactNo,CreatedBy,CreatedDate,YearId)values(".$res['GeneralId'].",".$res['EmployeeID'].",".$res['FileNo'].",'".$res['DateJoining']."','".$res['DateConfirmationYN']."','".$res['DateConfirmation']."','".$res['DOB']."','".$res['DOB_dm']."',".$res['GradeId'].",'".$res['CostCenter']."',".$res['HqId'].",".$res['DepartmentId'].",".$res['DesigId'].",".$res['DesigId2'].",".$res['MobileNo_Vnr'].",'".$res['EmailId_Vnr']."','".$res['BankName']."',".$res['AccountNo'].",'".$res['BranchName']."','".$res['BranchAdd']."','".$res['BankName2']."',".$res['AccountNo2'].",'".$res['BranchName2']."','".$res['BranchAdd2']."','".$res['InsuCardNo']."','".$res['PfAccountNo']."','".$res['PF_UAN']."','".$res['EsicAllow']."','".$res['EsicNo']."','".$res['ReportingName']."',".$res['ReportingDesigId'].",'".$res['ReportingEmailId']."',".$res['ReportingContactNo'].",".$res['CreatedBy'].",'".$res['CreatedDate']."',".$res['YearId'].")", $con);
  
     if($sqlIns)
     { $Fname=strtoupper($_POST['Fname']);  $Sname=strtoupper($_POST['Sname']);  $Lname=strtoupper($_POST['Lname']); //$pass=encrypt($_POST['EmpPass']);

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
 

	   $SqlUpGen = mysql_query("UPDATE hrm_employee SET EmpStatus='".$_POST['EmpStatus']."',RetiStatus='".$_POST['RetiStatus']."',RetiDate='".$RiteDate."', EsslCode='".$_POST['EsslCode']."', RetiNewCode=".$RetiNCode.",RetiOldCode=".$RetiOldCode.",Fname='".$Fname."',Sname='".$Sname."',Lname='".$Lname."', DateOfResignation='".$Reg."', DateOfSepration='".$Sep."', CreatedBy=".$UserId.",CreatedDate='".date('Y-m-d')."',YearId=".$YearId." WHERE EmployeeID=".$EMPID, $con);
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
       
       $SqlUpGen1 = mysql_query("UPDATE hrm_employee_general SET Hiring_Mode = '".$_POST['hiring_mode']."', FileNo='".$_POST['FileNo']."', DateJoining='".date("Y-m-d",strtotime($_POST['DOJ']))."', DOB='".date("Y-m-d",strtotime($_POST['DOB']))."', DOB_dm='".date("0000-m-d",strtotime($_POST['DOB']))."', GradeId=".$_POST['GradeName'].", CostCenter='".$_POST['CostCenter']."', HqId=".$_POST['HQName'].", DepartmentId=".$_POST['DeptName'].", DesigId=".$_POST['DesigName'].", PositionCode='".$_POST['PositionCode']."', MobileNo_Vnr=".$_POST['OffiMobileNo'].", EmailId_Vnr='".$_POST['OffiEmialId']."', BankName='".$_POST['BankName1']."', AccountNo='".$_POST['AccountNo1']."', BranchName='".$_POST['Branch1']."', BranchAdd='".$_POST['Address1']."', BankName2='".$_POST['BankName2']."', AccountNo2='".$_POST['AccountNo2']."', BranchName2='".$_POST['Branch2']."', BranchAdd2='".$_POST['Address2']."', BankIfscCode='".$_POST['ifsc1']."', BankIfscCode2='".$_POST['ifsc2']."', InsuCardNo='".$_POST['InsCardNo']."', PfAccountNo='".$_POST['PfAccountNo']."', PF_UAN=".$_POST['PF_UAN'].", EsicAllow='".$EsicAllow."', EsicNo='".$_POST['ESICNo']."', AttMobileNo1=".$_POST['OffiMobileNo'].", EmpVertical='".$_POST['EmpVertical']."', BWageId='".$_POST['BWageCategory']."', CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d",strtotime($_POST['DateCTC']))."', apply_Bond='".$_POST['TrfBond']."', Transfer_Dept_Date='".date("Y-m-d",strtotime($_POST['TrfDate']))."', Transfer_Dept_Name='".$_POST['TrfDept']."', Transfer2_Dept_Date='".date("Y-m-d",strtotime($_POST['Trf2Date']))."', Transfer2_Dept_Name='".$_POST['Trf2Dept']."', Bond_Year='".$_POST['BondYear']."', Transfer_location='".$_POST['TrfLoc']."', Transfer2_location='".$_POST['Trf2Loc']."', SysDate='".date('Y-m-d')."', YearId=".$YearId." WHERE EmployeeID=".$EMPID, $con);
       
       

/****************************** History History History History History History *************************/
	   if($SqlUpGen1)
	   { //echo $res['DepartmentId'].'!='.$_POST['DeptName'].' OR '.$res['DesigId'].'!='.$_POST['DesigName'].' OR '.$res['GradeId'].'!='.$_POST['GradeName'];
	     if($res['DepartmentId']!=0 AND $res['DesigId']!=0 AND $res['GradeId']!=0 AND ($res['DepartmentId']!=$_POST['DeptName'] OR $res['DesigId']!=$_POST['DesigName'] OR $res['GradeId']!=$_POST['GradeName'])) 
		 { 
		  /***************************************** History Open **************/ 
		  
          $SqlE = mysql_query("select EmpCode,Fname,Sname,Lname from hrm_employee where EmployeeID=".$EMPID, $con); 
		  $ResE=mysql_fetch_assoc($SqlE); 
		  
		  if($ResE['Sname']==''){ $EnameE=trim($ResE['Fname']).' '.trim($ResE['Lname']); }
else{ $EnameE=trim($ResE['Fname']).' '.trim($ResE['Sname']).' '.trim($ResE['Lname']); }
		  
		  //$EnameE = $ResE['Fname'].' '.$ResE['Sname'].' '.$ResE['Lname']; 
          $sqlEDept = mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_POST['DeptName'],$con);
		  $sqlEDe=mysql_query("select DesigName from hrm_designation where DesigId=".$_POST['DesigName'], $con);
		  $sqlEGr=mysql_query("select GradeValue from hrm_grade where GradeId=".$_POST['GradeName']." AND CompanyId=".$CompanyId, $con);
		  $resEDept=mysql_fetch_assoc($sqlEDept); $resEDe=mysql_fetch_assoc($sqlEDe); $resEGr=mysql_fetch_assoc($sqlEGr);
    
          $sqlHC = mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChD FROM hrm_pms_appraisal_history where EmpCode=".$ResE['EmpCode']." AND CompanyId=".$CompanyId, $con); $resHC = mysql_fetch_assoc($sqlHC); 
		  if($resHC)
		  {
		   $sqlMax = mysql_query("SELECT * FROM hrm_pms_appraisal_history where SalaryChange_Date='".$resHC['SalaryChD']."' AND EmpCode=".$ResE['EmpCode']." AND CompanyId=".$CompanyId, $con); $resMax = mysql_fetch_assoc($sqlMax);
		   $sqlHis = mysql_query("select * from hrm_pms_appraisal_history where EmpCode=".$ResE['EmpCode']." AND SalaryChange_Date='".date('Y-m-d')."' AND CompanyId=".$CompanyId, $con); $rowHis=mysql_num_rows($sqlHis); 
           if($rowHis>0)
           { 
            $sqlUhis=mysql_query("update hrm_pms_appraisal_history set Proposed_Grade='".$resEGr['GradeValue']."', Department='".$resEDept['DepartmentName']."', Proposed_Designation='".$resEDe['DesigName']."' where EmpCode=".$ResE['EmpCode']." AND SalaryChange_Date='".date('Y-m-d')."' AND CompanyId=".$CompanyId, $con); 
           }
           if($rowHis==0)
           { 
            $sqlUhis=mysql_query("insert into hrm_pms_appraisal_history(EmpPmsId, EmpCode, EmpName, Current_Grade, Proposed_Grade, Department, Current_Designation, Proposed_Designation, SalaryChange_Date, SystemDate, Salary_Basic, Salary_HRA, Salary_CA, Salary_SA, Previous_GrossSalaryPM, Current_GrossSalaryPM, Proposed_GrossSalaryPM, BonusAnnual_September, Prop_PeInc_GSPM, PropSalary_Correction, TotalProp_GSPM, TotalProp_PerInc_GSPM, Score, Rating, CompanyId, YearId) values(0, ".$ResE['EmpCode'].", '".$EnameE."', '".$resMax['Current_Grade']."', '".$resEGr['GradeValue']."', '".$resEDept['DepartmentName']."', '".$resMax['Current_Designation']."', '".$resEDe['DesigName']."', '".date("Y-m-d",strtotime($_POST['DateCTC']))."', '".date("Y-m-d")."', '".$resMax['Salary_Basic']."', '".$resMax['Salary_HRA']."', '".$resMax['Salary_CA']."', '".$resMax['Salary_SA']."', '".$resMax['Previous_GrossSalaryPM']."', '".$resMax['Current_GrossSalaryPM']."', '".$resMax['Proposed_GrossSalaryPM']."', '".$resMax['BonusAnnual_September']."', '".$resMax['Prop_PeInc_GSPM']."', '".$resMax['PropSalary_Correction']."', '".$resMax['TotalProp_GSPM']."', 0, 0, 0, ".$CompanyId.", ".$YearId.")", $con);
           }
		  }
		  
          /***************************************** History Close **************/
		 } 
		 
	   }
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
/*
function EsicAllow(value)
{ if(value=='N'){document.getElementById("ESICNo1").style.display = 'block'; document.getElementById("ESICNo2").style.display = 'none';}
else if(value=='Y'){document.getElementById("ESICNo1").style.display = 'none'; document.getElementById("ESICNo2").style.display = 'block';} }
*/

function RefGen()
{ document.getElementById("BankName1").value = ''; document.getElementById("AccountNo1").value = ''; document.getElementById("Branch1").value = ''; document.getElementById("Address1").value = ''; document.getElementById("BankName2").value = ''; document.getElementById("AccountNo2").value = ''; document.getElementById("Branch2").value = ''; document.getElementById("Address2").value = ''; document.getElementById("InsCardNo").value = ''; document.getElementById("PfAccountNo").value = ''; document.getElementById("ESIC_Allow").value = 'N';
document.getElementById("ESICNo1").style.display = 'block'; document.getElementById("ESICNo2").style.display = 'none'; }

function EditGeneral()
{
document.getElementById("EditGeneralE").style.display = 'block'; document.getElementById("ChangeGeneral").style.display = 'none'; document.getElementById("Fname").readOnly = false; document.getElementById("Sname").readOnly = false; document.getElementById("Lname").readOnly = false; document.getElementById("FileNo").readOnly = false; document.getElementById("DOJ").readOnly = false; document.getElementById("DOC").readOnly = false; document.getElementById("DOB").readOnly = false; document.getElementById("DeptName").disabled = false; document.getElementById("DesigName").disabled = false; document.getElementById("GradeName").disabled = false; document.getElementById("HQName").disabled = false; document.getElementById("CostCenter").disabled = false; document.getElementById("OffiMobileNo").readOnly = false; document.getElementById("OffiEmialId").readOnly = false; document.getElementById("BankName1").readOnly = false; document.getElementById("AccountNo1").readOnly = false; document.getElementById("Branch1").readOnly = false; document.getElementById("Address1").readOnly = false; document.getElementById("BankName2").readOnly = false; document.getElementById("AccountNo2").readOnly = false; document.getElementById("Branch2").readOnly = false; document.getElementById("Address2").readOnly = false; document.getElementById("ifsc1").readOnly = false; document.getElementById("ifsc2").readOnly = false;
   document.getElementById("ESICNo").readOnly = false;

document.getElementById("InsCardNo").readOnly = false; document.getElementById("PfAccountNo").readOnly = false;
document.getElementById("PF_UAN").readOnly = false; document.getElementById("ESIC_Allow").disabled = false; document.getElementById("RepName").disabled = false; document.getElementById("f_btn1").disabled = false; document.getElementById("f_btn2").disabled = false; document.getElementById("f_btn3").disabled = false; document.getElementById("EmpStatus").disabled = false; document.getElementById("GradeName").disabled = false; 

document.getElementById("DateCTC").value=document.getElementById("DateHide").value;
document.getElementById("f_btn11").disabled = false;

document.getElementById("RetiStatus").disabled = false;  document.getElementById("f_btnReti").disabled = false; 
document.getElementById("RetiNewCode").readOnly = false;  document.getElementById("RetiOldCode").readOnly = false;
document.getElementById("PositionCode").readOnly = false;


}

function Deact(v){ if(v=='D'){ document.getElementById("Resig").readOnly = false; document.getElementById("Sep").readOnly = false; document.getElementById("Resig_btn").disabled = false; document.getElementById("Sep_btn").disabled = false;}
 if(v=='A'){ document.getElementById("Resig").readOnly = true; document.getElementById("Sep").readOnly = true; document.getElementById("Resig_btn").disabled = true; document.getElementById("Sep_btn").disabled = true;}
}

function PassCheck()
{ if(document.getElementById("EmpPCheck").checked==true)
  { var agree=confirm("Are you sure you want to Change this Employee Password?"); if (agree) { document.getElementById("EmpPass").readOnly = false; }
    else { document.getElementById("EmpPass").readOnly = true; document.getElementById("EmpPCheck").checked=false;}
  } else { document.getElementById("EmpPass").readOnly = true; }  }

</script>
<?php  if($_REQUEST['Event']=='Edit') {?>
<script language="javascript">
function validate(formEgeneral) 
{ var FName = formEgeneral.Fname.value;  var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(FName);
  if (FName.length === 0) { alert("You must enter a First Name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the First Name Field');  return false; } 
  
/*  var SName = formEgeneral.Sname.value;  
  if(SName!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool2 = filter.test(SName);
  if(test_bool2==false) { alert('Please Enter Only Alphabets in the Middle Name Field');  return false; } }
  //else if (SName.length === 0) { alert("You must enter a Middle Name.");  return false; }
  
  var LName = formEgeneral.Lname.value;  var filter=/^[a-zA-Z. /]+$/; var test_bool3 = filter.test(LName);
  if (LName.length === 0) { alert("You must enter a last Name.");  return false; }
  if(test_bool3==false) { alert('Please Enter Only Alphabets in the last name Field');  return false; } 
    
/*  var FileNo = formEgeneral.FileNo.value; 
  if (FileNo!='')  { var Numfilter=/^[0-9 ]+$/;  var test_num = Numfilter.test(FileNo)
  if(test_num==false) { alert('Please Enter Only Number in the file number Field'); return false; }} */
  
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
  
  
  var DeptName = formEgeneral.DeptName.value;  
  if (DeptName==0) { alert("Please select Department name.");  return false; }
  
  var DesigName = formEgeneral.DesigName.value;  
  if (DesigName==0) { alert("Please select Designation name.");  return false; }
  
/*  var CostCenter = formEgeneral.CostCenter.value;  
  if (CostCenter==0) { alert("Please select Cost Center name.");  return false; } */
  
  var HQName = formEgeneral.HQName.value;  
  if (HQName==0) { alert("Please select Head Quater name.");  return false; }
  
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
  
  var BankName2 = formEgeneral.BankName2.value;  
  if(BankName2!=''){  var filter=/^[a-zA-Z. /]+$/; var test_bool4 = filter.test(BankName2);
  if(test_bool4==false) { alert('Please Enter Only Alphabets in the Bank Name_2 Field');  return false; } }
  
  var AccountNo2 = formEgeneral.AccountNo2.value;  
  if(BankName2!='' && AccountNo2.length == 0){ alert('Please Enter Bank_2 Account number ');  return false; } 
  if(AccountNo2!=''){  var Numfilter=/^[0-9 ]+$/;  var test_num4 = Numfilter.test(AccountNo2)
  if(test_num4==false) { alert('Please Enter Only Number in the Account No_2 Field');  return false; } }
  
  var Branch2 = formEgeneral.Branch2.value;  
  //if(BankName2!='' && Branch2.length == 0){ alert('Please Enter Bank_2 branch name');  return false; } 
  
  var Address2 = formEgeneral.Address2.value;  
  //if(BankName2!='' && Address2.length == 0){ alert('Please Enter Bank_2 Address');  return false; } 
  
  var InsCardNo = formEgeneral.InsCardNo.value;  
  //if(InsCardNo!=''){  var Numfilter=/^[0-9 ]+$/;  var test_num5 = Numfilter.test(InsCardNo)
  //if(test_num5==false) { alert('Please Enter Only Number in the Insurance number Field');  return false; } }
  
  var PfAccountNo = formEgeneral.PfAccountNo.value;  
  //if(PfAccountNo!=''){  var Numfilter=/^[0-9 ]+$/;  var test_num5 = Numfilter.test(PfAccountNo)
  //if(test_num5==false) { alert('Please Enter Only Number in the Pf AccountNo number Field');  return false; } }
}

function toUpper(txt)
{ document.getElementById(txt).value=document.getElementById(txt).value.toUpperCase(); return true; }
</script>
<?php } ?>
</head>
<body class="body">
<?php 
$SqlEmp = mysql_query("SELECT hrm_employee.*,hrm_employee_general.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee.EmployeeID=".$EMPID, $con) or die(mysql_error());  $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
      if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
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
<?php  if($_REQUEST['Event']=='Edit') {?>
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
<tr>
  <td class="All_100">First Name :</td><td class="All_125">
  <input name="Fname" id="Fname" value="<?php echo $ResEmp['Fname']; ?>" class="All_120" style="text-transform:uppercase;" readonly></td>
  <td class="All_100">Second Name :</td><td class="All_140">
  <input name="Sname" id="Sname" value="<?php echo $ResEmp['Sname']; ?>" class="All_120" style="text-transform:uppercase;" readonly></td>
  <td class="All_100">Last Name :</td><td class="All_125">
  <input name="Lname" id="Lname" value="<?php echo $ResEmp['Lname']; ?>" class="All_120" style="text-transform:uppercase;" readonly></td>
</tr>
<tr>
  <td class="All_100">FileNo :</td><td class="All_125"><input name="FileNo" id="FileNo" class="All_120" value="<?php echo $ResEmp['FileNo']; ?>" readonly></td>
  <td class="All_100">Joining<font color="#FF0000">*</font> :</td><td class="All_125"><input name="DOJ" id="DOJ" class="All_100" value="<?php if($ResEmp['DateJoining']=='0000-00-00'){ echo '00-00-0000';} else { echo date("d-m-Y",strtotime($ResEmp['DateJoining'])); } ?>" readonly><button id="f_btn1" class="CalenderButton" disabled></button></td>
  <td class="All_100">Confirmation : &nbsp;<font color="#FF0000">*</font></td><td class="All_125"><input name="DOC" id="DOC" class="All_90" value="<?php if($ResEmp['DateConfirmation']=='0000-00-00'){ echo '00-00-0000';} elseif($ResEmp['DateConfirmation']=='1970-01-01'){ echo '00-00-0000';} else { echo date("d-m-Y",strtotime($ResEmp['DateConfirmation'])); }?>" readonly><button id="f_btn2" class="CalenderButton" disabled></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("f_btn2", "DOC", "%d-%m-%Y");  cal.manageFields("f_btn1", "DOJ", "%d-%m-%Y");</script></td>
</tr>
<tr>
  <td class="All_100" valign="top">Date Of Birth :</td><td class="All_125"><input name="DOB" id="DOB" class="All_90" value="<?php echo date("d-m-Y",strtotime($ResEmp['DOB'])); ?>" readonly><button id="f_btn3" class="CalenderButton" disabled></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("f_btn3", "DOB", "%d-%m-%Y");</script></td>
  <td class="All_100" valign="top">Department :&nbsp;<font color="#FF0000">*</font></td><td class="All_125"><select class="All_120" name="DeptName" id="DeptName" onChange="DeptSelect(this.value)" style="text-transform:uppercase;" disabled>
  <?php $SqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$ResEmp['DepartmentId'], $con); $ResD=mysql_fetch_assoc($SqlD);?>
  <option value="<?php echo $ResEmp['DepartmentId']; ?>"><?php echo $ResD['DepartmentName']; ?></option>
  <?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
  <option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo $ResDept['DepartmentCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;'.$ResDept['DepartmentName']; ?></option><?php } ?></select></td>
  <td class="All_100">Designation :&nbsp;<font color="#FF0000">*</font></td><td class="All_125"><span id="DesigSpan">
  <select class="All_120" name="DesigName" id="DesigName" style="text-transform:uppercase;" disabled>
  <?php $SqlDe=mysql_query("select DesigName from hrm_designation where DesigId=".$ResEmp['DesigId'], $con); $ResDe=mysql_fetch_assoc($SqlDe);?>
  <option value="<?php echo $ResEmp['DesigId']; ?>"><?php echo $ResDe['DesigName']; ?></option></select></span></td>
</tr>
<tr>
  <td class="All_100" valign="top">Head Quater :&nbsp;<font color="#FF0000">*</font></td><td class="All_125" valign="top"> <select class="All_120" name="HQName" id="HQName" onChange="HQSelect(this.value)" disabled>
 <?php $SqlH=mysql_query("select HqName from hrm_headquater where HqId=".$ResEmp['HqId'], $con); $ResH=mysql_fetch_array($SqlH); ?>
  <option  value="<?php echo $ResEmp['HqId']; ?>"><?php echo $ResH['HqName']; ?></option>
 <?php $SqlHQ=mysql_query("select * from hrm_headquater where HQStatus='A' AND CompanyId=".$CompanyId." order by HqName ASC", $con); while($ResHQ=mysql_fetch_array($SqlHQ)) { ?>
  <option value="<?php echo $ResHQ['HqId']; ?>"><?php echo $ResHQ['HqName']; ?></option><?php } ?></select></td>
  <td class="All_100" valign="top">Grade :</td><td class="All_125">
  <select class="All_120" name="GradeName" id="GradeName" disabled>
  <?php $SqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResEmp['GradeId'], $con); $ResG=mysql_fetch_array($SqlG); ?> 
  <option value="<?php echo $ResEmp['GradeId']; ?>"><?php echo $ResG['GradeValue']; ?></option>
<?php if($CompanyId==1){$sql = mysql_query("select * from hrm_grade where CompanyId=".$CompanyId." AND CreatedDate>='2014-02-01' order by GradeId ASC", $con) or die(mysql_error());}else{$sql = mysql_query("select * from hrm_grade where CompanyId=".$CompanyId." order by GradeId ASC", $con) or die(mysql_error());} while($res = mysql_fetch_array($sql)){ ?>
  <option value="<?php echo $res['GradeId']; ?>"><?php echo $res['GradeValue']; ?></option><?php } ?>
  </select></td>  
  
  <td class="All_100" valign="top">Cost Center :&nbsp;<font color="#FF0000"></font></td><td class="All_125"><select class="All_120" name="CostCenter" id="CostCenter" disabled>
 <?php $SqlC=mysql_query("select StateId,StateName from hrm_state where StateId=".$ResEmp['CostCenter'], $con); $ResC=mysql_fetch_assoc($SqlC);?>
  <option value="<?php echo $ResC['StateId']; ?>"><?php echo $ResC['StateName']; ?></option>
  
 <?php $SqlCC=mysql_query("select * from hrm_state INNER JOIN hrm_costcenter ON hrm_state.StateId=hrm_costcenter.CostCenterName where hrm_costcenter.CompanyId=".$CompanyId." order by hrm_state.StateName ASC", $con); while($ResCC=mysql_fetch_array($SqlCC)) { 
       //$SqlCC1=mysql_query("select * from hrm_state where StateId=".$ResCC['CostCenterName'], $con); $ResCC1=mysql_fetch_array($SqlCC1); ?>
	   <option value="<?php echo $ResCC['StateId']; ?>"><?php echo $ResCC['StateName']; ?></option><?php } ?></select></td>
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
  <td class="All_100">Age :</td><td class="All_125"><input  class="All_120" value="<?php echo $AgeMain.'   Year'; ?>" readonly></td>
  <td class="All_100" valign="top">Official Mob-1 :</td><td class="All_125"><input class="All_120" maxlength="10" name="OffiMobileNo" id="OffiMobileNo" value="<?php if($ResEmp['MobileNo_Vnr']==0) echo ''; else {echo $ResEmp['MobileNo_Vnr'];} ?>" readonly></td>
  <td class="All_100" valign="top">Official Mob-2 :</td><td class="All_125"><input class="All_120" maxlength="10" value="<?php if($ResEmp['MobileNo2_Vnr']==0) echo ''; else {echo $ResEmp['MobileNo2_Vnr'];} ?>" readonly></td> 
</tr>

<tr>
  <td class="All_100" valign="top">Offi. EmailId :&nbsp;<font color="#FF0000"></font></td><td class="All_125"><input maxlength="50" name="OffiEmialId" id="OffiEmialId" class="All_120" value="<?php echo $ResEmp['EmailId_Vnr']; ?>" readonly></td>
   <td class="All_100" valign="top">Vertical :&nbsp;</td><td class="All_125"><select name="EmpVertical" id="EmpVertical" class="All_120"> <?php if($ResEmp['EmpVertical']==0){ ?><option value="0">Select</option><?php } $sCat=mysql_query("select * from hrm_department_vertical where ComId=".$CompanyId." AND DeptId=".$ResEmp['DepartmentId']." order by VerticalName ASC"); while($rCat=mysql_fetch_assoc($sCat)){ ?><option value="<?=$rCat['VerticalId']?>" <?=($ResEmp['EmpVertical']==$rCat['VerticalId'])?'selected':'';?>><?=$rCat['VerticalName']?></option><?php } ?>
  </select> </td>
   <td class="All_100" valign="top">Skill :&nbsp;</td><td class="All_125"><select name="BWageCategory" id="BWageCategory" class="All_120"><?php if($ResEmp['BWageId']==0){ ?><option value="0">Select</option><?php } $sBat=mysql_query("select * from hrm_bonus_wages where BWageStatus!='De' AND CompanyId=".$CompanyId." group by BWageId ASC order by BWageId ASC"); while($rBat=mysql_fetch_assoc($sBat)){ ?>
   <option value="<?php echo $rBat['BWageId'];?>" <?=($ResEmp['BWageId']==$rBat['BWageId'])?'selected':'';?>><?php echo $rBat['Category'];?></option>
  <?php }  ?>
  </select></td>
</tr>

<tr>
  <td class="All_100" valign="top">Position Code :&nbsp;<font color="#FF0000"></font></td><td class="All_125"><input maxlength="50" name="PositionCode" id="PositionCode" class="All_120" value="<?php echo $ResEmp['PositionCode']; ?>" readonly></td>
  
  <td class="All_100" valign="top">Hiring Mode : &nbsp;</td>
    <td class="All_125">
        <select name="hiring_mode" id="hiring_mode" class="All_120">
            <option value="">Select</option>
            <option value="Campus" <?php if($ResEmp['Hiring_Mode']=='Campus'){echo 'selected';} ?> >Campus</option>
            <option value="Non Campus" <?php if($ResEmp['Hiring_Mode']=='Non Campus'){echo 'selected';}?>>Non Campus</option>
        </select>
    </td>
</tr>

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
 <input class="All_120" style="display:none;" name="ESICNo" id="ESICNo2" value="<?php echo $resEsic['Esic_EmployerCode']; ?>" readonly>*/ ?>
                                              </td></tr>

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
      $SqlDeD=mysql_query("select DesigName from hrm_designation where DesigId=".$resRn['DesigId'], $con); $ResDeD=mysql_fetch_assoc($SqlDeD);?>  				
<td class="All_100" valign="top">Designation :</td><td class="All_185"><input type="hidden" name="RepDesigF" id="RepDesigF" value="<?php echo $ResEmp['ReportingDesigId']; ?>" readonly><input class="All_180" id="RepDesigNameF" name="RefDesigNameF" value="<?php echo $ResDeD['DesigName']; ?>" readonly>
<span id="ReportingSpan"></span>
</td></tr>	
<tr><td class="All_100" valign="top">EmailId :</td><td class="All_200"><input class="All_180" name="RepEmailIdF" id="RepEmailIdF" value="<?php echo $ResEmp['ReportingEmailId']; ?>" readonly></td>				
<td class="All_100" valign="top">ContactNo :</td><td class="All_185"><input class="All_180" name="RepContactNoF" id="RepContactNoF" value="<?php echo $ResEmp['ReportingContactNo']; ?>" readonly></td></tr>		
</table>
</fieldset>
</tr>

<tr>
  <td style="font-size:11px;" colspan="6">
<fieldset align="center"><legend><b>Others</b></legend>
<table border="0">
 <tr>
  <td class="All_100" colspan="4">Apply Bond:&nbsp;<input type="checkbox" id="applyBond" <?php if($ResEmp['Apply_Bond']=='Y'){echo 'checked';} ?> onClick="FUnBond()"/><input type="hidden" id="TrfBond" name="TrfBond" value="<?=$ResEmp['Apply_Bond']?>" />
  <script>
  function FUnBond()
  {
   if(document.getElementById("applyBond").checked==true){var v='Y'; document.getElementById("BondYear").disabled=false;}
   else{v='N'; document.getElementById("BondYear").disabled=true;} 
   document.getElementById("TrfBond").value=v; }
   </script>
  &nbsp;&nbsp;
  Year&nbsp;<select class="All_100" name="BondYear" id="BondYear" <?php if($ResEmp['Apply_Bond']=='Y'){echo '';}else{echo 'disabled'; }?>>
   <option value="" <?php if($ResEmp['Bond_Year']==''){echo 'selected';}?>>Select</option>
  <option value="1" <?php if($ResEmp['Bond_Year']==1){echo 'selected';}?>>1 Year</option>
  <option value="2" <?php if($ResEmp['Bond_Year']==2){echo 'selected';}?>>2 Year</option>
  <option value="3" <?php if($ResEmp['Bond_Year']==3){echo 'selected';}?>>3 Year</option>
  <option value="4" <?php if($ResEmp['Bond_Year']==4){echo 'selected';}?>>4 Year</option>
  <option value="5" <?php if($ResEmp['Bond_Year']==5){echo 'selected';}?>>5 Year</option>
  </select>
  </td>	
   <td class="All_100">ESSL Code:</td>
  <td class="All_120"><input class="All_100" type="text" id="EsslCode" name="EsslCode" value="<?php echo $ResEmp['EsslCode'];  ?>" /></td>
 </tr>		
 <tr>
  <td class="All_120">(1) Transfer Date:</td>
  <td class="All_120"><input class="All_100" type="text" id="TrfDate" name="TrfDate" value="<?php if($ResEmp['Transfer_Dept_Date']!='' && $ResEmp['Transfer_Dept_Date']!='0000-00-00' && $ResEmp['Transfer_Dept_Date']!='1970-01-01'){ echo date("d-m-Y",strtotime($ResEmp['Transfer_Dept_Date'])); } ?>" /><button id="f_btnn6" class="CalenderButton"></button></td>
  <td>&nbsp;</td>
  <td class="All_50">Dept:</td>
  <td class="120"><select class="All_120" name="TrfDept" style="text-transform:uppercase;">
  <?php $SqlDept=mysql_query("select DepartmentId,DepartmentName from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)){ ?>
  <option value="<?=$ResDept['DepartmentName']?>" <?php if($ResEmp['Transfer_Dept_Name']==$ResDept['DepartmentName']){echo 'selected';}?>><?=$ResDept['DepartmentName']?></option><?php } ?>
  <option value="" <?php if($ResEmp['Transfer_Dept_Name']==''){echo 'selected';}?>>Select</option>
  </select></td>
  <td>&nbsp;</td>
  <td class="All_100">Location:</td>
  <td class="120"><select class="All_120" name="TrfLoc" style="text-transform:uppercase;">
  <?php $SqlHq=mysql_query("select * from hrm_headquater where HQStatus='A' AND CompanyId=".$CompanyId." group by HqName order by HqName ASC", $con); while($ResHq=mysql_fetch_array($SqlHq)){ ?>
  <option value="<?=$ResHq['HqId']?>" <?php if($ResEmp['Transfer_location']==$ResHq['HqId']){echo 'selected';}?>><?=$ResHq['HqName']?></option><?php } ?>
  <option value="" <?php if($ResEmp['Transfer_location']==''){echo 'selected';}?>>Select</option>
  </select></td>
 </tr>
 <tr>
  <td class="All_120">(2) Transfer Date:</td>
  <td class="All_120"><input class="All_100" type="text" id="Trf2Date" name="Trf2Date" value="<?php if($ResEmp['Transfer2_Dept_Date']!='' && $ResEmp['Transfer2_Dept_Date']!='0000-00-00' && $ResEmp['Transfer2_Dept_Date']!='1970-01-01'){ echo date("d-m-Y",strtotime($ResEmp['Transfer2_Dept_Date'])); }?>" /><button id="f_btnn7" class="CalenderButton"></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("f_btnn6", "TrfDate", "%d-%m-%Y");  cal.manageFields("f_btnn7", "Trf2Date", "%d-%m-%Y");</script></td>
  <td>&nbsp;</td>
  <td class="All_50">Dept:</td>
  <td class="120"><select class="All_120" name="Trf2Dept" style="text-transform:uppercase;">
  <?php $SqlDept=mysql_query("select DepartmentId,DepartmentName from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)){ ?>
  <option value="<?=$ResDept['DepartmentName']?>" <?php if($ResEmp['Transfer2_Dept_Name']==$ResDept['DepartmentName']){echo 'selected';}?>><?=$ResDept['DepartmentName']?></option><?php } ?>
  <option value="" <?php if($ResEmp['Transfer2_Dept_Name']==''){echo 'selected';}?>>Select</option>
  </select></td>
  <td>&nbsp;</td>
  <td class="All_100">Location:</td>
  <td class="120"><select class="All_120" name="Trf2Loc" style="text-transform:uppercase;">
  <?php $SqlHq=mysql_query("select * from hrm_headquater where HQStatus='A' AND CompanyId=".$CompanyId." group by HqName order by HqName ASC", $con); while($ResHq=mysql_fetch_array($SqlHq)){ ?>
  <option value="<?=$ResHq['HqId']?>" <?php if($ResEmp['Transfer2_location']==$ResHq['HqId']){echo 'selected';}?>><?=$ResHq['HqName']?></option><?php } ?>
  <option value="" <?php if($ResEmp['Transfer2_location']==''){echo 'selected';}?>>Select</option>
  </select></td>
 </tr>
</table>
</fieldset>
  </td>
</tr>


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

