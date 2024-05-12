<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}else{header('Location:../index.php');}
//include("SetKraPmsy.php");
/******************************************************************************/
/*$sqlPM=mysql_query("select EmpPmsId, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Hod_TotalFinalScore, Hod_TotalFinalRating, HodSubmit_IncStatus from hrm_employee_pms where CompanyId=".$CompanyId." AND AssessmentYear=".$_SESSION['PmsYId']." AND HOD_EmployeeID=".$EmployeeId, $con); while($resPM=mysql_fetch_array($sqlPM))
{ if($resPM['HodSubmit_IncStatus']==2 AND ($resPM['Hod_TotalFinalScore']==0 OR $resPM['Hod_TotalFinalScore']==0.00) AND ($resPM['Hod_TotalFinalRating']==0 OR $resPM['Hod_TotalFinalRating']==0.00) AND $resPM['Reviewer_TotalFinalScore']>0 AND $resPM['Reviewer_TotalFinalRating']>0)
 {$sqlUpPM=mysql_query("update hrm_employee_pms set Hod_TotalFinalScore=".$resPM['Reviewer_TotalFinalScore'].", Hod_TotalFinalRating=".$resPM['Reviewer_TotalFinalRating']." where EmpPmsId=".$resPM['EmpPmsId']." AND CompanyId=".$CompanyId." AND AssessmentYear=".$_SESSION['PmsYId']." AND HOD_EmployeeID=".$EmployeeId, $con); }
}*/
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<link type="text/css" href="css/mycss.css" rel="stylesheet"/>
<script src="../AdminUser/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="../AdminUser/js/jquery.freezeheader.js"></script>
<script>$(document).ready(function () { $("#table1").freezeHeader({ 'height':'500px' }); })</script>
<script type="text/javascript" language="javascript">		
<!-- 
function doBlink() {
	var blink = document.all.tags("BLINK")
	for (var i=0; i<blink.length; i++)
		blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : "" 
}
function startBlink() {
	if (document.all)
		setInterval("doBlink()",1000)
}
window.onload = startBlink;
// -->
</script>
</head>
<body class="body">
<input type="hidden" id="PerValue" /><input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>"/>
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td>
 <table width="100%" style="margin-top:0px;">
  <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
  <tr>
   <td valign="top" style="background-image:url(images/pmsback.png);width:100%;">
   <table border="0" style="width:100%;height:500px;float:none;" cellpadding="0">
   <tr>
    <td valign="top" style="width:100%;">      
    <table border="0" id="Activity" style="width:100%;">
	<tr>
     <td style="width:100%;" valign="top">
	 <table border="0" style="width:100%;">
<?php //*************************************** Start ********************************************* ?>	
<?php //*************************************** Start ********************************************* ?>
					
<tr>
 <td>	 
 <table style="width:100%;">
<!--  Head Parts Open Open Open  --> 
<!--  Head Parts Open Open Open  --> 
 <tr>
  <td>
   <table>
    <tr>
<?php if($_SESSION['EmpType']=='E'){ ?>
<td align="center" valign="top"><a href="pms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>&ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&rr2=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=0&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_emp1" style="display:<?php if($_REQUEST['ee']==1){echo 'block';}else{echo 'none';} ?>;" src="images/emp1.png" border="0"/></a></td>

<?php } if($_SESSION['BtnApp']>0) { ?>
<td align="center" valign="top"><a href="ManagerPms.php?ee=1&aa=0&rr=1&rr2=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_manager1" style="display:<?php if($_REQUEST['aa']==1){echo 'block';}else{echo 'none';} ?>;" src="images/manager1.png" border="0"/></a></td></td>
		   
<?php } if($_SESSION['BtnRev']>0) { ?>
<td align="center" valign="top"><a href="HodPms.php?ee=1&aa=1&rr2=1&rr=0&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/hod1.png" border="0"/></a></td>

<?php } if($_SESSION['BtnRev2']>0) { ?>
<td align="center" valign="top"><a href="Rev2HodPms.php?ee=1&rr2=0&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/RevHod1.png" border="0"/></a></td>	
		   
<?php } if($_SESSION['BtnHod']>0) { ?>
<td align="center" valign="top"><img id="Img_hod1" src="images/m.png" border="0"/></td><?php } ?>

<?php /******************** Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg OPEN************/ ?>
<?php if($_SESSION['eMsg']=='Y'){ ?>
 <td>
 <?php $CuDate=date("Y-m-d"); if(($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y') AND $CuDate>=$_SESSION['hFrom'] AND $CuDate<=$_SESSION['hTo'] AND $_SESSION['hSts']=='A'){ $LastDate=$_SESSION['hTo']; $CurrentDate=date("Y-m-d");
		 $diff = abs(strtotime($LastDate) - strtotime($CurrentDate));
         $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/(60*60*24)); ?>
 <font class="msg_r"><font color="#00366C">&nbsp;&nbsp;PMS :</font><span class="blink_me"> <?php echo $days;?> Days Remaining! Last date : <?php echo date("d-F",strtotime($_SESSION['hTo'])); ?> </span></font>
 <?php } ?>
 </td>
<?php } ?>
<?php /******************** Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg CLOSE************/ ?>
 
	</tr>
   </table>
  </td>
 </tr>
 
 <tr><td style="vertical-align:top;width:100%;"><?php include("SetKraPmsmh.php"); ?></td></tr>
<!--  Head Parts Close Close Close  --> 
<!--  Head Parts Close Close Close  --> 
 
  <tr>
    <td style="width:100%;">
	  <table border="0" style="width:100%;">
	    <tr>
 
       <?php /****************************************** Form Start **************************/ ?>
		<?php /****************************************** Form Start **************************/ ?>
				
<?php /***************** Submitted **************************/ ?>		 
<input type="hidden" id="EmployeeId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />
<input type="hidden" id="FormMin5" value="0" /><input type="hidden" id="FormMax5" value="0" />
<?php $sqlRat=mysql_query("select ScoreFrom,ScoreTo,Rating from hrm_pms_rating where RatingStatus='A' AND CompanyId=".$CompanyId, $con); $Sn=1; while($resRat=mysql_fetch_array($sqlRat)) {  ?>
<input type="hidden" id="SFrom_<?php echo $Sn; ?>" value="<?php echo $resRat['ScoreFrom']; ?>" />
<input type="hidden" id="STo_<?php echo $Sn; ?>" value="<?php echo $resRat['ScoreTo']; ?>" />
<input type="hidden" id="Rating_<?php echo $Sn; ?>" value="<?php echo $resRat['Rating']; ?>" />
<?php $Sn++; } $n=$Sn-1; ?><input type="hidden" id="Number" value="<?php echo $n; ?>" />	 



 		  <td id="TeamDetails" style="display:block;width:100%;">
		  <table border="0" style="width:100%;">
<tr>
 <td style="width:100%;">
  <table border="0" style="width:100%;" cellspacing="0">
   <tr>
    <td class="formh" style="width:200px;">(<i>Overall Rating Graph</i>) :&nbsp;</td>
	<td style="font-family:Times New Roman;font-size:15px;font-weight:bold;">&nbsp;</td>
   </tr>
  </table>
 </td>
</tr> 	
<?php 

//Employee
$SqlE1=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Emp_TotalFinalRating=1 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowE1=mysql_num_rows($SqlE1); 
$SqlE2=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Emp_TotalFinalRating=2 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowE2=mysql_num_rows($SqlE2); 
$SqlE25=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Emp_TotalFinalRating=2.5 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowE25=mysql_num_rows($SqlE25); 
$SqlE27=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Emp_TotalFinalRating=2.7 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowE27=mysql_num_rows($SqlE27); 
$SqlE29=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Emp_TotalFinalRating=2.9 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowE29=mysql_num_rows($SqlE29); 
$SqlE3=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Emp_TotalFinalRating=3 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowE3=mysql_num_rows($SqlE3); 
$SqlE32=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Emp_TotalFinalRating=3.2 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowE32=mysql_num_rows($SqlE32); 
$SqlE34=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Emp_TotalFinalRating=3.4 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowE34=mysql_num_rows($SqlE34); 
$SqlE35=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Emp_TotalFinalRating=3.5 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowE35=mysql_num_rows($SqlE35); 
$SqlE37=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Emp_TotalFinalRating=3.7 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowE37=mysql_num_rows($SqlE37); 
$SqlE39=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Emp_TotalFinalRating=3.9 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowE39=mysql_num_rows($SqlE39); 
$SqlE4=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Emp_TotalFinalRating=4 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowE4=mysql_num_rows($SqlE4); 
$SqlE42=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Emp_TotalFinalRating=4.2 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowE42=mysql_num_rows($SqlE42); 
$SqlE44=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Emp_TotalFinalRating=4.4 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowE44=mysql_num_rows($SqlE44); 
$SqlE45=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Emp_TotalFinalRating=4.5 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowE45=mysql_num_rows($SqlE45); 
$SqlE47=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Emp_TotalFinalRating=4.7 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowE47=mysql_num_rows($SqlE47); 
$SqlE49=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Emp_TotalFinalRating=4.9 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowE49=mysql_num_rows($SqlE49); 
$SqlE5=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Emp_TotalFinalRating=5 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowE5=mysql_num_rows($SqlE5); 


//Appraiser
$SqlA1=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Appraiser_TotalFinalRating=1 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowA1=mysql_num_rows($SqlA1); 
$SqlA2=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Appraiser_TotalFinalRating=2 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowA2=mysql_num_rows($SqlA2); 
$SqlA25=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Appraiser_TotalFinalRating=2.5 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowA25=mysql_num_rows($SqlA25); 
$SqlA27=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Appraiser_TotalFinalRating=2.7 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowA27=mysql_num_rows($SqlA27); 
$SqlA29=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Appraiser_TotalFinalRating=2.9 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowA29=mysql_num_rows($SqlA29); 
$SqlA3=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Appraiser_TotalFinalRating=3 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowA3=mysql_num_rows($SqlA3); 
$SqlA32=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Appraiser_TotalFinalRating=3.2 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowA32=mysql_num_rows($SqlA32); 
$SqlA34=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Appraiser_TotalFinalRating=3.4 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowA34=mysql_num_rows($SqlA34); 
$SqlA35=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Appraiser_TotalFinalRating=3.5 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowA35=mysql_num_rows($SqlA35); 
$SqlA37=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Appraiser_TotalFinalRating=3.7 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowA37=mysql_num_rows($SqlA37); 
$SqlA39=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Appraiser_TotalFinalRating=3.9 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowA39=mysql_num_rows($SqlA39); 
$SqlA4=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Appraiser_TotalFinalRating=4 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowA4=mysql_num_rows($SqlA4); 
$SqlA42=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Appraiser_TotalFinalRating=4.2 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowA42=mysql_num_rows($SqlA42); 
$SqlA44=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Appraiser_TotalFinalRating=4.4 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowA44=mysql_num_rows($SqlA44); 
$SqlA45=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Appraiser_TotalFinalRating=4.5 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowA45=mysql_num_rows($SqlA45); 
$SqlA47=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Appraiser_TotalFinalRating=4.7 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowA47=mysql_num_rows($SqlA47); 
$SqlA49=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Appraiser_TotalFinalRating=4.9 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowA49=mysql_num_rows($SqlA49); 
$SqlA5=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Appraiser_TotalFinalRating=5 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowA5=mysql_num_rows($SqlA5); 


//Reviewer
$SqlR1=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=1 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowR1=mysql_num_rows($SqlR1); 
$SqlR2=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=2 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowR2=mysql_num_rows($SqlR2); 
$SqlR25=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=2.5 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowR25=mysql_num_rows($SqlR25); 
$SqlR27=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=2.7 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowR27=mysql_num_rows($SqlR27); 
$SqlR29=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=2.9 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowR29=mysql_num_rows($SqlR29); 
$SqlR3=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=3 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowR3=mysql_num_rows($SqlR3); 
$SqlR32=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=3.2 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowR32=mysql_num_rows($SqlR32); 
$SqlR34=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=3.4 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowR34=mysql_num_rows($SqlR34); 
$SqlR35=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=3.5 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowR35=mysql_num_rows($SqlR35); 
$SqlR37=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=3.7 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowR37=mysql_num_rows($SqlR37); 
$SqlR39=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=3.9 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowR39=mysql_num_rows($SqlR39); 
$SqlR4=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=4 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowR4=mysql_num_rows($SqlR4); 
$SqlR42=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=4.2 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowR42=mysql_num_rows($SqlR42); 
$SqlR44=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=4.4 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowR44=mysql_num_rows($SqlR44); 
$SqlR45=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=4.5 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowR45=mysql_num_rows($SqlR45); 
$SqlR47=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=4.7 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowR47=mysql_num_rows($SqlR47); 
$SqlR49=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=4.9 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowR49=mysql_num_rows($SqlR49); 
$SqlR5=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=5 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowR5=mysql_num_rows($SqlR5); 

//HOD
$SqlH1=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=1 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowH1=mysql_num_rows($SqlH1); 
$SqlH2=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=2 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowH2=mysql_num_rows($SqlH2); 
$SqlH25=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=2.5 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowH25=mysql_num_rows($SqlH25); 
$SqlH27=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=2.7 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowH27=mysql_num_rows($SqlH27); 
$SqlH29=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=2.9 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowH29=mysql_num_rows($SqlH29); 
$SqlH3=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=3 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowH3=mysql_num_rows($SqlH3); 
$SqlH32=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=3.2 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowH32=mysql_num_rows($SqlH32); 
$SqlH34=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=3.4 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowH34=mysql_num_rows($SqlH34); 
$SqlH35=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=3.5 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowH35=mysql_num_rows($SqlH35); 
$SqlH37=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=3.7 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowH37=mysql_num_rows($SqlH37); 
$SqlH39=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=3.9 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowH39=mysql_num_rows($SqlH39); 
$SqlH4=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=4 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowH4=mysql_num_rows($SqlH4); 
$SqlH42=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=4.2 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowH42=mysql_num_rows($SqlH42); 
$SqlH44=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=4.4 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowH44=mysql_num_rows($SqlH44); 
$SqlH45=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=4.5 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowH45=mysql_num_rows($SqlH45); 
$SqlH47=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=4.7 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowH47=mysql_num_rows($SqlH47); 
$SqlH49=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=4.9 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowH49=mysql_num_rows($SqlH49); 
$SqlH5=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating=5 AND p.HOD_EmployeeID=".$EmployeeId, $con); $RowH5=mysql_num_rows($SqlH5);
 
$vE1=number_format($RowE1, 0, '.', '');  $vE2=number_format($RowE2, 0, '.', ''); $vE25=number_format($RowE25, 0, '.', '');  $vE27=number_format($RowE27, 0, '.', ''); $vE29=number_format($RowE29, 0, '.', ''); $vE3=number_format($RowE3, 0, '.', ''); $vE32=number_format($RowE32, 0, '.', ''); $vE34=number_format($RowE34, 0, '.', ''); $vE35=number_format($RowE35, 0, '.', ''); $vE37=number_format($RowE37, 0, '.', ''); $vE39=number_format($RowE39, 0, '.', ''); $vE4=number_format($RowE4, 0, '.', '');
$vE42=number_format($RowE42, 0, '.', ''); $vE44=number_format($RowE44, 0, '.', ''); $vE45=number_format($RowE45, 0, '.', ''); $vE47=number_format($RowE47, 0, '.', ''); $vE49=number_format($RowE49, 0, '.', ''); $vE5=number_format($RowE5, 0, '.', ''); 

$vA1=number_format($RowA1, 0, '.', '');  $vA2=number_format($RowA2, 0, '.', ''); $vA25=number_format($RowA25, 0, '.', '');  $vA27=number_format($RowA27, 0, '.', ''); $vA29=number_format($RowA29, 0, '.', ''); $vA3=number_format($RowA3, 0, '.', ''); $vA32=number_format($RowA32, 0, '.', ''); $vA34=number_format($RowA34, 0, '.', ''); $vA35=number_format($RowA35, 0, '.', ''); $vA37=number_format($RowA37, 0, '.', ''); $vA39=number_format($RowA39, 0, '.', ''); $vA4=number_format($RowA4, 0, '.', '');
$vA42=number_format($RowA42, 0, '.', ''); $vA44=number_format($RowA44, 0, '.', ''); $vA45=number_format($RowA45, 0, '.', ''); $vA47=number_format($RowA47, 0, '.', ''); $vA49=number_format($RowA49, 0, '.', ''); $vA5=number_format($RowA5, 0, '.', ''); 

$vR1=number_format($RowR1, 0, '.', '');  $vR2=number_format($RowR2, 0, '.', ''); $vR25=number_format($RowR25, 0, '.', '');  $vR27=number_format($RowR27, 0, '.', ''); $vR29=number_format($RowR29, 0, '.', ''); $vR3=number_format($RowR3, 0, '.', ''); $vR32=number_format($RowR32, 0, '.', ''); $vR34=number_format($RowR34, 0, '.', ''); $vR35=number_format($RowR35, 0, '.', ''); $vR37=number_format($RowR37, 0, '.', ''); $vR39=number_format($RowR39, 0, '.', ''); $vR4=number_format($RowR4, 0, '.', '');
$vR42=number_format($RowR42, 0, '.', ''); $vR44=number_format($RowR44, 0, '.', ''); $vR45=number_format($RowR45, 0, '.', ''); $vR47=number_format($RowR47, 0, '.', ''); $vR49=number_format($RowR49, 0, '.', ''); $vR5=number_format($RowR5, 0, '.', ''); 

$vH1=number_format($RowH1, 0, '.', '');  $vH2=number_format($RowH2, 0, '.', ''); $vH25=number_format($RowH25, 0, '.', '');  $vH27=number_format($RowH27, 0, '.', ''); $vH29=number_format($RowH29, 0, '.', ''); $vH3=number_format($RowH3, 0, '.', ''); $vH32=number_format($RowH32, 0, '.', ''); $vH34=number_format($RowH34, 0, '.', ''); $vH35=number_format($RowH35, 0, '.', ''); $vH37=number_format($RowH37, 0, '.', ''); $vH39=number_format($RowH39, 0, '.', ''); $vH4=number_format($RowH4, 0, '.', '');
$vH42=number_format($RowH42, 0, '.', ''); $vH44=number_format($RowH44, 0, '.', ''); $vH45=number_format($RowH45, 0, '.', ''); $vH47=number_format($RowH47, 0, '.', ''); $vH49=number_format($RowH49, 0, '.', ''); $vH5=number_format($RowH5, 0, '.', ''); 
?>
<tr>
  <td style="width:100%;">
  <table border="0">
   <tr>
	<td style="width:100%;">
	<table border="1" cellspacing="0" style="width:100%;">
	 <tr style="height:24px;">
	  <td class="th" style="width:100px;text-align:left;">&nbsp;Rating</td>
	  <td class="tr1">1.0</td><td class="tr1">2.0</td><td class="tr1">2.5</td><td class="tr1">2.7</td>
	  <td class="tr1">2.9</td><td class="tr1">3.0</td><td class="tr1">3.2</td><td class="tr1">3.4</td>
	  <td class="tr1">3.5</td><td class="tr1">3.7</td><td class="tr1">3.9</td><td class="tr1">4.0</td>
	  <td class="tr1">4.2</td><td class="tr1">4.4</td><td class="tr1">4.5</td><td class="tr1">4.7</td>
	  <td class="tr1">4.9</td><td class="tr1">5.0</td>
     </tr>
	 <tr bgcolor="#FF80FF">
		<td class="th" style="width:100px;text-align:left;">&nbsp;Employee</td>
		<td class="tr3" style="font-weight:<?php if($vE1>0){echo 'bold'; }?>;"><?php echo $vE1; ?></td>
	    <td class="tr3" style="font-weight:<?php if($vE2>0){echo 'bold'; }?>;"><?php echo $vE2; ?></td>
	    <td class="tr3" style="font-weight:<?php if($vE25>0){echo 'bold'; }?>;"><?php echo $vE25; ?></td>
	    <td class="tr3" style="font-weight:<?php if($vE27>0){echo 'bold'; }?>;"><?php echo $vE27; ?></td>
	    <td class="tr3" style="font-weight:<?php if($vE29>0){echo 'bold'; }?>;"><?php echo $vE29; ?></td>
	    <td class="tr3" style="font-weight:<?php if($vE3>0){echo 'bold'; }?>;"><?php echo $vE3; ?></td>
	    <td class="tr3" style="font-weight:<?php if($vE32>0){echo 'bold'; }?>;"><?php echo $vE32; ?></td>
	    <td class="tr3" style="font-weight:<?php if($vE34>0){echo 'bold'; }?>;"><?php echo $vE34; ?></td>
	    <td class="tr3" style="font-weight:<?php if($vE35>0){echo 'bold'; }?>;"><?php echo $vE35; ?></td>
	    <td class="tr3" style="font-weight:<?php if($vE37>0){echo 'bold'; }?>;"><?php echo $vE37; ?></td>
	    <td class="tr3" style="font-weight:<?php if($vE39>0){echo 'bold'; }?>;"><?php echo $vE39; ?></td>
	    <td class="tr3" style="font-weight:<?php if($vE4>0){echo 'bold'; }?>;"><?php echo $vE4; ?></td>
	    <td class="tr3" style="font-weight:<?php if($vE42>0){echo 'bold'; }?>;"><?php echo $vE42; ?></td>
	    <td class="tr3" style="font-weight:<?php if($vE44>0){echo 'bold'; }?>;"><?php echo $vE44; ?></td>
	    <td class="tr3" style="font-weight:<?php if($vE45>0){echo 'bold'; }?>;"><?php echo $vE45; ?></td>
	    <td class="tr3" style="font-weight:<?php if($vE47>0){echo 'bold'; }?>;"><?php echo $vE47; ?></td>
	    <td class="tr3" style="font-weight:<?php if($vE49>0){echo 'bold'; }?>;"><?php echo $vE49; ?></td>
	    <td class="tr3" style="font-weight:<?php if($vE5>0){echo 'bold'; }?>;"><?php echo $vE5; ?></td>
		</tr>
		<tr bgcolor="#4AA5FF">
		<td class="th" style="width:100px;text-align:left;">&nbsp;Appraiser</td>
		<td class="tr4" style="font-weight:<?php if($vA1>0){echo 'bold'; }?>;"><?php echo $vA1; ?></td>
	    <td class="tr4" style="font-weight:<?php if($vA2>0){echo 'bold'; }?>;"><?php echo $vA2; ?></td>
	    <td class="tr4" style="font-weight:<?php if($vA25>0){echo 'bold'; }?>;"><?php echo $vA25; ?></td>
	    <td class="tr4" style="font-weight:<?php if($vA27>0){echo 'bold'; }?>;"><?php echo $vA27; ?></td>
	    <td class="tr4" style="font-weight:<?php if($vA29>0){echo 'bold'; }?>;"><?php echo $vA29; ?></td>
	    <td class="tr4" style="font-weight:<?php if($vA3>0){echo 'bold'; }?>;"><?php echo $vA3; ?></td>
	    <td class="tr4" style="font-weight:<?php if($vA32>0){echo 'bold'; }?>;"><?php echo $vA32; ?></td>
	    <td class="tr4" style="font-weight:<?php if($vA34>0){echo 'bold'; }?>;"><?php echo $vA34; ?></td>
	    <td class="tr4" style="font-weight:<?php if($vA35>0){echo 'bold'; }?>;"><?php echo $vA35; ?></td>
	    <td class="tr4" style="font-weight:<?php if($vA37>0){echo 'bold'; }?>;"><?php echo $vA37; ?></td>
	    <td class="tr4" style="font-weight:<?php if($vA39>0){echo 'bold'; }?>;"><?php echo $vA39; ?></td>
	    <td class="tr4" style="font-weight:<?php if($vA4>0){echo 'bold'; }?>;"><?php echo $vA4; ?></td>
	    <td class="tr4" style="font-weight:<?php if($vA42>0){echo 'bold'; }?>;"><?php echo $vA42; ?></td>
	    <td class="tr4" style="font-weight:<?php if($vA44>0){echo 'bold'; }?>;"><?php echo $vA44; ?></td>
	    <td class="tr4" style="font-weight:<?php if($vA45>0){echo 'bold'; }?>;"><?php echo $vA45; ?></td>
	    <td class="tr4" style="font-weight:<?php if($vA47>0){echo 'bold'; }?>;"><?php echo $vA47; ?></td>
	    <td class="tr4" style="font-weight:<?php if($vA49>0){echo 'bold'; }?>;"><?php echo $vA49; ?></td>
	    <td class="tr4" style="font-weight:<?php if($vA5>0){echo 'bold'; }?>;"><?php echo $vA5; ?></td>
		</tr>
		<tr bgcolor="">
		<td class="th" style="width:100px;text-align:left;">&nbsp;Reviewer</td>
		<td class="tr5" style="font-weight:<?php if($vR1>0){echo 'bold'; }?>;"><?php echo $vR1; ?></td>
	    <td class="tr5" style="font-weight:<?php if($vR2>0){echo 'bold'; }?>;"><?php echo $vR2; ?></td>
	    <td class="tr5" style="font-weight:<?php if($vR25>0){echo 'bold'; }?>;"><?php echo $vR25; ?></td>
	    <td class="tr5" style="font-weight:<?php if($vR27>0){echo 'bold'; }?>;"><?php echo $vR27; ?></td>
	    <td class="tr5" style="font-weight:<?php if($vR29>0){echo 'bold'; }?>;"><?php echo $vR29; ?></td>
	    <td class="tr5" style="font-weight:<?php if($vR3>0){echo 'bold'; }?>;"><?php echo $vR3; ?></td>
	    <td class="tr5" style="font-weight:<?php if($vR32>0){echo 'bold'; }?>;"><?php echo $vR32; ?></td>
	    <td class="tr5" style="font-weight:<?php if($vR34>0){echo 'bold'; }?>;"><?php echo $vR34; ?></td>
	    <td class="tr5" style="font-weight:<?php if($vR35>0){echo 'bold'; }?>;"><?php echo $vR35; ?></td>
	    <td class="tr5" style="font-weight:<?php if($vR37>0){echo 'bold'; }?>;"><?php echo $vR37; ?></td>
	    <td class="tr5" style="font-weight:<?php if($vR39>0){echo 'bold'; }?>;"><?php echo $vR39; ?></td>
	    <td class="tr5" style="font-weight:<?php if($vR4>0){echo 'bold'; }?>;"><?php echo $vR4; ?></td>
	    <td class="tr5" style="font-weight:<?php if($vR42>0){echo 'bold'; }?>;"><?php echo $vR42; ?></td>
	    <td class="tr5" style="font-weight:<?php if($vR44>0){echo 'bold'; }?>;"><?php echo $vR44; ?></td>
	    <td class="tr5" style="font-weight:<?php if($vR45>0){echo 'bold'; }?>;"><?php echo $vR45; ?></td>
	    <td class="tr5" style="font-weight:<?php if($vR47>0){echo 'bold'; }?>;"><?php echo $vR47; ?></td>
	    <td class="tr5" style="font-weight:<?php if($vR49>0){echo 'bold'; }?>;"><?php echo $vR49; ?></td>
	    <td class="tr5" style="font-weight:<?php if($vR5>0){echo 'bold'; }?>;"><?php echo $vR5; ?></td>
		</tr>
		<tr bgcolor="">
		<td class="th" style="width:100px;text-align:left;">&nbsp;HOD</td>
		<td class="tr6" style="font-weight:<?php if($vH1>0){echo 'bold'; }?>;"><?php echo $vH1; ?></td>
	    <td class="tr6" style="font-weight:<?php if($vH2>0){echo 'bold'; }?>;"><?php echo $vH2; ?></td>
	    <td class="tr6" style="font-weight:<?php if($vH25>0){echo 'bold'; }?>;"><?php echo $vH25; ?></td>
	    <td class="tr6" style="font-weight:<?php if($vH27>0){echo 'bold'; }?>;"><?php echo $vH27; ?></td>
	    <td class="tr6" style="font-weight:<?php if($vH29>0){echo 'bold'; }?>;"><?php echo $vH29; ?></td>
	    <td class="tr6" style="font-weight:<?php if($vH3>0){echo 'bold'; }?>;"><?php echo $vH3; ?></td>
	    <td class="tr6" style="font-weight:<?php if($vH32>0){echo 'bold'; }?>;"><?php echo $vH32; ?></td>
	    <td class="tr6" style="font-weight:<?php if($vH34>0){echo 'bold'; }?>;"><?php echo $vH34; ?></td>
	    <td class="tr6" style="font-weight:<?php if($vH35>0){echo 'bold'; }?>;"><?php echo $vH35; ?></td>
	    <td class="tr6" style="font-weight:<?php if($vH37>0){echo 'bold'; }?>;"><?php echo $vH37; ?></td>
	    <td class="tr6" style="font-weight:<?php if($vH39>0){echo 'bold'; }?>;"><?php echo $vH39; ?></td>
	    <td class="tr6" style="font-weight:<?php if($vH4>0){echo 'bold'; }?>;"><?php echo $vH4; ?></td>
	    <td class="tr6" style="font-weight:<?php if($vH42>0){echo 'bold'; }?>;"><?php echo $vH42; ?></td>
	    <td class="tr6" style="font-weight:<?php if($vH44>0){echo 'bold'; }?>;"><?php echo $vH44; ?></td>
	    <td class="tr6" style="font-weight:<?php if($vH45>0){echo 'bold'; }?>;"><?php echo $vH45; ?></td>
	    <td class="tr6" style="font-weight:<?php if($vH47>0){echo 'bold'; }?>;"><?php echo $vH47; ?></td>
	    <td class="tr6" style="font-weight:<?php if($vH49>0){echo 'bold'; }?>;"><?php echo $vH49; ?></td>
	    <td class="tr6" style="font-weight:<?php if($vH5>0){echo 'bold'; }?>;"><?php echo $vH5; ?></td>
		</tr>
	   </table>
	  </td>
	 </tr>
     <tr>
   <?php //************************************************ Start ******************************// ?>
   <?php //************************************************ Start ******************************// ?>
   <td style="width:100%;" id="EmpAppInc" style="display:block;" colspan="2">
     <span id="MyTeamIncSpan"></span>	   
	 <span id="MyTeamInc">	   
	 <table border="0" style="width:100%;">
	  <tr>
       <td style="width:100%;" valign="top">
       <table>
        <tr>
		 <td style="width:750px; height:300px; border:0; border-style:hidden;" valign="top" align="center">
	     <iframe name="Giframe" src="HODOverallLinRatingGraph.php" style="width:800px; height:300px; border:0; border-style:hidden;"></iframe></td>
	    </tr>
       </table>
       </td>
      </tr> 
	 </table>
	 </span>		
	</td>
    <td id="EmpAppraisalInc" style=""></td>
   <?php //************************************************ Close ******************************// ?>
   <?php //************************************************ Close ******************************// ?>	  
   </tr>
  </table>
  </td>
 </tr>
</table>
</td> 
</form>		 
		</tr>
	  </table>
	</td>
   </tr> 
  </table>
 </td>
</tr>					
<?php //******************************** Close **************************************** ?>					
				  </table>
				 </td>
			  </tr>
			  </form>
			</table>
           </td>
			  </tr>
	        </table>
<?php //************************************************************************ ?>
		   </td>
		  </tr>
		</table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>


