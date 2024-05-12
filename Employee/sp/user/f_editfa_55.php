<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}

if(isset($_POST['btnedit']))
{ 
  $nMx=$_POST['FaId'];
   
  if((!empty($_FILES["photo"])) && ($_FILES['photo']['error']==0))
  { $photoN=strtolower(basename($_FILES['photo']['name']));
    $photoExt=substr($photoN, strrpos($photoN, '.') + 1);
	$photoName='photo'.$nMx.'.'.$photoExt;
	$photoPath='f_fafile/'.$photoName;
    move_uploaded_file($_FILES["photo"]["tmp_name"],$photoPath);
  } elseif($_POST["photo2"]!=''){$photoName=$_POST["photo2"];}else{$photoName='';}
  
  if((!empty($_FILES["updl"])) && ($_FILES['updl']['error']==0))
  { $dlN=strtolower(basename($_FILES['updl']['name']));
    $dlExt=substr($dlN, strrpos($dlN, '.') + 1);
	$dlName='dl'.$nMx.'.'.$dlExt;
	$dlPath='f_fafile/'.$dlName;
    move_uploaded_file($_FILES["updl"]["tmp_name"],$dlPath);
  } elseif($_POST["updl2"]!=''){$dlName=$_POST["updl2"];}else{$dlName='';}
  
  if((!empty($_FILES["upaadhar"])) && ($_FILES['upaadhar']['error']==0))
  { $aadharN=strtolower(basename($_FILES['upaadhar']['name']));
    $aadharExt=substr($aadharN, strrpos($aadharN, '.') + 1);
	$aadharName='aadhar'.$nMx.'.'.$aadharExt;
	$aadharPath='f_fafile/'.$aadharName;
    move_uploaded_file($_FILES["upaadhar"]["tmp_name"],$aadharPath);
  } elseif($_POST["upaadhar2"]!=''){$aadharName=$_POST["upaadhar2"];}else{$aadharName='';}
  
  if((!empty($_FILES["uppan"])) && ($_FILES['uppan']['error']==0))
  { $panN=strtolower(basename($_FILES['uppan']['name']));
    $panExt=substr($panN, strrpos($panN, '.') + 1);
	$panName='pan'.$nMx.'.'.$panExt;
	$panPath='f_fafile/'.$panName;
    move_uploaded_file($_FILES["uppan"]["tmp_name"],$panPath);
  } elseif($_POST["uppan2"]!=''){$panName=$_POST["uppan2"];}else{$panName='';}
  
  if((!empty($_FILES["upresume"])) && ($_FILES['upresume']['error']==0))
  { $resumeN=strtolower(basename($_FILES['upresume']['name']));
    $resumeExt=substr($resumeN, strrpos($resumeN, '.') + 1);
	$resumeName='pan'.$nMx.'.'.$resumeExt;
	$resumePath='f_fafile/'.$resumeName;
    move_uploaded_file($_FILES["upresume"]["tmp_name"],$resumePath);
  } elseif($_POST["upresume2"]!=''){$resumeName=$_POST["upresume2"];}else{$resumeName='';}
  
  if((!empty($_FILES["upvotercard"])) && ($_FILES['upvotercard']['error']==0))
  { $voterN=strtolower(basename($_FILES['upvotercard']['name']));
    $voterExt=substr($voterN, strrpos($voterN, '.') + 1);
	$voterName='pan'.$nMx.'.'.$voterExt;
	$voterPath='f_fafile/'.$voterName;
    move_uploaded_file($_FILES["upvotercard"]["tmp_name"],$voterPath);
  } elseif($_POST["upvotercard2"]!=''){$voterName=$_POST["upvotercard2"];}else{$voterName='';}
  
  if((!empty($_FILES["upan1"])) && ($_FILES['upan1']['error']==0))
  { $an1N=strtolower(basename($_FILES['upan1']['name']));
    $an1Ext=substr($an1N, strrpos($an1N, '.') + 1);
	$an1Name='pan'.$nMx.'.'.$an1Ext;
	$an1Path='f_fafile/'.$an1Name;
    move_uploaded_file($_FILES["upan1"]["tmp_name"],$an1Path);
  } elseif($_POST["upan12"]!=''){$an1Name=$_POST["upan12"];}else{$an1Name='';}
  
  if((!empty($_FILES["upan2"])) && ($_FILES['upan2']['error']==0))
  { $an2N=strtolower(basename($_FILES['upan2']['name']));
    $an2Ext=substr($an2N, strrpos($an2N, '.') + 1);
	$an2Name='pan'.$nMx.'.'.$an2Ext;
	$an2Path='f_fafile/'.$an2Name;
    move_uploaded_file($_FILES["upan2"]["tmp_name"],$an2Path);
  } elseif($_POST["upan22"]!=''){$an2Name=$_POST["upan22"];}else{$an2Name='';}

  if($_POST['cont1']>0){$cont1=$_POST['cont1'];}else{$cont1=0;}
  if($_POST['cont2']>0){$cont2=$_POST['cont2'];}else{$cont2=0;} 
  
  //echo $_POST['mode2e'].'!='.$_POST['mode'].' OR '.$_POST['sdealer2r'].'!='.$_POST['sdealer'].' OR '.$_POST['rep2p'].'!='.$_POST['repI'].' OR '.$_POST['sal2l'].'!='.$_POST['sal'].' OR '.$_POST['ohq2q'].'!='.$_POST['ohq'].' OR '.$_POST['smode2e'].'!='.$_POST['smode'].' OR '.$_POST['jobstatus2s'].'!='.$_POST['jobstatus'];
  
  if($_POST['mode2e']!=$_POST['mode'] OR $_POST['sdealer2r']!=$_POST['sdealer'] OR $_POST['rep2p']!=$_POST['repI'] OR $_POST['sal2l']!=$_POST['sal'] OR $_POST['ohq2q']!=$_POST['ohq'] OR $_POST['smode2e']!=$_POST['smode'] OR $_POST['jobstatus2s']!=$_POST['jobstatus'])
  { 
    $s2=mysql_query("select * from fa_details_up where FaId=".$_POST['FaId'],$con); $r2=mysql_num_rows($s2);
	if($r2==0){$fD=$_POST['DateDoj'];}else{$fD=$_POST['CreatedDate'];}
    $sel=mysql_query("select * from fa_details_up where FaId=".$_POST['FaId']." AND Tdate='".$_POST['ToDate']."'",$con); $rel=mysql_num_rows($sel); 
	if($rel>0){$u=mysql_query("update fa_details_up set Mode=".$_POST['mode'].", Sal_DealerId=".$_POST['sdealer'].", Reporting=".$_POST['repI'].", Salary='".$_POST['sal']."', OtherHq='".$_POST['ohq']."', SalaryMode='".$_POST['smode']."', JobStatus='".$_POST['jobstatus']."', CrBy=".$EmployeeId."  where FaId=".$_POST['FaId']." AND Tdate='".$_POST['ToDate']."'",$con);}
	else{ $u=mysql_query("insert into fa_details_up(FaId, Mode, Sal_DealerId, Reporting, Salary, OtherHq, SalaryMode, JobStatus, Fdate, Tdate, CrBy) value(".$_POST['FaId'].", ".$_POST['mode'].", ".$_POST['sdealer'].", ".$_POST['repI'].", '".$_POST['sal']."', '".$_POST['ohq']."', '".$_POST['smode']."', '".$_POST['jobstatus']."', '".$fD."', '".$_POST['ToDate']."', ".$EmployeeId.")",$con); }
  }
  
  $Up=mysql_query("update fa_details set Mode=".$_POST['mode'].", Sal_DealerId=".$_POST['sdeal'].", HqId=".$_POST['HeadQuarter'].", OtherHq='".$_POST['ohq']."', tl=".$_POST['tl'].", Reporting=".$_POST['repI'].", FaName='".$_POST['name']."', FaStatus='".$_POST['status']."', Salary='".$_POST['sal']."', Expences='".$_POST['expences']."', DOJ='".date("Y-m-d",strtotime($_POST['doj']))."', JobStatus='".$_POST['jobstatus']."', SalaryMode='".$_POST['smode']."', ContactNo=".$cont1.", Contact2No=".$cont2.", AadharNo='".$_POST['aadhar']."', DrivLic='".$_POST['dl']."', PanNo='".$_POST['panno']."', VoterId='".$_POST['voterid']."', DOB='".date("Y-m-d",strtotime($_POST['dob']))."', Gender='".$_POST['gender']."', Married='".$_POST['married']."', Qualif='".$_POST['quali']."', BloodGroup='".$_POST['bg']."', EmailId='".$_POST['email']."', BankName='".$_POST['bank']."', AccountNo='".$_POST['accno']."', Location='".$_POST['loc']."', Upld_pic='".$photoName."', Upld_dl='".$dlName."', Upld_pan='".$panName."', Upld_aadhar='".$aadharName."', Upld_resume='".$resumeName."', Upld_voterId='".$voterName."', Upld_other1='".$an1Name."', Upld_other2='".$an2Name."', Address1='".$_POST['add1']."', Address2='".$_POST['add2']."', LWD='".date("Y-m-d",strtotime($_POST['lwd']))."', CreatedBy='".$EmployeeId."', CreatedDate='".date("Y-m-d")."' where FaId=".$_POST['FaId'],$con);
 
   
  if($Up)
  { 
   $del=mysql_query("delete from fa_details_crop where FaId=".$_POST['FaId'],$con);
   $del2=mysql_query("delete from fa_details_dealer where FaId=".$_POST['FaId'],$con);
   foreach($_POST['crops'] as $crop)
   { //$chk=mysql_query("select * from fa_details_crop where FaId=".$_POST['FaId']." AND ItemId=".$crop,$con);
     //$row=mysql_num_rows($chk);if($row==0){ }
	 $Ins2=mysql_query("insert into fa_details_crop(FaId,ItemId) values(".$nMx.",".$crop.")",$con); 
   }
   for($i=0;$i<=100;$i++)
   { if($_POST['deal'.$i]>0)
     { $Ins3=mysql_query("insert into fa_details_dealer(FaId, DealerId) values(".$nMx.", ".$_POST['deal'.$i].")",$con); }  
   }
 
  $msg="FA request update successfully.."; 
   //header('Location:f_editfa.php?ac=2441&tt=7&uu=%%yy&trht=FTF%%F1&trht=FTF%%F1&tt&opt='.$_POST['FaId']);  
  }
  
}

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

/*
document.getElementById("repI").value=document.getElementById("repI2").value;
document.getElementById("rep").value=document.getElementById("rep2").value;
document.getElementById("tl").value=document.getElementById("tl2").value;
*/
funhq3(document.getElementById("hq").value);
}

function funhq2(v){ var url = 'f_getvalues.php'; var pars = 'hqid2='+v+'&getv=hq2'; 
var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: gethq2_show }); } 
function gethq2_show(originalRequest){ document.getElementById('spanDis2').innerHTML = originalRequest.responseText; }

function funhq3(v){ var url = 'f_getvalues.php'; var pars = 'hqid3='+v+'&getv=hq3'; 
var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: gethq3_show }); } 
function gethq3_show(originalRequest){ document.getElementById('spanRep').innerHTML = originalRequest.responseText; }

function funsRep(ri){ document.getElementById('repI').value=ri;}
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
 else if(document.getElementById("mode").value!=2 && document.getElementById("dealer").value==0){alert("Please select distributor."); return false;}
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
 else if(document.getElementById("photo").value!='' && (parseFloat(document.getElementById("photo").files[0].size/1024).toFixed(2))>200){ alert("Photo file size <= 200kb"); return false; }
 else if(!regex.test(document.getElementById("photo").value.toLowerCase()) && document.getElementById("photo").value!=''){ alert("Please upload photo file having extensions: <b>" + AllowFiles.join(', ') + "</b> only."); return false; }
 else if(document.getElementById("updl").value!='' && (parseFloat(document.getElementById("updl").files[0].size/1024).toFixed(2))>200){ alert("DL file size <= 200kb"); return false; } 
 else if(!regex.test(document.getElementById("updl").value.toLowerCase()) && document.getElementById("updl").value!=''){ alert("Please upload DL file having extensions: <b>" + AllowFiles.join(', ') + "</b> only."); return false; }
 else if(document.getElementById("upaadhar").value!='' && (parseFloat(document.getElementById("upaadhar").files[0].size/1024).toFixed(2))>200){ alert("Aadhar file size <= 200kb"); return false; }
 else if(!regex.test(document.getElementById("upaadhar").value.toLowerCase()) && document.getElementById("upaadhar").value!=''){ alert("Please upload aadhar file having extensions: <b>" + AllowFiles.join(', ') + "</b> only."); return false; }
 else if(document.getElementById("uppan").value!='' && (parseFloat(document.getElementById("uppan").files[0].size/1024).toFixed(2))>200){ alert("Pan file size <= 200kb"); return false; }
 else if(!regex.test(document.getElementById("uppan").value.toLowerCase())  && document.getElementById("uppan").value!=''){ alert("Please upload pan file having extensions: <b>" + AllowFiles.join(', ') + "</b> only."); return false; }
 else if(document.getElementById("upresume").value!='' && (parseFloat(document.getElementById("upresume").files[0].size/1024).toFixed(2))>500){ alert("Resume file size <= 500kb"); return false; }
 else if(!regex.test(document.getElementById("upresume").value.toLowerCase())  && document.getElementById("upresume").value!=''){ alert("Please upload resume file having extensions: <b>" + AllowFiles.join(', ') + "</b> only."); return false; }
 else if(document.getElementById("upvotercard").value!='' && (parseFloat(document.getElementById("upvotercard").files[0].size/1024).toFixed(2))>200){ alert("Voter card file size <= 200kb"); return false; }
 else if(!regex.test(document.getElementById("upvotercard").value.toLowerCase()) && document.getElementById("upvotercard").value!=''){ alert("Please upload voter card file having extensions: <b>" + AllowFiles.join(', ') + "</b> only."); return false; }
 else if(document.getElementById("upan1").value!='' && (parseFloat(document.getElementById("upan1").files[0].size/1024).toFixed(2))>200){ alert("Any other 1 file size <= 200kb"); return false;}
 else if(!regex.test(document.getElementById("upan1").value.toLowerCase()) && document.getElementById("upan1").value!=''){ alert("Please upload any other 1 file having extensions: <b>" + AllowFiles.join(', ') + "</b> only."); return false; }
 else if(document.getElementById("upan2").value!='' && (parseFloat(document.getElementById("upan2").files[0].size/1024).toFixed(2))>200){ alert("Any other 2 file size <= 200kb").value; return false;}
 else if(!regex.test(document.getElementById("upan2").value.toLowerCase()) && document.getElementById("upan2").value!=''){ alert("Please upload any other 2 file having extensions: <b>" + AllowFiles.join(', ') + "</b> only."); return false; }
/*upload file validate*/
 
 else { var agree=confirm("Are you sure.."); if(agree){return true;}else{return false;} }
}

function fundocDetail(v,fid)
{ var win = window.open("f_docdetails.php?fid="+fid+"&v="+v,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=750,height=600");}

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
    <tr><td class="htf2" style="width:150px;"><u>Edit FA</u></td></tr>
   </table>
  </td>
  </tr>
<?php 
if($_REQUEST['opt']>0)
{ 
$sql=mysql_query("select * from fa_details where FaId=".$_REQUEST['opt'],$con);$res=mysql_fetch_assoc($sql);if($res['Mode']==1){$mode='Direct(Sales Executive)';}elseif($res['Mode']==2){$mode='Teamlease';}elseif($res['Mode']==3){$mode='Distributor';} 
$sc=mysql_query("select CountryName,StateName,HqName,s.CountryId,h.StateId from hrm_headquater h inner join hrm_state s on h.StateId=s.StateId inner join hrm_country c on s.CountryId=c.CountryId where h.HqId=".$res['HqId'], $con); $rc=mysql_fetch_assoc($sc); 
} 
?>  
  <tr>
   <td style="width:75%;" valign="top">
   <table style="width:75%;" border="0">
    
<form method="post" name="reqform" enctype="multipart/form-data" onSubmit="return validate(this)">
<?php if($_REQUEST['opt']>0){$FaId=$_REQUEST['opt'];}else{$FaId=0;} ?>
<input type="hidden" id="FaId" name="FaId" value="<?php echo $FaId; ?>" />	
<input type="hidden" name="mode2e" name="mode2e" value="<?php echo $res['Mode'];?>" />
<input type="hidden" id="sdealer2r" name="sdealer2r" value="<?php echo $res['Sal_DealerId'];?>" />
<input type="hidden" id="rep2p" name="rep2p" value="<?php echo $res['Reporting'];?>" />
<input type="hidden" id="sal2l" name="sal2l" value="<?php if($_REQUEST['opt']>0){ echo floatval($res['Salary']); }else{echo 0;} ?>" />
<input type="hidden" id="ohq2q" name="ohq2q" value="<?php echo $res['OtherHq']; ?>" />
<input type="hidden" id="smode2e" name="smode2e" value="<?php echo $res['SalaryMode'];?>" />
<input type="hidden" id="jobstatus2s" name="jobstatus2s" value="<?php echo $res['JobStatus'];?>" />
<input type="hidden" id="CreatedDate" name="CreatedDate" value="<?php echo $res['CreatedDate'];?>" />
<input type="hidden" id="DateDoj" name="DateDoj" value="<?php echo $res['DOJ'];?>" />
<input type="hidden" id="ToDate" name="ToDate" value="<?php echo date("Y-m-d",strtotime('-1 day'));?>" />
	<tr>
	 <td class="tdf" style="width:100px;">&nbsp;Mode</td>
	 <td class="tdf" style="width:10px;" align="center">:</td>
	 <td style="width:200px;"><select style="width:200px;" class="InputSel" id="mode" name="mode" <?php if($_REQUEST['opt']==0){echo 'disabled';} ?> >
<?php if($_REQUEST['opt']>0){?><option value='<?php echo $res['Mode'];?>' selected><?php echo $mode;?></option>	
<?php } else { ?><option value='0' selected>Select</option><?php } ?>
<?php if($res['Mode']!=1){?><option value='1'>Direct(Sales Executive)</option><?php } ?>
<?php if($res['Mode']!=2){?><option value='2'>Teamlease</option><?php } ?>
<?php if($res['Mode']!=3){?><option value='3'>Distributor</option><?php } ?>
</select></td>
	 <td class="tdf" style="width:100px;">&nbsp;Country</td> 
	 <td class="tdf" align="center">:</td><td><select style="width:200px;" class="InputSel" id="country" name="country" onChange="funcountry(this.value)" <?php if($_REQUEST['opt']==0){echo 'disabled';} ?>>
<?php if($_REQUEST['opt']>0){ ?><option value='<?php echo $rc['CountryId'];?>' selected><?php echo ucfirst(strtolower($rc['CountryName']));?></option><?php } else { ?><option value="0">Select</option><?php } $sqlc=mysql_query("select * from hrm_country where CountryStatus='A' order by CountryName asc",$con); while($resc=mysql_fetch_assoc($sqlc)){ ?><option value="<?php echo $resc['CountryId']; ?>"><?php echo ucfirst(strtolower($resc['CountryName'])); ?></option><?php } ?></select></td>
	 <td colspan="3" class="tdf" align="center">&nbsp;</td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;State</td>
	 <td class="tdf" align="center">:</td><td><span id="spanstate">
	 <select style="width:200px;" class="InputSel" id="state" name="state" onChange="funstate(this.value)" <?php if($_REQUEST['opt']==0){echo 'disabled';} ?>>
<?php if($_REQUEST['opt']>0){ ?><option value='<?php echo $rc['StateId'];?>' selected><?php echo ucfirst(strtolower($rc['StateName']));?></option><?php } else { ?><option value="0">Select</option><?php } $sqls=mysql_query("select StateId,StateName from hrm_state group by StateName order by StateName ASC",$con); while($ress=mysql_fetch_assoc($sqls)){ ?><option value="<?php echo $ress['StateId']; ?>"><?php echo ucfirst(strtolower($ress['StateName'])); ?></option><?php } ?></select></span></td>
	 <td class="tdf">&nbsp;HeadQuarter</td>
	 <td class="tdf" style="width:10px;" align="center">:</td>
	 <td style="width:200px;"><span id="spanhq"><select style="width:200px;" class="InputSel" id="hq" name="hq" onChange="funhq(this.value)" <?php if($_REQUEST['opt']==0){echo 'disabled';} ?>>
<?php if($_REQUEST['opt']>0){ ?><option value='<?php echo $res['HqId'];?>' selected><?php echo ucfirst(strtolower($rc['HqName']));?></option><?php } else { ?><option value="0">Select</option><?php } $sqlhq2=mysql_query("select * from hrm_headquater order by HqName asc",$con); while($reshq2=mysql_fetch_assoc($sqlhq2)){ ?><option value="<?php echo $reshq2['HqId']; ?>"><?php echo ucfirst(strtolower($reshq2['HqName'])); ?></option><?php }?></select></span><input type="hidden" name="HeadQuarter" id="HeadQuarter" value="<?php if($_REQUEST['opt']>0){ echo $res['HqId']; } else {echo 0;} ?>" /></td>
	 <td colspan="3" class="tdf" align="center">&nbsp;</td>
	</tr>
	
	<tr>
	 <td class="tdf">&nbsp;Crop</td><td class="tdf" align="center">:</td>
	 <td><select style="width:200px;" class="InputSel" id="crops" name="crops[]" required multiple <?php if($_REQUEST['opt']==0){echo 'disabled';} ?>><?php if($_REQUEST['opt']>0){ $crp=mysql_query("select rc.ItemId,ItemName from fa_details_crop rc inner join hrm_sales_seedsitem si on rc.ItemId=si.ItemId where FaId=".$res['FaId']." order by ItemName ASC",$con); while($rcrp=mysql_fetch_assoc($crp)){ ?><option value="<?php echo $rcrp['ItemId']; ?>" selected><?php echo $rcrp['ItemName']; ?></option><?php } } $qi=mysql_query("select * from hrm_sales_seedsitem order by ItemName ASC",$con); while($ri=mysql_fetch_array($qi)){ ?>
	 <option value="<?php echo $ri['ItemId']; ?>"><?php echo $ri['ItemName']; ?></option><?php } ?></select></td>
	 <td class="tdf">&nbsp;Distibutor</td>
	 <td class="tdf" align="center">:</td>
	 <td><span id="spanDis"><select style="width:200px;" class="InputSel" id="dealer" name="dealer[]" multiple <?php if($_REQUEST['opt']==0){echo 'disabled';} ?>><?php if($_REQUEST['opt']>0){ $dis=mysql_query("select rd.DealerId,DealerName,DealerCity from fa_details_dealer rd inner join hrm_sales_dealer sd on rd.DealerId=sd.DealerId where FaId=".$res['FaId']." order by DealerName ASC",$con); while($rdis=mysql_fetch_assoc($dis)){ ?><option value="<?php echo $rdis['DealerId']; ?>" selected><?php echo ucfirst(strtolower($rdis['DealerName'])).' - '.strtoupper($rdis['DealerCity']); ?></option><?php } } ?></select></span><?php for($i=0;$i<=100;$i++){ echo '<input type="hidden" name="deal'.$i.'" id="deal'.$i.'" value="0" style="width:50px;"/>'; } ?></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Expen_Distributor</td>
	 <td class="tdf" align="center">:</td> 
	 <td><span id="spanDis2"><select style="width:200px;" class="InputSel" id="sdealer" name="sdealer" <?php if($_REQUEST['opt']==0){echo 'disabled';} ?>><?php if($_REQUEST['opt']>0){ $dis2=mysql_query("select DealerName,DealerCity from hrm_sales_dealer where DealerId=".$res['Sal_DealerId'],$con); $rdis2=mysql_fetch_assoc($dis2); ?><option value="<?php echo $res['Sal_DealerId']; ?>"><?php echo ucfirst(strtolower($rdis2['DealerName'])).' - '.strtoupper($rdis2['DealerCity']); ?></option><?php } else { ?><option value='0'>Select</option><?php } ?></select></span><input type="hidden" name="sdeal" id="sdeal" value="<?php if($_REQUEST['opt']>0){ echo $res['Sal_DealerId'];}else{echo 0;} ?>" />
	 
	 </td>
	 <td class="tdf">&nbsp;Reporting</td>
	 <?php if($res['tl']==0){ $e=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['Reporting'],$con); $re=mysql_fetch_assoc($e); $RName=ucfirst(strtolower($re['Fname'].' '.$re['Sname'].' '.$re['Lname'])); }else{ $e2=mysql_query("select TLName from hrm_sales_tlemp where TLEId=".$res['Reporting'],$con); $re2=mysql_fetch_assoc($e2); $RName=ucfirst(strtolower($re2['TLName'])); } ?>
	 <td class="tdf" align="center">:</td><td><span id="spanRep"><input style="width:200px;" class="InputType" id="rep" name="rep" readonly value="<?php if($_REQUEST['opt']>0){ echo $RName; } ?>"/></span>
	 <input type="hidden" name="repI" id="repI" value="<?php echo $res['Reporting']; ?>" /><input type="hidden" name="tl" id="tl" value="<?php echo $res['tl']; ?>" /></td>
	 
	 <td rowspan="12" colspan="3" valign="top">
	 <table border="0" cellpadding="1" cellspacing="0" style="width:340px;background-color:#FFFFFF;">
	  <tr><td colspan="3" class="htf2" style="height:40px;" align="center" valign="middle" bgcolor="#FFFF80">Upload File</td></tr>	  
	  <tr>
	   <td class="tdfu" style="width:80px;">&nbsp;Photo&nbsp;&nbsp;<?php if($res['Upld_pic']!=''){?><span style="cursor:pointer;color:#2DA70A;" onClick="fundocDetail(<?php echo '5,'.$res['FaId']; ?>)">(<u>Ok</u>)</span><?php } ?></td>
	   <td class="tdfu" style="width:10px;" align="center">:</td>
	   <td style="width:200px;"><input type="file" class="InputSel" id="photo" name="photo" readonly onClick="photoSz()"><input type="hidden" name="photo2" value="<?php echo $res['Upld_pic']; ?>" readonly></td>
	  </tr>
	  <tr>
	   <td class="tdfu">&nbsp;Driv Lic&nbsp;&nbsp;<?php if($res['Upld_dl']!=''){?><span style="cursor:pointer;color:#2DA70A;" onClick="fundocDetail(<?php echo '2,'.$res['FaId']; ?>)">(<u>Ok</u>)</span><?php } ?></td>
	   <td class="tdfu" style="width:10px;" align="center">:</td>
	   <td><input type="file" class="InputSel" id="updl" name="updl" readonly>
	       <input type="hidden" name="updl2" value="<?php echo $res['Upld_dl']; ?>" readonly></td>
	  </tr>
	  <tr>
	   <td class="tdfu">&nbsp;Aadhar&nbsp;&nbsp;<?php if($res['Upld_aadhar']!=''){?><span style="cursor:pointer;color:#2DA70A;" onClick="fundocDetail(<?php echo '1,'.$res['FaId']; ?>)">(<u>Ok</u>)</span><?php } ?></td>
	   <td class="tdfu" style="width:10px;" align="center">:</td>
	   <td><input type="file" class="InputSel" id="upaadhar" name="upaadhar" readonly>
	       <input type="hidden" name="upaadhar2" value="<?php echo $res['Upld_aadhar']; ?>" readonly></td>
	  </tr>
	  <tr>
	   <td class="tdfu">&nbsp;Pan No&nbsp;&nbsp;<?php if($res['Upld_pan']!=''){?><span style="cursor:pointer;color:#2DA70A;" onClick="fundocDetail(<?php echo '3,'.$res['FaId']; ?>)">(<u>Ok</u>)</span><?php } ?></td>
	   <td class="tdfu" style="width:10px;" align="center">:</td>
	   <td><input type="file" class="InputSel" id="uppan" name="uppan" readonly>
	       <input type="hidden" name="uppan2" value="<?php echo $res['Upld_pan']; ?>" readonly></td>
	  </tr>
	  <tr>
	   <td class="tdfu">&nbsp;Resume&nbsp;&nbsp;<?php if($res['Upld_resume']!=''){?><span style="cursor:pointer;color:#2DA70A;" onClick="fundocDetail(<?php echo '6,'.$res['FaId']; ?>)">(<u>Ok</u>)</span><?php } ?></td>
	   <td class="tdfu" style="width:10px;" align="center">:</td>
	   <td><input type="file" class="InputSel" id="upresume" name="uprsume" readonly>
	       <input type="hidden" name="upresume2" value="<?php echo $res['Upld_resume']; ?>" readonly></td>
	  </tr>
	  <tr>
	   <td class="tdfu">&nbsp;Voter Card&nbsp;&nbsp;<?php if($res['Upld_voterId']!=''){?><span style="cursor:pointer;color:#2DA70A;" onClick="fundocDetail(<?php echo '4,'.$res['FaId']; ?>)">(<u>Ok</u>)</span><?php } ?></td>
	   <td class="tdfu" style="width:10px;" align="center">:</td>
	   <td><input type="file" class="InputSel" id="upvotercard" name="upvotercard" readonly>
	       <input type="hidden" name="upvotercard2" value="<?php echo $res['Upld_voterId']; ?>" readonly></td>
	  </tr>
	  <tr>
	   <td class="tdfu">&nbsp;Any Other&nbsp;&nbsp;<?php if($res['Upld_other1']!=''){?><span style="cursor:pointer;color:#2DA70A;" onClick="fundocDetail(<?php echo '7,'.$res['FaId']; ?>)">(<u>Ok</u>)</span><?php } ?></td>
	   <td class="tdfu" style="width:10px;" align="center">:</td>
	   <td><input type="file" class="InputSel" id="upan1" name="upan1" readonly>
	       <input type="hidden" name="upan12" value="<?php echo $res['Upld_other1']; ?>" readonly></td>
	  </tr>
	  <tr>
	   <td class="tdfu">&nbsp;Any Other&nbsp;&nbsp;<?php if($res['Upld_other2']!=''){?><span style="cursor:pointer;color:#2DA70A;" onClick="fundocDetail(<?php echo '8,'.$res['FaId']; ?>)">(<u>Ok</u>)</span><?php } ?></td>
	   <td class="tdfu" style="width:10px;" align="center">:</td>
	   <td><input type="file" class="InputSel" id="upan2" name="upan2" readonly>
	       <input type="hidden" name="upan22" value="<?php echo $res['Upld_other2']; ?>" readonly></td>
	  </tr>
	 </table>
	 </td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Fa Name</td>
	 <td class="tdf" align="center">:</td><td><input style="width:200px;" class="InputType" id="name" name="name" maxlength="50" value="<?php echo $res['FaName']; ?>"/></td>
	 <td class="tdf">&nbsp;Email-Id</td>
	 <td class="tdf" align="center">:</td><td><input style="width:200px;" class="InputType" id="email" name="email" maxlength="50" value="<?php echo $res['EmailId']; ?>"/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Expense</td>
	 <td class="tdf" align="center">:</td><td><input class="InputType" style="width:120px;text-align:right;" id="sal" name="sal" maxlength="10" value="<?php if($_REQUEST['opt']>0){ echo floatval($res['Salary']); }else{echo 0;} ?>" /></td>
	 <td class="tdf">&nbsp;FA HQ</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;" class="InputType" id="ohq" name="ohq" value="<?php echo $res['OtherHq']; ?>"/><input type="hidden" style="width:120px;text-align:right;" class="InputType" id="expences" name="expences" maxlength="10" value="0"/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Expen. Mode</td>
	 <td class="tdf" align="center">:</td>
	 <td><select style="width:120px;" class="InputSel" id="smode" name="smode"/>
	     <option value='<?php echo $res['SalaryMode'];?>' selected><?php echo $res['SalaryMode']; ?></option>
		 <?php if($res['SalaryMode']!='Fixed'){?><option value='Fixed'>Fixed</option><?php } ?>
		 <?php if($res['SalaryMode']!='Variable'){?><option value='Variable'>Variable</option><?php } ?>
         </select></td>
	 <td class="tdf">&nbsp;Job Status</td> 
	 <td class="tdf" align="center">:</td><td><select style="width:120px;" class="InputSel" id="jobstatus" name="jobstatus"><option value="<?php echo $res['JobStatus'];?>" selected><?php echo $res['JobStatus']; ?></option>
	 <?php if($res['JobStatus']!='Temporary'){?><option value="Temporary">Temporary</option><?php } ?>
	 <?php if($res['JobStatus']!='Permanent'){?><option value="Permanent">Permanent</option><?php } ?>
	 </select></td>
	</tr> 
	<tr>
	 <td class="tdf">&nbsp;DOJ</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;text-align:center;" class="InputType" id="doj" name="doj" maxlength="50" value="<?php echo date("d-m-Y",strtotime($res['DOJ'])); ?>" readonly/><button id="f_btn1" class="CalenderButton"></button><script type="text/javascript">var cal = Calendar.setup({ onSelect: function(cal) { cal.hide()}, showTime: true }); cal.manageFields("f_btn1", "doj", "%d-%m-%Y");</script></td>
	 <td class="tdf">&nbsp;DOB</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;text-align:center;" class="InputType" id="dob" name="dob" maxlength="50" value="<?php echo date("d-m-Y",strtotime($res['DOB'])); ?>" readonly/><button id="f_btn2" class="CalenderButton"></button><script type="text/javascript">var cal = Calendar.setup({ onSelect: function(cal) { cal.hide()}, showTime: true }); cal.manageFields("f_btn2", "dob", "%d-%m-%Y");</script></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;ContactNo-1</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;text-align:right;" class="InputType" id="cont1" name="cont1" maxlength="10" value="<?php echo $res['ContactNo']; ?>"/></td>
	 <td class="tdf">&nbsp;ContactNo-2</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;text-align:right;" class="InputType" id="cont2" name="cont2" maxlength="10" value="<?php if($res['Contact2No']!=0 AND $res['Contact2No']!=''){ echo $res['Contact2No']; } ?>"/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;FA Status</td>
	 <td class="tdf" align="center">:</td>
	 <td><select style="width:120px;" class="InputSel" id="status" name="status">
<?php if($res['FaStatus']=='A'){$sts='Active';}elseif($res['FaStatus']=='D'){$sts='De-active';}elseif($res['FaStatus']=='L'){$sts='Deleted';}?><option value="<?php echo $res['FaStatus']; ?>" selected><?php echo $sts; ?></option>
	 <?php if($res['FaStatus']=='A'){ ?><option value='D'>De-active</option><?php } ?>
	 <?php if($res['FaStatus']=='D'){ ?><option value='A'>Active</option><option value='L'>Delete</option><?php } ?>
	 </select></td>
	 <td class="tdf">&nbsp;Gender</td> 
	 <td class="tdf" align="center">:</td><td><select style="width:120px;" class="InputSel" id="gender" name="gender"><option value="<?php echo $res['Gender'];?>" selected><?php if($res['Gender']=='M'){echo 'Male';}else{echo 'Female';} ?></option><?php if($res['Gender']!='M'){?><option value="M">Male</option><?php } ?>
	 <?php if($res['Gender']!='F'){?><option value="F" >Female</option><?php } ?></select></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Married</td>
	 <td class="tdf" align="center">:</td>
	 <td><select style="width:120px;" class="InputSel" id="married" name="married">
	 <option value='<?php echo $res['Married']; ?>' selected><?php if($res['Married']=='N'){echo 'NO';}else{echo 'Yes';} ?></option><?php if($res['Married']!='N'){?><option value='N'>No</option><?php } ?>
	 <?php if($res['Married']!='Y'){?><option value='Y'>Yes</option><?php } ?></select></td>
	 <td class="tdf">&nbsp;Qualification</td> 
	 <td class="tdf" align="center">:</td><td><select style="width:120px;" class="InputSel" id="quali" name="quali"><option value="<?php echo $res['Qualif']; ?>" selected><?php echo $res['Qualif']; ?></option>
<?php if($res['Qualif']!='High School'){?><option value="High School">High School</option><?php } ?>
<?php if($res['Qualif']!='Higher Secondary'){?><option value="Higher Secondary">Higher Secondary</option><?php } ?><?php if($res['Qualif']!='Graduate'){?><option value="Graduate" >Graduate</option><?php } ?>
<?php if($res['Qualif']!='Post Graduate'){?><option value="Post Graduate">Post Graduate</option><?php } ?></select></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Blood Group</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;" class="InputType" id="bg" name="bg" maxlength="10" value="<?php echo $res['BloodGroup']; ?>"/></td>
	 <td class="tdf">&nbsp;Location</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;" class="InputType" id="loc" name="loc" maxlength="30" value="<?php echo $res['Location']; ?>"/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Address-1</td>
	 <td class="tdf" align="center">:</td><td><input style="width:200px;" class="InputType" id="add1" name="add1" maxlength="100" placeholder="street/ house No" value="<?php echo $res['Address1']; ?>"/></td>
	 <td class="tdf">&nbsp;Address-2</td>
	 <td class="tdf" align="center">:</td><td><input style="width:200px;" class="InputType" id="add2" name="add2" maxlength="100" placeholder="village/ city/ pin-no" value="<?php echo $res['Address2']; ?>"/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Bank/Branch</td>
	 <td class="tdf" align="center">:</td><td><input style="width:200px;" class="InputType" id="bank" name="bank" maxlength="50" placeholder="" value="<?php echo $res['BankName']; ?>"/></td>
	 <td class="tdf">&nbsp;Account No</td>
	 <td class="tdf" align="center">:</td><td><input style="width:200px;" class="InputType" id="accno" name="accno" maxlength="20" placeholder="" value="<?php echo $res['AccountNo']; ?>"/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Aadhar No</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;;" class="InputType" id="aadhar" name="aadhar" maxlength="15" value="<?php echo $res['AadharNo']; ?>"/></td>
	 <td class="tdf">&nbsp;Driv. LicNo</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;;" class="InputType" id="dl" name="dl" maxlength="20" value="<?php echo $res['DrivLic']; ?>"/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Pan No</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;;" class="InputType" id="panno" name="panno" maxlength="15" value="<?php echo $res['PanNo']; ?>"/></td>
	 <td class="tdf">&nbsp;VoterId</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;;" class="InputType" id="voterid" name="voterid" maxlength="20" value="<?php echo $res['VoterId']; ?>"/></td>
	</tr> 
        <tr>
	 <td class="tdf">&nbsp;Last Work. Day</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;text-align:center;" class="InputType" id="lwd" name="lwd" maxlength="50" value="<?php if($res['LWD']!='0000-00-00' AND $res['LWD']!='1970-01-01')echo date("d-m-Y",strtotime($res['LWD'])); ?>"/><button id="f_btn7" class="CalenderButton"></button><script type="text/javascript">var cal = Calendar.setup({ onSelect: function(cal) { cal.hide()}, showTime: true }); cal.manageFields("f_btn7", "lwd", "%d-%m-%Y");</script></td>
	</tr>
	<tr>
	 <td colspan="10" align="right" style="background-color:#FFFF80;">
	  <table cellpadding="0" cellspacing="0">
	   <tr>
	    <td class="tdf"><font color="#008800"><?php echo $msg; ?></font>&nbsp;&nbsp;
		<input type="button" id="btnrefresh" style="width:80px;" onClick="javascript:window.location='f_editfa.php?ac=2441&ee=2421&der=true2&c=false&c=false7result=true&are=2347&rt=45&tt=7&uu=%%yy&trht=FTF%%F1&trht=FTF%%F1&tt&opt=<?php echo $_REQUEST['opt']; ?>'" value="refresh" /></td>
		<td><input type="submit" id="btnedit" name="btnedit" style="width:80px;" value="update" <?php if($_REQUEST['opt']==0 OR $_REQUEST['opt']==''){echo 'disabled';} ?>/></td>
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
