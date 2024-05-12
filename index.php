<?php session_start();  
	  require_once('AdminUser/config/config.php');
      require_once("AdminUser/logcheck.php");
	  require_once('AdminUser/codeEncDec.php'); //include('codeEncDec.php');
	  require_once("login.php");

?>
<html>
<head>
<title><?php include_once('Title.php'); ?></title>

<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="swc.css">

<script type="text/javascript">
function EmpSS()
{ document.getElementById("AdminCell").style.display="block"; document.getElementById("ContactCell").style.display="none";}
function Contact()
{ document.getElementById("AdminCell").style.display="none"; document.getElementById("ContactCell").style.display="block";}

function validateAdminEmp()
{ var companyadmin = document.getElementById("companyadmin").value; 
  var username = document.getElementById("username").value; var userpass = document.getElementById("userpass").value; 	
  if(companyadmin=="0") { alert("You must select a company name.."); return false; }
  if(username.length === 0) { alert("Enter Your Login ID/ Name."); return false; }	
  if(userpass.length === 0) { alert("Enter your Password.."); return false; }
  if(username.length!='' && userpass.length!=''){ return true; }
}

function ActiveYearA(value)
{  if(value==1){document.getElementById("yearA_1").style.display='block'; document.getElementById("yearA_2").style.display='none';
                document.getElementById("yearA_3").style.display='none'; }
   else if(value==2){document.getElementById("yearA_2").style.display='block'; document.getElementById("yearA_1").style.display='none';
                     document.getElementById("yearA_3").style.display='none'; }
   else if(value==3){document.getElementById("yearA_3").style.display='block'; document.getElementById("yearA_1").style.display='none';
                     document.getElementById("yearA_2").style.display='none'; }			 
}

</script>


</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#FFFFFF">
<?php 
$sql_1 = mysql_query("SELECT FromDate,ToDate FROM hrm_year where Company1Status='A'", $con); $res_1=mysql_fetch_assoc($sql_1);
$sql_2 = mysql_query("SELECT FromDate,ToDate FROM hrm_year where Company2Status='A'", $con); $res_2=mysql_fetch_assoc($sql_2);
$sql_3 = mysql_query("SELECT FromDate,ToDate FROM hrm_year where Company3Status='A'", $con); $res_3=mysql_fetch_assoc($sql_3);
$sql_4 = mysql_query("SELECT FromDate,ToDate FROM hrm_year where Company4Status='A'", $con); $res_3=mysql_fetch_assoc($sql_4);
?>
<!--<div id="boxes">-->
<!--        <div style="top: 10% !important; left: 50%; display: none;" id="dialog" class="window">-->
<!--            <div id="san">-->
<!--                <a href="#" class="close agree"><img src="close-icon.png" width="25"-->
<!--                        style="float:right; margin-right: -25px; margin-top: -20px;"></a>-->
<!--                <img src="happy_new_year.jpg" width="450">-->
<!--            </div>-->
<!--        </div>-->
<!--        <div style="width: 2478px; font-size: 32pt; color:white; height: 1202px; display: none; opacity: 0.4;"-->
<!--            id="mask"></div>-->
<!--    </div>-->
<center>
<table border="0" style="margin-top:20px;margin-bottom:20px;margin-left:20px;margin-right:20px;width:1050px;height:550px;" align="center" cellpadding="2" cellspacing="0">
  <tr style="background-color:#24740A;">
   <td>
    <table border="0" style="width:1050px;height:550px;" cellpadding="0" cellspacing="0">
	 <tr style="height:22px; background-color:#B0FB4D;background-image:url(images/b1.jpg);">
	  <td colspan="2" style="width:1050px;" align="right" valign="bottom"> <a href="#" onClick="EmpSS()" alt="LoginForm" style="text-shadow:#DAE40E;color:#FFFFFF;font-family:Times New Roman;font-size:18px;text-shadow:2px 2px 3px #24740A;text-decoration:none;"><b>Employee Self Services(ESS)</b>&nbsp;&nbsp;
	  <a href="#" onClick="Contact()" alt="Contact Form" style="text-shadow:#DAE40E;color:#FFFFFF;font-family:Times New Roman;font-size:18px;text-shadow:2px 2px 3px #24740A;text-decoration:none;"><b>Contact Us</b>&nbsp;&nbsp;</td>
	 </tr>
	 <tr style="height:15px; background-color:#FFFFFF;">
	  <td colspan="2" style="width:1050px;" align="right" valign="bottom"></td>
	 </tr>
	 <tr style="height:22px;">
	  <td style="background-color:#B0FB4D;" align="right" valign="bottom">&nbsp;</td> 
<?php /////////////// Open ?>	 
	  <td rowspan="2" style="width:820px;background-color:#FFFFFF;background-image:url(images/b4.jpg);background-repeat:no-repeat;" align="center" valign="top">
<table border="0" style="height:200px;margin-top:100px;width:810px;">
<?php //Login Open ?>	
<tr>
 <td id="AdminCell" style="display:block;" align="center" valign="top">
  <table>
   <tr>
    <td>
<form name="formadmin" onSubmit="return validateAdminEmp(this)" method="post">
<table border="0" cellspacing="0" align="center">
 <tr><td align="center" colspan="2" style="height:50px;text-shadow:#DAE40E;color:#000000;font-family:Times New Roman;font-size:22px;text-shadow:2px 2px 3px #24740A;">Login (ESS)<?php /*	 <img src="images/adminuser_login.png"> */ ?></td></tr>
 <tr><td style="font-family:Georgia; font-size:13px;color:#000000;">Company &nbsp;:&nbsp;</td>
	 <td><select name="companyadmin" id="companyadmin" onChange="ActiveYearA(this.value)" style="background-color:#C4FFC4; size:20px; width:160px; height:20px; font-size:12px;">
		 <?php /*<option value="0" style="width:200px;">&nbsp;&nbsp; Select</option>*/ ?>
	 <?php $SqlCompany=mysql_query("select * from hrm_company_basic where Status='A'", $con); while($ResCompany=mysql_fetch_assoc($SqlCompany)){ ?> 
		 <option style="width:200px;" value="<?php echo $ResCompany['CompanyId']; ?>" <?php if($ResCompany['CompanyId']==1){echo 'selected';} ?>><?php echo '&nbsp;'.strtoupper($ResCompany['CompanyName']); ?></option>
		 <?php } ?>
		 </select>
	 </td>
</tr><tr><td style="font-family:Georgia; font-size:13px;color:#000000;">Login ID/ Name &nbsp;:&nbsp;</td><td><input class="text_login" name="username" id="username"  maxlength="10"></td>
</tr><tr><td style="font-family:Georgia; font-size:13px;color:#000000;">Password &nbsp;:&nbsp;</td><td><input class="text_login" type="password" name="userpass" id="userpass"  maxlength="15"></td></tr>
</tr><tr><td style="font-family:Georgia; font-size:13px;color:#000000;">Year &nbsp;:&nbsp;</td><td style="font-family:Times New Roman;font-size:16px;color:#005300; font-weight:bold;">
<span id="yearA_1" style="display:block;"><?php echo date("Y",strtotime($res_1['FromDate'])).' to '.date("Y",strtotime($res_1['ToDate'])); ?></span>
<span id="yearA_2" style="display:none;"><?php echo date("Y",strtotime($res_2['FromDate'])).' to '.date("Y",strtotime($res_2['ToDate'])); ?></span>
<span id="yearA_3" style="display:none;"><?php echo date("Y",strtotime($res_3['FromDate'])).' to '.date("Y",strtotime($res_3['ToDate'])); ?></span>
<span id="yearA_4" style="display:none;"><?php echo date("Y",strtotime($res_4['FromDate'])).' to '.date("Y",strtotime($res_4['ToDate'])); ?></span>
</td></tr>
 <tr><td colspan="2" align="right">
		<input type="hidden" value="<?php echo $logadmin; ?>" name="LoginAdmin"/><input type="hidden" value="<?php echo $LogLogin; ?>" name="LoginEmp"/>
		<input type="submit" id="submit" name="LoginAdminEmp" value="Login"/>
		<input type="button" name="Cancel" value="Refresh" onClick="javascript:window.location='index.php'"/></td></tr>
</table>
</form>	
	</td>
   </tr>
  </table>
 </td>
</tr>
<?php //Login Close ?>		
<tr>	
  <td id="ContactCell" style="display:none;" valign="top" style="width:500px;">
<form name="formemp" onSubmit="return validateEmp(this)" method="post">
	<table border="0" cellspacing="0" align="center">
	 <tr><td align="center" colspan="2" style="height:50px;text-shadow:#DAE40E;color:#000000;font-family:Times New Roman;font-size:22px;text-shadow:2px 2px 3px #24740A;">Contact Us<?php /*<img src="images/contactus.png"> */ ?></td></tr>
	  <tr>
	  <td align="" style="width:250px;" valign="top">
       <table>
	    <tr><td style=" font-family:Georgia; color:#005100; font-size:12px; font-weight:bold;"><u>OFFICE </u>:</td></tr>
		<tr><td style=" font-family:Georgia; font-size:13px; color:#000000;">"Corporate Center"<br>Canal Road Crosing, Ring Road No. 01, <br> Raipur 492006 (C.G.) INDIA <br> Telphone : 91 771-4350005<br><br></td></tr>
	   </table>
	   </td>
	   <td valign="top">
	   <table>
		<tr><td style=" font-family:Georgia; color:#005100; font-size:12px; font-weight:bold;"><u>CONTACT </u>:</td></tr>
		<tr><td style=" font-family:Georgia; font-size:13px;color:#000000;">HR Department</td></tr>
		
	   </table>
	  </td>
	 </tr> 
	</table>
</form>
  </td>		   		  		  				
</tr>
</table> 
	  </td>
<?php /////////////// Close ?>
	 </tr>
	 <tr style="height:380px;background-color:#B0FB4D;">
	  <td align="center" valign="top"><br>
		  <img src="images/LogoNew.png" border="0" style="height:213px;width:160px;"><br><br>
		  <br><br><br>
		  <b style="font-size:12px;color:#004000;font-family:Arial;font-weight:bold;text-shadow: 2px 2px 6px #ECF5ww;">Our Corporate Website&nbsp;<br><a href="#" onClick="javascript:window.open('http://www.vnrseeds.com','VNR')" style="text-decoration:none;"><img src="images/combtn.png" border="0" /></a><br></b>
	  </td>
	 </tr>
     <tr style="background-color:#FFFFFF;">
	  <td colspan="2">
	    <table cellpadding="0" cellspacing="0">
<tr style="height:80px;">
  <td style=" background-color:#FFFFFF;width:1050px;height:38px;" align="center">
    <table style="width:1000px;" border="0" cellspacing="0" cellpadding="0">
     <tr style="height:10px;">
	  <td style="width:400px;background-color:#FFFFFF;"></td>
	  <td style="width:200px;background-color:#FFFFFF;"></td>
	  <td style="width:400px;background-color:#FFFFFF;"></td>
	 </tr>
	 <tr style="height:10px;">
	   <td style="width:400px;background-color:#FFCC00;"></td>
	   <td style="width:200px;font-family:Arial Black;font-size:20px;font-weight:bold;color:#004000;" rowspan="3" align="center"><img src="images/Vnrseed.png" border="0" style="width:195px;height:26px;" /></td>
	   <td style="width:400px;background-color:#FFCC00;"></td>
	 </tr> 
	 <tr style="height:6px;"><td style="width:400px;background-color:#FFFFFF;"></td><td style="width:400px;background-color:#FFFFFF;"></td></tr> 
	 <tr style="height:10px;"><td style="width:400px;background-color:#FFCC00;"></td><td style="width:400px;background-color:#FFCC00;"></td></tr> 
	 
	 <tr style="height:10px;">
	  <td style="width:400px;background-color:#FFFFFF;"></td>
	  <td style="width:200px;font-family:Arial Black;font-size:12px;color:#000000; font-stretch:normal;" align="center" valign="middle">GOOD SEED BETTER YIELD</td>
	  <td style="width:400px;background-color:#FFFFF;"></td>
	 </tr> 
    </table>		
  </td>
</tr>
<tr style="height:30px;background-image:url(images/b1.jpg);">
  <td valign="middle" align="center"><a href="#" style="color:#FFFFFF;"><strong>Terms of Use</strong></a><strong class="blye-text-regular" style="color:#FFFFFF;"> | </strong><a href="#" style="color:#FFFFFF;"><strong>Privacy Statement </strong></a>
  &nbsp;&nbsp;<a href="#" style="color:#FFFFFF; text-decoration:none;"><strong>Copyright &copy; VNR Seeds Pvt Ltd. All rights reserved. Designed by</strong></a>
  
  <a href="http://www.vnrseeds.com" style="color:#004000;text-decoration:none;"><strong>VNR SEEDS PVT. LTD.<strong></a></td></tr>
		</table>
	  </td>
	 </tr>

	 
   
  
    </table>
 </td>	
 </tr>
</table>
</center>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
    <script src="swc.js"></script>
</body>
</html>