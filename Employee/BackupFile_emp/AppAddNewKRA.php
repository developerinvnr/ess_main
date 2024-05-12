<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}else{header('Location:../index.php');}
//include("SetKraPmsy.php"); 

$sqlOld=mysql_query("select * from hrm_year where YearId=".$_SESSION['KraYId_Old'], $con); 
$sqlCurr=mysql_query("select * from hrm_year where YearId=".$_SESSION['KraYId'],$con);
$sqlNew=mysql_query("select * from hrm_year where YearId=".$_SESSION['KraYId_New'], $con); 
$resOld=mysql_fetch_assoc($sqlOld);  $resCurr=mysql_fetch_assoc($sqlCurr); $resNew=mysql_fetch_assoc($sqlNew);
$FromOld=date("Y", strtotime($resOld['FromDate'])); $ToOld=date("Y", strtotime($resOld['ToDate'])); 
$FromCurr=date("Y", strtotime($resCurr['FromDate'])); $ToCurr=date("Y", strtotime($resCurr['ToDate']));
$FromNew=date("Y", strtotime($resNew['FromDate'])); $ToNew=date("Y", strtotime($resNew['ToDate']));
/******************************************************************************/
if(isset($_POST['EditKRA']))
{

 $sqlDept=mysql_query("select DepartmentId from hrm_employee_general where EmployeeID=".$_REQUEST['e'],$con);
 $resDept=mysql_fetch_assoc($sqlDept);

$search =  '!"#$/\'-:_' ;
$search = str_split($search);
 for($i=1; $i<=$_POST['EditTNRow']; $i++)
 {
  if($_POST['KRA_'.$i]!='')
  { $str_KRA = $_POST['KRA_'.$i]; $str_KRADes = $_POST['KRADes_'.$i]; $KRA=str_replace($search, "", $str_KRA); $KRADes=str_replace($search, "", $str_KRADes);
    $sqlSaveK=mysql_query("update hrm_pms_kra set KRA='".addslashes($KRA)."', KRA_Description='".addslashes($KRADes)."', Measure='".$_POST['Measure_'.$i]."', Unit='".$_POST['Unit_'.$i]."', Weightage=".$_POST['Weightage_'.$i].", Logic='".$_POST['Logic_'.$i]."', Period='".$_POST['Period_'.$i]."', Target=".$_POST['Target_'.$i].", AppStatus='P', CreatedBy=".$EmployeeId.", CreatedDate='".date("Y-m-d")."' where KRAId=".$_POST['KId_'.$i], $con); 
   }
  if($_POST['KRA_'.$i]==''){$sqlSaveK=mysql_query("delete from hrm_pms_kra where KRAId=".$_POST['KId_'.$i], $con); }
 }
 $j=$_POST['EditTNRow']+1;
 for($k=$j; $k<=15; $k++)
 {
  if($_POST['KRA_'.$k]!='')
  { $str_KRA2 = $_POST['KRA_'.$k]; $str_KRADes2 = $_POST['KRADes_'.$k]; $KRA2=str_replace($search, "", $str_KRA2); $KRADes2=str_replace($search, "", $str_KRADes2);
	$sqlSaveK=mysql_query("insert into hrm_pms_kra(YearId, EmployeeID, DepartmentId, KRA, KRA_Description, Measure, Unit, Weightage, Logic, Period, Target, CompanyId, KRAStatus, UseKRA, AppStatus, CreatedBy, CreatedDate)value(".$_SESSION['KraYId'].", ".$_REQUEST['e'].", ".$resDept['DepartmentId'].", '".addslashes($KRA2)."', '".addslashes($KRADes2)."', '".$_POST['Measure_'.$k]."', '".$_POST['Unit_'.$k]."', ".$_POST['Weightage_'.$k].", '".$_POST['Logic_'.$k]."', '".$_POST['Period_'.$k]."', ".$_POST['Target_'.$k].", ".$CompanyId.", 'R', 'A', 'P', ".$EmployeeId.", '".date("Y-m-d")."')", $con); 
  }
 } 
 if($sqlSaveK){$msg='KRA Update Successfully..!';}  
}

if(isset($_POST['SubmitKRA']))
{

 $sqlDept=mysql_query("select DepartmentId from hrm_employee_general where EmployeeID=".$_REQUEST['e'],$con);
 $resDept=mysql_fetch_assoc($sqlDept);

$search =  '!"#$/\'-:_' ;
$search = str_split($search);
 $TotalWeight=$_POST['WWeightage_1']+$_POST['WWeightage_2']+$_POST['WWeightage_3']+$_POST['WWeightage_4']+$_POST['WWeightage_5']+$_POST['WWeightage_6']+$_POST['WWeightage_7']+$_POST['WWeightage_8']+$_POST['WWeightage_9']+$_POST['WWeightage_10']+$_POST['WWeightage_11']+$_POST['WWeightage_12']+$_POST['WWeightage_13']+$_POST['WWeightage_14']+$_POST['WWeightage_15'];

     for($i=1; $i<=$_POST['EditTNRow']; $i++)
      { if($_POST['KRA_'.$i]!='')
	    { $str_KRA = $_POST['KRA_'.$i]; $str_KRADes = $_POST['KRADes_'.$i]; $KRA=str_replace($search, "", $str_KRA); $KRADes=str_replace($search, "", $str_KRADes);
		  $sqlSaveK=mysql_query("update hrm_pms_kra set KRA='".addslashes($KRA)."', KRA_Description='".addslashes($KRADes)."', Measure='".$_POST['Measure_'.$i]."', Unit='".$_POST['Unit_'.$i]."', Weightage=".$_POST['Weightage_'.$i].", Logic='".$_POST['Logic_'.$i]."', Period='".$_POST['Period_'.$i]."', Target=".$_POST['Target_'.$i].", UseKRA='A', AppStatus='P', CreatedBy=".$EmployeeId.", CreatedDate='".date("Y-m-d")."' where KRAId=".$_POST['KId_'.$i], $con); 
		}
       if($_POST['KRA_'.$i]==''){$sqlSaveK=mysql_query("delete from hrm_pms_kra where KRAId=".$_POST['KId_'.$i], $con); }
      }
       $j=$_POST['EditTNRow']+1;
      for($k=$j; $k<=15; $k++)
      { if($_POST['KRA_'.$k]!='')
	    { $str_KRA2 = $_POST['KRA_'.$k]; $str_KRADes2 = $_POST['KRADes_'.$k]; $KRA2=str_replace($search, "", $str_KRA2); $KRADes2=str_replace($search, "", $str_KRADes2);
		  $sqlSaveK=mysql_query("insert into hrm_pms_kra(YearId, EmployeeID, DepartmentId, KRA, KRA_Description, Measure, Unit, Weightage, Logic, Period, Logic, Period, Target, CompanyId, KRAStatus, UseKRA, AppStatus, CreatedBy, CreatedDate)value(".$_SESSION['KraYId'].", ".$_REQUEST['e'].", ".$resDept['DepartmentId'].", '".addslashes($KRA2)."', '".addslashes($KRADes2)."', '".$_POST['Measure_'.$k]."', '".$_POST['Unit_'.$k]."', ".$_POST['Weightage_'.$k].", '".$_POST['Logic_'.$k]."', '".$_POST['Period_'.$k]."', ".$_POST['Target_'.$k].", ".$CompanyId.", 'R', 'A', 'P', ".$EmployeeId.", '".date("Y-m-d")."')", $con); 
		}
      } 
      if($sqlSaveK)
	  {
	  
	   if($TotalWeight==100)
       {
        if($_POST['EditTNRow']>=3)
	    { 
		  $sqlU=mysql_query("update hrm_pms_kra set KRAStatus='R',UseKRA='R',AppStatus='A' where YearId=".$_SESSION['KraYId']." AND EmployeeID=".$_REQUEST['e'], $con); 
		  if($sqlU){$msg='KRA Submitted Successfully..!';}
	    }
		else{echo '<script>alert("Error....Please Check!, Minimum Total Number Of KRA Must Be 3 !");</script>';}
	   }
	   elseif($TotalWeight!=100){echo '<script>alert("Error....Please Check!, Total value of weightage not equal to 100 !");</script>';}
	   
	   
	  } 
	 
}

/******** Sub KRA  Open ******/
if($_REQUEST['actsubkra']=='OkSubKraEdit' && $_REQUEST['MWei']!='' && $_REQUEST['KId']!='')
{
 $TotalWei=$_REQUEST['Wei1']+$_REQUEST['Wei2']+$_REQUEST['Wei3']+$_REQUEST['Wei4']+$_REQUEST['Wei5'];
 for($i=1; $i<=5; $i++)
 { 
  if($_REQUEST['SKId'.$i]!='')
  { 
   if($_REQUEST['Kra'.$i]!=''){ $sU=mysql_query("update hrm_pms_krasub set KRA='".addslashes($_REQUEST['Kra'.$i])."', KRA_Description='".addslashes($_REQUEST['KraD'.$i])."', Measure='".$_REQUEST['Mea'.$i]."', Unit='".$_REQUEST['Uni'.$i]."', Weightage=".$_REQUEST['Wei'.$i].", Logic='".$_REQUEST['Log'.$i]."', Period='".$_REQUEST['Per'.$i]."', Target=".$_REQUEST['Tar'.$i].", CrUpDate='".date("Y-m-d")."' where KRAId=".$_REQUEST['KId']." AND KRASubId=".$_REQUEST['SKId'.$i], $con); }else{ $sD=mysql_query("delete from hrm_pms_krasub where KRAId=".$_REQUEST['KId']." AND KRASubId=".$_REQUEST['SKId'.$i], $con); }
  }
  elseif($_REQUEST['SKId'.$i]=='')
  { 
   if($_REQUEST['Kra'.$i]!=''){ $sU=mysql_query("insert into hrm_pms_krasub(KRAId, EmployeeID, KRA, KRA_Description, Measure, Unit, Weightage, Logic, Period, Target, KSubStatus, CrUpDate)value(".$_REQUEST['KId'].", '".$_REQUEST['e']."', '".addslashes($_REQUEST['Kra'.$i])."', '".addslashes($_REQUEST['KraD'.$i])."', '".$_REQUEST['Mea'.$i]."', '".$_REQUEST['Uni'.$i]."', ".$_REQUEST['Wei'.$i].", '".$_REQUEST['Log'.$i]."', '".$_REQUEST['Per'.$i]."', ".$_REQUEST['Tar'.$i].", 'A', '".date("Y-m-d")."')", $con); }
  }

 }
 
  if($sU)
  { 
   if($TotalWei==$_REQUEST['MWei']){echo '<script>alert("Sub-KRAs have been saved successfully."); window.location="AppAddNewKRA.php?e='.$_REQUEST['e'].'&DI='.$_REQUEST['DI'].'&ee=1&aa=0&rr=1&hh=1&sh=1&hp=1&fr=1&kr=0&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"; </script>';}
   else{ $sU=mysql_query("update hrm_pms_krasub set Weightage=0 where KRAId=".$_REQUEST['KId'], $con);   
   echo '<script>alert("Error..Please Check!, Sub-KRAs weightage is not equal to main KRA weightage !");
    window.location="AppAddNewKRA.php?e='.$_REQUEST['e'].'&DI='.$_REQUEST['DI'].'&ee=1&aa=0&rr=1&hh=1&sh=1&hp=1&fr=1&kr=0&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"; </script>';}
  } 	  
}

/******** Sub KRA  Open ******/ 
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<link type="text/css" href="css/mycss.css" rel="stylesheet"/>
<style>
.Input2a{font-family:Times New Roman; height:22px;font-weight:bold; font-size:12px;text-align:center;}.Inputa{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF;width:100%; border-top-color:#FFFFFF; border:0;}
</style>
<script type="text/javascript" language="javascript">
for(var j=6; j<15; j++) 
{ function ShowRow(j) 
  {
  var u = j+1;  var u1 = j-1; //var a = j+2; c=a-1; alert("a="+a+"j="+c);
  if(j<=14) {document.getElementById('minusImg_'+j).style.display = 'block'; document.getElementById('addImg_'+j).style.display = 'none'; document.getElementById('Row_'+j).style.display = 'block'; document.getElementById('addImg_'+u).style.display = 'block'; document.getElementById('minusImg_'+u1).style.display = 'none';} 
  else { document.getElementById('minusImg_'+j).style.display = 'block'; document.getElementById('addImg_'+j).style.display = 'none'; document.getElementById('Row_'+j).style.display = 'block';  document.getElementById('minusImg_'+u1).style.display = 'none';  } 
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
  var KRA_1=document.getElementById("KRA_1").value; var KRA_2=document.getElementById("KRA_2").value; var KRA_3=document.getElementById("KRA_3").value; var KRA_4=document.getElementById("KRA_4").value; var KRA_5=document.getElementById("KRA_5").value; var KRA_6=document.getElementById("KRA_6").value; var KRA_7=document.getElementById("KRA_7").value; var KRA_8=document.getElementById("KRA_8").value; var KRA_9=document.getElementById("KRA_9").value; var KRA_10=document.getElementById("KRA_10").value; var KRA_11=document.getElementById("KRA_11").value; var KRA_12=document.getElementById("KRA_12").value; var KRA_13=document.getElementById("KRA_13").value; var KRA_14=document.getElementById("KRA_14").value; var KRA_15=document.getElementById("KRA_15").value;  
  
  var Measure_1=document.getElementById("Measure_1").value; var Measure_2=document.getElementById("Measure_2").value; var Measure_3=document.getElementById("Measure_3").value; var Measure_4=document.getElementById("Measure_4").value; var Measure_5=document.getElementById("Measure_5").value; var Measure_6=document.getElementById("Measure_6").value; var Measure_7=document.getElementById("Measure_7").value; var Measure_8=document.getElementById("Measure_8").value; var Measure_9=document.getElementById("Measure_9").value; var Measure_10=document.getElementById("Measure_10").value; var Measure_11=document.getElementById("Measure_11").value; var Measure_12=document.getElementById("Measure_12").value;  var Measure_13=document.getElementById("Measure_13").value; var Measure_14=document.getElementById("Measure_14").value; var Measure_15=document.getElementById("Measure_15").value;
  
  var Unit_1=document.getElementById("Unit_1").value; var Unit_2=document.getElementById("Unit_2").value; var Unit_3=document.getElementById("Unit_3").value; var Unit_4=document.getElementById("Unit_4").value; var Unit_5=document.getElementById("Unit_5").value; var Unit_6=document.getElementById("Unit_6").value; var Unit_7=document.getElementById("Unit_7").value; var Unit_8=document.getElementById("Unit_8").value; var Unit_9=document.getElementById("Unit_9").value; var Unit_10=document.getElementById("Unit_10").value; var Unit_11=document.getElementById("Unit_11").value; var Unit_12=document.getElementById("Unit_12").value; var Unit_13=document.getElementById("Unit_13").value; var Unit_14=document.getElementById("Unit_14").value; var Unit_15=document.getElementById("Unit_15").value; 
  
  var Weightage_1=document.getElementById("Weightage_1").value; var Weightage_2=document.getElementById("Weightage_2").value; var Weightage_3=document.getElementById("Weightage_3").value; var Weightage_4=document.getElementById("Weightage_4").value; var Weightage_5=document.getElementById("Weightage_5").value; var Weightage_6=document.getElementById("Weightage_6").value; var Weightage_7=document.getElementById("Weightage_7").value; var Weightage_8=document.getElementById("Weightage_8").value; var Weightage_9=document.getElementById("Weightage_9").value; var Weightage_10=document.getElementById("Weightage_10").value; var Weightage_11=document.getElementById("Weightage_11").value; var Weightage_12=document.getElementById("Weightage_12").value; var Weightage_13=document.getElementById("Weightage_13").value; var Weightage_14=document.getElementById("Weightage_14").value; var Weightage_15=document.getElementById("Weightage_15").value; 
  
  var WWeightage_1=parseFloat(document.getElementById("WWeightage_1").value); var WWeightage_2=parseFloat(document.getElementById("WWeightage_2").value); var WWeightage_3=parseFloat(document.getElementById("WWeightage_3").value); var WWeightage_4=parseFloat(document.getElementById("WWeightage_4").value); var WWeightage_5=parseFloat(document.getElementById("WWeightage_5").value); var WWeightage_6=parseFloat(document.getElementById("WWeightage_6").value); var WWeightage_7=parseFloat(document.getElementById("WWeightage_7").value); var WWeightage_8=parseFloat(document.getElementById("WWeightage_8").value); var WWeightage_9=parseFloat(document.getElementById("WWeightage_9").value); var WWeightage_10=parseFloat(document.getElementById("WWeightage_10").value); var WWeightage_11=parseFloat(document.getElementById("WWeightage_11").value); var WWeightage_12=parseFloat(document.getElementById("WWeightage_12").value); var WWeightage_13=parseFloat(document.getElementById("WWeightage_13").value); var WWeightage_14=parseFloat(document.getElementById("WWeightage_14").value); var WWeightage_15=parseFloat(document.getElementById("WWeightage_15").value); 
  
  var Target_1=document.getElementById("Target_1").value; var Target_2=document.getElementById("Target_2").value; var Target_3=document.getElementById("Target_3").value; var Target_4=document.getElementById("Target_4").value; var Target_5=document.getElementById("Target_5").value; var Target_6=document.getElementById("Target_6").value; var Target_7=document.getElementById("Target_7").value; var Target_8=document.getElementById("Target_8").value;  var Target_9=document.getElementById("Target_9").value; var Target_10=document.getElementById("Target_10").value; var Target_11=document.getElementById("Target_11").value; var Target_12=document.getElementById("Target_12").value; var Target_13=document.getElementById("Target_13").value; var Target_14=document.getElementById("Target_14").value; var Target_15=document.getElementById("Target_15").value;
  
  var TTarget_1=parseFloat(document.getElementById("TTarget_1").value); var TTarget_2=parseFloat(document.getElementById("TTarget_2").value); var TTarget_3=parseFloat(document.getElementById("TTarget_3").value); var TTarget_4=parseFloat(document.getElementById("TTarget_4").value); var TTarget_5=parseFloat(document.getElementById("TTarget_5").value); var TTarget_6=parseFloat(document.getElementById("TTarget_6").value); var TTarget_7=parseFloat(document.getElementById("TTarget_7").value);  var TTarget_8=parseFloat(document.getElementById("TTarget_8").value); var TTarget_9=parseFloat(document.getElementById("TTarget_9").value); var TTarget_10=parseFloat(document.getElementById("TTarget_10").value); var TTarget_11=parseFloat(document.getElementById("TTarget_11").value); var TTarget_12=parseFloat(document.getElementById("TTarget_12").value); var TTarget_13=parseFloat(document.getElementById("TTarget_13").value); var TTarget_14=parseFloat(document.getElementById("TTarget_14").value); var TTarget_15=parseFloat(document.getElementById("TTarget_15").value);
  
  var Period_1=document.getElementById("Period_1").value; var Period_2=document.getElementById("Period_2").value;  var Period_3=document.getElementById("Period_3").value; var Period_4=document.getElementById("Period_4").value; var Period_5=document.getElementById("Period_5").value; var Period_6=document.getElementById("Period_6").value; var Period_7=document.getElementById("Period_7").value; var Period_8=document.getElementById("Period_8").value; var Period_9=document.getElementById("Period_9").value; var Period_10=document.getElementById("Period_10").value; var Period_11=document.getElementById("Period_11").value; var Period_12=document.getElementById("Period_12").value; var Period_13=document.getElementById("Period_13").value; var Period_14=document.getElementById("Period_14").value; var Period_15=document.getElementById("Period_15").value;
  
  var SubK_1=parseFloat(document.getElementById("SubKraRow_1").value); var SubK_2=parseFloat(document.getElementById("SubKraRow_2").value); var SubK_3=parseFloat(document.getElementById("SubKraRow_3").value); var SubK_4=parseFloat(document.getElementById("SubKraRow_4").value); var SubK_5=parseFloat(document.getElementById("SubKraRow_5").value); var SubK_6=parseFloat(document.getElementById("SubKraRow_6").value); var SubK_7=parseFloat(document.getElementById("SubKraRow_7").value); var SubK_8=parseFloat(document.getElementById("SubKraRow_8").value); var SubK_9=parseFloat(document.getElementById("SubKraRow_9").value); var SubK_10=parseFloat(document.getElementById("SubKraRow_10").value); var SubK_11=parseFloat(document.getElementById("SubKraRow_11").value); var SubK_12=parseFloat(document.getElementById("SubKraRow_12").value); var SubK_13=parseFloat(document.getElementById("SubKraRow_13").value); var SubK_14=parseFloat(document.getElementById("SubKraRow_14").value); var SubK_15=parseFloat(document.getElementById("SubKraRow_15").value);
 
    if(KRA_1!=''){ if(Weightage_1.length === 0) {alert("please type weightage in row 1.");  return false;}
	if(SubK_1==0)
    {
	if(Measure_1=='None' || Measure_1=='') {alert("please select measure type in row 1.");  return false;}
    if(Target_1.length === 0) {alert("please type target in row 1.");  return false;}
    var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_1); var test_numT = Numfilter.test(Target_1);
    if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 1'); return false; }
    if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 1'); return false; }
    if(Weightage_1<2 && Period_1!='Annual' && Period_1!=''){alert("Error row 1, system allow 1/2 annual, quarter, monthly period if weightage >=2!"); return false;}
	if(Weightage_1>=2 && Weightage_1<10 && Period_1=='Monthly' && Period_1!=''){alert("Error row 1, system allow 'monthly period' if weightage>=10!"); return false;} }
	}
	
   if(KRA_2!=''){ if(Weightage_2.length === 0) {alert("please type weightage in row 2.");  return false;}
   if(SubK_2==0)
   {
   if(Measure_2=='None' || Measure_2=='') {alert("please select measure type in row 2.");  return false;}
   if(Target_2.length === 0) {alert("please type target in row 2.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_2); var test_numT = Numfilter.test(Target_2);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 2'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 2'); return false; } 
   if(Weightage_2<2 && Period_2!='Annual' && Period_2!=''){alert("Error row 2, system allow '1/2 annual', 'quarter', 'monthly' period if weightage >=2!"); return false;} 
   if(Weightage_2>=2 && Weightage_2<10 && Period_2=='Monthly' && Period_2!=''){alert("Error row 2, system allow 'monthly period' if weightage>=10!"); return false;} }
   }
   
   if(KRA_3!=''){ if(Weightage_3.length === 0) {alert("please type weightage in row 3.");  return false;}
   if(SubK_3==0)
   {
   if(Measure_3=='None' || Measure_3=='') {alert("please select measure type in row 3.");  return false;}
   if(Target_3.length === 0) {alert("please type target in row 3.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_3); var test_numT = Numfilter.test(Target_3);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 3'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 3'); return false; }
   if(Weightage_3<2 && Period_3!='Annual' && Period_3!=''){alert("Error row 3, system allow 1/2 annual, quarter, monthly period if weightage >=2!"); return false;}
   if(Weightage_3>=2 && Weightage_3<10 && Period_3=='Monthly' && Period_3!=''){alert("Error row 3, system allow 'monthly period' if weightage>=10!"); return false;} }
   }
   
   if(KRA_4!=''){ if(Weightage_4.length === 0) {alert("please type weightage in row 4.");  return false;}
   if(SubK_4==0)
   {
   if(Measure_4=='None' || Measure_4=='') {alert("please select measure type in row 4.");  return false;}
   if(Target_4.length === 0) {alert("please type target in row 4.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_4); var test_numT = Numfilter.test(Target_4);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 4'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 4'); return false; }
   if(Weightage_4<2 && Period_4!='Annual' && Period_4!=''){alert("Error row 4, system allow 1/2 annual, quarter, monthly period if weightage >=2!"); return false;}
   if(Weightage_4>=2 && Weightage_4<10 && Period_4=='Monthly' && Period_4!=''){alert("Error row 4, system allow 'monthly period' if weightage>=10!"); return false;}
   }
   
   //if(Weightage_4<2 && Period_4!='Annual' && Period_4!=''){alert("Error row 4, system allow 1/2 annual, quarter, monthly period if weightage >=2!"); return false;}
   //if(Weightage_4>=2 && Weightage_4<10 && Period_4=='Monthly' && Period_4!=''){alert("Error row 4, system allow 'monthly period' if weightage>=10!"); return false;}
   
    }
   
   if(KRA_5!=''){ if(Weightage_5.length === 0) {alert("please type weightage in row 5.");  return false;}
   if(SubK_5==0)
   {
   if(Measure_5=='None' || Measure_5=='') {alert("please select measure type in row 5.");  return false;}
   if(Target_5.length === 0) {alert("please type target in row 5.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_5); var test_numT = Numfilter.test(Target_5);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 5'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 5'); return false; }
   if(Weightage_5<2 && Period_5!='Annual' && Period_5!=''){alert("Error row 5, system allow 1/2 annual, quarter, monthly period if weightage >=2!"); return false;}
   if(Weightage_5>=2 && Weightage_5<10 && Period_5=='Monthly' && Period_5!=''){alert("Error row 5, system allow 'monthly period' if weightage>=10!"); return false;} }
   }
   
   if(KRA_6!=''){ if(Weightage_6.length === 0) {alert("please type weightage in row 6.");  return false;}
   if(SubK_6==0)
   {
   if(Measure_6=='None' || Measure_6=='') {alert("please select measure type in row 6.");  return false;}
   if(Target_6.length === 0) {alert("please type target in row 6.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_6); var test_numT = Numfilter.test(Target_6);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 6'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 6'); return false; }
   if(Weightage_6<2 && Period_6!='Annual' && Period_6!=''){alert("Error row 6, system allow 1/2 annual, quarter, monthly period if weightage >=2!"); return false;}
   if(Weightage_6>=2 && Weightage_6<10 && Period_6=='Monthly' && Period_6!=''){alert("Error row 6, system allow 'monthly period' if weightage>=10!"); return false;} }
   }
   
   if(KRA_7!=''){ if(Weightage_7.length === 0) {alert("please type weightage in row 7.");  return false;}
   if(SubK_7==0)
   {
   if(Measure_7=='None' || Measure_7=='') {alert("please select measure type in row 7.");  return false;}
   if(Target_7.length === 0) {alert("please type target in row 7.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_7); var test_numT = Numfilter.test(Target_7);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 7'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 7'); return false; }
   if(Weightage_7<2 && Period_7!='Annual' && Period_7!=''){alert("Error row 7, system allow 1/2 annual, quarter, monthly period if weightage >=2!"); return false;}
   if(Weightage_7>=2 && Weightage_7<10 && Period_7=='Monthly' && Period_7!=''){alert("Error row 7, system allow 'monthly period' if weightage>=10!"); return false;} }
   }
   
   if(KRA_8!=''){ if(Weightage_8.length === 0) {alert("please type weightage in row 8.");  return false;}
   if(SubK_8==0)
   {
   if(Measure_8=='None' || Measure_8=='') {alert("please select measure type in row 8.");  return false;}
   if(Target_8.length === 0) {alert("please type target in row 8.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_8); var test_numT = Numfilter.test(Target_8);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 8'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 8'); return false; }
   if(Weightage_8<2 && Period_8!='Annual' && Period_8!=''){alert("Error row 8, system allow 1/2 annual, quarter, monthly period if weightage >=2!"); return false;}
   if(Weightage_8>=2 && Weightage_8<10 && Period_8=='Monthly' && Period_8!=''){alert("Error row 8, system allow 'monthly period' if weightage>=10!"); return false;} }
   }
   
   if(KRA_9!=''){ if(Weightage_9.length === 0) {alert("please type weightage in row 9.");  return false;}
   if(SubK_9==0)
   {
   if(Measure_9=='None' || Measure_9=='') {alert("please select measure type in row 9.");  return false;}
   if(Target_9.length === 0) {alert("please type target in row 9.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_9); var test_numT = Numfilter.test(Target_9);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 9'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 9'); return false; }
   if(Weightage_9<2 && Period_9!='Annual' && Period_9!=''){alert("Error row 9, system allow 1/2 annual, quarter, monthly period if weightage >=2!"); return false;}
   if(Weightage_9>=2 && Weightage_9<10 && Period_9=='Monthly' && Period_9!=''){alert("Error row 9, system allow 'monthly period' if weightage>=10!"); return false;} }
   }
   
   if(KRA_10!=''){ if(Weightage_10.length === 0) {alert("please type weightage in row 10.");  return false;}
   if(SubK_10==0)
   {
   if(Measure_10=='None' || Measure_10=='') {alert("please select measure type in row 10.");  return false;}
   if(Target_10.length === 0) {alert("please type target in row 10.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_10); var test_numT = Numfilter.test(Target_10);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 10'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 10'); return false; }
   if(Weightage_10<2 && Period_10!='Annual' && Period_10!=''){alert("Error row 10, system allow 1/2 annual, quarter, monthly period if weightage >=2!"); return false;}
   if(Weightage_10>=2 && Weightage_10<10 && Period_10=='Monthly' && Period_10!=''){alert("Error row 10, system allow 'monthly period' if weightage>=10!"); return false;} }
   }
   
   if(KRA_11!=''){ if(Weightage_11.length === 0) {alert("please type weightage in row 11.");  return false;}
   if(SubK_11==0)
   {
   if(Measure_11=='None' || Measure_11=='') {alert("please select measure type in row 11.");  return false;}
   if(Target_11.length === 0) {alert("please type target in row 11.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_11); var test_numT = Numfilter.test(Target_11);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 11'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 11'); return false; }
   if(Weightage_11<2 && Period_11!='Annual' && Period_11!=''){alert("Error row 11, system allow 1/2 annual, quarter, monthly period if weightage >=2!"); return false;}
   if(Weightage_11>=2 && Weightage_11<10 && Period_11=='Monthly' && Period_11!=''){alert("Error row 11, system allow 'monthly period' if weightage>=10!"); return false;} }
   }
   
   if(KRA_12!=''){ if(Weightage_12.length === 0) {alert("please type weightage in row 12.");  return false;}
   if(SubK_12==0)
   {
   if(Measure_12=='None' || Measure_12=='') {alert("please select measure type in row 12.");  return false;}
   if(Target_12.length === 0) {alert("please type target in row 12.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_12); var test_numT = Numfilter.test(Target_12);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 12'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 12'); return false; }
   if(Weightage_12<2 && Period_12!='Annual' && Period_12!=''){alert("Error row 12, system allow 1/2 annual, quarter, monthly period if weightage >=2!"); return false;}
   if(Weightage_12>=2 && Weightage_12<10 && Period_12=='Monthly' && Period_12!=''){alert("Error row 12, system allow 'monthly period' if weightage>=10!"); return false;} }
   }
   
   if(KRA_13!=''){ if(Weightage_13.length === 0) {alert("please type weightage in row 13.");  return false;}
   if(SubK_13==0)
   {
   if(Measure_13=='None' || Measure_13=='') {alert("please select measure type in row 13.");  return false;}
   if(Target_13.length === 0) {alert("please type target in row 13.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_13); var test_numT = Numfilter.test(Target_13);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 13'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 13'); return false; }
   if(Weightage_13<2 && Period_13!='Annual' && Period_13!=''){alert("Error row 13, system allow 1/2 annual, quarter, monthly period if weightage >=2!"); return false;}
   if(Weightage_13>=2 && Weightage_13<10 && Period_13=='Monthly' && Period_13!=''){alert("Error row 13, system allow 'monthly period' if weightage>=10!"); return false;} }
   }
   
   if(KRA_14!=''){ if(Weightage_14.length === 0) {alert("please type weightage in row 14.");  return false;}
   if(SubK_14==0)
   {
   if(Measure_14=='None' || Measure_14=='') {alert("please select measure type in row 14.");  return false;}
   if(Target_14.length === 0) {alert("please type target in row 14.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_14); var test_numT = Numfilter.test(Target_14);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 14'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 14'); return false; }
   if(Weightage_14<2 && Period_14!='Annual' && Period_14!=''){alert("Error row 14, system allow 1/2 annual, quarter, monthly period if weightage >=2!"); return false;}
   if(Weightage_14>=2 && Weightage_14<10 && Period_14=='Monthly' && Period_14!=''){alert("Error row 14, system allow 'monthly period' if weightage>=10!"); return false;} }
   }
   
   if(KRA_15!=''){ if(Weightage_15.length === 0) {alert("please type weightage in row 15.");  return false;}
   if(SubK_15==0)
   {
   if(Measure_15=='None' || Measure_15=='') {alert("please select measure type in row 15.");  return false;}
   if(Target_15.length === 0) {alert("please type target in row 15.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_15); var test_numT = Numfilter.test(Target_15);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 15'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 15'); return false; }
   if(Weightage_15<2 && Period_15!='Annual' && Period_15!=''){alert("Error row 15, system allow 1/2 annual, quarter, monthly period if weightage >=2!"); return false;}
   if(Weightage_15>=2 && Weightage_15<10 && Period_15=='Monthly' && Period_15!=''){alert("Error row 15, system allow 'monthly period' if weightage>=10!"); return false;} }   
   }
   //var TotalWeight=WWeightage_1+WWeightage_2+WWeightage_3+WWeightage_4+WWeightage_5+WWeightage_6+WWeightage_7+WWeightage_8+WWeightage_9+WWeightage_10+WWeightage_11+WWeightage_12+WWeightage_13+WWeightage_14+WWeightage_15;
   //if(TotalWeight!=100){ alert("Total value of weightage not equal to 100"); return false; }

}

function ChangeWeight(v,n)
{ //var Weightage=document.getElementById("Weightage_"+n).value; 
  if(v==''){document.getElementById("WWeightage_"+n).value=0;}else{document.getElementById("WWeightage_"+n).value=v;}
  if(v<=5){document.getElementById("Period_"+n).value='Annual';} 
  else{document.getElementById("Period_"+n).value=document.getElementById("PPeriod_"+n).value;}
}


function EditKRAvalue()
{ var n=document.getElementById("EditTNRow").value; 
  for(var r=1; r<=n; r++){document.getElementById("KRA_"+r).readOnly=false; document.getElementById("KRADes_"+r).readOnly=false; 
  document.getElementById("Measure_"+r).readOnly=false; document.getElementById("Unit_"+r).readOnly=false; document.getElementById("Weightage_"+r).readOnly=false;
  document.getElementById("Target_"+r).readOnly=false;}
  document.getElementById("EditKRA").style.display='block'; document.getElementById("EditK").style.display='none';
}


/**** Sub KRA open Sub KRA open **************************************/
function FunSubO(k){ document.getElementById("Div"+k).style.display='block'; document.getElementById("SpanO"+k).style.display='block'; document.getElementById("SpanC"+k).style.display='none'; } 
function FunSubC(k){ document.getElementById("Div"+k).style.display='none'; document.getElementById("SpanO"+k).style.display='none'; document.getElementById("SpanC"+k).style.display='block'; } 

function ChangeWeighta(v,k,m)
{ //var Weightage=document.getElementById("Wei_a"+k+"_"+m).value; 
  if(v==''){document.getElementById("WWei_a"+k+"_"+m).value=0;}else{document.getElementById("WWei_a"+k+"_"+m).value=v;} 
  if(v<=5){document.getElementById("Per_a"+k+"_"+m).value='Annual';} 
  else{document.getElementById("Per_a"+k+"_"+m).value=document.getElementById("PPer_a"+k+"_"+m).value;}
  
}

function ChangeTargeta(v,k,m)
{ //var Target=document.getElementById("Tar_a"+k+"_"+m).value; 
  if(v==''){document.getElementById("TTar_a"+k+"_"+m).value=0;} 
  else {document.getElementById("TTar_a"+k+"_"+m).value=v; } }   


function SaveKraA(k,m)
{
  var Kra_1=document.getElementById("Kra_a"+k+"_1").value.replace(/[`~!#$^&*_|\-??'"<>\{\}\[\]\\\/]/gi, ''); 
  var Kra_2=document.getElementById("Kra_a"+k+"_2").value.replace(/[`~!#$^&*_|\-??'"<>\{\}\[\]\\\/]/gi, ''); 
  var Kra_3=document.getElementById("Kra_a"+k+"_3").value.replace(/[`~!#$^&*_|\-??'"<>\{\}\[\]\\\/]/gi, ''); 
  var Kra_4=document.getElementById("Kra_a"+k+"_4").value.replace(/[`~!#$^&*_|\-??'"<>\{\}\[\]\\\/]/gi, ''); 
  var Kra_5=document.getElementById("Kra_a"+k+"_5").value.replace(/[`~!#$^&*_|\-??'"<>\{\}\[\]\\\/]/gi, '');
  
  var KraD_1=document.getElementById("KraDes_a"+k+"_1").value.replace(/[`~!#$^&*_|\-??'"<>\{\}\[\]\\\/]/gi, ''); 
  var KraD_2=document.getElementById("KraDes_a"+k+"_2").value.replace(/[`~!#$^&*_|\-??'"<>\{\}\[\]\\\/]/gi, ''); 
  var KraD_3=document.getElementById("KraDes_a"+k+"_3").value.replace(/[`~!#$^&*_|\-??'"<>\{\}\[\]\\\/]/gi, ''); 
  var KraD_4=document.getElementById("KraDes_a"+k+"_4").value.replace(/[`~!#$^&*_|\-??'"<>\{\}\[\]\\\/]/gi, ''); 
  var KraD_5=document.getElementById("KraDes_a"+k+"_5").value.replace(/[`~!#$^&*_|\-??'"<>\{\}\[\]\\\/]/gi, ''); 
  
  var Mea_1=document.getElementById("Mea_a"+k+"_1").value; var Mea_2=document.getElementById("Mea_a"+k+"_2").value;
  var Mea_3=document.getElementById("Mea_a"+k+"_3").value; var Mea_4=document.getElementById("Mea_a"+k+"_4").value;
  var Mea_5=document.getElementById("Mea_a"+k+"_5").value; 
   
  var Wei_1=document.getElementById("Wei_a"+k+"_1").value; var Wei_2=document.getElementById("Wei_a"+k+"_2").value;
  var Wei_3=document.getElementById("Wei_a"+k+"_3").value; var Wei_4=document.getElementById("Wei_a"+k+"_4").value;
  var Wei_5=document.getElementById("Wei_a"+k+"_5").value; 

  var Tar_1=document.getElementById("Tar_a"+k+"_1").value; var Tar_2=document.getElementById("Tar_a"+k+"_2").value; 
  var Tar_3=document.getElementById("Tar_a"+k+"_3").value; var Tar_4=document.getElementById("Tar_a"+k+"_4").value; 
  var Tar_5=document.getElementById("Tar_a"+k+"_5").value; 
  
  var Log_1=document.getElementById("Log_a"+k+"_1").value; var Log_2=document.getElementById("Log_a"+k+"_2").value;
  var Log_3=document.getElementById("Log_a"+k+"_3").value; var Log_4=document.getElementById("Log_a"+k+"_4").value;
  var Log_5=document.getElementById("Log_a"+k+"_5").value;
  
  var Per_1=document.getElementById("Per_a"+k+"_1").value; var Per_2=document.getElementById("Per_a"+k+"_2").value;
  var Per_3=document.getElementById("Per_a"+k+"_3").value; var Per_4=document.getElementById("Per_a"+k+"_4").value;
  var Per_5=document.getElementById("Per_a"+k+"_5").value;
  

  if(document.getElementById("Kra_a"+k+"_1").value!='')
  {
   if(Mea_1=='None') {alert("please select measure type in sub-KRA row 1.");  return false;}
   if(Wei_1.length === 0){alert("please type weightage in sub-KRA row 1."); return false;}
   if(Tar_1.length === 0){alert("please type target in sub-KRA row 1.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Wei_1); var test_numT = Numfilter.test(Tar_1);
   if(test_numW==false){ alert('Please Enter Only Numeric in the Weightage in sub-KRA row 1'); return false; }
   if(test_numT==false){ alert('Please Enter Only Numeric in the Target in sub-KRA row 1'); return false; }
   if(Wei_1<2 && Per_1!='Annual' && Per_1!=''){alert("Error sub-KRA row 1, system allow 1/2 annual, quarter, monthly period if weightage >=2!"); return false;}
   if(Wei_1>=2 && Wei_1<10 && Per_1=='Monthly' && Per_1!=''){alert("Error sub-KRA row 1, system allow 'monthly period' if weightage>=10!"); return false;}
  }
  if(document.getElementById("Kra_a"+k+"_2").value!='')
  {
   if(Mea_2=='None') {alert("please select measure type in sub-KRA row 2.");  return false;}
   if(Wei_2.length === 0){alert("please type weightage in sub-KRA row 2.");  return false;}
   if(Tar_2.length === 0){alert("please type target in sub-KRA row 2.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Wei_2); var test_numT = Numfilter.test(Tar_2);
   if(test_numW==false){ alert('Please Enter Only Numeric in the Weightage in sub-KRA row 2'); return false; }
   if(test_numT==false){ alert('Please Enter Only Numeric in the Target in sub-KRA row 2'); return false; }
   if(Wei_2<2 && Per_2!='Annual' && Per_2!=''){alert("Error sub-KRA row 2, system allow 1/2 annual, quarter, monthly period if weightage >=2!"); return false;}
   if(Wei_2>=2 && Wei_2<10 && Per_2=='Monthly' && Per_2!=''){alert("Error sub-KRA row 2, system allow 'monthly period' if weightage>=10!"); return false;}
  }
  if(document.getElementById("Kra_a"+k+"_3").value!='')
  {
   if(Mea_3=='None') {alert("please select measure type in sub-KRA row 3.");  return false;}
   if(Wei_3.length === 0){alert("please type weightage in sub-KRA row 3.");  return false;}
   if(Tar_3.length === 0){alert("please type target in sub-KRA row 3.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Wei_3); var test_numT = Numfilter.test(Tar_3);
   if(test_numW==false){ alert('Please Enter Only Numeric in the Weightage in sub-KRA row 3'); return false; }
   if(test_numT==false){ alert('Please Enter Only Numeric in the Target in sub-KRA row 3'); return false; }
   if(Wei_3<2 && Per_3!='Annual' && Per_3!=''){alert("Error sub-KRA row 3, system allow 1/2 annual, quarter, monthly period if weightage >=2!"); return false;}
   if(Wei_3>=2 && Wei_3<10 && Per_3=='Monthly' && Per_3!=''){alert("Error sub-KRA row 3, system allow 'monthly period' if weightage>=10!"); return false;}
  }
  if(document.getElementById("Kra_a"+k+"_4").value!='')
  {
   if(Mea_4=='None') {alert("please select measure type in sub-KRA row 4.");  return false;}
   if(Wei_4.length === 0){alert("please type weightage in sub-KRA row 4.");  return false;}
   if(Tar_4.length === 0){alert("please type target in sub-KRA row 4.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Wei_4); var test_numT = Numfilter.test(Tar_4);
   if(test_numW==false){ alert('Please Enter Only Numeric in the Weightage in sub-KRA row 4'); return false; }
   if(test_numT==false){ alert('Please Enter Only Numeric in the Target in sub-KRA row 4'); return false; }
   if(Wei_4<2 && Per_4!='Annual' && Per_4!=''){alert("Error sub-KRA row 4, system allow 1/2 annual, quarter, monthly period if weightage >=2!"); return false;}
   if(Wei_4>=2 && Wei_4<10 && Per_4=='Monthly' && Per_4!=''){alert("Error sub-KRA row 4, system allow 'monthly period' if weightage>=10!"); return false;}
  }  
  if(document.getElementById("Kra_a"+k+"_5").value!='')
  {
   if(Mea_5=='None') {alert("please select measure type in sub-KRA row 5.");  return false;}
   if(Wei_5.length === 0){alert("please type weightage in sub-KRA row 5.");  return false;}
   if(Tar_5.length === 0){alert("please type target in sub-KRA row 5.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Wei_5); var test_numT = Numfilter.test(Tar_5);
   if(test_numW==false){ alert('Please Enter Only Numeric in the Weightage sub-KRA in row 5'); return false; }
   if(test_numT==false){ alert('Please Enter Only Numeric in the Target in sub-KRA row 5'); return false; }
   if(Wei_5<2 && Per_5!='Annual' && Per_5!=''){alert("Error sub-KRA row 5, system allow 1/2 annual, quarter, monthly period if weightage >=2!"); return false;}
   if(Wei_5>=2 && Wei_5<10 && Per_5=='Monthly' && Per_5!=''){alert("Error sub-KRA row 5, system allow 'monthly period' if weightage>=10!"); return false;}
  }
  var agree=confirm("Are you sure you want to save the Sub-KRAs?");
  if(agree)
  { 
    window.location="AppAddNewKRA.php?actsubkra=OkSubKraEdit&e="+document.getElementById("e").value+"&DI="+document.getElementById("DI").value+"&KId="+document.getElementById("KraId_"+k).value+"&MWei="+document.getElementById("Weightage_"+k).value+"&SKId1="+document.getElementById("SubKraId_"+k+"_1").value+"&SKId2="+document.getElementById("SubKraId_"+k+"_2").value+"&SKId3="+document.getElementById("SubKraId_"+k+"_3").value+"&SKId4="+document.getElementById("SubKraId_"+k+"_4").value+"&SKId5="+document.getElementById("SubKraId_"+k+"_5").value+"&Kra1="+Kra_1+"&Kra2="+Kra_2+"&Kra3="+Kra_3+"&Kra4="+Kra_4+"&Kra5="+Kra_5+"&KraD1="+KraD_1+"&KraD2="+KraD_2+"&KraD3="+KraD_3+"&KraD4="+KraD_4+"&KraD5="+KraD_5+"&Mea1="+document.getElementById("Mea_a"+k+"_1").value+"&Mea2="+document.getElementById("Mea_a"+k+"_2").value+"&Mea3="+document.getElementById("Mea_a"+k+"_3").value+"&Mea4="+document.getElementById("Mea_a"+k+"_4").value+"&Mea5="+document.getElementById("Mea_a"+k+"_5").value+"&Uni1="+document.getElementById("Uni_a"+k+"_1").value+"&Uni2="+document.getElementById("Uni_a"+k+"_2").value+"&Uni3="+document.getElementById("Uni_a"+k+"_3").value+"&Uni4="+document.getElementById("Uni_a"+k+"_4").value+"&Uni5="+document.getElementById("Uni_a"+k+"_5").value+"&Wei1="+document.getElementById("WWei_a"+k+"_1").value+"&Wei2="+document.getElementById("WWei_a"+k+"_2").value+"&Wei3="+document.getElementById("WWei_a"+k+"_3").value+"&Wei4="+document.getElementById("WWei_a"+k+"_4").value+"&Wei5="+document.getElementById("WWei_a"+k+"_5").value+"&Tar1="+Tar_1+"&Tar2="+Tar_2+"&Tar3="+Tar_3+"&Tar4="+Tar_4+"&Tar5="+Tar_5+"&Log1="+document.getElementById("Log_a"+k+"_1").value+"&Log2="+document.getElementById("Log_a"+k+"_2").value+"&Log3="+document.getElementById("Log_a"+k+"_3").value+"&Log4="+document.getElementById("Log_a"+k+"_4").value+"&Log5="+document.getElementById("Log_a"+k+"_5").value+"&Per1="+document.getElementById("Per_a"+k+"_1").value+"&Per2="+document.getElementById("Per_a"+k+"_2").value+"&Per3="+document.getElementById("Per_a"+k+"_3").value+"&Per4="+document.getElementById("Per_a"+k+"_4").value+"&Per5="+document.getElementById("Per_a"+k+"_5").value;
  }
  else{return false;}

}
/**** Sub KRA open Sub KRA open **************************************/

function FunTgt(kid,prd,tgt,wgt,lgc)
{ var e=document.getElementById("e").value; var eid=document.getElementById("empiid").value; 
  var c=document.getElementById("ComId").value;
 window.open("setkrapptgt.php?act=setkratgt&n=1&valueins=true&checkalpha=false&d=12&pa=4&y=2&kid="+kid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&lgc="+lgc+"&wgt="+wgt+"&row="+document.getElementById("row").value+"&row2="+document.getElementById("row2").value+"&eid="+eid+"&c="+c, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=600"); }

function FunSubTgt(kid,prd,tgt,wgt,lgc)
{ 
    //alert("aa");
    var e=document.getElementById("e").value; var eid=document.getElementById("empiid").value; 
  var c=document.getElementById("ComId").value;
 window.open("setkrapptgt.php?act=setkratgt&n=2&valueins=true&checkalpha=false&d=12&pa=4&y=2&kid="+kid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&lgc="+lgc+"&wgt="+wgt+"&row="+document.getElementById("row").value+"&row2="+document.getElementById("row2").value+"&eid="+eid+"&c="+c, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=600"); 
    
}


function FunFormBTgt(e,yid,fbid,prd,tgt,wgt,lgc)
{ var c=document.getElementById("ComId").value; 
  var win = window.open("setkrapptgtformb.php?act=setkratgt&n=1&valueins=true&checkalpha=false&d=12&pa=4&y=2&fbid="+fbid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&lgc="+lgc+"&wgt="+wgt+"&yid="+yid+"&c="+c, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=600"); 
}


function FunFormBSubTgt(e,yid,fbid,prd,tgt,wgt,lgc)
{ var c=document.getElementById("ComId").value; 
  var win = window.open("setkrapptgtformb.php?act=setkratgt&n=2&valueins=true&checkalpha=false&d=12&pa=4&y=2&fbid="+fbid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&lgc="+lgc+"&wgt="+wgt+"&yid="+yid+"&c="+c, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=600"); 
} 


<!--
function doBlink(){
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
<input type="hidden" id="EmpId" value="" /> 
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />
<input type="hidden" id="e" value="<?php echo $EmployeeId; ?>"/>
<input type="hidden" id="empiid" value="<?php echo $_REQUEST['e']; ?>"/>
<input type="hidden" id="DI" value="0"/> 
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="KraYId" id="KraYId" value="<?php echo $_SESSION['KraYId']; ?>" /> 
<input type="hidden" name="PmsYId" id="PmsYId" value="<?php echo $_SESSION['PmsYId']; ?>" />

<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td>
 <table width="100%" style="margin-top:0px;">
  <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
  <tr>
   <td valign="top" style="background-image:url(images/pmsback.png);width:100%;">
   <table border="0" style="width:100%;height:500px;float:none;" cellpadding="0">
   <tr>
    <td valign="top" style="width:100%;">      
    <table border="0" id="Activity" style="width:100%;">
	<tr>
     <td style="width:100%;" valign="top">
	 <table border="0" style="width:100%;">
<?php //*************************************** Start ********************************************* ?>	
<?php //*************************************** Start ********************************************* ?>
					
<tr>
 <td style="background-image:url(images/pmsback.png);width:100%;">	 
 <table style="width:100%;">
<!--  Head Parts Open Open Open  --> 
<!--  Head Parts Open Open Open  --> 
 <tr>
  <td>
   <table>
    <tr>
<?php if($_SESSION['EmpType']=='E'){ ?>
<td align="center" valign="top"><a href="pms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>&ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=0&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_emp1" src="images/emp1.png" border="0"/></a></td>

<?php } if($_SESSION['BtnApp']>0 OR $_SESSION['BtnKApp']>0) { ?>
<td align="center" valign="top"><img id="Img_manager1" src="images/manager.png" border="0"/></td>
		   
<?php } if($_SESSION['BtnRev']>0 OR $_SESSION['BtnKRev']>0) { ?><td align="center" valign="top"><a href="HodPms.php?ee=1&aa=1&rr2=1&rr=0&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/hod1.png" border="0"/></a></td>

<?php } if($_SESSION['BtnRev2']>0) { ?><td align="center" valign="top"><a href="Rev2HodPms.php?ee=1&rr2=0&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/RevHod1.png" border="0"/></a></td>	
		   
<?php } if($_SESSION['BtnHod']>0) { ?><td align="center" valign="top"><a href="RevHodPms.php?ee=1&rr2=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/m1.png" border="0"/></a></td><?php } ?>

<td><font class="msg_b"><i><?php echo $msg; ?></i></font><font class="formc"><span id="MsgSpan"></span></font></td>	 
	</tr>
   </table>
  </td>
 </tr>
 
 <tr><td style="vertical-align:top;width:100%;"><?php include("SetKraPmsma.php"); ?></td></tr>
<!--  Head Parts Close Close Close  --> 
<!--  Head Parts Close Close Close  --> 
  <tr>
    <td style="width:100%;">
	  <table border="0" style="width:100%;">
	    <tr>
<?php /****************************************** Form Start **************************/ ?>
<?php $sqlE=mysql_query("select EmpCode,Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['e'],$con); 
$resE=mysql_fetch_assoc($sqlE); ?>  
		<td class="formh" style="width:99%;text-align:center;" valign="middle">EmpCode&nbsp;:&nbsp;<font color="#FFFF00"><?php echo $resE['EmpCode']; ?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name&nbsp;:&nbsp;<font color="#FFFF00"><?php echo $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onClick="OpenOldKra()"/><font color="#620000" style="font-size:12px;">Old KRA</font></a> </td> 
		</tr>		       
	  </table>
	</td>
  </tr>

  <tr>
   <td id="OldKRaID" style="display:none;width:100%;">
	 <table cellpadding="0" cellspacing="0" style="width:100%;">		     
      <tr>  
       <td id="Achivement" style="width:100%;">
	   <table border="0" cellpadding="0" cellspacing="0" style="width:100%;"> 
        <tr>
	     <td colspan="8" class="fhead" style="color:#000084;width:100%;font-weight:bold;text-align:left;">Your Old KRA for Assessment Year&nbsp;<?php if($CompanyId==1){ echo $FromOld; }else{ $OF=$FromOld; $OT=$ToOld; echo $OF.'-'.$OT; } ?>&nbsp;&nbsp;<a href="#" onClick="CloseOldKra()"/><font color="#620000">Hide</font></a></td>    
	    </tr>
	   </table>
	  </td>	  
	 </tr>
     
	 <tr>	
      <td colspan="8" style="width:100%;">
	  <table border="1" style="border-color:#EEF0AA;width:100%;background-color:#EEF0AA;" cellspacing="0"> 
       <tr bgcolor="#EEF0AA" style="height:24px;">   
        <td class="font" align="center" style="width:3%;">&nbsp;</td>
        <td class="font" align="center" style="width:25%;">KRA/Goals</td>
        <td class="font" align="center" style="width:50%;">Description</td>  
        <td class="font" align="center" style="width:7;">Measure</td>
        <td class="font" align="center" style="width:5%;">Unit</td>
        <td class="font" align="center" style="width:5%;">Weightage</td>
        <td class="font" align="center" style="width:5%;">Target</td>
       </tr>
<?php $sqlEK=mysql_query("select * from hrm_employee_pms_kraforma k INNER JOIN hrm_employee_pms p ON k.EmpPmsId=p.EmpPmsId where p.EmployeeID=".$_REQUEST['e']." AND YearId=".$_SESSION['KraYId_Old'], $con); $rowEK=mysql_num_rows($sqlEK); 
if($rowEK>0) { $resEK=mysql_fetch_assoc($sqlEK); $sqlEK2=mysql_query("select KRA, KRA_Description, Measure, Unit, ek.Weightage, ek.Target from hrm_employee_pms_kraforma ek INNER JOIN hrm_pms_kra k ON ek.KRAId=k.KRAId where ek.EmpPmsid=".$resEK['EmpPmsId']." AND ek.KRAFormAStatus='A' AND k.CompanyId=".$CompanyId, $con); $no=1; $rowEK2=mysql_num_rows($sqlEK2); if($rowEK2>0) { while($resEK2=mysql_fetch_array($sqlEK2)){ ?>

       <input type="hidden" id="KSn" value="<?php echo $no; ?>">
       <input type="hidden" id="KRAGoal<?php echo $no; ?>" value="<?php echo $resEK2['KRA']; ?>"/>
       <input type="hidden" id="Des<?php echo $no; ?>" value="<?php echo $resEK2['KRA_Description']; ?>"/>
       <input type="hidden" id="Mea<?php echo $no; ?>" value="<?php echo $resEK2['Measure']; ?>"/>
       <input type="hidden" id="Uni<?php echo $no; ?>" value="<?php echo $resEK2['Unit']; ?>"/>
       <input type="hidden" id="Wei<?php echo $no; ?>" value="<?php echo $resEK2['Weightage']; ?>"/>
       <input type="hidden" id="Tar<?php echo $no; ?>" value="<?php echo $resEK2['Target']; ?>"/>
       <tr id="TR_<?php echo $no; ?>" bgcolor="#FFFFFF">   
        <td class="tdc"><input type="checkbox" id="NoId_<?php echo $no; ?>" value="SNo" onClick="return ClickCheckKRA(<?php echo $no; ?>)"/></td>  
        <td class="tdl"><?php echo $resEK2['KRA']; ?></td>
        <td class="tdl"><?php echo $resEK2['KRA_Description']; ?></td>  
        <td class="tdc"><?php echo $resEK2['Measure']; ?></td>
        <td class="tdc"><?php echo $resEK2['Unit']; ?></td>
        <td class="tdc"><?php echo $resEK2['Weightage']; ?></td>
        <td class="tdc"><?php echo $resEK2['Target']; ?></td>
	   </tr>
       <?php $no++; } }}?>
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
   <td style="width:100%;">
   <table border="0" style="width:100%;">
	<tr>
	
<?php /****************************************** Form Start **************************/ ?>	 
<?php /***************** AppraisalForm **************************/ ?>	
	  <td id="AppraisalForm" style="width:100%;display:block;">
	   <table cellpadding="0" cellspacing="0" style="width:100%;">		     
  
<tr>
<?php /***************** Achivement **************************/ ?>
<form name="KRAFormSubmit" method="post" onSubmit="return ValidationAchive(this)">   
<form  name="KRAForm" method="post" onSubmit="return ValidationAchive(this)">   
 <td id="Achivement" style="width:100%;">
  <table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
    
<?php $sql=mysql_query("select * from hrm_pms_kra where YearId=".$_SESSION['KraYId']." AND CompanyId=".$CompanyId." AND EmployeeID=".$_REQUEST['e']." AND (KRAStatus='R' OR KRAStatus='A') order by KRAId ASC", $con); $row=mysql_num_rows($sql); $sql2=mysql_query("select * from hrm_pms_kra where YearId=".$_SESSION['KraYId']." AND CompanyId=".$CompanyId." AND EmployeeID=".$_REQUEST['e']." AND (KRAStatus='R' OR KRAStatus='A') AND (UseKRA='R' OR UseKRA='H') order by KRAId ASC", $con); $row2=mysql_num_rows($sql2); ?>
<input type="hidden" id="row" value="<?php echo $row; ?>" />
<input type="hidden" id="row2" value="<?php echo $row2; ?>" />       	
	
    <tr>
     <td style="width:2%;"></td>
	 <td colspan="7" style="width:98%;">
	  <table border="0" style="width:100%;">
	   <tr>
	    <td class="fbody" style="color:#000084;width:75%;font-weight:bold;" valign="middle">
	        
	     <?php //if($resDept['DepartmentId']==6 || $resDept['DepartmentId']==9){ ?>
	<script type="text/javascript">function FunChkCal(){ if(document.getElementById("ChkCal").checked==true){document.getElementById("SpanId").style.display='block';}else{document.getElementById("SpanId").style.display='none';} } function isNumberKey(evt){ var charCode = (evt.which) ? evt.which : evt.keyCode; if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) return false; return true; }
	function FunCalculator()
	{
	 var v1=parseFloat(document.getElementById("Intp1").value); var v2=parseFloat(document.getElementById("Intp2").value);
	 if(v1>0){var OnePer=(v1*1)/100;}else{var OnePer=1;}
	 if(v2>0){document.getElementById("Intp3").value=Math.round(v2/OnePer);} 
	}
	</script>
		<table border="0" style="width:100%;">
	    <tr>
	 <td class="fbody" style="text-align:right;width:85%;">
	  <span id="SpanId" style="display:none;">
	  <b>Target Value:</b>&nbsp;<input type="text" class="d" id="Intp1" onKeyPress="return isNumberKey(event)" style="width:100px;text-align:center;" onKeyUp="FunCalculator()" />
	  &nbsp;&nbsp;&nbsp;
	  <b>Achive Value:</b>&nbsp;<input type="text" class="d" id="Intp2" onKeyPress="return isNumberKey(event)" style="width:100px;text-align:center;" onKeyUp="FunCalculator()" />
	  &nbsp;&nbsp;&nbsp;
	  <b>Rating:</b>&nbsp;<input type="text" class="d" id="Intp3" style="width:60px;text-align:center;background-color:#FFAAFF;" readonly/>
	  </span>
	 </td>
	 <td class="fbody" style="text-align:right;font-size:14px; width:15%;">
	  <input type="checkbox" id="ChkCal" onClick="FunChkCal()" />
	  <font color="#00FFFF"><span class="blink_me"><b>CALCULATOR</b></span></font>
	 </td>
	  </tr>
	 </table>
	 <?php //} ?>    
	        
	    </td>
	
	    <td class="tdc" style="width:130px;">
		<input type="button" name="back" id="back" style="width:100%;" value="back" onClick="javascript:window.location='AppCheckNewKRA.php?ee=1&aa=0&rr=1&hh=1&sh=1&hp=1&fr=1&kr=0&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1'"/></td>
		<td class="tdc" style="width:130px;"><?php if($row>0){ ?><input type="Submit" name="SubmitKRA" id="SubmitKRA" value="final submit" style="width:100%;" <?php if($row2>0){echo 'disabled';} ?>/><?php } ?></td>
		<td class="tdr" style="width:130px;"><?php if($row>0){ ?><input type="button" name="EditK" id="EditK" style="width:100%;" value="Edit" <?php if($row2>0){echo 'disabled';} ?> onClick="EditKRAvalue()"/><input type="Submit" name="EditKRA" id="EditKRA" style="width:100%;display:none;" value="save as draft"/><?php } ?></td>
	   </tr>
	  </table>
	 </td>	  
    </tr>
	
    <tr style="height:24px;">	
     <td style="width:2%;"></td> 
     <td colspan="7" style="width:98%;">
      <table border="1" style="width:100%;" cellspacing="0"> 
	   <tr style="background-color:#FFFF53;"><td colspan="9" align="center" class="tdc" style="height:25px;font-size:14px; border-bottom:hidden;" valign="middle"><b>Form - A (KRA)&nbsp;&nbsp;List down your KRA for Assessment Year&nbsp;<?php if($CompanyId==1){echo $FromCurr;}else{$NF=$FromCurr; $NT=$ToCurr; echo $NF.'-'.$NT;}?></b></td></tr>
       <tr style="height:25px;background-color:#FFFF53;">   
        <td class="tdc" style="width:30px;"><b>Sn</b></td>
        <td class="tdc" style="width:300px;"><b>KRA/Goals</b></td>
        <td class="tdc" style="width:400px;"><b>Description</b></td>  
        <td class="tdc" style="width:80px;"><b>Measure</b></td>
        <td class="tdc" style="width:80px;"><b>Unit</b></td>
        <td class="tdc" style="width:60px;"><b>Weightage</b></td>
        <td class="tdc" style="width:80px;"><b>Logic</b></td>
        <td class="tdc" style="width:80px;"><b>Period</b></td>
        <td class="tdc" style="width:60px;"><b>Target</b></td>
       </tr>
	  </table>
     </td>
    </tr>
    <?php if($row>0) { $k=1; while($res=mysql_fetch_assoc($sql)){ $sSubK=mysql_query("select * from hrm_pms_krasub where KRAId=".$res['KRAId']." AND KSubStatus='A' order by KRASubId ASC",$con); $rowSubK=mysql_num_rows($sSubK);?>
    <tr id="TR_<?php echo $k; ?>">	
   <td style="width:2%;"></td> 
   <td colspan="8" style="width:98%;">
    <table id="Row_<?php echo $k; ?>" border="1" style="width:100%;" cellspacing="0">
	<input type="hidden" id="KraIdNo_<?php echo $k; ?>"><input type="hidden" name="KId_<?php echo $k; ?>" value="<?php echo $res['KRAId']; ?>"><input type="hidden" id="SubKraRow_<?php echo $k; ?>" value="<?php echo $rowSubK; ?>">
     <tr bgcolor="#FFFFFF">   
      <td class="tdc" style="width:30px;"><?php echo $k; ?><br><center><span style="cursor:pointer;"><img src="images/open-folder.png" style="height:12px;display:<?php if($rowSubK>0){echo 'block';}else{echo 'none';}?>;" onClick="FunSubC(<?php echo $k; ?>)" id="SpanO<?php echo $k; ?>"/><?php if($res['Weightage']>5){ ?><img src="images/close-folder.png" style="height:12px;display:<?php if($rowSubK>0){echo 'none';}else{echo 'block';}?>;" onClick="FunSubO(<?php echo $k; ?>)" id="SpanC<?php echo $k; ?>"/><?php } ?></span></center></td>
	  
      <td class="tdc" style="width:300px;"><textarea name="KRA_<?php echo $k; ?>" id="KRA_<?php echo $k; ?>" class="Inputar" rows="3" style="width:100%;" maxlength="348" readonly><?php echo $res['KRA']; ?></textarea></td>
      <td class="tdc" style="width:400px;"><textarea name="KRADes_<?php echo $k; ?>" id="KRADes_<?php echo $k; ?>" class="Inputar" rows="3" style="width:100%;" maxlength="580" readonly><?php echo $res['KRA_Description'] ?></textarea></td>  
      <td class="tdc" style="width:80px;"><?php if($rowSubK>0){ ?><input type="hidden" style="width:100%;" name="Measure_<?php echo $k; ?>" id="Measure_<?php echo $k; ?>" value="" readonly/><?php } else{ ?><select name="Measure_<?php echo $k; ?>" id="Measure_<?php echo $k; ?>" class="Input" style="width:100%;"><option value="<?php echo $res['Measure']; ?>"><?php echo $res['Measure']; ?></option><option value="Acreage">Acreage</option><option value="Event">Event</option><option value="Program">Program</option><option value="Process">Process</option><option value="Maintenance">Maintenance</option><option value="Time">Time</option><option value="Yield">Yield</option><option value="Value">Value</option><option value="Volume">Volume</option><option value="Quantity">Quantity</option><option value="Quality">Quality</option><option value="Area">Area</option><option value="Amount">Amount</option><option value="None">None</option></select><?php } ?></td>
      <td class="tdc" style="width:80px;"><?php if($rowSubK>0){ ?><input type="hidden" style="width:100%;" name="Unit_<?php echo $k; ?>" id="Unit_<?php echo $k; ?>" value="" readonly/><?php } else{ ?><select name="Unit_<?php echo $k; ?>" id="Unit_<?php echo $k; ?>" class="Input" style="width:78px; height:20px;"><option value="<?php echo $res['Unit']; ?>"><?php echo $res['Unit']; ?></option><option value="%">%</option><option value="Acres">Acres</option><option value="Days">Days</option><option value="Month">Month</option><option value="Hours">Hours</option><option value="Days/Hours">Days/Hours</option><option value="Kg">Kg</option><option value="Ton">Ton</option><option value="MT">MT</option><option value="Kg/Acre">Kg/Acre</option><option value="Number">Number</option><option value="Lakhs">Lakhs</option><option value="Rs.">Rs.</option><option value="MT">MT</option><option value="INR">INR</option><option value="None">None</option></select><?php } ?></td>
      <td class="tdc" style="width:60px;"><input type="hidden" name="WWeightage_<?php echo $k; ?>" id="WWeightage_<?php echo $k; ?>" value="<?php echo $res['Weightage']; ?>" /><input name="Weightage_<?php echo $k; ?>" id="Weightage_<?php echo $k; ?>" class="Input" style="width:100%;text-align:center;" maxlength="8" onKeyUp="ChangeWeight(this.value,<?php echo $k; ?>)" onChange="ChangeWeight(this.value,<?php echo $k; ?>)" value="<?php echo $res['Weightage']; ?>" readonly/></td>
  
      <td class="tdc" style="width:80px;"><?php if($rowSubK>0){?><input type="hidden" style="width:100%;" name="Logic_<?php echo $k; ?>" id="Logic_<?php echo $k; ?>" value="" readonly><?php }else{?><select name="Logic_<?php echo $k; ?>" id="Logic_<?php echo $k; ?>" class="Input" style="width:100%;" readonly><option value="<?php echo $res['Logic']; ?>"><?php echo $res['Logic']; ?></option><option value="Logic1">Logic1</option><option value="Logic2">Logic2</option><option value="Logic3">Logic3</option><option value="Logic4">Logic4</option><option value="Logic5">Logic5</option><option value="Logic6">Logic6</option><option value="Logic7">Logic7</option><option value="Logic8">Logic8</option><option value="Logic8a">Logic8a</option><option value="Logic8b">Logic8b</option><option value="Logic8c">Logic8c</option><option value="Logic8d">Logic8d</option><option value="Logic8e">Logic8e</option><option value="Logic9">Logic9</option><option value="Logic10">Logic10</option><option value="Logic11">Logic11</option></select><?php } ?></td>
  
      <td class="tdc" style="width:80px;"><input type="hidden" id="PPeriod_<?php echo $k; ?>" value="<?php if($res['Period']!=''){echo $res['Period']; } else {echo 'Annual';} ?>" /> <?php if($rowSubK>0){ ?><input type="" style="width:100%;height:20px;border:hidden;" name="Period_<?php echo $k; ?>" id="Period_<?php echo $k; ?>" value="" readonly><?php }else{?><select name="Period_<?php echo $k; ?>" id="Period_<?php echo $k; ?>" class="Input" style="width:100%;" readonly><option value="<?php echo $res['Period']; ?>"><?php if($res['Period']=='Annual'){echo 'Annually';}elseif($res['Period']=='1/2 Annual'){echo 'Half Yearly';}elseif($res['Period']=='Quarter'){echo 'Quarterly';}elseif($res['Period']=='Monthly'){echo 'Monthly';} ?></option><option value="Annual">Annually</option><option value="1/2 Annual">Half Yearly</option><option value="Quarter">Quarterly</option><option value="Monthly">Monthly</option></select><?php } ?></td>
  
      <td class="tdc" style="width:60px;">
  <?php if($rowSubK>0){ ?><input type="" style="width:100%;text-align:center; border:hidden;" value="" readonly/><input type="hidden" name="Target_<?php echo $k; ?>" id="Target_<?php echo $k; ?>" value="100" readonly/><?php } else{ ?><input name="Target_<?php echo $k; ?>" id="Target_<?php echo $k; ?>" class="Input" style="cursor:<?php if($res['Period']!='Annual' AND $res['Period']!=''){echo 'pointer';} ?>;width:100%;text-align:center;text-decoration:<?php if($res['Period']!='Annual' AND $res['Period']!=''){ echo 'underline'; }?>;color:<?php if($res['Period']!='Annual' AND $res['Period']!=''){ echo '#000099'; }?>;" maxlength="8" <?php if($res['Period']!='Annual' AND $res['Period']!='' AND $row2>0){?> onClick="FunTgt(<?php echo $res['KRAId']; ?>,'<?php echo $res['Period']; ?>',<?php echo $res['Target'].','.intval($res['Weightage']); ?>,'<?php echo $res['Logic']; ?>')" <?php } ?> onChange="ChangeTarget(<?php echo $k; ?>)" value="<?php echo $res['Target']; ?>" readonly/>
  <?php } ?><input type="hidden" name="TTarget_<?php echo $k; ?>" id="TTarget_<?php echo $k; ?>" value="<?php echo $res['Target'] ?>"/>
  </td>
  </tr>
  
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
<?php $sSubK=mysql_query("select * from hrm_pms_krasub where KRAId=".$res['KRAId']." AND KSubStatus='A' order by KRASubId ASC",$con); $rowSubK=mysql_num_rows($sSubK); ?>   
 <tr>
  <td colspan="9" align="right" style="border:hidden;border-style:none;">
  <div id="Div<?php echo $k; ?>" style="display:<?php if($rowSubK>0){echo 'block';}else{echo 'none';} ?>;">
     <table style="width:97%;background-color:#71FF71;" border="0" cellpadding="0" cellspacing="1"> 
     <tr style="background-color:#71FF71;">   
	 <td align="center" class="Input2a" style="width:45px;border:hidden;"><?php /*<span style="cursor:pointer;color:#003162;" onClick="FunSubC(<?php echo $k; ?>)"><u>Hide</u></span>*/ ?></td>
     <td align="center" class="Input2a" style="width:30px;">Sn</td>
     <td align="center" class="Input2a" style="width:280px;">Sub KRA/Goals</td>
     <td align="center" class="Input2a" style="width:390px;">Sub KRA Description</td>  
     <td align="center" class="Input2a" style="width:80px;">Measure</td>
     <td align="center" class="Input2a" style="width:80px;">Unit</td>
     <td align="center" class="Input2a" style="width:60px;">Weightage</td>
	 <td align="center" class="Input2a" style="width:80px;">Logic</td>
	 <td align="center" class="Input2a" style="width:80px;">Period</td>
     <td align="center" class="Input2a" style="width:60px;">Target</td>
     </tr>
<?php if($rowSubK==0){$num=5;}elseif($rowSubK==1){$num=4;}elseif($rowSubK==2){$num=3;}elseif($rowSubK==3){$num=2;}elseif($rowSubK==4){$num=1;}elseif($rowSubK==5){$num=0;} ?>

<?php /* While Open*/ $m=1; while($rSubK=mysql_fetch_assoc($sSubK)){ ?>
  <input type="hidden" id="KraId_<?php echo $k; ?>" value="<?php echo $res['KRAId']; ?>" />
  <input type="hidden" id="SubKraId_<?php echo $k.'_'.$m; ?>" value="<?php echo $rSubK['KRASubId']; ?>" />
  <tr style="background-color:#FFFFFF;">
  <?php if($m==1){ ?>
   <td rowspan="5" class="Input2a" style="background-color:#71FF71;border:hidden;width:50px;" valign="middle" align="center">Sub<br>KRA<br><br><input type="button" style="width:90%;text-align:center;" value="save" onClick="SaveKraA(<?php echo $k.','.$m ?>)" <?php if($row2>0){echo 'disabled';} ?>/></td>
   <?php } ?>   
  <td align="center"><input class="Inputa" style="width:100%;text-align:center;font-weight:bold;" value="<?php if($m==1){$n='a';}elseif($m==2){$n='b';}elseif($m==3){$n='c';}elseif($m==4){$n='d';}elseif($m==5){$n='e';}echo $n; ?>" readonly/><input type="hidden" id="KraIdNo_a<?php echo $k.'_'.$m; ?>"></td>
  <td align="center"><textarea id="Kra_a<?php echo $k.'_'.$m; ?>" class="Inputar2" rows="2" style="width:100%;" maxlength="348" ><?php echo $rSubK['KRA']; ?></textarea></td>
  <td align="center"><textarea id="KraDes_a<?php echo $k.'_'.$m; ?>" class="Inputar2" rows="2" style="width:100%;" maxlength="580"><?php echo $rSubK['KRA_Description']; ?></textarea></td>  
  
  <td align="center" style="background-color:#FFF;"><select id="Mea_a<?php echo $k.'_'.$m; ?>" class="Inputa" style="width:100%; height:20px;"><option value="<?php echo $rSubK['Measure']; ?>" selected><?php echo $rSubK['Measure']; ?></option><option value="Acreage">Acreage</option><option value="Event">Event</option><option value="Program">Program</option><option value="Process">Process</option><option value="Maintenance">Maintenance</option><option value="Time">Time</option><option value="Yield">Yield</option><option value="Value">Value</option><option value="Volume">Volume</option><option value="Quantity">Quantity</option><option value="Quality">Quality</option><option value="Area">Area</option><option value="Amount">Amount</option><option value="None">None</option></select></td>
  
  <td align="center" style="background-color:#FFF;"><select id="Uni_a<?php echo $k.'_'.$m; ?>" class="Inputa" style="width:100%; height:20px;"><option value="<?php echo $rSubK['Unit']; ?>" selected><?php echo $rSubK['Unit']; ?></option><option value="%">%</option><option value="Acres">Acres</option><option value="Days">Days</option><option value="Month">Month</option><option value="Hours">Hours</option><option value="Kg">Kg</option><option value="Ton">Ton</option><option value="MT">MT</option><option value="Kg/Acre">Kg/Acre</option><option value="Number">Number</option><option value="Lakhs">Lakhs</option><option value="Rs.">Rs.</option><option value="MT">MT</option><option value="INR">INR</option><option value="None">None</option></select></td>
  
  <td align="center"><input type="hidden" id="WWei_a<?php echo $k.'_'.$m; ?>" value="<?php echo $rSubK['Weightage']; ?>"/>
  <input id="Wei_a<?php echo $k.'_'.$m; ?>" class="Inputa" value="<?php echo $rSubK['Weightage']; ?>" style="width:100%; text-align:center;" maxlength="8" onKeyUp="ChangeWeighta(this.value,<?php echo $k.', '.$m; ?>)" onChange="ChangeWeighta(this.value,<?php echo $k.', '.$m; ?>)"/></td>
  
  <td align="center" style="background-color:##FFF;"><select id="Log_a<?php echo $k.'_'.$m; ?>" class="Inputa" style="width:100%; height:20px;"><option value="<?php echo $rSubK['Logic']; ?>" selected><?php echo $rSubK['Logic']; ?></option><option value="Logic1">Logic1</option><option value="Logic2">Logic2</option><option value="Logic3">Logic3</option><option value="Logic4">Logic4</option><option value="Logic5">Logic5</option><option value="Logic6">Logic6</option><option value="Logic7">Logic7</option><option value="Logic8">Logic8</option><option value="Logic8a">Logic8a</option><option value="Logic8b">Logic8b</option><option value="Logic8c">Logic8c</option><option value="Logic8d">Logic8d</option><option value="Logic8e">Logic8e</option><option value="Logic9">Logic9</option><option value="Logic10">Logic10</option><option value="Logic11">Logic11</option></select></td>
  <td align="center" style="background-color:#FFF;">
  <input type="hidden" id="PPer_a<?php echo $k.'_'.$m; ?>" value="<?php if($rSubK['Period']!=''){echo $rSubK['Period']; } else {echo 'Annual';} ?>" />
  <select id="Per_a<?php echo $k.'_'.$m; ?>" class="Inputa" style="width:100%; height:20px;"><option value="<?php echo $rSubK['Period']; ?>" selected><?php if($rSubK['Period']=='Annual'){echo 'Annually';}elseif($rSubK['Period']=='1/2 Annual'){echo 'Half Yearly';}elseif($rSubK['Period']=='Quarter'){echo 'Quarterly';}elseif($rSubK['Period']=='Monthly'){echo 'Monthly';} ?></option><option value="Annual">Annually</option><option value="1/2 Annual">Half Yearly</option><option value="Quarter">Quarterly</option><option value="Monthly">Monthly</option></select></td>
  
  
  <td align="center"><input type="hidden" id="TTar_a<?php echo $k.'_'.$m; ?>" value="0"/>
  <input id="Tar_a<?php echo $k.'_'.$m; ?>" class="Inputa" value="<?php echo $rSubK['Target']; ?>" style="cursor:<?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){echo 'pointer';} ?>;width:100%; text-align:center;text-decoration:<?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){ echo 'underline'; }?>;color:<?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){ echo '#000099'; }?>;" maxlength="8" <?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!='' AND $row2>0){ ?> onClick="FunSubTgt(<?php echo $rSubK['KRASubId']; ?>,'<?php echo $rSubK['Period']; ?>',<?php echo $rSubK['Target'].','.intval($rSubK['Weightage']); ?>,'<?php echo $rSubK['Logic']; ?>')" <?php } ?> onKeyUp="ChangeTargeta(this.value,<?php echo $k.', '.$m; ?>)" onChange="ChangeTargeta(this.value,<?php echo $k.', '.$m; ?>)" /></td>
  
</tr> 
<?php $m++;} ?>	
<?php /* While Close*/ ?>	
<?php if($row2==0){ for($mm=$m; $mm<=5; $mm++){ ?>
  <input type="hidden" id="KraId_<?php echo $k; ?>" value="<?php echo $res['KRAId']; ?>" />
  <input type="hidden" id="SubKraId_<?php echo $k.'_'.$mm; ?>" value="" />
  <tr style="background-color:#FFFFFF;">
  <?php if($mm==1){ ?>
   <td rowspan="5" class="Input2a" style="background-color:#71FF71; border:hidden;width:50px;" valign="middle" align="center">Sub<br>KRA<br><br><input type="button" style="width:90%;text-align:center;" value="save" onClick="SaveKraA(<?php echo $k.','.$mm ?>)" <?php if($row2>0){echo 'disabled';} ?>/></td>
   <?php } ?>   
  <td class="tdc"><?php if($mm==1){$n='a';}elseif($mm==2){$n='b';}elseif($mm==3){$n='c';}elseif($mm==4){$n='d';}elseif($mm==5){$n='e';}echo $n.')'; ?><input type="hidden" id="KraIdNo_a<?php echo $k.'_'.$m; ?>"></td>
  <td class="tdc"><textarea id="Kra_a<?php echo $k.'_'.$mm; ?>" class="Inputar2" rows="2" style="width:100%;" maxlength="348" ></textarea></td>
  <td class="tdc"><textarea id="KraDes_a<?php echo $k.'_'.$mm; ?>" class="Inputar2" rows="2" style="width:100%;" maxlength="580"></textarea></td>  
  <td class="tdc"><select id="Mea_a<?php echo $k.'_'.$mm; ?>" class="Inputa" style="width:100%; height:20px;"><option value="Acreage">Acreage</option><option value="Event">Event</option><option value="Program">Program</option><option value="Process">Process</option><option value="Maintenance">Maintenance</option><option value="Time">Time</option><option value="Yield">Yield</option><option value="Value">Value</option><option value="Volume">Volume</option><option value="Quantity">Quantity</option><option value="Quality">Quality</option><option value="Area">Area</option><option value="Amount">Amount</option><option value="None" selected>None</option></select></td>
  
  <td class="tdc"><select id="Uni_a<?php echo $k.'_'.$mm; ?>" class="Inputa" style="width:100%; height:20px;"><option value="%">%</option><option value="Acres">Acres</option><option value="Days">Days</option><option value="Month">Month</option><option value="Hours">Hours</option><option value="Kg">Kg</option><option value="Ton">Ton</option><option value="MT">MT</option><option value="Kg/Acre">Kg/Acre</option><option value="Number">Number</option><option value="Lakhs">Lakhs</option><option value="Rs.">Rs.</option><option value="MT">MT</option><option value="INR">INR</option><option value="None" selected>None</option></select></td>
  
  <td class="tdc"><input type="hidden" id="WWei_a<?php echo $k.'_'.$mm; ?>" value="0"/>
  <input id="Wei_a<?php echo $k.'_'.$mm; ?>" class="Inputa" style="width:100%; text-align:center;" maxlength="8" onKeyUp="ChangeWeighta(this.value,<?php echo $k.', '.$mm; ?>)" onChange="ChangeWeighta(this.value,<?php echo $k.', '.$mm; ?>)"/></td>
  
  <td class="tdc"><select id="Log_a<?php echo $k.'_'.$mm; ?>" class="Inputa" style="width:100%; height:20px;"><option value="Logic1">Logic1</option><option value="Logic2">Logic2</option><option value="Logic3">Logic3</option><option value="Logic4">Logic4</option><option value="Logic5">Logic5</option><option value="Logic6">Logic6</option><option value="Logic7">Logic7</option><option value="Logic8">Logic8</option><option value="Logic8a">Logic8a</option><option value="Logic8b">Logic8b</option><option value="Logic8c">Logic8c</option><option value="Logic8d">Logic8d</option><option value="Logic8e">Logic8e</option><option value="Logic9">Logic9</option><option value="Logic10">Logic10</option><option value="Logic11">Logic11</option></select></td>
  <td class="tdc">
  <input type="hidden" id="PPer_a<?php echo $k.'_'.$mm; ?>" value="Annual" />
  <select id="Per_a<?php echo $k.'_'.$mm; ?>" class="Inputa" style="width:100%; height:20px;"><option value="Annual">Annually</option><option value="1/2 Annual">Half Yearly</option><option value="Quarter">Quarterly</option><option value="Monthly">Monthly</option></select></td>  
  
  
  <td class="tdc"><input type="hidden" id="TTar_a<?php echo $k.'_'.$mm; ?>" value="0"/>
  <input id="Tar_a<?php echo $k.'_'.$mm; ?>" class="Inputa" style="width:100%; text-align:center;" maxlength="8" onKeyUp="ChangeTargeta(this.value,<?php echo $k.', '.$mm; ?>)" onChange="ChangeTargeta(this.value,<?php echo $k.', '.$mm; ?>)" /></td>
  
</tr> 
<?php } } ?>	 
     </table>
  </div> 
  </td>
 </tr>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?> 
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?>   
  
  </table>
  </td>
</tr>	  
<?php $k++; $tn=$k-1;  $j=$k; } ?> <input type="hidden" id="EditTNRow" name="EditTNRow" value="<?php echo $tn; ?>" /> 
<?php } elseif($row==0) { for($i=1; $i<=5; $i++) { ?> 
<tr id="TR_<?php echo $i; ?>">	
  <td style="width:2%;"></td> 
  <td colspan="8" style="width:98%;">
   <table id="Row_<?php echo $i; ?>" style="width:100%;" bgcolor="#FFFFFF" border="1" cellspacing="0"> 
    <tr bgcolor="#FFFFFF">                                          
     <td class="tdc" style="width:30px;"><?php echo $i; ?><input type="hidden" id="KraIdNo_<?php echo $i; ?>"><input type="hidden" id="SubKraRow_<?php echo $i; ?>" value="0"></td>
     <td class="tdc" style="width:300px;"><textarea name="KRA_<?php echo $i; ?>" id="KRA_<?php echo $i; ?>" class="Inputar" rows="3" style="width:100%;" maxlength="348"></textarea></td>
     <td class="tdc" style="width:400px;"><textarea name="KRADes_<?php echo $i; ?>" id="KRADes_<?php echo $i; ?>" class="Inputar" rows="3" style="width:100%;" maxlength="580"></textarea></td>  
     <td class="tdc" style="width:80px;"><select name="Measure_<?php echo $i; ?>" id="Measure_<?php echo $i; ?>" class="Input" style="width:100%;"><option value="Acreage">Acreage</option><option value="Event">Event</option><option value="Program">Program</option><option value="Process">Process</option><option value="Maintenance">Maintenance</option><option value="Time">Time</option><option value="Yield">Yield</option><option value="Value">Value</option><option value="Volume">Volume</option><option value="Quantity">Quantity</option><option value="Quality">Quality</option><option value="Area">Area</option><option value="Amount">Amount</option><option value="None">None</option></select></td>
     <td class="tdc" style="width:80px;"><select name="Unit_<?php echo $i; ?>" id="Unit_<?php echo $i; ?>" class="Input" style="width:100%;"><option value="%">%</option><option value="Acres">Acres</option><option value="Days">Days</option><option value="Month">Month</option><option value="Hours">Hours</option><option value="Days/Hours">Days/Hours</option><option value="Kg">Kg</option><option value="Ton">Ton</option><option value="MT">MT</option><option value="Kg/Acre">Kg/Acre</option><option value="Number">Number</option><option value="Lakhs">Lakhs</option><option value="Rs.">Rs.</option><option value="MT">MT</option><option value="INR">INR</option><option value="None">None</option></select></td>
     <td class="tdc" style="width:60px;"><input type="hidden" name="WWeightage_<?php echo $i; ?>" id="WWeightage_<?php echo $i; ?>" value="0"/><input name="Weightage_<?php echo $i; ?>" id="Weightage_<?php echo $i; ?>" class="Input" style="width:100%; text-align:center;" maxlength="8" onChange="ChangeWeight(<?php echo $i; ?>)"/></td>
     <td class="tdc" style="width:80px;"><select name="Logic_<?php echo $i; ?>" id="Logic_<?php echo $i; ?>" class="Input" style="width:100%;" onChange="ChangeLogic(<?php echo $i; ?>)"><option value="Logic1">Logic1</option><option value="Logic2">Logic2</option><option value="Logic3">Logic3</option><option value="Logic4">Logic4</option><option value="Logic5">Logic5</option><option value="Logic6">Logic6</option><option value="Logic7">Logic7</option><option value="Logic8">Logic8</option><option value="Logic8a">Logic8a</option><option value="Logic8b">Logic8b</option><option value="Logic8c">Logic8c</option><option value="Logic8d">Logic8d</option><option value="Logic8e">Logic8e</option><option value="Logic9">Logic9</option><option value="Logic10">Logic10</option><option value="Logic11">Logic11</option></select></td>
     <td class="tdc" style="width:80px;"><select name="Period_<?php echo $i; ?>" id="Period_<?php echo $i; ?>" class="Input" style="width:100%;" onChange="ChangePeriod(<?php echo $i; ?>)"><option value="Annual">Annually</option><option value="1/2 Annual">Half Yearly</option><option value="Quarter">Quarterly</option><option value="Monthly">Monthly</option></select></td>
     <td class="tdc" style="width:60px;"><input type="hidden" name="TTarget_<?php echo $i; ?>" id="TTarget_<?php echo $i; ?>" value="0"/><input name="Target_<?php echo $i; ?>" id="Target_<?php echo $i; ?>" class="Input" style="width:100%;text-align:center;" maxlength="8" onChange="ChangeTarget(<?php echo $i; ?>)" value="<?php if($RD['DepartmentId']!=6) { echo '100'; } elseif($RD['DepartmentId']==6) { echo '0'; }?>" /></td>
    </tr>
   </table>
  </td>
 </tr>
 <?php $j=$i+1; } } for($i=$j; $i<=15; $i++) { ?> 
 <tr id="TR_<?php echo $i; ?>">
  <td class="tdc" style="width:2%;background-image:url(images/pmsback.png);" id="AppImg_<?php echo $i; ?>"><?php if($row2>0){echo '&nbsp;&nbsp;';}if($row2==0) { ?><img src="images/Addnew.png" <?php if($i>$j) { echo 'style="display:none;"';} ?> border="0" id="addImg_<?php echo $i; ?>" onClick="ShowRow(<?php echo $i; ?>)"/><?php } ?><img src="images/Minusnew.png" id="minusImg_<?php echo $i; ?>" <?php if($i>=$j){ echo 'style="display:none;"'; } ?> border="0" onClick="HideRow(<?php echo $i; ?>)"/></td>	 
  <td colspan="8" style="width:98%;">
   <table style="display:none;" id="Row_<?php echo $i; ?>" style="width:100%;" border="1" cellspacing="0">
    <tr bgcolor="#FFFFFF"> 
     <td class="tdc" style="width:32px;"><?php echo $i; ?><input type="hidden" id="KraIdNo_<?php echo $i; ?>"><input type="hidden" id="SubKraRow_<?php echo $i; ?>" value="0"></td>
     <td class="tdc" style="width:317px;"><textarea name="KRA_<?php echo $i; ?>" id="KRA_<?php echo $i; ?>" class="Inputar" rows="3" style="width:100%;" maxlength="348"></textarea></td>
     <td class="tdc" style="width:422px;"><textarea name="KRADes_<?php echo $i; ?>" id="KRADes_<?php echo $i; ?>" class="Inputar" rows="3" style="width:100%;" maxlength="580"></textarea></td>  
     <td class="tdc" style="width:85px;"><select name="Measure_<?php echo $i; ?>" id="Measure_<?php echo $i; ?>" class="Input" style="width:100%;"><option value="Acreage">Acreage</option><option value="Event">Event</option><option value="Program">Program</option><option value="Process">Process</option><option value="Maintenance">Maintenance</option><option value="Time">Time</option><option value="Yield">Yield</option><option value="Value">Value</option><option value="Volume">Volume</option><option value="Quantity">Quantity</option><option value="Quality">Quality</option><option value="Area">Area</option><option value="Amount">Amount</option><option value="None">None</option></select></td>
     <td class="tdc" style="width:85px;">
  <select name="Unit_<?php echo $i; ?>" id="Unit_<?php echo $i; ?>" class="Input" style="width:100%;">
  <option value="%">%</option><option value="Acres">Acres</option><option value="Days">Days</option><option value="Month">Month</option><option value="Hours">Hours</option><option value="Days/Hours">Days/Hours</option>
  <option value="Kg">Kg</option><option value="Ton">Ton</option><option value="MT">MT</option><option value="Kg/Acre">Kg/Acre</option><option value="Number">Number</option><option value="Lakhs">Lakhs</option><option value="Rs.">Rs.</option><option value="MT">MT</option><option value="INR">INR</option><option value="None">None</option></select></td>
     <td class="tdc" style="width:64px;"><input type="hidden" name="WWeightage_<?php echo $i; ?>" id="WWeightage_<?php echo $i; ?>" value="0"/><input name="Weightage_<?php echo $i; ?>" id="Weightage_<?php echo $i; ?>" class="Input" style="width:100%;text-align:center;" maxlength="8" onChange="ChangeWeight(<?php echo $i; ?>)" /></td>
     <td class="tdc" style="width:85px;"><select name="Logic_<?php echo $i; ?>" id="Logic_<?php echo $i; ?>" class="Input" style="width:100%;" onChange="ChangeLogic(<?php echo $i; ?>)"><option value="Logic1">Logic1</option><option value="Logic2">Logic2</option><option value="Logic3">Logic3</option><option value="Logic4">Logic4</option><option value="Logic5">Logic5</option><option value="Logic6">Logic6</option><option value="Logic7">Logic7</option><option value="Logic8">Logic8</option><option value="Logic8a">Logic8a</option><option value="Logic8b">Logic8b</option><option value="Logic8c">Logic8c</option><option value="Logic8d">Logic8d</option><option value="Logic8e">Logic8e</option><option value="Logic9">Logic9</option><option value="Logic10">Logic10</option><option value="Logic11">Logic11</option></select></td>
     <td class="tdc" style="width:84px;"><select name="Period_<?php echo $i; ?>" id="Period_<?php echo $i; ?>" class="Input" style="width:100%;" onChange="ChangePeriod(<?php echo $i; ?>)"><option value="Annual">Annually</option><option value="1/2 Annual">Half Yearly</option><option value="Quarter">Quarterly</option><option value="Monthly">Monthly</option></select></td>
  
     <td class="tdc" style="width:62px;"><input type="hidden" name="TTarget_<?php echo $i; ?>" id="TTarget_<?php echo $i; ?>" value="0"/><input name="Target_<?php echo $i; ?>" id="Target_<?php echo $i; ?>" class="Input" style="width:100%; text-align:center;" maxlength="8" onChange="ChangeTarget(<?php echo $i; ?>)" value="<?php if($RD['DepartmentId']!=6) { echo '100'; } elseif($RD['DepartmentId']==6){ echo '0'; }?>" /></td>
    </tr>
   </table>
  </td>
 </tr>
<?php } ?> 
 </table>
 </td>
</tr>
</form>   
	   					
<tr>
<?php /****************************************** Form-B Start **************************/ ?>
<?php /****************************************** Form-B Start **************************/ ?>	 
<form name="SkillFormB" method="post" onSubmit="return ValidationFormB(this)"> 
<td id="FormB" style="width:100%;">
<table border="1" cellspacing="0">
 <tr style="background-color:#FFFF53;"><td colspan="7" align="center" class="tdc" style="height:25px; font-size:14px;border-bottom:hidden;" valign="middle"><b>Form - B (Behavioral/Skills)</b></td></tr>
 <tr style="height:25px;background-color:#FFFF53;">   
  <td class="font" align="center" style="width:3%"><b>Sn</b></td>
  <td class="font" align="center" style="width:20%;"><b>Behavioral/Skills</b></td>
  <td class="font" align="center" style="width:49%;"><b>Description</b></td>
  <td class="font" align="center" style="width:7%;"><b>Weightage</b></td>
  <td class="font" align="center" style="width:7%;"><b>Logic</b></td>
  <td class="font" align="center" style="width:7%;"><b>Period</b></td>
  <td class="font" align="center" style="width:7%;"><b>Target</b></td>
 </tr>
 
<?php $sqlBY=mysql_query("select fbf.*,fb.Skill,fb.SkillComment,fb.Weightage,fb.Logic,fb.Period,fb.Target from hrm_employee_pms_behavioralformb fbf inner join hrm_pms_formb fb on fbf.FormBId=fb.FormBId where fbf.EmpId=".$_REQUEST['e']." AND fbf.YearId=".$_SESSION['KraYId']." order by fbf.BehavioralFormBId ASC", $con);	  
$SnoB=1; while($resBY=mysql_fetch_array($sqlBY)){ 

$sSubB22=mysql_query("select * from hrm_pms_formbsub where FormBId=".$resBY['FormBId']." AND BSubStatus='A' order by FormBSubId ASC",$con); $rowSubB=mysql_num_rows($sSubB22); 

?>
 <tr bgcolor="#FFFFFF">   
  <td class="font1" align="center" style="font-size:12px;"><?php echo $SnoB; ?></td>	  
  <td class="font1" valign="top" style="font-size:12px;"><?php echo ucwords(strtolower($resBY['Skill'])); ?></td>
  <td class="font1" valign="top" style="font-size:12px;"><?php echo $resBY['SkillComment']; ?></td>
  <td class="font1" align="center" style="font-size:12px;"><?php echo $resBY['Weightage']; ?></td>
  <td class="font1" align="center" style="font-size:12px;"><?php echo $resBY['Logic']; ?></td>
  <td class="font1" align="center" style="font-size:12px;"><?php echo $resBY['Period']; ?></td>
  <td class="font1" align="center" style="font-size:12px;"><span <?php if($resBY['Period']!='Annual' AND $resBY['Period']!=''){ echo 'style="cursor:pointer;text-decoration:underline;color:#000099;"';} if($resBY['Period']!='Annual' AND $resBY['Period']!=''){ ?> onClick="FunFormBTgt(<?php echo $_REQUEST['e'].','.$_SESSION['KraYId'].','.$resBY['FormBId']; ?>,'<?php echo $resBY['Period']; ?>',<?php echo $resBY['Target'].','.intval($resBY['Weightage']); ?>,'<?php echo $resBY['Logic']; ?>')" <?php } ?>  ><?php echo $resBY['Target']; ?></span>
  
  </td>
 </tr> 
 
 <?php  
if($rowSubB>0)
{
  while($rSubB22=mysql_fetch_assoc($sSubB22))
  {
  $sqlChk=mysql_query("select * from hrm_employee_pms_behavioralformb_sub where FormBSubId=".$rSubB22['FormBSubId']." AND EmpId=".$EmployeeId." AND YearId=".$_SESSION['KraYId'],$con); $rowChk=mysql_num_rows($sqlChk);
if($rowChk==0){$sins=mysql_query("insert into hrm_employee_pms_behavioralformb_sub(FormBSubId, EmpId, YearId) values(".$rSubB22['FormBSubId'].", ".$EmployeeId.", ".$_SESSION['KraYId'].")",$con);}
  }
?>   
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
  
 <tr>
  <td colspan="9" align="right" style="border:hidden;border-style:none;">
  <div id="Div<?php echo $SNo; ?>" style="display:<?php if($rowSubB>0){echo 'block';}else{echo 'none';} ?>;">
     <table style="width:97%;background-color:#71FF71;" border="0" cellpadding="0" cellspacing="1"> 
     <tr style="background-color:#71FF71;">   
      <td align="center" class="Input2a" style="width:30px;">SNo</td>
      <td align="center" class="Input2a" style="width:280px;">Sub Skill</td>
      <td align="center" class="Input2a" style="width:390px;">Sub Skill Description</td>  
      <td align="center" class="Input2a" style="width:60px;">Weightage</td>
	  <td align="center" class="Input2a" style="width:70px;">Logic</td>
	  <td align="center" class="Input2a" style="width:80px;">Period</td>
      <td align="center" class="Input2a" style="width:60px;">Target</td>
     </tr>

<?php if($rowSubK==0){$num=5;}elseif($rowSubK==1){$num=4;}elseif($rowSubK==2){$num=3;}elseif($rowSubK==3){$num=2;}elseif($rowSubK==4){$num=1;}elseif($rowSubK==5){$num=0;} ?>

<?php 
$sSubB=mysql_query("select bb.*,s.PBSubId from hrm_employee_pms_behavioralformb_sub s inner join hrm_pms_formbsub bb on s.FormBSubId=bb.FormBSubId where s.EmpId=".$EmployeeId." AND s.YearId=".$_SESSION['KraYId'],$con); /* While Open*/ $m=1; while($rSubB=mysql_fetch_assoc($sSubB)){ 

?>

  <input type="hidden" id="FormBId_<?php echo $SNo; ?>" value="<?php echo $resPer['FormBId']; ?>" />
  <input type="hidden" id="SubFormBId_<?php echo $SNo.'_'.$m; ?>" value="<?php echo $rSubB['FormBSubId']; ?>" />
  <tr style="background-color:#FFFFFF;">  
  <td align="center"><input class="Inputa" style="text-align:center;font-weight:bold;" value="<?php if($m==1){$n='a';}elseif($m==2){$n='b';}elseif($m==3){$n='c';}elseif($m==4){$n='d';}elseif($m==5){$n='e';}echo $n; ?>" readonly/><input type="hidden" id="FormBIdNo_a<?php echo $SNo.'_'.$m; ?>"></td>
  <td align="center"><input id="Skill_a<?php echo $SNo.'_'.$m; ?>" class="Inputa" value="<?php echo $rSubB['Skill']; ?>" readonly/></td>
  <td align="center"><input id="SkillDes_a<?php echo $SNo.'_'.$m; ?>" class="Inputa" value="<?php echo $rSubB['SkillComment']; ?>" readonly/></td>  
  
  <td align="center"><input type="hidden" id="WWei_a<?php echo $SNo.'_'.$m; ?>" value="<?php echo $rSubB['Weightage']; ?>"/>
  <input id="Wei_a<?php echo $SNo.'_'.$m; ?>" class="Inputa" value="<?php echo $rSubB['Weightage']; ?>" style="text-align:center;" maxlength="8" onChange="ChangeWeighta(<?php echo $SNo.', '.$m; ?>)" readonly/></td>
  
  <td align="center" style="background-color:#CAE4FF;"><input id="Log_a<?php echo $SNo.'_'.$m; ?>" class="Inputa" style="height:20px;text-align:center;" value="<?php echo $rSubB['Logic']; ?>" readonly/></td>
  <td align="center" style="background-color:#CAE4FF;"><input id="Per_a<?php echo $SNo.'_'.$m; ?>" class="Inputa" style="height:20px;text-align:center;" value="<?php echo $rSubB['Period']; ?>" readonly/></td>
  
  <td align="center"><input type="hidden" id="TTar_a<?php echo $SNo.'_'.$m; ?>" value="0"/>
  <input id="Tar_a<?php echo $k.'_'.$m; ?>" class="Inputa" value="<?php echo $rSubB['Target']; ?>" style="cursor:<?php if($rSubB['Period']!='Annual' AND $rSubB['Period']!=''){echo 'pointer';} ?>;width:100%; text-align:center;text-decoration:<?php if($rSubB['Period']!='Annual' AND $rSubB['Period']!=''){ echo 'underline'; }?>;color:<?php if($rSubB['Period']!='Annual' AND $rSubB['Period']!=''){ echo '#000099'; }?>;" maxlength="8" <?php if($rSubB['Period']!='Annual' AND $rSubB['Period']!=''){ ?> onClick="FunFormBSubTgt(<?php echo $_REQUEST['e'].','.$_SESSION['KraYId'].','.$rSubB['FormBSubId']; ?>,'<?php echo $rSubB['Period']; ?>',<?php echo $rSubB['Target'].','.intval($rSubB['Weightage']); ?>,'<?php echo $rSubB['Logic']; ?>')" <?php } ?> readonly/>
  
  </td>
  
</tr> 
<?php $m++;} ?>	
<?php /* While Close*/ ?>	

     </table>
  </div> 
  </td>
 </tr>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?> 
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?> 
<?php } ?> 
 
 
 
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
<?php //************************* Close ******************************* ?>					
				  </table>
				 </td>
			  </tr>
			   </form>
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



