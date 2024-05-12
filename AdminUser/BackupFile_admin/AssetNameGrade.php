<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//if($_SESSION['login'] = true){require_once('PhpFile/EmpMasterP.php'); } else {$msg= "Session Expiry..............."; }
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:18px;} .All_80{font-size:11px; height:18px; width:80px;}
 .All_50{font-size:11px; height:18px; width:50px;} .All_100{font-size:11px; height:18px; width:100px;} 
.All_120{font-size:11px; height:18px; width:120px;} .All_150{font-size:11px; height:18px; width:150px;}.All_200{font-size:11px; height:18px; width:200px;} 
.All_350{font-size:11px; height:18px; width:350px;}
.inner_table { height:400px;overflow-y:auto;width:auto; }
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);

function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#9BEF47'; }
  else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; }
}		


function ChangeStG(v,sn,gi,ai)
{ 
  //alert(v+"-"+sn+"-"+gi+"-"+ai);
  var url = 'AssetEmpMasterAct.php'; var pars = 'act=SetGSt&sn='+sn+'&gi='+gi+'&ai='+ai+'&v='+v; 
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_stevent });
} 
function show_stevent(originalRequest)
{ document.getElementById('EventSpan1').innerHTML = originalRequest.responseText; var sn=document.getElementById("sn").value;
  var gi=document.getElementById("gi").value; var ai=document.getElementById("ai").value; var action1=document.getElementById("action1").value;
  if(action1=='Y')
  { document.getElementById("EAmt_"+sn+"_"+gi).disabled=false; document.getElementById("EAssetSt_"+sn+"_"+gi).style.background='#BBFF77'; }
  else{ document.getElementById("EAmt_"+sn+"_"+gi).disabled=true; }
}


function ChangeAmtG(v,sn,gi,ai)
{ var url = 'AssetEmpMasterAct.php'; var pars = 'act=SetGAmt&sn='+sn+'&gi='+gi+'&ai='+ai+'&v='+v; 
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_amtevent });
} 
function show_amtevent(originalRequest)
{ document.getElementById('EventSpan2').innerHTML = originalRequest.responseText; var sn2=document.getElementById("sn2").value;
  var gi2=document.getElementById("gi2").value; var ai2=document.getElementById("ai2").value; }

function CheckGrd(gi)
{ var snn=document.getElementById("snn").value; 
 if(document.getElementById("Grd_"+gi).checked==false){ document.getElementById("TDGrade"+gi).style.display = 'none';
 for(var i=1; i<=snn; i++){ 
 document.getElementById("TDGrade1"+gi).style.display = 'none'; document.getElementById("TDGrade2"+gi).style.display = 'none';
 document.getElementById("TDGrade3"+i+"_"+gi).style.display = 'none'; document.getElementById("TDGrade4"+i+"_"+gi).style.display = 'none'; }
 }
}

</Script>     
</head>
<body class="body">
<span id="EventSpan1"></span>
<span id="EventSpan2"></span>
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center" id="MainWindow">
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
	  
<table border="0" style="margin-top:0px;height:400px;">
	<tr>
	    <td align="right">&nbsp;</td>
		<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
		
		<td align="center" valign="top">
		   <table border="0" style="width:2500px;">
		     <tr><td align="left" class="heading">Grade Wise Limit<font class="font4"><b>&nbsp;<span id="msg"></span></b></font></td></tr>
			 <tr>
			   <td valign="top" style="width:auto;"> 
<?php if($_SESSION['User_Permission']=='Edit'){?>
<table border="1" style="width:auto;">
 <tr bgcolor="#7a6189">
    <td rowspan="2">&nbsp;</td>
	<td rowspan="2" align="center" style="color:#FFFFFF;" class="All_30"><b>SN</b></td>
	<td rowspan="2" align="center" style="color:#FFFFFF;" class="All_150"><b>Asset</b></td>
<?php if($CompanyId==1){$sqlA = mysql_query("select * from hrm_grade where CompanyId=".$CompanyId." AND CreatedDate>='2014-02-01' order by GradeId ASC", $con);}else{$sql = mysql_query("select * from hrm_grade where CompanyId=".$CompanyId." order by GradeId ASC", $con);} while($resA=mysql_fetch_assoc($sqlA)){?>
<td align="center" colspan="2" style="color:#FFFFFF;" class="All_100" id="TDGrade<?php echo $resA['GradeId']; ?>"><b><?php echo $resA['GradeValue']; ?></b>
<input type="checkbox" id="Grd_<?php echo $resA['GradeId']; ?>" onClick="CheckGrd(<?php echo $resA['GradeId']; ?>)" <?php if($_REQUEST['Gdr'.$resA['GradeId']]==''){echo 'checked';} ?>/></td>
<?php } ?>	
 </tr>
 <tr bgcolor="#7a6189">
<?php if($CompanyId==1){$sqlA = mysql_query("select * from hrm_grade where CompanyId=".$CompanyId." AND CreatedDate>='2014-02-01' order by GradeId ASC", $con);}else{$sql = mysql_query("select * from hrm_grade where CompanyId=".$CompanyId." order by GradeId ASC", $con);} while($resA=mysql_fetch_assoc($sqlA)){?>
   <td align="center" style="color:#FFFFFF;" class="All_30" id="TDGrade1<?php echo $resA['GradeId']; ?>"><b>St</b></td>
   <td align="center" style="color:#FFFFFF;" class="All_60" id="TDGrade2<?php echo $resA['GradeId']; ?>"><b>Limit</b></td>
<?php } ?>	
 </tr> 
<?php $sqlDP = mysql_query("select * from hrm_asset_name order by AssetName ASC", $con); $Sno=1;  while($resDP = mysql_fetch_assoc($sqlDP)) { ?>
 <tr bgcolor="#FFFFFF" id="TR<?php echo $Sno; ?>"> 
        <td align="center" style="width:30px;"><input type="checkbox" id="Chk<?php echo $Sno; ?>" onClick="FucChk(<?php echo $Sno; ?>)" /></td>
		<td align="center" style="" class="All_30"><?php echo $Sno; ?></td>
		<td class="All_150">&nbsp;<?php echo $resDP['AssetName'] ?></td>
<?php if($CompanyId==1){$sqlA = mysql_query("select * from hrm_grade where CompanyId=".$CompanyId." AND CreatedDate>='2014-02-01' order by GradeId ASC", $con);}else{$sql = mysql_query("select * from hrm_grade where CompanyId=".$CompanyId." order by GradeId ASC", $con);} while($resA=mysql_fetch_assoc($sqlA)){?>
<td align="center" style="" class="All_40" id="TDGrade3<?php echo $Sno.'_'.$resA['GradeId']; ?>"><?php $sa=mysql_query("select * from hrm_asset_name_grade where GradeId=".$resA['GradeId']." AND AssetNId=".$resDP['AssetNId'], $con); $rowa=mysql_num_rows($sa); ?>
<select <?php if($resDP['AssetNId']==11 OR $resDP['AssetNId']==12 OR $resDP['AssetNId']==18){echo 'disabled';} ?> style="width:40px;text-align:center;height:20px;background-color:<?php if($rowa>0){ $ra=mysql_fetch_assoc($sa); if($ra['AssetGSt']=='Y'){echo '#BBFF77';} else{echo '#FFF';} } ?>;" id="EAssetSt_<?php echo $Sno.'_'.$resA['GradeId']; ?>" onChange="ChangeStG(this.value,<?php echo $Sno.','.$resA['GradeId'].','.$resDP['AssetNId']; ?>)" >
<?php if($rowa>0){ $sa=mysql_query("select * from hrm_asset_name_grade where GradeId=".$resA['GradeId']." AND AssetNId=".$resDP['AssetNId'], $con); $ra=mysql_fetch_array($sa); ?><option style="text-align:center;" value="<?php echo $ra['AssetGSt']; ?>"><?php echo $ra['AssetGSt']; ?></option><option style="text-align:center;" value="<?php if($ra['AssetGSt']=='N'){echo 'Y';}else{echo 'N';} ?>"><?php if($ra['AssetGSt']=='N'){echo 'Y';}else{echo 'N';} ?></option><?php } else{ ?><option style="text-align:center;" value="N" selected>N</option><option style="text-align:center;" value="Y">Y</option><?php } ?>
</select>
</td>
<td align="center" style="" class="All_60" id="TDGrade4<?php echo $Sno.'_'.$resA['GradeId']; ?>"><input style="width:58px;text-align:right;height:20px;" id="EAmt_<?php echo $Sno.'_'.$resA['GradeId']; ?>" onChange="ChangeAmtG(this.value,<?php echo $Sno.','.$resA['GradeId'].','.$resDP['AssetNId']; ?>)" value="<?php if($rowa>0){ $sa=mysql_query("select * from hrm_asset_name_grade where GradeId=".$resA['GradeId']." AND AssetNId=".$resDP['AssetNId'], $con); $ra=mysql_fetch_assoc($sa); echo intval($ra['AssetGLimit']); } ?>" <?php if($rowa>0 AND $ra['AssetGSt']=='Y'){ echo '';}else{echo 'disabled';} ?> /></td>
<?php } ?>	
		
</tr>
<?php $Sno++; } $sn=$Sno-1; echo '<input type="hidden" id="snn" value="'.$sn.'" />'; ?>
</table>
<?php } ?>
                 </td>	
				 </tr>
				 <?php //---------------------------------------Display Record----------------------------------------------------------------- ?>
				 <tr><td><span id="DeptEmpName"></span></td></tr> 
				 <tr><td bgcolor="#B6E9E2" colspan="6"></td></tr>
		   </table>  		
		</td>
		
        <?php } ?>
		<?php //-------------------------------------------------------------------------------------------------------- ?>
		
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
		
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
		
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