<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}else{header('Location:../index.php');}
//include("SetKraPmsy.php");
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
</head>
<body class="body">
 <input type="hidden" id="EmpId" value="" />
 <input type="hidden" id="YearId" value="<?php echo $YearId; ?>" /> 
 <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
 <input type="hidden" name="KraYId" id="KraYId" value="<?php echo $_SESSION['KraYId']; ?>" /> 
 <input type="hidden" name="PmsYId" id="PmsYId" value="<?php echo $_SESSION['PmsYId']; ?>" />
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
 <td style="background-image:url(images/pmsback.png);width:100%;">	 
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
<td align="center" valign="top"><img id="Img_hod" style="display:block;" src="images/hod.png" border="0"/></td>

<?php } if($_SESSION['BtnRev2']>0) { ?>
<td align="center" valign="top"><a href="Rev2HodPms.php?ee=1&rr2=0&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/RevHod1.png" border="0"/></a></td>	
		   
<?php } if($_SESSION['BtnHod']>0) { ?><td align="center" valign="top"><a href="RevHodPms.php?ee=1&rr2=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/m1.png" border="0"/></a></td><?php } ?>

<td><font class="msg_b"><i><?php echo $msg; ?></i></font><font class="formc"><span id="MsgSpan"></span></font></td>	 
	</tr>
   </table>
  </td>
 </tr>
 
 <tr><td style="vertical-align:top;width:100%;"><?php include("SetKraPmsmr.php"); ?></td></tr>
<!--  Head Parts Close Close Close  --> 
<!--  Head Parts Close Close Close  --> 
 
  <tr>
    <td style="width:100%;">
	  <table border="0" style="width:100%;">
	    <tr>
        <?php /****************************************** Form Start **************************/ ?>
		 
<?php /***************** AppraisalForm **************************/ ?>
<?php $SqlA=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_SESSION['PmsYId']." AND (Appraiser_EmployeeID=".$EmployeeId." OR Reviewer_EmployeeID=".$EmployeeId.")" , $con); $RowA=mysql_num_rows($SqlA); ?>
<form name="AppraisalForm" method="post" onSubmit="Validation(this)">	
 		 <td id="TeamDetails" style="display:block;width:100%;">
		  <table border="0"style="width:100%;">
<tr>
 <td style="width:100%;">
  <table border="0" style="width:100%;" cellspacing="0">
   <tr>
    <td class="formh" style="width:450px;">(<i>Overall Rating Graph including Appriaser & Reviewer</i>) :&nbsp;</td>
    <td class="fbody" align="Right" style="width:150px;"><b><i>Total Employee:</i></b>&nbsp;&nbsp;</td>
    <td class="fhead" style="background-color:#97FF97;width:50px;"><?php echo $RowA; ?></td>
    <td>&nbsp;</td>
   </tr>
  </table>
  </td>
 </tr>	
<?php 
$Sql1=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=1 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row1=mysql_num_rows($Sql1); $v1=number_format($Row1, 0, '.', ''); 

$Sql2=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=2 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row2=mysql_num_rows($Sql2); $v2=number_format($Row2, 0, '.', '');

$Sql25=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=2.5 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row25=mysql_num_rows($Sql25); $v25=number_format($Row25, 0, '.', '');
$Sql27=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=2.7 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row27=mysql_num_rows($Sql27); $v27=number_format($Row27, 0, '.', '');

$Sql29=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=2.9 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row29=mysql_num_rows($Sql29); $v29=number_format($Row29, 0, '.', ''); 

$Sql3=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=3 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row3=mysql_num_rows($Sql3); $v3=number_format($Row3, 0, '.', '');

$Sql32=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=3.2 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row32=mysql_num_rows($Sql32); $v32=number_format($Row32, 0, '.', ''); 

$Sql34=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=3.4 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row34=mysql_num_rows($Sql34); $v34=number_format($Row34, 0, '.', '');

$Sql35=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=3.5 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row35=mysql_num_rows($Sql35); $v35=number_format($Row35, 0, '.', '');

$Sql37=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=3.7 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row37=mysql_num_rows($Sql37); $v37=number_format($Row37, 0, '.', '');

$Sql39=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=3.9 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row39=mysql_num_rows($Sql39); $v39=number_format($Row39, 0, '.', '');

$Sql4=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=4 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row4=mysql_num_rows($Sql4); $v4=number_format($Row4, 0, '.', '');

$Sql42=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=4.2 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row42=mysql_num_rows($Sql42); $v42=number_format($Row42, 0, '.', '');

$Sql44=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=4.4 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row44=mysql_num_rows($Sql44); $v44=number_format($Row44, 0, '.', '');

$Sql45=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=4.5 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row45=mysql_num_rows($Sql45); $v45=number_format($Row45, 0, '.', '');

$Sql47=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=4.7 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row47=mysql_num_rows($Sql47); $v47=number_format($Row47, 0, '.', '');  

$Sql49=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=4.9 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row49=mysql_num_rows($Sql49); $v49=number_format($Row49, 0, '.', '');

$Sql5=mysql_query("select EmpPmsId from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_TotalFinalRating=5 AND (p.Appraiser_EmployeeID=".$EmployeeId." OR p.Reviewer_EmployeeID=".$EmployeeId.")", $con); $Row5=mysql_num_rows($Sql5); $v5=number_format($Row5, 0, '.', ''); 

$ActEmp=$Row1+$Row2+$Row25+$Row27+$Row29+$Row3+$Row32+$Row34+$Row35+$Row37+$Row39+$Row4+$Row42+$Row44+$Row45+$Row47+$Row49+$Row5;
?>  
<tr>
  <td style="width:100%;">
  <table border="0">
   <tr>
	<td style="width:100%;">
	<table border="1" cellspacing="0" style="width:100%;">
	 <tr style="height:24px;">
	  <td class="th" style="width:100px;">Rating</td>
	  <td class="tr1">1.0</td><td class="tr1">2.0</td><td class="tr1">2.5</td><td class="tr1">2.7</td>
	  <td class="tr1">2.9</td><td class="tr1">3.0</td><td class="tr1">3.2</td><td class="tr1">3.4</td>
	  <td class="tr1">3.5</td><td class="tr1">3.7</td><td class="tr1">3.9</td><td class="tr1">4.0</td>
	  <td class="tr1">4.2</td><td class="tr1">4.4</td><td class="tr1">4.5</td><td class="tr1">4.7</td>
	  <td class="tr1">4.9</td><td class="tr1">5.0</td>
     </tr>
	 <tr style="height:24px;">
	  <td class="th">Employee</td>
	  <td class="tr2"><?php echo $v1;?></td><td class="tr2"><?php echo $v2;?></td><td class="tr2"><?php echo $v25;?></td>
	  <td class="tr2"><?php echo $v27;?></td><td class="tr2"><?php echo $v29;?></td><td class="tr2"><?php echo $v3;?></td>
	  <td class="tr2"><?php echo $v32;?></td><td class="tr2"><?php echo $v34;?></td><td class="tr2"><?php echo $v35;?></td>
	  <td class="tr2"><?php echo $v37;?></td><td class="tr2"><?php echo $v39;?></td><td class="tr2"><?php echo $v4;?></td>
	  <td class="tr2"><?php echo $v42;?></td><td class="tr2"><?php echo $v44;?></td><td class="tr2"><?php echo $v45;?></td>
	  <td class="tr2"><?php echo $v47;?></td><td class="tr2"><?php echo $v49;?></td><td class="tr2"><?php echo $v5;?></td>
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
         <td style="width:750px;height:300px;border:0;border-style:hidden;" valign="top" align="center">
		 <iframe name="Giframe" src="RevOverallRatingGraph.php" style="width:750px; height:300px; border:0; border-style:hidden;"></iframe></td>
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




