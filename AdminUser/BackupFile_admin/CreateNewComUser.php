<style type="text/css" >
.FieldName {color:#000000; font-size:12px;  font-family:Verdana;}   .FeildArea { color:#000000;  font-size:11px;  font-family:Verdana;  width:180px;  height:40px;}  
</style>
<?php
require_once('config/config.php');
if(isset($_POST['CUid']) && $_POST['CUid']!=""){
	$CUid = $_POST['CUid'];
	$sqlCU = mysql_query("SELECT CompanyName FROM hrm_company_basic WHERE CompanyId=".$CUid, $con) or die(mysql_error()); $resCU=mysql_fetch_assoc($sqlCU)?>
	<form name="C" method="post" onSubmit="return v11()">
	<table>
	<tr>
	 <td style="color:#00254A;font-family:Georgia, Times New Roman, Times, serif;" colspan="6" align="center">
	 <font size="2"><b>Create new User for </font><font color="#006A6A" size="2"><?php echo $resCU['CompanyName']; ?></font><font size="2"> Company</b></font><br><br></td>
	</tr>
	<tr>
	  <td align="left"><font class="FieldName">FirstName</font>&nbsp;:&nbsp;</td><td align="left"><input class="tdTextbox" name="Fname" /></td>
	  <td align="left"><font class="FieldName">SecondName</font>&nbsp;:&nbsp;</td><td align="left"><input class="tdTextbox" name="Sname"/></td>
	  <td align="left"><font class="FieldName">LastName</font>&nbsp;:&nbsp;</td><td align="left"><input class="tdTextbox" name="Lname" /></td>
	</tr>
	<tr>
	  <td align="left"><font class="FieldName">UserName</font>&nbsp;:&nbsp;</td><td align="left"><input class="tdTextbox" name="Uname"/></td>
	  <td align="left"><font class="FieldName">Password</font>&nbsp;:&nbsp;</td><td align="left"><input type="password" class="tdTextbox" name="Upass1"/></td>
	  <td align="left"><font class="FieldName">Re-password</font>&nbsp;:&nbsp;</td><td align="left"><input type="password" class="tdTextbox" name="Upass2"/></td>
	</tr>
	<tr>
	  <td align="left" valign="top"><font class="FieldName">UserType</font>&nbsp;:&nbsp;</td><td align="left" valign="top">
	  <select class="tdTextbox" name="Utype" ><option value="U" selected>&nbsp;User</option><option value="A">&nbsp;Admin</option><option value="S">&nbsp;SuparAdmin</option>
	  </select>
	  </td>
	  <td align="left" valign="top"><font class="FieldName">User Status</font>&nbsp;:&nbsp;</td><td align="left" valign="top">
	  <select class="tdTextbox" name="Ustatus" ><option value="D" selected>&nbsp;De-active</option><option value="A">&nbsp;Active</option>
	  </select>
	  </td>
	  <td align="left" valign="top"><font class="FieldName">Comment</font>&nbsp;:&nbsp;
	  <input type="hidden" name="ComId" value="<?php echo $CUid; ?>"><input type="hidden" name="ComName" value="<?php echo $resCU['CompanyName']; ?>"></td>
	  <td align="left" valign="top"><textarea name="Comment" class="FeildArea"></textarea></td>
	</tr>
	<tr>
	  <td align="Right" colspan="6" class="fontButton">
	      <input type="submit" style="background-color:#E9DEC7;" name="SaveNewComUser" value="Save"/>
     </td>
	</tr>
	</table>
	</form>
	 
<?php } ?>
