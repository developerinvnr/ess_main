<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}

if(isset($_POST['SaveEdit']))
{
 $Sql2=mysql_query("Select * from hrm_travelentitle WHERE TravelEntitleId='".$_POST['EditId']."' AND CompanyId=".$CompanyId, $con); $Result2 = mysql_fetch_assoc($Sql2); 
 $SqlInsert2 = mysql_query("INSERT INTO hrm_travelentitle_event(TravelEntitleId,GradeValue,ModeTravel_Flight,TravelClass_Flight,ModeTravel_Train,TravelClass_Train,ModeTravel_Any,CompanyId,CreatedBy,CreatedDate,YearId)VALUES('".$Result2['TravelEntitleId']."', '".$Result2['GradeValue']."', '".$Result2['ModeTravel_Flight']."', '".$Result2['TravelClass_Flight']."', '".$Result2['ModeTravel_Train']."', '".$Result2['TravelClass_Train']."',  '".$Result2['ModeTravel_Any']."', '".$Result2['CompanyId']."', ".$Result2['CreatedBy'].", '".$Result2['CreatedDate']."', ".$Result2['YearId'].")", $con); 
  if($SqlInsert2)
    {
	 $SqlUpdate = mysql_query("UPDATE hrm_travelentitle SET ModeTravel_Flight='".$_POST['ModeTravel_Flight']."', TravelClass_Flight='".$_POST['TravelClass_Flight']."', ModeTravel_Train='".$_POST['ModeTravel_Train']."', TravelClass_Train='".$_POST['TravelClass_Train']."', ModeTravel_Any='".$_POST['ModeTravel_Any']."', CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."', YearId=".$YearId." WHERE TravelEntitleId=".$_POST['EditId'], $con) or die(mysql_error());
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
	}   
}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:120px;} .font1 { font-family:"Times New Roman", Times, serif; font-size:11px; width:120px; } 
.font2 { font-size:11px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.TextInput { font-family:"Times New Roman", Times, serif; font-size:11px; width:100px; height:18px;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MandatoryAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);
function edit(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "TravelEn.php?action=edit&eid="+value;  window.location=x;}}
function del(value) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "TravelEn.php?action=delete&did="+value;  window.location=x;}}

function SelectFlightClass(value)
{ if(value==Y) {document.getElementById("TravelClass_Flight").disabled=false;}
  else {document.getElementById("TravelClass_Flight").disabled=true;}
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
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td align="right" width="360" class="heading">Travel Entitlement</td>
	  <td align="left">
	    <b><span id="Vtype" class="span">: -&nbsp;Travel Entitlement</span></b>
	  </td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:100px;" valign="top" align="center">&nbsp;
   <table border="0" cellpadding="0px;" align="center">
	<tr><td align="center">&nbsp;</td></tr>
   </table>
 </td>
 <td width="100">&nbsp;</td>
<?php //*********************************************** Open Travels Entitlement******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
  <form  name="formDept" method="post" onSubmit="return validate(this)">
   <table border="0" width="770">
   
	<tr>
	  <td align="left" width="770">
	     <table border="1" width="770" border="1" bgcolor="#FFFFFF">
		  <tr bgcolor="#7a6189">
		   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:110px;" valign="top" align="center"><b>Grade</b></td>
		   <td class="font" valign="top" align="center" colspan="2"><b>Flight</b></td>
 		   <td class="font" valign="top" align="center" colspan="2"><b>Train</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:300px;" valign="top" align="center"><b>Any</b></td>
		   <td valign="top" align="center" style="font:Georgia; font-size:11px; width:100px; color:#FFFFFF;"><b>Action</b></td>
		 </tr>
		 <tr bgcolor="#7a6189">
		   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px; background-color:#FFFFFF;">&nbsp;</td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:110px; background-color:#FFFFFF;" valign="top" align="center">&nbsp;</td>
		   <td class="font" valign="top" align="center"><b>Provide</b></td>
		   <td class="font" valign="top" align="center"><b>Class</b></td>
 		   <td class="font" valign="top" align="center"><b>Provide</b></td>
		   <td class="font" valign="top" align="center"><b>Class</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:300px; background-color:#FFFFFF;" valign="top" align="center">&nbsp;</td>
		   <td valign="top" align="center" style="font:Georgia; font-size:11px; width:100px; color:#FFFFFF; background-color:#FFFFFF;">&nbsp;</td>
		 </tr>
		 
      <?php $sqlTravelEn=mysql_query("select * from hrm_travelentitle where CompanyId=".$CompanyId." order by GradeId DESC", $con); 
	        $SNo=1; while($resTravelEn=mysql_fetch_array($sqlTravelEn)) {
      if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$resTravelEn['TravelEntitleId']){ ?>
	      <form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
          <tr>
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
		   <td style="color:#000000; font-family:Georgia; font-size:11px; width:110px;" align="center">&nbsp;<?php echo $resTravelEn['GradeValue']; ?></td>
		   <td class="font1" align="left"><select name="ModeTravel_Flight" id="ModeTravel_Flight" class="textInput" onChange="SelectFlightClass(this.value)">
		   <option value="<?php echo $resTravelEn['ModeTravel_Flight']; ?>"><?php if($resTravelEn['ModeTravel_Flight']=='N') { echo 'NO'; } else { echo 'YES'; }?></option>
		   <option value="<?php if($resTravelEn['ModeTravel_Flight']=='N'){echo 'Y';}else{echo 'N';}?>"><?php if($resTravelEn['ModeTravel_Flight']=='N'){echo 'YES';}else{ echo 'NO';}?></option>  </select></td>
		   <td class="font1" align="left"><select name="TravelClass_Flight" id="TravelClass_Flight" class="textInput">
		   <option value="<?php echo $resTravelEn['TravelClass_Flight']; ?>"><?php echo $resTravelEn['TravelClass_Flight']; ?></option>
		   <option value="Economy">Economy</option><option value="Business class">Business class</option>  
		   </select></td>
		   <td class="font1" align="left"><select name="ModeTravel_Train" id="ModeTravel_Train" class="textInput" >
		   <option value="<?php echo $resTravelEn['ModeTravel_Train']; ?>"><?php if($resTravelEn['ModeTravel_Train']=='N') { echo 'NO'; } else { echo 'YES'; }?></option>
		   <option value="<?php if($resTravelEn['ModeTravel_Train']=='N'){echo 'Y';}else{echo 'N';}?>"><?php if($resTravelEn['ModeTravel_Train']=='N'){echo 'YES';}else{ echo 'NO';}?></option>  </select></td>
		   <td class="font1" align="left"><select name="TravelClass_Train" id="TravelClass_Train" class="textInput">
		   <option value="<?php echo $resTravelEn['TravelClass_Train']; ?>"><?php echo $resTravelEn['TravelClass_Train']; ?></option>
		   <option value="AC-I">AC-I</option><option value="AC-II">AC-II</option> 
		   <option value="AC-III" class>AC-III</option><option value="Sleeper">Sleeper</option>
		   <option value="General">General</option>
		   </select></td>
 		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:300px;" align="left"><input name="ModeTravel_Any" id="ModeTravel_Any" style="font-family:Georgia; font-size:11px; width:184px;" value="<?php echo $resTravelEn['ModeTravel_Any']; ?>" />
		   <input type="hidden" name="EditId" id="EditId" value="<?php echo $_REQUEST['eid']; ?>"/></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:100px;">
			 &nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;
		   </td>
		 </tr>
		 </form>
		 
<?php } else { ?>	 
		  <tr>
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
		   <td style="color:#000000; font-family:Georgia; font-size:11px; width:110px;" align="center">&nbsp;<?php echo $resTravelEn['GradeValue']; ?></td>
		   <td class="font1" align="left">&nbsp;<?php echo $resTravelEn['ModeTravel_Flight']; ?></td>
		   <td class="font1" align="left">&nbsp;<?php echo $resTravelEn['TravelClass_Flight']; ?></td>
 		   <td class="font1" align="left">&nbsp;<?php echo $resTravelEn['ModeTravel_Train']; ?></td>
		   <td class="font1" align="left">&nbsp;<?php echo $resTravelEn['TravelClass_Train']; ?></td>
 		   <td style="font-family:Georgia; font-size:11px; width:300px;" align="left">&nbsp;<?php echo $resTravelEn['ModeTravel_Any']; ?></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:50px;">
			 <a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resTravelEn['TravelEntitleId']; ?>)"></a>
			 &nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" style="display:none" onClick="del(<?php echo $resTravelEn['TravelEntitleId']; ?>)"></a>
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
		<input type="button" name="Refrash" value="refraeh" onclick="javascript:window.location='TravelEn.php'"/>&nbsp;</td>
		</tr></table>
      </td>
   </tr>
  </table>
 </form>     
</td>
<?php //*********************************************** Close Travels EntitleMent******************************************************?>    

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
