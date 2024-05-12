<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//*****************************************************/

if(isset($_POST['ImportFile']))
{ 
 
 if ($_FILES['csv_file']['error']>0){ echo "Error:".$_FILES['csv_file']['error']."<br />"; }
 else
 {  
  if(($handle = fopen($_FILES['csv_file']['tmp_name'], "r"))!== FALSE) 
  {
    $ctr=1; 
    while(($data = fgetcsv($handle, 1000, ","))!== FALSE) 
    { 
     $c0 = mysql_real_escape_string($data[0]); $c1 = mysql_real_escape_string($data[1]);
	 $c2 = mysql_real_escape_string($data[2]); $c3 = mysql_real_escape_string($data[3]);
	 $c4 = mysql_real_escape_string($data[4]); $c5 = mysql_real_escape_string($data[5]);
	 $c6 = mysql_real_escape_string($data[6]); $c7 = mysql_real_escape_string($data[7]);
	 
	 if($ctr>1 AND $c0>0 AND $c1!='') 
	 { 
	  $sqlEI=mysql_query("select EmployeeID from hrm_employee where EmpCode=".$c0." AND CompanyId=".$CompanyId, $con); $resEI=mysql_fetch_assoc($sqlEI);
	  if($resEI['EmployeeID']!='')
      { 
	  
	    if($_POST['CompoN']>0)
		{
		 if($_POST['CompoN']==1){ $sqlUp=mysql_query("update hrm_employee_general set BankName='".$c1."', AccountNo='".$c2."', BankIfscCode='".$c3."', BranchName='".$c4."', BranchAdd='".$c5."' where EmployeeID=".$resEI['EmployeeID'], $con); }
		 
		 elseif($_POST['CompoN']==2){ $sqlUp=mysql_query("update hrm_employee_personal set PassportNo='".$c1."',PassportNo_YN='Y',Passport_ExpiryDateFrom='".date("Y-m-d",strtotime($c2))."',Passport_ExpiryDateTo='".date("Y-m-d",strtotime($c3))."' where EmployeeID=".$resEI['EmployeeID'], $con); }
		 
		 elseif($_POST['CompoN']==3){ $sqlUp=mysql_query("update hrm_employee_personal set DrivingLicNo='".$c1."',DrivingLicNo_YN='Y',Driv_ExpiryDateFrom='".date("Y-m-d",strtotime($c2))."',Driv_ExpiryDateTo='".date("Y-m-d",strtotime($c3))."' where EmployeeID=".$resEI['EmployeeID'], $con); }
		 
		 elseif($_POST['CompoN']==4){ $sqlUp=mysql_query("update hrm_employee_contact set Curradd='".$c1."', CurrAdd_State=".$c2.", CurrAdd_City=".$c3.", CurrAdd_PinNo='".$c4."' where EmployeeID=".$resEI['EmployeeID'], $con); }
		 
		 elseif($_POST['CompoN']==5){ $sqlUp=mysql_query("update hrm_employee_contact set ParAdd='".$c1."',ParAdd_State=".$c2.", ParAdd_City=".$c3.", ParAdd_PinNo=".$c4." where EmployeeID=".$resEI['EmployeeID'], $con); }
		 
		}
		else
		{
		  if($_POST['CompoN']=='MobileNo_Vnr' OR $_POST['CompoN']=='MobileNo2_Vnr' OR $_POST['CompoN']=='EmailId_Vnr' OR $_POST['CompoN']=='InsuCardNo' OR $_POST['CompoN']=='EsicNo' OR $_POST['CompoN']=='PfAccountNo' OR $_POST['CompoN']=='PF_UAN')
		  {
		  //General Table 
		  $sqlUp=mysql_query("update hrm_employee_general set ".$_POST['CompoN']."='".$c1."' where EmployeeID=".$resEI['EmployeeID'], $con);
	   	  }
		  elseif($_POST['CompoN']=='MobileNo' OR $_POST['CompoN']=='EmailId_Self' OR $_POST['CompoN']=='AadharNo' OR $_POST['CompoN']=='Categoryy' OR $_POST['CompoN']=='Religion' OR $_POST['CompoN']=='BloodGroup')
		  {
		  //Personal Table 
		  $sqlUp=mysql_query("update hrm_employee_personal set ".$_POST['CompoN']."='".$c1."' where EmployeeID=".$resEI['EmployeeID'], $con);
		  }
		}
		
      }
	 } 	
	 
     else { $ctr++; }
    }
   fclose($handle);
   
   if($sqlUp){ $msg='Records uploaded successfully...';}
  }
 }
 
}

?>


<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.inpSel{font-family:Times New Roman;font-size:14px;height:22px; font-weight:bold;}
.inp2Sel{font-family:Times New Roman;font-size:12px;height:22px;}
.td1{ text-align:center;font-family:Times New Roman;color:#FFFFFF;font-size:14px; }
.td2{ text-align:center;font-family:Times New Roman;font-size:12px; }
.td3{ font-family:Times New Roman;font-size:16px;color:#003300;width:150px;font-weight:bold; } 
.msg{ font-family:Times New Roman;font-size:18px;color:#004200;}
</style>
<Script type="text/javascript">//window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">

function FunCompo(v)
{ 
 if(v==''){ alert("Please select Component!"); return false;}
 else{ window.location="ImportEmpData.php?vtu="+v; }
} 
 
function FunChek(v)
{
 if(document.getElementById("CMonth").value==''){alert("Please select Month!"); return false;}
 else if(v==1){ document.getElementById("Chk2").style.display='block'; document.getElementById("Chk1").style.display='none'; document.getElementById("csv_file").disabled=true; document.getElementById("File_Up").disabled=true; }
 else if(v==2){ document.getElementById("Chk1").style.display='block'; document.getElementById("Chk2").style.display='none'; document.getElementById("csv_file").disabled=false; document.getElementById("File_Up").disabled=false; }
}         

function validate(FormImp) 
{ 
  if(document.getElementById("CMonth").value==''){alert("Please select Month!"); return false;}
  else if(document.getElementById("Compo").value==''){alert("Please select Component!"); return false;}
  else
  { var cmp=document.getElementById("Compo").value;
    var agree=confirm("Are you sure you want to upload Employee data component ?");
	if(agree){return true;}else{return false;}
  }
}

function FunTxls()
{ window.open("FormateFile.php?act=FileOpen","MyFile","width=200,height=200");}
    
</script>

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
<?php //**********************************************************************?>
<?php //*******************START*****START*****START******START******START***********************?>
<?php //******************************************************************?>	
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td align="" width="400" class="heading">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Import CSV File (Employee Data)</u> </td>	
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>

 <td width="17">&nbsp;</td>
<?php $prevm=date('m', strtotime("-1 months",strtotime(date("Y-m-d")))); ?> 
<?php if($_SESSION['User_Permission']=='Edit'){?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
 <table border="0" width="100%" cellspacing="0">
 <tr>
  <td align="left" width="100%">
	<table width="" border="0">
<form name="FormImp" method="POST" enctype="multipart/form-data" onSubmit="return validate(this)">

 <tr style="height:20px;">
  <td class="td3" style="width:250px;">Employee Data Components:</td>
  <td class="td3">
   <select class="Inp2Sel" style="width:300px;" id="Compo" name="CompoN" onChange="FunCompo(this.value)">
    <option value="">SELECT</option>
	<option value="MobileNo_Vnr" <?php if($_REQUEST['vtu']=='MobileNo_Vnr'){echo 'selected';}?>>Offical MobileNo 1</option>
	<option value="MobileNo2_Vnr" <?php if($_REQUEST['vtu']=='MobileNo2_Vnr'){echo 'selected';}?>>Offical MobileNo 2</option>
	<option value="EmailId_Vnr" <?php if($_REQUEST['vtu']=='EmailId_Vnr'){echo 'selected';}?>>Offical EmailId</option>
	<option value="InsuCardNo" <?php if($_REQUEST['vtu']=='InsuCardNo'){echo 'selected';}?>>Insurance Card Number</option>
	<option value="EsicNo" <?php if($_REQUEST['vtu']=='EsicNo'){echo 'selected';}?>>ESIC Number</option>
	<option value="PfAccountNo" <?php if($_REQUEST['vtu']=='PfAccountNo'){echo 'selected';}?>>PF Account Number</option>
	<option value="PF_UAN" <?php if($_REQUEST['vtu']=='PF_UAN'){echo 'selected';}?>>PF UAN Number</option>
	
	<option value="MobileNo" <?php if($_REQUEST['vtu']=='MobileNo'){echo 'selected';}?>>Personal MobileNo</option> 
	<option value="EmailId_Self" <?php if($_REQUEST['vtu']=='EmailId_Self'){echo 'selected';}?>>Personal EmailId</option>
	<option value="AadharNo" <?php if($_REQUEST['vtu']=='AadharNo'){echo 'selected';}?>>Aadhar Number</option>
	<option value="Categoryy" <?php if($_REQUEST['vtu']=='Categoryy'){echo 'selected';}?>>Cast</option>
	<option value="Religion" <?php if($_REQUEST['vtu']=='Religion'){echo 'selected';}?>>Religion</option>
	<option value="BloodGroup" <?php if($_REQUEST['vtu']=='BloodGroup'){echo 'selected';}?>>Blood Group</option>
	
	<option value="1" <?php if($_REQUEST['vtu']=='1'){echo 'selected';}?>>Bank Details</option>
	<option value="2" <?php if($_REQUEST['vtu']=='2'){echo 'selected';}?>>Passport Details</option>
	<option value="3" <?php if($_REQUEST['vtu']=='3'){echo 'selected';}?>>Driving Lic. Details</option>
	<option value="4" <?php if($_REQUEST['vtu']=='4'){echo 'selected';}?>>Current Address</option>
	<option value="5" <?php if($_REQUEST['vtu']=='5'){echo 'selected';}?>>Parmanent Address Details</option>
   </select>
  </td>
  
 </tr>
 
 <tr><td colspan="3">&nbsp;</td></tr>
 <tr>
  <td class="td3"><b><i>upload file formate</i></b>: </td>
  <td class="td3" colspan="10"><font color="#FF0000">Col-1:</font> Employee Code<br> 
  <?php if($_REQUEST['vtu']>0){ $col2=''; $col3=''; $col4=''; $col5=''; $col6='';
  if($_REQUEST['vtu']==1){ $col2='Bank Name'; $col3='A/c Number'; $col4='Bank IFSC Code'; $col5='Brnach Name'; $col6='Bank Address'; }
  elseif($_REQUEST['vtu']==2){ $col2='Passport Number'; $col3='Valid From'; $col4='Valid To'; }
  elseif($_REQUEST['vtu']==3){ $col2='Driving Lic. Number'; $col3='Valid From'; $col4='Valid To'; }
  elseif($_REQUEST['vtu']==4){ $col2='Current Address'; $col3='StateId'; $col4='CityId'; $col5='PinNo'; }
  elseif($_REQUEST['vtu']==5){ $col2='Parmanent Address'; $col3='StateId'; $col4='CityId'; $col5='PinNo'; }
  ?>
  <font color="#FF0000">Col-2:</font> <?=$col2;?><br> <font color="#FF0000">Col-3:</font> <?=$col3;?><br> <font color="#FF0000">Col-4:</font> <?=$col4;?><br> <font color="#FF0000">Col-5:</font> <?=$col5;?><br> <font color="#FF0000">Col-6:</font> <?=$col6;?><br>
  <?php }else{ ?><font color="#FF0000">Col-2:</font> <?=$_REQUEST['vtu'];?> Details<?php } ?>
  </td>
 </tr>
 <tr><td colspan="3">&nbsp;</td></tr>
 <tr style="height:20px;background-color:#FFFF80;">
  <td class="td3">Browse File:</td>
  <td><input type="file" name="csv_file" id="csv_file" style="width:100%;" size="30"/></td>
  <td style="width:10px;"></td>
  <td><input type="submit" name="ImportFile" id="File_Up" value="Upload"/></td>
 </tr>

 <tr>
  <td colspan="3" class="msg"><i><?php echo '<br>'.$msg; ?></i></td>
 </tr> 
</form>  
	 </table>
  </td>  
</tr>
  </table>  
  </td>
  <?php } ?>   
 </tr> 
</table>
<?php } ?>

<?php //******************************************************************************************?>
<?php //**********END*****END*****END******END******END*********************?>
<?php //***************************************************************************?>
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

