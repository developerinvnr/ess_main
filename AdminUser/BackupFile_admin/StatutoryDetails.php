<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_SESSION['login'] = true){require_once('PhpFile/StatutoryDetailsP.php'); } else {$msg= "Session Expiry..............."; } ?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Times New Roman; font-size:11px; width:250px;} .font4 { color:#1FAD34; font-family:Times New Roman; font-size:13px; height:10px;}
.span {display:none; font-family:Times New Roman; font-size:14px; }.span1 {display:block; font-family:Times New Roman; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Times New Roman; font-size:13px;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script type="text/javascript" src="js/StatutoryDetails.js" ></script>
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
	  <td align="right" width="370" class="heading">Statutory Details</td>
	  <td align="left">
	    <b><span id="spf" class="span1">: -&nbsp;PF</span><span id="sesic" class="span">: -&nbsp;ESIC</span><span id="stds" class="span">: -&nbsp;TDS</span><span id="slumpsum" class="span">: -&nbsp;Lumpsum</span><span id="staxsaving" class="span">: -&nbsp;Other Component (Tax Saving)</span></b>
	  </td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><span id="msg"><?php echo $msg; ?></span></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:100px;" valign="top" align="center">&nbsp;
   <table border="0" cellpadding="0px;" align="center">
    <tr><td align="center"><a href="#"><img src="images/pf.png" border="0" onClick="OpenPf()"/></a></td></tr>
	<tr><td align="center"><a href="#"><img src="images/esic.png" border="0" onClick="OpenEsic()"/></a></td></tr>
	<tr><td align="center"><a href="#"><img src="images/tdsbtn.png" border="0" onClick="OpenTds()"/></a></td></tr>
	<tr><td align="center"><a href="#"><img src="images/lumpsum.png" border="0" onClick="OpenLumpsum()"/></a></td></tr>
	<tr><td align="center"><a href="#"><img src="images/taxsaving.png" border="0" onClick="OpenTaxSaving()"/></a></td></tr>
<tr><td align="center"><a href="#"><img src="images/back.png" border="0" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/></a></td></tr>   <tr><td align="center"><a href="#"><img src="images/cancel.png" border="0" onClick="javascript:window.location='StatutoryDetails.php'"/></a></td></tr>
   </table>
 </td>
 <td width="100">&nbsp;</td>
<?php //*********************************************** PF ******************************************************?> 
<td align="left" id="pf" valign="top" style="display:block;">
<?php  $SqlPf=mysql_query("Select * from hrm_company_statutory_pf WHERE CompanyId=".$CompanyId, $con); $ResultPf=mysql_fetch_assoc($SqlPf); ?>             
  <form name="formPF" method="post" onSubmit="return validate(this)">
   <table border="0">
	<tr>
	  <td align="left"><table border="0">
		<tr><td class="td1" style="font-size:11px;">PF status Code :</td>
			<td><input name="Pf_StatusCode" id="Pf_StatusCode" style="font-size:11px; width:54px; height:18px;" value="<?php echo $ResultPf['Pf_PfStatusCode']; ?>" disabled/></td>
			<td>&nbsp;&nbsp;<input type="hidden" name="PfId" value="<?php echo $ResultPf['PfID'];  ?>" /><input type="hidden" name="CompanyId" value="<?php echo $CompanyId;  ?>" /></td>
			<td class="td1" style="font-size:11px;">Prefix :</td><td><input name="Prifix" id="Prifix" style="font-size:11px; width:180px; height:18px;" value="<?php echo $ResultPf['Pf_Prifix']; ?>" disabled/></td>
		</tr></table>
	  </td>
    </tr>
	<tr>
	  <td align="left"><table border="0" width="550">
	    <tr>
		   <td class="td1" style="font-size:11px; width:210px;">Establishment Code No :</td>
		   <td align="left"><input name="EstacodeNo" id="EstacodeNo" style="font-size:11px; width:180px; height:18px;" value="<?php echo $ResultPf['Pf_EstablishmentCode']; ?>" disabled/></td>
		</tr></table>
	  </td>
    </tr>
	<tr>		  
	   <td align="left"><table border="0" width="550">
		<tr>
		  <td class="td1" style="font-size:11px; width:180px;">Max. Salary :</td>
		  <td style="font-size:11px; width:40px;"><b>PF&nbsp;</b></td>
		  <td align="left"  style="font-size:11px; width:120px;"><input name="MaxSalPF" id="MaxSalPF" value="<?php echo $ResultPf['Pf_MaxSalPf']; ?>" style="font-size:11px; width:100px; height:18px;" disabled/></td>
		  <td style="font-size:11px; width:40px;"><b>EPS&nbsp;</b></td>
		  <td align="left"  style="font-size:11px; width:120px;"><input name="MaxSalEPS" id="MaxSalEPS" value="<?php echo $ResultPf['Pf_MaxSalEps']; ?>" style="font-size:11px; width:100px; height:18px;" disabled/></td>
		  <td style="font-size:11px; width:40px;"><b>DLI&nbsp;</b></td>
		  <td align="left"  style="font-size:11px; width:120px;"><input name="MaxSalDLI" id="MaxSalDLI" value="<?php echo $ResultPf['Pf_MaxSalDli']; ?>" style="font-size:11px; width:100px; height:18px;" disabled/></td>
		</tr></table>
	   </td>
    </tr>
	<tr>
	   <td align="left"><table border="0" width="550">
	     <tr>
		    <td style="font-size:11px; width:115px;">PF Deduction :</td>
			<td align="left"  style="font-size:11px; width:100px;"><input name="PFDeduct" id="PFDeduct" style="font-size:11px; width:70px; height:18px;" value="<?php echo $ResultPf['Pf_PfDeducRate'];?>" disabled/>&nbsp;%</td>
			<td style="width:25px;">&nbsp;&nbsp;</td>
			<td style="font-size:11px; width:125px;">PF Contribution :</td>
			<td align="left"  style="font-size:11px; width:100px;"><input name="PFContribute" id="PFContribute" style="font-size:11px; width:70px; height:18px;" value="<?php echo $ResultPf['Pf_PfContriRate'];?>" disabled/>&nbsp;%</td>
        </tr>
		<tr>
		    <td style="font-size:11px; width:115px;">EPS Contribution :</td>
			<td align="left"  style="font-size:11px; width:100px;"><input name="EPSContribute" id="EPSContribute" style="font-size:11px; width:70px; height:18px;" value="<?php echo $ResultPf['Pf_EpsContriRate'];?>" disabled/>&nbsp;%</td>
			<td>&nbsp;&nbsp;</td>
			<td style="font-size:11px; width:125px;">EDLI Contribution :</td>
			<td align="left"  style="font-size:11px; width:100px;"><input name="EDLIContribute" id="EDLIContribute" style="font-size:11px; width:70px; height:18px;" value="<?php echo $ResultPf['Pf_DliContribution'];?>" disabled/>&nbsp;%</td>
        </tr>
		<tr>
		    <td style="font-size:11px; width:115px;">PF AdminCharge :</td>
			<td align="left"  style="font-size:11px; width:100px;"><input name="PFAdminCharge" id="PFAdminCharge" style="font-size:11px; width:70px; height:18px;" value="<?php echo $ResultPf['Pf_PfAdminCharge'];?>" disabled/>&nbsp;%</td>
			<td>&nbsp;&nbsp;</td>
			<td style="font-size:11px; width:125px;">EDLI AdminCharge :</td>
			<td align="left"  style="font-size:11px; width:100px;"><input name="EDLIAdminCharge" id="EDLIAdminCharge" style="font-size:11px; width:70px; height:18px;" value="<?php echo $ResultPf['Pf_DliAdminCharge'];?>" disabled/>&nbsp;%</td>
        </tr></table>
	  </td>
   </tr> 
   <tr>
      <td align="left"><table border="0" width="400">
	   <tr>
		   <td class="td1" style="font-size:11px; width:25px;" align="left"><input type="checkbox" name="con_for_arrCalcu" id="con_for_arrCalcu" <?php if($ResultPf['Pf_Consider_for_Arrears']==1) {echo 'checked';}?> onClick="CheckedArr()" disabled /></td>
		   <td align="left" style="font-size:11px;">Consider for Arrear Calculations</td>
	   </tr></table>
	  </td>
   </tr> 
<?php if($_SESSION['User_Permission']=='Edit'){?> 
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr>
		 <td align="right"><input type="button" name="ChangePF" id="ChangePF" style="width:90px;" value="change" onClick="EditPF()">
                           <input type="submit" name="SavePF" id="SavePF" value=" save " style="display:none;width:90px;"></td>
		 <td align="right" style="width:70px; ">
		 <input type="button" name="RefreshPF" id="RefreshPF" style="width:90px;" value="refresh" onClick="a()"/></td>
		</tr></table>
      </td>
   </tr>
<?php } ?>
  </table>
 </form>     
</td>
<?php //*********************************************** PF Close******************************************************?>    
<?php //*********************************************** ESIC ******************************************************?>  
<?php  $SqlEsic=mysql_query("Select * from hrm_company_statutory_esic WHERE CompanyId=".$CompanyId, $con); $ResultEsic=mysql_fetch_assoc($SqlEsic); ?>
  <td align="left" id="esic" valign="top" style="display:none;">             
   <form name="formESIC" method="post" onSubmit="return validate(this)">
   <table border="0">
	<tr>
	  <td align="left"><table border="0">
		<tr><td class="td1" style="font-size:11px; width:180px;">Employer Code No :</td>
			<td style="font-size:11px; width:200px;"><input name="EmployerCodeNo" id="EmployerCodeNo" style="font-size:11px; width:180px; height:18px;" value="<?php echo $ResultEsic['Esic_EmployerCode']; ?>" disabled/>

			<input type="hidden" name="EsicId" value="<?php echo $ResultEsic['EsicID']; ?>" /><input type="hidden" name="CompanyId" value="<?php echo $CompanyId; ?>" /></td>
		</tr>
		<tr><td class="td1" style="font-size:11px;">Maximum Salary (ESIC):</td>
			<td style="font-size:11px; width:200px;"><input name="MaxSalESIC" id="MaxSalESIC" style="font-size:11px; width:100px; height:18px;" value="<?php echo $ResultEsic['Esic_MaxSalEsic'];  ?>" disabled/>&nbsp;Basic</td>
		</tr>
		<tr><td class="td1" style="font-size:11px;">ESIC Deduction :</td>
			<td align="left" style="font-size:11px; width:120px;"><input name="ESICDeduction" id="ESICDeduction" style="font-size:11px; width:100px; height:18px;" value="<?php echo $ResultEsic['Esic_DeducRate'];  ?>" disabled/>&nbsp;%</td>
		</tr>
		<tr><td class="td1" style="font-size:11px;">ESIC Contribustion :</td>
			<td align="left" style="font-size:11px; width:120px;"><input name="ESICContribute" id="ESICContribute" style="font-size:11px; width:100px; height:18px;" value="<?php echo $ResultEsic['Esic_ContriRate'];  ?>" disabled/>&nbsp;%</td>
		</tr></table>
	  </td>
   </tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>
   <tr>
      <td align="Right" class="fontButton"><table border="0">
		<tr>
		 <td align="right"><input type="button" name="ChangeESIC" id="ChangeESIC" style="width:90px;" value="change" onClick="EditESIC()">
                           <input type="submit" name="SaveESIC" id="SaveESIC" value=" save " style="display:none;width:90px;"></td>
		 <td align="right" style="width:70px; ">
		 <input type="button" name="RefreshESIC" id="RefreshESIC" style="width:90px;" value="refresh" onClick="b()"/></td>
		</tr></table>
      </td>
   </tr>
<?php } ?>
  </table>
 </form>        
   </td>
<?php //*********************************************** ESIC Close******************************************************?>  
<?php //***********************************************TDS******************************************************?>  
<?php  $SqlTds=mysql_query("Select * from hrm_company_statutory_tds WHERE CompanyId=".$CompanyId, $con); $ResultTds=mysql_fetch_assoc($SqlTds); ?>
<td align="left" id="tds" valign="top" style="display:none;">             
<form name="formTDS" method="post" onSubmit="return validate(this)">
<table border="0">
<tr>
 <td align="left">
  <table border="0">
   <tr>
    <td class="td1" style="font-size:11px; width:180px;">PAN :</td>
	<td style="font-size:11px; width:200px;"><input name="PAN" id="PAN" style="font-size:11px; width:100px; height:18px;" value="<?php echo $ResultTds['Tds_Pan'];  ?>" disabled/>
	<input type="hidden" name="TdsId" value="<?php echo $ResultTds['TdsID'];  ?>" /><input type="hidden" name="CompanyId" value="<?php echo $CompanyId; ?>" /></td>
	<td>&nbsp;</td>
	<td class="td1" style="font-size:11px;">TAN :</td>
	<td style="font-size:11px; width:200px;"><input name="TAN" id="TAN" style="font-size:11px; width:100px; height:18px;" value="<?php echo $ResultTds['Tds_Tan'];  ?>" disabled/></td>
   </tr>
   <tr>
    <td class="td1" style="font-size:11px;">Person :</td>
	<td align="left" style="font-size:11px; width:120px;"><input name="TDSPerson" id="TDSPerson" style="font-size:11px; width:180px; height:18px;" value="<?php echo $ResultTds['Tds_Person'];  ?>" disabled/></td>
	<td>&nbsp;</td>
	<td class="td1" style="font-size:11px;">Designation :</td>
	<td align="left" style="font-size:11px; width:120px;"><input name="TDSDesignation" id="TDSDesignation" style="font-size:11px; width:180px; height:18px;" value="<?php echo $ResultTds['Tds_Designation'];  ?>" disabled/></td>
	
   </tr>
   <tr>
     <td class="td1" style="font-size:11px;">TDS Circle :</td>
	 <td align="left" style="font-size:11px; width:120px;"><input name="TDSCircle" id="TDSCircle" style="font-size:11px;width:180px;height:18px;" value="<?php echo $ResultTds['Tds_TdsCircle'];  ?>" disabled/></td>
	 <td>&nbsp;</td>
	 <td class="td1" style="font-size:11px;">S/O / D/O :</td>
	 <td align="left" style="font-size:11px;width:120px;"><input name="TDSDoSo" id="TDSDoSo" style="font-size:11px;width:180px;height:18px;" value="<?php echo $ResultTds['Tds_SonOFDoOF'];  ?>" disabled/></td>
   </tr>
   <tr>
    <td class="td1" style="font-size:11px;">Default HR Calculation :</td>
    <td align="left"><Select name="DefaulHRACal" id="DefaulHRACal" style="font-size:11px;width:100px;height:18px;" disabled>
    <option value="<?php echo $ResultTds['Tds_DeFaultHraCalculation']; ?>">&nbsp;<?php if($ResultTds['Tds_DeFaultHraCalculation']==M){echo 'Monthly';}else{echo 'Yearly';}?></option>
    <option value="Monthly">&nbsp;Monthly</option><option value="Yearly">&nbsp;Yearly</option></td>
	<td>&nbsp;</td>
	 <td style="font-size:11px;">Professional Tax :</td>
	 <td align="left" style="font-size:11px;width:120px;"><input name="PTax" id="PTax" style="font-size:11px;width:100px;height:18px;" value="<?php echo $ResultTds['ProTax'];  ?>" disabled/></td>
   </tr>
   <tr>
    <td style="font-size:11px;">Other Edu Cess :</td>
    <td align="left" style="width:120px;font-size:12px;"><input name="OtherEduCess" id="OtherEduCess" style="font-family:Times New Roman;font-size:13px;width:100px;height:18px;" value="<?php echo $ResultTds['OtherEduCess']; ?>" disabled/>&nbsp;%</td>
	 <td>&nbsp;</td>
	 <td style="font-size:11px;">Deduction Sec (Max) :</td>

	 <td align="left" style="font-size:11px; width:120px;"><input name="TDSMax80C" id="TDSMax80C" style="font-size:11px; width:100px; height:18px;" value="<?php echo $ResultTds['TDSMax80C'];  ?>" disabled/>&nbsp;</td>

   </tr>

   <tr>

    <td style="font-size:11px;">Income from house property Max(Deduct) :</td>

    <td align="left" style="width:120px;font-size:12px;"><input name="IncHouseProperty" id="IncHouseProperty" style="font-family:Times New Roman;font-size:13px;width:100px;height:18px;" value="<?php echo $ResultTds['MaxIncHomeProperty']; ?>" disabled/>&nbsp;%</td>

	 <td>&nbsp;</td>

   </tr>

   <tr>

    <td style="font-size:11px;">Rebate :</td>

    <td align="left" style="width:120px;font-size:12px;"><select name="Rebate" id="Rebate" style="font-family:Times New Roman;font-size:13px;width:50px;height:18px;" disabled/>

	<option value="<?php echo $ResultTds['Rebate']; ?>"><?php if($ResultTds['Rebate']=='Y'){echo 'Yes';}else {echo 'No'; }?></option>

	<option value="<?php if($ResultTds['Rebate']=='Y'){echo 'N';}else {echo 'Y'; } ?>"><?php if($ResultTds['Rebate']=='Y'){echo 'No';}else {echo 'Yes'; }?></option></td>

	 <td>&nbsp;</td>

	 <td style="font-size:11px;">Total Income Up to :</td>

	 <td align="left" style="font-size:11px; width:120px;"><input name="RebateRsInComeUp" id="RebateRsIncomeUp" style="font-family:Times New Roman;font-size:13px;width:100px;height:18px;" value="<?php echo $ResultTds['RebateRsIncomeUp']; ?>" disabled/>&nbsp;</td>

   </tr>

   <tr>

    <td style="font-size:11px;">Rebate Rs Sec86 :</td>

    <td align="left" style="width:120px;font-size:12px;"><input name="Rebate86" id="Rebate86" style="font-family:Times New Roman;font-size:13px;width:100px;height:18px;" value="<?php echo $ResultTds['RebateRs86']; ?>" disabled/>&nbsp;%</td>

	 <td>&nbsp;</td>

	 <td style="font-size:11px;">Rebate Rs Sec89 :</td>

	 <td align="left" style="font-size:11px; width:120px;"><input name="Rebate89" id="Rebate89" style="font-size:11px; width:100px; height:18px;" value="<?php echo $ResultTds['RebateRs89'];  ?>" disabled/>&nbsp;</td>

   </tr>

    <tr>

    <td style="font-size:11px;">Rebate Rs Sec90 :</td>

    <td align="left" style="width:120px;font-size:12px;"><input name="Rebate90" id="Rebate90" style="font-family:Times New Roman;font-size:13px;width:100px;height:18px;" value="<?php echo $ResultTds['RebateRs90']; ?>" disabled/>&nbsp;%</td>

	 <td>&nbsp;</td>

	 <td style="font-size:11px;">Rebate Rs Sec90A :</td>

	 <td align="left" style="font-size:11px; width:120px;"><input name="Rebate90A" id="Rebate90A" style="font-size:11px; width:100px; height:18px;" value="<?php echo $ResultTds['RebateRs90A'];  ?>" disabled/>&nbsp;</td>

   </tr>

   <tr>

    <td style="font-size:11px;">Rebate Rs Sec91 :</td>

    <td align="left" style="width:120px;font-size:12px;"><input name="Rebate91" id="Rebate91" style="font-family:Times New Roman;font-size:13px;width:100px;height:18px;" value="<?php echo $ResultTds['RebateRs91']; ?>" disabled/>&nbsp;%</td>

	 <td>&nbsp;</td>

	 <td style="font-size:11px;">&nbsp;</td>

	 <td align="left" style="font-size:11px; width:120px;">&nbsp;</td>

   </tr>

   <tr>

    <td style="font-size:11px;" colspan="5">Surcharge @ <input name="Surcharge" id="Surcharge" style="font-family:Times New Roman;font-size:13px;width:50px;height:18px;" value="<?php echo $ResultTds['Surcharge']; ?>" disabled/>% is applicable if Taxable Income is more then <input name="SurchargeTaxIncome" id="SurchargeTaxIncome" style="font-family:Times New Roman;font-size:13px;width:100px;height:18px;" value="<?php echo $ResultTds['SurchargeTaxIncome']; ?>" disabled/>&nbsp;</td>

   </tr>

   

   

   

   

   

<?php /********************* General *******************************/ ?>	

<tr><td colspan="5">&nbsp;</td></tr>

<tr><td colspan="5" style="font-family:Times New Roman;font-size:14px;">&nbsp;&nbsp;<b>TDS Slabs General</td></tr>

<tr>

<td colspan="5" style="width:550px;">

 <table border="1" style="width:550px;">

  <tr bgcolor="#7a6189">

	<td style="font-family:Times New Roman;color:#FFFFFF;font-size:13px;width:50px;" align="center"><b>Sno</b></td>

	<td style="font-family:Times New Roman;color:#FFFFFF;font-size:13px;width:150px;" align="center"><b>Value From</b></td>

	<td style="font-family:Times New Roman;color:#FFFFFF;font-size:13px;width:150px;" align="center"><b>Value To</b></td>

	<td style="font-family:Times New Roman;color:#FFFFFF;font-size:13px;width:100px;" align="center"><b>Tax(Value/%)</b></td>

	<td style="font-family:Times New Roman;color:#FFFFFF;font-size:13px;width:100px;" align="center"><b>Status</b></td>								

  </tr>

<?php $sqlSlab=mysql_query("select * from hrm_company_tds_slab_general where CompanyId=".$CompanyId." AND Status='A' order by SlabId ASC"); 

  $sn=1; while($resSlab=mysql_fetch_array($sqlSlab)) {?>	  

  <tr bgcolor="#FFFFFF">

	<td style="font-family:Times New Roman;font-size:13px;width:50px;height:18px;" align="center">

	<?php echo $sn; ?><input type="hidden" id="SlabId" value="<?php echo $resSlab['SlabId']; ?>" style="width:40px;" /></td>

	<td align="center"><input name="VFrom_<?php echo $sn; ?>" id="VFrom_<?php echo $sn; ?>" style="font-family:Times New Roman;font-size:13px;width:148px;height:18px;" value="<?php echo $resSlab['ValueFrom']; ?>" disabled/></td>

	<td align="center"><input name="VTo_<?php echo $sn; ?>" id="VTo_<?php echo $sn; ?>" style="font-family:Times New Roman;font-size:13px;width:148px;height:18px;" value="<?php echo $resSlab['ValueTo']; ?>" disabled/></td>

	<td align="center"><input name="TaxV_<?php echo $sn; ?>" id="TaxV_<?php echo $sn; ?>" style="font-family:Times New Roman;font-size:13px;width:98px;height:18px;" value="<?php echo $resSlab['TaxValue']; ?>" disabled/></td>

	<td align="center"><select name="VStatus_<?php echo $sn; ?>" id="VStatus_<?php echo $sn; ?>" style="font-family:Times New Roman;font-size:13px;width:98px;height:18px;" disabled>

	<option value="<?php echo $resSlab['Status']; ?>"><?php if($resSlab['Status']=='A'){echo 'Active';} else{echo 'Deactive';} ?></option>

	<option value="<?php if($resSlab['Status']=='A'){echo 'D';} else{echo 'A';} ?>"><?php if($resSlab['Status']=='A'){echo 'Deactive';} else{echo 'Active';} ?></option>

	</select></td>								

  </tr>

<?php $sn++; } $RowSum=$sn-1; echo '<input type="hidden" id="TaxRowNo" name="TaxRowNo" value="'.$RowSum.'" />';?>	

 </table>

</td>

</tr>

<?php /********************* Women *******************************/ ?>	

<tr><td colspan="5">&nbsp;</td></tr>

<tr><td colspan="5" style="font-family:Times New Roman;font-size:14px;">&nbsp;&nbsp;<b>TDS Slabs Women</td></tr>

<tr>

<td colspan="5" style="width:550px;">

 <table border="1" style="width:550px;">

  <tr bgcolor="#7a6189">

	<td style="font-family:Times New Roman;color:#FFFFFF;font-size:13px;width:50px;" align="center"><b>Sno</b></td>

	<td style="font-family:Times New Roman;color:#FFFFFF;font-size:13px;width:150px;" align="center"><b>Value From</b></td>

	<td style="font-family:Times New Roman;color:#FFFFFF;font-size:13px;width:150px;" align="center"><b>Value To</b></td>

	<td style="font-family:Times New Roman;color:#FFFFFF;font-size:13px;width:100px;" align="center"><b>Tax(Value/%)</b></td>

	<td style="font-family:Times New Roman;color:#FFFFFF;font-size:13px;width:100px;" align="center"><b>Status</b></td>								

  </tr>

<?php $sqlSlab=mysql_query("select * from hrm_company_tds_slab_women where CompanyId=".$CompanyId." AND Status='A' order by SlabId ASC"); 

  $wo_sn=1; while($resSlab=mysql_fetch_array($sqlSlab)) {?>	  

  <tr bgcolor="#FFFFFF">

	<td style="font-family:Times New Roman;font-size:13px;width:50px;height:18px;" align="center">

	<?php echo $wo_sn; ?><input type="hidden" id="Wo_SlabId" value="<?php echo $resSlab['SlabId']; ?>" style="width:40px;" /></td>

	<td align="center"><input name="Wo_VFrom_<?php echo $wo_sn; ?>" id="Wo_VFrom_<?php echo $wo_sn; ?>" style="font-family:Times New Roman;font-size:13px;width:148px;height:18px;" value="<?php echo $resSlab['ValueFrom']; ?>" disabled/></td>

	<td align="center"><input name="Wo_VTo_<?php echo $wo_sn; ?>" id="Wo_VTo_<?php echo $wo_sn; ?>" style="font-family:Times New Roman;font-size:13px;width:148px;height:18px;" value="<?php echo $resSlab['ValueTo']; ?>" disabled/></td>

	<td align="center"><input name="Wo_TaxV_<?php echo $wo_sn; ?>" id="Wo_TaxV_<?php echo $wo_sn; ?>" style="font-family:Times New Roman;font-size:13px;width:98px;height:18px;" value="<?php echo $resSlab['TaxValue']; ?>" disabled/></td>

	<td align="center"><select name="Wo_VStatus_<?php echo $wo_sn; ?>" id="Wo_VStatus_<?php echo $wo_sn; ?>" style="font-family:Times New Roman;font-size:13px;width:98px;height:18px;" disabled>

	<option value="<?php echo $resSlab['Status']; ?>"><?php if($resSlab['Status']=='A'){echo 'Active';} else{echo 'Deactive';} ?></option>

	<option value="<?php if($resSlab['Status']=='A'){echo 'D';} else{echo 'A';} ?>"><?php if($resSlab['Status']=='A'){echo 'Deactive';} else{echo 'Active';} ?></option>

	</select></td>								

  </tr>

<?php $wo_sn++; } $wo_RowSum=$wo_sn-1; echo '<input type="hidden" id="Wo_TaxRowNo" name="Wo_TaxRowNo" value="'.$wo_RowSum.'" />';?>	

 </table>

</td>

</tr>   

<?php /********************* Ablove 60 Belove 80 *******************************/ ?>	

<tr><td colspan="5">&nbsp;</td></tr>

<tr><td colspan="5" style="font-family:Times New Roman;font-size:14px;">&nbsp;&nbsp;<b>TDS Slabs Seniop Citizen(Above 60 Belove 80 Yrs)</td></tr>

<tr>

<td colspan="5" style="width:550px;">

 <table border="1" style="width:550px;">

  <tr bgcolor="#7a6189">

	<td style="font-family:Times New Roman;color:#FFFFFF;font-size:13px;width:50px;" align="center"><b>Sno</b></td>

	<td style="font-family:Times New Roman;color:#FFFFFF;font-size:13px;width:150px;" align="center"><b>Value From</b></td>

	<td style="font-family:Times New Roman;color:#FFFFFF;font-size:13px;width:150px;" align="center"><b>Value To</b></td>

	<td style="font-family:Times New Roman;color:#FFFFFF;font-size:13px;width:100px;" align="center"><b>Tax(Value/%)</b></td>

	<td style="font-family:Times New Roman;color:#FFFFFF;font-size:13px;width:100px;" align="center"><b>Status</b></td>								

  </tr>

<?php $sqlSlab=mysql_query("select * from hrm_company_tds_slab_a60b80 where CompanyId=".$CompanyId." AND Status='A' order by SlabId ASC"); 

  $a60b80_sn=1; while($resSlab=mysql_fetch_array($sqlSlab)) {?>	  

  <tr bgcolor="#FFFFFF">

	<td style="font-family:Times New Roman;font-size:13px;width:50px;height:18px;" align="center">

	<?php echo $a60b80_sn; ?><input type="hidden" id="A60B80_SlabId" value="<?php echo $resSlab['SlabId']; ?>" style="width:40px;" /></td>

	<td align="center"><input name="A60B80_VFrom_<?php echo $a60b80_sn; ?>" id="A60B80_VFrom_<?php echo $a60b80_sn; ?>" style="font-family:Times New Roman;font-size:13px;width:148px;height:18px;" value="<?php echo $resSlab['ValueFrom']; ?>" disabled/></td>

	<td align="center"><input name="A60B80_VTo_<?php echo $a60b80_sn; ?>" id="A60B80_VTo_<?php echo $a60b80_sn; ?>" style="font-family:Times New Roman;font-size:13px;width:148px;height:18px;" value="<?php echo $resSlab['ValueTo']; ?>" disabled/></td>

	<td align="center"><input name="A60B80_TaxV_<?php echo $a60b80_sn; ?>" id="A60B80_TaxV_<?php echo $a60b80_sn; ?>" style="font-family:Times New Roman;font-size:13px;width:98px;height:18px;" value="<?php echo $resSlab['TaxValue']; ?>" disabled/></td>

	<td align="center"><select name="A60B80_VStatus_<?php echo $a60b80_sn; ?>" id="A60B80_VStatus_<?php echo $a60b80_sn; ?>" style="font-family:Times New Roman;font-size:13px;width:98px;height:18px;" disabled>

	<option value="<?php echo $resSlab['Status']; ?>"><?php if($resSlab['Status']=='A'){echo 'Active';} else{echo 'Deactive';} ?></option>

	<option value="<?php if($resSlab['Status']=='A'){echo 'D';} else{echo 'A';} ?>"><?php if($resSlab['Status']=='A'){echo 'Deactive';} else{echo 'Active';} ?></option>

	</select></td>								

  </tr>

<?php $a60b80_sn++; } $a60b80_RowSum=$a60b80_sn-1; echo '<input type="hidden" id="A60B80_TaxRowNo" name="A60B80_TaxRowNo" value="'.$a60b80_RowSum.'" />';?>	

 </table>

</td>

</tr>   

<?php /********************* Ablove 80 *******************************/ ?>	

<tr><td colspan="5">&nbsp;</td></tr>

<tr><td colspan="5" style="font-family:Times New Roman;font-size:14px;">&nbsp;&nbsp;<b>TDS Slabs Seniop Citizen(Above 80 Yrs)</td></tr>

<tr>

<td colspan="5" style="width:550px;">

 <table border="1" style="width:550px;">

  <tr bgcolor="#7a6189">

	<td style="font-family:Times New Roman;color:#FFFFFF;font-size:13px;width:50px;" align="center"><b>Sno</b></td>

	<td style="font-family:Times New Roman;color:#FFFFFF;font-size:13px;width:150px;" align="center"><b>Value From</b></td>

	<td style="font-family:Times New Roman;color:#FFFFFF;font-size:13px;width:150px;" align="center"><b>Value To</b></td>

	<td style="font-family:Times New Roman;color:#FFFFFF;font-size:13px;width:100px;" align="center"><b>Tax(Value/%)</b></td>

	<td style="font-family:Times New Roman;color:#FFFFFF;font-size:13px;width:100px;" align="center"><b>Status</b></td>								

  </tr>

<?php $sqlSlab=mysql_query("select * from hrm_company_tds_slab_a80 where CompanyId=".$CompanyId." AND Status='A' order by SlabId ASC"); 

  $a80_sn=1; while($resSlab=mysql_fetch_array($sqlSlab)) {?>	  

  <tr bgcolor="#FFFFFF">

	<td style="font-family:Times New Roman;font-size:13px;width:50px;height:18px;" align="center">

	<?php echo $a80_sn; ?><input type="hidden" id="A80_SlabId" value="<?php echo $resSlab['SlabId']; ?>" style="width:40px;" /></td>

	<td align="center"><input name="A80_VFrom_<?php echo $a80_sn; ?>" id="A80_VFrom_<?php echo $a80_sn; ?>" style="font-family:Times New Roman;font-size:13px;width:148px;height:18px;" value="<?php echo $resSlab['ValueFrom']; ?>" disabled/></td>

	<td align="center"><input name="A80_VTo_<?php echo $a80_sn; ?>" id="A80_VTo_<?php echo $a80_sn; ?>" style="font-family:Times New Roman;font-size:13px;width:148px;height:18px;" value="<?php echo $resSlab['ValueTo']; ?>" disabled/></td>

	<td align="center"><input name="A80_TaxV_<?php echo $a80_sn; ?>" id="A80_TaxV_<?php echo $a80_sn; ?>" style="font-family:Times New Roman;font-size:13px;width:98px;height:18px;" value="<?php echo $resSlab['TaxValue']; ?>" disabled/></td>

	<td align="center"><select name="A80_VStatus_<?php echo $a80_sn; ?>" id="A80_VStatus_<?php echo $a80_sn; ?>" style="font-family:Times New Roman;font-size:13px;width:98px;height:18px;" disabled>

	<option value="<?php echo $resSlab['Status']; ?>"><?php if($resSlab['Status']=='A'){echo 'Active';} else{echo 'Deactive';} ?></option>

	<option value="<?php if($resSlab['Status']=='A'){echo 'D';} else{echo 'A';} ?>"><?php if($resSlab['Status']=='A'){echo 'Deactive';} else{echo 'Active';} ?></option>

	</select></td>								

  </tr>

<?php $a80_sn++; } $a80_RowSum=$a80_sn-1; echo '<input type="hidden" id="A80_TaxRowNo" name="A80_TaxRowNo" value="'.$a80_RowSum.'" />';?>	

 </table>

</td>

</tr>       

   

  </table>

 </td>

</tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>
<tr>

  <td align="Right" class="fontButton">

   <table border="0">

	<tr>

	 <td align="right"><input type="button" name="ChangeTDS" id="ChangeTDS" style="width:90px;" value="change" onClick="EditTDS()">

					   <input type="submit" name="SaveTDS" id="SaveTDS" value=" save " style="display:none;width:90px;"></td>

	 <td align="right" style="width:70px;">

	 <input type="button" name="RefreshESIC" id="RefreshTDS" style="width:90px;" value="refresh" onClick="c()"/></td>

	</tr>

   </table>

  </td>

 </tr>
<?php } ?>
</table>

</form>        

</td>

<?php //*********************************************** TDS Close******************************************************?>      

<?php //*********************************************** LumpSum ******************************************************?>  

<?php  $SqlLumpsum=mysql_query("Select * from hrm_company_statutory_lumpsum WHERE CompanyId=".$CompanyId, $con); $ResultLumpsum=mysql_fetch_assoc($SqlLumpsum); 

       $ResultLumpsumRow=mysql_num_rows($SqlLumpsum);?>

  <td align="left" id="lumpsum" valign="top" style="display:none;">             

   <form name="formLumpsum" method="post" onSubmit="return validate(this)">

   <table border="0">

	<tr>

	  <td align="left"><table border="0">

		<tr><td class="td1" style="font-size:11px;"><b>BONUS</b>: Maximum Salary</td>

			<td style="font-size:11px; width:150px;"><input name="MaxBonus" id="MaxBonus" style="font-size:11px; width:90px; height:18px;" value="<?php echo $ResultLumpsum['Lumpsum_MaxBonus'];  ?>" disabled/>&nbsp;Basic</td>         <td class="td1" style="font-size:11px;">Contribustion</td>

			<td style="font-size:11px; width:130px;"><input name="BonusContribute" id="BonusContribute" style="font-size:11px; width:90px; height:18px;" value="<?php echo $ResultLumpsum['Lumpsum_BonusContribute'];  ?>" disabled/>&nbsp;%</td>            
			
			<td class="td1" style="font-size:11px;"><!--Month--></td>
			<td style="font-size:11px; width:130px;">
			<input type="hidden" name="BonusMonth" id="BonusMonth" value="<?php echo $ResultLumpsum['Lumpsum_BonusMonth']; ?>"
			
<?php /*?>			<select name="BonusMonth" id="BonusMonth" disabled>

			                                         <option value="<?php echo $ResultLumpsum['Lumpsum_BonusMonth']; ?>">

<?php if($ResultLumpsumRow!=0) {$SqlM=mysql_query("select * from hrm_month where MonthId=".$ResultLumpsum['Lumpsum_BonusMonth'], $con); 

      $ResM=mysql_fetch_assoc($SqlM); echo '&nbsp;'.$ResM['MonthName']; } ?></option>	

<?php $SqlMonth=mysql_query("select * from hrm_month", $con); while($ResMonth=mysql_fetch_array($SqlMonth)) {?>				

			                                         <option value="<?php echo $ResMonth['MonthId']; ?>">&nbsp;<?php echo $ResMonth['MonthName']; ?></option><?php } ?>					 

													 </select><?php */?></td>

		</tr>

		<tr><td class="td1" style="font-size:11px;"><!--<b>Gratuity</b>: Maximum Salary--></td>

			<td style="font-size:11px; width:150px;"><input type="hidden" name="MaxGratuity" id="MaxGratuity" style="font-size:11px; width:90px; height:18px;" value="<?php echo $ResultLumpsum['Lumpsum_MaxGratuity'];  ?>" disabled/>&nbsp;</td><td class="td1" style="font-size:11px;"><input type="hidden" name="GratuityDay" id="GratuityDay" style="font-size:11px; width:90px; height:18px;" value="<?php echo $ResultLumpsum['Lumpsum_GratuityDay'];  ?>" disabled/></td>

			<td style="font-size:11px; width:130px;"><!--day on month--></td><td class="td1" style="font-size:11px;"><input type="hidden" name="LumpsumId" value="<?php echo $ResultLumpsum['LumpsumID'];  ?>" /><input type="hidden" name="CompanyId" value="<?php echo $CompanyId; ?>" /></td>

			<td style="font-size:11px; width:130px;"></td>       

		</tr></table>

	  </td>

   </tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>
   <tr>

      <td align="Right" class="fontButton"><table border="0">

		<tr>

		 <td align="right"><input type="button" name="ChangeLumpsum" id="ChangeLumpsum" style="width:90px;" value="change" onClick="EditLumpsum()">

                           <input type="submit" name="SaveLumpsum" id="SaveLumpsum" value=" save " style="display:none;width:90px;"></td>

		 <td align="right" style="width:70px; ">

		 <input type="button" name="RefreshLumpsum" id="RefreshLumpsum" style="width:90px;" value="refresh" onClick="d()"/></td>

		</tr></table>

      </td>

   </tr>
<?php } ?>
  </table>

 </form>         

   </td>

<?php //*********************************************** LumpSum Close******************************************************?>    

<?php //*********************************************** TaxSaving ******************************************************?>  

<?php  $SqlTaxSaving=mysql_query("Select * from hrm_company_statutory_taxsaving WHERE CompanyId=".$CompanyId, $con); $ResultTaxSaving=mysql_fetch_assoc($SqlTaxSaving); 

       $ResTaxSavingRow=mysql_num_rows($SqlTaxSaving); ?>

  <td align="left" id="taxsaving" valign="top" style="display:none;">             

   <form name="formTaxSaving" method="post" onSubmit="return validate(this)">

   <table border="0">

	<tr>

	  <td align="left"><table border="0">

    	<tr><td style="font-size:11px; width:250px;">Conveyance Allowance(Rs.): </td>

			<td style="font-size:11px;  width:210px;"><input name="ConAllow" id="ConAllow" style="font-size:11px; width:90px; height:18px;" value="<?php echo $ResultTaxSaving['ConvanceAllow'];  ?>" disabled/>&nbsp;</td><td class="td1" style="font-size:11px;">&nbsp;</td>

			<td style="font-size:11px; width:130px;">&nbsp;</td><td class="td1" style="font-size:11px;"><input type="hidden" name="TaxSavingID" value="<?php echo $ResultTaxSaving['TaxSavingID'];  ?>" /><input type="hidden" name="CompanyId" value="<?php echo $CompanyId; ?>" /></td>

			<td style="font-size:11px; width:130px;"></td>       

		</tr>

		<tr><td class="td1" style="font-size:11px;">Medical Reimbursement(Rs.): </td>

			<td style="font-size:11px; width:150px;"><input name="MediReim" id="MediReim" style="font-size:11px; width:90px; height:18px;" value="<?php echo $ResultTaxSaving['MR_PerMonth'];  ?>" disabled/>&nbsp;Per Month</td>         <td class="td1" style="font-size:11px;">&nbsp;</td>

		</tr>

		<tr><td class="td1" style="font-size:11px;">Leave Travel Allowance: </td>

			<td style="font-size:11px; width:150px;"><input name="LtaBasic" id="LtaBasic" style="font-size:11px; width:90px; height:18px;" value="Basic Salary" disabled/>*

			<input name="LtaBasicInto" id="LtaBasicInto" style="font-size:11px; width:50px; height:18px;" value="<?php echo $ResultTaxSaving['LTA_BasicInto'];  ?>" disabled/></td>         <td class="td1" style="font-size:11px;">&nbsp;</td>

		</tr>

		<tr><td class="td1" style="font-size:11px;">Children Edu. Allowance:(Per Child) </td>

			<td style="font-size:11px; width:150px;"><input name="ChildEduAllowMonth" id="ChildEduAllowMonth" style="font-size:11px; width:90px; height:18px;" value="<?php echo $ResultTaxSaving['CEA_PerChildMonth'];  ?>" disabled/>

			&nbsp;Per Month</td><td>&nbsp;</td><td class="td1" style="font-size:11px;">Maximum Children</td>

			<td><input name="ChildEdu_Maxchild" id="ChildEdu_Maxchild" style="font-size:11px; width:50px; height:18px;" value="<?php echo $ResultTaxSaving['CEA_MaxChild'];  ?>" disabled/></td>

		</tr>

		<tr><td class="td1" style="font-size:11px;"> Mediclaim Policy Premium: </td>

			<td style="font-size:11px; width:150px;"><input name="MPP" id="MPP" style="font-size:11px; width:90px; height:18px;" value="<?php echo $ResultTaxSaving['MedicalPolicyPremium']; ?>" disabled/>

			&nbsp;Per Annual</td><td>&nbsp;</td>

		</tr>

		</table>

	  </td>

   </tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>
   <tr>

      <td align="Right" class="fontButton"><table border="0">

		<tr>

		 <td align="right"><input type="button" name="ChangeTaxSaving" id="ChangeTaxSaving" style="width:90px;" value="change" onClick="EditTaxSaving()">

                           <input type="submit" name="SaveTaxSaving" id="SaveTaxSaving" value=" save " style="display:none;width:90px;"></td>

		 <td align="right" style="width:70px; ">

		 <input type="button" name="RefreshTaxSaving" id="RefreshTaxSaving" style="width:90px;" value="refresh" onClick="e()"/></td>

		</tr></table>

      </td>

   </tr>
<?php } ?>
  </table>

 </form>         

   </td>

<?php //*********************************************** TaxSaving Close******************************************************?>    

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



