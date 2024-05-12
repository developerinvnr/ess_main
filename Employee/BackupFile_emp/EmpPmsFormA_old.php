<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}else{header('Location:../index.php');}

$Lenght=strlen($_SESSION['EmpCode']); 
if($Lenght==1){$FileN='000'.$_SESSION['EmpCode'];} elseif($Lenght==2){$FileN='00'.$_SESSION['EmpCode'];} 
elseif($Lenght==3){$FileN='0'.$_SESSION['EmpCode'];} elseif($Lenght==4){$FileN=$_SESSION['EmpCode'];}
/******************************************************************************/
//include("SetKraPmsy.php");

if(isset($_POST['SubmitFormA']))
{   
 $search =  '*"#$~/\':' ; $search = str_split($search); $n=$_POST['KRow'];     
 if($_SESSION['eAppform']=='Y')
 {
  for($i=1; $i<=$n; $i++)
  { 
   $RatRemark=str_replace($search, "", $_POST['SelfRatingRemark'.$i]);
   $sqlUp=mysql_query("update hrm_employee_pms_kraforma set SelfRating=".$_POST['SelfRating'.$i].", SelfKRALogic=".$_POST['EmpKRALogic'.$i].", SelfKRAScore=".$_POST['EmpKRAScore'.$i].", AchivementRemark='".addslashes($RatRemark)."' where EmpPmsId=".$_SESSION['ePmsId']." AND KRAFormAId=".$_POST['KRAFormAId'.$i], $con);
  
   if($_POST['rowSubK'.$i]>0)
   {
	for($j=1; $j<=$_POST['rowSubK'.$i]; $j++)
	{ 
	 $SRatRemark=str_replace($search, "", $_POST['SelfRatingRemark'.$i."_".$j]);
	 $sqlUp=mysql_query("update hrm_pms_krasub set SelfRating=".$_POST['SelfRating'.$i."_".$j].", SelfKRALogic=".$_POST['EmpKRALogic'.$i."_".$j].", SelfKRAScore=".$_POST['EmpKRAScore'.$i."_".$j].", AchivementRemark='".addslashes($SRatRemark)."' where KRASubId=".$_POST['SubKraId_'.$i."_".$j], $con); 
	} 
   }	   
  } // for($i=1; $i<=$n; $i++)
  
  if($sqlUp)
  { 
   $sqlUp=mysql_query("update hrm_employee_pms set Emp_KRASave='Y', Emp_PmsStatus=1, EmpFormAScore=".$_POST['EmpFinalFormAScore']." where EmpPmsId=".$_SESSION['ePmsId'], $con); $msg="Data saved successfully!";
  }
 } //if($resKeey['AppraisalForm']=='Y')

 elseif($_SESSION['eMidform']=='Y')
 {
  for($i=1; $i<=$n; $i++)
  { 
   $RatRemark=str_replace($search, "", $_POST['SelfRatingRemark'.$i]);
   $sqlUp=mysql_query("update hrm_employee_pms_kraforma set Mid_SelfRating=".$_POST['SelfRating'.$i].", Mid_SelfKRALogic=".$_POST['EmpKRALogic'.$i].", Mid_SelfKRAScore=".$_POST['EmpKRAScore'.$i].", Mid_AchivementRemark='".addslashes($RatRemark)."' where EmpPmsId=".$_SESSION['ePmsId']." AND KRAFormAId=".$_POST['KRAFormAId'.$i], $con);
  
   if($_POST['rowSubK'.$i]>0)
   {
    for($j=1; $j<=$_POST['rowSubK'.$i]; $j++)
    { 
     $SRatRemark=str_replace($search, "", $_POST['SelfRatingRemark'.$i."_".$j]);
	 $sqlUp=mysql_query("update hrm_pms_krasub set Mid_SelfRating=".$_POST['SelfRating'.$i."_".$j].", Mid_SelfKRALogic=".$_POST['EmpKRALogic'.$i."_".$j].", Mid_SelfKRAScore=".$_POST['EmpKRAScore'.$i."_".$j].", Mid_AchivementRemark='".addslashes($SRatRemark)."' where KRASubId=".$_POST['SubKraId_'.$i."_".$j], $con); 
    } 
   }	
  } //for($i=1; $i<=$n; $i++)
 
  if($sqlUp)
  { 
   $sqlUp=mysql_query("update hrm_employee_pms set Emp_KRASave='Y', Emp_PmsStatus=1, Mid_EmpFormAScore=".$_POST['EmpFinalFormAScore']." where EmpPmsId=".$_SESSION['ePmsId'], $con); $msg="Data saved successfully!";
  }
 } //elseif($resKeey['MidPmsForm']=='Y')
}

//*************************************/
include("EmpPmsFormSubmit.php");
//*************************************/


if(isset($_POST['AddUploadE']))
{ 
  $search =  '*"#$%@~/\':' ; $search = str_split($search);
  $UpfileName=str_replace($search, "",$_POST['UpFileName']);
  $uploaded=0; $ext="";
  if((!empty($_FILES["ufile"])) && ($_FILES['ufile']['error'] == 0))
  {
   $filename =strtolower(basename($_FILES['ufile']['name']));
   $fileSize =$_FILES['ufile']['size'];
   if($fileSize > 1000000)
   {
    $msgUp = "Your file is too large."; $ok=0;} 
    $ext = substr($filename, strrpos($filename, '.') + 1);
	//$newfilename=$FileN.'_'.$filename;
	$newfilename=$YearId.'_'.$FileN.'_'.$UpfileName.'.'.$ext;
    if (($ext == "xls" || $ext == "xlsx") && ($_FILES["ufile"]["size"] < 1000000))
    {
	 $ext=".".$ext;  $newname = dirname(__FILE__).'/AppKraFile/'.$newfilename; 
     if((move_uploaded_file($_FILES['ufile']['tmp_name'],$newname)))
     { 
	  $sqlUp=mysql_query("update hrm_employee_pms set Kra_filename='".$newfilename."', Kra_ext='".$UpfileName."' where EmpPmsId=".$_SESSION['ePmsId'], $con); 
       if($sqlUp)
	   { echo '<script>alert("File uploaded successfully!");</script>';  } 
	   $uploaded=1;
	 }
     else{echo '<script>alert("Error:!");</script>';}
    } 
    else { echo '<script>alert("Error: Only xls, xlsx files is allowed less than 1000KB");</script>'; }
   } 
   else {echo '<script>alert("Error! File is not uploaded!");</script>'; }
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
<link type="text/css" href="css/mycss.css" rel="stylesheet"/>
<script type="text/javascript" language="javascript">
function editFormA()
{ 
 document.getElementById("SubmitFormA").style.display='block'; document.getElementById("EdSubFormA").style.display='none';   
 for(var i=1; i<=document.getElementById("KRow").value; i++) 
 { 
  if(document.getElementById("rowSubK"+i).value>0)
  {
   for(var j=1; j<=document.getElementById("rowSubK"+i).value; j++)
   { 
    if(document.getElementById("PrdN_"+i+"_"+j).value==0){ document.getElementById("SelfRating"+i+"_"+j).readOnly=false; document.getElementById("SelfRating"+i+"_"+j).style.background='#B9DCFF'; } document.getElementById("SelfRatingRemark"+i+"_"+j).readOnly=false; document.getElementById("SelfRatingRemark"+i+"_"+j).style.background='#B9DCFF'; 
   } 
  }
  else
  {
   if(document.getElementById("PrdN_"+i).value==0){ document.getElementById("SelfRating"+i).readOnly=false; document.getElementById("SelfRating"+i).style.background='#B9DCFF'; } document.getElementById("SelfRatingRemark"+i).readOnly=false; document.getElementById("SelfRatingRemark"+i).style.background='#B9DCFF';
  }
 }
}   

function EnterEmpKra(i)
{ 
 var KRAWeight = parseFloat(document.getElementById("WeightageKRA_"+i).value); 
 var KRATarget = parseFloat(document.getElementById("TargetKRA_"+i).value); 
 var EmpKRARating = parseFloat(document.getElementById("SelfRating"+i).value); 
 var EmpKRAScore = parseFloat(document.getElementById("EmpKRAScore"+i).value);
 var PeriodKRA = document.getElementById("PeriodKRA_"+i).value;
 var lgc = document.getElementById("LogicKRA_"+i).value; 
 
  if(lgc=='Logic1')
  { 
   //var Per50=Math.round((KRATarget/2)*100)/100;
   var Per50=Math.round(((KRATarget*20)/100)*100)/100; var Per150=Math.round((KRATarget+Per50)*100)/100;
   if(EmpKRARating<=Per150){var EScore=document.getElementById("EmpKRALogic"+i).value=EmpKRARating;}
   else{var EScore=document.getElementById("EmpKRALogic"+i).value=Per150;} 
   var MScore=document.getElementById("EmpKRAScore"+i).value=Math.round(((EScore/KRATarget)*KRAWeight)*100)/100;
   var Score=document.getElementById("KraScore"+i).value=MScore;
  }
  else if(lgc=='Logic2')
  {
   if(EmpKRARating<=KRATarget){var EScore=document.getElementById("EmpKRALogic"+i).value=EmpKRARating;}
   else{var EScore=document.getElementById("EmpKRALogic"+i).value=KRATarget;}
   var MScore=document.getElementById("EmpKRAScore"+i).value=Math.round(((EScore/KRATarget)*KRAWeight)*100)/100;
   var Score=document.getElementById("KraScore"+i).value=MScore;
  }
  else if(lgc=='Logic3')
  { 
   if(EmpKRARating==KRATarget){var EScore=document.getElementById("EmpKRALogic"+i).value=EmpKRARating;}
   else{var EScore=document.getElementById("EmpKRALogic"+i).value=0;}
   var MScore=document.getElementById("EmpKRAScore"+i).value=Math.round(((EScore/KRATarget)*KRAWeight)*100)/100;
   var Score=document.getElementById("KraScore"+i).value=MScore; 
  }
  else if(lgc=='Logic4')
  {
   if(EmpKRARating>=KRATarget){var EScore=document.getElementById("EmpKRALogic"+i).value=KRATarget;}
   else{var EScore=document.getElementById("EmpKRALogic"+i).value=0;}
   var MScore=document.getElementById("EmpKRAScore"+i).value=Math.round(((EScore/KRATarget)*KRAWeight)*100)/100;
   var Score=document.getElementById("KraScore"+i).value=MScore;
  }
  else if(lgc=='Logic5')
  {
   var Per30=Math.round(((KRATarget*30)/100)*100)/100; var Per70=Math.round((KRATarget-Per30)*100)/100;
   if(EmpKRARating>=Per70 && EmpKRARating<KRATarget){var EScore=document.getElementById("EmpKRALogic"+i).value=EmpKRARating;}
   else if(EmpKRARating>=KRATarget){var EScore=document.getElementById("EmpKRALogic"+i).value=KRATarget;}
   else{var EScore=document.getElementById("EmpKRALogic"+i).value=0;}
   var MScore=document.getElementById("EmpKRAScore"+i).value=Math.round(((EScore/KRATarget)*KRAWeight)*100)/100;
   var Score=document.getElementById("KraScore"+i).value=MScore;
  }
  
  FunCal(); 
}		


function EnterEmpKraSub(i,k)
{ 
 var Weight = parseFloat(document.getElementById("WeightageKRA_"+i+"_"+k).value); 
 var Target = parseFloat(document.getElementById("TargetKRA_"+i+"_"+k).value); 
 var Rating = parseFloat(document.getElementById("SelfRating"+i+"_"+k).value); 
 var Score = parseFloat(document.getElementById("EmpKRAScore"+i+"_"+k).value); 
 var PeriodKRA = document.getElementById("PeriodKRA_"+i+"_"+k).value;
 var lgc = document.getElementById("LogicKRA_"+i+"_"+k).value; 
 
  if(lgc=='Logic1')
  { 
   //var Per50=Math.round((Target/2)*100)/100;
   var Per50=Math.round(((Target*20)/100)*100)/100; var Per150=Math.round((Target+Per50)*100)/100;
   if(Rating<=Per150){var EScore=document.getElementById("EmpKRALogic"+i+"_"+k).value=Rating;}
   else{var EScore=document.getElementById("EmpKRALogic"+i+"_"+k).value=Per150;} 
   var MScore=document.getElementById("EmpKRAScore"+i+"_"+k).value=Math.round(((EScore/Target)*Weight)*100)/100;
   if(MScore>0){document.getElementById("EmpKRAScore"+i+"_"+k).value=MScore; document.getElementById("KraScoreSub"+i+"_"+k).value=MScore;}else{document.getElementById("EmpKRAScore"+i+"_"+k).value=0;}
  }
  else if(lgc=='Logic2')
  {
   if(Rating<=Target){var EScore=document.getElementById("EmpKRALogic"+i+"_"+k).value=Rating;}
   else{var EScore=document.getElementById("EmpKRALogic"+i+"_"+k).value=Target;}
   var MScore=document.getElementById("EmpKRAScore"+i+"_"+k).value=Math.round(((EScore/Target)*Weight)*100)/100;
   if(MScore>0){document.getElementById("EmpKRAScore"+i+"_"+k).value=MScore; document.getElementById("KraScoreSub"+i+"_"+k).value=MScore;}else{document.getElementById("EmpKRAScore"+i+"_"+k).value=0;}
  }
  else if(lgc=='Logic3')
  { 
   if(Rating==Target){var EScore=document.getElementById("EmpKRALogic"+i+"_"+k).value=Rating;}
   else{var EScore=document.getElementById("EmpKRALogic"+i+"_"+k).value=0;}
   var MScore=document.getElementById("EmpKRAScore"+i+"_"+k).value=Math.round(((EScore/Target)*Weight)*100)/100;
   if(MScore>0){document.getElementById("EmpKRAScore"+i+"_"+k).value=MScore; document.getElementById("KraScoreSub"+i+"_"+k).value=MScore;}else{document.getElementById("EmpKRAScore"+i+"_"+k).value=0;}
  }
  else if(lgc=='Logic4')
  {
   if(Rating>=Target){var EScore=document.getElementById("EmpKRALogic"+i+"_"+k).value=Target;}
   else{var EScore=document.getElementById("EmpKRALogic"+i+"_"+k).value=0;}
   var MScore=document.getElementById("EmpKRAScore"+i+"_"+k).value=Math.round(((EScore/Target)*Weight)*100)/100;
   if(MScore>0){document.getElementById("EmpKRAScore"+i+"_"+k).value=MScore; document.getElementById("KraScoreSub"+i+"_"+k).value=MScore;}else{document.getElementById("EmpKRAScore"+i+"_"+k).value=0;}
  }
  else if(lgc=='Logic5')
  {
   var Per30=Math.round(((Target*30)/100)*100)/100; var Per70=Math.round((Target-Per30)*100)/100;
   if(Rating>=Per70 && Rating<Target){var EScore=document.getElementById("EmpKRALogic"+i+"_"+k).value=Rating;}
   else if(Rating>=Target){var EScore=document.getElementById("EmpKRALogic"+i+"_"+k).value=Target;}
   else{var EScore=document.getElementById("EmpKRALogic"+i+"_"+k).value=0;}
   var MScore=document.getElementById("EmpKRAScore"+i+"_"+k).value=Math.round(((EScore/Target)*Weight)*100)/100;
   if(MScore>0){document.getElementById("EmpKRAScore"+i+"_"+k).value=MScore; document.getElementById("KraScoreSub"+i+"_"+k).value=MScore;}else{document.getElementById("EmpKRAScore"+i+"_"+k).value=0;}
  }
  
  FunCal();
}


function FunTgt(sn,kid,prd,tgt,wgt,lgc)
{ var e=document.getElementById("e").value; document.getElementById('tsn').value=sn;
  var win = window.open("setkratgtpms.php?act=setkratgt&n=1&valueins=true&checkalpha=false&d=12&pa=4&y=2&kid="+kid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&lgc="+lgc+"&wgt="+wgt, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=600"); 
  var timer = setInterval( function()
                          {   
						   if(win.closed) 
						   { clearInterval(timer); var url = 'setkratgtactpms.php'; var pars = 'tact=tgtact&n==1&kid='+kid+'&sn='+sn; var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_NewDE }); } 
						  }, 1000);  
}		
function show_NewDE(originalRequest)
{ document.getElementById('NewSpam').innerHTML = originalRequest.responseText; 
  document.getElementById('SelfRating'+document.getElementById('tsn').value).value=document.getElementById('tAch').value; 
  document.getElementById('EmpKRAScore'+document.getElementById('tsn').value).value=document.getElementById('tScor').value;
  document.getElementById('EmpKRALogic'+document.getElementById('tsn').value).value=document.getElementById('tLogScr').value;
  FunCal();
} 
 
function FunSubTgt(sn,sn2,kid,prd,tgt,wgt,lgc)
{ var e=document.getElementById("e").value; 
  document.getElementById('tsn').value=sn; document.getElementById('tsn2').value=sn2;
  var win = window.open("setkratgtpms.php?act=setkratgt&n=2&valueins=true&checkalpha=false&d=12&pa=4&y=2&kid="+kid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&lgc="+lgc+"&wgt="+wgt, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=600");
 var timer = setInterval( function()
                          {   
						   if(win.closed) 
						   { clearInterval(timer); var url = 'setkratgtactpms.php'; var pars = 'tact=subtgtact&n==2&kid='+kid+'&sn='+sn+'&sn2='+sn2; var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_NewDEE }); } 
						  }, 1000);  
}		
function show_NewDEE(originalRequest)
{ document.getElementById('NewSpam').innerHTML = originalRequest.responseText; 
  document.getElementById('SelfRating'+document.getElementById('tsn').value+'_'+document.getElementById('tsn2').value).value=document.getElementById('tAch').value; 
  document.getElementById('EmpKRAScore'+document.getElementById('tsn').value+'_'+document.getElementById('tsn2').value).value=document.getElementById('tScor').value;
  document.getElementById('EmpKRALogic'+document.getElementById('tsn').value+'_'+document.getElementById('tsn2').value).value=document.getElementById('tLogScr').value;
  FunCal();
}

function FunCal()
{
 for(var i=1; i<=document.getElementById("KRow").value; i++) 
 { 
  if(document.getElementById("rowSubK"+i).value>0)
  { 
   for(var j=1; j<=document.getElementById("rowSubK"+i).value; j++)
   {document.getElementById("KraScoreSub"+i+"_"+j).value=document.getElementById("EmpKRAScore"+i+"_"+j).value;}
     
   var s1s= parseFloat(document.getElementById("KraScoreSub"+i+"_1").value); var s2s= parseFloat(document.getElementById("KraScoreSub"+i+"_2").value); var s3s= parseFloat(document.getElementById("KraScoreSub"+i+"_3").value); var s4s= parseFloat(document.getElementById("KraScoreSub"+i+"_4").value); var s5s= parseFloat(document.getElementById("KraScoreSub"+i+"_5").value); document.getElementById("EmpKRAScore"+i).value=Math.round((s1s+s2s+s3s+s4s+s5s)*100)/100; document.getElementById("KraScore"+i).value=Math.round((s1s+s2s+s3s+s4s+s5s)*100)/100;
  }
 }
 FunCal2();
}

function FunCal2()
{
 var Sno=document.getElementById("Sno").value;
 for(var i=1; i<=document.getElementById("KRow").value; i++) 
 { document.getElementById("KraScore"+i).value=document.getElementById("EmpKRAScore"+i).value; }
 var s1= parseFloat(document.getElementById("KraScore"+1).value); var s2= parseFloat(document.getElementById("KraScore"+2).value); var s3= parseFloat(document.getElementById("KraScore"+3).value); var s4= parseFloat(document.getElementById("KraScore"+4).value); var s5= parseFloat(document.getElementById("KraScore"+5).value); var s6= parseFloat(document.getElementById("KraScore"+6).value); var s7= parseFloat(document.getElementById("KraScore"+7).value); var s8= parseFloat(document.getElementById("KraScore"+8).value); var s9= parseFloat(document.getElementById("KraScore"+9).value); var s10= parseFloat(document.getElementById("KraScore"+10).value); var s11= parseFloat(document.getElementById("KraScore"+11).value); var s12= parseFloat(document.getElementById("KraScore"+12).value); var s13= parseFloat(document.getElementById("KraScore"+13).value); var s14= parseFloat(document.getElementById("KraScore"+14).value); var s15= parseFloat(document.getElementById("KraScore"+15).value); var s16= parseFloat(document.getElementById("KraScore"+16).value); var s17= parseFloat(document.getElementById("KraScore"+17).value); var s18= parseFloat(document.getElementById("KraScore"+18).value); var s19= parseFloat(document.getElementById("KraScore"+19).value); var s20= parseFloat(document.getElementById("KraScore"+20).value);
 var q = document.getElementById("KraSum").value=Math.round((s1+s2+s3+s4+s5+s6+s7+s8+s9+s10+s11+s12+s13+s14+s15+s16+s17+s18+s19+s20)*100)/100; document.getElementById("EmpFormAScore"+Sno).value=Math.round((q)*100)/100;
}

function ValidationKRA(KRAForm)
{ 
 for(var i=1; i<=document.getElementById("KRow").value; i++)
 { 
  if(document.getElementById("SelfRating"+i).value>0 && document.getElementById("SelfRatingRemark"+i).value==''){ alert('Please enter remark for KRA row number '+i);  return false; }
  
  if(document.getElementById("rowSubK"+i).value>0)
  { 
   for(var j=1; j<=document.getElementById("rowSubK"+i).value; j++)
   {
    if(document.getElementById("SelfRating"+i+"_"+j).value>0 && document.getElementById("SelfRatingRemark"+i+"_"+j).value==''){ alert('Please enter remark for SUB-KRA '+j+' in KRA row number '+i+' ');  return false; }
   }
  }
 }  
 
 var agree=confirm("Are you sure you want to save KRA form?"); if(agree){ return true; }else{ return false; }
}


function FinalSubmit() { var agree=confirm("Are you sure you want to submit appraisal form.?");
if (agree) { var x = "EmpPmsFormA.php?action=submit&ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&fr=0&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=0&fb=1&ffeedb=1&org=1";  window.location=x;}}			 

function printpage(PmsId,EmpId) 
{ window.open ("EmpAppFormPrint.php?PmsId="+PmsId+"&EmpId="+EmpId,"AppForm","menubar=yes,scrollbars=yes,resizable=1,width=1200,height=600");}

function UploadEmpfile(p,e,y)
{ window.open("UploadAppFileEmp.php?action=up&P="+p+"&E="+e+"&Y="+y,"UploadFile","menubar=no,scrollbars=yes,resizable='no',width=650,height=500");} 

function OpenWindow()
{var CI=document.getElementById("ComId").value; var YI=document.getElementById("YId").value; 
 window.open("AppraisalSchedule.php?C="+CI+"&Y="+YI,"Schedule","menubar='no',resizable=1,width=850,height=350");}

function OpenHelpfile(value){window.open("HelpFile.php?a=open&v="+value,"HelpFile","width=800,height=650"); }
function OpenFaqfile(value){window.open("HelpFile.php?a=FaqOpen&v="+value,"HelpFile","width=800,height=650"); }


function isNumberKey(evt)
{
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) return false;
  return true;
}
//onKeyPress="return isNumberKey(event)"
</script>
</head>
<body class="body" onLoad="FunCal()"> 
<span id="NewSpam"></span>
<input type="hidden" id="tsn" value="0" /><input type="hidden" id="tsn2" value="0" />
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $resSYP['CurrY']; ?>" />
<input type="hidden" name="KraYId" id="KraYId" value="<?php echo $_SESSION['KraYId']; ?>" /> 
<input type="hidden" name="PmsYId" id="PmsYId" value="<?php echo $_SESSION['PmsYId']; ?>" />
<?php for($i=1; $i<=20; $i++) { ?><input type="hidden" id="KraScore<?php echo $i; ?>" value="0" /><?php } ?>
<input type="hidden" id="KraSum" value="0"/>
<input type="hidden" id="e" value="<?php echo $EmployeeId; ?>"/>

<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td>
 <table width="100%" style="margin-top:0px;">
  <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
  <tr>
   <td valign="top" style="background-image:url(images/pmsback.png);width:100%;">
   <table border="0" style="width:100%;height:500px;float:none;" cellpadding="0">
   <tr>
    <td valign="top" style="width:100%;">      
    <table border="0" id="Activity" style="width:100%;">
	<tr>
     <td style="width:100%;" valign="top">
	 <table border="0" style="width:100%;">
<?php //*************************************** Start ********************************************* ?>	
<?php //*************************************** Start ********************************************* ?>					
<tr>
 <td style="background-image:url(images/pmsback.png);width:100%;">	 
 <table style="width:100%;">
<!--  Head Parts Open Open Open  --> 
<!--  Head Parts Open Open Open  --> 
 <tr>
  <td>
   <table>
    <tr>
<?php if($_SESSION['EmpType']=='E'){ ?>
<td align="center" valign="top"><a href="#"><img id="Img_emp1" src="images/emp.png" border="0"/></a></td>

<?php } if($_SESSION['BtnApp']>0) { ?><td align="center" valign="top"><a href="ManagerPms.php?ee=1&rr2=1&aa=0&rr=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_manager1" src="images/manager1.png" border="0"/></a></td>
		   
<?php } if($_SESSION['BtnRev']>0) { ?><td align="center" valign="top"><a href="HodPms.php?ee=1&aa=1&rr2=1&rr=0&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/hod1.png" border="0"/></a></td>

<?php } if($_SESSION['BtnRev2']>0) { ?><td align="center" valign="top"><a href="Rev2HodPms.php?ee=1&rr2=0&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/RevHod1.png" border="0"/></a></td>	
		   
<?php } if($_SESSION['BtnHod']>0) { ?><td align="center" valign="top"><a href="RevHodPms.php?ee=1&rr2=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/m1.png" border="0"/></a></td><?php } ?>

<td><font class="msg_b"><i><?php echo $msg; ?></i></font><font class="formc"><span id="MsgSpan"></span></font></td>	 
	</tr>
   </table>
  </td>
 </tr>
 
 <tr><td style="vertical-align:top;width:100%;"><?php include("SetKraPmsme.php"); ?></td></tr>
<!--  Head Parts Close Close Close  --> 
<!--  Head Parts Close Close Close  --> 
 
  <tr>
    <td style="width:100%;">
	  <table border="0" style="width:100%;">
	    <tr>
		 <td style="width:5px;">&nbsp;</td>
<?php /****************************************** Form Start **************************/ ?>
<?php /***************** AppraisalForm **************************/ ?>	
         <td id="AppraisalForm" style="width:100%;display:block;">
		 <table style="width:100%;">		 		   
<tr><td colspan="6"><?php include("SetKraPmsmeform.php"); ?></td></tr>
<tr><td>&nbsp;</td></tr>
<tr>
<?php /***************** Form A(KRA) **************************/ ?>
 <td id="FormA" style="width:100%;">
 <table border="0" cellspacing="1" style="width:100%;">
 <?php if($_SESSION['eAppform']=='Y'){ ?>
  <tr><td colspan="13" align="center" class="fhead" style="color:#000084;width:100%;" valign="middle">List the KRA/ Goals set for the given assessment year. Score the performance against each objective. &nbsp;<?php if($_REQUEST['fa']==0){ ?>
   <script>function FunLog(){ window.open("viewlogic.php", "F", "menubar=no, scrollbars=yes, resizable=no, directories=no, width=1000, height=500");}</script><input type="button" style="width:90px;background-color:#99CC00;font-weight:bold;" value="Logic" onClick="FunLog()"/><?php } ?></td></tr>
 <?php } ?>
 
 <?php if($_SESSION['Dept']==4){ ?>
 <script>
 function SubForm()
 { 
   var Name = document.getElementById("UpFileName").value; 
   var filter=/^[1-9a-zA-Z._ /]+$/; var test_bool = filter.test(Name);
   if (Name.length === 0) { alert("Please type name of uploaded file.");  return false; } 
   if(test_bool==false) { alert('Please Enter Only Alpha-Numeric,_ in file Name field');  return false; } 
 }
 </script>
 <tr>
  <td colspan="13" class="fhead" style="width:100%;" valign="middle" bgcolor="#FFFF80">
  <form method="post" enctype="multipart/form-data" name="form1" id="form1" onSubmit="return SubForm()">
   <table border="0" align="center">
    <tr><input TYPE="hidden" name="MAX_FILE_SIZE" value="1000000">
    <td class="fhead">Attach KRA Related File (Only Xls) :&nbsp;</td>
    <td><input type="file" size="35" name="ufile" id="ufile" style="width:250px;"></td>
    <td class="fhead" style="width:100px;">Name Of File :&nbsp;</td>
    <td><input type="text" name="UpFileName" id="UpFileName" style="width:250px;" value="<?php echo $resY['Kra_ext']; ?>"></td>
    <td><input type="submit" name="AddUploadE" id="AddUplaodE" style="width:60px;text-align:center; background-color:#95CAFF;" value="Save"></span></td>
    </tr> 
   </table>
  </form> 
  </td>
 </tr>
 <?php } ?>

 <form name="KRAForm" method="post" onSubmit="return ValidationKRA(this)">
 <tr bgcolor="#FFFF53" style="height:22px;">	   
  <td class="fhead" style="width:40px;">SNo</td>
  <td class="fhead" style="width:250px;">KRA/Goals</td>
  <td class="fhead" style="width:500px;">Description</td>  
  <td class="fhead" style="width:80px;">Measure</td>
  <td class="fhead" style="width:60px;">Unit</td>
  <td class="fhead" style="width:60px;">Weightage</td>
  <td class="fhead" style="width:60px;">Logic</td>
  <td class="fhead" style="width:80px;">Period</td>
  <td class="fhead" style="width:50px;">Target</td>
<?php if($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y'){ ?>
  <td class="fhead" style="width:60px;">Self Rating</td>
  <?php /*?><td class="fhead" style="width:60px;">Allow Logic</td>
  <td class="fhead" style="width:60px;">Score</td><?php */?>
<?php } ?>
  <td class="fhead" style="width:200px;">Remarks</td>
 </tr>
<?php $sqlK=mysql_query("select * from hrm_employee_pms_kraforma where EmpPmsId=".$_SESSION['ePmsId']." AND KRAFormAStatus='A' order by KRAFormAId ASC", $con); $Sno=1; while($resK=mysql_fetch_array($sqlK)){ 
	  $sqlK2=mysql_query("select * from hrm_pms_kra where KRAId=".$resK['KRAId'], $con); $resK2=mysql_fetch_array($sqlK2);
	  $sSubK=mysql_query("select * from hrm_pms_krasub where KRAId=".$resK['KRAId']." AND KSubStatus='A' order by KRASubId ASC",$con); $rowSubK=mysql_num_rows($sSubK);
	  $n=0;
	  if($resK['Period']=='Monthly' OR $resK['Period']=='Quarter' OR $resK['Period']=='1/2 Annual'){ $n=1; $sqlt=mysql_query("select SUM(Ach) as tAch, SUM(LogScr) as tLogScr, SUM(Scor) as tScor from hrm_pms_kra_tgtdefin where KRAId=".$resK['KRAId'],$con); $rest=mysql_fetch_assoc($sqlt); }else{$n=0;} ?>
  <input type="hidden" id="WeightageKRA_<?php echo $Sno; ?>"  value="<?php echo $resK['Weightage']; ?>" />
  <input type="hidden" id="LogicKRA_<?php echo $Sno; ?>" value="<?php echo $resK['Logic']; ?>" />
  <input type="hidden" id="PeriodKRA_<?php echo $Sno; ?>" value="<?php echo $resK['Period']; ?>" />
  <input type="hidden" id="TargetKRA_<?php echo $Sno; ?>" value="<?php echo $resK['Target']; ?>" />
  <input type="hidden" id="PrdN_<?php echo $Sno; ?>"  value="<?php echo $n; ?>" />	  	
 <tr bgcolor="#FFFFFF" style="height:40px;"> 	   
  <td class="fbody" align="center"><b><?php echo $Sno; ?></b></td>
  <td class="fbody" valign="top"><?php echo $resK2['KRA'];?></td>
  <td class="fbody" valign="top"><?php echo $resK2['KRA_Description'];?></td>  
  <td class="fbody" align="center"><?php if($rowSubK>0){echo '';}else{echo $resK2['Measure'];}?></td>
  <td class="fbody" align="center"><?php if($rowSubK>0){echo '';}else{echo $resK2['Unit'];}?></td>
  <td class="fbody" align="center"><?php echo $resK['Weightage'];?></td>
  <td class="fbody" align="center"><?php echo $resK['Logic'];?></td>
  <td class="fbody" align="center"><?php echo $resK['Period'];?></td>
  <td class="fbody" align="center"><span style="text-decoration:<?php if($resK['Period']!='Annual' AND $resK['Period']!=''){ echo 'underline'; }else{echo 'none';}?>;color:<?php if($resK['Period']!='Annual' AND $resK['Period']!=''){ echo '#000099'; }else{echo '#000';}?>;cursor:<?php if($resK['Period']!='Annual' AND $resK['Period']!=''){echo 'pointer';} ?>;" <?php if($resK['Period']!='Annual' AND $resK['Period']!=''){?> onClick="FunTgt(<?php echo $Sno.','.$resK['KRAId']; ?>,'<?php echo $resK['Period']; ?>',<?php echo intval($resK['Target']).','.intval($resK['Weightage']); ?>,'<?php echo $resK['Logic']; ?>')" <?php } ?> ><?php if($rowSubK>0){echo '';}else{echo $resK['Target'];}?></span></td>
  <?php /*?>onMouseOver="FunTgt(<?php echo $Sno.','.$resK['KRAId']; ?>,'<?php echo $resK['Period']; ?>',<?php echo intval($resK['Target']).','.intval($resK['Weightage']); ?>,'<?php echo $resK['Logic']; ?>')"<?php */?>
  <!-- 111111-->
  
  <?php if($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y'){ ?>
  <td align="center" class="fbody" style="vertical-align:top;">
  <input type="<?php if($rowSubK>0){echo 'hidden';}else{echo 'text';} ?>" name="SelfRating<?php echo $Sno; ?>" id="SelfRating<?php echo $Sno; ?>" class="input" style="width:60px;background-color:<?php if($rowSubK>0){echo '#FFFFFF';}elseif($resYNK['Emp_KRASave']=='N'){echo '#FFFFAE';}else{echo '#FFFFAE';}?>;text-align:center;" value="<?php if($n==1){ echo floatval($rest['tAch']); }elseif($resY['Emp_KRASave']=='Y'){ if($_SESSION['eAppform']=='Y'){ echo $resK['SelfRating']; }elseif($_SESSION['eMidform']=='Y'){echo $resK['Mid_SelfRating']; } }elseif($resY['Emp_KRASave']=='N'){ echo '0'; }?>" <?php if($n==0){ ?> onKeyUp="EnterEmpKra(<?php echo $Sno; ?>)" onChange="EnterEmpKra(<?php echo $Sno; ?>)" maxlength="10" <?php if($resY['Emp_KRASave']=='Y'){echo 'readonly';} ?> <?php } ?> oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" <?php if($rowSubK>0 OR $n==1){ echo 'readonly'; } ?> onKeyPress="return isNumberKey(event)"/>
  
 
  <input type="hidden" class="input" id="EmpKRALogic<?php echo $Sno; ?>" name="EmpKRALogic<?php echo $Sno; ?>" style="width:60px;text-align:center;border:hidden;" value="<?php if($rowSubK>0){echo '';}elseif($n==1){ echo floatval($rest['tLogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo $resK['SelfKRALogic'];}elseif($_SESSION['eMidform']=='Y'){echo $resK['Mid_SelfKRALogic']; }else{echo 0;} ?>"  readonly/>
  <input type="hidden" class="input" id="EmpKRAScore<?php echo $Sno; ?>" name="EmpKRAScore<?php echo $Sno; ?>" style="width:60px;text-align:center;border:hidden;font-weight:bold;" value="<?php if($n==1){ echo floatval($rest['tScor']); }elseif($_SESSION['eAppform']=='Y'){ echo $resK['SelfKRAScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resK['Mid_SelfKRAScore']; }else{echo 0;} ?>" readonly/>
 
  </td>
  
  <?php /*?><td align="center" class="fbody"><input type="text" class="input" id="EmpKRALogic<?php echo $Sno; ?>" name="EmpKRALogic<?php echo $Sno; ?>" style="width:60px;text-align:center;border:hidden;" value="<?php if($rowSubK>0){echo '';}elseif($n==1){ echo floatval($rest['tLogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo $resK['SelfKRALogic'];}elseif($_SESSION['eMidform']=='Y'){echo $resK['Mid_SelfKRALogic']; }else{echo 0;} ?>"  readonly/></td>
  <td align="center" class="fbody"><input type="text" class="input" id="EmpKRAScore<?php echo $Sno; ?>" name="EmpKRAScore<?php echo $Sno; ?>" style="width:60px;text-align:center;border:hidden;font-weight:bold;" value="<?php if($n==1){ echo floatval($rest['tScor']); }elseif($_SESSION['eAppform']=='Y'){ echo $resK['SelfKRAScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resK['Mid_SelfKRAScore']; }else{echo 0;} ?>"  readonly/></td><?php */?>
  
  <?php }else{ ?>
  <input type="hidden" name="SelfRating<?php echo $Sno; ?>" id="SelfRating<?php echo $Sno; ?>" readonly value="0"/>
  <input type="hidden" name="EmpKRALogic<?php echo $Sno; ?>" id="EmpKRALogic<?php echo $Sno; ?>"  value="0"  readonly/>
  <input type="hidden" name="EmpKRAScore<?php echo $Sno; ?>" id="EmpKRAScore<?php echo $Sno; ?>"  value="0"  readonly/>
  <?php } ?>

  <td class="font" align="" style="width:80px;" valign="top">
  <?php if($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y'){ ?>
   <?php if($rowSubK>0){ ?>
	<input type="hidden" name="SelfRatingRemark<?php echo $Sno; ?>" id="SelfRatingRemark<?php echo $Sno; ?>" value="<?php if($_SESSION['eAppform']=='Y'){ echo $resK['AchivementRemark']; }elseif($_SESSION['eMidform']=='Y'){echo $resK['Mid_AchivementRemark']; } ?>"/>
   <?php }else{ ?>
	<textarea name="SelfRatingRemark<?php echo $Sno; ?>" id="SelfRatingRemark<?php echo $Sno; ?>" rows="2" <?php if($resY['Emp_KRASave']=='Y'){echo 'readonly';} ?> class="input" style="width:200px;background-color:<?php if($rowSubK>0){echo '#FFFFFF';}elseif($resY['Emp_KRASave']=='N'){echo '#FFFFAE';}else{echo '#FFFFAE';}?>;height:40px;"><?php if($_SESSION['eAppform']=='Y'){ echo $resK['AchivementRemark']; }elseif($_SESSION['eMidform']=='Y'){echo $resK['Mid_AchivementRemark']; } ?></textarea>
   <?php } ?>
  <?php } ?>
  <input type="hidden" name="KRAFormAId<?php echo $Sno; ?>" value="<?php echo $resK['KRAFormAId']; ?>" />
  <input type="hidden" id="rowSubK<?php echo $Sno; ?>" name="rowSubK<?php echo $Sno; ?>" value="<?php echo $rowSubK; ?>" />
  </td>
 
 </tr>
 
<?php for($i=1; $i<=5; $i++) { ?>
<input type="hidden" id="KraScoreSub<?php echo $Sno."_".$i; ?>" value="0" /><?php } ?>
<?php  if($rowSubK>0){ ?> 
<?php /*&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
<?php /*&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>  
 <tr>
  <td colspan="13" align="right" style="border:hidden;border-style:none;">
   <div id="Div<?php echo $Sno; ?>" style="display:<?php if($rowSubK>0){echo 'block';}else{echo 'none';} ?>;">
    <table style="width:95%;" border="0" cellpadding="0" cellspacing="1"> 
     <tr bgcolor="#71FF71">   
      <td class="fhead2" style="width:40px;">SNo</td>
      <td class="fhead2" style="width:250px;">Sub KRA/Goals</td>
      <td class="fhead2" style="width:350px;">Sub KRA Description</td>  
      <td class="fhead2" style="width:80px;">Measure</td>
      <td class="fhead2" style="width:60px;">Unit</td>
      <td class="fhead2" style="width:60px;">Weightage</td>
	  <td class="fhead2" style="width:60px;">Logic</td>
	  <td class="fhead2" style="width:80px;">Period</td>
      <td class="fhead2" style="width:60px;">Target</td>
<?php if($_SESSION['eAppform']=='Y'){ ?>
      <td class="fhead2" style="width:60px;">Self<br>Rating</td>
      <?php /*?><td class="fhead2" style="width:60px;">Allow Logic</td>
      <td class="fhead2" style="width:60px;">Score</td><?php */?>
<?php } ?>
	  <td class="fhead2" style="width:200px;">Remarks</td>
     </tr>
<?php if($rowSubK==0){$num=5;}elseif($rowSubK==1){$num=4;}elseif($rowSubK==2){$num=3;}elseif($rowSubK==3){$num=2;}elseif($rowSubK==4){$num=1;}elseif($rowSubK==5){$num=0;} ?>
<?php /* While Open*/ $m=1; while($rSubK=mysql_fetch_assoc($sSubK)){

      $nn=0;
	  if($rSubK['Period']=='Monthly' OR $rSubK['Period']=='Quarter' OR $rSubK['Period']=='1/2 Annual'){ $nn=1; $sqltt=mysql_query("select SUM(Ach) as tAch, SUM(LogScr) as tLogScr, SUM(Scor) as tScor from hrm_pms_kra_tgtdefin where KRASubId=".$rSubK['KRASubId'],$con); $restt=mysql_fetch_assoc($sqltt); }else{$nn=0;}
?>
<input type="hidden" id="KraId_<?php echo $Sno; ?>" Name="KraId_<?php echo $Sno; ?>" value="<?php echo $resK['KRAId']; ?>" />
<input type="hidden" id="SubKraId_<?php echo $Sno.'_'.$m; ?>" name="SubKraId_<?php echo $Sno.'_'.$m; ?>" value="<?php echo $rSubK['KRASubId']; ?>" />
<?php if($m==1){$n='(a)';}elseif($m==2){$n='(b)';}elseif($m==3){$n='(c)';}elseif($m==4){$n='(d)';}elseif($m==5){$n='(e)';} ?>
     <tr bgcolor="#FFFFFF" style="height:40px;">  
      <td align="center" class="fbody2"><b style="color:#006FDD;"><?php echo $n; ?></b>
	  <input type="hidden" id="KraIdNo_a<?php echo $Sno.'_'.$m; ?>">
	  <input type="hidden" id="WeightageKRA_<?php echo $Sno.'_'.$m; ?>" value="<?php echo $rSubK['Weightage']; ?>"/>
	  <input type="hidden" id="LogicKRA_<?php echo $Sno.'_'.$m; ?>" value="<?php echo $rSubK['Logic']; ?>"/>
	  <input type="hidden" id="PeriodKRA_<?php echo $Sno.'_'.$m; ?>" value="<?php echo $rSubK['Period']; ?>"/>
	  <input type="hidden" id="TargetKRA_<?php echo $Sno.'_'.$m; ?>" value="<?php echo $rSubK['Target']; ?>"/>
	  <input type="hidden" id="PrdN_<?php echo $Sno.'_'.$m; ?>"  value="<?php echo $nn; ?>" />
	  </td>
      <td class="fbody" valign="top"><?php echo $rSubK['KRA']; ?></td>
      <td class="fbody" valign="top"><?php echo $rSubK['KRA_Description']; ?></td>    
      <td align="center" class="fbody2"><?php echo $rSubK['Measure']; ?></td>
      <td align="center" class="fbody2"><?php echo $rSubK['Unit']; ?></td>
      <td align="center" class="fbody2"><?php echo $rSubK['Weightage']; ?></td>
      <td align="center" class="fbody2"><?php echo $rSubK['Logic']; ?></td>
      <td align="center" class="fbody2"><?php echo $rSubK['Period']; ?></td>
      <td align="center" class="fbody2"><span style="text-decoration:<?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){ echo 'underline'; }else{echo 'none';}?>;color:<?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){ echo '#000099'; }else{echo '#000';}?>;cursor:<?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){echo 'pointer';} ?>;" <?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){ ?> onClick="FunSubTgt(<?php echo $Sno.','.$m.','.$rSubK['KRASubId']; ?>,'<?php echo $rSubK['Period']; ?>',<?php echo $rSubK['Target'].','.intval($rSubK['Weightage']); ?>,'<?php echo $rSubK['Logic']; ?>')" <?php } ?> ><?php echo $rSubK['Target']; ?></span></td>
	  <?php /*?>onMouseOver="FunSubTgt(<?php echo $Sno.','.$m.','.$rSubK['KRASubId']; ?>,'<?php echo $rSubK['Period']; ?>',<?php echo $rSubK['Target'].','.intval($rSubK['Weightage']); ?>,'<?php echo $rSubK['Logic']; ?>')"<?php */?>
      <!--2222222222-->
  
      <?php if($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y'){ ?>
      <td align="center" class="fbody2" style="vertical-align:top;">
      <input name="SelfRating<?php echo $Sno.'_'.$m; ?>" id="SelfRating<?php echo $Sno.'_'.$m; ?>" class="input" style="width:60px;background-color:<?php if($resY['Emp_KRASave']=='N'){echo '#FFFFAE';}else{echo '#FFFFAE';}?>;text-align:center;" value="<?php if($nn==1){ echo floatval($restt['tAch']); }elseif($resY['Emp_KRASave']=='Y'){ if($_SESSION['eAppform']=='Y'){ echo $rSubK['SelfRating']; }elseif($_SESSION['eMidform']=='Y'){echo $rSubK['Mid_SelfRating']; } }elseif($resY['Emp_KRASave']=='N'){ echo '0'; }?>" <?php if($nn==0){ ?> onKeyUp="EnterEmpKraSub(<?php echo $Sno.','.$m; ?>)" onChange="EnterEmpKraSub(<?php echo $Sno.','.$m; ?>)" <?php } ?> maxlength="10" <?php if($resY['Emp_KRASave']=='Y' OR $nn==1){echo 'readonly';} ?> oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyPress="return isNumberKey(event)"/>
     </td>
	 <input type="hidden" class="input" id="EmpKRALogic<?php echo $Sno.'_'.$m; ?>" name="EmpKRALogic<?php echo $Sno.'_'.$m; ?>" style="width:60px;text-align:center;border:hidden;" value="<?php if($nn==1){ echo floatval($restt['tLogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo $rSubK['SelfKRALogic'];}elseif($_SESSION['eMidform']=='Y'){echo $rSubK['Mid_SelfKRALogic']; }else{echo 0;} ?>"  readonly/>
	 <input type="hidden" class="input" id="EmpKRAScore<?php echo $Sno.'_'.$m; ?>" name="EmpKRAScore<?php echo $Sno.'_'.$m; ?>" style="width:60px;text-align:center;border:hidden;" value="<?php if($nn==1){ echo floatval($restt['tScor']); }elseif($_SESSION['eAppform']=='Y'){ echo $rSubK['SelfKRAScore'];}elseif($_SESSION['eMidform']=='Y'){echo $rSubK['Mid_SelfKRAScore']; }else{echo 0;} ?>" readonly/>
	 
	 <?php /*?><td align="center" class="fbody2"><input type="text" class="input" id="EmpKRALogic<?php echo $Sno.'_'.$m; ?>" name="EmpKRALogic<?php echo $Sno.'_'.$m; ?>" style="width:60px;text-align:center;border:hidden;" value="<?php if($nn==1){ echo floatval($restt['tLogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo $rSubK['SelfKRALogic'];}elseif($_SESSION['eMidform']=='Y'){echo $rSubK['Mid_SelfKRALogic']; }else{echo 0;} ?>"  readonly/></td>
     <td align="center" class="fbody2"><input type="text" class="input" id="EmpKRAScore<?php echo $Sno.'_'.$m; ?>" name="EmpKRAScore<?php echo $Sno.'_'.$m; ?>" style="width:60px;text-align:center;border:hidden;" value="<?php if($nn==1){ echo floatval($restt['tScor']); }elseif($_SESSION['eAppform']=='Y'){ echo $rSubK['SelfKRAScore'];}elseif($_SESSION['eMidform']=='Y'){echo $rSubK['Mid_SelfKRAScore']; }else{echo 0;} ?>" readonly/></td><?php */?>
     <?php }else{ ?>
	 <input type="hidden" id="SelfRating<?php echo $Sno.'_'.$m; ?>" name="SelfRating<?php echo $Sno.'_'.$m; ?>"  readonly value="0"/><input type="hidden" id="EmpKRAScore<?php echo $Sno.'_'.$m; ?>" name="EmpKRAScore<?php echo $Sno.'_'.$m; ?>" value="0"  readonly/><input type="hidden" id="EmpKRALogic<?php echo $Sno.'_'.$m; ?>" name="EmpKRALogic<?php echo $Sno.'_'.$m; ?>" value="0"  readonly/>
     <?php } ?>

     <td align="center" class="fbody2">
     <textarea name="SelfRatingRemark<?php echo $Sno.'_'.$m; ?>" id="SelfRatingRemark<?php echo $Sno.'_'.$m; ?>" rows="2" <?php if($resY['Emp_KRASave']=='Y'){echo 'readonly';} ?> class="input" style="width:200px;background-color:<?php if($resY['Emp_KRASave']=='N'){echo '#FFFFAE';}else{echo '#FFFFAE';}?>;height:40px;"><?php if($_SESSION['eAppform']=='Y'){ echo $rSubK['AchivementRemark']; }elseif($_SESSION['eMidform']=='Y'){ echo $rSubK['Mid_AchivementRemark']; } ?></textarea>
     <input type="hidden" name="KRASubId<?php echo $Sno.'_'.$m; ?>" value="<?php echo $rSubK['KRASubId']; ?>"></textarea>
     </td>
   </tr> 
   <?php $m++;} $KrowSub=$m-1; ?> <input type="hidden" id="SnoSub<?php echo $Sno; ?>" name="SnoSub<?php echo $Sno; ?>" value="<?php echo $Sno; ?>" /><input type="hidden" name="KRowSub<?php echo $Sno; ?>" id="KRowSub<?php echo $Sno; ?>" value="<?php echo $KrowSub; ?>" />
   <?php /* While Close*/ ?>		 
  </table>
  </div> 
 </td>
</tr>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?> 
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?> 
<?php } ?> 
 
<?php $Sno++;} $Krow=$Sno-1; ?><input type="hidden" id="Sno" name="Sno" value="<?php echo $Sno; ?>" />
                               <input type="hidden" name="KRow" id="KRow" value="<?php echo $Krow; ?>" />
							   <input type="hidden" class="input" id="EmpFormAScore<?php echo $Sno; ?>" name="EmpFinalFormAScore" value="<?php if($_SESSION['eAppform']=='Y'){ echo $resY['EmpFormAScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resY['Mid_EmpFormAScore']; } ?>"  readonly/>
							   	  
 <?php /*?>...<tr>
  <td colspan="11" style="font-family:Times New Roman;font-size:14px;font-weight:bold;" align="right">Total:&nbsp;</td>
  <td><input type="text" class="input" style="text-align:center;width:60px;font-weight:bold;" id="EmpFormAScore<?php echo $Sno; ?>" name="EmpFinalFormAScore" value="<?php if($_SESSION['eAppform']=='Y'){ echo $resY['EmpFormAScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resY['Mid_EmpFormAScore']; } ?>" readonly/>
  </td>
 </tr>...<?php */?>
 
 <tr><td colspan="11">
    <table><tr>
    <td align="left" style="width:100px;">
    <?php if($resY['Emp_KRASave']=='N' AND $resY['Appraiser_PmsStatus']==0){ ?>
    <input type="Submit" name="SubmitFormA" id="SubmitFormA" class="sbutton" style="width:145px;" value="save as draft"/>
   <input type="button" id="EdSubFormA" style="width:90px;display:none;" class="sbutton" value="edit" onClick="editFormA()"/>
	<?php } if($resY['Emp_KRASave']=='Y' AND $resY['Emp_PmsStatus']==1) { ?>
    <input type="Submit" name="SubmitFormA" id="SubmitFormA" class="sbutton" style="width:150px;display:none;" value="save as draft"/><input type="button" id="EdSubFormA" style="width:90px;" class="sbutton" value="edit" onClick="editFormA()"/>
    <?php } ?>
    </td>
	<td> 
	
	<?php if($_SESSION['eAppform']=='Y'){ if($resY['Emp_AchivementSave']=='Y' AND $resY['Emp_KRASave']=='Y' AND $resY['Emp_SkillSave']=='Y' AND $resY['Emp_FeedBackSave']=='Y' AND $resY['Emp_PmsStatus']==1 AND ($resY['Appraiser_PmsStatus']==0 OR $resY['Appraiser_PmsStatus']==3)) { ?><input type="button" class="sbutton" name="FinalAppSubmit" id="FinalAppSubmit_4" value="final submit" style="width:100px;" onClick="FinalSubmit()"/><?php } ?>
	
    <?php }elseif($_SESSION['eMidform']=='Y'){ if($resY['Emp_KRASave']=='Y' AND $resY['Emp_SkillSave']=='Y' AND $resY['Emp_PmsStatus']==1 AND ($resY['Appraiser_PmsStatus']==0 OR $resY['Appraiser_PmsStatus']==3)) { ?><input type="button" name="FinalAppSubmit" id="FinalAppSubmit_4" value="final submit" class="sbutton" style="width:100px;" onClick="FinalSubmit()"/><?php } } ?>
    
    <?php /*
    <input type="button" id="EdSubFormA" class="sbutton" value="e" onClick="editFormA()"/>
	<input type="Submit" name="SubmitFormA" id="SubmitFormA" class="sbutton" value="d"/>
	<input type="button" class="sbutton" name="FinalAppSubmit" id="FinalAppSubmit_4" value="s" onClick="FinalSubmit()"/>
	
*/?>
    
	</td>
   </tr>
  </table>
  </td>		 
 </tr>
 </table>
 </td>
</form>   
<?php /****************************************** Form Close **************************/ ?>		   
  </tr>
 </table>
 </td>
 </tr>
<?php //******************************************** ?>    
  </table>
 </td>
</tr>					
<?php //********************************* Close **************************************** ?>					
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
 </td>
 </tr>
 
 <tr><td valign="top"><?php require_once("../footer.php"); ?></td></tr>
</table>
</td>
</tr>
</table>
</body>
</html>



