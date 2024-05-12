<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
//**********************************************************************************************************************



if(isset($_POST['SaveAchQQMM']))
{
 if($_POST['mAchQ']==4){$mnt='M1_Ach';}elseif($_POST['mAchQ']==5){$mnt='M2_Ach';}elseif($_POST['mAchQ']==6){$mnt='M3_Ach';}elseif($_POST['mAchQ']==7){$mnt='M4_Ach';}
 elseif($_POST['mAchQ']==8){$mnt='M5_Ach';}elseif($_POST['mAchQ']==9){$mnt='M6_Ach';}elseif($_POST['mAchQ']==10){$mnt='M7_Ach';}elseif($_POST['mAchQ']==11){$mnt='M8_Ach';}
 elseif($_POST['mAchQ']==12){$mnt='M9_Ach';}elseif($_POST['mAchQ']==1){$mnt='M10_Ach';}elseif($_POST['mAchQ']==2){$mnt='M11_Ach';}elseif($_POST['mAchQ']==3){$mnt='M12_Ach';}
 
 if ($_FILES['AchQ_csv_fileM']['error'] > 0) { echo "Error: " . $_FILES['AchQ_csv_fileM']['error'] . "<br />"; }
 else
 { if (($handle = fopen($_FILES['AchQ_csv_fileM']['tmp_name'], "r"))!== FALSE) {
   $ctr = 1; // used to exclude the CSV header
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
   $c0 = mysql_real_escape_string($data[0]); $c1 = mysql_real_escape_string($data[1]); $c2 = mysql_real_escape_string($data[2]); $c3 = mysql_real_escape_string($data[3]);
   //if($c4=='' OR $c4=='#N/A'){$cc4=0;}else{$cc4=$c4;} if($c5=='' OR $c5=='#N/A'){$cc5=0;}else{$cc5=$c5;} if($c6=='' OR $c6=='#N/A'){$cc6=0;}else{$cc6=$c6;}  
   if($c1!='' AND $c2!='' AND $c3!='')
   {
    if($ctr>1) 
    { 
	 $sqlD=mysql_query("Select * from hrm_sales_dealer WHERE DealerId=".$c1."", $con); $rowsD=mysql_num_rows($sqlD); //if($rowsD==0){echo $c0.'<br>';} 
	 $sqlChk=mysql_query("Select * from hrm_sales_sal_details_".$_POST['yAchQ']." WHERE DealerId=".$c1." AND ProductId=".$c2." AND YearId=".$_POST['yAchQ'],$con); $rowsChk=mysql_num_rows($sqlChk); 
	 if($rowsChk>0)
	 { $resChk=mysql_fetch_assoc($sqlChk); //if($resChk['M2_Ach']>0){echo $c0.'<br>';}
	   $sqlUp=mysql_query("UPDATE hrm_sales_sal_details_".$_POST['yAchQ']." SET ".$mnt."=".$c3." WHERE DealerId=".$c1." AND ProductId=".$c2." AND YearId=".$_POST['yAchQ'], $con);
	 }
	 elseif($rowsChk==0)
	 { $sqlIP=mysql_query("Select ItemId from hrm_sales_seedsproduct WHERE ProductId=".$c2."", $con); $resIP=mysql_fetch_assoc($sqlIP);
	   $sqlUp=mysql_query("insert into hrm_sales_sal_details_".$_POST['yAchQ']."(DealerId,ItemId,ProductId,YearId,".$mnt.") values(".$c1.",".$resIP['ItemId'].",".$c2.",".$_POST['yAchQ'].",".$c3.")", $con); 
	 }
   }
  } 
  $ctr++;
  }
  fclose($handle);
  if($sqlUp){ $MsgImpAchQMM='Monthly sales data uploaded successfully...'; }
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
function ChangrYearAchQ(yAchQ,mAchQ)
{ window.location="Import_SetPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&rernr=09drfGe&ernS=eewwqq&yAchQ="+yAchQ+"&mAchQ="+mAchQ; }

function ChangrMonthAchQ(mAchQ,yAchQ)
{ window.location="Import_SetPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yAchQ="+yAchQ+"&mAchQ="+mAchQ; }

function FunOpen()
{
 if(document.getElementById("checkop").checked==true){document.getElementById("yAchQ").disabled=false; document.getElementById("mAchQ").disabled=false; 
 document.getElementById("AchQ_csv_fileM").disabled=false; document.getElementById("AchQId").disabled=false;}
 if(document.getElementById("checkop").checked==false){document.getElementById("yAchQ").disabled=true; document.getElementById("mAchQ").disabled=true; 
 document.getElementById("AchQ_csv_fileM").disabled=true; document.getElementById("AchQId").disabled=true;}
}	
function validate(FormAchQ22,m,f,t)
{ var mnt=''; if(m==1){mnt='January';}else if(m==2){mn='February';}else if(m==3){mn='March';}else if(m==4){mn='April';}else if(m==5){mn='May';}else if(m==6){mn='June';}else if(m==7){mn='July';}else if(m==8){mn='August';}else if(m==9){mn='September';}else if(m==10){mn='October';}else if(m==11){mn='November';}else if(m==12){mn='December';}

var agree=confirm("Are you sure, you want to upload "+mn+" ("+f+"-"+t+") sales data?"); if(agree){return true;}else{return false;} }
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
<?php if($_REQUEST['mAchQ']==4){$mnt='M1_Ach';}elseif($_REQUEST['mAchQ']==5){$mnt='M2_Ach';}elseif($_REQUEST['mAchQ']==6){$mnt='M3_Ach';}elseif($_REQUEST['mAchQ']==7){$mnt='M4_Ach';}elseif($_REQUEST['mAchQ']==8){$mnt='M5_Ach';}elseif($_REQUEST['mAchQ']==9){$mnt='M6_Ach';}elseif($_REQUEST['mAchQ']==10){$mnt='M7_Ach';}elseif($_REQUEST['mAchQ']==11){$mnt='M8_Ach';}elseif($_REQUEST['mAchQ']==12){$mnt='M9_Ach';}elseif($_REQUEST['mAchQ']==1){$mnt='M10_Ach';}elseif($_REQUEST['mAchQ']==2){$mnt='M11_Ach';}elseif($_REQUEST['mAchQ']==3){$mnt='M12_Ach';}
 $sSum=mysql_query("select sum(".$mnt.") as totsal from hrm_sales_sal_details_".$_REQUEST['yAchQ']." where YearId=".$_REQUEST['yAchQ'],$con); $rSum=mysql_fetch_assoc($sSum); ?>
	 <tr><td class="heading">&nbsp;Import Xls/Csv File:&nbsp;<font size="3" color="#000000">( $c0=DealerName, $c1=DealerId, $c2=ProductId, $c3=Quantity )</font>&nbsp;&nbsp;[Total:<?php echo $rSum['totsal']; ?>]</td></tr>
	 <tr>
	 <td align="left" width="1200">
	 <table width="1200" border="0"> 
<?php /******************************** Sales Achivement Open *********************************************/ ?>	
	<tr><td></td></tr>
	<tr>
	 <td style="width:260px;color:#FFFFFF;font-family:Times New Roman;font-size:18px;" valign="top"><b>(A)&nbsp; Monthly Sales Achievement</b>&nbsp;</td>
	 <td>
	   <table border="0" style="background-color:#F9D568;"> 
	    <tr>
	     <form name="FormAchQ22" method="POST" enctype="multipart/form-data" onSubmit="return validate(this,<?php echo $_REQUEST['mAchQ'].','.$fromdate.','.$todate; ?>)">	
		 <td style="font-family:Times New Roman;font-size:14px;"><b>Year:</b>&nbsp;</td>
		 <td style="width:90px;">
		 <select style="font-size:12px;width:90px;height:20px;background-color:#DDFFBB;" name="yAchQ" id="yAchQ" onChange="ChangrYearAchQ(this.value,<?php echo $_REQUEST['mAchQ']; ?>)" disabled> 
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['yAchQ'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate']));  ?>		
         <option value="<?php echo $_REQUEST['yAchQ']; ?>" selected><?php echo $fromdate.'-'.$todate; ?></option>
<?php $sqly2=mysql_query("select * from hrm_sales_year order by YearId ASC", $con); while($resy2=mysql_fetch_assoc($sqly2)){ ?>		 
<?php if($resy2['YearId']<=$YearId AND $resy2['YearId']!=$_REQUEST['yAchQ']){ ?><option value="<?php echo $resy2['YearId']; ?>"><?php echo date("Y",strtotime($resy2['FromDate'])).'-'.date("Y",strtotime($resy2['ToDate'])); ?></option><?php } } ?>
		 </select>
         </td>
		 <td>&nbsp;&nbsp;</td>
		 <td style="font-family:Times New Roman;font-size:14px;"><b>Month:</b>&nbsp;</td>
		 <td style="width:90px;">
		 <select style="font-size:12px;width:50px;height:20px;background-color:#DDFFBB;" name="mAchQ" id="mAchQ" onChange="ChangrMonthAchQ(this.value,<?php echo $_REQUEST['yAchQ']; ?>)" disabled> 		
         <option value="<?php echo $_REQUEST['mAchQ']; ?>" selected><?php echo $_REQUEST['mAchQ']; ?></option>
<?php for($i=1;$i<=12;$i++){ if($i!=$_REQUEST['mAchQ']) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } } ?>
		 </select>
         </td>
		 <td>&nbsp;&nbsp;</td>
	     <td style="width:250px;color:#FFD5FF;"><input type="file" name="AchQ_csv_fileM" id="AchQ_csv_fileM" style="width:200px;" size="30" disabled/></td>
		 <td style="width:75px;"><input type="submit" name="SaveAchQQMM" value="Upload" id="AchQId" disabled/></td>
	     </form> 	  
		 <td align="center"><input type="checkbox" id="checkop" onClick="FunOpen()" /></td>
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
