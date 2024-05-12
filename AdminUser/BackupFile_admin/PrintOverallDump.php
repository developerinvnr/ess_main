<?php require_once('../AdminUser/config/config.php'); ?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
.All_40{font-size:11px; height:20px; width:40px;} .All_50{font-size:11px; height:20px; width:50px;} .All_70{font-size:11px; height:20px; width:70px;} .All_80{font-size:11px; height:20px; width:80px;}.All_100{font-size:11px; height:20px; width:100px;} .All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} .All_60{font-size:11px; height:20px; width:60px;}
.All_150{font-size:11px; height:20px; width:150px;}.All_170{font-size:11px; height:20px; width:170px;}.All_180{font-size:11px; height:20px; width:180px;}.All_190{font-size:11px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} .All_450{font-size:11px; height:20px; width:450px;}.All_360{font-size:11px; height:20px; width:350px;}.All_540{font-size:11px; height:20px; width:540px;}.All_400{font-size:11px; height:20px; width:400px;} .All_600{font-size:11px; height:20px; width:600px;}
</style>
<script language="javascript" type="text/javascript">
function Printpage()
 { window.print(); } //window.close();
</script>
</head>
<body class="body">
<?php $CompanyId=$_REQUEST['c']; $YearId=$_REQUEST['y'];
      if($_REQUEST['value']!=20) {  $objQuery = mysql_query("SELECT EmpCode,Fname,Sname,Lname,hrm_employee.EmployeeID,DepartmentId,GradeId,DesigId,Gender,DR,Married,hrm_employee_ctc.*,hrm_employee_eligibility.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_ctc ON hrm_employee.EmployeeID=hrm_employee_ctc.EmployeeID INNER JOIN hrm_employee_eligibility ON hrm_employee.EmployeeID=hrm_employee_eligibility.EmployeeID WHERE hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_ctc.CtcYearId=".$YearId." AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." order by EmpCode ASC", $con); $sqlA=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA);} 
elseif($_REQUEST['value']==20) {$objQuery = mysql_query("SELECT EmpCode,Fname,Sname,Lname,hrm_employee.EmployeeID,DepartmentId,GradeId,DesigId,Gender,DR,Married,hrm_employee_ctc.*,hrm_employee_eligibility.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_ctc ON hrm_employee.EmployeeID=hrm_employee_ctc.EmployeeID INNER JOIN hrm_employee_eligibility ON hrm_employee.EmployeeID=hrm_employee_eligibility.EmployeeID WHERE hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_ctc.CtcYearId=".$YearId." AND hrm_employee.EmployeeID!=223 AND hrm_employee.EmployeeID!=224 order by EmpCode ASC", $con);}
	  		if($objQuery)
		{			
			//*** Get Document Path ***//
			$strPath = realpath(basename(getenv($_SERVER["SCRIPT_NAME"]))); // C:/AppServ/www/myphp

			//*** Excel Document Root ***//
            if($_REQUEST['value']!=20){$dept=$resA['DepartmentCode'];} elseif($_REQUEST['value']==20){$dept='AllDept';}
			$strFileName = "MyXls/HRIMS_Details_".$dept.".xls";
			//$strFileName = "HRIMS_Details_".$dept.".xls";

			//*** Connect to Excel.Application ***//
			//COM.ALLOW_DCOM = true;
			$xlApp = new COM("Excel.Application");
			$xlBook = $xlApp->Workbooks->Add();


			//*** Create Sheet 1 ***//
			$xlBook->Worksheets(1)->Name = $dept."_HRIMS_Details";							
			$xlBook->Worksheets(1)->Select;

			//*** Width & Height (A1:A1) ***//
			$xlApp->ActiveSheet->Range("A1:A1")->ColumnWidth = 6.0;
			$xlApp->ActiveSheet->Range("B1:B1")->ColumnWidth = 10.0;
			$xlApp->ActiveSheet->Range("C1:C1")->ColumnWidth = 30.0;
			$xlApp->ActiveSheet->Range("D1:D1")->ColumnWidth = 5.0;
			$xlApp->ActiveSheet->Range("E1:E1")->ColumnWidth = 20.0;
            $xlApp->ActiveSheet->Range("F1:F1")->ColumnWidth = 20.0;
			$xlApp->ActiveSheet->Range("G1:G1")->ColumnWidth = 30.0;
			$xlApp->ActiveSheet->Range("H1:H1")->ColumnWidth = 12.0;
			$xlApp->ActiveSheet->Range("I1:I1")->ColumnWidth = 12.0;
			$xlApp->ActiveSheet->Range("J1:J1")->ColumnWidth = 12.0;
            $xlApp->ActiveSheet->Range("K1:K1")->ColumnWidth = 12.0;
			$xlApp->ActiveSheet->Range("L1:L1")->ColumnWidth = 12.0;
			$xlApp->ActiveSheet->Range("M1:M1")->ColumnWidth = 12.0;
			$xlApp->ActiveSheet->Range("N1:N1")->ColumnWidth = 12.0;
			$xlApp->ActiveSheet->Range("O1:O1")->ColumnWidth = 12.0;
            $xlApp->ActiveSheet->Range("P1:P1")->ColumnWidth = 12.0;
			$xlApp->ActiveSheet->Range("Q1:Q1")->ColumnWidth = 12.0;
			$xlApp->ActiveSheet->Range("R1:R1")->ColumnWidth = 12.0;
			$xlApp->ActiveSheet->Range("S1:S1")->ColumnWidth = 12.0;
			$xlApp->ActiveSheet->Range("T1:T1")->ColumnWidth = 12.0;
            $xlApp->ActiveSheet->Range("U1:U1")->ColumnWidth = 12.0;
			$xlApp->ActiveSheet->Range("V1:V1")->ColumnWidth = 12.0;
			$xlApp->ActiveSheet->Range("W1:W1")->ColumnWidth = 12.0;
			$xlApp->ActiveSheet->Range("X1:X1")->ColumnWidth = 12.0;
			$xlApp->ActiveSheet->Range("Y1:Y1")->ColumnWidth = 12.0;
            $xlApp->ActiveSheet->Range("Z1:Z1")->ColumnWidth = 12.0;
			$xlApp->ActiveSheet->Range("AA1:AA1")->ColumnWidth = 12.0;
			$xlApp->ActiveSheet->Range("AB1:AB1")->ColumnWidth = 12.0;
			$xlApp->ActiveSheet->Range("AC1:AC1")->ColumnWidth = 12.0;
			$xlApp->ActiveSheet->Range("AD1:AD1")->ColumnWidth = 12.0;
            $xlApp->ActiveSheet->Range("AE1:AE1")->ColumnWidth = 12.0;
			$xlApp->ActiveSheet->Range("AF1:AF1")->ColumnWidth = 12.0;
			$xlApp->ActiveSheet->Range("AG1:AG1")->ColumnWidth = 12.0;
			$xlApp->ActiveSheet->Range("AH1:AH1")->ColumnWidth = 12.0;
			$xlApp->ActiveSheet->Range("AI1:AI1")->ColumnWidth = 12.0;
            $xlApp->ActiveSheet->Range("AJ1:AJ1")->ColumnWidth = 12.0;
			$xlApp->ActiveSheet->Range("AK1:AK1")->ColumnWidth = 12.0;			
			
			//*** Report Title ***//
			$xlApp->ActiveSheet->Range("A1:F1")->BORDERS->Weight = 1;
			$xlApp->ActiveSheet->Range("A1:F1")->MergeCells = True;
			$xlApp->ActiveSheet->Range("A1:F1")->Font->Bold = True;
			$xlApp->ActiveSheet->Range("A1:F1")->Font->Size = 20;
			$xlApp->ActiveSheet->Range("A1:F1")->HorizontalAlignment = -4108;				
			$xlApp->ActiveSheet->Cells(1,1)->Value = $dept."_HRIMS_Details";

			//*** Header ***//				
			$xlApp->ActiveSheet->Cells(3,1)->Value = "No";
			$xlApp->ActiveSheet->Cells(3,1)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,1)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,1)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,1)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells(3,2)->Value = "EmpCode";
			$xlApp->ActiveSheet->Cells(3,2)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,2)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,2)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells(3,2)->BORDERS->Weight = 1;
				
			$xlApp->ActiveSheet->Cells(3,3)->Value = "Name";
			$xlApp->ActiveSheet->Cells(3,3)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,3)->VerticalAlignment = -4108;
			$xlApp->ActiveSheet->Cells(3,3)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,3)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells(3,4)->Value = "Grade";
			$xlApp->ActiveSheet->Cells(3,4)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,4)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,4)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,4)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells(3,5)->Value = "Department";
			$xlApp->ActiveSheet->Cells(3,5)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,5)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,5)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,5)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,6)->Value = "Designation";
			$xlApp->ActiveSheet->Cells(3,6)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,6)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,6)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,6)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,7)->Value = "Reporting";
			$xlApp->ActiveSheet->Cells(3,7)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,7)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,7)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,7)->BORDERS->Weight = 1;
	
            $xlApp->ActiveSheet->Cells(3,8)->Value = "Basic";
			$xlApp->ActiveSheet->Cells(3,8)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,8)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,8)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,8)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,9)->Value = "HRA";
			$xlApp->ActiveSheet->Cells(3,9)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,9)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,9)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,9)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,10)->Value = "CA";
			$xlApp->ActiveSheet->Cells(3,10)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,10)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,10)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,10)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,11)->Value = "SA";
			$xlApp->ActiveSheet->Cells(3,11)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,11)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,11)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,11)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,12)->Value = "Gross Salary";
			$xlApp->ActiveSheet->Cells(3,12)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,12)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,12)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,12)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,13)->Value = "Gross Salary(PAC)";
			$xlApp->ActiveSheet->Cells(3,13)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,13)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,13)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,13)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,14)->Value = "PF Deduction";
			$xlApp->ActiveSheet->Cells(3,14)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,14)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,14)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,14)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,15)->Value = "Net Salary";
			$xlApp->ActiveSheet->Cells(3,15)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,15)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,15)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,15)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,16)->Value = "LTA";
			$xlApp->ActiveSheet->Cells(3,16)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,16)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,16)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,16)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,17)->Value = "MR";
			$xlApp->ActiveSheet->Cells(3,17)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,17)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,17)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,17)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,18)->Value = "CEA";
			$xlApp->ActiveSheet->Cells(3,18)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,18)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,18)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,18)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,19)->Value = "Annual Gross";
			$xlApp->ActiveSheet->Cells(3,19)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,19)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,19)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,19)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,20)->Value = "Employer PF Con.";
			$xlApp->ActiveSheet->Cells(3,20)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,20)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,20)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,20)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,21)->Value = "Bonus";
			$xlApp->ActiveSheet->Cells(3,21)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,21)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,21)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,21)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,22)->Value = "Gratuity";
			$xlApp->ActiveSheet->Cells(3,22)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,22)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,22)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,22)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,23)->Value = "Mediclaim Premium";
			$xlApp->ActiveSheet->Cells(3,23)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,23)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,23)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,23)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,24)->Value = "Annual CTC";
			$xlApp->ActiveSheet->Cells(3,24)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,24)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,24)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,24)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,25)->Value = "Two Wheeler";
			$xlApp->ActiveSheet->Cells(3,25)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,25)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,25)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,25)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,26)->Value = "Four Wheeler";
			$xlApp->ActiveSheet->Cells(3,26)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,26)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,26)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,26)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,27)->Value = "DA Inside HQ";
			$xlApp->ActiveSheet->Cells(3,27)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,27)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,27)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,27)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,28)->Value = "DA OutSite HQ";
			$xlApp->ActiveSheet->Cells(3,28)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,28)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,28)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,28)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,29)->Value = "A Grade";
			$xlApp->ActiveSheet->Cells(3,29)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,29)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,29)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,29)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,30)->Value = "B Grade";
			$xlApp->ActiveSheet->Cells(3,30)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,30)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,30)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,30)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,31)->Value = "C Grade";
			$xlApp->ActiveSheet->Cells(3,31)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,31)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,31)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,31)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,32)->Value = "Mode Of Travel";
			$xlApp->ActiveSheet->Cells(3,32)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,32)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,32)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,32)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,33)->Value = "Travel Class";
			$xlApp->ActiveSheet->Cells(3,33)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,33)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,33)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,33)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,34)->Value = "Telephone PM";
			$xlApp->ActiveSheet->Cells(3,34)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,34)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,34)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,34)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,35)->Value = "HandSet Elig.";
			$xlApp->ActiveSheet->Cells(3,35)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,35)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,35)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,35)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,36)->Value = "Mediclaim Insu.";
			$xlApp->ActiveSheet->Cells(3,36)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,36)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,36)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,36)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells(3,37)->Value = "Rating";
			$xlApp->ActiveSheet->Cells(3,37)->Font->Bold = True;
			$xlApp->ActiveSheet->Cells(3,37)->VerticalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,37)->HorizontalAlignment = -4108; 
			$xlApp->ActiveSheet->Cells(3,37)->BORDERS->Weight = 1;	
			

			//***********//
		
			$intRows = 4;
			$Sno=1; while($objResult = mysql_fetch_array($objQuery))
			{
$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$objResult['GradeId'], $con); $resG=mysql_fetch_assoc($sqlG);
$sqlDe=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$objResult['DepartmentId'], $con); $resDe=mysql_fetch_assoc($sqlDe);	
$sqlD=mysql_query("select DesigName from hrm_designation where DesigId=".$objResult['DesigId'], $con); $resD=mysql_fetch_assoc($sqlD);	
$sqlEm=mysql_query("select Appraiser_EmployeeID,Hod_TotalFinalRating from hrm_employee_pms where AssessmentYear=".$YearId." AND EmployeeID=".$objResult['EmployeeID'], $con); $resEm=mysql_fetch_assoc($sqlEm); $sqlEmApp=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$resEm['Appraiser_EmployeeID'], $con); $resEmApp=mysql_fetch_assoc($sqlEmApp);	  

if($objResult['Travel_TwoWeeKM']>0){$TW=$objResult['Travel_TwoWeeKM']; } else {$TW='NA';}			
if($objResult['Travel_FourWeeKM']>0){$FW=$objResult['Travel_FourWeeKM']; } else {$FW='NA';} 
if($objResult['DA_Outside_HqSal']>0){$DAOHS=$objResult['DA_Outside_HqSal']; }else {$DAOHS='NA';}
if($objResult['DA_Outside_Hq']>0){$DAOH=$objResult['DA_Outside_Hq'];} else {$DAOHS='NA';} 
if($objResult['Mode_Travel_Outside_Hq']!=''){$MTOH=$objResult['Mode_Travel_Outside_Hq'];} else {$MTOH='NA';}
if($objResult['TravelClass_Outside_Hq']!=''){$TCOH=$objResult['TravelClass_Outside_Hq'];} else {$TCOH='NA';}
if($objResult['Mobile_Exp_Rem_Rs']>0){$MER=$objResult['Mobile_Exp_Rem_Rs'];} else {$MER='NA';}
if($objResult['Mobile_Hand_Elig_Rs']>0){$MHE=$objResult['Mobile_Hand_Elig_Rs'];} else {$MHE='NA';}  
			
			//*** Detail ***//
			$xlApp->ActiveSheet->Cells($intRows,1)->Value = $Sno;
			$xlApp->ActiveSheet->Cells($intRows,1)->BORDERS->Weight = 1;
			$xlApp->ActiveSheet->Cells($intRows,1)->HorizontalAlignment = -4108;
			
			$xlApp->ActiveSheet->Cells($intRows,2)->Value = $objResult["EmpCode"];
			$xlApp->ActiveSheet->Cells($intRows,2)->BORDERS->Weight = 1;
			$xlApp->ActiveSheet->Cells($intRows,1)->HorizontalAlignment = -4108;
			
			$xlApp->ActiveSheet->Cells($intRows,3)->Value = $objResult["Fname"].' '.$objResult["Sname"].' '.$objResult["Lname"];
			$xlApp->ActiveSheet->Cells($intRows,3)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells($intRows,4)->Value = $resG['GradeValue'];
			$xlApp->ActiveSheet->Cells($intRows,4)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells($intRows,5)->Value = $resDe['DepartmentCode'];
			$xlApp->ActiveSheet->Cells($intRows,5)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells($intRows,6)->Value = $resD['DesigName'];
			$xlApp->ActiveSheet->Cells($intRows,6)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells($intRows,7)->Value = $resEmApp['Fname'].' '.$resEmApp['Sname'].' '.$resEmApp['Lname'];
			$xlApp->ActiveSheet->Cells($intRows,7)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells($intRows,8)->Value = $objResult["BAS_Value"];
			$xlApp->ActiveSheet->Cells($intRows,10)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,8)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells($intRows,9)->Value = $objResult["HRA_Value"];
			$xlApp->ActiveSheet->Cells($intRows,10)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,9)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells($intRows,10)->Value = $objResult["CONV_Value"];
			$xlApp->ActiveSheet->Cells($intRows,10)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,10)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells($intRows,11)->Value = $objResult["SPECIAL_ALL_Value"];
			$xlApp->ActiveSheet->Cells($intRows,10)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,11)->BORDERS->Weight = 1;
			
            $xlApp->ActiveSheet->Cells($intRows,12)->Value = $objResult["Tot_GrossMonth"];
			$xlApp->ActiveSheet->Cells($intRows,12)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,12)->BORDERS->Weight = 1;
						
			$xlApp->ActiveSheet->Cells($intRows,13)->Value = $objResult["GrossSalary_PostAnualComponent_Value"];
			$xlApp->ActiveSheet->Cells($intRows,10)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,13)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells($intRows,14)->Value = $objResult["PF_Employee_Contri_Value"];
			$xlApp->ActiveSheet->Cells($intRows,10)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,14)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells($intRows,15)->Value = $objResult["NetMonthSalary_Value"];
			$xlApp->ActiveSheet->Cells($intRows,15)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,15)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells($intRows,16)->Value = $objResult["LTA_Value"];
			$xlApp->ActiveSheet->Cells($intRows,10)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,16)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells($intRows,17)->Value = $objResult["MED_REM_Value"];
			$xlApp->ActiveSheet->Cells($intRows,10)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,17)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells($intRows,18)->Value = $objResult["CHILD_EDU_ALL_Value"];
			$xlApp->ActiveSheet->Cells($intRows,10)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,18)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells($intRows,19)->Value = $objResult["Tot_Gross_Annual"];
			$xlApp->ActiveSheet->Cells($intRows,10)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,19)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells($intRows,20)->Value = $objResult["PF_Employer_Contri_Annul"];
			$xlApp->ActiveSheet->Cells($intRows,20)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,20)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells($intRows,21)->Value = $objResult["BONUS_Value"];
			$xlApp->ActiveSheet->Cells($intRows,10)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,21)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells($intRows,22)->Value = $objResult["GRATUITY_Value"];
			$xlApp->ActiveSheet->Cells($intRows,10)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,22)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells($intRows,23)->Value = $objResult["Mediclaim_Policy"];
			$xlApp->ActiveSheet->Cells($intRows,10)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,23)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells($intRows,24)->Value = $objResult["Tot_CTC"];
			$xlApp->ActiveSheet->Cells($intRows,10)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,24)->BORDERS->Weight = 1;
						
			$xlApp->ActiveSheet->Cells($intRows,25)->Value = $TW; 
			$xlApp->ActiveSheet->Cells($intRows,25)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,25)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells($intRows,26)->Value = $FW; 
			$xlApp->ActiveSheet->Cells($intRows,10)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,26)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells($intRows,27)->Value = $DAOHS; 
			$xlApp->ActiveSheet->Cells($intRows,10)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,27)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells($intRows,28)->Value = $DAOH; 
			$xlApp->ActiveSheet->Cells($intRows,10)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,28)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells($intRows,29)->Value = $objResult["Lodging_CategoryA"];
			$xlApp->ActiveSheet->Cells($intRows,10)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,29)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells($intRows,30)->Value = $objResult["Lodging_CategoryB"];
			$xlApp->ActiveSheet->Cells($intRows,30)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,30)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells($intRows,31)->Value = $objResult["Lodging_CategoryC"];
			$xlApp->ActiveSheet->Cells($intRows,10)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,31)->BORDERS->Weight = 1;

            $xlApp->ActiveSheet->Cells($intRows,32)->Value = $MTOH; 
			$xlApp->ActiveSheet->Cells($intRows,10)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,32)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells($intRows,33)->Value = $TCOH; 
			$xlApp->ActiveSheet->Cells($intRows,10)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,33)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells($intRows,34)->Value = $MER; 
			$xlApp->ActiveSheet->Cells($intRows,10)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,34)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells($intRows,35)->Value = $MHE;  
			$xlApp->ActiveSheet->Cells($intRows,35)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,35)->BORDERS->Weight = 1;
			
			$xlApp->ActiveSheet->Cells($intRows,36)->Value = $objResult["Health_Insurance"];
			$xlApp->ActiveSheet->Cells($intRows,10)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,36)->BORDERS->Weight = 1;

			$xlApp->ActiveSheet->Cells($intRows,37)->Value = $resEm["Hod_TotalFinalRating"];
			$xlApp->ActiveSheet->Cells($intRows,37)->HorizontalAlignment = -4108;
			$xlApp->ActiveSheet->Cells($intRows,37)->BORDERS->Weight = 1;
			

			$Sno++; $intRows++; 
			}				
							
			@unlink($strFileName); //*** Delete old files ***//	

			$xlBook->SaveAs($strPath."/".$strFileName); //*** Save to Path ***//
			//$xlBook->SaveAs(realpath($strFileName)); //*** Save to Path ***//

			//*** Close & Quit ***//
			$xlApp->Application->Quit();
			$xlApp = null;
			$xlBook = null;
			$xlSheet1 = null;

		}

			//mysql_close($objConnect);		

?>

<table>
<tr><td>&nbsp;</td></tr>
<?php if($_REQUEST['action']=='Overall') { ?>
<tr>
 <td>
   <table border="1" width="1100">
    <tr>
	  <td colspan="37" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;Employee HRIMS Details :
	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!=20) { $sqlA2=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA2=mysql_fetch_assoc($sqlA2); echo $resA2['DepartmentName']; } else {echo 'All';} ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="Printpage()" style="color:#F9F900; font-size:12px;">Print</a>&nbsp;&nbsp;
	  <a href="<?php echo $strFileName; ?>" style="color:#F9F900; font-size:12px;">Dump Excel</a>
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189">
	   <td style="font-family:Georgia; color:#FFFFFF; font-size:12px; width:50px;" valign="top" align="center"><b>SNo</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:80px;" valign="top" align="center"><b>EmpCode</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:200px;" valign="top" align=""><b>Name</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:50px;" valign="top" align="center"><b>Grade</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:150px;" valign="top" align=""><b>Department</b></td>
	   <td style="font-family:Georgia; color:#FFFFFF; font-size:12px; width:200px;" valign="top" align=""><b>Designation</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:200px;" valign="top" align=""><b>Reporting </b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>Basic</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>HRA</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>CA</b></td>
	   <td style="font-family:Georgia; color:#FFFFFF; font-size:12px; width:100px;" valign="top" align=""><b>SA</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>Gross Salary</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>Gross Salary(PAC)</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>PF Deduction</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>Net Salary</b></td>
	   <td style="font-family:Georgia; color:#FFFFFF; font-size:12px; width:100px;" valign="top" align="center"><b>LTA</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>MR</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>CEA</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>Annual Gross</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>Employer PF Con.</b></td>
	   <td style="font-family:Georgia; color:#FFFFFF; font-size:12px; width:100px;" valign="top" align="center"><b>Bonus</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>Gratuity</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>Mediclaim Premium</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>Annual CTC</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>Two Wheeler </b></td>	   
	   <td style="font-family:Georgia; color:#FFFFFF; font-size:12px; width:100px;" valign="top" align="center"><b>Four Wheeler </b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>DA InsideHQ </b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>DA OutsideHQ</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>A Grade</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>B Grade</b></td>
	   <td style="font-family:Georgia; color:#FFFFFF; font-size:12px; width:100px;" valign="top" align="center"><b>C Grade</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align=""><b>Mode of Travel</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align=""><b>Travel Class</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>Telephone PM </b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>HandSet Elig</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>Mediclaim Insu</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>Rating <?php echo date("Y"); ?></b></td>
	</tr>
<?php if($_REQUEST['value']!=20) {$SqlCtc = mysql_query("SELECT EmpCode,Fname,Sname,Lname,hrm_employee.EmployeeID,DepartmentId,GradeId,DesigId,Gender,DR,Married,hrm_employee_ctc.*,hrm_employee_eligibility.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_ctc ON hrm_employee.EmployeeID=hrm_employee_ctc.EmployeeID INNER JOIN hrm_employee_eligibility ON hrm_employee.EmployeeID=hrm_employee_eligibility.EmployeeID WHERE hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_ctc.CtcYearId=".$YearId." AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." order by EmpCode ASC", $con) or die(mysql_error()); } 
elseif($_REQUEST['value']==20) {$SqlCtc = mysql_query("SELECT EmpCode,Fname,Sname,Lname,hrm_employee.EmployeeID,DepartmentId,GradeId,DesigId,Gender,DR,Married,hrm_employee_ctc.*,hrm_employee_eligibility.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_ctc ON hrm_employee.EmployeeID=hrm_employee_ctc.EmployeeID INNER JOIN hrm_employee_eligibility ON hrm_employee.EmployeeID=hrm_employee_eligibility.EmployeeID WHERE hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_ctc.CtcYearId=".$YearId." AND hrm_employee.EmployeeID!=223 AND hrm_employee.EmployeeID!=224 order by EmpCode ASC", $con) or die(mysql_error());} $Sno=1;  while($ResCtc = mysql_fetch_assoc($SqlCtc)) { ?>  
	   <tr bgcolor="#FFFFFF">
	   <td style="font-family:Georgia; font-size:12px; width:50px;" valign="top" align="center"><?php echo $Sno; ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:80px;" valign="top" align="center"><?php echo $ResCtc['EmpCode']; ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:200px;" valign="top" align=""><?php echo $ResCtc['Fname'].' '.$ResCtc['Sname'].' '.$ResCtc['Lname']; ?></td>
<?php $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResCtc['GradeId'], $con); $resG=mysql_fetch_assoc($sqlG);?>	   
	   <td style="font-family:Georgia; font-size:12px; width:50px;" valign="top" align="center"><?php echo $resG['GradeValue']; ?></td>
<?php $sqlDe=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResCtc['DepartmentId'], $con); $resDe=mysql_fetch_assoc($sqlDe);?>	 	   
	   <td style="font-family:Georgia; font-size:12px; width:150px;" valign="top" align=""><?php echo $resDe['DepartmentCode']; ?></td>
<?php $sqlD=mysql_query("select DesigName from hrm_designation where DesigId=".$ResCtc['DesigId'], $con); $resD=mysql_fetch_assoc($sqlD);?>	 
	   <td style="font-family:Georgia; font-size:12px; width:200px;" valign="top" align=""><?php echo $resD['DesigName']; ?></td>
<?php $sqlEm=mysql_query("select Appraiser_EmployeeID,Hod_TotalFinalRating from hrm_employee_pms where AssessmentYear=".$YearId." AND EmployeeID=".$ResCtc['EmployeeID'], $con); $resEm=mysql_fetch_assoc($sqlEm); $sqlEmApp=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$resEm['Appraiser_EmployeeID'], $con); $resEmApp=mysql_fetch_assoc($sqlEmApp);?>	   
	   <td style="font-family:Georgia; font-size:12px; width:200px;" valign="top" align=""><?php echo $resEmApp['Fname'].' '.$resEmApp['Sname'].' '.$resEmApp['Lname']; ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResCtc['BAS_Value']; ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResCtc['HRA_Value']; ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResCtc['CONV_Value']; ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align=""><?php echo $ResCtc['SPECIAL_ALL_Value']; ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResCtc['Tot_GrossMonth']; ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResCtc['GrossSalary_PostAnualComponent_Value']; ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResCtc['PF_Employee_Contri_Value']; ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResCtc['NetMonthSalary_Value']; ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResCtc['LTA_Value']; ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResCtc['MED_REM_Value']; ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResCtc['CHILD_EDU_ALL_Value']; ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResCtc['Tot_Gross_Annual']; ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResCtc['PF_Employer_Contri_Annul']; ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResCtc['BONUS_Value']; ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResCtc['GRATUITY_Value']; ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResCtc['Mediclaim_Policy']; ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResCtc['Tot_CTC']; ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php if($ResCtc['Travel_TwoWeeKM']>0){echo $ResCtc['Travel_TwoWeeKM']; } else {echo 'NA';}?></td>	   
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php if($ResCtc['Travel_FourWeeKM']>0){ echo $ResCtc['Travel_FourWeeKM']; } else {echo 'NA';}?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php if($ResCtc['DA_Outside_HqSal']>0){echo $ResCtc['DA_Outside_HqSal']; }else {echo 'NA';} ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php if($ResCtc['DA_Outside_Hq']>0){echo $ResCtc['DA_Outside_Hq'];} else {echo 'NA';} ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResCtc['Lodging_CategoryA']; ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResCtc['Lodging_CategoryB']; ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResCtc['Lodging_CategoryC']; ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align=""><?php if($ResCtc['Mode_Travel_Outside_Hq']!=''){echo $ResCtc['Mode_Travel_Outside_Hq'];} else {echo 'NA';} ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align=""><?php if($ResCtc['TravelClass_Outside_Hq']!=''){echo $ResCtc['TravelClass_Outside_Hq'];} else {echo 'NA';} ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php if($ResCtc['Mobile_Exp_Rem_Rs']>0){echo $ResCtc['Mobile_Exp_Rem_Rs'];} else {echo 'NA';} ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php if($ResCtc['Mobile_Hand_Elig_Rs']>0){echo $ResCtc['Mobile_Hand_Elig_Rs'];} else {echo 'NA';} ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResCtc['Health_Insurance']; ?></td>
	   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><?php echo $resEm['Hod_TotalFinalRating']; ?></td>
	</tr>
<?php $Sno++; } ?>

   </table>
 </td>
</tr> 
<?php } ?>

</table>  
 
</body>
</html>

