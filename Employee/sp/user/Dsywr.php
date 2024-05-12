<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
if($_REQUEST['di']>0){ 
$sqldil=mysql_query("SELECT DealerName,DealerCity FROM hrm_sales_dealer where DealerId=".$_REQUEST['di'], $con); $resdil=mysql_fetch_array($sqldil);
$sqlY2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['yi'], $con); $resY2=mysql_fetch_assoc($sqlY2); 
$y2=date("Y",strtotime($resY2['FromDate'])).'-'.date("Y",strtotime($resY2['ToDate']));
}
?>	 
<html>
<head>
<title><?php echo 'Ach:'.$y2; ?>-<?php echo ucfirst(strtolower($resdil['DealerName'])).'-<font color="#D7EBFF">'.$resdil['DealerCity'].'</font>'; ?></title>
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
.TInput{font-size:13px;width:60px;text-align:right;border:0px;background-color:#FFFFA6;}
.TInputT{font-size:13px;width:60px;text-align:right;border:0px;background-color:#5EAEFF;}
.Trh60{text-align:center;width:60px;font-weight:bold;}
.inner_table { height:400px;overflow-y:auto;width:auto; }
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript" language="javascript">
function editD(sn)
{ document.getElementById("EditBtn_"+sn).style.display='none'; document.getElementById("SaveBtn_"+sn).style.display='block'; 
  document.getElementById("M1_"+sn).style.background='#FFFFFF';document.getElementById("M1_"+sn).readOnly=false;
  document.getElementById("M2"+sn).style.background='#FFFFFF'; document.getElementById("M2"+sn).readOnly=false;
  document.getElementById("M3"+sn).style.background='#FFFFFF';document.getElementById("M3"+sn).readOnly=false; 
  document.getElementById("M4"+sn).style.background='#FFFFFF';document.getElementById("M4"+sn).readOnly=false;
  document.getElementById("M5"+sn).style.background='#FFFFFF'; document.getElementById("M5"+sn).readOnly=false;
  document.getElementById("M6"+sn).style.background='#FFFFFF';document.getElementById("M6"+sn).readOnly=false; 
  document.getElementById("M7"+sn).style.background='#FFFFFF';document.getElementById("M7"+sn).readOnly=false;
  document.getElementById("M8"+sn).style.background='#FFFFFF'; document.getElementById("M8"+sn).readOnly=false;
  document.getElementById("M9"+sn).style.background='#FFFFFF'; document.getElementById("M9"+sn).readOnly=false; 
  document.getElementById("M10"+sn).style.background='#FFFFFF';document.getElementById("M10"+sn).readOnly=false;
  document.getElementById("M11"+sn).style.background='#FFFFFF'; document.getElementById("M11"+sn).readOnly=false;
  document.getElementById("M12"+sn).style.background='#FFFFFF'; document.getElementById("M12"+sn).readOnly=false; 
}


function saveD(sn,yi,di,ii,pi)                            
{ 
 var M1=parseFloat(document.getElementById('M1_'+sn).value); var M2=parseFloat(document.getElementById('M2'+sn).value); var M3=parseFloat(document.getElementById('M3'+sn).value);
 var M4=parseFloat(document.getElementById('M4'+sn).value); var M5=parseFloat(document.getElementById('M5'+sn).value); var M6=parseFloat(document.getElementById('M6'+sn).value);
 var M7=parseFloat(document.getElementById('M7'+sn).value); var M8=parseFloat(document.getElementById('M8'+sn).value); var M9=parseFloat(document.getElementById('M9'+sn).value);
 var M10=parseFloat(document.getElementById('M10'+sn).value); var M11=parseFloat(document.getElementById('M11'+sn).value); 
 var M12=parseFloat(document.getElementById('M12'+sn).value); 
 
 var Mn1=document.getElementById('M1_'+sn).value; var Mn2=document.getElementById('M2'+sn).value; var Mn3=document.getElementById('M3'+sn).value;
 var Mn4=document.getElementById('M4'+sn).value; var Mn5=document.getElementById('M5'+sn).value; var Mn6=document.getElementById('M6'+sn).value; 
 var Mn7=document.getElementById('M7'+sn).value; var Mn8=document.getElementById('M8'+sn).value; var Mn9=document.getElementById('M9'+sn).value; 
 var Mn10=document.getElementById('M10'+sn).value; var Mn11=document.getElementById('M11'+sn).value; var Mn12=document.getElementById('M12'+sn).value; 
 if(Mn1==''){var n1=0;}else{var n1=M1;} if(Mn2==''){var n2=0;}else{var n2=M2;} if(Mn3==''){var n3=0;}else{var n3=M3;}  
 if(Mn4==''){var n4=0;}else{var n4=M4;} if(Mn5==''){var n5=0;}else{var n5=M5;} if(Mn6==''){var n6=0;}else{var n6=M6;} 
 if(Mn7==''){var n7=0;}else{var n7=M7;} if(Mn8==''){var n8=0;}else{var n8=M8;} if(Mn9==''){var n9=0;}else{var n9=M9;} 
 if(Mn10==''){var n10=0;}else{var n10=M10;} if(Mn11==''){var n11=0;}else{var n11=M11;} if(Mn12==''){var n12=0;}else{var n12=M12;} 
 var Tot=Math.round((n1+n2+n3+n4+n5+n6+n7+n8+n9+n10+n11+n12)*100)/100; document.getElementById("TotM"+sn).value=Tot; document.getElementById('Sno').value=sn; 
 var url = 'SlctSalesProdDeal.php'; var pars = 'Action=UpdateData&pi='+pi+'&m1='+n1+'&m2='+n2+'&m3='+n3+'&m4='+n4+'&m5='+n5+'&m6='+n6+'&m7='+n7+'&m8='+n8+'&m9='+n9+'&m10='+n10+'&m11='+n11+'&m12='+n12+'&Tot='+Tot+'&yi='+yi+'&di='+di+'&sn='+sn+'&ii='+ii;  
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_UpData });  
}
function show_UpData(originalRequest) 
{ document.getElementById('AddDataResult').innerHTML = originalRequest.responseText; var sn=document.getElementById('Sno').value; 
  document.getElementById('TM1').value=document.getElementById("t1").value; document.getElementById('TM2').value=document.getElementById("t2").value; 
  document.getElementById('TM3').value=document.getElementById("t3").value; document.getElementById('TM4').value=document.getElementById("t4").value;
  document.getElementById('TM5').value=document.getElementById("t5").value; document.getElementById('TM6').value=document.getElementById("t6").value;
  document.getElementById('TM7').value=document.getElementById("t7").value; document.getElementById('TM8').value=document.getElementById("t8").value; 
  document.getElementById('TM9').value=document.getElementById("t9").value; document.getElementById('TM10').value=document.getElementById("t10").value;
  document.getElementById('TM11').value=document.getElementById("t11").value; document.getElementById('TM12').value=document.getElementById("t12").value;
  document.getElementById('TotTotalM').value=document.getElementById('Total').value; 
  document.getElementById("EditBtn_"+sn).style.display='block';  document.getElementById("SaveBtn_"+sn).style.display='none'; 
  document.getElementById("M1_"+sn).style.background='#BBFF77';document.getElementById("M1_"+sn).readOnly=true;
  document.getElementById("M2"+sn).style.background='#BBFF77'; document.getElementById("M2"+sn).readOnly=true;
  document.getElementById("M3"+sn).style.background='#BBFF77';document.getElementById("M3"+sn).readOnly=true; 
  document.getElementById("M4"+sn).style.background='#BBFF77';document.getElementById("M4"+sn).readOnly=true;
  document.getElementById("M5"+sn).style.background='#BBFF77'; document.getElementById("M5"+sn).readOnly=true;
  document.getElementById("M6"+sn).style.background='#BBFF77';document.getElementById("M6"+sn).readOnly=true; 
  document.getElementById("M7"+sn).style.background='#BBFF77';document.getElementById("M7"+sn).readOnly=true;
  document.getElementById("M8"+sn).style.background='#BBFF77'; document.getElementById("M8"+sn).readOnly=true;
  document.getElementById("M9"+sn).style.background='#BBFF77'; document.getElementById("M9"+sn).readOnly=true; 
  document.getElementById("M10"+sn).style.background='#BBFF77';document.getElementById("M10"+sn).readOnly=true;
  document.getElementById("M11"+sn).style.background='#BBFF77'; document.getElementById("M11"+sn).readOnly=true;
  document.getElementById("M12"+sn).style.background='#BBFF77'; document.getElementById("M12"+sn).readOnly=true; 

}


</Script>
</head>
<body class="body">
<span id="AddDataResult"></span>
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
<input type="hidden" id="UserId" value="<?php echo $EmployeeId; ?>" />		  
<table border="0" style="margin-top:0px; width:100%; height:300px;">	
<tr>
 <td valign="top">
  <table>
      <tr>
    <td colspan="3"> 
<?php if($_REQUEST['di']>0){ ?>	
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;">	
  <tr style="background-color:#D5F1D1;color:#000000;">
    <td colspan="18" style="font-size:16px;color:#FFFF00;background-color:#183E83;">&nbsp;<b><?php echo ucwords(strtolower($resdil['DealerName'])).' - <font color="#D7EBFF">'.$resdil['DealerCity'].'</font>&nbsp;('.$y2.')'; ?></b><input type="hidden" id="Sno" value="" /></td>
  </tr>	
   <tr style="background-color:#D5F1D1;color:#000000;">  
    <td align="center" style="width:150px;"><b>Crop</b></td>
	<td align="center" style="width:250px;"><b>Variety</b></td>
	<td align="center" style="width:50px;"><b>&nbsp;Type&nbsp;</b></td>
	<td align="center" style="width:50px;"><b>&nbsp;Edit&nbsp;</b></td>
	<td align="center"><b>Apr</b></td><td align="center"><b>May</b></td><td align="center"><b>Jun</b></td><td align="center"><b>Jul</b></td>
    <td align="center"><b>Aug</b></td><td align="center"><b>Sep</b></td><td align="center"><b>Oct</b></td><td align="center"><b>Nov</b></td>
    <td align="center"><b>Dec</b></td><td align="center"><b>Jan</b></td><td align="center"><b>Feb</b></td><td align="center"><b>Mar</b></td>
	<td align="center" style="width:60px;"><b>Total</b></td>
	<td rowspan="2" align="center" style="width:17px;"><b>&nbsp;</b></td>
  </tr>	
  <?php 
$sqlTot=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$_REQUEST['yi']." where DealerId=".$_REQUEST['di']." AND YearId=".$_REQUEST['yi'], $con); $resTot=mysql_fetch_assoc($sqlTot); 
$chk1=mysql_query("select * from hrm_sales_achive_approved where DealerId=".$_REQUEST['di']." AND YearId=".$_REQUEST['yi'], $con); $rowchk1=mysql_num_rows($chk1);
$chk2=mysql_query("select * from hrm_sales_achive_approved_hq INNER JOIN hrm_sales_dealer ON hrm_sales_achive_approved_hq.HqId=hrm_sales_dealer.HqId where hrm_sales_dealer.DealerId=".$_REQUEST['di']." AND hrm_sales_achive_approved_hq.YearId=".$_REQUEST['yi'], $con); $rowchk2=mysql_num_rows($chk2);
$chk3=mysql_query("select * from hrm_sales_achive_approved_state INNER JOIN hrm_headquater ON hrm_sales_achive_approved_state.StateId=hrm_headquater.StateId INNER JOIN hrm_sales_dealer ON hrm_headquater.HqId=hrm_sales_dealer.HqId where hrm_sales_dealer.DealerId=".$_REQUEST['di']." AND hrm_sales_achive_approved_state.YearId=".$_REQUEST['yi'], $con); $rowchk3=mysql_num_rows($chk3);
?>
   <tr style="font-size:14px;color:#000000;background-color:#FFFFA6;height:24px;">
<td colspan="4" align="right" style="font-size:16px;"><b>Total:&nbsp;</b></td>
<td><input class="TInput" id="TM1" value="<?php if($resTot['tsM1']!=0 && $resTot['tsM1']!=''){echo $resTot['tsM1'];} ?>" readonly/></td>
<td><input class="TInput" id="TM2" value="<?php if($resTot['tsM2']!=0 && $resTot['tsM2']!=''){echo $resTot['tsM2'];} ?>" readonly/></td>
<td><input class="TInput" id="TM3" value="<?php if($resTot['tsM3']!=0 && $resTot['tsM3']!=''){echo $resTot['tsM3'];} ?>" readonly/></td>
<td><input class="TInput" id="TM4" value="<?php if($resTot['tsM4']!=0 && $resTot['tsM4']!=''){echo $resTot['tsM4'];} ?>" readonly/></td>
<td><input class="TInput" id="TM5" value="<?php if($resTot['tsM5']!=0 && $resTot['tsM5']!=''){echo $resTot['tsM5'];} ?>" readonly/></td>
<td><input class="TInput" id="TM6" value="<?php if($resTot['tsM6']!=0 && $resTot['tsM6']!=''){echo $resTot['tsM6'];} ?>" readonly/></td>
<td><input class="TInput" id="TM7" value="<?php if($resTot['tsM7']!=0 && $resTot['tsM7']!=''){echo $resTot['tsM7'];} ?>" readonly/></td>
<td><input class="TInput" id="TM8" value="<?php if($resTot['tsM8']!=0 && $resTot['tsM8']!=''){echo $resTot['tsM8'];} ?>" readonly/></td>
<td><input class="TInput" id="TM9" value="<?php if($resTot['tsM9']!=0 && $resTot['tsM9']!=''){echo $resTot['tsM9'];} ?>" readonly/></td>												
<td><input class="TInput" id="TM10" value="<?php if($resTot['tsM10']!=0 && $resTot['tsM10']!=''){echo $resTot['tsM10'];} ?>" readonly/></td>
<td><input class="TInput" id="TM11" value="<?php if($resTot['tsM11']!=0 && $resTot['tsM11']!=''){echo $resTot['tsM11'];} ?>" readonly/></td>												
<td><input class="TInput" id="TM12" value="<?php if($resTot['tsM12']!=0 && $resTot['tsM12']!=''){echo $resTot['tsM12'];} ?>" readonly/></td>
<?php $TotProd=$resTot['tsM1']+$resTot['tsM2']+$resTot['tsM3']+$resTot['tsM4']+$resTot['tsM5']+$resTot['tsM6']+$resTot['tsM7']+$resTot['tsM8']+$resTot['tsM9']+$resTot['tsM10']+$resTot['tsM11']+$resTot['tsM12']; ?>
<td bgcolor="#5EAEFF"><input class="TInputT" id="TotTotalM" value="<?php if($TotProd!=0 AND $TotProd!=''){echo $TotProd;}else{echo '';} ?>" readonly/></td>
  </tr>	 
<tr>
  <td colspan="18">
<div class="inner_table">  
  <table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;">
<?php $sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId order by hrm_sales_seedsitem.GroupId ASC, ItemName ASC, TypeName ASC, ProductName ASC", $con); $Sn=1; while($res=mysql_fetch_array($sql)){ 
$sqlP=mysql_query("select M1_Ach,M2_Ach,M3_Ach,M4_Ach,M5_Ach,M6_Ach,M7_Ach,M8_Ach,M9_Ach,M10_Ach,M11_Ach,M12_Ach from hrm_sales_sal_details_".$_REQUEST['yi']." where YearId=".$_REQUEST['yi']." AND ProductId=".$res['ProductId']." AND DealerId=".$_REQUEST['di'], $con); $resP=mysql_fetch_assoc($sqlP); $DeId=$_REQUEST['dil'];
?>	  
   <tr bgcolor="#EEEEEE" style="height:22px;"> 
     <td bgcolor="#FFFFFF" style="width:150px;">&nbsp;<?php echo $res['ItemName']; ?></td>	 
<td bgcolor="#FFFFFF" style="width:250px;">&nbsp;<?php echo $res['ProductName']; ?><input type="hidden" id="PId" value="<?php echo $res['ProductId']; ?>" /></td>
	 <td bgcolor="#FFFFFF" align="center" style="width:50px;">&nbsp;<?php echo substr_replace($res['TypeName'], '', 2); ?></td>	
	 <td align="center" valign="middle" bgcolor="#FFFFFF" style="width:50px;">	 
	 <img src="images/edit.png" border="0" alt="Edit" id="EditBtn_<?php echo $Sn; ?>" onClick="editD(<?php echo $Sn; ?>)" style="display:<?php if($EmployeeId==98 OR $EmployeeId==169){ echo 'block'; }else{echo 'none';} ?>;">
<img src="images/Floppy-Small-icon.png" border="0" alt="Save" id="SaveBtn_<?php echo $Sn; ?>" onClick="saveD(<?php echo $Sn.', '.$_REQUEST['yi'].', '.$_REQUEST['di'].', '.$res['ItemId'].','.$res['ProductId']; ?>)" style="display:none;">
	</td> <?php //if($rowchk1>0 OR $rowchk2>0 OR $rowchk3>0){ echo 'none'; }else{echo 'block';} ?>
	 
	 			 							 					 	 
<td><input class="Input" id="M1_<?php echo $Sn; ?>" value="<?php if($resP['M1_Ach']!='' AND $resP['M1_Ach']!=0){echo $resP['M1_Ach'];} ?>" readonly/></td>
<td><input class="Input" id="M2<?php echo $Sn; ?>" value="<?php if($resP['M2_Ach']!='' AND $resP['M2_Ach']!=0){echo $resP['M2_Ach'];} ?>" readonly/></td>
<td><input class="Input" id="M3<?php echo $Sn; ?>" value="<?php if($resP['M3_Ach']!='' AND $resP['M3_Ach']!=0){echo $resP['M3_Ach'];} ?>" readonly/></td>
<td><input class="Input" id="M4<?php echo $Sn; ?>" value="<?php if($resP['M4_Ach']!='' AND $resP['M4_Ach']!=0){echo $resP['M4_Ach'];} ?>" readonly/></td>
<td><input class="Input" id="M5<?php echo $Sn; ?>" value="<?php if($resP['M5_Ach']!='' AND $resP['M5_Ach']!=0){echo $resP['M5_Ach'];} ?>" readonly/></td>
<td><input class="Input" id="M6<?php echo $Sn; ?>" value="<?php if($resP['M6_Ach']!='' AND $resP['M6_Ach']!=0){echo $resP['M6_Ach'];} ?>" readonly/></td>
<td><input class="Input" id="M7<?php echo $Sn; ?>" value="<?php if($resP['M7_Ach']!='' AND $resP['M7_Ach']!=0){echo $resP['M7_Ach'];} ?>" readonly/></td>
<td><input class="Input" id="M8<?php echo $Sn; ?>" value="<?php if($resP['M8_Ach']!='' AND $resP['M8_Ach']!=0){echo $resP['M8_Ach'];} ?>" readonly/></td>
<td><input class="Input" id="M9<?php echo $Sn; ?>" value="<?php if($resP['M9_Ach']!='' AND $resP['M9_Ach']!=0){echo $resP['M9_Ach'];} ?>" readonly/></td>
<td><input class="Input" id="M10<?php echo $Sn; ?>" value="<?php if($resP['M10_Ach']!='' AND $resP['M10_Ach']!=0){echo $resP['M10_Ach'];} ?>" readonly/></td>
<td><input class="Input" id="M11<?php echo $Sn; ?>" value="<?php if($resP['M11_Ach']!='' AND $resP['M11_Ach']!=0){echo $resP['M11_Ach'];} ?>" readonly/></td>
<td><input class="Input" id="M12<?php echo $Sn; ?>" value="<?php if($resP['M12_Ach']!='' AND $resP['M12_Ach']!=0){echo $resP['M12_Ach'];} ?>" readonly/></td>
<?php $TotP=$resP['M1_Ach']+$resP['M2_Ach']+$resP['M3_Ach']+$resP['M4_Ach']+$resP['M5_Ach']+$resP['M6_Ach']+$resP['M7_Ach']+$resP['M8_Ach']+$resP['M9_Ach']+$resP['M10_Ach']+$resP['M11_Ach']+$resP['M12_Ach']; ?>	 
<td bgcolor="#FFFFA6" style="width:60px;"><input class="TInput" id="TotM<?php echo $Sn; ?>" value="<?php if($TotP!=0 AND $TotP!=''){echo $TotP;}else{echo '';} ?>" readonly/></td>	
  </tr>	
<?php $Sn++; }  ?> 
</table>
</div>
</td>
</tr>  
</table>	       
<?php } ?>
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
