<?php
require_once('config/config.php');
if(isset($_POST['EGid']) && $_POST['EGid']!=""){
	$EGid = $_POST['EGid']; ?>
	<table border="0" width="800" style="display:block;">
<tr>
  <td class="All_120">Code :</td><td class="All_180"><span id="GetEmpCode"><input name="EmpCode" id="EmpCode" class="All_148" disabled></span></td>
  <td class="All_120">Status :</td><td class="All_180"><select name="EmpStatus" id="EmpStatus" class="All_148" disabled>
   <option style="background-color:#DBD3E2; " value="D">&nbsp;Deactive</option><option style="background-color:#DBD3E2; " value="A">&nbsp;Active</option>
   </select></td>
  <td class="All_120">Password :</td><td style="width:140px;"><input type="password" name="EmpPass" id="EmpPass" class="All_148" disabled></td>
</tr>
<tr>
  <td class="All_120">First Name :</td><td class="All_180"><input name="Fname" id="Fname" value="<?php echo $resEmpEdit['Fname']; ?>" class="All_148" disabled></td>
  <td class="All_120">Second Name :</td><td class="All_180"><input name="Sname" id="Sname" class="All_148" disabled></td>
  <td class="All_120">Last Name :</td><td style="width:140px;"><input name="Lname" id="Lname" class="All_148" disabled></td>
</tr>
<tr>
  <td class="All_120">FileNo :</td><td class="All_180"><input name="FileNo" id="FileNo" class="All_148" disabled></td>
  <td class="All_120">Joining :</td><td style="width:180px;"><input name="DOJ" id="DOJ" class="All_125" disabled><button id="f_btn1" class="CalenderButton" disabled></button></td>
  <td class="All_120">Confirmation :</td><td style="width:140px;"><input name="DOC" id="DOC" class="All_120" disabled><button id="f_btn2" class="CalenderButton" disabled></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("f_btn2", "DOC", "%d-%m-%Y");  cal.manageFields("f_btn1", "DOJ", "%d-%m-%Y");</script></td>
</tr>
<tr>
  <td class="All_120" valign="top">Date Of Birth :</td><td style="width:180px;" valign="top"><input name="DOB" id="DOB" class="All" style="width:90px;" disabled>
  <button id="f_btn3" class="CalenderButton" disabled></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("f_btn3", "DOB", "%d-%m-%Y");</script><input name="Age" id="Age" style="width:30px; height:18px; font-size:11px;" disabled></td>
  <td class="All_120" valign="top">Grade :</td><td style="width:110px;" valign="top">
 <span id="GradeEmp"><input class="All_148" name="GradeName" id="GradeName" disabled></span></td>
 <td class="All_120" valign="top">Cost Center :</td><td class="All_150" valign="top"><select class="All_148" name="CostCenter" id="CostCenter" disabled>
   <option value="">&nbsp;</option></select></td>
</tr>
<tr>
  <td class="All_120" valign="top">Head Quater :</td><td class="All_150" valign="top"> <select class="All_148" name="HQName" id="HQName" onChange="HQSelect(this.value)" disabled>
  <option style="background-color:#DBD3E2;" value="">&nbsp;Select</option>
 <?php $SqlHQ=mysql_query("select * from hrm_headquater where CompanyId=".$CompanyId." order by HqName ASC", $con); while($ResHQ=mysql_fetch_array($SqlHQ)) { ?>
  <option value="<?php echo $ResHQ['HqId']; ?>">&nbsp;<?php echo $ResHQ['HqName']; ?></option><?php } ?></select></td>
  <td class="All_120" valign="top">Department :</td><td style="width:110px;" valign="top"><select class="All_148" name="DeptName" id="DeptName" onChange="HQSelect(this.value)" disabled>
   <option style="background-color:#DBD3E2; " value="">&nbsp;Select</option>
 <?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
   <option value="<?php echo $ResDept['DepartmentId']; ?>">&nbsp;<?php echo $ResDept['DepartmentCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;'.$ResDept['DepartmentName']; ?></option><?php } ?>
   </select></td>
    <td class="All_120">Designation :</td><td style="width:140px;"><select class="All_148" name="DesigtName" id="DesigName" onChange="DesigSelect(this.value)" disabled></td>
</tr>
<tr>
  <td class="All_120" valign="top">Photo :</td><td class="All_150" valign="top"><input type="file" name="EmpPhoto" id="EmpPhoto" size="12" class="All_148" disabled></td>
  <td class="All_120" valign="top">Official Mob. No :</td><td style="width:110px;" valign="top"><input class="All_148" name="OffiMobileNo" id="OffiMobileNo" disabled></td>
   <td class="All_120" valign="top">Offi. EmailId :</td><td style="width:110px;" valign="top"><input name="OffiEmialId" id="OffiEmialId" class="All_148" disabled></td>
</tr>
<tr>
  <td style="font-size:11px;" colspan="3">
<fieldset align="center"><legend><b>Bank_1</b></legend>
<table border="0">
<tr><td class="All_100">Name :</td><td><input class="All_200" name="BankName1" id="BankName1" disabled></td></tr>					
<tr><td class="All_120">AccountNo. :</td><td><input class="All_200" name="AccountNo1" id="AccountNo1" disabled></td></tr>		
<tr><td class="All_100">Branch :</td><td style="width:160px;"><input class="All_200" name="Branch1" id="Branch1" disabled></td></tr>					 
<tr><td class="All_100">Address. :</td><td style="width:160px;"><input class="All_200" name="Address1" id="Address1" disabled></td></tr>		
</table>
</fieldset>
  </td>
<td style="font-size:11px;" colspan="3">
  <fieldset align="center"><legend><b>Bank_2</b></legend>
<table border="0">
<tr><td class="All_100">Name :</td><td><input class="All_200" name="BankName2" id="BankName2" disabled></td></tr>					
<tr><td class="All_120">AccountNo. :</td><td><input class="All_200" name="AccountNo2" id="AccountNo2" disabled></td></tr>		
<tr><td class="All_100">Branch :</td><td style="width:160px;"><input class="All_200" name="Branch2" id="Branch2" disabled></td></tr>					 
<tr><td class="All_100">Address. :</td><td style="width:160px;"><input class="All_200" name="Address2" id="Address2" disabled></td></tr>		
</table>
</fieldset>

  </td>
</tr>
<tr>
  <td style="font-size:11px;" colspan="3">
<fieldset align="center"><legend><b>Reporting</b></legend>
<table border="0">
<tr><td class="All_100" valign="top">Name :</td><td style="width:160px;"><input class="All_200" name="RepName" id="RepName" disabled></td></tr>						
<tr><td class="All_120" valign="top">Designation :</td><td style="width:160px;"><input class="All_200" name="RepDesig" id="RepDesig" disabled></td></tr>		
<tr><td class="All_100" valign="top">EmailId :</td><td style="width:160px;"><input class="All_200" name="RepEmailId" id="RepEmailId" disabled></td></tr>						<tr><td class="All_100" valign="top">ContactNo :</td><td style="width:160px;"><input class="All_200" name="RepContactNo" id="RepContactNo" disabled></td></tr>		
</table>
</fieldset>
  </td>
   <td style="font-size:11px;" colspan="3" valign="top">
<fieldset align="center"><legend><b>Legal</b></legend>
<table border="0">
<tr><td class="All_100" valign="top">Ins. No. :</td><td style="width:150px;" valign="top"><input class="All_200" name="InsCardNo" id="InsCardNo" disabled></td></tr>
<tr><td class="All_120" valign="top">PF No. :</td><td class="All_150" valign="top"><input class="All_200" name="PfAccountNo" id="PfAccountNo" disabled></td></tr>
<tr><td class="All_100" valign="top">Esic :</td><td class="All_150" valign="top"><input class="All_200" name="ESICNo" id="ESICNo" disabled></td></tr>
</table>
</fieldset>
  </td>
</tr>
</table>
	 
<?php } ?>
