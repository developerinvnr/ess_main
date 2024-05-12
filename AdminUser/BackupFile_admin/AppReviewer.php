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
 $SqlUpdate = mysql_query("UPDATE hrm_designation SET Reviewer='".$_POST['Rev']."', Appraiser='".$_POST['App']."' WHERE DesigId=".$_POST['DesigId'], $con) or die(mysql_error());
 if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
	
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Times New Roman; font-size:11px; width:100px;} .font1 { font-family:Times New Roman; font-size:11px; height:14px; width:100px; } 
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
function edit(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "AppReviewer.php?action=edit&eid="+value;  window.location=x;}}                         
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
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td align="right" width="420" class="heading">PMS - Appraiser/ Reviewer</td>
	  <td align="left">
	    <b><span id="Vtype" class="span">: -&nbsp;Appraiser/ Reviewer</span></b>
	  </td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(( $_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:100px;" valign="top" align="center">&nbsp;
   <table border="0" cellpadding="0px;" align="center">
	<tr><td align="center">&nbsp;</td></tr>
   </table>
 </td>
 <td width="100">&nbsp;</td>
<?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="0" width="650">
   
	<tr>
	  <td align="left" width="650">
	     <table border="1" width="650" border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#7a6189">
		   <td align="center" style="font:Times New Roman; color:#FFFFFF; font-size:12px; width:50px;"><b>SNo</b></td>
		   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:250px;" valign="top" align="center"><b>Designation</b></td>
		   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:60px;" valign="top" align="center"><b>Reviewer</b></td>
 		   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:60px;" valign="top" align="center"><b>Appraiser</b></td>
		   <td valign="top" align="center" style="font:Times New Roman; font-size:12px; width:50px; color:#FFFFFF"><b>Action</b></td>
		 </tr>
      <?php $sqlDesig=mysql_query("select * from hrm_designation where DesigStatus ='A' AND CompanyId=".$CompanyId." Order by DesigId ASC", $con); $SNo=1; while($resDesig=mysql_fetch_array($sqlDesig)) {
      if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$resDesig['DesigId']){ ?>
	      <form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
          <tr>
		   <td align="center" style="font:Times New Roman; font-size:12px; width:50px;"><?php echo $SNo; ?></td>
		   <td style="font-family:Times New Roman; font-size:12px; width:250px;" align="left"><?php echo $resDesig['DesigName']; ?></td>
		   <td style="font-family:Times New Roman; font-size:12px; width:60px;" align="center"><select name="Rev" id="Rev" style="font-family:Times New Roman; font-size:12px; width:50px; height:18px;">
		         <option value="<?php echo $resDesig['Reviewer']; ?>">&nbsp;<?php if($resDesig['Reviewer']=='Y'){echo 'YES'; } else { echo 'NO';} ?></option>
				 <option value="<?php if($resDesig['Reviewer']=='Y'){echo 'N'; } else { echo 'Y';} ?>">&nbsp;<?php if($resDesig['Reviewer']=='Y'){echo 'NO'; } else { echo 'YES';} ?></option>
		  <td style="font-family:Times New Roman; font-size:12px; width:60px;" align="center"><select name="App" id="App" style="font-family:Times New Roman; font-size:12px; width:50px; height:18px;">
		         <option value="<?php echo $resDesig['Appraiser']; ?>">&nbsp;<?php if($resDesig['Appraiser']=='Y'){echo 'YES'; } else { echo 'NO';} ?></option>
				 <option value="<?php if($resDesig['Appraiser']=='Y'){echo 'N'; } else { echo 'Y';} ?>">&nbsp;<?php if($resDesig['Appraiser']=='Y'){echo 'NO'; } else { echo 'YES';} ?></option></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:50px;">
		 &nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;<input type="hidden" name="DesigId" id="DesigId" value="<?php echo $_REQUEST['eid']; ?>"/>
		   </td>
		 </tr>
		 </form>
		 
<?php } else { ?>	 
		  <tr>
		   <td align="center" style="font:Times New Roman; font-size:12px; width:50px;"><?php echo $SNo; ?></td>
		   <td style="font-family:Times New Roman;font-size:12px; width:250px;" align="left">&nbsp;<?php echo $resDesig['DesigName']; ?></td>
		   <td style="font-family:Times New Roman; font-size:12px; width:60px;" align="center">&nbsp;<?php if($resDesig['Reviewer']=='Y'){echo 'YES'; } else { echo 'NO';} ?></td>
 		   <td style=" font-family:Times New Roman; font-size:12px; width:60px;" align="center">&nbsp;<?php if($resDesig['Appraiser']=='Y'){echo 'YES'; } else { echo 'NO';} ?></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:12px; width:50px;">
			 <a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resDesig['DesigId']; ?>)"></a>
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
		<input type="button" name="Refrash" value="Refrash" onclick="javascript:window.location='AppReviewer.php'"/>&nbsp;
			     </td>
		</tr></table>
      </td>
   </tr>
  </table>  
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
