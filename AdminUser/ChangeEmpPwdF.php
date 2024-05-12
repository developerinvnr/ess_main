<?php
require_once('config/config.php');
if(isset($_POST['EMPid']) && $_POST['EMPid']!=""){
	$EMPid = $_POST['EMPid']; ?>
 <table border="0" style="margin-top:5px;">
   <tr>
	  <td align="left" class="All_300" valign="bottom" style="font-family:Times New Roman; font-size:14px;">Change Password
	  <?php $SqlSelect=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$EMPid, $con);  $ResSelect=mysql_fetch_assoc($SqlSelect); 
	        $ename=$ResSelect['Fname'].' '.$ResSelect['Sname'].' '.$ResSelect['Lname']; ?>
		    <font color="#2F248C" style='font-family:Georgia; font-size:12px;'>&nbsp;<b><?php echo $ename; ?></b></font>&nbsp;&nbsp;
	  </td>
	  <td class="All_100"><b>&nbsp;New Password&nbsp; : &nbsp;</b><br><input type="password" name="EmpPass1" id="EmpPass1" height="15" maxlength="15" size="25"></td>
	  <td class="All_100"><b>&nbsp;Confirm New Password&nbsp; : &nbsp;</b><br><input type="password" name="EmpPass2" id="EmpPass2" height="15" maxlength="15" size="25" ></td>
	  <td><input type="hidden"  name="ChangeEmpId" value="<?php echo $EMPid; ?>"></td>
	  <td colspan="2"  align="right" valign="bottom"><input type="button" id="Change" name="Change" value="Change" onClick="ChangEmpPwd(<?php echo $EMPid; ?>)"/></td>
   </tr>
 </table>
<?php } ?>	
