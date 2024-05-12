<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************************************************************************************************
if(isset($_POST['SaveEdit']))
{ 
 $Sql2=mysql_query("Select * from hrm_pms_normalrating_dis WHERE NormalRatingId=".$_POST['NormalRatingId']." AND YearId=".$_POST['ey']." AND CompanyId=".$CompanyId, $con); 
 $Rows = mysql_num_rows($Sql2); 
 if($Rows>0) 
 { $SqlUpdate = mysql_query("UPDATE hrm_pms_normalrating_dis SET NormalDistri=".$_POST['NormalDistri'].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' WHERE NormalRatingId=".$_POST['NormalRatingId'], $con) or die(mysql_error());  
   if($SqlUpdate){$msg="Data has been Updeted successfully...";}
 }
 if($Rows==0)
 { 
 $Sql3=mysql_query("update hrm_pms_normalrating_dis set NormalDisStatus='D' WHERE NormalRatingId='".$_POST['NormalRatingId']."' AND CompanyId=".$CompanyId, $con);
    if($Sql3)
    { $Sql4=mysql_query("INSERT INTO hrm_pms_normalrating_dis(YearId,Rating,NormalDistri,CompanyId,CreatedBy,CreatedDate) VALUES(".$_POST['ey'].", ".$_POST['Rating'].", ".$_POST['NormalDistri'].", ".$CompanyId.", ".$UserId.", '".date("Y-m-d")."')", $con); 
	}
 }
 if($Sql4){ $msg = "Data has been Updeted successfully...";}
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
  $SqlDelete=mysql_query("UPDATE hrm_pms_normalrating_dis SET NormalDisStatus='De' WHERE NormalRatingId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg = "Data has been deleted successfully..."; }
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
 .font { color:#ffffff; font-family:Georgia; font-size:12px; width:100px;} .font1 { font-family:Georgia; font-size:12px; height:14px; width:100px; } 
.font2 { font-size:11px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:11px; width:120px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; width:100px; height:20px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script>
function SelectYear(v){window.location='NormalRatDistri.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&ey='+v;}
function edit(value,ey) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "NormalRatDistri.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=edit&eid="+value+"&ey="+ey;  window.location=x;}}
function del(value,ey) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "NormalRatDistri.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=delete&did="+value+"&ey="+ey;  window.location=x;}}


function validateEdit(formEdit){  
  var NormalDistri = formEdit.NormalDistri.value; var Numfilter=/^[0-9. ]+$/;  var test_num1 = Numfilter.test(NormalDistri)
  if (NormalDistri.length === 0) { alert("please select NormalDistri field.");  return false; }
  if(test_num1==false) { alert('Please Enter Only Number in the NormalDistri field');  return false; } 
  
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
<?php //***************************************************************************************?>
<?php //****************START*****START*****START******START******START******************?>
<?php //********************************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td style="width:2px;" valign="top" align="center">&nbsp;</td>
	  <td width="320" class="heading">PMS - Normal Rating Distribution</td>
	  <?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['ey']."", $con); $rY=mysql_fetch_assoc($sY); 
      $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>	     
    <td class="td1" style="font-size:14px;width:170px;font-family:Times New Roman;" >&nbsp;&nbsp;<b>Year:</b>&nbsp;<select class="tdsel" style="background-color:#DDFFBB;width:115px;" name="YearID" id="YearID" onChange="SelectYear(this.value)"><?php if($_REQUEST['ey']!=''){ $SqlY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['ey'], $con); $ResY=mysql_fetch_array($SqlY); ?><option value="<?php echo $ResY['YearId']; ?>"><?php echo date("Y",strtotime($ResY['FromDate'])).'-'.date("Y",strtotime($ResY['ToDate'])); if($ResY['YearId']>5){ echo ' - Y'; }?></option><?php }else{ ?><option value="" selected>Year</option><?php } $SqlYear=mysql_query("select y.YearId,FromDate,ToDate from hrm_employee_pms p inner join hrm_year y on p.AssessmentYear=y.YearId where CompanyId=".$CompanyId." group by AssessmentYear order by AssessmentYear DESC", $con); while($ResYear=mysql_fetch_array($SqlYear)) { ?><option value="<?php echo $ResYear['YearId']; ?>"><?php echo date("Y",strtotime($ResYear['FromDate'])).'-'.date("Y",strtotime($ResYear['ToDate'])); if($ResYear['YearId']>5){ echo ' - Y'; } ?></option><?php } ?></select></td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(( $_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>
 

<?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="0" width="550">
    <tr>

  </tr>
   
	<tr>
	  <td align="left" width="550">
	     <table border="1" width="550" border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#7a6189">
		   <td class="th" style="width:50px;"><b>SNo</b></td>
		   <td class="th" style="width:110px;"><b>Rating</b></td>
		   <td class="th" style="width:100px;"><b>Distribution</b></td>
		   <td class="th" style="width:100px;"><b>Updated Date</b></td>
		   <td class="th" style="width:100px;"><b>Action</b></td>
		 </tr>
      <?php $sqlRat=mysql_query("select * from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_REQUEST['ey']." AND CompanyId=".$CompanyId." order by Rating DESC", $con); $SNo=1; while($resRat=mysql_fetch_array($sqlRat)) {
      if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$resRat['NormalRatingId']){ ?>
	      <form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
          <tr>
		   <td align="center" style="font:Georgia; font-size:12px; width:50px;"><?php echo $SNo; ?></td>
		   <td class="font1" align="center"><input name="Rating" id="Rating" class="EditInput" maxlength="3" value="<?php echo $resRat['Rating']; ?>" readonly /></td>
		   <td class="font1" align="center"><input name="NormalDistri" id="NormalDistri" class="EditInput" maxlength="3" value="<?php echo $resRat['NormalDistri']; ?>"/></td>
		   <td class="font1" align="center"><?php echo date("d-m-Y",strtotime($resRat['CreatedDate'])); ?></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:100px;"><input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['ey']; ?>" /> 
<?php if($_SESSION['User_Permission']=='Edit'){ ?> 
		 &nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;<input type="hidden" name="NormalRatingId" id="NormalRatingId" value="<?php echo $_REQUEST['eid']; ?>"/>
<?php } ?>
		   </td>
		 </tr>
		 </form>
		 
<?php } else { ?>	 
		  <tr>
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
		   <td class="font1" align="center"><?php echo $resRat['Rating']; ?></td>
		   <td class="font1" align="center"><?php echo $resRat['NormalDistri']; ?></td>
		   <td class="font1" align="center"><?php echo date("d-m-Y",strtotime($resRat['CreatedDate'])); ?></b></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:80px;">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
			 <a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resRat['NormalRatingId'].', '.$_REQUEST['ey']; ?>)"></a>			 
<?php } ?>

<?php /*&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $resRat['NormalRatingId'].', '.$_REQUEST['ey']; ?>)"></a>*/ ?>

		   </td>
		 </tr>
<?php } $SNo++;} ?>
         <tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>
		 </table>
	  </td>
    </tr>
	  
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr><td align="right">
		<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
		<input type="button" name="Refresh" value="refresh" onClick="javascript:window.location='NormalRatDistri.php?ey=<?php echo $_REQUEST['ey']; ?>'"/>&nbsp;
			     </td>
		</tr></table>
      </td>
   </tr>
  </table>  
</td>
<?php //********************* Close Department******************?>    

 </tr>
<?php } ?> 
</table>
		
<?php //***************************************************************************?>
<?php //***************END*****END*****END******END******END**********************?>
<?php //***************************************************************************?>
		
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
	</tr>-->
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
