<?php require_once('../AdminUser/config/config.php'); 

if(isset($_POST['EmpId']) && $_POST['EmpId']!=''){
echo '<table border="1">';  
$sql=mysql_query("select * from hrm_employee_hrquery where QueryDateTime>='".date("Y-m-d",strtotime($_POST['d1']))."' AND QueryDateTime<='".date("Y-m-d",strtotime($_POST['d2']))."' AND EmployeeID=".$_POST['EmpId']." AND QAction_Emp!=2", $con); $rows=mysql_num_rows($sql); $Sno=1; while($res=mysql_fetch_array($sql)){?>					
					   <tr>
					   <td width="40" class="TableHead1" align="left">&nbsp;<?php echo $Sno; ?></td>
					   <td width="150" class="TableHead1" align="left">&nbsp;
			<a href="javascript:void(0);" onclick="PopupCenter('QueryEmp.php?Qid=<?php echo $res['QueryId']; ?>', 'VNR(HRIMS)',350,300);"><?php echo $res['QuerySubject']; ?></a></td>
					   <td width="150" class="TableHead1" align="left">&nbsp;<?php echo date("d-m-Y H:i:s",strtotime($res['QueryDateTime'])); ?></td>
					   <td width="120" class="TableHead1" align="left">&nbsp;<?php if($res['QStatus_RepMgr']==0){echo '"';} elseif($res['QStatus_RepMgr']==1){echo 'InProcess';} elseif($res['QStatus_RepMgr']==2){?><a href="javascript:void(0);" onclick="PopupCenter('ReplyRepMgr.php?Qid=<?php echo $res['QueryId']; ?>', 'VNR(HRIMS)',350,300);">Click</a><?php } ?></td>
					    <td width="120" class="TableHead1" align="left">&nbsp;<?php if($res['QStatus_Admin']==0){echo '"';} elseif($res['QStatus_Admin']==1){echo 'InProcess';} elseif($res['QStatus_Admin']==2){ ?><a href="javascript:void(0);" onclick="PopupCenter('ReplyAdmin.php?Qid=<?php echo $res['QueryId']; ?>', 'VNR(HRIMS)',350,300);">Click</a>
			           <?php } elseif($res['QStatus_Admin']==3){echo $res['Forword to Rep. Mgr.'];}?></td>
					   <td width="120" class="TableHead1" align="left">&nbsp;<?php if($res['QStatus_SAdmin']==0){echo '"';} elseif($res['QStatus_SAdmin']==1){echo 'InProcess';} elseif($res['QStatus_SAdmin']==2){ ?><a href="javascript:void(0);" onclick="PopupCenter('ReplySAdmin.php?Qid=<?php echo $res['QueryId']; ?>', 'VNR(HRIMS)',350,300);">Click</a>
			           <?php } elseif($res['QStatus_SAdmin']==3){echo $res['Forword to Rep. Mgr.'];}?></td>
					   <td width="120" class="TableHead1" align="left">&nbsp;<?php if($res['QStatus_Mngmt']==0){echo '"';} elseif($res['QStatus_Mngmt']==1){echo 'InProcess';} elseif($res['QStatus_Mngmt']==2){echo 'Closed';} elseif($res['QStatus_Mngmt']==3){echo 'Escalate';} elseif($res['QStatus_Mngmt']==4){ ?><a href="javascript:void(0);" onclick="PopupCenter('ReplyMngmt.php?Qid=<?php echo $res['QueryId']; ?>', 'VNR(HRIMS)',350,300);">Click</a><?php } ?></td>
					   <td width="100" class="TableHead1" align="center">
					   
					   
					   </td>
					   </tr>	
<?php $SNo++;} echo '</table>';} ?>
<?php if($rows==0) { ?><table><tr><td colspan="10">
<font color="#F8FAD3" style='font-family:Times New Roman;' size="3"><b>
<?php echo 'Not Query Ask Beetween this <font color="#A6ECEC">"'.$_POST['d1'].'"</font> to <font color="#A6ECEC">"'.$_POST['d2'].'"</font> two date';}?> </td>
</b></font>
</tr></table>
