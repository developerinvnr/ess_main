<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
?>
<?php 
if(isset($_POST['SaveAchTgt']))
{ 
 if ($_FILES['AchTgt_csv_file']['error'] > 0) {
  echo "Error: " . $_FILES['AchTgt_csv_file']['error'] . "<br />"; 
 }else{  
  if (($handle = fopen($_FILES['AchTgt_csv_file']['tmp_name'], "r"))!== FALSE) {
   $ctr = 1; // used to exclude the CSV header
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
$c0 = mysql_real_escape_string($data[0]); $c1 = mysql_real_escape_string($data[1]); $c2 = mysql_real_escape_string($data[2]); $c3 = mysql_real_escape_string($data[3]);
$c4 = mysql_real_escape_string($data[4]); $c5 = mysql_real_escape_string($data[5]); $c6 = mysql_real_escape_string($data[6]); $c7 = mysql_real_escape_string($data[7]);    
$c8 = mysql_real_escape_string($data[8]); $c9 = mysql_real_escape_string($data[9]); $c10 = mysql_real_escape_string($data[10]); $c11 = mysql_real_escape_string($data[11]);
$c12 = mysql_real_escape_string($data[12]); $c13 = mysql_real_escape_string($data[13]); $c14 = mysql_real_escape_string($data[14]); $c15 = mysql_real_escape_string($data[15]);
$c16 = mysql_real_escape_string($data[16]); $c17 = mysql_real_escape_string($data[17]); $c18 = mysql_real_escape_string($data[18]); $c19 = mysql_real_escape_string($data[19]);
$c20 = mysql_real_escape_string($data[20]); $c21 = mysql_real_escape_string($data[21]); $c22 = mysql_real_escape_string($data[22]); $c23 = mysql_real_escape_string($data[23]);    
$c24 = mysql_real_escape_string($data[24]); $c25 = mysql_real_escape_string($data[25]); $c26 = mysql_real_escape_string($data[26]); $c27 = mysql_real_escape_string($data[27]);
$c28 = mysql_real_escape_string($data[28]); $c29 = mysql_real_escape_string($data[29]); $c30 = mysql_real_escape_string($data[30]); $c31 = mysql_real_escape_string($data[31]);    
$c32 = mysql_real_escape_string($data[32]); $c33 = mysql_real_escape_string($data[33]); $c34 = mysql_real_escape_string($data[34]); $c35 = mysql_real_escape_string($data[35]);
$c36 = mysql_real_escape_string($data[36]); $c37 = mysql_real_escape_string($data[37]); $c38 = mysql_real_escape_string($data[38]); $c39 = mysql_real_escape_string($data[39]);  
$c40 = mysql_real_escape_string($data[40]); $c41 = mysql_real_escape_string($data[41]); $c42 = mysql_real_escape_string($data[42]); $c43 = mysql_real_escape_string($data[43]);
$c44 = mysql_real_escape_string($data[44]); $c45 = mysql_real_escape_string($data[45]); $c46 = mysql_real_escape_string($data[46]); $c47 = mysql_real_escape_string($data[47]);
$c48 = mysql_real_escape_string($data[48]); $c49 = mysql_real_escape_string($data[49]); $c50 = mysql_real_escape_string($data[50]); $c51 = mysql_real_escape_string($data[51]);
$c52 = mysql_real_escape_string($data[52]); $c53 = mysql_real_escape_string($data[53]); $c54 = mysql_real_escape_string($data[54]); $c55 = mysql_real_escape_string($data[55]);

  //Achiment-1 (7 11 15 19 23 27 31 35 39 43 47 51) 
  if($ctr>5 AND $c2!='')
  { 
    $sqlIP=mysql_query("Select ProductId,ItemId from hrm_sales_seedsproduct WHERE ProductName='".$c2."'", $con); $rowIP=mysql_num_rows($sqlIP);
    if($rowIP==1)
    { $resIP=mysql_fetch_assoc($sqlIP);
	
	  if($c7>0 OR $c7<0 OR $c11>0 OR $c11<0 OR $c15>0 OR $c15<0 OR $c19>0 OR $c19<0 OR $c23>0 OR $c23<0 OR $c27>0 OR $c27<0 OR $c31>0 OR $c31<0 OR $c35>0 OR $c35<0 OR $c39>0 OR $c39<0 OR $c43>0 OR $c43<0 OR $c47>0 OR $c47<0 OR $c51>0 OR $c51<0)
	  { 
  if($c7=='' OR $c7=='#N/A'){$cc7=0;}else{$cc7=$c7;}      if($c11=='' OR $c11=='#N/A'){$cc11=0;}else{$cc11=$c11;} if($c15=='' OR $c15=='#N/A'){$cc15=0;}else{$cc15=$c15;} 
  if($c19=='' OR $c19=='#N/A'){$cc19=0;}else{$cc19=$c19;} if($c23=='' OR $c23=='#N/A'){$cc23=0;}else{$cc23=$c23;} if($c27=='' OR $c27=='#N/A'){$cc27=0;}else{$cc27=$c27;} 
  if($c31=='' OR $c31=='#N/A'){$cc31=0;}else{$cc31=$c31;} if($c35=='' OR $c35=='#N/A'){$cc35=0;}else{$cc35=$c35;} if($c39=='' OR $c39=='#N/A'){$cc39=0;}else{$cc39=$c39;} 
  if($c43=='' OR $c43=='#N/A'){$cc43=0;}else{$cc43=$c43;} if($c47=='' OR $c47=='#N/A'){$cc47=0;}else{$cc47=$c47;} if($c51=='' OR $c51=='#N/A'){$cc51=0;}else{$cc51=$c51;}
      $sql=mysql_query("Select * from hrm_sales_sal_details WHERE DealerId=".$_POST['DI']." AND ItemId=".$resIP['ItemId']." AND ProductId=".$resIP['ProductId']." AND YearId=".$_POST['Befor2Y'], $con); $rows = mysql_num_rows($sql); 
	  if($rows>0){ $sqlUp = mysql_query("UPDATE hrm_sales_sal_details SET M1_Ach='".$cc7."',M2_Ach='".$cc11."',M3_Ach='".$cc15."',M4_Ach='".$cc19."',M5_Ach='".$cc23."',M6_Ach='".$cc27."',M7_Ach='".$cc31."',M8_Ach='".$cc35."',M9_Ach='".$cc39."',M10_Ach='".$cc43."',M11_Ach='".$cc47."',M12_Ach='".$cc51."' WHERE DealerId=".$_POST['DI']." AND ItemId=".$resIP['ItemId']." AND ProductId=".$resIP['ProductId']." AND YearId=".$_POST['Befor2Y'], $con); }
	  elseif($rows==0){ $sqlUp = mysql_query("insert into hrm_sales_sal_details(DealerId, ItemId, ProductId, YearId, M1_Ach, M2_Ach, M3_Ach, M4_Ach, M5_Ach, M6_Ach, M7_Ach, M8_Ach, M9_Ach, M10_Ach, M11_Ach, M12_Ach) values(".$_POST['DI'].", ".$resIP['ItemId'].", ".$resIP['ProductId'].", ".$_POST['Befor2Y'].", ".$cc7.", ".$cc11.", ".$cc15.", ".$cc19.", ".$cc23.", ".$cc27.", ".$cc31.", ".$cc35.", ".$cc39.", ".$cc43.", ".$cc47.", ".$cc51.")", $con); }
	  }
	  //Achiment-2 (8 12 16 20 24 28 32 36 40 44 48 52) 
	  if($c8>0 OR $c8<0 OR $c12>0 OR $c12<0 OR $c16>0 OR $c16<0 OR $c20>0 OR $c20<0 OR $c24>0 OR $c24<0 OR $c28>0 OR $c28<0 OR $c32>0 OR $c32<0 OR $c36>0 OR $c36<0 OR $c40>0 OR $c40<0 OR $c44>0 OR $c44<0 OR $c48>0 OR $c48<0 OR $c52>0 OR $c52<0)
	  {
  if($c8=='' OR $c8=='#N/A'){$cc8=0;}else{$cc8=$c8;}      if($c12=='' OR $c12=='#N/A'){$cc12=0;}else{$cc12=$c12;} if($c16=='' OR $c16=='#N/A'){$cc16=0;}else{$cc16=$c16;} 
  if($c20=='' OR $c20=='#N/A'){$cc20=0;}else{$cc20=$c20;} if($c24=='' OR $c24=='#N/A'){$cc24=0;}else{$cc24=$c24;} if($c28=='' OR $c28=='#N/A'){$cc28=0;}else{$cc28=$c28;} 
  if($c32=='' OR $c32=='#N/A'){$cc32=0;}else{$cc32=$c32;} if($c36=='' OR $c36=='#N/A'){$cc36=0;}else{$cc36=$c36;} if($c40=='' OR $c40=='#N/A'){$cc40=0;}else{$cc40=$c40;} 
  if($c44=='' OR $c44=='#N/A'){$cc44=0;}else{$cc44=$c44;} if($c48=='' OR $c48=='#N/A'){$cc48=0;}else{$cc48=$c48;} if($c52=='' OR $c52=='#N/A'){$cc52=0;}else{$cc52=$c52;} 
	  $sql=mysql_query("Select * from hrm_sales_sal_details WHERE DealerId=".$_POST['DI']." AND ItemId=".$resIP['ItemId']." AND ProductId=".$resIP['ProductId']." AND YearId=".$_POST['Befor1Y'], $con); $rows = mysql_num_rows($sql); 
	  if($rows>0){ $sqlUp = mysql_query("UPDATE hrm_sales_sal_details SET M1_Ach='".$cc8."',M2_Ach='".$cc12."',M3_Ach='".$cc16."',M4_Ach='".$cc20."',M5_Ach='".$cc24."',M6_Ach='".$cc28."',M7_Ach='".$cc32."',M8_Ach='".$cc36."',M9_Ach='".$cc40."',M10_Ach='".$cc44."',M11_Ach='".$cc48."',M12_Ach='".$cc52."' WHERE DealerId=".$_POST['DI']." AND ItemId=".$resIP['ItemId']." AND ProductId=".$resIP['ProductId']." AND YearId=".$_POST['Befor1Y'], $con); }
	  elseif($rows==0){ $sqlUp = mysql_query("insert into hrm_sales_sal_details(DealerId, ItemId, ProductId, YearId, M1_Ach, M2_Ach, M3_Ach, M4_Ach, M5_Ach, M6_Ach, M7_Ach, M8_Ach, M9_Ach, M10_Ach, M11_Ach, M12_Ach) values(".$_POST['DI'].", ".$resIP['ItemId'].", ".$resIP['ProductId'].", ".$_POST['Befor1Y'].", ".$cc8.", ".$cc12.", ".$cc16.", ".$cc20.", ".$cc24.", ".$cc28.", ".$cc32.", ".$cc36.", ".$cc40.", ".$cc44.", ".$cc48.", ".$cc52.")", $con); }
	  }
	  //Target-3 (9 13 17 21 25 29 33 37 41 45 49 53)
	  if($c9>0 OR $c9<0 OR $c13>0 OR $c13<0 OR $c17>0 OR $c17<0 OR $c21>0 OR $c21<0 OR $c25>0 OR $c25<0 OR $c29>0 OR $c29<0 OR $c33>0 OR $c33<0 OR $c37>0 OR $c37<0 OR $c41>0 OR $c41<0 OR $c45>0 OR $c45<0 OR $c49>0 OR $c49<0 OR $c53>0 OR $c53<0)
	  {
  if($c9=='' OR $c9=='#N/A'){$cc9=0;}else{$cc9=$c9;}      if($c13=='' OR $c13=='#N/A'){$cc13=0;}else{$cc13=$c13;} if($c17=='' OR $c17=='#N/A'){$cc17=0;}else{$cc17=$c17;} 
  if($c21=='' OR $c21=='#N/A'){$cc21=0;}else{$cc21=$c21;} if($c25=='' OR $c25=='#N/A'){$cc25=0;}else{$cc25=$c25;} if($c29=='' OR $c29=='#N/A'){$cc29=0;}else{$cc29=$c29;} 
  if($c33=='' OR $c33=='#N/A'){$cc33=0;}else{$cc33=$c33;} if($c37=='' OR $c37=='#N/A'){$cc37=0;}else{$cc37=$c37;} if($c41=='' OR $c41=='#N/A'){$cc41=0;}else{$cc41=$c41;} 
  if($c45=='' OR $c45=='#N/A'){$cc45=0;}else{$cc45=$c45;} if($c49=='' OR $c49=='#N/A'){$cc49=0;}else{$cc49=$c49;} if($c53=='' OR $c53=='#N/A'){$cc53=0;}else{$cc53=$c53;} 
	  $sql=mysql_query("Select * from hrm_sales_sal_details WHERE DealerId=".$_POST['DI']." AND ItemId=".$resIP['ItemId']." AND ProductId=".$resIP['ProductId']." AND YearId=".$_POST['YearV'], $con); $rows = mysql_num_rows($sql); 
	  if($rows>0){ $sqlUp = mysql_query("UPDATE hrm_sales_sal_details SET M1='".$cc9."',M2='".$cc13."',M3='".$cc17."',M4='".$cc21."',M5='".$cc25."',M6='".$cc29."',M7='".$cc33."',M8='".$cc37."',M9='".$cc41."',M10='".$cc45."',M11='".$cc49."',M12='".$cc53."' WHERE DealerId=".$_POST['DI']." AND ItemId=".$resIP['ItemId']." AND ProductId=".$resIP['ProductId']." AND YearId=".$_POST['YearV'], $con); }
	  elseif($rows==0){ $sqlUp = mysql_query("insert into hrm_sales_sal_details(DealerId, ItemId, ProductId, YearId, M1, M2, M3, M4, M5, M6, M7, M8, M9, M10, M11, M12) values(".$_POST['DI'].", ".$resIP['ItemId'].", ".$resIP['ProductId'].", ".$_POST['YearV'].", ".$cc9.", ".$cc13.", ".$cc17.", ".$cc21.", ".$cc25.", ".$cc29.", ".$cc33.", ".$cc37.", ".$cc41.", ".$cc45.", ".$cc49.", ".$cc53.")", $con); }
	  }
	  //Projection-4 (10 14 18 22 26 30 34 38 42 46 50 54)
	  if($c10>0 OR $c10<0 OR $c14>0 OR $c14<0 OR $c18>0 OR $c18<0 OR $c22>0 OR $c22<0 OR $c26>0 OR $c26<0 OR $c30>0 OR $c30<0 OR $c34>0 OR $c34<0 OR $c38>0 OR $c38<0 OR $c42>0 OR $c42<0 OR $c46>0 OR $c46<0 OR $c50>0 OR $c50<0 OR $c54>0 OR $c54<0)
	  {
  if($c10=='' OR $c10=='#N/A'){$cc10=0;}else{$cc10=$c10;} if($c14=='' OR $c14=='#N/A'){$cc14=0;}else{$cc14=$c14;} if($c18=='' OR $c18=='#N/A'){$cc18=0;}else{$cc18=$c18;} 
  if($c22=='' OR $c22=='#N/A'){$cc22=0;}else{$cc22=$c22;} if($c26=='' OR $c26=='#N/A'){$cc26=0;}else{$cc26=$c26;} if($c30=='' OR $c30=='#N/A'){$cc30=0;}else{$cc30=$c30;} 
  if($c34=='' OR $c34=='#N/A'){$cc34=0;}else{$cc34=$c34;} if($c38=='' OR $c38=='#N/A'){$cc38=0;}else{$cc38=$c38;} if($c42=='' OR $c42=='#N/A'){$cc42=0;}else{$cc42=$c42;} 
  if($c46=='' OR $c46=='#N/A'){$cc46=0;}else{$cc46=$c46;} if($c50=='' OR $c50=='#N/A'){$cc50=0;}else{$cc50=$c50;} if($c54=='' OR $c54=='#N/A'){$cc54=0;}else{$cc54=$c54;} 
	  $sql=mysql_query("Select * from hrm_sales_sal_details WHERE DealerId=".$_POST['DI']." AND ItemId=".$resIP['ItemId']." AND ProductId=".$resIP['ProductId']." AND YearId=".$_POST['NextY'], $con); $rows = mysql_num_rows($sql); 
	  if($rows>0){ $sqlUp = mysql_query("UPDATE hrm_sales_sal_details SET M1='".$cc10."',M2='".$cc14."',M3='".$cc18."',M4='".$cc22."',M5='".$cc26."',M6='".$cc30."',M7='".$cc34."',M8='".$cc38."',M9='".$cc42."',M10='".$cc46."',M11='".$cc50."',M12='".$cc54."' WHERE DealerId=".$_POST['DI']." AND ItemId=".$resIP['ItemId']." AND ProductId=".$resIP['ProductId']." AND YearId=".$_POST['NextY'], $con); }
	  elseif($rows==0){ $sqlUp = mysql_query("insert into hrm_sales_sal_details(DealerId, ItemId, ProductId, YearId, M1, M2, M3, M4, M5, M6, M7, M8, M9, M10, M11, M12) values(".$_POST['DI'].", ".$resIP['ItemId'].", ".$resIP['ProductId'].", ".$_POST['NextY'].", ".$cc10.", ".$cc14.", ".$cc18.", ".$cc22.", ".$cc26.", ".$cc30.", ".$cc34.", ".$cc38.", ".$cc42.", ".$cc46.", ".$cc50.", ".$cc54.")", $con); }
	  }
	  
     }
  }
   
  //else { $ctr++; }
  $ctr++;
 }
 fclose($handle);
 if($sql){ $msgImp= '<font color="#008000"><b>Product achivement target details for ID '.$_POST['DI'].' uploaded successfully...</b></font>';}
 }
 }
}

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
.InputB{font-size:13px;width:60px;text-align:right;border:0px;font-weight:bold;background-color:#D9D9FF;} 
.Input{font-size:13px;width:60px;text-align:right;border:0px;background-color:#EEEEEE;}
.TInput{font-size:13px;width:60px;text-align:right;border:0px;background-color:#FFFFA6;font-weight:bold;}
.Trh60{text-align:center;width:60px;font-weight:bold;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script language="javascript">
function ChangrYear(YearV,ci) 
{
  var c=0; var s=0; var hq=0;
  window.location="Set2Plan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&c="+c+"&s="+s+"&hq="+hq;
}

function ClickCoutry(v)
{ 
  var State=0; var Hq=0; var y=document.getElementById("YearV").value;
  window.location="Set2Plan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+v+"&s="+State+"&hq="+Hq+"&y="+y; 
}
function ClickState(v)
{
  var Coutry=document.getElementById("Coutry").value; var Hq=0; var y=document.getElementById("YearV").value;
  window.location="Set2Plan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+Coutry+"&s="+v+"&hq="+Hq+"&y="+y; 
}
function ClickHq(v)
{
  var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value; var y=document.getElementById("YearV").value;
  window.location="Set2Plan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+Coutry+"&s="+State+"&hq="+v+"&y="+y;
}

function FunUpLD(di,sn)
{ var UpLDFile=document.getElementById("At_csv_f"+sn).value;  var y=document.getElementById("YearV").value; 
  var url = 'Set2PlanUpLD.php';	var pars = 'Action=TarAChivUpload&UpLDF='+UpLDFile+'&sn='+sn+'&di='+di+'&y='+y;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_UpMsg });
}
function show_UpMsg(originalRequest)
{ document.getElementById('ResultSpan').innerHTML = originalRequest.responseText; 
  var sn=document.getElementById("sn").value; document.getElementById("msg_"+sn).style.display='block';
}

function FunAchTgtTxls()
{ window.open("FormateFile.php?act=AchTrgtFileOpen","MyFile","width=200,height=200");}
  
</Script>
</head>
<body class="body">
<span id="ResultSpan"></span>
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<input type="hidden" id="ComId" value="<?php echo $_REQUEST['ci']; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" id="YId" value="<?php echo $YearId; ?>" />			  
<table border="0" style="margin-top:0px; width:100%; height:150px;">	
<tr>
 <td valign="top">
  <table border="0">
   <tr>
    <td id="Entry" style="width:1000px;" valign="top">
	<span id="TabEntry">
     <table border="0">
	  <tr>
	   <td style="font-size:14px;height:18px;width:100px; color:#FFFF6A;" align="right"><b>Overall-></b>&nbsp;</td>
	   <td style="font-size:11px;height:18px;width:90px;color:#E6E6E6;" align="right"><b>Year:</b>&nbsp;</td>
	     <td style="width:90px;">
		 <select style="font-size:12px;width:90px;height:20px;background-color:#DDFFBB;" name="YearV" id="YearV" onChange="ChangrYear(this.value, <?php echo $_REQUEST['ci']; ?>)"> 
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate'])); $NextYear=$_REQUEST['y']+1; $PrevYear=$_REQUEST['y']-1; 
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>		
         <option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $fromdate.'-'.$todate; ?></option>
<?php if($PrevYear>=1){?><option value="<?php echo $PrevYear; ?>"><?php echo date("Y",strtotime($resy3['FromDate'])).'-'.date("Y",strtotime($resy3['ToDate'])); ?></option><?php } ?><option value="<?php echo $NextYear; ?>"><?php echo date("Y",strtotime($resy2['FromDate'])).'-'.date("Y",strtotime($resy2['ToDate'])); ?></option></select>
        </td>
		<td>&nbsp;</td>
	    
	    <td style="font-size:11px;height:18px;width:90px;color:#E6E6E6;" align="right"><b>Country :</b></td>
	    <td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="Coutry" id="Coutry" onChange="ClickCoutry(this.value)"> 
<?php if($_REQUEST['c']>0){ $sqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['c'], $con); $resC=mysql_fetch_array($sqlC); ?>
<option value="<?php echo $_REQUEST['c']; ?>"><?php echo strtoupper($resC['CountryName']); ?></option><?php }else{ ?><option value="">SELECT</option><?php } ?>		
<?php $SqlCountry=mysql_query("SELECT * FROM hrm_country order by CountryName ASC", $con); while($ResCountry=mysql_fetch_array($SqlCountry)) { ?>
<option value="<?php echo $ResCountry['CountryId']; ?>"><?php echo strtoupper($ResCountry['CountryName']); ?></option><?php } ?></select>
       </td>
	   <td>&nbsp;</td>
	   <td style="font-size:11px;height:18px;width:80px;color:#E6E6E6;" align="right"><b>State :</b></td>
	    <td>
		 <span id="StateSpan">
		 <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="ClickState(this.value)">
<?php if($_REQUEST['s']>0){ $sqlS=mysql_query("SELECT StateName FROM hrm_state where StateId=".$_REQUEST['s'], $con); $resS=mysql_fetch_array($sqlS); ?>
<option value="<?php echo $_REQUEST['s']; ?>"><?php echo strtoupper($resS['StateName']); ?></option><?php }else{ ?><option value="">SELECT</option><?php } ?>
<?php if($_REQUEST['c']>0){ $sqlS2 = mysql_query("SELECT * FROM hrm_state where CountryId=".$_REQUEST['c']." order by StateName ASC", $con); while($resS2 = mysql_fetch_array($sqlS2)){ ?><option value="<?php echo $resS2['StateId']; ?>"><?php echo strtoupper($resS2['StateName']); ?></option><?php } ?>	
<?php } else{$sql = mysql_query("SELECT * FROM hrm_state order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
        <option value="<?php echo $res['StateId']; ?>"><?php echo strtoupper($res['StateName']); ?></option><?php } } ?></select>
		 </span>
		</td>
		<td>&nbsp;</td>
		<td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="right"><b>HQ :</b></td>
	     <td>
		 <span id="HqSpan">
		 <select style="font-size:12px;width:150px;height:20px;background-color:#DDFFBB;" name="Hq" id="Hq" onChange="ClickHq(this.value)">
<?php if($_REQUEST['hq']>0){ $sqlhq=mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$_REQUEST['hq']." AND CompanyId=1", $con); $reshq=mysql_fetch_array($sqlhq); ?>
<option value="<?php echo $_REQUEST['hq']; ?>"><?php echo strtoupper($reshq['HqName']); ?></option><?php }else{ ?><option value="">SELECT</option><?php } ?>
<?php if($_REQUEST['s']>0){ $sqlhq2 = mysql_query("SELECT * FROM hrm_headquater where StateId=".$_REQUEST['s']." AND CompanyId=1 AND HQStatus='A' order by HqName ASC", $con); while($reshq2 = mysql_fetch_array($sqlhq2)){ ?><option value="<?php echo $reshq2['HqId']; ?>"><?php echo strtoupper($reshq2['HqName']); ?></option><?php } ?>
<?php }else { $sql = mysql_query("SELECT * FROM hrm_headquater where CompanyId=".$CompanyId." AND HQStatus='A' order by HqName ASC", $con); while($res = mysql_fetch_array($sql)){ ?><option value="<?php echo $res['HqId']; ?>"><?php echo strtoupper($res['HqName']); ?></option><?php } } ?></select>
		 </span>
		 </td>
		 <td>&nbsp;&nbsp;&nbsp;</td>
		 <td><b><a href="#" onClick="FunAchTgtTxls('xls')" style="width:90px;font-size:12px; color:#FFFFFF;">Formate</a></b></td>
	  </tr>
	   </table>
      </td>
   </tr>
  </table>
  </td>
  </tr>
  <tr>
    <td colspan="3" valign="top">
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:<?php if(($_REQUEST['c']>0 AND $_REQUEST['s']>0 AND $_REQUEST['hq']>0) OR ($_REQUEST['hq']>0)){echo '850';}elseif($_REQUEST['c']>0 AND $_REQUEST['s']>0){echo '1000';}elseif($_REQUEST['c']>0){echo '1200'; }?>px; vertical-align:top;">	
   
   <tr style="background-color:#D9F28C;color:#000000;"> 
   <?php if($_REQUEST['hq']>0){ $sqlhq=mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$_REQUEST['hq'], $con); $reshq=mysql_fetch_array($sqlhq); ?> <td colspan="4">&nbsp;&nbsp;<b>HeadQuarter:&nbsp;<?php echo strtoupper($reshq['HqName']); ?></b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $msgImp; ?></td>
   <?php } elseif($_REQUEST['s']>0){ $sqlS=mysql_query("SELECT StateName FROM hrm_state where StateId=".$_REQUEST['s'], $con); $resS=mysql_fetch_array($sqlS);?><td colspan="5">&nbsp;&nbsp;<b>State:&nbsp;<?php echo strtoupper($resS['StateName']); ?></b>&nbsp;&nbsp;<?php echo $msgImp; ?></td>
   <?php } elseif($_REQUEST['c']>0){ $sqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['c'], $con); $resC=mysql_fetch_array($sqlC); ?> 
    <td colspan="6">&nbsp;&nbsp;<b>Country:&nbsp;<?php echo strtoupper($resC['CountryName']); ?></b>&nbsp;&nbsp;<?php echo $msgImp; ?></td>
   <?php } ?>			
  </tr>	
  
   <tr style="background-color:#D5F1D1;color:#000000;"> 
   <?php if($_REQUEST['hq']>0){?> 
    <td align="center" style="width:30px;"><b>SN</b></td>
	<td align="center" style="width:400px;"><b>DEALER</b></td>
	<td align="center" style="width:350px;"><b>IMPORT</b></td>
	<td align="center" style="width:60px;"><b>SAVE</b></td>
   <?php } elseif($_REQUEST['s']>0){?>
    <td align="center" style="width:30px;"><b>SN</b></td>
	<td align="center" style="width:150px;"><b>HQ</b></td>
	<td align="center" style="width:400px;"><b>DEALER</b></td>
	<td align="center" style="width:350px;"><b>IMPORT</b></td>
	<td align="center" style="width:60px;"><b>SAVE</b></td>
   <?php } elseif($_REQUEST['c']>0){?> 
    <td align="center" style="width:30px;"><b>SN</b></td>
	<td align="center" style="width:150px;"><b>STATE</b></td>
	<td align="center" style="width:150px;"><b>HQ</b></td>
	<td align="center" style="width:400px;"><b>DEALER</b></td>
	<td align="center" style="width:350px;"><b>IMPORT</b></td>
	<td align="center" style="width:65px;"><b>SAVE</b></td>
   <?php } ?>			
  </tr>	
<?php if($_REQUEST['hq']>0){$sqlDeal=mysql_query("select DealerId,DealerName,DealerCity from hrm_sales_dealer where HqId=".$_REQUEST['hq']." order by DealerName ASC",$con); $sn=1; $rowDeal=mysql_num_rows($sqlDeal); if($rowDeal>0){ while($resDeal=mysql_fetch_assoc($sqlDeal)){ ?>
 <tr bgcolor="#EEEEEE" style="height:22px;background-color:<?php if($i==1){echo '#E2F3D8'; }?>;"> 
<form name="FormNrv_<?php echo $sn; ?>" method="POST" enctype="multipart/form-data">
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate']));  
	  $NextYear=$_REQUEST['y']+1; $PrevYear=$_REQUEST['y']-1; $Prev2Year=$_REQUEST['y']-2;
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>
	  <input type="hidden" name="DI" value="<?php echo $resDeal['DealerId']; ?>" /><input type="hidden" name="SN" value="<?php echo $sn; ?>" />
	  <input type="hidden" name="Befor2Y" value="<?php echo $Prev2Year; ?>" /><input type="hidden" name="Befor1Y" value="<?php echo $PrevYear; ?>" />
	  <input type="hidden" name="NextY" value="<?php echo $NextYear; ?>" />	<input type="hidden" name="YearV" value="<?php echo $_REQUEST['y']; ?>" />
     <td align="center"><?php echo $sn; ?></td>			 
      <td>&nbsp;<?php echo $resDeal['DealerName'].' - <font color="#79003D">'.$resDeal['DealerCity'].'</font> -- '.$resDeal['DealerId']; ?></td>
	 <td><input type="file" name="AchTgt_csv_file" id="AchTgt_csv_file" style="width:300px;" size="30"/></td>
	 <td align="center"><input type="submit" style="width:60px;" name="SaveAchTgt" value="Upload" id="AchTgtId"/></td>
</form>	 
 </tr>
<?php $sn++;} } else{echo '<tr bgcolor="#FFFFFF"><td colspan="6" style="color:#FF8000;font-size:14px;font-weight:bold;">&nbsp;Records Not Available..</td></tr>';} ?> 
<?php } elseif($_REQUEST['s']>0){$sqlDeal=mysql_query("select HqName,DealerId,DealerName,DealerCity from hrm_sales_dealer INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId where hrm_headquater.StateId=".$_REQUEST['s']." order by HqName ASC, DealerName ASC",$con); $sn=1; $rowDeal=mysql_num_rows($sqlDeal); if($rowDeal>0){ while($resDeal=mysql_fetch_assoc($sqlDeal)){ $di=$resDeal['DealerId']; ?>
 <tr bgcolor="#EEEEEE" style="height:22px;background-color:<?php if($i==1){echo '#E2F3D8'; }?>;"> 
<form name="FormNrv_<?php echo $sn; ?>" method="POST" enctype="multipart/form-data">
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate']));  
	  $NextYear=$_REQUEST['y']+1; $PrevYear=$_REQUEST['y']-1; $Prev2Year=$_REQUEST['y']-2;
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>
	  <input type="hidden" name="DI" value="<?php echo $resDeal['DealerId']; ?>" /><input type="hidden" name="SN" value="<?php echo $sn; ?>" />
	  <input type="hidden" name="Befor2Y" value="<?php echo $Prev2Year; ?>" /><input type="hidden" name="Befor1Y" value="<?php echo $PrevYear; ?>" />
	  <input type="hidden" name="NextY" value="<?php echo $NextYear; ?>" />	<input type="hidden" name="YearV" value="<?php echo $_REQUEST['y']; ?>" />
     <td align="center"><?php echo $sn; ?></td>		
     <td>&nbsp;<?php echo $resDeal['HqName']; ?></td>	 
      <td>&nbsp;<?php echo $resDeal['DealerName'].' - <font color="#79003D">'.$resDeal['DealerCity'].'</font> -- '.$resDeal['DealerId']; ?></td>
	 <td><input type="file" name="AchTgt_csv_file" id="AchTgt_csv_file" style="width:300px;" size="30"/></td>
	 <td align="center"><input type="submit" style="width:60px;" name="SaveAchTgt" value="Upload" id="AchTgtId"/></td>
</form>	 
 </tr>
<?php $sn++;} } else{echo '<tr bgcolor="#FFFFFF"><td colspan="6" style="color:#FF8000;font-size:14px;font-weight:bold;">&nbsp;Records Not Available..</td></tr>';} ?> 
<?php  } elseif($_REQUEST['c']>0){ $sqlDeal=mysql_query("select StateName,HqName,DealerId,DealerName,DealerCity from hrm_sales_dealer INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId INNER JOIN hrm_state ON hrm_headquater.StateId=hrm_state.StateId where hrm_state.CountryId=".$_REQUEST['c']." order by StateName ASC,HqName ASC,DealerName ASC",$con); $sn=1; $rowDeal=mysql_num_rows($sqlDeal); if($rowDeal>0){ while($resDeal=mysql_fetch_assoc($sqlDeal)){ 
$di=$resDeal['DealerId']; ?>
 <tr bgcolor="#EEEEEE" style="height:22px;background-color:<?php if($i==1){echo '#E2F3D8'; }?>;"> 
<form name="FormNrv_<?php echo $sn; ?>" method="POST" enctype="multipart/form-data">
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate']));  
	  $NextYear=$_REQUEST['y']+1; $PrevYear=$_REQUEST['y']-1; $Prev2Year=$_REQUEST['y']-2;
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>
	  <input type="hidden" name="DI" value="<?php echo $resDeal['DealerId']; ?>" /><input type="hidden" name="SN" value="<?php echo $sn; ?>" />
	  <input type="hidden" name="Befor2Y" value="<?php echo $Prev2Year; ?>" /><input type="hidden" name="Befor1Y" value="<?php echo $PrevYear; ?>" />
	  <input type="hidden" name="NextY" value="<?php echo $NextYear; ?>" />	<input type="hidden" name="YearV" value="<?php echo $_REQUEST['y']; ?>" />
     <td align="center"><?php echo $sn; ?></td>	
	 <td>&nbsp;<?php echo $resDeal['StateName']; ?></td>	
     <td>&nbsp;<?php echo $resDeal['HqName']; ?></td>	 
      <td>&nbsp;<?php echo $resDeal['DealerName'].' - <font color="#79003D">'.$resDeal['DealerCity'].'</font> -- '.$resDeal['DealerId']; ?></td>
	 <td><input type="file" name="AchTgt_csv_file" id="AchTgt_csv_file" style="width:300px;" size="30"/></td>
	 <td align="center"><input type="submit" style="width:60px;" name="SaveAchTgt" value="Upload" id="AchTgtId"/></td>
</form>	 
 </tr>
</form> 
<?php $sn++;} } else{echo '<tr bgcolor="#FFFFFF"><td colspan="6" style="color:#FF8000;font-size:14px;font-weight:bold;">&nbsp;Records Not Available..</td></tr>';} ?> 
<?php } ?> 	  	  
</table>	  
    </td>
   </tr> 	
  </table>
 </td>
</tr>
</table>
		
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
		
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

</html>
