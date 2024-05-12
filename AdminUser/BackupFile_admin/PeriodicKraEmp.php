<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
$sqlSY=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='KRA'", $con); 
$sqlSYP=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'", $con);
$SNo=1; $resSY=mysql_fetch_array($sqlSY); $resSYP=mysql_fetch_array($sqlSYP);

if($_REQUEST['action']=='SetKRA' AND $_REQUEST['EI']!='' AND $_REQUEST['YI']!='')
{ 
 

}
?>

<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.font{font-family:Times New Roman;font-size:12px;text-align:center;font-weight:bold;} 
.th{font-family:Times New Roman;color:#FFFFFF;font-size:12px;text-align:center;font-weight:bold;height:24px;}
.td{font-family:Times New Roman;font-size:12px;text-align:center;color:#000000;}
.tdl{font-family:Times New Roman;font-size:12px;text-align:left;}
.tdr{font-family:Times New Roman;font-size:12px;text-align:right;}
.InputT{font-family:Times New Roman;font-size:14px;width:100%;height:20px;text-align:center;border:hidden; background-color:#CDFF9B;}.InputTl{font-family:Times New Roman;font-size:14px;width:100%;height:20px;text-align:left;border:hidden;background-color:#CDFF9B;}.InputTr{font-family:Times New Roman;font-size:14px;width:100%;height:20px;text-align:right;border:hidden;background-color:#CDFF9B;}
.InputS{font-family:Times New Roman;font-size:12px;width:100%;height:20px;}
.fontButton{ background-color:#7a6189;color:#009393;font-family:Times New Roman;font-size:13px; }
.SaveButton{ background-image:url(images/save.gif);width:20px;height:20px;background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit; }
.CalenderButton{ background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px;background-color:#E0DBE3; border-color:#FFFFFF; } .inner_table{height:500px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>

<Script type="text/javascript">
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '500px' }); })

function SelYearId(YeId){ document.getElementById("DisPyRecd").style.display='none'; }
	
function  SelectDeptEmp(v)
{ var YeId = document.getElementById("YearE").value; var PoId=document.getElementById("PositionE").value;
  if(v>0){ var x = "PeriodicKraEmp.php?act=checked&valu=true&rr=234&rtr=4&Dpp=55&rest=false&DpId="+v+"&YeId="+YeId+"&tt=44&rtr=r%r&PoId="+PoId;  window.location=x; }
}				

function SetBB(EI,YI)
{ var DI=document.getElementById("DId").value; var PoId=document.getElementById("PositionE").value;  window.location="PeriodicKraEmp.php?action=SetKRA&EI="+EI+"&YI="+YI+"&DpId="+DI+"PoId="+PoId;}		

function FunMailS(t,e)
{ document.getElementById('mEsId').value=e;
  var url = 'PeriodicKraEmpAct.php'; var pars = 'act=UpdMail&t='+t+'&e='+e;
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_result });
}
function show_result(originalRequest)
{ document.getElementById('ResultSpan').innerHTML = originalRequest.responseText;  
  if(document.getElementById("MailSts").value==1)
  {
   document.getElementById("imgg_"+document.getElementById("EsId").value).style.display='none';
  }
}

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
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //***********************************************************************************************?>
<?php //**********************START*****START*****START******START******START*********************?>
<?php //********************************************************************?>
<table border="0" style="margin-top:0px; width:100%;height:400px;">
	<tr>
	    <td align="right" width="1%">&nbsp;</td>
		<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
		
		<td width="100%" valign="top">
		   <table border="0" style="width:70%;">
		     <tr>
			  <td align="left" class="heading" style="width:250px;">Employee List (Periodic-KRA)</td>
			  <td style="font-size:11px; width:120px;">
			  <select class="tdsel" style="background-color:#DDFFBB;width:100%;" name="YearE" id="YearE" <?php /*?>onChange="SelYearId(this.value)"<?php */?>><?php if($_REQUEST['YeId']!=''){ $SqlY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YeId'], $con); $ResY=mysql_fetch_array($SqlY); ?><option value="<?php echo $ResY['YearId']; ?>"><?php echo '&nbsp;'.date("Y",strtotime($ResY['FromDate'])).'-'.date("Y",strtotime($ResY['ToDate'])); if($ResYear['YearId']>5){ echo ' - Y'; }?></option><?php }else{ ?><option value="" selected>Select Year</option><?php } $SqlYear=mysql_query("select YearId,FromDate,ToDate from hrm_year where YearId<=".$resSY['CurrY']." order by YearId DESC", $con); while($ResYear=mysql_fetch_array($SqlYear)) { ?><option value="<?php echo $ResYear['YearId']; ?>"><?php echo '&nbsp;'.date("Y",strtotime($ResYear['FromDate'])).'-'.date("Y",strtotime($ResYear['ToDate'])); if($ResYear['YearId']>5){ echo ' - Y'; } ?></option><?php } ?></select>
			  </td>
			  <td class="td1" style="font-size:11px; width:120px;">
			  <select class="tdsel" style="background-color:#DDFFBB;width:100%;" name="PositionE" id="PositionE"><?php if($_REQUEST['PoId']==1){$pist='Employee';}elseif($_REQUEST['PoId']==2){$pist='Reporting';}else{$pist='Select Level';}?><option value="<?php echo $_REQUEST['PoId'];?>" style="margin-left:0px; background-color:#84D9D5;" selected><?php echo $pist; ?></option>       <?php if($_REQUEST['PoId']!=0){?><option value="0">Select</option><?php } ?>
			  <?php if($_REQUEST['PoId']!=1){?><option value="1">Employee</option><?php } ?>
			  <?php if($_REQUEST['PoId']!=2){?><option value="2">Reporting</option><?php } ?>
			  </select>
			  </td>
			  <td class="td1" style="font-size:11px; width:150px;">
			   <select class="tdsel" style="background-color:#DDFFBB;width:100%;" name="DepartmentE" id="DepartmentE" onChange="SelectDeptEmp(this.value)"><?php if($_REQUEST['DpId']==0){$list='Select Period';}elseif($_REQUEST['DpId']==1){$list='Monthly';}elseif($_REQUEST['DpId']==2){$list='Quarterly';}elseif($_REQUEST['DpId']==3){$list='1/2 Annual';} ?><option value="<?php echo $_REQUEST['DpId'];?>" style="margin-left:0px; background-color:#84D9D5;" selected><?php echo $list; ?></option>
			   <?php if($_REQUEST['DpId']!=0){?><option value="0">Select</option><?php } ?>
			   <?php if($_REQUEST['DpId']!=1){?><option value="1">Monthly</option><?php } ?>
			   <?php if($_REQUEST['DpId']!=2){?><option value="2">Quarterly</option><?php } ?>
			   <?php if($_REQUEST['DpId']!=3){?><option value="3">1/2 Annual</option><?php } ?>
			   </select>
			   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
			   <input type="hidden" name="DId" id="DId" value="<?php echo $_REQUEST['DpId']; ?>" />
			  </td>
			  
			  <td align="right" style="font-family:Times New Roman;font-size:16px;color:#007700;width:100px;"><b><?php echo $msg; ?></b><font class="font4"><b>&nbsp;<span id="msg"></span></b></font></td>
			  </td></tr>
			 
			 <tr>
			   <td valign="top" colspan="5" style="width:100%;" id="DisPyRecd"> 
<span id="ResultSpan"></span><input type="hidden" id="mEsId" value="0" />			   
<?php $sqlKey=mysql_query("select * from hrm_pms_key where Person='emp' AND CompanyId=".$CompanyId, $con); 
$resKey=mysql_fetch_assoc($sqlKey); ?>			   
<table border="1" id="table1" style="width:100%;" cellspacing="1">
 <div class="thead">
 <thead>
 <tr bgcolor="#7a6189">
   <td rowspan="2" class="th" style="width:3%;">SNo.</td>
   <td rowspan="2" class="th" style="width:5%;">EC</td>
   <td rowspan="2" class="th" style="width:30%;">Name</td>
   <td rowspan="2" class="th" style="width:15%;">Department</td>
   <td colspan="2" class="th" style="width:15%;">Mail</td>
 </tr>
 <tr bgcolor="#7a6189">
   <td class="th" style="width:5%;"><b>Sent</b></td>
   <td class="th" style="width:5%;"><b>Send</b></td>
 </tr>
 </thead>
 </div>

<?php 
if($_REQUEST['DpId'] AND $_REQUEST['DpId']!='' AND $_REQUEST['PoId']!='' AND $_REQUEST['YeId']!='')
{ 
	  
 $sqlDP = mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." order by e.EmpCode asc ", $con); $Sno=1; while($resDP = mysql_fetch_assoc($sqlDP))
{

 if($_REQUEST['DpId']==1){$prd='Monthly';}
 elseif($_REQUEST['DpId']==2){$prd='Quarter';}
 elseif($_REQUEST['DpId']==3){$prd='1/2 Annual';}

if($_REQUEST['PoId']==1)
{
  $sqlk=mysql_query("Select EmpCode from hrm_pms_kra k inner join hrm_employee e on k.EmployeeID=e.EmployeeID where k.YearId=".$_REQUEST['YeId']." and k.EmpStatus='A' and k.Period='".$prd."' and e.EmpStatus='A' and k.UseKRA!='E' and e.EmployeeID=".$resDP['EmployeeID'],$con); $rowk=mysql_num_rows($sqlk);
  if($rowk==0){ $sqlk=mysql_query("Select EmpCode from hrm_pms_kra k inner join hrm_pms_krasub ks on k.KRAId=ks.KRAId inner join hrm_employee e on k.EmployeeID=e.EmployeeID where k.YearId=".$_REQUEST['YeId']." and k.EmpStatus='A' and ks.Period='".$prd."' and e.EmpStatus='A' and e.EmployeeID=".$resDP['EmployeeID']." and k.UseKRA!='E'",$con); 
  $rowk=mysql_num_rows($sqlk); }    
  $sqchk=mysql_query("select * from hrm_kmail_chk where MEmpId=".$resDP['EmployeeID']." and MDate>='".date("Y-m-01")."' and MDate<='".date("Y-m-07")."'",$con); $rochk=mysql_num_rows($sqchk); //and MPeriod='".$prd."' 
  
}
elseif($_REQUEST['PoId']==2)
{
  $sqlk=mysql_query("Select RepEmployeeID from hrm_pms_kra k inner join hrm_employee e on k.EmployeeID=e.EmployeeID inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where k.YearId=".$_REQUEST['YeId']." and k.EmpStatus='A' and k.Period='".$prd."' and e.EmpStatus='A' and g.RepEmployeeID=".$resDP['EmployeeID']." and k.UseKRA!='E'",$con); 
  $rowk=mysql_num_rows($sqlk);
  if($rowk==0){ $sqlk=mysql_query("Select RepEmployeeID from hrm_pms_kra k inner join hrm_pms_krasub ks on k.KRAId=ks.KRAId inner join hrm_employee e on k.EmployeeID=e.EmployeeID inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where k.YearId=".$_REQUEST['YeId']." and k.EmpStatus='A' and ks.Period='".$prd."' and e.EmpStatus='A' and g.RepEmployeeID=".$resDP['EmployeeID']." and k.UseKRA!='E'",$con); $rowk=mysql_num_rows($sqlk); }
  
  $sq2chk=mysql_query("select * from hrm_kmail_chk where REmpId=".$resDP['EmployeeID']." and MDate>='".date("Y-m-08")."' and MDate<='".date("Y-m-14")."'",$con); $ro2chk=mysql_num_rows($sq2chk); //and MPeriod='".$prd."' 
  
}      

if($rowk>0)
{
 
if($resDP['Gender']=='M'){$M='Mr.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='Y'){$M='Mrs.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='N'){$M='Miss.';} $Name=$M.' '.$resDP['Fname'].' '.$resDP['Sname'].' '.$resDP['Lname']; $LEC=strlen($resDP['EmpCode']); if($LEC==1){$EC='000'.$resDP['EmpCode'];} if($LEC==2){$EC='00'.$resDP['EmpCode'];} if($LEC==3){$EC='0'.$resDP['EmpCode'];} if($LEC>=4){$EC=$resDP['EmpCode'];}	 

?>
 <div class="tbody">
 <tbody>
 <tr bgcolor="#FFFFFF"> 
  <td class="td"><?php echo $Sno; ?></td>
  <td class="td"><?php echo $EC; ?></td>
  <td class="tdl">&nbsp;<?php echo $Name; ?></td>
  <td class="tdl">&nbsp;<?php echo $resDP['DepartmentCode'];?></td>
  <?php if($_REQUEST['PoId']==1){ ?>
  <td class="td" style="color:<?php if($rochk>0){echo '#008C00';}?>;"><?php if($rochk>0){echo 'Yes';} ?></td>
  <td class="td" style="cursor:pointer;"><?php if($rochk==0 && date("d")>='01' && date("d")<='07'){ ?><img src="images/go-back-icon.png" id="imgg_<?php echo $resDP['EmployeeID'];?>" onClick="FunMailS('E',<?php echo $resDP['EmployeeID'];?>)" /><?php } ?></td>
  <?php }elseif($_REQUEST['PoId']==2){ ?>
  <td class="td" style="color:<?php if($ro2chk>0){echo '#008C00';}?>;"><?php if($ro2chk>0){echo 'Yes';} ?></td>
  <td class="td" style="cursor:pointer;"><?php if($ro2chk==0 && date("d")>='08' && date("d")<='14'){ ?><img src="images/go-back-icon.png" id="imgg_<?php echo $resDP['EmployeeID'];?>" onClick="FunMailS('R',<?php echo $resDP['EmployeeID'];?>)" /><?php } ?></td>
  <?php } ?>
 </tr>
 </tbody>
 </div>
<?php $Sno++; } } } ?>
</table>
   </td>	
  </tr>
<?php //------------------------Display Record------------------------------------ ?>
 <tr><td><span id="DeptEmpName"></span></td></tr> 
 <tr><td bgcolor="#B6E9E2" colspan="6"></td></tr>
		   </table>  		
		</td>
        <?php } ?>
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
		
<?php //**************************************************************************?>
<?php //******************END*****END*****END******END******END********************************?>
<?php //***********************************************************************************?>
		
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
	</tr>
	<tr>
	  <td valign="top">
	    <?php //require_once("../footer.php"); ?>
	  </td>
	</tr>-->
  </table>
 </td>
</tr>
</table>
</body>
</html>