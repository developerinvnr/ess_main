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
.inner_table{height:500px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/stuHover.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>


<Script type="text/javascript">window.history.forward(1);

$(document).ready(function () { $("#table1").freezeHeader({ 'height': '500px' }); }) 

function edit(value)
{ //var agree=confirm("Are you sure you want to edit this employee asset record?");  //if (agree) { 
  window.open("AssetEmp.php?ID="+value, '_blank'); window.focus();
  //}
}				
	
function SelectDeptEmpAsset(v)
{ 
  var asst = document.getElementById("AssetE").value;
  var x = "AssetEmpMaster.php?DpId="+v+"&asst="+asst; window.location=x;

}	

function SelectEmpAsset(v)
{ 
  var DpId = document.getElementById("DepartmentE").value;
  var x = "AssetEmpMaster.php?DpId="+DpId+"&asst="+v; window.location=x;

}
	

function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#9BEF47'; }
  else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; }
}		


function ChangeStE(v,sn,ei,ai)
{ 
var url = 'AssetEmpMasterAct.php'; var pars = 'act=SetESt&sn='+sn+'&ei='+ei+'&ai='+ai+'&v='+v; 
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_stevent });
} 
function show_stevent(originalRequest)
{ document.getElementById('EventSpan1').innerHTML = originalRequest.responseText; var sn=document.getElementById("sn").value;
  var ei=document.getElementById("ei").value; var ai=document.getElementById("ai").value; var action1=document.getElementById("action1").value;
  if(action1=='Y')
  { document.getElementById("EAmt_"+sn+"_"+ai).disabled=false; document.getElementById("EAssetSt_"+sn+"_"+ai).style.background='#BBFF77'; }
  else{ document.getElementById("EAmt_"+sn+"_"+ai).disabled=true; }
}

function ChangeAmtE(v,sn,ei,ai)
{ var url = 'AssetEmpMasterAct.php'; var pars = 'act=SetEAmt&sn='+sn+'&ei='+ei+'&ai='+ai+'&v='+v; 
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_amtevent });
} 
function show_amtevent(originalRequest)
{ document.getElementById('EventSpan2').innerHTML = originalRequest.responseText; var sn2=document.getElementById("sn2").value;
  var ei2=document.getElementById("ei2").value; var ai2=document.getElementById("ai2").value; }

function CheckGrd(gi)
{ var snn=document.getElementById("snn").value; 
 if(document.getElementById("Grd_"+gi).checked==false){ document.getElementById("TDGrade"+gi).style.display = 'none';
 for(var i=1; i<=snn; i++){ 
 document.getElementById("TDGrade1a"+gi).style.display = 'none'; document.getElementById("TDGrade2a"+gi).style.display = 'none';
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
	  <td valign="top" id="MainWindow">
<?php //******************************** ?>
<?php //****************START*****START*****START******START******START********** ?>
<?php //***************************************************************** ?>
	  
<table border="0" style="margin-top:0px;height:400px;">
	<tr>
		<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
		
	 <td align="center" valign="top">
	   <table border="0">
		 <tr>
		  <td align="left" class="heading">Employee Assest Master:</td>
		  <td style="width:50px;">&nbsp;</td>
		  
		  <td class="td1" style="font-size:11px;width:120px;"><select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="AssetE" id="AssetE" onChange="SelectEmpAsset(this.value)"><?php if($_REQUEST['asst']>0){ $sqlA=mysql_query("SELECT AssetName FROM hrm_asset_name WHERE AssetNId=".$_REQUEST['asst'], $con); $resA=mysql_fetch_assoc($sqlA); echo '<option value='.$_REQUEST['asst'].' style="margin-left:0px; background-color:#84D9D5;" selected>'.strtoupper($resA['AssetName']).'</option>'; } elseif($_REQUEST['ast']=='AllA'){ echo '<option value="AllA">All ASSETS</option>'; } else { echo '<option value="0" style="margin-left:0px; background-color:#84D9D5;" selected>SELECT ASSETS</option>'; }
$SqlAsset=mysql_query("select AssetNId,AssetName from hrm_asset_name where Status='A' order by AssetName ASC", $con); while($ResAsset=mysql_fetch_array($SqlAsset)) { ?><option value="<?php echo $ResAsset['AssetNId']; ?>"><?php echo strtoupper($ResAsset['AssetName']);?></option><?php } ?><option value="AllA">All ASSETS</option></select></td>

		   <td class="td1" style="font-size:11px; width:150px;"><select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="DepartmentE" id="DepartmentE" onChange="SelectDeptEmpAsset(this.value)">
		   
		   <option value="" style="margin-left:0px; background-color:#84D9D5;" <?php if($_REQUEST['DpId']==''){echo 'selected';}?>>SELECT DEPARTMENT</option>
		   <?php 
$SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>" <?php if($_REQUEST['DpId']==$ResDepartment['DepartmentId']){echo 'selected';} ?>><?php echo strtoupper($ResDepartment['DepartmentCode']);?></option><?php } ?>
<option value="All" <?php if($_REQUEST['DpId']=='All'){echo 'selected';}?>>ALL</option>


</select>
		   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> </td>
		  <td>
		  &nbsp;&nbsp;
		  <?php if($_REQUEST['DpId']!='' && $_REQUEST['asst']!=''){?>
		  <a href="#" onclick="ExportA('<?=$_REQUEST['DpId']?>',<?=$CompanyId;?>,'<?=$_REQUEST['asst']?>')" style="font-size:12px;">export</a>
		  <?php } ?>
		  <script>
					 function ExportA(v,c,a)
					 {   //alert(v+"-"+c+"-"+a);
					     window.open("AssetEmpMasterExp.php?DpId="+v+"&c="+c+"&a="+a,"XlsForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=50,height=50"); 
					 }
					</script>
		  
		  <font class="font4"><b>&nbsp;<span id="msg"></span></b></font></td>
		 </tr>
			 
			 <tr>
			   <td valign="top" style="text-align:left;" colspan="5"> 
<?php if($_SESSION['User_Permission']=='Edit' && $_REQUEST['asst']>0){?>
<table border="1" id="table1" style="width:100%;" cellspacing="1">
<div class="thead">
    <thead>
 <tr bgcolor="#7a6189">
    <td rowspan="2" style="width:30px;">&nbsp;</td>
	<td rowspan="2" align="center" style="color:#FFFFFF;" class="All_30"><b>SN</b></td>
	<td rowspan="2" align="center" style="color:#FFFFFF;" class="All_50"><b>EC</b></td>
	<td rowspan="2" align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>
<?php $sqlA=mysql_query("select * from hrm_asset_name where AssetNId=".$_REQUEST['asst']." order by AssetCode ASC", $con); $rowA=mysql_num_rows($sqlA); while($resA=mysql_fetch_assoc($sqlA)){?>
<td align="center" colspan="2" class="All_100" style="color:#FFFFFF;width:130px;" id="TDGrade<?php echo $resA['AssetNId']; ?>"><b><?php echo $resA['AssetName']; ?></b><?php /*?><input type="checkbox" id="Grd_<?php echo $resA['AssetNId']; ?>" onClick="CheckGrd(<?php echo $resA['AssetNId']; ?>)" <?php if($_REQUEST['Gdr'.$resA['AssetNId']]==''){echo 'checked';} ?>/><?php */?></td>
<?php } ?>	
 </tr>
 <tr bgcolor="#7a6189">
<?php $sqlA=mysql_query("select * from hrm_asset_name where AssetNId=".$_REQUEST['asst']." order by AssetCode ASC", $con); $rowA=mysql_num_rows($sqlA); while($resA=mysql_fetch_assoc($sqlA)){ ?>
   <td align="center" class="All_30" style="color:#FFFFFF;width:50px;" id="TDGrade1a<?php echo $resA['AssetNId']; ?>"><b>Status</b></td>
   <td align="center" class="All_60" style="color:#FFFFFF;width:80px;" id="TDGrade2a<?php echo $resA['AssetNId']; ?>"><b>Limit</b></td>
<?php } ?>	
 </tr>
 </thead>
 </div>
<?php if($_REQUEST['DpId']=='All') { $dept='1=1';}
elseif($_REQUEST['DpId']>0) { $dept="g.DepartmentId=".$_REQUEST['DpId']; }

if($_REQUEST['DpId'] AND $_REQUEST['DpId']!='') { 
      $sqlDP = mysql_query("SELECT e.EmployeeID,EmpCode,Fname,Sname,Lname,HqId,DepartmentId,DesigId,Gender,Married FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID WHERE e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND ".$dept, $con) or die(mysql_error()); 
	  
      $Sno=1;  while($resDP = mysql_fetch_assoc($sqlDP)) { 
if($resDP['Gender']=='M'){$M='Mr.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='Y'){$M='Mrs.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='N'){$M='Miss.';} 
	  $Name=$M.' '.$resDP['Fname'].' '.$resDP['Sname'].' '.$resDP['Lname']; $LEC=strlen($resDP['EmpCode']); 
      if($LEC==1){$EC='000'.$resDP['EmpCode'];} if($LEC==2){$EC='00'.$resDP['EmpCode'];} if($LEC==3){$EC='0'.$resDP['EmpCode'];} if($LEC>=4){$EC=$resDP['EmpCode'];}
	  
	   
?>
<div class="tbody">
     <tbody>
 <tr bgcolor="#FFFFFF" id="TR<?php echo $Sno; ?>"> 
        <td align="center" style="width:30px;"><input type="checkbox" id="Chk<?php echo $Sno; ?>" onClick="FucChk(<?php echo $Sno; ?>)" /></td>
		<td align="center" style="" class="All_30"><?php echo $Sno; ?></td>
		<td align="center" style="" class="All_50"><a href="#" onClick="edit(<?php echo $resDP['EmployeeID']; ?>)"><?php echo $EC; ?></a></td>
		<td class="All_200"><a href="#" onClick="edit(<?php echo $resDP['EmployeeID']; ?>)">&nbsp;<?php echo $Name; ?></a></td>
		
<?php $sqlA=mysql_query("select * from hrm_asset_name where AssetNId=".$_REQUEST['asst']." order by AssetCode ASC", $con); while($resA=mysql_fetch_assoc($sqlA)){?>
<td align="center" style="" class="All_40" id="TDGrade3<?php echo $Sno.'_'.$resA['AssetNId']; ?>">

<?php if($resA['AssetNId']!=11 AND $resA['AssetNId']!=12 AND $resA['AssetNId']!=18){ $sa=mysql_query("select * from hrm_asset_name_emp where EmployeeID=".$resDP['EmployeeID']." AND AssetNId=".$resA['AssetNId'], $con); $rowa=mysql_num_rows($sa); ?>
<select style="width:50px;text-align:center;height:20px;background-color:<?php if($rowa>0){ $ra=mysql_fetch_assoc($sa); if($ra['AssetESt']=='Y'){echo '#BBFF77';} else{echo '#FFF';} } ?>;" id="EAssetSt_<?php echo $Sno.'_'.$resA['AssetNId']; ?>" onChange="ChangeStE(this.value,<?php echo $Sno.','.$resDP['EmployeeID'].','.$resA['AssetNId']; ?>)" >
<?php if($rowa>0){ $sa=mysql_query("select * from hrm_asset_name_emp where EmployeeID=".$resDP['EmployeeID']." AND AssetNId=".$resA['AssetNId'], $con); $ra=mysql_fetch_array($sa); ?><option style="text-align:center;" value="<?php echo $ra['AssetESt']; ?>"><?php echo $ra['AssetESt']; ?></option>
<option style="text-align:center;" value="<?php if($ra['AssetESt']=='N'){echo 'Y';}else{echo 'N';} ?>"><?php if($ra['AssetESt']=='N'){echo 'Y';}else{echo 'N';} ?></option><?php } else{ ?><option style="text-align:center;" value="N" selected>N</option><option style="text-align:center;" value="Y">Y</option><?php } ?>
</select>

<?php  } elseif($resA['AssetNId']==11 OR $resA['AssetNId']==12 OR $resA['AssetNId']==18){
      $sqlElig=mysql_query("select Mobile_Hand_Elig,Mobile_Hand_Elig_Rs from hrm_employee_eligibility where EmployeeID=".$resDP['EmployeeID']." AND Status='A'",$con); 
	  $resElig=mysql_fetch_assoc($sqlElig); ?>
<select disabled style="width:50px;text-align:center;height:20px;background-color:<?php if($resElig['Mobile_Hand_Elig']=='Y'){ echo '#BBFF77';} else{echo '#FFF';} ?>;" id="EAssetSt_<?php echo $Sno.'_'.$resA['AssetNId']; ?>" onChange="ChangeStE(this.value,<?php echo $Sno.','.$resDP['EmployeeID'].','.$resA['AssetNId']; ?>)" >
<?php if($resElig['Mobile_Hand_Elig']=='Y'){ ?><option style="text-align:center;" value="Y" selected>Y</option><option style="text-align:center;" value="N">N</option><?php } else { ?><option style="text-align:center;" value="N" selected>N</option><option style="text-align:center;" value="Y" >Y</option><?php } ?>
</select>	  
<?php } ?>	  
</td>
<td align="center" style="" class="All_60" id="TDGrade4<?php echo $Sno.'_'.$resA['AssetNId']; ?>">
<?php if($resA['AssetNId']!=11){ ?>
<input style="width:80px;text-align:right;height:20px;" id="EAmt_<?php echo $Sno.'_'.$resA['AssetNId']; ?>" onChange="ChangeAmtE(this.value,<?php echo $Sno.','.$resDP['EmployeeID'].','.$resA['AssetNId']; ?>)" value="<?php if($rowa>0){ $sa=mysql_query("select * from hrm_asset_name_emp where EmployeeID=".$resDP['EmployeeID']." AND AssetNId=".$resA['AssetNId'], $con); $ra=mysql_fetch_assoc($sa); echo intval($ra['AssetELimit']); } ?>" <?php if($rowa>0 AND $ra['AssetESt']=='Y'){ echo '';}else{echo 'disabled';} ?> />

<?php  } elseif($resA['AssetNId']==11){ ?>
<input style="width:80px;text-align:right;height:20px;background-color:#FFFFFF;" id="EAmt_<?php echo $Sno.'_'.$resA['AssetNId']; ?>" onChange="ChangeAmtE(this.value,<?php echo $Sno.','.$resDP['EmployeeID'].','.$resA['AssetNId']; ?>)" value="<?php if($resElig['Mobile_Hand_Elig']=='Y'){ echo $resElig['Mobile_Hand_Elig_Rs']; } ?>" disabled />
<?php } ?>
</td>

<?php } ?>	
		
</tr>
</tbody>
</div>
<?php $Sno++; } $sn=$Sno-1; echo '<input type="hidden" id="snn" value="'.$sn.'" />'; }?>
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
		
<?php //***********************************************************************?>
<?php //**************END*****END*****END******END******END*************************?>
<?php //***************************************************************?>
		
	  </td>
	</tr>
	
	<!--<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>-->
	<tr>
	  <td valign="top">
	    <?php //require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>