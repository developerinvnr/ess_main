<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');} 
if(isset($_POST['AskQuery']))
{ 
  if($_POST['SubValue']!=0){ $sqlSub=mysql_query("select * from hrm_deptquerysub where DeptQSubId=".$_POST['SubValue'], $con); $resSub=mysql_fetch_assoc($sqlSub);
  $QSubject=$resSub['DeptQSubject']; $OthQSub='N'; $EmpAssign=$resSub['AssignEmpId']; //$AssigEmp=$resSub['AssignEmpId'];
  
  if($_POST['DeptName']==2 && $_POST['SubValue']==86)
  { 
	$sqlaR=mysql_query("select * from hrm_employee_reporting where EmployeeID=".$EmployeeId,$con);
	$resaR=mysql_fetch_assoc($sqlaR); 
	if($resaR['AppraiserId']==7 OR $resaR['ReviewerId']==7 OR $resaR['HodId']==7){ $AssigEmp=7; }
	elseif($resaR['AppraiserId']==89 OR $resaR['ReviewerId']==89 OR $resaR['HodId']==89){ $AssigEmp=89; }
  }
  elseif($EmpAssign!=9999){$AssigEmp=$resSub['AssignEmpId'];}
  elseif($EmpAssign==9999)
  {
    $sEI=mysql_query("select * from hrm_employee_state where StateId=".$_POST['EmpStateId']." AND CompanyId=".$CompanyId, $con); $rEI=mysql_fetch_array($sEI);
    if($_POST['DeptName']==1){$AssigEmp=$rEI['HR_EId'];} elseif($_POST['DeptName']==2){$AssigEmp=$rEI['RD_EId'];}
	elseif($_POST['DeptName']==3){$AssigEmp=$rEI['PD_EId'];} elseif($_POST['DeptName']==4){$AssigEmp=$rEI['PRODUCTION_EId'];}
	elseif($_POST['DeptName']==5){$AssigEmp=$rEI['PPROCESSING_EId'];} elseif($_POST['DeptName']==6){$AssigEmp=$rEI['SALES_EId'];}
	elseif($_POST['DeptName']==7){$AssigEmp=$rEI['LOGISTICS_EId'];}	elseif($_POST['DeptName']==8){$AssigEmp=$rEI['FINANCE_EId'];}
	elseif($_POST['DeptName']==9){$AssigEmp=$rEI['IT_EId'];} elseif($_POST['DeptName']==10){$AssigEmp=$rEI['LEGAL_EId'];}
	elseif($_POST['DeptName']==11){$AssigEmp=$rEI['ADMIN_EId'];} elseif($_POST['DeptName']==12){$AssigEmp=$rEI['MARKETING_EId'];}
	elseif($_POST['DeptName']==24){$AssigEmp=$rEI['QA_EId'];} elseif($_POST['DeptName']==25){$AssigEmp=$rEI['FS_EId'];}
  }
  
  $sqlR=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$AssigEmp, $con); $resR=mysql_fetch_assoc($sqlR); 
 
if($resR['DR']=='Y'){$M2='Dr.';} elseif($resR['Gender']=='M'){$M2='Mr.';} elseif($resR['Gender']=='F' AND $resR['Married']=='Y'){$M2='Mrs.';} elseif($resR['Gender']=='F' AND $resR['Married']=='N'){$M2='Miss.';}  $RName=$M2.' '.$resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname'];  

 if($_POST['DeptName']==2 && $_POST['SubValue']==86){ $RepId=$AssigEmp; $HodId=$AssigEmp; }
 else
 {
  $sqlH=mysql_query("select AppraiserId,HodId from hrm_employee_reporting where EmployeeID=".$AssigEmp, $con); 
  $resH=mysql_fetch_assoc($sqlH); $RepId=$resH['AppraiserId']; $HodId=$resH['HodId'];
 }
 
  $Eone=date("Y-m-d"); $Etwo=date("Y-m-d",strtotime('+3 day')); $Eno=0; 
  $Estart=new DateTime($Eone);
  $Eend=new DateTime($Etwo);
  $interval=DateInterval::createFromDateString('1 day');
  $Eperiod=new DatePeriod($Estart, $interval, $Eend);
  foreach($Eperiod as $dt) {if($dt->format('N')==7){$Eno++;}} //echo 'e=='.$Eno.'<br>'; 
  //for($i=$Eone;$i<=$Etwo;$i++){ $Eday=date("N",strtotime($i)); if($Eday==7) { $Eno++; } } 
  $sqlE = mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$AssigEmp." AND AttValue='HO' AND AttDate>='".date("Y-m-d")."' AND AttDate<='".date("Y-m-d",strtotime('+3 day'))."'", $con); $rowE = mysql_num_rows($sqlE); $TotE=$Eno+$rowE; $TotDEmp=$TotE+3; $EmpDay = date("Y-m-d h:i:s",strtotime('+'.$TotDEmp.' day'));
  
  $Aone=date("Y-m-d"); $Atwo=date("Y-m-d",strtotime('+6 day')); $Ano=0; 
  $Astart=new DateTime($Aone);
  $Aend=new DateTime($Atwo);
  $interval=DateInterval::createFromDateString('1 day');
  $Aperiod=new DatePeriod($Astart, $interval, $Aend);
  foreach($Aperiod as $dt) {if($dt->format('N')==7){$Ano++;}} //echo 'A=='.$Ano.'<br>';
  //for($i=$Aone;$i<=$Atwo;$i++){ $Aday=date("N",strtotime($i)); if($Aday==7) { $Ano++; } } 
  $sqlA = mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$RepId." AND AttValue='HO' AND AttDate>='".date("Y-m-d")."' AND AttDate<='".date("Y-m-d",strtotime('+6 day'))."'", $con); $rowA = mysql_num_rows($sqlA); $TotA=$Ano+$rowA; $TotDApp=$TotA+6; $AppDay = date("Y-m-d h:i:s",strtotime('+'.$TotDApp.' day'));
  
  $Hone=date("Y-m-d"); $Htwo=date("Y-m-d",strtotime('+9 day')); $Hno=0; 
  $Hstart=new DateTime($Hone);
  $Hend=new DateTime($Htwo);
  $interval=DateInterval::createFromDateString('1 day');
  $Hperiod=new DatePeriod($Hstart, $interval, $Hend);
  foreach($Hperiod as $dt) {if($dt->format('N')==7){$Hno++;}} //echo 'H=='.$Hno.'<br>';
  //for($i=$Hone;$i<=$Htwo;$i++){ $Hday=date("N",strtotime($i)); if($Hday==7) { $Hno++; } } 
  $sqlH = mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$HodId." AND AttValue='HO' AND AttDate>='".date("Y-m-d")."' AND AttDate<='".date("Y-m-d",strtotime('+9 day'))."'", $con); $rowH = mysql_num_rows($sqlH); $TotH=$Hno+$rowH; $TotDHod=$TotH+9; $HodDay = date("Y-m-d h:i:s",strtotime('+'.$TotDHod.' day'));
  
 }
 else 
 { $QSubject='N'; $OthQSub=$_POST['OthSub']; $AssigEmp=0; $RepId=0; $HodId=0; $EmpDay='0000-00-00 00:00:00'; $AppDay='0000-00-00 00:00:00'; $HodDay='0000-00-00 00:00:00';}
 if($CompanyId==1){$MnmtId=223;} elseif($CompanyId==2){$MnmtId=233;}elseif($CompanyId==3){$MnmtId=259;}
 //echo '$EmpDay='.$EmpDay.'<br>'; echo '$AppDay='.$AppDay.'<br>'; echo '$HodDay='.$HodDay.'<br>';

 $search =  '!"#$%&/=*+\'-;:_';
 $search = str_split($search);
 $str_Q = $_POST['Query']; 
 $EmpQ=str_replace($search, "", $str_Q);
 
 if($_POST['DeptName']==2 && $_POST['SubValue']==86)
 {
   $EmpDay = date("Y-m-d h:i:s",strtotime('+30 day'));
   $AppDay = date("Y-m-d h:i:s",strtotime('+30 day')); 
   $HodDay = date("Y-m-d h:i:s",strtotime('+30 day')); 
   $MnmtId = $HodId;
 }
 
 $SqlQIns=mysql_query("insert into hrm_employee_queryemp(EmployeeID, RepMgrId, HodId, QToDepartmentId, QSubjectId, QuerySubject, OtherSubject, AssignEmpId, HideYesNo, QueryValue, QueryDT, QueryNoOfTime, MailTo_Emp, MailTo_QueryOwner, Level_1ID, Level_1QToDT, Level_2ID, Level_2QToDT, Level_3ID, Level_3QToDT, Mngmt_ID, Mngmt_QToDT, QueryYearId)values(".$EmployeeId.", ".$_POST['RepID'].", ".$_POST['HodID'].", '".$_POST['DeptName']."', ".$_POST['SubValue'].", '".$QSubject."', '".$OthQSub."', ".$AssigEmp.", '".$_POST['VCheck']."', '".$EmpQ."', '".date("Y-m-d h:i:s")."', 1, 1, 1, ".$AssigEmp.", '".date("Y-m-d h:i:s")."', ".$RepId.", '".$EmpDay."', ".$HodId.", '".$AppDay."', ".$MnmtId.", '".$HodDay."', ".$YearId.")", $con); 

   $sqlDD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_POST['DeptName']." AND CompanyId=".$CompanyId, $con); $resDD=mysql_fetch_assoc($sqlDD);    
   if($QSubject=='N'){$QS=$OthQSub;}else{$QS=$QSubject;}	
   if($_POST['VCheck']=='Y'){$name='Name Undisclosed';}else{$name=$_POST['Ename'];}
   
$sqlMK=mysql_query("select * from hrm_employee_querymail_key where QueryMailId=1 AND CompanyId=".$CompanyId, $con); $resMK=mysql_fetch_assoc($sqlMK);  

   //Self
   if($_POST['EmailSelf']!='' AND $resMK['Employee']=='Y')
   {
	//$email_to = $_POST['EmailSelf'];
    //$email_from='admin@vnrseeds.co.in';
	$email_subject = "Posted Query";  
	//$headers = "From: $email_from ". "\r\n";
	//$headers .= "MIME-Version: 1.0\r\n";
    //$headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
    $email_message .="<html><head></head><body>";
    $email_message .= "Dear <b>".$name."</b> <br><br>\n\n\n";
    $email_message .= "We have recieved your query about Subject-<b>".$QS."</b> raised to Department-<b>".$resDD['DepartmentCode']."</b>.<br>";
	$email_message .= "We have forwarded the same to appropriate owner and a reply shall be sent soon.<br><br>\n\n\n";
	$email_message .= "From <br><b>ADMIN ESS</b><br>";
    $email_message .="</body></html>";	           
    //$ok = @mail($email_to, $email_subject, $email_message, $headers);
    
      $subject=$email_subject;
      $body=$email_message;
      $email_to=$_POST['EmailSelf'];
      require 'vendor/mail_admin.php';
    
   }
         
   //Query owner
   if($_POST['SubValue']!=0 AND $resR['EmailId_Vnr']!='' AND $resMK['Leve_l']=='Y')
   {
	//$email_toT = $resR['EmailId_Vnr'];
    //$email_fromT='admin@vnrseeds.co.in';
	$email_subjectT = "Query from ".$name;   
//	$headersT = "From: $email_fromT ". "\r\n";
//	$headersT .= "MIME-Version: 1.0\r\n";
   // $headersT .= "Content-type: text/html; charset=ISO-8859-1\r\n";
	$email_messageT .="<html><head></head><body>";
	$email_messageT .= "Dear <b>".$RName."</b> <br><br>\n\n\n";
    $email_messageT .= $name." has raised a query on Subject-<b>".$QS."</b>, go to <b>ESS-QUERY</b> for more details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br>"; 
	
	if($_POST['DeptName']==2 && $_POST['SubValue']==86){ $email_messageT .= "<br>\n\n\n"; }
	else{ $email_messageT .= "<b>You</b> need to answer query in 3 working days after which it will get escalated to next level.<br><br>\n\n\n"; }

	$email_messageT .= "From <br><b>ADMIN ESS</b><br>";
	$email_messageT .="</body></html>";	
    //$ok = @mail($email_toT, $email_subjectT, $email_messageT, $headersT);
    
      $subject=$email_subjectT;
      $body=$email_messageT;
      $email_to=$resR['EmailId_Vnr'];
      require 'vendor/mail_admin.php';
    
   }  


   if($_POST['DeptName']!=2 && $_POST['SubValue']!=86)
   {

   //Reporting Manager
   if($_POST['EmailRep']!='' AND $resMK['ReportingMgr']=='Y')
   {
   
	//$email_toR = $_POST['EmailRep'];
    //$email_fromR='admin@vnrseeds.co.in';
	$email_subjectR = "Query Raised By ".$name;  
	//$headersR = "From: $email_fromR ". "\r\n";
	//$headersR .= "MIME-Version: 1.0\r\n";
    //$headersR .= "Content-type: text/html; charset=ISO-8859-1\r\n";
    $email_messageR .="<html><head></head><body>";
    $email_messageR .= "Dear <b>".$_POST['RepName']."</b> <br><br>\n\n\n";
    $email_messageR .= "Your team member ".$name." has raised a query about Subject-<b>".$QS."</b> to Department-<b>".$resDD['DepartmentCode']."</b>.<br>";
	$email_messageR .= "Kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a> for more details.<br>";
	$email_messageR .= "From <br><b>ADMIN ESS</b><br>";
    $email_messageR .="</body></html>";	           
    //$ok = @mail($email_toR, $email_subjectR, $email_messageR, $headersR);
    
      $subject=$email_subjectR;
      $body=$email_messageR;
      $email_to=$_POST['EmailRep'];
      require 'vendor/mail_admin.php';
    
   }   
   
   //HOD
   if($_POST['EmailHod']!='' AND $resMK['HOD']=='Y')
   {
	//$email_toH = $_POST['EmailHod'];
    //$email_fromH='admin@vnrseeds.co.in';
	$email_subjectH = "Query Raised By ".$name;  
	//$headersH = "From: $email_fromH ". "\r\n";
	//$headersH .= "MIME-Version: 1.0\r\n";
    //$headersH .= "Content-type: text/html; charset=ISO-8859-1\r\n";
    $email_messageH .="<html><head></head><body>";
    $email_messageH .= "Dear <b>".$_POST['HodName']."</b> <br><br>\n\n\n";
    $email_messageH .= "Your team member ".$name." has raised a query about Subject-<b>".$QS."</b> to Department-<b>".$resDD['DepartmentCode']."</b>.<br>";
	$email_messageH .= "Kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a> for more details.<br>";
	$email_messageH .= "From <br><b>ADMIN ESS</b><br>";
    $email_messageH .="</body></html>";	           
    //$ok = @mail($email_toH, $email_subjectH, $email_messageH, $headersH);
    
      $subject=$email_subjectH;
      $body=$email_messageH;
      $email_to=$_POST['EmailHod'];
      require 'vendor/mail_admin.php';
    
   }
   
   } //if($_POST['DeptName']!=2 AND $_POST['SubValue']!=86)

   //HR
   if($_POST['SubValue']==0 AND $resMK['HR']=='Y')
   {
	//$email_toHR = 'vspl.hr@vnrseeds.com';
        //if($_POST['EmailSelf']==''){$email_fromHR = $_POST['Ename'];} else {$email_fromHR=$_POST['EmailSelf'];}
	$email_subjectHR = "Query from ".$name;   
	//$headersHR = "From: $email_fromHR ". "\r\n";
	//$headersHR .= "MIME-Version: 1.0\r\n";
    //$headersHR .= "Content-type: text/html; charset=ISO-8859-1\r\n";
	$email_messageHR .="<html><head></head><body>";
    $email_messageHR .= $name." has raised a query on subject select <b>others</b>, go to <b>ESS-QUERY</b> for more details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br>"; 
	$email_messageHR .= "<b>Please</b> assign query to appropriate owner.<br><br>\n\n\n";
	$email_messageHR .= "From <br><b>ADMIN ESS</b><br>";
	$email_messageHR .="</body></html>";	
    //$ok = @mail($email_toHR, $email_subjectHR, $email_messageHR, $headersHR);
    
      $subject=$email_subjectHR;
      $body=$email_messageHR;
      $email_to='vspl.hr@vnrseeds.com';
      require 'vendor/mail_admin.php';
    
   }  


 
if($SqlQIns) {$msg='Your Query has been submitted!';}
}

if($_REQUEST['ac']=='CloseQuery' AND $_REQUEST['QCid']!='')
{$sqlDel=mysql_query("update hrm_employee_queryemp set QueryStatus_Emp=3 where QueryId=".$_REQUEST['QCid'], $con); }

if($_REQUEST['ac']=='RatQuery' AND $_REQUEST['QId']!='')
{$sqlRat=mysql_query("update hrm_employee_queryemp set EmpQRating=".$_REQUEST['v']." where QueryId=".$_REQUEST['QId'], $con); }

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style>.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function SelDept(d)
{ var url = 'DeptQsubject.php';	var pars = 'DeptQS='+d;	var myAjax = new Ajax.Request(
	url, {	method: 'post',	parameters: pars, onComplete: show_DeptQS });
} 
function show_DeptQS(originalRequest)
{ document.getElementById('SubSpan').innerHTML = originalRequest.responseText; }

function SelSubject(v)
{ 
  if(v==""){alert("Please select subject!"); document.getElementById("AskQuery").disabled=true; document.getElementById("HideCheck").disabled=true; return false;}
  else if(v==0){document.getElementById("TD_1").style.display='block'; document.getElementById("TD_2").style.display='block';} 
  else {document.getElementById("TD_1").style.display='none'; document.getElementById("TD_2").style.display='none';} 
  if(v!=""){document.getElementById("AskQuery").disabled=false; document.getElementById("HideCheck").disabled=false;}
  document.getElementById("SubValue").value=v;
}


function validate(AskQform) 
{ var QuerySub=document.getElementById("QuerySubj").value; 
  if(QuerySub==''){alert("Please select subject name!"); return false;}
  if(QuerySub==0)
  { var OtherSub=document.getElementById("OthSub").value;
    if(OtherSub.length == 0){ alert("Please type other subject name!"); return false;}
  }
  var Query=document.getElementById("Query").value;
  if(Query.length == 0){ alert("Please type Query!"); return false;}
  //if(Query.length<25){alert("Please type minimum 20 charector in query field!"); return false;}
  if(document.getElementById("HideCheck").checked==true){document.getElementById("HideCheck").value='Y'; document.getElementById("VCheck").value='Y';}
  else if(document.getElementById("HideCheck").checked==false){document.getElementById("HideCheck").value='N'; document.getElementById("VCheck").value='N';}
  
  /*
  var d1 = AskQform.FromDate.value; var d2 = AskQform.ToDate.value; 
  //Count no of DAY beetween two day... 
  var DMY=d1.split('-');     //splits the date string by '-' and stores in a array.
  var DMY2=d2.split('-');
  var day=DMY[0];  var month=DMY[1];  var year=DMY[2];
  var day1=DMY2[0];  var month1=DMY2[1];  var year1=DMY2[2];
  var dateTemp1=month+'/'+day+'/'+year;  
  var dateTemp2=month1+'/'+day1+'/'+year1;
  var date1 = new Date(dateTemp1);//mm/dd/yy 
  var date2 = new Date(dateTemp2); //mm/dd/yy
  var Timed1=date1.getTime(); var Timed2=date2.getTime();
  if(Timed1>Timed2){alert('Error : Please check your apply date!'); return false;}	
  
  var timeDiff = Math.abs(date2.getTime() - date1.getTime());
  var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
  var TotDay = diffDays+1;
  var CheckHoliD=document.getElementById("TotCheckHoliD").value; //Conut Holiday
  //alert(CheckHoliD);
  //Count no of SUNDAY beetween two day...
  if(date2 < date1) return; //avoid infinite loop;
  for(var count=0; date1 <= date2; date1.setDate(date1.getDate() + 1)){
  if(date1.getDay() == 0) count++;}  
  /*
  if(count==0){var ActualDays = TotDay;} 
  */
  
  
  var agree=confirm("Are you sure? your query will be send?"); if (agree) { return true; } else { return false;}
} 

function ReadQuery(QI)
{window.open("ReadQuery.php?Qid="+QI,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=500,height=310");} 

function CloseQ(i)
{var PageNo=document.getElementById("PageNo").value;
 var agree=confirm("Are you sure you want to close this query...?"); if (agree) {window.location="AskQuery.php?ac=CloseQuery&QCid="+i+"&page="+PageNo;}}


function ReOpenQ(QId,NOfT,QT,CId)
{ var agree=confirm("Are you sure you want to reopen this query...?"); 
  if (agree) 
  { var win = window.open("QueryReOpen.php?action=ReOpen&Q="+QId+"&NOfT="+NOfT+"&QT="+QT+"&CI="+CId,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=500,height=350"); 
    var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="AskQuery.php"; } }, 1000);
  }
}

function CheckRat(v,QI,P)
{ var agree=confirm("Are you sure you want to Rat this query...?"); if (agree) {window.location="AskQuery.php?ac=RatQuery&QId="+QI+"&v="+v+"&page="+P; } }	

//function QueryHelpDoc()
//{window.open("QueryHelpDoc.php?action=help","HelpDoc","menubar=no,scrollbars=yes,resizable=no,directories=no,width=720,height=400");}

function OpenHelpfile(value){window.open("HelpFile.php?a=open&v="+value,"HelpFile","width=800,height=650"); }

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
  <table width="100%" style="margin-top:0px; ">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	 <tr>
	  <td valign="top">
	     <table border="0" style="height:350px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //*************************************************************************************************************************************************** ?>	   
	 <table border="0" id="Activity">
	  <tr>
		 <td id="Anni" valign="top">
			<table border="0">
				<tr height="20">
				 <td align="left" valign="top" style="width:width:105px;">
<?php include("EmpImgEmp.php"); ?>
<?php //echo "<img style='width:100px;height:120px;' src=\"show_images.php?id=".$EmployeeId."\">\n";?></td>
				 <td>&nbsp;</td>
				 </tr>
			 </table>
		 </td>
<?php /******************************************** Query I ******************************************/ ?>		
<?php $sqlMax=mysql_query("select QueryId from hrm_employee_queryemp where EmployeeID=".$EmployeeId, $con); $rowMax=mysql_num_rows($sqlMax); ?>	  
		<td style="width:400px;" valign="top">
		  <table border="0" style="width:400px;">
			<tr><td colspan="4" style="font-family:Times New Roman; color:#620000; font-size:17px;width:400px;" align="center"><b><u>Post a Query</u></b></td></tr>
			<tr><td colspan="4">&nbsp;</td></tr>
<form name="AskQform" method="post" onSubmit="return validate(this)">
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;width:90px;font-size:16px;"><b>Query no :</b></td>
 <td style="width:100px;"><input style="width:50px;height:22px;" name="QueryNo" id="QueryNo" value="<?php echo $rowMax+1; ?>" readonly></td>
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;width:60px;font-size:16px;">&nbsp;</td>
 <td align="center" style="font-family:Times New Roman;width:120px;">
 <a href="#" onClick="OpenHelpfile('queryhelp')"><b>Help Document</b></a>
<?php /* <a href="#" onClick="QueryHelpDoc()"><font color="#000099" size="3" ><b>Help Document</b></font></font></a> */ ?> </td>
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;width:90px;font-size:16px;"><b>CC :</b></td>
 <td colspan="3" style="width:280px;"><input style="width:305px;font-family:Times New Roman;font-size:15px;height:22px;" value="Reporting Manager, HOD" readonly /></td>
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;width:90px;font-size:16px;"><b>Department :</b></td>
 <td style="font-family:Times New Roman;color:#00000;font-size:15px;width:100px;">
 <?php if($DepartmentId==2){ $sbq="1=1"; }else{ $sbq="DepartmentId!=2"; } ?>
 
 <select style="width:100px;font-family:Times New Roman;font-size:12px;" name="DeptName" onChange="SelDept(this.value)"><option style="background-color:#FAF2D8; ">&nbsp;SELECT</option>
<?php $sqlD=mysql_query("select DepartmentId,DepartmentCode from hrm_department where CompanyId=".$CompanyId." AND ".$sbq." AND DepartmentId!=4 AND DepartmentId!=6 AND DepartmentId!=26 AND DepartmentId!=17 AND DepartmentId!=18 AND DeptStatus='A' order by DepartmentCode ASC", $con); 
 while($resD=mysql_fetch_array($sqlD)){  ?><option value="<?php echo $resD['DepartmentId']; ?>">&nbsp;<?php echo $resD['DepartmentCode']; ?></option><?php } ?></select></td>
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;width:60px;font-size:16px;"><b>Subject :</b></td>
 <td style="font-family:Times New Roman;color:#00000;width:120px;" align="right">
 <span id="SubSpan"><select style="width:120px;font-family:Times New Roman;font-size:12px;" disabled><option>SELECT</option></select></span></td>
</tr>
<tr height="20" id="TROthSub">
 <td colspan="2" align="left" valign="top" style="width:190px;font-family:Times New Roman;color:#004993;font-size:16px;">
   <span id="TD_1" style="display:none;"><b>Please type subject name :</b></span></td>
 <td colspan="2" align="right" style="width:180px;"><input type="hidden" name="SubValue" id="SubValue" value="" />
   <span id="TD_2" style="display:none;"><input style="font-family:Times New Roman;font-size:15px;width:180px;height:22px;" name="OthSub" id="OthSub"></span></td>
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:16px; width:90px;"><b>Query :</b></td>
 <td colspan="3" align="right" style="width:280px;"><textarea name="Query" id="Query" style="font-family:Times New Roman;font-size:15px;" cols="41" rows="6"></textarea></td>
<?php $sqlRep=mysql_query("select EmailId_Vnr,AppraiserId from hrm_employee_general INNER JOIN hrm_employee_reporting ON hrm_employee_general.EmployeeID=hrm_employee_reporting.AppraiserId where hrm_employee_reporting.EmployeeID=".$EmployeeId, $con); $resRep=mysql_fetch_assoc($sqlRep);
      $sqlHod=mysql_query("select EmailId_Vnr,HodId from hrm_employee_general INNER JOIN hrm_employee_reporting ON hrm_employee_general.EmployeeID=hrm_employee_reporting.HodId where hrm_employee_reporting.EmployeeID=".$EmployeeId, $con); $resHod=mysql_fetch_assoc($sqlHod);
	  $sqlSelf=mysql_query("select CostCenter,EmailId_Vnr from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $resSelf=mysql_fetch_assoc($sqlSelf);
if($EmpType=='E') 
{
$Rep=mysql_query("select Fname,Sname,Lname,Gender,DR,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resRep['AppraiserId'], $con); $RR=mysql_fetch_assoc($Rep); 
if($RR['DR']=='Y'){$M='Dr.';} elseif($RR['Gender']=='M'){$M='Mr.';} elseif($RR['Gender']=='F' AND $RR['Married']=='Y'){$M='Mrs.';} elseif($RR['Gender']=='F' AND $RR['Married']=='N'){$M='Miss.';}  $RepName=$M.' '.$RR['Fname'].' '.$RR['Sname'].' '.$RR['Lname'];  
$Hod=mysql_query("select Fname,Sname,Lname,Gender,DR,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resHod['HodId'], $con); $HH=mysql_fetch_assoc($Hod); 
if($HH['DR']=='Y'){$MM='Dr.';} elseif($HH['Gender']=='M'){$MM='Mr.';} elseif($HH['Gender']=='F' AND $HH['Married']=='Y'){$MM='Mrs.';} elseif($HH['Gender']=='F' AND $HH['Married']=='N'){$MM='Miss.';}  $HodName=$MM.' '.$HH['Fname'].' '.$HH['Sname'].' '.$HH['Lname']; 
}

$EE=mysql_query("select Gender,DR,Married from hrm_employee_general INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$EmployeeId, $con); $ResEE=mysql_fetch_assoc($EE); 
if($ResEE['DR']=='Y'){$MEE='Dr.';} elseif($ResEE['Gender']=='M'){$MEE='Mr.';} elseif($ResEE['Gender']=='F' AND $ResEE['Married']=='Y'){$MEE='Mrs.';} elseif($ResEE['Gender']=='F' AND $ResEE['Married']=='N'){$MEE='Miss.';} 

?>
<input type="hidden" name="EmailRep" value="<?php echo $resRep['EmailId_Vnr']; ?>" /><input type="hidden" name="RepID" value="<?php if($resRep['AppraiserId']!=''){echo $resRep['AppraiserId'];}else{echo 0;} ?>" />
<input type="hidden" name="EmailHod" value="<?php echo $resHod['EmailId_Vnr']; ?>" /><input type="hidden" name="HodID" value="<?php if($resHod['HodId']!=''){echo $resHod['HodId'];}else{echo 0;} ?>" />
<input type="hidden" name="RepName" value="<?php echo $RepName; ?>" /><input type="hidden" name="HodName" value="<?php echo $HodName; ?>" />
<input type="hidden" name="EmailSelf" value="<?php echo $resSelf['EmailId_Vnr']; ?>" />		
<input type="hidden" name="Ename" value="<?php echo $MEE.' '.$Ename; ?>" /><input type="hidden" name="EmpStateId" value="<?php echo $resSelf['CostCenter']; ?>" />
</tr>
<tr height="20">
 <td colspan="4" style="font-family:Times New Roman;color:#004993;font-size:15px;width:400px;">
 <?php if($DepartmentId!=2){ ?>Do you want to hide your name from Reporting Mgr & HOD?&nbsp;<input type="checkbox" name="HideCheck" id="HideCheck" disabled/><input type="hidden" id="VCheck" name="VCheck" value=""/><?php }else{ ?><input type="hidden" id="HideCheck" disabled/><input type="hidden" id="VCheck" name="VCheck" value=""/><?php } ?></td>
</tr>
<tr height="20">
  <td colspan="4" align="Right" class="fontButton">
  <table border="0" width="400">
  <tr>
   <td align="right"><input type="submit" name="AskQuery" id="AskQuery" style="width:90px;" value="send" disabled></td>
   <td align="right" style="width:70px;"><input type="button" name="Refresh" id="Refresh" style="width:90px;" value="refresh" onClick="javascript:window.location='AskQuery.php'"/></td>
  </tr>
  </table>
  </td>
</tr>
</form>
<tr height="20">
  <td colspan="4" align="">
  <table border="0" width="400">
  <tr><td valign="top" colspan="2">&nbsp;<font color="#008000" style='font-family:Times New Roman;' size="3"><b><?php echo $msg; ?></b></font></td></tr>
  </table>
  </td>
</tr>
</table>
     </td>
	</tr>
  </table>
	
<?php //*************************************************************************************************************************************************** ?>
<?php //*******************************************Status********** ?>
           <td>&nbsp;</td>        
		   <td bgcolor="#7a6189" style="margin-left:0px;width:5px;">&nbsp;</td>  
		   <td>&nbsp;</td>
           <td valign="top" style="margin-left:0px;">
		     <table border="0">
			   <tr><td style="font-family:Times New Roman; color:#620000; font-size:17px;width:350px;" align="center"><b><u>Query Status</u></b></td>
			       <td style="font-family:Times New Roman; color:#620000; font-size:17px;width:200px;" align="center">
				   <img src="images/go-back-icon.png" border="0" /><b style="font-size:14px;">&nbsp;->&nbsp;Re-Open</b>&nbsp;&nbsp;&nbsp;
				   <img src="images/delete.png" border="0" /><b style="font-size:14px;">&nbsp;->&nbsp;Close</b></td></tr>

<?php 
$sql_statement = mysql_query("select * from hrm_employee_queryemp where EmployeeID=".$EmployeeId." AND QueryStatus_Emp!=4 order by QueryDT DESC", $con);
$total_records = mysql_num_rows($sql_statement);
if(isset($_GET['page'])) $page = $_GET['page']; else $page = 1;  
$offset = 10;
if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0;}

$sql_statement = mysql_query("select * from hrm_employee_queryemp where EmployeeID=".$EmployeeId." AND QueryStatus_Emp!=4 order by QueryDT DESC LIMIT " . $from . "," . $offset, $con);
?>	  
			   <tr>
			     <td colspan="2" align="center" id="QueryStatusTD" style="display:;width:750px; margin-left:0px;" valign="top">
				    <table border="1">
					<tr bgcolor="#7a6189" style="height:22px;">
		   <td colspan="5" style="color:#ffffff;font-family:Georgia;font-size:11px;" align="center"><b>Query Details</b></td>
 		   <td colspan="4" style="color:#ffffff;font-family:Georgia;font-size:11px;" align="center"><b>Status</b></td>
		   <td colspan="2" style="color:#ffffff; font-family:Georgia; font-size:11px;width:70px;" align="center"><b>Self Action</b></td>
		             </tr>	
		              <tr bgcolor="#7a6189" style="height:22px;">
		   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:30px;"><b>SNo</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" align="center"><b>Date</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:100px;" align="center"><b>Subject</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:50px;" align="center"><b>Details</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:100px;" align="center"><b>Department</b></td>
 		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" align="center"><b>Level_1</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" align="center"><b>Level_2</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" align="center"><b>Level_3</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" align="center"><b>Level_4</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:80px;" align="center"><b>Action</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:45px;" align="right"><b>Rating</b></td>
		             </tr>	
<?php if($total_records>0) { if($_REQUEST['page']==1){$Sn=1;} elseif($_REQUEST['page']==2){$Sn=11;} elseif($_REQUEST['page']==3){$Sn=21;}
	  elseif($_REQUEST['page']==4){$Sn=31;} elseif($_REQUEST['page']==5){$Sn=41;} elseif($_REQUEST['page']==6){$Sn=51;} 
	  elseif($_REQUEST['page']==7){$Sn=61;} elseif($_REQUEST['page']==8){$Sn=71;} elseif($_REQUEST['page']==9){$Sn=81;} 
	  elseif($_REQUEST['page']==10){$Sn=91;} else{$Sn=1;}  while($resQ=mysql_fetch_array($sql_statement)) { ?>
           <tr bgcolor="#FFFFFF" style="height:22px;">
		   <td align="center" style="font:Georgia; font-size:11px; width:30px;" valign="top"><?php echo $Sn; ?></td>
		   <td style="font-family:Times New Roman; font-size:12px; width:60px;" align="center" valign="top"><?php if($resQ['QueryNoOfTime']==1){ echo date("d-M-y", strtotime($resQ['QueryDT'])); } elseif($resQ['QueryNoOfTime']==2){ echo date("d-M-y", strtotime($resQ['Query2DT'])); } elseif($resQ['QueryNoOfTime']==3){ echo date("d-M-y", strtotime($resQ['Query3DT'])); } elseif($resQ['QueryNoOfTime']==4){ echo date("d-M-y", strtotime($resQ['Query4DT'])); } elseif($resQ['QueryNoOfTime']==5){ echo date("d-M-y", strtotime($resQ['Query5DT'])); } ?></td>
		   <td style="font-family:Georgia; font-size:11px; width:100px; overflow:hidden;" valign="top"><?php if($resQ['QuerySubject']!='N'){ echo substr_replace($resQ['QuerySubject'], '', 13).'..'; } else { echo substr_replace($resQ['OtherSubject'], '', 13).'..'; } ?></td>
		   <td style="font-family:Georgia; font-size:11px; width:50px;" align="center" valign="top">
		   <a href="javascript:ReadQuery(<?php echo $resQ['QueryId']; ?>)">Read</a></td>
<?php $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resQ['QToDepartmentId']." AND CompanyId=".$CompanyId, $con); $resD=mysql_fetch_assoc($sqlD); ?>		
		   <td style="font-family:Times New Roman; font-size:12px; width:100px;" align="" valign="top">&nbsp;<?php echo $resD['DepartmentCode']; ?></td>
 		   <td style="font-family:Times New Roman; font-size:12px; width:60px;" align="center" valign="top"><?php 
		   if($resQ['QStatus']==0){echo 'Draft';}
		   elseif($resQ['QStatus']==1){ if($resQ['Level_1QStatus']==0){echo 'Draft';}if($resQ['Level_1QStatus']==1){echo '<font color="#FF2020">InProcess</font>';}} 
		   elseif($resQ['QStatus']==2 AND $resQ['QCloseStatus']=='N'){ if($resQ['Level_1QStatus']==0){echo 'Draft';}if($resQ['Level_1QStatus']==1 OR $resQ['Level_1QStatus']==2){echo '<font color="#FF2020">InProcess</font>';}} 
		   elseif($resQ['QStatus']==2 AND $resQ['QCloseStatus']=='Y'){ if($resQ['Level_1QStatus']==0){echo 'Draft';}if($resQ['Level_1QStatus']==1 OR $resQ['Level_1QStatus']==2){echo '<font color="#FF2020">InProcess</font>';} if($resQ['Level_1QStatus']==3){echo '<font color="#007900"><b>Closed</b></font>'; }} ?></td>
		  <td style="font-family:Times New Roman; font-size:12px; width:60px;" align="center" valign="top"><?php 
		   if($resQ['QStatus']==0){echo 'Draft';}
		   elseif($resQ['QStatus']==1){ if($resQ['Level_2QStatus']==0){echo 'Draft';}if($resQ['Level_2QStatus']==1){echo '<font color="#FF2020">InProcess</font>';}} 
		   elseif($resQ['QStatus']==2 AND $resQ['QCloseStatus']=='N'){ if($resQ['Level_2QStatus']==0){echo 'Draft';}if($resQ['Level_2QStatus']==1 OR $resQ['Level_2QStatus']==2){echo '<font color="#FF2020">InProcess</font>';}} 
		   elseif($resQ['QStatus']==2 AND $resQ['QCloseStatus']=='Y'){ if($resQ['Level_2QStatus']==0){echo 'Draft';}if($resQ['Level_2QStatus']==1 OR $resQ['Level_2QStatus']==2){echo '<font color="#FF2020">InProcess</font>';} if($resQ['Level_2QStatus']==3){echo '<font color="#007900"><b>Closed</b></font>'; }} ?></td>
		   <td style="font-family:Times New Roman; font-size:12px; width:60px;" align="center" valign="top"><?php 
		   if($resQ['QStatus']==0){echo 'Draft';}
		   elseif($resQ['QStatus']==1){ if($resQ['Level_3QStatus']==0){echo 'Draft';}if($resQ['Level_3QStatus']==1){echo '<font color="#FF2020">InProcess</font>';}} 
		   elseif($resQ['QStatus']==2 AND $resQ['QCloseStatus']=='N'){ if($resQ['Level_3QStatus']==0){echo 'Draft';}if($resQ['Level_3QStatus']==1 OR $resQ['Level_3QStatus']==2){echo '<font color="#FF2020">InProcess</font>';}} 
		   elseif($resQ['QStatus']==2 AND $resQ['QCloseStatus']=='Y'){ if($resQ['Level_3QStatus']==0){echo 'Draft';}if($resQ['Level_3QStatus']==1 OR $resQ['Level_3QStatus']==2){echo '<font color="#FF2020">InProcess</font>';} if($resQ['Level_3QStatus']==3){echo '<font color="#007900"><b>Closed</b></font>'; }} ?></td>
		   <td style="font-family:Times New Roman; font-size:12px; width:60px;" align="center" valign="top"><?php 
		   if($resQ['QStatus']==0){echo 'Draft';}
		   elseif($resQ['QStatus']==1){ if($resQ['Mngmt_QStatus']==0){echo 'Draft';}if($resQ['Mngmt_QStatus']==1){echo '<font color="#FF2020">InProcess</font>';}} 
		   elseif($resQ['QStatus']==2 AND $resQ['QCloseStatus']=='N'){ if($resQ['Mngmt_QStatus']==0){echo 'Draft';}if($resQ['Mngmt_QStatus']==1 OR $resQ['Mngmt_QStatus']==2){echo '<font color="#FF2020">InProcess</font>';}} 
		   elseif($resQ['QStatus']==2 AND $resQ['QCloseStatus']=='Y'){ if($resQ['Mngmt_QStatus']==0){echo 'Draft';}if($resQ['Mngmt_QStatus']==1 OR $resQ['Mngmt_QStatus']==2){echo '<font color="#FF2020">InProcess</font>';} if($resQ['Mngmt_QStatus']==3){echo '<font color="#007900"><b>Closed</b></font>'; }} ?></td>
		   <?php if($resQ['QueryStatus_Emp']!=3) { ?>
		   <td style="color:#ffffff; font-family:Georgia; font-size:12px; width:80px;" align="center" valign="middle">
	<?php if($resQ['QStatus']==2 AND $resQ['QCloseStatus']=='Y' AND $resQ['QueryNoOfTime']>=5){?>
	<a href="#" onClick="CloseQ(<?php echo $resQ['QueryId']; ?>)"><img src="images/delete.png" border="0"/></a><?php } ?>
	<?php if($resQ['QStatus']==2 AND $resQ['QCloseStatus']=='Y' AND $resQ['QueryNoOfTime']<5){?>
	<a href="#" onClick="ReOpenQ(<?php echo $resQ['QueryId'].', '.$resQ['QueryNoOfTime'].', '.$CompanyId; ?>, 1)"><img src="images/go-back-icon.png" border="0" /></a>&nbsp;&nbsp;&nbsp;    <a href="#" onClick="CloseQ(<?php echo $resQ['QueryId']; ?>)"><img src="images/delete.png" border="0" /></a><?php } ?>
	<?php if($resQ['QCloseStatus']!='Y'){echo '&nbsp;'; } ?>
		   </td>
		   <?php } if($resQ['QueryStatus_Emp']==3) { ?>
		   <td style="color:#005E00;font-family:Times New Roman;font-size:12px;width:80px;" align="center" valign="middle"><b>Closed</b></td><?php } ?>
		   
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:45px;" align="center" valign="middle">
	<?php if($resQ['QueryStatus_Emp']==3){?><select id="Rat" name="Rat" style="width:45px;height:21px;font-size:12px;" onChange="CheckRat(this.value,<?php echo $resQ['QueryId'].', '.$_REQUEST['page']; ?>)" <?php if($resQ['EmpQRating']>0) { echo 'disabled';}?>><?php if($resQ['EmpQRating']>0) { ?><option value="<?php echo $resQ['EmpQRating']; ?>"><?php echo $resQ['EmpQRating']; ?></option><?php }?><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select><?php } else{echo '&nbsp;'; }?>
		   
		   <input type="hidden" id="PageNo" value="<?php echo $_REQUEST['page']; ?>">
		   </td>
		             </tr>	
<?php $Sn++;} } if($total_records==0) { ?>
                     <tr>
					    <td colspan="11" style="font:Georgia; color:#D56A00; font-size:12px; width:50px;"><b>Empty....</b></td>
					 </tr>
<?php } ?>					 			 			 
					</table>
				 </td>
			   </tr>
<tr>
<td align="center" style="font-family:Times New Roman; font-size:15px; font-weight:bold;" colspan="2">
<?PHP doPages($offset, 'AskQuery.php', '', $total_records); ?>
</td>
</tr>				
<tr>
 <td style="font-family:Times New Roman;font-size:14px;" colspan="2">
   <b>Note:</b>&nbsp;Kindly rate the closed queries as per your satisfaction levels on the overall query resolution process. When you shall consider the parameters:-&nbsp;(<b>1</b> Being not satisfied, <b>5</b> for highly satisfied)
 </td>
</tr>			   
			 </table>
		   </td>
<?php //*******************************************Status Close********** ?> 
		   </td>
		  </tr>
		</table>
	  </td>
	</tr>
	<tr style="height:50px; "><td>&nbsp;</td></tr>
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
<?php
function check_integer($which) {
if(isset($_REQUEST[$which])){
if (intval($_REQUEST[$which])>0) {
return intval($_REQUEST[$which]);
} else {
return false;
}
}
return false;
}
function get_current_page() {
if(($var=check_integer('page'))) {
return $var;
} else {
//return 1, if it wasnt set before, page=1
return 1;
}
}
function doPages($page_size, $thepage, $query_string, $total=0) {
$index_limit = 4;
$query='';
if(strlen($query_string)>0){
$query = "&amp;".$query_string;
}
$current = get_current_page();
$total_pages=ceil($total/$page_size);
$start=max($current-intval($index_limit/2), 1);
$end=$start+$index_limit-1;
echo '<div class="paging">';
if($current==1) {
echo '<span class="prn">&lt; Previous</span>&nbsp;';
} else {
$i = $current-1;
echo '<a href="'.$thepage.'?page='.$i.$query.'" class="prn" rel="nofollow" title="go to page '.$i.'">&lt; Previous</a>&nbsp;';
echo '<span class="prn">...</span>&nbsp;';
}
if($start > 1) {
$i = 1;
echo '<a href="'.$thepage.'?page='.$i.$query.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
for ($i = $start; $i <= $end && $i <= $total_pages; $i++){
if($i==$current) {
echo '<span>'.$i.'</span>&nbsp;';
} else {
echo '<a href="'.$thepage.'?page='.$i.$query.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
}
if($total_pages > $end){
$i = $total_pages;
echo '<a href="'.$thepage.'?page='.$i.$query.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
if($current < $total_pages) {
$i = $current+1;
echo '<span class="prn">...</span>&nbsp;';
echo '<a href="'.$thepage.'?page='.$i.$query.'" class="prn" rel="nofollow" title="go to page '.$i.'">Next &gt;</a>&nbsp;';
} else {
echo '<span class="prn">Next &gt;</span>&nbsp;';
}
if ($total != 0){
//prints the total result count just below the paging
echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ee4545"<h4>(Total '.$total.' Records)</h4></font></div>';
}
}
?>



