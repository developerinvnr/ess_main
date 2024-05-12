<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}else{header('Location:../index.php');}
/******************************************************************************/
//include("SetKraPmsy.php");

if(isset($_POST['SubmitResetFormB']))
{   $search =  '*"#$~/\':' ; $search = str_split($search); $n=$_POST['BRow'];  
	
	if($_SESSION['eAppform']=='Y')
	{
	  for($i=1; $i<=$n; $i++)
      { 
	   $CommentExamA=str_replace($search, "", $_POST['Comments_Example'.$i]);
       $sqlIns=mysql_query("update hrm_employee_pms_behavioralformb set SelfRating=".$_POST['BSelfRatingB'.$i].", SelfFormBLogic=".$_POST['EmpBLogic'.$i].", SelfFormBScore=".$_POST['BEmpBScore'.$i].", Comments_Example='".addslashes($CommentExamA)."' where BehavioralFormBId=".$_POST['BehaFormBId'.$i], $con);
      
          if($_POST['rowSubB'.$i]>0)
          {
	       for($j=1; $j<=$_POST['rowSubB'.$i]; $j++)
	       { 
	     $SRatRemark=str_replace($search, "", $_POST['Comments_Example'.$i."_".$j]);
	     $sqlUp=mysql_query("update hrm_employee_pms_behavioralformb_sub set SelfRating=".$_POST['BSelfRatingB'.$i."_".$j].", SelfFormBLogic=".$_POST['EmpBLogic'.$i."_".$j].", SelfFormBScore=".$_POST['BEmpBScore'.$i."_".$j].", AchivementRemark='".addslashes($SRatRemark)."' where FormBSubId=".$_POST['SubFormBId_'.$i."_".$j], $con); 
	       } 
          }	
            
      } 
	  if($sqlIns OR $sqlUp)
      {
	   $sqlUp=mysql_query("update hrm_employee_pms set Emp_SkillSave='Y', Emp_PmsStatus=1, EmpFormBScore=".$_POST['EmpFinalFormBScore']." where EmpPmsId=".$_SESSION['ePmsId'], $con);
	   $msg="Data saved successfully!";
	  }
	}
	elseif($_SESSION['eMidform']=='Y')
	{
	  for($i=1; $i<=$n; $i++)
      { 
	   $CommentExamA=str_replace($search, "", $_POST['Comments_Example'.$i]);
       $sqlIns=mysql_query("update hrm_employee_pms_behavioralformb set Mid_SelfRating=".$_POST['BSelfRatingB'.$i].", SelfFormBLogic=".$_POST['EmpBLogic'.$i].", Mid_SelfFormBScore=".$_POST['BEmpBScore'.$i].", Mid_Comments_Example='".addslashes($CommentExamA)."' where BehavioralFormBId=".$_POST['BehaFormBId'.$i], $con);
      } 
	  if($sqlIns)
      {
	   $sqlUp=mysql_query("update hrm_employee_pms set Emp_SkillSave='Y', Emp_PmsStatus=1, Mid_EmpFormBScore=".$_POST['EmpFinalFormBScore']." where EmpPmsId=".$_SESSION['ePmsId'], $con);
	   $msg="Data saved successfully!";
	  }
	}
	 
}

//*************************************/
include("EmpPmsFormSubmit.php");
//*************************************/
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<link type="text/css" href="css/mycss.css" rel="stylesheet"/>
<script type="text/javascript" language="javascript">
function editFormBY()
{ document.getElementById("SubmitResetFormB").style.display='block'; document.getElementById("FormBY").style.display='none'; 
  var BRowY=document.getElementById("BRow").value; 
  for(var i=1; i<=BRowY; i++) 
  {  
    if(document.getElementById("rowSubB"+i).value>0)
    {
     for(var j=1; j<=document.getElementById("rowSubB"+i).value; j++)
     { 
       if(document.getElementById("PrdN_"+i+"_"+j).value==0){ document.getElementById("BSelfRatingB"+i+"_"+j).readOnly=false; document.getElementById("BSelfRatingB"+i+"_"+j).style.background='#B9DCFF'; } document.getElementById("Comments_Example"+i+"_"+j).readOnly=false; document.getElementById("Comments_Example"+i+"_"+j).style.background='#B9DCFF'; 
     } 
   }
   else
   {
    if(document.getElementById("PrdN_"+i).value==0){ document.getElementById("BSelfRatingB"+i).readOnly=false; document.getElementById("BSelfRatingB"+i).style.background='#B9DCFF'; } document.getElementById("Comments_Example"+i).readOnly=false;   document.getElementById("Comments_Example"+i).style.background='#B9DCFF';
   }
  }
}


function ValidationFormB(SkillFormB)
{ 
  var FormBRow=document.getElementById("FormBRow").value;
  var SkillSave=document.getElementById("SkillSave").value;
  for(var i=1; i<=FormBRow; i++)
   { 

//if(document.getElementById("BSelfRatingB"+i).value>150){alert("Please check self rating value");return false; }
var Numfilter=/^[0-9. ]+$/;  var test_numB = Numfilter.test(document.getElementById("BSelfRatingB"+i).value)
if(test_numB==false){ alert('Please Enter Only Number in the self rating Field');  return false; }
if(document.getElementById("BSelfRatingB"+i).value>0 && document.getElementById("Comments_Example"+i).value==''){ alert('Please Enter Remark');  return false; }	
   }

  var agree=confirm("Are you sure you want to save form B?");
  if (agree) { return true;} else {return false;}
}		

 

function BEnterEmpFormB(i)
{ 
  var Weight = parseFloat(document.getElementById("BWeightageB"+i).value); 
  var Target = parseFloat(document.getElementById("BTargetB"+i).value); 
  var Rating = parseFloat(document.getElementById("BSelfRatingB"+i).value); 
  var EmpBScore = parseFloat(document.getElementById("BEmpBScore"+i).value); 
  var PeriodB = document.getElementById("PeriodB_"+i).value; 
  var lgc = document.getElementById("BLogicB_"+i).value; 
  
  if(lgc=='Logic1')
  {
   var Per50=Math.round(((Target*20)/100)*100)/100; var Per150=Math.round((Target+Per50)*100)/100;
   if(Rating<=Per150){var EScore=document.getElementById("EmpBLogic"+i).value=Rating;}
   else{var EScore=document.getElementById("EmpBLogic"+i).value=Per150;} 
   var MScore=document.getElementById("BEmpBScore"+i).value=Math.round(((EScore/Target)*Weight)*100)/100;
   if(MScore>0){document.getElementById("BEmpBScore"+i).value=MScore;}else{document.getElementById("BEmpBScore"+i).value=0;}
  }
  else if(lgc=='Logic2')
  {
   if(Rating<=Target){var EScore=document.getElementById("EmpBLogic"+i).value=Rating;}
   else{var EScore=document.getElementById("EmpBLogic"+i).value=Target;}
   var MScore=document.getElementById("BEmpBScore"+i).value=Math.round(((EScore/Target)*Weight)*100)/100;
   if(MScore>0){document.getElementById("BEmpBScore"+i).value=MScore;}else{document.getElementById("BEmpBScore"+i).value=0;}
  }
  else if(lgc=='Logic3')
  { 
   if(Rating==Target){var EScore=document.getElementById("EmpBLogic"+i).value=Rating;}
   else{var EScore=document.getElementById("EmpBLogic"+i).value=0;}
   var MScore=document.getElementById("BEmpBScore"+i).value=Math.round(((EScore/Target)*Weight)*100)/100;
   if(MScore>0){document.getElementById("BEmpBScore"+i).value=MScore;}else{document.getElementById("BEmpBScore"+i).value=0;}
  }
  else if(lgc=='Logic4')
  {
   if(Rating>=Target){var EScore=document.getElementById("EmpBLogic"+i).value=Target;}
   else{var EScore=document.getElementById("EmpBLogic"+i).value=0;}
   var MScore=document.getElementById("BEmpBScore"+i).value=Math.round(((EScore/Target)*Weight)*100)/100;
   if(MScore>0){document.getElementById("BEmpBScore"+i).value=MScore;}else{document.getElementById("BEmpBScore"+i).value=0;}
  }
  
  
  
  
  var EmpFormBRow=document.getElementById("BRow").value; var SnoB=document.getElementById("BSnoB").value;  
  var SUM = parseFloat(document.getElementById("FormBSum").value); 
  var FormBScore=parseFloat(document.getElementById("EmpFormBScore"+SnoB).value); 
  
  for(var i=1; i<=EmpFormBRow; i++)
  { 
    /*var FormBWeight = parseFloat(document.getElementById("BWeightageB"+i).value); var FormBTarget = parseFloat(document.getElementById("BTargetB"+i).value); var EmpFormBRating = parseFloat(document.getElementById("BSelfRatingB"+i).value); var EmpFormBScore = parseFloat(document.getElementById("BEmpBScore"+i).value); 
    var NewEmpFormBScore=document.getElementById("BEmpBScore"+i).value=Math.round(((EmpFormBRating/FormBTarget)*FormBWeight)*100)/100;*/ 
	var NewEmpFormBScore=document.getElementById("BEmpBScore"+i).value;
	var Score=document.getElementById("FormBScore"+i).value=Math.round((NewEmpFormBScore)*100)/100; //alert("aa");
  }
 
 var s1= parseFloat(document.getElementById("FormBScore"+1).value); var s2= parseFloat(document.getElementById("FormBScore"+2).value); var s3= parseFloat(document.getElementById("FormBScore"+3).value); var s4= parseFloat(document.getElementById("FormBScore"+4).value); var s5= parseFloat(document.getElementById("FormBScore"+5).value); var s6= parseFloat(document.getElementById("FormBScore"+6).value); var s7= parseFloat(document.getElementById("FormBScore"+7).value); var s8= parseFloat(document.getElementById("FormBScore"+8).value); var s9= parseFloat(document.getElementById("FormBScore"+9).value); var s10= parseFloat(document.getElementById("FormBScore"+10).value); var s11= parseFloat(document.getElementById("FormBScore"+11).value); var s12= parseFloat(document.getElementById("FormBScore"+12).value); var s13= parseFloat(document.getElementById("FormBScore"+13).value); var s14= parseFloat(document.getElementById("FormBScore"+14).value); var s15= parseFloat(document.getElementById("FormBScore"+15).value); var s16= parseFloat(document.getElementById("FormBScore"+16).value); var s17= parseFloat(document.getElementById("FormBScore"+17).value); var s18= parseFloat(document.getElementById("FormBScore"+18).value); var s19= parseFloat(document.getElementById("FormBScore"+19).value); var s20= parseFloat(document.getElementById("FormBScore"+20).value);
  var P = document.getElementById("FormBSum").value=Math.round((s1+s2+s3+s4+s5+s6+s7+s8+s9+s10+s11+s12+s13+s14+s15+s16+s17+s18+s19+s20)*100)/100; document.getElementById("EmpFormBScore"+SnoB).value=Math.round((P)*100)/100; 
}		

function FinalSubmit() { var agree=confirm("Are you sure you want to submit appraisal form.?");
if (agree) { var x = "EmpPmsFormB.php?action=submit&ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&fr=0&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=0&ffeedb=1&org=1";  window.location=x;}}			 


function printpage(PmsId,EmpId) 
{ window.open ("EmpAppFormPrint.php?PmsId="+PmsId+"&EmpId="+EmpId,"AppForm","menubar=yes,scrollbars=yes,resizable=1,width=1200,height=600");}

function UploadEmpfile(p,e,y)
{ window.open("UploadAppFileEmp.php?action=up&P="+p+"&E="+e+"&Y="+y,"UploadFile","menubar=no,scrollbars=yes,resizable='no',width=650,height=500");} 

function OpenWindow()
{var CI=document.getElementById("ComId").value; var YI=document.getElementById("YId").value; 
 window.open("AppraisalSchedule.php?C="+CI+"&Y="+YI,"Schedule","menubar='no',resizable=1,width=850,height=350");}

function OpenHelpfile(value){window.open("HelpFile.php?a=open&v="+value,"HelpFile","width=800,height=650"); }
function OpenFaqfile(value){window.open("HelpFile.php?a=FaqOpen&v="+value,"HelpFile","width=800,height=650"); }


function FunFormBTgt(sn,yid,fbid,prd,tgt,wgt,lgc)
{ var e=document.getElementById("e").value; var c=document.getElementById("ComId").value; 
  document.getElementById('tsn').value=sn; 
  var win = window.open("setkratgtformbpms.php?act=setkratgt&n=1&valueins=true&checkalpha=false&d=12&pa=4&y=2&fbid="+fbid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&lgc="+lgc+"&wgt="+wgt+"&yid="+yid+"&c="+c, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=600"); 
  var timer = setInterval( function()
                          {   
						   if(win.closed) 
						   { clearInterval(timer); var url = 'setkratgtformbactpms.php'; var pars = 'tact=tgtact&n==1&fbid='+fbid+'&sn='+sn+'&e='+e+'&yid='+yid; var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_NewDE }); } 
						  }, 1000); 
  
}
function show_NewDE(originalRequest)
{ document.getElementById('NewSpam').innerHTML = originalRequest.responseText;  
 document.getElementById('BSelfRatingB'+document.getElementById('tsn').value).value=document.getElementById('tLogScr').value;
  document.getElementById('BEmpBScore'+document.getElementById('tsn').value).value=document.getElementById('tScor').value;
  document.getElementById('EmpBLogic'+document.getElementById('tsn').value).value=document.getElementById('tLogScr').value;
  FunCal();
} 


function FunFormBSubTgt(sn,sn2,yid,fbid,prd,tgt,wgt,lgc)
{ var e=document.getElementById("e").value; var c=document.getElementById("ComId").value; 
  document.getElementById('tsn').value=sn; document.getElementById('tsn2').value=sn2;
  var win = window.open("setkratgtformbpms.php?act=setkratgt&n=2&valueins=true&checkalpha=false&d=12&pa=4&y=2&fbid="+fbid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&lgc="+lgc+"&wgt="+wgt+"&yid="+yid+"&c="+c, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=600"); 
  var timer = setInterval( function()
                          {   
						   if(win.closed) 
						   { clearInterval(timer); var url = 'setkratgtformbactpms.php'; var pars = 'tact=subtgtact&n==2&fbid='+fbid+'&sn='+sn+'&sn2='+sn2+'&e='+e+'&yid='+yid; var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_NewDEE }); } 
						  }, 1000);
  
} 
function show_NewDEE(originalRequest)
{ document.getElementById('NewSpam').innerHTML = originalRequest.responseText;

document.getElementById('BSelfRatingB'+document.getElementById('tsn').value+'_'+document.getElementById('tsn2').value).value=document.getElementById('tLogScr').value; 
  
  document.getElementById('BEmpBScore'+document.getElementById('tsn').value+'_'+document.getElementById('tsn2').value).value=document.getElementById('tScor').value;
  document.getElementById('EmpBLogic'+document.getElementById('tsn').value+'_'+document.getElementById('tsn2').value).value=document.getElementById('tLogScr').value;
  FunCal();
}

function FunCal()
{
 for(var i=1; i<=document.getElementById("BRow").value; i++) 
 { 
  if(document.getElementById("rowSubB"+i).value>0)
  { 
   for(var j=1; j<=document.getElementById("rowSubB"+i).value; j++)
   {document.getElementById("BEmpBScoreSub"+i+"_"+j).value=document.getElementById("BEmpBScore"+i+"_"+j).value;}
     
   var s1s= parseFloat(document.getElementById("BEmpBScoreSub"+i+"_1").value); var s2s= parseFloat(document.getElementById("BEmpBScoreSub"+i+"_2").value); var s3s= parseFloat(document.getElementById("BEmpBScoreSub"+i+"_3").value); var s4s= parseFloat(document.getElementById("BEmpBScoreSub"+i+"_4").value); var s5s= parseFloat(document.getElementById("BEmpBScoreSub"+i+"_5").value); document.getElementById("BEmpBScore"+i).value=Math.round((s1s+s2s+s3s+s4s+s5s)*100)/100; document.getElementById("FormBScore"+i).value=Math.round((s1s+s2s+s3s+s4s+s5s)*100)/100;
  }
 }
 FunCal2();
}


function FunCal2()
{
 var Sno=document.getElementById("BSnoB").value;
 for(var i=1; i<=document.getElementById("BRow").value; i++) 
 { 
 document.getElementById("FormBScore"+i).value=document.getElementById("BEmpBScore"+i).value; }
 var s1= parseFloat(document.getElementById("FormBScore"+1).value); var s2= parseFloat(document.getElementById("FormBScore"+2).value); var s3= parseFloat(document.getElementById("FormBScore"+3).value); var s4= parseFloat(document.getElementById("FormBScore"+4).value); var s5= parseFloat(document.getElementById("FormBScore"+5).value); var s6= parseFloat(document.getElementById("FormBScore"+6).value); var s7= parseFloat(document.getElementById("FormBScore"+7).value); var s8= parseFloat(document.getElementById("FormBScore"+8).value); var s9= parseFloat(document.getElementById("FormBScore"+9).value); var s10= parseFloat(document.getElementById("FormBScore"+10).value); var s11= parseFloat(document.getElementById("FormBScore"+11).value); var s12= parseFloat(document.getElementById("FormBScore"+12).value); var s13= parseFloat(document.getElementById("FormBScore"+13).value); var s14= parseFloat(document.getElementById("FormBScore"+14).value); var s15= parseFloat(document.getElementById("FormBScore"+15).value); var s16= parseFloat(document.getElementById("FormBScore"+16).value); var s17= parseFloat(document.getElementById("FormBScore"+17).value); var s18= parseFloat(document.getElementById("FormBScore"+18).value); var s19= parseFloat(document.getElementById("FormBScore"+19).value); var s20= parseFloat(document.getElementById("FormBScore"+20).value);
 var q = document.getElementById("FormBSum").value=Math.round((s1+s2+s3+s4+s5+s6+s7+s8+s9+s10+s11+s12+s13+s14+s15+s16+s17+s18+s19+s20)*100)/100; document.getElementById("EmpFormBScore"+Sno).value=Math.round((q)*100)/100;
}


<!--
function doBlink() {
	var blink = document.all.tags("BLINK")
	for (var i=0; i<blink.length; i++)
		blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : "" 
}

function startBlink() {
	if (document.all)
		setInterval("doBlink()",1000)
}
window.onload = startBlink;
// -->
</script>  
</head>
<body class="body">
<span id="NewSpam"></span> 
<input type="hidden" id="tsn" value="0" /><input type="hidden" id="tsn2" value="0" />
<input type="hidden" id="e" value="<?php echo $EmployeeId; ?>"/>
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $resSYP['CurrY']; ?>" />
<input type="hidden" name="KraYId" id="KraYId" value="<?php echo $_SESSION['KraYId']; ?>" /> 
<input type="hidden" name="PmsYId" id="PmsYId" value="<?php echo $_SESSION['PmsYId']; ?>" />
<?php for($j=1; $j<=20; $j++) { ?><input type="hidden" id="FormBScore<?php echo $j; ?>" value="0" /><?php } ?>
<input type="hidden" id="FormBSum" value="0"/>  
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
<?php /****************************************** Form Start **************************/ ?>
<?php /****************************************** Form Start **************************/ ?>	 
<form name="SkillFormB" method="post" onSubmit="return ValidationFormB(this)"> 
<td id="FormB" style="" width="100%">
<table border="0" width="100%">
 <?php if($_SESSION['eAppform']=='Y'){ ?><tr><td colspan="9" align="center" class="fhead" style="color:#000084;width:100%;" valign="middle">Rate your Competency level for current role as listed below. Self rating shall be in % against the 100% target Score. Score = rating/target*Weightage &nbsp;<?php if($_REQUEST['fb']==0){ ?>
   <script>function FunLog(){ window.open("viewlogic.php", "F", "menubar=no, scrollbars=yes, resizable=no, directories=no, width=1000, height=500");}</script><input type="button" style="width:90px;background-color:#99CC00;font-weight:bold;" value="Logic" onClick="FunLog()"/><?php } ?></td></tr><?php } ?>
  
 <tr bgcolor="#FFFF53" style="height:22px;">   
  <td class="fhead" style="width:40px;">SNo.</td>
  <td class="fhead" style="width:250px;">Behavioral/Skills</td>
  <td class="fhead" style="width:550px;">Description</td>
  <td class="fhead" style="width:60px;">Weightage</td>
  <td class="fhead" style="width:60px;">Logic</td>
  <td class="fhead" style="width:60px;">Period</td>
  <td class="fhead" style="width:60px;">Target</td>
 <?php if($_SESSION['eAppform']=='Y'){?>
  <td class="fhead" style="width:80px;">Self<br>Rating</td>
  <?php /*?><td class="font" align="center" style="width:60px;">Score</td><?php */?>
 <?php } ?>
  <td class="font" align="center" style="width:100px;">Comments</td>
 </tr>
 
<?php echo '<input type="hidden" id="SkillSave" value="'.$resY['Emp_SkillSave'].'" />';
$sqlBY=mysql_query("select fbf.*,fb.Skill,fb.SkillComment,fb.Weightage,fb.Logic,fb.Period,fb.Target from hrm_employee_pms_behavioralformb fbf inner join hrm_pms_formb fb on fbf.FormBId=fb.FormBId where fbf.EmpId=".$EmployeeId." AND fbf.YearId=".$_SESSION['PmsYId']." order by fbf.BehavioralFormBId ASC", $con);	  
$SnoB=1; while($resBY=mysql_fetch_array($sqlBY)){ 

$sSubB22=mysql_query("select * from hrm_pms_formbsub where FormBId=".$resBY['FormBId']." AND BSubStatus='A' order by FormBSubId ASC",$con); $rowSubB=mysql_num_rows($sSubB22); 

$n=0; 
if($resBY['Period']=='Monthly' OR $resBY['Period']=='Quarter' OR $resBY['Period']=='1/2 Annual'){ $n=1; $sqlt=mysql_query("select SUM(Ach) as tAch, SUM(LogScr) as tLogScr, SUM(Scor) as tScor from hrm_pms_formb_tgtdefin where EmployeeID=".$EmployeeId." AND YearId=".$_SESSION['PmsYId']." AND FormBId=".$resBY['FormBId'],$con); $rest=mysql_fetch_assoc($sqlt); }else{$n=0;}

?>
<input type="hidden" id="rowSubB<?php echo $SnoB; ?>" name="rowSubB<?php echo $SnoB; ?>" value="<?php echo $rowSubB; ?>" />
<input type="hidden" name="BehaFormBId<?php echo $SnoB;?>" value="<?php echo $resBY['BehavioralFormBId'];?>"/>
<input type="hidden" name="BWeightageB<?php echo $SnoB;?>" id="BWeightageB<?php echo $SnoB;?>" value="<?php echo $resBY['Weightage']; ?>" readonly/>
<input type="hidden" name="BTargetB<?php echo $SnoB;?>" id="BTargetB<?php echo $SnoB;?>" value="<?php echo $resBY['Target']; ?>" readonly/><input type="hidden" name="BLogicB_<?php echo $SnoB;?>" id="BLogicB_<?php echo $SnoB;?>" value="<?php echo $resBY['Logic'];?>" /><input type="hidden" name="PeriodB_<?php echo $SnoB;?>" id="PeriodB_<?php echo $SnoB;?>" value="<?php echo $resBY['Period'];?>" /><input type="hidden" name="PrdN_<?php echo $SnoB;?>" id="PrdN_<?php echo $SnoB;?>"  value="<?php echo $n;?>" />
 <tr bgcolor="#FFFFFF" style="height:40px;">   
  <td class="fbody" align="center"><?php echo $SnoB; ?></td>	  
  <td class="fbody"><?php echo $resBY['Skill'] ?></td>
  <td class="fbody"><?php echo $resBY['SkillComment']; ?></td>
  <td class="fbody" align="center"><?php echo $resBY['Weightage']; ?></td>
  <td class="fbody" align="center"><?php echo $resBY['Logic']; ?></td>
  <td class="fbody" align="center"><?php echo $resBY['Period']; ?></td>
  <td class="fbody" align="center"><span <?php if($resBY['Period']!='Annual' AND $resBY['Period']!=''){ echo 'style="cursor:pointer;text-decoration:underline;color:#000099;"';} if($resBY['Period']!='Annual' AND $resBY['Period']!=''){ ?> onClick="FunFormBTgt(<?php echo $SnoB.', '.$_SESSION['PmsYId'].','.$resBY['FormBId']; ?>,'<?php echo $resBY['Period']; ?>',<?php echo $resBY['Target'].','.intval($resBY['Weightage']); ?>,'<?php echo $resBY['Logic']; ?>')" <?php } ?>  ><?php echo $resBY['Target']; ?></span></td>
 
 <?php if($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y'){ ?>
 
  <td class="font1" valign="top" align="center" style="width:80px;"><input type="<?php if($rowSubB>0){echo 'hidden';}else{echo 'text';} ?>" name="BSelfRatingB<?php echo $SnoB; ?>" id="BSelfRatingB<?php echo $SnoB; ?>" class="input" style="width:80px;background-color:<?php if($rowSubB>0){echo '#FFFFFF';}elseif($resY['Emp_SkillSave']=='N'){echo '#FFFFAE';}else{echo '#FFFFAE';}?>;text-align:center;" value="<?php if($n==1){ echo floatval($rest['tLogScr']); }elseif($resY['Emp_SkillSave']=='Y'){ if($_SESSION['eAppform']=='Y'){ echo $resBY['SelfRating']; } }elseif($resY['Emp_SkillSave']=='N'){ echo '0'; }?>" <?php if($resY['Emp_SkillSave']=='Y'){echo 'readonly';} ?> onKeyUp="BEnterEmpFormB(<?php echo $SnoB; ?>)" onChange="BEnterEmpFormB(<?php echo $SnoB; ?>)" maxlength="5" Add input field: oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" <?php if($rowSubB>0 OR $n==1){ echo 'readonly'; } ?> onKeyPress="return isNumberKey(event)"/>
  	  
	<input type="hidden" class="input" id="EmpBLogic<?php echo $SnoB; ?>" name="EmpBLogic<?php echo $SnoB; ?>" style="width:60px;text-align:center;border:hidden;" value="<?php if($rowSubB>0){echo '';}elseif($n==1){ echo floatval($rest['tLogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo $resBY['SelfFormBLogic'];}elseif($_SESSION['eMidform']=='Y'){echo $resK['Mid_SelfFormBLogic']; }else{echo 0;} ?>"  readonly/> 
	  
	<input type="hidden" style="font:Georgia; font-size:12px; width:60px; height:20px;text-align:center;border:hidden;" id="BEmpBScore<?php echo $SnoB; ?>" name="BEmpBScore<?php echo $SnoB; ?>" value="<?php if($n==1){ echo floatval($rest['tScor']); }elseif($_SESSION['eAppform']=='Y'){ echo $resBY['SelfFormBScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resBY['Mid_SelfFormBScore']; } ?>"  readonly/>
  </td>
  <?php /*?><td class="font1" valign="top" align="center" style="width:60px;"><input type="text" style="font:Georgia; font-size:12px; width:60px; height:20px;text-align:center;border:hidden;" id="BEmpBScore<?php echo $SnoB; ?>" name="BEmpBScore<?php echo $SnoB; ?>" value="<?php if($_SESSION['eAppform']=='Y'){ echo $resBY['SelfFormBScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resBY['Mid_SelfFormBScore']; } ?>"  readonly/></td><?php */?>
 <?php }else{ ?>
  <input type="hidden" name="BSelfRatingB<?php echo $SnoB; ?>" id="BSelfRatingB<?php echo $SnoB; ?>" value="0"/>
  <input type="hidden" id="BEmpBScore<?php echo $SnoB; ?>" name="BEmpBScore<?php echo $SnoB; ?>" value="0"  />
 <?php } ?>
	  
  <td class="font1" valign="top" align="" style="width:100px;">
  <?php if($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y'){ ?>
  <?php if($rowSubB>0){?>
   <input type="hidden" class="input" name="Comments_Example<?php echo $SnoB; ?>" id="Comments_Example<?php echo $SnoB; ?>" cols="25" rows="2" style="background-color:#FFFFAE;height:60px;" readonly ><?php  if($_SESSION['eAppform']=='Y'){echo $resBY['Comments_Example'];}elseif($_SESSION['eMidform']=='Y'){ echo $resBY['Mid_Comments_Example']; } ?>  
  <?php }else{ ?>
   <textarea class="input" name="Comments_Example<?php echo $SnoB; ?>" id="Comments_Example<?php echo $SnoB; ?>" cols="25" rows="2" style="background-color:#FFFFAE;height:60px;" readonly ><?php  if($_SESSION['eAppform']=='Y'){echo $resBY['Comments_Example'];}elseif($_SESSION['eMidform']=='Y'){ echo $resBY['Mid_Comments_Example']; } ?></textarea>  
  <?php } ?> 
  <?php } ?> 
  </td>
 </tr>  

<?php for($i=1; $i<=5; $i++) { ?>
<input type="hidden" id="BEmpBScoreSub<?php echo $SnoB."_".$i; ?>" value="0" /><?php } ?> 
<?php  
if($rowSubB>0)
{
  while($rSubB22=mysql_fetch_assoc($sSubB22))
  {
  $sqlChk=mysql_query("select * from hrm_employee_pms_behavioralformb_sub where FormBSubId=".$rSubB22['FormBSubId']." AND EmpId=".$EmployeeId." AND YearId=".$_SESSION['PmsYId'],$con); $rowChk=mysql_num_rows($sqlChk);
if($rowChk==0){$sins=mysql_query("insert into hrm_employee_pms_behavioralformb_sub(FormBSubId, EmpId, YearId) values(".$rSubB22['FormBSubId'].", ".$EmployeeId.", ".$_SESSION['PmsYId'].")",$con);}
  }
?>   
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
  
 <tr>
  <td colspan="9" align="right" style="border:hidden;border-style:none;">
  <div id="Div<?php echo $SnoB; ?>" style="display:<?php if($rowSubB>0){echo 'block';}else{echo 'none';} ?>;">
     <table style="width:95%;background-color:#71FF71;" border="0" cellpadding="0" cellspacing="1"> 
     <tr style="background-color:#71FF71;">   
      <td class="fhead2" style="width:40px;">SNo</td>
      <td class="fhead2" style="width:250px;">Sub Skill</td>
      <td class="fhead2" style="width:350px;">Sub Skill Description</td>  
      <td class="fhead2" style="width:60px;">Weightage</td>
	  <td class="fhead2" style="width:60px;">Logic</td>
	  <td class="fhead2" style="width:80px;">Period</td>
      <td class="fhead2" style="width:60px;">Target</td>
	  <?php if($_SESSION['eAppform']=='Y'){ ?>
       <td class="fhead2" style="width:60px;">Self<br>Rating</td>
      <?php } ?>
	  <td class="fhead2" style="width:200px;">Remarks</td>
     </tr>

<?php if($rowSubK==0){$num=5;}elseif($rowSubK==1){$num=4;}elseif($rowSubK==2){$num=3;}elseif($rowSubK==3){$num=2;}elseif($rowSubK==4){$num=1;}elseif($rowSubK==5){$num=0;} ?>

<?php 
$sSubB=mysql_query("select * from hrm_employee_pms_behavioralformb_sub s inner join hrm_pms_formbsub bb on s.FormBSubId=bb.FormBSubId where s.EmpId=".$EmployeeId." AND s.YearId=".$_SESSION['PmsYId'],$con); /* While Open*/ $m=1; while($rSubB=mysql_fetch_assoc($sSubB)){ 

$nn=0;
	  if($rSubB['Period']=='Monthly' OR $rSubB['Period']=='Quarter' OR $rSubB['Period']=='1/2 Annual'){ $nn=1; 
	  
	  $sqltt=mysql_query("select SUM(Ach) as tAch, SUM(LogScr) as tLogScr, SUM(Scor) as tScor from hrm_pms_formb_tgtdefin where EmployeeID=".$EmployeeId." AND YearId=".$_SESSION['PmsYId']." AND FormBSubId=".$rSubB['FormBSubId'],$con); $restt=mysql_fetch_assoc($sqltt); }else{$nn=0;}

?>

  <input type="hidden" id="FormBId_<?php echo $SnoB; ?>" value="<?php echo $resPer['FormBId']; ?>" />
  
  
  
  <tr style="background-color:#FFFFFF;">  
<?php if($m==1){$n='a';}elseif($m==2){$n='b';}elseif($m==3){$n='c';}elseif($m==4){$n='d';}elseif($m==5){$n='e';} ?>  
  <td align="center" class="fbody2"><?php echo $n; ?></b>
  <input type="hidden" name="SubFormBId_<?php echo $SnoB.'_'.$m; ?>" id="SubFormBId_<?php echo $SnoB.'_'.$m; ?>" value="<?php echo $rSubB['FormBSubId']; ?>" /> 
  <input type="hidden" id="FormBIdNo_a<?php echo $SnoB.'_'.$m; ?>">
  <input type="hidden" id="WWei_a<?php echo $SnoB.'_'.$m; ?>" value="<?php echo $rSubB['Weightage']; ?>"/>
  <input type="hidden" id="Log_a<?php echo $SnoB.'_'.$m; ?>" value="<?php echo $rSubB['Logic']; ?>"/>
  <input type="hidden" id="Per_a<?php echo $SnoB.'_'.$m; ?>" value="<?php echo $rSubB['Period']; ?>"/>
  <input type="hidden" id="Tar_a<?php echo $SnoB.'_'.$m; ?>" value="<?php echo $rSubB['Target']; ?>"/>
  <input type="hidden" id="PrdN_<?php echo $SnoB.'_'.$m; ?>"  value="<?php echo $nn; ?>" />
  </td>
  <td class="fbody" valign="top"><?php echo $rSubB['Skill']; ?></td>
  <td class="fbody" valign="top"><?php echo $rSubB['SkillComment']; ?></td>  
  <td align="center" class="fbody2"><?php echo $rSubB['Weightage']; ?></td>
  <td align="center" class="fbody2"><?php echo $rSubB['Logic']; ?></td>
  <td align="center" class="fbody2"><?php echo $rSubB['Period']; ?></td>
  
  <td align="center" class="fbody2">
  <span style="cursor:<?php if($rSubB['Period']!='Annual' AND $rSubB['Period']!=''){echo 'pointer';} ?>;text-align:center;text-decoration:<?php if($rSubB['Period']!='Annual' AND $rSubB['Period']!=''){ echo 'underline'; }?>;color:<?php if($rSubB['Period']!='Annual' AND $rSubB['Period']!=''){ echo '#000099'; }?>;" <?php if($rSubB['Period']!='Annual' AND $rSubB['Period']!=''){ ?> onClick="FunFormBSubTgt(<?php echo $SnoB.','.$m.','.$_SESSION['PmsYId'].','.$rSubB['FormBSubId']; ?>,'<?php echo $rSubB['Period']; ?>',<?php echo $rSubB['Target'].','.intval($rSubB['Weightage']); ?>,'<?php echo $rSubB['Logic']; ?>')" <?php } ?>><?php echo intval($rSubB['Target']); ?></span>
  
  </td>
    
  <?php if($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y'){ ?>
  <td class="font1" valign="top" align="center" style="width:80px;"><?php if($_SESSION['eAppform']=='Y'){ ?><input name="BSelfRatingB<?php echo $SnoB.'_'.$m; ?>" id="BSelfRatingB<?php echo $SnoB.'_'.$m; ?>" class="input" style="width:80px;background-color:#FFFFAE;text-align:center;" readonly value="<?php if($nn==1){ echo floatval($restt['tLogScr']); }elseif($resY['Emp_SkillSave']=='Y'){ if($_SESSION['eAppform']=='Y'){ echo $rSubB['SelfRating']; } }elseif($rSubB['Emp_SkillSave']=='N'){ echo '0'; }?>" <?php if($resY['Emp_SkillSave']=='Y'){echo 'readonly';} ?> onKeyUp="BEnterEmpFormBSub(<?php echo $SnoB.','.$m; ?>)" onChange="BEnterEmpFormBSub(<?php echo $SnoB.','.$m; ?>)" maxlength="5" Add input field: oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" <?php if($nn==1){ echo 'readonly'; } ?> onKeyPress="return isNumberKey(event)"/>
  <?php } ?>
	  
	<input type="hidden" class="input" id="EmpBLogic<?php echo $SnoB.'_'.$m; ?>" name="EmpBLogic<?php echo $SnoB.'_'.$m; ?>" style="width:60px;text-align:center;border:hidden;" value="<?php if($nn==1){ echo floatval($restt['tLogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo $rSubB['SelfFormBLogic'];}elseif($_SESSION['eMidform']=='Y'){echo $rSubB['Mid_SelfFormBLogic']; }else{echo 0;} ?>"  readonly/> 
	  
	<input type="hidden" style="font:Georgia; font-size:12px; width:60px; height:20px;text-align:center;border:hidden;" id="BEmpBScore<?php echo $SnoB.'_'.$m; ?>" name="BEmpBScore<?php echo $SnoB.'_'.$m; ?>" value="<?php if($nn==1){ echo floatval($restt['tScor']); }elseif($_SESSION['eAppform']=='Y'){ echo $rSubB['SelfFormBScore'];}elseif($_SESSION['eMidform']=='Y'){echo $rSubB['Mid_SelfFormBScore']; } ?>"  readonly/>
  </td>
 <?php }else{ ?>
 <input type="hidden" name="BSelfRatingB<?php echo $SnoB.'_'.$m; ?>" id="BSelfRatingB<?php echo $SnoB.'_'.$m; ?>" value="0"/>
  <input type="hidden" id="BEmpBScore<?php echo $SnoB.'_'.$m; ?>" name="BEmpBScore<?php echo $SnoB.'_'.$m; ?>" value="0"  />
 <?php } ?>
	  
  <td class="font1" valign="top" align="" style="width:100px;">
   <textarea class="input" name="Comments_Example<?php echo $SnoB.'_'.$m; ?>" id="Comments_Example<?php echo $SnoB.'_'.$m; ?>" cols="25" rows="2" style="background-color:#FFFFAE;height:60px;" readonly ><?php  if($_SESSION['eAppform']=='Y'){echo $rSubB['AchivementRemark'];}elseif($_SESSION['eMidform']=='Y'){ echo $rSubB['AchivementRemark']; } ?></textarea>  
  </td>
  
  
</tr> 
<?php $m++;} ?>	
<?php /* While Close*/ ?>	

     </table>
  </div> 
  </td>
 </tr>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?> 
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?> 
<?php } ?> 
 
 
 
<?php $SnoB++;} $FormBRow=$SnoB-1; ?>
 <input type="hidden" id="BSnoB" name="BSnoB" value="<?php echo $SnoB; ?>" />
 <input type="hidden" name="BRow" id="BRow" value="<?php echo $FormBRow; ?>" />
 <input type="hidden" name="FormBRow" id="FormBRow" value="<?php echo $FormBRow; ?>" /> 
 <tr>
  <?php /*?><td colspan="6" style="font-family:Times New Roman;font-size:14px;font-weight:bold;" align="right">Total:&nbsp;</td><?php */?>
  <td><input type="hidden" class="input" style="text-align:center;width:60px;font-weight:bold;" id="EmpFormBScore<?php echo $SnoB; ?>" name="EmpFinalFormBScore" value="<?php if($_SESSION['eAppform']=='Y'){ echo $resY['EmpFormBScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resY['Mid_EmpFormBScore']; } ?>" readonly/>
  </td>
 </tr>									 
									 
 <tr>
  <td colspan="9">
  <table>
   <tr>
    <td colspan="9" align="left" style="width:100px;">
	<?php if($resY['Emp_PmsStatus']!=2) { ?><input type="Submit" name="SubmitResetFormB" id="SubmitResetFormB" class="sbutton" style="width:150px;display:none;" value="save as draft"/><input type="button" id="FormBY" style="width:90px;" class="sbutton" value="edit" onClick="editFormBY()"/>
	<?php } ?>
	
	<?php /*
	<input type="Submit" name="SubmitResetFormB" id="SubmitResetFormB" class="sbutton" style="width:150px;display:none;" value=".."/><input type="button" id="FormBY" style="width:90px;" class="sbutton" value="." onClick="editFormBY()"/>
	<input type="button" class="sbutton" name="FinalAppSubmit" id="FinalAppSubmit_4" value="..." style="width:100px;" onClick="FinalSubmit()"/>
	*/ ?>
    </td>
    <td>
	<?php if($_SESSION['eAppform']=='Y'){ if($resY['Emp_AchivementSave']=='Y' AND $resY['Emp_KRASave']=='Y' AND $resY['Emp_SkillSave']=='Y' AND $resY['Emp_FeedBackSave']=='Y' AND $resY['Emp_PmsStatus']==1 AND ($resY['Appraiser_PmsStatus']==0 OR $resY['Appraiser_PmsStatus']==3)){?><input type="button" class="sbutton" name="FinalAppSubmit" id="FinalAppSubmit_4" value="final submit" style="width:100px;" onClick="FinalSubmit()"/><?php }   
	 }elseif($_SESSION['eMidform']=='Y'){ if($resY['Emp_KRASave']=='Y' AND $resY['Emp_SkillSave']=='Y' AND $resY['Emp_PmsStatus']==1 AND ($resY['Appraiser_PmsStatus']==0 OR $resY['Appraiser_PmsStatus']==3)) { ?><input type="button" name="FinalAppSubmit" id="FinalAppSubmit_4" value="final submit" style="width:100px;" class="sbutton" onClick="FinalSubmit()"/><?php } } ?>
    </td>
   </tr>
  </table>
  </td>
 </tr> 	  	 	  
</table>
</td>
</form>   
<?php /****************************************** Form Close **************************/ ?>
<?php /****************************************** Form Close **************************/ ?>		   
		</tr>
	  </table>
	</td>
   </tr>   
  </table>
 </td>
</tr>	
</table>				
<?php //*************************************** Close ********************************************* ?>
<?php //*************************************** Close ********************************************* ?>					
	 </td>
	</tr>
  </table>
  </td>
 </tr>
</table>
<?php //******************************************************** ?>	   
<?php //******************************************************** ?>
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



