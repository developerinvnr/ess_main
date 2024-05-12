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

      $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); 
	  //$strSQL = "SELECT * from hrm_pms_kra WHERE (KRAStatus='A' OR KRAStatus='R') AND CompanyId=".$CompanyId." AND YearId=".$YearId." AND DepartmentId=".$_REQUEST['value'];
	  $objQuery = mysql_query("SELECT * from hrm_pms_kra WHERE KRAStatus='A' AND CompanyId=".$CompanyId." AND YearId=".$YearId." AND DepartmentId=".$_REQUEST['value'], $con);
		if($objQuery)
		{			
			//*** Get Document Path ***//
			$strPath = realpath(basename(getenv($_SERVER["SCRIPT_NAME"]))); // C:/AppServ/www/myphp

			//*** Excel Document Root ***//
			$strFileName = "MyXls/KRA_".$resA['DepartmentName'].".xls";
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
			$xlBook->Worksheets(1)->Name = $resA['DepartmentName']."_KRA";							
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
<?php if($_REQUEST['action']=='KRA') { ?>
<tr>
 <td>
   <table border="1" width="1100">
   <tr>
	  <td colspan="8" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;Employee KRA:
	  &nbsp;&nbsp;(&nbsp;Department - <?php echo $resA['DepartmentName'];  ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="Printpage()" style="color:#F9F900; font-size:12px;">Print</a>&nbsp;&nbsp;
	  <a href="<?php echo $strFileName; ?>" style="color:#F9F900; font-size:12px;">Dump Excel</a>
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189">
	   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>SNo</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:450px;" valign="top" align="center"><b>KRA</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:500px;" valign="top" align="center"><b>Description</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>Measure</b></td>
	   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:100px;" valign="top" align="center"><b>Unit</b></td>
	</tr>
<?php $sqlDP = mysql_query("SELECT * from hrm_pms_kra WHERE KRAStatus='A' AND CompanyId=".$CompanyId." AND YearId=".$YearId." AND DepartmentId=".$_REQUEST['value'], $con) or die(mysql_error());  $Sno=1;  while($resDP = mysql_fetch_assoc($sqlDP)) { ?>    
	    <tr bgcolor="#FFFFFF">
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;" valign="top"><?php echo $Sno; ?></td>
		   <td style="font-family:Georgia;font-size:12px; width:300px;" valign="top"><?php echo $resDP['KRA']; ?></td>
		   <td style="font-family:Georgia; font-size:12px; width:700px;" valign="top"><?php echo $resDP['KRA_Description']; ?></td>
		   <td style="font-family:Georgia; font-size:12px; width:100px;" valign="top"><?php echo $resDP['Measure']; ?></td>
		   <td align="center" style="font-family:Georgia;font-size:12px; width:50px;" valign="top"><?php echo $resDP['Unit']; ?></td>
		</tr>
<?php $Sno++; } ?>
   </table>
 </td>
</tr> 
<?php } ?>

</table>  
 
</body>
</html>

