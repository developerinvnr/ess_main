<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_SESSION['login'] = true){require_once('PhpFile/QueryP.php'); } else {$msg= "Session Expiry..............."; }
if($_REQUEST['Act']!='' AND $_REQUEST['Act']=='Submit')
{ 
  $QueryEmp=$_REQUEST['QEI']; $AssigEmp=$_REQUEST['EI'];
  /*
  $Hone=date("Y-m-d"); $Htwo=date("Y-m-d",strtotime('+9 day')); $Hno=0; 
  for($i=$Hone;$i<=$Htwo;$i++){ $Hday=date("N",strtotime($i)); if($Hday==7) { $Hno++; } } 
  $sqlH = mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$HodId." AND AttValue='HO' AND AttDate>='".date("Y-m-d")."' AND AttDate<='".date("Y-m-d",strtotime('+9 day'))."'", $con); $rowH = mysql_num_rows($sqlH); $TotH=$Hno+$rowH; $TotDHod=$TotH+9; $HodDay = date("Y-m-d h:i:s",strtotime('+'.$TotDHod.' day'));
  */
  
  $sqlUp=mysql_query("update hrm_employee_queryemp set QToDepartmentId=".$_REQUEST['DpI'].", AssignEmpId=".$_REQUEST['EI'].", Level_1ID=".$_REQUEST['EI'].", Level_1QToDT='".date("Y-m-d h:i:s")."', Level_2ID=".$_REQUEST['AI'].", Level_2QToDT='".$_REQUEST['ED']."', Level_3ID=".$_REQUEST['HI'].", Level_3QToDT='".$_REQUEST['AD']."', Mngmt_QToDT='".$_REQUEST['HD']."' where QueryId=".$_REQUEST['QI'], $con);
  $sqlDD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['DI'], $con); $resDD=mysql_fetch_assoc($sqlDD);   
   
  $QS=$_REQUEST['QS'];	
  if($_REQUEST['HYN']=='Y'){$name='Name Undisclosed';}else{$name=$_REQUEST['EN'];}
  
  $sqlMK7=mysql_query("select * from hrm_employee_querymail_key where QueryMailId=7 AND CompanyId=".$CompanyId, $con); $resMK7=mysql_fetch_assoc($sqlMK7);
  $sqlR=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$_REQUEST['EI'], $con); $resR=mysql_fetch_assoc($sqlR);
		
    //Query owner
   if($resR['EmailId_Vnr']!='' AND $resMK7['Leve_l']=='Y')
   {
	$email_to = $resR['EmailId_Vnr'];
	$email_from='admin@vnrseeds.co.in';
    //if($resE['EmailId_Vnr']==''){$email_from = $EName;} else {$email_from=$resE['EmailId_Vnr'];}
	$email_subject = "Query from ".$name;  $semi_rand = md5(time()); 
	$headers = "From: " . $email_from . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_message .= "Dear <b>".$RName."</b> <br><br>\n\n\n";
    $email_message .= $_REQUEST['EN']." has raised a query on Subject-<b>".$_REQUEST['QS']."</b>, go to <b>ESS-QUERY</b> for more details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br>"; 
	$email_message .= "<b>You</b> need to answer query in 3 working days after which it will get escalated to next level.<br><br>\n\n\n";
	$email_message .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_to, $email_subject, $email_message, $headers);
   } 
  
  if($sqlUp){$Msg="Sucessfully forward query to departmet employee!"; }

}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}
.span {display:block; font-family:Times New Roman; color:#620000;font-size:15px; }.span1 {display:block; font-family:Times New Roman; color:#620000;font-size:15px;  }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:150px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<Script type="text/javascript">window.history.forward(1);</script>
<script type="text/javascript" src="js/Query.js" ></script>
<script language="javascript">
function ReadQuery(QI)
{ var win = window.open("ReadQuery.php?Qid="+QI,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=500,height=310");
  //var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="OpenQuery.php"; } }, 1000);
}

function DGD_Dept(value,Sn) 
{ var url = 'OpenQuery.php?DpI='+value+'&SN='+Sn; window.location=url; } 


function ActionQ(EI,QI,QEI,DI,SN,HYN,DpI)
{ var QS=document.getElementById("QSubject_"+SN).value; 
  window.location="OpenQuery.php?EI="+EI+"&QI="+QI+"&QEI="+QEI+"&DI="+DI+"&QS="+QS+"&HYN="+HYN+"&SN="+SN+"&DpI="+DpI;
}

function Forwd(EI,QI,QEI,DI,SN,HYN,DpI,EN,AEN,AI,HI,ED,AD,HD)
{ var QS=document.getElementById("QSubject_"+SN).value; 
  var agree=confirm("Are you sure you want forward query?"); 
  if (agree) { window.location="OpenQuery.php?Act=Submit&EI="+EI+"&QI="+QI+"&QEI="+QEI+"&DI="+DI+"&QS="+QS+"&HYN="+HYN+"&SN="+SN+"&DpI="+DpI+"&EN="+EN+"&AEN="+AEN+"&AI="+AI+"&HI="+HI+"&ED="+ED+"&AD="+AD+"&HD="+HD; }
}
</script>
</head>
<body class="body">
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" /><input type="hidden" id="UserType" value="<?php echo $_SESSION['UserType']; ?>" />
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td width="150" class="heading">&nbsp;Open Query</td>
	  <td><font style="font-family:Times New Roman;color:#005500;font-size:15px; font-weight:bold;"><?php echo $Msg; ?></font></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
<?php //***********************************************Reply To Query******************************************************?> 
<tr> 
<td align="left" id="ReplyToQuery" valign="top" style="display:block;">             
   <table border="0">
	<tr>
	  <td align="left" style="width:1100px;">
		<table border="1" bgcolor="#7a6189">
		  <tr>
		   <td width="40" class="TableHead" align="center"><b>Sno</b></td>
		   <td width="60" class="TableHead" align="center"><b>EC</b></td>
		   <td width="200" class="TableHead" align="center"><b>Name</b></td>
		   <td width="100" class="TableHead" align="center"><b>Department</b></td>
		   <td width="150" class="TableHead" align="center"><b>Subject</b></td>
		   <td width="60" class="TableHead" align="center"><b>Details</b></td>
		   <td width="80" class="TableHead" align="center"><b>Date</b></td>
		   <td width="60" class="TableHead" align="center"><b>Status</b></td>
		   <td width="100" class="TableHead" align="center"><b>Department</b></td>
		   <td width="200" class="TableHead" align="center"><b>Query Owner</b></td>  
		   <td width="50" class="TableHead" align="center"><b>Fwd</b></td> 
		  </tr>
<?php $sqlQ=mysql_query("select * from hrm_employee_queryemp INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_queryemp.EmployeeID where hrm_employee_queryemp.QuerySubject='N' AND hrm_employee_queryemp.AssignEmpId=0 AND hrm_employee.CompanyId=".$CompanyId." order by QueryDT DESC", $con); 
      $rowQ=mysql_num_rows($sqlQ); if($rowQ>0) { $Sno=1; while($resQ=mysql_fetch_array($sqlQ)) { ?>	
	     <tr>
	      <td width="40" class="TableHead1" align="center" valign="top"><?php echo $Sno; ?></td>
<?php $sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmployeeID=".$resQ['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE);?>	 		  
	      <td width="60" class="TableHead1" align="center" valign="top"><?php echo $resE['EmpCode']; ?></td>
		  <td width="200" class="TableHead1" align="left" valign="top"><?php echo $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?></td>
<?php $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resQ['QToDepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);?>		  
		  <td width="100" class="TableHead1" align="left" valign="top"><?php echo $resD['DepartmentCode']; ?></td>
		  <td width="150" class="TableHead1" align="left" valign="top"><?php if($resQ['QuerySubject']=='N'){echo substr_replace($resQ['OtherSubject'], '', 15).'.....';} else {echo substr_replace($resQ['QuerySubject'], '', 15).'.....'; }?><input type="hidden" id="QSubject_<?php echo $Sno; ?>" value="<?php if($resQ['QuerySubject']=='N'){echo $resQ['OtherSubject'];} else {echo $resQ['QuerySubject']; }?>" /></td>
		  <td width="60" class="TableHead1" align="center" valign="top"><a href="javascript:ReadQuery(<?php echo $resQ['QueryId']; ?>)">Read</a></td>
		  <td width="80" class="TableHead1" align="center" valign="top"><?php echo date("d-M-y", strtotime($resQ['QueryDT'])); ?></td>
		  <td width="60" class="TableHead1" align="center" valign="top" style="background-color:#C4FFC4;">Open</td>
		  <td width="100" class="TableHead1" align="center" valign="top"><select style="font-size:12px; width:100px; height:20px; background-color:#DDFFBB;" name="DeptName" id="DeptName" onChange="DGD_Dept(this.value,<?php echo $Sno; ?>)">
<?php if($_REQUEST['DpI']!='' AND $_REQUEST['SN']==$Sno){ $SqlDe=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['DpI'], $con);
$ResDe=mysql_fetch_array($SqlDe); ?><option style="background-color:#DBD3E2;" value="<?php echo $ResDe['DepartmentId']; ?>">&nbsp;<?php echo $ResDe['DepartmentCode']; ?></option>
<?php } else {?><option style="background-color:#DBD3E2;" value="">&nbsp;Select</option><?php } ?>
<?php $SqlDept=mysql_query("select * from hrm_department where DeptStatus='A' AND CompanyId=".$CompanyId." order by DepartmentCode ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['DepartmentId']; ?>">&nbsp;<?php echo $ResDept['DepartmentCode']; ?></option><?php } ?></select></td>
          <td width="200" class="TableHead1" align="center" valign="top">
<?php 
if($_REQUEST['EI']!='' AND $_REQUEST['SN']==$Sno)
{ 
     $sqlE=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$_REQUEST['QEI'], $con); 
     $resE=mysql_fetch_assoc($sqlE);  if($resE['DR']=='Y'){$M2='Dr.';} elseif($resE['Gender']=='M'){$M2='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M2='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M2='Miss.';}  $EName=$M2.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'];
     $sqlAssign=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$_REQUEST['EI'], $con); 
 $resAssign=mysql_fetch_assoc($sqlAssign); 
if($resAssign['DR']=='Y'){$M3='Dr.';} elseif($resAssign['Gender']=='M'){$M3='Mr.';} elseif($resAssign['Gender']=='F' AND $resAssign['Married']=='Y'){$M3='Mrs.';} elseif($resAssign['Gender']=='F' AND $resAssign['Married']=='N'){$M3='Miss.';}  $AssignName=$M3.' '.$resAssign['Fname'].' '.$resAssign['Sname'].' '.$resAssign['Lname']; 
		  
	 $sqlH=mysql_query("select AppraiserId,HodId from hrm_employee_reporting where EmployeeID=".$_REQUEST['EI'], $con); $resH=mysql_fetch_assoc($sqlH); 
	 $RepId=$resH['AppraiserId']; $HodId=$resH['HodId']; 
		 
	 $Eone=date("Y-m-d"); $Etwo=date("Y-m-d",strtotime('+3 day')); $Eno=0;  
	 /*for($i=$Eone;$i<=$Etwo;$i++){ $Eday=date("N",strtotime($i)); if($Eday==7) { $Eno++; } } */
	 $sqlE = mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$_REQUEST['EI']." AND AttValue='HO' AND AttDate>='".date("Y-m-d")."' AND AttDate<='".date("Y-m-d",strtotime('+3 day'))."'", $con); $rowE = mysql_num_rows($sqlE); $TotE=$Eno+$rowE; $TotDEmp=$TotE+3; $EmpDay = date("Y-m-d h:i:s",strtotime('+'.$TotDEmp.' day'));

	 $Aone=date("Y-m-d"); $Atwo=date("Y-m-d",strtotime('+6 day')); $Ano=0; 
	 /*for($i=$Aone;$i<=$Atwo;$i++){ $Aday=date("N",strtotime($i)); if($Aday==7) { $Ano++; } } */
	 $sqlA = mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$RepId." AND AttValue='HO' AND AttDate>='".date("Y-m-d")."' AND AttDate<='".date("Y-m-d",strtotime('+6 day'))."'", $con); $rowA = mysql_num_rows($sqlA); $TotA=$Ano+$rowA; $TotDApp=$TotA+6; $AppDay = date("Y-m-d h:i:s",strtotime('+'.$TotDApp.' day'));
	 
	 $HodDay = date("Y-m-d h:i:s",strtotime('+11 day')); 
} 
?>
		  <select name="Action" id="Action" onChange="ActionQ(this.value,<?php echo $resQ['QueryId'].', '. $resQ['EmployeeID'].', '.$resQ['QToDepartmentId'].', '.$Sno; ?>, '<?php echo $resQ['HideYesNo']; ?>', <?php echo $_REQUEST['DpI']; ?>)" style="padding:1px;font-size:12px; height:20px;font-family:Times New Roman;" class="All_200" <?php if($_REQUEST['SN']==$Sno){echo '';} else{echo 'disabled';} ?>><?php if($_REQUEST['EI']!='' AND $_REQUEST['SN']==$Sno){ ?><option value="<?php echo $_REQUEST['EI']; ?>">&nbsp;<?php echo $AssignName; ?></option><?php } else {?>
		  <option value="0">&nbsp;Select Employee</option><?php } if($_REQUEST['DpI']){ $sqlDept=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,DesigName from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_designation ON hrm_employee_general.DesigId=hrm_designation.DesigId where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['DpI']." order by EmpCode ASC", $con); while($resDept=mysql_fetch_assoc($sqlDept)){ 
$Ename=$resDept['EmpCode'].' - '.$resDept['Fname'].' '.$resDept['Sname'].' '.$resDept['Lname'].' ('.$resDept['DesigName'].')';?>	
<option value="<?php echo $resDept['EmployeeID']; ?>">&nbsp;<?php echo $Ename; ?></option>
<?php } }?></select></td>
          <td width="50" class="" align="center" valign="top">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
		  <?php if($_REQUEST['SN']==$Sno AND $_REQUEST['EI']!=''){?>
		  <a href="#" onClick="Forwd(<?php echo $_REQUEST['EI'].', '. $resQ['QueryId'].', '. $resQ['EmployeeID'].', '.$resQ['QToDepartmentId'].', '.$Sno; ?>, '<?php echo $resQ['HideYesNo']; ?>', <?php echo $_REQUEST['DpI']; ?>, '<?php echo $EName; ?>', '<?php echo $AssignName; ?>', <?php echo $resH['AppraiserId'].', '.$resH['HodId']; ?>, '<?php echo $EmpDay; ?>', '<?php echo $AppDay; ?>', '<?php echo $HodDay; ?>')"><img src="images/go-back-icon.png" border="0" /></a>
		  <?php } ?>
<?php } ?>
		  </td>
		</tr>
<?php $Sno++; }} ?>		
		</table>
      </td>
   </tr>
  </table>    
</td>
</tr>
<?php //*********************************************** Close Reply to Query******************************************************?>      
<?php } ?> 
</table>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
	  </td>
	</tr>
	<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
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
