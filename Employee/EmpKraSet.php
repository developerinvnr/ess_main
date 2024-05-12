<?php 
require_once('../AdminUser/config/config.php');
if(isset($_POST['Id']) && $_POST['Id']!=""){ $Id = $_POST['Id']; 
$sqlEmp=mysql_query("select * from hrm_employee where EmployeeID=".$Id, $con); $resEmp=mysql_fetch_array($sqlEmp);?> 
<form name="SubForm" method="post">
<table>
         <tr><td  colspan="6" style="font-family:Times New Roman; font-size:15px; font-weight:bold; width:400px;" align="right">
		 <input type="hidden" id="EmpId" name="EmpId" value="<?php echo $Id; ?>" />
		 <font color="#EFFA1B"><?php echo $resEmp['EmpCode'].' - '.$resEmp['Fname'].' '.$resEmp['Sname'].' '.$resEmp['Lname']; ?></font>
		 </td>
		 </tr>
		 <tr bgcolor="#7a6189" style="height:20px;" valign="middle">
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>SNo.</b></td>
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:200px;"><b>KRA</b></td>
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>Unit</b></td>
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>Weightage</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>Target</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>Action</b></td>
		 </tr>
<?php $sql=mysql_query("select DesigId,DesigId2 from hrm_employee_general where EmployeeID=".$Id, $con); $res=mysql_fetch_assoc($sql);
      if($res['DesigId']!='' AND $res['DesigId2']!='') 
	  {  $sql2=mysql_query("select * from hrm_pms_kra INNER JOIN hrm_pms_kra_designation ON  hrm_pms_kra.KRAId=hrm_pms_kra_designation.KRAId where (hrm_pms_kra_designation.DesigId=".$res['DesigId']." OR hrm_pms_kra_designation.DesigId=".$res['DesigId2'].")", $con);
	  } if($res['DesigId2']=='')
	    {  $sql2=mysql_query("select * from hrm_pms_kra INNER JOIN hrm_pms_kra_designation ON  hrm_pms_kra.KRAId=hrm_pms_kra_designation.KRAId where hrm_pms_kra_designation.DesigId=".$res['DesigId'], $con);
	    }  $Sno=1; while($res2=mysql_fetch_array($sql2)) { ?>		 
<tr bgcolor="#FFFFFF" style="height:20px;" valign="middle">
<td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $Sno; ?></td>
<td align="" style="font:Georgia; font-size:12px; width:200px;">
  <input name="KRA<?php echo $Sno; ?>" style="font:Georgia; font-size:11px; width:200px; height:20px;" width="200" value="<?php echo $res2['KRA']; ?>"  readonly/></td>
<td align="center" style="font:Georgia; font-size:11px; width:80px;">
  <input name="Unit<?php echo $Sno; ?>" style="font:Georgia; font-size:11px; width:80px; height:20px; text-align:center;" value="<?php echo $res2['Unit']; ?>" readonly/></td>
<td align="center" style="font:Georgia; font-size:11px; width:80px;">
  <input name="Weightage<?php echo $Sno; ?>" id="Weightage<?php echo $Sno; ?>" style="font:Georgia; font-size:11px; width:80px; height:20px; text-align:center;" value="<?php echo $res2['Weightage']; ?>" readonly/>
</td>
<td align="center" style="font:Georgia; font-size:11px; width:80px;">
  <input name="Target<?php echo $Sno; ?>" id="Target<?php echo $Sno; ?>" style="font:Georgia; font-size:11px; width:80px; height:20px; text-align:center;" value="<?php echo $res2['Target']; ?>" readonly/>
</td>
<td align="center" style="font:Georgia; font-size:11px; width:80px;">
  <a href="#"><img src="images/edit.png" border="0" id="EditImg" alt="Edit" onClick="EditEmpKRA(<?php echo $Sno; ?>)"></a>
</td>
</tr>
<?php $Sno++;} $RowNo=$Sno-1;?><input type="hidden" id="EmpKraRow" name="EmpKraRow" value="<?php echo $RowNo; ?>" /> 
	  <tr><td colspan="9">&nbsp;</td></tr>
 <tr><td colspan="6" align="left" style="width:900px;"><input type="Submit" name="SubmitEmpKRA" id="SubmitEmpKRA" style="width:90px;" value="save"/></td></tr>	                           	
													 
</table>		 
</form>
<?php } ?>	
