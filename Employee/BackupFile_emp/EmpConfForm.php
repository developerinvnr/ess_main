<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}

if(isset($_POST['FormSave'])) 
{ 
  $sqlL=mysql_query("select * from hrm_employee_confletter where Status='A' AND EmployeeID=".$_POST['EI'], $con);  
  $rowL=mysql_num_rows($sqlL); 
  if($rowL>0)
  { 
   
   $sqlUp=mysql_query("update hrm_employee_confletter set ConfDate='".date("Y-m-d", strtotime($_POST['DOCValue']))."', Communi='".$_POST['CO']."',  JobKnowl='".$_POST['JK']."', OutPut='".$_POST['OP']."', Initiative='".$_POST['INI']."', InterSkill='".$_POST['IS']."', ProblemSolve='".$_POST['PS']."', Attitude='".$_POST['AT']."', Attendance='".$_POST['ATT']."', EmpStrenght='".$_POST['ES']."', AreaImprovement='".$_POST['AI']."', Rating='".$_POST['RAT']."', Recommendation='".$_POST['REC']."', Reason='".$_POST['REA']."', GradeId=".$_POST['GradeId'].", DesigId=".$_POST['DesigId'].", CreatedDate='".date("Y-m-d")."', YearId=".$YearId." where Status='A' AND EmployeeID=".$_POST['EI'], $con); 
  }
  elseif($rowL==0)
  { 
   $sqlUp=mysql_query("insert into hrm_employee_confletter(EmployeeID, ConfDate, Communi, JobKnowl, OutPut, Initiative, InterSkill, ProblemSolve, Attitude, Attendance, EmpStrenght, AreaImprovement, Rating, Recommendation, Reason, GradeId, DesigId, CreatedDate, YearId) values(".$_POST['EI'].", '".date("Y-m-d", strtotime($_POST['DOCValue']))."', '".$_POST['CO']."', '".$_POST['JK']."', '".$_POST['OP']."', '".$_POST['INI']."', '".$_POST['IS']."', '".$_POST['PS']."', '".$_POST['AT']."', '".$_POST['ATT']."', '".$_POST['ES']."', '".$_POST['AI']."', '".$_POST['RAT']."', '".$_POST['REC']."', '".$_POST['REA']."', ".$_POST['GradeId'].", ".$_POST['DesigId'].", '".date("Y-m-d")."', ".$YearId.")", $con); 
  }

  if($sqlUp){ echo '<script>alert("Data save successfully, please click submite button for complite employee confirmation form!");</script>'; }  
} 

if(isset($_POST['FormSubmit'])) 
{ 
 $sqlUp=mysql_query("update hrm_employee_confletter set ConfDate='".date("Y-m-d", strtotime($_POST['DOCValue']))."', Communi='".$_POST['CO']."',  JobKnowl='".$_POST['JK']."', OutPut='".$_POST['OP']."', Initiative='".$_POST['INI']."', InterSkill='".$_POST['IS']."', ProblemSolve='".$_POST['PS']."', Attitude='".$_POST['AT']."', Attendance='".$_POST['ATT']."', EmpStrenght='".$_POST['ES']."', AreaImprovement='".$_POST['AI']."', Rating='".$_POST['RAT']."', Recommendation='".$_POST['REC']."', Reason='".$_POST['REA']."', GradeId=".$_POST['GradeId'].", DesigId=".$_POST['DesigId'].", SubmitStatus='Y', CreatedDate='".date("Y-m-d")."', YearId=".$YearId." where Status='A' AND EmployeeID=".$_POST['EI'], $con);

 if($_POST['REC']==1) 
 { 
  $Up=mysql_query("update hrm_employee_general set DateConfirmationYN='Y', DateConfirmation='".date("Y-m-d", strtotime($_POST['DOCValue']))."' where EmployeeID=".$_POST['EI'], $con);
 }
 if($_POST['REC']==2) 
 { 
  $Up=mysql_query("update hrm_employee_general set DateConfirmationYN='N' where EmployeeID=".$_POST['EI'], $con);
 }
  
  if($sqlUp)
  { 
   $sqlE=mysql_query("select HodId from hrm_employee_reporting where EmployeeID=".$_POST['EI'], $con); 
   $resE=mysql_fetch_assoc($sqlE);
   if($resE['HodId']>0)
   {
   
   $sqlHod=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$resE['HodId'], $con); 
   $resHod=mysql_fetch_assoc($sqlHod);
   /************************************************ HOD ***********************************************/   
   if($resHod['EmailId_Vnr']!='')
   {
   $email_to = $resHod['EmailId_Vnr'];
   $email_from = 'admin@vnrseeds.co.in';
   $email_subject = $_POST['EmpName']." Confirmation Ok";
   $email_txt = $_POST['EmpName']." Confirmation Ok";
   $headers = "From: $email_from ". "\r\n";
   $email_message3 .="Confirmation of ".$_POST['EmpName']." is approved by Reporting Mgr(".$_POST['RepName']."), for more details kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>  .\n\n";
   $email_message3 .="Thanks & Regards\n";
   $email_message3 .="HR\n\n";
   $ok = @mail($email_to, $email_subject, $email_message3, $headers);
   } 
   
   }//if($resE['HodId']>0)

  echo '<script>alert("Data Submited Successfully");</script>';
  }
} 

?>

<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font {font-family:Times New Roman;font-size:15px; font-weight:bold;}.font1 {font-family:Times New Roman;font-size:15px;} .fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; display:none; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:11px;height:18px;}
.EditInput { font-family:Georgia; font-size:12px; width:100px; height:20px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function edit()
{document.getElementById("btnEdit").style.display='none';document.getElementById("btnSave").style.display='block'; 
 //document.getElementById("f_btn1").disabled=false;
 for(var i=1; i<=8; i++){document.getElementById("A"+i).disabled=false;document.getElementById("B"+i).disabled=false;
                         document.getElementById("C"+i).disabled=false;document.getElementById("D"+i).disabled=false; 
						 document.getElementById("R"+i).disabled=false; }
 for(var j=1; j<=2; j++){document.getElementById("Rec"+j).disabled=false;}
 document.getElementById("VEmpStrenght").readOnly=false; document.getElementById("VAreaImprove").readOnly=false; document.getElementById("btnSubmit").disabled=false; 		 
}

function FunChkRdo(v,n,scr)
{
 document.getElementById("Rec1").checked=false; document.getElementById("Rec1").checked=false;
 document.getElementById("DivRc1").style.display='none'; document.getElementById("DivRc2").style.display='none';
 for(var i=1; i<=8; i++)
 {
  document.getElementById("R"+i).checked=false; document.getElementById("DivR"+i).style.display='none';
 }
 
 document.getElementById("opt"+n).value=scr;
 var op1=parseFloat(document.getElementById("opt1").value); var op2=parseFloat(document.getElementById("opt2").value);
 var op3=parseFloat(document.getElementById("opt3").value); var op4=parseFloat(document.getElementById("opt4").value);
 var op5=parseFloat(document.getElementById("opt5").value); var op6=parseFloat(document.getElementById("opt6").value);
 var op7=parseFloat(document.getElementById("opt7").value); var op8=parseFloat(document.getElementById("opt8").value);
 var TotScr=Math.round((op1+op2+op3+op4+op5+op6+op7+op8)*100)/100;
 
 
 if(TotScr<=150)
 { 
   document.getElementById("DivR1").style.display='block'; document.getElementById("R1").checked=true; 
   document.getElementById("DivRc2").style.display='block'; document.getElementById("Rec2").checked=true; 
 }
 else if(TotScr>151 && TotScr<=180)
 { 
   document.getElementById("DivR2").style.display='block'; document.getElementById("R2").checked=true; 
   document.getElementById("DivRc2").style.display='block'; document.getElementById("Rec2").checked=true; 
 }
 else if(TotScr>181 && TotScr<=220)
 { 
   document.getElementById("DivR3").style.display='block'; document.getElementById("R3").checked=true; 
   document.getElementById("DivRc1").style.display='block'; document.getElementById("Rec1").checked=true; 
 }
 else if(TotScr>221 && TotScr<=270)
 { 
   document.getElementById("DivR4").style.display='block'; document.getElementById("R4").checked=true; 
   document.getElementById("DivRc1").style.display='block'; document.getElementById("Rec1").checked=true; 
 }
 else if(TotScr>271 && TotScr<=310)
 { 
   document.getElementById("DivR5").style.display='block'; document.getElementById("R5").checked=true; 
   document.getElementById("DivRc1").style.display='block'; document.getElementById("Rec1").checked=true; 
 }
 else if(TotScr>311 && TotScr<=350)
 { 
   document.getElementById("DivR6").style.display='block';document.getElementById("R6").checked=true; 
   document.getElementById("DivRc1").style.display='block'; document.getElementById("Rec1").checked=true; 
 }
 else if(TotScr>351 && TotScr<=380)
 { 
   document.getElementById("DivR7").style.display='block'; document.getElementById("R7").checked=true; 
   document.getElementById("DivRc1").style.display='block'; document.getElementById("Rec1").checked=true; 
 }
 else if(TotScr>=381)
 { 
   document.getElementById("DivR8").style.display='block'; document.getElementById("R8").checked=true; 
   document.getElementById("DivRc1").style.display='block'; document.getElementById("Rec2").checked=true; 
 }

}

function ToREC(v) 
{ 
  if(v==1)
  { document.getElementById("ReasonExt").readOnly=true; document.getElementById("ReasonExt").value='';
    for(var i=1; i<=8; i++){ document.getElementById("R"+i).checked=false; }
	document.getElementById("R3").checked=true;
  } 
  else if(v==2)
  { document.getElementById("ReasonExt").readOnly=false;
    for(var i=1; i<=8; i++){ document.getElementById("R"+i).checked=false; }
	document.getElementById("R2").checked=true;
  }  
}

function validate(letterForm) 
{ if(document.getElementById("VEmpStrenght").value==''){alert('Please Type Employee Strength!'); return false; }
  if(document.getElementById("VAreaImprove").value==''){alert('Please Type Employee Areas of Improvement!'); return false; }
  if(document.getElementById("R1").checked==false && document.getElementById("R2").checked==false && document.getElementById("R3").checked==false && document.getElementById("R4").checked==false && document.getElementById("R5").checked==false && document.getElementById("R6").checked==false && document.getElementById("R7").checked==false && document.getElementById("R8").checked==false){alert('Please Select Rating Value!'); return false; }
  if(document.getElementById("Rec1").checked==false && document.getElementById("Rec2").checked==false){alert('Please Select Recommendation Value!'); return false; }
  if(document.getElementById("Rec1").checked==false && document.getElementById("Rec2").checked==true && document.getElementById("ReasonExt").value==''){alert('Please Type Reason For Extend Probation!'); return false; }
  if(document.getElementById("R1").checked==true && document.getElementById("Rec1").checked==true){alert('Error!..With Rating 1 the employee is recommended for extension of confirmation and Pending Improvement Plan(PIP).'); return false; }else {return true;}
}	 

</script>
</head>
<body class="body">
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" /><input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
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
			     <td id="Anni" valign="top">
				    <table border="0">
						  <tr height="20">
						    <td align="left" valign="top" width="150">
<?php include("EmpImgEmp.php"); ?>
<?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?></td>
						  </tr>
					 </table>
				 </td>				 
				  <td align="left" width="850" valign="top">
<form name="letterForm" method="post" onSubmit="return validate(this)">	  
<table border="0"  style="margin-top:0px; width:100%; height:300px;">
 <tr>
			 <td colspan="10"><table border="0"><tr>
			 <?php if($rowApp>0) { ?>
             <td align="center"><a href="EmpPendingConfLetter.php"><img id="Img_RepMgr1" style="display:none;" src="images/RepMgr1.png" border="0"/></a>
		     <img id="Img_RepMgr" style="display:block;" src="images/RepMgr.png" border="0"/></td><?php } ?>
			 <?php if($rowHod>0) { ?>
             <td align="center"><a href="EmpHodPendingConfLetter.php"><img id="Img_Hod1" style="display:block;" src="images/RevHod1.png" border="0"/></a>
		     <img id="Img_Hod" style="display:none;" src="images/RevHod.png" border="0"/></td><?php } ?>
			 <td>&nbsp;</td>
			 <td style="width:250px;font-family:Times New Roman; font-size:15px;" valign="top">&nbsp;<b><i><u>Pending Confirmation</u></i></b></td>
			 <td style="width:250px;">&nbsp;</td>
			 <td style="width:250px;font-family:Times New Roman;font-size:18px;"><b><a href="EmpPendingConfLetter.php">Back</a></b></td>
			 </tr></table></td>
			</tr>
 <tr> 
 <td align="left" id="type" valign="top" style="display:block; width:100%">     
<?php
$id=$_REQUEST['e']; //$YId=$_POST['YId']; $UId=$_POST['UId']; 
$sql=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,DateJoining,DateConfirmationYN,DateConfirmation,GradeId,HqId,Gender,DR,Married,ReportingName,ConfirmHR,ConfirmMonth from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$id, $con);  $res=mysql_fetch_assoc($sql);

//echo $res['ConfirmMonth'];

if($res['ConfirmMonth']==3){$ConfDate=date('Y-m-d', strtotime("+3 months", strtotime($res['DateJoining']))); }
elseif($res['ConfirmMonth']==6){$ConfDate=date('Y-m-d', strtotime("+6 months", strtotime($res['DateJoining']))); }
elseif($res['ConfirmMonth']==9){$ConfDate=date('Y-m-d', strtotime("+9 months", strtotime($res['DateJoining']))); } 
elseif($res['ConfirmMonth']==12){$ConfDate=date('Y-m-d', strtotime("+12 months", strtotime($res['DateJoining']))); }
elseif($res['ConfirmMonth']==15){$ConfDate=date('Y-m-d', strtotime("+15 months", strtotime($res['DateJoining']))); }
elseif($res['ConfirmMonth']==18){$ConfDate=date('Y-m-d', strtotime("+18 months", strtotime($res['DateJoining']))); }
elseif($res['ConfirmMonth']==24){$ConfDate=date('Y-m-d', strtotime("+24 months", strtotime($res['DateJoining']))); }
$Before15Day_1 = date("Y-m-d",strtotime($ConfDate.'-15 day'));
$ConfDateMain = date("d-m-Y",strtotime($ConfDate.'-1 day'));

//echo 'aa='.$ConfDate;

$Ename = $res['Fname'].'&nbsp;'.$res['Sname'].'&nbsp;'.$res['Lname']; $LEC=strlen($res['EmpCode']); 
if($res['DR']=='Y'){$M='Dr.';} elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$Ename; 
if($LEC==1){$EC='000'.$res['EmpCode'];} if($LEC==2){$EC='00'.$res['EmpCode'];} if($LEC==3){$EC='0'.$res['EmpCode'];} if($LEC>=4){$EC=$res['EmpCode'];}

$sqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
$sqlDe=mysql_query("select DesigName from hrm_designation where DesigId=".$res['DesigId'], $con); $resDe=mysql_fetch_assoc($sqlDe);
$sqlH=mysql_query("select HqName from hrm_headquater where HqId=".$res['HqId'], $con); $resH=mysql_fetch_assoc($sqlH);
$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resG=mysql_fetch_assoc($sqlG); 
$d=date("d", strtotime($res['DateJoining'])); $m=date("m", strtotime($res['DateJoining'])); $y=date("Y",strtotime($res['DateJoining']));
/*
if($m=='01'){$cm='07'; $cy=$y; $cm2='10'; $cy2=$y;} elseif($m=='02'){$cm='08'; $cy=$y; $cm2='11'; $cy2=$y;} elseif($m=='03'){$cm='09'; $cy=$y; $cm2='12'; $cy2=$y;} elseif($m=='04'){$cm='10'; $cy=$y; $cm2='01'; $cy2=$y+1;} elseif($m=='05'){$cm='11'; $cy=$y; $cm2='02'; $cy2=$y+1;} elseif($m=='06'){$cm='12'; $cy=$y; $cm2='03'; $cy2=$y+1;} elseif($m=='07'){$cm='01'; $cy=$y+1; $cm2='04'; $cy2=$y+1;} elseif($m=='08'){$cm='02'; $cy=$y+1; $cm2='05'; $cy2=$y+1;} elseif($m=='09'){$cm='03'; $cy=$y+1; $cm2='06'; $cy2=$y+1;} elseif($m=='10'){$cm='04'; $cy=$y+1; $cm2='07'; $cy2=$y+1;} elseif($m=='11'){$cm='05'; $cy=$y+1; $cm2='08'; $cy2=$y+1;} elseif($m=='12'){$cm='06'; $cy=$y+1; $cm2='09'; $cy2=$y+1;} 
 if(($_REQUEST['d']==6 OR $_REQUEST['d']==19 OR $_REQUEST['d']==4 OR $_REQUEST['d']==21 OR $_REQUEST['d']==2) AND ($res['DesigId']==71 OR $res['DesigId']==174 OR $res['DesigId']==169 OR $res['DesigId']==139)){$sy=$y+1; $dmy=$d.'-'.$m.'-'.$sy;}else{$dmy=$d.'-'.$cm.'-'.$cy;}
 if($_REQUEST['c']==1){ $ConfDate=$dmy;}elseif($_REQUEST['c']==2){$Extdmy=$d.'-'.$cm2.'-'.$cy2; $ConfDate=$Extdmy;} 
*/

$sqlL=mysql_query("select * from hrm_employee_confletter where Status='A' AND EmployeeID=".$id, $con);  $rowL=mysql_num_rows($sqlL); if($rowL>0){$resL=mysql_fetch_assoc($sqlL);} 
?>
  <table border="0">
    <tr>
	 <td style="width:1000px;">
<table border="1" bgcolor="#FFFFFF">
 <tr><td align="center" style="font-family:Times New Roman;font-size:18px;width:1000px;"><b>Confirmation Appraisal Form</b></td></tr>
 <tr><td align="center" style="font-family:Times New Roman;font-size:15px;width:1000px;">
      <table border="1">
	   <tr>
	    <td class="font" style="width:100px;">&nbsp;Name:</td>
		<td style="width:350px;background-color:#F0EBE3;" align="">
		<input type="hidden" id="EI" name="EI" value="<?php echo $id; ?>" readonly />
                <input type="hidden" name="RepName" value="<?php echo $res['ReportingName']; ?>" readonly />  
		<input class="font1" style="width:345px;background-color:#F0EBE3;" id="EmpName" name="EmpName" value="<?php echo $NameE; ?>" readonly /></td>
		<td class="font" style="width:200px;">&nbsp;Employee Code:</td>
		<td style="width:350px;background-color:#F0EBE3;" align="">
		<input class="font1" style="width:345px;background-color:#F0EBE3; color:#000000;" id="EmpCode" name="EmpCode" value="<?php echo $EC; ?>" readonly /></td>
	   </tr>
	   <tr>
	    <td class="font" style="width:100px;">&nbsp;Location:</td>
		<td style="width:350px;background-color:#F0EBE3;" align="">
		<input class="font1" style="width:345px;background-color:#F0EBE3;" id="Location" name="Location" value="<?php echo $resH['HqName']; ?>" readonly /></td>
		<td class="font" style="width:200px;">&nbsp;Department:</td>
		<td style="width:350px;background-color:#F0EBE3;" align="">
		<input class="font1" style="width:345px;background-color:#F0EBE3;" id="DeptName" name="DeptName" value="<?php echo $resD['DepartmentName']; ?>" readonly /></td>
	   </tr>
	   <tr>
	    <td class="font" style="width:100px;">&nbsp;Grade:</td>
		<td style="width:350px;background-color:#F0EBE3;" align="">
		<input class="font1" style="width:345px;background-color:#F0EBE3;" id="GradeName" name="GradeName" value="<?php echo $resG['GradeValue']; ?>" readonly />
		<input type="hidden" name="GradeId" value="<?php echo $res['GradeId']; ?>" readonly /></td>
		<td class="font" style="width:200px;">&nbsp;Designation:</td>
		<td style="width:350px;background-color:#F0EBE3;" align="">
		<input class="font1" style="width:345px;background-color:#F0EBE3;" id="DesigName" name="DesigName" value="<?php echo $resDe['DesigName']; ?>" readonly />
		<input type="hidden" name="DesigId" value="<?php echo $res['DesigId']; ?>" readonly /></td>
	   </tr>
	   <tr>
	    <td class="font" style="width:100px;">&nbsp;DOJ:</td>
		<td style="width:350px;background-color:#F0EBE3;" align="">
		<input class="font1" style="width:100px;background-color:#F0EBE3;" id="DOJValue" name="DOJValue" value="<?php echo date("d-m-Y", strtotime($res['DateJoining'])); ?>" readonly /></td>
		<td class="font" style="width:200px;">&nbsp;Date Of Confirmation:</td>
		<td style="width:350px;background-color:#F0EBE3;" align="">
		<input class="font1" style="width:100px;background-color:#F0EBE3;" id="DOCValue" name="DOCValue" value="<?php if($rowL>0){echo date("d-m-Y", strtotime($resL['ConfDate'])); }else{echo $ConfDateMain;} //$ConfDate; ?>" readonly /><!--<button id="f_btn1" class="CalenderButton" disabled></button>-->
   <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
   cal.manageFields("f_btn1", "DOCValue", "%d-%m-%Y");</script></td>
	   </tr>
	  </table>
     </td>
  </tr>
  <tr>
   <td>
    <table border="0">
	 <tr><td style="width:5px;">&nbsp;</td><td class="font" style="width:995px;">GUIDLINES</td></tr>
	 <tr><td style="width:5px;">&nbsp;</td><td class="font1" style="width:995px;">1. The objective of this appraisal is to evaluate the suitablility of an employee for confirmation in employment.</td></tr>
	 <tr><td style="width:5px;">&nbsp;</td><td class="font1" style="width:995px;">2. This appraisal form is to be filled in by the employee's immediate superior and the same shall be reviewed by the Departmental Head.</td></tr>
	 <tr><td colspan="2">&nbsp;</td></tr>
	 <tr><td colspan="2" class="font1" style="width:995px;">Following are the Organizational, job and Personality factors applicable to employee. The defination and the rating scale for A, B, C, D for each factor is clearly detailed below:</td></tr>
	</table>
   </td>
  </tr>
<?php $sqlL=mysql_query("select * from hrm_employee_confletter where Status='A' AND EmployeeID=".$id, $con);  $rowL=mysql_num_rows($sqlL); if($rowL>0){$resL=mysql_fetch_assoc($sqlL);} ?>  
  <tr><td align="center" style="font-family:Times New Roman;font-size:15px;width:1000px;">
      <table border="1">
	   <tr><td colspan="4" class="font" style="width:100px;color:#004A95;" bgcolor="">&nbsp;<font color="#000000">1. COMMUNICATION:</font> Clarity of thought and expression; skills and desire of sharing relevant information with all concerned (upward, lateral, downward).<input type="hidden" id="opt1" name="opt1" value="<?php if($resL['Communi']=='A'){echo 40;}elseif($resL['Communi']=='B'){echo 30;}elseif($resL['Communi']=='C'){echo 20;}elseif($resL['Communi']=='D'){echo 10;}else{echo 0;}?>" /></td></tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">A</td>
		<td class="font1" id="TdA1" style="width:470px;color:<?php if($resL['Communi']=='A'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="CO" id="A1" value="A" <?php if($resL['Communi']=='A'){echo 'checked';} ?> onClick="FunChkRdo(this.value,1,40)" disabled/>&nbsp;Excellent  clarity of thought and expression; Uses all channels and shares relevant information.</td>
		<td class="font" style="width:30px;" align="center" valign="top">B</td>
		<td class="font1" id="TdB1" style="width:470px;color:<?php if($resL['Communi']=='B'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="CO" id="B1" value="B" <?php if($resL['Communi']=='B'){echo 'checked';} ?> onClick="FunChkRdo(this.value,1,30)" disabled/>&nbsp;Good in expression shares information with all concerned.</td>
	   </tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">C</td>
		<td class="font1" id="TdC1" style="width:470px;color:<?php if($resL['Communi']=='C'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="CO" id="C1" value="C" <?php if($resL['Communi']=='C'){echo 'checked';} ?> onClick="FunChkRdo(this.value,1,20)" disabled/>&nbsp;Has desire to share information, but lacks skills to do so.</td>
		<td class="font" style="width:30px;" align="center" valign="top">D</td>
		<td class="font1" id="TdD1" style="width:470px;color:<?php if($resL['Communi']=='D'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="CO" id="D1" value="D" <?php if($resL['Communi']=='D'){echo 'checked';} ?> onClick="FunChkRdo(this.value,1,10)" disabled/>&nbsp;Keep things to him. Lacks desire and skills to share information.</td>
	   </tr>
	   <tr><td colspan="4" class="font" style="width:100px;color:#004A95;" bgcolor="">&nbsp;<font color="#000000">2. JOB KNOWLEDGE:</font> Knowledge needed to perform the job (s); ability to grasp concepts and issues; assimilation of varied information.<input type="hidden" id="opt2" name="opt2" value="<?php if($resL['JobKnowl']=='A'){echo 80;}elseif($resL['JobKnowl']=='B'){echo 60;}elseif($resL['JobKnowl']=='C'){echo 40;}elseif($resL['JobKnowl']=='D'){echo 20;}else{echo 0;}?>" /></td></tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">A</td>
		<td class="font1" id="TdA2" style="width:470px;color:<?php if($resL['JobKnowl']=='A'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="JK" id="A2" value="A" <?php if($resL['JobKnowl']=='A'){echo 'checked';} ?> onClick="FunChkRdo(this.value,2,80)" disabled/>&nbsp;Has thorough know ledge of primary and related jobs; quick in assimilation of varied information, concepts and issues.</td>
		<td class="font" style="width:30px;" align="center" valign="top">B</td>
		<td class="font1" id="TdB2" style="width:470px;color:<?php if($resL['JobKnowl']=='B'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="JK" id="B2" value="B" <?php if($resL['JobKnowl']=='B'){echo 'checked';} ?> onClick="FunChkRdo(this.value,2,60)" disabled/>&nbsp;Has know ledge of various aspects of the jobs good in assimilation of concepts, issues.</td>
	   </tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">C</td>
		<td class="font1" id="TdC2" style="width:470px;color:<?php if($resL['JobKnowl']=='C'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="JK" id="C2" value="C" <?php if($resL['JobKnowl']=='C'){echo 'checked';} ?> onClick="FunChkRdo(this.value,2,40)" disabled/>&nbsp;Fair knowledge of the job, but requires more training and experience, fair assimilation of information.</td>
		<td class="font" style="width:30px;" align="center" valign="top">D</td>
		<td class="font1" id="TdD2" style="width:470px;color:<?php if($resL['JobKnowl']=='D'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="JK" id="D2" value="D" <?php if($resL['JobKnowl']=='D'){echo 'checked';} ?> onClick="FunChkRdo(this.value,2,20)" disabled/>&nbsp;Needs frequents instructions; poor ability to grasp concepts and Issues.</td>
	   </tr>
	   <tr><td colspan="4" class="font" style="width:100px;color:#004A95;" bgcolor="">&nbsp;<font color="#000000">3. OUTPUT:</font> Quantity of work based on recognized standards consistency & regularity of work; Result orientation.
	   <input type="hidden" id="opt3" name="opt3" value="<?php if($resL['OutPut']=='A'){echo 80;}elseif($resL['OutPut']=='B'){echo 60;}elseif($resL['OutPut']=='C'){echo 40;}elseif($resL['OutPut']=='D'){echo 20;}else{echo 0;}?>" /></td></tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">A</td>
		<td class="font1" id="TdA3" style="width:470px;color:<?php if($resL['OutPut']=='A'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="OP" id="A3" value="A" <?php if($resL['OutPut']=='A'){echo 'checked';} ?> onClick="FunChkRdo(this.value,3,80)" disabled/>&nbsp;Exceptionally high output Consistent, regular and highly result oriented.</td>
		<td class="font" style="width:30px;" align="center" valign="top">B</td>
		<td class="font1" id="TdB3" style="width:470px;color:<?php if($resL['OutPut']=='B'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="OP" id="B3" value="B" <?php if($resL['OutPut']=='B'){echo 'checked';} ?> onClick="FunChkRdo(this.value,3,60)" disabled/>&nbsp;Always gives good I high output. Consistently result oriented.</td>
	   </tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">C</td>
		<td class="font1" id="TdC3" style="width:470px;color:<?php if($resL['OutPut']=='C'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="OP" id="C3" value="C" <?php if($resL['OutPut']=='C'){echo 'checked';} ?> onClick="FunChkRdo(this.value,3,40)" disabled/>&nbsp;Regularly meets recognized standards of output Mostly consistent producer.</td>
		<td class="font" style="width:30px;" align="center" valign="top">D</td>
		<td class="font1" id="TdD3" style="width:470px;color:<?php if($resL['OutPut']=='D'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="OP" id="D3" value="D" <?php if($resL['OutPut']=='D'){echo 'checked';} ?> onClick="FunChkRdo(this.value,3,20)" disabled/>&nbsp;Generally low output. Below recognized standards Inconsistent. Not regular.</td>
	   </tr>
	   <tr><td colspan="4" class="font" style="width:100px;color:#004A95;" bgcolor="">&nbsp;<font color="#000000">4. INITIATIVE:</font> Takes the first step. Proactive. Creates and is alert to opportunities.
	   <input type="hidden" id="opt4" name="opt4" value="<?php if($resL['Initiative']=='A'){echo 40;}elseif($resL['Initiative']=='B'){echo 30;}elseif($resL['Initiative']=='C'){echo 20;}elseif($resL['Initiative']=='D'){echo 10;}else{echo 0;}?>" /></td></tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">A</td>
		<td class="font1" id="TdA4" style="width:470px;color:<?php if($resL['Initiative']=='A'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="INI" id="A4" value="A" <?php if($resL['Initiative']=='A'){echo 'checked';} ?> onClick="FunChkRdo(this.value,4,40)" disabled/>&nbsp;Always takes the first step. Is proactive and creates opportunities.</td>
		<td class="font" style="width:30px;" align="center" valign="top">B</td>
		<td class="font1" id="TdB4" style="width:470px;color:<?php if($resL['Initiative']=='B'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="INI" id="B4" value="B" <?php if($resL['Initiative']=='B'){echo 'checked';} ?> onClick="FunChkRdo(this.value,4,30)" disabled/>&nbsp;Alert to opportunities. Takes the first step most of the times.</td>
	   </tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">C</td>
		<td class="font1" id="TdC4" style="width:470px;color:<?php if($resL['Initiative']=='C'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="INI" id="C4" value="C" <?php if($resL['Initiative']=='C'){echo 'checked';} ?> onClick="FunChkRdo(this.value,4,20)" disabled/>&nbsp;Works on his own. Takes the first step when confident.</td>
		<td class="font" style="width:30px;" align="center" valign="top">D</td>
		<td class="font1" id="TdD4" style="width:470px;color:<?php if($resL['Initiative']=='D'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="INI" id="D4" value="D" <?php if($resL['Initiative']=='D'){echo 'checked';} ?> onClick="FunChkRdo(this.value,4,10)" disabled/>&nbsp;Does not look for opportunities. Routine worker. Needs goading/persuasion.</td>
	   </tr>
	   <tr><td colspan="4" class="font" style="width:100px;color:#004A95;" bgcolor="">&nbsp;<font color="#000000">5. INTERPERSONAL SKILLS:</font> Degree of co-operation with team members; Ability to interact effectively with superiors, peers and subordinates.<input type="hidden" id="opt5" name="opt5" value="<?php if($resL['InterSkill']=='A'){echo 40;}elseif($resL['InterSkill']=='B'){echo 30;}elseif($resL['InterSkill']=='C'){echo 20;}elseif($resL['InterSkill']=='D'){echo 10;}else{echo 0;}?>" /></td></tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">A</td>
		<td class="font1" id="TdA5" style="width:470px;color:<?php if($resL['InterSkill']=='A'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="IS" id="A5" value="A" <?php if($resL['InterSkill']=='A'){echo 'checked';} ?> onClick="FunChkRdo(this.value,5,40)" disabled/>&nbsp;Very effective team member, co-operative; Respected and liked by superiors, peers and subordinates. High interactive ability at all levels.</td>
		<td class="font" style="width:30px;" align="center" valign="top">B</td>
		<td class="font1" id="TdB5" style="width:470px;color:<?php if($resL['InterSkill']=='B'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="IS" id="B5" value="B" <?php if($resL['InterSkill']=='B'){echo 'checked';} ?> onClick="FunChkRdo(this.value,5,30)" disabled/>&nbsp;Co-operative ; Respected. Has good relations with subordinate, peers and superiors.</td>
	   </tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">C</td>
		<td class="font1" id="TdC5" style="width:470px;color:<?php if($resL['InterSkill']=='C'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="IS" id="C5" value="C" <?php if($resL['InterSkill']=='C'){echo 'checked';} ?> onClick="FunChkRdo(this.value,5,20)" disabled/>&nbsp;Generally accepted as a team member. Occasionally abrasive in dealing with superior, peer and subordinate. </td>
		<td class="font" style="width:30px;" align="center" valign="top">D</td>
		<td class="font1" id="TdD5" style="width:470px;color:<?php if($resL['InterSkill']=='D'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="IS" id="D5" value="D" <?php if($resL['InterSkill']=='D'){echo 'checked';} ?> onClick="FunChkRdo(this.value,5,10)" disabled/>&nbsp;A loner, Has difficulty in a group/team.</td>
	   </tr>
	   <tr><td colspan="4" class="font" style="width:100px;color:#004A95;" bgcolor="">&nbsp;<font color="#000000">6. PROBLEM SOLVING:</font> Ability to go to the core of the problem. Makes a correct diagnosis with relevant.
	   <input type="hidden" id="opt6" name="opt6" value="<?php if($resL['ProblemSolve']=='A'){echo 40;}elseif($resL['ProblemSolve']=='B'){echo 30;}elseif($resL['ProblemSolve']=='C'){echo 20;}elseif($resL['ProblemSolve']=='D'){echo 10;}else{echo 0;}?>" /></td></tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">A</td>
		<td class="font1" id="TdA6" style="width:470px;color:<?php if($resL['ProblemSolve']=='A'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="PS" id="A6" value="A" <?php if($resL['ProblemSolve']=='A'){echo 'checked';} ?> onClick="FunChkRdo(this.value,6,40)" disabled/>&nbsp;Quickly goes to the core of the problem and makes a correct diagnosis, with relevant available data in all situations.</td>
		<td class="font" style="width:30px;" align="center" valign="top">B</td>
		<td class="font1" id="TdB6" style="width:470px;color:<?php if($resL['ProblemSolve']=='B'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="PS" id="B6" value="B" <?php if($resL['ProblemSolve']=='B'){echo 'checked';} ?> onClick="FunChkRdo(this.value,6,30)" disabled/>&nbsp;In most situations, goes to the core of the problem and makes a correct diagnosis available with limited data. </td>
	   </tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">C</td>
		<td class="font1" id="TdC6" style="width:470px;color:<?php if($resL['ProblemSolve']=='C'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="PS" id="C6" value="C" <?php if($resL['ProblemSolve']=='C'){echo 'checked';} ?> onClick="FunChkRdo(this.value,6,20)" disabled/>&nbsp;Has ability to solve problem of routine nature Requires assistance in solving problem. </td>
		<td class="font" style="width:30px;" align="center" valign="top">D</td>
		<td class="font1" id="TdD6" style="width:470px;color:<?php if($resL['ProblemSolve']=='D'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="PS" id="D6" value="D" <?php if($resL['ProblemSolve']=='D'){echo 'checked';} ?> onClick="FunChkRdo(this.value,6,10)" disabled/>&nbsp;Requires help to diagnose even problems of routine nature.</td>
	   </tr>
	   <tr><td colspan="4" class="font" style="width:100px;color:#004A95;" bgcolor="">&nbsp;<font color="#000000">7. ATTITUDE TOWARDS ORGANIZATION/WORK/AUTHORITY:</font> Attitudinal pre-disposition. Approach to work; sensitivity and temperament. 
	   <input type="hidden" id="opt7" name="opt7" value="<?php if($resL['Attitude']=='A'){echo 40;}elseif($resL['Attitude']=='B'){echo 30;}elseif($resL['Attitude']=='C'){echo 20;}elseif($resL['Attitude']=='D'){echo 10;}else{echo 0;}?>" /></td></tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">A</td>
		<td class="font1" id="TdA7" style="width:470px;color:<?php if($resL['Attitude']=='A'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="AT" id="A7" value="A" <?php if($resL['Attitude']=='A'){echo 'checked';} ?> onClick="FunChkRdo(this.value,7,40)" disabled/>&nbsp;Always positive in outlook towards organization/work/authority. Respects authority.</td>
		<td class="font" style="width:30px;" align="center" valign="top">B</td>
		<td class="font1" id="TdB7" style="width:470px;color:<?php if($resL['Attitude']=='B'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="AT" id="B7" value="B" <?php if($resL['Attitude']=='B'){echo 'checked';} ?> onClick="FunChkRdo(this.value,7,30)" disabled/>&nbsp;Mostly positive in outlook towards organization/work/authority.  </td>
	   </tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">C</td>
		<td class="font1" id="TdC7" style="width:470px;color:<?php if($resL['Attitude']=='C'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="AT" id="C7" value="C" <?php if($resL['Attitude']=='C'){echo 'checked';} ?> onClick="FunChkRdo(this.value,7,20)" disabled/>&nbsp;Generally positive in outlook towards work/subordinates. </td>
		<td class="font" style="width:30px;" align="center" valign="top">D</td>
		<td class="font1" id="TdD7" style="width:470px;color:<?php if($resL['Attitude']=='D'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="AT" id="D7" value="D" <?php if($resL['Attitude']=='D'){echo 'checked';} ?> onClick="FunChkRdo(this.value,7,10)" disabled/>&nbsp;Does not have a positive outlook/ approach  to organization/work. Indifferent to authority.</td>
	   </tr>
	    <tr><td colspan="4" class="font" style="width:100px;color:#004A95;" bgcolor="">&nbsp;<font color="#000000">8. ATTENDANCE & PUNCTUALITY REGULARITY OF ATTENDANCE:</font> Punctuality related to work place and work/ assigned tasks.  
		<input type="hidden" id="opt8" name="opt8" value="<?php if($resL['Attendance']=='A'){echo 40;}elseif($resL['Attendance']=='B'){echo 30;}elseif($resL['Attendance']=='C'){echo 20;}elseif($resL['Attendance']=='D'){echo 10;}else{echo 0;}?>" /></td></tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">A</td>
		<td class="font1" id="TdA8" style="width:470px;color:<?php if($resL['Attendance']=='A'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="ATT" id="A8" value="A" <?php if($resL['Attendance']=='A'){echo 'checked';} ?> onClick="FunChkRdo(this.value,8,40)" disabled/>&nbsp;Highly regular in attendance and punctuality. Highly work/ assignment oriented. </td>
		<td class="font" style="width:30px;" align="center" valign="top">B</td>
		<td class="font1" id="TdB8" style="width:470px;color:<?php if($resL['Attendance']=='B'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="ATT" id="B8" value="B" <?php if($resL['Attendance']=='B'){echo 'checked';} ?> onClick="FunChkRdo(this.value,8,30)" disabled/>&nbsp;Mostly regular in attendance. Reports on time Conscientious to assignments.  </td>
	   </tr>
	   <tr>
	    <td class="font" style="width:30px;" align="center" valign="top">C</td>
		<td class="font1" id="TdC8" style="width:470px;color:<?php if($resL['Attendance']=='C'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="ATT" id="C8" value="C" <?php if($resL['Attendance']=='C'){echo 'checked';} ?> onClick="FunChkRdo(this.value,8,20)" disabled/>&nbsp;Generally regular in attendance and quite punctual in meeting work norms. </td>
		<td class="font" style="width:30px;" align="center" valign="top">D</td>
		<td class="font1" id="TdD8" style="width:470px;color:<?php if($resL['Attendance']=='D'){echo '#FF3300';} ?>;" valign="top"><input type="radio" name="ATT" id="D8" value="D" <?php if($resL['Attendance']=='D'){echo 'checked';} ?> onClick="FunChkRdo(this.value,8,10)" disabled/>&nbsp;Poor attendance and punctuality. Casual attitude to work.</td>
	   </tr>
	  </table>
     </td>
  </tr>
   <tr>
   <td>
    <table border="0">
	 <tr><td colspan="2" style="height:10px;"></td></tr>
	 <tr><td class="font" style="width:200px;">&nbsp;Employee's Strength:</td>
	     <td style="width:800px;background-color:#F0EBE3;" align="center">
		 <input class="font1" style="width:795px;background-color:#F0EBE3;" maxlength="250" id="VEmpStrenght" name="ES" value="<?php echo $resL['EmpStrenght']; ?>" readonly/></td>
	 </tr>
	 <tr><td class="font" style="width:200px;">&nbsp;Areas of Improvement:</td>
	     <td style="width:800px;background-color:#F0EBE3;" align="center">
		 <input class="font1" style="width:795px;background-color:#F0EBE3;" maxlength="250" id="VAreaImprove" name="AI" value="<?php echo $resL['AreaImprovement']; ?>" readonly/></td>
	 </tr>
	 <tr><td colspan="2" style="height:10px;"></td></tr>
	</table>
   </td>
  </tr>
  <tr>
   <td>
    <table border="0">
	 <tr><td colspan="2" style="height:10px;"></td></tr>
	 <tr>
	  <td class="font" style="width:300px;">&nbsp;OVERALL RATING</td>
	  <td class="font1">
		 
		 <div id="DivR1" style="display:<?php if($resL['Rating']==1){echo 'block';}else{echo 'none';}?>;color:<?php if($resL['Rating']==1){echo '#FF3300';} ?>;">
		 <b>1</b>&nbsp;&nbsp;Unsatisfactory
		 <input type="radio" name="RAT" id="R1" value="1" <?php if($resL['Rating']==1){echo 'checked';} ?> onClick="FunRAT(this.value)" disabled/>
		 </div>
		 
		 <div id="DivR2" style="display:<?php if($resL['Rating']==2){echo 'block';}else{echo 'none';}?>;color:<?php if($resL['Rating']==2){echo '#FF3300';} ?>;">
		 <b>2</b>&nbsp;&nbsp;Needs Improvement
		 <input type="radio" name="RAT" id="R2" value="2" <?php if($resL['Rating']==2){echo 'checked';} ?> onClick="FunRAT(this.value)" disabled/>
		 </div>
		 
		 <div id="DivR3" style="display:<?php if($resL['Rating']==2.5){echo 'block';}else{echo 'none';}?>;color:<?php if($resL['Rating']==2.5){echo '#FF3300';} ?>;">
		 <b>2.5</b>&nbsp;&nbsp;Satisfactory
		 <input type="radio" name="RAT" id="R3" value="2.5" <?php if($resL['Rating']==2.5){echo 'checked';} ?> onClick="FunRAT(this.value)" disabled/>
		 </div>
		 
		 <div id="DivR4" style="display:<?php if($resL['Rating']==3){echo 'block';}else{echo 'none';}?>;color:<?php if($resL['Rating']==3){echo '#FF3300';} ?>;">
		 <b>3</b>&nbsp;&nbsp;Competent
		 <input type="radio" name="RAT" id="R4" value="3" <?php if($resL['Rating']==3){echo 'checked';} ?> onClick="FunRAT(this.value)" disabled/>
		 </div>

		 <div id="DivR5" style="display:<?php if($resL['Rating']==3.5){echo 'block';}else{echo 'none';}?>;color:<?php if($resL['Rating']==3.5){echo '#FF3300';} ?>;">
		 <b>3.5</b>&nbsp;&nbsp;Commendable
		 <input type="radio" name="RAT" id="R5" value="3.5" <?php if($resL['Rating']==3.5){echo 'checked';} ?> onClick="FunRAT(this.value)" disabled/>
		 </div>
		 
		 <div id="DivR6" style="display:<?php if($resL['Rating']==4){echo 'block';}else{echo 'none';}?>;color:<?php if($resL['Rating']==4){echo '#FF3300';} ?>;">
		 <b>4</b>&nbsp;&nbsp;Extraordinary
		 <input type="radio" name="RAT" id="R6" value="4" <?php if($resL['Rating']==4){echo 'checked';} ?> onClick="FunRAT(this.value)" disabled/>
		 </div>
		 
		 <div id="DivR7" style="display:<?php if($resL['Rating']==4.5){echo 'block';}else{echo 'none';}?>;color:<?php if($resL['Rating']==4.5){echo '#FF3300';} ?>;">
		 <b>4.5</b>&nbsp;&nbsp;Outstanding
		 <input type="radio" name="RAT" id="R7" value="4.5" <?php if($resL['Rating']==4.5){echo 'checked';} ?> onClick="FunRAT(this.value)" disabled/>
		 </div>
		 
		 <div id="DivR8" style="display:<?php if($resL['Rating']==5){echo 'block';}else{echo 'none';}?>;color:<?php if($resL['Rating']==5){echo '#FF3300';} ?>;">
		 <b>5</b>&nbsp;&nbsp;Exemplary
		 <input type="radio" name="RAT" id="R8" value="5" <?php if($resL['Rating']==5){echo 'checked';} ?> onClick="FunRAT(this.value)" disabled/>
		 </div>
		 
		 </td>
	 </tr>
	 <tr><td colspan="2" style="height:10px;"></td></tr>
	</table>
   </td>
  </tr>
  <script type="text/javascript">
  function FunRAT(r)
  { 
   if(r==1 || r==2){ document.getElementById("Rec2").checked=true; document.getElementById("Rec1").checked=false; }
   else{ document.getElementById("Rec2").checked=false; document.getElementById("Rec1").checked=true; }
  }
  </script>
  <tr>
   <td>
    <table border="0">
	<tr><td colspan="2" style="height:10px;"></td></tr>
	 <tr>
		 <td class="font" style="width:300px;">&nbsp;RECOMMENDATIONS:</td>
	     <td class="font1">
		 <div id="DivRc1" style="display:<?php if($resL['Recommendation']==1){echo 'block';}else{echo 'none';} ?>;color:<?php if($resL['Recommendation']==1){echo '#FF3300';} ?>;"> 
		 &nbsp;Confirmed on due date  <input type="radio" name="REC" id="Rec1" value="1" <?php if($resL['Recommendation']==1){echo 'checked';} elseif(($_REQUEST['d']==6 OR $_REQUEST['d']==19 OR $_REQUEST['d']==4 OR $_REQUEST['d']==21 OR $_REQUEST['d']==2) AND ($res['DesigId']==71 OR $res['DesigId']==174 OR $res['DesigId']==169 OR $res['DesigId']==139)){echo 'checked';} ?> onClick="ToREC(this.value)"/>
		 </div>
		 
		 <div id="DivRc2" style="display:<?php if($resL['Recommendation']==2){echo 'block';}else{echo 'none';} ?>;color:<?php if($resL['Recommendation']==2){echo '#FF3300';} ?>;">
		 &nbsp;Extend Probation <input type="radio" name="REC" id="Rec2" value="2" <?php if($resL['Recommendation']==2){echo 'checked';} ?> onClick="ToREC(this.value)" <?php if(($_REQUEST['d']==6 OR $_REQUEST['d']==19 OR $_REQUEST['d']==4 OR $_REQUEST['d']==21 OR $_REQUEST['d']==2) AND ($res['DesigId']==71 OR $res['DesigId']==174 OR $res['DesigId']==169 OR $res['DesigId']==139)) echo 'disabled'; ?> />
		 </div>
		 
		 </td>
	 </tr>
	 <tr><td colspan="2" style="height:10px;"></td></tr> 
	</table>
   </td>
  </tr>
   <tr>
   <td>
    <table border="0">
	 <tr><td colspan="2" style="height:10px;"></td></tr>
	 <tr><td class="font" style="width:950px;">&nbsp;If probation to be extended, mention reason:</td></tr>
	 <tr><td style="width:999px;background-color:#F0EBE3;" align="center">
		 <input class="font1" style="width:995px;background-color:#F0EBE3;" maxlength="450" id="ReasonExt" name="REA" value="<?php echo $resL['Reason']; ?>" /></td>
	 </tr>
	 <tr><td colspan="2" style="height:10px;"></td></tr>
	</table>
   </td>
  </tr>
   <tr>
   <td style="display:none;">
    <table border="0">
	 <tr><td colspan="3" class="font" style="width:950px;">&nbsp;Signature:</td></tr>
	 <tr><td colspan="3" style="height:50px;"></td></tr>
	 <tr><td class="font1" style="width:330px;" align="center" valign="bottom">-------------------------</td>
	     <td class="font1" style="width:330px;" align="center" valign="bottom">-------------------------</td>
		 <td class="font1" style="width:330px;" align="center" valign="bottom">-------------------------</td>
	 </tr>
	 <tr><td class="font1" style="width:330px;" align="center" valign="bottom">
	     <input class="font1" id="RSpan" style="width:345px;background-color:#FFFFFF;font-weight:bold;border-style:hidden;text-align:center;" readonly /></td>
	     <td class="font1" style="width:330px;" align="center" valign="bottom">
		 <input class="font1" id="HODSpan" style="width:345px; background-color:#FFFFFF;font-weight:bold;border-style:hidden;text-align:center;" readonly /></td>
		 <td class="font1" style="width:330px;" align="center" valign="bottom">
		 <input class="font1" id="HRSpan" style="width:345px; background-color:#FFFFFF;font-weight:bold;border-style:hidden;text-align:center;" readonly /></td>
	 </tr>
	 <tr><td class="font1" style="width:330px;" align="center" valign="top">(Appraiser)</td>
	     <td class="font1" style="width:330px;" align="center" valign="top">(HOD)</td>
		 <td class="font1" style="width:330px;" align="center" valign="top">(HR)</td>
	 </tr>
	 <tr><td colspan="2" style="height:10px;"></td></tr>
	</table>
   </td>
  </tr>
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="1000">
		<tr><td class="font" id="Tdlet" style="width:500px; display:none;" align="center">&nbsp;</td>
		    <td class="font" id="Tdletter" style="width:500px; display:block;" align="center">
		     <a href="#" onClick="LetterClick()" style="text-decoration:underline;"><font color="#FFFFFF"></a>&nbsp;&nbsp;&nbsp;&nbsp;
			 <a href="#" onClick="TrainyLetterClick()" style="text-decoration:underline;"><font color="#FFFFFF"></a></td>
		    <td align="center" class="font" style="width:260px; color:#FFFFFF;"><i><span id="SpanCofLeSpan"></span></i></td>
<?php if($rowL==0 OR $resL['SubmitStatus']=='N' OR $res['ConfirmHR']=='YY' OR ($rowL>0 AND date("Y-m-d")>=$Before15Day_1 AND $resL['Recommendation']==2 AND $resL['SubmitStatus']=='Y')){ ?>
			<td align="center" style="width:80px;"><input type="submit" name="FormSubmit" value="submit" id="btnSubmit" onClick="Tosubmit()" style="width:80px;display:<?php if(($rowL>0 AND $resL['SubmitStatus']=='N') OR $res['ConfirmHR']=='YY'){echo 'block'; } else {echo 'none'; } ?>;" disabled/></td>
			<td align="center" style="width:80px;"><input type="button" name="Edit" value="edit" id="btnEdit" onClick="edit()" style="width:80px;"/>
			<input type="submit" name="FormSave" value="save" id="btnSave" onClick="Tosave()" style="width:80px;display:none;"/></td>
			<?php } ?>
			<td align="center" style="width:80px;"><input type="button" name="Refresh" value="refresh" onClick="javascript:window.location='EmpConfForm.php?e=<?php echo $id; ?>&c=<?php echo $_REQUEST['c']; ?>&cd=<?php echo $_REQUEST['cd']; ?>&d=<?php echo $_REQUEST['d']; ?>'" style="width:80px;display:block;"/></td>
		</tr></table>
      </td>
    </tr>
  
</table>
	 </td>
	</tr>
  </table>
 </td>
  </tr>
   </form>
  </table>  
	  </td>
	 </tr>	
</form>
</table>

			
<?php //*************************************************************************************************************************************************** ?>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;">
		    <tr><td align="center" valign="top" width="100">&nbsp;</td></tr>
	        </table>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;"><tr><td align="center" valign="top">&nbsp;&nbsp;</td></tr></table>
		   </td>
		  </tr>
		</table>
	  </td>
	</tr>
	
	<tr><td valign="top" align="center">&nbsp;</td></tr>
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

