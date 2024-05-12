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
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
.All_40{font-size:11px; height:20px; width:40px;} .All_50{font-size:11px; height:20px; width:50px;} .All_70{font-size:11px; height:20px; width:70px;} .All_80{font-size:11px; height:20px; width:80px;}.All_100{font-size:11px; height:20px; width:100px;} .All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} .All_60{font-size:11px; height:20px; width:60px;}
.All_150{font-size:11px; height:20px; width:150px;}.All_170{font-size:11px; height:20px; width:170px;}.All_180{font-size:11px; height:20px; width:180px;}.All_190{font-size:11px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} .All_450{font-size:11px; height:20px; width:450px;}.All_360{font-size:11px; height:20px; width:350px;}.All_540{font-size:11px; height:20px; width:540px;}.All_400{font-size:11px; height:20px; width:400px;} .All_600{font-size:11px; height:20px; width:600px;}
</style>
<script language="javascript" type="text/javascript">
function Printpage()
 { window.print(); window.close(); }
 
function DelFun(id,V,C,U)
{
 var agree=confirm("Are You Sure");
 if(agree){window.location="EmpIncHis.php?action=Inc&acttc=Delok&id="+id+"&V="+V+"&C="+C+"&U="+U}
 else{return false;}
} 
 
</script>
</head>
<body class="body">
<table>
<tr><td>&nbsp;</td></tr>
<tr>
 <td width="2200">
   <table border="1" width="2200">
   <tr>
<?php $sqlE=mysql_query("select * from hrm_employee where EmpCode=".$_REQUEST['V']." AND CompanyId=".$_REQUEST['C'], $con); $resE=mysql_fetch_assoc($sqlE); ?>	   
	 <td colspan="27" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;PMS Increment Reports :
     &nbsp;&nbsp;(&nbsp;Name - <?php echo $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?>&nbsp;)&nbsp;&nbsp;&nbsp; EmpCode - <?php echo $_REQUEST['V']; ?>
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189">
		<td align="center" style="color:#FFFFFF;" class="All_40"><b>SNo.</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_40"><b>Del</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Curr. Grade</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Pro. Grade</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_120"><b>Department</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_360"><b>Curr. Designation</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_360"><b>Pro. Designation</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>Change Date</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>Basic</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>Stipend</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>HRA</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>CA</b></td> 
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>VA</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>SA</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>PI</b></td> 
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>IBM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>Pre. GrossPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>Curr. GrossPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>Pro. GrossPM</b></td>		
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>Bonus</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>(%) Pro. GrossPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>Correction</b></td>		
        <td align="center" style="color:#FFFFFF;" class="All_80"><b>Total Pro. GrossPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>(%) Total Pro. GrossPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>Incentive</td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Score</b></td>		
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Rating</b></td>	
	</tr>
<?php $sql=mysql_query("select * from hrm_pms_appraisal_history where EmpCode=".$_REQUEST['V']." AND CompanyId=".$_REQUEST['C']." order by SalaryChange_Date DESC", $con); $row=mysql_num_rows($sql); $Sno=$row; while($res=mysql_fetch_array($sql)){ ?>  	
	 <tr bgcolor="#ffffff">
		<td align="center" style="" class="All_40" valign="top"><?php echo $Sno; ?></td>
		<td align="center" style="" class="All_40" valign="top"><img src="images/delete.png" onClick="DelFun(<?php echo $res['AppHistoryId'].','.$_REQUEST['V'].','.$_REQUEST['C'].','.$_REQUEST['U']; ?>)" /></td>
		<td align="center" style="" class="All_50" valign="top"><?php echo $res['Current_Grade']; ?></td>
		<td align="center" style="" class="All_50" valign="top"><?php echo $res['Proposed_Grade']; ?></td>
		<td align="" style="" class="All_120" valign="top"><?php echo $res['Department']; ?></td>
		<td align="" style="" class="All_360" valign="top"><?php echo $res['Current_Designation']; ?></td>	
		<td align="" style="" class="All_360" valign="top"><?php echo $res['Proposed_Designation']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo date("d-M-y",strtotime($res['SalaryChange_Date'])); ?></td>	
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Salary_Basic']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Salary_Stipend']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Salary_HRA']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Salary_CA']; ?></td> 
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Salary_VA']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Salary_SA']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Salary_PI']; ?></td> 
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Industry_Bench_Markinge']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Previous_GrossSalaryPM']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Current_GrossSalaryPM']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Proposed_GrossSalaryPM']; ?></td>		
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['BonusAnnual_September']; ?></td>
		<td align="center" style="" class="All_50" valign="top"><?php echo $res['Prop_PeInc_GSPM']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['PropSalary_Correction']; ?></td>		
        <td align="center" style="" class="All_80" valign="top"><?php echo $res['TotalProp_GSPM']; ?></td>
		<td align="center" style="" class="All_50" valign="top">
<?php if($res['TotalProp_PerInc_GSPM']==0)
      { 
	    if($res['TotalProp_GSPM']==0 OR $res['Previous_GrossSalaryPM']==$res['TotalProp_GSPM']){echo 0;}
		elseif($res['Previous_GrossSalaryPM']!=$res['TotalProp_GSPM'] AND $res['Previous_GrossSalaryPM']>0 AND $res['TotalProp_GSPM']>0)
		{
		 $oneP=($res['Previous_GrossSalaryPM']*1)/100; 
		 $IncV=$res['TotalProp_GSPM']-$res['Previous_GrossSalaryPM'];
		 $totPInc=$IncV/$oneP;
		 echo number_format($totPInc,2);
		}
	  } 
      else { echo $res['TotalProp_PerInc_GSPM']; } ?>

              </td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Incentive']; ?></td>
		<td align="center" style="" class="All_50" valign="top"><?php echo $res['Score']; ?></td>		
		<td align="center" style="" class="All_50" valign="top"><?php echo $res['Rating']; ?></td>	
	</tr>
<?php $Sno--; } ?> 
   </table>
 </td>
</tr> 
</table>   
</body>
</html>

