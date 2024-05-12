<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
/******************************************************************************/
include("SetKraPmsy.php");
$sqlPmsId=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$resSYP['CurrY']." AND EmployeeID=".$EmployeeId, $con); $resPmsId=mysql_fetch_assoc($sqlPmsId);
//**********************************************/
if(isset($_POST['SubmitFormB']))
{   $search =  '*"#$%@~/\':' ; $search = str_split($search); $n=$_POST['FormBRow']; 
	 
	if($resKeey['AppraisalForm']=='Y')
	{
	  for($i=1; $i<=$n; $i++)
      { 
	   $CommentExam=str_replace($search, "", $_POST['Comments_Example'.$i]);
       $sqlIns=mysql_query("insert into hrm_employee_pms_behavioralformb(EmpPmsId,FormBId,SelfRating,SelfFormBScore,Comments_Example) values(".$resPmsId['EmpPmsId'].",'".$_POST['FormBId'.$i]."',".$_POST['SelfRatingB'.$i].",".$_POST['EmpBScore'.$i].",'".$CommentExam."')", $con); 
      } 
	  if($sqlIns)
      {
	   $sqlUp=mysql_query("update hrm_employee_pms set Emp_SkillSave='Y', Emp_PmsStatus=1, EmpFormBScore=".$_POST['EmpFinalFormBScore']." where EmpPmsId=".$resPmsId['EmpPmsId'], $con);
	   $msg="Data saved successfully!";
	  }
	}
	elseif($resKeey['MidPmsForm']=='Y')
	{
	  for($i=1; $i<=$n; $i++)
      { 
	   $CommentExam=str_replace($search, "", $_POST['Comments_Example'.$i]);
       $sqlIns=mysql_query("insert into hrm_employee_pms_behavioralformb(EmpPmsId,FormBId,Mid_SelfRating,Mid_SelfFormBScore,Mid_Comments_Example) values(".$resPmsId['EmpPmsId'].",'".$_POST['FormBId'.$i]."',".$_POST['SelfRatingB'.$i].",".$_POST['EmpBScore'.$i].",'".$CommentExam."')", $con); 
      } 
	  if($sqlIns)
      {
	   $sqlUp=mysql_query("update hrm_employee_pms set Emp_SkillSave='Y', Emp_PmsStatus=1, Mid_EmpFormBScore=".$_POST['EmpFinalFormBScore']." where EmpPmsId=".$resPmsId['EmpPmsId'], $con);
	   $msg="Data saved successfully!";
	  }
	}
		 
}


if(isset($_POST['SubmitResetFormB']))
{   $search =  '*"#$%@~/\':' ; $search = str_split($search); $n=$_POST['BRow'];  
	
	if($resKeey['AppraisalForm']=='Y')
	{
	  for($i=1; $i<=$n; $i++)
      { 
	   $CommentExamA=str_replace($search, "", $_POST['Comments_Example'.$i]);
       $sqlIns=mysql_query("update hrm_employee_pms_behavioralformb set SelfRating=".$_POST['BSelfRatingB'.$i].", SelfFormBScore=".$_POST['BEmpBScore'.$i].", Comments_Example='".$CommentExamA."' where EmpPmsId=".$resPmsId['EmpPmsId']." AND BehavioralFormBId=".$_POST['BehaFormBId'.$i], $con);
      } 
	  if($sqlIns)
      {
	   $sqlUp=mysql_query("update hrm_employee_pms set Emp_SkillSave='Y', Emp_PmsStatus=1, EmpFormBScore=".$_POST['EmpFinalFormBScore']." where EmpPmsId=".$resPmsId['EmpPmsId'], $con);
	   $msg="Data saved successfully!";
	  }
	}
	elseif($resKeey['MidPmsForm']=='Y')
	{
	  for($i=1; $i<=$n; $i++)
      { 
	   $CommentExamA=str_replace($search, "", $_POST['Comments_Example'.$i]);
       $sqlIns=mysql_query("update hrm_employee_pms_behavioralformb set Mid_SelfRating=".$_POST['BSelfRatingB'.$i].", Mid_SelfFormBScore=".$_POST['BEmpBScore'.$i].", Mid_Comments_Example='".$CommentExamA."' where EmpPmsId=".$resPmsId['EmpPmsId']." AND BehavioralFormBId=".$_POST['BehaFormBId'.$i], $con);
      } 
	  if($sqlIns)
      {
	   $sqlUp=mysql_query("update hrm_employee_pms set Emp_SkillSave='Y', Emp_PmsStatus=1, Mid_EmpFormBScore=".$_POST['EmpFinalFormBScore']." where EmpPmsId=".$resPmsId['EmpPmsId'], $con);
	   $msg="Data saved successfully!";
	  }
	}
	 
}

//*************************************/
include("EmpPmsFormSubmit.php");
//*************************************/
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style>.font {color:#000; font-family:Times New Roman; font-size:15px; font-weight:bold;}  .font {color:#000; font-family:Times New Roman; font-size:14px;}
.sbutton{ font-family:Times New Roman;font-size:15px; height:28px;}
.Input{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;} .font1 { font-family:Times New Roman; font-size:14px; height:14px; } .font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function editFormBN()
{ document.getElementById("SubmitFormB").style.display='block'; document.getElementById("FormBN").style.display='none'; 
  var FormBRowY=document.getElementById("FormBRow").value; 
  for(var i=1; i<=FormBRowY; i++) {document.getElementById("SelfRatingB"+i).readOnly=false;document.getElementById("Comments_Example"+i).readOnly=false; document.getElementById("SelfRatingB"+i).style.background='#B9DCFF'; document.getElementById("Comments_Example"+i).style.background='#B9DCFF';} 
}

function editFormBY()
{ document.getElementById("SubmitResetFormB").style.display='block'; document.getElementById("FormBY").style.display='none'; 
  var BRowY=document.getElementById("BRow").value; 
  for(var i=1; i<=BRowY; i++) {document.getElementById("BSelfRatingB"+i).readOnly=false;document.getElementById("Comments_Example"+i).readOnly=false; document.getElementById("BSelfRatingB"+i).style.background='#B9DCFF'; document.getElementById("Comments_Example"+i).style.background='#B9DCFF';}
}


function ValidationFormB(SkillFormB)
{ 
  var FormBRow=document.getElementById("FormBRow").value;
  var SkillSave=document.getElementById("SkillSave").value;
  for(var i=1; i<=FormBRow; i++)
   { 
     //if(document.getElementById("SelfRatingB"+i).value==0){alert("please enter self rating");  return false; }
     //if(document.getElementById("SelfRatingB"+i).value==""){alert("please enter self rating");  return false; }
if(SkillSave=='N')
{
if(document.getElementById("SelfRatingB"+i).value>150){alert("Please check self rating value");return false; }
var Numfilter=/^[0-9. ]+$/;  var test_numB = Numfilter.test(document.getElementById("SelfRatingB"+i).value)
if(test_numB==false){ alert('Please Enter Only Number in the self rating Field');  return false; }
if(document.getElementById("SelfRatingB"+i).value>0 && document.getElementById("Comments_Example"+i).value==''){ alert('Please Enter Remark');  return false; }
}	
else if(SkillSave=='Y')
{
if(document.getElementById("BSelfRatingB"+i).value>150){alert("Please check self rating value");return false; }
var Numfilter=/^[0-9. ]+$/;  var test_numB = Numfilter.test(document.getElementById("BSelfRatingB"+i).value)
if(test_numB==false){ alert('Please Enter Only Number in the self rating Field');  return false; }
if(document.getElementById("BSelfRatingB"+i).value>0 && document.getElementById("Comments_Example"+i).value==''){ alert('Please Enter Remark');  return false; }
}	
   }

  var agree=confirm("Are you sure you want to save form B?");
  if (agree) { return true;} else {return false;}
}		

function EnterEmpFormB()
{ var EmpFormBRow=document.getElementById("FormBRow").value; var SnoB=document.getElementById("SnoB").value;  
  var SUM = parseFloat(document.getElementById("FormBSum").value);  var FormBScore=parseFloat(document.getElementById("EmpFormBScore"+SnoB).value); 
  for(var i=1; i<=EmpFormBRow; i++)
  { 
    var FormBWeight = parseFloat(document.getElementById("WeightageB"+i).value); var FormBTarget = parseFloat(document.getElementById("TargetB"+i).value); var EmpFormBRating = parseFloat(document.getElementById("SelfRatingB"+i).value); var EmpFormBScore = parseFloat(document.getElementById("EmpBScore"+i).value);
    var NewEmpFormBScore=document.getElementById("EmpBScore"+i).value=Math.round(((EmpFormBRating/FormBTarget)*FormBWeight)*100)/100;
	var Score=document.getElementById("FormBScore"+i).value=Math.round((NewEmpFormBScore)*100)/100;
  }

 var s1= parseFloat(document.getElementById("FormBScore"+1).value); var s2= parseFloat(document.getElementById("FormBScore"+2).value); var s3= parseFloat(document.getElementById("FormBScore"+3).value); var s4= parseFloat(document.getElementById("FormBScore"+4).value); var s5= parseFloat(document.getElementById("FormBScore"+5).value); var s6= parseFloat(document.getElementById("FormBScore"+6).value); var s7= parseFloat(document.getElementById("FormBScore"+7).value); var s8= parseFloat(document.getElementById("FormBScore"+8).value); var s9= parseFloat(document.getElementById("FormBScore"+9).value); var s10= parseFloat(document.getElementById("FormBScore"+10).value); var s11= parseFloat(document.getElementById("FormBScore"+11).value); var s12= parseFloat(document.getElementById("FormBScore"+12).value); var s13= parseFloat(document.getElementById("FormBScore"+13).value); var s14= parseFloat(document.getElementById("FormBScore"+14).value); var s15= parseFloat(document.getElementById("FormBScore"+15).value); var s16= parseFloat(document.getElementById("FormBScore"+16).value); var s17= parseFloat(document.getElementById("FormBScore"+17).value); var s18= parseFloat(document.getElementById("FormBScore"+18).value); var s19= parseFloat(document.getElementById("FormBScore"+19).value); var s20= parseFloat(document.getElementById("FormBScore"+20).value);
 var P = document.getElementById("FormBSum").value=Math.round((s1+s2+s3+s4+s5+s6+s7+s8+s9+s10+s11+s12+s13+s14+s15+s16+s17+s18+s19+s20)*100)/100; document.getElementById("EmpFormBScore"+SnoB).value=Math.round((P)*100)/100; 
}		

function BEnterEmpFormB()
{ var EmpFormBRow=document.getElementById("BRow").value; var SnoB=document.getElementById("BSnoB").value;  
  var SUM = parseFloat(document.getElementById("FormBSum").value);  var FormBScore=parseFloat(document.getElementById("EmpFormBScore"+SnoB).value); 
  for(var i=1; i<=EmpFormBRow; i++)
  { 
    var FormBWeight = parseFloat(document.getElementById("BWeightageB"+i).value); var FormBTarget = parseFloat(document.getElementById("BTargetB"+i).value); var EmpFormBRating = parseFloat(document.getElementById("BSelfRatingB"+i).value); var EmpFormBScore = parseFloat(document.getElementById("BEmpBScore"+i).value); 
    var NewEmpFormBScore=document.getElementById("BEmpBScore"+i).value=Math.round(((EmpFormBRating/FormBTarget)*FormBWeight)*100)/100; 
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
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $resSYP['CurrY']; ?>" />
<?php for($j=1; $j<=20; $j++) { ?><input type="hidden" id="FormBScore<?php echo $j; ?>" value="0" /><?php } ?><input type="hidden" id="FormBSum" value="0"/>  
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
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
<?php //*********************************************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>
			     <td id="Anni" valign="top" style="width:5px;"></td>
				 <td colspan="2" width="100%" valign="top">
				  <table border="0" width="100%">
<?php //*************************************** Start ********************************************* ?>					
<tr>
 <td colspan="5" width="100%" style="background-image:url(images/pmsback.png); " >	 
 <table width="100%">
 <tr>
  <td>
<?php include("SetKraPmsme.php"); ?>  
  </td>
 </tr>
  <tr>
    <td width="100%">
	  <table border="0" width="100%">
	    <tr>
		 <td style="width:5px;">&nbsp;</td>
<?php /****************************************** Form Start **************************/ ?>
<?php /***************** AppraisalForm **************************/ ?>	
		 <td id="AppraisalForm" style="width:100%;display:block;">
		  <table>		   
          <tr><td colspan="6"><?php include("SetKraPmsmeform.php"); ?></td></tr>
       <tr>
   <?php /***************** Form B(Skill) **************************/ ?>
<form name="SkillFormB" method="post" onSubmit="return ValidationFormB(this)"> 
   <td id="FormB" style="" width="100%">
	 <table border="0" width="100%">
	 <?php if($resKey['AppraisalForm']=='Y'){ ?>
 <tr><td colspan="9" align="center" class="font" style="color:#000084; width:100%;" valign="middle">
	  Rate your Competency level for current role as listed below. Self rating shall be in % against the 100% target Score. Score = rating/target*Weightage</td></tr>
	 <?php } ?>
 <tr bgcolor="#FFFF53" style="height:22px;">   
	  <td align="center" class="font" style="width:40px;">SNo.</td>
	  <td class="font" align="center" style="width:250px;">Behavioral/Skills</td>
	  <td class="font" align="center" style="width:550px;">Description</td>
	  <td class="font" align="center" style="width:60px;">Weightage</td>
	  <td class="font" align="center" style="width:60px;">Target</td>
	  <?php if($resKey['AppraisalForm']=='Y'){ ?>
	  <td class="font" align="center" style="width:80px;">Self Rating</td>
	  <?php /*?><td class="font" align="center" style="width:60px;">Score</td><?php */?>
	  <?php } ?>
	  <td class="font" align="center" style="width:100px;">Comments</td>
 </tr>
<?php $sqlYNB=mysql_query("select Emp_AchivementSave,Emp_KRASave,Emp_SkillSave,Emp_FeedBackSave,Emp_PmsStatus,Appraiser_PmsStatus from hrm_employee_pms where EmpPmsId=".$resPmsId['EmpPmsId'], $con); $resYNB=mysql_fetch_assoc($sqlYNB); 
echo '<input type="hidden" id="SkillSave" value="'.$resYNB['Emp_SkillSave'].'" />';
      if($resYNB['Emp_SkillSave']=='Y') { $sqlBY=mysql_query("select * from hrm_employee_pms_behavioralformb where EmpPmsId=".$resPmsId['EmpPmsId']." order by BehavioralFormBId ASC", $con);
	  $SnoB=1; while($resBY=mysql_fetch_array($sqlBY)){
	  $sqlB2=mysql_query("select Skill,SkillComment,Weightage,Target from hrm_pms_formb where FormBId=".$resBY['FormBId'], $con); $resB2=mysql_fetch_assoc($sqlB2);  ?>
	 <tr bgcolor="#FFFFFF">   
	  <td align="center" class="font1" style="width:40px;" valign="top"><?php echo $SnoB; ?>
	  <input type="hidden" name="BehaFormBId<?php echo $SnoB; ?>" value="<?php echo $resBY['BehavioralFormBId']; ?>" />
	  </td>
	  <td align="" valign="top" class="font1" style="width:250px;"><?php echo $resB2['Skill'] ?></td>
	  <td class="font1" valign="top" align="" style="width:550px;"><?php echo $resB2['SkillComment']; ?></td>
	  <td class="font1" valign="top" align="center" style="width:60px;">
	  <input type="hidden" name="BWeightageB<?php echo $SnoB; ?>" id="BWeightageB<?php echo $SnoB; ?>" value="<?php echo $resB2['Weightage'] ?>" readonly/><?php echo $resB2['Weightage'] ?></td>
	  <td class="font1" valign="top" align="center" style="width:60px;">
	  <input type="hidden" name="BTargetB<?php echo $SnoB; ?>" id="BTargetB<?php echo $SnoB; ?>" value="<?php echo $resB2['Target']; ?>" readonly/><?php echo $resB2['Target']; ?></td>
	  
	  <?php if($resKey['AppraisalForm']=='Y'){ ?>
	  <td class="font1" valign="top" align="center" style="width:80px;"> 
	  <?php if($resKey['AppraisalForm']=='Y'){ ?>
	  <input name="BSelfRatingB<?php echo $SnoB; ?>" id="BSelfRatingB<?php echo $SnoB; ?>" style="font:Georgia; font-size:12px; width:80px; height:20px; background-color:#FFFFAE; text-align:center;" readonly value="<?php echo $resBY['SelfRating']; ?>" onKeyDown="BEnterEmpFormB()" onKeyUp="BEnterEmpFormB()" onChange="BEnterEmpFormB()" maxlength="5" Add input field: oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"/>
	  <?php }elseif($resKey['MidPmsForm']=='Y'){?>
	  <input name="BSelfRatingB<?php echo $SnoB; ?>" id="BSelfRatingB<?php echo $SnoB; ?>" style="font:Georgia; font-size:12px; width:80px; height:20px; background-color:#FFFFAE; text-align:center;" readonly value="<?php echo $resBY['Mid_SelfRating']; ?>" onKeyDown="BEnterEmpFormB()" onKeyUp="BEnterEmpFormB()" onChange="BEnterEmpFormB()" maxlength="5" Add input field: oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"/>
	  <?php } ?>
	  
	  <input type="hidden" style="font:Georgia; font-size:12px; width:60px; height:20px;text-align:center;border:hidden;" id="BEmpBScore<?php echo $SnoB; ?>" name="BEmpBScore<?php echo $SnoB; ?>" value="<?php if($resKey['AppraisalForm']=='Y'){ echo $resBY['SelfFormBScore'];}elseif($resKey['MidPmsForm']=='Y'){echo $resBY['Mid_SelfFormBScore']; } ?>"  readonly/>
	  
	   </td>
	   <?php /*?><td class="font1" valign="top" align="center" style="width:60px;"><input type="text" style="font:Georgia; font-size:12px; width:60px; height:20px;text-align:center;border:hidden;" id="BEmpBScore<?php echo $SnoB; ?>" name="BEmpBScore<?php echo $SnoB; ?>" value="<?php if($resKey['AppraisalForm']=='Y'){ echo $resBY['SelfFormBScore'];}elseif($resKey['MidPmsForm']=='Y'){echo $resBY['Mid_SelfFormBScore']; } ?>"  readonly/></td><?php */?>
	  
	 
	  <?php }else{ ?>
	  <input type="hidden" name="BSelfRatingB<?php echo $SnoB; ?>" id="BSelfRatingB<?php echo $SnoB; ?>" readonly value="0"/>
	  <input type="hidden" id="BEmpBScore<?php echo $SnoB; ?>" name="BEmpBScore<?php echo $SnoB; ?>" value="0"  readonly/>
	  <?php } ?>
	  
	  <td class="font1" valign="top" align="" style="width:100px;">
	  <?php if($resKey['AppraisalForm']=='Y'){ ?>
	  <textarea name="Comments_Example<?php echo $SnoB; ?>" id="Comments_Example<?php echo $SnoB; ?>" cols="25" rows="2" style="font:Georgia;font-size:11px;background-color:#FFFFAE;" readonly ><?php echo $resBY['Comments_Example']; ?></textarea>      <?php }elseif($resKey['MidPmsForm']=='Y'){?>
	  <textarea name="Comments_Example<?php echo $SnoB; ?>" id="Comments_Example<?php echo $SnoB; ?>" cols="25" rows="2" style="font:Georgia;font-size:11px;background-color:#FFFFAE;" readonly ><?php echo $resBY['Mid_Comments_Example']; ?></textarea>
	 <?php } ?> 
	  </td>
	  
     </tr> 
	<?php $SnoB++;} $FormBRow=$SnoB-1; ?><input type="hidden" id="BSnoB" name="BSnoB" value="<?php echo $SnoB; ?>" />
	           <input type="hidden" name="BRow" id="BRow" value="<?php echo $FormBRow; ?>" />
                   <input type="hidden" name="FormBRow" id="FormBRow" value="<?php echo $FormBRow; ?>" /> 
	<?php  } if($resYNB['Emp_SkillSave']=='N') { 
	$SqlG=mysql_query("select GradeId,DepartmentId From hrm_employee_general where EmployeeID=".$EmployeeId, $con); $ResG=mysql_fetch_assoc($SqlG);
	$sqlB=mysql_query("select * from hrm_pms_formb INNER JOIN hrm_pms_formb_grade ON hrm_pms_formb.FormBId=hrm_pms_formb_grade.FormBId where hrm_pms_formb.SkillStatus='A' AND hrm_pms_formb.DepartmentId=".$ResG['DepartmentId']." AND hrm_pms_formb_grade.GradeId=".$ResG['GradeId']." order by hrm_pms_formb.FormBId ASC", $con); 
	$SnoB=1; while($resB=mysql_fetch_array($sqlB)){ ?>
 <tr bgcolor="#FFFFFF">   
	  <td align="center" class="font" style="width:30px;" valign="top"><?php echo $SnoB; ?></td>
	  <td align="" valign="top" class="font1" style="width:250px;">
	  <input type="hidden" name="FormBId<?php echo $SnoB; ?>" value="<?php echo $resB['FormBId'] ?>"/><?php echo $resB['Skill'] ?></td>
 
	  <td class="font1" valign="top" align="" style="width:480px;"><?php echo $resB['SkillComment']; ?></td>
	  <td class="font1" valign="top" align="center" style="width:50px;">
	  <input type="hidden" name="WeightageB<?php echo $SnoB; ?>" id="WeightageB<?php echo $SnoB; ?>" value="<?php echo $resB['Weightage'] ?>" readonly /><?php echo $resB['Weightage'] ?></td>

	  <td class="font1" valign="top" align="center" style="width:50px;">
	  <input type="hidden" name="TargetB<?php echo $SnoB; ?>" id="TargetB<?php echo $SnoB; ?>" value="<?php echo $resB['Target']; ?>" readonly/><?php echo $resB['Target']; ?></td>
	  
	  <?php if($resKey['AppraisalForm']=='Y'){ ?>
	  <td class="font1" valign="top" align="center" style="width:80px;">
	  <input name="SelfRatingB<?php echo $SnoB; ?>" id="SelfRatingB<?php echo $SnoB; ?>" style="font:Georgia; font-size:11px; width:80px; height:20px;background-color:#FFFFAE; text-align:center;" value="0" onKeyDown="EnterEmpFormB()" onKeyUp="EnterEmpFormB()" onChange="EnterEmpFormB()" maxlength="5" Add input field: oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"/> 
	  
	  <input type="hidden" style="font:Georgia; font-size:12px; width:60px; height:20px;text-align:center;border:hidden;" id="EmpBScore<?php echo $SnoB; ?>" name="EmpBScore<?php echo $SnoB; ?>" style="font-size:12px;width:60px; height:22px; text-align:center;" value="0" readonly/>
	  </td>
	  <?php /*?><td class="font1" valign="top" align="center" style="width:60px;"><input type="text" style="font:Georgia; font-size:12px; width:60px; height:20px;text-align:center;border:hidden;" id="EmpBScore<?php echo $SnoB; ?>" name="EmpBScore<?php echo $SnoB; ?>" style="font-size:12px;width:60px; height:22px; text-align:center;" value="0" readonly/></td><?php */?>
	  
	  <?php }else{ ?>
	  <input type="hidden" name="SelfRatingB<?php echo $SnoB; ?>" id="SelfRatingB<?php echo $SnoB; ?>" readonly value="0"/>
	  <input type="hidden" id="EmpBScore<?php echo $SnoB; ?>" name="EmpBScore<?php echo $SnoB; ?>" value="0"  readonly/>
	  <?php } ?>
	  
	  
	  <td class="font1" valign="top" align="center" style="width:100px;">
	  <textarea name="Comments_Example<?php echo $SnoB; ?>" id="Comments_Example<?php echo $SnoB; ?>" cols="25" rows="2" style="font:Georgia; font-size:11px; background-color:#FFFFAE;"></textarea>
	  </td>
 </tr>
<?php $SnoB++;} $FormBRow=$SnoB-1; ?><input type="hidden" id="SnoB" name="SnoB" value="<?php echo $SnoB; ?>" />
                                     <input type="hidden" name="FormBRow" id="FormBRow" value="<?php echo $FormBRow; ?>" /><?php } ?>
 <tr>
  <?php /*?><td colspan="6" style="font-family:Times New Roman;font-size:14px;font-weight:bold;" align="right">Total:&nbsp;</td><?php */?>
  <td><?php $sqlB=mysql_query("select EmpFormBScore,Mid_EmpFormBScore from hrm_employee_pms where EmpPmsId=".$resPmsId['EmpPmsId'], $con); $resB=mysql_fetch_assoc($sqlB); ?><input type="hidden" class="input" style="text-align:center;width:60px;font-weight:bold;" id="EmpFormBScore<?php echo $SnoB; ?>" name="EmpFinalFormBScore" value="<?php if($resKey['AppraisalForm']=='Y'){ echo $resB['EmpFormBScore'];}elseif($resKey['MidPmsForm']=='Y'){echo $resB['Mid_EmpFormBScore']; } ?>" readonly/>
  </td>
 </tr>									 
									 
									 

<tr><td colspan="9">
    <table><tr>
    <td colspan="9" align="left" style="width:100px;">
    <?php if($resYNB['Emp_SkillSave']=='N' AND $resYNB['Appraiser_PmsStatus']==0) { ?>
    <input type="Submit" name="SubmitFormB" id="SubmitFormB" class="sbutton" style="width:145px;" value="save as draft"/>
    <input type="button" id="FormBN" style="width:90px;display:none;" class="sbutton" value="edit" onClick="editFormBN()"/>
	<?php } ?>
	<?php if($resYNB['Emp_SkillSave']=='Y' AND $resYNB['Emp_PmsStatus']==1) { ?> 
    <input type="Submit" name="SubmitResetFormB" id="SubmitResetFormB" class="sbutton" style="width:150px;display:none;" value="save as draft"/>
    <input type="button" id="FormBY" style="width:90px;" class="sbutton" value="edit" onClick="editFormBY()"/>
	<?php } ?>
 </td>
 <td><?php $sqlY=mysql_query("select Emp_AchivementSave,Emp_KRASave,Emp_SkillSave,Emp_FeedBackSave,Emp_PmsStatus,Appraiser_PmsStatus from hrm_employee_pms where EmpPmsId=".$resPmsId['EmpPmsId'], $con); $resY=mysql_fetch_assoc($sqlY); ?> 
	
	<?php if($resKey['AppraisalForm']=='Y'){ if($resY['Emp_AchivementSave']=='Y' AND $resY['Emp_KRASave']=='Y' AND $resY['Emp_SkillSave']=='Y' AND $resY['Emp_FeedBackSave']=='Y' AND $resY['Emp_PmsStatus']==1 AND ($resY['Appraiser_PmsStatus']==0 OR $resY['Appraiser_PmsStatus']==3)) { ?><input type="button" class="sbutton" name="FinalAppSubmit" id="FinalAppSubmit_4" value="final submit" style="width:100px;" onClick="FinalSubmit()"/><?php } ?>
	
    <?php }elseif($resKey['MidPmsForm']=='Y'){ if($resY['Emp_KRASave']=='Y' AND $resY['Emp_SkillSave']=='Y' AND $resY['Emp_PmsStatus']==1 AND ($resY['Appraiser_PmsStatus']==0 OR $resY['Appraiser_PmsStatus']==3)) { ?><input type="button" name="FinalAppSubmit" id="FinalAppSubmit_4" value="final submit" style="width:100px;" class="sbutton" onClick="FinalSubmit()"/><?php } } ?>
 
 </td>
 </tr></table></td>
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
<?php //******************************************** Close ************************** ?>					
				  </table>
				 </td>
			  </tr>
			  <tr>
			     <td colspan="2" align="" class="fontButton" width="400">&nbsp;
				 
				 </td>         
		      </tr>
			</table>
           </td>
			  </tr>
	        </table>
<?php //********************************************************************************************* ?>
		   </td>
		  </tr>
		</table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php //require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>



