<?php 
require_once('config/config.php'); 
if(isset($_POST['id']) && $_POST['id']!=""){
$id = $_POST['id']; $id2 = $_POST['id2']; $EId = $_POST['E']; $TD = $_POST['TD']; $SId = $_POST['S']; $UId = $_POST['U']; $YId = $_POST['Y'];
$sd = $_POST['sd']; $ed = $_POST['ed'];
if($id==1){$sql=mysql_query("UPDATE hrm_employee_applyleave SET LeaveStatus=".$id.", ApplyLeave_PenBy=".$UId.", ApplyLeave_PenDate='".date("Y-m-d")."', ApplyLeave_UpdatedBy=".$UId.", ApplyLeave_UpdatedDate='".date("Y-m-d")."', ApplyLeave_UpdatedYearId=".$YId." WHERE ApplyLeaveId=".$id2, $con);}

else if($id==2){$sql=mysql_query("UPDATE hrm_employee_applyleave SET LeaveStatus=".$id.", ApplyLeave_AppBy=".$UId.", ApplyLeave_AppDate='".date("Y-m-d")."', ApplyLeave_UpdatedBy=".$UId.", ApplyLeave_UpdatedDate='".date("Y-m-d")."', ApplyLeave_UpdatedYearId=".$YId." WHERE ApplyLeaveId=".$id2, $con);

/*
$SqlAttCheck=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$EId." and AttDate='".date("Y-".$m."-".$j)."'"); $row=mysql_num_rows($Sql);
	if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$id.",'".$_POST['Jan'.$i.'_'.$j]."','".date("Y-".$m."-".$j)."','".date("Y")."',".$YearId.")");}
	elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['Jan'.$i.'_'.$j]."' where EmployeeID=".$id." AND AttDate='".date("Y-".$m."-".$j)."' AND YearId=".$YearId);}
*/


}

else if($id==3){$sql=mysql_query("UPDATE hrm_employee_applyleave SET LeaveStatus=".$id.", ApplyLeave_DisAppBy=".$UId.", ApplyLeave_DisAppDate='".date("Y-m-d")."', ApplyLeave_UpdatedBy=".$UId.", ApplyLeave_UpdatedDate='".date("Y-m-d")."', ApplyLeave_UpdatedYearId=".$YId." WHERE ApplyLeaveId=".$id2, $con);}
if($sql){$msg="Leave Status Updated Successfull!";} ?>
<input type="hidden" id="Lmsg" value="<?php echo $msg; ?>" />

 <table border="1">
<?php if($SId==4){$sqlL=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,hrm_employee_applyleave.* from hrm_employee_applyleave INNER JOIN hrm_employee ON hrm_employee_applyleave.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_applyleave.EmployeeID=hrm_employee_general.EmployeeID", $con); }
      else{$sqlL=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,hrm_employee_applyleave.* from hrm_employee_applyleave INNER JOIN hrm_employee ON hrm_employee_applyleave.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_applyleave.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_applyleave.LeaveStatus=".$SId, $con); } $sno=1;
while($resL=mysql_fetch_array($sqlL)) { $EmpName=$resL['Fname'].' '.$resL['Sname'].' '.$resL['Lname']; 
$fdate=date("m",strtotime($resL['Apply_FromDate'])); $sdate=date("m",strtotime($resL['Apply_ToDate'])); if($fdate==date("m") OR $sdate==date("m")) {
?>								  
					
					   <tr>
					   <td width="40" class="TableHead1" align="center"><?php echo $sno; ?></td>
					   <td width="70" class="TableHead1" align="center"><?php echo $resL['EmpCode']; ?></td>
					   <td width="180" class="TableHead1" align="left"><?php echo $EmpName; ?></td>
<?php $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resL['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD); ?>					   
	                   <td width="100" class="TableHead1" align="left">&nbsp;<?php echo $resD['DepartmentCode']; ?></td>
					   <td width="50" class="TableHead1" align="center"><?php echo $resL['Leave_Type']; ?></td>
					   <td width="80" class="TableHead1" align="center"><?php echo date("d-m-Y",strtotime($resL['Apply_FromDate'])); ?></td>
					   <td width="80" class="TableHead1" align="center"><?php echo date("d-m-Y",strtotime($resL['Apply_ToDate'])); ?></td>
					   <td width="120" class="TableHead1" align="center"><?php if($resL['LeaveStatus']=='0'){echo 'Drapt';} elseif($resL['LeaveStatus']=='1'){echo 'Pending';} elseif($resL['LeaveStatus']=='2'){echo 'Approved';} elseif($resL['LeaveStatus']=='3'){echo 'DisApproved';} ?></td>
					   <td width="60" class="TableHead1" align="center">
					   <a href="javascript:void(0);" onclick="PopupCenter('LeaveDetails.php?id=<?php echo $resL['ApplyLeaveId']; ?>', 'VNR(HRIMS)',350,300);">Details</a>
					   </td>
					   <td width="100" class="TableHead1" align="center"> 
	   <select name="ActionReplyQ" id="ActionReplyQ" style="font-family:Times New Roman; height:20px; width:95px; background-color:#B3E3B0; color:#000000; font-size:13px;" onChange="return ChangeLStatus(this.value,<?php echo $resL['ApplyLeaveId']; ?>,<?php echo $resL['EmployeeID']; ?>,<?php echo $resL['Apply_TotalDay']; ?>,<?php echo $resL['Apply_FromDate']; ?>,<?php echo $resL['Apply_ToDate']; ?>)">
	  <option  style="background-color:#BADCC5;" value="0">Select</option> 
      <option value="1" style="background-color:#FFFFFF;">Pending</option>
	  <option value="2" style="background-color:#FFFFFF;">Approved</option> 
	  <option value="3" style="background-color:#FFFFFF;">DisApproved</option> 
	  </select></td>
							
					  </tr>  
<?php $sno++; } }?>					  
</table>


<?php } ?>	
