<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}

if(isset($_POST['btnsave']))
{
  $Mx=mysql_query("select Max(FaId) as maxfid from fa_details",$con); $rMx=mysql_fetch_assoc($Mx); 
  $nMx=$rMx['maxfid']+1;
   
  if((!empty($_FILES["photo"])) && ($_FILES['photo']['error']==0))
  { $photoN=strtolower(basename($_FILES['photo']['name']));
    $photoExt=substr($photoN, strrpos($photoN, '.') + 1);
	$photoName='photo'.$nMx.'.'.$photoExt;
	$photoPath='f_fafile/'.$photoName;
    move_uploaded_file($_FILES["photo"]["tmp_name"],$photoPath);
  } else {$photoName='';}
  
  if((!empty($_FILES["updl"])) && ($_FILES['updl']['error']==0))
  { $dlN=strtolower(basename($_FILES['updl']['name']));
    $dlExt=substr($dlN, strrpos($dlN, '.') + 1);
	$dlName='dl'.$nMx.'.'.$dlExt;
	$dlPath='f_fafile/'.$dlName;
    move_uploaded_file($_FILES["updl"]["tmp_name"],$dlPath);
  } else {$dlName='';}
  
  if((!empty($_FILES["upaadhar"])) && ($_FILES['upaadhar']['error']==0))
  { $aadharN=strtolower(basename($_FILES['upaadhar']['name']));
    $aadharExt=substr($aadharN, strrpos($aadharN, '.') + 1);
	$aadharName='aadhar'.$nMx.'.'.$aadharExt;
	$aadharPath='f_fafile/'.$aadharName;
    move_uploaded_file($_FILES["upaadhar"]["tmp_name"],$aadharPath);
  } else {$aadharName='';}
  
  if((!empty($_FILES["uppan"])) && ($_FILES['uppan']['error']==0))
  { $panN=strtolower(basename($_FILES['uppan']['name']));
    $panExt=substr($panN, strrpos($panN, '.') + 1);
	$panName='pan'.$nMx.'.'.$panExt;
	$panPath='f_fafile/'.$panName;
    move_uploaded_file($_FILES["uppan"]["tmp_name"],$panPath);
  } else {$panName='';}
  
  if((!empty($_FILES["upresume"])) && ($_FILES['upresume']['error']==0))
  { $resumeN=strtolower(basename($_FILES['upresume']['name']));
    $resumeExt=substr($resumeN, strrpos($resumeN, '.') + 1);
	$resumeName='pan'.$nMx.'.'.$resumeExt;
	$resumePath='f_fafile/'.$resumeName;
    move_uploaded_file($_FILES["upresume"]["tmp_name"],$resumePath);
  } else {$resumeName='';}
  
  if((!empty($_FILES["upvotercard"])) && ($_FILES['upvotercard']['error']==0))
  { $voterN=strtolower(basename($_FILES['upvotercard']['name']));
    $voterExt=substr($voterN, strrpos($voterN, '.') + 1);
	$voterName='pan'.$nMx.'.'.$voterExt;
	$voterPath='f_fafile/'.$voterName;
    move_uploaded_file($_FILES["upvotercard"]["tmp_name"],$voterPath);
  } else {$voterName='';}
  
  if((!empty($_FILES["upan1"])) && ($_FILES['upan1']['error']==0))
  { $an1N=strtolower(basename($_FILES['upan1']['name']));
    $an1Ext=substr($an1N, strrpos($an1N, '.') + 1);
	$an1Name='pan'.$nMx.'.'.$an1Ext;
	$an1Path='f_fafile/'.$an1Name;
    move_uploaded_file($_FILES["upan1"]["tmp_name"],$an1Path);
  } else {$an1Name='';}
  
  if((!empty($_FILES["upan2"])) && ($_FILES['upan2']['error']==0))
  { $an2N=strtolower(basename($_FILES['upan2']['name']));
    $an2Ext=substr($an2N, strrpos($an2N, '.') + 1);
	$an2Name='pan'.$nMx.'.'.$an2Ext;
	$an2Path='f_fafile/'.$an2Name;
    move_uploaded_file($_FILES["upan2"]["tmp_name"],$an2Path);
  } else {$an2Name='';}

  if($_POST['cont1']>0){$cont1=$_POST['cont1'];}else{$cont1=0;}
  if($_POST['cont2']>0){$cont2=$_POST['cont2'];}else{$cont2=0;}
  $Ins=mysql_query("insert into fa_details(FaId, FareqId, Mode, Sal_DealerId, HqId, Reporting, FaName, FaStatus, Salary, Expences, DOJ, JobStatus, SalaryMode, ContactNo, Contact2No, AadharNo, DrivLic, PanNo, VoterId, DOB, Gender, Married, Qualif, BloodGroup, EmailId, BankName, AccountNo, Location, Upld_pic, Upld_dl, Upld_pan, Upld_aadhar, Upld_resume, Upld_voterId, Upld_other1, Upld_other2, Address1, Address2, CreatedBy, CreatedDate) values(".$nMx.", ".$_POST['FaReqId'].", ".$_POST['mode'].", ".$_POST['sdeal'].", ".$_POST['HeadQuarter'].", ".$_POST['repI'].", '".$_POST['name']."', '".$_POST['status']."', '".$_POST['sal']."', '".$_POST['expences']."', '".date("Y-m-d",strtotime($_POST['doj']))."', '".$_POST['jobstatus']."', '".$_POST['smode']."', ".$cont1.", ".$cont2.", '".$_POST['aadhar']."', '".$_POST['dl']."', '".$_POST['panno']."', '".$_POST['voterid']."', '".date("Y-m-d",strtotime($_POST['dob']))."', '".$_POST['gender']."', '".$_POST['married']."', '".$_POST['quali']."', '".$_POST['bg']."', '".$_POST['email']."', '".$_POST['bank']."', '".$_POST['accno']."', '".$_POST['loc']."', '".$photoName."', '".$dlName."', '".$panName."', '".$aadharName."', '".$resumeName."', '".$voterName."', '".$an1Name."', '".$an2Name."', '".$_POST['add1']."', '".$_POST['add2']."', '".$EmployeeId."', '".date("Y-m-d")."')", $con); 
 if($Ins)
 { foreach($_POST['crops'] as $crop){ $Ins2=mysql_query("insert into fa_details_crop(FaId,ItemId) values(".$nMx.",".$crop.")",$con); }
 
   for($i=0;$i<=100;$i++)
   { if($_POST['deal'.$i]>0){ $Ins3=mysql_query("insert into fa_details_dealer(FaId, DealerId) values(".$nMx.", ".$_POST['deal'.$i].")",$con); }  
   }
 }
 if($Ins AND $Ins2 AND $Ins3)
 { 
  if($_POST['FaReqId']>0)
  { $cls=mysql_query("update fa_request set Status=4,Status_Cycle=3 where FareqId=".$_POST['FaReqId'],$con); }
  
  echo '<script>alert("FA request save successfully..");</script>'; 
  header('Location:f_addfa.php?ac=2441&ee=2421&der=true2&c=false&c=false7result=true&are=2347&rt=45&tt=7&uu=%%yy&trht=FTF%%F1&trht=FTF%%F1&tt&opt=0');
 }
  
}

//mode country state hq crops[] dealer[] sdeal rep name email sal expences smode jobstatus doj dob cont1 cont2 status gender married quali bg loc add1 add2 bank accno aadhar dl panno voterid 
//f-photo(jpg) f-updl(pdf,jpg,doc) f-upaadhar(pdf,jpg,doc) f-uppan(pdf,jpg,doc) f-upresume(pdf,doc) f-upvotercard(pdf,jpg,doc) f-upan1(pdf,doc) upan2(pdf,doc)
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> /*background-color:#D9D9FF;background-color:#EEEEEE; */
.CalenderButton {background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px;background-color:#E0DBE3;border-color:#FFFFFF;}
.htf{font-family:Georgia;color:#000;font-weight:bold;text-align:center;font-size:12px;background-color:#97FFFF;}
.htf2{font-family:Georgia;color:#FF80FF;font-weight:bold;font-size:18px;height:24px;}
.tdf{font-family:Georgia;font-size:12px;height:20px;color:#fff;}
.tdfu{font-family:Georgia;font-size:12px;height:20px;color:#000;}
.tdf2{background-color:#FFFFFF;font-family:Georgia;font-size:12px;height:20px;color:#000000;}
.InputSel {font-family:Georgia;font-size:12px;text-align:left; }
.InputType {font-family:Georgia;font-size:12px;text-align:left; }
.InputType2 {font-family:Georgia;font-size:12px;border:hidden;}
.SaveButton {background-image:url(images/save.png);width:18px;height:18px;background-repeat:no-repeat;}
</style>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/><?php /* Calander Open */?>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script><?php /* Calander Close */?>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script language="javascript">
function FunRef(){ window.location="f_addfa.php?ern1=r114&ern2w=234&ern3y=10234&c=false7result=true&are=2347&rt=45&tt=7&uu=%%yy&trht=FTF%%F1&opt="; }

function FunSelOpt(v)
{ window.location="f_addfa.php?ern1=r114&ern2w=234&ern3y=10234&c=false7result=true&are=2347&rt=45&tt=7&uu=%%yy&trht=FTF%%F1&opt="+v; }

function funcountry(v){ var url = 'f_getvalues.php'; var pars = 'cid='+v+'&getv=country'; 
var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: getcountry_show }); } 
function getcountry_show(originalRequest){ document.getElementById('spanstate').innerHTML = originalRequest.responseText; }

function funstate(v){ var url = 'f_getvalues.php'; var pars = 'sid='+v+'&getv=state'; 
var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: getstate_show }); } 
function getstate_show(originalRequest){ document.getElementById('spanhq').innerHTML = originalRequest.responseText; }

function funhq(v){ document.getElementById("HeadQuarter").value=v;
var url = 'f_getvalues.php'; var pars = 'hqid='+v+'&getv=hq'; 
var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: gethq_show }); } 
function gethq_show(originalRequest){ document.getElementById('spanDis').innerHTML = originalRequest.responseText; if(document.getElementById("mode").value==3){funhq2(document.getElementById("hq").value);} 
document.getElementById("repI").value=document.getElementById("repI2").value;
document.getElementById("rep").value=document.getElementById("rep2").value;
}

function funhq2(v){ var url = 'f_getvalues.php'; var pars = 'hqid2='+v+'&getv=hq2'; 
var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: gethq2_show }); } 
function gethq2_show(originalRequest){ document.getElementById('spanDis2').innerHTML = originalRequest.responseText; }

function funsdeal(v){document.getElementById("sdeal").value=v;}

function validate(reqform) 
{
 var Numfilter=/^[0-9. ]+$/; var filter=/^[a-zA-Z. /]+$/;
 var email = reqform.email.value; 
 var EmailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
 var EmailCheck=EmailPattern.test(email);
 var sal = reqform.sal.value; var testns = Numfilter.test(sal);
 var expences = reqform.expences.value; var testne = Numfilter.test(expences);
 var cont1 = reqform.cont1.value; var testnc = Numfilter.test(cont1);
 var cont2 = reqform.cont2.value; var testnc2 = Numfilter.test(cont2);
 var AllowFiles = [".doc", ".docx", ".pdf", ".jpg", ",jpeg"];
 var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + AllowFiles.join('|') + ")$")
 
 for(var k=0;k<=100;k++){document.getElementById("deal"+k).value=0;}
 var x=document.getElementById("dealer");
 for(var i=0; i < x.options.length; i++)
 { if(x.options[i].selected){document.getElementById("deal"+i).value=x.options[i].value;} }
   
 if(document.getElementById("mode").value==0){alert("Please select mode."); return false;} 
 else if(document.getElementById("crops").value==0){alert("Please select crops."); return false;}
 else if(document.getElementById("hq").value==0){alert("Please select head quarter."); return false;}
 else if(document.getElementById("dealer").value==0){alert("Please select distributor."); return false;}
 else if(document.getElementById("mode").value==3 && document.getElementById("sdeal").value==0)
 { alert("Please select salaries distributor."); return false; }
 else if(document.getElementById("name").value==0 || document.getElementById("name").value==''){alert("Please enter FA name."); return false;}
 else if(document.getElementById("email").value!='' && !(EmailCheck)){ alert("You haven't entered in an valid email address!"); return false; }
 else if(document.getElementById("sal").value==0 || document.getElementById("sal").value==''){alert("Please enter expense."); return false;}
 else if(document.getElementById("sal").value!='' && testns==false){alert('please enter only number in the expense field'); return false; }  
 else if(document.getElementById("expences").value==''){alert("Please enter expences."); return false;}
 else if(document.getElementById("expences").value!='' && testne==false){alert('please enter only number in the expences field'); return false; } 
 else if(document.getElementById("smode").value==0){alert("Please select expense mode."); return false;}
 else if(document.getElementById("jobstatus").value==0){alert("Please select job status."); return false;}
 else if(document.getElementById("doj").value==''){alert("Please enter joining date."); return false;}
 else if(document.getElementById("dob").value==''){alert("Please enter birthday date."); return false;}
 else if(document.getElementById("cont1").value!='' && testnc==false){ alert('please enter only number in the contact field'); return false; }
 else if(cont1.length>0 && cont1.length<10){ alert("Please check contact number"); return false; }
 else if(document.getElementById("cont2").value!='' && testnc2==false){alert('please enter only number in the contact field'); return false; }
 else if(cont2.length>0 && cont2.length<10){ alert("Please check contact number"); return false; }
 /*upload file validate*/ 
 else if(document.getElementById("photo").value!='' && (parseFloat(document.getElementById("photo").files[0].size/1024).toFixed(2))>100){ alert("Photo file size <= 100kb"); return false; }
 else if(!regex.test(document.getElementById("photo").value.toLowerCase()) && document.getElementById("photo").value!=''){ alert("Please upload photo file having extensions: <b>" + AllowFiles.join(', ') + "</b> only."); return false; }
 else if(document.getElementById("updl").value!='' && (parseFloat(document.getElementById("updl").files[0].size/1024).toFixed(2))>100){ alert("DL file size <= 100kb"); return false; } 
 else if(!regex.test(document.getElementById("updl").value.toLowerCase()) && document.getElementById("updl").value!=''){ alert("Please upload DL file having extensions: <b>" + AllowFiles.join(', ') + "</b> only."); return false; }
 else if(document.getElementById("upaadhar").value!='' && (parseFloat(document.getElementById("upaadhar").files[0].size/1024).toFixed(2))>100){ alert("Aadhar file size <= 100kb"); return false; }
 else if(!regex.test(document.getElementById("upaadhar").value.toLowerCase()) && document.getElementById("upaadhar").value!=''){ alert("Please upload aadhar file having extensions: <b>" + AllowFiles.join(', ') + "</b> only."); return false; }
 else if(document.getElementById("uppan").value!='' && (parseFloat(document.getElementById("uppan").files[0].size/1024).toFixed(2))>100){ alert("Pan file size <= 100kb"); return false; }
 else if(!regex.test(document.getElementById("uppan").value.toLowerCase())  && document.getElementById("uppan").value!=''){ alert("Please upload pan file having extensions: <b>" + AllowFiles.join(', ') + "</b> only."); return false; }
 else if(document.getElementById("upresume").value!='' && (parseFloat(document.getElementById("upresume").files[0].size/1024).toFixed(2))>500){ alert("Resume file size <= 500kb"); return false; }
 else if(!regex.test(document.getElementById("upresume").value.toLowerCase())  && document.getElementById("upresume").value!=''){ alert("Please upload resume file having extensions: <b>" + AllowFiles.join(', ') + "</b> only."); return false; }
 else if(document.getElementById("upvotercard").value!='' && (parseFloat(document.getElementById("upvotercard").files[0].size/1024).toFixed(2))>100){ alert("Voter card file size <= 100kb"); return false; }
 else if(!regex.test(document.getElementById("upvotercard").value.toLowerCase()) && document.getElementById("upvotercard").value!=''){ alert("Please upload voter card file having extensions: <b>" + AllowFiles.join(', ') + "</b> only."); return false; }
 else if(document.getElementById("upan1").value!='' && (parseFloat(document.getElementById("upan1").files[0].size/1024).toFixed(2))>100){ alert("Any other 1 file size <= 100kb"); return false;}
 else if(!regex.test(document.getElementById("upan1").value.toLowerCase()) && document.getElementById("upan1").value!=''){ alert("Please upload any other 1 file having extensions: <b>" + AllowFiles.join(', ') + "</b> only."); return false; }
 else if(document.getElementById("upan2").value!='' && (parseFloat(document.getElementById("upan2").files[0].size/1024).toFixed(2))>100){ alert("Any other 2 file size <= 100kb").value; return false;}
 else if(!regex.test(document.getElementById("upan2").value.toLowerCase()) && document.getElementById("upan2").value!=''){ alert("Please upload any other 2 file having extensions: <b>" + AllowFiles.join(', ') + "</b> only."); return false; }
/*upload file validate*/
 
 else { var agree=confirm("Are you sure.."); if(agree){return true;}else{return false;} }
}

function funDetail(id)
{ var win = window.open("f_details.php?id="+id,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=750,height=500");}

//ph dl aa pa re vo an1 an2  
//f-photo f-updl f-upaadhar f-uppan f-upresume f-upvotercard f-upan1 upan2
</Script>
</head>
<body class="body">
<input type="hidden" id="st" value="<?php echo $_REQUEST['s']; ?>" />
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
<?php //***************START*****START*****START******START******START***************************?>
<table border="0" style="margin-top:0px;width:100%;height:150px;">	
<tr>
 <td valign="top" style="width:100%;">
 <table border="0" style="width:100%;">
 <tr>
<td style="width:100%;">
 <table border="0" style="width:100%;">
  <tr>
  <td style="width:100%;" valign="top">
   <table style="width:85%;">
    <tr>
	 <td class="htf2" style="width:150px;"><u>Add New FA</u></td>
	 <td><select class="InputSel" style="width:350px;height:22px;" onChange="FunSelOpt(this.value)">
<?php if($_REQUEST['opt']==0){echo '<option value="0" selected>SELECT OPTION FOR ADD NEW FA</option>';} elseif($_REQUEST['opt']==-1){echo '<option value="-1" selected>WITHOUT REQUEST</option>';} elseif($_REQUEST['opt']>0){ 
$s2=mysql_query("select * from fa_request where Status=3 AND FareqId=".$_REQUEST['opt'],$con); $r2=mysql_fetch_assoc($s2);?><option value="<?php echo $r2['FareqId']; ?>">MODE: (<?php if($r2['Mode']==1){echo 'DIRECT(Sales)';}elseif($r2['Mode']==2){echo 'TEAMLEASE';}elseif($r2['Mode']==3){echo 'DISTRIBUTOR';} echo ') - HQ: ('; $hq2=mysql_query("select HqName from hrm_headquater where HqId=".$r2['HqId'],$con); $r2hq=mysql_fetch_assoc($hq2); echo $r2hq['HqName']; echo ') -DEALER: ('; $dis2=mysql_query("select DealerName from fa_request_dealer rd inner join hrm_sales_dealer sd on rd.DealerId=sd.DealerId where FareqId=".$_REQUEST['opt'],$con); $r2dis=mysql_fetch_assoc($dis2); echo strtoupper($r2dis['DealerName']); ?>)</option><?php } ?>

<?php if($_REQUEST['opt']!=0){ ?><option value="0">SELECT OPTION FOR ADD NEW FA</option><?php } ?>
<?php if($_REQUEST['opt']!=-1){ ?><option value="-1">WITHOUT REQUEST</option><?php } ?>
<?php $s=mysql_query("select * from fa_request where Status=3 AND FareqId!=".$_REQUEST['opt']." order by Req_Date ASC",$con); while($r=mysql_fetch_assoc($s)){ ?><option value="<?php echo $r['FareqId']; ?>">MODE: (<?php if($r['Mode']==1){echo 'DIRECT(Sales)';}elseif($r['Mode']==2){echo 'TEAMLEASE';}elseif($r['Mode']==3){echo 'DISTRIBUTOR';} echo ') - HQ: (';$hq=mysql_query("select HqName from hrm_headquater where HqId=".$r['HqId'],$con); $rhq=mysql_fetch_assoc($hq); echo $rhq['HqName']; echo ') -DEALER: ('; $dis=mysql_query("select DealerName,DealerCity from fa_request_dealer rd inner join hrm_sales_dealer sd on rd.DealerId=sd.DealerId where FareqId=".$r['FareqId']." order by DealerName ASC",$con); while($rdis=mysql_fetch_assoc($dis)){ echo strtoupper($rdis['DealerName']).', '; } ?>)</option><?php } ?>
	    </select></td>
	</tr>
   </table>
  </td>
  </tr>
<?php 
if($_REQUEST['opt']>0)
{ 
$sql=mysql_query("select * from fa_request where FareqId=".$_REQUEST['opt'],$con);$res=mysql_fetch_assoc($sql);if($res['Mode']==1){$mode='Direct(Sales Executive)';}elseif($res['Mode']==2){$mode='Teamlease';}elseif($res['Mode']==3){$mode='Distributor';} 
$sc=mysql_query("select CountryName,StateName,HqName,s.CountryId,h.StateId from hrm_headquater h inner join hrm_state s on h.StateId=s.StateId inner join hrm_country c on s.CountryId=c.CountryId where h.HqId=".$res['HqId'], $con); $rc=mysql_fetch_assoc($sc); 
} 
?>  
  <tr>
   <td style="width:75%;" valign="top">
   <table style="width:75%;" border="0">
    
<form method="post" name="reqform" enctype="multipart/form-data" onSubmit="return validate(this)">
<?php if($_REQUEST['opt']<=0){$FReqId=0;}elseif($_REQUEST['opt']>0){$FReqId=$_REQUEST['opt'];} ?>
<input type="hidden" id="FaReqId" name="FaReqId" value="<?php echo $FReqId; ?>" />	
	<tr>
	 <td class="tdf" style="width:100px;">&nbsp;Mode</td>
	 <td class="tdf" style="width:10px;" align="center">:</td>
	 <td style="width:200px;"><select style="width:200px;" class="InputSel" id="mode" name="mode" <?php if($_REQUEST['opt']==0){echo 'disabled';} ?> >
<?php if($_REQUEST['opt']>0){?><option value='<?php echo $res['Mode'];?>' selected><?php echo $mode;?></option>	
<?php } else { ?><option value='0' selected>Select</option><option value='1'>Direct(Sales Executive)</option>
	 <option value='2'>Teamlease</option><option value='3'>Distributor</option><?php } ?></select></td>
	 <td class="tdf" style="width:100px;">&nbsp;Country</td> 
	 <td class="tdf" align="center">:</td><td><select style="width:200px;" class="InputSel" id="country" name="country" onChange="funcountry(this.value)" <?php if($_REQUEST['opt']==0){echo 'disabled';} ?>>
<?php if($_REQUEST['opt']>0){ ?><option value='<?php echo $rc['CountryId'];?>' selected><?php echo ucfirst(strtolower($rc['CountryName']));?></option><?php } else { ?><option value="0">Select</option><?php $sqlc=mysql_query("select * from hrm_country where CountryStatus='A' order by CountryName asc",$con); while($resc=mysql_fetch_assoc($sqlc)){ ?><option value="<?php echo $resc['CountryId']; ?>"><?php echo ucfirst(strtolower($resc['CountryName'])); ?></option><?php }} ?></select></td>
	 <td colspan="3" class="tdf" align="center">&nbsp;</td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;State</td>
	 <td class="tdf" align="center">:</td><td><span id="spanstate">
	 <select style="width:200px;" class="InputSel" id="state" name="state" onChange="funstate(this.value)" <?php if($_REQUEST['opt']==0){echo 'disabled';} ?>>
<?php if($_REQUEST['opt']>0){ ?><option value='<?php echo $rc['StateId'];?>' selected><?php echo ucfirst(strtolower($rc['StateName']));?></option><?php } else { ?><option value="0">Select</option><?php $sqls=mysql_query("select StateId,StateName from hrm_state group by StateName order by StateName ASC",$con); while($ress=mysql_fetch_assoc($sqls)){ ?><option value="<?php echo $ress['StateId']; ?>"><?php echo ucfirst(strtolower($ress['StateName'])); ?></option><?php }} ?></select></span></td>
	 <td class="tdf">&nbsp;HeadQuarter</td>
	 <td class="tdf" style="width:10px;" align="center">:</td>
	 <td style="width:200px;"><span id="spanhq"><select style="width:200px;" class="InputSel" id="hq" name="hq" onChange="funhq(this.value)" <?php if($_REQUEST['opt']==0){echo 'disabled';} ?>>
<?php if($_REQUEST['opt']>0){ ?><option value='<?php echo $res['HqId'];?>' selected><?php echo ucfirst(strtolower($rc['HqName']));?></option><?php } else { ?><option value="0">Select</option><?php $sqlhq2=mysql_query("select * from hrm_headquater group by HqName order by HqName asc",$con); while($reshq2=mysql_fetch_assoc($sqlhq2)){ ?><option value="<?php echo $reshq2['HqId']; ?>"><?php echo ucfirst(strtolower($reshq2['HqName'])); ?></option><?php }}?></select></span><input type="hidden" name="HeadQuarter" id="HeadQuarter" value="<?php if($_REQUEST['opt']>0){ echo $res['HqId']; } else {echo 0;} ?>" /></td>
	 <td colspan="3" class="tdf" align="center">&nbsp;</td>
	</tr>
	
	<tr>
	 <td class="tdf">&nbsp;Crop</td><td class="tdf" align="center">:</td>
	 <td><select style="width:200px;" class="InputSel" id="crops" name="crops[]" required multiple <?php if($_REQUEST['opt']==0){echo 'disabled';} ?>><?php if($_REQUEST['opt']>0){ $crp=mysql_query("select rc.ItemId,ItemName from fa_request_crop rc inner join hrm_sales_seedsitem si on rc.ItemId=si.ItemId where FareqId=".$res['FareqId']." order by ItemName ASC",$con); while($rcrp=mysql_fetch_assoc($crp)){ ?><option value="<?php echo $rcrp['ItemId']; ?>" selected><?php echo $rcrp['ItemName']; ?></option><?php } } else { $qi=mysql_query("select * from hrm_sales_seedsitem order by ItemName ASC",$con); while($ri=mysql_fetch_array($qi)){ ?>
	 <option value="<?php echo $ri['ItemId']; ?>"><?php echo $ri['ItemName']; ?></option><?php } } ?></select></td>
	 <td class="tdf">&nbsp;Distibutor</td>
	 <td class="tdf" align="center">:</td>
	 <td><span id="spanDis"><select style="width:200px;" class="InputSel" id="dealer" name="dealer[]" required multiple <?php if($_REQUEST['opt']==0){echo 'disabled';} ?>><?php if($_REQUEST['opt']>0){ $dis=mysql_query("select rd.DealerId,DealerName,DealerCity from fa_request_dealer rd inner join hrm_sales_dealer sd on rd.DealerId=sd.DealerId where FareqId=".$res['FareqId']." order by DealerName ASC",$con); while($rdis=mysql_fetch_assoc($dis)){ ?><option value="<?php echo $rdis['DealerId']; ?>" selected><?php echo ucfirst(strtolower($rdis['DealerName'])).' - '.strtoupper($rdis['DealerCity']); ?></option><?php } } ?></select></span><?php for($i=0;$i<=100;$i++){ echo '<input type="hidden" name="deal'.$i.'" id="deal'.$i.'" value="0" style="width:50px;"/>'; } ?></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Expen_Distributor</td>
	 <td class="tdf" align="center">:</td> 
	 <td><span id="spanDis2"><select style="width:200px;" class="InputSel" id="sdealer" name="sdealer" <?php if($_REQUEST['opt']==0){echo 'disabled';} ?>><?php if($_REQUEST['opt']>0){ $dis2=mysql_query("select DealerName,DealerCity from hrm_sales_dealer where DealerId=".$res['Sal_DealerId'],$con); $rdis2=mysql_fetch_assoc($dis2); ?><option value="<?php echo $res['Sal_DealerId']; ?>"><?php echo ucfirst(strtolower($rdis2['DealerName'])).' - '.strtoupper($rdis2['DealerCity']); ?></option><?php } else { ?><option value='0'>Select</option><?php } ?></select></span><input type="hidden" name="sdeal" id="sdeal" value="<?php if($_REQUEST['opt']>0){ echo $res['Sal_DealerId'];}else{echo 0;} ?>" /></td>
	 <td class="tdf">&nbsp;Reporting</td>
	 <td class="tdf" align="center">:</td><td><input style="width:200px;" class="InputType" id="rep" name="rep" readonly value="<?php if($_REQUEST['opt']>0){ $e=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['Reporting'],$con); $re=mysql_fetch_assoc($e); echo ucfirst(strtolower($re['Fname'].' '.$re['Sname'].' '.$re['Lname'])); } ?>"/><input type="hidden" name="repI" id="repI" value="0" /></td>
	 
	 <td rowspan="12" colspan="3" valign="top">
	 <table border="0" cellpadding="1" cellspacing="0" style="width:340px;background-color:#FFFFFF;">
	  <tr><td colspan="3" class="htf2" style="height:40px;" align="center" valign="middle" bgcolor="#FFFF80">Upload File</td></tr>	  
	  <tr>
	   <td class="tdfu" style="width:80px;">&nbsp;Photo</td>
	   <td class="tdfu" style="width:10px;" align="center">:</td>
	   <td style="width:200px;"><input type="file" class="InputSel" id="photo" name="photo" readonly onClick="photoSz()"></td>
	  </tr>
	  <tr>
	   <td class="tdfu">&nbsp;Driv Lic</td>
	   <td class="tdfu" style="width:10px;" align="center">:</td>
	   <td><input type="file" class="InputSel" id="updl" name="updl" readonly></td>
	  </tr>
	  <tr>
	   <td class="tdfu">&nbsp;Aadhar</td>
	   <td class="tdfu" style="width:10px;" align="center">:</td>
	   <td><input type="file" class="InputSel" id="upaadhar" name="upaadhar" readonly></td>
	  </tr>
	  <tr>
	   <td class="tdfu">&nbsp;Pan No</td>
	   <td class="tdfu" style="width:10px;" align="center">:</td>
	   <td><input type="file" class="InputSel" id="uppan" name="uppan" readonly></td>
	  </tr>
	  <tr>
	   <td class="tdfu">&nbsp;Resume</td>
	   <td class="tdfu" style="width:10px;" align="center">:</td>
	   <td><input type="file" class="InputSel" id="upresume" name="uprsume" readonly></td>
	  </tr>
	  <tr>
	   <td class="tdfu">&nbsp;Voter Card</td>
	   <td class="tdfu" style="width:10px;" align="center">:</td>
	   <td><input type="file" class="InputSel" id="upvotercard" name="upvotercard" readonly></td>
	  </tr>
	  <tr>
	   <td class="tdfu">&nbsp;Any Other</td>
	   <td class="tdfu" style="width:10px;" align="center">:</td>
	   <td><input type="file" class="InputSel" id="upan1" name="upan1" readonly></td>
	  </tr>
	  <tr>
	   <td class="tdfu">&nbsp;Any Other</td>
	   <td class="tdfu" style="width:10px;" align="center">:</td>
	   <td><input type="file" class="InputSel" id="upan2" name="upan2" readonly></td>
	  </tr>
	 </table>
	 </td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Fa Name</td>
	 <td class="tdf" align="center">:</td><td><input style="width:200px;" class="InputType" id="name" name="name" maxlength="50" <?php if($_REQUEST['opt']==0){echo 'readonly';} ?>/></td>
	 <td class="tdf">&nbsp;Email-Id</td>
	 <td class="tdf" align="center">:</td><td><input style="width:200px;" class="InputType" id="email" name="email" maxlength="50" <?php if($_REQUEST['opt']==0){echo 'readonly';} ?>/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Expense</td>
	 <td class="tdf" align="center">:</td><td><input class="InputType" style="width:120px;text-align:right;" id="sal" name="sal" maxlength="10" <?php if($_REQUEST['opt']==0){echo 'readonly';} ?> value="<?php if($_REQUEST['opt']>0){ echo floatval($res['Salary']); } ?>" value="0"/></td>
	 <td class="tdf">&nbsp;<?php //Expences ?></td>
	 <td class="tdf" align="center">:</td><td><input type="hidden" style="width:120px;text-align:right;" class="InputType" id="expences" name="expences" maxlength="10" <?php if($_REQUEST['opt']==0){echo 'readonly';} ?> value="0"/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Expen. Mode</td>
	 <td class="tdf" align="center">:</td>
	 <td><select style="width:120px;" class="InputSel" id="smode" name="smode" <?php if($_REQUEST['opt']==0){echo 'disabled';} ?>>
	 <option value='0' selected>Select</option><option value='Fixed'>Fixed</option>
	 <option value='Variable'>Variable</option></select></td>
	 <td class="tdf">&nbsp;Job Status</td> 
	 <td class="tdf" align="center">:</td><td><select style="width:120px;" class="InputSel" id="jobstatus" name="jobstatus" <?php if($_REQUEST['opt']==0){echo 'disabled';} ?>><option value="0">Select</option><option value="Temporary">Temporary</option><option value="Permanent">Permanent</option></select></td>
	</tr> 
	<tr>
	 <td class="tdf">&nbsp;DOJ</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;text-align:center;" class="InputType" id="doj" name="doj" maxlength="50" readonly/><button id="f_btn1" class="CalenderButton"></button><script type="text/javascript">var cal = Calendar.setup({ onSelect: function(cal) { cal.hide()}, showTime: true }); cal.manageFields("f_btn1", "doj", "%d-%m-%Y");</script></td>
	 <td class="tdf">&nbsp;DOB</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;text-align:center;" class="InputType" id="dob" name="dob" maxlength="50" readonly/><button id="f_btn2" class="CalenderButton"></button><script type="text/javascript">var cal = Calendar.setup({ onSelect: function(cal) { cal.hide()}, showTime: true }); cal.manageFields("f_btn2", "dob", "%d-%m-%Y");</script></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;ContactNo-1</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;text-align:right;" class="InputType" id="cont1" name="cont1" maxlength="10" <?php if($_REQUEST['opt']==0){echo 'readonly';} ?>/></td>
	 <td class="tdf">&nbsp;ContactNo-2</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;text-align:right;" class="InputType" id="cont2" name="cont2" maxlength="10" <?php if($_REQUEST['opt']==0){echo 'readonly';} ?>/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;FA Status</td>
	 <td class="tdf" align="center">:</td>
	 <td><select style="width:120px;" class="InputSel" id="status" name="status" <?php if($_REQUEST['opt']==0){echo 'disabled';} ?>>
	 <option value='A' selected>Active</option><option value='D'>De-active</option></select></td>
	 <td class="tdf">&nbsp;Gender</td> 
	 <td class="tdf" align="center">:</td><td><select style="width:120px;" class="InputSel" id="gender" name="gender" <?php if($_REQUEST['opt']==0){echo 'disabled';} ?>><option value="M" selected>Male</option><option value="F">Female</option></select></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Married</td>
	 <td class="tdf" align="center">:</td>
	 <td><select style="width:120px;" class="InputSel" id="married" name="married" <?php if($_REQUEST['opt']==0){echo 'disabled';} ?>>
	 <option value='N' selected>No</option><option value='Y'>Yes</option></select></td>
	 <td class="tdf">&nbsp;Qualification</td> 
	 <td class="tdf" align="center">:</td><td><select style="width:120px;" class="InputSel" id="quali" name="quali" <?php if($_REQUEST['opt']==0){echo 'disabled';} ?>><option value="High School">High School</option><option value="Higher Secondary">Higher Secondary</option><option value="Graduate">Graduate</option><option value="Post Graduate" selected>Post Graduate</option></select></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Blood Group</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;" class="InputType" id="bg" name="bg" maxlength="10" <?php if($_REQUEST['opt']==0){echo 'readonly';} ?>/></td>
	 <td class="tdf">&nbsp;Location</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;" class="InputType" id="loc" name="loc" maxlength="30" <?php if($_REQUEST['opt']==0){echo 'readonly';} ?>/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Address-1</td>
	 <td class="tdf" align="center">:</td><td><input style="width:200px;" class="InputType" id="add1" name="add1" maxlength="100" placeholder="street/ house No" <?php if($_REQUEST['opt']==0){echo 'readonly';} ?>/></td>
	 <td class="tdf">&nbsp;Address-2</td>
	 <td class="tdf" align="center">:</td><td><input style="width:200px;" class="InputType" id="add2" name="add2" maxlength="100" placeholder="village/ city/ pin-no" <?php if($_REQUEST['opt']==0){echo 'readonly';} ?>/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Bank/Branch</td>
	 <td class="tdf" align="center">:</td><td><input style="width:200px;" class="InputType" id="bank" name="bank" maxlength="50" placeholder="" <?php if($_REQUEST['opt']==0){echo 'readonly';} ?>/></td>
	 <td class="tdf">&nbsp;Account No</td>
	 <td class="tdf" align="center">:</td><td><input style="width:200px;" class="InputType" id="accno" name="accno" maxlength="20" placeholder="" <?php if($_REQUEST['opt']==0){echo 'readonly';} ?>/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Aadhar No</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;;" class="InputType" id="aadhar" name="aadhar" maxlength="15" <?php if($_REQUEST['opt']==0){echo 'readonly';} ?>/></td>
	 <td class="tdf">&nbsp;Driv. LicNo</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;;" class="InputType" id="dl" name="dl" maxlength="20" <?php if($_REQUEST['opt']==0){echo 'readonly';} ?>/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Pan No</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;;" class="InputType" id="panno" name="panno" maxlength="15" <?php if($_REQUEST['opt']==0){echo 'readonly';} ?>/></td>
	 <td class="tdf">&nbsp;VoterId</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;;" class="InputType" id="voterid" name="voterid" maxlength="20" <?php if($_REQUEST['opt']==0){echo 'readonly';} ?>/></td>
	</tr> 
	<tr>
	 <td colspan="10" align="right" style="background-color:#FFFF80;">
	  <table cellpadding="0" cellspacing="0">
	   <tr>
	    <td><input type="button" id="btnrefresh" style="width:80px;" onClick="javascript:window.location='f_addfa.php?ac=2441&ee=2421&der=true2&c=false&c=false7result=true&are=2347&rt=45&tt=7&uu=%%yy&trht=FTF%%F1&trht=FTF%%F1&tt&opt=0'" value="refresh" /></td>
		<td><input type="submit" id="btnsave" name="btnsave" style="width:80px;" value="save" <?php if($_REQUEST['opt']==0){echo 'disabled';} ?>/></td>
	   </tr>
	  </table>
	 </td>
	</tr>
</form>	
   </table>
  </td>  
  </tr>
 </table>
</td>  
  </tr>
<tr><td class="htf2">&nbsp;Recently Added FA</td></tr>
<tr>
 <td>
 <table border="0" cellpadding="0" cellspacing="1">
    <tr style="height:22px;">
      <td style="width:30px;" class="htf">&nbsp;Sn&nbsp;</td>
      <td style="width:200px;" class="htf">Name</td>
	  <td style="width:150px;" class="htf">Mode</td>
	  <td style="width:100px;" class="htf">HQ</td>
	  <td style="width:120px;" class="htf">State</td>
	  <td style="width:60px;" class="htf">Expense</td>
	  <td style="width:150px;" class="htf">Crop</td>
	  <td style="width:150px;" class="htf">Distributor</td>
	  <td style="width:80px;" class="htf">DOJ</td>
	</tr>
<?php $sql=mysql_query("select * from fa_details where FaStatus='A' order by FaId DESC LIMIT 0,5",$con); 
      $sn=1; while($res=mysql_fetch_array($sql)){ ?>
    <tr style="height:22px;">
      <td class="tdf2" align="center"><?php echo $sn; ?></td>
      <td class="tdf2">&nbsp;<span style="cursor:pointer;color:#0079F2;" onClick="funDetail(<?php echo $res['FaId']; ?>)"><u><?php echo $res['FaName']; ?></u></span></td>
	  <td class="tdf2">&nbsp;<?php if($res['Mode']==1){echo 'Direct(Sales Executive)';}elseif($res['Mode']==2){echo 'Teamlease';}elseif($res['Mode']==3){echo 'Distributor';}?></td>
	  <td class="tdf2">&nbsp;<?php $hq=mysql_query("select HqName,StateName from hrm_headquater hq inner join hrm_state st on hq.StateId=st.StateId where hq.HqId=".$res['HqId'],$con); $rhq=mysql_fetch_assoc($hq); echo ucfirst(strtolower($rhq['HqName'])); ?></td>
	  <td class="tdf2">&nbsp;<?php echo $rhq['StateName']; ?></td>
	  <td class="tdf2" align="right"><?php echo floatval($res['Salary']+$res['Expences']); ?>&nbsp;</td>
	  <td class="tdf2"><input class="InputType" style="width:150px;" value="<?php $crp=mysql_query("select ItemName from fa_details_crop rc inner join hrm_sales_seedsitem si on rc.ItemId=si.ItemId where FaId=".$res['FaId']." order by ItemName ASC",$con); while($rcrp=mysql_fetch_assoc($crp)){ echo ucfirst(strtolower($rcrp['ItemName'])).', '; } ?>" /></td>
	  <td class="tdf2"><input class="InputType" style="width:150px;" value="<?php $dis=mysql_query("select DealerName from fa_details_dealer rd inner join hrm_sales_dealer sd on rd.DealerId=sd.DealerId where FaId=".$res['FaId']." order by DealerName ASC",$con); while($rdis=mysql_fetch_assoc($dis)){ echo ucfirst(strtolower($rdis['DealerName'])).', '; } ?>" /></td>
	  <td class="tdf2" align="center"><?php echo date("d-m-Y",strtotime($res['DOJ'])); ?></td>
	</tr>
<?php $sn++; } ?>	

 </table>
 </td>
</tr>  
 </table>
 </td>
</tr>
</table>	

<?php //*****************END*****END*****END******END******END**************************?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>
