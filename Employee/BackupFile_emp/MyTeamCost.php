<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
$sqlSch=mysql_query("select * from hrm_pms_appdate where AssessmentYear=".$_REQUEST['YI']." AND CompanyId=".$CompanyId, $con); 
$resSch=mysql_fetch_assoc($sqlSch); $CuDate=date("Y-m-d");

if(isset($_POST['SaveValue']))
{
 for($i=1; $i<=$_POST['RowNo']; $i++)
 { 
  $sql=mysql_query("select * from hrm_pms_dummy_increment where YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=".$_POST['Rat_'.$i], $con); $row=mysql_num_rows($sql);
  if($row>0)
  { $sqlU=mysql_query("update hrm_pms_dummy_increment set EmpValue='".$_POST['EmpGross_'.$i]."', AppValue='".$_POST['AppGross_'.$i]."', RevValue='".$_POST['RevGross_'.$i]."', HodValue='".$_POST['HodGross_'.$i]."', IncGross='".$_POST['PIS_'.$i]."', PerInc='".$_POST['PerIS_'.$i]."', Inc='".$_POST['IncS_'.$i]."', CreatedBy=".$EmployeeId.", CreatedDate='".date("Y-m-d")."' where YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=".$_POST['Rat_'.$i]."", $con); }
  if($row==0)
  { $sqlU=mysql_query("insert into hrm_pms_dummy_increment(YearId, CompanyId, Rating, EmpValue, AppValue, RevValue, HodValue, IncGross, PerInc, Inc, CreatedBy, CreatedDate)values(".$YearId.", ".$CompanyId.", '".$_POST['Rat_'.$i]."', '".$_POST['EmpGross_'.$i]."', '".$_POST['AppGross_'.$i]."', '".$_POST['RevGross_'.$i]."', '".$_POST['HodGross_'.$i]."', '".$_POST['PIS_'.$i]."', '".$_POST['PerIS_'.$i]."', '".$_POST['IncS_'.$i]."', ".$EmployeeId.", '".date("Y-m-d")."')", $con); }
 }
 
  $sql2=mysql_query("select * from hrm_pms_dummy_increment_un where YearId=".$YearId." AND CompanyId=".$CompanyId, $con); $row2=mysql_num_rows($sql2);
  if($row2>0)
  { $sqlU2=mysql_query("update hrm_pms_dummy_increment_un set EmpValue='".$_POST['UnEmpGross']."', AppValue='".$_POST['UnAppGross']."', RevValue='".$_POST['UnRevGross']."', HodValue='".$_POST['UnHodGross']."', IncGross='".$_POST['UnPIS']."', PerInc='".$_POST['UnPerIS']."', Inc='".$_POST['UnIncS']."', CreatedBy=".$EmployeeId.", CreatedDate='".date("Y-m-d")."' where YearId=".$YearId." AND CompanyId=".$CompanyId, $con); }
  if($row2==0)
  { $sqlU2=mysql_query("insert into hrm_pms_dummy_increment_un(YearId, CompanyId, EmpValue, AppValue, RevValue, HodValue, IncGross, PerInc, Inc, CreatedBy, CreatedDate)values(".$YearId.", ".$CompanyId.", '".$_POST['UnEmpGross']."', '".$_POST['UnAppGross']."', '".$_POST['UnRevGross']."', '".$_POST['UnHodGross']."', '".$_POST['UnPIS']."', '".$_POST['UnPerIS']."', '".$_POST['UnIncS']."', ".$EmployeeId.", '".date("Y-m-d")."')", $con); }
  
  $sql3=mysql_query("select * from hrm_pms_dummy_increment_untot where YearId=".$YearId." AND CompanyId=".$CompanyId, $con); $row3=mysql_num_rows($sql3);
  if($row3>0)
  { $sqlU3=mysql_query("update hrm_pms_dummy_increment_untot set TEmpValue='".$_POST['EmpGrossT']."', TAppValue='".$_POST['AppGrossT']."', TRevValue='".$_POST['RevGrossT']."', THodValue='".$_POST['HodGrossT']."', TIncGross='".$_POST['PIST']."', TPerInc='".$_POST['PerIST']."', TInc='".$_POST['IncST']."', CreatedBy=".$EmployeeId.", CreatedDate='".date("Y-m-d")."' where YearId=".$YearId." AND CompanyId=".$CompanyId, $con); }
  if($row3==0)
  { $sqlU3=mysql_query("insert into hrm_pms_dummy_increment_untot(YearId, CompanyId, TEmpValue, TAppValue, TRevValue, THodValue, TIncGross, TPerInc, TInc, CreatedBy, CreatedDate)values(".$YearId.", ".$CompanyId.", '".$_POST['EmpGrossT']."', '".$_POST['AppGrossT']."', '".$_POST['RevGrossT']."', '".$_POST['HodGrossT']."', '".$_POST['PIST']."', '".$_POST['PerIST']."', '".$_POST['IncST']."', ".$EmployeeId.", '".date("Y-m-d")."')", $con); }

  if($sqlU){echo '<script>alert("Data saved successfully..!");</script>'; }
}

?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>

<style>.font4 { color:#1FAD34; font-family:Times New Roman; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
.All_40{font-size:11px; height:20px; width:40px;} .All_50{font-size:11px; height:20px; width:50px;} .All_70{font-size:11px; height:20px; width:70px;} .All_80{font-size:11px; height:20px; width:80px;}.All_100{font-size:11px; height:20px; width:100px;} .All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} .All_60{font-size:11px; height:20px; width:60px;}
.All_150{font-size:11px; height:20px; width:150px;}.All_170{font-size:11px; height:20px; width:170px;}.All_180{font-size:11px; height:20px; width:180px;}.All_190{font-size:11px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} .All_250{font-size:11px; height:20px; width:450px;}.All_360{font-size:11px; height:20px; width:350px;}.All_540{font-size:11px; height:20px; width:540px;}.All_400{font-size:11px; height:20px; width:400px;} .All_600{font-size:11px; height:20px; width:600px;}
</style>

<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function SelectYear(YId){
var VS=document.getElementById("Value").value; var v=document.getElementById("mainV").value;
window.location='MyTeamCost.php?action='+VS+'&value='+v+'&YI='+YId;
}
function SelectDept(v)
{ var YId=document.getElementById("YId").value;
  if(v!='Over'){ window.location='MyTeamCost.php?action=Dept&value='+v+'&YI='+YId; }
  else if(v=='Over'){ window.location='MyTeamCost.php?action='+v+'&YI='+YId; }
}
function SelectHod(v){ var YId=document.getElementById("YId").value; window.location='MyTeamCost.php?action=Hod&value='+v+'&YI='+YId;}

function isNumberKey(evt)
{ var charCode = (evt.which) ? evt.which : evt.keyCode;
  if(charCode!= 46 && charCode>31 && (charCode<48 || charCode>57)){ return false; return true; }
}

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

var TotHod_GS = parseFloat(document.getElementById("HodGrossT").value); 
var TotHod_NetIncGS = parseFloat(document.getElementById("PIST").value); 
var TotHod_PerGS = parseFloat(document.getElementById("PerIST").value);
var TotHod_IncGS = parseFloat(document.getElementById("IncST").value);
var TOnePer=Math.round(((TotHod_GS*1)/100)*100)/100; 
for(var i=1; i<=RowNo; i++)
{ var a=document.getElementById("PISValue_"+i).value=parseFloat(document.getElementById("PIS_"+i).value);
  var b=document.getElementById("PerISValue_"+i).value=parseFloat(document.getElementById("PerIS_"+i).value);
  var c=document.getElementById("IncSValue_"+i).value=parseFloat(document.getElementById("IncS_"+i).value);
} 

var TotPIS=parseFloat(document.getElementById("PISValue_1").value)+parseFloat(document.getElementById("PISValue_2").value)+parseFloat(document.getElementById("PISValue_3").value)+parseFloat(document.getElementById("PISValue_4").value)+parseFloat(document.getElementById("PISValue_5").value)+parseFloat(document.getElementById("PISValue_6").value)+parseFloat(document.getElementById("PISValue_7").value)+parseFloat(document.getElementById("PISValue_8").value)+parseFloat(document.getElementById("PISValue_9").value)+parseFloat(document.getElementById("PISValue_10").value)+parseFloat(document.getElementById("PISValue_11").value)+parseFloat(document.getElementById("PISValue_12").value)+parseFloat(document.getElementById("PISValue_13").value)+parseFloat(document.getElementById("PISValue_14").value)+parseFloat(document.getElementById("PISValue_15").value)+parseFloat(document.getElementById("PISValue_16").value)+parseFloat(document.getElementById("PISValue_17").value)+parseFloat(document.getElementById("PISValue_18").value);
var TotIncS=parseFloat(document.getElementById("IncSValue_1").value)+parseFloat(document.getElementById("IncSValue_2").value)+parseFloat(document.getElementById("IncSValue_3").value)+parseFloat(document.getElementById("IncSValue_4").value)+parseFloat(document.getElementById("IncSValue_5").value)+parseFloat(document.getElementById("IncSValue_6").value)+parseFloat(document.getElementById("IncSValue_7").value)+parseFloat(document.getElementById("IncSValue_8").value)+parseFloat(document.getElementById("IncSValue_9").value)+parseFloat(document.getElementById("IncSValue_10").value)+parseFloat(document.getElementById("IncSValue_11").value)+parseFloat(document.getElementById("IncSValue_12").value)+parseFloat(document.getElementById("IncSValue_13").value)+parseFloat(document.getElementById("IncSValue_14").value)+parseFloat(document.getElementById("IncSValue_15").value)+parseFloat(document.getElementById("IncSValue_16").value)+parseFloat(document.getElementById("IncSValue_17").value)+parseFloat(document.getElementById("IncSValue_18").value); 

//var Hod_NetIncGS = parseFloat(document.getElementById("UnPIS").value); 
//var Hod_PerGS = parseFloat(document.getElementById("UnPerIS").value);
//var Hod_IncGS = parseFloat(document.getElementById("UnIncS").value);

var Hod_NetIncGS = 0; 
var Hod_PerGS = 0;
var Hod_IncGS = 0;

var Tot_NetIncGS = document.getElementById("PIST").value=Math.round((Hod_NetIncGS+TotPIS)*100)/100; 
var Tot_IncGS = document.getElementById("IncST").value=Math.round((Hod_IncGS+TotIncS)*100)/100; 
var Tot_PerGS = document.getElementById("PerIST").value=Math.round((Tot_IncGS/TOnePer)*100)/100;

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

var TotHod_GS = parseFloat(document.getElementById("HodGrossT").value); 
var TotHod_NetIncGS = parseFloat(document.getElementById("PIST").value); 
var TotHod_PerGS = parseFloat(document.getElementById("PerIST").value);
var TotHod_IncGS = parseFloat(document.getElementById("IncST").value);
var TOnePer=Math.round(((TotHod_GS*1)/100)*100)/100; 
for(var i=1; i<=RowNo; i++)
{ var a=document.getElementById("PISValue_"+i).value=parseFloat(document.getElementById("PIS_"+i).value);
  var b=document.getElementById("PerISValue_"+i).value=parseFloat(document.getElementById("PerIS_"+i).value);
  var c=document.getElementById("IncSValue_"+i).value=parseFloat(document.getElementById("IncS_"+i).value);
} 

var TotPIS=parseFloat(document.getElementById("PISValue_1").value)+parseFloat(document.getElementById("PISValue_2").value)+parseFloat(document.getElementById("PISValue_3").value)+parseFloat(document.getElementById("PISValue_4").value)+parseFloat(document.getElementById("PISValue_5").value)+parseFloat(document.getElementById("PISValue_6").value)+parseFloat(document.getElementById("PISValue_7").value)+parseFloat(document.getElementById("PISValue_8").value)+parseFloat(document.getElementById("PISValue_9").value)+parseFloat(document.getElementById("PISValue_10").value)+parseFloat(document.getElementById("PISValue_11").value)+parseFloat(document.getElementById("PISValue_12").value)+parseFloat(document.getElementById("PISValue_13").value)+parseFloat(document.getElementById("PISValue_14").value)+parseFloat(document.getElementById("PISValue_15").value)+parseFloat(document.getElementById("PISValue_16").value)+parseFloat(document.getElementById("PISValue_17").value)+parseFloat(document.getElementById("PISValue_18").value);
var TotIncS=parseFloat(document.getElementById("IncSValue_1").value)+parseFloat(document.getElementById("IncSValue_2").value)+parseFloat(document.getElementById("IncSValue_3").value)+parseFloat(document.getElementById("IncSValue_4").value)+parseFloat(document.getElementById("IncSValue_5").value)+parseFloat(document.getElementById("IncSValue_6").value)+parseFloat(document.getElementById("IncSValue_7").value)+parseFloat(document.getElementById("IncSValue_8").value)+parseFloat(document.getElementById("IncSValue_9").value)+parseFloat(document.getElementById("IncSValue_10").value)+parseFloat(document.getElementById("IncSValue_11").value)+parseFloat(document.getElementById("IncSValue_12").value)+parseFloat(document.getElementById("IncSValue_13").value)+parseFloat(document.getElementById("IncSValue_14").value)+parseFloat(document.getElementById("IncSValue_15").value)+parseFloat(document.getElementById("IncSValue_16").value)+parseFloat(document.getElementById("IncSValue_17").value)+parseFloat(document.getElementById("IncSValue_18").value); 

//var Hod_NetIncGS = parseFloat(document.getElementById("UnPIS").value); 
//var Hod_PerGS = parseFloat(document.getElementById("UnPerIS").value);
//var Hod_IncGS = parseFloat(document.getElementById("UnIncS").value);

var Hod_NetIncGS =0; 
var Hod_PerGS = 0;
var Hod_IncGS = 0;

var Tot_NetIncGS = document.getElementById("PIST").value=Math.round((Hod_NetIncGS+TotPIS)*100)/100; 
var Tot_IncGS = document.getElementById("IncST").value=Math.round((Hod_IncGS+TotIncS)*100)/100;  
var Tot_PerGS = document.getElementById("PerIST").value=Math.round((Tot_IncGS/TOnePer)*100)/100;
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

var TotHod_GS = parseFloat(document.getElementById("HodGrossT").value); 
var TotHod_NetIncGS = parseFloat(document.getElementById("PIST").value); 
var TotHod_PerGS = parseFloat(document.getElementById("PerIST").value);
var TotHod_IncGS = parseFloat(document.getElementById("IncST").value);
var TOnePer=Math.round(((TotHod_GS*1)/100)*100)/100; 
for(var i=1; i<=RowNo; i++)
{ var a=document.getElementById("PISValue_"+i).value=parseFloat(document.getElementById("PIS_"+i).value);
  var b=document.getElementById("PerISValue_"+i).value=parseFloat(document.getElementById("PerIS_"+i).value);
  var c=document.getElementById("IncSValue_"+i).value=parseFloat(document.getElementById("IncS_"+i).value);
} 

var TotPIS=parseFloat(document.getElementById("PISValue_1").value)+parseFloat(document.getElementById("PISValue_2").value)+parseFloat(document.getElementById("PISValue_3").value)+parseFloat(document.getElementById("PISValue_4").value)+parseFloat(document.getElementById("PISValue_5").value)+parseFloat(document.getElementById("PISValue_6").value)+parseFloat(document.getElementById("PISValue_7").value)+parseFloat(document.getElementById("PISValue_8").value)+parseFloat(document.getElementById("PISValue_9").value)+parseFloat(document.getElementById("PISValue_10").value)+parseFloat(document.getElementById("PISValue_11").value)+parseFloat(document.getElementById("PISValue_12").value)+parseFloat(document.getElementById("PISValue_13").value)+parseFloat(document.getElementById("PISValue_14").value)+parseFloat(document.getElementById("PISValue_15").value)+parseFloat(document.getElementById("PISValue_16").value)+parseFloat(document.getElementById("PISValue_17").value)+parseFloat(document.getElementById("PISValue_18").value);
var TotIncS=parseFloat(document.getElementById("IncSValue_1").value)+parseFloat(document.getElementById("IncSValue_2").value)+parseFloat(document.getElementById("IncSValue_3").value)+parseFloat(document.getElementById("IncSValue_4").value)+parseFloat(document.getElementById("IncSValue_5").value)+parseFloat(document.getElementById("IncSValue_6").value)+parseFloat(document.getElementById("IncSValue_7").value)+parseFloat(document.getElementById("IncSValue_8").value)+parseFloat(document.getElementById("IncSValue_9").value)+parseFloat(document.getElementById("IncSValue_10").value)+parseFloat(document.getElementById("IncSValue_11").value)+parseFloat(document.getElementById("IncSValue_12").value)+parseFloat(document.getElementById("IncSValue_13").value)+parseFloat(document.getElementById("IncSValue_14").value)+parseFloat(document.getElementById("IncSValue_15").value)+parseFloat(document.getElementById("IncSValue_16").value)+parseFloat(document.getElementById("IncSValue_17").value)+parseFloat(document.getElementById("IncSValue_18").value); 

//var Hod_NetIncGS = parseFloat(document.getElementById("UnPIS").value); 
//var Hod_PerGS = parseFloat(document.getElementById("UnPerIS").value);
//var Hod_IncGS = parseFloat(document.getElementById("UnIncS").value);

var Hod_NetIncGS = 0; 
var Hod_PerGS = 0;
var Hod_IncGS = 0;

var Tot_NetIncGS = document.getElementById("PIST").value=Math.round((Hod_NetIncGS+TotPIS)*100)/100; 
var Tot_IncGS = document.getElementById("IncST").value=Math.round((Hod_IncGS+TotIncS)*100)/100; 
var Tot_PerGS = document.getElementById("PerIST").value=Math.round((Tot_IncGS/TOnePer)*100)/100;
}

function OpenUnAssignWin(YI,CI)
{ var VS=document.getElementById("Value").value; var v=document.getElementById("mainV").value;
var win = window.open("UnEmpPMSRating.php?action=UnEmpRat&YI="+YI+"&CI="+CI,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=900,height=600"); 
var timer = setInterval( function() { if(win.closed) { clearInterval(timer);  window.location="MyTeamCost.php?&action="+VS+"&value="+v+"&YI="+YI; } }, 1000);
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

var TotPIS=parseFloat(document.getElementById("PISValue_1").value)+parseFloat(document.getElementById("PISValue_2").value)+parseFloat(document.getElementById("PISValue_3").value)+parseFloat(document.getElementById("PISValue_4").value)+parseFloat(document.getElementById("PISValue_5").value)+parseFloat(document.getElementById("PISValue_6").value)+parseFloat(document.getElementById("PISValue_7").value)+parseFloat(document.getElementById("PISValue_8").value)+parseFloat(document.getElementById("PISValue_9").value)+parseFloat(document.getElementById("PISValue_10").value)+parseFloat(document.getElementById("PISValue_11").value)+parseFloat(document.getElementById("PISValue_12").value)+parseFloat(document.getElementById("PISValue_13").value)+parseFloat(document.getElementById("PISValue_14").value)+parseFloat(document.getElementById("PISValue_15").value)+parseFloat(document.getElementById("PISValue_16").value)+parseFloat(document.getElementById("PISValue_17").value)+parseFloat(document.getElementById("PISValue_18").value);
var TotIncS=parseFloat(document.getElementById("IncSValue_1").value)+parseFloat(document.getElementById("IncSValue_2").value)+parseFloat(document.getElementById("IncSValue_3").value)+parseFloat(document.getElementById("IncSValue_4").value)+parseFloat(document.getElementById("IncSValue_5").value)+parseFloat(document.getElementById("IncSValue_6").value)+parseFloat(document.getElementById("IncSValue_7").value)+parseFloat(document.getElementById("IncSValue_8").value)+parseFloat(document.getElementById("IncSValue_9").value)+parseFloat(document.getElementById("IncSValue_10").value)+parseFloat(document.getElementById("IncSValue_11").value)+parseFloat(document.getElementById("IncSValue_12").value)+parseFloat(document.getElementById("IncSValue_13").value)+parseFloat(document.getElementById("IncSValue_14").value)+parseFloat(document.getElementById("IncSValue_15").value)+parseFloat(document.getElementById("IncSValue_16").value)+parseFloat(document.getElementById("IncSValue_17").value)+parseFloat(document.getElementById("IncSValue_18").value); 

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

var TotPIS=parseFloat(document.getElementById("PISValue_1").value)+parseFloat(document.getElementById("PISValue_2").value)+parseFloat(document.getElementById("PISValue_3").value)+parseFloat(document.getElementById("PISValue_4").value)+parseFloat(document.getElementById("PISValue_5").value)+parseFloat(document.getElementById("PISValue_6").value)+parseFloat(document.getElementById("PISValue_7").value)+parseFloat(document.getElementById("PISValue_8").value)+parseFloat(document.getElementById("PISValue_9").value)+parseFloat(document.getElementById("PISValue_10").value)+parseFloat(document.getElementById("PISValue_11").value)+parseFloat(document.getElementById("PISValue_12").value)+parseFloat(document.getElementById("PISValue_13").value)+parseFloat(document.getElementById("PISValue_14").value)+parseFloat(document.getElementById("PISValue_15").value)+parseFloat(document.getElementById("PISValue_16").value)+parseFloat(document.getElementById("PISValue_17").value)+parseFloat(document.getElementById("PISValue_18").value);

var TotIncS=parseFloat(document.getElementById("IncSValue_1").value)+parseFloat(document.getElementById("IncSValue_2").value)+parseFloat(document.getElementById("IncSValue_3").value)+parseFloat(document.getElementById("IncSValue_4").value)+parseFloat(document.getElementById("IncSValue_5").value)+parseFloat(document.getElementById("IncSValue_6").value)+parseFloat(document.getElementById("IncSValue_7").value)+parseFloat(document.getElementById("IncSValue_8").value)+parseFloat(document.getElementById("IncSValue_9").value)+parseFloat(document.getElementById("IncSValue_10").value)+parseFloat(document.getElementById("IncSValue_11").value)+parseFloat(document.getElementById("IncSValue_12").value)+parseFloat(document.getElementById("IncSValue_13").value)+parseFloat(document.getElementById("IncSValue_14").value)+parseFloat(document.getElementById("IncSValue_15").value)+parseFloat(document.getElementById("IncSValue_16").value)+parseFloat(document.getElementById("IncSValue_17").value)+parseFloat(document.getElementById("IncSValue_18").value); 

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

var TotPIS=parseFloat(document.getElementById("PISValue_1").value)+parseFloat(document.getElementById("PISValue_2").value)+parseFloat(document.getElementById("PISValue_3").value)+parseFloat(document.getElementById("PISValue_4").value)+parseFloat(document.getElementById("PISValue_5").value)+parseFloat(document.getElementById("PISValue_6").value)+parseFloat(document.getElementById("PISValue_7").value)+parseFloat(document.getElementById("PISValue_8").value)+parseFloat(document.getElementById("PISValue_9").value)+parseFloat(document.getElementById("PISValue_10").value)+parseFloat(document.getElementById("PISValue_11").value)+parseFloat(document.getElementById("PISValue_12").value)+parseFloat(document.getElementById("PISValue_13").value)+parseFloat(document.getElementById("PISValue_14").value)+parseFloat(document.getElementById("PISValue_15").value)+parseFloat(document.getElementById("PISValue_16").value)+parseFloat(document.getElementById("PISValue_17").value)+parseFloat(document.getElementById("PISValue_18").value);

var TotIncS=parseFloat(document.getElementById("IncSValue_1").value)+parseFloat(document.getElementById("IncSValue_2").value)+parseFloat(document.getElementById("IncSValue_3").value)+parseFloat(document.getElementById("IncSValue_4").value)+parseFloat(document.getElementById("IncSValue_5").value)+parseFloat(document.getElementById("IncSValue_6").value)+parseFloat(document.getElementById("IncSValue_7").value)+parseFloat(document.getElementById("IncSValue_8").value)+parseFloat(document.getElementById("IncSValue_9").value)+parseFloat(document.getElementById("IncSValue_10").value)+parseFloat(document.getElementById("IncSValue_11").value)+parseFloat(document.getElementById("IncSValue_12").value)+parseFloat(document.getElementById("IncSValue_13").value)+parseFloat(document.getElementById("IncSValue_14").value)+parseFloat(document.getElementById("IncSValue_15").value)+parseFloat(document.getElementById("IncSValue_16").value)+parseFloat(document.getElementById("IncSValue_17").value)+parseFloat(document.getElementById("IncSValue_18").value); 

var Tot_NetIncGS = document.getElementById("PIST").value=Math.round((Hod_NetIncGS2+TotPIS)*100)/100; 
var Tot_IncGS = document.getElementById("IncST").value=Math.round((Hod_IncGS2+TotIncS)*100)/100; 
var Tot_PerGS = document.getElementById("PerIST").value=Math.round((Tot_IncGS/TOnePer)*100)/100;
}

function BtnEdit(v)
{
 var RowNo = document.getElementById("RowNo").value; document.getElementById("edit").style.display='none'; 
 if(v!='Hod' && v!='Dept'){ document.getElementById("save").style.display='block'; }
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
<?php for($i=1; $i<=18; $i++){?>
<input type="hidden" id="PISValue_<?php echo $i; ?>" value="0" />
<input type="hidden" id="PerISValue_<?php echo $i; ?>" value="0" />
<input type="hidden" id="IncSValue_<?php echo $i; ?>" value="0" />
<?php } ?>
<?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
      $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>		
<?php if($_REQUEST['YI']==1){$Y=2012;}elseif($_REQUEST['YI']==2){$Y=2013;}elseif($_REQUEST['YI']==3){$Y=2014;}elseif($_REQUEST['YI']==4){$Y=2015;}elseif($_REQUEST['YI']==5){$Y=2016;}elseif($_REQUEST['YI']==6){$Y=2017;}elseif($_REQUEST['YI']==7){$Y=2018;}elseif($_REQUEST['YI']==8){$Y=2019;}elseif($_REQUEST['YI']==9){$Y=2020;} 

if($_REQUEST['YI']<6){ $Yydate=$Y.'-03-31'; }else{ $Yydate=$Y.'-06-30'; }

?>	  
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
<?php if($EmployeeId==142 OR $EmployeeId==169 OR $EmployeeId==223 OR $EmployeeId==461) { ?>		   
<?php //*************************************************************************************************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>
			     <?php /*?><td id="Anni" valign="top">
				    <table border="0">
						  <tr height="20">
						    <td align="left" valign="top" width="150">
<?php include("EmpImgEmp.php"); ?>
<?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?></td>
						  </tr>
					 </table>
				 </td><?php */?>
				  <td align="left" width="100%" valign="top">
	     <table border="0" width="100%">
		    <tr>
			 <td colspan="10">
			  <table border="0">
			   <tr>
			    <td style="width:190px;font-family:Times New Roman; font-size:14px;" valign="top">&nbsp;<b><u>Dummy Cost Of Team</u> :</b></td>
				<td style="width:100px; height:20px; font-size:14px; font-family:Times New Roman; color:#0061C1; font-weight:bold;" align="center">Financial Year</td>
				<td class="td1" style="font-size:11px; width:100px;" align="center">
                       <select style="font-size:11px; width:98px; height:18px; background-color:#DDFFBB;" name="YearID" id="YearID" onChange="SelectYear(this.value)">
					   <option value="<?php echo $_REQUEST['YI']; ?>" style="margin-left:0px;" selected><?php echo $PRD; ?></option>  
					   
					   <?php if($_REQUEST['YI']!=9){?><option value="9">2020-2021</option><?php } ?><?php if($_REQUEST['YI']!=8){?><option value="8">2019-2020</option><?php } ?>
					   <?php if($_REQUEST['YI']!=7){?><option value="7">2018-2019</option><?php } ?>
					   <?php if($_REQUEST['YI']!=6){?><option value="6">2017-2018</option><?php } ?>
					    <?php if($_REQUEST['YI']!=5){?><option value="5">2016-2017</option><?php } ?>
					    <?php if($_REQUEST['YI']!=4){?><option value="4">2015-2016</option><?php } ?>
						<?php if($_REQUEST['YI']!=3){?><option value="3">2014-2015</option><?php } ?>
						<?php if($_REQUEST['YI']!=2){?><option value="2">2013-2014</option><?php } ?>
					    <?php if($_REQUEST['YI']!=1){?><option value="1">2012-2013</option><?php } ?>
                       </select>
				</td>
				<td class="td1" style="font-size:11px; width:120px;" align="center"><select style="font-size:11px; width:118px; height:18px; background-color:#DDFFBB;" name="DeptInc" id="DeptInc" onChange="SelectDept(this.value)"><option value="" style="margin-left:0px;" selected>Select Department</option><?php $SqlDeptI=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentCode!='MANAGEMENT' order by DepartmentName ASC", $con); while($ResDeptI=mysql_fetch_array($SqlDeptI)) { ?><option value="<?php echo $ResDeptI['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDeptI['DepartmentCode'];?></option><?php } ?><option value="<?php echo 'Over';  ?>">&nbsp;<?php echo 'All'; ?></option></select></td>	
				<td class="td1" style="font-size:11px; width:120px;" align="center"><select style="font-size:11px; width:118px; height:18px; background-color:#DDFFBB;" name="HodInc" id="HodInc" onChange="SelectHod(this.value)"><option value="" style="margin-left:0px;" selected>Select HOD</option><?php $SqlHodI=mysql_query("SELECT HOD_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.HOD_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." GROUP BY HOD_EmployeeID", $con); while($ResHodI=mysql_fetch_array($SqlHodI)) { $EnameHI=$ResHodI['Fname'].' '.$ResHodI['Sname'].' '.$ResHodI['Lname']; ?><option value="<?php echo $ResHodI['HOD_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameHI; ?></option><?php } ?></select></td>
				<td style="width:200px;font-family:Times New Roman; font-size:16px;" valign="top" align="center"><b>
<?php if($_REQUEST['action']=='Over'){echo 'ORGANIZATION WISE';}elseif($_REQUEST['action']=='Dept'){echo 'DEPARTMENT WISE'; }elseif($_REQUEST['action']=='Hod'){echo 'HOD WISE'; } ?>
				</b></td>
			   </tr>
			  </table> 
			 </td>
			</tr>
			<tr>
			<td colspan="12">
<form method="post" name="Nameform">			
			 <table border="1" cellspacing="1">
<?php 
if($_REQUEST['action']=='Over') {$Action='ORGANIZATION';}
elseif($_REQUEST['action']=='Dept')
{$sqlDe=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resDe=mysql_fetch_assoc($sqlDe); 
  $Action='DEPARTMENT:&nbsp;'.$resDe['DepartmentName'];}
elseif($_REQUEST['action']=='Hod')
{ $sqlB=mysql_query("select Fname,Sname,Lname,Gender,Married,DR FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeId=".$_REQUEST['value'], $con); $resB=mysql_fetch_assoc($sqlB); 
  if($resB['DR']=='Y'){$MS='Dr.';} elseif($resB['Gender']=='M'){$MS='Mr.';} elseif($resB['Gender']=='F' AND $resB['Married']=='Y'){$MS='Mrs.';} elseif($resB['Gender']=='F' AND $resB['Married']=='N'){$MS='Miss.';}  $Action='HOD:&nbsp;'.$MS.' '.$resB['Fname'].' '.$resB['Sname'].' '.$resB['Lname'];
}
?>			  <tr bgcolor="#FF8000">	
		       <td colspan="10" align="center" style="font-family:Times New Roman;color:#FFFFFF;font-size:15px; height:20px;"><b><?php echo $Action.'&nbsp;(Year-'.$PRD.')'; ?></b></td>
			   <td colspan="3" align="center" style="font-family:Times New Roman;color:#FFFFFF;font-size:14px; height:20px;">
			    <?php if($_REQUEST['YI']==$YearId){ ?>
				<?php if(date("Y-m-d")>=date('Y-01-01') AND date("Y-m-d")<date('Y-02-28')) { //if($_REQUEST['action']!='Dept' AND $_REQUEST['action']!='Hod') {?>
<input type="button" name="edit" id="edit" value="Edit" onClick="BtnEdit('<?php echo $_REQUEST['action']; ?>')" style="font-family:Times New Roman;font-size:12px;width:60px;background-color:#FFFFFF;display:block;" />
<input type="submit" name="SaveValue" id="save" value="Save" style="font-family:Times New Roman;font-size:12px;width:60px;background-color:#88D28C;display:none;" />
				<?php } } //} ?>
			   </td>
			   <td colspan="7" rowspan="3"align="center" style="font-family:Times New Roman;color:#FFFFFF;font-size:14px; height:20px;">
			    <b>ACTUAL HOD PROPOSED PER MONTH</b>
			   </td>
	          </tr>		 
			  <tr bgcolor="#7a6189">	
		       <td colspan="2" rowspan="2" align="center"  valign="middle" style="color:#FFFFFF;font-size:11px; height:20px;"><?php ?></td>
			   <td colspan="8" align="center" style="color:#FFFFFF;font-size:11px; height:20px;"><b>PREVIOUS GROSS PER MONTH</b></td>
		     <td colspan="3" rowspan="2" align="center"  valign="middle" style="color:#FFFFFF;font-size:11px; height:20px;"><b>PROPOSED PER MONTH</b></td>
	          </tr>
			  <tr bgcolor="#7a6189">	
			   <td colspan="2" align="center" style="color:#FFFFFF;font-size:11px; height:20px;"><b>EMPLOYEE</b></td>
			   <td colspan="2" align="center" style="color:#FFFFFF;font-size:11px; height:20px;"><b>APPRAISER</b></td>
			   <td colspan="2" align="center" style="color:#FFFFFF;font-size:11px; height:20px;"><b>REVIEWER</b></td>
			   <td colspan="2" align="center" style="color:#FFFFFF;font-size:11px; height:20px;"><b>HOD</b></td>
	          </tr>
			  <tr bgcolor="#7a6189">
		       <td align="center" style="color:#FFFFFF;" class="All_50"><b>SNO</b></td>
		       <td align="center" style="color:#FFFFFF;" class="All_60"><b>RATING</b></td>
			   <td align="center" style="color:#FFFFFF;" class="All_50"><b>NOE</b></td>
			   <td align="center" style="color:#FFFFFF;" class="All_100"><b>TOTAL GROSS</b></td>
			   <td align="center" style="color:#FFFFFF;" class="All_50"><b>NOE</b></td>
			   <td align="center" style="color:#FFFFFF;" class="All_100"><b>TOTAL GROSS</b></td>
			   <td align="center" style="color:#FFFFFF;" class="All_50"><b>NOE</b></td>
			   <td align="center" style="color:#FFFFFF;" class="All_100"><b>TOTAL GROSS</b></td>
			   <td align="center" style="color:#FFFFFF;" class="All_50"><b>NOE</b></td>	
			   <td align="center" style="color:#FFFFFF;" class="All_100"><b>TOTAL GROSS</b></td>	
			   
			   <td align="center" style="color:#FFFFFF;" class="All_100"><b>INCREMENT<br>GROSS</b></td>
			   <td align="center" style="color:#FFFFFF;" class="All_60"><b>(%) INC</b></td>
			   <td align="center" style="color:#FFFFFF;" class="All_100"><b>INCREMENT</b></td>
			   	
			   <td align="center" style="color:#FFFFFF;" class="All_100"><b>Praposed<br>GROSS</b></td>
			   <td align="center" style="color:#FFFFFF;" class="All_100"><b>Correction</b></td>
			   <td align="center" style="color:#FFFFFF;" class="All_100"><b>Total Gross</b></td>
			   <td align="center" style="color:#FFFFFF;" class="All_60"><b>(%) Praposed<br>Gross</b></td>
			   <td align="center" style="color:#FFFFFF;" class="All_60"><b>(%)<br>Correction</b></td>
			   <td align="center" style="color:#FFFFFF;" class="All_60"><b>(%) Total</b></td>
			   <td align="center" style="color:#FFFFFF;" class="All_100"><b>INCREMENT</b></td>	
	          </tr>
<?php $sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND RatingStatus='A' order by Rating ASC", $con); 
      $sn=1; while($resR=mysql_fetch_array($sqlR)){ ?>			  
			  <tr bgcolor="#FFFFFF">
		       <td align="center" style="" class="All_50"><?php echo $sn; ?></td>
		       <td align="center" style="" class="All_80"><b><?php echo $resR['Rating']; ?></b>
			   <input type="hidden" name="Rat_<?php echo $sn; ?>" id="Rat_<?php echo $sn; ?>" value="<?php echo $resR['Rating']; ?>" /></td>
			   
<?php //Employee //Employee //Employee //Employee //Employee //Employee //Employee //Employee 
if($_REQUEST['action']=='Over'){ $sqlE=mysql_query("select SUM(EmpCurrGrossPM)as EmpGross, SUM(EmpCurrIncentivePM) as EmpInct from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_EmpRating=".$resR['Rating'], $con); $NOE=mysql_query("SELECT count(*) as NOE from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_EmpRating=".$resR['Rating'], $con); }
	  elseif($_REQUEST['action']=='Dept'){ $sqlE=mysql_query("select SUM(EmpCurrGrossPM)as EmpGross, SUM(EmpCurrIncentivePM) as EmpInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_EmpRating=".$resR['Rating'], $con); $NOE=mysql_query("SELECT count(*) as NOE from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_EmpRating=".$resR['Rating'], $con); }
	  elseif($_REQUEST['action']=='Hod'){ $sqlE=mysql_query("select SUM(EmpCurrGrossPM)as EmpGross, SUM(EmpCurrIncentivePM) as EmpInct from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_EmpRating=".$resR['Rating'], $con); $NOE=mysql_query("SELECT count(*) as NOE from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_EmpRating=".$resR['Rating'], $con); }

?>			   			   			   			   
<?php $resE=mysql_fetch_array($sqlE); $resNOE=mysql_fetch_assoc($NOE); if($resE['EmpGross']>0){$resEGross=$resE['EmpGross']+$resE['EmpInct'];}else{$resEGross=0;} ?>
               <td align="center" style="" class="All_50"><?php echo $resNOE['NOE']; ?></td>			   
			   <td align="right" style="" class="All_100"><?php echo $resEGross; ?>&nbsp;
			    <input type="hidden" name="EmpGross_<?php echo $sn; ?>" id="EmpGross_<?php echo $sn; ?>" value="<?php echo $resEGross; ?>" /></td>
<?php //Appraiser //Appraiser //Appraiser //Appraiser //Appraiser //Appraiser //Appraiser
if($_REQUEST['action']=='Over'){ $sqlA=mysql_query("select SUM(EmpCurrGrossPM)as AppGross, SUM(EmpCurrIncentivePM) as AppInct from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_AppRating=".$resR['Rating'], $con); $NOA=mysql_query("SELECT count(*) as NOA from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_AppRating=".$resR['Rating'], $con);}
	  elseif($_REQUEST['action']=='Dept'){ $sqlA=mysql_query("select SUM(EmpCurrGrossPM)as AppGross, SUM(EmpCurrIncentivePM) as AppInct from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_AppRating=".$resR['Rating'], $con); $NOA=mysql_query("SELECT count(*) as NOA from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_AppRating=".$resR['Rating'], $con);}
	  elseif($_REQUEST['action']=='Hod'){ $sqlA=mysql_query("select SUM(EmpCurrGrossPM)as AppGross, SUM(EmpCurrIncentivePM) as AppInct from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_AppRating=".$resR['Rating'], $con); $NOA=mysql_query("SELECT count(*) as NOA from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_AppRating=".$resR['Rating'], $con);}

?>			   
<?php $resA=mysql_fetch_array($sqlA); $resNOA=mysql_fetch_assoc($NOA); if($resA['AppGross']>0){$resAGross=$resA['AppGross']+$resA['AppInct'];}else{$resAGross=0;} ?>					   
			   <td align="center" style="" class="All_50"><?php echo $resNOA['NOA']; ?></td>
			   <td align="right" style="" class="All_100"><?php echo $resAGross; ?>&nbsp;
			   <input type="hidden" name="AppGross_<?php echo $sn; ?>" id="AppGross_<?php echo $sn; ?>" value="<?php echo $resAGross; ?>" /></td>
		
<?php //Reviewer //Reviewer //Reviewer //Reviewer //Reviewer //Reviewer //Reviewer //Reviewer
if($_REQUEST['action']=='Over'){ $sqlRe=mysql_query("select SUM(EmpCurrGrossPM)as RevGross, SUM(EmpCurrIncentivePM) as RevInct from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_RevRating=".$resR['Rating'], $con); $NOR=mysql_query("SELECT count(*) as NOR from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_RevRating=".$resR['Rating'], $con); }
	  elseif($_REQUEST['action']=='Dept'){ $sqlRe=mysql_query("select SUM(EmpCurrGrossPM)as RevGross, SUM(EmpCurrIncentivePM) as RevInct from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_RevRating=".$resR['Rating'], $con); $NOR=mysql_query("SELECT count(*) as NOR from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_RevRating=".$resR['Rating'], $con); }
	  elseif($_REQUEST['action']=='Hod'){ $sqlRe=mysql_query("select SUM(EmpCurrGrossPM)as RevGross, SUM(EmpCurrIncentivePM) as RevInct from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_RevRating=".$resR['Rating'], $con); $NOR=mysql_query("SELECT count(*) as NOR from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_RevRating=".$resR['Rating'], $con); }

?>
			   
<?php $resRe=mysql_fetch_array($sqlRe); $resNOR=mysql_fetch_assoc($NOR); if($resRe['RevGross']>0){$resRGross=$resRe['RevGross']+$resRe['RevInct'];}else{$resRGross=0;} ?>	
               <td align="center" style="" class="All_50"><?php echo $resNOR['NOR']; ?></td>		   
			   <td align="right" style="" class="All_100"><?php echo $resRGross; ?>&nbsp;
			   <input type="hidden" name="RevGross_<?php echo $sn; ?>" id="RevGross_<?php echo $sn; ?>" value="<?php echo $resRGross; ?>" /></td>	

<?php //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD //HOD
if($_REQUEST['action']=='Over'){ $sqlH=mysql_query("select SUM(EmpCurrGrossPM)as HodGross, SUM(EmpCurrIncentivePM) as HodInct from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_HodRating=".$resR['Rating'], $con); $NOH=mysql_query("SELECT count(*) as NOH from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_HodRating=".$resR['Rating'], $con);}
	  elseif($_REQUEST['action']=='Dept'){ $sqlH=mysql_query("select SUM(EmpCurrGrossPM)as HodGross, SUM(EmpCurrIncentivePM) as HodInct from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_HodRating=".$resR['Rating'], $con); $NOH=mysql_query("SELECT count(*) as NOH from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_HodRating=".$resR['Rating'], $con); }
	  elseif($_REQUEST['action']=='Hod'){ $sqlH=mysql_query("select SUM(EmpCurrGrossPM)as HodGross, SUM(EmpCurrIncentivePM) as HodInct from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_HodRating=".$resR['Rating'], $con); $NOH=mysql_query("SELECT count(*) as NOH from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_HodRating=".$resR['Rating'], $con); }
?>			   
			   
<?php $resH=mysql_fetch_array($sqlH); $resNOH=mysql_fetch_assoc($NOH);  if($resH['HodGross']>0){$resHGross=$resH['HodGross']+$resH['HodInct'];}else{$resHGross=0;}?>
               <td align="center" style="" class="All_50"><?php echo $resNOH['NOH']; ?></td>
               <td align="right" style="" class="All_100"><?php echo $resHGross; ?>&nbsp;
			   <input type="hidden" name="HodGross_<?php echo $sn; ?>" id="HodGross_<?php echo $sn; ?>" value="<?php echo $resHGross; ?>" />
			   </td>		
			   
<?php if(date("Y-m-d")>=date('Y-01-01') AND date("Y-m-d")<date('Y-02-01') AND $_REQUEST['YI']==$YearId) { ?>
<?php /**************************************** Dummy Start *********************************/ ?>	
<?php /**************************************** Dummy Start *********************************/ ?>			   
<?php if($_REQUEST['action']=='Over')
      { $sql2I=mysql_query("select IncGross,PerInc,Inc from hrm_pms_dummy_increment where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND Rating=".$resR['Rating'], $con);
		$sqlCH=mysql_query("select Dummy_HodRating from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_HodRating=".$resR['Rating'], $con); $rowCH=mysql_num_rows($sqlCH);
		$sqlCR=mysql_query("select Dummy_RevRating from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_RevRating=".$resR['Rating'], $con); $rowCR=mysql_num_rows($sqlCR);
		$sqlCA=mysql_query("select Dummy_AppRating from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_AppRating=".$resR['Rating'], $con); $rowCA=mysql_num_rows($sqlCA);
		$sqlCE=mysql_query("select Dummy_EmpRating from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_EmpRating=".$resR['Rating'], $con); $rowCE=mysql_num_rows($sqlCE);
/*		
if($rowCH==0)
{ if($rowCR==0)
  { if($rowCA==0)
    { if($rowCE==0)
      { $Pre_GrossValue=0;}
      else
	  {
	   $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Dummy_EmpRating=".$resR['Rating'], $con); $resD=mysql_fetch_assoc($sqlD);
	   $Pre_GrossValue=$resD['DeptTotGross']; 
	  }
    }
    else
	{
	 $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Dummy_AppRating=".$resR['Rating'], $con); $resD=mysql_fetch_assoc($sqlD);
	 $Pre_GrossValue=$resD['DeptTotGross'];
	}
  } 
  else
  {
   $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Dummy_RevRating=".$resR['Rating'], $con); $resD=mysql_fetch_assoc($sqlD);
   $Pre_GrossValue=$resD['DeptTotGross'];
  }
}
else
{ 
 $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Dummy_HodRating=".$resR['Rating'], $con); $resD=mysql_fetch_assoc($sqlD);
 $Pre_GrossValue=$resD['DeptTotGross'];
}
*/ 
if($rowCH==0){ $Pre_GrossValue=0; } 
else { $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross, SUM(EmpCurrIncentivePM) as DeptInct from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_HodRating=".$resR['Rating'], $con); $resD=mysql_fetch_assoc($sqlD); 
$Pre_GrossValue=$resD['DeptTotGross']+$resD['DeptInct'];  }
 
	    $res2I=mysql_fetch_array($sql2I); 
		$IncD=($Pre_GrossValue*$res2I['PerInc'])/100;
		$GrossD=$Pre_GrossValue+$IncD;
		$OnePerD=($Pre_GrossValue*1)/100;
		if($OnePerD>0){$PerD=$IncD/$OnePerD;}else{$PerD=0;}
		if($GrossD>0){$H2I=round($GrossD,2);}else{$H2I=0;} 
	    if($PerD>0){$H3I=round($PerD,2);}else{$H3I=0;}
	    if($IncD>0){$H4I=round($IncD,2);}else{$H4I=0;}
	       
	    //if($res2I['IncGross']>0){$H2I=$res2I['IncGross'];}else{$H2I=0;} 
	    //if($res2I['PerInc']>0){$H3I=$res2I['PerInc'];}else{$H3I=0;}
	    //if($res2I['Inc']>0){$H4I=$res2I['Inc'];}else{$H4I=0;} 
	  }
	  
      elseif($_REQUEST['action']=='Dept')
	  { $sql2I=mysql_query("select PerInc from hrm_pms_dummy_increment where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND Rating=".$resR['Rating'], $con);
	    
	    $sqlCH=mysql_query("select Dummy_HodRating from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_HodRating=".$resR['Rating'], $con); $rowCH=mysql_num_rows($sqlCH);
		$sqlCR=mysql_query("select Dummy_RevRating from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_RevRating=".$resR['Rating'], $con); $rowCR=mysql_num_rows($sqlCR);
		$sqlCA=mysql_query("select Dummy_AppRating from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_AppRating=".$resR['Rating'], $con); $rowCA=mysql_num_rows($sqlCA);
		$sqlCE=mysql_query("select Dummy_EmpRating from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_EmpRating=".$resR['Rating'], $con); $rowCE=mysql_num_rows($sqlCE);
/*		
if($rowCH==0)
{ if($rowCR==0)
  { if($rowCA==0)
    { if($rowCE==0)
      { $Pre_GrossValue=0;}
      else
	  {
	   $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Dummy_EmpRating=".$resR['Rating'], $con); $resD=mysql_fetch_assoc($sqlD);
	   $Pre_GrossValue=$resD['DeptTotGross']; 
	  }
    }
    else
	{
	 $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Dummy_AppRating=".$resR['Rating'], $con); $resD=mysql_fetch_assoc($sqlD);
	 $Pre_GrossValue=$resD['DeptTotGross'];
	}
  } 
  else
  {
   $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Dummy_RevRating=".$resR['Rating'], $con); $resD=mysql_fetch_assoc($sqlD);
   $Pre_GrossValue=$resD['DeptTotGross'];
  }
}
else
{ 
 $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Dummy_HodRating=".$resR['Rating'], $con); $resD=mysql_fetch_assoc($sqlD);
 $Pre_GrossValue=$resD['DeptTotGross'];
}  
*/
if($rowCH==0){ $Pre_GrossValue=0; } 
else {  $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross, SUM(EmpCurrIncentivePM) as DeptInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_HodRating=".$resR['Rating'], $con); $resD=mysql_fetch_assoc($sqlD); 
$Pre_GrossValue=$resD['DeptTotGross']+$resD['DeptInct'];  } 
       
	    $res2I=mysql_fetch_array($sql2I); 
		$IncD=($Pre_GrossValue*$res2I['PerInc'])/100;
		$GrossD=$Pre_GrossValue+$IncD;
		$OnePerD=($Pre_GrossValue*1)/100;
		if($OnePerD>0){$PerD=$IncD/$OnePerD;}else{$PerD=0;}
		if($GrossD>0){$H2I=round($GrossD,2);}else{$H2I=0;} 
	    if($PerD>0){$H3I=round($PerD,2);}else{$H3I=0;}
	    if($IncD>0){$H4I=round($IncD,2);}else{$H4I=0;}
		}
		
	  elseif($_REQUEST['action']=='Hod')
	  { $sql2I=mysql_query("select PerInc from hrm_pms_dummy_increment where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND Rating=".$resR['Rating'], $con);
	    $sqlCH=mysql_query("select Dummy_HodRating from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_HodRating=".$resR['Rating'], $con); $rowCH=mysql_num_rows($sqlCH);
		$sqlCR=mysql_query("select Dummy_RevRating from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_RevRating=".$resR['Rating'], $con); $rowCR=mysql_num_rows($sqlCR);
		$sqlCA=mysql_query("select Dummy_AppRating from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_AppRating=".$resR['Rating'], $con); $rowCA=mysql_num_rows($sqlCA);
		$sqlCE=mysql_query("select Dummy_EmpRating from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_EmpRating=".$resR['Rating'], $con); $rowCE=mysql_num_rows($sqlCE);
/*		
if($rowCH==0)
{ if($rowCR==0)
  { if($rowCA==0)
    { if($rowCE==0)
      { $Pre_GrossValue=0;}
      else
	  {
	   $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_EmpRating=".$resR['Rating'], $con); $resD=mysql_fetch_assoc($sqlD);
	   $Pre_GrossValue=$resD['DeptTotGross'];
	  }
    }
    else
	{
	 $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_AppRating=".$resR['Rating'], $con); $resD=mysql_fetch_assoc($sqlD);
	 $Pre_GrossValue=$resD['DeptTotGross'];
	}
  } 
  else
  {
   $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_RevRating=".$resR['Rating'], $con); $resD=mysql_fetch_assoc($sqlD);
   $Pre_GrossValue=$resD['DeptTotGross'];
  }
}
else
{ 
 $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_HodRating=".$resR['Rating'], $con); $resD=mysql_fetch_assoc($sqlD);
 $Pre_GrossValue=$resD['DeptTotGross'];
}   
*/
if($rowCH==0){ $Pre_GrossValue=0; } 
else { $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross, SUM(EmpCurrIncentivePM) as DeptInct from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_HodRating=".$resR['Rating'], $con); $resD=mysql_fetch_assoc($sqlD);
 $Pre_GrossValue=$resD['DeptTotGross']+$resD['DeptInct']; }
  
	    $res2I=mysql_fetch_array($sql2I); 
		$IncD=($Pre_GrossValue*$res2I['PerInc'])/100;
		$GrossD=$Pre_GrossValue+$IncD;
		$OnePerD=($Pre_GrossValue*1)/100;
		if($OnePerD>0){$PerD=$IncD/$OnePerD;}else{$PerD=0;}
		if($GrossD>0){$H2I=round($GrossD,2);}else{$H2I=0;} 
	    if($PerD>0){$H3I=round($PerD,2);}else{$H3I=0;}
	    if($IncD>0){$H4I=round($IncD,2);}else{$H4I=0;}
	  }	 
?>			   	
              <td align="center"><input style="border-style:hidden; border:0;width:100px;text-align:right;color:#0080FF;font-weight:bold; background-color:#FFFFFF; font-size:11px;" id="PIS_<?php echo $sn; ?>" name="PIS_<?php echo $sn; ?>" value="<?php echo $H2I; ?>" <?php if($_REQUEST['YI']==$YearId){ ?> onKeyDown="Cal_OneProInc(<?php echo $sn; ?>)" onClick="Cal_OneProInc(<?php echo $sn; ?>)" onChange="Cal_OneProInc(<?php echo $sn; ?>)" <?php } ?> onKeyPress="return isNumberKey(event)" disabled /></td>
               <td align="center"><input style="border-style:hidden; border:0;width:58px;text-align:center;color:#0080FF;font-weight:bold; background-color:#FFFFFF; font-size:11px;" id="PerIS_<?php echo $sn; ?>" name="PerIS_<?php echo $sn; ?>" value="<?php echo $H3I; ?>" <?php if($_REQUEST['YI']==$YearId){ ?> onKeyDown="Cal_TwoProInc(<?php echo $sn; ?>)" onChange="Cal_TwoProInc(<?php echo $sn; ?>)" <?php } ?> onKeyPress="return isNumberKey(event)" disabled /></td>
			   <td align="center"><input style="border-style:hidden; border:0;width:100px;text-align:right;color:#0080FF;font-weight:bold; background-color:#FFFFFF; font-size:11px;" id="IncS_<?php echo $sn; ?>" name="IncS_<?php echo $sn; ?>" value="<?php echo $H4I; ?>" <?php if($_REQUEST['YI']==$YearId){ ?> onKeyDown="Cal_ThreeProInc(<?php echo $sn; ?>)" onClick="Cal_ThreeProInc(<?php echo $sn; ?>)" onChange="Cal_ThreeProInc(<?php echo $sn; ?>)" <?php } ?> onKeyPress="return isNumberKey(event)" disabled /></td>	
			   
<?php /**************************************** Dummy Close *********************************/ ?>
<?php /**************************************** Dummy Close *********************************/ ?>		  		   
<?php } else { ?>
<?php /**************************************** Actual Value Start *********************************/ ?>		
<?php /**************************************** Actual Value Start *********************************/ ?>			

<?php 
if($_REQUEST['action']=='Over'){ $sqlHTotP=mysql_query("select SUM(HR_GrossMonthlySalary)as HodTotP from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_HodRating=".$resR['Rating'], $con); }
	  elseif($_REQUEST['action']=='Dept'){ $sqlHTotP=mysql_query("select SUM(HR_GrossMonthlySalary)as HodTotP from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_HodRating=".$resR['Rating'], $con); }
	  elseif($_REQUEST['action']=='Hod'){ $sqlHTotP=mysql_query("select SUM(HR_GrossMonthlySalary)as HodTotP from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_HodRating=".$resR['Rating'], $con); }

?>
<?php $resHTotP=mysql_fetch_array($sqlHTotP);  if($resHTotP['HodTotP']>0){$HTotP=$resHTotP['HodTotP'];}else{$HTotP=0;}?>			   			   
			   <td align="center"><input style="border-style:hidden; border:0;width:100px;text-align:right;color:#0080FF;font-weight:bold; background-color:#FFFFFF; font-size:11px;" id="PIS_<?php echo $sn; ?>" name="PIS_<?php echo $sn; ?>" value="<?php echo $HTotP; ?>" <?php if($_REQUEST['YI']==$YearId){ ?> onKeyDown="Cal_OneProInc(<?php echo $sn; ?>)" onClick="Cal_OneProInc(<?php echo $sn; ?>)" onChange="Cal_OneProInc(<?php echo $sn; ?>)" <?php } ?> disabled /></td>
			
<?php 
if($_REQUEST['action']=='Over'){ $sqlHTotIncS=mysql_query("select SUM(HR_IncNetMonthalySalary)as HodTotIncS from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_HodRating=".$resR['Rating'], $con); }
	  elseif($_REQUEST['action']=='Dept'){ $sqlHTotIncS=mysql_query("select SUM(HR_IncNetMonthalySalary)as HodTotIncS from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_HodRating=".$resR['Rating'], $con); }
	  elseif($_REQUEST['action']=='Hod'){ $sqlHTotIncS=mysql_query("select SUM(HR_IncNetMonthalySalary)as HodTotIncS from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_HodRating=".$resR['Rating'], $con); }
?>			   
<?php $resHTotIncS=mysql_fetch_array($sqlHTotIncS);  
$OnePer=($resHGross*1)/100; 
if($resHTotIncS['HodTotIncS']>0 AND $OnePer>0){$Inc_Per=$resHTotIncS['HodTotIncS']/$OnePer;} else {$Inc_Per=0;}
$round_PerInc=round($Inc_Per,2);
if($resHTotIncS['HodTotIncS']>0){$HTotIncS=$resHTotIncS['HodTotIncS'];}else{$HTotIncS=0;} 
?>				   
			   <td align="center"><input style="border-style:hidden; border:0;width:58px;text-align:center;color:#0080FF;font-weight:bold; background-color:#FFFFFF; font-size:11px;" id="PerIS_<?php echo $sn; ?>" name="PerIS_<?php echo $sn; ?>" value="<?php echo $round_PerInc; ?>" <?php if($_REQUEST['YI']==$YearId){ ?> onKeyDown="Cal_TwoProInc(<?php echo $sn; ?>)" onChange="Cal_TwoProInc(<?php echo $sn; ?>)" <?php } ?> disabled /></td>
			   <td align="center"><input style="border-style:hidden; border:0;width:100px;text-align:right;color:#0080FF;font-weight:bold; background-color:#FFFFFF; font-size:11px;" id="IncS_<?php echo $sn; ?>" name="IncS_<?php echo $sn; ?>" value="<?php echo $HTotIncS; ?>" <?php if($_REQUEST['YI']==$YearId){ ?> onKeyDown="Cal_ThreeProInc(<?php echo $sn; ?>)" onClick="Cal_ThreeProInc(<?php echo $sn; ?>)" onChange="Cal_ThreeProInc(<?php echo $sn; ?>)" <?php } ?> disabled /></td>	
			   
<?php /**************************************** Actual Value Close *********************************/ ?>
<?php /**************************************** Actual Value Close *********************************/ ?>			
<?php } ?>	

<?php /************************************** HOD Proposed Open ******************************************************/?>
<?php /************************************** HOD Proposed Open ******************************************************/?>
<?php if($_REQUEST['action']=='Over'){ $sqlHTotP2=mysql_query("select SUM(Hod_ProIncSalary)as HodTotP2 from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Hod_TotalFinalRating=".$resR['Rating'], $con); }
	  elseif($_REQUEST['action']=='Dept'){ $sqlHTotP2=mysql_query("select SUM(Hod_ProIncSalary)as HodTotP2 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Hod_TotalFinalRating=".$resR['Rating'], $con); }
	  elseif($_REQUEST['action']=='Hod'){ $sqlHTotP2=mysql_query("select SUM(Hod_ProIncSalary)as HodTotP2 from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Hod_TotalFinalRating=".$resR['Rating'], $con); } ?>
<?php $resHTotP2=mysql_fetch_array($sqlHTotP2);  if($resHTotP2['HodTotP2']>0){$HTotP2=$resHTotP2['HodTotP2'];}else{$HTotP2=0;}?>			   			   
			   <td align="center"><input style="border-style:hidden; border:0;width:100px;text-align:right;color:#0080FF;font-weight:bold; background-color:#FFFFFF; font-size:11px;" id="PISh2_<?php echo $sn; ?>" name="PISh2_<?php echo $sn; ?>" value="<?php echo $HTotP2; ?>" <?php if($_REQUEST['YI']==$YearId){ ?> onKeyDown="Cal_OneProInch2(<?php echo $sn; ?>)" onClick="Cal_OneProInch2(<?php echo $sn; ?>)" onChange="Cal_OneProInch2(<?php echo $sn; ?>)" <?php } ?> readonly /></td>
			   
<?php if($_REQUEST['action']=='Over'){ $sqlHTotP22=mysql_query("select SUM(Hod_ProCorrSalary)as HodTotP22 from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Hod_TotalFinalRating=".$resR['Rating'], $con); }
	  elseif($_REQUEST['action']=='Dept'){ $sqlHTotP22=mysql_query("select SUM(Hod_ProCorrSalary)as HodTotP22 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Hod_TotalFinalRating=".$resR['Rating'], $con); }
	  elseif($_REQUEST['action']=='Hod'){ $sqlHTotP22=mysql_query("select SUM(Hod_ProCorrSalary)as HodTotP22 from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Hod_TotalFinalRating=".$resR['Rating'], $con); } ?>
<?php $resHTotP22=mysql_fetch_array($sqlHTotP22);  if($resHTotP22['HodTotP22']>0){$HTotP22=$resHTotP22['HodTotP22'];}else{$HTotP22=0;}?>			   			   
			   <td align="center"><input style="border-style:hidden; border:0;width:100px;text-align:right;color:#0080FF;font-weight:bold; background-color:#FFFFFF; font-size:11px;" id="PISh22_<?php echo $sn; ?>" name="PISh22_<?php echo $sn; ?>" value="<?php echo $HTotP22; ?>" <?php if($_REQUEST['YI']==$YearId){ ?> onKeyDown="Cal_OneProInch22(<?php echo $sn; ?>)" onClick="Cal_OneProInch22(<?php echo $sn; ?>)" onChange="Cal_OneProInch22(<?php echo $sn; ?>)" <?php } ?> readonly /></td>			   

<?php 
if($_REQUEST['action']=='Over'){ $sqlHTotP222=mysql_query("select SUM(Hod_GrossMonthlySalary)as HodTotP222 from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Hod_TotalFinalRating=".$resR['Rating'], $con); }
	  elseif($_REQUEST['action']=='Dept'){ $sqlHTotP222=mysql_query("select SUM(Hod_GrossMonthlySalary)as HodTotP222 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Hod_TotalFinalRating=".$resR['Rating'], $con); }
	  elseif($_REQUEST['action']=='Hod'){ $sqlHTotP222=mysql_query("select SUM(Hod_GrossMonthlySalary)as HodTotP222 from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Hod_TotalFinalRating=".$resR['Rating'], $con); }

?>
<?php $resHTotP222=mysql_fetch_array($sqlHTotP222);  if($resHTotP222['HodTotP222']>0){$HTotP222=$resHTotP222['HodTotP222'];}else{$HTotP222=0;}?>			   			
			   <td align="center"><input style="border-style:hidden; border:0;width:100px;text-align:right;color:#0080FF;font-weight:bold; background-color:#FFFFFF; font-size:11px;" id="PISh222_<?php echo $sn; ?>" name="PISh222_<?php echo $sn; ?>" value="<?php echo $HTotP222; ?>" <?php if($_REQUEST['YI']==$YearId){ ?> onKeyDown="Cal_OneProInch222(<?php echo $sn; ?>)" onClick="Cal_OneProInch222(<?php echo $sn; ?>)" onChange="Cal_OneProInch222(<?php echo $sn; ?>)" <?php } ?> readonly /></td>
	
<?php 
if($_REQUEST['action']=='Over'){ $sqlHTotIncS2=mysql_query("select SUM(Hod_IncNetMonthalySalary)as HodTotIncS2 from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Hod_TotalFinalRating=".$resR['Rating'], $con); }
	  elseif($_REQUEST['action']=='Dept'){ $sqlHTotIncS2=mysql_query("select SUM(Hod_IncNetMonthalySalary)as HodTotIncS2 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Hod_TotalFinalRating=".$resR['Rating'], $con); }
	  elseif($_REQUEST['action']=='Hod'){ $sqlHTotIncS2=mysql_query("select SUM(Hod_IncNetMonthalySalary)as HodTotIncS2 from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Hod_TotalFinalRating=".$resR['Rating'], $con); }
	  
$resHTotIncS2=mysql_fetch_array($sqlHTotIncS2);	
if($resHGross>0)
{ $TotalIncCorr=$HTotP22; $TotalIncProp=$resHTotIncS2['HodTotIncS2']-$HTotP22;
  
//$TotalIncProp=$HTotP2-$resHGross; $TotalIncCorr=$HTotP22;

//$TotalIncProp=$resHGross-$HTotP2; $TotalIncCorr=$resHTotIncS2['HodTotIncS2']-$HTotP2;
}
else{$TotalIncProp=0; $TotalIncCorr=0;}  
	  
$OnePer2=($resHGross*1)/100; 
if($resNOH['NOH']>0)
{
$Inc_Per2P=$TotalIncProp/$OnePer2; $round_PerInc2P=round($Inc_Per2P,2);
$Inc_Per2C=$TotalIncCorr/$OnePer2; $round_PerInc2C=round($Inc_Per2C,2);
$Inc_Per2T=$resHTotIncS2['HodTotIncS2']/$OnePer2; $round_PerInc2T=round($Inc_Per2T,2);
}
else{$round_PerInc2P=0; $round_PerInc2C=0; $round_PerInc2T=0;}

?>	
 <td align="center"><input style="border-style:hidden; border:0;width:58px;text-align:center;color:#0080FF;font-weight:bold; background-color:#FFFFFF; font-size:11px;" id="PerIShP_<?php echo $sn; ?>" name="PerIShP_<?php echo $sn; ?>" value="<?php echo $round_PerInc2P; ?>" <?php if($_REQUEST['YI']==$YearId){ ?> onKeyDown="Cal_TwoProInchP(<?php echo $sn; ?>)" onChange="Cal_TwoProInchP(<?php echo $sn; ?>)" <?php } ?> readonly/></td>
 <td align="center"><input style="border-style:hidden; border:0;width:58px;text-align:center;color:#0080FF;font-weight:bold; background-color:#FFFFFF; font-size:11px;" id="PerIShC_<?php echo $sn; ?>" name="PerIShC_<?php echo $sn; ?>" value="<?php echo $round_PerInc2C; ?>" <?php if($_REQUEST['YI']==$YearId){ ?> onKeyDown="Cal_TwoProInchC(<?php echo $sn; ?>)" onChange="Cal_TwoProInchC(<?php echo $sn; ?>)" <?php } ?> readonly/></td>
 <td align="center"><input style="border-style:hidden; border:0;width:58px;text-align:center;color:#0080FF;font-weight:bold; background-color:#FFFFFF; font-size:11px;" id="PerIShT_<?php echo $sn; ?>" name="PerIShT_<?php echo $sn; ?>" value="<?php echo $round_PerInc2T; ?>" <?php if($_REQUEST['YI']==$YearId){ ?> onKeyDown="Cal_TwoProInchT(<?php echo $sn; ?>)" onChange="Cal_TwoProInchT(<?php echo $sn; ?>)" <?php } ?> readonly/></td>
		   
<?php   
//$OnePer2=($resH['HodGross']*1)/100; 
//if($resHTotIncS2['HodTotIncS2']>0 AND $OnePer2>0){$Inc_Per2=$resHTotIncS2['HodTotIncS2']/$OnePer2;} else {$Inc_Per2=0;}
//$round_PerInc2=round($Inc_Per2,2);
if($resHTotIncS2['HodTotIncS2']>0){$HTotIncS2=$resHTotIncS2['HodTotIncS2'];}else{$HTotIncS2=0;} 
?>				   
<td align="center"><input style="border-style:hidden; border:0;width:100px;text-align:right;color:#0080FF;font-weight:bold; background-color:#FFFFFF; font-size:11px;" id="IncSh_<?php echo $sn; ?>" name="IncSh_<?php echo $sn; ?>" value="<?php echo $HTotIncS2; ?>" <?php if($_REQUEST['YI']==$YearId){ ?> onKeyDown="Cal_ThreeProInch(<?php echo $sn; ?>)" onClick="Cal_ThreeProInch(<?php echo $sn; ?>)" onChange="Cal_ThreeProInch(<?php echo $sn; ?>)" <?php } ?> readonly/></td>	
			   
<?php /************************************** HOD Proposed Close ******************************************************/?>
<?php /************************************** HOD Proposed Close ******************************************************/?>

   
	          </tr>
<?php $sn++; } $no=$sn-1;?>	<input type="hidden" value="<?php echo $no; ?>" id="RowNo" name="RowNo"/>



<tr bgcolor="#909090"><td colspan="20" style="height:20px;width:130px;color:#FFFFFF;font-family:Times New Roman;">&nbsp;<b>Without Un assigned</b></td></tr>
<?php /**************************** Without Un assigned Open************************************/?> 
<?php /**************************** Without Un assigned Open************************************/?>
		  <tr bgcolor="#0076EC">
		       <td colspan="2" align="right" style="color:#FFFFFF;font-family:Times New Roman;font-size:14px; height:20px;"><b>Total:&nbsp;</b></td>
			   
<?php 
if($_REQUEST['YI']==1)
{  
  if($_REQUEST['action']=='Over'){ $sqlET=mysql_query("select SUM(EmpCurrGrossPM)as EmpGross, SUM(EmpCurrIncentivePM) as EmpInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Dummy_EmpRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Dept'){ $sqlET=mysql_query("select SUM(EmpCurrGrossPM)as EmpGross, SUM(EmpCurrIncentivePM) as EmpInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_EmpRating!=0 AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Hod'){ $sqlET=mysql_query("select SUM(EmpCurrGrossPM)as EmpGross, SUM(EmpCurrIncentivePM) as EmpInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Dummy_EmpRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
} 
elseif($_REQUEST['YI']>=2)
{  
  if($_REQUEST['action']=='Over'){ $sqlET=mysql_query("select SUM(EmpCurrGrossPM)as EmpGross, SUM(EmpCurrIncentivePM) as EmpInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Dummy_EmpRating!=0 AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); $NOET=mysql_query("select count(*) as NOET from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Dummy_EmpRating!=0 AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Dept'){ $sqlET=mysql_query("select SUM(EmpCurrGrossPM)as EmpGross, SUM(EmpCurrIncentivePM) as EmpInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_EmpRating!=0 AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); $NOET=mysql_query("select count(*) as NOET from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Dummy_EmpRating!=0 AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Hod'){ $sqlET=mysql_query("select SUM(EmpCurrGrossPM)as EmpGross, SUM(EmpCurrIncentivePM) as EmpInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Dummy_EmpRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); $NOET=mysql_query("select count(*) as NOET from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Dummy_EmpRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
} 
$resET=mysql_fetch_array($sqlET); if($_REQUEST['YI']>=2){$resNOET=mysql_fetch_array($NOET);} $ET=$resET['EmpGross']+$resET['EmpInct']; //$ET=$resET['EmpGross']+$EuGross; ?>			
               <td align="center" class="All_60"><b style="color:#FFFFFF;"><?php echo $resNOET['NOET']; ?></b></td>   			
			   <td align="right" class="All_100"><b style="color:#FFFFFF;"><?php echo number_format($ET, 2, '.', ''); ?></b>&nbsp;
			   <input type="hidden" name="EmpGrossT" id="EmpGrossT" value="<?php echo number_format($ET, 2, '.', ''); ?>" /></td>
			   
<?php 
if($_REQUEST['YI']==1)
{  
  if($_REQUEST['action']=='Over'){ $sqlAT=mysql_query("select SUM(EmpCurrGrossPM)as AppGross, SUM(EmpCurrIncentivePM) as AppInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Dummy_AppRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Dept'){ $sqlAT=mysql_query("select SUM(EmpCurrGrossPM)as AppGross, SUM(EmpCurrIncentivePM) as AppInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_AppRating!=0 AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Hod'){ $sqlAT=mysql_query("select SUM(EmpCurrGrossPM)as AppGross, SUM(EmpCurrIncentivePM) as AppInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND AND hrm_employee_pms.Dummy_AppRating!=0 hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
} 
elseif($_REQUEST['YI']>=2)
{  
  if($_REQUEST['action']=='Over'){ $sqlAT=mysql_query("select SUM(EmpCurrGrossPM)as AppGross, SUM(EmpCurrIncentivePM) as AppInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Dummy_AppRating!=0 AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); $NOAT=mysql_query("select count(*) as NOAT from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Dummy_AppRating!=0 AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Dept'){ $sqlAT=mysql_query("select SUM(EmpCurrGrossPM)as AppGross, SUM(EmpCurrIncentivePM) as AppInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_AppRating!=0 AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); $NOAT=mysql_query("select count(*) as NOAT from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_AppRating!=0 AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con);  }
  elseif($_REQUEST['action']=='Hod'){ $sqlAT=mysql_query("select SUM(EmpCurrGrossPM)as AppGross, SUM(EmpCurrIncentivePM) as AppInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Dummy_AppRating!=0 AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); $NOAT=mysql_query("select count(*) as NOAT from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Dummy_AppRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con);}
} 
$resAT=mysql_fetch_array($sqlAT); if($_REQUEST['YI']>=2){$resNOAT=mysql_fetch_array($NOAT);} $AT=$resAT['AppGross']+$resAT['AppInct']; //$AT=$resAT['AppGross']+$AuGross; ?>
               <td align="center" style="" class="All_50"><b style="color:#FFFFFF;"><?php echo $resNOAT['NOAT']; ?></b></td>   							   
			   <td align="right" style="" class="All_100"><b style="color:#FFFFFF;"><?php echo number_format($AT, 2, '.', ''); ?></b>&nbsp;
			   <input type="hidden" name="AppGrossT" id="AppGrossT" value="<?php echo number_format($AT, 2, '.', ''); ?>" /></td>
			   
<?php 
if($_REQUEST['YI']==1)
{  
  if($_REQUEST['action']=='Over'){ $sqlRT=mysql_query("select SUM(EmpCurrGrossPM)as RevGross, SUM(EmpCurrIncentivePM) as RevInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Dummy_RevRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Dept'){ $sqlRT=mysql_query("select SUM(EmpCurrGrossPM)as RevGross, SUM(EmpCurrIncentivePM) as RevInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_RevRating!=0 AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Hod'){ $sqlRT=mysql_query("select SUM(EmpCurrGrossPM)as RevGross, SUM(EmpCurrIncentivePM) as RevInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Dummy_RevRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
} 
elseif($_REQUEST['YI']>=2)
{  
  if($_REQUEST['action']=='Over'){ $sqlRT=mysql_query("select SUM(EmpCurrGrossPM)as RevGross, SUM(EmpCurrIncentivePM) as RevInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Dummy_RevRating!=0 AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); $NORT=mysql_query("select count(*) as NORT from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Dummy_RevRating!=0 AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con);}
  elseif($_REQUEST['action']=='Dept'){ $sqlRT=mysql_query("select SUM(EmpCurrGrossPM)as RevGross, SUM(EmpCurrIncentivePM) as RevInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_RevRating!=0 AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); $NORT=mysql_query("select count(*) as NORT from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_RevRating!=0 AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con);  }
  elseif($_REQUEST['action']=='Hod'){ $sqlRT=mysql_query("select SUM(EmpCurrGrossPM)as RevGross, SUM(EmpCurrIncentivePM) as RevInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Dummy_RevRating!=0 AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); $NORT=mysql_query("select count(*) as NORT from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Dummy_RevRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con);}
} 
$resRT=mysql_fetch_array($sqlRT); if($_REQUEST['YI']>=2){$resNORT=mysql_fetch_array($NORT);} $RT=$resRT['RevGross']+$resRT['RevInct']; //$RT=$resRT['RevGross']+$RuGross; ?>	
               <td align="center" style="" class="All_50"><b style="color:#FFFFFF;"><?php echo $resNORT['NORT']; ?></b></td>
			   <td align="right" style="" class="All_100"><b style="color:#FFFFFF;"><?php echo number_format($RT, 2, '.', ''); ?></b>&nbsp;
			   <input type="hidden" name="RevGrossT" id="RevGrossT" value="<?php echo number_format($RT, 2, '.', ''); ?>" /></td>
			   
<?php 
if($_REQUEST['YI']==1)
{  
  if($_REQUEST['action']=='Over'){ $sqlHT=mysql_query("select SUM(EmpCurrGrossPM)as HodGross, SUM(EmpCurrIncentivePM) as HodInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Dummy_HodRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Dept'){ $sqlHT=mysql_query("select SUM(EmpCurrGrossPM)as HodGross, SUM(EmpCurrIncentivePM) as HodInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_HodRating!=0 AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Hod'){ $sqlHT=mysql_query("select SUM(EmpCurrGrossPM)as HodGross, SUM(EmpCurrIncentivePM) as HodInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Dummy_HodRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
} 
elseif($_REQUEST['YI']>=2)
{  
  if($_REQUEST['action']=='Over'){ $sqlHT=mysql_query("select SUM(EmpCurrGrossPM)as HodGross, SUM(EmpCurrIncentivePM) as HodInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Dummy_HodRating!=0 AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); $NOHT=mysql_query("select count(*) as NOHT from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Dummy_HodRating!=0 AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con);}
  elseif($_REQUEST['action']=='Dept'){ $sqlHT=mysql_query("select SUM(EmpCurrGrossPM)as HodGross, SUM(EmpCurrIncentivePM) as HodInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_HodRating!=0 AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); $NOHT=mysql_query("select count(*) as NOHT from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_HodRating!=0 AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Hod'){ $sqlHT=mysql_query("select SUM(EmpCurrGrossPM)as HodGross, SUM(EmpCurrIncentivePM) as HodInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Dummy_HodRating!=0 AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); $NOHT=mysql_query("select count(*) as NOHT from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Dummy_HodRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con);}
} 
$resHT=mysql_fetch_array($sqlHT); if($_REQUEST['YI']>=2){$resNOHT=mysql_fetch_array($NOHT);} $HT=$resHT['HodGross']+$resHT['HodInct']; //$HT=$resHT['HodGross']+$HuGross; ?>	
               <td align="center" style="" class="All_50"><b style="color:#FFFFFF;"><?php echo $resNOHT['NOHT']; ?></b></td>
			   <td align="right" style="" class="All_100"><b style="color:#FFFFFF;"><?php echo number_format($HT, 2, '.', ''); ?></b>&nbsp;
			   <input type="hidden" name="HodGrossT" id="HodGrossT" value="<?php echo number_format($HT, 2, '.', ''); ?>" /></td>	
			   

<?php if(date("Y-m-d")>=date('Y-01-01') AND date("Y-m-d")<date('Y-02-01') AND $_REQUEST['YI']==$YearId) { ?>	
<?php /**************************************** Dummy Start *********************************/ ?>	
<?php /**************************************** Dummy Start *********************************/ ?>			   
<?php if($_REQUEST['action']=='Over')
     { $sql4I=mysql_query("select TIncGross,TPerInc,TInc from hrm_pms_dummy_increment_untot where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId, $con); 
	   $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross, SUM(EmpCurrIncentivePM) as DeptInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND (hrm_employee_pms.Dummy_EmpRating!=0 AND hrm_employee_pms.Dummy_AppRating!=0 AND hrm_employee_pms.Dummy_RevRating!=0 AND hrm_employee_pms.Dummy_HodRating!=0) AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.CompanyId=".$CompanyId, $con); $resD=mysql_fetch_assoc($sqlD);
	   $Pre_GrossValue=$resD['DeptTotGross']+$resD['DeptInct']; 
	 
	    $res4I=mysql_fetch_array($sql4I); 
		//$IncD=($Pre_GrossValue*$res4I['TPerInc'])/100;
		//$GrossD=$Pre_GrossValue+$IncD;
		//$OnePerD=($Pre_GrossValue*1)/100;
		//if($OnePerD>0){$PerD=$IncD/$OnePerD;}else{$PerD=0;}
		//if($GrossD>0){$H222I=round($GrossD,2);}else{$H222I=0;} 
	    //if($PerD>0){$H333I=round($PerD,2);}else{$H333I=0;}
	    //if($IncD>0){$H444I=round($IncD,2);}else{$H444I=0;}
		
	   if($res4I['TIncGross']>0){$H222I=$res4I['TIncGross'];}else{$H22I=0;} 
	   if($res4I['TPerInc']>0){$H333I=$res4I['TPerInc'];}else{$H33I=0;}
	   if($res4I['TInc']>0){$H444I=$res4I['TInc'];}else{$H44I=0;}
	 }   
	 elseif($_REQUEST['action']=='Dept')
	 { $sql4I=mysql_query("select TPerInc from hrm_pms_dummy_increment_untot where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId, $con); 
	   //$sqlD1=mysql_query("select SUM(EmpCurrGrossPM)as TotGrossT from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Dummy_HodRating!=0", $con);
	   //$sqlD2=mysql_query("select SUM(EmpCurrGrossPM)as TotGross2T from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Dummy_HodRating==0", $con);
	   $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross, SUM(EmpCurrIncentivePM) as DeptInct from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND (hrm_employee_pms.Dummy_EmpRating!=0 AND hrm_employee_pms.Dummy_AppRating!=0 AND hrm_employee_pms.Dummy_RevRating!=0 AND hrm_employee_pms.Dummy_HodRating!=0) AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.CompanyId=".$CompanyId, $con); $resD=mysql_fetch_assoc($sqlD);
	   $Pre_GrossValue=$resD['DeptTotGross']+$resD['DeptInct']; 
	 
	    $res4I=mysql_fetch_array($sql4I); 
		$IncD=($Pre_GrossValue*$res4I['TPerInc'])/100;
		$GrossD=$Pre_GrossValue+$IncD;
		$OnePerD=($Pre_GrossValue*1)/100;
		if($OnePerD>0){$PerD=$IncD/$OnePerD;}else{$PerD=0;}
		if($GrossD>0){$H222I=round($GrossD,2);}else{$H222I=0;} 
	    if($PerD>0){$H333I=round($PerD,2);}else{$H333I=0;}
	    if($IncD>0){$H444I=round($IncD,2);}else{$H444I=0;}
	 }
	 
     elseif($_REQUEST['action']=='Hod')
	 { $sql4I=mysql_query("select TPerInc from hrm_pms_dummy_increment_untot where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId, $con); 
	   $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross, SUM(EmpCurrIncentivePM) as DeptInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND (hrm_employee_pms.Dummy_EmpRating!=0 AND hrm_employee_pms.Dummy_AppRating!=0 AND hrm_employee_pms.Dummy_RevRating!=0 AND hrm_employee_pms.Dummy_HodRating!=0) AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value'], $con); $resD=mysql_fetch_assoc($sqlD);
	   $Pre_GrossValue=$resD['DeptTotGross']+$resD['DeptInct'];
       
	    $res4I=mysql_fetch_array($sql4I); 
		$IncD=($Pre_GrossValue*$res4I['TPerInc'])/100;
		$GrossD=$Pre_GrossValue+$IncD;
		$OnePerD=($Pre_GrossValue*1)/100;
		if($OnePerD>0){$PerD=$IncD/$OnePerD;}else{$PerD=0;}
		if($GrossD>0){$H222I=round($GrossD,2);}else{$H222I=0;} 
	    if($PerD>0){$H333I=round($PerD,2);}else{$H333I=0;}
	    if($IncD>0){$H444I=round($IncD,2);}else{$H444I=0;}
	 }
?>			   	
               <td align="center"><input style="border-style:hidden; border:0;width:100px;text-align:right;color:#FFFFFF;font-weight:bold; background-color:#0076EC; font-size:11px;" id="PIST" name="PIST" value="<?php echo $H222I; ?>" readonly/></td>
			   <td align="center"><input style="border-style:hidden; border:0;width:58px;text-align:center;color:#FFFFFF;font-weight:bold; background-color:#0076EC; font-size:11px;" id="PerIST" name="PerIST" value="<?php echo $H333I; ?>" readonly/></td>
			   <td align="center"><input style="border-style:hidden; border:0;width:100px;text-align:right;color:#FFFFFF;font-weight:bold; background-color:#0076EC; font-size:11px;" id="IncST" name="IncST" value="<?php echo $H444I; ?>" readonly/></td>	


<?php /**************************************** Dummy Close *********************************/ ?>
<?php /**************************************** Dummy Close *********************************/ ?>		  		   
<?php } else { ?>
<?php /**************************************** Actual Value Start *********************************/ ?>		
<?php /**************************************** Actual Value Start *********************************/ ?>			   
<?php 
if($_REQUEST['YI']==1)
{  
  if($_REQUEST['action']=='Over'){ $sqlHTotPT=mysql_query("select SUM(HR_GrossMonthlySalary)as HodTotP from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND (hrm_employee_pms.Dummy_EmpRating!=0 AND hrm_employee_pms.Dummy_AppRating!=0 AND hrm_employee_pms.Dummy_RevRating!=0 AND hrm_employee_pms.Dummy_HodRating!=0) AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Dept'){ $sqlHTotPT=mysql_query("select SUM(HR_GrossMonthlySalary)as HodTotP from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND (hrm_employee_pms.Dummy_EmpRating!=0 AND hrm_employee_pms.Dummy_AppRating!=0 AND hrm_employee_pms.Dummy_RevRating!=0 AND hrm_employee_pms.Dummy_HodRating!=0) AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Hod'){ $sqlHTotPT=mysql_query("select SUM(HR_GrossMonthlySalary)as HodTotP from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND (hrm_employee_pms.Dummy_EmpRating!=0 AND hrm_employee_pms.Dummy_AppRating!=0 AND hrm_employee_pms.Dummy_RevRating!=0 AND hrm_employee_pms.Dummy_HodRating!=0) AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
} 
elseif($_REQUEST['YI']>=2)
{  
  if($_REQUEST['action']=='Over'){ $sqlHTotPT=mysql_query("select SUM(HR_GrossMonthlySalary)as HodTotP from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND (hrm_employee_pms.Dummy_EmpRating!=0 AND hrm_employee_pms.Dummy_AppRating!=0 AND hrm_employee_pms.Dummy_RevRating!=0 AND hrm_employee_pms.Dummy_HodRating!=0) AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Dept'){ $sqlHTotPT=mysql_query("select SUM(HR_GrossMonthlySalary)as HodTotP from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND (hrm_employee_pms.Dummy_EmpRating!=0 AND hrm_employee_pms.Dummy_AppRating!=0 AND hrm_employee_pms.Dummy_RevRating!=0 AND hrm_employee_pms.Dummy_HodRating!=0) AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Hod'){ $sqlHTotPT=mysql_query("select SUM(HR_GrossMonthlySalary)as HodTotP from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND (hrm_employee_pms.Dummy_EmpRating!=0 AND hrm_employee_pms.Dummy_AppRating!=0 AND hrm_employee_pms.Dummy_RevRating!=0 AND hrm_employee_pms.Dummy_HodRating!=0) AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
} 
$resHTotPT=mysql_fetch_array($sqlHTotPT); if($resHTotPT['HodTotP']>0){$HTotPT=$resHTotPT['HodTotP'];}else{$HTotPT=0;}
?>	
			   <td align="center"><input style="border-style:hidden; border:0;width:100px;text-align:right;color:#FFFFFF;font-weight:bold; background-color:#0076EC; font-size:11px;" id="PIST" name="PIST" value="<?php echo $HTotPT; ?>" readonly/></td>
			      
<?php 
if($_REQUEST['YI']==1)
{  
  if($_REQUEST['action']=='Over'){ $sqlHTotIncST=mysql_query("select SUM(HR_IncNetMonthalySalary)as HodTotIncS from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND (hrm_employee_pms.Dummy_EmpRating!=0 AND hrm_employee_pms.Dummy_AppRating!=0 AND hrm_employee_pms.Dummy_RevRating!=0 AND hrm_employee_pms.Dummy_HodRating!=0) AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Dept'){ $sqlHTotIncST=mysql_query("select SUM(HR_IncNetMonthalySalary)as HodTotIncS from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND (hrm_employee_pms.Dummy_EmpRating!=0 AND hrm_employee_pms.Dummy_AppRating!=0 AND hrm_employee_pms.Dummy_RevRating!=0 AND hrm_employee_pms.Dummy_HodRating!=0) AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Hod'){ $sqlHTotIncST=mysql_query("select SUM(HR_IncNetMonthalySalary)as HodTotIncS from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND (hrm_employee_pms.Dummy_EmpRating!=0 AND hrm_employee_pms.Dummy_AppRating!=0 AND hrm_employee_pms.Dummy_RevRating!=0 AND hrm_employee_pms.Dummy_HodRating!=0) AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
} 
elseif($_REQUEST['YI']>=2)
{  
  if($_REQUEST['action']=='Over'){ $sqlHTotIncST=mysql_query("select SUM(HR_IncNetMonthalySalary)as HodTotIncS from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND (hrm_employee_pms.Dummy_EmpRating!=0 AND hrm_employee_pms.Dummy_AppRating!=0 AND hrm_employee_pms.Dummy_RevRating!=0 AND hrm_employee_pms.Dummy_HodRating!=0) AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Dept'){ $sqlHTotIncST=mysql_query("select SUM(HR_IncNetMonthalySalary)as HodTotIncS from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND (hrm_employee_pms.Dummy_EmpRating!=0 AND hrm_employee_pms.Dummy_AppRating!=0 AND hrm_employee_pms.Dummy_RevRating!=0 AND hrm_employee_pms.Dummy_HodRating!=0) AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Hod'){ $sqlHTotIncST=mysql_query("select SUM(HR_IncNetMonthalySalary)as HodTotIncS from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND (hrm_employee_pms.Dummy_EmpRating!=0 AND hrm_employee_pms.Dummy_AppRating!=0 AND hrm_employee_pms.Dummy_RevRating!=0 AND hrm_employee_pms.Dummy_HodRating!=0) AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
} 
$resHTotIncST=mysql_fetch_array($sqlHTotIncST);
$OnePerT=($HT*1)/100; 
if($resHTotIncST['HodTotIncS']>0 AND $OnePerT>0){$Inc_PerT=$resHTotIncST['HodTotIncS']/$OnePerT;} else {$Inc_PerT=0;}
$round_PerIncT=round($Inc_PerT,2);
if($resHTotIncST['HodTotIncS']>0){$HTotIncST=$resHTotIncST['HodTotIncS'];}else{$HTotIncST=0;}
?>				   
			   <td align="center"><input style="border-style:hidden; border:0;width:58px;text-align:center;color:#FFFFFF;font-weight:bold; background-color:#0076EC; font-size:11px;" id="PerIST" name="PerIST" value="<?php echo $round_PerIncT; ?>" readonly/></td>
			   <td align="center"><input style="border-style:hidden; border:0;width:100px;text-align:right;color:#FFFFFF;font-weight:bold; background-color:#0076EC; font-size:11px;" id="IncST" name="IncST" value="<?php echo $HTotIncST; ?>" readonly/></td>	
			   
<?php /**************************************** Actual Value Close *********************************/ ?>
<?php /**************************************** Actual Value Close *********************************/ ?>			
<?php } ?>	



<?php /**************************************** HOD Actual Total Value Start *********************************/ ?>		
<?php /**************************************** HOD Actual Total Value Start *********************************/ ?>
<?php 
if($_REQUEST['YI']==1)
{  
  if($_REQUEST['action']=='Over'){ $sqlHTotPT2=mysql_query("select SUM(Hod_ProIncSalary)as HodTotP2 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Hod_TotalFinalRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Dept'){ $sqlHTotPT2=mysql_query("select SUM(Hod_ProIncSalary)as HodTotP2 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Hod_TotalFinalRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Hod'){ $sqlHTotPT2=mysql_query("select SUM(Hod_ProIncSalary)as HodTotP2 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Hod_TotalFinalRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
} 
elseif($_REQUEST['YI']>=2)
{  
  if($_REQUEST['action']=='Over'){ $sqlHTotPT2=mysql_query("select SUM(Hod_ProIncSalary)as HodTotP2 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Hod_TotalFinalRating!=0 AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Dept'){ $sqlHTotPT2=mysql_query("select SUM(Hod_ProIncSalary)as HodTotP2 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Hod_TotalFinalRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Hod'){ $sqlHTotPT2=mysql_query("select SUM(Hod_ProIncSalary)as HodTotP2 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Hod_TotalFinalRating!=0 AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
} 
$resHTotPT2=mysql_fetch_array($sqlHTotPT2); if($resHTotPT2['HodTotP2']>0){$HTotPT2=$resHTotPT2['HodTotP2'];}else{$HTotPT2=0;}
?>	
			   <td align="center"><input style="border-style:hidden; border:0;width:100px;text-align:right;color:#FFFFFF;font-weight:bold; background-color:#0076EC; font-size:11px;" id="PISTth2" name="PISTth2" value="<?php echo $HTotPT2; ?>" readonly/></td>
			   
<?php if($_REQUEST['YI']==1)
{  
  if($_REQUEST['action']=='Over'){ $sqlHTotPT22=mysql_query("select SUM(Hod_ProCorrSalary)as HodTotP22 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Hod_TotalFinalRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Dept'){ $sqlHTotPT22=mysql_query("select SUM(Hod_ProCorrSalary)as HodTotP2 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Hod_TotalFinalRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Hod'){ $sqlHTotPT22=mysql_query("select SUM(Hod_ProCorrSalary)as HodTotP2 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Hod_TotalFinalRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
} 
elseif($_REQUEST['YI']>=2)
{  
  if($_REQUEST['action']=='Over'){ $sqlHTotPT22=mysql_query("select SUM(Hod_ProCorrSalary)as HodTotP22 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Hod_TotalFinalRating!=0 AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Dept'){ $sqlHTotPT22=mysql_query("select SUM(Hod_ProCorrSalary)as HodTotP22 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Hod_TotalFinalRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Hod'){ $sqlHTotPT22=mysql_query("select SUM(Hod_ProCorrSalary)as HodTotP22 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Hod_TotalFinalRating!=0 AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
} 
$resHTotPT22=mysql_fetch_array($sqlHTotPT22); if($resHTotPT22['HodTotP22']>0){$HTotPT22=$resHTotPT22['HodTotP22'];}else{$HTotPT22=0;}
?>	
			   <td align="center"><input style="border-style:hidden; border:0;width:100px;text-align:right;color:#FFFFFF;font-weight:bold; background-color:#0076EC; font-size:11px;" id="PISTth22" name="PISTth22" value="<?php echo $HTotPT22; ?>" readonly/></td>

<?php if($_REQUEST['YI']==1)
{  
  if($_REQUEST['action']=='Over'){ $sqlHTotPT222=mysql_query("select SUM(Hod_GrossMonthlySalary)as HodTotP222 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Hod_TotalFinalRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Dept'){ $sqlHTotPT222=mysql_query("select SUM(Hod_GrossMonthlySalary)as HodTotP222 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Hod_TotalFinalRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Hod'){ $sqlHTotPT222=mysql_query("select SUM(Hod_GrossMonthlySalary)as HodTotP222 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Hod_TotalFinalRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
} 
elseif($_REQUEST['YI']>=2)
{  
  if($_REQUEST['action']=='Over'){ $sqlHTotPT222=mysql_query("select SUM(Hod_GrossMonthlySalary)as HodTotP222 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Hod_TotalFinalRating!=0 AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Dept'){ $sqlHTotPT222=mysql_query("select SUM(Hod_GrossMonthlySalary)as HodTotP222 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Hod_TotalFinalRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Hod'){ $sqlHTotPT222=mysql_query("select SUM(Hod_GrossMonthlySalary)as HodTotP222 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Hod_TotalFinalRating!=0 AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
} 
$resHTotPT222=mysql_fetch_array($sqlHTotPT222); if($resHTotPT222['HodTotP222']>0){$HTotPT222=$resHTotPT222['HodTotP222'];}else{$HTotPT222=0;}
?>	
			   <td align="center"><input style="border-style:hidden; border:0;width:100px;text-align:right;color:#FFFFFF;font-weight:bold; background-color:#0076EC; font-size:11px;" id="PISTth222" name="PISTth222" value="<?php echo $HTotPT222; ?>" readonly/></td>

<?php 
if($_REQUEST['YI']==1)
{  
  if($_REQUEST['action']=='Over'){ $sqlHTotIncST2=mysql_query("select SUM(Hod_IncNetMonthalySalary)as HodTotIncS2 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Hod_TotalFinalRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Dept'){ $sqlHTotIncST2=mysql_query("select SUM(Hod_IncNetMonthalySalary)as HodTotIncS2 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Hod_TotalFinalRating!=0 AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Hod'){ $sqlHTotIncST2=mysql_query("select SUM(Hod_IncNetMonthalySalary)as HodTotIncS2 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Hod_TotalFinalRating!=0 AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
} 
elseif($_REQUEST['YI']>=2)
{  
  if($_REQUEST['action']=='Over'){ $sqlHTotIncST2=mysql_query("select SUM(Hod_IncNetMonthalySalary)as HodTotIncS2 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Hod_TotalFinalRating!=0 AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Dept'){ $sqlHTotIncST2=mysql_query("select SUM(Hod_IncNetMonthalySalary)as HodTotIncS2 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Hod_TotalFinalRating!=0 AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
  elseif($_REQUEST['action']=='Hod'){ $sqlHTotIncST2=mysql_query("select SUM(Hod_IncNetMonthalySalary)as HodTotIncS2 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Hod_TotalFinalRating!=0 AND hrm_employee_general.DateJoining<='".$Yydate."' AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); }
} 

$resHTotIncST2=mysql_fetch_array($sqlHTotIncST2);
if($HT>0){ $TotalIncPropT=$HTotPT2-$HT;  $TotalIncCorrT=$HTotPT22;} else{$TotalIncPropT=0; $TotalIncCorrT=0;}
$OnePerT2=($HT*1)/100;
$Inc_Per2PT=$TotalIncPropT/$OnePerT2; $round_PerInc2PT=round($Inc_Per2PT,2);
$Inc_Per2CT=$TotalIncCorrT/$OnePerT2; $round_PerInc2CT=round($Inc_Per2CT,2);
$TotInc=$TotalIncPropT+$TotalIncCorrT;
$Inc_Per2TT=$TotInc/$OnePerT2; $round_PerInc2TT=round($Inc_Per2TT,2);

/*
if($HT>0){ $TotalIncPropT=$HTotPT2-$HT;  $TotalIncCorrT=$HTotPT22;}else{$TotalIncPropT=0; $TotalIncCorrT=0;}
$OnePerT2=($HT*1)/100; 
$Inc_Per2PT=$TotalIncPropT/$OnePerT2; $round_PerInc2PT=round($Inc_Per2PT,2);
$Inc_Per2CT=$TotalIncCorrT/$OnePerT2; $round_PerInc2CT=round($Inc_Per2CT,2);
$Inc_Per2TT=$resHTotIncST2['HodTotIncS2']/$OnePerT2; $round_PerInc2TT=round($Inc_Per2TT,2);
*/
//echo 'aa='.$resHTotIncST2['HodTotIncS2'].'-'.$OnePerT2;

//if($resHTotIncST2['HodTotIncS2']>0 AND $OnePerT2>0){$Inc_PerT2=$resHTotIncST2['HodTotIncS2']/$OnePerT2;} else {$Inc_PerT2=0;}
//$round_PerIncT2=round($Inc_PerT2,2);
//if($resHTotIncST2['HodTotIncS2']>0){$HTotIncST2=$resHTotIncST2['HodTotIncS2'];}else{$HTotIncST2=0;}
?>				   
			   <td align="center"><input style="border-style:hidden; border:0;width:58px;text-align:center;color:#FFFFFF;font-weight:bold; background-color:#0076EC; font-size:11px;" id="PerISTthPT" name="PerISTthPT" value="<?php echo $round_PerInc2PT; ?>" readonly/></td>
			   <td align="center"><input style="border-style:hidden; border:0;width:58px;text-align:center;color:#FFFFFF;font-weight:bold; background-color:#0076EC; font-size:11px;" id="PerISTthCT" name="PerISTthCT" value="<?php echo $round_PerInc2CT; ?>" readonly/></td>
			   <td align="center"><input style="border-style:hidden; border:0;width:58px;text-align:center;color:#FFFFFF;font-weight:bold; background-color:#0076EC; font-size:11px;" id="PerISTthTT" name="PerISTthTT" value="<?php echo $round_PerInc2TT; ?>" readonly/></td>
<?php   
//$resHTotIncST2=mysql_fetch_array($sqlHTotIncST2);
//$OnePerT2=($resHT['HodGross']*1)/100; 
//if($resHTotIncST2['HodTotIncS2']>0 AND $OnePerT2>0){$Inc_PerT2=$resHTotIncST2['HodTotIncS2']/$OnePerT2;} else {$Inc_PerT2=0;}
//$round_PerIncT2=round($Inc_PerT2,2);
//if($resHTotIncST2['HodTotIncS2']>0){$HTotIncST2=$resHTotIncST2['HodTotIncS2'];}else{$HTotIncST2=0;}
if($TotInc>0){$HTotIncST2=$TotInc;}else{$HTotIncST2=0;}
?>				   
			   <td align="center"><input style="border-style:hidden; border:0;width:100px;text-align:right;color:#FFFFFF;font-weight:bold; background-color:#0076EC; font-size:11px;" id="IncSTth" name="IncSTth" value="<?php echo $HTotIncST2; ?>" readonly/></td>	


<?php /**************************************** HOD Actual Total Value Close *********************************/ ?>
<?php /**************************************** HOD Actual Total Value Close *********************************/ ?>	


	          </tr> 

<?php /**************************** Without Un assigned Close ************************************/?> 
<?php /**************************** Without Un assigned Close ************************************/?> 


<?php /**************************** Unussed Open ************************************/?> 
<?php /**************************** Unussed Open ************************************/?>
<tr bgcolor="#909090"><td colspan="20" style="height:20px;color:#FFFFFF;font-family:Times New Roman;">&nbsp;<b>With Un-assigned</b></td></tr>

		  <?php /****************************************Un assigned Start *******************************************/ //hrm_employee_general.DateJoining>'".date('Y-03-31')."' ?>
<?php //if($_REQUEST['YI']==$YearId){ ?>		
              <tr bgcolor="#909090">
		       <td colspan="2" align="right" style="height:20px;width:130px;"><a href="#" onClick="OpenUnAssignWin(<?php echo $_REQUEST['YI'].', '.$CompanyId; ?>)" style="text-decoration:underline;">
			   <font style="font-family:Times New Roman;color:#FFFFFF;font-size:14px;height:20px;width:130px;"><b>All Emp</b></font></a>&nbsp;</td>
			   
<?php if($_REQUEST['action']=='Over'){ $sqlEUn=mysql_query("select SUM(EmpCurrGrossPM)as UnEmpGross, SUM(EmpCurrIncentivePM) as UnEmpInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_EmpRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $NOEUn=mysql_query("select count(*) as NOEUn from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_EmpRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); }
	  elseif($_REQUEST['action']=='Dept'){ $sqlEUn=mysql_query("select SUM(EmpCurrGrossPM)as UnEmpGross, SUM(EmpCurrIncentivePM) as UnEmpInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_EmpRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $NOEUn=mysql_query("select count(*) as NOEUn from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_EmpRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); }
	  elseif($_REQUEST['action']=='Hod'){ $sqlEUn=mysql_query("select SUM(EmpCurrGrossPM)as UnEmpGross, SUM(EmpCurrIncentivePM) as UnEmpInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_EmpRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $NOEUn=mysql_query("select count(*) as NOEUn from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_EmpRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); }
	   $resEUn=mysql_fetch_array($sqlEUn); $resNOEUn=mysql_fetch_assoc($NOEUn); if($resEUn['UnEmpGross']>0){$UnEmpGross=$resEUn['UnEmpGross']+$resEUn['UnEmpInct'];}else{$UnEmpGross=0;} ?>	
	           <td align="center" style="" class="All_50"><b style="color:#FFFFFF;"><?php echo $resNOEUn['NOEUn']; ?></b></td>		   
			   <td align="right" style="" class="All_100"><b style="color:#FFFFFF;"><?php echo $UnEmpGross; ?></b>&nbsp;
			   <input type="hidden" name="UnEmpGross" id="UnEmpGross" value="<?php echo $UnEmpGross; ?>" /></td>
			   
<?php if($_REQUEST['action']=='Over'){ $sqlAUn=mysql_query("select SUM(EmpCurrGrossPM)as UnAppGross, SUM(EmpCurrIncentivePM) as UnAppInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_AppRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $NOAUn=mysql_query("select count(*) as NOAUn from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_AppRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con);}
	  elseif($_REQUEST['action']=='Dept'){ $sqlAUn=mysql_query("select SUM(EmpCurrGrossPM)as UnAppGross, SUM(EmpCurrIncentivePM) as UnAppInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_AppRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $NOAUn=mysql_query("select count(*) as NOAUn from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_AppRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con);}
	  elseif($_REQUEST['action']=='Hod'){ $sqlAUn=mysql_query("select SUM(EmpCurrGrossPM)as UnAppGross, SUM(EmpCurrIncentivePM) as UnAppInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_AppRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $NOAUn=mysql_query("select count(*) as NOAUn from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_AppRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); }
	   $resAUn=mysql_fetch_array($sqlAUn); $resNOAUn=mysql_fetch_assoc($NOAUn); if($resAUn['UnAppGross']>0){$UnAppGross=$resAUn['UnAppGross']+$resAUn['UnAppInct'];}else{$UnAppGross=0;} ?>	
	           <td align="center" style="" class="All_50"><b style="color:#FFFFFF;"><?php echo $resNOAUn['NOAUn']; ?></b></td>				   
			   <td align="right" style="" class="All_100"><b style="color:#FFFFFF;"><?php echo $UnAppGross; ?></b>&nbsp;
			   <input type="hidden" name="UnAppGross" id="UnAppGross" value="<?php echo $UnAppGross; ?>" /></td>
			   
<?php if($_REQUEST['action']=='Over'){ $sqlRUn=mysql_query("select SUM(EmpCurrGrossPM)as UnRevGross, SUM(EmpCurrIncentivePM) as UnRevInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_RevRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $NORUn=mysql_query("select count(*) as NORUn from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_RevRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); }
	  elseif($_REQUEST['action']=='Dept'){ $sqlRUn=mysql_query("select SUM(EmpCurrGrossPM)as UnRevGross, SUM(EmpCurrIncentivePM) as UnRevInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_RevRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $NORUn=mysql_query("select count(*) as NORUn from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_RevRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con);}
	  elseif($_REQUEST['action']=='Hod'){ $sqlRUn=mysql_query("select SUM(EmpCurrGrossPM)as UnRevGross, SUM(EmpCurrIncentivePM) as UnRevInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_RevRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $NORUn=mysql_query("select count(*) as NORUn from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_RevRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); }
	   $resRUn=mysql_fetch_array($sqlRUn); $resNORUn=mysql_fetch_assoc($NORUn); if($resRUn['UnRevGross']>0){$UnRevGross=$resRUn['UnRevGross']+$resRUn['UnRevInct'];}else{$UnRevGross=0;} ?>	
	           <td align="center" style="" class="All_50"><b style="color:#FFFFFF;"><?php echo $resNORUn['NORUn']; ?></b></td>				   
			   <td align="right" style="" class="All_100"><b style="color:#FFFFFF;"><?php echo $UnRevGross; ?></b>&nbsp;
			   <input type="hidden" name="UnRevGross" id="UnRevGross" value="<?php echo $UnRevGross; ?>" /></td>
			   
<?php if($_REQUEST['action']=='Over'){ $sqlHUn=mysql_query("select SUM(EmpCurrGrossPM)as UnHodGross, SUM(EmpCurrIncentivePM) as UnHodInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_HodRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $NOHUn=mysql_query("select count(*) as NOHUn from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_HodRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); }
	  elseif($_REQUEST['action']=='Dept'){ $sqlHUn=mysql_query("select SUM(EmpCurrGrossPM)as UnHodGross, SUM(EmpCurrIncentivePM) as UnHodInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_HodRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $NOHUn=mysql_query("select count(*) as NOHUn from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_HodRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con);}
	  elseif($_REQUEST['action']=='Hod'){ $sqlHUn=mysql_query("select SUM(EmpCurrGrossPM)as UnHodGross, SUM(EmpCurrIncentivePM) as UnHodInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_HodRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $NOHUn=mysql_query("select count(*) as NOHUn from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_HodRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); }
	   $resHUn=mysql_fetch_array($sqlHUn); $resNOHUn=mysql_fetch_assoc($NOHUn); if($resHUn['UnHodGross']>0){$UnHodGross=$resHUn['UnHodGross']+$resHUn['UnHodInct'];}else{$UnHodGross=0;} ?>
	           <td align="center" style="" class="All_50"><b style="color:#FFFFFF;"><?php echo $resNOHUn['NOHUn']; ?></b></td>					   
			   <td align="right" style="" class="All_100"><b style="color:#FFFFFF;"><?php echo $UnHodGross; ?></b>&nbsp;
			   <input type="hidden" name="UnHodGross" id="UnHodGross" value="<?php echo $UnHodGross; ?>" /></td> 
			   
			   
<?php if(date("Y-m-d")>=date('Y-01-01') AND date("Y-m-d")<date('Y-02-01') AND $_REQUEST['YI']==$YearId){ ?>	
<?php /**************************************** Dummy Start *********************************/ ?>	
<?php /**************************************** Dummy Start *********************************/ ?>			   
<?php if($_REQUEST['action']=='Over')
     { $sql3I=mysql_query("select IncGross,PerInc,Inc from hrm_pms_dummy_increment_un where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId, $con);
	  
	   $sqlCH=mysql_query("select Dummy_HodRating from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_HodRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $rowCH=mysql_num_rows($sqlCH);
		$sqlCR=mysql_query("select Dummy_RevRating from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_RevRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $rowCR=mysql_num_rows($sqlCR);
		$sqlCA=mysql_query("select Dummy_AppRating from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_AppRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $rowCA=mysql_num_rows($sqlCA);
		$sqlCE=mysql_query("select Dummy_EmpRating from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_EmpRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $rowCE=mysql_num_rows($sqlCE);
/*		
if($rowCH==0)
{ if($rowCR==0)
  { if($rowCA==0)
    { if($rowCE==0)
      { $Pre_GrossValue=0;}
      else
	  {
	   $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Dummy_EmpRating=0", $con); $resD=mysql_fetch_assoc($sqlD);
	   $Pre_GrossValue=$resD['DeptTotGross']; 
	  }
    }
    else
	{
	 $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Dummy_AppRating=0", $con); $resD=mysql_fetch_assoc($sqlD);
	 $Pre_GrossValue=$resD['DeptTotGross'];
	}
  } 
  else
  {
   $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Dummy_RevRating=0", $con); $resD=mysql_fetch_assoc($sqlD);
   $Pre_GrossValue=$resD['DeptTotGross'];
  }
}
else
{ 
 $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Dummy_HodRating=0", $con); $resD=mysql_fetch_assoc($sqlD);
 $Pre_GrossValue=$resD['DeptTotGross'];
} 
*/   
if($rowCH==0){ $Pre_GrossValue=0; } 
else { $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross, SUM(EmpCurrIncentivePM) as DeptInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_HodRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $resD=mysql_fetch_assoc($sqlD);
 $Pre_GrossValue=$resD['DeptTotGross']+$resD['DeptInct']; }   
       
	    $res3I=mysql_fetch_array($sql3I); 
		$IncD=($Pre_GrossValue*$res3I['PerInc'])/100;
		$GrossD=$Pre_GrossValue+$IncD;
		$OnePerD=($Pre_GrossValue*1)/100;
		if($OnePerD>0){$PerD=$IncD/$OnePerD;}else{$PerD=0;}
		if($GrossD>0){$H22I=round($GrossD,2);}else{$H22I=0;} 
	    if($PerD>0){$H33I=round($PerD,2);}else{$H33I=0;}
	    if($IncD>0){$H44I=round($IncD,2);}else{$H44I=0;}

       //$res3I=mysql_fetch_array($sql3I);  
	   //if($res3I['IncGross']>0){$H22I=$res3I['IncGross'];}else{$H22I=0;} 
	   //if($res3I['PerInc']>0){$H33I=$res3I['PerInc'];}else{$H33I=0;}
	   //if($res3I['Inc']>0){$H44I=$res3I['Inc'];}else{$H44I=0;}
     }
	 
	 elseif($_REQUEST['action']=='Dept')
	 { $sql3I=mysql_query("select PerInc from hrm_pms_dummy_increment_un where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId, $con);
	   $sqlCH=mysql_query("select Dummy_HodRating from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_HodRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $rowCH=mysql_num_rows($sqlCH);
	   $sqlCR=mysql_query("select Dummy_RevRating from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_RevRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $rowCR=mysql_num_rows($sqlCR);
	   $sqlCA=mysql_query("select Dummy_AppRating from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_AppRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $rowCA=mysql_num_rows($sqlCA);
	   $sqlCE=mysql_query("select Dummy_EmpRating from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_EmpRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $rowCE=mysql_num_rows($sqlCE);
/*	   
if($rowCH==0)
{ if($rowCR==0)
  { if($rowCA==0)
    { if($rowCE==0)
      { $Pre_GrossValue=0;}
      else
	  {
	   $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Dummy_EmpRating=0", $con); $resD=mysql_fetch_assoc($sqlD);
	   $Pre_GrossValue=$resD['DeptTotGross']; 
	  }
    }
    else
	{
	 $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Dummy_AppRating=0", $con); $resD=mysql_fetch_assoc($sqlD);
	 $Pre_GrossValue=$resD['DeptTotGross'];
	}
  } 
  else
  {
   $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Dummy_RevRating=0", $con); $resD=mysql_fetch_assoc($sqlD);
   $Pre_GrossValue=$resD['DeptTotGross'];
  }
}
else
{ 
 $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Dummy_HodRating=0", $con); $resD=mysql_fetch_assoc($sqlD);
 $Pre_GrossValue=$resD['DeptTotGross'];
}  
*/
if($rowCH==0){ $Pre_GrossValue=0; } 
else { $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross, SUM(EmpCurrIncentivePM) as DeptInct from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.Dummy_HodRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $resD=mysql_fetch_assoc($sqlD);
 $Pre_GrossValue=$resD['DeptTotGross']+$resD['DeptInct']; }    
       
	    $res3I=mysql_fetch_array($sql3I); 
		$IncD=($Pre_GrossValue*$res3I['PerInc'])/100;
		$GrossD=$Pre_GrossValue+$IncD;
		$OnePerD=($Pre_GrossValue*1)/100;
		if($OnePerD>0){$PerD=$IncD/$OnePerD;}else{$PerD=0;}
		if($GrossD>0){$H22I=round($GrossD,2);}else{$H22I=0;} 
	    if($PerD>0){$H33I=round($PerD,2);}else{$H33I=0;}
	    if($IncD>0){$H44I=round($IncD,2);}else{$H44I=0;}
	 }
	 
	 elseif($_REQUEST['action']=='Hod')
	 { $sql3I=mysql_query("select PerInc from hrm_pms_dummy_increment_un where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId, $con);
	   $sqlCH=mysql_query("select Dummy_HodRating from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_HodRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $rowCH=mysql_num_rows($sqlCH);
		$sqlCR=mysql_query("select Dummy_RevRating from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_RevRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $rowCR=mysql_num_rows($sqlCR);
		$sqlCA=mysql_query("select Dummy_AppRating from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_AppRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $rowCA=mysql_num_rows($sqlCA);
		$sqlCE=mysql_query("select Dummy_EmpRating from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_EmpRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $rowCE=mysql_num_rows($sqlCE);
/*		
if($rowCH==0)
{ if($rowCR==0)
  { if($rowCA==0)
    { if($rowCE==0)
      { $Pre_GrossValue=0;}
      else
	  {
	   $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_EmpRating=0", $con); $resD=mysql_fetch_assoc($sqlD);
	   $Pre_GrossValue=$resD['DeptTotGross'];
	  }
    }
    else
	{
	 $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_AppRating=0", $con); $resD=mysql_fetch_assoc($sqlD);
	 $Pre_GrossValue=$resD['DeptTotGross'];
	}
  } 
  else
  {
   $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_RevRating=0", $con); $resD=mysql_fetch_assoc($sqlD);
   $Pre_GrossValue=$resD['DeptTotGross'];
  }
}
else
{ 
 $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_HodRating=0", $con); $resD=mysql_fetch_assoc($sqlD);
 $Pre_GrossValue=$resD['DeptTotGross'];
}  
*/
if($rowCH==0){ $Pre_GrossValue=0; } 
else {  $sqlD=mysql_query("select SUM(EmpCurrGrossPM)as DeptTotGross, SUM(EmpCurrIncentivePM) as DeptInct from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Dummy_HodRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); $resD=mysql_fetch_assoc($sqlD);
 $Pre_GrossValue=$resD['DeptTotGross']+$resD['DeptInct']; }
    
	    $res3I=mysql_fetch_array($sql3I); 
		$IncD=($Pre_GrossValue*$res3I['PerInc'])/100;
		$GrossD=$Pre_GrossValue+$IncD;
		$OnePerD=($Pre_GrossValue*1)/100;
		if($OnePerD>0){$PerD=$IncD/$OnePerD;}else{$PerD=0;}
		if($GrossD>0){$H22I=round($GrossD,2);}else{$H22I=0;} 
	    if($PerD>0){$H33I=round($PerD,2);}else{$H33I=0;}
	    if($IncD>0){$H44I=round($IncD,2);}else{$H44I=0;}
		
	  }
	      
?>			   	
              <td align="center"><input style="border-style:hidden; border:0;width:100px;text-align:right;color:#FFFFFF;font-weight:bold; background-color:#909090; font-size:11px;" id="UnPIS" name="UnPIS" value="<?php echo ''//$H22I; ?>" onKeyDown="OneUn()" onClick="OneUn()" onChange="OneUn()" disabled /></td>
              <td align="center"><input style="border-style:hidden; border:0;width:58px;text-align:center;color:#FFFFFF;font-weight:bold; background-color:#909090; font-size:11px;" id="UnPerIS" name="UnPerIS" value="<?php echo ''//$H33I; ?>" onKeyDown="TwoUn()" onChange="TwoUn()" disabled /></td>
			  <td align="center"><input style="border-style:hidden; border:0;width:100px;text-align:right;color:#FFFFFF;font-weight:bold; background-color:#909090; font-size:11px;" id="UnIncS" name="UnIncS" value="<?php echo ''//$H44I; ?>" onKeyDown="ThreeUn()" onClick="ThreeUn()" onChange="ThreeUn()" disabled /></td>	
<?php /**************************************** Dummy Close *********************************/ ?>
<?php /**************************************** Dummy Close *********************************/ ?>		  		   
<?php } else { ?>
<?php /**************************************** Actual Value Start *********************************/ ?>		
<?php /**************************************** Actual Value Start *********************************/ ?>			   
<?php if($_REQUEST['action']=='Over'){ $sqlUnHTotP=mysql_query("select SUM(HR_GrossMonthlySalary)as UnHodTotP from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_HodRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); }
	  elseif($_REQUEST['action']=='Dept'){ $sqlUnHTotP=mysql_query("select SUM(HR_GrossMonthlySalary)as UnHodTotP from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_HodRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); }
	  elseif($_REQUEST['action']=='Hod'){ $sqlUnHTotP=mysql_query("select SUM(HR_GrossMonthlySalary)as UnHodTotP from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_HodRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); }
	   $resUnHTotP=mysql_fetch_array($sqlUnHTotP); if($resUnHTotP['UnHodTotP']>0){$UnHTotP=$resUnHTotP['UnHodTotP'];}else{$UnHTotP=0;} ?>					      
			   <td align="center"><input style="border-style:hidden; border:0;width:100px;text-align:right;color:#FFFFFF;font-weight:bold; background-color:#909090; font-size:11px;" id="UnPIS" name="UnPIS" value="<?php echo ''//$UnHTotP; ?>" onKeyDown="OneUn()" onClick="OneUn()" onChange="OneUn()" disabled /></td>
			   
<?php if($_REQUEST['action']=='Over'){ $sqlUnHTotIncS=mysql_query("select SUM(HR_IncNetMonthalySalary)as UnHodTotIncS from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_HodRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); }
	  elseif($_REQUEST['action']=='Dept'){ $sqlUnHTotIncS=mysql_query("select SUM(HR_IncNetMonthalySalary)as UnHodTotIncS from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_HodRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); }
	  elseif($_REQUEST['action']=='Hod'){ $sqlUnHTotIncS=mysql_query("select SUM(HR_IncNetMonthalySalary)as UnHodTotIncS from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Dummy_HodRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); }
	   $resUnHTotIncS=mysql_fetch_array($sqlUnHTotIncS); 
$UnOnePer=($UnHodGross*1)/100; 
if($resUnHTotIncS['UnHodTotIncS']>0 AND $UnOnePer>0){$UnInc_Per=$resUnHTotIncS['UnHodTotIncS']/$UnOnePer;} else {$UnInc_Per=0;}
$Unround_PerInc=round($UnInc_Per,2);
if($resUnHTotIncS['UnHodTotIncS']>0){$UnHTotIncS=$resUnHTotIncS['UnHodTotIncS'];}else{$UnHTotIncS=0;}	   
?>			      
			   <td align="center"><input style="border-style:hidden; border:0;width:58px;text-align:center;color:#FFFFFF;font-weight:bold; background-color:#909090; font-size:11px;" id="UnPerIS" name="UnPerIS" value="<?php echo ''//$Unround_PerInc; ?>" onKeyDown="TwoUn()" onChange="TwoUn()" disabled /></td>
			   <td align="center"><input style="border-style:hidden; border:0;width:100px;text-align:right;color:#FFFFFF;font-weight:bold; background-color:#909090; font-size:11px;" id="UnIncS" name="UnIncS" value="<?php echo ''//$UnHTotIncS; ?>" onKeyDown="ThreeUn()" onClick="ThreeUn()" onChange="ThreeUn()" disabled /></td>	
			   
<?php /**************************************** Actual Value Close *********************************/ ?>
<?php /**************************************** Actual Value Close *********************************/ ?>			
<?php } ?>

<?php /**************************************** Un-HOD Actual Total Value Start *********************************/ ?>		
<?php /**************************************** Un-HOD Actual Total Value Start *********************************/ ?>			   
<?php if($_REQUEST['action']=='Over'){ $sqlUnHTotP2=mysql_query("select SUM(Hod_GrossMonthlySalary)as UnHodTotP2 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Hod_TotalFinalRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); }
	  elseif($_REQUEST['action']=='Dept'){ $sqlUnHTotP2=mysql_query("select SUM(Hod_GrossMonthlySalary)as UnHodTotP2 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Hod_TotalFinalRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); }
	  elseif($_REQUEST['action']=='Hod'){ $sqlUnHTotP2=mysql_query("select SUM(Hod_GrossMonthlySalary)as UnHodTotP2 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Hod_TotalFinalRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); }
	   $resUnHTotP2=mysql_fetch_array($sqlUnHTotP2); if($resUnHTotP2['UnHodTotP2']>0){$UnHTotP2=$resUnHTotP2['UnHodTotP2'];}else{$UnHTotP2=0;} ?>					
			   <td align="center"><input style="border-style:hidden; border:0;width:100px;text-align:right;color:#FFFFFF;font-weight:bold; background-color:#909090; font-size:11px;" id="UnPISth" name="UnPISth" value="<?php echo ''//$UnHTotP2; ?>" onKeyDown="OneUnth()" onClick="OneUnth()" onChange="OneUnth()" readonly /></td>
			   
<?php if($_REQUEST['action']=='Over'){ $sqlUnHTotIncS2=mysql_query("select SUM(Hod_IncNetMonthalySalary)as UnHodTotIncS2 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Hod_TotalFinalRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); }
	  elseif($_REQUEST['action']=='Dept'){ $sqlUnHTotIncS2=mysql_query("select SUM(Hod_IncNetMonthalySalary)as UnHodTotIncS2 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Hod_TotalFinalRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); }
	  elseif($_REQUEST['action']=='Hod'){ $sqlUnHTotIncS2=mysql_query("select SUM(Hod_IncNetMonthalySalary)as UnHodTotIncS2 from hrm_employee_pms INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.Appraiser_EmployeeID!=0 AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Hod_TotalFinalRating=0 AND hrm_employee_general.DateJoining<='".$Yydate."'", $con); }
$resUnHTotIncS2=mysql_fetch_array($sqlUnHTotIncS2); 
$UnOnePer2=($UnHodGross*1)/100; 
if($resUnHTotIncS2['UnHodTotIncS2']>0 AND $UnOnePer2>0){$UnInc_Per2=$resUnHTotIncS2['UnHodTotIncS2']/$UnOnePer2;} else {$UnInc_Per2=0;}
$Unround_PerInc2=round($UnInc_Per2,2);
if($resUnHTotIncS2['UnHodTotIncS2']>0){$UnHTotIncS2=$resUnHTotIncS2['UnHodTotIncS2'];}else{$UnHTotIncS2=0;}	   
?>			      
			   <td align="center"><input style="border-style:hidden; border:0;width:58px;text-align:center;color:#FFFFFF;font-weight:bold; background-color:#909090; font-size:11px;" id="UnPerISth" name="UnPerISth" value="<?php echo ''//$Unround_PerInc2; ?>" onKeyDown="TwoUnth()" onChange="TwoUnth()" readonly /></td>
			   <td align="center"><input style="border-style:hidden; border:0;width:100px;text-align:right;color:#FFFFFF;font-weight:bold; background-color:#909090; font-size:11px;" id="UnIncSth" name="UnIncSth" value="<?php echo ''//$UnHTotIncS2; ?>" onKeyDown="ThreeUnth()" onClick="ThreeUnth()" onChange="ThreeUnth()" readonly /></td>	
			   
			   <td align="center"><input style="border-style:hidden; border:0;width:58px;text-align:center;color:#FFFFFF;font-weight:bold; background-color:#909090; font-size:11px;" id="UnPerISth" name="UnPerISth" value="<?php echo ''//$Unround_PerInc2; ?>" onKeyDown="TwoUnth()" onChange="TwoUnth()" readonly /></td>
			   <td align="center"><input style="border-style:hidden; border:0;width:100px;text-align:right;color:#FFFFFF;font-weight:bold; background-color:#909090; font-size:11px;" id="UnIncSth" name="UnIncSth" value="<?php echo ''//$UnHTotIncS2; ?>" onKeyDown="ThreeUnth()" onClick="ThreeUnth()" onChange="ThreeUnth()" readonly /></td>	
			   
			   <td align="center"><input style="border-style:hidden; border:0;width:58px;text-align:center;color:#FFFFFF;font-weight:bold; background-color:#909090; font-size:11px;" id="UnPerISth" name="UnPerISth" value="<?php echo ''//$Unround_PerInc2; ?>" onKeyDown="TwoUnth()" onChange="TwoUnth()" readonly /></td>
			   <td align="center"><input style="border-style:hidden; border:0;width:100px;text-align:right;color:#FFFFFF;font-weight:bold; background-color:#909090; font-size:11px;" id="UnIncSth" name="UnIncSth" value="<?php echo ''//$UnHTotIncS2; ?>" onKeyDown="ThreeUnth()" onClick="ThreeUnth()" onChange="ThreeUnth()" readonly /></td>	
			   
<?php /**************************************** Un-HOD Actual Total Value Close *********************************/ ?>
<?php /**************************************** Un-HOD Actual Total Value Close *********************************/ ?>	
	   			
   		   	   
		      
			<?php   //<td colspan="3" align="right" style="" class="All_100">&nbsp;</td>	?>
	          </tr> 
<?php $EuGross=$UnEmpGross; $AuGross=$UnAppGross; $RuGross=$UnRevGross; $HuGross=$UnHodGross;
//} else { $EuGross=0; $AuGross=0; $RuGross=0; $HuGross=0; } ?>			
<?php /****************************************Un assigned Closed *******************************************/ ?>  

<?php /**************************** Unussed close ************************************/?> 
<?php /**************************** Unussed close ************************************/?> 

<?php /**************************** Total Open ************************************/?> 

<?php /**************************** Total close ************************************/?> 

	
	
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

			
<?php //*************************************************************************************************************************************************** ?>
<?php } ?>
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

