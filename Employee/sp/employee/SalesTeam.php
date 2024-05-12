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
.InputB{font-size:13px;width:65px;text-align:right;border:0px;font-weight:bold;background-color:#D9D9FF;} 
.Input{font-size:13px;width:60px;text-align:right;border:0px;background-color:#EEEEEE;}
.TInput{font-size:13px;width:60px;text-align:right;border:0px;background-color:#FFFFA6;font-weight:bold;}
.Trh60{text-align:center;width:60px;font-weight:bold;}
</style>
<Script type="text/javascript">//window.history.forward(1);</Script> 
<script type="text/javascript" language="javascript">
function ChangeTeam(hq,v,gv)
{
  var act=document.getElementById("act").value; 
  var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; var ii=document.getElementById("ii").value; 
  var fc=document.getElementById("fc").value; var vc=document.getElementById("vc").value;
  var myh=document.getElementById("myh").value; var myt=1;
  window.location="SaleshEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+v+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+'&EHq='+EHq+'&myh='+myh+'&myt='+myt; 
  
}

function ChangePerMi(hq,v)
{
  var act=document.getElementById("act").value; //var hq=document.getElementById("hq").value; 
  var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; var ii=document.getElementById("ii").value; 
  var fc=document.getElementById("fc").value; var vc=document.getElementById("vc").value;
  var myh=document.getElementById("myh").value; var myt=1;
  window.location="SaleshEntryPerMi.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+v+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+'&EHq='+EHq+'&myh='+myh+'&myt='+myt; 
}

function ChangeTT(v)  //+'&crop=0'
{  
   var y=document.getElementById("YearV").value; var crp=document.getElementById("CropV").value;
   if(crp==0){alert("Please Select Crop Value"); return false; }
   else{ var act=document.getElementById("act").value; var q=document.getElementById("q").value; var cc=document.getElementById("cc").value;  
   var di=document.getElementById("di").value; var di=document.getElementById("di").value; var gi=document.getElementById("gi").value; 
   var EHq=document.getElementById("EHq").value; var ii=document.getElementById("ii").value; var fc=document.getElementById("fc").value; 
   var vc=document.getElementById("vc").value; var myh=document.getElementById("myh").value; var myt=document.getElementById("myh").value;
   var hq=document.getElementById("hq").value;
   window.location="SalesTeam.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+'&EHq='+EHq+'&myh='+myh+'&myt='+myt+'&mainv='+v+'&crop='+crp+'&findV=TT'; }
}
function ChangeAR(v)
{
   var y=document.getElementById("YearV").value; var crp=document.getElementById("CropV").value;
   if(crp==0){alert("Please Select Crop Value"); return false; }
   else{ var act=document.getElementById("act").value; var q=document.getElementById("q").value; var cc=document.getElementById("cc").value;  
   var di=document.getElementById("di").value; var di=document.getElementById("di").value; var gi=document.getElementById("gi").value; 
   var EHq=document.getElementById("EHq").value; var ii=document.getElementById("ii").value; var fc=document.getElementById("fc").value; 
   var vc=document.getElementById("vc").value; var myh=document.getElementById("myh").value; var myt=document.getElementById("myh").value;
   var hq=document.getElementById("hq").value;
   window.location="SalesTeam.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+'&EHq='+EHq+'&myh='+myh+'&myt='+myt+'&mainv='+v+'&crop='+crp+'&findV=AR'; } 
}
function ChangeZZ(v)
{
   var y=document.getElementById("YearV").value; var crp=document.getElementById("CropV").value;
   if(crp==0){alert("Please Select Crop Value"); return false; }
   else{ var act=document.getElementById("act").value; var q=document.getElementById("q").value; var cc=document.getElementById("cc").value;  
   var di=document.getElementById("di").value; var di=document.getElementById("di").value; var gi=document.getElementById("gi").value; 
   var EHq=document.getElementById("EHq").value; var ii=document.getElementById("ii").value; var fc=document.getElementById("fc").value; 
   var vc=document.getElementById("vc").value; var myh=document.getElementById("myh").value; var myt=document.getElementById("myh").value;
   var hq=document.getElementById("hq").value;
   window.location="SalesTeam.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+'&EHq='+EHq+'&myh='+myh+'&myt='+myt+'&mainv='+v+'&crop='+crp+'&findV=ZZ'; }
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
     <table border="0">
	  <tr>
	   <td>
	    <table border="0">
		 <tr>	 
<td align="center"><img src="images/PlannerH.png" border="0" style="height:40px;width:150px;"/></td>
<?php if($_REQUEST['act']>0){ ?>
<td>&nbsp;</td><td align="center" valign="bottom">
<a href="#" onClick="ChangeTeam(<?php echo $_REQUEST['hq'].', '.$_REQUEST['y']; ?>,'<?php echo $resSpEG['GradeValue']; ?>')"><img src="images/Myteam.png" border="0" style="height:30px;width:130px;" /></a>
</td>
<td>&nbsp;</td><td align="center" valign="bottom">
<a href="#" onClick="ChangePerMi(<?php echo $_REQUEST['hq'].', '.$_REQUEST['y']; ?>)"><img src="images/Permission.png" border="0" style="height:30px;width:130px;" /></a>
</td>
<?php } ?>
<?php if($resSpEG['GradeValue']=='MG'){ ?>
<td>&nbsp;</td>
<td align="center" valign="bottom">
<a href="#"><img src="images/SalesTeam_1.png" border="0" style="height:30px;width:130px;" /></a>
</td>
<?php } ?>
<td>&nbsp;</td>
   </tr>
 </table>
	   </td>
	  </tr>
<?php //Row 2 // OPEN ?>	  
<tr> 
<td>
 <table>
  <tr>
   <td>
    <select style="font-family:Georgia;font-size:15px;width:px;background-color:#E4E0FC;height:23px;width:150px;" id="YearV" onChange="ChangeYear(this.value)">
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate'])); 
	  $NextYear=$_REQUEST['y']+1; $PrevYear=$_REQUEST['y']-1; 
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>		
 <option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo 'Year-'.$fromdate.'-'.$todate; ?></option>
 <?php if($PrevYear>=1){?><option value="<?php echo $PrevYear; ?>"><?php echo date("Y",strtotime($resy3['FromDate'])).'-'.date("Y",strtotime($resy3['ToDate'])); ?></option><?php } ?>
 <option value="<?php echo $NextYear; ?>"><?php echo date("Y",strtotime($resy2['FromDate'])).'-'.date("Y",strtotime($resy2['ToDate'])); ?></option></select>
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
     <select style="font-family:Georgia;font-size:14px;width:px;background-color:#E4E0FC;height:23px;width:210px;" onChange="ChangeTT(this.value)">
	  <option>Select Territory Employee</option>
<?php $sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,CostCenter,HqId,Gender,Married,DR,hrm_grade.GradeId from hrm_grade INNER JOIN hrm_employee_general ON hrm_grade.GradeId=hrm_employee_general.GradeId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND (hrm_grade.GradeValue='S1' OR hrm_grade.GradeValue='S2' OR hrm_grade.GradeValue='J1' OR hrm_grade.GradeValue='J2' OR hrm_grade.GradeValue='J3' OR hrm_grade.GradeValue='j4' OR hrm_grade.GradeValue='M1') AND hrm_employee_general.DepartmentId=6 order by Fname ASC", $con); 
$sn=1; while($res=mysql_fetch_array($sql)){  if($res['DR']=='Y'){$M='Dr.';} elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';} $NameT=$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];
//$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlHq = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$res['HqId'], $con) or die(mysql_error()); $resHq = mysql_fetch_assoc($sqlHq); 
$sqlSt=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resSt=mysql_fetch_assoc($sqlSt);
?>  	  
      <option value="<?php echo $res['EmployeeID']; ?>"><?php echo $NameT.'/ '.$resHq['HqName'].'&nbsp;('.$resSt['StateName'].')'; ?></option>
<?php } ?>	  
	 </select>
   </td>
   <td></td>
    <td>
     <select style="font-family:Georgia;font-size:14px;width:px;background-color:#E4E0FC;height:23px;width:240px;" onChange="ChangeAR(this.value)">
	  <option>Select Area/Region Employee</option>
<?php $sql2=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,CostCenter,HqId,Gender,Married,DR,hrm_grade.GradeId from hrm_grade INNER JOIN hrm_employee_general ON hrm_grade.GradeId=hrm_employee_general.GradeId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND (hrm_grade.GradeValue='M2' OR hrm_grade.GradeValue='M3' OR hrm_grade.GradeValue='M4' OR hrm_grade.GradeValue='M5') AND hrm_employee_general.DepartmentId=6 order by Fname ASC", $con); 
$sn2=1; while($res2=mysql_fetch_array($sql2)){  if($res2['DR']=='Y'){$M2='Dr.';} elseif($res2['Gender']=='M'){$M2='Mr.';} elseif($res2['Gender']=='F' AND $res2['Married']=='Y'){$M2='Mrs.';} elseif($res2['Gender']=='F' AND $res2['Married']=='N'){$M2='Miss.';} $NameAR=$res2['Fname'].' '.$res2['Sname'].' '.$res2['Lname'];
//$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlHq2 = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$res2['HqId'], $con) or die(mysql_error()); $resHq2 = mysql_fetch_assoc($sqlHq2); 
$sqlSt2=mysql_query("select StateName from hrm_state where StateId=".$res2['CostCenter'], $con); $resSt2=mysql_fetch_assoc($sqlSt2);
?>  	  
      <option value="<?php echo $res2['EmployeeID']; ?>"><?php echo $NameAR.'/ '.$resHq2['HqName'].'&nbsp;('.$resSt2['StateName'].')'; ?></option>
<?php } ?>	  	  
	 </select>
   </td>
   <td></td>
   <td>
     <select style="font-family:Georgia;font-size:14px;width:px;background-color:#E4E0FC;height:23px;width:190px;" onChange="ChangeZZ(this.value)">
	  <option>Select Zone Employee</option>
<?php $sql3=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,CostCenter,HqId,Gender,Married,DR,hrm_grade.GradeId from hrm_grade INNER JOIN hrm_employee_general ON hrm_grade.GradeId=hrm_employee_general.GradeId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND (hrm_grade.GradeValue='L1' OR hrm_grade.GradeValue='L2' OR hrm_grade.GradeValue='L3' OR hrm_grade.GradeValue='L4') AND hrm_employee_general.DepartmentId=6 order by Fname ASC", $con); 
$sn3=1; while($res3=mysql_fetch_array($sql3)){  if($res3['DR']=='Y'){$M3='Dr.';} elseif($res3['Gender']=='M'){$M3='Mr.';} elseif($res3['Gender']=='F' AND $res3['Married']=='Y'){$M3='Mrs.';} elseif($res3['Gender']=='F' AND $res3['Married']=='N'){$M3='Miss.';} $NameZ=$res3['Fname'].' '.$res3['Sname'].' '.$res3['Lname'];
//$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlHq3 = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$res3['HqId'], $con) or die(mysql_error()); $resHq3 = mysql_fetch_assoc($sqlHq3); 
$sqlSt3=mysql_query("select StateName from hrm_state where StateId=".$res3['CostCenter'], $con); $resSt3=mysql_fetch_assoc($sqlSt3);
?>  	  
      <option value="<?php echo $res3['EmployeeID']; ?>"><?php echo $NameZ.'/ <font color="#FFFFFF">'.$resHq3['HqName'].'</font>&nbsp;('.$resSt3['StateName'].')'; ?></option>
<?php } ?>	  		  
	 </select>
   </td>
   <td></td>
   <td></td>
   <td></td>
  </tr>
 </table>
</td>
</tr>
<?php //Row 2 Close // ?>	  
<tr><td><span id="DealerHqSpan"></span></td></tr>
  </table>
 </td>
</tr>
<?php /***************************************** Main Page Open **************************************/ ?>
<?php if($_REQUEST['findV']=='TT' OR $_REQUEST['findV']=='AR' OR $_REQUEST['findV']=='ZZ'){ ?>
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
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:1300px;">	
  <tr>
  <td colspan="3" align="center" style="height:25px;background-color:#005300;font-family:Times New Roman;font-size:16px;color:#FFFF20;font-weight:bold;">  
  <font color="#D7EBFF">Crop:</font>&nbsp;<?php echo $ItemN; ?></td>
  <td colspan="18" style="height:25px;background-color:#005300;font-family:Times New Roman;font-size:16px;color:#FFFF20;font-weight:bold;" id="TD">
   &nbsp;<font color="#D7EBFF">Name:&nbsp;</font><?php echo $NameE; ?>&nbsp;&nbsp;&nbsp;<font color="#D7EBFF">Desig:&nbsp;</font><?php echo $resDesigE['DesigName']; ?>&nbsp;&nbsp;&nbsp;<font color="#D7EBFF">HQ:&nbsp;</font><?php echo $resHqE['HqName']; ?>&nbsp;
   &nbsp;<font color="#D7EBFF">Year:&nbsp;</font><?php echo $fromdate.'-'.$todate; ?>
   </td>
  </tr>
  <tr style="background-color:#D5F1D1;color:#000000;">
    <td colspan="3" align="center" style="font-size:16px;color:#FFFFFF;background-color:#183E83;"><b>&nbsp;</b> </td>
    <td colspan="3" align="center"><b>Quarter 1</b></td><td colspan="3" align="center"><b>Quarter 2</b></td>
    <td colspan="3" align="center"><b>Quarter 3</b></td><td colspan="3" align="center"><b>Quarter 4</b></td>
    <td colspan="3" align="center" style="background-color:#D9D9FF;"><b>TOTAL</b></td>
    <?php /*<td colspan="3" align="center" style="background-color:#D7FFAE;"><b>REPORTING TOTAL</b></td> */ ?>
  </tr>	
   <tr style="background-color:#D5F1D1;color:#000000;">
    <td align="center" style="width:150px;"><b>CROP</b></td>
	<td align="center" style="width:250px;"><b>VARIETY</b></td>
	<td align="center" style="width:50px;"><b>&nbsp;TYPE&nbsp;</b></td>
	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
<?php /*<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>*/ ?>
</tr>	
<?php if($_REQUEST['crop']==1 OR $_REQUEST['crop']==2){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." order by ItemName ASC, ProductName ASC, TypeName ASC", $con); }
elseif($_REQUEST['crop']==3){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId order by ItemName ASC, ProductName ASC, TypeName ASC", $con); } $Sn=1; while($res=mysql_fetch_array($sql)){

if($_REQUEST['findV']=='TT'){ 
$sqlRpt=mysql_query("select hrm_employee_general.EmployeeID from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where DepartmentId=6 AND hrm_employee.EmpStatus='A' AND RepEmployeeID=".$_REQUEST['mainv'], $con); $rowRpt=mysql_num_rows($sqlRpt);
//
if($rowRpt>0){ 
$sqlP1=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$BeforeYId.".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId INNER JOIN hrm_sales_reporting_level ON hrm_sales_hq_temp.EmployeeID=hrm_sales_reporting_level.EmployeeID where HqTEmpStatus='A' AND (hrm_sales_hq_temp.EmployeeID=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R1=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R2=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R3=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R4=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R5=".$_REQUEST['mainv'].") AND hrm_sales_sal_details_".$BeforeYId.".ProductId=".$res['ProductId']." AND hrm_sales_sal_details_".$BeforeYId.".YearId=".$BeforeYId, $con); $resP1=mysql_fetch_assoc($sqlP1);
$sql4ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sql5ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); $res4ta=mysql_fetch_assoc($sql4ta); $res5ta=mysql_fetch_assoc($sql5ta);
$sql4tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sql5tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); $res4tb=mysql_fetch_assoc($sql4tb); $res5tb=mysql_fetch_assoc($sql5tb);
$Pp1=$resP1['sM1']+$resP1['sM2']+$resP1['sM3']; $Pp2=$resP1['sM4']+$resP1['sM5']+$resP1['sM6'];
$Pp3=$resP1['sM7']+$resP1['sM8']+$resP1['sM9']; $Pp4=$resP1['sM10']+$resP1['sM11']+$resP1['sM12'];
$TotP2a=$res4ta['Qa']+$res4tb['Qa']; $TotP2b=$res4ta['Qb']+$res4tb['Qb']; 
$TotP2c=$res4ta['Qc']+$res4tb['Qc']; $TotP2d=$res4ta['Qd']+$res4tb['Qd'];
$TotP3a=$res5ta['Qa']+$res5tb['Qa']; $TotP3b=$res5ta['Qb']+$res5tb['Qb']; 
$TotP3c=$res5ta['Qc']+$res5tb['Qc']; $TotP3d=$res5ta['Qd']+$res5tb['Qd'];
} 
elseif($rowRpt==0){ 
$sqlP1=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$BeforeYId.".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId where HqTEmpStatus='A' AND hrm_sales_hq_temp.EmployeeID=".$_REQUEST['mainv']." AND hrm_sales_sal_details_".$BeforeYId.".ProductId=".$res['ProductId']." AND hrm_sales_sal_details_".$BeforeYId.".YearId=".$BeforeYId, $con); 
$resP1=mysql_fetch_assoc($sqlP1);
$sql4ta=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$AfterYId." INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$AfterYId.".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId where HqTEmpStatus='A' AND hrm_sales_hq_temp.EmployeeID=".$_REQUEST['mainv']." AND hrm_sales_sal_details_".$AfterYId.".ProductId=".$res['ProductId']." AND hrm_sales_sal_details_".$AfterYId.".YearId=".$_REQUEST['y'], $con); $sql5ta=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$AfterYId." INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$AfterYId.".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId where HqTEmpStatus='A' AND hrm_sales_hq_temp.EmployeeID=".$_REQUEST['mainv']." AND hrm_sales_sal_details_".$AfterYId.".ProductId=".$res['ProductId']." AND hrm_sales_sal_details_".$AfterYId.".YearId=".$AfterYId, $con); 
$res4ta=mysql_fetch_assoc($sql4ta); $res5ta=mysql_fetch_assoc($sql5ta);
$Pp1=$resP1['sM1']+$resP1['sM2']+$resP1['sM3']; $Pp2=$resP1['sM4']+$resP1['sM5']+$resP1['sM6'];
$Pp3=$resP1['sM7']+$resP1['sM8']+$resP1['sM9']; $Pp4=$resP1['sM10']+$resP1['sM11']+$resP1['sM12'];
$TotP2a=$res4ta['sM1']+$res4ta['sM2']+$res4ta['sM3']; $TotP2b=$res4ta['sM4']+$res4ta['sM5']+$res4ta['sM6'];
$TotP2c=$res4ta['sM7']+$res4ta['sM8']+$res4ta['sM9']; $TotP2d=$res4ta['sM10']+$res4ta['sM11']+$res4ta['sM12'];
$TotP3a=$res5ta['sM1']+$res5ta['sM2']+$res5ta['sM3']; $TotP3b=$res5ta['sM4']+$res5ta['sM5']+$res5ta['sM6'];
$TotP3c=$res5ta['sM7']+$res5ta['sM8']+$res5ta['sM9']; $TotP3d=$res5ta['sM10']+$res5ta['sM11']+$res5ta['sM12'];
}
//
}elseif($_REQUEST['findV']=='AR'){
$sqlP1=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$BeforeYId.".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId INNER JOIN hrm_sales_reporting_level ON hrm_sales_hq_temp.EmployeeID=hrm_sales_reporting_level.EmployeeID where HqTEmpStatus='A' AND (hrm_sales_hq_temp.EmployeeID=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R2=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R3=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R4=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R5=".$_REQUEST['mainv'].") AND hrm_sales_sal_details_".$BeforeYId.".ProductId=".$res['ProductId']." AND hrm_sales_sal_details_".$BeforeYId.".YearId=".$BeforeYId, $con); $resP1=mysql_fetch_assoc($sqlP1);
$Pp1=$resP1['sM1']+$resP1['sM2']+$resP1['sM3']; $Pp2=$resP1['sM4']+$resP1['sM5']+$resP1['sM6'];
$Pp3=$resP1['sM7']+$resP1['sM8']+$resP1['sM9']; $Pp4=$resP1['sM10']+$resP1['sM11']+$resP1['sM12'];

$sqlP2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_".$AfterYId."_terr where TerrRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sqlP3=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_".$AfterYId."_terr where TerrRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); $resP2=mysql_fetch_assoc($sqlP2); $resP3=mysql_fetch_assoc($sqlP3);
$sqlP2a=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_".$AfterYId."_hq where HqRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sqlP3a=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_".$AfterYId."_hq where HqRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); $resP2a=mysql_fetch_assoc($sqlP2a); $resP3a=mysql_fetch_assoc($sqlP3a); 
$sqlP2b=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_".$AfterYId."_area where AreaRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sqlP3b=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_".$AfterYId."_area where AreaRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); $resP2b=mysql_fetch_assoc($sqlP2b); $resP3b=mysql_fetch_assoc($sqlP3b);
$TotP2a=$resP2['Qa']+$resP2a['Qa']+$resP2b['Qa']; $TotP2b=$resP2['Qb']+$resP2a['Qb']+$resP2b['Qb']; 
$TotP2c=$resP2['Qc']+$resP2a['Qc']+$resP2b['Qc']; $TotP2d=$resP2['Qd']+$resP2a['Qd']+$resP2b['Qd'];
$TotP3a=$resP3['Qa']+$resP3a['Qa']+$resP3b['Qa']; $TotP3b=$resP3['Qb']+$resP3a['Qb']+$resP3b['Qb']; 
$TotP3c=$resP3['Qc']+$resP3a['Qc']+$resP3b['Qc']; $TotP3d=$resP3['Qd']+$resP3a['Qd']+$resP3b['Qd'];

}elseif($_REQUEST['findV']=='ZZ'){
$sqlP1=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$AfterYId." INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$AfterYId.".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId INNER JOIN hrm_sales_reporting_level ON hrm_sales_hq_temp.EmployeeID=hrm_sales_reporting_level.EmployeeID where HqTEmpStatus='A' AND (hrm_sales_hq_temp.EmployeeID=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R1=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R2=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R3=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R4=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R5=".$_REQUEST['mainv'].") AND hrm_sales_sal_details_".$AfterYId.".ProductId=".$res['ProductId']." AND hrm_sales_sal_details_".$AfterYId.".YearId=".$BeforeYId, $con); $resP1=mysql_fetch_assoc($sqlP1);
$Pp1=$resP1['sM1']+$resP1['sM2']+$resP1['sM3']; $Pp2=$resP1['sM4']+$resP1['sM5']+$resP1['sM6'];
$Pp3=$resP1['sM7']+$resP1['sM8']+$resP1['sM9']; $Pp4=$resP1['sM10']+$resP1['sM11']+$resP1['sM12'];

$sqlP2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sqlP3=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); $resP2=mysql_fetch_assoc($sqlP2); $resP3=mysql_fetch_assoc($sqlP3);
$sqlP2a=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sqlP3a=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); $resP2a=mysql_fetch_assoc($sqlP2a); $resP3a=mysql_fetch_assoc($sqlP3a); 
$sqlP2b=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area where AreaRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sqlP3b=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area where AreaRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); $resP2b=mysql_fetch_assoc($sqlP2b); $resP3b=mysql_fetch_assoc($sqlP3b);
$sqlP2c=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region where RegionRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sqlP3c=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region where RegionRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); $resP2c=mysql_fetch_assoc($sqlP2c); $resP3c=mysql_fetch_assoc($sqlP3c);
$sqlP2d=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone where ZoneRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sqlP3d=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone where ZoneRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); $resP2d=mysql_fetch_assoc($sqlP2d); $resP3d=mysql_fetch_assoc($sqlP3d);

$TotP2a=$resP2['Qa']+$resP2a['Qa']+$resP2b['Qa']+$resP2c['Qa']+$resP2d['Qa']; $TotP2b=$resP2['Qb']+$resP2a['Qb']+$resP2b['Qb']+$resP2c['Qb']+$resP2d['Qb']; 
$TotP2c=$resP2['Qc']+$resP2a['Qc']+$resP2b['Qc']+$resP2c['Qc']+$resP2d['Qc']; $TotP2d=$resP2['Qd']+$resP2a['Qd']+$resP2b['Qd']+$resP2c['Qd']+$resP2d['Qd'];
$TotP3a=$resP3['Qa']+$resP3a['Qa']+$resP3b['Qa']+$resP3c['Qa']+$resP3d['Qa']; $TotP3b=$resP3['Qb']+$resP3a['Qb']+$resP3b['Qb']+$resP3c['Qb']+$resP3d['Qb']; 
$TotP3c=$resP3['Qc']+$resP3a['Qc']+$resP3b['Qc']+$resP3c['Qc']+$resP3d['Qc']; $TotP3d=$resP3['Qd']+$resP3a['Qd']+$resP3b['Qd']+$resP3c['Qd']+$resP3d['Qd'];

}

?>	

   <tr bgcolor="#EEEEEE" style="height:22px;">  
     <td bgcolor="#FFFFFF">&nbsp;<?php echo $res['ItemName']; ?></td>		 
	 <td bgcolor="#FFFFFF">&nbsp;<?php echo $res['ProductName']; ?><input type="hidden" id="P_<?php echo $Sn; ?>" value="<?php echo $res['ProductId']; ?>" /></td>
	 <td bgcolor="#FFFFFF" align="center">&nbsp;<?php echo substr_replace($res['TypeName'], '', 2); ?></td>			 							 					 	 
<td id="<?php echo 'TM1_A'.$Sn; ?>"><input class="Input" id="M1_A<?php echo $Sn; ?>" value="<?php if($Pp1!='' AND $Pp1!=0){echo $Pp1;} ?>" readonly/></td>
<td id="<?php echo 'TM1_B'.$Sn; ?>">
<input class="Input" id="M1_B<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($TotP2a!='' AND $TotP2a!=0){echo $TotP2a;} ?>" readonly/></td>
<td id="<?php echo 'TM1_C'.$Sn; ?>">
<input class="Input" id="M1_C<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($TotP3a!='' AND $TotP3a!=0){echo $TotP3a;} ?>" readonly/></td>

<td id="<?php echo 'TM2_A'.$Sn; ?>"><input class="Input" id="M2_A<?php echo $Sn; ?>" value="<?php if($Pp2!='' AND $Pp2!=0){echo $Pp2;} ?>" readonly/></td>
<td id="<?php echo 'TM2_B'.$Sn; ?>">
<input class="Input" id="M2_B<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($TotP2b!='' AND $TotP2b!=0){echo $TotP2b;} ?>" readonly/></td>
<td id="<?php echo 'TM2_C'.$Sn; ?>">
<input class="Input" id="M2_C<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($TotP3b!='' AND $TotP3b!=0){echo $TotP3b;} ?>" readonly/></td>

<td id="<?php echo 'TM3_A'.$Sn; ?>"><input class="Input" id="M3_A<?php echo $Sn; ?>" value="<?php if($Pp3!='' AND $Pp3!=0){echo $Pp3;} ?>" readonly/></td>
<td id="<?php echo 'TM3_B'.$Sn; ?>">
<input class="Input" id="M3_B<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($TotP2c!='' AND $TotP2c!=0){echo $TotP2c;} ?>" readonly/></td>
<td id="<?php echo 'TM3_C'.$Sn; ?>">
<input class="Input" id="M3_C<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($TotP3c!='' AND $TotP3c!=0){echo $TotP3c;} ?>" readonly/></td>

<td id="<?php echo 'TM3_A'.$Sn; ?>"><input class="Input" id="M4_A<?php echo $Sn; ?>" value="<?php if($Pp4!='' AND $Pp4!=0){echo $Pp4;} ?>" readonly/></td>
<td id="<?php echo 'TM3_B'.$Sn; ?>">
<input class="Input" id="M4_B<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($TotP2d!='' AND $TotP2d!=0){echo $TotP2d;} ?>" readonly/></td>
<td id="<?php echo 'TM3_C'.$Sn; ?>">
<input class="Input" id="M4_C<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($TotP3d!='' AND $TotP3d!=0){echo $TotP3d;} ?>" readonly/></td>

<?php $TotP1=$Pp1+$Pp2+$Pp3+$Pp4; $TotP2=$TotP2a+$TotP2b+$TotP2c+$TotP2d; $TotP3=$TotP3a+$TotP3b+$TotP3c+$TotP3d; ?> 
	 <td id="<?php echo 'TTotP1_'.$Sn; ?>"><input class="InputB" id="TotP1_<?php echo $Sn; ?>" value="<?php if($TotP1!=0 AND $TotP1!=''){echo $TotP1;}else{echo '';} ?>" readonly/></td>
	 <td id="<?php echo 'TTotP2_'.$Sn; ?>"><input class="InputB" id="TotP2_<?php echo $Sn; ?>" value="<?php if($TotP2!=0 AND $TotP2!=''){echo $TotP2;}else{echo '';} ?>" readonly/></td>
	 <td id="<?php echo 'TTotP3_'.$Sn; ?>"><input class="InputB" id="TotP3_<?php echo $Sn; ?>" value="<?php if($TotP3!=0 AND $TotP3!=''){echo $TotP3;}else{echo '';} ?>" readonly/></td>
<?php /*
$SsqlP1=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_terr where TerrEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$BeforeYId, $con); 
$SsqlP2=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_terr where TerrEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con);
$SsqlP3=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_terr where TerrEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
$SresP1=mysql_fetch_assoc($SsqlP1); $SresP2=mysql_fetch_assoc($SsqlP2); $SresP3=mysql_fetch_assoc($SsqlP3); 
$SToptP1=$SresP1['Q1']+$SresP1['Q2']+$SresP1['Q3']+$SresP1['Q4']; $SToptP2=$SresP2['Q1']+$SresP2['Q2']+$SresP2['Q3']+$SresP2['Q4']; 
$SToptP3=$SresP3['Q1']+$SresP3['Q2']+$SresP3['Q3']+$SresP3['Q4']; ?>
    <td style="width:70px;font-weight:bold;background-color:#D7FFAE;" align="right"><?php if($SToptP1!=0 AND $SToptP1!=''){echo $SToptP1;}else{echo '';} ?>&nbsp;</td>
	<td style="width:70px;font-weight:bold;background-color:#D7FFAE;" align="right"><?php if($SToptP2!=0 AND $SToptP2!=''){echo $SToptP2;}else{echo '';} ?>&nbsp;</td>
	<td style="width:70px;font-weight:bold;background-color:#D7FFAE;" align="right"><?php if($SToptP3!=0 AND $SToptP3!=''){echo $SToptP3;}else{echo '';} ?>&nbsp;</td>	
*/ ?>	 
	</tr>	
<?php $Sn++; }  ?>    
<?php  
if($_REQUEST['findV']=='TT'){
$sqlRpt=mysql_query("select hrm_employee_general.EmployeeID from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where DepartmentId=6 AND hrm_employee.EmpStatus='A' AND RepEmployeeID=".$_REQUEST['mainv'], $con); $rowRpt=mysql_num_rows($sqlRpt);
//
if($rowRpt>0){ 
if($_REQUEST['crop']==1 OR $_REQUEST['crop']==2){ $sqlP1t=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$BeforeYId.".ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$BeforeYId.".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId INNER JOIN hrm_sales_reporting_level ON hrm_sales_hq_temp.EmployeeID=hrm_sales_reporting_level.EmployeeID where HqTEmpStatus='A' AND (hrm_sales_hq_temp.EmployeeID=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R1=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R2=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R3=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R4=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R5=".$_REQUEST['mainv'].") AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND hrm_sales_sal_details_".$BeforeYId.".YearId=".$BeforeYId, $con); $resP1t=mysql_fetch_assoc($sqlP1t);
$sql4tat=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_terr.ItemId=hrm_sales_seedsitem.ItemId where TerrRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$_REQUEST['y'], $con); 
$sql5tat=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_terr.ItemId=hrm_sales_seedsitem.ItemId where TerrRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$AfterYId, $con); $res4tat=mysql_fetch_assoc($sql4tat); $res5tat=mysql_fetch_assoc($sql5tat);
$sql4tbt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_hq.ItemId=hrm_sales_seedsitem.ItemId where HqRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$_REQUEST['y'], $con); 
$sql5tbt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_hq.ItemId=hrm_sales_seedsitem.ItemId where HqRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$AfterYId, $con); $res4tbt=mysql_fetch_assoc($sql4tbt); $res5tbt=mysql_fetch_assoc($sql5tbt); }
elseif($_REQUEST['crop']==3){ $sqlP1t=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$BeforeYId.".ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$BeforeYId.".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId INNER JOIN hrm_sales_reporting_level ON hrm_sales_hq_temp.EmployeeID=hrm_sales_reporting_level.EmployeeID where HqTEmpStatus='A' AND (hrm_sales_hq_temp.EmployeeID=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R1=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R2=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R3=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R4=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R5=".$_REQUEST['mainv'].") AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_sal_details_".$BeforeYId.".YearId=".$BeforeYId, $con); $resP1t=mysql_fetch_assoc($sqlP1t);
$sql4tat=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_terr.ItemId=hrm_sales_seedsitem.ItemId where TerrRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND YearId=".$_REQUEST['y'], $con); 
$sql5tat=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_terr.ItemId=hrm_sales_seedsitem.ItemId where TerrRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND YearId=".$AfterYId, $con); $res4tat=mysql_fetch_assoc($sql4tat); $res5tat=mysql_fetch_assoc($sql5tat);
$sql4tbt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_hq.ItemId=hrm_sales_seedsitem.ItemId where HqRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND YearId=".$_REQUEST['y'], $con); 
$sql5tbt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_hq.ItemId=hrm_sales_seedsitem.ItemId where HqRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND YearId=".$AfterYId, $con); $res4tbt=mysql_fetch_assoc($sql4tbt); $res5tbt=mysql_fetch_assoc($sql5tbt);}


$TotPp1=$resP1t['sM1']+$resP1t['sM2']+$resP1t['sM3']; $TotPp2=$resP1t['sM4']+$resP1t['sM5']+$resP1t['sM6'];
$TotPp3=$resP1t['sM7']+$resP1t['sM8']+$resP1t['sM9']; $TotPp4=$resP1t['sM10']+$resP1t['sM11']+$resP1t['sM12'];
$TotP2ta=$res4tat['Qa']+$res4tbt['Qa']; $TotP2tb=$res4tat['Qb']+$res4tbt['Qb']; 
$TotP2tc=$res4tat['Qc']+$res4tbt['Qc']; $TotP2td=$res4tat['Qd']+$res4tbt['Qd'];
$TotP3ta=$res5tat['Qa']+$res5tbt['Qa']; $TotP3tb=$res5tat['Qb']+$res5tbt['Qb']; 
$TotP3tc=$res5tat['Qc']+$res5tbt['Qc']; $TotP3td=$res5tat['Qd']+$res5tbt['Qd'];
} 
elseif($rowRpt==0){ 
if($_REQUEST['crop']==1 OR $_REQUEST['crop']==2){ $sqlP1t=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$BeforeYId.".ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$BeforeYId.".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId where HqTEmpStatus='A' AND hrm_sales_hq_temp.EmployeeID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$BeforeYId, $con); $resP1t=mysql_fetch_assoc($sqlP1t);
$sql4tat=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$_REQUEST['y'].".ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$_REQUEST['y'].".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId where HqTEmpStatus='A' AND hrm_sales_hq_temp.EmployeeID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND hrm_sales_sal_details_".$_REQUEST['y'].".YearId=".$_REQUEST['y'], $con); 
$sql5tat=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$AfterYId." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$AfterYId.".ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$AfterYId.".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId where HqTEmpStatus='A' AND hrm_sales_hq_temp.EmployeeID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND hrm_sales_sal_details_".$AfterYId.".YearId=".$AfterYId, $con); 
$res4tat=mysql_fetch_assoc($sql4tat); $res5tat=mysql_fetch_assoc($sql5tat); }
elseif($_REQUEST['crop']==3){ $sqlP1t=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$BeforeYId.".ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$BeforeYId.".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId where HqTEmpStatus='A' AND hrm_sales_hq_temp.EmployeeID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_sal_details_".$BeforeYId.".YearId=".$BeforeYId, $con); $resP1t=mysql_fetch_assoc($sqlP1t);
$sql4tat=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$_REQUEST['y'].".ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$_REQUEST['y'].".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId where HqTEmpStatus='A' AND hrm_sales_hq_temp.EmployeeID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_sal_details_".$_REQUEST['y'].".YearId=".$_REQUEST['y'], $con); 
$sql5tat=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$AfterYId." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$AfterYId.".ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$AfterYId.".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId where HqTEmpStatus='A' AND hrm_sales_hq_temp.EmployeeID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_sal_details_".$AfterYId.".YearId=".$AfterYId, $con); 
$res4tat=mysql_fetch_assoc($sql4tat); $res5tat=mysql_fetch_assoc($sql5tat); }


$TotPp1=$resP1t['sM1']+$resP1t['sM2']+$resP1t['sM3']; $TotPp2=$resP1t['sM4']+$resP1t['sM5']+$resP1t['sM6'];
$TotPp3=$resP1t['sM7']+$resP1t['sM8']+$resP1t['sM9']; $TotPp4=$resP1t['sM10']+$resP1t['sM11']+$resP1t['sM12'];
$TotP2ta=$res4tat['sM1']+$res4tat['sM2']+$res4tat['sM3']; $TotP2tb=$res4tat['sM4']+$res4tat['sM5']+$res4tat['sM6'];
$TotP2tc=$res4tat['sM7']+$res4tat['sM8']+$res4tat['sM9']; $TotP2td=$res4tat['sM10']+$res4tat['sM11']+$res4tat['sM12'];
$TotP3ta=$res5tat['sM1']+$res5tat['sM2']+$res5tat['sM3']; $TotP3tb=$res5tat['sM4']+$res5tat['sM5']+$res5tat['sM6'];
$TotP3tc=$res5tat['sM7']+$res5tat['sM8']+$res5tat['sM9']; $TotP3td=$res5tat['sM10']+$res5tat['sM11']+$res5tat['sM12'];
}
//

}elseif($_REQUEST['findV']=='AR'){
if($_REQUEST['crop']==1 OR $_REQUEST['crop']==2){ $sqlP1t=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$BeforeYId.".ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$BeforeYId.".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId INNER JOIN hrm_sales_reporting_level ON hrm_sales_hq_temp.EmployeeID=hrm_sales_reporting_level.EmployeeID where HqTEmpStatus='A' AND (hrm_sales_hq_temp.EmployeeID=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R2=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R3=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R4=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R5=".$_REQUEST['mainv'].") AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND hrm_sales_sal_details_".$BeforeYId.".YearId=".$BeforeYId, $con); $resP1t=mysql_fetch_assoc($sqlP1t);
$TotPp1=$resP1t['tsM1']+$resP1t['tsM2']+$resP1t['tsM3']; $TotPp2=$resP1t['tsM4']+$resP1t['tsM5']+$resP1t['tsM6'];
$TotPp3=$resP1t['tsM7']+$resP1t['tsM8']+$resP1t['tsM9']; $TotPp4=$resP1t['tsM10']+$resP1t['tsM11']+$resP1t['tsM12'];

$sqlP2t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_terr.ItemId=hrm_sales_seedsitem.ItemId where TerrRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$_REQUEST['y'], $con); 
$sqlP3t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_terr.ItemId=hrm_sales_seedsitem.ItemId where TerrRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$AfterYId, $con);  $resP2t=mysql_fetch_assoc($sqlP2t); $resP3t=mysql_fetch_assoc($sqlP3t);
$sqlP2ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_hq.ItemId=hrm_sales_seedsitem.ItemId where HqRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$_REQUEST['y'], $con); 
$sqlP3ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_hq.ItemId=hrm_sales_seedsitem.ItemId where HqRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$AfterYId, $con);  $resP2ta=mysql_fetch_assoc($sqlP2ta); $resP3ta=mysql_fetch_assoc($sqlP3ta);
$sqlP2tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_area.ItemId=hrm_sales_seedsitem.ItemId where AreaRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$_REQUEST['y'], $con); 
$sqlP3tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_area.ItemId=hrm_sales_seedsitem.ItemId where AreaRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$AfterYId, $con);  $resP2tb=mysql_fetch_assoc($sqlP2tb); $resP3tb=mysql_fetch_assoc($sqlP3tb); }
elseif($_REQUEST['crop']==3){ $sqlP1t=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$BeforeYId.".ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$BeforeYId.".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId INNER JOIN hrm_sales_reporting_level ON hrm_sales_hq_temp.EmployeeID=hrm_sales_reporting_level.EmployeeID where HqTEmpStatus='A' AND (hrm_sales_hq_temp.EmployeeID=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R2=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R3=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R4=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R5=".$_REQUEST['mainv'].") AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_sal_details_".$BeforeYId.".YearId=".$BeforeYId, $con); $resP1t=mysql_fetch_assoc($sqlP1t);
$TotPp1=$resP1t['tsM1']+$resP1t['tsM2']+$resP1t['tsM3']; $TotPp2=$resP1t['tsM4']+$resP1t['tsM5']+$resP1t['tsM6'];
$TotPp3=$resP1t['tsM7']+$resP1t['tsM8']+$resP1t['tsM9']; $TotPp4=$resP1t['tsM10']+$resP1t['tsM11']+$resP1t['tsM12'];

$sqlP2t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_terr.ItemId=hrm_sales_seedsitem.ItemId where TerrRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND YearId=".$_REQUEST['y'], $con); 
$sqlP3t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_terr.ItemId=hrm_sales_seedsitem.ItemId where TerrRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND YearId=".$AfterYId, $con);  $resP2t=mysql_fetch_assoc($sqlP2t); $resP3t=mysql_fetch_assoc($sqlP3t);
$sqlP2ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_hq.ItemId=hrm_sales_seedsitem.ItemId where HqRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND YearId=".$_REQUEST['y'], $con); 
$sqlP3ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_hq.ItemId=hrm_sales_seedsitem.ItemId where HqRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND YearId=".$AfterYId, $con);  $resP2ta=mysql_fetch_assoc($sqlP2ta); $resP3ta=mysql_fetch_assoc($sqlP3ta);
$sqlP2tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_area.ItemId=hrm_sales_seedsitem.ItemId where AreaRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND YearId=".$_REQUEST['y'], $con); 
$sqlP3tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_area.ItemId=hrm_sales_seedsitem.ItemId where AreaRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND YearId=".$AfterYId, $con);  $resP2tb=mysql_fetch_assoc($sqlP2tb); $resP3tb=mysql_fetch_assoc($sqlP3tb);}


$TotP2ta=$resP2t['Qa']+$resP2ta['Qa']+$resP2tb['Qa']; $TotP2tb=$resP2t['Qb']+$resP2ta['Qb']+$resP2tb['Qb']; $TotP2tc=$resP2t['Qc']+$resP2ta['Qc']+$resP2tb['Qc']; 
$TotP2td=$resP2t['Qd']+$resP2ta['Qd']+$resP2tb['Qd'];
$TotP3ta=$resP3t['Qa']+$resP3ta['Qa']+$resP3tb['Qa']; $TotP3tb=$resP3t['Qb']+$resP3ta['Qb']+$resP3tb['Qb']; $TotP3tc=$resP3t['Qc']+$resP3ta['Qc']+$resP3tb['Qc'];
$TotP3td=$resP3t['Qd']+$resP3ta['Qd']+$resP3tb['Qd'];

}elseif($_REQUEST['findV']=='ZZ'){
if($_REQUEST['crop']==1 OR $_REQUEST['crop']==2){ $sqlP1t=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$BeforeYId.".ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$BeforeYId.".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId INNER JOIN hrm_sales_reporting_level ON hrm_sales_hq_temp.EmployeeID=hrm_sales_reporting_level.EmployeeID where HqTEmpStatus='A' AND (hrm_sales_hq_temp.EmployeeID=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R1=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R2=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R3=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R4=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R5=".$_REQUEST['mainv'].") AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND hrm_sales_sal_details_".$BeforeYId.".YearId=".$BeforeYId, $con); $resP1t=mysql_fetch_assoc($sqlP1t);
$TotPp1=$resP1t['tsM1']+$resP1t['tsM2']+$resP1t['tsM3']; $TotPp2=$resP1t['tsM4']+$resP1t['tsM5']+$resP1t['tsM6'];
$TotPp3=$resP1t['tsM7']+$resP1t['tsM8']+$resP1t['tsM9']; $TotPp4=$resP1t['tsM10']+$resP1t['tsM11']+$resP1t['tsM12'];

$sqlP2t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_terr.ItemId=hrm_sales_seedsitem.ItemId where TerrRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$_REQUEST['y'], $con); 
$sqlP3t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_terr.ItemId=hrm_sales_seedsitem.ItemId where TerrRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$AfterYId, $con);  $resP2t=mysql_fetch_assoc($sqlP2t); $resP3t=mysql_fetch_assoc($sqlP3t);
$sqlP2ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_hq.ItemId=hrm_sales_seedsitem.ItemId where HqRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$_REQUEST['y'], $con); 
$sqlP3ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_hq.ItemId=hrm_sales_seedsitem.ItemId where HqRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$AfterYId, $con);  $resP2ta=mysql_fetch_assoc($sqlP2ta); $resP3ta=mysql_fetch_assoc($sqlP3ta);
$sqlP2tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_area.ItemId=hrm_sales_seedsitem.ItemId where AreaRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$_REQUEST['y'], $con); 
$sqlP3tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_area.ItemId=hrm_sales_seedsitem.ItemId where AreaRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$AfterYId, $con);  $resP2tb=mysql_fetch_assoc($sqlP2tb); $resP3tb=mysql_fetch_assoc($sqlP3tb);

$sqlP2tc=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_region.ItemId=hrm_sales_seedsitem.ItemId where RegionRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$_REQUEST['y'], $con); 
$sqlP3tc=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_region.ItemId=hrm_sales_seedsitem.ItemId where RegionRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$AfterYId, $con);  $resP2tc=mysql_fetch_assoc($sqlP2tc); $resP3tc=mysql_fetch_assoc($sqlP3tc);
$sqlP2td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_zone.ItemId=hrm_sales_seedsitem.ItemId where ZoneRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$_REQUEST['y'], $con); 
$sqlP3td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_zone.ItemId=hrm_sales_seedsitem.ItemId where ZoneRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND YearId=".$AfterYId, $con);  $resP2td=mysql_fetch_assoc($sqlP2td); $resP3td=mysql_fetch_assoc($sqlP3td); }
elseif($_REQUEST['crop']==3){ $sqlP1t=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$BeforeYId.".ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$BeforeYId.".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId INNER JOIN hrm_sales_reporting_level ON hrm_sales_hq_temp.EmployeeID=hrm_sales_reporting_level.EmployeeID where HqTEmpStatus='A' AND (hrm_sales_hq_temp.EmployeeID=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R1=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R2=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R3=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R4=".$_REQUEST['mainv']." OR hrm_sales_reporting_level.R5=".$_REQUEST['mainv'].") AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_sal_details_".$BeforeYId.".YearId=".$BeforeYId, $con); $resP1t=mysql_fetch_assoc($sqlP1t);
$TotPp1=$resP1t['tsM1']+$resP1t['tsM2']+$resP1t['tsM3']; $TotPp2=$resP1t['tsM4']+$resP1t['tsM5']+$resP1t['tsM6'];
$TotPp3=$resP1t['tsM7']+$resP1t['tsM8']+$resP1t['tsM9']; $TotPp4=$resP1t['tsM10']+$resP1t['tsM11']+$resP1t['tsM12'];

$sqlP2t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_terr.ItemId=hrm_sales_seedsitem.ItemId where TerrRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND YearId=".$_REQUEST['y'], $con); 
$sqlP3t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_terr.ItemId=hrm_sales_seedsitem.ItemId where TerrRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND YearId=".$AfterYId, $con);  $resP2t=mysql_fetch_assoc($sqlP2t); $resP3t=mysql_fetch_assoc($sqlP3t);
$sqlP2ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_hq.ItemId=hrm_sales_seedsitem.ItemId where HqRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND YearId=".$_REQUEST['y'], $con); 
$sqlP3ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_hq.ItemId=hrm_sales_seedsitem.ItemId where HqRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND YearId=".$AfterYId, $con);  $resP2ta=mysql_fetch_assoc($sqlP2ta); $resP3ta=mysql_fetch_assoc($sqlP3ta);
$sqlP2tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_area.ItemId=hrm_sales_seedsitem.ItemId where AreaRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND YearId=".$_REQUEST['y'], $con); 
$sqlP3tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_area.ItemId=hrm_sales_seedsitem.ItemId where AreaRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND YearId=".$AfterYId, $con);  $resP2tb=mysql_fetch_assoc($sqlP2tb); $resP3tb=mysql_fetch_assoc($sqlP3tb);

$sqlP2tc=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_region.ItemId=hrm_sales_seedsitem.ItemId where RegionRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND YearId=".$_REQUEST['y'], $con); 
$sqlP3tc=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_region.ItemId=hrm_sales_seedsitem.ItemId where RegionRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND YearId=".$AfterYId, $con);  $resP2tc=mysql_fetch_assoc($sqlP2tc); $resP3tc=mysql_fetch_assoc($sqlP3tc);
$sqlP2td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_zone.ItemId=hrm_sales_seedsitem.ItemId where ZoneRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND YearId=".$_REQUEST['y'], $con); 
$sqlP3td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_zone.ItemId=hrm_sales_seedsitem.ItemId where ZoneRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND YearId=".$AfterYId, $con);  $resP2td=mysql_fetch_assoc($sqlP2td); $resP3td=mysql_fetch_assoc($sqlP3td); }

$TotP2ta=$resP2t['Qa']+$resP2ta['Qa']+$resP2tb['Qa']+$resP2tc['Qa']+$resP2td['Qa']; $TotP2tb=$resP2t['Qb']+$resP2ta['Qb']+$resP2tb['Qb']+$resP2tc['Qb']+$resP2td['Qb']; 
$TotP2tc=$resP2t['Qc']+$resP2ta['Qc']+$resP2tb['Qc']+$resP2tc['Qc']+$resP2td['Qc']; $TotP2td=$resP2t['Qd']+$resP2ta['Qd']+$resP2tb['Qd']+$resP2tc['Qd']+$resP2td['Qd'];
$TotP3ta=$resP3t['Qa']+$resP3ta['Qa']+$resP3tb['Qa']+$resP3tc['Qa']+$resP3td['Qa']; $TotP3tb=$resP3t['Qb']+$resP3ta['Qb']+$resP3tb['Qb']+$resP3tc['Qb']+$resP3td['Qb']; 
$TotP3tc=$resP3t['Qc']+$resP3ta['Qc']+$resP3tb['Qc']+$resP3tc['Qc']+$resP3td['Qc']; $TotP3td=$resP3t['Qd']+$resP3ta['Qd']+$resP3tb['Qd']+$resP3tc['Qd']+$resP3td['Qd'];

}

?>
   <tr style="font-size:14px;color:#000000;background-color:#FFFFA6;height:24px;">
	 <td colspan="3" align="right" style="font-size:16px;"><b>TOTAL:&nbsp;</b></td>
	 <td><input class="TInput" id="TotP1_TA" value="<?php if($TotPp1!=''){echo $TotPp1;} ?>" readonly/></td>		
	 <td><input class="TInput" id="TotP1_TB" value="<?php if($TotP2ta!=''){echo $TotP2ta;} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP1_TC" value="<?php if($TotP3ta!=''){echo $TotP3ta;} ?>" readonly/></td>
	 
	 <td><input class="TInput" id="TotP2_TA" value="<?php if($TotPp2!=''){echo $TotPp2;} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP2_TB" value="<?php if($TotP2tb!=''){echo $TotP2tb;} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP2_TC" value="<?php if($TotP3tb!=''){echo $TotP3tb;} ?>" readonly/></td>
	 
	 <td><input class="TInput" id="TotP3_TA" value="<?php if($TotPp3!=''){echo $TotPp3;} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP3_TB" value="<?php if($TotP2tc!=''){echo $TotP2tc;} ?>" readonly/></td>	 
	 <td><input class="TInput" id="TotP3_TC" value="<?php if($TotP3tc!=''){echo $TotP3tc;} ?>" readonly/></td>	
	  
	 <td><input class="TInput" id="TotP4_TA" value="<?php if($TotPp4!=''){echo $TotPp4;} ?>" readonly/></td>		
	 <td><input class="TInput" id="TotP4_TB" value="<?php if($TotP2td!=''){echo $TotP2td;} ?>" readonly/></td>	 
	 <td><input class="TInput" id="TotP4_TC" value="<?php if($TotP3td!=''){echo $TotP3td;} ?>" readonly/></td>
	 
<?php $TotP1t=$TotPp1+$TotPp2+$TotPp3+$TotPp4; $TotP2t=$TotP2ta+$TotP2tb+$TotP2tc+$TotP2td; $TotP3t=$TotP3ta+$TotP3tb+$TotP3tc+$TotP3td;
      //$TotP4t=$resP4t['Qa']+$resP4t['Qb']+$resP4t['Qc']+$resP4t['Qd']; $TotP5t=$resP5t['Qa']+$resP5t['Qb']+$resP5t['Qc']; ?>
      <td><input class="TInput" id="TotM_AeT" value="<?php if($TotP1t!=0 AND $TotP1t!=''){echo $TotP1t;}else{echo '';} ?>" readonly/></td>
	  <td><input class="TInput" id="TotM_BeT" value="<?php if($TotP2t!=0 AND $TotP2t!=''){echo $TotP2t;}else{echo '';} ?>" readonly/></td>	  
	  <td><input class="TInput" id="TotM_CeT" value="<?php if($TotP3t!=0 AND $TotP3t!=''){echo $TotP3t;}else{echo '';} ?>" readonly/></td>
<?php /*
$TSsqlP1=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrEmpID=".$EmployeeId." AND ItemId=".$_REQUEST['ii']." AND YearId=".$BeforeYId, $con); $TSsqlP2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrEmpID=".$EmployeeId." AND ItemId=".$_REQUEST['ii']." AND YearId=".$_REQUEST['y'], $con); $TSsqlP3=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrEmpID=".$EmployeeId." AND ItemId=".$_REQUEST['ii']." AND YearId=".$AfterYId, $con); 
$TSresP1=mysql_fetch_assoc($TSsqlP1); $TSresP2=mysql_fetch_assoc($TSsqlP2); $TSresP3=mysql_fetch_assoc($TSsqlP3); 
$TSTotP1=$TSresP1['Qa']+$TSresP1['Qb']+$TSresP1['Qc']+$TSresP1['Qd']; $TSTotP2=$TSresP2['Qa']+$TSresP2['Qb']+$TSresP2['Qc']+$TSresP2['Qd'];
$TSTotP3=$TSresP3['Qa']+$TSresP3['Qb']+$TSresP3['Qc']+$TSresP3['Qd'];
?>
    <td style="width:70px;font-weight:bold;" align="right"><?php if($TSTotP1!=0 AND $TSTotP1!=''){echo $TSTotP1;}else{echo '';} ?>&nbsp;</td>
	<td style="width:70px;font-weight:bold;" align="right"><?php if($TSTotP2!=0 AND $TSTotP2!=''){echo $TSTotP2;}else{echo '';} ?>&nbsp;</td>
	<td style="width:70px;font-weight:bold;" align="right"><?php if($TSTotP3!=0 AND $TSTotP3!=''){echo $TSTotP3;}else{echo '';} ?>&nbsp;</td>	
*/ ?>		  
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

