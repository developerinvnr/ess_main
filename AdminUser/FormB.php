<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//*****************************************************************************************
if(isset($_POST['SaveNew']))
{ $SqlInseart = mysql_query("INSERT INTO hrm_pms_formb(Year,DepartmentId,Skill,SkillComment,GroupFor,Weightage,Logic,Period,Target,SkillStatus,CompanyId,CreatedBy,CreatedDate,YearId) VALUES('".date("Y")."', ".$_SESSION['DPid'].", '".$_POST['Skill']."', '".$_POST['SkillComment']."', '".$_POST['GroupFor']."', ".$_POST['Weightage'].", '".$_POST['Logic']."', '".$_POST['Period']."', ".$_POST['Target'].", '".$_POST['SkillStatus']."', ".$CompanyId.", ".$UserId.", '".date('Y-m-d')."', ".$YearId.")", $con); 
   if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
}

if(isset($_POST['SaveEdit']))
{
   $SqlUpdate = mysql_query("UPDATE hrm_pms_formb SET Year='".date("Y")."', Skill='".$_POST['Skill']."', SkillComment='".$_POST['SkillComment']."', GroupFor='".$_POST['GroupFor']."', Weightage=".$_POST['Weightage'].", Logic='".$_POST['Logic']."', Period='".$_POST['Period']."', Target=".$_POST['Target'].", SkillStatus='".$_POST['SkillStatus']."' WHERE FormBId=".$_POST['FormBId']) or die(mysql_error());
     if($SqlUpdate)
	 { 
	  $msg = "Data has been Updeted successfully...";
	 }
}



/*
if(isset($_POST['SaveEdit']))
{ 
 $Sql2=mysql_query("Select * from hrm_pms_formb WHERE FormBId=".$_POST['FormBId']." AND YearId=".$YearId." AND CompanyId=".$CompanyId, $con); 
 $Rows = mysql_num_rows($Sql2); 
 if($Rows>0) 
 { $SqlUpdate = mysql_query("UPDATE hrm_pms_formb SET Year='".date("Y")."', Skill='".$_POST['Skill']."', SkillComment='".$_POST['SkillComment']."',Weightage=".$_POST['Weightage'].", Logic='".$_POST['Logic']."', Period='".$_POST['Period']."', Target=".$_POST['Target'].", SkillStatus='".$_POST['SkillStatus']."' WHERE FormBId=".$_POST['FormBId'], $con) or die(mysql_error()); 
   if($SqlUpdate){$msg="Data has been Updeted successfully...";}
 }
 if($Rows==0)
 { 
 $Sql3=mysql_query("update hrm_pms_formb set SkillStatus='D' WHERE FormBId=".$_POST['FormBId']." AND CompanyId=".$CompanyId, $con);
    if($Sql3)
    { $Sql4=mysql_query("INSERT INTO hrm_pms_formb(Year,DepartmentId,Skill,SkillComment,Weightage,Logic,Period,Target,SkillStatus,CompanyId,CreatedBy,CreatedDate,YearId) VALUES('".date("Y")."', ".$_SESSION['DPid'].",'".$_POST['Skill']."', '".$_POST['SkillComment']."', ".$_POST['Weightage'].", '".$_POST['Logic']."', '".$_POST['Period']."', ".$_POST['Target'].", '".$_POST['SkillStatus']."', ".$CompanyId.", ".$UserId.", '".date('Y-m-d')."', ".$YearId.")", $con); 
	}
 }
 if($Sql4){ $msg = "Data has been Updeted successfully...";}
	   
}
*/

if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
  $SqlDelete=mysql_query("UPDATE hrm_pms_formb SET SkillStatus='De' WHERE FormBId=".$_REQUEST['did'], $con);
  if($SqlDelete)
  { 
   $sU=mysql_query("delete from hrm_pms_formbsub where FormBId=".$_REQUEST['did'], $con);
   $msg = "Data has been deleted successfully..."; 
  }
}


if($_REQUEST['actsubformb']=='OkSubFormBEdit' && $_REQUEST['MWei']!='' && $_REQUEST['BId']!='')
{

 $TotalWei=$_REQUEST['Wei1']+$_REQUEST['Wei2']+$_REQUEST['Wei3']+$_REQUEST['Wei4']+$_REQUEST['Wei5'];
 for($i=1; $i<=5; $i++)
 { 
  if($_REQUEST['SBId'.$i]!='')
  { 
   if($_REQUEST['Skill'.$i]!=''){ $sU=mysql_query("update hrm_pms_formbsub set Skill='".$_REQUEST['Skill'.$i]."', SkillComment='".$_REQUEST['SkillD'.$i]."', Weightage=".$_REQUEST['Wei'.$i].", Logic='".$_REQUEST['Log'.$i]."', Period='".$_REQUEST['Per'.$i]."', Target=".$_REQUEST['Tar'.$i].", CrUpDate='".date("Y-m-d")."' where FormBId=".$_REQUEST['BId']." AND FormBSubId=".$_REQUEST['SBId'.$i], $con); }else{ $sD=mysql_query("delete from hrm_pms_formbsub where FormBId=".$_REQUEST['BId']." AND FormBSubId=".$_REQUEST['SBId'.$i], $con); }
  }
  elseif($_REQUEST['SBId'.$i]=='')
  { 
   if($_REQUEST['Skill'.$i]!='')
   {
    $sU=mysql_query("insert into hrm_pms_formbsub(FormBId, Skill, SkillComment, Weightage, Logic, Period, Target, BSubStatus, CrUpDate)value(".$_REQUEST['BId'].", '".$_REQUEST['Skill'.$i]."', '".$_REQUEST['SkillD'.$i]."', ".$_REQUEST['Wei'.$i].", '".$_REQUEST['Log'.$i]."', '".$_REQUEST['Per'.$i]."', ".$_REQUEST['Tar'.$i].", 'A', '".date("Y-m-d")."')", $con); 
   }
  }

 }
 
  if($sU)
  { 
   if($TotalWei==$_REQUEST['MWei']){echo '<script>alert("Sub-FomrB have been saved successfully."); window.location="FormB.php?DPid='.$_REQUEST['DI'].'&Sts=A"; </script>';}
   else{ $sU=mysql_query("update hrm_pms_formbsub set Weightage=0 where FormBId=".$_REQUEST['BId'], $con);
   echo '<script>alert("Error..Please Check!, Sub-FormB weightage is not equal to main FormB weightage !");  window.location="FormB.php?DPid='.$_REQUEST['DI'].'&Sts=A"; </script>';}
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
.font{font-family:Times New Roman;font-size:16px;text-align:center;font-weight:bold;} 
.th{font-family:Times New Roman;color:#FFFFFF;font-size:14px;text-align:center;font-weight:bold;height:24px;}
.td{font-family:Times New Roman;font-size:14px;text-align:center;color:#000000;}
.tdl{font-family:Times New Roman;font-size:14px;text-align:left;}
.tdr{font-family:Times New Roman;font-size:14px;text-align:right;}
.InputT{font-family:Times New Roman;font-size:14px;width:100%;height:20px;text-align:center;border:hidden; background-color:#CDFF9B;}.InputTl{font-family:Times New Roman;font-size:14px;width:100%;height:20px;text-align:left;border:hidden;background-color:#CDFF9B;}.InputTr{font-family:Times New Roman;font-size:14px;width:100%;height:20px;text-align:right;border:hidden;background-color:#CDFF9B;}
.InputS{font-family:Times New Roman;font-size:12px;width:100%;height:20px;}
.fontButton{ background-color:#7a6189;color:#009393;font-family:Times New Roman;font-size:13px; }
.SaveButton{ background-image:url(images/save.gif);width:20px;height:20px;background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit; }
.CalenderButton{ background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px;background-color:#E0DBE3; border-color:#FFFFFF; }
.Input2a{font-family:Times New Roman; height:22px;background-color:#D5AAAA;font-weight:bold; font-size:12px;text-align:center;}.Inputa{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF;width:100%; border-top-color:#FFFFFF; border:0;background-color:#CAE4FF;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>

<Script>
function SelectDeptEmp(value){  var StsE=document.getElementById("StsE").value; var x = 'FormB.php?DPid='+value+'&Sts='+StsE; window.location=x; }
function edit(value1,value2){ var agree=confirm("Are you sure you want to edit this record?");
if(agree){ var StsE=document.getElementById("StsE").value; var x = "FormB.php?action=edit&eid="+value1+"&DPid="+value2+"&Sts="+StsE; window.location=x;} }
function del(value1,value2){ var agree=confirm("Are you sure you want to delete this record?");
if(agree){ var StsE=document.getElementById("StsE").value; var x = "FormB.php?action=delete&did="+value1+"&DPid="+value2+"&Sts="+StsE; window.location=x;} }
function newsave(value){ var StsE=document.getElementById("StsE").value; var x = "FormB.php?action=newsave&DPid="+value+"&Sts="+StsE; window.location=x; }
  
function validateEdit(formEdit)
{
  var Skill = formEdit.Skill.value;  
  if (Skill.length === 0) { alert("You must enter a skill Name.");  return false; }
  var SkillComment = formEdit.SkillComment.value; 
  if (SkillComment.length === 0) { alert("You must enter a skill Comment Name.");  return false; }
}
   
/**** Sub FormB open Sub FormB open **************************************/
function FunSubO(b){ document.getElementById("Div"+b).style.display='block'; document.getElementById("SpanO"+b).style.display='block'; document.getElementById("SpanC"+b).style.display='none'; } 
function FunSubC(b){ document.getElementById("Div"+b).style.display='none'; document.getElementById("SpanO"+b).style.display='none'; document.getElementById("SpanC"+b).style.display='block'; }

function ChangeWeighta(k,m)
{ var Weightage=document.getElementById("Wei_a"+k+"_"+m).value; 
  if(Weightage==''){document.getElementById("WWei_a"+k+"_"+m).value=0;} 
  else {document.getElementById("WWei_a"+k+"_"+m).value=Weightage; } }
function ChangeTargeta(k,m)
{ var Target=document.getElementById("Tar_a"+k+"_"+m).value; 
  if(Target==''){document.getElementById("TTar_a"+k+"_"+m).value=0;} 
  else {document.getElementById("TTar_a"+k+"_"+m).value=Target; } } 

function SaveFormB(k,m)
{ 
  var Skill_1=document.getElementById("Skill_a"+k+"_1").value.replace(/[`~!@#$^&*()_|+\-??'",.<>\{\}\[\]\\\/]/gi, ''); 
  var Skill_2=document.getElementById("Skill_a"+k+"_2").value.replace(/[`~!@#$^&*()_|+\-??'",.<>\{\}\[\]\\\/]/gi, ''); 
  var Skill_3=document.getElementById("Skill_a"+k+"_3").value.replace(/[`~!@#$^&*()_|+\-??'",.<>\{\}\[\]\\\/]/gi, ''); 
  var Skill_4=document.getElementById("Skill_a"+k+"_4").value.replace(/[`~!@#$^&*()_|+\-??'",.<>\{\}\[\]\\\/]/gi, ''); 
  var Skill_5=document.getElementById("Skill_a"+k+"_5").value.replace(/[`~!@#$^&*()_|+\-??'",.<>\{\}\[\]\\\/]/gi, '');
  
  var SkillD_1=document.getElementById("SkillDes_a"+k+"_1").value.replace(/[`~!@#$^&*()_|+\-??'",.<>\{\}\[\]\\\/]/gi, ''); 
  var SkillD_2=document.getElementById("SkillDes_a"+k+"_2").value.replace(/[`~!@#$^&*()_|+\-??'",.<>\{\}\[\]\\\/]/gi, ''); 
  var SkillD_3=document.getElementById("SkillDes_a"+k+"_3").value.replace(/[`~!@#$^&*()_|+\-??'",.<>\{\}\[\]\\\/]/gi, ''); 
  var SkillD_4=document.getElementById("SkillDes_a"+k+"_4").value.replace(/[`~!@#$^&*()_|+\-??'",.<>\{\}\[\]\\\/]/gi, ''); 
  var SkillD_5=document.getElementById("SkillDes_a"+k+"_5").value.replace(/[`~!@#$^&*()_|+\-??'",.<>\{\}\[\]\\\/]/gi, '');  
      
  var Wei_1=document.getElementById("Wei_a"+k+"_1").value; var Wei_2=document.getElementById("Wei_a"+k+"_2").value;
  var Wei_3=document.getElementById("Wei_a"+k+"_3").value; var Wei_4=document.getElementById("Wei_a"+k+"_4").value;
  var Wei_5=document.getElementById("Wei_a"+k+"_5").value; 
  
  var Log_1=document.getElementById("Log_a"+k+"_1").value; var Log_2=document.getElementById("Log_a"+k+"_2").value;
  var Log_3=document.getElementById("Log_a"+k+"_3").value; var Log_4=document.getElementById("Log_a"+k+"_4").value;
  var Log_5=document.getElementById("Log_a"+k+"_5").value;
  
  var Per_1=document.getElementById("Per_a"+k+"_1").value; var Per_2=document.getElementById("Per_a"+k+"_2").value;
  var Per_3=document.getElementById("Per_a"+k+"_3").value; var Per_4=document.getElementById("Per_a"+k+"_4").value;
  var Per_5=document.getElementById("Per_a"+k+"_5").value;

  var Tar_1=document.getElementById("Tar_a"+k+"_1").value; var Tar_2=document.getElementById("Tar_a"+k+"_2").value; 
  var Tar_3=document.getElementById("Tar_a"+k+"_3").value; var Tar_4=document.getElementById("Tar_a"+k+"_4").value; 
  var Tar_5=document.getElementById("Tar_a"+k+"_5").value; 
  

  if(document.getElementById("Skill_a"+k+"_1").value!='')
  {
   if(Wei_1.length === 0){alert("please type weightage in sub-FormB row 1."); return false;}
   if(Tar_1.length === 0){alert("please type target in sub-FormB row 1.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Wei_1); var test_numT = Numfilter.test(Tar_1);
   if(test_numW==false){ alert('Please Enter Only Numeric in the Weightage in sub-FormB row 1'); return false; }
   if(test_numT==false){ alert('Please Enter Only Numeric in the Target in sub-FormB row 1'); return false; }
  }
  if(document.getElementById("Skill_a"+k+"_2").value!='')
  {
   if(Wei_2.length === 0){alert("please type weightage in sub-FormB row 2.");  return false;}
   if(Tar_2.length === 0){alert("please type target in sub-FormB row 2.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Wei_2); var test_numT = Numfilter.test(Tar_2);
   if(test_numW==false){ alert('Please Enter Only Numeric in the Weightage in sub-FormB row 2'); return false; }
   if(test_numT==false){ alert('Please Enter Only Numeric in the Target in sub-FormB row 2'); return false; }
  }
  if(document.getElementById("Skill_a"+k+"_3").value!='')
  {
   if(Wei_3.length === 0){alert("please type weightage in sub-FormB row 3.");  return false;}
   if(Tar_3.length === 0){alert("please type target in sub-FormB row 3.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Wei_3); var test_numT = Numfilter.test(Tar_3);
   if(test_numW==false){ alert('Please Enter Only Numeric in the Weightage in sub-FormB row 3'); return false; }
   if(test_numT==false){ alert('Please Enter Only Numeric in the Target in sub-FormB row 3'); return false; }
  }
  if(document.getElementById("Skill_a"+k+"_4").value!='')
  {
   if(Wei_4.length === 0){alert("please type weightage in sub-FormB row 4.");  return false;}
   if(Tar_4.length === 0){alert("please type target in sub-FormB row 4.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Wei_4); var test_numT = Numfilter.test(Tar_4);
   if(test_numW==false){ alert('Please Enter Only Numeric in the Weightage in sub-FormB row 4'); return false; }
   if(test_numT==false){ alert('Please Enter Only Numeric in the Target in sub-FormB row 4'); return false; }
  }  
  if(document.getElementById("Skill_a"+k+"_5").value!='')
  {
   if(Wei_5.length === 0){alert("please type weightage in sub-FormB row 5.");  return false;}
   if(Tar_5.length === 0){alert("please type target in sub-FormB row 5.");  return false;}
   var Numfilter=/^[0-9. ]+$/; var test_numW = Numfilter.test(Wei_5); var test_numT = Numfilter.test(Tar_5);
   if(test_numW==false){ alert('Please Enter Only Numeric in the Weightage sub-FormB in row 5'); return false; }
   if(test_numT==false){ alert('Please Enter Only Numeric in the Target in sub-FormB row 5'); return false; }
  }
  
  var DPid=document.getElementById("DepartmentE").value; var Sts=document.getElementById("StsE").value;
  
  var agree=confirm("Are you sure you want to save the Sub-FormB?");
  if(agree && (Skill_1!='' || Skill_2!='' || Skill_3!='' || Skill_4!='' || Skill_5!=''))
  { 
    window.location="FormB.php?actsubformb=OkSubFormBEdit&DI="+document.getElementById("DI").value+"&BId="+document.getElementById("FormBId_"+k).value+"&MWei="+document.getElementById("Weightage_"+k).value+"&SBId1="+document.getElementById("SubFormBId_"+k+"_1").value+"&SBId2="+document.getElementById("SubFormBId_"+k+"_2").value+"&SBId3="+document.getElementById("SubFormBId_"+k+"_3").value+"&SBId4="+document.getElementById("SubFormBId_"+k+"_4").value+"&SBId5="+document.getElementById("SubFormBId_"+k+"_5").value+"&Skill1="+Skill_1+"&Skill2="+Skill_2+"&Skill3="+Skill_3+"&Skill4="+Skill_4+"&Skill5="+Skill_5+"&SkillD1="+SkillD_1+"&SkillD2="+SkillD_2+"&SkillD3="+SkillD_3+"&SkillD4="+SkillD_4+"&SkillD5="+SkillD_5+"&Wei1="+document.getElementById("WWei_a"+k+"_1").value+"&Wei2="+document.getElementById("WWei_a"+k+"_2").value+"&Wei3="+document.getElementById("WWei_a"+k+"_3").value+"&Wei4="+document.getElementById("WWei_a"+k+"_4").value+"&Wei5="+document.getElementById("WWei_a"+k+"_5").value+"&Tar1="+Tar_1+"&Tar2="+Tar_2+"&Tar3="+Tar_3+"&Tar4="+Tar_4+"&Tar5="+Tar_5+"&Log1="+document.getElementById("Log_a"+k+"_1").value+"&Log2="+document.getElementById("Log_a"+k+"_2").value+"&Log3="+document.getElementById("Log_a"+k+"_3").value+"&Log4="+document.getElementById("Log_a"+k+"_4").value+"&Log5="+document.getElementById("Log_a"+k+"_5").value+"&Per1="+document.getElementById("Per_a"+k+"_1").value+"&Per2="+document.getElementById("Per_a"+k+"_2").value+"&Per3="+document.getElementById("Per_a"+k+"_3").value+"&Per4="+document.getElementById("Per_a"+k+"_4").value+"&Per5="+document.getElementById("Per_a"+k+"_5").value+"&DPid="+DPid+"&Sts="+StsE;
  }
  else{return false;}

}
/**** Sub FormB open Sub FormB open **************************************/
                    
                                
</SCRIPT> 


</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //**************************************************************************?>
<?php //**********************START*****START*****START******START******START************************?>
<?php //************************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td width="350" class="heading">&nbsp;&nbsp;&nbsp;&nbsp;PMS - Behavioral Parameter(Form B)</td>
	  <td style="width:180px;">
          <select class="InputS" name="DepartmentE" id="DepartmentE" onChange="SelectDeptEmp(this.value)"><option value="" selected>Select Department</option><?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?></select>
	      <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
      </td>
	  <td>
	   <select class="InputS" name="StsE" id="StsE">
	    <option value="A" <?php if($_REQUEST['Sts']=='A'){echo 'selected';}?>>Active</option>
		<option value="D" <?php if($_REQUEST['Sts']=='D'){echo 'selected';}?>>Deactive</option>
	   </select>
	  </td>
	  <td class="font" style="width:200px;">&nbsp;<?php if($_REQUEST['DPid']){ $_SESSION['DPid']=$_REQUEST['DPid']; $Sql=mysql_query("select * from hrm_department where DepartmentId=".$_SESSION['DPid'], $con); $Res=mysql_fetch_assoc($Sql); echo $Res['DepartmentName']; } ?><input type="hidden" id="DI" value="<?php echo $_REQUEST['DPid']; ?>" /></td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php //if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:10px;" valign="top" align="center">&nbsp; </td>
<?php //**************** Open Department *********************************?> 
<td align="left" id="type" valign="top" style="display:block;width:100%">             
 <table border="0" width="100%">  
  <tr>
 <td align="Right">
 <table border="0" width="550">
  <tr>
   <td align="right">
   <?php if($_SESSION['User_Permission']=='Edit'){ ?>
   <?php if($_REQUEST['DPid']){ ?><input type="button" name="NewSave" id="NewSave" style="width:90px;" value="New" onClick="newsave(<?php echo $_SESSION['DPid']; ?>)" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/><?php } ?>
   <?php } ?>
   <input type="button" name="back" id="back" style="width:90px;" value="Back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
   <input type="button" name="Refrash" style="width:90px;" value="Refresh" onClick="javascript:window.location='FormB.php'"/>&nbsp;
   <script>function FunLog(){ window.open("viewlogic.php", "F", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1000,height=500");}</script><input type="button" style="width:90px;background-color:#99CC00;font-weight:bold;" value="Logic" onClick="FunLog()"/>
   </td>
  </tr>
 </table>
 </td>
</tr>
  <tr>
   <td align="left" width="100%">
   <table border="1" width="100%"  bgcolor="#FFFFFF" cellspacing="1">
    <tr bgcolor="#7a6189">
	 <td class="th" style="width:3%;">SNo</td>
	 <td class="th" style="width:20%;">Capability/Skill</td>
	 <td class="th" style="width:38%;">Description</td>
	 <td class="th" style="width:4%;">Group</td>
	 <td class="th" style="width:6%;">Weightage</td>
	 <td class="th" style="width:5%;">Logic</td>
	 <td class="th" style="width:5%;">Period</td>
     <td class="th" style="width:5%;">Target</td>
	 <td class="th" style="width:5%;">Status</td>
	 <td class="th" style="width:7%;">Action</td>
    </tr>
<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">
<tr>		  
 <td class="td"><?php echo $SNo; ?></td>
 <td><input class="InputTl" name="Skill" id="Skill"></td>
 <td><input class="InputTl" name="SkillComment" id="SkillComment"></td>
 <td><select class="InputS" id="GroupFor" name="GroupFor"><option value=""></option><option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option><option value="F">F</option><option value="G">G</option><option value="H">H</option><option value="I">I</option><option value="J">J</option><option value="K">K</option><option value="L">L</option><option value="M">M</option><option value="N">N</option><option value="O">O</option><option value="P">P</option><option value="Q">Q</option><option value="R">R</option><option value="S">S</option><option value="T">T</option><option value="U">U</option><option value="V">V</option><option value="W">W</option><option value="X">X</option><option value="Y">Y</option><option value="Z">Z</option></select></td>
 
 <td><input class="InputT" name="Weightage" id="Weightage"></td>
 <td><select class="InputS" id="Logic"><option value="Logic1">Logic1</option><option value="Logic2">Logic2</option>
 <!--<option value="Logic3">Logic3</option><option value="Logic4">Logic4</option><option value="Logic5">Logic5</option>-->
 </select></td>
 <td><select class="InputS" id="Period"><option value="Annual">Annually</option><option value="1/2 Annual">Half Yearly</option><option value="Quarter">Quarterly</option><!--<option value="Monthly">Monthly</option>-->
 </select></td>
 
 <td><input class="InputT" name="Target" id="Target"></td>		
 <td><select class="InputS" name="SkillStatus" id="SkillStatus"><option value="A">Active</option><option value="D">Deactive</option></select></td>
 <td class="td"><?php if($_SESSION['User_Permission']=='Edit'){ ?><input type="submit" name="SaveNew"  value="" class="SaveButton"><?php } ?></td>
</tr>
</form>
<?php } ?>	
	
	
<?php if($_REQUEST['DPid']){ $_SESSION['DPid']=$_REQUEST['DPid']; ?>			 
 <?php $sqlPer=mysql_query("select * from hrm_pms_formb where SkillStatus='".$_REQUEST['Sts']."' AND CompanyId=".$CompanyId." AND DepartmentId=".$_REQUEST['DPid'], $con); $SNo=1; while($resPer=mysql_fetch_array($sqlPer)) {
      if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$resPer['FormBId']){ ?><form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
<tr>
 <td class="td"><?php echo $SNo; ?></td>
 <td><input class="InputTl" name="Skill" id="Skill" value="<?php echo ucwords(strtolower($resPer['Skill'])); ?>"></td>
 <td><input class="InputTl" name="SkillComment" id="SkillComment" value="<?php echo $resPer['SkillComment']; ?>"></td>
 <td><select class="InputS" id="GroupFor" name="GroupFor"><option value="" <?php if($resPer['GroupFor']==''){echo 'selected';}?>></option><option value="A" <?php if($resPer['GroupFor']=='A'){echo 'selected';}?>>A</option><option value="B" <?php if($resPer['GroupFor']=='B'){echo 'selected';}?>>B</option><option value="C" <?php if($resPer['GroupFor']=='C'){echo 'selected';}?>>C</option><option value="D" <?php if($resPer['GroupFor']=='D'){echo 'selected';}?>>D</option><option value="E" <?php if($resPer['GroupFor']=='E'){echo 'selected';}?>>E</option><option value="F" <?php if($resPer['GroupFor']=='F'){echo 'selected';}?>>F</option><option value="G" <?php if($resPer['GroupFor']=='G'){echo 'selected';}?>>G</option><option value="H" <?php if($resPer['GroupFor']=='H'){echo 'selected';}?>>H</option><option value="I" <?php if($resPer['GroupFor']=='I'){echo 'selected';}?>>I</option><option value="J" <?php if($resPer['GroupFor']=='J'){echo 'selected';}?>>J</option><option value="K" <?php if($resPer['GroupFor']=='K'){echo 'selected';}?>>K</option><option value="L" <?php if($resPer['GroupFor']=='L'){echo 'selected';}?>>L</option><option value="M" <?php if($resPer['GroupFor']=='M'){echo 'selected';}?>>M</option><option value="N" <?php if($resPer['GroupFor']=='N'){echo 'selected';}?>>N</option><option value="O" <?php if($resPer['GroupFor']=='O'){echo 'selected';}?>>O</option><option value="P" <?php if($resPer['GroupFor']=='P'){echo 'selected';}?>>P</option><option value="Q" <?php if($resPer['GroupFor']=='Q'){echo 'selected';}?>>Q</option><option value="R" <?php if($resPer['GroupFor']=='R'){echo 'selected';}?>>R</option><option value="S" <?php if($resPer['GroupFor']=='S'){echo 'selected';}?>>S</option><option value="T" <?php if($resPer['GroupFor']=='T'){echo 'selected';}?>>T</option><option value="U" <?php if($resPer['GroupFor']=='U'){echo 'selected';}?>>U</option><option value="V" <?php if($resPer['GroupFor']=='V'){echo 'selected';}?>>V</option><option value="W" <?php if($resPer['GroupFor']=='W'){echo 'selected';}?>>W</option><option value="X" <?php if($resPer['GroupFor']=='X'){echo 'selected';}?>>X</option><option value="Y" <?php if($resPer['GroupFor']=='Y'){echo 'selected';}?>>Y</option><option value="Z" <?php if($resPer['GroupFor']=='Z'){echo 'selected';}?>>Z</option></select></td>
 
 
 <td><input class="InputT" name="Weightage" id="Weightage" value="<?php echo $resPer['Weightage'];?>"></td>
 <td><select class="InputS" id="Logic" name="Logic"><option value="<?php echo $resPer['Logic']; ?>" selected><?php echo $resPer['Logic']; ?></option><option value="Logic1">Logic1</option><option value="Logic2">Logic2</option>
 <!--<option value="Logic3">Logic3</option><option value="Logic4">Logic4</option><option value="Logic5">Logic5</option>-->
 </select></td>
 <td><select class="InputS" id="Period" name="Period"><option value="<?php echo $resPer['Period']; ?>" selected><?php if($resPer['Period']=='Annual'){echo 'Annually';}elseif($resPer['Period']=='1/2 Annual'){echo 'Half Yearly';}elseif($resPer['Period']=='Quarter'){echo 'Quarterly';}elseif($resPer['Period']=='Monthly'){echo 'Monthly';} ?></option><option value="Annual">Annually</option><option value="1/2 Annual">Half Yearly</option><option value="Quarter">Quarterly</option>
 <!--<option value="Monthly">Monthly</option>-->
 </select></td>
 <td><input class="InputT" name="Target" id="Target" value="<?php echo $resPer['Target']; ?>"></td>    
 <td><select class="InputS" name="SkillStatus" id="SkillStatus"><option value="<?php echo $resPer['SkillStatus']; ?>"><?php if($resPer['SkillStatus']=='A'){ echo 'Active'; } else { echo 'Deactive';} ?></option>
<option value="<?php if($resPer['SkillStatus']=='A'){ echo 'D'; } else { echo 'A';} ?>"><?php if($resPer['SkillStatus']=='A'){ echo 'Deactive'; } else { echo 'Active';} ?></option></select></td>	
 <td class="td"><?php if($_SESSION['User_Permission']=='Edit'){ ?><input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;<input type="hidden" name="FormBId" id="FormBId" value="<?php echo $_REQUEST['eid']; ?>"/><?php } ?></td>
</tr>
</form>	 
<?php } else { $sSubB=mysql_query("select * from hrm_pms_formbsub where FormBId=".$resPer['FormBId']." AND BSubStatus='A' order by FormBSubId ASC",$con); $rowSubB=mysql_num_rows($sSubB); ?>	 
<tr>
 <td class="td" style="text-align:center;"><?php echo $SNo; ?><br>
 <?php /*
 <span style="cursor:pointer;"><img src="images/open-folder.png" style="height:12px;display:<?php if($rowSubB>0){echo 'block';}else{echo 'none';}?>;" onClick="FunSubC(<?php echo $SNo; ?>)" id="SpanO<?php echo $SNo; ?>"/><img src="images/close-folder.png" style="height:12px;display:<?php if($rowSubB>0){echo 'none';}else{echo 'block';}?>;" onClick="FunSubO(<?php echo $SNo; ?>)" id="SpanC<?php echo $SNo; ?>"/></span>
 */ ?>
 </td>
 <td class="tdl">&nbsp;<?php echo ucwords(strtolower($resPer['Skill'])); ?></td>
 <td class="tdl">&nbsp;<?php echo $resPer['SkillComment']; ?></td>
 <td class="tdl" style="text-align:center;">&nbsp;<?php echo $resPer['GroupFor']; ?></td>
 
 
 <td class="td"><?php echo $resPer['Weightage']; ?><input type="hidden" id="Weightage_<?php echo $SNo; ?>" value="<?php echo $resPer['Weightage']; ?>" readonly/></td>
 <td class="td"><?php echo $resPer['Logic']; ?></td>
 <td class="td"><?php if($resPer['Period']=='Annual'){echo 'Annually';}elseif($resPer['Period']=='1/2 Annual'){echo 'Half Yearly';}elseif($resPer['Period']=='Quarter'){echo 'Quarterly';}//elseif($resPer['Period']=='Monthly'){echo 'Monthly';} ?></td>
 
 <td class="td" style="color:<?php if($resPer['Period']!='Annual' AND $resPer['Period']!=''){ echo '#000099'; }?>;"><?php echo $resPer['Target']; ?></td>
 <td class="td"><?php if($resPer['SkillStatus']=='A'){ echo 'Active'; } else { echo 'Deactive';} ?></td>
 <td class="td"><?php if($_SESSION['User_Permission']=='Edit'){ ?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resPer['FormBId'].','.$_SESSION['DPid']; ?>)"></a>
 &nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $resPer['FormBId'].','.$_SESSION['DPid']; ?>)"></a><?php } ?></td>
</tr>


<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
<?php $sSubB=mysql_query("select * from hrm_pms_formbsub where FormBId=".$resPer['FormBId']." AND BSubStatus='A' order by FormBSubId ASC",$con); $rowSubB=mysql_num_rows($sSubB); ?>   
 <tr>
  <td colspan="9" align="right" style="border:hidden;border-style:none;">
  <div id="Div<?php echo $SNo; ?>" style="display:<?php if($rowSubB>0){echo 'block';}else{echo 'none';} ?>;">
     <table style="width:97%;background-color:#D5AAAA;" border="0" cellpadding="0" cellspacing="1"> 
     <tr style="background-color:#D5AAAA;">   
	 <td align="center" class="Input2a" style="width:45px;"></td>
     <td align="center" class="Input2a" style="width:30px;">SNo</td>
     <td align="center" class="Input2a" style="width:280px;">Sub Skill</td>
     <td align="center" class="Input2a" style="width:390px;">Sub Skill Description</td>  
     <td align="center" class="Input2a" style="width:60px;">Weightage</td>
	 <td align="center" class="Input2a" style="width:70px;">Logic</td>
	 <td align="center" class="Input2a" style="width:80px;">Period</td>
     <td align="center" class="Input2a" style="width:60px;">Target</td>
     </tr>
<?php if($rowSubK==0){$num=5;}elseif($rowSubK==1){$num=4;}elseif($rowSubK==2){$num=3;}elseif($rowSubK==3){$num=2;}elseif($rowSubK==4){$num=1;}elseif($rowSubK==5){$num=0;} ?>

<?php /* While Open*/ $m=1; while($rSubB=mysql_fetch_assoc($sSubB)){ ?>

  <input type="hidden" id="FormBId_<?php echo $SNo; ?>" value="<?php echo $resPer['FormBId']; ?>" />
  <input type="hidden" id="SubFormBId_<?php echo $SNo.'_'.$m; ?>" value="<?php echo $rSubB['FormBSubId']; ?>" />
  <tr style="background-color:#FFFFFF;">
  <?php if($m==1){ ?>
   <td rowspan="5" style="background-color:#D5AAAA;" valign="middle" align="center" class="Input2a"><input type="button" style="width:45px;text-align:center;" value="save" onClick="SaveFormB(<?php echo $SNo.','.$m ?>)"/></td>
   <?php } ?>   
  <td align="center"><input class="Inputa" style="text-align:center;font-weight:bold;" value="<?php if($m==1){$n='a';}elseif($m==2){$n='b';}elseif($m==3){$n='c';}elseif($m==4){$n='d';}elseif($m==5){$n='e';}echo $n; ?>" readonly/><input type="hidden" id="FormBIdNo_a<?php echo $SNo.'_'.$m; ?>"></td>
  <td align="center"><input id="Skill_a<?php echo $SNo.'_'.$m; ?>" class="Inputa" value="<?php echo $rSubB['Skill']; ?>" maxlength="348" /></td>
  <td align="center"><input id="SkillDes_a<?php echo $SNo.'_'.$m; ?>" class="Inputa" value="<?php echo $rSubB['SkillComment']; ?>" maxlength="580"/></td>  
  
  <td align="center"><input type="hidden" id="WWei_a<?php echo $SNo.'_'.$m; ?>" value="<?php echo $rSubB['Weightage']; ?>"/>
  <input id="Wei_a<?php echo $SNo.'_'.$m; ?>" class="Inputa" value="<?php echo $rSubB['Weightage']; ?>" style="text-align:center;" maxlength="8" onChange="ChangeWeighta(<?php echo $SNo.', '.$m; ?>)"/></td>
  
  <td align="center" style="background-color:#CAE4FF;"><select id="Log_a<?php echo $SNo.'_'.$m; ?>" class="Inputa" style="height:20px;"><option value="<?php echo $rSubB['Logic']; ?>" selected><?php echo $rSubB['Logic']; ?></option><option value="Logic1">Logic1</option><option value="Logic2">Logic2</option><option value="Logic3">Logic3</option><option value="Logic4">Logic4</option><option value="Logic5">Logic5</option></select></td>
  <td align="center" style="background-color:#CAE4FF;"><select id="Per_a<?php echo $SNo.'_'.$m; ?>" class="Inputa" style="height:20px;"><option value="<?php echo $rSubB['Period']; ?>" selected><?php if($rSubB['Period']=='Annual'){echo 'Annually';}elseif($rSubB['Period']=='1/2 Annual'){echo 'Half Yearly';}elseif($rSubB['Period']=='Quarter'){echo 'Quarterly';} ?></option><option value="Annual">Annually</option><option value="1/2 Annual">Half Yearly</option><option value="Quarter">Quarterly</option>
  <?php //elseif($rSubB['Period']=='Monthly'){echo 'Monthly';} ?>
  <!--<option value="Monthly">Monthly</option>-->
  </select></td>
  
  <td align="center"><input type="hidden" id="TTar_a<?php echo $SNo.'_'.$m; ?>" value="0"/>
  <input id="Tar_a<?php echo $SNo.'_'.$m; ?>" class="Inputa" value="<?php echo $rSubB['Target']; ?>" style="text-align:center;color:<?php if($rSubB['Period']!='Annual' AND $rSubB['Period']!=''){ echo '#000099'; }?>;" value="<?php echo $rSubB['Target']; ?>" maxlength="8" /></td>
  
</tr> 
<?php $m++;} ?>	
<?php /* While Close*/ ?>	
<?php for($mm=$m; $mm<=5; $mm++){ ?>
  <input type="hidden" id="FormBId_<?php echo $SNo; ?>" value="<?php echo $resPer['FormBId']; ?>" />
  <input type="hidden" id="SubFormBId_<?php echo $SNo.'_'.$mm; ?>" value="" />
  <tr style="background-color:#FFFFFF;">
  <?php if($mm==1){ ?>
   <td rowspan="5" style="background-color:#D5AAAA;" valign="middle" align="center" class="Input2a"><input type="button" style="width:45px;text-align:center;" value="save" onClick="SaveFormB(<?php echo $SNo.','.$mm; ?>)"/></td>
   <?php } ?>   
  <td align="center"><input class="Inputa" style="text-align:center;font-weight:bold;" value="<?php if($mm==1){$n='a';}elseif($mm==2){$n='b';}elseif($mm==3){$n='c';}elseif($mm==4){$n='d';}elseif($mm==5){$n='e';}echo $n; ?>" readonly/><input type="hidden" id="FormBIdNo_a<?php echo $SNo.'_'.$m; ?>"></td>
  <td align="center"><input id="Skill_a<?php echo $SNo.'_'.$mm; ?>" class="Inputa" maxlength="348" /></td>
  <td align="center"><input id="SkillDes_a<?php echo $SNo.'_'.$mm; ?>" class="Inputa" maxlength="580"/></td>  
  
  <td align="center"><input type="hidden" id="WWei_a<?php echo $SNo.'_'.$mm; ?>" value="0"/>
  <input id="Wei_a<?php echo $SNo.'_'.$mm; ?>" class="Inputa" style="text-align:center;" maxlength="8" onChange="ChangeWeighta(<?php echo $SNo.', '.$mm; ?>)"/></td>
  
  <td align="center" style="background-color:#CAE4FF;"><select id="Log_a<?php echo $SNo.'_'.$mm; ?>" class="Inputa" style="height:20px;"><option value="Logic1">Logic1</option><option value="Logic2">Logic2</option>
  <!--<option value="Logic3">Logic3</option><option value="Logic4">Logic4</option><option value="Logic5">Logic5</option>-->
  </select></td>
  <td align="center" style="background-color:#CAE4FF;"><select id="Per_a<?php echo $SNo.'_'.$mm; ?>" class="Inputa" style="height:20px;"><option value="Annual">Annually</option><option value="1/2 Annual">Half Yearly</option>
  <option value="Quarter">Quarterly</option><!--<option value="Monthly">Monthly</option>-->
  </select></td>
  
  <td align="center"><input type="hidden" id="TTar_a<?php echo $SNo.'_'.$mm; ?>" value="0"/>
  <input id="Tar_a<?php echo $SNo.'_'.$mm; ?>" class="Inputa" style="text-align:center;" maxlength="8" onChange="ChangeTargeta(<?php echo $SNo.', '.$mm; ?>)" value="100" /></td>
  
</tr> 
<?php } ?>	 
     </table>
  </div> 
  </td>
 </tr>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?> 
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?> 



<?php } $SNo++; } } ?>

	 </table>
  </td>
</tr>

 



<script>
 

</script>
  </table>  
 </td>
<?php //************ Close Departmen t********************?>    

 </tr>
<?php //} ?> 
</table>
		
<?php //********************************************************** ?>
<?php //***************END*****END*****END******END******END*************** ?>
<?php //************************************************************************* ?>
		
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
