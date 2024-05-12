<?php session_start();  
	  require_once('AdminUser/config/config.php');
      require_once("AdminUser/logcheck.php");
	  require_once("login.php");
?>
<html>
<head>
<title><?php include_once('Title.php'); ?></title>
<meta NAME="Keywords" CONTENT="<?php include_once('ContentKey.php'); ?>"/>
<meta NAME="Description" CONTENT="<?php include_once('ContentDes.php'); ?>"/>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />
<script type="text/javascript" src="AdminUser/js/Prototype.js"></script>
<script type="text/javascript" src="js/jquery-1.3.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
<script type="text/javascript">
$(document).ready(function(){ $('#myslides').cycle({ fx: 'fade', speed: 3500, timeout: 2000	});	}); 

function Home()
{ document.getElementById("Home").style.display="block";document.getElementById("AdminCell").style.display="none";document.getElementById("EmpCell").style.display="none";}
function AdminLogin()
{ document.getElementById("Home").style.display="none";document.getElementById("AdminCell").style.display="block";document.getElementById("EmpCell").style.display="none";}
function EmpLogin()
{ document.getElementById("Home").style.display="none";document.getElementById("AdminCell").style.display="none";document.getElementById("EmpCell").style.display="block";}

function validateAdmin()
{
  var companyadmin = document.getElementById("companyadmin").value; 
  var username = document.getElementById("username").value; var userpass = document.getElementById("userpass").value; 
  if(companyadmin=="0") { alert("You must select a company name.."); return false; }	
  if(username.length === 0) { alert("You must enter a user name.."); return false; }	
  if(userpass.length === 0) { alert("You must enter a user password.."); return false; }
}

function validateEmp(){
  var companyemp = document.getElementById("companyemp").value; 
  var empcode = document.getElementById("empcode").value; var emppass = document.getElementById("emppass").value; 
  var Numfilter=/^[0-9]+$/;  var test_num1 = Numfilter.test(empcode);
  var booltest=/^[0-9a-zA-Z]+$/;  var test_bool1 = booltest.test(emppass);
  if(companyemp=="0") { alert("You must select a company name.."); return false; }	
  if (empcode.length === 0)  { alert("You must enter a Emp Code.."); return false; }	
  if(test_num1==false)       { alert('Please Enter Only Number in the Emp Code Field');  return false; }	
  if (emppass.length === 0)  { alert("You must enter a Password..");  return false; }	
  if(test_bool1==false)      { alert('Please Enter Only Alphabets and Numeric Allow in the Emp password Field'); return false; }
}

function validateHod(){
  var companyhod = document.getElementById("companyhod").value; 
  var empcodeHod = document.getElementById("empcodeHod").value; var emppassHod = document.getElementById("emppassHod").value; 
  var Numfilter=/^[0-9]+$/;  var test_num1 = Numfilter.test(empcodeHod);
  var booltest=/^[0-9a-zA-Z]+$/;  var test_bool1 = booltest.test(emppassHod);
  if(companyhod=="0") { alert("You must select a company name.."); return false; }	
  if (empcodeHod.length === 0)  { alert("You must enter a Emp Code.."); return false; }	
  if(test_num1==false)       { alert('Please Enter Only Number in the Emp Code Field');  return false; }	
  if (emppassHod.length === 0)  { alert("You must enter a Password..");  return false; }	
  if(test_bool1==false)      { alert('Please Enter Only Alphabets and Numeric Allow in the Emp password Field'); return false; }
}

function ActiveYearA(value)
{ 
    var url = 'SelectYear.php';	var pars = 'idA='+value; var myAjax = new Ajax.Request(
	url, { 	method: 'post',  parameters: pars, 	onComplete: show_SelectYearA	}); }
	
function show_SelectYearA(originalRequest)
{ document.getElementById('yearA').innerHTML = originalRequest.responseText; }

function ActiveYearE(value)
{ 
    var url = 'SelectYear.php';	var pars = 'idE='+value;	var myAjax = new Ajax.Request(
	url, { 	method: 'post',  parameters: pars, 	onComplete: show_SelectYearE	});  }
	
function show_SelectYearE(originalRequest)
{ document.getElementById('yearE').innerHTML = originalRequest.responseText; }


function ActiveYearH(value)
{ 
    var url = 'SelectYear.php';	var pars = 'idE='+value;	var myAjax = new Ajax.Request(
	url, { 	method: 'post',  parameters: pars, 	onComplete: show_SelectYearH	});  }
	
function show_SelectYearH(originalRequest)
{ document.getElementById('yearH').innerHTML = originalRequest.responseText; }

</script>
</head>

<body background="images/back.png" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="1000" border="0" style="margin-top:50px;" align="center" cellpadding="0" cellspacing="0">
  <tr><td background="images/index_011.png" width="1000" height="182" align="right" valign="middle">
 <?php /*<img src="images/VNRLogo.png" border="0"> <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="96" height="100">
    <param name="movie" value="swf/vnr_logo.swf">
    <param name="quality" value="high">
    <embed src="swf/vnr_logo.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="96" height="100"></embed>
  </object> */?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </td></tr>
  <tr><td>  
<?php //require_once("unset.php"); ?>
	    <table width="100%" border="0" bgcolor="#7a6189" cellspacing="0" cellpadding="0">
           <tr><td>&nbsp;</td>
		       <td>
			       <table width="100%" border="0" cellspacing="0" cellpadding="0">
				     <tr><td style="height:30px;">&nbsp;</td></tr>
                     <tr><td><a href="index.php"><img src="images/index_03.gif" onClick="Home()" alt="" width="228" border="0"></a></td></tr>
                     <tr><td><a href="#"><img src="images/index_05.gif" onClick="AdminLogin()" alt="Admin_Login" width="228" height="40" border="0"></a></td></tr>
                     <tr><td><a href="#"><img src="images/index_06.gif" onClick="EmpLogin()" alt="Emp_Login" width="228" height="40" border="0"></a></td></tr>
                     <tr><td><a href="#"><img src="images/index_07.gif" alt="" width="228" height="40" border="0"></a></td></tr>
                     <tr><td><a href="#"><img src="images/index_08.gif" alt="" width="228" border="0"></a></td></tr>
					 <tr><td style="height:30px;">&nbsp;</td></tr>
                  </table>
			  </td>
			  
              <td width="695" id="Home" style="display:block;" align="center">
			     <div id="myslides" style=" border:0; "> 
		         <img src="images/head1.png" border="0"/><img src="images/head2.png" border="0"/><img src="images/head3.png" border="0"/><img src="images/head4.png" border="0"/><img src="images/head6.png" border="0"/>
	             </div> 
			 
			  </td>
			  
			   <td width="700" background="images/tophead.png" id="AdminCell" style="display:none;">
			     <form name="formadmin" onSubmit="return validateAdmin(this)" method="post">
				   <table border="0" cellspacing="5" align="center">
					 <tr><td align="center" colspan="2"><img src="images/adminuser_login.png"></td></tr>
					 <tr><td>Company &nbsp;:&nbsp;</td>
						 <td><select name="companyadmin" id="companyadmin" onChange="ActiveYearA(this.value)" style="background-color:#85DDFA; size:20px; width:160px; height:20px; font-size:12px;">
							 <option value="0">&nbsp;&nbsp; Select</option>
						 <?php $SqlCompany=mysql_query("select * from hrm_company_basic where Status='A'", $con); while($ResCompany=mysql_fetch_assoc($SqlCompany)){ ?> 
							 <option style="background-color:#F3E9E9;" value="<?php echo $ResCompany['CompanyId']; ?>"><?php echo '&nbsp;'.$ResCompany['CompanyName']; ?></option>
							 <?php } ?>
							 </select>
						 </td>
				 </tr><tr><td>User Name &nbsp;:&nbsp;</td><td><input class="text_login" name="username" id="username"  maxlength="10"></td>
				 </tr><tr><td>User Password &nbsp;:&nbsp;</td><td><input class="text_login" type="password" name="userpass" id="userpass"  maxlength="15"></td></tr>
				 </tr><tr><td>Year &nbsp;:&nbsp;</td><td style="font-family:Times New Roman; font-size:16px; color:#F4B737; font-weight:bold;"><span id="yearA">&nbsp;</span></td></tr>
					 <tr></tr>
					 <tr></tr>
					 <tr><td colspan="2" align="right">
							<input type="hidden" value="<?php echo $logadmin; ?>" name="Login"/> 
							<input type="submit" id="submit" name="Admin" value="Submit"/>
							<input type="button" name="Cancel" value="Cancel" onclick="javascript:window.location='index.php'"/></td></tr>
				   </table>
                 </form>
			  </td>
			  <td width="700" background="images/tophead.png" id="EmpCell" style="display:none;">
			    <form name="formemp" onSubmit="return validateEmp(this)" method="post">
				   <table border="0" cellspacing="5" align="center">
					 <tr><td align="center" colspan="2"><img src="images/emp_login.png"></td></tr>
					 <tr><td>Company &nbsp;:&nbsp;</td>
						 <td><select name="companyemp" id="companyemp" onChange="ActiveYearE(this.value)" style="background-color:#85DDFA; size:20px; width:160px; height:20px; font-size:12px;">
							 <option value="0">&nbsp;&nbsp; Select</option>
						<?php $SqlCompany=mysql_query("select * from hrm_company_basic where Status='A'", $con); while($ResCompany=mysql_fetch_assoc($SqlCompany)){ ?> 
							 <option style="background-color:#F3E9E9;" value="<?php echo $ResCompany['CompanyId']; ?>"><?php echo '&nbsp;'.$ResCompany['CompanyName']; ?></option>
						<?php } ?>
							 </select>
					     </td>
				</tr><td>Emp Code &nbsp;:&nbsp;</td><td><input  name="empcode" class="text_login" id="empcode" maxlength="5"></td>
				</tr><tr><td>Emp Password&nbsp;:&nbsp;</td><td><input type="password" class="text_login" name="emppass" id="emppass"  maxlength="15"></td></tr>
				</tr><tr><td>Year &nbsp;:&nbsp;</td><td style="font-family:Times New Roman; font-size:16px; color:#F4B737; font-weight:bold;"><span id="yearE">&nbsp;</span></td></tr>
					<tr>
					    <td colspan="2" align="right">
					   <input type="hidden" value="<?php echo $logemp; ?>" value="" name="Login"/> 
					   <input type="submit" id="submit" name="Emp" value="Submit"/>
					   <input type="button" name="Cancel" value="Cancel" onclick="javascript:window.location='index.php'"/></td></tr>
					  <tr><td>&nbsp;&nbsp;</td></tr> 
					 </table>
                 </form>
			  </td>		  
           </tr>
		   <tr><td id="msg"></td></tr>
        </table>
	  </td></tr>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
	   <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <tr>
            <td width="699" valign="top">		
		       <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
				     <td height="10">
					    <table width="100%" border="0" cellspacing="7" cellpadding="0">
						   <tr>
                              <td width="36%" align="center"><a onclick="window.open('Terms.php','popup','width=550,height=400,scrollbars=yes,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0'); return false" href="Terms.php"><strong>Terms of Use</strong></a><strong class="blye-text-regular"> | </strong><a onclick="window.open('Privacy.php','popup','width=550,height=400,scrollbars=yes,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0'); return false" href="Privacy.php"><strong>Privacy Statement </strong></a></td>
                              <td width="64%" align="center"><font color="#CCCCCC"><strong>Copyright &copy; VNR Seeds.com. All rights reserved. Design by <strong></font><a href="http://www.vnrseeds.com" style="color:#CCCCCC; text-decoration:none;"><strong>VNR<strong></a></td>
                          </tr>
                          <tr><td>&nbsp;</td>
						  </tr>
                       </table>			
			        </td>
                 </tr>
              </table>
			</td>
          </tr>
       </table>
	</td>
  </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr><td></td></tr></table>
  <map name="Map"><area shape="rect" coords="579,74,676,114" href="#"></map>
</body>
</html>