<?php 
require_once 'dompdf/autoload.inc.php'; 

use Dompdf\Dompdf; 
$dompdf = new Dompdf(); 
$value = $_REQUEST['value'];
$empid = $_REQUEST['empid'];
$month = $_REQUEST['month'];
$year = $_REQUEST['year'];
$comid = $_REQUEST['comid'];

$dateObj   = DateTime::createFromFormat('!m', $month);
$monthName = $dateObj->format('F'); // March

$data = json_decode(file_get_contents('https://vnrseeds.co.in/api/EssMobile/basicapi.php?value='.$value.'&empid='.$empid.'&month='.$month.'&year='.$year.'&comid='.$comid.''),true);

$pageData = '
<style>
	* {
		font-size: 12px;
	}
	.title {
		font-weight: bold;
	}
	td{
		padding-left:2px;
	}
</style>
<table width="100%" border="">
	<tr>
		<td width="70">
			<img width="50" src="data:image/png;base64,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" alt="Red dot" />
		</td>
		<td align="center"><b style="color:green; font-size:18px;">VNR SEEDS PVT. LTD. </b><br/>Raipur(492006)[CHHATTISGARH]
		<br/><b style="font-size:16px;margin-top:5px;">PAYSLIP FOR THE MONTH OF </b><u style="font-size:16px;">'.strtoupper($monthName).'-'.$year.'</u></td>
	</tr>
</table>
<br/>
<table border="1" width="100%">
		<tr>
			<td class="title">EC</td>
			<td>'.$data['Code'].'</td>
			<td class="title">NAME</td>
			<td colspan="3">'.$data['Name'].'</td>
		</tr>
		<tr>
			<td class="title">COSTCENTER</td>
			<td>'.$data['State'].'</td>
			<td class="title">DEPARTMENT</td>
			<td colspan="3">'.$data['Department'].'</td>
		</tr>
		<tr>
			<td class="title">GRADE</td>
			<td>'.$data['Grade'].'</td>
			<td class="title">DESIGNATION</td>
			<td colspan="3">'.$data['Designation'].'</td>
		</tr>
		<tr>
			<td class="title">HEADQUARTER</td>
			<td>'.$data['HeadQuarter'].'</td>
			<td class="title">GENDER</td>
			<td colspan="3">'.$data['Gender'].'</td>
		</tr>
		<tr>
			<td class="title">DATE-OF-BIRTH</td>
			<td>'.$data['DOB'].'</td>
			<td class="title">DATE-OF-JOINING</td>
			<td>'.$data['DOJ'].'</td>
			<td class="title">PF NO.</td>
			<td>'.$data['PF_Ac_No.'].'</td>
		</tr>	
		<tr>
			<td class="title">BANK A/C NO.</td>
			<td>'.$data['Bank_Ac_No.'].'</td>
			<td class="title">BANK NAME</td>
			<td>'.$data['BankName'].'</td>
			<td class="title">PAN NO.</td>
			<td>'.$data['PAN No'].'</td>
		</tr>	
		<tr>
			<td class="title">TOTAL DAYS</td>
			<td>'.$data['TotalDay'].'</td>
			<td class="title">PAID DAYS</td>
			<td>'.$data['PaidDay'].'</td>
			<td class="title">ABSENT</td>
			<td>'.$data['Absent'].'</td>
		</tr>	
		<tr>
			<td colspan="6">
				<table width="100%" border="0">
					<tr>
						<td valign="top">
							<table border="1" width="100%">
								<tr style="background-color:#00ffbf">
									<td colspan="2" align="center">Earnings</td>
								</tr>
								<tr style="background-color:#bf00ff; color:#fff;">
									<td align="center">Components </td>
									<td align="center">Amount</td>
								</tr>
								<tr>
									<td class="title">BASIC</td>
									<td>'.$data['ListOfEarnings'][0]['Basic'].'</td>
								</tr>
								<tr>
									<td>HOUSE RENT ALLOWANCE</td>
									<td>'.$data['ListOfEarnings'][0]['Hra'].'</td>
								</tr>';
								if($data['ListOfEarnings'][0]['Bonus'] != '0.00'){
									$pageData .= '<tr>
										<td>BONUS</td>
										<td>'.$data['ListOfEarnings'][0]['Bonus'].'</td>
									</tr>';
								}
								if($data['ListOfEarnings'][0]['Special'] != '0.00'){
									$pageData .= '<tr>
										<td>SPECIAL ALLOWANCE</td>
										<td>'.$data['ListOfEarnings'][0]['Special'].'</td>
									</tr>';
								}
								if($data['ListOfEarnings'][0]['Convance'] != '0.00'){
									$pageData .= '<tr>
										<td>CONVEYANCE ALLOWANCE</td>
										<td>'.$data['ListOfEarnings'][0]['Convance'].'</td>
									</tr>';
								}
								if($data['ListOfEarnings'][0]['TA'] != '0.00'){
									$pageData .= '<tr>
										<td>TRANSPORT ALLOWANCE</td>
										<td>'.$data['ListOfEarnings'][0]['TA'].'</td>
									</tr>';
								}
								if($data['ListOfEarnings'][0]['DA'] != '0.00'){
									$pageData .= '<tr>
										<td>DA</td>
										<td>'.$data['ListOfEarnings'][0]['DA'].'</td>
									</tr>';
								}
								if($data['ListOfEarnings'][0]['LeaveEncash'] != '0.00'){
									$pageData .= '<tr>
										<td>LEAVE ENCASH</td>
										<td>'.$data['ListOfEarnings'][0]['LeaveEncash'].'</td>
									</tr>';
								}
								if($data['ListOfEarnings'][0]['Arreares'] != '0.00'){
									$pageData .= '<tr>
										<td>ARREARS</td>
										<td>'.$data['ListOfEarnings'][0]['Arreares'].'</td>
									</tr>';
								}
								if($data['ListOfEarnings'][0]['Incentive'] != '0.00'){
									$pageData .= '<tr>
										<td>INCENTIVE</td>
										<td>'.$data['ListOfEarnings'][0]['Incentive'].'</td>
									</tr>';
								}
								if($data['ListOfEarnings'][0]['VariableAdjustment'] != '0.00'){
									$pageData .= '<tr>
										<td>VARIABLE ADJUSTMENT</td>
										<td>'.$data['ListOfEarnings'][0]['VariableAdjustment'].'</td>
									</tr>';
								}
								if($data['ListOfEarnings'][0]['PerformancePay'] != '0.00'){
									$pageData .= '<tr>
										<td>PERFORMANCE PAY</td>
										<td>'.$data['ListOfEarnings'][0]['PerformancePay'].'</td>
									</tr>';
								}
								if($data['ListOfEarnings'][0]['CCA'] != '0.00'){
									$pageData .= '<tr>
										<td>CITY COMPENSATORY ALLOWANCE</td>
										<td>'.$data['ListOfEarnings'][0]['CCA'].'</td>
									</tr>';
								}
								if($data['ListOfEarnings'][0]['RA'] != '0.00'){
									$pageData .= '<tr>
										<td>RELOCATION ALLOWANCE</td>
										<td>'.$data['ListOfEarnings'][0]['RA'].'</td>
									</tr>';
								}
								if($data['ListOfEarnings'][0]['VarRemburmnt'] != '0.00'){
									$pageData .= '<tr>
										<td>VARIABLE REIMBURSEMENT</td>
										<td>'.$data['ListOfEarnings'][0]['VarRemburmnt'].'</td>
									</tr>';
								}
								if($data['ListOfEarnings'][0]['Car_Allowance'] != '0.00'){
									$pageData .= '<tr>
										<td>CAR ALLOWANCE</td>
										<td>'.$data['ListOfEarnings'][0]['Car_Allowance'].'</td>
									</tr>';
								}
								if($data['ListOfEarnings'][0]['Arr_CarAllow'] != '0.00'){
									$pageData .= '<tr>
										<td>ARREAR FOR CAR ALLOWANCE</td>
										<td>'.$data['ListOfEarnings'][0]['Arr_CarAllow'].'</td>
									</tr>';
								}
								if($data['ListOfEarnings'][0]['Arr_Basic'] != '0.00'){
									$pageData .= '<tr>
										<td>ARREAR FOR BASIC</td>
										<td>'.$data['ListOfEarnings'][0]['Arr_Basic'].'</td>
									</tr>';
								}
								if($data['ListOfEarnings'][0]['Arr_Hra'] != '0.00'){
									$pageData .= '<tr>
										<td>ARREAR FOR HOUSE RENT ALLOWANCE</td>
										<td>'.$data['ListOfEarnings'][0]['Arr_Hra'].'</td>
									</tr>';
								}
								if($data['ListOfEarnings'][0]['Arr_Spl'] != '0.00'){
									$pageData .= '<tr>
										<td>ARREAR FOR SPECIAL ALLOWANCE</td>
										<td>'.$data['ListOfEarnings'][0]['Arr_Spl'].'</td>
									</tr>';
								}
								if($data['ListOfEarnings'][0]['Arr_Conv'] != '0.00'){
									$pageData .= '<tr>
										<td>ARREAR FOR CONVEYANCE</td>
										<td>'.$data['ListOfEarnings'][0]['Arr_Conv'].'</td>
									</tr>';
								}
							$pageData .= '</table>
						</td>

						<td valign="top">
								<table border="1" width="100%">
								
								<tr style="background-color:#00ffbf">
									<td colspan="2" align="center">Deductions</td>
								</tr>
								<tr style="background-color:#bf00ff; color:#fff;">
									<td align="center">Components </td>
									<td align="center">Amount</td>
								</tr>';
								if($data['ListOfDeductions'][0]['PF'] != '0.00'){
									$pageData .= '<tr>
										<td>PROVIDENT FUND</td>
										<td>'.$data['ListOfDeductions'][0]['PF'].'</td>
									</tr>';
								}
								if($data['ListOfDeductions'][0]['TDS'] != '0.00'){
									$pageData .= '<tr>
										<td>TDS</td>
										<td>'.$data['ListOfDeductions'][0]['TDS'].'</td>
									</tr>';
								}
								if($data['ListOfDeductions'][0]['ESIC'] != '0.00'){
									$pageData .= '<tr>
										<td>ESIC</td>
										<td>'.$data['ListOfDeductions'][0]['ESIC'].'</td>
									</tr>';
								}
								if($data['ListOfDeductions'][0]['Arr_Pf'] != '0.00'){
									$pageData .= '<tr>
										<td>ARREAR PF</td>
										<td>'.$data['ListOfDeductions'][0]['Arr_Pf'].'</td>
									</tr>';
								}
								if($data['ListOfDeductions'][0]['Arr_Esic'] != '0.00'){
									$pageData .= '<tr>
										<td>ARREAR ESIC</td>
										<td>'.$data['ListOfDeductions'][0]['Arr_Esic'].'</td>
									</tr>';
								}
								if($data['ListOfDeductions'][0]['VolContrib'] != '0.00'){
									$pageData .= '<tr>
										<td>VOLUNTARY CONTRIBUTION</td>
										<td>'.$data['ListOfDeductions'][0]['VolContrib'].'</td>
									</tr>';
								}
								if($data['ListOfDeductions'][0]['DeductAdjmt'] != '0.00'){
									$pageData .= '<tr>
										<td>DEDUCTION ADJUSTMENT</td>
										<td>'.$data['ListOfDeductions'][0]['DeductAdjmt'].'</td>
									</tr>';
								}
								if($data['ListOfDeductions'][0]['RecConAllow'] != '0.00'){
									$pageData .= '<tr>
										<td>RECOVERY CONVENYANCE ALLOWANCE</td>
										<td>'.$data['ListOfDeductions'][0]['RecConAllow'].'</td>
									</tr>';
								}
								if($data['ListOfDeductions'][0]['RA_Recover'] != '0.00'){
									$pageData .= '<tr>
										<td>RELOCATION ALLOWANCE RECOVERY</td>
										<td>'.$data['ListOfDeductions'][0]['RA_Recover'].'</td>
									</tr>';
								}
								$pageData .= '</table>
						</td>
					</tr>						
				</table>
			</td>
		</tr>
	</table>
<br/>';
	if($data['ListOfEarnings'][0]['Arr_Bonus'] != '0.00' || $data['ListOfEarnings'][0]['Arr_LTARemb'] != '0.00' 
	|| $data['ListOfEarnings'][0]['Arr_RA'] != '0.00'
	|| $data['ListOfEarnings'][0]['Arr_PP'] != '0.00'
	|| $data['ListOfEarnings'][0]['Arr_LvEnCash'] != '0.00'
	|| $data['ListOfEarnings'][0]['YCea'] != '0.00'
	|| $data['ListOfEarnings'][0]['YLta'] != '0.00'){
		$pageData .= '<table border="1" width="50%">
			<tr style="background-color:#00ffbf">
				<td colspan="2" align="center">Earnings</td>
			</tr>
			<tr style="background-color:#bf00ff; color:#fff;">
				<td align="center">Components </td>
				<td align="center">Amount</td>
			</tr>';
	
		if($data['ListOfEarnings'][0]['Arr_Bonus'] != '0.00'){
			$pageData .= '<tr>
					<td>ARREAR FOR BONUS</td>
					<td>'.$data['ListOfEarnings'][0]['Arr_Bonus'].'</td>
				</tr>';
		}
		if($data['ListOfEarnings'][0]['Arr_LTARemb'] != '0.00'){
			$pageData .= '<tr>
					<td>ARREAR FOR LTA REIMBU.</td>
					<td>'.$data['ListOfEarnings'][0]['Arr_LTARemb'].'</td>
				</tr>';
		}
		if($data['ListOfEarnings'][0]['Arr_RA'] != '0.00'){
			$pageData .= '<tr>
					<td>ARREAR FOR RELOCATION ALLOWANCE</td>
					<td>'.$data['ListOfEarnings'][0]['Arr_RA'].'</td>
				</tr>';
		}
		if($data['ListOfEarnings'][0]['Arr_PP'] != '0.00'){
			$pageData .= '<tr>
					<td>ARREAR FOR PERFORMANCE PAY</td>
					<td>'.$data['ListOfEarnings'][0]['Arr_PP'].'</td>
				</tr>';
		}
		if($data['ListOfEarnings'][0]['Arr_LvEnCash'] != '0.00'){
			$pageData .= '<tr>
					<td>ARREAR FOR LV-ENCASH</td>
					<td>'.$data['ListOfEarnings'][0]['Arr_LvEnCash'].'</td>
				</tr>';
		}
		if($data['ListOfEarnings'][0]['YCea'] != '0.00'){
			$pageData .= '<tr>
					<td>CHILD EDUCATION ALLOWANCE</td>
					<td>'.$data['ListOfEarnings'][0]['YCea'].'</td>
				</tr>';
		}
		if($data['ListOfEarnings'][0]['YLta'] != '0.00'){
			$pageData .= '<tr>
					<td>LEAVE TRAVEL ALLOWANCE</td>
					<td>'.$data['ListOfEarnings'][0]['YLta'].'</td>
				</tr>';
		}
	$pageData .= '</table>'; 
	}
	$pageData .= '<br/>
	<table border="1" width="100%">
		<tr>
			<td width="25%">Total Earnings :</td>
			<td width="25%">'.$data['Tot_Earn'].'</td>
			<td width="25%">Total Deductions :</td>
			<td width="25%">'.$data['Tot_Deduct'].'</td>
		</tr>
	</table>
	
	<br/>
	<table border="	" width="100%">
		<tr>
			<td>Net Pay : Rs.'.$data['Tot_NetAmount'].'</td>
		</tr>
		<tr>
			<td>In Words :'.$data['NetAmt_InWords'].'</td>
		</tr>
	</table>
'; 
$dompdf->loadHtml($pageData);
$dompdf->setPaper('A4','potraite'); 
$dompdf->render(); 
$filename = 'PaySlip_'.strtoupper($monthName).'-'.$year;
$dompdf->stream($filename, array("Attachment" => 1)); 
?>