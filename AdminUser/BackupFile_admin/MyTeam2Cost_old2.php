<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}

$sqlSch=mysql_query("select * from hrm_pms_appdate where AssessmentYear=".$_REQUEST['YI']." AND CompanyId=".$CompanyId,$con);$resSch=mysql_fetch_assoc($sqlSch); $CuDate=date("Y-m-d");

if(isset($_POST['SaveValue']))
{
 
 if($_POST['SelType']=='Hod'){ $ExtQuery='HodId='.$_POST['SelValue']; $HodId=$_POST['SelValue']; $DeptId=0; }
 elseif($_POST['SelType']=='Dept'){ $ExtQuery='DeptId='.$_POST['SelValue']; $HodId=0; $DeptId=$_POST['SelValue']; }
 else{ $ExtQuery='1=1'; $HodId=0; $DeptId=0; } 

 for($i=1; $i<=$_POST['RowNo']; $i++)
 { 
  $sql=mysql_query("select * from hrm_pms_dummy_increment where YearId=".$YearId." AND CompanyId=".$CompanyId." AND ".$ExtQuery." AND Rating=".$_POST['Rat_'.$i], $con); $row=mysql_num_rows($sql);
  if($row>0)
  { $sqlU=mysql_query("update hrm_pms_dummy_increment set EmpValue='".$_POST['EmpGross_'.$i]."', AppValue='".$_POST['AppGross_'.$i]."', RevValue='".$_POST['RevGross_'.$i]."', HodValue='".$_POST['HodGross_'.$i]."', IncGross='".$_POST['PIS_'.$i]."', PerInc='".$_POST['PerIS_'.$i]."', Inc='".$_POST['IncS_'.$i]."', CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where YearId=".$YearId." AND CompanyId=".$CompanyId." AND ".$ExtQuery." AND Rating=".$_POST['Rat_'.$i]."", $con); }
  if($row==0)
  { $sqlU=mysql_query("insert into hrm_pms_dummy_increment(YearId, CompanyId, HodId, DeptId, Rating, EmpValue, AppValue, RevValue, HodValue, IncGross, PerInc, Inc, CreatedBy, CreatedDate)values(".$YearId.", ".$CompanyId.", ".$HodId.", ".$DeptId.", '".$_POST['Rat_'.$i]."', '".$_POST['EmpGross_'.$i]."', '".$_POST['AppGross_'.$i]."', '".$_POST['RevGross_'.$i]."', '".$_POST['HodGross_'.$i]."', '".$_POST['PIS_'.$i]."', '".$_POST['PerIS_'.$i]."', '".$_POST['IncS_'.$i]."', ".$UserId.", '".date("Y-m-d")."')", $con); }
 }
 
  $sql2=mysql_query("select * from hrm_pms_dummy_increment_un where YearId=".$YearId." AND ".$ExtQuery." AND CompanyId=".$CompanyId, $con); $row2=mysql_num_rows($sql2);
  if($row2>0)
  { $sqlU2=mysql_query("update hrm_pms_dummy_increment_un set EmpValue='".$_POST['UnEmpGross']."', AppValue='".$_POST['UnAppGross']."', RevValue='".$_POST['UnRevGross']."', HodValue='".$_POST['UnHodGross']."', IncGross='".$_POST['UnPIS']."', PerInc='".$_POST['UnPerIS']."', Inc='".$_POST['UnIncS']."', CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where YearId=".$YearId." AND ".$ExtQuery." AND CompanyId=".$CompanyId, $con); }
  if($row2==0)
  { $sqlU2=mysql_query("insert into hrm_pms_dummy_increment_un(YearId, CompanyId, HodId, DeptId, EmpValue, AppValue, RevValue, HodValue, IncGross, PerInc, Inc, CreatedBy, CreatedDate)values(".$YearId.", ".$CompanyId.", ".$HodId.", ".$DeptId.", '".$_POST['UnEmpGross']."', '".$_POST['UnAppGross']."', '".$_POST['UnRevGross']."', '".$_POST['UnHodGross']."', '".$_POST['UnPIS']."', '".$_POST['UnPerIS']."', '".$_POST['UnIncS']."', ".$UserId.", '".date("Y-m-d")."')", $con); }
  
  $sql3=mysql_query("select * from hrm_pms_dummy_increment_untot where YearId=".$YearId." AND ".$ExtQuery." AND CompanyId=".$CompanyId, $con); $row3=mysql_num_rows($sql3);
  if($row3>0)
  { $sqlU3=mysql_query("update hrm_pms_dummy_increment_untot set TEmpValue='".$_POST['EmpGrossT']."', TAppValue='".$_POST['AppGrossT']."', TRevValue='".$_POST['RevGrossT']."', THodValue='".$_POST['HodGrossT']."', TIncGross='".$_POST['PIST']."', TPerInc='".$_POST['PerIST']."', TInc='".$_POST['IncST']."', CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where YearId=".$YearId." AND ".$ExtQuery." AND CompanyId=".$CompanyId, $con); }
  if($row3==0)
  { $sqlU3=mysql_query("insert into hrm_pms_dummy_increment_untot(YearId, CompanyId, HodId, DeptId, TEmpValue, TAppValue, TRevValue, THodValue, TIncGross, TPerInc, TInc, CreatedBy, CreatedDate)values(".$YearId.", ".$CompanyId.", ".$HodId.", ".$DeptId.", '".$_POST['EmpGrossT']."', '".$_POST['AppGrossT']."', '".$_POST['RevGrossT']."', '".$_POST['HodGrossT']."', '".$_POST['PIST']."', '".$_POST['PerIST']."', '".$_POST['IncST']."', ".$UserId.", '".date("Y-m-d")."')", $con); }

  if($sqlU){echo '<script>alert("Data saved successfully..!");</script>'; }
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style>
.th{color:#FFFFFF;font-family:Times New Roman;font-size:12px;font-weight:bold;text-align:center;}
.th2{color:#FFFFFF;font-family:Times New Roman;font-size:16px;font-weight:bold;text-align:center;}
.tdc{font-family:Times New Roman;font-size:12px;text-align:center;}
.tdl{font-family:Times New Roman;font-size:12px;text-align:left;}
.tdr{font-family:Times New Roman;font-size:12px;text-align:right;}
.selc{font-family:Times New Roman;font-size:12px;text-align:center;width:100%;height:22px;}
.sell{font-family:Times New Roman;font-size:12px;text-align:left;width:100%;height:22px;}
.inpc{font-family:Times New Roman;font-size:12px;text-align:center;width:100%;border:hidden;}
.inpl{font-family:Times New Roman;font-size:12px;text-align:left;width:100%;border:hidden;}
.inpr{font-family:Times New Roman;font-size:12px;text-align:right;width:100%;border:hidden;}
</style>

<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function SelectYear(YId){
var VS=document.getElementById("Value").value; var v=document.getElementById("mainV").value;
window.location='MyTeam2Cost.php?action='+VS+'&value='+v+'&YI='+YId;
}
function SelectDept(v)
{ var YId=document.getElementById("YId").value;
  if(v!='Over'){ window.location='MyTeam2Cost.php?action=Dept&value='+v+'&YI='+YId; }
  else if(v=='Over'){ window.location='MyTeam2Cost.php?action='+v+'&YI='+YId; }
}
function SelectHod(v){ var YId=document.getElementById("YId").value; window.location='MyTeam2Cost.php?action=Hod&value='+v+'&YI='+YId;}

function isNumberKey(evt)
{ var charCode = (evt.which) ? evt.which : evt.keyCode;
  if(charCode!= 46 && charCode>31 && (charCode<48 || charCode>57)){ return false; return true; }
}

//PIS_ PerIS_ IncS_

function Cal_OneProInc(n)
{ 
if(document.getElementById("PIS_"+n).value==''){document.getElementById("PIS_"+n).value=0;}
if(document.getElementById("PerIS_"+n).value==''){document.getElementById("PerIS_"+n).value=0;}
if(document.getElementById("IncS_"+n).value==''){document.getElementById("IncS_"+n).value=0;}
  
var Emp_GS = parseFloat(document.getElementById("EmpGross_"+n).value); 
var App_GS = parseFloat(document.getElementById("AppGross_"+n).value); 
var Rev_GS = parseFloat(document.getElementById("RevGross_"+n).value); 
var Hod_GS = parseFloat(document.getElementById("HodGross_"+n).value); 
var Hod_NetIncGS = parseFloat(document.getElementById("PIS_"+n).value); 
var Hod_PerGS = parseFloat(document.getElementById("PerIS_"+n).value);
var Hod_IncGS = parseFloat(document.getElementById("IncS_"+n).value);
var RowNo = document.getElementById("RowNo").value;
//alert(Hod_GS+"-"+Hod_NetIncGS+"-"+Hod_PerGS+"-"+Hod_IncGS);

if(Hod_GS==0)
{ if(Rev_GS==0)
  { if(App_GS==0)
    { if(Emp_GS==0)
      { var PerValue=0; var GrossValue=0;}
      else{var PerValue=Emp_GS; var GrossValue=Emp_GS;}
    }
    else{var PerValue=App_GS; var GrossValue=App_GS;}
  } 
  else{var PerValue=Rev_GS; var GrossValue=Rev_GS;}
}
else{var PerValue=Hod_GS; var GrossValue=Hod_GS;}

var OnePer = Math.round(((PerValue*1)/100)*100)/100;
if(OnePer>0){var Per_GS = document.getElementById("PerIS_"+n).value=Math.round((Hod_IncGS/OnePer)*100)/100;}
else{var Per_GS = document.getElementById("PerIS_"+n).value=0;}
var Hod_NetIncGS1 = parseFloat(document.getElementById("PIS_"+n).value);
if(Hod_NetIncGS1>GrossValue){var IncGS = document.getElementById("IncS_"+n).value=Math.round((Hod_NetIncGS1-GrossValue)*100)/100;}
else{var IncGS = document.getElementById("IncS_"+n).value=0}

 /*Ctc Ctc Ctc*/
 var Hod_Ctc = parseFloat(document.getElementById("HodCtc_"+n).value);
 var IncDCtc=Math.round(((Hod_Ctc*Per_GS)/100)*100)/100; //alert(Hod_Ctc+"-"+Per_GS);
 document.getElementById("PISCtc_"+n).value=Math.round((Hod_Ctc+IncDCtc)*100)/100;
 /*Ctc Ctc Ctc*/

var TotHod_GS = parseFloat(document.getElementById("HodGrossT").value); 
var TotHod_NetIncGS = parseFloat(document.getElementById("PIST").value); 
var TotHod_PerGS = parseFloat(document.getElementById("PerIST").value);
var TotHod_IncGS = parseFloat(document.getElementById("IncST").value); 
var TotHod_CtcGS = parseFloat(document.getElementById("PISCtcT").value); 

var TOnePer=Math.round(((TotHod_GS*1)/100)*100)/100; 
for(var i=1; i<=RowNo; i++)
{ var a=document.getElementById("PISValue_"+i).value=parseFloat(document.getElementById("PIS_"+i).value);
  var b=document.getElementById("PerISValue_"+i).value=parseFloat(document.getElementById("PerIS_"+i).value);
  var c=document.getElementById("IncSValue_"+i).value=parseFloat(document.getElementById("IncS_"+i).value);
} 

var d=document.getElementById("PISValue_19").value=parseFloat(document.getElementById("UnE_PIS").value);
var e=document.getElementById("PerISValue_19").value=parseFloat(document.getElementById("UnE_PerPIS").value);
var f=document.getElementById("IncSValue_19").value=parseFloat(document.getElementById("UnE_PerIncS").value);


var TotPIS=parseFloat(document.getElementById("PISValue_1").value)+parseFloat(document.getElementById("PISValue_2").value)+parseFloat(document.getElementById("PISValue_3").value)+parseFloat(document.getElementById("PISValue_4").value)+parseFloat(document.getElementById("PISValue_5").value)+parseFloat(document.getElementById("PISValue_6").value)+parseFloat(document.getElementById("PISValue_7").value)+parseFloat(document.getElementById("PISValue_8").value)+parseFloat(document.getElementById("PISValue_9").value)+parseFloat(document.getElementById("PISValue_10").value)+parseFloat(document.getElementById("PISValue_11").value)+parseFloat(document.getElementById("PISValue_12").value)+parseFloat(document.getElementById("PISValue_13").value)+parseFloat(document.getElementById("PISValue_14").value)+parseFloat(document.getElementById("PISValue_15").value)+parseFloat(document.getElementById("PISValue_16").value)+parseFloat(document.getElementById("PISValue_17").value)+parseFloat(document.getElementById("PISValue_18").value)+parseFloat(document.getElementById("PISValue_19").value);
var TotIncS=parseFloat(document.getElementById("IncSValue_1").value)+parseFloat(document.getElementById("IncSValue_2").value)+parseFloat(document.getElementById("IncSValue_3").value)+parseFloat(document.getElementById("IncSValue_4").value)+parseFloat(document.getElementById("IncSValue_5").value)+parseFloat(document.getElementById("IncSValue_6").value)+parseFloat(document.getElementById("IncSValue_7").value)+parseFloat(document.getElementById("IncSValue_8").value)+parseFloat(document.getElementById("IncSValue_9").value)+parseFloat(document.getElementById("IncSValue_10").value)+parseFloat(document.getElementById("IncSValue_11").value)+parseFloat(document.getElementById("IncSValue_12").value)+parseFloat(document.getElementById("IncSValue_13").value)+parseFloat(document.getElementById("IncSValue_14").value)+parseFloat(document.getElementById("IncSValue_15").value)+parseFloat(document.getElementById("IncSValue_16").value)+parseFloat(document.getElementById("IncSValue_17").value)+parseFloat(document.getElementById("IncSValue_18").value)+parseFloat(document.getElementById("IncSValue_19").value); 

//var Hod_NetIncGS = parseFloat(document.getElementById("UnPIS").value); 
//var Hod_PerGS = parseFloat(document.getElementById("UnPerIS").value);
//var Hod_IncGS = parseFloat(document.getElementById("UnIncS").value);

var Hod_NetIncGS = 0; 
var Hod_PerGS = 0;
var Hod_IncGS = 0;

var Tot_NetIncGS = document.getElementById("PIST").value=Math.round((Hod_NetIncGS+TotPIS)*100)/100; 
var Tot_IncGS = document.getElementById("IncST").value=Math.round((Hod_IncGS+TotIncS)*100)/100; 
var Tot_PerGS = document.getElementById("PerIST").value=Math.round((Tot_IncGS/TOnePer)*100)/100;

 /*Ctc Ctc Ctc*/
  var TotHod_CtcGS = parseFloat(document.getElementById("HodCtcT").value); 
  var IncTDCtc=Math.round(((TotHod_CtcGS*Tot_PerGS)/100)*100)/100; 
  document.getElementById("PISCtcT").value=Math.round((TotHod_CtcGS+IncTDCtc)*100)/100;
 /*Ctc Ctc Ctc*/

}

function Cal_TwoProInc(n)
{ 
if(document.getElementById("PIS_"+n).value==''){document.getElementById("PIS_"+n).value=0;}
if(document.getElementById("PerIS_"+n).value==''){document.getElementById("PerIS_"+n).value=0;}
if(document.getElementById("IncS_"+n).value==''){document.getElementById("IncS_"+n).value=0;}

var Emp_GS = parseFloat(document.getElementById("EmpGross_"+n).value); 
var App_GS = parseFloat(document.getElementById("AppGross_"+n).value); 
var Rev_GS = parseFloat(document.getElementById("RevGross_"+n).value); 
var Hod_GS = parseFloat(document.getElementById("HodGross_"+n).value); 
var Hod_NetIncGS = parseFloat(document.getElementById("PIS_"+n).value); 
var Hod_PerGS = parseFloat(document.getElementById("PerIS_"+n).value);
var Hod_IncGS = parseFloat(document.getElementById("IncS_"+n).value);
var RowNo = document.getElementById("RowNo").value;

if(Hod_GS==0)
{ if(Rev_GS==0)
  { if(App_GS==0)
    { if(Emp_GS==0)
      { var PerValue=0; var GrossValue=0;}
      else{var PerValue=Emp_GS; var GrossValue=Emp_GS;}
    }
    else{var PerValue=App_GS; var GrossValue=App_GS;}
  } 
  else{var PerValue=Rev_GS; var GrossValue=Rev_GS;}
}
else{var PerValue=Hod_GS; var GrossValue=Hod_GS;}

var OnePer = Math.round(((PerValue*1)/100)*100)/100;
if(OnePer>0){var IncGS = document.getElementById("IncS_"+n).value=Math.round((Hod_PerGS*OnePer)*100)/100;}
else{var IncGS = document.getElementById("IncS_"+n).value=0;}
var Hod_IncGS1 = parseFloat(document.getElementById("IncS_"+n).value);
var NetIncGS = document.getElementById("PIS_"+n).value=Math.round((GrossValue+Hod_IncGS1)*100)/100;

/*Ctc Ctc Ctc*/
 var Hod_Ctc = parseFloat(document.getElementById("HodCtc_"+n).value);
 var IncDCtc=Math.round(((Hod_Ctc*Hod_PerGS)/100)*100)/100; //alert(Hod_Ctc+"-"+Per_GS);
 document.getElementById("PISCtc_"+n).value=Math.round((Hod_Ctc+IncDCtc)*100)/100;
 /*Ctc Ctc Ctc*/

var TotHod_GS = parseFloat(document.getElementById("HodGrossT").value); 
var TotHod_NetIncGS = parseFloat(document.getElementById("PIST").value); 
var TotHod_PerGS = parseFloat(document.getElementById("PerIST").value);
var TotHod_IncGS = parseFloat(document.getElementById("IncST").value);
var TotHod_CtcGS = parseFloat(document.getElementById("PISCtcT").value); 

var TOnePer=Math.round(((TotHod_GS*1)/100)*100)/100; 
for(var i=1; i<=RowNo; i++)
{ var a=document.getElementById("PISValue_"+i).value=parseFloat(document.getElementById("PIS_"+i).value);
  var b=document.getElementById("PerISValue_"+i).value=parseFloat(document.getElementById("PerIS_"+i).value);
  var c=document.getElementById("IncSValue_"+i).value=parseFloat(document.getElementById("IncS_"+i).value);
} 
var d=document.getElementById("PISValue_19").value=parseFloat(document.getElementById("UnE_PIS").value);
var e=document.getElementById("PerISValue_19").value=parseFloat(document.getElementById("UnE_PerPIS").value);
var f=document.getElementById("IncSValue_19").value=parseFloat(document.getElementById("UnE_PerIncS").value);

var TotPIS=parseFloat(document.getElementById("PISValue_1").value)+parseFloat(document.getElementById("PISValue_2").value)+parseFloat(document.getElementById("PISValue_3").value)+parseFloat(document.getElementById("PISValue_4").value)+parseFloat(document.getElementById("PISValue_5").value)+parseFloat(document.getElementById("PISValue_6").value)+parseFloat(document.getElementById("PISValue_7").value)+parseFloat(document.getElementById("PISValue_8").value)+parseFloat(document.getElementById("PISValue_9").value)+parseFloat(document.getElementById("PISValue_10").value)+parseFloat(document.getElementById("PISValue_11").value)+parseFloat(document.getElementById("PISValue_12").value)+parseFloat(document.getElementById("PISValue_13").value)+parseFloat(document.getElementById("PISValue_14").value)+parseFloat(document.getElementById("PISValue_15").value)+parseFloat(document.getElementById("PISValue_16").value)+parseFloat(document.getElementById("PISValue_17").value)+parseFloat(document.getElementById("PISValue_18").value)+parseFloat(document.getElementById("PISValue_19").value);
var TotIncS=parseFloat(document.getElementById("IncSValue_1").value)+parseFloat(document.getElementById("IncSValue_2").value)+parseFloat(document.getElementById("IncSValue_3").value)+parseFloat(document.getElementById("IncSValue_4").value)+parseFloat(document.getElementById("IncSValue_5").value)+parseFloat(document.getElementById("IncSValue_6").value)+parseFloat(document.getElementById("IncSValue_7").value)+parseFloat(document.getElementById("IncSValue_8").value)+parseFloat(document.getElementById("IncSValue_9").value)+parseFloat(document.getElementById("IncSValue_10").value)+parseFloat(document.getElementById("IncSValue_11").value)+parseFloat(document.getElementById("IncSValue_12").value)+parseFloat(document.getElementById("IncSValue_13").value)+parseFloat(document.getElementById("IncSValue_14").value)+parseFloat(document.getElementById("IncSValue_15").value)+parseFloat(document.getElementById("IncSValue_16").value)+parseFloat(document.getElementById("IncSValue_17").value)+parseFloat(document.getElementById("IncSValue_18").value)+parseFloat(document.getElementById("IncSValue_19").value); 

//var Hod_NetIncGS = parseFloat(document.getElementById("UnPIS").value); 
//var Hod_PerGS = parseFloat(document.getElementById("UnPerIS").value);
//var Hod_IncGS = parseFloat(document.getElementById("UnIncS").value);

var Hod_NetIncGS =0; 
var Hod_PerGS = 0;
var Hod_IncGS = 0;

var Tot_NetIncGS = document.getElementById("PIST").value=Math.round((Hod_NetIncGS+TotPIS)*100)/100; 
var Tot_IncGS = document.getElementById("IncST").value=Math.round((Hod_IncGS+TotIncS)*100)/100;  
var Tot_PerGS = document.getElementById("PerIST").value=Math.round((Tot_IncGS/TOnePer)*100)/100;

  /*Ctc Ctc Ctc*/
  var TotHod_CtcGS = parseFloat(document.getElementById("HodCtcT").value); 
  var IncTDCtc=Math.round(((TotHod_CtcGS*Tot_PerGS)/100)*100)/100; 
  document.getElementById("PISCtcT").value=Math.round((TotHod_CtcGS+IncTDCtc)*100)/100;
  /*Ctc Ctc Ctc*/
  
}

function Cal_ThreeProInc(n)
{ 
if(document.getElementById("PIS_"+n).value==''){document.getElementById("PIS_"+n).value=0;}
if(document.getElementById("PerIS_"+n).value==''){document.getElementById("PerIS_"+n).value=0;}
if(document.getElementById("IncS_"+n).value==''){document.getElementById("IncS_"+n).value=0;}

var Emp_GS = parseFloat(document.getElementById("EmpGross_"+n).value); 
var App_GS = parseFloat(document.getElementById("AppGross_"+n).value); 
var Rev_GS = parseFloat(document.getElementById("RevGross_"+n).value); 
var Hod_GS = parseFloat(document.getElementById("HodGross_"+n).value); 
var Hod_NetIncGS = parseFloat(document.getElementById("PIS_"+n).value); 
var Hod_PerGS = parseFloat(document.getElementById("PerIS_"+n).value);
var Hod_IncGS = parseFloat(document.getElementById("IncS_"+n).value);
var RowNo = document.getElementById("RowNo").value;

if(Hod_GS==0)
{ if(Rev_GS==0)
  { if(App_GS==0)
    { if(Emp_GS==0)
      { var PerValue=0; var GrossValue=0;}
      else{var PerValue=Emp_GS; var GrossValue=Emp_GS;}
    }
    else{var PerValue=App_GS; var GrossValue=App_GS;}
  } 
  else{var PerValue=Rev_GS; var GrossValue=Rev_GS;}
}
else{var PerValue=Hod_GS; var GrossValue=Hod_GS;}

var NetIncGS = document.getElementById("PIS_"+n).value=Math.round((GrossValue+Hod_IncGS)*100)/100;
var OnePer = Math.round(((PerValue*1)/100)*100)/100;
if(OnePer>0){var Per_GS = document.getElementById("PerIS_"+n).value=Math.round((Hod_IncGS/OnePer)*100)/100;}
else{var Per_GS = document.getElementById("PerIS_"+n).value=0;}

 /*Ctc Ctc Ctc*/
 var Hod_Ctc = parseFloat(document.getElementById("HodCtc_"+n).value);
 var IncDCtc=Math.round(((Hod_Ctc*Per_GS)/100)*100)/100; //alert(Hod_Ctc+"-"+Per_GS);
 document.getElementById("PISCtc_"+n).value=Math.round((Hod_Ctc+IncDCtc)*100)/100;
 /*Ctc Ctc Ctc*/


var TotHod_GS = parseFloat(document.getElementById("HodGrossT").value); 
var TotHod_NetIncGS = parseFloat(document.getElementById("PIST").value); 
var TotHod_PerGS = parseFloat(document.getElementById("PerIST").value);
var TotHod_IncGS = parseFloat(document.getElementById("IncST").value);
var TotHod_CtcGS = parseFloat(document.getElementById("PISCtcT").value); 

var TOnePer=Math.round(((TotHod_GS*1)/100)*100)/100; 
for(var i=1; i<=RowNo; i++)
{ var a=document.getElementById("PISValue_"+i).value=parseFloat(document.getElementById("PIS_"+i).value);
  var b=document.getElementById("PerISValue_"+i).value=parseFloat(document.getElementById("PerIS_"+i).value);
  var c=document.getElementById("IncSValue_"+i).value=parseFloat(document.getElementById("IncS_"+i).value);
} 
var d=document.getElementById("PISValue_19").value=parseFloat(document.getElementById("UnE_PIS").value);
var e=document.getElementById("PerISValue_19").value=parseFloat(document.getElementById("UnE_PerPIS").value);
var f=document.getElementById("IncSValue_19").value=parseFloat(document.getElementById("UnE_PerIncS").value);

var TotPIS=parseFloat(document.getElementById("PISValue_1").value)+parseFloat(document.getElementById("PISValue_2").value)+parseFloat(document.getElementById("PISValue_3").value)+parseFloat(document.getElementById("PISValue_4").value)+parseFloat(document.getElementById("PISValue_5").value)+parseFloat(document.getElementById("PISValue_6").value)+parseFloat(document.getElementById("PISValue_7").value)+parseFloat(document.getElementById("PISValue_8").value)+parseFloat(document.getElementById("PISValue_9").value)+parseFloat(document.getElementById("PISValue_10").value)+parseFloat(document.getElementById("PISValue_11").value)+parseFloat(document.getElementById("PISValue_12").value)+parseFloat(document.getElementById("PISValue_13").value)+parseFloat(document.getElementById("PISValue_14").value)+parseFloat(document.getElementById("PISValue_15").value)+parseFloat(document.getElementById("PISValue_16").value)+parseFloat(document.getElementById("PISValue_17").value)+parseFloat(document.getElementById("PISValue_18").value)+parseFloat(document.getElementById("PISValue_19").value);
var TotIncS=parseFloat(document.getElementById("IncSValue_1").value)+parseFloat(document.getElementById("IncSValue_2").value)+parseFloat(document.getElementById("IncSValue_3").value)+parseFloat(document.getElementById("IncSValue_4").value)+parseFloat(document.getElementById("IncSValue_5").value)+parseFloat(document.getElementById("IncSValue_6").value)+parseFloat(document.getElementById("IncSValue_7").value)+parseFloat(document.getElementById("IncSValue_8").value)+parseFloat(document.getElementById("IncSValue_9").value)+parseFloat(document.getElementById("IncSValue_10").value)+parseFloat(document.getElementById("IncSValue_11").value)+parseFloat(document.getElementById("IncSValue_12").value)+parseFloat(document.getElementById("IncSValue_13").value)+parseFloat(document.getElementById("IncSValue_14").value)+parseFloat(document.getElementById("IncSValue_15").value)+parseFloat(document.getElementById("IncSValue_16").value)+parseFloat(document.getElementById("IncSValue_17").value)+parseFloat(document.getElementById("IncSValue_18").value)+parseFloat(document.getElementById("IncSValue_19").value); 

//var Hod_NetIncGS = parseFloat(document.getElementById("UnPIS").value); 
//var Hod_PerGS = parseFloat(document.getElementById("UnPerIS").value);
//var Hod_IncGS = parseFloat(document.getElementById("UnIncS").value);

var Hod_NetIncGS = 0; 
var Hod_PerGS = 0;
var Hod_IncGS = 0;

var Tot_NetIncGS = document.getElementById("PIST").value=Math.round((Hod_NetIncGS+TotPIS)*100)/100; 
var Tot_IncGS = document.getElementById("IncST").value=Math.round((Hod_IncGS+TotIncS)*100)/100; 
var Tot_PerGS = document.getElementById("PerIST").value=Math.round((Tot_IncGS/TOnePer)*100)/100;

  /*Ctc Ctc Ctc*/
  var TotHod_CtcGS = parseFloat(document.getElementById("HodCtcT").value); 
  var IncTDCtc=Math.round(((TotHod_CtcGS*Tot_PerGS)/100)*100)/100; 
  document.getElementById("PISCtcT").value=Math.round((TotHod_CtcGS+IncTDCtc)*100)/100;
  /*Ctc Ctc Ctc*/

}

function OpenUnAssignWin(YI,CI)
{ var VS=document.getElementById("Value").value; var v=document.getElementById("mainV").value;
var win = window.open("UnEmpPMSRating.php?action=UnEmpRat&YI="+YI+"&CI="+CI,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=900,height=600"); 
var timer = setInterval( function() { if(win.closed) { clearInterval(timer);  window.location="MyTeam2Cost.php?&action="+VS+"&value="+v+"&YI="+YI; } }, 1000);
}

/*********************************Un Assessed Employee *****************************************/
function OneUn()
{ 
var Emp_GS = parseFloat(document.getElementById("UnEmpGross").value); 
var App_GS = parseFloat(document.getElementById("UnAppGross").value); 
var Rev_GS = parseFloat(document.getElementById("UnRevGross").value); 
var Hod_GS = parseFloat(document.getElementById("UnHodGross").value); 
var Hod_NetIncGS = parseFloat(document.getElementById("UnPIS").value); 
var Hod_PerGS = parseFloat(document.getElementById("UnPerIS").value);
var Hod_IncGS = parseFloat(document.getElementById("UnIncS").value);

var RowNo = document.getElementById("RowNo").value;

if(Hod_GS==0)
{ if(Rev_GS==0)
  { if(App_GS==0)
    { if(Emp_GS==0)
      { var PerValue=0; var GrossValue=0;}
      else{var PerValue=Emp_GS; var GrossValue=Emp_GS;}
    }
    else{var PerValue=App_GS; var GrossValue=App_GS;}
  } 
  else{var PerValue=Rev_GS; var GrossValue=Rev_GS;}
}
else{var PerValue=Hod_GS; var GrossValue=Hod_GS;}

//alert(Hod_GS+"-"+Hod_NetIncGS+"-"+Hod_PerGS+"-"+Hod_IncGS);
var TotHod_GS = parseFloat(document.getElementById("HodGrossT").value); 
var TotHod_NetIncGS = parseFloat(document.getElementById("PIST").value); 
var TotHod_PerGS = parseFloat(document.getElementById("PerIST").value);
var TotHod_IncGS = parseFloat(document.getElementById("IncST").value);
var TOnePer=Math.round(((TotHod_GS*1)/100)*100)/100; 

var OnePer = Math.round(((PerValue*1)/100)*100)/100;
if(OnePer>0){var Per_GS = document.getElementById("UnPerIS").value=Math.round((Hod_IncGS/OnePer)*100)/100;}
else{var Per_GS = document.getElementById("UnPerIS").value=0;}
var Hod_NetIncGS1 = parseFloat(document.getElementById("UnPIS").value);
if(Hod_NetIncGS1>GrossValue){var IncGS = document.getElementById("UnIncS").value=Math.round((Hod_NetIncGS1-GrossValue)*100)/100;}
else{var IncGS = document.getElementById("UnIncS").value=0}

var Hod_NetIncGS2 = parseFloat(document.getElementById("UnPIS").value); 
var Hod_PerGS2 = parseFloat(document.getElementById("UnPerIS").value);
var Hod_IncGS2 = parseFloat(document.getElementById("UnIncS").value);
for(var i=1; i<=RowNo; i++)
{ var a=document.getElementById("PISValue_"+i).value=parseFloat(document.getElementById("PIS_"+i).value);
  var b=document.getElementById("PerISValue_"+i).value=parseFloat(document.getElementById("PerIS_"+i).value);
  var c=document.getElementById("IncSValue_"+i).value=parseFloat(document.getElementById("IncS_"+i).value);
} 
var d=document.getElementById("PISValue_19").value=parseFloat(document.getElementById("UnE_PIS").value);
var e=document.getElementById("PerISValue_19").value=parseFloat(document.getElementById("UnE_PerPIS").value);
var f=document.getElementById("IncSValue_19").value=parseFloat(document.getElementById("UnE_PerIncS").value);

var TotPIS=parseFloat(document.getElementById("PISValue_1").value)+parseFloat(document.getElementById("PISValue_2").value)+parseFloat(document.getElementById("PISValue_3").value)+parseFloat(document.getElementById("PISValue_4").value)+parseFloat(document.getElementById("PISValue_5").value)+parseFloat(document.getElementById("PISValue_6").value)+parseFloat(document.getElementById("PISValue_7").value)+parseFloat(document.getElementById("PISValue_8").value)+parseFloat(document.getElementById("PISValue_9").value)+parseFloat(document.getElementById("PISValue_10").value)+parseFloat(document.getElementById("PISValue_11").value)+parseFloat(document.getElementById("PISValue_12").value)+parseFloat(document.getElementById("PISValue_13").value)+parseFloat(document.getElementById("PISValue_14").value)+parseFloat(document.getElementById("PISValue_15").value)+parseFloat(document.getElementById("PISValue_16").value)+parseFloat(document.getElementById("PISValue_17").value)+parseFloat(document.getElementById("PISValue_18").value)+parseFloat(document.getElementById("PISValue_19").value);
var TotIncS=parseFloat(document.getElementById("IncSValue_1").value)+parseFloat(document.getElementById("IncSValue_2").value)+parseFloat(document.getElementById("IncSValue_3").value)+parseFloat(document.getElementById("IncSValue_4").value)+parseFloat(document.getElementById("IncSValue_5").value)+parseFloat(document.getElementById("IncSValue_6").value)+parseFloat(document.getElementById("IncSValue_7").value)+parseFloat(document.getElementById("IncSValue_8").value)+parseFloat(document.getElementById("IncSValue_9").value)+parseFloat(document.getElementById("IncSValue_10").value)+parseFloat(document.getElementById("IncSValue_11").value)+parseFloat(document.getElementById("IncSValue_12").value)+parseFloat(document.getElementById("IncSValue_13").value)+parseFloat(document.getElementById("IncSValue_14").value)+parseFloat(document.getElementById("IncSValue_15").value)+parseFloat(document.getElementById("IncSValue_16").value)+parseFloat(document.getElementById("IncSValue_17").value)+parseFloat(document.getElementById("IncSValue_18").value)+parseFloat(document.getElementById("IncSValue_19").value); 

var Tot_NetIncGS = document.getElementById("PIST").value=Math.round((Hod_NetIncGS2+TotPIS)*100)/100; 
var Tot_IncGS = document.getElementById("IncST").value=Math.round((Hod_IncGS2+TotIncS)*100)/100; 
var Tot_PerGS = document.getElementById("PerIST").value=Math.round((Tot_IncGS/TOnePer)*100)/100;

}

function TwoUn()
{ 
var Emp_GS = parseFloat(document.getElementById("UnEmpGross").value); 
var App_GS = parseFloat(document.getElementById("UnAppGross").value); 
var Rev_GS = parseFloat(document.getElementById("UnRevGross").value); 
var Hod_GS = parseFloat(document.getElementById("UnHodGross").value); 
var Hod_NetIncGS = parseFloat(document.getElementById("UnPIS").value); 
var Hod_PerGS = parseFloat(document.getElementById("UnPerIS").value);
var Hod_IncGS = parseFloat(document.getElementById("UnIncS").value);
var RowNo = document.getElementById("RowNo").value;

if(Hod_GS==0)
{ if(Rev_GS==0)
  { if(App_GS==0)
    { if(Emp_GS==0)
      { var PerValue=0; var GrossValue=0;}
      else{var PerValue=Emp_GS; var GrossValue=Emp_GS;}
    }
    else{var PerValue=App_GS; var GrossValue=App_GS;}
  } 
  else{var PerValue=Rev_GS; var GrossValue=Rev_GS;}
}
else{var PerValue=Hod_GS; var GrossValue=Hod_GS;}

var TotHod_GS = parseFloat(document.getElementById("HodGrossT").value); 
var TotHod_NetIncGS = parseFloat(document.getElementById("PIST").value); 
var TotHod_PerGS = parseFloat(document.getElementById("PerIST").value);
var TotHod_IncGS = parseFloat(document.getElementById("IncST").value);
var TOnePer=Math.round(((TotHod_GS*1)/100)*100)/100; 

var OnePer = Math.round(((PerValue*1)/100)*100)/100;
if(OnePer>0){var IncGS = document.getElementById("UnIncS").value=Math.round((Hod_PerGS*OnePer)*100)/100;}
else{var IncGS = document.getElementById("UnIncS").value=0;}
var Hod_IncGS1 = parseFloat(document.getElementById("UnIncS").value);
var NetIncGS = document.getElementById("UnPIS").value=Math.round((GrossValue+Hod_IncGS1)*100)/100;
var Hod_NetIncGS2 = parseFloat(document.getElementById("UnPIS").value); 
var Hod_PerGS2 = parseFloat(document.getElementById("UnPerIS").value);
var Hod_IncGS2 = parseFloat(document.getElementById("UnIncS").value);

for(var i=1; i<=RowNo; i++)
{ var a=document.getElementById("PISValue_"+i).value=parseFloat(document.getElementById("PIS_"+i).value);
  var b=document.getElementById("PerISValue_"+i).value=parseFloat(document.getElementById("PerIS_"+i).value);
  var c=document.getElementById("IncSValue_"+i).value=parseFloat(document.getElementById("IncS_"+i).value);
} 
var d=document.getElementById("PISValue_19").value=parseFloat(document.getElementById("UnE_PIS").value);
var e=document.getElementById("PerISValue_19").value=parseFloat(document.getElementById("UnE_PerPIS").value);
var f=document.getElementById("IncSValue_19").value=parseFloat(document.getElementById("UnE_PerIncS").value);

var TotPIS=parseFloat(document.getElementById("PISValue_1").value)+parseFloat(document.getElementById("PISValue_2").value)+parseFloat(document.getElementById("PISValue_3").value)+parseFloat(document.getElementById("PISValue_4").value)+parseFloat(document.getElementById("PISValue_5").value)+parseFloat(document.getElementById("PISValue_6").value)+parseFloat(document.getElementById("PISValue_7").value)+parseFloat(document.getElementById("PISValue_8").value)+parseFloat(document.getElementById("PISValue_9").value)+parseFloat(document.getElementById("PISValue_10").value)+parseFloat(document.getElementById("PISValue_11").value)+parseFloat(document.getElementById("PISValue_12").value)+parseFloat(document.getElementById("PISValue_13").value)+parseFloat(document.getElementById("PISValue_14").value)+parseFloat(document.getElementById("PISValue_15").value)+parseFloat(document.getElementById("PISValue_16").value)+parseFloat(document.getElementById("PISValue_17").value)+parseFloat(document.getElementById("PISValue_18").value)+parseFloat(document.getElementById("PISValue_19").value);

var TotIncS=parseFloat(document.getElementById("IncSValue_1").value)+parseFloat(document.getElementById("IncSValue_2").value)+parseFloat(document.getElementById("IncSValue_3").value)+parseFloat(document.getElementById("IncSValue_4").value)+parseFloat(document.getElementById("IncSValue_5").value)+parseFloat(document.getElementById("IncSValue_6").value)+parseFloat(document.getElementById("IncSValue_7").value)+parseFloat(document.getElementById("IncSValue_8").value)+parseFloat(document.getElementById("IncSValue_9").value)+parseFloat(document.getElementById("IncSValue_10").value)+parseFloat(document.getElementById("IncSValue_11").value)+parseFloat(document.getElementById("IncSValue_12").value)+parseFloat(document.getElementById("IncSValue_13").value)+parseFloat(document.getElementById("IncSValue_14").value)+parseFloat(document.getElementById("IncSValue_15").value)+parseFloat(document.getElementById("IncSValue_16").value)+parseFloat(document.getElementById("IncSValue_17").value)+parseFloat(document.getElementById("IncSValue_18").value)+parseFloat(document.getElementById("IncSValue_19").value); 

var Tot_NetIncGS = document.getElementById("PIST").value=Math.round((Hod_NetIncGS2+TotPIS)*100)/100; 
var Tot_IncGS = document.getElementById("IncST").value=Math.round((Hod_IncGS2+TotIncS)*100)/100; 
var Tot_PerGS = document.getElementById("PerIST").value=Math.round((Tot_IncGS/TOnePer)*100)/100;
}

function ThreeUn()
{ 
var Emp_GS = parseFloat(document.getElementById("UnEmpGross").value); 
var App_GS = parseFloat(document.getElementById("UnAppGross").value); 
var Rev_GS = parseFloat(document.getElementById("UnRevGross").value); 
var Hod_GS = parseFloat(document.getElementById("UnHodGross").value); 
var Hod_NetIncGS = parseFloat(document.getElementById("UnPIS").value); 
var Hod_PerGS = parseFloat(document.getElementById("UnPerIS").value);
var Hod_IncGS = parseFloat(document.getElementById("UnIncS").value);
var RowNo = document.getElementById("RowNo").value;

if(Hod_GS==0)
{ if(Rev_GS==0)
  { if(App_GS==0)
    { if(Emp_GS==0)
      { var PerValue=0; var GrossValue=0;}
      else{var PerValue=Emp_GS; var GrossValue=Emp_GS;}
    }
    else{var PerValue=App_GS; var GrossValue=App_GS;}
  } 
  else{var PerValue=Rev_GS; var GrossValue=Rev_GS;}
}
else{var PerValue=Hod_GS; var GrossValue=Hod_GS;}

var TotHod_GS = parseFloat(document.getElementById("HodGrossT").value); 
var TotHod_NetIncGS = parseFloat(document.getElementById("PIST").value); 
var TotHod_PerGS = parseFloat(document.getElementById("PerIST").value);
var TotHod_IncGS = parseFloat(document.getElementById("IncST").value);
var TOnePer=Math.round(((TotHod_GS*1)/100)*100)/100; 

var NetIncGS = document.getElementById("UnPIS").value=Math.round((GrossValue+Hod_IncGS)*100)/100;
var OnePer = Math.round(((PerValue*1)/100)*100)/100;
if(OnePer>0){var Per_GS = document.getElementById("UnPerIS").value=Math.round((Hod_IncGS/OnePer)*100)/100;}
else{var Per_GS = document.getElementById("UnPerIS").value=0;}
var Hod_NetIncGS2 = parseFloat(document.getElementById("UnPIS").value); 
var Hod_PerGS2 = parseFloat(document.getElementById("UnPerIS").value);
var Hod_IncGS2 = parseFloat(document.getElementById("UnIncS").value);

for(var i=1; i<=RowNo; i++)
{ var a=document.getElementById("PISValue_"+i).value=parseFloat(document.getElementById("PIS_"+i).value);
  var b=document.getElementById("PerISValue_"+i).value=parseFloat(document.getElementById("PerIS_"+i).value);
  var c=document.getElementById("IncSValue_"+i).value=parseFloat(document.getElementById("IncS_"+i).value);
} 
var d=document.getElementById("PISValue_19").value=parseFloat(document.getElementById("UnE_PIS").value);
var e=document.getElementById("PerISValue_19").value=parseFloat(document.getElementById("UnE_PerPIS").value);
var f=document.getElementById("IncSValue_19").value=parseFloat(document.getElementById("UnE_PerIncS").value);

var TotPIS=parseFloat(document.getElementById("PISValue_1").value)+parseFloat(document.getElementById("PISValue_2").value)+parseFloat(document.getElementById("PISValue_3").value)+parseFloat(document.getElementById("PISValue_4").value)+parseFloat(document.getElementById("PISValue_5").value)+parseFloat(document.getElementById("PISValue_6").value)+parseFloat(document.getElementById("PISValue_7").value)+parseFloat(document.getElementById("PISValue_8").value)+parseFloat(document.getElementById("PISValue_9").value)+parseFloat(document.getElementById("PISValue_10").value)+parseFloat(document.getElementById("PISValue_11").value)+parseFloat(document.getElementById("PISValue_12").value)+parseFloat(document.getElementById("PISValue_13").value)+parseFloat(document.getElementById("PISValue_14").value)+parseFloat(document.getElementById("PISValue_15").value)+parseFloat(document.getElementById("PISValue_16").value)+parseFloat(document.getElementById("PISValue_17").value)+parseFloat(document.getElementById("PISValue_18").value)+parseFloat(document.getElementById("PISValue_19").value);

var TotIncS=parseFloat(document.getElementById("IncSValue_1").value)+parseFloat(document.getElementById("IncSValue_2").value)+parseFloat(document.getElementById("IncSValue_3").value)+parseFloat(document.getElementById("IncSValue_4").value)+parseFloat(document.getElementById("IncSValue_5").value)+parseFloat(document.getElementById("IncSValue_6").value)+parseFloat(document.getElementById("IncSValue_7").value)+parseFloat(document.getElementById("IncSValue_8").value)+parseFloat(document.getElementById("IncSValue_9").value)+parseFloat(document.getElementById("IncSValue_10").value)+parseFloat(document.getElementById("IncSValue_11").value)+parseFloat(document.getElementById("IncSValue_12").value)+parseFloat(document.getElementById("IncSValue_13").value)+parseFloat(document.getElementById("IncSValue_14").value)+parseFloat(document.getElementById("IncSValue_15").value)+parseFloat(document.getElementById("IncSValue_16").value)+parseFloat(document.getElementById("IncSValue_17").value)+parseFloat(document.getElementById("IncSValue_18").value)+parseFloat(document.getElementById("IncSValue_19").value); 

var Tot_NetIncGS = document.getElementById("PIST").value=Math.round((Hod_NetIncGS2+TotPIS)*100)/100; 
var Tot_IncGS = document.getElementById("IncST").value=Math.round((Hod_IncGS2+TotIncS)*100)/100; 
var Tot_PerGS = document.getElementById("PerIST").value=Math.round((Tot_IncGS/TOnePer)*100)/100;
}

function BtnEdit(v)
{
 var RowNo = document.getElementById("RowNo").value; document.getElementById("edit").style.display='none';
 //if(v!='Hod' && v!='Dept'){ document.getElementById("save").style.display='block'; }
 document.getElementById("save").style.display='block';
 for(var i=1; i<=RowNo; i++)
 { document.getElementById("PIS_"+i).disabled=false; document.getElementById("PerIS_"+i).disabled=false; document.getElementById("IncS_"+i).disabled=false; 
   document.getElementById("PIS_"+i).style.backgroundColor="#C6FFC6"; 
   document.getElementById("PerIS_"+i).style.backgroundColor="#C6FFC6"; 
   document.getElementById("IncS_"+i).style.backgroundColor="#C6FFC6";
 } 
   //document.getElementById("UnPIS").disabled=false; document.getElementById("UnPerIS").disabled=false; document.getElementById("UnIncS").disabled=false;
}

/*********************************Un Assessed Employee *****************************************/
</script>
</head>
<body class="body" onLoad="Cal_OneProInc(1)">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $_REQUEST['YI']; ?>" />
<input type="hidden" name="Value" id="Value" value="<?php echo $_REQUEST['action']; ?>" />
<input type="hidden" name="mainV" id="mainV" value="<?php echo $_REQUEST['value']; ?>" />
<?php for($i=1; $i<=19; $i++){?>
<input type="hidden" id="PISValue_<?php echo $i; ?>" value="0" />
<input type="hidden" id="PerISValue_<?php echo $i; ?>" value="0" />
<input type="hidden" id="IncSValue_<?php echo $i; ?>" value="0" />
<?php } ?>
<?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
      $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>		
<?php if($_REQUEST['YI']==1){$Y=2012;}elseif($_REQUEST['YI']==2){$Y=2013;}elseif($_REQUEST['YI']==3){$Y=2014;}elseif($_REQUEST['YI']==4){$Y=2015;}elseif($_REQUEST['YI']==5){$Y=2016;}elseif($_REQUEST['YI']==6){$Y=2017;}elseif($_REQUEST['YI']==7){$Y=2018;}elseif($_REQUEST['YI']==8){$Y=2019;}elseif($_REQUEST['YI']==9){$Y=2020;} 

if($_REQUEST['YI']<6){ $Yydate=$Y.'-03-31'; }else{ $Yydate=$Y.'-06-30'; }

?>	  

<table class="table" border="0">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table style="margin-top:0px;width:100%;" border="0">
    <tr>
	  <td valign="top" style="width:100%;"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top">
	   <table border="0" style="width:100%;float:none;" cellpadding="0">
		<tr>
		 <td valign="top"> 
<?php if($_SESSION['UserType']=='S'){ ?>		   
<?php //*************************************************************************** ?>	   
<table border="0" id="Activity" style="width:100%;">
 <tr>
  <td align="left" style="width:100%;" valign="top">
  <table border="0" style="width:100%;">
   <tr>
	<td colspan="10" style="width:100%;">
	<table border="0" style="width:100%;">
	 <tr>
	  <td class="tdl" style="width:180px;font-size:16px;" valign="top"><b><u><i>Dummy Cost Of Team</i></u> :</b></td>
	  <td class="tdr" style="width:100px;font-size:14px;color:#0061C1;"><b>Financial Year</b>&nbsp;</td>
	  <td class="td1" style="width:120px;"><select class="sell" name="YearID" id="YearID" onChange="SelectYear(this.value)">      <option value="<?php echo $_REQUEST['YI']; ?>" style="margin-left:0px;" selected><?php echo $PRD; ?></option>  
	  <?php if($_REQUEST['YI']!=8){?><option value="8">2019-2020</option><?php } ?>
	  <?php if($_REQUEST['YI']!=7){?><option value="7">2018-2019</option><?php } ?>
	  <?php if($_REQUEST['YI']!=6){?><option value="6">2017-2018</option><?php } ?>
	  <?php if($_REQUEST['YI']!=5){?><option value="5">2016-2017</option><?php } ?>
	  <?php if($_REQUEST['YI']!=4){?><option value="4">2015-2016</option><?php } ?>
	  <?php if($_REQUEST['YI']!=3){?><option value="3">2014-2015</option><?php } ?>
	  <?php if($_REQUEST['YI']!=2){?><option value="2">2013-2014</option><?php } ?>
	  <?php if($_REQUEST['YI']!=1){?><option value="1">2012-2013</option><?php } ?></select></td>
	  
	  <td class="tdc" style="width:150px;"><select class="sell" name="DeptInc" id="DeptInc" onChange="SelectDept(this.value)"><option value="" style="margin-left:0px;" <?php if($_REQUEST['action']!='Dept'){echo 'selected';} ?>>Select Department</option><?php $SqlDeptI=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentCode!='MANAGEMENT' order by DepartmentName ASC", $con); while($ResDeptI=mysql_fetch_array($SqlDeptI)) { ?><option value="<?php echo $ResDeptI['DepartmentId']; ?>" <?php if($_REQUEST['action']=='Dept' AND $_REQUEST['value']==$ResDeptI['DepartmentId']){echo 'selected';} ?>><?php echo '&nbsp;'.$ResDeptI['DepartmentCode'];?></option><?php } ?><option value="<?php echo 'Over';  ?>">&nbsp;<?php echo 'All'; ?></option></select></td>	
	  <td class="tdc" style="width:150px;"><select class="sell" name="HodInc" id="HodInc" onChange="SelectHod(this.value)"><option value="" style="margin-left:0px;" <?php if($_REQUEST['action']!='Hod'){echo 'selected';} ?>>Select HOD</option><?php $SqlHodI=mysql_query("SELECT HOD_EmployeeID,Fname,Sname,Lname from hrm_employee_pms p INNER JOIN hrm_employee e ON p.HOD_EmployeeID=e.EmployeeID WHERE p.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_REQUEST['YI']." GROUP BY p.HOD_EmployeeID", $con); while($ResHodI=mysql_fetch_array($SqlHodI)) { $EnameHI=$ResHodI['Fname'].' '.$ResHodI['Sname'].' '.$ResHodI['Lname']; ?><option value="<?php echo $ResHodI['HOD_EmployeeID']; ?>" <?php if($_REQUEST['action']=='Hod' AND $_REQUEST['value']==$ResHodI['HOD_EmployeeID']){echo 'selected';} ?>><?php echo '&nbsp;'.$EnameHI; ?></option><?php } ?></select></td>
	  
	  <td class="tdc" style="color:#FFFFFF;font-size:14px;width:150px;"><a href="#" onClick="OpenUnAssignWin(<?php echo $_REQUEST['YI'].', '.$CompanyId; ?>)" style="text-decoration:underline;"><b>Checked All Emp</b></a></td>
	  
	  <td class="tdc" style="width:200px;font-size:16px;color:#008000;" valign="top"><b><?php if($_REQUEST['action']=='Over'){echo 'ORGANIZATION WISE';}elseif($_REQUEST['action']=='Dept'){echo 'DEPARTMENT WISE'; }elseif($_REQUEST['action']=='Hod'){echo 'HOD WISE'; } ?></b></td>
	  <td>&nbsp;</td>
	 </tr>
	</table> 
	</td>
   </tr>
   
   <tr>
	<td colspan="12" style="width:100%;">
    <form method="post" name="Nameform">			
	<table border="1" cellspacing="0">
    <?php if($_REQUEST['action']=='Over') { $Action='ORGANIZATION'; }
          elseif($_REQUEST['action']=='Dept'){ $sqlDe=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resDe=mysql_fetch_assoc($sqlDe); $Action='DEPARTMENT:&nbsp;'.$resDe['DepartmentName']; }
          elseif($_REQUEST['action']=='Hod'){ $sqlB=mysql_query("select Fname,Sname,Lname,Gender,Married,DR FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID WHERE e.EmployeeId=".$_REQUEST['value'], $con); $resB=mysql_fetch_assoc($sqlB); if($resB['DR']=='Y'){$MS='Dr.';} elseif($resB['Gender']=='M'){$MS='Mr.';} elseif($resB['Gender']=='F' AND $resB['Married']=='Y'){$MS='Mrs.';} elseif($resB['Gender']=='F' AND $resB['Married']=='N'){$MS='Miss.';}  $Action='HOD:&nbsp;'.$MS.' '.$resB['Fname'].' '.$resB['Sname'].' '.$resB['Lname']; } ?>
		  			  
	 <tr bgcolor="#FF8000" style="height:26px;">	
	  <td colspan="11" class="th2"><b><?php echo $Action.'&nbsp;(Year-'.$PRD.')'; ?></b></td>
	  <td colspan="4" align="center">
	  <?php                                             //<date('Y-02-01')
	   if(date("Y-m-d")>=date('Y-01-01') AND date("Y-m-d")<date('Y-03-01') AND $_REQUEST['YI']==$YearId){ 
	   //if($_REQUEST['action']!='Dept' AND $_REQUEST['action']!='Hod'){ ?>
       <input type="button" name="edit" id="edit" value="Edit" onClick="BtnEdit('<?php echo $_REQUEST['action']; ?>')" class="tdc" style="width:90px;background-color:#FFFFFF;display:block;" />
       <input type="submit" name="SaveValue" id="save" value="Save" class="tdc" style="width:90px;background-color:#88D28C;display:none;"/>
	  <?php } //} ?>
	  <input type="hidden" id="SelType" name="SelType" value="<?php echo $_REQUEST['action'];?>" />
	  <input type="hidden" id="SelValue" name="SelValue" value="<?php echo $_REQUEST['value'];?>" />
	  <input type="hidden" id="SelYear" name="SelYear" value="<?php echo $_REQUEST['YI'];?>" />
	  </td>
	  <td colspan="7" rowspan="3" class="th2"><b>ACTUAL HOD PROPOSED PER MONTH</b></td>
	 </tr>		 
			  
	 <tr bgcolor="#7a6189" style="height:24px;">	
	  <td rowspan="3" class="th" style="width:4%;">&nbsp;Sn&nbsp;</td>
	  <td rowspan="3" class="th" style="width:4%;">Rating</td>
	  <td colspan="9" class="th">PREVIOUS GROSS PER MONTH</td>
	  <td colspan="4" rowspan="2" class="th">PROPOSED PER MONTH</td>
	 </tr>
     <tr bgcolor="#7a6189" style="height:24px;">	
      <td colspan="2" class="th">EMPLOYEE</td>
      <td colspan="2" class="th">APPRAISER</td>
      <td colspan="2" class="th">REVIEWER</td>
      <td colspan="3" class="th">HOD</td>
     </tr>
     <tr bgcolor="#7a6189" style="height:24px;">
      <td class="th" style="width:4%;">&nbsp;NOE&nbsp;</td>
      <td class="th" style="width:6%;">Total<br>Gross</td>
      <td class="th" style="width:4%;">&nbsp;NOE&nbsp;</td>
      <td class="th" style="width:6%;">Total<br>Gross</td>
      <td class="th" style="width:4%;">&nbsp;NOE&nbsp;</td>
      <td class="th" style="width:6%;">Total<br>Gross</td>
      <td class="th" style="width:4%;">&nbsp;NOE&nbsp;</td>	
      <td class="th" style="width:6%;">Total<br>Gross</td>	
	  <td class="th" style="width:6%;">Total<br>CTC</td>
   
      <td class="th" style="width:6%;">Praposed<br>Gross</td>
      <td class="th" style="width:4%;">&nbsp;(%)<br>Inc&nbsp;</td>
      <td class="th" style="width:6%;">Increment<br>Amount</td>
	  <td class="th" style="width:6%;">Praposed<br>CTC</td>
	
      <td class="th" style="width:6%;">Praposed<br>Gross</td>
      <td class="th" style="width:6%;">Correction</td>
      <td class="th" style="width:6%;">Total Gross</td>
      <td class="th" style="width:4%;">(%)<!--Praposed--><br>Gross</td>
      <td class="th" style="width:4%;">(%)<br>&nbsp;Corr&nbsp;</td>
      <td class="th" style="width:4%;">(%)<br>&nbsp;Total&nbsp;</td>
      <td class="th" style="width:6%;">Increment</td>	
     </tr>
<?php 
if($_REQUEST['action']=='Over'){ $query=''; $query_num=''; $ExtQuery='1=1'; $HodId=0; $DeptId=0; }
elseif($_REQUEST['action']=='Dept')
{ $query='AND g.DepartmentId='.$_REQUEST['value']; 
  $ExtQuery='DeptId='.$_REQUEST['value']; $HodId=0; $DeptId=$_REQUEST['value']; }
elseif($_REQUEST['action']=='Hod')
{ $query='AND p.HOD_EmployeeID='.$_REQUEST['value']; 
  $ExtQuery='HodId='.$_REQUEST['value']; $HodId=$_REQUEST['value']; $DeptId=0; }
  
if($_REQUEST['YI']==1){ $query_y=''; }elseif($_REQUEST['YI']>=2){ $query_y="AND g.DateJoining<='".$Yydate."'"; }

$sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND RatingStatus='A' order by Rating ASC", $con);  $sn=1; while($resR=mysql_fetch_array($sqlR)){ ?>			  
	 <input type="hidden" name="Rat_<?php echo $sn; ?>" id="Rat_<?php echo $sn;?>" value="<?php echo $resR['Rating'];?>" />
	 <tr bgcolor="#FFFFFF">
	  <td class="tdc"><?php echo $sn;?></td>
      <td class="tdc"><b><?php echo $resR['Rating'];?><b></td>	   
<?php  
//Employee //Employee //Employee //Employee //Employee //Employee //Employee //Employee
$sqlE=mysql_query("select SUM(EmpCurrGrossPM)as EmpGross, SUM(EmpCurrIncentivePM) as EmpInct from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$CompanyId." AND p.Appraiser_EmployeeID!=0 ".$query." ".$query_y." AND p.Dummy_EmpRating=".$resR['Rating'], $con); $resE=mysql_fetch_array($sqlE); 
$NOE=mysql_query("SELECT count(*) as NOE from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$CompanyId." AND p.Appraiser_EmployeeID!=0 ".$query." ".$query_y." AND p.Dummy_EmpRating=".$resR['Rating'], $con); $resNOE=mysql_fetch_assoc($NOE);
if($resE['EmpGross']>0){$resEGross=$resE['EmpGross']+$resE['EmpInct'];}else{$resEGross=0;} ?>			   			   			
<input type="hidden" name="EmpGross_<?php echo $sn;?>" id="EmpGross_<?php echo $sn;?>" value="<?php echo $resEGross;?>"/>
   	  <td class="tdc"><?php echo $resNOE['NOE']; ?></td>			   
	  <td class="tdr"><?php echo $resEGross; ?>&nbsp;</td>

<?php //Appraiser //Appraiser //Appraiser //Appraiser //Appraiser //Appraiser //Appraiser
$sqlA=mysql_query("select SUM(EmpCurrGrossPM)as AppGross, SUM(EmpCurrIncentivePM) as AppInct from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$CompanyId." AND p.Appraiser_EmployeeID!=0 ".$query." ".$query_y." AND p.Dummy_AppRating=".$resR['Rating'], $con); $resA=mysql_fetch_array($sqlA);
$NOA=mysql_query("SELECT count(*) as NOA from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$CompanyId." AND p.Appraiser_EmployeeID!=0 ".$query." ".$query_y." AND p.Dummy_AppRating=".$resR['Rating'], $con); $resNOA=mysql_fetch_assoc($NOA);
if($resA['AppGross']>0){$resAGross=$resA['AppGross']+$resA['AppInct'];}else{$resAGross=0;} ?>			   			   			
<input type="hidden" name="AppGross_<?php echo $sn;?>" id="AppGross_<?php echo $sn;?>" value="<?php echo $resAGross;?>"/>
   	  <td class="tdc"><?php echo $resNOA['NOA']; ?></td>			   
	  <td class="tdr"><?php echo $resAGross; ?>&nbsp;</td>

<?php //Reviewer //Reviewer //Reviewer //Reviewer //Reviewer //Reviewer //Reviewer //Reviewer
$sqlRe=mysql_query("select SUM(EmpCurrGrossPM)as RevGross, SUM(EmpCurrIncentivePM) as RevInct from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$CompanyId." AND p.Appraiser_EmployeeID!=0 ".$query." ".$query_y." AND p.Dummy_RevRating=".$resR['Rating'], $con); $resRe=mysql_fetch_array($sqlRe);
$NOR=mysql_query("SELECT count(*) as NOR from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$CompanyId." AND p.Appraiser_EmployeeID!=0 ".$query." ".$query_y." AND p.Dummy_RevRating=".$resR['Rating'], $con); $resNOR=mysql_fetch_assoc($NOR);
if($resRe['RevGross']>0){$resRGross=$resRe['RevGross']+$resRe['RevInct'];}else{$resRGross=0;} ?>			   			   			
<input type="hidden" name="RevGross_<?php echo $sn;?>" id="RevGross_<?php echo $sn;?>" value="<?php echo $resRGross;?>"/>
   	  <td class="tdc"><?php echo $resNOR['NOR']; ?></td>			   
	  <td class="tdr"><?php echo $resRGross; ?>&nbsp;</td>
		
<?php //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD
$sqlH=mysql_query("select SUM(EmpCurrGrossPM)as HodGross, SUM(EmpCurrIncentivePM) as HodInct, SUM(EmpCurrCtc) as HodCtc from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$CompanyId." AND p.Appraiser_EmployeeID!=0 ".$query." ".$query_y." AND p.Dummy_HodRating=".$resR['Rating'], $con); $resH=mysql_fetch_array($sqlH);
$NOH=mysql_query("SELECT count(*) as NOH from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$CompanyId." AND p.Appraiser_EmployeeID!=0 ".$query." ".$query_y." AND p.Dummy_HodRating=".$resR['Rating'], $con); $resNOH=mysql_fetch_assoc($NOH);
if($resH['HodGross']>0){$resHGross=$resH['HodGross']+$resH['HodInct'];}else{$resHGross=0;}
if($resH['HodCtc']>0){$resHCtc=$resH['HodCtc'];}else{$resHCtc=0;}  ?>			   			   			
<input type="hidden" name="HodGross_<?php echo $sn;?>" id="HodGross_<?php echo $sn;?>" value="<?php echo $resHGross; ?>"/>
<input type="hidden" name="HodCtc_<?php echo $sn;?>" id="HodCtc_<?php echo $sn;?>" value="<?php echo $resHCtc; ?>"/>
   	  <td class="tdc"><?php echo $resNOH['NOH']; ?></td>			   
	  <td class="tdr"><?php echo $resHGross; ?>&nbsp;</td>
	  <td class="tdr" style="background-color:#FFFFB0;"><?php echo floatval($resHCtc); ?>&nbsp;</td>
 
 
      		                                            
<?php if(date("Y-m-d")>=date('Y-01-01') AND date("Y-m-d")<date('Y-03-01') AND $_REQUEST['YI']==$YearId){ 
                                                       //<date('Y-02-01') ?>

<?php /**************************************** Dummy Start *********************************/ ?>
<?php /**************************************** Dummy Start *********************************/ ?>	  
<?php $sql2I=mysql_query("select PerInc from hrm_pms_dummy_increment where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND ".$ExtQuery." AND Rating=".$resR['Rating'], $con);  $res2I=mysql_fetch_array($sql2I); 
	  $sqlCH=mysql_query("select Dummy_HodRating from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$CompanyId." AND p.Appraiser_EmployeeID!=0 ".$query." ".$query_y." AND p.Dummy_HodRating=".$resR['Rating'], $con); $rowCH=mysql_num_rows($sqlCH);
	 
if($rowCH==0){ $Pre_GrossValue=0; $Pre_HodCtc=0; } 
else { $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross, SUM(EmpCurrIncentivePM) as DeptInct, SUM(EmpCurrCtc) as DeptCtc from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$CompanyId." AND p.Appraiser_EmployeeID!=0 ".$query." ".$query_y." AND p.Dummy_HodRating=".$resR['Rating'], $con); $resD=mysql_fetch_assoc($sqlD); 
$Pre_GrossValue=$resD['DeptTotGross']+$resD['DeptInct']; $Pre_HodCtc=$resD['DeptCtc'];   }
	   
 $IncD=($Pre_GrossValue*$res2I['PerInc'])/100;
 $GrossD=$Pre_GrossValue+$IncD;
 $OnePerD=($Pre_GrossValue*1)/100;
 if($OnePerD>0){$PerD=$IncD/$OnePerD;}else{$PerD=0;}
 if($GrossD>0){$H2I=round($GrossD,2);}else{$H2I=0;} 
 if($PerD>0){$H3I=round($PerD,2);}else{$H3I=0;}
 if($IncD>0){$H4I=round($IncD,2);}else{$H4I=0;} 
 
 $IncDCtc=($Pre_HodCtc*$res2I['PerInc'])/100;
 $GrossDCtc=round($Pre_HodCtc+$IncDCtc);
 if($GrossDCtc>0){$H5I=$GrossDCtc;}else{$H5I=0;}
 ?>			   	
      
      <td class="tdc"><input class="inpr" style="color:#0080FF;font-weight:bold;" id="PIS_<?php echo $sn; ?>" name="PIS_<?php echo $sn; ?>" value="<?php echo $H2I; ?>" <?php if($_REQUEST['YI']==$YearId){ ?> onKeyDown="Cal_OneProInc(<?php echo $sn; ?>)" onKeyUp="Cal_OneProInc(<?php echo $sn; ?>)" onClick="Cal_OneProInc(<?php echo $sn; ?>)" onChange="Cal_OneProInc(<?php echo $sn; ?>)" <?php } ?> onKeyPress="return isNumberKey(event)" disabled /></td>
      <td class="tdc"><input class="inpc" style="color:#0080FF;font-weight:bold;" id="PerIS_<?php echo $sn; ?>" name="PerIS_<?php echo $sn; ?>" value="<?php echo $H3I; ?>" <?php if($_REQUEST['YI']==$YearId){ ?> onKeyDown="Cal_TwoProInc(<?php echo $sn; ?>)" onKeyUp="Cal_TwoProInc(<?php echo $sn; ?>)" onChange="Cal_TwoProInc(<?php echo $sn; ?>)" <?php } ?> onKeyPress="return isNumberKey(event)" disabled /></td>
	  <td class="tdc"><input class="inpr" style="color:#0080FF;font-weight:bold;" id="IncS_<?php echo $sn; ?>" name="IncS_<?php echo $sn; ?>" value="<?php echo $H4I; ?>" <?php if($_REQUEST['YI']==$YearId){ ?> onKeyDown="Cal_ThreeProInc(<?php echo $sn; ?>)" onKeyUp="Cal_ThreeProInc(<?php echo $sn; ?>)" onClick="Cal_ThreeProInc(<?php echo $sn; ?>)" onChange="Cal_ThreeProInc(<?php echo $sn; ?>)" <?php } ?> onKeyPress="return isNumberKey(event)" disabled /></td>
	  
	  <td class="tdc" style="background-color:#FFFFB0;"><input class="inpr" style="background-color:#FFFFB0;color:#0080FF;font-weight:bold;" id="PISCtc_<?php echo $sn; ?>" name="PISCtc_<?php echo $sn; ?>" value="<?php echo floatval($H5I); ?>" onKeyPress="return isNumberKey(event)" readonly/></td> 	
<?php /**************************************** Dummy Close *********************************/ ?>
<?php /**************************************** Dummy Close *********************************/ ?>		  		   
<?php } else { ?>		
<?php /**************************************** Actual Value Start *********************************/ ?>	
<?php /**************************************** Actual Value Start *********************************/ ?>			
<?php $sqlHTotP=mysql_query("select SUM(HR_GrossMonthlySalary)as HodTotP, SUM(HR_IncNetMonthalySalary)as HodTotIncS, SUM(EmpCurrCtc) as HotTotCtc from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$CompanyId." AND p.Appraiser_EmployeeID!=0 ".$query." ".$query_y." AND p.Dummy_HodRating=".$resR['Rating'], $con); $resHTotP=mysql_fetch_array($sqlHTotP);
if($resHTotP['HodTotP']>0){$HTotP=$resHTotP['HodTotP'];}else{$HTotP=0;}
if($resHTotP['HotTotCtc']>0){$HTotCtc=$resHTotP['HotTotCtc'];}else{$HTotCtc=0;}
 
$OnePer=($resHGross*1)/100; 
if($resHTotP['HodTotIncS']>0 AND $OnePer>0){ $Inc_Per=$resHTotP['HodTotIncS']/$OnePer; }else{ $Inc_Per=0; }
$round_PerInc=round($Inc_Per,2); 
if($resHTotP['HodTotIncS']>0){$HTotIncS=$resHTotP['HodTotIncS'];}else{$HTotIncS=0;}

 $IncDCtc=($HTotCtc*$round_PerInc)/100;
 $GrossDCtc=round($HTotCtc+$IncDCtc);
 if($GrossDCtc>0){$H5I=$GrossDCtc;}else{$H5I=0;}

?>

      <td class="tdc"><input class="inpr" style="color:#0080FF;font-weight:bold;" id="PIS_<?php echo $sn; ?>" name="PIS_<?php echo $sn; ?>" value="<?php echo floatval($HTotP); ?>" <?php if($_REQUEST['YI']==$YearId){ ?> onKeyDown="Cal_OneProInc(<?php echo $sn; ?>)" onClick="Cal_OneProInc(<?php echo $sn; ?>)" onChange="Cal_OneProInc(<?php echo $sn; ?>)" <?php } ?> disabled/></td>   
	  <td class="tdc"><input class="inpc" style="color:#0080FF;font-weight:bold;" id="PerIS_<?php echo $sn; ?>" name="PerIS_<?php echo $sn; ?>" value="<?php echo floatval($round_PerInc); ?>" <?php if($_REQUEST['YI']==$YearId){ ?> onKeyDown="Cal_TwoProInc(<?php echo $sn; ?>)" onChange="Cal_TwoProInc(<?php echo $sn; ?>)" <?php } ?> disabled /></td>
	  <td class="tdc"><input class="inpr" style="color:#0080FF;font-weight:bold;" id="IncS_<?php echo $sn; ?>" name="IncS_<?php echo $sn; ?>" value="<?php echo floatval($HTotIncS); ?>" <?php if($_REQUEST['YI']==$YearId){ ?> onKeyDown="Cal_ThreeProInc(<?php echo $sn; ?>)" onClick="Cal_ThreeProInc(<?php echo $sn; ?>)" onChange="Cal_ThreeProInc(<?php echo $sn; ?>)" <?php } ?> disabled /></td>	
	  
	  <td class="tdc" style="background-color:#FFFFB0;"><input class="inpr" style="background-color:#FFFFB0;color:#0080FF;font-weight:bold;" id="PISCtc_<?php echo $sn; ?>" name="PISCtc_<?php echo $sn; ?>" value="<?php echo floatval($H5I); ?>" onKeyPress="return isNumberKey(event)" readonly/></td> 
<?php /**************************************** Actual Value Close *********************************/ ?>
<?php /**************************************** Actual Value Close *********************************/ ?>			
<?php } ?>	

<?php /************************** HOD Proposed Open ************************************************/?>
<?php /************************** HOD Proposed Open ************************************************/?>
<?php $sqlHTotP2=mysql_query("select SUM(Hod_ProIncSalary)as HodTotP2, SUM(Hod_ProCorrSalary)as HodTotP22, SUM(Hod_GrossMonthlySalary)as HodTotP222, SUM(Hod_IncNetMonthalySalary)as HodTotIncS2 from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$CompanyId." AND p.Appraiser_EmployeeID!=0 ".$query." ".$query_y." AND p.Hod_TotalFinalRating=".$resR['Rating'], $con); $resHTotP2=mysql_fetch_array($sqlHTotP2);  
if($resHTotP2['HodTotP2']>0){$HTotP2=$resHTotP2['HodTotP2'];}else{$HTotP2=0;} 
if($resHTotP2['HodTotP22']>0){$HTotP22=$resHTotP2['HodTotP22'];}else{$HTotP22=0;}
if($resHTotP2['HodTotP222']>0){$HTotP222=$resHTotP2['HodTotP222'];}else{$HTotP222=0;} 

if($resHGross>0){ $TotalIncCorr=$HTotP22; $TotalIncProp=$resHTotP2['HodTotIncS2']-$HTotP22; }
else{$TotalIncProp=0; $TotalIncCorr=0;}  	  
$OnePer2=($resHGross*1)/100; 
if($resNOH['NOH']>0 AND $OnePer2>0)
{
 $Inc_Per2P=$TotalIncProp/$OnePer2; $round_PerInc2P=round($Inc_Per2P,2);
 $Inc_Per2C=$TotalIncCorr/$OnePer2; $round_PerInc2C=round($Inc_Per2C,2);
 $Inc_Per2T=$resHTotP2['HodTotIncS2']/$OnePer2; $round_PerInc2T=round($Inc_Per2T,2);
}
else{$round_PerInc2P=0; $round_PerInc2C=0; $round_PerInc2T=0;}
if($resHTotP2['HodTotIncS2']>0){$HTotIncS2=$resHTotP2['HodTotIncS2'];}else{$HTotIncS2=0;} ?>

      <td class="tdr" style="color:#008000;"><?php echo floatval($HTotP2); ?>&nbsp;</td>
	  <td class="tdr" style="color:#008000;"><?php echo floatval($HTotP22); ?>&nbsp;</td>			   
	  <td class="tdr" style="color:#008000;"><?php echo floatval($HTotP222); ?>&nbsp;</td>
      <td class="tdc" style="color:#008000;"><?php echo $round_PerInc2P; ?></td>
      <td class="tdc" style="color:#008000;"><?php echo $round_PerInc2C; ?></td>
      <td class="tdc" style="color:#008000;"><?php echo $round_PerInc2T; ?></td>	   
      <td class="tdr" style="color:#008000;"><?php echo floatval($HTotIncS2); ?>&nbsp;</td>	
<?php /************************** HOD Proposed Close ************************************************/?>
<?php /************************** HOD Proposed Close ************************************************/?>
    </tr>
<?php $sn++; } $no=$sn-1;?><input type="hidden" value="<?php echo $no; ?>" id="RowNo" name="RowNo"/>


<?php //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< ?>
<?php //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< ?>
    <tr style="height:24px;background-color:#C5FF8A;">
     <td colspan="2" class="tdl" style="font-size:14px;">&nbsp;<b>Un-assigned</b></td>
 		   
<?php //Employee //Employee //Employee //Employee //Employee //Employee //Employee //Employee
$sqlEUn=mysql_query("select SUM(EmpCurrGrossPM)as UnEmpGross, SUM(EmpCurrIncentivePM) as UnEmpInct from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$CompanyId." ".$query." ".$query_y." AND p.Appraiser_EmployeeID!=0 AND e.EmpStatus='A' AND p.Dummy_EmpRating=0", $con); $resEUn=mysql_fetch_array($sqlEUn);
$NOEUn=mysql_query("select count(*) as NOEUn from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$CompanyId." ".$query." ".$query_y." AND p.Appraiser_EmployeeID!=0 AND e.EmpStatus='A' AND p.Dummy_EmpRating=0", $con); $resNOEUn=mysql_fetch_assoc($NOEUn); 
if($resEUn['UnEmpGross']>0){ $UnEmpGross=$resEUn['UnEmpGross']+$resEUn['UnEmpInct'];}else{$UnEmpGross=0;} ?>	
<input type="hidden" name="E19" id="E19" value="<?php echo $UnEmpGross; ?>" />	   
      <td class="tdc"><?php echo $resNOEUn['NOEUn']; ?></td>			
	  <td class="tdr"><?php echo $UnEmpGross; ?>&nbsp;</td>
	  
<?php //Appraiser //Appraiser //Appraiser //Appraiser //Appraiser //Appraiser //Appraiser
$sqlAUn=mysql_query("select SUM(EmpCurrGrossPM)as UnAppGross, SUM(EmpCurrIncentivePM) as UnAppInct from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$CompanyId." ".$query." ".$query_y." AND p.Appraiser_EmployeeID!=0 AND e.EmpStatus='A' AND p.Dummy_AppRating=0", $con); $resAUn=mysql_fetch_array($sqlAUn);
$NOAUn=mysql_query("select count(*) as NOAUn from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$CompanyId." ".$query." ".$query_y." AND p.Appraiser_EmployeeID!=0 AND e.EmpStatus='A' AND p.Dummy_AppRating=0", $con); $resNOAUn=mysql_fetch_assoc($NOAUn); 
if($resAUn['UnAppGross']>0){ $UnAppGross=$resAUn['UnAppGross']+$resAUn['UnAppInct'];}else{$UnAppGross=0;} ?>	
<input type="hidden" name="A19" id="A19" value="<?php echo $UnAppGross; ?>" />	   
      <td class="tdc"><?php echo $resNOAUn['NOAUn']; ?></td>			
	  <td class="tdr"><?php echo $UnAppGross; ?>&nbsp;</td>
		
<?php //Reviewer //Reviewer //Reviewer //Reviewer //Reviewer //Reviewer //Reviewer //Reviewer
$sqlRUn=mysql_query("select SUM(EmpCurrGrossPM)as UnRevGross, SUM(EmpCurrIncentivePM) as UnRevInct from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$CompanyId." ".$query." ".$query_y." AND p.Appraiser_EmployeeID!=0 AND e.EmpStatus='A' AND p.Dummy_RevRating=0", $con); $resRUn=mysql_fetch_array($sqlRUn);
$NORUn=mysql_query("select count(*) as NORUn from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$CompanyId." ".$query." ".$query_y." AND p.Appraiser_EmployeeID!=0 AND e.EmpStatus='A' AND p.Dummy_RevRating=0", $con); $resNORUn=mysql_fetch_assoc($NORUn); 
if($resRUn['UnRevGross']>0){ $UnRevGross=$resRUn['UnRevGross']+$resRUn['UnRevInct'];}else{$UnRevGross=0;} ?>	
<input type="hidden" name="R19" id="R19" value="<?php echo $UnRevGross; ?>" />	   
      <td class="tdc"><?php echo $resNORUn['NORUn']; ?></td>			
	  <td class="tdr"><?php echo $UnRevGross; ?>&nbsp;</td>	

<?php //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD
$sqlHUn=mysql_query("select SUM(EmpCurrGrossPM)as UnHodGross, SUM(EmpCurrIncentivePM) as UnHodInct, SUM(EmpCurrCtc) as UnHodTCtc from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$CompanyId." ".$query." ".$query_y." AND p.Appraiser_EmployeeID!=0 AND e.EmpStatus='A' AND p.Dummy_HodRating=0", $con); $resHUn=mysql_fetch_array($sqlHUn);
$NOHUn=mysql_query("select count(*) as NOHUn from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$CompanyId." ".$query." ".$query_y." AND p.Appraiser_EmployeeID!=0 AND e.EmpStatus='A' AND p.Dummy_HodRating=0", $con); $resNOHUn=mysql_fetch_assoc($NOHUn); 
if($resHUn['UnHodGross']>0){ $UnHodGross=$resHUn['UnHodGross']+$resHUn['UnHodInct'];}else{$UnHodGross=0;} 
if($resHUn['UnHodTCtc']>0){$UnHodCtc=$resHUn['UnHodTCtc'];}else{$UnHodCtc=0;} ?>	
<input type="hidden" name="H19" id="H19" value="<?php echo $UnHodGross; ?>" />	
<input type="hidden" name="HCtc19" id="HCtc19" value="<?php echo $UnHodCtc; ?>" />	   
      <td class="tdc"><?php echo $resNOHUn['NOHUn']; ?></td>			
	  <td class="tdr"><?php echo $UnHodGross; ?>&nbsp;</td>
	  <td class="tdr"><?php echo floatval($UnHodCtc); ?>&nbsp;</td>	

			   
<?php /**************************************** Dummy Start *********************************/ ?>	
<?php /**************************************** Dummy Start *********************************/ ?>	
<?php if($UnHodGross>0){ $IncpGross=($UnHodGross*130)/100; $Un_IncS=($UnHodGross*30)/100; }
      elseif($UnRevGross>0){ $IncpGross=($UnRevGross*130)/100; $Un_IncS=($UnRevGross*30)/100; } 
	  elseif($UnAppGross>0){ $IncpGross=($UnAppGross*130)/100; $Un_IncS=($UnAppGross*30)/100; }
	  elseif($UnEmpGross>0){ $IncpGross=($UnEmpGross*130)/100; $Un_IncS=($UnEmpGross*30)/100; }   

        $UnTDCtc=($UnHodCtc*30)/100;
        $GrossTDUnCtc=round($UnHodCtc+$UnTDCtc);
        if($GrossTDUnCtc>0){$HUn5I=$GrossTDUnCtc;}else{$HUn5I=0;}
?>		  				
      <td class="tdc"><input class="inpr" style="font-weight:bold;background-color:#C5FF8A;" id="UnE_PIS" name="UnE_PIS" value="<?php echo $IncpGross; ?>" readonly/></td>
      <td class="tdc"><input class="inpc" style="font-weight:bold;background-color:#C5FF8A;" id="UnE_PerPIS" name="UnE_PerPIS" value="<?php echo 30; ?>" readonly/></td>
	  <td class="tdc"><input class="inpr" style="font-weight:bold;background-color:#C5FF8A;" id="UnE_PerIncS" name="UnE_PerIncS" value="<?php echo $Un_IncS; ?>" readonly/></td>
	  
	  <td class="tdc"><input class="inpr" style="font-weight:bold;background-color:#C5FF8A;" id="UnE_CtcS" name="UnE_CtcS" value="<?php echo $HUn5I; ?>" readonly/></td>
	  
<?php /**************************************** Dummy Close *********************************/ ?>
<?php /**************************************** Dummy Close *********************************/ ?>		  		

<?php /********************** Un-HOD Actual Total Value Start *********************************/ ?>		
<?php /********************** Un-HOD Actual Total Value Start *********************************/ ?>			   		
      <td class="tdc" colspan="7" style="background-color:#C5FF8A;">&nbsp;</td>
<?php /**************** Un-HOD Actual Total Value Close *********************************/ ?>
<?php /***************** Un-HOD Actual Total Value Close *********************************/ ?>	
	 </tr>   
     <input type="hidden" value="<?php echo $sn; ?>" id="Row2No" name="Row2No"/>
<?php //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< ?>
<?php //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< ?>



<?php /**************************** Without Un assigned Open************************************/?> 
<?php /**************************** Without Un assigned Open************************************/?>
    <tr style="height:24px;background-color:#0076EC;">
     <td colspan="2" class="tdl" style="color:#FFFFFF;font-size:14px;">&nbsp;<b>Total:</b>&nbsp;</td>
	 	   
<?php //Employee //Employee //Employee //Employee //Employee //Employee //Employee //Employee
$sqlET=mysql_query("select SUM(EmpCurrGrossPM)as EmpGross, SUM(EmpCurrIncentivePM) as EmpInct from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.Dummy_EmpRating!=0 AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$CompanyId." ".$query." ".$query_y." AND p.Appraiser_EmployeeID!=0", $con); $resET=mysql_fetch_array($sqlET);
$NOET=mysql_query("select count(*) as NOET from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.Dummy_EmpRating!=0 AND p.CompanyId=".$CompanyId." ".$query." ".$query_y." AND p.Appraiser_EmployeeID!=0", $con); $resNOET=mysql_fetch_array($NOET); $ET=$resET['EmpGross']+$resET['EmpInct']; ?>	
<input type="hidden" name="EmpGrossT" id="EmpGrossT" value="<?php echo floatval($ET+$UnEmpGross); ?>" />		
     <td class="tdc" style="color:#FFFFFF;"><b><?php echo $resNOET['NOET']+$resNOEUn['NOEUn']; ?></b></td>   			   
	 <td class="tdr" style="color:#FFFFFF;"><b><?php echo floatval($ET+$UnEmpGross); ?></b>&nbsp;</td>

<?php //Appraiser //Appraiser //Appraiser //Appraiser //Appraiser //Appraiser //Appraiser 
$sqlAT=mysql_query("select SUM(EmpCurrGrossPM)as AppGross, SUM(EmpCurrIncentivePM) as AppInct from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.Dummy_AppRating!=0 AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$CompanyId." ".$query." ".$query_y." AND p.Appraiser_EmployeeID!=0", $con); $resAT=mysql_fetch_array($sqlAT);
$NOAT=mysql_query("select count(*) as NOAT from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.Dummy_AppRating!=0 AND p.CompanyId=".$CompanyId." ".$query." ".$query_y." AND p.Appraiser_EmployeeID!=0", $con); $resNOAT=mysql_fetch_array($NOAT); $AT=$resAT['AppGross']+$resAT['AppInct']; ?>	
<input type="hidden" name="AppGrossT" id="AppGrossT" value="<?php echo floatval($AT+$UnAppGross); ?>" />		
     <td class="tdc" style="color:#FFFFFF;"><b><?php echo $resNOAT['NOAT']+$resNOAUn['NOAUn']; ?></b></td>   			   
	 <td class="tdr" style="color:#FFFFFF;"><b><?php echo floatval($AT+$UnAppGross); ?></b>&nbsp;</td> 

<?php //Reviewer //Reviewer //Reviewer //Reviewer //Reviewer //Reviewer //Reviewer //Reviewer 
$sqlRT=mysql_query("select SUM(EmpCurrGrossPM)as RevGross, SUM(EmpCurrIncentivePM) as RevInct from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.Dummy_RevRating!=0 AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$CompanyId." ".$query." ".$query_y." AND p.Appraiser_EmployeeID!=0", $con); $resRT=mysql_fetch_array($sqlRT);
$NORT=mysql_query("select count(*) as NORT from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.Dummy_RevRating!=0 AND p.CompanyId=".$CompanyId." ".$query." ".$query_y." AND p.Appraiser_EmployeeID!=0", $con); $resNORT=mysql_fetch_array($NORT); $RT=$resRT['RevGross']+$resRT['RevInct']; ?>	
<input type="hidden" name="RevGrossT" id="RevGrossT" value="<?php echo floatval($RT+$UnRevGross); ?>" />		
     <td class="tdc" style="color:#FFFFFF;"><b><?php echo $resNORT['NORT']+$resNORUn['NORUn']; ?></b></td>   			   
	 <td class="tdr" style="color:#FFFFFF;"><b><?php echo floatval($RT+$UnRevGross); ?></b>&nbsp;</td>
		
<?php //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD 
$sqlHT=mysql_query("select SUM(EmpCurrGrossPM)as HodGross, SUM(EmpCurrIncentivePM) as HodInct, SUM(EmpCurrCtc) as HodTCtc from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.Dummy_HodRating!=0 AND p.AssessmentYear=".$_REQUEST['YI']." AND p.CompanyId=".$CompanyId." ".$query." ".$query_y." AND p.Appraiser_EmployeeID!=0", $con); $resHT=mysql_fetch_array($sqlHT);
$NOHT=mysql_query("select count(*) as NOHT from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.Dummy_HodRating!=0 AND p.CompanyId=".$CompanyId." ".$query." ".$query_y." AND p.Appraiser_EmployeeID!=0", $con); $resNOHT=mysql_fetch_array($NOHT); $HT=$resHT['HodGross']+$resHT['HodInct']; ?>	
<input type="hidden" name="HodGrossT" id="HodGrossT" value="<?php echo floatval($HT+$UnHodGross); ?>" />
<input type="hidden" name="HodCtcT" id="HodCtcT" value="<?php echo floatval($resHT['HodTCtc']+$UnHodCtc); ?>" />		
     <td class="tdc" style="color:#FFFFFF;"><b><?php echo $resNOHT['NOHT']+$resNORUn['NOHUn']; ?></b></td>   			   
	 <td class="tdr" style="color:#FFFFFF;"><b><?php echo floatval($HT+$UnHodGross); ?></b>&nbsp;</td>
	 <td class="tdr" style="color:#FFFFFF;"><b><?php echo floatval($resHT['HodTCtc']+$UnHodCtc); ?></b>&nbsp;</td>	
	 		   

<?php if(date("Y-m-d")>=date('Y-01-01') AND date("Y-m-d")<date('Y-03-01') AND $_REQUEST['YI']==$YearId){ 
                                                        //<date('Y-02-01') ?>	
<?php /**************************************** Dummy Start *********************************/ ?>	
<?php /**************************************** Dummy Start *********************************/ ?>			   

<?php $sql4I=mysql_query("select TIncGross,TPerInc,TInc from hrm_pms_dummy_increment_untot where YearId=".$_REQUEST['YI']." AND ".$ExtQuery." AND CompanyId=".$CompanyId, $con); $res4I=mysql_fetch_array($sql4I); 
      $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross, SUM(EmpCurrIncentivePM) as DeptInct, SUM(EmpCurrCtc) as HotDeptCtc from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND (p.Dummy_EmpRating!=0 AND p.Dummy_AppRating!=0 AND p.Dummy_RevRating!=0 AND p.Dummy_HodRating!=0) AND p.CompanyId=".$CompanyId." ".$query." ".$query_y." AND p.Appraiser_EmployeeID!=0", $con); $resD=mysql_fetch_assoc($sqlD);
      $Pre_GrossValue=$resD['DeptTotGross']+$resD['DeptInct'];
	  $Pre_Ctc=$resD['HotDeptCtc'];
	 
	   if($_REQUEST['action']=='Over')
       {	
		if($res4I['TIncGross']>0){$H222I=$res4I['TIncGross'];}else{$H222I=0;} 
	    if($res4I['TPerInc']>0){$H333I=$res4I['TPerInc'];}else{$H333I=0;}
	    if($res4I['TInc']>0){$H444I=$res4I['TInc'];}else{$H444I=0;}
	   }
	   else
	   {
		$IncD=($Pre_GrossValue*$res4I['TPerInc'])/100;
		$GrossD=$Pre_GrossValue+$IncD;
		$OnePerD=($Pre_GrossValue*1)/100;
		if($OnePerD>0){$PerD=$IncD/$OnePerD;}else{$PerD=0;}
		if($GrossD>0){$H222I=round($GrossD,2);}else{$H222I=0;} 
	    if($PerD>0){$H333I=round($PerD,2);}else{$H333I=0;}
	    if($IncD>0){$H444I=round($IncD,2);}else{$H444I=0;}
	   }
	   
	   $IncTDCtc=($Pre_Ctc*$H333I)/100;
       $GrossTDCtc=round($Pre_Ctc+$IncTDCtc);
       if($GrossTDCtc>0){$H555I=$GrossTDCtc;}else{$H555I=0;} //echo 'aaaa';
?>			   	

      <td class="tdc"><input class="inpr" style="font-weight:bold;background-color:#0076EC;color:#FFFFFF;" id="PIST" name="PIST" value="<?php echo $H222I; ?>" readonly/></td>
	  <td class="tdc"><input class="inpc" style="font-weight:bold;background-color:#0076EC;color:#FFFFFF;" id="PerIST" name="PerIST" value="<?php echo $H333I; ?>" readonly/></td>
	  <td class="tdc"><input class="inpr" style="font-weight:bold;background-color:#0076EC;color:#FFFFFF;" id="IncST" name="IncST" value="<?php echo $H444I; ?>" readonly/></td>
	  
	  <td class="tdc"><input class="inpr" style="font-weight:bold;background-color:#0076EC;color:#FFFFFF;" id="PISCtcT" name="PISCtcT" value="<?php echo floatval($H555I); ?>" readonly/></td> 
	  
 
<?php /**************************************** Dummy Close *********************************/ ?>
<?php /**************************************** Dummy Close *********************************/ ?>		  		   
<?php } else { ?>
<?php /**************************************** Actual Value Start *********************************/ ?>		
<?php /**************************************** Actual Value Start *********************************/ ?>			   
<?php $sqlHTotPT=mysql_query("select SUM(HR_GrossMonthlySalary)as HodTotP, SUM(HR_IncNetMonthalySalary)as HodTotIncS, SUM(EmpCurrCtc) as HotDeptCtc from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND (p.Dummy_EmpRating!=0 AND p.Dummy_AppRating!=0 AND p.Dummy_RevRating!=0 AND p.Dummy_HodRating!=0) AND p.CompanyId=".$CompanyId." ".$query." ".$query_y." AND p.Appraiser_EmployeeID!=0", $con); $resHTotPT=mysql_fetch_array($sqlHTotPT);
if($resHTotPT['HodTotP']>0){$HTotPT=$resHTotPT['HodTotP'];}else{$HTotPT=0;}

$OnePerT=($HT*1)/100; 
if($resHTotPT['HodTotIncS']>0 AND $OnePerT>0){$Inc_PerT=$resHTotPT['HodTotIncS']/$OnePerT;} else {$Inc_PerT=0;}
$round_PerIncT=round($Inc_PerT,2);
if($resHTotPT['HodTotIncS']>0){$HTotIncST=$resHTotPT['HodTotIncS'];}else{$HTotIncST=0;} 

$Pre_Ctc=$resD['HotDeptCtc'];
$IncTDCtc=($Pre_Ctc*$Inc_PerT)/100;
$GrossTDCtc=round($Pre_Ctc+$IncTDCtc);
if($GrossTDCtc>0){$H555I=$GrossTDCtc;}else{$H555I=0;}
?>
      <td class="tdc"><input class="inpr" style="font-weight:bold;background-color:#0076EC;color:#FFFFFF;" id="PIST" name="PIST" value="<?php echo floatval($HTotPT); ?>" readonly/></td>
	  <td class="tdc"><input class="inpc" style="font-weight:bold;background-color:#0076EC;color:#FFFFFF;" id="PerIST" name="PerIST" value="<?php echo floatval($round_PerIncT); ?>" readonly/></td>
	  <td class="tdc"><input class="inpr" style="font-weight:bold;background-color:#0076EC;color:#FFFFFF;" id="IncST" name="IncST" value="<?php echo floatval($HTotIncST); ?>" readonly/></td>	
	  <td class="tdc"><input class="inpr" style="font-weight:bold;background-color:#0076EC;color:#FFFFFF;" id="PISCtcT" name="PISCtcT" value="<?php echo floatval($H555I); ?>" readonly/></td>	
	  	   
<?php /**************************************** Actual Value Close *********************************/ ?>
<?php /**************************************** Actual Value Close *********************************/ ?>			
<?php } ?>	

<?php /*************************** HOD Actual Total Value Start *********************************/ ?>		
<?php /*************************** HOD Actual Total Value Start *********************************/ ?>
<?php $sqlHTotPT2=mysql_query("select SUM(Hod_ProIncSalary)as HodTotP2, SUM(Hod_ProCorrSalary)as HodTotP22, SUM(Hod_GrossMonthlySalary)as HodTotP222, SUM(Hod_IncNetMonthalySalary)as HodTotIncS2 from hrm_employee_pms p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.Hod_TotalFinalRating!=0 AND p.CompanyId=".$CompanyId." ".$query." ".$query_y." AND p.Appraiser_EmployeeID!=0", $con); $resHTotPT2=mysql_fetch_array($sqlHTotPT2);

if($resHTotPT2['HodTotP2']>0){$HTotPT2=$resHTotPT2['HodTotP2'];}else{$HTotPT2=0;}
if($resHTotPT2['HodTotP22']>0){$HTotPT22=$resHTotPT2['HodTotP22'];}else{$HTotPT22=0;}
if($resHTotPT2['HodTotP222']>0){$HTotPT222=$resHTotPT2['HodTotP222'];}else{$HTotPT222=0;}

if($HT>0){ $TotalIncPropT=$HTotPT2-$HT;  $TotalIncCorrT=$HTotPT22;} else{$TotalIncPropT=0; $TotalIncCorrT=0;}
$OnePerT2=($HT*1)/100;
$Inc_Per2PT=$TotalIncPropT/$OnePerT2; $round_PerInc2PT=round($Inc_Per2PT,2);
$Inc_Per2CT=$TotalIncCorrT/$OnePerT2; $round_PerInc2CT=round($Inc_Per2CT,2);
$TotInc=$TotalIncPropT+$TotalIncCorrT;
$Inc_Per2TT=$TotInc/$OnePerT2; $round_PerInc2TT=round($Inc_Per2TT,2);
if($TotInc>0){$HTotIncST2=$TotInc;}else{$HTotIncST2=0;} ?>	
      <td class="tdr" style="color:#FFFFFF;"><?php echo floatval($HTotPT2); ?>&nbsp;</td>
      <td class="tdr" style="color:#FFFFFF;"><?php echo floatval($HTotPT22); ?>&nbsp;</td>
      <td class="tdr" style="color:#FFFFFF;"><?php echo floatval($HTotPT222); ?>&nbsp;</td>
      <td class="tdc" style="color:#FFFFFF;"><?php echo $round_PerInc2PT; ?></td>
      <td class="tdc" style="color:#FFFFFF;"><?php echo $round_PerInc2CT; ?></td>
      <td class="tdc" style="color:#FFFFFF;"><?php echo $round_PerInc2TT; ?></td>
      <td class="tdr" style="color:#FFFFFF;"><?php echo floatval($HTotIncST2); ?>&nbsp;</td>
<?php /**************************************** HOD Actual Total Value Close *********************************/ ?>
<?php /**************************************** HOD Actual Total Value Close *********************************/ ?>	
	 </tr> 
<?php /**************************** Without Un assigned Close ************************************/?> 
<?php /**************************** Without Un assigned Close ************************************/?> 

    </table> 
	</td>
   </tr>
   </table>
   </tr>
  </table>
</form>		
   </td>
  </tr>		  
  </table>
 </td>
</tr> 
</table>
<?php //******************************************************************** ?>
<?php } ?>
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