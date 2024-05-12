<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}else{header('Location:../index.php');}
//include("SetKraPmsy.php");
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<link type="text/css" href="css/mycss.css" rel="stylesheet"/>
<script type="text/javascript" language="javascript">
function RevEnterFormA()
{
 var RevFormA=parseFloat(document.getElementById("ReviewerFormAScore").value); 
 var RevFormB=parseFloat(document.getElementById("ReviewerFormBScore").value); 
 var Score_1=parseFloat(document.getElementById("Score_1").value); 
 var Score_2=parseFloat(document.getElementById("Score_2").value);
 var Weight_A=parseFloat(document.getElementById("weight_A").value); 
 var Weight_B=parseFloat(document.getElementById("weight_B").value);
 var FormA=document.getElementById("FormAScore").value=Math.round((RevFormA)*100)/100;
 var FormB=document.getElementById("FormBScore").value=Math.round((RevFormB)*100)/100;
 var Score1=document.getElementById("Score_1").value=Math.round(((FormA*Weight_A)/100)*100)/100;
 var Score2=document.getElementById("Score_2").value=Math.round(((FormB*Weight_B)/100)*100)/100;
 var Score12=document.getElementById("TotalScore_12").value=Math.round((Score1+Score2)*100)/100;
 var Rating12=parseFloat(document.getElementById("TotalRating_12").value);
 var Num = parseFloat(document.getElementById("Number").value);
 for(var i=1; i<=Num; i++) 
 { SFrom = parseFloat(document.getElementById("SFrom_"+i).value); STo = parseFloat(document.getElementById("STo_"+i).value);
   Rating = parseFloat(document.getElementById("Rating_"+i).value); 
   if(Score12>=SFrom && Score12<=STo){document.getElementById("TotalRating_12").value=Rating;} 
 } 
}

function RevEnterFormB()
{
 var RevFormA=parseFloat(document.getElementById("ReviewerFormAScore").value); 
 var RevFormB=parseFloat(document.getElementById("ReviewerFormBScore").value);
 var Score_1=parseFloat(document.getElementById("Score_1").value); 
 var Score_2=parseFloat(document.getElementById("Score_2").value);
 var Weight_A=parseFloat(document.getElementById("weight_A").value); 
 var Weight_B=parseFloat(document.getElementById("weight_B").value);
 var FormA=document.getElementById("FormAScore").value=Math.round((RevFormA)*100)/100;
 var FormB=document.getElementById("FormBScore").value=Math.round((RevFormB)*100)/100;
 var Score1=document.getElementById("Score_1").value=Math.round(((FormA*Weight_A)/100)*100)/100;
 var Score2=document.getElementById("Score_2").value=Math.round(((FormB*Weight_B)/100)*100)/100;
 var Score12=document.getElementById("TotalScore_12").value=Math.round((Score1+Score2)*100)/100;
 var Rating12=parseFloat(document.getElementById("TotalRating_12").value);
 var Num = parseFloat(document.getElementById("Number").value);
 for(var i=1; i<=Num; i++) 
 { SFrom = parseFloat(document.getElementById("SFrom_"+i).value); STo = parseFloat(document.getElementById("STo_"+i).value); 
   Rating = parseFloat(document.getElementById("Rating_"+i).value); 
	if(Score12>=SFrom && Score12<=STo){document.getElementById("TotalRating_12").value=Rating;} 
 }  
}

function RevScore(PmsId,EId,YId)
{ 	 
 var AppFormAScore=document.getElementById("AppraiserFormAScore").value; 
 var AppFormBScore=document.getElementById("AppraiserFormBScore").value;
 var RevFormAScore=document.getElementById("ReviewerFormAScore").value; 
 var RevFormBScore=document.getElementById("ReviewerFormBScore").value;
 
 var RevRemark = document.getElementById("RevRemarks").value.replace(/[`~!#$^&*()_|+\-=???;:'"<>\{\}\[\]\\\/]/gi, '');
 var Justification=document.getElementById("Justification").value.replace(/[`~!#$^&*()_|+\-=???;:'"<>\{\}\[\]\\\/]/gi, '');
 
 //var RevRemark=document.getElementById("RevRemarks").value; 
 //var Justification=document.getElementById("Justification").value; 
 
 var ComId=document.getElementById("ComId").value;
 var Score_1=document.getElementById("Score_1").value; var Score_2=document.getElementById("Score_2").value;
 var TotalScore_12=document.getElementById("TotalScore_12").value; var DesigId=document.getElementById("DesigId").value; 
 var GradeId=document.getElementById("GradeId").value; 
 var EmpDesig=document.getElementById("EmpDesig").value; var EmpGrade=document.getElementById("EmpGrade").value;
 var AppDesig=document.getElementById("AppDesig").value; var AppGrade=document.getElementById("AppGrade").value;
 
 var SSk_1=document.getElementById("TopAA_1").value; var SSk_2=document.getElementById("TopAA_2").value;
 var SSk_3=document.getElementById("TopAA_3").value; var SSk_4=document.getElementById("TopAA_4").value;
 var SSk_5=document.getElementById("TopAA_5").value; var SSk_Oth=document.getElementById("TraS_Oth").value; 
 var TSk_1=document.getElementById("TopB_1").value; var TSk_2=document.getElementById("TopB_2").value;
 var TSk_3=document.getElementById("TopB_3").value; var TSk_4=document.getElementById("TopB_4").value;
 var TSk_5=document.getElementById("TopB_5").value; var TSk_Oth=document.getElementById("TraT_Oth").value;
 
 var Numfilter=/^[0-9. ]+$/;  var test_num = Numfilter.test(RevFormAScore); var test_num2 = Numfilter.test(RevFormBScore);
 //if (RevFormAScore.length === 0) { alert("Reviewer KRA Score field can't be blank.");  return false; }
 if(test_num==false) { alert('Please enter only number in the KRA Scoret field');  return false; } 
 //if (RevFormBScore.length === 0) { alert("Reviewer Behavioral(Form B) Score field can't be blank.");  return false; }
 if(test_num2==false) { alert('Please enter only number in the Behavioral(Form B) Score Field');  return false; } 
 //if (RevRemark.length === 0) { alert("Reviewer remark field can't be blank.");  return false; }
 if (EmpDesig!=DesigId && Justification.length === 0) { alert("Please type Justification !");  return false; }
 if (EmpGrade!=GradeId && Justification.length === 0) { alert("Please type Justification !");  return false; }
 if (RevRemark.length === 0) { alert("Reviewer remark field can't be blank.");  return false; }

 var AppFormAScore = parseFloat(document.getElementById("AppraiserFormAScore").value);
 var AppFormBScore = parseFloat(document.getElementById("AppraiserFormBScore").value);
 FormAMin5 = document.getElementById("FormAMin5").value=Math.round((AppFormAScore-10)*100)/100;
 FormAMax5 = document.getElementById("FormAMax5").value=Math.round((AppFormAScore+10)*100)/100;
 FormBMin5 = document.getElementById("FormBMin5").value=Math.round((AppFormBScore-10)*100)/100;
 FormBMax5 = document.getElementById("FormBMax5").value=Math.round((AppFormBScore+10)*100)/100;
 if(RevFormAScore<FormAMin5 || RevFormAScore>FormAMax5) { alert("Reviewer KRA score can be minimum/ maximum 10 of appraiser score!");  return false; }
	 if(RevFormBScore<FormBMin5 || RevFormBScore>FormBMax5) { alert("Reviewer Form B score can be minimum/ maximum 10 of appraiser score!");  return false; }

 var agree=confirm("Are you sure you want to save record?");
 if (agree) { var url = 'HODSetEmpKRAScore.php';	var pars = 'P='+PmsId+'&E='+EId+'&Y='+YId+'&AScoPms='+RevFormAScore+'&BScoPms='+RevFormBScore+'&RevRem='+RevRemark+'&ComId='+ComId+'&S1='+Score_1+'&S2='+Score_2+'&TotS1S2='+TotalScore_12+'&DesigId='+DesigId+'&GradeId='+GradeId+'&Justi='+Justification+'&SSk1='+SSk_1+'&SSk2='+SSk_2+'&SSk3='+SSk_3+'&SSk4='+SSk_4+'&SSk5='+SSk_5+'&TSk1='+TSk_1+'&TSk2='+TSk_2+'&TSk3='+TSk_3+'&TSk4='+TSk_4+'&TSk5='+TSk_5+'&SSkOth='+SSk_Oth+'&TSkOth='+TSk_Oth;	
 var myAjax = new Ajax.Request(	 url,  { method: 'post', parameters: pars,  onComplete: show_EnterRevKra }); 
 return true;} else {return false;}
}
function show_EnterRevKra(originalRequest)
{ document.getElementById('MsgSpan').innerHTML = originalRequest.responseText; document.getElementById('MsgSpan2').innerHTML = originalRequest.responseText;}
	
function RevScore2(PmsId,EId,YId)
{ 	 

  var AppFormAScore=document.getElementById("AppraiserFormAScore").value; var AppFormBScore=document.getElementById("AppraiserFormBScore").value; var RevFormAScore=document.getElementById("ReviewerFormAScore").value; var RevFormBScore=document.getElementById("ReviewerFormBScore").value;
  
  var RevRemark = document.getElementById("RevRemarks").value.replace(/[`~!#$^&*()_|+\-=???;:'"<>\{\}\[\]\\\/]/gi, '');
  var Justification=document.getElementById("Justification").value.replace(/[`~!#$^&*()_|+\-=???;:'"<>\{\}\[\]\\\/]/gi, '');

  //var RevRemark=document.getElementById("RevRemarks").value; 
  //var Justification=document.getElementById("Justification").value;
  
  var ComId=document.getElementById("ComId").value;
  var Score_1=document.getElementById("Score_1").value; var Score_2=document.getElementById("Score_2").value;
  var TotalScore_12=document.getElementById("TotalScore_12").value; var DesigId=document.getElementById("DesigId").value; 
  var GradeId=document.getElementById("GradeId").value; 
  var EmpDesig=document.getElementById("EmpDesig").value; var EmpGrade=document.getElementById("EmpGrade").value;
  var AppDesig=document.getElementById("AppDesig").value; var AppGrade=document.getElementById("AppGrade").value;
  
  var SSk_1=document.getElementById("TopAA_1").value; var SSk_2=document.getElementById("TopAA_2").value;
 var SSk_3=document.getElementById("TopAA_3").value; var SSk_4=document.getElementById("TopAA_4").value;
 var SSk_5=document.getElementById("TopAA_5").value; var SSk_Oth=document.getElementById("TraS_Oth").value; 
 var TSk_1=document.getElementById("TopB_1").value; var TSk_2=document.getElementById("TopB_2").value;
 var TSk_3=document.getElementById("TopB_3").value; var TSk_4=document.getElementById("TopB_4").value;
 var TSk_5=document.getElementById("TopB_5").value; var TSk_Oth=document.getElementById("TraT_Oth").value;

  var Numfilter=/^[0-9. ]+$/;  var test_num = Numfilter.test(RevFormAScore); var test_num2 = Numfilter.test(RevFormBScore);
  if (RevFormAScore.length === 0) { alert("Reviewer KRA Score field can't be blank.");  return false; }
  if(test_num==false) { alert('Please enter only number in the KRA Scoret field');  return false; } 
  if (RevFormBScore.length === 0) { alert("Reviewer Behavioral(Form B) Score field can't be blank.");  return false; }
  if(test_num2==false) { alert('Please enter only number in the Behavioral(Form B) Score Field');  return false; } 
  if (EmpDesig!=DesigId && Justification.length === 0) { alert("Please type Justification !");  return false; }
  if (EmpGrade!=GradeId && Justification.length === 0) { alert("Please type Justification !");  return false; }
  if (RevRemark.length === 0) { alert("Reviewer remark field can't be blank.");  return false; }

  var AppFormAScore = parseFloat(document.getElementById("AppraiserFormAScore").value);
  var AppFormBScore = parseFloat(document.getElementById("AppraiserFormBScore").value); 
  //FormAMin5 = parseFloat(document.getElementById("FormAMin5").value);
  //FormAMax5 = parseFloat(document.getElementById("FormAMax5").value);
  //FormBMin5 = parseFloat(document.getElementById("FormBMin5").value);
  //FormBMax5 = parseFloat(document.getElementById("FormBMax5").value); 
  Cal_FormAMin5 = document.getElementById("FormAMin5").value=Math.round((AppFormAScore-10)*100)/100; 
  Cal_FormAMax5 = document.getElementById("FormAMax5").value=Math.round((AppFormAScore+10)*100)/100;
  Cal_FormBMin5 = document.getElementById("FormBMin5").value=Math.round((AppFormBScore-10)*100)/100;
  Cal_FormBMax5 = document.getElementById("FormBMax5").value=Math.round((AppFormBScore+10)*100)/100;
  if(RevFormAScore<Cal_FormAMin5 || RevFormAScore>Cal_FormAMax5) { alert("Reviewer KRA score can be minimum/ maximum 10 of appraiser score!");  return false; }
  if(RevFormBScore<Cal_FormBMin5 || RevFormBScore>Cal_FormBMax5) { alert("Reviewer Form B score can be minimum/ maximum 10 of appraiser score!");  return false; }

  var agree=confirm("Are you sure you want to submit record?");
  if (agree) { 
  var url = 'HODSetEmpKRAScore.php';	var pars = 'P2='+PmsId+'&E2='+EId+'&Y2='+YId+'&AScoPms2='+RevFormAScore+'&BScoPms2='+RevFormBScore+'&RevRem2='+RevRemark+'&ComId2='+ComId+'&S1='+Score_1+'&S2='+Score_2+'&TotS1S2='+TotalScore_12+'&DesigId='+DesigId+'&GradeId='+GradeId+'&Justi='+Justification+'&SSk1='+SSk_1+'&SSk2='+SSk_2+'&SSk3='+SSk_3+'&SSk4='+SSk_4+'&SSk5='+SSk_5+'&TSk1='+TSk_1+'&TSk2='+TSk_2+'&TSk3='+TSk_3+'&TSk4='+TSk_4+'&TSk5='+TSk_5+'&SSkOth='+SSk_Oth+'&TSkOth='+TSk_Oth;	
  var myAjax = new Ajax.Request(	 url,  { method: 'post', parameters: pars,  onComplete: show_EnterRevKra2 }); 
  return true;} else {return false;}
}

function show_EnterRevKra2(originalRequest)
{ document.getElementById('MsgSpan').innerHTML = originalRequest.responseText; document.getElementById('MsgSpan2').innerHTML = originalRequest.responseText;
  var relV=document.getElementById('reportScore').value;
  if(relV=='Y'){document.getElementById('SaveScore').disabled=true; document.getElementById('SubmitScore').disabled=true; }
}

function doBlink()
{
 var blink = document.all.tags("BLINK")
 for (var i=0; i<blink.length; i++)
 blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : "" 
}
function startBlink() { if (document.all) setInterval("doBlink()",1000) }
window.onload = startBlink;


function FunTgt(sn,kid,prd,tgt,wgt,lgc)
{ var e=document.getElementById("e").value; var eid=document.getElementById("eid").value; 
  var c=document.getElementById("ComId").value; 
  window.open("setkrarevtgtpms.php?act=setkratgt&n=1&valueins=true&checkalpha=false&d=12&pa=4&y=2&kid="+kid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&lgc="+lgc+"&wgt="+wgt+"&eid="+eid+"&c="+c, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=600"); 
}

function FunSubTgt(sn,sn2,kid,prd,tgt,wgt,lgc)
{ var e=document.getElementById("e").value; var eid=document.getElementById("eid").value;
  var c=document.getElementById("ComId").value; 
  window.open("setkrarevtgtpms.php?act=setkratgt&n=2&valueins=true&checkalpha=false&d=12&pa=4&y=2&kid="+kid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&lgc="+lgc+"&wgt="+wgt+"&eid="+eid+"&c="+c, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=600");
}


function FunFormBTgt(sn,yid,fbid,prd,tgt,wgt,lgc) 
{ var e=document.getElementById("e").value; var c=document.getElementById("ComId").value; 
  var eid=document.getElementById("eid").value;
  var win = window.open("setkrarevtgtformbpms.php?act=setkratgt&n=1&valueins=true&checkalpha=false&d=12&pa=4&y=2&fbid="+fbid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&lgc="+lgc+"&wgt="+wgt+"&yid="+yid+"&c="+c+"&eid="+eid, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=600"); 
}

function FunFormBSubTgt(sn,sn2,yid,fbid,prd,tgt,wgt,lgc)
{ var e=document.getElementById("e").value; var c=document.getElementById("ComId").value; 
  var eid=document.getElementById("eid").value;
  var win = window.open("setkrarevtgtformbpms.php?act=setkratgt&n=2&valueins=true&checkalpha=false&d=12&pa=4&y=2&fbid="+fbid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&lgc="+lgc+"&wgt="+wgt+"&yid="+yid+"&c="+c+"&eid="+eid, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=600"); 
} 


</script>
</head>
<body class="body">
<?php $sqlRat=mysql_query("select ScoreFrom,ScoreTo,Rating from hrm_pms_rating where RatingStatus='A' AND YearId=".$_SESSION['PmsYId']." AND CompanyId=".$CompanyId, $con); 
$Sn=1; while($resRat=mysql_fetch_array($sqlRat)) {  ?>
<input type="hidden" id="SFrom_<?php echo $Sn; ?>" value="<?php echo $resRat['ScoreFrom']; ?>" />
<input type="hidden" id="STo_<?php echo $Sn; ?>" value="<?php echo $resRat['ScoreTo']; ?>" />
<input type="hidden" id="Rating_<?php echo $Sn; ?>" value="<?php echo $resRat['Rating']; ?>" />
<?php $Sn++; } $n=$Sn-1; ?><input type="hidden" id="Number" value="<?php echo $n; ?>" />

<input type="hidden" id="c" value="<?php echo $CompanyId; ?>" />
<input type="hidden" id="e" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="eid" value="<?php echo $_REQUEST['Eid']; ?>" />

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
<td align="center" valign="top"><a href="pms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>&ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&rr2=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=0&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_emp1" style="display:<?php if($_REQUEST['ee']==1){echo 'block';}else{echo 'none';} ?>;" src="images/emp1.png" border="0"/></a></td>

<?php } if($_SESSION['BtnApp']>0) { ?>
<td align="center" valign="top"><a href="ManagerPms.php?ee=1&aa=0&rr=1&rr2=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_manager1" style="display:<?php if($_REQUEST['aa']==1){echo 'block';}else{echo 'none';} ?>;" src="images/manager1.png" border="0"/></a></td></td>
		   
<?php } if($_SESSION['BtnRev']>0) { ?>
<td align="center" valign="top"><img id="Img_hod" style="display:block;" src="images/hod.png" border="0"/></td>

<?php } if($_SESSION['BtnRev2']>0) { ?>
<td align="center" valign="top"><a href="Rev2HodPms.php?ee=1&rr2=0&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/RevHod1.png" border="0"/></a></td>	
		   
<?php } if($_SESSION['BtnHod']>0) { ?><td align="center" valign="top"><a href="RevHodPms.php?ee=1&rr2=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/m1.png" border="0"/></a></td><?php } ?>

<td><font class="msg_b"><i><?php echo $msg; ?></i></font><font class="formc"><span id="MsgSpan"></span></font></td>	 
	</tr>
   </table>
  </td>
 </tr>
 
 <tr><td style="vertical-align:top;width:100%;"><?php include("SetKraPmsmr.php"); ?></td></tr>
<!--  Head Parts Close Close Close  --> 
<!--  Head Parts Close Close Close  --> 
 
  <tr>
    <td style="width:100%;">
	  <table border="0" style="width:100%;">
	    <tr>
        <?php /****************************************** Form Start **************************/ ?>
		
<?php /***************** AppraisalForm **************************/ ?>
<form name="AppraisalForm" method="post" onSubmit="Validation(this)">	
		 <td id="AppraisalForm" style="display:block;width:100%;">
		   <table border="0" style="width:100%;">
		   
<tr>
 <td style="width:100%;">
  <table border="0" style="width:100%;">
   <tr>
<?php //************************************************ Start ******************************// ?>
<?php //************************************************ Start ******************************// ?>

<td width="100%" id="EmpkraStatus" style="display:block;">

<input type="hidden" id="FormAMin5" value="0" /><input type="hidden" id="FormAMax5" value="0" />
<input type="hidden" id="FormBMin5" value="0" /><input type="hidden" id="FormBMax5" value="0" />
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />
<input type="hidden" id="EmployeeId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />
<span id="MyTeamStatusSpan"></span>	 

<?php 
if(isset($_REQUEST['Id']) && $_REQUEST['Id']!="")
{ 
 $Id = $_REQUEST['Id']; $Eid = $_REQUEST['Eid']; $YearId = $_REQUEST['Yid']; 
 $sqlApp=mysql_query("select p.*,EmpCode,Fname,Sname,Lname from hrm_employee_pms p inner join hrm_employee e on p.EmployeeID=e.EmployeeID where p.AssessmentYear=".$_SESSION['PmsYId']." AND p.EmployeeID=".$Eid,$con); 
 $resApp=mysql_fetch_array($sqlApp); ?> 
<form name="SubForm" method="post">	   
<table border="0" style="width:100%;">
 <tr><td align="center" class="head"><u>Appraisal Form</u></td></tr>
 <tr><td></td></tr>
 <tr>
  <td class="head" align="center">
  &nbsp;EmpCode :&nbsp;<font class="body2"><?php echo $resApp['EmpCode']; ?></font>
  &nbsp;&nbsp;Name :&nbsp;<font class="body2"><?php echo ucfirst(strtolower($resApp['Fname'].' '.$resApp['Sname'].' '.$resApp['Lname'])); ?></font>
  </td>
 </tr>

 <!-- //1111111111111 OPEN -->
 <tr><td class="bdy"><b><i>(Achievement)</i></b></td></tr>
 <tr>
  <td id="Achivement">
   <table border="1" style="width:100%;" cellspacing="0">
<?php $sqlAc=mysql_query("select * from hrm_employee_pms_achivement where EmpPmsId=".$resApp['EmpPmsId']." order by AchivementId ASC", $con); $Sno=1; while($resAc=mysql_fetch_array($sqlAc)){?>   
    <tr bgcolor="#FFF" style="height:24px;">	   
     <td class="h" style="width:3%;background-color:#FFFF6C;" valign="top"><?php echo $Sno; ?></td>	  
	 <td class="bl" style="width:97%;background-color:#FFFFFF;">&nbsp;<?php echo $resAc['Achivement']; ?></td>  
    </tr>
<?php $Sno++;} ?>
   </table>
  </td>
 </tr>

 <tr><td>&nbsp;</td></tr>
 <tr><td class="bdy"><b><i>(Feedback)</i></b></td></tr>
 <tr>
  <td id="Achivement">
   <table border="1" style="width:100%;" cellspacing="0">
<?php $sqlW=mysql_query("select * from hrm_employee_pms_workenvironment where EmpPmsId=".$resApp['EmpPmsId']." order by EmpWorkEnvId ASC", $con); $SnoB=1; while($resW=mysql_fetch_array($sqlW)){ ?>   
    <tr bgcolor="#FFF" style="height:24px;">	   
     <td class="h" style="width:3%;background-color:#FFFF6C;" valign="top"><?php echo $SnoB; ?></td>	  
	 <td class="bl" style="width:97%;background-color:#C5FF8A;">&nbsp;<?php echo $resW['WorkEnvironment']; ?></td>  
    </tr>
	<tr bgcolor="#FFF" style="height:24px;">	   
     <td class="h" style="width:3%;background-color:#FFFF6C;" valign="top">Ans.</td>	  
	 <td class="bl" style="width:97%;background-color:#FFFFFF;">&nbsp;<?php echo $resW['Answer']; ?></td>  
    </tr>
<?php $SnoB++;} ?>
   </table>
  </td>
 </tr> 

 <tr><td>&nbsp;</td></tr>
 <tr><td class="bdy"><b><i>Form-A(KRA)</i></b></td></tr> 
 <tr>
 <form name="AppraisalForm" method="post" onSubmit="return Validation(this)">
  <input type="hidden" id="ComId" name="ComId" value="<?php echo $CompanyId; ?>" />
  <input type="hidden" id="PmsId" name="PmsId" value="<?php echo $resApp['EmpPmsId']; ?>" />
  <input type="hidden" id="EmpId" name="EmpId" value="<?php echo $Eid; ?>" /> 
  <td style="width:100%;">
   <table border="0" cellspacing="1" style="width:100%;">
	<tr bgcolor="#FFFF53" style="height:25px;">
	 <td class="fhead" style="width:3%;">Sn</td>
     <td class="fhead" style="width:20%;">KRA/Goals</td>
     <td class="fhead" style="width:20%;">Description</td>  
     <td class="fhead" style="width:5%;">Measure</td>
     <td class="fhead" style="width:5%;">Unit</td>
     <td class="fhead" style="width:5%;">Weigh<br>tage</td>
     <td class="fhead" style="width:5%;">Logic</td>
     <td class="fhead" style="width:5%;">Period</td>
     <td class="fhead" style="width:5%;">Target</td>
	 <td class="fhead" style="width:5%;">Self Rating</td>
	 <td class="fhead" style="width:10%;">Remarks</td>
	 <td class="fhead" style="width:5%;"><b>Appraiser Ass.</b></td>
	 <?php /*?><td class="fhead" style="width:4%;">Allow Logic</td><?php */?>
	 <td class="fhead" style="width:4%;"><b>Score</b></td>
	 <td class="fhead" style="width:10%;">App Remarks</td>
    </tr>
<?php $sql2=mysql_query("select * from hrm_employee_pms_kraforma where KRAFormAStatus='A' AND EmpPmsId=".$resApp['EmpPmsId']." order by KRAFormAId ASC", $con); $Sno=1; while($res2=mysql_fetch_array($sql2)) { 
	 $sqlK2=mysql_query("select * from hrm_pms_kra where KRAId=".$res2['KRAId'], $con); $resK2=mysql_fetch_array($sqlK2);
	 $sSubK=mysql_query("select * from hrm_pms_krasub where KRAId=".$res2['KRAId']." AND KSubStatus='A' order by KRASubId ASC",$con); $rowSubK=mysql_num_rows($sSubK);
	  $n=0;
	  if($resK2['Period']=='Monthly' OR $resK2['Period']=='Quarter' OR $resK2['Period']=='1/2 Annual'){ $n=1; $sqlt=mysql_query("select SUM(Ach) as tAche, SUM(LogScr) as tELogScr,  SUM(AppAch) as tAch, SUM(AppLogScr) as tLogScr, SUM(AppScor) as tScor from hrm_pms_kra_tgtdefin where KRAId=".$resK2['KRAId'],$con); $rest=mysql_fetch_assoc($sqlt); }else{$n=0;} ?>	
	  
	 <input type="hidden" id="KRAFormAId_<?php echo $Sno; ?>" name="KRAFormAId_<?php echo $Sno; ?>" value="<?php echo $res2['KRAFormAId']; ?>" /><input type="hidden" id="WeightageKRA_<?php echo $Sno; ?>"  value="<?php echo $res2['Weightage']; ?>" /><input type="hidden" id="LogicKRA_<?php echo $Sno; ?>"  value="<?php echo $res2['Logic']; ?>" /><input type="hidden" id="PeriodKRA_<?php echo $Sno; ?>"  value="<?php echo $res2['Period']; ?>" /><input type="hidden" id="TargetKRA_<?php echo $Sno; ?>" name="TargetKRA_<?php echo $Sno; ?>" value="<?php echo $res2['Target']; ?>" />
  
     <tr bgcolor="#FFFFFF" style="height:25px;">
      <td class="fbodyc"><b><?php echo $Sno; ?></b></td>
      <td class="fbody"><?php echo $resK2['KRA']; ?></td>
      <td class="fbody"><?php echo $resK2['KRA_Description']; ?></td>
      <td class="fbodyc"><?php if($rowSubK>0){echo '';}else{echo $resK2['Measure'];} ?></td>
      <td class="fbodyc"><?php if($rowSubK>0){echo '';}else{echo $resK2['Unit'];} ?></td>
      <td class="fbodyc"><?php echo floatval($res2['Weightage']); ?></td>
      <td class="fbodyc"><?php echo $res2['Logic']; ?></td>
      <td class="fbodyc"><?php echo $res2['Period']; ?></td>
      <td class="fbodyc"><span style="text-decoration:<?php if($res2['Period']!='Annual' AND $res2['Period']!=''){ echo 'underline'; }else{echo 'none';}?>;color:<?php if($res2['Period']!='Annual' AND $res2['Period']!=''){ echo '#000099'; }else{echo '#000';}?>;cursor:<?php if($res2['Period']!='Annual' AND $res2['Period']!=''){echo 'pointer';} ?>;" maxlength="8" <?php if($res2['Period']!='Annual' AND $res2['Period']!=''){?> onClick="FunTgt(<?php echo $Sno.','.$res2['KRAId']; ?>,'<?php echo $res2['Period']; ?>',<?php echo $res2['Target'].','.intval($res2['Weightage']); ?>,'<?php echo $res2['Logic']; ?>')" <?php } ?> ><?php if($rowSubK>0){echo '';}else{echo floatval($res2['Target']);}?></span></td>
      <?php /*?>onMouseOver="FunTgt(<?php echo $Sno.','.$res2['KRAId']; ?>,'<?php echo $res2['Period']; ?>',<?php echo $res2['Target'].','.intval($res2['Weightage']); ?>,'<?php echo $res2['Logic']; ?>')"<?php */?>
	  
      <td class="fbodyc"><?php if($_SESSION['eAppform']=='Y'){ if($n==1){echo $rest['tELogScr'];}else{echo floatval($res2['SelfRating']);} }elseif($_SESSION['eMidform']=='Y'){echo $res2['Mid_SelfRating']; } ?></td>
      <td class="fbody"><?php if($_SESSION['eAppform']=='Y'){ echo $res2['AchivementRemark']; }elseif($_SESSION['eMidform']=='Y'){echo $res2['Mid_AchivementRemark']; } ?></td>
	  
	  <td class="fbodyc"><input type="<?php if($rowSubK>0){echo 'hidden';}else{echo 'text';} ?>" id="AppKRARating<?php echo $Sno; ?>" name="AppKRARating<?php echo $Sno; ?>" style="font-family:Times New Roman; background-color:#FFFFFF; font-size:12px; width:100%;height:24px;text-align:center;border:hidden;" maxlength="5" value="<?php if($n==1){ echo floatval($rest['tLogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo $res2['AppraiserRating']; }elseif($_SESSION['eMidform']=='Y'){echo $res2['Mid_AppraiserRating']; }  ?>" <?php if($n==0){ ?> onKeyUp="EnterAppKra(<?php echo $res2['KRAFormAId'].','.$Sno; ?>)" onChange="EnterAppKra(<?php echo $res2['KRAFormAId'].','.$Sno; ?>)" <?php } ?> oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" <?php if($resApp['Appraiser_PmsStatus']==2 OR $rowSubK>0 OR $n==1) { echo 'readonly'; } ?> /></td>
	  
	  <?php /*?><td align="center" class="fbody"><input type="text" id="AppKRALogic<?php echo $Sno; ?>" name="AppKRALogic<?php echo $Sno;?>" style="font-family:Times New Roman;font-size:12px;background-color:#FFFFFF;width:60px;height:22px;text-align:center;border:hidden;" value="<?php if($rowSubK>0){echo '';}elseif($n==1){ echo floatval($rest['tLogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo $res2['AppraiserLogic'];}elseif($_SESSION['eMidform']=='Y'){echo $res2['Mid_AppraiserLogic']; }else{echo 0;} ?>" readonly/></td><?php */?>
	  
      <td class="fbodyc"><input type="text" id="AppKRAScore<?php echo $Sno; ?>" name="AppKRAScore<?php echo $Sno; ?>" style="font-family:Times New Roman;font-size:12px;width:100%;height:24px;text-align:center;border:hidden;background-color:#FFFFFF;font-weight:bold;" value="<?php if($n==1){ echo floatval($rest['tScor']); }elseif($_SESSION['eAppform']=='Y'){ echo floatval($res2['AppraiserScore']); }elseif($_SESSION['eMidform']=='Y'){echo $res2['Mid_AppraiserScore']; } ?>"  readonly/>
 <input type="hidden" name="KRAFormAId<?php echo $Sno; ?>" value="<?php echo $res2['KRAFormAId']; ?>" />
 <input type="hidden" id="rowSubK<?php echo $Sno; ?>" name="rowSubK<?php echo $Sno; ?>" value="<?php echo $rowSubK; ?>" />
      </td>
	    <td class="fbody"><?php echo $res2['AppraiserRemark']; ?></td>
    </tr>

<?php for($i=1; $i<=5; $i++) { ?><input type="hidden" id="KraScoreSub<?php echo $Sno."_".$i; ?>" value="0" /><?php } ?>
<?php  if($rowSubK>0){ ?> 
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
 <tr>
  <td colspan="14" align="right" style="border:hidden;border-style:none;">
   <div id="Div<?php echo $Sno; ?>" style="display:<?php if($rowSubK>0){echo 'block';}else{echo 'none';} ?>;">
    <table style="width:97%;background-color:#71FF71;" border="1" cellpadding="0" cellspacing="0"> 
     <tr style="background-color:#71FF71;">  
	  <!--<td rowspan="6" class="Input2a" style="background-color:#71FF71;border:hidden;width:50px;" valign="middle" align="center">Sub<br>KRA</td>--> 
      <td class="fhead2" style="width:3%;">Sn</td>
      <td class="fhead2" style="width:15%;">Sub KRA/Goals</td>
      <td class="fhead2" style="width:18%;">Sub KRA Description</td>  
      <td class="fhead2" style="width:5%;">Measure</td>
      <td class="fhead2" style="width:5%;">Unit</td>
      <td class="fhead2" style="width:5%;">Weigh<br>tage</td>
	  <td class="fhead2" style="width:5%;">Logic</td>
	  <td class="fhead2" style="width:5%;">Period</td>
      <td class="fhead2" style="width:4%;">Target</td>
	  <td class="fhead2" style="width:5%;">Self<br>Rating</td>
	  <td class="fhead2" style="width:10%;">Remarks</td>
	  <td class="fhead2" style="width:5%;"><b>Appraiser Ass.</b></td>
	  <!--<td class="fhead2" style="width:4%;">Allow Logic</td>-->
	  <td class="fhead2" style="width:5%;"><b>Score</b></td> 
	  <td class="fhead2" style="width:10%;">App Remarks</td>
	 </tr>	  
<?php if($rowSubK==0){$num=5;}elseif($rowSubK==1){$num=4;}elseif($rowSubK==2){$num=3;}elseif($rowSubK==3){$num=2;}elseif($rowSubK==4){$num=1;}elseif($rowSubK==5){$num=0;} ?>
<?php /* While Open*/ $m=1; while($rSubK=mysql_fetch_assoc($sSubK)){
      $nn=0;
	  if($rSubK['Period']=='Monthly' OR $rSubK['Period']=='Quarter' OR $rSubK['Period']=='1/2 Annual'){ $nn=1; $sqltt=mysql_query("select SUM(Ach) as tAche, SUM(LogScr) as tELogScr,  SUM(AppAch) as tAch, SUM(AppLogScr) as tLogScr, SUM(AppScor) as tScor from hrm_pms_kra_tgtdefin where KRASubId=".$rSubK['KRASubId'],$con); $restt=mysql_fetch_assoc($sqltt); }else{$nn=0;} ?>
<input type="hidden" id="KraId_<?php echo $Sno; ?>" Name="KraId_<?php echo $Sno; ?>" value="<?php echo $res2['KRAId']; ?>" />
<input type="hidden" id="SubKraId_<?php echo $Sno.'_'.$m; ?>" name="SubKraId_<?php echo $Sno.'_'.$m; ?>" value="<?php echo $rSubK['KRASubId']; ?>" />
<?php if($m==1){$n='(a)';}elseif($m==2){$n='(b)';}elseif($m==3){$n='(c)';}elseif($m==4){$n='(d)';}elseif($m==5){$n='(e)';} ?>
      
	  <input type="hidden" id="KraIdNo_a<?php echo $Sno.'_'.$m; ?>">
      <input type="hidden" id="WeightageKRA_<?php echo $Sno.'_'.$m; ?>" value="<?php echo $rSubK['Weightage']; ?>"/>
      <input type="hidden" id="LogicKRA_<?php echo $Sno.'_'.$m; ?>" value="<?php echo $rSubK['Logic']; ?>"/>
      <input type="hidden" id="PeriodKRA_<?php echo $Sno.'_'.$m; ?>" value="<?php echo $rSubK['Period']; ?>"/>
      <input type="hidden" id="TargetKRA_<?php echo $Sno.'_'.$m; ?>" value="<?php echo $rSubK['Target']; ?>"/>
	 
	 <tr style="background-color:#FFFFFF;">  
      <td class="fbodyc"><b style="color:#006FDD;"><?php echo $n; ?></b></td>
      <td class="fbody"><?php echo $rSubK['KRA']; ?></td>
      <td class="fbody"><?php echo $rSubK['KRA_Description']; ?></td>    
      <td class="fbodyc"><?php echo $rSubK['Measure']; ?></td>
      <td class="fbodyc"><?php echo $rSubK['Unit'];?></td>
      <td class="fbodyc"><?php echo floatval($rSubK['Weightage']); ?></td>
      <td class="fbodyc"><?php echo $rSubK['Logic']; ?></td>
      <td class="fbodyc"><?php echo $rSubK['Period']; ?></td>
      <td class="fbodyc"><span style="text-decoration:<?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){ echo 'underline'; }else{echo 'none';}?>;color:<?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){ echo '#000099'; }else{echo '#000';}?>;cursor:<?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){echo 'pointer';} ?>;" maxlength="8" <?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){ ?> onClick="FunSubTgt(<?php echo $Sno.','.$m.','.$rSubK['KRASubId']; ?>,'<?php echo $rSubK['Period']; ?>',<?php echo $rSubK['Target'].','.intval($rSubK['Weightage']); ?>,'<?php echo $rSubK['Logic']; ?>')" <?php } ?> ><?php echo floatval($rSubK['Target']); ?></span></td>
      <?php /*?>onMouseOver="FunSubTgt(<?php echo $Sno.','.$m.','.$rSubK['KRASubId']; ?>,'<?php echo $rSubK['Period']; ?>',<?php echo $rSubK['Target'].','.intval($rSubK['Weightage']); ?>,'<?php echo $rSubK['Logic']; ?>')" <?php */?>
	  
	  <td class="fbodyc"><?php if($_SESSION['eAppform']=='Y'){ if($restt['tELogScr']>0){echo floatval($restt['tELogScr']);}else{echo floatval($rSubK['SelfRating']);} }elseif($_SESSION['eMidform']=='Y'){echo $rSubK['Mid_SelfRating']; } ?></td>
      <td class="fbody"><?php if($_SESSION['eAppform']=='Y'){ echo $rSubK['AchivementRemark']; }elseif($_SESSION['eMidform']=='Y'){echo $rSubK['Mid_AchivementRemark']; } ?></td>      
      <td class="fbodyc"><input name="AppKRARating<?php echo $Sno.'_'.$m; ?>" id="AppKRARating<?php echo $Sno.'_'.$m; ?>" style="font:Georgia;font-size:11px;width:100%;height:24px;background-color:#FFFFFF;text-align:center;border:hidden;" value="<?php if($nn==1){ echo floatval($restt['tLogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo $rSubK['AppraiserRating']; }elseif($_SESSION['eMidform']=='Y'){echo $rSubK['Mid_AppraiserRating']; } ?>" <?php if($nn==0){ ?> onKeyUp="EnterAppKraSub(<?php echo $res2['KRAFormAId'].','.$Sno.','.$m; ?>)" onChange="EnterAppKraSub(<?php echo $res2['KRAFormAId'].','.$Sno.','.$m; ?>)" <?php } ?> maxlength="5" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" <?php if($resApp['Appraiser_PmsStatus']==2 OR $nn==1) { echo 'readonly'; } ?> /></td>
	  
	  <?php /*?><td align="center" class="fbody2"><input type="text" class="input" id="AppKRALogic<?php echo $Sno.'_'.$m; ?>" name="AppKRALogic<?php echo $Sno.'_'.$m; ?>" style="width:60px;text-align:center;border:hidden;" value="<?php if($nn==1){ echo floatval($restt['tLogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo $rSubK['AppraiserLogic'];}elseif($_SESSION['eMidform']=='Y'){echo $rSubK['Mid_AppraiserLogic']; }else{echo 0;} ?>"  readonly/></td><?php */?>
	  
	  <td class="fbodyc"><input class="input" name="AppKRAScore<?php echo $Sno.'_'.$m; ?>" id="AppKRAScore<?php echo $Sno.'_'.$m; ?>" style="width:100%;height:24px;background-color:#FFFFFF;text-align:center;border:hidden;" value="<?php if($nn==1){ echo floatval($restt['tScor']); }elseif($_SESSION['eAppform']=='Y'){ echo floatval($rSubK['AppraiserScore']); }elseif($_SESSION['eMidform']=='Y'){echo floatval($rSubK['Mid_AppraiserScore']); } ?>" readonly/>
      <input type="hidden" name="KRASubId<?php echo $Sno.'_'.$m; ?>" value="<?php echo $rSubK['KRASubId']; ?>" />
      </td>
	   <td class="fbody"><?php echo $rSubK['AppraiserRemark']; ?></td>    
     </tr> 
     <?php $m++;} $KrowSub=$m-1; ?><input type="hidden" id="SnoSub<?php echo $Sno; ?>" name="SnoSub<?php echo $Sno; ?>" value="<?php echo $Sno; ?>" /><input type="hidden" name="KRowSub<?php echo $Sno; ?>" id="KRowSub<?php echo $Sno; ?>" value="<?php echo $KrowSub; ?>" />
<?php /* While Close*/ ?>	 
    </table>
   </div> 
  </td>
 </tr>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?> 
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?> 
<?php } ?> 


<?php $Sno++;} $KRowNo=$Sno-1;?><input type="hidden" id="Sno" name="Sno" value="<?php echo $Sno; ?>" />
<input type="hidden" id="EmpKraRow" name="EmpKraRow" value="<?php echo $KRowNo; ?>" />

 <tr bgcolor="#FFFFFF" style="height:24px;">
  <td colspan="12" class="fbody" style="font-weight:bold; vertical-align:middle;" align="right">Final Appraiser KRA Score:&nbsp;</td><td class="h"><input type="hidden" id="AppraiserFormAScore" name="AppraiserFormAScore" value="<?php if($_SESSION['eAppform']=='Y'){ echo $resApp['AppraiserFormAScore']; }elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_AppraiserFormAScore']; }  ?>"/><?php if($_SESSION['eAppform']=='Y'){ echo $resApp['AppraiserFormAScore']; }elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_AppraiserFormAScore']; }  ?></td>
  <td rowspan="2">&nbsp;</td>
 </tr>
 <tr bgcolor="#FFFFFF" style="height:24px;">
  <td colspan="12" class="fbody" style="font-weight:bold; vertical-align:middle;" align="right"> Reviewer Score:&nbsp;</td>
  <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px;width:60px;">
 <input id="ReviewerFormAScore" class="h" style="background-color:#9BCDFF;width:60px;" value="<?php echo $resApp['ReviewerFormAScore']; ?>" <?php if($resApp['Reviewer_PmsStatus']==2) { echo 'readonly'; } ?> onKeyUp="RevEnterFormA()" onChange="RevEnterFormA()" maxlength="3"/></td>
 </tr> 
 </table>
 </td>
 </tr> 
 <tr><td>&nbsp;</td></tr>
 
 <tr><td class="bdy"><b><i>Form-B (Skill/ Behavioral)&nbsp;</i></b></td></tr>
 <tr>
  <td>
  <table style="width:100%;">
   <tr bgcolor="#FFFF53" style="height:25px;">
	<td class="fhead" style="width:5%;"><b>Sn</b></td>
	<td class="fhead" style="width:15%;"><b>Skill</b></td>
	<td class="fhead" style="width:30%;"><b>SkillComment</b></td>
	<td class="fhead" style="width:5%;"><b>Weightage</b></td>
	<td class="fhead" style="width:5%;"><b>Logic</b></td>
	<td class="fhead" style="width:5%;"><b>Period</b></td>
	<td class="fhead" style="width:5%;"><b>Target</b></td>
	<td class="fhead" style="width:5%;"><b>Self Ass.</b></td>
	<td class="fhead" style="width:15%;"><b>Remark</b></td>
	<td class="fhead" style="width:5%;"><b>Appraiser Ass.</b></td>
	<td class="fhead" style="width:5%;"><b>Score</b></td>
   </tr>
<?php $sql2=mysql_query("select * from hrm_employee_pms_behavioralformb where EmpPmsId=".$resApp['EmpPmsId']." order by BehavioralFormBId ASC", $con); $SnoB=1; while($res2=mysql_fetch_array($sql2)){ 
	  $sqlB2=mysql_query("select Skill,SkillComment,Weightage,Logic,Period,Target from hrm_pms_formb where FormBId=".$res2['FormBId'], $con); $resB2=mysql_fetch_assoc($sqlB2); 
	  
$sSubB22=mysql_query("select * from hrm_pms_formbsub where FormBId=".$res2['FormBId']." AND BSubStatus='A' order by FormBSubId ASC",$con); $rowSubB=mysql_num_rows($sSubB22); 

$n=0; 
if($resB2['Period']=='Monthly' OR $resB2['Period']=='Quarter' OR $resB2['Period']=='1/2 Annual'){ $n=1; $sqlt=mysql_query("select SUM(Ach) as tAche, SUM(LogScr) as tELogScr,  SUM(AppAch) as tAch, SUM(AppLogScr) as tLogScr, SUM(AppScor) as tScor from hrm_pms_formb_tgtdefin where EmployeeID=".$Eid." AND YearId=".$_SESSION['PmsYId']." AND FormBId=".$res2['FormBId'],$con); $rest=mysql_fetch_assoc($sqlt); }else{$n=0;}		  
	  
	  ?>   
   <input type="hidden" id="FormBId_<?php echo $SnoB; ?>"  name="FormBId_<?php echo $SnoB; ?>" value="<?php echo $res2['BehavioralFormBId']; ?>" /><input type="hidden" id="WeightageFormB_<?php echo $SnoB; ?>"  value="<?php echo $resB2['Weightage']; ?>" /><input type="hidden" id="TargetFormB_<?php echo $SnoB; ?>"  value="<?php echo $resB2['Target']; ?>" />	
	
   <tr bgcolor="#FFFFFF">
    <td class="fbodyc"><b><?php echo $SnoB; ?></b></td>
    <td class="fbody"><?php echo $resB2['Skill']; ?></td>
    <td class="fbody"><?php echo $resB2['SkillComment']; ?></td>
    <td class="fbodyc"><?php echo floatval($resB2['Weightage']); ?></td>
	<td class="fbodyc"><?php echo $resB2['Logic']; ?></td>
	<td class="fbodyc"><?php echo $resB2['Period']; ?></td>
    <td class="fbodyc"><span <?php if($resB2['Period']!='Annual' AND $resB2['Period']!=''){ echo 'style="cursor:pointer;text-decoration:underline;color:#000099;"';} if($resB2['Period']!='Annual' AND $resB2['Period']!=''){ ?> onClick="FunFormBTgt(<?php echo $SnoB.', '.$_SESSION['PmsYId'].','.$res2['FormBId']; ?>,'<?php echo $resB2['Period']; ?>',<?php echo $resB2['Target'].','.intval($resB2['Weightage']); ?>,'<?php echo $resB2['Logic']; ?>')" <?php } ?>  ><?php echo floatval($resB2['Target']); ?></span></td>
	<td class="fbodyc"><?php if($n==1){ echo floatval($rest['tELogScr']); }elseif($_SESSION['eAppform']=='Y'){echo $res2['SelfRating'];}elseif($_SESSION['eMidform']=='Y'){echo $res2['Mid_SelfRating'];} ?></td>
    <td class="fbody"><?php if($_SESSION['eAppform']=='Y'){echo $res2['Comments_Example'];}elseif($_SESSION['eMidform']=='Y'){echo $res2['Mid_Comments_Example'];} ?></td>
	<td class="fbodyc"><input type="<?php if($rowSubB>0){echo 'hidden';}else{echo 'text';} ?>" id="AppFormBRating<?php echo $SnoB; ?>" name="AppFormBRating<?php echo $SnoB; ?>" style="font-family:Times New Roman; font-size:12px;width:100%;height:24px;text-align:center;border:hidden;" value="<?php if($n==1){ echo floatval($rest['tLogScr']); }elseif($_SESSION['eAppform']=='Y'){echo floatval($res2['AppraiserRating']);}elseif($_SESSION['eMidform']=='Y'){echo $res2['Mid_AppraiserRating'];} ?>" maxlength="5" <?php if($resApp['Appraiser_PmsStatus']==2) { echo 'readonly'; } ?> onKeyUp="EnterAppFormB(<?php echo $res2['BehavioralFormBId'].','.$SnoB; ?>)" onChange="EnterAppFormB(<?php echo $res2['BehavioralFormBId'].','.$SnoB; ?>)"/></td>
	<td class="fbodyc"><input type="<?php if($rowSubB>0){echo 'hidden';}else{echo 'text';} ?>" id="AppFormBScore<?php echo $SnoB; ?>" name="AppFormBScore<?php echo $SnoB; ?>" style="font-family:Times New Roman; border:hidden;font-size:12px;width:100%;background-color:#FFFFFF;height:24px;text-align:center;" value="<?php if($n==1){ echo floatval($rest['tScor']); } elseif($_SESSION['eAppform']=='Y'){echo floatval($res2['AppraiserScore']);}elseif($_SESSION['eMidform']=='Y'){echo $res2['Mid_AppraiserScore'];} ?>"  readonly/></td>

   </tr>
   
<?php if($rowSubB>0){ ?>   
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
  
 <tr>
  <td colspan="11" align="right" style="border:hidden;border-style:none;">
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
	  <td class="fhead2" style="width:60px;">Self<br>Rating</td>
	  <td class="fhead2" style="width:200px;">Remarks</td>
	  <td class="fhead2" style="width:60px;">Appraiser<br>Ass.</td>
	  <td class="fhead2" style="width:60px;">Score</td>
      
     </tr>

<?php if($rowSubK==0){$num=5;}elseif($rowSubK==1){$num=4;}elseif($rowSubK==2){$num=3;}elseif($rowSubK==3){$num=2;}elseif($rowSubK==4){$num=1;}elseif($rowSubK==5){$num=0;} ?>

<?php 

$sSubB=mysql_query("select * from hrm_employee_pms_behavioralformb_sub s inner join hrm_pms_formbsub bb on s.FormBSubId=bb.FormBSubId where s.EmpId=".$Eid." AND s.YearId=".$_SESSION['PmsYId'],$con); /* While Open*/ $m=1; while($rSubB=mysql_fetch_assoc($sSubB)){ 

$nn=0;
	  if($rSubB['Period']=='Monthly' OR $rSubB['Period']=='Quarter' OR $rSubB['Period']=='1/2 Annual'){ $nn=1; 
	  
	  $sqltt=mysql_query("select SUM(Ach) as tAche, SUM(LogScr) as tELogScr,  SUM(AppAch) as tAch, SUM(AppLogScr) as tLogScr, SUM(AppScor) as tScor from hrm_pms_formb_tgtdefin where EmployeeID=".$Eid." AND YearId=".$_SESSION['PmsYId']." AND FormBSubId=".$rSubB['FormBSubId'],$con); $restt=mysql_fetch_assoc($sqltt); }else{$nn=0;}

?>

  <input type="hidden" id="FormBId_<?php echo $SnoB; ?>" value="<?php echo $res2['FormBId']; ?>" />
   
  <tr style="background-color:#FFFFFF;">  
<?php if($m==1){$n='a';}elseif($m==2){$n='b';}elseif($m==3){$n='c';}elseif($m==4){$n='d';}elseif($m==5){$n='e';} ?>  
  <td align="center" class="fbody2"><?php echo $n; ?></b>
  <input type="hidden" id="SubFormBId_<?php echo $SnoB.'_'.$m; ?>" value="<?php echo $rSubB['FormBSubId']; ?>" /> 
  <input type="hidden" id="FormBIdNo_a<?php echo $SnoB.'_'.$m; ?>">
  <input type="hidden" id="WWei_a<?php echo $SnoB.'_'.$m; ?>" value="<?php echo $rSubB['Weightage']; ?>"/>
  <input type="hidden" id="Log_a<?php echo $SnoB.'_'.$m; ?>" value="<?php echo $rSubB['Logic']; ?>"/>
  <input type="hidden" id="Per_a<?php echo $SnoB.'_'.$m; ?>" value="<?php echo $rSubB['Period']; ?>"/>
  <input type="hidden" id="Tar_a<?php echo $SnoB.'_'.$m; ?>" value="<?php echo $rSubB['Target']; ?>"/>
  <input type="hidden" id="PrdN_<?php echo $SnoB.'_'.$m; ?>"  value="<?php echo $nn; ?>" />
  </td>
  <td class="fbody" valign="top"><?php echo $rSubB['Skill']; ?></td>
  <td class="fbody" valign="top"><?php echo $rSubB['SkillComment']; ?></td>  
  <td align="center" class="fbody2"><?php echo floatval($rSubB['Weightage']); ?></td>
  <td align="center" class="fbody2"><?php echo $rSubB['Logic']; ?></td>
  <td align="center" class="fbody2"><?php echo $rSubB['Period']; ?></td>
  
  <td align="center" class="fbody2">
  <span style="cursor:<?php if($rSubB['Period']!='Annual' AND $rSubB['Period']!=''){echo 'pointer';} ?>;text-align:center;text-decoration:<?php if($rSubB['Period']!='Annual' AND $rSubB['Period']!=''){ echo 'underline'; }?>;color:<?php if($rSubB['Period']!='Annual' AND $rSubB['Period']!=''){ echo '#000099'; }?>;" <?php if($rSubB['Period']!='Annual' AND $rSubB['Period']!=''){ ?> onClick="FunFormBSubTgt(<?php echo $SnoB.','.$m.','.$_SESSION['PmsYId'].','.$rSubB['FormBSubId']; ?>,'<?php echo $rSubB['Period']; ?>',<?php echo $rSubB['Target'].','.intval($rSubB['Weightage']); ?>,'<?php echo $rSubB['Logic']; ?>')" <?php } ?>><?php echo floatval($rSubB['Target']); ?></span>  
  </td>

  <td align="center" class="fbody2"><?php if($nn==1){ echo floatval($restt['tELogScr']); }elseif($resY['Emp_SkillSave']=='Y'){ if($_SESSION['eAppform']=='Y'){ echo floatval($rSubB['SelfRating']); } }elseif($rSubB['Emp_SkillSave']=='N'){ echo '0'; }?></td>	  
  <td class="fbody2"><?php echo $rSubB['AchivementRemark'];?></td>
  
 
  <td align="center" class="fbody2"><input name="BSelfRatingB<?php echo $SnoB.'_'.$m; ?>" id="BSelfRatingB<?php echo $SnoB.'_'.$m; ?>" style="width:100%;background-color:<?php if($nn==1){echo '#FFFFFF';}else{echo '#B9DCFF';}?>;text-align:center;" readonly value="<?php if($nn==1){ echo floatval($restt['tLogScr']); }else{ echo floatval($rSubB['AppraiserRating']); }?>" onKeyUp="BEnterEmpFormBSub(<?php echo $SnoB.','.$m; ?>)" onChange="BEnterEmpFormBSub(<?php echo $SnoB.','.$m; ?>)" maxlength="5" Add input field: oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" <?php if($nn==1){ echo 'readonly'; } ?> onKeyPress="return isNumberKey(event)"/>
	  
   <input type="hidden" class="input" id="EmpBLogic<?php echo $SnoB.'_'.$m; ?>" name="EmpBLogic<?php echo $SnoB.'_'.$m; ?>" style="width:60px;text-align:center;border:hidden;" value="<?php if($nn==1){ echo floatval($restt['tLogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo $rSubB['AppraiserLogic'];}elseif($_SESSION['eMidform']=='Y'){echo $rSubB['Mid_AppraiserLogic']; }else{echo 0;} ?>"  readonly/> 
  </td>
 	  
  <td align="center" class="fbody2">
   <input type="text" style="font:Georgia; font-size:12px; width:60px; height:20px;text-align:center;border:hidden;" id="BEmpBScore<?php echo $SnoB.'_'.$m; ?>" name="BEmpBScore<?php echo $SnoB.'_'.$m; ?>" value="<?php if($nn==1){ echo floatval($restt['tScor']); }elseif($_SESSION['eAppform']=='Y'){ echo floatval($rSubB['AppraiserScore']);}elseif($_SESSION['eMidform']=='Y'){echo $rSubB['Mid_AppraiserScore']; } ?>"  readonly/>
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
   
   
   
   
   
<?php $SnoB++;} $FormBRowNo=$SnoB-1;?>
   <input type="hidden" id="SnoB" name="SnoB" value="<?php echo $SnoB; ?>" />
   <input type="hidden" id="EmpFormBRow" name="EmpFormBRow" value="<?php echo $FormBRowNo; ?>" />
   					  
   <tr bgcolor="#FFFFFF">
    <td colspan="10" class="fbody" style="font-weight:bold; vertical-align:middle;" align="right"> Final Appraiser FormB Score:&nbsp;</td><td class="h"><input type="hidden" id="AppraiserFormBScore" name="AppraiserFormBScore" class="h" value="<?php if($_SESSION['eAppform']=='Y'){ echo $resApp['AppraiserFormBScore']; }elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_AppraiserFormBScore']; } ?>" readonly/><?php if($_SESSION['eAppform']=='Y'){ echo $resApp['AppraiserFormBScore']; }elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_AppraiserFormBScore']; } ?></td>
   </tr>
   <tr bgcolor="#FFFFFF">
   <td colspan="10" class="fbody" style="font-weight:bold; vertical-align:middle;" align="right"> Reviewer Score:&nbsp;</td>
  <td align="center" class="h"><input id="ReviewerFormBScore" class="h" style="background-color:#9BCDFF;width:80px;" value="<?php echo $resApp['ReviewerFormBScore']; ?>" <?php if($resApp['Reviewer_PmsStatus']==2) { echo 'readonly'; } ?> onKeyUp="RevEnterFormB()" onChange="RevEnterFormB()" maxlength="3"/>
</td>
</tr>
  
  </table>
  </td>
 </tr>
 <tr><td>&nbsp;</td></tr>
 
  <?php /********************** New Feedback Form Open *************************** ?>
 <tr><td class="bdy"><b><i>Other Skill/ Behavioral related feedback&nbsp;</i></b></td></tr>
 <tr>
  <td>
  <table width="95%">
   <tr bgcolor="#FFFF53" style="height:22px;">
	<td class="fhead" style="width:30px;"><b>SNo.</b></td>
	<td class="fhead" style="width:200px;"><b>Feedback By</b></td>	
	<td class="fhead" style="width:100px;"><b>Department</b></td>
	<td class="fhead" style="width:80px;"><b>Feedback<br>Date</b></td>
	<td class="fhead" style="width:200px;"><b>Attribute</b></td>
	<td class="fhead" style="width:400px;"><b>Comment</b></td>
   </tr>
<?php $sql=mysql_query("select Fname,Sname,Lname,DepartmentCode,f.* from hrm_feedback f inner join hrm_employee e on f.SubBy=e.EmployeeID inner join hrm_employee_general g on f.SubBy=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where f.EmployeeID=".$Eid." order by f.SubDate DESC",$con); 
	$sno=1; while($res=mysql_fetch_array($sql)){ ?>
	<tr style="height:20px;background-color:#FFFFFF;">
		<td class="fbody" align="center"><?php echo $sno; ?></td>
		<td class="fbody"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
        <td class="fbody"><?php echo $res['DepartmentCode'];?></td>			
		<td class="fbody" align="center"><?php echo date("d M y",strtotime($res['SubDate']));?></td>	
		<td class="fbody"><?php echo $res['BehAtt'];?></td>		
		<td class="fbody"><?php echo $res['Remark'];?></td>
	</tr>
	<?php $sno++; } ?>
  </table>
  </td>
 </tr>
 <tr><td>&nbsp;</td></tr>
 <?php /********************** New Feedback Form Close **************************/ ?>
 
  
  <?php 
 $DjY=date("Y",strtotime($_SESSION['AllowDoj'])); $Djmd=date("m-d",strtotime($_SESSION['AllowDoj'])); $DjmY2=$DjY-1; 
 $DojmY2=date("Y-m-d",strtotime($_SESSION['AllowDoj']));
 $DojY=$DjmY2."-".$Djmd; 
 
 $sqlEdt=mysql_query("select DateJoining,DateConfirmationYN from hrm_employee_general where EmployeeID=".$Eid,$con);
 $resEdt=mysql_fetch_assoc($sqlEdt);
 
 $FirstRating='';
 if($resEdt['DateConfirmationYN']=='Y' AND $resEdt['DateJoining']>$DojY AND $resEdt['DateJoining']<=$DojmY2)
 { 
  $sqlRt=mysql_query("select Rating from hrm_employee_confletter where ConfLetterId=(select ConfLetterId from hrm_employee_confletter where EmployeeID=".$Eid." AND Status='A')",$con);
  $rowsRt=mysql_num_rows($sqlRt); 
  if($rowsRt>0){ $resRt=mysql_fetch_assoc($sqlRt); $FirstRating=$resRt['Rating']; }else{ $FirstRating=''; }
 }
 if($FirstRating>0){
 ?>
 <tr>
  <td>
  <table border="0" cellspacing="1">
   <tr>
    <td colspan="10" class="bdy"><b><i>Confirmation Rating:&nbsp;</i>
	<font color="#FF0000"><?php echo $FirstRating; ?></font>
	</b></td>
	
   </tr> 
  </table>
  </td>
 </tr>
 <?php } //if($FirstRating>0) ?>
 
 
  <tr>
  <td>
  <table border="0" cellspacing="1">
   <tr><td colspan="10" class="bdy"><b><i>Calculation of PMS score&nbsp;</i></b></td></tr>
   <tr bgcolor="#FFFF53" style="height:22px;">
	<td class="fhead" style="width:150px;">&nbsp;</td>
	<td class="fhead" style="width:100px;">KRA Form</td>
	<td class="fhead" style="width:100px;">(%)<br>Weigthage</td>
	<td class="fhead" style="width:100px;">(A)<br>KRA Score</td>
	<td class="fhead" style="width:100px;">Behavioral Form </td>
	<td class="fhead" style="width:100px;">(%)<br>Weigthage</td>
	<td class="fhead" style="width:120px;">(B)<br>Behavioral Score</td>
	<td class="fhead" style="width:100px;">(A+B)<br>PMS Score </td>
    <td class="fhead" style="width:80px;"><b>Rating</b></td>
   </tr>
   <tr>
	<td bgcolor="#FFFFFF" style="font-family:Times New Roman;font-size:14px;font-weight:bold;vertical-align:middle;">&nbsp;Employee :</td>
	<td align="center" bgcolor="#9BCDFF" class="b"><?php if($_SESSION['eAppform']=='Y'){echo $resApp['EmpFormAScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_EmpFormAScore'];} ?></td>
	<td align="center" bgcolor="#C1FFC1" class="b"><?php echo $resApp['FormAKraAllow_PerOfWeightage']; ?></td>
	<td align="center" bgcolor="#FFE6E6" class="b"><?php if($_SESSION['eAppform']=='Y'){echo $resApp['EmpFinallyFormA_Score'];}elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_EmpFinallyFormA_Score'];} ?></td>
	<td align="center" bgcolor="#9BCDFF" class="b"><?php if($_SESSION['eAppform']=='Y'){echo $resApp['EmpFormBScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_EmpFormBScore'];} ?></td>
	<td align="center" bgcolor="#C1FFC1" class="b"><?php echo $resApp['FormBBehaviAllow_PerOfWeightage']; ?></td>
	<td align="center" bgcolor="#FFE6E6" class="b"><?php if($_SESSION['eAppform']=='Y'){echo $resApp['EmpFinallyFormB_Score'];}elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_EmpFinallyFormB_Score'];} ?></td>
	<td align="center" bgcolor="#F7FCD6" class="b"><?php if($_SESSION['eAppform']=='Y'){echo $resApp['Emp_TotalFinalScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_Emp_TotalFinalScore'];} ?></td>
	<td align="center" bgcolor="#F7FCD6" class="h"><?php if($_SESSION['eAppform']=='Y'){ echo $resApp['Emp_TotalFinalRating'];}elseif($_SESSION['eMidform']=='Y'){ echo $resApp['Mid_Emp_TotalFinalRating'];} ?></td>
   </tr>
   <tr>
	<td bgcolor="#FFFFFF" style="font-family:Times New Roman;font-size:14px;font-weight:bold;vertical-align:middle;">&nbsp;Appraiser :</td>
	<td align="center" bgcolor="#9BCDFF" class="b"><?php if($_SESSION['eAppform']=='Y'){echo $resApp['AppraiserFormAScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_AppraiserFormAScore'];} ?></td>
	<td align="center" bgcolor="#C1FFC1" class="b"><?php echo $resApp['FormAKraAllow_PerOfWeightage']; ?></td>
	<td align="center" bgcolor="#FFE6E6" class="b"><?php if($_SESSION['eAppform']=='Y'){echo $resApp['AppraiserFinallyFormA_Score'];}elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_AppraiserFinallyFormA_Score'];} ?></td>
	<td align="center" bgcolor="#9BCDFF" class="b"><?php if($_SESSION['eAppform']=='Y'){echo $resApp['AppraiserFormBScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_AppraiserFormBScore'];} ?></td>
	<td align="center" bgcolor="#C1FFC1" class="b"><?php echo $resApp['FormBBehaviAllow_PerOfWeightage']; ?></td>
	<td align="center" bgcolor="#FFE6E6" class="b"><?php if($_SESSION['eAppform']=='Y'){echo $resApp['AppraiserFinallyFormB_Score'];}elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_AppraiserFinallyFormB_Score'];} ?></td>
	<td align="center" bgcolor="#F7FCD6" class="b"><?php if($_SESSION['eAppform']=='Y'){echo $resApp['Appraiser_TotalFinalScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_Appraiser_TotalFinalScore'];} ?></td>
	<td align="center" bgcolor="#F7FCD6" class="h"><?php if($_SESSION['eAppform']=='Y'){ echo $resApp['Appraiser_TotalFinalRating'];}elseif($_SESSION['eMidform']=='Y'){ echo $resApp['Mid_Appraiser_TotalFinalRating'];} ?></td>
   </tr>
   <tr>
	<td bgcolor="#FFFFFF" style="font-family:Times New Roman;font-size:14px;font-weight:bold;vertical-align:middle;">&nbsp;Reviewer :</td>
	<td align="center" bgcolor="#9BCDFF"><input id="FormAScore" class="b" style="border-style:hidden;background-color:#9BCDFF;width:80px;" value="<?php echo $resApp['ReviewerFormAScore']; ?>" readonly/></td>
	<td align="center" bgcolor="#C1FFC1" class="b"><?php echo $resApp['FormAKraAllow_PerOfWeightage']; ?>
	<input type="hidden" id="weight_A" value="<?php echo $resApp['FormAKraAllow_PerOfWeightage']; ?>" /></td>
	<td align="center" bgcolor="#FFE6E6"><input id="Score_1" name="Score_1" class="b" style="border-style:hidden;background-color:#FFE6E6;width:80px;" value="<?php echo $resApp['ReviewerFinallyFormA_Score'];?>" readonly/></td>
	<td align="center" bgcolor="#9BCDFF"><input id="FormBScore" class="b" style="border-style:hidden;background-color:#9BCDFF;width:80px; height:22px;" value="<?php echo $resApp['ReviewerFormBScore']; ?>" readonly/></td>
	<td align="center" bgcolor="#C1FFC1" class="b"><?php echo $resApp['FormBBehaviAllow_PerOfWeightage']; ?>
	<input type="hidden" id="weight_B" value="<?php echo $resApp['FormBBehaviAllow_PerOfWeightage']; ?>" /></td>
	<td align="center" bgcolor="#FFE6E6"><input id="Score_2" name="Score_2" class="b" style="border-style:hidden;background-color:#FFE6E6;width:80px;" value="<?php echo $resApp['ReviewerFinallyFormB_Score']; ?>"  readonly/></td>
	<td align="center" bgcolor="#F7FCD6"><input id="TotalScore_12" name="TotalScore_12" class="b" style="border-style:hidden;background-color:#F7FCD6;width:80px;" value="<?php echo $resApp['Reviewer_TotalFinalScore']; ?>"  readonly/></td>
	<td align="center" bgcolor="#F7FCD6"><input id="TotalRating_12" name="TotalRating_12" class="h" style="border-style:hidden;background-color:#F7FCD6;width:80px;" value="<?php echo $resApp['Reviewer_TotalFinalRating']; ?>"  readonly/></td>
	<td align="center"><img src="images/BlinkingArrow.gif" border="0" style="height:15px;width:40px; " /></td>
   </tr>
  </table>
  </td>
 </tr>
 <tr><td>&nbsp;</td></tr>
 
 
 <tr>
  <td>
  <table style="width:100%;">
   <tr><td colspan="5" class="bdy"><b><i>Promotion Recommendation&nbsp;</i></b></td></tr>
   <?php $sql = mysql_query("select DepartmentId,DesigId,GradeId from hrm_employee_general where EmployeeID=".$Eid, $con); 
$res=mysql_fetch_assoc($sql); $sqlG = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$res['GradeId'], $con);$resG = mysql_fetch_assoc($sqlG); 
      if($resG['GradeValue']!='MG')
      { $NextGradeId=$res['GradeId']+1; 
      $sqlG2 = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$NextGradeId, $con); 
	  $resG2 = mysql_fetch_assoc($sqlG2); $NextGrade=$resG2['GradeValue']; 
      } elseif($resG['GradeValue']=='MG'){$NextGrade=$resG['GradeValue'];}
	  //$NextGrade=$resG['GradeValue']+1; $NextGrade2=$resG['GradeValue']+2; ?> 
      
   <tr bgcolor="#FFFF53" style="height:22px;">
    <td class="fhead" style="width:150px;">&nbsp;</td>      
    <td class="fhead" style="width:300px;">Current</td>
    <td class="fhead" style="width:300px;">Proposed(Appraiser)</td>
	<td class="fhead" style="width:300px;">Proposed(Reviewer)</td>
   </tr>
   <tr>
    <td bgcolor="#FFFFFF" style="font-family:Times New Roman;font-size:14px;font-weight:bold;vertical-align:middle;">&nbsp;&nbsp;Grade :</td> 
<?php $sqlGrade = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$res['GradeId'], $con); 
	  $sqlGr = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$resApp['Appraiser_EmpGrade'], $con);
$resGrade = mysql_fetch_assoc($sqlGrade); $resGr = mysql_fetch_assoc($sqlGr); ?>        
    <td bgcolor="#FFFFFF" class="b" align="center"><?php echo $resGrade['GradeValue']; ?>
    <input type="hidden" id="EmpGrade" value="<?php echo $res['GradeId']; ?>" /></td>
    <td bgcolor="#FFFFFF" class="b"><?php echo $resGr['GradeValue']; ?>
	<input type="hidden" id="AppGrade" value="<?php echo $resApp['Appraiser_EmpGrade']; ?>" />
    </td>
	
	<td bgcolor="#FFFFFF"><select style="width:60px;background-color:#DDFFBB;" class="b" id="GradeId" name="GradeId" onChange="SelectGrade(this.value,<?php echo $res['DepartmentId'].', '.$res['GradeId']; ?>)">
	<?php if($resApp['Reviewer_EmpGrade']!=0) 
	      { $sqlG = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$resApp['Reviewer_EmpGrade'], $con); $resG = mysql_fetch_assoc($sqlG); ?><option style="background-color:#FFFFFF;" value="<?php echo $resApp['Reviewer_EmpGrade']; ?>"><?php echo $resG['GradeValue']; ?></option><?php } ?>	
    <option style="background-color:#FFFFFF;" value="<?php echo $res['GradeId']; ?>"><?php echo $resGrade['GradeValue']; ?></option><option style="background-color:#FFFFFF;" value="<?php echo $NextGradeId; ?>"><?php echo $NextGrade; ?></option>  
    
    </select>
    </td>
   </tr> 
   <tr>
    <td bgcolor="#FFFFFF" style="font-family:Times New Roman;font-size:14px;font-weight:bold;vertical-align:middle;">&nbsp;&nbsp;Designation :</td> 
<?php $sqlDesig = mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$res['DesigId'], $con); 
      $sqlDe = mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$resApp['Appraiser_EmpDesignation'],$con);
	  $resDesig = mysql_fetch_assoc($sqlDesig); $resDe = mysql_fetch_assoc($sqlDe);
?>
    <td bgcolor="#FFFFFF" class="b" align="center"><?php echo strtoupper($resDesig['DesigName']); ?>
    <input type="hidden" id="EmpDesig" value="<?php echo $res['DesigId']; ?>" /></td>
    <td bgcolor="#FFFFFF" class="b"><span id="SpanDesig"><?php echo strtoupper($resDe['DesigName']); ?>
	<input type="hidden" id="AppDesig" value="<?php echo $resApp['Appraiser_EmpDesignation']; ?>" /></td>
	
	<td bgcolor="#FFFFFF" valign="top"><span id="SpanDesig"><select class="b" style="width:350px; background-color:#DDFFBB;" id="DesigId" name="DesigId">
    <?php if($resApp['Reviewer_EmpDesignation']!=0)
	      { $sqlD = mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$resApp['Reviewer_EmpDesignation'], $con); $resD = mysql_fetch_assoc($sqlD); ?><option style="background-color:#FFFFFF;" value="<?php echo $resApp['Reviewer_EmpDesignation']; ?>"><?php echo strtoupper($resD['DesigName']); ?></option>
    <?php } if($resApp['Reviewer_EmpDesignation']==0) { ?><option style="background-color:#FFFFFF;" value="<?php echo $res['DesigId']; ?>"><?php echo strtoupper($resDesig['DesigName']); ?></option>
    <?php } ?>
    <?php $sqlEx=mysql_query("select hrm_deptgradedesig.DesigId,DesigName from hrm_deptgradedesig INNER JOIN hrm_designation ON hrm_deptgradedesig.DesigId=hrm_designation.DesigId where DepartmentId=".$res['DepartmentId']." AND (GradeId=".$NextGradeId." OR GradeId_2=".$NextGradeId." OR GradeId_3=".$NextGradeId." OR GradeId_4=".$NextGradeId." OR GradeId_5=".$NextGradeId.") AND hrm_designation.DesigStatus='A' order by DesigName ASC", $con); while($resEx=mysql_fetch_assoc($sqlEx)){ ?>
<option style="background-color:#FFFFFF;" value="<?php echo $resEx['DesigId']; ?>"><?php echo strtoupper($resEx['DesigName']); ?></option><?php } ?>
    </select></span>
    </td>
	<td style="width:200px;">&nbsp;</td>
   </tr>
    <tr>
    <td bgcolor="#FFFFFF" style=" width:250px;font-family:Times New Roman;font-size:14px;font-weight:bold;vertical-align:middle;">&nbsp;&nbsp;Justification <font color="#0070DF">(Appraiser)</font> :</td>         
    <td colspan="4" style="font-family:Georgia; font-size:12px; font-weight:bold;" align=""><input style="height:20px;font-size:12px;width:100%;border-style:hidden;" value="<?php echo $resApp['Appraiser_Justification']; ?>" maxlength="250" readonly/></td>
   </tr>
   <tr>
    <td bgcolor="#FFFFFF" style="font-family:Times New Roman;font-size:14px;font-weight:bold;vertical-align:middle;">&nbsp;&nbsp;Justification <font color="#0070DF">(Reviewer)</font> :</td>         
    <td colspan="4" style="font-family:Georgia; font-size:12px;font-weight:bold;" align="">
    <input name="Justification" id="Justification" style="height:20px;font-size:12px;width:100%;border-style:hidden;" value="<?php echo $resApp['Reviewer_Justification']; ?>" maxlength="450"/></td>
   </tr>           
  </table>
  </td>
 </tr>
 <tr><td>&nbsp;</td></tr>


 <tr>
  <td>
  <table border="0" style="width:100%;">
   <tr><td colspan="5" class="bdy"><b><i>Training Requirements&nbsp;</i></b>&nbsp;&nbsp;<font style="color:#000000;font-size:18px;">[Mention training requirement during the next appraisal cycle.]</font></td></tr>
  </table>
  </td>
 </tr>
 <tr valign="middle">
  <td>
  <table style="width:100%;">
   <tr><td class="bdy"><b><i><u>Appraiser</u>&nbsp;</i></b></td></tr>
   <tr><td class="hl"><b>a)&nbsp;Soft Skills Training</b> [Based on Behavioral parameter]</td></tr>
   
   <tr>
    <td style="vertical-align:top;">
	 <table style="width:100%;">
	  <tr bgcolor="#FFFF53" style="height:22px;">
	   <td class="fhead" style="width:2%;">Sn</td> 
       <td class="fhead" style="width:15%;">Category</td>      
       <td class="fhead" style="width:18%;">Topic</td>
       <td class="fhead" style="width:63%;">Description</td>
      </tr>
	   <?php for($i=1; $i<=5; $i++){ 
	   $sS1 = mysql_query("SELECT Tid,Category,Topic,Description FROM hrm_pms_training WHERE Tid='".$resApp['Appraiser_SoftSkill_'.$i]."'",$con); $rS1 = mysql_fetch_assoc($sS1); if($rS1['Tid']!=''){?>
	   <tr style="height:22px;background-color:#FFFFFF;">
	    <td class="b"><?=$i?> </td>
        <td class="bdy" style="font-size:14px;"><?=$rS1['Category']?></td>      
        <td class="bdy" style="font-size:14px;"><?=$rS1['Topic']?></td>
        <td class="bdy" class="bdy" style="font-size:14px;"><?php if($rS1['Tid']==69){echo $resApp['Appraiser_SoftSkill_Oth'];}else{echo $rS1['Description'];}?></td>
       </tr>
	   <?php } } ?>
	 </table> 
	</td>
   </tr>
   
   <tr><td class="hl"><b>b)&nbsp;Functional Skills Training [Job related] </b> </td></tr>
   <tr>
    <td style="vertical-align:top;">
	 <table style="width:100%;">
	  <tr bgcolor="#FFFF53" style="height:22px;">
	   <td class="fhead" style="width:2%;">Sn</td>    
       <td class="fhead" style="width:18%;">Topic</td>
       <td class="fhead" style="width:63%;">Description</td>
      </tr>
	   <?php for($i=1; $i<=5; $i++){ 
	   $sS1 = mysql_query("SELECT Tid,Category,Topic,Description FROM hrm_pms_training WHERE Tid='".$resApp['Appraiser_TechSkill_'.$i]."'",$con); $rS1 = mysql_fetch_assoc($sS1); if($rS1['Tid']!=''){?>
	   <tr style="height:22px;background-color:#FFFFFF;">
	    <td class="b"><?=$i?> </td>    
        <td class="bdy" style="font-size:14px;"><?=$rS1['Topic']?></td>
        <td class="bdy" class="bdy" style="font-size:14px;"><?php if($rS1['Tid']==70){echo $resApp['Appraiser_TechSkill_Oth'];}else{echo $rS1['Description'];}?></td>
       </tr>
	   <?php } } ?>
	 </table> 
	</td>
   </tr>
   
   <?php /*
   <tr bgcolor="#FFFFFF" style="height:24px;">
    <td class="bl"><?php echo $resApp['Appraiser_SoftSkill_1'].', '.$resApp['Appraiser_SoftSkill_2']; ?></td>
   </tr>
   <tr><td class="hl"><b>b)&nbsp;Technical Training</b> [Job related]</td></tr>
   <tr bgcolor="#FFFFFF" style="height:24px;">
    <td class="bl"><?php echo $resApp['Appraiser_TechSkill_1'].', '. $resApp['Appraiser_TechSkill_2']; ?></td>
   </tr>
   */ ?>
   
    <tr><td class="hl"><b>c)&nbsp;Remark</b></td></tr>
    <tr bgcolor="#FFFFFF" style="height:24px;">
    <td class="bl"><?php if($_SESSION['eAppform']=='Y'){ echo $resApp['Appraiser_Remark']; }elseif($_SESSION['eMidform']=='Y'){echo $resApp['Mid_Appraiser_Remark']; } ?></td>
   </tr>
  </table>
  </td>
 </tr>
 
 <tr><td>&nbsp;</td></tr>
 
<script type="text/javascript">
function SelectACat(v,n)
{
 document.getElementById("ActID").value=n;
 var url = 'GetPMSTranning.php'; var pars = 'act=Get_A_Topic&v='+v+'&n='+n; 
 var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_FunAT }); 
}
function show_FunAT(originalRequest)
{ document.getElementById('SpnATop'+document.getElementById("ActID").value).innerHTML = originalRequest.responseText; }


function SelectATop(v,n)
{ 
 document.getElementById("ActID").value=n; document.getElementById("TopAA_"+n).value=v;
 var url = 'GetPMSTranning.php'; var pars = 'act=Get_A_Des&v='+v+'&n='+n;
 var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_FunAD });
}
function show_FunAD(originalRequest)
{ document.getElementById('SpnADes'+document.getElementById("ActID").value).innerHTML = originalRequest.responseText; }


function SelectBTop(v,n)
{ 
 document.getElementById("ActBID").value=n; //alert(v+"-"+n);
 var url = 'GetPMSTranning.php'; var pars = 'act=Get_B_Des&v='+v+'&n='+n;
 var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_FunBD });
}
function show_FunBD(originalRequest)
{ document.getElementById('SpnBDes'+document.getElementById("ActBID").value).innerHTML = originalRequest.responseText; }
  
  
function FunAddMin(T,n,V)
{
 
 if(T==1)
 { 
  var n0=n-1; var n1=n+1; 
  document.getElementById("TR_"+V+"_"+n1).style.background='#FFFFFF'; 
  if(n<4)
  {
   document.getElementById("Add_"+V+"_"+n1).style.display='block'; 
   document.getElementById("Min_"+V+"_"+n0).style.display='none';
  }
  else
  { 
   document.getElementById("Min_"+V+"_"+n0).style.display='none'; 
   document.getElementById("Min_"+V+"_"+n).style.display='none'; 
  }
  document.getElementById("SpnSn_"+V+"_"+n1).style.display='block'; 
  if(V=='A'){ document.getElementById("Spn"+V+"Cat"+n1).style.display='block'; } 
  document.getElementById("Spn"+V+"Top"+n1).style.display='block'; 
  document.getElementById("Spn"+V+"Des"+n1).style.display='block';
  document.getElementById("Add_"+V+"_"+n).style.display='none'; 
  document.getElementById("Min_"+V+"_"+n).style.display='block';
 }
 else if(T==2)
 {
  var n0=n-1; var n1=n+1; 
  document.getElementById("TR_"+V+"_"+n1).style.background=''; 
  if(n<4)
  { 
    document.getElementById("Add_"+V+"_"+n1).style.display='none'; 
    if(n!=2){ document.getElementById("Min_"+V+"_"+n0).style.display='block'; } 
  }
  else
  { 
   document.getElementById("Min_"+V+"_"+n0).style.display='block'; 
   document.getElementById("Min_"+V+"_"+n).style.display='block';
  }
  document.getElementById("SpnSn_"+V+"_"+n1).style.display='none';
  if(V=='A'){ document.getElementById("Spn"+V+"Cat"+n1).style.display='block'; }  
  document.getElementById("Spn"+V+"Top"+n1).style.display='none'; 
  document.getElementById("Spn"+V+"Des"+n1).style.display='none';
  document.getElementById("Add_"+V+"_"+n).style.display='block'; 
  document.getElementById("Min_"+V+"_"+n).style.display='none';
  if(V=='A'){ document.getElementById("Spn"+V+"Cat"+n1).style.display='none'; } 
 }

}

function FunOthr(v,n)
{
 if(n==1){ document.getElementById("TraS_Oth").value=v; }
 else if(n==2){ document.getElementById("TraT_Oth").value=v; }
}  
  
</script>
 <?php $sqlDpt=mysql_query("select DepartmentCode from hrm_department d inner join hrm_employee_general g on d.DepartmentId=g.DepartmentId where g.EmployeeID=".$Eid,$con); $resDpt=mysql_fetch_array($sqlDpt); ?>  
 <tr valign="middle">
  <td>
  <table style="width:100%;">
   <tr><td class="bdy"><b><i><u>Reviewer</u>&nbsp;</i></b></td></tr>
   <tr><td class="hl"><b>a)&nbsp;Soft Skills Training</b> [Based on Behavioral parameter]</td></tr>
   
   <tr>
    <td style="vertical-align:top;">
	 <table style="width:100%;">
	  <tr bgcolor="#FFFF53" style="height:22px;">
	   <td class="fhead" style="width:2%;"></td>
	   <td class="fhead" style="width:2%;">Sn</td> 
       <td class="fhead" style="width:15%;">Category</td>      
       <td class="fhead" style="width:18%;">Topic</td>
       <td class="fhead" style="width:63%;">Description</td>
      </tr>
	   <?php for($i=1; $i<=5; $i++){ ?>
	   <tr id="TR_A_<?=$i?>" style="height:22px;background-color:<?php if($i<=2 || $resApp['Reviewer_SoftSkill_'.$i]!=''){echo '#FFFFFF';}else{echo '';}?>;">
	    <td class="b" id="TD<?=$i?>1">
		 <?php if($i<=4){ ?>
		 <img src="images/Addnew.png" id="Add_A_<?=$i?>" style="display:<?php if(($i==2 && $resApp['Reviewer_SoftSkill_'.$i]=='') OR ($i>=2 && $resApp['Reviewer_SoftSkill_'.$i]!='')){echo 'block';}else{echo 'none';}?>;" onClick="FunAddMin(1,<?=$i?>,'A')">
		 <img src="images/Minusnew.png" id="Min_A_<?=$i?>" style="display:<?php if($i>2 && $resApp['Reviewer_SoftSkill_'.$i]!=''){echo 'block';}else{echo 'none';}?>;" onClick="FunAddMin(2,<?=$i?>,'A')">
		 <?php } ?>
		</td>
	    <td class="b" id="TD<?=$j?>2">
		 <span id="SpnSn_A_<?=$i?>" style="display:<?php if($i>=3 && $resApp['Reviewer_SoftSkill_'.$i]==''){echo 'none';}else{echo 'block';}?>;">
		  <?=$i?>
		 </span>
		</td>
        <td id="TD<?=$i?>3">
		<span id="SpnACat<?=$i?>" style="display:<?php if($i>=3 && $resApp['Reviewer_SoftSkill_'.$i]==''){echo 'none';}else{echo 'block';}?>;">
	    <select style="width:99%;background-color:#DDFFBB;" class="a" id="CatA_<?=$i?>" name="CatA_<?=$i?>" onChange="SelectACat(this.value,<?=$i?>)">
		<?php if($resApp['Reviewer_SoftSkill_'.$i]!='' OR $resApp['Reviewer_SoftSkill_'.$i]!='0'){ $sSS1 = mysql_query("SELECT Tid,Category FROM hrm_pms_training WHERE Tid=".$resApp['Reviewer_SoftSkill_'.$i],$con); $rSS1 = mysql_fetch_assoc($sSS1);?><option style="background-color:#FFFFFF;" value="<?=$rSS1['Tid']?>"><?=$rSS1['Category']?></option>
		<?php }else{?><option style="background-color:#FFFFFF;" value="">Select</option><?php } ?>
		<?php $sS1 = mysql_query("SELECT Tid,Category FROM hrm_pms_training WHERE Type='Soft Skill' AND Category!='Other' AND Sts='A' group by Category order by Category",$con); while($rS1 = mysql_fetch_assoc($sS1)){ ?><option style="background-color:#FFFFFF;" value="<?=$rS1['Category']?>"><?=$rS1['Category']?></option><?php } ?>
		<?php /*?><option style="background-color:#FFFFFF;" value="Other" <?php if($resApp['Appraiser_SoftSkill_'.$i]==69){echo 'selected';}?>>Other</option><?php */?>
		</select>
		</span>
	    </td>      
        <td>
		<span id="SpnATop<?=$i?>" style="display:<?php if($i>=3 && $resApp['Reviewer_SoftSkill_'.$i]==''){echo 'none';}else{echo 'block';}?>;">
	    <select style="width:99%;background-color:#DDFFBB;" class="a" id="TopA_<?=$i?>" name="TopA_<?=$i?>" onChange="SelectATop(this.value,<?=$i?>)" <?php if($resApp['Reviewer_SoftSkill_'.$i]=='' OR $resApp['Reviewer_SoftSkill_'.$i]=='0'){ echo 'disabled';}?> >
		<?php if($resApp['Reviewer_SoftSkill_'.$i]=='' OR $resApp['Reviewer_SoftSkill_'.$i]=='0'){?>
		<option style="background-color:#FFFFFF;" value="">Select</option><?php } ?>
		<?php $sS2 = mysql_query("SELECT Tid,Topic FROM hrm_pms_training WHERE Type='Soft Skill' AND Sts='A' group by Topic order by Topic,Category", $con); while($rS2 = mysql_fetch_assoc($sS2)){ ?><option style="background-color:#FFFFFF;" value="<?=$rS2['Tid']?>" <?php if($rS2['Tid']==$resApp['Reviewer_SoftSkill_'.$i]){echo 'selected';}?>><?=$rS2['Topic']?></option><?php } ?>
		<option style="background-color:#FFFFFF;" value="69" <?php if($resApp['Reviewer_SoftSkill_'.$i]==69){echo 'selected';}?>>Other</option>
		</select>
		</span>
		
		<input type="hidden" name="TopAA_<?=$i?>" id="TopAA_<?=$i?>" value="<?=$resApp['Reviewer_SoftSkill_'.$i]?>"/>
		
	    </td>
        <td class="bdy" id="TD<?=$i?>4" class="bdy" style="font-size:14px;">
<?php $desc=''; if($resApp['Reviewer_SoftSkill_'.$i]!='' && $resApp['Reviewer_SoftSkill_'.$i]!='69'){ $sDs = mysql_query("SELECT Description FROM hrm_pms_training WHERE Tid=".$resApp['Reviewer_SoftSkill_'.$i], $con); $rDs = mysql_fetch_assoc($sDs); $desc=$rDs['Description']; }elseif($resApp['Reviewer_SoftSkill_'.$i]=='69'){$desc=$resApp['Reviewer_SoftSkill_Oth'];} ?>  
		 <span id="SpnADes<?=$i?>" style="display:<?php if($i>=3 && $resApp['Reviewer_SoftSkill_'.$i]==''){echo 'none';}else{echo 'block';}?>;">
		 <?=$desc?>
		 </span>
		</td>
       </tr>
	   <?php } ?>
	 </table> 
	 
	 
	<input type="hidden" id="ActID" value="0"/><input type="hidden" id="ActBID" value="0"/>  
	<input type="hidden" name="TraS_Oth" id="TraS_Oth" value="<?=$resApp['Reviewer_SoftSkill_Oth']?>"/>
	<input type="hidden" name="TraT_Oth" id="TraT_Oth" value="<?=$resApp['Reviewer_TechSkill_Oth']?>"/>
	
	<input type="hidden" id="RevSoftSkill_1" name="RevSoftSkill_1" value="<?php echo $resApp['Reviewer_SoftSkill_1']; ?>" class="bl" style="width:100%;border:hidden;" maxlength="400" <?php if($resApp['Reviewer_PmsStatus']==2) { echo 'readonly'; } ?> /><input type="hidden" id="RevSoftSkill_2" name="RevSoftSkill_2" value="<?php echo $resApp['Reviewer_SoftSkill_2']; ?>" class="bl" style="width:100%;border:hidden;" maxlength="400" <?php if($resApp['Reviewer_PmsStatus']==2) { echo 'readonly'; } ?> />
	</td>
   </tr>
   <tr><td class="hl"><b>b)&nbsp;Technical Training</b> [Job related]</td></tr>
   <tr>
    <td style="vertical-align:top;">
	 <table style="width:100%;">
	  <tr bgcolor="#FFFF53" style="height:22px;">
	   <td class="fhead" style="width:2%;"></td>
	   <td class="fhead" style="width:3%;">Sn</td> 
       <td class="fhead" style="width:18%;">Topic</td>
       <td class="fhead" style="width:77%;">Description</td>
      </tr>
	   <?php for($j=1; $j<=5; $j++){ ?>
	   
	   <tr id="TR_B_<?=$j?>" style="height:22px;background-color:<?php if($j<=2 || $resApp['Reviewer_TechSkill_'.$j]!=''){echo '#FFFFFF';}else{echo '';}?>;">
	    
		<td class="b" id="TD<?=$j?>1">
		 <?php if($j<=4){ ?>
		 <img src="images/Addnew.png" id="Add_B_<?=$j?>" style="display:<?php if(($j==2 && $resApp['Reviewer_TechSkill_'.$j]=='') OR ($j>=2 && $resApp['Reviewer_TechSkill_'.$j]!='')){echo 'block';}else{echo 'none';}?>;" onClick="FunAddMin(1,<?=$j?>,'B')">
		 <img src="images/Minusnew.png" id="Min_B_<?=$j?>" style="display:<?php if($j>2 && $resApp['Reviewer_TechSkill_'.$j]!=''){echo 'block';}else{echo 'none';}?>;" onClick="FunAddMin(2,<?=$j?>,'B')">
		 <?php } ?>
		</td>
		<td class="b" id="TD<?=$j?>2">
		 <span id="SpnSn_B_<?=$j?>" style="display:<?php if($j>=3 && $resApp['Reviewer_TechSkill_'.$j]==''){echo 'none';}else{echo 'block';}?>;">
		  <?=$j?>
		 </span>
		</td>   
        <td id="TD<?=$j?>3">
		<span id="SpnBTop<?=$j?>" style="display:<?php if($j>=3 && $resApp['Reviewer_TechSkill_'.$j]==''){echo 'none';}else{echo 'block';}?>;">
	     <select style="width:99%;background-color:#DDFFBB;" class="a" id="TopB_<?=$j?>" name="TopB_<?=$j?>" onChange="SelectBTop(this.value,<?=$j?>)">
		 <?php if($resApp['Reviewer_TechSkill_'.$j]=='' OR $resApp['Reviewer_TechSkill_'.$j]=='0'){?>
		 <option style="background-color:#FFFFFF;" value="">Select</option><?php } ?>
		<?php $sS2 = mysql_query("SELECT Tid,Topic FROM hrm_pms_training WHERE Type='Functional Skills' AND Category='".$resDpt['DepartmentCode']."' AND Sts='A' group by Topic order by Topic,Category", $con); while($rS2 = mysql_fetch_assoc($sS2)){ ?><option style="background-color:#FFFFFF;" value="<?=$rS2['Tid']?>" <?php if($rS2['Tid']==$resApp['Reviewer_TechSkill_'.$j]){echo 'selected';}?>><?=$rS2['Topic']?></option><?php } ?>
		<option style="background-color:#FFFFFF;" value="70" <?php if($resApp['Reviewer_TechSkill_'.$j]==70){echo 'selected';}?>>Other</option>
		<option style="background-color:#FFFFFF;" value="70">Other</option>
		 </select>
		</span>
	    </td>
        <td id="TD<?=$j?>4" class="bdy" style="font-size:14px;">
		<?php $descB=''; if($resApp['Reviewer_TechSkill_'.$j]!='' && $resApp['Reviewer_TechSkill_'.$j]!='70'){ $sDsB = mysql_query("SELECT Description FROM hrm_pms_training WHERE Tid=".$resApp['Reviewer_TechSkill_'.$j], $con); $rDsB = mysql_fetch_assoc($sDsB); $descB=$rDsB['Description']; }elseif($resApp['Reviewer_TechSkill_'.$j]=='70'){$descB=$resApp['Reviewer_TechSkill_Oth'];} ?>
		 <span id="SpnBDes<?=$j?>" style="display:<?php if($j>=3 && $resApp['Reviewer_TechSkill_'.$j]==''){echo 'none';}else{echo 'block';}?>;">
		 <?=$descB?>
		 </span>
		</td>
       </tr>
	  
	   <?php } ?>
	 </table>
	<input type="hidden" id="RevTechSkill_1" name="RevTechSkill_1" value="<?php echo $resApp['Reviewer_TechSkill_1']; ?>" class="bl" style="width:100%;border:hidden;" maxlength="400" <?php if($resApp['Reviewer_PmsStatus']==2) { echo 'readonly'; } ?> /><input type="hidden" id="RevTechSkill_2" name="RevTechSkill_2" value="<?php echo $resApp['Reviewer_TechSkill_2']; ?>" class="bl" style="width:100%;border:hidden;" maxlength="400" <?php if($resApp['Reviewer_PmsStatus']==2) { echo 'readonly'; } ?> />
	</td>
   </tr>
   
   <tr><td class="hl"><b>c)&nbsp;Remark</b></td></tr>
   <tr bgcolor="#FFFFFF" style="height:24px;">
    <td><input id="RevRemarks" name="RevRemarks" value="<?php  echo $resApp['Reviewer_Remark'];  ?>" class="bl" style="width:100%;border:hidden;" maxlength="450" <?php if($resApp['Reviewer_PmsStatus']==2){ echo 'readonly'; } ?> /></td>
   </tr>
  </table>
  </td>
 </tr>
 <tr><td>&nbsp;</td></tr>
 
 
 <tr>
 <td>
    <table>
	  <tr>
      <td align="left" style="width:100px;"><input type="button" name="SaveScore" id="SaveScore" style="width:90px;height:25px;" onClick="return RevScore(<?php echo $resApp['EmpPmsId'].','.$Eid.','.$YearId; ?>)" value="save"/></td>
      <td align="left" style="width:150px;"><input type="button" name="SubmitScore" id="SubmitScore" style="width:120px;height:25px;" onClick="return RevScore2(<?php echo $resApp['EmpPmsId'].','.$Eid.','.$YearId; ?>)" value="submit form"/></td>
 <td style="width:300px;"><font color="#014E05" style='font-family:Times New Roman;' size="4"><b><i><span id="MsgSpan2"></span></i><?php echo $msq; ?></b></font></td>	
 </tr>
   </table>
</td>
 </tr>	                           	
</table>		 
</form>
<?php } ?>	
	   </td>
      <?php //************************************************ Close ******************************// ?>	  	   
	</tr>
  </table>
   </td>
 </tr>
          </table>
		 </td>
		 <td id="Empkra" style="display:none;">
	      <span id="EmpKraSpan">&nbsp;</span>
	     </td>
</form>		 	   
		</tr>
	  </table>
	</td>
   </tr>
<?php //******************************************** ?>    
  </table>
 </td>
</tr>					
<?php //************************ Close ****************************************************** ?>					
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