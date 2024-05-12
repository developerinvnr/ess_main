<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
$SD=mysql_query("select DepartmentId,GradeId from hrm_employee_general where EmployeeID=".$_REQUEST['e'], $con); 
$RD=mysql_fetch_assoc($SD);

$sqlSY=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='KRA'", $con); 
$sqlSYP=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'", $con);
$SNo=1; $resSY=mysql_fetch_array($sqlSY); $resSYP=mysql_fetch_array($sqlSYP);

$oldy=$_REQUEST['YeId']-1; $newy=$_REQUEST['YeId']+1;

$sqlOld=mysql_query("select * from hrm_year where YearId=".$oldy, $con); $resOld=mysql_fetch_assoc($sqlOld); 
$sqlCurr=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YeId'], $con); $resCurr=mysql_fetch_assoc($sqlCurr);
$sqlNew=mysql_query("select * from hrm_year where YearId=".$newy, $con); $resNew=mysql_fetch_assoc($sqlNew);	
$FromOld=date("Y", strtotime($resOld['FromDate'])); $ToOld=date("Y", strtotime($resOld['ToDate'])); 
$FromCurr=date("Y", strtotime($resCurr['FromDate'])); $ToCurr=date("Y", strtotime($resCurr['ToDate']));
$FromNew=date("Y", strtotime($resNew['FromDate'])); $ToNew=date("Y", strtotime($resNew['ToDate']));

//$Y=$YearId+1; 
if(isset($_POST['SubmitKRA']))
{
 if($_POST['ActnYId']!='' AND $_POST['ActnYId']>=7)
 {
$search =  '!"#$\'_' ;
$search = str_split($search);
 $TotalWeight=$_POST['WWeightage_1']+$_POST['WWeightage_2']+$_POST['WWeightage_3']+$_POST['WWeightage_4']+$_POST['WWeightage_5']+$_POST['WWeightage_6']+$_POST['WWeightage_7']+$_POST['WWeightage_8']+$_POST['WWeightage_9']+$_POST['WWeightage_10']+$_POST['WWeightage_11']+$_POST['WWeightage_12']+$_POST['WWeightage_13']+$_POST['WWeightage_14']+$_POST['WWeightage_15'];
 
   for($i=1; $i<=$_POST['EditTNRow']; $i++)
    { if($_POST['KRA_'.$i]!='')
	  { $str_KRA = $_POST['KRA_'.$i]; $str_KRADes = $_POST['KRADes_'.$i]; $KRA=str_replace($search, "", $str_KRA); $KRADes=str_replace($search, "", $str_KRADes);
	    $sqlSaveK=mysql_query("update hrm_pms_kra set KRA='".addslashes($KRA)."', KRA_Description='".addslashes($KRADes)."', Measure='".$_POST['Measure_'.$i]."', Unit='".$_POST['Unit_'.$i]."', Weightage=".$_POST['Weightage_'.$i].", Logic='".$_POST['Logic_'.$i]."', Period='".$_POST['Period_'.$i]."', Target=".$_POST['Target_'.$i].", UseKRA='H', EmpStatus='A', AppStatus='A', RevStatus='A', HODStatus='A', CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where KRAId=".$_POST['KId_'.$i], $con); 
	  }
      if($_POST['KRA_'.$i]==''){$sqlSaveK=mysql_query("delete from hrm_pms_kra where KRAId=".$_POST['KId_'.$i], $con); }
    }
    $j=$_POST['EditTNRow']+1;
    for($k=$j; $k<=15; $k++)
    { if($_POST['KRA_'.$k]!='')
	  { $str_KRA2 = $_POST['KRA_'.$k]; $str_KRADes2 = $_POST['KRADes_'.$k]; $KRA2=str_replace($search, "", $str_KRA2); $KRADes2=str_replace($search, "", $str_KRADes2);
	    $sqlSaveK=mysql_query("insert into hrm_pms_kra(YearId, EmployeeID, DepartmentId, KRA, KRA_Description, Measure, Unit, Weightage, Logic, Period, Target, CompanyId, KRAStatus, UseKRA, EmpStatus, AppStatus, RevStatus, HODStatus, CreatedBy, CreatedDate)value(".$_POST['ActnYId'].", ".$_REQUEST['e'].", ".$RD['DepartmentId'].", '".addslashes($KRA2)."', '".addslashes($KRADes2)."', '".$_POST['Measure_'.$k]."', '".$_POST['Unit_'.$k]."', ".$_POST['Weightage_'.$k].", '".$_POST['Logic_'.$k]."', '".$_POST['Period_'.$k]."', ".$_POST['Target_'.$k].", ".$CompanyId.", 'A', 'A', 'A', 'A', 'P', 'P', ".$UserId.", '".date("Y-m-d")."')", $con);
	  }
    }
	
	if($sqlSaveK)
	  {
	  
	   if($TotalWeight==100)
       {
		if($sqlU){$msg='KRA Submitted Successfully..!';}
	   }
	   elseif($TotalWeight!=100){echo '<script>alert("Error....Please Check!, Total value of weightage not equal to 100 !");</script>';}
	   
	  } 
	  
  }	 //if($_POST['ActnYId']!='' AND $_POST['ActnYId']>=7)  	  
}


if($_REQUEST['actsubkra']=='OkSubKraEdit' && $_REQUEST['MWei']!='' && $_REQUEST['KId']!='')
{ 
 if($_REQUEST['ActnYId']!='' AND $_REQUEST['ActnYId']>=7)
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
   if($_REQUEST['Kra'.$i]!=''){ $sU=mysql_query("insert into hrm_pms_krasub(KRAId, EmployeeID, KRA, KRA_Description, Measure, Unit, Weightage, Logic, Period, Target, KSubStatus, CrUpDate)value(".$_REQUEST['KId'].", ".$_REQUEST['e'].", '".addslashes($_REQUEST['Kra'.$i])."', '".addslashes($_REQUEST['KraD'.$i])."', '".$_REQUEST['Mea'.$i]."', '".$_REQUEST['Uni'.$i]."', ".$_REQUEST['Wei'.$i].", '".$_REQUEST['Log'.$i]."', '".$_REQUEST['Per'.$i]."', ".$_REQUEST['Tar'.$i].", 'A', '".date("Y-m-d")."')", $con); }
  }

 }
 
  if($sU)
  { 
   if($TotalWei==$_REQUEST['MWei']){echo '<script>alert("Sub-KRAs have been saved successfully."); window.location="EditEmpKRA.php?e='.$_REQUEST['e'].'&DI='.$_REQUEST['DI'].'&YeId='.$_REQUEST['YeId'].'"; </script>';}
   else{ $sU=mysql_query("update hrm_pms_krasub set Weightage=0 where KRAId=".$_REQUEST['KId'], $con);
   echo '<script>alert("Error..Please Check!, Sub-KRAs weightage is not equal to main KRA weightage !");  window.location="EditEmpKRA.php?e='.$_REQUEST['e'].'&DI='.$_REQUEST['DI'].'&YeId='.$_REQUEST['YeId'].'"; </script>';}
  } 
  
 }	 //if($_POST['ActnYId']!='' AND $_POST['ActnYId']>=7) 	  
} 



/*****************************************************************/
/*****************************************************************/
if($_REQUEST['actReAllCpy']!='' && $_REQUEST['actReAllCpy']=='OkDone' && $_REQUEST['ei']>0 && $_REQUEST['yi']>0 && $_REQUEST['gi']>0 && $_REQUEST['di']>0)
{
  $sqle=mysql_query("select e.EmployeeID from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmpStatus='A' AND g.DepartmentId=".$_REQUEST['di']." AND g.GradeId=".$_REQUEST['gi']." AND e.EmployeeID!=".$_REQUEST['ei']." order by e.EmployeeID ASC");
  while($rese=mysql_fetch_assoc($sqle))
  { 
    $sql=mysql_query("select * from hrm_pms_kra where YearId=".$_REQUEST['yi']." AND CompanyId=".$CompanyId." AND EmployeeID=".$_REQUEST['ei']." order by KRAId ASC", $con); $row=mysql_num_rows($sql); 
	if($row>0)
	{
	 
	 while($res=mysql_fetch_assoc($sql)) 
	 {
	   
	   $chkKra=mysql_query("select * from hrm_pms_kra where YearId=".$_REQUEST['yi']." AND EmployeeID=".$rese['EmployeeID']." AND DepartmentId=".$_REQUEST['di']." AND KRA='".$res['KRA']."'",$con); $rowKra=mysql_num_rows($chkKra);
	   if($rowKra==0)
	   { 
	    $sqlSaveK=mysql_query("insert into hrm_pms_kra(YearId, EmployeeID, DepartmentId, KRA, KRA_Description, Measure, Unit, Weightage, Logic, Period, Target, CompanyId, KRAStatus, UseKRA, EmpStatus, AppStatus, RevStatus, HODStatus, CreatedBy, CreatedDate)value(".$_REQUEST['yi'].", ".$rese['EmployeeID'].", ".$_REQUEST['di'].", '".addslashes($res['KRA'])."', '".addslashes($res['KRA_Description'])."', '".$res['Measure']."', '".$res['Unit']."', ".$res['Weightage'].", '".$res['Logic']."', '".$res['Period']."', ".$res['Target'].", ".$CompanyId.", 'A', 'A', 'A', 'A', 'P', 'P', ".$UserId.", '".date("Y-m-d")."')", $con);
		
		
		
		/*****************************************/
		/*****************************************/
		if($sqlSaveK)
        {
		  $Kid=mysql_insert_id();	  
		  $sSubK=mysql_query("select * from hrm_pms_krasub where KRAId=".$res['KRAId']." AND EmployeeID=".$_REQUEST['ei']." AND KSubStatus='A' order by KRASubId ASC",$con); $rowSubK=mysql_num_rows($sSubK);
	      if($rowSubK>0)
	      {
	       while($rSubK=mysql_fetch_assoc($sSubK))
		   {  
		     $chkKraSub=mysql_query("select * from hrm_pms_krasub where EmployeeID=".$rese['EmployeeID']." AND KRAId=".$Kid." AND KRA='".$rSubK['KRA']."'",$con); $rowKraSub=mysql_num_rows($chkKraSub);
			 //echo $rowKraSub.'<'.$rowSubK.'<br>';
			 if($rowKraSub<$rowSubK)
			 { 
		      $sU=mysql_query("insert into hrm_pms_krasub(KRAId, EmployeeID, KRA, KRA_Description, Measure, Unit, Weightage, Logic, Period, Target, KSubStatus, CrUpDate)value(".$Kid.", ".$rese['EmployeeID'].", '".addslashes($rSubK['KRA'])."', '".addslashes($rSubK['KRA_Description'.$i])."', '".$rSubK['Measure']."', '".$rSubK['Unit']."', ".$rSubK['Weightage'].", '".$rSubK['Logic']."', '".$rSubK['Period']."', ".$rSubK['Target'].", 'A', '".date("Y-m-d")."')", $con);
		     }
		   } //while($rSubK=mysql_fetch_assoc($sSubK))
		  }
        }
		/*****************************************/
		/*****************************************/
	   
	   
	   
	   
	   
	   } //if($rowKra==0)
	  
	 } //while($res=mysql_fetch_assoc($sql))
	 
	} //if($row>0)
  }  
}
/*****************************************************************/
/*****************************************************************/

?>

<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:18px;} .All_80{font-size:11px; height:18px; width:80px;}
 .All_50{font-size:11px; height:18px; width:50px;} .All_100{font-size:11px; height:18px; width:100px;} 
.All_120{font-size:11px; height:18px; width:120px;} .All_150{font-size:11px; height:18px; width:150px;}.All_200{font-size:11px; height:18px; width:200px;} 
.All_350{font-size:11px; height:18px; width:350px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.Input2{font-family:Times New Roman; height:22px;border-style:hidden; border-bottom-color:#EEF0AA; border-left-color:#EEF0AA; border-right-color:#EEF0AA; border-top-color:#EEF0AA; border:0;background-color:#EEF0AA; font-weight:bold;}.Input{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;background-color:#FFFFFF;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}.font {color:#000; font-family:Georgia; font-size:15px; font-weight:bold;}  .font {color:#000; font-family:Times New Roman; font-size:12px;}
.Input2a{font-family:Times New Roman; height:22px;background-color:#D5AAAA;font-weight:bold; font-size:12px;text-align:center;}.Inputa{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;background-color:#CAE4FF;}

</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/EmpMasterAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);
function edit(value)
{ window.open("EditEmpKRA.php?id="+value, '_blank'); window.focus(); }				

function  SelectDeptEmp(v)
{var x = "EditKRA.php?DpId="+v;  window.location=x;}				


for(var j=6; j<15; j++) 
{ function ShowRow(j) 
  {
  var u = j+1;  var u1 = j-1; //var a = j+2; c=a-1; alert("a="+a+"j="+c);
  if(j<=14) {document.getElementById('minusImg_'+j).style.display = 'block'; document.getElementById('addImg_'+j).style.display = 'none'; document.getElementById('Row_'+j).style.display = 'block'; document.getElementById('addImg_'+u).style.display = 'block';  document.getElementById('minusImg_'+u1).style.display = 'none';} 
  else { document.getElementById('minusImg_'+j).style.display = 'block'; document.getElementById('addImg_'+j).style.display = 'none'; document.getElementById('Row_'+j).style.display = 'block';  document.getElementById('minusImg_'+u1).style.display = 'none';  } 
  }

  function HideRow(j)
  { 
  var u = j+1;  var u1 = j-1; 
  if(j<=14)
  {document.getElementById('minusImg_'+j).style.display = 'none'; document.getElementById('addImg_'+j).style.display = 'block'; document.getElementById('Row_'+j).style.display = 'none'; document.getElementById('addImg_'+u).style.display = 'none';
   document.getElementById('minusImg_'+u1).style.display = 'block'; }
   else { document.getElementById('minusImg_'+j).style.display = 'none'; document.getElementById('addImg_'+j).style.display = 'block'; document.getElementById('Row_'+j).style.display = 'none';  document.getElementById('minusImg_'+u1).style.display = 'block'; }  
  } 
}	

function OpenOldKra()
{document.getElementById("OldKRaID").style.display='block';}
function CloseOldKra()
{document.getElementById("OldKRaID").style.display='none';}


function ClickCheckKRA(v)
{ var K=document.getElementById("KRAGoal"+v).value; var KD=document.getElementById("Des"+v).value; 
  var M=document.getElementById("Mea"+v).value; var U=document.getElementById("Uni"+v).value; 
  var W=document.getElementById("Wei"+v).value; var T=document.getElementById("Tar"+v).value; 

 if(document.getElementById("NoId_"+v).checked==true)
 { 
   for(var i=1; i<=15; i++)
   {  
    if(document.getElementById("KRA_"+i).value=='')
	{ document.getElementById("KRA_"+i).value=K; document.getElementById("KRADes_"+i).value=KD; 
	  document.getElementById("Measure_"+i).value=M; document.getElementById("Unit_"+i).value=U; 
	  document.getElementById("Weightage_"+i).value=W; document.getElementById("Target_"+i).value=T;
	  document.getElementById("KRA_"+i).readOnly=true; document.getElementById("KRADes_"+i).readOnly=true; 
	  document.getElementById("Measure_"+i).readOnly=true; document.getElementById("Unit_"+i).readOnly=true; 
	  document.getElementById("Weightage_"+i).readOnly=false; document.getElementById("Target_"+i).readOnly=false;
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
	{ document.getElementById("KRA_"+i).value=''; document.getElementById("KRADes_"+i).value=''; 
	  document.getElementById("Measure_"+i).value=''; document.getElementById("Unit_"+i).value=''; 
	  document.getElementById("Weightage_"+i).value=''; document.getElementById("Target_"+i).value='';
	  document.getElementById("KRA_"+i).readOnly=false; document.getElementById("KRADes_"+i).readOnly=false; 
	  document.getElementById("Measure_"+i).readOnly=false; document.getElementById("Unit_"+i).readOnly=false; 
	  document.getElementById("Weightage_"+i).readOnly=false; document.getElementById("Target_"+i).readOnly=false;
	  document.getElementById("KraIdNo_"+i).value=''; document.getElementById("TR_"+v).style.backgroundColor='#FFFFFF'; 
	  document.getElementById("WWeightage_"+i).value=0; brack; 
	 }
   }
 }
}

function ValidationAchive(KRAForm)
{ 
  var KRA_1=document.getElementById("KRA_1").value; var KRA_2=document.getElementById("KRA_2").value; var KRA_3=document.getElementById("KRA_3").value; var KRA_4=document.getElementById("KRA_4").value; var KRA_5=document.getElementById("KRA_5").value; var KRA_6=document.getElementById("KRA_6").value; var KRA_7=document.getElementById("KRA_7").value; var KRA_8=document.getElementById("KRA_8").value; var KRA_9=document.getElementById("KRA_9").value; var KRA_10=document.getElementById("KRA_10").value; var KRA_11=document.getElementById("KRA_11").value; var KRA_12=document.getElementById("KRA_12").value;
  var KRA_13=document.getElementById("KRA_13").value; var KRA_14=document.getElementById("KRA_14").value; var KRA_15=document.getElementById("KRA_15").value; 
  
  var Measure_1=document.getElementById("Measure_1").value; var Measure_2=document.getElementById("Measure_2").value; var Measure_3=document.getElementById("Measure_3").value; var Measure_4=document.getElementById("Measure_4").value; var Measure_5=document.getElementById("Measure_5").value; var Measure_6=document.getElementById("Measure_6").value; var Measure_7=document.getElementById("Measure_7").value; var Measure_8=document.getElementById("Measure_8").value; var Measure_9=document.getElementById("Measure_9").value;  var Measure_10=document.getElementById("Measure_10").value; var Measure_11=document.getElementById("Measure_11").value; var Measure_12=document.getElementById("Measure_12").value; var Measure_13=document.getElementById("Measure_13").value; var Measure_14=document.getElementById("Measure_14").value; var Measure_15=document.getElementById("Measure_15").value;
  
  var Unit_1=document.getElementById("Unit_1").value; var Unit_2=document.getElementById("Unit_2").value; var Unit_3=document.getElementById("Unit_3").value; var Unit_4=document.getElementById("Unit_4").value; var Unit_5=document.getElementById("Unit_5").value; var Unit_6=document.getElementById("Unit_6").value; var Unit_7=document.getElementById("Unit_7").value; var Unit_8=document.getElementById("Unit_8").value; var Unit_9=document.getElementById("Unit_9").value; var Unit_10=document.getElementById("Unit_10").value; var Unit_11=document.getElementById("Unit_11").value; var Unit_12=document.getElementById("Unit_12").value; var Unit_13=document.getElementById("Unit_13").value; var Unit_14=document.getElementById("Unit_14").value; var Unit_15=document.getElementById("Unit_15").value;
  
  var Weightage_1=document.getElementById("Weightage_1").value; var Weightage_2=document.getElementById("Weightage_2").value;  var Weightage_3=document.getElementById("Weightage_3").value; var Weightage_4=document.getElementById("Weightage_4").value;  var Weightage_5=document.getElementById("Weightage_5").value; var Weightage_6=document.getElementById("Weightage_6").value;
  var Weightage_7=document.getElementById("Weightage_7").value; var Weightage_8=document.getElementById("Weightage_8").value;
  var Weightage_9=document.getElementById("Weightage_9").value; var Weightage_10=document.getElementById("Weightage_10").value; var Weightage_11=document.getElementById("Weightage_11").value; var Weightage_12=document.getElementById("Weightage_12").value; var Weightage_13=document.getElementById("Weightage_13").value; var Weightage_14=document.getElementById("Weightage_14").value; var Weightage_15=document.getElementById("Weightage_15").value; 
  
  var WWeightage_1=parseFloat(document.getElementById("WWeightage_1").value); var WWeightage_2=parseFloat(document.getElementById("WWeightage_2").value); var WWeightage_3=parseFloat(document.getElementById("WWeightage_3").value); var WWeightage_4=parseFloat(document.getElementById("WWeightage_4").value);  var WWeightage_5=parseFloat(document.getElementById("WWeightage_5").value); var WWeightage_6=parseFloat(document.getElementById("WWeightage_6").value); var WWeightage_7=parseFloat(document.getElementById("WWeightage_7").value); var WWeightage_8=parseFloat(document.getElementById("WWeightage_8").value); var WWeightage_9=parseFloat(document.getElementById("WWeightage_9").value); var WWeightage_10=parseFloat(document.getElementById("WWeightage_10").value); var WWeightage_11=parseFloat(document.getElementById("WWeightage_11").value); var WWeightage_12=parseFloat(document.getElementById("WWeightage_12").value); var WWeightage_13=parseFloat(document.getElementById("WWeightage_13").value); var WWeightage_14=parseFloat(document.getElementById("WWeightage_14").value); 
  var WWeightage_15=parseFloat(document.getElementById("WWeightage_15").value);
  
  var Target_1=document.getElementById("Target_1").value; var Target_2=document.getElementById("Target_2").value; var Target_3=document.getElementById("Target_3").value; var Target_4=document.getElementById("Target_4").value; var Target_5=document.getElementById("Target_5").value; var Target_6=document.getElementById("Target_6").value; var Target_7=document.getElementById("Target_7").value; var Target_8=document.getElementById("Target_8").value;  var Target_9=document.getElementById("Target_9").value; var Target_10=document.getElementById("Target_10").value; var Target_11=document.getElementById("Target_11").value; var Target_12=document.getElementById("Target_12").value; var Target_13=document.getElementById("Target_13").value; var Target_14=document.getElementById("Target_14").value; var Target_15=document.getElementById("Target_15").value;

  var TTarget_1=parseFloat(document.getElementById("TTarget_1").value); var TTarget_2=parseFloat(document.getElementById("TTarget_2").value); var TTarget_3=parseFloat(document.getElementById("TTarget_3").value); var TTarget_4=parseFloat(document.getElementById("TTarget_4").value); var TTarget_5=parseFloat(document.getElementById("TTarget_5").value); var TTarget_6=parseFloat(document.getElementById("TTarget_6").value); var TTarget_7=parseFloat(document.getElementById("TTarget_7").value); var TTarget_8=parseFloat(document.getElementById("TTarget_8").value); var TTarget_9=parseFloat(document.getElementById("TTarget_9").value); var TTarget_10=parseFloat(document.getElementById("TTarget_10").value); var TTarget_11=parseFloat(document.getElementById("TTarget_11").value); var TTarget_12=parseFloat(document.getElementById("TTarget_12").value);
  var TTarget_13=parseFloat(document.getElementById("TTarget_13").value); var TTarget_14=parseFloat(document.getElementById("TTarget_14").value); var TTarget_15=parseFloat(document.getElementById("TTarget_15").value);
   
   if(KRA_1!=''){ if(Weightage_1.length === 0) {alert("please type weightage in row 1.");  return false;}
   if(Measure_1=='None') {alert("please select measure type in row 1.");  return false;}
   if(Target_1.length === 0) {alert("please type target in row 1.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_1); var test_numT = Numfilter.test(Target_1);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 1'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 1'); return false; } }

   if(KRA_2!='') {if(Weightage_2.length === 0) {alert("please type weightage in row 2.");  return false;}
   if(Measure_2=='None') {alert("please select measure type in row 2.");  return false;}
   if(Target_2.length === 0) {alert("please type target in row 2.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_2); var test_numT = Numfilter.test(Target_2);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 2'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 2'); return false; } }
   
   if(KRA_3!='') {if(Weightage_3.length === 0) {alert("please type weightage in row 3.");  return false;}
   if(Measure_3=='None') {alert("please select measure type in row 3.");  return false;}
   if(Target_3.length === 0) {alert("please type target in row 3.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_3); var test_numT = Numfilter.test(Target_3);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 3'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 3'); return false; } }

   if(KRA_4!='') {if(Weightage_4.length === 0) {alert("please type weightage in row 4.");  return false;}
   if(Measure_4=='None') {alert("please select measure type in row 4.");  return false;}
   if(Target_4.length === 0) {alert("please type target in row 4.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_4); var test_numT = Numfilter.test(Target_4);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 4'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 4'); return false; } }

   if(KRA_5!='') {if(Weightage_5.length === 0) {alert("please type weightage in row 5.");  return false;}
   if(Measure_5=='None') {alert("please select measure type in row 5.");  return false;}
   if(Target_5.length === 0) {alert("please type target in row 5.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_5); var test_numT = Numfilter.test(Target_5);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 5'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 5'); return false; } }

   if(KRA_6!='') {if(Weightage_6.length === 0) {alert("please type weightage in row 6.");  return false;}
   if(Measure_6=='None') {alert("please select measure type in row 6.");  return false;}
   if(Target_6.length === 0) {alert("please type target in row 6.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_6); var test_numT = Numfilter.test(Target_6);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 6'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 6'); return false; } }

   if(KRA_7!='') {if(Weightage_7.length === 0) {alert("please type weightage in row 7.");  return false;}
   if(Measure_7=='None') {alert("please select measure type in row 7.");  return false;}
   if(Target_7.length === 0) {alert("please type target in row 7.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_7); var test_numT = Numfilter.test(Target_7);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 7'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 7'); return false; } }

   if(KRA_8!='') {if(Weightage_8.length === 0) {alert("please type weightage in row 8.");  return false;}
   if(Measure_8=='None') {alert("please select measure type in row 8.");  return false;}
   if(Target_8.length === 0) {alert("please type target in row 8.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_8); var test_numT = Numfilter.test(Target_8);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 8'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 8'); return false; } }

   if(KRA_9!='') {if(Weightage_9.length === 0) {alert("please type weightage in row 9.");  return false;}
   if(Measure_9=='None') {alert("please select measure type in row 9.");  return false;}
   if(Target_9.length === 0) {alert("please type target in row 9.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_9); var test_numT = Numfilter.test(Target_9);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 9'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 9'); return false; } }

   if(KRA_10!='') {if(Weightage_10.length === 0) {alert("please type weightage in row 10.");  return false;}
   if(Measure_10=='None') {alert("please select measure type in row 10.");  return false;}
   if(Target_10.length === 0) {alert("please type target in row 10.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_10); var test_numT = Numfilter.test(Target_10);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 10'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 10'); return false; } }

   if(KRA_11!='') {if(Weightage_11.length === 0) {alert("please type weightage in row 11.");  return false;}
   if(Measure_11=='None') {alert("please select measure type in row 11.");  return false;}
   if(Target_11.length === 0) {alert("please type target in row 11.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_11); var test_numT = Numfilter.test(Target_11);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 11'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 11'); return false; } }

   if(KRA_12!='') {if(Weightage_12.length === 0) {alert("please type weightage in row 12.");  return false;}
   if(Measure_12=='None') {alert("please select measure type in row 12.");  return false;}
   if(Target_12.length === 0) {alert("please type target in row 12.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_12); var test_numT = Numfilter.test(Target_12);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 12'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 12'); return false; } }

   if(KRA_13!='') {if(Weightage_13.length === 0) {alert("please type weightage in row 13.");  return false;}
   if(Measure_13=='None') {alert("please select measure type in row 13.");  return false;}
   if(Target_13.length === 0) {alert("please type target in row 13.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_13); var test_numT = Numfilter.test(Target_13);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 13'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 13'); return false; } }

   if(KRA_14!='') {if(Weightage_14.length === 0) {alert("please type weightage in row 14.");  return false;}
   if(Measure_14=='None') {alert("please select measure type in row 14.");  return false;}
   if(Target_14.length === 0) {alert("please type target in row 14.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_14); var test_numT = Numfilter.test(Target_14);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 14'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 14'); return false; } }

   if(KRA_15!='') {if(Weightage_15.length === 0) {alert("please type weightage in row 15.");  return false;}
   if(Measure_15=='None') {alert("please select measure type in row 15.");  return false;}
   if(Target_15.length === 0) {alert("please type target in row 15.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Weightage_15); var test_numT = Numfilter.test(Target_15);
   if(test_numW==false) { alert('Please Enter Only Numeric in the Weightage in row 15'); return false; }
   if(test_numT==false) { alert('Please Enter Only Numeric in the Target in row 15'); return false; } }   

}


function ChangeWeight(v)
{ var Weightage=document.getElementById("Weightage_"+v).value; 
  if(Weightage==''){document.getElementById("WWeightage_"+v).value=0;} else {document.getElementById("WWeightage_"+v).value=Weightage; } }


function EditKRAvalue()
{ var n=document.getElementById("EditTNRow").value; 
  for(var r=1; r<=n; r++){document.getElementById("KRA_"+r).readOnly=false; document.getElementById("KRADes_"+r).readOnly=false; 
  document.getElementById("Measure_"+r).readOnly=false; document.getElementById("Unit_"+r).readOnly=false; document.getElementById("Weightage_"+r).readOnly=false;
  document.getElementById("Target_"+r).readOnly=false;}
  document.getElementById("SubmitKRA").style.display='block'; document.getElementById("EditK").style.display='none';
}

/**** Sub KRA open Sub KRA open **************************************/
function FunSubO(k){ document.getElementById("Div"+k).style.display='block'; document.getElementById("SpanO"+k).style.display='block'; document.getElementById("SpanC"+k).style.display='none'; } 
function FunSubC(k){ document.getElementById("Div"+k).style.display='none'; document.getElementById("SpanO"+k).style.display='none'; document.getElementById("SpanC"+k).style.display='block'; } 

function ChangeWeighta(k,m)
{ var Weightage=document.getElementById("Wei_a"+k+"_"+m).value; 
  if(Weightage==''){document.getElementById("WWei_a"+k+"_"+m).value=0;} 
  else {document.getElementById("WWei_a"+k+"_"+m).value=Weightage; } }
function ChangeTargeta(k,m)
{ var Target=document.getElementById("Tar_a"+k+"_"+m).value; 
  if(Target==''){document.getElementById("TTar_a"+k+"_"+m).value=0;} 
  else {document.getElementById("TTar_a"+k+"_"+m).value=Target; } }  


function SaveKraA(k,m)
{
  var Kra_1=document.getElementById("Kra_a"+k+"_1").value.replace(/[`~!@#$^&*|\??'"<>\{\}\[\]\\\/]/gi, ''); 
  var Kra_2=document.getElementById("Kra_a"+k+"_2").value.replace(/[`~!@#$^&*|\??'"<>\{\}\[\]\\\/]/gi, ''); 
  var Kra_3=document.getElementById("Kra_a"+k+"_3").value.replace(/[`~!@#$^&*|\??'"<>\{\}\[\]\\\/]/gi, ''); 
  var Kra_4=document.getElementById("Kra_a"+k+"_4").value.replace(/[`~!@#$^&*|\??'"<>\{\}\[\]\\\/]/gi, ''); 
  var Kra_5=document.getElementById("Kra_a"+k+"_5").value.replace(/[`~!@#$^&*|\??'"<>\{\}\[\]\\\/]/gi, '');
  
  var KraD_1=document.getElementById("KraDes_a"+k+"_1").value.replace(/[`~!@#$^&*|\??'"<>\{\}\[\]\\\/]/gi, ''); 
  var KraD_2=document.getElementById("KraDes_a"+k+"_2").value.replace(/[`~!@#$^&*|\??'"<>\{\}\[\]\\\/]/gi, ''); 
  var KraD_3=document.getElementById("KraDes_a"+k+"_3").value.replace(/[`~!@#$^&*|\??'"<>\{\}\[\]\\\/]/gi, ''); 
  var KraD_4=document.getElementById("KraDes_a"+k+"_4").value.replace(/[`~!@#$^&*|\??'"<>\{\}\[\]\\\/]/gi, ''); 
  var KraD_5=document.getElementById("KraDes_a"+k+"_5").value.replace(/[`~!@#$^&*|\??'"<>\{\}\[\]\\\/]/gi, '');  
   
  var Mea_1=document.getElementById("Mea_a"+k+"_1").value; var Mea_2=document.getElementById("Mea_a"+k+"_2").value;
  var Mea_3=document.getElementById("Mea_a"+k+"_3").value; var Mea_4=document.getElementById("Mea_a"+k+"_4").value;
  var Mea_5=document.getElementById("Mea_a"+k+"_5").value;
   
  var Wei_1=document.getElementById("Wei_a"+k+"_1").value; var Wei_2=document.getElementById("Wei_a"+k+"_2").value;
  var Wei_3=document.getElementById("Wei_a"+k+"_3").value; var Wei_4=document.getElementById("Wei_a"+k+"_4").value;
  var Wei_5=document.getElementById("Wei_a"+k+"_5").value; 
  
  var Log_1=document.getElementById("Log_a"+k+"_1").value; var Log_2=document.getElementById("Log_a"+k+"_2").value;
  var Log_3=document.getElementById("Log_a"+k+"_3").value; var Log_4=document.getElementById("Log_a"+k+"_4").value;
  var Log_5=document.getElementById("Log_a"+k+"_5").value;
  
  var Per_1=document.getElementById("Per_a"+k+"_1").value; var Per_2=document.getElementById("Per_a"+k+"_2").value;
  var Per_3=document.getElementById("Per_a"+k+"_3").value; var Per_4=document.getElementById("Per_a"+k+"_4").value;
  var Per_5=document.getElementById("Per_a"+k+"_5").value;

  var Tar_1=document.getElementById("Tar_a"+k+"_1").value; var Tar_2=document.getElementById("Tar_a"+k+"_2").value; 
  var Tar_3=document.getElementById("Tar_a"+k+"_3").value; var Tar_4=document.getElementById("Tar_a"+k+"_4").value; 
  var Tar_5=document.getElementById("Tar_a"+k+"_5").value; 
  

  if(document.getElementById("Kra_a"+k+"_1").value!='')
  {
   if(Mea_1=='None') {alert("please select measure type in sub-KRA row 1.");  return false;}
   if(Wei_1.length === 0){alert("please type weightage in sub-KRA row 1."); return false;}
   if(Tar_1.length === 0){alert("please type target in sub-KRA row 1.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Wei_1); var test_numT = Numfilter.test(Tar_1);
   if(test_numW==false){ alert('Please Enter Only Numeric in the Weightage in sub-KRA row 1'); return false; }
   if(test_numT==false){ alert('Please Enter Only Numeric in the Target in sub-KRA row 1'); return false; }
  }
  if(document.getElementById("Kra_a"+k+"_2").value!='')
  {
   if(Mea_2=='None') {alert("please select measure type in sub-KRA row 2.");  return false;}
   if(Wei_2.length === 0){alert("please type weightage in sub-KRA row 2.");  return false;}
   if(Tar_2.length === 0){alert("please type target in sub-KRA row 2.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Wei_2); var test_numT = Numfilter.test(Tar_2);
   if(test_numW==false){ alert('Please Enter Only Numeric in the Weightage in sub-KRA row 2'); return false; }
   if(test_numT==false){ alert('Please Enter Only Numeric in the Target in sub-KRA row 2'); return false; }
  }
  if(document.getElementById("Kra_a"+k+"_3").value!='')
  {
   if(Mea_3=='None') {alert("please select measure type in sub-KRA row 3.");  return false;}
   if(Wei_3.length === 0){alert("please type weightage in sub-KRA row 3.");  return false;}
   if(Tar_3.length === 0){alert("please type target in sub-KRA row 3.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Wei_3); var test_numT = Numfilter.test(Tar_3);
   if(test_numW==false){ alert('Please Enter Only Numeric in the Weightage in sub-KRA row 3'); return false; }
   if(test_numT==false){ alert('Please Enter Only Numeric in the Target in sub-KRA row 3'); return false; }
  }
  if(document.getElementById("Kra_a"+k+"_4").value!='')
  {
   if(Mea_4=='None') {alert("please select measure type in sub-KRA row 4.");  return false;}
   if(Wei_4.length === 0){alert("please type weightage in sub-KRA row 4.");  return false;}
   if(Tar_4.length === 0){alert("please type target in sub-KRA row 4.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Wei_4); var test_numT = Numfilter.test(Tar_4);
   if(test_numW==false){ alert('Please Enter Only Numeric in the Weightage in sub-KRA row 4'); return false; }
   if(test_numT==false){ alert('Please Enter Only Numeric in the Target in sub-KRA row 4'); return false; }
  }  
  if(document.getElementById("Kra_a"+k+"_5").value!='')
  {
   if(Mea_5=='None') {alert("please select measure type in sub-KRA row 5.");  return false;}
   if(Wei_5.length === 0){alert("please type weightage in sub-KRA row 5.");  return false;}
   if(Tar_5.length === 0){alert("please type target in sub-KRA row 5.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Wei_5); var test_numT = Numfilter.test(Tar_5);
   if(test_numW==false){ alert('Please Enter Only Numeric in the Weightage sub-KRA in row 5'); return false; }
   if(test_numT==false){ alert('Please Enter Only Numeric in the Target in sub-KRA row 5'); return false; }
  }
  var agree=confirm("Are you sure you want to save the Sub-KRAs?");
  if(agree)
  { 
  
    window.location="EditEmpKRA.php?actsubkra=OkSubKraEdit&e="+document.getElementById("e").value+"&DI="+document.getElementById("DI").value+"&KId="+document.getElementById("KraId_"+k).value+"&MWei="+document.getElementById("Weightage_"+k).value+"&SKId1="+document.getElementById("SubKraId_"+k+"_1").value+"&SKId2="+document.getElementById("SubKraId_"+k+"_2").value+"&SKId3="+document.getElementById("SubKraId_"+k+"_3").value+"&SKId4="+document.getElementById("SubKraId_"+k+"_4").value+"&SKId5="+document.getElementById("SubKraId_"+k+"_5").value+"&Kra1="+Kra_1+"&Kra2="+Kra_2+"&Kra3="+Kra_3+"&Kra4="+Kra_4+"&Kra5="+Kra_5+"&KraD1="+KraD_1+"&KraD2="+KraD_2+"&KraD3="+KraD_3+"&KraD4="+KraD_4+"&KraD5="+KraD_5+"&Mea1="+document.getElementById("Mea_a"+k+"_1").value+"&Mea2="+document.getElementById("Mea_a"+k+"_2").value+"&Mea3="+document.getElementById("Mea_a"+k+"_3").value+"&Mea4="+document.getElementById("Mea_a"+k+"_4").value+"&Mea5="+document.getElementById("Mea_a"+k+"_5").value+"&Uni1="+document.getElementById("Uni_a"+k+"_1").value+"&Uni2="+document.getElementById("Uni_a"+k+"_2").value+"&Uni3="+document.getElementById("Uni_a"+k+"_3").value+"&Uni4="+document.getElementById("Uni_a"+k+"_4").value+"&Uni5="+document.getElementById("Uni_a"+k+"_5").value+"&Wei1="+document.getElementById("WWei_a"+k+"_1").value+"&Wei2="+document.getElementById("WWei_a"+k+"_2").value+"&Wei3="+document.getElementById("WWei_a"+k+"_3").value+"&Wei4="+document.getElementById("WWei_a"+k+"_4").value+"&Wei5="+document.getElementById("WWei_a"+k+"_5").value+"&Tar1="+Tar_1+"&Tar2="+Tar_2+"&Tar3="+Tar_3+"&Tar4="+Tar_4+"&Tar5="+Tar_5+"&Log1="+document.getElementById("Log_a"+k+"_1").value+"&Log2="+document.getElementById("Log_a"+k+"_2").value+"&Log3="+document.getElementById("Log_a"+k+"_3").value+"&Log4="+document.getElementById("Log_a"+k+"_4").value+"&Log5="+document.getElementById("Log_a"+k+"_5").value+"&Per1="+document.getElementById("Per_a"+k+"_1").value+"&Per2="+document.getElementById("Per_a"+k+"_2").value+"&Per3="+document.getElementById("Per_a"+k+"_3").value+"&Per4="+document.getElementById("Per_a"+k+"_4").value+"&Per5="+document.getElementById("Per_a"+k+"_5").value+"&YeId="+document.getElementById("YeId").value+"&ActnYId="+document.getElementById("ActnYId").value;
  }
  else{return false;}

}
/**** Sub KRA open Sub KRA open **************************************/

function FunTgt(kid,prd,wgt,tgt,eid,c,lgc)
{ window.open("setkrapptgt.php?act=setkratgt&n=1&valueins=true&checkalpha=false&d=12&pa=4&y=2&kid="+kid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&eid="+eid+"&c="+c+"&lgc="+lgc+"&wgt="+wgt, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1000,height=500");  //setkratgt.php 
}

function FunSubTgt(kid,prd,wgt,tgt,eid,c,lgc)
{ window.open("setkrapptgt.php?act=setkratgt&n=2&valueins=true&checkalpha=false&d=12&pa=4&y=2&kid="+kid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&eid="+eid+"&c="+c+"&lgc="+lgc+"&wgt="+wgt, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1000,height=550");
  //setkratgt.php
}



/*
function ApplyKRAAllEMp(ei,yi,gi,di)
{ 
  var agree=confirm("Are you sure you want to copy the KRA for all related employee?");
  if(agree)
  {
    var agree=confirm("Are you sure?");
    if(agree)
    {
	  window.location="EditEmpKRA.php?actReAllCpy=OkDone&ei="+ei+"&yi="+yi+"&gi="+gi+"&di="+di+"&DI="+di+"&YeId="+yi+"&e="+ei;
    }
  }
}
*/

function ApplyKRAAllEMp(ei,yi,gi,di,ci,ui)
{ 
  window.open("EditEmpKRAApply.php?actReAllCpy=OkDone&ei="+ei+"&yi="+yi+"&gi="+gi+"&di="+di+"&DI="+di+"&YeId="+yi+"&e="+ei+"&ci="+ci+"&ui="+ui,"KRAForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=500,height=500"); 
}



/*function FunTgt(kid,prd,tgt)
{ window.open("setkratgt.php?act=setkratgt&n=1&valueins=true&checkalpha=false&d=12&pa=4&y=2&kid="+kid+"&prd="+prd+"&yy=t1t&tgt="+tgt, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1000,height=500"); }

function FunSubTgt(kid,prd,tgt)
{ window.open("setkratgt.php?act=setkratgt&n=2&valueins=true&checkalpha=false&d=12&pa=4&y=2&kid="+kid+"&prd="+prd+"&yy=t1t&tgt="+tgt, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1000,height=500"); }*/

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
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //********************************************************?>
<?php //******************START*****START*****START******START******START*******************?>
<?php //********************************************************************?>
<input type="hidden" id="e" value="<?php echo $_REQUEST['e']; ?>"/>
<input type="hidden" id="YeId" value="<?php echo $_REQUEST['YeId']; ?>"/>
<input type="hidden" id="DI" value="<?php echo $_REQUEST['DI']; ?>"/>
<table border="0" style="margin-top:0px; width:100%; height:400px;">
  <tr>
    <?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
	<td align="center" width="50%" valign="top">
	  <table border="0" width="100%">
		 <tr>
		   <td align="left" class="heading">Edit Employee KRA<font class="font4"><b>&nbsp;<span id="msg"></span></b></font>
<?php $sqlE=mysql_query("select * from hrm_employee where EmployeeID=".$_REQUEST['e']." AND CompanyId=".$CompanyId, $con); $resE=mysql_fetch_assoc($sqlE);?>
           &nbsp;&nbsp;&nbsp;
		   <font style="font-family:Times New Roman;width:800px; font-size:15px; font-weight:bold;" valign="middle">
           EmpCode&nbsp;:&nbsp;<font color="#006CD9"><?php echo $resE['EmpCode']; ?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		   Name&nbsp;:&nbsp;<font color="#006CD9"><?php echo $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		   <script>function FunLog(){ window.open("viewlogic.php", "F", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1000,height=500");}</script><input type="button" style="width:90px;background-color:#99CC00;font-weight:bold;" value="Logic" onClick="FunLog()"/>
		   <?php if($_REQUEST['YeId']==$resSY['CurrY']){ ?>
		   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		   <a href="#" onClick="OpenOldKra()"/><font color="#620000">Old KRA</font></a> </font></td>
		   <?php } ?>
		 </tr>
         <tr>
          <td id="OldKRaID" style="display:none;">
	       <table border="0">
	        <tr>
<?php /****************************** Old KRA OPEN**************************************/ ?>			
<td id="AppraisalForm" style="width:1160px;display:block;">
 <table cellpadding="0" cellspacing="0">		     
 <tr>  
  <td id="Achivement" style="">
	<table border="0" cellpadding="0" cellspacing="0"> 
	<tr>
	  <td colspan="8">
	   <table border="0"><tr><td align="" style="font-family:Times New Roman;color:#007100; font-size:14px; font-weight:bold; width:1100px;" valign="middle">      
Your Old KRA for Assessment Year&nbsp;<?php if($CompanyId==1){ echo $FromOld; }else{ $OF=$FromOld-1; $OT=$FromOld; echo $OF.'-'.$OT; } ?>
&nbsp;&nbsp;<a href="#" onClick="CloseOldKra()"/><font color="#620000">Hide</font></a></td>
       <td align="center" style="color:#000084; font-size:12px; font-weight:bold; width:200px;" valign="middle">&nbsp;</td>
       </tr></table>
     </td>	  
   </tr>
   <tr>	
   <td style="width:17px; "></td> 
   <td colspan="8" style="width:1100px;">
   <table style="width:1160px;border-color:#EEF0AA;background-color:#EEF0AA;" border="1"> 
    <tr bgcolor="#EEF0AA" style="height:24px;">   
     <td align="center" class="font" style="width:50px;">&nbsp;</td>
     <td class="font" align="center" style="width:350px;">KRA/Goals</td>
     <td class="font" align="center" style="width:450px;">Description</td>  
     <td class="font" align="center" style="width:100px;">Measure</td>
     <td class="font" align="center" style="width:90px;">Unit</td>
     <td class="font" align="center" style="width:60px;">Weightage</td>
     <td class="font" align="center" style="width:60px;">Target</td>
    </tr>
<?php $sqlEK=mysql_query("select * from hrm_employee_pms_kraforma INNER JOIN hrm_employee_pms ON hrm_employee_pms_kraforma.EmpPmsId=hrm_employee_pms.EmpPmsId where hrm_employee_pms.EmployeeID=".$_REQUEST['e']." AND YearId=".$resSY['OldY'], $con); $rowEK=mysql_num_rows($sqlEK); if($rowEK>0) { $resEK=mysql_fetch_assoc($sqlEK);

$sqlEK2=mysql_query("select KRA,KRA_Description,Measure,Unit,hrm_employee_pms_kraforma.Weightage,hrm_employee_pms_kraforma.Target from hrm_employee_pms_kraforma INNER JOIN hrm_pms_kra ON hrm_employee_pms_kraforma.KRAId=hrm_pms_kra.KRAId where hrm_employee_pms_kraforma.EmpPmsid=".$resEK['EmpPmsId']." AND hrm_employee_pms_kraforma.KRAFormAStatus='A' AND hrm_pms_kra.CompanyId=".$CompanyId, $con); $no=1; $rowEK2=mysql_num_rows($sqlEK2); if($rowEK2>0) { while($resEK2=mysql_fetch_array($sqlEK2)){ ?>
    <tr id="TR_<?php echo $no; ?>" bgcolor="#FFFFFF" style="height:22px;">   
    <td align="center" valign="top" style="width:50px;"><input type="hidden" id="KSn" value="<?php echo $no; ?>">
    <input type="checkbox" id="NoId_<?php echo $no; ?>" value="SNo" onClick="return ClickCheckKRA(<?php echo $no; ?>)"/></td>
    <td valign="top" style="width:350px;font-family:Georgia;font-size:12px;">
    <input type="hidden" id="KRAGoal<?php echo $no; ?>" value="<?php echo $resEK2['KRA']; ?>"/><?php echo $resEK2['KRA']; ?></td>
    <td valign="top" style="width:450px;font-family:Georgia;font-size:12px;">
    <input type="hidden" id="Des<?php echo $no; ?>" value="<?php echo $resEK2['KRA_Description']; ?>"/><?php echo $resEK2['KRA_Description']; ?></td>  
    <td valign="top" style="width:100px;font-family:Georgia;font-size:12px;">
    <input type="hidden" id="Mea<?php echo $no; ?>" value="<?php echo $resEK2['Measure']; ?>"/><?php echo $resEK2['Measure']; ?></td>
    <td valign="top" style="width:90px;font-family:Georgia;font-size:12px;">
    <input type="hidden" id="Uni<?php echo $no; ?>" value="<?php echo $resEK2['Unit']; ?>"/><?php echo $resEK2['Unit']; ?></td>
    <td valign="top" style="width:60px;font-family:Georgia;font-size:12px;">
    <input type="hidden" id="Wei<?php echo $no; ?>" value="<?php echo $resEK2['Weightage']; ?>"/><?php echo $resEK2['Weightage']; ?></td>
    <td valign="top" style="width:60px;font-family:Georgia;font-size:12px;">
    <input type="hidden" id="Tar<?php echo $no; ?>" value="<?php echo $resEK2['Target']; ?>"/><?php echo $resEK2['Target']; ?></td>
   </tr>
<?php $no++; } }}?>
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
<?php /*********************************** Old KRA CLOSE *********************************/ ?>		
                  </tr>						
				  <tr>
    <td>
	  <table border="0">
	    <tr>	
		 <td id="AppraisalForm" style="width:1100px;display:block;">
		   <table cellpadding="0" cellspacing="0">		     
  <tr>
<form name="KRAForm" method="post" onSubmit="return ValidationAchive(this)">   
   <td id="Achivement" style="">
	 <table border="0" cellpadding="0" cellspacing="0"> 
     <tr>
	  <td colspan="8">
	   <table border="0"><tr><td align="" style="font-family:Times New Roman;color:#007100; font-size:14px; font-weight:bold; width:1000px;" valign="middle">      
	  List down your KRA for Assessment Year&nbsp;<?php if($CompanyId==1 OR $CompanyId==2 OR $CompanyId==4){ echo $FromCurr; }else{ $NF=$FromCurr-1; $NT=$FromCurr; echo $NF.'-'.$NT; } ?>
	  &nbsp;&nbsp;&nbsp;<font color="#FF0000"><?php echo $msg; ?></font>
	  <font color="#014E05" style='font-family:Times New Roman;' size="3"><b><?php //echo $msg; ?></b></font></td>
	         <td align="right" style="color:#000084; font-size:12px;font-weight:bold; width:150px;" valign="middle">      
<?php $sql=mysql_query("select * from hrm_pms_kra where YearId=".$_REQUEST['YeId']." AND CompanyId=".$CompanyId." AND EmployeeID=".$_REQUEST['e']." order by KRAId ASC", $con); $row=mysql_num_rows($sql); ?>
	  <input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='EditKRA.php?DpId=<?php echo $_REQUEST['DI']; ?>&YeId=<?php echo $_REQUEST['YeId'];?>'"/>
      </td>
	  <?php if($_REQUEST['YeId']==$resSY['CurrY'] OR $_REQUEST['YeId']==$resSYP['CurrY']){ ?>
	  <td align="right" style="color:#000084; font-size:12px;font-weight:bold; width:250px;" valign="middle">
	  <input type="Submit" name="SubmitKRA" id="SubmitKRA" value="save" style="width:100px; display:<?php if($row>0) { echo 'none'; } else {echo 'block';} ?>;"/>
      <?php if($row>0) { ?>
      
      <input type="button" name="EditK" id="EditK" style="width:100px;" value="Edit" onClick="EditKRAvalue()"/>
      
      <?php if($RD['DepartmentId']==6 OR $RD['DepartmentId']==4 OR $CompanyId==4){?><input type="button" name="AppAllK" id="AppAllK" style="width:100px;" value="Apply For All" onClick="ApplyKRAAllEMp(<?php echo $_REQUEST['e'].','.$_REQUEST['YeId'].','.$RD['GradeId'].','.$RD['DepartmentId'].','.$CompanyId.','.$UserId;?>)"/><?php } ?>
      
      <?php } ?>
      </td> 
	  <?php } ?>
	  <input type="hidden" id="ActnYId" name="ActnYId" value="<?php echo $_REQUEST['YeId']; ?>" readonly/>
	   </tr></table>
	 </td>	  
	 </tr>

 <tr style="height:24px;">	
  <td></td> 
  
  <td colspan="7" style="width:1100px;">
  <table style="width:1100px;border-color:#EEF0AA;background-color:#EEF0AA;" border="1" cellspacing="1"> 
  <tr>   
   <td align="center"><input class="Input2" style="width:40px;text-align:center;" value="SNo" readonly/></td>
   <td align="center"><input class="Input2" style="width:299px;text-align:center;" value="KRA/Goals" readonly/></td>
   <td align="center"><input class="Input2" style="width:399px;text-align:center;" value="Description" readonly/></td>  
   <td align="center"><input class="Input2" style="width:115px;text-align:center;" value="Measure" readonly/></td>
   <td align="center"><input class="Input2" style="width:88px;text-align:center;" value="Unit" readonly/></td>
   <td align="center"><input class="Input2" style="width:68px;text-align:center;" value="Weightage" readonly/></td>
   <td align="center"><input class="Input2" style="width:68px;text-align:center;" value="Logic" readonly/></td>
   <td align="center"><input class="Input2" style="width:88px;text-align:center;" value="Period" readonly/></td>
   <td align="center"><input class="Input2" style="width:68px;text-align:center;" value="Target" readonly/></td>
  </tr>
  </table>
  </td>
</tr>

<?php if($row>0){ $k=1; while($res=mysql_fetch_assoc($sql)) {?>

<tr style="height:22px;" id="TR_<?php echo $k; ?>">	
  <td></td> 
<?php $sSubK=mysql_query("select * from hrm_pms_krasub where KRAId=".$res['KRAId']." AND KSubStatus='A' order by KRASubId ASC",$con); $rowSubK=mysql_num_rows($sSubK); ?>  
  <td colspan="7" style="width:1100px;">
  <table id="Row_<?php echo $k; ?>" style="width:1100px;" border="1" cellspacing="1">
  <tr bgcolor="#FFFFFF">  
  <td align="center" valign="middle"><input class="Input" style="width:40px;text-align:center;font-weight:bold;height:12px; font-size:12px;" value="<?php echo $k; ?>" readonly/><span style="cursor:pointer;"><img src="images/open-folder.png" style="height:12px;display:<?php if($rowSubK>0){echo 'block';}else{echo 'none';}?>;" onClick="FunSubC(<?php echo $k; ?>)" id="SpanO<?php echo $k; ?>"/><img src="images/close-folder.png" style="height:12px;display:<?php if($rowSubK>0){echo 'none';}else{echo 'block';}?>;" onClick="FunSubO(<?php echo $k; ?>)" id="SpanC<?php echo $k; ?>"/></span><input type="hidden" id="KraIdNo_<?php echo $k; ?>"><input type="hidden" name="KId_<?php echo $k; ?>" value="<?php echo $res['KRAId']; ?>"></td>
  
  <td align="center"><input name="KRA_<?php echo $k; ?>" id="KRA_<?php echo $k; ?>" class="Input" style="width:299px;" maxlength="600" value="<?php echo $res['KRA']; ?>" readonly/></td>
  <td align="center"><input name="KRADes_<?php echo $k; ?>" id="KRADes_<?php echo $k; ?>" class="Input" style="width:399px;" maxlength="800" value="<?php echo $res['KRA_Description']; ?>" readonly/></td> 
   
  <td align="center"><?php if($rowSubK==0){?><select name="Measure_<?php echo $k; ?>" id="Measure_<?php echo $k; ?>" class="Input" style="width:115px; height:20px;" readonly><option value="<?php echo $res['Measure']; ?>"><?php echo $res['Measure']; ?></option><option value="Acreage">Acreage</option><option value="Event">Event</option><option value="Program">Program</option><option value="Processes">Processes</option><option value="Maintenance">Maintenance</option><option value="Time">Time</option><option value="Yield">Yield</option><option value="Value">Value</option><option value="Volume">Volume</option><option value="Quantity">Quantity</option><option value="Quality">Quality</option><option value="Area">Area</option><option value="Amount">Amount</option><option value="None">None</option></select><?php }else{ ?><input type="" style="width:115px;height:20px;border:hidden;" name="Measure_<?php echo $k; ?>" id="Measure_<?php echo $k; ?>" readonly value=""><?php } ?></td>
  
  <td align="center"><?php if($rowSubK==0){?><select name="Unit_<?php echo $k; ?>" id="Unit_<?php echo $k; ?>" class="Input" style="width:88px; height:20px;" readonly><option value="<?php echo $res['Unit']; ?>"><?php echo $res['Unit']; ?></option><option value="%">%</option><option value="Acres">Acres</option><option value="Days">Days</option><option value="Month">Month</option><option value="Hours">Hours</option><option value="Kg">Kg</option><option value="Ton">Ton</option><option value="MT">MT</option><option value="Kg/Acre">Kg/Acre</option><option value="Number">Number</option><option value="Lakhs">Lakhs</option><option value="Rs.">Rs.</option><option value="MT">MT</option><option value="INR">INR</option><option value="None">None</option></select><?php }else{?><input type="" style="width:88px;height:20px;border:hidden;" name="Unit_<?php echo $k; ?>" id="Unit_<?php echo $k; ?>" value=""><?php } ?></td>
  
  <td align="center"><input type="hidden" name="WWeightage_<?php echo $k; ?>" id="WWeightage_<?php echo $k; ?>" value="<?php echo $res['Weightage'] ?>" /><input name="Weightage_<?php echo $k; ?>" id="Weightage_<?php echo $k; ?>" class="Input" style="width:68px; text-align:center;" maxlength="8" onChange="ChangeWeight(<?php echo $k; ?>)" value="<?php echo $res['Weightage']; ?>" readonly/></td>
  
  
  <td align="center"><?php if($rowSubK==0){?><select name="Logic_<?php echo $k; ?>" id="Logic_<?php echo $k; ?>" class="Input" style="width:68px; height:20px;" readonly><option value="<?php echo $res['Logic']; ?>"><?php echo $res['Logic']; ?></option><option value="Logic1">Logic1</option><option value="Logic2">Logic2</option><option value="Logic3">Logic3</option><option value="Logic4">Logic4</option><option value="Logic5">Logic5</option><option value="Logic6">Logic6</option><option value="Logic7">Logic7</option><option value="Logic8a">Logic8a</option><option value="Logic8b">Logic8b</option><option value="Logic8c">Logic8c</option><option value="Logic8d">Logic8d</option><option value="Logic8e">Logic8e</option><option value="Logic9">Logic9</option><option value="Logic10">Logic10</option><option value="Logic11">Logic11</option></select><?php }else{?><input type="" style="width:68px;height:20px;border:hidden;" name="Logic_<?php echo $k; ?>" id="Logic_<?php echo $k; ?>" value=""><?php } ?></td>
  <td align="center"><?php if($rowSubK==0){ ?><select name="Period_<?php echo $k; ?>" id="Period_<?php echo $k; ?>" class="Input" style="width:88px; height:20px;" readonly><option value="<?php echo $res['Period']; ?>"><?php if($res['Period']=='Annual'){echo 'Annually';}elseif($res['Period']=='1/2 Annual'){echo 'Half Yearly';}elseif($res['Period']=='Quarter'){echo 'Quarterly';}elseif($res['Period']=='Monthly'){echo 'Monthly';} ?></option><option value="Annual">Annually</option><option value="1/2 Annual">Half Yearly</option><option value="Quarter">Quarterly</option><option value="Monthly">Monthly</option></select><?php }else{?><input type="" style="width:88px;height:20px;border:hidden;" name="Period_<?php echo $k; ?>" id="Period_<?php echo $k; ?>" value=""><?php } ?></td>
  
 
  <td align="center"><?php if($rowSubK==0){?><input name="Target_<?php echo $k; ?>" id="Target_<?php echo $k; ?>" class="Input" style="cursor:<?php if($res['Period']!='Annual'){echo 'pointer';} ?>;width:68px;text-align:center;text-decoration:<?php if($res['Period']!='Annual' AND $res['Period']!=''){ echo 'underline'; }?>;color:<?php if($res['Period']!='Annual' AND $res['Period']!=''){ echo '#000099'; }?>;" maxlength="8" <?php if($res['Period']!='Annual' AND $res['Period']!=''){?> onClick="FunTgt(<?php echo $res['KRAId']; ?>,'<?php echo $res['Period']; ?>',<?php echo intval($res['Weightage']).','.intval($res['Target']).','.$_REQUEST['e'].','.$CompanyId; ?>,'<?php echo $res['Logic']; ?>')" <?php } ?> onChange="ChangeTarget(<?php echo $k; ?>)" value="<?php echo $res['Target']; ?>" readonly/><?php } else{ ?><input type="" style="width:68px;height:20px;border:hidden;text-align:center;" name="Target_<?php echo $k; ?>" id="Target_<?php echo $k; ?>" value="<?php echo $res['Target']; ?>" readonly/><?php } ?>
  <input type="hidden" name="TTarget_<?php echo $k; ?>" id="TTarget_<?php echo $k; ?>" value="<?php echo $res['Target'] ?>"/>
  </td>
  </tr>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
<?php $sSubK=mysql_query("select * from hrm_pms_krasub where KRAId=".$res['KRAId']." AND KSubStatus='A' order by KRASubId ASC",$con); $rowSubK=mysql_num_rows($sSubK); ?>   
 <tr>
  <td colspan="9" align="right" style="border:hidden;border-style:none;">
  <div id="Div<?php echo $k; ?>" style="display:<?php if($rowSubK>0){echo 'block';}else{echo 'none';} ?>;">
     <table style="width:1000px;background-color:#D5AAAA;" border="0" cellpadding="0" cellspacing="1"> 
     <tr style="background-color:#D5AAAA;">   
	 <td align="center" class="Input2a" style="width:45px;"><?php /*<span style="cursor:pointer;color:#003162;" onClick="FunSubC(<?php echo $k; ?>)"><u>Hide</u></span>*/ ?></td>
     <td align="center" class="Input2a" style="width:30px;">SNo</td>
     <td align="center" class="Input2a" style="width:280px;">Sub KRA/Goals</td>
     <td align="center" class="Input2a" style="width:390px;">Sub KRA Description</td>  
     <td align="center" class="Input2a" style="width:110px;">Measure</td>
     <td align="center" class="Input2a" style="width:80px;">Unit</td>
     <td align="center" class="Input2a" style="width:60px;">Weightage</td>
	 
	 <td align="center" class="Input2a" style="width:70px;">Logic</td>
	 <td align="center" class="Input2a" style="width:80px;">Period</td>
	 
     <td align="center" class="Input2a" style="width:60px;">Target</td>
     </tr>
<?php if($rowSubK==0){$num=5;}elseif($rowSubK==1){$num=4;}elseif($rowSubK==2){$num=3;}elseif($rowSubK==3){$num=2;}elseif($rowSubK==4){$num=1;}elseif($rowSubK==5){$num=0;} ?>

<?php /* While Open*/ $m=1; while($rSubK=mysql_fetch_assoc($sSubK)){ ?>
  <input type="hidden" id="KraId_<?php echo $k; ?>" value="<?php echo $res['KRAId']; ?>" />
  <input type="hidden" id="SubKraId_<?php echo $k.'_'.$m; ?>" value="<?php echo $rSubK['KRASubId']; ?>" />
  <tr style="background-color:#FFFFFF;">
  <?php if($m==1){ ?>
   <td rowspan="5" style="background-color:#D5AAAA;" valign="middle" align="center" class="Input2a"><input type="button" style="width:45px;text-align:center;" value="save" onClick="SaveKraA(<?php echo $k.','.$m ?>)"/></td>
   <?php } ?>   
  <td align="center"><input class="Inputa" style="width:30px;text-align:center;font-weight:bold;" value="<?php if($m==1){$n='a';}elseif($m==2){$n='b';}elseif($m==3){$n='c';}elseif($m==4){$n='d';}elseif($m==5){$n='e';}echo $n; ?>" readonly/><input type="hidden" id="KraIdNo_a<?php echo $k.'_'.$m; ?>"></td>
  <td align="center"><input id="Kra_a<?php echo $k.'_'.$m; ?>" class="Inputa" value="<?php echo $rSubK['KRA']; ?>" style="width:280px;" maxlength="600" /></td>
  <td align="center"><input id="KraDes_a<?php echo $k.'_'.$m; ?>" class="Inputa" value="<?php echo $rSubK['KRA_Description']; ?>" style="width:390px;" maxlength="800"/></td>  
  
  <td align="center" style="background-color:#CAE4FF;"><select id="Mea_a<?php echo $k.'_'.$m; ?>" class="Inputa" style="width:110px; height:20px;"><option value="<?php echo $rSubK['Measure']; ?>" selected><?php echo $rSubK['Measure']; ?></option><option value="Acreage">Acreage</option><option value="Event">Event</option><option value="Program">Program</option><option value="Processes">Processes</option><option value="Maintenance">Maintenance</option><option value="Time">Time</option><option value="Yield">Yield</option><option value="Value">Value</option><option value="Volume">Volume</option><option value="Quantity">Quantity</option><option value="Quality">Quality</option><option value="Area">Area</option><option value="Amount">Amount</option><option value="None">None</option></select></td>
  
  <td align="center" style="background-color:#CAE4FF;"><select id="Uni_a<?php echo $k.'_'.$m; ?>" class="Inputa" style="width:80px; height:20px;"><option value="<?php echo $rSubK['Unit']; ?>" selected><?php echo $rSubK['Unit']; ?></option><option value="%">%</option><option value="Acres">Acres</option><option value="Days">Days</option><option value="Month">Month</option><option value="Hours">Hours</option><option value="Kg">Kg</option><option value="Ton">Ton</option><option value="MT">MT</option><option value="Kg/Acre">Kg/Acre</option><option value="Number">Number</option><option value="Lakhs">Lakhs</option><option value="Rs.">Rs.</option><option value="MT">MT</option><option value="INR">INR</option><option value="None">None</option></select></td>
  
  <td align="center"><input type="hidden" id="WWei_a<?php echo $k.'_'.$m; ?>" value="<?php echo $rSubK['Weightage']; ?>"/>
  <input id="Wei_a<?php echo $k.'_'.$m; ?>" class="Inputa" value="<?php echo $rSubK['Weightage']; ?>" style="width:60px; text-align:center;" maxlength="8" onChange="ChangeWeighta(<?php echo $k.', '.$m; ?>)"/></td>
  
  <td align="center" style="background-color:#CAE4FF;"><select id="Log_a<?php echo $k.'_'.$m; ?>" class="Inputa" style="width:70px; height:20px;"><option value="<?php echo $rSubK['Logic']; ?>" selected><?php echo $rSubK['Logic']; ?></option><option value="Logic1">Logic1</option><option value="Logic2">Logic2</option><option value="Logic3">Logic3</option><option value="Logic4">Logic4</option><option value="Logic5">Logic5</option><option value="Logic6">Logic6</option><option value="Logic7">Logic7</option><option value="Logic8a">Logic8a</option><option value="Logic8b">Logic8b</option><option value="Logic8c">Logic8c</option><option value="Logic8d">Logic8d</option><option value="Logic8e">Logic8e</option><option value="Logic9">Logic9</option><option value="Logic10">Logic10</option><option value="Logic11">Logic11</option></select></td>
  <td align="center" style="background-color:#CAE4FF;"><select id="Per_a<?php echo $k.'_'.$m; ?>" class="Inputa" style="width:80px; height:20px;"><option value="<?php echo $rSubK['Period']; ?>" selected><?php if($rSubK['Period']=='Annual'){echo 'Annually';}elseif($rSubK['Period']=='1/2 Annual'){echo 'Half Yearly';}elseif($rSubK['Period']=='Quarter'){echo 'Quarterly';}elseif($rSubK['Period']=='Monthly'){echo 'Monthly';} ?></option><option value="Annual">Annually</option><option value="1/2 Annual">Half Yearly</option><option value="Quarter">Quarterly</option><option value="Monthly">Monthly</option></select></td>
  
  <td align="center"><input type="hidden" id="TTar_a<?php echo $k.'_'.$m; ?>" value="0"/>
  <input id="Tar_a<?php echo $k.'_'.$m; ?>" class="Inputa" value="<?php echo $rSubK['Target']; ?>" style="cursor:<?php if($rSubK['Period']!='Annual'){echo 'pointer';} ?>;width:60px; text-align:center;text-decoration:<?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){ echo 'underline'; }?>;color:<?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){ echo '#000099'; }?>;" maxlength="8" <?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){ ?> onClick="FunSubTgt(<?php echo $rSubK['KRASubId']; ?>,'<?php echo $rSubK['Period']; ?>',<?php echo $rSubK['Weightage'].','.$rSubK['Target'].','.$_REQUEST['e'].','.$CompanyId; ?>,'<?php echo $rSubK['Logic']; ?>')" <?php } ?> onChange="ChangeTargeta(<?php echo $k.', '.$m; ?>)" /></td>
  
</tr> 
<?php $m++;} ?>	
<?php /* While Close*/ ?>	
<?php for($mm=$m; $mm<=5; $mm++){ ?>
  <input type="hidden" id="KraId_<?php echo $k; ?>" value="<?php echo $res['KRAId']; ?>" />
  <input type="hidden" id="SubKraId_<?php echo $k.'_'.$mm; ?>" value="" />
  <tr style="background-color:#FFFFFF;">
  <?php if($mm==1){ ?>
   <td rowspan="5" style="background-color:#D5AAAA;" valign="middle" align="center" class="Input2a"><input type="button" style="width:45px;text-align:center;" value="save" onClick="SaveKraA(<?php echo $k.','.$mm ?>)"/></td>
   <?php } ?>   
  <td align="center"><input class="Inputa" style="width:30px;text-align:center;font-weight:bold;" value="<?php if($mm==1){$n='a';}elseif($mm==2){$n='b';}elseif($mm==3){$n='c';}elseif($mm==4){$n='d';}elseif($mm==5){$n='e';}echo $n; ?>" readonly/><input type="hidden" id="KraIdNo_a<?php echo $k.'_'.$m; ?>"></td>
  <td align="center"><input id="Kra_a<?php echo $k.'_'.$mm; ?>" class="Inputa" style="width:280px;" maxlength="600" /></td>
  <td align="center"><input id="KraDes_a<?php echo $k.'_'.$mm; ?>" class="Inputa" style="width:390px;" maxlength="800"/></td>  
  <td align="center" style="background-color:#CAE4FF;"><select id="Mea_a<?php echo $k.'_'.$mm; ?>" class="Inputa" style="width:110px; height:20px;"><option value="Acreage">Acreage</option><option value="Event">Event</option><option value="Program">Program</option><option value="Processes">Processes</option><option value="Maintenance">Maintenance</option><option value="Time">Time</option><option value="Yield">Yield</option><option value="Value">Value</option><option value="Volume">Volume</option><option value="Quantity">Quantity</option><option value="Quality">Quality</option><option value="Area">Area</option><option value="Amount">Amount</option><option value="None" selected>None</option></select></td>
  
  <td align="center" style="background-color:#CAE4FF;"><select id="Uni_a<?php echo $k.'_'.$mm; ?>" class="Inputa" style="width:80px; height:20px;"><option value="%">%</option><option value="Acres">Acres</option><option value="Days">Days</option><option value="Month">Month</option><option value="Hours">Hours</option><option value="Kg">Kg</option><option value="Ton">Ton</option><option value="MT">MT</option><option value="Kg/Acre">Kg/Acre</option><option value="Number">Number</option><option value="Lakhs">Lakhs</option><option value="Rs.">Rs.</option><option value="MT">MT</option><option value="INR">INR</option><option value="None" selected>None</option></select></td>
  
  <td align="center"><input type="hidden" id="WWei_a<?php echo $k.'_'.$mm; ?>" value="0"/>
  <input id="Wei_a<?php echo $k.'_'.$mm; ?>" class="Inputa" style="width:60px; text-align:center;" maxlength="8" onChange="ChangeWeighta(<?php echo $k.', '.$mm; ?>)"/></td>
  
  <td align="center" style="background-color:#CAE4FF;"><select id="Log_a<?php echo $k.'_'.$mm; ?>" class="Inputa" style="width:70px; height:20px;"><option value="Logic1">Logic1</option><option value="Logic2">Logic2</option><option value="Logic3">Logic3</option><option value="Logic4">Logic4</option><option value="Logic5">Logic5</option><option value="Logic6">Logic6</option><option value="Logic7">Logic7</option><option value="Logic8a">Logic8a</option><option value="Logic8b">Logic8b</option><option value="Logic8c">Logic8c</option><option value="Logic8d">Logic8d</option><option value="Logic8e">Logic8e</option><option value="Logic9">Logic9</option><option value="Logic10">Logic10</option><option value="Logic11">Logic11</option></select></td>
  <td align="center" style="background-color:#CAE4FF;"><select id="Per_a<?php echo $k.'_'.$mm; ?>" class="Inputa" style="width:80px; height:20px;"><option value="Annual">Annually</option><option value="1/2 Annual">Half Yearly</option><option value="Quarter">Quarterly</option><option value="Monthly">Monthly</option></select></td>
  
  <td align="center"><input type="hidden" id="TTar_a<?php echo $k.'_'.$mm; ?>" value="0"/>
  <input id="Tar_a<?php echo $k.'_'.$mm; ?>" class="Inputa" style="width:60px; text-align:center;" maxlength="8" onChange="ChangeTargeta(<?php echo $k.', '.$mm; ?>)" /></td>
  
</tr> 
<?php } ?>	 
     </table>
  </div> 
  </td>
 </tr>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?> 
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?>  
  </table>
  </td>
  
</tr>	  
<?php $k++; $tn=$k-1; $j=$k; } ?> <input type="hidden" id="EditTNRow" name="EditTNRow" value="<?php echo $tn; ?>" /> 
<?php } elseif($row==0) { for($i=1; $i<=5; $i++) { ?> 
<tr style="height:22px;" id="TR_<?php echo $i; ?>">	
  <td></td> 
  
  <td colspan="9" style="width:1100px;">
  <table id="Row_<?php echo $i; ?>" style="width:1100px;" bgcolor="#FFFFFF" border="1" cellspacing="1">
  <tr bgcolor="#FFFFFF">   
  <td align="center"><input class="Input" style="width:40px;text-align:center;font-weight:bold;height:12px; font-size:12px;" value="<?php echo $i; ?>" readonly/><input type="hidden" id="KraIdNo_<?php echo $i; ?>"></td>
  <td align="center"><input name="KRA_<?php echo $i; ?>" id="KRA_<?php echo $i; ?>" class="Input" style="width:299px;" maxlength="600" /></td>
  <td align="center"><input name="KRADes_<?php echo $i; ?>" id="KRADes_<?php echo $i; ?>" class="Input" style="width:399px;" maxlength="800"/></td>  
  
  <td align="center"><select name="Measure_<?php echo $i; ?>" id="Measure_<?php echo $i; ?>" class="Input" style="width:115px; height:20px;"><option value="Acreage">Acreage</option><option value="Event">Event</option><option value="Program">Program</option><option value="Processes">Processes</option><option value="Maintenance">Maintenance</option><option value="Time">Time</option><option value="Yield">Yield</option><option value="Value">Value</option><option value="Volume">Volume</option><option value="Quantity">Quantity</option><option value="Quality">Quality</option><option value="Area">Area</option><option value="Amount">Amount</option><option value="None">None</option></select></td>
  
  <td align="center"><select name="Unit_<?php echo $i; ?>" id="Unit_<?php echo $i; ?>" class="Input" style="width:88px; height:20px;"><option value="%">%</option><option value="Acres">Acres</option><option value="Days">Days</option><option value="Month">Month</option><option value="Hours">Hours</option><option value="Kg">Kg</option><option value="Kg/Acre">Kg/Acre</option><option value="Number">Number</option><option value="Lakhs">Lakhs</option><option value="Rs.">Rs.</option><option value="MT">MT</option><option value="INR">INR</option><option value="None">None</option></select></td>
  
  <td align="center"><input type="hidden" name="WWeightage_<?php echo $i; ?>" id="WWeightage_<?php echo $i; ?>" value="0"/>
  <input name="Weightage_<?php echo $i; ?>" id="Weightage_<?php echo $i; ?>" class="Input" style="width:68px; text-align:center;" maxlength="8" onChange="ChangeWeight(<?php echo $i; ?>)"/></td>
  
  <td align="center"><select name="Logic_<?php echo $i; ?>" id="Logic_<?php echo $i; ?>" class="Input" style="width:68px; height:20px;" onChange="ChangeLogic(<?php echo $i; ?>)"><option value="Logic1">Logic1</option><option value="Logic2">Logic2</option><option value="Logic3">Logic3</option><option value="Logic4">Logic4</option><option value="Logic5">Logic5</option><option value="Logic6">Logic6</option><option value="Logic7">Logic7</option><option value="Logic8a">Logic8a</option><option value="Logic8b">Logic8b</option><option value="Logic8c">Logic8c</option><option value="Logic8d">Logic8d</option><option value="Logic8e">Logic8e</option><option value="Logic9">Logic9</option><option value="Logic10">Logic10</option><option value="Logic11">Logic11</option></select></td>
  <td align="center"><select name="Period_<?php echo $i; ?>" id="Period_<?php echo $i; ?>" class="Input" style="width:88px; height:20px;" onChange="ChangePeriod(<?php echo $i; ?>)"><option value="Annual">Annually</option><option value="1/2 Annual">Half Yearly</option><option value="Quarter">Quarterly</option><option value="Monthly">Monthly</option></select></td>
  
  <td align="center"><input type="hidden" name="TTarget_<?php echo $i; ?>" id="TTarget_<?php echo $i; ?>" value="0"/>
  <input name="Target_<?php echo $i; ?>" id="Target_<?php echo $i; ?>" class="Input" style="width:68px; text-align:center;" maxlength="8" onChange="ChangeTarget(<?php echo $i; ?>)" /></td>
  </tr>
  </table>
  </td>
  
</tr>

<?php $j=$i+1; } } for($i=$j; $i<=15; $i++){ ?> 
<tr style="height:22px;" id="TR_<?php echo $i; ?>">
  <td id="AppImg_<?php echo $i; ?>"><img src="images/Addnew.png" <?php if($i>$j) { echo 'style="display:none;"';} ?> border="0" id="addImg_<?php echo $i; ?>" onClick="ShowRow(<?php echo $i; ?>)"/><img src="images/Minusnew.png" id="minusImg_<?php echo $i; ?>" <?php if($i>=$j){ echo 'style="display:none;"'; } ?> border="0" onClick="HideRow(<?php echo $i; ?>)"/></td>
  	 
  <td colspan="9" style="width:1100px;">
  <table style="display:none;width:1100px;background-color:#FFFFFF;" id="Row_<?php echo $i; ?>" border="1" cellspacing="1"> 
  <tr bgcolor="#FFFFFF"> 
  <td align="center"><input class="Input" style="width:40px;text-align:center;font-weight:bold;height:12px; font-size:12px;" value="<?php echo $i; ?>" readonly/><input type="hidden" id="KraIdNo_<?php echo $i; ?>"></td>
  <td align="center"><input name="KRA_<?php echo $i; ?>" id="KRA_<?php echo $i; ?>" class="Input" style="width:299px;" maxlength="600"/></td>
  <td align="center"><input name="KRADes_<?php echo $i; ?>" id="KRADes_<?php echo $i; ?>" class="Input" style="width:399px;" maxlength="800"/></td>
    
  <td align="center"><select name="Measure_<?php echo $i; ?>" id="Measure_<?php echo $i; ?>" class="Input" style="width:115px; height:20px;"><option value="Acreage">Acreage</option><option value="Event">Event</option><option value="Program">Program</option><option value="Processes">Processes</option><option value="Maintenance">Maintenance</option><option value="Time">Time</option><option value="Yield">Yield</option><option value="Value">Value</option><option value="Volume">Volume</option><option value="Quantity">Quantity</option><option value="Quality">Quality</option><option value="Area">Area</option><option value="Amount">Amount</option><option value="None">None</option></select></td>
  
  <td align="center"><select name="Unit_<?php echo $i; ?>" id="Unit_<?php echo $i; ?>" class="Input" style="width:89px; height:20px;"><option value="%">%</option><option value="Acres">Acres</option><option value="Days">Days</option><option value="Month">Month</option><option value="Hours">Hours</option><option value="Kg">Kg</option><option value="Kg/Acre">Kg/Acre</option><option value="Number">Number</option><option value="Lakhs">Lakhs</option><option value="Rs.">Rs.</option><option value="MT">MT</option><option value="INR">INR</option><option value="None">None</option></select></td>
  
  <td align="center"><input type="hidden" name="WWeightage_<?php echo $i; ?>" id="WWeightage_<?php echo $i; ?>" value="0"/>
  <input name="Weightage_<?php echo $i; ?>" id="Weightage_<?php echo $i; ?>" class="Input" style="width:68px; text-align:center;" maxlength="8" onChange="ChangeWeight(<?php echo $i; ?>)" /></td>
  
  <td align="center"><select name="Logic_<?php echo $i; ?>" id="Logic_<?php echo $i; ?>" class="Input" style="width:68px; height:20px;" onChange="ChangeLogic(<?php echo $i; ?>)"><option value="Logic1">Logic1</option><option value="Logic2">Logic2</option><option value="Logic3">Logic3</option><option value="Logic4">Logic4</option><option value="Logic5">Logic5</option><option value="Logic6">Logic6</option><option value="Logic7">Logic7</option><option value="Logic8a">Logic8a</option><option value="Logic8b">Logic8b</option><option value="Logic8c">Logic8c</option><option value="Logic8d">Logic8d</option><option value="Logic8e">Logic8e</option><option value="Logic9">Logic9</option><option value="Logic10">Logic10</option><option value="Logic11">Logic11</option></select></td>
  <td align="center"><select name="Period_<?php echo $i; ?>" id="Period_<?php echo $i; ?>" class="Input" style="width:88px; height:20px;" onChange="ChangePeriod(<?php echo $i; ?>)"><option value="Annual">Annually</option><option value="1/2 Annual">Half Yearly</option><option value="Quarter">Quarterly</option><option value="Monthly">Monthly</option></select></td>
  
  <td align="center"><input type="hidden" name="TTarget_<?php echo $i; ?>" id="TTarget_<?php echo $i; ?>" value="0"/>
  <input name="Target_<?php echo $i; ?>" id="Target_<?php echo $i; ?>" class="Input" style="width:68px; text-align:center;" maxlength="8" onChange="ChangeTarget(<?php echo $i; ?>)" value="100"/></td>
  
  </tr>
  </table>
  </td>
  
</tr>
<?php } ?>	  
	 </table>
   </td>
</form>       
		</tr>
	  </table>
	</td>
   </tr> 						
		   </table>  		
		</td>
        <?php } ?>
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