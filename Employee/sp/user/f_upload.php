<?php require_once('config/config.php'); 
/**************************************/
if(isset($_POST['claimupdate']))
{
  
  if($_POST['Sts']==2 && (!empty($_FILES["Attach"])) && ($_FILES['Attach']['error']==0))
  { $slipN=strtolower(basename($_FILES['Attach']['name']));
    $slipExt=substr($slipN, strrpos($slipN, '.') + 1);
	$slipName='slip'.$_POST['fffid'].'_'.$_POST['ffm'].''.$_POST['ffy'].'.'.$slipExt;
	$slipPath='f_slip/'.$slipName;
    move_uploaded_file($_FILES["Attach"]["tmp_name"],$slipPath);
  } else {$slipName=''; $slipExt=''; }
 
 
 if($_POST['PamtS']==''){$Ps=0;}else{$Ps=$_POST['PamtS'];}
 if($_POST['PamtE']==''){$Pe=0;}else{$Pe=$_POST['PamtE'];}
 
 $chk=mysql_query("select * from fa_salary where FaId=".$_POST['fffid']." AND Month=".$_POST['ffm']." AND Year=".$_POST['ffy'],$con); $row=mysql_num_rows($chk);
 if($row>0)
 { $up=mysql_query("update fa_salary set ActualSal=".$Ps.", ActualExp=".$Pe.", AppdDate='".date("Y-m-d")."', AppdBy=".$_POST['UId'].", Status=".$_POST['Sts'].", Slip='".$slipName."', exts='".$slipExt."', Remark='".$_POST['Rmk']."' where FaId=".$_POST['fffid']." AND Month=".$_POST['ffm']." AND Year=".$_POST['ffy'],$con); }
 elseif($row==0)
 { $up=mysql_query("insert into fa_salary(FaId, Month, Year, ActualSal, ActualExp, AppdDate, AppdBy, Status, Slip, exts, Remark) values(".$_POST['fffid'].", ".$_POST['ffm'].", ".$_POST['ffy'].", ".$Ps.", ".$Pe.", '".date("Y-m-d")."', ".$_POST['UId'].", ".$_POST['Sts'].", '".$slipName."', '".$slipExt."', '".$_POST['Rmk']."')",$con); }
 if($up){echo '<script>alert("data save successfully.."); window.close();</script>';}
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.htf{font-family:Georgia;color:#000;font-weight:bold;text-align:center;font-size:18px;height:24px;}
.tdf{font-family:Georgia;font-size:14px;height:22px;color:#000000;}
.InputSel{font-family:Georgia;font-size:12px;text-align:left; }
.InputType{font-family:Georgia;font-size:12px;text-align:left; height:22px; }
</style>
<script type="text/javascript" language="javascript">
<!--
function isNumberKey(evt)
{
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode != 46 && charCode > 31 
	&& (charCode < 48 || charCode > 57))
	 return false;
  return true;
}
//-->

function validate(FormS) 
{ var sts=document.getElementById("Sts").value; var amt=document.getElementById("PamtS").value;
  if(sts==1){var stst='Pending';}else if(sts==2){var stst='Approved/Paid';}else if(sts==3){var stst='Reject';}
  
  if(sts==2 && (amt=='' || amt==0)){alert("please enter paid amount"); return false;}
  else if((sts==1 || sts==3) || (sts==2 && (amt!='' || amt!=0)))
  { var agree=confirm('Are you sure, claim status is "'+stst+'"?'); if(agree){return true;}else{return false;} }
  else {return false;}
}
</script>
<body style="background-color:#C2F793;">
<?php if($_REQUEST['action']=='uploadFileslip' AND $_REQUEST['fid']!='' AND $_REQUEST['m']!='' AND $_REQUEST['y']!='' AND $_REQUEST['s']!='' AND $_REQUEST['hq']!='' AND $_REQUEST['sn']!='' AND $_REQUEST['v']!='' AND $_REQUEST['u']!=''){ if($_REQUEST['v']==1){$sts='Pending';}elseif($_REQUEST['v']==2){$sts='Approved/Paid';}elseif($_REQUEST['v']==3){$sts='Reject';} 

if($_REQUEST['m']==1){$Month='January';}elseif($_REQUEST['m']==2){$Month='February';}elseif($_REQUEST['m']==3){$Month='March';}elseif($_REQUEST['m']==4){$Month='April';}elseif($_REQUEST['m']==5){$Month='May';}elseif($_REQUEST['m']==6){$Month='June';}elseif($_REQUEST['m']==7){$Month='July';}elseif($_REQUEST['m']==8){$Month='August';}elseif($_REQUEST['m']==9){$Month='September';}elseif($_REQUEST['m']==10){$Month='October';}elseif($_REQUEST['m']==11){$Month='November';}elseif($_REQUEST['m']==12){$Month='December';} 

$sql=mysql_query("select f.*,CountryName,StateName,HqName from fa_details f inner join hrm_headquater h on f.HqId=h.HqId inner join hrm_state s on h.StateId=s.StateId inner join hrm_country c on s.CountryId=c.CountryId where f.FaId=".$_REQUEST['fid'],$con); $res=mysql_fetch_assoc($sql); ?>
<center>
<table border="0" style="margin-top:5px; width:100%;">
<tr>
 <td align="center" style="width:100%;">
  <table border="0">
   <tr><td colspan="7" align="center"><b>FA Details</b></td></tr>
   <tr>
    <td class="tdf">FA Name</td><td>:</td><td class="tdf"><?php echo strtoupper($res['FaName']); ?></td>
	<td style="width:50px;">&nbsp;</td>
	<td class="tdf">Expense</td><td>:</td><td class="tdf"><?php echo floatval($res['Salary']+$res['Expences']); ?></td>
   </tr>
   <tr>
    <td class="tdf">Mode</td><td>:</td><td class="tdf"><?php if($res['Mode']==1){echo 'Direct(Sales Executive)';}elseif($res['Mode']==2){echo 'Teamlease';}elseif($res['Mode']==3){echo 'Distributor';} ?></td>
	<td style="width:50px;">&nbsp;</td>
	<td class="tdf"><?php //Expen. ?></td><td>:</td><td class="tdf"><?php //echo floatval($res['Expences']); ?></td>
   </tr>
   <tr>
    <td class="tdf">HQ</td><td>:</td><td class="tdf"><?php echo ucfirst(strtolower($res['HqName'])); ?></td>
	<td style="width:50px;">&nbsp;</td>
	<td class="tdf">State</td><td>:</td><td class="tdf"><?php echo ucfirst(strtolower($res['StateName'])); ?></td>
   </tr>
  </table>
 </td>
</tr>
<tr>
 <td align="center" style="width:100%;">
  <table border="1" style="background-color:#FFFFB3;">
<?php $sal=mysql_query("select * from fa_salary where FaId=".$_REQUEST['fid']." AND Month=".$_REQUEST['m']." AND Year=".$_REQUEST['y'],$con); $rowS=mysql_num_rows($sal); $resS=mysql_fetch_assoc($sal); ?>   
   <tr><td colspan="12" align="center"><b>Claim Details</b></td></tr>
   <tr>
    <td class="tdf" style="width:150px;">Month:&nbsp;<font color="#FF1515"><?php echo $Month; ?></font></td>
	<td class="tdf" style="width:150px;" colspan="2">Year:&nbsp;<font color="#FF1515"><?php echo $_REQUEST['y']; ?></font></td>
   </tr>
   <tr>
    <td colspan="2" class="tdf" style="width:150px;">Expense:&nbsp;<font color="#FF1515"><?php if($resS['ClaimSal']>0 OR $resS['ClaimExp']>0){echo floatval($resS['ClaimSal']+$resS['ClaimExp']);} ?></font></td>
	<td class="tdf" style="width:150px;">Total:&nbsp;<font color="#FF1515"><?php if($resS['ClaimSal']>0 OR $resS['ClaimExp']>0){echo floatval($resS['ClaimSal']+$resS['ClaimExp']);} ?></font></td>
   </tr>
  </table>
 </td>
</tr>
<tr><td style="height:10px;">&nbsp;</td></tr>
<form name="FormS" enctype="multipart/form-data" method="post" onSubmit="return validate(this)">
<input type="hidden" name="ffm" value="<?php echo $_REQUEST['m']; ?>" />
<input type="hidden" name="ffy" value="<?php echo $_REQUEST['y']; ?>" /> 	 
<input type="hidden" name="fffid" value="<?php echo $_REQUEST['fid']; ?>" /> 
<input type="hidden" name="UId" value="<?php echo $_REQUEST['u']; ?>" /> 	 
<tr>
 <td style="width:100%;">
  <table border="0" style="width:100%;"> 
   <tr><td colspan="3" align="center"><b><u>My Action</u></b></td></tr>
   <tr>
    <td class="tdf">Status</td><td>:</td>
	<td class="tdf"><select class="InputSel" style="width:100px;" id="Sts" name="Sts"><?php if($_REQUEST['v']==0){?><option value="0">Draft</option><?php }elseif($_REQUEST['v']==1){?><option value="1">Pending</option><?php }elseif($_REQUEST['v']==2){?><option value="2">Verified</option><?php }elseif($_REQUEST['v']==22){?><option value="2">Paid</option><?php }elseif($_REQUEST['v']==3){?><option value="3">Reject</option><?php } ?><?php if($_REQUEST['v']!=1){ ?><option value="1">Pending</option><?php } ?>
<?php if($_REQUEST['v']!=2){ ?><option value="2">Verified</option><option value="2">Paid</option><?php } ?>
<?php if($_REQUEST['v']!=3){ ?><option value="3">Reject</option><?php } ?></select></td>
   </tr>
   <tr>	
	<td class="tdf">Paid Expense</td><td>:</td>
	<td class="tdf"><input class="InputType" style="width:100px;text-align:right;" id="PamtS" name="PamtS" onKeyPress="return isNumberKey(event)" value="<?php if($resS['ActualSal']>0){echo floatval($resS['ActualSal']);} ?>" maxlength="10"/></td>
	<td class="tdf"><?php //Paid Expen. ?></td><td><?php //: ?></td>
	<td class="tdf"><input type="hidden" class="InputType" style="width:100px;text-align:right;" id="PamtE" name="PamtE" onKeyPress="return isNumberKey(event)" value="0" maxlength="10"/></td>
   </tr>
   <tr>	
	<td class="tdf">Attach Slip</td><td>:</td>
	<td class="tdf" colspan="4"><input type="file" style="width:200px;" class="InputType" id="Attach" name="Attach" value="file"/></td>
   </tr>
   <tr>	
	<td class="tdf" valign="top">Remark</td><td valign="top">:</td>
	<td class="tdf" colspan="4"><textarea name="Rmk" cols="35" rows="4"><?php echo $resS['Remark']; ?></textarea></td>
   </tr>
   <tr>
    <td></td><td></td>
    <td><input type="submit" name="claimupdate" value="update" style="width:80px;"/></td>
   </tr>
   <tr>
  </table>
 </td>
</tr>
</form>

</table>

</center>
</body>
<?php } ?>