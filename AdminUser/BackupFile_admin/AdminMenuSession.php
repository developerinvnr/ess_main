<?php 

if($_SESSION['login'] = true)

{ $YearId=$_SESSION['YearId']; $fromdate=date("Y",strtotime($_SESSION['fromdate'])); $todate=date("Y",strtotime($_SESSION['todate'])); 
  $Status1=$_SESSION['Company1Status']; $Status2=$_SESSION['Company2Status']; $Status3=$_SESSION['Company3Status'];
  $Status4=$_SESSION['Company4Status']; $Status5=$_SESSION['Company5Status']; $Status6=$_SESSION['Company6Status'];
  $UserId=$_SESSION['AXAUESRUserId']; $BasicId=$_SESSION['BasicId']; $CompanyId=$_SESSION['CompanyId'];

  $sql=mysql_query("select hrm_user.*,hrm_user_menu.*,hrm_user_submenu.* from hrm_user INNER JOIN hrm_user_menu ON hrm_user.AXAUESRUser_Id=hrm_user_menu.AXAUESRUser_Id INNER JOIN hrm_user_submenu ON hrm_user_menu.AXAUESRUser_Id=hrm_user_submenu.AXAUESRUser_Id where hrm_user.AXAUESRUser_Id=".$UserId, $con); $row = mysql_fetch_assoc($sql);

  if(mysql_num_rows($sql)==1) 
  {
         //Create SubMenu Session
	 $_SESSION['UserMrMrsMiss']=$row['User_MrMrsMiss'];	$_SESSION['UserPosition']=$row['User_Position'];   
     $_SESSION['UserFirstName']=$row['User_FirstName']; $_SESSION['UserSecondName']=$row['User_SecondName']; $_SESSION['UserLastName']=$row['User_LastName']; $_SESSION['User_Permission']=$row['User_Permission'];
	 $_SESSION['UserName']=$row['User_name']; $_SESSION['UserType']=$row['User_type']; $_SESSION['UserStatus']=$row['User_status']; $_SESSION['Master']=$row['master']; $_SESSION['Processing']=$row['processing']; $_SESSION['Report']=$row['report']; $_SESSION['Utility']=$row['utility']; $_SESSION['Query']=$row['query']; $_SESSION['PMS']=$row['pms']; $_SESSION['Recruitment']=$row['recruitment']; $_SESSION['Separation']=$row['separation']; $_SESSION['TDS']=$row['tds'];   

  
        //Create SubMenu Session
	 $_SESSION['Mas_ComMaster_Basic']=$row['Mas_ComMaster_Basic']; $_SESSION['Mas_ComMaster_Statutory']=$row['Mas_ComMaster_Statutory']; $_SESSION['Mas_ComMaster_Vendors']=$row['Mas_ComMaster_Vendors']; 
     $_SESSION['Mas_DetailMand_Dept']=$row['Mas_DetailMand_Dept']; $_SESSION['Mas_DetailMand_HQ']=$row['Mas_DetailMand_HQ']; $_SESSION['Mas_DetailMand_Grade']=$row['Mas_DetailMand_Grade']; $_SESSION['Mas_DetailMand_Desig']=$row['Mas_DetailMand_Desig']; $_SESSION['Mas_DetailMand_DeptGradeDesig']=$row['Mas_DetailMand_DeptGradeDesig']; $_SESSION['Mas_DetailMand_CityClass']=$row['Mas_DetailMand_CityClass']; $_SESSION['Mas_DetailMand_CostCenter']=$row['Mas_DetailMand_CostCenter']; 
	 $_SESSION['Mas_DetailMand_DesigGrade']=$row['Mas_DetailMand_DesigGrade'];
     $_SESSION['Mas_DetailMice_Category']=$row['Mas_DetailMice_Category'];  $_SESSION['Mas_DetailMice_Section']=$row['Mas_DetailMice_Section']; $_SESSION['Mas_DetailMice_CounStatCity']=$row['Mas_DetailMice_CounStatCity'];
     $_SESSION['Mas_DetailElig_LodEntitle']=$row['Mas_DetailElig_LodEntitle']; $_SESSION['Mas_DetailElig_TravelEntitle']=$row['Mas_DetailElig_TravelEntitle']; $_SESSION['Mas_DetailElig_TravelElig']=$row['Mas_DetailElig_TravelElig']; $_SESSION['Mas_DetailElig_DailyAllow']=$row['Mas_DetailElig_DailyAllow'];
     $_SESSION['Mas_PayCompo']=$row['Mas_PayCompo']; $_SESSION['Mas_Leave']=$row['Mas_Leave'];  $_SESSION['Mas_Holiday']=$row['Mas_Holiday']; $_SESSION['Mas_EmpMasters']=$row['Mas_EmpMasters']; $_SESSION['Mas_SalaryMasters']=$row['Mas_SalaryMasters']; $_SESSION['Mas_Thought']=$row['Mas_Thought']; $_SESSION['Mas_NewCompany']=$row['Mas_NewCompany']; $_SESSION['Mas_Restructuring']=$row['Mas_Restructuring'];

	 
     $_SESSION['Pro_AddAttLeave']=$row['Pro_AddAttLeave']; $_SESSION['Pro_ApprovedLeave']=$row['Pro_ApprovedLeave']; $_SESSION['Pro_PendingLeave']=$row['Pro_PendingLeave'];
  $_SESSION['Pro_AttReport']=$row['Pro_AttReport']; $_SESSION['Pro_PaySlipReport']=$row['Pro_PaySlipReport'];
     $_SESSION['Pro_Monthly_tranDay']=$row['Pro_Monthly_tranDay'];  $_SESSION['Pro_Monthly_tranLumpsum']=$row['Pro_Monthly_tranLumpsum'];  $_SESSION['Pro_Monthly_Processing']=$row['Pro_Monthly_Processing']; $_SESSION['Pro_Monthly_ArrearsCalcu']=$row['Pro_Monthly_ArrearsCalcu'];  $_SESSION['Pro_Monthly_CloseMonth']=$row['Pro_Monthly_CloseMonth'];
$_SESSION['Pro_Training']=$row['Pro_Training']; $_SESSION['Pro_Conference']=$row['Pro_Conference'];

	 
     $_SESSION['Util_MasterAdmin']=$row['Util_MasterAdmin'];  $_SESSION['Util_UserRight']=$row['Util_UserRight'];  $_SESSION['Util_ChangePwd']=$row['Util_ChangePwd'];
     $_SESSION['Util_UpdateNotification']=$row['Util_UpdateNotification']; $_SESSION['Util_ImportEmpIncrement']=$row['Util_ImportEmpIncrement'];
	 $_SESSION['Util_SendMail_PaySlip']=$row['Util_SendMail_PaySlip']; $_SESSION['Util_SendMail_ReimbPayslip']=$row['Util_SendMail_ReimbPayslip'];
     $_SESSION['Util_CustomizePayslip']=$row['Util_CustomizePayslip'];  $_SESSION['Util_EmpProfileStatus']=$row['Util_EmpProfileStatus']; 
	 $_SESSION['Util_ConfLetter']=$row['Util_ConfLetter']; $_SESSION['Util_AssignEmpState']=$row['Util_AssignEmpState']; 
	 $_SESSION['Util_ReportingLeaveQuery']=$row['Util_ReportingLeaveQuery']; $_SESSION['Util_ReportingPmsKra']=$row['Util_ReportingPmsKra'];
 $_SESSION['Util_AssignEmpPaySlip']=$row['Util_AssignEmpPaySlip']; $_SESSION['Util_Backup']=$row['Util_Backup'];
	 
	 
	 $_SESSION['Query_Sub']=$row['Query_Sub']; $_SESSION['Query_Owner']=$row['Query_Owner']; $_SESSION['Query_Assign']=$row['Query_Assign'];
	 $_SESSION['Query_Pending']=$row['Query_Pending']; $_SESSION['Query_Answer']=$row['Query_Answer']; $_SESSION['Query_Closed']=$row['Query_Closed'];
	 $_SESSION['Query_Report']=$row['Query_Report']; $_SESSION['Query_Log']=$row['Query_Log']; $_SESSION['Query_MailTo']=$row['Query_MailTo']; 

	 

	 $_SESSION['PMS_KRA']=$row['PMS_KRA']; $_SESSION['PMS_DeptKRA']=$row['PMS_DeptKRA']; $_SESSION['PMS_WeightageForKRA']=$row['PMS_WeightageForKRA']; 
     $_SESSION['PMS_EditKRA']=$row['PMS_EditKRA'];
	 $_SESSION['PMS_FormB']=$row['PMS_FormB']; $_SESSION['PMS_GradeFormB']=$row['PMS_GradeFormB']; $_SESSION['PMS_KRAStatus']=$row['PMS_KRAStatus'];
	 $_SESSION['PMS_FeedBack']=$row['PMS_FeedBack']; $_SESSION['PMS_SelectAppRev']=$row['PMS_SelectAppRev']; $_SESSION['PMS_AssAppReviewer']=$row['PMS_AssAppReviewer'];  $_SESSION['PMS_StatusReportDept']=$row['PMS_StatusReportDept']; $_SESSION['PMS_EditHR']=$row['PMS_EditHR']; $_SESSION['PMS_RatingGraph']=$row['PMS_RatingGraph']; 
	 $_SESSION['PMS_Rating']=$row['PMS_Rating']; $_SESSION['PMS_NormalRatDistri']=$row['PMS_NormalRatDistri']; 
	 $_SESSION['PMS_IncDistri']=$row['PMS_IncDistri']; $_SESSION['PMS_Percentage']=$row['PMS_Percentage'];  $_SESSION['PMS_Schedule']=$row['PMS_Schedule'];
	 $_SESSION['PMS_OpenCloseMenu']=$row['PMS_OpenCloseMenu']; $_SESSION['PMS_Report']=$row['PMS_Report'];

     
	 $_SESSION['Recruit_aa']=$row['Recruit_aa']; $_SESSION['Recruit_bb']=$row['Recruit_bb']; $_SESSION['Recruit_cc']=$row['Recruit_cc']; $_SESSION['Recruit_dd']=$row['Recruit_dd']; $_SESSION['Recruit_ee']=$row['Recruit_ee'];

    
	 $_SESSION['Separ_Resig_AwaitAct_PendingResig']=$row['Separ_Resig_AwaitAct_PendingResig']; $_SESSION['Separ_Resig_AwaitAct_PendingClear']=$row['Separ_Resig_AwaitAct_PendingClear']; $_SESSION['Separ_Resig_AwaitAct_FF_Settle']=$row['Separ_Resig_AwaitAct_FF_Settle'];
     $_SESSION['Separ_Termination']=$row['Separ_Termination']; $_SESSION['Separ_Absconding']=$row['Separ_Absconding'];

   

     $_SESSION['Report_CTC']=$row['Report_CTC']; $_SESSION['Report_AnnualSalary_Report']=$row['Report_AnnualSalary_Report'];
     $_SESSION['Report_EmpDetail_General']=$row['Report_EmpDetail_General']; $_SESSION['Report_EmpDetail_Personal']=$row['Report_EmpDetail_Personal']; $_SESSION['Report_EmpDetail_LangProf']=$row['Report_EmpDetail_LangProf']; $_SESSION['Report_EmpDetail_Quali']=$row['Report_EmpDetail_Quali']; $_SESSION['Report_EmpDetail_Contact']=$row['Report_EmpDetail_Contact']; $_SESSION['Report_EmpDetail_History']=$row['Report_EmpDetail_History']; $_SESSION['Report_EmpDetail_Exp']=$row['Report_EmpDetail_Exp']; $_SESSION['Report_EmpDetail_Family']=$row['Report_EmpDetail_Family']; $_SESSION['Report_EmpDetail_Elig']=$row['Report_EmpDetail_Elig']; $_SESSION['Report_EmpDetail_All']=$row['Report_EmpDetail_All'];

     $_SESSION['Report_AttLeave_MonthlyAtt']=$row['Report_AttLeave_MonthlyAtt']; $_SESSION['Report_AttLeave_YearlyAtt']=$row['Report_AttLeave_YearlyAtt']; $_SESSION['Report_AttLeave_Leave']=$row['Report_AttLeave_Leave'];
     $_SESSION['Report_PF_Form3A']=$row['Report_PF_Form3A']; $_SESSION['Report_PF_Form6A']=$row['Report_PF_Form6A']; $_SESSION['Report_PF_Form12A']=$row['Report_PF_Form12A'];  $_SESSION['Report_PF_Form3A']=$row['Report_PF_Form3A'];
     $_SESSION['Report_Mand_Dept']=$row['Report_Mand_Dept']; $_SESSION['Report_Mand_HQ']=$row['Report_Mand_HQ']; $_SESSION['Report_Mand_Grade']=$row['Report_Mand_Grade']; $_SESSION['Report_Mand_Desig']=$row['Report_Mand_Desig']; $_SESSION['Report_Mand_CityClass']=$row['Report_Mand_CityClass']; $_SESSION['Report_Mand_CostCenter']=$row['Report_Mand_CostCenter'];
     $_SESSION['Report_Mice_Category']=$row['Report_Mice_Category']; $_SESSION['Report_Mice_Section']=$row['Report_Mice_Section']; $_SESSION['Report_Bonus']=$row['Report_Bonus']; $_SESSION['Report_Arrears']=$row['Report_Arrears']; $_SESSION['Report_StatutoryPayment']=$row['Report_StatutoryPayment']; $_SESSION['Report_FullFinal']=$row['Report_FullFinal'];

   

     $_SESSION['TDS_aa']=$row['TDS_aa']; $_SESSION['TDS_bb']=$row['TDS_bb'];  $_SESSION['TDS_cc']=$row['TDS_cc']; $_SESSION['TDS_dd']=$row['TDS_dd']; $_SESSION['TDS_ee']=$row['TDS_ee'];
     $_SESSION['Other']=$row['Other'];

  

  }

}
else{header('Location:../index.php');} 

?>