<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************
$_SESSION['EmpID']=$_REQUEST['ID'];
$EMPID=$_SESSION['EmpID'];
//**********************************
if(isset($_POST['AddFamilyE']))
{  
$SqlInsFamily = mysql_query("UPDATE hrm_employee_family SET Fa_SN='".$_POST['Fa_SN']."', FatherName='".$_POST['FatherName']."', FatherDOB='".date("Y-m-d",strtotime($_POST['FatherDob']))."', FatherOccupation='".$_POST['FatherOccu']."', FatherQuali='".$_POST['FatherQuali']."', Mo_SN='".$_POST['Mo_SN']."', MotherName='".$_POST['MotherName']."', MotherDOB='".date("Y-m-d",strtotime($_POST['MotherDob']))."', MotherOccupation='".$_POST['MotherOccu']."', MotherQuali='".$_POST['MotherQuali']."', HW_SN='".$_POST['HW_SN']."', HusWifeName='".$_POST['HusWifeName']."', HusWifeDOB='".date("Y-m-d",strtotime($_POST['HusWifeDob']))."', HusWifeOccupation='".$_POST['HusWifeOccu']."', HusWifeQuali='".$_POST['HusWifeQuali']."', CreatedBy=".$UserId.", CreatedDate='".date('Y-m-d')."', YearId=".$YearId."  WHERE EmployeeId=".$EMPID, $con);

    $sql=mysql_query("select * from hrm_employee_family2 where EmployeeID=".$EMPID, $con); $res=mysql_num_rows($sql);
    //if($res>0) { $sqlDelete=mysql_query("DELETE FROM hrm_employee_family2 WHERE EmployeeID=".$EMPID, $con);}

 if($_POST['RowCountFamily']!=0)  { 
	      for($i=1; $i<=$_POST['RowCountFamily']; $i++)
		  { 
		  $SqlUp = mysql_query("UPDATE hrm_employee_family2 SET FamilyRelation='".$_POST['Any_Relation'.$i]."', Fa2_SN='".$_POST['Fa_2_SN'.$i]."', FamilyName='".$_POST['Any_RelationName'.$i]."', FamilyDOB='".date("Y-m-d",strtotime($_POST['Any_RelationDob'.$i]))."', FamilyQualification='".$_POST['Any_Relation'.$i.'Quali']."', FamilyOccupation='".$_POST['Any_Relation'.$i.'Occu']."', CreatedBy=".$UserId.", CreatedDate='".date('Y-m-d')."', YearId=".$YearId." where Family2Id=".$_POST['F2Id_'.$i]."", $con); 
		   } }

for($j=1; $j<20; $j++)
  {	 
   if($_POST['AnyRelation'.$j]=='CHILD' OR $_POST['AnyRelation'.$j]=='BROTHER' OR $_POST['AnyRelation'.$j]=='SISTER' OR $_POST['AnyRelation'.$j]=='DAUGHTER' OR $_POST['AnyRelation'.$j]=='SON')
  { $SqlInsFamily2 = mysql_query("INSERT INTO hrm_employee_family2(EmployeeID, FamilyRelation, Fa2_SN, FamilyName, FamilyDOB, FamilyQualification, FamilyOccupation, CreatedBy, CreatedDate, YearId) VALUES (".$EMPID.", '".$_POST['AnyRelation'.$j]."', '".$_POST['Fa2_SN'.$j]."', '".$_POST['AnyRelationName'.$j]."', '".date("Y-m-d",strtotime($_POST['AnyRelationDob'.$j]))."', '".$_POST['AnyRelation'.$j.'Quali']."', '".$_POST['AnyRelation'.$j.'Occu']."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")", $con);
  } } $j++;
  if($SqlInsFamily) {$msg = "data has been Inserted successfully..."; }
}

if(isset($_POST['EditFamilyE']))
{  
$SqlInsFamily = mysql_query("UPDATE hrm_employee_family SET Fa_SN='".$_POST['Fa_SN']."', FatherName='".$_POST['FatherName']."', FatherDOB='".date("Y-m-d",strtotime($_POST['FatherDob']))."', FatherOccupation='".$_POST['FatherOccu']."', FatherQuali='".$_POST['FatherQuali']."', Mo_SN='".$_POST['Mo_SN']."', MotherName='".$_POST['MotherName']."', MotherDOB='".date("Y-m-d",strtotime($_POST['MotherDob']))."', MotherOccupation='".$_POST['MotherOccu']."', MotherQuali='".$_POST['MotherQuali']."', HW_SN='".$_POST['HW_SN']."', HusWifeName='".$_POST['HusWifeName']."', HusWifeDOB='".date("Y-m-d",strtotime($_POST['HusWifeDob']))."', HusWifeOccupation='".$_POST['HusWifeOccu']."', HusWifeQuali='".$_POST['HusWifeQuali']."', CreatedBy=".$UserId.", CreatedDate='".date('Y-m-d')."', YearId=".$YearId."  WHERE EmployeeId=".$EMPID, $con);

    $sql=mysql_query("select * from hrm_employee_family2 where EmployeeID=".$EMPID, $con); $res=mysql_num_rows($sql);
    //if($res>0) { $sqlDelete=mysql_query("DELETE FROM hrm_employee_family2 WHERE EmployeeID=".$EMPID, $con);}

 if($_POST['RowCountFamily']!=0)  { 
	      for($i=1; $i<=$_POST['RowCountFamily']; $i++)
		  { 
		   $SqlUp = mysql_query("UPDATE hrm_employee_family2 SET FamilyRelation='".$_POST['Any_Relation'.$i]."', Fa2_SN='".$_POST['Fa_2_SN'.$i]."', FamilyName='".$_POST['Any_RelationName'.$i]."', FamilyDOB='".date("Y-m-d",strtotime($_POST['Any_RelationDob'.$i]))."', FamilyQualification='".$_POST['Any_Relation'.$i.'Quali']."', FamilyOccupation='".$_POST['Any_Relation'.$i.'Occu']."', CreatedBy=".$UserId.", CreatedDate='".date('Y-m-d')."', YearId=".$YearId." where Family2Id=".$_POST['F2Id_'.$i]."", $con); 
		   } }

for($j=1; $j<20; $j++)
  {	 
   if($_POST['AnyRelation'.$j]=='CHILD' OR $_POST['AnyRelation'.$j]=='BROTHER' OR $_POST['AnyRelation'.$j]=='SISTER' OR $_POST['AnyRelation'.$j]=='DAUGHTER' OR $_POST['AnyRelation'.$j]=='SON')
  {   $SqlInsFamily2 = mysql_query("INSERT INTO hrm_employee_family2(EmployeeID, FamilyRelation, Fa2_SN, FamilyName, FamilyDOB, FamilyQualification, FamilyOccupation, CreatedBy, CreatedDate, YearId) VALUES (".$EMPID.", '".$_POST['AnyRelation'.$j]."', '".$_POST['Fa2_SN'.$j]."', '".$_POST['AnyRelationName'.$j]."', '".date("Y-m-d",strtotime($_POST['AnyRelationDob'.$j]))."', '".$_POST['AnyRelation'.$j.'Quali']."', '".$_POST['AnyRelation'.$j.'Occu']."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")", $con);
  } } $j++;
  if($SqlInsFamily) {$msg = "data has been Updeted successfully..."; }
}

if($_REQUEST['Action']=='Delete' AND $_REQUEST['Action']!='')
{ $Delete=mysql_query("DELETE FROM hrm_employee_family2 WHERE Family2Id=".$_REQUEST['Value'], $con);
  if($Delete){ $msg = "data has been deleted successfully..."; }
}

?> 
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/EmpMasterAddNewAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script language="javascript">
function EditFamily()
{document.getElementById("EditFamilyE").style.display = 'block'; document.getElementById("ChangeFamily").style.display = 'none';
  
 document.getElementById("FatherName").readOnly = false;  document.getElementById("FatherDob").readOnly = false; document.getElementById("FatherDobBtn").disabled = false; document.getElementById("FatherQuali").readOnly = false; document.getElementById("FatherOccu").readOnly = false; document.getElementById("MotherName").readOnly = false; document.getElementById("MotherDob").readOnly = false; document.getElementById("MotherDobBtn").disabled = false; document.getElementById("MotherQuali").readOnly = false; document.getElementById("MotherOccu").readOnly = false; document.getElementById("HusWifeName").readOnly = false; document.getElementById("HusWifeDob").readOnly = false; document.getElementById("HusWifeQuali").readOnly = false; document.getElementById("HusWifeOccu").readOnly = false; for(var j=1; j<20; j++){  document.getElementById("AnyRelation"+j).disabled = false; document.getElementById("AnyRelationName"+j).readOnly = false; document.getElementById("RelationDobBtn"+j).disabled = false; document.getElementById("AnyRelation"+j+"Quali").readOnly = false; document.getElementById("AnyRelation"+j+"Occu").readOnly = false; document.getElementById("FatherDob").readOnly = false; document.getElementById("MotherDob").readOnly = false; document.getElementById("HusWifeDob").readOnly = false; document.getElementById("AnyRelationDob"+j).readOnly = false;
 }
 
  var NumFamily = document.getElementById("RowCountFamily").value;
 if(NumFamily!=0)
  { for (i=1; i<=NumFamily; i++)
    {document.getElementById("Any_Relation"+i).disabled = false; document.getElementById("Any_RelationName"+i).readOnly = false; 
	 document.getElementById("Any_RelationDob"+i).readOnly = false; document.getElementById("Relation_DobBtn"+i).disabled = false;	 
	 document.getElementById("Any_Relation"+i+"Quali").readOnly = false; document.getElementById("Any_Relation"+i+"Occu").readOnly = false; } 
  } 
  
}

function RefFamily()
{ document.getElementById("FatherName").value=''; document.getElementById("FatherDob").value=''; document.getElementById("FatherQuali").value=''; document.getElementById("FatherOccu").value=''; document.getElementById("MotherName").value=''; document.getElementById("MotherDob").value=''; document.getElementById("MotherQuali").value=''; document.getElementById("MotherOccu").value=''; 

for( var i=1; i<20; i++)  {	document.getElementById("AnyRelation"+i).value=''; document.getElementById("AnyRelationName"+i).value=''; document.getElementById("AnyRelationDob"+i).value=''; document.getElementById("AnyRelation"+i+"Quali").value=''; document.getElementById("AnyRelation"+i+"Occu").value=''; }

for( var i=19; i<20; i--) { document.getElementById("FRow_"+i).style.display='none'; document.getElementById("FminusImg_"+i).style.display='none'; document.getElementById("FaddImg_"+i).style.display='none';  if(i==1){document.getElementById("FRow_"+i).style.display='none'; document.getElementById("FminusImg_"+i).style.display='none'; document.getElementById("FaddImg_"+i).style.display='block';}}

document.getElementById("HusWifeName").value=''; document.getElementById("HusWifeDob").value=''; document.getElementById("HusWifeQuali").value=''; document.getElementById("HusWifeOccu").value='';
}

for(var j=1; j<20; j++) 
{
function FamilyShowRow(j)
 { 
 var u = j+1;  var u1 = j-1; //var a = j+2; c=a-1; alert("a="+a+"j="+c);
  if(j<=18)
  {   
      
    
      
      
    if(document.getElementById("Fa_SN").value!='Late' && (document.getElementById("FatherName").value=='' || document.getElementById("FatherDob").value=='' || document.getElementById("FatherQuali").value=='' || document.getElementById("FatherOccu").value=='')) { alert("please first enter previous row!"); }
    else if(document.getElementById("Mo_SN").value!='Late' && (document.getElementById("MotherName").value=='' || document.getElementById("MotherDob").value=='' || document.getElementById("MotherQuali").value=='' || document.getElementById("MotherOccu").value=='')) { alert("please first enter previous row!"); }
    else if(document.getElementById("AnyRelation"+u1).value==0 || document.getElementById("AnyRelationName"+u1).value=='' || document.getElementById("AnyRelationDob"+u1).value=='' || document.getElementById("AnyRelation"+u1+"Quali").value=='' || document.getElementById("AnyRelation"+u1+"Occu").value==''){ alert("please first enter previous row!");  }
    else { document.getElementById('FminusImg_'+j).style.display = 'block'; document.getElementById('FaddImg_'+j).style.display = 'none';
   document.getElementById('FRow_'+j).style.display = 'block'; document.getElementById('FaddImg_'+u).style.display = 'block';
   document.getElementById('FminusImg_'+u1).style.display = 'none';} 
  }
  else 
  { document.getElementById('FminusImg_'+j).style.display = 'block'; document.getElementById('FaddImg_'+j).style.display = 'none';
    document.getElementById('FRow_'+j).style.display = 'block';  document.getElementById('FminusImg_'+u1).style.display = 'none';  }
  }
function FamilyHideRow(j)
 { 
 var u = j+1;  var u1 = j-1; 
  if(j<=18)
  {document.getElementById('FminusImg_'+j).style.display = 'none'; document.getElementById('FaddImg_'+j).style.display = 'block';
   document.getElementById('FRow_'+j).style.display = 'none'; document.getElementById('FaddImg_'+u).style.display = 'none';
   document.getElementById('FminusImg_'+u1).style.display = 'block';
   document.getElementById('AnyRelation'+j).value = ""; document.getElementById('AnyRelationName'+j).value = ""; document.getElementById('AnyRelationDob'+j).value = "";
   document.getElementById('AnyRelation'+j+'Quali').value = ""; document.getElementById('AnyRelation'+j+'Occu').value = ""; }
  else 
  { document.getElementById('FminusImg_'+j).style.display = 'none'; document.getElementById('FaddImg_'+j).style.display = 'block';
    document.getElementById('FRow_'+j).style.display = 'none';  document.getElementById('FminusImg_'+u1).style.display = 'block';
	document.getElementById('AnyRelation'+j).value = ""; document.getElementById('AnyRelationName'+j).value = ""; document.getElementById('AnyRelationDob'+j).value = "";
    document.getElementById('AnyRelation'+j+'Quali').value = ""; document.getElementById('AnyRelation'+j+'Occu').value = ""; }
	
  } 
}

for(var j=1; j<20; j++) 
{
function FamilyShowRow2(j)
 { 
 var u = j+1;  var u1 = j-1; 
  if(j<=18)
  { document.getElementById('FminusImg_'+j).style.display = 'block'; document.getElementById('FaddImg_'+j).style.display = 'none';
   document.getElementById('FRow_'+j).style.display = 'block'; document.getElementById('FaddImg_'+u).style.display = 'block';
   document.getElementById('FminusImg_'+u1).style.display = 'none'; }
  else 
  { document.getElementById('FminusImg_'+j).style.display = 'block'; document.getElementById('FaddImg_'+j).style.display = 'none';
    document.getElementById('FRow_'+j).style.display = 'block';  document.getElementById('FminusImg_'+u1).style.display = 'none';  }
  }
function FamilyHideRow2(j)
 { 
 var u = j+1;  var u1 = j-1; 
  if(j<=18)
  {document.getElementById('FminusImg_'+j).style.display = 'none'; document.getElementById('FaddImg_'+j).style.display = 'block';
   document.getElementById('FRow_'+j).style.display = 'none'; document.getElementById('FaddImg_'+u).style.display = 'none';
   document.getElementById('FminusImg_'+u1).style.display = 'block';
   document.getElementById('AnyRelation'+j).value = ""; document.getElementById('AnyRelationName'+j).value = ""; document.getElementById('AnyRelationDob'+j).value = "";
   document.getElementById('AnyRelation'+j+'Quali').value = ""; document.getElementById('AnyRelation'+j+'Occu').value = ""; }
  else 
  { document.getElementById('FminusImg_'+j).style.display = 'none'; document.getElementById('FaddImg_'+j).style.display = 'block';
    document.getElementById('FRow_'+j).style.display = 'none';  document.getElementById('FminusImg_'+u1).style.display = 'block';
	document.getElementById('AnyRelation'+j).value = ""; document.getElementById('AnyRelationName'+j).value = ""; document.getElementById('AnyRelationDob'+j).value = "";
    document.getElementById('AnyRelation'+j+'Quali').value = ""; document.getElementById('AnyRelation'+j+'Occu').value = ""; }
	
  } 
}

function DelFamAdd(value,Id)
{ var agree=confirm("Are you sure you want to delete this record?"); 
  if (agree) {  var x = "EmpFamily.php?ID="+Id+"&Value="+value+"&Action=Delete&Event=Add";  window.location=x; }
}

function DelFam(value,Id)
{ var agree=confirm("Are you sure you want to delete this record?"); 
  if (agree) {  var x = "EmpFamily.php?ID="+Id+"&Value="+value+"&Action=Delete&Event=Edit";  window.location=x; }
}

function toUpper(txt)
{ document.getElementById(txt).value=document.getElementById(txt).value.toUpperCase(); return true; }
</script>
<script src="js/family.js" language="javascript" type="text/javascript"></script>
</head>
<body class="body">
<?php 
$SqlEmp = mysql_query("SELECT *,hrm_employee_general.*,hrm_employee_personal.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$EMPID, $con) or die(mysql_error());  $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
      if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
?>
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){require_once("AMenu.php"); } ?></td></tr></table></td></tr>
<tr><td valign="top">
      <table width="100%" style="margin-top:0px;" border="0">
	    <tr><td valign="top"><?php if($_SESSION['login'] = true){require_once("AWelcome.php"); } ?></td></tr>
	    <tr>
	        <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
  <table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="4">
   <table border="0">
    <tr>
	  <td align="right" width="250" class="heading">Family</td>
	  <td>&nbsp;&nbsp;&nbsp;</td>
	  <td style="font-family:Times New Roman; font-size:16px; color:#287126; font-weight:bold;"><font color="#FF0000" size="4">*</font>  - Require Field</td>
	   <td><table><tr><td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><span id="msgspan">
	   <?php echo $msg; ?></span></b></td></tr></table></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:100px;" align="center" valign="top"><?php if($_REQUEST['Event']=='Edit') { include("EmpMasterMenu.php"); } ?></td>
 
<td style="width:50px;" align="center" valign="top"></td>
<?php //*********************************************************************************************************************************************************?>
<?php if($_REQUEST['Event']=='Add') {?>
<td align="left" id="Efamily" valign="top">             
  <form enctype="multipart/form-data" name="formEfamily" method="post" onSubmit="return validate(this)">
<table border="0">
<tr> 
<td align="left" valign="top">
<table border="0" width="900" id="TEmp" style="display:block;" cellpadding="0" cellspacing="0">
<tr>
 <td colspan="2">
  <table><tr>
 <td class="All_80">EmpCode :</td><td class="All_60"><input name="EmpCode" id="EmpCode" class="All_50" value="<?php echo $EC; ?>" disabled></td>
 <td class="All_50">Name :</td><td class="All_220"><input name="EmpName" id="EmpName" style="width:210px; height:18px; font-size:11px;" value="<?php echo $Ename; ?>" disabled></td>
  </tr></table>
 </td>
</tr>

<tr>
<td style="width:30px;background-color:#E0DBE3;" align="center"></td>
<td><table bgcolor="#BCA9D3"><tr>
  <td class="All_120" align="center">Relation</td>
  <td class="All_50">&nbsp;</td>
  <td class="All_200" align="center">Name</td>
  <td class="All_100" align="center">DOB</td>
  <td class="All_150" align="center">Qualification</td>
  <td class="All_150" align="center">Occupation</td>
  <td class="All_50">&nbsp;</td>
</tr></table></td>
</tr>
<?php $sqlF1=mysql_query("select * from hrm_employee_family where EmployeeID=".$EMPID, $con); $rowF1=mysql_num_rows($sqlF1);
     if($rowF1>0) { $resF1=mysql_fetch_assoc($sqlF1);} ?>
<tr>
<td align="center"></td>
<td><table bgcolor="#FFFFFF"><tr>
  <td class="All_120" align="left">FATHER&nbsp;<font color="#FF0000">*</font></td>
  <td class="All_50"><select name="Fa_SN" id="Fa_SN" class="All_50">
<?php if($resF1['Fa_SN']=='') { ?><option style="background-color:#DBD3E2;" value="" selected>Select</option><?php } ?>
<?php if($resF1['Fa_SN']!='') { ?><option style="background-color:#DBD3E2;" value="<?php echo $resF1['Fa_SN']; ?>" selected><?php echo $resF1['Fa_SN']; ?></option><?php } ?>
   <option value="Mr">Mr</option>
   <option value="Dr">Dr</option>
   <option value="Late">Late</option>
  </select></td>
  <td class="All_200" align="left"><input name="FatherName" id="FatherName" value="<?php echo $resF1['FatherName']; ?>" class="All_200"/></td>
  <td class="All_100" align="left"><input name="FatherDob" id="FatherDob" value="<?php echo date("d-m-Y",strtotime($resF1['FatherDOB'])); ?>" class="All_80"/><button id="FatherDobBtn" class="CalenderButton" disabled></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
   cal.manageFields("FatherDobBtn", "FatherDob", "%d-%m-%Y");</script></td>
  <td class="All_150" align="left"><input name="FatherQuali" id="FatherQuali" value="<?php echo $resF1['FatherQuali']; ?>" class="All_150"/></td>
  <td class="All_150" align="left"><input name="FatherOccu" id="FatherOccu" value="<?php echo $resF1['FatherOccupation']; ?>" class="All_150"/></td>
</tr></table></td>
</tr>
<tr>
<td align="center"></td>
<td><table bgcolor="#FFFFFF"><tr>
  <td class="All_120" align="left">MOTHER&nbsp;<font color="#FF0000">*</font></td>
   <td class="All_50"><select name="Mo_SN" id="Mo_SN" class="All_50">
<?php if($resF1['Mo_SN']=='') { ?><option style="background-color:#DBD3E2;" value="" selected>Select</option><?php } ?>
<?php if($resF1['Mo_SN']!='') { ?><option style="background-color:#DBD3E2;" value="<?php echo $resF1['Mo_SN']; ?>" selected><?php echo $resF1['Mo_SN']; ?></option><?php } ?>
   <option value="Ms">Ms</option>
   <option value="Mrs">Mrs</option>
   <option value="Dr">Dr</option>
   <option value="Late">Late</option>
  </select></td>
  <td class="All_200" align="left"><input name="MotherName" id="MotherName" class="All_200" value="<?php echo $resF1['MotherName']; ?>"/></td>
  <td class="All_100" align="left"><input name="MotherDob" id="MotherDob" class="All_80" value="<?php echo date("d-m-Y",strtotime($resF1['MotherDOB'])); ?>"/><button id="MotherDobBtn" class="CalenderButton" disabled></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
   cal.manageFields("MotherDobBtn", "MotherDob", "%d-%m-%Y");</script></td>
  <td class="All_150" align="left"><input name="MotherQuali" id="MotherQuali" class="All_150" value="<?php echo $resF1['MotherQuali']; ?>"/></td>
  <td class="All_150" align="left"><input name="MotherOccu" id="MotherOccu" class="All_150" value="<?php echo $resF1['MotherOccupation']; ?>"/></td>
</tr></table></td>
</tr>
<?php $sqlPer=mysql_query("select Married from hrm_employee_personal where EmployeeID=".$EMPID, $con); $resPer=mysql_fetch_assoc($sqlPer); if($resPer['Married']=='Y') {?>
<tr>
<td align="center"></td>
<td><table bgcolor="#FFFFFF"><tr>
  <td class="All_120" align="left">HUSBAND/WIFE&nbsp;<font color="#FF0000">*</font></td>
   <td class="All_50"><select name="HW_SN" id="HW_SN" class="All_50">
<?php if($resF1['HW_SN']=='') { ?><option style="background-color:#DBD3E2;" value="" selected>Select</option><?php } ?>
<?php if($resF1['HW_SN']!='') { ?><option style="background-color:#DBD3E2;" value="<?php echo $resF1['HW_SN']; ?>" selected><?php echo $resF1['HW_SN']; ?></option><?php } ?>
   <option value="Mr">Mr</option>
   <option value="Ms">Ms</option>
   <option value="Mrs">Mrs</option>
   <option value="Dr">Dr</option>
   <option value="Late">Late</option>
  </select></td>
  <td class="All_200" align="left"><input name="HusWifeName" id="HusWifeName"  value="<?php echo $resF1['HusWifeName']; ?>" class="All_200"/></td>
  <td class="All_100" align="left"><input name="HusWifeDob" id="HusWifeDob" value="<?php echo date("d-m-Y",strtotime($resF1['HusWifeDOB'])); ?>" class="All_80"/><button id="HusWifeDobBtn" class="CalenderButton"></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
   cal.manageFields("HusWifeDobBtn", "HusWifeDob", "%d-%m-%Y");</script></td>
  <td class="All_150" align="left"><input name="HusWifeQuali" id="HusWifeQuali" value="<?php echo $resF1['HusWifeQuali']; ?>" class="All_150"/></td>
  <td class="All_150" align="left"><input name="HusWifeOccu" id="HusWifeOccu" value="<?php echo $resF1['HusWifeOccupation']; ?>" class="All_150"/></td>
</tr></table></td>
</tr>
<?php } if($resPer['Married']=='N') { ?>
<input type="hidden" name="HusWifeName" id="HusWifeName"  value="" /><input type="hidden" name="HusWifeDob" id="HusWifeDob" value="" />
<input type="hidden" name="HusWifeQuali" id="HusWifeQuali" value="" /><input type="hidden" name="HusWifeOccu" id="HusWifeOccu" value="" />
<?php } ?>
<?php $sqlFa=mysql_query("select * from hrm_employee_family2 where EmployeeID=".$EMPID." order by Family2Id ASC", $con); $rowFa=mysql_num_rows($sqlFa); 
      if($rowFa>0) { $i=1; while($resFa=mysql_fetch_assoc($sqlFa)){ ?>
<tr>
<td style="width:30px;" align="center"></td>
<td><table bgcolor="#FFFFFF"><tr>
  <td class="All_120" align="left"><input type="hidden" id="F2Id_<?php echo $i; ?>" name="F2Id_<?php echo $i; ?>" value="<?php echo $resFa['Family2Id']; ?>" />
  <select name="Any_Relation<?php echo $i; ?>" id="Any_Relation<?php echo $i; ?>" class="All_120">
   <option style="background-color:#DBD3E2;" value="<?php echo $resFa['FamilyRelation']; ?>" selected><?php echo $resFa['FamilyRelation']; ?></option>
   <option value="CHILD">CHILD</option>
   <option value="SON">SON</option>
   <option value="DAUGHTER">DAUGHTER</option>
   <option value="BROTHER">BROTHER</option>
   <option value="SISTER">SISTER</option>
  </select></td>
   <td class="All_50"><select name="Fa_2_SN<?php echo $i; ?>" id="Fa_2_SN<?php echo $i; ?>" class="All_50">
<?php if($resFa['Fa2_SN']=='') { ?><option style="background-color:#DBD3E2;" value="" selected>Select</option><?php } ?>
<?php if($resFa['Fa2_SN']!='') { ?><option style="background-color:#DBD3E2;" value="<?php echo $resFa['Fa2_SN']; ?>" selected><?php echo $resFa['Fa2_SN']; ?></option><?php } ?>
   <option value="Mr">Mr</option>
   <option value="Ms">Ms</option>
   <option value="Miss">Miss</option>
   <option value="Mrs">Mrs</option>
   <option value="Mas">Mas</option>
   <option value="Dr">Dr</option>
   <option value="Late">Late</option>
  </select></td>
  <td class="All_200" align="left"><input name="Any_RelationName<?php echo $i; ?>" id="Any_RelationName<?php echo $i; ?>" value="<?php echo $resFa['FamilyName']; ?>" class="All_200"/></td>
  <td class="All_100" align="left"><input name="Any_RelationDob<?php echo $i; ?>" id="Any_RelationDob<?php echo $i; ?>" value="<?php echo date("d-m-Y",strtotime($resFa['FamilyDOB'])); ?>" class="All_80"/><button id="Relation_DobBtn<?php echo $i; ?>" class="CalenderButton"></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
   cal.manageFields("Relation_DobBtn<?php echo $i; ?>", "AnyRelation_Dob<?php echo $i; ?>", "%d-%m-%Y");</script></td>
  <td class="All_150" align="left"><input name="Any_Relation<?php echo $i; ?>Quali" id="Any_Relation<?php echo $i; ?>Quali" value="<?php echo $resFa['FamilyQualification']; ?>" class="All_150"/></td>
  <td class="All_150" align="left"><input name="Any_Relation<?php echo $i; ?>Occu" id="Any_Relation<?php echo $i; ?>Occu" value="<?php echo $resFa['FamilyOccupation']; ?>" class="All_150"/></td>
  <td class="All_50" align="center"><a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="DelFamAdd(<?php echo $resFa['Family2Id'].','.$EMPID; ?>)"></a></td>
</tr></table></td>
</tr>
<?php $i++; }} ?><input type="hidden" name="RowCountFamily" id="RowCountFamily" value="<?php echo $rowFa; ?>" />

<?php for($j=1; $j<20; $j++){ ?>
<tr>
<td style="width:30px;background-color:#E0DBE3;" id="FImg_<?php echo $j; ?>" align="center">
<img src="images/Addnew.png" <?php if($j>1) { echo 'style="display:none;"';} ?> border="0" id="FaddImg_<?php echo $j; ?>" onClick="FamilyShowRow2(<?php echo $j; ?>)"/>
<img src="images/Minusnew.png" id="FminusImg_<?php echo $j; ?>" <?php if($j>=1){ echo 'style="display:none;"'; } ?> border="0" onClick="FamilyHideRow2(<?php echo $j; ?>)"/></td>
<td><table bgcolor="#FFFFFF" style="display:none;" id="FRow_<?php echo $j; ?>"><tr>
  <td class="All_120" align="left"><select name="AnyRelation<?php echo $j; ?>" id="AnyRelation<?php echo $j; ?>" class="All_120">
                                   <option style="background-color:#DBD3E2;" value="" selected>Select</option>
								   <option value="CHILD">CHILD</option>
								   <option value="SON">SON</option>
								   <option value="DAUGHTER">DAUGHTER</option>
                                   <option value="BROTHER">BROTHER</option>
                                   <option value="SISTER">SISTER</option>
                                   </select></td>
<td class="All_50"><select name="Fa2_SN<?php echo $j; ?>" id="Fa2_SN<?php echo $j; ?>" class="All_50">
<option style="background-color:#DBD3E2;" value="" selected>Select</option>
   <option value="Mr">Mr</option>
   <option value="Ms">Ms</option>
   <option value="Miss">Miss</option>
   <option value="Mrs">Mrs</option>
   <option value="Mas">Mas</option>
   <option value="Dr">Dr</option>
   <option value="Late">Late</option>
  </select></td>							   
  <td class="All_200" align="left"><input name="AnyRelationName<?php echo $j; ?>" id="AnyRelationName<?php echo $j; ?>" class="All_200"/></td>
  <td class="All_100" align="left"><input name="AnyRelationDob<?php echo $j; ?>" id="AnyRelationDob<?php echo $j; ?>" class="All_80"/><button id="RelationDobBtn<?php echo $j; ?>" class="CalenderButton"></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
   cal.manageFields("RelationDobBtn<?php echo $j; ?>", "AnyRelationDob<?php echo $j; ?>", "%d-%m-%Y");</script></td>
  <td class="All_150" align="left"><input name="AnyRelation<?php echo $j; ?>Quali" id="AnyRelation<?php echo $j; ?>Quali" class="All_150"/></td>
  <td class="All_150" align="left"><input name="AnyRelation<?php echo $j; ?>Occu" id="AnyRelation<?php echo $j; ?>Occu" class="All_150"/></td>
</tr></table></td>
</tr>
<?php } ?>
<tr>
  <td align="Right" class="fontButton" colspan="6"><table border="0" align="right" class="fontButton">
	<tr>	 
	  <td align="right" style="width:90px;">
<input type="hidden" name="AnyRelation0" id="AnyRelation0" value="1"/><input type="hidden" name="AnyRelationName0" id="AnyRelationName0" value="a"/><input type="hidden" name="AnyRelationDob0" id="AnyRelationDob0" value="a"/><input type="hidden" name="AnyRelation0Quali" id="AnyRelation0Quali" value="a"/><input type="hidden" name="AnyRelation0Occu" id="AnyRelation0Occu" value="a" />

		<input type="submit" name="AddFamilyE" id="AddFamilyE" style="width:90px;" value="save"></td>
	  <td align="right" style="width:90px;"><input type="button" name="RefreshFamilyE" id="RefreshFamilyE" style="width:90px;" value="refresh" onClick="RefFamily()"/></td>
	</tr></table>
  </td>
</tr>

</table>
</td>
<?php include("EmpImg.php"); ?>
</tr>
</table>
</form> 
</td>
<?php } if($_REQUEST['Event']=='Edit') {?>
 <td align="left" id="Efamily" valign="top">             
  <form enctype="multipart/form-data" name="formEfamily" method="post" onSubmit="return validate(this)">
<table border="0">
<tr> 
<td align="left" valign="top">
<table border="0" width="900" id="TEmp" style="display:block;" cellpadding="0" cellspacing="0">
<tr>
 <td colspan="2">
  <table><tr>
 <td class="All_100">EmpCode :</td><td class="All_90"><input name="EmpCode" id="EmpCode" class="All_80" style="background-color:#E6EBC5;" value="<?php echo $EC; ?>" readonly></td>
 <td class="All_50">Name :</td><td class="All_220"><input name="EmpName" id="EmpName" style="width:210px; height:18px; font-size:11px;background-color:#E6EBC5;" value="<?php echo $Ename; ?>" readonly></td>
  </tr></table>
 </td>
</tr>

<tr>
<td style="width:30px;background-color:#E0DBE3;" align="center"></td>
<td><table bgcolor="#BCA9D3"><tr>
  <td class="All_120" align="center">Relation</td>
  <td width="50">&nbsp;</td>
  <td class="All_200" align="center">Name</td>
  <td class="All_100" align="center">DOB</td>
  <td class="All_150" align="center">Qualification</td>
  <td class="All_150" align="center">Occupation</td>
</tr></table></td>
</tr>
<?php $sqlF1=mysql_query("select * from hrm_employee_family where EmployeeID=".$EMPID, $con); $rowF1=mysql_num_rows($sqlF1);
     if($rowF1>0) { $resF1=mysql_fetch_assoc($sqlF1);} ?>
<tr>
<td align="center"></td>
<td><table bgcolor="#FFFFFF"><tr>
  <td class="All_120" align="left">FATHER&nbsp;<font color="#FF0000">*</font></td>
  <td class="All_50"><select name="Fa_SN" id="Fa_SN" class="All_50">
<?php if($resF1['Fa_SN']=='') { ?><option style="background-color:#DBD3E2;" value="" selected>Select</option><?php } ?>
<?php if($resF1['Fa_SN']!='') { ?><option style="background-color:#DBD3E2;" value="<?php echo $resF1['Fa_SN']; ?>" selected><?php echo $resF1['Fa_SN']; ?></option><?php } ?>
   <option value="Mr">Mr</option>
   <option value="Dr">Dr</option>
   <option value="Late">Late</option>
  </select></td>
  <td class="All_200" align="left"><input name="FatherName" id="FatherName" value="<?php echo $resF1['FatherName']; ?>" class="All_200" readonly/></td>
  <td class="All_100" align="left"><input name="FatherDob" id="FatherDob" value="<?php echo date("d-m-Y",strtotime($resF1['FatherDOB'])); ?>" class="All_80" readonly/><button id="FatherDobBtn" class="CalenderButton" disabled></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
   cal.manageFields("FatherDobBtn", "FatherDob", "%d-%m-%Y");</script></td>
  <td class="All_150" align="left"><input name="FatherQuali" id="FatherQuali" value="<?php echo $resF1['FatherQuali']; ?>" class="All_150" readonly/></td>
  <td class="All_150" align="left"><input name="FatherOccu" id="FatherOccu" value="<?php echo $resF1['FatherOccupation']; ?>" class="All_150" readonly/></td>
</tr></table></td>
</tr>
<tr>
<td align="center"></td>
<td><table bgcolor="#FFFFFF"><tr>
  <td class="All_120" align="left">MOTHER&nbsp;<font color="#FF0000">*</font></td>
  <td class="All_50"><select name="Mo_SN" id="Mo_SN" class="All_50">
<?php if($resF1['Mo_SN']=='') { ?><option style="background-color:#DBD3E2;" value="" selected>Select</option><?php } ?>
<?php if($resF1['Mo_SN']!='') { ?><option style="background-color:#DBD3E2;" value="<?php echo $resF1['Mo_SN']; ?>" selected><?php echo $resF1['Mo_SN']; ?></option><?php } ?>
   <option value="Ms">Ms</option>
   <option value="Mrs">Mrs</option>
   <option value="Dr">Dr</option>
   <option value="Late">Late</option>
  </select></td>
  <td class="All_200" align="left"><input name="MotherName" id="MotherName" class="All_200" value="<?php echo $resF1['MotherName']; ?>" readonly/></td>
  <td class="All_100" align="left"><input name="MotherDob" id="MotherDob" class="All_80" value="<?php echo date("d-m-Y",strtotime($resF1['MotherDOB'])); ?>" readonly/><button id="MotherDobBtn" class="CalenderButton" disabled></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
   cal.manageFields("MotherDobBtn", "MotherDob", "%d-%m-%Y");</script></td>
  <td class="All_150" align="left"><input name="MotherQuali" id="MotherQuali" class="All_150" value="<?php echo $resF1['MotherQuali']; ?>" readonly/></td>
  <td class="All_150" align="left"><input name="MotherOccu" id="MotherOccu" class="All_150" value="<?php echo $resF1['MotherOccupation']; ?>" readonly/></td>
</tr></table></td>
</tr>
<?php $sqlPer=mysql_query("select Married from hrm_employee_personal where EmployeeID=".$EMPID, $con); $resPer=mysql_fetch_assoc($sqlPer); if($resPer['Married']=='Y') {?>
<tr>
<td align="center"></td>
<td><table bgcolor="#FFFFFF"><tr>
  <td class="All_120" align="left">HUSBAND/WIFE&nbsp;<font color="#FF0000">*</font></td>
   <td class="All_50"><select name="HW_SN" id="HW_SN" class="All_50">
<?php if($resF1['HW_SN']=='') { ?><option style="background-color:#DBD3E2;" value="" selected>Select</option><?php } ?>
<?php if($resF1['HW_SN']!='') { ?><option style="background-color:#DBD3E2;" value="<?php echo $resF1['HW_SN']; ?>" selected><?php echo $resF1['HW_SN']; ?></option><?php } ?>
   <option value="Mr">Mr</option>
   <option value="Ms">Ms</option>
   <option value="Mrs">Mrs</option>
   <option value="Dr">Dr</option>
   <option value="Late">Late</option>
  </select></td>
  <td class="All_200" align="left"><input name="HusWifeName" id="HusWifeName"  value="<?php echo $resF1['HusWifeName']; ?>" class="All_200" <?php if($resPer['Married']=='Y') { echo 'readonly'; } else { echo 'disabled';} ?>/></td>
  <td class="All_100" align="left"><input name="HusWifeDob" id="HusWifeDob" value="<?php echo date("d-m-Y",strtotime($resF1['HusWifeDOB'])); ?>" class="All_80" readonly/><button id="HusWifeDobBtn" class="CalenderButton"></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
   cal.manageFields("HusWifeDobBtn", "HusWifeDob", "%d-%m-%Y");</script></td>
  <td class="All_150" align="left"><input name="HusWifeQuali" id="HusWifeQuali" value="<?php echo $resF1['HusWifeQuali']; ?>" class="All_150" <?php if($resPer['Married']=='Y') { echo 'readonly'; } else { echo 'disabled';} ?>/></td>
  <td class="All_150" align="left"><input name="HusWifeOccu" id="HusWifeOccu" value="<?php echo $resF1['HusWifeOccupation']; ?>" class="All_150" <?php if($resPer['Married']=='Y') { echo 'readonly'; } else { echo 'disabled';} ?>/></td>
</tr></table></td>
</tr>
<?php } if($resPer['Married']=='N') { ?>
<input type="hidden" name="HusWifeName" id="HusWifeName"  value="" /><input type="hidden" name="HusWifeDob" id="HusWifeDob" value="" />
<input type="hidden" name="HusWifeQuali" id="HusWifeQuali" value="" /><input type="hidden" name="HusWifeOccu" id="HusWifeOccu" value="" />
<?php } ?>
<?php $sqlFa=mysql_query("select * from hrm_employee_family2 where EmployeeID=".$EMPID." order by Family2Id ASC", $con); $rowFa=mysql_num_rows($sqlFa); 
      if($rowFa>0) { $i=1; while($resFa=mysql_fetch_assoc($sqlFa)){ ?>
<tr>
<td style="width:30px;" align="center"></td>
<td><table bgcolor="#FFFFFF"><tr>
  <td class="All_120" align="left"><input type="hidden" id="F2Id_<?php echo $i; ?>" name="F2Id_<?php echo $i; ?>" value="<?php echo $resFa['Family2Id']; ?>" />
  <select name="Any_Relation<?php echo $i; ?>" id="Any_Relation<?php echo $i; ?>" class="All_120" disabled>
   <option style="background-color:#DBD3E2;" value="<?php echo $resFa['FamilyRelation']; ?>" selected><?php echo $resFa['FamilyRelation']; ?></option>
   <option value="SON">SON</option>
   <option value="DAUGHTER">DAUGHTER</option>
   <option value="BROTHER">BROTHER</option>
   <option value="SISTER">SISTER</option>
  </select></td>
   <td class="All_50"><select name="Fa_2_SN<?php echo $i; ?>" id="Fa_2_SN<?php echo $i; ?>" class="All_50">
<?php if($resFa['Fa2_SN']=='') { ?><option style="background-color:#DBD3E2;" value="" selected>Select</option><?php } ?>
<?php if($resFa['Fa2_SN']!='') { ?><option style="background-color:#DBD3E2;" value="<?php echo $resFa['Fa2_SN']; ?>" selected><?php echo $resFa['Fa2_SN']; ?></option><?php } ?>
   <option value="Mr">Mr</option>
   <option value="Ms">Ms</option>
   <option value="Miss">Miss</option>
   <option value="Mrs">Mrs</option>
   <option value="Mas">Mas</option>
   <option value="Dr">Dr</option>
   <option value="Late">Late</option>
  </select></td>
  <td class="All_200" align="left"><input name="Any_RelationName<?php echo $i; ?>" id="Any_RelationName<?php echo $i; ?>" value="<?php echo $resFa['FamilyName']; ?>" class="All_200" readonly/></td>
  <td class="All_100" align="left"><input name="Any_RelationDob<?php echo $i; ?>" id="Any_RelationDob<?php echo $i; ?>" value="<?php echo date("d-m-Y",strtotime($resFa['FamilyDOB'])); ?>" class="All_80" readonly/><button id="Relation_DobBtn<?php echo $i; ?>" class="CalenderButton" disabled></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
   cal.manageFields("Relation_DobBtn<?php echo $i; ?>", "AnyRelation_Dob<?php echo $i; ?>", "%d-%m-%Y");</script></td>
  <td class="All_150" align="left"><input name="Any_Relation<?php echo $i; ?>Quali" id="Any_Relation<?php echo $i; ?>Quali" value="<?php echo $resFa['FamilyQualification']; ?>" class="All_150" readonly/></td>
  <td class="All_150" align="left"><input name="Any_Relation<?php echo $i; ?>Occu" id="Any_Relation<?php echo $i; ?>Occu" value="<?php echo $resFa['FamilyOccupation']; ?>" class="All_150" readonly/></td>
  <td class="All_50" align="center"><a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="DelFam(<?php echo $resFa['Family2Id'].','.$EMPID; ?>)"></a></td>
</tr></table></td>
</tr>
<?php $i++; }} ?><input type="hidden" name="RowCountFamily" id="RowCountFamily" value="<?php echo $rowFa; ?>" />
<script>
function FucCheckCH(v,i)
{ if(v=='SON'){document.getElementById("Fa2_SN"+i).value='Mr';} 
  else if(v=='DAUGHTER'){ document.getElementById("Fa2_SN"+i).value='Ms';} 
  else if(v=='BROTHER'){ document.getElementById("Fa2_SN"+i).value='Mr';}
  else if(v=='SISTER'){ document.getElementById("Fa2_SN"+i).value='Ms';} 
  else { document.getElementById("Fa2_SN"+i).value=''; }

}
</script>
<?php for($j=1; $j<20; $j++){ ?>
<tr>
<td style="width:30px;background-color:#E0DBE3;" id="FImg_<?php echo $j; ?>" align="center">
<img src="images/Addnew.png" <?php if($j>1) { echo 'style="display:none;"';} ?> border="0" id="FaddImg_<?php echo $j; ?>" onClick="FamilyShowRow2(<?php echo $j; ?>)"/>
<img src="images/Minusnew.png" id="FminusImg_<?php echo $j; ?>" <?php if($j>=1){ echo 'style="display:none;"'; } ?> border="0" onClick="FamilyHideRow2(<?php echo $j; ?>)"/></td>
<td><table bgcolor="#FFFFFF" style="display:none;" id="FRow_<?php echo $j; ?>"><tr>
  <td class="All_120" align="left"><select name="AnyRelation<?php echo $j; ?>" id="AnyRelation<?php echo $j; ?>" class="All_120" disabled onChange="FucCheckCH(this.value,<?php echo $j; ?>)">
                                   <option style="background-color:#DBD3E2;" value="" selected>Select</option>
								   <option value="SON">SON</option>
								   <option value="DAUGHTER">DAUGHTER</option>
                                   <option value="BROTHER">BROTHER</option>
                                   <option value="SISTER">SISTER</option>
                                   </select></td>
<td class="All_50"><select name="Fa2_SN<?php echo $j; ?>" id="Fa2_SN<?php echo $j; ?>" class="All_50">
<option style="background-color:#DBD3E2;" value="" selected>Select</option>
   <option value="Mr">Mr</option>
   <option value="Ms">Ms</option>
   <option value="Miss">Miss</option>
   <option value="Mrs">Mrs</option>
   <option value="Mas">Mas</option>
   <option value="Dr">Dr</option>
   <option value="Late">Late</option>
  </select></td>												   
  <td class="All_200" align="left"><input name="AnyRelationName<?php echo $j; ?>" id="AnyRelationName<?php echo $j; ?>" class="All_200" readonly/></td>
  <td class="All_100" align="left"><input name="AnyRelationDob<?php echo $j; ?>" id="AnyRelationDob<?php echo $j; ?>" class="All_80" readonly/><button id="RelationDobBtn<?php echo $j; ?>" class="CalenderButton" disabled></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
   cal.manageFields("RelationDobBtn<?php echo $j; ?>", "AnyRelationDob<?php echo $j; ?>", "%d-%m-%Y");</script></td>
  <td class="All_150" align="left"><input name="AnyRelation<?php echo $j; ?>Quali" id="AnyRelation<?php echo $j; ?>Quali" class="All_150" readonly/></td>
  <td class="All_150" align="left"><input name="AnyRelation<?php echo $j; ?>Occu" id="AnyRelation<?php echo $j; ?>Occu" class="All_150" readonly/></td>
</tr></table></td>
</tr>
<?php } ?>
<tr>
  <td align="Right" class="fontButton" colspan="6"><table border="0" align="right" class="fontButton">
	<tr>	 
<?php if($_SESSION['User_Permission']=='Edit'){?>
	  <td align="right" style="width:90px;"><input type="button" name="ChangeFamily" id="ChangeFamily" style="width:90px; display:block;" value="Edit" onClick="EditFamily()">
		<input type="submit" name="EditFamilyE" id="EditFamilyE" style="width:90px;display:none;" value="save"></td>
<?php } ?>
	  <td align="right" style="width:90px;"><input type="button" name="RefreshFamilyE" id="RefreshFamilyE" style="width:90px;" value="refresh" onClick="javascript:window.location='EmpFamily.php?ID=<?php echo $EMPID; ?>&Event=Edit'"/></td>
	</tr></table>
  </td>
</tr>
</table>
</td>
<?php include("EmpImg.php"); ?>
</tr>
</table>
</form> 
</td>
 <?php } ?>
<?php //*********************************************************************************************************************************************************?>
</tr>
<?php } ?> 
</table>
				
	  </td>
	</tr>
	
	<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>	
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

