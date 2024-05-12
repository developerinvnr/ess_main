<?php
require('mysql_report.php');
$pdf = new PDF('L','pt','A4');
$pdf->SetFont('Helvetica','',14);
$pdf->connect('localhost','vnrseed2_hr','vnrhrims321','vnrseed2_hrims'); 
$attr = array('titleFontSize'=>20, 'titleText'=>$_REQUEST['cdn'].'KRA List');
$pdf->mysql_report("select KRA,KRA_Description,Measure,Unit,Weightage,Target from hrm_pms_kra where YearId=".$_REQUEST['y']." AND CompanyId=".$_REQUEST['c']." AND EmployeeID=".$_REQUEST['e']." order by KRAId LIMIT 50",false,$attr);
//$pdf->mysql_report("SELECT * FROM customer ORDER BY CustomerID LIMIT 100",false,$attr);
$pdf->Output();
?>
