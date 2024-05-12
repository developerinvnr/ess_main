<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}else{header('Location:../index.php');}
//**********************************************/
//include("SetKraPmsy.php");

if(isset($_POST['SubmitAchieve']))
{   $search =  '*"#$%@~/\':' ; $search = str_split($search);
    $n=$_POST['Sno'];  for($i=1; $i<=$n; $i++)
    { if($_POST['Achive_'.$i]!="")
      { $Achive=str_replace($search, "", $_POST['Achive_'.$i]);
        $sqlIns=mysql_query("insert into hrm_employee_pms_achivement(EmpPmsId,Achivement) values(".$_SESSION['ePmsId'].", '".addslashes($Achive)."')", $con); }
  } if($sqlIns)
    {
    $sqlUp=mysql_query("update hrm_employee_pms set Emp_AchivementSave='Y', Emp_PmsStatus=1 where EmpPmsId=".$_SESSION['ePmsId'], $con);
    $msg="Date saved successfully!";
	}
}
if(isset($_POST['ResetSubmitAchieve']))
{   $search =  '*"#$%@~/\':' ; $search = str_split($search);
    $sqlDel=mysql_query("delete from hrm_employee_pms_achivement where EmpPmsId=".$_SESSION['ePmsId'], $con);
    $n=$_POST['NoRow']; $snY=$_POST['SnoY']; for($i=1; $i<=$n; $i++)
    { if($_POST['Achive_'.$i]!="")
      { $Achive=str_replace($search, "", $_POST['Achive_'.$i]);
        $sqlIns=mysql_query("insert into hrm_employee_pms_achivement(EmpPmsId,Achivement) values(".$_SESSION['ePmsId'].", '".addslashes($Achive)."')", $con); }
    } 
	for($j=$n+1; $j<=$snY; $j++)
    { if($_POST['AchiveY_'.$j]!="")
      { $AchiveA=str_replace($search, "", $_POST['AchiveY_'.$j]);
        $sqlIns=mysql_query("insert into hrm_employee_pms_achivement(EmpPmsId,Achivement) values(".$_SESSION['ePmsId'].", '".addslashes($AchiveA)."')", $con); }	
	}
  
   if($sqlIns)
    {
    $sqlUp=mysql_query("update hrm_employee_pms set Emp_AchivementSave='Y', Emp_PmsStatus=1 where EmpPmsId=".$_SESSION['ePmsId'], $con);
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

for(var j=6; j<10; j++) 
{ function ShowRow(j) 
  {
  var u = j+1;  var u1 = j-1; //var a = j+2; c=a-1; alert("a="+a+"j="+c);
  if(j<=9) {document.getElementById('minusImg_'+j).style.display = 'block'; document.getElementById('addImg_'+j).style.display = 'none';
   document.getElementById('Row_'+j).style.display = 'block'; document.getElementById('addImg_'+u).style.display = 'block';
   document.getElementById('minusImg_'+u1).style.display = 'none';} 
  else { document.getElementById('minusImg_'+j).style.display = 'block'; document.getElementById('addImg_'+j).style.display = 'none';
    document.getElementById('Row_'+j).style.display = 'block';  document.getElementById('minusImg_'+u1).style.display = 'none';  } 
  }
  function HideRow(j)
  { 
  var u = j+1;  var u1 = j-1; 
  if(j<=9)
  {document.getElementById('minusImg_'+j).style.display = 'none'; document.getElementById('addImg_'+j).style.display = 'block';
   document.getElementById('Row_'+j).style.display = 'none'; document.getElementById('addImg_'+u).style.display = 'none';
   document.getElementById('minusImg_'+u1).style.display = 'block'; }
  else { document.getElementById('minusImg_'+j).style.display = 'none'; document.getElementById('addImg_'+j).style.display = 'block';
    document.getElementById('Row_'+j).style.display = 'none';  document.getElementById('minusImg_'+u1).style.display = 'block'; }  
  } 
}	
	
function ValidationAchive(AppraisalForm)
{
  //var row=document.getElementById("Sno").value
  var Achive_1 = AppraisalForm.Achive_1.value; 
  if (Achive_1.length === 0) { alert("please write minimum one achievement.");  return false; }
  if (Achive_1.length<15) { alert("please write minimum 15 character in first achievement.");  return false; } 
  var agree=confirm("Are you sure you want to save this achievement?");
  if (agree) { return true;} else {return false;}
}

/*
function EditArchN()
{ document.getElementById("SubmitAchieve").style.display='block'; document.getElementById("editArchiveN").style.display='none'; 
  for(var i=1; i<=10; i++) {document.getElementById("Achive_"+i).readOnly=false;} }
*/

function EditArchY()
{ document.getElementById("ResetSubmitAchieve").style.display='block'; document.getElementById("editArchiveY").style.display='none';
  var NoRowY=parseFloat(document.getElementById("NoRow").value); var SnoY=document.getElementById("SnoY").value;
  for(var i=1; i<=NoRowY; i++) {document.getElementById("Achive_"+i).readOnly=false;} 
  for(var j=NoRowY+1; j<=SnoY; j++) { document.getElementById("AchiveY_"+j).readOnly=false;}
  
}

function FinalSubmit() { var agree=confirm("Are you sure you want to submit appraisal form.?");
if (agree) { var x = "EmpPmsAppForm.php?action=submit&ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&fr=0&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=0&fa=1&fb=1&ffeedb=1&org=1";  window.location=x;}}	


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
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
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
<tr>
<?php /***************** Achivement **************************/ ?>
<form name="AppraisalForm" method="post" onSubmit="return ValidationAchive(this)">   
 <td id="Achivement" style="width:100%;">
 <table border="0" style="width:100%;">
 <tr><td colspan="6" align="center" class="fhead" style="color:#000084;width:100%;" valign="middle">
 <?php $to=$fromdate-1; if($CompanyId==1){ $ListY=$fromdate; }else{ $ListY=$to.'-'.$fromdate; } ?>
	  List down your Significant Contribution(Achievement) for Assessment Year&nbsp;- <?php echo $ListY; ?></td></tr>
	  
<?php if($resY['Emp_AchivementSave']=='Y')
      { 
	   $sqlC=mysql_query("select AchivementId,Achivement from hrm_employee_pms_achivement where EmpPmsId=".$_SESSION['ePmsId']." order by AchivementId ASC",$con); $rows=mysql_num_rows($sqlC); $No=1; while($resC=mysql_fetch_array($sqlC)) { ?>	  
 <tr>
  <td style="width:2%;">&nbsp;</td>
  <td class="tdc" style="width:2%;"><b><?php echo $No; ?></b>&nbsp;:&nbsp;</td>
  <td class="tdc" style="width:95%;"><input name="Achive_<?php echo $No;?>" id="Achive_<?php echo $No;?>" class="tdinputl" maxlength="500" style="height:23px;" readonly value="<?php echo $resC['Achivement'];  ?>" /></td>
 </tr>
 <?php $No++; } $NoRow=$No-1; echo '<input type="hidden" name="NoRow" id="NoRow" value="'.$NoRow.'" />'; ?>

<?php if($resY['Emp_PmsStatus']==1){ for($i=$No; $i<=10; $i++){ ?> 
 <tr>
  <td id="AppImg_<?php echo $i; ?>" class="tdc" style="width:2%;"><img src="images/Addnew.png" <?php if($i>$No) { echo 'style="display:none;"';} ?> border="0" id="addImg_<?php echo $i; ?>" onClick="ShowRow(<?php echo $i; ?>)"/>
<img src="images/Minusnew.png" id="minusImg_<?php echo $i; ?>" <?php if($i>=$No){ echo 'style="display:none;"'; } ?> border="0" onClick="HideRow(<?php echo $i; ?>)"/></td>
  <td colspan="2" style="width:98%;">
   <table style="display:none;" cellspacing="0" id="Row_<?php echo $i; ?>">
    <tr>
	 <td class="tdc" style="width:2%;"><b><?php echo $i;?></b>&nbsp;:&nbsp;&nbsp;&nbsp;</td>
     <td class="tdc" style="width:95%;"><input name="AchiveY_<?php echo $i; ?>" id="AchiveY_<?php echo $i; ?>" class="tdinputl" maxlength="500" style="height:23px;" readonly/></td>
    </tr>
   </table>
  </td>
 </tr>	  	 	 
<?php } $snoY=$i-1; echo '<input type="hidden" name="SnoY" id="SnoY" value="'.$snoY.'" />'; } ?>

<?php } if($resY['Emp_AchivementSave']=='N' AND $resY['Appraiser_PmsStatus']==0){ ?>	 	  
 <tr>
  <td style="width:2%;" rowspan="5"></td>
  <td class="tdc" style="width:2%;"><b>1</b>&nbsp;:&nbsp;</td>
  <td class="tdc" style="width:95%;"><input name="Achive_1" id="Achive_1" class="tdinputl" maxlength="500" style="height:23px;"/></td></tr>
 <tr>
  <td class="tdc"><b>2</b>&nbsp;:&nbsp;</td>
  <td class="tdc"><input name="Achive_2" id="Achive_2" class="tdinputl" maxlength="500" style="height:23px;"/></td>
 </tr>
 <tr>
  <td class="tdc"><b>3</b>&nbsp;:&nbsp;</td>
  <td class="tdc"><input name="Achive_3" id="Achive_3" class="tdinputl" maxlength="500" style="height:23px;"/></td>
 </tr>	 
 <tr>
  <td class="tdc"><b>4</b>&nbsp;:&nbsp;</td>
  <td class="tdc"><input name="Achive_4" id="Achive_4" class="tdinputl" maxlength="500" style="height:23px;"/></td>
 </tr>	
 <tr>
  <td class="tdc"><b>5</b>&nbsp;:&nbsp;</td>
  <td class="tdc"><input name="Achive_5" id="Achive_5" class="tdinputl" maxlength="500" style="height:23px;"/></td>
 </tr>
<?php for($i=6; $i<=10; $i++){ ?> 
 <tr>
  <td id="AppImg_<?php echo $i; ?>" class="tdc" style="width:2%;"><img src="images/Addnew.png" <?php if($i>6) { echo 'style="display:none;"';} ?> border="0" id="addImg_<?php echo $i; ?>" onClick="ShowRow(<?php echo $i; ?>)"/><img src="images/Minusnew.png" id="minusImg_<?php echo $i; ?>" <?php if($i>=6){ echo 'style="display:none;"'; } ?> border="0" onClick="HideRow(<?php echo $i; ?>)"/></td>
  <td colspan="2" class="tdc" style="width:98%;">
   <table style="display:none;" id="Row_<?php echo $i; ?>" cellpadding="0" cellspacing="0">
    <tr>
	 <td class="tdc" style="width:2%;">&nbsp;<b><?php echo $i;?></b>&nbsp;:&nbsp;&nbsp;&nbsp;</td>
     <td class="tdc" style="width:95%;"><input name="Achive_<?php echo $i;?>" id="Achive_<?php echo $i;?>" class="tdinputl" maxlength="500" style="height:23px;"/></td>
    </tr>
   </table>
  </td>
 </tr>			  	 	 
<?php } $sno=$i-1; echo '<input type="hidden" name="Sno" id="Sno" value="'.$sno.'" />'; ?>
<?php } ?>
 <tr>
  <td colspan="6" style="width:150px;">
  <table>
   <tr>
    <td>
	<?php if($resY['Emp_AchivementSave']=='N' AND $resY['Appraiser_PmsStatus']==0){ ?>
<input type="Submit" name="SubmitAchieve" id="SubmitAchieve" style="width:145px;" class="sbutton" value="save as draft"/>
<input type="button" id="editArchiveN" style="width:90px; display:none;" class="sbutton" value="edit" onClick="EditArchN()"/>
	<?php } if($resY['Emp_AchivementSave']=='Y' AND $resY['Emp_PmsStatus']==1){ ?> 
<input type="Submit" name="ResetSubmitAchieve" id="ResetSubmitAchieve" class="sbutton" style="width:145px;display:none;" value="save as draft"/><input type="button" id="editArchiveY" style="width:90px;" class="sbutton" value="edit" onClick="EditArchY()"/><?php } ?>
    </td>
	<td><?php if($resY['Emp_AchivementSave']=='Y' AND $resY['Emp_KRASave']=='Y' AND $resY['Emp_SkillSave']=='Y' AND $resY['Emp_FeedBackSave']=='Y' AND $resY['Emp_PmsStatus']==1 AND ($resY['Appraiser_PmsStatus']==0 OR $resY['Appraiser_PmsStatus']==3)) {?><input type="button" name="FinalAppSubmit" id="FinalAppSubmit_4" class="sbutton" value="final submit" style="width:100px;" onClick="FinalSubmit()"/><?php } ?>
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
<?php //******************************************* Close ********************** ?>					
				  </table>
				 </td>
			  </tr>
			</table>
           </td>
			  </tr>
	        </table>
			
<?php //*********************************************************************************** ?>
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

