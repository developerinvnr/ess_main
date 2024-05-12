<?php session_start();
if($_SESSION['login'] = true){require_once('../user/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../../../index.php');}
$EmployeeId=$_SESSION['EmployeeID'];

if($_REQUEST['action']=='ChangePerMission' AND $_REQUEST['eei']!='' AND $_REQUEST['ynv']!='') 
{ 
  if($_REQUEST['nn']==1)
  {
   $sqlUp=mysql_query("update hrm_sales_reporting_level set EditPerMi='".$_REQUEST['ynv']."' where EmployeeID=".$_REQUEST['eei'], $con); if($sqlUp AND $_REQUEST['ynv']=='Y'){ $sqlIns=mysql_query("update hrm_sales_emp_action set StatusA=0 where EmployeeID=".$_REQUEST['eei'], $con); }
  }
  elseif($_REQUEST['nn']==2)
  {
   $sqlUp=mysql_query("update hrm_sales_tlemp set EditPerMi='".$_REQUEST['ynv']."' where TLEId=".$_REQUEST['eei'], $con); 
   if($sqlUp AND $_REQUEST['ynv']=='Y'){ $sqlIns=mysql_query("update hrm_sales_emp_action_tle set StatusA=0 where TLEId=".$_REQUEST['eei'], $con); }
  }
}

if(isset($_POST['SummailMsg']))
{
  if($_POST['EEmail']!='')
  {
      $email_to = $_POST['EEmail'];
      $email_from='admin@vnrseeds.co.in';
      $email_subject = $_POST['mailSub'];
      $email_txt = $_POST['mailMsg']; 
      $headers = "From: ".$email_from22."\r\n"; 
      $semi_rand = md5(time()); 
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $email_message .="<html><head></head><body>";
	  $email_message .= "Dear <b>".$_POST['EName']."</b> <br><br>\n\n\n";
      $email_message .=$_POST['MailMsg'].", kindly details check sales plan.<br><br>\n\n";
	  $email_message .= "From <br><b>ADMIN ESS</b><br>";
      $email_message .="</body></html>";	      
	  $ok = @mail($email_to, $email_subject, $email_message, $headers);
	  //echo  $email_to .'<br>'.$email_subject.'<br>'.$email_message.'<br>'.$headers;
	  if($ok){ $Msg='Msg Sent Successfully...';}
  }
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style> /*background-color:#D9D9FF;  background-color:#EEEEEE; */
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.InputB{font-size:13px;width:60px;text-align:right;border:0px;font-weight:bold;background-color:#D9D9FF;} 
.Input{font-size:13px;width:60px;text-align:right;border:0px;background-color:#EEEEEE;}
.TInput{font-size:13px;width:60px;text-align:right;border:0px;background-color:#FFFFA6;font-weight:bold;}
.Trh60{text-align:center;width:60px;font-weight:bold;}
</style>
<Script type="text/javascript">//window.history.forward(1);</Script> 
<script type="text/javascript" language="javascript">
function ChangeHq(hq,v,no)
{ 
  window.location="SalesaEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+hq+"&y="+v+"&q="+document.getElementById("q").value+"&ii="+document.getElementById("ii").value+"&vc="+document.getElementById("vc").value+"&fc="+document.getElementById("fc").value+"&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+'&EHq='+document.getElementById("EHq").value+'&myh=1&myt='+document.getElementById("myt").value+'&no='+no; 
}

function ChangeTeam(hq,v,gv)
{
  window.location="SalesaEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+hq+"&y="+v+"&q="+document.getElementById("q").value+"&ii="+document.getElementById("ii").value+"&vc="+document.getElementById("vc").value+"&fc="+document.getElementById("fc").value+"&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+'&EHq='+document.getElementById("EHq").value+'&myh='+document.getElementById("myh").value+'&myt=1'; 
  
}

function ChngeEmpPerMi(v,n,e)
{ 
  window.location="SalesaEntryPerMi.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+document.getElementById("y").value+"&q="+document.getElementById("q").value+"&ii="+document.getElementById("ii").value+"&vc="+document.getElementById("vc").value+"&fc="+document.getElementById("fc").value+"&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+'&EHq='+document.getElementById("EHq").value+'&myh='+document.getElementById("myh").value+'&myt=1&nn='+n+'&action=ChangePerMission&eei='+e+'&ynv='+v; 
}

function validate(Form1,sn) 
{  
   var mailSub = document.getElementById("mailSub"+sn).value;  
   var mailMsg = document.getElementById("mailMsg"+sn).value;
   
   if(mailSub==0){ alert("Please type subject.");  return false; }
   if(mailMsg.length===0){ alert("please type msg.");  return false; }
   var agree=confirm("Are you sure, you want to send mail?");
   if(agree){return true;}else{return false;}
}


</script>  
</head>
<body class="body">   
<table class="table">
<tr>
 <td>
 <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table> 
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //*************************************************************************************************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>
			     <td id="Anni" valign="top" style="width:5px;"></td>
				 <td colspan="2" width="100%" valign="top">
				  <table border="0">
<?php //*************************************************************** Start ******************************************************************************** ?>		
<?php $SpP=mysql_query("select GradeId,DepartmentId,HqId,RepEmployeeID from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $resSpP=mysql_fetch_assoc($SpP); ?>		
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /><input type="hidden" id="EmpId" name="EmpId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="act" value="<?php echo $_REQUEST['act']; ?>" /><input type="hidden" name="y" id="y" value="<?php echo $_REQUEST['y']; ?>" />
<input type="hidden" name="hq" id="hq" value="<?php echo $_REQUEST['hq']; ?>" /><input type="hidden" name="q" id="q" value="<?php echo $_REQUEST['q']; ?>" />
<input type="hidden" name="vc" id="vc" value="<?php echo $_REQUEST['vc']; ?>" /><input type="hidden" name="fc" id="fc" value="<?php echo $_REQUEST['fc']; ?>" />
<input type="hidden" id="di" value="<?php echo $_REQUEST['di']; ?>" /><input type="hidden" id="gi" value="<?php echo $_REQUEST['gi']; ?>" />
<input type="hidden" id="cc" value="<?php echo $_REQUEST['cc']; ?>" /><input type="hidden" id="ActThought" value="0" />
<input type="hidden" id="ii" value="<?php echo $_REQUEST['ii']; ?>" /><input type="hidden" id="EHq" value="<?php echo $_REQUEST['EHq']; ?>" /> 
<input type="hidden" id="TotAValueM" value="" /><input type="hidden" id="TotBValueM" value="" /><input type="hidden" id="TotCValueM" value="" />
<input type="hidden" id="DealerId" value="" /><input type="hidden" id="Sno" value="" /><input type="hidden" id="myh" value="<?php echo $_REQUEST['myh']; ?>" />
<input type="hidden" id="myt" value="<?php echo $_REQUEST['myt']; ?>" /><input type="hidden" id="HqV" value="<?php echo $_REQUEST['hq']; ?>" />
<input type="hidden" id="Reporting" value="<?php echo $resSpP['RepEmployeeID']; ?>" />
<?php $SpEGr=mysql_query("select GradeValue from hrm_grade where GradeId=".$resSpP['GradeId']." AND CompanyId=".$CompanyId, $con); $resSpEGr=mysql_fetch_assoc($SpEGr); ?>
<tr>
 <td colspan="5"> 	 
  <table border="0">
  <tr>
   <td>
     <table border="0">
	  <tr>
	   <td>
	    <table border="0">
		 <tr>	
<?php /*		  
<td align="center"><a href="SalesPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq"><img src="images/PlannerA.png" border="0" style="height:30px;width:130px;"/></a></td> */ ?>
<td align="center"><img src="images/PlannerA.png" border="0" style="height:40px;width:150px;"/></td>
<td>&nbsp;</td>
<?php $sHq=mysql_query("select hrm_sales_hq_temp.HqId,HqName from hrm_sales_hq_temp INNER JOIN hrm_headquater ON hrm_sales_hq_temp.HqId=hrm_headquater.HqId where hrm_sales_hq_temp.EmployeeID=".$EmployeeId." AND hrm_sales_hq_temp.HqTEmpStatus='A' order by HqName ASC", $con); $rowHq=mysql_num_rows($sHq); if($rowHq>0){ ?>
<td align="center" valign="bottom">
<?php $sn=1; while($resHq=mysql_fetch_assoc($sHq)){ ?>
<a href="#" onClick="ChangeHq(<?php echo $resHq['HqId'].', '.$_REQUEST['y'].','.$sn; ?>)" style="text-decoration:none;">
 <font style="color:#FF8000;font-family:Times New Roman;font-size:16px;font-weight:bold;">
 <u><?php echo $resHq['HqName']; ?></u>
 </font>&nbsp;&nbsp;
</a>
<?php $sn++; } ?>
</td>
<?php } ?>		 
<?php if($_REQUEST['act']>0){ ?>
<td>&nbsp;</td><td align="center" valign="bottom">
<a href="#" onClick="ChangeTeam(<?php echo $resSpP['HqId'].', '.$_REQUEST['y']; ?>,'<?php echo $resSpEGr['GradeValue']; ?>')"><img src="images/Myteam.png" border="0" style="height:30px;width:130px;"  /></a>
</td>
<td>&nbsp;</td><td align="center" valign="bottom">
<a href="#"><img src="images/Permission1.png" border="0" style="height:30px;width:130px;"  /></a>
</td>
<?php } ?>
	<td>&nbsp;</td>

<?php if($_REQUEST['hq']>0){ 
if($resSpP['HqId']==$_REQUEST['hq']){$EmpID=$EmployeeId;}
elseif($resSpP['HqId']!=$_REQUEST['hq']){ $sqlhqi = mysql_query("select hrm_employee_general.EmployeeID from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where DepartmentId=6 AND hrm_employee.EmpStatus='A' AND where HqId=".$_REQUEST['hq']." AND RepEmployeeID=".$EmployeeId, $con); $reshqi=mysql_fetch_assoc($sqlhqi); $EmpID=$reshqi['EmployeeID'];}
echo '<input type="hidden" name="MainEmp" id="MainEmp" value="'.$EmpID.'" /><input type="hidden" id="TerId" value="'.$EmpID.'" />';
$sqlL=mysql_query("select R1,R2,R3,R4,R5 from hrm_sales_reporting_level where EmployeeID=".$EmpID, $con); $resL=mysql_fetch_assoc($sqlL);
echo '<input type="hidden" id="L1" value="'.$resL['R1'].'" />'; echo '<input type="hidden" id="L2" value="'.$resL['R2'].'" />'; 
echo '<input type="hidden" id="L3" value="'.$resL['R3'].'" />'; echo '<input type="hidden" id="L4" value="'.$resL['R4'].'" />'; 
echo '<input type="hidden" id="L5" value="'.$resL['R5'].'" />';
}   
echo '<input type="hidden" id="HqV" value="'.$_REQUEST['hq'].'" />';  ?>	
 
   </tr>
 </table>
	   </td>
	  </tr>
<tr><td><span id="DealerHqSpan"></span></td></tr>
  </table>
 </td>
</tr>
	 </table>
   </td>
  </tr>
  		    <tr>
			 <td colspan="10"><table border="0"><tr>
			 <td style="width:1000px;font-family:Times New Roman;font-size:20px; color:#FFFFFF;" valign="top">&nbsp;<b><i><u>My Team Edit Plan Permission</u></i></b><font style="font-family:Times New Roman;height:22px;font-size:14px;color:#008000;"><?php echo $Msg; ?></font></td>
			 </tr></table></td>
			</tr>
  <tr>
			 <td style="width:1200px;">
			<table border="1" style="width:1200px;">
			<tr bgcolor="#DFFA45">
		     <td align="center" style="font:Georgia;font-size:12px; width:50px;"><b>SNo</b></td>
		     <td style="font-family:Georgia; font-size:12px; width:50px;" align="center"><b>EC</b></td>
		     <td style="font-family:Georgia; font-size:12px; width:300px;" align="center"><b>Name</b></td>
 		     <td style="font-family:Georgia; font-size:12px; width:300px;" align="center"><b>Designation</b></td>
			 <td style="font-family:Georgia; font-size:12px; width:50px;" align="center"><b>Grade</b></td>
			 <td style="font-family:Georgia; font-size:12px; width:80px;" align="center"><b>Permission</b></td>
			 <td colspan="3" style="font-family:Georgia;font-size:12px;" align="center"><b>Compose Mail</b></td>
		    </tr>	
<?php $SqlRep=mysql_query("SELECT hrm_employee.EmployeeID,DepartmentId,DesigId,GradeId,EmpCode,Fname,Sname,Lname,Resig_Permission,Married,Gender,DR,EmailId_Vnr FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee_general.RepEmployeeID=".$EmployeeId." AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by EmpCode ASC", $con); $sn=1; while($ResRep=mysql_fetch_array($SqlRep)) { 
if($ResRep['DR']=='Y'){$MS='Dr.';} elseif($ResRep['Gender']=='M'){$MS='Mr.';} elseif($ResRep['Gender']=='F' AND $ResRep['Married']=='Y'){$MS='Mrs.';} elseif($ResRep['Gender']=='F' AND $ResRep['Married']=='N'){$MS='Miss.';}  $EmpName=$MS.' '.$ResRep['Fname'].' '.$ResRep['Sname'].' '.$ResRep['Lname']; 	
$SqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$ResRep['DesigId'], $con); $ResDesig=mysql_fetch_assoc($SqlDesig);
$SqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResRep['GradeId'], $con); $ResG=mysql_fetch_assoc($SqlG);
?> 			
            <tr bgcolor="#FFFFFF">
		     <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $sn; ?></td>
		     <td style="font-family:Georgia; font-size:11px; width:50px;" align="center"><?php echo $ResRep['EmpCode']; ?></td>
		     <td style="font-family:Georgia; font-size:11px; width:200px;" align="">&nbsp;<?php echo $EmpName; ?></td>
 		     <td style="font-family:Georgia; font-size:11px; width:250px;" align="">&nbsp;<?php echo $ResDesig['DesigName']; ?></td>
			 <td style="font-family:Georgia; font-size:11px; width:50px;" align="center"><?php echo $ResG['GradeValue']; ?></td>				 
			 <td style="font-family:Georgia; font-size:11px; width:70px;" align="center" id="ColTD">
<?php $sqlMi=mysql_query("select EditPerMi from hrm_sales_reporting_level where EmployeeID=".$ResRep['EmployeeID'], $con); $resMi=mysql_fetch_assoc($sqlMi); ?>			 
			 <select style="width:60px;font-family:Georgia;height:22px;background-color:<?php if($resMi['EditPerMi']=='Y'){ echo '#BAFC61'; }else {echo '#FDEE99';} ?>;" onChange="ChngeEmpPerMi(this.value,1,<?php echo $ResRep['EmployeeID']; ?>)">
			 <?php if($resMi['EditPerMi']=='Y'){ ?><option value="Y" selected="selected">&nbsp;YES</option><option value="N">&nbsp;NO</option>
			 <?php } elseif($resMi['EditPerMi']=='N'){ ?><option value="N" selected="selected">&nbsp;NO</option><option value="Y">&nbsp;YES</option><?php } ?>
			 </select>
			 </td>
			 <form name="Form1" method="post" onSubmit="return validate(this,<?php echo $sn; ?>)">
	<td style="width:150px;" align="center"><input id="mailSub<?php echo $sn; ?>" name="mailSub" placeholder="Subject" style="width:145px;font-family:Times New Roman;height:22px;font-size:14px;" maxlength="250" /><input type="hidden" name="EName" value="<?php echo $EmpName; ?>" /></td>		 
	<td style="width:250px;" align="center"><input id="mailMsg<?php echo $sn; ?>" name="mailMsg" placeholder="Message" style="width:245px;font-family:Times New Roman;height:22px;font-size:14px;" maxlength="250" /><input type="hidden" name="EEmail" value="<?php echo $ResRep['EmailId_Vnr']; ?>" /></td>
	<td style="width:55px;" align="center"><input type="submit" name="SummailMsg" value="send" style="width:50px;font-family:Times New Roman;font-size:14px;" <?php if($ResRep['EmailId_Vnr']==''){echo 'disabled';} ?>/></td>
	
			 </form>
			 
		    </tr>
<?php $sn++; } ?>

<?php /************ Teamlease Open */ ?>
<?php $stl = mysql_query("SELECT * FROM hrm_sales_tlemp where TLRepId=".$EmployeeId." AND TLStatus='A'", $con);
      $rtl = mysql_num_rows($stl); $sn2=$sn; while($restl = mysql_fetch_assoc($stl)){ ?> 			
    <tr bgcolor="#FFFFFF">
	 <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $sn; ?></td>
	 <td style="font-family:Georgia; font-size:11px; width:50px;" align="center"><?php echo ''; ?></td>
	 <td style="font-family:Georgia; font-size:11px; width:200px;" align="">&nbsp;<?php echo strtoupper($restl['TLName']); ?></td>
 	 <td style="font-family:Georgia; font-size:11px; width:250px;" align="">&nbsp;<?php echo ''; ?></td>
	 <td style="font-family:Georgia; font-size:11px; width:50px;" align="center"><?php echo ''; ?></td>				 
	 <td style="font-family:Georgia; font-size:11px; width:70px;" align="center" id="ColTD">			 
	 <select style="width:60px;font-family:Georgia;height:22px;background-color:<?php if($restl['EditPerMi']=='Y'){ echo '#BAFC61'; }else {echo '#FDEE99';} ?>;" onChange="ChngeEmpPerMi(this.value,2,<?php echo $restl['TLEId']; ?>)"><?php if($restl['EditPerMi']=='Y'){ ?><option value="Y" selected="selected">&nbsp;YES</option><option value="N">&nbsp;NO</option><?php } elseif($restl['EditPerMi']=='N'){ ?><option value="N" selected="selected">&nbsp;NO</option><option value="Y">&nbsp;YES</option><?php } ?>
	 </select>
	 </td> 
    </tr>
<?php $sn2++; } ?>
<?php /************	Teamlease CLose */ ?>	
		
	        </table>
		   </tr>
<?php //*************************************************************** Close ******************************************************************************** ?>						
				  </table>
				 </td>
			  </tr>
			</table>
           </td>
			  </tr>
	        </table>
			
<?php //*************************************************************************************************************************************************** ?>
		   </td>
		   
		  </tr>
		</table>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

