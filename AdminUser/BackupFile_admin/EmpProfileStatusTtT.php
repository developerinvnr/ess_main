<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//****************************************************************************************************************
if($_REQUEST['act']=='ReDir' AND $_REQUEST['EI']!='')
{ $sqlE=mysql_query("select * from hrm_employee_procertify_noc where EmployeeID=".$_REQUEST['EI']." AND Year=".$_REQUEST['y']." AND Month=".$_REQUEST['m'], $con); $resE=mysql_fetch_assoc($sqlE);
  if($resE['EmpPer_Status']=='N'){ $sqlU=mysql_query("update hrm_employee_procertify_noc set EmpPer_Status='Y' where EmployeeID=".$_REQUEST['EI']." AND Year=".$_REQUEST['y']." AND Month=".$_REQUEST['m'], $con); }
  if($resE['EmpCon_Status']=='N'){ $sqlU=mysql_query("update hrm_employee_procertify_noc set EmpCon_Status='Y' where EmployeeID=".$_REQUEST['EI']." AND Year=".$_REQUEST['y']." AND Month=".$_REQUEST['m'], $con); }
  if($resE['EmpFam_Status']=='N'){ $sqlU=mysql_query("update hrm_employee_procertify_noc set EmpFam_Status='Y' where EmployeeID=".$_REQUEST['EI']." AND Year=".$_REQUEST['y']." AND Month=".$_REQUEST['m'], $con); }
  if($resE['EmpEdu_Status']=='N'){ $sqlU=mysql_query("update hrm_employee_procertify_noc set EmpEdu_Status='Y' where EmployeeID=".$_REQUEST['EI']." AND Year=".$_REQUEST['y']." AND Month=".$_REQUEST['m'], $con); }
  
  
 if($resE['EmpPer_Status']=='N' OR $resE['EmpCon_Status']=='N' OR $resE['EmpFam_Status']=='N' OR $resE['EmpEdu_Status']=='N')
 {
  $sqlR=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID where g.EmployeeID=".$_REQUEST['EI'], $con); $resR=mysql_fetch_assoc($sqlR); 
  
  if($resR['DR']=='Y'){$M2='Dr.';} elseif($resR['Gender']=='M'){$M2='Mr.';} elseif($resR['Gender']=='F' AND $resR['Married']=='Y'){$M2='Mrs.';} elseif($resR['Gender']=='F' AND $resR['Married']=='N'){$M2='Miss.';}  $RName=$M2.' '.$resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname'];  
 
   if($resR['EmailId_Vnr']!='')
   {
	$email_to = $resR['EmailId_Vnr'];
    $email_from='admin@vnrseeds.co.in';
	$email_subject = "Profile Updating in ESS";  
	$headers = "From: " . $email_from . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
	$email_message .= "Dear <b>".$RName."</b> <br><br>\n\n\n";
    $email_message .="<html><head></head><body>";
    $email_message .= "Action has been taken on the profile details sent for updation.<br>";
	$email_message .= "Kindly check in ESS and certify profile.<br><br>\n\n\n";
	$email_message .= "From <br><b>ADMIN ESS</b><br>";
    $email_message .="</body></html>";	           
    $ok = @mail($email_to, $email_subject, $email_message, $headers);
   } 
 }
  
  
  
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
.All_40{font-size:11px; height:20px; width:40px;} .All_50{font-size:11px; height:20px; width:50px;} .All_70{font-size:11px; height:20px; width:70px;} .All_80{font-size:11px; height:20px; width:80px;}.All_100{font-size:11px; height:20px; width:100px;} .All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} .All_60{font-size:11px; height:20px; width:60px;}
.All_150{font-size:11px; height:20px; width:150px;}.All_170{font-size:11px; height:20px; width:170px;}.All_180{font-size:11px; height:20px; width:180px;}.All_190{font-size:11px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} .All_450{font-size:11px; height:20px; width:450px;}.All_360{font-size:11px; height:20px; width:350px;}.All_540{font-size:11px; height:20px; width:540px;}.All_400{font-size:11px; height:20px; width:400px;} .All_480{font-size:11px; height:20px; width:480px;}.All_600{font-size:11px; height:20px; width:600px;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style>.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</script>
<Script type="text/javascript" language="javascript">
function ReDir(EI)
{ var DeId=document.getElementById("DeId").value; var y=document.getElementById("y").value; var m=document.getElementById("m").value; 
  var mxid=document.getElementById("mxxId").value;
  
  var agree=confirm("Are you sure..?");
  if (agree) { var x = "EmpProfileStatusTtT.php?act=ReDir&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&mxid="+mxid+"&EI="+EI+"&value="+DeId+"&y="+y+"&m="+m+"&action=EmpProfile";  window.location=x;}}

function SelectMxId(mxid)
{ var DeId=document.getElementById("DeId").value; 
  window.location='EmpProfileStatusTtT.php?ls=10&wer=123&aa=grtd&er=er%re%tr%rr&trt=equalthen&sys=%tr%tr&se=reew&w=ee102&mxid='+mxid+'&value='+DeId+'&ee=s1s&aa=grtd'; }
  
function SelectDeptEmpprofile(v)
{ var y=document.getElementById("y").value; var m=document.getElementById("m").value; var mxid=document.getElementById("mxxId").value;
  window.location="EmpProfileStatusTtT.php?action=EmpProfile&ww=rightProtect&mm=er4e&r=t5t%s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&mxid="+mxid+"&value="+v+"&y="+y+"&m="+m;
}

function ClickEmpReason(EI,m,y)
{window.open("EmpProfileReasonTtT.php?id="+EI+"&y="+y+"&m="+m,"Profile","scrollbars=yes,resizable=no,width=500,height=400"); }
  
 
</Script>
</head>
<body class="body">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" name="DeId" id="DeId" value="<?php echo $_REQUEST['value']; ?>" />
<?php if($_REQUEST['mxid']>0){$max=$_REQUEST['mxid'];}else{$max=0;}
      $Ms=mysql_query("select Year,Month from hrm_employee_procertify_ym where PYmId=".$max, $con); $rowMs=mysql_num_rows($Ms); $resMs=mysql_fetch_array($Ms); ?>
<input type="hidden" name="y" id="y" value="<?php if($resMs['Year']>0){echo $resMs['Year'];}else{echo 0;} ?>" />
<input type="hidden" name="m" id="m" value="<?php if($resMs['Month']>0){echo $resMs['Month'];}else{echo 0;} ?>" />
<input type="hidden" name="mxxId" id="mxxId" value="<?php echo $_REQUEST['mxid']; ?>" />
<table class="table" border="0">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center" width="100%" id="MainWindow">
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<table border="0" style="margin-top:0px; width:95%; height:400px;">
	<tr>
		<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
		<td align="" width="100%" valign="top">
		   <table border="0">
       		 <tr><td colspan="2">
			       <table border="0">
                     <tr>
					  <td colspan="12" align="left" class="heading">Employee Profile Status [Time to Time] &nbsp;<span id="ReturnValue">&nbsp;</span></td>
					  <td>
					  <select style="font-size:12px;width:130px;height:20px;background-color:#DDFFBB;" name="mxid" id="mxid" onChange="SelectMxId(this.value)">
<?php $Ms=mysql_query("select Year,Month from hrm_employee_procertify_ym where PYmId=".$_REQUEST['mxid'], $con); $resMs=mysql_fetch_array($Ms);
if($resMs['Month']==1){$m1='January';}elseif($resMs['Month']==2){$m1='February';}elseif($resMs['Month']==3){$m1='March';}elseif($resMs['Month']==4){$m1='April';}elseif($resMs['Month']==5){$m1='May';}elseif($resMs['Month']==6){$m1='June';}elseif($resMs['Month']==7){$m1='July';}elseif($resMs['Month']==8){$m1='August';}elseif($resMs['Month']==9){$m1='September';}elseif($resMs['Month']==10){$m1='October';}elseif($resMs['Month']==11){$m1='November';}elseif($resMs['Month']==12){$m1='December';} ?>						
<option value="<?php echo $_REQUEST['mxid']; ?>" style="margin-left:0px;" selected>&nbsp;<?php echo strtoupper($m1.'-'.$resMs['Year']); ?></option>
<?php $sqlDp=mysql_query("select * from hrm_employee_procertify_ym where CompanyId=".$CompanyId." AND PYmId!=".$_REQUEST['mxid']." order by PYmId DESC", $con); 
$Sno=1; while($resDp=mysql_fetch_array($sqlDp)){
 if($resDp['Month']==1){$m='January';}elseif($resDp['Month']==2){$m='February';}elseif($resDp['Month']==3){$m='March';}elseif($resDp['Month']==4){$m='April';}elseif($resDp['Month']==5){$m='May';}elseif($resDp['Month']==6){$m='June';}elseif($resDp['Month']==7){$m='July';}elseif($resDp['Month']==8){$m='August';}elseif($resDp['Month']==9){$m='September';}elseif($resDp['Month']==10){$m='October';}elseif($resDp['Month']==11){$m='November';}elseif($resDp['Month']==12){$m='December';} ?>						
<option value="<?php echo $resDp['YMId']; ?>">&nbsp;<?php echo strtoupper($m.'-'.$resDp['Year']); ?></option><?php } ?>
</select>&nbsp;<span id="ReturnValue">&nbsp;</span></td>
					  
					  <td class="td1" style="font-size:11px; width:150px;" align="center">
                       <select style="font-size:12px;width:160px;height:20px; font-family:Times New Roman;background-color:#DDFFBB;" name="DeptEmpprofile" id="DeptEmpprofile" onChange="SelectDeptEmpprofile(this.value)">
<?php if($_REQUEST['value']>0){$SDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['value'], $con);$RDept=mysql_fetch_array($SDept); ?><option value="<?php echo $_REQUEST['value']; ?>" style="margin-left:0px;" selected><?php echo '&nbsp;'.strtoupper($RDept['DepartmentCode']);?></option><?php } else {?><option value="" style="margin-left:0px;" selected>SELECT DEPARTMENT</option><?php } ?>
<?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
                       <option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.strtoupper($ResDept['DepartmentCode']);?></option><?php } ?>
					   <option value="All">&nbsp;All</option>
					   </select></td>
					 </tr>
                  </table>
				</td>
			 </tr>
<?php //---------------------------------------Display Record----------------------------------------------------------------- ?>
<?php if($_REQUEST['action']=='EmpProfile') { ?>
<tr>
 <td>
   <table border="1" width="1000">
     <tr>
<?php if($_REQUEST['value']!='All') {$sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con);  $resA=mysql_fetch_assoc($sqlA); } ?>	
	  <td colspan="16" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;Profile Status ["Time to Time"] :
	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All') { echo $resA['DepartmentName'];  } else echo 'All';?>&nbsp;)&nbsp;&nbsp;&nbsp;
	 <?php  /* <a href="#" onClick="PrintAppRev(<?php if($_REQUEST['value']!='All') { echo $resA['DepartmentName'];  } else echo 'All';?>)" style="color:#F9F900; font-size:12px;">Print</a> */ ?>
	  </td>
	 </tr>
<tr bgcolor="#7a6189">
    <td align="center" style="color:#FFFFFF;" class="All_40"><b>SNo.</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_50"><b>EmpCode</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_250"><b>Name</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>Department</b></td>
	
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Personal</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Contact</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_80"><b>Family</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_80"><b>Education</b></td>
	
	<?php /*
    <td align="center" style="color:#FFFFFF;" class="All_80"><b>General</b></td>
    
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Experience</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Language</b></td>
	*/ ?>
	
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>Click</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Certify</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_40"><b></b></td>
	<?php /*
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>Change</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_40"><b>Clear</b></td>
	*/ ?>
 </tr>
<?php if($_REQUEST['value']=='All') { $sql = mysql_query("SELECT hrm_employee.*, DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by EmpCode ASC", $con); }
      else { $sql = mysql_query("SELECT hrm_employee.*, DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." order by EmpCode ASC", $con); }
$no=1; while($res = mysql_fetch_array($sql)) { ?>
<tr id="TR_<?php echo $no; ?>" <?php if($res['ExtraAllowPMS']==1) { ?> bgcolor="#2C9326" <?php } else { ?> bgcolor="#FFFFFF" <?php } ?> >
    <td align="center" style="" class="All_40"><?php echo $no; ?></td>
    <td align="center" style="" class="All_60"><?php echo $res['EmpCode']; ?></td>
	<td align="" style="" class="All_180">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
<?php $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con);  $resDept=mysql_fetch_assoc($sqlDept); ?> 
	<td align="" style="" class="All_120">&nbsp;<?php echo $resDept['DepartmentCode']; ?></td>
	
<?php $sps=mysql_query("select * from hrm_employee_procertify_noc where EmployeeID=".$res['EmployeeID']." AND Month=".$_REQUEST['m']." AND Year=".$_REQUEST['y'], $con); 
      $rowps=mysql_num_rows($sps); $rps=mysql_fetch_array($sps); ?>	
	
	<td align="center" style="background-color:<?php if($rps['EmpPer_Status']=='YY'){echo '#88FF88';}if($rps['EmpPer_Status']=='Y'){echo '#FFFFFF';}if($rps['EmpPer_Status']=='N'){echo '#FF7171';} ?>;"  class="All_80">
	<?php if($rps['EmpPer_Status']=='YY'){echo 'Agree';}if($rps['EmpPer_Status']=='Y'){echo 'NoAction';}if($rps['EmpPer_Status']=='N'){echo 'DisAgree';} ?></td>
	<td align="center" style="background-color:<?php if($rps['EmpCon_Status']=='YY'){echo '#88FF88';}if($rps['EmpCon_Status']=='Y'){echo '#FFFFFF';}if($rps['EmpCon_Status']=='N'){echo '#FF7171';} ?>;"  class="All_80">
	<?php if($rps['EmpCon_Status']=='YY'){echo 'Agree';}if($rps['EmpCon_Status']=='Y'){echo 'NoAction';}if($rps['EmpCon_Status']=='N'){echo 'DisAgree';} ?></td>	
	<td align="center" style="background-color:<?php if($rps['EmpFam_Status']=='YY'){echo '#88FF88';}if($rps['EmpFam_Status']=='Y'){echo '#FFFFFF';}if($rps['EmpFam_Status']=='N'){echo '#FF7171';} ?>;" class="All_80">
	<?php if($rps['EmpFam_Status']=='YY'){echo 'Agree';}if($rps['EmpFam_Status']=='Y'){echo 'NoAction';}if($rps['EmpFam_Status']=='N'){echo 'DisAgree';} ?></td>
        <td align="center" style="background-color:<?php if($rps['EmpEdu_Status']=='YY'){echo '#88FF88';}if($rps['EmpEdu_Status']=='Y'){echo '#FFFFFF';}if($rps['EmpEdu_Status']=='N'){echo '#FF7171';} ?>;"  class="All_80">
	<?php if($rps['EmpEdu_Status']=='YY'){echo 'Agree';}if($rps['EmpEdu_Status']=='Y'){echo 'NoAction';}if($rps['EmpEdu_Status']=='N'){echo 'DisAgree';} ?></td>  
	
	<?php /*
	<td align="center" style="background-color:<?php if($res['EmpGen_Status']=='YY'){echo '#88FF88';}if($res['EmpGen_Status']=='Y'){echo '#FFFFFF';}if($res['EmpGen_Status']=='N'){echo '#FF7171';} ?>;"  class="All_80">
	<?php if($res['EmpGen_Status']=='YY'){echo 'Agree';}if($res['EmpGen_Status']=='Y'){echo 'NoAction';}if($res['EmpGen_Status']=='N'){echo 'DisAgree';} ?></td>
	<td align="center" style="background-color:<?php if($res['EmpEdu_Status']=='YY'){echo '#88FF88';}if($res['EmpEdu_Status']=='Y'){echo '#FFFFFF';}if($res['EmpEdu_Status']=='N'){echo '#FF7171';} ?>;"  class="All_80">
	<?php if($res['EmpEdu_Status']=='YY'){echo 'Agree';}if($res['EmpEdu_Status']=='Y'){echo 'NoAction';}if($res['EmpEdu_Status']=='N'){echo 'DisAgree';} ?></td>
	<td align="center" style="background-color:<?php if($res['EmpExp_Status']=='YY'){echo '#88FF88';}if($res['EmpExp_Status']=='Y'){echo '#FFFFFF';}if($res['EmpExp_Status']=='N'){echo '#FF7171';} ?>;"  class="All_80">
	<?php if($res['EmpExp_Status']=='YY'){echo 'Agree';}if($res['EmpExp_Status']=='Y'){echo 'NoAction';}if($res['EmpExp_Status']=='N'){echo 'DisAgree';} ?></td>
	<td align="center" style="background-color:<?php if($res['EmpLang_Status']=='YY'){echo '#88FF88';}if($res['EmpLang_Status']=='Y'){echo '#FFFFFF';}if($res['EmpLang_Status']=='N'){echo '#FF7171';} ?>;" class="All_80">
	<?php if($res['EmpLang_Status']=='YY'){echo 'Agree';}if($res['EmpLang_Status']=='Y'){echo 'NoAction';}if($res['EmpLang_Status']=='N'){echo 'DisAgree';} ?></td>
	*/ ?>
	<td align="center" style="" class="All_80">
	<?php if($rowps>0 AND ($rps['EmpPer_Reason']!='' OR $rps['EmpCon_Reason']!='' OR $rps['EmpFam_Reason']!='')) {?>
	<a href="#" onClick="ClickEmpReason(<?php echo $rps['EmployeeID'].','.$_REQUEST['m'].','.$_REQUEST['y']; ?>)">Reason</a><?php } ?></td>
	
	<td align="center" style="background-color:<?php if($rps['ProfileCertify']=='Y'){echo '#88FF88';}if($rps['ProfileCertify']=='N'){echo '#FF7171';} ?>;" class="All_50"><?php if($rps['ProfileCertify']=='N') { echo 'NO';}if($rps['ProfileCertify']=='Y') { echo 'YES';}?></td>
	
	<td align="center">
<?php if($_SESSION['User_Permission']=='Edit'){?>
	<?php if($rps['EmpPer_Status']=='N' OR $rps['EmpCon_Status']=='N' OR $rps['EmpFam_Status']=='N') { ?>
	<a href="#"><img src="images/go-back-icon.png" onClick="ReDir(<?php echo $res['EmployeeID']; ?>)" border="0"></a>
	<?php } ?>
<?php } ?>
	</td>
	<?php /*
	<td align="center" style="" class="All_70">
	<?php if($res['ExtraChangeStatus']=='Y') {?><a href="#" onClick="ClickExtraEmpReason(<?php echo $res['EmployeeID']; ?>)">Reason</a><?php } ?></td>
	<td align="center">
<?php if($_SESSION['User_Permission']=='Edit'){?>
<a href="#"><img src="images/go-back-icon.png" onClick="ClearChange(<?php echo $res['EmployeeID']; ?>)" border="0"></a>
<?php } ?>
</td>
	*/ ?>
</tr>
<?php $no++;} ?> 
   </table>
 </td>
</tr> 
   </table>
 </td>
</tr> 
<?php } ?>
<?php //---------------------------------------Close Record----------------------------------------------------------------- ?>
	   </table>
     </tr>
</table>
		 </td> 
	   </tr>
	 </table>
   </td>
 </tr>
		   </table>
		    </form>  		
		</td>
        <?php } ?>
		<?php //-------------------------------------------------------------------------------------------------------- ?>
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
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