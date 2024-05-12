<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
$sqlDept=mysql_query("select DepartmentId from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $resDept=mysql_fetch_assoc($sqlDept);
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> /*background-color:#D9D9FF;  background-color:#EEEEEE; */
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.InputB{font-size:12px;width:65px;text-align:right;border:0px;font-weight:bold;background-color:#D9D9FF;} 
.Input{font-size:12px;width:60px;text-align:right;border:0px;background-color:#EEEEEE;}
.TInput{font-size:12px;width:60px;text-align:right;border:0px;background-color:#FFFFA6;font-weight:bold;}
.Th60{text-align:center;width:60px;font-weight:bold;font-size:12px;} .Th80{text-align:center;width:80px;font-weight:bold;font-size:12px;}
.Th40{text-align:center;width:40px;font-weight:bold;font-size:12px;} .Tr60{text-align:center;width:60px;font-weight:bold;font-size:12px;}
.Th50{text-align:center;width:50px;font-weight:bold;font-size:12px;} .Td60{text-align:right;width:60px;font-size:12px;} 
.Td40{text-align:right;width:40px;font-size:12px;}
.ChkImg{width:20px;hieght:20px;}
.inner_table { height:400px;overflow-y:auto;width:auto; }
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script language="javascript">
function ChangrYear(YearV)
{ window.location="SalesLogRep.php?SelY=Y&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV; }

function ExportTarget(y,e)
{ window.open("SalesLogExport.php?action=TgtPlanRExport&y="+y+"&e="+e,"ExpForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20"); } 

function ExportSales(y,e)
{ window.open("SalesLogExport.php?action=SalPlanRExport&y="+y+"&e="+e,"ExpForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20"); } 

function ExportSalesAll(y,e)
{ window.open("SalesLogAllExport.php?action=SalTgtPlanRExport&y="+y+"&e="+e,"ExpForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20"); } 

  
</Script>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login']=true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" width="100%" id="MainWindow"><br>
<?php //******************************************************************** ?>
<?php //************START*****START*****START******START******START********* ?>
<?php //******************************************************************** ?>
<input type="hidden" id="ComId" value="<?php echo $_REQUEST['ci']; ?>" /><input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" id="YId" value="<?php echo $YearId; ?>" /><input type="hidden" id="c1" value="<?php echo $_REQUEST['c1']; ?>" />
<input type="hidden" id="c2" value="<?php echo $_REQUEST['c2']; ?>" /><input type="hidden" id="c3" value="<?php echo $_REQUEST['c3']; ?>" />
<input type="hidden" id="c4" value="<?php echo $_REQUEST['c4']; ?>" /><input type="hidden" id="c5" value="<?php echo $_REQUEST['c5']; ?>" />	
<table border="0" style="margin-top:0px; width:100%; height:150px;">	
<tr>
 <td valign="top">
  <table border="0">
   <tr>
    <td id="Entry" style="width:500px;" valign="top">
	<span id="TabEntry">
     <table border="0">
      <tr>
	    <td style="margin-top:0px;width:120px;" class="heading"><u>Target/ Sales:</u></td>
	    <td style="font-size:11px;height:18px;width:60px;color:#E6E6E6;" align="right"><b>Year :</b></td>
	    <td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="YearV" id="YearV" onChange="ChangrYear(this.value)"> 
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate'])); 
	  $NextYear=$_REQUEST['y']+1; $PrevYear=$_REQUEST['y']-1; 
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>		
 <option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $fromdate.'-'.$todate; ?></option>
 <?php if($PrevYear>=1){?><option value="<?php echo $PrevYear; ?>"><?php echo date("Y",strtotime($resy3['FromDate'])).'-'.date("Y",strtotime($resy3['ToDate'])); ?></option><?php } ?><option value="<?php echo $NextYear; ?>"><?php echo date("Y",strtotime($resy2['FromDate'])).'-'.date("Y",strtotime($resy2['ToDate'])); ?></option></select>
       </td>
	  </tr>
	   </table>
      </td>
   </tr>
 </table>
 </td>
 </tr>
 <tr>
  <td colspan="10" valign="top" style="width:450px;">
<?php if($_REQUEST['SelY']=='Y'){ $sqlY3=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resY3=mysql_fetch_assoc($sqlY3); 
$y3=date("y",strtotime($resY3['FromDate'])).'-'.date("y",strtotime($resY3['ToDate'])); $y3T='<font color="#A60053">Tgt.</font>'; ?>  
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:12px;width:450px;vertical-align:top;">
 <tr style="background-color:#D5F1D1;color:#000000;"> 
  <td colspan="2" align="center" style="width:230px;font-size:14px;"><b>Total Records Count</b></td> 
  <td colspan="3" align="center" style="width:120px;font-size:14px;"><b>Export</b></td>
 </tr>	
 <tr style="background-color:#D5F1D1;color:#000000;"> 
  <td align="center" style="width:115px;font-size:14px;"><b>Target</b></td> 
  <td align="center" style="width:115px;font-size:14px;"><b>Sales</b></td>
  <td align="center" style="width:60px;font-size:14px;"><b>Target</b></td> 
  <td align="center" style="width:60px;font-size:14px;"><b>Sales</b></td>
  <td align="center" style="width:60px;font-size:14px;"><b>Tar/Sale</b></td>
 </tr>   
  <?php
   $sql1=mysql_query("select dt.ProductId,dt.DealerId,M1,M2,M3,M4,M5,M6,M7,M8,M9,M10,M11,M12,ProductName,ItemName,ItemCode from hrm_sales_sal_details_".$_REQUEST['y']." dt INNER JOIN hrm_sales_dealer de ON dt.DealerId=de.DealerId INNER JOIN hrm_headquater hq ON de.HqId=hq.HqId INNER JOIN hrm_sales_ebillstate ebt ON hq.StateId = ebt.StateId INNER JOIN hrm_sales_seedsproduct sp ON dt.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where dt.YearId=".$_REQUEST['y']." AND (M1!=0 OR M2!=0 OR M3!=0 OR M4!=0 OR M5!=0 OR M6!=0 OR M7!=0 OR M8!=0 OR M9!=0 OR M10!=0 OR M11!=0 OR M12!=0) AND (ebt.EmployeeID=".$EmployeeId." OR ebt.EmployeeID2=".$EmployeeId." OR ebt.EmployeeID3=".$EmployeeId." OR ebt.EmployeeID4=".$EmployeeId.")", $con); $rows1=mysql_num_rows($sql1); 
  
  $sql2 = mysql_query("select dt.ProductId,dt.DealerId,M1_Ach,M2_Ach,M3_Ach,M4_Ach,M5_Ach,M6_Ach,M7_Ach,M8_Ach,M9_Ach,M10_Ach,M11_Ach,M12_Ach,ProductName,ItemName,ItemCode from hrm_sales_sal_details_".$_REQUEST['y']." dt INNER JOIN hrm_sales_dealer de ON dt.DealerId=de.DealerId INNER JOIN hrm_headquater hq ON de.HqId=hq.HqId INNER JOIN hrm_sales_ebillstate ebt ON hq.StateId = ebt.StateId INNER JOIN hrm_sales_seedsproduct sp ON dt.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where dt.YearId=".$_REQUEST['y']." AND (M1_Ach!=0 OR M2_Ach!=0 OR M3_Ach!=0 OR M4_Ach!=0 OR M5_Ach!=0 OR M6_Ach!=0 OR M7_Ach!=0 OR M8_Ach!=0 OR M9_Ach!=0 OR M10_Ach!=0 OR M11_Ach!=0 OR M12_Ach!=0) AND (ebt.EmployeeID=".$EmployeeId." OR ebt.EmployeeID2=".$EmployeeId." OR ebt.EmployeeID3=".$EmployeeId." OR ebt.EmployeeID4=".$EmployeeId.")", $con); $rows2=mysql_num_rows($sql2);
  
  ?>
 <tr bgcolor="#EEEEEE" style="height:22px;background-color:<?php echo '#E2F3D8'; ?>;"> 
  <td style="width:115px;font-size:14px;" align="center"><?php echo $rows1; ?></td> 
  <td style="width:115px;font-size:14px;" align="center"><?php echo $rows2; ?></td> 
  <td style="width:60px;font-size:12px;" align="center"><?php if($rows1>0){ ?><a href="#" onClick="ExportTarget(<?php echo $_REQUEST['y'].','.$EmployeeId; ?>)"><b>Click</b></a><?php } ?></td>
  <td style="width:60px;font-size:12px;" align="center"><?php if($rows2>0){ ?><a href="#" onClick="ExportSales(<?php echo $_REQUEST['y'].','.$EmployeeId; ?>)"><b>Click</b></a><?php } ?></td>
  <td style="width:60px;font-size:12px;" align="center"><a href="#" onClick="ExportSalesAll(<?php echo $_REQUEST['y'].','.$EmployeeId; ?>)"><b>Click</b></a></td>
 </tr>  	
</table>	
<?php } ?>
    </td>
   </tr> 
  </table>
 </td>
</tr>
</table>
		
<?php //**************************************************************** ?>
<?php //**************END*****END*****END******END******END************* ?>
<?php //**************************************************************** ?>
		
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

</html>
