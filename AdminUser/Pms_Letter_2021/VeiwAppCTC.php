<?php require_once('config/config.php');
$Set=mysql_query("select * from hrm_pms_setting where Process='PMS' AND CompanyId=".$_REQUEST['C'],$con); 
$rSet=mysql_fetch_array($Set); $SetpD=$rSet['PrintDate']; $SeteD=$rSet['EffectedDate']; $SetMsg=$rSet['WishingMsg']; $SetPeD=$rSet['Prod_EffectedDate']; ?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script language="javascript" type="text/javascript">
function PrintCTC(P,E,Y,C,R,G,D) 
{ document.getElementById("PrtId").style.display='none'; window.print(); }
////window.open("VeiwAppCTCPrint.php?action=Ctc&P="+P+"&E="+E+"&Y="+Y+"&C="+C+"&R="+R+"&G="+G+"&D="+D,"AppLetter","location=no,scrollbars=no,resizable=no,menubar=no,width=820,height=750");
</script>
</head>
<body>
<table>
<tr><td style="font-family:Times New Roman;color:#000000;font-size:13px;width:785;" align="right"><span id="PrtId"><a href="#" onClick="PrintCTC(<?php echo $_REQUEST['P'].','.$_REQUEST['E'].','.$_REQUEST['Y'].','.$_REQUEST['C'].','.$_REQUEST['R']; ?>,'<?php echo $_REQUEST['G']; ?>',<?php echo $_REQUEST['D']; ?>)">Print</a>&nbsp;&nbsp;</span></td></tr>
<?php 

if($_REQUEST['C']==1){ $qry="hrm_employee_ctc_pms.CtcCreatedDate='".date("Y-01-01")."'"; }
elseif($_REQUEST['C']==3){ $qry="hrm_employee_ctc_pms.CtcCreatedDate='".date("Y-04-01")."'"; }

if($_REQUEST['action']=='Ctc') { $SqlCtc=mysql_query("SELECT hrm_employee.*, hrm_employee_ctc_pms.*, Gender, DR, Married FROM hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_ctc_pms ON hrm_employee.EmployeeID=hrm_employee_ctc_pms.EmployeeID WHERE hrm_employee.EmployeeID=".$_REQUEST['E']." AND ".$qry." AND hrm_employee.CompanyId=".$_REQUEST['C'], $con); $ResCtc=mysql_fetch_assoc($SqlCtc); 
if($ResCtc['DR']=='Y'){$M='Dr.';} elseif($ResCtc['Gender']=='M'){$M='Mr.';} elseif($ResCtc['Gender']=='F'){$M='Ms.';}
$NameE=$M.' '.$ResCtc['Fname'].'&nbsp;'.$ResCtc['Sname'].'&nbsp;'.$ResCtc['Lname'];
$SqlY=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['Y'], $con); $ResY=mysql_fetch_assoc($SqlY);
$From=date("Y",strtotime($ResY['FromDate'])); $To=date("Y",strtotime($ResY['ToDate'])); $ToTo=$From-1; $AssYear=$ToTo.'-'.date("y",strtotime($ResY['FromDate']));

$SqlStat=mysql_query("select hrm_company_statutory_lumpsum.*,hrm_company_statutory_taxsaving.*,hrm_company_statutory_pf.* from hrm_company_statutory_lumpsum INNER JOIN hrm_company_statutory_taxsaving ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_taxsaving.CompanyId INNER JOIN hrm_company_statutory_pf ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_pf.CompanyId where hrm_company_statutory_lumpsum.CompanyId=".$_REQUEST['C'], $con); $ResStat=mysql_fetch_assoc($SqlStat);
?> 			
<tr>
 <td align="center">
   <table border="0" width="790">
   
     <tr><td align="center" valign="top" style="font-size:20px; color:#000000; font-family:Times New Roman; font-weight:bold;"><u>CTC(Annexure-A)</u></td></tr>
	 <tr><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td></tr>
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr>
		    <td style="width:50px;">&nbsp;</td>
		    <td style="width:385px;font-size:18px;font-weight:bold;"><?php echo $NameE; ?> / EC No:&nbsp;<?php echo $ResCtc['EmpCode'];  ?></td>
			<td style="width:100px;">&nbsp;</td>
			<td style="width:200px;font-size:18px;font-weight:bold;" align="right">Date:&nbsp;<?php echo $SetpD; ?></td>
			<td style="width:50px;">&nbsp;</td>
		  </tr>
		</table>
	  </td>
	 </tr>
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000;width:785;" align="center">
	  <?php include_once('ViewCtc.php'); ?>
	  </td>
	 </tr>		
     <tr>
      <td>
	   <table>
	   <?php if($_REQUEST['E']==7){ ?>
	   <tr><td style="width:50px;">&nbsp;</td><td style="width:685px;font-size:14px;"><b>*</b>Variable Remuneration@ 7.5% of NRV less production cost ( on revenue generated out of your breeding efforts).</td></tr><?php } ?> 	
	   <tr><td style="width:50px;">&nbsp;</td><td style="width:685px;font-size:14px;"><b><u>Pls note</u>  :</b><b>Bonus shall be paid as per the applicability of the Bonus Act</b>. This is a confidential document not to be discussed openly with others. You shall be personally responsible for any leakage of information regarding your compensation .</td></tr></table>
	 </td>
   </tr>	 
   <tr>
	  <td style="font-family:Times New Roman;color:#000000;width:785;" align="center">
	    <table border="0" cellpadding="0" cellspacing="0">
		  <tr><td style="width:50px;">&nbsp;</td>
		  <td style="width:685px;font-size:18px;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($_REQUEST['C']==1 AND ($_REQUEST['G']!='L3' AND $_REQUEST['G']!='L4' AND $_REQUEST['G']!='L5' AND $_REQUEST['G']!='MG' AND $_REQUEST['E']!=263)){echo '<img src="images/lsign.jpg" border="0" />';}?></td>
		  <td style="width:50px;">&nbsp;</td></tr>
		  <tr><td style="width:50px;">&nbsp;</td>
		  <td>
		   <table><tr>
		   <td style="width:343px;font-size:18px;font-weight:bold;">
		   <?php if($_REQUEST['C']==1 AND ($_REQUEST['G']!='L3' AND $_REQUEST['G']!='L4' AND $_REQUEST['G']!='L5' AND $_REQUEST['G']!='MG' AND $_REQUEST['E']!=263)){echo 'Human Resource';}
		         elseif($_REQUEST['C']==1 AND ($_REQUEST['G']=='L3' OR $_REQUEST['G']=='L4' OR $_REQUEST['G']=='L5' OR $_REQUEST['G']=='MG' OR $_REQUEST['E']==263)){echo 'Director\Managing Director';}
		            elseif($_REQUEST['C']==3 AND $_REQUEST['E']!=254) {echo 'National Head'; }
		            elseif($_REQUEST['C']==3 AND $_REQUEST['E']==254) {echo 'Managing Director'; } ?>
		   </td>
		   <td style="width:342px;font-size:18px;font-weight:bold;" align="right">
		   <?php //if($_REQUEST['D']==98 OR $_REQUEST['D']==115 OR $_REQUEST['D']==116 OR $_REQUEST['D']==117) { echo 'Director'; }?>
		   </td>
		   </tr></table>		   
		   </td>
		  <td style="width:50px;">&nbsp;</td></tr>
		</table>
	  </td>
	 </tr>	 	 
   </table>
 </td>
</tr> 
<?php } ?>

</table>  
 
</body>
</html>

