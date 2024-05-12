<script type="text/javascript">
function EditApp()
{document.getElementById("EditAppE").style.display = 'block'; document.getElementById("ChangeApp").style.display = 'none';
 //document.getElementById("EmpPhoto").disabled = false;
}
</script>
<td align="left" id="Eappraisal" valign="top" style="display:none;">             
 <form enctype="multipart/form-data" name="formEappraisal" method="post" onSubmit="return validate(this)">
<table border="0">
<tr>
 <td>
  <table><tr>
 <td class="All_100">EmpCode :</td><td class="All_90"><input name="EmpCode" id="EmpCode" class="All_80" style="background-color:#E6EBC5;" value="<?php echo $ResEmp['EmpCode']; ?>" Readonly></td>
 <td class="All_50">Name :</td><td class="All_220"><input name="EmpName" id="EmpName" style="width:210px; height:18px; font-size:11px;background-color:#E6EBC5;" value="<?php echo $Ename; ?>" Readonly></td>
  </tr></table>
 </td>
</tr>
<tr> 
<td align="left" valign="top">
<table border="1" width="800" id="TEmp" style="display:block;" cellpadding="1" cellspacing="2">
<tr bgcolor="#BCA9D3">
  <td align="center"></td>
  <td style="width:120; font-size:12px;" align="center">Career</td>
  <td style="width:100; font-size:12px;" align="center">Date</td>
  <td style="width:250; font-size:12px;" align="center">Designation</td>
  <td style="width:150; font-size:12px;" align="center">Gross Monthly</td>
  <td style="width:150; font-size:12px;" align="center">Remark</td>
</tr>
<tr bgcolor="#FFFFFF">
  <td align="center"></td>
  <td class="All_120">Joining as</td>
  <td class="All_100"><?php echo '&nbsp;'.date("d-m-Y",strtotime($ResEmp['DateJoining'])); ?></td>
  <?php $sqlAppr=mysql_query("select DesigName from hrm_designation where DesigId=".$ResEmp['DesigId'], $con); $resAppr=mysql_fetch_assoc($sqlAppr); ?>
  <td class="All_250"><?php echo '&nbsp;'.$resAppr['DesigName']; ?></td>
  <td class="All_100"><?php echo '&nbsp;'.$ResEmp['Tot_GrossMonth']; ?></td>
  <td class="All_150"><?php ?></td>
</tr>
<?php $sqlApprai=mysql_query("select * from hrm_employee_appraisal where EmployeeID=".$EMPID, $con); $rowApprai=mysql_num_rows($sqlApprai);   
      if($rowApprai>0) { while($resApprai=mysql_fetch_array($sqlApprai)) { ?>
<tr bgcolor="#FFFFFF">
  <td align="center"></td>
  <td class="All_120">Appraisal_<?php echo $Sno; ?></td>
  <td class="All_100"><?php ?></td>
  <td class="All_250"><?php ?></td>
  <td class="All_100"><?php ?></td>
  <td class="All_150"><?php ?></td>
</tr>
<?php }}?>
<tr bgcolor="#FFFFFF">
  <td align="center"></td>
  <td class="All_120">Leaving as</td>
  <td class="All_100"><?php ?></td>
  <td class="All_250"><?php ?></td>
  <td class="All_100"><?php ?></td>
  <td class="All_150"><?php ?></td>
</tr>
 <tr>
  <td align="Right" class="fontButton" colspan="6"><table border="0" align="right" class="fontButton">
	<tr>	 
	  <td align="right" style="width:90px;"><input type="hidden" name="ChangeApp" id="ChangeApp" style="width:90px; display:block;" value="Edit" onClick="EditApp()">
		<input type="hidden" name="EditAppE" id="EditAppE" style="width:90px;" value="save"></td>
	  <td align="right" style="width:90px;"><input type="button" name="RefreshAppE" id="RefreshAppE" style="width:90px;" value="refresh" onClick="RefApp()"/></td>
	</tr></table>
  </td>
</tr>
</table>
</td>
<?php include("EmpImg.php"); ?>
</tr>
</table>
</form>  
</td>