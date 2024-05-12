<?php require_once('config/config.php'); ?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.htf{font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:18px;height:24px;}
.tdf{font-family:Times New Roman;font-size:14px;height:22px;color:#000000;}
.tdf2{background-color:#FFFF9D;font-family:Times New Roman;;font-size:15px;height:22px;text-align:center;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px;background-color:#E0DBE3;border-color:#FFFFFF;}
</style>
<body style="background-color:#FFFFFF;">
<?php if($_REQUEST['r']>0){$e=$_REQUEST['r'];}elseif($_REQUEST['a']>0){$e=$_REQUEST['a'];}
      $m=$_REQUEST['m']; $y=$_REQUEST['y']; $md=$_REQUEST['md'];
if($m==1){$Month='January';}elseif($m==2){$Month='February';}elseif($m==3){$Month='March';}elseif($m==4){$Month='April';}elseif($m==5){$Month='May';}elseif($m==6){$Month='June';}elseif($m==7){$Month='July';}elseif($m==8){$Month='August';}elseif($m==9){$Month='September';}elseif($m==10){$Month='October';}elseif($m==11){$Month='November';}elseif($m==12){$Month='December';} ?>
<center>
<table border="0" style="margin-top:5px; margin-left:10px;margin-right:10px;width:98%;">
<tr>
 <td style="width:100%;">
  <table border="0" style="width:99%;">
   <tr><td style="width:100%;" align="center"><b>FA EXPENSE CLAIM</b></td></tr>
   <tr><td style="height:20px;">&nbsp;</td></tr>
   <tr>
 <script>function prnt(){ document.getElementById("pp").style.display='none'; window.print(); }</script>
    <td class="tdf"><span id="pp" style="cursor:pointer;color:#0033CC;" onClick="prnt()">Print</span><br/><br/>	
VNR Seeds Pvt. Ltd.<br/>
Corporate Center<br/>
Canal Road Crossing<br/> 
Ring Road no-1<br/>
Telibandha, Raipur- 492006<p>
<b>Sub:</b> FA Expense Claim, Month – <b><u><?php echo $Month.' '.$y; ?></u></b><p>
Dear Sir,<br/>
I am submitting the expense claim for the month of <b><?php echo $Month.' '.$y; ?></b> as per following details:<p>	
    <table border="1" cellpadding="0" cellspacing="0">
	 <tr>
	  <td class="tdf2" style="width:200px;"><b>FA Name</b></td>
	  <td class="tdf2" style="width:100px;"><b>HQ</b></td>
	  <td class="tdf2" style="width:100px;"><b>FA HQ</b></td>
	  <td class="tdf2" style="width:200px;"><b>Reporting</b></td>
	  <td class="tdf2" style="width:200px;"><b>Exp. Distributor</b></td>
	  <?php /*?><td class="tdf2" style="width:200px;"><b>Distributor</b></td><?php */?>
	  <td class="tdf2" style="width:80px;"><b>Amount</b></td>
	 </tr>
<?php 
 $sqlee=mysql_query("select * from fa_notaccemp where RepEmpId=".$e,$con); $rowee=mysql_num_rows($sqlee);
 if($rowee>0)
 {
  $sal=mysql_query("select fd.*,HqName,StateName from fa_notaccemp nf inner join hrm_sales_reporting_level rl on (nf.EmpId=rl.EmployeeID OR nf.EmpId=rl.R1 OR nf.EmpId=rl.R2 OR nf.EmpId=rl.R3 OR nf.EmpId=rl.R4) inner join fa_details fd on rl.EmployeeID=fd.Reporting inner join hrm_headquater hq on fd.HqId=hq.HqId inner join hrm_state s on hq.StateId=s.StateId where (nf.RepEmpId=".$e." OR rl.EmployeeID=".$e.") AND (fd.Mode=1 OR fd.Mode=3) AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaName ASC",$con);
  $salt=mysql_query("select sum(fs.ClaimSal) as sal, sum(fs.ClaimExp) as exp from fa_notaccemp nf inner join hrm_sales_reporting_level rl on (nf.EmpId=rl.EmployeeID OR nf.EmpId=rl.R1 OR nf.EmpId=rl.R2 OR nf.EmpId=rl.R3 OR nf.EmpId=rl.R4) inner join fa_details fd on rl.EmployeeID=fd.Reporting inner join fa_salary fs on fd.FaId=fs.FaId where (nf.RepEmpId=".$e." OR rl.EmployeeID=".$e.") AND fs.Month=".$_REQUEST['m']." AND fs.Year=".$_REQUEST['y']." AND (fd.Mode=1 OR fd.Mode=3) AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaName ASC",$con);
 }
 else
 {
  $sal=mysql_query("select fd.*,HqName,StateName from fa_details fd inner join hrm_sales_reporting_level rl on fd.Reporting=rl.EmployeeID inner join hrm_headquater hq on fd.HqId=hq.HqId inner join hrm_state s on hq.StateId=s.StateId where (fd.Reporting=".$e." OR rl.R1=".$e." OR rl.R2=".$e." OR rl.R3=".$e." OR rl.R4=".$e." OR rl.R5=".$e.") AND (fd.Mode=1 OR fd.Mode=3) AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaName ASC",$con);
  $salt=mysql_query("select sum(fs.ClaimSal) as sal, sum(fs.ClaimExp) as exp from fa_details fd inner join fa_salary fs on fd.FaId=fs.FaId inner join hrm_sales_reporting_level rl on fd.Reporting=rl.EmployeeID inner join hrm_headquater hq on fd.HqId=hq.HqId inner join hrm_state s on hq.StateId=s.StateId where (fd.Reporting=".$e." OR rl.R1=".$e." OR rl.R2=".$e." OR rl.R3=".$e." OR rl.R4=".$e." OR rl.R5=".$e.") AND fs.Month=".$_REQUEST['m']." AND fs.Year=".$_REQUEST['y']." AND (fd.Mode=1 OR fd.Mode=3) AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaName ASC",$con);
 }
 $rest=mysql_fetch_assoc($salt);
 $row=mysql_num_rows($sal); while($res=mysql_fetch_assoc($sal)){
 $sal2=mysql_query("select * from fa_salary where FaId=".$res['FaId']." AND Month=".$_REQUEST['m']." AND Year=".$_REQUEST['y'],$con); $res2=mysql_fetch_assoc($sal2);
 
?>	 
     <tr style="background-color:#FFFFFF; height:24px;">
	  <td class="tdf" valign="top"><?php echo ucfirst(strtolower($res['FaName'])); ?></td>
	  <td class="tdf" valign="top"><?php echo ucfirst(strtolower($res['OtherHq'])); ?></td>
	  <td class="tdf" valign="top"><?php echo ucfirst(strtolower($res['HqName'])); ?></td>
	  <?php $e=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['Reporting'],$con); 
	        $re=mysql_fetch_assoc($e); ?>
	  <td class="tdf" valign="top"><?php echo ucfirst(strtolower($re['Fname'].' '.$re['Sname'].' '.$re['Lname'])); ?></td>
	  
	  <td class="tdf" valign="top"><?php $dis=mysql_query("select DealerName from hrm_sales_dealer where DealerId=".$res['Sal_DealerId'],$con); $rowdis=mysql_num_rows($dis); $rdis=mysql_fetch_assoc($dis); echo ucfirst(strtolower($rdis['DealerName'])); ?></td>
	  
	  <?php /*?><td class="tdf" valign="top"><?php $dis2=mysql_query("select sd.DealerName from hrm_sales_dealer sd inner join  fa_details_dealer fdd on sd.DealerId=fdd.DealerId where fdd.FaId=".$res['FaId']." order by DealerName ASC",$con); 
$rowdis=mysql_num_rows($dis);  $no=1; while($rdis2=mysql_fetch_assoc($dis2)){ echo ucfirst(strtolower($rdis2['DealerName'])); $no++;} if($no<$rowdis){echo ', ';} ?></td><?php */?>
	  <td class="tdf" align="right" valign="top"><?php echo floatval($res2['ClaimSal']+$res2['ClaimExp']); ?>&nbsp;</td>
	 </tr>
<?php } ?>
     <tr>
	  <td colspan="5"  align="right"><b>Total:</b>&nbsp;</td>
	  <td class="tdf" align="right"><b><?php echo floatval($rest['sal']+$rest['exp']); ?></b>&nbsp;</td>
	 </tr>	 
	</table>
	<p><p>
	
<b>Date of Claim Submission: </b><u><?php echo date("d-m-Y"); ?></u><p><p><p>
Thanking you<p><br><p>
<?php if($_REQUEST['r']>0){$e=$_REQUEST['r'];}elseif($_REQUEST['a']>0){$e=$_REQUEST['a'];}
      $s=mysql_query("select Fname,Sname,Lname,DesigName,DepartmentName from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_designation de on g.DesigId=de.DesigId where e.EmployeeID=".$e,$con); $r=mysql_fetch_assoc($s); ?>
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