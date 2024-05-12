<?php session_start();
if($_SESSION['login'] = true){require_once('../../Employee/sp/user/config/config.php');}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> /*background-color:#D9D9FF;background-color:#EEEEEE; */
.CalenderButton {background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px;background-color:#E0DBE3;border-color:#FFFFFF;}
.htf{font-family:Georgia;color:#000;font-weight:bold;text-align:center;font-size:12px;background-color:#97FFFF;}
.htf2{font-family:Georgia;color:#FF80FF;font-weight:bold;font-size:18px;height:24px;}
.tdf{font-family:Georgia;font-size:12px;height:20px;color:#fff;}
.tdfu{font-family:Georgia;font-size:12px;height:20px;color:#000;}
.tdf2{background-color:#FFFFFF;font-family:Georgia;font-size:12px;height:20px;color:#000000;}
.InputSel {font-family:Georgia;font-size:12px;text-align:left; }
.InputType {font-family:Georgia;font-size:12px;text-align:left; }
.InputType2 {font-family:Georgia;font-size:12px;border:hidden;}
.SaveButton {background-image:url(images/save.png);width:18px;height:18px;background-repeat:no-repeat;}
</style>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/><?php /* Calander Open */?>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script><?php /* Calander Close */?>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
</head>
<body class="body">
<table class="table">
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
	 <tr>
	  <td valign="top" width="100%" id="MainWindow">
<?php //***************START*****START*****START******START******START***************************?>
<table border="0" style="margin-top:0px;width:100%;height:150px;">	
<tr>
 <td valign="top" style="width:100%;">
 <table border="0" style="width:100%;">
 <tr>
<td style="width:100%;">
 <table border="0" style="width:100%;">

<?php 
if($_REQUEST['id']>0)
{ 
$sql=mysql_query("select * from fa_details where FaId=".$_REQUEST['id'],$con);$res=mysql_fetch_assoc($sql);if($res['Mode']==1){$mode='Direct(Sales Executive)';}elseif($res['Mode']==2){$mode='Teamlease';}elseif($res['Mode']==3){$mode='Distributor';} 
$sc=mysql_query("select CountryName,StateName,HqName,s.CountryId,h.StateId from hrm_headquater h inner join hrm_state s on h.StateId=s.StateId inner join hrm_country c on s.CountryId=c.CountryId where h.HqId=".$res['HqId'], $con); $rc=mysql_fetch_assoc($sc); 
} 
?>  
  <tr>
   <td style="width:75%;" valign="top">
   <table style="width:75%;" border="0">
	<tr>
	 <td class="tdf" style="width:100px;">&nbsp;Mode</td>
	 <td class="tdf" style="width:10px;" align="center">:</td>
	 <td style="width:200px;"><select style="width:200px;" class="InputSel" id="mode" name="mode">
     <option><?php echo $mode;?></option></select></td>
	 <td class="tdf" style="width:100px;">&nbsp;Country</td> 
	 <td class="tdf" align="center">:</td><td><select style="width:200px;" class="InputSel" id="country">
     <option><?php echo ucfirst(strtolower($rc['CountryName']));?></select></td>
	 <td colspan="3" class="tdf" align="center">&nbsp;</td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;State</td>
	 <td class="tdf" align="center">:</td><td><span id="spanstate">
	 <select style="width:200px;" class="InputSel" id="state" name="state">
     <option><?php echo ucfirst(strtolower($rc['StateName']));?></option></select></span></td>
	 <td class="tdf">&nbsp;HeadQuarter</td>
	 <td class="tdf" style="width:10px;" align="center">:</td>
	 <td style="width:200px;"><span id="spanhq"><select style="width:200px;" class="InputSel" id="hq" name="hq">
     <option><?php echo ucfirst(strtolower($rc['HqName']));?></option></select></span></td>
	 <td colspan="3" class="tdf" align="center">&nbsp;</td>
	</tr>
	
	<tr>
	    
	 <?php /*<td class="tdf">&nbsp;Crop</td><td class="tdf" align="center">:</td>
	 <td><select style="width:200px;" class="InputSel" id="crops" name="crops[]" required multiple><?php $crp=mysql_query("select rc.ItemId,ItemName from fa_details_crop rc inner join hrm_sales_seedsitem si on rc.ItemId=si.ItemId where FaId=".$res['FaId']." order by ItemName ASC",$con); while($rcrp=mysql_fetch_assoc($crp)){ ?><option value="<?php echo $rcrp['ItemId']; ?>"><?php echo $rcrp['ItemName']; ?></option><?php } ?></select></td>*/ ?>
	 
	<td class="tdf">&nbsp;Crop</td><td class="tdf" align="center">:</td>
	 <td><select style="width:200px;" class="InputSel" id="Crop" name="Crop">
	 <option value="Veg" <?php if($res['Crop']=='veg'){ echo 'selected';}?>>Vegetable Crops</option>
	 <option value="Field" <?php if($res['Crop']=='Field'){ echo 'selected';}?>>Field Crops</option>
	 <option value="Both" <?php if($res['Crop']=='Both'){ echo 'selected';}?>>Both Crops</option>
	 </select></td>
	 
	 <td class="tdf">&nbsp;Distibutor</td>
	 <td class="tdf" align="center">:</td>
	 <td><span id="spanDis"><select style="width:200px;" class="InputSel" id="dealer" name="dealer[]" required multiple><?php $dis=mysql_query("select rd.DealerId,DealerName from fa_details_dealer rd inner join hrm_sales_dealer sd on rd.DealerId=sd.DealerId where FaId=".$res['FaId']." order by DealerName ASC",$con); while($rdis=mysql_fetch_assoc($dis)){ ?><option value="<?php echo $rdis['DealerId']; ?>"><?php echo ucfirst(strtolower($rdis['DealerName'])); ?></option><?php } ?></select></span></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Expen_Distributor</td>
	 <td class="tdf" align="center">:</td> 
	 <td><span id="spanDis2"><select style="width:200px;" class="InputSel" id="sdealer" name="sdealer"><?php $dis2=mysql_query("select DealerName from hrm_sales_dealer where DealerId=".$res['Sal_DealerId'],$con); $rdis2=mysql_fetch_assoc($dis2); ?><option value="<?php echo $res['Sal_DealerId']; ?>"><?php echo ucfirst(strtolower($rdis2['DealerName'])); ?></option></select></span></td>
	 <td class="tdf">&nbsp;Reporting</td>
	 <?php if($res['tl']==0){ $e=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['Reporting'],$con); $re=mysql_fetch_assoc($e); $RName=ucfirst(strtolower($re['Fname'].' '.$re['Sname'].' '.$re['Lname'])); }else{ $e2=mysql_query("select TLName from hrm_sales_tlemp where TLEId=".$res['Reporting']." AND TLStatus='A'",$con); $re2=mysql_fetch_assoc($e2); $RName=ucfirst(strtolower($re2['TLName'])); } ?>
	 <td class="tdf" align="center">:</td><td><input style="width:200px;" class="InputType" id="rep" name="rep" value="<?php  echo $RName; ?>"/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Fa Name</td>
	 <td class="tdf" align="center">:</td><td><input style="width:200px;" class="InputType" id="name" name="name" value="<?php echo $res['FaName']; ?>"/></td>
	 <td class="tdf">&nbsp;Email-Id</td>
	 <td class="tdf" align="center">:</td><td><input style="width:200px;" class="InputType" id="email" name="email" value="<?php echo $res['EmailId']; ?>"/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Expense</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;text-align:right;" class="InputType" id="sal" name="sal" value="<?php echo floatval($res['Salary']); ?>"/></td>
	 <td class="tdf">&nbsp;<?php //Expences ?></td>
	 <td class="tdf" align="center">:</td><td><input type="hidden" style="width:120px;text-align:right;" class="InputType" id="expences" name="expences" value="<?php echo floatval($res['expences']); ?>"/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Expen. Mode</td>
	 <td class="tdf" align="center">:</td>
	 <td><select style="width:120px;" class="InputSel" id="smode" name="smode">
	 <option selected><?php echo $res['SalaryMode']; ?></option></select></td>
	 <td class="tdf">&nbsp;Job Status</td> 
	 <td class="tdf" align="center">:</td><td><select style="width:120px;" class="InputSel" id="jobstatus">
	 <option><?php echo $res['JobStatus']; ?></option></select></td>
	</tr> 
	<tr>
	 <td class="tdf">&nbsp;DOJ</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;text-align:center;" class="InputType" id="doj" name="doj" value="<?php echo date("d-F Y",strtotime($res['DOJ'])); ?>"/></td>
	 <td class="tdf">&nbsp;DOB</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;text-align:center;" class="InputType" id="dob" name="dob" value="<?php echo date("d-F Y",strtotime($res['DOB'])); ?>"/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;ContactNo-1</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;" class="InputType" id="cont1" name="cont1" value="<?php echo $res['ContactNo']; ?>"/></td>
	 <td class="tdf">&nbsp;ContactNo-2</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;" class="InputType" id="cont2" name="cont2" value="<?php echo $res['Contact2No']; ?>"/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;FA Status</td>
	 <td class="tdf" align="center">:</td>
	 <td><input style="width:120px;" class="InputType" id="status" name="status" value="<?php if($res['FaStatus']=='A'){echo 'Active';}else{echo 'De-active';} ?>"></td>
	 <td class="tdf">&nbsp;Gender</td> 
	 <td class="tdf" align="center">:</td><td><input style="width:120px;" class="InputType" id="gender" name="gender" value="<?php if($res['Gender']=='M'){echo 'Male';}else{echo 'Female';} ?>"></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Married</td>
	 <td class="tdf" align="center">:</td>
	 <td><input style="width:120px;" class="InputType" id="married" name="married" value="<?php if($res['Married']=='Y'){echo 'Yes';}else{echo 'No';} ?>"></select></td>
	 <td class="tdf">&nbsp;Qualification</td> 
	 <td class="tdf" align="center">:</td><td><input style="width:120px;" class="InputType" id="quali" name="quali" value="<?php echo $res['Qualif']; ?>" /></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Blood Group</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;" class="InputType" id="bg" name="bg" value="<?php echo $res['BloodGroup']; ?>"/></td>
	 <td class="tdf">&nbsp;Location</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;" class="InputType" id="loc" name="loc" value="<?php echo $res['Location']; ?>"/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Address-1</td>
	 <td class="tdf" align="center">:</td><td><input style="width:200px;" class="InputType" id="add1" name="add1" value="<?php echo $res['Address1']; ?>"/></td>
	 <td class="tdf">&nbsp;Address-2</td>
	 <td class="tdf" align="center">:</td><td><input style="width:200px;" class="InputType" id="add2" name="add2" value="<?php echo $res['Address2']; ?>"/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Bank/Branch</td>
	 <td class="tdf" align="center">:</td><td><input style="width:200px;" class="InputType" id="bank" name="bank" value="<?php echo $res['BankName']; ?>"/></td>
	 <td class="tdf">&nbsp;Account No</td>
	 <td class="tdf" align="center">:</td><td><input style="width:200px;" class="InputType" id="accno" name="accno" value="<?php echo $res['AccountNo']; ?>"/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Aadhar No</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;" class="InputType" id="aadhar" name="aadhar" value="<?php echo $res['AadharNo']; ?>"/></td>
	 <td class="tdf">&nbsp;Driv. LicNo</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;;" class="InputType" id="dl" name="dl" value="<?php echo $res['DrivLic']; ?>"/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Pan No</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;;" class="InputType" id="panno" name="panno" value="<?php echo $res['PanNo']; ?>"/></td>
	 <td class="tdf">&nbsp;VoterId</td>
	 <td class="tdf" align="center">:</td><td><input style="width:120px;;" class="InputType" id="voterid" name="voterid" value="<?php echo $res['VoterId']; ?>"/></td>
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

<?php //*****************END*****END*****END******END******END**************************?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>
