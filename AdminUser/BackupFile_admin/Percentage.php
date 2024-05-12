<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************************************************************************************************
if(isset($_POST['SaveNew']))
{  $SqlInseart = mysql_query("INSERT INTO hrm_pms_percentage(Year,GradeFrom,GradeTo,PerOfFormAKra_WeighScore,PerOfFormBBehavi_WeighScore,CompanyId,CreatedBy,CreatedDate,YearId) VALUES('".date("Y")."',".$_POST['GradeFrom'].", ".$_POST['GradeTo'].", ".$_POST['PerOfFormAKra'].", ".$_POST['PerOfFormBBehavi'].", ".$CompanyId.", ".$UserId.", '".date('Y-m-d')."', ".$YearId.")", $con); 
   if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
}
if(isset($_POST['SaveEdit']))
{
	 $SqlUpdate = mysql_query("UPDATE hrm_pms_percentage SET Year='".date("Y")."', GradeFrom=".$_POST['GradeFrom'].", GradeTo=".$_POST['GradeTo'].", PerOfFormAKra_WeighScore=".$_POST['PerOfFormAKra'].", PerOfFormBBehavi_WeighScore='".$_POST['PerOfFormBBehavi']."' WHERE PercentageId=".$_POST['PercentageId'], $con) or die(mysql_error());
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
  
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
  $SqlDelete=mysql_query("UPDATE hrm_pms_percentage SET AppStatus='De' WHERE PercentageId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg = "Data has been deleted successfully..."; }
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:100px;} .font1 { font-family:Times New Roman; font-size:11px; height:14px; width:100px; } 
.font2 { font-size:11px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:11px; width:120px; height:18px;}
.EditInput { font-family:Georgia; font-size:11px; width:100px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script>
function SelectYear(v){window.location='Percentage.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&ey='+v;}
function edit(value,ey) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "Percentage.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=edit&eid="+value+"&ey="+ey;  window.location=x;}}
function del(value,ey) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "Percentage.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=delete&did="+value+"&ey="+ey;  window.location=x;}}
function newsave(ey) { var x = "Percentage.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=newsave&ey="+ey;  window.location=x;}


function validateEdit(formEdit){
  //var HolidayName = formEdit.HolidayName.value;  var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(HolidayName);
  //if (HolidayName.length === 0) { alert("You must enter a HolidayName Name.");  return false; }
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Holiday Name Field');  return false; }	

  var GradeFrom = formEdit.GradeFrom.value; var Numfilter=/^[0-9 ]+$/;  var test_num = Numfilter.test(GradeFrom)
  if (GradeFrom==0) { alert("please select Grade From field.");  return false; }
  if(test_num==false) { alert('Please Enter Only Number in the Grade From field');  return false; } 
  
  var GradeTo = formEdit.GradeTo.value; var Numfilter=/^[0-9 ]+$/;  var test_num1 = Numfilter.test(GradeTo)
  if (GradeTo==0) { alert("please select Grade To field.");  return false; }
  if(test_num1==false) { alert('Please Enter Only Number in the Grade To field');  return false; } 
  
  var PerOfFormAKra = formEdit.PerOfFormAKra.value; var Numfilter=/^[0-9 ]+$/;  var test_num2 = Numfilter.test(PerOfFormAKra)
  if (PerOfFormAKra.length === 0) { alert("please enter Form A field.");  return false; }
  if(test_num2==false) { alert('Please Enter Only Number in the form A field');  return false; } 
  
  var PerOfFormBBehavi = formEdit.PerOfFormBBehavi.value; var Numfilter=/^[0-9 ]+$/;  var test_num3 = Numfilter.test(PerOfFormBBehavi)
  if (PerOfFormBBehavi.length === 0) { alert("please enter Form B field.");  return false; }
  if(test_num3==false) { alert('Please Enter Only Number in the Form B field');  return false; } 

}
                                
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
<?php //**********************************************************************************?>
<?php //*************START*****START*****START******START******START********************?>
<?php //*****************************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td width="350" class="heading">PMS - Allow Percentage of Weightage</td>
	  <?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['ey']."", $con); $rY=mysql_fetch_assoc($sY); 
      $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>	     
    <td class="td1" style="font-size:14px;width:170px;font-family:Times New Roman;" >&nbsp;&nbsp;<b>Year:</b>&nbsp;<select style="font-size:12px; width:115px; background-color:#DDFFBB;" name="YearID" id="YearID" onChange="SelectYear(this.value)"><option value="<?php echo $_REQUEST['ey']; ?>" style="margin-left:0px;" selected><?php echo $PRD; if($_REQUEST['ey']>5){ echo ' - Y'; } ?></option>
<?php for($i=$YearId; $i>=1; $i--){	
	  $s2Y=mysql_query("select * from hrm_year where YearId=".$i,$con); $r2Y=mysql_fetch_assoc($s2Y);
	  $FD2=date("Y",strtotime($r2Y['FromDate'])); $TD2=date("Y",strtotime($r2Y['ToDate'])); ?>
<?php if($_REQUEST['ey']!=$i){ ?><option value="<?php echo $i; ?>"><?php echo $FD2.'-'.$TD2; if($i>5){ echo ' - Y'; } ?></option><?php } ?>
<?php } ?></select>
   </td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(( $_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>
 
<?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="0" width="650">
    <tr>

  </tr>
	<tr>
	  <td align="left" width="650">
	     <table border="1" width="650" border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#7a6189">
		   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
		   <td class="font" valign="top" align="center"><b>Grade From</b></td>
		   <td class="font" valign="top" align="center"><b>Grade To</b></td>
 		   <td class="font" valign="top" align="center"><b>Form A /(KRA)% </b></td>
		   <td class="font" valign="top" align="center"><b>Form B % </b></td>
		   <td valign="top" align="center" style="font:Georgia; font-size:11px; width:100px; color:#FFFFFF"><b>Action</b></td>
		 </tr>
      <?php $sqlPer=mysql_query("select * from hrm_pms_percentage where AppStatus='A' AND CompanyId=".$CompanyId." AND YearId=".$_REQUEST['ey'], $con); $SNo=1; while($resPer=mysql_fetch_array($sqlPer)) {
      if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$resPer['PercentageId']){ ?>
	      <form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
          <tr>
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
		   <td class="font" align="left"><select name="GradeFrom" id="GradeFrom" class="EditInput">
		         <option value="<?php echo $resPer['GradeFrom']; ?>">&nbsp;<?php echo $resPer['GradeFrom']; ?></option>
<?php $sqlG=mysql_query("select * from hrm_grade where CompanyId=".$CompanyId." order by GradeId ASC", $con); while($resG=mysql_fetch_array($sqlG)) { ?>
                 <option value="<?php echo $resG['GradeId']; ?>">&nbsp;<?php echo $resG['GradeValue']; ?></option><?php } ?></select></td>
		   <td class="font" align="left"><select name="GradeTo" id="GradeTo" class="EditInput">
		         <option value="<?php echo $resPer['GradeTo']; ?>">&nbsp;<?php echo $resPer['GradeTo']; ?></option>
<?php $sqlG1=mysql_query("select * from hrm_grade where CompanyId=".$CompanyId." order by GradeId ASC", $con); while($resG1=mysql_fetch_array($sqlG1)) { ?>
                 <option value="<?php echo $resG1['GradeId']; ?>">&nbsp;<?php echo $resG1['GradeValue']; ?></option><?php } ?></select></td>
		   <td class="font" align="left"><input name="PerOfFormAKra" id="PerOfFormAKra" class="EditInput" maxlength="3" value="<?php echo $resPer['PerOfFormAKra_WeighScore']; ?>"></td>
		   <td class="font" align="left"><input name="PerOfFormBBehavi" id="PerOfFormBBehavi" class="EditInput" maxlength="3" value="<?php echo $resPer['PerOfFormBBehavi_WeighScore']; ?>"></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:100px;"><input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" /> 
<?php if($_SESSION['User_Permission']=='Edit'){ ?> 
		 &nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;<input type="hidden" name="PercentageId" id="PercentageId" value="<?php echo $_REQUEST['eid']; ?>"/>
<?php } ?>
		   </td>
		 </tr>
		 </form>
		 
<?php } else { ?>	 
		  <tr>
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
<?php $sqlG2=mysql_query("select GradeValue from hrm_grade where CompanyId=".$CompanyId." AND GradeId=".$resPer['GradeFrom'], $con); $resG2=mysql_fetch_array($sqlG2); ?>		   
		   <td class="font1" align="left">&nbsp;<?php echo $resG2['GradeValue']; ?></td>
<?php $sqlG3=mysql_query("select GradeValue from hrm_grade where CompanyId=".$CompanyId." AND GradeId=".$resPer['GradeTo'], $con); $resG3=mysql_fetch_array($sqlG3); ?>		   
		   <td class="font1" align="left">&nbsp;<?php echo $resG3['GradeValue']; ?></td>
 		   <td class="font1" align="left">&nbsp;<?php echo $resPer['PerOfFormAKra_WeighScore']; ?></td>
		   <td class="font1" align="left">&nbsp;<?php echo $resPer['PerOfFormBBehavi_WeighScore']; ?></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:100px;">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
			 <a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resPer['PercentageId'].', '.$_REQUEST['ey']; ?>)"></a>
			 &nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $resPer['PercentageId'].', '.$_REQUEST['ey']; ?>)"></a>
<?php } ?>
		   </td>
		 </tr>
<?php } $SNo++;} ?>
         <tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>
		 <?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
		 <form name="formEdit" method="post" onSubmit="return validateEdit(this)">
	     <tr>
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
<td class="font" align="left"><select name="GradeFrom" id="GradeFrom" class="EditInput">
		         <option value="0">&nbsp;Select</option>
<?php $sqlG=mysql_query("select * from hrm_grade where CompanyId=".$CompanyId." order by GradeId ASC", $con); while($resG=mysql_fetch_array($sqlG)) { ?>
                 <option value="<?php echo $resG['GradeId']; ?>">&nbsp;<?php echo $resG['GradeValue']; ?></option><?php } ?></select></td>
		   <td class="font" align="left"><select name="GradeTo" id="GradeTo" class="EditInput">
		         <option value="0">&nbsp;Select</option>
<?php $sqlG1=mysql_query("select * from hrm_grade where CompanyId=".$CompanyId." order by GradeId ASC", $con); while($resG1=mysql_fetch_array($sqlG1)) { ?>
                 <option value="<?php echo $resG1['GradeId']; ?>">&nbsp;<?php echo $resG1['GradeValue']; ?></option><?php } ?></select></td>
		  
		   <td class="font1" align="left"><input name="PerOfFormAKra" id="PerOfFormAKra" class="EditInput" maxlength="3" value=""></td>
		   <td class="font1" align="left"><input name="PerOfFormBBehavi" id="PerOfFormBBehavi" maxlength="3" class="EditInput" value=""></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:100px;">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
			 &nbsp;<input type="submit" name="SaveNew"  value="" class="SaveButton">&nbsp;
<?php } ?>
		   </td>
		 </tr>
		 </form>
		 <?php } ?>
		 </table>
	  </td>
    </tr>
<?php if($_SESSION['User_Permission']=='Edit'){ ?>	  
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr><td align="right">
		<input type="button" name="NewSave" id="NewSave" value="New" onClick="newsave(<?php echo $_REQUEST['ey']; ?>)" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/>
		<input type="button" name="back" id="back" style="width:90px;" value="Back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
		<input type="button" name="Refresh" value="Refresh" onClick="javascript:window.location='Percentage.php?ey=<?php echo $_REQUEST['ey']; ?>'"/>&nbsp;
			     </td>
		</tr></table>
      </td>
   </tr>
<?php } ?>
  </table>  
</td>
<?php //*********************** Close Department*************************************?>    

 </tr>
<?php } ?> 
</table>
		
<?php //******************************************************************************?>
<?php //****************END*****END*****END******END******END***********************************?>
<?php //************************************************************************?>
		
	  </td>
	</tr>
	
	<!--<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php /* require_once("../footer.php"); */ ?>
	  </td>
	</tr>-->
  </table>
 </td>
</tr>
</table>
</body>
</html>
