<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************************************************************
if(isset($_POST['SaveNew']))

{ $SqlInseart = mysql_query("INSERT INTO hrm_pms_rating(YearId,ScoreFrom,ScoreTo,Rating,RatingName,CompanyId,CreatedBy,CreatedDate) VALUES(".$_POST['ey'].",".$_POST['ScoreFrom'].", ".$_POST['ScoreTo'].", ".$_POST['Rating'].", '".$_POST['RatingName']."', ".$CompanyId.", ".$UserId.", '".date('Y-m-d')."')", $con); 
  $SqlInseart_2 = mysql_query("INSERT INTO hrm_pms_normalrating_dis(YearId,Rating,CompanyId,CreatedBy,CreatedDate) VALUES(".$_POST['ey'].", ".$_POST['Rating'].", ".$CompanyId.", ".$UserId.", '".date('Y-m-d')."')", $con); 
  $SqlInseart_3 = mysql_query("INSERT INTO hrm_pms_increment_dis(YearId,Rating,CompanyId,CreatedBy,CreatedDate) VALUES(".$_POST['ey'].", ".$_POST['Rating'].", ".$CompanyId.", ".$UserId.", '".date('Y-m-d')."')", $con); 
   if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
}

if(isset($_POST['SaveEdit']))
{ 
 $Sql2=mysql_query("Select * from hrm_pms_rating WHERE RatingId=".$_POST['RatingId']." AND YearId=".$YearId." AND CompanyId=".$CompanyId, $con); 
 $Rows = mysql_num_rows($Sql2); 
 if($Rows>0) 
 { $SqlUpdate = mysql_query("UPDATE hrm_pms_rating SET ScoreFrom=".$_POST['ScoreFrom'].", ScoreTo=".$_POST['ScoreTo'].", Rating=".$_POST['Rating'].", RatingName='".$_POST['RatingName']."', CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' WHERE RatingId=".$_POST['RatingId'], $con) or die(mysql_error());  
   if($SqlUpdate){$msg="Data has been Updeted successfully...";}
 }
 if($Rows==0)
 { 
 $Sql3=mysql_query("update hrm_pms_rating set RatingStatus='D' WHERE RatingId='".$_POST['RatingId']."' AND CompanyId=".$CompanyId, $con);
    if($Sql3)
    { $Sql4=mysql_query("INSERT INTO hrm_pms_rating(YearId,ScoreFrom,ScoreTo,Rating,RatingName,CompanyId,CreatedBy,CreatedDate) VALUES(".$_POST['ey'].", ".$_POST['ScoreFrom'].", ".$_POST['ScoreTo'].", ".$_POST['Rating'].", '".$_POST['RatingName']."', ".$CompanyId.", ".$UserId.", '".date("Y-m-d")."')", $con); 
	}
 }
 if($Sql4){ $msg = "Data has been Updeted successfully...";}
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
  $SqlDelete=mysql_query("UPDATE hrm_pms_rating SET RatingStatus='De' WHERE RatingId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg = "Data has been deleted successfully..."; }
}


if(isset($_POST['SaveAbove']))
{ $Sql=mysql_query("Select * from hrm_abovebelow_rating WHERE YearId=".$_POST['ey']." AND CompanyId=".$CompanyId, $con); $Rows = mysql_num_rows($Sql); 
  if($Rows>0)
  { $SqlA=mysql_query("UPDATE hrm_abovebelow_rating SET AScore=".$_POST['Above'].", ARating=".$_POST['AboveRating'].", ARatingName='".$_POST['AboveRatingName']."' WHERE YearId=".$_POST['ey']." AND CompanyId=".$CompanyId, $con) or  die(mysql_error()); }
  elseif($Rows==0)
  { $SqlA=mysql_query("INSERT INTO hrm_abovebelow_rating(AScore, ARating, ARatingName, CompanyId, YearId) values(".$_POST['Above'].", ".$_POST['AboveRating'].", '".$_POST['AboveRatingName']."', ".$CompanyId.", ".$_POST['ey'].")", $con) or  die(mysql_error()); }
  if($SqlA) { $msg = "Data save successfully..."; }
}

if(isset($_POST['SaveBelow']))
{ $Sql=mysql_query("Select * from hrm_abovebelow_rating WHERE YearId=".$_POST['ey']." AND CompanyId=".$CompanyId, $con); $Rows = mysql_num_rows($Sql); 
  if($Rows>0)
  { $SqlA=mysql_query("UPDATE hrm_abovebelow_rating SET BScore=".$_POST['Below'].", BRating=".$_POST['BelowRating'].", BRatingName='".$_POST['BelowRatingName']."' WHERE YearId=".$_POST['ey']." AND CompanyId=".$CompanyId, $con) or  die(mysql_error()); }
  elseif($Rows==0)
  { $SqlA=mysql_query("INSERT INTO hrm_abovebelow_rating(BScore, BRating, BRatingName, CompanyId, YearId) values(".$_POST['Below'].", ".$_POST['BelowRating'].", '".$_POST['BelowRatingName']."', ".$CompanyId.", ".$_POST['ey'].")", $con) or  die(mysql_error()); }
  if($SqlB) { $msg = "Data save successfully..."; }
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> 
.th{ font-family:Times New Roman;font-size:12px;height:25px;text-align:center;color:#FFFFFF;font-weight:bold; }
.tdl{ font-family:Times New Roman;font-size:12px;text-align:left; }
.tdc{ font-family:Times New Roman;font-size:12px;text-align:center; }
.tdinput{ font-family:Times New Roman;font-size:14px;text-align:center;width:100%; border:hidden; }
.tdinputl{ font-family:Times New Roman;font-size:14px;text-align:left;width:100%; border:hidden; }
.tdsel{ font-family:Times New Roman;font-size:14px;text-align:left;}
.inner_table{height:500px;overflow-y:auto;width:auto;}
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:11px; width:120px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; width:100px; height:20px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script>
function SelectYear(v){window.location='Rating.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&ey='+v;}
function edit(value,ey) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "Rating.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=edit&eid="+value+"&ey="+ey;  window.location=x;}}
function del(value,ey) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "Rating.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=delete&did="+value+"&ey="+ey;  window.location=x;}}
function newsave(ey) { var x = "Rating.php?action=newsave&ey="+ey;  window.location=x;}

function validateEdit(formEdit){
  //var HolidayName = formEdit.HolidayName.value;  var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(HolidayName);
  //if (HolidayName.length === 0) { alert("You must enter a HolidayName Name.");  return false; }
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Holiday Name Field');  return false; }	

  var ScoreFrom = formEdit.ScoreFrom.value; var Numfilter=/^[0-9. ]+$/;  var test_num = Numfilter.test(ScoreFrom)
  if (ScoreFrom.length === 0) { alert("please select Score From field.");  return false; }
  if(test_num==false) { alert('Please Enter Only Number in the Score From field');  return false; } 

  var ScoreTo = formEdit.ScoreTo.value; var Numfilter=/^[0-9. ]+$/;  var test_num1 = Numfilter.test(ScoreTo)
  if (ScoreTo.length === 0) { alert("please select Score To field.");  return false; }
  if(test_num1==false) { alert('Please Enter Only Number in the Score To field');  return false; } 

  var Rating = formEdit.Rating.value; var Numfilter=/^[0-9. ]+$/;  var test_num1 = Numfilter.test(Rating)
  if (Rating.length === 0) { alert("please select Rating field.");  return false; }
  if(test_num1==false) { alert('Please Enter Only Number in the Rating field');  return false; } 

  var RatingName = formEdit.RatingName.value;  var filter=/^[a-zA-Z. /]+$/; var test_bool4 = filter.test(RatingName);
  if (RatingName.length === 0) { alert("please enter Rating Name field.");  return false; } 
  if(test_bool4==false) { alert('Please Enter Only Alphabets in the Rating name Field');  return false; } 
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
<?php //************************************************************************************?>
<?php //****************START*****START*****START******START******START*************************?>
<?php //*****************************************************************************?>

<table border="0" style="margin-top:0px; width:100%; height:300px;">
<?php if(( $_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 
 <tr>
  <td style="width:2px;">&nbsp;</td>
  <td width="150" class="heading">PMS - Rating</td>
 
  <input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" />  
  <?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['ey']."", $con); $rY=mysql_fetch_assoc($sY); 
        $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>	     
  <td class="td1" style="font-size:14px;width:180px;font-family:Times New Roman;" >&nbsp;&nbsp;<b>Year:</b>&nbsp;
	<select class="tdsel" style="background-color:#DDFFBB;width:115px;" name="YearID" id="YearID" onChange="SelectYear(this.value)"><?php if($_REQUEST['ey']!=''){ $SqlY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['ey'], $con); $ResY=mysql_fetch_array($SqlY); ?><option value="<?php echo $ResY['YearId']; ?>"><?php echo date("Y",strtotime($ResY['FromDate'])).'-'.date("Y",strtotime($ResY['ToDate'])); if($ResY['YearId']>5){ echo ' - Y'; }?></option><?php }else{ ?><option value="" selected>Year</option><?php } $SqlYear=mysql_query("select y.YearId,FromDate,ToDate from hrm_employee_pms p inner join hrm_year y on p.AssessmentYear=y.YearId where CompanyId=".$CompanyId." group by AssessmentYear order by AssessmentYear DESC", $con); while($ResYear=mysql_fetch_array($SqlYear)) { ?><option value="<?php echo $ResYear['YearId']; ?>"><?php echo date("Y",strtotime($ResYear['FromDate'])).'-'.date("Y",strtotime($ResYear['ToDate'])); if($ResYear['YearId']>5){ echo ' - Y'; } ?></option><?php } ?></select></td>
  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
 </tr>
  
<?php //************************** Open Department******************************?> 
<tr>
<td colspan="5" align="left" id="type" valign="top">             
 <table border="0" width="80%">
  <tr>
   <td align="left" width="80%">
<table border="1" width="80%" bgcolor="#FFFFFF">
 <tr bgcolor="#7a6189">
  <td class="th" style="width:5%;"><b>SNo</b></td>
  <td class="th" style="width:15%;"><b>Score From</b></td>
  <td class="th" style="width:15%;"><b>Score To</b></td>
  <td class="th" style="width:5%;"><b>Rating</b></td>
  <td class="th" style="width:20%;"><b>Rating Name</b></td>
  <td class="th" style="width:10%;"><b>Updated Date</b></td>
  <td class="th" style="width:10%;"><b>Action</b></td>
 </tr>
<?php $sqlRat=mysql_query("select * from hrm_pms_rating where RatingStatus='A' AND CompanyId=".$CompanyId." AND YearId=".$_REQUEST['ey']." order by ScoreFrom ASC", $con); $SNo=1; while($resRat=mysql_fetch_array($sqlRat)) {
  if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$resRat['RatingId']){ ?>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
<input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" /> 
 <tr>
  <td class="tdc"><?php echo $SNo; ?></td>
  <td class="tdc"><input name="ScoreFrom" id="ScoreFrom" class="tdinput" maxlength="6" value="<?php echo $resRat['ScoreFrom']; ?>"/></td>
  <td class="tdc"><input name="ScoreTo" id="ScoreTo" class="tdinput" maxlength="6" value="<?php echo $resRat['ScoreTo']; ?>"/></td>
  <td class="tdc"><input name="Rating" id="Rating" class="tdinput" maxlength="3" value="<?php echo $resRat['Rating']; ?>"></td>
  <td class="tdc"><input name="RatingName" id="RatingName" class="tdinputl" style="width:190px;" maxlength="30" value="<?php echo $resRat['RatingName']; ?>"></td>  
  <td class="tdc"><?php echo date("d-m-Y",strtotime($resRat['CreatedDate'])); ?></td>
  <td class="tdc"><input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" />  
<?php if($_SESSION['User_Permission']=='Edit'){ ?>&nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;<input type="hidden" name="RatingId" id="RatingId" value="<?php echo $_REQUEST['eid']; ?>"/><?php } ?></td>
 </tr>
</form>

<?php } else { ?>	 
<tr>
 <td class="tdc"><?php echo $SNo; ?></td>
 <td class="tdc"><?php echo $resRat['ScoreFrom']; ?></td>
 <td class="tdc"><?php echo $resRat['ScoreTo']; ?></td>
 <td class="tdc"><?php echo $resRat['Rating']; ?></td>
 <td class="tdl"><?php echo $resRat['RatingName']; ?></td>
 <td class="tdc"><?php echo date("d-m-Y",strtotime($resRat['CreatedDate'])); ?></b></td>
 <td class="tdc"><?php if($_SESSION['User_Permission']=='Edit'){ ?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resRat['RatingId'].', '.$_REQUEST['ey']; ?>)"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $resRat['RatingId'].', '.$_REQUEST['ey']; ?>)"></a><?php } ?></td>
</tr>
<?php } $SNo++;} ?>
<tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>

<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">
<input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" /> 
<tr>
 <td class="tdc"><?php echo $SNo; ?></td>
 <td class="tdc"><input name="ScoreFrom" id="ScoreFrom" class="EditInput" maxlength="6" value="<?php echo $resRat['ScoreFrom']; ?>"/></td>
 <td class="tdc"><input name="ScoreTo" id="ScoreTo" class="EditInput" maxlength="6" value="<?php echo $resRat['ScoreTo']; ?>"/></td>
 <td class="tdc"><input name="Rating" id="Rating" class="EditInput" maxlength="3" value="<?php echo $resRat['Rating']; ?>"></td>
 <td class="tdc"><input name="RatingName" id="RatingName" class="EditInputl" style="width:190px;" maxlength="30" value="<?php echo $resRat['RatingName']; ?>"></td>  
 <td class="tdc"><?php echo date("d-m-Y"); ?></td>
 <td class="tdc"><?php if($_SESSION['User_Permission']=='Edit'){ ?>&nbsp;<input type="submit" name="SaveNew"  value="" class="SaveButton">&nbsp;<?php } ?></td>
</tr>
</form>
<?php } ?>
<?php $sqlAB=mysql_query("select * from hrm_abovebelow_rating where CompanyId=".$CompanyId." AND YearId=".$_REQUEST['ey'], $con); $resAB=mysql_fetch_assoc($sqlAB); ?>		 
<form name="belowForm" method="post" />		 
<input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" /> 
<tr bgcolor="#FFE6E6">
 <td colspan="7" class="tdl">
&nbsp;Below From Score :&nbsp;&nbsp;&nbsp;<input style="width:60px; height:21px; background-color:#F0FFE1;" name="Below" value="<?php echo $resAB['BScore']; ?>"/>
&nbsp;&nbsp;Rating :&nbsp;<input style="width:60px; height:21px;background-color:#F0FFE1;" name="BelowRating" value="<?php echo $resAB['BRating']; ?>" />
&nbsp;&nbsp;Rating Name :&nbsp;<input style="width:150px; height:21px;background-color:#F0FFE1;" name="BelowRatingName" value="<?php echo $resAB['BRatingName']; ?>" />
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
&nbsp;&nbsp;<input type="submit" name="SaveBelow"  value="" class="SaveButton">
<?php } ?>
 </td> 
</tr>
</form>		 

<form name="aboveForm" method="post" />		 
<input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" /> 
<tr bgcolor="#FFE6E6">  
 <td colspan="7" class="tdl">	   
&nbsp;Above From Score :&nbsp; <input style="width:60px; height:21px;background-color:#F0FFE1;" name="Above" value="<?php echo $resAB['AScore']; ?>"/>
&nbsp;&nbsp;Rating :&nbsp;<input style="width:60px; height:21px;background-color:#F0FFE1;" name="AboveRating" value="<?php echo $resAB['ARating']; ?>"/>
&nbsp;&nbsp;Rating Name :&nbsp;<input style="width:150px; height:21px;background-color:#F0FFE1;" name="AboveRatingName" value="<?php echo $resAB['ARatingName']; ?>" />
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
&nbsp;&nbsp;<input type="submit" name="SaveAbove"  value="" class="SaveButton">
<input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" /> 
<?php } ?> 
 </td> 
</tr>
</form>		     

<?php if($_SESSION['User_Permission']=='Edit'){ ?>	  
<tr>
<td colspan="7" align="Right" class="fontButton"><table border="0" width="550">
<tr><td align="right">
<input type="button" name="NewSave" id="NewSave" value="New" onClick="newsave(<?php echo $_REQUEST['ey']; ?>)" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/>
<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
<input type="button" name="Refresh" value="refresh" onClick="javascript:window.location='Rating.php?ey=<?php echo $_REQUEST['ey']; ?>'"/>&nbsp;</td>
</tr></table>
</td>
</tr>
<?php } ?>

 </table>
 </td>
</tr>

  </table>  
</td>
<?php //*************** Close Department******************************************************?>    
 </tr>
<?php } ?> 
</table>
<?php //***********************************************************************************************?>
<?php //*******************END*****END*****END******END******END************************?>
<?php //****************************************************************************?>
	  </td>
	</tr>
	<?php /*?><tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr><?php */?>
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

