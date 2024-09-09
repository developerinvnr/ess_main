<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.th{color:#ffffff;font-family:Times New Roman;font-size:12px;font-weight:bold;text-align:center;height:24px;} 
.tdl{color:#000000;font-family:Times New Roman;font-size:12px;height:20px;} 
.tdc{color:#000000;font-family:Times New Roman;font-size:12px;text-align:center;height:20px;}
.tdr{color:#000000;font-family:Times New Roman;font-size:12px;text-align:right;height:20px;} 
.inpl{color:#000000;font-family:Times New Roman;font-size:11px;width:99%;height:20px;} 
.inpc{color:#000000;font-family:Times New Roman;font-size:11px;text-align:center;width:99%;height:20px;}
.inpr{color:#000000;font-family:Times New Roman;font-size:11px;text-align:right;width:99%;height:20px;} 
.TableHead { font-family:Times New Roman;color:#000000;font-size:20px;font-weight:bold; }
.CBtn {background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px;background-color:#E0DBE3;border-color:#FFFFFF;}
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script language="javascript">
function ChangrYear(YearV)
{ window.location="Combsplan.php?SelY=Y&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV; }

function ExportTarget(y,ei,ct)
{ window.open("CombsplanExport.php?action=TgtPlanRExport&y="+y+"&ei="+ei+"&ct="+ct,"ExpForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=100,height=50"); } 

function ExportSales(y,ei,ct)
{ window.open("CombsplanExport.php?action=SalPlanRExport&y="+y+"&ei="+ei+"&ct="+ct,"ExpForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=100,height=50"); } 

function ExportTgtSaleAll(y,ei,ct)
{ window.open("CombsplanAllExport.php?action=SalTgtPlanRExport&y="+y+"&ei="+ei+"&ct="+ct,"ExpForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=100,height=50"); } 

</Script>
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
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
   <tr>
	<td valign="top">
	<table border="0" style="width:100%;float:none;" cellpadding="0">
     <tr>
	  <td valign="top">    
<?php //********************************************************************************** ?>
<input type="hidden" id="ComId" value="<?=$CompanyId; ?>" />
<input type="hidden" id="UserId" value="<?=$EmployeeId; ?>" />
<input type="hidden" id="YId" value="<?=$YearId; ?>" />	   
<table border="0" id="Activity">
 <tr>
  <td style="width:100%;">
  <table border="0" style="width:100%;">
  <?php if($EmployeeId == 438 or $EmployeeId == 1653)
  { 
  
    if($EmployeeId == 438){ $CType='VC'; }
    elseif($EmployeeId == 1653){ $CType='FC'; }
  ?>
   
<?php //**********************************************************************?>
<?php //***************START*****START*****START******START******START*****************************?>
<?php //*************************************************************************************?>	
<tr>
 <td valign="top">
  <table border="0">
   <tr>
    <td id="Entry" style="width:500px;" valign="top">
	<span id="TabEntry">
     <table border="0">
      <tr>
	    <td style="margin-top:0px;width:120px;" class="heading"><u>Target & Sales:</u></td>
	    <td style="font-size:12px;height:18px;width:60px;" align="right"><b><i>Year :</i></b></td>
	    <td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="YearV" id="YearV" onChange="ChangrYear(this.value)"> 
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate'])); 
      $to2date=date("Y",strtotime($resy['ToDate']))+1;
	  $NextYear=$_REQUEST['y']+1; $PrevYear=$_REQUEST['y']-1; 
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>		
 <option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $fromdate.'-'.$todate; ?></option>
 <?php if($PrevYear>=1){?><option value="<?php echo $PrevYear; ?>"><?php echo date("Y",strtotime($resy3['FromDate'])).'-'.date("Y",strtotime($resy3['ToDate'])); ?></option><?php } ?>
 </select>
 <?php /*?><option value="<?php echo $NextYear; ?>"><?php echo date("Y",strtotime($resy2['FromDate'])).'-'.date("Y",strtotime($resy2['ToDate'])); ?></option><?php */?>
 
       </td>
	  </tr>
	   </table>
      </td>
   </tr>
 </table>
 </td>
 </tr>
 <tr>
  <td colspan="10" valign="top" style="width:100%;">
<?php if($_REQUEST['SelY']=='Y' || isset($_REQUEST['y']))
{ 
$sqlY3=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resY3=mysql_fetch_assoc($sqlY3); 
$y3=date("y",strtotime($resY3['FromDate'])).'-'.date("y",strtotime($resY3['ToDate'])); $y3T='<font color="#A60053">Tgt.</font>'; ?>  
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:12px;width:80%;vertical-align:top;">
 
<tr style="background-color:#D5F1D1;color:#000000;"> 
  <td colspan="3" align="center" style="height:25px;font-size:14px;"><b><?php echo $fromdate.'-'.$todate; ?> -> <b>Data Export</b></b></td>
</tr>	
 <tr style="background-color:#D5F1D1;color:#000000;"> 
  <td align="center" style="width:200px;height:23px;font-size:15px;"><b>Target</b></td> 
  <td align="center" style="width:200px;height:23px;font-size:15px;"><b>Sales</b></td>
  <td align="center" style="width:200px;height:23px;font-size:15px;"><b>Tar/Sale</b></td>
 </tr>   

 <tr style="height:22px;background-color:<?php echo '#FFFFFF'; ?>;"> 
  <td style="width:60px;font-size:14px;" align="center">
   <a href="#" onClick="ExportTarget(<?=$_REQUEST['y'].','.$EmployeeId;?>,'<?=$CType?>')"><b>Click</b></a>
  </td>
  
  <td style="width:60px;font-size:14px;" align="center">
   <a href="#" onClick="ExportSales(<?=$_REQUEST['y'].','.$EmployeeId;?>,'<?=$CType?>')"><b>Click</b></a>
  </td>
  
  <td style="width:60px;font-size:14px;" align="center">
   <a href="#" onClick="ExportTgtSaleAll(<?=$_REQUEST['y'].','.$EmployeeId;?>,'<?=$CType?>')"><b>Click</b></a>
  </td>
  
 </tr>  	
</table>	
<?php } ?>
    </td>
   </tr> 
  </table>
 </td>
</tr>



<?php //************************************************************************ /?>
<?php //****************END*****END*****END******END******END***********************/ ?>
<?php //*******************************************************************************/ ?>   
   
  <?php } //if($EmployeeId == 438 or $EmployeeId == 1653) ?>	  
  </table>
  </td>
 </tr> 
</table>			
<?php //***************************************************************************************** ?>
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
