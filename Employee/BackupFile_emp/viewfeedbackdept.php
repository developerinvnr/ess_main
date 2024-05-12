<?php require_once('../AdminUser/config/config.php');
if($_POST['action']=='deptemp' AND $_POST['dept']!=''){ ?>
<select name="BehEmp" id="BehEmp" style="width:100%;height:24px;">
<option value="">SELECT PERSON</option>
<?php $sqle=mysql_query("select e.EmployeeID,Fname,Sname,Lname from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where g.DepartmentId=".$_POST['dept']." AND e.EmpStatus='A' order by Fname ASC",$con); 
while($rese=mysql_fetch_assoc($sqle)){ 
if($rese['Sname']!=''){ $En=$rese['Fname'].' '.$rese['Sname'].' '.$rese['Lname']; }
else{ $En=$rese['Fname'].' '.$rese['Lname']; } ?>
<option value="<?php echo $rese['EmployeeID']; ?>"><?php echo strtoupper($En); ?></option>
<?php } ?></select>
<?php } ?>


<?php
if(isset($_POST['SubmitAtt']))
{
 if($_POST['BehAtt']!='OTHER'){ $BehAtt=$_POST['BehAtt']; }else{ $BehAtt=$_POST['OtherBehAtt']; }
 $ins=mysql_query("insert into hrm_feedback(EmployeeID, BehAtt, Remark, SubDate, SubBy) values(".$_POST['BehEmp'].", '".$BehAtt."', '".$_POST['BehRmk']."', '".date("Y-m-d")."', ".$_POST['e'].")",$con);
 if($ins){$msg="feedback save successfully!";}else{$msg="Error..";}
 header("Location:viewfeedback.php?e=".$_POST['e']."&c=".$_POST['c']."&msg=".$msg); 
}
?>