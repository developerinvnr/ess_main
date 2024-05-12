<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
$sqlE=mysql_query("select Fname,Sname,Lname,EmpCode,DesigId,DepartmentId,Gender,PanNo from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$EmployeeId, $con); $resE=mysql_fetch_assoc($sqlE); 
$sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$resE['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
$Ename=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; $LEC=strlen($resE['EmpCode']); 
if($LEC==1){$EC='000'.$resE['EmpCode'];} if($LEC==2){$EC='00'.$resE['EmpCode'];} if($LEC==3){$EC='0'.$resE['EmpCode'];} if($LEC>=4){$EC=$resE['EmpCode'];}?>
<?php 
if(isset($_POST['SaveInvstDec']))
{ 
  $sql=mysql_query("select * from hrm_employee_investment_submission where EmployeeID=".$EmployeeId." AND Period='".$_POST['Period']."' AND Month=".$_POST['YMonth'], $con);
  $row=mysql_num_rows($sql);
  if($row>0){ $sqlUp=mysql_query("update hrm_employee_investment_submission set FormSubmit='Y', HRA='".$_POST['HRA2']."', Curr_Medical='".$_POST['MaxMedical']."', Curr_LTA='".$_POST['MaxLTA']."', Curr_CEA='".$_POST['MaxCEA']."', Medical='".$_POST['Medical2']."', LTA='".$_POST['LTA2']."', CEA='".$_POST['CEA2']."', MIP='".$_POST['MIP2']."', MTI='".$_POST['MTI2']."', MTS='".$_POST['MTS2']."', ROL='".$_POST['ROL2']."', Handi='".$_POST['Handi2']."', 80G_Per='".$_POST['80GPer2']."', DTC='".$_POST['DTC2']."', RP='".$_POST['RP2']."', DFS='".$_POST['DFS2']."', PenFun='".$_POST['PenFun2']."', LIP='".$_POST['LIP2']."', DA='".$_POST['DA2']."', PPF='".$_POST['PPF2']."', PostOff='".$_POST['PostOff2']."', ULIP='".$_POST['ULIP2']."', HL='".$_POST['HL2']."', MF='".$_POST['MF2']."', IB='".$_POST['IB2']."', CTF='".$_POST['CTF2']."', NHB='".$_POST['NHB2']."', NSC='".$_POST['NSC2']."', SukS='".$_POST['SukS2']."', NPS='".$_POST['NPS2']."', CorNPS='".$_POST['CorNPS2']."', EPF='".$_POST['EPF2']."', Form16='".$_POST['Form162']."', SPE='".$_POST['SPE2']."', PT='".$_POST['PT2']."', PFD='".$_POST['PFD2']."', IT='".$_POST['IT2']."', IHL='".$_POST['IHL2']."', IL='".$_POST['IL2']."', Inv_Date='".date("Y-m-d",strtotime($_POST['Inv_Date']))."', Place='".$_POST['Place']."' where EmployeeID=".$EmployeeId." AND Period='".$_POST['Period']."' AND Month=".$_POST['YMonth'], $con);}
  if($row==0){ $sqlUp=mysql_query("insert into hrm_employee_investment_submission(EmployeeID, EC, Period, Month, Status, FormSubmit, HRA, Curr_Medical, Curr_LTA, Curr_CEA, Medical, LTA, CEA, MIP, MTI, MTS, ROL, Handi, 80G_Per, DTC, RP, DFS, PenFun, LIP, DA, PPF, PostOff, ULIP, HL, MF, IB, CTF, NHB, NSC, SukS, NPS, CorNPS, EPF, Form16, SPE, PT, PFD, IT, IHL, IL, Inv_Date, Place, YearId) values(".$EmployeeId.", '".$resE['EmpCode']."', '".$_POST['Period']."', ".$_POST['YMonth'].", 'A', 'Y', '".$_POST['HRA2']."', '".$_POST['MaxMedical']."', '".$_POST['MaxLTA']."', '".$_POST['MaxCEA']."', '".$_POST['Medical2']."', '".$_POST['LTA2']."', '".$_POST['CEA2']."', '".$_POST['MIP2']."', '".$_POST['MTI2']."', '".$_POST['MTS2']."', '".$_POST['ROL2']."', '".$_POST['Handi2']."', '".$_POST['80GPer2']."', '".$_POST['DTC2']."', '".$_POST['RP2']."', '".$_POST['DFS2']."', '".$_POST['PenFun2']."', '".$_POST['LIP2']."', '".$_POST['DA2']."', '".$_POST['PPF2']."', '".$_POST['PostOff2']."', '".$_POST['ULIP2']."', '".$_POST['HL2']."', '".$_POST['MF2']."', '".$_POST['IB2']."', '".$_POST['CTF2']."', '".$_POST['NHB2']."', '".$_POST['NSC2']."', '".$_POST['SukS2']."', '".$_POST['NPS2']."', '".$_POST['CorNPS2']."', '".$_POST['EPF2']."', '".$_POST['Form162']."', '".$_POST['SPE2']."', '".$_POST['PT2']."', '".$_POST['PFD2']."', '".$_POST['IT2']."', '".$_POST['IHL2']."', '".$_POST['IL2']."', '".date("Y-m-d",strtotime($_POST['Inv_Date']))."', '".$_POST['Place']."', ".$YearId.")", $con);}
  
  if($sqlUp){echo '<script>alert("Investment Submission Form Save Successfully..!");</script>';}
}

if(isset($_POST['SubmitInvstDec']))
{ $sql=mysql_query("select * from hrm_employee_investment_submission where EmployeeID=".$EmployeeId." AND Period='".$_POST['Period']."' AND Month=".$_POST['YMonth'], $con);
  $row=mysql_num_rows($sql);
  if($row>0){ $sqlUp=mysql_query("update hrm_employee_investment_submission set FormSubmit='YY', HRA='".$_POST['HRA2']."', Curr_Medical='".$_POST['MaxMedical']."', Curr_LTA='".$_POST['MaxLTA']."', Curr_CEA='".$_POST['MaxCEA']."', Medical='".$_POST['Medical2']."', LTA='".$_POST['LTA2']."', CEA='".$_POST['CEA2']."', MIP='".$_POST['MIP2']."', MTI='".$_POST['MTI2']."', MTS='".$_POST['MTS2']."', ROL='".$_POST['ROL2']."', Handi='".$_POST['Handi2']."', 80G_Per='".$_POST['80GPer2']."', DTC='".$_POST['DTC2']."', RP='".$_POST['RP2']."', DFS='".$_POST['DFS2']."', PenFun='".$_POST['PenFun2']."', LIP='".$_POST['LIP2']."', DA='".$_POST['DA2']."', PPF='".$_POST['PPF2']."', PostOff='".$_POST['PostOff2']."', ULIP='".$_POST['ULIP2']."', HL='".$_POST['HL2']."', MF='".$_POST['MF2']."', IB='".$_POST['IB2']."', CTF='".$_POST['CTF2']."', NHB='".$_POST['NHB2']."', NSC='".$_POST['NSC2']."', SukS='".$_POST['SukS2']."', NPS='".$_POST['NPS2']."', CorNPS='".$_POST['CorNPS2']."', EPF='".$_POST['EPF2']."', Form16='".$_POST['Form162']."', SPE='".$_POST['SPE2']."', PT='".$_POST['PT2']."', PFD='".$_POST['PFD2']."', IT='".$_POST['IT2']."', IHL='".$_POST['IHL2']."', IL='".$_POST['IL2']."', Inv_Date='".date("Y-m-d",strtotime($_POST['Inv_Date']))."', SubmittedDate='".date("Y-m-d")."', Place='".$_POST['Place']."' where EmployeeID=".$EmployeeId." AND Period='".$_POST['Period']."' AND Month=".$_POST['YMonth'], $con);}
  if($row==0){ $sqlUp=mysql_query("insert into hrm_employee_investment_submission(EmployeeID, EC, Period, Month, FormSubmit, HRA, Curr_Medical, Curr_LTA, Curr_CEA, Medical, LTA, CEA, MIP, MTI, MTS, ROL, Handi, 80G_Per, DTC, RP, DFS, PenFun, LIP, DA, PPF, PostOff, ULIP, HL, MF, IB, CTF, NHB, NSC, SukS, NPS, CorNPS, EPF, Form16, SPE, PT, PFD, IT, IHL, IL, Inv_Date, SubmittedDate, Place, YearId) values(".$EmployeeId.", '".$resE['EmpCode']."', '".$_POST['Period']."', ".$_POST['YMonth'].", 'YY', '".$_POST['HRA2']."', '".$_POST['MaxMedical']."', '".$_POST['MaxLTA']."', '".$_POST['MaxCEA']."', '".$_POST['Medical2']."', '".$_POST['LTA2']."', '".$_POST['CEA2']."', '".$_POST['MIP2']."', '".$_POST['MTI2']."', '".$_POST['MTS2']."', '".$_POST['ROL2']."', '".$_POST['Handi2']."', '".$_POST['80GPer2']."', '".$_POST['DTC2']."', '".$_POST['RP2']."', '".$_POST['DFS2']."', '".$_POST['PenFun2']."', '".$_POST['LIP2']."', '".$_POST['DA2']."', '".$_POST['PPF2']."', '".$_POST['PostOff2']."', '".$_POST['ULIP2']."', '".$_POST['HL2']."', '".$_POST['MF2']."', '".$_POST['IB2']."', '".$_POST['CTF2']."', '".$_POST['NHB2']."', '".$_POST['NSC2']."', '".$_POST['SukS2']."', '".$_POST['NPS2']."', '".$_POST['CorNPS2']."', '".$_POST['EPF2']."', '".$_POST['Form162']."', '".$_POST['SPE2']."', '".$_POST['PT2']."', '".$_POST['PFD2']."', '".$_POST['IT2']."', '".$_POST['IHL2']."', '".$_POST['IL2']."', '".date("Y-m-d",strtotime($_POST['Inv_Date']))."', '".date("Y-m-d")."', '".$_POST['Place']."', ".$YearId.")", $con);}
 
  if($sqlUp)
  { 
   echo '<script>alert("Investment Submission Form Submitted Successfully. Please Submit a Signed Copy Of The Submission Form To Accounts Which Will Be The Final Submission");</script>';
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

<style>.font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; } 
.font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }.textBox{width:100px;height:21px;background-color:#D6D6D6; text-align:center;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function Edit()
{ document.getElementById("SubmitInvstDec").style.display='block'; document.getElementById("SaveInvstDec").style.display='block'; 
  document.getElementById("EditInvstDec").style.display='none';  
var HRA=parseFloat(document.getElementById("HRA").value); var MIP=parseFloat(document.getElementById("MIP").value); var MTI=parseFloat(document.getElementById("MTI").value);
var MTS=parseFloat(document.getElementById("MTS").value); var ROL=parseFloat(document.getElementById("ROL").value); var Handi=parseFloat(document.getElementById("Handi").value); 
var DTC=parseFloat(document.getElementById("DTC").value); var RP=parseFloat(document.getElementById("RP").value);  var DFS=parseFloat(document.getElementById("DFS").value);
var PenFun=parseFloat(document.getElementById("PenFun").value); var LIP=parseFloat(document.getElementById("LIP").value); var DA=parseFloat(document.getElementById("DA").value);
var PPF=parseFloat(document.getElementById("PPF").value); var PostOff=parseFloat(document.getElementById("PostOff").value);
var ULIP=parseFloat(document.getElementById("ULIP").value); var HL=parseFloat(document.getElementById("HL").value); var MF=parseFloat(document.getElementById("MF").value);
var IB=parseFloat(document.getElementById("IB").value); var CTF=parseFloat(document.getElementById("CTF").value); var NHB=parseFloat(document.getElementById("NHB").value); 
var NSC=parseFloat(document.getElementById("NSC").value); var SukS=parseFloat(document.getElementById("SukS").value); 
var NPS=parseFloat(document.getElementById("NPS").value); var CorNPS=parseFloat(document.getElementById("CorNPS").value);
var EPF=parseFloat(document.getElementById("EPF").value);
var Form16=parseFloat(document.getElementById("Form16").value); var SPE=parseFloat(document.getElementById("SPE").value); var PT=parseFloat(document.getElementById("PT").value);
var PFD=parseFloat(document.getElementById("PFD").value); var IT=parseFloat(document.getElementById("IT").value); var IHL=parseFloat(document.getElementById("IHL").value);
var IL=parseFloat(document.getElementById("IL").value); 
var HRA2=parseFloat(document.getElementById("HRA2").value); var MIP2=parseFloat(document.getElementById("MIP2").value); var MTI2=parseFloat(document.getElementById("MTI2").value);
var MTS2=parseFloat(document.getElementById("MTS2").value); var ROL2=parseFloat(document.getElementById("ROL2").value); var Handi2=parseFloat(document.getElementById("Handi2").value);var DTC2=parseFloat(document.getElementById("DTC2").value); var RP2=parseFloat(document.getElementById("RP2").value); var DFS2=parseFloat(document.getElementById("DFS2").value);
var PenFun2=parseFloat(document.getElementById("PenFun2").value); var LIP2=parseFloat(document.getElementById("LIP2").value); var DA2=parseFloat(document.getElementById("DA2").value);
var PPF2=parseFloat(document.getElementById("PPF2").value); var PostOff2=parseFloat(document.getElementById("PostOff2").value);
var ULIP2=parseFloat(document.getElementById("ULIP2").value); var HL2=parseFloat(document.getElementById("HL2").value); var MF2=parseFloat(document.getElementById("MF2").value);
var IB2=parseFloat(document.getElementById("IB2").value); var CTF2=parseFloat(document.getElementById("CTF2").value); var NHB2=parseFloat(document.getElementById("NHB2").value); 
var NSC2=parseFloat(document.getElementById("NSC2").value);var SukS2=parseFloat(document.getElementById("SukS2").value);
var NPS2=parseFloat(document.getElementById("NPS2").value); var CorNPS2=parseFloat(document.getElementById("CorNPS2").value);
var EPF2=parseFloat(document.getElementById("EPF2").value);
var Form162=parseFloat(document.getElementById("Form162").value); var SPE2=parseFloat(document.getElementById("SPE2").value); var PT2=parseFloat(document.getElementById("PT2").value);
var PFD2=parseFloat(document.getElementById("PFD2").value); var IT2=parseFloat(document.getElementById("IT2").value); var IHL2=parseFloat(document.getElementById("IHL2").value);
var IL2=parseFloat(document.getElementById("IL2").value);
  
    
if(HRA>=0){if(HRA2==0){document.getElementById("HRA2").value=HRA;}document.getElementById("HRA2").readOnly=false; document.getElementById("HRA2").style.backgroundColor='#F0F8FF';}


var LTA=parseFloat(document.getElementById("LTA").value); var CEA=parseFloat(document.getElementById("CEA").value);
var LTA2=parseFloat(document.getElementById("LTA2").value); var CEA2=parseFloat(document.getElementById("CEA2").value);   
if(LTA>=0){if(LTA2==0){document.getElementById("LTA2").value=LTA;}document.getElementById("LTA2").readOnly=false; document.getElementById("LTA2").style.backgroundColor='#E0DBE3';}
if(CEA>=0){if(CEA2==0){document.getElementById("CEA2").value=CEA;}document.getElementById("CEA2").readOnly=false; document.getElementById("CEA2").style.backgroundColor='#E0DBE3';}  


if(MIP>=0){if(MIP2==0){document.getElementById("MIP2").value=MIP;}document.getElementById("MIP2").readOnly=false; document.getElementById("MIP2").style.backgroundColor='#F0F8FF';}
if(MTI>=0){if(MTI2==0){document.getElementById("MTI2").value=MTI;}document.getElementById("MTI2").readOnly=false; document.getElementById("MTI2").style.backgroundColor='#F0F8FF';}
if(MTS>=0){if(MTS2==0){document.getElementById("MTS2").value=MTS;}document.getElementById("MTS2").readOnly=false; document.getElementById("MTS2").style.backgroundColor='#F0F8FF';}
if(ROL>=0){if(ROL2==0){document.getElementById("ROL2").value=ROL;}document.getElementById("ROL2").readOnly=false; document.getElementById("ROL2").style.backgroundColor='#F0F8FF';}
if(Handi>=0){if(Handi2==0){document.getElementById("Handi2").value=Handi;}document.getElementById("Handi2").readOnly=false; 
                                                                         document.getElementById("Handi2").style.backgroundColor='#F0F8FF';}
if(DTC>=0){if(DTC2==0){document.getElementById("DTC2").value=DTC;}document.getElementById("DTC2").readOnly=false; document.getElementById("DTC2").style.backgroundColor='#F0F8FF';}
if(RP>=0){if(RP2==0){document.getElementById("RP2").value=RP;}document.getElementById("RP2").readOnly=false; document.getElementById("RP2").style.backgroundColor='#F0F8FF';}
if(DFS>=0){if(DFS2==0){document.getElementById("DFS2").value=DFS;}document.getElementById("DFS2").readOnly=false; document.getElementById("DFS2").style.backgroundColor='#F0F8FF';}

if(PenFun>=0){ if(PenFun2==0){document.getElementById("PenFun2").value=PenFun;}  
document.getElementById("PenFun2").readOnly=false; document.getElementById("PenFun2").style.backgroundColor='#F0F8FF';}
 

if(LIP>=0){if(LIP2==0){document.getElementById("LIP2").value=LIP;}document.getElementById("LIP2").readOnly=false; document.getElementById("LIP2").style.backgroundColor='#F0F8FF';}
if(DA>=0){if(DA2==0){document.getElementById("DA2").value=DA;}document.getElementById("DA2").readOnly=false; document.getElementById("DA2").style.backgroundColor='#F0F8FF';}
if(PPF>=0){if(PPF2==0){document.getElementById("PPF2").value=PPF;}document.getElementById("PPF2").readOnly=false; document.getElementById("PPF2").style.backgroundColor='#F0F8FF';}
if(PostOff>=0){if(PostOff2==0){document.getElementById("PostOff2").value=PostOff;}document.getElementById("PostOff2").readOnly=false; 
                                                                                 document.getElementById("PostOff2").style.backgroundColor='#F0F8FF';} 
if(ULIP>=0){if(ULIP2==0){document.getElementById("ULIP2").value=ULIP;}document.getElementById("ULIP2").readOnly=false; 
                                                                     document.getElementById("ULIP2").style.backgroundColor='#F0F8FF';} 
if(HL>=0){if(HL2==0){document.getElementById("HL2").value=HL;}document.getElementById("HL2").readOnly=false; document.getElementById("HL2").style.backgroundColor='#F0F8FF';}
if(MF>=0){if(MF2==0){document.getElementById("MF2").value=MF;}document.getElementById("MF2").readOnly=false; document.getElementById("MF2").style.backgroundColor='#F0F8FF';}
if(IB>=0){if(IB2==0){document.getElementById("IB2").value=IB;}document.getElementById("IB2").readOnly=false; document.getElementById("IB2").style.backgroundColor='#F0F8FF';}
if(CTF>=0){if(CTF2==0){document.getElementById("CTF2").value=CTF;}document.getElementById("CTF2").readOnly=false;document.getElementById("CTF2").style.backgroundColor='#F0F8FF';}
if(NHB>=0){if(NHB2==0){document.getElementById("NHB2").value=NHB;}document.getElementById("NHB2").readOnly=false;document.getElementById("NHB2").style.backgroundColor='#F0F8FF';}
if(NSC>=0){if(NSC2==0){document.getElementById("NSC2").value=NSC;}document.getElementById("NSC2").readOnly=false;document.getElementById("NSC2").style.backgroundColor='#F0F8FF';}
if(SukS>=0){if(SukS2==0){document.getElementById("SukS2").value=SukS;}document.getElementById("SukS2").readOnly=false;
                                                                     document.getElementById("SukS2").style.backgroundColor='#F0F8FF';}
if(EPF>=0){if(EPF2==0){document.getElementById("EPF2").value=EPF;}document.getElementById("EPF2").readOnly=false; document.getElementById("EPF2").style.backgroundColor='#F0F8FF'; }

if(Form16>=0){if(Form162==0){document.getElementById("Form162").value=Form16;}document.getElementById("Form162").readOnly=false; 
document.getElementById("Form162").style.backgroundColor='#F0F8FF';}

if(NPS>=0){if(NPS2==0){document.getElementById("NPS2").value=NPS;}document.getElementById("NPS2").readOnly=false;
    document.getElementById("NPS2").style.backgroundColor='#F0F8FF';}
	
if(CorNPS>=0){if(CorNPS2==0){document.getElementById("CorNPS2").value=CorNPS;}document.getElementById("CorNPS2").readOnly=false;
    document.getElementById("CorNPS2").style.backgroundColor='#F0F8FF';}		
    
                                                                              
if(SPE=>0){if(SPE2==0){document.getElementById("SPE2").value=SPE;}document.getElementById("SPE2").readOnly=false; document.getElementById("SPE2").style.backgroundColor='#F0F8FF';}
if(PT>=0){if(PT2==0){document.getElementById("PT2").value=PT;}document.getElementById("PT2").readOnly=false; document.getElementById("PT2").style.backgroundColor='#F0F8FF';}
if(PFD>=0){if(PFD2==0){document.getElementById("PFD2").value=PFD;}document.getElementById("PFD2").readOnly=false; document.getElementById("PFD2").style.backgroundColor='#F0F8FF';}
if(IT>=0){if(IT2==0){document.getElementById("IT2").value=IT;}document.getElementById("IT2").readOnly=false; document.getElementById("IT2").style.backgroundColor='#F0F8FF';}
if(IHL>=0){if(IHL2==0){document.getElementById("IHL2").value=IHL;}document.getElementById("IHL2").readOnly=false; document.getElementById("IHL2").style.backgroundColor='#F0F8FF';}
if(IL>=0){if(IL2==0){document.getElementById("IL2").value=IL;}document.getElementById("IL2").readOnly=false; document.getElementById("IL2").style.backgroundColor='#F0F8FF';}

  
  document.getElementById("Place").readOnly=false; document.getElementById("Place").style.backgroundColor='#F0F8FF';
  var Medical=parseFloat(document.getElementById("Medical").value); 
  var Medical2=parseFloat(document.getElementById("Medical2").value); 
if(Medical>0){if(Medical2==0){document.getElementById("Medical2").value=Medical;}document.getElementById("Medical2").readOnly=false; 
                                                                                 document.getElementById("Medical2").style.backgroundColor='#E0DBE3';} 

}  

function AttachSign(EI, YI)
{ var win=window.open("EmpSignImg.php?EI="+EI+"&YI="+YI,"SignForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=500,height=150"); 
  var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="InvestDecl.php"; } }, 1000);
}

function validate(InvstDecForm) 
{ var Numfilter=/^[0-9. ]+$/;  
  var HRA = parseFloat(InvstDecForm.HRA2.value); var MaxHRA = parseFloat(InvstDecForm.HRA.value); var testN_HRA = Numfilter.test(HRA); 
  if(HRA!=''){ if(testN_HRA==false) { alert('Please Enter Only Number In The HRA Value..');  return false; } } 
  //if(HRA>MaxHRA){alert("Error..Please Check Of HRA Declared Amount & Submission Amount Value..!"); return false;}
  var Medical = parseFloat(InvstDecForm.Medical2.value); var MaxMedical = parseFloat(InvstDecForm.Medical.value); var testN_Medical = Numfilter.test(Medical); 
  //if(Medical!=''){ if(testN_Medical==false) { alert('Please Enter Only Number In The Medical Bills Value..');  return false; } } 
  //if(Medical>MaxMedical) {alert("Error..Please Check Medical Bills Declared Amount & Submission Amount Value..!"); return false;}
  
  var LTA = parseFloat(InvstDecForm.LTA2.value); var MaxLTA = parseFloat(InvstDecForm.LTA.value); var testN_LTA = Numfilter.test(LTA); 
  //if(LTA!='') { if(testN_LTA==false) { alert('Please Enter Only Number In The LTA Declared Amount & Submission Amount Value..');  return false; } } 
  //if(LTA>MaxLTA) {alert("Error..Please Check LTA Declared Amount & Submission Amount Value..!"); return false;}
  
  var CEA = parseFloat(InvstDecForm.CEA2.value); var MaxCEA = parseFloat(InvstDecForm.CEA.value); var testN_CEA = Numfilter.test(CEA); 
  //if(CEA!='') { if(testN_CEA==false) { alert('Please Enter Only Number In The CEA  Value..');  return false; } } 
  //if(CEA>MaxCEA) {alert("Error..Please Check CEA Declared Amount & Submission Amount Value..!"); return false;} 
  
  var MIP = parseFloat(InvstDecForm.MIP2.value); var MaxMIP = parseFloat(InvstDecForm.MIP.value); var testN_MIP = Numfilter.test(MIP);
  if(MIP!='') { if(testN_MIP==false) { alert('Please Enter Only Number In The Medical Insurance Premium Value..');  return false; } }
  //if(MIP>MaxMIP) {alert("Error..Please Check Medical Insurance Premium Declared Amount & Submission Amount Value..!"); return false;} 
  var MTI = parseFloat(InvstDecForm.MTI2.value); var MaxMTI = parseFloat(InvstDecForm.MTI.value); var testN_MTI = Numfilter.test(MTI);
  if(MTI!='') { if(testN_MTI==false) { alert('Please Enter Only Number In The Medical Treatment/Insurance Value..');  return false; } }  
  //if(MTI>MaxMTI) {alert("Error..Please Check Medical Treatment/Insurance Declared Amount & Submission Amount value..!"); return false;}
  var MTS = parseFloat(InvstDecForm.MTS2.value); var MaxMTS = parseFloat(InvstDecForm.MTS.value); var testN_MTS = Numfilter.test(MTS);
  if(MTS!='') { if(testN_MTS==false) { alert('Please Enter Only Number In The Medical Treatment Value..');  return false; } } 
  //if(MTS>MaxMTS) {alert("Error..Please Check Medical Treatment Declared Amount & Submission Amount Value..!"); return false;} 
  
  var ROL = parseFloat(InvstDecForm.ROL2.value); var MaxROL = parseFloat(InvstDecForm.ROL.value); var testN_ROL = Numfilter.test(ROL);
  if(ROL!='') { if(testN_ROL==false) { alert('Please Enter Only Number In TheRepayment of Loan Value..');  return false; }  } 
  
  var Handi = parseFloat(InvstDecForm.Handi2.value); var MaxHandi = parseFloat(InvstDecForm.Handi.value); var testN_Handi = Numfilter.test(Handi);
  if(Handi!='') { if(testN_Handi==false) { alert('Please Enter Only Number In The Handicapped Value..');  return false; }  }
  //if(Handi>MaxHandi) {alert("Error..Please Check Handicapped Declared Amount & Submission Amount Value..!"); return false;} 
  
  var DTC = parseFloat(InvstDecForm.DTC2.value); var MaxDTC = parseFloat(InvstDecForm.DTC.value); var testN_DTC = Numfilter.test(DTC);
  if(DTC!='') { if(testN_DTC==false) { alert('Please Enter Only Number In The Donation to certain funds Value..');  return false; }  }
  //if(DTC>MaxDTC) {alert("Error..Please Check Donation to certain funds Declared Amount & Submission Amount Value..!"); return false;} 
  
  //var RP = parseFloat(InvstDecForm.RP2.value); var MaxRP = parseFloat(InvstDecForm.RP.value); var testN_RP = Numfilter.test(RP); 
  //if(RP!='') { if(testN_RP==false) { alert('Please Enter Only Number In The Rent Paid Value..');  return false; }  }
  //if(RP>MaxRP) {alert("Error..Please Check Rent Paid Declared Amount & Submission Amount Value..!"); return false;}
  
  var DFS = parseFloat(InvstDecForm.DFS2.value); var MaxDFS = parseFloat(InvstDecForm.DFS.value); var testN_DFS = Numfilter.test(DFS);  
  
  var PenFun = parseFloat(InvstDecForm.PenFun2.value); var MaxPenFun = parseFloat(InvstDecForm.PenFun.value); var testN_PenFun = Numfilter.test(PenFun);
  if(PenFun!='') { if(testN_PenFun==false) { alert('Please Enter Only Number In The Pension Fund (Jeevan Suraksha) Value..');  return false; } }  
  //if(PenFun>MaxPenFun) {alert("Error..Please Check Pension Fund (Jeevan Suraksha) Declared Amount & Submission Amount Value..!"); return false;}
  var LIP = parseFloat(InvstDecForm.LIP2.value); var MaxLIP = parseFloat(InvstDecForm.LIP.value); var testN_LIP = Numfilter.test(LIP);
  if(LIP!='') { if(testN_LIP==false) { alert('Please Enter Only Number In The Life Insurance Premium Value..');  return false; } }  
  //if(LIP>MaxLIP) {alert("Error..Please Check Life Insurance Premium Declared Amount & Submission Amount Value..!"); return false;}
  var DA = parseFloat(InvstDecForm.DA2.value); var MaxDA = parseFloat(InvstDecForm.DA.value); var testN_DA = Numfilter.test(DA);
  if(DA!='') { if(testN_DA==false) { alert('Please Enter Only Number In The Defferred Annuity Value..');  return false; }  }
  //if(DA>MaxDA) {alert("Error..Please Check Defferred Annuity Declared Amount & Submission Amount Value..!"); return false;} 
  var PPF = parseFloat(InvstDecForm.PPF2.value); var MaxPPF = parseFloat(InvstDecForm.PPF.value); var testN_PPF = Numfilter.test(PPF);
  if(PPF!='') { if(testN_PPF==false) { alert('Please Enter Only Number In The Public Provident Fund Value..');  return false; }  }
  //if(PPF>MaxPPF) {alert("Error..Please Check Public Provident Fund Declared Amount & Submission Amount Value..!"); return false;}
  var PostOff = parseFloat(InvstDecForm.PostOff2.value); var MaxPostOff = parseFloat(InvstDecForm.PostOff.value); var testN_PostOff = Numfilter.test(PostOff);
  if(PostOff!='') { if(testN_PostOff==false) { alert('Please Enter Only Number In The Time Deposit In Post Office / Bank Value..');  return false; } }  
  //if(PostOff>MaxPostOff) {alert("Error..Please Check Max. Limit Of Time Deposit In Post Office / Bank Declared Amount & Submission Amount Value..!"); return false;}
  var ULIP = parseFloat(InvstDecForm.ULIP2.value); var MaxULIP = parseFloat(InvstDecForm.ULIP.value); var testN_ULIP = Numfilter.test(ULIP);
  if(ULIP!='') { if(testN_ULIP==false) { alert('Please Enter Only Number In The ULIP of UTI/LIC Value..');  return false; }  }
  //if(ULIP>MaxULIP) {alert("Error..Please Check ULIP of UTI/LIC Declared Amount & Submission Amount Value..!"); return false;}
  var HL = parseFloat(InvstDecForm.HL2.value); var MaxHL = parseFloat(InvstDecForm.HL.value); var testN_HL = Numfilter.test(HL);
  if(HL!='') { if(testN_HL==false) { alert('Please Enter Only Number In The Principal Loan (Housing Loan) Repayment Value..');  return false; } }  
  //if(HL>MaxHL) {alert("Error..Please Check Principal Loan (Housing Loan) Repayment Declared Amount & Submission Amount Value..!"); return false;}
  var MF = parseFloat(InvstDecForm.MF2.value); var MaxMF = parseFloat(InvstDecForm.MF.value); var testN_MF = Numfilter.test(MF);
  if(MF!='') { if(testN_MF==false) { alert('Please Enter Only Number In The Mutual Funds Value..');  return false; }  }
  //if(MF>MaxMF) {alert("Error..Please Check Mutual Funds Declared Amount & Submission Amount Value..!"); return false;}
  var IB = parseFloat(InvstDecForm.IB2.value); var MaxIB = parseFloat(InvstDecForm.IB.value); var testN_IB = Numfilter.test(IB);
  if(IB!='') { if(testN_IB==false) { alert('Please Enter Only Number In The Investment In Infrastructure Bonds Value..');  return false; } }  
  //if(IB>MaxIB) {alert("Error..Please Check Investment In Infrastructure Bonds Declared Amount & Submission Amount Value..!"); return false;}
  var CTF = parseFloat(InvstDecForm.CTF2.value); var MaxCTF = parseFloat(InvstDecForm.CTF.value); var testN_CTF = Numfilter.test(CTF);
  if(CTF!='') { if(testN_CTF==false) { alert('Please Enter Only Number In The Children- Tution Fee Value..');  return false; } }  
  //if(CTF>MaxCTF) {alert("Error..Please Check Children- Tution Fee Declared Amount & Submission Amount Value..!"); return false;}
  var NHB = parseFloat(InvstDecForm.NHB2.value); var MaxNHB = parseFloat(InvstDecForm.NHB.value); var testN_NHB = Numfilter.test(NHB);
  if(NHB!='') { if(testN_NHB==false) { alert('Please Enter Only Number In The Deposit In NHB Value..');  return false; }  }
  //if(NHB>MaxNHB) {alert("Error..Please Check Deposit In NHB Declared Amount & Submission Amount Value..!"); return false;} 
  
  var NSC = parseFloat(InvstDecForm.NSC2.value); var MaxNSC = parseFloat(InvstDecForm.NSC.value); var testN_NSC = Numfilter.test(NSC);
  if(NSC!='') { if(testN_NSC==false) { alert('Please Enter Only Number In The Deposit In NSC Value..');  return false; }  }
  //alert(NSC+"-"+MaxNSC);
  //if(NSC>MaxNSC) {alert("Error..Please Check Deposit In NSC Declared Amount & Submission Amount Value..!"); return false;} 
  
  var SukS = parseFloat(InvstDecForm.SukS2.value); var MaxSukS = parseFloat(InvstDecForm.SukS.value); var testN_SukS = Numfilter.test(SukS);
  if(SukS!='') { if(testN_SukS==false) { alert('Please Enter Only Number In The Sukanya Samriddhi Value..');  return false; }  }
  //if(SukS>MaxSukS) {alert("Error..Please Check Sukanya Samriddhi Declared Amount & Submission Amount Value..!"); return false;}
  
  var NPS = parseFloat(InvstDecForm.NPS2.value); var MaxNPS = parseFloat(InvstDecForm.NPS.value); var testN_NPS = Numfilter.test(NPS);
  if(NPS!='') { if(testN_NPS==false) { alert('Please Enter Only Number In The National Pension Scheme..');  return false; }  }
  
  //if(NPS>MaxNPS) {alert("Error..Please Check National Pension Scheme Amount & Submission Amount Value..!"); return false;}

  
  var EPF = parseFloat(InvstDecForm.EPF2.value); var MaxEPF = parseFloat(InvstDecForm.EPF.value); var testN_EPF = Numfilter.test(EPF);
  if(EPF!='') { if(testN_EPF==false) { alert('Please Enter Only Number In The Employee Provident Fund Value..');  return false; }  }
  //if(EPF>MaxEPF) {alert("Error..Please Check Employee Provident Fund Declared Amount & Submission Amount Value..!"); return false;}
  
  var Form16 = parseFloat(InvstDecForm.Form162.value); var MaxForm16 = parseFloat(InvstDecForm.Form16.value); var testN_Form16 = Numfilter.test(Form16);
  var SPE = parseFloat(InvstDecForm.SPE2.value); var MaxSPE = parseFloat(InvstDecForm.SPE.value); var testN_SPE = Numfilter.test(SPE);
  var PT = parseFloat(InvstDecForm.PT2.value); var MaxPT = parseFloat(InvstDecForm.PT.value); var testN_PT = Numfilter.test(PT);
  var PFD = parseFloat(InvstDecForm.PFD2.value); var MaxPFD = parseFloat(InvstDecForm.PFD.value); var testN_PFD = Numfilter.test(PFD);
  var IT = parseFloat(InvstDecForm.IT2.value); var MaxIT = parseFloat(InvstDecForm.IT.value); var testN_IT = Numfilter.test(IT);
   
  var IHL = parseFloat(InvstDecForm.IHL2.value); var MaxIHL = parseFloat(InvstDecForm.IHL.value); var testN_IHL = Numfilter.test(IHL);
  if(IHL!='') { if(testN_IHL==false) { alert('Please Enter Only Number In The Interest On Housing Loan Value..');  return false; }  }
  //if(IHL>MaxIHL) {alert("Error..Please Check Interest On Housing Loan Declared Amount & Submission Amount Value..!"); return false;}
  var IL = parseFloat(InvstDecForm.IL2.value); var MaxIL = parseFloat(InvstDecForm.IL.value); var testN_IL = Numfilter.test(IL);  
  if(IL!='') { if(testN_IL==false) { alert('Please Enter Only Number In The Interest If The Loan Is Taken Before 01/04/99 Value..');  return false; } } 
  //if(IL>MaxIL) {alert("Error..Please Check Interest If The Loan Is Taken Before 01/04/99 Declared Amount & Submission Amount Value..!"); return false;}  
 
  var Inv_Date = InvstDecForm.Inv_Date.value; 
  if(Inv_Date.length === 0) { alert("Please Enter Investment Submission Date!.");  return false; } 
  var Place = InvstDecForm.Place.value; var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(Place); 
  if(Place.length === 0) { alert("Please Enter Place!.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets In The Place Name Field..!'); return false; }  
  
}

function PrintInvestSub(P,EI,M)
{ var YI=document.getElementById("YearId").value; var CI=document.getElementById("ComId").value; 
  window.open("PrintInvatDeclSb.php?action=Print&EI="+EI+"&YI="+YI+"&CI="+CI+"&P="+P+"&M="+M,"PrintForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=910,height=650");
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
<?php $sqlInvSb=mysql_query("select OpenYN from hrm_investdecl_setting_submission where CompanyId=".$CompanyId, $con); $resInvSb=mysql_fetch_assoc($sqlInvSb);
      $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$YearId, $con); $resy=mysql_fetch_array($sqly);
	  $fsd=date("Y",strtotime($resy['FromDate'])); $tsd=date("Y",strtotime($resy['ToDate'])); $Prd=$fsd.'-'.$tsd; ?>   
		     <table border="0" id="Activity">
			  <tr>
			     <td id="Anni" valign="top">
				    <table border="0">
						  <tr height="20">
						    <td align="left" valign="top" width="150">
<?php include("EmpImgEmp.php"); ?></td>
						  </tr>
					 </table>
				 </td>				 
				  <td align="left" width="850" valign="top">
	     <table border="0" width="850">
<?php $MaxSb=mysql_query("select MAX(IvstDecId) as MaxSb from hrm_employee_investment_declaration where EmployeeID=".$EmployeeId." AND Period='".$Prd."'", $con); 
      $resMaxSb=mysql_fetch_assoc($MaxSb); 
      if($resMaxSb['MaxSb']>0){ $Check=mysql_query("select * from hrm_employee_investment_declaration where IvstDecId=".$resMaxSb['MaxSb'], $con); $resIvst=mysql_fetch_assoc($Check); } 
      else
	  {
	   $MaxSb=mysql_query("select MAX(IvstDecId) as MaxSb from hrm_employee_investment_declaration where Period='".$Prd."'", $con); $resMaxSb=mysql_fetch_assoc($MaxSb);
	   $Check=mysql_query("select Month from hrm_employee_investment_declaration where IvstDecId=".$resMaxSb['MaxSb'], $con);       $resIvst=mysql_fetch_assoc($Check); 
	  }
      
      if($resIvst['Month']!='')
      { 	  
       $sqlEdit=mysql_query("select * from hrm_employee_investment_submission where EmployeeID=".$EmployeeId." AND Period='".$Prd."' AND Month=".$resIvst['Month'], $con);
	  $rowEdit=mysql_num_rows($sqlEdit);  $resIvst2=mysql_fetch_assoc($sqlEdit);
	  
	  $sql=mysql_query("select * from hrm_investdecl_setting_limit where CompanyId=".$CompanyId." AND Period='".$Prd."' AND Month=".$resIvst['Month'], $con); 
	  $res=mysql_fetch_array($sql);
      }  
?> 
		    <tr>
			 <td><table border="0"><tr>
			 <td align="right" style="width:200px;"><?php if($rowEdit>0){ ?>
			 <font style="color:#FF0DFF;font-size:14px;font-family:Times New Roman;"></font><a href="#" onClick="PrintInvestSub('<?php echo $Prd; ?>', <?php echo $EmployeeId.', '.$resIvst['Month']; ?>)" style="font-size:14px;font-family:Times New Roman;"><b>Print</b></a><?php } ?>
			 </td>
			 </tr>
			 <tr>
			 <td align="center" style="width:740px;">
			 <font color="#106809" style='font-family:Times New Roman;' size="4"><b>Investment Submission Form <?php echo $Prd; ?></b></font></td>
			 </tr>
			 <tr>
             <td colspan="2" style="width:850px;font-size:14px; font-family:Times New Roman;" valign="top">
	   <b><u>Please remember the following points while filling up the form</u>  :</b><br>
	   <b>(a)</b> Do not forget to mention you Employee Id , Name & Pan card .<br>
	   <b>(b)</b> Only Submission Amount needs to be filled. Donot change the figures mentioned in Max. limit Column.<br>
	   <b>(c)</b> You are requested to submit the required proofs up to last date of submission,failing which will be assumed that the employee does not have any Tax Saving and income other than salary,and the Income Tax will be recomputed and tax will be deducted accordingly.<br>
	 </td>
</tr> 		
			 </table></td>
			</tr>
			<tr>

			 <td>
			<table border="1">		
<tr>
		  <td style="font-family:Times New Roman;color:#000000;width:685px;font-size:18px;text-align:justify;" align="center" bgcolor="#7a6189">
<table border="1" width="850" id="TEmp" cellpadding="1" cellspacing="2" bgcolor="#FFFFFF">
<tr>
  <td align="center" style="width:850px;font-size:15px; height:18px;" colspan="5"><b>(To be used to declare investment for income Tax that will be made during the period <?php echo $PrdCurr; ?>)</b></td>
</tr>
<form name="InvstDecForm" method="post" enctype="multipart/form-data" onSubmit="return validate(this)">
<?php if($res['LTA']=='N'){ ?><input type="hidden" name="LTA" id="LTA" value="0" /><?php } ?>
<?php if($res['CEA']=='N'){ ?><input type="hidden" name="CEA" id="CEA" value="0" /><?php } ?>
<?php if($res['Medical']=='N'){ ?><input type="hidden" name="Medical" id="Medical" value="0" /><?php } ?>
<tr>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;Company</td>
<?php $SqlCom=mysql_query("select CompanyName from hrm_company_basic where CompanyId=".$CompanyId."", $con); $resCom=mysql_fetch_assoc($SqlCom); ?> 
<td align="left" valign="top" style="width:550px;font-size:15px; color:#003700;">&nbsp;<b><?php echo strtoupper($resCom['CompanyName']); ?></b></td>
<td align="center" valign="top" style="width:90px;font-size:15px;">&nbsp;EmployeeID</td>
<td align="center" valign="top" colspan="2" style="width:100px;font-size:15px;">&nbsp;<?php echo $EC; ?></td>
</tr>
<input type="hidden" id="Period" name="Period" value="<?php echo $Prd; ?>"  readonly/>
<input type="hidden" id="YMonth" name="YMonth" value="<?php echo $resIvst['Month']; ?>" readonly/>
<tr>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;Employee</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;<?php echo strtoupper($Ename); ?></td>
<td align="left" valign="top" style="width:200px;font-size:15px;" colspan="3">&nbsp;</td>
</tr>
<tr>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;PAN Number </td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;<?php echo strtoupper($resE['PanNo']); ?></td>
<td align="center" valign="top" style="width:200px;font-size:15px;" colspan="3">&nbsp;</td>
</tr>
<tr style="background-color:#0080FF;">
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Item</b></td>
<td align="center" valign="top" style="width:550px;font-size:15px;color:#FFFFFF;"><b>Particulars</b></td>
<td align="center" valign="top" style="width:90px;font-size:15px;color:#FFFFFF;"><b>Max. Limit</b></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Declared_Amt</b></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Submiss<sup>n</sup>_Amt</b></td>
</tr>
<tr bgcolor="#CEFFCE">
<td align="left" colspan="5" valign="top" style="width:850px;font-size:15px;">&nbsp;<b>Deduction Under Section 10</b></td>
</tr>
<?php $SqlHRA=mysql_query("select HRA_Value,BAS_Value from hrm_employee_ctc where EmployeeID=".$EmployeeId." AND Status='A'", $con); $resHRA=mysql_fetch_assoc($SqlHRA);
$LTA=$resHRA['BAS_Value']*2; $HRA=$resHRA['HRA_Value']*12;?> 
<input type="hidden" id="MaxHRA" name="MaxHRA" value="<?php echo $HRA;  ?>" readonly/>
<tr>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;House Rent Sec 10(13A)</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;I am staying in a house and I egree to submit rent receipts when required. The Rent paid is (Rs._______ Per Month) & the house is located in Non-Metro</td>
<td align="center" valign="top" style="width:90px;font-size:15px;">&nbsp;</td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['HRA']==''){echo 0;}else { echo $resIvst['HRA']; }?>
<input type="hidden" id="HRA" name="HRA" value="<?php if($resIvst['HRA']==''){echo 0;}else { echo $resIvst['HRA']; }?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="HRA2" name="HRA2" class="textBox" value="<?php if($resIvst2['HRA']==''){echo 0;}else { echo $resIvst2['HRA']; }?>" readonly maxlength="8"/></td>
</tr>
<script language="javascript" type="text/javascript">
function FunLtaCheck() 
{ 
  var Lta=document.getElementById("MaxLTA").value; 
  if(document.getElementById("LtaCheck").checked==true){document.getElementById("LTA").value=Lta;}
  else if(document.getElementById("LtaCheck").checked==false){document.getElementById("LTA").value=0;}
}
function FunCeaCheck() //getElementById("CeaCheck1").disabled=false
{

  var Cea=parseFloat(document.getElementById("MaxCEA").value); CeaHalf=Math.round((Cea/2)*100)/100;
  if(document.getElementById("CeaCheck1").checked==true){document.getElementById("CeaCheck2").disabled=false}
  if(document.getElementById("CeaCheck1").checked==false){document.getElementById("CeaCheck2").checked=false; document.getElementById("CeaCheck2").disabled=true;}
  if(document.getElementById("CeaCheck1").checked==true && document.getElementById("CeaCheck2").checked==false){document.getElementById("CEA").value=CeaHalf;}
  else if(document.getElementById("CeaCheck1").checked==false && document.getElementById("CeaCheck2").checked==true){document.getElementById("CEA").value=CeaHalf;}
  else if(document.getElementById("CeaCheck1").checked==true && document.getElementById("CeaCheck2").checked==true){document.getElementById("CEA").value=Cea;}
  else if(document.getElementById("CeaCheck1").checked==false && document.getElementById("CeaCheck2").checked==false){document.getElementById("CEA").value=0;}
}
function FunMedicalCheck()
{
  var Medical=document.getElementById("MaxMedical").value; 
  if(document.getElementById("MedicalCheck").checked==true){document.getElementById("Medical").value=Medical;}
  else if(document.getElementById("MedicalCheck").checked==false){document.getElementById("Medical").value=0;}
}
</script>
<input type="hidden" id="MaxLTA" name="MaxLTA" value="<?php echo $LTA; ?>" readonly=""/> 
<?php if($resIvst['LTA']>0){ ?>
<tr>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;LTA Sec 10(5)</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;I will provide the tickets/ Travels bills in original as per(twice basic monthly) the LTA policy or else the company can consider amount as taxable.</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php echo $LTA; ?><br>
<input type="checkbox" id="LtaCheck" onClick="FunLtaCheck()" <?php if($resIvst['LTA']>0){echo 'checked';} ?> disabled/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['LTA']==''){echo 0;}else {echo $resIvst['LTA']; } ?>
<input type="hidden" id="LTA" name="LTA" class="textBox" value="<?php if($resIvst['LTA']==''){echo 0;}else {echo $resIvst['LTA']; } ?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="LTA2" name="LTA2" class="textBox" value="<?php if($resIvst2['LTA']==''){echo 0;}else {echo $resIvst2['LTA']; } ?>" readonly maxlength="8"/></td>
</tr>
<?php } else { echo '<input type="hidden" id="LTA" name="LTA" value="0"/><input type="hidden" id="LTA2" name="LTA2" value="0"/>'; } ?>
<input type="hidden" id="MaxCEA" name="MaxCEA" value="2400" readonly=""/>
<?php if($resIvst['CEA']>0){ ?>
<tr>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;CEA Sec 10(14)</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;I will provide the copy of tution fees reciept as per CEA policy or else the company can consider amount as taxable.(Rs100/- per month per child upto max of two children)</td>
<td align="center" valign="top" style="width:90px;font-size:15px;">2400<br>Child 1<input type="checkbox" id="CeaCheck1" onClick="FunCeaCheck()" <?php if($resIvst['CEA']>0 AND ($resIvst['CEA']==1200 OR $resIvst['CEA']==2400)){echo 'checked';} ?> disabled/><br>Child 2<input type="checkbox" id="CeaCheck2" onClick="FunCeaCheck()" <?php if($resIvst['CEA']>0 AND $resIvst['CEA']==2400){echo 'checked';} ?> disabled/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['CEA']==''){echo 0;}else {echo $resIvst['CEA']; } ?>
<input type="hidden" id="MaxCEA" name="MaxCEA" value="2400" readonly=""/>
<input type="hidden" id="CEA" name="CEA" class="textBox" value="<?php if($resIvst['CEA']==''){echo 0;}else {echo $resIvst['CEA']; } ?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="CEA2" name="CEA2" class="textBox" value="<?php if($resIvst2['CEA']==''){echo 0;}else {echo $resIvst2['CEA']; } ?>" readonly maxlength="8"/></td>
</tr>
<?php } else { echo '<input type="hidden" id="CEA" name="CEA" value="0"/><input type="hidden" id="CEA2" name="CEA2" value="0"/>'; } ?>
<input type="hidden" id="MaxMedical" name="MaxMedical" value="15000" readonly=""/>
<?php if($resIvst['Medical']>0){  ?>
<tr>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;Medical Sec 17(2)</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;I will produce the Medical Bills to the Satisfacton of the company for my eligibility of Rs. 15000/- as per Income Tax Act of else the company can consider the amount paid as taxable</td>
<td align="center" valign="top" style="width:90px;font-size:15px;">15000<br>
<input type="checkbox" id="MedicalCheck" onClick="FunMedicalCheck()" <?php if($resIvst['Medical']>0){echo 'checked';} ?> disabled/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['Medical']==''){echo 0;}else { echo $resIvst['Medical']; }?>
<input type="hidden" id="Medical" name="Medical" class="textBox" value="<?php if($resIvst['Medical']==''){echo 0;}else { echo $resIvst['Medical']; }?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="Medical2" name="Medical2" class="textBox" value="<?php if($resIvst2['Medical']==''){echo 0;}else { echo $resIvst2['Medical']; }?>" readonly maxlength="8"/></td>
</tr>
<?php } else { echo '<input type="hidden" id="Medical" name="Medical" value="0"/><input type="hidden" id="Medical2" name="Medical2" value="0"/>'; } ?>
<tr bgcolor="#CEFFCE">
<td align="left" colspan="5" valign="top" style="width:850px;font-size:15px;">&nbsp;<b>** If you have opted for the medical reimbursements ( being Medical expenses part of your CTC)</b></td>
</tr>
<tr style="background-color:#0080FF;">
<td align="center" valign="top" colspan="2" style="width:20px;font-size:15px; background-color:#0080FF; color:#FFFFFF;"></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Max. Limit</b></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Declared_Amt</b></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Submiss<sup>n</sup>_Amt</b></td>
</tr>
<input type="hidden" id="MaxMIP" name="MaxMIP" value="<?php echo $res['MIP_Limit']; ?>" readonly=""/>
<tr>
<td align="Center" valign="middle" rowspan="5" style="width:100px;font-size:15px;">&nbsp;Deductions Under Chapeter VI A </td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sec.80D - Medical Insurance Premium (If the policy covers a senior Citizen then additional deduction of Rs.5000/- is available & deduction on account of expenditure on preventive Health Check-Up (for Self, Spouse, Dependant Children & Parents )Shall not exceed in the aggregate Rs 5000/-.) </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['MIP_Limit']>0){echo intval($res['MIP_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['MIP']==''){echo 0;}else { echo $resIvst['MIP']; } ?>
<input type="hidden" id="MIP" name="MIP" class="textBox" value="<?php if($resIvst['MIP']==''){echo 0;}else { echo $resIvst['MIP']; } ?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="MIP2" name="MIP2" class="textBox" value="<?php if($resIvst2['MIP']==''){echo 0;}else { echo $resIvst2['MIP']; } ?>" readonly maxlength="8"/></td>


</tr>
<input type="hidden" id="MaxMTI" name="MaxMTI" value="<?php echo $res['MIT_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;"Sec. 80DD - Medical treatment/insurance of Handicapped Dependant
A higher deduction of Rs. 100,000 is available, where such dependent is with severe disability of > 80%" </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['MTI_Limit']>0){echo intval($res['MTI_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['MTI']==''){echo 0;}else { echo $resIvst['MTI']; } ?>
<input type="hidden" id="MTI" name="MTI" class="textBox" value="<?php if($resIvst['MTI']==''){echo 0;}else { echo $resIvst['MTI']; } ?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="MTI2" name="MTI2" class="textBox" value="<?php if($resIvst2['MTI']==''){echo 0;}else { echo $resIvst2['MTI']; } ?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxMTS" name="MaxMTS" value="<?php echo $res['MTS_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;"Sec 80DDB - Medical treatment (specified diseases only)
(medical treatment in respect of a senior Citizen then additional deduction of Rs.20,000/- is available)" </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['MTS_Limit']>0){echo intval($res['MTS_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['MTS']==''){echo 0;}else { echo $resIvst['MTS']; } ?>
<input type="hidden" id="MTS" name="MTS" class="textBox" value="<?php if($resIvst['MTS']==''){echo 0;}else { echo $resIvst['MTS']; } ?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="MTS2" name="MTS2" class="textBox" value="<?php if($resIvst2['MTS']==''){echo 0;}else { echo $resIvst2['MTS']; } ?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxROL" name="MaxROL" value="<?php echo $res['ROL_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sec 80E - Repayment of Loan for higher education (only interest) </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['ROL_Limit']>0){echo intval($res['ROL_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['ROL']==''){echo 0;}else { echo $resIvst['ROL']; } ?>
<input type="hidden" id="ROL" name="ROL" class="textBox" value="<?php if($resIvst['ROL']==''){echo 0;}else { echo $resIvst['ROL']; } ?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="ROL2" name="ROL2" class="textBox" value="<?php if($resIvst2['ROL']==''){echo 0;}else { echo $resIvst2['ROL']; } ?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxHandi" name="MaxHandi" value="<?php echo $res['Handi_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sec 80U - Handicapped </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['Handi_Limit']>0){echo intval($res['Handi_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['Handi']==''){echo 0;}else { echo $resIvst['Handi']; }?>
<input type="hidden" id="Handi" name="Handi" class="textBox" value="<?php if($resIvst['Handi']==''){echo 0;}else { echo $resIvst['Handi']; }?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="Handi2" name="Handi2" class="textBox" value="<?php if($resIvst2['Handi']==''){echo 0;}else { echo $resIvst2['Handi']; }?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxDTC" name="MaxDTC" value="" readonly=""/>
<tr style="display:none;">
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sec 80G - Donation to certain funds </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><select id="80GPer" name="80GPer" style="height:20px; width:85px; background-color:#AAD5FF;" disabled><option value="<?php if($resIvst['80G_Per']==0){echo 0;}else {echo $resIvst['80G_Per']; } ?>"><?php if($resIvst['80G_Per']==0){echo 'Select';} else{echo $resIvst['80G_Per'].'%'; } ?></option><option value="50">50%</option><option value="100">100%</option>
</select></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['DTC']==''){echo 0;}else { echo $resIvst['DTC']; }?>
<input type="hidden" id="DTC" name="DTC" class="textBox" value="<?php if($resIvst['DTC']==''){echo 0;}else { echo $resIvst['DTC']; }?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="DTC2" name="DTC2" class="textBox" value="<?php if($resIvst2['DTC']==''){echo 0;}else { echo $resIvst2['DTC']; }?>" readonly maxlength="8"/></td>
</tr>

<input type="hidden" id="MaxRP" name="MaxRP" value="24000" readonly=""/>
<input type="hidden" id="RP" name="RP" class="textBox" value="<?php if($resIvst['RP']==''){echo 0;}else { echo $resIvst['RP']; }?>" readonly maxlength="8"/>
<input type="hidden" id="RP2" name="RP2" class="textBox" value="0" readonly maxlength="8"/>
<input type="hidden" id="MaxDFS" name="MaxDFS" value="" readonly=""/>
<tr style="display:none;">
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sec 80GGA - Donation for scientific research</td>
<td align="center" valign="top" style="width:90px;font-size:15px;">&nbsp;</td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['DFS']==''){echo 0;}else { echo $resIvst['DFS']; }?>
<input type="hidden" id="DFS" name="DFS" class="textBox" value="<?php if($resIvst['DFS']==''){echo 0;}else { echo $resIvst['DFS']; }?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="DFS2" name="DFS2" class="textBox" value="<?php if($resIvst2['DFS']==''){echo 0;}else { echo $resIvst2['DFS']; }?>" readonly maxlength="8"/></td>

</tr>

<tr style="background-color:#0080FF;">
<td align="center" valign="top" colspan="2" style="width:20px;font-size:15px; background-color:#0080FF; color:#FFFFFF;"></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Max. Limit</b></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Declared_Amt</b></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Submiss<sup>n</sup>_Amt</b></td>
</tr>
<input type="hidden" id="MaxPenFun" name="MaxPenFun" value="<?php echo $res['PenFun_Limit']; ?>" readonly=""/>
<tr>
<td align="Center" valign="middle" rowspan="14" style="width:100px;font-size:15px;">&nbsp;Deduction Under Section 80C</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sec 80CCC - Contribution to Pension Fund (Jeevan Suraksha)</td>
<td rowspan="14" align="center" valign="middle" style="width:90px;font-size:15px;"><?php if($res['PenFun_Limit']>0){echo intval($res['PenFun_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['PenFun']==''){echo 0;}else { echo $resIvst['PenFun']; } ?>
<input type="hidden" id="PenFun" name="PenFun" class="textBox" value="<?php if($resIvst['PenFun']==''){echo 0;}else { echo $resIvst['PenFun']; } ?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="PenFun2" name="PenFun2" class="textBox" value="<?php if($resIvst2['PenFun']==''){echo 0;}else { echo $resIvst2['PenFun']; } ?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxLIP" name="MaxLIP" value="<?php echo $res['LIP_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Life Insurance Premium </td>
<?php /* <td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['LIP_Limit']>0){echo intval($res['LIP_Limit']);}else{ echo '&nbsp;'; } ?></td> */?>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['LIP']==''){echo 0;}else {echo $resIvst['LIP']; } ?>
<input type="hidden" id="LIP" name="LIP" class="textBox" value="<?php if($resIvst['LIP']==''){echo 0;}else {echo $resIvst['LIP']; } ?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="LIP2" name="LIP2" class="textBox" value="<?php if($resIvst2['LIP']==''){echo 0;}else {echo $resIvst2['LIP']; } ?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxDA" name="MaxDA" value="<?php echo $res['DA_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Defferred Annuity</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['DA_Limit']>0){echo intval($res['DA_Limit']);}else{ echo '&nbsp;'; } ?></td> */?>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['DA']==''){echo 0;}else {echo $resIvst['DA'];} ?>
<input type="hidden" id="DA" name="DA" class="textBox" value="<?php if($resIvst['DA']==''){echo 0;}else {echo $resIvst['DA'];} ?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="DA2" name="DA2" class="textBox" value="<?php if($resIvst2['DA']==''){echo 0;}else {echo $resIvst2['DA'];} ?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxPPF" name="MaxPPF" value="<?php echo $res['PPF_Limit']; ?>" readonly=""/> 
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Public Provident Fund</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['PPF_Limit']>0){echo intval($res['PPF_Limit']);}else{ echo '&nbsp;'; } ?></td> */?>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['PPF']==''){echo 0;}else { echo $resIvst['PPF']; } ?>
<input type="hidden" id="PPF" name="PPF" class="textBox" value="<?php if($resIvst['PPF']==''){echo 0;}else { echo $resIvst['PPF']; } ?>"  readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="PPF2" name="PPF2" class="textBox" value="<?php if($resIvst2['PPF']==''){echo 0;}else { echo $resIvst2['PPF']; } ?>"  readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxPostOff" name="MaxPostOff" value="<?php echo $res['PostOff_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Time Deposit in Post Office / Bank for 5 year & above</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['PostOff_Limit']>0){echo intval($res['PostOff_Limit']);}else{ echo '&nbsp;'; } ?></td> */?>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['PostOff']==''){echo 0;}else { echo $resIvst['PostOff']; } ?>
<input type="hidden" id="PostOff" name="PostOff" class="textBox" value="<?php if($resIvst['PostOff']==''){echo 0;}else { echo $resIvst['PostOff']; } ?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="PostOff2" name="PostOff2" class="textBox" value="<?php if($resIvst2['PostOff']==''){echo 0;}else { echo $resIvst2['PostOff']; } ?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxULIP" name="MaxULIP" value="<?php echo $res['ULIP_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;ULIP of UTI/LIC	</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['ULIP_Limit']>0){echo intval($res['ULIP_Limit']);}else{ echo '&nbsp;'; } ?></td> */?>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['ULIP']==''){echo 0;}else {echo $resIvst['ULIP']; }?>
<input type="hidden" id="ULIP" name="ULIP" class="textBox" value="<?php if($resIvst['ULIP']==''){echo 0;}else {echo $resIvst['ULIP']; }?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="ULIP2" name="ULIP2" class="textBox" value="<?php if($resIvst2['ULIP']==''){echo 0;}else {echo $resIvst2['ULIP']; }?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxHL" name="MaxHL" value="<?php echo $res['HL_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Principal Loan (Housing Loan) Repayment </td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['HL_Limit']>0){echo intval($res['HL_Limit']);}else{ echo '&nbsp;'; } ?></td> */?>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['HL']==''){echo 0;}else { echo $resIvst['HL']; }?>
<input type="hidden" id="HL" name="HL" class="textBox" value="<?php if($resIvst['HL']==''){echo 0;}else { echo $resIvst['HL']; }?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="HL2" name="HL2" class="textBox" value="<?php if($resIvst2['HL']==''){echo 0;}else { echo $resIvst2['HL']; }?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxMF" name="MaxMF" value="<?php echo $res['MF_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Mutual Funds</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['MF_Limit']>0){echo intval($res['MF_Limit']);}else{ echo '&nbsp;'; } ?></td> */?>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['MF']==''){echo 0;}else {echo $resIvst['MF']; } ?>
<input type="hidden" id="MF" name="MF" class="textBox" value="<?php if($resIvst['MF']==''){echo 0;}else {echo $resIvst['MF']; } ?>"  readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="MF2" name="MF2" class="textBox" value="<?php if($resIvst2['MF']==''){echo 0;}else {echo $resIvst2['MF']; } ?>"  readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxIB" name="MaxIB" value="<?php echo $res['IB_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Investment in infrastructure Bonds</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['IB_Limit']>0){echo intval($res['IB_Limit']);}else{ echo '&nbsp;'; } ?></td> */?>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['IB']==''){echo 0;}else { echo $resIvst['IB']; } ?>
<input type="hidden" id="IB" name="IB" class="textBox" value="<?php if($resIvst['IB']==''){echo 0;}else { echo $resIvst['IB']; } ?>"  readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="IB2" name="IB2" class="textBox" value="<?php if($resIvst2['IB']==''){echo 0;}else { echo $resIvst2['IB']; } ?>"  readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxCTF" name="MaxCTF" value="<?php echo $res['CTF_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Children- Tution Fee restricted to max.of 2 children</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['CTF_Limit']>0){echo intval($res['CTF_Limit']);}else{ echo '&nbsp;'; } ?></td> */?>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['CTF']==''){echo 0;}else { echo $resIvst['CTF']; } ?>
<input type="hidden" id="CTF" name="CTF" class="textBox" value="<?php if($resIvst['CTF']==''){echo 0;}else { echo $resIvst['CTF']; } ?>"  readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="CTF2" name="CTF2" class="textBox" value="<?php if($resIvst2['CTF']==''){echo 0;}else { echo $resIvst2['CTF']; } ?>"  readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxNHB" name="MaxNHB" value="<?php echo $res['NHB_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Deposit in NHB</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['NHB_Limit']>0){echo intval($res['NHB_Limit']);}else{ echo '&nbsp;'; } ?></td> */?>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['NHB']==''){echo 0;}else { echo $resIvst['NHB']; }?>
<input type="hidden" id="NHB" name="NHB" class="textBox" value="<?php if($resIvst['NHB']==''){echo 0;}else { echo $resIvst['NHB']; }?>"  readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="NHB2" name="NHB2" class="textBox" value="<?php if($resIvst2['NHB']==''){echo 0;}else { echo $resIvst2['NHB']; }?>"  readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxNSC" name="MaxNSC" value="<?php echo $res['NSC_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Deposit In NSC</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['NSC_Limit']>0){echo intval($res['NSC_Limit']);}else{ echo '&nbsp;'; } ?></td> */?>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['NSC']==''){echo 0;}else { echo $resIvst['NSC']; }?>
<input type="hidden" id="NSC" name="NSC" class="textBox"  value="<?php if($resIvst['NSC']==''){echo 0;}else { echo $resIvst['NSC']; }?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="NSC2" name="NSC2" class="textBox"  value="<?php if($resIvst2['NSC']==''){echo 0;}else { echo $resIvst2['NSC']; }?>" readonly maxlength="8"/></td>
</tr>

<input type="hidden" id="MaxSukS" name="MaxSukS" value="<?php echo $res['NSC_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sukanya Samriddhi</td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['SukS']==''){echo 0;}else { echo $resIvst['SukS']; }?>
<input type="hidden" id="SukS" name="SukS" class="textBox"  value="<?php if($resIvst['SukS']==''){echo 0;}else { echo $resIvst['SukS']; }?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="SukS2" name="SukS2" class="textBox"  value="<?php if($resIvst2['SukS']==''){echo 0;}else { echo $resIvst2['SukS']; }?>" readonly maxlength="8"/></td>
</tr>

<input type="hidden" id="MaxEPF" name="MaxEPF" value="<?php echo $res['EPF_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Others (please specify) Employee Provident Fund	</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['EPF_Limit']>0){echo intval($res['EPF_Limit']);}else{ echo '&nbsp;'; } ?></td> */?>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['EPF']==''){echo 0;}else {echo $resIvst['EPF']; }?>
<input type="hidden" id="EPF" name="EPF" class="textBox" value="<?php if($resIvst['EPF']==''){echo 0;}else {echo $resIvst['EPF']; }?>"  readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="EPF2" name="EPF2" class="textBox" value="<?php if($resIvst2['EPF']==''){echo 0;}else {echo $resIvst2['EPF']; }?>"  readonly maxlength="8"/></td>
</tr>

<tr style="background-color:#0080FF;">
<td align="center" valign="top" colspan="2" style="width:20px;font-size:15px; background-color:#0080FF; color:#FFFFFF;"></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Max. Limit</b></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Declared_Amt</b></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Submiss<sup>n</sup>_Amt</b></td>
</tr>
<input type="hidden" id="MaxNPS" name="MaxNPS" value="<?php echo $res['NPS_Limit']; ?>" readonly=""/>
<tr>
<td align="Center" valign="middle" style="width:100px;font-size:15px;">&nbsp;Sec. 80CCD(1B)</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;NPS (National Pension Scheme)/ Atal Pension Yojna(APY)</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['NPS_Limit']>0){echo intval($res['NPS_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['NPS']==''){echo 0;}else { echo $resIvst['NPS']; }?></td>
<input type="hidden" id="NPS" name="NPS" class="textBox" value="<?php if($resIvst['NPS']==''){echo 0;}else { echo $resIvst['NPS']; }?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="NPS2" name="NPS2" class="textBox" value="<?php if($resIvst2['NPS']==''){echo 0;}else { echo $resIvst2['NPS']; }?>" readonly maxlength="8"/></td>
</tr>

<tr>
<td align="Center" valign="middle" style="width:100px;font-size:15px;">&nbsp;Sec. 80CCD(2)</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Corporate NPS Scheme</td>
<td align="center" valign="top" style="width:90px;font-size:15px;">10% Of Basic Salary</td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['CorNPS']==''){echo 0;}else { echo $resIvst['CorNPS']; }?></td>
<input type="hidden" id="CorNPS" name="CorNPS" class="textBox" value="<?php if($resIvst['CorNPS']==''){echo 0;}else { echo $resIvst['CorNPS']; }?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="CorNPS2" name="CorNPS2" class="textBox" value="<?php if($resIvst2['CorNPS']==''){echo 0;}else { echo $resIvst2['CorNPS']; }?>" readonly maxlength="8"/></td>
</tr>

<input type="hidden" id="MaxForm16" name="MaxForm16" value="<?php echo $res['Form16_Limit']; ?>" readonly=""/>
<tr>
<td align="Center" valign="middle" rowspan="5" style="width:100px;font-size:15px;">&nbsp;Previous Employment Salary (Salary earened from 01/04/12 till date of joining) </td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;If yes, Form 16 from previous employer or Form 12 B with tax computation statement</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['Form16_Limit']>0){echo intval($res['Form16_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['Form16']==''){echo 0;}else { echo $resIvst['Form16']; }?>
<input type="hidden" id="Form16" name="Form16" class="textBox" value="<?php if($resIvst['Form16']==''){echo 0;}else { echo $resIvst['Form16']; }?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="Form162" name="Form162" class="textBox" value="<?php if($resIvst2['Form16']==''){echo 0;}else { echo $resIvst2['Form16']; }?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxSPE" name="MaxSPE" value="<?php echo $res['SPE_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Salary paid by the Previous Employer after Sec.10 Exemption	</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['SPE_Limit']>0){echo intval($res['SPE_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['SPE']==''){echo 0;}else { echo $resIvst['SPE']; } ?>
<input type="hidden" id="SPE" name="SPE" class="textBox" value="<?php if($resIvst['SPE']==''){echo 0;}else { echo $resIvst['SPE']; } ?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="SPE2" name="SPE2" class="textBox" value="<?php if($resIvst2['SPE']==''){echo 0;}else { echo $resIvst2['SPE']; } ?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxPT" name="MaxPT" value="<?php echo $res['PT_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;PROFESSIOAL TAX deducted by the Previous Employer </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['PT_Limit']>0){echo intval($res['PT_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['PT']==''){echo 0;}else {echo $resIvst['PT']; }?>
<input type="hidden" id="PT" name="PT" class="textBox" value="<?php if($resIvst['PT']==''){echo 0;}else {echo $resIvst['PT']; }?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="PT2" name="PT2" class="textBox" value="<?php if($resIvst2['PT']==''){echo 0;}else {echo $resIvst2['PT']; }?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxPFD" name="MaxPFD" value="<?php echo $res['PFD_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;PROVIDENT FUND deducted by the Previous Employer </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['PFD_Limit']>0){echo intval($res['PFD_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['PFD']==''){echo 0;}else { echo $resIvst['PFD']; } ?>
<input type="hidden" id="PFD" name="PFD" class="textBox" value="<?php if($resIvst['PFD']==''){echo 0;}else { echo $resIvst['PFD']; } ?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="PFD2" name="PFD2" class="textBox" value="<?php if($resIvst2['PFD']==''){echo 0;}else { echo $resIvst2['PFD']; } ?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxIT" name="MaxIT" value="<?php echo $res['IT_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;INCOME TAX deducted by the Previous Employer</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['IT_Limit']>0){echo intval($res['IT_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['IT']==''){echo 0;}else { echo $resIvst['IT']; }?>
<input type="hidden" id="IT" name="IT" class="textBox" value="<?php if($resIvst['IT']==''){echo 0;}else { echo $resIvst['IT']; }?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="IT2" name="IT2" class="textBox" value="<?php if($resIvst2['IT']==''){echo 0;}else { echo $resIvst2['IT']; }?>" readonly maxlength="8"/></td>
</tr>
<tr>
<td align="left" valign="top" colspan="5" style="width:550px;font-size:15px;">&nbsp;</td>
</tr>
<tr>
<td align="Center" valign="top" style="width:100px;font-size:15px;">&nbsp;Income other then Salary Income</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;If yes, then Form 12C detailing other income is attached(only interest)</td>
<td align="center" valign="top" style="width:90px;font-size:15px;">&nbsp;</td>
<td align="center" valign="top" style="width:100px;font-size:15px;">&nbsp;</td>
<td align="center" valign="top" style="width:100px;font-size:15px;">&nbsp;</td>
</tr>
<tr style="background-color:#0080FF;">
<td align="center" valign="top" colspan="2" style="width:20px;font-size:15px; background-color:#0080FF; color:#FFFFFF;"></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Max. Limit</b></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Declared_Amt</b></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Submiss<sup>n</sup>_Amt</b></td>
</tr>
<input type="hidden" id="MaxIHL" name="MaxIHL" value="<?php echo $res['IHL_Limit']; ?>" readonly=""/>
<tr>
<td align="Center" valign="middle" rowspan="2" style="width:100px;font-size:15px;">&nbsp;Deduction under Section 24 </td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Interest on Housing Loan</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['IHL_Limit']>0){echo intval($res['IHL_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['IHL']==''){echo 0;}else { echo $resIvst['IHL']; }?>
<input type="hidden" id="IHL" name="IHL" class="textBox" value="<?php if($resIvst['IHL']==''){echo 0;}else { echo $resIvst['IHL']; }?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="IHL2" name="IHL2" class="textBox" value="<?php if($resIvst2['IHL']==''){echo 0;}else { echo $resIvst2['IHL']; }?>" readonly maxlength="10"/></td>
</tr>
<input type="hidden" id="MaxIL" name="MaxIL" value="<?php echo $res['IL_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Interest if the loan is taken before 01/04/99</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['IL_Limit']>0){echo intval($res['IL_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['IL']==''){echo 0;}else { echo $resIvst['IL']; } ?>
<input type="hidden" id="IL" name="IL" class="textBox" value="<?php if($resIvst['IL']==''){echo 0;}else { echo $resIvst['IL']; } ?>" readonly/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;">
<input id="IL2" name="IL2" class="textBox" value="<?php if($resIvst2['IL']==''){echo 0;}else { echo $resIvst2['IL']; } ?>" readonly maxlength="10"/></td>
</tr>
<tr bgcolor="#CEFFCE">
<td align="left" colspan="5" valign="top" style="width:850px;font-size:15px;">&nbsp;<b>Note: Form 12C along with the calculation of loss on house property heeds to be attached for considering the above</b></td>
</tr>
<tr><td align="left" colspan="5" valign="top" style="width:850px;font-size:15px;">&nbsp;<b><u>Declaration:</u></b></td></tr>
<tr><td align="left" colspan="5" valign="top" style="width:850px;font-size:15px;">&nbsp;1) I hereby declare that the information given above is correct and true in all respects.</td></tr>
<tr><td align="left" colspan="5" valign="top" style="width:850px;font-size:15px;">&nbsp;2) I also undertake to indemnify the company for any loss/liability that may arise in the event of the above information being incorrect.</td></tr>
<tr>
<td align="left" valign="top" colspan="2" style="width:550px;font-size:15px;">&nbsp;</td>

<?php /*
<td align="center" valign="bottom" rowspan="2" colspan="2" style="width:200px;font-size:15px;">
<?php echo "<img width=195px height=45px src=\"show_SignImg.php?YId=".$YearId."&id=".$EmployeeId."\" border=0>\n";?>
</td>
</tr>
<tr>
<td align="" colspan="2" valign="top" style="width:100px;font-size:15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Date :</b> </td>
<td align="left" valign="top" style="width:550px;font-size:15px;">
<input id="Inv_Date" name="Inv_Date" class="textBox"  value="<?php echo $resIvst['Inv_Date']; ?>" readonly/><button id="f_btn1" class="CalenderButton"></button>
		                       <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
                               cal.manageFields("f_btn1", "Inv_Date", "%d-%m-%Y");</script></td>
</tr>
<tr>
<td align="" colspan="2" valign="top" style="width:100px;font-size:15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Place : </b></td>
<td align="left" valign="top" style="width:550px;font-size:15px;">
<input id="Place" name="Place" style="width:200px;height:21px;background-color:#D6D6D6;" value="<?php echo $resIvst['Place']; ?>" readonly maxlength="50" /></td>
<td align="center" valign="middle" colspan="2" valign="top" style="width:200px;font-size:15px;"><b>Signature</b>&nbsp;
<?php if($resIvst['FormSubmit']=='Y') { ?>
<a href="#" style="text-decoration:none;"><input type="button" id="Attach" value="Attach" onClick="AttachSign(<?php echo $EmployeeId.', '.$YearId; ?>)" alt="Attach signature" style="background-color:#B9DCFF;" disabled/></a><?php } ?></td>
</tr>
<tr>
*/ ?>
<td align="center" valign="bottom" rowspan="2" colspan="3" style="width:200px;font-size:15px;">&nbsp;

</td>
</tr>

<tr>
<td align="" colspan="1" valign="top" style="width:100px;font-size:15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Date :</b> </td>
<td align="left" valign="top" style="width:550px;font-size:15px;">
<input id="Inv_Date" name="Inv_Date" class="textBox"  value="<?php if($rowEdit==0){echo '';}elseif($rowEdit>0){if($resIvst2['Inv_Date']!='' AND $resIvst2['Inv_Date']!='0000-00-00' AND $resIvst2['Inv_Date']!='1970-01-01'){echo date("d-M-Y", strtotime($resIvst2['Inv_Date'])); } }?>" readonly/>
<?php //if($resIvst['FormSubmit']!='YY'){ ?><button id="f_btn1" class="CalenderButton"></button> <?php //} ?>
		                       <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
                               cal.manageFields("f_btn1", "Inv_Date", "%d-%m-%Y");</script></td>

</tr>
<tr>
<td align="" colspan="1" valign="top" style="width:100px;font-size:15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Place : </b></td>
<td align="left" valign="top" style="width:550px;font-size:15px;">
<input id="Place" name="Place" style="width:200px;height:21px;background-color:#D6D6D6;" value="<?php echo $resIvst2['Place']; ?>" readonly maxlength="50" /></td>
<td align="center" valign="middle" colspan="3" valign="top" style="width:200px;font-size:15px;"><b>Signature</b></td>
</tr>
<tr>

<td align="left" valign="top" colspan="5" style="width:550px;font-size:15px;">&nbsp;</td>
</tr>
   <td align="" class="fontButton" colspan="5"><table border="0" align="right" class="fontButton">
	<tr>
	  <td style="width:450px;color:#FFFFFF;font-weight:bold;font-family:Times New Roman; font-size:15px;"><span id="msgCTC">&nbsp;</span></td>
	  <td align="right" style="width:90px;"><input type="submit" name="SubmitInvstDec" id="SubmitInvstDec" style="width:90px; display:none;" value="submit" disabled></td>
	  <td align="right" style="width:90px;"><input type="submit" name="SaveInvstDec" id="SaveInvstDec" style="width:90px; display:none;" value="save" disabled>
<?php if($resInvSb['OpenYN']=='Y' OR ($rowEdit>0 AND $resIvst2['FormSubmit']=='Y')){ ?>
<input type="button" name="EditInvstDec" id="EditInvstDec" style="width:90px;" value="edit" onClick="Edit()" <?php if($resInvSb['OpenYN']=='N' OR $resIvst2['FormSubmit']=='YY'){echo 'disabled';}?> disabled>
<?php } ?>
	  </td>
	  <td align="right" style="width:90px;">
	  <input type="button" name="Refresh" id="Refresh" style="width:90px;" value="Refresh" onClick="javascript:window.location='InvestsDecl.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&m=<?php echo $_REQUEST['m']; ?>'" <?php if($resInvSb['OpenYN']=='N'){echo 'disabled';}?> /></td>
	</tr></table>  
	</td>
	</tr>
	</table>
		</tr>
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

