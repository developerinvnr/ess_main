<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_REQUEST['log']!=$logemp){header('Location:../index.php');} 
else {$_SESSION['logCheckEmp']=$_REQUEST['log'];} 
if($_SESSION['login'] == true){require_once('StartEmpMenuSession.php');} 
if($_SESSION['login']!= true){header('Location:../index.php');} 
date_default_timezone_set('Asia/Kolkata');
//require_once('MailScalate.php');

if($CompanyId==1 OR $CompanyId==2 OR $CompanyId==3)
{
$sqlo=mysql_query("select * from hrm_opinion where EmployeeID=".$EmployeeId." AND OpenionName='jsy'",$con);
$rowo=mysql_num_rows($sqlo); if($EmployeeId==461 OR $EmployeeId==223 OR $EmployeeId==224 OR $EmployeeId==233 OR $EmployeeId==234 OR $EmployeeId==259 OR $EmployeeId==260){ $rowo=1; } 
}
else
{
$rowo=1;  
}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style type="text/css">
.blink_me { animation: blinker 1s linear infinite; }
@keyframes blinker {  50% { opacity: 0; } }
</style>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>

<script type="text/javascript" language="javascript">
function OpenBalWin(LId,EId)
{window.open("IndexLeaveBalDet.php?id="+EId+"&LId="+LId,"leaveForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=580,height=320");}

function ChangeLStatus(v,LId,LT,FD,TD,TotD,EI,App,Hod,LG)
{ if(v==2){var agree=confirm("Are you sure you want to approved this apply leave?"); 
  if (agree) { var x = "Index.php?AppLeave=yes&lid="+LId+"&v="+v+"&LeT="+LT+"&FD="+FD+"&TD="+TD+"&TotD="+TotD+"&EI="+EI+"&App="+App+"&Hod="+Hod+"&log="+LG;  window.location=x; }}   	  if(v==3){var agree=confirm("Are you sure you want to disapproved status this apply leave?"); 
  if (agree) { var x = "Index.php?action=Dis&LD="+LId+"&v="+v+"&App="+App+"&Hod="+Hod+"&log="+LG;  window.location=x; }}
}

function ChangeHodLStatus(v,LId,LT,FD,TD,TotD,EI,LG)
{ if(v==2){var agree=confirm("Are you sure you want to approved this apply leave?"); 
  if (agree) { var x = "Index.php?AppLeave=yes&lid2H="+LId+"&v="+v+"&LeT="+LT+"&FD="+FD+"&TD="+TD+"&TotD="+TotD+"&EI="+EI+"&log="+LG;  window.location=x; }}	   
  if(v==3){var agree=confirm("Are you sure you want to disapproved status this apply leave?"); 
  if (agree) { var x = "Index.php?action=Dis2&LD="+LId+"&v="+v+"&log="+LG;  window.location=x; }}		   
}

function ReadQuery(QI)
{ var win = window.open("ReadQuery.php?Qid="+QI,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=500,height=310");
  //var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="EmpDraftQ.php"; } }, 1000);
}


function ActionQReply(v,QI,NOfT,LG)
{ if(v=='P') {var agree=confirm("Are you sure you want to reply to In-process this query...?"); 
  if (agree) { var win = window.open("ReplyQueryEmp.php?action="+v+"&QR="+QI+"&NOfT="+NOfT,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=430,height=350");
               var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="Index.php?log="+LG; } }, 1000);}}
  if(v=='R') {var agree=confirm("Are you sure you want to reply this query...?"); 
  if (agree) { var win = window.open("ReplyQueryEmp.php?action="+v+"&QR="+QI+"&NOfT="+NOfT,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=430,height=350");
               var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="Index.php?log="+LG; } }, 1000);}}
  if(v=='F') {var agree=confirm("Are you sure you want to Forward this query...?"); 
  if (agree) { var win = window.open("ReplyQueryEmp.php?action="+v+"&QR="+QI+"&NOfT="+NOfT,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=430,height=350");
               var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="Index.php?log="+LG; } }, 1000);}}			   
			   
}


function ClickEvent(v,c)
{ window.open("CompanyEmpEvent.php?v="+v+"&c="+c,"HelpDoc","menubar=no,scrollbars=yes,resizable=no,directories=no,width=990,height=480");}



function OpenOpin(ei,ci)
{                   //OpeninionForm.php
 var win=window.open("OpeninionFormjsy.php?ss=2&rt=34&eei=345&frm=true&sts=fals&cont=true&value=fright&ei="+ei+"&tt=434&pp=345&ci="+ci+"&vv=123&pass=false&userright=false&chk=formate&assign=okrr=%343%ff&chk2=ok2","OForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=600"); 
 var timer = setInterval( function() { if(win.closed){ clearInterval(timer);  window.location="Index.php?log=@4323yy6twecdsayaEay456ad"; } }, 1000);
}

<!--
function doBlink() { var blink = document.all.tags("BLINK"); 
for (var i=0; i<blink.length; i++)	blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : "" }
function startBlink() {	if (document.all) setInterval("doBlink()",1000); }
window.onload = startBlink;
// -->
</SCRIPT>
</head>
<body class="body">  
<table class="table">
<?php if($rowo>0){ ?>
<tr>
 <td>
  <table class="menutable">
   <tr><td><?php if($_SESSION['login'] = true){ 
       require_once("EMenu.php"); 
       
  } ?></td></tr>
  </table>
 </td>
</tr>
<?php } ?>
<tr>
 <td>
  <table style="margin-top:0px;width:100%;">
   
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
   <tr>
    <td style="width:100%;text-align:center;vertical-align:top;">
     <table border="0" style="width:100%;float:none;" cellpadding="0">
      <tr>
       <td valign="top" style="width:100%;"> 
       <table style="width:100%;" border="0">

<?php
$sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentId,DesigId,MobileNo,EmailId_Self,Gender,DOB,Married,MarriageDate,HusWifeName,ProfileCertify,DR,DateJoining,BloodGroup,PanNo,DrivingLicNo,PassportNo,Passport_ExpiryDateFrom,Passport_ExpiryDateTo,Driv_ExpiryDateFrom,Driv_ExpiryDateTo,DrivingLicNo_YN,ConfirmMonth,SubmitSelfAsset,Req_DrivLic from hrm_employee_general g INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_family f ON g.EmployeeID=f.EmployeeID INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where g.EmployeeID=".$EmployeeId, $con); $resE=mysql_fetch_assoc($sqlE); 

$sqlSY=mysql_query("select OldY,CurrY,NewY from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='KRA'", $con); $resSY=mysql_fetch_array($sqlSY);
$sqlKra=mysql_query("select * from hrm_pms_kra where YearId=".$resSY['CurrY']." AND EmployeeID=".$EmployeeId." AND (KRAStatus='A' OR KRAStatus='R') AND (UseKRA='E' OR UseKRA='A' OR UseKRA='R' OR UseKRA='H')", $con); 
$rowKra=mysql_num_rows($sqlKra);  $Before31Day=date("Y-m-d",strtotime('-30 day'));  
$After31DayDoJ=date("Y-m-d",strtotime($resE['DateJoining'].'+31 day'));

$sqlps2=mysql_query("select * from hrm_employee_procertify_setting where CompanyId=".$CompanyId, $con); 
$resps2=mysql_fetch_array($sqlps2);  if($resps2['Open']=='Y'){ $sqlpse=mysql_query("select * from hrm_employee_procertify_noc where EmployeeID=".$EmployeeId." AND Month=".$resps2['Month']." AND Year=".$resps2['Year'], $con); $rowpse=mysql_num_rows($sqlpse); $respse=mysql_fetch_array($sqlpse); }
?>	   


<?php if(date("Y-m-d")>='2020-02-29' AND ($resDept['Req_DrivLic']=='N' OR $resE['Req_DrivLic']=='N')){
?>


	   
<?php if($rowo>0){ ?>	   
<?php //******************** Main Body Main Body Open Open *************************** ?>
<?php //******************** Main Body Main Body Open Open *************************** ?>
<tr><td colspan="3" style="height:10px;"></td></tr>
<tr>
<!-- Section 11111111111 Open 11111111111 Open 11111111111 Open 11111111111 Open 11111111111 Open -->
<!-- Section 11111111111 Open 11111111111 Open 11111111111 Open 11111111111 Open 11111111111 Open -->
<td style="width:15%;vertical-align:top;">
 <table style="width:100%;" cellspacing="0">
   <tr>
    <td style="text-align:center;vertical-align:middle;font-family:Times New Roman;color:#003162;font-size:15px;">
	 <i><b style="color:#0067CE;">Welcome</b></i><br>
	 <?php include("EmpImgEmp.php"); ?></td>
	</td>
   </tr>
   <tr>
    <td style="text-align:center;vertical-align:middle;font-family:Times New Roman;color:#003162;font-size:15px;">
	 <i><b>EmpCode :&nbsp;</b></i><font style='font-size:14px;color:#2E4B33;'><b><?php echo $EC; ?></b></font><br>
	 <font style='font-size:14px;color:#2E4B33;'><b><?php echo $NameE; ?></b></font><br><br>
	</td>
   </tr>
   
      <tr><td><hr style="width:100%;height:1px;"></td></tr>
<style>
.redius
{
 -webkit-box-shadow: 7px 7px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 7px 7px 5px 0px rgba(0,0,0,0.75);
box-shadow: 7px 7px 5px 0px rgba(0,0,0,0.75);
}
</style>

<?php $sqlMK=mysql_query("select WarmWelCome from hrm_employee_key where CompanyId=".$CompanyId, $con); 
      $resMK=mysql_fetch_assoc($sqlMK); 

      if(date("m")>=2 && date("m")<=12){ $PrevMnt=date("m")-1; $PrevYer=date("Y"); }
      else{ $PrevMnt=12; $PrevYer=date("Y")-1;} 
      $mkdate = mktime(0,0,0, $PrevMnt, 1, $PrevYer); 
      $days = date('t',$mkdate);

$WrmChk=mysql_query("select * from hrm_employee e inner join hrm_employee_general g ON e.EmployeeID=g.EmployeeID where g.DateJoining between '".date($PrevYer."-".$PrevMnt."-01")."' and '".date($PrevYer."-".$PrevMnt."-".$days)."' and e.EmpStatus='A' and e.CompanyId=".$CompanyId, $con); $RowWrmChk=mysql_num_rows($WrmChk); 

if(($RowWrmChk>0 && $resMK['WarmWelCome']=='Y' && date("d")>5) || ($EmployeeId==169 || $EmployeeId==142 || $EmployeeId==182) && $CompanyId==1){ ?>

<tr>
 <td style="width:100%;vertical-align:top;background-color:#119c83;">
  <table style="width:100%;" cellpadding="5" class="redius">
   <tr>  
    <td style="width:100%; font-family:Georgia;text-align:center;">
<script>function FunWarlWelCOme(){window.open("../../WarmWelCome.php","WelComeForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=920,height=600");}</script> <?php //WarmWelCome.php ?>

 <span onClick="FunWarlWelCOme(<?php echo $resDP['EmployeeID']; ?>)" style="cursor:pointer;">
 <font style="color:#FFFFC1;">Warm Welcome</font><br>
 <span class="blink_me" style="color:#FFFFA8;"><?php echo date("F Y",strtotime(date($PrevYer."-".$PrevMnt."-01")));?></span>
 </span>

    </td>  
   </tr>
  </table>
 </td>
</tr>
<?php } ?> 
   
   
<script type="text/javascript">
function LetterClick(E,C)
{  
  window.open("VeiwConfLetter.php?action=Letter&E="+E+"&C="+C,"AppLetter","scrollbars=yes,resizable=no,width=820,height=750,menubar=yes,location=no,directories=no");
}

function TrainyLetterClick(E,C)
{ 
  window.open("VeiwTrainyConfLetter.php?action=Letter&E="+E+"&C="+C,"AppLetter","scrollbars=yes,resizable=no,width=820,height=750,menubar=yes,location=no,directories=no");
}

function ExtLetterClick(E,C)
{ 
  window.open("VeiwExtConfLetter.php?action=Letter&E="+E+"&C="+C,"AppLetter","scrollbars=yes,resizable=no,width=820,height=750,menubar=yes,location=no,directories=no");
} 

function FunClickAss(ei,ec,c,di,dei,mo,h,fn,sn,ln,mail)
{
  //alert(ei+"-"+ec+"-"+c+"-"+di+"-"+dei+"-"+mo+"-"+h+"-"+fn+"-"+sn+"-"+ln+"-"+mail)
  window.open("http://www.yarms.in/reg/vspl/index.php?act=newvspl&ei="+ei+"&ec="+ec+"&uH="+h+"&fname="+fn+"&sname="+sn+"&lname="+ln+"&com="+c+"&dept="+di+"&desg="+dei+"&email="+mail+"&mobile="+mo, '_blank'); window.focus();
}

</script>  
   <?php //1-HR 2-R&D 3-PD 4-Prod 5-Proc 6-sales 7-Logis 8-Finance 9-IT 10-legal 11-admin 12-mrkt 24-QA 25-FS 27-SPR ?>
   <?php if($resE['SubmitSelfAsset']=='N' and $CompanyId!=4){ // ($EmployeeId==169 || $EmployeeId==142 || $resE['DepartmentId']==8 || $resE['DepartmentId']==7) ?>
   <style>
   div.card { width:100%;box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);text-align:center; }
   div.header { background-color:#E0B01F;color:white;padding:5px; }
   div.header2 { background-color:#808000;color:white;padding:1px;font-size:20px;font-family:Times New Roman; }
   <!--div.container { padding: 10px; } #4CAF50 #E0B01F-->
   </style>
   <tr><td>&nbsp;</td></tr> 
   <tr>
    <td style="width:100%;vertical-align:top;background-color:#119c83;">
	 <table style="width:100%;" cellpadding="5" class="redius">
      <tr>  
       <td style="width:100%;text-align:center;font-family:Georgia;">
	   <div class="card">
	    <a href="#" onClick="FunClickAss(<?php echo $EmployeeId.','.$resE['EmpCode'].','.$CompanyId.','.$resE['DepartmentId'].','.$resE['DesigId'].','.$resE['MobileNo'];?>,'<?php echo $M; ?>','<?php echo $resE['Fname']; ?>','<?php echo $resE['Sname']; ?>','<?php echo $resE['Lname']; ?>','<?php echo $resE['EmailId_Self']; ?>')" style="text-decoration:none;">
        <div class="header">
		 <div class="header2">
         <h4><span class="blink_me"><b>Self<br>Assessment Test</b></span></h4>
		 </div>
        </div>
        </a>
        <!--<div class="container"><p>January 1, 2016</p></div>-->
       </div>
       </td>  
      </tr>
     </table>
	</td>
   </tr>
   <?php } ?> 
   

   <?php $sql_Conf=mysql_query("select * from hrm_employee_confletter where (EmpShow='Y' OR EmpShow_Trr='Y' OR EmpShow_Ext='Y') AND EmployeeID=".$EmployeeId,$con); 
         $row_Conf=mysql_num_rows($sql_Conf); if($row_Conf>0){ $res_Conf=mysql_fetch_assoc($sql_Conf); }
		 if($res_Conf['EmpShow']=='Y' OR $res_Conf['EmpShow_Trr']=='Y' OR $res_Conf['EmpShow_Ext']=='Y'){ ?>

   <tr>
    <td style="width:100%;vertical-align:top;background-color:#119c83;">
	 <table style="width:100%;" cellpadding="5" class="redius">
      <tr>  
       <td style="width:100%;text-align:center;">
	   <?php if($res_Conf['EmpShow']=='Y'){?>
	   <!--<img src="images/new_blink.gif" border="0"><br>-->
	   <a href="#" onClick="LetterClick(<?php echo $EmployeeId.','.$CompanyId; ?>)">
       <font style="color:#FFFFC1;font-size:16px;font-family:Georgia;"><span class="blink_me"><b>E-Confirmation Letter</b></span></font>
	   </a>
	   <?php } elseif($res_Conf['EmpShow_Trr']=='Y'){?>
	   <!--<img src="images/new_blink.gif" border="0"><br>-->
	   <a href="#" onClick="TrainyLetterClick(<?php echo $EmployeeId.','.$CompanyId; ?>)" style="text-decoration:none;">
       <font style="color:#FFFFC1;font-size:16px;font-family:Georgia;"><span class="blink_me"><b>E-Confirmation Letter</b></span></font>
	   </a>
	   <?php } elseif($res_Conf['EmpShow_Ext']=='Y'){?>
	   <!--<img src="images/new_blink.gif" border="0"><br>-->
	   <a href="#" onClick="ExtLetterClick(<?php echo $EmployeeId.','.$CompanyId; ?>)" style="text-decoration:none;">
       <font style="color:#FFFFC1;font-size:16px;font-family:Georgia;"><span class="blink_me"><b>E-Confirmation Postponement Letter</b></span></font>
	   </a>
	   <?php } ?>
       </td>  
      </tr>
     </table>
	</td>
   </tr>
   <?php  } ?>
   
   <?php if($DepartmentId==9){ ?>
   <tr><td style="height:20px;">&nbsp;</td></td></tr>
   <tr>
    <td style="width:100%;">
	 <table style="width:100%;" cellpadding="5">
      <tr>  
       <td style="width:100%;text-align:center;font-size:14px;font-family:Georgia;">
        <a href="https://vnrit.com/loginfromess.php?code=<?php echo base64_encode($EmpCode); ?>&time=<?php echo base64_encode(date("Y-m-d H:i:s")); ?>" target="_blank">IT Services</a>
       </td>
      </tr>
     </table>
    </td>
   </tr>
   <?php } ?>
    
	
 </table>
</td>
<!-- Section 11111111111 Close 11111111111 Close 11111111111 Close 11111111111 Close -->
<!-- Section 11111111111 Close 11111111111 Close 11111111111 Close 11111111111 Close -->
 
 
 
<!-- Section 22222222222 Open 22222222222 Open 22222222222 Open 22222222222 Open 22222222222 Open -->
<!-- Section 22222222222 Open 22222222222 Open 22222222222 Open 22222222222 Open 22222222222 Open --> 
<td style="width:60%;vertical-align:top;">
 <table style="width:100%;" cellspacing="1">
   <tr>
    <td style="width:100%;vertical-align:top;height:250px;">
<table style="width:100%;">
    
<!-- Notifictaion Notifictaion Notifictaion Notifictaion Notifictaion Notifictaion Notifictaion Open-->
<!-- Notifictaion Notifictaion Notifictaion Notifictaion Notifictaion Notifictaion Notifictaion Open-->    

<tr><!--bgcolor="#A691B9"-->
  <td align="center" style='font-family:Times New Roman;font-size:18px;color:#543764;width:100%;'><b>Circulars/Notifications</b></td>                   
   </tr>	
	<td bgcolor="#FFFFFF" style="font-family:Times New Roman;font-size:16px;width:100%;">
<?php $sql=mysql_query("select * from hrm_upnotification where NotificationStatus='A' AND CompanyId=".$CompanyId, $con); 
      $res=mysql_fetch_assoc($sql); ?>
<marquee behavior="scroll" direction="ltr" scrollamount="2" width="100%" style="margin-left:0px; margin-right:0px;" onMouseOver="this.setAttribute('scrollamount', 0, 0);" onMouseOut="this.setAttribute('scrollamount', 3, 0);"><font color="#5555FF" style='font-family:Georgia; float:none; font-size:15px;'>
<?php /*
if($resps2['Open']=='Y' AND ($respse['ProfileCertify']=='N' OR $respse['ProfileCertify']=='') AND $EmployeeId!=223 AND $EmployeeId!=224 AND $EmployeeId!=461){echo 'Please check & "Agree" on details(Personal,Contacts,Family & Education in Profile Section), certify your Profile to proceed to other Menu.';}
elseif($rowKra==0 AND (date("Y-m-d")>=$resE['DateJoining'] AND date("Y-m-d")<=$After31DayDoJ) AND $EmployeeId!=223 AND $EmployeeId!=224 AND $EmployeeId!=461){ echo 'Submit Your KRA by '.date("d-m-Y",strtotime($After31DayDoJ));}
elseif($rowKra==0 AND date("Y-m-d")>$After31DayDoJ AND $EmployeeId!=223 AND $EmployeeId!=224 AND $EmployeeId!=461){echo 'Please Submit Your KRA....   Please Submit Your KRA....   Please Submit Your KRA';}
else
{ 
  if($res['Notification']!='' AND $EmployeeId!=223 AND $EmployeeId!=224){echo $res['Notification'];}elseif(($resE['DrivingLicNo']=='' OR $resE['PanNo']=='' OR $resE['BloodGroup']=='') AND $EmployeeId!=223 AND $EmployeeId!=224){echo 'Please ensure that your <b>driving license</b>, <b>pan number</b>, <b>blood group</b> details is available in HR';}
} */
?>
   </font></marquee>  
  </td>
</tr>

<?php /* if(($resContt['Emg_Contact1']=='' OR $resContt['Emg_Contact1']==0) AND ($EmployeeId!=6 AND $EmployeeId!=7 AND $EmployeeId!=51 AND $EmployeeId!=223 AND $EmployeeId!=461 AND $EmployeeId!=224 AND $EmployeeId!=233 AND $EmployeeId!=234 AND $EmployeeId!=235 AND $EmployeeId!=259 AND $EmployeeId!=260)){ ?> 
<tr>
  <td style="width:100%;">
    <table style="width:100%;background-color:#D7CCE3;">
	  <tr>
		<td valign="middle" style="font-family:Times New Roman;font-size:16px;color:#FF0000;font-weight:bold;">
		<?php $sql=mysql_query("select * from hrm_upnotification where NotificationStatus='A' AND CompanyId=".$CompanyId, $con); $res=mysql_fetch_assoc($sql); ?><span class="blink_me">* Please update emergency contact number for viewing all profile.</span></td>
		<?php //if($resE['ProfileCertify']!='Y'){echo $res['Notification'];} else {echo substr_replace($res['Notification'], '', 18);} ?>
	  </tr>
	</table>
  </td>
</tr>   
<?php } */  ?>


<!-- KRA Fillup KRA Fillup KRA Fillup KRA Fillup KRA Fillup KRA Fillup KRA Fillup KRA Fillup Open-->
<!-- KRA Fillup KRA Fillup KRA Fillup KRA Fillup KRA Fillup KRA Fillup KRA Fillup KRA Fillup Open-->

<?php $Qyeark=mysql_query("select * from hrm_pms_setting where CompanyId=1 AND Process='KRA'",$con);
$Yeark=mysql_fetch_assoc($Qyeark); $_SESSION['KraYId']=$Yeark['CurrY'];

$msgMo=''; $msgQu=''; $msgAn='';

if(date("d")>=01 && date("d")<=07)  //07
{

 $sqlk=mysql_query("Select EmpCode from hrm_pms_kra k inner join hrm_employee e on k.EmployeeID=e.EmployeeID where k.YearId=".$Yeark['CurrY']." and k.EmpStatus='A' and k.Period='Monthly' and e.EmpStatus='A' and e.EmployeeID=".$EmployeeId." and k.UseKRA!='E'",$con); 
 $rowk=mysql_num_rows($sqlk); if($rowk>0){ $msgMo='Monthly'; }
 $sqlk_sub=mysql_query("Select EmpCode from hrm_pms_kra k inner join hrm_pms_krasub ks on k.KRAId=ks.KRAId inner join hrm_employee e on k.EmployeeID=e.EmployeeID where k.YearId=".$Yeark['CurrY']." and k.EmpStatus='A' and ks.Period='Monthly' and e.EmpStatus='A' and e.EmployeeID=".$EmployeeId." and k.UseKRA!='E'",$con); 
 $rowk_sub=mysql_num_rows($sqlk_sub); if($rowk_sub>0){ $msgMo='Monthly'; }

 if(date("m")==04 OR date("m")==07 OR date("m")==10 OR date("m")==01)
 { 
  $sql2k=mysql_query("Select EmpCode from hrm_pms_kra k inner join hrm_employee e on k.EmployeeID=e.EmployeeID where k.YearId=".$Yeark['CurrY']." and k.EmpStatus='A' and k.Period='Quarter' and e.EmpStatus='A' and e.EmployeeID=".$EmployeeId." and k.UseKRA!='E'",$con); 
  $row2k=mysql_num_rows($sql2k); if($row2k>0){$msgQu='Quarterly';} 
  $sql2k_sub=mysql_query("Select EmpCode from hrm_pms_kra k inner join hrm_pms_krasub ks on k.KRAId=ks.KRAId inner join hrm_employee e on k.EmployeeID=e.EmployeeID where k.YearId=".$Yeark['CurrY']." and k.EmpStatus='A' and ks.Period='Quarter' and e.EmpStatus='A' and e.EmployeeID=".$EmployeeId." and k.UseKRA!='E'",$con); 
  $row2k_sub=mysql_num_rows($sql2k_sub); if($row2k_sub>0){$msgQu='Quarterly';}
 }

 if(date("m")==07 OR date("m")==01)
 { 
  $sql3k=mysql_query("Select EmpCode from hrm_pms_kra k inner join hrm_employee e on k.EmployeeID=e.EmployeeID where k.YearId=".$Yeark['CurrY']." and k.EmpStatus='A' and k.Period='1/2 Annual' and e.EmpStatus='A' and e.EmployeeID=".$EmployeeId." and k.UseKRA!='E'",$con); 
  $row3k=mysql_num_rows($sql3k); if($row3k>0){ $msgAu='1/2 Annualy'; }
  $sql3k_sub=mysql_query("Select EmpCode from hrm_pms_kra k inner join hrm_pms_krasub ks on k.KRAId=ks.KRAId inner join hrm_employee e on k.EmployeeID=e.EmployeeID where k.YearId=".$Yeark['CurrY']." and k.EmpStatus='A' and ks.Period='1/2 Annual' and e.EmpStatus='A' and e.EmployeeID=".$EmployeeId." and k.UseKRA!='E'",$con); 
  $row3k_sub=mysql_num_rows($sql3k_sub); if($row3k_sub>0){ $msgAu='1/2 Annualy'; } 
 }

 if($rowk>0 || $rowk_sub>0 || $row2k>0 || $row2k_sub>0 || $row3k>0 || $row3k_sub){ ?>
 <script>
  function FunOpenAchEPg(e,y,c){ var win = window.open("setkratgtindex.php?acct=currentAch&e="+e+"&y="+y+"&c="+c,"Form","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=500");  }
 </script>
 <tr>
 <td style="width:100%;"> 
   <table border="0" style="background-color:#D7CCE3;width:100%;" align="center">
     
	 <tr>
	   <td style="font-family:Times New Roman;font-size:16px;color:#FF0000;font-weight:bold;width:100%;">
	    <font color="#0062C4">Self Assessment:&nbsp;</font>
		<span class="blink_me"><span onClick="FunOpenAchEPg(<?php echo $EmployeeId.','.$Yeark['CurrY'].','.$CompanyId; ?>)" style="cursor:pointer;">Please fill your achievements for your <?php if($msgMo!=''){ echo $msgMo;}if($msgMo!='' && ($msgQu!='' || $msgAn!='')){ echo ',';}if($msgQu!=''){ echo $msgQu;}if(($msgMo!='' || $msgQu!='') && ($msgAn!='')){ echo ',';}if($msgAn!=''){ echo $msgAn;}?> KRAs by 7th of this month.</span></span>
	   </td>
	 </tr>
	 
   </table>
 </td>
 </tr>
 <?php } ?>
<?php } //if(date("d")>=01 && date("d")<=07)


elseif(date("d")>=08 && date("d")<=14)  //14 Appraiser_EmployeeID
{

 $sqlk=mysql_query("Select Appraiser_EmployeeID from hrm_pms_kra k inner join hrm_employee e on k.EmployeeID=e.EmployeeID inner join hrm_employee_pms g on e.EmployeeID=g.EmployeeID where k.YearId=".$Yeark['CurrY']." and k.EmpStatus='A' and k.Period='Monthly' and e.EmpStatus='A' and g.Appraiser_EmployeeID=".$EmployeeId." and g.AssessmentYear=".$Yeark['CurrY']." and k.UseKRA!='E'",$con); 
 $rowk=mysql_num_rows($sqlk); if($rowk>0){ $msgMo='Monthly'; }
 $sqlk_sub=mysql_query("Select Appraiser_EmployeeID from hrm_pms_kra k inner join hrm_pms_krasub ks on k.KRAId=ks.KRAId inner join hrm_employee e on k.EmployeeID=e.EmployeeID inner join hrm_employee_pms g on e.EmployeeID=g.EmployeeID where k.YearId=".$Yeark['CurrY']." and k.EmpStatus='A' and ks.Period='Monthly' and e.EmpStatus='A' and g.Appraiser_EmployeeID=".$EmployeeId." and g.AssessmentYear=".$Yeark['CurrY']." and k.UseKRA!='E'",$con); 
 $rowk_sub=mysql_num_rows($sqlk_sub); if($rowk_sub>0){ $msgMo='Monthly'; }

 if(date("m")==04 OR date("m")==07 OR date("m")==10 OR date("m")==01)
 { 
  $sql2k=mysql_query("Select Appraiser_EmployeeID from hrm_pms_kra k inner join hrm_employee e on k.EmployeeID=e.EmployeeID inner join hrm_employee_pms g on e.EmployeeID=g.EmployeeID where k.YearId=".$Yeark['CurrY']." and k.EmpStatus='A' and k.Period='Quarter' and e.EmpStatus='A' and g.Appraiser_EmployeeID=".$EmployeeId." and g.AssessmentYear=".$Yeark['CurrY']." and k.UseKRA!='E'",$con); 
  $row2k=mysql_num_rows($sql2k); if($row2k>0){$msgQu='Quarterly';} 
  $sql2k_sub=mysql_query("Select Appraiser_EmployeeID from hrm_pms_kra k inner join hrm_pms_krasub ks on k.KRAId=ks.KRAId inner join hrm_employee e on k.EmployeeID=e.EmployeeID inner join hrm_employee_pms g on e.EmployeeID=g.EmployeeID where k.YearId=".$Yeark['CurrY']." and k.EmpStatus='A' and ks.Period='Quarter' and e.EmpStatus='A' and g.Appraiser_EmployeeID=".$EmployeeId." and g.AssessmentYear=".$Yeark['CurrY']." and k.UseKRA!='E'",$con); 
  $row2k_sub=mysql_num_rows($sql2k_sub); if($row2k_sub>0){$msgQu='Quarterly';}
 }

 if(date("m")==07 OR date("m")==01)
 { 
  $sql3k=mysql_query("Select Appraiser_EmployeeID from hrm_pms_kra k inner join hrm_employee e on k.EmployeeID=e.EmployeeID inner join hrm_employee_pms g on e.EmployeeID=g.EmployeeID where k.YearId=".$Yeark['CurrY']." and k.EmpStatus='A' and k.Period='1/2 Annual' and e.EmpStatus='A' and g.Appraiser_EmployeeID=".$EmployeeId." and g.AssessmentYear=".$Yeark['CurrY']." and k.UseKRA!='E'",$con); 
  $row3k=mysql_num_rows($sql3k); if($row3k>0){ $msgAu='1/2 Annualy'; }
  $sql3k_sub=mysql_query("Select Appraiser_EmployeeID from hrm_pms_kra k inner join hrm_pms_krasub ks on k.KRAId=ks.KRAId inner join hrm_employee e on k.EmployeeID=e.EmployeeID inner join hrm_employee_pms g on e.EmployeeID=g.EmployeeID where k.YearId=".$Yeark['CurrY']." and k.EmpStatus='A' and ks.Period='1/2 Annual' and e.EmpStatus='A' and g.Appraiser_EmployeeID=".$EmployeeId." and g.AssessmentYear=".$Yeark['CurrY']." and k.UseKRA!='E'",$con); 
  $row3k_sub=mysql_num_rows($sql3k_sub); if($row3k_sub>0){ $msgAu='1/2 Annualy'; } 
 }

 if($rowk>0 || $rowk_sub>0 || $row2k>0 || $row2k_sub || $row3k>0 || $row3k_sub){ ?>
 <script>
  function FunOpenAchPg(e,y,c){ var win = window.open("setkrapptgtindex.php?acct=currentAch&e="+e+"&y="+y+"&c="+c,"Form","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=500");  }
 </script>
 <tr>
 <td style="width:100%;"> 
   <table border="0" style="background-color:#D7CCE3;width:100%;" align="center">
       
	 <tr>
	   <td style="font-family:Times New Roman;font-size:16px;color:#FF0000;font-weight:bold;width:100%;">
	    <font color="#0062C4">Reporting Assessment:&nbsp;</font>
		<span class="blink_me"><span onClick="FunOpenAchPg(<?php echo $EmployeeId.','.$Yeark['CurrY'].','.$CompanyId; ?>)" style="cursor:pointer;">Please assess the performance of your team for <?php if($msgMo!=''){ echo $msgMo;}if($msgMo!='' && ($msgQu!='' || $msgAn!='')){ echo ',';}if($msgQu!=''){ echo $msgQu;}if(($msgMo!='' || $msgQu!='') && ($msgAn!='')){ echo ',';}if($msgAn!=''){ echo $msgAn;}?> KRAs by 14th of this month.</span></span>
	   </td>
	 </tr>
	 
   </table>
 </td>
 </tr>
 <?php } ?>
<?php } //if(date("d")>=08 && date("d")<=14) 


elseif(date("d")>=08 && date("d")<=14)  //14
{

 $sqlk=mysql_query("Select RepEmployeeID from hrm_pms_kra k inner join hrm_employee e on k.EmployeeID=e.EmployeeID inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where k.YearId=".$Yeark['CurrY']." and k.EmpStatus='A' and k.Period='Monthly' and e.EmpStatus='A' and g.RepEmployeeID=".$EmployeeId." and k.UseKRA!='E'",$con); 
 $rowk=mysql_num_rows($sqlk); if($rowk>0){ $msgMo='Monthly'; }
 $sqlk_sub=mysql_query("Select RepEmployeeID from hrm_pms_kra k inner join hrm_pms_krasub ks on k.KRAId=ks.KRAId inner join hrm_employee e on k.EmployeeID=e.EmployeeID inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where k.YearId=".$Yeark['CurrY']." and k.EmpStatus='A' and ks.Period='Monthly' and e.EmpStatus='A' and g.RepEmployeeID=".$EmployeeId." and k.UseKRA!='E'",$con); 
 $rowk_sub=mysql_num_rows($sqlk_sub); if($rowk_sub>0){ $msgMo='Monthly'; }

 if(date("m")==04 OR date("m")==07 OR date("m")==10 OR date("m")==01)
 { 
  $sql2k=mysql_query("Select RepEmployeeID from hrm_pms_kra k inner join hrm_employee e on k.EmployeeID=e.EmployeeID inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where k.YearId=".$Yeark['CurrY']." and k.EmpStatus='A' and k.Period='Quarter' and e.EmpStatus='A' and g.RepEmployeeID=".$EmployeeId." and k.UseKRA!='E'",$con); 
  $row2k=mysql_num_rows($sql2k); if($row2k>0){$msgQu='Quarterly';} 
  $sql2k_sub=mysql_query("Select RepEmployeeID from hrm_pms_kra k inner join hrm_pms_krasub ks on k.KRAId=ks.KRAId inner join hrm_employee e on k.EmployeeID=e.EmployeeID inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where k.YearId=".$Yeark['CurrY']." and k.EmpStatus='A' and ks.Period='Quarter' and e.EmpStatus='A' and g.RepEmployeeID=".$EmployeeId." and k.UseKRA!='E'",$con); 
  $row2k_sub=mysql_num_rows($sql2k_sub); if($row2k_sub>0){$msgQu='Quarterly';}
 }

 if(date("m")==07 OR date("m")==01)
 { 
  $sql3k=mysql_query("Select RepEmployeeID from hrm_pms_kra k inner join hrm_employee e on k.EmployeeID=e.EmployeeID inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where k.YearId=".$Yeark['CurrY']." and k.EmpStatus='A' and k.Period='1/2 Annual' and e.EmpStatus='A' and g.RepEmployeeID=".$EmployeeId." and k.UseKRA!='E'",$con); 
  $row3k=mysql_num_rows($sql3k); if($row3k>0){ $msgAu='1/2 Annualy'; }
  $sql3k_sub=mysql_query("Select RepEmployeeID from hrm_pms_kra k inner join hrm_pms_krasub ks on k.KRAId=ks.KRAId inner join hrm_employee e on k.EmployeeID=e.EmployeeID inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where k.YearId=".$Yeark['CurrY']." and k.EmpStatus='A' and ks.Period='1/2 Annual' and e.EmpStatus='A' and g.RepEmployeeID=".$EmployeeId." and k.UseKRA!='E'",$con); 
  $row3k_sub=mysql_num_rows($sql3k_sub); if($row3k_sub>0){ $msgAu='1/2 Annualy'; } 
 }

 if($rowk>0 || $rowk_sub>0 || $row2k>0 || $row2k_sub || $row3k>0 || $row3k_sub){ ?>

 <script>
  function FunOpenAchPg(e,y,c){ var win = window.open("setkrapptgtindex.php?acct=currentAch&e="+e+"&y="+y+"&c="+c,"Form","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=500");  }
 </script>
 <tr>
 <td style="width:100%;"> 
   <table border="0" style="background-color:#D7CCE3;width:100%;" align="center">
	 <tr>
	   <td style="font-family:Times New Roman;font-size:16px;color:#FF0000;font-weight:bold;width:100%;">
	    <font color="#0062C4">Reporting Assessment:&nbsp;</font>
		<span class="blink_me"><span onClick="FunOpenAchPg(<?php echo $EmployeeId.','.$Yeark['CurrY'].','.$CompanyId; ?>)" style="cursor:pointer;">Please assess the performance of your team for <?php if($msgMo!=''){ echo $msgMo;}if($msgMo!='' && ($msgQu!='' || $msgAn!='')){ echo ',';}if($msgQu!=''){ echo $msgQu;}if(($msgMo!='' || $msgQu!='') && ($msgAn!='')){ echo ',';}if($msgAn!=''){ echo $msgAn;}?> KRAs by 14th of this month.</span></span>
	   </td>
	 </tr>
   </table>
 </td>
 </tr>
 <?php } ?>
<?php } //if(date("d")>=08 && date("d")<=14)  ?>


<!-- Expiry Expiry Expiry Expiry Expiry Expiry Expiry Expiry Expiry Expiry Expiry Expiry Expiry Open-->
<!-- Expiry Expiry Expiry Expiry Expiry Expiry Expiry Expiry Expiry Expiry Expiry Expiry Expiry Open-->


<?php $date = date("Y-m-d"); $day = 60 * 60 * 24; $BeforMonth = date("Y-m-d",strtotime('-30 day')); 
if($resE['DrivingLicNo_YN']=='Y' AND $EmployeeId!=224)
{ 
if(($resE['PanNo']=='NA' OR $resE['PanNo']=='') AND ($resE['DrivingLicNo']=='NA' OR $resE['DrivingLicNo']=='')){$msg='Please provide Pan Card number and Driving Lic. copy to HR<br>';}
if(($resE['PanNo']=='NA' OR $resE['PanNo']=='') AND ($resE['DrivingLicNo']!='NA' AND $resE['DrivingLicNo']!='')){$msg='Please provide pan card copy to HR<br>';}
if(($resE['PanNo']!='NA' AND $resE['PanNo']!='') AND ($resE['DrivingLicNo']=='NA' OR $resE['DrivingLicNo']=='')){$msg='Please provide Driving Lic. copy to HR<br>';}
}
if($resE['DrivingLicNo_YN']=='N' AND $EmployeeId!=224)
{ if($resE['PanNo']=='NA' OR $resE['PanNo']==''){$msg='Please provide Pan Card number copy to HR<br>';}
  if($resE['PanNo']=='NA' OR $resE['PanNo']==''){$msg='Please provide pan card copy to HR<br>';}
}

if($resE['DrivingLicNo_YN']=='Y') 
{
if($resE['DrivingLicNo']!='NA' AND $resE['DrivingLicNo']!='')
{ $BeforDriv_Month = date("Y-m-d",strtotime($resE['Driv_ExpiryDateTo'].'-30 day')); //echo 'aa='.$resEP['Driv_ExpiryDateTo'].' - '.$BeforMonth;
  if(date("Y-m-d")>=$BeforDriv_Month AND date("Y-m-d")<date("Y-m-d",strtotime($resE['Driv_ExpiryDateTo']))){$msg2='Your Driving Lic. no expiry from date '.date("d F Y",strtotime($resE['Driv_ExpiryDateTo'])).' please renew.<br>'; } 
  elseif(date("Y-m-d")>date("Y-m-d",strtotime($resE['Driv_ExpiryDateTo']))){$msg2='Your Driving Lic. no expired from date '.date("d F Y",strtotime($resE['Driv_ExpiryDateTo'])).' please renew.<br>'; } 
}
}

if($resE['PassportNo']!='NA' AND $resE['PassportNo']!='')
{ $BeforPassport_Month = date("Y-m-d",strtotime($resE['Passport_ExpiryDateTo'].'-180 day')); //echo 'aa='.$resE['Driv_ExpiryDateTo'].' - '.$BeforMonth;
  if(date("Y-m-d")>=$BeforPassport_Month AND date("Y-m-d")<date("Y-m-d",strtotime($resE['Passport_ExpiryDateTo']))){$msg3='Your Passport number expiry from date '.date("d F Y",strtotime($resE['Passport_ExpiryDateTo'])).' please renew.<br>'; } 
  elseif(date("Y-m-d")>date("Y-m-d",strtotime($resE['Passport_ExpiryDateTo']))){$msg3='Your Passport number expired from date '.date("d F Y",strtotime($resE['Passport_ExpiryDateTo'])).' please renew.<br>'; } 
}
?>
<tr>
 <td style="width:100%;">
   <?php if($msg!='' OR $msg2!='' OR $msg3!=''){ ?> 
   <table border="0" style="background-color:#D7CCE3;width:100%;" align="center">
	 <tr>
	   <td style="font-family:Times New Roman;font-size:16px;color:#FF0000;font-weight:bold;width:100%;">
		<span class="blink_me"><?php echo $msg; ?><?php echo $msg2; ?><?php echo $msg3; ?></span>
	   </td>
	 </tr>
   </table>
   <?php } ?>
 </td>
</tr>


<!-- Leav-Query Approval Leav-Query Approval Leav-Query Approval Leav-Query Approval Leav-Query Approval Open-->
<!-- Leav-Query Approval Leav-Query Approval Leav-Query Approval Leav-Query Approval Leav-Query Approval Open-->

<?php $CFromDate=date("Y-m-01"); $CToDate=date("Y").'-12-31'; $CurrDate=date('Y-m-d h:i:s'); 
      $sqlApp=mysql_query("select * from hrm_employee_reporting where AppraiserId=".$EmployeeId, $con); 
      $sqlHod=mysql_query("select * from hrm_employee_reporting where HodId=".$EmployeeId, $con); 
	  $rowApp=mysql_num_rows($sqlApp); $rowHod=mysql_num_rows($sqlHod);
	  
	  if($rowApp>0 OR $rowHod>0){  
$sqlLeave = mysql_query("select * from hrm_employee_applyleave where Apply_SentToApp=".$EmployeeId." AND LeaveStatus!=2 AND (LeaveAppStatus=0 OR LeaveAppStatus=1) AND LeaveEmpCancelStatus='N' AND Apply_FromDate>='".$CFromDate."' order by Apply_Date DESC", $con); $rowLeave = mysql_num_rows($sqlLeave); 
$sqlLeave2 = mysql_query("select * from hrm_employee_applyleave where Apply_SentToHOD=".$EmployeeId." AND LeaveStatus!=2 AND (LeaveHodStatus=0 OR LeaveHodStatus=1) AND Leave_Type='PL' AND LeaveAppStatus=2 AND LeaveEmpCancelStatus='N' AND Apply_FromDate>='".$CFromDate."' order by Apply_Date DESC", $con); $rowLeave2 = mysql_num_rows($sqlLeave2); } 

$sqlQuery = mysql_query("select * from hrm_employee_queryemp where Level_1ID=".$EmployeeId." AND (QStatus=0 OR QStatus=1) AND (Level_1QStatus=0 OR Level_1QStatus=1) AND QueryStatus_Emp!=3 AND QueryStatus_Emp!=4 AND '".$CurrDate."'>=Level_1QToDT AND '".$CurrDate."'<Level_2QToDT order by QueryDT DESC", $con); $rowQuery = mysql_num_rows($sqlQuery);
$sqlQuery2 = mysql_query("select * from hrm_employee_queryemp where Level_2ID=".$EmployeeId." AND (QStatus=0 OR QStatus=1) AND (Level_2QStatus=0 OR Level_2QStatus=1) AND QueryStatus_Emp!=3 AND QueryStatus_Emp!=4 AND '".$CurrDate."'>=Level_2QToDT AND '".$CurrDate."'<Level_3QToDT order by QueryDT DESC", $con); $rowQuery2 = mysql_num_rows($sqlQuery2);
$sqlQuery3 = mysql_query("select * from hrm_employee_queryemp where Level_3ID=".$EmployeeId." AND (QStatus=0 OR QStatus=1) AND (Level_3QStatus=0 OR Level_3QStatus=1) AND QueryStatus_Emp!=3 AND QueryStatus_Emp!=4 AND '".$CurrDate."'>=Level_3QToDT AND '".$CurrDate."'<Mngmt_QToDT order by QueryDT DESC", $con); $rowQuery3 = mysql_num_rows($sqlQuery3);

$sqlQueryM = mysql_query("select * from hrm_employee_queryemp where AssignEmpId!=0 AND AssignEmpId!='' AND Level_1ID!=0 AND Level_1ID!='' AND Mngmt_ID=".$EmployeeId." AND (QStatus=0 OR QStatus=1) AND (Mngmt_QStatus=0 OR Mngmt_QStatus=1) AND QueryStatus_Emp!=3 AND QueryStatus_Emp!=4 AND '".$CurrDate."'>Mngmt_QToDT order by QueryDT DESC", $con); $rowQueryM = mysql_num_rows($sqlQueryM); if($rowLeave>0 OR $rowLeave2>0 OR $rowQuery>0 OR $rowQuery2>0 OR $rowQuery3>0 OR $rowQueryM>0){ ?>
<tr>
 <td style="width:100%;">
   <table border="0" style="background-color:#D7CCE3;width:100%;" align="center">
	 <tr>
	   <td style='font-family:Times New Roman;width:100%;font-size:16px;color:#FF0000;font-weight:bold;'><?php if($rowLeave>0 OR $rowLeave2>0) { ?><a href="<?php if(($rowLeave>0 AND $rowLeave2==0) OR ($rowLeave>0 AND $rowLeave2>0)){echo 'DLeave.php'; } elseif($rowLeave==0 AND $rowLeave2>0){echo 'DLeaveToHOD.php'; } ?>"><b style="color:#00509F;">Pending <font style="color:#F00000;"><span class="blink_me">LEAVE</span></font> Approval</b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?><?php if($rowQuery>0){ ?><a href="<?php if($_SESSION['EmpType']=='E'){echo 'EmpDraftQ.php';}elseif($_SESSION['EmpType']=='M'){echo 'MngmtEmpDraftQ.php';} ?>?page=1"><b style="color:#00509F;">Pending <span class="blink_me"><font style="color:#F00000;">QUERY</font></span> Approval</b></a><?php } elseif($rowQuery2>0){ ?><a href="AppMyTeamDraftQ.php?page=1"><b style="color:#00509F;">Draft/ Pending <span class="blink_me"><font style="color:#F00000;">QUERY</font></span> Approval</b></a><?php } elseif($rowQuery3>0){ ?><a href="HodMyTeamDraftQ.php?page=1"><b style="color:#00509F;">Draft/ Pending <span class="blink_me"><font style="color:#F00000;">QUERY</font></span> Approval</b></a><?php } elseif($rowQueryM>0){ ?><a href="MngmtEmpDraftQ.php?page=1"><b style="color:#00509F;">Draft/ Pending <span class="blink_me"><font style="color:#F00000;">QUERY</font></span> Approval</b></a><?php } ?>
	   </td>
	 </tr>
   </table>
 </td>
</tr> 
<?php } ?>


<!-- Attendance Authorization Attendance Authorization Attendance Authorization Attendance Authorization Open-->
<!-- Attendance Authorization Attendance Authorization Attendance Authorization Attendance Authorization Open-->

<?php $cFFDate=date("Y").'-'.date("m").'-01'; $cTTDate=date("Y").'-'.date("m").'-31';
$sAttRR=mysql_query("select * from hrm_employee_attendance_req where RId=".$EmployeeId." AND Status=0 AND (AttDate>='".$cFFDate."' AND AttDate<='".$cTTDate."')", $con); $rowAttRR=mysql_num_rows($sAttRR); 
if($rowAttRR>0){ ?>
<tr>    
 <td valign="top" align="center" style="width:100%;">
   <table border="0" style="background-color:#D7CCE3;width:100%;" align="center">
	 <tr>
	   <td style='font-family:Times New Roman;font-size:16px;color:#FF0000;width:100%;font-weight:bold;'>
	    <table style="width:100%;">
		
		 <tr>  
		  <td style='background-color:#D7CCE3;'>
		  <font style="color:#F00000;"><?php if($rowAttRR>0){ ?><a href="AttApplRep.php?m=<?php echo date("m"); ?>&Y=<?php echo date("Y"); ?>&e=4e&w=234&tt=10234&aa=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101&a=0"><b><span class="blink_me">Pending Attendance Authorisation</span></b></a><?php } ?></font>
		 </td>  
		 </tr>
		</table>
	   </td>
	 </tr>
   </table>
 </td>
</tr> 
<?php } ?>  


<!-- Confirmation Confirmation Confirmation Confirmation Confirmation Confirmation Confirmation Confirmation Open-->
<!-- Confirmation Confirmation Confirmation Confirmation Confirmation Confirmation Confirmation Confirmation Open-->

<?php $sqlApp=mysql_query("SELECT e.EmployeeID,DateJoining,ConfirmMonth FROM hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID WHERE g.RepEmployeeID=".$EmployeeId." AND e.EmpStatus='A' AND g.DateConfirmationYN='N' AND e.CompanyId=".$CompanyId, $con); $rowApp=mysql_num_rows($sqlApp); if($rowApp>0) { ?> 
<tr>
 <td style="width:100%;">
  <table border="0" style="background-color:#D7CCE3;width:100%;">
<?php while($resApp=mysql_fetch_assoc($sqlApp)){ 
if($resApp['ConfirmMonth']==6){$ConfDate=date('Y-m-d', strtotime("+6 months", strtotime($resApp['DateJoining']))); }
elseif($resApp['ConfirmMonth']==9){$ConfDate=date('Y-m-d', strtotime("+9 months", strtotime($resApp['DateJoining']))); } 
elseif($resApp['ConfirmMonth']==12){$ConfDate=date('Y-m-d', strtotime("+12 months", strtotime($resApp['DateJoining']))); }
elseif($resApp['ConfirmMonth']==15){$ConfDate=date('Y-m-d', strtotime("+15 months", strtotime($resApp['DateJoining']))); }
elseif($resApp['ConfirmMonth']==18){$ConfDate=date('Y-m-d', strtotime("+18 months", strtotime($resApp['DateJoining']))); }
elseif($resApp['ConfirmMonth']==24){$ConfDate=date('Y-m-d', strtotime("+24 months", strtotime($resApp['DateJoining']))); }
$Before15Day_1 = date("Y-m-d",strtotime($ConfDate.'-15 day'));
$sqlRec=mysql_query("select Recommendation,SubmitStatus from hrm_employee_confletter where EmployeeId=".$resApp['EmployeeID']." AND Status='A'", $con); $rowRec=mysql_num_rows($sqlRec); if($rowRec>0){ $resRec=mysql_fetch_assoc($sqlRec); } $Before15Day_1; ?>
<?php if($rowRec==0 AND date("Y-m-d")>=$Before15Day_1){ ?>
<tr><td style='font-family:Times New Roman;font-size:16px;font-weight:bold;width:100%;' align="">&nbsp;&nbsp;<a href="EmpPendingConfLetter.php"><font style="color:#00509F;">PENDING</font> <blink class="blink_me"><font style="color:#F00000;">CONFIRMATION</font></span> <font style="color:#00509F;">APPRAISAL</font></a></td></tr>
<?php } elseif($rowRec>0 AND ($resRec['Recommendation']==1 OR $resRec['Recommendation']==2) AND $resRec['SubmitStatus']=='N' AND date("Y-m-d")>=$Before15Day_1){ ?>
<tr><td style='width:100%;font-family:Times New Roman;font-size:16px;font-weight:bold;' align="">&nbsp;&nbsp;<a href="EmpPendingConfLetter.php"><font style="color:#00509F;">PENDING</font> <blink class="blink_me"><font style="color:#F00000;">CONFIRMATION</font></span> <font style="color:#00509F;">APPRAISAL</font></a></td></tr>

<?php } elseif($rowRec>0 AND $resRec['Recommendation']==2 AND $resRec['SubmitStatus']=='Y' AND date("Y-m-d")>=$Before15Day_1){ ?>
<tr><td style='width:100%;font-family:Times New Roman;font-size:16px;font-weight:bold;' align="">&nbsp;&nbsp;<a href="EmpPendingConfLetter.php"><font style="color:#00509F;">PENDING</font> <blink class="blink_me"><font style="color:#F00000;">CONFIRMATION</font></span> <font style="color:#00509F;">APPRAISAL</font></a></td></tr>

<?php } elseif($rowRec>0 AND ($resRec['Recommendation']==1 OR $resRec['Recommendation']==2) AND $resRec['SubmitStatus']=='Y' AND date("Y-m-d")>=$Before15Day_1){ echo ''; } else {echo '';} ?>
<?php } ?>

 </table>
 </td>
</tr>
<?php } ?>  


<!-- PF Slip, TDS Slip, Resignation PF Slip, TDS Slip, Resignation PF Slip, TDS Slip, Resignation Open-->
<!-- PF Slip, TDS Slip, Resignation PF Slip, TDS Slip, Resignation PF Slip, TDS Slip, Resignation Open-->

<tr>    
 <td valign="top" align="center" style="width:100%;">
   <table border="0" style="background-color:#D7CCE3;width:100%;font-family:Times New Roman;font-size:16px;color:#FF0000;width:100%;font-weight:bold;">
	 <tr>
		 		 		  
		  <td style='background-color:#D7CCE3;width:70%;'>
		  <?php /* if($CompanyId==1 AND $_SESSION['EmpType']=='E' AND $EmployeeId<=448){ ?><a href="MyPfStatement.php?page=true&disabif=r$r$r102&ee=true&rr=3234&frt=tt&gth=ere&value=767&pp=falsetrue&valuBase=rer&gth=ere&value=767&pp=falsetrue&valuBase=rer"><b style="color:#00509F;">PF Slip 2016-2017</b><img src="images/new_blink.gif" border="0"></a>&nbsp;&nbsp;&nbsp;<?php } */ ?>

<?php $EC2=$resE['EmpCode'];
$LEC2=strlen($resE['EmpCode']);
if($LEC2==1){$EC2='000'.$resE['EmpCode'];}
elseif($LEC2==2){$EC2='00'.$resE['EmpCode'];}
elseif($LEC2==3){$EC2='0'.$resE['EmpCode'];}
elseif($LEC2==4){$EC2=$resE['EmpCode'];}
else{$EC2=$resE['EmpCode'];}
$filename = 'ImgTds'.$CompanyId.'201819/'.$EC2.'.pdf';
$filename2 = 'ImgTds'.$CompanyId.'201819/'.$EC2.' - B.pdf'; 

if(file_exists($filename) OR file_exists($filename2)){ ?>	  

<script language="javascript" type="text/javascript">function MyTdsfile(n,v,c){window.open("MyTdsFile.php?a=open&File="+v+"&c="+c+"&n="+n,"MyFile","width=900,height=650"); }</script>
<img src="images/new_blink.gif" border="0"><b style="color:#00509F;">TDS Cert. 2018-2019:&nbsp;</b>

<?php if(file_exists($filename)){ ?>
<a href="<?php echo $filename;?>" style="text-decoration:none;" target="_blank"><b style="color:#FF0000;"><u>Form-A</u></b></a><?php } if(file_exists($filename2)){ ?>&ensp;<a href="<?php echo $filename2;?>" style="text-decoration:none;" target="_blank"><b style="color:#FF0000;"><u>Form-B</u></b></a><?php } ?>

<?php /* if(file_exists($filename)){ ?>
<a href="#" style="text-decoration:none;" onClick="MyTdsfile(1,<?php echo $EC2.', '.$CompanyId; ?>)"><b style="color:#FF0000;"><u>Form-A</u></b></a><?php } if(file_exists($filename2)){ ?>&ensp;<a href="#" style="text-decoration:none;" onClick="MyTdsfile(2,<?php echo $EC2.', '.$CompanyId; ?>)"><b style="color:#FF0000;"><u>Form-B</u></b></a><?php } */ ?>

<?php } else { echo ''; } ?>
</td> 		
		  
		 
<?php $sepR = mysql_query("select * from hrm_employee_separation where Rep_EmployeeID=".$EmployeeId." AND Rep_Approved='N' AND Hod_Approved='N'", $con); $rowSR=mysql_num_rows($sepR);
      $sepH = mysql_query("select * from hrm_employee_separation where Hod_EmployeeID=".$EmployeeId." AND Rep_Approved='N' AND Hod_Approved='N'", $con); $rowSH=mysql_num_rows($sepH); ?>				
		  <td style="width:30%;">
		  <?php if($rowSR>0 AND $rowSH>0){ ?><a href="TeamSprtion.php?e=4e&w=234&y=10234&a=app&e=4e2&e=4e&w=2~3~4&y=110022344&retd=ee&rr=09drfGe&S=ee11qq&wwrew=t%T@s-$~212ed818&d=101"><font style="color:#F00000;"><b id="blink">Resignation Application</b></font></a>
		  <?php } elseif($rowSR>0 AND $rowSH==0){ ?><a href="TeamSprtion.php?e=4e&w=234&y=10234&a=app&e=4e2&e=4e&w=2~3~4&y=110022344&retd=ee&rr=09drfGe&S=ee11qq&wwrew=t%T@s-$~212ed818&d=101"><font style="color:#F00000;"><b id="blink">Resignation Application</b></font></a>
		  <?php } elseif($rowSR==0 AND $rowSH>0){ ?><a href="TeamSprtion.php?e=4e&w=234&y=10234&a=hod&e=4e2&e=4e&w=234&y=110022311&retd=ee&rr=09drfGe&S=eewwqq&wwrew=t%T@sed818&d=101"><font style="color:#F00000;"><b id="blink">Resignation Application</b></font></a><?php } ?>
		 </td> 
		 
		 </tr>
		 
		 
<!--                         Employee Helth ID Card    Open                     -->
<!--                         Employee Helth ID Card    Open                    -->

<?php $EC3=$resE['EmpCode'];
$filename3 = 'HealthIDCard/'.$EC3.'/'.$EC3.'_A.pdf';
if(file_exists($filename3)){ ?>
 <tr>		 		 		  
<td style='background-color:#D7CCE3;width:70%;'>
<script language="javascript" type="text/javascript">function MyHelthfile(n,v,c){window.open("MyHelthFile.php?a=open&File="+v+"&c="+c+"&n="+n,"MyFile","width=1000,height=650"); }</script>
<a href="#" style="text-decoration:none;" onClick="MyHelthfile(1,<?php echo $EC3.', '.$CompanyId; ?>)">
 <img src="images/new_blink.gif" border="0"><b style="color:#00509F;">E-Health ID Card</b>
</a>
</td> 				 
 </tr>
<!--                         Employee Helth ID Card  Close                    -->
<!--                         Employee Helth ID Card  Close                    -->
<?php } ?>		 
		 
		 
   </table>
 </td>
</tr>


<!-- Importent Msg Importent Msg Importent Msg Importent Msg Importent Msg Importent Msg Importent Msg Open-->
<!-- Importent Msg Importent Msg Importent Msg Importent Msg Importent Msg Importent Msg Importent Msg Open-->

<?php /*  ?>
<tr>    
 <td valign="top" align="center" style="width:100%;">
   <table border="0" style="background-color:#D7CCE3;width:100%;" align="center">
	 <tr>
	   <td style='font-family:Times New Roman;font-size:16px;color:#FF0000;width:100%;font-weight:bold;'>

	    <table style="width:100%;">
		 <tr>  
		  <td style='background-color:#D7CCE3;width:100%;'>
		  <font style="color:#F00000;"><b class="blink_me">"Important"</b></font>
		  :&nbsp;The PMS 2019 begins..... all those joined before 1st January 2019 are covered in this cycle. Please complete your appraisals on time.<img src="images/new_blink.gif" border="0">
		 </td>  
		 </tr>
		</table>

	   </td>
	 </tr>
   </table>
 </td>
</tr>    
<?php */ ?>


<!-- VNR IMPACT VNR IMPACT VNR IMPACT VNR IMPACT VNR IMPACT VNR IMPACT VNR IMPACT VNR IMPACT VNR IMPACT Open-->
<!-- VNR IMPACT VNR IMPACT VNR IMPACT VNR IMPACT VNR IMPACT VNR IMPACT VNR IMPACT VNR IMPACT VNR IMPACT Open-->

<script type="text/javascript" language="javascript">
function FUnImpact(N)
{
 if(N==0){window.open("VnraImpact.php?e=4e&w=234&y=10234&a=hod&e=4e2&e=4e&w=234&y=110022311&retd=ee&rr=09drfGe&act=show&v="+N+"&valut=ture", '_blank'); window.focus();}
 if(N>0){window.open("VnrImpact.php?e=4e&w=234&y=10234&a=hod&e=4e2&e=4e&w=234&y=110022311&retd=ee&rr=09drfGe&act=show&v="+N+"&valut=false", '_blank'); window.focus();}
}
</script>
<tr>    
 <td valign="top" align="center" style="width:100%;">
   <table border="0" style="background-color:#D7CCE3;width:100%;" align="center">
	 <tr>
	   <td style='font-family:Times New Roman;font-size:16px;color:#00509F;width:100%;font-weight:bold;'>
	    <table border="0" style="width:100%; background-image:url(../AdminUser/images/AnnBoard.png);">
		 <tr>
          <?php 
		       $f=19; $e=18; $d=17; $c=16; $b=15; $a=14; 
		       $ff='19'; $ee='18'; $dd='17'; $cc='16'; $bb='15'; $aa='14'; 
		  ?>		    
		  <td style="width:110px;font-size:20px;" rowspan="3" align="center" colspan="2">
		   <font style="color:#00509F;"><b>VNR<br>Impact<br>
		   <br><a href="#" onClick="FUnImpact(<?php echo 0; ?>)" style="color:#FF2B2B;font-size:11px;">All Volume</a></b></font>
          </td>
		  <td align="center" style="width:105px;height:120px;" valign="middle"><?php if($f>0){ ?><a href="#" onClick="FUnImpact(<?php echo $f; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $f; ?>.png" style="width:95px;height:115px;"/></b></a><?php } ?></td>
		  <td align="center" style="width:105px;height:120px;" valign="middle"><?php if($e>0){ ?><a href="#" onClick="FUnImpact(<?php echo $e; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $e; ?>.png" style="width:95px;height:115px;"/></b></a><?php } ?></td>
		  <td align="center" style="width:105px;height:120px;" valign="middle"><?php if($d>0){ ?><a href="#" onClick="FUnImpact(<?php echo $d; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $d; ?>.png" style="width:95px;height:115px;"/></b></a><?php } ?></td>
		  <td align="center" style="width:105px;height:120px;" valign="middle"><?php if($c>0){ ?><a href="#" onClick="FUnImpact(<?php echo $c; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $c; ?>.png" style="width:95px;height:115px;"/></b></a><?php } ?></td>
		  <td align="center" style="width:105px;height:120px;" valign="middle"><?php if($b>0){ ?><a href="#" onClick="FUnImpact(<?php echo $b; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $b; ?>.png" style="width:95px;height:115px;"/></b></a><?php } ?></td>  
		  <td align="center" style="width:105px;height:120px;" valign="middle"><?php if($a>0){ ?><a href="#" onClick="FUnImpact(<?php echo $a; ?>)"><img src="../AdminUser/VnrImpact/Vol<?php echo $a; ?>.png" style="width:95px;height:115px;"/></b></a><?php } ?></td>
		 </tr>
		  <tr>
		  <td valign="top" align="center"><?php if($f>0){ ?><a href="#" onClick="FUnImpact(<?php echo $f; ?>)" style="color:#FF2B2B;text-decoration:none;font-size:11px;"><img src="images/new_blink.gif" border="0"><br>
		   <b class="blink_me">Volume-<?php echo $ff; ?></b></a><?php } ?></td>
		   <td valign="top" align="center"><?php if($e>0){ ?><a href="#" onClick="FUnImpact(<?php echo $e; ?>)" style="color:#FF2B2B;text-decoration:none;font-size:11px;">
		   <b>Volume-<?php echo $ee; ?></b></a><?php } ?></td>
		  <td valign="top" align="center"><?php if($d>0){ ?><a href="#" onClick="FUnImpact(<?php echo $d; ?>)" style="color:#FF2B2B;text-decoration:none;font-size:11px;">
		   <b>Volume-<?php echo $dd; ?></b></a><?php } ?></td>
		  <td valign="top" align="center"><?php if($c>0){ ?><a href="#" onClick="FUnImpact(<?php echo $c; ?>)" style="color:#FF2B2B;text-decoration:none;font-size:11px;">
		   <b>Volume-<?php echo $cc; ?></b></a><?php } ?></td>
		  <td valign="top" align="center"><?php if($b>0){ ?><a href="#" onClick="FUnImpact(<?php echo $b; ?>)" style="color:#FF2B2B;text-decoration:none;font-size:11px;">
		   <b>Volume-<?php echo $bb; ?></b></a><?php } ?></td>  
          <td valign="top" align="center"><?php if($a>0){ ?><a href="#" onClick="FUnImpact(<?php echo $a; ?>)" style="color:#FF2B2B;text-decoration:none;font-size:11px;">
		   <b>Volume-<?php echo $aa; ?></b></a><?php } ?></td>  
		 </tr>
		</table>
	   </td>
	 </tr>
   </table>
 </td>
</tr>    



<?php /*********************/  /*********************/ ?>
<?php /*********************/  /*********************/ ?>
<?php if($EmployeeId!=223 AND $EmployeeId!=224 AND $resps2['Open']=='Y' AND ($respse['ProfileCertify']=='N' OR $respse['ProfileCertify']=='')){ ?>
<tr>    
 <td valign="top" align="center" style="width:100%;">
   <table border="0" style="background-color:#D7CCE3;width:100%" align="center">
	 <tr>
	   <td style='font-family:Times New Roman;font-size:16px;color:#FF0000;width:100%;font-weight:bold;'>
	    <table>
		 <tr>
		  <td>&nbsp;</td>  
		  <td style='background-color:#D7CCE3;width:100%;'>
		  <font style="color:#F00000;"><b class="blink_me">
		  <?php echo 'Please check & "Agree" on details(Personal,Contacts,Family & Education in Profile Section), certify your Profile to proceed to other Menu.'; ?>
		  </b></font>
		 </td>  
		 </tr>
		</table>
	   </td>
	 </tr>
   </table>
 </td>
</tr>
<?php } ?>
<?php /********************/  /*********************/ ?>
<?php /********************/  /*********************/ ?>

</table>	
	</td>
   </tr>

<!-- Birthday Anniversary Open Birthday Anniversary Open -->  
<!-- Birthday Anniversary Open Birthday Anniversary Open -->
   <tr>
    <td style="width:100%;">

<table style="width:100%;">
 <tr>
  
  <td style="width:50%;">
<table style="width:100%;">

<?php /* Birthday Open Birthday Open Birthday Open */ ?>   
<?php /* Birthday Open Birthday Open Birthday Open */ ?> 
  <tr>
   <td style="width:100%;">	 
<table style="width:100%;" border="1" cellspacing="1">
 <tr bgcolor="#A691B9">
   <td align="center" valign="middle" style="width:10%;border-right:hidden;border-bottom:hidden;"><a href="#" onClick="ClickEvent('B',<?php echo $CompanyId; ?>)"><img src="images/details.png" border="0" /></a></td>
   <td valign="top" style='width:90%;font-family:Times New Roman;border-left:hidden;border-bottom:hidden;' align="center" bgcolor="#A691B9"><font color="#FFFFFF" size="4">* Birthday *</font></td>
 </tr>		
<?php $sqlEventDOB=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, Gender, DepartmentCode, DesigName, DesigCode, HqName, MobileNo_Vnr, MobileNo, DOB,Married, DR from hrm_employee e INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_designation de ON g.DesigId=de.DesigId where g.DOB!='1970-01-01' AND g.DOB!='0000-00-00' AND g.DOB_dm>='".date("0000-m-1")."' AND g.DOB_dm<='".date("0000-m-31")."'  AND e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND e.EmployeeID!=6 order by DOB_dm ASC",$con);?>
 <tr><td colspan="2" style="background-color:#D7CCE3;width:100%;border:hidden;">
	<table border="0" style="width:100%;">
	 <tr>
	  <td style="font-family:Georgia; font-size:12px;overflow:hidden;width:100%;" align="justify">		
<marquee behavior="scroll" direction="up" scrollamount="2" width="100%" height="220" style="margin-left:5px; margin-right:5px;" onMouseOver="this.setAttribute('scrollamount', 0, 0);" onMouseOut="this.setAttribute('scrollamount', 3, 0);">	
		 	
<?php  $j=1; while($resEventDOB=mysql_fetch_array($sqlEventDOB)){ 
$sDobE=mysql_query("select HR_Approved,HR_RelievingDate from hrm_employee_separation where Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C' AND EmployeeID=".$resEventDOB['EmployeeID'], $con); 
$rowDobE=mysql_num_rows($sDobE); $resDobE=mysql_fetch_assoc($sDobE);
if($rowDobE==0 OR ($rowDobE>0 AND $resDobE['HR_Approved']=='N') OR ($rowDobE>0 AND $resDobE['HR_Approved']=='Y' AND date("Y-m-d")<$resDobE['HR_RelievingDate'])){
if($resEventDOB['DR']=='Y'){$M='Dr.';}elseif($resEventDOB['Gender']=='M'){$M='Mr.';} elseif($resEventDOB['Gender']=='F' AND $resEventDOB['Married']=='Y'){$M='Mrs.';} elseif($resEventDOB['Gender']=='F' AND $resEventDOB['Married']=='N'){$M='Miss.';} $EmpNameDOB=$M.' '.$resEventDOB['Fname'].' '.$resEventDOB['Sname'].' '.$resEventDOB['Lname']; ?>		
	     <table style="width:100%;">
		  <tr>
		  <td style="width:20%;"><?php echo '<img width="70px" height="70px" src="../AdminUser/EmpImg'.$CompanyId.'Emp/'.$resEventDOB['EmpCode'].'.jpg" border="1" />'; ?></td>
		  <td valign="top" style="width:80%;font-family:Georgia; font-size:12px;overflow:hidden;">
		  <font color="#3535FF" style="font-family:Georgia; font-size:12px;"><b><?php echo date("d M",strtotime($resEventDOB['DOB'])); ?></b></font><br><?php echo $EmpNameDOB; ?><br>Dept - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resEventDOB['DepartmentCode']; ?></font><?php /*<br>Desig - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resEventDOB['DesigName']; ?></font> */ ?><br>HQ - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resEventDOB['HqName']; ?></font>
		  </td>
		 </tr>
       </table>
	     
<?php } $j++; }?>	


</marquee>
   </td></tr></table>
   </td></tr>		
</table>  	   
   </td>
  </tr>
<?php /* Birthday Close Birthday Close Birthday Close */ ?>
<?php /* Birthday Close Birthday Close Birthday Close */ ?>

</table>  
  </td>
  
  
  <td style="width:50%;">
<table style="width:100%;">

<?php /* Anniversary Open Anniversary Open Anniversary Open */ ?>   
<?php /* Anniversary Open Anniversary Open Anniversary Open */ ?> 
  <tr>
   <td style="width:100%;">	 
<table style="width:100%;" border="1" cellspacing="1">
 <tr bgcolor="#A691B9">
   <td align="center" valign="middle" style="width:10%;border-right:hidden;border-bottom:hidden;"><a href="#" onClick="ClickEvent('M',<?php echo $CompanyId; ?>)"><img src="images/details.png" border="0" /></a></td>
   <td valign="top" style='width:90%;font-family:Times New Roman;border-left:hidden;border-bottom:hidden;' align="center" bgcolor="#A691B9"><font color="#FFFFFF" size="4">* Marriage Anniversary *</font></td>
 </tr>		
<?php $sqlEventAnn=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, Gender, DepartmentCode, DesigName, HqName, MobileNo_Vnr, MobileNo, Married, MarriageDate, DR from hrm_employee e INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_designation de ON g.DesigId=de.DesigId where p.MarriageDate!='1970-01-01' AND p.MarriageDate!='0000-00-00' AND p.MarriageDate_dm>='".date("0000-m-1")."' AND p.MarriageDate_dm<='".date("0000-m-31")."' AND e.EmpStatus='A' AND e.CompanyId=".$CompanyId." order by MarriageDate_dm ASC", $con); $rowAnn=mysql_num_rows($sqlEventAnn); ?>
 <tr><td colspan="2" style="background-color:#D7CCE3;width:100%;border:hidden;">
	<table border="0" style="width:100%;">
	 <tr>
	  <td style="font-family:Georgia; font-size:12px;overflow:hidden;width:100%;" align="justify">		
<marquee behavior="scroll" direction="up" scrollamount="2" width="100%" height="220" style="margin-left:5px; margin-right:5px;" onMouseOver="this.setAttribute('scrollamount', 0, 0);" onMouseOut="this.setAttribute('scrollamount', 3, 0);">		
<?php  $i=1; while($resEventAnn=mysql_fetch_array($sqlEventAnn)) { 
$sAnnE=mysql_query("select HR_Approved,HR_RelievingDate from hrm_employee_separation where Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C' AND EmployeeID=".$resEventAnn['EmployeeID'], $con); 
$rowAnnE=mysql_num_rows($sAnnE); $resAnnE=mysql_fetch_assoc($sAnnE);
if($rowAnnE==0 OR ($rowAnnE>0 AND $resAnnE['HR_Approved']=='N') OR ($rowAnnE>0 AND $resAnnE['HR_Approved']=='Y' AND date("Y-m-d")<$resAnnE['HR_RelievingDate'])){
if($resEventAnn['DR']=='Y'){$M='Dr.';}elseif($resEventAnn['Gender']=='M'){$M='Mr.';} elseif($resEventAnn['Gender']=='F' AND $resEventAnn['Married']=='Y'){$M='Mrs.';} elseif($resEventAnn['Gender']=='F' AND $resEventAnn['Married']=='N'){$M='Miss.';} $EmpNameAnn=$M.' '.$resEventAnn['Fname'].' '.$resEventAnn['Sname'].' '.$resEventAnn['Lname']; ?>		
	   <table style="width:100%;">
		 <tr>
		  <td style="width:20%;"><?php echo '<img width="70px" height="70px" src="../AdminUser/EmpImg'.$CompanyId.'Emp/'.$resEventAnn['EmpCode'].'.jpg" border="1" />'; ?></td>
		  <td valign="top" style="width:80%;font-family:Georgia; font-size:12px;overflow:hidden;">
		  <font color="#3535FF" style="font-family:Georgia; font-size:12px;"><b><?php echo date("d M",strtotime($resEventAnn['MarriageDate'])); ?></b></font><br><?php echo $EmpNameAnn; ?><br>Dept - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resEventAnn['DepartmentCode']; ?></font><?php /*<br>Desig - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resEventAnn['DesigName']; ?></font>*/ ?><br>HQ - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resEventAnn['HqName']; ?></font>
		  </td>
		 </tr>
	    </table>  
<?php } $j++; }?>	
</marquee>
   </td></tr></table>
   </td></tr>		
</table>  	   
   </td>
  </tr>
<?php /* Anniversary Close Anniversary Close Anniversary Close */ ?>
<?php /* Anniversary Close Anniversary Close Anniversary Close */ ?>
  
</table>
 </td> 
 
 </tr>
</table>
	
	</td>
   </tr>
<!-- Birthday Anniversary Close Birthday Anniversary Close -->  
<!-- Birthday Anniversary Close Birthday Anniversary Close -->
   
 </table>
</td>
<!-- Section 22222222222 Close 22222222222 Close 22222222222 Close 22222222222 Close -->
<!-- Section 22222222222 Close 22222222222 Close 22222222222 Close 22222222222 Close -->



<!-- Section 33333333333 Open 33333333333 Open 33333333333 Open 33333333333 Open 33333333333 Open -->
<!-- Section 33333333333 Open 33333333333 Open 33333333333 Open 33333333333 Open 33333333333 Open --> 
<td style="width:20%;vertical-align:top;text-align:center;">
 <table style="width:100%;text-align:center;" cellspacing="1">
   
<?php /* Thought Of the Day Open Thought Of the Day Open */ ?> 	 
<?php /* Thought Of the Day Open Thought Of the Day Open */ ?>	  
	<tr>
     <td style="width:100%;">
	   
    <?php if($resE['Married']=='Y' AND date("m-d",strtotime($resE['MarriageDate']))==date("m-d",strtotime($resE['DOB'])) AND date("m-d",strtotime($resE['DOB']))==date("m-d")){?>
	<?php if($resE['Gender']=='M'){ ?><img src="images/Wish/mr.png" border="0"><?php } ?>
	<?php if($resE['Gender']=='F' AND $resE['Married']=='Y'){ ?><img src="images/Wish/mrs.png" border="0"><?php } ?>
	<?php if($resE['Gender']=='F' AND $resE['Married']=='N'){ ?><img src="images/Wish/miss.png" border="0"><?php } ?>
	<font color="#790000" style='font-family:Times New Roman; font-size:18px;'><b><?php echo $Ename; ?></b></font>
	<br><br>
	<img src="images/Wish/Mix.png" style="width:300;height:220;" border="0">
	<br><img src="images/Wish/vnrfamily.png" border="0">
	
	<?php } elseif($resE['Married']=='Y' AND date("m-d",strtotime($resE['MarriageDate']))==date("m-d") AND date("m-d",strtotime($resE['DOB']))!=date("m-d")){?>
	<img src="images/Wish/DearMrs.png" border="0">
    <font color="#790000" style='font-family:Times New Roman;font-size:15px;'>&nbsp;<b>
	<?php if($resE['Gender']=='F'){echo $resE['Fname'].'&nbsp;'.$resE['Sname'];} else { echo $resE['HusWifeName']; }?></i></b></font><br>
	<img src="images/Wish/DearMr.png" border="0">
	<font color="#790000" style='font-family:Times New Roman;font-size:15px;'>&nbsp;<b>
	<?php if($resE['Gender']=='M'){echo $Ename;} else { echo $resE['HusWifeName']; }?></b></font>
	<br><br>
	<?php if(date("d")<=10){ echo '<img src="images/Wish/Anni/one.png" style="width:300;height:220;" border="0">'; }
	elseif(date("d")>10 AND date("d")<=20){ echo '<img src="images/Wish/Anni/two.png" style="width:300;height:220;" border="0">'; }
	else{ echo '<img src="images/Wish/Anni/three.png" style="width:300;height:220;" border="0">'; } ?>
	<br><img src="images/Wish/vnrfamily.png" border="0">
	
	<?php } elseif(date("m-d",strtotime($resE['DOB']))==date("m-d") AND date("m-d",strtotime($resE['MarriageDate']))!=date("m-d")){ ?>
	<img src="images/Wish/dear.png" border="0">
	<?php if($resE['Gender']=='M'){ ?><img src="images/Wish/mr.png" border="0"><?php } ?>
	<?php if($resE['Gender']=='F' AND $resE['Married']=='Y'){ ?><img src="images/Wish/mrs.png" border="0"><?php } ?>
	<?php if($resE['Gender']=='F' AND $resE['Married']=='N'){ ?><img src="images/Wish/miss.png" border="0"><?php } ?>
	<font color="#790000" style='font-family:Times New Roman;font-size:15px;'>&nbsp;<b><?php echo $Ename; ?></b></font>
	<br><br>
	<?php if(date("d")<=10){ echo '<img src="images/Wish/Birth/one.png" style="width:300;height:220;" border="0">'; }
	elseif(date("d")>10 AND date("d")<=20){ echo '<img src="images/Wish/Birth/two.png" style="width:300;height:220;" border="0">'; }
	else{ echo '<img src="images/Wish/Birth/three.png" style="width:300;height:220;" border="0">'; } ?>
	<br><img src="images/Wish/vnrfamily.png" border="0">
	
	<?php } else { ?>		
		 
     <table border="0">
     <tr><td valign="top" align="center" bgcolor="#A691B9"><font color="#FFFFFF" style='font-family:Times New Roman;' size="4">Thought for the Day</font></td></tr> 
	 <tr><td valign="top" style="width:295px;"><?php echo "<img style='width:300;height:220;' border='0' src=\"show_Thought.php?id=".date("d")."\">\n <br>";
$sqT=mysql_query("select ThoughtText from hrm_thought where ThoughtDay=".date("d"), $con); $reT=mysql_fetch_assoc($sqT);
echo "<font color='#8833FF' style='font-family:Times New Roman;' size='4'><i><b>".$reT['ThoughtText']."</b></i></font>"; ?>
</td></tr></table>

     <?php } ?>	   
	   
	 </td>
	</tr>
<?php /* Thought Of the Day Close Thought Of the Day Close */ ?> 	 
<?php /* Thought Of the Day Close Thought Of the Day Close */ ?>


    <tr>
	 <td style="width:100%;">
	 
<table style="width:100%;" cellspacing="1">
<?php /* Corporate Anniversary Open Corporate Anniversary Open Corporate Anniversary Open */ ?>   
<?php /* Corporate Anniversary Open Corporate Anniversary Open Corporate Anniversary Open */ ?> 
  <tr>
   <td style="width:100%;">	 
<table style="width:100%;" border="1" cellspacing="1">
 <tr bgcolor="#A691B9">
   <td align="center" valign="middle" style="width:20px;border-right:hidden;border-bottom:hidden;"><a href="#" onClick="ClickEvent('C',<?php echo $CompanyId; ?>)"><img src="images/details.png" border="0" /></a></td>
   <td valign="top" style='font-family:Times New Roman;border-left:hidden;border-bottom:hidden;' align="center" bgcolor="#A691B9"><font color="#FFFFFF" size="4">* Corporate Anniversary *</font></td>
 </tr>		
<?php $Y=date("Y"); 
$Be_7D_1 = date("Y-m-01",strtotime('-2555 day'));  $Be_7D_2 = date("Y-m-31",strtotime('-2555 day'));
$Be_5D_1 = date("Y-m-01",strtotime('-1825 day')); $Be_5D_2 = date("Y-m-31",strtotime('-1825 day'));
$Be_3D_1 = date("Y-m-01",strtotime('-1095 day')); $Be_3D_2 = date("Y-m-31",strtotime('-1095 day'));
$Be_1D_1 = date("Y-m-01",strtotime('-365 day')); $Be_1D_2 = date("Y-m-31",strtotime('-365 day'));
$S7=mysql_query("select e.EmployeeID, Fname, Sname, Lname, Gender, DepartmentCode, DesigName, HqName, Married, DateJoining, DR from hrm_employee e INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_designation de ON g.DesigId=de.DesigId where g.DateJoining>='".$Be_7D_1."' AND g.DateJoining<='".$Be_7D_2."' AND e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DepartmentId!=17 AND g.DepartmentId!=18 AND g.DepartmentId!=23 order by DateJoining ASC", $con); $Ro7=mysql_num_rows($S7); 
 $S5=mysql_query("select e.EmployeeID, Fname, Sname, Lname, Gender, DepartmentCode, DesigName, HqName, Married, DateJoining, DR from hrm_employee e INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_designation de ON g.DesigId=de.DesigId where g.DateJoining>='".$Be_5D_1."' AND g.DateJoining<='".$Be_5D_2."' AND e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DepartmentId!=17 AND g.DepartmentId!=18 AND g.DepartmentId!=23 order by DateJoining ASC", $con); $Ro5=mysql_num_rows($S5);  
 $S3=mysql_query("select e.EmployeeID, Fname, Sname, Lname, Gender, DepartmentCode, DesigName, HqName, Married, DateJoining, DR from hrm_employee e INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_designation de ON g.DesigId=de.DesigId where g.DateJoining>='".$Be_3D_1."' AND g.DateJoining<='".$Be_3D_2."' AND e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DepartmentId!=17 AND g.DepartmentId!=18 AND g.DepartmentId!=23 order by DateJoining ASC", $con); $Ro3=mysql_num_rows($S3);
 $S1=mysql_query("select e.EmployeeID, Fname, Sname, Lname, Gender, DepartmentCode, DesigName, HqName, Married, DateJoining, DR from hrm_employee e INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_designation de ON g.DesigId=de.DesigId where g.DateJoining>='".$Be_1D_1."' AND g.DateJoining<='".$Be_1D_2."' AND e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DepartmentId!=17 AND g.DepartmentId!=18 AND g.DepartmentId!=23 order by DateJoining ASC", $con); $Ro1=mysql_num_rows($S1); ?>
 <tr><td colspan="2" style="background-color:#D7CCE3;width:100%;border:hidden;">

<?php if($Ro7>0 OR $Ro5>0 OR $Ro3>0 OR $Ro1>0) { ?> 
	<table border="0" style="width:100%;">
	 <tr><td style="font-family:Georgia;font-size:12px;color:#006400;width:280px;" align="center"><b>Congratulations on completion of milestone (7, 5, 3, 1) years in VNR.</b></td></tr>
	 
	 <tr>
	  <td style="font-family:Georgia; font-size:12px;overflow:hidden;width:100%;" align="justify">		
<marquee behavior="scroll" direction="up" scrollamount="2" width="284" height="190"style="margin-left:5px; margin-right:5px;" onMouseOver="this.setAttribute('scrollamount', 0, 0);" onMouseOut="this.setAttribute('scrollamount', 3, 0);">		
<?php  while($RS7=mysql_fetch_array($S7)) { 
$srelv7=mysql_query("select HR_Approved,HR_RelievingDate from hrm_employee_separation where Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C' AND EmployeeID=".$RS7['EmployeeID'], $con); 
$rowrelv7=mysql_num_rows($srelv7); $resrelv7=mysql_fetch_assoc($srelv7);
if($rowrelv7==0 OR ($rowrelv7>0 AND $resrelv7['HR_Approved']=='N') OR ($rowrelv7>0 AND $resrelv7['HR_Approved']=='Y' AND date("Y-m-d")<$resrelv7['HR_RelievingDate'])){
if($RS7['DR']=='Y'){$M='Dr.';}elseif($RS7['Gender']=='M'){$M='Mr.';} elseif($RS7['Gender']=='F' AND $RS7['Married']=='Y'){$M='Mrs.';} elseif($RS7['Gender']=='F' AND $RS7['Married']=='N'){$M='Miss.';} $EmpName=$M.' '.$RS7['Fname'].' '.$RS7['Sname'].' '.$RS7['Lname']; ?>	
		  <table style="width:100%;">
		   <tr>
		    <td valign="top"><img src="../images/Shield/7.png" style="width:70px;height:70px;" border="0"></td>
		    <td valign="top" style="font-family:Georgia; font-size:12px; overflow:hidden;">
			<font color="#3535FF"><b><?php echo date("d-M-y",strtotime($RS7['DateJoining'])); ?></b></font><br>
		    <?php echo $EmpName; ?><br>Dept - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $RS7['DepartmentCode']; ?></font><?php /*<br>Desig - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $RS7['DesigName']; ?></font>*/ ?><br>HQ - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $RS7['HqName']; ?></font>
		   </td>
		   </tr>
	     </table>  
<?php } } while($RS5=mysql_fetch_array($S5)) { 
$srelv5=mysql_query("select HR_Approved,HR_RelievingDate from hrm_employee_separation where Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C' AND EmployeeID=".$RS5['EmployeeID'], $con); 
$rowrelv5=mysql_num_rows($srelv5); $resrelv5=mysql_fetch_assoc($srelv5);
if($rowrelv5==0 OR ($rowrelv5>0 AND $resrelv5['HR_Approved']=='N') OR ($rowrelv5>0 AND $resrelv5['HR_Approved']=='Y' AND date("Y-m-d")<$resrelv5['HR_RelievingDate'])){
if($RS5['DR']=='Y'){$M='Dr.';}elseif($RS5['Gender']=='M'){$M='Mr.';} elseif($RS5['Gender']=='F' AND $RS5['Married']=='Y'){$M='Mrs.';} elseif($RS5['Gender']=='F' AND $RS5['Married']=='N'){$M='Miss.';} $EmpName=$M.' '.$RS5['Fname'].' '.$RS5['Sname'].' '.$RS5['Lname']; ?>	
		  <table style="width:100%;">
		   <tr>
		    <td valign="top"><img src="../images/Shield/5.png" style="width:70px;height:70px;" border="0"></td>
		    <td valign="top" style="font-family:Georgia; font-size:12px; overflow:hidden;">
			<font color="#3535FF"><b><?php echo date("d-M-y",strtotime($RS5['DateJoining'])); ?></b></font><br>
		    <?php echo $EmpName; ?><br>Dept - <font color="#AA0000" style="font-family:Georgia;font-size:12px;"><?php echo $RS5['DepartmentCode']; ?></font><?php /*<br>Desig - <font color="#AA0000" style="font-family:Georgia;font-size:12px;"><?php echo $RS5['DesigName']; ?></font>*/ ?><br>HQ - <font color="#AA0000" style="font-family:Georgia;font-size:12px;"><?php echo $RS5['HqName']; ?></font>
		   </td>
		   </tr>
	     </table>  
<?php } } while($RS3=mysql_fetch_array($S3)) { 
$srelv3=mysql_query("select HR_Approved,HR_RelievingDate from hrm_employee_separation where Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C' AND EmployeeID=".$RS3['EmployeeID'], $con); 
$rowrelv3=mysql_num_rows($srelv3); $resrelv3=mysql_fetch_assoc($srelv3);
if($rowrelv3==0 OR ($rowrelv3>0 AND $resrelv3['HR_Approved']=='N') OR ($rowrelv3>0 AND $resrelv3['HR_Approved']=='Y' AND date("Y-m-d")<$resrelv3['HR_RelievingDate'])){
if($RS3['DR']=='Y'){$M='Dr.';}elseif($RS3['Gender']=='M'){$M='Mr.';} elseif($RS3['Gender']=='F' AND $RS3['Married']=='Y'){$M='Mrs.';} elseif($RS3['Gender']=='F' AND $RS3['Married']=='N'){$M='Miss.';} $EmpName=$M.' '.$RS3['Fname'].' '.$RS3['Sname'].' '.$RS3['Lname']; ?>	
		  <table style="width:100%;">
		   <tr>
		    <td valign="top"><img src="../images/Shield/3.png" style="width:70px;height:70px;" border="0"></td>
		    <td valign="top" style="font-family:Georgia; font-size:12px; overflow:hidden;">
			<font color="#3535FF"><b><?php echo date("d-M-y",strtotime($RS3['DateJoining'])); ?></b></font><br>
		    <?php echo $EmpName; ?><br>Dept - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $RS3['DepartmentCode']; ?></font><?php /*<br>Desig - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $RS3['DesigName']; ?></font>*/?><br>HQ - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $RS3['HqName']; ?></font>
		   </td>
		   </tr>
	     </table>  
<?php } }  while($RS1=mysql_fetch_array($S1)) { 
$srelv=mysql_query("select HR_Approved,HR_RelievingDate from hrm_employee_separation where Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C' AND EmployeeID=".$RS1['EmployeeID'], $con); 
$rowrelv=mysql_num_rows($srelv); $resrelv=mysql_fetch_assoc($srelv);
if($rowrelv==0 OR ($rowrelv>0 AND $resrelv['HR_Approved']=='N') OR ($rowrelv>0 AND $resrelv['HR_Approved']=='Y' AND date("Y-m-d")<$resrelv['HR_RelievingDate'])){
if($RS1['DR']=='Y'){$M='Dr.';}elseif($RS1['Gender']=='M'){$M='Mr.';} elseif($RS1['Gender']=='F' AND $RS1['Married']=='Y'){$M='Mrs.';} elseif($RS1['Gender']=='F' AND $RS1['Married']=='N'){$M='Miss.';} $EmpName=$M.' '.$RS1['Fname'].' '.$RS1['Sname'].' '.$RS1['Lname']; ?>	
		  <table style="width:100%;">
		   <tr>
		    <td valign="top"><img src="../images/Shield/1.png" style="width:70px;height:70px;" border="0"></td>
		    <td valign="top" style="font-family:Georgia; font-size:12px; overflow:hidden;">
			<font color="#3535FF"><b><?php echo date("d-M-y",strtotime($RS1['DateJoining'])); ?></b></font><br>
		    <?php echo $EmpName; ?><br>Dept - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $RS1['DepartmentCode']; ?></font><?php /*<br>Desig - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $RS1['DesigName']; ?></font>*/ ?><br>HQ - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $RS1['HqName']; ?></font>
		   </td>
		   </tr>
	     </table>  
<?php } } ?>	
</marquee>
   </td>
   </tr>
  </table>
<?php } //if($Ro7>0 OR $Ro5>0 OR $Ro3>0 OR $Ro1>0) ?> 	
   </td>
  </tr>		
</table> 
   
   </td>
  </tr>
<?php /* Corporate Anniversary Close Corporate Anniversary Close Corporate Anniversary Close */ ?>
<?php /* Corporate Anniversary Close Corporate Anniversary Close Corporate Anniversary Close */ ?>	 
</table>	 
	 </td>
	</tr>
   
 </table>
</td>
<!-- Section 33333333333 Close 33333333333 Close 33333333333 Close 33333333333 Close -->
<!-- Section 33333333333 Close 33333333333 Close 33333333333 Close 33333333333 Close -->  
</tr>
<?php //******************** Main Body Main Body Close Close *************************** ?>
<?php //******************** Main Body Main Body Close Close *************************** ?>	
<?php }else{ ?>
<tr>
 <td align="center" style="font-size:16px;font-family:Times New Roman; background-color:#FFFF53;width:20%;">
 <?php if(date("Y-m-d H:i:s")<='2050-12-31 23:59:59'){ ?>
  <div class="col-md-10 well" align="center" style="box-shadow: 5px 10px 30px #888888;">
<legend class="bgc" style="color:#fff;padding-top:10px;padding-bottom:10px;border-top-left-radius:10px; width:100%; border-top-right-radius:10px;vertical-align:middle;"><span style="font-size:24px;font-weight:bold;text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;">&nbsp;Government Social Security Schemes&nbsp;</span></legend>
 <span style="cursor:pointer;color:#002D59;font-size:18px;" onClick="OpenOpin(<?php echo $EmployeeId.','.$CompanyId; ?>)"><u>Click</u></span> 
  </div>
  <br><br>
 <?php } ?>
 </td>
</tr> 
<?php } ?>


<?php } // if(Driving>0) if(date("Y-m-d")>='2020-02-29' AND $resDept['Req_DrivLic']=='N') ?>


       </table>	   
    </td>
   </tr>
  
   <tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr>  	
   <tr><?php if($_SESSION['login'] = true){ ?><td valign="top" style=""><?php require_once("../footer.php"); ?></td><?php } ?></tr>
  </table> 
 </td>
</tr> 
</table>
</body>
</html>

