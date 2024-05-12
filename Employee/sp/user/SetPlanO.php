<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
//**********************************************************************************************************************

/*
if(isset($_POST['SaveAchQQ']))
{
 if ($_FILES['AchQ_csv_file']['error'] > 0) {
  echo "Error: " . $_FILES['AchQ_csv_file']['error'] . "<br />"; 
 }else{  
  if (($handle = fopen($_FILES['AchQ_csv_file']['tmp_name'], "r"))!== FALSE) {
   $ctr = 1; // used to exclude the CSV header
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
$c0 = mysql_real_escape_string($data[0]); $c1 = mysql_real_escape_string($data[1]); 
$c2 = mysql_real_escape_string($data[2]); $c3 = mysql_real_escape_string($data[3]);
$c4 = mysql_real_escape_string($data[4]); $c5 = mysql_real_escape_string($data[5]); $c6 = mysql_real_escape_string($data[6]); $c7 = mysql_real_escape_string($data[7]); 
$c8 = mysql_real_escape_string($data[8]); $c9 = mysql_real_escape_string($data[9]); $c10 = mysql_real_escape_string($data[10]); $c11 = mysql_real_escape_string($data[11]);
 
   //echo $ctr.'<br>';
   if ($ctr>2 AND $c0>0 AND $c0!='') 
	{   
	   if($c4==''){$c4_c=0;}else{$c4_c=$c4;} if($c5==''){$c5_c=0;}else{$c5_c=$c5;}
	   $search =  '$/\-' ; $search = str_split($search);
       $cc4=str_replace($search, "", $c4_c); $cc5=str_replace($search, "", $c5_c); $cc3=str_replace($search, "", $c3);
	   
	   
	   $sqlUp = mysql_query("UPDATE hrm_sales_dealer SET DealerAdd='".$cc3."',DealerPerson='".$c9."',DealerEmail='".$c8."',DealerCont='".$cc4."',DealerCont2='".$cc5."' WHERE DealerId=".$c0, $con);
	}
    //else { $ctr++; }
	$ctr++;
   }
   fclose($handle);
   if($sqlUp){ $MsgImpAchQ= 'Delear reports details uploaded successfully...';}
  }
 }
}
*/

/*
if(isset($_POST['SaveAchQQ']))
{
 if ($_FILES['AchQ_csv_file']['error'] > 0) {
  echo "Error: " . $_FILES['AchQ_csv_file']['error'] . "<br />"; 
 }else{  
  if (($handle = fopen($_FILES['AchQ_csv_file']['tmp_name'], "r"))!== FALSE) {
   $ctr = 1; // used to exclude the CSV header
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
$c0 = mysql_real_escape_string($data[0]); $c1 = mysql_real_escape_string($data[1]); 
$c2 = mysql_real_escape_string($data[2]); $c3 = mysql_real_escape_string($data[3]);
$c4 = mysql_real_escape_string($data[4]); $c5 = mysql_real_escape_string($data[5]); $c6 = mysql_real_escape_string($data[6]); $c7 = mysql_real_escape_string($data[7]); 
$c8 = mysql_real_escape_string($data[8]); $c9 = mysql_real_escape_string($data[9]); $c10 = mysql_real_escape_string($data[10]); $c11 = mysql_real_escape_string($data[11]);
$c12 = mysql_real_escape_string($data[12]); $c13 = mysql_real_escape_string($data[13]); $c14 = mysql_real_escape_string($data[14]); $c15 = mysql_real_escape_string($data[15]);
$c16 = mysql_real_escape_string($data[16]); $c17 = mysql_real_escape_string($data[17]); $c18 = mysql_real_escape_string($data[18]); $c19 = mysql_real_escape_string($data[19]);
$c20 = mysql_real_escape_string($data[20]); $c21 = mysql_real_escape_string($data[21]); $c22 = mysql_real_escape_string($data[22]); $c23 = mysql_real_escape_string($data[23]);
$c24 = mysql_real_escape_string($data[24]); $c25 = mysql_real_escape_string($data[25]); $c26 = mysql_real_escape_string($data[26]); $c27 = mysql_real_escape_string($data[27]); 

$c28 = mysql_real_escape_string($data[28]); $c29 = mysql_real_escape_string($data[29]); $c30 = mysql_real_escape_string($data[30]); $c31 = mysql_real_escape_string($data[31]); 
$c32 = mysql_real_escape_string($data[32]); $c33 = mysql_real_escape_string($data[33]);
 
   //echo $ctr.'<br>';
   if ($ctr>2 AND $c0>0 AND $c1!='') 
	{ 
	 $sqlIP=mysql_query("Select ProductId,ItemId from hrm_sales_seedsproduct WHERE ProductId='".$c1."'", $con); $rowIP=mysql_num_rows($sqlIP);
	 if($rowIP>0)
	 { $resIP=mysql_fetch_assoc($sqlIP);
	 
	   if($c2>0 OR $c2<0 OR $c3>0 OR $c3<0 OR $c4>0 OR $c4<0 OR $c5>0 OR $c5<0 OR $c6>0 OR $c6<0 OR $c7>0 OR $c7<0 OR $c8>0 OR $c8<0 OR $c9>0 OR $c9<0 OR $c10>0 OR $c10<0 OR $c11>0 OR $c11<0 OR $c12>0 OR $c12<0 OR $c13>0 OR $c13<0)
	   {    
	   if($c2==''){$c2_c=0;}else{$c2_c=$c2;} if($c3==''){$c3_c=0;}else{$c3_c=$c3;} if($c4==''){$c4_c=0;}else{$c4_c=$c4;} if($c5==''){$c5_c=0;}else{$c5_c=$c5;} 
       if($c6==''){$c6_c=0;}else{$c6_c=$c6;} if($c7==''){$c7_c=0;}else{$c7_c=$c7;} if($c8==''){$c8_c=0;}else{$c8_c=$c8;} if($c9==''){$c9_c=0;}else{$c9_c=$c9;}
       if($c10==''){$c10_c=0;}else{$c10_c=$c10;} if($c11==''){$c11_c=0;}else{$c11_c=$c11;} if($c12==''){$c12_c=0;}else{$c12_c=$c12;} if($c13==''){$c13_c=0;}else{$c13_c=$c13;}
	   $sqlChk1=mysql_query("Select * from hrm_sales_sal_details WHERE DealerId=".$c0." AND ProductId=".$resIP['ProductId']." AND YearId=2", $con); 
       $rowsChk1 = mysql_num_rows($sqlChk1); 
	   if($rowsChk1>0){ $sqlUp = mysql_query("UPDATE hrm_sales_sal_details SET M1_Ach='".$c2_c."',M2_Ach='".$c3_c."',M3_Ach='".$c4_c."',M4_Ach='".$c5_c."',M5_Ach='".$c6_c."',M6_Ach='".$c7_c."',M7_Ach='".$c8_c."',M8_Ach='".$c9_c."',M9_Ach='".$c10_c."',M10_Ach='".$c11_c."',M11_Ach='".$c12_c."',M12_Ach='".$c13_c."' WHERE DealerId=".$c0." AND ProductId=".$resIP['ProductId']." AND YearId=2", $con); }
	   elseif($rowsChk1==0){ $sqlUp = mysql_query("insert into hrm_sales_sal_details(DealerId, ItemId, ProductId, YearId, M1_Ach, M2_Ach, M3_Ach, M4_Ach, M5_Ach, M6_Ach, M7_Ach, M8_Ach, M9_Ach, M10_Ach, M11_Ach, M12_Ach) values(".$c0.", ".$resIP['ItemId'].", ".$resIP['ProductId'].", 2, ".$c2_c.", ".$c3_c.", ".$c4_c.", ".$c5_c.", ".$c6_c.", ".$c7_c.", ".$c8_c.", ".$c9_c.", ".$c10_c.", ".$c11_c.", ".$c12_c.", ".$c13_c.")", $con); }
	   } 
	  if($c15>0 OR $c15<0 OR $c16>0 OR $c16<0 OR $c17>0 OR $c17<0 OR $c18>0 OR $c18<0 OR $c19>0 OR $c19<0 OR $c20>0 OR $c20<0 OR $c21>0 OR $c21<0 OR $c22>0 OR $c22<0 OR $c23>0 OR $c23<0 OR $c24>0 OR $c24<0 OR $c25>0 OR $c25<0 OR $c26>0 OR $c26<0)
	   {   
	   if($c15==''){$c15_c=0;}else{$c15_c=$c15;} if($c16==''){$c16_c=0;}else{$c16_c=$c16;} if($c17==''){$c17_c=0;}else{$c17_c=$c17;} if($c18==''){$c18_c=0;}else{$c18_c=$c18;} 
       if($c19==''){$c19_c=0;}else{$c19_c=$c19;} if($c20==''){$c20_c=0;}else{$c20_c=$c20;} if($c21==''){$c21_c=0;}else{$c21_c=$c21;} if($c22==''){$c22_c=0;}else{$c22_c=$c22;}
       if($c23==''){$c23_c=0;}else{$c23_c=$c23;} if($c24==''){$c24_c=0;}else{$c24_c=$c24;} if($c25==''){$c25_c=0;}else{$c25_c=$c25;} if($c26==''){$c26_c=0;}else{$c26_c=$c26;}
	   $sqlChk2=mysql_query("Select * from hrm_sales_sal_details WHERE DealerId=".$c0." AND ProductId=".$resIP['ProductId']." AND YearId=3", $con); 
       $rowsChk2 = mysql_num_rows($sqlChk2); 
	   if($rowsChk2>0){ $sqlUp = mysql_query("UPDATE hrm_sales_sal_details SET M1_Ach='".$c15_c."',M2_Ach='".$c16_c."',M3_Ach='".$c17_c."',M4_Ach='".$c18_c."',M5_Ach='".$c19_c."',M6_Ach='".$c20_c."',M7_Ach='".$c21_c."',M8_Ach='".$c22_c."',M9_Ach='".$c23_c."',M10_Ach='".$c24_c."',M11_Ach='".$c25_c."',M12_Ach='".$c26_c."' WHERE DealerId=".$c0." AND ProductId=".$resIP['ProductId']." AND YearId=3", $con); }
	   elseif($rowsChk2==0){ $sqlUp = mysql_query("insert into hrm_sales_sal_details(DealerId, ItemId, ProductId, YearId, M1_Ach, M2_Ach, M3_Ach, M4_Ach, M5_Ach, M6_Ach, M7_Ach, M8_Ach, M9_Ach, M10_Ach, M11_Ach, M12_Ach) values(".$c0.", ".$resIP['ItemId'].", ".$resIP['ProductId'].", 3, ".$c15_c.", ".$c16_c.", ".$c17_c.", ".$c18_c.", ".$c19_c.", ".$c20_c.", ".$c21_c.", ".$c22_c.", ".$c23_c.", ".$c24_c.", ".$c25_c.", ".$c26_c.")", $con); }
	   } 
	   
	   if($c28>0 OR $c28<0 OR $c29>0 OR $c29<0 OR $c30>0 OR $c30<0 OR $c31>0 OR $c31<0 OR $c32>0 OR $c32<0)
	   {    
	   if($c28==''){$c28_c=0;}else{$c28_c=$c28;} if($c29==''){$c29_c=0;}else{$c29_c=$c29;} if($c29==''){$c29_c=0;}else{$c29_c=$c29;} if($c30==''){$c30_c=0;}else{$c30_c=$c30;} 
       if($c31==''){$c31_c=0;}else{$c31_c=$c31;} if($c32==''){$c32_c=0;}else{$c32_c=$c32;} 
	   $sqlChk3=mysql_query("Select * from hrm_sales_sal_details WHERE DealerId=".$c0." AND ProductId=".$resIP['ProductId']." AND YearId=4", $con); 
       $rowsChk3 = mysql_num_rows($sqlChk3); 
	   if($rowsChk3>0){ $sqlUp = mysql_query("UPDATE hrm_sales_sal_details SET M1_Ach='".$c28_c."',M2_Ach='".$c29_c."',M3_Ach='".$c30_c."',M4_Ach='".$c31_c."',M5_Ach='".$c32_c."' WHERE DealerId=".$c0." AND ProductId=".$resIP['ProductId']." AND YearId=4", $con); }
	   elseif($rowsChk3==0){ $sqlUp = mysql_query("insert into hrm_sales_sal_details(DealerId, ItemId, ProductId, YearId, M1_Ach, M2_Ach, M3_Ach, M4_Ach, M5_Ach) values(".$c0.", ".$resIP['ItemId'].", ".$resIP['ProductId'].", 4, ".$c28_c.", ".$c29_c.", ".$c30_c.", ".$c31_c.", ".$c32_c.")", $con); }
	   } 
	  
	 } // $rowIP
	 //else {echo $ctr.'-'.$c0.'-'.$c1.'<br>';}
	  
	}
    //else { $ctr++; }
	$ctr++;
   }
   fclose($handle);
   if($sqlUp){ $MsgImpAchQ= 'Product sales reports details uploaded successfully...';}
  }
 }
}
*/


if(isset($_POST['SaveAchQQMM']))
{
 if ($_FILES['AchQ_csv_fileM']['error'] > 0) {
  echo "Error: " . $_FILES['AchQ_csv_fileM']['error'] . "<br />"; 
 }else{  
  if (($handle = fopen($_FILES['AchQ_csv_fileM']['tmp_name'], "r"))!== FALSE) {
   $ctr = 1; // used to exclude the CSV header
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
$c0 = mysql_real_escape_string($data[0]); $c1 = mysql_real_escape_string($data[1]); $c2 = mysql_real_escape_string($data[2]); $c3 = mysql_real_escape_string($data[3]);
$c4 = mysql_real_escape_string($data[4]); $c5 = mysql_real_escape_string($data[5]); $c6 = mysql_real_escape_string($data[6]); $c7 = mysql_real_escape_string($data[7]); 
  
  if($c1!='' AND $c3!='' AND $c4!='')
  {
   if($ctr>1) 
   { //echo 'v='.$ctr;
     
	 $sqlD=mysql_query("Select * from hrm_sales_dealer WHERE DealerId=".$c1."", $con); $rowsD=mysql_num_rows($sqlD);
	 if($rowsD==0){echo $c0.'<br>';} 
	 
	 $sqlChk=mysql_query("Select * from hrm_sales_sal_details WHERE DealerId=".$c1." AND ProductId=".$c3." AND YearId=5", $con); $rowsChk=mysql_num_rows($sqlChk); 
	 if($rowsChk>0)
	 { //$sqlUp=mysql_query("UPDATE hrm_sales_sal_details SET M2_Ach=".$c4." WHERE DealerId=".$c1." AND ProductId=".$c3." AND YearId=5", $con); 
     if($sqlUp){echo '';}else{echo $c1.'-'.$c3.'-'.$c4.'<br>';}

 }
	 elseif($rowsChk==0){ $sqlIP=mysql_query("Select ItemId from hrm_sales_seedsproduct WHERE ProductId=".$c3."", $con); $resIP=mysql_fetch_assoc($sqlIP);
	 //$sqlUp = mysql_query("insert into hrm_sales_sal_details(DealerId,ItemId,ProductId,YearId,M2_Ach) values(".$c1.", ".$resIP['ItemId'].", ".$c3.", 5, ".$c4.")", $con);
         if($sqlUp){echo '';}else{echo $c1.'-'.$c3.'-'.$c4.'<br>';}
  }
   }
  } 
  $ctr++;
  }
  fclose($handle);
  if($sqlUp){ $MsgImpAchQMM='Product monthly sales details uploaded successfully...'; }
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
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<style> .font { color:#ffffff; font-family:Times New Roman; font-size:15px; width:200px;} .font1 { font-family:Times New Roman; font-size:12px; height:14px; width:200px; } 
.font2 { font-size:12px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:22px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<Script> 
function ChangrYearAchQ(yAchQ)
{
  window.location="SetPlanO.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yAchQ="+yAchQ;
}


function FunAchQTxls()
{ window.open("FormateFile.php?act=AchallYearFileOpen","MyFile","width=200,height=200");}

</Script> 
</head>
<body class="body">
<?php 
echo '<input type="hidden" id="ci" value="'.$_REQUEST['ci'].'" />'; echo '<input type="hidden" id="c" value="'.$_REQUEST['c'].'" />';
echo '<input type="hidden" id="s" value="'.$_REQUEST['s'].'" />'; echo '<input type="hidden" id="hq" value="'.$_REQUEST['hq'].'" />';
echo '<input type="hidden" id="dil" value="'.$_REQUEST['dil'].'" />'; echo '<input type="hidden" id="grp" value="'.$_REQUEST['grp'].'" />';
echo '<input type="hidden" id="q" value="'.$_REQUEST['q'].'" />'; echo '<input type="hidden" id="ii" value="'.$_REQUEST['ii'].'" />';
?>
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
   <tr>
	<td valign="top" align="center" width="100%" id="MainWindow"><br>	  
    <table border="0" style="margin-top:0px;width:100%; height:300px;">
    <tr>
    <td width="10">&nbsp;</td>  
    <td align="left" id="type" valign="top" style="display:block; width:50%">             
     <table border="0" width="350">   
	 <tr><td class="heading">&nbsp;Import Xls/Csv File:</td></tr>
	 <tr>
	 <td align="left" width="1200">
	 <table width="1200" border="0"> 
<?php /******************************** Sales Achivement Open *********************************************/ ?>	
	<tr><td></td></tr>
    <tr>
	 <td style="width:200px;" valign="top"><font color="#FFFFFF" style='font-family:Times New Roman;' size="3"><b>(A)&nbsp;Sales Achievement</b>&nbsp;</font></td>
	 <td style="width:1000px;">
	   <table border="0" style="background-color:#F9D568;">
	    <tr>
		 
	     <form name="FormAchQ" method="POST" enctype="multipart/form-data">
		 <?php /*
		 <td style="font-size:12px;width:40px;" align="right"><b>Year:</b>&nbsp;</td>
	     <td style="width:90px;">
		 <select style="font-size:12px;width:90px;height:20px;background-color:#DDFFBB;" name="yAchQ" id="yAchQ" onChange="ChangrYearAchQ(this.value)"> 
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['yAchQ'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate'])); $NextYear=$_REQUEST['yAchQ']+1; $PrevYear=$_REQUEST['yAchQ']-1; 
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>		
         <option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $fromdate.'-'.$todate; ?></option>
         <option value="<?php echo $PrevYear; ?>"><?php echo date("Y",strtotime($resy3['FromDate'])).'-'.date("Y",strtotime($resy3['ToDate'])); ?></option>
		 <option value="<?php echo $NextYear; ?>"><?php echo date("Y",strtotime($resy2['FromDate'])).'-'.date("Y",strtotime($resy2['ToDate'])); ?></option>
		 </select>
         </td>
		 */ ?>
	     <td style="width:285px;color:#FFD5FF;"><input type="file" name="AchQ_csv_file" id="AchQ_csv_file" style="width:200px;" size="30"/></td>
		 <td style="width:75px;"><input type="submit" name="SaveAchQQ" value="Upload" id="AchQId"/></td>
	     </form>  
		 <td style="width:80px;font-size:12px;" align="right"><b><a href="#" onClick="FunAchQTxls('xls')">Formate</a></b>&nbsp;</td>
	     <td style="font-family:Times New Roman;font-size:14px;color:#008000;"><b><?php echo $MsgImpAchQ; ?></b></td>
		
		</tr>
	   </table>
	  </td>
	</tr>
	
	    <tr>
	 <td style="width:200px;" valign="top"><font color="#FFFFFF" style='font-family:Times New Roman;' size="3"><b>(B)&nbsp; Monthly Sales Achievement</b>&nbsp;</font></td>
	 <td style="width:1000px;">
	   <table border="0" style="background-color:#F9D568;"> 
	    <tr>
	     <form name="FormAchQ22" method="POST" enctype="multipart/form-data">	
	     <td style="width:285px;color:#FFD5FF;"><input type="file" name="AchQ_csv_fileM" id="AchQ_csv_fileM" style="width:200px;" size="30"/></td>
		 <td style="width:75px;"><input type="submit" name="SaveAchQQMM" value="Upload" id="AchQId"/></td>
	     </form>  
	     <td style="font-family:Times New Roman;font-size:14px;color:#008000;"><b><?php echo $MsgImpAchQMM; ?></b></td>
	
		</tr>
	   </table>
	  </td>
	</tr>
	<tr><td></td></tr>        
    </table>  
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
