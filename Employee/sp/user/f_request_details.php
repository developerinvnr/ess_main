<?php require_once('config/config.php'); ?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> /*background-color:#D9D9FF;  background-color:#EEEEEE; */
.CalenderButton {background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px;background-color:#E0DBE3;border-color:#FFFFFF;}
.htf{font-family:Georgia;color:#000;font-weight:bold;text-align:center;font-size:12px;background-color:#97FFFF;}
.htf2{font-family:Georgia;color:#FFFF28;font-weight:bold;text-align:center;font-size:18px;height:24px;}
.tdf{font-family:Georgia;font-size:12px;height:20px;color:#fff;}
.tdf2{background-color:#FFFFFF;font-family:Georgia;font-size:12px;height:20px;color:#000000;}
.InputSel {font-family:Georgia;font-size:12px;text-align:left; }
.InputType {font-family:Georgia;font-size:12px;text-align:left; }
.InputType2 {font-family:Georgia;font-size:12px;border:hidden;}
.SaveButton {background-image:url(images/save.png);width:18px;height:18px;background-repeat:no-repeat;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
</head>
<body bgcolor="#487DE1">
<!DOCTYPE html>
<html>
<center>
<?php //***************START*****START*****START******START******START***************************?>
<?php $sql=mysql_query("select * from fa_request where FareqId=".$_REQUEST['id'],$con); $res=mysql_fetch_array($sql); ?>
 <table border="0" style="width:100%;">
  <td style="width:100%;" valign="top">
   <table style="width:100%;" border="0">
  
    <tr><td colspan="3" align="center" class="htf2"><u>FA Request Details</u></td></tr>	
	<tr><td colspan="3">&nbsp;</td></tr>
	<tr>
	 <td class="tdf" style="width:100px;">&nbsp;Mode</td>
	 <td class="tdf" style="width:10px;" align="center">:</td>
	 <td style="width:300px;"><?php if($res['Mode']==1){echo 'Direct(Sales Executive)';}elseif($res['Mode']==2){echo 'Teamlease';}elseif($res['Mode']==3){echo 'Distributor';}?></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Crop</td><td class="tdf" align="center">:</td>
	 <td><?php $crp=mysql_query("select ItemName from fa_request_crop rc inner join hrm_sales_seedsitem si on rc.ItemId=si.ItemId where FareqId=".$res['FareqId']." order by ItemName ASC",$con); while($rcrp=mysql_fetch_assoc($crp)){ echo ucfirst(strtolower($rcrp['ItemName'])).', '; } ?></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;HeadQuarter</td>
	 <td class="tdf" align="center">:</td><td><?php $hq=mysql_query("select HqName from hrm_headquater where HqId=".$res['HqId'],$con); $rhq=mysql_fetch_assoc($hq); echo ucfirst(strtolower($rhq['HqName'])); ?></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Reporting</td>
	 <td class="tdf" align="center">:</td><td><?php $e=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['Reporting'],$con); $re=mysql_fetch_assoc($e); echo ucfirst(strtolower($re['Fname'].' '.$re['Sname'].' '.$re['Lname'])); ?></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Distibutor</td>
	 <td class="tdf" align="center">:</td><td><?php $dis=mysql_query("select DealerName from fa_request_dealer rd inner join hrm_sales_dealer sd on rd.DealerId=sd.DealerId where FareqId=".$res['FareqId']." order by DealerName ASC",$con); while($rdis=mysql_fetch_assoc($dis)){ echo ucfirst(strtolower($rdis['DealerName'])).', '; } ?></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Expen. Distributor</td><td class="tdf" align="center">:</td> 
	 <td><?php $dis2=mysql_query("select DealerName from hrm_sales_dealer where DealerId=".$res['Sal_DealerId'],$con); 
	 $rdis2=mysql_fetch_assoc($dis2); echo ucfirst(strtolower($rdis2['DealerName']));  ?></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Plan (Rs)/Last-Year</td>
	 <td class="tdf" align="center">:</td><td><?php echo floatval($res['Plan_last']); ?></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Plan (Rs)/Tgt-Year</td>
	 <td class="tdf" align="center">:</td><td><?php echo floatval($res['Plan_tgt']); ?></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Plan (Rs)/Proj-Year</td>
	 <td class="tdf" align="center">:</td><td><?php echo floatval($res['Plan_proj']); ?></td>
	</tr>

	<tr>
	 <td class="tdf">&nbsp;Expected Expense</td>
	 <td class="tdf" align="center">:</td><td><?php echo floatval($res['Salary']); ?></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Expected Date</td>
	 <td class="tdf" align="center">:</td><td><?php echo date("d M y",strtotime($res['Req_Date'])); ?></td>
	</tr>
	<tr>
	 <td class="tdf" valign="top">&nbsp;Remark</td>
	 <td class="tdf" align="center">:</td><td><?php echo ucfirst(strtolower($res['Remark'])); ?></td>
	</tr>
	<tr>
	 <td class="tdf" valign="top">&nbsp;Status</td>
	 <td class="tdf" align="center">:</td><td><?php if($res['Status']==0){echo 'Draft';}elseif($res['Status']==1){echo 'Sent';}elseif($res['Status']==2){echo 'Pending';}elseif($res['Status']==3){echo 'Approval';}elseif($res['Status']==4){echo 'Close';} ?>
	</tr>
	<tr>
	 <td class="tdf" valign="top">&nbsp;Level</td>
	 <td class="tdf" align="center">:</td><td><?php if($res['Status_Cycle']==0){echo 'Self';}elseif($res['Status_Cycle']==1){echo 'GM';}elseif($res['Status_Cycle']==2 OR $res['Status_Cycle']==3){echo 'Marketing';}?>
	</tr>	
   </table>
  </td>
 </table>
<?php //*****************END*****END*****END******END******END**************************?>
</center>
</body>
</html>