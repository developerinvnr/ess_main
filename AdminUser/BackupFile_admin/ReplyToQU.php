<?php require_once('config/config.php'); 

if(isset($_POST['UserType']) && $_POST['UserType']!=''){ ?>
<table border="1">
<?php $sql=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,hrm_employee_hrquery.* from hrm_employee INNER JOIN hrm_employee_hrquery ON hrm_employee.EmployeeID=hrm_employee_hrquery.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_hrquery.QueryDateTime>='".date("Y-m-d",strtotime($_POST['d1']))."' AND hrm_employee_hrquery.QueryDateTime<='".date("Y-m-d",strtotime($_POST['d2']))."' AND hrm_employee_hrquery.QAction_Mngmt!=2", $con); $Sno=1; $rows=mysql_num_rows($sql); while($res=mysql_fetch_array($sql)){?>						 
	   <tr>
	   <td width="50" class="TableHead1" align="center">&nbsp;<?php echo $Sno; ?></td>
	   <td width="100" class="TableHead1" align="left">&nbsp;<?php echo $res['EmpCode']; ?></td>
	   <td width="170" class="TableHead1" align="left">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
<?php $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD); ?>					   
	   <td width="150" class="TableHead1" align="left">&nbsp;<?php echo $resD['DepartmentCode']; ?></td>
	   <td width="240" class="TableHead1" align="left">&nbsp;
<a href="javascript:void(0);" onclick="PopupCenter('QueryEmp.php?Qid=<?php echo $res['QueryId']; ?>', 'VNR(HRIMS)',350,300);"><?php echo $res['QuerySubject']; ?></a></td>
	   <td width="150" class="TableHead1" align="left">&nbsp;<?php echo date("d-m-Y H:i:s",strtotime($res['QueryDateTime'])); ?></td>
	   
	   <td width="150" class="TableHead1" align="left">&nbsp;
	   <?php if($res['QFwdHR_RepMgr']=='Y' AND $res['QToMngmt_DateTime']>date('Y-m-d H:i:s') AND $res['QStatus_RepMgr']==0) {echo 'Open';}
	         elseif($res['QFwdHR_RepMgr']=='Y' AND $res['QToMngmt_DateTime']<=date('Y-m-d H:i:s') AND $res['QStatus_RepMgr']==0) {echo 'Not Reply';} 
	         elseif($res['QFwdHR_RepMgr']=='Y' AND $res['QToMngmt_DateTime']>date('Y-m-d H:i:s') AND $res['QStatus_RepMgr']==1) {echo 'InProcess';}
	         elseif($res['QFwdHR_RepMgr']=='Y' AND $res['QToMngmt_DateTime']<=date('Y-m-d H:i:s') AND $res['QStatus_RepMgr']==1) {echo 'Not Reply';}
			 elseif($res['QFwdHR_RepMgr']=='N') {echo 'Not Allow';}
			 elseif($res['QFwdHR_RepMgr']=='Y' AND $res['QToMngmt_DateTime']>date('Y-m-d H:i:s') AND $res['QStatus_RepMgr']==2) { ?>
<a href="javascript:void(0);" onclick="PopupCenter('ReplyRepMgr.php?Qid=<?php echo $res['QueryId']; ?>', 'VNR(HRIMS)',350,300);">Reply</a>
	   <?php } elseif($res['QFwdHR_RepMgr']=='Y' AND $res['QToMngmt_DateTime']<=date('Y-m-d H:i:s') AND $res['QStatus_RepMgr']==2) { ?>
<a href="javascript:void(0);" onclick="PopupCenter('ReplyRepMgr.php?Qid=<?php echo $res['QueryId']; ?>', 'VNR(HRIMS)',350,300);">Reply</a><?php } ?></td>

	   
	   <td width="150" class="TableHead1" align="left">&nbsp;
	   <?php if($res['QFwdHR_RepMgr']=='N' AND $res['QToSAdmin_DateTime']>date('Y-m-d H:i:s') AND $res['QStatus_Admin']==0) {echo 'Open';}
	         elseif($res['QFwdHR_RepMgr']=='N' AND $res['QToSAdmin_DateTime']<=date('Y-m-d H:i:s') AND $res['QStatus_Admin']==0) {echo 'Not Reply';} 
	         elseif($res['QFwdHR_RepMgr']=='N' AND $res['QToSAdmin_DateTime']>date('Y-m-d H:i:s') AND $res['QStatus_Admin']==1) {echo 'InProcess';}
	         elseif($res['QFwdHR_RepMgr']=='N' AND $res['QToSAdmin_DateTime']<=date('Y-m-d H:i:s') AND $res['QStatus_Admin']==1) {echo 'Not Reply';}
			 elseif($res['QFwdHR_RepMgr']=='Y' AND $res['QStatus_Admin']==3 AND $res['QFwdHR_DateTime']<$res['QToSAdmin_DateTime']) {echo 'Forward Rep.Mgr.';}
			 elseif($res['QFwdHR_RepMgr']=='N' AND $res['QToSAdmin_DateTime']>date('Y-m-d H:i:s') AND $res['QStatus_Admin']==2) { ?>
<a href="javascript:void(0);" onclick="PopupCenter('ReplyAdmin.php?Qid=<?php echo $res['QueryId']; ?>', 'VNR(HRIMS)',350,300);">Reply</a>
	   <?php } elseif($res['QFwdHR_RepMgr']=='N' AND $res['QToSAdmin_DateTime']<=date('Y-m-d H:i:s') AND $res['QStatus_Admin']==2) { ?>
<a href="javascript:void(0);" onclick="PopupCenter('ReplyAdmin.php?Qid=<?php echo $res['QueryId']; ?>', 'VNR(HRIMS)',350,300);">Reply</a><?php } ?></td>
	  
	   <td width="150" class="TableHead1" align="left">&nbsp;
	   <?php if($res['QToMngmt_DateTime']>date('Y-m-d H:i:s') AND $res['QStatus_SAdmin']==0) {echo 'Open';}
	         elseif($res['QToMngmt_DateTime']<=date('Y-m-d H:i:s') AND $res['QStatus_SAdmin']==0) {echo 'Not Reply';} 
	         elseif($res['QToMngmt_DateTime']>date('Y-m-d H:i:s') AND $res['QStatus_SAdmin']==1) {echo 'InProcess';}
	         elseif($res['QToMngmt_DateTime']<=date('Y-m-d H:i:s') AND $res['QStatus_SAdmin']==1) {echo 'Not Reply';}
			 elseif($res['QFwdHR_RepMgr']=='Y' AND $res['QStatus_SAdmin']==3 AND ($res['QFwdHR_DateTime']>=$res['QToHR_DateTime'] OR $res['QFwdHR_DateTime']<$res['QToMngmt_DateTime'])) {echo 'Forward Rep.Mgr.';}
			 elseif($res['QToMngmt_DateTime']>date('Y-m-d H:i:s') AND $res['QStatus_SAdmin']==2) { ?>
<a href="javascript:void(0);" onclick="PopupCenter('ReplySAdmin.php?Qid=<?php echo $res['QueryId']; ?>', 'VNR(HRIMS)',350,300);">Reply</a>
	   <?php } elseif($res['QToMngmt_DateTime']<=date('Y-m-d H:i:s') AND $res['QStatus_SAdmin']==2) { ?>
<a href="javascript:void(0);" onclick="PopupCenter('ReplySAdmin.php?Qid=<?php echo $res['QueryId']; ?>', 'VNR(HRIMS)',350,300);">Reply</a><?php } ?></td>
	   
	  
	   <td width="110" class="TableHead1" align="center"> 
	   <select name="ActionReplyQ" id="ActionReplyQ" style="font-family:Times New Roman; height:20px; width:95px; background-color:#B3E3B0; color:#000000; font-size:13px;" onChange="return ChangeBtnU(this.value,<?php echo $res['QueryId']; ?>)" <?php if($_POST['UserType']=='A'){ if($res['QStatus_Admin']==3 OR date("Y-m-d H:i:s")<$res['QToAdmin_DateTime'] OR date("Y-m-d H:i:s")>=$res['QToSAdmin_DateTime']) { echo 'disabled'; } }  if($_POST['UserType']=='S'){ if($res['QStatus_SAdmin']==3 OR date("Y-m-d H:i:s")<$res['QToSAdmin_DateTime'] OR date("Y-m-d H:i:s")>=$res['QToMngmt_DateTime']) {echo 'disabled';} }?> >
	  <option  style="background-color:#BADCC5;" value="">Select</option> 
      <option value="0" style="background-color:#FFFFFF;">Open</option>
	  <option value="1" style="background-color:#FFFFFF;">InProcess</option>
	  <option value="3" style="background-color:#FFFFFF;">Forward Rep. Mgr.</option>  
	  <option value="2" style="background-color:#FFFFFF;">Reply</option>
	  </select></td>
	  
	  
	  
	   </tr>
<?php $Sno++; } ?>					   
		 </table>  
		 
<?php if($rows==0) { ?><table><tr><td colspan="10">
<font  color="#F8FAD3" style='font-family:Times New Roman;' size="3"><b>
<?php echo 'Not Query Ask Beetween this <font color="#A6ECEC">"'.$_POST['d1'].'"</font> to <font color="#A6ECEC">"'.$_POST['d2'].'"</font> two date';}?> </td>
</b></font>
</tr></table>
<?php } ?>
 

