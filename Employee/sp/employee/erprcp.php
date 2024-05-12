<?php session_start();
if($_SESSION['login'] = true){require_once('../user/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../../../index.php');}
$EmployeeId=$_SESSION['EmployeeID'];
$m=$_REQUEST['m']; $y=$_REQUEST['y']; $hq=$_REQUEST['hq']; $s=$_REQUEST['s']; $crop=$_REQUEST['crop']; 


if($_REQUEST['actty']=='submfinl')
{
 $queryr=mysql_query("select * from erp_rcp_submit where EmpId=".$_REQUEST['aee']." AND Month=".$_REQUEST['amm']." AND Year=".$_REQUEST['ayy']." AND Sts='A'",$con2); $rowquery=mysql_num_rows($queryr);
 if($rowquery==0)
 {
  $ins=mysql_query("insert into erp_rcp_submit(EmpId, Month, Year, Sts, SubDate) values(".$_REQUEST['aee'].", ".$_REQUEST['amm'].", ".$_REQUEST['ayy'].", 'A', '".date("Y-m-d")."')",$con2);
  if($ins)
  {
    $sEm=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['aee'],$con); 
    $rEm=mysql_fetch_assoc($sEm); if($rEm['Sname']!=''){$mEname=$rEm['Fname'].' '.$rEm['Sname'].' '.$rEm['Lname'];}else{$mEname=$rEm['Fname'].' '.$rEm['Lname'];} 
    $sRm=mysql_query("select Fname,Sname,Lname,ReportingEmailId from hrm_employee_general g inner join hrm_employee e on g.RepEmployeeID=e.EmployeeID where e.EmpStatus='A' AND g.EmployeeID=".$_REQUEST['aee'],$con); $rRm=mysql_fetch_assoc($sRm); if($rRm['Sname']!=''){$mRname=$rRm['Fname'].' '.$rRm['Sname'].' '.$rRm['Lname'];}else{$mRname=$rRm['Fname'].' '.$rRm['Lname'];}
	
	  if($rRm['ReportingEmailId']!='')
	  {
	   $email_to = $rRm['ReportingEmailId'];
       $email_from='admin@vnrseeds.co.in';
       $email_subject = $mEname." submitted RCP Plan";
       $headers = "From: ".$email_from."\r\n"; 
       $semi_rand = md5(time()); 
       $headers .= "MIME-Version: 1.0\r\n";
       $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_message .="<html><head></head><body>";
       $email_message .= "Dear <b>Sir, </b> <br><br>\n\n\n";
       $email_message .= $mEname." has successfully submitted RCP plan for the month ".$_REQUEST['Mnnt']."-".$_REQUEST['ayy'].", for details, kindly log on to ESS.<br><br>\n\n";
       $email_message .= "From <br><b>ADMIN ESS</b><br>";
       $email_message .="</body></html>";	      
       $ok=@mail($email_to, $email_subject, $email_message, $headers);
	  }

      if($_REQUEST['SttIncOk']>0)
      {	 
	   $swk=mysql_query("select u.* from erp_user u inner join erp_user_work uw u.UserId=uw.UserId where uw.WorkName='RCP' AND uw.Sts='A' AND u.Type='U'",$con2); $rwk=mysql_fetch_assoc($swk);
	   if($rwk['UserEmaila']!='')
	   {
	    $email2_to = $rwk['UserEmaila'];
        $email2_from='admin@vnrseeds.co.in';
        $email2_subject = $mEname." submitted RCP Plan";
        $headers = "From: ".$email2_from."\r\n"; 
        $semi2_rand = md5(time()); 
        $headers2 .= "MIME-Version: 1.0\r\n";
        $headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $email2_message .="<html><head></head><body>";
        $email2_message .= "Dear <b>Sir, </b> <br><br>\n\n\n";
        $email2_message .= $mEname." has successfully submitted RCP plan for the month ".$_REQUEST['Mnnt']."-".$_REQUEST['ayy'].", for details, kindly log on to ERP module.<br><br>\n\n";
        $email2_message .= "From <br><b>ADMIN ERP</b><br>";
        $email2_message .="</body></html>";	      
        $ok2=@mail($email2_to, $email2_subject, $email2_message, $headers2);
	   }
	   
	   $sw2k=mysql_query("select u.* from erp_user u inner join erp_user_work uw u.UserId=uw.UserId where uw.WorkName='RCP' AND uw.Sts='A' AND u.Type='A'",$con2); $rw2k=mysql_fetch_assoc($sw2k);
	   if($rwk['UserEmaila']!='')
	   {
	    $email3_to = $rw2k['UserEmaila'];
        $email3_from='admin@vnrseeds.co.in';
        $email3_subject = $mEname." submitted RCP Plan";
        $headers = "From: ".$email3_from."\r\n"; 
        $semi2_rand = md5(time()); 
        $headers3 .= "MIME-Version: 1.0\r\n";
        $headers3 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $email3_message .="<html><head></head><body>";
        $email3_message .= "Dear <b>Sir, </b> <br><br>\n\n\n";
        $email3_message .= $mEname." has successfully submitted RCP plan for the month ".$_REQUEST['Mnnt']."-".$_REQUEST['ayy'].", for details, kindly log on to ERP module.<br><br>\n\n";
        $email3_message .= "From <br><b>ADMIN ERP</b><br>";
        $email3_message .="</body></html>";	      
        $ok3=@mail($email3_to, $email3_subject, $email3_message, $headers3);
	   }
	   
      }
   
   echo '<script>alert("You have successfully submitted RCP!");</script>';
  }
  else{echo '<script>alert("Error!");</script>';} 
 }
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> 
.td1{font-family:Times New Roman;color:#000;font-weight:bold;text-align:center;font-size:14px;background-color:#97FFFF;height:24px;}.td2{font-family:Times New Roman;color:#000;text-align:center;font-size:12px;background-color:#FFFFFF;}.td3{font-family:Times New Roman;color:#000;font-size:14px;background-color:#FFFFFF;height:22px;text-transform:capitalize;}.td4{font-family:Times New Roman;color:#000;font-size:12px;background-color:#FFFFFF;text-align:right;}.htf{font-family:Georgia;color:#FF80FF;font-weight:bold;text-align:center;font-size:18px;height:24px;}.tdf{font-family:Times New Roman;font-size:14px;color:#fff;}.InputSel {font-family:Georgia;font-size:12px;text-align:left; }.itd4{font-family:Times New Roman;color:#000;font-size:12px;background-color:#FFFFFF;width:100%;border:hidden;text-align:right;}.itd3{font-family:Times New Roman;color:#000;font-size:13px;background-color:#FFFFFF;width:100%;border:hidden;}.td1btn{font-family:Times New Roman;color:#000;font-weight:bold;text-align:center;font-size:14px;background-color:#DAE738;height:24px;cursor:pointer;}
      
blink {color:red;-webkit-animation: blink 1s step-end infinite;animation: blink 1s step-end infinite}
@-webkit-keyframes blink {67% { opacity: 0 }}
@keyframes blink {67% { opacity: 0 }}
</style>

<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script language="javascript">
function FunRef(m,y,s,hq,crop)
{ window.location="erprcp.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&crop="+crop; }
function funmonth(m,y,s,hq,crop)
{ window.location="erprcp.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&crop="+crop; }
function funyear(y,m,s,hq,crop)
{ window.location="erprcp.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&crop="+crop;}
function funstate(s,m,y,crop)
{ window.location="erprcp.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq=0&dis=0&crop="+crop; }
function funhq(hq,m,y,s,crop)
{ window.location="erprcp.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&crop="+crop; }
function funcrop(crop,m,y,s,hq)
{ window.location="erprcp.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&crop="+crop; }

function FunEdit(n,hq,m,y,s,crop,di,yy,ei)
{
 document.getElementById("Edit"+n).style.display='none';document.getElementById("Save"+n).style.display='block';
 document.getElementById("td1"+n).style.background='#FAEF6B'; document.getElementById("td2"+n).style.background='#FAEF6B'; document.getElementById("td3"+n).style.background='#FAEF6B'; document.getElementById("td4"+n).style.background='#FAEF6B'; document.getElementById("Agn_salplan"+n).style.background='#FAEF6B'; document.getElementById("Agn_oust"+n).style.background='#FAEF6B'; document.getElementById("Agn_abs"+n).style.background='#FAEF6B'; document.getElementById("Name_abs"+n).style.background='#FAEF6B'; document.getElementById("Agn_salplan"+n).readOnly=false; document.getElementById("Agn_oust"+n).readOnly=false; document.getElementById("Agn_abs"+n).readOnly=false; document.getElementById("Name_abs"+n).readOnly=false;
 save2D(n,hq,m,y,s,crop,di,yy,ei);
}

function FunCheckEdit(hq,m,y,s,crop,yy,ei) 
{ 
 if(document.getElementById("chkId").checked==true)
 { 
  
  for(var i=1; i<=document.getElementById("rowc").value; i++)
  {
   if(document.getElementById("NotEdit"+i).value=='Y')
   {
 document.getElementById("Edit"+i).style.display='none';document.getElementById("Save"+i).style.display='block';
 document.getElementById("td1"+i).style.background='#FAEF6B'; document.getElementById("td2"+i).style.background='#FAEF6B'; document.getElementById("td3"+i).style.background='#FAEF6B'; document.getElementById("td4"+i).style.background='#FAEF6B'; document.getElementById("Agn_salplan"+i).style.background='#FAEF6B'; document.getElementById("Agn_oust"+i).style.background='#FAEF6B'; document.getElementById("Agn_abs"+i).style.background='#FAEF6B'; document.getElementById("Name_abs"+i).style.background='#FAEF6B'; document.getElementById("Agn_salplan"+i).readOnly=false; document.getElementById("Agn_oust"+i).readOnly=false; document.getElementById("Agn_abs"+i).readOnly=false; document.getElementById("Name_abs"+i).readOnly=false;
 
    var di=document.getElementById("Dealer_"+i).value; 
    save2D(i,hq,m,y,s,crop,di,yy,ei);
   }
   
   
  }
 }
 else
 {
  for(var i=1; i<=document.getElementById("rowc").value; i++)
  {
   if(document.getElementById("NotEdit"+i).value=='Y')
   {
 document.getElementById("Edit"+i).style.display='block';document.getElementById("Save"+i).style.display='none';
 document.getElementById("td1"+i).style.background='#FFFFFF'; document.getElementById("td2"+i).style.background='#FFFFFF'; document.getElementById("td3"+i).style.background='#FFFFFF'; document.getElementById("td4"+i).style.background='#FFFFFF'; document.getElementById("Agn_salplan"+i).style.background='#FFFFFF'; document.getElementById("Agn_oust"+i).style.background='#FFFFFF'; document.getElementById("Agn_abs"+i).style.background='#FFFFFF'; document.getElementById("Name_abs"+i).style.background='#FFFFFF'; document.getElementById("Agn_salplan"+i).readOnly=true; document.getElementById("Agn_oust"+i).readOnly=true; document.getElementById("Agn_abs"+i).readOnly=true; document.getElementById("Name_abs"+i).readOnly=true;
   }
  }
 }
}


function save2D(n,hq,m,y,s,crop,di,yy,ei)
{ 
 document.getElementById("Numb").value=n;
 if(document.getElementById("Agn_salplan"+n).value==''){var sp=0;}
 else{var sp=document.getElementById("Agn_salplan"+n).value;}
 if(document.getElementById("Agn_oust"+n).value==''){var oust=0;}
 else{var oust=document.getElementById("Agn_oust"+n).value;}
 if(document.getElementById("Agn_abs"+n).value==''){var absv=0;}
 else{var absv=document.getElementById("Agn_abs"+n).value;}
 if(document.getElementById("TotSpV"+n).value==''){var TotSpV=0;}
 else{var TotSpV=document.getElementById("TotSpV"+n).value;}
 if(document.getElementById("Tot_target"+n).value==''){var tot=0;}
 else{var tot=document.getElementById("Tot_target"+n).value;}
 var absn=document.getElementById("Name_abs"+n).value;
 var absname = absn.replace(/[`~!#$^&*_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
   
 var url = 'erprcpmrpact.php'; var pars = 'action=setRcpv&m='+m+'&y='+y+'&s='+s+'&hq='+hq+'&crop='+crop+'&sp='+sp+'&oust='+oust+'&absv='+absv+'&tot='+tot+'&absn='+absname+'&di='+di+'&yy='+yy+'&TotSpV='+TotSpV+'&ei='+ei;	
 var myAjax = new Ajax.Request( url,{ method:'post', parameters:pars, onComplete:show2_result});
} 
function show2_result(originalRequest)
{ document.getElementById('ResultSpan').innerHTML=originalRequest.responseText;}




function funCalV(v,n)
{
 if(document.getElementById("Agn_salplan"+n).value==''){var sp=0;}
 else{var sp=parseFloat(document.getElementById("Agn_salplan"+n).value);}
 if(document.getElementById("Agn_oust"+n).value==''){var oust=0;}
 else{var oust=parseFloat(document.getElementById("Agn_oust"+n).value);}
 if(document.getElementById("Agn_abs"+n).value==''){var absv=0;}
 else{var absv=parseFloat(document.getElementById("Agn_abs"+n).value);}
 var tot=document.getElementById("Tot_target"+n).value=Math.round((sp+oust+absv)*1000)/1000; 
 //alert(sp+"-"+oust+"-"+absv);
 //document.getElementById("Tot_target"+n).value=tot.toFixed(3);
}


function saveD(n,hq,m,y,s,crop,di,yy,ei)
{ 
 document.getElementById("Numb").value=n;
 if(document.getElementById("Tot_target"+n).value==0 || document.getElementById("Tot_target"+n).value=='')
 { alert("please fill RCP value!"); return false; }
 else if(document.getElementById("Agn_abs"+n).value>0 && document.getElementById("Name_abs"+n).value=='')
 { alert("please enter name of ABS!"); return false; }
 else
 {
   if(document.getElementById("Agn_salplan"+n).value==''){var sp=0;}
   else{var sp=document.getElementById("Agn_salplan"+n).value;}
   if(document.getElementById("Agn_oust"+n).value==''){var oust=0;}
   else{var oust=document.getElementById("Agn_oust"+n).value;}
   if(document.getElementById("Agn_abs"+n).value==''){var absv=0;}
   else{var absv=document.getElementById("Agn_abs"+n).value;}
   var TotSpV=document.getElementById("TotSpV"+n).value;
   var tot=document.getElementById("Tot_target"+n).value;
   var absn=document.getElementById("Name_abs"+n).value;
   var absname = absn.replace(/[`~!#$^&*_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
   
   var url = 'erprcpmrpact.php'; var pars = 'action=setRcpv&m='+m+'&y='+y+'&s='+s+'&hq='+hq+'&crop='+crop+'&sp='+sp+'&oust='+oust+'&absv='+absv+'&tot='+tot+'&absn='+absname+'&di='+di+'&yy='+yy+'&TotSpV='+TotSpV+'&ei='+ei;	
   var myAjax = new Ajax.Request( url,{ method:'post', parameters:pars, onComplete:show_result});
 }
} 
function show_result(originalRequest)
{ document.getElementById('ResultSpan').innerHTML=originalRequest.responseText; 
  if(document.getElementById("vsts").value==1)
  { 
   var n=document.getElementById("Numb").value;
   document.getElementById("Edit"+n).style.display='block';
   document.getElementById("Save"+n).style.display='none';
   document.getElementById("td1"+n).style.background='#BCFF79'; document.getElementById("td2"+n).style.background='#BCFF79'; document.getElementById("td3"+n).style.background='#BCFF79'; document.getElementById("td4"+n).style.background='#BCFF79'; document.getElementById("Agn_salplan"+n).style.background='#BCFF79'; document.getElementById("Agn_oust"+n).style.background='#BCFF79'; document.getElementById("Agn_abs"+n).style.background='#BCFF79'; document.getElementById("Name_abs"+n).style.background='#BCFF79'; document.getElementById("Agn_salplan"+n).readOnly=true; document.getElementById("Agn_oust"+n).readOnly=true; document.getElementById("Agn_abs"+n).readOnly=true; document.getElementById("Name_abs"+n).readOnly=true;
  }
  else if(document.getElementById("vsts").value==0){ alert("Error!"); }
}



 

function FunSpDetails(di,m,y,grp,mf)
{
  window.open("erprcpdetails.php?msg=spdetails&di="+di+"&m="+m+"&y="+y+"&grp="+grp+"&mf="+mf,"DetailsForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=600,height=450"); 
}

function FunBillDetails(di,m,y,grp)
{
 window.open("erprcpdetails.php?msg=billdetails&di="+di+"&m="+m+"&y="+y+"&grp="+grp,"DetailsForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=600,height=450");
}

function FunCollDetails(di,m,y,grp)
{
 window.open("erprcpdetails.php?msg=collectiondetails&di="+di+"&m="+m+"&y="+y+"&grp="+grp,"DetailsForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=600,height=450");
}


function FunFinSub(yy,mm,ei,hq,m,y,s,crop) 
{
 var agree=confirm("Are you Sure? if submitted, your edit option is disabled for current month!");
 if(agree)
 { var SttIn=document.getElementById("StateInCharge").value; var Mnt=document.getElementById("Mntname").value;
  window.location="erprcp.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&crop="+crop+"&actty=submfinl&ayy="+yy+"&amm="+mm+"&aee="+ei+"&SttIncOk="+SttIn+"&Mnnt="+Mnt; 
 }
 else{return false;}
}

function FunExport(m,y,s,hq,crop,ei)
{ window.open("erprcpmrpexport.php?act=rcpexp&aa=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&crop="+crop+"&ei="+ei,"ExpForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=50,height=50"); }

<!-- Number Key -->
function isNumberKey(evt)
{
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode != 46 && charCode > 31 
	&& (charCode < 48 || charCode > 57))
	 return false;
  return true;
}
<!-- Number Key -->
<!-- Grid open -->
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '500px' }); })
<!-- Grid close -->
</Script>
</head>
<body class="body">
<span id="ResultSpan"></span>
<input type="hidden" id="EmpId" name="EmpId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="Numb" name="Numb" value="0" />
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
	  <td valign="top" width="100%" id="MainWindow">
<!DOCTYPE html>
<html>
<?php //***************START*****START*****START******START******START***************************?>
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$y, $con); $resy=mysql_fetch_assoc($sqly); $FDate=date("Y",strtotime($resy['FromDate'])); $TDate=date("Y",strtotime($resy['ToDate']));  if($m==1){$Month='JANUARY'; $yy=$TDate; $mm=10;}elseif($m==2){$Month='FEBRUARY'; $yy=$TDate; $mm=11;}elseif($m==3){$Month='MARCH'; $yy=$TDate; $mm=12;}elseif($m==4){$Month='APRIL'; $yy=$FDate; $mm=1;}elseif($m==5){$Month='MAY'; $yy=$FDate; $mm=2;}elseif($m==6){$Month='JUNE'; $yy=$FDate; $mm=3;}elseif($m==7){$Month='JULY'; $yy=$FDate; $mm=4;}elseif($m==8){$Month='AUGUST'; $yy=$FDate; $mm=5;}elseif($m==9){$Month='SEPTEMBER'; $yy=$FDate; $mm=6;}elseif($m==10){$Month='OCTOBER'; $yy=$FDate; $mm=7;}elseif($m==11){$Month='NOVEMBER'; $yy=$FDate; $mm=8;}elseif($m==12){$Month='DECEMBER'; $yy=$FDate; $mm=9;} 
  if($m==1 OR $m==3 OR $m==5 OR $m==7 OR $m==8 OR $m==10 OR $m==12){ $day=31; } 
  elseif($m==4 OR $m==6 OR $m==9 OR $m==11){ $day=30; }
  elseif($m==2){ if($Y==2012 OR $Y==2016 OR $Y==2020 OR $Y==2024 OR $Y==2028 OR $Y==2032 OR $Y==2036 OR $Y==2040 OR $Y==2044 OR $Y==2048 OR $Y==2052 OR $Y==2056 OR $Y==2060){$day=29;}else{$day=28;} } 

$cks=mysql_query("select * from erp_empassign_rcpmrp where EmpId=".$EmployeeId." AND WorkName='RCP' AND Sts='A'",$con2); $ckr=mysql_num_rows($cks); 
?>
<table border="0" style="margin-top:0px;width:100%;height:150px;">	
<tr>
 <td valign="top" style="width:100%;">
 <table border="0" style="width:100%;">
 <tr>
<td style="width:100%;">
 <table border="0" style="width:100%;">
  <td style="width:100%;" valign="top">  
   <table border="0" cellpadding="0" cellspacing="1" style="width:100%;">
    <tr>
	 <td colspan="35">
	  <table border="0" style="width:100%;">
   <tr>
	<td style="width:100%;">
	
<?php //for($i=1; $i<=100; $i++){ echo '<input type="" id="T'.$i.'" value="0"/>'; } ?>	
	 <?php if($ckr>0){ ?>
	 <table border="0">
		<tr>
	    <td class="htf" align="left"><u>Rolling Collection Plan</u>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	    <td class="tdf" align="center">&nbsp;</td>
		<td class="tdf">&nbsp;Month:&nbsp;</td>
		<td style="width:100px;"><select style="width:100px;" class="InputSel" id="month" name="month" onChange="funmonth(this.value,<?php echo $y.','.$_REQUEST['s'].','.$_REQUEST['hq'].','.$_REQUEST['crop']; ?>)"><option value="<?php echo $m; ?>" selected="selected"><?php echo $Month; ?></option><?php for($i=1;$i<=12;$i++){ if($i!=$m){ ?><option value="<?php echo $i; ?>"><?php if($i==1){echo 'JANUARY';}elseif($i==2){echo 'FEBRUARY';}elseif($i==3){echo 'MARCH';}elseif($i==4){echo 'APRIL';}elseif($i==5){echo 'MAY';}elseif($i==6){echo 'JUNE';}elseif($i==7){echo 'JULY';}elseif($i==8){echo 'AUGUST';}elseif($i==9){echo 'SEPTEMBER';}elseif($i==10){echo 'OCTOBER';}elseif($i==11){echo 'NOVEMBER';}elseif($i==12){echo 'DECEMBER';} ?></option><?php }} ?></select></td>
		 
		<td class="tdf">&nbsp;Year:&nbsp;</td>
		<td style="width:60px;"><select style="width:100px;" class="InputSel" id="year" name="year" onChange="funyear(this.value,<?php echo $m.','.$_REQUEST['s'].','.$_REQUEST['hq'].','.$_REQUEST['crop']; ?>)"><option value="<?php echo $y; ?>" selected="selected"><?php echo $FDate.'-'.$TDate; ?></option>
		<?php $sql2y=mysql_query("select YearId,FromDate,ToDate from hrm_sales_year where YearId!=".$y." AND YearId<=".$YearId, $con); while($res2y=mysql_fetch_assoc($sql2y)){ $F2Date=date("Y",strtotime($res2y['FromDate'])); $T2Date=date("Y",strtotime($res2y['ToDate'])); ?><option value="<?php echo $res2y['YearId']; ?>"><?php echo $F2Date.'-'.$T2Date; ?></option><?php } ?></select></td>
		
		
		<td class="tdf">&nbsp;Crop:&nbsp;</td>
		<td style="width:120px;"><select style="width:120px;" class="InputSel" id="crop" name="crop" onChange="funcrop(this.value,<?php echo $m.','.$y.','.$_REQUEST['s'].','.$_REQUEST['hq']; ?>)">
<?php if($crop==1){$crp='Vegetable Crop';}else{$crp='Field Crop';} ?><option value='<?php echo $crop;?>' selected><?php echo $crp;?></option><option value="<?php if($crop==1){echo 2;}else{echo 1;}?>"><?php if($crop==1){echo 'Field Crop';}else{echo 'Vegetable Crop';}?></option></select></td>  
		
		<td class="tdf">&nbsp;State:&nbsp;</td>
		<td style="width:120px;"><select style="width:120px;" class="InputSel" id="state" name="state" onChange="funstate(this.value,<?php echo $m.','.$y.','.$_REQUEST['crop']; ?>)">
<?php if($s>0){ $ss=mysql_query("select StateName from hrm_state where StateId=".$s,$con); $rs=mysql_fetch_assoc($ss); $state=ucfirst(strtolower($rs['StateName'])); ?><option value='<?php echo $s;?>' selected><?php echo ucfirst(strtolower($rs['StateName']));?></option><?php }else{ $state=''; ?><option value="0" selected>select</option><?php } $sqls=mysql_query("select st.StateId,StateName from hrm_state st inner join hrm_headquater hq on st.StateId=hq.StateId inner join hrm_sales_hq_temp hqtmp on hq.HqId=hqtmp.HqId inner join hrm_sales_reporting_level rl on hqtmp.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqtmp.EmployeeID=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") group by StateId order by StateName ASC",$con); while($ress=mysql_fetch_assoc($sqls)){ ?><option value="<?php echo $ress['StateId']; ?>"><?php echo ucfirst(strtolower($ress['StateName'])); ?></option><?php } ?></select></td>

	 <td class="tdf">&nbsp;HQ:&nbsp;</td>
	 <td style="width:120px;"><select style="width:120px;" class="InputSel" id="hq" name="hq" onChange="funhq(this.value,<?php echo $m.','.$y.','.$_REQUEST['s'].','.$_REQUEST['crop']; ?>)" <?php if($s>0 OR $_REQUEST['hq']>0){echo '';}else{echo '';} ?>><?php if($_REQUEST['hq']>0){ $shq=mysql_query("select HqName from hrm_headquater where HqId=".$_REQUEST['hq'],$con); $rhq=mysql_fetch_assoc($shq); $hq=ucfirst(strtolower($rhq['HqName'])); ?><option value='<?php echo $_REQUEST['hq'];?>' selected><?php echo ucfirst(strtolower($rhq['HqName']));?></option><?php } else { $hq=''; ?><option value="0" selected>select</option><?php } if($_REQUEST['s']>0){ ?><?php $sqlhq=mysql_query("select hq.HqId,HqName from hrm_headquater hq inner join hrm_sales_dealer d on hq.HqId=d.HqId inner join hrm_sales_hq_temp hqtmp on hq.HqId=hqtmp.HqId inner join hrm_sales_reporting_level rl on hqtmp.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqtmp.EmployeeID=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND hq.StateId=".$_REQUEST['s']." group by HqName order by HqName asc",$con); }else{ $sqlhq=mysql_query("select hq.HqId,HqName from hrm_sales_dealer d inner join hrm_headquater hq on d.HqId=hq.HqId inner join hrm_sales_hq_temp hqtmp on hq.HqId=hqtmp.HqId inner join hrm_sales_reporting_level rl on hqtmp.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqtmp.EmployeeID=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") group by HqName order by HqName asc",$con); }  while($reshq=mysql_fetch_assoc($sqlhq)){ ?><option value="<?php echo $reshq['HqId']; ?>"><?php echo ucfirst(strtolower($reshq['HqName'])); ?></option><?php } ?>
	 
	 <?php $sql2hq=mysql_query("select hq.HqId,HqName from hrm_sales_tlemp tle inner join hrm_headquater hq on tle.TLHq=hq.HqId where tle.TLRepId=".$EmployeeId." AND TLStatus='A' group by HqName order by HqName asc",$con);
	 while($res2hq=mysql_fetch_assoc($sql2hq)){ ?><option value="<?php echo $res2hq['HqId']; ?>"><?php echo ucfirst(strtolower($res2hq['HqName'])); ?></option><?php } ?>
	 
	 </select></td>
	 
	 
	 <td style="font-family:Georgia;color:#FF80FF;font-weight:bold;font-size:12px;width:60px;">&nbsp;<span style="cursor:pointer;color:#FFFF6A;" onClick="FunRef(<?php echo $m.','.$y.','.$_REQUEST['s'].','.$_REQUEST['hq'].','.$_REQUEST['crop']; ?>)"><u>refresh</u></span></td>
	 <?php if($_REQUEST['s']>0 OR $_REQUEST['hq']>0){ ?>
	 <td style="font-family:Georgia;color:#FF80FF;font-weight:bold;font-size:12px;width:100px;">&nbsp;<span style="cursor:pointer;color:#FFFF6A;" onClick="FunExport(<?php echo $m.','.$y.','.$_REQUEST['s'].','.$_REQUEST['hq'].','.$_REQUEST['crop'].','.$EmployeeId; ?>)"><u>Export All</u></span></td>
	 <?php } ?>
	 
	   </tr>
	  </table>
	  <?php } ?>
	  
	 </td>
	</tr>
	<tr>
	 <td>
<?php
$s1=mysql_query("select * from erp_settdate where RcpMrp='RCP' AND Sts='A'",$con2); $r1=mysql_fetch_assoc($s1);
$Vwl=strlen($r1['ViewD']); $Opl=strlen($r1['OpeningD']); $Cll=strlen($r1['ClosingD']); $ml=strlen($m);
if($Vwl==1){$Vw='0'.$r1['ViewD'];} else{$Vw=$r1['ViewD'];}
if($Opl==1){$Op='0'.$r1['OpeningD'];} else{$Op=$r1['OpeningD'];}
if($Cll==1){$Cl='0'.$r1['ClosingD'];} else{$Cl=$r1['ClosingD'];}
if($ml==1){$mnt='0'.$m;} else{$mnt=$m;}
$OpD=date($yy.'-'.$mnt.'-'.$Op); $ClD=date($yy.'-'.$mnt.'-'.$Cl);
$qryr=mysql_query("select * from erp_rcp_submit where EmpId=".$EmployeeId." AND Month=".$m." AND Year=".$yy." AND Sts='A'",$con2); $rowqryr=mysql_num_rows($qryr);
$qryst=mysql_query("select * from hrm_sales_state_temp where EmployeeID=".$EmployeeId." AND StateTEmpStatus='A'",$con); $rowqst=mysql_num_rows($qryst);
echo '<input type="hidden" id="StateInCharge" value="'.$rowqst.'" />';
echo '<input type="hidden" id="Mntname" value="'.$Month.'" />';
?>	 
<!-- start table formate open -->
<!-- start table formate open --> 
<?php if($ckr>0){ ?>
<table width="100%" id="table1" style="background-color:#000000;" cellspacing="1">
<div class="thead" style="width:100%;">
<thead>
 <tr>
  <td rowspan="2" colspan="4" class="td1"><?php if($rowqryr==0){?><input type="button" class="td1btn" onClick="FunFinSub(<?php echo $yy.','.$m.','.$EmployeeId.','.$_REQUEST['hq'].','.$m.','.$y.','.$_REQUEST['s'].','.$_REQUEST['crop'];?>)" value="Final Submit" /><br><?php } ?>
  <font color="#003871" size="3"><i><u><?php echo $Month.'-'.$yy.'&nbsp;&nbsp;{ '.$hq.'-'.$state.' }'; ?></u></i></font></td>
  <td rowspan="3" class="td1" style="width:3%;">Edit<br></td>
  <td colspan="8" class="td1"><font color="#003871" size="3"><i><u><?php if($crop==1){echo 'Vegetable Crop';}elseif($crop==2){echo 'Field Crop';} echo '</u></i></font>';
  echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
  if(date("Y-m-d")>=$OpD AND date("Y-m-d")<=$ClD AND $rowqryr==0)
  { 
   $diff = abs(strtotime($ClD) - strtotime(date("Y-m-d")));
   $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/(60*60*24)); 
   echo '<b><font color="#FF2020"><blink>'.$days.' Days Remaining! Last date :</font> <font color="#5B0000">'.date("d-F",strtotime($ClD)).'</font></blink></b>';
  }
  
  ?></td>
 </tr>
 <tr>
  <td rowspan="2" class="td1" style="width:6%;">Sales Plan<br>Value</td>
  <td rowspan="2" class="td1" style="width:6%;">Pending<br>Bill</td>
  <td colspan="6" class="td1">Collection Plan</td>
 </tr>
 <tr>
  <td class="td1" style="width:2%;">Sn.</td>
  <td class="td1" style="width:22%;">Dealer</td>
  <td class="td1" style="width:8%;">Hq</td>
  <td class="td1" style="width:4%;">State</td>
  <td class="td1" style="width:6%;">Against<br>Sales Plan</td>
  <td class="td1" style="width:6%;">Against<br>Outstanding</td>
  <td class="td1" style="width:6%;">for ABS</td>
  <td class="td1" style="width:12%;">Name Of ABS</td>
  <td class="td1" style="width:6%;">Total<br>Target</td>
  <td class="td1" style="width:6%;">Total<br>Actual</td>
 </tr>
</thead> 
</div> 

<div class="tbody">
<tr>
  <td class="td4" colspan="5" style="background-color:#FF80FF;"><b><?php if(date("Y-m-d")>=$OpD AND date("Y-m-d")<=$ClD AND $rowqryr==0){ ?>Edit All&nbsp;&nbsp;<input type="checkbox" id="chkId" onClick="FunCheckEdit(<?php echo $_REQUEST['hq'].','.$m.','.$y.','.$_REQUEST['s'].','.$_REQUEST['crop'].','.$yy.','.$EmployeeId; ?>)" /><?php } ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total:</b>&nbsp;</td>
  <td class="td2" style="background-color:#FF80FF;"><input class="itd4" id="TotTotSpV" style="font-weight:bold;background-color:#FF80FF;" value="0" readonly/></td>
 
  
  <?php if($_REQUEST['hq']>0)
  { 
   $sTcp=mysql_query("select SUM(SalPTgt_CollVal) as T1v, SUM(SalPTgt_CollValfc) as T1f, SUM(Oust_CollVal)  as T2v, SUM(Oust_CollVal) as T2f, SUM(Abs_CollVal)  as T3v, SUM(Abs_CollValfc) as T3f, SUM(Tot_CollVal) as T4v, SUM(Tot_CollValfc) as T4f from ".db2.".erp_rcp rcp inner join ".db1.".hrm_sales_dealer sd on rcp.DealerId=sd.DealerId inner join ".db1.".hrm_headquater hq on sd.HqId=hq.HqId where hq.HqId=".$_REQUEST['hq']." AND rcp.RcpMonth=".$m." AND rcp.RcpYear=".$yy); $rTcp=mysql_fetch_assoc($sTcp); 
  
  $sTpb=mysql_query("select SUM(PendingBills) as Tpbv,SUM(PendingBillsfc) as Tpbf from ".db2.".erp_rcp_ageing rage inner join ".db1.".hrm_sales_dealer sd on rage.DealerId=sd.DealerId inner join ".db1.".hrm_headquater hq on sd.HqId=hq.HqId where hq.HqId=".$_REQUEST['hq']." AND AgeingDate='".date($yy.'-'.$m.'-'.$Vw)."' AND AgeingMonth=".$m." AND AgeingYear=".$yy,$con2); $rTpb=mysql_fetch_assoc($sTpb);
  } 
  elseif($_REQUEST['s']>0)
  { 
   $sTcp=mysql_query("select SUM(SalPTgt_CollVal) as T1v, SUM(SalPTgt_CollValfc) as T1f, SUM(Oust_CollVal)  as T2v, SUM(Oust_CollVal) as T2f, SUM(Abs_CollVal)  as T3v, SUM(Abs_CollValfc) as T3f, SUM(Tot_CollVal)  as T4v, SUM(Tot_CollValfc) as T4f from ".db2.".erp_rcp rcp inner join ".db1.".hrm_sales_dealer sd on rcp.DealerId=sd.DealerId inner join ".db1.".hrm_headquater hq on sd.HqId=hq.HqId inner join ".db1.".hrm_sales_hq_temp hqtmp on hq.HqId=hqtmp.HqId inner join ".db1.".hrm_sales_reporting_level rl on hqtmp.EmployeeID=rl.EmployeeID where hq.StateId=".$_REQUEST['s']." AND HqTEmpStatus='A' AND (hqtmp.EmployeeID=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND rcp.RcpMonth=".$m." AND rcp.RcpYear=".$yy); $rTcp=mysql_fetch_assoc($sTcp); 
   
   $sTpb=mysql_query("select SUM(PendingBills) as Tpbv,SUM(PendingBillsfc) as Tpbf from ".db2.".erp_rcp_ageing rage inner join ".db1.".hrm_sales_dealer sd on rage.DealerId=sd.DealerId inner join ".db1.".hrm_headquater hq on sd.HqId=hq.HqId inner join ".db1.".hrm_sales_hq_temp hqtmp on hq.HqId=hqtmp.HqId inner join ".db1.".hrm_sales_reporting_level rl on hqtmp.EmployeeID=rl.EmployeeID where hq.StateId=".$_REQUEST['s']." AND HqTEmpStatus='A' AND (hqtmp.EmployeeID=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND AgeingDate='".date($yy.'-'.$m.'-'.$Vw)."' AND AgeingMonth=".$m." AND AgeingYear=".$yy,$con2); $rTpb=mysql_fetch_assoc($sTpb);
   
  } 
 
  ?>
  <td class="td4" style="background-color:#FF80FF;"><b><?php if($crop==1){ echo $rTpb['Tpbv'];}elseif($crop==2){echo $rTpb['Tpbf'];}?></b></td>
  <td class="td4" style="background-color:#FF80FF;"><b><?php if($crop==1){ echo $rTcp['T1v'];}elseif($crop==2){echo $rTcp['T1f'];}?></b></td>
  <td class="td4" style="background-color:#FF80FF;"><b><?php if($crop==1){ echo $rTcp['T2v'];}elseif($crop==2){echo $rTcp['T2f'];}?></b></td>
  <td class="td4" style="background-color:#FF80FF;"><b><?php if($crop==1){ echo $rTcp['T3v'];}elseif($crop==2){echo $rTcp['T3f'];}?></b></td>
  <td class="td2" style="background-color:#FF80FF;"></td>
  <td class="td4" style="background-color:#FF80FF;"><b><?php if($crop==1){ echo $rTcp['T4v'];}elseif($crop==2){echo $rTcp['T4f'];}?></b></td>
  <td class="td4" style="background-color:#FF80FF;"><b>
  <?php if($crop==1){$vf='vc';}elseif($crop==2){$vf='fc';}
   if($_REQUEST['hq']>0){ $sqlTv=mysql_query("select SUM(CollAmount) as vamt from ".db2.".erp_dealer_collection dc inner join ".db1.".hrm_sales_dealer sd on dc.DealerId=sd.DealerId inner join ".db1.".hrm_headquater hq on sd.HqId=hq.HqId where hq.HqId=".$_REQUEST['hq']." AND Type='".$vf."' AND Updt between '".date($yy.'-'.$m.'-01')."' AND '".date($yy.'-'.$m.'-31')."' "); $resTv=mysql_fetch_assoc($sqlTv); }
   elseif($_REQUEST['s']>0){ $sqlTv=mysql_query("select SUM(CollAmount) as vamt from ".db2.".erp_dealer_collection dc inner join ".db1.".hrm_sales_dealer sd on dc.DealerId=sd.DealerId inner join ".db1.".hrm_headquater hq on sd.HqId=hq.HqId inner join ".db1.".hrm_sales_hq_temp hqtmp on hq.HqId=hqtmp.HqId inner join ".db1.".hrm_sales_reporting_level rl on hqtmp.EmployeeID=rl.EmployeeID where hq.StateId=".$_REQUEST['s']." AND HqTEmpStatus='A' AND (hqtmp.EmployeeID=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND Type='".$vf."' AND Updt between '".date($yy.'-'.$m.'-01')."' AND '".date($yy.'-'.$m.'-31')."' "); $resTv=mysql_fetch_assoc($sqlTv); }
 echo floatval($resTv['vamt']); ?></b>
  <input type="hidden" class="itd4" id="Tot_coll" value="<?php echo $TotActCv;?>"/>
  </td>
 </tr>


<?php if($_REQUEST['hq']>0){ $sql=mysql_query("select d.DealerId,DealerName,DealerCity,HqName,StateCode from hrm_sales_dealer d inner join hrm_headquater hq on d.HqId=hq.HqId inner join hrm_state s on hq.StateId=s.StateId where hq.HqId=".$_REQUEST['hq']." order by hq.HqName ASC, d.DealerName ASC ",$con); }elseif($_REQUEST['s']>0)
{
$sql=mysql_query("select d.DealerId,DealerName,DealerCity,HqName,StateCode from hrm_sales_dealer d 
inner join hrm_headquater hq on d.HqId=hq.HqId inner join hrm_state s on hq.StateId=s.StateId inner join hrm_sales_hq_temp hqtmp on hq.HqId=hqtmp.HqId inner join hrm_sales_reporting_level rl on hqtmp.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqtmp.EmployeeID=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND hq.StateId=".$_REQUEST['s']." order by hq.HqName ASC, d.DealerName ASC ",$con);

/*//$sql=mysql_query("select d.DealerId,DealerName,DealerCity,HqName,StateCode from hrm_sales_dealer d 
inner join hrm_headquater hq on d.HqId=hq.HqId inner join hrm_state s on hq.StateId=s.StateId where hq.StateId=".$_REQUEST['s']." order by hq.HqName ASC, d.DealerName ASC ",$con);*/


} $sn=1; while($res=mysql_fetch_assoc($sql)){ 
 
$scp=mysql_query("select * from erp_rcp where DealerId=".$res['DealerId']." AND RcpMonth=".$m." AND RcpYear=".$yy,$con2); $rcp=mysql_fetch_assoc($scp); 
$spb=mysql_query("select RcpAgeingId,PendingBills,PendingBillsfc from erp_rcp_ageing where DealerId=".$res['DealerId']." AND AgeingDate='".date($yy.'-'.$m.'-'.$Vw)."' AND AgeingMonth=".$m." AND AgeingYear=".$yy,$con2); $rpb=mysql_fetch_assoc($spb);   


$svv=mysql_query("select M".$mm." from hrm_sales_sal_details_".$y." sd inner join hrm_sales_seedsproduct sp on sd.ProductId=sp.ProductId inner join hrm_sales_seedsitem si on sp.ItemId=si.ItemId where si.GroupId=".$crop." AND sd.YearId=".$y." AND M".$mm."!=0 AND sd.DealerId=".$res['DealerId'], $con); $rowvv=mysql_num_rows($svv);
?>

<?php if($rowqst==0 OR ($rowqst>0 AND ($rowvv>0 OR $rpb['PendingBills']!=0 OR $rpb['PendingBillsfc']!=0 OR $rcp['SalPTgt_CollVal']!=0 OR $rcp['SalPTgt_CollValfc']!=0 OR $rcp['Oust_CollVal']!=0 OR $rcp['Oust_CollValfc']!=0 OR $rcp['Abs_CollVal']!=0 OR $rcp['Abs_CollValfc']!=0))){ 
echo '<input type="hidden" id="NotEdit'.$sn.'" value="Y" />'; ?>
<tbody> 
 <tr>
  <td class="td2"><?php echo $sn; ?></td>
  <td class="td3">&nbsp;<?php echo strtolower($res['DealerName'].' - <font color="#0062C4">'.$res['DealerCity'].'</font>'); ?></td>
  <td class="td3">&nbsp;<?php echo strtolower($res['HqName']); ?></td>
  <td class="td2"><?php echo $res['StateCode']; ?></td>
  <td align="center" valign="middle" bgcolor="#FFFFFF">
  <?php if(date("Y-m-d")>=$OpD AND date("Y-m-d")<=$ClD AND $rowqryr==0){ ?>
  <span style="cursor:pointer;">
  <img src="images/edit.png" id="Edit<?php echo $sn;?>" onClick="FunEdit(<?php echo $sn.','.$_REQUEST['hq'].','.$m.','.$y.','.$_REQUEST['s'].','.$_REQUEST['crop'].','.$res['DealerId'].','.$yy.','.$EmployeeId; ?>)" />
  <img src="images/Floppy-Small-icon.png" id="Save<?php echo $sn;?>" onClick="saveD(<?php echo $sn.','.$_REQUEST['hq'].','.$m.','.$y.','.$_REQUEST['s'].','.$_REQUEST['crop'].','.$res['DealerId'].','.$yy.','.$EmployeeId; ?>)" style="display:none;"></span>
  <?php } ?><input type="hidden" id="Dealer_<?php echo $sn ?>" value="<?php echo $res['DealerId']; ?>" />
  </td>
  <td class="td2"><input class="itd4" id="TotSpV<?php echo $sn;?>" style="cursor:pointer;color:#003399;text-decoration:underline;" value="0" onClick="FunSpDetails(<?php echo $res['DealerId'].','.$m.','.$y.','.$crop;?>,'<?php echo 'M'.$mm; ?>')" readonly/></td>
 
  <td class="td4"><span style="cursor:pointer;color:#003399;" onClick="FunBillDetails(<?php echo $res['DealerId'].','.$m.','.$y.','.$crop;?>)"><u><?php if($crop==1){ echo $rpb['PendingBills'];}elseif($crop==2){echo $rpb['PendingBillsfc'];}?></u></span></td>
  
  <td class="td2" id="td1<?php echo $sn;?>">
  <input class="itd4" id="Agn_salplan<?php echo $sn;?>" value="<?php if($crop==1){ echo $rcp['SalPTgt_CollVal'];}elseif($crop==2){echo $rcp['SalPTgt_CollValfc'];}?>" onKeyPress="return isNumberKey(event)" maxlength="12" onKeyUp="funCalV(this.value,<?php echo $sn;?>)" readonly/></td>
  <td class="td2" id="td2<?php echo $sn;?>">
  <input class="itd4" id="Agn_oust<?php echo $sn;?>" value="<?php if($crop==1){ echo $rcp['Oust_CollVal'];}elseif($crop==2){echo $rcp['Oust_CollValfc'];} ?>" onKeyPress="return isNumberKey(event)" maxlength="12" onKeyUp="funCalV(this.value,<?php echo $sn;?>)" readonly/></td>
  <td class="td2" id="td3<?php echo $sn;?>">
  <input class="itd4" id="Agn_abs<?php echo $sn;?>" value="<?php if($crop==1){ echo $rcp['Abs_CollVal'];}elseif($crop==2){echo $rcp['Abs_CollValfc'];} ?>" onKeyPress="return isNumberKey(event)" maxlength="12" onKeyUp="funCalV(this.value,<?php echo $sn;?>)" readonly/></td>
  <td class="td2" id="td4<?php echo $sn;?>">
  <input class="itd3" id="Name_abs<?php echo $sn;?>" value="<?php if($crop==1){ echo $rcp['AbsName'];}elseif($crop==2){echo $rcp['AbsNamefc'];} ?>" maxlength="50" readonly/></td>
  <td class="td2" style="background-color:#FFFFA8;">
  <input class="itd4" id="Tot_target<?php echo $sn;?>" style="background-color:#FFFFA8;" value="<?php if($crop==1){ echo $rcp['Tot_CollVal'];}elseif($crop==2){echo $rcp['Tot_CollValfc'];} ?>" readonly/></td>
  <td class="td4" style="background-color:#D2FFA6;"><span style="cursor:pointer;color:#003399;" onClick="FunCollDetails(<?php echo $res['DealerId'].','.$m.','.$y.','.$crop;?>)"><u>
  
  <?php if($crop==1){  $sqlv=mysql_query("select SUM(CollAmount) as vamt from erp_dealer_collection where DealerId=".$res['DealerId']." AND Type='vc' AND Updt between '".date($yy.'-'.$m.'-01')."' AND '".date($yy.'-'.$m.'-31')."' ",$con2); $resv=mysql_fetch_assoc($sqlv); echo floatval($resv['vamt']); }elseif($crop==2){ $sqlf=mysql_query("select SUM(CollAmount) as famt from erp_dealer_collection where DealerId=".$res['DealerId']." AND Type='fc' AND Updt between '".date($yy.'-'.$m.'-01')."' AND '".date($yy.'-'.$m.'-31')."' ",$con2); $resf=mysql_fetch_assoc($sqlf); echo floatval($resf['famt']); }
  
  //echo '000';
  //echo $rcp['Total_ActColl_SalPTgtOust']+$rcp['Total_ActColl_Abs'];
  //elseif($crop==2){echo $rcp['Total_ActColl_SalPTgtOustfc']+$rcp['Total_ActColl_Absfc'];} ?>
  
  </u></span>
  <input type="hidden" class="itd4" id="Tot_coll" value="<?php echo $TotActCv;?>"/>
  </td>
 </tr>
 </tbody> 
<?php }else{echo '<input type="hidden" id="NotEdit'.$sn.'" value="N" />';} ?> 
<?php $sn++; } //$ssn=$sn-1; echo '<input type="hidden" id="rowc" value='.$ssn.' />'; ?>


<?php /** Teamlease Teamlease Open **/ ?>
<?php /** Teamlease Teamlease Open **/ ?>
<?php if($_REQUEST['s']>0 AND $_REQUEST['hq']==0){$sql=mysql_query("select d.DealerId,DealerName,DealerCity,HqName,StateCode from hrm_sales_dealer d inner join hrm_headquater hq on d.HqId=hq.HqId inner join hrm_sales_tlemp tl on hq.HqId=tl.TLHq inner join hrm_state s on hq.StateId=s.StateId where TLStatus='A' AND tl.TLRepId=".$EmployeeId." AND hq.StateId=".$_REQUEST['s']." order by hq.HqName ASC, d.DealerName ASC ",$con);} $sn2=$sn; while($res=mysql_fetch_assoc($sql)){ 
 
$scp=mysql_query("select * from erp_rcp where DealerId=".$res['DealerId']." AND RcpMonth=".$m." AND RcpYear=".$yy,$con2); $rcp=mysql_fetch_assoc($scp); 
$spb=mysql_query("select RcpAgeingId,PendingBills,PendingBillsfc from erp_rcp_ageing where DealerId=".$res['DealerId']." AND AgeingDate='".date($yy.'-'.$m.'-'.$Vw)."' AND AgeingMonth=".$m." AND AgeingYear=".$yy,$con2); $rpb=mysql_fetch_assoc($spb);   


$svv=mysql_query("select M".$mm." from hrm_sales_sal_details_".$y." sd inner join hrm_sales_seedsproduct sp on sd.ProductId=sp.ProductId inner join hrm_sales_seedsitem si on sp.ItemId=si.ItemId where si.GroupId=".$crop." AND sd.YearId=".$y." AND M".$mm."!=0 AND sd.DealerId=".$res['DealerId'], $con); $rowvv=mysql_num_rows($svv);
?>


<?php if($rowqst==0 OR ($rowqst>0 AND ($rowvv>0 OR $rpb['PendingBills']!=0 OR $rpb['PendingBillsfc']!=0 OR $rcp['SalPTgt_CollVal']!=0 OR $rcp['SalPTgt_CollValfc']!=0 OR $rcp['Oust_CollVal']!=0 OR $rcp['Oust_CollValfc']!=0 OR $rcp['Abs_CollVal']!=0 OR $rcp['Abs_CollValfc']!=0))){
echo '<input type="hidden" id="NotEdit'.$sn2.'" value="Y" />'; ?>
<tbody> 
 <tr>
  <td class="td2"><?php echo $sn2; ?></td>
  <td class="td3">&nbsp;<?php echo strtolower($res['DealerName'].' - <font color="#0062C4">'.$res['DealerCity'].'</font>'); ?></td>
  <td class="td3">&nbsp;<?php echo strtolower($res['HqName']); ?></td>
  <td class="td2"><?php echo $res['StateCode']; ?></td>
  <td align="center" valign="middle" bgcolor="#FFFFFF">
  <?php if(date("Y-m-d")>=$OpD AND date("Y-m-d")<=$ClD AND $rowqryr==0){ ?>
  <span style="cursor:pointer;">
  <img src="images/edit.png" id="Edit<?php echo $sn2;?>" onClick="FunEdit(<?php echo $sn2;?>)" />
  <img src="images/Floppy-Small-icon.png" id="Save<?php echo $sn2;?>" onClick="saveD(<?php echo $sn2.','.$_REQUEST['hq'].','.$m.','.$y.','.$_REQUEST['s'].','.$_REQUEST['crop'].','.$res['DealerId'].','.$yy.','.$EmployeeId; ?>)" style="display:none;"></span>
  <?php } ?><input type="hidden" id="Dealer_<?php echo $sn2; ?>" value="<?php echo $res['DealerId']; ?>" />
  </td>
  <td class="td2"><input class="itd4" id="TotSpV<?php echo $sn2;?>" style="cursor:pointer;color:#003399;text-decoration:underline;" value="0" onClick="FunSpDetails(<?php echo $res['DealerId'].','.$m.','.$y.','.$crop;?>,'<?php echo 'M'.$mm; ?>')" readonly/></td>
 
  <td class="td4"><span style="cursor:pointer;color:#003399;" onClick="FunBillDetails(<?php echo $res['DealerId'].','.$m.','.$y.','.$crop;?>)"><u><?php if($crop==1){ echo $rpb['PendingBills'];}elseif($crop==2){echo $rpb['PendingBillsfc'];}?></u></span></td>
  
  <td class="td2" id="td1<?php echo $sn2;?>">
  <input class="itd4" id="Agn_salplan<?php echo $sn2;?>" value="<?php if($crop==1){ echo $rcp['SalPTgt_CollVal'];}elseif($crop==2){echo $rcp['SalPTgt_CollValfc'];}?>" onKeyPress="return isNumberKey(event)" maxlength="12" onKeyUp="funCalV(this.value,<?php echo $sn2;?>)" readonly/></td>
  <td class="td2" id="td2<?php echo $sn2;?>">
  <input class="itd4" id="Agn_oust<?php echo $sn2;?>" value="<?php if($crop==1){ echo $rcp['Oust_CollVal'];}elseif($crop==2){echo $rcp['Oust_CollValfc'];} ?>" onKeyPress="return isNumberKey(event)" maxlength="12" onKeyUp="funCalV(this.value,<?php echo $sn2;?>)" readonly/></td>
  <td class="td2" id="td3<?php echo $sn2;?>">
  <input class="itd4" id="Agn_abs<?php echo $sn2;?>" value="<?php if($crop==1){ echo $rcp['Abs_CollVal'];}elseif($crop==2){echo $rcp['Abs_CollValfc'];} ?>" onKeyPress="return isNumberKey(event)" maxlength="12" onKeyUp="funCalV(this.value,<?php echo $sn2;?>)" readonly/></td>
  <td class="td2" id="td4<?php echo $sn2;?>">
  <input class="itd3" id="Name_abs<?php echo $sn2;?>" value="<?php if($crop==1){ echo $rcp['AbsName'];}elseif($crop==2){echo $rcp['AbsNamefc'];} ?>" maxlength="50" readonly/></td>
  <td class="td2" style="background-color:#FFFFA8;">
  <input class="itd4" id="Tot_target<?php echo $sn2;?>" style="background-color:#FFFFA8;" value="<?php if($crop==1){ echo $rcp['Tot_CollVal'];}elseif($crop==2){echo $rcp['Tot_CollValfc'];} ?>" readonly/></td>
  <td class="td4" style="background-color:#D2FFA6;"><span style="cursor:pointer;color:#003399;" onClick="FunCollDetails(<?php echo $res['DealerId'].','.$m.','.$y.','.$crop;?>)"><u>
  
  <?php if($crop==1){  $sqlv=mysql_query("select SUM(CollAmount) as vamt from erp_dealer_collection where DealerId=".$res['DealerId']." AND Type='vc' AND Updt between '".date($yy.'-'.$m.'-01')."' AND '".date($yy.'-'.$m.'-31')."' ",$con2); $resv=mysql_fetch_assoc($sqlv); echo floatval($resv['vamt']); }elseif($crop==2){ $sqlf=mysql_query("select SUM(CollAmount) as famt from erp_dealer_collection where DealerId=".$res['DealerId']." AND Type='fc' AND Updt between '".date($yy.'-'.$m.'-01')."' AND '".date($yy.'-'.$m.'-31')."' ",$con2); $resf=mysql_fetch_assoc($sqlf); echo floatval($resf['famt']); }
  
  //echo '000';
  //echo $rcp['Total_ActColl_SalPTgtOust']+$rcp['Total_ActColl_Abs'];
  //elseif($crop==2){echo $rcp['Total_ActColl_SalPTgtOustfc']+$rcp['Total_ActColl_Absfc'];} ?>
  
  </u></span>
  <input type="hidden" class="itd4" id="Tot_coll" value="<?php echo $TotActCv;?>"/>
  </td>
 </tr>
 </tbody> 
<?php }else{echo '<input type="hidden" id="NotEdit'.$sn2.'" value="N" />';} ?> 
<?php $sn2++; } $ssn=$sn2-1; echo '<input type="hidden" id="rowc" value='.$ssn.' />'; ?>

<?php /** Teamlease Teamlease Close **/ ?>
<?php /** Teamlease Teamlease Close **/ ?>
</div>

<?php if($_REQUEST['hq']>0){ $sql2=mysql_query("select d.DealerId,DealerName,DealerCity,HqName,StateCode from hrm_sales_dealer d inner join hrm_headquater hq on d.HqId=hq.HqId inner join hrm_state s on hq.StateId=s.StateId where hq.HqId=".$_REQUEST['hq']." order by hq.HqName ASC, d.DealerName ASC ",$con); }else{$sql2=mysql_query("select d.DealerId,DealerName,DealerCity,HqName,StateCode from hrm_sales_dealer d inner join hrm_headquater hq on d.HqId=hq.HqId inner join hrm_state s on hq.StateId=s.StateId inner join hrm_sales_hq_temp hqtmp on hq.HqId=hqtmp.HqId inner join hrm_sales_reporting_level rl on hqtmp.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqtmp.EmployeeID=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND hq.StateId=".$_REQUEST['s']." order by hq.HqName ASC, d.DealerName ASC ",$con);} 
$s=1; while($res2=mysql_fetch_assoc($sql2))
{ 
 $sv=mysql_query("select sd.ProductId,M".$mm." from hrm_sales_sal_details_".$y." sd inner join hrm_sales_seedsproduct sp on sd.ProductId=sp.ProductId inner join hrm_sales_seedsitem si on sp.ItemId=si.ItemId where si.GroupId=".$crop." AND sd.YearId=".$y." AND M".$mm."!=0 AND sd.DealerId=".$res2['DealerId'], $con); 
  $rowrv=mysql_num_rows($sv); 
  if($rowrv>0)
  { 
   while($rv=mysql_fetch_assoc($sv))
   { 
    $sNa=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$rv['ProductId']." AND Fdate>='".$yy."-".$mm."-01' AND Tdate<='".$yy."-".$mm."-31'", $con); $rowNa=mysql_num_rows($sNa); 
    if($rowNa==0){$sNb=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$rv['ProductId']." AND Fdate>='".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'<=Tdate", $con); $rowNb=mysql_num_rows($sNb);
    if($rowNb==0){$sNc=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$rv['ProductId']." AND Fdate>='".$yy."-".$mm."-01' AND PStatus='A'", $con); $rowNc=mysql_num_rows($sNc);
    if($rowNc==0)
    { $sNd=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$rv['ProductId']." AND PStatus='A'", $con); $rowNd=mysql_num_rows($sNd);
      if($rowNd==0){$Nrv4=0;}else{$resNd=mysql_fetch_assoc($sNd); $Nrv=$resNd['NRV'];} 
    }else{$resNc=mysql_fetch_assoc($sNc); $Nrv=$resNc['NRV'];} 
    }else{$resNb=mysql_fetch_assoc($sNb); $Nrv=$resNb['NRV'];} 
    }else{$resNa=mysql_fetch_assoc($sNa); $Nrv=$resNa['NRV'];}
    //if($res2['DealerId']==845){echo $rv['M'.$mm].'*'.$Nrv.'-';}
    $Net=$rv['M'.$mm]*$Nrv; $LakhNRV=$Net/100000; //if($LakhNRV>0){$val=$LakhNRV;}else{$val=0;} 
	if($Net>0){$val=$Net;}else{$val=0;}
    echo '<script>FunTotal('.$val.','.$s.');
	      function FunTotal(v,n)                                             
          { var a=parseFloat(v);  
            //if(n<4){ alert(v+"/ "+n); } 
            var Tt=parseFloat(document.getElementById("TotSpV"+n).value); 
			var Tott=parseFloat(document.getElementById("TotTotSpV").value); 
            document.getElementById("TotSpV"+n).value=Math.round((a+Tt)*1000)/1000; 
			document.getElementById("TotTotSpV").value=Math.round((a+Tott)*1000)/1000 ;
          }
	      </script>';
   }
  } 
$s++; }   


if($_REQUEST['s']>0 AND $_REQUEST['hq']==0){ $sql2=mysql_query("select d.DealerId,DealerName,DealerCity,HqName,StateCode from hrm_sales_dealer d inner join hrm_headquater hq on d.HqId=hq.HqId inner join hrm_sales_tlemp tl on hq.HqId=tl.TLHq inner join hrm_state s on hq.StateId=s.StateId where TLStatus='A' AND tl.TLRepId=".$EmployeeId." AND hq.StateId=".$_REQUEST['s']." order by hq.HqName ASC, d.DealerName ASC",$con);} 
$s2=$s; while($res2=mysql_fetch_assoc($sql2))
{ 
 $sv=mysql_query("select sd.ProductId,M".$mm." from hrm_sales_sal_details_".$y." sd inner join hrm_sales_seedsproduct sp on sd.ProductId=sp.ProductId inner join hrm_sales_seedsitem si on sp.ItemId=si.ItemId where si.GroupId=".$crop." AND sd.YearId=".$y." AND M".$mm."!=0 AND sd.DealerId=".$res2['DealerId'], $con); 
  $rowrv=mysql_num_rows($sv); 
  if($rowrv>0)
  { 
   while($rv=mysql_fetch_assoc($sv))
   { 
    $sNa=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$rv['ProductId']." AND Fdate>='".$yy."-".$mm."-01' AND Tdate<='".$yy."-".$mm."-31'", $con); $rowNa=mysql_num_rows($sNa); 
    if($rowNa==0){$sNb=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$rv['ProductId']." AND Fdate>='".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'<=Tdate", $con); $rowNb=mysql_num_rows($sNb);
    if($rowNb==0){$sNc=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$rv['ProductId']." AND Fdate>='".$yy."-".$mm."-01' AND PStatus='A'", $con); $rowNc=mysql_num_rows($sNc);
    if($rowNc==0)
    { $sNd=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$rv['ProductId']." AND PStatus='A'", $con); $rowNd=mysql_num_rows($sNd);
      if($rowNd==0){$Nrv4=0;}else{$resNd=mysql_fetch_assoc($sNd); $Nrv=$resNd['NRV'];} 
    }else{$resNc=mysql_fetch_assoc($sNc); $Nrv=$resNc['NRV'];} 
    }else{$resNb=mysql_fetch_assoc($sNb); $Nrv=$resNb['NRV'];} 
    }else{$resNa=mysql_fetch_assoc($sNa); $Nrv=$resNa['NRV'];}
    //if($res2['DealerId']==845){echo $rv['M'.$mm].'*'.$Nrv.'-';}
    $Net=$rv['M'.$mm]*$Nrv; $LakhNRV=$Net/100000; //if($LakhNRV>0){$val=$LakhNRV;}else{$val=0;} 
	if($Net>0){$val=$Net;}else{$val=0;}
    echo '<script>FunTotal('.$val.','.$s2.');
	      function FunTotal(v,n)                                             
          { var a=parseFloat(v);  
            //if(n<4){ alert(v+"/ "+n); } 
            var Tt=parseFloat(document.getElementById("TotSpV"+n).value); 
			var Tott=parseFloat(document.getElementById("TotTotSpV").value); 
            document.getElementById("TotSpV"+n).value=Math.round((a+Tt)*1000)/1000; 
			document.getElementById("TotTotSpV").value=Math.round((a+Tott)*1000)/1000 ;
          }
	      </script>';
   }
  } 
$s2++; }   


?> 
        
</table>
<?php } ?>
<!-- start table formate close -->
<!-- start table formate close -->	  
	 </td>
	 
	</tr>
 </table>
</td>
</tr>
	   
   </table>
  </td>
 </table>
</td>  
  </tr>
  
 </table>
 </td>
</tr>
</table>	

<?php //*****************END*****END*****END******END******END**************************/ ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>
