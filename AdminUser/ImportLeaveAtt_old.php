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
 $M=$_POST['CMonth'];
 if(date("m")==01){ if($M==12){$Y=date("Y")-1;}else{$Y=date("Y");} }
 if(date("m")!=01){ $Y=date("Y");}
 if($_POST['CompoN']=='DA'){$ColName='DA';}elseif($_POST['CompoN']=='TDS'){$ColName='TDS';}elseif($_POST['CompoN']=='BONUS'){$ColName='Bonus';}elseif($_POST['CompoN']=='PPAY'){$ColName='PerformancePay';}elseif($_POST['CompoN']=='LEAVE_EnCASH'){$ColName='LeaveEncash';}elseif($_POST['CompoN']=='VAR_ADJUST'){$ColName='VariableAdjustment';}elseif($_POST['CompoN']=='VAR_REIM'){$ColName='VarRemburmnt';}elseif($_POST['CompoN']=='ARR_BASIC'){$ColName='Arr_Basic';}elseif($_POST['CompoN']=='ARR_HRA'){$ColName='Arr_Hra';}elseif($_POST['CompoN']=='ARR_SPECIAL'){$ColName='Arr_Spl';}elseif($_POST['CompoN']=='ARR_CONVEYANCE'){$ColName='Arr_Conv';}elseif($_POST['CompoN']=='ARR_ESIC'){$ColName='Arr_Esic';}elseif($_POST['CompoN']=='ARR_PF'){$ColName='Arr_Pf';}elseif($_POST['CompoN']=='VOL_CONT'){$ColName='VolContrib';}elseif($_POST['CompoN']=='Arr_LvEnCash'){$ColName='Arr_LvEnCash';}elseif($_POST['CompoN']=='YLta'){$ColName='YLta';}elseif($_POST['CompoN']=='YCea'){$ColName='YCea';}
 
 if ($_FILES['csv_file']['error']>0){ echo "Error:".$_FILES['csv_file']['error']."<br />"; }
 else
 {  
  if(($handle = fopen($_FILES['csv_file']['tmp_name'], "r"))!== FALSE) 
  {
    $ctr=1; 
    while(($data = fgetcsv($handle, 1000, ","))!== FALSE) 
    { 
     $c0 = mysql_real_escape_string($data[0]); $c1 = mysql_real_escape_string($data[1]);
	 $c2 = mysql_real_escape_string($data[2]);
	 if($ctr>1 AND $c0>0 AND $c2!='' AND $c2!=0) 
	 { 
	  $sqlEI=mysql_query("select EmployeeID from hrm_employee where EmpCode=".$c0." AND CompanyId=".$CompanyId, $con); $resEI=mysql_fetch_assoc($sqlEI);
	  if($resEI['EmployeeID']!='')
      { 
	    $sql=mysql_query("select * from hrm_employee_monthlypayslip where EmployeeID=".$resEI['EmployeeID']." AND Month=".$M." AND Year=".$Y, $con); $row=mysql_num_rows($sql);     
	    if($row>0)
		{ 
		  $sqlUp=mysql_query("update hrm_employee_monthlypayslip set ".$ColName."='".$c2."' where EmployeeID=".$resEI['EmployeeID']." AND Month=".$M." AND Year=".$Y, $con);
		} 
		else
		{
		  $sqlUp=mysql_query("insert into hrm_employee_monthlypayslip(EmployeeID, Month, Year, ".$ColName.") values(".$resEI['EmployeeID'].", ".$M.", ".$Y.", '".$c2."')", $con);
		}
      }
	 } 	
     else { $ctr++; }
    }
   fclose($handle);
   if($M==1){$SelM='January';} if($M==2){$SelM='February';} if($M==3){$SelM='March';} 
   if($M==4){$SelM='April';} if($M==5){$SelM='May';} if($M==6){$SelM='June';} 
   if($M==7){$SelM='July';} if($M==8){$SelM='August';} if($M==9){$SelM='September';} 
   if($M==10){$SelM='October';} if($M==11){$SelM='November';} if($M==12){$SelM='December';}
   if($sqlUp){ $msg='Records for month <u>'.$SelM.'</u> uploaded successfully...';}
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
.inp2Sel{font-family:Times New Roman;font-size:14px;height:22px;}
.td1{ text-align:center;font-family:Times New Roman;color:#FFFFFF;font-size:14px; }
.td2{ text-align:center;font-family:Times New Roman;font-size:12px; }
.td3{ font-family:Times New Roman;font-size:16px;color:#003300;width:150px;font-weight:bold; } 
.msg{ font-family:Times New Roman;font-size:18px;color:#004200;}
</style>
<Script type="text/javascript">//window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function Month(v)
{ if(v!=''){ window.location='ImportLeaveAtt.php?action=SelMonth&v='+v; } if(v==''){ window.location='ImportLeaveAtt.php?action=""'; }
}

function FunCompo(v)
{ 
 if(v==''){ alert("Please select Component!"); 
            document.getElementById("Chk2").style.display='none'; return false;}
 else{ document.getElementById("Chk2").style.display='block'; }
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
  { var cmp=document.getElementById("Compo").value; var M=document.getElementById("Mmonth").value;
    var agree=confirm("Are you sure you want to upload "+cmp+" component for month "+M+"?");
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
	  <td align="" width="400" class="heading">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Import CSV File (Salary Components)</u> </td>
	  <td class="td3"><b><a href="#" onClick="FunTxls('xls')"><i>upload file formate</i></a></b>&nbsp;</td>	
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
 <table border="0" width="1000" cellspacing="0">
 <tr>
  <td align="left" width="1000">
	<table width="" border="0">
<form name="FormImp" method="POST" enctype="multipart/form-data" onSubmit="return validate(this)">
 <tr>
  <td class="td3">Month :</td>
  <td class="td3">
      <select class="InpSel" style="width:120px;" id="CMonth" name="CMonth" onChange="Month(this.value)">
       <?php if($_REQUEST['action']=='SelMonth' AND $_REQUEST['v']!=''){?><option value="<?php echo $_REQUEST['v']; ?>"><?php echo date("F",strtotime(date("Y-".$_REQUEST['v']."-d"))); ?></option>
       <?php }else{?><option value="">Select Month</option><?php } ?><option value="<?php echo $prevm;?>"><?php echo date("F",strtotime(date("Y-".$prevm."-d")));?></option>
       <option value="<?php echo date("m");?>"><?php echo date("F",strtotime(date("Y-m-d")));?></option>
       
       <option value="03">March</option><option value="04">April</option><option value="05">May</option><option value="06">June</option>
       
       
      </select>
       <input type="hidden" id="Mmonth" value="<?php echo date("F",strtotime(date("Y-".$_REQUEST['v']."-d"))); ?>" /></td>
 </tr>
 <?php if($_REQUEST['action']=='SelMonth') { ?>
 <tr style="height:20px;">
  <td class="td3">Salary Component:</td>
  <td class="td3">
   <select class="Inp2Sel" style="width:300px;" id="Compo" name="CompoN" onChange="FunCompo(this.value)">
    <option value="">SELECT</option>
	<option value="DA">DA</option>
	<option value="TDS">TDS</option>
	<option value="BONUS">BONUS</option>
	<option value="PPAY">PERFORMANCE PAY</option>
	<option value="LEAVE_EnCASH">LEAVE ENCASH</option>
	<option value="VAR_ADJUST">VARIABLE ADJUSTMENT</option>
	<option value="VAR_REIM">VARIABLE REIMBURSEMENT</option>
	<option value="ARR_BASIC">ARREAR FOR BASIC</option>
	<option value="ARR_HRA">ARREAR FOR HRA</option>
	<option value="ARR_SPECIAL">ARREAR FOR SPECIAL ALLOWANCE</option>
	<option value="ARR_CONVEYANCE">ARREAR FOR CONVEYANCE</option>
	<option value="Arr_LvEnCash">ARREAR LEAVE-ENCASH</option>
	<option value="ARR_ESIC">ARREAR ESIC</option>
	<option value="ARR_PF">ARREAR PF</option>
	<option value="VOL_CONT">VOLUNTARY CONTRIBUTION</option>
	<option value="YLta">TAX SAVING - LTA</option>
	<option value="YCea">TAX SAVING - CEA</option>
   </select>
  </td>
  <td style="width:10px;"></td>
  <td style="width:50px;"><img src="images/checkbox_UnCheck.png" id="Chk1" onClick="FunChek(1)" style="display:none;"/><img src="images/checkbox.png" id="Chk2" onClick="FunChek(2)" style="display:none;"/></td>
 </tr>
 <tr><td colspan="3">&nbsp;</td></tr>
 <tr style="height:20px;background-color:#FFFF80;">
  <td class="td3">Browse File:</td>
  <td><input type="file" name="csv_file" id="csv_file" style="width:100%;" size="30" disabled/></td>
  <td style="width:10px;"></td>
  <td><input type="submit" name="ImportFile" id="File_Up" value="Upload" disabled/></td>
 </tr>
 <?php } ?> 
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

