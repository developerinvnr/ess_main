<?php
require_once('config/config.php');
if(isset($_POST['Deptid']) && $_POST['Deptid']!=""){ $Deptid=$_POST['Deptid'];?>

      <select class="All_200" name="DesigName" id="DesigName" onchange="SelDesig(this.value)" required>
	  <option style="background-color:#DBD3E2; " value="">Select</option>
<?php $sql = mysql_query("select ddg.DesigId,de.designation_name as DesigName from hrm_deptgradedesig ddg inner join core_designation de on ddg.DesigId=de.id WHERE ddg.DGDStatus='A' AND ddg.DepartmentId=".$Deptid." GROUP BY ddg.DesigId", $con) or die(mysql_error()); 
      while($res = mysql_fetch_array($sql))
	   { //$sql1 = mysql_query("select * from hrm_designation WHERE DesigId=".$res['DesigId'], $con) or die(mysql_error()); 
	     //$res1 = mysql_fetch_array($sql1);
	     ?>
	  <option value="<?php echo $res['DesigId']; ?>"><?php echo $res['DesigName'];; ?></option><?php } ?>
      </select> <input type="hidden" name="DeptId" id="DeptId" value="<?php echo $Did; ?>" />
	  
<?php } 


if(isset($_POST['stateid']) && $_POST['stateid']!=""){ $stateid=$_POST['stateid'];?>

      <select class="All_200" name="HQName" id="HQName<?=$sn?>" onChange="HQSelect(this.value,<?=$_POST['sn']?>)" required>
      <?php $sql = mysql_query("select id,city_village_name as value from core_city_village_by_state WHERE is_active=1 and state_id=".$stateid." group by city_village_name order by city_village_name",$con); while($res = mysql_fetch_array($sql)){ ?>    
       <option value="<?=$res['id']?>"><?=$res['value']?></option><?php } ?>
      </select>
      
      <input type="hidden" name="StateId" id="StateId" value="<?php echo $stateid; ?>" />
	  
<?php } ?>

<?php

//Mv_b Mv_c Mv_ed Mv_ex Mv_f Mv_cp Mv_l Mv_h  /*Mv_ct Mv_tc*/    

if($_POST['For']=='MoveVessDatatoESS' && $_POST['ei']!='' && $_POST['vi']!='' && $_POST['ui']!='')
{ 
 
 $con2=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
 $db2=mysql_select_db('hrims_movefromvess', $con2);
 
 
 //$sConf=mysql_query("select DateConfirmationYN, ConfirmHR, DateConfirmation from hrm_employee_general where EmployeeID=".$_POST['ei'],$con2); 
 //$rConf=mysql_num_rows($sConf);
 
 $sqlEc=mysql_query("select VCode,EmpCode,CompanyId,DOE from hrm_employee where EmployeeID=".$_POST['ei'],$con2);
 $resEc=mysql_fetch_assoc($sqlEc);
 $EC=$resEc['VCode'].''.$resEc['EmpCode']; 
 
 
    	
 if($_POST['vi']=='Mv_b')
 {      
    
    $sql=mysql_query("select e.*,g.*,p.* from hrm_employee e left join hrm_employee_general g on e.EmployeeID=g.EmployeeID left join hrm_employee_personal p on e.EmployeeID=p.EmployeeID where e.EmployeeID=".$_POST['ei'],$con2);
	
	if($sql)
	{
	 $res=mysql_fetch_assoc($sql);
	 
/******** -------------------------------------------------------------------------------- ********/
/******** -------------------------------------------------------------------------------- ********/

//define('HOSTT','97.74.82.92'); define('USERR','hrims_user'); define('PASSS','hrims@192'); define('DATABASEE','hrims');
$cnn=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
//if(!$cnn) die("Failed to connect to database!");
//$cnn=mysql_connect('localhost','root','ajaydbajay');
$db=mysql_select_db('hrims', $cnn);
//if(!$db) die("Failed to select database!");

$sChk=mysql_query("select * from hrm_employee where EmployeeID=".$_POST['ei'],$cnn); $rChk=mysql_num_rows($sChk);
if($rChk==0)
{
 //basic
 $insE=mysql_query("insert into hrm_employee(EmployeeID, VCode, EmpCode,EmpCode_New, ECode, EsslCode, EmpPass, EmpType, EmpStatus, Fname, Sname, Lname, RetiStatus, RetiDate, RetiNewCode, RetiOldCode, Nname, TimeApply, Shift, InTime, OutTime, ChangePwd, UseApps, UseApps_Punch, UseApps_GpsTracking, Resig_Permission, ProfileCertify, ScalateKRA, SubmitSelfAsset, EmpGen_Status, EmpPer_Status, EmpCon_Status, EmpEdu_Status, EmpFam_Status, EmpExp_Status, EmpLang_Status, EmpAss_Status, EmpGen_Noc, EmpPer_Noc, EmpCon_Noc, EmpEdu_Noc, EmpFam_Noc, EmpExp_Noc, EmpLang_Noc, EmpAss_Noc, ExtraChangeStatus, ExtraChange, tokenid, CompanyId, CreatedBy, CreatedDate, SysDate) values('".$_POST['ei']."', '".$res['VCode']."', '".$EC."','".$EC."', '".$_POST['ei']."', '".$res['EsslCode']."', '".$res['EmpPass']."', '".$res['EmpType']."', '".$res['EmpStatus']."', '".$res['Fname']."', '".$res['Sname']."', '".$res['Lname']."', '".$res['RetiStatus']."', '".$res['RetiDate']."', '".$res['RetiNewCode']."', '".$res['RetiOldCode']."', '".$res['Nname']."', '".$res['TimeApply']."', '".$res['Shift']."', '".$res['InTime']."', '".$res['OutTime']."', '".$res['ChangePwd']."', '".$res['UseApps']."', '".$res['UseApps_Punch']."', '".$res['UseApps_GpsTracking']."', '".$res['Resig_Permission']."',  '".$res['ProfileCertify']."', '".$res['ScalateKRA']."', '".$res['SubmitSelfAsset']."', '".$res['EmpGen_Status']."', '".$res['EmpPer_Status']."', '".$res['EmpCon_Status']."', '".$res['EmpEdu_Status']."', '".$res['EmpFam_Status']."', '".$res['EmpExp_Status']."', '".$res['EmpLang_Status']."', '".$res['EmpAss_Status']."', '".$res['EmpGen_Noc']."', '".$res['EmpPer_Noc']."', '".$res['EmpCon_Noc']."', '".$res['EmpEdu_Noc']."', '".$res['EmpFam_Noc']."', '".$res['EmpExp_Noc']."', '".$res['EmpLang_Noc']."', '".$res['EmpAss_Noc']."', '".$res['ExtraChangeStatus']."', '".$res['ExtraChange']."', '".$res['tokenid']."', '1', '".$_POST['ui']."', '".$resEc['DOE']."', '".date("Y-m-d")."')",$cnn);
 
 //DateOfResignation, DateOfSepration, '".$res['DateOfResignation']."', '".$res['DateOfSepration']."',
 
 //general
 $insEg=mysql_query("insert into hrm_employee_general(EmployeeID, EC, FileNo, DateJoining, DateConfirmationYN, ConfirmHR, DateConfirmation, ConfirmMonth, ConfirmMailNofT, DOB, DOB_dm, GradeId, CostCenter, HqId, DepartmentId, DesigId, PositionCode, SubLocation, EmailId_Vnr, MobileNo_Vnr, MobileNo2_Vnr, VNRExpYear, VNRExpMonth, PreviousExpYear, PreviousExpMonth, TotalExp, BankName, BranchName, AccountNo, BranchAdd, BankName2, BranchName2, AccountNo2, BranchAdd2, BankIfscCode, BankIfscCode2, PaymentType, InsuCardNo, PfAccountNo, PF_UAN, EsicAllow, EsicNo, RepEmployeeID, ReportingName, ReportingDesigId, ReportingContactNo, ReportingEmailId, Category, Section, Apply_Bond, Bond_Year, NoticeDay_Prob, NoticeDay_Conf, AttMobileNo1, AttMobileNo2, EmpVertical, BWageId, Req_DrivLic, Covid_19, Covid_19Date, Covid_Vaccin, Covid_Vaccin2, Covid_Vaccin_file, Covid_Vaccin2_file, Covid_Vaccin3, Covid_Vaccin3_file, CreatedBy, CreatedDate, SysDate) values('".$_POST['ei']."', '".$EC."', '".$res['FileNo']."', '".$res['DateJoining']."', '".$res['DateConfirmationYN']."', '".$res['ConfirmHR']."', '".$res['DateConfirmation']."', '".$res['ConfirmMonth']."', '".$res['ConfirmMailNofT']."', '".$res['DOB']."', '".$res['DOB_dm']."', '".$res['New_Grade']."', '".$res['CostCenter']."', '".$res['New_Hq']."', '".$res['New_Dept']."', '".$res['New_Desig']."', '".$res['PositionCode']."', '".$res['SubLocation']."', '".$res['EmailId_Vnr']."', '".$res['MobileNo_Vnr']."', '".$res['MobileNo2_Vnr']."', '".$res['VNRExpYear']."', '".$res['VNRExpMonth']."', '".$res['PreviousExpYear']."', '".$res['PreviousExpMonth']."', '".$res['TotalExp']."', '".$res['BankName']."', '".$res['BranchName']."', '".$res['AccountNo']."', '".$res['BranchAdd']."', '".$res['BankName2']."', '".$res['BranchName2']."', '".$res['AccountNo2']."', '".$res['BranchAdd2']."', '".$res['BankIfscCode']."', '".$res['BankIfscCode2']."', '".$res['PaymentType']."', '".$res['InsuCardNo']."', '".$res['PfAccountNo']."', '".$res['PF_UAN']."', '".$res['EsicAllow']."', '".$res['EsicNo']."', '".$res['RepEmployeeID']."', '".$res['ReportingName']."', '".$res['ReportingDesigId']."', '".$res['ReportingContactNo']."', '".$res['ReportingEmailId']."', '".$res['Category']."', '".$res['Section']."', '".$res['Apply_Bond']."', '".$res['Bond_Year']."', '".$res['NoticeDay_Prob']."', '".$res['NoticeDay_Conf']."', '".$res['AttMobileNo1']."', '".$res['AttMobileNo2']."', '".$res['EmpVertical']."', '".$res['BWageId']."', '".$res['Req_DrivLic']."', '".$res['Covid_19']."', '".$res['Covid_19Date']."', '".$res['Covid_Vaccin']."', '".$res['Covid_Vaccin2']."', '".$res['Covid_Vaccin_file']."', '".$res['Covid_Vaccin2_file']."', '".$res['Covid_Vaccin3']."', '".$res['Covid_Vaccin3_file']."', '".$_POST['ui']."', '".$resEc['DOE']."', '".date("Y-m-d")."')",$cnn); 
 
 //Persoanl
 $insEp=mysql_query("insert into hrm_employee_personal(EmployeeID, EC, Gender, Religion, AadharNo, DR, BloodGroup, SeniorCitizen, MetroCity, MobileNo, PhoneNo, EmailId_Self, PanNo, PanNo_YN, PassportNo, PassportNo_YN, Passport_ExpiryDateFrom, Passport_ExpiryDateTo, DrivingLicNo, DrivingLicNo_YN, Driv_ExpiryDateFrom, Driv_ExpiryDateTo, Qualification, Married, MarriageDate, MarriageDate_dm, Categoryy, Widow, Divorce, Warm_WelC_Oth, CreatedBy, CreatedDate) values('".$_POST['ei']."', '".$EC."', '".$res['Gender']."', '".$res['Religion']."', '".$res['AadharNo']."', '".$res['DR']."', '".$res['BloodGroup']."', '".$res['SeniorCitizen']."', '".$res['MetroCity']."', '".$res['MobileNo']."', '".$res['PhoneNo']."', '".$res['EmailId_Self']."', '".$res['PanNo']."', '".$res['PanNo_YN']."', '".$res['PassportNo']."', '".$res['PassportNo_YN']."', '".$res['Passport_ExpiryDateFrom']."', '".$res['Passport_ExpiryDateTo']."', '".$res['DrivingLicNo']."', '".$res['DrivingLicNo_YN']."', '".$res['Driv_ExpiryDateFrom']."', '".$res['Driv_ExpiryDateTo']."', '".$res['Qualification']."', '".$res['Married']."', '".$res['MarriageDate']."', '".$res['MarriageDate_dm']."', '".$res['Categoryy']."', '".$res['Widow']."', '".$res['Divorce']."', '".$res['Warm_WelC_Oth']."', '".$_POST['ui']."', '".date("Y-m-d")."')",$cnn);
 
 
 if($insE && $insEg && $insEp)
 { 
   $con2=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
   $db2=mysql_select_db('hrims_movefromvess', $con2);
   $Du=mysql_query("update hrm_employee set ".$_POST['vi']."=1 where EmployeeID=".$_POST['ei'],$con2); 
   echo '<input type="hidden"  id="ChkVrst" value="1"  />'; 
 } 
 else{ echo '<input type="hidden"  id="ChkVrst" value="0"  />'; } 
}


/******** -------------------------------------------------------------------------------- ********/
/******** -------------------------------------------------------------------------------- ********/
	
	} //if($sql)
	
  
 } //if($_POST['vi']=='Mv_b') if($_POST['vi']=='Mv_b') if($_POST['vi']=='Mv_b') if($_POST['vi']=='Mv_b')
 
 
 elseif($_POST['vi']=='Mv_c')
 {
     //$con2=mysql_connect('localhost','hrims_user','hrims@192');
     //$db2=mysql_select_db('hrims_movefromvess', $con2);
    //Contact & family
    $sql=mysql_query("select c.*,f.* from hrm_employee_contact c left join hrm_employee_family f on c.EmployeeID=f.EmployeeID where c.EmployeeID=".$_POST['ei'],$con2);	
	if($sql)
	{
	 $res=mysql_fetch_assoc($sql);
/******** -------------------------------------------------------------------------------- ********/
/******** -------------------------------------------------------------------------------- ********/
//define('HOSTT','97.74.82.92'); define('USERR','hrims_user'); define('PASSS','hrims@192'); define('DATABASEE','hrims');
$cnn=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
//$cnn=mysql_connect('localhost','root','ajaydbajay');
$db=mysql_select_db('hrims', $cnn);

$sChk=mysql_query("select * from hrm_employee_contact where EmployeeID=".$_POST['ei'],$cnn); $rChk=mysql_num_rows($sChk);

if($rChk==0)
{
  //Contact
  $insEc=mysql_query("insert into hrm_employee_contact(EmployeeID, EC, CurrAdd, CurrAdd_State, CurrAdd_City, CurrAdd_PinNo, ParAdd, ParAdd_State, ParAdd_City, ParAdd_PinNo, EmgContactNo, EmgRelation, EmgName, EmgAdd, Personal_RefName, Personal_RefContactNo, Personal_RefDesig, Personal_RefEmailId, Personal_RefRelation, Personal_RefCompany, Personal_RefAdd, Prof_RefName, Prof_RefContactNo, Prof_RefDesig, Prof_RefEmailId, Prof_RefRelation, Prof_RefCompany, Prof_RefAdd, CreatedBy, CreatedDate) values('".$_POST['ei']."', '".$EC."', '".$res['CurrAdd']."', '".$res['CurrAdd_State']."', '".$res['CurrAdd_City']."', '".$res['CurrAdd_PinNo']."', '".$res['ParAdd']."', '".$res['ParAdd_State']."', '".$res['ParAdd_City']."', '".$res['ParAdd_PinNo']."', '".$res['EmgContactNo']."', '".$res['EmgRelation']."', '".$res['EmgName']."', '".$res['EmgAdd']."', '".$res['Personal_RefName']."', '".$res['Personal_RefContactNo']."', '".$res['Personal_RefDesig']."', '".$res['Personal_RefEmailId']."', '".$res['Personal_RefRelation']."', '".$res['Personal_RefCompany']."', '".$res['Personal_RefAdd']."', '".$res['Prof_RefName']."', '".$res['Prof_RefContactNo']."', '".$res['Prof_RefDesig']."', '".$res['Prof_RefEmailId']."', '".$res['Prof_RefRelation']."', '".$res['Prof_RefCompany']."', '".$res['Prof_RefAdd']."', '".$_POST['ui']."', '".date("Y-m-d")."')",$cnn);
  
  
  //Family
  $insEf=mysql_query("insert into hrm_employee_family(EmployeeID, EC, Fa_SN, FatherName, FatherDOB, FatherOccupation, FatherQuali, Covid_VaccinF, Covid_VaccinF2, Mo_SN, MotherName, MotherDOB, MotherOccupation, MotherQuali, Covid_VaccinM, Covid_VaccinM2, HW_SN, HusWifeName, HusWifeDOB, HusWifeOccupation, HusWifeQuali, Covid_VaccinW, Covid_VaccinW2, CreatedBy, CreatedDate) values('".$_POST['ei']."', '".$EC."', '".$res['Fa_SN']."', '".$res['FatherName']."', '".$res['FatherDOB']."', '".$res['FatherOccupation']."', '".$res['FatherQuali']."', '".$res['Covid_VaccinF']."', '".$res['Covid_VaccinF2']."', '".$res['Mo_SN']."', '".$res['MotherName']."', '".$res['MotherDOB']."', '".$res['MotherOccupation']."', '".$res['MotherQuali']."', '".$res['Covid_VaccinM']."', '".$res['Covid_VaccinM2']."', '".$res['HW_SN']."', '".$res['HusWifeName']."', '".$res['HusWifeDOB']."', '".$res['HusWifeOccupation']."', '".$res['HusWifeQuali']."', '".$res['Covid_VaccinW']."', '".$res['Covid_VaccinW2']."', '".$_POST['ui']."', '".date("Y-m-d")."')",$cnn);
  
  if($insEc && $insEf)
  { 
   $con2=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
   $db2=mysql_select_db('hrims_movefromvess', $con2);
   $Du=mysql_query("update hrm_employee set ".$_POST['vi']."=1 where EmployeeID=".$_POST['ei'],$con2); 
   echo '<input type="hidden"  id="ChkVrst" value="1"  />'; 
  } 
  else{ echo '<input type="hidden"  id="ChkVrst" value="0"  />'; } 
  
}
/******** -------------------------------------------------------------------------------- ********/
/******** -------------------------------------------------------------------------------- ********/	
	  
	} //if($sql)
	
 
 } //elseif($_POST['vi']=='Mv_c') elseif($_POST['vi']=='Mv_c') elseif($_POST['vi']=='Mv_c')
 
 elseif($_POST['vi']=='Mv_ed')
 {
    //$con2=mysql_connect('localhost','hrims_user','hrims@192');
    //$db2=mysql_select_db('hrims_movefromvess', $con2);
    //Education
    $sql=mysql_query("select * from hrm_employee_qualification where EmployeeID=".$_POST['ei']." order by QualificationId ASC",$con2);	
    $sqlCf=mysql_query("select * from hrm_employee_confletter where EmployeeID=".$_POST['ei']." order by ConfLetterId ASC",$con2);
	if($sql OR $sqlCf)
	{
	
/******** -------------------------------------------------------------------------------- ********/
/******** -------------------------------------------------------------------------------- ********/ 
//define('HOSTT','97.74.82.92'); define('USERR','hrims_user'); define('PASSS','hrims@192'); define('DATABASEE','hrims');
$cnn=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
//$cnn=mysql_connect('localhost','root','ajaydbajay');
$db=mysql_select_db('hrims', $cnn);

$sChk=mysql_query("select * from hrm_employee_qualification where EmployeeID=".$_POST['ei'],$cnn); $rChk=mysql_num_rows($sChk);
if($rChk==0)
{ 
  while($res=mysql_fetch_assoc($sql))
  {
   $insEq=mysql_query("insert into hrm_employee_qualification(EmployeeID, EC, Qualification, MaxQuali, Specialization, Institute, Subject, PassOut, Grade_Per, QuaCreatedBy, QuaCreatedDate, QuaYearId) values('".$_POST['ei']."', '".$EC."', '".$res['Qualification']."', '".$res['MaxQuali']."', '".$res['Specialization']."', '".$res['Institute']."', '".$res['Subject']."', '".$res['PassOut']."', '".$res['Grade_Per']."', '".$_POST['ui']."', '".date("Y-m-d")."', '".$res['QuaYearId']."')",$cnn);
   
  } 
  
  if($insEq)
  { 
   $con2=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
   $db2=mysql_select_db('hrims_movefromvess', $con2);
   $Du=mysql_query("update hrm_employee set ".$_POST['vi']."=1 where EmployeeID=".$_POST['ei'],$con2); 
   echo '<input type="hidden"  id="ChkVrst" value="1"  />'; 
  } 
  else{ echo '<input type="hidden"  id="ChkVrst" value="0"  />'; } 

}  
  
$sChkCF=mysql_query("select * from hrm_employee_confletter where EmployeeID=".$_POST['ei'],$cnn); $rChkCF=mysql_num_rows($sChkCF);
if($rChkCF==0)
{
 while($resCf=mysql_fetch_assoc($sqlCf))    
 {
    $insCf=mysql_query("insert into hrm_employee_confletter(EmployeeID, ConfDate, Communi, JobKnowl, OutPut, Initiative, InterSkill, ProblemSolve, Attitude, Attendance, EmpStrenght, AreaImprovement, Rating, Recommendation, Reason, SubmitStatus, HrRemark, Current_GradeId, Current_DesigId, GradeId, DesigId, Status, EmpShow, EmpShow_Trr, EmpShow_Ext, HR_Fill_Date, Rep_Fill_Date, CreatedBy, CreatedDate, YearId) values('".$_POST['ei']."', '".$resCf['ConfDate']."', '".$resCf['Communi']."', '".$resCf['JobKnowl']."', '".$resCf['OutPut']."', '".$resCf['Initiative']."', '".$resCf['InterSkill']."', '".$resCf['ProblemSolve']."', '".$resCf['Attitude']."', '".$resCf['Attendance']."', '".$resCf['EmpStrenght']."', '".$resCf['AreaImprovement']."', '".$resCf['Rating']."', '".$resCf['Recommendation']."', '".$resCf['Reason']."', '".$resCf['SubmitStatus']."', '".$resCf['HrRemark']."', '".$resCf['Current_GradeId']."', '".$resCf['Current_DesigId']."', '".$resCf['GradeId']."', '".$resCf['DesigId']."', '".$resCf['Status']."', '".$resCf['EmpShow']."', '".$resCf['EmpShow_Trr']."', '".$resCf['EmpShow_Ext']."', '".$resCf['HR_Fill_Date']."', '".$resCf['Rep_Fill_Date']."', '".$resCf['CreatedBy']."', '".$resCf['CreatedDate']."', '".$resCf['YearId']."')",$cnn);  
 }
}  
  
 
/******** -------------------------------------------------------------------------------- ********/
/******** -------------------------------------------------------------------------------- ********/ 
	 
	} //if($sql)
	
 
 } //elseif($_POST['vi']=='Mv_ed') elseif($_POST['vi']=='Mv_ed') elseif($_POST['vi']=='Mv_ed')
 
 elseif($_POST['vi']=='Mv_f')
 {
    //$con2=mysql_connect('localhost','hrims_user','hrims@192');
    //$db2=mysql_select_db('hrims_movefromvess', $con2);
    //Family
    $sql=mysql_query("select * from hrm_employee_family2 where EmployeeID=".$_POST['ei']." order by Family2Id ASC",$con2);	
	if($sql)
	{
/******** -------------------------------------------------------------------------------- ********/
/******** -------------------------------------------------------------------------------- ********/ 
//define('HOSTT','97.74.82.92'); define('USERR','hrims_user'); define('PASSS','hrims@192'); define('DATABASEE','hrims');
$cnn=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
//$cnn=mysql_connect('localhost','root','ajaydbajay');
$db=mysql_select_db('hrims', $cnn);

$sChk=mysql_query("select * from hrm_employee_family2 where EmployeeID=".$_POST['ei'],$cnn); $rChk=mysql_num_rows($sChk);
if($rChk==0)
{ 
  while($res=mysql_fetch_assoc($sql))
  {
   $insEf=mysql_query("insert into hrm_employee_family2(EmployeeID, EC, FamilyRelation, Fa2_SN, FamilyName, FamilyDOB, FamilyQualification, FamilyOccupation, FamilyMarried, Covid_Vaccin, Covid_Vaccin2, Covid_Vaccin_file, Covid_Vaccin2_file, CreatedBy, CreatedDate, YearId) values('".$_POST['ei']."', '".$EC."', '".$res['FamilyRelation']."', '".$res['Fa2_SN']."', '".$res['FamilyName']."', '".$res['FamilyDOB']."', '".$res['FamilyQualification']."', '".$res['FamilyOccupation']."', '".$res['FamilyMarried']."', '".$res['Covid_Vaccin']."', '".$res['Covid_Vaccin2']."', '".$res['Covid_Vaccin_file']."', '".$res['Covid_Vaccin2_file']."', '".$_POST['ui']."', '".date("Y-m-d")."', '".$res['YearId']."')",$cnn);
  } 
  
  if($insEf)
  { 
   $con2=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
   $db2=mysql_select_db('hrims_movefromvess', $con2);
   $Du=mysql_query("update hrm_employee set ".$_POST['vi']."=1 where EmployeeID=".$_POST['ei'],$con2); 
   echo '<input type="hidden"  id="ChkVrst" value="1"  />'; 
  } 
  else
  { 
      $con2=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
      $db2=mysql_select_db('hrims_movefromvess', $con2);
      $Du=mysql_query("update hrm_employee set ".$_POST['vi']."=1 where EmployeeID=".$_POST['ei'],$con2); 
      echo '<input type="hidden"  id="ChkVrst" value="1"  />'; 
      
  } 
  
} 
/******** -------------------------------------------------------------------------------- ********/
/******** -------------------------------------------------------------------------------- ********/  
		 
	} //if($sql)
	
 
 } //elseif($_POST['vi']=='Mv_f') elseif($_POST['vi']=='Mv_f') elseif($_POST['vi']=='Mv_f')
 
 elseif($_POST['vi']=='Mv_ex')
 {
    //$con2=mysql_connect('localhost','hrims_user','hrims@192');
    //$db2=mysql_select_db('hrims_movefromvess', $con2);
    //Education
    $sql=mysql_query("select * from hrm_employee_experience where EmployeeID=".$_POST['ei']." order by ExpFromDate ASC",$con2);	
	if($sql)
	{
	
/******** -------------------------------------------------------------------------------- ********/
/******** -------------------------------------------------------------------------------- ********/ 
//define('HOSTT','97.74.82.92'); define('USERR','hrims_user'); define('PASSS','hrims@192'); define('DATABASEE','hrims');
$cnn=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
//$cnn=mysql_connect('localhost','root','ajaydbajay');
$db=mysql_select_db('hrims', $cnn);

$sChk=mysql_query("select * from hrm_employee_experience where EmployeeID=".$_POST['ei'],$cnn); $rChk=mysql_num_rows($sChk);
if($rChk==0)
{ 
  while($res=mysql_fetch_assoc($sql))
  {
   $insEx=mysql_query("insert into hrm_employee_experience(EmployeeID, EC, ExpComName, ExpComAdd, ExpComContactNo, ExpDesignation, ExpFromDate, ExpToDate, ExpTotalYear, ExpGrossSalary, ExpRemark,  ExpCreatedBy, ExpCreatedDate, ExpYearId) values('".$_POST['ei']."', '".$EC."', '".$res['ExpComName']."', '".$res['ExpComAdd']."', '".$res['ExpComContactNo']."', '".$res['ExpDesignation']."', '".$res['ExpFromDate']."', '".$res['ExpToDate']."', '".$res['ExpTotalYear']."', '".$res['ExpGrossSalary']."', '".$res['ExpRemark']."', '".$_POST['ui']."', '".date("Y-m-d")."', '".$res['ExpYearId']."')",$cnn);
  } 
  
  if($insEx)
  { 
   $con2=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
   $db2=mysql_select_db('hrims_movefromvess', $con2);
   $Du=mysql_query("update hrm_employee set ".$_POST['vi']."=1 where EmployeeID=".$_POST['ei'],$con2); 
   echo '<input type="hidden"  id="ChkVrst" value="1"  />'; 
  } 
  else{ echo '<input type="hidden"  id="ChkVrst" value="0"  />'; } 
} 
/******** -------------------------------------------------------------------------------- ********/
/******** -------------------------------------------------------------------------------- ********/ 
	 
	} //if($sql)
	
 
 } //elseif($_POST['vi']=='Mv_ex') elseif($_POST['vi']=='Mv_ex') elseif($_POST['vi']=='Mv_ex')


 elseif($_POST['vi']=='Mv_l')
 {
/******** -------------------------------------------------------------------------------- ********/
/******** -------------------------------------------------------------------------------- ********/      
    //Education
    $sqlLg=mysql_query("select * from hrm_employee_langproficiency where EmployeeID=".$_POST['ei']." order by LangProficiencyId ASC",$con2);	
	$sqlLv=mysql_query("select * from hrm_employee_monthlyleave_balance where Year='".date("Y")."' AND EmployeeID=".$_POST['ei']." order by MonthlyLeaveId ASC",$con2);
	$sqlLvA=mysql_query("select * from hrm_employee_applyleave where EmployeeID=".$_POST['ei']." order by ApplyLeaveId ASC",$con2); 
	if($sqlLg OR $sqlLv OR $sqlLvA)
	{


//define('HOSTT','97.74.82.92'); define('USERR','hrims_user'); define('PASSS','hrims@192'); define('DATABASEE','hrims');
$cnn=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
//$cnn=mysql_connect('localhost','root','ajaydbajay');
$db=mysql_select_db('hrims', $cnn);

$sChkLg=mysql_query("select * from hrm_employee_langproficiency where EmployeeID=".$_POST['ei'],$cnn); $rChkLg=mysql_num_rows($sChkLg);
if($rChkLg==0)
{ 
  while($resLg=mysql_fetch_assoc($sqlLg))
  {
   $insEl=mysql_query("insert into hrm_employee_langproficiency(EmployeeID, Language, LangCheck, Write_lang, Read_lang, Speak_lang, LangProCreatedBy, LangProCreatedDate, LangProYearId) values('".$_POST['ei']."', '".$resLg['Language']."', '".$resLg['LangCheck']."', '".$resLg['Write_lang']."', '".$resLg['Read_lang']."', '".$resLg['Speak_lang']."', '".$_POST['ui']."', '".date("Y-m-d")."', '".$resLg['LangProYearId']."')",$cnn);   
  } 
} 


//Leave Balance
$sChkLv=mysql_query("select * from hrm_employee_monthlyleave_balance where Year='".date("Y")."' AND EmployeeID=".$_POST['ei'],$cnn); $rChkLv=mysql_num_rows($sChkLv);

if($rChkLv==0)
{ 
  while($resLv=mysql_fetch_assoc($sqlLv))
  {
   $insElv=mysql_query("insert into hrm_employee_monthlyleave_balance(EmployeeID, EC, Month, Year, OpeningCL, OpeningSL, OpeningPL, OpeningEL, OpeningOL, OpeningML, CreditedCL, CreditedSL, CreditedPL, CreditedEL, CreditedOL, CreditedML, TotCL, TotSL, TotPL, TotEL, TotOL, TotML, EnCashCL, EnCashSL, EnCashPL, EnCashEL, EnCashOL, EnCashML, AvailedCL, AvailedSL, AvailedPL, AvailedEL, AvailedOL, AvailedTL, AvailedML, BalanceCL, BalanceSL, BalancePL, BalanceEL, BalanceOL, BalanceML, CreatedBy, CreatedDate, YearId, MonthAtt_TotLeave, MonthAtt_TotOD, MonthAtt_TotHO, MonthAtt_TotPR, MonthAtt_TotAP, MonthAtt_TotWorkDay, MonthAtt_TotPaidDay) values('".$_POST['ei']."', '".$resLv['EC']."', '".$resLv['Month']."', '".$resLv['Year']."', '".$resLv['OpeningCL']."', '".$resLv['OpeningSL']."', '".$resLv['OpeningPL']."', '".$resLv['OpeningEL']."', '".$resLv['OpeningOL']."', '".$resLv['OpeningML']."', '".$resLv['CreditedCL']."', '".$resLv['CreditedSL']."', '".$resLv['CreditedPL']."', '".$resLv['CreditedEL']."', '".$resLv['CreditedOL']."', '".$resLv['CreditedML']."', '".$resLv['TotCL']."', '".$resLv['TotSL']."', '".$resLv['TotPL']."', '".$resLv['TotEL']."', '".$resLv['TotOL']."', '".$resLv['TotML']."', '".$resLv['EnCashCL']."', '".$resLv['EnCashSL']."', '".$resLv['EnCashPL']."', '".$resLv['EnCashEL']."', '".$resLv['EnCashOL']."', '".$resLv['EnCashML']."', '".$resLv['AvailedCL']."', '".$resLv['AvailedSL']."', '".$resLv['AvailedPL']."', '".$resLv['AvailedEL']."', '".$resLv['AvailedOL']."', '".$resLv['AvailedTL']."', '".$resLv['AvailedML']."', '".$resLv['BalanceCL']."', '".$resLv['BalanceSL']."', '".$resLv['BalancePL']."', '".$resLv['BalanceEL']."', '".$resLv['BalanceOL']."', '".$resLv['BalanceML']."', '".$resLv['CreatedBy']."', '".$resLv['CreatedDate']."', '".$resLv['YearId']."', '".$resLv['MonthAtt_TotLeave']."', '".$resLv['MonthAtt_TotOD']."', '".$resLv['MonthAtt_TotHO']."', '".$resLv['MonthAtt_TotPR']."', '".$resLv['MonthAtt_TotAP']."', '".$resLv['MonthAtt_TotWorkDay']."', '".$resLv['MonthAtt_TotPaidDay']."')",$cnn);  
  } 
} 

//Leave Apply
$sChkLvA=mysql_query("select * from hrm_employee_applyleave where Apply_FromDate>='".date("Y-01-01")."' AND EmployeeID=".$_POST['ei'],$cnn); $rChkLvA=mysql_num_rows($sChkLvA);
if($rChkLvA==0)
{ 
  while($resLvA=mysql_fetch_assoc($sqlLvA))
  {
   $insElvA=mysql_query("insert into hrm_employee_applyleave(EmployeeID, Apply_Date, Leave_Type, Apply_FromDate, Apply_ToDate, Apply_TotalDay, Apply_Reason, Apply_ContactNo, Apply_DuringAddress, Apply_SentToApp, Apply_SentToRev, Apply_SentToHOD, SLHodApp, LeaveStatus, LeaveAppStatus, LeaveAppReason, LeaveAppUpDate, LeaveRevStatus, LeaveRevReason , LeaveRevUpDate, LeaveHodStatus, LeaveHodReason, LeaveHodUpDate, ApplyLeave_UpdatedBy, ApplyLeave_UpdatedDate, ApplyLeave_UpdatedYearId, LeaveActionEmp, LeaveActionApp, LeaveActionRev, LeaveActionHod, LeaveEmpCancelStatus, LeaveCancelStatus, LeaveEmpCancelDate, LeaveEmpCancelReason, Partial, PartialComment, UserId, AdminComment) values('".$_POST['ei']."', '".$resLvA['Apply_Date']."', '".$resLvA['Leave_Type']."', '".$resLvA['Apply_FromDate']."', '".$resLvA['Apply_ToDate']."', '".$resLvA['Apply_TotalDay']."', '".$resLvA['Apply_Reason']."', '".$resLvA['Apply_ContactNo']."', '".$resLvA['Apply_DuringAddress']."', '".$resLvA['Apply_SentToApp']."', '".$resLvA['Apply_SentToRev']."', '".$resLvA['Apply_SentToHOD']."', '".$resLvA['SLHodApp']."', '".$resLvA['LeaveStatus']."', '".$resLvA['LeaveAppStatus']."', '".$resLvA['LeaveAppReason']."', '".$resLvA['LeaveAppUpDate']."', '".$resLvA['LeaveRevStatus']."', '".$resLvA['LeaveRevReason ']."', '".$resLvA['LeaveRevUpDate']."', '".$resLvA['LeaveHodStatus']."', '".$resLvA['LeaveHodReason']."', '".$resLvA['LeaveHodUpDate']."', '".$resLvA['ApplyLeave_UpdatedBy']."', '".$resLvA['ApplyLeave_UpdatedDate']."', '".$resLvA['ApplyLeave_UpdatedYearId']."', '".$resLvA['LeaveActionEmp']."', '".$resLvA['LeaveActionApp']."', '".$resLvA['LeaveActionRev']."', '".$resLvA['LeaveActionHod']."', '".$resLvA['LeaveEmpCancelStatus']."', '".$resLvA['LeaveCancelStatus']."', '".$resLvA['LeaveEmpCancelDate']."', '".$resLvA['LeaveEmpCancelReason']."', '".$resLvA['Partial']."', '".$resLvA['PartialComment']."', '".$resLvA['UserId']."', '".$resLvA['AdminComment']."')",$cnn);   
   
  } 
}

  if($insEl)
  { 
   $con2=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
   $db2=mysql_select_db('hrims_movefromvess', $con2);      
   $Du=mysql_query("update hrm_employee set ".$_POST['vi']."=1 where EmployeeID=".$_POST['ei'],$con2); 
   echo '<input type="hidden"  id="ChkVrst" value="1"  />'; 
  } 
  else{ echo '<input type="hidden"  id="ChkVrst" value="0"  />'; } 

	
	 
	} //if($sql)
/******** -------------------------------------------------------------------------------- ********/
/******** -------------------------------------------------------------------------------- ********/ 
	
 
 } //elseif($_POST['vi']=='Mv_l') elseif($_POST['vi']=='Mv_l') elseif($_POST['vi']=='Mv_l')
 
 
 
 elseif($_POST['vi']=='Mv_ct')
 {
 
 
/******** -------------------------------------------------------------------------------- ********/
/******** -------------------------------------------------------------------------------- ********/  
    //Ctc
    $sqlc=mysql_query("select * from hrm_employee_ctc where EmployeeID=".$_POST['ei']." order by CtcId ASC",$con2);
	$sqlel=mysql_query("select * from hrm_employee_eligibility where EmployeeID=".$_POST['ei']." order by EligibilityId ASC",$con2);
	$sqlPs=mysql_query("select * from hrm_employee_monthlypayslip where EmployeeID=".$_POST['ei']." order by MonthlyPaySlipId ASC",$con2);
	if($sqlc OR $sqlel)
	{

//define('HOSTT','97.74.82.92'); define('USERR','hrims_user'); define('PASSS','hrims@192'); define('DATABASEE','hrims');
$cnn=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
//$cnn=mysql_connect('localhost','root','ajaydbajay');
$db=mysql_select_db('hrims', $cnn);

$sChkc=mysql_query("select * from hrm_employee_ctc where EmployeeID=".$_POST['ei'],$cnn); $rChkc=mysql_num_rows($sChkc);
if($rChkc==0)
{ 
  while($resc=mysql_fetch_assoc($sqlc))
  {
   $insEctc=mysql_query("insert into hrm_employee_ctc(EmployeeID, EC, BAS, BAS_Value, STIPEND, STIPEND_Value, INCENTIVE, INCENTIVE_Value, CHILD_EDU_ALL, CHILD_EDU_ALL_Value, MED_REM, MED_REM_Value, LTA, LTA_Value, CONV, CONV_Value, TA_Value, HRA, HRA_Value, VAR_ALL, VAR_ALL_Value, PerformancePay, PerformancePay_value, DA, DA_Value, CAR_ALL, CAR_ALL_Value, Bonus_Month, SPECIAL_ALL, SPECIAL_ALL_Value, INC, INC_Value, LIC, LIC_Value, LOAN, LOAN_Value, TDS, TDS_Value, VPF, VPF_Value, EmpActPf, EmpComActPf, EmpBSActPf, NetMonthSalary, NetMonthSalary_Value, GrossSalary_PostAnualComponent, GrossSalary_PostAnualComponent_Value, BONUS, BONUS_Value, GRATUITY, GRATUITY_Value, MEAL_VO, MEAL_VO_Value, TEL_EXP, TEL_EXP_Value, Tot_GrossMonth, Tot_Gross_Annual, PF_Employee_Contri, PF_Employee_Contri_Value, PF_Employee_Contri_Annul, PF_Employer_Contri, PF_Employer_Contri_Value, PF_Employer_Contri_Annul, Other_Benifit, Mediclaim_Policy, Tot_CTC, EmpAddBenifit_MediInsu, EmpAddBenifit_MediInsu_value, Car_Entitlement, ESCI, AnnualESCI, NPS_Value, BWageId, Status, Remark, CtcCreatedBy, CtcCreatedDate, CtcYearId, SalChangeDate, SystDate) values('".$_POST['ei']."', '".$EC."', '".$resc['BAS']."', '".$resc['BAS_Value']."', '".$resc['STIPEND']."', '".$resc['STIPEND_Value']."', '".$resc['INCENTIVE']."', '".$resc['INCENTIVE_Value']."', '".$resc['CHILD_EDU_ALL']."', '".$resc['CHILD_EDU_ALL_Value']."', '".$resc['MED_REM']."', '".$resc['MED_REM_Value']."', '".$resc['LTA']."', '".$resc['LTA_Value']."', '".$resc['CONV']."', '".$resc['CONV_Value']."', '".$resc['TA_Value']."', '".$resc['HRA']."', '".$resc['HRA_Value']."', '".$resc['VAR_ALL']."', '".$resc['VAR_ALL_Value']."', '".$resc['PerformancePay']."', '".$resc['PerformancePay_value']."', '".$resc['DA']."', '".$resc['DA_Value']."', '".$resc['CAR_ALL']."', '".$resc['CAR_ALL_Value']."', '".$resc['Bonus_Month']."', '".$resc['SPECIAL_ALL']."', '".$resc['SPECIAL_ALL_Value']."', '".$resc['INC']."', '".$resc['INC_Value']."', '".$resc['LIC']."', '".$resc['LIC_Value']."', '".$resc['LOAN']."', '".$resc['LOAN_Value']."', '".$resc['TDS']."', '".$resc['TDS_Value']."', '".$resc['VPF']."', '".$resc['VPF_Value']."', '".$resc['EmpActPf']."', '".$resc['EmpComActPf']."', '".$resc['EmpBSActPf']."', '".$resc['NetMonthSalary']."', '".$resc['NetMonthSalary_Value']."', '".$resc['GrossSalary_PostAnualComponent']."', '".$resc['GrossSalary_PostAnualComponent_Value']."', '".$resc['BONUS']."', '".$resc['BONUS_Value']."', '".$resc['GRATUITY']."', '".$resc['GRATUITY_Value']."', '".$resc['MEAL_VO']."', '".$resc['MEAL_VO_Value']."', '".$resc['TEL_EXP']."', '".$resc['TEL_EXP_Value']."', '".$resc['Tot_GrossMonth']."', '".$resc['Tot_Gross_Annual']."', '".$resc['PF_Employee_Contri']."', '".$resc['PF_Employee_Contri_Value']."', '".$resc['PF_Employee_Contri_Annul']."', '".$resc['PF_Employer_Contri']."', '".$resc['PF_Employer_Contri_Value']."', '".$resc['PF_Employer_Contri_Annul']."', '".$resc['Other_Benifit']."', '".$resc['Mediclaim_Policy']."', '".$resc['Tot_CTC']."', '".$resc['EmpAddBenifit_MediInsu']."', '".$resc['EmpAddBenifit_MediInsu_value']."', '".$resc['Car_Entitlement']."', '".$resc['ESCI']."', '".$resc['AnnualESCI']."', '".$resc['NPS_Value']."', '".$resc['BWageId']."', '".$resc['Status']."', '".$resc['Remark']."', '".$_POST['ui']."', '".$resc['CtcCreatedDate']."', '".$res['CtcYearId']."', '".$resc['SalChangeDate']."', '".date("Y-m-d")."')",$cnn);  
  } 
} 

$sChkel=mysql_query("select * from hrm_employee_eligibility where EmployeeID=".$_POST['ei'],$cnn); $rChkel=mysql_num_rows($sChkel);
if($rChkel==0)
{ 
  while($resel=mysql_fetch_assoc($sqlel))
  {
   $insEel=mysql_query("insert into hrm_employee_eligibility(EmployeeID, EC, Lodging_CategoryA, Lodging_CategoryB, Lodging_CategoryC, DA_Outside_Hq, DA_Inside_Hq, DA_Outside_HqWithNightH, DA_Outside_HqWithOutNightH, Travel_TwoWeeKM, Travel_FourWeeKM, Travel_TwoWeeLimitPerMonth, Travel_TwoWeeLimitPerDay, Travel_FourWeeLimitPerMonth, Travel_FourWeeLimitPerDay, TwoWeeOutSide_Restric, FourWeeOutSide_Restric, Mode_Travel_Outside_Hq, TravelClass_Outside_Hq, Mobile_Exp_Rem, Mobile_Exp_Rem_Rs, Prd, Mobile_Company_Hand, Mobile_Hand_Elig, Mobile_Hand_Elig_Rs, GPSSet, Misc_Expenses, Health_Insurance, Bonus, Gratuity, HelthCheck, FourWElig, CostOfVehicle, WithDriver, AdvanceCom, DateOfEntryPolicy, LessKm, Plan, Other, VehiclePolicy, Status, EligCreatedBy, EligCreatedDate, EligYearId) values('".$_POST['ei']."', '".$EC."', '".$resel['Lodging_CategoryA']."', '".$resel['Lodging_CategoryB']."', '".$resel['Lodging_CategoryC']."', '".$resel['DA_Outside_Hq']."', '".$resel['DA_Inside_Hq']."', '".$resel['DA_Outside_HqWithNightH']."', '".$resel['DA_Outside_HqWithOutNightH']."', '".$resel['Travel_TwoWeeKM']."', '".$resel['Travel_FourWeeKM']."', '".$resel['Travel_TwoWeeLimitPerMonth']."', '".$resel['Travel_TwoWeeLimitPerDay']."', '".$resel['Travel_FourWeeLimitPerMonth']."', '".$resel['Travel_FourWeeLimitPerDay']."', '".$resel['TwoWeeOutSide_Restric']."', '".$resel['FourWeeOutSide_Restric']."', '".$resel['Mode_Travel_Outside_Hq']."', '".$resel['TravelClass_Outside_Hq']."', '".$resel['Mobile_Exp_Rem']."', '".$resel['Mobile_Exp_Rem_Rs']."', '".$resel['Prd']."', '".$resel['Mobile_Company_Hand']."', '".$resel['Mobile_Hand_Elig']."', '".$resel['Mobile_Hand_Elig_Rs']."', '".$resel['GPSSet']."', '".$resel['Misc_Expenses']."', '".$resel['Health_Insurance']."', '".$resel['Bonus']."', '".$resel['Gratuity']."', '".$resel['HelthCheck']."', '".$resel['FourWElig']."', '".$resel['CostOfVehicle']."', '".$resel['WithDriver']."', '".$resel['AdvanceCom']."', '".$resel['DateOfEntryPolicy']."', '".$resel['LessKm']."', '".$resel['Plan']."', '".$resel['Other']."', '".$resel['VehiclePolicy']."', '".$resel['Status']."', '".$_POST['ui']."', '".$resel['EligCreatedDate']."', '".$resel['EligYearId']."')",$cnn);  
  } 
} 


$sChkps=mysql_query("select * from hrm_employee_monthlypayslip where EmployeeID=".$_POST['ei'],$cnn); $rChkps=mysql_num_rows($sChkps);
if($rChkps==0)
{ 
  while($resPs=mysql_fetch_assoc($sqlPs))
  {
   $insPayS=mysql_query("insert into hrm_employee_monthlypayslip(EmployeeID, Month, Year, DepartmentId, DesigId, GradeId, HqId, StateId, TotalDay, PaidDay, Absent, ActualBasic, Basic, Stipend, Hra, Convance, TA, Car_Allowance, Bonus_Month, Special, CEA_Ded, MA_Ded, LTA_Ded, EPF_Employee, EPF_Employer, ESCI_Employee, ESCI_Employer, NPS_Value, EPS_Employee, EPS_Employer, EDLI_Employee, EDLI_Employer, EPF_AdminCharge_Employee, EPF_AdminCharge_Employer, EDLI_AdminCharge_Employee, EDLI_AdminCharge_Employer, Tot_Pf_Employee, Tot_Pf_Employer, Tot_Pf, TDS, Tot_Gross, Tot_Deduct, Tot_NetAmount, Bonus, DA, Arreares, LeaveEncash, Incentive, VariableAdjustment, PerformancePay, PP_Inc, Bonus_Adjustment, CCA, RA, RA_Recover, VarRemburmnt, Arr_Basic, Arr_Hra, Car_Allowance_Arr, Arr_Spl, Arr_Conv, Arr_LvEnCash, Arr_Bonus, Arr_LTARemb, Arr_RA, Arr_PP, Arr_Pf, Arr_Esic, YCea, YMr, YLta, NAP_Allow, VolContrib, Deputation_Allow, DeductAdjmt, RecConAllow, TotalSalary, Status, PaySlipCreatedBy, PaySlipCreatedDate, PaySlipYearId, Ext_paidday, Ext_bas, Ext_hra, Ext_con, Ext_spl, Ext_pf, Ext_esic) values ('".$_POST['ei']."', '".$resPs['Month']."', '".$resPs['Year']."', '".$resPs['DepartmentId']."', '".$resPs['DesigId']."', '".$resPs['GradeId']."', '".$resPs['HqId']."', '".$resPs['StateId']."', '".$resPs['TotalDay']."', '".$resPs['PaidDay']."', '".$resPs['Absent']."', '".$resPs['ActualBasic']."', '".$resPs['Basic']."', '".$resPs['Stipend']."', '".$resPs['Hra']."', '".$resPs['Convance']."', '".$resPs['TA']."', '".$resPs['Car_Allowance']."', '".$resPs['Bonus_Month']."', '".$resPs['Special']."', '".$resPs['CEA_Ded']."', '".$resPs['MA_Ded']."', '".$resPs['LTA_Ded']."', '".$resPs['EPF_Employee']."', '".$resPs['EPF_Employer']."', '".$resPs['ESCI_Employee']."', '".$resPs['ESCI_Employer']."', '".$resPs['NPS_Value']."', '".$resPs['EPS_Employee']."', '".$resPs['EPS_Employer']."', '".$resPs['EDLI_Employee']."', '".$resPs['EDLI_Employer']."', '".$resPs['EPF_AdminCharge_Employee']."', '".$resPs['EPF_AdminCharge_Employer']."', '".$resPs['EDLI_AdminCharge_Employee']."', '".$resPs['EDLI_AdminCharge_Employer']."', '".$resPs['Tot_Pf_Employee']."', '".$resPs['Tot_Pf_Employer']."', '".$resPs['Tot_Pf']."', '".$resPs['TDS']."', '".$resPs['Tot_Gross']."', '".$resPs['Tot_Deduct']."', '".$resPs['Tot_NetAmount']."', '".$resPs['Bonus']."', '".$resPs['DA']."', '".$resPs['Arreares']."', '".$resPs['LeaveEncash']."', '".$resPs['Incentive']."', '".$resPs['VariableAdjustment']."', '".$resPs['PerformancePay']."', '".$resPs['PP_Inc']."', '".$resPs['Bonus_Adjustment']."', '".$resPs['CCA']."', '".$resPs['RA']."', '".$resPs['RA_Recover']."', '".$resPs['VarRemburmnt']."', '".$resPs['Arr_Basic']."', '".$resPs['Arr_Hra']."', '".$resPs['Car_Allowance_Arr']."', '".$resPs['Arr_Spl']."', '".$resPs['Arr_Conv']."', '".$resPs['Arr_LvEnCash']."', '".$resPs['Arr_Bonus']."', '".$resPs['Arr_LTARemb']."', '".$resPs['Arr_RA']."', '".$resPs['Arr_PP']."', '".$resPs['Arr_Pf']."', '".$resPs['Arr_Esic']."', '".$resPs['YCea']."', '".$resPs['YMr']."', '".$resPs['YLta']."', '".$resPs['NAP_Allow']."', '".$resPs['VolContrib']."', '".$resPs['Deputation_Allow']."', '".$resPs['DeductAdjmt']."', '".$resPs['RecConAllow']."', '".$resPs['TotalSalary']."', '".$resPs['Status']."', '".$resPs['PaySlipCreatedBy']."', '".$resPs['PaySlipCreatedDate']."', '".$resPs['PaySlipYearId']."', '".$resPs['Ext_paidday']."', '".$resPs['Ext_bas']."', '".$resPs['Ext_hra']."', '".$resPs['Ext_con']."', '".$resPs['Ext_spl']."', '".$resPs['Ext_pf']."', '".$resPs['Ext_esic']."')",$cnn);  
   
  } 
}


  if($insPayS)
  { 
   $con2=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
   $db2=mysql_select_db('hrims_movefromvess', $con2);
   $Du=mysql_query("update hrm_employee set ".$_POST['vi']."=1 where EmployeeID=".$_POST['ei'],$con2); 
   echo '<input type="hidden"  id="ChkVrst" value="1"  />';  
  } 
  else{ echo '<input type="hidden"  id="ChkVrst" value="0"  />'; } 
	
	 
	} //if($sql)

/******** -------------------------------------------------------------------------------- ********/
/******** -------------------------------------------------------------------------------- ********/ 

	
 
 } //elseif($_POST['vi']=='Mv_ct') elseif($_POST['vi']=='Mv_ct') elseif($_POST['vi']=='Mv_ct')
 
 
 
 elseif($_POST['vi']=='Mv_h')
 {
    //$con2=mysql_connect('localhost','hrims_user','hrims@192');
    //$db2=mysql_select_db('hrims_movefromvess', $con2);
    //History
	//$sqlE=mysql_query("select EmpCode, CompanyId from hrm_employee where EmployeeID=".$_POST['ei'], $con2); 
	//$resE=mysql_fetch_assoc($sqlE); 
	
    $sql=mysql_query("select * from hrm_pms_appraisal_history where EmpCode='".$EC."' AND CompanyId=".$resEc['CompanyId']." order by SalaryChange_Date",$con2);	
	if($sql)
	{

/******** -------------------------------------------------------------------------------- ********/
/******** -------------------------------------------------------------------------------- ********/ 
//define('HOSTT','97.74.82.92'); define('USERR','hrims_user'); define('PASSS','hrims@192'); define('DATABASEE','hrims');
$cnn=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
//$cnn=mysql_connect('localhost','root','ajaydbajay');
$db=mysql_select_db('hrims', $cnn);


$sChk=mysql_query("select * from hrm_pms_appraisal_history where EmpCode='".$EC."' AND CompanyId=1",$cnn); 
$rChk=mysql_num_rows($sChk);
if($rChk==0)
{ 
  while($res=mysql_fetch_assoc($sql))
  {
   //$ECnew='V'.$resE['EmpCode'];
   $insEh=mysql_query("insert into hrm_pms_appraisal_history(EmpPmsId, EmpCode, EmpName, Current_Grade, Proposed_Grade, Department, Current_Designation, Proposed_Designation, SalaryChange_Date, Salary_Basic, Salary_Stipend, Salary_HRA, Salary_CA, Salary_TA, Salary_VA, Car_Allowance, Bonus_Month, Salary_SA, Salary_PI, EmpActPf, EmpComActPf, EmpBSActPf, Industry_Bench_Marking, Previous_GrossSalaryPM, Current_GrossSalaryPM, Proposed_GrossSalaryPM, BonusAnnual_September, Prop_PeInc_GSPM, PropSalary_Correction, TotalProp_GSPM, TotalProp_PerInc_GSPM, ProIncCTC, Percent_ProIncCTC, ProCorrCTC, Percent_ProCorrCTC, Proposed_ActualCTC, VariablePay, TotCtc, IncNetCTC, Percent_IncNetCTC, Score, Rating, CompanyId, Incentive,	IncentiveEff_Date,	HOD_EmployeeID, YearId, SystemDate) values('".$res['EmpPmsId']."', '".$EC."', '".$res['EmpName']."', '".$res['Current_Grade']."', '".$res['Proposed_Grade']."', '".$res['Department']."', '".$res['Current_Designation']."', '".$res['Proposed_Designation']."', '".$res['SalaryChange_Date']."', '".$res['Salary_Basic']."', '".$res['Salary_Stipend']."', '".$res['Salary_HRA']."', '".$res['Salary_CA']."', '".$res['Salary_TA']."', '".$res['Salary_VA']."', '".$res['Car_Allowance']."', '".$res['Bonus_Month']."', '".$res['Salary_SA']."', '".$res['Salary_PI']."', '".$res['EmpActPf']."', '".$res['EmpComActPf']."', '".$res['EmpBSActPf']."', '".$res['Industry_Bench_Marking']."', '".$res['Previous_GrossSalaryPM']."', '".$res['Current_GrossSalaryPM']."', '".$res['Proposed_GrossSalaryPM']."', '".$res['BonusAnnual_September']."', '".$res['Prop_PeInc_GSPM']."', '".$res['PropSalary_Correction']."', '".$res['TotalProp_GSPM']."', '".$res['TotalProp_PerInc_GSPM']."', '".$res['ProIncCTC']."', '".$res['Percent_ProIncCTC']."', '".$res['ProCorrCTC']."', '".$res['Percent_ProCorrCTC']."', '".$res['Proposed_ActualCTC']."', '".$res['VariablePay']."', '".$res['TotCtc']."', '".$res['IncNetCTC']."', '".$res['Percent_IncNetCTC']."', '".$res['Score']."', '".$res['Rating']."', '1', '".$res['Incentive']."', '".$res['IncentiveEff_Date']."', '".$res['HOD_EmployeeID']."', '".$res['YearId']."', '".$res['SystemDate']."')",$cnn);
   
  } 
  
  if($insEh)
  { 
   $con2=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
   $db2=mysql_select_db('hrims_movefromvess', $con2);
   $Du=mysql_query("update hrm_employee set ".$_POST['vi']."=1 where EmployeeID=".$_POST['ei'],$con2); 
   echo '<input type="hidden"  id="ChkVrst" value="1"  />'; 
  } 
  else{ echo '<input type="hidden"  id="ChkVrst" value="0"  />'; } 
  
} 
/******** -------------------------------------------------------------------------------- ********/
/******** -------------------------------------------------------------------------------- ********/

		 
	} //if($sql)
	
 
 } //elseif($_POST['vi']=='Mv_h') elseif($_POST['vi']=='Mv_h') elseif($_POST['vi']=='Mv_h')
 
 elseif($_POST['vi']=='Mv_cp')
 {
    //$con2=mysql_connect('localhost','hrims_user','hrims@192');
    //$db2=mysql_select_db('hrims_movefromvess', $con2);
    //Contact & family
    
    
    $sqlSY=mysql_query("select CurrY from hrm_pms_setting where CompanyId=1 AND Process='KRA'", $con2); 
    $resSY=mysql_fetch_array($sqlSY);
    
    $sql=mysql_query("select * from hrm_employee_checklist cl where cl.EmployeeID=".$_POST['ei'],$con2);	
	if($sql)
	{
	
/******** -------------------------------------------------------------------------------- ********/
/******** -------------------------------------------------------------------------------- ********/ 
//define('HOSTT','97.74.82.92'); define('USERR','hrims_user'); define('PASSS','hrims@192'); define('DATABASEE','hrims');
$cnn=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
//$cnn=mysql_connect('localhost','root','ajaydbajay');
$db=mysql_select_db('hrims', $cnn);

$sChk=mysql_query("select * from hrm_employee_checklist where EmployeeID=".$_POST['ei'],$cnn); $rChk=mysql_num_rows($sChk);
if($rChk==0)
{ 
  while($res=mysql_fetch_assoc($sql))
  {
   $insEck=mysql_query("insert into hrm_employee_checklist(EmployeeID, EC, Particular_PerHisForm, Particular_MedicalDeclForm, Particular_BloodGroupReport, Particular_Photograph, Particular_LetestResume, Particular_InterviewAssSheet, Particular_OfferLetDulySign, Particular_AppointmentDulySign, Particular_Covid19V_Dose1, Particular_Covid19V_Dose2, Edu_10Certificate, Edu_12Certificate, Edu_GCertificate, Edu_PGCertificate, Edu_AnyOtherCertificate, PComDetail_Fresher, PComDetail_Com1, PComDetail_Com2, PComDetail_Com3, PComDetail_Offer_Letter, PComDetail_Appoint_Letter, PComDetail_Appraisal_Letter, PComDetail_Exp_Letter, PComDetail_SalaryAnnexure, PComDetail_LastPaySlip, PComDetail_SalaryCertificate, PComDetail_Relieving_Letter, PComDetail_ResignationAcceptance_Letter, PComDetail_NoDuesCertificate, DeclAndNomin_ProvidentAndPension_Fund, DeclAndNomin_EmpStateInsu, DeclAndNomin_Gratuity, DeclAndNomin_AssestDeclaration_Form, AddProof_ElecBill, AddProof_Domicile, AddProof_VoterID, AddProof_PhoneBill, AddProof_BankPassBook, AddProof_RationCard, AddProof_PassPort, IDProof_License, IDProof_PanCard, IDProof_PassPort, IDProof_VoterId, IDProof_AdharCard, IDProof_CastCerti, CarProgress_ConfirmationAss_Letter, CarProgress_AppraisalLetterAndPMS_Form, CarProgress_Transfer_Letter, CarProgress_DesigGradeRoleChange_Letter, CarProgress_GovtScheme_APY, CarProgress_GovtScheme_PMSBY, CarProgress_GovtScheme_PMJJBY, vehicle_AgreementForm, CreatedBy, CreatedDate) values('".$_POST['ei']."', '".$EC."', '".$res['Particular_PerHisForm']."', '".$res['Particular_MedicalDeclForm']."', '".$res['Particular_BloodGroupReport']."', '".$res['Particular_Photograph']."', '".$res['Particular_LetestResume']."', '".$res['Particular_InterviewAssSheet']."', '".$res['Particular_OfferLetDulySign']."', '".$res['Particular_AppointmentDulySign']."', '".$res['Particular_Covid19V_Dose1']."', '".$res['Particular_Covid19V_Dose2']."', '".$res['Edu_10Certificate']."', '".$res['Edu_12Certificate']."', '".$res['Edu_GCertificate']."', '".$res['Edu_PGCertificate']."', '".$res['Edu_AnyOtherCertificate']."', '".$res['PComDetail_Fresher']."', '".$res['PComDetail_Com1']."', '".$res['PComDetail_Com2']."', '".$res['PComDetail_Com3']."', '".$res['PComDetail_Offer_Letter']."', '".$res['PComDetail_Appoint_Letter']."', '".$res['PComDetail_Appraisal_Letter']."', '".$res['PComDetail_Exp_Letter']."', '".$res['PComDetail_SalaryAnnexure']."', '".$res['PComDetail_LastPaySlip']."', '".$res['PComDetail_SalaryCertificate']."', '".$res['PComDetail_Relieving_Letter']."', '".$res['PComDetail_ResignationAcceptance_Letter']."', '".$res['PComDetail_NoDuesCertificate']."', '".$res['DeclAndNomin_ProvidentAndPension_Fund']."', '".$res['DeclAndNomin_EmpStateInsu']."', '".$res['DeclAndNomin_Gratuity']."', '".$res['DeclAndNomin_AssestDeclaration_Form']."', '".$res['AddProof_ElecBill']."', '".$res['AddProof_Domicile']."', '".$res['AddProof_VoterID']."', '".$res['AddProof_PhoneBill']."', '".$res['AddProof_BankPassBook']."', '".$res['AddProof_RationCard']."', '".$res['AddProof_PassPort']."', '".$res['IDProof_License']."', '".$res['IDProof_PanCard']."', '".$res['IDProof_PassPort']."', '".$res['IDProof_VoterId']."', '".$res['IDProof_AdharCard']."', '".$res['IDProof_CastCerti']."', '".$res['CarProgress_ConfirmationAss_Letter']."', '".$res['CarProgress_AppraisalLetterAndPMS_Form']."', '".$res['CarProgress_Transfer_Letter']."', '".$res['CarProgress_DesigGradeRoleChange_Letter']."', '".$res['CarProgress_GovtScheme_APY']."', '".$res['CarProgress_GovtScheme_PMSBY']."', '".$res['CarProgress_GovtScheme_PMJJBY']."', '".$res['vehicle_AgreementForm']."', '".$_POST['ui']."', '".date("Y-m-d")."')",$cnn);
   
   
   //Photo PMS
   $sqlSYP=mysql_query("select CurrY,NewY from hrm_pms_setting where CompanyId=1 AND Process='PMS'", $cnn); $resSYP=mysql_fetch_array($sqlSYP); 
   
   $inSPhoto = mysql_query("insert into hrm_employee_photo(EmployeeID,EC)values('".$_POST['ei']."', '".$EC."')", $cnn);
   $insPms=mysql_query("insert into hrm_employee_pms(AssessmentYear,CompanyId,EmployeeID,YearId) values('".$resSYP['CurrY']."', 1, '".$_POST['ei']."', '".$resSYP['CurrY']."')", $cnn);
   $insRep = mysql_query("insert into hrm_employee_reporting(EmployeeID)values('".$_POST['ei']."')", $cnn);
   $insRepPms = mysql_query("insert into hrm_employee_reporting_pmskra(EmployeeID)values('".$_POST['ei']."')", $cnn);
   $insLBal = mysql_query("insert into hrm_employee_monthlyleave_balance(EmployeeID,EC,Month,Year)values('".$_POST['ei']."','".$EC."','".date("m")."','".date("Y")."')", $cnn);
   
   
  } 
  
  if($insEck)
  { 
   $con2=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
   $db2=mysql_select_db('hrims_movefromvess', $con2);
   $Du=mysql_query("update hrm_employee set ".$_POST['vi']."=1 where EmployeeID=".$_POST['ei'],$con2); 
   echo '<input type="hidden"  id="ChkVrst" value="1"  />'; 
  } 
  else{ echo '<input type="hidden"  id="ChkVrst" value="0"  />'; } 
  
} 
/******** -------------------------------------------------------------------------------- ********/
/******** -------------------------------------------------------------------------------- ********/	 
	  
	} //if($sql)
	
  
 
 
 } //elseif($_POST['vi']=='Mv_cp')
 
 
 echo '<input type="hidden"  id="ChkVvi" value='.$_POST['vi'].'  />';
 echo '<input type="hidden"  id="ChkVei" value='.$_POST['ei'].'  />';
 echo '<input type="hidden"  id="ChkVvn" value='.$_POST['vn'].'  />';
 
 $con2=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
 $db2=mysql_select_db('hrims_movefromvess', $con2);
 $SckV=mysql_query("select Mv_b, Mv_c, Mv_ed, Mv_ex, Mv_f, Mv_l, Mv_cp, Mv_h from hrm_employee where EmployeeID=".$_POST['ei'],$con2); $RckV=mysql_fetch_assoc($SckV); 
if($RckV['Mv_b']==1 && $RckV['Mv_c']==1 && $RckV['Mv_ed']==1 && $RckV['Mv_ex']==1 && $RckV['Mv_f']==1 && $RckV['Mv_l']==1 && $RckV['Mv_ct']==1 && $RckV['Mv_cp']==1 && $RckV['Mv_h']==1)
{
 echo '<input type="hidden" id="FinalSts" value="1"  />'; 
}
else { echo '<input type="hidden" id="FinalSts" value="0"  />'; }
  
}



elseif($_POST['For']=='FinalDataSubmission' && $_POST['ei']!='' && $_POST['ui']!='')
{
 $con2=mysql_connect('localhost','vnrseed2_hrims','5Az*hcHimJkE');
 $db2=mysql_select_db('hrims_movefromvess', $con2);
 $UpFinal=mysql_query("update hrm_employee set DataMoved_toESS='Y', MovedBy=".$_POST['ui'].", MovedDate='".date("Y-m-d")."' where EmployeeID=".$_POST['ei'],$con2);
 
 if($UpFinal){ echo '<input type="hidden" id="Final_Status" value="1"  />'; }
 else { echo '<input type="hidden" id="Final_Status" value="0"  />'; }
}

?>
