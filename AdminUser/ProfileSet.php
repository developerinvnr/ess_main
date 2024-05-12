<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}

if(isset($_POST['SaveEdit']))
{    
  $SqlUp = mysql_query("UPDATE hrm_employee_procertify_setting set Open='".$_POST['Open']."', Year='".$_POST['Year']."', Month='".$_POST['Month']."', StartFrom='".date("Y-m-d",strtotime($_POST['StartFrom']))."', EmgContOpen='".$_POST['EmgContOpen']."' WHERE CompanyId=".$CompanyId, $con);
  if($SqlUp){ $msg = "Data has been updeted successfully...";}   
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:120px;} .font1 { font-family:"Times New Roman", Times, serif; font-size:11px; width:120px; } 
.font2 { font-size:11px;width:260px;height:18px;} .font4 {color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.TextInput { font-family:"Times New Roman", Times, serif; font-size:11px; width:100px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.td1{color:#ffffff;font-family:Times New Roman;font-size:14px;width:120px;text-align:center;}
.td2{color:#000000;font-family:Times New Roman;font-size:14px;width:115px;text-align:center;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MandatoryAjaxCall.js"></script>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<Script type="text/javascript">window.history.forward(1);
function edit() { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "ProfileSet.php?action=edit";  window.location=x;}}


function validateEdit(formEdit)
{ var agree=confirm("Are you sure you want to save this record?"); if(agree){ return true; } }


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
    <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td></tr>
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
	  <td width="350" class="heading">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PROFILE OPEN-CLOSE SETTING</td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:1px;" valign="top" align="center">&nbsp;</td>
 <td width="1">&nbsp;</td>
<?php //*********************************************** Open Menu PMS ******************************************************?> 		
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="0" width="500">
    <tr>
	  <td align="left">
	     <table border="1" width="250" border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#808000">
		   <td align="center" colspan="3" style="color:#ffffff; font-family:Georgia; font-size:11px;width:50px;"><b>Schedule in profile approval</b></td>
		 </tr>
		 <tr bgcolor="#7a6189">
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px;width:100px;" align="center" valign="middle"><b>Year</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px;width:100px;" valign="top" align="center"><b>Month</b></td>
		 </tr>	
<?php $sqlDp=mysql_query("select * from hrm_employee_procertify_ym where CompanyId=".$CompanyId." order by PYmId DESC", $con); $Sno=1; while($resDp=mysql_fetch_array($sqlDp)){
 if($resDp['Month']==1){$m='January';}elseif($resDp['Month']==2){$m='February';}elseif($resDp['Month']==3){$m='March';}elseif($resDp['Month']==4){$m='April';}elseif($resDp['Month']==5){$m='May';}elseif($resDp['Month']==6){$m='June';}elseif($resDp['Month']==7){$m='July';}elseif($resDp['Month']==8){$m='August';}elseif($resDp['Month']==9){$m='September';}elseif($resDp['Month']==10){$m='October';}elseif($resDp['Month']==11){$m='November';}elseif($resDp['Month']==12){$m='December';} 
 ?>		 
          <tr bgcolor="#FFFFFF">
		   <td style="font-family:Times New Roman;font-size:14px;" align="center"><?php echo $resDp['Year']; ?></td>
		   <td style="font-family:Times New Roman;font-size:14px;" align="center"><?php echo $m; ?></td>
		 </tr>
		 <?php $Sno++; } ?>
		 </table>
	   </td>
	</tr>  
	<tr><td>&nbsp;</td></tr> 
   <tr>
	  <td align="left">
	     <table border="1" width="550" border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#7a6189">
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:100px;" valign="middle" align="center"><b>Year</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:100px;" valign="middle" align="center"><b>Month</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:120px;" valign="middle" align="center"><b>StartFrom</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="middle" align="center"><b>Open</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>EmgCont Open</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:50px;" valign="middle" align="center"><b>Edit</b></td>
		 </tr>
<?php $sql=mysql_query("select * from hrm_employee_procertify_setting where CompanyId=".$CompanyId, $con); $res=mysql_fetch_array($sql);
	  if($res['Month']==1){$Bm='January';}elseif($res['Month']==2){$Bm='February';}elseif($res['Month']==3){$Bm='March';}elseif($res['Month']==4){$Bm='April';}elseif($res['Month']==5){$Bm='May';}elseif($res['Month']==6){$Bm='June';}elseif($res['Month']==7){$Bm='July';}elseif($res['Month']==8){$Bm='August';}elseif($res['Month']==9){$Bm='September';}elseif($res['Month']==10){$Bm='October';}elseif($res['Month']==11){$Bm='November';}elseif($res['Month']==12){$Bm='December';} 
	  
         if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit"){ ?>
	     <form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
		 <tr bgcolor="#FFFFFF">
		   <td align="center"><select name="Year" id="Year" style="font-family:Times New Roman;font-size:14px;width:100px;">
<?php if($res['Year']!=''){ ?><option value="<?php echo $res['Year']; ?>"><?php echo $res['Year']; ?></option><?php } else { ?><option value="0">YEAR</option><?php } ?>		<?php for($i=2016; $i<=2025; $i++){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?>  
		   </select></td>
		   <td align="center"><select name="Month" id="Month" style="font-family:Times New Roman;font-size:14px;width:100px;">
<?php if($res['Month']!=''){ ?><option value="<?php echo $res['Month']; ?>"><?php echo $Bm; ?></option><?php } else { ?><option value="0">MONTH</option><?php } ?>		   
<?php for($j=1; $j<=12; $j++){ ?><option value="<?php echo $j; ?>"><?php if($j==1){echo 'January';}elseif($j==2){echo 'February';}elseif($j==3){echo 'March';}elseif($j==4){echo 'April';}elseif($j==5){echo 'May';}elseif($j==6){echo 'June';}elseif($j==7){echo 'July';}elseif($j==8){echo 'August';}elseif($j==9){echo 'September';}elseif($j==10){echo 'October';}elseif($j==11){echo 'November';}elseif($j==12){echo 'December';} ?></option><?php } ?>  		   
		   </select></td>
		   <td><input name="StartFrom" id="StartFrom" style="font-family:Times New Roman;font-size:14px;width:90px;" value="<?php echo date("d-m-Y",strtotime($res['StartFrom'])); ?>"/>&nbsp;<button id="b_btn" class="CalenderButton"></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("b_btn", "StartFrom", "%d-%m-%Y"); </script></td>
           <td align="center"><select name="Open" id="Open" style="font-family:Times New Roman;font-size:14px;width:50px;">
<?php if($res['Open']!=''){ ?><option value="<?php echo $res['Open']; ?>"><?php echo $res['Open']; ?></option>
<option value="<?php if($res['Open']=='Y'){echo 'N';}else{echo 'Y';} ?>"><?php if($res['Open']=='Y'){echo 'N';}else{echo 'Y';} ?></option>
<?php } else { ?><option value="N">N</option><option value="Y">Y</option><?php } ?>		
		   </select></td>
		   <td align="center"><select name="EmgContOpen" id="EmgContOpen" style="font-family:Times New Roman;font-size:14px;width:50px;">
<?php if($res['EmgContOpen']!=''){ ?><option value="<?php echo $res['EmgContOpen']; ?>"><?php echo $res['EmgContOpen']; ?></option>
<option value="<?php if($res['EmgContOpen']=='Y'){echo 'N';}else{echo 'Y';} ?>"><?php if($res['EmgContOpen']=='Y'){echo 'N';}else{echo 'Y';} ?></option>
<?php } else { ?><option value="N">N</option><option value="Y">Y</option><?php } ?>		
		   </select></td>
  
		   <td align="center">
<?php if($_SESSION['User_Permission']=='Edit'){?>
<input type="submit" name="SaveEdit"  value="" class="SaveButton">
<?php } ?>
</td>
		 </tr>
		 </form>
        <?php } else { ?>	
          <tr bgcolor="#FFFFFF">
		   <td style="font-family:Times New Roman;font-size:14px;" align="center"><?php echo $res['Year']; ?></td>
		   <td style="font-family:Times New Roman;font-size:14px;" align="center"><?php echo $Bm; ?></td>
		   <td style="font-family:Times New Roman;font-size:14px;" align="center"><?php echo date("d-m-Y",strtotime($res['StartFrom'])); ?></td>
		   <td style="font-family:Times New Roman;font-size:14px;" align="center"><?php echo $res['Open']; ?></td>
		   <td style="font-family:Times New Roman;font-size:14px;" align="center"><?php echo $res['EmgContOpen']; ?></td>
		   <td align="center">
<?php if($_SESSION['User_Permission']=='Edit'){?>
<a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit()"></a>
<?php } ?>
</td>
		 </tr>
		 <?php } ?>
		 </table>
	   </td>
	</tr>  
	<tr><td>&nbsp;</td></tr> 

		 </table>
	   </td>
	</tr>   

   
  </table>    
</td>
<?php //*********************************************** Close Menu PMS ******************************************************?>    
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

