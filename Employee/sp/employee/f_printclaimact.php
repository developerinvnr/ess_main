<?php require_once('../user/config/config.php'); ?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.htf{font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:18px;height:24px;}
.tdf{font-family:Times New Roman;font-size:14px;color:#000000;}
.tdf2{background-color:#FFFF9D;font-family:Times New Roman;;font-size:15px;height:22px;text-align:center;}
</style>
<script type="text/javascript" language="javascript">
function PrintFun(){ window.print(); }
</script>
<body style="background-color:#FFFFFF;" onLoad="PrintFun()">
<?php $sal=mysql_query("select * from fa_salary where SalId=".$_REQUEST['si'],$con); 
$resS=mysql_fetch_assoc($sal); $dis=mysql_query("select rd.Sal_DealerId,DealerName from fa_details rd inner join hrm_sales_dealer sd on rd.Sal_DealerId=sd.DealerId where FaId=".$resS['FaId']." order by DealerName ASC",$con); 
$rowdis=mysql_num_rows($dis);

$sql=mysql_query("select f.*,CountryName,StateName,HqName from fa_details f inner join hrm_headquater h on f.HqId=h.HqId inner join hrm_state s on h.StateId=s.StateId inner join hrm_country c on s.CountryId=c.CountryId where f.FaId=".$resS['FaId'],$con); $res=mysql_fetch_assoc($sql);

$e=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['Reporting'],$con); 
$re=mysql_fetch_assoc($e);

if($resS['Month']==1){$Month='January';}elseif($resS['Month']==2){$Month='February';}elseif($resS['Month']==3){$Month='March';}elseif($resS['Month']==4){$Month='April';}elseif($resS['Month']==5){$Month='May';}elseif($resS['Month']==6){$Month='June';}elseif($resS['Month']==7){$Month='July';}elseif($resS['Month']==8){$Month='August';}elseif($resS['Month']==9){$Month='September';}elseif($resS['Month']==10){$Month='October';}elseif($resS['Month']==11){$Month='November';}elseif($resS['Month']==12){$Month='December';} 


 ?>
<center>
<table border="0" style="margin-top:5px; margin-left:10px;margin-right:10px;width:98%;">
<tr>
 <td style="width:100%;">
  <table border="0" style="width:95%;">
   <tr><td style="width:100%;" align="center"><b>FIELD ASSISTANT EXPENSE CLAIM</b></td></tr>
   <tr><td style="height:20px;">&nbsp;</td></tr>
   <tr>
    <td class="tdf">	
VNR Seeds Pvt. Ltd.<br/>
Corporate Center<br/>
Canal Road Crossing<br/> 
Ring Road no-1<br/>
Telibandha, Raipur- 492006<p>
<b>Sub:</b> FA Expense Claim, Month – <u><?php echo $Month.' '.$resS['Year']; ?></u><p>
Dear Sir,<br/>
I am submitting the expense claim of FA <b><?php echo ucfirst(strtolower($res['FaName'])); ?></b> under distributor <b><?php if($rowdis>0){ $sn=1; while($rdis=mysql_fetch_assoc($dis)){ echo ucfirst(strtolower($rdis['DealerName'])); $sn++;} if($sn<$rowdis){echo ', ';} }else{ echo '< >'; } ?></b> for the month of <?php echo $Month.' '.$resS['Year']; ?> as per following details:<p>	
    <table border="1" cellpadding="0" cellspacing="0">
	 <tr>
	  <td class="tdf2" style="width:200px;"><b>FA Name</b></td>
	  <td class="tdf2" style="width:200px;"><b>Reporting</b></td>
	  <td class="tdf2" style="width:200px;"><b>Distributor</b></td>
	  <td class="tdf2" style="width:80px;"><b>Expense Amount</b></td>
	 </tr>
     <tr style="background-color:#FFFFFF; height:24px;">
	  <td class="tdf" valign="top"><?php echo ucfirst(strtolower($res['FaName'])); ?></td>
	  <td class="tdf" valign="top"><?php echo ucfirst(strtolower($re['Fname'].' '.$re['Sname'].' '.$re['Lname'])); ?></td>
	  <td class="tdf" valign="top"><?php $dis=mysql_query("select rd.Sal_DealerId,DealerName from fa_details rd inner join hrm_sales_dealer sd on rd.Sal_DealerId=sd.DealerId where FaId=".$resS['FaId']." order by DealerName ASC",$con); 
$rowdis=mysql_num_rows($dis);  $no=1; while($rdis=mysql_fetch_assoc($dis)){ echo ucfirst(strtolower($rdis['DealerName'])); $no++;} if($no<$rowdis){echo ', ';} ?></td>
	  <td class="tdf" align="right" valign="top"><?php echo floatval($resS['ClaimSal']+$resS['ClaimExp']); ?>&nbsp;</td>
	 </tr>
	</table>
	<p><p>
	
<b>Date of Claim Submission: </b><u><?php echo date("d-m-Y", strtotime($resS['ClaimDate'])); ?></u><p><p><p>
Thanking you<p><br><p>
<?php $s=mysql_query("select Fname,Sname,Lname,DesigName,DepartmentName from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_designation de on g.DesigId=de.DesigId where e.EmployeeID=".$_REQUEST['e'],$con); $r=mysql_fetch_assoc($s); ?>
<?php echo $r['Fname'].' '.$r['Sname'].' '.$r['Lname']; ?><br/> 
<?php echo $r['DesigName']; ?><br/>
(<?php echo $r['DepartmentName']; ?>)<p/><p/>
	
	</td>
  </table>
 </td>
</tr>

<tr><td style="height:10px;">&nbsp;</td></tr>
</table>
</center>
</body>

<?php /*<td>:</td><td class="tdf"><?php echo strtoupper($res['FaName']); ?></td>
	<td style="width:50px;">&nbsp;</td>
	<td class="tdf">Mode</td><td>:</td><td class="tdf"><?php if($res['Mode']==1){echo 'Direct(Sales Executive)';}elseif($res['Mode']==2){echo 'Teamlease';}elseif($res['Mode']==3){echo 'Distributor';} ?></td>
   </tr>
 
 */ ?>  