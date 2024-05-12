<?php 
$sql=mysql_query("select EmpCode,Fname,Sname,Lname,DR,Married,Gender from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$EmployeeId, $con); $res=mysql_fetch_assoc($sql); $LEC=strlen($res['EmpCode']); 
if($res['DR']=='Y'){$M='Dr.';} elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; 
if($LEC==1){$EC='000'.$res['EmpCode'];} if($LEC==2){$EC='00'.$res['EmpCode'];} if($LEC==3){$EC='0'.$res['EmpCode'];} if($LEC>=4){$EC=$res['EmpCode'];}
?>		  
<table border="0" style="margin-top:-5px;width:1200px; height:20px;">	  
<tr>
  <td align="Left" valign="top" style="font-family:Times New Roman;color:#C4E1FF; font-size:15px; width:1200px; ">
  <i><b>Welcome :&nbsp;</b></i>
  <font style='font-family:Times New Roman;font-size:14px;color:#FFFFAE;'><b><?php echo ucwords(strtolower($NameE));?></b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <i><b>EmpCode :&nbsp;</b></i>
  <font style='font-family:Times New Roman;font-size:14px;color:#FFFFAE;'><b><?php echo $EC; ?></b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <i><b>Year :&nbsp;</b></i>
  <font style='font-family:Times New Roman;font-size:14px;color:#FFFFAE;'><b><?php echo $fromdate; ?></b></font>
  <font style='font-family:Times New Roman;font-size:13px;color:#9B0000;'><b>to</b></font>
  <font style='font-family:Times New Roman;font-size:14px;color:#FFFFAE;'><b><?php echo $todate; ?></b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <i><b>Company :&nbsp;</b></i>
  <font style='font-family:Times New Roman;font-size:14px;color:#FFFFAE;'><b><?php echo $resCom['CompanyName']; ?></b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  
  <a href="../../../Home.php?logout=true" class="top_link" style="text-decoration:none;"><b style="color:#FFCB97;"><u>LogOut</u></b></a> &nbsp;&nbsp;
<?php /* <a href="ChangePwd.php" class="top_link" style="text-decoration:none;"><b style="color:#804000;"><u>Change Password</u></b></a> */ ?>
  </td>  								
</tr>
</table>

