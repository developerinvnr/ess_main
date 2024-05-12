<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//if($_SESSION['login'] = true){require_once('PhpFile/GradeP.php'); } else {$msg= "Session Expiry..............."; }
?>
<?php 
if(isset($_POST['AddNewGrade']))
{  $CD=date("Y-m-d"); 
   $SqlInseart = mysql_query("INSERT INTO hrm_grade(GradeValue,CompanyId,GradeStatus,CreatedBy,CreatedDate,YearId) VALUES('".$_POST['GradeName']."', '".$CompanyId."', 'A', '".$UserId."','".$CD."','".$YearId."')", $con); 
   $sql=mysql_query("select GradeId from hrm_grade where GradeValue='".$_POST['GradeName']."' AND CompanyId=".$CompanyId." AND GradeStatus='A'", $con); $res=mysql_fetch_assoc($sql);
   $SqlInseart_2 = mysql_query("INSERT INTO hrm_lodentitle(GradeId,GradeValue,CompanyId,CreatedBy,CreatedDate,YearId) VALUES(".$res['GradeId'].",'".$_POST['GradeName']."', '".$CompanyId."', '".$UserId."','".$CD."','".$YearId."')", $con); 
   $SqlInseart_3 = mysql_query("INSERT INTO hrm_travelentitle(GradeId,GradeValue,CompanyId,CreatedBy,CreatedDate,YearId) VALUES(".$res['GradeId'].",'".$_POST['GradeName']."', '".$CompanyId."', '".$UserId."','".$CD."','".$YearId."')", $con);
   $SqlInseart_4 = mysql_query("INSERT INTO hrm_traveleligibility(GradeId,GradeValue,CompanyId,CreatedBy,CreatedDate,YearId) VALUES(".$res['GradeId'].",'".$_POST['GradeName']."', '".$CompanyId."', '".$UserId."','".$CD."','".$YearId."')", $con);
   $SqlInseart_5 = mysql_query("INSERT INTO hrm_dailyallow(GradeId,GradeValue,CompanyId,CreatedBy,CreatedDate,YearId) VALUES(".$res['GradeId'].",'".$_POST['GradeName']."', '".$CompanyId."', '".$UserId."','".$CD."','".$YearId."')", $con);
   
   if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
}
if(isset($_POST['ChangeGrade']))
{
 $Sql2=mysql_query("Select * from hrm_grade WHERE GradeId='".$_POST['GradeId']."' AND CompanyId=".$CompanyId, $con); $Result2 = mysql_fetch_assoc($Sql2); 
 $SqlInsert2 = mysql_query("INSERT INTO hrm_grade_event(GradeId,GradeValue,CompanyId,GradeStatus,CreatedBy,CreatedDate,YearId) VALUES('".$Result2['GradeId']."', '".$Result2['GradeValue']."', '".$Result2['CompanyId']."', '".$Result2['GradeStatus']."', ".$Result2['CreatedBy'].", '".$Result2['CreatedDate']."', ".$Result2['YearId'].")", $con); 
  if($SqlInsert2)
    {
	 $SqlUpdate = mysql_query("UPDATE hrm_grade SET GradeValue='".$_POST['GradeName']."' WHERE GradeId=".$_POST['GradeId'], $con) or die(mysql_error());
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
	}   
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
  $SqlDelete=mysql_query("UPDATE hrm_grade SET GradeStatus='De' WHERE GradeId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg = "Data has been deleted successfully..."; }
}
?>


<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MandatoryAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<Script type="text/javascript">window.history.forward(1);
function deleteGrade() { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var a = document.getElementById("GradeId").value; var x = "Grade.php?action=delete&did="+a;  window.location=x;}}

function validate(formGrade) 
{
  var GradeName = formGrade.GradeName.value;  var Numfilter=/^[0-9]+$/;  var test_num = Numfilter.test(GradeName);
  if (GradeName.length === 0)  { alert("You must enter a Grade value.."); return false; }	
  //if(test_num==false) { alert('Please Enter Only Number in the Grade Value Field'); return false; }	

}
</Script>
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
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td align="right" width="360" class="heading">Grade</td>
	  <td align="left">
	    <b><span id="Vtype" class="span">: -&nbsp;Grade</span></b>
	  </td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:100px;" valign="top" align="center">&nbsp;
   <table border="0" cellpadding="0px;" align="center">
	<tr><td align="center">&nbsp;</td></tr>
   </table>
 </td>
 <td width="100">&nbsp;</td>
<?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block;">             
  <form  name="formGrade" method="post" onSubmit="return validate(this)">
   <table border="0">
   
	<tr>
	  <td align="left" valign="top"><table border="0" width="550">
	    <tr><td style="font-size:11px; height:18px; width:80px;" valign="top">Grade :</td>
			<td style="font-size:11px; height:18px; width:200px;" valign="top"><span id="Grade"><input name="GradeName" id="GradeName" style="font-size:11px; width:150px; height:18px;"/></span></td>
		    <td valign="top" align="right" style="font-size:11px; width:180px;">
		                    <select style="width:180px; background-color:#F1EDF8;" name="GradeSelect" id="GradeSelect" size="5" onChange="selectGrade(this.value)">
		   <?php if($CompanyId==1){$SqlGrade=mysql_query("select * from hrm_grade where GradeStatus='A' AND CompanyId=".$CompanyId." AND CreatedDate>='2014-02-01' order by GradeId ASC", $con);}elseif($CompanyId==3 OR $CompanyId==2){$SqlGrade=mysql_query("select * from hrm_grade where GradeStatus='A' AND CompanyId=".$CompanyId." order by GradeId ASC", $con);} while($ResGrade=mysql_fetch_array($SqlGrade)) { ?>
							<option value="<?php echo $ResGrade['GradeId']; ?>"><?php echo $ResGrade['GradeValue']; ?></option><?php } ?>
							</select>
			</td>
		</tr></table>
	  </td>
    </tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>	  
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr>
		 
		 <td align="right"><input type="submit" name="ChangeGrade" id="ChangeGrade" style="width:90px; display:none;" value="change"></td>
		 <td align="right" style="width:70px;"><input type="button" name="DeleteGrade" id="DeleteGrade" value="delete" style="width:90px; display:none;" onClick="deleteGrade()">
		                                       <input type="submit" name="AddNewGrade" id="AddNewGrade" style="width:90px; display:block;" value="add new"></td>
		 <td align="right" style="width:80px;"><input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/></td>
		 <td align="right" style="width:70px;"><input type="button" name="RefreshGrade" id="RefreshGrade" style="width:90px;" value="refresh" onClick="javascript:window.location='Grade.php'"/></td>
		</tr></table>
      </td>
   </tr>
<?php } ?>
  </table>
 </form>     
</td>
<?php //*********************************************** Close Department******************************************************?>    

 </tr>
<?php } ?> 
</table>
		
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
		
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
