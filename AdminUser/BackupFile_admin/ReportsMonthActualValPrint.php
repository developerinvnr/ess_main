<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font { color:#ffffff;font-family:Times New Roman;height:22px;font-size:11px;font-weight:bold;} 
.font1 { font-family:Times New Roman;font-size:11px; color:#000000;} 
.font2 { font-size:11px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:11px; width:120px; height:18px;}
.InputText {font-family:Times New Roman;font-size:12px;height:20px;color:#000066;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.text1{width:65px;height:20px;text-align:right;border:hidden;font-size:12px;font-family:Times New Roman;font-weight:bold; } .text2{width:80px;height:20px;text-align:right;border:hidden;font-size:12px;font-family:Times New Roman;font-weight:bold;background-color:#97CBFF; }
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<Script>
function FunC(v,n)
{ var E=parseFloat(v); var En=parseFloat(n); 
  if(En==1){ var t=parseFloat(document.getElementById("t1").value); document.getElementById("t1").value=Math.round((E+t)*10000)/10000;}
  else if(En==2){var t=parseFloat(document.getElementById("t2").value); document.getElementById("t2").value=Math.round((E+t)*10000)/10000;}
  else if(En==3){var t=parseFloat(document.getElementById("t3").value); document.getElementById("t3").value=Math.round((E+t)*10000)/10000;}
  else if(En==4){var t=parseFloat(document.getElementById("t4").value); document.getElementById("t4").value=Math.round((E+t)*10000)/10000;}
  else if(En==5){var t=parseFloat(document.getElementById("t5").value); document.getElementById("t5").value=Math.round((E+t)*10000)/10000;}
  else if(En==6){var t=parseFloat(document.getElementById("t6").value); document.getElementById("t6").value=Math.round((E+t)*10000)/10000;}
  else if(En==7){var t=parseFloat(document.getElementById("t7").value); document.getElementById("t7").value=Math.round((E+t)*10000)/10000;}
  else if(En==8){var t=parseFloat(document.getElementById("t8").value); document.getElementById("t8").value=Math.round((E+t)*10000)/10000;}
  else if(En==9){var t=parseFloat(document.getElementById("t9").value); document.getElementById("t9").value=Math.round((E+t)*10000)/10000;}
  else if(En==10){var t=parseFloat(document.getElementById("t10").value); document.getElementById("t10").value=Math.round((E+t)*10000)/10000;}
  else if(En==11){var t=parseFloat(document.getElementById("t11").value); document.getElementById("t11").value=Math.round((E+t)*10000)/10000;}
  else if(En==12){var t=parseFloat(document.getElementById("t12").value); document.getElementById("t12").value=Math.round((E+t)*10000)/10000;}
}

function FunTot(v)
{ var v=parseFloat(v); var tt=parseFloat(document.getElementById("tTot").value); var tTot=document.getElementById("tTot").value=Math.round((v+tt)*10000)/10000; }


window.print();
</SCRIPT> 
</head>
<body class="body">
<table class="table">
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //*****************************************************************************************?>
<?php //**********START*****START*****START******START******START**************************?>
<?php //**************************************************************************************?>
<table border="0" style="margin-top:0px;width:100%;height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
<tr>
	  <td class="heading" valign="top" style="width:800px;">Actual Values of Salary Components&nbsp;&nbsp; 
<?php 
$today=date("Y-m-d"); $timestamp = strtotime($today);
if($_REQUEST['y']!=0)
{ 
 $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."",$con); $rY=mysql_fetch_assoc($sY); 
 $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; 
 $ffd=date("y",strtotime($rY['FromDate'])); $ttd=date("y",strtotime($rY['ToDate']));
 $prevY=date("Y")-1; $nextY=date("Y")+1;
 if($FD==date("Y") AND $TD==$nextY)
 {
  if(date("m")==1)
  { $PayTable1='hrm_employee_monthlypayslip'; $PayTable2='hrm_employee_monthlypayslip'; }
  elseif(date("m")==2 OR date("m")==3)
  { $PayTable1='hrm_employee_monthlypayslip_'.$FD; $PayTable2='hrm_employee_monthlypayslip'; }
  else{ $PayTable1='hrm_employee_monthlypayslip'; $PayTable2='hrm_employee_monthlypayslip'; }
 }
 elseif($FD==$prevY AND $TD==date("Y"))
 {
  if(date("m")==1)
  { $PayTable1='hrm_employee_monthlypayslip'; $PayTable2='hrm_employee_monthlypayslip'; }
  else{ $PayTable1='hrm_employee_monthlypayslip_'.$FD; $PayTable2='hrm_employee_monthlypayslip'; }
 }
 else
 {
  $PayTable1='hrm_employee_monthlypayslip_'.$FD;
  $PayTable2='hrm_employee_monthlypayslip_'.$TD;
 }

}
	  if($_REQUEST['d']>0){ $sqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['d'], $con); $resD=mysql_fetch_assoc($sqlD); }
?>	     
	  <b style="color:#3A7500">[ Year:&nbsp;<?php echo $PRD; ?> ]</b>&nbsp;&nbsp; 
	  <?php if($_REQUEST['d']>0){ ?><b style="color:#3A7500">[ Department:&nbsp;<?php echo $resD['DepartmentName']; ?> ]</b>&nbsp;&nbsp;  <?php } ?>	  
	  </td>
   </tr>
   </table>
  </td>
 </tr> 
<?php if($_SESSION['login']=true){ ?>	
 <tr>
<?php //*********************************************** Open Department ******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
<input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['y']; ?>" />  
<table border="0" style="width:1200px;">
<tr>
 <td align="left">
  <table border="1" border="1" bgcolor="#FFFFFF" cellpadding="0" cellspacing="0">
  <tr bgcolor="#7a6189">
   <td colspan="2" align="center" class="font" style="width:50px;">SN</td>
   <td align="center" class="font" style="width:50px;">EC</td>
   <td align="center" class="font" style="width:250px;">NAME</td>
<?php for($i=4; $i<=15; $i++){ if($i==4){$mn='APR';}elseif($i==5){$mn='MAY';}elseif($i==6){$mn='JUN';}elseif($i==7){$mn='JUL';}elseif($i==8){$mn='AUG';}elseif($i==9){$mn='SEP';}elseif($i==10){$mn='OCT';}elseif($i==11){$mn='NOV';}elseif($i==12){$mn='DEC';}elseif($i==13){$mn='JAN';}elseif($i==14){$mn='FEB';}elseif($i==15){$mn='MAR';}?>   
   <td align="center" class="font" style="width:65px;">
    <a href="#" onClick="FunM(<?php echo $i.','.$_REQUEST['y'].','.$CompanyId.','.$_REQUEST['d']; ?>)" style="color:#FFFFFF;"><?php echo $mn; ?></a>
   </td>
<?php } ?>
   <td align="center" class="font" style="width:80px;">
    <a href="#" onClick="FunY(<?php echo $_REQUEST['y'].','.$CompanyId.','.$_REQUEST['d']; ?>)" style="color:#FFFFFF;">TOTAL</a>
   </td>
  </tr>
<tr>
   <td colspan="4" align="right" class="font1" style="width:50px;">TOTAL :&nbsp;</td> 
   <td align="center"><input class="text1" id="t1" value="0" readonly/></td>
   <td align="center"><input class="text1" id="t2" value="0" readonly/></td>
   <td align="center"><input class="text1" id="t3" value="0" readonly/></td>
   <td align="center"><input class="text1" id="t4" value="0" readonly/></td>
   <td align="center"><input class="text1" id="t5" value="0" readonly/></td>
   <td align="center"><input class="text1" id="t6" value="0" readonly/></td>
   <td align="center"><input class="text1" id="t7" value="0" readonly/></td>
   <td align="center"><input class="text1" id="t8" value="0" readonly/></td>
   <td align="center"><input class="text1" id="t9" value="0" readonly/></td>
   <td align="center"><input class="text1" id="t10" value="0" readonly/></td>
   <td align="center"><input class="text1" id="t11" value="0" readonly/></td>
   <td align="center"><input class="text1" id="t12" value="0" readonly/></td>
   <td align="center"><input class="text2" id="tTot" value="0" readonly/></td>
</tr>  
<?php if($_REQUEST['d']>0){ $sql=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND g.DateJoining<'".$TD.'-03-31'."' AND e.CompanyId=".$CompanyId." order by e.EmpCode ASC", $con); }
elseif($_REQUEST['d']==0){ $sql=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where g.DateJoining<'".$TD.'-03-31'."' AND e.CompanyId=".$CompanyId." order by e.EmpCode ASC", $con); }
 $sn=1; while($res=mysql_fetch_assoc($sql)){ 

$sql1=mysql_query("select Tot_GrossMonth from hrm_employee_ctc c INNER JOIN ".$PayTable1." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-04-30')."' AND Month=04 AND Year=".$FD." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-04-30')."')", $con); 
$sql2=mysql_query("select Tot_GrossMonth from hrm_employee_ctc c INNER JOIN ".$PayTable1." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-05-31')."' AND Month=05 AND Year=".$FD." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-05-31')."')", $con); 
$sql3=mysql_query("select Tot_GrossMonth from hrm_employee_ctc c INNER JOIN ".$PayTable1." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-06-30')."' AND Month=06 AND Year=".$FD." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-06-30')."')", $con); 
$sql4=mysql_query("select Tot_GrossMonth from hrm_employee_ctc c INNER JOIN ".$PayTable1." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-07-31')."' AND Month=07 AND Year=".$FD." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-07-31')."')", $con); 
$sql5=mysql_query("select Tot_GrossMonth from hrm_employee_ctc c INNER JOIN ".$PayTable1." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-08-31')."' AND Month=08 AND Year=".$FD." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-08-31')."')", $con); 
$sql6=mysql_query("select Tot_GrossMonth from hrm_employee_ctc c INNER JOIN ".$PayTable1." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-09-30')."' AND Month=09 AND Year=".$FD." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-09-30')."')", $con); 
$sql7=mysql_query("select Tot_GrossMonth from hrm_employee_ctc c INNER JOIN ".$PayTable1." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-10-31')."' AND Month=10 AND Year=".$FD." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-10-31')."')", $con); 
$sql8=mysql_query("select Tot_GrossMonth from hrm_employee_ctc c INNER JOIN ".$PayTable1." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-11-30')."' AND Month=11 AND Year=".$FD." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-11-30')."')", $con); 
$sql9=mysql_query("select Tot_GrossMonth from hrm_employee_ctc c INNER JOIN ".$PayTable1." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-12-31')."' AND Month=12 AND Year=".$FD." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-12-31')."')", $con); 
$sql10=mysql_query("select Tot_GrossMonth from hrm_employee_ctc c INNER JOIN ".$PayTable2." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($TD.'-01-31')."' AND Month=01 AND Year=".$TD." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($TD.'-01-31')."')", $con); 
$sql11=mysql_query("select Tot_GrossMonth from hrm_employee_ctc c INNER JOIN ".$PayTable2." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($TD.'-02-29')."' AND Month=02 AND Year=".$TD." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($TD.'-02-29')."')", $con); 
$sql12=mysql_query("select Tot_GrossMonth from hrm_employee_ctc c INNER JOIN ".$PayTable2." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($TD.'-03-31')."' AND Month=03 AND Year=".$TD." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($TD.'-03-31')."')", $con); 
 
 
$res2=mysql_fetch_assoc($sql2); $res1=mysql_fetch_assoc($sql1); $res3=mysql_fetch_assoc($sql3);
$res4=mysql_fetch_assoc($sql4); $res5=mysql_fetch_assoc($sql5); $res6=mysql_fetch_assoc($sql6);
$res7=mysql_fetch_assoc($sql7); $res8=mysql_fetch_assoc($sql8); $res9=mysql_fetch_assoc($sql9);
$res10=mysql_fetch_assoc($sql10); $res11=mysql_fetch_assoc($sql11); $res12=mysql_fetch_assoc($sql12);
 
 
if($res1['Tot_GrossMonth']>0 OR $res2['Tot_GrossMonth']>0 OR $res3['Tot_GrossMonth']>0 OR $res4['Tot_GrossMonth']>0 OR $res5['Tot_GrossMonth']>0 OR $res6['Tot_GrossMonth']>0 OR $res7['Tot_GrossMonth']>0 OR $res8['Tot_GrossMonth']>0 OR $res9['Tot_GrossMonth']>0 OR $res10['Tot_GrossMonth']>0 OR $res11['Tot_GrossMonth']>0 OR $res12['Tot_GrossMonth']>0){ 
?>  

<tr id="TR<?php echo $sn; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo $sn; ?>" onClick="FucChk(<?php echo $sn; ?>)" /></td> 
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo $sn; ?>&nbsp;</td>
   <td align="center" class="font1">&nbsp;<?php echo $res['EmpCode']; ?></td>
   <td align="" class="font1">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
   <td align="right" class="font1"><?php echo number_format(floatval($res1['Tot_GrossMonth'])); echo '<script>FunC('.$res1['Tot_GrossMonth'].',1);</script>'; ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo number_format(floatval($res2['Tot_GrossMonth'])); echo '<script>FunC('.$res2['Tot_GrossMonth'].',2);</script>'; ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo number_format(floatval($res3['Tot_GrossMonth'])); echo '<script>FunC('.$res3['Tot_GrossMonth'].',3);</script>'; ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo number_format(floatval($res4['Tot_GrossMonth'])); echo '<script>FunC('.$res4['Tot_GrossMonth'].',4);</script>'; ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo number_format(floatval($res5['Tot_GrossMonth'])); echo '<script>FunC('.$res5['Tot_GrossMonth'].',5);</script>'; ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo number_format(floatval($res6['Tot_GrossMonth'])); echo '<script>FunC('.$res6['Tot_GrossMonth'].',6);</script>'; ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo number_format(floatval($res7['Tot_GrossMonth'])); echo '<script>FunC('.$res7['Tot_GrossMonth'].',7);</script>'; ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo number_format(floatval($res8['Tot_GrossMonth'])); echo '<script>FunC('.$res8['Tot_GrossMonth'].',8);</script>'; ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo number_format(floatval($res9['Tot_GrossMonth'])); echo '<script>FunC('.$res9['Tot_GrossMonth'].',9);</script>'; ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo number_format(floatval($res10['Tot_GrossMonth'])); echo '<script>FunC('.$res10['Tot_GrossMonth'].',10);</script>'; ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo number_format(floatval($res11['Tot_GrossMonth'])); echo '<script>FunC('.$res11['Tot_GrossMonth'].',11);</script>'; ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo number_format(floatval($res12['Tot_GrossMonth'])); echo '<script>FunC('.$res12['Tot_GrossMonth'].',12);</script>'; ?>&nbsp;</td>
<?php $TotGrossMonth=$res1['Tot_GrossMonth']+$res2['Tot_GrossMonth']+$res3['Tot_GrossMonth']+$res4['Tot_GrossMonth']+$res5['Tot_GrossMonth']+$res6['Tot_GrossMonth']+$res7['Tot_GrossMonth']+$res8['Tot_GrossMonth']+$res9['Tot_GrossMonth']+$res10['Tot_GrossMonth']+$res11['Tot_GrossMonth']+$res12['Tot_GrossMonth']; ?>  
   <td align="right" class="font1" bgcolor="#97CBFF" style="font-weight:bold;"><?php echo number_format($TotGrossMonth); echo '<script>FunTot('.$TotGrossMonth.');</script>'; ?>&nbsp;</td> 
</tr>
<?php } $sn++; } ?>

	 </table>
	  </td>
    </tr>
  </table>  
</td>
<?php //***************** Close Department*****************************************?>    
 </tr>
<?php } ?> 
</table>
<?php //**************************************************************************************?>
<?php //*************END*****END*****END******END******END***********************************?>
<?php //**************************************************************************************?>
	  </td>
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