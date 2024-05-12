<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
?>
<?php 
if(isset($_POST['AddNewCompo']))
{ 
   $SqlInseart = mysql_query("INSERT INTO hrm_paycomponent(CompoName,CompoCode,CompoType,Lumpsum,Prorata,Con_For_Tds,Esti_For_Tds,Deduct_In_Tax,Con_For_Pf,Con_For_Ptax,Con_For_Esic,Con_For_ArrCalcu, CompanyId,CreatedBy,CreatedDate,YearId) VALUES('".$_POST['CompoName']."', '".$_POST['CompoCode']."', '".$_POST['CompoType']."', '".$_POST['Lumpsum']."', '".$_POST['Prorata']."', '".$_POST['ConTDS']."', '".$_POST['EstimateTDS']."', '".$_POST['DedIncTax']."', '".$_POST['ConPF']."', '".$_POST['ConPTax']."', '".$_POST['ConESIC']."', '".$_POST['ConArrCalcu']."', '".$CompanyId."', '".$UserId."','".date('Y-m-d')."','".$YearId."')", $con); 
   if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
}
if(isset($_POST['ChangeCompo']))
{
 $Sql2=mysql_query("Select * from hrm_paycomponent WHERE PayCompoId='".$_POST['PayCompoId']."' AND CompanyId=".$CompanyId, $con); $Result2 = mysql_fetch_assoc($Sql2); 
 $SqlInsert2 = mysql_query("INSERT INTO hrm_paycomponent_event(PayCompoId,CompoName,CompoCode,CompoType,Lumpsum,Prorata,Con_For_Tds,Esti_For_Tds,Deduct_In_Tax,Con_For_Pf,Con_For_Ptax,Con_For_Esic,Con_For_ArrCalcu, CompanyId,CreatedBy,CreatedDate,YearId) VALUES('".$Result2['PayCompoId']."', '".$Result2['CompoName']."', '".$Result2['CompoCode']."', '".$Result2['CompoType']."', '".$Result2['Lumpsum']."', '".$Result2['Prorata']."', '".$Result2['Con_For_Tds']."', '".$Result2['Esti_For_Tds']."', '".$Result2['Deduct_In_Tax']."', '".$Result2['Con_For_Pf']."', '".$Result2['Con_For_Ptax']."', '".$Result2['Con_For_Esic']."', '".$Result2['Con_For_ArrCalcu']."', '".$Result2['CompanyId']."', ".$Result2['CreatedBy'].", '".$Result2['CreatedDate']."', ".$Result2['YearId'].")", $con); 
  if($SqlInsert2)
    {
	 $SqlUpdate = mysql_query("UPDATE hrm_paycomponent SET Lumpsum='".$_POST['Lumpsum1']."', Prorata='".$_POST['Prorata1']."', Con_For_Tds='".$_POST['ConTDS1']."', Esti_For_Tds='".$_POST['EstimateTDS1']."', Deduct_In_Tax='".$_POST['DedIncTax1']."', Con_For_Pf='".$_POST['ConPF1']."', Con_For_Ptax='".$_POST['ConPTax1']."', Con_For_Esic='".$_POST['ConESIC1']."', Con_For_ArrCalcu='".$_POST['ConArrCalcu1']."' WHERE PayCompoId='".$_POST['PayCompoId']."'", $con); 
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
	}   
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
  $SqlDelete=mysql_query("UPDATE hrm_paycomponent SET PayCompoStatus='De' WHERE PayCompoId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg = "Data has been deleted successfully..."; }
}
?>

<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font {color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font4 {color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}
.span {display:none; font-family:Courier New; font-size:14px; } .span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MasterAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);
function selectComponent(value){ 
    document.getElementById("Changebtn").style.display = 'block';
	document.getElementById("ChangeCompo").style.display = 'none';
	document.getElementById("DeleteCompo").style.display = 'block';
	document.getElementById("AddNewBtn").style.display = 'none';
	document.getElementById("AddNewCompo").style.display = 'none';
	document.getElementById("Newtable").style.display = 'none';
	document.getElementById("EditTable").style.display = 'block';
	var url = 'GetPayCompo.php';	var pars = 'Compoid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewCompo
	});
}
function show_NewCompo(originalRequest)
{ document.getElementById('EditTable').innerHTML = originalRequest.responseText; }


function addNew()
{ 
document.getElementById("AddNewBtn").style.display = 'none'; document.getElementById("AddNewCompo").style.display = 'block';
document.getElementById("CompoName").disabled = false; document.getElementById("CompoCode").disabled = false; document.getElementById("CompoType").disabled = false; 
document.getElementById("ConPF").disabled = false; document.getElementById("Lumpsum").disabled = false; document.getElementById("Prorata").disabled = false;
document.getElementById("ConPTax").disabled = false; document.getElementById("ConESIC").disabled = false; document.getElementById("ConTDS").disabled = false; 
document.getElementById("ConArrCalcu").disabled = false; document.getElementById("EstimateTDS").disabled = false; document.getElementById("DedIncTax").disabled = false;
}
function changeV()
{ 
document.getElementById("Changebtn").style.display = 'none'; document.getElementById("ChangeCompo").style.display = 'block'; document.getElementById("DeleteCompo").disabled = true;
document.getElementById("CompoName1").disabled = true; document.getElementById("CompoCode1").disabled = false; document.getElementById("CompoType1").disabled = false; 
document.getElementById("ConPF1").disabled = false; document.getElementById("Lumpsum1").disabled = false; document.getElementById("Prorata1").disabled = false;
document.getElementById("ConPTax1").disabled = false; document.getElementById("ConESIC1").disabled = false; document.getElementById("ConTDS1").disabled = false; 
document.getElementById("ConArrCalcu1").disabled = false; document.getElementById("EstimateTDS1").disabled = false; document.getElementById("DedIncTax1").disabled = false;
}

function Checked()
{
if(document.getElementById("ConPF").checked == true) { document.getElementById("ConPF").value = 'Y'; } else { document.getElementById("ConPF").value = 'N'; }
if(document.getElementById("Lumpsum").checked == true) { document.getElementById("Lumpsum").value = 'Y'; } else { document.getElementById("Lumpsum").value = 'N'; }
if(document.getElementById("Prorata").checked == true) { document.getElementById("Prorata").value = 'Y'; } else { document.getElementById("Prorata").value = 'N'; }
if(document.getElementById("ConPTax").checked == true) { document.getElementById("ConPTax").value = 'Y'; } else { document.getElementById("ConPTax").value = 'N'; }
if(document.getElementById("ConESIC").checked == true) { document.getElementById("ConESIC").value = 'Y'; } else { document.getElementById("ConESIC").value = 'N'; }
if(document.getElementById("ConTDS").checked == true) { document.getElementById("ConTDS").value = 'Y'; } else { document.getElementById("ConTDS").value = 'N'; }
if(document.getElementById("ConArrCalcu").checked == true) { document.getElementById("ConArrCalcu").value = 'Y'; } else { document.getElementById("ConArrCalcu").value = 'N'; }
if(document.getElementById("EstimateTDS").checked == true) { document.getElementById("EstimateTDS").value = 'Y'; } else { document.getElementById("EstimateTDS").value = 'N'; }
if(document.getElementById("DedIncTax").checked == true) { document.getElementById("DedIncTax").value = 'Y'; } else { document.getElementById("DedIncTax").value = 'N'; }
}

function Checked_1()
{
if(document.getElementById("ConPF1").checked == true) { document.getElementById("ConPF1").value = 'Y'; } else { document.getElementById("ConPF1").value = 'N'; }
if(document.getElementById("Lumpsum1").checked == true) { document.getElementById("Lumpsum1").value = 'Y'; } else { document.getElementById("Lumpsum1").value = 'N'; }
if(document.getElementById("Prorata1").checked == true) { document.getElementById("Prorata1").value = 'Y'; } else { document.getElementById("Prorata1").value = 'N'; }
if(document.getElementById("ConPTax1").checked == true) { document.getElementById("ConPTax1").value = 'Y'; } else { document.getElementById("ConPTax1").value = 'N'; }
if(document.getElementById("ConESIC1").checked == true) { document.getElementById("ConESIC1").value = 'Y'; } else { document.getElementById("ConESIC1").value = 'N'; }
if(document.getElementById("ConTDS1").checked == true) { document.getElementById("ConTDS1").value = 'Y'; } else { document.getElementById("ConTDS1").value = 'N'; }
if(document.getElementById("ConArrCalcu1").checked == true) { document.getElementById("ConArrCalcu1").value = 'Y'; } else { document.getElementById("ConArrCalcu1").value = 'N'; }
if(document.getElementById("EstimateTDS1").checked == true) { document.getElementById("EstimateTDS1").value = 'Y'; } else { document.getElementById("EstimateTDS1").value = 'N'; }
if(document.getElementById("DedIncTax1").checked == true) { document.getElementById("DedIncTax1").value = 'Y'; } else { document.getElementById("DedIncTax1").value = 'N'; }
}



function deletePayCompo(value) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var a = document.getElementById("PayCompoId").value; var x = "PaySlipCompo.php?action=delete&did="+a;  window.location=x;}}
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
	  <td align="right" width="360" class="heading">Pay Component</td>
	  <td align="left">
	    <b><span id="Vtype" class="span">&nbsp;</span><span id="Vname" class="span">&nbsp;</span><span id="Vdetails" class="span1">&nbsp;</span></b>
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
<tr><td align="center"><a href="#"><img src="images/back.png" border="0" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/></a></td></tr>   <tr><td align="center"><a href="#"><img src="images/cancel.png" border="0" onClick="javascript:window.location='PayComponent.php'"/></a></td></tr>
   </table>
 </td>
 <td width="100">&nbsp;</td>
<?php //*********************************************** Open Pay Component******************************************************?> 
<td align="left" id="name" valign="top">             
<form  name="formVname" method="post" onSubmit="return validate(this)">
<table border="0">
 <tr>
 <td align="left">
  <table border="0" style="width:700px;">
   <tr>
   
	 <td class="td1" style="font-size:11px; width:600px;" valign="top">
	   <span id="EditTable"></span>
	   <table border="0" style="display:block;" id="Newtable">
	     <tr>
		   <td class="td1" style="font-size:11px; width:50px;">Name&nbsp;:</td>
		   <td><input name="CompoName" id="CompoName" style="font-size:11px; width:150px; height:18px;" disabled/></td><td style="width:20px;">&nbsp;</td>
		   <td class="td1" style="font-size:11px;width:50px;">Code&nbsp;:</td>
		   <td><input name="CompoCode" id="CompoCode" style="font-size:11px; width:120px; height:18px;" disabled/></td><td style="width:20px;">&nbsp;</td>
		   <td class="td1" style="font-size:11px;width:50px;">Type&nbsp;:</td>
		   <td class="td1"><select name="CompoType" id="CompoType" style="font-size:11px; width:120px; height:18px;" disabled>
		   <option value="Earning">&nbsp;Earning</option><option value="Deducted">&nbsp;Deducted</option></select></td>
		 </tr>
		  <tr>
		   <td class="td1" style="font-size:11px; width:50px;"><input type="checkbox" name="ConPF" id="ConPF" onClick="Checked()" disabled/></td>
		   <td style="font-size:11px;">Consider for PF</td><td style="width:20px;">&nbsp;</td>
		   <td class="td1" style="font-size:11px;width:50px;"><input type="checkbox" name="Lumpsum" id="Lumpsum" onClick="Checked()" disabled/></td>
		   <td style="font-size:11px;">Lumpsum</td><td style="width:20px;">&nbsp;</td>
		   <td class="td1" style="font-size:11px;width:50px;"><input type="checkbox" name="Prorata" id="Prorata" onClick="Checked()" disabled/></td>
		   <td style="font-size:11px;">Pro rata</td>
		 </tr>
		  <tr>
		   <td class="td1" style="font-size:11px; width:50px;"><input type="checkbox" name="ConPTax" id="ConPTax" onClick="Checked()" disabled/></td>
		   <td style="font-size:11px;">Consider for P-Tax</td><td style="width:20px;">&nbsp;</td>
		   <td class="td1" style="font-size:11px;width:50px;"><input type="checkbox" name="ConESIC" id="ConESIC" onClick="Checked()" disabled/></td>
		   <td style="font-size:11px;">Consider for ESIC</td><td style="width:20px;">&nbsp;</td>
		   <td class="td1" style="font-size:11px;width:50px;"><input type="checkbox" name="ConTDS" id="ConTDS" onClick="Checked()" disabled/></td>
		   <td style="font-size:11px;">Consider for TDS</td>
		 </tr>
		 <tr>
		   <td class="td1" style="font-size:11px; width:50px;"><input type="checkbox" name="ConArrCalcu" id="ConArrCalcu" onClick="Checked()" disabled/></td>
		   <td style="font-size:11px;" colspan="3">Consider for arrears calculation</td>
		   <td style="font-size:11px;">&nbsp;</td><td style="width:20px;">&nbsp;</td>
		   <td class="td1" style="font-size:11px;width:50px;"><input type="checkbox" name="EstimateTDS" id="EstimateTDS" onClick="Checked()" disabled/></td>
		   <td style="font-size:11px;">Estimate for TDS</td>
		 </tr>
		  <tr>
		   <td class="td1" style="font-size:11px; width:50px;"><input type="checkbox" name="DedIncTax" id="DedIncTax" onClick="Checked()" disabled/></td>
		   <td style="font-size:11px;" colspan="3">Deduction Incremental Tax</td>
		   <td style="font-size:11px;">&nbsp;</td><td style="width:20px;">&nbsp;</td>
		   <td class="td1" style="font-size:11px;width:50px;">&nbsp;</td>
		   <td style="font-size:11px;">&nbsp;</td>
		 </tr>
	   </table>
	 </td>
	 
	 
	 
	 
	 <td class="td1" style="font-size:11px; width:100px;" valign="top">
	   <table>
	     <tr>
		   <td>&nbsp;</td>
	       <td valign="top">
		          <select style="width:180px; background-color:#F1EDF8;" name="CompoSelect" id="CompoSelect" size="10" onChange="selectComponent(this.value)">
		   <?php $SqlCompo=mysql_query("select * from hrm_paycomponent where PayCompoStatus='A' AND CompanyId=".$CompanyId." order by CompoName ASC", $con); 
		         while($ResCompo=mysql_fetch_array($SqlCompo)) { ?>
				 <option value="<?php echo $ResCompo['PayCompoId']; ?>">&nbsp;<?php echo $ResCompo['CompoName']; ?></option><?php } ?>
				 </select>
		  </td>
		 </tr>
	  </table>
	 </td>
	  
   </tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>
   <tr>
   <table border="0" style="width:750px;" align="right" class="fontButton">
	  <tr>	 
		 <td align="right"><input type="button" name="Changebtn" id="Changebtn" style="width:90px; display:none;" value="change" onClick="changeV()">
		                   <input type="submit" name="ChangeCompo" id="ChangeCompo" style="width:90px; display:none;" value="save"></td>
		 <td align="right" style="width:70px;"><input type="button" name="DeleteCompo" id="DeleteCompo" value="delete" style="width:90px; display:none;" onClick="deletePayCompo()">
		                                       <input type="button" name="AddNewBtn" id="AddNewBtn" style="width:90px; display:block;" value="add new" onClick="addNew()">
											   <input type="submit" name="AddNewCompo" id="AddNewCompo" style="width:90px; display:none;" value="save"></td>
		 <td align="right" style="width:70px;"><input type="button" name="RefreshCompo" id="RefreshCompo" style="width:90px;" value="refresh" onClick="javascript:window.location='PaySlipCompo.php'"/></td>
		</tr>
	</table>
  </td> 
  
 </tr>
<?php } ?>
</table>
</form>     
</td>
<?php //*********************************************** Close Pay Component******************************************************?>    

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
