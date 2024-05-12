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
 { window.print(); window.close(); }
</script>
</head>
<body class="body">
<?php $CompanyId=$_REQUEST['ComId']; 
      $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); 
	  //$strSQL = "SELECT * from hrm_pms_kra WHERE KRAStatus='A' AND CompanyId=".$CompanyId." AND YearId=".$YearId." AND DepartmentId=".$_REQUEST['value'];
	  $objQuery = mysql_query("SELECT * from hrm_pms_kra WHERE KRAStatus='A' AND CompanyId=".$CompanyId." AND YearId=".$YearId." AND DepartmentId=".$_REQUEST['value'], $con);
	  if($objQuery)
	  {			
		//*** Get Document Path ***//
		$strPath = realpath(basename(getenv($_SERVER["SCRIPT_NAME"]))); // C:/AppServ/www/myphp
		//*** Excel Document Root ***//
		$strFileName = "MyXls/EmpDetails_".$resA['DepartmentName'].".xls";
		//$strFileName = "KRA_".$resA['DepartmentName'].".xls";
		//*** Connect to Excel.Application ***//
        //$xlApp = new ("Excel.Application");  //$xlApp =  "vnd.ms-excel"; 
		//$xlBook = $xlApp->Workbooks->Add();
		//*** Connect to Excel.Application ***//
		//$xlApp = new COM("Excel.Application");  //$xlApp =  "vnd.ms-excel"; //$book = $xlsObj->ActiveWorkbook; 
		$xlApp = new COM("Excel.application") or Die ("Did not connect");
        $xlApp->DisplayAlerts = false;
		$xlBook = $xlApp->Workbooks->Add();
		//$xlApp->Workbooks->Open($xlsFile);
		//*** Create Sheet 1 ***//
		$xlBook->Worksheets(1)->Name = $resA['DepartmentName']."_EmpDetails";							
        $xlBook->Worksheets(1)->Select;
		//*** Width & Height (A1:A1) ***//
		$xlApp->ActiveSheet->Range("A1:A1")->ColumnWidth = 6.0;
        $xlApp->ActiveSheet->Range("B1:B1")->ColumnWidth = 50.0;
		$xlApp->ActiveSheet->Range("C1:C1")->ColumnWidth = 100.0;
        $xlApp->ActiveSheet->Range("D1:D1")->ColumnWidth = 15.0;
        $xlApp->ActiveSheet->Range("E1:E1")->ColumnWidth = 10.0;
		//*** Report Title ***//
		$xlApp->ActiveSheet->Range("A1:F1")->BORDERS->Weight = 1;
        $xlApp->ActiveSheet->Range("A1:F1")->MergeCells = True;
        $xlApp->ActiveSheet->Range("A1:F1")->Font->Bold = True;
        $xlApp->ActiveSheet->Range("A1:F1")->Font->Size = 20;
        $xlApp->ActiveSheet->Range("A1:F1")->HorizontalAlignment = -4108;				
		$xlApp->ActiveSheet->Cells(1,1)->Value = $resA['DepartmentName']."_KRA";
		//*** Header ***//				
		$xlApp->ActiveSheet->Cells(3,1)->Value = "No";
		$xlApp->ActiveSheet->Cells(3,1)->Font->Bold = True;
		$xlApp->ActiveSheet->Cells(3,1)->VerticalAlignment = -4108; 
		$xlApp->ActiveSheet->Cells(3,1)->HorizontalAlignment = -4108; 
		$xlApp->ActiveSheet->Cells(3,1)->BORDERS->Weight = 1;

		$xlApp->ActiveSheet->Cells(3,2)->Value = "KRA";
		$xlApp->ActiveSheet->Cells(3,2)->Font->Bold = True;
		$xlApp->ActiveSheet->Cells(3,2)->VerticalAlignment = -4108; 
		$xlApp->ActiveSheet->Cells(3,2)->HorizontalAlignment = -4108;
		$xlApp->ActiveSheet->Cells(3,2)->BORDERS->Weight = 1;

		$xlApp->ActiveSheet->Cells(3,3)->Value = "Description";
		$xlApp->ActiveSheet->Cells(3,3)->Font->Bold = True;
		$xlApp->ActiveSheet->Cells(3,3)->VerticalAlignment = -4108;
		$xlApp->ActiveSheet->Cells(3,3)->HorizontalAlignment = -4108; 
		$xlApp->ActiveSheet->Cells(3,3)->BORDERS->Weight = 1;

		$xlApp->ActiveSheet->Cells(3,4)->Value = "Measure";
		$xlApp->ActiveSheet->Cells(3,4)->Font->Bold = True;
		$xlApp->ActiveSheet->Cells(3,4)->VerticalAlignment = -4108; 
		$xlApp->ActiveSheet->Cells(3,4)->HorizontalAlignment = -4108; 
		$xlApp->ActiveSheet->Cells(3,4)->BORDERS->Weight = 1;

		$xlApp->ActiveSheet->Cells(3,5)->Value = "Unit";
		$xlApp->ActiveSheet->Cells(3,5)->Font->Bold = True;
		$xlApp->ActiveSheet->Cells(3,5)->VerticalAlignment = -4108; 
		$xlApp->ActiveSheet->Cells(3,5)->HorizontalAlignment = -4108; 
		$xlApp->ActiveSheet->Cells(3,5)->BORDERS->Weight = 1;
        //***********//

		$intRows = 4;
        $Sno=1; while($objResult = mysql_fetch_array($objQuery))
        {
	    //*** Detail ***//
		$xlApp->ActiveSheet->Cells($intRows,1)->Value = $Sno;
		$xlApp->ActiveSheet->Cells($intRows,1)->BORDERS->Weight = 1;
		$xlApp->ActiveSheet->Cells($intRows,1)->HorizontalAlignment = -4108;
		$xlApp->ActiveSheet->Cells($intRows,2)->Value = $objResult["KRA"];
		$xlApp->ActiveSheet->Cells($intRows,2)->BORDERS->Weight = 1;
		$xlApp->ActiveSheet->Cells($intRows,3)->Value = $objResult["KRA_Description"];
		$xlApp->ActiveSheet->Cells($intRows,3)->BORDERS->Weight = 1;
		$xlApp->ActiveSheet->Cells($intRows,4)->Value = $objResult["Measure"];
		$xlApp->ActiveSheet->Cells($intRows,4)->HorizontalAlignment = -4108;
		$xlApp->ActiveSheet->Cells($intRows,4)->BORDERS->Weight = 1;
		$xlApp->ActiveSheet->Cells($intRows,5)->Value = $objResult["Unit"];
		$xlApp->ActiveSheet->Cells($intRows,5)->BORDERS->Weight = 1;
		$xlApp->ActiveSheet->Cells($intRows,5)->NumberFormat = "$#,##0.00";
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
<?php if($_REQUEST['action']=='DeptAll') { $CompanyId=$_REQUEST['c']; $YearId=$_REQUEST['y']; ?>
<tr>
 <td>
   <table border="1" width="8500">
     <tr>
<?php if($_REQUEST['value']!='All') {$sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); } ?>	 
	  <td colspan="120" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;Employee All Details :
	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All') {echo $resA['DepartmentName']; } else {echo 'All';} ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="Printpage('<?php echo $_REQUEST['value']; ?>')" style="color:#F9F900; font-size:12px;"></a>
	  <a href="<?php echo $strFileName; ?>" style="color:#F9F900; font-size:12px;">Dump Excel</a>
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189">
	 <td colspan="<?php if($_REQUEST['value']!='All') { echo '16'; } else {echo '17';} ?>" align="center" style="color:#FFFFFF;font-size:11px;" class="All_100"><b>General</b></td>
	 <td colspan="4" align="center" style="color:#FFFFFF;font-size:11px;"><b>Bank</b></td>
	 <td colspan="2" align="center" style="color:#FFFFFF;font-size:11px;"><b></b></td>
	 <td colspan="4" align="center" style="color:#FFFFFF;font-size:11px;"><b>Reporting</b></td>
	 <td colspan="15" align="center" style="color:#FFFFFF;font-size:11px;"><b>Personal</b></td>
	 <td colspan="4" align="center" style="color:#FFFFFF;font-size:11px;"><b>Current</b></td>
	 <td colspan="4" align="center" style="color:#FFFFFF;font-size:11px;"><b>Parmanent</b></td>
	 <td colspan="4" align="center" style="color:#FFFFFF;font-size:11px;"><b>Emergency</b></td>
	 <td colspan="4" align="center" style="color:#FFFFFF;font-size:11px;"><b>Referance(Personal)</b></td>
	 <td colspan="5" align="center" style="color:#FFFFFF;font-size:11px;"><b>Referance(Professional)</b></td>
	 <td colspan="12" align="center" style="color:#FFFFFF;font-size:11px;"><b>Family</b></td>
	 <td colspan="21" align="center" style="color:#FFFFFF;font-size:11px;"><b>Cost To Company</b></td>
	 <td colspan="15" align="center" style="color:#FFFFFF;font-size:11px;"><b>Eligibility</b></td>
	 </tr>
 <tr bgcolor="#7a6189">
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>SNo.</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>EC</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>
<?php if($_REQUEST['value']=='All'){ ?><td align="center" style="color:#FFFFFF;" class="All_100"><b>Department</b></td><?php } ?>
   <td align="center" style="color:#FFFFFF;" class="All_150"><b>Designation</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_40"><b>Grade</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_60"><b>FileNo</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>DOJ</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>DOC</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>DOB</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>Age</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>CostCenter</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>HQ</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Mobile</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Email-ID</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Pre Exp</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>VNR Exp</b></td>
	
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Name</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>A/C No</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Branch</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Address</b></td>
	
	<td align="center" style="color:#FFFFFF;" class="All_120"><b>Insu. No</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_120"><b>PF No</b></td>
	
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Name </b></td>
	<td align="center" style="color:#FFFFFF;" class="All_120"><b>Designation</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>EmailID</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>Contact</b></td>
	
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Gender</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Blood Group</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Sr Citizen</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Metro City</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Mobile</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Email_ID</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>PanCard</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Passport</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>ValidTo</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>ValidFrom</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Driving Lic</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>ValidTo</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>ValidFrom</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Marital Status</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>Married Date</b></td>
	
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Address</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>State</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>City</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>PinNo</b></td>
	
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Address</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>State</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>City</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>PinNo</b></td>
	
	<td align="center" style="color:#FFFFFF;" class="All_120"><b>Name</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>Contact</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Relation</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>EmailId</b></td>
	
	<td align="center" style="color:#FFFFFF;" class="All_120"><b>Name</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>Contact</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Relation</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>EmailId</b></td>
	
	<td align="center" style="color:#FFFFFF;" class="All_120"><b>Name</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>Contact</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>EmailId</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Company</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>Desig</b></td>
	
	<td align="center" style="color:#FFFFFF;" class="All_250"><b>Father Name</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Qualification</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>DOB</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Occupation</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_250"><b>Mother Name</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Qualification</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>DOB</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Occupation</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_250"><b>Spouse Name</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Qualification</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>DOB</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Occupation</b></td>		
	
   <td align="center" style="color:#FFFFFF;" class="All_80"><b>Basic</b></td>
   <td align="center" style="color:#FFFFFF;" class="All_80"><b>Stipend</b></td>	
   <td align="center" style="color:#FFFFFF;" class="All_80"><b>Incentive</b></td>	
   <td align="center" style="color:#FFFFFF;" class="All_80"><b>HRA</b></td>
   <td align="center" style="color:#FFFFFF;" class="All_80"><b>Conveyance</b></td>
   <td align="center" style="color:#FFFFFF;" class="All_80"><b>Special</b></td>
   <td align="center" style="color:#FFFFFF;" class="All_80"><b>Gross Monthly</b></td>
   <td align="center" style="color:#FFFFFF;" class="All_80"><b>Gross Monthly (PAC)</b></td>
   <td align="center" style="color:#FFFFFF;" class="All_80"><b>PF</b></td>	
<td align="center" style="color:#FFFFFF;" class="All_80"><b>ESIC</b></td>	
   <td align="center" style="color:#FFFFFF;" class="All_80"><b>Net Monthaly</b></td>
   <td align="center" style="color:#FFFFFF;" class="All_80"><b>Medical Reim.</b></td>	
   <td align="center" style="color:#FFFFFF;" class="All_80"><b>LTA</b></td>
   <td align="center" style="color:#FFFFFF;" class="All_80"><b>CEA</b></td>	
   <td align="center" style="color:#FFFFFF;" class="All_80"><b>Annual Gross</b></td>
   <td align="center" style="color:#FFFFFF;" class="All_80"><b>Bonus</b></td>
   <td align="center" style="color:#FFFFFF;" class="All_80"><b>Gratuity</b></td>
   <td align="center" style="color:#FFFFFF;" class="All_80"><b>PF Contri</b></td>	
<td align="center" style="color:#FFFFFF;" class="All_80"><b>ESIC Contri</b></td>	
   <td align="center" style="color:#FFFFFF;" class="All_80"><b>MPP</b></td>
   <td align="center" style="color:#FFFFFF;" class="All_80"><b>CTC</b></td>	
   <td align="center" style="color:#FFFFFF;" class="All_80"><b>MIC</b></td>
   <td align="center" style="color:#FFFFFF;" class="All_80"><b>Car Entit</b></td>
   
   <td align="center" style="color:#FFFFFF;" class="All_80"><b>CategoryA</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>CategoryB</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>CategoryC</b></td>	
<td align="center" style="color:#FFFFFF;" class="All_80"><b>DA OutsideHQ</b></td>
<td align="center" style="color:#FFFFFF;" class="All_80"><b>DA @ HQ</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_50"><b>Travel (TW)</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Travel (FW)</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Travel Mode</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Travel Class</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Mobile Exp. Reim</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Mobile Hand. Elig</b></td>	
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Misc Expenses</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Health Insu</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Bonus</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Gratuity</b></td>	
</tr>
<?php if($_REQUEST['value']=='All') {$sql=mysql_query("select hrm_employee.*, hrm_employee_personal.*,hrm_employee_general.*,hrm_employee_contact.*,hrm_employee_family.*,hrm_employee_ctc.*,hrm_employee_eligibility.* from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_contact ON hrm_employee_general.EmployeeID=hrm_employee_contact.EmployeeID INNER JOIN hrm_employee_family ON hrm_employee_general.EmployeeID=hrm_employee_family.EmployeeID INNER JOIN hrm_employee_ctc ON hrm_employee_general.EmployeeID=hrm_employee_ctc.EmployeeID INNER JOIN hrm_employee_eligibility ON hrm_employee_general.EmployeeID=hrm_employee_eligibility.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' group by EmpCode order by EmpCode ASC", $con); }
else {$sql=mysql_query("select hrm_employee.*, hrm_employee_personal.*,hrm_employee_general.*,hrm_employee_contact.*,hrm_employee_family.*,hrm_employee_ctc.*,hrm_employee_eligibility.* from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_contact ON hrm_employee_general.EmployeeID=hrm_employee_contact.EmployeeID INNER JOIN hrm_employee_family ON hrm_employee_general.EmployeeID=hrm_employee_family.EmployeeID INNER JOIN hrm_employee_ctc ON hrm_employee_general.EmployeeID=hrm_employee_ctc.EmployeeID INNER JOIN hrm_employee_eligibility ON hrm_employee_general.EmployeeID=hrm_employee_eligibility.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' group by EmpCode order by EmpCode ASC", $con); } 
$Sno=1; while($res=mysql_fetch_array($sql)){ $Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlDesig=mysql_query("select DesigCode from hrm_designation where DesigId=".$res['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlCC=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resCC=mysql_fetch_assoc($sqlCC);
$sqlHQ=mysql_query("select HqName from hrm_headquater where HqId=".$res['HqId'], $con); $resHQ=mysql_fetch_assoc($sqlHQ);
?> 
   <tr bgcolor="#FFFFFF">
	<td align="center" style="" class="All_50" valign="top"><?php echo $Sno; ?></td>
	<td align="center" style="background-color:#E8D2FB;" class="All_70" valign="top"><?php echo $res['EmpCode']; ?></td>
	<td align="" style="background-color:#E8D2FB;" class="All_200" valign="top"><?php echo $Ename; ?></td>
<?php if($_REQUEST['value']=='All'){ ?>	<td align="" style="background-color:#E8D2FB;" class="All_100" valign="top"><?php echo $resDept['DepartmentCode']; ?></td><?php } ?>
    <td align="" style="background-color:#E8D2FB;" class="All_150" valign="top"><?php echo $resDesig['DesigCode']; ?></td>
	<td align="center" style="background-color:#E8D2FB;" class="All_40" valign="top"><?php echo $resGrade['GradeValue']; ?></td>	
	<td align="center" style="" class="All_60" valign="top"><?php echo $res['FileNo']; ?></td>	
	<td align="center" style="background-color:#FFDBCA;" class="All_70" valign="top"><?php echo date("d-M-y", strtotime($res['DateJoining'])); ?></td>
	<td align="center" style="background-color:#FFDBCA;" class="All_70" valign="top">
	<?php if($res['DateConfirmation']!='1970-01-01' AND $res['DateConfirmation']!='0000-00-00') { echo date("d-M-y", strtotime($res['DateConfirmation'])); }?></td>
	<td align="center" style="background-color:#FFDBCA;" class="All_70" valign="top"><?php echo date("d-M-y", strtotime($res['DOB'])); ?></td>
<?php //$timestamp_start = strtotime($res['DOB']);  $timestamp_end = strtotime(date("Y-m-d")); 
//$difference = abs($timestamp_end - $timestamp_start); 
      //$days = floor($difference/(60*60*24)); $months = floor($difference/(60*60*24*30)); 
	  //$years2 = $difference/(60*60*24*365); 
	  //$Y2=$years2*12; $M22=$months-$Y2;
	  //$AgeMain=number_format($years2, 1);
	  
	  $dos=date("d-m-Y",strtotime($res['DOB']));
      $localtime = getdate();
      $today = $localtime['mday']."-".$localtime['mon']."-".$localtime['year'];
      $dob_a = explode("-", $dos);
      $today_a = explode("-", $today);
      $dob_d = $dob_a[0];$dob_m = $dob_a[1];$dob_y = $dob_a[2];
      $today_d = $today_a[0];$today_m = $today_a[1];$today_y = $today_a[2];
      $years = $today_y - $dob_y;
      $months = $today_m - $dob_m;
      if ($today_m.$today_d < $dob_m.$dob_d){ $years--; $months = 12 + $today_m - $dob_m; }
      if ($today_d < $dob_d){ $months--; }
      $firstMonths=array(1,3,5,7,8,10,12);
      $secondMonths=array(4,6,9,11);
      $thirdMonths=array(2);
      if($today_m - $dob_m == 1) 
      {
       if(in_array($dob_m, $firstMonths)){ array_push($firstMonths, 0); }
       elseif(in_array($dob_m, $secondMonths)){ array_push($secondMonths, 0); }
	   elseif(in_array($dob_m, $thirdMonths)){ array_push($thirdMonths, 0); }
      }
	  $AgeMain=$years.'Y - '.$months.'M';
	  
?>			
	<td align="center" style="background-color:#FFDBCA;" class="All_70" valign="top"><?php echo $AgeMain; ?></td>
	<td align="" style="" class="All_100" valign="top"><?php echo $resCC['StateName']; ?></td>
	<td align="" style="" class="All_100" valign="top"><?php echo $resHQ['HqName']; ?></td>
	<td align="" style="background-color:#C9FDB0;" class="All_80" valign="top"><?php echo $res['MobileNo_Vnr']; ?></td>
	<td align="" style="background-color:#C9FDB0;" class="All_150" valign="top"><?php echo $res['EmailId_Vnr']; ?></td>
	<td align="center" style="" class="All_80" valign="top"><?php
	
	  $dos=date("d-m-Y",strtotime($res['DateJoining']));
      $localtime = getdate();
      $today = $localtime['mday']."-".$localtime['mon']."-".$localtime['year'];
      $dob_a = explode("-", $dos);
      $today_a = explode("-", $today);
      $dob_d = $dob_a[0];$dob_m = $dob_a[1];$dob_y = $dob_a[2];
      $today_d = $today_a[0];$today_m = $today_a[1];$today_y = $today_a[2];
      $years = $today_y - $dob_y;
      $months = $today_m - $dob_m;
      if ($today_m.$today_d < $dob_m.$dob_d){ $years--; $months = 12 + $today_m - $dob_m; }
      if ($today_d < $dob_d){ $months--; }
      $firstMonths=array(1,3,5,7,8,10,12);
      $secondMonths=array(4,6,9,11);
      $thirdMonths=array(2);
      if($today_m - $dob_m == 1) 
      {
       if(in_array($dob_m, $firstMonths)){ array_push($firstMonths, 0); }
       elseif(in_array($dob_m, $secondMonths)){ array_push($secondMonths, 0); }
	   elseif(in_array($dob_m, $thirdMonths)){ array_push($thirdMonths, 0); }
      }
	  $VNRExpMain=$years.'Y - '.$months.'M';
	
	
	
	 echo $VNRExpMain; ?></td>
	<td align="center" style="" class="All_80" valign="top"><?php echo $res['PreviousExpYear']; ?></td>
	<td align="" style="background-color:#95CAFF" class="All_150" valign="top"><?php echo $res['BankName']; ?></td>
	<td align="" style="background-color:#95CAFF" class="All_150" valign="top"><?php echo $res['AccountNo']; ?></td>
	<td align="" style="background-color:#95CAFF" class="All_150" valign="top"><?php echo $res['BranchName']; ?></td>
	<td align="" style="background-color:#95CAFF" class="All_150" valign="top"><?php echo $res['BranchAdd']; ?></td>
	<td align="" style="background-color:#C9FDB0;" class="All_120" valign="top"><?php echo $res['InsuCardNo']; ?></td>
	<td align="" style="background-color:#C9FDB0;" class="All_120" valign="top"><?php echo $res['PfAccountNo']; ?></td>
	<td align="" style="background-color:#FCFAB1;" class="All_150" valign="top"><?php echo $res['ReportingName']; ?></td>
<?php $sqlDesigR=mysql_query("select DesigCode from hrm_designation where DesigId=".$res['ReportingDesigId'], $con); $resDesigR=mysql_fetch_assoc($sqlDesigR); ?>		
	<td align="" style="background-color:#FCFAB1;" class="All_120" valign="top"><?php echo $resDesigR['DesigCode']; ?></td>	
	<td align="" style="background-color:#FCFAB1;" class="All_150" valign="top"><?php echo $res['ReportingEmailId']; ?></td>
	<td align="" style="background-color:#FCFAB1;" class="All_100" valign="top"><?php echo $res['ReportingContactNo']; ?></td>
    <td align="center" style="" class="All_50" valign="top"><?php if($res['Gender']=='M'){echo 'Male';}else {echo 'Female';}?></td>
	<td align="center" style="" class="All_50" valign="top"><?php echo $res['BloodGroup']; ?></td>	
	<td align="center" style="" class="All_50" valign="top"><?php if($res['SeniorCitizen']=='Y'){echo 'YES';}else {echo 'NO';} ?></td>	
	<td align="center" style="" class="All_50" valign="top"><?php if($res['MetroCity']=='Y'){echo 'YES';}else {echo 'NO';} ?></td>
	<td align="" style="background-color:#95CAFF;" class="All_80" valign="top"><?php echo $res['MobileNo']; ?></td>
	<td align="" style="background-color:#95CAFF;" class="All_150" valign="top"><?php echo $res['EmailId_Self']; ?></td>
	<td align="" style="background-color:#C9FDB0;" class="All_100" valign="top"><?php echo $res['PanNo']; ?></td>
	<td align="" style="background-color:#C9FDB0;" class="All_80" valign="top"><?php echo $res['PassportNo']; ?></td>
	<td align="center" style="background-color:#C9FDB0;" class="All_70" valign="top"><?php echo date("d-M-y", strtotime($res['Passport_ExpiryDateFrom'])); ?></td>
	<td align="center" style="background-color:#C9FDB0;" class="All_70" valign="top"><?php echo date("d-M-y", strtotime($res['Passport_ExpiryDateTo'])); ?></td>
	<td align="" style="background-color:#C9FDB0;" class="All_80" valign="top"><?php echo $res['DrivingLicNo']; ?></td>
	<td align="center" style="background-color:#C9FDB0;" class="All_70" valign="top"><?php echo date("d-M-y", strtotime($res['Driv_ExpiryDateFrom'])); ?></td>
	<td align="center" style="background-color:#C9FDB0;" class="All_70" valign="top"><?php echo date("d-M-y", strtotime($res['Driv_ExpiryDateTo'])); ?></td>
	<td align="center" style="background-color:#FCFAB1;" class="All_50" valign="top"><?php if($res['Married']=='Y'){echo 'Married';}else {echo 'Single';} ?></td>
	<td align="center" style="background-color:#FCFAB1;" class="All_70" valign="top"><?php if($res['Married']=='Y') {echo date("d-M-y", strtotime($res['MarriageDate']));} else {echo '';}?></td>
	<td align="" style="" class="All_150" valign="top"><?php echo $res['CurrAdd']; ?></td>
<?php $sqlS1=mysql_query("select StateName from hrm_state where StateId=".$res['CurrAdd_State'], $con); $resS1=mysql_fetch_assoc($sqlS1); ?>	
	<td align="" style="" class="All_80" valign="top"><?php echo $resS1['StateName']; ?></td>	
<?php $sqlC1=mysql_query("select CityName from hrm_city where CityId=".$res['CurrAdd_City'], $con); $resC1=mysql_fetch_assoc($sqlC1); ?>	
	<td align="" style="" class="All_80" valign="top"><?php echo $resC1['CityName']; ?></td>	
	<td align="" style="" class="All_50" valign="top"><?php echo $res['CurrAdd_PinNo']; ?></td>
	<td align="" style="" class="All_150" valign="top"><?php echo $res['ParAdd']; ?></td>
<?php $sqlS2=mysql_query("select StateName from hrm_state where StateId=".$res['DepartmentId'], $con); $resS2=mysql_fetch_assoc($sqlS2); ?>	
	<td align="" style="" class="All_80" valign="top"><?php echo $resS2['StateName']; ?></td>
<?php $sqlC2=mysql_query("select CityName from hrm_city where CityId=".$res['ParAdd_City'], $con); $resC2=mysql_fetch_assoc($sqlC2); ?>	
	<td align="" style="" class="All_80" valign="top"><?php echo $resC2['CityName']; ?></td>
	<td align="" style="" class="All_50" valign="top"><?php echo $res['ParAdd_PinNo']; ?></td>
	
	<td align="" style="background-color:#95CAFF;" class="All_120" valign="top"><?php echo $res['EmgName']; ?></td>
	<td align="" style="background-color:#95CAFF;" class="All_70" valign="top"><?php echo $res['EmgContactNo']; ?></td>
	<td align="" style="background-color:#95CAFF;" class="All_80" valign="top"><?php echo $res['EmgRelation']; ?></td>
	<td align="" style="background-color:#95CAFF;" class="All_150" valign="top"><?php echo $res['EmgEmailId']; ?></td>
	
	<td align="" style="background-color:#C9FDB0;" class="All_120" valign="top"><?php echo $res['Personal_RefName']; ?></td>
	<td align="" style="background-color:#C9FDB0;" class="All_70" valign="top"><?php echo $res['Personal_RefContactNo']; ?></td>
	<td align="" style="background-color:#C9FDB0;" class="All_80" valign="top"><?php echo $res['Personal_RefRelation']; ?></td>
	<td align="" style="background-color:#C9FDB0;" class="All_150" valign="top"><?php echo $res['Personal_RefEmailId']; ?></td>
	
	<td align="" style="background-color:#FCFAB1;" class="All_120" valign="top"><?php echo $res['Prof_RefName']; ?></td>
	<td align="" style="background-color:#FCFAB1;" class="All_70" valign="top"><?php echo $res['Prof_RefContactNo']; ?></td>
	<td align="" style="background-color:#FCFAB1;" class="All_150" valign="top"><?php echo $res['Prof_RefEmailId']; ?></td>
	<td align="" style="background-color:#FCFAB1;" class="All_150" valign="top"><?php echo $res['Prof_RefCompany']; ?></td>
	<td align="" style="background-color:#FCFAB1;" class="All_100" valign="top"><?php echo $res['Prof_RefDesig']; ?></td>
	
	<td align="" style="" valign="top" class="All_250"><?php echo $res['Fa_SN'].'. '.$res['FatherName']; ?></td>	
	<td align="" style="" valign="top" class="All_150"><?php echo $res['FatherQuali']; ?></td>	
	<td align="center" style="" valign="top" class="All_70"><?php if($res['FatherDOB']=='1970-01-01' OR $res['FatherDOB']=='0000-00-00'){echo '';}else {echo date("d-M-y", strtotime($res['FatherDOB'])); } ?></td>
	<td align="" style="" valign="top" class="All_150"><?php echo $res['FatherOccupation']; ?></td>	
	<td align="" style="" valign="top" class="All_250"><?php echo $res['Mo_SN'].'. '.$res['MotherName']; ?></td>	
	<td align="" style="" valign="top" class="All_150"><?php echo $res['MotherQuali']; ?></td>	
	<td align="center" style="" valign="top" class="All_70"><?php if($res['MotherDOB']=='1970-01-01' OR $res['MotherDOB']=='0000-00-00'){echo '';}else {echo date("d-M-y", strtotime($res['MotherDOB'])); }?></td>
	<td align="" style="" valign="top" class="All_150"><?php echo $res['MotherOccupation']; ?></td>	
	<td align="" style="" valign="top" class="All_250"><?php echo $res['HW_SN'].'. '.$res['HusWifeName']; ?></td>	
	<td align="" style="" valign="top" class="All_150"><?php echo $res['HusWifeQuali']; ?></td>	
	<td align="center" style="" valign="top" class="All_70"><?php if($res['HusWifeDOB']=='1970-01-01' OR $res['HusWifeDOB']=='0000-00-00'){echo '';}else { echo date("d-M-y", strtotime($res['HusWifeDOB'])); }?></td>
	<td align="" style="" valign="top" class="All_150"><?php echo $res['HusWifeOccupation']; ?></td>
	
	<td align="right" valign="top" style="background-color:#FFFFBF;" class="All_80"><?php echo $res['BAS_Value']; ?>&nbsp;</td>
<td align="right" valign="top" style="background-color:#FFFFBF;" class="All_80"><?php echo $res['STIPEND_Value']; ?>&nbsp;</td>	
<td align="right" valign="top" style="background-color:#FFFFBF;" class="All_80"><?php echo $res['INCENTIVE_Value']; ?>&nbsp;</td>	
<td align="right" valign="top" style="background-color:#FFFFBF;" class="All_80"><?php echo $res['HRA_Value']; ?>&nbsp;</td>
<td align="right" valign="top" style="background-color:#FFFFBF;" class="All_80"><?php echo $res['CONV_Value']; ?>&nbsp;</td>
<td align="right" valign="top" style="background-color:#FFFFBF;" class="All_80"><?php echo $res['SPECIAL_ALL_Value']; ?>&nbsp;</td>
<td align="right" valign="top" style="background-color:#BFFF80;" class="All_80"><?php echo $res['Tot_GrossMonth']; ?>&nbsp;</td>
<td align="right" valign="top" style="background-color:#BFFF80;" class="All_80"><?php echo $res['GrossSalary_PostAnualComponent_Value']; ?>&nbsp;</td>
<td align="right" valign="top" style="background-color:#8CC6FF;" class="All_80"><?php echo $res['PF_Employee_Contri_Value']; ?>&nbsp;</td>	
<td align="right" valign="top" style="background-color:#8CC6FF;" class="All_80"><?php echo $res['ESCI']; ?>&nbsp;</td>
<td align="right" valign="top" style="background-color:#8CC6FF;" class="All_80"><?php echo $res['NetMonthSalary_Value']; ?>&nbsp;</td>
<td align="right" valign="top" style="background-color:#8CC6FF;" class="All_80"><?php echo $res['MED_REM_Value']; ?>&nbsp;</td>	
<td align="right" valign="top" style="background-color:#8CC6FF;" class="All_80"><?php echo $res['LTA_Value']; ?>&nbsp;</td>
<td align="right" valign="top" style="background-color:#8CC6FF;" class="All_80"><?php echo $res['CHILD_EDU_ALL_Value']; ?>&nbsp;</td>	
<td align="right" valign="top" style="background-color:#BFFF80;" class="All_80"><?php echo $res['Tot_Gross_Annual']; ?>&nbsp;</td>
<td align="right" valign="top" style="background-color:#FFD2D2;" class="All_80"><?php echo $res['BONUS_Value']; ?>&nbsp;</td>
<td align="right" valign="top" style="background-color:#FFD2D2;" class="All_80"><?php echo $res['GRATUITY_Value']; ?>&nbsp;</td>
<td align="right" valign="top" style="background-color:#FFD2D2;" class="All_80"><?php echo $res['PF_Employer_Contri_Annul']; ?>&nbsp;</td>	
<td align="right" valign="top" style="background-color:#FFD2D2;" class="All_80"><?php echo $res['AnnualESCI']; ?>&nbsp;</td>
<td align="right" valign="top" style="background-color:#FFD2D2;" class="All_80"><?php echo $res['Mediclaim_Policy']; ?>&nbsp;</td>
<td align="right" valign="top" style="background-color:#F3D15C;" class="All_80"><?php echo $res['Tot_CTC']; ?>&nbsp;</td>	
<td align="right" valign="top" style="" class="All_80"><?php echo $res['EmpAddBenifit_MediInsu_value']; ?>&nbsp;</td>
<td align="right" valign="top" style="" class="All_80"><?php echo $res['Car_Entitlement']; ?>&nbsp;</td>

<td align="center" valign="top" style="background-color:#BFFF80;" class="All_80"><?php echo $res['Lodging_CategoryA']; ?></td>
	<td align="center" valign="top" style="background-color:#BFFF80;" class="All_80"><?php echo $res['Lodging_CategoryB']; ?></td>	
	<td align="center" valign="top" style="background-color:#BFFF80;" class="All_80"><?php echo $res['Lodging_CategoryC']; ?></td>	
<td align="center" valign="top" style="background-color:#FFD2D2;" class="All_80"><?php echo $res['DA_Outside_Hq']; ?></td>
<td align="center" valign="top" style="background-color:#FFD2D2;" class="All_80"><?php echo $res['DA_Inside_Hq']; ?></td>
    <td align="center" valign="top" style="" class="All_50"><?php echo $res['Travel_TwoWeeKM']; ?></td>
	<td align="center" valign="top" style="" class="All_50"><?php echo $res['Travel_FourWeeKM']; ?></td>	
	<td align="" valign="top" style="" class="All_80"><?php echo $res['Mode_Travel_Outside_Hq']; ?></td>
	<td align="" valign="top" style="" class="All_80"><?php echo $res['TravelClass_Outside_Hq']; ?></td>	
	<td align="center" valign="top" style="background-color:#8CC6FF;" class="All_80"><?php echo $res['Mobile_Exp_Rem_Rs']; ?></td>
	<td align="center" valign="top" style="background-color:#8CC6FF;" class="All_80"><?php echo $res['Mobile_Hand_Elig_Rs']; ?></td>	
	<td align="center" valign="top" style="" class="All_80"><?php echo $res['Misc_Expenses']; ?></td>
	<td align="center" valign="top" style="" class="All_80"><?php echo $res['Health_Insurance']; ?></td>
	<td align="" valign="top" style="background-color:#FFFFBF;" class="All_80"><?php echo 'As per law'; ?></td>
	<td align="" valign="top" style="background-color:#FFFFBF;" class="All_80"><?php echo 'As per law'; ?></td>
	</tr>   
	 <?php $Sno++; } ?> 
   </table>
 </td>
</tr> 
<?php } ?>

</table>  
 
</body>
</html>

