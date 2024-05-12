<?php require_once('../../Employee/sp/user/config/config.php');?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> /*background-color:#D9D9FF;background-color:#EEEEEE; */
.htf{font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:18px;height:24px;}
.htf2{font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:12px;}
.tdf{ background-color:#FFFFFF;font-family:Times New Roman;font-size:14px;height:22px;color:#000000;}
.tdft{ background-color:#FFFF9D;font-family:Times New Roman;font-size:14px;height:22px;color:#000000;}
.tdf2{background-color:#FFFFC4;font-family:Times New Roman;;font-size:15px;height:22px;text-align:center;}
</style>
</head>
<body style="background-color:#FFF;">
<?php 
if($_REQUEST['id']>0)
{ 
$sql=mysql_query("select * from fa_details where FaId=".$_REQUEST['id'],$con); $res=mysql_fetch_assoc($sql);
if($res['Mode']==1){$mode='Direct(Sales Executive)';}elseif($res['Mode']==2){$mode='Teamlease';}elseif($res['Mode']==3){$mode='Distributor';} 
$sc=mysql_query("select CountryName,StateName,HqName,s.CountryId,h.StateId from hrm_headquater h inner join hrm_state s on h.StateId=s.StateId inner join hrm_country c on s.CountryId=c.CountryId where h.HqId=".$res['HqId'], $con); $rc=mysql_fetch_assoc($sc); 
} 
?>  

<table class="table">
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
	 <tr>
	  <td valign="top" width="100%" id="MainWindow" align="right">
<script type="text/javascript" language="javascript">function Pp(){document.getElementById("ppid").style.display='none'; window.print();}</script><span style="cursor:pointer;text-decoration:underline;color:#003399;" onClick="Pp()" id="ppid">print</span>&nbsp;&nbsp;&nbsp;
<?php //***************START*****START*****START******START******START***************************?>
<table border="0" style="margin-top:0px;width:100%;height:150px;">	
<tr><td style="width:100%;" class="htf2" align="center"><b><u>FA HISTORY</u></b></td></tr>
<tr><td style="width:100%;" class="htf" align="center"><?php echo strtoupper($res['FaName']); ?></td></tr>
<tr><td style="width:100%;" class="htf2" align="center"><?php echo 'Current HQ:'.ucfirst(strtolower($rc['HqName'])).'('.strtoupper($rc['StateName']).')';?></td></tr>
<tr><td style="width:100%;" class="htf2" align="center"><?php echo 'Current FA HQ:'.ucfirst(strtolower($res['OtherHq']));?></td></tr>
<tr>
 <td style="width:100%;" valign="top" align="center">
  <table border="1" cellspacing="0" style="width:100%;">
    <tr style="height:22px;">
	 <td rowspan="2" class="tdf2"><b>Sn</b></td>
	 <td colspan="2" class="tdf2"><b>Date</b></td>
	 <td rowspan="2" class="tdf2"><b>Mode</b></td>
	 <td rowspan="2" class="tdf2"><b>Sal Distributor</b></td>
	 <td rowspan="2" class="tdf2"><b>Reporting</b></td>
	 <td rowspan="2" class="tdf2"><b>Expences</b></td>
	 <td rowspan="2" class="tdf2"><b>FA Hq</b></td>
	 <td rowspan="2" class="tdf2"><b>Sal Mode</b></td>
	 <td rowspan="2" class="tdf2"><b>Job Status</b></td>
	</tr>
	<tr style="height:22px;">
	 <td style="width:70px;" class="tdf2"><b>From</b></td>
	 <td style="width:70px;" class="tdf2"><b>To</b></td>
	</tr>
<?php $sqF=mysql_query("select * from fa_details_up where FaId=".$res['FaId']." order by Fdate ASC",$con); 
      $no=1; while($rsF=mysql_fetch_assoc($sqF)){ 
	  $dis2=mysql_query("select DealerName from hrm_sales_dealer where DealerId=".$rsF['Sal_DealerId'],$con);
	  $e2=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$rsF['Reporting'],$con); 
	  $rdis2=mysql_fetch_assoc($dis2); $re2=mysql_fetch_assoc($e2); 
	  ?>
    <tr style="height:22px;" bgcolor="#FFFFFF">	 
	 <td class="tdf" align="center"><?php echo $no; ?></td>
	 <td class="tdf" align="center"><?php echo date("d M y",strtotime($rsF['Fdate'])); ?></td>
	 <td class="tdf" align="center"><?php echo date("d M y",strtotime($rsF['Tdate'])); ?></td>
	 <td class="tdf"><?php if($rsF['Mode']==1){echo 'Direct(Sales Executive)';}elseif($rsF['Mode']==2){echo 'Teamlease';}elseif($rsF['Mode']==3){echo 'Distributor';} ?></td>
	 <td class="tdf"><?php echo ucfirst(strtolower($rdis2['DealerName'])); ?></td>
	 <td class="tdf"><?php echo ucfirst(strtolower($re2['Fname'].' '.$re2['Sname'].' '.$re2['Lname']));?></td>
	 <td class="tdf" align="center"><?php echo floatval($rsF['Salary']+$rsF['Expences']); ?></td>
	 <td class="tdf" align="center"><?php echo $rsF['OtherHq']; ?></td>
	 <td class="tdf" align="center"><?php echo $rsF['SalaryMode']; ?></td>
	 <td class="tdf" align="center"><?php echo $rsF['JobStatus']; ?></td>
	</tr>
<?php $no++; } ?>	
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
