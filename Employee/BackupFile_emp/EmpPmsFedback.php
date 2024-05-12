<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}else{header('Location:../index.php');}
/******************************************************************************/
//include("SetKraPmsy.php");

if(isset($_POST['SubmitFeedBack']))
{   $n=$_POST['FeedBackRow'];  
    for($i=1; $i<=$n; $i++)
    { $search =  '*"#$~/\':' ; $search = str_split($search);
      $ReplyAns=str_replace($search, "", $_POST['EnvReplyF'.$i]);
      $sqlIns=mysql_query("insert into hrm_employee_pms_workenvironment(EmpPmsId,WorkEnvironment,Answer) values(".$_SESSION['ePmsId'].",'".$_POST['Environment'.$i]."','".addslashes($ReplyAns)."')", $con); }
    if($sqlIns)
     {
	  $sqlUp=mysql_query("update hrm_employee_pms set Emp_FeedBackSave='Y', Emp_PmsStatus=1, HR_CurrDesigId=".$_POST['DesigId'].", HR_CurrGradeId=".$_POST['GradeId']." where EmpPmsId=".$_SESSION['ePmsId'], $con);
	  $msg="Data saved successfully!";
	 }
}
if(isset($_POST['ResetSubmitFeedBack']))
{   $sqlDel=mysql_query("delete from hrm_employee_pms_workenvironment where EmpPmsId=".$_SESSION['ePmsId'], $con);
    $n=$_POST['ResetFBRow'];  
    for($i=1; $i<=$n; $i++)
    { $search =  '*"#$~/\':' ; $search = str_split($search);
      $ReplyAns=str_replace($search, "", $_POST['EnvReplyF'.$i]);
      $sqlIns=mysql_query("insert into hrm_employee_pms_workenvironment(EmpPmsId,WorkEnvironment,Answer) values(".$_SESSION['ePmsId'].", '".$_POST['Environment'.$i]."', '".addslashes($ReplyAns)."')", $con); }
   if($sqlIns)
     {
	  $sqlUp=mysql_query("update hrm_employee_pms set Emp_FeedBackSave='Y', Emp_PmsStatus=1, HR_CurrDesigId=".$_POST['DesigId'].", HR_CurrGradeId=".$_POST['GradeId']." where EmpPmsId=".$_SESSION['ePmsId'], $con);
	  $msg="Data saved successfully!";
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
<link type="text/css" href="css/mycss.css" rel="stylesheet"/>
<script type="text/javascript" language="javascript">
function ValidationFeedback(FeedBackForm)
{ 
  var FeedBackRow=document.getElementById("FeedBackRow").value; 
  for(var i=1; i<=FeedBackRow; i++)
   { 
	 if(document.getElementById("EnvReplyF"+i).value=="")
	 {alert("please enter feedback Answer");  return false; }
	 //var filter=/^[a-zA-Z., ]+$/;  var test_bool = filter.test(document.getElementById("EnvReplyF"+i).value)
     //if(test_bool==false) { alert('Please Enter Only Alphabets in the Feedback Answer Field');  return false; } 
   }
  var agree=confirm("Are you sure you want to save this feedback form?");
  if (agree) { return true;} else {return false;}
}

function editNFeedBack()
{ document.getElementById("SubmitFeedBack").style.display='block'; document.getElementById("NFeedBack").style.display='none';
  var FeedBackRowY=document.getElementById("FeedBackRow").value; 
  for(var i=1; i<=FeedBackRowY; i++) {document.getElementById("Environment"+i).readOnly=false;document.getElementById("EnvReplyF"+i).readOnly=false;}
}

function editYFeedBack()
{ document.getElementById("ResetSubmitFeedBack").style.display='block'; document.getElementById("YFeedBack").style.display='none'; 
  var ResetFBRowY=document.getElementById("ResetFBRow").value; 
  for(var i=1; i<=ResetFBRowY; i++) {document.getElementById("Environment"+i).readOnly=false;document.getElementById("EnvReplyF"+i).readOnly=false;}
}

function FinalSubmit() { var agree=confirm("Are you sure you want to submit appraisal form.?");
if (agree) { var x = "EmpPmsFedback.php?action=submit&ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&fr=0&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=0&org=1";  window.location=x;}}			 

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
<input type="hidden" name="KraYId" id="KraYId" value="<?php echo $_SESSION['KraYId']; ?>" /> 
<input type="hidden" name="PmsYId" id="PmsYId" value="<?php echo $_SESSION['PmsYId']; ?>" />
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
<?php /***************** Feedback **************************/ ?>
<?php /***************** Feedback **************************/ ?>

<form name="FeedBackForm" method="post" onSubmit="return ValidationFeedback(this)">   
<input type="hidden" name="GradeId" value="<?php echo $_SESSION['Grade']; ?>" />
<input type="hidden" name="DesigId" value="<?php echo $_SESSION['Desig']; ?>" /> 
<td id="FeedBack" style="display:block;">
<table border="0">
 <tr>
  <td colspan="9" align="center" class="fhead" style="color:#000084;width:100%;" valign="middle">Work Environment</td></tr>
<?php if($resY['Emp_FeedBackSave']=='Y'){ $sqlFY=mysql_query("select * from hrm_employee_pms_workenvironment where EmpPmsId=".$_SESSION['ePmsId']." order by EmpWorkEnvId ASC", $con); $SnoFY=1; while($resFY=mysql_fetch_array($sqlFY)){ ?>
 <tr>   
  <td align="left" class="font" style="width:100%;">
   <table border="0">
	<tr>
	 <td class="tdc" style="width:15px;font-weight:bold;" valign="top"><?php echo $SnoFY; ?>&nbsp;:&nbsp;</td>
	 <td class="tdl" style="width:1050px;font-size:16px;" valign="top"><?php echo $resFY['WorkEnvironment']; ?></td>
	 <input type="hidden" name="Environment<?php echo $SnoFY; ?>" id="Environment<?php echo $SnoFY; ?>" value="<?php echo $resFY['WorkEnvironment']; ?>"/>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td colspan="2" class="font1" align="left" style="width:100%; height:20px;" valign="top">
	  <input name="EnvReplyF<?php echo $SnoFY; ?>" id="EnvReplyF<?php echo $SnoFY; ?>" class="Input" readonly style="width:1050px;" maxlength="400" value="<?php echo $resFY['Answer']; ?>" <?php  if($resY['Emp_FeedBackSave']=='Y' AND $resY['Emp_PmsStatus']==2) { echo 'readonly'; } ?>/></td>
	</tr>
   </table>
  </td>
 </tr>	  
<?php $SnoFY++; } $ResetFeedBackRow=$SnoFY-1; ?><input type="hidden" name="ResetFBRow" id="ResetFBRow" value="<?php echo $ResetFeedBackRow; ?>" /> 
<?php } if($resY['Emp_FeedBackSave']=='N'){ $sqlF=mysql_query("select * from hrm_pms_workenvironment where WorkEnStatus='A' AND companyid=".$CompanyId); $SnoF=1; while($resF=mysql_fetch_array($sqlF)) {?> 
 <tr>   
  <td align="left" class="font" style="width:100%;">
  <table border="0">
   <tr>
	<td class="tdc" style="width:15px;font-weight:bold;font-size:16px;" valign="top"><?php echo $SnoF; ?>&nbsp;:&nbsp;</td>
	<td class="tdl" style="width:1050px;font-size:16px;" valign="top"><?php echo $resF['Environment']; ?></td>
	<input type="hidden" name="Environment<?php echo $SnoF; ?>" id="Environment<?php echo $SnoF; ?>" value="<?php echo $resF['Environment']; ?>"/>
   </tr>
   <tr bgcolor="#FFFFFF">
	<td colspan="2" class="font" align="left" style="width:100%;" valign="top"><input name="EnvReplyF<?php echo $SnoF; ?>" id="EnvReplyF<?php echo $SnoF; ?>" class="Input" style="width:100%;" maxlength="400" value=""/></td>
   </tr>
  </table>
  </td>
 </tr>
<?php $SnoF++;} $FeedBackRow=$SnoF-1; ?>
  <tr>   
   <td align="left" class="font" style="width:100%;">
   <table border="0">
	<tr>
	 <td class="tdc" style="width:15px;font-weight:bold;font-size:16px;" valign="top"><?php echo $SnoF; ?>&nbsp;:&nbsp;</td>
	 <td class="tdl" style="width:1050px;font-size:16px;" valign="top">Any other feedback !</td>
	 <input type="hidden" name="Environment<?php echo $SnoF; ?>" id="Environment<?php echo $SnoF; ?>" value="Any other feedback !"/>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td colspan="2" class="font" align="left" style="width:100%;" valign="top"><input name="EnvReplyF<?php echo $SnoF; ?>" id="EnvReplyF<?php echo $SnoF; ?>" class="Input" style="width:100%;" maxlength="400" value="."/></td>
	</tr>
   </table>
  </td>
 </tr>
 <input type="hidden" name="FeedBackRow" id="FeedBackRow" value="<?php echo $SnoF; ?>" /><?php } ?>
 <tr>
  <td colspan="9" align="left">
    <table>
	 <tr>
	  <td style="width:100px;">
      <?php if($resY['Emp_FeedBackSave']=='N' AND $resY['Appraiser_PmsStatus']==0){ ?>
<input type="Submit" name="SubmitFeedBack" id="SubmitFeedBack" class="sbutton" style="width:145px;" value="save as draft"/>
<input type="button" id="NFeedBack" style="width:90px;display:none;" class="sbutton" value="edit" onClick="editNFeedBack()"/>
	  <?php } if($resY['Emp_FeedBackSave']=='Y' AND $resY['Emp_PmsStatus']==1) { ?> 
<input type="Submit" name="ResetSubmitFeedBack" id="ResetSubmitFeedBack" class="sbutton" style="width:150px;display:none;" value="save as draft"/><input type="button" id="YFeedBack" style="width:90px;" class="sbutton" value="edit" onClick="editYFeedBack()"/>
	  <?php } ?>
      </td>
      <td><?php if($resY['Emp_AchivementSave']=='Y' AND $resY['Emp_KRASave']=='Y' AND $resY['Emp_SkillSave']=='Y' AND $resY['Emp_FeedBackSave']=='Y' AND $resY['Emp_PmsStatus']==1 AND ($resY['Appraiser_PmsStatus']==0 OR $resY['Appraiser_PmsStatus']==3)){?><input type="button" name="FinalAppSubmit" class="sbutton" id="FinalAppSubmit_4" value="final submit" style="width:100px;" onClick="FinalSubmit()"/><?php } ?></td>
     </tr>
	</table>
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
<?php //******************************** Close ******************************************* ?>					
				  </table>
				 </td>
			  </tr>
			</table>
           </td>
			  </tr>
	        </table>
<?php //***************************************************************************************************** ?>
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