<?php $SqlE = mysql_query("SELECT EmpCode FROM hrm_employee WHERE EmployeeID=".$EMPID." AND Companyid=".$CompanyId, $con);  $Emp=mysql_fetch_assoc($SqlE); ?>
<td valign="top" align="center">
  <table style="border-width:1;border-style:outset; border-color:#75A633;">
   <tr>

<?php   
if($EMPID!=944 AND $EMPID!=945)
{ 
?>
 <td align="center" valign="top" width="100"><?php echo '<img width="105px" height="125px" src="EmpImg'.$CompanyId.'Emp/'.$Emp['EmpCode'].'.jpg" />'; ?></td> 
<?php
}
elseif($EMPID==944 OR $EMPID==945)
{
?>
 <td align="center" valign="top" width="100"><?php echo '<img width="105px" height="125px" src="EmpImg'.$CompanyId.'Emp/'.$Emp['EmpCode'].'_NewEmp.jpg" />'; ?></td>
<?php
}   
?>       
   </tr>
  </table>
</td>
<?php // "<img width=105px height=125px src=\"show_images.php?id=".$EMPID."\">\n";?>