<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
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
<Script type="text/javascript" language="javascript">
function SelectMxId(mxid)
{ var dd=document.getElementById("Dept").value; 
  window.location='EmpInvestDecl.php?ls=10&wer=123&aa=grtd&er=er%re%tr%rr&trt=equalthen&sys=%tr%tr&se=reew&w=ee102&mxid='+mxid+'&dd='+dd+'&ee=s1s&aa=grtd'; }
function SelectDept(dd)
{ var mxid=document.getElementById("mxid").value; 
  window.location='EmpInvestDecl.php?ls=10&wer=123&aa=grtd&er=er%re%tr%rr&trt=equalthen&sys=%tr%tr&se=reew&w=ee102&mxid='+mxid+'&dd='+dd+'&ee=s1s&aa=grtd'; }


function PrintInvestDel(P,EI,M)
{ var YI=document.getElementById("YearId").value; var CI=document.getElementById("ComId").value;
  window.open("InvestDeclcomPrint.php?action=Print&EI="+EI+"&YI="+YI+"&CI="+CI+"&P="+P+"&M="+M,"PrintForm","location=no,scrollbars=yes,resizable=no,menubar=no,width=950,height=700");
}

function ReDir(P,EI,M,Mx,d)
{ var agree=confirm("Are you sure..?");
  if (agree) { var x = 'EmpInvestDecl.php?act=ReDir&wer=123&aa=grtd&er=er%re%tr%rr&trt=equalthen&P='+P+'&EI='+EI+'&M='+M+'&se=reew&w=ee102&mxid='+Mx+'&dd='+d+'&ee=s1s&aa=grtd';  window.location=x;}}

function PrintInvestDelFormate(P,EI,M)
{ var YI=document.getElementById("YearId").value; var CI=document.getElementById("ComId").value;
  window.open("InvestDeclPrintFormate.php?action=Print&EI="+EI+"&YI="+YI+"&CI="+CI+"&P="+P+"&M="+M,"PrintForm","location=no,scrollbars=yes,resizable=no,menubar=no,width=50,height=70");
} 

</Script>
</head>
<body class="body">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" name="DeId" id="DeId" value="<?php echo $_REQUEST['dd']; ?>" />
<table class="table" border="0">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center" width="100%" id="MainWindow">
<?php //************************************************ ?>
<?php //***********START*****START*****START******START******START************ ?>
<?php //************************************************************ ?>
<table border="0" style="margin-top:0px; width:95%; height:400px;">
	<tr>
		<td align="" width="100%" valign="top">
		   <table border="0">
       		 <tr><td colspan="2">		 
			       <table border="0">
                     <tr>
					 <td colspan="12" align="left" class="heading">Employee Investment Declaration Report Year &nbsp; 					 
<select style="font-size:14px;width:150px;background-color:#DDFFBB;font-family:Times New Roman;" name="mxid" id="mxid" onChange="SelectMxId(this.value)">
<?php $Ms=mysql_query("select Period,Month from hrm_investdecl_ym where YMId=".$_REQUEST['mxid'], $con); $resMs=mysql_fetch_array($Ms);
if($resMs['Month']==1){$m1='January';}elseif($resMs['Month']==2){$m1='February';}elseif($resMs['Month']==3){$m1='March';}elseif($resMs['Month']==4){$m1='April';}elseif($resMs['Month']==5){$m1='May';}elseif($resMs['Month']==6){$m1='June';}elseif($resMs['Month']==7){$m1='July';}elseif($resMs['Month']==8){$m1='August';}elseif($resMs['Month']==9){$m1='September';}elseif($resMs['Month']==10){$m1='October';}elseif($resMs['Month']==11){$m1='November';}elseif($resMs['Month']==12){$m1='December';} ?>						
<option value="<?php echo $_REQUEST['mxid']; ?>" style="margin-left:0px;" selected>&nbsp;<?php echo $resMs['Period'].' - '.$m1; ?></option>
<?php $sqlDp=mysql_query("select * from hrm_investdecl_ym where CompanyId=".$CompanyId." order by YMId DESC", $con); $Sno=1; while($resDp=mysql_fetch_array($sqlDp)){
 if($resDp['Month']==1){$m='January';}elseif($resDp['Month']==2){$m='February';}elseif($resDp['Month']==3){$m='March';}elseif($resDp['Month']==4){$m='April';}elseif($resDp['Month']==5){$m='May';}elseif($resDp['Month']==6){$m='June';}elseif($resDp['Month']==7){$m='July';}elseif($resDp['Month']==8){$m='August';}elseif($resDp['Month']==9){$m='September';}elseif($resDp['Month']==10){$m='October';}elseif($resDp['Month']==11){$m='November';}elseif($resDp['Month']==12){$m='December';} ?>						
<option value="<?php echo $resDp['YMId']; ?>">&nbsp;<?php echo $resDp['Period'].' - '.$m; ?></option><?php } ?>
</select>&nbsp;<span id="ReturnValue">&nbsp;</span></td>
					  
					  <td class="td1" style="font-size:11px; width:138px;" align="right">
<?php if($_REQUEST['dd']!='All'){ $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['dd'], $con); $resDept=mysql_fetch_assoc($sqlDept); $dept=$resDept['DepartmentCode'];}if($_REQUEST['dd']=='All'){$dept='All';} ?>					  
<select style="font-size:14px;width:140px;background-color:#DDFFBB;font-family:Times New Roman;" name="Dept" id="Dept" onChange="SelectDept(this.value)"><option value="<?php echo $_REQUEST['dd']; ?>" style="margin-left:0px;" selected>&nbsp;<?php echo $dept; ?></option>
<?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
                       <option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?>
					   <option value="All">&nbsp;All</option>
					   </select></td>
                                           <td align="center" style="" class="All_100"><a href="#" onClick="PrintInvestDelFormate('<?php echo $resMs['Period']; ?>',<?php echo '0,'.$resMs['Month']; ?>)"><i><b>Formate</b></i></a></td> 
					 </tr>
                  </table>
				</td>
			 </tr>
<?php //---------------------------------------Display Record--------------------- ?>
<?php if($_REQUEST['dd']!='') { ?>
<tr>
 <td>
   <table border="1" width="900" cellspacing="1">
<tr bgcolor="#7a6189">
    <td align="center" style="color:#FFFFFF;" class="All_40"><b>SNo.</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_60"><b>EmpCode</b></td>
	<td align="center" class="All_200" style="color:#FFFFFF; width:300px;"><b>Name</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>Department</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_50"><b>Status</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_50"><b>Details</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Save</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Submitted</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Reset</b></td>
	
 </tr>
<?php if($_REQUEST['dd']=='All') { $sql = mysql_query("SELECT hrm_employee.*, DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId, $con); }
      else { $sql = mysql_query("SELECT hrm_employee.*, DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$_REQUEST['dd'], $con); }
$no=1; while($res = mysql_fetch_array($sql)) { ?>
<tr id="TR_<?php echo $no; ?>" <?php if($res['ExtraAllowPMS']==1) { ?> bgcolor="#2C9326" <?php } else { ?> bgcolor="#FFFFFF" <?php } ?> >
    <td align="center" style="" class="All_40"><?php echo $no; ?></td>
    <td align="center" style="" class="All_60"><?php echo $res['EmpCode']; ?></td>
	<td align="" style="" class="All_100">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
<?php $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con);  $resDept=mysql_fetch_assoc($sqlDept); ?> 
	<td align="" style="" class="All_100">&nbsp;<?php echo $resDept['DepartmentCode']; ?></td>
<?php $Ms2=mysql_query("select Period,Month from hrm_investdecl_ym where YMId=".$_REQUEST['mxid'], $con); $resMs2=mysql_fetch_array($Ms2);
$sqlID=mysql_query("select FormSubmit,Inv_Date,SubmittedDate from hrm_employee_investment_declaration where EmployeeID=".$res['EmployeeID']." AND Period='".$resMs2['Period']."' AND Month=".$resMs2['Month'], $con); $rowID=mysql_num_rows($sqlID);  $resID=mysql_fetch_assoc($sqlID); ?>	

	<td align="center" style="" class="All_100"><?php if($resID['FormSubmit']=='N'){echo 'NO';}elseif($resID['FormSubmit']=='Y'){echo 'Process';}elseif($resID['FormSubmit']=='YY'){echo 'YES'; } else {echo '&nbsp;';}?></td>
	<td align="center" style="" class="All_100">
	<?php if($resID['FormSubmit']=='Y' OR $resID['FormSubmit']=='YY') { ?><a href="#" onClick="PrintInvestDel('<?php echo $resMs2['Period']; ?>',<?php echo $res['EmployeeID'].', '.$resMs2['Month']; ?>)">Details</a><?php } ?></td>
	<td align="center" style="" class="All_80"><?php if($resID['Inv_Date']=='0000-00-00' OR $resID['Inv_Date']=='' OR $resID['Inv_Date']=='1970-01-01'){echo '&nbsp;';} elseif($resID['Inv_Date']!='0000-00-00') {echo date("d-M-y", strtotime($resID['Inv_Date'])); } ?></td>
	<td align="center" style="" class="All_80" bgcolor="#6AB5FF"><?php if($resID['SubmittedDate']=='0000-00-00' OR $resID['SubmittedDate']=='' OR $resID['SubmittedDate']=='1970-01-01'){echo '&nbsp;';} elseif($resID['SubmittedDate']!='0000-00-00') {echo date("d-M-y", strtotime($resID['SubmittedDate'])); } ?></td>
	<td align="center"> 
<?php if($_SESSION['User_Permission']=='Edit'){?>
<?php $sql33=mysql_query("select C_YearId from hrm_investdecl_setting where CompanyId=".$CompanyId." AND Status='A'", $con); $res33=mysql_fetch_array($sql33);
	  $sqlCy=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$res33['C_YearId'], $con); $resCy=mysql_fetch_array($sqlCy);
	  $fc=date("Y",strtotime($resCy['FromDate'])); $tc=date("Y",strtotime($resCy['ToDate']));
      if($resID['FormSubmit']=='YY' AND $resMs2['Period']==$fc.'-'.$tc){ ?>
	  <?php /*?><a href="#"><img src="images/go-back-icon.png" onClick="ReDir('<?php echo $resMs2['Period']; ?>',<?php echo $res['EmployeeID'].', '.$resMs2['Month'].', '.$_REQUEST['mxid'].', '.$_REQUEST['dd']; ?>)" border="0"></a><?php */?>
	  <?php } ?>
<?php } ?>
	</td>
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
       
		<?php //-------------------------------------------------------------------------------------------------------- ?>
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
<?php //************************************************************ ?>
<?php //***********END*****END*****END******END******END************* ?>
<?php //********************************************************* ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>