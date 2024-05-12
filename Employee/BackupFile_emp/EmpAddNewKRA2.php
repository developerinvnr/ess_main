<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
$sqlSY=mysql_query("select OldY,CurrY,NewY from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='KRA'", $con); $resSY=mysql_fetch_array($sqlSY); 
$sqlSYP=mysql_query("select OldY,CurrY,NewY from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'", $con); $resSYP=mysql_fetch_array($sqlSYP); 
//echo $resSY['OldY'].'-'.$resSY['CurrY'].'-'.$resSY['NewY'].'-'.$resSYP['OldY'].'-'.$resSYP['CurrY'].'-'.$resSYP['NewY'];

$sqlOld=mysql_query("select * from hrm_year where YearId=".$resSY['OldY'], $con); $resOld=mysql_fetch_assoc($sqlOld); 
$sqlCurr=mysql_query("select * from hrm_year where YearId=".$resSY['CurrY'], $con); $resCurr=mysql_fetch_assoc($sqlCurr);
$sqlNew=mysql_query("select * from hrm_year where YearId=".$resSY['NewY'], $con); $resNew=mysql_fetch_assoc($sqlNew);	
$FromOld=date("Y", strtotime($resOld['FromDate'])); $ToOld=date("Y", strtotime($resOld['ToDate'])); 
$FromCurr=date("Y", strtotime($resCurr['FromDate'])); $ToCurr=date("Y", strtotime($resCurr['ToDate']));
$FromNew=date("Y", strtotime($resNew['FromDate'])); $ToNew=date("Y", strtotime($resNew['ToDate']));

/******************************************************************************/
$SD=mysql_query("select DepartmentId from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $RD=mysql_fetch_assoc($SD);
$SDe=mysql_query("select DesigId from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $RDe=mysql_fetch_assoc($SDe); 
if(isset($_POST['SaveKRA'])){
$search =  '!"#$%&/\'-:_' ;
$search = str_split($search);
 for($i=1; $i<=15; $i++)
 {
  if($_POST['KRA_'.$i]!='')
  { $str_KRA = $_POST['KRA_'.$i]; $str_KRADes = $_POST['KRADes_'.$i]; $KRA=str_replace($search, "", $str_KRA); $KRADes=str_replace($search, "", $str_KRADes); 
    $sqlSaveK=mysql_query("insert into hrm_pms_kra(YearId, EmployeeID, DepartmentId, KRA, KRA_Description, Measure, Unit, Weightage, Target, CompanyId, KRAStatus, UseKRA, EmpStatus, CreatedBy, CreatedDate)value(".$resSY['CurrY'].", ".$EmployeeId.", ".$RD['DepartmentId'].", '".$KRA."', '".$KRADes."', '".$_POST['Measure_'.$i]."', '".$_POST['Unit_'.$i]."', ".$_POST['Weightage_'.$i].", ".$_POST['Target_'.$i].", ".$CompanyId.", 'R', 'E', 'P', ".$EmployeeId.", '".date("Y-m-d")."')", $con); 
  }
 }
 if($sqlSaveK){$msg='KRA Save Successfully..!';}  
} 

if(isset($_POST['EditKRA'])){
$search =  '!"#$%&/\'-:_' ;
$search = str_split($search);
 for($i=1; $i<=$_POST['EditTNRow']; $i++)
 {
  if($_POST['KRA_'.$i]!='')
  { $str_KRA = $_POST['KRA_'.$i]; $str_KRADes = $_POST['KRADes_'.$i]; $KRA=str_replace($search, "", $str_KRA); $KRADes=str_replace($search, "", $str_KRADes);
    $sqlSaveK=mysql_query("update hrm_pms_kra set KRA='".$KRA."', KRA_Description='".$KRADes."', Measure='".$_POST['Measure_'.$i]."', Unit='".$_POST['Unit_'.$i]."', Weightage=".$_POST['Weightage_'.$i].", Target=".$_POST['Target_'.$i].", EmpStatus='P', CreatedBy=".$EmployeeId.", CreatedDate='".date("Y-m-d")."' where KRAId=".$_POST['KId_'.$i], $con); 
  }
  if($_POST['KRA_'.$i]==''){$sqlSaveK=mysql_query("delete from hrm_pms_kra where KRAId=".$_POST['KId_'.$i], $con); }
 }
 $j=$_POST['EditTNRow']+1;
 for($k=$j; $k<=15; $k++)
 { if($_POST['KRA_'.$k]!='')
   { $str_KRA2 = $_POST['KRA_'.$k]; $str_KRADes2 = $_POST['KRADes_'.$k]; $KRA2=str_replace($search, "", $str_KRA2); $KRADes2=str_replace($search, "", $str_KRADes2);
     $sqlSaveK=mysql_query("insert into hrm_pms_kra(YearId, EmployeeID, DepartmentId, KRA, KRA_Description, Measure, Unit, Weightage, Target, CompanyId, KRAStatus, UseKRA, EmpStatus, CreatedBy, CreatedDate)value(".$resSY['CurrY'].", ".$EmployeeId.", ".$RD['DepartmentId'].", '".$KRA2."', '".$KRADes2."', '".$_POST['Measure_'.$k]."', '".$_POST['Unit_'.$k]."', ".$_POST['Weightage_'.$k].", ".$_POST['Target_'.$k].", ".$CompanyId.", 'R', 'E', 'P', ".$EmployeeId.", '".date("Y-m-d")."')", $con); 
   }
 } 
 if($sqlSaveK){$msg='KRA Update Successfully..!';}  
}

if(isset($_POST['SubmitKRA']))
{ 
$search =  '!"#$%&/\'-:_' ;
$search = str_split($search);

  $TotalWeight=$_POST['WWeightage_1']+$_POST['WWeightage_2']+$_POST['WWeightage_3']+$_POST['WWeightage_4']+$_POST['WWeightage_5']+$_POST['WWeightage_6']+$_POST['WWeightage_7']+$_POST['WWeightage_8']+$_POST['WWeightage_9']+$_POST['WWeightage_10']+$_POST['WWeightage_11']+$_POST['WWeightage_12']+$_POST['WWeightage_13']+$_POST['WWeightage_14']+$_POST['WWeightage_15'];
  if($TotalWeight==100)
  {
    if($_POST['EditTNRow']>=3)
	 {
      for($i=1; $i<=$_POST['EditTNRow']; $i++)
      { if($_POST['KRA_'.$i]!='')
	    { $str_KRA = $_POST['KRA_'.$i]; $str_KRADes = $_POST['KRADes_'.$i]; $KRA=str_replace($search, "", $str_KRA); $KRADes=str_replace($search, "", $str_KRADes);
		  $sqlSaveK=mysql_query("update hrm_pms_kra set KRA='".$KRA."', KRA_Description='".$KRADes."', Measure='".$_POST['Measure_'.$i]."', Unit='".$_POST['Unit_'.$i]."', Weightage=".$_POST['Weightage_'.$i].", Target=".$_POST['Target_'.$i].", UseKRA='A', EmpStatus='A', CreatedBy=".$EmployeeId.", CreatedDate='".date("Y-m-d")."' where KRAId=".$_POST['KId_'.$i], $con); 
		}
        if($_POST['KRA_'.$i]==''){$sqlSaveK=mysql_query("delete from hrm_pms_kra where KRAId=".$_POST['KId_'.$i], $con); }
      }
        $j=$_POST['EditTNRow']+1;
      for($k=$j; $k<=15; $k++)
      { if($_POST['KRA_'.$k]!='')
	    { $str_KRA2 = $_POST['KRA_'.$k]; $str_KRADes2 = $_POST['KRADes_'.$k]; $KRA2=str_replace($search, "", $str_KRA2); $KRADes2=str_replace($search, "", $str_KRADes2);
		  $sqlSaveK=mysql_query("insert into hrm_pms_kra(YearId, EmployeeID, DepartmentId, KRA, KRA_Description, Measure, Unit, Weightage, Target, CompanyId, KRAStatus, UseKRA, EmpStatus, CreatedBy, CreatedDate)value(".$resSY['CurrY'].", ".$EmployeeId.", ".$RD['DepartmentId'].", '".$KRA2."', '".$KRADes2."', '".$_POST['Measure_'.$k]."', '".$_POST['Unit_'.$k]."', ".$_POST['Weightage_'.$k].", ".$_POST['Target_'.$k].", ".$CompanyId.", 'R', 'A', 'A', ".$EmployeeId.", '".date("Y-m-d")."')", $con); 
		}
      } 
      if($sqlSaveK){$msg='KRA Submitted Successfully..!';}
	 }
	 else { echo '<script>alert("Error....Please Check!, Minimum Total Number Of KRA Must Be 3 !");</script>';}   
  }
  elseif($TotalWeight!=100){echo '<script>alert("Error....Please Check!, Total value of weightage not equal to 100 !");</script>';}
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
<style>.font {color:#000; font-family:Georgia; font-size:15px; font-weight:bold;}  .font {color:#000; font-family:Times New Roman; font-size:12px;}
.Input{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;background-color:#FFFFFF;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;} .font1 { font-family:Georgia; font-size:11px; height:14px; } .font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.Input2{font-family:Times New Roman; height:22px;border-style:hidden; border-bottom-color:#EEF0AA; border-left-color:#EEF0AA; border-right-color:#EEF0AA; border-top-color:#EEF0AA; border:0;background-color:#EEF0AA; font-weight:bold;}
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
for(var j=6; j<15; j++) 
{ function ShowRow(j) 
  {
  var u = j+1;  var u1 = j-1; //var a = j+2; c=a-1; alert("a="+a+"j="+c);
  if(j<=14) {document.getElementById('minusImg_'+j).style.display = 'block'; document.getElementById('addImg_'+j).style.display = 'none';
   document.getElementById('Row_'+j).style.display = 'block'; document.getElementById('addImg_'+u).style.display = 'block';
   document.getElementById('minusImg_'+u1).style.display = 'none';} 
  else { document.getElementById('minusImg_'+j).style.display = 'block'; document.getElementById('addImg_'+j).style.display = 'none';
    document.getElementById('Row_'+j).style.display = 'block';  document.getElementById('minusImg_'+u1).style.display = 'none';  } 
  }
  function HideRow(j)
  { 
  var u = j+1;  var u1 = j-1; 
  if(j<=14)
  {document.getElementById('minusImg_'+j).style.display = 'none'; document.getElementById('addImg_'+j).style.display = 'block';
   document.getElementById('Row_'+j).style.display = 'none'; document.getElementById('addImg_'+u).style.display = 'none';
   document.getElementById('minusImg_'+u1).style.display = 'block'; }
  else { document.getElementById('minusImg_'+j).style.display = 'none'; document.getElementById('addImg_'+j).style.display = 'block';
    document.getElementById('Row_'+j).style.display = 'none';  document.getElementById('minusImg_'+u1).style.display = 'block'; }  
  } 
}	

function OpenOldKra()
{document.getElementById("OldKRaID").style.display='block';}
function CloseOldKra()
{document.getElementById("OldKRaID").style.display='none';}

function ClickCheckKRA(v)
{var K=document.getElementById("KRAGoal"+v).value; var KD=document.getElementById("Des"+v).value; var M=document.getElementById("Mea"+v).value; 
 var U=document.getElementById("Uni"+v).value; var W=document.getElementById("Wei"+v).value; var T=document.getElementById("Tar"+v).value; 
 
 if(document.getElementById("NoId_"+v).checked==true)
 { 
   for(var i=1; i<=15; i++)
   {  
    if(document.getElementById("KRA_"+i).value=='')
	 {document.getElementById("KRA_"+i).value=K; document.getElementById("KRADes_"+i).value=KD; document.getElementById("Measure_"+i).value=M; 
	  document.getElementById("Unit_"+i).value=U; document.getElementById("Weightage_"+i).value=W; document.getElementById("Target_"+i).value=T;
	  document.getElementById("KRA_"+i).readOnly=true; document.getElementById("KRADes_"+i).readOnly=true; document.getElementById("Measure_"+i).readOnly=true; 
	  document.getElementById("Unit_"+i).readOnly=true; document.getElementById("Weightage_"+i).readOnly=false; document.getElementById("Target_"+i).readOnly=false;
	  document.getElementById("KraIdNo_"+i).value=v; document.getElementById("TR_"+v).style.backgroundColor='#CAFFCA'; 
	  var Weightage=document.getElementById("Weightage_"+i).value; 
	  if(Weightage==''){document.getElementById("WWeightage_"+i).value=0;} else {document.getElementById("WWeightage_"+i).value=Weightage;}
	  brack; 
	 }
   }
   
 }
  if(document.getElementById("NoId_"+v).checked==false)
 { 
   for(var i=1; i<=15; i++)
   {   
    if(document.getElementById("KraIdNo_"+i).value==v)
	 {document.getElementById("KRA_"+i).value=''; document.getElementById("KRADes_"+i).value=''; document.getElementById("Measure_"+i).value=''; 
	  document.getElementById("Unit_"+i).value=''; document.getElementById("Weightage_"+i).value=''; document.getElementById("Target_"+i).value='';
	  document.getElementById("KRA_"+i).readOnly=false; document.getElementById("KRADes_"+i).readOnly=false; document.getElementById("Measure_"+i).readOnly=false; 
	  document.getElementById("Unit_"+i).readOnly=false; document.getElementById("Weightage_"+i).readOnly=false; document.getElementById("Target_"+i).readOnly=false;
	  document.getElementById("KraIdNo_"+i).value=''; document.getElementById("TR_"+v).style.backgroundColor='#FFFFFF'; 
	  document.getElementById("WWeightage_"+i).value=0; brack; 
	 }
   }
   
 }
  
}

function ValidationAchive(KRAForm)
{ 
  var KRA_1=document.getElementById("KRA_1").value; var KRA_2=document.getElementById("KRA_2").value; var KRA_3=document.getElementById("KRA_3").value;
  var KRA_4=document.getElementById("KRA_4").value; var KRA_5=document.getElementById("KRA_5").value; var KRA_6=document.getElementById("KRA_6").value;
  var KRA_7=document.getElementById("KRA_7").value; var KRA_8=document.getElementById("KRA_8").value; var KRA_9=document.getElementById("KRA_9").value;
  var KRA_10=document.getElementById("KRA_10").value; var KRA_11=document.getElementById("KRA_11").value; var KRA_12=document.getElementById("KRA_12").value;
  var KRA_13=document.getElementById("KRA_13").value; var KRA_14=document.getElementById("KRA_14").value; var KRA_15=document.getElementById("KRA_15").value; 
  var Measure_1=document.getElementById("Measure_1").value; var Measure_2=document.getElementById("Measure_2").value; var Measure_3=document.getElementById("Measure_3").value;
  var Measure_4=document.getElementById("Measure_4").value; var Measure_5=document.getElementById("Measure_5").value; var Measure_6=document.getElementById("Measure_6").value;
  var Measure_7=document.getElementById("Measure_7").value; var Measure_8=document.getElementById("Measure_8").value; var Measure_9=document.getElementById("Measure_9").value;
  var Measure_10=document.getElementById("Measure_10").value; var Measure_11=document.getElementById("Measure_11").value; var Measure_12=document.getElementById("Measure_12").value;
  var Measure_13=document.getElementById("Measure_13").value; var Measure_14=document.getElementById("Measure_14").value; var Measure_15=document.getElementById("Measure_15").value;
  var Unit_1=document.getElementById("Unit_1").value; var Unit_2=document.getElementById("Unit_2").value; var Unit_3=document.getElementById("Unit_3").value;
  var Unit_4=document.getElementById("Unit_4").value; var Unit_5=document.getElementById("Unit_5").value; var Unit_6=document.getElementById("Unit_6").value;
  var Unit_7=document.getElementById("Unit_7").value; var Unit_8=document.getElementById("Unit_8").value; var Unit_9=document.getElementById("Unit_9").value;
  var Unit_10=document.getElementById("Unit_10").value; var Unit_11=document.getElementById("Unit_11").value; var Unit_12=document.getElementById("Unit_12").value;
  var Unit_13=document.getElementById("Unit_13").value; var Unit_14=document.getElementById("Unit_14").value; var Unit_15=document.getElementById("Unit_15").value;
  var Weightage_1=document.getElementById("Weightage_1").value; var Weightage_2=document.getElementById("Weightage_2").value; 
  var Weightage_3=document.getElementById("Weightage_3").value; var Weightage_4=document.getElementById("Weightage_4").value; 
  var Weightage_5=document.getElementById("Weightage_5").value; var Weightage_6=document.getElementById("Weightage_6").value;
  var Weightage_7=document.getElementById("Weightage_7").value; var Weightage_8=document.getElementById("Weightage_8").value; 
  var Weightage_9=document.getElementById("Weightage_9").value; var Weightage_10=document.getElementById("Weightage_10").value; 
  var Weightage_11=document.getElementById("Weightage_11").value; var Weightage_12=document.getElementById("Weightage_12").value;
  var Weightage_13=document.getElementById("Weightage_13").value; var Weightage_14=document.getElementById("Weightage_14").value; 
  var Weightage_15=document.getElementById("Weightage_15").value; 
  var WWeightage_1=parseFloat(document.getElementById("WWeightage_1").value); var WWeightage_2=parseFloat(document.getElementById("WWeightage_2").value); 
  var WWeightage_3=parseFloat(document.getElementById("WWeightage_3").value); var WWeightage_4=parseFloat(document.getElementById("WWeightage_4").value); 
  var WWeightage_5=parseFloat(document.getElementById("WWeightage_5").value); var WWeightage_6=parseFloat(document.getElementById("WWeightage_6").value);
  var WWeightage_7=parseFloat(document.getElementById("WWeightage_7").value); var WWeightage_8=parseFloat(document.getElementById("WWeightage_8").value); 
  var WWeightage_9=parseFloat(document.getElementById("WWeightage_9").value); var WWeightage_10=parseFloat(document.getElementById("WWeightage_10").value); 
  var WWeightage_11=parseFloat(document.getElementById("WWeightage_11").value); var WWeightage_12=parseFloat(document.getElementById("WWeightage_12").value);
  var WWeightage_13=parseFloat(document.getElementById("WWeightage_13").value); var WWeightage_14=parseFloat(document.getElementById("WWeightage_14").value); 
  var WWeightage_15=parseFloat(document.getElementById("WWeightage_15").value); 
  var Target_1=document.getElementById("Target_1").value; var Target_2=document.getElementById("Target_2").value; var Target_3=document.getElementById("Target_3").value;
   var Target_4=document.getElementById("Target_4").value; var Target_5=document.getElementById("Target_5").value; var Target_6=document.getElementById("Target_6").value;
  var Target_7=document.getElementById("Target_7").value; var Target_8=document.getElementById("Target_8").value;  var Target_9=document.getElementById("Target_9").value; 
  var Target_10=document.getElementById("Target_10").value; var Target_11=document.getElementById("Target_11").value; var Target_12=document.getElementById("Target_12").value;
  var Target_13=document.getElementById("Target_13").value; var Target_14=document.getElementById("Target_14").value; var Target_15=document.getElementById("Target_15").value;
  var TTarget_1=parseFloat(document.getElementById("TTarget_1").value); var TTarget_2=parseFloat(document.getElementById("TTarget_2").value); 
  var TTarget_3=parseFloat(document.getElementById("TTarget_3").value); var TTarget_4=parseFloat(document.getElementById("TTarget_4").value); 
  var TTarget_5=parseFloat(document.getElementById("TTarget_5").value); var TTarget_6=parseFloat(document.getElementById("TTarget_6").value);
  var TTarget_7=parseFloat(document.getElementById("TTarget_7").value); var TTarget_8=parseFloat(document.getElementById("TTarget_8").value); 
  var TTarget_9=parseFloat(document.getElementById("TTarget_9").value); var TTarget_10=parseFloat(document.getElementById("TTarget_10").value); 
  var TTarget_11=parseFloat(document.getElementById("TTarget_11").value); var TTarget_12=parseFloat(document.getElementById("TTarget_12").value);
  var TTarget_13=parseFloat(document.getElementById("TTarget_13").value); var TTarget_14=parseFloat(document.getElementById("TTarget_14").value);
  var TTarget_15=parseFloat(document.getElementById("TTarget_15").value);
 
   if(KRA_1!='') {if(Weightage_1.length === 0) {alert("please type weightage in row 1.");  return false;}
   if(Target_1.length === 0) {alert("please type target in row 1.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_1); var test_numT = Numfilter.test(Target_1);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 1'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 1'); return false; }
    }
   
   if(KRA_2!='') {if(Weightage_2.length === 0) {alert("please type weightage in row 2.");  return false;}
   if(Target_2.length === 0) {alert("please type target in row 2.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_2); var test_numT = Numfilter.test(Target_2);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 2'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 2'); return false; } }
   
   if(KRA_3!='') {if(Weightage_3.length === 0) {alert("please type weightage in row 3.");  return false;}
   if(Target_3.length === 0) {alert("please type target in row 3.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_3); var test_numT = Numfilter.test(Target_3);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 3'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 3'); return false; } }
   
   if(KRA_4!='') {if(Weightage_4.length === 0) {alert("please type weightage in row 4.");  return false;}
   if(Target_4.length === 0) {alert("please type target in row 4.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_4); var test_numT = Numfilter.test(Target_4);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 4'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 4'); return false; } }
   
   if(KRA_5!='') {if(Weightage_5.length === 0) {alert("please type weightage in row 5.");  return false;}
   if(Target_5.length === 0) {alert("please type target in row 5.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_5); var test_numT = Numfilter.test(Target_5);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 5'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 5'); return false; } }
   
   if(KRA_6!='') {if(Weightage_6.length === 0) {alert("please type weightage in row 6.");  return false;}
   if(Target_6.length === 0) {alert("please type target in row 6.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_6); var test_numT = Numfilter.test(Target_6);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 6'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 6'); return false; } }
   
   if(KRA_7!='') {if(Weightage_7.length === 0) {alert("please type weightage in row 7.");  return false;}
   if(Target_7.length === 0) {alert("please type target in row 7.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_7); var test_numT = Numfilter.test(Target_7);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 7'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 7'); return false; } }
   
   if(KRA_8!='') {if(Weightage_8.length === 0) {alert("please type weightage in row 8.");  return false;}
   if(Target_8.length === 0) {alert("please type target in row 8.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_8); var test_numT = Numfilter.test(Target_8);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 8'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 8'); return false; } }
   
   if(KRA_9!='') {if(Weightage_9.length === 0) {alert("please type weightage in row 9.");  return false;}
   if(Target_9.length === 0) {alert("please type target in row 9.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_9); var test_numT = Numfilter.test(Target_9);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 9'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 9'); return false; } }
   
   if(KRA_10!='') {if(Weightage_10.length === 0) {alert("please type weightage in row 10.");  return false;}
   if(Target_10.length === 0) {alert("please type target in row 10.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_10); var test_numT = Numfilter.test(Target_10);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 10'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 10'); return false; } }
   
   if(KRA_11!='') {if(Weightage_11.length === 0) {alert("please type weightage in row 11.");  return false;}
   if(Target_11.length === 0) {alert("please type target in row 11.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_11); var test_numT = Numfilter.test(Target_11);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 11'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 11'); return false; } }
   
   if(KRA_12!='') {if(Weightage_12.length === 0) {alert("please type weightage in row 12.");  return false;}
   if(Target_12.length === 0) {alert("please type target in row 12.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_12); var test_numT = Numfilter.test(Target_12);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 12'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 12'); return false; } }
   
   if(KRA_13!='') {if(Weightage_13.length === 0) {alert("please type weightage in row 13.");  return false;}
   if(Target_13.length === 0) {alert("please type target in row 13.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_13); var test_numT = Numfilter.test(Target_13);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 13'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 13'); return false; } }
   
   if(KRA_14!='') {if(Weightage_14.length === 0) {alert("please type weightage in row 14.");  return false;}
   if(Target_14.length === 0) {alert("please type target in row 14.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_14); var test_numT = Numfilter.test(Target_14);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 14'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 14'); return false; } }
   
   if(KRA_15!='') {if(Weightage_15.length === 0) {alert("please type weightage in row 15.");  return false;}
   if(Target_15.length === 0) {alert("please type target in row 15.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_15); var test_numT = Numfilter.test(Target_15);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 15'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 15'); return false; } }   

   // var TotalWeight=WWeightage_1+WWeightage_2+WWeightage_3+WWeightage_4+WWeightage_5+WWeightage_6+WWeightage_7+WWeightage_8+WWeightage_9+WWeightage_10+WWeightage_11+WWeightage_12+WWeightage_13+WWeightage_14+WWeightage_15;
   // if(TotalWeight!=100){ alert("Total value of weightage not equal to 100"); return false; }

}

function ChangeWeight(v)
{ var Weightage=document.getElementById("Weightage_"+v).value; 
  if(Weightage==''){document.getElementById("WWeightage_"+v).value=0;} else {document.getElementById("WWeightage_"+v).value=Weightage; } }

function EditKRAvalue()
{ var n=document.getElementById("EditTNRow").value; 
  for(var r=1; r<=n; r++){document.getElementById("KRA_"+r).readOnly=false; document.getElementById("KRADes_"+r).readOnly=false; 
  document.getElementById("Measure_"+r).readOnly=false; document.getElementById("Unit_"+r).readOnly=false; document.getElementById("Weightage_"+r).readOnly=false;
  document.getElementById("Target_"+r).readOnly=false;}
  document.getElementById("EditKRA").style.display='block'; document.getElementById("EditK").style.display='none';
}

function printpageKRA(CId,YId,EmpId) 
{ window.open ("EmpKraFormPrint.php?YId="+YId+"&EmpId="+EmpId+"&CId="+CId,"KRAForm","menubar=yes,scrollbars=yes,resizable=1,width=1170,height=600");}


function KRAOpenWindow(){var CI=document.getElementById("ComId").value; var YI=document.getElementById("YId").value;
window.open("KRASchedule.php?C="+CI+"&Y="+YI,"Schedule","menubar='no',resizable=1,width=850,height=350");}

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
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<table class="table">
<tr>
 <td>
   <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table> 
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px; ">
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
				 <td colspan="2" width="1250" valign="top">
				  <table border="0">
	
<?php //*************************************************************** Start ******************************************************************************** ?>					
<tr>
 <td colspan="5" width="1250" style="background-image:url(images/pmsback.png); ">
<?php $sqlKey=mysql_query("select * from hrm_pms_key where Person='emp' AND CompanyId=".$CompanyId, $con); $resKey=mysql_fetch_assoc($sqlKey);
      $sqlSch=mysql_query("select * from hrm_pms_appdate where AssessmentYear=".$resSY['CurrY']." AND CompanyId=".$CompanyId, $con); 
      $resSch=mysql_fetch_assoc($sqlSch); $CuDate=date("Y-m-d"); ?> 	 	  
  <table>
<?php //******************************************** ?>  
   <tr>
    <td width="1200">
	  <table>
	    <tr>
        <?php if($_SESSION['EmpType']=='E') {?> 
		 <td align="center"><a href="pms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>"><img id="Img_emp1" style="display:none;" src="images/emp1.png" border="0"/></a>
		   <img id="Img_emp" style="display:block;" src="images/emp.png" border="0"/></td>  
<?php }  $sqlApp=mysql_query("select Appraiser_EmployeeID from hrm_employee_pms where AssessmentYear=".$resSY['CurrY']." AND Appraiser_EmployeeID=".$EmployeeId, $con); $rowApp=mysql_num_rows($sqlApp); 
      if($rowApp>0) { ?>			   
		 <td align="center"><a href="ManagerPms.php"><img id="Img_manager1" style="display:block;" src="images/manager1.png" border="0"/></a>
		   <img id="Img_manager" style="display:none;" src="images/manager.png" border="0"/></td>
<?php }  $sqlRev=mysql_query("select Reviewer_EmployeeID from hrm_employee_pms where AssessmentYear=".$resSY['CurrY']." AND Reviewer_EmployeeID=".$EmployeeId, $con); $rowRev=mysql_num_rows($sqlRev); 
      if($rowRev>0) { ?>			   
		 <td align="center"><a href="HodPms.php"><img id="Img_hod1" style="display:block;" src="images/hod1.png" border="0"/></a>
		   <img id="Img_hod" style="display:none;" src="images/hod.png" border="0"/></td>
<?php }  $sqlHod=mysql_query("select HOD_EmployeeID from hrm_employee_pms where AssessmentYear=".$resSY['CurrY']." AND HOD_EmployeeID=".$EmployeeId, $con); $rowHod=mysql_num_rows($sqlHod); 
      if($rowHod>0) { ?>		   
		 <td align="center"><a href="RevHodPms.php"><img id="Img_hod1" style="display:block;" src="images/RevHod1.png" border="0"/></a>
		   <img id="Img_hod" style="display:none;" src="images/RevHod.png" border="0"/></td>		   
<?php } ?>		   
		 <td width="10">&nbsp;</td>
		 <td align="" style="font-family:Times New Roman;color:#000084; font-size:14px; font-weight:bold; width:455px;" valign="middle">
		 <font color="#014E05" style='font-family:Times New Roman;' size="3"><b><?php echo $msg; ?></b></font></td>
		 <td>&nbsp;</td>
		 <td>&nbsp;</td>  
	  </table>
	</td>
   </tr>
<?php $sql=mysql_query("select * from hrm_pms_kra where YearId=".$resSY['CurrY']." AND CompanyId=".$CompanyId." AND EmployeeID=".$EmployeeId." AND (KRAStatus='R' OR KRAStatus='A') order by KRAId ASC", $con);  $row=mysql_num_rows($sql);  $sql2=mysql_query("select * from hrm_pms_kra where YearId=".$resSY['CurrY']." AND CompanyId=".$CompanyId." AND EmployeeID=".$EmployeeId." AND (KRAStatus='R' OR KRAStatus='A') AND (UseKRA='A' OR UseKRA='R' OR UseKRA='H') order by KRAId ASC", $con); $row2=mysql_num_rows($sql2);?>
	  
   <tr>
    <td width="1200">
	  <table border="0">
	    <tr>
		 <?php if($_SESSION['EmpType']=='E') {?>
		 <?php if($resKey['PersonalDetails']=='Y') { ?><td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:140px;">
         <a href="pms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>"><img src="images/PersonalDetails1.png" border="0"/></a></td><?php } ?>
		 <?php if($resKey['Schedule']=='Y') { ?>
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:120px;" valign="top">
		 <?php if($resKey['KRAForm']=='Y') { ?><a href="javascript:KRAOpenWindow()"><img src="images/schedule1.png" border="0"/></a><?php } ?>
		 </td>
		 <?php } ?>        			   
		 <?php if($resKey['KRAForm']=='Y') { ?> 
         <td style="font-family:Times New Roman;width:180px; font-size:14px; font-weight:bold;" valign="middle">
         <a href="EmpAddNewKRA.php"/><img src="images/KraYear.png" border="0" /></a> </td>
		 <td style="font-family:Times New Roman;width:120px; font-size:14px; font-weight:bold;" valign="middle">
    <?php if($row>0) { ?><a href="#" onClick="printpageKRA(<?php echo $CompanyId.', '.$resSY['CurrY'].', '.$EmployeeId; ?>)"/><img src="images/printSaveKRA.png" border="0" /></a><?php } ?>
		 </td>
		 <?php } ?>
		 <?php if($resKey['KRAForm']=='Y') { ?> <?php if($RD['DepartmentId']!=6) { ?> <?php if($EmployeeId!=2) { ?>	
		 <td style="font-family:Times New Roman;width:150px; font-size:14px; font-weight:bold;" valign="middle">
         <a href="#" onClick="OpenOldKra()"/><font color="#620000">Old KRA</font></a> </td><?php } } }?>
		 <td style="font-family:Times New Roman; font-size:16px; font-weight:bold;width:700px; color:#E10000;">
		  <?php if($CuDate>=$resSch['EmpFromDate'] AND $CuDate<=$resSch['EmpToDate'] AND $resSch['EmpDateStatus']=='A') { 
		  $LastDate=$resSch['EmpToDate']; $CurrentDate=date("Y-m-d");
		  $diff = abs(strtotime($LastDate) - strtotime($CurrentDate));
          //$years = floor($diff / (365*60*60*24));
          //$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
          $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); ?>
<?php $sqlKK=mysql_query("select * from hrm_pms_kra where YearId=".$resSY['CurrY']." AND CompanyId=".$CompanyId." AND EmployeeID=".$EmployeeId." AND KRAStatus='A' AND UseKRA='H'", $con);  
      $rowKK=mysql_num_rows($sqlKK); ?>		  
		  <?php if($RD['DepartmentId']!=6) { if($rowKK==0) {?>
		  <b><blink><?php echo $days; ?> Days Remaining! Last date : 
		  <font color="#5B0000"><?php echo date("d-F",strtotime($resSch['EmpToDate'])); ?></font></blink></b><?php } } }?>  
		 </td> 	   		
		 <?php } ?>   			       
	  </table>
	</td>
   </tr>
 

   <tr>
    <td id="OldKRaID" style="display:none;">
	  <table border="0">
	    <tr>
		 <td style="width:5px;">&nbsp;</td>
		 <td id="AppraisalForm" style="width:1160px;display:block;">
		   <table cellpadding="0" cellspacing="0">		     
  <tr>  
   <td id="Achivement" style="">
	 <table border="0" cellpadding="0" cellspacing="0"> 
     <tr>
	  <td colspan="8">
	   <table border="0"><tr><td align="" style="font-family:Times New Roman;color:#000084; font-size:14px; font-weight:bold; width:1100px;" valign="middle">      
	  Your Old KRA for Assessment Year&nbsp;<?php $OF=$FromOld-1; $OT=$FromOld; echo $OF.'-'.$OT; ?>
	  &nbsp;&nbsp;<a href="#" onClick="CloseOldKra()"/><font color="#620000">Hide</font></a></td>
	         <td align="center" style="color:#000084; font-size:12px; font-weight:bold; width:200px;" valign="middle">&nbsp;</td>
	   </tr></table>
	 </td>	  
	 </tr>
 <tr>	
  <td style="background-image:url(images/pmsback.png);width:17px;">&nbsp;</td> 
  <td colspan="8" style="width:1100px;"><table style="width:1160px;" bgcolor="#EEF0AA" border="1" style="border-color:#EEF0AA;"> 
<tr bgcolor="#EEF0AA" style="height:24px;">   
  <td align="center" class="font" style="width:50px;">&nbsp;</td>
  <td class="font" align="center" style="width:300px;">KRA/Goals</td>
  <td class="font" align="center" style="width:400px;">Description</td>  
  <td class="font" align="center" style="width:120px;">Measure</td>
  <td class="font" align="center" style="width:90px;">Unit</td>
  <td class="font" align="center" style="width:90px;">Weightage</td>
  <td class="font" align="center" style="width:90px;">Target</td>
  </tr>
<?php $sqlEK=mysql_query("select * from hrm_employee_pms_kraforma INNER JOIN hrm_employee_pms ON hrm_employee_pms_kraforma.EmpPmsId=hrm_employee_pms.EmpPmsId where hrm_employee_pms.EmployeeID=".$EmployeeId." AND YearId=".$resSY['OldY']."", $con); $rowEK=mysql_num_rows($sqlEK); if($rowEK) { $resEK=mysql_fetch_assoc($sqlEK);
$sqlEK2=mysql_query("select KRA,KRA_Description,Measure,Unit,hrm_employee_pms_kraforma.Weightage,hrm_employee_pms_kraforma.Target from hrm_employee_pms_kraforma INNER JOIN hrm_pms_kra ON hrm_employee_pms_kraforma.KRAId=hrm_pms_kra.KRAId where hrm_employee_pms_kraforma.EmpPmsid=".$resEK['EmpPmsId']." AND hrm_employee_pms_kraforma.KRAFormAStatus='A' AND hrm_pms_kra.CompanyId=".$CompanyId, $con); $rowEK2=mysql_num_rows($sqlEK2); if($rowEK2>0) {$no=1; while($resEK2=mysql_fetch_array($sqlEK2)){ ?>
  <tr id="TR_<?php echo $no; ?>" bgcolor="#FFFFFF" style="height:22px;">   
  <td align="center" valign="top" style="width:50px;"><input type="hidden" id="KSn" value="<?php echo $no; ?>">
  <input type="checkbox" id="NoId_<?php echo $no; ?>" value="SNo" onClick="return ClickCheckKRA(<?php echo $no; ?>)"/></td>  
  <td valign="top" style="width:350px;font-family:Georgia;font-size:12px;">
  <input type="hidden" id="KRAGoal<?php echo $no; ?>" value="<?php echo $resEK2['KRA']; ?>"/><?php echo $resEK2['KRA']; ?></td>
  <td valign="top" style="width:450px;font-family:Georgia;font-size:12px;">
  <input type="hidden" id="Des<?php echo $no; ?>" value="<?php echo $resEK2['KRA_Description']; ?>"/><?php echo $resEK2['KRA_Description']; ?></td>  
  <td valign="top" style="width:120px;font-family:Georgia;font-size:12px;">
  <input type="hidden" id="Mea<?php echo $no; ?>" value="<?php echo $resEK2['Measure']; ?>"/><?php echo $resEK2['Measure']; ?></td>
  <td valign="top" style="width:90px;font-family:Georgia;font-size:12px;">
  <input type="hidden" id="Uni<?php echo $no; ?>" value="<?php echo $resEK2['Unit']; ?>"/><?php echo $resEK2['Unit']; ?></td>
  <td valign="top" style="width:90px;font-family:Georgia;font-size:12px;">
  <input type="hidden" id="Wei<?php echo $no; ?>" value="<?php echo $resEK2['Weightage']; ?>"/><?php echo $resEK2['Weightage']; ?></td>
  <td valign="top" style="width:90px;font-family:Georgia;font-size:12px;">
  <input type="hidden" id="Tar<?php echo $no; ?>" value="<?php echo $resEK2['Target']; ?>"/><?php echo $resEK2['Target']; ?></td>
</tr>
<?php $no++; } } } ?>
  </table></td>
</tr>
	 </table>
   </td>	   
		</tr>
	  </table>
	</td>
   </tr>   
  </table>
 </td>
</tr>					     
    
     
   <tr>
    <td>
	  <table border="0">
	    <tr>
		 <td style="width:5px;">&nbsp;</td>
<?php /****************************************** Form Start **************************/ ?>	 
<?php /***************** AppraisalForm **************************/ ?>	
		 <td id="AppraisalForm" style="width:1100px;display:block;">
		   <table cellpadding="0" cellspacing="0">		     
  <tr>
   <?php /***************** Achivement **************************/ ?>   
<form name="KRAForm" method="post" onSubmit="return ValidationAchive(this)">   
   <td id="Achivement" style="">
	 <table border="0" cellpadding="0" cellspacing="0"> 
     <tr>
	  <td colspan="8">
	   <table border="0"><tr><td align="" style="font-family:Times New Roman;color:#000084; font-size:14px; font-weight:bold; width:880px;" valign="middle">      
	  List down your KRA for Assessment Year&nbsp;<?php $NF=$FromCurr-1; $NT=$FromCurr; echo $NF.'-'.$NT; ?>
	  &nbsp;
	  <font color="#014E05" style='font-family:Times New Roman;' size="3"><b><?php //echo $msg; ?></b></font></td>
	         <td align="right" style="color:#000084; font-size:12px;font-weight:bold; width:280px;" valign="middle">      
	  <input type="button" name="Refresh" id="Refresh" style="width:90px;" value="Refresh" onClick="javascript:window.location='EmpAddNewKRA.php'"/>
<?php if($RD['DepartmentId']!=6) { ?>
<?php if($row>0){ ?><input type="Submit" name="SubmitKRA" id="SubmitKRA" value="final submit" style="width:130px;" <?php if($row2>0){echo 'disabled';} ?>/><?php } ?>
<?php } ?>
      </td>
	  <td align="right" style="color:#000084; font-size:12px;font-weight:bold; width:132px;" valign="middle">
<?php if($RD['DepartmentId']!=6) { ?>      
	  <?php if($row>0) { ?><input type="button" name="EditK" id="EditK" style="width:130px;" value="Edit" <?php if($row2>0){echo 'disabled';} ?> onClick="EditKRAvalue()"/>
                           <input type="Submit" name="EditKRA" id="EditKRA" style="width:130px; display:none;" value="save as draft"/><?php } ?>
	 <?php if($row==0) { ?><input type="Submit" name="SaveKRA" id="SaveKRA" style="width:130px;" value="save as draft"/><?php } ?>
<?php } ?>	 
	 </td>
	   </tr></table>
	 </td>	  
	 </tr>
<?php if($RD['DepartmentId']!=6) { ?>	 
<tr style="height:24px;">	
  <td style="background-image:url(images/pmsback.png);"></td> 
  <td colspan="7" style="width:1100px;"><table style="width:1100px;" bgcolor="#EEF0AA" border="1" style="border-color:#EEF0AA;"> 
  <tr bgcolor="#EEF0AA">   
  <td align="center" class="font" style="width:50px;"><input class="Input2" style="width:40px; text-align:center;" value="SNo" readonly/></td>
  <td class="font" align="center" style="width:300px;"><input class="Input2" style="width:299px;text-align:center;" value="KRA/Goals" readonly/></td>
  <td class="font" align="center" style="width:400px;"><input class="Input2" style="width:399px;text-align:center;" value="Description" readonly/></td>  
  <td class="font" align="center" style="width:120px;"><input class="Input2" style="width:115px;text-align:center;" value="Measure" readonly/></td>
  <td class="font" align="center" style="width:90px;"><input class="Input2" style="width:88px;text-align:center;" value="Unit" readonly/></td>
  <td class="font" align="center" style="width:90px;"><input class="Input2" style="width:88px; text-align:center;" value="Weightage" readonly/></td>
  <td class="font" align="center" style="width:90px;"><input class="Input2" style="width:88px; text-align:center;" value="Target" readonly/></td>
  </tr></table></td>
</tr>
<?php if($row>0) { $k=1; while($res=mysql_fetch_assoc($sql)) {?>
<tr style="height:22px;" id="TR_<?php echo $k; ?>">	
  <td style="background-image:url(images/pmsback.png);"></td> 
  <td colspan="7" style="width:1100px;"><table id="Row_<?php echo $k; ?>" style="width:1100px;" bgcolor="#FFFFFF" border="1"> 
  <tr bgcolor="#FFFFFF">   
  <td align="center" class="font" style="width:50px;"><input class="Input" style="width:40px; text-align:center; font-weight:bold;" value="<?php echo $k; ?>" readonly/>
  <input type="hidden" id="KraIdNo_<?php echo $k; ?>"><input type="hidden" name="KId_<?php echo $k; ?>" value="<?php echo $res['KRAId']; ?>"></td>
  <td class="font" align="center" style="width:300px;">
  <input name="KRA_<?php echo $k; ?>" id="KRA_<?php echo $k; ?>" class="Input" style="width:299px;" maxlength="348" value="<?php echo $res['KRA']; ?>" readonly/></td>
  <td class="font" align="center" style="width:400px;">
  <input name="KRADes_<?php echo $k; ?>" id="KRADes_<?php echo $k; ?>" class="Input" style="width:399px;" maxlength="580" value="<?php echo $res['KRA_Description'] ?>" readonly/></td>  
  <td class="font" align="center" style="width:120px;">
  <select name="Measure_<?php echo $k; ?>" id="Measure_<?php echo $k; ?>" class="Input" style="width:115px; height:20px;" readonly>
  <option value="<?php echo $res['Measure']; ?>"><?php echo $res['Measure']; ?></option>
  <option value="% Compliance">% Compliance</option><option value="Acrage">Acrage</option><option value="Event">Event</option><option value="Program">Program</option>
  <option value="Processes">Processes</option><option value="Maintenance">Maintenance</option><option value="Time">Time</option><option value="Yield">Yield</option>
  <option value="None">None</option></select></td>
  <td class="font" align="center" style="width:90px;">
  <select name="Unit_<?php echo $k; ?>" id="Unit_<?php echo $k; ?>" class="Input" style="width:88px; height:20px;" readonly>
  <option value="<?php echo $res['Unit']; ?>"><?php echo $res['Unit']; ?></option>
  <option value="%">%</option><option value="Acres">Acres</option><option value="Days">Days</option><option value="Hours">Hours</option><option value="Days/Hours">Days/Hours</option>
  <option value="Kg">Kg</option><option value="Kg/Acre">Kg/Acre</option><option value="Number">Number</option><option value="None">None</option></select></td>
  <td class="font" align="center" style="width:90px;">
  <input type="hidden" name="WWeightage_<?php echo $k; ?>" id="WWeightage_<?php echo $k; ?>" value="<?php echo $res['Weightage'] ?>" />
  <input name="Weightage_<?php echo $k; ?>" id="Weightage_<?php echo $k; ?>" class="Input" style="width:88px; text-align:center;" maxlength="8" onChange="ChangeWeight(<?php echo $k; ?>)" value="<?php echo $res['Weightage']; ?>" readonly/></td>
  <td class="font" align="center" style="width:90px;">
  <input type="hidden" name="TTarget_<?php echo $k; ?>" id="TTarget_<?php echo $k; ?>" value="<?php echo $res['Target'] ?>"/>
  <input name="Target_<?php echo $k; ?>" id="Target_<?php echo $k; ?>" class="Input" style="width:88px; text-align:center;" maxlength="8" onChange="ChangeTarget(<?php echo $k; ?>)" value="<?php echo intval($res['Target']); ?>" readonly/></td>
  </tr></table></td>
</tr>	  
<?php $k++; $tn=$k-1;  $j=$k; } ?> <input type="hidden" id="EditTNRow" name="EditTNRow" value="<?php echo $tn; ?>" /> 
<?php } elseif($row==0) { for($i=1; $i<=5; $i++) { ?> 
<tr style="height:22px;" id="TR_<?php echo $i; ?>">	
  <td style="background-image:url(images/pmsback.png);"></td> 
  <td colspan="7" style="width:1100px;"><table id="Row_<?php echo $i; ?>" style="width:1100px;" bgcolor="#FFFFFF" border="1"> 
  <tr bgcolor="#FFFFFF">   
  <td align="center" class="font" style="width:50px;"><input class="Input" style="width:40px; text-align:center; font-weight:bold;" value="<?php echo $i; ?>" readonly/>
  <input type="hidden" id="KraIdNo_<?php echo $i; ?>"></td>
  <td class="font" align="center" style="width:300px;">
  <input name="KRA_<?php echo $i; ?>" id="KRA_<?php echo $i; ?>" class="Input" style="width:299px;" maxlength="348"/></td>
  <td class="font" align="center" style="width:400px;">
  <input name="KRADes_<?php echo $i; ?>" id="KRADes_<?php echo $i; ?>" class="Input" style="width:399px;" maxlength="580"/></td>  
  <td class="font" align="center" style="width:120px;">
  <select name="Measure_<?php echo $i; ?>" id="Measure_<?php echo $i; ?>" class="Input" style="width:115px; height:20px;">
  <option value="% Compliance">% Compliance</option><option value="Acrage">Acrage</option><option value="Event">Event</option><option value="Program">Program</option>
  <option value="Processes">Processes</option><option value="Maintenance">Maintenance</option><option value="Time">Time</option><option value="Yield">Yield</option>
  <option value="None">None</option></select></td>
  <td class="font" align="center" style="width:90px;">
  <select name="Unit_<?php echo $i; ?>" id="Unit_<?php echo $i; ?>" class="Input" style="width:88px; height:20px;">
  <option value="%">%</option><option value="Acres">Acres</option><option value="Days">Days</option><option value="Hours">Hours</option><option value="Days/Hours">Days/Hours</option>
  <option value="Kg">Kg</option><option value="Kg/Acre">Kg/Acre</option><option value="Number">Number</option><option value="None">None</option></select></td>
  <td class="font" align="center" style="width:90px;">
  <input type="hidden" name="WWeightage_<?php echo $i; ?>" id="WWeightage_<?php echo $i; ?>" value="0"/>
  <input name="Weightage_<?php echo $i; ?>" id="Weightage_<?php echo $i; ?>" class="Input" style="width:88px; text-align:center;" maxlength="8" onChange="ChangeWeight(<?php echo $i; ?>)"/></td>
  <td class="font" align="center" style="width:90px;">
  <input type="hidden" name="TTarget_<?php echo $i; ?>" id="TTarget_<?php echo $i; ?>" value="0"/>
  <input name="Target_<?php echo $i; ?>" id="Target_<?php echo $i; ?>" class="Input" style="width:88px; text-align:center;" maxlength="8" onChange="ChangeTarget(<?php echo $i; ?>)" value="<?php if($RD['DepartmentId']!=6) { echo '100'; } elseif($RD['DepartmentId']==6) { echo '0'; }?>" /></td>
  </tr></table></td>
</tr>
<?php $j=$i+1; } } for($i=$j; $i<=15; $i++) { ?> 
<tr style="height:22px;" id="TR_<?php echo $i; ?>">
  <td style="background-image:url(images/pmsback.png);" id="AppImg_<?php echo $i; ?>"><?php if($row2>0){echo '&nbsp;&nbsp;';}if($row2==0) { ?>
  <img src="images/Addnew.png" <?php if($i>$j) { echo 'style="display:none;"';} ?> border="0" id="addImg_<?php echo $i; ?>" onClick="ShowRow(<?php echo $i; ?>)"/><?php } ?>
  <img src="images/Minusnew.png" id="minusImg_<?php echo $i; ?>" <?php if($i>=$j){ echo 'style="display:none;"'; } ?> border="0" onClick="HideRow(<?php echo $i; ?>)"/>
  </td>	 
  <td colspan="7" style="width:1100px;"><table style="display:none;" id="Row_<?php echo $i; ?>" style="width:1100px;" bgcolor="#FFFFFF" border="1"> 
  <tr bgcolor="#FFFFFF"> 
  <td align="center" class="font" style="width:50px;"><input class="Input" style="width:40px; text-align:center; font-weight:bold;" value="<?php echo $i; ?>" readonly/>
  <input type="hidden" id="KraIdNo_<?php echo $i; ?>"></td>
  <td class="font" align="center" style="width:300px;">
  <input name="KRA_<?php echo $i; ?>" id="KRA_<?php echo $i; ?>" class="Input" style="width:299px;" maxlength="348"/></td>
  <td class="font" align="center" style="width:400px;">
  <input name="KRADes_<?php echo $i; ?>" id="KRADes_<?php echo $i; ?>" class="Input" style="width:399px;" maxlength="580"/></td>  
  <td class="font" align="center" style="width:120px;">
  <select name="Measure_<?php echo $i; ?>" id="Measure_<?php echo $i; ?>" class="Input" style="width:115px; height:20px;">
  <option value="% Compliance">% Compliance</option><option value="Acrage">Acrage</option><option value="Event">Event</option><option value="Program">Program</option>
  <option value="Processes">Processes</option><option value="Maintenance">Maintenance</option><option value="Time">Time</option><option value="Yield">Yield</option>
  <option value="None">None</option></select></td>
  <td class="font" align="center" style="width:90px;">
  <select name="Unit_<?php echo $i; ?>" id="Unit_<?php echo $i; ?>" class="Input" style="width:89px; height:20px;">
  <option value="%">%</option><option value="Acres">Acres</option><option value="Days">Days</option><option value="Hours">Hours</option><option value="Days/Hours">Days/Hours</option>
  <option value="Kg">Kg</option><option value="Kg/Acre">Kg/Acre</option><option value="Number">Number</option><option value="None">None</option></select></td>
  <td class="font" align="center" style="width:90px;">
  <input type="hidden" name="WWeightage_<?php echo $i; ?>" id="WWeightage_<?php echo $i; ?>" value="0"/>
  <input name="Weightage_<?php echo $i; ?>" id="Weightage_<?php echo $i; ?>" class="Input" style="width:88px; text-align:center;" maxlength="8" onChange="ChangeWeight(<?php echo $i; ?>)" /></td>
  <td class="font" align="center" style="width:90px;">
  <input type="hidden" name="TTarget_<?php echo $i; ?>" id="TTarget_<?php echo $i; ?>" value="0"/>
  <input name="Target_<?php echo $i; ?>" id="Target_<?php echo $i; ?>" class="Input" style="width:88px; text-align:center;" maxlength="8" onChange="ChangeTarget(<?php echo $i; ?>)" value="<?php if($RD['DepartmentId']!=6) { echo '100'; } elseif($RD['DepartmentId']==6) { echo '0'; }?>" /></td>
  </tr></table></td>
</tr>
<?php } ?> 
<?php /* ?>
<tr style="background-image:url(images/pmsback.png);height:22px;">	
  <td style="background-image:url(images/pmsback.png);"></td> 
  <td colspan="7" style="background-image:url(images/pmsback.png);width:1100px;"><table style="width:1100px;" bgcolor="#FFFFFF" border="0"> 
  <tr style="background-image:url(images/pmsback.png);">   
  <td colspan="5" align="center" class="font" style="width:50px;"><input style="background-image:url(images/pmsback.png);width:965px;" class="Input" readonly=""/></td>
  <td class="font" align="center" style="width:90px;"><input class="Input" style="width:88px; text-align:center;" maxlength="8" readonly=""/></td>
  <td class="font" align="center" style="width:90px;"><input class="Input" style="background-image:url(images/pmsback.png);width:88px;" readonly=""/></td>
  </tr></table></td>
</tr>	
*/ ?>
<?php } elseif($RD['DepartmentId']==6) { ?> 
<tr style="height:24px;">	
  <td style="background-image:url(images/pmsback.png);"></td> 
  <td colspan="7" style="width:1200px;"><table style="width:1200px;" bgcolor="#EEF0AA" border="1" style="border-color:#EEF0AA;"> 
  <tr bgcolor="#EEF0AA">   
  <td class="font" align="center" style="width:50px;">SNo</td>
  <td class="font" align="center" style="width:300px;">KRA/Goals</td>
  <td class="font" align="center" style="width:400px;">Description</td>  
  <td class="font" align="center" style="width:120px;">Measure</td>
  <td class="font" align="center" style="width:90px;">Unit</td>
  <td class="font" align="center" style="width:90px;">Weightage</td>
  <td class="font" align="center" style="width:90px;">Target</td>
</tr>
<?php 
$sqlSC=mysql_query("select * from hrm_pms_kra where YearId=".$resSY['CurrY']." AND CompanyId=".$CompanyId." AND EmployeeID=".$EmployeeId." AND KRAStatus='A' order by KRAId ASC", $con);  
      $rowSC=mysql_num_rows($sqlSC); if($rowSC==0) { ?>
<?php $sqlS=mysql_query("select hrm_pms_kra.*,DesigId from hrm_pms_kra_designation INNER JOIN hrm_pms_kra ON hrm_pms_kra_designation.KRAId=hrm_pms_kra.KRAId where hrm_pms_kra_designation.DesigId=".$RDe['DesigId']." order by DesigKraId ASC", $con); $N=1; while($resS=mysql_fetch_array($sqlS)) {?>  
  <tr bgcolor="#FFFFFF" style="height:22px;">   
  <td align="center" style="width:50px;color:#000; font-family:Times New Roman; font-size:14px;" valign="top"><?php echo $N; ?></td>
  <td style="width:250px;color:#000; font-family:Times New Roman; font-size:14px;" valign="top"><?php echo $resS['KRA']; ?></td>
  <td style="width:450px;color:#000; font-family:Times New Roman; font-size:14px;" valign="top"><?php echo $resS['KRA_Description']; ?></td>  
  <td align="center" style="width:120px;color:#000; font-family:Times New Roman; font-size:14px;" valign="top"><?php echo $resS['Measure']; ?></td>
  <td align="center" style="width:90px;color:#000; font-family:Times New Roman; font-size:14px;" valign="top"><?php echo $resS['Unit']; ?></td>
<?php $sqlEPms=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=2 AND EmployeeID=".$EmployeeId, $con); $resEPms=mysql_fetch_assoc($sqlEPms);
//echo "select Weightage,Target from hrm_employee_pms_kraforma where EmpPmsId=".$resEPms['EmpPmsId']." AND KRAFormAStatus='A' AND KRAId=".$resS['KRAId'];
$sqlWT=mysql_query("select Weightage,Target from hrm_employee_pms_kraforma where EmpPmsId=".$resEPms['EmpPmsId']." AND KRAFormAStatus='A' AND KRAId=".$resS['KRAId'], $con); 
$resWT=mysql_fetch_assoc($sqlWT); ?>  
  <td align="center" style="width:90px;color:#000; font-family:Times New Roman; font-size:14px;" valign="top"><?php echo $resWT['Weightage']; ?></td>
  <td align="center" style="width:90px;color:#000; font-family:Times New Roman; font-size:14px;" valign="top"><?php echo $resWT['Target']; ?></td> 
  </tr>
<?php 
$sqlSvK=mysql_query("insert into hrm_pms_kra(YearId, EmployeeID, DepartmentId, KRA, KRA_Description, Measure, Unit, Weightage, Target, CompanyId, KRAStatus, UseKRA, EmpStatus, Appstatus, RevStatus, HODStatus, CreatedBy, CreatedDate)value(".$resSY['CurrY'].", ".$EmployeeId.", ".$RD['DepartmentId'].", '".$resS['KRA']."', '".$resS['KRA_Description']."', '".$resS['Measure']."', '".$resS['Unit']."', ".$resWT['Weightage'].", ".$resWT['Target'].", ".$CompanyId.", 'A', 'H', 'A', 'A', 'A', 'A', ".$EmployeeId.", '".date("Y-m-d")."')", $con);  ?>  
<?php $N++; } ?>
<?php } if($rowSC>0) { ?>

<?php $N=1; while($resSK=mysql_fetch_array($sqlSC)) {?>  
  <tr bgcolor="#FFFFFF" style="height:22px;">   
  <td align="center" style="width:50px;color:#000; font-family:Times New Roman; font-size:14px;" valign="top"><?php echo $N; ?></td>
  <td style="width:250px;color:#000; font-family:Times New Roman; font-size:14px;" valign="top"><?php echo $resSK['KRA']; ?></td>
  <td style="width:450px;color:#000; font-family:Times New Roman; font-size:14px;" valign="top"><?php echo $resSK['KRA_Description'] ?></td>  
  <td align="center" style="width:120px;color:#000; font-family:Times New Roman; font-size:14px;" valign="top"><?php echo $resSK['Measure']; ?></td>
  <td align="center" style="width:90px;color:#000; font-family:Times New Roman; font-size:14px;" valign="top"><?php echo $resSK['Unit']; ?></td>
  <td align="center" style="width:90px;color:#000; font-family:Times New Roman; font-size:14px;" valign="top"><?php echo $resSK['Weightage']; ?></td>
  <td align="center" style="width:90px;color:#000; font-family:Times New Roman; font-size:14px;" valign="top"><?php echo intval($resSK['Target']); ?></td> 
  </tr>
<?php $N++; } ?>
<?php } ?>
  </table></td>
</tr>  
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<?php } ?> 
	 </table>
   </td>
</form> 
<?php /****************************************** Form Close **************************/ ?>		   
		</tr>
	  </table>
	</td>
   </tr>
<?php //******************************************** ?>    
  </table>
 </td>
</tr>					
<?php //*************************************************************** Close ******************************************************************************** ?>					
				  </table>
				 </td>
			  </tr>
			 
			  <tr>
			     <td style="width:5px;">&nbsp;</td>
			     <td align="" class="fontButton" width="400">
				  
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

