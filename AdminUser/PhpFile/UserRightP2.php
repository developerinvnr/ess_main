<?php 
if(isset($_POST['MenuCheck']))
{   $Uid=$_POST['Uid'];
    $SqlUpdateMaster = mysql_query("UPDATE hrm_user_menu SET master='".$_POST['MasterCheck']."', processing='".$_POST['ProCheck']."', report='".$_POST['ReportCheck']."', utility='".$_POST['UtilCheck']."', pms='".$_POST['PMSCheck']."', recruitment='".$_POST['RecruitCheck']."', separation='".$_POST['SeparCheck']."', tds='".$_POST['TDSCheck']."' WHERE AXAUESRUser_Id=".$_POST['Uid'], $con) or die(mysql_error());  if($SqlUpdateMaster){ $msg = "Menu data has been updated successfully..."; }}
	

if(isset($_POST['SubMenuMaster']))
{   $Uid=$_POST['Uid'];
    $SqlUpdateMaster = mysql_query("UPDATE hrm_user_submenu SET Mas_ComMaster_Basic='".$_POST['Basic']."', Mas_ComMaster_Statutory='".$_POST['Statutory']."',	Mas_ComMaster_Vendors='".$_POST['Vendors']."', Mas_DetailMand_Dept='".$_POST['Dept']."', Mas_DetailMand_HQ='".$_POST['HQ']."', Mas_DetailMand_Grade='".$_POST['Grade']."',  Mas_DetailMand_Desig='".$_POST['Desig']."', Mas_DetailMand_DeptGradeDesig='".$_POST['DeptGradeDesig']."', Mas_DetailMand_DesigGrade='".$_POST['DesigGrade']."', Mas_DetailMand_CityClass='".$_POST['CityClass']."',	Mas_DetailMand_CostCenter='".$_POST['CostCenter']."', Mas_DetailMice_Category='".$_POST['Category']."', Mas_DetailMice_Section='".$_POST['Section']."', Mas_DetailMice_CounStatCity='".$_POST['CounStatCity']."', Mas_DetailElig_LodEntitle='".$_POST['LodEntitle']."', Mas_DetailElig_TravelEntitle='".$_POST['TravelEntitle']."', Mas_DetailElig_TravelElig='".$_POST['TravelElig']."', Mas_DetailElig_DailyAllow='".$_POST['DailyAllow']."', Mas_PayCompo='".$_POST['PayCompo']."', Mas_Leave='".$_POST['Leave']."', Mas_Holiday='".$_POST['Holiday']."', Mas_EmpMasters='".$_POST['EmpMasters']."', Mas_SalaryMasters='".$_POST['SalaryMasters']."', Mas_Thought='".$_POST['Thought']."', Mas_NewCompany='".$_POST['NewCompany']."' WHERE AXAUESRUser_Id=".$_POST['Uid'], $con) or die(mysql_error());  
	if($SqlUpdateMaster){ $msg = "Master SubMenu has been updated successfully..."; }}
	
	
if(isset($_POST['SubMenuProcessing']))
{   $Uid=$_POST['Uid'];
    $SqlUpdateProcessing = mysql_query("UPDATE hrm_user_submenu SET Pro_AddAttLeave='".$_POST['AddAttLeave']."',  Pro_ApprovedLeave='".$_POST['ApprovedLeave']."', Pro_PendingLeave='".$_POST['PendingLeave']."', Pro_AttReport='".$_POST['AttReport']."', Pro_Monthly_tranDay='".$_POST['tranDay']."', Pro_Monthly_tranLumpsum='".$_POST['tranLumpsum']."', Pro_Monthly_Processing='".$_POST['Processing']."', Pro_Monthly_ArrearsCalcu='".$_POST['ArrearsCalcu']."', Pro_Monthly_CloseMonth='".$_POST['CloseMonth']."' WHERE AXAUESRUser_Id=".$_POST['Uid'], $con) or die(mysql_error());  
	if($SqlUpdateProcessing){ $msg = "Processing SubMenu has been updated successfully..."; }}
	
	
if(isset($_POST['SubMenuUtility']))
{   $Uid=$_POST['Uid'];
    $SqlUpdateUtility = mysql_query("UPDATE hrm_user_submenu SET Util_MasterAdmin='".$_POST['MasterAdmin']."', Util_UserRight='".$_POST['UserRight']."', Util_ChangePwd='".$_POST['ChangePwd']."', Util_UpdateNotification='".$_POST['UpdateNotification']."', Util_ImportEmpIncrement='".$_POST['ImportEmpIncrement']."', Util_SendMail_PaySlip='".$_POST['PaySlip']."', Util_SendMail_ReimbPayslip='".$_POST['ReimbPayslip']."', Util_CustomizePayslip='".$_POST['CustomizePayslip']."', Util_Query='".$_POST['Query']."', Util_FinalQReport='".$_POST['FinalQReport']."' WHERE AXAUESRUser_Id=".$_POST['Uid'], $con) or die(mysql_error());  
	if($SqlUpdateUtility){ $msg = "Utility SubMenu has been updated successfully..."; }} 
	
	
if(isset($_POST['SubMenuPMS']))
{   $Uid=$_POST['Uid'];
    $SqlUpdatePMS = mysql_query("UPDATE hrm_user_submenu SET PMS_KRA='".$_POST['KRA']."', PMS_DeptKRA='".$_POST['DeptKRA']."', PMS_WeightageForKRA='".$_POST['WeightageForKRA']."', PMS_FormB='".$_POST['FormB']."', PMS_GradeFormB='".$_POST['GradeFormB']."', PMS_FeedBack='".$_POST['FeedBack']."', PMS_SelectAppRev='".$_POST['SelectAppRev']."', PMS_AssAppReviewer='".$_POST['AssAppReviewer']."', PMS_StatusReportDept='".$_POST['StatusReportDept']."', PMS_RatingGraph='".$_POST['RatingGraph']."', PMS_Rating='".$_POST['Rating']."', PMS_NormalRatDistri='".$_POST['NormalRatDistri']."', PMS_IncDistri='".$_POST['IncDistri']."', PMS_Percentage='".$_POST['Percentage']."',  PMS_Schedule='".$_POST['Schedule']."', PMS_Report='".$_POST['Report']."' WHERE AXAUESRUser_Id=".$_POST['Uid'], $con) or die(mysql_error());  
	if($SqlUpdatePMS){ $msg = "PMS SubMenu has been updated successfully..."; }}
	
	
	
	
	
	
	
if(isset($_POST['SubMenuRecruit']))
{   $Uid=$_POST['Uid'];
    $SqlUpdateRecruit = mysql_query("UPDATE hrm_user_submenu SET Recruit_aa='".$_POST['aa']."', Recruit_bb='".$_POST['bb']."', Recruit_cc='".$_POST['cc']."', Recruit_dd='".$_POST['dd']."', Recruit_ee='".$_POST['ee']."' WHERE AXAUESRUser_Id=".$_POST['Uid'], $con) or die(mysql_error());  
	if($SqlUpdateRecruit){ $msg = "Recruitment SubMenu has been updated successfully..."; }}
	
	
if(isset($_POST['SubMenuSepar']))
{   $Uid=$_POST['Uid'];
    $SqlUpdateSepar = mysql_query("UPDATE hrm_user_submenu SET Separ_Resig_AwaitAct_PendingResig='".$_POST['PendingResig']."', Separ_Resig_AwaitAct_PendingClear='".$_POST['PendingClear']."', Separ_Resig_AwaitAct_FF_Settle='".$_POST['FF_Settle']."', Separ_Termination='".$_POST['Termination']."', Separ_Absconding='".$_POST['Absconding']."' WHERE AXAUESRUser_Id=".$_POST['Uid'], $con) or die(mysql_error());  
	if($SqlUpdateSepar){ $msg = "Separation SubMenu has been updated successfully..."; }}
	
	
if(isset($_POST['SubMenuReport']))
{   $Uid=$_POST['Uid'];
    $SqlUpdateReport = mysql_query("UPDATE hrm_user_submenu SET Report_CTC='".$_POST['CTC']."', Report_AnnualSalary_Report='".$_POST['AnnualSalary_Report']."', Report_EmpDetail_General='".$_POST['General']."', Report_EmpDetail_Personal='".$_POST['Personal']."', Report_EmpDetail_LangProf='".$_POST['LangProf']."', Report_EmpDetail_Quali='".$_POST['Quali']."', Report_EmpDetail_Contact='".$_POST['Contact']."', Report_EmpDetail_History='".$_POST['History']."', Report_EmpDetail_Exp='".$_POST['Exp']."', Report_EmpDetail_Family='".$_POST['Family']."', Report_EmpDetail_Elig='".$_POST['Elig']."', Report_EmpDetail_All='".$_POST['All']."', Report_AttLeave_MonthlyAtt='".$_POST['MonthlyAtt']."', Report_AttLeave_YearlyAtt='".$_POST['YearlyAtt']."', Report_AttLeave_Leave='".$_POST['Leave']."', Report_PF_Form3A='".$_POST['Form3A']."', Report_PF_Form6A='".$_POST['Form6A']."', Report_PF_Form12A='".$_POST['Form12A']."', Report_Mand_Dept='".$_POST['Dept']."', Report_Mand_HQ='".$_POST['HQ']."', Report_Mand_Grade='".$_POST['Grade']."', Report_Mand_Desig='".$_POST['Desig']."', Report_Mand_CityClass='".$_POST['CityClass']."', Report_Mand_CostCenter='".$_POST['CostCenter']."', Report_Mice_Category='".$_POST['Category']."', Report_Mice_Section='".$_POST['Section']."', Report_Bonus='".$_POST['Bonus']."', Report_Arrears='".$_POST['Arrears']."', Report_StatutoryPayment='".$_POST['StatutoryPayment']."', Report_FullFinal='".$_POST['FullFinal']."'	WHERE AXAUESRUser_Id=".$_POST['Uid'], $con) or die(mysql_error());  
	if($SqlUpdateReport){ $msg = "Report SubMenu has been updated successfully..."; }}
	
	
if(isset($_POST['SubMenuTDS']))
{   $Uid=$_POST['Uid'];
    $SqlUpdateTDS = mysql_query("UPDATE hrm_user_submenu SET TDS_aa='".$_POST['aa']."', TDS_bb='".$_POST['bb']."', TDS_cc='".$_POST['cc']."', TDS_dd='".$_POST['dd']."', TDS_ee='".$_POST['ee']."' WHERE AXAUESRUser_Id=".$_POST['Uid'], $con) or die(mysql_error());  
	if($SqlUpdateTDS){ $msg = "TDS has been updated successfully..."; }}
?>