<?php session_start();
if($_SESSION['login'] = true){require_once('../user/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../../../index.php');}
$EmployeeId=$_SESSION['EmployeeID'];
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
.InputB{font-size:12px;width:75px;text-align:right;border:0px;background-color:#D2FFA6;font-weight:bold;font-family:Times New Roman;} 
.Input{font-size:12px;width:75px;text-align:right;border:0px;background-color:#EEEEEE;font-family:Times New Roman;}
.TInput{font-size:12px;width:60px;text-align:right;border:0px;background-color:#FFFFA6;font-weight:bold;}
.Trh60{text-align:center;width:60px;font-weight:bold;}.Trh50{text-align:center;width:80px;font-weight:bold;}.Trh80{text-align:center;width:80px;font-weight:bold;}
.inner_table { height:400px;overflow-y:auto;width:auto; }
</style>
<Script type="text/javascript">//window.history.forward(1);</Script> 
<script type="text/javascript" language="javascript">
function ChangeTT(v)  //+'&crop=0'
{  
   var y=document.getElementById("YearV").value; var crp=document.getElementById("CropV").value;
   if(crp==0){alert("Please Select Crop Value"); return false; }
   else{ var act=document.getElementById("act").value; var q=document.getElementById("QtrV").value; var cc=document.getElementById("cc").value;  
   var di=document.getElementById("di").value; var gi=document.getElementById("gi").value; 
   var EHq=document.getElementById("EHq").value; var ii=document.getElementById("ItemV").value; var fc=document.getElementById("fc").value; 
   var vc=document.getElementById("vc").value; var myh=document.getElementById("myh").value; var myt=document.getElementById("myh").value;
   var hq=document.getElementById("hq").value;
   window.location="SalesrRevise.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+'&EHq='+EHq+'&myh='+myh+'&myt='+myt+'&mainv='+v+'&crop='+crp+'&findV=ZZ'; }
}

function editD(sn,q,pid)
{ 
  document.getElementById("EditBtn_"+sn+"_"+pid).style.display='none'; document.getElementById("SaveBtn_"+sn+"_"+pid).style.display='block';
  document.getElementById("RQ1"+sn+"_"+pid).readOnly=false; document.getElementById("RQ1"+sn+"_"+pid).style.background='#FFFFFF';
  document.getElementById("RQ2"+sn+"_"+pid).readOnly=false; document.getElementById("RQ2"+sn+"_"+pid).style.background='#FFFFFF';
  document.getElementById("RQ3"+sn+"_"+pid).readOnly=false; document.getElementById("RQ3"+sn+"_"+pid).style.background='#FFFFFF';
}

function saveD(sn,q,pid,yi,ei,crp,ii)
{   
  var m1=parseFloat(document.getElementById("RQ1"+sn+"_"+pid).value); var mn1=document.getElementById("RQ1"+sn+"_"+pid).value; 
  var m2=parseFloat(document.getElementById("RQ2"+sn+"_"+pid).value); var mn2=document.getElementById("RQ2"+sn+"_"+pid).value; 
  var m3=parseFloat(document.getElementById("RQ3"+sn+"_"+pid).value); var mn3=document.getElementById("RQ3"+sn+"_"+pid).value;
  if(mn1==''){var m1a=0;}else{var m1a=m1;} if(mn2==''){var m2a=0;}else{var m2a=m2;} if(mn3==''){var m3a=0;}else{var m3a=m3;} 
  var url = 'SalesReviseAct.php';  var pars = 'Action=AddRevised&pid='+pid+'&ei='+ei+'&sn='+sn+'&q='+q+'&yi='+yi+'&crp='+crp+'&ii='+ii+'&v1='+m1a+'&v2='+m2a+'&v3='+m3a;
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_AddRevised });
}
function show_AddRevised(originalRequest)
{ document.getElementById('AddMonthResult').innerHTML = originalRequest.responseText; 
  var sn=document.getElementById("sn").value; var q=document.getElementById("Qqr").value; var pid=document.getElementById("pid").value; 
  document.getElementById("RQ4"+sn+"_"+pid).value=document.getElementById("qTot").value;    
  document.getElementById("RQ1t").value=document.getElementById("tot1").value;
  document.getElementById("RQ2t").value=document.getElementById("tot2").value;
  document.getElementById("RQ3t").value=document.getElementById("tot3").value;
  document.getElementById("RQ4t").value=document.getElementById("cTot").value;
  document.getElementById("RQ1"+sn+"_"+pid).style.background='#FFFFB9';
  document.getElementById("RQ2"+sn+"_"+pid).style.background='#FFFFB9';
  document.getElementById("RQ3"+sn+"_"+pid).style.background='#FFFFB9';
  document.getElementById("EditBtn_"+sn+"_"+pid).style.display='block'; document.getElementById("SaveBtn_"+sn+"_"+pid).style.display='none';
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
<?php 
$SpP=mysql_query("select GradeId,DepartmentId,HqId from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $resSpP=mysql_fetch_assoc($SpP); 
$SpEG=mysql_query("select GradeValue from hrm_grade where CompanyId=".$CompanyId." AND GradeId=".$resSpP['GradeId'], $con); $resSpEG=mysql_fetch_assoc($SpEG);
?>		
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /><input type="hidden" id="EmpId" name="EmpId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="act" value="<?php echo $_REQUEST['act']; ?>" /><input type="hidden" name="y" id="y" value="<?php echo $_REQUEST['y']; ?>" />
<input type="hidden" name="hq" id="hq" value="<?php echo $_REQUEST['hq']; ?>" /><input type="hidden" name="q" id="q" value="<?php echo $_REQUEST['q']; ?>" />
<input type="hidden" name="vc" id="vc" value="<?php echo $_REQUEST['vc']; ?>" /><input type="hidden" name="fc" id="fc" value="<?php echo $_REQUEST['fc']; ?>" />
<input type="hidden" id="di" value="<?php echo $_REQUEST['di']; ?>" /><input type="hidden" id="gi" value="<?php echo $_REQUEST['gi']; ?>" />
<input type="hidden" id="cc" value="<?php echo $_REQUEST['cc']; ?>" /><input type="hidden" id="ActThought" value="0" />
<input type="hidden" id="ii" value="<?php echo $_REQUEST['ii']; ?>" /><input type="hidden" id="EHq" value="<?php echo $_REQUEST['EHq']; ?>" /> 
<input type="hidden" id="TotAValueM" value="" /><input type="hidden" id="TotBValueM" value="" /><input type="hidden" id="TotCValueM" value="" />
<input type="hidden" id="MainSelTerrId" value="" /><input type="hidden" id="Sno" value="" /><input type="hidden" id="myh" value="<?php echo $_REQUEST['myh']; ?>" />
<input type="hidden" id="myt" value="<?php echo $_REQUEST['myt']; ?>" /><input type="hidden" id="HqV" value="<?php echo $_REQUEST['hq']; ?>" />
<input type="hidden" id="sgi" value="" />
<tr>
 <td colspan="5"> 	 
  <table border="0">
  <tr>
   <td>
    <table>
	<tr>
	 <td style="font-family:Times New Roman;font-size:20px;color:#FFFF80;">&nbsp;&nbsp;<b>My Sales Plan Revised:</b></td>
     <td>&nbsp;</td>
<?php 
$Ymin1=$_REQUEST['y']-1; $Ymin2=$_REQUEST['y']-2;
$sUpy=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$YearId, $con); $rUpy=mysql_fetch_assoc($sUpy);
$sYmin1=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$Ymin1, $con); $rYmin1=mysql_fetch_assoc($sYmin1);
$sYmin2=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$Ymin2, $con); $rYmin2=mysql_fetch_assoc($sYmin2);
$FUpy=date("Y",strtotime($rUpy['FromDate'])); $TUpy=date("Y",strtotime($rUpy['ToDate']));
$FYmin1=date("Y",strtotime($rYmin1['FromDate'])); $TYmin1=date("Y",strtotime($rYmin1['ToDate']));
$FYmin2=date("Y",strtotime($rYmin2['FromDate'])); $TYmin2=date("Y",strtotime($rYmin2['ToDate']));
?>	 	 
  <td>
    <select style="font-family:Georgia;font-size:15px;width:px;background-color:#E4E0FC;height:23px;width:150px;" id="YearV" onChange="ChangeYear(this.value)">
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate'])); ?>		
 <option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo 'Year-'.$fromdate.'-'.$todate; ?></option
<?php if($_REQUEST['y']==$YearId){?><option value="<?php echo $Ymin1; ?>"><?php echo 'Year-'.$FYmin1.'-'.$TYmin1; ?></option>
<option value="<?php echo $Ymin2; ?>"><?php echo 'Year-'.$FYmin2.'-'.$TYmin2; ?></option>
<?php } elseif($_REQUEST['y']!=$YearId) { ?><option value="<?php echo $YearId; ?>"><?php echo 'Year-'.$FUpy.'-'.$TUpy; ?></option>
<?php if($_REQUEST['y']!=$Ymin1){?><option value="<?php echo $Ymin1; ?>"><?php echo 'Year-'.$FYmin1.'-'.$TYmin1; ?></option><?php } ?>
<?php if($_REQUEST['y']!=$Ymin2){?><option value="<?php echo $Ymin2; ?>"><?php echo 'Year-'.$FYmin2.'-'.$TYmin2; ?></option><?php } } ?></select>
   </td>
   <td></td>
    <td>
     <select style="font-family:Georgia;font-size:15px;width:px;background-color:#E4E0FC;height:23px;width:150px;" id="CropV">
     <option value="0" <?php if($_REQUEST['crop']==0){ echo 'selected'; } ?>>Select Crop</option>
	 <option value="1" <?php if($_REQUEST['crop']==1){ echo 'selected'; } ?>>Vegetable Crop</option>
	 <option value="2" <?php if($_REQUEST['crop']==2){ echo 'selected'; } ?>>Field Crop</option>
	 <option value="3" <?php if($_REQUEST['crop']==3){ echo 'selected'; } ?>>ALL Crop</option>
	 </select>
   </td>
   <td></td>
	<td>
     <select id="ItemV" id="ItemV" style="font-family:Georgia;font-size:15px;width:px;background-color:#E4E0FC;height:23px;width:140px;" onChange="ChangeII(this.value)" <?php if($_REQUEST['crop']==0){echo 'disabled';} ?>>
	 <?php if($_REQUEST['ii']>0){ $sqlI1=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI1=mysql_fetch_assoc($sqlI1); ?>
	 <option value="<?php echo $_REQUEST['ii']; ?>"><?php echo strtoupper($resI1['ItemName']); ?></option>
	 <?php } else { ?><option value="0">Select Item</option><?php } ?>
	 
	 <?php if($_REQUEST['crop']>0){?>
     <?php if($_REQUEST['crop']==1 OR $_REQUEST['crop']==2){ $sI=mysql_query("select ItemId,ItemName from hrm_sales_seedsitem where GroupId=".$_REQUEST['crop']." order by ItemName ASC", $con); } elseif($_REQUEST['crop']==3){ $sI=mysql_query("select ItemId,ItemName from hrm_sales_seedsitem order by ItemName ASC", $con); }
	 while($rI=mysql_fetch_assoc($sI)){ ?><option value="<?php echo $rI['ItemId']; ?>"><?php echo strtoupper($rI['ItemName']); ?></option><?php } ?>
	 <?php } ?>	
	 </select>
   </td>
   <td></td>   
   <td><select style="font-family:Georgia;font-size:15px;width:px;background-color:#E4E0FC;height:23px;width:80px;" id="QtrV" onChange="ChangeQtr(this.value)">
	<option value="<?php echo $_REQUEST['q']; ?>" selected><?php echo 'Qtr-0'.$_REQUEST['q']; ?></option> 
<?php if($_REQUEST['q']==1){ ?>	<option value="2">Qtr-02</option><option value="3">Qtr-03</option><option value="4">Qtr-04</option>
<?php } elseif($_REQUEST['q']==2){ ?><option value="3">Qtr-03</option><option value="4">Qtr-04</option><option value="1">Qtr-01</option>
<?php } elseif($_REQUEST['q']==3){ ?><option value="4">Qtr-04</option><option value="1">Qtr-01</option><option value="2">Qtr-02</option>
<?php } elseif($_REQUEST['q']==4){ ?><option value="1">Qtr-01</option><option value="2">Qtr-02</option><option value="3">Qtr-03</option><?php } ?></select>  
    </td>
	<td></td>
   <td>
    <input type="button" style="font-family:Georgia;font-size:14px;background-color:#E4E0FC;height:23px;width:100px;" onClick="ChangeTT(<?php echo $EmployeeId; ?>)" value="Click">
   </td>
   <td></td>
	</tr>
	</table>
   </td>
  </tr>
   <td>
     <table border="0">  
<tr><td><span id="DealerHqSpan"></span></td></tr>
  </table>
 </td>
</tr>
<?php /***************************************** Main Page Open **************************************/ ?>
<?php $sqlEQq=mysql_query("select * from hrm_sales_revised_opnclose where YearId=".$_REQUEST['y']." AND Quarter=".$_REQUEST['q']." AND Status='A'",$con); 
      $rowEQq=mysql_num_rows($sqlEQq);
	  
if($_REQUEST['findV']=='ZZ'){ 
$sqlRpt=mysql_query("select hrm_employee_general.EmployeeID from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where DepartmentId=6 AND hrm_employee.EmpStatus='A' AND RepEmployeeID=".$_REQUEST['mainv'], $con); $rowRpt=mysql_num_rows($sqlRpt); }?>
<?php $sqlCoc=mysql_query("select * from hrm_sales_planshow where PlanshowId=1",$con); $resCoc=mysql_fetch_assoc($sqlCoc); 
      $EntP=$resCoc['EntryPlan']; $RslP=$resCoc['ResultPlan']; ?>
<?php if($_REQUEST['findV']=='ZZ'){ ?>
<tr>
 <td>
<?php  $sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,CostCenter,HqId,Gender,Married,DR,GradeId,DesigId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmployeeID=".$_REQUEST['mainv'], $con); 
$resE=mysql_fetch_assoc($sqlE); if($resE['DR']=='Y'){$ME='Dr.';} elseif($resE['Gender']=='M'){$ME='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$ME='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$ME='Miss.';} $NameE=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'];
$sqlDesigE=mysql_query("select DesigName from hrm_designation where DesigId=".$resE['DesigId'], $con); $resDesigE=mysql_fetch_assoc($sqlDesigE);
$sqlHqE = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$resE['HqId'], $con) or die(mysql_error()); $resHqE = mysql_fetch_assoc($sqlHqE); 
$sqlStE=mysql_query("select StateName from hrm_state where StateId=".$resE['CostCenter'], $con); $resStE=mysql_fetch_assoc($sqlStE); 

      $BeforeYId=$_REQUEST['y']-1; $AfterYId=$_REQUEST['y']+1;
	  $sqlY1=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$BeforeYId, $con); $resY1=mysql_fetch_assoc($sqlY1); 
	  $sqlY2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resY2=mysql_fetch_assoc($sqlY2); 
	  $sqlY3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$AfterYId, $con); $resY3=mysql_fetch_assoc($sqlY3); 
	  $y1=date("y",strtotime($resY1['FromDate'])).'-'.date("y",strtotime($resY1['ToDate'])); $y1T='<font color="#A60053">Ach.</font>';
	  $y2=date("y",strtotime($resY2['FromDate'])).'-'.date("y",strtotime($resY2['ToDate'])); $y2T='<font color="#A60053">Tgt.</font>';
	  $y3=date("y",strtotime($resY3['FromDate'])).'-'.date("y",strtotime($resY3['ToDate'])); $y3T='<font color="#A60053">Proj.</font>';
	  if($_REQUEST['crop']==1){ $ItemN='Vegetable Crop'; }elseif($_REQUEST['crop']==2){ $ItemN='Field Crop'; }elseif($_REQUEST['crop']==3){ $ItemN='All Crop'; } ?>	 
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:1000px;">	
  <tr>
  <td colspan="3" align="center" style="height:25px;background-color:#005300;font-family:Times New Roman;font-size:16px;color:#FFFF20;font-weight:bold;">  
  <font color="#D7EBFF">Crop:</font>&nbsp;<?php echo $ItemN; ?></td>
  <td colspan="10" style="height:25px;background-color:#005300;font-family:Times New Roman;font-size:16px;color:#FFFF20;font-weight:bold;" id="TD">
   &nbsp;<font color="#D7EBFF">QUARTER:&nbsp;</font><?php echo $_REQUEST['q']; ?>&nbsp;&nbsp;&nbsp;<font color="#D7EBFF">Year:&nbsp;</font><?php echo $fromdate.'-'.$todate; ?>
   </td>
  </tr>
  <tr style="background-color:#D5F1D1;color:#000000;">
    <td align="center" style="width:150px;" rowspan="3"><b>CROP</b></td>
	<td align="center" style="width:300px;" rowspan="3"><b>VARIETY</b></td>
	<td align="center" style="width:50px;" rowspan="3"><b>&nbsp;TYPE&nbsp;</b></td>
	<td align="center" style="width:50px;" rowspan="3"><b>&nbsp;EDIT&nbsp;</b></td>
  </tr>	
  <tr style="background-color:#D5F1D1;color:#000000;">
    <td colspan="4" align="center"><b>Original Plan</b></td>
	<?php /*<td align="center" rowspan="2" class="Trh80"><b>Superior Plan</b></td>*/ ?>
	<td colspan="4" align="center" style="width:300px;"><b>Revised [During Season]</b></td>
  </tr>	
<?php if($_REQUEST['q']==1){$td1='Apr'; $td2='May'; $td3='Jun';}elseif($_REQUEST['q']==2){$td1='Jul'; $td2='Aug'; $td3='Sep';}elseif($_REQUEST['q']==3){$td1='Oct'; $td2='Nov'; $td3='Dec';}elseif($_REQUEST['q']==4){$td1='Jan'; $td2='Feb'; $td3='Mar';} ?>  
   <tr style="background-color:#D5F1D1;color:#000000;">
	<td class="Trh50"><?php echo $td1; ?></td><td class="Trh50"><?php echo $td2; ?></td><td class="Trh50"><?php echo $td3; ?></td><td class="Trh80"><?php echo 'Total'; ?></td>
	<td class="Trh50"><?php echo $td1; ?></td><td class="Trh50"><?php echo $td2; ?></td><td class="Trh50"><?php echo $td3; ?></td><td class="Trh80"><?php echo 'Total'; ?></td>
  </tr>	
<?php 
if($_REQUEST['ii']>0){ $sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." order by ItemName ASC, ProductName ASC, TypeName ASC", $con);}
else {
if($_REQUEST['crop']==1 OR $_REQUEST['crop']==2){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." order by ItemName ASC, ProductName ASC, TypeName ASC", $con); }
elseif($_REQUEST['crop']==3){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId order by ItemName ASC, ProductName ASC, TypeName ASC", $con); } 
}

$Sn=1; while($res=mysql_fetch_array($sql)){
if($_REQUEST['findV']=='ZZ'){ 
//(Actual)
$sqlA=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$_REQUEST['y'].".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId INNER JOIN hrm_sales_reporting_level ON hrm_sales_hq_temp.EmployeeID=hrm_sales_reporting_level.EmployeeID where HqTEmpStatus='A' AND (hrm_sales_hq_temp.EmployeeID=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R1=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R2=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R3=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R4=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R5=".$_REQUEST['mainv'].") AND hrm_sales_sal_details_".$_REQUEST['y'].".ProductId=".$res['ProductId']." AND hrm_sales_sal_details_".$_REQUEST['y'].".YearId=".$_REQUEST['y'], $con); 
//(MY Sales Plan)
$sqlB1=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sqlB2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sqlB3=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area where AreaRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sqlB4=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region where RegionRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sqlB5=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone where ZoneRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con);

$resA=mysql_fetch_assoc($sqlA); $resB1=mysql_fetch_assoc($sqlB1); $resB2=mysql_fetch_assoc($sqlB2); $resB3=mysql_fetch_assoc($sqlB3);
$resB4=mysql_fetch_assoc($sqlB4); $resB5=mysql_fetch_assoc($sqlB5);

$sqlR=mysql_query("select * from hrm_sales_revised_values where EmployeeID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con);  
$resR=mysql_fetch_assoc($sqlR);

if($_REQUEST['q']==1){$tr1=$resA['sM1']; $tr2=$resA['sM2']; $tr3=$resA['sM3']; $trR1=$resR['M1']; $trR2=$resR['M2']; $trR3=$resR['M3']; 
$TotQ=$resA['sM1']+$resA['sM2']+$resA['sM3']; $TotRQ=$resR['M1']+$resR['M2']+$resR['M3']; $MyTot=$resB1['Qa']+$resB2['Qa']+$resB3['Qa']+$resB4['Qa']+$resB5['Qa'];  }
elseif($_REQUEST['q']==2){$tr1=$resA['sM4']; $tr2=$resA['sM5']; $tr3=$resA['sM6']; $trR1=$resR['M4']; $trR2=$resR['M5']; $trR3=$resR['M6']; 
$TotQ=$resA['sM4']+$resA['sM5']+$resA['sM6']; $TotRQ=$resR['M4']+$resR['M5']+$resR['M6']; $MyTot=$resB1['Qb']+$resB2['Qb']+$resB3['Qb']+$resB4['Qb']+$resB5['Qb']; }
elseif($_REQUEST['q']==3){$tr1=$resA['sM7']; $tr2=$resA['sM8']; $tr3=$resA['sM9']; $trR1=$resR['M7']; $trR2=$resR['M8']; $trR3=$resR['M9'];
$TotQ=$resA['sM7']+$resA['sM8']+$resA['sM9']; $TotRQ=$resR['M7']+$resR['M8']+$resR['M9']; $MyTot=$resB1['Qc']+$resB2['Qc']+$resB3['Qc']+$resB4['Qc']+$resB5['Qc']; }
elseif($_REQUEST['q']==4){$tr1=$resA['sM10']; $tr2=$resA['sM11']; $tr3=$resA['sM12']; $trR1=$resR['M10']; $trR2=$resR['M11']; $trR3=$resR['M12'];
$TotQ=$resA['sM10']+$resA['sM11']+$resA['sM12']; $TotRQ=$resR['M10']+$resR['M11']+$resR['M12']; $MyTot=$resB1['Qd']+$resB2['Qd']+$resB3['Qd']+$resB4['Qd']+$resB5['Qd']; }

}
if($tr1!=0 OR $tr2!=0 OR $tr3!=0 OR $MyTot!=0){ ?>	
  <tr style="height:22px;font-size:12px;" id="TR<?php echo $Sn; ?>">  
   <td bgcolor="#FFFFFF" style="font-size:12px;"><?php echo $res['ItemName']; ?></td>		 
   <td bgcolor="#FFFFFF" style="font-size:12px;"><?php echo $res['ProductName']; ?><input type="hidden" id="P_<?php echo $Sn; ?>" value="<?php echo $res['ProductId']; ?>" /></td>
   <td bgcolor="#FFFFFF" align="center" style="font-size:12px;"><?php echo substr_replace($res['TypeName'], '', 2); ?></td>	
   <td align="center" valign="middle" bgcolor="#FFFFFF">
   <?php if($rowEQq>0){ ?>
   <img src="images/edit.png" border="0" alt="Edit" id="EditBtn_<?php echo $Sn.'_'.$res['ProductId']; ?>" onClick="editD(<?php echo $Sn.', '.$_REQUEST['q'].', '.$res['ProductId']; ?>)" style="display:block;"><img src="images/Floppy-Small-icon.png" border="0" alt="Save" id="SaveBtn_<?php echo $Sn.'_'.$res['ProductId']; ?>" onClick="saveD(<?php echo $Sn.','.$_REQUEST['q'].','.$res['ProductId'].','.$_REQUEST['y'].','.$EmployeeId.','.$_REQUEST['crop'].','.$_REQUEST['ii']; ?>)" style="display:none;">
   <?php } ?>
   </td>		 							 					
   <td align="right" bgcolor="#D7EBFF"><?php if($tr1!='' AND $tr1!=0){echo floatval($tr1);}else{echo '&nbsp;';} ?></td>
   <td align="right" bgcolor="#D7EBFF"><?php if($tr2!='' AND $tr2!=0){echo floatval($tr2);}else{echo '&nbsp;';} ?></td>
   <td align="right" bgcolor="#D7EBFF"><?php if($tr3!='' AND $tr3!=0){echo floatval($tr3);}else{echo '&nbsp;';} ?></td>
   <td align="right" bgcolor="#B3D9FF"><?php if($TotQ!='' AND $TotQ!=0){echo floatval($TotQ);}else{echo '&nbsp;';} ?></td>
   <?php /*
   <td align="right" bgcolor="#FFFFD5"><?php if($MyTot!='' AND $MyTot!=0){echo floatval($MyTot);}else{echo '&nbsp;';} ?></td>
   */ ?>
   <td align="right"><input class="Input" id="RQ1<?php echo $Sn.'_'.$res['ProductId']; ?>" value="<?php if($trR1!=0){echo floatval($trR1);}?>" readonly/></td>
   <td align="right"><input class="Input" id="RQ2<?php echo $Sn.'_'.$res['ProductId']; ?>" value="<?php if($trR2!=0){echo floatval($trR2);}?>" readonly/></td>
   <td align="right"><input class="Input" id="RQ3<?php echo $Sn.'_'.$res['ProductId']; ?>" value="<?php if($trR3!=0){echo floatval($trR3);}?>" readonly/></td>
   <td align="right"><input class="Input" id="RQ4<?php echo $Sn.'_'.$res['ProductId']; ?>" value="<?php if($TotRQ!=0){echo floatval($TotRQ);}?>" readonly/></td>
  </tr>	
<?php } $Sn++; }  ?>    
<?php 
if($_REQUEST['findV']=='ZZ')
{
 if($_REQUEST['ii']>0)
 {
 //(Actual)
 $sqlAt=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$_REQUEST['y'].".ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$_REQUEST['y'].".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId INNER JOIN hrm_sales_reporting_level ON hrm_sales_hq_temp.EmployeeID=hrm_sales_reporting_level.EmployeeID where HqTEmpStatus='A' AND (hrm_sales_hq_temp.EmployeeID=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R1=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R2=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R3=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R4=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R5=".$_REQUEST['mainv'].") AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details_".$_REQUEST['y'].".YearId=".$_REQUEST['y'], $con); 
 //(MY Sales Plan)
 $sqlB1t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_terr.ProductId=hrm_sales_seedsproduct.ProductId where TerrRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND YearId=".$_REQUEST['y'], $con); $sqlB2t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_hq.ProductId=hrm_sales_seedsproduct.ProductId where HqRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND YearId=".$_REQUEST['y'], $con); $sqlB3t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_area.ProductId=hrm_sales_seedsproduct.ProductId where AreaRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND YearId=".$_REQUEST['y'], $con); $sqlB4t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_region.ProductId=hrm_sales_seedsproduct.ProductId where RegionRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND YearId=".$_REQUEST['y'], $con); $sqlB5t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_zone.ProductId=hrm_sales_seedsproduct.ProductId where ZoneRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND YearId=".$_REQUEST['y'], $con);  
 $sqlRt=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_revised_values INNER JOIN hrm_sales_seedsproduct ON hrm_sales_revised_values.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND EmployeeID=".$_REQUEST['mainv']." AND YearId=".$_REQUEST['y'], $con);
 }
 else 
 { 
  if($_REQUEST['crop']==1 OR $_REQUEST['crop']==2)
  { 
   //(Actual)
   $sqlAt=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$_REQUEST['y'].".ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$_REQUEST['y'].".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId INNER JOIN hrm_sales_reporting_level ON hrm_sales_hq_temp.EmployeeID=hrm_sales_reporting_level.EmployeeID where HqTEmpStatus='A' AND (hrm_sales_hq_temp.EmployeeID=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R1=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R2=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R3=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R4=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R5=".$_REQUEST['mainv'].") AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND hrm_sales_sal_details_".$_REQUEST['y'].".YearId=".$_REQUEST['y'], $con); 
   //(MY Sales Plan)
   $sqlB1t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_terr.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where TerrRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$_REQUEST['y'], $con); $sqlB2t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_hq.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where HqRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$_REQUEST['y'], $con); $sqlB3t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_area.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where AreaRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$_REQUEST['y'], $con); $sqlB4t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_region.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where RegionRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$_REQUEST['y'], $con); $sqlB5t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_zone.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where ZoneRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$_REQUEST['y'], $con);
   $sqlRt=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_revised_values INNER JOIN hrm_sales_seedsproduct ON hrm_sales_revised_values.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND EmployeeID=".$_REQUEST['mainv']." AND YearId=".$_REQUEST['y'], $con);
  }
  if($_REQUEST['crop']==3)
  { 
   //(Actual)
   $sqlAt=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$_REQUEST['y'].".ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$_REQUEST['y'].".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId INNER JOIN hrm_sales_reporting_level ON hrm_sales_hq_temp.EmployeeID=hrm_sales_reporting_level.EmployeeID where HqTEmpStatus='A' AND (hrm_sales_hq_temp.EmployeeID=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R1=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R2=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R3=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R4=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R5=".$_REQUEST['mainv'].") AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_sal_details_".$_REQUEST['y'].".YearId=".$_REQUEST['y'], $con); 
   //(MY Sales Plan)
   $sqlB1t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_terr.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where TerrRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND YearId=".$_REQUEST['y'], $con); $sqlB2t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_hq.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where HqRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND YearId=".$_REQUEST['y'], $con); $sqlB3t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_area.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where AreaRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND YearId=".$_REQUEST['y'], $con); $sqlB4t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_region.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where RegionRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND YearId=".$_REQUEST['y'], $con); $sqlB5t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_zone.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where ZoneRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND YearId=".$_REQUEST['y'], $con); 
   $sqlRt=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_revised_values INNER JOIN hrm_sales_seedsproduct ON hrm_sales_revised_values.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where EmployeeID=".$_REQUEST['mainv']." AND YearId=".$_REQUEST['y'], $con);
  }
 }

$resAt=mysql_fetch_assoc($sqlAt); $resB1t=mysql_fetch_assoc($sqlB1t); $resB2t=mysql_fetch_assoc($sqlB2t); $resB3t=mysql_fetch_assoc($sqlB3t); 
$resB4t=mysql_fetch_assoc($sqlB4t); $resB5t=mysql_fetch_assoc($sqlB5t); $resRt=mysql_fetch_assoc($sqlRt);
if($_REQUEST['q']==1){$trt1=$resAt['sM1']; $trt2=$resAt['sM2']; $trt3=$resAt['sM3']; $trRt1=$resRt['sM1']; $trRt2=$resRt['sM2']; $trRt3=$resRt['sM3']; 
$TQt=$resAt['sM1']+$resAt['sM2']+$resAt['sM3']; $TQRt=$resRt['sM1']+$resRt['sM2']+$resRt['sM3']; $MyTt=$resB1t['Qa']+$resB2t['Qa']+$resB3t['Qa']+$resB4t['Qa']+$resB5t['Qa'];}
elseif($_REQUEST['q']==2){$trt1=$resAt['sM4']; $trt2=$resAt['sM5']; $trt3=$resAt['sM6']; $trRt1=$resRt['sM4']; $trRt2=$resRt['sM5']; $trRt3=$resRt['sM6'];
$TQt=$resAt['sM4']+$resAt['sM5']+$resAt['sM6']; $TQRt=$resRt['sM4']+$resRt['sM5']+$resRt['sM6']; $MyTt=$resB1t['Qb']+$resB2t['Qb']+$resB3t['Qb']+$resB4t['Qb']+$resB5t['Qb'];}
elseif($_REQUEST['q']==3){$trt1=$resAt['sM7']; $trt2=$resAt['sM8']; $trt3=$resAt['sM9']; $trRt1=$resRt['sM7']; $trRt2=$resRt['sM8']; $trRt3=$resRt['sM9']; 
$TQt=$resAt['sM7']+$resAt['sM8']+$resAt['sM9']; $TQRt=$resRt['sM7']+$resRt['sM8']+$resRt['sM9']; $MyTt=$resB1t['Qc']+$resB2t['Qc']+$resB3t['Qc']+$resB4t['Qc']+$resB5t['Qc'];}
elseif($_REQUEST['q']==4){$trt1=$resAt['sM10']; $trt2=$resAt['sM11']; $trt3=$resAt['sM12']; $trRt1=$resRt['sM10']; $trRt2=$resRt['sM11']; $trRt3=$resRt['sM12'];
$TQt=$resAt['sM10']+$resAt['sM11']+$resAt['sM12']; $TQRt=$resRt['sM10']+$resRt['sM11']+$resRt['sM12']; $MyTt=$resB1t['Qd']+$resB2t['Qd']+$resB3t['Qd']+$resB4t['Qd']+$resB5t['Qd'];}

}

?>
   <tr style="font-size:12px;color:#000000;height:22px;">
	<td colspan="4" align="right" style="font-size:14px;background-color:#FFFFA6;"><b>TOTAL:&nbsp;</b></td>
    <td align="right" bgcolor="#D7EBFF"><b><?php if($trt1!='' AND $trt1!=0){echo floatval($trt1);}else{echo '&nbsp;';} ?></b></td>
    <td align="right" bgcolor="#D7EBFF"><b><?php if($trt2!='' AND $trt2!=0){echo floatval($trt2);}else{echo '&nbsp;';} ?></b></td>
    <td align="right" bgcolor="#D7EBFF"><b><?php if($trt3!='' AND $trt3!=0){echo floatval($trt3);}else{echo '&nbsp;';} ?></b></td>
    <td align="right" bgcolor="#B3D9FF"><b><?php if($TQt!='' AND $TQt!=0){echo floatval($TQt);}else{echo '&nbsp;';} ?></b></td>
	<?php /*
    <td align="right" bgcolor="#FFFFD5"><b><?php if($MyTt!='' AND $MyTt!=0){echo floatval($MyTt);}else{echo '&nbsp;';} ?></b></td>
    */ ?>
    <td align="right"><input class="InputB" id="RQ1t" value="<?php if($trRt1!=0){echo floatval($trRt1);}?>" readonly/></td>
    <td align="right"><input class="InputB" id="RQ2t" value="<?php if($trRt2!=0){echo floatval($trRt2);}?>" readonly/></td>
    <td align="right"><input class="InputB" id="RQ3t" value="<?php if($trRt3!=0){echo floatval($trRt3);}?>" readonly/></td>
    <td align="right"><input class="InputB" id="RQ4t" value="<?php if($TQRt!=0){echo floatval($TQRt);}?>" readonly/></td>
   </tr>	 
<?php /********************** Overall Total Close ****************************/ ?>
</table>	     
 </td>
</tr>
  </table>
</td>

</tr>
<tr><td>&nbsp;</td></tr>
<?php } ?>
<?php /***************************************** Main Page Close **************************************/ ?>   
	 </table>
   </td>
  </tr>
<?php //*************************************************************** Close ******************************************************************************** ?>
<tr>
 <td id="TDResultId" style="width:3000px;">
  <span id="ResultTDSpan"></span>
  <span id="AddMonthResult"></span>
  <span id="SubSpanMsg"></span>
 </td>
</tr>						
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

