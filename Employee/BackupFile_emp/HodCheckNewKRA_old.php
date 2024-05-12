<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
include("SetKraPmsy.php"); 

$sqlOld=mysql_query("select * from hrm_year where YearId=".$resSY['OldY'], $con); $resOld=mysql_fetch_assoc($sqlOld); 
$sqlCurr=mysql_query("select * from hrm_year where YearId=".$resSY['CurrY'], $con); $resCurr=mysql_fetch_assoc($sqlCurr);
$sqlNew=mysql_query("select * from hrm_year where YearId=".$resSY['NewY'], $con); $resNew=mysql_fetch_assoc($sqlNew);	
$FromOld=date("Y", strtotime($resOld['FromDate'])); $ToOld=date("Y", strtotime($resOld['ToDate'])); 
$FromCurr=date("Y", strtotime($resCurr['FromDate'])); $ToCurr=date("Y", strtotime($resCurr['ToDate']));
$FromNew=date("Y", strtotime($resNew['FromDate'])); $ToNew=date("Y", strtotime($resNew['ToDate']));
/******************************************************************************/

if(isset($_POST['EditKRA'])){
 for($i=1; $i<=$_POST['EditTNRow']; $i++)
 {
  if($_POST['KRA_'.$i]!=''){ $sqlSaveK=mysql_query("update hrm_pms_kra set KRA='".$_POST['KRA_'.$i]."', KRA_Description='".$_POST['KRADes_'.$i]."', Measure='".$_POST['Measure_'.$i]."', Unit='".$_POST['Unit_'.$i]."', Weightage=".$_POST['Weightage_'.$i].", Target=".$_POST['Target_'.$i].", CreatedBy=".$EmployeeId.", CreatedDate='".date("Y-m-d")."' where KRAId=".$_POST['KId_'.$i], $con); }
  if($_POST['KRA_'.$i]==''){$sqlSaveK=mysql_query("delete from hrm_pms_kra where KRAId=".$_POST['KId_'.$i], $con); }
 }
 $j=$_POST['EditTNRow']+1;
 for($k=$j; $k<=15; $k++)
 {
  if($_POST['KRA_'.$k]!=''){$sqlSaveK=mysql_query("insert into hrm_pms_kra(YearId, EmployeeID, DepartmentId, KRA, KRA_Description, Measure, Unit, Weightage, Target, CompanyId, KRAStatus, UseKRA, CreatedBy, CreatedDate)value(".$resSY['CurrY'].", ".$_REQUEST['e'].", ".$RD['DepartmentId'].", '".$_POST['KRA_'.$k]."', '".$_POST['KRADes_'.$k]."', '".$_POST['Measure_'.$k]."', '".$_POST['Unit_'.$k]."', ".$_POST['Weightage_'.$k].", ".$_POST['Target_'.$k].", ".$CompanyId.", 'R', 'R', ".$EmployeeId.", '".date("Y-m-d")."')", $con); }
 } 
 if($sqlSaveK){$msg='KRA Update Successfully..!';}  
}

if(isset($_POST['SubmitKRA']))
{
 for($i=1; $i<=$_POST['EditTNRow']; $i++)
 {
  if($_POST['KRA_'.$i]!=''){ $sqlSaveK=mysql_query("update hrm_pms_kra set KRA='".$_POST['KRA_'.$i]."', KRA_Description='".$_POST['KRADes_'.$i]."', Measure='".$_POST['Measure_'.$i]."', Unit='".$_POST['Unit_'.$i]."', Weightage=".$_POST['Weightage_'.$i].", Target=".$_POST['Target_'.$i].", KRAStatus='A', UseKRA='H', CreatedBy=".$EmployeeId.", CreatedDate='".date("Y-m-d")."' where KRAId=".$_POST['KId_'.$i], $con); }
  if($_POST['KRA_'.$i]==''){$sqlSaveK=mysql_query("delete from hrm_pms_kra where KRAId=".$_POST['KId_'.$i], $con); }
 }
 $j=$_POST['EditTNRow']+1;
 for($k=$j; $k<=15; $k++)
 {
  if($_POST['KRA_'.$k]!=''){$sqlSaveK=mysql_query("insert into hrm_pms_kra(YearId, EmployeeID, DepartmentId, KRA, KRA_Description, Measure, Unit, Weightage, Target, CompanyId, KRAStatus, UseKRA, CreatedBy, CreatedDate)value(".$resSY['CurrY'].", ".$_REQUEST['e'].", ".$RD['DepartmentId'].", '".$_POST['KRA_'.$k]."', '".$_POST['KRADes_'.$k]."', '".$_POST['Measure_'.$k]."', '".$_POST['Unit_'.$k]."', ".$_POST['Weightage_'.$k].", ".$_POST['Target_'.$k].", ".$CompanyId.", 'A', 'H', ".$EmployeeId.", '".date("Y-m-d")."')", $con); }
 } 
 if($sqlSaveK){$msg='KRA Submitted Successfully..!';}  
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
<style>.font {color:#000; font-family:Times New Roman; font-size:14px;font-weight:bold; height:25px;}
.Input{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;background-color:#FFFFFF;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;} .font1 { font-family:Times New Roman; font-size:14px;  } .font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.Input2{font-family:Times New Roman; height:22px;border-style:hidden; border-bottom-color:#EEF0AA; border-left-color:#EEF0AA; border-right-color:#EEF0AA; border-top-color:#EEF0AA; border:0;background-color:#EEF0AA; font-weight:bold;}
.Input2a{font-family:Times New Roman; height:22px;background-color:#D5AAAA;font-weight:bold; font-size:12px;text-align:center;}.Inputa{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;background-color:#CAE4FF;}
.Inputar{font-family:"Times New Roman", Times, serif; font-size:14px;border-style:hidden;border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;background-color:#FFFFFF;}
.Inputar2{font-family:"Times New Roman", Times, serif; font-size:14px;border-style:hidden;border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;background-color:#CAE4FF;}
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
   var Numfilter=/^[0-10. ]+$/; var test_numW = Numfilter.test(Weightage_10); var test_numT = Numfilter.test(Target_10);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 10'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 10'); return false; } }
   
   if(KRA_11!='') {if(Weightage_11.length === 0) {alert("please type weightage in row 11.");  return false;}
   if(Target_11.length === 0) {alert("please type target in row 11.");  return false;}
   var Numfilter=/^[0-11. ]+$/; var test_numW = Numfilter.test(Weightage_11); var test_numT = Numfilter.test(Target_11);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 11'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 11'); return false; } }
   
   if(KRA_12!='') {if(Weightage_12.length === 0) {alert("please type weightage in row 12.");  return false;}
   if(Target_12.length === 0) {alert("please type target in row 12.");  return false;}
   var Numfilter=/^[0-12. ]+$/; var test_numW = Numfilter.test(Weightage_12); var test_numT = Numfilter.test(Target_12);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 12'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 12'); return false; } }
   
   if(KRA_13!='') {if(Weightage_13.length === 0) {alert("please type weightage in row 13.");  return false;}
   if(Target_13.length === 0) {alert("please type target in row 13.");  return false;}
   var Numfilter=/^[0-13. ]+$/; var test_numW = Numfilter.test(Weightage_13); var test_numT = Numfilter.test(Target_13);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 13'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 13'); return false; } }
   
   if(KRA_14!='') {if(Weightage_14.length === 0) {alert("please type weightage in row 14.");  return false;}
   if(Target_14.length === 0) {alert("please type target in row 14.");  return false;}
   var Numfilter=/^[0-14. ]+$/; var test_numW = Numfilter.test(Weightage_14); var test_numT = Numfilter.test(Target_14);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 14'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 14'); return false; } }
   
   if(KRA_15!='') {if(Weightage_15.length === 0) {alert("please type weightage in row 15.");  return false;}
   if(Target_15.length === 0) {alert("please type target in row 15.");  return false;}
   var Numfilter=/^[0-15. ]+$/; var test_numW = Numfilter.test(Weightage_15); var test_numT = Numfilter.test(Target_15);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 15'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 15'); return false; } }   

   var TotalWeight=WWeightage_1+WWeightage_2+WWeightage_3+WWeightage_4+WWeightage_5+WWeightage_6+WWeightage_7+WWeightage_8+WWeightage_9+WWeightage_10+WWeightage_11+WWeightage_12+WWeightage_13+WWeightage_14+WWeightage_15;
   if(TotalWeight!=100){ alert("Total value of weightage not equal to 100"); return false; }

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

function FunSubO(k){ document.getElementById("Div"+k).style.display='block'; document.getElementById("SpanO"+k).style.display='block'; document.getElementById("SpanC"+k).style.display='none'; } 
function FunSubC(k){ document.getElementById("Div"+k).style.display='none'; document.getElementById("SpanO"+k).style.display='none'; document.getElementById("SpanC"+k).style.display='block'; }


/**** Sub KRA open Sub KRA open **************************************/

function FunTgt(kid,prd,tgt,wgt,lgc)
{ var e=document.getElementById("e").value; var eid=document.getElementById("empiid").value; 
 window.open("setkrahodtgt.php?act=setkratgt&n=1&valueins=true&checkalpha=false&d=12&pa=4&y=2&kid="+kid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&lgc="+lgc+"&wgt="+wgt+"&row="+document.getElementById("row").value+"&row2="+document.getElementById("row2").value+"&eid="+eid, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1150,height=550"); }

function FunSubTgt(kid,prd,tgt,wgt,lgc)
{ var e=document.getElementById("e").value; var eid=document.getElementById("empiid").value; 
 window.open("setkrahodtgt.php?act=setkratgt&n=2&valueins=true&checkalpha=false&d=12&pa=4&y=2&kid="+kid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&lgc="+lgc+"&wgt="+wgt+"&row="+document.getElementById("row").value+"&row2="+document.getElementById("row2").value+"&eid="+eid, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1150,height=550"); }


function FunSubFormBTgt(yid,e,fbid,prd,tgt,wgt,lgc)
{ var c=document.getElementById("ComId").value; 
  var win = window.open("setkrahodtgtformb.php?act=setkratgt&n=2&valueins=true&checkalpha=false&d=12&pa=4&y=2&fbid="+fbid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&lgc="+lgc+"&wgt="+wgt+"&yid="+yid+"&c="+c, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=600"); 
}

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
<input type="hidden" id="FormAMin5" value="" /><input type="hidden" id="FormAMax5" value="" />
<input type="hidden" id="FormBMin5" value="" /><input type="hidden" id="FormBMax5" value="" />
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />
<input type="hidden" id="EmployeeId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="EmpId" value="" /> <input type="hidden" id="PmsId" value="" />	
<input type="hidden" id="empiid" value="<?php echo $_REQUEST['e']; ?>"/>
<input type="hidden" id="e" value="<?php echo $EmployeeId; ?>"/>
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
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
<?php //**************************************************************************************** ?>	   
		     <table border="0" id="Activity" style="background-image:url(images/pmsback.png);">
			  <tr>
			     <td id="Anni" valign="top">&nbsp;</td>
				 <td width="100%" valign="top">
				  <table border="0" style="background-image:url(images/pmsback.png);">
<?php //*************************************** Start ********************************************* ?>					
<tr>
 <td colspan="5" width="1200" style="background-image:url(images/pmsback.png); ">	 
 <table>
 <tr>
  <td>
<?php include("SetKraPmsmh.php"); ?>  
  </td>
 </tr>
   <?php $sqlE=mysql_query("select * from hrm_employee where EmployeeID=".$_REQUEST['e']." AND CompanyId=".$CompanyId, $con); $resE=mysql_fetch_assoc($sqlE);?>   
   <tr>
    <td width="1200">
	  <table border="0">
	    <tr>
		
		<td style="width:25px;">&nbsp;</td>
		<td style="font-family:Times New Roman;width:800px; font-size:15px; font-weight:bold;" valign="middle">
         EmpCode&nbsp;:&nbsp;<font color="#FFFF00"><?php echo $resE['EmpCode']; ?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 Name&nbsp;:&nbsp;<font color="#FFFF00"><?php echo $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
         <a href="#" onClick="OpenOldKra()"/><font color="#620000">Old KRA</font></a> </td>  			       
	  </table>
	</td>
   </tr>


 <tr>
    <td id="OldKRaID" style="display:none;">
	  <table border="0">
	    <tr>
		 <td style="width:5px;">&nbsp;</td>
		 <td id="AppraisalForm" style="width:1200px;display:block;">
		   <table cellpadding="0" cellspacing="0">		     
  <tr>  
   <td id="Achivement" style="">
	 <table border="0" cellpadding="0" cellspacing="0"> 
     <tr>
	  <td colspan="8">
	   <table border="0"><tr><td align="" style="font-family:Times New Roman;color:#000084; font-size:14px; font-weight:bold; width:1200px;" valign="middle">      
	  Your Old KRA for Assessment Year&nbsp;<?php $OF=$FromOld-1; $OT=$FromOld; echo $OF.'-'.$OT; ?>
	  &nbsp;&nbsp;<a href="#" onClick="CloseOldKra()"/><font color="#620000">Hide</font></a></td>
	         <td align="center" style="color:#000084; font-size:12px; font-weight:bold; width:200px;" valign="middle">&nbsp;</td>
	   </tr></table>
	 </td>	  
	 </tr>
 <tr>
  <td style="background-image:url(images/pmsback.png);width:6px;"></td> 	
  <td colspan="8" style="width:1200px;"><table style="width:1260px;" bgcolor="#EEF0AA" border="1" style="border-color:#EEF0AA;"> 
<tr bgcolor="#EEF0AA" style="height:24px;">   
  <td align="center" class="font" style="width:50px;">SNo</td> 
  <td class="font" align="center" style="width:350px;">KRA/Goals</td>
  <td class="font" align="center" style="width:450px;">Description</td>  
  <td class="font" align="center" style="width:100px;">Measure</td>
  <td class="font" align="center" style="width:90px;">Unit</td>
  <td class="font" align="center" style="width:60px;">Weightage</td>
  <td class="font" align="center" style="width:60px;">Target</td>
  </tr>
<?php $sqlEK=mysql_query("select * from hrm_employee_pms_kraforma INNER JOIN hrm_employee_pms ON hrm_employee_pms_kraforma.EmpPmsId=hrm_employee_pms.EmpPmsId where hrm_employee_pms.EmployeeID=".$_REQUEST['e']." AND YearId=".$resSY['OldY'], $con); $rowEK=mysql_num_rows($sqlEK); if($rowEK>0) { $resEK=mysql_fetch_assoc($sqlEK);
$sqlEK2=mysql_query("select KRA,KRA_Description,Measure,Unit,hrm_employee_pms_kraforma.Weightage,hrm_employee_pms_kraforma.Target from hrm_employee_pms_kraforma INNER JOIN hrm_pms_kra ON hrm_employee_pms_kraforma.KRAId=hrm_pms_kra.KRAId where hrm_employee_pms_kraforma.EmpPmsid=".$resEK['EmpPmsId']." AND hrm_employee_pms_kraforma.KRAFormAStatus='A' AND hrm_pms_kra.CompanyId=".$CompanyId, $con); $rowEK2=mysql_num_rows($sqlEK2); if($rowEK2>0) { $no=1; while($resEK2=mysql_fetch_array($sqlEK2)){ ?>   
  <tr id="TR_<?php echo $no; ?>" bgcolor="#FFFFFF" style="height:22px;">   
  <td align="center" style="font-family:Times New Roman; font-size:14px;" valign="top"><input type="hidden" id="KSn" value="<?php echo $no; ?>" /><?php echo $no; ?> </td> 
  <td valign="top" style="width:350px;font-family:Times New Roman;font-size:14px;">
  <input type="hidden" id="KRAGoal<?php echo $no; ?>" value="<?php echo $resEK2['KRA']; ?>"/><?php echo $resEK2['KRA']; ?></td>
  <td valign="top" style="width:450px;font-family:Times New Roman;font-size:14px;">
  <input type="hidden" id="Des<?php echo $no; ?>" value="<?php echo $resEK2['KRA_Description']; ?>"/><?php echo $resEK2['KRA_Description']; ?></td>  
  <td valign="top" style="width:100px;font-family:Times New Roman;font-size:14px;">
  <input type="hidden" id="Mea<?php echo $no; ?>" value="<?php echo $resEK2['Measure']; ?>"/><?php echo $resEK2['Measure']; ?></td>
  <td valign="top" style="width:90px;font-family:Times New Roman;font-size:14px;">
  <input type="hidden" id="Uni<?php echo $no; ?>" value="<?php echo $resEK2['Unit']; ?>"/><?php echo $resEK2['Unit']; ?></td>
  <td valign="top" style="width:60px;font-family:Times New Roman;font-size:14px;">
  <input type="hidden" id="Wei<?php echo $no; ?>" value="<?php echo $resEK2['Weightage']; ?>"/><?php echo $resEK2['Weightage']; ?></td>
  <td valign="top" style="width:60px;font-family:Times New Roman;font-size:14px;">
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
<form name="KRAFormSubmit" method="post" onSubmit="return ValidationAchive(this)">   
<form name="KRAForm" method="post" onSubmit="return ValidationAchive(this)">   
   <td id="Achivement" style="">
	 <table border="0" cellpadding="0" cellspacing="0"> 
     <tr>
	  <td colspan="8">
	   <table border="0"><tr><td align="" style="font-family:Times New Roman;color:#000084; font-size:14px; font-weight:bold; width:745px;" valign="middle">      
	  List down your KRA for Assessment Year&nbsp;<?php $NF=$FromCurr-1; $NT=$FromCurr; echo $NF.'-'.$NT; ?>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <font color="#014E05" style='font-family:Times New Roman;' size="3"><b><?php echo $msg; ?></b></font></td>
	         <td align="right" style="color:#000084; font-size:12px;font-weight:bold; width:400px;" valign="middle">      
<?php $sql=mysql_query("select * from hrm_pms_kra where YearId=".$resSY['CurrY']." AND CompanyId=".$CompanyId." AND EmployeeID=".$_REQUEST['e']." AND (KRAStatus='R' OR KRAStatus='A') order by KRAId ASC", $con);     
      $row=mysql_num_rows($sql); 
	  $sql2=mysql_query("select * from hrm_pms_kra where YearId=".$resSY['CurrY']." AND CompanyId=".$CompanyId." AND EmployeeID=".$_REQUEST['e']." AND (KRAStatus='R' OR KRAStatus='A') AND UseKRA='H' order by KRAId ASC", $con); $row2=mysql_num_rows($sql2);?>
<?php /* if($row>0){ ?><input type="Submit" name="SubmitKRA" id="SubmitKRA" value="final submit" style="width:130px;" <?php if($row2>0){echo 'disabled';} ?>/><?php } */ ?>
      </td>
	  <td align="right" style="color:#000084; font-size:12px;font-weight:bold; width:101px;" valign="middle">
      <?php /* if($row>0) { ?><input type="button" name="EditK" id="EditK" style="width:100px;" value="Edit" <?php if($row2>0){echo 'disabled';} ?> onClick="EditKRAvalue()"/>
                           <input type="Submit" name="EditKRA" id="EditKRA" style="width:100px; display:none;" value="save"/><?php } */ ?>
						   <input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='HodFinalEmpKRA.php?ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=0&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1'"/>
      </td>
	   </tr></table>
	 </td>
<input type="hidden" id="row" value="0" />
<input type="hidden" id="row2" value="0" />
	 	  
	 </tr>
<?php if($row>0) { ?>	 
<tr style="height:24px;">
	
 <td style="background-image:url(images/pmsback.png);"></td> 
  <td colspan="7" style="width:1200px;">
  
  <table style="width:1160px;" bgcolor="#EEF0AA" border="1" cellspacing="1" cellpadding="0" style="border-color:#EEF0AA;"> 
  <tr bgcolor="#EEF0AA" style="height:24px;">   
  <td class="font" align="center" style="width:50px;">SNo</td>
  <td class="font" align="center" style="width:350px;">KRA/Goals</td>
  <td class="font" align="center" style="width:450px;">Description</td>  
  <td class="font" align="center" style="width:100px;">Measure</td>
  <td class="font" align="center" style="width:90px;">Unit</td>
  <td class="font" align="center" style="width:60px;">Weightage</td>
  <td class="font" align="center" style="width:60px;">Logic</td>
  <td class="font" align="center" style="width:80px;">Period</td>
  <td class="font" align="center" style="width:60px;">Target</td>
</tr>
<?php  $k=1; while($res=mysql_fetch_assoc($sql)) { ?>	
<?php $sSubK=mysql_query("select * from hrm_pms_krasub where KRAId=".$res['KRAId']." AND KSubStatus='A' order by KRASubId ASC",$con); $rowSubK=mysql_num_rows($sSubK); ?>
 <tr bgcolor="#FFFFFF" style="height:22px;">
 <style>.tds{color:#000;font-family:Times New Roman;font-size:14px;}</style>  
 <td align="center" valign="middle" class="Input"><?php echo $k; ?><span style="cursor:pointer;"><img src="images/open-folder.png" style="height:12px;display:<?php if($rowSubK>0){echo 'block';}else{echo 'none';}?>;" onClick="FunSubC(<?php echo $k; ?>)" id="SpanO<?php echo $k; ?>"/><img src="images/close-folder.png" style="height:12px;display:<?php if($rowSubK>0){echo 'none';}else{echo 'block';}?>;" onClick="FunSubO(<?php echo $k; ?>)" id="SpanC<?php echo $k; ?>"/></span></td>
  <td class="tds" valign="top"><?php echo $res['KRA']; ?></td>
  <td class="tds" valign="top"><?php echo $res['KRA_Description'] ?></td>
  <td align="center" class="tds" valign="top"><?php if($rowSubK>0){ echo ''; }else{ echo $res['Measure']; } ?></td>
  <td align="center" class="tds" valign="top"><?php if($rowSubK>0){ echo ''; }else{ echo $res['Unit']; } ?></td>
  <td align="center" class="tds" valign="top"><?php echo $res['Weightage']; ?></td>
  <td align="center" class="tds" valign="top"><?php echo $res['Logic']; ?></td>
  <td class="tds" valign="top"><?php if($res['Period']=='Annual'){echo 'Annually';}elseif($res['Period']=='1/2 Annual'){echo 'Half Yearly';}elseif($res['Period']=='Quarter'){echo 'Quarterly';}elseif($res['Period']=='Monthly'){echo 'Monthly';} ?></td>
  <td align="center" class="tds" valign="top"><?php if($rowSubK>0){ echo ''; }else{ ?><span style="cursor:<?php if($res['Period']!='Annual' AND $res['Period']!=''){echo 'pointer';} ?>;text-decoration:<?php if($res['Period']!='Annual' AND $res['Period']!=''){ echo 'underline'; }?>;color:<?php if($res['Period']!='Annual' AND $res['Period']!=''){ echo '#000099'; }?>;" <?php if($res['Period']!='Annual' AND $res['Period']!=''){?> onClick="FunTgt(<?php echo $res['KRAId']; ?>,'<?php echo $res['Period']; ?>',<?php echo intval($res['Target']).','.intval($res['Weightage']); ?>,'<?php echo $res['Logic']; ?>')" <?php } ?>><?php echo intval($res['Target']); ?></span><?php } ?></td> 
  </tr>
  
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>  
  <?php $sSubK=mysql_query("select * from hrm_pms_krasub where KRAId=".$res['KRAId']." AND KSubStatus='A' order by KRASubId ASC",$con); $rowSubK=mysql_num_rows($sSubK); ?>   
 <tr>
  <td colspan="9" align="right" style="border:hidden;border-style:none;">
  <div id="Div<?php echo $k; ?>" style="display:<?php if($rowSubK>0){echo 'block';}else{echo 'none';} ?>;">
     <table style="width:1100px;background-color:#D5AAAA;" border="0" cellpadding="0" cellspacing="1"> 
     <tr style="background-color:#D5AAAA;">   
     <td align="center" class="Input2a" style="width:30px;">SNo</td>
     <td align="center" class="Input2a" style="width:280px;">Sub KRA/Goals</td>
     <td align="center" class="Input2a" style="width:390px;">Sub KRA Description</td>  
     <td align="center" class="Input2a" style="width:100px;">Measure</td>
     <td align="center" class="Input2a" style="width:80px;">Unit</td>
     <td align="center" class="Input2a" style="width:60px;">Weightage</td>
	 <td align="center" class="Input2a" style="width:60px;">Logic</td>
	 <td align="center" class="Input2a" style="width:80px;">Period</td>
     <td align="center" class="Input2a" style="width:60px;">Target</td>
     </tr>
<?php if($rowSubK==0){$num=5;}elseif($rowSubK==1){$num=4;}elseif($rowSubK==2){$num=3;}elseif($rowSubK==3){$num=2;}elseif($rowSubK==4){$num=1;}elseif($rowSubK==5){$num=0;} ?>

<?php /* While Open*/ $m=1; while($rSubK=mysql_fetch_assoc($sSubK)){ ?>
  <input type="hidden" id="KraId_<?php echo $k; ?>" value="<?php echo $res['KRAId']; ?>" />
  <input type="hidden" id="SubKraId_<?php echo $k.'_'.$m; ?>" value="<?php echo $rSubK['KRASubId']; ?>" />
  <tr style="background-color:#FFFFFF;">   
  <td align="center"><input class="Inputa" style="width:30px;text-align:center;font-weight:bold;" value="<?php if($m==1){$n='a';}elseif($m==2){$n='b';}elseif($m==3){$n='c';}elseif($m==4){$n='d';}elseif($m==5){$n='e';}echo $n; ?>" readonly/><input type="hidden" id="KraIdNo_a<?php echo $k.'_'.$m; ?>"></td>
  <td align="center"><textarea id="Kra_a<?php echo $k.'_'.$m; ?>" class="Inputar2" rows="2" style="width:280px;" maxlength="348" ><?php echo $rSubK['KRA']; ?></textarea></td>
  <td align="center"><textarea id="KraDes_a<?php echo $k.'_'.$m; ?>" class="Inputar2" rows="2" style="width:390px;" maxlength="580"><?php echo $rSubK['KRA_Description']; ?></textarea></td>  
  
  <td align="center" style="background-color:#FFF;"><select id="Mea_a<?php echo $k.'_'.$m; ?>" class="Inputa" style="width:90px; height:20px;"><option value="<?php echo $rSubK['Measure']; ?>" selected><?php echo $rSubK['Measure']; ?></option><option value="Acreage">Acreage</option><option value="Event">Event</option><option value="Program">Program</option><option value="Process">Process</option><option value="Maintenance">Maintenance</option><option value="Time">Time</option><option value="Yield">Yield</option><option value="None">None</option></select></td>
  
  <td align="center" style="background-color:#FFF;"><select id="Uni_a<?php echo $k.'_'.$m; ?>" class="Inputa" style="width:70px; height:20px;"><option value="<?php echo $rSubK['Unit']; ?>" selected><?php echo $rSubK['Unit']; ?></option><option value="%">%</option><option value="Acres">Acres</option><option value="Days">Days</option><option value="Month">Month</option><option value="Hours">Hours</option><option value="Kg">Kg</option><option value="Ton">Ton</option><option value="Kg/Acre">Kg/Acre</option><option value="Number">Number</option><option value="None">None</option></select></td>
  
  <td align="center"><input type="hidden" id="WWei_a<?php echo $k.'_'.$m; ?>" value="<?php echo $rSubK['Weightage']; ?>"/>
  <input id="Wei_a<?php echo $k.'_'.$m; ?>" class="Inputa" value="<?php echo $rSubK['Weightage']; ?>" style="width:60px; text-align:center;" maxlength="8" onChange="ChangeWeighta(<?php echo $k.', '.$m; ?>)"/></td>
  
  <td align="center" style="background-color:#FFF;"><select id="Log_a<?php echo $k.'_'.$m; ?>" class="Inputa" style="width:60px; height:20px;"><option value="<?php echo $rSubK['Logic']; ?>" selected><?php echo $rSubK['Logic']; ?></option><option value="Logic1">Logic1</option><option value="Logic2">Logic2</option><option value="Logic3">Logic3</option><option value="Logic4">Logic4</option><option value="Logic5">Logic5</option></select></td>
  <td align="center" style="background-color:#FFF;"><select id="Per_a<?php echo $k.'_'.$m; ?>" class="Inputa" style="width:80px; height:20px;"><option value="<?php echo $rSubK['Period']; ?>" selected><?php if($rSubK['Period']=='Annual'){echo 'Annually';}elseif($rSubK['Period']=='1/2 Annual'){echo 'Half Yearly';}elseif($rSubK['Period']=='Quarter'){echo 'Quarterly';}elseif($rSubK['Period']=='Monthly'){echo 'Monthly';} ?></option><option value="Annual">Annually</option><option value="1/2 Annual">Half Yearly</option><option value="Quarter">Quarterly</option><option value="Monthly">Monthly</option></select></td>
  
  
  <td align="center"><input type="hidden" id="TTar_a<?php echo $k.'_'.$m; ?>" value="0"/>
  <input id="Tar_a<?php echo $k.'_'.$m; ?>" class="Inputa" value="<?php echo $rSubK['Target']; ?>" style="cursor:<?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){echo 'pointer';} ?>;width:60px; text-align:center;text-decoration:<?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){ echo 'underline'; }?>;color:<?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){ echo '#000099'; }?>;" maxlength="8" <?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){ ?> onClick="FunSubTgt(<?php echo $rSubK['KRASubId']; ?>,'<?php echo $rSubK['Period']; ?>',<?php echo $rSubK['Target'].','.intval($rSubK['Weightage']); ?>,'<?php echo $rSubK['Logic']; ?>')" <?php } ?> onChange="ChangeTargeta(<?php echo $k.', '.$m; ?>)" /></td>
  
</tr>  
<?php $m++;} ?>	
<?php /* While Close*/ ?>		 
     </table>
  </div> 
  </td>
 </tr>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?> 
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?>
  
<?php $k++; } ?>
</table></td>
</tr>
<?php } ?>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>		  
	 </table>
   </td>
</form>
</tr> 
     
	 
<tr>
<?php /****************************************** Form-B Start **************************/ ?>
<?php /****************************************** Form-B Start **************************/ ?>	 
<form name="SkillFormB" method="post" onSubmit="return ValidationFormB(this)"> 
<td id="FormB" style="" width="100%">
<table border="0" width="100%">
 <tr><td colspan="7" align="center" class="font" style="color:#000084; width:100%;" valign="middle">Form - B (Behavioral/Skills)</td></tr>
  
 <tr bgcolor="#FFFF53" style="height:22px;">   
  <td class="font" align="center" style="width:40px;">SNo.</td>
  <td class="font" align="center" style="width:250px;">Behavioral/Skills</td>
  <td class="font" align="center" style="width:550px;">Description</td>
  <td class="font" align="center" style="width:60px;">Weightage</td>
  <td class="font" align="center" style="width:60px;">Logic</td>
  <td class="font" align="center" style="width:60px;">Period</td>
  <td class="font" align="center" style="width:60px;">Target</td>
 </tr>
 
<?php $sqlBY=mysql_query("select fbf.*,fb.Skill,fb.SkillComment,fb.Weightage,fb.Logic,fb.Period,fb.Target from hrm_employee_pms_behavioralformb fbf inner join hrm_pms_formb fb on fbf.FormBId=fb.FormBId where fbf.EmpId=".$_REQUEST['e']." AND fbf.YearId=".$resSY['CurrY']." order by fbf.BehavioralFormBId ASC", $con);	  
$SnoB=1; while($resBY=mysql_fetch_array($sqlBY)){ ?>
 <tr bgcolor="#FFFFFF">   
  <td class="font1" align="center" ><?php echo $SnoB; ?></td>	  
  <td class="font1" valign="top" ><?php echo ucwords(strtolower($resBY['Skill'])); ?></td>
  <td class="font1" valign="top"><?php echo $resBY['SkillComment']; ?></td>
  <td class="font1" align="center"><?php echo $resBY['Weightage']; ?></td>
  <td class="font1" align="center"><?php echo $resBY['Logic']; ?></td>
  <td class="font1" align="center"><?php echo $resBY['Period']; ?></td>
  <td class="font1" align="center"><span <?php if($resBY['Period']!='Annual' AND $resBY['Period']!=''){ echo 'style="cursor:pointer;text-decoration:underline;color:#000099;"';} if($resBY['Period']!='Annual' AND $resBY['Period']!=''){ ?> onClick="FunSubFormBTgt(<?php echo $resSY['CurrY'].','.$_REQUEST['e'].','.$resBY['FormBId']; ?>,'<?php echo $resBY['Period']; ?>',<?php echo $resBY['Target'].','.intval($resBY['Weightage']); ?>,'<?php echo $resBY['Logic']; ?>')" <?php } ?>  ><?php echo $resBY['Target']; ?></span></td>
 </tr> 
<?php $SnoB++;} ?>
								 								 	  	 	  
</table>
</td>
</form>   
<?php /****************************************** Form-B Close **************************/ ?>
<?php /****************************************** Form-B Close **************************/ ?>
</tr>
<tr><td>&nbsp;</td></tr>	 
	 
	 
	 
	 
  </table>
   </td>
 </tr>

         

	  </table>

	</td>

   </tr>

<?php //******************************************** ?>    

  </table>

 </td>

</tr>					

<?php //***************************** Close ***************************************** ?>					

				  </table>

				 </td>

			  </tr>

			 

			  <tr>

			     <td>&nbsp;</td>

			     <td align="Right" class="fontButton" width="1200">

				   </td>

		      </tr>

			   </form>

			</table>

           </td>

			  </tr>

	        </table>

			

<?php //**************************************************************************************************** ?>

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



