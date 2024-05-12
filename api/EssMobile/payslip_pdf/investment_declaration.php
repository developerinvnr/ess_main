<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$con=mysqli_connect('localhost','hrims_user','hrims@192');
if(!$con) die("Failed to connect to database!");
$db=mysqli_select_db( $con, 'hrims');
if(!$db) {
    die("Failed to select database!");
}

require_once 'dompdf/autoload.inc.php'; 

use Dompdf\Dompdf; 
$dompdf = new Dompdf(); 
$empid = $_REQUEST['empid'];
$comid = $_REQUEST['comid'];
$format = $_REQUEST['format'];

$run_qry=mysqli_query($con,"SELECT e.*,ep.PanNo,cb.CompanyName FROM hrm_employee e 
join hrm_employee_personal ep on ep.EmployeeID = e.EmployeeID
join hrm_company_basic cb on cb.CompanyId = e.CompanyId
WHERE e.EmployeeID = '".$empid."' and e.CompanyId = ".$comid);
$emp_detail = mysqli_fetch_array($run_qry);
$data = json_decode(file_get_contents('https://vnrseeds.co.in/api/EssMobile/basicapi.php?value=Investment_Decl_Details&empid='.$empid.'&comid='.$comid),true);

if($data['Regime'] == 'old'){
	
$pageData = '<table width="100%" border="1">
    <tr>
        <td colspan="4" style="text-align: center;"><b>(To be used to declare investment for income Tax that will be made during the period 2021-2022)</b></td>
    </tr>
    <tr>
         <td>Company</td>	 
         <td>'.$emp_detail['CompanyName'].'</td>	 
         <td>EmployeeID</td>	 
         <td>'.$emp_detail["EmpCode"].'</td>
    </tr>
    <tr>
        <td>Employee</td>	 
        <td>'.$emp_detail["Fname"].' '.$emp_detail["Sname"].' '.$emp_detail["Lname"].'</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td>PAN Number</td>	 
        <td>'.$emp_detail['PanNo'].'</td>
        <td colspan="2"></td>
    </tr>
    <tr style="text-align: center;background-color: blue;color: white;">
        <td>Item</td>	 
        <td>Particulars</td>
        <td>Max Limit</td>
        <td>Declared Amt</td>
    </tr>
    <tr>
        <td>House Rent Sec 10(13A)</td>	 
        <td>I am staying in a house and I egree to submit rent receipts when required. The Rent paid is (Rs._______ Per Month) & the house is located in Non-Metro</td>
        <td></td>
        <td>'.$data['HRA'].'</td>
    </tr>';

if($data['LTA'] != '0.00' && $data['LTA'] != ''){ 
$pageData .= '<tr>
        <td>LTA Sec 10(5)</td>	 
        <td>I will provide the tickets/ Travels bills in original as per(twice basic monthly) the LTA policy or else the company can consider amount as taxable.</td>
        <td>30100</td>
        <td>'.$data['LTA'].'</td>
    </tr>';
}
if($data['CEA'] != '0.00' && $data['CEA'] != ''){ 
$pageData .= '<tr>
        <td>CEA Sec 10(14)</td>	 
        <td>I will provide the copy of tution fees reciept as per CEA policy or else the company can consider amount as taxable.(Rs100/- per month per child upto max of two children)</td>
        <td>2400</td>
        <td>'.$data['CEA'].'</td>
    </tr>';
}

$pageData .= '<tr>
        <td rowspan="5">Deductions Under Chapeter VI A</td>	 
        <td>Sec.80D - Medical Insurance Premium (If the policy covers a senior Citizen then additional deduction of Rs.5000/- is available & deduction on account of expenditure on preventive Health Check-Up (for Self, Spouse, Dependant Children & Parents )Shall not exceed in the aggregate Rs 5000/-.)</td>
        <td>'.$data['MIP_Limit'].'</td>
        <td>'.$data['MIP'].'</td>
    </tr>
    <tr>
        <td>"Sec. 80DD - Medical treatment/insurance of Handicapped Dependant A higher deduction of Rs. 100,000 is available, where such dependent is with severe disability of > 80%"</td>
        <td>'.$data['MTI_Limit'].'</td>
        <td>'.$data['MTI'].'</td>
		</tr>
    <tr>
        <td>"Sec 80DDB - Medical treatment (specified diseases only) (medical treatment in respect of a senior Citizen then additional deduction of Rs.20,000/- is available)"</td>
        <td>'.$data['MTS_Limit'].'</td>
        <td>'.$data['MTS'].'</td>
    </tr>
    <tr>
        <td>Sec 80E - Repayment of Loan for higher education (only interest)</td>
        <td>'.$data['ROL_Limit'].'</td>
        <td>'.$data['ROL'].'</td>
    </tr>
    <tr>
        <td>Sec 80U - Handicapped</td>
        <td>'.$data['Handi_Limit'].'</td>
        <td>'.$data['Handicapped'].'</td>
    </tr>
    <tr>
        <td rowspan="14">Deduction Under Section 80C</td>
        <td>Sec 80CCC - Contribution to Pension Fund (Jeevan Suraksha)</td>
        <td rowspan="14">150000</td>
        <td>'.$data['PenFun'].'</td>
    </tr>
    <tr>
        <td>Life Insurance Premium</td>
        <td>'.$data['LIP'].'</td>
    </tr>
    <tr>
        <td>Defferred Annuity</td>
        <td>'.$data['DA'].'</td>
    </tr>
    <tr>
        <td>Public Provident Fund</td>
        <td>'.$data['PPF'].'</td>
    </tr>
    <tr>
        <td>Time Deposit in Post Office / Bank for 5 year & above</td>
        <td>'.$data['PostOff'].'</td>
    </tr>
    <tr>
        <td>ULIP of UTI/LIC</td>
        <td>'.$data['ULIP'].'</td>
    </tr>
    <tr>
        <td>Principal Loan (Housing Loan) Repayment</td>
        <td>'.$data['HL'].'</td>
    </tr>
    <tr>
        <td>Mutual Funds</td>
        <td>'.$data['MF'].'</td>
    </tr>
    <tr>
        <td>Investment in infrastructure Bonds</td>
        <td>'.$data['IB'].'</td>
    </tr>
    <tr>
        <td>Children- Tution Fee restricted to max.of 2 children</td>
        <td>'.$data['CTF'].'</td>
    </tr>
    <tr>
        <td>Deposit in NHB</td>
        <td>'.$data['NHB'].'</td>
    </tr>
    <tr>
        <td>Deposit In NSC</td>
        <td>'.$data['NSC'].'</td>
    </tr>
    <tr>
        <td>Sukanya Samriddhi</td>
        <td>'.$data['SukS'].'</td>
    </tr>
    <tr>
        <td>Others (please specify) Employee Provident Fund</td>
        <td>'.$data['EPF'].'</td>
    </tr>
    <tr style="background-color:blue;">
		<td colspan="2"></td>
		<td>Max Limit</td>
		<td>Declared Amount</td>
	</tr>
	<tr>
        <td>Sec. 80CCD(1B)</td>
        <td>NPS (National Pension Scheme)/ Atal Pension Yojna(APY)</td>
        <td></td>
        <td>'.$data['NPS'].'</td>
    </tr>
	
    <tr>
        <td>Sec. 80CCD(2)</td>
        <td>Corporate NPS Scheme</td>
        <td>10% Of Basic Salary</td>
        <td>'.$data['CorNPS'].'</td>
    </tr>
    
    <tr>
        <td rowspan="5">Previous Employment Salary (Salary earened from 01/04/12 till date of joining)</td>
        <td>If yes, Form 16 from previous employer or Form 12 B with tax computation statement</td>
        <td></td>
        <td>'.$data['Form16'].'</td>
    </tr>
    <tr>
        <td>Salary paid by the Previous Employer after Sec.10 Exemption</td>
        <td></td>
        <td>'.$data['SPE'].'</td>
    </tr>
    <tr>
        <td>PROFESSIOAL TAX deducted by the Previous Employer</td>
        <td></td>
        <td>'.$data['PT'].'</td>
    </tr>
    <tr>
        <td>PROVIDENT FUND deducted by the Previous Employer</td>
        <td></td>
        <td>'.$data['PFD'].'</td>
    </tr>
    <tr>
        <td>INCOME TAX deducted by the Previous Employer</td>
        <td></td>
        <td>'.$data['IT'].'</td>
    </tr>
    <tr>
        <td>Income other then Salary Income</td>
        <td>If yes, then Form 12C detailing other income is attached(only interest)</td>
        <td></td>
        <td></td>
    </tr>
	<tr style="background-color:blue;">
		<td colspan="2"></td>
		<td>Max Limit</td>
		<td>Declared Amount</td>
	</tr>
    <tr>
        <td rowspan="2">Deduction under Section 24</td>
        <td>Interest on Housing Loan</td>
        <td></td>
        <td>'.$data['IHL'].'</td>
    </tr>
    <tr>
        <td>Interest if the loan is taken before 01/04/99</td>
        <td></td>
        <td>'.$data['IL'].'</td>
    </tr>
    <tr>
        <td rowspan="2"><u><b> Declaration:</b></u></td>
        <td colspan="3">1) I hereby declare that the information given above is correct and true in all respects.</td>
    </tr>
    <tr>
        <td colspan="3">2) I also undertake to indemnify the company for any loss/liability that may arise in the event of the above information being incorrect.</td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="2" rowspan="2"></td>
    </tr>
    <tr>
        <td>Date:</td>
        <td>'.$data['Inv_Date'].'</td>
    </tr>
    <tr>
        <td>Place:</td>
        <td>'.$data['Inv_Place'].'</td>
        <td colspan="2" style="text-align: center;">Signature</td>
    </tr>
</table>';
}

else {
$pageData = '<table width="100%" border="1">
    <tr>
        <td colspan="4" style="text-align: center;"><b>(To be used to declare investment for income Tax that will be made during the period 2021-2022)</b></td>
    </tr>
    <tr>
         <td>Company</td>	 
         <td>'.$emp_detail['CompanyName'].'</td>	 
         <td>EmployeeID</td>	 
         <td>'.$emp_detail["EmpCode"].'</td>
    </tr>
    <tr>
        <td>Employee</td>	 
        <td>'.$emp_detail["Fname"].' '.$emp_detail["Sname"].' '.$emp_detail["Lname"].'</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td>PAN Number</td>	 
        <td>'.$emp_detail['PanNo'].'</td>
        <td colspan="2"></td>
    </tr>
    <tr style="text-align: center;background-color: blue;color: white;">
        <td>Item</td>	 
        <td>Particulars</td>
        <td>Max Limit</td>
        <td>Declared Amt</td>
    </tr>
    
    <tr>
        <td>Sec. 80CCD(2)</td>
        <td>Corporate NPS Scheme</td>
        <td>10% Of Basic Salary</td>
        <td>'.$data['CorNPS'].'</td>
    </tr>
    
    <tr>
        <td colspan="4"><b> Declaration:</b></td>
    </tr>
	<tr>
		<td colspan="4">1) I hereby declare that the information given above is correct and true in all respects.</td>
	</tr>
    <tr>
        <td colspan="4">2) I also undertake to indemnify the company for any loss/liability that may arise in the event of the above information being incorrect.</td>
    </tr>
    
    <tr>
        <td>Date:</td>
        <td>'.$data['Inv_Date'].'</td>
    </tr>
    <tr>
        <td>Place:</td>
        <td>'.$data['Inv_Place'].'</td>
        <td colspan="2" style="text-align: center;">Signature</td>
    </tr>
</table>';
}

if($format != 'html'){
    $dompdf->loadHtml($pageData);
    $dompdf->setPaper('A4','potraite'); 
    $dompdf->render(); 
    $filename = 'PaySlip_';
    $dompdf->stream($filename, array("Attachment" => 0)); 
} else {
    print_r($pageData);
}
?>