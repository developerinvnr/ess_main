<?php require_once('../AdminUser/config/config.php'); 
date_default_timezone_set('Asia/Kolkata'); 

if($_REQUEST['acttc']=='Delok' && $_REQUEST['id']!='')
{
 $del=mysql_query("delete from hrm_pms_appraisal_history where AppHistoryId=".$_REQUEST['id'],$con);
 if($del)
 {
  $sqlIns=mysql_query("insert into hrm_action_logbook(PageName, User, Action, Remark, ActDate) values('EmpIncHis', ".$_REQUEST['U'].", 'delete', 'TableId-".$_REQUEST['id']."', '".date("Y-m-d H:i:s")."')",$con);
  echo '<script>alert("Record deleted successfully!");window.location="EmpIncHis.php?action=Inc&V='.$_REQUEST['V'].'&C='.$_REQUEST['C'].'&U='.$_REQUEST['U'].'"</script>';
 
 }
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.tr{ font-family:Times New Roman;font-size:13px;color:#FFFFFF;font-weight:bold;text-align:center;height:24px;  }
.trl{ font-family:Times New Roman;font-size:13px;color:#000000;font-weight:bold; background-color:#97FF97; height:25px; }
.tdc{ font-family:Times New Roman;font-size:12px;color:#000000;text-align:center; }
.tdr{ font-family:Times New Roman;font-size:12px;color:#000000;text-align:right; }
.td{ font-family:Times New Roman;font-size:12px;color:#000000; }

</style>
<script language="javascript" type="text/javascript">
function Printpage()
 { window.print();  }
 
function DelFun(id,V,C,U)
{
 var agree=confirm("Are You Sure");
 if(agree){window.location="EmpIncHis.php?action=Inc&acttc=Delok&id="+id+"&V="+V+"&C="+C+"&U="+U}
 else{return false;}
} 
</script>
</head>
<body class="body">
    
<?php $sqlE=mysql_query("select * from hrm_employee where EmpCode=".$_REQUEST['V']." AND CompanyId=".$_REQUEST['C'], $con); $resE=mysql_fetch_assoc($sqlE); $Ename=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?>	
<table>
<tr><td align="left" style="font-family:Times New Roman;font-size:12px;"><a href="#" onClick="Printpage()">Print</a>&nbsp;</td></tr>
<tr>
 <td width="2400">
  <table border="1" width="2400" cellspacing="1">
   <tr>
	<td colspan="40" class="trl">&nbsp;PMS Increment Reports :&nbsp;&nbsp;(&nbsp;Name - <?php echo $Ename; ?>&nbsp;)&nbsp;&nbsp;&nbsp; EmpCode - <?php echo $_REQUEST['V']; ?></td>
   </tr>
   <tr bgcolor="#7a6189">
	<td class="tr" style="width:30px;">Sn</td>
	<td class="tr" style="width:30px;">Del</td>
	<td class="tr" style="width:50px;">Curr<br>Grade</td>
	<td class="tr" style="width:50px;">Pro<br>Grade</td>
	<td class="tr" style="width:100px;">Department</td>
	<td class="tr" style="width:25px;">Current Desig</td>	
	<td class="tr" style="width:250px;">Proposed Desig</td>
	<td class="tr" style="width:80px;">Change Date<br>(Effective Date)</td>	
	<td class="tr" style="width:80px;">System<br>Date</td>
	
	<td class="tr" style="width:60px;">Basic</td>
	<td class="tr" style="width:60px;">HRA</td>
	<td class="tr" style="width:60px;">Bonus Month</td>
	<td class="tr" style="width:60px;">CA</td>
	<td class="tr" style="width:60px;">Car<br>Allow</td>
	<td class="tr" style="width:60px;">TA</td>
	<td class="tr" style="width:60px;">SA</td>
	
	<td class="tr" style="width:60px;">Old<br>Gross</td>
	<td class="tr" style="width:60px;">New<br>Gross</td>
	<td class="tr" style="width:60px;">Gross<br>(PAC)</td>
	<td class="tr" style="width:60px;">PF</td>
	<td class="tr" style="width:60px;">ESIC</td>
	<td class="tr" style="width:60px;">NPS</td>
	<td class="tr" style="width:60px;">Net<br>Amount</td>
	<td class="tr" style="width:60px;">LTA</td>
	<td class="tr" style="width:60px;">CEA</td>
	<td class="tr" style="width:60px;">MR</td>
	<td class="tr" style="width:60px;">Bonus Annual</td>
	<td class="tr" style="width:60px;">Gratuity</td>
	<td class="tr" style="width:60px;">Mediclaim</td>
	<td class="tr" style="width:70px;">CTC</td>
	<td class="tr" style="width:60px;">Pro<br>Gross</td>
	<td class="tr" style="width:40px;">(%)Pro<br>Gross</td>
	<td class="tr" style="width:60px;">Corr</td>		
	<td class="tr" style="width:60px;">Total Pro<br>Gross</td>
	<td class="tr" style="width:40px;">(%)Total<br>Pro GrossPM</td>
	<td class="tr" style="width:60px;">Incen</td>
	<td class="tr" style="width:40px;">Score</td>		
	<td class="tr" style="width:40px;">Rating</td>
	
	
	<!--<td class="tr" style="width:60px;">Stipend</b></td>-->
	<!--<td class="tr" style="width:60px;">VA</td>-->
	<!--<td class="tr" style="width:60px;">PI</td>--> 
	<!--<td class="tr" style="width:60px;">IBM</td>-->
	<!--<td class="tr" style="width:60px;">Curr<br>Gross</td>-->
		
   </tr>
<?php $sql=mysql_query("select * from hrm_pms_appraisal_history where EmpCode=".$_REQUEST['V']." AND CompanyId=".$_REQUEST['C']." order by SalaryChange_Date DESC", $con); $row=mysql_num_rows($sql); $Sno=$row; while($res=mysql_fetch_array($sql)){ 
$sn_ctc=mysql_query("select * from hrm_employee_ctc where CtcCreatedDate='".$res['SalaryChange_Date']."' AND CtcId=(select Max(CtcId) from hrm_employee_ctc where EmployeeID=".$resE['EmployeeID']." AND CtcCreatedDate='".$res['SalaryChange_Date']."')",$con); $rn_ctc=mysql_fetch_assoc($sn_ctc); ?>  	
   <tr bgcolor="#ffffff">
   
	<td class="tdc"><?php echo $Sno; ?></td>
	<td class="tdc"><?php if($_REQUEST['U']==4 || $_REQUEST['U']==5){?><img src="images/delete.png" onClick="DelFun(<?php echo $res['AppHistoryId'].','.$_REQUEST['V'].','.$_REQUEST['C'].','.$_REQUEST['U']; ?>)" /><?php } ?></td>
	<td class="tdc"><?php echo $res['Current_Grade']; ?></td>
	<td class="tdc"><?php echo $res['Proposed_Grade']; ?></td>
	<td class="td"><?php echo $res['Department']; ?></td>
	<td class="td"><?php echo $res['Current_Designation']; ?></td>	
	<td class="td"><?php echo $res['Proposed_Designation']; ?></td>
	<td class="tdc" bgcolor="#FFB7FF"><?php echo date("d-M-y",strtotime($res['SalaryChange_Date'])); ?></td>
	<td class="tdc"><?php if($res['SystemDate']!='1970-01-01' && $res['SystemDate']!='0000-00-00' && $res['SystemDate']!=''){echo date("d-M-y",strtotime($res['SystemDate'])); } ?></td>	
	<td class="tdr"><?php echo floatval($res['Salary_Basic']); ?></td>
	<td class="tdr"><?php echo floatval($res['Salary_HRA']); ?></td>
	<td class="tdr"><?php if($rn_ctc['Bonus_Month']>0){ echo floatval($rn_ctc['Bonus_Month']); } ?></td>
	<td class="tdr"><?php if($res['Salary_CA']>0){ echo floatval($res['Salary_CA']); } ?></td>
	<td class="tdr"><?php if($rn_ctc['CAR_ALL_Value']>0){ echo floatval($rn_ctc['CAR_ALL_Value']); } ?></td>
	<td class="tdr"><?php if($rn_ctc['TA_Value']>0){ echo floatval($rn_ctc['TA_Value']); } ?></td>
	<td class="tdr"><?php if($res['Salary_SA']>0){ echo floatval($res['Salary_SA']); } ?></td>
	<td class="tdr" bgcolor="#FFB7FF"><?php echo floatval($res['Previous_GrossSalaryPM']); ?></td>
    <td class="tdr" bgcolor="#FFB7FF"><?php if($rn_ctc['Tot_GrossMonth']>0){ echo floatval($rn_ctc['Tot_GrossMonth']); } ?></td>
	<td class="tdr"><?php echo floatval($rn_ctc['GrossSalary_PostAnualComponent_Value']); ?></td>
	<td class="tdr"><?php echo floatval($rn_ctc['PF_Employee_Contri_Value']); ?></td>
	<td class="tdr"><?php if($rn_ctc['ESCI']>0){ echo floatval($rn_ctc['ESCI']); } ?></td>
	<td class="tdr"><?php if($rn_ctc['NPS_Value']>0){ echo floatval($rn_ctc['NPS_Value']); } ?></td>
	<td class="tdr"><?php echo floatval($rn_ctc['NetMonthSalary_Value']); ?></td>
	<td class="tdr"><?php if($rn_ctc['LTA_Value']>0){ echo floatval($rn_ctc['LTA_Value']); } ?></td>
	<td class="tdr"><?php if($rn_ctc['CHILD_EDU_ALL_Value']>0){ echo floatval($rn_ctc['CHILD_EDU_ALL_Value']); } ?></td>
	<td class="tdr"><?php echo floatval($rn_ctc['MED_REM_Value']); ?></td>
	<td class="tdr"><?php if($rn_ctc['BONUS_Value']>0){ echo floatval($rn_ctc['BONUS_Value']); } ?></td>
	<td class="tdr"><?php if($rn_ctc['GRATUITY_Value']>0){ echo floatval($rn_ctc['GRATUITY_Value']); } ?></td>
	<td class="tdr"><?php if($rn_ctc['Mediclaim_Policy']>0){ echo floatval($rn_ctc['Mediclaim_Policy']); } ?></td>
	<td class="tdr" bgcolor="#FFB7FF"><?php if($rn_ctc['Tot_CTC']>0){ echo floatval($rn_ctc['Tot_CTC']); } ?></td>
	
	<td class="tdr" bgcolor="#FFFFB3">
	 <?php if($res['SalaryChange_Date']<'2020-01-01'){ ?>
	 <?php if($res['Proposed_GrossSalaryPM']>0){ echo floatval($res['Proposed_GrossSalaryPM']); } ?>
	 <?php }else{ ?>
	 <?php if($rn_ctc['Tot_GrossMonth']>0){ echo floatval($rn_ctc['Tot_GrossMonth']); } ?>
	 <?php } ?>
	 </td>		
	<td class="tdc" bgcolor="#FFFFB3">
	<?php if($res['SalaryChange_Date']<'2020-01-01'){ ?>
	 <?php if($res['Prop_PeInc_GSPM']!=0){ echo $res['Prop_PeInc_GSPM']; } ?>
	<?php } ?> 
	</td>
	<td class="tdr" bgcolor="#FFFFB3">
	 <?php if($res['PropSalary_Correction']>0){ echo floatval($res['PropSalary_Correction']); } ?>
	</td>
	<td class="tdr" bgcolor="#FFFFB3">
	 <?php if($res['SalaryChange_Date']<'2020-01-01'){ ?>
	 <?php if($res['TotalProp_GSPM']>0){ echo floatval($res['TotalProp_GSPM']); } ?>
	 <?php }else{ ?>
	 <?php if($rn_ctc['Tot_GrossMonth']>0){ echo floatval($rn_ctc['Tot_GrossMonth']); } ?>
	 <?php } ?>
	 </td>
	<td class="tdc" bgcolor="#FFFFB3">
	
	<?php if($res['SalaryChange_Date']<'2020-01-01'){ ?>
	<?php if($res['TotalProp_PerInc_GSPM']==0){ 
	if($res['TotalProp_GSPM']==0 OR $res['Previous_GrossSalaryPM']==$res['TotalProp_GSPM']){echo 0;}
	elseif($res['Previous_GrossSalaryPM']!=$res['TotalProp_GSPM'] AND $res['Previous_GrossSalaryPM']>0 AND $res['TotalProp_GSPM']>0){ $oneP=($res['Previous_GrossSalaryPM']*1)/100; 
	                  $IncV=$res['TotalProp_GSPM']-$res['Previous_GrossSalaryPM'];
	                  $totPInc=$IncV/$oneP; echo number_format($totPInc,2); }
    } 
    else { echo $res['TotalProp_PerInc_GSPM']; } ?>
    <?php } ?>
    </td>
    
	<td class="tdr"><?php if($res['Incentive']>0){ echo floatval($res['Incentive']); } ?></td>
	<td class="tdc"><?php if($res['Score']>0){ echo $res['Score']; } ?></td>		
	<td class="tdc"><?php if($res['Rating']>0){ echo $res['Rating']; } ?></td>	
	
	<?php /*?><td class="tdr"><?php echo floatval($res['Salary_Stipend']); ?></td><?php */?>
	<?php /*?><td class="tdr"><?php echo floatval($res['Salary_VA']); ?></td><?php */?>
	<?php /*?><td class="tdr"><?php echo floatval($res['Salary_PI']); ?></td><?php */?> 
	<?php /*?><td class="tdr"><?php if($res['Industry_Bench_Markinge']>0){ echo floatval($res['Industry_Bench_Markinge']); } ?></td><?php */?> 
	<?php /*?><td class="tdr"><?php echo floatval($res['Current_GrossSalaryPM']); ?></td><?php */?>
	
   </tr>
<?php $Sno--; } ?> 
  </table>
 </td>
</tr> 
</table>   
</body>
</html>





